<?php 
include '../connection/connection.php';

if(isset($_POST['submit'])){

	$email = $_POST['email'];
	$username = $_POST['username'];
	$password = $_POST['password'];
	$passowrd2 = $_POST['repassword'];

	$select_company = "SELECT * FROM tbl_company_information ORDER BY ID DESC ";
	$query_company = mysqli_query($conn,$select_company);
	$result = mysqli_fetch_assoc($query_company);

	echo $id = $result['ID'];
	echo "<br>";

	$disable_foreign_key = mysqli_query($conn,'SET FOREIGN_KEY_CHECKS=0');
	echo "<br>";
	$insert_admin = mysqli_query($conn," 
		INSERT INTO `tbl_accounts`(`Username`, `Password`, `Status`,`User_Type`, `Email`, `Company_ID`) VALUES ('$username ','$password','Enable','Admin','$email',$id)");
	$enable_foreign_key = mysqli_query($conn,'SET FOREIGN_KEY_CHECKS=1');

	if($insert_admin == TRUE)
	{
		header("Location: login.php");
	}ELSE{
		$delete_company = "DELETE FROM tbl_company_information ";
		$query_company = mysqli_query($conn,$delete_company);
		header("Location: configure_company.php");
	}



}
?>