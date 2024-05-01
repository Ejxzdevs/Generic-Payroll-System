<?php 
include "../../connection/connection.php";
require('pdf/fpdf.php');

$select_company_info = "SELECT `ID`, `LOGO`, `System_Name`, `Company_Name`, `State`, `City`, `Zipcode`, `Street`, `Building_Number` FROM `tbl_company_information` order by ID DESC";
$query_company_info = mysqli_query($conn,$select_company_info);
$res = mysqli_fetch_assoc($query_company_info);


	$select_all_emp = "SELECT * FROM
		(SELECT Employee_Types,Employees_ID,Daily_Rate,@did:= Department_ID,
	(SELECT `Department_Name` FROM tbl_department WHERE Department_ID = @did) as Department_Name,
	@pid:= Position_ID,
		(SELECT `Position_Name` FROM tbl_position WHERE Position_ID = @pid) as Position_Name

 FROM tbl_employees_information)tbl_employees_information INNER JOIN 
		(SELECT * FROM tbl_personal_information) tbl_personal_information ON tbl_employees_information.Employees_ID = tbl_personal_information.Employees_ID 
		INNER JOIN (SELECT Employees_ID,Earning_Date,sum(Regular_Salary) as all_salary FROM tbl_salary_earning WHERE Earning_Date BETWEEN '2023-01-01' AND '2023-12-30' GROUP BY Employees_ID)tbl_salary_earning ON tbl_personal_information.Employees_ID = tbl_salary_earning.Employees_ID";
		$query_all_emp = mysqli_query($conn,$select_all_emp);
		$fetch_all_emp = mysqli_fetch_assoc($query_all_emp);


		$pdf = new FPDF(orientation:'p',unit:'mm',size:'a4');
		$pdf->SetFont(family:'arial',style:'',size:'8');


		DO{

		$pdf->AddPage();
		$pdf->SetFont('Arial', 'B', 16);
		$pdf->cell(190,10,$res['Company_Name'],0,1,'C');
		$pdf->SetFont('Arial', '', 12);
		$pdf->cell(190,10,$res['State'] . " " . $res['City'] . " " . $res['Street'] . " " . $res['Building_Number'],0,1,'C');
		$pdf->ln(8);


		$pdf->cell(190,8,'Name: ' .$fetch_all_emp['First_Name'] . " " . $fetch_all_emp['Last_Name'] ,'',1,'L');
		$pdf->cell(190,8,'Department: ' .$fetch_all_emp['Department_Name'],'',1,'L');
		$pdf->cell(190,8,'Position: ' .$fetch_all_emp['Position_Name'],'',1,'L');
		$pdf->cell(95,10,'','',1,'C');
		$pdf->SetFont('Arial','B', 12);
		$pdf->cell(95,10,'Description','TLBR',0,'C');
		$pdf->SetFont('Arial','B', 12);
		$pdf->cell(95,10,'Amount','TRB',1,'C');
		$pdf->SetFont('Arial','', 12);
		$pdf->cell(95,10,'Daily Rate','RL',0,'C');
		$pdf->cell(95,10,''.$fetch_all_emp['Daily_Rate'],'R',1,'C');
		$pdf->cell(95,10,'Monthly Rate','RL',0,'C');
		$pdf->cell(95,10,''.intval($fetch_all_emp['all_salary']/12),'R',1,'C');
		$pdf->cell(95,10,'','RL',0,'C');
		$pdf->cell(95,10,'','R',1,'C');
		$pdf->cell(95,10,'','RL',0,'C');
		$pdf->cell(95,10,'','R',1,'C');
		$pdf->cell(95,10,'','RL',0,'C');
		$pdf->cell(95,10,'','R',1,'C');
		$pdf->SetFont('Arial','B', 12);
		$pdf->cell(95,10,'13MONTH PAY','RLB',0,'C');
		$pdf->cell(95,10,''.intval($fetch_all_emp['all_salary']/12),'RB',1,'C');
		$pdf->cell(95,10,'','',1,'C');
		$pdf->ln(8);
		$pdf->cell(95,10,'','',0,'C');
		$pdf->cell(95,10,'','B',1,'C');
		$pdf->cell(95,10,'','',0,'C');
		$pdf->cell(95,10,'Employee Signature','',1,'C');

		}WHILE($fetch_all_emp=$query_all_emp->fetch_assoc());


		$filename = "C:/xampp/htdocs/payroll/side-bar/payroll/payslip/salary.pdf";
		$pdf->output('D' , $filename, TRUE);

		// header('Content-type:application/pdf');
		// header('Contebt-Description: inline;filename="' .$filename.  '"');
		// header('Content-Transfer-Encoding:binary');
		// header('Accept-ranges:bytes');
		// @readfile($filename);



?>