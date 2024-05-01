<?php 

include "../../connection/connection.php";


$select_department = "SELECT * FROM (SELECT Department_ID as Dept_ID , Department_Name from tbl_department)tbl_department LEFT JOIN (SELECT count(Position_ID) AS ND , Position_Name ,Department_ID FROM tbl_position GROUP BY Department_ID) tbl_position on tbl_department.Dept_ID = tbl_position.Department_ID";
$query_department = mysqli_query($conn,$select_department);
$res_query_department = mysqli_fetch_assoc($query_department);

if(isset($_POST['submit'])){

$name = $_POST['name'];

$select_department = "SELECT * FROM (SELECT Department_ID as Dept_ID , Department_Name from tbl_department WHERE Department_Name LIKE '$name%')tbl_department LEFT JOIN (SELECT count(Position_ID) AS ND , Position_Name ,Department_ID FROM tbl_position GROUP BY Department_ID) tbl_position on tbl_department.Dept_ID = tbl_position.Department_ID";
$query_department = mysqli_query($conn,$select_department);
$res_query_department = mysqli_fetch_assoc($query_department);
}

if(isset($_GET['id'])){

	$id = $_GET['id'];
	$select_edit_department = "SELECT Department_ID , Department_Name from tbl_department WHERE Department_ID = '$id '";
	$query_edit_department = mysqli_query($conn,$select_edit_department);
	$res_edit_department = mysqli_fetch_assoc($query_edit_department);



}


?>