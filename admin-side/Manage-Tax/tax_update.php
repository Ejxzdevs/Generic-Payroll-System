<?php 
include "../../connection/connection.php";

$id = $_GET['id'];
$tax = $_GET['tax_id'];

$select_tax = "SELECT * FROM tbl_tax_emp where Tax_emp_id = $tax ";
$query_tax = mysqli_query($conn,$select_tax);
$result_tax = mysqli_fetch_assoc($query_tax);


$status = $result_tax['Tax_Status'];

if($status == 'Enable'){


	$update_tax =mysqli_query($conn,"UPDATE `tbl_tax_emp` SET `Tax_Status`='Disable' WHERE Tax_emp_ID = $tax");
}else if($status == 'Disable'){
	$update_tax =mysqli_query($conn,"UPDATE `tbl_tax_emp` SET `Tax_Status`='Enable' WHERE Tax_emp_ID = $tax");
}



header("Location: tax_edit_layout.php?emp_id=" .$id);


?>