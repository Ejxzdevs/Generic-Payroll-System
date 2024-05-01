<?php
error_reporting(E_ALL & ~E_NOTICE & ~E_DEPRECATED);
include 'connection.php';
require_once "Classes/PHPExcel.php";


$filename = $_FILES['file_upload']['name'];

$path=$filename;
// $path='report.xls';
$reader = PHPExcel_IOFactory::createReaderForFile($path);
$excel_Obj = $reader->load($path);



$selectedColumns = array(0,1);
//Read Sheet 0
$worksheet=$excel_Obj->getSheet('3'); 
$colomncount = $worksheet->getHighestDataColumn();
// echo "<br> row ";
 $rowcount = $worksheet->getHighestRow();
// echo "<br> column ";
 $colomncount_number=PHPExcel_Cell::columnIndexFromString($colomncount);
echo "<br>";
echo "<br>";
echo "<br>";



for ($row = 0; $row <= $rowcount; $row++) {
    $data = array();
    for ($col = 0; $col <=7; $col++) {
        $cell_value = $worksheet->getCellByColumnAndRow($col, $row)->getValue();

        $data[] = $cell_value;
               
    }

    
    
    if(substr($data[0],0,3)=="Att"){
        
        continue;
    }
    if(substr($data[0],0,3)=="Com"){
        
        continue;
    }
    if(substr($data[0],0,3)=="Wor"){
        
        continue;
    }
    if(substr($data[0],0,3)=="Dai"){
        
        continue;
    }
 
    if(substr($data[0],0,3)=="Dev"){
        
        continue;
    }
    if(substr($data[0],7,9)=="ID"){
        
        continue;
    }
    if(substr($data[0],0,2)=="ID"){
        substr($data[0],3,3);
        ECHO $id = substr($data[0],3,3);
        echo "<br>";
        continue;
    }


    // echo substr($data[0],0,3);


    if(empty($data[0])){
        // echo "empty";
    }else{
        // echo "not empty";

        if($data[0]=="Date"){
            // echo $date = $data[0];

            // echo $in = $data[2]." ";
        
            // echo $out = $data[3]." ";
            
            // echo $in_2 = $data[4]." ";
        
            // echo $out_2 = $data[5]." ";

        }else{// first


            if($data[2] == ''){
          
            
            }else{ // second 

            // check if the date is exist
            echo $date = date("Y-m-d",strtotime("2023-".$data[0]));
            echo "<BR>";   
            echo $in = $data[2]." ";
            // echo $out = $data[3]." ";
                if($data[3] == ''){
                   $out = '00:00:00.000000';
                }else{
                    $out = $data[3];
                }

                if($data[4] == ''){
                   $in_2 = '00:00:00.000000';
                }else{
                    $in_2 = $data[4];
                }

                if($data[5] == ''){
                    $out_2 = $data[5];
                }else{
                     $out_2 = $data[5];
                }

                
                // $out_2 = $data[5];
                
            // echo $in_2 = $data[4]." "; 
            // echo "<BR>";  
            // echo $out_2 = $data[5]." ";
            // echo "<br>";


            // validation per entries
            $compute_minutes = "SELECT * FROM (SELECT Employees_ID,
            @sid:= Schedule_ID AS Schedule_ID,
            (SELECT `Schedule_In` from tbl_types_schedule WHERE Schedule_ID = @sid) as Schedule_In,
            (SELECT `Schedule_Out` from tbl_types_schedule WHERE Schedule_ID = @sid) as Schedule_Out,
            (SELECT `Schedule_Rate` from tbl_types_schedule WHERE Schedule_ID = @sid) as Schedule_Rate,
            (SELECT `Schedule_Name` from tbl_types_schedule WHERE Schedule_ID = @sid) as Schedule_Name 
            FROM tbl_employees_information
            WHERE Employees_ID = $id) tbl_employees_information ";
            $query_minutes = mysqli_query($conn,$compute_minutes);
            $result_minutes=$query_minutes->fetch_assoc();

          
            echo "<BR>";
            echo "<BR>";

            $check_date_entries = "SELECT * FROM tbl_time_entries WHERE Employees_ID = $id AND Date_Attendance = '$date'";
            $query_date_entries = mysqli_query($conn,$check_date_entries);
            $fetch_entries = mysqli_fetch_assoc($query_date_entries);

            if($date != $fetch_entries['Date_Attendance']){ // third


            $time_start = $result_minutes['Schedule_In'];
            $time_end = $result_minutes['Schedule_Out'];
            $shift_type = $result_minutes['Schedule_Name'];

             if(strtotime($out_2) < strtotime($time_end)-60){
                    // undertime
                    $undertime = 1;
                    $min_overtime = 0;
                    $diff_undertime = date_diff(date_create($time_end),date_create($out_2));
                    $min_undertime =  $diff_undertime->days * 24 * 60;
                    $min_undertime += $diff_undertime->h * 60;
                    $min_undertime += $diff_undertime->i;
                }else{
                    // overtime
                    $undertime = 0;
                    $diff_overtime = date_diff(date_create($time_end),date_create($out_2));
                    $min_overtime =  $diff_overtime->days * 24 * 60;
                    $min_overtime += $diff_overtime->h * 60;
                    $min_overtime += $diff_overtime->i;
                    $min_undertime = 0;
             }
            // check late or early
            if(strtotime($in) < strtotime($time_start)){
            // EARLY
                $late = 0;    
                $min_late = 0;

               
                
               


            }else{
            // LATE
                $late = 1;
                $diff_late = date_diff(date_create($time_start),date_create($in));
                $min_late =  $diff_late->days * 24 * 60;
                $min_late += $diff_late->h * 60;
                $min_late += $diff_late->i;
            }

            // regular time

             if($data[3] == '' && $data[4] == ''){

                    if(strtotime($in) > strtotime($time_start))
                    {
                    $diff_regular_time = date_diff(date_create($in),date_create($out_2));
                    $min_regular_time =  $diff_regular_time->days * 24 * 60;
                    $min_regular_time += $diff_regular_time->h * 60;
                    $min_regular_time += $diff_regular_time->i;
                        if($min_regular_time > 540){
                            $total_regular_time = 540 - $min_late;
                        }else{
                            $total_regular_time = $min_regular_time;
                        }

                    }else{
                    $diff_regular_time = date_diff(date_create($in),date_create($time_start));
                    $min_regular_time =  $diff_regular_time->days * 24 * 60;
                    $min_regular_time += $diff_regular_time->h * 60;
                    $min_regular_time += $diff_regular_time->i;
                     if($min_regular_time > 540){
                            $total_regular_time = 540;
                        }else{
                            $total_regular_time = $min_regular_time;
                        }

                    }
            }else{

                    if(strtotime($in) > strtotime($time_start)){

                    $diff_entry_1 = date_diff(date_create($in),date_create($out));
                    $min_diff_entry_1 =  $diff_entry_1->days * 24 * 60;
                    $min_diff_entry_1 += $diff_entry_1->h * 60;
                    $min_diff_entry_1 += $diff_entry_1->i;

                    // validation
                    $lunchbreak = strtotime($time_start) + 14400;
                    $date_lunch = date('H:s:i',$lunchbreak);
                    if(strtotime($out) > $lunchbreak){
                          $diff_break = date_diff(date_create($out),date_create($date_lunch));
                            $min_break =  $diff_break->days * 24 * 60;
                            $min_break += $diff_break->h * 60;
                            $min_break += $diff_break->i; 

                            $valid_break = $min_break;                

                    }else{
                            $valid_break = 0;
                    }


                    if($min_diff_entry_1 > 240){
                        $late_entry_a = 240 - $min_late;
                    }else{
                        $late_entry_a = $min_diff_entry_1;
                    }


                    $diff_entry_2 = date_diff(date_create($in_2),date_create($out_2));
                    $min_diff_entry_2 =  $diff_entry_2->days * 24 * 60;
                    $min_diff_entry_2 += $diff_entry_2->h * 60;
                    $min_diff_entry_2 += $diff_entry_2->i;

                    if($min_diff_entry_2 > 240){
                        $late_entry_b = 240;
                    }else{
                        $late_entry_b = $min_diff_entry_2;
                    }

                    $compute_reg_time = $late_entry_a + $late_entry_b;

                    if($compute_reg_time > 480){
                        $total_regular_time = 480;
                    }else{
                        $total_regular_time = $compute_reg_time;
                    }



                     
                    }else{

                     $diff_entry_1 = date_diff(date_create($time_start),date_create($out));
                    $min_diff_entry_1 =  $diff_entry_1->days * 24 * 60;
                    $min_diff_entry_1 += $diff_entry_1->h * 60;
                    $min_diff_entry_1 += $diff_entry_1->i;


                    if($min_diff_entry_1 > 240){
                        $late_entry_a = 240;
                    }else{
                        $late_entry_a = $min_diff_entry_1;
                    }


                    $diff_entry_2 = date_diff(date_create($in_2),date_create($out_2));
                    $min_diff_entry_2 =  $diff_entry_2->days * 24 * 60;
                    $min_diff_entry_2 += $diff_entry_2->h * 60;
                    $min_diff_entry_2 += $diff_entry_2->i;

                    if($min_diff_entry_2 > 240){
                        $late_entry_b = 240;
                    }else{
                        $late_entry_b = $min_diff_entry_2;
                    }

                    $compute_reg_time = $late_entry_a + $late_entry_b;

                    if($compute_reg_time > 480){
                        $total_regular_time = 480;
                    }else{
                        $total_regular_time = $compute_reg_time;
                    }

                     
                    

 

                    }

                }


            $total_hrs_work = $total_regular_time +  $min_overtime;

            if($total_hrs_work < 240 || $total_hrs_work < 360){
                $status = 'halfday';
                $no_halfday = 1;
            }else{
                if(strtotime($out_2) < strtotime($time_end)-300){
                    $status = 'Undertime';
                    $no_halfday = 0;
                }elseif(strtotime($out_2) > strtotime($time_end)+1800)
                {
                    $status = 'Overtime';
                    $no_halfday = 0;
                }else{
                    $status = 'Regular';
                    $no_halfday = 0;
                }
            }

            $insert_entries = mysqli_query($conn,"INSERT INTO `tbl_time_entries`(`Employees_ID`,`Time_In`,`Time_Out`,`Date_Attendance`,`Time_In2`,`Time_Out2`,`No_Late`,`Late`,`No_Undertime`,`Overtime`,`Undertime`,`Regular_Time`,`Hours_Worked`,`Time_Start`,`Time_End`,`Shift_Type`,`No_Halfday`,`Daily_Status`,`Entry_Types`) VALUES ($id,'$in','$out','$date','$in_2','$out_2','$late','$min_late','$undertime','$min_overtime','$min_undertime','$total_regular_time','$total_hrs_work','$time_start','$time_end','$shift_type','$no_halfday','$status','Indoor')");


            // computation 

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
                // echo "<br>";
                // echo " regulartime". $total_regular_time;
                // echo "<br>";
                // echo "<br>";
                // echo "<br>";
            $regular_salary = ((((((($result_daily_rate['Daily_Rate']/8)/60)/100)*$sched_rate)/100)*$percent_holiday)*$total_regular_time);

            $Ot_salary = ((((((((($result_daily_rate['Daily_Rate']/8)/60)/100)*$sched_rate)/100)*$overtime_rate)/100)*$percent_holiday)*$min_overtime);

            $late_deduction = ((((((($result_daily_rate['Daily_Rate']/8)/60)/100)*$sched_rate)/100)*$percent_holiday)*$min_late);

            $undertime_deduction = ((((((($result_daily_rate['Daily_Rate']/8)/60)/100)*$sched_rate)/100)*$percent_holiday)*$min_undertime);

            $total_salary = $regular_salary + $Ot_salary;



           $Earning = "INSERT INTO `tbl_salary_earning` (`Employees_ID`,`Regular_Salary`,`Ot_Salary`,`Daily_Salary`,`Earning_Date`,`Undertime_D`,`Late_D`,`Salary_Status`) VALUES ('$id','$regular_salary','$Ot_salary','$total_salary','$date','$undertime_deduction','$late_deduction','Unpaid')";
         $conn->query($Earning) or die ($conn->error);




            // third
            }else{
                 echo "already insert";
                 echo "<BR>";

            }










            } // second
           
             
            
        }// first  
       
        
        
    }
   


    
   

    

   }



header("Location: ../side-bar/attendance/csv_layout.php");





?>
