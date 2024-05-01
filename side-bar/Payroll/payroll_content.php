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
			<form method="POST" action="payroll_layout.php">
				<input type="date" name="start">
				<input type="date" name="end">
				<button type="submit" name="filter_payroll">FILTER</button>
			</form>
		</div>
		<!-- body -->
		<div class="payroll-body">
		<div class="table-content">
			<table>
				<thead>
					<tr>
						<th>ID</th>
						<th colspan="2">Interval Date</th>
						<th>Pay Date</th>
						<th>Employee Type</th>
						<th>Status</th>
						<th>Action</th>
					</tr>
				</thead>
				<?php do{ if(isset($result_payroll['Payroll_ID'])){?>
				<tbody>
					<tr>
						<td><?php echo $result_payroll['Payroll_ID']; ?></td>
						<td style="width:400px;"><?php echo date("M-d-Y",strtotime($result_payroll['Payroll_Start'])) . " - " . date("M-d-Y",strtotime($result_payroll['Payroll_End'])) ; ?></td>
						<td></td>
						<td><?php echo date("M-d-Y",strtotime($result_payroll['Payroll_Date'])) ; ?></td>
						<td><?php echo $result_payroll['Payroll_Emp_Type']; ?></td>
						<td><?php echo $result_payroll['Payroll_Status']; ?></td>
						<td><a id="btn-Run-payroll" href="prepare_payroll_layout.php?payroll_id=<?php echo $result_payroll['Payroll_ID']; ?>">Run Payroll</a></td>
					</tr>
				</tbody>
			<?php } }while($result_payroll=$query_display_payroll->fetch_assoc()); ?>
			</table>
			</div>
		</div>
		<!-- footer -->
		<div class="payroll-footer">
			
		</div>




	</div>
</body>
</html>