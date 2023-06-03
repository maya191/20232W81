-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 27, 2023 at 05:15 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dogfriendly`
--

-- --------------------------------------------------------

--
-- Table structure for table `businesses`
--

CREATE TABLE `businesses` (
  `business_id` int(11) NOT NULL,
  `business_type` varchar(250) NOT NULL,
  `business_name` varchar(250) NOT NULL,
  `bn_number` varchar(250) NOT NULL,
  `business_email` varchar(250) NOT NULL,
  `geo_coordinates` varchar(250) NOT NULL,
  `full_address` text NOT NULL,
  `small_dogs` int(2) NOT NULL,
  `big_dogs` int(2) NOT NULL,
  `water` int(2) NOT NULL,
  `snacks` int(2) NOT NULL,
  `review_count` int(11) NOT NULL,
  `average_review` varchar(50) NOT NULL,
  `business_picture` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `businesses`
--

INSERT INTO `businesses` (`business_id`, `business_type`, `business_name`, `bn_number`, `business_email`, `geo_coordinates`, `full_address`, `small_dogs`, `big_dogs`, `water`, `snacks`, `review_count`, `average_review`, `business_picture`) VALUES
(1, 'supermarket', 'Macro emirates', '1111111111', 'shahidfarooq0555@gmail.com', '25.3003413,55.3144842', 'Macro Emirates، Second Industrial Street,Industrial Area 6 - Sharjah', 1, 1, 1, 1, 2, '5', '647110700e3e7_macro.jpg'),
(2, 'supermarket', 'Lulu Hypermarket', '1111111111', 'shahidfarooq0555@gmail.com', '25.3047592,55.3673868', 'Lulu Hypermarket - Muweilah, Sheikh Khalifa Bin Zayed Al Nahyan Rd - Industrial Area - Muwailih Commercial - Sharjah', 1, 0, 1, 1, 1, '3.5', '647111377f615_lulu.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `reviews`
--

CREATE TABLE `reviews` (
  `review_id` int(11) NOT NULL,
  `customer_name` varchar(250) NOT NULL,
  `rating` varchar(50) NOT NULL,
  `feedback` text NOT NULL,
  `business_key` int(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `date_created` timestamp(6) NOT NULL DEFAULT current_timestamp(6) ON UPDATE current_timestamp(6)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `reviews`
--

INSERT INTO `reviews` (`review_id`, `customer_name`, `rating`, `feedback`, `business_key`, `email`, `date_created`) VALUES
(1, 'cricket', '5', 'ghjjk', 1, 'shahidfarooq555@gmail.com', '2023-05-26 20:58:08.471939'),
(2, 'shahid', '3.5', 'thikar chala gya', 2, 'shahidfarooq0555@gmail.com', '2023-05-26 20:59:45.700572'),
(3, 'ahsan', '5', 'ajjajajaj', 1, 'shahidfarooq120@yahoo.com', '2023-05-26 22:56:26.858167');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `businesses`
--
ALTER TABLE `businesses`
  ADD PRIMARY KEY (`business_id`);

--
-- Indexes for table `reviews`
--
ALTER TABLE `reviews`
  ADD PRIMARY KEY (`review_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `businesses`
--
ALTER TABLE `businesses`
  MODIFY `business_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `reviews`
--
ALTER TABLE `reviews`
  MODIFY `review_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
