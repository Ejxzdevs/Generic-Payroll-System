<?php include "read.php"; ?>
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
										<input type="text" name="name" class="input" placeholder="Type text:">
										<input type="submit" name="submit"  value="Search" class="search">
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
									<th style="width:150px;">ID</th>
									<th>Leave</th>
									<th>Annualy leave</th>
									<th>Action</th>
								</tr>
							</thead>
							<?php do{ if(isset($res_leave['Leave_ID'])){ ?>
							<tbody>
								<tr>
									<td><?php echo $res_leave['Leave_ID']; ?></td>
									<td><?php echo $res_leave['Leave_Name']; ?> </td>
									<td><?php echo $res_leave['Num_Leave']; ?></td>
									<td><a href="edit_leave_layout.php?id=<?php echo $res_leave['Leave_ID'];?>"><img id="edit-icon" src="../../icons/edit-action.svg"></a><a href="delete_leave.php?id=<?php echo $res_leave['Leave_ID'];?>"><img id="delete-icon" src="../../icons/delete.svg"></a></td>
								</tr>
							</tbody>
						<?php }}while($res_leave=$leave->fetch_assoc());  ?>
						</table>

					</div>

					
					<div class="footer">
						<a href="#" id="create-holiday">Create Leave</a>
					</div>


				
				
			</div>
			<div class="pop-holiday">
				<div class="con-box">
					<form method="post" action="insert.php" >
						<div class="header">
							<p>ADD NEW</p>
							<a href="#" id="close-holiday" ><img id="holiday-close" src="../../icons/close.svg"></a>
						</div>
						<div class="body">
							<div class="first">
								<div class="lab-in">
									<label>LEAVE</label>
								</div>
								<div class="lab-in" >
									<input type="text" name="name" placeholder="Type Name: ">
								</div>
							</div>
							<div class="third">
								<div class="lab-in-2">
									<label>Annualy Leave</label>
								</div>
								<div class="lab-in-2" >
									<input type="text" name="number" placeholder="No. of leave: " >
								</div>
							</div>
							 <div class="fourth">
							 	<button type="submit" name="submit">SUBMIT</button>
							 </div>
							

						</div>


					</form>


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