<?php 
include "../connection/connection.php";

if(isset($_POST['submit'])){
	
	date_default_timezone_set('Asia/Manila');

	$id = trim($_POST['id']);
	
 	if ($id != null ) { 

 	$select_schedule ="SELECT Employees_ID,@sid:= Schedule_ID AS Schedule_ID,
 	(SELECT `Schedule_In` from tbl_types_schedule WHERE Schedule_ID = @sid) as Schedule_In ,
 	(SELECT `Schedule_Out` from tbl_types_schedule WHERE Schedule_ID = @sid) as Schedule_Out,
 	(SELECT `Schedule_Name` from tbl_types_schedule WHERE Schedule_ID = @sid) as Schedule_Name  

 	FROM tbl_employees_information WHERE Employees_ID = '$id' ";
	$time = mysqli_query($conn,$select_schedule);
	$schedule=mysqli_fetch_array($time);

	$time_in = date("H:i:s");
	$time_start = $schedule['Schedule_In'];
	$time_end = $schedule['Schedule_Out'];
	$shift = $schedule['Schedule_Name'];
	$status = "Indoor";

	if(strtotime($time_in)-60 < strtotime($time_start)){
		$late = 0;
	}else{
		$get_late = date_diff(date_create($time_in),date_create($time_start));
		$min_late = $get_late->days * 24 * 60;
		$min_late += $get_late->h * 60;
		$min_late += $get_late->i;
		$late = $min_late;
		$num_late = 1;
	}
	if(strtotime($time_in) > strtotime($time_start)+14340){
		$late = 0;
		$daily_status = "Halfday";
	}



	
	$test = "INSERT INTO `tbl_time_entries`(`Employees_ID`,`Time_In`,`Time_Start`,`Time_End`,`Shift_Type`,`Late`,`Entry_Types`,`Daily_Status`,`No_Late`) VALUES ('$id','$time_in','$time_start','$time_end','$shift','$late','$status','$daily_status','$num_late')";
		$conn->query($test) or die ($conn->error);							
}
}
header("Location: attendace.php");

?>
