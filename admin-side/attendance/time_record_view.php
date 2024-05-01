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
							<li ><a href="schedule_layout.php"  class="schedule1" >INDOOR</a><img src="../../icons/workplace.png"> </li>
							<li><a href="driver_layout.php">OUTDOOR</a><img src="../../icons/driver.png"> </li>
							<li><a href="attendance.php" class="Attendance1">CSV FILE</a><img id="csv" src="../../icons/csv.png"></li>
							<li><a href="time_record_layout.php" style="color:#66ff66;">Records</a><img src="../../icons/worksheet.png"> </li>
						</ul>
					</div>
					<div class="schedule">
						<div class="schedule-header">
							<div class="sched-header-left" >
								<div class="frame-date">
								<label class="date-display"><?php $date = date('M. d Y l'); echo $date  ?><img id="calendar" src="../../icons/calendar.svg"></label>
								</div>
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
										
										<td><a href="javascript: record_view(<?php echo $entries['Employees_ID']; ?>);">view </a> </td>

									<?php }}while($entries=$query->fetch_assoc());?>
										</tr>
									</tbody>
								</table>
							</div>
							<div class="sched-option" >
								<div class="b">
									
								</div>
								<div class="time-option">
									
								</div>
							</div>
					</div>
				</div>


		</div>
		<!-- script -->
		
		<div class="container_record_view">

			<div class="box_record_view">
				<div class="head">
					<label>Time Entry Record</label>
					<a href="time_record_layout.php"> <img id="close" src="../../icons/close.svg"></a>
				</div>
				<div class="filter">
					<div class="name">
						<label>Name</label>
						<p><?php echo $result_entry['First_Name'] . " " . $result_entry['Last_Name'];  ?></p>
						<!-- <label>Days:</label>
						<p></p> -->
					</div>

					<div class="fil_date">
						<form method="POST" action="time_record_view_layout.php">
							<input type="hidden" name="id" value="<?php echo $result_entry['Employees_ID']; ?>">
							<input type="date" name="from" value="<?php echo $from; ?>">
							<input type="date" name="to" value="<?php echo $to; ?>">
							<input type="submit" name="filter-record" id="btn-filter" value="filter" >
						</form>
					</div>
				</div>
				<div class="div-table" id="table-record">
					<table>
						<thead>
							<tr>
								<th>Entry ID</th>
								<th>Time in</th>
								<th>Time Out</th>
								<th>Total hrs</th>
								<th>Date</th>
								<th>Action</th>
							</tr>
						</thead>
						<?php do{ if(isset($result_entry['Employees_ID'])){ ?>
						<tbody>
							<tr>
								<td><?php echo $result_entry['Time_Entries_ID']; ?></td>
								<td><?php echo date("g:i A",strtotime($result_entry['Time_In'])); ?></td>
								<td><?php if($result_entry['Time_Out2'] == "00:00:00.000000" or $result_entry['Time_Out'] == "00:00:00.000000")
								{
									echo "";
								}else{
									echo date("g:i A",strtotime($result_entry['Time_Out2'])); 
								}
								?></td>
								<td><?php if($result_entry['Hours_Worked']%60 == 0){
								echo $total_hours = intval($result_entry['Hours_Worked']/60) . 'hrs';
								}elseif($result_entry['Hours_Worked']%60 >= 1){
								echo $total_hours = intval($result_entry['Hours_Worked']/60) . 'hrs ' . $result_entry['Hours_Worked']%60 . 'mins';
								}
							?></td>
								<td><?php echo date("m-d-Y",strtotime($result_entry['Date_Attendance'])); ?></td>
								<td><a href="javascript: open_record_view(<?php echo $result_entry['Time_Entries_ID']; ?>);" ><img id="view" src="../../icons/view-action.svg" ></a><a href="delete_ind_entries.php?id=<?php echo $result_entry['Time_Entries_ID']; ?>&emp_id=<?php echo $result_entry['Employees_ID'];  ?>" ><img id="delete-icon" src="../../icons/delete.svg"></a></td>
							</tr>
						</tbody>
					<?php } }while($result_entry=$query_entry->fetch_assoc()); ?>
				
					</table>
				</div>
			</div>
		</div>
	
		<div class="container_view_record_info" >
			<div class="box_time_info"> 
				<div class="title_time_info">
					<label>Time Entry Info.</label>
					<a href="javascript: close_record_view();"><img id="close_time_entry"  src="../../icons/close.svg" ></a>
				</div>
				<div class="content">
					<div class="profile_time_info">
						<div class="img-border">
							<img src="" id="image">				
						</div>
						<div class="sub_info">
							<div class="row-prof">
							 <label>ID: &nbsp;</label><p id="emp_id"></p>
							</div>
							<div class="row-prof">
							 <label>Name: &nbsp;</label><p id="name"></p>
							</div>
							<div class="row-prof">
							 <label>Department: &nbsp;</label><p id="department"></p>

							</div>
							<div class="row-prof">
							 <label>Position: &nbsp;</label><p id="position"></p>
							</div>
							
														
						</div>
					</div>
					<div class="pri_time_info">
						<div class="row_pri">
						<label>Date:&nbsp;</label><p id="date"></p>
						</div>
						<div class="row_pri">
						<label>Shift:&nbsp;</label><p id="schedule_type"></p>
						</div>
						<div class="row_pri">
						<label>Time Schedule:&nbsp;</label><p id="schedule_time"></p>
						</div>
						<div class="row_pri">
						<label>Time In:&nbsp;</label><p id="time_in"></p>
						</div>
						<div class="row_pri">
						<label>Time Out:&nbsp;</label><p id="time_out"></p>
						</div>
						<div class="row_pri">
						<label>Time In 2:&nbsp;</label><p id="time_in2"></p>
						</div>
						<div class="row_pri">
						<label>Time Out 2:&nbsp;</label><p id="time_out2"></p>
						</div>
						<div class="row_pri">
						<label>Late:&nbsp;</label><p id="late"></p>
						</div>
						<div class="row_pri">
						<label>Undertime:&nbsp;</label><p id="undertime"></p>
						</div>
						<div class="row_pri">
						<label>Regular Time:&nbsp;</label><p id="regular_hours"></p>
						</div>
						<div class="row_pri">
						<label>Overtime :&nbsp;</label><p id="overtime_hours"></p>
						</div>
						<div class="row_pri">
						<label>Total Worked Hours:&nbsp;</label><p id="total_hours"></p>
						</div>
						<div class="row_pri">
						<label>Daily Status:&nbsp;</label><p id="status"></p>
						</div>
					</div>
				</div>
			</div>
		</div>


		</div>
	</div>

</body>
	<script type="text/javascript" src="record.js"></script>
</html>