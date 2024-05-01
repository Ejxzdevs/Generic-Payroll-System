<?php 
session_start();
include "../../../connection/connection.php";
require('pdf/fpdf.php');
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

$select_all_id = "SELECT * FROM tbl_employees_information WHERE Employee_Types = '$emp_type'";
$query_id = mysqli_query($conn,$select_all_id);
$result_id = mysqli_fetch_assoc($query_id);

$pdf = new FPDF(orientation:'p',unit:'mm',size:'a4');
$pdf->SetFont(family:'arial',style:'',size:'8');



$id = $_GET['id'];

$pay_ind_emp = "SELECT * FROM (SELECT Employee_Types,Employees_ID,@did:= Department_ID,
	(SELECT `Department_Name` FROM tbl_department WHERE Department_ID = @did) as Department_Name,
	@pid:= Position_ID,
		(SELECT `Position_Name` FROM tbl_position WHERE Position_ID = @pid) as Position_Name

 FROM tbl_employees_information WHERE Employees_ID = $id)tbl_employees_information INNER JOIN (SELECT * FROM tbl_personal_information WHERE Employees_ID = $id)tbl_personal_information ON tbl_employees_information.Employees_ID = tbl_personal_information.Employees_ID INNER JOIN (SELECT *,SUM(Daily_Salary) as total_salary,SUM(Regular_Salary) as Basic_Pay,SUM(Ot_Salary) as overtime_pay FROM tbl_salary_earning WHERE Earning_Date BETWEEN '$start' AND '$end'AND Employees_ID = $id )tbl_salary_earning ON tbl_personal_information.Employees_ID = tbl_salary_earning.Employees_ID 
INNER JOIN (SELECT Employees_ID,count(Date_Attendance) as workdays FROM tbl_time_entries WHERE Date_Attendance BETWEEN '$start' AND '$end'AND Employees_ID = $id GROUP BY Employees_ID) tbl_time_entries ON
tbl_salary_earning.Employees_ID = tbl_time_entries.Employees_ID ";
$query_pay_ind_emp = mysqli_query($conn,$pay_ind_emp);
$result_pay_ind_emp = mysqli_fetch_assoc($query_pay_ind_emp); 



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

		$final_deduction = $total_tax_d + $total_d;
		

// NET SALARY
		$net_salary = $gross_salary - $final_deduction;


// 




$pdf->AddPage();
$pdf->SetFont('Arial', 'B', 16);
$pdf->cell(190,10,$res['Company_Name'],0,1,'C');
$pdf->SetFont('Arial', '', 12);
$pdf->cell(190,10,$res['State'] . " " . $res['City'] . " " . $res['Street'] . " " . $res['Building_Number'],0,1,'C');
$pdf->ln(8);


$pdf->cell(70,8,"Employee Name: " . $result_pay_ind_emp['First_Name'] . " " . $result_pay_ind_emp['Last_Name'] ,0,0,'L');
$pdf->cell(60,8,"Type: ". $emp_type   ,0,0,'L');
$pdf->cell(60,8,"Period: " . $start . " - " . $end  ,0,1,'L');

$pdf->cell(70,8,"Department: " . $result_pay_ind_emp['Department_Name'] ,0,0,'L');
$pdf->cell(60,8,"Worked days: ". $result_pay_ind_emp['workdays'],0,1,'L');

$pdf->cell(70,8,"Position: " . $result_pay_ind_emp['Position_Name'] ,0,0,'L');
$pdf->cell(60,8,"Date pay: ". $current_date,0,1,'L');

$pdf->ln(5);
$pdf->SetFont('Arial', 'B', 12);
$pdf->cell(190,12,"Earnings"  ,1,1,'C');
$pdf->SetFont('Arial', '', 10);
$pdf->cell(95,10,"Basic Salary: "  ,'L',0,'C');
$pdf->cell(95,10," " . $result_pay_ind_emp['Basic_Pay']  ,'LR',1,'C');
$pdf->cell(95,8,"Overtime Pay: "  ,'LR',0,'C');
$pdf->cell(95,8," " . $result_pay_ind_emp['overtime_pay']  ,'LR',1,'C');
WHILE($result_allowance = mysqli_fetch_assoc($query_allowance)){
$pdf->cell(95,8," " . $result_allowance['Allowance_Name']  ,'L',0,'C');
$pdf->cell(95,8," " . $result_allowance['Allowance_Value']  ,'LR',1,'C');
}

$pdf->SetFont('Arial', 'B', 10);
$pdf->cell(95,10,"Gross Salary: "  ,'TBL',0,'C');
$pdf->cell(95,10," " .$gross_salary  ,'TBR',1,'C');
$pdf->ln(10);
$pdf->SetFont('Arial', 'B', 12);
$pdf->cell(190,12,"Deductions"  ,1,1,'C');
$pdf->SetFont('Arial', '', 10);
WHILE($result_deduction = mysqli_fetch_assoc($query_deduction)){ 
$pdf->SetFont('Arial', '', 10);
$pdf->cell(95,10," " . $result_deduction['Deduction_Name']  ,'L',0,'C');
$pdf->cell(95,10," " . $result_deduction['Deduction_Value']  ,'LR',1,'C');
}
WHILE($result_tax = mysqli_fetch_assoc($query_tax)){
	$pdf->cell(95,10," " . $result_tax['Tax_Name']  ,'L',0,'C');
	$pdf->cell(95,10," " . (($gross_salary/100)*$result_tax['Employee_Share']) ,'LR',1,'C');
}
$pdf->SetFont('Arial', 'B', 10);
$pdf->cell(95,10,"Total Deductions: "  ,'TBL',0,'C');
$pdf->cell(95,10," " .$final_deduction ,'TBR',1,'C');
$pdf->ln(10);
$pdf->SetFont('Arial', 'B', 12);
$pdf->cell(95,10," "  ,0,0,'C');
$pdf->cell(95,8,"Net Salary: " . $net_salary  ,'B',0,'C');






// $filename = "payslip/salary.pdf";
// $pdf->output('F' , $filename, TRUE);
$pdf->output('Salary.pdf','D');

// header('Content-type:application/pdf');
// header('Contebt-Description: inline;filename="' .$filename.  '"');
// header('Content-Transfer-Encoding:binary');
// header('Accept-ranges:bytes');
// @readfile($filename);



?>



