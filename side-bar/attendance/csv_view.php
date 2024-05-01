<?php 
include "../../connection/connection.php";


$select_all_csv = "SELECT * FROM tbl_upload_csv ";
$query_all_csv = mysqli_query($conn,$select_all_csv);
$fetch_all_csv = mysqli_fetch_assoc($query_all_csv);




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
								<form method="post"	enctype="multipart/form-data" action="../../connection/csv-upload.php">
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
									<?php do{ ?>
									<tbody>
										<tr>
											<td><?php echo $fetch_all_csv['Csv_ID']; ?></td>
											<td><?php echo $fetch_all_csv['Start_Date'] . " - " .  $fetch_all_csv['End_Date']; ?></td>
										
											<td><?php echo $fetch_all_csv['Date_Uploaded']; ?></td>
											<td><a href="csv_view_layout.php?id=<?php echo $fetch_all_csv['Csv_ID']; ?>"><img id="view" src="../../icons/view-action.svg"> </a></td>

								
										</tr>
									</tbody>
									<?php }while($fetch_all_csv=$query_all_csv->fetch_assoc()); ?>
								</table>
							</div>
						
					</div>
				</div>


		</div>

		<div class="container-csv-info">
			<div class="box-csv-info">
				<div class="header-info">
					<label>Attendance Uploaded</label>
					<a href="csv_layout.php"><img id="close_img" src="../../icons/close.svg"></a>
				</div>
				<div class="content-csv">
					<div class="div-scroll">
						<table class="cvs-upload-info">
									<thead>
										<tr>
											<th style="width: 400px;">ID</th>
											<th style="width: 600px;">Name</th>
											<th style="width: 400px;">Hours Worked</th>
											<th style="width: 600px;">Date</th>
										</tr>
									</thead>
							<?php include 'csv-entry.php'; ?>
							<?php do{ ?>
									<tbody>
										<tr>
											<td><?php echo $fetch_all_entry['Employees_ID']; ?></td>
											<td><?php echo $fetch_all_entry['First_Name'] . " " . $fetch_all_entry['Last_Name']; ?></td>
										
											<td><?php if($fetch_all_entry['Hours_Worked']%60 == 0){
	if($fetch_all_entry['Hours_Worked'] == 0){
		ECHO $total_hours = '0';
	}else{
		ECHO $total_hours = intval($fetch_all_entry['Hours_Worked']/60) . 'hrs';
	}
}elseif($fetch_all_entry['Hours_Worked']%60 >= 1){
	ECHO $total_hours = intval($fetch_all_entry['Hours_Worked']/60) . 'hrs ' . $fetch_all_entry['Hours_Worked']%60 . 'mins';
} ?></td>
											<td><?php echo date('M-d-Y',strtotime($fetch_all_entry['Date_Attendance'])) ; ?></td>

								
										</tr>
									</tbody>
								<?php  }while($fetch_all_entry=$query_all_entry->fetch_assoc());?>
									
								</table>
					</div>
				</div>
			</div>
		</div>
	
</body>
	<script type="text/javascript" src="schedule.js"></script>
</html>

