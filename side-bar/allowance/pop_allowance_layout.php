<?php include 'read.php'; ?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="../employees/employee_layout.css">
	<link rel="stylesheet" type="text/css" href="../../admin-side/admin-layout/top_side_bar.css">
	<link rel="stylesheet" type="text/css" href="../../admin-side/admin-layout/top_nav.css">
	<script type="text/javascript" src="../../admin-side/admin-layout//top_nav.js"></script>
	<title>Employee List</title></head>
<body>
	
	<div class="container">
		<div class="side-bar" id="sidebar">
			<div class="top-side-bar">
				<?php include"../../admin-side/admin-layout/top_side_bar.php" ?>
			</div>
			<div class="lower-side-bar">
				<?php include "../processor-side-bar/side_bar_processor.php"; ?>
			</div>
		</div>
		<div class="top-bot">
			<div class="top-nav">
				<?php include "../../admin-side/admin-layout/top_nav.php"; ?>
			</div>
			<div class="content">
				<?php include "pop-allowance.php"; ?>
			</div>
		
		</div>
	</div>
</body>
	
</html>