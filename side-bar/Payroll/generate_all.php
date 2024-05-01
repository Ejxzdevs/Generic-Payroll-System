<?php 

include "../../connection/connection.php";

date_default_timezone_set('Asia/Manila');
$current_date = date("F d Y");

$payroll_id = $_GET['payroll_id'];

$select_payroll = "SELECT * FROM tbl_payroll_list WHERE Payroll_ID = $payroll_id";
$query_payroll = mysqli_query($conn,$select_payroll);
$fetch_date = mysqli_fetch_assoc($query_payroll);

$start = $fetch_date['Payroll_Start'];

$end = $fetch_date['Payroll_End'];

$emp_type = $fetch_date['Payroll_Emp_Type'];

// setup employee ex regular

$select_all_id = "SELECT * FROM (SELECT * FROM tbl_employees_information WHERE Employee_Types = '$emp_type') tbl_employees_information INNER JOIN (SELECT * FROM tbl_time_entries WHERE Date_Attendance BETWEEN '$start' AND '$end' GROUP BY Employees_ID) tbl_time_entries on tbl_employees_information.Employees_ID = tbl_time_entries.Employees_ID";
$query_id = mysqli_query($conn,$select_all_id);
$result_id = mysqli_fetch_assoc($query_id);


// update status to generated
$udpate_generate = mysqli_query($conn,"UPDATE tbl_payroll_list SET `Payroll_Status`= 'Generated' WHERE Payroll_ID = $payroll_id");
// emp id individual

error_reporting(0);

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title></title>
	<link rel="stylesheet" type="text/css" href="content.css">
	<link rel="stylesheet" type="text/css" href="generate_print.css">
</head>
<body>
	<div class="generate-container" id="generate-container">
		<div class="pay_header" id="btn-generate">
			<div class="row-btn">
				<a id="btn-print-generate" href="print_payslip.php?payroll_id=<?php echo $payroll_id; ?>" style="background: green; color:white;" >Proceed</a>
			</div>
			<div class="row-btn">
				<a  id="btn-print-generate" href="download_all_payslip.php?payroll_id=<?php echo $payroll_id; ?>" style="background: crimson; color: white;" >Download</a>
			</div>
			
		</div>
		<div class="pay_body" id="body-generate">
			<div class="scroll-div">
<?php do{ 
// loop all

$id = $result_id['Employees_ID'];

$pay_ind_emp = "SELECT * FROM (SELECT Employee_Types,Employees_ID,@did:= Department_ID,
	(SELECT `Department_Name` FROM tbl_department WHERE Department_ID = @did) as Department_Name,
	@pid:= Position_ID,
		(SELECT `Position_Name` FROM tbl_position WHERE Position_ID = @pid) as Position_Name

 FROM tbl_employees_information WHERE Employees_ID = $id)tbl_employees_information INNER JOIN (SELECT * FROM tbl_personal_information WHERE Employees_ID = $id)tbl_personal_information ON tbl_employees_information.Employees_ID = tbl_personal_information.Employees_ID JOIN (SELECT *,SUM(Daily_Salary) as total_salary,SUM(Regular_Salary) as Basic_Pay,SUM(Ot_Salary) as overtime_pay
 ,SUM(Late_D) as total_late_deduction,SUM(Undertime_D) as total_undertime_deduction FROM tbl_salary_earning WHERE Earning_Date BETWEEN '$start' AND '$end'AND Employees_ID = $id )tbl_salary_earning ON tbl_personal_information.Employees_ID = tbl_salary_earning.Employees_ID 
INNER JOIN (SELECT Employees_ID,count(Date_Attendance) as workdays FROM tbl_time_entries WHERE Date_Attendance BETWEEN '$start' AND '$end'AND Employees_ID = $id GROUP BY Employees_ID) tbl_time_entries ON
tbl_salary_earning.Employees_ID = tbl_time_entries.Employees_ID ";
$query_pay_ind_emp = mysqli_query($conn,$pay_ind_emp);
$result_pay_ind_emp = mysqli_fetch_assoc($query_pay_ind_emp); 

$total_tardiness = $result_pay_ind_emp['total_late_deduction'] + $result_pay_ind_emp['total_undertime_deduction'];

// company info

		$select_company_info = "SELECT `ID`, `LOGO`, `System_Name`, `Company_Name`, `State`, `City`, `Zipcode`, `Street`, `Building_Number` FROM `tbl_company_information` order by ID DESC";
		$query_company_info = mysqli_query($conn,$select_company_info);
		$res = mysqli_fetch_assoc($query_company_info);
// allowance
// allowance of ind emp

		$select_allowance = "SELECT * FROM (SELECT Employees_ID,@aid:= Allowance_ID as Allowance_ID,
		(SELECT `Allowance_Name` from tbl_allowance_list Where Allowance_ID = @aid ) as Allowance_Name,
		(SELECT `Allowance_Value` from tbl_allowance_list Where Allowance_ID = @aid) as Allowance_Value 
			FROM tbl_allowance_emp WHERE Employees_ID = $id AND Allowance_Status = 'Enable') tbl_allowance_emp ";
		$query_allowance = mysqli_query($conn,$select_allowance);
		
// total allowance

	$select_total_allowance =  "SELECT * FROM (SELECT Employees_ID,@aid:= Allowance_ID as Allowance_ID,
		(SELECT `Allowance_Name` from tbl_allowance_list Where Allowance_ID = @aid ) as Allowance_Name,
		(SELECT `Allowance_Value` from tbl_allowance_list Where Allowance_ID = @aid) as Allowance_Value 
			FROM tbl_allowance_emp WHERE Employees_ID = $id AND Allowance_Status = 'Enable') tbl_allowance_emp "; 
	$query_total_allowance = mysqli_query($conn,$select_total_allowance);

	$total_a = 0;
	WHILE($result_total_allowance=mysqli_fetch_assoc($query_total_allowance)){
		$total_a += $result_total_allowance['Allowance_Value'];
	}

	$gross_salary = $total_a + $result_pay_ind_emp['total_salary'];
// deduction
	$select_deduction = "SELECT * FROM (SELECT Employees_ID,@did:= Deduction_ID as Deduction_ID,
		(SELECT `Deduction_Name` from tbl_deductions_list Where Deduction_ID = @did ) as Deduction_Name,
		(SELECT `Deduction_Value` from tbl_deductions_list Where Deduction_ID = @did) as Deduction_Value 
			FROM tbl_deduction_emp WHERE Employees_ID = $id AND Deduction_Status = 'Enable') tbl_deduction_emp ";
		$query_deduction = mysqli_query($conn,$select_deduction);


// total deducton
		$select_total_deduction = "SELECT * FROM (SELECT Employees_ID,@did:= Deduction_ID as Deduction_ID,
		(SELECT `Deduction_Name` from tbl_deductions_list Where Deduction_ID = @did ) as Deduction_Name,
		(SELECT `Deduction_Value` from tbl_deductions_list Where Deduction_ID = @did) as Deduction_Value 
			FROM tbl_deduction_emp WHERE Employees_ID = $id AND Deduction_Status = 'Enable') tbl_deduction_emp ";
		$query_total_deduction = mysqli_query($conn,$select_total_deduction);
		$total_d = 0; 
			WHILE($result_total_deduction=mysqli_fetch_assoc($query_total_deduction)){
		$total_d += $result_total_deduction['Deduction_Value'];
	}
//  select tax

		$select_tax = "SELECT * FROM (SELECT Employees_ID,@tid:= Tax_ID as Tax_ID,
			(SELECT `Tax_Name` from tbl_tax_list WHERE Tax_ID = @tid ) as Tax_Name,
			(SELECT `Employee_Share` from tbl_tax_list WHERE Tax_ID = @tid) as Employee_Share
		FROM tbl_tax_emp WHERE Employees_ID = $id AND Tax_Status = 'Enable') tbl_tax_emp
		";
		$query_tax = mysqli_query($conn,$select_tax); 


// total_tax pay
		$select_total_tax = "SELECT * FROM (SELECT Employees_ID,@tid:= Tax_ID as Tax_ID,
			(SELECT `Tax_Name` from tbl_tax_list WHERE Tax_ID = @tid ) as Tax_Name,
			(SELECT `Employee_Share` from tbl_tax_list WHERE Tax_ID = @tid) as Employee_Share
		FROM tbl_tax_emp WHERE Employees_ID = $id AND Tax_Status = 'Enable') tbl_tax_emp
		";
		$query_total_tax = mysqli_query($conn,$select_total_tax); 
		$total_t = 0;
		WHILE($result_total_tax=mysqli_fetch_assoc($query_total_tax)){
			$total_t += $result_total_tax['Employee_Share'];
		}

		$total_tax_d = (($gross_salary/100)*$total_t);

		$final_deduction = $total_tax_d + $total_d + $total_tardiness;
		

// NET SALARY
		$net_salary = $gross_salary - $final_deduction;

?>
			<div class="body_content" id="print-section">
				<div class="head-payslip">
					<div class="logo">
						<!-- <img id="LOGO" src="../../user-entry/Company_Logo/<?php echo $res['LOGO'];  ?> "> -->
					</div>
					<div class="address">
						<p id="Company_Name"><?php echo $res['Company_Name']; ?></p>
						<p id="address"><?php echo $res['State'] . " " . $res['City'] . " " . $res['Street'] . " " . $res['Building_Number']; ?></p>
					</div>
				</div>
				
				<div class="body-payslip">
					<div class="emp_info">
						<div class="row_emp_info">
							<label>Name: <span><?php echo $result_pay_ind_emp['First_Name'] . " " . $result_pay_ind_emp['Last_Name']; ?></span></label>
							<label>Department: <span><?php echo $result_pay_ind_emp['Department_Name']; ?></span></label>
							<label>Position: <span><?php echo $result_pay_ind_emp['Position_Name']; ?></span></label>


						</div>
						<div class="row_emp_info">
							<label>Type: <span><?php echo $emp_type; ?></span></label>
							<label>Worked Days: <span><?php echo $result_pay_ind_emp['workdays']; ?></span></label>
							<label>Date Pay: <span><?php echo $current_date; ?></span></label>
						

						</div>
						<div class="row_emp_info" >
							<label>Period: <span><?php echo $start . " - " . $end; ?></span></label>	
						</div>
					</div>
					<div class="salary_header">
						<div class="title">
						<label>EARNINGS</label>
						</div>
						<div class="title">
						<label>DEDUCTIONS</label>
						</div>
					</div>
					<div class="salary_info">
						<div class="earnings">
							<div class="earning_rows">
								<div class="description">
								<p>Basic Pay</p>
								</div>
								<div class="amount">
									<p><?php echo $result_pay_ind_emp['Basic_Pay']; ?></p>
								</div>
							</div>
							<div class="earning_rows">
								<div class="description">
								<p>Overtime Pay</p>
								</div>
								<div class="amount">
									<p><?php echo $result_pay_ind_emp['overtime_pay']; ?></p>
								</div>
							</div>
						<?php WHILE($result_allowance = mysqli_fetch_assoc($query_allowance)){ ?>
							<div class="earning_rows">
								<div class="description">
								<p><?php echo $result_allowance['Allowance_Name']; ?></p>
								</div>
								<div class="amount">
									<p><?php echo $result_allowance['Allowance_Value']; ?></p>
								</div>
							</div>
						<?php }?>
							
							
					
							
						</div>
						<div class="deductions">
							<div class="deduction_rows">
								<div class="description">
									<p>Tardiness</p>
								</div>
								<div class="amount">
									<p><?php echo $total_tardiness; ?></p>
								</div>
							</div>

								<?php WHILE($result_deduction = mysqli_fetch_assoc($query_deduction)){ ?>
							<div class="deduction_rows">
								<div class="description">
									<p><?php echo $result_deduction['Deduction_Name']; ?></p>
								</div>
								<div class="amount">
									<p><?php echo $result_deduction['Deduction_Value']; ?></p>
								</div>
							</div>
							<?php }?>
							<?php WHILE($result_tax = mysqli_fetch_assoc($query_tax)){ ?>
							<div class="deduction_rows">
								<div class="description">
									<p><?php echo $result_tax['Tax_Name']; ?></p>
								</div>
								<div class="amount">
									<p><?php echo (($gross_salary/100)*$result_tax['Employee_Share']); ?></p>
								</div>
							</div>
							<?php } ?>
							<div class="deduction_rows">
								<div class="description">
									<p>Total Deductions</p>
								</div>
								<div class="amount">
									<p><?php echo $final_deduction; ?></p>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="footer-total">
					<div class="Gross">
						<p>Gross Salary: <span> <?php echo $gross_salary; ?></span></p>
					</div>
					<div class="Net">
						<p>Net Salary: <span><?php echo $net_salary; ?></span> </p>
					</div>
				</div>
			
			</div>
			<?php }WHILE($result_id=$query_id->fetch_assoc()); ?>



			</div>





		</div>
		


	</div>
</body>
	<script type="text/javascript" src="generate.js"></script>
</html>
