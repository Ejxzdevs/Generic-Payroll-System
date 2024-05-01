<?php 
include "../../connection/connection.php";

$from = date('y-m-1');
$to = date('y-m-30');

$select_all_late = "SELECT count(Time_Entries_ID) AS early ,sum(No_Late) as late_percentage from tbl_time_entries WHERE Date_Attendance BETWEEN '$from' AND '$to'";
$query_all_late = mysqli_query($conn,$select_all_late);
$select_all_late = mysqli_fetch_assoc($query_all_late);




?>
<!DOCTYPE html>
<html>

<body>

<div id="myPlot1" style="width:100%;max-width:700px;height: 300px; "></div>


<script>
const aArray = ["Early", "Late"];
const bArray = [<?php echo $select_all_late['early']; ?>,<?php echo $select_all_late['late_percentage']; ?> ];

const layouta = {title:"Late Percentage Per Month"};

const dataa = [{labels:aArray, values:bArray, type:"pie"}];

Plotly.newPlot("myPlot1", dataa, layouta);
</script>

</body>
</html>