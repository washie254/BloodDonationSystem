-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 22, 2019 at 01:12 AM
-- Server version: 10.4.6-MariaDB
-- PHP Version: 7.1.32

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dkut_blood_donation_system`
--

-- --------------------------------------------------------

--
-- Table structure for table `donationpledges`
--

CREATE TABLE `donationpledges` (
  `id` int(11) NOT NULL,
  `requestid` int(11) NOT NULL,
  `donorid` int(11) NOT NULL,
  `date` date NOT NULL,
  `time` time NOT NULL,
  `status` varchar(20) NOT NULL,
  `dremarks` varchar(255) NOT NULL,
  `rremarks` varchar(255) NOT NULL,
  `requesterid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `donationrequests`
--

CREATE TABLE `donationrequests` (
  `id` int(11) NOT NULL,
  `requstrid` int(11) NOT NULL,
  `bloodgroup` varchar(5) NOT NULL,
  `rh` varchar(5) NOT NULL,
  `date` date NOT NULL,
  `time` time NOT NULL,
  `title` varchar(20) NOT NULL,
  `description` varchar(255) NOT NULL,
  `location` varchar(20) NOT NULL,
  `lat` float NOT NULL,
  `lng` float NOT NULL,
  `donorscount` int(11) NOT NULL,
  `status` varchar(20) NOT NULL,
  `facilityname` varchar(20) NOT NULL,
  `wardno` varchar(20) NOT NULL,
  `contactpersontel` varchar(15) NOT NULL,
  `contactpersonnames` varchar(100) NOT NULL,
  `nature` varchar(20) NOT NULL,
  `requesterbt` varchar(5) NOT NULL,
  `requesterrh` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `donationrequests`
--

INSERT INTO `donationrequests` (`id`, `requstrid`, `bloodgroup`, `rh`, `date`, `time`, `title`, `description`, `location`, `lat`, `lng`, `donorscount`, `status`, `facilityname`, `wardno`, `contactpersontel`, `contactpersonnames`, `nature`, `requesterbt`, `requesterrh`) VALUES
(1, 1, 'O', '-', '2019-11-21', '06:03:23', 'Blood transfusion ne', 'a minor condition oriented with loss of blood affected the circulatory system and hence require blood transfusion ', 'Nyeri', -1.26976, 36.8394, 0, 'PENDING', 'PGH Nyeri', 'PGHW0019', '0724478446', 'Jannet Mwamba', 'Mine', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `emergencies`
--

CREATE TABLE `emergencies` (
  `id` int(11) NOT NULL,
  `title` varchar(50) NOT NULL,
  `category` varchar(30) NOT NULL,
  `image` varchar(50) NOT NULL,
  `location` varchar(50) NOT NULL,
  `lat` float NOT NULL,
  `lng` float NOT NULL,
  `datereported` date NOT NULL,
  `timereported` time NOT NULL,
  `userid` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `status` varchar(20) NOT NULL,
  `remarks` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `emergencies`
--

INSERT INTO `emergencies` (`id`, `title`, `category`, `image`, `location`, `lat`, `lng`, `datereported`, `timereported`, `userid`, `username`, `status`, `remarks`) VALUES
(1, 'Three cars crash at Rware', 'Road Accident', 'acc2.jpg', 'Nyeri Town', -1.26976, 36.8394, '2019-11-21', '01:21:01', 1, 'user1', 'PENDING', ''),
(2, 'food poisoning', 'Poison', 'foodpoisoning.jpg', 'Nyeri ', -1.26976, 36.8394, '2019-11-21', '06:17:32', 1, 'user1', 'PENDING', '');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(40) NOT NULL,
  `firstName` varchar(20) NOT NULL,
  `lastName` varchar(20) NOT NULL,
  `telNo` varchar(15) NOT NULL,
  `bloodType` varchar(3) NOT NULL,
  `rh` varchar(5) NOT NULL,
  `dob` date NOT NULL,
  `location` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `email`, `firstName`, `lastName`, `telNo`, `bloodType`, `rh`, `dob`, `location`) VALUES
(1, 'user1', '24c9e15e52afc47c225b757e7bee1f9d', 'user1@gmail.com', 'washington', 'mugo', '0718610463', 'O', '-', '2000-01-01', 'Nyeri'),
(2, 'user2', '7e58d63b60197ceb55a1c487989a3720', 'hamingbird@hotmaiil.com', 'henrry ', 'makena ', '0724678812', 'O', '-', '1998-12-12', 'Nyeri');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `donationpledges`
--
ALTER TABLE `donationpledges`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `donationrequests`
--
ALTER TABLE `donationrequests`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `emergencies`
--
ALTER TABLE `emergencies`
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
-- AUTO_INCREMENT for table `donationpledges`
--
ALTER TABLE `donationpledges`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `donationrequests`
--
ALTER TABLE `donationrequests`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `emergencies`
--
ALTER TABLE `emergencies`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
