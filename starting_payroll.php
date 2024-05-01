<?php 
include "connection/connection.php";



$select = "SELECT * FROM tbl_accounts ";
$query = mysqli_query($conn,$select);
$row = mysqli_num_rows($query);


if($row == 0){
	header("Location: user-entry/configure_company.php");
}else{
	header("Location: user-entry/login.php");
}



?>