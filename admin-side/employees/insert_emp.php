<?php 
include "../../connection/connection.php";
date_default_timezone_set('Asia/Manila');
$hire = date('Y-m-d');

if(isset($_POST['submit'])){

// EMPLOYEE INFORMATION


$id_department = trim($_POST['department']);
$id_position = trim($_POST['position']);
$id_schedule = $_POST['schedule'];
$emp_type = $_POST['Emp_Type'];



$select_position = "SELECT * FROM tbl_position where Position_ID = '$id_position'";
$query_position= mysqli_query($conn,$select_position);
$result_position=$query_position->fetch_assoc();
$daily_rate = $result_position['Daily_Salary'];


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
						$fileDestination = 'emp-image/'.$fileNameNew;
						move_uploaded_file($fileTmp, $fileDestination);
					}
				}
			}ELSE{
				$fileNameNew = "user1.png";
			}

			$employees_information = "INSERT INTO `tbl_employees_information`(`Employee_Image`, `Hire_Date`, `Daily_Rate`, `Schedule_ID`, `Position_ID`, `Department_ID`,`Employee_Types`) VALUES ('$fileNameNew','$hire','$daily_rate','$id_schedule','$id_position','$id_department','$emp_type')";
			$conn->query($employees_information) or die ($conn->error);
			$id = mysqli_insert_id($conn);

// PERSONAL INFO

$firstname = trim($_POST['firstname']);
$lastname = trim($_POST['lastname']);
$middlename = trim($_POST['middlename']);
$suffix = trim($_POST['suffix']);


$province = trim($_POST['province']);
$zipcode = trim($_POST['zipcode']);
$city = trim($_POST['city']);
$street = trim($_POST['street']);

$email = trim($_POST['email']);
$number = trim($_POST['number']);
$bday = date('Y-m-d', strtotime($_POST['birthday']));

$status = $_POST['status'];
$gender = $_POST['gender'];

			$personal_information = "INSERT INTO `tbl_personal_information`(`Employees_ID`,`Last_Name`,`First_Name`,`Middle_Name`, `Suffix`,`Birth_Date`,`Email`,`Contact_Number`,`Zip_Code`,`Province`,`City`, `Street`,`Status`,`Gender`) VALUES ('$id','$lastname','$firstname','$middlename','$suffix','$bday','$email','$number','$zipcode','$province','$city','$street','$status','$gender')";
			$conn->query($personal_information) or die ($conn->error);


// TAX 

$select_tax = "SELECT * FROM `tbl_tax_list`";
$query_tax = mysqli_query($conn,$select_tax);
$result_tax = mysqli_fetch_assoc($query_tax);


if($result_tax == TRUE){


do{
	$tax = $result_tax['Tax_ID'];
	$insert_tax = "INSERT INTO `tbl_tax_emp`(`Employees_ID`,`Tax_ID`,`Tax_Status`) VALUES ($id,'$tax','Disable')";
	$conn->query($insert_tax) or die ($conn->error);

}while($result_tax=$query_tax->fetch_assoc());


}ELSE{
	
}

}


header("Location: employee_list_layout.php");














?>