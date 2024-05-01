<?php 

include "../../connection/connection.php";

$payroll_id = $_GET['payroll_id'];

$select_payroll = "SELECT * FROM tbl_payroll_list WHERE Payroll_ID = $payroll_id";
$query_payroll = mysqli_query($conn,$select_payroll);
$fetch_date = mysqli_fetch_assoc($query_payroll);

$start = $fetch_date['Payroll_Start'];

$end = $fetch_date['Payroll_End'];

$emp_type = $fetch_date['Payroll_Emp_Type'];

$select_payroll_date = "SELECT * FROM (SELECT * FROM tbl_employees_information WHERE Employee_Types = '$emp_type')tbl_employees_information INNER JOIN (SELECT * FROM tbl_personal_information)tbl_personal_information ON tbl_employees_information.Employees_ID = tbl_personal_information.Employees_ID INNER JOIN (SELECT *,SUM(Daily_Salary) as salary FROM tbl_salary_earning WHERE Earning_Date BETWEEN '$start' AND '$end'GROUP BY Employees_ID)tbl_salary_earning ON tbl_personal_information.Employees_ID = tbl_salary_earning.Employees_ID";
$query_salary = mysqli_query($conn,$select_payroll_date);
$result_salary = mysqli_fetch_assoc($query_salary); 





?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title></title>
	<link rel="stylesheet" type="text/css" href="content.css">
</head>
<body>
	<div class="payroll-container">
		<!-- header -->
		<div class="payroll-header">
			<div class="header-label">
				<p>Payroll of <?PHP echo $emp_type; ?></p>
			</div>	
			<div class="header-search">
				<form method="POST" action="employee_layout.php">			
					<div class="containter-search">
						<div class="containter-input-search">
								<img src="../../icons/search.svg" id="img_search">
								<input type="text" name="search-name" class="input" placeholder="Search: ">
								<input type="submit" name="submit-name" class="search">
							</div>
						</div>
				</form>
			</div>				
		</div>

		<!-- body -->
		<div class="payroll-body">
		<div class="table-content">
			<table>
				<thead>
					<tr>
						<th>ID</th>
						<th>Name</th>
						<th>Payroll Date</th>
						<th>Gross Salary</th>
						<th>Status</th>
						<th>Action</th>
					</tr>
				</thead>
				<?PHP DO{ if(isset($result_salary['Employees_ID'])){ ?>
				<tbody>
					<tr>
						<td><?Php echo $result_salary['Employees_ID']; ?></td>
						<td><?php echo $result_salary['First_Name'] . " " . $result_salary['Last_Name']; ?></td>
						<td style="width:400px;"><?php echo $start . " - " . $end; ?></td>
						<td><?Php echo $result_salary['salary'];?></td>
						<td><?php echo $result_salary['Salary_Status']; ?></td>
						<td>
							<a href="pay_layout.php?payroll_id=<?php echo $payroll_id;?>&&emp_id=<?php echo $result_salary['Employees_ID']; ?>"><img id="proceed" src="../../icons/play.png"></a></td>
						
					</tr>
				</tbody>
				<?PHP }}WHILE($result_salary=$query_salary->fetch_assoc()); ?>
			</table>
			</div>
		</div>
		<!-- footer -->
		<div class="payroll-footer">
			<div class="payroll-footer-left">
				<!-- <a href="payroll_layout.php">BACK</a> -->
			</div>
			<div class="payroll-footer-right">
				<a href="payroll_layout.php">BACK</a>
				<a href="javascript: open_generate_all(<?php echo $payroll_id;?>);" id="generate-btn" >GENERATE</a>
			</div>
		</div>




	</div>
</body>
	<script type="text/javascript" src="print.js"></script>
</html>