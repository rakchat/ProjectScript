-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 21, 2021 at 05:09 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.2.31

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
(1, '60321c212cad8-1613896737.jpg'),
(2, '6032033a0c842-1613890362.jpg'),
(3, '6032035351b2a-1613890387.jpg'),
(4, '6032035a315d1-1613890394.jpg'),
(5, '60320ab062ae5-1613892272.jpg');

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
(1, 'Adidas', '60323016ec1e3-1613901846.jpg'),
(2, 'Converse', '6032302a57838-1613901866.jpg'),
(3, 'Nike', '60323049ab6a0-1613901897.jpg'),
(4, 'Vans', '6032304fec6cc-1613901903.jpg');

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
  `star` longtext COLLATE utf8_unicode_ci NOT NULL,
  `image1` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `image2` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `image3` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `image4` varchar(200) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `shoes`
--

INSERT INTO `shoes` (`shoes_id`, `brand_id`, `model`, `color`, `size`, `amount`, `price`, `star`, `image1`, `image2`, `image3`, `image4`) VALUES
(1, 1, 'A1', 'black', '42', 3, '2500', 'Adidas color: black, Model: A1', '603230fde8ee1-1613902077.png', '603230fde8eff-1613902077.png', '603230fde8f02-1613902077.png', '603230fde8f04-1613902077.png'),
(2, 1, 'A2', 'black', '40', 8, '2700', 'Adidas color: black, Model: A1', '6032314c5589f-1613902156.png', '6032314c558a9-1613902156.png', '6032314c558ac-1613902156.png', '6032314c558ae-1613902156.png'),
(3, 1, 'A3', 'black', '45', 4, '3100', 'Adidas color: black, Model: A1', '603231ba199d4-1613902266.png', '603231ba199df-1613902266.png', '603231ba199e2-1613902266.png', '603231ba199e4-1613902266.png'),
(4, 2, 'C1', 'yellow', '41', 3, '2600', 'Converse color: yellow, model: C1', '60323229e74ae-1613902377.png', '60323229e74b8-1613902377.png', '60323229e74bb-1613902377.png', '60323229e74bd-1613902377.png'),
(5, 3, 'N1', 'balck', '45', 2, '3800', 'Nike color: black, model: N1', '60323292a6e52-1613902482.png', '60323292a6e5b-1613902482.png', '60323292a6e6d-1613902482.png', '60323292a6e6f-1613902482.png'),
(6, 4, 'V1', 'white', '39', 6, '3000', 'Vans color: white, model: V1', '603232e30624b-1613902563.png', '603232e306253-1613902563.png', '603232e306256-1613902563.png', '603232e306258-1613902563.png');

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
(1, 'Suntorn', 'Rakchat', 'admin@gmail.com', '0cc175b9c0f1b6a831c399e269772661', '60327a13c848f-1613920787.jpg', '0908185641', 'Maibok Naja', 'admin'),
(2, 'Panadda', 'Bedgratok', 'manager@gmail.com', '0cc175b9c0f1b6a831c399e269772661', '603272f3efd81-1613918963.jpg', '0908565656', '59/8 Bangkok', 'manager'),
(3, 'oneuser', 'test', 'user@gmail.com', '0cc175b9c0f1b6a831c399e269772661', '603284bd69b23-1613923517.jpg', '0859595959', '42/8999', 'user'),
(4, 'Staffone', 'test', 'staff@gmail.com', '0cc175b9c0f1b6a831c399e269772661', '603285001c640-1613923584.jpg', '0585885485', '51511/88', 'staff');

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
  MODIFY `brand_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `orders_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `shoes`
--
ALTER TABLE `shoes`
  MODIFY `shoes_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `shopping_cart`
--
ALTER TABLE `shopping_cart`
  MODIFY `cart_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

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
