-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 23, 2019 at 01:32 AM
-- Server version: 10.1.25-MariaDB
-- PHP Version: 5.6.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `employee_service_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_download_logs`
--

CREATE TABLE `tbl_download_logs` (
  `log_id` int(11) NOT NULL,
  `download_user_id` int(11) NOT NULL,
  `download_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `file_id` int(11) NOT NULL,
  `log_status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_download_logs`
--

INSERT INTO `tbl_download_logs` (`log_id`, `download_user_id`, `download_date`, `file_id`, `log_status`) VALUES
(1, 37, '2019-01-01 06:26:35', 5, 1),
(2, 37, '2019-12-18 06:35:44', 5, 1),
(3, 37, '2019-12-18 06:41:18', 5, 1),
(4, 41, '2019-12-18 14:04:41', 5, 0),
(5, 41, '2019-12-19 02:04:07', 6, 0),
(6, 37, '2019-12-18 19:17:58', 5, 1),
(7, 37, '2019-12-18 19:22:01', 6, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_files`
--

CREATE TABLE `tbl_files` (
  `file_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `file_name` text NOT NULL,
  `uploaded_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `file_status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_files`
--

INSERT INTO `tbl_files` (`file_id`, `user_id`, `file_name`, `uploaded_date`, `file_status`) VALUES
(3, 36, '1.jpg', '2019-12-18 11:22:58', 0),
(4, 36, 'Lucidity_CBD_Oil_1000_label-1.jpg', '2019-12-18 03:55:16', 1),
(5, 36, 'Lucidity_CBD_Oil_1000_COA.jpg', '2019-12-18 04:11:03', 1),
(6, 36, 'woo.txt', '2019-12-18 06:58:22', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_users`
--

CREATE TABLE `tbl_users` (
  `user_id` int(11) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(100) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `user_type` int(11) NOT NULL,
  `user_status` int(11) NOT NULL,
  `is_logged` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_users`
--

INSERT INTO `tbl_users` (`user_id`, `first_name`, `last_name`, `username`, `password`, `user_type`, `user_status`, `is_logged`) VALUES
(36, 'John', 'Doe', 'admin', 'admin', 1, 1, 1),
(37, 'asdasdasd', 'Doe', 'test2', 'test2', 2, 1, 1),
(41, 'Test3', 'Test3 1asd', 'Test3', 'Test3', 2, 1, 1),
(42, 'Juphet', 'Vitualla', 'opet', '1234', 2, 1, 0),
(43, 'Proweaver Tests', 'Lynn', 'Anna', 'password', 2, 1, 0),
(44, 'Sample', 'UySample', 'test6', 'test6', 2, 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user_details`
--

CREATE TABLE `tbl_user_details` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `gender` varchar(55) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_user_details`
--

INSERT INTO `tbl_user_details` (`id`, `user_id`, `email`, `address`, `gender`) VALUES
(1, 36, 'admin@admin.com', 'sample addresss', 'Female'),
(2, 37, 'sasd@asd.com', 'Cebu', 'Male'),
(3, 41, 'examples@proweaver.com', 'cebu', ''),
(4, 42, 'opet@asd.com', '9170 N. Summerhouse St.', 'Male'),
(5, 43, 'example@proweaver.com', '9170 N. Summerhouse St.', 'Male'),
(6, 44, 'example@proweaver.com2', '7669 Gulf Drives', 'Female');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_download_logs`
--
ALTER TABLE `tbl_download_logs`
  ADD PRIMARY KEY (`log_id`);

--
-- Indexes for table `tbl_files`
--
ALTER TABLE `tbl_files`
  ADD PRIMARY KEY (`file_id`);

--
-- Indexes for table `tbl_users`
--
ALTER TABLE `tbl_users`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `tbl_user_details`
--
ALTER TABLE `tbl_user_details`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_download_logs`
--
ALTER TABLE `tbl_download_logs`
  MODIFY `log_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `tbl_files`
--
ALTER TABLE `tbl_files`
  MODIFY `file_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `tbl_users`
--
ALTER TABLE `tbl_users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;
--
-- AUTO_INCREMENT for table `tbl_user_details`
--
ALTER TABLE `tbl_user_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
