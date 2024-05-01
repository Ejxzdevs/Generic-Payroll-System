<?php 
include "../../connection/connection.php";


$select_tax = "SELECT * FROM `tbl_tax_list`";
$query_tax = mysqli_query($conn,$select_tax);
$fetch_tax = mysqli_fetch_assoc($query_tax);



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
							<li ><a href="tax_layout.php"   >Regular</a> <img src="../../icons/employees-icon.png" id="img_salary" > </li>
							<li><a href="configure_layout.php" style="color:#66ff66;" >Configure</a><img id="img_history" src="../../icons/worker.png">  </li>
						</ul>
					</div>
					<div class="salary">
						<div class="salary-header">
							<div class="salary-header-left">
								<!-- <select id="filter-emp" >
										<option value="Regular">Regular</option>
										<option value="Casual">Casual</option>
								</select> -->
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
							
								<thead>
									<tr>
										<th style="width: 400px;">ID</th>
										<th style="width: 400px;">Name</th>
										<th style="width: 400px;">Action</th>
									</tr>
								</thead>
								<?PHP DO{ if(isset($fetch_tax['Tax_ID'])){ ?>
								<tbody>
									<tr>
										<td><?php echo $fetch_tax['Tax_ID'] ?></td>
										<td><?php echo $fetch_tax['Tax_Name'] ?></td>
										<td><a href="configure_edit_layout.php?id=<?php echo $fetch_tax['Tax_ID']; ?>"><img id="edit-icon" src="../../icons/edit-action.svg"></a> </td>
									</tr>
								</tbody>
								<?PHP  }}WHILE($fetch_tax=$query_tax->fetch_assoc()); ?>
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