
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
	<script type="text/javascript" src="../../sweetalert/jquery-3.6.1.min.js"></script>
	<title>Payroll Managament System</title>
</head>
<body>

	<div class="background">
		
		

		<div class="div-background">

			
			<div class="home-content">
				<div class="box-attendance">
					<div class="attendance-nav-bar">
						<ul  >
							<li ><a href="department_layout.php" style="color:#66ff66;" class="schedule1" >Department</a><img src="../../icons/supermaket.png"> </li>
							<li><a href="position_layout.php">Position</a><img src="../../icons/job-offer.png"> </li>
						
						</ul>
					</div>
					<div class="schedule">
						<div class="schedule-header">
							<div class="sched-header-left" >
								
							</div>
							<div class="sched-header-right">
								<form method="POST" action="department_layout.php">			
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
											<th>DEPARTMENT ID</th>
											<th>Department Name</th>
											<th>Total Position</th>
											<th>Action</th>
										
										
										</tr>
									</thead>
									<?php do { if(isset($res_query_department['Dept_ID'])) { ?>
									<tbody>
										<tr>
											<td><?php echo $res_query_department['Dept_ID'] ?> </td>
											<td> <?php echo $res_query_department['Department_Name'] ?></td>
											<td> <?php if($res_query_department['ND'] == NULL){
													ECHO " 0";
												}else{
												ECHO $res_query_department['ND'];

												} 
										?></td>
											<td>
												<a href="edit_department_layout.php?id=<?php echo $res_query_department['Dept_ID'] ?>"><img id="edit-icon" src="../../icons/edit-action.svg"></a>
												<a href="delete_department.php?id=<?php echo $res_query_department['Dept_ID'] ?>"><img id="delete-icon" src="../../icons/delete.svg"></a> </td>
										
									
										</tr>
									</tbody>
								<?php } }while($res_query_department=$query_department->fetch_assoc()); ?>
								</table>
							</div>
							<div class="button-department" >
								<a href="javascript: add_department();">Create Department</a>
								
							</div>
					</div>
				</div>


		</div>
		<div class="department-container">
			<div class="box-department">
				<form method="POST" action="insert-department.php">
					<div class="title-department">
						<label>New Department</label>
						<a href="javascript: close_department();"><img id="close" src="../../icons/close.svg" ></a>
					</div>
					<div class="body-department">
						<label>Name</label>
						<input type="text" name="department_name" placeholder="Department Name: ">
						<button type="submit" name="submit">SUBMIT </button>

					</div>
				</form>
			</div>
		</div>

				
	</div>
	</div>

	


</body>
	<script type="text/javascript" src="department.js"></script>
</html>

