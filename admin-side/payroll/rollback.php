<?php 
include "../../connection/connection.php";




$id = $_GET['id'];


// $select_payroll = "SELECT * FROM `tbl_payroll_list` WHERE Payroll_ID = $id ";
// $query_payroll = mysqli_query($conn,$select_payroll);
// $fetch_payroll = mysqli_fetch_assoc($query_payroll);

// echo $fetch_payroll['Payroll_Start'];
// echo $fetch_payroll['Payroll_End'];
// echo $fetch_payroll['Payroll_Emp_Type'];


$rollback = "SELECT * FROM `tbl_salary_record` WHERE Payroll_ID = $id ";
$query_rollback = mysqli_query($conn,$rollback);
$fetch_rollback = mysqli_fetch_assoc($query_rollback);

do{

	$id_earning = $fetch_rollback['Earning_ID'];

	$update_earning = mysqli_query($conn,"UPDATE `tbl_salary_earning` SET `Salary_Status`= 'Unpaid' WHERE Earning_ID = $id_earning");
 
 	$delete_salary_record = mysqli_query($conn,"DELETE FROM tbl_salary_record WHERE Earning_ID = $id_earning ");

}while($fetch_rollback=$query_rollback->fetch_assoc());


$update_payroll = mysqli_query($conn,"UPDATE `tbl_payroll_list` SET `Payroll_Status`= 'Pending' WHERE Payroll_ID = $id ");

header("Location: record_layout.php");

?>