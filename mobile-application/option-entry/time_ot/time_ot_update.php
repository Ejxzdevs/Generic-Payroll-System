<?php 
session_start();
include "../../../connection/connection.php";

if (isset($_POST['submit'])){

	$reason = $_POST['reason-ot'];
	$id = $_SESSION['emp_id'];
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
						$fileDestination = '../Image-entry/'.$fileNameNew;
						move_uploaded_file($fileTmp, $fileDestination);
					}
				}

			}

	date_default_timezone_set('Asia/Manila');
	echo $date = date("Y-m-d");
	// echo "<br>";
	// // echo $ot_hrs = $_POST['ot'];
	// echo "<br>";

	// $sql = "SELECT Employees_ID,@sid:= Schedule_ID as Schedule_ID,
	// (SELECT Schedule_Out FROM tbl_types_schedule WHERE Schedule_ID = @sid) 
	// as Schedule_Out FROM tbl_employees_information WHERE Employees_ID = $id ";
	// $query = mysqli_query($conn,$sql);
	// $time_entries=$query->fetch_assoc();
	

	// echo $time_entries['Schedule_Out'];
	// echo "<br>";

	// echo $con_str = strtotime($time_entries['Schedule_Out']) ;
	// echo "<br>";
	// echo $add_ot = ($con_str + (60*60)*4);
	// echo "<br>";
	// echo $time_end = date("H:i:s",$add_ot);
	// echo "<br>";
	// echo  date("g:i:s a",$add_ot);

	
	$update_time_entry = mysqli_query($conn,"UPDATE `tbl_time_entries` SET Time_End = '$time_end', Image_OT = '$fileNameNew' , OT_Message = '$reason',OT_Status = 'Pending' where Date_Attendance = '$date' AND Employees_ID = '$id' ");
			

	
	header("location: ../entry_option.php");
}









?>