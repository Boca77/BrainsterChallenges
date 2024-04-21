-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 21, 2024 at 08:32 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `registration`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `email`, `password`) VALUES
(1, 'admin', 'admin@admin.com', 'admin'),
(2, 'admin2', 'admin2@admin.com', 'admin2'),
(3, 'admin3', 'admin3@admin.com', 'admin3');

-- --------------------------------------------------------

--
-- Table structure for table `fuel-types`
--

CREATE TABLE `fuel-types` (
  `id` int(11) NOT NULL,
  `fuel_type` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `fuel-types`
--

INSERT INTO `fuel-types` (`id`, `fuel_type`) VALUES
(2, 'Diesel'),
(3, 'Gas'),
(4, 'Electric');

-- --------------------------------------------------------

--
-- Table structure for table `registrations`
--

CREATE TABLE `registrations` (
  `id` int(11) NOT NULL,
  `vehicle_model` varchar(255) NOT NULL,
  `vehicle_type` varchar(255) NOT NULL,
  `chassis_number` varchar(255) NOT NULL,
  `production_year` int(11) NOT NULL,
  `reg_number` varchar(255) NOT NULL,
  `fuel_type` varchar(255) NOT NULL,
  `reg_to` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `registrations`
--

INSERT INTO `registrations` (`id`, `vehicle_model`, `vehicle_type`, `chassis_number`, `production_year`, `reg_number`, `fuel_type`, `reg_to`) VALUES
(20, 'Fiat Uno', 'Coupe', '4563846846843', 2000, 'TE-554-MT', 'Diesel', '2025-04-21'),
(21, 'Toyota Aygo ', 'Coupe', '546684531', 1998, 'SK-4848-ML', 'Gas', '2024-05-06'),
(23, 'Toyota Corola', 'Suv', '864684846846', 2025, 'SK-846-BN', 'Electric', '2024-06-06'),
(24, 'Toyota Aygo ', 'Hatchback', '684846846846', 1999, 'SK-123412-BL', 'Gas', '2025-04-21'),
(25, 'Fiat Panda', 'Sedan', '1231312', 2003, 'SK-2312312321-BL', 'Gas', '2024-04-01');

-- --------------------------------------------------------

--
-- Table structure for table `vehicle-models`
--

CREATE TABLE `vehicle-models` (
  `id` int(11) NOT NULL,
  `vehicle_model` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `vehicle-models`
--

INSERT INTO `vehicle-models` (`id`, `vehicle_model`) VALUES
(1, 'Opel Astra'),
(2, 'Ford Focus'),
(3, 'Fiat Panda'),
(4, 'Toyota Aygo '),
(5, 'Fiat Uno'),
(6, 'Ford Fusion'),
(7, 'Fiat Punto'),
(8, 'Opel Corsa'),
(9, 'Audi R8'),
(10, 'Skoda Octavia '),
(20, 'Toyota Corola');

-- --------------------------------------------------------

--
-- Table structure for table `vehicle-types`
--

CREATE TABLE `vehicle-types` (
  `id` int(11) NOT NULL,
  `vehicle_type` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `vehicle-types`
--

INSERT INTO `vehicle-types` (`id`, `vehicle_type`) VALUES
(1, 'Sedan'),
(2, 'Coupe'),
(3, 'Hatchback'),
(4, 'Suv'),
(5, 'Minivan');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `fuel-types`
--
ALTER TABLE `fuel-types`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `registrations`
--
ALTER TABLE `registrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `vehicle-models`
--
ALTER TABLE `vehicle-models`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `vehicle-types`
--
ALTER TABLE `vehicle-types`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `fuel-types`
--
ALTER TABLE `fuel-types`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `registrations`
--
ALTER TABLE `registrations`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `vehicle-models`
--
ALTER TABLE `vehicle-models`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `vehicle-types`
--
ALTER TABLE `vehicle-types`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
