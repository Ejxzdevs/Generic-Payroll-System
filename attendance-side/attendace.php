<?php 
include "../connection/connection.php";

$select_all_employees = "SELECT * FROM (SELECT Employees_ID as id FROM tbl_employees_information)tbl_employees_information INNER JOIN (SELECT * FROM tbl_personal_information) tbl_personal_information ON tbl_employees_information.id = tbl_personal_information.Employees_ID LEFT JOIN (SELECT * FROM tbl_time_entries)tbl_time_entries ON tbl_personal_information.Employees_ID = tbl_time_entries.Employees_ID";
$query_all_employees = mysqli_query($conn,$select_all_employees);
$fetch_all_employees = mysqli_fetch_assoc($query_all_employees);



?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="attendance.css">
	<title>Attendance</title>
</head>
<body>
	<div class="container">
		<div class="side-option">
			<a id="time_in"  href="javascript: open_in();">TIME-IN</a>
			<a id="time_out" href="javascript: open_out();">TIME-OUT</a>
			<a id="time_ot">OT</a>
		</div>
		<div class="display-entry">
			<div class="date">
				<label>
				<?php 
				date_default_timezone_set('Asia/Manila');
				echo date('F d Y'); 

				?>	
				</label>
			</div>
			<?php 
			include "../connection/connection.php";


			?>
			<div class="data-entry">
				<div class="table-time">
					<table>
						<thead>
							<tr>
								<th>ID</th>
								<th>Name</th>
								<th>Time In</th>
								<th>Time Out</th>
								<th>Action</th>
							</tr>
						</thead>
						<?php do{ ?>
						<tbody>
							<tr>
								<td><?php echo $fetch_all_employees['id']; ?></td>
								<td><?php echo $fetch_all_employees['First_Name'] . " "  .$fetch_all_employees['Last_Name']; ?></td>
								<td><?php
								if(isset($fetch_all_employees['Time_In'])){
								 echo 
								 date('h:i: A',strtotime($fetch_all_employees['Time_In'])); }else{
								 	echo " ";
								 } 
								?></td>
								<td><?php
								if(isset($fetch_all_employees['Time_Out'])){
								  	if($fetch_all_employees['Time_Out'] =='00:00:00.000000'){
								  		echo "";
								  	}else{
								  		echo date('h:i: A',strtotime($fetch_all_employees['Time_Out']));								  	}
								 }else{
								 	echo "hello";
								 } 
								?></td>
								<td></td>
							</tr>
						</tbody>
					<?php }while($fetch_all_employees=$query_all_employees->fetch_assoc()); ?>
					</table>

				</div>
			</div>
			<div class="pop-up-time-in">
				<div class="box-time-in">
					<form method="POST"  action="time_in.php">
						<div class="header">
							<label>TIME IN</label>
							<a href="javascript: close_in();"><img id="close" src="../icons/close.svg" ></a>				
						</div>
						<div class="body">
							<label>Employee ID</label>
							<input type="text" name="id" placeholder="Employees ID: ">
							<input id="btn-in" type="submit" name="submit">
						</div>		
					</form>
				</div>
			</div>

			<div class="pop-up-time-in" id="out">
				<div class="box-time-in">
					<form method="POST" action="time_out.php">
						<div class="header">
							<label>TIME OUT</label>
							<a href="javascript: close_out();"><img id="close" src="../icons/close.svg" ></a>				
						</div>
						<div class="body">
							<label>Employee ID</label>
							<input type="text" name="id" placeholder="Employees ID: ">
							<input id="btn-in" type="submit" name="submit">
						</div>		
					</form>
				</div>
			</div>


		</div>
	</div>
</body>
	<script type="text/javascript" src="attendace.js"></script>
</html>