<?php 

include "../../connection/connection.php";


$id = $_GET['id'];


$select_deduction_info = "SELECT * FROM (SELECT Employees_ID,Employee_Image , Job_Department,Position FROM tbl_employees_information WHERE Employees_ID = '$id') tbl_employees_information INNER JOIN
	(SELECT Employees_ID , First_Name , Last_Name FROM tbl_personal_information WHERE Employees_ID = '$id') tbl_personal_information
	ON tbl_employees_information.Employees_ID = tbl_personal_information.Employees_ID
	LEFT JOIN (SELECT * FROM tbl_statutory_deduction_emp WHERE Employees_ID = '$id') tbl_statutory_deduction ON tbl_personal_information.Employees_ID = tbl_statutory_deduction.Employees_ID  
"; 
$query_a = mysqli_query($conn,$select_deduction_info);
$result_deduction_info = mysqli_fetch_assoc($query_a); 

error_reporting(0);

// $data = array(
// 	"id"=>$result_deduction_info['Employees_ID'], 
// 	"Employee_Image"=>$result_deduction_info['Employee_Image'], 
// 	"Job_Department"=>$result_deduction_info['Job_Department'], 
// 	"Position"=>$result_deduction_info['Position'],  
// 	"firstname"=>$result_deduction_info['First_Name'],
// 	"lastname"=>$result_deduction_info['Last_Name'], 
// 	"Deduction_Name"=>$result_deduction_info['Deduction_Name'],  
// 	"Deduction_Value"=>$result_deduction_info['Deduction_Value'],  
// 	"Status"=>$result_deduction_info['Status']
// );

// echo json_encode($data);

// 

?>