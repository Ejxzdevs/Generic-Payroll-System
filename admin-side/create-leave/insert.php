<?php 
include "../../connection/connection.php";


if(isset($_POST['submit'])){


$leave = $_POST['name'];
$number = $_POST['number'];


$employees_information = "INSERT INTO `tbl_Leave`(`Leave_Name`,`Num_Leave`) VALUES ('$leave ','$number')";
		$conn->query($employees_information) or die ($conn->error);

		echo header("Location: leave_layout.php");
}


?>