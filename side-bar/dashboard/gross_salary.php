<?php 

include "../../connection/connection.php";

// JANUARY
$gross_jan = "SELECT Earning_Date, SUM(Daily_Salary) as jan_gross FROM tbl_salary_earning WHERE Earning_Date BETWEEN '2023-01-01' AND '2023-01-31'AND Salary_Status = 'Paid'";
$query_jan = mysqli_query($conn,$gross_jan);
$fetch_jan = mysqli_fetch_assoc($query_jan);

if($fetch_jan['jan_gross'] == 0){
  $jan = 0;
}else{
  $jan = $fetch_jan['jan_gross'];
}

// FEBRUARY

$gross_feb = "SELECT Earning_Date, SUM(Daily_Salary) as feb_gross FROM tbl_salary_earning WHERE Earning_Date BETWEEN '2023-02-01' AND '2023-02-28' AND Salary_Status = 'Paid'";
$query_feb = mysqli_query($conn,$gross_feb);
$fetch_feb = mysqli_fetch_assoc($query_feb);

if($fetch_feb['feb_gross'] == 0){
  $feb = 0;
}else{
  $feb = $fetch_feb['feb_gross'];
}

// MARCH

$gross_march = "SELECT Earning_Date, SUM(Daily_Salary) as march_gross FROM tbl_salary_earning WHERE Earning_Date BETWEEN '2023-02-01' AND '2023-02-28' AND Salary_Status = 'Paid'";
$query_march = mysqli_query($conn,$gross_march);
$fetch_march = mysqli_fetch_assoc($query_march);

if($fetch_march['march_gross'] == 0){
  $march = 0;
}else{
  $march = $fetch_march['march_gross'];
}

// APRIL

$gross_april = "SELECT Earning_Date, SUM(Daily_Salary) as april_gross FROM tbl_salary_earning WHERE Earning_Date BETWEEN '2023-02-01' AND '2023-02-28' AND Salary_Status = 'Paid'";
$query_april = mysqli_query($conn,$gross_april);
$fetch_april = mysqli_fetch_assoc($query_april);

if($fetch_april['april_gross'] == 0){
  $april = 0;
}else{
  $april = $fetch_april['april_gross'];
}

// may

$gross_may = "SELECT Earning_Date, SUM(Daily_Salary) as may_gross FROM tbl_salary_earning WHERE Earning_Date BETWEEN '2023-05-01' AND '2023-05-31'AND Salary_Status = 'Paid'";
$query_may = mysqli_query($conn,$gross_may);
$fetch_may = mysqli_fetch_assoc($query_may);

if($fetch_may['may_gross'] == 0){
  $may = 0;
}else{
  $may = $fetch_may['may_gross'];
}

// June

$gross_june = "SELECT Earning_Date, SUM(Daily_Salary) as june_gross FROM tbl_salary_earning WHERE Earning_Date BETWEEN '2023-06-01' AND '2023-06-30' AND Salary_Status = 'Paid'";
$query_june = mysqli_query($conn,$gross_june);
$fetch_june = mysqli_fetch_assoc($query_june);

if($fetch_june['june_gross'] == 0){
  $june = 0;
}else{
  $june = $fetch_june['june_gross'];
}

// July

$gross_july = "SELECT Earning_Date, SUM(Daily_Salary) as july_gross FROM tbl_salary_earning WHERE Earning_Date BETWEEN '2023-07-01' AND '2023-07-31' AND Salary_Status = 'Paid'";
$query_july = mysqli_query($conn,$gross_july);
$fetch_july = mysqli_fetch_assoc($query_july);

if($fetch_july['july_gross'] == 0){
  $july = 0;
}else{
  $july = $fetch_july['july_gross'];
}

// August

$gross_aug = "SELECT Earning_Date, SUM(Daily_Salary) as aug_gross FROM tbl_salary_earning WHERE Earning_Date BETWEEN '2023-08-01' AND '2023-08-31' AND Salary_Status = 'Paid'";
$query_aug = mysqli_query($conn,$gross_aug);
$fetch_aug = mysqli_fetch_assoc($query_aug);

if($fetch_aug['aug_gross'] == 0){
  $aug = 0;
}else{
  $aug = $fetch_aug['aug_gross'];
}
// Sept 

$gross_sept = "SELECT Earning_Date, SUM(Daily_Salary) as sept_gross FROM tbl_salary_earning WHERE Earning_Date BETWEEN '2023-09-01' AND '2023-09-30' AND Salary_Status = 'Paid'";
$query_sept = mysqli_query($conn,$gross_sept);
$fetch_sept = mysqli_fetch_assoc($query_sept);

if($fetch_sept['sept_gross'] == 0){
  $sept = 0;
}else{
  $sept = $fetch_sept['sept_gross'];
}

// Oct 

$gross_oct = "SELECT Earning_Date, SUM(Daily_Salary) as oct_gross FROM tbl_salary_earning WHERE Earning_Date BETWEEN '2023-10-01' AND '2023-10-31' AND Salary_Status = 'Paid'";
$query_oct = mysqli_query($conn,$gross_oct);
$fetch_oct = mysqli_fetch_assoc($query_oct);

if($fetch_oct['oct_gross'] == 0){
  $oct = 0;
}else{
  $oct = $fetch_oct['oct_gross'];
}

// Nov

$gross_nov = "SELECT Earning_Date, SUM(Daily_Salary) as nov_gross FROM tbl_salary_earning WHERE Earning_Date BETWEEN '2023-11-01' AND '2023-11-30' AND Salary_Status = 'Paid'";
$query_nov = mysqli_query($conn,$gross_nov);
$fetch_nov = mysqli_fetch_assoc($query_nov);

if($fetch_nov['nov_gross'] == 0){
  $nov = 0;
}else{
  $nov = $fetch_nov['nov_gross'];
}


// Dec

$gross_dec = "SELECT Earning_Date, SUM(Daily_Salary) as dec_gross FROM tbl_salary_earning WHERE Earning_Date BETWEEN '2023-12-01' AND '2023-12-31' AND Salary_Status = 'Paid'";
$query_dec = mysqli_query($conn,$gross_dec);
$fetch_dec = mysqli_fetch_assoc($query_dec);

if($fetch_dec['dec_gross'] == 0){
  $dec = 0;
}else{
  $dec = $fetch_dec['dec_gross'];
}




?>


<!DOCTYPE html>
<html>
<!-- <script src="https://cdn.plot.ly/plotly-latest.min.js"></script> -->



<body>

<div id="myPlot" style="width:100%;max-width:700px;height: 290px;"></div>

<script>
const xArray = ["Jan", "Feb", "Mar", "Apr", "May" ,"June" ,"July" ,"Aug" ,"Sep","Oct" ,"Nov" ,"Dec"];
const yArray = [<?php echo $jan; ?>,<?php echo  $feb; ?>,<?php echo  $march; ?>, <?php echo  $april; ?>, <?php echo $may; ?>,<?php echo $june; ?>,<?php echo $july; ?>, <?php echo $aug; ?>,<?php echo $sept ?>, <?php echo  $oct; ?>,<?php echo $nov;  ?>,<?php echo $dec; ?>];

const data = [{
  x:xArray,
  y:yArray,
  type:"bar"
}];

const layout = {title:"Total Gross Salary Per Month 2023"};

Plotly.newPlot("myPlot", data, layout);
</script>

</body>
</html>