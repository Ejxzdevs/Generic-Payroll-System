<?php 

include "../../connection/connection.php";


if(isset($_GET['id']))
{

$id = $_GET['id'];


$delete = mysqli_query($conn,"DELETE FROM tbl_position WHERE Position_ID = '$id' ");

header("Location: position_layout.php");





}


?>