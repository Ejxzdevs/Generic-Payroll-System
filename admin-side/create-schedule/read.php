<?php 
include "../../connection/connection.php";



$sql ="SELECT * FROM tbl_types_schedule ";
$schedule =mysqli_query($conn,$sql);
$res_sched=mysqli_fetch_assoc($schedule);


// filter


if(isset($_POST['submit']))
{
$name = $_POST['name'];


$sql ="SELECT * FROM tbl_types_schedule WHERE Schedule_Name LIKE '$name%' ";
$schedule =mysqli_query($conn,$sql);
$res_sched=mysqli_fetch_assoc($schedule);

error_reporting(0);

}

if(isset($_GET['id']))
{

$id = $_GET['id'];

$sql ="SELECT * FROM tbl_types_schedule where Schedule_ID = '$id' ";
$edit_schedule =mysqli_query($conn,$sql);
$res_edit_sched=mysqli_fetch_assoc($edit_schedule);

}

?>