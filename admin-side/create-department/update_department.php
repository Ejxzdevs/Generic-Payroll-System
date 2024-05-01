<?php 

include "../../connection/connection.php";



$name = $_POST['department_name'];
$id = $_POST['id'];

$sql = "UPDATE `tbl_department` SET `Department_Name`='$name' WHERE Department_ID = '$id' ";
$conn->query($sql);

header("Location: department_layout.php");


?>