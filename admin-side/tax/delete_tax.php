<?php 

include "../../connection/connection.php";




if(isset($_GET['id']))

{




$id = $_GET['id'];


$delete_allowance_emp = "DELETE FROM `tbl_tax_emp` WHERE TAX_ID = $id " ;
$dele = mysqli_query($conn,$delete_allowance_emp);


$delete_allowance = "DELETE from tbl_tax_list Where TAX_ID = $id";
$del = mysqli_query($conn,$delete_allowance);


}

header("Location: tax_layout.php");





?>