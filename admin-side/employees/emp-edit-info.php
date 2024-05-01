


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
										<td><a href="view-employees.php?view=<?php echo $employee['Employees_ID'];?>" id="view" ><img id="view-icon" src="../../icons/edit-action.svg"></a><a href="delete.php?id=<?php echo $employee['Employees_ID'];?>" ><img id="delete-icon" src="../../icons/delete.svg"></a></td>
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
				<form action="update-emp.php" method="POST">
				<div class="box-view-emp-container">
					<div class="title-view-emp"> 
						<label>View Informations</label>
						<a href="employee_list_layout.php"><img id="close-view-emp" src="../../icons/close.svg" ></a>
					</div>
					<div class="body-view-emp">
						<div class="profile-view">
							<div class="img-container"> 
								<img 
								<?php if($res_view_emp['Employee_Image'] == ''){ ?>
									src="../../icons/user1.png"
								<?PHP }else{ ?>
									src="emp-image/<?php echo $res_view_emp['Employee_Image']; ?>"
								<?php } ?>
								>
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
									<input type="hidden" name="id" value="<?php echo $res_view_emp['Employees_ID']; ?>">
									<input type="text" name="firstname" value="<?php echo $res_view_emp['First_Name']; ?>">
									
								</div>
								<div class="col-body-info">
									<p>Middle Name</p>
									<input type="text" name="middlename" value="<?php echo $res_view_emp['Middle_Name']; ?>">

								
								</div>
								<div class="col-body-info">
									<p>Last Name</p>
									<input type="text" name="lastname" value="<?php echo $res_view_emp['Last_Name']; ?>">
								</div>
								<div class="col-body-info">
									<p>Suffix </p>
									<input type="text" name="suffix" value="<?php echo $res_view_emp['Suffix']; ?>">
								</div>
							</div>

							<!-- row 2 -->

							<div class="row-body-info"> 
								<div class="col-body-info">
									<p>Province</p>
									<input type="text" name="province" value="<?php echo $res_view_emp['Province']; ?>">
								</div>
								<div class="col-body-info">
									<p>Zip Code</p>
									<input type="text" name="zipcode" value="<?php echo $res_view_emp['Zip_Code']; ?>">
								</div>
								<div class="col-body-info">
									<p>City</p>
									<input type="text" value="<?php echo $res_view_emp['City']; ?>" name="city">
								</div>
								<div class="col-body-info">
									<p>Street</p>
									<input type="text" name="street" value="<?php echo $res_view_emp['Street'];?>">
								</div>

							</div>

							<!-- row 3 -->

							<div class="row-body-info" id="emp-info"> 
								<div class="col-body-info" style="width:35%;">
									<p>Email</p>
									<input type="text" name="email" value="<?php echo $res_view_emp['Email']; ?>" style="width: 13em;">
								</div>
								<div class="col-body-info">
									<p>Number</p>
									<input type="text" name="number" value="<?php echo $res_view_emp['Contact_Number']; ?>" style="width:10em;">
								</div>
								<div class="col-body-info">
									<p>Birth Date</p>
									<input type="date" name="birthdate" value="<?php echo $res_view_emp['Birth_Date']; ?>"  style="width: 12em;" >
								</div>
							</div>

							<!-- ROW 4 -->

							<div class="row-body-info" id="add-info"> 
								<div class="col-body-info">
									<p>Marital Status</p>
									
									<select name="status">
										<option disabled><?php echo $res_view_emp['Status']; ?></option>
										<option value="Single">Single</option>
										<option value="Maried">Maried</option>
										<option value="Divorced">Divorced</option>
										<option value="Seperated">Seperated</option>
									</select>
								</div>
								<div class="col-body-info">
									<p>Gender</p>
									<select name="gender">

										<option disabled><?php echo $res_view_emp['Gender']; ?></option>
										<option value="Male">Male</option>
										<option value="Female">Female</option>
										
									</select>
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
									<select name="department">
										<option value="<?php echo $res_view_emp['Department_ID']; ?>">
											<?php echo $res_view_emp['Department_Name']; ?>
										</option>
										<?php do{ ?>
										<option value="<?php echo $result_query_dept['Department_ID'] ?>"><?PHP echo $result_query_dept['Department_Name']; ?></option>
										<?php }while($result_query_dept=$query_dept->fetch_assoc()); ?>
									</select>	

										
								
									

								</div>
								<div class="col-body-info">
									<p>Position</p>
									<select name="position">
										<option value="<?php echo $res_view_emp['Position_ID']; ?>">
											<?php echo $res_view_emp['Position_Name']; ?>
										</option>
										<?php do{ ?>
											<option value="<?php echo $res_position['Position_ID'] ?>"><?PHP echo $res_position['Position_Name']; ?></option>
										<?php }while($res_position=$query_position->fetch_assoc()); ?>
									</select>	
								</div>
								<div class="col-body-info">
									<p>Type</p>
									<select name="emp_type">
									<option value="<?php if($fetch_types['Types'] == 'Regular'){
										echo 'Casual';
									}else{
										echo 'Regular';
									} ?>"><?php if($fetch_types['Types'] == 'Regular'){
										echo 'Casual';
									}else{
										echo 'Regular';
									} ?></option>
								<?php do{ ?>
									<option value="<?php echo $fetch_types['Types']; ?>"><?php echo $fetch_types['Types']; ?></option>
								<?php }while($fetch_types=$query_types->fetch_assoc()); ?>
										
									
									</select>
								</div>

								<div class="col-body-info">
									<p>Schedule</p>
								
									<select name="schedule">
										<option value="<?PHP echo $res_view_emp['Schedule_ID']; ?>"><?php echo $res_view_emp['Schedule_Name']; ?></option>
										<?PHP DO{ ?>
											<option value="<?PHP echo $res_sched['Schedule_ID']; ?>">
												<?PHP echo $res_sched['Schedule_Name']; ?>
											</option>
										<?PHP }WHILE($res_sched=$query_sched->fetch_assoc()); ?>
									</select>
								</div>
							</div>

							<!-- row7 -->

							<!-- <div class="row-body-info" id="emp-info" > 
								<div class="col-body-info" style="width:35%;">
									<p>Sss No.</p>
									<input type="text" name="sss" value="
								</div>
								<div class="col-body-info">
									<p>Pag-Ibig No.</p>
									<input type="text" name="pagibig" value="">
								</div>
								<div class="col-body-info">
									<p>PhilHealth No.</p>
									<input type="text" name="philhealth" value="">
								</div>
							</div> -->

							<div class="row-body-info" id="update-emp"> 
								<button type="submit" name="submit" style="height: 1.7em; width: 7em;" >SAVE</button>
							
							</div>

							


							

							

						</div>
					</div>
				</div>
				</form>
			</div>



			<!-- view edit -->





		</div>

		
	</div>
</body>
<script type="text/javascript" src="employee-footer.js"></script>
</html>