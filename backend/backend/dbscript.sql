-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 24, 2021 at 09:06 PM
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
(43, 'Adidas', '600c32198b37e-1611411993.png'),
(48, 'ibrohem', '600c45daa1d42-1611417050.png');

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
(64, 43, 'sa', 'as', 'sa', 1, '250', 0, '../resource/uploads/600c669a42f13-1611425434.', '../resource/uploads/600c669a42f20-1611425434.', '../resource/uploads/600c669a42f23-1611425434.', '../resource/uploads/600c669a42f24-1611425434.');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `brand_shoes`
--
ALTER TABLE `brand_shoes`
  ADD PRIMARY KEY (`brand_id`);

--
-- Indexes for table `shoes`
--
ALTER TABLE `shoes`
  ADD PRIMARY KEY (`shoes_id`),
  ADD KEY `shoes_to_brand_sheos` (`brand_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `brand_shoes`
--
ALTER TABLE `brand_shoes`
  MODIFY `brand_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT for table `shoes`
--
ALTER TABLE `shoes`
  MODIFY `shoes_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=65;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `shoes`
--
ALTER TABLE `shoes`
  ADD CONSTRAINT `shoes_to_brand_sheos` FOREIGN KEY (`brand_id`) REFERENCES `brand_shoes` (`brand_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
