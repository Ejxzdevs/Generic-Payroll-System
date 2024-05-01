<?php 
include "../../connection/connection.php";

$id = $_GET['id'];

$select_csv_entry = "SELECT * FROM `tbl_upload_csv` WHERE Csv_ID = $id ";
$query_csv = mysqli_query($conn,$select_csv_entry);
$fetch_csv_info = mysqli_fetch_assoc($query_csv);

$start = $fetch_csv_info['Start_Date'];
$end = $fetch_csv_info['End_Date'];

$select_all_entry = "SELECT * FROM (SELECT * FROM tbl_personal_information) tbl_personal_information INNER JOIN (SELECT * FROM `tbl_time_entries` WHERE Date_Attendance BETWEEN '$start' AND '$end') tbl_time_entries ON tbl_personal_information.Employees_ID = tbl_time_entries.Employees_ID";
$query_all_entry = mysqli_query($conn,$select_all_entry);
$fetch_all_entry = mysqli_fetch_assoc($query_all_entry);

?>