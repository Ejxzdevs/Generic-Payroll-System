<?php 
include "../../connection/connection.php";


if(isset($_POST['submit'])){


$id = $_POST['id'];
$firstname =$_POST['firstname'];
$lastname =$_POST['lastname'];
$middlename =$_POST['middlename'];
$suffix =$_POST['suffix'];

$province =$_POST['province'];
$zip =$_POST['zipcode'];
$city =$_POST['city'];
$street =$_POST['street'];


$email =$_POST['email'] ;
$number =$_POST['number'];
$bday = date('Y-m-d', strtotime($_POST['birthdate']));

$gender = $_POST['gender'];
$status = $_POST['status'];
$type = $_POST['emp_type'];

$update_personal_info = mysqli_query($conn," UPDATE `tbl_personal_information` SET `Last_Name`='$lastname',`First_Name`='$firstname',`Middle_Name`='$middlename',`Birth_Date`='$bday',`Email`='$email',`Contact_Number`='$number',`Zip_Code`='$zip',`Province`='$province',`City`='$city',`Street`='$street',`Suffix`='$suffix',`Status`='$status',`Gender`='$gender' WHERE Employees_ID = $id");


$department =$_POST['department'] ;
$position =$_POST['position'];
$schedule = $_POST['schedule'];

$update_employee_info = mysqli_query($conn , "UPDATE `tbl_employees_information` SET `Schedule_ID`='$schedule',`Position_ID`='$position',`Department_ID`='$department',`Employee_Types` = '$type' WHERE Employees_ID = $id ");

$sss= $_POST['sss'];
$pagibig = $_POST['pagibig'];
$philhealth = $_POST['philhealth'];


$update_account_no_sss = mysqli_query($conn,"UPDATE `tbl_tax_emp` SET `Account_ID`='$sss' WHERE Tax_ID = 1");
$update_account_no_pagibig = mysqli_query($conn,"UPDATE `tbl_tax_emp` SET `Account_ID`='$pagibig' WHERE Tax_ID = 2");
$update_account_no_philhealth = mysqli_query($conn,"UPDATE `tbl_tax_emp` SET `Account_ID`='$philhealth' WHERE Tax_ID = 3");


}

header("Location: employee_view_layout.php?id=" .$id);



?>