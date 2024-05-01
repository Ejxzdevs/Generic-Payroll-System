<?php 
include "../../connection/connection.php";

if(isset($_GET['id']))
{

$id = $_GET['id'];

$sql = "DELETE FROM tbl_holiday WHERE ID = '$id'";
$conn->query($sql) or die ($conn->error);
echo header("Location: holiday_layout.php");




}








?>