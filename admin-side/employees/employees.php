<?php include 'read.php'; ?>
<?php include '../../sweetalert/swal.php'; ?>


<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="employees.css">
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
								<?php do { ?>
									<tr>
										<td> <?php echo $employee['Employees_ID']; ?></td>
										<td ><?php echo $employee['First_Name'];?> <?php echo $employee['Last_Name'];?> </td>
										<td> <?php echo $employee['Job_Department']; ?> </td>
										<td> <?php echo $employee['Position']; ?> </td>
										<td><a href="employee_view_layout.php?id=<?php echo $employee['Employees_ID'];?>" id="view" ><img id="view-icon" src="../../icons/view-action.svg"></a><a href="delete.php?id=<?php echo $employee['Employees_ID'];?>" ><img id="delete-icon" src="../../icons/delete.svg"></a></td>
									</tr>
								<?php }while($employee=$query->fetch_assoc());  ?>	
								</tbody>	
							</table>
						</div>
					</div>
				</div>	
			</div>
			<div class="bg-add-employees">
				<div class="box-employees">
					<form class="form-input-emp" action="insert.php" method="post" enctype="multipart/form-data" >
						<div class="divider">
							<div class="profile">
								<div class="image-preview" id="image-border">
									<img src="#" class="upImage">
									<img class="default-image" src="../../icons/people-fill.svg">
									<label for="inpFile" class="icon-img" ><img id="camera-icon" src="../../icons/camera.svg"></label>
								<input type="file" name="file" id="inpFile" class="img-upload-button" style="display: none;" >	
								</div>
							</div>
							<div class="logo-form">
								<label>NEW EMPLOYEE FORM</label>
								<a href="#" id="add-emp-btn"><img id="emp-pop-close" src="../../icons/close.svg"></a>
							</div>	
						</div>
						<div class="input-name">
							<label>Personal Information</label>
							<label class="name">Name</label>
									<input type="text" name="firstname" placeholder="First Name" required>
									<input type="text" name="lastname" placeholder="Last name" required>
									<input type="text" name="middlename" placeholder="Middle Name" required>
									<input type="text" name="suffix" placeholder="Suffix" required>	
						</div>
						<div class="input-address" >
							<label>Address</label>
							<input type="text" name="province" placeholder="Province" required>
							<input type="text" name="zip" placeholder="Zip Code" required>
							<input type="text" name="city" placeholder="City" required>
							<input type="text" name="street" placeholder="Street" required>
						</div>
						<div class="gender-contact">
							<div class="contact">
								
								<div class="email">
									<label>Email</label>
								<input type="text" name="email" placeholder="Email Address" required>
								</div>
								<div class="contact_number">
								<label>Number</label>
								<input type="text" name="number" placeholder="Contact Number" max="9" min="9" required>
								</div>
							</div>
							<div class="gender">
								<label>Gender</label>
												<select name="gender">
								<option disabled selected>Select Gender</option>
					<?php do { ?>
					<option value="<?php echo $res_gender['Gender_Types']; ?>"><?php echo $res_gender['Gender_Types']; ?></option>
								<?php }while($res_gender=$gender->fetch_assoc()); ?>
								</select>
							</div>
						</div>
						<div class="birth-status">
								<div class="status">
									<label>Marital status</label>
									<select name="status">
								<option disabled selected>Marital Status</option>
					<?php do { ?>
					<option value="<?php echo $res_marital['Marital_Types']; ?>"><?php echo $res_marital['Marital_Types']; ?></option>
								<?php }while($res_marital=$marital->fetch_assoc()); ?>
								</select>
								</div>
								<div class="Birthdate">
									<label>Birthdate</label>
									<input type="date" name="birthdate">
								</div>
						</div>
						<div class="job-info">
							<label>Job Information</label>
						</div>
						<div class="grp-job-info">
							<div class="div-department">
								<label>Department</label>
								<select name="department" onclick="this.form.submit();">
								<option selected disabled >Select Department</option>
								<?php do { ?>
					<option value="<?php echo $result['Department_Name']; ?>"><?php echo $result['Department_Name']; ?></option>
								<?php }while($result=$department->fetch_assoc()); ?>
								</select>
							</div>
							<div class="div-position">
								<label>Position</label>
									<select name="position">
								<option selected disabled>Select Position</option>
								<?php do { ?>
					<option value="<?php echo $pos['Position_Name']; ?>"><?php echo $pos['Position_Name']; ?></option>
								<?php }while($pos=$position->fetch_assoc()); ?>
								</select>

							</div>
							<div class="div-daily-rate">
								<label>Schedule</label>
						<select name="schedule">
								<option disabled selected>Select Schedule</option>
					<?php do { ?>
					<option value="<?php echo $sche['Schedule_Name']; ?>"><?php echo $sche['Schedule_Name']; ?></option>
								<?php }while($sche=$schedule->fetch_assoc()); ?>
								</select>
							</div>
						</div>
						<div class="submit-button-employee">
								<input type="submit" name="submit">
							</div>
						
					</form>
				</div>
			</div>
		</div>
		
	</div>
</body>
	<script type="text/javascript">
		document.getElementById("open-employee-form").addEventListener("click", function(){
		document.querySelector(".bg-add-employees").style.display="flex";
		})
		document.getElementById("add-emp-btn").addEventListener("click",function(){
		document.querySelector(".bg-add-employees").style.display="none";
		})
	</script>
	<script >
	const inpFile = document.getElementById("inpFile");
	const previewContainer = document.getElementById("image-border");
	const imageEmp = previewContainer.querySelector(".upImage");
	const defaultImage = previewContainer.querySelector(".default-image");

	inpFile.addEventListener("change", function(){


		const file = this.files[0];

		if (file) {
			const reader = new FileReader();

			defaultImage.style.display = "none";
			imageEmp.style.display = "block";

			reader.addEventListener("load", function(){
				console.log(this);

				imageEmp.setAttribute("src", this.result);

			});

			reader.readAsDataURL(file);

		}


	});



</script>

</html>