<?php 
include "../../connection/connection.php";

echo $emp_id = $_GET['emp_id'];
echo $id_entries = $_GET['id'];

	$delete_entries = mysqli_query($conn,"DELETE FROM tbl_salary_earning WHERE Time_Entries_ID = $id_entries ");


	$delete_entries = mysqli_query($conn,"DELETE FROM tbl_time_entries WHERE Time_Entries_ID = $id_entries ");


header("Location: time_record_view_layout.php?id=" . $emp_id );




?>