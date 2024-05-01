<?php 
include "../../connection/connection.php";

$select_id = "SELECT * FROM tbl_employees_information ";
$query_id= mysqli_query($conn,$select_id);
$res_query_id = mysqli_fetch_assoc($query_id); 



if (isset($_POST['submit'])) { 


	$allowance_name = $_POST['name'];
	$allowance_value = $_POST['amount'];
	$status = "Enable";
	$condition = "Active";

	$insert_allowance_list = "INSERT INTO `tbl_allowance_list` (`Allowance_Name`,`Allowance_Value`,`Allowance_Condition`) VALUES ('$allowance_name',$allowance_value,'$condition')" ;
	$conn->query($insert_allowance_list) or die ($conn->error);
	$allowance_ID = mysqli_insert_id($conn);


do{
	
	$id = $res_query_id['Employees_ID'] ;
	
	$insert_allowance_emp = "INSERT INTO `tbl_allowance_emp` (`Employees_ID`,`Allowance_ID`,`Allowance_Status`,`Allowance_Value`) VALUES ($id,$allowance_ID,'$status',$allowance_value)" ;
	$conn->query($insert_allowance_emp) or die ($conn->error);


}while($res_query_id=$query_id->fetch_assoc());

}


	


header("Location: allowance_layout.php");


?>