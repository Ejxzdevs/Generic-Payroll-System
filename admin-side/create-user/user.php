

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="user.css">
	<script src="../../jquery/jquery-3.6.3.js"></script>
	<title>Payroll Managament System</title>
</head>
<body>
	<div class="background">
			
		<div class="div-background">
			
			

			<div class="home-content">
				
				<div class="user-head">
					<div class="dir-label">
						<div class="left">
							<label>User Account</label>
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
					<div class="user-table" id="user_table">
						<table >
							<thead>
								<tr>
									<th>Account ID</th>
									<th>Image</th>
									<th>Name</th>
									<th>Account Type</th>
									<th>Department</th>
									<th>STATUS</th>
									<th>Action</th>
								</tr>
							</thead>
							<?php do{ if(isset($accounts['Account_ID'])){ ?>
							<tbody>
								<tr>
									<td><?php echo $accounts['Account_ID']; ?></td>
									<td><img class="img-emp" 
										<?php if($accounts['Employee_Image'] == '' ){ ?>
										src="../employees/emp-image<?php echo $accounts['Employee_Image'];?> "
									<?php }else{ ?>
										src="../../icons/user1.png"
									<?php } ?>></td>
									<td><?php echo $accounts['First_Name']; ?> <?php echo $accounts['Last_Name']; ?></td>
									<td><?php echo $accounts['User_Type']; ?></td>
									<td><?php echo $accounts['Department_Name']; ?></td>
									<td><?php echo $accounts['Status']; ?></td>
									<td>

										<a 
										<?php

										if($accounts['Status'] == "Enable"){ ?>
												class="on"
										<?php	}else{ ?>
												class="off"
										<?php	} ?>

										id="switch" href="javascript: control(<?php echo $accounts['Account_ID'];?>); ">


										<?php if($accounts['Status'] == "Enable"){
												echo "ON";
												}
												else{
													echo "OFF";
												}
											
											 ?>

										</a>
										
										<a href="user_edit_layout.php?id=<?php echo $accounts['Account_ID'];?>"><img id="edit-icon" src="../../icons/edit-action.svg"></a><a href="delete_user.php?id=<?php echo $accounts['Account_ID']; ?>" ><img id="delete-icon" src="../../icons/delete.svg"></a></td>
								</tr>
							</tbody>
							<?php } }while($accounts=$query->fetch_assoc());  ?>
						</table>
					</div>
					
								
					<div class="user-option">
						<div class="other-button">
							<!-- <p>hello</p> -->
						</div>
						<div class="user-button">
							<a href="javascript: create_user();" >Create User</a>
						</div>
					</div>
				</div>	
				
			</div>
			<div class="pop-create-user">
				<div class="box-create-user">
					<form method="POST" action="insert_user.php">
					<div class="title-create-user">
						<label>Create user Account</label>
						<a href="javascript: close_create_user();"><img id="img-close" src="../../icons/close.svg" ></a>
					</div>
					<div class="body-create-user">
						<label>EMP. ID</label>
						<input type="text" name="id" placeholder="Employee id:">
						<label>Username</label>
						<input type="text" name="username" placeholder="Username:">
						<label>Password</label>
						<input type="text" name="password" placeholder="Password:">
						<label>Verify passowrd</label>
						<input type="text" name="re_password" placeholder="Re-password:">
						<label>Account Type</label>
						<select name="account_type">
							<?php do{ ?>
							<option value="<?php echo $result_create_account_types['User_Types']; ?>"><?php echo $result_create_account_types['User_Types']; ?></option>
						<?php }while($result_create_account_types=$query_create_account_types->fetch_assoc()); ?>
						</select>
						<input type="submit" name="submit" class="button">
					</div>
					</form>
				</div>
			</div>

	</div>
	</div>
</body>
	<script type="text/javascript" src="user.js"></script>
</html>