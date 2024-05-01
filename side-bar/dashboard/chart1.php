<?php 
include "../../connection/connection.php";

$from = date('y-m-1');
$to = date('y-m-30');

$select_all_undertime = "SELECT count(Time_Entries_ID) AS early ,sum(No_Undertime) as undertime_percentage from tbl_time_entries WHERE Date_Attendance BETWEEN '$from' AND '$to'";
$query_all_undertime = mysqli_query($conn,$select_all_undertime);
$select_all_undertime = mysqli_fetch_assoc($query_all_undertime);


?>
<!DOCTYPE html>
<html>

<body>

<div id="myPlot2" style="width:100%;max-width:700px;height: 300px; "></div>


<script>
const aaArray = ["Regular","Undertime"];
const bbArray = [<?php echo $select_all_undertime['early']; ?>,<?php echo $select_all_undertime['undertime_percentage']; ?> ];

const layoutaa = {title:"Undertime Percentage Per Month"};

const dataaa = [{labels:aaArray, values:bbArray, type:"pie"}];

Plotly.newPlot("myPlot2", dataaa, layoutaa);
</script>

</body>
</html>