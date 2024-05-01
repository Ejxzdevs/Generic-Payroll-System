<?php 
include "../../connection/connection.php";


ECHO $id = $_GET['id'];

$delete_adjustment= mysqli_query($conn,"DELETE FROM tbl_adjustment WHERE Adj_ID = $id");









header("Location: adjustment_layout.php");


?>