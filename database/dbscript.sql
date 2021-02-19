-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 19, 2021 at 09:48 AM
-- Server version: 10.4.13-MariaDB
-- PHP Version: 7.4.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dbscript`
--

-- --------------------------------------------------------

--
-- Table structure for table `banner`
--

CREATE TABLE `banner` (
  `banner_id` int(11) NOT NULL,
  `image` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `banner`
--

INSERT INTO `banner` (`banner_id`, `image`) VALUES
(1, '602f67c27fc6a-1613719490.jpg'),
(2, '602f68af94bf6-1613719727.jpg'),
(3, '602f67d650cbe-1613719510.jpg'),
(4, '602f63e6c0d46-1613718502.png'),
(5, '602f684c256ac-1613719628.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `brand_shoes`
--

CREATE TABLE `brand_shoes` (
  `brand_id` int(11) NOT NULL,
  `brand_name` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `logo` varchar(200) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `brand_shoes`
--

INSERT INTO `brand_shoes` (`brand_id`, `brand_name`, `logo`) VALUES
(59, 'Nike', '602f297681e0c-1613703542.jpg'),
(60, 'Adidas', '602e1db6e8845-1613634998.jpg'),
(61, 'NewBalance', '602e1dc4d0fe9-1613635012.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `orders_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `date` date NOT NULL,
  `order_total_price` decimal(10,0) NOT NULL,
  `order_status` varchar(250) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`orders_id`, `user_id`, `date`, `order_total_price`, `order_status`) VALUES
(1, 1, '2021-02-01', '3500', 'ได้รับสินค้าเรียบร้อย');

-- --------------------------------------------------------

--
-- Table structure for table `shoes`
--

CREATE TABLE `shoes` (
  `shoes_id` int(11) NOT NULL,
  `brand_id` int(11) NOT NULL,
  `model` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `color` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `size` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `amount` int(11) NOT NULL,
  `price` decimal(10,0) NOT NULL,
  `star` int(11) NOT NULL,
  `image1` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `image2` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `image3` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `image4` varchar(200) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `shoes`
--

INSERT INTO `shoes` (`shoes_id`, `brand_id`, `model`, `color`, `size`, `amount`, `price`, `star`, `image1`, `image2`, `image3`, `image4`) VALUES
(81, 59, 'A4', 'white', '40', 3, '250', 0, '602d2e428fd04-1613573698.jpg', '602d2e428fd0f-1613573698.jpg', '602d2e428fd11-1613573698.jpg', '602d2e428fd13-1613573698.jpg'),
(82, 60, 'Mp-35', 'black', '40', 50, '4000', 0, '602e1df77859e-1613635063.jpg', '602e1df7785a8-1613635063.jpg', '602e1df7785aa-1613635063.jpg', '602e1df7785ac-1613635063.jpg'),
(83, 61, 'N23', 'red', '35', 4, '1200', 0, '602e1e2b4d95f-1613635115.jpg', '602e1e2b4d998-1613635115.jpg', '602e1e2b4d99f-1613635115.png', '602e1e2b4d9a3-1613635115.jpg'),
(84, 59, 'K2', 'white', '34', 4, '159', 0, '602f2da426598-1613704612.jpg', '602f2da4265a5-1613704612.jpg', '602f2da4265a8-1613704612.jpg', '602f2da4265ab-1613704612.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `shopping_cart`
--

CREATE TABLE `shopping_cart` (
  `cart_id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `shoes_id` int(11) NOT NULL,
  `amount` int(11) NOT NULL,
  `total_price` decimal(10,0) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `shopping_cart`
--

INSERT INTO `shopping_cart` (`cart_id`, `order_id`, `shoes_id`, `amount`, `total_price`) VALUES
(1, 1, 81, 2, '3000'),
(2, 1, 83, 1, '500');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `fname` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `lname` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `image` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `phone` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `address` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `status` varchar(200) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `fname`, `lname`, `email`, `password`, `image`, `phone`, `address`, `status`) VALUES
(1, 'Suntorn', 'Rakchat', 'gun@gmail.com', '0cc175b9c0f1b6a831c399e269772661', '001.jpg', '0908185641', '41/5 Nakhon Ratchasima', 'admin'),
(2, 'Panadda', 'Bedgratok', 'pang@p.com', '0cc175b9c0f1b6a831c399e269772661', '001.jpg', '0923180410', 'Yara', 'manager');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `banner`
--
ALTER TABLE `banner`
  ADD PRIMARY KEY (`banner_id`);

--
-- Indexes for table `brand_shoes`
--
ALTER TABLE `brand_shoes`
  ADD PRIMARY KEY (`brand_id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`orders_id`),
  ADD KEY `orderTousers` (`user_id`);

--
-- Indexes for table `shoes`
--
ALTER TABLE `shoes`
  ADD PRIMARY KEY (`shoes_id`),
  ADD KEY `shoes_to_brand_sheos` (`brand_id`);

--
-- Indexes for table `shopping_cart`
--
ALTER TABLE `shopping_cart`
  ADD PRIMARY KEY (`cart_id`),
  ADD KEY `cart_to_shoes` (`shoes_id`),
  ADD KEY `cart_to_order` (`order_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `banner`
--
ALTER TABLE `banner`
  MODIFY `banner_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `brand_shoes`
--
ALTER TABLE `brand_shoes`
  MODIFY `brand_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=62;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `orders_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `shoes`
--
ALTER TABLE `shoes`
  MODIFY `shoes_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=85;

--
-- AUTO_INCREMENT for table `shopping_cart`
--
ALTER TABLE `shopping_cart`
  MODIFY `cart_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orderTousers` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`);

--
-- Constraints for table `shoes`
--
ALTER TABLE `shoes`
  ADD CONSTRAINT `shoes_to_brand_sheos` FOREIGN KEY (`brand_id`) REFERENCES `brand_shoes` (`brand_id`);

--
-- Constraints for table `shopping_cart`
--
ALTER TABLE `shopping_cart`
  ADD CONSTRAINT `cart_to_order` FOREIGN KEY (`order_id`) REFERENCES `orders` (`orders_id`),
  ADD CONSTRAINT `cart_to_shoes` FOREIGN KEY (`shoes_id`) REFERENCES `shoes` (`shoes_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
