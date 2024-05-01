<?php 

include "../../connection/connection.php";

$ids = $_GET['id'];
$name = $_GET['name'];
$employer = $_GET['employer'];
$employee = $_GET['employee'];

$tax_update = "UPDATE tbl_tax_list SET Tax_Name='$name', Employer_Share = '$employer' ,Employee_Share = '$employee' WHERE Tax_ID = $ids ";
$query = mysqli_query($conn,$tax_update);


echo $ids;

?>