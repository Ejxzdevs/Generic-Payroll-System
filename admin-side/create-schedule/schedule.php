

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="schedule.css">
	<title>Payroll Managament System</title>
</head>
<body>
	<div class="background">
			
		<div class="div-background">
			
			

			<div class="home-content">
			
				<div class="user-head">
					<div class="dir-label">
						<div class="left">
							<label>Schedule List</label>
						</div>
						<div class="right">
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
					<div class="user-table">
						<table>
							<thead>
								<tr>
									<th>ID</th>
									<th>Shift Name</th>
									<th>Time Start</th>
									<th>Time End</th>
									<th>Action</th>
								</tr>
							</thead>
							<?php do{ if(isset($res_sched['Schedule_ID'])){ ?>
							<tbody>

								<tr>
									<td><?php echo $res_sched['Schedule_ID']; ?></td>
									<td><?php echo $res_sched['Schedule_Name']; ?></td>
									<td><?php echo date("g:i a",strtotime($res_sched['Schedule_In'])); ?></td>
									<td><?php echo date("g:i a",strtotime($res_sched['Schedule_Out'])); ?></td>
									<td><a href="edit_schedule_layout.php?id=<?php echo $res_sched['Schedule_ID'];?>"  
									id="view" class="view-blue" ><img id="edit-icon" src="../../icons/edit-action.svg"></a>

									<a href="delete-schedule.php?id=<?php echo $res_sched['Schedule_ID']; ?>" class="del-red" ><img id="delete-icon" src="../../icons/delete.svg"></a></td>
								</tr>
								
							</tbody>
							<?php } }while($res_sched=$schedule->fetch_assoc()); ?>
						
						</table>

					</div>
					
								
					<div class="user-option">
						<div class="other-button">
							<!-- <p>hello</p> -->
						</div>
						<div class="user-button">
							<a href="#" id="create-shift" >Create Schedule</a>
						</div>
					</div>
				</div>	
				
			</div>
			<div class="pop-create-schedule">
				<div class="box-create-schedule">
					<div class="header">
						<label>Create Schedule</label>
						<a href="#" id="close-shift"><img id="close"  src="../../icons/close.svg"></a>
					</div>
					<div class="body">
						<form method="post" action="create-schedule.php">
							<div class="shift_name">
								<div class="div_label">
									<label > Shift Name</label>
								</div>
								<div class="div_input">
									<input type="text" placeholder="Shift Name" name="shift_name">
								</div>
							</div>
							<div class="set_start">
								<div class="start_label">
									<label > Time Start</label>
								</div>
								<div class="start_input">
									<input type="time" name="time_start">
								</div>
							</div>
							<div class="set_end">
								<div class="end_label">
									<label > Time End</label>
								</div>
								<div class="end_input" >
									<input type="time" name="time_end">
								</div>
							</div>
							<div class="set_rate">
								<div class="rate_label">
									<label >Rate</label>
								</div>
								<div class="rate_input" >
									<input  type="input" name="shift_rate" placeholder="%">
								</div>
							</div>
							<div class="submit_shift">
								<button type="submit" name="submit">SUBMIT</button>
							</div>
							

						</form>
						
					</div>

				</div>
			</div>
			

	</div>
	</div>
</body>
	<script type="text/javascript">
		document.getElementById("create-shift").addEventListener("click", function(){
		document.querySelector(".pop-create-schedule").style.display="flex";
		})
		document.getElementById("close-shift").addEventListener("click",function(){
		document.querySelector(".pop-create-schedule").style.display="none";
		})
	</script>
	<script type="text/javascript">
		document.getElementById("sub-down").addEventListener("click", function(){
		document.querySelector(".sub-nav").style.display="block";
		document.querySelector(".img_down").style.display="none";

		
		})
		document.getElementById("sub-up").addEventListener("click",function(){
		document.querySelector(".sub-nav").style.display="none";
		document.querySelector(".img_down").style.display="inline";
		})
	</script>
</html>