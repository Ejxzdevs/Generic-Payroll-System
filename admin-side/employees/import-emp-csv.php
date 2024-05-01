<?php 
	include"../../connection/connection.php";

	date_default_timezone_set('Asia/Manila');
	$date = date('Y-m-d');
	if(isset($_POST['import-submit']))
	{
	
	$filename = $_FILES['file_upload']['tmp_name'];
	if($_FILES['file_upload']['size'] > 0)
	{

		$file = fopen($filename, "r");

		$row = 2;
		while(($getData = fgetcsv($file, 10000, ",")) !== FALSE) {

			if($row == 2) {

				$row++;
				continue;
			}
			echo $id = $getData[12];

			$test = "INSERT INTO `tbl_employees_information`(`Employees_ID`,`Hire_Date`,`Employee_Image`) VALUES ('$id','$date','user1.png')";
			$conn->query($test) or die ($conn->error);


			echo $firstname = $getData[0];
			echo $lastname = $getData[1];
			echo $middlename = $getData[2];
			echo $email = $getData[3];
			echo $contact = $getData[4];
			echo $zipcode = $getData[5];
			echo $province = $getData[6];
			echo $city = $getData[7];
			echo $street = $getData[8];
			echo $status = $getData[9];
			echo $gender = $getData[10];
			echo $bday = $getData[11];


			$insert_personal_info = " INSERT INTO `tbl_personal_information`(`Employees_ID`,`Last_Name`,`First_Name`,`Middle_Name`,`Birth_Date`,`Email`,`Contact_Number`,`Zip_Code`,`Province`,`City`,`Street`,`Status`,`Gender`) VALUES ($id,'$lastname','$firstname','$middlename','$bday','$email','$contact','$zipcode','$province','$city','$street','$status','$gender')";
			$conn->query($insert_personal_info) or die ($conn->error);
		
			



			
		}

	}else
	{
		echo " nothing";
	}

	// date_default_timezone_set('Asia/Manila');

	// $uploaded = "Uploaded";
	// $time = date("m-d-Y");
	// $current_time = $time;

	// $test = "INSERT INTO `tbl_csv`(`Status`) VALUES ('$uploaded')";
	// 		$conn->query($test) or die ($conn->error);

	echo header("Location: employee_list_layout.php");

	

	


	}	
?>