-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jun 01, 2023 at 09:13 AM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hasystem_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `appointments`
--

CREATE TABLE `appointments` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `phone` varchar(15) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `doctor` varchar(50) NOT NULL,
  `timings` varchar(15) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `appointments`
--

INSERT INTO `appointments` (`id`, `name`, `email`, `phone`, `gender`, `doctor`, `timings`, `date`) VALUES
(9, 'Hannan', 'ahannan2016@outlook.com', '03370805685', 'male', 'Mudsir', 'Morning', '2023-05-30'),
(10, 'Hannan Faisal', 'ahannan2016@outlook.com', '03370805685', 'male', 'Mudsir', 'Morning', '2023-05-18');

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE `contact` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `phone` varchar(15) NOT NULL,
  `subject` varchar(50) NOT NULL,
  `message` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `doctors`
--

CREATE TABLE `doctors` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `phone` varchar(15) NOT NULL,
  `image` longblob NOT NULL,
  `department` varchar(50) NOT NULL,
  `specialization` varchar(50) NOT NULL,
  `qualification` varchar(50) NOT NULL,
  `timing` varchar(50) NOT NULL,
  `fee` int(11) NOT NULL,
  `description` text DEFAULT NULL,
  `degree_2` varchar(50) DEFAULT NULL,
  `institution` varchar(50) DEFAULT NULL,
  `degree_1` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `lab_appointments`
--

CREATE TABLE `lab_appointments` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `phone` varchar(15) DEFAULT NULL,
  `type` varchar(50) NOT NULL,
  `timings` varchar(50) DEFAULT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `lab_appointments`
--

INSERT INTO `lab_appointments` (`id`, `name`, `email`, `phone`, `type`, `timings`, `date`) VALUES
(7, 'Hannan', 'ahannan2016@outlook.com', '03370805685', 'bloid', 'Morning', '2023-05-18'),
(8, 'Hannan Faisal', 'ahannan2016@outlook.com', '03370805685', 'bloid', 'Morning', '2023-05-30'),
(9, 'HannanFaisal', '70110843@student.uol.edu.pk', '03370408845', 'Select Test', '03:00 - 08:00 (Evening)', '2023-05-30'),
(10, '88', 'ahannan2016@outlook.com', '03370308845', 'Select Test', '09:00-12:00 (Morning)', '2023-05-30'),
(11, '88', 'ahannan2016@outlook.com', '03370308845', 'Select Test', '09:00-12:00 (Morning)', '2023-05-30');

-- --------------------------------------------------------

--
-- Table structure for table `lab_test`
--

CREATE TABLE `lab_test` (
  `id` int(11) NOT NULL,
  `type` varchar(50) NOT NULL,
  `name` varchar(50) NOT NULL,
  `fee` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `lab_test`
--

INSERT INTO `lab_test` (`id`, `type`, `name`, `fee`) VALUES
(30, 'Select Type', 'Hannan', 7899),
(31, 'Blood', 'T5', 800),
(33, 'Blood', 'T5', 800),
(34, 'Blood', 'T5', 800);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `user_name` varchar(50) NOT NULL,
  `user_email` varchar(50) NOT NULL,
  `user_password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `user_name`, `user_email`, `user_password`) VALUES
(1, 'ahannan2016@outlook.com', 'ahannan2016@outlook.com', 'hannan'),
(2, 'Hannan FaisaL', '70110843@student.uol.edu.pk', 'hannan123'),
(4, 'hANNAN', 'ahannan2017@outlook.com', 'hannan'),
(5, 'hannan', 'ahannan2010@outlook.com', 'hannan'),
(7, 'hannan', 'ali121@gmail.com', 'q'),
(8, 'Admin1', 'admin1@gmail.com', '123456'),
(9, 'Ali Khan William', 'ali12@gmail.com', '1234567890');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `appointments`
--
ALTER TABLE `appointments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `doctors`
--
ALTER TABLE `doctors`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `lab_appointments`
--
ALTER TABLE `lab_appointments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `lab_test`
--
ALTER TABLE `lab_test`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `user_email` (`user_email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `appointments`
--
ALTER TABLE `appointments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `contact`
--
ALTER TABLE `contact`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `doctors`
--
ALTER TABLE `doctors`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=73;

--
-- AUTO_INCREMENT for table `lab_appointments`
--
ALTER TABLE `lab_appointments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `lab_test`
--
ALTER TABLE `lab_test`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
