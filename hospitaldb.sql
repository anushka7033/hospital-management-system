-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3344
-- Generation Time: Apr 18, 2024 at 01:37 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hospitaldb`
--

-- --------------------------------------------------------

--
-- Table structure for table `appointments`
--

CREATE TABLE `appointments` (
  `id` int(11) NOT NULL,
  `userid` varchar(50) NOT NULL,
  `patient_name` varchar(100) NOT NULL,
  `phone_number` varchar(20) NOT NULL,
  `doctor` varchar(100) NOT NULL,
  `appointment_date` date NOT NULL,
  `appointment_time` time NOT NULL,
  `status` varchar(10) NOT NULL DEFAULT 'Booked',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `appointments`
--

INSERT INTO `appointments` (`id`, `userid`, `patient_name`, `phone_number`, `doctor`, `appointment_date`, `appointment_time`, `status`, `created_at`) VALUES
(8, 'Chulika', 'Chulika', '9998887776', 'Dr. Lisa', '2024-04-19', '13:30:00', 'Booked', '2024-04-17 19:51:04'),
(9, 'Chulika', 'Chulika', '9998887776', 'Dr. Lisa', '2024-04-19', '14:00:00', 'Booked', '2024-04-17 19:51:14'),
(10, 'Alexa', 'ALEXA', '9999988888', 'Dr. Alexa', '2024-04-19', '11:00:00', 'Booked', '2024-04-17 20:03:06');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `address` varchar(255) NOT NULL,
  `mobile` varchar(10) NOT NULL,
  `blood_group` varchar(5) NOT NULL,
  `gender` enum('Male','Female','Other') NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `address`, `mobile`, `blood_group`, `gender`, `password`) VALUES
(1, 'Rishita', 'rishita@gmail.com', 'C 201, VAISHALI , JAIPUR', '9998887776', 'B+', 'Female', 'rish1234'),
(2, 'ADMIN', 'admin@gmail.com', 'ADMIN  , JAIPUR', '9999999777', 'O-', 'Other', 'admin123'),
(3, 'Alexa', 'alexa@gmail.com', 'Nirman Nagar , Jaipur', '7894561230', 'B+', 'Female', 'alexa'),
(4, 'Chulika', 'chulika@gmail.com', 'MANSAROVAR , JAIPUR', '7778885555', 'B+', 'Female', 'abcd1234');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `appointments`
--
ALTER TABLE `appointments`
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
-- AUTO_INCREMENT for table `appointments`
--
ALTER TABLE `appointments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
