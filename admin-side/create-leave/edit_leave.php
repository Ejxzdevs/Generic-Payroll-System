<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="leave.css">
	<title>Payroll Managament System</title>
</head>
<body>
	<div class="background">	
	<div class="div-background">
			
			

			<div class="home-content">
				<div class="user-head">
					<div class="dir-label">
						<div class="left">
							<label>LEAVE LIST</label>
						</div>
						<div class="right">
							<form method="POST" action="leave_layout.php">			
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
				<div class="body-holiday">
						<div class="box-table">
						<table >
							<thead>
								<tr>
									<th>ID</th>
									<th>Leave</th>
									<th>No. of leave/yr </th>
									<th>Action</th>
								</tr>
							</thead>
							<?php do{?>
							<tbody>
								<tr>
									<td><?php echo $res_leave['Leave_ID']; ?></td>
									<td><?php echo $res_leave['Leave_Name']; ?> </td>
									<td><?php echo $res_leave['Num_Leave']; ?></td>
									<td><a href="edit_leave.php?id=<?php echo $res_leave['Leave_ID'];?>"><img id="edit-icon" src="../../icons/edit-action.svg"></a><a href="delete_leave.php?id=<?php echo $res_leave['Leave_ID'];?>"><img id="delete-icon" src="../../icons/delete.svg"></a></td>
								</tr>
							</tbody>
						<?php }while($res_leave=$leave->fetch_assoc());  ?>
						</table>

					</div>

					</div>
					<div class="footer">
						<a href="#" id="create-holiday"><img src=""><img id="add_holiday" src="../../icons/add.svg">Add Leave</a>
					</div>


				</div>	
				
			</div>
			<div class="edit-leave">
				<div class="con-leave">
					<form method="POST" action="update.php">
					<div class="header-leave">
						<label>Edit Information</label>
						<a href="leave_layout.php" ><img id="leave-edit-close" src="../../icons/close.svg"></a>
					</div>
					
					<div class="body-edit-leave">

						<?php do{?>
						<div class="box-1">
							<div class="box-1-1">
								<label>Leave</label>
							</div>
							<div class="box-1-1">
								<input type="hidden" name="id" value="<?php echo $result_e_leave['Leave_ID'];?>">
								<input type="text" name="name" value="<?php echo $result_e_leave['Leave_Name'];?>">
							</div>
							
						</div>
						<div class="box-1">
							<div class="box-1-1">
								<label>No. of leave/yr</label>
							</div>
							<div class="box-1-1">
								<input type="text" name="number" value="<?php echo $result_e_leave['Num_Leave']?>">
							</div>
							
						</div>
						<div class="box-1">
							<div class="box-1-1">
								<button type="submit" name="submit">Save</button>
							</div>
							
						</div>
					</div>
					</form>
					<?php }while($result_edit_holiday=$edit_holiday->fetch_assoc());  ?>
				</div>
			</div>

	</div>
	</div>
</body>

<script type="text/javascript">
		document.getElementById("create-holiday").addEventListener("click", function(){
		document.querySelector(".pop-holiday").style.display="flex";
		})
		document.getElementById("close-holiday").addEventListener("click",function(){
		document.querySelector(".pop-holiday").style.display="none";
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