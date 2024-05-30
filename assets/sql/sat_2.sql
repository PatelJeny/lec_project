-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 30, 2024 at 03:05 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sat_2`
--

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `id` int(11) NOT NULL,
  `name` varchar(32) DEFAULT NULL,
  `email` varchar(20) DEFAULT NULL,
  `password` varchar(16) DEFAULT NULL,
  `is_admin` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`id`, `name`, `email`, `password`, `is_admin`) VALUES
(1, 'jeny', 'jeny@gmail.com', '1234', 0),
(2, 'utsavi', 'utsavi@gmail.com', '4567', 0),
(3, 'dhruvi', 'dhruvi@gmail.com', '8888', 0),
(4, 'krisha', 'krisha@gmail.com', '2222', 0),
(5, 'pal', 'pal@gmail.com', '6666', 0),
(6, 'manisha', 'manisha@gmail.com', '7777', 0),
(7, 'admin', 'admin@gmail.com', '1234', 1),
(8, 'vraj', 'vraj@gmail.com', '5252', 0);

-- --------------------------------------------------------

--
-- Table structure for table `movie`
--

CREATE TABLE `movie` (
  `id` int(11) NOT NULL,
  `name` varchar(30) NOT NULL,
  `description` varchar(30) NOT NULL,
  `image` varchar(30) NOT NULL,
  `release_date` date NOT NULL,
  `is_deleted` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `pro_name` varchar(30) NOT NULL,
  `pro_price` varchar(30) NOT NULL,
  `pro_category` varchar(30) NOT NULL,
  `pro_image` varchar(50) NOT NULL,
  `pro_description` varchar(256) NOT NULL,
  `is_deleted` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `pro_name`, `pro_price`, `pro_category`, `pro_image`, `pro_description`, `is_deleted`) VALUES
(1, 'Men', 'RS.700', ' tshirt', '7.png', 'A lipstick with hundreds of hues. The iconic product that made M·A·C famous.', 0),
(2, 'Men', 'RS.2000', ' tshirt', '5.png', '', 1),
(3, 'Cosmetic', 'RS.500', 'kajal', '3.png', '', 0),
(4, 'Ladies wears', 'RS.4500', 'jeans', '4.png', '', 0),
(5, 'Cosmetic', 'RS.800', 'liner', '5.png', '', 0),
(6, 'Electronics', 'RS.40000', 'Mobile', '6.png', '', 0),
(7, 'Men', 'RS.800', ' jeans', '7.png', '', 1);

-- --------------------------------------------------------

--
-- Table structure for table `review`
--

CREATE TABLE `review` (
  `id` int(11) NOT NULL,
  `product_id` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `rating` int(11) DEFAULT NULL,
  `comment` varchar(56) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `review`
--

INSERT INTO `review` (`id`, `product_id`, `user_id`, `rating`, `comment`) VALUES
(1, 2, 1, 1, 'its good'),
(2, 6, 1, 1, 'its good'),
(3, 4, 2, 1, 'average'),
(4, 5, 2, 1, 'very nice'),
(5, 1, 8, 1, 'good'),
(6, 2, 2, 1, 'nice'),
(7, 1, 1, 3, ' good'),
(8, 3, 1, 1, 'good');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `review`
--
ALTER TABLE `review`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `review`
--
ALTER TABLE `review`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
