<?php 
session_start();
include "../../../connection/connection.php";
if (isset($_POST['submit'])) {

	date_default_timezone_set('Asia/Manila');
	$id = $_SESSION['emp_id'];
	$date = date("Y-m-d");

	$file = $_FILES['file'];
			
			$fileName = $_FILES['file']['name'];
			$fileTmp = $_FILES['file']['tmp_name'];
			$fileSize = $_FILES['file']['size'];
			$fileError = $_FILES['file']['error'];
			$fileType = $_FILES['file']['type'];

			$fileExt = explode('.', $fileName);
			$fileActualExt = strtolower(end($fileExt));

			$allowed = array('jpg','jpeg','png', 'svg');

			if (in_array($fileActualExt, $allowed)) {
				if ($fileError === 0) {
					if ($fileSize < 1000000) {
						$fileNameNew = uniqid('', true).".".$fileActualExt;
						$fileDestination = '../Image-entry/'.$fileNameNew;
						move_uploaded_file($fileTmp, $fileDestination);
					}
				}

			}

	
	$compute_minutes = "SELECT * FROM (SELECT Employees_ID,
		@sid:= Schedule_ID AS Schedule_ID,
		(SELECT `Schedule_In` from tbl_types_schedule WHERE Schedule_ID = @sid) as Schedule_In,
		(SELECT `Schedule_Out` from tbl_types_schedule WHERE Schedule_ID = @sid) as Schedule_Out,
		(SELECT `Schedule_Rate` from tbl_types_schedule WHERE Schedule_ID = @sid) as Schedule_Rate,
		(SELECT `Schedule_Name` from tbl_types_schedule WHERE Schedule_ID = @sid) as Schedule_Name 
		FROM tbl_employees_information
		WHERE Employees_ID = $id) tbl_employees_information 
		INNER JOIN 
		(SELECT * FROM tbl_time_entries WHERE Employees_ID = '$id' AND Date_Attendance = '$date') tbl_time_entries 
		ON tbl_employees_information.Employees_ID = tbl_time_entries.Employees_ID ";
	$query_minutes = mysqli_query($conn,$compute_minutes);
	$result_minutes=$query_minutes->fetch_assoc();

	// Time

	$time_in = $result_minutes['Time_In'];
	$time_out = date("H:i:s");
	$time_start = $result_minutes['Schedule_In'];
	$time_end = $result_minutes['Schedule_Out'];

	// Convert number

	// overtime
	  if(strtotime($time_out) < strtotime($time_end)-60){
                    // undertime
                    $undertime = 1;
                    $min_overtime = 0;
                    $diff_undertime = date_diff(date_create($time_end),date_create($time_out));
                    $min_undertime =  $diff_undertime->days * 24 * 60;
                    $min_undertime += $diff_undertime->h * 60;
                    $min_undertime += $diff_undertime->i;
                }else{
                    // overtime
                    $undertime = 0;
                    $diff_overtime = date_diff(date_create($time_end),date_create($time_out));
                    $min_overtime =  $diff_overtime->days * 24 * 60;
                    $min_overtime += $diff_overtime->h * 60;
                    $min_overtime += $diff_overtime->i;
                    $min_undertime = 0;
        }

        // REGULAR TIME
        if(strtotime($time_out) < strtotime($time_end)){

        	if(strtotime($time_in) < strtotime($time_start)){
        	$diff_regular = date_diff(date_create($time_start),date_create($time_out));
            $min_regular =  $diff_regular->days * 24 * 60;
            $min_regular += $diff_regular->h * 60;
            $min_regular += $diff_regular->i;
        	}else{
        		$diff_regular = date_diff(date_create($time_in),date_create($time_out));
            	$min_regular =  $diff_regular->days * 24 * 60;
            	$min_regular += $diff_regular->h * 60;
            	$min_regular += $diff_regular->i;
        	}


        }else{
        	if(strtotime($time_in) < strtotime($time_start)){
        		$diff_regular = date_diff(date_create($time_start),date_create($time_end));
           	 	$min_regular =  $diff_regular->days * 24 * 60;
            	$min_regular += $diff_regular->h * 60;
            	$min_regular += $diff_regular->i;
        	}else{
        		$diff_regular = date_diff(date_create($time_in),date_create($time_end));
            	$min_regular =  $diff_regular->days * 24 * 60;
            	$min_regular += $diff_regular->h * 60;
            	$min_regular += $diff_regular->i;
        	}



        	

        }

            $test = "UPDATE `tbl_time_entries` SET Time_Out = '$time_out', Regular_Time = '$min_regular', Undertime ='$min_undertime', No_Undertime = '$undertime', Overtime = '$min_overtime' ,
            Image_Time_Out ='$fileNameNew' where Date_Attendance = '$date' AND Employees_ID = '$id' ";
			$conn->query($test) or die ($conn->error);

			// for LATE

			$select_all_late = "SELECT * FROM tbl_time_entries WHERE Employees_ID = $id AND Date_Attendance = '$date'";
			$query_late = mysqli_query($conn,$select_all_late);
			$res_late_min = mysqli_fetch_assoc($query_late);

			$late_mins = $res_late_min['Late'];


			// COMPUTATION

			$select_ot_rate = "SELECT `id`, `Ot_Rate` FROM `tbl_rate` WHERE 1";
            $query_rate = mysqli_query($conn,$select_ot_rate);
            $res_rate=$query_rate->fetch_assoc();

            $overtime_rate = $res_rate['Ot_Rate'];
            
            $sql = "SELECT * FROM tbl_holiday where Doh = '$date'";
            $holiday = mysqli_query($conn,$sql);
            $res_holiday=$holiday->fetch_assoc();

            if($res_holiday != NULL){
               $percent_holiday = $res_holiday['Rate'];
            }else{
                $percent_holiday = 100;
            }


            $select_daily_rate = "SELECT * FROM 
                (SELECT Employees_ID,Daily_Rate,
                @sid:= Schedule_ID AS Schedule_ID,
                (SELECT `Schedule_Rate` from tbl_types_schedule WHERE Schedule_ID = @sid) as Schedule_Rate
                FROM tbl_employees_information WHERE Employees_ID = $id ) tbl_employees_information
                INNER JOIN (SELECT * FROM tbl_time_entries WHERE Date_Attendance = '$date' AND Employees_ID = $id) tbl_time_entries ON tbl_employees_information.Employees_ID = tbl_time_entries.Employees_ID";
            $query_daily_rate = mysqli_query($conn,$select_daily_rate);
            $result_daily_rate=mysqli_fetch_assoc($query_daily_rate);

            $sched_rate = $result_daily_rate['Schedule_Rate'];


            $regular_salary = ((((((($result_daily_rate['Daily_Rate']/8)/60)/100)*$sched_rate)/100)*$percent_holiday)*$min_regular);

            $Ot_salary = ((((((((($result_daily_rate['Daily_Rate']/8)/60)/100)*$sched_rate)/100)*$overtime_rate)/100)*$percent_holiday)*$min_overtime);

            $late_deduction = ((((((($result_daily_rate['Daily_Rate']/8)/60)/100)*$sched_rate)/100)*$percent_holiday)*$late_mins);

            $undertime_deduction = ((((((($result_daily_rate['Daily_Rate']/8)/60)/100)*$sched_rate)/100)*$percent_holiday)*$min_undertime);

            $total_salary = $regular_salary + $Ot_salary;



           $Earning = "INSERT INTO `tbl_salary_earning` (`Employees_ID`,`Regular_Salary`,`Ot_Salary`,`Daily_Salary`,`Earning_Date`,`Undertime_D`,`Late_D`,`Salary_Status`) VALUES ('$id','$regular_salary','$Ot_salary','$total_salary','$date','$undertime_deduction','$late_deduction','Unpaid')";
         $conn->query($Earning) or die ($conn->error);



	header("location: ../entry_option.php");

	
}



?>