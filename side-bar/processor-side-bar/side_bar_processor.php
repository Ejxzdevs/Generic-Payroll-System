<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title></title>
	<style type="text/css">
		.sub-payroll{
			background: #262626;
			padding-top: 1em;
			display: none;
			margin-top: .5em;
			height: 7em;
			padding-bottom: 2EM;

		}
		.sub-payroll a{
			position: relative;
			color: white;
			font-size: 1.2em;
		}

		#left{
			position: relative;
			left: 5em;

			}

		#UP{
			position: relative;
			display: flex;
			height: 1.2em;
			left: 7em;

		}

		#open{
			height: 2em;
		}

		.sub-report{
			margin-top: 1em;
			height: 4em;
			background-color: #494949;
			padding-top: 1.3em;

		}

		
	</style>
</head>
<body>
	<a href="../dashboard/dashboard_layout.php"><img src="../../icons/DASHBOARD.png">Dash Board</a>
	<!-- <a href="../employees/employee_layout.php"><img src="../../icons/Employees-nav.svg" >Employee</a> -->
	<a href="../attendance/schedule_layout.php"><img src="../../icons/time_record.svg">Time Entry</a>
	<a id="open" href="javascript: open_side();"><img   src="../../icons/accounting.png">Payroll
		<img id="left" src="../../icons/1.png">
	<div class="sub-payroll">
		<a href="../payroll/payroll_layout.php"><img src="../../icons/salary_list.png">Payroll List</a>
		<a href="../payroll/record_layout.php"><img src="../../icons/payroll_record.png">Record</a>
		<a href="javascript: close_side();"><img id="UP" src="../../icons/ARROW-UP.png"></a>
	</div>
	</a>
	<!-- <a href="../compensation/compensation_layout.php"><img src="../../icons/leave.png">Compensation</a> -->
	<a href="../reports/report_layout.php" ><img   src="../../icons/reporting.png">Reports</a>
	<a href="../../user-entry/log-out.php"><img src="../../icons/log-out.SVG">LOGOUT</a>
	

	


</body>
<script type="text/javascript">
	function open_side(){
		document.querySelector('.sub-payroll').style.display="FLEX";
		document.querySelector('#left').style.display="NONE";
	}
	function close_side(){
		document.querySelector('.sub-payroll').style.display="NONE";
		document.querySelector('#left').style.display="INLINE-BLOCK";
	}
	function open_report(){
		document.querySelector('.sub-payroll').style.display="FLEX";
		document.querySelector('#left').style.display="NONE";
	}
	function close_side(){
		document.querySelector('.sub-payroll').style.display="NONE";
		document.querySelector('#left').style.display="INLINE-BLOCK";
	}		
</script>
</html>