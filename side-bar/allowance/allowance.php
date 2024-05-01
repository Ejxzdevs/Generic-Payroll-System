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
	<link rel="stylesheet" type="text/css" href="style.css">
	
	<title>Payroll Managament System</title>
</head>
<body>
	<div class="background">
			
		<div class="div-background">
			


			<div class="home-content">
				
				<div class="box-payroll">
					<div class="payroll-nav-bar">
						<ul class="active" >
							<li ><a href="leave.php" style="color:#66ff66;"   >Allowance</a> <img src="../../icons/pay.png" id="img_salary" > </li>
							<li><a href="leave_record.php" >Record</a><img id="img_history" src="../../icons/documents.svg">  </li>
						</ul>
					</div>
					<div class="salary">
						<div class="salary-header">
							<div class="salary-header-left">
								
							</div>
							<div class="salary-header-right">
								<div class="container">
								<form method="POST" action="allowance_layout.php" class="form">			
									<div class="containter-search">
										<div class="containter-input-search">
										<img src="../../icons/search.svg" id="img_search">
										<input type="text" name="name" class="input" placeholder="Type text:">
										<input type="submit" name="submit-search"  value="Search" class="search">
										</div>
									</div>
								</form>
								</div>
							</div>	
						</div>
						
						<div class="salary-body" style="height:420px;">
							<table class="payroll-table">
						
								<thead>
									<tr>
										<th>Allowance ID</th>
										<th>Allowance Name</th>
										<th>Allowances</th>
										<th>Action</th>
									</tr>
								</thead>

								<tbody>
								<?PHP DO{ ?>
									<tr>
										<td><?php echo $res_query_allowance['Employees_ID']; ?></td>
										<td><?php echo $res_query_allowance['First_Name']; ?></td>
										<td><?php echo $res_query_allowance['no_allowance']; ?></td>

							
										<td> <a href="pop_allowance_layout.php?id=<?php echo $res_query_allowance['Employees_ID']; ?> "><img id="view-icon" src="../../icons/view-action.svg" ></a> </td>
								<?PHP }WHILE($res_query_allowance=$query_allowance->fetch_assoc()); ?>	
									</tr>
										
								</tbody>
								
							</table>
						</div>
					</div>
					
				</div>	
		
			</div>
			
		</div>
		
	</div>
	<!-- <script type="text/javascript" src="deduction.js"></script> -->
</body>

</html>