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



$schedule = $_POST['schedule'];
$department =$_POST['department'] ;
$position =$_POST['position'];



// select all position
$select_position = "SELECT * FROM tbl_position WHERE Position_ID = $position";
$query_position = mysqli_query($conn,$select_position);
$fetch_postion = mysqli_fetch_assoc($query_position);

$daily_rate = $fetch_postion['Daily_Salary'];


// department
$update_employee_department = mysqli_query($conn,"UPDATE `tbl_employees_information` SET `Schedule_ID`= '$schedule', `Department_ID`='$department' WHERE Employees_ID = $id");

// position

$update_employee_postion = mysqli_query($conn,"UPDATE `tbl_employees_information` SET `Position_ID`='$position', `Daily_Rate` = $daily_rate WHERE Employees_ID = $id");

// schedule

$update_employee_schedule = mysqli_query($conn,"UPDATE `tbl_employees_information` SET `Schedule_ID`= '$schedule'WHERE Employees_ID = $id");

// emp type

$update_employee_postion = mysqli_query($conn,"UPDATE `tbl_employees_information` SET `Employee_Types` = '$type' WHERE Employees_ID = $id");



}

header("Location: emp_edit_info_layout.php?update_id=" .$id);



?>