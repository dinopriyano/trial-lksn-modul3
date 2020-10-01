-- phpMyAdmin SQL Dump
-- version 4.9.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Oct 01, 2020 at 11:27 AM
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
-- Database: `id14984298_pc_jk`
--

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) NOT NULL,
  `firstname` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `firstname`, `lastname`, `username`, `password`, `created_at`) VALUES
(1, 'Test', 'Gan', 'user8', '123456', '2020-09-28 14:00:37'),
(3, 'Dino', 'Priyano', 'dinop', '8d969eef6ecad3c29a3a629280e686cf0c3f5d5a86aff3ca12020c923adc6c92', '2020-09-18 02:45:25'),
(4, 'Dino', 'Priyano', 'dinopo', '8d969eef6ecad3c29a3a629280e686cf0c3f5d5a86aff3ca12020c923adc6c92', '2020-09-18 02:51:57'),
(5, 'Dino', 'Priyano', 'dinopr', '8d969eef6ecad3c29a3a629280e686cf0c3f5d5a86aff3ca12020c923adc6c92', '2020-09-18 02:52:34'),
(6, 'Dino', 'Priyano', 'dinopri', '8d969eef6ecad3c29a3a629280e686cf0c3f5d5a86aff3ca12020c923adc6c92', '2020-09-18 02:52:56'),
(7, 'Dino', 'Priyano', 'dinopri', '8d969eef6ecad3c29a3a629280e686cf0c3f5d5a86aff3ca12020c923adc6c92', '2020-09-25 06:07:36'),
(8, 'User', 'Lima', 'user5', '$2y$10$gcZE9zGtkKvI4dRFWcF0w.gdzXrzRSWGdQI/fbJNNOurQglyS9pNi', '2020-09-25 07:06:12'),
(9, 'Test', 'Gan', 'user6', '$2y$10$dzuZqLd8cmgusR0IYOxYiOTr70K17IetbXTugFKxre6nSt7oMiXSG', '2020-09-26 05:20:38'),
(25, 'Test', 'Gan', 'user7', '$2y$10$nd2xkcolsHp3q3cuZgw1ZOdVmFqmxMPdC8fnEbdbfB6UaB8iuPOjm', '2020-09-26 07:27:37'),
(26, 'Test', 'Gan', 'user8', '123456', '2020-09-28 14:01:53'),
(27, 'Test', 'Gan', 'user8', '123456', '2020-09-28 14:02:16'),
(28, 'Test', 'Gan', 'user9', '$2y$10$BHh6CtkxwOhfNPVoC/PTJexOhtcJ9jyP/hgH2GxAYydp5ZE1b5U36', '2020-09-28 14:03:05');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`,`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
