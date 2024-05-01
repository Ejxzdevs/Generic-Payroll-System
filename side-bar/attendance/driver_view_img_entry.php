<?php 

include "../../connection/connection.php";

date_default_timezone_set('Asia/Manila');
$current_date = date('Y-m-d');

// IN
if(isset($_GET['id'])){

$id = $_GET['id'];


$sql_img_in = " SELECT Employees_ID,Time_In,Time_Out,Image_Time_In, Image_Time_Out,Image_OT,Entry_Types ,Date_Attendance FROM tbl_time_entries WHERE Employees_ID = '$id' AND Date_Attendance = '$current_date' ";
$query_img_in = mysqli_query($conn,$sql_img_in);
$img_time_in = mysqli_fetch_assoc($query_img_in);

$time_in = date("g:i A",strtotime($img_time_in['Time_In']));

if($img_time_in['Time_Out'] == '00:00:00.000000'){
$time_out = '';	

}else{
$time_out = date("g:i A",strtotime($img_time_in['Time_Out']));
}

if($img_time_in['Image_Time_Out'] == ''){
	$img_out = 'default.jpg';
}else{
	$img_out = $img_time_in['Image_Time_Out'];
}

if($img_time_in['Image_OT'] == ''){
	$img_ot = 'default.jpg';
}else{
	$img_ot = $img_time_in['Image_OT'];
}

$data = array(
	"id"=>$img_time_in['Employees_ID'], 
	"image_in"=>$img_time_in['Image_Time_In'],
	"time_in"=>$time_in,
	"image_out"=>$img_out,
	"time_out"=>$time_out,
	"image_ot"=>$img_ot

);

echo json_encode($data);

}




?>