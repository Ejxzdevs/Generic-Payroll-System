<?php
include "connection.php";
require 'vendor/autoload.php';
date_default_timezone_set('Asia/Manila');
$current_date = date('Y-m-d');

use PhpOffice\PhpSpreadsheet\IOFactory;

define('ROW_SEPARATOR', '***');
define('EMPLOYEE_DATA_SEPARATOR', '$$$');

$inputFileName = 'report.xls';
$spreadsheet = IOFactory::load($inputFileName);

// Select the attendance sheet
$worksheet = $spreadsheet->getSheet(3);
$employees = [];
$data = "";
foreach ($worksheet->getRowIterator() as $k => $row) {

  if ($k <= 2) {
    $data .= ROW_SEPARATOR;
    continue;
  }
  if ($k == 3) {
    $data .= ROW_SEPARATOR;
  }
  $cellIterator = $row->getCellIterator();
  $cellIterator->setIterateOnlyExistingCells(TRUE);
  foreach ($cellIterator as $cell) {
    $data .= $cell->getValue() . ROW_SEPARATOR;
    if (substr($cell->getValue(), 0, strlen("Employee Sig:")) === "Employee Sig:") {
      $data .= EMPLOYEE_DATA_SEPARATOR;
    }
  }
}

$unfiltered_data = explode(EMPLOYEE_DATA_SEPARATOR, $data);
$unfiltered_data = array_filter($unfiltered_data, function ($d) {
  $has_length = strlen($d);
  $has_341_length = count(explode(ROW_SEPARATOR, $d)) == 341;
  return $has_length && $has_341_length;
});
$clean_employees = [];

foreach ($unfiltered_data as $employee) {
  $unfiltered_employee = explode(ROW_SEPARATOR, $employee);

  $ids = str_replace("ID:", "", $unfiltered_employee[3]);
  $date_range = str_replace("Date:", "", $unfiltered_employee[16]);
  $dates = explode(' ~ ', $date_range);

  $start = 83;
  $end = 274;
  $schedules = array_slice($unfiltered_employee, $start, $end - $start + 1);
  $chunks = array_chunk($schedules, 16);
  $schedules_clean = [];
  foreach ($chunks as $chunk) {
    $schedules_clean[] = [
      'date' => $chunk[0],
      'day' => $chunk[1],
      'timer1' => [
        'in' => $chunk[2],
        'out' => $chunk[3],
      ],
      'timer2' => [
        'in' => $chunk[4],
        'out' => $chunk[5],
      ],
    ];


    $id = str_replace("ID:", "", $unfiltered_employee[3]);
  echo "<br>";
  if($chunk[0] == ''){
    
  }else{
  echo $date = date("Y-m-d",strtotime("2023-".$chunk[0]));
  echo "<br>";
 
    
    // declaration

    echo $in = $chunk[2];

    if($chunk[3] == ''){
      echo  $out = '00:00:00.000000';
    }else{
      echo   $out = $chunk[3];
       }
    if($chunk[4] == ''){
        $in_2 = '00:00:00.000000';
   }else{
     $in_2 = $chunk[4];
        }
    if($chunk[5] == ''){
      $out_2 = $chunk[5];
    }else{
       $out_2 = $chunk[5];
    }

    // end declaration


    // validation per entries
    $compute_minutes = "SELECT * FROM (SELECT Employees_ID,
    @sid:= Schedule_ID AS Schedule_ID,
    (SELECT `Schedule_In` from tbl_types_schedule WHERE Schedule_ID = @sid) as Schedule_In,
    (SELECT `Schedule_Out` from tbl_types_schedule WHERE Schedule_ID = @sid) as Schedule_Out,
    (SELECT `Schedule_Rate` from tbl_types_schedule WHERE Schedule_ID = @sid) as Schedule_Rate,
    (SELECT `Schedule_Name` from tbl_types_schedule WHERE Schedule_ID = @sid) as Schedule_Name 
    FROM tbl_employees_information WHERE Employees_ID = $id) tbl_employees_information";
    $query_minutes = mysqli_query($conn,$compute_minutes);
    $result_minutes=$query_minutes->fetch_assoc();

    $time_start = $result_minutes['Schedule_In'];
    $time_end = $result_minutes['Schedule_Out'];
    $shift_type = $result_minutes['Schedule_Name'];


    $check_date_entries = "SELECT * FROM tbl_time_entries WHERE Employees_ID = $id AND Date_Attendance = '$date'";
    $query_date_entries = mysqli_query($conn,$check_date_entries);
    $fetch_entries = mysqli_fetch_assoc($query_date_entries);

            if($date != $fetch_entries['Date_Attendance']){ // third


           

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

             if($chunk[3] == '' && $chunk[4] == ''){

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
              }elseif($chunk[4] == '' && $chunk[5] == ''){


                    if(strtotime($in) > strtotime($time_start))
                    {
                    $diff_regular_time = date_diff(date_create($in),date_create($out));
                    $min_regular_time =  $diff_regular_time->days * 24 * 60;
                    $min_regular_time += $diff_regular_time->h * 60;
                    $min_regular_time += $diff_regular_time->i;
                        if($min_regular_time > 240){
                            $total_regular_time = 240 - $min_late;
                        }else{
                            $total_regular_time = $min_regular_time;
                        }

                    }else{

                            $diff_regular_time = date_diff(date_create($in),date_create($out));
                            $min_regular_time =  $diff_regular_time->days * 24 * 60;
                            $min_regular_time += $diff_regular_time->h * 60;
                            $min_regular_time += $diff_regular_time->i;
                        if($min_regular_time > 240){
                            $total_regular_time = 240;
                        }else{
                            $total_regular_time = $min_regular_time;
                        }


                    }
                }

              else{

                    if(strtotime($in) > strtotime($time_start)){

                    $diff_entry_1 = date_diff(date_create($in),date_create($out));
                    $min_diff_entry_1 =  $diff_entry_1->days * 24 * 60;
                    $min_diff_entry_1 += $diff_entry_1->h * 60;
                    $min_diff_entry_1 += $diff_entry_1->i;

                    // validation
                    $lunchbreak = strtotime($time_start) + 14400;
                    $date_lunch = date('H:s:i',$lunchbreak);
                    if(strtotime($out) > strtotime($lunchbreak)){
                          $diff_break = date_diff(date_create($out),date_create($date_lunch));
                            $min_break =  $diff_break->days * 24 * 60;
                            $min_break += $diff_break->h * 60;
                            $min_break += $diff_break->i; 

                            $valid_break = $min_break;                

                    }else{
                            $valid_break = 0;
                    }


                    if($min_diff_entry_1 > 240){
                        $late_entry_a = 240 - $min_late - $valid_break;
                    }else{
                        $late_entry_a = $min_diff_entry_1 - $valid_break;
                    }


                    $before_in_2 = strtotime($time_start) + 18000;
                    $d_in2 = date('H:s:i',strtotime($before_in_2));
                    if(strtotime($in_2) < strtotime($d_in2)){
                          $diff_before_in = date_diff(date_create($in_2),date_create($d_in2));
                            $min_before_in =  $diff_before_in->days * 24 * 60;
                            $min_before_in += $diff_before_in->h * 60;
                            $min_before_in += $diff_before_in->i; 

                            $before_in_mins = $min_before_in;                

                    }else{
                            $before_in_mins = 0;
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


                    $lunchbreak = strtotime($time_start) + 14400;
                    $date_lunch = date('H:s:i',strtotime($lunchbreak));
                    if(strtotime($out) > strtotime($lunchbreak)){
                          $diff_break = date_diff(date_create($out),date_create($date_lunch));
                            $min_break =  $diff_break->days * 24 * 60;
                            $min_break += $diff_break->h * 60;
                            $min_break += $diff_break->i; 

                            $valid_break = $min_break;                

                    }else{
                            $valid_break = 0;
                    }

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

                    $compute_reg_time = $late_entry_a + $late_entry_b - $valid_break;

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

            if($total_hrs_work < 240 || $total_hrs_work < 360){
                $minutes_undertime = 0;
            }else{
                $minutes_undertime = $min_undertime;
            }

            // INSERT ENTRY
              $insert_entries = mysqli_query($conn,"INSERT INTO `tbl_time_entries`(`Employees_ID`,`Time_In`,`Time_Out`,`Date_Attendance`,`Time_In2`,`Time_Out2`,`No_Late`,`Late`,`No_Undertime`,`Overtime`,`Undertime`,`Regular_Time`,`Hours_Worked`,`Time_Start`,`Time_End`,`Shift_Type`,`No_Halfday`,`Daily_Status`,`Entry_Types`) VALUES ($id,'$in','$out','$date','$in_2','$out_2','$late','$min_late','$undertime','$min_overtime','$minutes_undertime','$total_regular_time','$total_hrs_work','$time_start','$time_end','$shift_type','$no_halfday','$status','Indoor')");


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
              
               // DAILY RATE
               $fetch_daily_rate = "SELECT Daily_Rate,Employees_ID,@sid:= Schedule_ID AS Schedule_ID,
               (SELECT `Schedule_Rate` from tbl_types_schedule WHERE Schedule_ID = @sid) as Schedule_Rate
                FROM tbl_employees_information WHERE Employees_ID = $id ";
               $query_daily_rate= mysqli_query($conn,$fetch_daily_rate);
               $result_daily_rate = mysqli_fetch_assoc($query_daily_rate);

               $daily_rate = $result_daily_rate['Daily_Rate'];

               // FETCH ALL TIME
                $fetch_daily_attendance = "SELECT * FROM tbl_time_entries WHERE Employees_ID = $id AND Date_Attendance = '$date'";
               $query_daily_attendance= mysqli_query($conn,$fetch_daily_attendance);
               $result_daily_attendance = mysqli_fetch_assoc($query_daily_attendance);

               $late = $result_daily_attendance['Late'];
               echo "<br>";
               $undertime = $result_daily_attendance['Undertime'];
               echo "<br>";
               $overtime = $result_daily_attendance['Overtime'];
               echo "<br>";
               echo $sched_rate = $result_daily_rate['Schedule_Rate'];
                  echo "<br>";
               $regular_hrs = $result_daily_attendance['Regular_Time'];
               echo "<br>";

              $regular_salary = ((((((($daily_rate/8)/60)/100)*$sched_rate)/100)*$percent_holiday)*$regular_hrs);

               $Ot_salary = ((((((((($daily_rate/8)/60)/100)*$sched_rate)/100)*$overtime_rate)/100)*$percent_holiday)*$overtime);

              $late_deduction = ((((((($daily_rate/8)/60)/100)*$sched_rate)/100)*$percent_holiday)*$late);

              $undertime_deduction = ((((((($daily_rate/8)/60)/100)*$sched_rate)/100)*$percent_holiday)* $undertime);

              $total_salary = $regular_salary + $Ot_salary;




           $Earning = "INSERT INTO `tbl_salary_earning` (`Employees_ID`,`Regular_Salary`,`Ot_Salary`,`Daily_Salary`,`Earning_Date`,`Undertime_D`,`Late_D`,`Salary_Status`) VALUES ('$id','$regular_salary','$Ot_salary','$total_salary','$current_date','$undertime_deduction','$late_deduction','Unpaid')";
         $conn->query($Earning) or die ($conn->error);




            // third
            }else{
                 // echo "already insert";
                 // echo "<BR>";

            }




}


// last 
  }
  $clean_employees[] = [
    // 'unfiltered' => $unfiltered_employee,
    'id' => $id,
    'date' => [
      'from' => $dates[0],
      'to' => $dates[1],
      // 'text' => $date_range
    ],
    // 'schedules_dump' => $schedules,
    // 'schedule_chunks' => $chunks,
    'schedules' => $schedules_clean
  ];


}
json_encode($clean_employees);


// $start_date = $dates[0];
// $end_date = $dates[1];


// $insert_csv_record = "INSERT INTO `tbl_upload_csv`(`Date_Uploaded`,`Start_Date`,`End_Date`) VALUES ('$current_date','$start_date','$end_date')";
//     $conn->query($insert_csv_record) or die ($conn->error);
