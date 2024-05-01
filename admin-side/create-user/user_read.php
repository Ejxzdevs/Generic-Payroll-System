<!-- TABLE -->
<?php 

	include "../../connection/connection.php";


	$sql = "SELECT * FROM (SELECT Employees_ID , First_Name,Last_Name FROM tbl_personal_information) tbl_personal_information JOIN (SELECT Employees_ID ,@did:=Department_ID as Department_ID,(SELECT `Department_Name` FROM `tbl_department` WHERE `Department_ID` = @did ) as Department_Name ,Employee_Image FROM tbl_employees_information) tbl_employees_information ON tbl_employees_information.Employees_ID = tbl_personal_information.Employees_ID JOIN (SELECT Employees_ID, Account_ID ,User_Type,Username,Status FROM tbl_accounts) tbl_accounts ON tbl_accounts.Employees_ID = tbl_personal_information.Employees_ID"; 
	$query = mysqli_query($conn,$sql);
	$accounts=mysqli_fetch_assoc($query);

	if(isset($_POST['submit']))
	{

	$name = $_POST['name'];
	$sql = "SELECT * FROM (SELECT Employees_ID , First_Name,Last_Name FROM tbl_personal_information WHERE First_Name Like '$name%' or Last_Name Like '$name%') tbl_personal_information
	JOIN (SELECT Employees_ID  ,@did:=Department_ID as Department_ID,(SELECT `Department_Name` FROM `tbl_department` WHERE `Department_ID` = @did ) as Department_Name, Employee_Image FROM tbl_employees_information ) tbl_employees_information
	ON tbl_employees_information.Employees_ID = tbl_personal_information.Employees_ID 
	JOIN (SELECT Employees_ID ,Account_ID,User_Type,Username,Status FROM tbl_accounts) tbl_accounts
	ON tbl_accounts.Employees_ID = tbl_personal_information.Employees_ID"; 
	$query = mysqli_query($conn,$sql);
	$accounts=mysqli_fetch_assoc($query);


	}


	if(isset($_GET['id'])){

	$id = $_GET['id'];

	$edit_user = "SELECT * FROM (SELECT Employees_ID , First_Name,Last_Name FROM tbl_personal_information) tbl_personal_information
	JOIN (SELECT Employees_ID  ,@did:=Department_ID as Department_ID,(SELECT `Department_Name` FROM `tbl_department` WHERE `Department_ID` = @did ) as Department_Name, Employee_Image FROM tbl_employees_information ) tbl_employees_information
	ON tbl_employees_information.Employees_ID = tbl_personal_information.Employees_ID 
	JOIN (SELECT Employees_ID,Account_ID,Password ,Username,Status,User_Type FROM tbl_accounts) tbl_accounts
	ON tbl_accounts.Employees_ID = tbl_personal_information.Employees_ID WHERE Account_ID = '$id' "; 
	$query_user = mysqli_query($conn,$edit_user);
	$res_user=mysqli_fetch_assoc($query_user);

	$type = $res_user['User_Type'];
	$status = $res_user['Status'];


	$select_user_type = "SELECT * FROM tbl_user_types where User_Types != '$type'";
	$query_user_type = mysqli_query($conn,$select_user_type);
	$result_usertype=$query_user_type->fetch_assoc();

	error_reporting(0);
	}



$select_create_account_types= "SELECT * FROM tbl_user_types ";
$query_create_account_types = mysqli_query($conn,$select_create_account_types);
$result_create_account_types=$query_create_account_types->fetch_assoc();

error_reporting(0);

?>

