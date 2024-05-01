<?php 

include "../../connection/connection.php";


if(isset($_POST['submit'])){

$id = $_POST['id'];
$name = $_POST['name'];
$value = $_POST['value'];

$update_allowance = " UPDATE `tbl_allowance_list` SET Allowance_Name = '$name',
Allowance_Value = '$value' WHERE Allowance_ID = '$id' ";
$conn->query($update_allowance);


header("Location: allowance__list_edit_layout.php?id=" .$id);



}




?>