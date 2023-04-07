-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 07, 2023 at 03:30 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.0.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `apsms`
--

-- --------------------------------------------------------

--
-- Table structure for table `actstatus`
--

CREATE TABLE `actstatus` (
  `SubID` int(11) NOT NULL,
  `ProcessingStage` varchar(30) NOT NULL,
  `ApprovalStatus` varchar(30) NOT NULL,
  `AssociateChecker` varchar(50) NOT NULL,
  `FinalChecker` varchar(50) NOT NULL,
  `AssociateRemarks` varchar(500) NOT NULL,
  `FinalRemarks` varchar(500) NOT NULL,
  `PostActRequirements` varchar(500) NOT NULL,
  `PostActDeadline` varchar(50) NOT NULL,
  `ForEval` enum('Yes','No') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `actstatus`
--

INSERT INTO `actstatus` (`SubID`, `ProcessingStage`, `ApprovalStatus`, `AssociateChecker`, `FinalChecker`, `AssociateRemarks`, `FinalRemarks`, `PostActRequirements`, `PostActDeadline`, `ForEval`) VALUES
(1, 'For First Checking', 'Denied', 'dasas', 'asdasd', 'asdasdas', 'asdasd', 'Pre-Acts Requirements\r\n                            General Attendance Log Sheet\r\n                            Audited List of Expenses\r\n                            List of Pictures\r\n                            Activity Report', '2023-04-13', 'Yes'),
(2, 'For Second Checking', 'Early Approved', 'asdasd', 'asdasd', 'asdasa', 'asdasd', 'Pre-Acts Requirements\r\n                            Signed Broadcast Consent Form/s (if applicable)\r\n                            General Attendance Log Sheet\r\n                            Audited List of Expenses\r\n                            List of Pictures\r\n                            Activity Report\r\n                            AMT Evaluation Results (if applicable)', '2023-04-27', 'Yes'),
(3, 'CHECKED', 'DENIED', 'LOUIE', 'JAMES', 'ALOT', 'MANY', 'ALOT', '05-23-2023', 'Yes'),
(4, 'CHECKED', 'DENIED', 'LOUIE', 'JAMES', 'ALOT', 'MANY', 'ALOT', '05-23-2023', 'Yes'),
(5, 'CHECKED', 'DENIED', 'LOUIE', 'JAMES', 'ALOT', 'MANY', 'ALOT', '05-23-2023', 'Yes'),
(6, 'CHECKED', 'DENIED', 'LOUIE', 'JAMES', 'ALOT', 'MANY', 'ALOT', '05-23-2023', 'Yes'),
(7, 'For First Checking', 'Half Incentive', 'asdasd', 'asdasd', 'asdasda', 'asdas', 'Pre-Acts Requirements\r\n                            General Attendance Log Sheet\r\n                            Audited List of Expenses\r\n                            List of Pictures\r\n                            Activity Report', '2023-04-13', 'Yes'),
(8, 'CHECKED', 'DENIED', 'LOUIE', 'JAMES', 'ALOT', 'MANY', 'ALOT', '05-23-2023', 'Yes');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `actstatus`
--
ALTER TABLE `actstatus`
  ADD UNIQUE KEY `id` (`SubID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `actstatus`
--
ALTER TABLE `actstatus`
  MODIFY `SubID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
