<?php 

include "../../connection/connection.php";


if(isset($_POST['submit'])){

$id = $_POST['id'];
$name = $_POST['name'];
$value = $_POST['value'];

$update_deduction = " UPDATE `tbl_deductions_list` SET Deduction_Name = '$name',
Deduction_Value = '$value' WHERE Deduction_ID = '$id' ";
$conn->query($update_deduction);


header("Location: deduction_list_edit_layout.php?id=" .$id);



}




?>