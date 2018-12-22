-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 22, 2018 at 04:52 AM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 7.3.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hotel`
--

-- --------------------------------------------------------

--
-- Table structure for table `booking`
--

CREATE TABLE `booking` (
  `book_id` int(11) NOT NULL,
  `cs_id` int(11) NOT NULL,
  `room_id` int(11) NOT NULL,
  `book_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `book_status` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `booking`
--

INSERT INTO `booking` (`book_id`, `cs_id`, `room_id`, `book_date`, `book_status`) VALUES
(2, 2, 1, '2018-12-21 14:55:42', 1),
(3, 3, 2, '2018-12-21 15:28:33', 2);

-- --------------------------------------------------------

--
-- Table structure for table `bookingpayment`
--

CREATE TABLE `bookingpayment` (
  `bp_id` int(11) NOT NULL,
  `book_id` int(11) NOT NULL,
  `bp_file` text COLLATE utf8_unicode_ci NOT NULL,
  `bp_dateset` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `bp_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `bookingpayment`
--

INSERT INTO `bookingpayment` (`bp_id`, `book_id`, `bp_file`, `bp_dateset`, `bp_date`) VALUES
(2, 3, '7-11-Slip2.jpg', '1231565', '2018-12-21 15:28:33');

-- --------------------------------------------------------

--
-- Table structure for table `changeroom`
--

CREATE TABLE `changeroom` (
  `ch_id` int(11) NOT NULL,
  `ch_detail` text COLLATE utf8_unicode_ci NOT NULL,
  `ch_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `room_id` int(11) NOT NULL,
  `ch_status` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `changeroom`
--

INSERT INTO `changeroom` (`ch_id`, `ch_detail`, `ch_date`, `room_id`, `ch_status`) VALUES
(1, 'test', '2018-12-21 16:22:39', 2, 1);

-- --------------------------------------------------------

--
-- Table structure for table `checkout`
--

CREATE TABLE `checkout` (
  `co_id` int(11) NOT NULL,
  `co_text` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `co_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `room_id` int(11) NOT NULL,
  `co_status` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `checkout`
--

INSERT INTO `checkout` (`co_id`, `co_text`, `co_date`, `room_id`, `co_status`) VALUES
(1, '12/05/2530', '2018-12-21 16:08:40', 2, 1);

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `cs_id` int(11) NOT NULL,
  `cs_name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `cs_idcard` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `cs_phone` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `cs_user` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `cs_pwd` varchar(20) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`cs_id`, `cs_name`, `cs_idcard`, `cs_phone`, `cs_user`, `cs_pwd`) VALUES
(2, 'wachirapan pimpa ', '123456789', '12345', 'user', 'user'),
(3, 'wachirapan pimpa', '12345', '12354', 'user1', 'user1');

-- --------------------------------------------------------

--
-- Table structure for table `room`
--

CREATE TABLE `room` (
  `room_id` int(11) NOT NULL,
  `room_name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `room_price` int(11) NOT NULL,
  `room_status` varchar(2) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `room`
--

INSERT INTO `room` (`room_id`, `room_name`, `room_price`, `room_status`) VALUES
(1, '101', 3500, 'n'),
(2, '102', 3500, 'n');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `booking`
--
ALTER TABLE `booking`
  ADD PRIMARY KEY (`book_id`);

--
-- Indexes for table `bookingpayment`
--
ALTER TABLE `bookingpayment`
  ADD PRIMARY KEY (`bp_id`);

--
-- Indexes for table `changeroom`
--
ALTER TABLE `changeroom`
  ADD PRIMARY KEY (`ch_id`);

--
-- Indexes for table `checkout`
--
ALTER TABLE `checkout`
  ADD PRIMARY KEY (`co_id`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`cs_id`);

--
-- Indexes for table `room`
--
ALTER TABLE `room`
  ADD PRIMARY KEY (`room_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `booking`
--
ALTER TABLE `booking`
  MODIFY `book_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `bookingpayment`
--
ALTER TABLE `bookingpayment`
  MODIFY `bp_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `changeroom`
--
ALTER TABLE `changeroom`
  MODIFY `ch_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `checkout`
--
ALTER TABLE `checkout`
  MODIFY `co_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `cs_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `room`
--
ALTER TABLE `room`
  MODIFY `room_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
