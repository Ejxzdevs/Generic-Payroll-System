<?php 
include "../../connection/connection.php";

$payroll_id = $_GET['payroll_id'];

$select_paid_payroll = "SELECT * FROM `tbl_payroll_list` WHERE Payroll_ID = $payroll_id";
$query_paid = mysqli_query($conn,$select_paid_payroll);
$res_paid = mysqli_fetch_assoc($query_paid);

$start  = $res_paid['Payroll_Start'];
$end =  $res_paid['Payroll_End'];
$type = $res_paid['Payroll_Emp_Type'];

$select_emp_paid = "SELECT * FROM 
(SELECT * FROM tbl_employees_information WHERE Employee_Types = '$type') tbl_employees_information 
INNER JOIN 
(SELECT * FROM tbl_personal_information)tbl_personal_information on
tbl_employees_information.Employees_ID = tbl_personal_information.Employees_ID
INNER JOIN
(SELECT * FROM tbl_salary_earning WHERE Earning_Date BETWEEN '$start' AND '$end' GROUP BY Employees_ID) tbl_salary_earning on tbl_personal_information.Employees_ID = tbl_salary_earning.Employees_ID";
$query_emp_paid = mysqli_query($conn,$select_emp_paid);
$fetch_paid = mysqli_fetch_assoc($query_emp_paid);

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
			<label><?php echo date('F d Y',strtotime($res_paid['Payroll_Date'])); ?></label>
		</div>
		<!-- body -->
		<div class="payroll-body">
		<div class="table-content">
			<table>
				<thead >
					<tr >
						<th>ID</th>
						<th >Name</th>
						<th style="width:400px;" >Date Interval</th>
			
						<th>Status</th>
					</tr>
				</thead>
			<?php do{ ?>
				<tbody>
					<tr>
						<td><?php echo $fetch_paid['Employees_ID']; ?></td>
						<td><?php echo $fetch_paid['First_Name'] . " " . $fetch_paid['Last_Name']; ?> </td>
						<td><?php echo date('F d Y',strtotime($start)) . " - " . date('F d Y',strtotime($end)); ?></td>
						<td><a href="download_payslip.php?id=<?php echo $fetch_paid['Employees_ID'];?>&payroll_id=<?php echo $payroll_id; ?>"><img id="pdf-icon" src="../../icons/pdf.png">
							<a href="print_ind_payslip.php?id=<?php echo $fetch_paid['Employees_ID'];?>&payroll_id=<?php echo $payroll_id; ?>"><img id="view-icon" src="../../icons/view-action.svg"></a></td>
						
					</tr>
				</tbody>
			<?php }while($fetch_paid=$query_emp_paid->fetch_assoc()); ?>
			</table>
			</div>
		</div>
		<!-- footer -->
		<div class="payroll-footer" id="record_view_footer_emp">
			<a id="btn-back" href="record_layout.php">Back</a>
		</div>




	</div>
</body>
</html>