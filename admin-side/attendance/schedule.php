
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
	<script type="text/javascript" src="../../sweetalert/sweetalert2.all.min.js"></script>
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
							<li ><a href="schedule_layout.php" style="color:#66ff66;" class="schedule1" >Attendance</a><img src="../../icons/workplace.png"> </li>
							<li><a href="csv_layout.php" class="Attendance1">CSV FILE</a><img id="csv" src="../../icons/csv.png"></li>
							<li><a href="time_record_layout.php">Records</a><img src="../../icons/worksheet.png"> </li>
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
								<form method="POST" action="schedule_layout.php">			
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
									<thead>
										<tr>
											<th>ID</th>
											<th>Name</th>
											
											<th>Time In</th>
											<th>Time Out</th>
											<!-- <th>OT</th> -->
		
											<th>Action</th>
											<!-- <th>Date</th> -->
										</tr>
									</thead>
									<tbody>
										<?php do {if(isset($entries['Employees_ID'])){ ?>
										<tr>
											<td> <?php echo $entries['Employees_ID']; ?>
											
											</td>
											<td><?php echo $entries['First_Name']; ?> <?php echo $entries['Last_Name']; ?></td>
										
										<td><?php echo date('g:i a' ,strtotime($entries['Time_In'])); ?> </td>
										<td><?php if($entries['Entry_Types'] == 'Outdoor'){
												if($entries['Time_Out'] == '00:00:00.000000'){

													echo " ";
												}else{
												echo date('g:i a',strtotime($entries['Time_Out']));
												}
										}else{
											echo date('g:i a',strtotime($entries['Time_Out2']));
										} ?></td>
										<!-- <td>s</td> -->
										
										<td><a href="javascript: time_info(<?php echo $entries['Time_Entries_ID']; ?>);" ><img id="view" src="../../icons/view-action.svg" ></a>

											<a href="javascript: time_entry_image(<?php echo $entries['Employees_ID']; ?>);" 


											<?php if($entries['Entry_Types'] == 'Outdoor'){ ?>
												class ="on_img"
												<?php }else{ ?> 
												class = "off_img"
												<?php } ?>

												>

											<img id="view" src="../../icons/image-files.png"></a>
										</td>

									<?php }}while($entries=$query->fetch_assoc());?>
										</tr>
									</tbody>
								</table>
							</div>
						
					</div>
				</div>


		</div>
		<div class="container_view_record_info" >
			<div class="box_time_info"> 
				<div class="title_time_info">
					<label>Time Entry Info.</label>
					<a href="javascript: close_time_info();"><img id="close_time_entry"  src="../../icons/close.svg" ></a>
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




		<div class="pop-up-ot">
			<label id="clock-ot"></label>
			<div class="pop-ot">
				<div class="header-ot">
					<p style="color:white;">OT</p>	
				</div>
				<div class="body-ot">
					<form method="POST" action="ot.php">
						<a href="#" id="ot-close" class="ot-close"><img for="ot-close" id="img_close" src="../../icons/close.svg"> </a>
						<div class="ot-input">
							<p>Employees ID</p>
							<input type="text" name="employees-id-ot" placeholder="Enter Employee ID">
						</div>
						<div class="input-ot">
							<input type="text" name="ot" placeholder="Number of Hours"> 
						</div>
						<div class="ot-submit">
							<button type="submit" name="Submit-ot">OT</button>
						</div>
					</form>
				</div>
			</div>
		</div>

		<div class="pop-up-time-out" >
			<label id="clock-out"></label>
			<div class="pop-time-out">
				<div class="header-time-out">
					<p>TIME OUT REQUEST</p>
					<a  id="time-out-close" href="#"><img class="img_close" for="time-out-close" src="../../icons/close.svg"></a>
				</div>
				<div class="body-time-out">
					<form class="time-out-form" method="POST" action="time_out.php">
						<div class="label-out">
							<label>Employee ID</label>
						</div>
						<div class="input-out">
						<input type="text" name="employees-id-out" placeholder="ENTER YOUR ID">
						</div>
						<div class="submit_time_out">
						<input type="submit" name="Submit-time-out">
						</div>
					</form>
				</div>
			</div>
		</div>
		

		<div class="pop-up" >
			<label id="clock-in"></label>
			<div class="pop-time-in">
				<div class="header-time-in">
					<p>TIME IN REQUEST</p>
					<a  id="time-close" href="#"><img class="img_close" for="time-close" src="../../icons/close.svg"></a>
				</div>
				<div class="body-time-in">
					<form class="time-in-form" method="POST" action="time_in.php">
						<div class="label">
							<label>Employee ID</label>
						</div>
						<div class="input">
						<input type="text" name="time-in-id" placeholder="ENTER YOUR ID">
						</div>
						<div class="submit_time_in">
						<input type="submit" name="Submit-time-in">
						</div>
					</form>
				</div>
			</div>
		</div>
		<div class="container-driver-image">
			<div class="box-driver-image">
				<div class="driver-title">
					<label>Time Entry Image</label>
					<a href="javascript: close_time_entry_image();"><img id="close" src="../../icons/close.svg"></a>
				</div>
				<div class="driver-content">
					<div class="img_column">
						<div class="label-in" style="background: blue;">
							<label>TIME IN</label>
						</div>
						<div class="box-image">
							<img src="" id="img-in">
						</div>
						<div class="time">
							<p id="in"></p>
						</div>
					</div>
					<div class="img_column">
						<div class="label-in"  style="background: crimson;">
							<label>TIME OUT</label>
						</div>
						<div class="box-image">
							<img src="" id="img-out">
						</div>
						<div class="time">
							<p id="out"></p>
						</div>
					</div>
					<div class="img_column">
						<div class="label-in"  style="background: green;">
							<label>Overtime</label>
						</div>
						<div class="box-image">
							<img src="" id="img-ot">
						</div>
						<div class="time" id="ot-timess">
							<p id="ot"></p>
						</div>
					</div>
				</div>
			</div>
		</div>



		
	</div>
	</div>
	
</body>
	<script type="text/javascript" src="schedule.js"></script>
</html>

