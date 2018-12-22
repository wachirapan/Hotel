-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 22, 2018 at 01:59 PM
-- Server version: 10.1.36-MariaDB
-- PHP Version: 7.2.10

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
(3, 3, 2, '2018-12-22 08:51:32', 5),
(5, 7, 1, '2018-12-22 06:34:48', 4);

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
  `ch_status` int(2) NOT NULL,
  `book_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `changeroom`
--

INSERT INTO `changeroom` (`ch_id`, `ch_detail`, `ch_date`, `room_id`, `ch_status`, `book_id`) VALUES
(1, 'test', '2018-12-22 07:38:27', 2, 2, 3);

-- --------------------------------------------------------

--
-- Table structure for table `checkinpayment`
--

CREATE TABLE `checkinpayment` (
  `check_id` int(11) NOT NULL,
  `book_id` int(11) NOT NULL,
  `check_price` int(6) NOT NULL,
  `check_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `checkinpayment`
--

INSERT INTO `checkinpayment` (`check_id`, `book_id`, `check_price`, `check_date`) VALUES
(1, 5, 7000, '2018-12-22 06:34:48'),
(2, 3, 7000, '2018-12-22 06:45:32');

-- --------------------------------------------------------

--
-- Table structure for table `checkout`
--

CREATE TABLE `checkout` (
  `co_id` int(11) NOT NULL,
  `co_text` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `co_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `room_id` int(11) NOT NULL,
  `co_status` int(2) NOT NULL,
  `book_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `checkout`
--

INSERT INTO `checkout` (`co_id`, `co_text`, `co_date`, `room_id`, `co_status`, `book_id`) VALUES
(1, '12/05/2530', '2018-12-22 08:51:32', 2, 2, 3);

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
(3, 'wachirapan pimpa', '12345', '12354', 'user1', 'user1'),
(7, 'test', '1234', '123', '1234', '123');

-- --------------------------------------------------------

--
-- Table structure for table `openbill`
--

CREATE TABLE `openbill` (
  `opb_id` int(11) NOT NULL,
  `opb_priceroom` int(11) NOT NULL,
  `opb_water` int(11) NOT NULL,
  `opb_fire` int(11) NOT NULL,
  `booking_id` int(11) NOT NULL,
  `opb_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `opb_status` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `openbill`
--

INSERT INTO `openbill` (`opb_id`, `opb_priceroom`, `opb_water`, `opb_fire`, `booking_id`, `opb_date`, `opb_status`) VALUES
(1, 3500, 100, 500, 5, '2018-12-22 10:23:06', 2),
(2, 3500, 100, 750, 5, '2018-12-22 12:08:59', 3);

-- --------------------------------------------------------

--
-- Table structure for table `paybillonline`
--

CREATE TABLE `paybillonline` (
  `pbo_id` int(11) NOT NULL,
  `opb_id` int(11) NOT NULL,
  `pbo_file` text COLLATE utf8_unicode_ci NOT NULL,
  `pbo_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `paybillonline`
--

INSERT INTO `paybillonline` (`pbo_id`, `opb_id`, `pbo_file`, `pbo_date`) VALUES
(1, 2, 'image-1465348_960_720.jpg', '2018-12-22 12:08:59');

-- --------------------------------------------------------

--
-- Table structure for table `priceroom`
--

CREATE TABLE `priceroom` (
  `price_id` int(11) NOT NULL,
  `price_tax` int(11) NOT NULL,
  `opb_id` int(11) NOT NULL,
  `price_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `priceroom`
--

INSERT INTO `priceroom` (`price_id`, `price_tax`, `opb_id`, `price_date`) VALUES
(2, 4100, 1, '2018-12-22 10:23:06');

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
(2, '102', 3500, 'y'),
(3, '103', 3500, 'y');

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
-- Indexes for table `checkinpayment`
--
ALTER TABLE `checkinpayment`
  ADD PRIMARY KEY (`check_id`);

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
-- Indexes for table `openbill`
--
ALTER TABLE `openbill`
  ADD PRIMARY KEY (`opb_id`);

--
-- Indexes for table `paybillonline`
--
ALTER TABLE `paybillonline`
  ADD PRIMARY KEY (`pbo_id`);

--
-- Indexes for table `priceroom`
--
ALTER TABLE `priceroom`
  ADD PRIMARY KEY (`price_id`);

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
  MODIFY `book_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

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
-- AUTO_INCREMENT for table `checkinpayment`
--
ALTER TABLE `checkinpayment`
  MODIFY `check_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `checkout`
--
ALTER TABLE `checkout`
  MODIFY `co_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `cs_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `openbill`
--
ALTER TABLE `openbill`
  MODIFY `opb_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `paybillonline`
--
ALTER TABLE `paybillonline`
  MODIFY `pbo_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `priceroom`
--
ALTER TABLE `priceroom`
  MODIFY `price_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `room`
--
ALTER TABLE `room`
  MODIFY `room_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
