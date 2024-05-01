<?php 

include "../../connection/connection.php";



$id = $_GET['id'];

$select_tax = "SELECT * FROM tbl_tax_list WHERE Tax_ID = $id ";
$query_tax = mysqli_query($conn,$select_tax);
$res_tax = mysqli_fetch_assoc($query_tax);


$data = array(
	"id"=>$res_tax['Tax_ID'], 
	"name"=>$res_tax['Tax_Name'], 
	"employer"=>$res_tax['Employer_Share'],
	"employee"=>$res_tax['Employee_Share']
	
);

echo json_encode($data);







?>