<?php 
include "../../connection/connection.php";


if(isset($_POST['submit'])){

$date = date('Y-n-d', strtotime($_POST['petsa']));
$rate = $_POST['rate'];
$name = $_POST['name'];


$employees_information = "INSERT INTO `tbl_holiday`(`Holiday_Name`,`Doh`,`Rate`) VALUES ('$name ','$date ','$rate ')";
		$conn->query($employees_information) or die ($conn->error);

		echo header("Location: holiday_layout.php");
}


?>