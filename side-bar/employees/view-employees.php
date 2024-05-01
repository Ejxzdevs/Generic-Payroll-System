<?php include 'read.php'; ?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="employees.css">
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
			<div class="bg-add-employees">
				<div class="box-employees">
					<form class="form-input-emp" action="read.php" method="post" enctype="multipart/form-data" >
						<div class="divider">
							<div class="profile">
								<div class="image-preview" id="image-border">
									<img src="#" class="upImage">
									<img class="default-image" src="../../icons/people-fill.svg">
									<label for="inpFile" class="icon-img" ><i class="bi bi-camera-fill"></i></label>
								<input type="file" name="file" id="inpFile" class="img-upload-button" style="display: none;" >	
								</div>
							</div>
							<div class="logo-form">
								<label>NEW EMPLOYEE FORM</label>
								<a href="employees.php"><img id="emp-pop-close" src="../../icons/close.svg"></a>
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
									<option>Select Gender</option>
									<option value ="Male"> MALE </option>
									<option value ="Female"> FEMALE </option>
								</select>
							</div>
						</div>
						<div class="birth-status">
								<div class="status">
									<label>Marital status</label>
									<select name="status">
										<option>Select Status</option>
										<option value ="Single"> Single </option>
										<option value ="Seperated"> Seperated </option>
										<option value ="Divorce"> Divorce </option>
										<option value ="Engaged"> Engaged </option>
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
								<select name="department">
								<option>Select Department</option>
								<option value ="IT-Department"> IT </option>
								<option value ="IT-Designer"> Designer </option>
								</select>
							</div>
							<div class="div-position">
								<label>Position</label>
								<select name="position">
								<option>Select Position</option>
								<option value ="Human Resource"> HR </option>
								<option value ="Regular"> Regular Employee </option>
							</select>
							</div>
							<div class="div-daily-rate">
								<label>Daily Rate</label>
								<input type="text" name="daily-rate" placeholder="Enter Amount">
							</div>
						</div>
						<div class="submit-button-employee">
							<input type="submit" name="submit">
						</div>
					</form>
					
				</div>

			</div>
			<?php
							include "../../connection/connection.php";


							$id = $_GET['view'];

							$sql = "SELECT * FROM tbl_employees_information inner join  tbl_personal_information ON tbl_employees_information.Employees_ID = tbl_personal_information.Employees_ID WHERE tbl_employees_information.Employees_ID = $id";
							$query = mysqli_query($conn,$sql);
							$employee=$query->fetch_assoc();

							error_reporting(0);

							?>

			<div class="view-pop-up" >
				<div class="show-details">
					<?php do { ?>
					<div class="profile">
						<div class="image-border">
							<img class="img-emp"src=<?php echo $employee['Employee_Image'];?>>
						</div>
						<div class="emp-id">
							<label>ID: <?php echo $employee['Employees_ID']; ?></label>
						</div>
						<div class="emp-name">
							<label>Name: <?php echo $employee['First_Name']; ?> <?php echo $employee['Last_Name']; ?> </label>
						</div>
						<div class="emp-position">
							<label>Position: <?php echo $employee['Position']; ?> </label>
						</div>
						<div class="emp-position">
							<label>Department: <?php echo $employee['Job_Department']; ?> </label>
						</div>
					</div>
					<div class="details-emp">
						 <div class="emp-logo">
						 	<label>Employee Details</label>
						 	<a href="employees.php"><img id="emp-edit-close" src="../../icons/close.svg"></a>
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
						 		<label><?php echo $employee['First_Name']; ?></label>
						 	</div>
						 	<div class="name-info">
						 		<label><?php echo $employee['Middle_Name']; ?></label>
						 	</div>
						 	<div class="name-info">
						 		<label><?php echo $employee['Last_Name']; ?></label>
						 	</div>
						 	<div class="name-info">
						 		<label><?php echo $employee['Suffix']; ?></label>
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
						 		<label><?php echo $employee['Province']; ?></label>
						 	</div>
						 	<div class="full-info">
						 		<label><?php echo $employee['Zip_Code']; ?></label>
						 	</div>
						 	<div class="full-info">
						 		<label><?php echo $employee['City']; ?></label>
						 	</div>
						 	<div class="full-info">
						 		<label><?php echo $employee['Street']; ?></label>
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
						 		<label ><?php echo $employee['Email']; ?></label>
						 	</div>
						 	<div class="input-info">
						 		<label><?php echo $employee['Contact_Number']; ?></label>
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
						 		<label><?php echo $employee['Gender']; ?></label>
						 	</div>
						 	<div class="input-info2">
						 		<label><?php echo $employee['Status']; ?></label>
						 	</div>
						 	<div class="input-info2">
						 		<label>
						 			<?php echo date('M-d-Y', strtotime($employee['Birth_Date'])) ;?>
						 		</label>
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
						 		<label><?php echo $employee['Job_Department']; ?></label>
						 	</div>
						 	<div class="input-job">
						 		<label><?php echo $employee['Position']; ?></label>
						 	</div>
						 	<div class="input-job">
						 		<label><?php echo $employee['Hourly_Salary']*8*30; ?></label>
						 	</div>
						 </div>
						 <div class="div-edit">
						 	<a href="edit.php?view=<?php echo $employee['Employees_ID'];?> " class="edit-button" >EDIT<img src="../../icons/pencil.svg"></a>
						 </div>
					</div>

					<?php }while($employee=$query->fetch_assoc());  ?>
				</div>
			</div>
		</div>
		
	</div>
</body>
</html>