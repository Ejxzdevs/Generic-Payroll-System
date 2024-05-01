<?php 

			include "../../connection/connection.php";
			$sql1 = "SELECT * FROM tbl_company_information Order by ID DESC ";
			$query1 = mysqli_query($conn,$sql1);
			$res1 = mysqli_fetch_assoc($query1);


?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="style.css">
	<title>Settings</title>
</head>
<body>
	<div class="main-container">	
			<div class="setting-option">
					<a href="">Company Info</a>
					<a href="">Dashboard</a>
			</div>
			<form action="update.php" method="post" enctype="multipart/form-data">
			<div class="header-logo">
				<div class="img-container">
				<label>LOGO</label>
					<img class="default-img" src="../../user-entry/Company_Logo/<?php echo $res1['LOGO'];?>">

					<input type="file" name="file" id="img_logo">	
				</div>
			</div>
			<div class="system_name_container">
			<label>System Name</label>
			<input type="text" name="system_name" placeholder="Text" value="<?php echo $res1['System_Name']; ?>">
			</div>
			<input type="hidden" name="id" placeholder="Text" value="<?php echo $res1['ID']; ?>">
			<div class="system_name_container">
			<label>Company Name</label>
			<input type="text" name="company_name" placeholder="Text" value="<?php echo $res1['Company_Name']; ?>">
			</div>
			<div class="system_name_container">
			<label>State</label>
			<input type="text" name="state" placeholder="Text" value="<?php echo $res1['State']; ?>">
		</div>
		<div class="system_name_container">
			<label>City</label>
			<input type="text" name="city" placeholder="Text" value="<?php echo $res1['City']; ?>">
		</div>
			<div class="system_name_container">
			<label>Zipcode</label>
			<input type="text" name="zipcode" placeholder="Text" value="<?php echo $res1['Zipcode']; ?>">
				</div>
				<div class="system_name_container">
			<label>Street</label>
			<input type="text" name="street" placeholder="Text" value="<?php echo $res1['Street']; ?>">
			</div>
			<div class="system_name_container">
			<label>Building No.</label>
			<input type="text" name="building_number" placeholder="Text" value="<?php echo $res1['Building_Number']; ?>">
				</div>
				<div class="system_name_container">
		
			<input id="btn-save" type="submit" name="uploads" value="SAVE">
		</div>
	
		</form>


</div>
</body>
	<script src="setting.js" ></script>
</html>