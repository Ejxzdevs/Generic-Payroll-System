<?php 
include "../../connection/connection.php";
session_start();


$id = $_SESSION['emp_id'];

$select_emp = "SELECT * FROM (SELECT * FROM tbl_employees_information WHERE Employees_ID = $id) tbl_employees_information INNER JOIN (SELECT * FROM tbl_personal_information WHERE Employees_ID = $id) tbl_personal_information ON tbl_employees_information.Employees_ID = tbl_personal_information.Employees_ID ";
$query_emp = mysqli_query($conn,$select_emp);
$result_emp = mysqli_fetch_assoc($query_emp);



?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="entry.css">
	<title>OPTION</title>
</head>
<body>
	<div class="container">
		<div class="nav_var">
			<a href="javascript: nav_open();"><img id="nav-icon" src="nav-icon.png"></a>
		</div>

		<div class="option">
			<a class="time_in" href="time_in/time_in.php">TIME IN</a>
			<a class="time_out" href="time_out/time_out.php">TIME OUT</a>
			<a class="time_ot" href="time_ot/time_ot.php">OT</a>
		</div>
		<!--  pop up -->
		<div class="side_bar">
			<div class="side-container">
				<div class="btn-off">
					<a href="javascript: nav_off();"><img class="nav_off" src="nav-icon.png"></a>
				</div>
				<div class="menu">
					<div class="menu-row">
						<img id="profile-nav" src="../../icons/user1.png" ><a href="profile.php">Profile</a>
					</div>
					<div class="menu-row">
						<img id="profile-nav" src="../../icons/calendar-salary.png" ><a href="salary.php">Salary</a>
					</div>
					<div class="menu-row">
						<img id="profile-nav" src="../../icons/back-in-time.png">
						<a href="entry_option.php">Time Entry</a>
					</div>
					<div class="menu-row">
						<img id="profile-nav" src="../../icons/exit.png">
						<a href="leave.php">Leave</a>
					</div>


					<div class="menu-row">
						<img id="profile-nav" src="../../icons/log-out.png">
						<a href="logout.php">Logout</a>
					</div>
				</div>
			</div>
		</div>
	</div>
	
</body>
	<script type="text/javascript">

		function nav_open(){
			document.querySelector('.side_bar').style.display="FLEX";
			document.querySelector('#nav-icon').style.display="NONE";
		}

		function nav_off(){
			document.querySelector('.side_bar').style.display="NONE";
			document.querySelector('#nav-icon').style.display="FLEX";
			
		}
	</script>
</html>