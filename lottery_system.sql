-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 06, 2017 at 06:31 AM
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
(15, 'Lottery', '10000', '2017-11-30', NULL, NULL, NULL, NULL, NULL, NULL),
(16, 'Weekly Lotto', '3000', '2017-11-05', 8, 24, 33, 51, 57, 59),
(17, 'Powerball', '500000', '2017-11-21', 21, 25, 30, 35, 50, 53);

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
(3, 'Test', 'Ing', '2017-10-09', 'test@test.com', '$2y$10$4IKI5q7XPPggdd8f6P76/.qKyvon/MVuuonaeRrZaXTPFfywqrF0K', 'admin'),
(5, 'aaaaaa', 'aaaaaaa', '2017-10-08', 'a@a.com', '$2y$10$ANWwAw4.4LtNoq49nf/5nueu6jO10U43D9xwZ8fo13Z8LmkfvR83K', 'member'),
(6, 'New', 'Person', '2017-10-10', 'person@mail.com', '$2y$10$uSpaHEMXo9sNI3BAudq5OOHqAwW.1b/m7uC/SI57O6SLuhuP.d2zK', 'member'),
(7, 'Ae', 'Bee', '2017-11-01', 'abc@abc.com', '$2y$10$fAzZY/BuL29BxhwkQNzKpuWzFDMe0DJ52BITbMQs6Nm8nY9jXPW7y', 'member'),
(8, 'zzz', 'zzzzzz', '2017-11-03', 'zzz@zzz.z', '$2y$10$Uj2tuKNO0ESg8aWzk2oUiejv.kvzuce3K7TN7ulIKa.XLux7M1wcO', 'member'),
(9, 'aaaaa', 'ssss', '2017-11-01', 'dddd@s', '$2y$10$1HHhghkpCVl7U92C7le1DOmryfwJAue31TcUbFZG/Wl.ssR/axd6S', 'member');

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
(34, 17, 1, 1, 3, 5, 7, 9, 11);

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
  MODIFY `lotto_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
--
-- AUTO_INCREMENT for table `members`
--
ALTER TABLE `members`
  MODIFY `member_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `payment_method`
--
ALTER TABLE `payment_method`
  MODIFY `payment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `tickets`
--
ALTER TABLE `tickets`
  MODIFY `ticket_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;
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
