<?php 

include "../../connection/connection.php";


$select_type = "SELECT * FROM `tbl_payroll_set_date` ";
$query_type = mysqli_query($conn,$select_type);
$fetch_type = mysqli_fetch_assoc($query_type);


if(isset($_GET['id'])){

$id = $_GET['id'];

$edit_type = "SELECT * FROM `tbl_payroll_set_date` WHERE Payroll_Set_date_ID = $id";
$query_edit_type = mysqli_query($conn,$edit_type);
$result_type = mysqli_fetch_assoc($query_edit_type);
}

?>