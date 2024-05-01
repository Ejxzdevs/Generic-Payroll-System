<?php 

include "../../connection/connection.php";


if(isset($_GET['id']))
{

$id = $_GET['id'];
$delete_user = mysqli_query($conn,"DELETE FROM tbl_accounts WHERE Account_ID = '$id' ");

header("Location: user_layout.php");


}





?>