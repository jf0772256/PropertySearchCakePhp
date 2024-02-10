-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: database:3306
-- Generation Time: Feb 09, 2024 at 08:06 PM
-- Server version: 10.6.16-MariaDB-1:10.6.16+maria~ubu2004
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `property_searches`
--

-- --------------------------------------------------------

-- --------------------------------------------------------

--
-- Table structure for table `properties`
--

CREATE TABLE `properties` (
  `id` int(11) NOT NULL,
  `name` varchar(150) NOT NULL COMMENT 'heading for property',
  `description` text NOT NULL COMMENT 'description for property',
  `street_address` varchar(50) NOT NULL COMMENT 'Street address for property',
  `city` varchar(50) NOT NULL COMMENT 'city name for property',
  `state` varchar(2) NOT NULL COMMENT 'the state the property resides',
  `postal_code` varchar(7) NOT NULL COMMENT 'property postal code',
  `price` decimal(15,2) NOT NULL,
  `baths` int(11) NOT NULL,
  `beds` int(11) NOT NULL,
  `sqft` int(11) NOT NULL,
  `acres` decimal(10,2) NOT NULL,
  `active` tinyint(1) NOT NULL DEFAULT 1,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `properties`
--

INSERT INTO `properties` (`id`, `name`, `description`, `street_address`, `city`, `state`, `postal_code`, `price`, `baths`, `beds`, `sqft`, `acres`, `active`, `created`, `modified`) VALUES
(1, 'Jesse\'s House', '3 bed 2 bath ranch in development', '3201 West Bergman Street', 'Springfield', 'MO', '65803', 180000.00, 2, 3, 1377, 0.15, 1, '2024-02-09 13:32:35', '2024-02-09 13:41:39'),
(2, 'Example Property', 'This is on of my example properties', '1234 Main Ave', 'Springfield', 'MO', '65807', 250000.00, 1, 3, 1500, 1.25, 1, '2024-02-09 13:44:11', '2024-02-09 13:44:11'),
(3, 'Example Property 2', 'This is another example of a property', '4567 W 2nd street', 'Louisville ', 'KY', '40018', 1115000.00, 5, 9, 15220, 30.00, 1, '2024-02-09 13:47:24', '2024-02-09 13:47:24');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `properties`
--
ALTER TABLE `properties`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idx_address` (`street_address`),
  ADD KEY `idx_city_state` (`city`,`state`),
  ADD KEY `idx_postal` (`postal_code`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `properties`
--
ALTER TABLE `properties`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
