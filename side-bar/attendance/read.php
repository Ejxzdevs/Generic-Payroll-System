<?php 
include "../../connection/connection.php";

date_default_timezone_set('Asia/Manila');
$current_date = date('Y-m-d');

$sql = "SELECT * FROM
(SELECT * FROM tbl_personal_information) tbl_personal_information INNER JOIN
(SELECT * FROM tbl_time_entries WHERE Date_Attendance = '$current_date' AND Entry_Types = 'Outdoor') tbl_time_entries 
ON tbl_personal_information.Employees_ID = tbl_time_entries.Employees_ID
 ";
$query = mysqli_query($conn,$sql);
$entries=$query->fetch_assoc();


if(isset($_POST['submit'])){

$name = $_POST['name'];

$sql = "SELECT * FROM
(SELECT * FROM tbl_personal_information WHERE First_Name LIKE '$name%' Or Last_Name LIKE '$name%') tbl_personal_information INNER JOIN
(SELECT * FROM tbl_time_entries WHERE Date_Attendance = '$current_date') tbl_time_entries 
ON tbl_personal_information.Employees_ID = tbl_time_entries.Employees_ID
 ";
$query = mysqli_query($conn,$sql);
$entries=$query->fetch_assoc();

}						
error_reporting(0);


?>