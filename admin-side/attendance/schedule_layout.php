<?php include "read.php"; ?>
<?php include '../../sweetalert/swal.php'; ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="../settings/settings_layout.css">
	<link rel="stylesheet" type="text/css" href="../admin-layout/top_side_bar.css">
	<link rel="stylesheet" type="text/css" href="../admin-layout/top_nav.css">
	

	<title>Time Entry</title></head>
<body>
	
	<div class="container">
		<div class="side-bar" id="sidebar">
			<div class="top-side-bar">
				<?php include"../admin-layout/top_side_bar.php" ?>
			</div>
			<div class="lower-side-bar">
		<?php include "../admin-layout/side_bar_menu.php"; ?>
			</div>
		</div>
		<div class="top-bot">
			<div class="top-nav">
				<?php include "../admin-layout/top_nav.php"; ?>
			</div>
			<div class="content">
				<?php include "schedule.php"; ?>
			</div>
		
		</div>
	</div>
</body>
		<script type="text/javascript" src="../admin-layout/side_bar.js"></script>
</html>