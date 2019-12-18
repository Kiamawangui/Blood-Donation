-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 01, 2019 at 06:16 PM
-- Server version: 10.3.16-MariaDB
-- PHP Version: 7.3.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `knh`
--

-- --------------------------------------------------------

--
-- Table structure for table `bloodbank`
--

CREATE TABLE `bloodbank` (
  `id` int(100) NOT NULL,
  `type` varchar(100) NOT NULL,
  `Availability` enum('yes','no','','') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bloodbank`
--

INSERT INTO `bloodbank` (`id`, `type`, `Availability`) VALUES
(1, 'A+', 'yes'),
(2, 'A-', 'yes');

-- --------------------------------------------------------

--
-- Table structure for table `career`
--

CREATE TABLE `career` (
  `count` int(50) NOT NULL,
  `fname` varchar(50) NOT NULL,
  `lname` varchar(50) NOT NULL,
  `email` varchar(20) NOT NULL,
  `phone` int(12) NOT NULL,
  `idnumber` int(12) NOT NULL,
  `age` varchar(10) NOT NULL,
  `gender` char(10) NOT NULL,
  `role` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `career`
--

INSERT INTO `career` (`count`, `fname`, `lname`, `email`, `phone`, `idnumber`, `age`, `gender`, `role`) VALUES
(1, 'a', 'a', 'admin@gmail.com', 0, 0, '', '', ''),
(2, 'Boniface', 'Njugu', 'njugu@gmail.com', 722489562, 678, '25', 'Male', 'approved'),
(3, 'Boniface', 'gathoni', 'ian@gmail.com', 700832711, 2147483647, '12', 'Male', 'career');

-- --------------------------------------------------------

--
-- Table structure for table `donor`
--

CREATE TABLE `donor` (
  `count` int(100) NOT NULL,
  `fname` varchar(50) NOT NULL,
  `lname` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `phone` int(50) NOT NULL,
  `idnumber` int(20) NOT NULL,
  `gender` char(50) NOT NULL,
  `bloodtype` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `donor`
--

INSERT INTO `donor` (`count`, `fname`, `lname`, `email`, `phone`, `idnumber`, `gender`, `bloodtype`) VALUES
(2, 'patient', 'patient', 'ian@gmail.com', 710814796, 2, 'Male', 'A+'),
(3, 'Admin', 'nistrator', 'ian@gmail.com', 710814796, 3, 'Male', 'A-'),
(17, 'Yoyo', 'GG', 'gefe@gmail.com', 72515116, 626260, 'Male', 'A+'),
(19, 'Dr', 'frankinstine', 'admin@gmail.com', 715012649, 11, 'Male', 'A-'),
(20, 'peter', 'kiama', 'ianpeters@gmail.com', 72374625, 33488223, 'Male', 'B+');

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `Count` int(50) NOT NULL,
  `fname` varchar(50) NOT NULL,
  `lname` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `feedback` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `feedback`
--

INSERT INTO `feedback` (`Count`, `fname`, `lname`, `email`, `feedback`) VALUES
(3, 'loise', 'gathoni', 'loisegatho4858@gmail.com', 'loise'),
(4, 'loise', 'gathoni', 'loisegatho4858@gmail.com', 'loise'),
(5, 'loise', 'gathoni', 'loisegatho4858@gmail.com', 'loise'),
(6, 'loise', 'gathoni', 'loisegatho4858@gmail.com', 'loise'),
(7, 'loise', 'gathoni', 'loisegatho4858@gmail.com', 'loise'),
(8, 'loise', 'gathoni', 'loisegatho4858@gmail.com', 'loise'),
(9, 'loise', 'gathoni', 'loisegatho4858@gmail.com', 'loise'),
(10, 'loise', 'gathoni', 'loisegatho4858@gmail.com', 'loise'),
(11, 'q', 'q', 'ian@gmail.com', 'asas'),
(12, 'Boniface', 'Njugu', 'njugu@gmail.com', 'YOUR SERVICES ARE ADMIRABLE. THANKS.'),
(13, 'a', 'a', 'admin@gmail.com', 'asas'),
(14, 'a', 'a', 'admin@gmail.com', 'asas'),
(15, 'q', 'ian', '1benpatrick@gmail.com', 'asda'),
(16, 'bloodtype', 'bloodtype', 'aaaa@gmail.com', 'bloodtype'),
(17, 'bloodtype', 'bloodtype', 'aaaa@gmail.com', 'bloodtype');

-- --------------------------------------------------------

--
-- Table structure for table `requests`
--

CREATE TABLE `requests` (
  `count` int(50) NOT NULL,
  `allnames` char(100) NOT NULL,
  `nationalid` int(10) NOT NULL,
  `bloodtype` char(50) NOT NULL,
  `status` char(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `residence` varchar(50) NOT NULL,
  `phone` int(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `requests`
--

INSERT INTO `requests` (`count`, `allnames`, `nationalid`, `bloodtype`, `status`, `email`, `residence`, `phone`) VALUES
(13, 'john mathew', 1, 'A+', 'matched', 'aaaa@gmail.com', 'thika', 715012649),
(14, 'peter kiama', 33488223, 'A+', 'matched', 'ianpeter@gmail.com', 'nairobi', 723743625),
(15, 'john mathew.', 23424234, 'A+', 'matched', 'admin@gmail.com', '', 715012649),
(16, 'john mathew', 23424234, 'A+', 'matched', 'admin@gmail.com', 'thika', 715012649),
(17, 'asdasd', 33, 'A+', 'matched', 'admin@gmail.com', 'thika', 715012649),
(18, 'asdasd', 33, 'A+', 'matched', 'admin@gmail.com', 'thika', 715012649),
(19, 'aaa', 25245, 'B+', 'matched', 'admin@gmail.com', 'thika', 715012649),
(20, 'aaa', 25245, 'B+', 'pending', 'admin@gmail.com', 'thika', 715012649),
(21, 'johnstone', 123, 'A-', 'matched', 'johnstone@gmail.com', 'Johnstone', 700000000),
(22, 'grace', 123, 'A-', 'pending', 'grace@gmail.com', 'juja', 700000000),
(23, 'Peter', 123, 'B+', 'matched', 'peter@gmail.com', 'peter', 755555555);

-- --------------------------------------------------------

--
-- Table structure for table `services`
--

CREATE TABLE `services` (
  `count` int(50) NOT NULL,
  `services` varchar(50) NOT NULL,
  `cost` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `services`
--

INSERT INTO `services` (`count`, `services`, `cost`) VALUES
(1, 'Heart', 2500000),
(2, 'Kidney', 2000),
(3, 'Liver', 15000);

-- --------------------------------------------------------

--
-- Table structure for table `staff`
--

CREATE TABLE `staff` (
  `count` int(100) NOT NULL,
  `fname` varchar(50) NOT NULL,
  `lname` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `phone` int(50) NOT NULL,
  `idnumber` int(20) NOT NULL,
  `age` int(50) NOT NULL,
  `gender` char(50) NOT NULL,
  `password` varchar(100) NOT NULL,
  `role` enum('donor','admin','doctor','') NOT NULL,
  `login` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `staff`
--

INSERT INTO `staff` (`count`, `fname`, `lname`, `email`, `phone`, `idnumber`, `age`, `gender`, `password`, `role`, `login`) VALUES
(2, 'patient', 'patient', 'ian@gmail.com', 710814796, 2, 25, 'Male', 'abcd', '', 'yes'),
(3, 'Admin', 'nistrator', 'ian@gmail.com', 710814796, 3, 25, 'Male', 'abcd', 'admin', 'yes'),
(17, 'Yoyo', 'GG', 'gefe@gmail.com', 72515116, 626260, 34, 'Male', '12345', '', 'yes'),
(19, 'Dr', 'frankinstine', 'admin@gmail.com', 715012649, 11, 33, 'Male', 'abcd', 'doctor', 'yes'),
(20, 'peter', 'kiama', 'ianpeters@gmail.com', 72374625, 33488223, 30, 'Male', '123', 'donor', 'yes');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bloodbank`
--
ALTER TABLE `bloodbank`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `career`
--
ALTER TABLE `career`
  ADD PRIMARY KEY (`count`);

--
-- Indexes for table `donor`
--
ALTER TABLE `donor`
  ADD PRIMARY KEY (`count`);

--
-- Indexes for table `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`Count`);

--
-- Indexes for table `requests`
--
ALTER TABLE `requests`
  ADD PRIMARY KEY (`count`);

--
-- Indexes for table `services`
--
ALTER TABLE `services`
  ADD PRIMARY KEY (`count`);

--
-- Indexes for table `staff`
--
ALTER TABLE `staff`
  ADD PRIMARY KEY (`count`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bloodbank`
--
ALTER TABLE `bloodbank`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `career`
--
ALTER TABLE `career`
  MODIFY `count` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `donor`
--
ALTER TABLE `donor`
  MODIFY `count` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `feedback`
--
ALTER TABLE `feedback`
  MODIFY `Count` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `requests`
--
ALTER TABLE `requests`
  MODIFY `count` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `services`
--
ALTER TABLE `services`
  MODIFY `count` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `staff`
--
ALTER TABLE `staff`
  MODIFY `count` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
