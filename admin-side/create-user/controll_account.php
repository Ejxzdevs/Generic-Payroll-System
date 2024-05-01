<?php 

include "../../connection/connection.php";

$id = $_GET['id'];

$select_account_user = "SELECT * FROM tbl_accounts WHERE Account_ID = '$id'";
$query_account_user = mysqli_query($conn,$select_account_user);
$result_account_user = mysqli_fetch_assoc($query_account_user);


if($result_account_user['Status'] == 'Enable'){
	$status = "Disable";
	$update_account = mysqli_query($conn,"UPDATE `tbl_accounts` SET `Status`= '$status' WHERE Account_ID = '$id'");
}else{
	$status = "Enable";
	$update_account = mysqli_query($conn,"UPDATE `tbl_accounts` SET `Status`= '$status' WHERE Account_ID = '$id'");
}



?>