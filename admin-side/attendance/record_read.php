<?php 
include "../../connection/connection.php";

date_default_timezone_set('Asia/Manila');
$date = date('Y-m-d');

$sql = "SELECT * FROM tbl_personal_information ";
$query = mysqli_query($conn,$sql);
$entries=$query->fetch_assoc();


if(isset($_GET['id'])){

$id = $_GET['id'];


$select_entry = "SELECT * FROM 
(SELECT * FROM tbl_personal_information WHERE Employees_ID = $id)tbl_personal_information INNER JOIN 
(SELECT * FROM tbl_time_entries WHERE Employees_ID = $id ) tbl_time_entries ON tbl_personal_information.Employees_ID = tbl_time_entries.Employees_ID";
$query_entry = mysqli_query($conn,$select_entry);
$result_entry=mysqli_fetch_assoc($query_entry);

}

// filter

if(isset($_POST['filter-record'])){

$id = $_POST['id'];

$select_entry = "SELECT * FROM 
(SELECT * FROM tbl_personal_information WHERE Employees_ID = $id)tbl_personal_information INNER JOIN 
(SELECT * FROM tbl_time_entries WHERE Employees_ID = $id ) tbl_time_entries ON tbl_personal_information.Employees_ID = tbl_time_entries.Employees_ID";
$query_entry = mysqli_query($conn,$select_entry);
$result_entry=mysqli_fetch_assoc($query_entry);



}


if(isset($_POST['submit'])){

	$name = $_POST['name'];
	$sql = "SELECT Employees_ID,First_Name,Last_Name FROM tbl_personal_information WHERE First_Name Like '$name%' or Last_Name LIKE '$name%'";
$query = mysqli_query($conn,$sql);
$entries=$query->fetch_assoc();
}


						
error_reporting(0);


?>