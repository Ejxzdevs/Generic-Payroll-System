<?php include 'edit_read.php'; ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="edit-info.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.3/font/bootstrap-icons.css">
    <script type="text/javascript" src="employees.js"></script>
	<title>Payroll Managament System</title>
</head>
<body>
	<div class="background">
		
		<div class="div-background">
			<div class="home-navigation-bar">
				<ul>
					<li><p><span>P</span>ay-<span>C</span>on</p></li>
					<li><a href="../home/home.php" ><img src="../../icons/nav-dashboard.svg">Dashboard</a></li>
					<li><a href="employees.php"><img src="../../icons/nav-emp.svg">Employees</a></li>
					<li><a href="../attendance/schedule.php"><img src="../../icons/nav-attendance.svg">Attendance</a></li>
					<li><a href="../payroll/payroll.php"><img src="../../icons/nav-payroll.svg">Payroll</a></li>
					<li><a href="../leave/leave.php"><img src="../../icons/folder.svg">File Leave</a></li>
					<li><a href="../../user-entry/log-out.php"><img src="../../icons/log-out.svg">Log out</a></li>
				</ul>
			</div>
			<div class="home-content">
				<div class="system-logo">
					<h1 class="logo">Payroll Management System</h1>
				</div>		
				<div class="employees-box">
					<div class="employees-dir">
						<h1>Employees List</h1>
					</div>
					<div class="employees-header">
						<div class="header-1">
						<a href="#" id="open-employee-form" ><i class="bi bi-person-plus"></i>Add Employee</a>
						</div>
						<form action="employees.php" method="get">
						<div class="header-2">
						<input type="text" name="search" class="search-input" placeholder="Search Employee"><button type="submit"class="search-button" name="submit-search"><i class="bi bi-search"></i></button>
						</div>
						</form>
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
										<td><a href="view-employees.php?view=<?php echo $employee['Employees_ID'];?>" id="view" ><img id="view-icon" src="../../icons/view-action.svg"></a><a href="delete.php?id=<?php echo $employee['Employees_ID'];?>" ><img id="delete-icon" src="../../icons/delete.svg"></a></td>
									</tr>
								<?php }while($employee=$query->fetch_assoc());  ?>	
								</tbody>	
							</table>
						</div>
					</div>
				</div>	
			</div>

			<div class="view-pop-up" >
				<form method="post" action="update-info.php" enctype="multipart/form-data">
				<div class="show-details">
					<?php do { ?>
					<div class="profile">
						<div class="image-preview" id="image-border">
									<img src="#" class="upImage">
									<img class="default-image" src=<?php echo $res_view['Employee_Image'];?>>
									<label for="inpFile" class="icon-img" ><img id="camera-icon" src="../../icons/camera.svg"></label>
								<input type="file" name="file" id="inpFile" class="img-upload-button" style="display: none;" >	
						</div>
						<div class="emp-id">
							<label>ID: <?php echo $res_view['Employees_ID']; ?></label>
						</div>
						<div class="emp-name">
							<label>Name: <?php echo $res_view['First_Name']; ?> <?php echo $res_view['Last_Name']; ?> </label>
						</div>
						<div class="emp-position">
							<label>Position: <?php echo $res_view['Position']; ?> </label>
						</div>
						<div class="emp-position">
							<label>Department: <?php echo $res_view['Job_Department']; ?> </label>
						</div>
					</div>
					<div class="details-emp">
						 <div class="emp-logo">
						 	<label>Employee Details</label>
						 	<!-- close-button <a href="employees.php">X</a> -->
						 </div>
						 <div class="name-label">
						 	<div class="name-label-width">
						 		<label>First Name</label>
						 	</div>
						 	<div class="name-label-width">
						 		<label>Middle Name</label>
						 	</div>
						 	<div class="name-label-width">
						 		<label>Last Name</label>
						 	</div>
						 	<div class="name-label-width">
						 		<label>Suffix</label>
						 	</div>
						 </div>
						 <div class="full-name">
						 	<div class="name-info">
						 		<input type="text" name="firstname" value="<?php echo $res_view['First_Name']; ?>">
						 	</div>
						 	<div class="name-info">
						 		<input type="text" name="middlename" value="<?php echo $res_view['Middle_Name']; ?>">
						 	</div>
						 	<div class="name-info">
						 		<input type="text" name="" value="<?php echo $res_view['Last_Name']; ?>">
						 	</div>
						 	<div class="name-info">
						 		<input type="text" name="lastname" value="<?php echo $res_view['Suffix']; ?>">
						 	</div>
						 </div>
						 <div class="label-address">
						 	<div class="address-label-width">
						 		<label>Province</label>
						 	</div>
						 	<div class="address-label-width">
						 		<label>Zip code</label>
						 	</div>
						 	<div class="address-label-width">
						 		<label>City</label>
						 	</div>
						 	<div class="address-label-width">
						 		<label>Street</label>
						 	</div>
						 </div>
						 <div class="full-address">
						 	<div class="full-info">
						 		<input type="text" name="province" value="<?php echo $res_view['Province']; ?>">
						 	</div>
						 	<div class="full-info">
						 		<input type="text" name="zip" value="<?php echo $res_view['Zip_Code']; ?>">
						 	</div>
						 	<div class="full-info">
						 	<input type="text" name="city" value="<?php echo $res_view['City']; ?>">
						 	</div>
						 	<div class="full-info">
						 		<input type="text" name="street" value="<?php echo $res_view['Street']; ?>">
						 	</div> 	
						 </div>
						  <div class="label-other-info">
						 	<div class="other-info">
						 		<label>Email</label>
						 	</div>
						 	<div class="other-info">
						 		<label>Number</label>
						 	</div>
						 </div>
						 <div class="input-other-info">
						 	<div class="input-info">
						 		<input type="text" name="email" value="<?php echo $res_view['Email']; ?>">
						 	</div>
						 	<div class="input-info">
						 		<input type="text" name="number" value="<?php echo $res_view['Contact_Number']; ?>">
						 	</div>
						 </div>
						 <div class="label-other-info2">
						 	<div class="other-info2">
						 		<label>Gender</label>
						 	</div>
						 	<div class="other-info2">
						 		<label>Marital Status</label>
						 	</div>
						 	<div class="other-info2">
						 		<label>Birthdate</label>
						 	</div>
						 </div>
						 <div class="input-other-info2">
						 	<div class="input-info2">
						 				<select name="gender">
								<option ><?php echo $res_view['Gender']; ?></option>
					<?php do { ?>
					<option value="<?php echo $res_gender['Gender_Types']; ?>"><?php echo $res_gender['Gender_Types']; ?></option>
					<?php }while($res_gender=$gender->fetch_assoc()); ?>
								</select>
						 	</div>
						 	<div class="input-info2">
						 		<select name="status">
								<option ><?php echo $res_view['Status']; ?></option>
					<?php do { ?>
					<option value="<?php echo $res_marital['Marital_Types']; ?>"><?php echo $res_marital['Marital_Types']; ?></option>
								<?php }while($res_marital=$marital->fetch_assoc()); ?>
								</select>
						 	</div>
						 	<div class="input-info2">
						 		<input type="date" name="birthdate" value="<?php echo $res_view['Birth_Date'];?>">
						 	</div>
						 </div>
						 <div class="label-job-description">
						 	<div class="label-job">
						 		<label>Department</label>
						 	</div>
						 	<div class="label-job">
						 		<label>Position</label>
						 	</div>
						 	<div class="label-job">
						 		<label>Salary</label>
						 	</div>
						 </div>
						 <div class="input-job-description">
						 	<div class="input-job">
						 		<select name="department" >
					<option ><?php echo $res_view['Job_Department']; ?> </option>
						<?php do { ?>
					<option value="<?php echo $result['Department_Name']; ?>"> <?php echo $result['Department_Name']; ?></option>
						<?php }while($result=$department->fetch_assoc()); ?>
								</select>
						 	</div>
						 	<div class="input-job">
						 		<select name="position">
								<option > <?php echo $res_view['Position']; ?> </option>
								<?php do { ?>
								<option value="<?php echo $pos['Position_Name']; ?>"> 
									<?php echo $pos['Position_Name']; ?> </option>
								<?php }while($pos=$position->fetch_assoc()); ?>
								</select>
						 	</div>
						 	<div class="input-job">
						 		<label><?php echo $res_view['Hourly_Salary']*8*30; ?></label>
						 		<input type="hidden" name="id" value="<?php echo $res_view['Employees_ID'];?>">
						 	</div>
						 </div>
						 <div class="div-save-cancel">
						 	<div class="save-div">
						 		<button type="submit" name="update" class="save-button" >SAVE</button>
						 	</div>
						 	<div class="cancel-div">
						 		<a href="view-employees.php?view=<?php echo $res_view['Employees_ID'];?>" class="cancel-button">CANCEL</a>
						 	</div>
						 </div>
					</div>
					

					<?php }while($res_view=$view->fetch_assoc());  ?>
					</form>
				</div>
			</div>
		</div>
		
	</div>
</body>
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