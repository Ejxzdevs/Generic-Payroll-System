<?php 

include "../../connection/connection.php";


$deduction_list = "SELECT * FROM tbl_deductions_list ";
$query_list = mysqli_query($conn,$deduction_list);
$res_query_list = mysqli_fetch_assoc($query_list); 

error_reporting(0);


if(isset($_GET['id'])){

	$id = $_GET['id'];

$edit_deduction = "SELECT * FROM tbl_deductions_list WHERE Deduction_ID = '$id' ";
$query_edit_allowance = mysqli_query($conn,$edit_deduction);
$res_edit_allowance = mysqli_fetch_assoc($query_edit_allowance); 
}




if(isset($_POST['submit'])){


$name = $_POST['name'];

$deduction_list = "SELECT * FROM tbl_deductions_list where Deduction_Name LIKE '$name%'";
$query_list = mysqli_query($conn,$deduction_list);
$res_query_list = mysqli_fetch_assoc($query_list); 

}

?>