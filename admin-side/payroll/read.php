<?php 

include "../../connection/connection.php";
date_default_timezone_set('Asia/Manila');
$date = date("Y-m-d");
// automate payroll list for regular

$select_payroll_list_regular = "SELECT Payroll_End,Payroll_Emp_Type,
@Rid:= Payroll_Set_date_ID as Payroll_Set_date_ID,
(SELECT `Payroll_Date_Interval` FROM tbl_payroll_set_date where Payroll_Set_date_ID = @Rid) as regular_interval
 FROM `tbl_payroll_list` WHERE Payroll_Emp_Type = 'Regular' ORDER BY Payroll_ID DESC ";
$query_list = mysqli_query($conn,$select_payroll_list_regular);
$fetch_list = mysqli_fetch_assoc($query_list);


$payroll_end_regular = $fetch_list['Payroll_End'];

$interval_regular = $fetch_list['regular_interval'];

$set_date_id_regular = $fetch_list['Payroll_Set_date_ID'];


if($date > $payroll_end_regular){
	$start_date_regular = $date;

	if($interval_regular == '1days'){
		$end_date_regular = $start_date_regular;
	}else{
		$end_date_regular = date("Y-m-d",strtotime($start_date_regular."+{$interval_regular}"));
	}
	
	$Payroll_date_regular = date("Y-m-d",strtotime($end_date_regular."+1day"));
	$insert_regular = "INSERT INTO `tbl_payroll_list`(`Payroll_Start`, `Payroll_End`, `Payroll_Status`, `Payroll_Emp_Type`,`Payroll_Set_date_ID`,`Payroll_Date`) VALUES ('$start_date_regular','$end_date_regular','Pre_Pending','Regular','$set_date_id_regular','$Payroll_date_regular')";
	$query = mysqli_query($conn,$insert_regular);
	
}else{
	// echo "<br>";
	// echo "error";
}


// automated payroll list for casual

$select_payroll_list_casual = "SELECT Payroll_End,Payroll_Emp_Type,
@Cid:= Payroll_Set_date_ID as Payroll_Set_date_ID,
(SELECT `Payroll_Date_Interval` FROM tbl_payroll_set_date where Payroll_Set_date_ID = @Cid) as casual_interval
 FROM `tbl_payroll_list` WHERE Payroll_Emp_Type = 'Casual' ORDER BY Payroll_ID DESC ";
$query_list_casual = mysqli_query($conn,$select_payroll_list_casual);
$fetch_list_casual = mysqli_fetch_assoc($query_list_casual);

$payroll_end_casual = $fetch_list_casual['Payroll_End'];

$interval_casual = $fetch_list_casual['casual_interval'];

$set_date_id_casual = $fetch_list_casual['Payroll_Set_date_ID'];


if($date > $payroll_end_casual){
	$start_date_casual = $date;

	if($interval_casual == '1days'){
		$end_date_casual = $start_date_casual;
	}else{
		$end_date_casual = date("Y-m-d",strtotime($start_date_casual."+{$interval_casual}"));
	}
	$Payroll_date_casual = date("Y-m-d",strtotime($start_date_casual."+1day"));
	$insert_casual = "INSERT INTO `tbl_payroll_list`(`Payroll_Start`, `Payroll_End`, `Payroll_Status`, `Payroll_Emp_Type`,`Payroll_Set_date_ID`,`Payroll_Date`) VALUES ('$start_date_casual','$end_date_casual','Pre_Pending','Casual','$set_date_id_casual','$Payroll_date_casual')";
	$query = mysqli_query($conn,$insert_casual);
	
}else{
	// echo "<br>";
	// echo "error";
}


// display

$display_payroll = "SELECT * FROM `tbl_payroll_list` WHERE Payroll_Status = 'Pre_Pending'";
$query_display_payroll = mysqli_query($conn,$display_payroll);
$result_payroll = mysqli_fetch_assoc($query_display_payroll);



// ROLL BACK

$display_rollback = "SELECT * FROM `tbl_payroll_list` WHERE Payroll_Status = 'Paid'";
$query_rollback = mysqli_query($conn,$display_rollback);
$result_rollback = mysqli_fetch_assoc($query_rollback);

error_reporting(0);
?>