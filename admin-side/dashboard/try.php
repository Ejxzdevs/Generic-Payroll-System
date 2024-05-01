

<!DOCTYPE html>
<html>
<script src="https://cdn.plot.ly/plotly-latest.min.js"></script>
<body>

<div id="myPlot" style="width:100%;max-width:700px"></div>

<script>
const xArray = ["Late", "Early"];
const yArray = [55, 49];

const layout = {title:"Late Percentage Per Month"};

const data = [{labels:xArray, values:yArray, type:"pie"}];

Plotly.newPlot("myPlot", data, layout);
</script>

</body>
</html>
