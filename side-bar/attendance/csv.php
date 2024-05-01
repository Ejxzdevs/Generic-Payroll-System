<?php 
include "../../connection/connection.php";


$select_all_csv = "SELECT * FROM tbl_upload_csv ";
$query_all_csv = mysqli_query($conn,$select_all_csv);
$fetch_all_csv = mysqli_fetch_assoc($query_all_csv);



error_reporting(0);
?>

<!DOCTYPE html>
<html>
<head>
	<style type="text/css">
		.attendance-nav-bar ul li:nth-child(1){
	border-left: solid 2PX black;

}
	</style>
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
							<li><a style="color:#66ff66;" href="csv_layout.php" class="Attendance1">CSV FILE</a><img id="csv" src="../../icons/csv.png"></li>
							<li><a href="time_record_layout.php">Records</a><img src="../../icons/worksheet.png"> </li>
						</ul>
					</div>
					<div class="schedule">
						<div class="schedule-header">
							<div class="sched-header-left" id="csv-div" >
								<form method="post"	enctype="multipart/form-data" action="../../connection/upload-time-entry.php">
								<label for="upload-entry">IMPORT <img src="../../icons/upload-btn.png" id="upload-btn" ></label>
								<div>
								<input type="file" name="file_upload" id="upload-entry" required hidden>
								</div>
								<div>
								<input id="upload" type="submit" name="upload-time-entry" value="Upload">
								</div>
								
							</form>
							</div>
							<div class="sched-header-right">
								<!-- <form method="POST" action="schedule_layout.php">			
									
								</form> -->
							</div>		
						</div>
						
						<div class="sched-table" >
								<table class="sched-info">
									<thead>
										<tr>
											<th style="width: 600px;">ID</th>
											<th style="width: 600px;">Date Interval</th>
											<th style="width: 600px;">Date Uploaded</th>				
										
											<th style="width: 600px;">Action</th>
											<!-- <th>Date</th> -->
										</tr>
									</thead>
									<?php do{ if(isset($fetch_all_csv['Csv_ID'])){?>
									<tbody>
										<tr>
											<td><?php echo $fetch_all_csv['Csv_ID']; ?></td>
											<td><?php echo $fetch_all_csv['Start_Date'] . " - " .  $fetch_all_csv['End_Date']; ?></td>
										
											<td><?php echo $fetch_all_csv['Date_Uploaded']; ?></td>
											<td><a href="csv_view_layout.php?id=<?php echo $fetch_all_csv['Csv_ID']; ?>"><img id="view" src="../../icons/view-action.svg"> </a></td>

								
										</tr>
									</tbody>
									<?php } }while($fetch_all_csv=$query_all_csv->fetch_assoc()); ?>
								</table>
							</div>
						
					</div>
				</div>


		</div>

	
</body>
	<script type="text/javascript" src="schedule.js"></script>
</html>

