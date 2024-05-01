<?php 
// session_start();
// include "../../connection/connection.php";

// $filter = $_SESSION['Emp'];

$select_regular_tax = "SELECT * FROM (SELECT * FROM tbl_employees_information) tbl_employees_information 
INNER JOIN (SELECT * FROM tbl_personal_information  GROUP BY Employees_ID) tbl_personal_information
ON tbl_employees_information.Employees_ID = tbl_personal_information.Employees_ID
INNER JOIN (SELECT Employees_ID,Count(Tax_emp_ID) as total_tax FROM tbl_tax_emp GROUP BY Employees_ID) tbl_tax_emp ON tbl_personal_information.Employees_ID = tbl_tax_emp.Employees_ID";
$query_regular_tax = mysqli_query($conn,$select_regular_tax);
$result_regular_tax = mysqli_fetch_assoc($query_regular_tax);


if(isset($_GET['emp_id'])){

$id = $_GET['emp_id'];

$select_emp_tax = "SELECT * FROM (SELECT Employees_ID,Employee_Image , @dept_id:= Department_ID AS Department_ID,
	(SELECT `Department_Name` FROM tbl_department WHERE `Department_ID` = @dept_id ) as Department_Name, @pos_id:= Position_ID AS Position_ID ,
	(SELECT `Position_Name` FROM tbl_position WHERE Position_ID = @pos_id) as Position_Name FROM tbl_employees_information WHERE Employees_ID = $id) tbl_employees_information INNER JOIN 
	(SELECT Employees_ID , First_Name , Last_Name FROM tbl_personal_information WHERE Employees_ID = $id) tbl_personal_information ON tbl_employees_information.Employees_ID = tbl_personal_information.Employees_ID
	 INNER JOIN(SELECT Employees_ID,Tax_Status,@tid:= Tax_ID as Tax_ID,Tax_emp_ID,
	 (SELECT `Tax_Name` from tbl_tax_list WHERE Tax_ID = @tid) as Tax_Name,
	 (SELECT `Employee_Share` from tbl_tax_list WHERE Tax_ID = @tid) as Employee_Share
	 FROM tbl_tax_emp WHERE Employees_ID = $id )tbl_tax_emp
	 ON tbl_personal_information.Employees_ID = tbl_tax_emp.Employees_ID";

$query_emp_tax = mysqli_query($conn,$select_emp_tax);
$result_emp_tax = mysqli_fetch_assoc($query_emp_tax); 




}



?>