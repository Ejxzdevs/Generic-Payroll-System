<?php 

include "../../connection/connection.php";
date_default_timezone_set('Asia/Manila');

if(isset($_POST['uploads'])){
		
			$system_name = $_POST['system_name'];
			$company_name = $_POST['company_name'];
			$id = $_POST['id'];
			$state = $_POST['state'];
			$city = $_POST['city'];
			$zipcode = $_POST['zipcode'];
			$street = $_POST['street'];
			$building_number = $_POST['building_number'];
			$file = $_FILES['file'];
			$fileName = $_FILES['file']['name'];
			$fileTmp = $_FILES['file']['tmp_name'];
			$fileSize = $_FILES['file']['size'];
			$fileError = $_FILES['file']['error'];
			$fileType = $_FILES['file']['type'];

			$fileExt = explode('.', $fileName);
			$fileActualExt = strtolower(end($fileExt));

			$allowed = array('jpg','jpeg','png', 'svg');

			if (in_array($fileActualExt, $allowed)) {
				if ($fileError === 0) {
					if ($fileSize < 1000000) {
						$fileNameNew = uniqid('', true).".".$fileActualExt;
						echo $fileDestination = '../../user-entry/Company_Logo/'.$fileNameNew;
						move_uploaded_file($fileTmp, $fileDestination);

					}
				}

			}
			
				

			$insert = "UPDATE `tbl_company_information` SET `LOGO`='$fileNameNew',`System_Name`='$system_name',`Company_Name`='$company_name',`State`='$state',`City`='$city',`Zipcode`='$zipcode',`Street`='$street',`Building_Number`='$building_number' WHERE ID = $id ";
			$query = mysqli_query($conn,$insert);
		
		

			
				

	


 

}
	header("Location: settings_layout.php");
?>