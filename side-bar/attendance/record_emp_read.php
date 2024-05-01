<?php 
include "../../connection/connection.php";
date_default_timezone_set("Asia/Manila");

$from = date('Y-m-01');
$to = date('Y-m-t');
$id = $_GET['id'];

$select_record = "SELECT * FROM tbl_personal_information WHERE Time_Entries_ID = 301 ";
$query_record = mysqli_query($conn,$select_record);
$result_record=mysqli_fetch_assoc($query_record);


$data = array(
	"id"=>$result_record['Employees_ID']

);



echo json_encode($data);



?>