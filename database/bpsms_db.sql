-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 07, 2023 at 04:29 AM
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
-- Database: `bpsms_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `brand_list`
--

CREATE TABLE `brand_list` (
  `id` int(30) NOT NULL,
  `name` text NOT NULL,
  `image_path` text NOT NULL,
  `delete_flag` tinyint(1) NOT NULL DEFAULT 0,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `date_created` datetime NOT NULL DEFAULT current_timestamp(),
  `date_updated` datetime DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `brand_list`
--

INSERT INTO `brand_list` (`id`, `name`, `image_path`, `delete_flag`, `status`, `date_created`, `date_updated`) VALUES
(1, 'Yamaha', 'uploads/brands/1.png?v=1642731446', 0, 1, '2022-01-21 10:03:12', '2022-01-21 10:17:26'),
(2, 'Kawasaki', 'uploads/brands/2.png?v=1642731379', 0, 1, '2022-01-21 10:10:24', '2022-01-21 10:16:19'),
(3, 'BMWa', 'uploads/brands/3.png?v=1642731467', 0, 1, '2022-01-21 10:17:47', '2023-03-06 20:19:00'),
(4, 'Harley Davidson', 'uploads/brands/4.png?v=1642731495', 0, 1, '2022-01-21 10:18:15', '2022-01-21 10:18:15'),
(5, 'Ducati', 'uploads/brands/5.png?v=1642731515', 0, 1, '2022-01-21 10:18:35', '2022-01-21 10:18:35'),
(6, 'Oil Company', 'uploads/brands/6.jpg?v=1642744467', 0, 1, '2022-01-21 13:54:27', '2022-01-21 13:54:27'),
(7, 'Maxxis', 'uploads/brands/7.jpg?v=1642744509', 0, 1, '2022-01-21 13:55:09', '2022-01-21 13:55:09');

-- --------------------------------------------------------

--
-- Table structure for table `cart_list`
--

CREATE TABLE `cart_list` (
  `id` int(30) NOT NULL,
  `client_id` int(30) NOT NULL,
  `product_id` int(30) NOT NULL,
  `quantity` float NOT NULL,
  `date_added` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cart_list`
--

INSERT INTO `cart_list` (`id`, `client_id`, `product_id`, `quantity`, `date_added`) VALUES
(15, 1, 4, 1, '2023-02-27 11:45:34'),
(16, 1, 1, 1, '2023-02-27 11:47:50'),
(17, 2, 4, 1, '2023-02-27 15:01:06'),
(18, 8, 5, 1, '2023-02-28 09:01:47');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(30) NOT NULL,
  `category` varchar(250) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `delete_flag` tinyint(1) NOT NULL DEFAULT 0,
  `date_created` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `category`, `status`, `delete_flag`, `date_created`) VALUES
(0, 'eeqw', 1, 0, '2023-03-06 20:19:09'),
(1, 'Accessories', 1, 0, '2021-09-30 09:42:40'),
(2, 'Chassis', 1, 0, '2021-09-30 09:43:00'),
(3, 'Tools', 1, 0, '2021-09-30 09:43:48'),
(5, 'Tires', 1, 0, '2022-01-21 10:33:07'),
(6, 'Mugs', 1, 0, '2022-01-21 10:33:31'),
(7, 'Oils', 1, 0, '2022-01-21 10:33:47'),
(8, 'Machine Parts', 1, 0, '2022-01-21 10:34:07'),
(9, 'Body Parts', 1, 0, '2022-01-21 13:55:39');

-- --------------------------------------------------------

--
-- Table structure for table `client_list`
--

CREATE TABLE `client_list` (
  `id` int(30) NOT NULL,
  `firstname` text NOT NULL,
  `middlename` text DEFAULT NULL,
  `lastname` text NOT NULL,
  `gender` text NOT NULL,
  `contact` text NOT NULL,
  `address` text NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `delete_flag` tinyint(1) NOT NULL DEFAULT 0,
  `date_created` datetime NOT NULL DEFAULT current_timestamp(),
  `date_added` datetime DEFAULT NULL ON UPDATE current_timestamp(),
  `code` mediumint(50) DEFAULT NULL,
  `clientstatus` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `client_list`
--

INSERT INTO `client_list` (`id`, `firstname`, `middlename`, `lastname`, `gender`, `contact`, `address`, `email`, `password`, `status`, `delete_flag`, `date_created`, `date_added`, `code`, `clientstatus`) VALUES
(9, 'Joy', 'R.', 'Male', '', '09971909123', 'Brgy. Macalpe', 'joy@gmail.com', '25f9e794323b453885f5181f1b624d0b', 1, 0, '2023-02-28 10:37:03', '2023-02-28 11:35:48', 0, ''),
(10, 'mark', 'holand', 'Ford', 'Male', '09971909675', 'brgy. cal-apog', 'mark@gmail.con', '202cb962ac59075b964b07152d234b70', 1, 0, '2023-02-28 11:03:59', '2023-03-07 11:04:56', NULL, ''),
(11, 'Sonz', 'Solayao', 'Verzosa', 'Male', '09971909123', 'Brgy. Mercedes Catbalogan City', 'sonz@gmail.com', '202cb962ac59075b964b07152d234b70', 1, 0, '2023-03-06 20:49:35', NULL, NULL, ''),
(12, 'Sonz', 'Solayao', 'Verzosa', 'Male', '09971903333', 'Brgy. Daram', 'sonnyboyellema96@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', 1, 0, '2023-03-07 09:00:06', '2023-03-07 10:55:38', 0, '');

-- --------------------------------------------------------

--
-- Table structure for table `mechanics_list`
--

CREATE TABLE `mechanics_list` (
  `id` int(30) NOT NULL,
  `name` text NOT NULL,
  `contact` varchar(50) NOT NULL,
  `email` varchar(150) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `date_created` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `mechanics_list`
--

INSERT INTO `mechanics_list` (`id`, `name`, `contact`, `email`, `status`, `date_created`) VALUES
(1, 'Mike Williams', '09123456789', 'mwilliams@sample.com', 1, '2022-09-30 10:26:11'),
(2, 'George Wilson', '09112355799', 'gwilson@gmail.com', 1, '2022-09-30 10:30:58');

-- --------------------------------------------------------

--
-- Table structure for table `order_items`
--

CREATE TABLE `order_items` (
  `id` int(30) NOT NULL,
  `order_id` int(30) NOT NULL,
  `product_id` int(30) NOT NULL,
  `quantity` float NOT NULL DEFAULT 0,
  `date_added` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `order_items`
--

INSERT INTO `order_items` (`id`, `order_id`, `product_id`, `quantity`, `date_added`) VALUES
(1, 0, 4, 1, '2023-02-28 10:39:29'),
(8, 6, 1, 1, '2022-01-24 16:37:18'),
(9, 6, 4, 2, '2022-01-24 16:37:18'),
(10, 7, 4, 2, '2022-01-25 10:43:19'),
(11, 7, 3, 4, '2022-01-25 10:43:19'),
(12, 16, 4, 1, '2023-02-28 11:21:16'),
(13, 17, 4, 1, '2023-02-28 11:22:57'),
(14, 17, 3, 1, '2023-02-28 11:22:57'),
(15, 18, 1, 1, '2023-02-28 11:26:34'),
(16, 19, 1, 1, '2023-02-28 11:31:58'),
(17, 20, 4, 1, '2023-02-28 11:36:51'),
(18, 21, 5, 1, '2023-02-28 23:29:25'),
(19, 22, 3, 1, '2023-03-06 20:50:55'),
(20, 23, 1, 1, '2023-03-06 21:45:02'),
(21, 24, 1, 1, '2023-03-06 23:19:47'),
(22, 25, 1, 1, '2023-03-07 09:00:34'),
(23, 26, 1, 1, '2023-03-07 10:56:23');

-- --------------------------------------------------------

--
-- Table structure for table `order_list`
--

CREATE TABLE `order_list` (
  `id` int(55) NOT NULL,
  `ref_code` varchar(100) NOT NULL,
  `client_id` int(30) NOT NULL,
  `total_amount` float NOT NULL DEFAULT 0,
  `delivery_address` text NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 0 COMMENT '0=pending,1 = packed, 2 = for delivery, 3 = on the way, 4 = delivered, 5=cancelled',
  `date_created` datetime NOT NULL DEFAULT current_timestamp(),
  `date_updated` datetime DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `order_list`
--

INSERT INTO `order_list` (`id`, `ref_code`, `client_id`, `total_amount`, `delivery_address`, `status`, `date_created`, `date_updated`) VALUES
(17, '202302-00001', 10, 5020, 'brgy. cal-apog', 1, '2023-02-28 11:22:57', '2023-02-28 11:24:50'),
(18, '202302-00002', 9, 2500, 'Brgy. Macalpe', 0, '2023-02-28 11:26:34', '2023-02-28 11:26:34'),
(19, '202302-00003', 9, 2500, 'Brgy. Macalpe', 0, '2023-02-28 11:31:58', '2023-02-28 11:31:58'),
(20, '202302-00004', 9, 4500, 'Brgy. Macalpe', 0, '2023-02-28 11:36:51', '2023-02-28 11:36:51'),
(21, '202302-00005', 9, 10000, 'Brgy. Macalpe', 0, '2023-02-28 23:29:25', '2023-02-28 23:29:25'),
(22, '202303-00001', 11, 520, 'Brgy. Mercedes Catbalogan City', 1, '2023-03-06 20:50:55', '2023-03-07 10:57:49'),
(23, '202303-00002', 11, 350, 'Brgy. Mercedes Catbalogan City', 5, '2023-03-06 21:45:02', '2023-03-07 01:05:03'),
(24, '202303-00003', 11, 350, 'Brgy. Mercedes Catbalogan City', 5, '2023-03-06 23:19:47', '2023-03-07 00:55:10'),
(25, '202303-00004', 12, 350, 'Brgy. Daram', 5, '2023-03-07 09:00:34', '2023-03-07 09:01:21'),
(26, '202303-00005', 12, 350, 'Brgy. Daram', 5, '2023-03-07 10:56:23', '2023-03-07 10:56:44');

-- --------------------------------------------------------

--
-- Table structure for table `product_list`
--

CREATE TABLE `product_list` (
  `id` int(55) NOT NULL,
  `brand_id` int(55) NOT NULL,
  `category_id` int(55) NOT NULL,
  `name` text NOT NULL,
  `models` text NOT NULL,
  `description` text NOT NULL,
  `price` float NOT NULL DEFAULT 0,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `image_path` text NOT NULL,
  `delete_flag` tinyint(1) NOT NULL DEFAULT 0,
  `date_created` datetime NOT NULL DEFAULT current_timestamp(),
  `date_updated` datetime DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product_list`
--

INSERT INTO `product_list` (`id`, `brand_id`, `category_id`, `name`, `models`, `description`, `price`, `status`, `image_path`, `delete_flag`, `date_created`, `date_updated`) VALUES
(1, 2, 1, 'Java Script', 'YAMAHA', '&lt;p&gt;Sample description&lt;/p&gt;', 350, 1, 'uploads/products/1.jpg?v=1678108409', 0, '2023-03-06 21:13:29', '2023-03-06 21:14:46'),
(2, 3, 9, 'Sample Name', 'YAMAHA', '&lt;p&gt;Sample description&lt;/p&gt;', 550, 1, 'uploads/products/2.jpg?v=1678108548', 1, '2023-03-06 21:15:48', '2023-03-06 21:16:00'),
(3, 2, 9, 'fafaff', 'YAMAHA', '&lt;p&gt;fafafaf&lt;/p&gt;', 240, 1, 'uploads/products/3.jpg?v=1678157908', 0, '2023-03-07 10:58:28', '2023-03-07 11:05:15');

-- --------------------------------------------------------

--
-- Table structure for table `request_meta`
--

CREATE TABLE `request_meta` (
  `request_id` int(30) NOT NULL,
  `meta_field` text NOT NULL,
  `meta_value` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `request_meta`
--

INSERT INTO `request_meta` (`request_id`, `meta_field`, `meta_value`) VALUES
(5, 'vehicle_type', 'Sample 102'),
(5, 'vehicle_name', 'Sample'),
(5, 'vehicle_registration_number', 'TEST123'),
(5, 'vehicle_model', 'test'),
(5, 'service_id', '3'),
(5, 'pickup_address', 'Sample Address'),
(4, 'vehicle_type', 'Sample'),
(4, 'vehicle_name', 'Yamaha Nmax V2'),
(4, 'vehicle_registration_number', 'GCN 2306'),
(4, 'vehicle_model', '2021'),
(4, 'service_id', '1,2,4'),
(4, 'pickup_address', '');

-- --------------------------------------------------------

--
-- Table structure for table `service_list`
--

CREATE TABLE `service_list` (
  `id` int(30) NOT NULL,
  `service` text NOT NULL,
  `description` text NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `delete_flag` tinyint(1) NOT NULL DEFAULT 0,
  `date_created` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `service_list`
--

INSERT INTO `service_list` (`id`, `service`, `description`, `status`, `delete_flag`, `date_created`) VALUES
(1, 'Change Oil', '&lt;p&gt;&lt;span style=&quot;text-align: justify;&quot;&gt;Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec vel sapien lectus. Ut posuere, arcu eget bibendum venenatis, quam diam interdum diam, in viverra leo quam eu mi. Sed bibendum mauris nulla, vel vehicula libero elementum vel. Nam blandit justo justo, dapibus sodales risus consectetur nec. Suspendisse ornare in purus et mollis. Praesent placerat quis lectus at hendrerit. Morbi maximus dolor dolor, a maximus mi congue quis.&lt;/span&gt;&lt;br&gt;&lt;/p&gt;', 1, 0, '2021-09-30 14:11:21'),
(2, 'Overall Checkup', '&lt;p&gt;&lt;span style=&quot;text-align: justify;&quot;&gt;Curabitur nec viverra tellus. Donec quis molestie arcu. Sed et blandit dui, vel vehicula tortor. Vivamus fringilla sit amet nibh fringilla ornare. Etiam iaculis ornare purus id feugiat. Etiam mattis erat ut congue tempor. Nam placerat faucibus libero ultrices posuere. Donec ac tempus nulla.&lt;/span&gt;&lt;br&gt;&lt;/p&gt;', 1, 0, '2021-09-30 14:11:38'),
(3, 'Engine Tune up', '&lt;p&gt;&lt;span style=&quot;text-align: justify;&quot;&gt;Sed ultrices fermentum augue. Duis ultricies arcu vitae lorem accumsan porta. Donec fermentum risus ut tincidunt cursus. Sed varius id dolor et euismod. Vestibulum elit massa, varius nec arcu vel, viverra varius dolor. Etiam fermentum vel lorem vel tincidunt. Ut nec libero pulvinar, malesuada lacus et, tempor diam. Aliquam vitae nisl augue.&lt;/span&gt;&lt;br&gt;&lt;/p&gt;', 1, 0, '2021-09-30 14:12:03'),
(4, 'Tire Replacement', '&lt;p&gt;&lt;span style=&quot;text-align: justify;&quot;&gt;Nullam pretium eu justo ac tincidunt. Vestibulum quis est non felis porttitor pretium. Vivamus nec augue ultrices, condimentum risus vitae, pellentesque turpis. Nullam ornare est sapien, sed semper neque imperdiet suscipit. Sed fermentum eros et felis mollis finibus. In condimentum eleifend magna, non consequat nibh viverra nec. Nulla vel sapien libero. Suspendisse varius nisl nec ornare imperdiet.&lt;/span&gt;&lt;br&gt;&lt;/p&gt;', 1, 0, '2021-09-30 14:12:24');

-- --------------------------------------------------------

--
-- Table structure for table `service_requests`
--

CREATE TABLE `service_requests` (
  `id` int(30) NOT NULL,
  `client_id` int(30) NOT NULL,
  `service_type` text NOT NULL,
  `mechanic_id` int(30) DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 0,
  `date_created` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `service_requests`
--

INSERT INTO `service_requests` (`id`, `client_id`, `service_type`, `mechanic_id`, `status`, `date_created`) VALUES
(4, 1, 'Drop Off', 2, 3, '2022-01-25 09:47:31'),
(5, 1, 'Pick Up', NULL, 4, '2022-01-25 10:25:23');

-- --------------------------------------------------------

--
-- Table structure for table `stock_list`
--

CREATE TABLE `stock_list` (
  `id` int(55) NOT NULL,
  `product_id` int(55) NOT NULL,
  `quantity` float NOT NULL DEFAULT 0,
  `type` tinyint(1) NOT NULL DEFAULT 1 COMMENT '1= IN, 2= Out',
  `date_created` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `stock_list`
--

INSERT INTO `stock_list` (`id`, `product_id`, `quantity`, `type`, `date_created`) VALUES
(1, 1, 6, 1, '2023-03-06 21:21:33'),
(2, 1, 10, 1, '2023-03-06 21:24:31'),
(3, 1, 1, 1, '2023-03-06 21:28:00'),
(4, 3, 10, 1, '2023-03-07 10:58:49'),
(5, 1, 5, 1, '2023-03-07 10:59:06');

-- --------------------------------------------------------

--
-- Table structure for table `system_info`
--

CREATE TABLE `system_info` (
  `id` int(30) NOT NULL,
  `meta_field` text NOT NULL,
  `meta_value` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `system_info`
--

INSERT INTO `system_info` (`id`, `meta_field`, `meta_value`) VALUES
(1, 'name', 'Motorcycle Parts & Services Shop Management System'),
(6, 'short_name', 'MPSSMS- PHP'),
(11, 'logo', 'uploads/1642728480_logo.jpg'),
(13, 'user_avatar', 'uploads/user_avatar.jpg'),
(14, 'cover', 'uploads/1643082720_bike-cover-2.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(50) NOT NULL,
  `firstname` varchar(250) NOT NULL,
  `lastname` varchar(250) NOT NULL,
  `username` text NOT NULL,
  `password` text NOT NULL,
  `avatar` text DEFAULT NULL,
  `last_login` datetime DEFAULT NULL,
  `type` tinyint(1) NOT NULL DEFAULT 0,
  `date_added` datetime NOT NULL DEFAULT current_timestamp(),
  `date_updated` datetime DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `firstname`, `lastname`, `username`, `password`, `avatar`, `last_login`, `type`, `date_added`, `date_updated`) VALUES
(1, 'Adminstrator', 'Admin', 'admin', '0192023a7bbd73250516f069df18b500', 'uploads/1624240500_avatar.png', NULL, 1, '2021-01-20 14:02:37', '2021-06-21 09:55:07'),
(6, 'Claire', 'Blake', 'cblake', '202cb962ac59075b964b07152d234b70', 'uploads/1632990840_ava.jpg', NULL, 2, '2021-09-30 16:34:02', '2023-02-27 10:54:01');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `brand_list`
--
ALTER TABLE `brand_list`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cart_list`
--
ALTER TABLE `cart_list`
  ADD PRIMARY KEY (`id`),
  ADD KEY `client_id` (`client_id`),
  ADD KEY `product_id` (`product_id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `client_list`
--
ALTER TABLE `client_list`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mechanics_list`
--
ALTER TABLE `mechanics_list`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order_items`
--
ALTER TABLE `order_items`
  ADD PRIMARY KEY (`id`),
  ADD KEY `order_id` (`order_id`),
  ADD KEY `product_id` (`product_id`);

--
-- Indexes for table `order_list`
--
ALTER TABLE `order_list`
  ADD PRIMARY KEY (`id`),
  ADD KEY `client_id` (`client_id`);

--
-- Indexes for table `product_list`
--
ALTER TABLE `product_list`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `request_meta`
--
ALTER TABLE `request_meta`
  ADD KEY `request_id` (`request_id`);

--
-- Indexes for table `service_list`
--
ALTER TABLE `service_list`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `service_requests`
--
ALTER TABLE `service_requests`
  ADD PRIMARY KEY (`id`),
  ADD KEY `client_id` (`client_id`),
  ADD KEY `mechanic_id` (`mechanic_id`);

--
-- Indexes for table `stock_list`
--
ALTER TABLE `stock_list`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `system_info`
--
ALTER TABLE `system_info`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `brand_list`
--
ALTER TABLE `brand_list`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `cart_list`
--
ALTER TABLE `cart_list`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `client_list`
--
ALTER TABLE `client_list`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `order_items`
--
ALTER TABLE `order_items`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `order_list`
--
ALTER TABLE `order_list`
  MODIFY `id` int(55) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `product_list`
--
ALTER TABLE `product_list`
  MODIFY `id` int(55) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `stock_list`
--
ALTER TABLE `stock_list`
  MODIFY `id` int(55) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
