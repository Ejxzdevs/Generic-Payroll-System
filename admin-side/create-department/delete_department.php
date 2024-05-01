<?php 

include "../../connection/connection.php";

if(isset($_GET['id']))
{

$id = $_GET['id'];


$delete = mysqli_query($conn,"DELETE FROM tbl_department WHERE Department_ID = '$id' ");

header("Location: department_layout.php");


}

?>