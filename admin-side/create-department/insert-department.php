<?php 

include "../../connection/connection.php";

if(isset($_POST['submit']))
{

$name = $_POST['department_name'];


$insert_department = "INSERT INTO tbl_department (`Department_Name`) VALUES ('$name')";
$conn->query($insert_department);

}
HEADER("Location: department_layout.php");



?>