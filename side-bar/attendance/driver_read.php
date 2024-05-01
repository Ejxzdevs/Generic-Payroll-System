<?php 
include "../../connection/connection.php";

date_default_timezone_set('Asia/Manila');
$current_date = date('Y-m-d');

$sql = "SELECT * FROM(SELECT Employees_ID,First_Name,Last_Name FROM tbl_personal_information) tbl_personal_information INNER JOIN
	(SELECT Employees_ID,Time_In,Time_Out,Time_Start,Time_End,Overtime,Regular_Time,Hours_Worked,Entry_Types ,Date_Attendance FROM tbl_time_entries where Entry_Types = 'Outdoor' AND Date_Attendance = '$current_date') tbl_time_entries ON tbl_personal_information.Employees_ID = tbl_time_entries.Employees_ID";
$query = mysqli_query($conn,$sql);
$entries=$query->fetch_assoc();

if(isset($_POST['submit'])){

	$name = $_POST['name'];
	$sql = "SELECT * FROM(SELECT Employees_ID,First_Name,Last_Name FROM tbl_personal_information WHERE First_Name Like '$name%' or Last_Name LIKE '$name%') tbl_personal_information INNER JOIN
	(SELECT Employees_ID,Time_In,Regular_Time,Hours_Worked,Time_Out,Time_Start,Time_End,Overtime,Date_Attendance,Entry_Types FROM tbl_time_entries where Entry_Types = 'Outdoor' AND Date_Attendance = '$current_date') tbl_time_entries ON tbl_personal_information.Employees_ID = tbl_time_entries.Employees_ID";
$query = mysqli_query($conn,$sql);
$entries=$query->fetch_assoc();
}

							


error_reporting(0);

?>