<?php 
include "../connection/connection.php";
session_start();

if(isset($_POST['submit'])){


$username = $_POST['username'];
$password = $_POST['password'];

$select_user ="SELECT Account_ID,Employees_ID,Username,Password,Status,User_Type FROM tbl_accounts where Username ='$username' AND Password ='$password' AND Status ='Enable'";
$query_user = mysqli_query($conn,$select_user);
$res_user = mysqli_fetch_assoc($query_user);

echo $_SESSION['emp_id'] = $res_user['Employees_ID'];

if($res_user['User_Type'] =='Driver'){
	
	header("Location: option-entry/profile.php");
	
}elseif($res_user['User_Type'] =='Regular'){

	header("Location: option-entry/regular/profile.php");
}else{
	header("Location: login.php");

}




}


?>