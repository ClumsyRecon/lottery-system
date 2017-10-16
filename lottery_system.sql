-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 16, 2017 at 03:44 AM
-- Server version: 10.1.21-MariaDB
-- PHP Version: 7.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
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
  `win_6` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `lotteries`
--

INSERT INTO `lotteries` (`lotto_id`, `name`, `prize`, `date`, `win_1`, `win_2`, `win_3`, `win_4`, `win_5`, `win_6`) VALUES
(1, 'Random Lottery', '50000', '2017-07-31', 10, 21, 27, 32, 35, 40),
(2, 'Random Lottery', '20000', '2017-08-24', 1, 2, 3, 4, 5, 6),
(3, 'Test', '13000', '2017-09-11', 8, 12, 23, 26, 28, 35),
(4, 'Jackpot', '120000', '2017-10-13', 7, 12, 13, 27, 36, 51),
(8, 'Testing', '2000', '2017-10-17', 8, 13, 16, 38, 42, 51),
(9, 'Lotto', '50000', '2017-10-09', 12, 17, 25, 47, 50, 58),
(10, 'Powerball', '10000', '2017-10-24', 16, 37, 38, 51, 56, 60),
(11, 'Jackpot', '1000000', '2017-11-14', 9, 18, 19, 24, 34, 53);

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
(2, 'Bob', 'Brown', '1990-07-10', 'bob@brown.com', '$2y$10$4IKI5q7XPPggdd8f6P76/.qKyvon/MVuuonaeRrZaXTPFfywqrF0K', 'member'),
(3, 'Test', 'Ing', '2017-10-09', 'test@test.com', '$2y$10$4IKI5q7XPPggdd8f6P76/.qKyvon/MVuuonaeRrZaXTPFfywqrF0K', 'admin');

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
(1, 1, 1, 1, 12, 23, 34, 45, 56),
(2, 1, 1, 1, 2, 4, 8, 16, 32),
(3, 1, 2, 1, 11, 21, 31, 41, 51),
(4, 1, 1, 1, 2, 3, 4, 5, 6),
(5, 1, 2, 11, 12, 13, 14, 15, 16),
(6, 4, 1, 1, 12, 23, 34, 45, 56),
(7, 4, 1, 51, 52, 53, 54, 55, 56);

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
  MODIFY `lotto_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `members`
--
ALTER TABLE `members`
  MODIFY `member_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `payment_method`
--
ALTER TABLE `payment_method`
  MODIFY `payment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `tickets`
--
ALTER TABLE `tickets`
  MODIFY `ticket_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
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

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
