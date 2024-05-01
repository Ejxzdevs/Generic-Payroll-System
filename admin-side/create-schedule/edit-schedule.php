<?PHP include "read.php"; ?>
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
							<label>Schedule LIST</label>
						</div>
						<div class="right">
							<form method="POST" action="schedule.php">			
									<div class="containter-search">
										<div class="containter-input-search">
										<img src="../../icons/search.svg" id="img_search">
										<input type="text" name="" class="input" placeholder="Type text:">
										<input type="submit" name=""  value="Search" class="search">
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
							<?php do{ ?>
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
							<?php }while($res_sched=$schedule->fetch_assoc()); ?>
						
						</table>

					</div>
					
								
					<div class="user-option">
						<div class="other-button">
							<!-- <p>hello</p> -->
						</div>
						<div class="user-button">
							<a href="#" id="create-shift" ><img src="../../icons/add.svg">Create Schedule</a>
						</div>
					</div>
				</div>	
				
			</div>
			<div class="edit-schedule-container">
				<div class="box-edit-schedule">
					<?php do{ ?>
					<form  action="update-sched.php" method="post">
						<div class="header-edit">
							<p>Edit Schedule</p>
							<a href="schedule_layout.php"><img id="edit-close-img" src="../../icons/close.svg"></a>
						</div>
						<div class="body-edit">
							<div class="div-shift-name">
								<div class="label">
									<label>Shift Name</label>
								</div>
								<div class="input">
									<input type="hidden" name="id" value="<?php echo $res_edit_sched['Schedule_ID']; ?>">
									<input type="text" value="<?php echo $res_edit_sched['Schedule_Name']; ?>" name="shift_name" placeholder="Type Name: ">
								</div>
							</div>
							<div class="div-time-start">
								<div class="label">
									<label>Time Start</label>
								</div>
								<div class="input">
									<input type="time" name="time_start" value="<?php $a = new DateTime($res_edit_sched['Schedule_In']); echo $a->format('H:i'); ?>"  > >
								</div>
							</div>
							<div class="div-time-end">
								<div class="label">
									<label>Time End</label>
								</div>
								<div class="input">
									<input type="time" name="time_end" value="<?php $a = new DateTime($res_edit_sched['Schedule_Out']); echo $a->format('H:i'); ?>"  >
								</div>
							</div>
							<div class="div-time-end">
								<div class="label">
									<label>Rate</label>
								</div>
								<div class="input">
									<input type="text" name="rate" value="<?php echo $res_edit_sched['Schedule_Rate'] . "%"; ?>" placeholder="%" >
								</div>
							</div>
							<div class="div-button">
								<button type="submit" name="submit">SAVE</button>
							</div>
							
								
						</div>
					</form>
					<?php }while($res_edit_sched=$edit_schedule->fetch_assoc()); ?>

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

</html>