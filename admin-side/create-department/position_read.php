<?php 

include "../../connection/connection.php";


$select_position = "SELECT * FROM (SELECT Department_ID , Department_Name from tbl_department)tbl_department INNER JOIN (SELECT Position_ID,Department_ID, Position_Name FROM tbl_position ) tbl_position on tbl_department.Department_ID = tbl_position.Department_ID";
$query_position = mysqli_query($conn,$select_position);
$res_query_position = mysqli_fetch_assoc($query_position);


// search

if(isset($_POST['submit']))
{

	$name = $_POST['name'];

$select_position = "SELECT * FROM (SELECT Department_ID , Department_Name from tbl_department)tbl_department LEFT JOIN (SELECT Position_ID,Department_ID, Position_Name FROM tbl_position) tbl_position on tbl_department.Department_ID = tbl_position.Department_ID WHERE Position_Name LIKE '$name%' or Department_Name LIKE '$name%'";
$query_position = mysqli_query($conn,$select_position);
$res_query_position = mysqli_fetch_assoc($query_position);

}


// EDIT



if(isset($_GET['id'])){

	$id = $_GET['id'];
	
$select_position1 = "SELECT * FROM (SELECT Department_ID , Department_Name from tbl_department)tbl_department INNER JOIN (SELECT Position_ID,Department_ID, Position_Name,Daily_Salary FROM tbl_position ) tbl_position on tbl_department.Department_ID = tbl_position.Department_ID  WHERE Position_ID = '$id' ";
$query_position1 = mysqli_query($conn,$select_position1);
$res_query_position1 = mysqli_fetch_assoc($query_position1);


$name_dept = $res_query_position1['Department_Name'];


$select_department = "SELECT * FROM tbl_department WHERE Department_Name != '$name_dept'";
$query_department = mysqli_query($conn,$select_department);
$res_query_department = mysqli_fetch_assoc($query_department);
}




// add position select option department

$select_department11 = "SELECT * FROM tbl_department";
$query_department11 = mysqli_query($conn,$select_department11);
$res_query_department11 = mysqli_fetch_assoc($query_department11);




?>