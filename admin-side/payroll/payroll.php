
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
							<li ><a href="payroll_layout.php" style="color:#66ff66;"   >Payroll</a> <img src="../../icons/salary_list.png" id="img_salary" > </li>
							<li><a href="record_layout.php" >Records</a><img id="img_history" src="../../icons/payroll_record.png">  </li>
							<li><a href="adjustment_layout.php"  >Adjustment</a><img id="img_history" src="../../icons/money-management.png">  </li>
						</ul>
					</div>
					<div class="salary">
						<div class="salary-header">
							<div class="salary-header-left">

							
							</div>
							<div class="salary-header-right">
									
							</div>	
						</div>
						
						<div class="salary-body">
							<table class="payroll-table" id="tax-display">
								
								<thead>
									<tr>
										<th style="width:100px;">ID</th>
										<th style="width: 300px;">Interval Date</th>
										<th>Pay Date</th>
										<th>Employee Type</th>
										<th>Action</th>
									</tr>
								</thead>
							
							<?php do{ if(isset($result_payroll['Payroll_ID'])){?>
				<tbody>
					<tr>
						<td><?php echo $result_payroll['Payroll_ID']; ?></td>
						<td style="width:400px;"><?php echo date("M-d-Y",strtotime($result_payroll['Payroll_Start'])) . " - " . date("M-d-Y",strtotime($result_payroll['Payroll_End'])) ; ?></td>
						<td><?php echo date("M-d-Y",strtotime($result_payroll['Payroll_Date'])) ; ?></td>
						<td><?php echo $result_payroll['Payroll_Emp_Type']; ?></td>
						<td><a href="accept_payroll.php?id=<?php echo $result_payroll['Payroll_ID'];  ?>" ><img id="accept" src="../../icons/check.png" ></a></td>
						
					</tr>
				</tbody>
			<?php } }while($result_payroll=$query_display_payroll->fetch_assoc()); ?>
								
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