<?php
include "../../connection/connection.php";

if(isset($_GET['id'])){

$id = $_GET['id'];
$delete = "DELETE FROM tbl_personal_information Where Employees_ID = $id ";
$query = mysqli_query($conn,$delete);

$delete2 = "DELETE FROM tbl_salary_earning Where Employees_ID = $id ";
$query2 = mysqli_query($conn,$delete2);

$delete3 = "DELETE FROM tbl_time_entries Where Employees_ID = $id ";
$query3 = mysqli_query($conn,$delete3);


$delete4 = "DELETE FROM tbl_accounts Where Employees_ID = $id ";
$query4 = mysqli_query($conn,$delete4);

$delete5 = "DELETE FROM tbl_file_leave Where Employees_ID = $id ";
$query5 = mysqli_query($conn,$delete5);


$delete6 = "DELETE FROM tbl_leave_limit Where Employees_ID = $id ";
$query6 = mysqli_query($conn,$delete6);

$delete7 = "DELETE FROM tbl_allowance_emp WHERE Employees_ID = $id ";
$query7 = mysqli_query($conn,$delete7);

$delete8 = "DELETE FROM tbl_tax_emp WHERE Employees_ID = $id ";
$query8 = mysqli_query($conn,$delete8);

$delete9 = "DELETE FROM tbl_deduction_emp WHERE Employees_ID = $id ";
$query9 = mysqli_query($conn,$delete9);


// always last delete the tbl_employees_info bcoz there is the primary key
$delete10 = "DELETE FROM tbl_employees_information Where Employees_ID = $id ";
$query10 = mysqli_query($conn,$delete10);





echo header("location: employee_list_layout.php");
}
?>