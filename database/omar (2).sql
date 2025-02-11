-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 10, 2025 at 07:50 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `omar`
--

-- --------------------------------------------------------

--
-- Table structure for table `academics`
--

CREATE TABLE `academics` (
  `academic_id` int(11) NOT NULL,
  `student_id` int(11) DEFAULT NULL,
  `course_name` varchar(100) NOT NULL,
  `semester` varchar(20) NOT NULL,
  `grade` varchar(5) DEFAULT NULL,
  `year` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `accounts`
--

CREATE TABLE `accounts` (
  `account_id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(100) NOT NULL,
  `role` enum('Admin','Teacher','Student','Parent') NOT NULL,
  `status` enum('Active','Inactive') DEFAULT 'Active',
  `last_login` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` int(11) NOT NULL,
  `role` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `role`) VALUES
(2, 'admin'),
(3, 'editor'),
(1, 'user');

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `student_id` int(11) NOT NULL,
  `reg_no` varchar(250) NOT NULL,
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `date_of_birth` date NOT NULL,
  `gender` enum('Male','Female','Other') NOT NULL,
  `address` text DEFAULT NULL,
  `phone_number` varchar(15) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `enrollment_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `unit_id` int(11) NOT NULL,
  `grade` varchar(10) DEFAULT NULL,
  `status` enum('Active','Inactive') DEFAULT 'Active'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `teachers`
--

CREATE TABLE `teachers` (
  `teacher_id` int(11) NOT NULL,
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `date_of_birth` date NOT NULL,
  `gender` enum('Male','Female','Other') NOT NULL,
  `address` text DEFAULT NULL,
  `phone_number` varchar(15) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `unit_id` int(11) NOT NULL,
  `hire_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `subject_specialization` varchar(100) DEFAULT NULL,
  `status` enum('Active','Inactive') DEFAULT 'Active'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `unit`
--

CREATE TABLE `unit` (
  `unit_id` int(11) NOT NULL,
  `unit_code` varchar(10) NOT NULL,
  `unit_name` varchar(100) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` enum('supperAdmin','admin','staff','student') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`, `role`) VALUES
(9, 'Sufiani', 'hommiedelaco@gmail.com', '$2y$10$FYBuCl5pLzh9FXphxRIVOOccREBBuAGxRSnZ39W2I48Lss1VSZZNW', 'supperAdmin'),
(10, 'vincent ', 'vinny@gmail.com', '$2y$10$l.Q/WOe8T7aDscN2GLFO5.HxNFtH3IIQvWTnzOClcE9CDgVphNsGW', 'supperAdmin'),
(13, 'suleiman', 'mohamedrajab0000@gmail.com', '$2y$10$3qPRLIgTuhfRu.Rb5u0nHOPv.3Fzgqn.e5qr3ffzE69GaDiNuCs7m', 'supperAdmin'),
(15, 'saidi hamisi', 'saidi@kpa.co.ke', '$2y$10$R2.oWBuu4CXS.PRAil38PeYCRO3pPn2QwmfZ6c/2ACnkLKR9hDt2a', 'staff');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `academics`
--
ALTER TABLE `academics`
  ADD PRIMARY KEY (`academic_id`),
  ADD KEY `student_id` (`student_id`);

--
-- Indexes for table `accounts`
--
ALTER TABLE `accounts`
  ADD PRIMARY KEY (`account_id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `role` (`role`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`student_id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD KEY `students_ibfk_1` (`unit_id`),
  ADD KEY `reg_no` (`reg_no`);

--
-- Indexes for table `teachers`
--
ALTER TABLE `teachers`
  ADD PRIMARY KEY (`teacher_id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD KEY `unit_id` (`unit_id`);

--
-- Indexes for table `unit`
--
ALTER TABLE `unit`
  ADD PRIMARY KEY (`unit_id`),
  ADD UNIQUE KEY `unit_code` (`unit_code`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `academics`
--
ALTER TABLE `academics`
  MODIFY `academic_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `accounts`
--
ALTER TABLE `accounts`
  MODIFY `account_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `student_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `teachers`
--
ALTER TABLE `teachers`
  MODIFY `teacher_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `unit`
--
ALTER TABLE `unit`
  MODIFY `unit_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `academics`
--
ALTER TABLE `academics`
  ADD CONSTRAINT `academics_ibfk_1` FOREIGN KEY (`student_id`) REFERENCES `students` (`student_id`) ON DELETE CASCADE;

--
-- Constraints for table `accounts`
--
ALTER TABLE `accounts`
  ADD CONSTRAINT `accounts_ibfk_1` FOREIGN KEY (`email`) REFERENCES `users` (`email`) ON UPDATE CASCADE;

--
-- Constraints for table `students`
--
ALTER TABLE `students`
  ADD CONSTRAINT `students_ibfk_1` FOREIGN KEY (`unit_id`) REFERENCES `unit` (`unit_id`) ON UPDATE CASCADE;

--
-- Constraints for table `teachers`
--
ALTER TABLE `teachers`
  ADD CONSTRAINT `teachers_ibfk_1` FOREIGN KEY (`email`) REFERENCES `users` (`email`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
