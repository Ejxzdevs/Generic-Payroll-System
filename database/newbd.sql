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
-- Table structure for table `tbl_user_types`
--

CREATE TABLE `tbl_user_types` (
  `User_Type_ID` int(11) NOT NULL AUTO_INCREMENT,
  `User_Types` varchar(255) NOT NULL,
  PRIMARY KEY (`User_Type_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `tbl_user_types` (`User_Type_ID`, `User_Types`) VALUES
(3, 'Processor'),
(4, 'Driver'),
(5, 'Regular');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_accounts`
--

CREATE TABLE `tbl_accounts` (
  `Account_ID` int(11) NOT NULL AUTO_INCREMENT,
  `Employees_ID` int(11) NOT NULL,
  `Username` varchar(255) NOT NULL,
  `Password` varchar(255) NOT NULL,
  `Status` varchar(255) NOT NULL,
  `User_Type` int(11) NOT NULL,
  `Email` varchar(255) NOT NULL,
  `Company_ID` int(11) NOT NULL,
  PRIMARY KEY (`Account_ID`),
  KEY `Employees_ID` (`Employees_ID`),
  CONSTRAINT `fk_accounts_user_type` FOREIGN KEY (`User_Type`) REFERENCES `tbl_user_types` (`User_Type_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `tbl_accounts` (`Account_ID`, `Employees_ID`, `Username`, `Password`, `Status`, `User_Type`, `Email`, `Company_ID`) VALUES
(117, 0, 'admin', 'admin', 'Enable', 3, '', 35),
(118, 304, 'driver', 'driver', 'Enable', 4, '', 0),
(119, 305, 'regular', 'regular', 'Enable', 5, '', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_company_information`
--

CREATE TABLE `tbl_company_information` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `LOGO` varchar(200) DEFAULT NULL,
  `System_Name` varchar(30) NOT NULL,
  `Company_Name` varchar(30) NOT NULL,
  `State` varchar(20) NOT NULL,
  `City` varchar(20) NOT NULL,
  `Zipcode` varchar(10) NOT NULL,
  `Street` varchar(20) NOT NULL,
  `Building_Number` varchar(10) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `tbl_company_information` (`ID`, `LOGO`, `System_Name`, `Company_Name`, `State`, `City`, `Zipcode`, `Street`, `Building_Number`) VALUES
(32, '', 'Payroll Management System', 'Racitel', 'Bulacan', 'Marilao', '2311', '', ''),
(33, '644f6220361012.73125540.png', 'Payroll Management System', 'Racitel', 'Bulacan', 'Marilao', '2019', '3312', '3321'),
(35, '6453cabe28fd24.15172514.png', 'Payroll Management System', 'Racitel', 'Bulacan', 'Marilao', '2013', 'Vila st', '201');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_department`
--

CREATE TABLE `tbl_department` (
  `Department_ID` int(11) NOT NULL AUTO_INCREMENT,
  `Department_Name` varchar(255) NOT NULL,
  PRIMARY KEY (`Department_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `tbl_department` (`Department_ID`, `Department_Name`) VALUES
(1, 'IT'),
(2, 'HR');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_position`
--

CREATE TABLE `tbl_position` (
  `Position_ID` int(11) NOT NULL AUTO_INCREMENT,
  `Position_Name` varchar(255) NOT NULL,
  PRIMARY KEY (`Position_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `tbl_position` (`Position_ID`, `Position_Name`) VALUES
(1, 'Programmer'),
(2, 'HR Head');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_employees_information`
--

CREATE TABLE `tbl_employees_information` (
  `Employees_ID` int(11) NOT NULL AUTO_INCREMENT,
  `Last_Name` varchar(255) NOT NULL,
  `First_Name` varchar(255) NOT NULL,
  `Middle_Name` varchar(255) NOT NULL,
  `Position` int(11) NOT NULL,
  `Department` int(11) NOT NULL,
  `Contact_Number` varchar(15) NOT NULL,
  `Date_Hired` date NOT NULL,
  `Daily_Rate` decimal(10,2) NOT NULL,
  PRIMARY KEY (`Employees_ID`),
  KEY `Position` (`Position`),
  KEY `Department` (`Department`),
  CONSTRAINT `fk_employees_department` FOREIGN KEY (`Department`) REFERENCES `tbl_department` (`Department_ID`),
  CONSTRAINT `fk_employees_position` FOREIGN KEY (`Position`) REFERENCES `tbl_position` (`Position_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `tbl_employees_information` (`Employees_ID`, `Last_Name`, `First_Name`, `Middle_Name`, `Position`, `Department`, `Contact_Number`, `Date_Hired`, `Daily_Rate`) VALUES
(304, 'Doe', 'John', 'Smith', 2, 2, '09123456789', '2021-01-01', '500.00'),
(305, 'Del Rosario', 'Juan', 'Luna', 1, 1, '09234567890', '2021-01-01', '600.00');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_salary_earning`
--

CREATE TABLE `tbl_salary_earning` (
  `Salary_Earning_ID` int(11) NOT NULL AUTO_INCREMENT,
  `Employees_ID` int(11) NOT NULL,
  `Month` varchar(255) NOT NULL,
  `Year` int(4) NOT NULL,
  `Earnings` decimal(10,2) NOT NULL,
  PRIMARY KEY (`Salary_Earning_ID`),
  KEY `Employees_ID` (`Employees_ID`),
  CONSTRAINT `fk_salary_earning_employees` FOREIGN KEY (`Employees_ID`) REFERENCES `tbl_employees_information` (`Employees_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `tbl_salary_earning` (`Salary_Earning_ID`, `Employees_ID`, `Month`, `Year`, `Earnings`) VALUES
(1, 304, 'January', 2023, '1000.00'),
(2, 305, 'January', 2023, '1200.00');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_time_entries`
--

CREATE TABLE `tbl_time_entries` (
  `Time_Entry_ID` int(11) NOT NULL AUTO_INCREMENT,
  `Employees_ID` int(11) NOT NULL,
  `Date` date NOT NULL,
  `Time_In` time NOT NULL,
  `Time_Out` time NOT NULL,
  PRIMARY KEY (`Time_Entry_ID`),
  KEY `Employees_ID` (`Employees_ID`),
  CONSTRAINT `fk_time_entries_employees` FOREIGN KEY (`Employees_ID`) REFERENCES `tbl_employees_information` (`Employees_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `tbl_time_entries` (`Time_Entry_ID`, `Employees_ID`, `Date`, `Time_In`, `Time_Out`) VALUES
(1, 304, '2023-01-01', '08:00:00', '17:00:00'),
(2, 305, '2023-01-01', '09:00:00', '18:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_leave`
--

CREATE TABLE `tbl_leave` (
  `Leave_ID` int(11) NOT NULL AUTO_INCREMENT,
  `Employees_ID` int(11) NOT NULL,
  `Leave_Type` varchar(255) NOT NULL,
  `Date_Started` date NOT NULL,
  `Date_Ended` date NOT NULL,
  PRIMARY KEY (`Leave_ID`),
  KEY `Employees_ID` (`Employees_ID`),
  CONSTRAINT `fk_leave_employees` FOREIGN KEY (`Employees_ID`) REFERENCES `tbl_employees_information` (`Employees_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `tbl_leave` (`Leave_ID`, `Employees_ID`, `Leave_Type`, `Date_Started`, `Date_Ended`) VALUES
(1, 305, 'Sick Leave', '2023-01-01', '2023-01-03');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_holiday`
--

CREATE TABLE `tbl_holiday` (
  `Holiday_ID` int(11) NOT NULL AUTO_INCREMENT,
  `Holiday_Date` date NOT NULL,
  `Holiday_Name` varchar(255) NOT NULL,
  PRIMARY KEY (`Holiday_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `tbl_holiday` (`Holiday_ID`, `Holiday_Date`, `Holiday_Name`) VALUES
(1, '2023-01-01', 'New Year'),
(2, '2023-12-25', 'Christmas');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_payroll_set_date`
--

CREATE TABLE `tbl_payroll_set_date` (
  `Payroll_Set_Date_ID` int(11) NOT NULL AUTO_INCREMENT,
  `Start_Date` date NOT NULL,
  `End_Date` date NOT NULL,
  PRIMARY KEY (`Payroll_Set_Date_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `tbl_payroll_set_date` (`Payroll_Set_Date_ID`, `Start_Date`, `End_Date`) VALUES
(1, '2023-01-01', '2023-01-15');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_payroll_list`
--

CREATE TABLE `tbl_payroll_list` (
  `Payroll_List_ID` int(11) NOT NULL AUTO_INCREMENT,
  `Employees_ID` int(11) NOT NULL,
  `Payroll_Date` date NOT NULL,
  `Net_Pay` decimal(10,2) NOT NULL,
  PRIMARY KEY (`Payroll_List_ID`),
  KEY `Employees_ID` (`Employees_ID`),
  CONSTRAINT `fk_payroll_list_employees` FOREIGN KEY (`Employees_ID`) REFERENCES `tbl_employees_information` (`Employees_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `tbl_payroll_list` (`Payroll_List_ID`, `Employees_ID`, `Payroll_Date`, `Net_Pay`) VALUES
(1, 304, '2023-01-15', '1000.00'),
(2, 305, '2023-01-15', '1200.00');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_deduction`
--

CREATE TABLE `tbl_deduction` (
  `Deduction_ID` int(11) NOT NULL AUTO_INCREMENT,
  `Employees_ID` int(11) NOT NULL,
  `Month` varchar(255) NOT NULL,
  `Year` int(4) NOT NULL,
  `Deduction` decimal(10,2) NOT NULL,
  PRIMARY KEY (`Deduction_ID`),
  KEY `Employees_ID` (`Employees_ID`),
  CONSTRAINT `fk_deduction_employees` FOREIGN KEY (`Employees_ID`) REFERENCES `tbl_employees_information` (`Employees_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `tbl_deduction` (`Deduction_ID`, `Employees_ID`, `Month`, `Year`, `Deduction`) VALUES
(1, 304, 'January', 2023, '0.00'),
(2, 305, 'January', 2023, '0.00');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_attendance_summary`
--

CREATE TABLE `tbl_attendance_summary` (
  `Attendance_ID` int(11) NOT NULL AUTO_INCREMENT,
  `Employees_ID` int(11) NOT NULL,
  `Total_Hours` decimal(10,2) NOT NULL,
  PRIMARY KEY (`Attendance_ID`),
  KEY `Employees_ID` (`Employees_ID`),
  CONSTRAINT `fk_attendance_summary_employees` FOREIGN KEY (`Employees_ID`) REFERENCES `tbl_employees_information` (`Employees_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `tbl_attendance_summary` (`Attendance_ID`, `Employees_ID`, `Total_Hours`) VALUES
(1, 304, '8.00'),
(2, 305, '9.00');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user_log`
--

CREATE TABLE `tbl_user_log` (
  `Log_ID` int(11) NOT NULL AUTO_INCREMENT,
  `Username` varchar(255) NOT NULL,
  `Login_Time` datetime NOT NULL,
  PRIMARY KEY (`Log_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `tbl_user_log` (`Log_ID`, `Username`, `Login_Time`) VALUES
(1, 'admin', '2023-01-01 08:00:00'),
(2, 'driver', '2023-01-01 09:00:00'),
(3, 'regular', '2023-01-01 10:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_logs`
--

CREATE TABLE `tbl_logs` (
  `Log_ID` int(11) NOT NULL AUTO_INCREMENT,
  `Action` varchar(255) NOT NULL,
  `Description` text NOT NULL,
  `Date_Time` datetime NOT NULL,
  `User_ID` int(11) NOT NULL,
  PRIMARY KEY (`Log_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `tbl_logs` (`Log_ID`, `Action`, `Description`, `Date_Time`, `User_ID`) VALUES
(1, 'Login', 'admin logged in', '2023-01-01 08:00:00', 117),
(2, 'Login', 'driver logged in', '2023-01-01 09:00:00', 118),
(3, 'Login', 'regular logged in', '2023-01-01 10:00:00', 119);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_accounts`
--
ALTER TABLE `tbl_accounts`
  ADD CONSTRAINT `fk_accounts_employees` FOREIGN KEY (`Employees_ID`) REFERENCES `tbl_employees_information` (`Employees_ID`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tbl_accounts`
--
ALTER TABLE `tbl_accounts`
  ADD CONSTRAINT `fk_accounts_company` FOREIGN KEY (`Company_ID`) REFERENCES `tbl_company_information` (`ID`);

--
-- Constraints for table `tbl_accounts`
--
ALTER TABLE `tbl_accounts`
  ADD CONSTRAINT `fk_accounts_employees` FOREIGN KEY (`Employees_ID`) REFERENCES `tbl_employees_information` (`Employees_ID`);

--
-- Constraints for table `tbl_salary_earning`
--
ALTER TABLE `tbl_salary_earning`
  ADD CONSTRAINT `fk_salary_earning_employees` FOREIGN KEY (`Employees_ID`) REFERENCES `tbl_employees_information` (`Employees_ID`);

--
-- Constraints for table `tbl_time_entries`
--
ALTER TABLE `tbl_time_entries`
  ADD CONSTRAINT `fk_time_entries_employees` FOREIGN KEY (`Employees_ID`) REFERENCES `tbl_employees_information` (`Employees_ID`);

--
-- Constraints for table `tbl_leave`
--
ALTER TABLE `tbl_leave`
  ADD CONSTRAINT `fk_leave_employees` FOREIGN KEY (`Employees_ID`) REFERENCES `tbl_employees_information` (`Employees_ID`);

--
-- Constraints for table `tbl_payroll_list`
--
ALTER TABLE `tbl_payroll_list`
  ADD CONSTRAINT `fk_payroll_list_employees` FOREIGN KEY (`Employees_ID`) REFERENCES `tbl_employees_information` (`Employees_ID`);

--
-- Constraints for table `tbl_deduction`
--
ALTER TABLE `tbl_deduction`
  ADD CONSTRAINT `fk_deduction_employees` FOREIGN KEY (`Employees_ID`) REFERENCES `tbl_employees_information` (`Employees_ID`);

--
-- Constraints for table `tbl_attendance_summary`
--
ALTER TABLE `tbl_attendance_summary`
  ADD CONSTRAINT `fk_attendance_summary_employees` FOREIGN KEY (`Employees_ID`) REFERENCES `tbl_employees_information` (`Employees_ID`);

--
-- Constraints for table `tbl_user_log`
--
ALTER TABLE `tbl_user_log`
  ADD CONSTRAINT `fk_user_log_accounts` FOREIGN KEY (`Username`) REFERENCES `tbl_accounts` (`Username`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
