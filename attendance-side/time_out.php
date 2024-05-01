<?php 
include "../connection/connection.php";
if (isset($_POST['submit'])) {

	date_default_timezone_set('Asia/Manila');
	$id = $_POST['id'];
	$date = date("Y-m-d");

	
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
	$ot = $result_minutes['Overtime'];
	$time_start = $result_minutes['Schedule_In'];
	$time_end = $result_minutes['Schedule_Out'];

	// Convert number
	$break = 60;
	// NO LATE
	if(strtotime($result_minutes['Time_In'])-60 < strtotime($result_minutes['Schedule_In']))
	{
		if(strtotime($result_minutes['Schedule_In']) > strtotime($time_out))
		{
				$regular_time = 0;
				$undertime = 0;
				$overtime = 0;
				$status = "Invalid Entry";
				$num_halfday = 0;
				$num_late = 0;
				$num_undertime = 0;
		}
		if(strtotime($result_minutes['Schedule_In']) < strtotime($time_out))
		{
		$get_total_hrs = date_diff(date_create($time_start),date_create($time_out));
		$min =  $get_total_hrs->days * 24 * 60;
		$min += $get_total_hrs->h * 60;
		echo $min += $get_total_hrs->i;
		// echo "<br>";
		// half day
			if($min <= 240){
				echo "<br>";
				echo $regular_time = $min;
				echo "<br>";
				echo $undertime = 0;
				echo "<br>";
				echo $overtime = 0;
				$status = "Halfday";
				$num_halfday = 1;
				$num_late = 0;
				$num_undertime = 0;
			}
			if($min > 240 && $min <=300){
				echo "<br>";
				echo $regular_time = $min - ($min%60);
				echo "<br>";
				echo $undertime = 0;
				echo "<br>";
				echo $overtime = 0;
				echo "<br>";
				echo "<br>";
				$status = "Halfday";
				$num_halfday = 1;
				$num_late = 0;
				$num_undertime = 0;
			}
		// undertime
			if($min > 300 && $min <= 540){

				$get_undertime = date_diff(date_create($time_out),date_create($time_end));
				$min_undertime = $get_undertime->days * 24 * 60;
				$min_undertime += $get_undertime->h * 60;
				echo "<br>";
				echo "<br>";
				$min_undertime += $get_undertime->i;
				echo "<br>";
				echo $undertime = $min_undertime;
				echo "<br>";
				echo $regular_time;
				echo "<br>";
				echo $overtime = 0;
				$status = "Undertime";
				$num_halfday = 0;
				$num_late = 0;
				$num_undertime = 1;
			

			}
		//  overtime
			if($min >= 540 && $min <= 600){
				// $get_ot = date_diff(date_create($time_end),date_create($time_out));
				// $min_ot = $get_ot->days * 24 * 60;
				// $min_ot += $get_ot->h * 60;
				// $min_ot += $get_ot->i;
				echo "<br>";
				echo $regular_time = 480;
				echo "<br>";
				echo $overtime =0 ;
				echo "<br>";
				echo $undertime = 0;
				$status = "Fulltime";
				$num_halfday = 0;
				$num_late = 0;
				$num_undertime = 0;
			}
			if($min > 600){
				$get_ot = date_diff(date_create($time_end),date_create($time_out));
				$min_ot = $get_ot->days * 24 * 60;
				$min_ot += $get_ot->h * 60;
				$min_ot += $get_ot->i;
				echo "<br>";
				echo $regular_time = 480;
				echo "<br>";
				echo $overtime = $min_ot - $min%60;
				echo "<br>";
				echo $undertime = 0;
				$status = "Fulltime with Overtime";
				$num_halfday = 0;
				$num_late = 0;
				$num_undertime = 0;
			}
		}

	}

	// LATE
	if(strtotime($result_minutes['Time_In']) > strtotime($result_minutes['Schedule_In']) )
	{
		if(strtotime($time_out) < strtotime($time_end))
		{

			if(strtotime($time_out) > strtotime($time_start)+14340 && strtotime($time_out) < strtotime($time_start)+18000)
			{
				$get_total_hrs = date_diff(date_create($time_in),date_create($time_end));
				$min =  $get_total_hrs->days * 24 * 60;
				$min += $get_total_hrs->h * 60;

				$regular_time = 240;
				$undertime = 0;
				$overtime = 0;
				$status = "Halfday";
				$num_halfday = 1;
				$num_late = 0;
				$num_undertime = 0;
			}else{

			$get_total_hrs = date_diff(date_create($time_in),date_create($time_out));
			$min =  $get_total_hrs->days * 24 * 60;
			$min += $get_total_hrs->h * 60;
			echo $min += $get_total_hrs->i;
			echo "<br>";
			echo $regular_time = $min;
			echo "<br>";


			$get_undertime = date_diff(date_create($time_end),date_create($time_out));
			$min_undertime =  $get_undertime->days * 24 * 60;
			$min_undertime += $get_undertime->h * 60;
			$min_undertime += $get_undertime->i;

			echo $overtime = 0;
			echo "<br>";
			echo $undertime = $min_undertime;
			$status = "Late Arrival and Undertime";
			$num_halfday = 0;
			$num_late = 1;
			$num_undertime = 1;
			}

		}
		if(strtotime($time_out) > strtotime($time_end))
		{
		$get_total_hrs = date_diff(date_create($time_in),date_create($time_end));
		$min =  $get_total_hrs->days * 24 * 60;
		$min += $get_total_hrs->h * 60;
		echo $min += $get_total_hrs->i;
		echo "<br>";
		echo $regular_time;
		echo "<br>";

		$get_ot = date_diff(date_create($time_end),date_create($time_out));
		$min_ot = $get_ot->days * 24 * 60;
		$min_ot += $get_ot->h * 60;
		$min_ot += $get_ot->i;

		echo $overtime = $min_ot - $min_ot%60;
		echo "<br>";
		echo $undertime = 0;
		$status = "Late Arrival";
		$num_halfday = 0;
		$num_late = 1;
		$num_undertime = 0;
		}

	}

	$total_hours = $regular_time + $overtime;



	$sql = "SELECT * FROM tbl_holiday where Doh = '$date'";
	$holiday = mysqli_query($conn,$sql);
	$res_holiday=$holiday->fetch_assoc();

	if($res_holiday != NULL){
		$num_holiday = 1;
	}else{
		$num_holiday = 0;
	}

	$test = "UPDATE `tbl_time_entries` SET Time_Out = '$time_out', Regular_Time = '$regular_time' , Hours_Worked = '$total_hours' , Overtime = '$overtime' , Daily_Status = '$status', No_Halfday = '$num_halfday', No_Late = '$num_late', No_Undertime = '$num_undertime', No_holiday = '$num_holiday', Undertime = '$undertime',Time_End = '$time_end' where Date_Attendance = '$date' AND Employees_ID = '$id' ";
	$conn->query($test) or die ($conn->error);

// computation salary


	$select_ot_rate = "SELECT `id`, `Ot_Rate` FROM `tbl_rate` WHERE 1";
	$query_rate = mysqli_query($conn,$select_ot_rate);
	$res_rate=$query_rate->fetch_assoc();
	echo "<br>";
	echo "OVERTIME RATE";
	echo "<br>";
	echo $overtime_rate = $res_rate['Ot_Rate'];
	echo "<br>";
	echo "<br>";

	echo "HOLIDAY RATE";
	echo "<br>";
	ECHO $percent_holiday = $res_holiday['Rate'];
	echo "<br>";

	$select_daily_rate = "SELECT * FROM 
	(SELECT Employees_ID,Daily_Rate,
	@sid:= Schedule_ID AS Schedule_ID,
	(SELECT `Schedule_Rate` from tbl_types_schedule WHERE Schedule_ID = @sid) as Schedule_Rate
	FROM tbl_employees_information WHERE Employees_ID = $id ) tbl_employees_information
	INNER JOIN (SELECT * FROM tbl_time_entries WHERE Date_Attendance = '$date' AND Employees_ID = $id) tbl_time_entries ON tbl_employees_information.Employees_ID = tbl_time_entries.Employees_ID";
	$query_daily_rate = mysqli_query($conn,$select_daily_rate);
	$result_daily_rate=mysqli_fetch_assoc($query_daily_rate);


	if ($percent_holiday != 0 ){

	

	echo "<br>";
	echo " DAILY RATE";
	echo "<br>";

	echo $salary_rate = $result_daily_rate['Daily_Rate'];
	echo "<br>";
	echo "<br>";
	echo " SCHED RATE";
		echo "<br>";
	echo $sched_rate = $result_daily_rate['Schedule_Rate'];
	echo "<br>";
	echo "<br>";
	echo " NO OF OT";
	echo "<br>";
	echo $daily_overtime = $result_daily_rate['Overtime'];
	echo "<br>";
	echo "<br>";
	echo " NO OF Regular_Time";
	echo "<br>";
	echo $daily_regular_time = $result_daily_rate['Regular_Time'];
	echo "<br>";
	echo "<br>";
	echo " undertime minutes ";
	echo "<br>";
	echo $undertime_minutes = $result_daily_rate['Undertime'];
	echo "<br>";
	echo "<br>";
	echo " late minutes ";
	echo "<br>";
	echo $late_minutes = $result_daily_rate['Late'];
	echo "<br>";
	echo "<br>";

	echo " Reugular Salary ";
	echo "<br>";
	echo $regular_salary = ((((((($result_daily_rate['Daily_Rate']/8)/60)/100)*$sched_rate)/100)*$percent_holiday)*$daily_regular_time);
	echo "<br>";
		echo "<br>";
	echo " OT Salary ";
	echo "<br>";
	echo $Ot_salary = ((((((((($result_daily_rate['Daily_Rate']/8)/60)/100)*$sched_rate)/100)*$overtime_rate)/100)*$percent_holiday)*$daily_overtime);
	echo "<br>";

	echo "<br>";
	echo "Late";
	echo "<br>";
	echo $late_deduction = ((((((($result_daily_rate['Daily_Rate']/8)/60)/100)*$sched_rate)/100)*$percent_holiday)*$late_minutes);
	echo "<br>";
	echo "<br>";


	echo " Undertime";
	echo "<br>";
	echo $undertime_deduction = ((((((($result_daily_rate['Daily_Rate']/8)/60)/100)*$sched_rate)/100)*$percent_holiday)*$undertime_minutes);
	echo "<br>";
	echo "<br>";

	$total_salary = $regular_salary + $Ot_salary;


	}else{
		echo "<br>";
	echo " DAILY RATE";
	echo "<br>";

	echo $salary_rate = $result_daily_rate['Daily_Rate'];
	echo "<br>";
	echo "<br>";
	echo " SCHED RATE";
		echo "<br>";
	echo $sched_rate = $result_daily_rate['Schedule_Rate'];
	echo "<br>";
	echo "<br>";
	echo " NO OF OT";
	echo "<br>";
	echo $daily_overtime = $result_daily_rate['Overtime'];
	echo "<br>";
	echo "<br>";
	echo " NO OF Regular_Time";
	echo "<br>";
	echo $daily_regular_time = $result_daily_rate['Regular_Time'];
	echo "<br>";
	echo "<br>";
	echo " undertime minutes ";
	echo "<br>";
	echo $undertime_minutes = $result_daily_rate['Undertime'];
	echo "<br>";
	echo "<br>";
	echo " late minutes ";
	echo "<br>";
	echo $late_minutes = $result_daily_rate['Late'];
	echo "<br>";
	echo "<br>";

	echo " Reugular Salary ";
	echo "<br>";
	echo $regular_salary = ((((($result_daily_rate['Daily_Rate']/8)/60)/100)*$sched_rate)*$daily_regular_time);
	echo "<br>";
		echo "<br>";
	echo " OT Salary ";
	echo "<br>";
	echo $Ot_salary = ((((((($result_daily_rate['Daily_Rate']/8)/60)/100)*$sched_rate)/100)*$overtime_rate)*$daily_overtime);
	echo "<br>";

	echo "<br>";
	echo "Late";
	echo "<br>";
	echo $late_deduction = ((((($result_daily_rate['Daily_Rate']/8)/60)/100)*$sched_rate)*$late_minutes);
	echo "<br>";
	echo "<br>";


	echo " Undertime";
	echo "<br>";
	echo $undertime_deduction = ((((($result_daily_rate['Daily_Rate']/8)/60)/100)*$sched_rate)*$undertime_minutes);
	echo "<br>";
	echo "<br>";

	$total_salary = $regular_salary + $Ot_salary;


	}


	$Earning = "INSERT INTO `tbl_salary_earning` (`Employees_ID`,`Regular_Salary`,`Ot_Salary`,`Daily_Salary`,`Earning_Date`,`Undertime_D`,`Late_D`,`Salary_Status`) VALUES ('$id','$regular_salary','$Ot_salary','$total_salary','$date','$late_deduction','$undertime_deduction','Unpaid')";
		$conn->query($Earning) or die ($conn->error);


	
	
}

header("Location: attendace.php");

?>