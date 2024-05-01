<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="configure_company.css">
	<title></title>
</head>
<body>
	<div class="container">
		<div class="box-container">
			<form method="POST" action="Company_Register.php" enctype="multipart/form-data">
				<div class="header-configure">
					<label>Company Information</label>
				</div>
				<div class="upload-logo-container">
					<label class="logo-label">SYSTEM LOGO</label>
					<img src="../icons/default.jpg" class="default-img">
					<label id="btn-upload" for ="img_logo">				
						<img id="icon-upload" src="../icons/icon-upload.png"><input type="file" name="file" id="img_logo" hidden>
						CHOOSE IMAGE
					</label>
				</div>
				<div class="register-body">
				<div class="register-column">
					<label>System Name</label>
					<input style="margin-left:.9em;" type="text" name="system_name" placeholder="Enter System Name: ">
				</div>
				<div class="register-column">
					<label>Company Name</label>
					<input style="right: .5em;" type="text" name="company_name" placeholder="Enter Company Name: ">
				</div>
				<div class="register-column">
					<label style="margin-left:4em;">State</label>
					<input style="margin-left:3.2em" type="text" name="state" placeholder="Enter State: ">
				</div>
				<div class="register-column">
					<label style="margin-left:4em;" >City</label>
					<input style="margin-left:3.9em ;" type="text" name="city" placeholder="Enter City: ">
				</div>
				<div class="register-column">
					<label style="margin-left:3em;">Zipcode</label>
					<input style="margin-left:2.5em;" type="text" name="zipcode" placeholder="Enter Zipcode: ">
				</div>
				<div class="register-column">
					<label style="margin-left:4em;" >Street</label>
					<input style="margin-left:2.9em;" type="text" name="street" placeholder="Enter Street: ">
				</div>
				<div class="register-column">
					<label style="margin-left:1em;">Building Number</label>
					<input style="margin-left:.4em;" type="text" name="building_number" placeholder="Enter Building number: ">
				</div>
				
				<div class="register-column">
				<label style="margin-left:1em;">Set Payroll for Regular</label>
				<select name="regular_payroll">
					<option value="1days">Daily</option>
					<option value="5days">Weekly</option>
					<option value="12days">Bi-Weekly</option>
					<option value="13days">Semi-Monthly</option>
					<option value="28days">Monthly</option>
				</select>
				</div>
				<div class="register-column">
				<label style="margin-left:1em;">Set Payroll for Casual</label>
				<select style="margin-left:.6em;" name="casual_payroll">
					<option value="1days">Daily</option>
					<option value="5days">Weekly</option>
					<option value="12days">Bi-Weekly</option>
					<option value="13days">Semi-Monthly</option>
					<option value="28days">Monthly</option>
				</select>
				</div>
				<div class="btn-company-register">
					<input class="btn-submit" type="submit" name="submit">
				</div>
			</form>
		</div>
	</div>

</body>
<script type="text/javascript">
const img_file = document.getElementById("img_logo");
const imageEmp = document.querySelector(".default-img");

	img_file.addEventListener("change", function(){


		const file = this.files[0];

		if(file) {
			const reader = new FileReader();

			reader.addEventListener("load", function(){
				console.log(this);

				imageEmp.setAttribute("src", this.result);

			});

			reader.readAsDataURL(file);

		}


	});
</script>
</html>