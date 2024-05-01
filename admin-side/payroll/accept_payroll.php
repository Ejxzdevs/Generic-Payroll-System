<?php 
include "../../connection/connection.php";



$id = $_GET['id'];

$accept_payroll = "UPDATE `tbl_payroll_list` SET `Payroll_Status`='Pending' WHERE Payroll_ID = $id ";
$query_payroll = mysqli_query($conn,$accept_payroll);


header("Location: payroll_layout.php");




?>