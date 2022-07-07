-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 07, 2022 at 04:26 AM
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
('tewedros_lounge', 1000222, 1010, 1048),
('user', 1000234, 1234, 456292),
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
('abbe', 'nice', 'seen'),
('abbe', 'nice', 'seen'),
('abbe', 'nice', 'seen'),
('abbe', 'nice', 'seen'),
('abbe', 'nice', 'seen');

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
(66, 'almaz', 'alemu', 'Female', 943610431, 'Casher', 'bahir dar', 'de-active', 0),
(67, 'nahomm', 'abebe', 'Male', 943610431, 'Admin', 'bahir dar', 'active', 1),
(68, 'nahom', 'abebe', 'Male', 943610431, 'Admin', 'bahir dar', 'active', 0);

-- --------------------------------------------------------

--
-- Table structure for table `fedback`
--

CREATE TABLE `fedback` (
  `sender` varchar(20) NOT NULL,
  `message` longtext NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `fedback`
--

INSERT INTO `fedback` (`sender`, `message`, `date`) VALUES
('bahriwa01@gmail.com', 'hello', '2005-07-22');

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
(17, 'Admin', 'admin', 'd41d8cd98f00b204e9800998ecf8427e', 'Admin', 'active'),
(28, 'dagne', 'dagne', 'f6009d3df8774cf8ba810af9fa1f3d9d', 'customer', 'active'),
(32, 'almi', 'almi', '5ec16c9e099189f1e555065ba84ba617', 'Kichen', 'active'),
(33, 'abebe', 'abe', 'f64cff138020a2060a9817272f563b3c', 'Waiter', 'active'),
(34, '', 'bar', 'ed9e499f1b89d219f6eb12ecd98a0634', 'Barista', 'active'),
(35, 'manager', 'man', '1d0258c2440a8d19e716292b231e3190', 'Manager', 'active'),
(50, 'amare', 'amare', 'dd0776055e627f03ad9723c418bc666c', 'Casher', 'active'),
(77, 'abebe', 'abbe', 'dd0776055e627f03ad9723c418bc666c', 'customer', 'active');

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
(9, 'fasting', 'Food_Category_213.jpg', 'Yes', 'Yes'),
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
(12, 'coca cola', 'coca cola', '20.00', 'Food-Name-7396.jpg', 11, 'Yes', 'Yes'),
(13, 'firfir', 'it is best for kurs', '30.00', 'Food-Name-6339.jpg', 9, 'Yes', 'Yes'),
(14, 'shiro', 'best for lunch', '30.00', 'Food-Name-5086.jpg', 9, 'Yes', 'Yes');

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
(40, 'eggs', '30.00', 1, '30.00', '2022-06-28 08:24:11', 'Delivering', 'nahom', '09');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `first_name` varchar(11) NOT NULL,
  `lname` varchar(11) NOT NULL,
  `email` varchar(30) DEFAULT NULL,
  `phone` int(13) NOT NULL,
  `gender` varchar(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`first_name`, `lname`, `email`, `phone`, `gender`) VALUES
('abebe', 'alemu', '', 943610431, 'Male');

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=69;

--
-- AUTO_INCREMENT for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=78;

--
-- AUTO_INCREMENT for table `tbl_category`
--
ALTER TABLE `tbl_category`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `tbl_food`
--
ALTER TABLE `tbl_food`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `tbl_order`
--
ALTER TABLE `tbl_order`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=63;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
