<!-- TABLE -->

<?php 

	include "../../connection/connection.php";


	$sql = "SELECT * FROM tbl_holiday";
	
	$holiday = mysqli_query($conn,$sql);
	$res_holiday=mysqli_fetch_assoc($holiday);


	if(isset($_POST['submit']))
	{


	$name = $_POST['name'];


	$sql = "SELECT * FROM tbl_holiday where Holiday_Name LIKE '$name%'";
	
	$holiday = mysqli_query($conn,$sql);
	$res_holiday=mysqli_fetch_assoc($holiday);

	}
	

	if(isset($_GET['id'])){

	$id = $_GET['id'];


	$sql1 = "SELECT * FROM tbl_holiday WHERE ID = '$id' ";
	$e_holiday = mysqli_query($conn,$sql1);
	$result_e_holiday=mysqli_fetch_assoc($e_holiday);

	error_reporting(0);

	}

	error_reporting(0);
?>

