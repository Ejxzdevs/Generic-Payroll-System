<?php
session_start();
include "../../connection/connection.php";

if(isset($_POST['update'])){


$id = $_POST['id'];
$firstname =$_POST['firstname'];
$lastname =$_POST['lastname'] ;
$middlename =$_POST['middlename'] ;
$email =$_POST['email'] ;
$number =$_POST['number'];
$province =$_POST['province'];
$zip =$_POST['zip'] ;
$city =$_POST['city'] ;
$street =$_POST['street'] ;
$birthdate = date('Y-m-d', strtotime($_POST['birthdate']));
$department =$_POST['department'] ;
$position =$_POST['position'] ;
$gender = $_POST['gender'];
$status = $_POST['status'];
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

$sql = " UPDATE `tbl_employees_information` SET Job_Department = '$department', Position = '$position', Employee_Image = '$fileDestination' WHERE Employees_ID = '$id'" ;
$sql1 = " UPDATE `tbl_personal_information` SET First_Name = '$firstname',Last_Name = '$lastname',Middle_Name = '$middlename',Email = '$email',Contact_Number = '$number',Province = '$province', Zip_Code = '$zip', City = '$city', Street = '$street', Birth_date = '$birthdate',Gender = '$gender', Status = '$status' WHERE Employees_ID = '$id'" ;
	
	$conn->query($sql) or die ($conn->error);
	$conn->query($sql1) or die ($conn->error);}
					else
					{
						echo "<script> Swal.fire({
  							icon: 'warning',
  							position: 'middle',
  							title: 'File is too big',
  							width: 400,
  							text: 'Please insert valid Image',
  							showConfirmButton: true,
							});</script> ";
					}
				}
				else
				{
					echo "an error";
				}
			}
			else
			{
			echo "<script> Swal.fire({
  							icon: 'warning',
  							position: 'middle',
  							title: 'warning',
  							width: 400,
  							text: 'Please insert valid Image',
  							showConfirmButton: true,
			});</script> ";
			}
	

echo header("location: view-employees.php?view=".$id);
}


?>