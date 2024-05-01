<!DOCTYPE html>
<html>
<head>
	<style type="text/css">

	.attendance-nav-bar ul li:nth-child(1){
	border-left: solid 2PX black;
	}
	


	</style>
	<style type="text/css"></style>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="attendance.css">
	<script src="../../jquery/jquery-3.6.3.js"></script>

	<title>Payroll Managament System</title>
</head>
<body>
	<div class="background">
			
		<div class="div-background">
			
			<div class="home-content">
				<div class="box-attendance">
					<div class="attendance-nav-bar">
						<ul  >
							<li ><a href="schedule_layout.php"  class="schedule1" >Attendance</a><img src="../../icons/workplace.png"> </li>
					
							<li><a href="csv_layout.php" class="Attendance1">CSV FILE</a><img id="csv" src="../../icons/csv.png"></li>
							<li><a href="time_record_layout.php" style="color:#66ff66;">Records</a><img src="../../icons/worksheet.png"> </li>
						</ul>
					</div>
					<div class="schedule">
						<div class="schedule-header">
							<div class="sched-header-left" >
								
							</div>
							<div class="sched-header-right">
								<form method="POST" action="time_record_layout.php">			
									<div class="containter-search">
										<div class="containter-input-search">
										<img src="../../icons/search.svg" id="img_search">
										<input type="text" name="name" class="input" placeholder="Type text:">
										<input type="submit" name="submit"  value="Search" class="search">
										</div>
									</div>
								</form>
							</div>		
						</div>
						
						<div class="sched-table">
								<table class="sched-info">
									<thead >
										<tr>
											<th style="width: 200px;" >ID</th>
											<th style="width: 600px;" >Name</th>		
											<th style="width: 300px;" >Action</th>
											<!-- <th>Date</th> -->
										</tr>
									</thead>
									<tbody>
										<?php do {if(isset($entries['Employees_ID'])){ ?>
										<tr>
											<td> <?php echo $entries['Employees_ID']; ?>
											
											</td>
											<td><?php echo $entries['First_Name']; ?> <?php echo $entries['Last_Name']; ?></td>
										
										<td><a href="time_record_view_layout.php?id=<?php echo $entries['Employees_ID']; ?>"><img id="view" src="../../icons/view-action.svg" ></a></td>

									<?php }}while($entries=$query->fetch_assoc());?>
										</tr>
									</tbody>
								</table>
							</div>
						
					</div>
				</div>


		</div>
		<!-- script -->
	
	

		</div>
	</div>

</body>

</html>