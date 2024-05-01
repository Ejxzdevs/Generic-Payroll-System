
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
	<script src="../../jquery/jquery-3.6.3.js"></script>
	<link rel="stylesheet" type="text/css" href="tax.css">
	<title>Payroll Managament System</title>
</head>
<body>
	<div class="background">
			
		

			<div class="home-content">
				
				<div class="box-payroll">
					<div class="payroll-nav-bar">
						<ul class="active" >
							<li ><a href="tax_layout.php" style="color:#66ff66;"   >Regular</a> <img src="../../icons/employees-icon.png" id="img_salary" > </li>
							<li><a href="configure_layout.php" >Configure</a><img id="img_history" src="../../icons/worker.png">  </li>
						</ul>
					</div>
					<div class="salary">
						<div class="salary-header">
							<div class="salary-header-left">

							
							</div>
							<div class="salary-header-right">
									<form method="POST" action="basic_salary_layout.php">			
									<div class="containter-search">
										<div class="containter-input-search">
										<img src="../../icons/search.svg" id="img_search">
										<input type="text" name="name" class="input" placeholder="Type text:">
										<input type="submit" name="submit-basic-salary"  value="Search" class="search">
										</div>
									</div>
								</form>
							</div>	
						</div>
						
						<div class="salary-body">
							<table class="payroll-table" id="tax-display">
								 <?php include"tax_read.php"; ?>
								<thead>
									<tr>
										<th>ID</th>
										<th>Employee Name</th>
										<th>No. Statutory</th>
										<th>Action </th>
									</tr>
								</thead>
								<?php do{ if(isset($result_regular_tax['Employees_ID'])) {?>
								<tbody>
									<tr>
										<th><?php echo $result_regular_tax['Employees_ID']; ?></th>
										<th><?php echo $result_regular_tax['First_Name'] . " " . $result_regular_tax['Last_Name']; ?></th>
										<th><?php echo $result_regular_tax['total_tax']; ?></th>
										<th><a href="tax_edit_layout.php?emp_id=<?php echo $result_regular_tax['Employees_ID']; ?>"><img id="edit-icon" src="../../icons/edit-action.svg"></a></th>
									</tr>
								</tbody>
								<?php } }while($result_regular_tax=$query_regular_tax->fetch_assoc()); ?>
							</table>
						</div>
						
					</div>
					
				</div>	
		
			</div>






		</div>
	</div>
</body>
	<script type="text/javascript" src="manage-tax.js"></script>
</html>