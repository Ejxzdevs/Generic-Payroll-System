<?php
include "../../connection/connection.php";

$id = $_POST['id'];
$username = $_POST['username'];
$password = $_POST['password'];
$type = $_POST['user_type'];
$status = $_POST['status'];


$sql = " UPDATE `tbl_accounts` SET Username = '$username', Password = '$password', User_Type = '$type' WHERE Account_ID = '$id'" ;

	
	$conn->query($sql) or die ($conn->error);

	

echo header("location: user_edit_layout.php?id=".$id);



?>