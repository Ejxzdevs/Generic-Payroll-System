<?php 

include "../../connection/connection.php";




if(isset($_GET['id']))

{




$id = $_GET['id'];


$delete_deduction_emp = "DELETE FROM `tbl_deduction_emp` WHERE Deduction_ID = $id " ;
$dele = mysqli_query($conn,$delete_deduction_emp);


$delete_deduction = "DELETE from tbl_deductions_list WHERE Deduction_ID = $id";
$del = mysqli_query($conn,$delete_deduction);


}

header("Location: deduction_layout.php");





?>