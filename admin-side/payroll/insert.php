<?php 
include "../../connection/connection.php";


if(isset($_POST['btn-submit'])){

$id = $_POST['id'];
$type = $_POST['type'];
$date = $_POST['date'];
$amount = $_POST['amount'];


$insert_adjustment = mysqli_query($conn,"INSERT INTO `tbl_adjustment`(`Name`, `Amount`, `Date`, `Employees_ID`,`Status`) VALUES ('$type','$amount','$date ','$id','Pending')");


header("Location: adjustment_layout.php");


}







?>