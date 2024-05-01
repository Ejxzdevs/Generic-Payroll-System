<?php 

include "../../connection/connection.php";


$allowance_list = "SELECT * FROM tbl_allowance_list ";
$query_list = mysqli_query($conn,$allowance_list);
$res_query_list = mysqli_fetch_assoc($query_list); 

error_reporting(0);


if(isset($_GET['id'])){

	$id = $_GET['id'];

	$edit_allowance = "SELECT * FROM tbl_allowance_list WHERE Allowance_ID = '$id' ";
$query_edit_allowance = mysqli_query($conn,$edit_allowance);
$res_edit_allowance = mysqli_fetch_assoc($query_edit_allowance); 
}




if(isset($_POST['submit'])){


$name = $_POST['name'];

$allowance_list = "SELECT * FROM tbl_allowance_list where Allowance_Name LIKE '$name%'";
$query_list = mysqli_query($conn,$allowance_list);
$res_query_list = mysqli_fetch_assoc($query_list); 

}

?>