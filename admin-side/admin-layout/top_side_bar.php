
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="top_side_bar.css">
	<title></title>
</head>
<?php 

include "../../connection/connection.php";
$select_logo = "SELECT * FROM tbl_company_information order by ID DESC ";
$query_logo = mysqli_query($conn,$select_logo);
$res_logo = mysqli_fetch_assoc($query_logo);


?>
<body>
	<!-- ../settings/Logo/64416f89117675.39280218.png -->
	<div class="container-image">
		<div class="box-image">
			<img class="image-logoo" src="../../user-entry/Company_Logo/<?php echo $res_logo['LOGO'];?>">
		</div>
	</div>
</body>

</html>