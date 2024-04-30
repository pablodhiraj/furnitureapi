-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 21, 2024 at 04:06 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `furnitureland`
--

-- --------------------------------------------------------

--
-- Table structure for table `buyer`
--

CREATE TABLE `buyer` (
  `id` int(45) NOT NULL,
  `fname` varchar(255) NOT NULL,
  `lname` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `phone` bigint(10) NOT NULL,
  `verification_token` varchar(255) DEFAULT NULL,
  `is_verified` varchar(42) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `buyer`
--

INSERT INTO `buyer` (`id`, `fname`, `lname`, `password`, `email`, `address`, `phone`, `verification_token`, `is_verified`) VALUES
(17, 'dhiraj', 'thakur', '$2y$10$Rp8pCpHgXm9gbA5ncSSUUuF6y/riUJAXri6yFK89FiX4tcCQ2g7gy', 'dhiraj22thakur@gmail.com', 'Lalitpur', 9840452386, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `category` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `price` int(255) NOT NULL,
  `discount` int(255) NOT NULL,
  `location` varchar(255) NOT NULL,
  `buyerid` varchar(255) NOT NULL,
  `productid` int(255) NOT NULL,
  `userid` int(255) NOT NULL,
  `storename` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`id`, `name`, `category`, `description`, `price`, `discount`, `location`, `buyerid`, `productid`, `userid`, `storename`) VALUES
(28, 'Master Bed', 'Bed', '<p>this is very comfortable bed</p>', 50000, 49999, 'products/1696823277bed.jpg', '10', 20, 20, 'Furniture Land'),
(30, 'Couch', 'Chairs', '', 654666, 65465, 'products/1696910153chair.jpg', '16', 23, 20, 'Furniture Land'),
(31, 'Couch', 'Chairs', '', 654666, 65465, 'products/1696910153chair.jpg', '17', 23, 20, 'Furniture Land'),
(32, 'Couch', 'Chairs', '', 654666, 65465, 'products/1696910153chair.jpg', '17', 23, 20, 'Furniture Land');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `category` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `category`) VALUES
(15, 'Bed'),
(17, 'Tables'),
(18, 'Chairs'),
(20, 'Office\r\n'),
(21, 'Dining');

-- --------------------------------------------------------

--
-- Table structure for table `checkout`
--

CREATE TABLE `checkout` (
  `id` int(11) NOT NULL,
  `ddate` varchar(255) NOT NULL,
  `productid` int(255) NOT NULL,
  `amount` int(255) NOT NULL,
  `userid` int(255) NOT NULL,
  `buyerid` int(255) NOT NULL,
  `buyeremail` varchar(255) NOT NULL,
  `location` text NOT NULL,
  `paymentstatus` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `storename` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `checkout`
--

INSERT INTO `checkout` (`id`, `ddate`, `productid`, `amount`, `userid`, `buyerid`, `buyeremail`, `location`, `paymentstatus`, `status`, `storename`) VALUES
(114, '', 15, 90000, 0, 3, 'dhiraj22thakur@gmail.com', 'products/1691123086office.jpg', '', '', 'Furniture Land'),
(115, '', 15, 90000, 0, 3, 'dhiraj22thakur@gmail.com', 'products/1691123086office.jpg', '', '', 'Furniture Land'),
(116, '', 15, 90000, 0, 3, 'dhiraj22thakur@gmail.com', 'products/1691123086office.jpg', '', '', 'Furniture Land'),
(117, '', 15, 90000, 0, 3, 'dhiraj22thakur@gmail.com', 'products/1691123086office.jpg', '', '', 'Furniture Land'),
(118, '', 15, 90000, 0, 3, 'dhiraj22thakur@gmail.com', 'products/1691123086office.jpg', '', '', 'Furniture Land'),
(119, '', 15, 90000, 0, 3, 'dhiraj22thakur@gmail.com', 'products/1691123086office.jpg', '', '', 'Furniture Land'),
(120, '', 15, 90000, 0, 3, 'dhiraj22thakur@gmail.com', 'products/1691123086office.jpg', '', '', 'Furniture Land'),
(121, '', 15, 90000, 0, 3, 'dhiraj22thakur@gmail.com', 'products/1691123086office.jpg', '', '', 'Furniture Land'),
(122, '', 15, 90000, 0, 3, 'dhiraj22thakur@gmail.com', 'products/1691123086office.jpg', '', '', 'Furniture Land'),
(123, '', 15, 90000, 0, 3, 'dhiraj22thakur@gmail.com', 'products/1691123086office.jpg', '', '', 'Furniture Land'),
(124, '', 15, 90000, 0, 3, 'dhiraj22thakur@gmail.com', 'products/1691123086office.jpg', '', '', 'Furniture Land'),
(125, '', 15, 90000, 0, 3, 'dhiraj22thakur@gmail.com', 'products/1691123086office.jpg', '', '', 'Furniture Land'),
(126, '', 15, 90000, 0, 3, 'dhiraj22thakur@gmail.com', 'products/1691123086office.jpg', '', '', 'Furniture Land'),
(127, '', 15, 90000, 0, 3, 'dhiraj22thakur@gmail.com', 'products/1691123086office.jpg', '', '', 'Furniture Land'),
(128, '', 15, 90000, 0, 3, 'dhiraj22thakur@gmail.com', 'products/1691123086office.jpg', '', '', 'Furniture Land'),
(129, '', 12, 40000, 0, 3, 'dhiraj22thakur@gmail.com', 'products/1691115419bed.png', '', '', 'Furniture Land'),
(130, '', 12, 40000, 0, 3, 'dhiraj22thakur@gmail.com', 'products/1691115419bed.png', '', '', 'Furniture Land'),
(131, '', 12, 40000, 0, 3, 'dhiraj22thakur@gmail.com', 'products/1691115419bed.png', '', '', 'Furniture Land'),
(132, '2023-10-09', 1696814008, 40000, 18, 3, 'dhiraj22thakur@gmail.com', 'products/1691115419bed.png', '', '', 'Furniture Land'),
(133, '', 12, 40000, 0, 3, 'dhiraj22thakur@gmail.com', 'products/1691115419bed.png', '', '', 'Furniture Land'),
(134, '', 12, 40000, 0, 3, 'dhiraj22thakur@gmail.com', 'products/1691115419bed.png', '', '', 'Furniture Land'),
(135, '', 12, 40000, 0, 3, 'dhiraj22thakur@gmail.com', 'products/1691115419bed.png', '', '', 'Furniture Land'),
(136, '', 12, 40000, 0, 3, 'dhiraj22thakur@gmail.com', 'products/1691115419bed.png', '', '', 'Furniture Land'),
(137, '', 12, 40000, 0, 3, 'dhiraj22thakur@gmail.com', 'products/1691115419bed.png', '', '', 'Furniture Land'),
(138, '', 12, 40000, 0, 3, 'dhiraj22thakur@gmail.com', 'products/1691115419bed.png', '', '', 'Furniture Land'),
(139, '2024-03-17', 1710640240, 65465, 20, 17, 'dhiraj22thakur@gmail.com', 'products/1696910153chair.jpg', 'Payment Pending', 'unpaid', 'Furniture Land');

-- --------------------------------------------------------

--
-- Table structure for table `productorder`
--

CREATE TABLE `productorder` (
  `id` int(11) NOT NULL,
  `productid` int(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `location` varchar(255) NOT NULL,
  `category` varchar(255) NOT NULL,
  `discount` int(255) NOT NULL,
  `price` int(255) NOT NULL,
  `description` text NOT NULL,
  `userid` int(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `phonenumber` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `buyerid` varchar(255) NOT NULL,
  `quantity` varchar(255) NOT NULL,
  `ddate` varchar(255) NOT NULL,
  `storename` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `productorder`
--

INSERT INTO `productorder` (`id`, `productid`, `name`, `location`, `category`, `discount`, `price`, `description`, `userid`, `username`, `address`, `phonenumber`, `status`, `buyerid`, `quantity`, `ddate`, `storename`) VALUES
(38, 22, 'table', 'products/1696833597chair.jpg', 'Chairs', 0, 0, '', 20, 'sumant', 'sanepa', '9814268787', 'delivered', '15', '1', '2023-10-09', 'Furniture Land'),
(39, 23, 'Couch', 'products/1696910153chair.jpg', 'Chairs', 65465, 654666, '', 20, 'dhiraj thakur', 'gwarko', '9800000000', 'delivered', '16', '1', '2024-02-13', 'Furniture Land'),
(40, 23, 'Couch', 'products/1696910153chair.jpg', 'Chairs', 65465, 654666, '', 20, 'dhiraj thakur', 'Lalitpur', '9800000000', 'delivered', '17', '1', '2024-02-25', 'Furniture Land'),
(41, 23, 'Couch', 'products/1696910153chair.jpg', 'Chairs', 65465, 654666, '', 20, 'dhiraj thakur', 'Lalitpur', '9800000000', 'delivered', '17', '1', '2024-02-25', 'Furniture Land'),
(42, 23, 'Couch', 'products/1696910153chair.jpg', 'Chairs', 65465, 654666, '', 20, 'dhiraj thakur', 'Lalitpur', '9800000000', 'delivered', '17', '1', '2024-03-17', 'Furniture Land'),
(43, 23, 'Couch', 'products/1696910153chair.jpg', 'Chairs', 65465, 654666, '', 20, 'dhiiraj_thakur', 'Lalitpur', '6564664684', 'delivered', '17', '1', '2024-03-17', 'Furniture Land'),
(44, 23, 'Couch', 'products/1696910153chair.jpg', 'Chairs', 65465, 654666, '', 20, 'dhiraj thakur', 'Lalitpur', '9800000000', 'delivered', '17', '1', '2024-03-17', 'Furniture Land'),
(45, 0, '', '', '', 0, 0, '', 0, '', '', '', '', '', '', '', ''),
(46, 0, '', '', '', 0, 0, '', 0, '', '', '', '', '', '', '', ''),
(47, 24, 'Garden Table', 'products/1710642928images.jpeg', 'Tables', 0, 100000, '', 20, 'dhiraj thakur', 'Lalitpur', '8289289528', '', '17', '1', '2024-03-17', 'Furniture Land'),
(48, 24, 'Garden Table', 'products/1710642928images.jpeg', 'Tables', 0, 100000, '', 20, 'dhiraj thakur', 'Lalitpur', '8289289528', '', '17', '1', '2024-03-17', 'Furniture Land'),
(49, 24, 'Garden Table', 'products/1710642928images.jpeg', 'Tables', 0, 100000, '', 20, 'dhiraj thakur', 'Lalitpur', '8418151651', '', '17', '1', '2024-03-20', 'Furniture Land');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `name` text NOT NULL,
  `location` varchar(255) NOT NULL,
  `category` varchar(255) NOT NULL,
  `discount` int(255) NOT NULL,
  `price` int(255) NOT NULL,
  `description` text NOT NULL,
  `userid` int(255) NOT NULL,
  `storename` text NOT NULL,
  `soldout` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `location`, `category`, `discount`, `price`, `description`, `userid`, `storename`, `soldout`) VALUES
(24, 'Garden Table', 'products/1710642928images.jpeg', 'Tables', 0, 100000, '', 20, 'Furniture Land', 1);

-- --------------------------------------------------------

--
-- Table structure for table `review_table`
--

CREATE TABLE `review_table` (
  `review_id` int(11) NOT NULL,
  `product_id` int(255) NOT NULL,
  `user_name` varchar(200) NOT NULL,
  `user_rating` int(1) NOT NULL,
  `user_review` text NOT NULL,
  `datetime` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `slider`
--

CREATE TABLE `slider` (
  `id` int(11) NOT NULL,
  `location` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `slider`
--

INSERT INTO `slider` (`id`, `location`) VALUES
(4, 'slider/forslider2.jpg'),
(5, 'slider/forslider3.jpg'),
(10, 'slider/one.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `superadminuser`
--

CREATE TABLE `superadminuser` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `superadminuser`
--

INSERT INTO `superadminuser` (`id`, `username`, `password`) VALUES
(1, 'superadmin', '5f4dcc3b5aa765d61d8327deb882cf99');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `first` varchar(255) NOT NULL,
  `last` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `phone` bigint(10) NOT NULL,
  `storename` varchar(255) NOT NULL,
  `verification_token` varchar(255) NOT NULL,
  `is_verified` int(10) NOT NULL DEFAULT 0,
  `code` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `buyer`
--
ALTER TABLE `buyer`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `checkout`
--
ALTER TABLE `checkout`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `productorder`
--
ALTER TABLE `productorder`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `review_table`
--
ALTER TABLE `review_table`
  ADD PRIMARY KEY (`review_id`);

--
-- Indexes for table `slider`
--
ALTER TABLE `slider`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `superadminuser`
--
ALTER TABLE `superadminuser`
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
-- AUTO_INCREMENT for table `buyer`
--
ALTER TABLE `buyer`
  MODIFY `id` int(45) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `checkout`
--
ALTER TABLE `checkout`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=140;

--
-- AUTO_INCREMENT for table `productorder`
--
ALTER TABLE `productorder`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `review_table`
--
ALTER TABLE `review_table`
  MODIFY `review_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `slider`
--
ALTER TABLE `slider`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `superadminuser`
--
ALTER TABLE `superadminuser`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
