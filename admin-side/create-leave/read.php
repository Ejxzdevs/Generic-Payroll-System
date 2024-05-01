<!-- TABLE -->

<?php 

	include "../../connection/connection.php";


	$sql = "SELECT * FROM tbl_leave";
	
	$leave = mysqli_query($conn,$sql);
	$res_leave=mysqli_fetch_assoc($leave);

	error_reporting(0);

	// filter

	if(isset($_POST['submit']))
	{

	$name = $_POST['name'];

	$sql = "SELECT * FROM tbl_leave WHERE Leave_Name like '$name%'";
	
	$leave = mysqli_query($conn,$sql);
	$res_leave=mysqli_fetch_assoc($leave);
	}

	

	if(isset($_GET['id'])){

	$id = $_GET['id'];


	$sql1 = "SELECT * FROM tbl_leave WHERE Leave_ID = '$id' ";
	$e_leave = mysqli_query($conn,$sql1);
	$result_e_leave=mysqli_fetch_assoc($e_leave);

	error_reporting(0);

	}
?>

