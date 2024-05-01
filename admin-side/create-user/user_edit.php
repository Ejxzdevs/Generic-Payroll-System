

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="user.css">
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
					<div class="user-table">
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
							<?php do{?>
							<tbody>
								<tr>
									<td><?php echo $accounts['Account_ID']; ?></td>
									<td><img class="img-emp"
										<?php if($accounts['Employee_Image'] == ''){ ?>
										src="../../side-bar/employees/<?php echo $accounts['Employee_Image'];?>"
									<?php }else{ ?>
										src="../../icons/user1.png"
										<?php } ?> ></td>
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
							<?php }while($accounts=$query->fetch_assoc());  ?>
						</table>
					</div>
					
								
					<div class="user-option">
						<div class="other-button">
							<!-- <p>hello</p> -->
						</div>
						<div class="user-button">
							<a href="#" id="create-user" ><img src="../../icons/add-user.svg">Create User</a>
						</div>
					</div>
				</div>	
				
			</div>
			<div class="edit-user">
				<div class="box-user">
					<form method="POST" action="update_user.php">
					<div class="title-user">
						<label>Edit Account</label>
						<a href="user_layout.php"><img id="img-close" src="../../icons/close.svg"></a>
					</div>
					<div class="body-user">
						<div class="column-img">
							<input type="hidden" name="id" value="<?php echo $res_user['Account_ID']; ?>">
							

							<img style="width: 6em; height: 6em;" class="img-emp" 
										<?php if($res_user['Employee_Image'] == '' ){ ?>
										src="../employees/emp-image<?php echo $res_user['Employee_Image'];?> "
									<?php }else{ ?>
										src="../../icons/user1.png"
									<?php } ?>>
						</div>
						<div class="column-user">
							<label>Username</label>

							<input type="text" name="username" value="<?php echo $res_user['Username']; ?>">
						</div>
						<div class="column-user">
							<label>Password</label>
							<input type="text" name="password" value="<?php echo $res_user['Password']; ?>">
						</div>
						<div class="column-user">
							<label>User Type</label>
							<select name="user_type"> 
								<option value="<?php echo $res_user['User_Type']; ?>" ><?php echo $res_user['User_Type']; ?></option>
								<?php do{ ?>
								<option value="<?php echo $result_usertype['User_Types']; ?>" ><?php echo $result_usertype['User_Types']; ?> </option>
							<?php }while($result_usertype=$query_user_type->fetch_assoc()); ?>
							</select>
						</div>

						<div class="column-button">
							<input type="submit" name="submit" value="UPDATE">
						</div>
					</div>
					</form>
				</div>
			</div>

	</div>
	</div>
</body>
	<script type="text/javascript">
		document.getElementById("create-user").addEventListener("click", function(){
		document.querySelector(".pop-create-user").style.display="flex";
		})
		document.getElementById("close-user-form").addEventListener("click",function(){
		document.querySelector(".pop-create-user").style.display="none";
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