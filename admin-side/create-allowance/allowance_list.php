
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="style.css">
	<title>Payroll Managament System</title>
</head>
<body>
	<div class="background">	
	<div class="div-background">
			
			

			<div class="home-content">
			
				<div class="user-head">
					<div class="dir-label">
						<div class="left">
							<label>Allowance List</label>
						</div>
						<div class="right">
							<form method="POST" action="allowance_layout.php">			
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
									<th>ID</th>
									<th>Name</th>
									<th>Value</th>
									<th>Action</th>
								</tr>
							</thead>
							<?php do{ if(isset($res_query_list['Allowance_ID'])){ ?>
							<tbody>
								<tr>
									<td><?php echo $res_query_list['Allowance_ID']; ?></td>
									<td> <?php echo $res_query_list['Allowance_Name']; ?></td>
									<td> <?php echo $res_query_list['Allowance_Value']; ?></td>
									<td><a href="allowance__list_edit_layout.php?id=<?php echo $res_query_list['Allowance_ID']; ?>" id="view" class="view-blue" ><img id="edit-icon" src="../../icons/edit-action.svg"></a><a href="delete_allowance.php?id=<?php echo $res_query_list['Allowance_ID']; ?>" class="del-red" ><img id="delete-icon" src="../../icons/delete.svg"></a></td>
								</tr>
							</tbody>
						<?php } }while($res_query_list=$query_list->fetch_assoc()) ?>
					
						</table>

					</div>

					</div>
					<div class="footer">
						<a href="javascript: add_new_allowance();">New Allowance</a>
					</div>


				</div>	
				
			</div>
			<div class="pop_new_deduction">
				<div class="container-pop">
					<form method="POST" action="insert.php">
					<div class="title">
						<p>New Allowance</p>
						<a href="javascript: close_add_allowance();"><img id="close_allowance" src="../../icons/close.svg" ></a>
					</div>
					<div class="top-allowance">
						<label>Allowance Name</label>
						<input type="text" name="name" placeholder="Enter Name:">
						<input type="text" name="amount" placeholder="Amount:">
						<select id="choose_emp" name="choose_emp" onchange="choose_employee();" >
							<option value="None">NONE</option>
							<option value="All">ALL</option>
							<option value="Regular">Regular</option>
							<option value="Casual">Casual</option>
							<option value="Driver">Driver</option>
							<option value="Single">Select Employee</option>
						</select>
						<input id="emp_type" type="text" name="id" placeholder="Type Employee ID:">
					</div>
					<div class="button-allowance">
						<button type="submit" name="submit">SUBMIT</button>
					</div>
					</form>
				</div>
			</div>
			

	</div>
	</div>


</body>
<script type="text/javascript" src="footer.js"></script>
</html>