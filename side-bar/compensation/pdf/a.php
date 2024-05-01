<?php 
session_start();
include "../connection/connection.php";
require('fpdf.php');

// $sql = "SELECT * FROM tbl_employees_information inner join  tbl_personal_information ON tbl_employees_information.Employees_ID = tbl_personal_information.Employees_ID";
// $query = mysqli_query($conn,$sql);
// $employee=$query->fetch_assoc();
// error_reporting(0);
$pdf = new FPDF(orientation:'p',unit:'mm',size:'a4');
$pdf->SetFont(family:'arial',style:'',size:'8');


$pdf->AddPage();
$pdf->cell(180,4,'Paycon Inc.',0,1,'C');
$pdf->cell(180,8,'Prenza Marilao Bulacan',0,1,'C');
$pdf->ln(4);

$pdf->cell(80,4,"Employee Name: " ,0,0,'L');
$pdf->cell(80,4,'Date: ',0,0,'L');
$pdf->cell(40,4,'Leave: ',0,1,'L');


$pdf->cell(80,4,"Employee ID: ",0,0,'L');
$pdf->cell(40,4,'Worked Days: ',0,1,'L');


$pdf->cell(80,4,'Department: ',0,0,'L');
$pdf->cell(40,4,'Date Pays: ',0,1,'L');

$pdf->cell(80,4,'Position: ',0,1,'L');

$pdf->ln(8);
$pdf->cell(90,6,'Earnings ',1,0,'C');
$pdf->cell(90,6,'Deductions ',1,1,'C');

$pdf->cell(90,6,'Basic Salary ',1,0,'L');
$pdf->cell(90,6,'SSS ',1,1,'L');
$pdf->cell(90,6,'OT ',1,0,'L');
$pdf->cell(90,6,'PHILHEALTH ',1,1,'L');
$pdf->cell(90,6,'',1,0,'L');
$pdf->cell(90,6,'PAG-IBIG ',1,1,'L');
$pdf->cell(90,6,'GROSS-SALARY ',1,0,'L');
$pdf->cell(90,6,'TOTAL-DEDUCTION ',1,1,'L');
$pdf->cell(180,6,'NET-SALARY: ',1,0,'C');


$pdf->Output('ok.php','I');


// type of output
// D FOR DOWDLOAD
// I for viewtype also can change the ext. it can be .php for view type , .pdf view in browser

?>

