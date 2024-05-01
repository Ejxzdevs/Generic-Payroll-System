<?php 
include "../../connection/connection.php";

$select_id = "SELECT * FROM tbl_employees_information ";
$query_id= mysqli_query($conn,$select_id);
$res_query_id = mysqli_fetch_assoc($query_id); 



if (isset($_POST['submit'])) { 

	$choose = $_POST['choose_emp'];
	$deduction_name = $_POST['name'];
	$deduction_value = $_POST['amount'];
	$status = "Enable";
	$condition = "Active";

	$insert_deduction_list = "INSERT INTO `tbl_deductions_list` (`Deduction_Name`,`Deduction_Value`,`Deduction_Condition`) VALUES ('$deduction_name',$deduction_value,'$condition')" ;
	$conn->query($insert_deduction_list) or die ($conn->error);
	$deduction_ID = mysqli_insert_id($conn);

	if($choose == 'All'){

	do{
	
	$id = $res_query_id['Employees_ID'] ;
	
	$insert_deduction_emp = "INSERT INTO `tbl_deduction_emp` (`Employees_ID`,`Deduction_ID`,`Deduction_Status`) VALUES ($id,$deduction_ID,'$status')" ;
	$conn->query($insert_deduction_emp) or die ($conn->error);


	}while($res_query_id=$query_id->fetch_assoc());


	}else if($choose == 'Regular'){

		$select_regular = "SELECT * FROM tbl_employees_information WHERE Employee_Types = 'Regular'";
		$query_regular = mysqli_query($conn,$select_regular);
		$res_regular = mysqli_fetch_assoc($query_regular);

		do{

			$regular_ID = $res_regular['Employees_ID'];

			$insert_deduction_emp = "INSERT INTO `tbl_deduction_emp` (`Employees_ID`,`Deduction_ID`,`Deduction_Status`) VALUES ($regular_ID,$deduction_ID,'Enable')" ;
			$conn->query($insert_deduction_emp) or die ($conn->error);


		}while($res_regular=$query_regular->fetch_assoc());

	}else if($choose == 'Casual'){

		$select_casual = "SELECT * FROM tbl_employees_information WHERE Employee_Types = 'Casual'";
		$query_casual = mysqli_query($conn,$select_casual);
		$res_casual = mysqli_fetch_assoc($query_casual);

		do{

			$casual_ID = $res_casual['Employees_ID'];

			$insert_deduction_emp = "INSERT INTO `tbl_deduction_emp` (`Employees_ID`,`Deduction_ID`,`Deduction_Status`) VALUES ($casual_ID,$deduction_ID,'Enable')" ;
			$conn->query($insert_deduction_emp) or die ($conn->error);


		}while($res_casual=$query_casual->fetch_assoc());

	}else if($choose == 'Driver'){

		$select_driver = "SELECT * FROM tbl_accounts WHERE User_Type = 'Driver'";
		$query_driver = mysqli_query($conn,$select_driver);
		$res_driver = mysqli_fetch_assoc($query_driver);

		do{

			$driver_ID = $res_driver['Employees_ID'];

			$insert_deduction_emp = "INSERT INTO `tbl_deduction_emp` (`Employees_ID`,`Deduction_ID`,`Deduction_Status`) VALUES ($driver_ID,$deduction_ID,'Enable')" ;
			$conn->query($insert_deduction_emp) or die ($conn->error);


		}while($res_driver=$query_driver->fetch_assoc());

	}else if($choose == 'Single'){

			$Emp_ID = $_POST['id'];

			$insert_deduction_emp = "INSERT INTO `tbl_deduction_emp` (`Employees_ID`,`Deduction_ID`,`Deduction_Status`) VALUES ($Emp_ID,$deduction_ID,'Enable')" ;
			$conn->query($insert_deduction_emp) or die ($conn->error);

	}else if($choose == 'None'){

	

	}









}
header("Location: deduction_layout.php");


?>