<?php 

include "../../connection/connection.php";

if(isset($_POST['submit']))
{

$dept_id = $_POST['department_id'];
$pos_name = $_POST['position_name'];
$id = $_POST['id'];
$Salary = $_POST['salary'];

$sql = "UPDATE `tbl_position` SET Department_ID = '$dept_id' , `Position_Name` = '$pos_name',`Daily_Salary` = '$Salary'  WHERE Position_ID = '$id' ";
$conn->query($sql);


}
header("Location: position_layout.php");


?>