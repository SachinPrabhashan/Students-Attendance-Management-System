-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 15, 2023 at 02:07 PM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.2.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sams`
--

-- --------------------------------------------------------

--
-- Table structure for table `adminloginform`
--

CREATE TABLE `adminloginform` (
  `username` varchar(10) NOT NULL,
  `password` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `adminloginform`
--

INSERT INTO `adminloginform` (`username`, `password`) VALUES
('admin', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `attendrepcheckin`
--

CREATE TABLE `attendrepcheckin` (
  `id` int(11) NOT NULL,
  `date` date NOT NULL,
  `regno` int(11) NOT NULL,
  `checkintime` time NOT NULL,
  `status` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `attendrepcheckin`
--

INSERT INTO `attendrepcheckin` (`id`, `date`, `regno`, `checkintime`, `status`) VALUES
(1, '2023-10-01', 1, '08:30:00', 'Present'),
(2, '2023-10-02', 2, '09:00:00', 'Present'),
(3, '2023-10-03', 3, '10:15:00', 'Present'),
(4, '2023-10-04', 4, '11:30:00', 'Present'),
(5, '2023-10-05', 5, '13:45:00', 'Present'),
(6, '2023-10-06', 6, '14:30:00', 'Present'),
(7, '2023-10-07', 7, '15:15:00', 'Present'),
(8, '2023-10-08', 8, '16:00:00', 'Present'),
(9, '2023-10-09', 9, '08:45:00', 'Present'),
(10, '2023-10-10', 10, '09:30:00', 'Present'),
(11, '2023-10-11', 11, '10:45:00', 'Present'),
(12, '2023-10-12', 12, '11:30:00', 'Present'),
(13, '2023-10-13', 13, '13:15:00', 'Present'),
(14, '2023-10-14', 14, '14:00:00', 'Present'),
(15, '2023-10-15', 15, '15:30:00', 'Present'),
(16, '2023-10-16', 16, '16:15:00', 'Present'),
(17, '2023-10-17', 17, '08:15:00', 'Present'),
(18, '2023-10-18', 18, '09:45:00', 'Present'),
(19, '2023-10-19', 19, '10:30:00', 'Present'),
(20, '2023-10-20', 20, '11:45:00', 'Present'),
(21, '2023-10-21', 1, '13:00:00', 'Present'),
(22, '2023-10-22', 2, '14:45:00', 'Present'),
(23, '2023-10-23', 3, '15:30:00', 'Present'),
(24, '2023-10-24', 4, '16:15:00', 'Present'),
(25, '2023-10-25', 5, '08:30:00', 'Present'),
(26, '2023-10-26', 6, '09:15:00', 'Present'),
(27, '2023-10-27', 7, '10:00:00', 'Present'),
(28, '2023-10-28', 8, '11:30:00', 'Present'),
(29, '2023-10-29', 9, '13:00:00', 'Present'),
(30, '2023-10-30', 10, '13:45:00', 'Present'),
(31, '2023-10-31', 11, '14:30:00', 'Present'),
(32, '2023-10-01', 12, '15:15:00', 'Present'),
(33, '2023-10-02', 13, '16:00:00', 'Present'),
(34, '2023-10-03', 14, '08:45:00', 'Present'),
(35, '2023-10-04', 15, '09:30:00', 'Present'),
(36, '2023-10-05', 16, '10:45:00', 'Present'),
(37, '2023-10-06', 17, '11:30:00', 'Present'),
(38, '2023-10-07', 18, '13:15:00', 'Present'),
(39, '2023-10-08', 19, '14:00:00', 'Present'),
(40, '2023-10-09', 20, '15:30:00', 'Present'),
(41, '2023-10-10', 1, '16:15:00', 'Present'),
(42, '2023-10-11', 2, '08:15:00', 'Present'),
(43, '2023-10-12', 3, '09:45:00', 'Present'),
(44, '2023-10-13', 4, '10:30:00', 'Present'),
(45, '2023-10-14', 5, '11:45:00', 'Present'),
(46, '2023-10-15', 6, '13:00:00', 'Present'),
(47, '2023-10-16', 7, '14:45:00', 'Present'),
(48, '2023-10-17', 8, '15:30:00', 'Present'),
(49, '2023-10-18', 9, '16:15:00', 'Present'),
(50, '2023-10-19', 10, '08:30:00', 'Present');

-- --------------------------------------------------------

--
-- Table structure for table `attendrepcheckout`
--

CREATE TABLE `attendrepcheckout` (
  `id` int(11) NOT NULL,
  `date` date NOT NULL,
  `regno` int(11) NOT NULL,
  `checkouttime` time NOT NULL,
  `status` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `attendrepcheckout`
--

INSERT INTO `attendrepcheckout` (`id`, `date`, `regno`, `checkouttime`, `status`) VALUES
(1, '2023-10-01', 1, '15:00:00', 'Checked Out'),
(2, '2023-10-02', 2, '16:00:00', 'Checked Out'),
(3, '2023-10-03', 3, '11:30:00', 'Checked Out'),
(4, '2023-10-04', 4, '14:45:00', 'Checked Out'),
(5, '2023-10-05', 5, '17:00:00', 'Checked Out'),
(6, '2023-10-06', 6, '16:45:00', 'Checked Out'),
(7, '2023-10-07', 7, '15:30:00', 'Checked Out'),
(8, '2023-10-08', 8, '16:15:00', 'Checked Out'),
(9, '2023-10-09', 9, '17:30:00', 'Checked Out'),
(10, '2023-10-10', 10, '18:00:00', 'Checked Out'),
(11, '2023-10-11', 11, '19:15:00', 'Checked Out'),
(12, '2023-10-12', 12, '14:30:00', 'Checked Out'),
(13, '2023-10-13', 13, '17:00:00', 'Checked Out'),
(14, '2023-10-14', 14, '19:30:00', 'Checked Out'),
(15, '2023-10-15', 15, '16:45:00', 'Checked Out'),
(16, '2023-10-16', 16, '18:30:00', 'Checked Out'),
(17, '2023-10-17', 17, '19:15:00', 'Checked Out'),
(18, '2023-10-18', 18, '14:00:00', 'Checked Out'),
(19, '2023-10-19', 19, '15:45:00', 'Checked Out'),
(20, '2023-10-20', 20, '16:30:00', 'Checked Out'),
(21, '2023-10-21', 1, '17:45:00', 'Checked Out'),
(22, '2023-10-22', 2, '18:30:00', 'Checked Out'),
(23, '2023-10-23', 3, '19:00:00', 'Checked Out'),
(24, '2023-10-24', 4, '15:45:00', 'Checked Out'),
(25, '2023-10-25', 5, '16:30:00', 'Checked Out'),
(26, '2023-10-26', 6, '17:00:00', 'Checked Out'),
(27, '2023-10-27', 7, '18:00:00', 'Checked Out'),
(28, '2023-10-28', 8, '19:15:00', 'Checked Out'),
(29, '2023-10-29', 9, '19:45:00', 'Checked Out'),
(30, '2023-10-30', 10, '14:45:00', 'Checked Out'),
(31, '2023-10-31', 11, '16:00:00', 'Checked Out'),
(32, '2023-10-01', 12, '17:30:00', 'Checked Out'),
(33, '2023-10-02', 13, '18:15:00', 'Checked Out'),
(34, '2023-10-03', 14, '19:30:00', 'Checked Out'),
(35, '2023-10-04', 15, '15:00:00', 'Checked Out'),
(36, '2023-10-05', 16, '16:45:00', 'Checked Out'),
(37, '2023-10-06', 17, '17:30:00', 'Checked Out'),
(38, '2023-10-07', 18, '18:45:00', 'Checked Out'),
(39, '2023-10-08', 19, '19:00:00', 'Checked Out'),
(40, '2023-10-09', 20, '14:15:00', 'Checked Out'),
(41, '2023-10-10', 1, '15:30:00', 'Checked Out'),
(42, '2023-10-11', 2, '16:45:00', 'Checked Out'),
(43, '2023-10-12', 3, '17:30:00', 'Checked Out'),
(44, '2023-10-13', 4, '18:15:00', 'Checked Out'),
(45, '2023-10-14', 5, '19:30:00', 'Checked Out'),
(46, '2023-10-15', 6, '15:00:00', 'Checked Out'),
(47, '2023-10-16', 7, '16:45:00', 'Checked Out'),
(48, '2023-10-17', 8, '17:30:00', 'Checked Out'),
(49, '2023-10-18', 9, '18:45:00', 'Checked Out'),
(50, '2023-10-19', 10, '19:00:00', 'Checked Out');

-- --------------------------------------------------------

--
-- Table structure for table `loginform`
--

CREATE TABLE `loginform` (
  `name` varchar(50) NOT NULL,
  `username` varchar(10) NOT NULL,
  `password` varchar(50) NOT NULL,
  `privilege` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `loginform`
--

INSERT INTO `loginform` (`name`, `username`, `password`, `privilege`) VALUES
('sachin', 'sachin123', '1234', 'Admin');

-- --------------------------------------------------------

--
-- Table structure for table `stureg`
--

CREATE TABLE `stureg` (
  `regno` int(11) NOT NULL,
  `name` varchar(500) NOT NULL,
  `nic` varchar(20) NOT NULL,
  `contact` int(11) NOT NULL,
  `guardiancontact` int(11) NOT NULL,
  `address` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `stureg`
--

INSERT INTO `stureg` (`regno`, `name`, `nic`, `contact`, `guardiancontact`, `address`) VALUES
(1, 'John Doe', '123456789', 1234567890, 2147483647, '123 Main Street'),
(2, 'Jane Smith', '987654321', 2147483647, 1234567890, '456 Elm Street'),
(3, 'Alice Johnson', '555555555', 2147483647, 2147483647, '789 Oak Avenue'),
(4, 'Bob Wilson', '777777777', 2147483647, 2147483647, '456 Pine Road'),
(5, 'Emily Brown', '111111111', 1111111111, 2147483647, '234 Cedar Lane'),
(6, 'Michael Clark', '444444444', 2147483647, 2147483647, '789 Birch Drive'),
(7, 'Sarah Adams', '222222222', 2147483647, 2147483647, '567 Willow Lane'),
(8, 'David Lee', '888888888', 2147483647, 2147483647, '123 Maple Street'),
(9, 'Olivia Hall', '666666666', 2147483647, 2147483647, '345 Oak Avenue'),
(10, 'James Taylor', '999999999', 2147483647, 1111111111, '678 Pine Road'),
(11, 'Linda White', '333333333', 2147483647, 2147483647, '890 Elm Street'),
(12, 'William Harris', '555555555', 2147483647, 2147483647, '123 Cedar Lane'),
(13, 'Ella Turner', '777777777', 2147483647, 2147483647, '456 Birch Drive'),
(14, 'Joseph Brown', '222222222', 2147483647, 2147483647, '678 Willow Lane'),
(15, 'Sophia Wilson', '111111111', 1111111111, 2147483647, '345 Maple Street'),
(16, 'Matthew King', '444444444', 2147483647, 2147483647, '789 Pine Road'),
(17, 'Ava Martinez', '123456789', 1234567890, 2147483647, '456 Oak Avenue'),
(18, 'Daniel Garcia', '987654321', 2147483647, 1234567890, '234 Cedar Lane'),
(19, 'Chloe Lopez', '666666666', 2147483647, 2147483647, '567 Willow Lane'),
(20, 'Ethan Miller', '888888888', 2147483647, 2147483647, '123 Main Street');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `adminloginform`
--
ALTER TABLE `adminloginform`
  ADD PRIMARY KEY (`username`);

--
-- Indexes for table `attendrepcheckin`
--
ALTER TABLE `attendrepcheckin`
  ADD PRIMARY KEY (`id`),
  ADD KEY `regno` (`regno`);

--
-- Indexes for table `attendrepcheckout`
--
ALTER TABLE `attendrepcheckout`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `loginform`
--
ALTER TABLE `loginform`
  ADD UNIQUE KEY `username` (`username`);

--
-- Indexes for table `stureg`
--
ALTER TABLE `stureg`
  ADD PRIMARY KEY (`regno`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `attendrepcheckin`
--
ALTER TABLE `attendrepcheckin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT for table `attendrepcheckout`
--
ALTER TABLE `attendrepcheckout`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT for table `stureg`
--
ALTER TABLE `stureg`
  MODIFY `regno` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
