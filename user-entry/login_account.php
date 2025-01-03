<?php 
include "../connection/connection.php";
session_start();
isset($_POST['submit']);

if(empty($_POST['user']) && empty($_POST['pass']))
{

}else{
	$username = trim($_POST['user']);
	$password = trim($_POST['pass']);

	$sql = "SELECT * FROM tbl_accounts WHERE TRIM(Username) = '$username' AND Password = '$password'";
	$query = mysqli_query($conn,$sql);
	$users = mysqli_fetch_array($query);
	if($user){

	$id = $users['Employees_ID'];

	$_SESSION['Emp'] == 'Regular';
	$_SESSION['username'] = $_POST['user'];
	$_SESSION['password'] = $_POST['pass'];
	$_SESSION['id_user'] = $users['Employees_ID'];
	$_SESSION['type'] = $users['User_Type'];
	$_SESSION['status'] = $users['Status'];

	if($_SESSION['type'] == "Admin")

	{
		if ($_SESSION['status'] == "Enable") {
			echo header("Location: ../admin-side/dashboard/dashboard_layout.php");
			exit();
		}else{
			echo header("location: login.php");
			exit();
		}
	}

	if($_SESSION['type'] == "Processor")
	{
		if ($_SESSION['status'] == "Enable") {
			header("location: ../side-bar/dashboard/dashboard_layout.php");
			exit();
		}else{
			header("location: login.php");
			exit();
		}
	}

	}else{
		header("location: login.php");
	}
 }

