-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 16, 2017 at 11:54 AM
-- Server version: 10.1.26-MariaDB
-- PHP Version: 7.1.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `lottery_system`
--

-- --------------------------------------------------------

--
-- Table structure for table `lotteries`
--

CREATE TABLE `lotteries` (
  `lotto_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `prize` decimal(10,0) NOT NULL,
  `date` date NOT NULL,
  `win_1` int(11) DEFAULT NULL,
  `win_2` int(11) DEFAULT NULL,
  `win_3` int(11) DEFAULT NULL,
  `win_4` int(11) DEFAULT NULL,
  `win_5` int(11) DEFAULT NULL,
  `win_6` int(11) DEFAULT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `lotteries`
--

INSERT INTO `lotteries` (`lotto_id`, `name`, `prize`, `date`, `win_1`, `win_2`, `win_3`, `win_4`, `win_5`, `win_6`, `image`) VALUES
(23, 'Lotto', '10000', '2017-11-17', 1, 2, 3, 4, 5, 6, 'test.jpg'),
(24, 'Powerball', '5000', '2017-11-30', 1, 8, 15, 20, 29, 52, 'Koala.jpg'),
(25, 'Test', '1000', '2017-11-28', 1, 2, 3, 4, 5, 6, 'Penguins.jpg'),
(26, 'Jackpot', '30000', '2018-01-31', NULL, NULL, NULL, NULL, NULL, NULL, 'Desert.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `members`
--

CREATE TABLE `members` (
  `member_id` int(11) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `dob` date NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `usertype` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `members`
--

INSERT INTO `members` (`member_id`, `first_name`, `last_name`, `dob`, `email`, `password`, `usertype`) VALUES
(1, 'Daniel', 'Johansson', '1998-09-01', 'theclumsyrecon@yahoo.com.au', '$2y$10$4IKI5q7XPPggdd8f6P76/.qKyvon/MVuuonaeRrZaXTPFfywqrF0K', 'member'),
(3, 'Test', 'Ing', '2017-10-09', 'test@test.com', '$2y$10$4IKI5q7XPPggdd8f6P76/.qKyvon/MVuuonaeRrZaXTPFfywqrF0K', 'admin'),
(13, 'Bob', 'Brown', '2017-11-01', 'bob@brown.com', '$2y$10$HbHTd6.FpXsJFxeV.HY0d.AibZN8pFomskGNYAXTfnWEv1XZOU2Am', 'member');

-- --------------------------------------------------------

--
-- Table structure for table `payment_method`
--

CREATE TABLE `payment_method` (
  `payment_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `number` varchar(16) NOT NULL,
  `expiry` date NOT NULL,
  `security_code` int(3) NOT NULL,
  `member_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `payment_method`
--

INSERT INTO `payment_method` (`payment_id`, `name`, `number`, `expiry`, `security_code`, `member_id`) VALUES
(1, 'Daniel Johansson', '4444111144441111', '2019-07-01', 123, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tickets`
--

CREATE TABLE `tickets` (
  `ticket_id` int(11) NOT NULL,
  `lotto_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `num_1` int(11) NOT NULL,
  `num_2` int(11) NOT NULL,
  `num_3` int(11) NOT NULL,
  `num_4` int(11) NOT NULL,
  `num_5` int(11) NOT NULL,
  `num_6` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tickets`
--

INSERT INTO `tickets` (`ticket_id`, `lotto_id`, `user_id`, `num_1`, `num_2`, `num_3`, `num_4`, `num_5`, `num_6`) VALUES
(40, 23, 1, 1, 2, 3, 4, 5, 6),
(41, 24, 1, 1, 13, 25, 36, 37, 49),
(42, 25, 1, 1, 14, 27, 40, 52, 54),
(43, 25, 13, 1, 2, 3, 4, 5, 6);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `lotteries`
--
ALTER TABLE `lotteries`
  ADD PRIMARY KEY (`lotto_id`);

--
-- Indexes for table `members`
--
ALTER TABLE `members`
  ADD PRIMARY KEY (`member_id`);

--
-- Indexes for table `payment_method`
--
ALTER TABLE `payment_method`
  ADD PRIMARY KEY (`payment_id`),
  ADD KEY `member_payment_FK` (`member_id`);

--
-- Indexes for table `tickets`
--
ALTER TABLE `tickets`
  ADD PRIMARY KEY (`ticket_id`),
  ADD KEY `lotto_id_FK` (`lotto_id`),
  ADD KEY `user_id_FK` (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `lotteries`
--
ALTER TABLE `lotteries`
  MODIFY `lotto_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `members`
--
ALTER TABLE `members`
  MODIFY `member_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `payment_method`
--
ALTER TABLE `payment_method`
  MODIFY `payment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tickets`
--
ALTER TABLE `tickets`
  MODIFY `ticket_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `payment_method`
--
ALTER TABLE `payment_method`
  ADD CONSTRAINT `member_payment_FK` FOREIGN KEY (`member_id`) REFERENCES `members` (`member_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tickets`
--
ALTER TABLE `tickets`
  ADD CONSTRAINT `lotto_id_FK` FOREIGN KEY (`lotto_id`) REFERENCES `lotteries` (`lotto_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `user_id_FK` FOREIGN KEY (`user_id`) REFERENCES `members` (`member_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
