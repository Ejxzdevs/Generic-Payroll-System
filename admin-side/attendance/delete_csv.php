<?php 
include "../../connection/connection.php";

$csv_id = $_GET['id'];

$select_all_csv = "SELECT * FROM tbl_upload_csv WHERE Csv_ID = $csv_id";
$query_all_csv = mysqli_query($conn,$select_all_csv);
$fetch_all_csv = mysqli_fetch_assoc($query_all_csv);

$start = $fetch_all_csv['Start_Date'];
$end = $fetch_all_csv['End_Date'];

$select_all_entries = "SELECT * FROM tbl_time_entries WHERE Date_Attendance BETWEEN '$start' AND '$end' AND Entry_Types = 'Indoor' ";
$query = mysqli_query($conn,$select_all_entries);
$fetch_query = mysqli_fetch_assoc($query);

do{
	$id_entries = $fetch_query['Time_Entries_ID'];

	$delete_entries = mysqli_query($conn,"DELETE FROM tbl_salary_earning WHERE Time_Entries_ID = $id_entries ");


	$delete_entries = mysqli_query($conn,"DELETE FROM tbl_time_entries WHERE Time_Entries_ID = $id_entries ");

	

}while($fetch_query=$query->fetch_assoc()); 

$delete_csv_record = mysqli_query($conn,"DELETE FROM tbl_upload_csv WHERE Csv_ID = $csv_id");

header("Location: csv_layout.php");
?>