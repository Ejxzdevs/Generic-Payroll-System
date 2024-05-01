<?php 

include "../../connection/connection.php";


if(isset($_POST['submit-tax'])){

$name = $_POST['tax_name'];
$r_share = $_POST['employer_share'];
$e_share = $_POST['employee_share'];


$insert =mysqli_query($conn ,"INSERT INTO `tbl_tax_list`(`Tax_Name`,`Tax_Status`,`Employer_Share`,`Employee_Share`) VALUES ('$name','Enable',$r_share,$e_share)");
$Tax_ID = mysqli_insert_id($conn);

$select_id = "SELECT * FROM tbl_employees_information ";
$query_id= mysqli_query($conn,$select_id);
$res_id = mysqli_fetch_assoc($query_id); 


if($res_id == TRUE){
do{
	
	$id = $res_id['Employees_ID'];

	$insert_tax = "INSERT INTO `tbl_tax_emp`(`Employees_ID`,`Tax_ID`,`Tax_Status`) VALUES ($id,$Tax_ID,'Enable')";
	$conn->query($insert_tax) or die ($conn->error);




}while($res_id=$query_id->fetch_assoc());


}ELSE{

	
}



}

header("Location: tax_layout.php");


?>