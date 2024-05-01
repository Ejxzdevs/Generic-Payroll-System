<?php 

include "../../connection/connection.php";

$id = $_GET['id'];

$select_tax= "SELECT * FROM tbl_tax_list WHERE Tax_ID = '$id'";
$query_tax = mysqli_query($conn,$select_tax);
$res_tax = mysqli_fetch_assoc($query_tax);



if($res_tax['Tax_Status'] == 'Enable'){
	$status = "Disable";
	$update_account = mysqli_query($conn,"UPDATE `tbl_tax_list` SET `Tax_Status`= '$status' WHERE Tax_ID = '$id'");
}else{
	$status = "Enable";
	$update_account = mysqli_query($conn,"UPDATE `tbl_tax_list` SET `Tax_Status`= '$status' WHERE Tax_ID = '$id'");
}



?>