
<!-- Employees.php POP UP -->
<?php
include "../../connection/connection.php";

if(isset($_GET['id'])){


$id = $_GET['id'];


		$employees_information = " DELETE FROM tbl_types_schedule WHERE Schedule_ID = '$id'";
		$conn->query($employees_information) or die ($conn->error);
		echo header("Location: schedule_layout.php");



}?>

