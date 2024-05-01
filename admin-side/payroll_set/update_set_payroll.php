<?php 

include "../../connection/connection.php";



if(isset($_POST['submit'])){


	$id = $_POST['id'];
	$set = $_POST['set'];


	$update = mysqli_query($conn,"UPDATE `tbl_payroll_set_date` SET `Payroll_Date_Interval`='$set' WHERE Payroll_Set_date_ID = $id ");

	header("Location: payroll_layout.php");
}





?>