
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
							<?php do{ ?>
							<tbody>
								<tr>
									<td><?php echo $res_query_list['Allowance_ID']; ?></td>
									<td> <?php echo $res_query_list['Allowance_Name']; ?></td>
									<td> <?php echo $res_query_list['Allowance_Value']; ?></td>
									<td><a href="edit_holiday.php?id=" id="view" class="view-blue" ><img id="edit-icon" src="../../icons/edit-action.svg"></a><a href="delete_allowance.php?id=<?php echo $res_query_list['Allowance_ID']; ?>" class="del-red" ><img id="delete-icon" src="../../icons/delete.svg"></a></td>
								</tr>
							</tbody>
						<?php }while($res_query_list=$query_list->fetch_assoc()) ?>
					
						</table>

					</div>

					</div>
					<div class="footer">
						<a href="#" id="add-deduction">Add Item</a>
					</div>


				</div>	
				
			</div>
			<div class="pop_new_deduction">
				<div class="container-pop">
					<form method="POST" action="insert.php">
					<div class="title">
						<label>New Allowance</label>
						<a href="#" id="close-deduction"><img id="close" src="../../icons/close.svg"> </a>
					</div>
					<div class="body-de">
						<label>
							Name
						</label>
						<input type="text" name="name" placeholder="Name: ">
						<label>
							Amount
						</label>
						<input type="text" name="amount" placeholder="Amount: ">
					</div>
					<div class="submit">
						<button type="submit" name="submit">SUBMIT</button>
					</div>
					</form>
				</div>
			</div>
			<div class="deduction-container">
				<div class="deduction-box">
					<div class="title-edit-deduction"> 
						<label>Edit Information</label>
						<a href="allowance_layout.php"><img id="close" src="../../icons/close.svg" ></a>
					</div>
					<div class="body-edit-deduction">
						<form method="POST" action="update_allowance.php">
						<div class="box1">
							<label>Name</label>
						<input type="text" name="id" value="<?php echo $res_edit_allowance['Allowance_ID']; ?>" hidden>
						<input type="text" name="name" value="<?php echo $res_edit_allowance['Allowance_Name']; ?>" >
						</div>
							<div class="box1">
							<label>Value</label>
							<input type="text" name="value" value="<?php echo $res_edit_allowance['Allowance_Value']; ?>">
						</div>
							<div class="box1">
							<button type="submit" name="submit" >Save</button>
						</div>
						</form>
					</div>
				</div>
			</div>
			

	</div>
	</div>


</body>
<script type="text/javascript" src="footer.js"></script>
</html>