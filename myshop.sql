-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 29, 2017 at 11:26 AM
-- Server version: 5.7.14
-- PHP Version: 5.6.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `myshop`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `admin_id` int(100) NOT NULL,
  `admin_email` varchar(100) NOT NULL,
  `admin_pass` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`admin_id`, `admin_email`, `admin_pass`) VALUES
(1, 'meetsonusharma07@gmail.com', 'asdf'),
(2, 'soyalahimed@gmail.com', 'asdf');

-- --------------------------------------------------------

--
-- Table structure for table `brands`
--

CREATE TABLE `brands` (
  `brand_id` int(10) NOT NULL,
  `brand_title` varchar(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `brands`
--

INSERT INTO `brands` (`brand_id`, `brand_title`) VALUES
(1, 'HP ink'),
(2, 'DELL'),
(3, 'Apple'),
(4, 'Windows');

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `p_id` int(10) NOT NULL,
  `ip_add` varchar(10) NOT NULL,
  `qty` int(10) DEFAULT NULL,
  `amnt` int(30) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `catagory`
--

CREATE TABLE `catagory` (
  `cat_id` int(10) NOT NULL,
  `cat_title` varchar(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `catagory`
--

INSERT INTO `catagory` (`cat_id`, `cat_title`) VALUES
(1, 'Laptop'),
(2, 'Computer'),
(3, 'Tablets'),
(4, 'Mobiles'),
(9, 'memory chip'),
(11, 'ear phone');

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `customer_id` int(10) NOT NULL,
  `customer_name` varchar(100) NOT NULL,
  `customer_email` varchar(100) NOT NULL,
  `customer_pass` varchar(100) NOT NULL,
  `customer_country` text NOT NULL,
  `customer_city` text NOT NULL,
  `customer_contact` varchar(10) NOT NULL,
  `customer_address` text NOT NULL,
  `customer_image` text NOT NULL,
  `customer_ip` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`customer_id`, `customer_name`, `customer_email`, `customer_pass`, `customer_country`, `customer_city`, `customer_contact`, `customer_address`, `customer_image`, `customer_ip`) VALUES
(1, 'sonu', 'mahagyani@gmail.com', 'asdf', 'Inida', 'Bangalore', '1234567890', '#sf,fdf,dfsd, 560099', 'user1.jpg', '::1'),
(2, 'one', 'two@gmail.com', 'asdf', 'india', 'ban', 'asdgfa', 'afs', 'extractme.jpg', '	 ::1'),
(3, 's', 'three@gmail.com', 'asdf', 'India', 'bangalore', '1234567891', 'sd', 'cap.png', '::1'),
(4, 'tt', 'three@gmail.com', 'asdf', 'India', 'bangalore', '1234567891', 'da', 'cap.png', '::1'),
(5, 'a', 'as', 'asdfas', 'India', 'asda', '1234567891', 'asdf', 'cap.png', '::1'),
(6, 's', 'as', 's', 'India', 'asd', '1234567891', 'sa', 'cap.png', '::1'),
(7, 'aa', 'as', 'asdf', 'India', 'asd', '1234567891', 'asdf', 'cap.png', '::1'),
(8, 'sd', 'sd', 'df', 'India', 'dsf', 'sdf', 'sfd', 'cap.png', '::1'),
(9, 'a', 'asa', 'asdf', 'India', 'asda', 'a', 'ad', 'cap.png', '::1'),
(10, 'muzzammil', 'muzza@gmail.com', '12345', 'India', 'Bangalore', '123', '12, bangalore', 'user1.jpg', '::1');

-- --------------------------------------------------------

--
-- Table structure for table `customer_orders`
--

CREATE TABLE `customer_orders` (
  `order_id` int(10) NOT NULL,
  `customer_id` int(10) NOT NULL,
  `due_amount` int(110) NOT NULL,
  `invoice_no` int(110) NOT NULL,
  `total_products` int(110) NOT NULL,
  `order_date` timestamp NOT NULL,
  `order_status` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customer_orders`
--

INSERT INTO `customer_orders` (`order_id`, `customer_id`, `due_amount`, `invoice_no`, `total_products`, `order_date`, `order_status`) VALUES
(26, 1, 1798, 413499073, 2, '2017-05-18 09:09:57', 'Complete'),
(25, 1, 564, 1386280553, 1, '2017-05-16 08:53:09', 'Complete'),
(24, 1, 5675, 544791055, 2, '2017-05-16 07:28:00', 'Complete'),
(23, 1, 3, 862310513, 1, '2017-05-16 07:10:55', 'Complete'),
(27, 1, 1130, 1882540931, 2, '2017-05-18 09:13:01', 'Complete'),
(28, 1, 6787, 1812153160, 1, '2017-05-18 09:46:54', 'Pending');

-- --------------------------------------------------------

--
-- Table structure for table `payments`
--

CREATE TABLE `payments` (
  `payment_id` int(10) NOT NULL,
  `o_id` text NOT NULL,
  `invoice_no` int(10) NOT NULL,
  `amount` int(10) NOT NULL,
  `payment_mode` text NOT NULL,
  `ref_no` int(10) NOT NULL,
  `payment_date` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `payments`
--

INSERT INTO `payments` (`payment_id`, `o_id`, `invoice_no`, `amount`, `payment_mode`, `ref_no`, `payment_date`) VALUES
(29, '0', 862310513, 3, 'Paypal', 22, '2016-5-16'),
(28, '0', 862310513, 3, 'Bank Transfer', 232, '2016-5-16'),
(32, '25', 1386280553, 1222, 'Bank Transfer', 11, '2016-5-16'),
(33, '26', 413499073, 1798, 'Paypal', 1234, '18-5-2017'),
(34, '27', 1882540931, 1130, 'Paypal', 1234567, '18-5-2017');

-- --------------------------------------------------------

--
-- Table structure for table `pending_orders`
--

CREATE TABLE `pending_orders` (
  `order_id` int(10) NOT NULL,
  `customer_id` int(10) NOT NULL,
  `invoice_no` int(10) NOT NULL,
  `product_id` int(10) NOT NULL,
  `qty` int(100) NOT NULL,
  `order_status` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pending_orders`
--

INSERT INTO `pending_orders` (`order_id`, `customer_id`, `invoice_no`, `product_id`, `qty`, `order_status`) VALUES
(25, 1, 1386280553, 9, 1, 'Complete'),
(24, 1, 544791055, 8, 1, 'Complete'),
(23, 1, 862310513, 16, 1, 'Complete'),
(26, 1, 413499073, 4, 1, 'Complete'),
(27, 1, 1882540931, 13, 2, 'Complete'),
(28, 1, 1812153160, 6, 1, 'Pending');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `product_id` int(10) NOT NULL,
  `cat_id` int(10) NOT NULL,
  `brand_id` int(10) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `product_title` text NOT NULL,
  `product_img1` text NOT NULL,
  `product_img2` text NOT NULL,
  `product_img3` text NOT NULL,
  `product_price` int(10) NOT NULL,
  `product_desc` text NOT NULL,
  `status` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`product_id`, `cat_id`, `brand_id`, `date`, `product_title`, `product_img1`, `product_img2`, `product_img3`, `product_price`, `product_desc`, `status`) VALUES
(2, 4, 4, '2017-05-14 07:04:40', 'blue-laptop', 'image (1).jpg', 'image (3).jpg', '1.png', 345, '<p>asdzxc</p>', 'on'),
(3, 4, 4, '2017-05-13 10:44:52', 'hp-black', 'image (4).jpg', 'image (3).jpg', '1.png', 700, '<p>cool apple - hp combo</p>', 'on'),
(4, 4, 4, '2017-05-13 10:45:03', 'HP - 700XP', 'image (5).jpg', 'image (2).jpg', '1.png', 1234, '<p>windows Computer mono-chrome bakwas ....</p>', 'on'),
(5, 4, 4, '2017-05-13 10:47:22', 'cool-pad', '1.png', 'image (4).jpg', 'image (5).jpg', 456, '<p>Dell laptop like Coool pad...</p>', 'on'),
(6, 4, 4, '2017-05-13 10:47:16', 'hell_ring', '1.png', 'image (4).jpg', 'image (1).jpg', 6787, '<p>another version apple</p>', 'on'),
(7, 4, 4, '2017-05-13 10:47:10', 'hell_ring', '1.png', 'image (4).jpg', 'image (1).jpg', 6787, '<p>another version apple</p>', 'on'),
(8, 4, 4, '2017-04-23 10:48:28', 'HP-new_style', 'image (2).jpg', 'image (3).jpg', 'image (1).jpg', 5674, '<p>Hallo JI</p>', 'on'),
(9, 1, 3, '2017-05-13 10:46:58', 'hp_real', 'image (3).jpg', 'image (1).jpg', '1.png', 564, '<p>564</p>', 'on'),
(10, 1, 1, '2017-05-14 03:32:58', 'new in Market', 'image (5).jpg', 'image (5).jpg', 'image (5).jpg', 1, '<p>Best in The Market</p>', 'on'),
(11, 1, 1, '2017-05-14 03:35:16', 'new in Market', 'image (5).jpg', 'image (5).jpg', 'image (5).jpg', 1, '<p>Best in The Market</p>', 'on'),
(12, 1, 1, '2017-05-14 03:36:35', 'new in Market', 'image (5).jpg', 'image (5).jpg', 'image (5).jpg', 1, '<p>Best in The Market</p>', 'on'),
(13, 1, 1, '2017-05-14 03:37:59', 'new in Market', 'image (5).jpg', 'image (5).jpg', 'image (5).jpg', 1, '<p>Best in The Market</p>', 'on'),
(16, 3, 3, '2017-05-14 03:42:16', 'new in Market', 'image (5).jpg', 'image (4).jpg', 'image (3).jpg', 3, '<p>ad</p>', 'on');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `brands`
--
ALTER TABLE `brands`
  ADD PRIMARY KEY (`brand_id`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`p_id`);

--
-- Indexes for table `catagory`
--
ALTER TABLE `catagory`
  ADD PRIMARY KEY (`cat_id`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`customer_id`);

--
-- Indexes for table `customer_orders`
--
ALTER TABLE `customer_orders`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`payment_id`);

--
-- Indexes for table `pending_orders`
--
ALTER TABLE `pending_orders`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`product_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `admin_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `brands`
--
ALTER TABLE `brands`
  MODIFY `brand_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `catagory`
--
ALTER TABLE `catagory`
  MODIFY `cat_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `customer_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `customer_orders`
--
ALTER TABLE `customer_orders`
  MODIFY `order_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;
--
-- AUTO_INCREMENT for table `payments`
--
ALTER TABLE `payments`
  MODIFY `payment_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;
--
-- AUTO_INCREMENT for table `pending_orders`
--
ALTER TABLE `pending_orders`
  MODIFY `order_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;
--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `product_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
