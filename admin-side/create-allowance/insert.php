<?php 
include "../../connection/connection.php";

$select_id = "SELECT * FROM tbl_employees_information ";
$query_id= mysqli_query($conn,$select_id);
$res_query_id = mysqli_fetch_assoc($query_id); 



if (isset($_POST['submit'])) { 

	$choose = $_POST['choose_emp'];
	$allowance_name = $_POST['name'];
	$allowance_value = $_POST['amount'];
	$status = "Enable";
	$condition = "Active";


	$insert_allowance_list = "INSERT INTO `tbl_allowance_list` (`Allowance_Name`,`Allowance_Value`,`Allowance_Condition`) VALUES ('$allowance_name',$allowance_value,'$condition')" ;
	$conn->query($insert_allowance_list) or die ($conn->error);
	$allowance_ID = mysqli_insert_id($conn);

	if($choose == 'All'){

	
			do{
	
			$id = $res_query_id['Employees_ID'] ;
	
			$insert_allowance_emp = "INSERT INTO `tbl_allowance_emp` (`Employees_ID`,`Allowance_ID`,`Allowance_Status`) VALUES ($id,$allowance_ID,'$status')" ;
			$conn->query($insert_allowance_emp) or die ($conn->error);


			}while($res_query_id=$query_id->fetch_assoc());

	}

	elseif($choose == 'Regular'){

		$select_driver = "SELECT * FROM tbl_employees_information WHERE Employee_Types = 'Regular'";
		$query_driver = mysqli_query($conn,$select_driver);
		$res_driver_id = mysqli_fetch_assoc($query_driver);
		

		do{
			$driver_id = $res_driver_id['Employees_ID']; 

			$insert_allowance_emp = "INSERT INTO `tbl_allowance_emp` (`Employees_ID`,`Allowance_ID`,`Allowance_Status`) VALUES ($driver_id,$allowance_ID,'$status')" ;
			$conn->query($insert_allowance_emp) or die ($conn->error);

			}while($res_driver_id=$query_driver->fetch_assoc());

		}


		elseif($choose == 'Casual')
		{

		$select_driver = "SELECT * FROM tbl_employees_information WHERE Employee_Types = 'Casual'";
		$query_driver = mysqli_query($conn,$select_driver);
		$res_driver_id = mysqli_fetch_assoc($query_driver);
		

			do{

			$driver_id = $res_driver_id['Employees_ID'];
		
			$insert_allowance_emp = "INSERT INTO `tbl_allowance_emp` (`Employees_ID`,`Allowance_ID`,`Allowance_Status`) VALUES ($driver_id,$allowance_ID,'$status')" ;
			$conn->query($insert_allowance_emp) or die ($conn->error);

			}while($res_driver_id=$query_driver->fetch_assoc());

		}


		elseif($choose == 'Driver'){

		$select_driver = "SELECT * FROM tbl_accounts WHERE User_Type = 'Driver'";
		$query_driver = mysqli_query($conn,$select_driver);
		$res_driver_id = mysqli_fetch_assoc($query_driver);
		

		do{
			$driver_id = $res_driver_id['Employees_ID'];

			$insert_allowance_emp = "INSERT INTO `tbl_allowance_emp` (`Employees_ID`,`Allowance_ID`,`Allowance_Status`) VALUES ($driver_id,$allowance_ID,'$status')" ;
			$conn->query($insert_allowance_emp) or die ($conn->error);

			}while($res_driver_id=$query_driver->fetch_assoc());

		}
		elseif($choose == 'Single'){

			$id = $_POST['id'];
			$insert_allowance_emp = "INSERT INTO `tbl_allowance_emp` (`Employees_ID`,`Allowance_ID`,`Allowance_Status`) VALUES ($id,$allowance_ID,'$status')" ;
			$conn->query($insert_allowance_emp) or die ($conn->error);
		}
		elseif($choose == 'None'){

			
		}







}
header("Location: allowance_layout.php");


?>