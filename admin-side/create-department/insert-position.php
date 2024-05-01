<?php 

include "../../connection/connection.php";

IF(isset($_POST['submit']))
{

$id_department = $_POST['id_department'];
$name = $_POST['position_name'];
$salary = $_POST['position_salary'];


$insert_position = "INSERT INTO `tbl_position`(`Department_ID`,`Position_Name`,`Daily_Salary`) VALUES ('$id_department','$name','$salary')";
$conn->query($insert_position);

}

header("Location: position_layout.php");
?>