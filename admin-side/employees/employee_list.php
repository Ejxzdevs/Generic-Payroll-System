<?php include 'read.php'; ?>


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
							<div class="btn-add">
									<a href="javascript: new_emp();" id="open-employee-form"  >Add Employee</a>
							</div>
							<div class="btn-import">
							<form action="import-emp-csv.php" method="POST" 	enctype="multipart/form-data">
								<label id="btn-imp" for="file">IMPORT <img id="upload-csv" src="../../icons/upload-btn.png"></label>
								<input id="file" type="file" name="file_upload" hidden>
								<button type="submit" name="import-submit" >Upload</button>
							</form>
						</div>
		
					
						</div>
						
						
						<div class="header-2">
							<form method="POST" action="employee_layout.php">			
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
								<?php do {  if(isset($employee['Employees_ID'])


							) {?>
									<tr>
										<td> <?php echo $employee['Employees_ID']; ?></td>
										<td ><?php echo $employee['First_Name'];?> <?php echo $employee['Last_Name'];?> </td>
										<td> <?php echo $employee['Department_Name']; ?> </td>
										<td> <?php echo $employee['Position_Name']; ?> </td>
										<td><a href="emp_edit_info_layout.php?update_id=<?php echo $employee['Employees_ID'];?>" id="view" ><img id="view-icon" src="../../icons/edit-action.svg"></a><a href="delete.php?id=<?php echo $employee['Employees_ID'];?>" ><img id="delete-icon" src="../../icons/delete.svg"></a></td>
									</tr>
							<?php }}while($employee=$query->fetch_assoc());  ?>	
								</tbody>	
							</table>
						</div>
					</div>
				</div>	
			</div>
			<div class="new-emp-container">
				<form method="POST" action="insert_emp.php" enctype="multipart/form-data">
				<div class="box-new-emp">
					<div class="new-emp-title"> 
						<label>NEW EMPLOYEE</label>
						<a href="javascript: close_emp();"><img id="close-new-emp" src="../../icons/close.svg" ></a>
					</div>
					<div class="new-emp-body">
						<div class="emp-img">
							<div class="frame">
								<div class="image-preview" id="image-border">
									<img src="#" class="upImage">
									<img class="default-image" src="../../icons/people-fill.svg">
									<label for="inpFile" class="icon-img" ><img id="camera-icon" src="../../icons/camera.svg"></label>
								<input type="file" name="file" id="inpFile" class="img-upload-button" style="display: none;" >	
								</div>
							</div>
						</div>
						<div class="emp-title">
							<label>Personal Information</label>
						</div>
						<!-- full name -->
						<div class="emp-input">
							<div class="row-input">
								<label>First Name</label>
								<input type="text" name="firstname" placeholder="First Name: ">
							</div>
							<div class="row-input">
								<label>Last Name</label>
								<input type="text" name="lastname" placeholder="Last Name: ">
							</div>
							<div class="row-input">
								<label>Middle Name</label>
								<input type="text" name="middlename" placeholder="Middle Name: ">
							</div>
							<div class="row-input">
								<label>Suffix</label>
								<input type="text" name="suffix" placeholder="Suffix(Optional) ">
							</div>
						</div>
							<!-- ADDRESS -->
						<div class="emp-input">
							<div class="row-input">
								<label>Province</label>
								<input type="text" name="province" placeholder="Province: ">
							</div>
							<div class="row-input">
								<label>Zip Code</label>
								<input type="text" name="zipcode" placeholder="Zip Code: ">
							</div>
							<div class="row-input">
								<label>City</label>
								<input type="text" name="city" placeholder="City: ">
							</div>
							<div class="row-input">
								<label>Street</label>
								<input type="text" name="street" placeholder="Street: ">
							</div>
						</div>

						<!--  -->

						<div class="emp-input">
							<div class="row-input">
								<label>Email</label>
								<input type="text" name="email" placeholder="Email: ">
							</div>
							<div class="row-input">
								<label>Number</label>
								<input type="text" name="number" placeholder="Number: ">
							</div>
							<div class="row-input">
								<label>Birth Date</label>
								<input type="date" name="birthday" >
							</div>
							
						</div>

						<!--  -->

						<div class="emp-input">
							<div class="row-input">
								<label>Marital Status</label>
								<select name="status" >
									<option>Single</option>
									<option>Married</option>
									<option>Devorced</option>
									<option>Separated</option>
								</select>
							</div>
							<div class="row-input">
								<label>Gender</label>
								<select name="gender">
									<option value="Male">Male</option>
									<option value="Female">Female</option>
								</select>
							</div>
						</div>

						<!-- EMPLOYEE INFORMATION -->

						<div class="emp-title">
							<label>Employee Information</label>
						</div>

						<div class="emp-input">
							<div class="row-input">
								<label>Department</label>
								<select name="department" style="width:7em;">
									<!-- <option >Select</option> -->
								<?php do{ ?>
									<option value="<?php echo $result['Department_ID']; ?>" ><?php echo $result['Department_Name']; ?></option>
								<?php }while($result=$department->fetch_assoc()); ?>
								</select>
							</div>
							<div class="row-input">
								<label>Position</label>
								<select name="position" style="width:10em;">
									<!-- <option disabled>Select</option> -->
								<?php do{ ?>
									<option value="<?php echo $pos['Position_ID']; ?>" ><?php echo $pos['Position_Name']; ?></option>
								<?php }while($pos=$position->fetch_assoc()); ?>
								</select>
							</div>
							<div class="row-input">
								<label>Type</label>
								<select name="Emp_Type">
									<option value="Casual">Casual</option>
									<option value="Regular">Regular</option>
								</select>
							</div>
							<div class="row-input">
								<label>Schedule</label>
								<select name="schedule" style="width:8em;">
									<!-- <option disabled>Select</option> -->
								<?php do{ ?>
									<option value="<?php echo $sche['Schedule_ID']; ?>" ><?php echo $sche['Schedule_Name']; ?></option>
								<?php }while($sche=$schedule->fetch_assoc()); ?>
								</select>
							</div>
						</div>

							<!-- tax -->


						<!-- <div class="emp-input">
							<div class="row-input">
								<label>SSS ID</label>
								<input type="text" name="sss_id" placeholder="Account No.:  ">
							</div>
							<div class="row-input">
								<label>PAG-IBIG ID</label>
								<input type="text" name="pagibig_id" placeholder="Account No.:  ">
							</div>
							<div class="row-input">
								<label>PHIL-HEALTH ID</label>
								<input type="text" name="philhealth_id" placeholder="Account No.: ">
							</div>
						</div> -->
						<div class="emp-button">
							<button type="submit" name="submit">SUBMIT</button>
						</div>
							
						

					</div> 

				</div>
				</form>
			</div>
		</div>
		
	</div>

</body>
	<script type="text/javascript" src="employee-footer.js"></script>
</html>