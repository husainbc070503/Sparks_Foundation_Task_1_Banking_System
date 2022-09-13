-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3307
-- Generation Time: Sep 13, 2022 at 01:15 PM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 7.3.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sparks foundation bank`
--

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE `contact` (
  `id` int(15) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(10) NOT NULL,
  `query` text NOT NULL,
  `date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `contact`
--

INSERT INTO `contact` (`id`, `name`, `email`, `phone`, `query`, `date`) VALUES
(1, 'Husain Champawala', 'husainchampawala@gmail.com', '8879525311', 'hii', '2022-09-09 21:01:48'),
(2, 'Husain Champawala', 'husainchampawala@ternaengg.ac.in', '8879525311', 'hii', '2022-09-09 21:03:00'),
(3, 'Aniket Dhatrak', 'aniket@gmail.com', '1234567890', 'hii husain ', '2022-09-11 18:11:38');

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `acc_balance` bigint(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`id`, `name`, `email`, `acc_balance`) VALUES
(1, 'Omkar', 'omkar@hotmail.com', 48900),
(2, 'Ranvir', 'ravir25@gmail.com', 53210),
(3, 'Viraj', 'viraj@gmail.com', 48200),
(4, 'Sharvari', 'sharvari@yahoo.com', 81000),
(5, 'Aniket', 'aniket10@gmail.com', 62800),
(6, 'Kriti', 'krtit@gmail.com', 55000),
(7, 'Raunak', 'raunakc@gmail.com', 61000),
(8, 'Chetan', 'chetan@gmail.com', 69000),
(9, 'Nayodeep', 'nayodeep@rediffmail.com', 48000),
(10, 'Rohit', 'rohit@yahoo.com', 62500);

-- --------------------------------------------------------

--
-- Table structure for table `transaction`
--

CREATE TABLE `transaction` (
  `id` int(11) NOT NULL,
  `sender` varchar(255) NOT NULL,
  `receiver` varchar(255) NOT NULL,
  `amt_trf` bigint(200) NOT NULL,
  `sender_bal` bigint(200) NOT NULL,
  `receiver_bal` bigint(200) NOT NULL,
  `date_time` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `transaction`
--

INSERT INTO `transaction` (`id`, `sender`, `receiver`, `amt_trf`, `sender_bal`, `receiver_bal`, `date_time`) VALUES
(1, 'Omkar', 'Sharvari', 1000, 49000, 81000, '2022-09-11 16:17:03'),
(2, 'Omkar', 'Ranvir', 100, 48900, 532100, '2022-09-11 16:23:58'),
(4, 'Chetan', 'Raunak', 1000, 69000, 61000, '2022-09-11 16:45:51'),
(5, 'Aniket', 'Viraj', 200, 64800, 46200, '2022-09-11 18:09:08'),
(6, 'Aniket', 'Viraj', 2000, 62800, 48200, '2022-09-11 18:12:10');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `transaction`
--
ALTER TABLE `transaction`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `contact`
--
ALTER TABLE `contact`
  MODIFY `id` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `transaction`
--
ALTER TABLE `transaction`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
