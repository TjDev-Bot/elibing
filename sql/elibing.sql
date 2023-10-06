-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 04, 2023 at 05:32 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

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
CREATE DATABASE IF NOT EXISTS `elibing` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `elibing`;

-- --------------------------------------------------------

--
-- Table structure for table `block`
--

DROP TABLE IF EXISTS `block`;
CREATE TABLE `block` (
  `block_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `block`
--

INSERT INTO `block` (`block_id`) VALUES
(12),
(13);

-- --------------------------------------------------------

--
-- Table structure for table `deceased`
--

DROP TABLE IF EXISTS `deceased`;
CREATE TABLE `deceased` (
  `deceased_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `dateofdeath` date NOT NULL,
  `interment` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `intermentform`
--

DROP TABLE IF EXISTS `intermentform`;
CREATE TABLE `intermentform` (
  `user_id` int(11) NOT NULL,
  `user_name` varchar(255) NOT NULL,
  `role` varchar(255) NOT NULL,
  `id` int(11) NOT NULL,
  `relationship` varchar(255) NOT NULL,
  `barangay` varchar(255) NOT NULL,
  `purok` varchar(255) NOT NULL,
  `actions` varchar(255) NOT NULL,
  `deceased` varchar(50) NOT NULL,
  `age` int(11) NOT NULL,
  `deathdate` date NOT NULL,
  `desired_date` date DEFAULT NULL,
  `desired_time` time(6) NOT NULL,
  `cur_date_time` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `intermentform`
--

INSERT INTO `intermentform` (`user_id`, `user_name`, `role`, `id`, `relationship`, `barangay`, `purok`, `actions`, `deceased`, `age`, `deathdate`, `desired_date`, `desired_time`, `cur_date_time`) VALUES
(0, '', 'client', 6, '', 'b19', 'prk1', '', 'nn', 22, '2023-09-09', '2023-09-29', '19:45:00.000000', '2023-09-23 19:04:26'),
(0, '', 'client', 8, 'ss', 'b17', 'prk1', '', 'ss', 11, '2023-09-26', '2023-09-22', '07:54:00.000000', '2023-09-23 19:04:26'),
(9, 'Admin Admin Test', 'admin', 14, 'Son', 'b1', 'prk2', 'Edit Appointment', 'James Harden', 25, '2023-09-23', '2023-09-23', '00:00:00.000000', '2023-09-24 21:53:09'),
(9, 'Admin Admin Test', 'admin', 15, 'Son', 'b1', 'prk2', 'Edit Appointment', 'Luffy', 30, '2023-09-23', '2023-09-23', '00:00:00.000000', '0000-00-00 00:00:00'),
(8, '1 Test Test', 'staff', 16, 'Daughter', 'b15', 'prk2', '', 'Client test', 10, '2023-09-23', '2023-09-23', '21:02:00.000000', '2023-09-23 22:00:30'),
(9, 'Admin Admin Test', 'admin', 17, 'son', 'b1', 'prk1', 'Edit Appointment', 'Stephen Curry', 20, '2023-09-24', '2023-09-24', '00:00:00.000000', '2023-09-24 19:58:18'),
(9, 'Admin Admin Test', 'admin', 18, 'Daughter', 'b17', 'prk1', 'Edit Appointment', 'Jordan', 10, '2023-09-24', '2023-09-24', '13:18:00.000000', '2023-09-25 13:18:41'),
(8, '1 Test Test', 'client', 19, 'Son', 'b19', 'prk1', 'Add Walk-In Appointment', 'Johny Bravo', 99, '2023-09-26', '2023-10-04', '10:30:00.000000', '2023-09-26 17:37:28'),
(8, '1 Test Test', 'client', 20, 'Son', 'b19', 'prk1', 'Add Walk-In Appointment', 'Johny Bravo', 99, '2023-09-26', '2023-10-04', '10:30:00.000000', '2023-09-26 17:49:29'),
(8, '1 Test Test', 'client', 21, 'son', 'b17', 'prk3', 'Add Walk-In Appointment', 'dsdas', 33, '2023-09-07', '2023-09-22', '18:28:00.000000', '2023-09-26 18:28:19'),
(9, 'Admin Admin Test', 'admin', 22, 'son', 'b17', 'prk2', 'Add Walk-In Appointment', 'Paul Walker', 13, '2023-10-04', '2023-10-04', '06:58:00.000000', '2023-09-26 18:58:41'),
(9, 'Admin Admin Test', 'admin', 23, 'Daughter', 'b17', 'prk4', 'Add Walk-In Appointment', 'Mickey Mouse ', 30, '2023-09-26', '2023-12-26', '19:10:00.000000', '2023-09-26 19:07:43'),
(9, 'Admin Admin Test', 'admin', 24, 'awdawd', 'b13', 'prk5', 'Add Walk-In Appointment', 'awd', 3, '2023-09-26', '2023-09-26', '19:47:00.000000', '2023-09-26 19:42:07'),
(8, '1 Test Test', 'client', 25, 'awd', 'b18', 'prk2', 'Add Walk-In Appointment', 'adawd', 0, '2023-09-26', '2023-09-26', '19:50:00.000000', '2023-09-26 19:45:45'),
(9, 'Admin Admin Test', 'admin', 26, 'awd', 'b1', 'prk1', 'Add Walk-In Appointment', 'AWDAWD', 33, '2023-09-30', '2023-09-26', '19:50:00.000000', '2023-09-26 19:46:30'),
(8, '1 Test Test', 'client', 27, 'awwd', 'b16', 'prk2', 'Add Walk-In Appointment', 'aawd', 123, '2023-09-26', '2023-09-26', '19:51:00.000000', '2023-09-26 19:47:49'),
(8, '1 Test Test', 'client', 28, 'awwd', 'b16', 'prk2', 'Add Walk-In Appointment', 'aawd', 1233, '2023-09-26', '2023-09-26', '19:51:00.000000', '2023-09-26 19:48:42'),
(9, 'Admin Admin Test', 'admin', 29, 'awd', 'b15', 'prk3', 'Add Walk-In Appointment', 'awd', 123, '2023-09-26', '2023-09-26', '19:57:00.000000', '2023-09-26 19:52:08'),
(9, 'Admin Admin Test', 'admin', 30, 'ddd', 'b15', 'prk1', 'Add Walk-In Appointment', 'awd', 33, '2023-09-26', '2023-09-27', '19:59:00.000000', '2023-09-26 19:59:26'),
(8, '1 Test Test', 'client', 31, 'Son', 'b1', 'prk1', '', 'Capstone', 10, '2023-10-03', NULL, '00:00:00.000000', '2023-10-03 22:08:46');

-- --------------------------------------------------------

--
-- Table structure for table `location`
--

DROP TABLE IF EXISTS `location`;
CREATE TABLE `location` (
  `block_id` int(11) NOT NULL,
  `location_id` int(11) NOT NULL,
  `nicheno` varchar(255) NOT NULL,
  `level` int(11) NOT NULL,
  `status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `location`
--

INSERT INTO `location` (`block_id`, `location_id`, `nicheno`, `level`, `status`) VALUES
(12, 179, 'Niche No 10', 3, 'occupied'),
(13, 180, 'Niche No 1', 1, 'occupied'),
(13, 181, 'Niche No 1', 2, ''),
(13, 182, 'Niche No 2', 2, 'occupied');

-- --------------------------------------------------------

--
-- Table structure for table `occupant`
--

DROP TABLE IF EXISTS `occupant`;
CREATE TABLE `occupant` (
  `occupant_id` int(11) NOT NULL,
  `location_id` int(11) NOT NULL,
  `block_id` int(11) NOT NULL,
  `nicheno` varchar(255) NOT NULL,
  `level` int(11) NOT NULL,
  `lname` varchar(255) NOT NULL,
  `fname` varchar(255) NOT NULL,
  `mname` varchar(255) NOT NULL,
  `suffix` varchar(255) NOT NULL,
  `dateofdeath` date NOT NULL,
  `causeofdeath` varchar(255) NOT NULL,
  `intermentplace` varchar(255) NOT NULL,
  `intermentdate` date NOT NULL,
  `intermenttime` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `occupant`
--

INSERT INTO `occupant` (`occupant_id`, `location_id`, `block_id`, `nicheno`, `level`, `lname`, `fname`, `mname`, `suffix`, `dateofdeath`, `causeofdeath`, `intermentplace`, `intermentdate`, `intermenttime`) VALUES
(23, 180, 13, 'Niche No 1', 1, 'awdad', 'awdwad', 'awwdawd', 'd', '2023-10-03', 'awdad', 'awd', '2023-10-03', '16:41:00'),
(24, 179, 12, 'Niche No 10', 3, 'sjssjjs', 'sjsjs', 'sjsjsj', 'jr', '2023-10-03', 'ddd', 'awd', '2023-10-03', '16:50:00');

-- --------------------------------------------------------

--
-- Table structure for table `renewal`
--

DROP TABLE IF EXISTS `renewal`;
CREATE TABLE `renewal` (
  `id` int(2) NOT NULL,
  `relationship` varchar(50) NOT NULL,
  `deceased` varchar(50) NOT NULL,
  `deathdate` date NOT NULL,
  `interment` date NOT NULL,
  `month` int(11) NOT NULL,
  `cur_date_time` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `renewal`
--

INSERT INTO `renewal` (`id`, `relationship`, `deceased`, `deathdate`, `interment`, `month`, `cur_date_time`) VALUES
(1, 'qqqaqa', 'qaaa', '2023-09-15', '2023-09-28', 12, '2023-09-26 19:09:06'),
(2, 'Daughter', 'ss', '2023-09-01', '2023-10-07', 11, '2023-09-26 19:09:06'),
(3, 'Daughter', 'ss', '2023-09-01', '2023-10-07', 111111, '2023-09-26 19:09:06'),
(4, 'Daughter', 'John Doe', '2023-09-26', '2023-09-26', 0, '2023-09-26 19:14:20'),
(5, 'awd', 'awd', '2023-09-26', '2023-09-26', 12, '2023-09-26 19:32:38');

-- --------------------------------------------------------

--
-- Table structure for table `schedule`
--

DROP TABLE IF EXISTS `schedule`;
CREATE TABLE `schedule` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `date` date NOT NULL,
  `time` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `schedule`
--

INSERT INTO `schedule` (`id`, `user_id`, `date`, `time`, `status`) VALUES
(93, 0, '2023-10-03', '', 'selected'),
(94, 0, '2023-10-03', '', 'selected'),
(95, 0, '2023-10-03', '', 'selected'),
(96, 8, '2023-10-04', '10:00 AM', 'selected'),
(97, 10, '0000-00-00', '', 'selected'),
(98, 10, '2023-10-11', '10:00 AM', 'selected');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `firstname` varchar(255) NOT NULL,
  `midname` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `contactno` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `conpassword` varchar(255) NOT NULL,
  `role` varchar(255) NOT NULL,
  `cur_date_time` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `lastname`, `firstname`, `midname`, `address`, `email`, `contactno`, `password`, `conpassword`, `role`, `cur_date_time`) VALUES
(8, 'Test', '1', 'Test', 'Gensan', 'Test@gmail.com', '09123456789', 'test12345', 'test12345', 'client', '2023-09-23 18:54:00'),
(9, 'Test', 'Admin', 'Admin', 'admin', 'admin@gmail.com', 'admin', '123', '123', 'admin', '2023-09-23 18:54:00'),
(10, 'new ', 'user', 'test', 'awd', 'new@gmail.com', '123213', '1234', '1234', 'client', '2023-10-03 22:54:18');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `block`
--
ALTER TABLE `block`
  ADD PRIMARY KEY (`block_id`);

--
-- Indexes for table `deceased`
--
ALTER TABLE `deceased`
  ADD PRIMARY KEY (`deceased_id`);

--
-- Indexes for table `intermentform`
--
ALTER TABLE `intermentform`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `location`
--
ALTER TABLE `location`
  ADD PRIMARY KEY (`location_id`);

--
-- Indexes for table `occupant`
--
ALTER TABLE `occupant`
  ADD PRIMARY KEY (`occupant_id`);

--
-- Indexes for table `renewal`
--
ALTER TABLE `renewal`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `schedule`
--
ALTER TABLE `schedule`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `block`
--
ALTER TABLE `block`
  MODIFY `block_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `deceased`
--
ALTER TABLE `deceased`
  MODIFY `deceased_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `intermentform`
--
ALTER TABLE `intermentform`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `location`
--
ALTER TABLE `location`
  MODIFY `location_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=183;

--
-- AUTO_INCREMENT for table `occupant`
--
ALTER TABLE `occupant`
  MODIFY `occupant_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `renewal`
--
ALTER TABLE `renewal`
  MODIFY `id` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `schedule`
--
ALTER TABLE `schedule`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=99;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
