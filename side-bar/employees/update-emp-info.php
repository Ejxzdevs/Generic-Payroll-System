<?php
include "../../connection/connection.php";

if(isset($_POST['update-info'])){

$id = $_POST['id'];

$firstname =$_POST['firstname'];
$lastname =$_POST['lastname'] ;
$middlename =$_POST['middlename'] ;
$suffix =$_POST['suffix'] ;

$city =$_POST['city'] ;
$street =$_POST['street'] ;
$zip =$_POST['zipcode'] ;
$province =$_POST['province'];

$email =$_POST['email'] ;
$contact =$_POST['contact'];
$status = $_POST['status'];
$gender = $_POST['gender'];

$department =$_POST['department'] ;
$position =$_POST['position'] ;



$sql = " UPDATE `tbl_employees_information` SET Job_Department = '$department', Position = '$position' WHERE Employees_ID = '$id' ";
$conn->query($sql) or die ($conn->error);

$sql1 = " UPDATE `tbl_personal_information` SET 
First_Name = '$firstname',
Last_Name = '$lastname',
Middle_Name = '$middlename',
Suffix = '$suffix', 

Email = '$email', 
Contact_Number = '$contact' , 
Status = '$status', 
Gender = '$gender' , 

Street = '$street',
City = '$city', 
Province = '$province' , 
Zip_Code = '$zip'  
WHERE Employees_ID = '$id' ";

$conn->query($sql1) or die ($conn->error);

header("location: employee_view_layout.php?id=" .$id);
}


?>