-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 08, 2024 at 03:39 AM
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
-- Database: `elibing`
--

-- --------------------------------------------------------

--
-- Table structure for table `selected_slots`
--

CREATE TABLE `selected_slots` (
  `id` int(11) NOT NULL,
  `date_selected` date DEFAULT NULL,
  `profile_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `selected_slots`
--

INSERT INTO `selected_slots` (`id`, `date_selected`, `profile_id`) VALUES
(14, '2024-04-12', 52),
(15, '2024-04-18', 53),
(16, '2024-04-17', 54),
(17, '2024-04-24', 55);

-- --------------------------------------------------------

--
-- Table structure for table `slot_availability`
--

CREATE TABLE `slot_availability` (
  `id` int(11) NOT NULL,
  `day_of_week` varchar(20) NOT NULL,
  `slots_available` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `slot_availability`
--

INSERT INTO `slot_availability` (`id`, `day_of_week`, `slots_available`) VALUES
(1, 'Monday', 0),
(2, 'Tuesday', 3),
(3, 'Wednesday', 1),
(4, 'Thursday', 2),
(5, 'Friday', 2),
(6, 'Saturday', 4),
(7, 'Sunday', 4);

-- --------------------------------------------------------

--
-- Table structure for table `tblburiedrecord`
--

CREATE TABLE `tblburiedrecord` (
  `BurID` int(11) NOT NULL,
  `Profid` int(11) NOT NULL,
  `Nid` varchar(11) NOT NULL,
  `OccupancyDate` date NOT NULL,
  `Status1` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tblburiedrecord`
--

INSERT INTO `tblburiedrecord` (`BurID`, `Profid`, `Nid`, `OccupancyDate`, `Status1`) VALUES
(16, 54, 'N03', '2024-04-03', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tblcontactinfo`
--

CREATE TABLE `tblcontactinfo` (
  `ProfID` int(11) NOT NULL,
  `ContactNo` varchar(15) NOT NULL,
  `Email` varchar(255) NOT NULL,
  `Createdby` varchar(255) NOT NULL,
  `CreatedWhen` varchar(255) NOT NULL,
  `CreatedMachineby` varchar(255) NOT NULL,
  `CreatedSoftwareby` varchar(255) NOT NULL,
  `ModifiedWhen` varchar(255) NOT NULL,
  `ModifiedMachineby` varchar(255) NOT NULL,
  `ModifiedSoftwareby` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tblcontactinfo`
--

INSERT INTO `tblcontactinfo` (`ProfID`, `ContactNo`, `Email`, `Createdby`, `CreatedWhen`, `CreatedMachineby`, `CreatedSoftwareby`, `ModifiedWhen`, `ModifiedMachineby`, `ModifiedSoftwareby`) VALUES
(54, '09952665097', 'gwyncastillo0604@gmail.com', 'Admin', '2024-04-03', '', 'E-Libing', '', '', 'E-Libing'),
(55, '09952665097', 'admin@gmail.com', 'Admin', '2024-04-03', '', 'E-Libing', '', '', 'E-Libing');

-- --------------------------------------------------------

--
-- Table structure for table `tbldeathrecord`
--

CREATE TABLE `tbldeathrecord` (
  `ProfileID` int(255) NOT NULL,
  `DateofDeath` date NOT NULL,
  `CauseofDeath` varchar(255) NOT NULL,
  `IntermentPlace` varchar(255) NOT NULL,
  `IntermentDateTime` datetime NOT NULL,
  `Lname` varchar(255) NOT NULL,
  `Fname` varchar(255) NOT NULL,
  `Mname` varchar(255) NOT NULL,
  `Suffix` varchar(2) NOT NULL,
  `Birthydate` date NOT NULL,
  `currentdate` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbldeathrecord`
--

INSERT INTO `tbldeathrecord` (`ProfileID`, `DateofDeath`, `CauseofDeath`, `IntermentPlace`, `IntermentDateTime`, `Lname`, `Fname`, `Mname`, `Suffix`, `Birthydate`, `currentdate`) VALUES
(54, '2024-04-04', 'Tumor', 'ACAMP', '2024-04-17 01:00:00', 'zxczc', 'xzcxzc', 'xzcxzcxz', 'Jr', '2024-04-03', '2024-04-03'),
(55, '2024-04-23', 'fdds', 'dfdsf', '2024-04-24 01:00:00', 'fdsfds', 'fdsf', 'dsfsdf', 'Sr', '2024-04-03', '2024-04-03');

-- --------------------------------------------------------

--
-- Table structure for table `tblintermentreservation`
--

CREATE TABLE `tblintermentreservation` (
  `AppointmentID` int(11) NOT NULL,
  `Requestor` varchar(255) NOT NULL,
  `Nid` varchar(255) NOT NULL,
  `Relationship` varchar(50) NOT NULL,
  `profID` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tblintermentreservation`
--

INSERT INTO `tblintermentreservation` (`AppointmentID`, `Requestor`, `Nid`, `Relationship`, `profID`) VALUES
(30, 'Mary Gwyneth Sangga', 'N03', 'Daughter', '54'),
(31, 'sfcdsfsd', 'N04', 'Son', '55');

-- --------------------------------------------------------

--
-- Table structure for table `tblniche`
--

CREATE TABLE `tblniche` (
  `Nid` varchar(255) NOT NULL,
  `LocID` varchar(255) NOT NULL,
  `Level` int(11) NOT NULL,
  `Nno` int(11) NOT NULL,
  `Size` varchar(255) NOT NULL,
  `Status` varchar(50) NOT NULL,
  `currentdate` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tblniche`
--

INSERT INTO `tblniche` (`Nid`, `LocID`, `Level`, `Nno`, `Size`, `Status`, `currentdate`) VALUES
('N01', 'L001', 1, 1, '12', '2', '2024-04-03'),
('N02', 'L001', 1, 2, '12', '2', '2024-04-03'),
('N03', 'L001', 1, 3, '12', '2', '2024-04-03'),
('N04', 'L001', 1, 4, '12', '1', '2024-04-03'),
('N05', 'L001', 1, 5, '12', '0', '2024-04-03'),
('N06', 'L001', 2, 6, '12', '0', '2024-04-03'),
('N07', 'L001', 2, 7, '12', '0', '2024-04-03'),
('N08', 'L001', 2, 8, '12', '0', '2024-04-03'),
('N09', 'L001', 2, 9, '12', '0', '2024-04-03'),
('N10', 'L001', 2, 10, '12', '0', '2024-04-03');

-- --------------------------------------------------------

--
-- Table structure for table `tblnichelocation`
--

CREATE TABLE `tblnichelocation` (
  `LocID` varchar(255) NOT NULL,
  `NLName` varchar(255) NOT NULL,
  `Size` int(11) NOT NULL,
  `Description` varchar(255) NOT NULL,
  `Type` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tblnichelocation`
--

INSERT INTO `tblnichelocation` (`LocID`, `NLName`, `Size`, `Description`, `Type`) VALUES
('L001', 'FS-0001 TO FS1-1148', 12, 'Adult', 'Apartment');

-- --------------------------------------------------------

--
-- Table structure for table `tblpayment`
--

CREATE TABLE `tblpayment` (
  `id` int(11) NOT NULL,
  `profileID` int(11) NOT NULL,
  `totalpayment` varchar(255) NOT NULL,
  `gatepassno` varchar(255) NOT NULL,
  `currentdate` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tblpayment`
--

INSERT INTO `tblpayment` (`id`, `profileID`, `totalpayment`, `gatepassno`, `currentdate`) VALUES
(19, 54, '2,000.00', '532686', '2024-04-03'),
(20, 55, '2,000.00', '858104', '2024-04-03');

-- --------------------------------------------------------

--
-- Table structure for table `tbluserslogin`
--

CREATE TABLE `tbluserslogin` (
  `UserID` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `pw` varchar(255) NOT NULL,
  `Createdby` varchar(255) NOT NULL,
  `Restriction` varchar(255) NOT NULL,
  `CreatedDate` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbluserslogin`
--

INSERT INTO `tbluserslogin` (`UserID`, `username`, `pw`, `Createdby`, `Restriction`, `CreatedDate`) VALUES
(6, 'admin@gmail.com', 'admin', 'Admin', 'E-Libing Admin', '2023-12-05'),
(7, 'staff@gmail.com', 'staff', 'Staff', 'E-Libing Staff', '2023-12-05'),
(8, 'acampsite@gmail.com', 'site', 'Acamp Site', 'E-Libing ACAMP Site', '2023-12-05'),
(9, 'client@gmail.com', '123', 'Client1', 'E-Libing Client', '2024-04-03');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_audit_trail`
--

CREATE TABLE `tbl_audit_trail` (
  `User_ID` int(11) NOT NULL,
  `Date` date NOT NULL DEFAULT current_timestamp(),
  `Timex` time NOT NULL DEFAULT current_timestamp(),
  `Action` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_audit_trail`
--

INSERT INTO `tbl_audit_trail` (`User_ID`, `Date`, `Timex`, `Action`) VALUES
(1, '2023-12-02', '02:20:01', 'Log-in'),
(1, '2023-12-02', '02:32:45', 'Log-in'),
(1, '2023-12-02', '02:35:46', 'Log-in'),
(1, '2023-12-02', '17:22:32', 'Log-in'),
(1, '2023-12-02', '17:28:12', 'Log-in'),
(1, '2023-12-02', '17:58:34', 'Log-in'),
(1, '2023-12-02', '18:04:06', 'Add Block: Individual Bone Chamber'),
(1, '2023-12-02', '18:04:27', 'Add Block: Individual Bone Chamber'),
(1, '2023-12-02', '18:04:34', 'Add Block: Individual Bone Chamber'),
(1, '2023-12-02', '18:04:46', 'Add Block: Individual Bone Chamber'),
(1, '2023-12-02', '18:05:46', 'Add Block: Common Bone Chamber'),
(1, '2023-12-02', '18:06:57', 'Add Block: Individual Bone Chamber'),
(1, '2023-12-02', '18:07:08', 'Add Block: Apartment'),
(1, '2023-12-02', '18:08:36', 'Add Block: Apartment'),
(1, '2023-12-02', '18:09:00', 'Add Block: Individual Bone Chamber'),
(1, '2023-12-02', '18:09:04', 'Add Block: Common Bone Chamber'),
(1, '2023-12-02', '18:09:34', 'Add Block: Common Bone Chamber'),
(1, '2023-12-02', '18:11:35', 'Add Block: Individual Bone Chamber'),
(1, '2023-12-02', '18:11:51', 'Add Block: Common Bone Chamber'),
(1, '2023-12-02', '18:11:56', 'Add Block: Individual Bone Chamber'),
(1, '2023-12-02', '18:14:03', 'Add Block: Common Bone Chamber'),
(1, '2023-12-02', '18:14:30', 'Add Block: Apartment'),
(1, '2023-12-02', '18:14:37', 'Add Block: Individual Bone Chamber'),
(1, '2023-12-02', '18:14:41', 'Add Block: Common Bone Chamber'),
(1, '2023-12-02', '18:15:22', 'Log-in'),
(1, '2023-12-02', '18:25:53', 'Add Niche'),
(1, '2023-12-02', '18:26:10', 'Add Niche'),
(1, '2023-12-02', '18:26:12', 'Add Niche'),
(1, '2023-12-02', '18:26:13', 'Add Niche'),
(1, '2023-12-02', '18:26:50', 'Add Niche'),
(1, '2023-12-02', '18:27:10', 'Add Niche'),
(1, '2023-12-02', '18:27:26', 'Add Niche'),
(1, '2023-12-02', '18:27:34', 'Add Niche'),
(1, '2023-12-02', '18:27:35', 'Add Niche'),
(1, '2023-12-02', '18:28:22', 'Add Niche'),
(1, '2023-12-02', '18:28:24', 'Add Niche'),
(1, '2023-12-02', '18:29:21', 'Add Niche'),
(1, '2023-12-02', '18:29:32', 'Add Niche'),
(1, '2023-12-02', '18:30:18', 'Add Niche'),
(1, '2023-12-02', '18:30:20', 'Add Niche'),
(1, '2023-12-02', '18:30:24', 'Add Niche'),
(1, '2023-12-02', '18:30:26', 'Add Niche'),
(1, '2023-12-02', '18:30:27', 'Add Niche'),
(1, '2023-12-02', '18:30:50', 'Add Niche'),
(1, '2023-12-02', '18:30:51', 'Add Niche'),
(1, '2023-12-02', '18:30:52', 'Add Niche'),
(1, '2023-12-02', '18:30:53', 'Add Niche'),
(1, '2023-12-02', '18:31:27', 'Add Niche'),
(1, '2023-12-02', '18:32:05', 'Add Niche'),
(1, '2023-12-02', '18:32:09', 'Add Niche'),
(1, '2023-12-02', '18:33:34', 'Add Niche'),
(1, '2023-12-02', '18:34:15', 'Add Niche'),
(1, '2023-12-02', '18:34:27', 'Add Niche'),
(1, '2023-12-02', '18:34:39', 'Add Niche'),
(1, '2023-12-02', '18:34:42', 'Add Niche'),
(1, '2023-12-02', '18:34:43', 'Add Niche'),
(1, '2023-12-02', '18:34:51', 'Add Niche'),
(1, '2023-12-02', '18:35:00', 'Add Niche'),
(1, '2023-12-02', '18:35:05', 'Add Niche'),
(1, '2023-12-02', '18:35:13', 'Add Niche'),
(1, '2023-12-02', '18:35:20', 'Add Niche'),
(1, '2023-12-02', '18:35:24', 'Add Niche'),
(1, '2023-12-02', '18:35:27', 'Add Niche'),
(1, '2023-12-02', '18:35:30', 'Add Niche'),
(1, '2023-12-02', '18:35:33', 'Add Niche'),
(1, '2023-12-02', '18:35:51', 'Add Niche'),
(1, '2023-12-02', '18:36:34', 'Add Niche'),
(1, '2023-12-02', '18:36:35', 'Add Niche'),
(1, '2023-12-02', '18:36:55', 'Add Niche'),
(1, '2023-12-02', '18:36:57', 'Add Niche'),
(1, '2023-12-02', '18:37:02', 'Add Niche'),
(1, '2023-12-02', '18:38:27', 'Add Niche'),
(1, '2023-12-02', '18:38:27', 'Add Niche'),
(1, '2023-12-02', '18:38:51', 'Log-in'),
(1, '2023-12-02', '18:39:01', 'Add Niche'),
(1, '2023-12-02', '18:39:54', 'Add Niche'),
(1, '2023-12-02', '18:39:57', 'Add Niche'),
(1, '2023-12-02', '18:40:18', 'Add Niche'),
(1, '2023-12-02', '18:40:20', 'Add Niche'),
(1, '2023-12-02', '18:40:21', 'Add Niche'),
(1, '2023-12-02', '18:40:31', 'Add Niche'),
(1, '2023-12-02', '18:40:37', 'Add Niche'),
(1, '2023-12-02', '18:40:40', 'Add Niche'),
(1, '2023-12-02', '18:40:41', 'Add Niche'),
(1, '2023-12-02', '18:40:44', 'Add Niche'),
(1, '2023-12-02', '18:40:45', 'Add Niche'),
(1, '2023-12-02', '18:40:46', 'Add Niche'),
(1, '2023-12-02', '18:40:46', 'Add Niche'),
(1, '2023-12-02', '18:40:46', 'Add Niche'),
(1, '2023-12-02', '18:40:49', 'Add Niche'),
(1, '2023-12-02', '18:40:50', 'Add Niche'),
(1, '2023-12-02', '18:41:02', 'Add Niche'),
(1, '2023-12-02', '18:41:02', 'Add Niche'),
(1, '2023-12-02', '18:41:03', 'Add Niche'),
(1, '2023-12-02', '18:41:04', 'Add Niche'),
(1, '2023-12-02', '18:41:20', 'Add Niche'),
(1, '2023-12-02', '18:41:44', 'Log-in'),
(1, '2023-12-02', '18:42:32', 'Add Niche'),
(1, '2023-12-02', '18:43:06', 'Add Niche'),
(1, '2023-12-02', '18:43:09', 'Add Niche'),
(1, '2023-12-02', '18:43:10', 'Add Niche'),
(1, '2023-12-02', '18:43:13', 'Add Niche'),
(1, '2023-12-02', '18:43:19', 'Add Niche'),
(1, '2023-12-02', '18:43:20', 'Add Niche'),
(1, '2023-12-02', '18:43:22', 'Add Niche'),
(1, '2023-12-02', '18:43:24', 'Add Niche'),
(1, '2023-12-02', '18:43:28', 'Add Niche'),
(1, '2023-12-02', '18:44:57', 'Add Niche'),
(1, '2023-12-02', '18:46:13', 'Add Niche'),
(1, '2023-12-02', '19:06:47', 'New Added Occupant: John  Cena '),
(1, '2023-12-02', '19:53:44', 'New Added Occupant: John A Smith'),
(1, '2023-12-02', '09:34:34', 'Log-out'),
(1, '2023-12-02', '21:34:40', 'Log-in'),
(1, '2023-12-02', '09:38:04', 'Log-out'),
(1, '2023-12-02', '21:38:08', 'Log-in'),
(1, '2023-12-02', '09:39:42', 'Log-out'),
(1, '2023-12-02', '21:39:49', 'Log-in'),
(1, '2023-12-03', '01:08:52', 'Log-out'),
(1, '2023-12-03', '01:09:01', 'Log-in'),
(1, '2023-12-03', '15:41:59', 'Log-in'),
(1, '2023-12-03', '17:06:46', 'Pull Out the deceased'),
(1, '2023-12-03', '17:13:12', 'Pull Out the deceased'),
(1, '2023-12-03', '17:13:20', 'Pull Out the deceased'),
(1, '2023-12-03', '17:14:02', 'Pull Out the deceased'),
(1, '2023-12-03', '17:24:57', 'Update Data'),
(1, '2023-12-03', '17:25:50', 'Update Data'),
(1, '2023-12-03', '17:26:04', 'Update Data'),
(1, '2023-12-03', '17:26:24', 'Update Data'),
(1, '2023-12-03', '17:27:56', 'Update Data'),
(1, '2023-12-03', '19:06:35', 'Log-in'),
(1, '2023-12-03', '20:20:43', 'Log-in'),
(1, '2023-12-04', '12:47:20', 'Log-in'),
(1, '2023-12-04', '12:48:33', 'New Added Occupant: Seven  Eleven'),
(1, '2023-12-04', '16:12:29', 'Log-in'),
(1, '2023-12-04', '17:25:51', 'New Added Occupant: Bull  Pack'),
(1, '2023-12-04', '18:04:01', 'New Added Occupant: SM  Ecoland'),
(1, '2023-12-04', '06:31:56', 'Log-out'),
(1, '2023-12-04', '18:32:00', 'Log-in'),
(1, '2023-12-04', '18:51:00', 'New Added Occupant: Abreeza  Mall'),
(1, '2023-12-04', '20:02:38', 'Log-in'),
(1, '2023-12-04', '20:26:37', 'Log-in'),
(1, '2023-12-04', '20:27:01', 'Log-in'),
(1, '2023-12-04', '20:27:38', 'New Added User'),
(1, '2023-12-04', '20:27:44', 'New Added User'),
(1, '2023-12-04', '20:28:01', 'New Added User'),
(1, '2023-12-04', '20:28:05', 'New Added User'),
(1, '2023-12-04', '20:28:12', 'New Added User'),
(1, '2023-12-04', '20:28:16', 'New Added User'),
(1, '2023-12-04', '20:28:19', 'New Added User'),
(1, '2023-12-04', '20:28:27', 'New Added User'),
(1, '2023-12-04', '20:28:34', 'New Added User'),
(1, '2023-12-04', '20:28:57', 'New Added User'),
(3, '2023-12-04', '20:34:00', 'Update Data'),
(3, '2023-12-04', '20:34:16', 'Update Data'),
(3, '2023-12-04', '20:34:29', 'Update Data'),
(3, '2023-12-04', '20:35:14', 'Update Data'),
(3, '2023-12-04', '20:35:41', 'Update Data'),
(3, '2023-12-04', '20:36:34', 'Update Data'),
(1, '2023-12-04', '08:37:04', 'Log-out'),
(3, '2023-12-04', '20:37:07', 'Log-in'),
(3, '2023-12-04', '20:42:23', 'Update Data'),
(3, '2023-12-04', '20:42:28', 'Pull Out the deceased'),
(3, '2023-12-04', '20:43:04', 'Update Data'),
(3, '2023-12-04', '20:43:09', 'Pull Out the deceased'),
(3, '2023-12-04', '20:47:28', 'Add Block: Apartment'),
(3, '2023-12-04', '20:48:04', 'Add Block: Apartment'),
(3, '2023-12-04', '20:49:02', 'Add Niche'),
(3, '2023-12-04', '20:50:00', 'Add Niche'),
(1, '2023-12-04', '20:52:54', 'Log-in'),
(1, '2023-12-04', '20:53:29', 'New Added Occupant: Nccc  Mall'),
(1, '2023-12-04', '21:05:16', 'New Added Occupant: Sm  Seaside'),
(1, '2023-12-04', '09:08:22', 'Log-out'),
(2, '2023-12-04', '21:08:49', 'Log-in'),
(2, '2023-12-04', '21:16:23', 'New Added Occupant: dww  da'),
(2, '2023-12-04', '09:17:25', 'Log-out'),
(1, '2023-12-04', '21:17:29', 'Log-in'),
(1, '2023-12-04', '21:17:49', 'New Added User'),
(4, '2023-12-04', '21:18:08', 'Log-in'),
(4, '2023-12-04', '09:25:44', 'Log-out'),
(1, '2023-12-04', '21:25:51', 'Log-in'),
(1, '2023-12-04', '09:27:59', 'Log-out'),
(1, '2023-12-04', '21:28:03', 'Log-in'),
(1, '2023-12-04', '21:28:51', 'New Added User'),
(5, '2023-12-04', '21:29:06', 'Log-in'),
(5, '2023-12-04', '21:29:58', 'Update Data'),
(1, '2023-12-04', '22:32:03', 'Log-in'),
(1, '2023-12-05', '01:42:20', 'Log-in'),
(1, '2023-12-05', '02:45:55', 'Log-out'),
(5, '2023-12-05', '02:46:03', 'Log-in'),
(5, '2023-12-05', '02:54:37', 'Log-out'),
(6, '2023-12-05', '02:55:02', 'Log-in'),
(6, '2023-12-05', '02:55:27', 'Log-in'),
(6, '2023-12-05', '02:55:46', 'New Added User'),
(7, '2023-12-05', '02:56:02', 'Log-in'),
(7, '2023-12-05', '02:56:13', 'Add Block: Apartment'),
(7, '2023-12-05', '02:56:29', 'Add Niche'),
(7, '2023-12-05', '02:57:10', 'New Added Occupant: Sm  Seaside'),
(7, '2023-12-05', '03:04:19', 'New Added Occupant: test t Test'),
(6, '2023-12-05', '09:26:17', 'Log-in'),
(6, '2023-12-05', '09:28:00', 'New Added Occupant: dd dd tesddq'),
(6, '2023-12-05', '09:36:16', 'Add Block: Common Bone Chamber'),
(6, '2023-12-05', '09:52:31', 'New Added Occupant: oooo oo awdjoo'),
(6, '2023-12-05', '10:03:22', 'Add Niche'),
(6, '2023-12-05', '10:13:57', 'Add Niche'),
(7, '2023-12-05', '10:14:47', 'Log-in'),
(6, '2023-12-05', '10:39:21', 'Log-in'),
(6, '2023-12-05', '10:39:52', 'Add Block: Apartment'),
(6, '2023-12-05', '10:40:01', 'Add Block: Common Bone Chamber'),
(6, '2023-12-05', '10:40:14', 'Add Niche'),
(6, '2023-12-05', '10:41:20', 'New Added Occupant: John R. Doe'),
(6, '2023-12-05', '10:42:58', 'New Added Occupant: Layla L. Delacruz'),
(7, '2023-12-05', '10:54:33', 'Log-in'),
(7, '2023-12-05', '10:55:54', 'New Added User'),
(8, '2023-12-05', '10:56:08', 'Log-in'),
(8, '2023-12-05', '11:13:37', 'New Added Occupant: Juan C. Cruz'),
(6, '2023-12-05', '21:07:43', 'Log-in'),
(6, '2023-12-05', '21:17:43', 'New Added Occupant: kk k kk'),
(6, '2023-12-06', '22:02:48', 'Log-in'),
(6, '2023-12-06', '22:05:57', 'Log-in'),
(6, '2023-12-06', '22:15:11', 'Log-in'),
(6, '2023-12-06', '22:16:45', 'New Added Occupant: John R. Doe'),
(6, '2023-12-06', '22:17:09', 'Add Block: Apartment'),
(6, '2023-12-06', '22:17:25', 'Add Block: Apartment'),
(6, '2023-12-06', '22:17:39', 'Add Block: Apartment'),
(6, '2023-12-06', '22:18:02', 'Add Block: Apartment'),
(6, '2023-12-06', '22:24:30', 'New Added Occupant: John R. Doe'),
(6, '2023-12-06', '22:24:57', 'Add Niche'),
(6, '2023-12-06', '22:25:06', 'Add Niche'),
(6, '2023-12-06', '22:26:41', 'New Added Occupant: John R. Doe'),
(6, '2023-12-06', '22:28:18', 'New Added Occupant: Juan L. Delacruz'),
(6, '2023-12-06', '22:29:51', 'New Added Occupant: Anna P. Cruz'),
(6, '2023-12-06', '22:38:14', 'New Added Occupant: Juanita M. Rojas'),
(6, '2023-12-06', '10:41:24', 'Log-out'),
(7, '2023-12-06', '22:41:32', 'Log-in'),
(7, '2023-12-06', '10:41:45', 'Log-out'),
(8, '2023-12-06', '22:41:53', 'Log-in'),
(8, '2023-12-06', '10:42:07', 'Log-out'),
(6, '2023-12-06', '22:46:37', 'Log-in'),
(6, '2023-12-07', '09:12:20', 'Log-in'),
(6, '2023-12-07', '09:15:35', 'Renew: Carla Sophia Huelar'),
(6, '2023-12-07', '09:15:51', 'Renew: Carla Sophia Huelar'),
(6, '2023-12-07', '09:16:19', 'Pull Out the deceased'),
(6, '2023-12-07', '09:21:09', 'New Added Occupant: pp p pp'),
(6, '2023-12-07', '09:22:41', 'New Added Occupant: kk kk kk'),
(7, '2023-12-07', '09:39:50', 'Log-in'),
(7, '2023-12-07', '09:45:54', 'New Added Occupant: mm m mmm'),
(7, '2023-12-07', '09:57:17', 'Accept payment: Ken Rojas'),
(8, '2024-04-03', '09:21:34', 'Log-in'),
(6, '2024-04-03', '09:21:41', 'Log-in'),
(7, '2024-04-03', '09:21:47', 'Log-in'),
(7, '2024-04-03', '09:22:14', 'New Added Occupant: dasdas asdsa sadsd'),
(7, '2024-04-03', '09:23:29', 'Add Block: Apartment'),
(7, '2024-04-03', '09:23:52', 'Add Niche'),
(7, '2024-04-03', '09:24:00', 'Add Niche'),
(7, '2024-04-03', '09:24:44', 'New Added Occupant: John Cruz Dela Cruz'),
(7, '2024-04-03', '09:25:47', 'Accept payment: Mary Gwyneth Sangga'),
(9, '2024-04-03', '09:31:10', 'Log-in'),
(9, '2024-04-03', '09:31:45', 'New Added Occupant: vxcvxc vcvxcvxc vcvccx'),
(9, '2024-04-03', '10:37:30', 'Update Applicant Info: Mary Gwyneth Sangga'),
(6, '2024-04-03', '10:39:15', 'Log-in'),
(6, '2024-04-03', '10:39:53', 'Update Applicant Info: Mary Gwyneth Sangga'),
(6, '2024-04-03', '10:40:57', 'Log-in'),
(6, '2024-04-03', '10:40:57', 'Log-in'),
(6, '2024-04-03', '10:42:42', 'New Added Occupant: xzcxzc xzcxzcxz zxczc'),
(6, '2024-04-03', '10:43:00', 'Accept payment: Mary Gwyneth Sangga'),
(6, '2024-04-03', '14:51:15', 'Log-in'),
(6, '2024-04-03', '14:53:09', 'New Added Occupant: fdsf dsfsdf fdsfds'),
(6, '2024-04-03', '14:55:11', 'Accept payment: sfcdsfsd'),
(7, '2024-04-03', '14:57:17', 'Log-in'),
(6, '2024-04-08', '09:33:59', 'Log-in');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `selected_slots`
--
ALTER TABLE `selected_slots`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `slot_availability`
--
ALTER TABLE `slot_availability`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tblburiedrecord`
--
ALTER TABLE `tblburiedrecord`
  ADD PRIMARY KEY (`BurID`);

--
-- Indexes for table `tblcontactinfo`
--
ALTER TABLE `tblcontactinfo`
  ADD PRIMARY KEY (`ProfID`);

--
-- Indexes for table `tbldeathrecord`
--
ALTER TABLE `tbldeathrecord`
  ADD PRIMARY KEY (`ProfileID`);

--
-- Indexes for table `tblintermentreservation`
--
ALTER TABLE `tblintermentreservation`
  ADD PRIMARY KEY (`AppointmentID`);

--
-- Indexes for table `tblniche`
--
ALTER TABLE `tblniche`
  ADD PRIMARY KEY (`Nid`);

--
-- Indexes for table `tblnichelocation`
--
ALTER TABLE `tblnichelocation`
  ADD PRIMARY KEY (`LocID`);

--
-- Indexes for table `tblpayment`
--
ALTER TABLE `tblpayment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbluserslogin`
--
ALTER TABLE `tbluserslogin`
  ADD PRIMARY KEY (`UserID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `selected_slots`
--
ALTER TABLE `selected_slots`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `slot_availability`
--
ALTER TABLE `slot_availability`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tblburiedrecord`
--
ALTER TABLE `tblburiedrecord`
  MODIFY `BurID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `tbldeathrecord`
--
ALTER TABLE `tbldeathrecord`
  MODIFY `ProfileID` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;

--
-- AUTO_INCREMENT for table `tblintermentreservation`
--
ALTER TABLE `tblintermentreservation`
  MODIFY `AppointmentID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `tblpayment`
--
ALTER TABLE `tblpayment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `tbluserslogin`
--
ALTER TABLE `tbluserslogin`
  MODIFY `UserID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
