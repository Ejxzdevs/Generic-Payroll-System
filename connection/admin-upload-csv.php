<?php
include "connection.php";
require 'vendor/autoload.php';
date_default_timezone_set('Asia/Manila');
$current_date = date('Y-m-d');


if(isset($_POST['submit']));

$insert_csv_record = "INSERT INTO `tbl_upload_csv`(`Date_Uploaded`) VALUES ('$current_date')";
$conn->query($insert_csv_record) or die ($conn->error);

// $filename = $_FILES['file_upload']['name'];
use PhpOffice\PhpSpreadsheet\IOFactory;


$filename = $_FILES['file_upload']['tmp_name'];

define('ROW_SEPARATOR', '***');
define('EMPLOYEE_DATA_SEPARATOR', '$$$');


$spreadsheet = IOFactory::load($filename);

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

  $ida = str_replace("ID:", "", $unfiltered_employee[3]);
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

    // START CODE HERE DECLARATION:
    if($chunk[3] == ''){
        // SKIP EMPTY ROW
    }else{
        // start of coding
                           $id = str_replace("ID:", "", $unfiltered_employee[3]);
                           echo $date = "2023-" . substr($chunk[0],0,2) . "-" . substr($chunk[0],3,5);

                       
                            $in = $chunk[2];
                            echo "<br>";
                          
                            if($chunk[3] == ''){
                            $out = '00:00:00.000000';
                            }else{
                          echo  $out = $chunk[3];
                            }
                            if($chunk[4] == ''){
                            $in_2 = '00:00:00.000000';
                            }else{
                          echo  $in_2 = $chunk[4];
                            }
                            if($chunk[5] == ''){
                            $out_2 = '00:00:00.000000';
                            }else{
                          echo  $out_2 = $chunk[5];
                            }

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

    // declaration IN OUT

    $time_start = $result_minutes['Schedule_In'];
    $time_end = $result_minutes['Schedule_Out'];
    $shift_type = $result_minutes['Schedule_Name'];

    // CHECK DATE ENTRIES IF ALREADY EXIST 

    $check_date_entries = "SELECT * FROM tbl_time_entries WHERE Employees_ID = $id AND Date_Attendance = '$date'";
    $query_date_entries = mysqli_query($conn,$check_date_entries);
    $fetch_entries = mysqli_fetch_assoc($query_date_entries);

     if($date != $fetch_entries['Date_Attendance']){
        // STARTING OF CODING FOR TIME ENTRIE

        
                    // CHECK IF UNDERTIME OR OVERTIME
                    if(strtotime($out_2) < strtotime($time_end)-60){
                    // undertime
                    

                    if($chunk[4] == '' && $chunk[5] == ''){
                        $min_undertime = 0;
                        $undertime = 0;
                    }ELSE{    
                        $diff_undertime = date_diff(date_create($time_end),date_create($out_2));
                        $min_undertime =  $diff_undertime->days * 24 * 60;
                        $min_undertime += $diff_undertime->h * 60;
                        $min_undertime += $diff_undertime->i;
                        $undertime = 1;
                        $a = 0;


                    }


                    // ECHO "UNDERTIME";
                    }else{
                    // overtime
                    $undertime = 0;
                    $diff_overtime = date_diff(date_create($time_end),date_create($out_2));
                    $min_overtime =  $diff_overtime->days * 24 * 60;
                    $min_overtime += $diff_overtime->h * 60;
                    $min_overtime += $diff_overtime->i;
                    $min_undertime = 0;
                    // ECHO "OVERTIME";

                    if($min_overtime > 30){
                        $a = $min_overtime;
                    }ELSE{
                        $a = 0;
                    }


                    }


                    // CHECK LATE OR EARLY 

                     if(strtotime($in) < strtotime($time_start)){
                     // EARLY
                    $late = 0;    
                    $min_late = 0; 
                    // ECHO "EARLY";  

                    }else{
                    // LATE
                    $late = 1;
                    $diff_late = date_diff(date_create($time_start),date_create($in));
                    $min_late =  $diff_late->days * 24 * 60;
                    $min_late += $diff_late->h * 60;
                    $min_late += $diff_late->i;
                    // ECHO "LATE";
                    }




                    // COMPUTATION OF REGULAR TIME

                    // NO BREAK TIME
                    IF($chunk[3] == '' && $chunk[4] == ''){

                        // FOR LATE
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
                            $diff_regular_time = date_diff(date_create($time_start),date_create($out_2));
                            $min_regular_time =  $diff_regular_time->days * 24 * 60;
                            $min_regular_time += $diff_regular_time->h * 60;
                            $min_regular_time += $diff_regular_time->i;
                                if($min_regular_time > 540){
                                    $total_regular_time = 540;
                                }else{
                                    $total_regular_time = $min_regular_time;
                                }
                        }







                    }ELSE{
                    // WITH BREAK TIME

                        // LATE
                        // chunk 2 == time in
                        // chunk 3 == time out
                        // chunck 4 == time in 2
                        // chunk 5 == time out 2
                        IF(strtotime($chunk[2]) > strtotime($time_start)){

                            // lunch break

                            $str_lunch = strtotime($time_start) + 14400;
                            $lunch = date('H:i:s',$str_lunch);

                            if(strtotime($out) > $str_lunch){
                            $lunch_mins = date_diff(date_create($out),date_create($lunch));
                            $min_over =  $lunch_mins->days * 24 * 60;
                            $min_over += $lunch_mins->h * 60;
                            $min_over += $lunch_mins->i;
                            }else{
                               $min_over = 0; 
                            }

                          

                            // VALIDATE TIME ENTRY





                            $diff_first_entry = date_diff(date_create($in),date_create($lunch));
                            $min_first_entry =  $diff_first_entry->days * 24 * 60;
                            $min_first_entry += $diff_first_entry->h * 60;
                            $min_first_entry += $diff_first_entry->i;

                            $first_entry = $min_first_entry;

                            if($chunk[4] == '' && $chunk[5] == ''){
                                $total_second_entry = 0;
                            }ELSE{
                                $start_in2_str = strtotime($time_start) + 18000;
                                $start_in2_date = date('H:i:s',$start_in2_str);

                                if($min_undertime > 0){
                                    $adjust_mins = $min_undertime;
                                }else{
                                    $adjust_mins  = 0;
                                }

                                if(strtotime($in_2) <  $start_in2_str){

                                $diff_second_entry = date_diff(date_create($time_end),date_create($start_in2_date));
                                $min_second_entry =  $diff_second_entry->days * 24 * 60;
                                $min_second_entry += $diff_second_entry->h * 60;
                                $min_second_entry += $diff_second_entry->i;

                                }else{
                                    $diff_second_entry = date_diff(date_create($in_2),date_create($time_end));
                                    $min_second_entry =  $diff_second_entry->days * 24 * 60;
                                    $min_second_entry += $diff_second_entry->h * 60;
                                    $min_second_entry += $diff_second_entry->i;


                                }
                                
                                $final = $min_second_entry - $adjust_mins;


                          

                                

                                







                            }

                            $total_regular_time =  $final + $first_entry;





                            // LATE WITH BREAK
                        }else{
                            // NOT LATE


                            $str_lunch = strtotime($time_start) + 14400;
                            $lunch = date('H:i:s',$str_lunch);

                            if(strtotime($out) > $str_lunch){
                            $lunch_mins = date_diff(date_create($out),date_create($lunch));
                            $min_over =  $lunch_mins->days * 24 * 60;
                            $min_over += $lunch_mins->h * 60;
                            $min_over += $lunch_mins->i;
                            }else{
                               $min_over = 0; 
                            }
                             // lunch break

                            

                            $diff_first_entry = date_diff(date_create($time_start),date_create($lunch));
                            $min_first_entry =  $diff_first_entry->days * 24 * 60;
                            $min_first_entry += $diff_first_entry->h * 60;
                            $min_first_entry += $diff_first_entry->i;

                            $first_entry = $min_first_entry;

                            if($chunk[4] == '' && $chunk[5] == ''){
                                $total_second_entry = 0;
                            }ELSE{
                                $start_in2_str = strtotime($time_start) + 18000;
                                $start_in2_date = date('H:i:s',$start_in2_str);

                                if(strtotime($in_2) <  $start_in2_str){

                                if($min_undertime > 0){
                                    $adjust_mins = $min_undertime;
                                }else{
                                    $adjust_mins  = 0;
                                }

                                $diff_second_entry = date_diff(date_create($time_end),date_create($start_in2_date));
                                $min_second_entry =  $diff_second_entry->days * 24 * 60;
                                $min_second_entry += $diff_second_entry->h * 60;
                                $min_second_entry += $diff_second_entry->i;

                                }else{
                                    $diff_second_entry = date_diff(date_create($in_2),date_create($time_end));
                                    $min_second_entry =  $diff_second_entry->days * 24 * 60;
                                    $min_second_entry += $diff_second_entry->h * 60;
                                    $min_second_entry += $diff_second_entry->i;


                                }
                                  $final = $min_second_entry - $adjust_mins;



                            }

                            $total_regular_time = $final + $first_entry;






                        }







                    









                    }
                     $total_hours_worked = $total_regular_time + $a;


                    if($total_hours_worked > 510){
                        $status = 'Overtime';
                        $no_halfday = 0;
                    }else if($total_hours_worked >= 475 && $total_hours_worked <= 509){
                        $status = 'Regular';
                        $no_halfday = 0;
                    }else if($total_hours_worked >= 361 && $total_hours_worked <=480){
                        $status = 'Undertime';
                        $no_halfday = 0;
                    }else if($total_hours_worked < 240 || $total_hours_worked <360){
                        $status = 'Halfday';
                        $no_halfday = 1;
                    }


 echo $chunk[3];
                     // INSERT ENTRY
                    $insert_entries = mysqli_query($conn,"INSERT INTO `tbl_time_entries`(`Employees_ID`,`Time_In`,`Time_Out`,`Date_Attendance`,`Time_In2`,`Time_Out2`,`No_Late`,`Late`,`No_Undertime`,`Overtime`,`Undertime`,`Time_Start`,`Time_End`,`Shift_Type`,`Entry_Types`,`Regular_Time`,`Daily_Status`,`No_Halfday`,`Hours_Worked`) VALUES ($id,'$in','$out','$date','$in_2','$out_2','$late','$min_late','$undertime','$a','$min_undertime','$time_start','$time_end','$shift_type','Indoor','$total_regular_time','$status','$no_halfday','$total_hours_worked')");


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

               $time_id = $result_daily_attendance['Time_Entries_ID'];
               $earning_date = $result_daily_attendance['Date_Attendance'];
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


           $Earning = "INSERT INTO `tbl_salary_earning` (`Employees_ID`,`Regular_Salary`,`Ot_Salary`,`Daily_Salary`,`Earning_Date`,`Undertime_D`,`Late_D`,`Salary_Status`,`Time_Entries_ID`) VALUES ('$id','$regular_salary','$Ot_salary','$total_salary','$earning_date','$undertime_deduction','$late_deduction','Unpaid','$time_id')";
         $conn->query($Earning) or die ($conn->error);





     }ELSE{
        // DATE IS EXISTING IN THE DATABASE
        header("Location: ../admin-side/attendance/csv_layout.php");
     } 



header("Location: ../admin-side/attendance/csv_layout.php");
        // end of coding
    }



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
$start_date = $dates[0];
$end_date = $dates[1];

$update_csv = "UPDATE `tbl_upload_csv` SET `Start_Date`='$start_date',`End_Date`='$end_date' WHERE Date_Uploaded = '$current_date' ";
$query_csv = mysqli_query($conn,$update_csv);

}
json_encode($clean_employees);


