-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Oct 30, 2018 at 06:26 AM
-- Server version: 10.1.19-MariaDB
-- PHP Version: 5.5.38

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_pms`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_project`
--

CREATE TABLE `tbl_project` (
  `Project_id` int(11) NOT NULL,
  `project_name` varchar(100) NOT NULL,
  `contract_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `Project_handover_date` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `current_status` varchar(20) DEFAULT 'Active',
  `percentage_completion` float DEFAULT '0',
  `description` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_project`
--

INSERT INTO `tbl_project` (`Project_id`, `project_name`, `contract_date`, `Project_handover_date`, `current_status`, `percentage_completion`, `description`) VALUES
(1, 'A BOOK DATABASE\r\n', '0000-00-00 00:00:00', '2018-10-26 07:00:00', 'Active', 0, 'trgfhg'),
(2, 'A RECIPES APP\r\n', '0000-00-00 00:00:00', '2018-10-19 07:00:00', 'Active', 0, 'hrtjhth'),
(3, 'A BILL TRACKER\r\n', '0000-00-00 00:00:00', '2018-10-12 07:00:00', 'Active', 0, 'ujhmyukuygjm'),
(4, 'AN EXPENSES TRACKER\r\n', '0000-00-00 00:00:00', '2018-10-12 07:00:00', 'Active', 0, 'ujhmyukuygjm'),
(5, 'A CHAT APPLICATION\r\n', '0000-00-00 00:00:00', '2018-10-05 07:00:00', 'Active', 0, 'owgqf8tew98pf3tqw qeuiof98qwtd98qwif quiwefg98qwef'),
(6, 'A PERSONAL DIARY APP\r\n', '0000-00-00 00:00:00', '2018-10-05 07:00:00', 'Active', 0, 'eopewojg''349yreg0v9reo rio;hg09weytf093weoi');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_users`
--

CREATE TABLE `tbl_users` (
  `user_id` int(11) NOT NULL,
  `Password` varchar(120) NOT NULL,
  `First_name` varchar(20) NOT NULL,
  `Last_name` varchar(20) NOT NULL,
  `Email` varchar(50) NOT NULL,
  `Date_registered` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `user_status` int(2) NOT NULL DEFAULT '1',
  `user_role` varchar(11) NOT NULL,
  `username` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_users`
--

INSERT INTO `tbl_users` (`user_id`, `Password`, `First_name`, `Last_name`, `Email`, `Date_registered`, `user_status`, `user_role`, `username`) VALUES
(1, '$2y$12$8BxoCGXe6qPd7aRcs7grnuTWM2eD8TGSVWQW1MYSHOFMtl6/9Xw3m', 'Birhan', 'Nega', 'birhannega844@gmail.com', '2018-10-29 01:45:59', 1, '1', 'admin'),
(2, '$2y$12$sN2onrH6JcG3U5W4nI7KD.AIy86Niy1dO4QJyOAMedXZYCoIiSFGK', 'Seid', 'Nur', 'seid@gmail.com', '2018-10-29 01:48:06', 1, '2', 'Ahmed'),
(3, '$2y$12$OAP5HbKpG4aAfJPDpHCn2O8HRbag9bvtxufrq4ZdyybbsZ8XGRRTi', 'ephrem', 'Mulu', 'efa@gmail.com', '2018-10-29 01:49:34', 1, '3', 'epha'),
(4, '$2y$12$re/5MydeyZr6HwnCSkb9suvDsAszlk7JJiOeBlejsJxSbfSqvXLOq', 'Efrem', 'Mulu', 'tes44@gmail.com', '2018-10-30 04:29:42', 1, '1', 'testuser');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_project`
--
ALTER TABLE `tbl_project`
  ADD PRIMARY KEY (`Project_id`);

--
-- Indexes for table `tbl_users`
--
ALTER TABLE `tbl_users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_project`
--
ALTER TABLE `tbl_project`
  MODIFY `Project_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `tbl_users`
--
ALTER TABLE `tbl_users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
