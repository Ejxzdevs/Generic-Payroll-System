<?php 
include "../../connection/connection.php";


if(isset($_POST['btn-submit'])){


$tax_id = $_POST['tax_id'];

$type = $_POST['Emp_Type'];
$status = $_POST['status'];


if($type == 'Regular'){

	$select_regular = "SELECT * FROM tbl_employees_information WHERE Employee_Types = 'Regular'";
	$query_regular = mysqli_query($conn,$select_regular);
	$fetch_regular = mysqli_fetch_assoc($query_regular);

	

	do{

		$id = $fetch_regular['Employees_ID'];


		$update_tax = mysqli_query($conn,"UPDATE `tbl_tax_emp` SET `Tax_Status`='$status' WHERE Employees_ID = $id AND Tax_ID = $tax_id");




	}while($fetch_regular=$query_regular->fetch_assoc());

}else if($type == 'Casual'){

	$select_regular = "SELECT * FROM tbl_employees_information WHERE Employee_Types = 'Casual'";
	$query_regular = mysqli_query($conn,$select_regular);
	$fetch_regular = mysqli_fetch_assoc($query_regular);

	

	do{

		$id = $fetch_regular['Employees_ID'];

		$update_tax = mysqli_query($conn,"UPDATE `tbl_tax_emp` SET `Tax_Status`='$status' WHERE Employees_ID = $id AND Tax_ID = $tax_id");

	}while($fetch_regular=$query_regular->fetch_assoc());



}



header("Location: configure_layout.php");






}




?>