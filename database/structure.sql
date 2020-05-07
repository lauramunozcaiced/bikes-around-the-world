-- phpMyAdmin SQL Dump
-- version 4.9.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: May 07, 2020 at 06:31 AM
-- Server version: 10.3.16-MariaDB
-- PHP Version: 7.3.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `id13595432_bikesaroundtheworld`
--

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `customer_email` varchar(120) NOT NULL,
  `customer_mobile` varchar(40) NOT NULL,
  `status` varchar(20) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `update_at` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `ship` varchar(900) NOT NULL,
  `id` int(11) NOT NULL,
  `customer_name` varchar(80) NOT NULL,
  `price` varchar(200) NOT NULL,
  `email_paypal` varchar(120) NOT NULL,
  `data_paypal` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL,
  `code_order` varchar(120) NOT NULL,
  `currency` varchar(5) NOT NULL,
  `send` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `name` varchar(80) NOT NULL,
  `description` varchar(200) NOT NULL,
  `price` varchar(20) NOT NULL,
  `img` varchar(200) NOT NULL,
  `available` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `description`, `price`, `img`, `available`) VALUES
(1, 'AroundtheBlock 500W', 'Electric Cruiser Bike with 500 Watt Rear Hub Drive Motor with a classically styled beach cruiser frame that provides maximum comfort and riding ease.  An uncomplicated E-Bike, designed with simplicity', '700', 'https://www.stickpng.com/assets/images/5aed97e0208cc94b7bff8de3.png', 'avalaible'),
(2, 'Evryjourney 250W', 'Electric Touring Cruiser Bike with 250 Watt Rear Hub Drive Motor with an ergonomically designed frame for maximum comfort and riding ease.  A beautifully styled electric bike perfect for the rider tha', '900', 'https://cdn.shopify.com/s/files/1/0301/5793/products/evry_png_2_1024x1024.png?v=1552024914', 'not_avalaible'),
(3, 'Evry journey 500W 7 Speed Electric Hybrid Bicycle', 'Electric Touring Cruiser Bike with 500 Watt Rear Hub Drive Motor with an ergonomically designed frame for maximum comfort and riding ease.  A beautifully styled electric bike perfect for the rider tha', '750', 'https://cdn.shopery.com/bicicletos/images/236/bicicleta123.png:_square:l', 'avalaible');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
