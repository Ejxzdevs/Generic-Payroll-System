<!DOCTYPE html>
<html>
<style type="text/css">
	
		.payroll-nav-bar ul li:nth-child(1){
	border-left: solid 2PX black;
}

</style>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="payroll.css">
	<script src="../../jquery/jquery-3.6.3.js"></script>
	<title>Payroll Managament System</title>
</head>
<body>
	<div class="background">
			
		<div class="div-background">
			<div class="home-content">
				<div class="box-payroll">
					<div class="payroll-nav-bar">
						<ul class="active" >
							<li ><a href="payroll_layout.php" style="color:#66ff66;">Salary</a> <img src="../../icons/accounting.png" id="img_salary" > </li>
							<li><a href="deduction.php" >Record</a><img id="img_history" src="../../icons/history.svg">  </li>
						</ul>
					</div>
					<div class="salary">
						<div class="salary-header">
							<div class="salary-header-left">
								<form method="POST" action="payroll_layout.php"> 
									<input type="date" name="from" id="from" class="date-filter" value="<?php echo $first_date ?>">
									<input type="date" name="to" id="to" class="date-filter" value="<?php echo $last_date ?>">
									<input type="submit" name="submit" value="filter" class="submit-filter">

								</form>
							</div>
							<div class="salary-header-right">
								<div class="container">
								<form method="POST" action="payroll_layout.php" class="form">			
									<div class="containter-search">
										<div class="containter-input-search">
										<img src="../../icons/search.svg" id="img_search">
										<input type="text" name="name" class="input" placeholder="Type text:">
										<input type="submit" name="search" value="Search" class="search">
										</div>
									</div>
								</form>
								</div>

							</div>	
						</div>
						
						<div class="salary-body">
							<table class="payroll-table">
								<thead>
									<tr>
										<th>Employee ID</th>
										<th>Employee Name</th>
										<th>Worked Days</th>
										<th>Gross Salary </th>
										<th>Action </th>
									</tr>
								</thead>
								<?php do{ if(isset($result_salary['Employees_ID'])){ ?>
								<tbody>
							
									<tr>
										<td><?php echo $result_salary['Employees_ID']; ?></td>
										<td><?php echo $result_salary['First_Name'] . " " . $result_salary['Last_Name']; ?></td>
										<td><?php echo $result_salary['number_attendance']; ?></td>
										<td><?php echo $result_salary['basic_salary']; ?></td>
										<td><a href="javascript: open_salary_info(<?php echo $result_salary['Employees_ID']; ?>);" ><img id="view" src="../../icons/view-action.svg" ></a></td>
									</tr>
								
								</tbody>
								<?php }}WHILE($result_salary=$query_salary->fetch_assoc()); ?>
							</table>
						</div>
						<div class="salary-lower">
							<div class="salary-lower-left">
								
							</div>
							<div class="salary-lower-right">
								<div class="right-1">
									<!-- <h1>right1</h1> -->
								</div>
								<div class="right-2">
									<a href="javascript: run_payroll();" id="create-payroll" class="btn_payroll" >
									<!-- <img src="../../icons/create.svg" class="img_create"> -->Run Payroll</a>
								</div>
							</div>
						</div>
					</div>
					
				</div>	
		
			</div>
			<div class="view_salary_info">
				<div class="box_salary_info">
					<div class="header">
						<label>Salary Information</label>
						<a href="javascript:  close_salary_info();" ><img id="close" src="../../icons/close.svg" ></a>
					</div>
					<div class="content">
						<div class="profile">
							<div class="img_border">
								<img src="" id="image">
							</div>
							<div class="emp_info">
								<div class="pri-row">
									<label>Emp ID:</label><p id="id"></p>
								</div>
								<div class="pri-row">
									<label>Name:</label><p id="name"></p>
								</div>
								<div class="pri-row">
									<label>Department:</label><p id="department"></p>
								</div>
								<div class="pri-row">
									<label>Position:</label><p id="position"></p>
								</div>
							</div>
						</div>
						<div class="salary_info">
							<div class="row">
								<label>Date Range:</label><p id="date_range"></p>
							</div>
							<div class="row">
								<label>Daily Rate:</label><p id="daily_rate"></p>
							</div>
							<div class="row">
								<label>Worked days:</label><p id="worked_days"></p>
							</div>
							<div class="row">
								<label>holiday: </label><p id="holiday"></p>
							</div>
							<div class="row">
								<label>Total Regular time:</label><p id="total_regular_time"></p>
							</div>
							<div class="row">
								<label>Total Overtime:</label><p id="total_overtime"></p>
							</div>
							
							<div class="row">
								<label>Basic Salary:</label><p id="basic_salary"></p>
							</div>
							<div class="row">
								<label>Ovetime Salary:</label><p id="overtime_salary"></p>
							</div>
							<div class="row">
								<label>Net Salary:</label><p id="net_salary"></p>
							</div>
							<div class="row">
								<label>Tardiness:</label><p id="total_tardiness"></p>
							</div>
							<div class="row">
								<label>Late Deduction:</label><p id="late"></p>
							</div>
							<div class="row">
								<label>Undertime:</label><p id="total_undertime"></p>
							</div>
							<div class="row">
								<label>Undertime Deduction:</label><p id="undertime"></p>
							</div>
						</div>

					</div>
				</div>
			</div>
		</div>
		
	</div>
</body>
	<script type="text/javascript" src="payroll.js"></script>
</html>