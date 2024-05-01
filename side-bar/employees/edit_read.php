<?php
	include "../../connection/connection.php";

							$sql = "SELECT * FROM tbl_employees_information inner join  tbl_personal_information ON tbl_employees_information.Employees_ID = tbl_personal_information.Employees_ID";
							$query = mysqli_query($conn,$sql);
							$employee=$query->fetch_assoc();
	




							$id = $_GET['view']; 

							$sql = "SELECT * FROM tbl_employees_information inner join tbl_personal_information ON tbl_employees_information.Employees_ID = tbl_personal_information.Employees_ID WHERE tbl_employees_information.Employees_ID = '$id' ";
							$view = mysqli_query($conn,$sql);
							$res_view=$view->fetch_assoc();

								$department = $res_view['Job_Department'];

								$sql = "SELECT * FROM tbl_department WHERE Department_Name != '$department' ";
								$department = mysqli_query($conn,$sql);
								$result=$department->fetch_assoc();

								$position = $res_view['Position'];

								$sql = "SELECT * FROM tbl_position WHERE Position_Name != '$position' ";
								$position= mysqli_query($conn,$sql);
								$pos=$position->fetch_assoc();

								$status = $res_view['Status'];

								$sql = "SELECT * FROM tbl_marital_status WHERE Marital_Types != '$status' ";
								$marital= mysqli_query($conn,$sql);
								$res_marital=$marital->fetch_assoc();

								$gender = $res_view['Gender'];

								$sql = "SELECT * FROM tbl_gender WHERE Gender_Types != '$gender'";
								$gender= mysqli_query($conn,$sql);
								$res_gender=$gender->fetch_assoc();							

							error_reporting(0);

							?>
