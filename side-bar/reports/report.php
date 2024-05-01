<?PHP 
include "../../connection/connection.php";

$select_payroll_list = "SELECT * FROM `tbl_payroll_list` WHERE Payroll_Status = 'Paid'";
$query_payroll_list = mysqli_query($conn,$select_payroll_list);
$fetch_payroll_list = mysqli_fetch_assoc($query_payroll_list);

$select_reports = "SELECT * FROM `tbl_reports`";
$query_reports = mysqli_query($conn,$select_reports);
$fetch_reports = mysqli_fetch_assoc($query_reports);


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
			<label>Reports</label>
		</div>
		<!-- body -->
		<div class="payroll-body">
		<div class="table-content">
			<table>
				<thead>
					<tr>
						<th style="width:400px;">ID</th>
						<th style="width:400px;">Reports</th>
						<th style="width:400px" >Date Generated</th>
					</tr>
				</thead>
				<?php do{ ?>
				<tbody>
					<tr>
						<td><?php echo $fetch_reports['Report_ID']; ?></td>
						<td><?php echo $fetch_reports['Report_Type']; ?></td>
						<td><?php echo $fetch_reports['Date_Generated']; ?></td>		
					</tr>
				</tbody>
			<?php }while($fetch_reports=$query_reports->fetch_assoc()); ?>
	
			</table>
			</div>
		</div>
		<!-- footer -->
		<div class="payroll-footer">
			<a href="javascript: open_com();">Create Reports</a>
			
		</div>
		<div class="container-compensation">
			<div class="box-container">
				<div class="HEAD-B">
					<label>Generate Reports</label>
					<a href="javascript: close_slip();"><img id="close" src="../../icons/close.svg" ></a>	
				</div>
				<div class="Generate-body">
					<form action="generate-summary-payroll.php" method="POST" >
					<div class="row-generate">
						<select name="select_report" id="report" onchange="choose_reports();" >
							<option>Choose</option>
							<option value="earning_summary">Payroll Summary</option>
						</select>
					</div>
				
					<div class="row-generate" id="emp_report_salary" style="display: none;"   >
						<select name="payroll_date"  >
							<option>Choose Date</option>
						<?php do { ?>
							<option value="<?php echo $fetch_payroll_list['Payroll_ID'];  ?>"><?php echo $fetch_payroll_list['Payroll_Date']; ?></option>
						<?php }while($fetch_payroll_list=$query_payroll_list->fetch_assoc()); ?>
						</select>
					</div>
						<div class="row-generate">
						<select name="type_of_copy">
							<option value="DF">Download as PDF</option>
							<option value="P">Print</option>
						</select>
					</div>
					<div class="row-generate" id="btn-report">
						<button type="submit" name="btn-report">Generate</button>
					</div>
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




	function choose_reports(){
	var choose = document.querySelector('#report').value;

	if(choose == 'earning_summary'){
		document.querySelector('#emp_report_salary').style.display="FLEX";
	}else{
		document.querySelector('#emp_report_salary').style.display="NONE";
	}

}
	

</script>
</html>