<?PHP 
include "../../connection/connection.php";

$select_compensation = "SELECT * FROM tbl_compensation";
$query_all = mysqli_query($conn,$select_compensation);
$result = mysqli_fetch_assoc($query_all);


?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title></title>
	<link rel="stylesheet" type="text/css" href="content.css">
</head>
<body>
	<div class="payroll-container">
		<!-- header -->
		<div class="payroll-header">
			<label>Compensation</label>
		</div>
		<!-- body -->
		<div class="payroll-body">
		<div class="table-content">
			<table>
				<thead>
					<tr>
						<th>ID</th>

						<th style="width:400px;">Compensation Type</th>
						<th style="width:400px" >Date Paid</th>
						<th style="width:400px" >Action</th>
					</tr>
				</thead>
				<?php do{ if(isset($result['Compensation_ID'])){ ?>
				<tbody>
					<tr>
						<td><?php echo $result['Compensation_ID']; ?></td>
						<td><?php echo $result['Compensation_Type']; ?></td>
						<td><?php echo $result['Compensation_Date']; ?></td>
						<td><a href="compensation-dl.php"><img id="pdf-dl" src="../../icons/pdf.png"><a href="compensation-view.php"><img id="view-icon" style="margin-bottom: .5em;" src="../../icons/view-action.svg"></td>
					
					</tr>
				</tbody>
			<?php  } }WHILE($result=$query_all->fetch_assoc());  ?>
			</table>
			</div>
		</div>
		<!-- footer -->
		<div class="payroll-footer">
			<a href="javascript: open_com();">Create Bonus</a>
			
		</div>
		<div class="container-compensation">
			<div class="box-container">
				<div class="HEAD-B">
					<label>Compensation</label>
					<a href="javascript: close_slip();"><img id="close" src="../../icons/close.svg" ></a>	
				</div>
				<div class="body-a">
					<form method="POST" action="compensation_print.php">
						<select name="type">
							<option value="a">BONUS</option>
							<option value="b">13 Monthpay</option>
						</select>
						<select name="emp" id="choose_emp" onchange="choose_employee();" hidden>
							<option value="c" selected>All</option>
							<option value="d">Specific Employee</option>
						</select>
						<input class="a" type="text" name="id" id="emp-id" placeholder="Enter ID">
						<button class="btn-save" type="text" name="submit">Generate</button>
						
					</form>
				</div>
			</div>
		</div>




	</div>
</body>
<script type="text/javascript">
	function open_com(){
		document.querySelector('.container-compensation').style.display="FLEX";
	}
	function close_slip(){
		document.querySelector('.container-compensation').style.display="NONE";
	}

	function choose_employee(){
	var choose = document.querySelector('#choose_emp').value;

	if(choose == 'c'){
		document.querySelector('#emp-id').style.display="None";
	}else if(choose == 'd'){
		document.querySelector('#emp-id').style.display="FLEX";
	}

}
		

</script>
</html>