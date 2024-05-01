<?php 

include "../../connection/connection.php";

if(isset($_POST['btn-leave'])){

$leave = $_POST['leave_type'];
$id = $_POST['id'];
$message = $_POST['message'];
$date = $_POST['date_leave'];


$insert_leave = "INSERT INTO `tbl_file_leave`(`Employees_ID`, `Leave_Types`, `Leave_Messages`, `Leave_Date`, `Leave_Count`, `Leave_Status`) VALUES ($id,'$leave','$message','$date',1,'Pending')";
$query_leave = mysqli_query($conn,$insert_leave);



}

header("Location: leave.php");



?>