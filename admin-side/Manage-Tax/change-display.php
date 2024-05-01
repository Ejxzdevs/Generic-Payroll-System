<?php 

include "../../connection/connection.php";


$filter = $_GET['filter'];

$select_regular_tax = "SELECT * FROM (SELECT * FROM tbl_employees_information WHERE 
	Employee_Types = '$filter') tbl_employees_information 
INNER JOIN (SELECT * FROM tbl_personal_information  GROUP BY Employees_ID) tbl_personal_information
ON tbl_employees_information.Employees_ID = tbl_personal_information.Employees_ID
INNER JOIN (SELECT Employees_ID,Count(Tax_emp_ID) as total_tax FROM tbl_tax_emp GROUP BY Employees_ID) tbl_tax_emp ON tbl_personal_information.Employees_ID = tbl_tax_emp.Employees_ID";
$query_regular_tax = mysqli_query($conn,$select_regular_tax);
$result_regular_tax = mysqli_fetch_assoc($query_regular_tax);






?>