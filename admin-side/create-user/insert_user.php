<!-- Employees.php POP UP -->
<?php
include "../../connection/connection.php";

if(isset($_POST['submit'])){


$username = $_POST['username'];
$password = $_POST['password'];
$repassword = $_POST['re_password'];
$account_type = $_POST['account_type'];
$id = $_POST['id'];
$status = "Enable";

		$employees_information = "INSERT INTO `tbl_accounts`(`Employees_ID`,`Username`,`Password`,`User_Type`,`Status`) VALUES ('$id','$username','$password','$account_type','$status')";
		$conn->query($employees_information) or die ($conn->error);
		// $id = mysqli_insert_id($conn);

		echo header("Location: user_layout.php");



}?>

