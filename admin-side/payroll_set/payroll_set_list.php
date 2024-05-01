
<!DOCTYPE html>
<html>
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
			
				<div class="user-head">
					<div class="dir-label">
						<div class="left">
							<label>Payroll Type</label>
						</div>
						<div class="right">
							<form method="POST" action="allowance_layout.php">			
									<div class="containter-search">
										<div class="containter-input-search">
										<img src="../../icons/search.svg" id="img_search">
										<input type="text" name="name" class="input" placeholder="Type text:">
										<input type="submit" name="submit"  value="Search" class="search">
										</div>
									</div>
								</form>
						</div>
					</div>	
				<div class="body-holiday">
						<div class="box-table">
						<table >
							<thead>
								<tr>
									<th>ID</th>
									<th>Type Employee</th>
									<th>Payroll Type</th>
									<th>Action</th>
								</tr>
							</thead>
							<?php do{ ?>
							<tbody>
								<tr>
									<td><?php echo $fetch_type['Payroll_Set_date_ID'] ?></td>
									<td><?php echo $fetch_type['Type_Employees'] ?></td>
									<td><?php if($fetch_type['Payroll_Date_Interval'] == '1days'){
											echo "Daily";
									}elseif($fetch_type['Payroll_Date_Interval'] == '6days'){
										echo "Weekly";
									}
									elseif($fetch_type['Payroll_Date_Interval'] == '13days'){
										echo "Bi-weekly";
									}elseif($fetch_type['Payroll_Date_Interval'] == '14days'){
										echo "Semi-Monthly";
									}elseif($fetch_type['Payroll_Date_Interval'] == '29days'){
										echo "Monthly";
									}
										?></td>
									
									
									<td><a href="payroll_edit_layout.php?id=<?php echo $fetch_type['Payroll_Set_date_ID']; ?>"><img id="edit-icon" src="../../icons/edit-action.svg"></a></td>
								</tr>
							</tbody>
						<?php }while($fetch_type=$query_type->fetch_assoc());?>
					
					
						</table>

					</div>

					</div>
					<div class="footer">
						<!-- <a href="#" id="add-deduction">Add Item</a> -->
					</div>


				</div>	
				
			</div>
	
			

	</div>
	</div>


</body>
	<script type="text/javascript" src="payroll.js"></script>
</html>