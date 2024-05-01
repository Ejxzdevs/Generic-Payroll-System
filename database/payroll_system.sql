-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 06, 2023 at 01:00 AM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `payroll_system`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_accounts`
--

CREATE TABLE `tbl_accounts` (
  `Account_ID` int(11) NOT NULL,
  `Employees_ID` int(255) NOT NULL,
  `Username` varchar(255) NOT NULL,
  `Password` varchar(255) NOT NULL,
  `Status` varchar(255) NOT NULL,
  `User_Type` text NOT NULL,
  `Email` int(11) NOT NULL,
  `Company_ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_accounts`
--

INSERT INTO `tbl_accounts` (`Account_ID`, `Employees_ID`, `Username`, `Password`, `Status`, `User_Type`, `Email`, `Company_ID`) VALUES
(117, 0, 'admin ', 'admin', 'Enable', 'Admin', 0, 35),
(118, 304, 'driver', 'driver', 'Enable', 'Driver', 0, 0),
(119, 305, 'regular', 'regular', 'Enable', 'Regular', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_allowance_emp`
--

CREATE TABLE `tbl_allowance_emp` (
  `Allowance_Emp_ID` int(11) NOT NULL,
  `Employees_ID` int(10) NOT NULL,
  `Allowance_Status` varchar(50) NOT NULL,
  `Allowance_ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_allowance_list`
--

CREATE TABLE `tbl_allowance_list` (
  `Allowance_ID` int(11) NOT NULL,
  `Allowance_Name` varchar(50) NOT NULL,
  `Allowance_Value` varchar(50) NOT NULL,
  `Allowance_Condition` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_company_information`
--

CREATE TABLE `tbl_company_information` (
  `ID` int(11) NOT NULL,
  `LOGO` varchar(200) NOT NULL,
  `System_Name` varchar(30) NOT NULL,
  `Company_Name` varchar(30) NOT NULL,
  `State` varchar(20) NOT NULL,
  `City` varchar(20) NOT NULL,
  `Zipcode` varchar(10) NOT NULL,
  `Street` varchar(20) NOT NULL,
  `Building_Number` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_company_information`
--

INSERT INTO `tbl_company_information` (`ID`, `LOGO`, `System_Name`, `Company_Name`, `State`, `City`, `Zipcode`, `Street`, `Building_Number`) VALUES
(32, '', '	Payroll Management System', 'Racitel', 'Bulacan', 'Marilao', '2311', '', ''),
(33, '644f6220361012.73125540.png', '	Payroll Management System', 'Racitel', 'Bulacan', 'Marilao', '2019', '3312', '3321'),
(34, '', '	', '', '', '', '', '', ''),
(35, '6453cabe28fd24.15172514.png', 'Payroll Management System', 'Racitel', 'Bulacan', 'Marilao', '2013', 'Vila st', '201');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_csv`
--

CREATE TABLE `tbl_csv` (
  `Csv_ID` int(11) NOT NULL,
  `Date_Upload` date NOT NULL DEFAULT current_timestamp(),
  `Status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_csv`
--

INSERT INTO `tbl_csv` (`Csv_ID`, `Date_Upload`, `Status`) VALUES
(20, '2022-07-24', 'Uploaded'),
(21, '2022-07-24', 'Uploaded'),
(22, '2022-07-25', 'Uploaded'),
(23, '2022-07-29', 'Uploaded'),
(24, '2023-01-18', 'Uploaded'),
(25, '2023-02-23', 'Uploaded');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_deductions_list`
--

CREATE TABLE `tbl_deductions_list` (
  `Deduction_ID` int(11) NOT NULL,
  `Deduction_Name` varchar(50) NOT NULL,
  `Deduction_Value` int(11) NOT NULL,
  `Deduction_Condition` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_deduction_emp`
--

CREATE TABLE `tbl_deduction_emp` (
  `Deduction_List_ID` int(11) NOT NULL,
  `Employees_ID` int(11) NOT NULL,
  `Deduction_Status` varchar(10) NOT NULL,
  `Deduction_ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_department`
--

CREATE TABLE `tbl_department` (
  `Department_ID` int(255) NOT NULL,
  `Department_Name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_department`
--

INSERT INTO `tbl_department` (`Department_ID`, `Department_Name`) VALUES
(3, 'HM'),
(9, 'CS');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_employees_information`
--

CREATE TABLE `tbl_employees_information` (
  `Employees_ID` int(11) NOT NULL,
  `Employee_Image` varchar(255) NOT NULL,
  `Hire_Date` date NOT NULL,
  `Daily_Rate` int(11) NOT NULL,
  `Schedule_ID` int(11) NOT NULL,
  `Position_ID` int(11) NOT NULL,
  `Department_ID` int(11) NOT NULL,
  `Employee_Types` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_employees_information`
--

INSERT INTO `tbl_employees_information` (`Employees_ID`, `Employee_Image`, `Hire_Date`, `Daily_Rate`, `Schedule_ID`, `Position_ID`, `Department_ID`, `Employee_Types`) VALUES
(304, 'emp-image/644f6255306581.24572406.jpg', '2023-05-01', 1000, 34, 14, 3, 'Regular'),
(305, '', '2023-05-02', 450, 34, 1, 1, 'Casual');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_file_leave`
--

CREATE TABLE `tbl_file_leave` (
  `Leave_ID` int(11) NOT NULL,
  `Employees_ID` int(11) NOT NULL,
  `Leave_Types` varchar(255) NOT NULL,
  `Leave_Messages` varchar(255) NOT NULL,
  `Leave_Date` date NOT NULL,
  `Leave_Count` int(1) NOT NULL DEFAULT 0,
  `Leave_Status` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_file_leave`
--

INSERT INTO `tbl_file_leave` (`Leave_ID`, `Employees_ID`, `Leave_Types`, `Leave_Messages`, `Leave_Date`, `Leave_Count`, `Leave_Status`) VALUES
(76, 304, ' ', 'dwq', '1970-01-01', 1, 'Pending');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_holiday`
--

CREATE TABLE `tbl_holiday` (
  `ID` int(11) NOT NULL,
  `Holiday_Name` varchar(255) NOT NULL,
  `Doh` date DEFAULT NULL,
  `Rate` int(111) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_leave`
--

CREATE TABLE `tbl_leave` (
  `Leave_ID` int(11) NOT NULL,
  `Leave_Name` varchar(255) NOT NULL,
  `Leave_Encashment` int(111) NOT NULL,
  `Num_Leave` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_leave_limit`
--

CREATE TABLE `tbl_leave_limit` (
  `Limit_ID` int(11) NOT NULL,
  `Employees_ID` int(11) NOT NULL,
  `Limit_Leave` int(11) NOT NULL,
  `Leave_Name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_payroll_list`
--

CREATE TABLE `tbl_payroll_list` (
  `Payroll_ID` int(11) NOT NULL,
  `Payroll_Start` date NOT NULL,
  `Payroll_End` date NOT NULL,
  `Payroll_Date` date NOT NULL,
  `Payroll_Status` varchar(15) NOT NULL,
  `Payroll_Emp_Type` varchar(15) NOT NULL,
  `Payroll_Set_date_ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_payroll_list`
--

INSERT INTO `tbl_payroll_list` (`Payroll_ID`, `Payroll_Start`, `Payroll_End`, `Payroll_Date`, `Payroll_Status`, `Payroll_Emp_Type`, `Payroll_Set_date_ID`) VALUES
(148, '2023-05-02', '2023-05-07', '2023-05-08', 'Generated', 'Regular', 61),
(149, '2023-05-02', '2023-05-02', '2023-05-03', 'Pending', 'Casual', 62),
(150, '2023-05-04', '2023-05-04', '2023-05-05', 'Pending', 'Casual', 62),
(151, '2023-05-05', '2023-05-05', '2023-05-06', 'Pending', 'Casual', 62);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_payroll_set_date`
--

CREATE TABLE `tbl_payroll_set_date` (
  `Payroll_Set_date_ID` int(11) NOT NULL,
  `Type_Employees` varchar(10) NOT NULL,
  `Payroll_Date_Interval` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_payroll_set_date`
--

INSERT INTO `tbl_payroll_set_date` (`Payroll_Set_date_ID`, `Type_Employees`, `Payroll_Date_Interval`) VALUES
(61, 'Regular', '6days'),
(62, 'Casual', '1days');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_personal_information`
--

CREATE TABLE `tbl_personal_information` (
  `Personal_ID` int(11) NOT NULL,
  `Employees_ID` int(11) NOT NULL,
  `Last_Name` varchar(255) NOT NULL,
  `First_Name` varchar(255) NOT NULL,
  `Middle_Name` varchar(255) NOT NULL,
  `Birth_Date` date NOT NULL,
  `Email` varchar(255) NOT NULL,
  `Contact_Number` varchar(111) NOT NULL,
  `Zip_Code` varchar(255) NOT NULL,
  `Province` varchar(255) NOT NULL,
  `City` varchar(255) NOT NULL,
  `Street` varchar(255) NOT NULL,
  `Suffix` varchar(255) NOT NULL,
  `Status` varchar(255) NOT NULL,
  `Gender` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_personal_information`
--

INSERT INTO `tbl_personal_information` (`Personal_ID`, `Employees_ID`, `Last_Name`, `First_Name`, `Middle_Name`, `Birth_Date`, `Email`, `Contact_Number`, `Zip_Code`, `Province`, `City`, `Street`, `Suffix`, `Status`, `Gender`) VALUES
(188, 304, 'Gofredo', 'Ejhay', '', '1970-01-01', '', '', '', '', '', '', '', 'Single', 'Male'),
(189, 305, 'Payos', 'Rico', '', '1970-01-01', '', '', '', '', '', '', '', 'Single', 'Male');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_position`
--

CREATE TABLE `tbl_position` (
  `Position_ID` int(11) NOT NULL,
  `Department_ID` int(255) NOT NULL,
  `Position_Name` varchar(255) NOT NULL,
  `Daily_Salary` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_position`
--

INSERT INTO `tbl_position` (`Position_ID`, `Department_ID`, `Position_Name`, `Daily_Salary`) VALUES
(1, 3, 'Cookery', 450),
(14, 9, 'Programmer', 1000),
(17, 3, 'HR', 2000);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_rate`
--

CREATE TABLE `tbl_rate` (
  `id` int(11) NOT NULL,
  `Ot_Rate` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_rate`
--

INSERT INTO `tbl_rate` (`id`, `Ot_Rate`) VALUES
(1, 150);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_salary_earning`
--

CREATE TABLE `tbl_salary_earning` (
  `Earning_ID` int(11) NOT NULL,
  `Employees_ID` int(11) NOT NULL,
  `Ot_Salary` int(11) NOT NULL DEFAULT 0,
  `Regular_Salary` int(11) NOT NULL DEFAULT 0,
  `Earning_Date` date NOT NULL DEFAULT current_timestamp(),
  `Daily_Salary` int(11) NOT NULL,
  `Undertime_D` int(11) NOT NULL,
  `Late_D` int(11) NOT NULL,
  `Salary_Status` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_salary_earning`
--

INSERT INTO `tbl_salary_earning` (`Earning_ID`, `Employees_ID`, `Ot_Salary`, `Regular_Salary`, `Earning_Date`, `Daily_Salary`, `Undertime_D`, `Late_D`, `Salary_Status`) VALUES
(231, 304, -3, 1000, '2023-05-02', 997, 0, 0, 'Unpaid'),
(232, 304, 372, 1000, '2023-05-02', 1372, 0, 0, 'Unpaid'),
(233, 304, -175, 1000, '2023-05-02', 825, 0, 0, 'Unpaid'),
(234, 304, 563, 1000, '2023-05-02', 1563, 0, 0, 'Unpaid'),
(235, 304, 0, 0, '2023-05-02', 0, 0, 23, 'Unpaid'),
(236, 305, 0, 0, '2023-05-02', 0, 0, 0, 'Unpaid');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_tax_emp`
--

CREATE TABLE `tbl_tax_emp` (
  `Tax_emp_ID` int(11) NOT NULL,
  `Employees_ID` int(111) NOT NULL,
  `Tax_ID` int(111) NOT NULL,
  `Tax_Status` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_tax_list`
--

CREATE TABLE `tbl_tax_list` (
  `Tax_ID` int(11) NOT NULL,
  `Tax_Name` varchar(20) NOT NULL,
  `Tax_Status` varchar(10) NOT NULL,
  `Employer_Share` float NOT NULL,
  `Employee_Share` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_time_entries`
--

CREATE TABLE `tbl_time_entries` (
  `Time_Entries_ID` int(11) NOT NULL,
  `Employees_ID` int(100) NOT NULL,
  `Time_In` time(6) NOT NULL,
  `Time_Out` time(6) NOT NULL,
  `Hours_Worked` int(10) NOT NULL,
  `Regular_Time` int(10) NOT NULL,
  `Overtime` int(10) NOT NULL,
  `Date_Attendance` date NOT NULL DEFAULT current_timestamp(),
  `Time_Start` time(6) NOT NULL,
  `Time_End` time(6) NOT NULL,
  `Shift_Type` varchar(20) NOT NULL,
  `Late` int(10) NOT NULL,
  `Image_Time_In` varchar(50) NOT NULL,
  `Image_Time_Out` varchar(50) NOT NULL,
  `Image_OT` varchar(50) NOT NULL,
  `Entry_Types` varchar(10) NOT NULL,
  `Undertime` int(10) NOT NULL,
  `No_Late` int(11) NOT NULL,
  `No_Undertime` int(11) NOT NULL,
  `No_Halfday` int(11) NOT NULL,
  `No_Holiday` int(11) NOT NULL,
  `Daily_Status` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_time_entries`
--

INSERT INTO `tbl_time_entries` (`Time_Entries_ID`, `Employees_ID`, `Time_In`, `Time_Out`, `Hours_Worked`, `Regular_Time`, `Overtime`, `Date_Attendance`, `Time_Start`, `Time_End`, `Shift_Type`, `Late`, `Image_Time_In`, `Image_Time_Out`, `Image_OT`, `Entry_Types`, `Undertime`, `No_Late`, `No_Undertime`, `No_Halfday`, `No_Holiday`, `Daily_Status`) VALUES
(350, 304, '08:00:42.000000', '17:11:03.000000', 0, 0, 0, '2023-05-02', '08:22:00.000000', '17:00:00.000000', 'Morning ', 0, '', '', '', 'Indoor', 11, 0, 1, 0, 0, 'Undertime'),
(351, 305, '17:39:56.000000', '17:47:00.000000', 0, 0, 0, '2023-05-02', '09:00:00.000000', '17:00:00.000000', 'Morning ', 0, '', '', '', 'Indoor', 0, 1, 0, 0, 0, 'Late Arrival');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_types_schedule`
--

CREATE TABLE `tbl_types_schedule` (
  `Schedule_ID` int(11) NOT NULL,
  `Schedule_Name` varchar(20) NOT NULL,
  `Schedule_In` time(6) NOT NULL,
  `Schedule_Out` time(6) NOT NULL,
  `Schedule_Rate` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_types_schedule`
--

INSERT INTO `tbl_types_schedule` (`Schedule_ID`, `Schedule_Name`, `Schedule_In`, `Schedule_Out`, `Schedule_Rate`) VALUES
(34, 'Morning Shift ', '08:00:00.000000', '20:00:00.000000', 100);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user_types`
--

CREATE TABLE `tbl_user_types` (
  `User_Type_ID` int(11) NOT NULL,
  `User_Types` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_user_types`
--

INSERT INTO `tbl_user_types` (`User_Type_ID`, `User_Types`) VALUES
(3, 'Processor'),
(4, 'Driver'),
(5, 'Regular');

-- --------------------------------------------------------

--
-- Table structure for table `test`
--

CREATE TABLE `test` (
  `id` int(11) NOT NULL,
  `name` varchar(222) NOT NULL,
  `date_start` date NOT NULL,
  `date_end` date NOT NULL,
  `Types` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `test`
--

INSERT INTO `test` (`id`, `name`, `date_start`, `date_end`, `Types`) VALUES
(127, '', '2023-04-16', '2023-04-26', 'Regular'),
(128, '', '2023-04-27', '2023-05-07', 'Regular'),
(130, '', '2023-05-08', '2023-05-18', 'Regular'),
(131, '', '2023-05-19', '2023-05-29', 'Regular'),
(132, '', '2023-05-30', '2023-06-14', 'Regular'),
(133, '', '2023-06-15', '2023-06-30', 'Regular');

-- --------------------------------------------------------

--
-- Table structure for table `test1`
--

CREATE TABLE `test1` (
  `id` int(11) NOT NULL,
  `time_in` time(6) NOT NULL,
  `time_out` time(6) NOT NULL,
  `time_in2` time(6) NOT NULL,
  `time_out2` time(6) NOT NULL,
  `date` date NOT NULL,
  `emp_d` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `test1`
--

INSERT INTO `test1` (`id`, `time_in`, `time_out`, `time_in2`, `time_out2`, `date`, `emp_d`) VALUES
(31, '00:00:00.000000', '00:00:00.000000', '00:00:00.000000', '00:00:00.000000', '2023-05-01', 1),
(32, '07:40:00.000000', '12:00:00.000000', '00:00:00.000000', '20:35:00.000000', '2023-05-02', 1),
(33, '00:00:00.000000', '00:00:00.000000', '00:00:00.000000', '00:00:00.000000', '2023-05-01', 2),
(34, '00:00:00.000000', '00:00:00.000000', '00:00:00.000000', '00:00:00.000000', '2023-05-02', 2),
(35, '00:00:00.000000', '00:00:00.000000', '00:00:00.000000', '00:00:00.000000', '2023-05-01', 3),
(36, '07:00:00.000000', '12:01:00.000000', '13:02:00.000000', '17:00:00.000000', '2023-05-02', 3);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_accounts`
--
ALTER TABLE `tbl_accounts`
  ADD PRIMARY KEY (`Account_ID`),
  ADD KEY `Employees_ID` (`Employees_ID`);

--
-- Indexes for table `tbl_allowance_emp`
--
ALTER TABLE `tbl_allowance_emp`
  ADD PRIMARY KEY (`Allowance_Emp_ID`),
  ADD KEY `Employees_ID` (`Employees_ID`),
  ADD KEY `Allowance_ID` (`Allowance_ID`);

--
-- Indexes for table `tbl_allowance_list`
--
ALTER TABLE `tbl_allowance_list`
  ADD PRIMARY KEY (`Allowance_ID`);

--
-- Indexes for table `tbl_company_information`
--
ALTER TABLE `tbl_company_information`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `tbl_csv`
--
ALTER TABLE `tbl_csv`
  ADD PRIMARY KEY (`Csv_ID`);

--
-- Indexes for table `tbl_deductions_list`
--
ALTER TABLE `tbl_deductions_list`
  ADD PRIMARY KEY (`Deduction_ID`);

--
-- Indexes for table `tbl_deduction_emp`
--
ALTER TABLE `tbl_deduction_emp`
  ADD PRIMARY KEY (`Deduction_List_ID`),
  ADD KEY `Deduction_ID` (`Deduction_ID`);

--
-- Indexes for table `tbl_department`
--
ALTER TABLE `tbl_department`
  ADD PRIMARY KEY (`Department_ID`);

--
-- Indexes for table `tbl_employees_information`
--
ALTER TABLE `tbl_employees_information`
  ADD PRIMARY KEY (`Employees_ID`);

--
-- Indexes for table `tbl_file_leave`
--
ALTER TABLE `tbl_file_leave`
  ADD PRIMARY KEY (`Leave_ID`),
  ADD KEY `Employees_ID` (`Employees_ID`);

--
-- Indexes for table `tbl_holiday`
--
ALTER TABLE `tbl_holiday`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `tbl_leave`
--
ALTER TABLE `tbl_leave`
  ADD PRIMARY KEY (`Leave_ID`);

--
-- Indexes for table `tbl_leave_limit`
--
ALTER TABLE `tbl_leave_limit`
  ADD PRIMARY KEY (`Limit_ID`),
  ADD KEY `Employees_ID` (`Employees_ID`);

--
-- Indexes for table `tbl_payroll_list`
--
ALTER TABLE `tbl_payroll_list`
  ADD PRIMARY KEY (`Payroll_ID`),
  ADD KEY `Payroll_Interval` (`Payroll_Set_date_ID`);

--
-- Indexes for table `tbl_payroll_set_date`
--
ALTER TABLE `tbl_payroll_set_date`
  ADD PRIMARY KEY (`Payroll_Set_date_ID`);

--
-- Indexes for table `tbl_personal_information`
--
ALTER TABLE `tbl_personal_information`
  ADD PRIMARY KEY (`Personal_ID`),
  ADD KEY `Employees_ID` (`Employees_ID`);

--
-- Indexes for table `tbl_position`
--
ALTER TABLE `tbl_position`
  ADD PRIMARY KEY (`Position_ID`),
  ADD KEY `Department_ID` (`Department_ID`);

--
-- Indexes for table `tbl_rate`
--
ALTER TABLE `tbl_rate`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_salary_earning`
--
ALTER TABLE `tbl_salary_earning`
  ADD PRIMARY KEY (`Earning_ID`),
  ADD KEY `Employees_ID` (`Employees_ID`);

--
-- Indexes for table `tbl_tax_emp`
--
ALTER TABLE `tbl_tax_emp`
  ADD PRIMARY KEY (`Tax_emp_ID`),
  ADD KEY `Tax_ID` (`Tax_ID`),
  ADD KEY `Employees_ID` (`Employees_ID`);

--
-- Indexes for table `tbl_tax_list`
--
ALTER TABLE `tbl_tax_list`
  ADD PRIMARY KEY (`Tax_ID`);

--
-- Indexes for table `tbl_time_entries`
--
ALTER TABLE `tbl_time_entries`
  ADD PRIMARY KEY (`Time_Entries_ID`),
  ADD KEY `Employees_ID` (`Employees_ID`);

--
-- Indexes for table `tbl_types_schedule`
--
ALTER TABLE `tbl_types_schedule`
  ADD PRIMARY KEY (`Schedule_ID`);

--
-- Indexes for table `tbl_user_types`
--
ALTER TABLE `tbl_user_types`
  ADD PRIMARY KEY (`User_Type_ID`);

--
-- Indexes for table `test`
--
ALTER TABLE `test`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `test1`
--
ALTER TABLE `test1`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_accounts`
--
ALTER TABLE `tbl_accounts`
  MODIFY `Account_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=120;

--
-- AUTO_INCREMENT for table `tbl_allowance_emp`
--
ALTER TABLE `tbl_allowance_emp`
  MODIFY `Allowance_Emp_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48153;

--
-- AUTO_INCREMENT for table `tbl_allowance_list`
--
ALTER TABLE `tbl_allowance_list`
  MODIFY `Allowance_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=76;

--
-- AUTO_INCREMENT for table `tbl_company_information`
--
ALTER TABLE `tbl_company_information`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `tbl_csv`
--
ALTER TABLE `tbl_csv`
  MODIFY `Csv_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `tbl_deductions_list`
--
ALTER TABLE `tbl_deductions_list`
  MODIFY `Deduction_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `tbl_deduction_emp`
--
ALTER TABLE `tbl_deduction_emp`
  MODIFY `Deduction_List_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=133;

--
-- AUTO_INCREMENT for table `tbl_department`
--
ALTER TABLE `tbl_department`
  MODIFY `Department_ID` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `tbl_employees_information`
--
ALTER TABLE `tbl_employees_information`
  MODIFY `Employees_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=306;

--
-- AUTO_INCREMENT for table `tbl_file_leave`
--
ALTER TABLE `tbl_file_leave`
  MODIFY `Leave_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=77;

--
-- AUTO_INCREMENT for table `tbl_holiday`
--
ALTER TABLE `tbl_holiday`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `tbl_leave`
--
ALTER TABLE `tbl_leave`
  MODIFY `Leave_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `tbl_leave_limit`
--
ALTER TABLE `tbl_leave_limit`
  MODIFY `Limit_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `tbl_payroll_list`
--
ALTER TABLE `tbl_payroll_list`
  MODIFY `Payroll_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=152;

--
-- AUTO_INCREMENT for table `tbl_payroll_set_date`
--
ALTER TABLE `tbl_payroll_set_date`
  MODIFY `Payroll_Set_date_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=63;

--
-- AUTO_INCREMENT for table `tbl_personal_information`
--
ALTER TABLE `tbl_personal_information`
  MODIFY `Personal_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=190;

--
-- AUTO_INCREMENT for table `tbl_position`
--
ALTER TABLE `tbl_position`
  MODIFY `Position_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `tbl_rate`
--
ALTER TABLE `tbl_rate`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_salary_earning`
--
ALTER TABLE `tbl_salary_earning`
  MODIFY `Earning_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=237;

--
-- AUTO_INCREMENT for table `tbl_tax_emp`
--
ALTER TABLE `tbl_tax_emp`
  MODIFY `Tax_emp_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=77;

--
-- AUTO_INCREMENT for table `tbl_tax_list`
--
ALTER TABLE `tbl_tax_list`
  MODIFY `Tax_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `tbl_time_entries`
--
ALTER TABLE `tbl_time_entries`
  MODIFY `Time_Entries_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=352;

--
-- AUTO_INCREMENT for table `tbl_types_schedule`
--
ALTER TABLE `tbl_types_schedule`
  MODIFY `Schedule_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `tbl_user_types`
--
ALTER TABLE `tbl_user_types`
  MODIFY `User_Type_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `test`
--
ALTER TABLE `test`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=134;

--
-- AUTO_INCREMENT for table `test1`
--
ALTER TABLE `test1`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tbl_accounts`
--
ALTER TABLE `tbl_accounts`
  ADD CONSTRAINT `tbl_accounts_ibfk_1` FOREIGN KEY (`Employees_ID`) REFERENCES `tbl_employees_information` (`Employees_ID`);

--
-- Constraints for table `tbl_allowance_emp`
--
ALTER TABLE `tbl_allowance_emp`
  ADD CONSTRAINT `tbl_allowance_emp_ibfk_1` FOREIGN KEY (`Employees_ID`) REFERENCES `tbl_employees_information` (`Employees_ID`),
  ADD CONSTRAINT `tbl_allowance_emp_ibfk_2` FOREIGN KEY (`Allowance_ID`) REFERENCES `tbl_allowance_list` (`Allowance_ID`);

--
-- Constraints for table `tbl_deduction_emp`
--
ALTER TABLE `tbl_deduction_emp`
  ADD CONSTRAINT `tbl_deduction_emp_ibfk_1` FOREIGN KEY (`Deduction_ID`) REFERENCES `tbl_deductions_list` (`Deduction_ID`);

--
-- Constraints for table `tbl_file_leave`
--
ALTER TABLE `tbl_file_leave`
  ADD CONSTRAINT `tbl_file_leave_ibfk_1` FOREIGN KEY (`Employees_ID`) REFERENCES `tbl_employees_information` (`Employees_ID`);

--
-- Constraints for table `tbl_leave_limit`
--
ALTER TABLE `tbl_leave_limit`
  ADD CONSTRAINT `tbl_leave_limit_ibfk_1` FOREIGN KEY (`Employees_ID`) REFERENCES `tbl_employees_information` (`Employees_ID`);

--
-- Constraints for table `tbl_payroll_list`
--
ALTER TABLE `tbl_payroll_list`
  ADD CONSTRAINT `tbl_payroll_list_ibfk_1` FOREIGN KEY (`Payroll_Set_date_ID`) REFERENCES `tbl_payroll_set_date` (`Payroll_Set_date_ID`);

--
-- Constraints for table `tbl_personal_information`
--
ALTER TABLE `tbl_personal_information`
  ADD CONSTRAINT `tbl_personal_information_ibfk_1` FOREIGN KEY (`Employees_ID`) REFERENCES `tbl_employees_information` (`Employees_ID`);

--
-- Constraints for table `tbl_position`
--
ALTER TABLE `tbl_position`
  ADD CONSTRAINT `tbl_position_ibfk_1` FOREIGN KEY (`Department_ID`) REFERENCES `tbl_department` (`Department_ID`);

--
-- Constraints for table `tbl_salary_earning`
--
ALTER TABLE `tbl_salary_earning`
  ADD CONSTRAINT `tbl_salary_earning_ibfk_1` FOREIGN KEY (`Employees_ID`) REFERENCES `tbl_employees_information` (`Employees_ID`);

--
-- Constraints for table `tbl_tax_emp`
--
ALTER TABLE `tbl_tax_emp`
  ADD CONSTRAINT `tbl_tax_emp_ibfk_1` FOREIGN KEY (`Tax_ID`) REFERENCES `tbl_tax_list` (`Tax_ID`),
  ADD CONSTRAINT `tbl_tax_emp_ibfk_2` FOREIGN KEY (`Employees_ID`) REFERENCES `tbl_employees_information` (`Employees_ID`);

--
-- Constraints for table `tbl_time_entries`
--
ALTER TABLE `tbl_time_entries`
  ADD CONSTRAINT `tbl_time_entries_ibfk_1` FOREIGN KEY (`Employees_ID`) REFERENCES `tbl_employees_information` (`Employees_ID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
