<?php 

include "../../connection/connection.php";




if(isset($_GET['id']))

{




$id = $_GET['id'];


$delete_allowance_emp = "DELETE FROM `tbl_allowance_emp` WHERE Allowance_ID = $id " ;
$dele = mysqli_query($conn,$delete_allowance_emp);


$delete_allowance = "DELETE from tbl_allowance_list Where Allowance_ID = $id";
$del = mysqli_query($conn,$delete_allowance);


}

header("Location: allowance_layout.php");





?>