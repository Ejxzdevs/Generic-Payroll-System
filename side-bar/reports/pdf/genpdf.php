<?php 
session_start();
include "../connection/connection.php";
require('fpdf.php');


date_default_timezone_set('Asia/Manila');
$date = date("Y-m-d");
// $sql = "SELECT * FROM tbl_employees_information inner join  tbl_personal_information ON tbl_employees_information.Employees_ID = tbl_personal_information.Employees_ID";
// $query = mysqli_query($conn,$sql);
// $employee=$query->fetch_assoc();
// error_reporting(0);
$pdf = new FPDF(orientation:'p',unit:'mm',size:'a4');
$pdf->SetFont(family:'arial',style:'',size:'8');
$query=mysqli_query($conn,"SELECT tbl_employees_information.Employees_ID,tbl_employees_information.Job_Department,tbl_employees_information.Position, tbl_personal_information.First_Name,tbl_personal_information.Last_Name, SUM(tbl_salary_earning.Daily_Salary) as Gross_Salary ,SUM(tbl_salary_earning.Basic_Salary) as Basic_Salary,SUM(tbl_salary_earning.Ot_Salary) as Ot_Salary, count(Earning_Date)  as Work_Days from tbl_employees_information 
							inner join tbl_personal_information on tbl_employees_information.Employees_ID = tbl_personal_information.Employees_ID
							inner join tbl_salary_earning on tbl_personal_information.Employees_ID = tbl_salary_earning.Employees_ID 
							GROUP BY tbl_employees_information.Employees_ID ");
while ($data=mysqli_fetch_array($query)) {

$pdf->AddPage();
$pdf->cell(180,4,'Paycon Inc.',0,1,'C');
$pdf->cell(180,8,'Prenza Marilao Bulacan',0,1,'C');
$pdf->ln(4);

$pdf->cell(80,4,"Employee Name: " . $data['First_Name'] . " " .$data['Last_Name'] ,0,0,'L');
$pdf->cell(80,4,'Date: ',0,0,'L');
$pdf->cell(40,4,'Leave: ',0,1,'L');


$pdf->cell(80,4,"Employee ID: " . $data['Employees_ID'],0,0,'L');
$pdf->cell(40,4,'Worked Days: ' . $data['Work_Days'],0,1,'L');


$pdf->cell(80,4,'Department: ' . $data['Job_Department'],0,0,'L');
$pdf->cell(40,4,'Date Pays: ' . $date,0,1,'L');

$pdf->cell(80,4,'Position: ' . $data['Position'] ,0,1,'L');

$pdf->ln(8);
$pdf->cell(90,6,'Earnings ',1,0,'C');
$pdf->cell(90,6,'Deductions ',1,1,'C');

$pdf->cell(90,6,'Basic Salary ' . $data['Basic_Salary'],1,0,'L');
$pdf->cell(90,6,'SSS: '."500",1,1,'L');
$pdf->cell(90,6,'OT: '. $data['Ot_Salary'],1,0,'L');
$pdf->cell(90,6,'PHILHEALTH '."500",1,1,'L');
$pdf->cell(90,6,'',1,0,'L');
$pdf->cell(90,6,'PAG-IBIG: ' ."500",1,1,'L');
$pdf->cell(90,6,'GROSS-SALARY: '. $data['Gross_Salary'],1,0,'L');
$pdf->cell(90,6,'TOTAL-DEDUCTION: ' . "1500" ,1,1,'L');
$pdf->cell(180,6,'NET-SALARY: ' . $data['Gross_Salary'] - 1500,1,0,'C');

}
$pdf->Output("payslip.php", "I");


// type of output
// D FOR DOWDLOAD
// I for viewtype also can change the ext. it can be .php for view type , .pdf view in browser

?>

