<?php 

include "../../connection/connection.php";

$select_all_emp ="SELECT * FROM tbl_employees_information";
$query_all_emp = mysqli_query($conn,$select_all_emp);
$count_emp = mysqli_num_rows($query_all_emp);

$select_all_dept ="SELECT * FROM tbl_department";
$query_all_dept = mysqli_query($conn,$select_all_dept);
$count_all_dept = mysqli_num_rows($query_all_dept);

// LEAVE

$select_all_leave ="SELECT * FROM tbl_file_leave WHERE Leave_Status = 'Pending'";
$query_all_leave = mysqli_query($conn,$select_all_leave);
$count_all_pending = mysqli_num_rows($query_all_leave);

$select_all_leaves ="SELECT * FROM tbl_file_leave WHERE Leave_Status = 'Accepted'";
$query_all_leaves = mysqli_query($conn,$select_all_leaves);
$count_all_recorded = mysqli_num_rows($query_all_leaves);

$select_all_leaves ="SELECT * FROM tbl_file_leave WHERE Leave_Status = 'Rejected'";
$query_all_leaves = mysqli_query($conn,$select_all_leaves);
$count_all_rejected = mysqli_num_rows($query_all_leaves);


// PAYROLL UPCOMMING

$select_all_payroll_list ="SELECT * FROM tbl_payroll_list WHERE Payroll_Status = 'Pre_Pending'";
$query_all_payroll_list = mysqli_query($conn,$select_all_payroll_list);
$count_all_payroll_list = mysqli_fetch_assoc($query_all_payroll_list);


// $select_num_emp = "SELECT * FROM tbl_dashboard WHERE Status = 'Enable' ";
// $query_num_emp = mysqli_query($conn,$select_num_emp);
// $fetch_num_emp = mysqli_fetch_assoc($query_num_emp);


error_reporting(0);



?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="style.css">
	<title>Payroll Managament System</title>
</head>
<body>
	<div class="container">
		<div class="sub-container">
			<div class="dashboard-box">
				<div class="box-emp">
					<div class="top-emp">
						<div class="num_label">
							<p><?php echo $count_emp; ?></p>
						</div>
						<div class="num_image">
							<img src="../../icons/employee.png">
						</div>
					</div>
					<div class="bot-emp" style="background:#005ce6;">
						<label><a href="../employees/employee_list_layout.php">Employees</a></label>
					</div>
				</div>
			</div>
			<!-- department -->
			<div class="dashboard-box" >
				<div class="box-emp">
					<div class="top-emp">
						<div class="num_label">
							<p><?php echo $count_all_dept; ?></p>
						</div>
						<div class="num_image">
							<img style="height: 4.5em; width: 4.5em;" src="../../icons/department.svg">
						</div>
					</div>
					<div class="bot-emp" style="background:crimson;">
						<label><a href="../create-department/department_layout.php">Depertment</a></label>
					</div>
				</div>
			</div>
			<!-- Leave -->
			<div class="dashboard-box" >
				<div class="box-emp">
					<div class="top-emp" id="leave_num" >
						<label>Pending <span><?php echo $count_all_pending; ?></span></label>
						<label>Rejected<span><?php echo $count_all_rejected; ?></span></label>
						<label>Aprroved<span><?php echo $count_all_recorded; ?></span> </label>
					</div>
					<div class="bot-emp" style="background:#00e600;">
						<label><a href="../management/leave_layout.php">Leave</a></label>
					</div>
				</div>
			</div>
			<!-- sscript for chart -->
			<script type="text/javascript" src="chart.js"></script>

			<div class="pie-box">
				<div class="pie1">
					<?php include 'chart.php';?>
				</div>
				<div class="pie2">
					<p>	<?php include 'chart1.php';?></p>
				</div>
			</div>


				<!-- PAYROLL LIST -->

			<div class="Payroll_list" style="background:white;">
				<div class="header-list" style="background: #262626;" >
					<p><a style="color: white; text-decoration: none;" href="../payroll/payroll_layout.php">Upcomming payroll</a></p>
				</div>
				<div class="header-aa">
					<div class="id">
						<p>ID</p>
					</div>
					<div class="type">
						<p>Type</p>
					</div>
					<div class="date">
						<p>Date</p>
					</div>
				</div>
				<div class="payroll-content" >
				<?PHP DO{ if(isset($count_all_payroll_list['Payroll_ID'])) {?>
					<div class="header-aa" id="border-list">
						<div class="id">
							<p style="font-weight: 600;"><?php echo $count_all_payroll_list['Payroll_ID'];  ?></p>
						</div>
						<div class="type">
							<p style="font-weight: 300;"><?php echo $count_all_payroll_list['Payroll_Emp_Type'];  ?></p>
						</div>
						<div class="date">
							<p style="font-weight: 300; color:crimson; "><?php echo $count_all_payroll_list['Payroll_Date']; ?></p>
						</div>
					</div>
				<?php } }while($count_all_payroll_list=$query_all_payroll_list->fetch_assoc()); ?>
				</div>

			</div>

			
		

			
			<!-- GROSS SALARY -->
			<div class="gross_salary_per_month">
				<?php include 'gross_salary.php'; ?>
			</div>

			<!-- PIE CHART -->

			
		
		


		</div>
	</div>
</body>
</html>