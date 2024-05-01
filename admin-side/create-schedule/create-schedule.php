
<!-- Employees.php POP UP -->
<?php
include "../../connection/connection.php";

if(isset($_POST['submit'])){


$shift_name = $_POST['shift_name'];
$start = $_POST['time_start'];
$end = $_POST['time_end'];

if($_POST['shift_rate'] == NULL){
	$rate = 100;
}
if($_POST['shift_rate'] < 100){
	$rate = 100;
}else{
	$rate = $_POST['shift_rate'];
}


		$employees_information = "INSERT INTO `tbl_types_schedule`(`Schedule_Name`,`Schedule_In`,`Schedule_Out`,`Schedule_Rate`) VALUES ('$shift_name ','$start ','$end','$rate')";
		$conn->query($employees_information) or die ($conn->error);
	

		echo header("Location: schedule_layout.php");



}?>

