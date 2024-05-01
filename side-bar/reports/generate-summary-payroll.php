<?php 
session_start();
include "../../connection/connection.php";
require('pdf/fpdf.php');
date_default_timezone_set('Asia/Manila');
$current_date = date("F d Y");
$date_generated = date('Y-m-d');

if(isset($_POST['btn-report'])){

$choose_report = $_POST['select_report'];


if($choose_report == 'earning_summary'){

$payroll_id = $_POST['payroll_date'];
$copy = $_POST['type_of_copy'];

$select_all = "SELECT * FROM `tbl_payroll_list` WHERE Payroll_ID = $payroll_id";
$query_all = mysqli_query($conn,$select_all);
$result_all = mysqli_fetch_assoc($query_all);

$start = $result_all['Payroll_Start'];
$end = $result_all['Payroll_End'];



$pdf = new FPDF(orientation:'L',unit:'mm',size:'a4');
$pdf->SetFont(family:'arial',style:'',size:'8');

// company info

$select_company_info = "SELECT `ID`, `LOGO`, `System_Name`, `Company_Name`, `State`, `City`, `Zipcode`, `Street`, `Building_Number` FROM `tbl_company_information` order by ID DESC";
$query_company_info = mysqli_query($conn,$select_company_info);
$res = mysqli_fetch_assoc($query_company_info);

$pdf->AddPage();
$pdf->SetFont('Arial','', 12);
$pdf->cell(280,8,"Company Name: ". $res['Company_Name'],0,1,'L');
$pdf->SetFont('Arial', '', 12);
$pdf->cell(280,8,"Address: " . $res['State'] . " " . $res['City'] . " " . $res['Street'] . " " . $res['Building_Number'],0,1,'L');
$pdf->ln(20);
$pdf->SetFont('Arial','B', 18);
$pdf->cell(280,8,"SUMMARY EARNINGS REPORT",0,1,'C');
$pdf->ln(10);
$pdf->SetFont('Arial','',12);
$pdf->cell(280,6,"ID: " . $payroll_id,0,1,'L');
$pdf->cell(280,6,"Date: " . $start . " - " . $end ,0,1,'L');
$pdf->ln(5);


// header table
$pdf->SetFont('Arial', 'B', 10);
$pdf->cell(20,8,"ID",1,0,'C');
$pdf->cell(60,8,"Name",1,0,'C');
$pdf->cell(40,8,"Department",1,0,'C');
$pdf->cell(40,8,"Allowances",1,0,'C');
$pdf->cell(40,8,"Deductions",1,0,'C');
$pdf->cell(40,8,"Gross Salary",1,0,'C');
$pdf->cell(40,8,"Net Salary",1,1,'C');

$select_reports = " SELECT * FROM 
(SELECT Employees_ID,@did:= Department_ID,
(SELECT `Department_Name` FROM tbl_department WHERE Department_ID = @did) as Department_Name
 FROM tbl_employees_information) tbl_employees_information
INNER JOIN 
(SELECT * FROM tbl_personal_information) tbl_personal_information 
ON tbl_employees_information.Employees_ID = tbl_personal_information.Employees_ID 
INNER JOIN 
(SELECT * FROM tbl_salary_record WHERE Payroll_ID = $payroll_id ) tbl_salary_record ON tbl_personal_information.Employees_ID = tbl_salary_record.Employees_ID ";
$query_reports = mysqli_query($conn,$select_reports);
$fetch_reports = mysqli_fetch_assoc($query_reports);

do {
$pdf->cell(20,8,"" . $fetch_reports['Employees_ID'] ,1,0,'C');
$pdf->cell(60,8,"" . $fetch_reports['First_Name'] . " "  . $fetch_reports['Last_Name'],1,0,'C');
$pdf->cell(40,8,"" . $fetch_reports['Department_Name'],1,0,'C');
$pdf->cell(40,8,"".$fetch_reports['Total_Allowances'] ,1,0,'C');
$pdf->cell(40,8,"" .$fetch_reports['Total_Deductions'] ,1,0,'C');
$pdf->cell(40,8,"".$fetch_reports['Net_Salary'] ,1,0,'C');
$pdf->cell(40,8,"".$fetch_reports['Gross_Salary'],1,1,'C');





}while($fetch_reports=$query_reports->fetch_assoc());



if($copy == 'P'){

$filename = "reports/report.pdf";
$pdf->output('F',$filename, TRUE);

header('Content-type:application/pdf');
header('Contebt-Description: inline;filename="' .$filename.  '"');
header('Content-Transfer-Encoding:binary');
header('Accept-ranges:bytes');
@readfile($filename);

}elseif($copy == 'DF'){

$pdf->output('D','report_earning.pdf');

}


$record_report = "INSERT INTO `tbl_reports`(`Report_Type`,`Date_Generated`) VALUES ('Payroll Summary','$date_generated')";
$query_report = mysqli_query($conn,$record_report);



}else{
    echo "panget";
}







}



?>