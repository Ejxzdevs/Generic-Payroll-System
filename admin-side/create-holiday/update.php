<?php 
include "../../connection/connection.php";

if(isset($_POST['submit'])){

$id = $_POST['id'];
$name = $_POST['name'];
$date= date('Y-n-d', strtotime($_POST['date']));
$rate = $_POST['rate'];


$sql = " UPDATE `tbl_holiday` SET Holiday_Name = '$name', Doh = '$date', Rate = '$rate' WHERE ID = '$id'" ;

	
	$conn->query($sql) or die ($conn->error);
	
	echo header("Location: edit_holiday_layout.php?id=" .$id);


}
?>