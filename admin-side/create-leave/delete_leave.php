<?php 
include "../../connection/connection.php";

if(isset($_GET['id']))
{

$id = $_GET['id'];

$sql = "DELETE FROM tbl_leave WHERE Leave_ID = '$id'";
$conn->query($sql) or die ($conn->error);
echo header("Location: leave_layout.php");




}








?>