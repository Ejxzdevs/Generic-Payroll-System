<?php 
include "../../connection/connection.php";

$select_paid_payroll = "SELECT * FROM `tbl_payroll_list` WHERE Payroll_Status = 'Paid'";
$query_paid = mysqli_query($conn,$select_paid_payroll);
$res_paid = mysqli_fetch_assoc($query_paid);

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
			<label>Payroll Record</label>
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
				<?php do{ if(isset($res_paid['Payroll_ID'])){ ?>
				<tbody>
					<tr>
						<td><?php echo $res_paid['Payroll_ID']; ?></td>
						<td style="width:400px;"><?php echo $res_paid['Payroll_Start'] . " - " . $res_paid['Payroll_End']; ?></td>
						<td></td>
						<td><?php echo $res_paid['Payroll_Date']; ?></td>
						<td><?php echo $res_paid['Payroll_Emp_Type']; ?></td>
						<td><?php echo $res_paid['Payroll_Status']; ?></td>
						<td><a href="record_view_emp_layout.php?payroll_id=<?php echo $res_paid['Payroll_ID']?>"><img id="view-icon" src="../../icons/view-action.svg"></a></td>
						
					</tr>
				</tbody>
			<?php } }while($res_paid=$query_paid->fetch_assoc()); ?>
			</table>
			</div>
		</div>
		<!-- footer -->
		<div class="payroll-footer">
			
		</div>




	</div>
</body>
</html>