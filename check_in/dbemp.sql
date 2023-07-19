-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jul 19, 2023 at 09:27 AM
-- Server version: 8.0.30
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dbemp`
--

-- --------------------------------------------------------

--
-- Table structure for table `department`
--

CREATE TABLE `department` (
  `DepartmentID` varchar(2) NOT NULL,
  `DepartmentName` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `department`
--

INSERT INTO `department` (`DepartmentID`, `DepartmentName`) VALUES
('AC', 'บัญชี'),
('BA', 'บริหาร'),
('HR', 'งานบุคคล'),
('MK', 'การตลาด'),
('PG', 'โปรแกรมเมอร์'),
('PR', 'ประชาสัมพันธ์'),
('SE', 'ส่งเสริมการขาย');

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

CREATE TABLE `employee` (
  `EmployeeID` varchar(6) NOT NULL,
  `Title` varchar(10) NOT NULL,
  `Name` varchar(30) NOT NULL,
  `Sex` varchar(10) NOT NULL,
  `Education` varchar(20) NOT NULL,
  `Start_Date` date NOT NULL,
  `Salary` float NOT NULL,
  `DepartmentID` varchar(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`EmployeeID`, `Title`, `Name`, `Sex`, `Education`, `Start_Date`, `Salary`, `DepartmentID`) VALUES
('405021', 'นาย', 'พิริยากร', 'ชาย', 'ปริญญาตรี', '2023-07-12', 1000, 'AC'),
('405039', 'นาย', 'วรรณะ', 'ชาย', 'ปริญญาตรี', '2023-07-12', 1000, 'HR'),
('405070', 'นางสาว', 'ธิภาพร', 'หญิง', 'ปริญญาตรี', '2018-02-10', 14000, 'HR'),
('405088', 'นาย', 'ทศพล', 'ชาย', 'ปริญญาตรี', '2016-10-06', 13600, 'SE'),
('405096', 'นาย', 'สมเกียรติ', 'ชาย', 'ปริญญาตรี', '2016-08-06', 14200, 'HR'),
('405112', 'นาย', 'ชณายุทธ', 'ชาย', 'ปริญญาตรี', '2017-09-30', 12800, 'SE'),
('405120', 'นางสาว', 'สุธิภา', 'หญิง', 'ปริญญาโท', '2016-12-11', 13600, 'PR'),
('405138', 'นาย', 'สุทธิพงษ์', 'ชาย', 'ปริญญาตรี', '2018-05-09', 18600, 'PG'),
('405204', 'นาย', 'ปรัชญา', 'ชาย', 'ปริญญาตรี', '2016-10-06', 15700, 'AC'),
('405211', 'นาย', 'รณภพ', 'ชาย', 'ปริญญาตรี', '2016-08-06', 24000, 'BA'),
('405245', 'นาย', 'อภิศักดิ์', 'ชาย', 'ปริญญาตรี', '2018-02-06', 17900, 'PG');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `department`
--
ALTER TABLE `department`
  ADD PRIMARY KEY (`DepartmentID`),
  ADD UNIQUE KEY `DepartmentID` (`DepartmentID`);

--
-- Indexes for table `employee`
--
ALTER TABLE `employee`
  ADD PRIMARY KEY (`EmployeeID`),
  ADD KEY `DepartmentID` (`DepartmentID`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `department`
--
ALTER TABLE `department`
  ADD CONSTRAINT `department_ibfk_1` FOREIGN KEY (`DepartmentID`) REFERENCES `department` (`DepartmentID`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Constraints for table `employee`
--
ALTER TABLE `employee`
  ADD CONSTRAINT `employee_ibfk_1` FOREIGN KEY (`DepartmentID`) REFERENCES `department` (`DepartmentID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
