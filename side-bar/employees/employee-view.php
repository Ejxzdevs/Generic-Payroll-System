


<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="employees.css">
	<script type="text/javascript" src="employee-header.js"></script>
	<title>Payroll Managament System</title>
</head>
<body>
	<div class="background">
		
		<div class="div-background">
	
			<div class="home-content">
				
				<div class="employees-box">
					<div class="employees-dir">
						<h3>Employees List</h3>
					</div>
					<div class="employees-header">
						<div class="header-1">
						<a href="#" id="open-employee-form"  >Add Employee</a>
						</div>
						
						<div class="header-2">
							<form method="POST" action="employees.php">			
									<div class="containter-search">
										<div class="containter-input-search">
											<img src="../../icons/search.svg" id="img_search">
											<input type="text" name="search-name" class="input" placeholder="Type text:">
											<input type="submit" name="submit-name" class="search">
										</div>
									</div>
							</form>
						</div>
						
					</div>
					<div class="employee-table">
						<div class="employee">
							<table class="table-content" id="myTable" data-filter-control="true" data-show-search-clear-button="true">
								<thead>
									<tr>
										<th>Employee ID</th>
										<th>Employee Name</th>
										<th>Department</th>
										<th>Position</th>
										<th>Action</th>
									</tr>
								</thead>
								<tbody>
								<?php do { ?>
									<tr>
										<td> <?php echo $employee['Employees_ID']; ?></td>
										<td ><?php echo $employee['First_Name'];?> <?php echo $employee['Last_Name'];?> </td>
										<td> <?php echo $employee['Department_Name']; ?> </td>
										<td> <?php echo $employee['Position_Name']; ?> </td>
										<td><a href="view-employees.php?view=<?php echo $employee['Employees_ID'];?>" id="view" ><img id="view-icon" src="../../icons/view-action.svg"></a><a href="delete.php?id=<?php echo $employee['Employees_ID'];?>" ><img id="delete-icon" src="../../icons/delete.svg"></a></td>
									</tr>
								<?php }while($employee=$query->fetch_assoc());  ?>	
								</tbody>	
							</table>
						</div>
					</div>
				</div>	
			</div>
			<!--  -->
			
			<!-- pop up code here -->
			<div class="view-emp-container">
				<div class="box-view-emp-container">
					<div class="title-view-emp"> 
						<label>View Informations</label>
						<a href="employee_list_layout.php"><img id="close-view-emp" src="../../icons/close.svg" ></a>
					</div>
					<div class="body-view-emp">
						<div class="profile-view">
							<div class="img-container"> 
								<img src="<?php echo $res_view_emp['Employee_Image']; ?>">
							</div>
							<div class="pri-info">
								<div class="row-info">
								<p>ID: <label><?php echo $res_view_emp['Employees_ID']; ?> </label></p>
								</div>
								<div class="row-info">
								<p>Name: <label><?php echo $res_view_emp['First_Name'] . 
								" " . $res_view_emp['Last_Name']; ?> </label></p>
								
								</div>
								<div class="row-info">
								<p>Department: <label><?php echo $res_view_emp['Department_Name']; ?> </label></p>
								</div>
								<div class="row-info">
								<p>Position: <label><?php echo $res_view_emp['Position_Name']; ?> </label></p>
								</div>
								


							</div>
						</div>
						<div class="info-view">
							<!-- first row -->
							<!-- <div class="col-title">
								<label> Personal Information</label>
							</div> -->
							<div class="row-body-info"> 
								<div class="col-body-info">
									<p>First Name</p>
									<label><?php echo $res_view_emp['First_Name']; ?></label>
								</div>
								<div class="col-body-info">
									<p>Middle Name</p>
									<label><?php echo $res_view_emp['Middle_Name']; ?></label>
								</div>
								<div class="col-body-info">
									<p>Last Name</p>
									<label><?php echo $res_view_emp['Last_Name']; ?></label>
								</div>
								<div class="col-body-info">
									<p>Suffix</p>
									<label><?php echo $res_view_emp['Suffix']; ?></label>
								</div>
							</div>

							<!-- row 2 -->

							<div class="row-body-info"> 
								<div class="col-body-info">
									<p>Province</p>
									<label><?php echo $res_view_emp['Province']; ?></label>
								</div>
								<div class="col-body-info">
									<p>Zip Code</p>
									<label><?php echo $res_view_emp['Zip_Code']; ?></label>
								</div>
								<div class="col-body-info">
									<p>City</p>
									<label><?php echo $res_view_emp['City']; ?></label>
								</div>
								<div class="col-body-info">
									<p>Street</p>
									<label><?php echo $res_view_emp['Street']; ?></label>
								</div>

							</div>

							<!-- row 3 -->

							<div class="row-body-info" id="emp-info"> 
								<div class="col-body-info" style="width:35%;">
									<p>Email</p>
									<label><?php echo $res_view_emp['Email']; ?></label>
								</div>
								<div class="col-body-info">
									<p>Number</p>
									<label><?php echo $res_view_emp['Contact_Number']; ?></label>
								</div>
								<div class="col-body-info" >
									<p>Birth Date</p>
									<label><?php echo date(('M-d-Y'), strtotime($res_view_emp['Birth_Date'])); ?></label>
								</div>
							</div>

							<!-- ROW 4 -->

							<div class="row-body-info" id="add-info"> 
								<div class="col-body-info">
									<p>Province</p>
									<label><?php echo $res_view_emp['Status']; ?></label>
								</div>
								<div class="col-body-info">
									<p>Zip Code</p>
									<label><?php echo $res_view_emp['Gender']; ?></label>
								</div>
								

							</div>
							<!-- employee info -->

						<!-- 	<div class="col-title">
								<label>Employee Information</label>
							</div> -->

							<!-- row 6 -->
							<div class="row-body-info" id="emp-info" > 
								<div class="col-body-info" >
									<p>Department</p>
									<label><?php echo $res_view_emp['Department_Name']; ?></label>
								</div>
								<div class="col-body-info">
									<p>Position</p>
									<label><?php echo $res_view_emp['Position_Name']; ?></label>
								</div>
								<div class="col-body-info">
									<p>Type</p>
									<label><?php echo $res_view_emp['Employee_Types']; ?></label>
								</div>
								<div class="col-body-info">
									<p>Schedule</p>
									<label><?php echo $res_view_emp['Schedule_Name']; ?></label>
								</div>
							</div>

							<!-- row7 -->

							<!-- <div class="row-body-info" id="emp-info" > 
								<div class="col-body-info" style="width:35%;">
									<p>Sss No.</p>
									<label></label>
								</div>
								<div class="col-body-info">
									<p>Pag-Ibig No.</p>
									<label></label>
								</div>
								<div class="col-body-info">
									<p>PhilHealth No.</p>
									<label></label>
								</div>
							</div> -->

							<div class="row-body-info" id="update-emp"> 
								<a href="emp_edit_info_layout.php?update_id=<?php echo $res_view_emp['Employees_ID']; ?>" id="btn-edit"	 >EDIT</a>
							</div>

							


							

							

						</div>
					</div>
				</div>
				
			</div>



			<!-- view edit -->





		</div>

		
	</div>
</body>
<script type="text/javascript" src="employee-footer.js"></script>
</html>