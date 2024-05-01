<?php 

include "../../connection/connection.php";

$select_emp_deduc = "SELECT * FROM (SELECT Employees_ID ,First_Name,Last_Name from tbl_personal_information ) tbl_personal_information INNER JOIN
(SELECT Employees_ID ,count(Deduction_List_ID) as no_deduction ,sum(Deduction_Value) as total_deduction , Deduction_Status FROM tbl_deduction_emp group by Employees_ID )tbl_deduction_emp ON tbl_personal_information.Employees_ID = tbl_deduction_emp.Employees_ID ";

$query_deduc = mysqli_query($conn,$select_emp_deduc);
$res_query_deduc = mysqli_fetch_assoc($query_deduc);

if(isset($_POST['submit-search']))
{

$name = $_POST['name'];

$select_emp_deduc = "SELECT * FROM (SELECT Employees_ID ,First_Name,Last_Name from tbl_personal_information WHERE First_Name LIKE '$name%' or Last_Name LIKE '$name%') tbl_personal_information LEFT JOIN
(SELECT Employees_ID , count(Deduction_List_ID) as no_deduction, sum(Deduction_Value) as total_deduction , Deduction_Status FROM tbl_deduction_emp WHERE Deduction_Status = 'Enable' group by Employees_ID )tbl_deduction_emp ON tbl_personal_information.Employees_ID = tbl_deduction_emp.Employees_ID ";



$query_deduc = mysqli_query($conn,$select_emp_deduc);
$res_query_deduc = mysqli_fetch_assoc($query_deduc);


}



// POP UP

if(isset($_GET['id']))
{

$id = $_GET['id'];


$select_deduction_info = "SELECT * FROM (SELECT Employees_ID,Employee_Image ,
 @did:= Department_ID as Department_ID,(SELECT `Department_Name` from tbl_department where Department_ID = @did) as Job_Department,
	@pid:= Position_ID as Position_ID,(SELECT `Position_Name` from tbl_position where Position_ID = @pid) as Position FROM tbl_employees_information WHERE Employees_ID = '$id') tbl_employees_information INNER JOIN
	(SELECT Employees_ID , First_Name , Last_Name FROM tbl_personal_information WHERE Employees_ID = '$id') tbl_personal_information
	ON tbl_employees_information.Employees_ID = tbl_personal_information.Employees_ID
	LEFT JOIN (SELECT Employees_ID,Deduction_Status,Deduction_Value,
		@did:= Deduction_ID as Deduction_ID,(SELECT `Deduction_Name` from tbl_deductions_list where Deduction_ID = @did) as Deduction_Name FROM tbl_deduction_emp WHERE Employees_ID = '$id') tbl_deduction_emp ON tbl_personal_information.Employees_ID = tbl_deduction_emp.Employees_ID  
"; 
$query_a = mysqli_query($conn,$select_deduction_info);
$result_deduction_info = mysqli_fetch_assoc($query_a); 





error_reporting(0);



}


?>