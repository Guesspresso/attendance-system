-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 23, 2025 at 08:18 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `puncherdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `account`
--

CREATE TABLE `account` (
  `acct_id` int(10) NOT NULL,
  `acct_uid` varchar(11) NOT NULL,
  `acct_email` varchar(50) NOT NULL,
  `acct_password` text NOT NULL,
  `acct_creation` date NOT NULL DEFAULT current_timestamp(),
  `acct_updation` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `account`
--

INSERT INTO `account` (`acct_id`, `acct_uid`, `acct_email`, `acct_password`, `acct_creation`, `acct_updation`) VALUES
(1, 'EMP001', '', '123123', '2025-09-22', '2025-09-22'),
(2, 'EMP002', '', '123123', '2025-09-23', '2025-09-23');

-- --------------------------------------------------------

--
-- Table structure for table `attendance`
--

CREATE TABLE `attendance` (
  `attn_id` int(11) NOT NULL,
  `employee_id` int(11) NOT NULL,
  `attn_date` date NOT NULL DEFAULT current_timestamp(),
  `attn_in` time NOT NULL,
  `attn_out` time NOT NULL,
  `attn_status` enum('Present','Late','Absent','Leave') NOT NULL DEFAULT 'Present'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `attendance`
--

INSERT INTO `attendance` (`attn_id`, `employee_id`, `attn_date`, `attn_in`, `attn_out`, `attn_status`) VALUES
(1, 1, '2025-09-22', '07:10:59', '00:00:00', 'Present');

-- --------------------------------------------------------

--
-- Table structure for table `audit`
--

CREATE TABLE `audit` (
  `id` int(11) NOT NULL,
  `action` varchar(10) NOT NULL,
  `audit_by` varchar(11) NOT NULL,
  `audit_from` text NOT NULL,
  `audit_to` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `department`
--

CREATE TABLE `department` (
  `dept_id` int(11) NOT NULL,
  `dept_name` varchar(100) NOT NULL,
  `dept_desc` text NOT NULL,
  `dept_manager` int(10) NOT NULL,
  `dept_updated` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `department`
--

INSERT INTO `department` (`dept_id`, `dept_name`, `dept_desc`, `dept_manager`, `dept_updated`) VALUES
(1, 'Human Resources', 'Managing employees', 0, '2025-09-23');

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

CREATE TABLE `employee` (
  `employee_id` int(11) NOT NULL,
  `employee_usn` varchar(30) DEFAULT NULL,
  `employee_fn` varchar(50) NOT NULL,
  `employee_ln` varchar(20) NOT NULL,
  `employee_role` varchar(11) NOT NULL,
  `employee_dept` varchar(11) NOT NULL,
  `is_online` tinyint(1) DEFAULT NULL,
  `employee_update` date NOT NULL DEFAULT current_timestamp(),
  `employee_create` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`employee_id`, `employee_usn`, `employee_fn`, `employee_ln`, `employee_role`, `employee_dept`, `is_online`, `employee_update`, `employee_create`) VALUES
(1, 'EMP001', 'john', 'smith', 'admin', 'hr', 1, '2025-09-21', '2025-09-21'),
(3, 'EMP002', 'jvaun', 'schmidt', 'employee', 'hr', NULL, '2025-09-23', '2025-09-23');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `account`
--
ALTER TABLE `account`
  ADD PRIMARY KEY (`acct_id`);

--
-- Indexes for table `attendance`
--
ALTER TABLE `attendance`
  ADD PRIMARY KEY (`attn_id`);

--
-- Indexes for table `audit`
--
ALTER TABLE `audit`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `department`
--
ALTER TABLE `department`
  ADD PRIMARY KEY (`dept_id`);

--
-- Indexes for table `employee`
--
ALTER TABLE `employee`
  ADD PRIMARY KEY (`employee_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `account`
--
ALTER TABLE `account`
  MODIFY `acct_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `attendance`
--
ALTER TABLE `attendance`
  MODIFY `attn_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `audit`
--
ALTER TABLE `audit`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `department`
--
ALTER TABLE `department`
  MODIFY `dept_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `employee`
--
ALTER TABLE `employee`
  MODIFY `employee_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
