<?php 

include "../../connection/connection.php";

$select_all_emp ="SELECT * FROM tbl_employees_information";
$query_all_emp = mysqli_query($conn,$select_all_emp);
$count_emp = mysqli_num_rows($query_all_emp);

$select_all_dept ="SELECT * FROM tbl_department";
$query_all_dept = mysqli_query($conn,$select_all_dept);
$count_all_dept = mysqli_num_rows($query_all_dept);

$select_all_leave ="SELECT * FROM tbl_file_leave WHERE Leave_Status = 'Pending'";
$query_all_leave = mysqli_query($conn,$select_all_leave);
$count_all_pending = mysqli_num_rows($query_all_leave);

$select_all_leaves ="SELECT * FROM tbl_file_leave WHERE Leave_Status = 'Accepted'";
$query_all_leaves = mysqli_query($conn,$select_all_leaves);
$count_all_recorded = mysqli_num_rows($query_all_leaves);

$select_all_payroll_list ="SELECT * FROM tbl_payroll_list WHERE Payroll_Status = 'Pending'";
$query_all_payroll_list = mysqli_query($conn,$select_all_payroll_list);
$count_all_payroll_list = mysqli_fetch_assoc($query_all_payroll_list);



?>
			<div class="dashboard-box" id="no_employees">
				<div class="box-emp">
					<div class="top-emp">
						<div class="num_label">
							<p><?php echo $count_emp; ?></p>
						</div>
						<div class="num_image">
							<img src="../../icons/employee.png">
						</div>
					</div>
					<div class="bot-emp">
						<label><a href="../employees/employee_list_layout.php">Employees</a></label>
					</div>
				</div>
			</div>
			<!-- department -->
			<div class="dashboard-box" id="no_employees">
				<div class="box-emp">
					<div class="top-emp">
						<div class="num_label">
							<p><?php echo $count_all_dept; ?></p>
						</div>
						<div class="num_image">
							<img style="height: 4.5em; width: 4.5em;" src="../../icons/department.svg">
						</div>
					</div>
					<div class="bot-emp">
						<label><a href="../create-department/department_layout.php">Depertment</a></label>
					</div>
				</div>
			</div>
			<!-- Leave -->
			<div class="dashboard-box" id="no_employees">
				<div class="box-emp">
					<div class="top-emp" id="leave_num" >
						<label>Pending <span><?php echo $count_all_pending; ?></span></label>
						<label>Aprroved <span><?php echo $count_all_recorded; ?></span> </label>
					</div>
					<div class="bot-emp">
						<label><a href="../management/leave_layout.php">Leave</a></label>
					</div>
				</div>
			</div>

			<!--  -->
			<div class="Payroll_list">
				<div class="header-list" >
					<p>Upcomming payroll</p>
				</div>
				<div class="header-aa">
					<div class="id">
						<p>ID</p>
					</div>
					<div class="type">
						<p>Type</p>
					</div>
					<div class="date">
						<p>Date</p>
					</div>
				</div>
				<div class="payroll-content" >
				<?PHP DO{?>
					<div class="header-aa" id="border-list">
						<div class="id">
							<p style="font-weight: 300;"><?php echo $count_all_payroll_list['Payroll_ID'];  ?></p>
						</div>
						<div class="type">
							<p style="font-weight: 300;"><?php echo $count_all_payroll_list['Payroll_Emp_Type'];  ?></p>
						</div>
						<div class="date">
							<p style="font-weight: 300;"><?php echo $count_all_payroll_list['Payroll_Date']; ?></p>
						</div>
					</div>
				<?php }while($count_all_payroll_list=$query_all_payroll_list->fetch_assoc()); ?>
				</div>

			</div>