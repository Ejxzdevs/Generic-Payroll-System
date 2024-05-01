
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="holiday.css">
	<title>Payroll Managament System</title>
</head>
<body>
	<div class="background">	
	<div class="div-background">

			<div class="home-content">
				<div class="user-head">
					<div class="dir-label">
						<div class="left">
							<label>HOLIDAY LIST</label>
						</div>
						<div class="right">
							<form method="POST" action="holiday_layout.php">			
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
									<th>Holiday</th>
									<th>Date</th>
									<th>Rate</th>
									<th>Action</th>
								</tr>
							</thead>
							<?php do{ if(isset($res_holiday['ID'])) {?>
							<tbody>
								<tr>
									<td><?php echo $res_holiday['ID']; ?></td>
									<td><?php echo $res_holiday['Holiday_Name']; ?> </td>
									<td><?php echo date('M-d-Y', strtotime($res_holiday['Doh'])) ;?> </td>
									<td><?php echo $res_holiday['Rate']; ?>%</td>
									<td><a href="edit_holiday_layout.php?id=<?php echo $res_holiday['ID'];?>" id="view" class="view-blue" ><img id="edit-icon" src="../../icons/edit-action.svg"></a><a href="delete_holiday.php?id=<?php echo $res_holiday['ID'];?>" class="del-red" ><img id="delete-icon" src="../../icons/delete.svg"></a></td>
								</tr>
							</tbody>
						<?php }}while($res_holiday=$holiday->fetch_assoc());  ?>
						</table>

					</div>

					</div>
					<div class="footer">
						<a href="#" id="create-holiday"><img src="">Create Holiday</a>
					</div>


				</div>	
				
			</div>
			<div class="pop-holiday">
				<div class="con-box">
					<form method="post" action="insert.php" >
						<div class="header">
							<p>Create Holiday</p>
							<a href="#" id="close-holiday" ><img id="holiday-close" src="../../icons/close.svg"></a>
						</div>
						<div class="body">
							<div class="first">
								<div class="lab-in">
									<label>Name</label>
								</div>
								<div class="lab-in" >
									<input type="text" name="name" placeholder="Type Name: ">
								</div>
							</div>
							<div class="second">
								<div class="lab-in-1">
									<label>Set Date</label>
								</div>
								<div class="lab-in-1" >
									<input type="date" name="petsa"  value="<?php echo date('Y-m-d'); ?>">
								</div>
							</div>
							<div class="third">
								<div class="lab-in-2">
									<label>Rate Percentage</label>
								</div>
								<div class="lab-in-2" >
									<input type="text" name="rate" placeholder="Type % " value="%" >
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