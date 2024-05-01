<?php 
include "../../connection/connection.php";
session_start();


$id = $_SESSION['emp_id'];

// $select_emp = "SELECT * FROM (SELECT * FROM tbl_employees_information WHERE Employees_ID = $id) tbl_employees_information INNER JOIN (SELECT * FROM tbl_personal_information WHERE Employees_ID = $id) tbl_personal_information ON tbl_employees_information.Employees_ID = tbl_personal_information.Employees_ID ";
// $query_emp = mysqli_query($conn,$select_emp);
// $result_emp = mysqli_fetch_assoc($query_emp);

$select_leave = "SELECT * FROM `tbl_leave`";
$query_leave = mysqli_query($conn,$select_leave);
$fetch_leave = mysqli_fetch_assoc($query_leave);


$select_file = "SELECT * FROM `tbl_file_leave` WHERE Employees_ID = $id ";
$query_file_leave = mysqli_query($conn,$select_file);
$fetch_file_leave = mysqli_fetch_assoc($query_file_leave);

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

		<div class="table-salary" id="table-leave">
			<div class="leave-table">
			<table>
				<thead>
					<tr>
						<th>ID</th>
						<th style="width:400px;">Leave Type</th>
						<th style="width:400px;">Date</th>
						<th>Status</th>
					</tr>
				</thead>
				<?php do{ if(isset($fetch_file_leave['Leave_ID'])){ ?>
				<tbody>
					<tr>
					 	<td><?php echo $fetch_file_leave['Leave_ID']; ?></td>
					 	<td><?php echo $fetch_file_leave['Leave_Types']; ?></td>
					 	<td><?php echo $fetch_file_leave['Leave_Date']; ?></td>
					 	<td><?php echo $fetch_file_leave['Leave_Status']; ?></td>
					</tr>
				</tbody>
				<?php  }}while($fetch_file_leave=$query_file_leave ->fetch_assoc());?>
			</table>
			</div>
			<div class="leave-footer">
				<a href="javascript: open_leave();">File Leave</a>
			</div>
			
		</div>
		<div class="footer">
			<a href="">s</a>
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
		<div class="container-leave">
			<form method="POST" action="file_leave.php">
				<div class="box-container-leave">
					<div class="header-leave">
						<label>Leave</label>
						<a href="javascript: close_leave();"><img id="close" src="../../icons/close.svg"></a>
					</div>
					<div class="content-leave">
						<input class="" type="text" name="id" value="<?php echo $id; ?>" hidden>
						<textarea type="text" name="message" placeholder="Reason For Leave:"></textarea>
						<select name="leave_type">
							<option>Choose Leave</option>
								<?php do{ ?>
							 <option value="<?php echo $fetch_leave['Leave_Name']; ?>">
							 <?php echo $fetch_leave['Leave_Name']; ?>	
							 </option>
							 	<?php }while($fetch_leave=$query_leave->fetch_assoc()); ?>
						</select>
						<input type="date" name="date_leave">
						<button type="submit" name="btn-leave">Submit</button>
					</div>
				</div>

			</form>
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

		function close_leave(){
			document.querySelector('.container-leave').style.display="NONE";
		}

		function open_leave(){
			document.querySelector('.container-leave').style.display="FLEX";
		}

	</script>
</html>