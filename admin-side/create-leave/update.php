<?php 
include "../../connection/connection.php";

if(isset($_POST['submit'])){

$id = $_POST['id'];
$name = $_POST['name'];
$number = $_POST['number'];


$sql = " UPDATE `tbl_leave` SET Leave_Name = '$name', Num_Leave = '$number' WHERE Leave_ID = '$id' " ;

	
	$conn->query($sql) or die ($conn->error);
	

		echo header("Location: edit_leave_layout.php?id=" .$id);


}
?>