<?php 
include "../connection/connection.php";
date_default_timezone_set('Asia/Manila');
$date = date("Y-m-d");

if(isset($_POST['submit'])){

	$system_name = $_POST['system_name'];
	$company_name = $_POST['company_name'];
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

	$fileExt = explode('.',$fileName);
			$fileActualExt = strtolower(end($fileExt));

			$allowed = array('jpg','jpeg','png','svg');

			if (in_array($fileActualExt, $allowed)){
				if ($fileError === 0) {
					if ($fileSize < 1000000) {
						$fileNameNew = uniqid('', true).".".$fileActualExt;
						$fileDestination ='Company_Logo/'.$fileNameNew;
						move_uploaded_file($fileTmp, $fileDestination);

					}
				}

			}

	$insert_company_info = mysqli_query($conn,"INSERT INTO `tbl_company_information`(`LOGO`,`System_Name`,`Company_Name`,`State`,`City`,`Zipcode`,`Street`,`Building_Number`) VALUES ('$fileNameNew','	$system_name','$company_name','$state','$city','$zipcode','$street','$building_number')");

// last id

// regular
	$regular = $_POST['regular_payroll'];

	$set_payroll_date = mysqli_query($conn,"INSERT INTO `tbl_payroll_set_date`(`Type_Employees`, `Payroll_Date_Interval`) VALUES ('Regular','$regular')");
	
	$start_date_payroll_regular = $date;

	if($regular == '1days'){
		$end_date_payroll_regular = $start_date_payroll_regular;
	}else{
		$end_date_payroll_regular = date("Y-m-d",strtotime($start_date_payroll_regular."+{$regular}"));
	}


	$payroll_date_regular = date("Y-m-d",strtotime($end_date_payroll_regular."+1days"));
	$status = "Pre_Pending";
	$id_regular = mysqli_insert_id($conn);
	$set_payroll_date = mysqli_query($conn,"INSERT INTO `tbl_payroll_list`(`Payroll_Start`,`Payroll_End`, `Payroll_Status`, `Payroll_Emp_Type`,`Payroll_Set_date_ID`,`Payroll_Date`) VALUES ('$start_date_payroll_regular','$end_date_payroll_regular','$status','Regular','$id_regular','$payroll_date_regular')");

// casual
	$casual = $_POST['casual_payroll'];
	$set_payroll_date = mysqli_query($conn,"INSERT INTO `tbl_payroll_set_date`(`Type_Employees`, `Payroll_Date_Interval`) VALUES ('Casual','$casual')");
	$id_casual = mysqli_insert_id($conn);

	$start_date_payroll_casual = $date;

	if($casual == '1days'){
		$end_date_payroll_casual = $start_date_payroll_casual;
	
	}else{
		$end_date_payroll_casual = date("Y-m-d",strtotime($start_date_payroll_casual."+{$casual}"));
	}

	$payroll_date_casual = date("Y-m-d",strtotime($end_date_payroll_casual."+1days"));
	$status = "Pre_Pending";

	$set_payroll_date = mysqli_query($conn,"INSERT INTO `tbl_payroll_list`(`Payroll_Start`,`Payroll_End`,`Payroll_Status`,`Payroll_Emp_Type`,`Payroll_Set_date_ID`,`Payroll_Date`) VALUES ('$start_date_payroll_casual','$end_date_payroll_casual','$status','Casual','$id_casual','$payroll_date_casual')");

}


$select_set_date_regular = "SELECT * FROM `tbl_payroll_set_date` WHERE Type_Employees = 'Regular'";
$mysqli_query_regular = mysqli_query($conn,$select_set_date_regular);
$fetch_set_date_regular = mysqli_fetch_assoc($mysqli_query_regular);

if($fetch_set_date_regular['Payroll_Date_Interval'] == '5days'){
	$update_interval = mysqli_query($conn,"UPDATE `tbl_payroll_set_date` SET `Payroll_Date_Interval`='6days' WHERE Type_Employees = 'Regular'");
}elseif($fetch_set_date_regular['Payroll_Date_Interval'] == '12days'){
	$update_interval = mysqli_query($conn,"UPDATE `tbl_payroll_set_date` SET `Payroll_Date_Interval`='13days' WHERE Type_Employees = 'Regular'");
}elseif($fetch_set_date_regular['Payroll_Date_Interval'] == '13days'){
	$update_interval = mysqli_query($conn,"UPDATE `tbl_payroll_set_date` SET `Payroll_Date_Interval`='14days' WHERE Type_Employees = 'Regular'");
}elseif($fetch_set_date_regular['Payroll_Date_Interval'] == '28days'){
	$update_interval = mysqli_query($conn,"UPDATE `tbl_payroll_set_date` SET `Payroll_Date_Interval`='29days' WHERE Type_Employees = 'Regular'");
}

$select_set_date_casual = "SELECT * FROM `tbl_payroll_set_date` WHERE Type_Employees = 'Casual'";
$mysqli_query_casual = mysqli_query($conn,$select_set_date_casual);
$fetch_set_date_casual = mysqli_fetch_assoc($mysqli_query_casual);

if($fetch_set_date_casual['Payroll_Date_Interval'] == '5days'){
	$update_interval = mysqli_query($conn,"UPDATE `tbl_payroll_set_date` SET `Payroll_Date_Interval`='6days' WHERE Type_Employees = 'Casual'");
}elseif($fetch_set_date_casual['Payroll_Date_Interval'] == '12days'){
	$update_interval = mysqli_query($conn,"UPDATE `tbl_payroll_set_date` SET `Payroll_Date_Interval`='13days' WHERE Type_Employees = 'Casual'");
}elseif($fetch_set_date_casual['Payroll_Date_Interval'] == '13days'){
	$update_interval = mysqli_query($conn,"UPDATE `tbl_payroll_set_date` SET `Payroll_Date_Interval`='14days' WHERE Type_Employees = 'Casual'");
}elseif($fetch_set_date_casual['Payroll_Date_Interval'] == '28days'){
	$update_interval = mysqli_query($conn,"UPDATE `tbl_payroll_set_date` SET `Payroll_Date_Interval`='29days' WHERE Type_Employees = 'Casual'");
}





header("Location: register.php");



?>