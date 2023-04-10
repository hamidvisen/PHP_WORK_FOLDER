-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 19, 2023 at 07:20 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `inventory_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `member_list`
--

CREATE TABLE `member_list` (
  `m_id` bigint(20) NOT NULL,
  `m_name` varchar(60) NOT NULL,
  `m_email` varchar(60) NOT NULL,
  `m_designation` varchar(40) NOT NULL,
  `m_clg` varchar(60) NOT NULL,
  `m_department` varchar(60) NOT NULL,
  `m_contact` varchar(20) NOT NULL,
  `m_gender` varchar(30) NOT NULL,
  `m_image` varchar(80) NOT NULL,
  `m_status` varchar(10) NOT NULL,
  `m_created_on` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `member_list`
--

INSERT INTO `member_list` (`m_id`, `m_name`, `m_email`, `m_designation`, `m_clg`, `m_department`, `m_contact`, `m_gender`, `m_image`, `m_status`, `m_created_on`) VALUES
(1, 'Mantasha Sarfaraj', 'mantasha@gmail.com', 'Student', 'RSR RCET', 'CSE', '6265301893', 'Female', 'mantasha.jpg', '1', '2023-03-17 15:57:02'),
(2, 'kunal sah', 'kunalsahu.6841@gmail.com', 'student', 'RSR', 'CSE', '9399537951', 'Male', 'kunal.jpg', '1', '2023-03-19 00:00:00'),
(3, 'ajay bhardwaj', 'ajay@gmail.com', 'teacher', 'RSR', 'Electrical', '1322001722', 'Male', 'ajay.jpg', '1', '2023-03-19 18:34:18');

-- --------------------------------------------------------

--
-- Table structure for table `product_list`
--

CREATE TABLE `product_list` (
  `p_id` bigint(20) NOT NULL,
  `p_name` varchar(50) NOT NULL,
  `p_category` varchar(50) NOT NULL,
  `p_type` varchar(50) NOT NULL,
  `p_unit` varchar(30) NOT NULL,
  `p_qtytotal` int(225) NOT NULL,
  `p_qtyissue` int(225) NOT NULL,
  `p_image` varchar(50) NOT NULL,
  `status` int(11) NOT NULL,
  `p_created_on` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `product_list`
--

INSERT INTO `product_list` (`p_id`, `p_name`, `p_category`, `p_type`, `p_unit`, `p_qtytotal`, `p_qtyissue`, `p_image`, `status`, `p_created_on`) VALUES
(1, 'Chalk', 'Stationary', 'Consumable', 'pcs', 9, 3, './images/products/chalk.jpeg', 1, '2023-03-17 16:24:36'),
(2, 'pen', 'stationary', 'consumable', 'pcs', 100, 10, '', 1, '2023-03-19 13:10:43'),
(3, 'pages', 'stationary', 'consumable', 'bundle', 100, 10, '', 1, '2023-03-19 13:10:43');

-- --------------------------------------------------------

--
-- Table structure for table `request_item`
--

CREATE TABLE `request_item` (
  `request_serial` int(11) NOT NULL,
  `rp_id` bigint(20) NOT NULL,
  `r_id` bigint(20) NOT NULL,
  `r_qty` int(255) NOT NULL,
  `reason` varchar(30) DEFAULT NULL,
  `r_fd` date NOT NULL,
  `r_td` date NOT NULL,
  `r_days` int(80) NOT NULL,
  `r_accept_status` varchar(20) NOT NULL,
  `r_accept_by` bigint(20) NOT NULL,
  `r_accept_on` date NOT NULL,
  `r_received_status` varchar(20) NOT NULL,
  `r_received_by` bigint(20) NOT NULL,
  `r_received_on` date NOT NULL,
  `r_return_status` varchar(20) NOT NULL,
  `r_return_by` bigint(20) NOT NULL,
  `r_return_on` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `request_item`
--

INSERT INTO `request_item` (`request_serial`, `rp_id`, `r_id`, `r_qty`, `reason`, `r_fd`, `r_td`, `r_days`, `r_accept_status`, `r_accept_by`, `r_accept_on`, `r_received_status`, `r_received_by`, `r_received_on`, `r_return_status`, `r_return_by`, `r_return_on`) VALUES
(1, 1, 1, 10, 'abcd', '0000-00-00', '0000-00-00', 0, 'YES', 0, '2023-03-17', 'NO', 0, '2023-03-17', '', 0, '2023-03-17'),
(4, 1, 2, 10, 'abcd', '0000-00-00', '0000-00-00', 0, 'NO', 0, '0000-00-00', 'NO', 0, '0000-00-00', '', 0, '0000-00-00'),
(5, 2, 3, 20, 'sdfgsdfg', '0000-00-00', '0000-00-00', 0, 'NO', 0, '0000-00-00', 'NO', 0, '0000-00-00', '', 0, '0000-00-00'),
(6, 2, 4, 40, 'abcd', '0000-00-00', '0000-00-00', 0, 'NO', 0, '0000-00-00', 'NO', 0, '0000-00-00', '', 0, '0000-00-00'),
(7, 1, 4, 5, 'abcd', '0000-00-00', '0000-00-00', 0, 'YES', 0, '0000-00-00', 'YES', 0, '0000-00-00', '', 0, '0000-00-00');

-- --------------------------------------------------------

--
-- Table structure for table `request_tbl`
--

CREATE TABLE `request_tbl` (
  `request_id` bigint(20) NOT NULL,
  `request_date` date NOT NULL,
  `request_user` bigint(20) NOT NULL,
  `request_status` varchar(20) NOT NULL,
  `deliever_status` varchar(20) NOT NULL,
  `received_status` varchar(20) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `request_tbl`
--

INSERT INTO `request_tbl` (`request_id`, `request_date`, `request_user`, `request_status`, `deliever_status`, `received_status`, `status`) VALUES
(1, '2023-03-19', 2, 'requested', 'delievered', 'yes', 0),
(2, '2023-03-19', 1, 'requested', '', 'no', 0),
(3, '2023-03-16', 2, 'accepted', 'delievered', 'yes', 0),
(4, '0000-00-00', 3, '', '', '', 1);

-- --------------------------------------------------------

--
-- Table structure for table `user_login`
--

CREATE TABLE `user_login` (
  `user_id` bigint(20) NOT NULL,
  `user_email` varchar(80) NOT NULL,
  `user_password` varchar(20) NOT NULL,
  `user_type` varchar(20) NOT NULL,
  `user_status` varchar(10) NOT NULL,
  `user_created_on` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user_login`
--

INSERT INTO `user_login` (`user_id`, `user_email`, `user_password`, `user_type`, `user_status`, `user_created_on`) VALUES
(2, 'kunalsahu.6841@gmail.com', 'kunal', 'user', 'active', '2023-03-19 13:40:11');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `member_list`
--
ALTER TABLE `member_list`
  ADD PRIMARY KEY (`m_id`);

--
-- Indexes for table `product_list`
--
ALTER TABLE `product_list`
  ADD PRIMARY KEY (`p_id`);

--
-- Indexes for table `request_item`
--
ALTER TABLE `request_item`
  ADD PRIMARY KEY (`request_serial`);

--
-- Indexes for table `request_tbl`
--
ALTER TABLE `request_tbl`
  ADD PRIMARY KEY (`request_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `member_list`
--
ALTER TABLE `member_list`
  MODIFY `m_id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `product_list`
--
ALTER TABLE `product_list`
  MODIFY `p_id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `request_item`
--
ALTER TABLE `request_item`
  MODIFY `request_serial` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `request_tbl`
--
ALTER TABLE `request_tbl`
  MODIFY `request_id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
