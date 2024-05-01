
<!-- Employees.php POP UP -->
<?php
include "../../connection/connection.php";

if(isset($_POST['submit'])){

$id = $_POST['id'];
$shift_name = $_POST['shift_name'];
$start = $_POST['time_start'];
$end = $_POST['time_end'];


if($_POST['rate'] == 0){
	$rate = 100;
}
if($_POST['rate']-1 < 100 ){
	$rate = 100;
}


else{
	$rate = $_POST['rate'];
}

		$sql = " UPDATE `tbl_types_schedule` SET Schedule_Name = '$shift_name', Schedule_In = '$start', Schedule_Out = '$end' , Schedule_Rate = '$rate'  WHERE Schedule_ID = '$id'" ;

	
	$conn->query($sql) or die ($conn->error);
	

		echo header("Location: edit_schedule_layout.php?id=" .$id);



}?>

