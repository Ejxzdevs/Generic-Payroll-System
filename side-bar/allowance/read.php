<?php 

include "../../connection/connection.php";

$select_emp_allowance = "SELECT * FROM (SELECT Employees_ID ,First_Name,Last_Name from tbl_personal_information ) tbl_personal_information INNER JOIN
(SELECT Employees_ID , count(Allowance_ID) as no_allowance, sum(Allowance_Value) as total_allowance , Allowance_Status FROM tbl_allowance_emp  group by Employees_ID )tbl_allowance_emp ON tbl_personal_information.Employees_ID = tbl_allowance_emp.Employees_ID ";

$query_allowance = mysqli_query($conn,$select_emp_allowance);
$res_query_allowance = mysqli_fetch_assoc($query_allowance);

if(isset($_POST['submit-search']))
{

$name = $_POST['name'];

$select_emp_allowance = "SELECT * FROM (SELECT Employees_ID ,First_Name,Last_Name from tbl_personal_information WHERE First_Name LIKE '$name%' OR Last_Name LIKE '$name%' ) tbl_personal_information LEFT JOIN
(SELECT Employees_ID , count(Allowance_Name) as no_allowance, sum(Allowance_Value) as total_allowance , Allowance_Status FROM tbl_allowance_emp WHERE Allowance_Status = 'Enable' group by Employees_ID )tbl_allowance_emp ON tbl_personal_information.Employees_ID = tbl_allowance_emp.Employees_ID ";



$query_allowance = mysqli_query($conn,$select_emp_allowance);
$res_query_allowance = mysqli_fetch_assoc($query_allowance);


}



// POP UP

if(isset($_GET['id']))
{

$id = $_GET['id'];


$select_allowance_info = "SELECT * FROM (SELECT Employees_ID,Employee_Image,
	@did:= Department_ID as Department_ID,(SELECT `Department_Name` from tbl_department where Department_ID = @did) as Department_Name,
	@pid:= Position_ID as Position_ID,(SELECT `Position_Name` from tbl_position where Position_ID = @pid) as Position_Name


	FROM tbl_employees_information WHERE Employees_ID = '$id') tbl_employees_information



	 INNER JOIN
	(SELECT Employees_ID , First_Name , Last_Name FROM tbl_personal_information WHERE Employees_ID = '$id') tbl_personal_information
	ON tbl_employees_information.Employees_ID = tbl_personal_information.Employees_ID
	LEFT JOIN (SELECT Employees_ID,Allowance_Status,Allowance_Value ,@aid:= Allowance_ID as Allowance_ID,(SELECT `Allowance_Name` from tbl_allowance_list WHERE Allowance_ID = @aid and Employees_ID = $id) as Allowance_Name FROM tbl_allowance_emp WHERE Employees_ID = '$id') tbl_allowance_emp ON tbl_personal_information.Employees_ID = tbl_allowance_emp.Employees_ID  
"; 
$query_a = mysqli_query($conn,$select_allowance_info);
$result_allowance_info = mysqli_fetch_assoc($query_a); 





error_reporting(0);



}


?>