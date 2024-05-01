<?php 
include "../../connection/connection.php";

if (isset($_POST['Submit-ot'])){

	date_default_timezone_set('Asia/Manila');
	echo $date = date("Y-m-d");
	echo "<br>";
	echo $ot_hrs = $_POST['ot'];
	echo "<br>";
	echo $id = $_POST['employees-id-ot'];

	$sql = "SELECT Employees_ID,@sid:= Schedule_ID as Schedule_ID,
	(SELECT Schedule_Out FROM tbl_types_schedule WHERE Schedule_ID = @sid) 
	as Schedule_Out FROM tbl_employees_information WHERE Employees_ID = $id ";
	$query = mysqli_query($conn,$sql);
	$time_entries=$query->fetch_assoc();
	

	echo $time_entries['Schedule_Out'];
	echo "<br>";

	echo $con_str = strtotime($time_entries['Schedule_Out']) ;
	echo "<br>";
	echo $add_ot = ($con_str + (60*60)*$ot_hrs);
	echo "<br>";
	echo $time_end = date("H:i:s",$add_ot);
	echo "<br>";
	echo  date("g:i:s a",$add_ot);

	
	$update_time_entry = mysqli_query($conn,"UPDATE `tbl_time_entries` SET Time_End = '$time_end' where Date_Attendance = '$date' AND Employees_ID = '$id' ");
			

	
	echo header("Location: schedule_layout.php");
}









?>