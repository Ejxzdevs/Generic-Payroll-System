<?php 
include "../../connection/connection.php";


$select_all_adjustment = "SELECT * FROM(SELECT * FROM tbl_personal_information) tbl_personal_information INNER JOIN (SELECT * FROM tbl_adjustment) tbl_adjustment ON tbl_personal_information.Employees_ID = tbl_adjustment.Employees_ID";
$query_adjustment = mysqli_query($conn,$select_all_adjustment);
$res_adjustment= mysqli_fetch_assoc($query_adjustment);



?>



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
							<li ><a href="payroll_layout.php"   >Payroll</a> <img src="../../icons/salary_list.png" id="img_salary" > </li>
							<li><a href="record_layout.php" >Records</a><img id="img_history" src="../../icons/payroll_record.png">  </li>
							<li><a href="adjustment_layout.php" style="color:#66ff66;"  >Adjustment</a><img id="img_history" src="../../icons/money-management.png">  </li>
						</ul>
					</div>
					<div class="salary">
						<div class="salary-header">
							<div class="salary-header-left" id="btn-adjustment">
									<a href="javascript: open_adjustment();">Create</a>
							
							</div>
							<div class="salary-header-right">
									
							</div>	
						</div>
						
						<div class="salary-body">
							<table class="payroll-table" id="tax-display">
								
								<thead>
									<tr>
										<th style="width:100px;">ID</th>
										<th style="width: 300px;">Name</th>
										<th >Type</th>
										<th>Amount</th>
										<th>Pay Date</th>
										<th>Status</th>
										<th>Action</th>
									</tr>
								</thead>
							
							<?php do{ IF(isset($res_adjustment['Adj_ID'])){ ?>
								<tbody>
									<tr>
										<td><?PHP ECHO $res_adjustment['Adj_ID']; ?></td>
										<td><?PHP ECHO $res_adjustment['First_Name'] . " "
										. $res_adjustment['Last_Name']; ?></td>
										<td><?PHP ECHO $res_adjustment['Name']; ?></td>
										<td><?PHP ECHO $res_adjustment['Amount']; ?></td>
										<td><?PHP ECHO $res_adjustment['Date']; ?></td>
										<td><?PHP ECHO $res_adjustment['Status']; ?></td>
										<td><a href="delete_adjustment.php?id=<?php echo $res_adjustment['Adj_ID']; ?>"><img id="delete-icon" src="../../icons/delete.svg"> </a></td>
									</tr>
								</tbody>
							<?php } }while($res_adjustment=$query_adjustment->fetch_assoc())?>
							</table>
						</div>
						
					</div>
					
				</div>	
		
			</div>
			<div class="container-adjustment">
				<div class="box-adjustment">
					<form method="POST" action="insert.php">
						<div class="header-adjustment">
							<label>Salary Adjustment</label>
							<a href="javascript: close_adjustment();"><img id="close" src="../../icons/close.svg"></a>
						</div>
						<div class="content-adjustment">
						
							<div style="margin-top: 1em;" class="row-adjustment">
								<input type="text" placeholder="Employee ID: " name="id">
							</div>
							<div class="row-adjustment">
								<input type="text" placeholder="Adjustment type: " name="type">
							</div>
								<div class="row-adjustment">
								<input type="text" placeholder="Amount: " name="amount">
							</div>
							<div class="row-adjustment">
								<input type="date" name="date">
							</div>
							<div class="row-adjustment">
								<button type="submit" name="btn-submit">Submit</button>
							</div>

						</div>
					</form>
				</div>
			</div>






		</div>
	</div>
</body>
	<script type="text/javascript" src="adjustment_tax.js"></script>
</html>