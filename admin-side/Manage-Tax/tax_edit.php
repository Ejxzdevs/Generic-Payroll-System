<?php include "tax_read.php"; ?>
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
	<link rel="stylesheet" type="text/css" href="tax.css">
	<title>Payroll Managament System</title>
</head>
<body>
	<div class="background">
			
		

			<div class="home-content">
				
				<div class="box-payroll">
					<div class="payroll-nav-bar">
						<ul class="active" >
							<li ><a href="basic_salary_layout.php" style="color:#66ff66;"   >Regular</a> <img src="../../icons/salary.svg" id="img_salary" > </li>
							<li><a href="ot_layout.php" >Casual</a><img id="img_history" src="../../icons/history.svg">  </li>
							<li><a href="ot_layout.php" >Configure</a><img id="img_history" src="../../icons/history.svg">  </li>
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
							<table class="payroll-table">
								<thead>
									<tr>
										<th>ID</th>
										<th>Employee Name</th>
										<th>No. Tax</th>
										<th>Action </th>
									</tr>
								</thead>
								<?php do{?>
								<tbody>
									<tr>
										<th><?php echo $result_regular_tax['Employees_ID']; ?></th>
										<th><?php echo $result_regular_tax['First_Name'] . " " . $result_regular_tax['Last_Name']; ?></th>
										<th><?php echo $result_regular_tax['total_tax']; ?></th>
										<th><img id="edit-icon" src="../../icons/edit-action.svg"></th>
									</tr>
								</tbody>
								<?php }while($result_regular_tax=$query_regular_tax->fetch_assoc()); ?>
							</table>
						</div>
						
					</div>
					
				</div>	
		
			</div>

				<div class="container-deduction">
				<div class="box">
					<div class="title">
						<label>VIEW Statutory</label>
						<a href="tax_layout.php" id=""><img id="close" src="../../icons/close.svg" ></a>
					</div>
					<div class="body">
						<div class="profile">
							<div class="a-div">
								<img 
								<?php if($result_emp_tax['Employee_Image'] == ''){ ?>
									src="../../icons/user1.png" 
								<?php }else{ ?>
								src="../employees/emp-image/<?php echo $result_emp_tax['Employee_Image']; ?>" 
							<?php } ?>
								>

							</div>
							<div class="b-div">
								<p>ID: <span id="id"><?php echo $result_emp_tax['Employees_ID']; ?></span></p>
								<p>Name: <span><?php echo $result_emp_tax['First_Name'] . " " . $result_emp_tax['Last_Name']; ?></span></p>
								<p>Position: <span><?php echo $result_emp_tax['Department_Name']; ?> </span></p>
								<p>Job Department: <span><?php echo $result_emp_tax['Position_Name']; ?></span></p>

							</div>
							
						</div>
						<div class="info">
						
							<div class="b">
								<div class="data">
									<table>
										<thead>
											<tr>
											
												<th>Name</th>
												<th>Share</th>
												<th>Status</th>
											
											</tr>
										</thead>
									<?php do{ ?>
										<tbody id="exampleid">
											<tr> 		
												<td><?php echo $result_emp_tax['Tax_Name']; ?></td>		
												<td><?php echo $result_emp_tax['Employee_Share'] . "%"; ?></td>
												<td><a <?php IF($result_emp_tax['Tax_Status'] == 'Enable' ){ ?>
													class = 'ON';
												<?php }else{ ?>
													class = 'OFF';
												<?php } ?>
													href="tax_update.php?id=<?php echo $result_emp_tax['Employees_ID']; ?>&tax_id=<?php echo $result_emp_tax['Tax_emp_ID']; ?>" ><?php echo $result_emp_tax['Tax_Status']; ?></a></td>
											</tr>	
										</tbody>
								<?php }while($result_emp_tax=$query_emp_tax->fetch_assoc()); ?>
									</table>
								</div>
							</div>
							
							</form>
						</div>
					</div>
					
				</div>
			</div>





		</div>
	</div>
</html>