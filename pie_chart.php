<!DOCTYPE HTML>
<html>
<head>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.2/Chart.js"></script>
</head>
<body>
	<div style="width:30%">
		<canvas id="pie-chart" width="800" height="450"></canvas>
	</div>
	<script>
	new Chart(document.getElementById("pie-chart"),
	{
		type: 'pie',
		data: {
			labels: ["Correct", "Incorrect", "Omited"],
			datasets: [{
				backgroundColor: ["#69c869", "#f05a5b","#689bf6"],
				data: [70,15,10]
			}]
		},
		options: {
		title: {
				display: true,
			}
		}
	});
</script>
</body>
</html>     