
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
	<link rel="stylesheet" type="text/css" href="style.css">
	<script type="text/javascript" src="department.js"></script>
	<title>Payroll Managament System</title>
</head>
<body>

	<div class="background">
		
		

		<div class="div-background">

			
			<div class="home-content">
				<!-- <div class="system-logo">
					<h1 class="logo">Payroll Management System</h1>
				</div>	 -->
				<div class="box-attendance">
					<div class="attendance-nav-bar">
						<ul  >
							<li ><a href="department_layout.php"  class="schedule1" >Department</a><img src="../../icons/supermaket.png"> </li>
							<li><a href="position_layout.php" style="color:#66ff66;">Position</a><img src="../../icons/job-offer.png"> </li>
						
						</ul>
					</div>
					<div class="schedule">
						<div class="schedule-header">
							<div class="sched-header-left" >
								
							</div>
							<div class="sched-header-right">
								<form method="POST" action="position_layout.php">			
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
											<th>Position ID</th>
											<th>Department Name</th>
											<th>Position</th>
											<th>Action</th>
										
										
										</tr>
									</thead>
									<?php do{ if(isset($res_query_position['Position_ID'])){ ?>
									<tbody>
										<tr>
											<td><?php echo $res_query_position['Position_ID']; ?></td>
											<td><?php echo $res_query_position['Department_Name']; ?></td>
											<td><?php echo $res_query_position['Position_Name']; ?></td>
											<td><a href="edit_position_layout.php?id=<?php echo $res_query_position['Position_ID']; ?>"><img id="edit-icon" src="../../icons/edit-action.svg"></a>
												<a href="delete_position.php?id=<?php echo $res_query_position['Position_ID']; ?>"><img id="delete-icon" src="../../icons/delete.svg"></a></td>
										
									
										</tr>
									</tbody>
									<?php } }while($res_query_position=$query_position->fetch_assoc()); ?>
								</table>
							</div>
							<div class="button-department" >
								<a href="javascript: add_department();">Add Items</a>	
							</div>
					</div>
				</div>


		</div>
		<div class="department-container"  >
			<div class="box-department" style="height:400px; width: 500px;" >
				<form method="POST" action="insert-position.php">
					<div class="title-department" style="height:40px;" >
						<label>New Position</label>
						<a href="javascript: close_department();"><img id="close" src="../../icons/close.svg" ></a>
					</div>
					<div class="body-department">
						<label>Choose Department</label>
						<select name="id_department">
						<?php do{ ?>
							<option value="<?php echo $res_query_department11['Department_ID']; ?>"><?php echo $res_query_department11['Department_Name']; ?>
							</option>
						<?php }while($res_query_department11=$query_department11->fetch_assoc()); ?>
						</select>
						<label>Position </label>
						<input type="text" name="position_name" placeholder="Position Name: ">
						<label>Salary Rate </label>
						<input type="text" name="position_salary" placeholder="Position Rate: ">
						<button type="submit" name="submit">SUBMIT </button>

					</div>
				</form>
			</div>
		</div>

				
	</div>
	</div>

	


</body>
	
</html>

