<?php 

include "../../connection/connection.php";



$select_tax = "SELECT * FROM tbl_tax_list";
$query_tax = mysqli_query($conn,$select_tax);
$res_tax = mysqli_fetch_assoc($query_tax);






?>