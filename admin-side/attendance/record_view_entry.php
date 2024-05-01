<?php 

include "../../connection/connection.php";

$id = $_GET['id'];

$select_entry = "SELECT Time_Entries_ID,Date_Attendance,Time_End,Shift_Type,Time_In,Time_Out,Time_Start,Late,Undertime,Regular_Time,Overtime,Daily_Status,Time_In2,Time_Out2,Hours_Worked,
@eid:= Employees_ID as Employees_ID,
(SELECT `First_Name` from tbl_personal_information Where Employees_ID = @eid) as First_Name,
(SELECT `Last_Name` from tbl_personal_information Where Employees_ID = @eid) as Last_Name,
(SELECT `Department_ID` from tbl_employees_information Where Employees_ID = @eid) as dept_ID,
(SELECT `Department_Name` from tbl_department Where Department_ID = dept_ID) as Department_Name,
(SELECT `Employee_Image` from tbl_employees_information Where Employees_ID = @eid) as Employee_Image,
(SELECT `Position_ID` from tbl_employees_information Where Employees_ID = @eid) as Pos_ID,
(SELECT `Position_Name` from tbl_position Where Position_ID = Pos_ID) as Position_Name,
(SELECT `Schedule_ID` from tbl_employees_information Where Employees_ID = @eid) as Sche_ID,
(SELECT `Schedule_Name` from tbl_types_schedule WHERE Schedule_ID = Sche_ID) as Schedule_Name,
(SELECT `Schedule_In` from tbl_types_schedule WHERE Schedule_ID = Sche_ID) as Schedule_In
FROM tbl_time_entries WHERE Time_Entries_ID = $id";
$query_entry = mysqli_query($conn,$select_entry);
$result_entry = mysqli_fetch_assoc($query_entry);

$date = date("M-d-Y",strtotime($result_entry['Date_Attendance']));
$time_start = date('g:i A',strtotime($result_entry['Time_Start']));
$time_end = date('g:i A',strtotime($result_entry['Time_End']));
$time_in = date('g:i A',strtotime($result_entry['Time_In']));

if($result_entry['Time_Out'] == '00:00:00.000000'){
	$time_out = '';
}else{
	$time_out = date('g:i A',strtotime($result_entry['Time_Out']));
}

if($result_entry['Time_In2'] == '00:00:00.000000'){
	$time_in2 = '';
}else{
	$time_in2 = date('g:i A',strtotime($result_entry['Time_In2']));
}

if($result_entry['Time_Out2'] == '00:00:00.000000'){
	$time_out2 = '';
}else{

$time_out2 = date('g:i A',strtotime($result_entry['Time_Out2']));
}
if($result_entry['Late'] == 0){
$late = 0;
}else{
$late = $result_entry['Late'] . "mins";
}


if($result_entry['Undertime'] == 0){
	$undertime = 0;
}else{
	if($result_entry['Undertime'] == 1){
		$undertime = $result_entry['Undertime'] . 'min';
	}else if($result_entry['Undertime'] >= 2 AND $result_entry['Undertime'] <= 59){
		$undertime = $result_entry['Undertime'] . 'mins';
	}else if($result_entry['Undertime'] == 60){
		$undertime ='1hr';
	}else if($result_entry['Undertime'] == 61){
		$undertime ='1hr 1min';
	}else if($result_entry['Undertime'] >= 62 AND $result_entry['Undertime'] <= 119 ){
		$undertime = number_format(($result_entry['Undertime']/60),0) . "hr " . $result_entry['Undertime']%60 . 'mins';
	}elseif($result_entry['Undertime'] >= 120 ){
		$undertime =  number_format(($result_entry['Undertime']/60),0) . "hrs " . $result_entry['Undertime']%60 . 'mins';
	}
}

if($result_entry['Regular_Time']%60 == 0){
	if($result_entry['Regular_Time'] == 0){
		$regular_hours = '0';
	}else{
	$regular_hours = intval($result_entry['Regular_Time']/60) . 'hrs';
	}
}elseif($result_entry['Regular_Time']%60 >= 1){
	$regular_hours = intval($result_entry['Regular_Time']/60) . 'hrs ' . $result_entry['Regular_Time']%60 . 'mins';
}

if($result_entry['Overtime']%60 == 0){
	if($result_entry['Overtime'] == 0){
		$overtime = '0';
	}else{
		$overtime = intval($result_entry['Overtime']/60) . 'hrs';
	}
}elseif($result_entry['Overtime']%60 >= 1){
	$overtime = intval($result_entry['Overtime']/60) . 'hrs ' . $result_entry['Overtime']%60 . 'mins';
}

if($result_entry['Hours_Worked']%60 == 0){
	if($result_entry['Hours_Worked'] == 0){
		$total_hours = '0';
	}else{
		$total_hours = intval($result_entry['Hours_Worked']/60) . 'hrs';
	}
}elseif($result_entry['Hours_Worked']%60 >= 1){
	$total_hours = intval($result_entry['Hours_Worked']/60) . 'hrs ' . $result_entry['Hours_Worked']%60 . 'mins';
}


if($result_entry['Employee_Image'] == ''){
	$emp_img = '../employees/emp-image/user1.png';
}else{
	$emp_img = '../employees/emp-image/' . $result_entry['Employee_Image'];
}


$data = array(
	"id"=>$result_entry['Time_Entries_ID'],
	"emp_id"=>$result_entry['Employees_ID'],
	"firstname"=>$result_entry['First_Name'],
	"lastname"=>$result_entry['Last_Name'],
	"date"=>$date,
	"schedule"=>$result_entry['Shift_Type'],
	"department"=>$result_entry['Department_Name'],
	"position"=>$result_entry['Position_Name'],
	"image"=>$emp_img,
	"time_start"=>$time_start,
	"time_end"=>$time_end,
	"time_in"=>$time_in,
	"time_out"=>$time_out,
	"time_in2"=>$time_in2,
	"time_out2"=>$time_out2,
	"late"=>$late,
	"undertime"=>$undertime,
	"regular"=>$regular_hours,
	"overtime"=>$overtime,
	"total_hours"=>$total_hours,
	"status"=>$result_entry['Daily_Status']


	
);



echo json_encode($data);


?>