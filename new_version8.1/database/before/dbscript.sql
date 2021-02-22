-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 22, 2021 at 01:50 PM
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
(1, 'ADIDAS', '60336e11d9790-1613983249.svg'),
(2, 'CONVERSE', '60336f439def1-1613983555.png'),
(3, 'NIKE', '603373b7e311b-1613984695.jpg'),
(4, 'VANS', '6033730d54bc8-1613984525.png');

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
(1, 1, 'SUPERSTAR', 'Core Black', '38', 11, '3200', 'SUPERSTAR SHOES\r\nTHE AUTHENTIC LOW TOP WITH THE SHELL TOE.', '6033748d8d26e-1613984909.png', '6033748d8d284-1613984909.png', '6033748d8d288-1613984909.png', '6033748d8d28a-1613984909.png'),
(2, 1, 'SUPERSTAR', 'Cloud White', '40', 6, '3200', 'SUPERSTAR SHOES\r\nTHE AUTHENTIC LOW TOP WITH THE SHELL TOE.', '603376914316c-1613985425.png', '603376914317b-1613985425.png', '603376914317e-1613985425.png', '6033769143181-1613985425.png'),
(3, 1, 'NMD_R1', 'Dash Grey', '43', 5, '4600', 'NMD_R1 SHOES SHOES WITH RUNNING STYLE REIMAGINED FOR TODAY STREETS.', '603376f6cb8ad-1613985526.png', '603376f6cb8b9-1613985526.png', '603376f6cb8bc-1613985526.png', '603376f6cb8bf-1613985526.png'),
(4, 1, 'NMD_R1', 'Core Black', '41', 9, '4600', 'NMD_R1 SHOES A MODERN NMD TRAINER WITH A SNUG KNIT UPPER.', '6033774614e98-1613985606.png', '6033774614ea7-1613985606.png', '6033774614eaa-1613985606.png', '6033774614ead-1613985606.png'),
(5, 1, 'FLUIDSTREET', 'Super Pop', '38', 11, '2300', 'FLUIDSTREET SHOES AIRY LIGHTWEIGHT RUNNING SHOES WITH ENHANCED CUSHIONING.', '6033777f87a04-1613985663.png', '6033777f87a1a-1613985663.png', '6033777f87a24-1613985663.png', '6033777f87a2c-1613985663.png'),
(6, 1, 'FLUIDSTREET', 'Core Black', '42', 12, '2300', 'FLUIDSTREET SHOES AIRY LIGHTWEIGHT RUNNING SHOES WITH ENHANCED CUSHIONING.', '603377c87d225-1613985736.png', '603377c87d232-1613985736.png', '603377c87d235-1613985736.png', '603377c87d238-1613985736.png'),
(7, 1, 'X9000L4', 'Pink Tint', '37', 13, '4800', 'X9000L4 SHOES RESPONSIVE RUNNING SHOES INSPIRED BY DIGITAL CULTURE.', '6033781a96356-1613985818.png', '6033781a96368-1613985818.png', '6033781a9636d-1613985818.png', '6033781a96373-1613985818.png'),
(8, 1, 'X9000L4', 'Crystal White', '40', 4, '4800', 'X9000L4 SHOES RESPONSIVE RUNNING SHOES INSPIRED BY DIGITAL CULTURE.', '60337851b698f-1613985873.png', '60337851b69a4-1613985873.png', '60337851b69c1-1613985873.png', '60337851b69cc-1613985873.png'),
(9, 1, 'ADIZERO PRO', 'Core Black', '45', 15, '6500', 'ADIZERO PRO SHOES LIGHTWEIGHT SHOES BUILT FOR SPEED.', '603378afc5c3c-1613985967.png', '603378afc5c50-1613985967.png', '603378afc5c56-1613985967.png', '603378afc5c5f-1613985967.png'),
(10, 1, 'ADIZERO PRO', 'Solar Yellow', '45', 7, '6500', 'ADIZERO PRO SHOES LIGHTWEIGHT SHOES BUILT FOR SPEED.', '603378df2cc04-1613986015.png', '603378df2cc10-1613986015.png', '603378df2cc13-1613986015.png', '603378df2cc15-1613986015.png'),
(11, 1, 'ULTRABOOST 20', 'Collegiate Purple', '37', 9, '6500', 'ULTRABOOST 20 SHOES ULTRABOOST SHOES THAT ARE PART OF OUR CHINESE NEW YEAR COLLECTION.', '6033793361cb8-1613986099.png', '6033793361cc7-1613986099.png', '6033793361ccd-1613986099.png', '6033793361cd2-1613986099.png'),
(12, 1, 'ULTRABOOST 20', 'Core Black', '42', 8, '6500', 'ULTRABOOST 20 SHOES ULTRABOOST SHOES THAT ARE PART OF OUR CHINESE NEW YEAR COLLECTION.', '60337967d6582-1613986151.png', '60337967d659d-1613986151.png', '60337967d65a0-1613986151.png', '60337967d65a3-1613986151.png'),
(13, 1, 'PUREMOTION', 'Cloud White', '38', 6, '2200', 'PUREMOTION SHOES EVERYDAY SNEAKERS THAT ARE SUPER COMFORTABLE.', '603379ae9afac-1613986222.png', '603379ae9afbd-1613986222.png', '603379ae9afc3-1613986222.png', '603379ae9afc8-1613986222.png'),
(14, 1, 'PUREMOTION', 'Halo Blue', '40', 10, '2200', 'PUREMOTION SHOES EVERYDAY SNEAKERS THAT ARE SUPER COMFORTABLE.', '60337a06f2b2d-1613986310.png', '60337a06f2b3d-1613986310.png', '60337a06f2b42-1613986310.png', '60337a06f2b47-1613986310.png'),
(15, 2, 'ALL STAR LOGO GRAPHIC ', 'Red Black', '39', 5, '2090', 'ALL STAR LOGO GRAPHIC OX RED BLACK', '60337ac1aaa47-1613986497.png', '60337ac1aaa5a-1613986497.png', '60337ac1aaa5f-1613986497.png', '60337ac1aaa64-1613986497.png'),
(16, 2, 'ALL STAR LOGO GRAPHIC', 'Black/Multi/White', '45', 1, '2290', 'ALL STAR LOGO GRAPHIC HI BLACK/WHITE', '60337e6ef1d22-1613987438.png', '60337e6ef274a-1613987438.png', '60337e6ef2754-1613987438.png', '60337e6ef2759-1613987438.png'),
(17, 2, 'CHUCK 70', 'Sunflower/Black/Egret', '36', 7, '2700', 'CHUCK 70 OX SUNFLOWER/BLACK/EGRET', '60337f19991d2-1613987609.png', '60337f19994fa-1613987609.png', '60337f19994fd-1613987609.png', '60337f1999500-1613987609.png'),
(18, 2, 'CHUCK 70', 'Sunflower/Black/Egret', '40', 8, '2900', 'CHUCK 70 HI SUNFLOWER/BLACK/EGRET', '60337f5fb4be8-1613987679.png', '60337f5fb4c00-1613987679.png', '60337f5fb4c06-1613987679.png', '60337f5fb4c0e-1613987679.png'),
(19, 2, 'ALL STAR LICENSE PLATE', 'White/Pink', '37', 10, '2090', 'ALL STAR LICENSE PLATE OX WHITE/PINK', '60337fc4f0a9c-1613987780.png', '60337fc4f0ab0-1613987780.png', '60337fc4f0ab3-1613987780.png', '60337fc4f0ab6-1613987780.png'),
(20, 2, 'ALL STAR LICENSE PLATE', 'White/Pink', '39', 4, '2190', 'ALL STAR LICENSE PLATE HI WHITE/PINK', '6033802ad7fd3-1613987882.png', '6033802ad7fe4-1613987882.png', '6033802ad7fe8-1613987882.png', '6033802ad7fea-1613987882.png'),
(21, 2, 'ALL STAR SPLIT COLOR', 'White', '36', 3, '1890', 'ALL STAR SPLIT COLOR OX WHITE', '60338069abfc5-1613987945.png', '60338069abfdc-1613987945.png', '60338069abfe2-1613987945.png', '60338069abfe7-1613987945.png'),
(22, 2, 'ALL STAR SPLIT COLOR', 'White', '40', 8, '1990', 'ALL STAR SPLIT COLOR HI WHITE', '603380a64ed0b-1613988006.png', '603380a64ed1a-1613988006.png', '603380a64ed1d-1613988006.png', '603380a64ed1f-1613988006.png'),
(23, 2, 'CHUCK 70 SPLIT COLOR', 'Egret', '38', 6, '2590', 'CHUCK 70 SPLIT COLOR OX EGRET', '6033810595a34-1613988101.png', '6033810595a44-1613988101.png', '6033810595a48-1613988101.png', '6033810595a4b-1613988101.png'),
(24, 2, 'CHUCK 70 SPLIT COLOR', 'Egret', '37', 7, '2790', 'CHUCK 70 SPLIT COLOR HI EGRET', '60338152d6fe7-1613988178.png', '60338152d6ff6-1613988178.png', '60338152d6ffc-1613988178.png', '60338152d700e-1613988178.png'),
(25, 2, 'ALL STAR', 'Optical White', '40', 4, '1850', 'ALL STAR OX OPTICAL WHITE', '603381d7947dd-1613988311.png', '603381d794803-1613988311.png', '603381d79480b-1613988311.png', '603381d794810-1613988311.png'),
(26, 2, 'ALL STAR', 'Optical White', '38', 4, '1950', 'ALL STAR HI OPTICAL WHITE', '6033894733a96-1613990215.png', '6033894734ae2-1613990215.png', '6033894734aeb-1613990215.png', '6033894734af1-1613990215.png'),
(27, 2, 'CHUCK 70 ARCHIVE', 'Black/Orange', '41', 7, '2700', 'CHUCK 70 ARCHIVE OX BLACK ORANGE', '60338990df817-1613990288.png', '60338990df82d-1613990288.png', '60338990df831-1613990288.png', '60338990df834-1613990288.png'),
(28, 2, 'CHUCK 70 ARCHIVE', 'Black/Beige', '39', 20, '2700', 'CHUCK 70 ARCHIVE OX BLACK/BEIGE', '603389e25263b-1613990370.png', '603389e25264a-1613990370.png', '603389e25264e-1613990370.png', '603389e252650-1613990370.png'),
(29, 3, 'BLAZER MID‘77 ', 'Leopard', '35', 1, '4200', 'NIKE FIRST PERFORMANCE BASKETBALL SNEAKER.', '60338b37ea6c7-1613990711.png', '60338b37eb0d3-1613990711.png', '60338b37eb0de-1613990711.png', '60338b37eb0e2-1613990711.png'),
(30, 3, 'BLAZER MID‘77', 'Snakeskin', '44', 1, '4200', 'NIKE FIRST PERFORMANCE BASKETBALL SNEAKER.', '60338baf18fd5-1613990831.png', '60338baf19fcc-1613990831.png', '60338baf19fd3-1613990831.png', '60338baf19fd5-1613990831.png'),
(31, 3, 'ACG MOUNTAIN FIL LOW', 'Anthracite', '38', 12, '6400', 'A DESIGN WITH A LIGHTWEIGHT UPPER WITH AN EASY-TO-USE SHIN WRAP FOR PERSONALIZATION ANYWHERE.', '60338c7024a0e-1613991024.png', '60338c702567a-1613991024.png', '60338c7025680-1613991024.png', '60338c7025682-1613991024.png'),
(32, 3, 'ACG MOUNTAIN FIL LOW', 'Fossil Stone', '37', 19, '6400', 'A DESIGN WITH A LIGHTWEIGHT UPPER WITH AN EASY-TO-USE SHIN WRAP FOR PERSONALIZATION ANYWHERE.', '60338cca84fc7-1613991114.png', '60338cca85fae-1613991114.png', '60338cca85fb5-1613991114.png', '60338cca85fb8-1613991114.png'),
(33, 3, 'LAHAR LOW', 'Black', '44', 6, '5000', 'THE DESIGN USES HEAVY-DUTY LEATHER AND DETAILS INSPIRED BY THE SHOE LEGEND.', '60338de300665-1613991395.png', '60338de300996-1613991395.png', '60338de30099b-1613991395.png', '60338de3009a0-1613991395.png'),
(34, 3, 'LAHAR LOW', 'Wheat', '37', 15, '5000', 'THE DESIGN USES HEAVY-DUTY LEATHER AND DETAILS INSPIRED BY THE SHOE LEGEND.', '60338e2a24ad8-1613991466.png', '60338e2a251ff-1613991466.png', '60338e2a2520a-1613991466.png', '60338e2a25212-1613991466.png'),
(35, 3, 'AIR MAX TAILWIND 5', 'Iron Grey', '40', 8, '6100', 'DUAL AIRBAGS AT THE HEEL AND FOREFOOT WILL HELP YOU WADE OUT IN COMFORT. WITH REFLECTIVE ELEMENTS.', '60338ea4c30b6-1613991588.png', '60338ea4c3b59-1613991588.png', '60338ea4c3b63-1613991588.png', '60338ea4c3b68-1613991588.png'),
(36, 3, 'AIR MAX TAILWIND 5', 'Sequoia', '39', 15, '6100', 'DUAL AIRBAGS AT THE HEEL AND FOREFOOT WILL HELP YOU WADE OUT IN COMFORT. WITH REFLECTIVE ELEMENTS.', '60338ee4c1f18-1613991652.png', '60338ee4c2f96-1613991652.png', '60338ee4c2fa2-1613991652.png', '60338ee4c2fa6-1613991652.png'),
(37, 3, 'DRIFTER GATOR ISPA', 'Coastal Blue/Volt', '41', 14, '7500', 'LIGHTWEIGHT, RESPONSIVE.', '60338f69b07c0-1613991785.png', '60338f69b13d1-1613991785.png', '60338f69b13d6-1613991785.png', '60338f69b13d9-1613991785.png'),
(38, 3, 'DRIFTER GATOR ISPA', 'Summit White/Hyper Crimson', '39', 14, '7500', 'LIGHTWEIGHT, RESPONSIVE.', '60338fb2184d1-1613991858.png', '60338fb218de9-1613991858.png', '60338fb218df0-1613991858.png', '60338fb218df2-1613991858.png'),
(39, 3, 'SPACE HIPPIE 04 - MYSTIC NAVY', 'This is Trash', '43', 11, '5000', 'GARBAGE TRANSFORMATION FROM THE UPPER TO THE FLOOR SHOES.', '603390282badd-1613991976.png', '603390282c210-1613991976.png', '603390282c218-1613991976.png', '603390282c21d-1613991976.png'),
(40, 3, 'SPACE HIPPIE 04 - MYSTIC NAVY', 'This is Trash', '35', 13, '5000', 'GARBAGE TRANSFORMATION FROM THE UPPER TO THE FLOOR SHOES.', '6033907b5be70-1613992059.png', '6033907b5c27d-1613992059.png', '6033907b5c291-1613992059.png', '6033907b5c293-1613992059.png'),
(41, 3, 'ZOOM DOUBLE STACKED', 'Volt Black', '37', 13, '7900', 'STYLE THAT EXPRESSES COMFORT WITH THE BARE LAYER OF THE CUSHIONING SYSTEM.', '603390ff50468-1613992191.png', '603390ff51424-1613992191.png', '603390ff51434-1613992191.png', '603390ff5143e-1613992191.png'),
(42, 3, 'ZOOM DOUBLE STACKED', 'Pink Blast', '40', 1, '7900', 'STYLE THAT EXPRESSES COMFORT WITH THE BARE LAYER OF THE CUSHIONING SYSTEM.', '603391630c69e-1613992291.png', '603391630df45-1613992291.png', '603391630df4c-1613992291.png', '603391630df4f-1613992291.png'),
(43, 4, 'UA COMFYCUSH', 'Red/Checkerboard', '46', 17, '3400', 'COMFYCUSH SLIP-SKOOL VANS BLOCK.', '60339227d5ed6-1613992487.png', '60339227d9548-1613992487.png', '60339227da229-1613992487.png', '603392b2d663d-1613992626.png'),
(44, 4, 'UA COMFYCUSH', 'Multi/Checkerboard', '40', 10, '3400', 'COMFYCUSH SLIP-SKOOL VANS BLOCK', '6033949b29fe9-1613993115.png', '6033949b2db95-1613993115.png', '6033949b2e766-1613993115.png', '6033949b2f265-1613993115.png'),
(45, 4, 'UA SK8-MID', 'Cherries Black', '37', 11, '3200', 'IT A MID-LENGTH LACE-UP SHOE WITH A PADDED COLLAR FOR EXTRA COMFORT.', '6033941e49506-1613992990.png', '6033941e4b1a9-1613992990.png', '6033941e4b922-1613992990.png', '6033941e64cd5-1613992990.jpg');

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
(3, 'Ibrohem', 'Bula', 'user@gmail.com', '0cc175b9c0f1b6a831c399e269772661', '6032901234a92-1613926418.jpg', '0859586529', 'Narathivat', 'user'),
(4, 'Thitipan', 'Porkuan', 'staff@gmail.com', '0cc175b9c0f1b6a831c399e269772661', '603285001c640-1613923584.jpg', '0585885485', 'Nakhon Rauchasima', 'staff');

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
  MODIFY `orders_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `shoes`
--
ALTER TABLE `shoes`
  MODIFY `shoes_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT for table `shopping_cart`
--
ALTER TABLE `shopping_cart`
  MODIFY `cart_id` int(11) NOT NULL AUTO_INCREMENT;

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
