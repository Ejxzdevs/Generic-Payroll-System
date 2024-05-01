<?php include "read.php"; ?>

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
	<link rel="stylesheet" type="text/css" href="allowance.css">
	
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
								<form method="POST" action="deduction.php" class="form">			
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
						
						<div class="salary-body">
							<table class="payroll-table">
						
								<thead>
									<tr>
										<th>Allowance ID</th>
										<th>Allowance Name</th>
										<th>Contributions</th>
										<th>Total Amount</th>
										<th>Action</th>
									</tr>
								</thead>

								<tbody>
								<?PHP DO{ ?>
									<tr>
										<td><?php echo $res_query_allowance['Employees_ID']; ?></td>
										<td><?php echo $res_query_allowance['First_Name']; ?></td>
										<td><?php echo $res_query_allowance['no_deduction']; ?></td>

										<td><?php echo $res_query_allowance['total_deduction']; ?></td>
										<td><a href="pop_deduction.php?id=<?php echo $res_query_allowance['Employees_ID']; ?> "><img id="view-icon" src="../../icons/view-action.svg" ></a> </td>
								<?PHP }WHILE($res_query_allowance=$query_allowance->fetch_assoc()); ?>	
									</tr>
										
								</tbody>
								
							</table>
						</div>
					</div>
					
				</div>	
		
			</div>
			<div class="container-deduction">
				<div class="box">
					<div class="title">
						<label>Allowance </label>
						<a href="allowance_layout.php" id=""><img id="close" src="../../icons/close.svg" ></a>
					</div>
					<div class="body">
						<div class="profile">
							<div class="a-div">
								<img src="../employees/<?php echo $result_allowance_info['Employee_Image']; ?> ?>" >
							</div>
							<div class="b-div">
								<p>ID: <span id="id"><?php echo $result_allowance_info['Employees_ID']; ?> </span></p>
								<p>Name: <span><?php echo $result_allowance_info['First_Name'] . " " . $result_allowance_info['Last_Name']; ?></span></p>
								<p>Position: <span><?php echo $result_allowance_info['Position_Name']; ?> </span></p>
								<p>Job Department: <span><?php echo $result_allowance_info['Department_Name']; ?></span></p>

							</div>
							
						</div>
						<div class="info">
							<div class="b">
								<div class="data">
									<table>
										<thead>
											<tr>
											
												<th>Allowance</th>
												
												<th>Amount</th>
												<th>Status</th>
											
											</tr>
										</thead>
										<?php do{ ?>
										<tbody id="exampleid">
											<tr> 
												
												<td><?php echo $result_allowance_info['Allowance_Name']; ?></td>
										
												<td><?php echo $result_allowance_info['Allowance_Value']; ?></td>
												<td><?php echo $result_allowance_info['Allowance_Status']; ?></td>
											</tr>
										<?php }WHILE($result_allowance_info=$query_a->fetch_assoc()); ?>
										</tbody>
									</table>
								</div>
							</div>
						</div>
					</div>
					
				</div>
			</div>
			
		</div>
		
	</div>
	<!-- <script type="text/javascript" src="deduction.js"></script> -->
</body>

</html>