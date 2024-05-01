<!-- Employees.php -->
<?php
include "../../connection/connection.php";
							
	$sql = "SELECT * FROM(SELECT Employees_ID, @dept_id:= Department_ID AS Department_ID,(SELECT `Department_Name` FROM tbl_department WHERE `Department_ID` = @dept_id ) as Department_Name, @pos_id:= Position_ID AS Position_ID ,(SELECT `Position_Name` FROM tbl_position WHERE Position_ID = @pos_id) as Position_Name from tbl_employees_information) tbl_employees_information 
	JOIN (SELECT Employees_ID,First_Name, Last_Name FROM tbl_personal_information) tbl_personal_information on tbl_employees_information.Employees_ID = tbl_personal_information.Employees_ID";
	$query = mysqli_query($conn,$sql);
	$employee=$query->fetch_assoc();


if(isset($_POST['submit-name'])){
				
	$search = $_POST['search-name'];

	$sql = "SELECT * FROM(SELECT Employees_ID, @dept_id:= Department_ID AS Department_ID,(SELECT `Department_Name` FROM tbl_department WHERE `Department_ID` = @dept_id ) as Department_Name, @pos_id:= Position_ID AS Position_ID ,(SELECT `Position_Name` FROM tbl_position WHERE Position_ID = @pos_id) as Position_Name FROM tbl_employees_information) tbl_employees_information 
	JOIN (SELECT Employees_ID,First_Name,Last_Name FROM tbl_personal_information WHERE Last_Name LIKE '$search%' OR First_Name LIKE '$search%') tbl_personal_information on tbl_employees_information.Employees_ID = tbl_personal_information.Employees_ID";
	$query = mysqli_query($conn,$sql);
	$employee=mysqli_fetch_assoc($query);
					
	}

// view info-emp

	if(isset($_GET['id']))
	{

	$id = $_GET['id'];
	$view_emp = "
	SELECT * FROM(SELECT Employees_ID,Employee_Image ,Employee_Types,
		@dept_id:= Department_ID AS Department_ID,(SELECT `Department_Name` FROM tbl_department WHERE `Department_ID` = @dept_id ) as Department_Name,
		@pos_id:= Position_ID AS Position_ID,
		(SELECT `Position_Name` FROM tbl_position WHERE Position_ID = @pos_id) as Position_Name,
		@sched_id:= Schedule_ID AS Schedule_ID,(SELECT `Schedule_Name` FROM tbl_types_schedule WHERE Schedule_ID = @sched_id) as Schedule_Name

		from tbl_employees_information WHERE Employees_ID ='$id') tbl_employees_information

	INNER JOIN (SELECT * ,Employees_ID as a FROM tbl_personal_information WHERE Employees_ID ='$id') tbl_personal_information on tbl_employees_information.Employees_ID = tbl_personal_information.Employees_ID

	


	";

	$query_view_emp = mysqli_query($conn,$view_emp);
	$res_view_emp=mysqli_fetch_assoc($query_view_emp);
		
	}

	// edit info emp

	if(isset($_GET['update_id']))
	{

	$id = $_GET['update_id'];
	$view_emp = "
	SELECT * FROM(SELECT Employees_ID,Employee_Image,Employee_Types,
		@dept_id:= Department_ID AS Department_ID,(SELECT `Department_Name` FROM tbl_department WHERE `Department_ID` = @dept_id ) as Department_Name,
		@pos_id:= Position_ID AS Position_ID,
		(SELECT `Position_Name` FROM tbl_position WHERE Position_ID = @pos_id) as Position_Name,
		@sched_id:= Schedule_ID AS Schedule_ID,(SELECT `Schedule_Name` FROM tbl_types_schedule WHERE Schedule_ID = @sched_id) as Schedule_Name

		from tbl_employees_information WHERE Employees_ID ='$id') tbl_employees_information

	JOIN (SELECT * FROM tbl_personal_information WHERE Employees_ID ='$id') tbl_personal_information on tbl_employees_information.Employees_ID = tbl_personal_information.Employees_ID
	";

	$query_view_emp = mysqli_query($conn,$view_emp);
	$res_view_emp=mysqli_fetch_assoc($query_view_emp);

	$dep_id = $res_view_emp['Department_ID'];
	$pos_id = $res_view_emp['Position_ID'];
	$sched_id = $res_view_emp['Schedule_ID'];

	$edit_dept = "SELECT * FROM tbl_department WHERE Department_ID != $dep_id  ";
	$query_dept= mysqli_query($conn,$edit_dept);
	$result_query_dept=$query_dept->fetch_assoc();

	$edit_position = "SELECT * FROM tbl_position WHERE Position_ID != $pos_id ";
	$query_position= mysqli_query($conn,$edit_position);
	$res_position=$query_position->fetch_assoc();
	
	$edit_sched = "SELECT * FROM tbl_types_schedule WHERE Schedule_ID != $sched_id ";
	$query_sched= mysqli_query($conn,$edit_sched);
	$res_sched=$query_sched->fetch_assoc();
		
	}

// add employee

	$sql = "SELECT * FROM tbl_department ";
	$department = mysqli_query($conn,$sql);
	$result=$department->fetch_assoc();

	$sql = "SELECT * FROM tbl_position ";
	$position= mysqli_query($conn,$sql);
	$pos=$position->fetch_assoc();

// SCHEDULE
	
	$sql = "SELECT * FROM tbl_types_schedule ";
	$schedule= mysqli_query($conn,$sql);
	$sche=$schedule->fetch_assoc();


		error_reporting(1);
// select option


		
?>