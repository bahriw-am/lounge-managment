-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 04, 2022 at 04:47 AM
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
-- Database: `food-order`
--

-- --------------------------------------------------------

--
-- Table structure for table `bank`
--

CREATE TABLE `bank` (
  `user` varchar(20) NOT NULL,
  `account_no` double NOT NULL,
  `pincode` int(11) NOT NULL,
  `diposit` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `bank`
--

INSERT INTO `bank` (`user`, `account_no`, `pincode`, `diposit`) VALUES
('tewedros_lounge', 1000222, 1010, 566),
('user', 1000234, 1234, 456774),
('abe', 1000235, 4545, 4),
('nahom', 1000222422257, 1234, 1000);

-- --------------------------------------------------------

--
-- Table structure for table `comment`
--

CREATE TABLE `comment` (
  `user_name` varchar(20) NOT NULL,
  `comment` longtext NOT NULL,
  `status` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `comment`
--

INSERT INTO `comment` (`user_name`, `comment`, `status`) VALUES
('user', 'i have enjoy the meal keep it up', 'seen'),
('user', 'wow', 'seen'),
('user1', 'hey', 'seen'),
('user1', 'good', 'seen'),
('user1', 'good', 'seen'),
('user1', 'well done', 'seen'),
('user1', 'good  job', 'seen'),
('nahom', 'hello', 'seen'),
('nahom', 'hello', 'seen'),
('nahom', 'nice', 'seen'),
('nahom', 'good', 'seen'),
('nahom', 'good', 'seen'),
('nahom', 'good', 'seen'),
('nahom', 'good', 'seen'),
('nahom', 'well keep it up', 'seen'),
('nahom', 'GO AHEAD', 'seen'),
('nahom', 'GO AHEad', 'seen'),
('nahom', 'good', 'seen'),
('nahom', 'go ahead\r\n', 'seen'),
('nahom', 'good job', 'seen'),
('nahom', 'am hapy', 'seen'),
('nahom', 'good', 'seen');

-- --------------------------------------------------------

--
-- Table structure for table `employees`
--

CREATE TABLE `employees` (
  `id` int(11) NOT NULL,
  `fname` varchar(20) NOT NULL,
  `lname` varchar(20) NOT NULL,
  `gender` varchar(6) NOT NULL,
  `phone` int(11) NOT NULL,
  `role` varchar(10) NOT NULL,
  `address` varchar(20) NOT NULL,
  `status` varchar(10) NOT NULL,
  `account` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `employees`
--

INSERT INTO `employees` (`id`, `fname`, `lname`, `gender`, `phone`, `role`, `address`, `status`, `account`) VALUES
(1, 'man', 'ba', 'Male', 9, 'Manager', 'bahir dar', 'active', 1),
(4, 'maste', 'mn', 'Male', 990099009, 'Barista', 'bahir dar', 'active', 1),
(65, 'sami', 'son', 'Male', 943610431, 'Barista', 'dt', 'de-active', 1),
(66, 'almaz', 'alemu', 'Female', 943610431, 'Casher', 'bahir dar', 'de-active', 0);

-- --------------------------------------------------------

--
-- Table structure for table `fedback`
--

CREATE TABLE `fedback` (
  `sender` varchar(20) NOT NULL,
  `message` longtext NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `schedule`
--

CREATE TABLE `schedule` (
  `casherM` varchar(30) NOT NULL,
  `casherA` varchar(30) NOT NULL,
  `waiterM` varchar(30) NOT NULL,
  `waiterA` varchar(30) NOT NULL,
  `baristaM` varchar(30) NOT NULL,
  `baristaA` varchar(30) NOT NULL,
  `kichenM` varchar(30) NOT NULL,
  `kichenA` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `schedule`
--

INSERT INTO `schedule` (`casherM`, `casherA`, `waiterM`, `waiterA`, `baristaM`, `baristaA`, `kichenM`, `kichenA`) VALUES
('selam', 'alemitu', 'kebede', 'alemnesh', 'nahom', 'dagne', 'tihtna', 'sol');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_admin`
--

CREATE TABLE `tbl_admin` (
  `id` int(10) UNSIGNED NOT NULL,
  `full_name` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` varchar(10) NOT NULL,
  `status` varchar(10) NOT NULL DEFAULT 'active'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_admin`
--

INSERT INTO `tbl_admin` (`id`, `full_name`, `username`, `password`, `role`, `status`) VALUES
(17, 'Admin', 'admin', '21232f297a57a5a743894a0e4a801fc3', 'Admin', 'active'),
(21, 'nahom ', 'nah1', '24c9e15e52afc47c225b757e7bee1f9d', 'customer', 'Yes'),
(23, 'dagne', 'da', '25d55ad283aa400af464c76d713c07ad', 'customer', 'active'),
(28, 'dagne', 'dagne', '09738fe6357dad83bce9bcd496755ae7', 'customer', 'active'),
(31, 'dagne', 'dagne', '09738fe6357dad83bce9bcd496755ae7', 'Casher', 'active'),
(32, 'almi', 'almi', '5ec16c9e099189f1e555065ba84ba617', 'Kichen', 'active'),
(33, 'abebe', 'abe', 'f64cff138020a2060a9817272f563b3c', 'Waiter', 'active'),
(34, '', 'bar', '1e7f0bbc56c5ba6791108be53a75f494', 'Barista', 'de-active'),
(35, 'manager', 'man', '1d0258c2440a8d19e716292b231e3190', 'Manager', 'active'),
(42, 'be', 'be2', 'b6d767d2f8ed5d21a44b0e5886680cb9', 'customer', '0'),
(43, 'baa', 'b2', 'b6d767d2f8ed5d21a44b0e5886680cb9', 'customer', '0'),
(46, 'man', 'man', '39c63ddb96a31b9610cd976b896ad4f0', 'Manager', 'active'),
(47, 'nahom', 'nahom', '202cb962ac59075b964b07152d234b70', 'Admin', 'active'),
(48, 'nahom', 'nahom', '81dc9bdb52d04dc20036dbd8313ed055', 'customer', '0'),
(49, 'bam', 'ba', '4124bc0a9335c27f086f24ba207a4912', 'customer', '0'),
(50, 'amare', 'amare', 'c04cd38aeb30f3ad1f8ab4e64a0ded7b', 'Casher', 'active'),
(51, 'maste', 'maste', 'b6d767d2f8ed5d21a44b0e5886680cb9', 'Waiter', 'active'),
(52, 'a', 'a', '0cc175b9c0f1b6a831c399e269772661', 'customer', '0'),
(53, 'abebe', 'abebe', 'b19447d71513206351718b0a14942889', 'customer', '0'),
(54, 'esayas', 'esu1', '50d67cfcfcd5061fc9b0512a70cd4f1f', 'customer', '0'),
(55, 'sami', 'sami', '70c1aa7c0c9adb4b386c1eab6dd9d635', 'Barista', 'active'),
(56, 'sami', 'sami', '70c1aa7c0c9adb4b386c1eab6dd9d635', 'Barista', 'active'),
(57, 'amare', 'amare', '81dc9bdb52d04dc20036dbd8313ed055', 'Manager', 'active'),
(58, 'maste', 'maste', '81dc9bdb52d04dc20036dbd8313ed055', 'Barista', 'active'),
(59, 'maste', 'maste', '81dc9bdb52d04dc20036dbd8313ed055', 'Barista', 'active'),
(60, 'nahom', 'admin', 'e4d071b7fec8d2cabda8c415e106382a', 'customer', 'active'),
(61, 'nahom', 'admin', 'e4d071b7fec8d2cabda8c415e106382a', 'customer', 'active'),
(62, 'nahom', 'admin', 'e4d071b7fec8d2cabda8c415e106382a', 'customer', 'active'),
(63, 'nahom', 'admin', 'e4d071b7fec8d2cabda8c415e106382a', 'customer', 'active'),
(64, 'nahom', 'admin', 'e4d071b7fec8d2cabda8c415e106382a', 'customer', 'active'),
(65, '0', 'admin', '202cb962ac59075b964b07152d234b70', 'Admin', 'active'),
(66, '0', '', 'd41d8cd98f00b204e9800998ecf8427e', 'Admin', 'de-active'),
(67, 'admin', 'adaa', '3ec89b4d68df59a0a5ce9eadd762d694', 'customer', 'active');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_category`
--

CREATE TABLE `tbl_category` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(100) NOT NULL,
  `image_name` varchar(255) NOT NULL,
  `featured` varchar(10) NOT NULL,
  `active` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_category`
--

INSERT INTO `tbl_category` (`id`, `title`, `image_name`, `featured`, `active`) VALUES
(9, 'fasting', 'Food_Category_755.jpg', 'Yes', 'Yes'),
(10, 'non-fasting ', 'Food_Category_425.jpg', 'Yes', 'Yes'),
(11, 'drinking', 'Food_Category_868.jpg', 'Yes', 'Yes');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_food`
--

CREATE TABLE `tbl_food` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(100) NOT NULL,
  `description` text NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `image_name` varchar(255) NOT NULL,
  `category_id` int(10) UNSIGNED NOT NULL,
  `featured` varchar(10) NOT NULL,
  `active` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_food`
--

INSERT INTO `tbl_food` (`id`, `title`, `description`, `price`, `image_name`, `category_id`, `featured`, `active`) VALUES
(10, 'gomen', 'best gomen', '2.00', 'Food-Name-5129.jpg', 9, 'Yes', 'Yes'),
(11, 'eggs', 'good for breakfast', '30.00', 'Food-Name-8725.jpg', 10, 'Yes', 'Yes'),
(12, 'coca cola', 'coca cola', '20.00', 'Food-Name-7396.jpg', 11, 'Yes', 'No'),
(13, 'firfir', 'it is best for kurs', '30.00', 'Food-Name-6339.jpg', 9, 'Yes', 'Yes');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_order`
--

CREATE TABLE `tbl_order` (
  `id` int(10) UNSIGNED NOT NULL,
  `food` varchar(150) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `qty` int(11) NOT NULL,
  `total` decimal(10,2) NOT NULL,
  `order_date` datetime NOT NULL,
  `status` varchar(50) NOT NULL,
  `customer_name` varchar(150) NOT NULL,
  `customer_contact` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_order`
--

INSERT INTO `tbl_order` (`id`, `food`, `price`, `qty`, `total`, `order_date`, `status`, `customer_name`, `customer_contact`) VALUES
(35, 'firfir', '30.00', 2, '60.00', '2022-06-26 10:02:43', 'taken', 'nahom', '0987'),
(36, 'firfir', '30.00', 1, '30.00', '2022-06-26 10:45:13', 'On Delivery', 'esu1', '0943'),
(37, 'eggs', '30.00', 1, '30.00', '2022-06-26 10:46:32', 'taken', 'nahom', '0943'),
(38, 'coca cola', '20.00', 1, '20.00', '2022-06-26 10:47:24', 'taken', 'nahom', '0987'),
(39, 'firfir', '30.00', 1, '30.00', '2022-06-27 12:08:28', 'taken', 'abebe', '09'),
(40, 'eggs', '30.00', 1, '30.00', '2022-06-28 08:24:11', 'On Delivery', 'nahom', '09'),
(41, 'eggs', '30.00', 1, '30.00', '2022-07-04 04:14:03', 'Ordered', 'dagne', '0909'),
(42, 'eggs', '30.00', 1, '30.00', '2022-07-04 04:14:19', 'Ordered', 'dagne', '0909'),
(43, 'eggs', '30.00', 1, '30.00', '2022-07-04 04:16:42', 'Ordered', 'dagne', '09'),
(44, 'eggs', '30.00', 1, '30.00', '2022-07-04 04:20:23', 'Ordered', 'dagne', '09'),
(45, 'eggs', '30.00', 1, '30.00', '2022-07-04 04:20:36', 'Ordered', 'dagne', '09');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `first_name` varchar(11) NOT NULL,
  `lname` varchar(11) NOT NULL,
  `email` varchar(30) DEFAULT NULL,
  `phone` mediumint(15) NOT NULL,
  `gender` varchar(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`first_name`, `lname`, `email`, `phone`, `gender`) VALUES
('abebe', 'kebede', NULL, 8388607, 'Male'),
('be', 'ha', NULL, 8388607, 'Male'),
('baa', 'haa', NULL, 8388607, 'Male'),
('berehe', 'hagazi', NULL, 8388607, 'Male'),
('bam', 'lak', NULL, 8388607, 'Male'),
('dagne', 'abebe', NULL, 9, 'Male'),
('esayas', 'alemu', NULL, 8388607, 'Male'),
('nahom', 'dagne', NULL, 9, 'Male'),
('456', '879', NULL, 9, 'Male'),
('nahom', 'abebe', '', 8388607, 'Male'),
('nahom', 'abebe', '', 8388607, 'Male'),
('nahom', 'abebe', '', 8388607, 'Male'),
('nahom', 'abebe', '', 8388607, 'Male'),
('nahom', 'abebe', '', 8388607, 'Male'),
('admin', 'abebe', '', 8388607, 'Male');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bank`
--
ALTER TABLE `bank`
  ADD PRIMARY KEY (`account_no`);

--
-- Indexes for table `employees`
--
ALTER TABLE `employees`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_category`
--
ALTER TABLE `tbl_category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_food`
--
ALTER TABLE `tbl_food`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_order`
--
ALTER TABLE `tbl_order`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `employees`
--
ALTER TABLE `employees`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=67;

--
-- AUTO_INCREMENT for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=68;

--
-- AUTO_INCREMENT for table `tbl_category`
--
ALTER TABLE `tbl_category`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `tbl_food`
--
ALTER TABLE `tbl_food`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `tbl_order`
--
ALTER TABLE `tbl_order`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
