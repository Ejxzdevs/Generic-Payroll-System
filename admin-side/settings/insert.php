<?php 

include "../../connection/connection.php";

if(isset($_POST['uploads'])){

			$title = $_POST['title'];
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
						$fileDestination = 'Logo/'.$fileNameNew;
						move_uploaded_file($fileTmp, $fileDestination);

					}
				}

			}

			if($file != NULL){
				

			$insert = "INSERT INTO `tbl_logo`(`Image`,`Title`)VALUES('$fileDestination','$title') ";
			$query = mysqli_query($conn,$insert);
			
			}else{
				$insert = "INSERT INTO `tbl_logo`(`Title`)VALUES('$title') ";
			$query = mysqli_query($conn,$insert);

			}


}
header("Location: settings_layout.php");

?>