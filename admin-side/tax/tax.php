

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="user.css">	
	<title>Payroll Managament System</title>
	<script src="../../jquery/jquery-3.6.3.js"></script>
</head>
<body>
	<div class="background">
		<div class="div-background">
			<div class="home-content">
				
				<div class="user-head">
					<div class="dir-label">
						<div class="left">
							<label>Tax List</label>
						</div>
						<div class="right">
							<form method="POST" action="user_layout.php">			
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
					<div class="user-table" id="tax-table">
						<table >
							<thead>
								<tr>
									<th>ID</th>
									<th>Name</th>
									<th>Employer Share</th>
									<th>Employee Share</th>
									<th>Action</th>
								
								</tr>
							</thead>
							<?php do{ if(isset($res_tax['Tax_ID'])){ ?>
							<tbody>
								<tr>
									<td><?php echo $res_tax['Tax_ID']; ?></td>
									<td><?php echo $res_tax['Tax_Name']; ?></td>
									<td><?php echo $res_tax['Employer_Share'] . "%"; ?></td>
									<td><?php echo $res_tax['Employee_Share'] . "%"; ?></td>
									
									<td>
										<a href="javascript: view_tax(<?php echo $res_tax['Tax_ID'];?>); "><img id="edit-icon" src="../../icons/edit-action.svg"></a>
										<a href="delete_tax.php?id=<?php echo $res_tax['Tax_ID']; ?>"><img id="delete-icon" src="../../icons/delete.svg"></a>		
										
									</td>
								</tr>
							</tbody>
							<?php } }while($res_tax=$query_tax->fetch_assoc());  ?>
						</table>
					</div>
					<div class="footer">
						<div class="footer-left">
							
						</div>
						<div class="footer-right">
							<a href="javascript: open_add_tax();">New Tax</a>
						</div>
					</div>
					
					
				</div>	
				
			</div>




			<div class="container-edit-tax">
				<div class="box-container-tax">
					<div class="title-tax"> 
						<label>Edit Tax Rate</label>
						<a href="javascript: close_tax();"><img src="../../icons/close.svg"  id="close-tax"></a>
					</div>
					<div class="body-tax">
						<div class="tax-row">
							<label>Name</label>
							<input type="text" id="name">
						</div>
						<div class="tax-row">
							<label>Employer Share</label>
							<input type="text" id="employer_share">
						</div>
						<div class="tax-row">
							<label>Employee Share</label>
							<input type="text" id="employee_share">
						</div>
						<div class="tax-row">
							<a href="javascript: update_tax();">UPDATE</a>
						</div>
					</div>
				</div>
			</div>
			<div class="add-tax-container">
				<div class="box-tax">
					<form method="POST" action="add_tax.php">
					<div class="title-add-tax">
						<label>New Tax</label>
						<a href="javascript: close_add_tax();"><img id="tax-close" src="../../icons/close.svg" ></a>
					</div>
					<div class="body-add-tax">
						<div class="tax-row-input">
							<p style="margin-left: 1.7em;">Name</p><input type="text" name="tax_name" placeholder="Input Name: ">
						</div>
						<div class="tax-row-input">
							<p>Employer Share</p><input style="margin-right: 4em;" type="text" name="employer_share" placeholder="Input Rate:">
						</div>
						<div class="tax-row-input">
							<p>Employee Share</p><input style="margin-right: 4em;"  type="text" name="employee_share" placeholder="Input Rate: ">
						</div>
						<div class="tax-button-div">
							<button type="submit" name="submit-tax">SAVE</button>
						</div>
			
					</div>
					</form>

				</div>
			</div>
			

	</div>
	</div>
</body>
	<script type="text/javascript" src="tax.js"></script>
</html>