-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: May 13, 2024 at 09:46 AM
-- Server version: 8.0.30
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pw2024_tubes_233040081`
--

-- --------------------------------------------------------

--
-- Table structure for table `aktor_film`
--

CREATE TABLE `aktor_film` (
  `id` int NOT NULL,
  `nama_aktor` varchar(255) NOT NULL,
  `kelahiran` date NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `deskripsi_film`
--

CREATE TABLE `deskripsi_film` (
  `id` int NOT NULL,
  `judul_film` varchar(255) NOT NULL,
  `latar_film` varchar(255) NOT NULL,
  `isi_film` varchar(255) NOT NULL,
  `kesimpulan_film` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sutradara_film`
--

CREATE TABLE `sutradara_film` (
  `id` int NOT NULL,
  `nama_sutradara` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int NOT NULL,
  `username` varchar(55) NOT NULL,
  `passworld` varchar(55) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `aktor_film`
--
ALTER TABLE `aktor_film`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `deskripsi_film`
--
ALTER TABLE `deskripsi_film`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sutradara_film`
--
ALTER TABLE `sutradara_film`
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
-- AUTO_INCREMENT for table `aktor_film`
--
ALTER TABLE `aktor_film`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `deskripsi_film`
--
ALTER TABLE `deskripsi_film`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sutradara_film`
--
ALTER TABLE `sutradara_film`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `aktor_film`
--
ALTER TABLE `aktor_film`
  ADD CONSTRAINT `aktor_film_ibfk_1` FOREIGN KEY (`id`) REFERENCES `deskripsi_film` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `deskripsi_film`
--
ALTER TABLE `deskripsi_film`
  ADD CONSTRAINT `deskripsi_film_ibfk_1` FOREIGN KEY (`id`) REFERENCES `sutradara_film` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
