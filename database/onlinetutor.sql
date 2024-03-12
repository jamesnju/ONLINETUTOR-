-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 12, 2024 at 10:25 AM
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
-- Database: `onlinetutor`
--

-- --------------------------------------------------------

--
-- Table structure for table `course`
--

CREATE TABLE `course` (
  `course_id` int(25) NOT NULL,
  `registration_id` int(25) NOT NULL,
  `course_name` char(255) NOT NULL,
  `course_description` char(255) NOT NULL,
  `course_status` char(30) NOT NULL,
  `course_date_created` date NOT NULL,
  `course_date_updated` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `course`
--

INSERT INTO `course` (`course_id`, `registration_id`, `course_name`, `course_description`, `course_status`, `course_date_created`, `course_date_updated`) VALUES
(5, 4, 'Machine Learning', 'sad', 'Active', '2024-03-12', '2024-03-12'),
(7, 3, 'tgf', 'gdg', 'pending', '2024-03-12', '2024-03-12'),
(8, 4, 'vcvcv', 'etertbv', 'Active', '2024-03-12', '2024-03-12'),
(9, 4, 'uiyt', 'jnkk', 'pending', '2024-03-12', '2024-03-12');

-- --------------------------------------------------------

--
-- Table structure for table `course_reviews`
--

CREATE TABLE `course_reviews` (
  `review_id` int(11) NOT NULL,
  `course_id` int(11) NOT NULL,
  `student_id` int(11) NOT NULL,
  `rating` varchar(245) NOT NULL,
  `review_text` varchar(255) NOT NULL,
  `review_date` timestamp(6) NOT NULL DEFAULT current_timestamp(6) ON UPDATE current_timestamp(6)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `enrolled_course`
--

CREATE TABLE `enrolled_course` (
  `enrolled_course_id` int(11) NOT NULL,
  `course_id` int(30) NOT NULL,
  `registration_id` int(200) NOT NULL,
  `enrolled_course_name` char(255) NOT NULL,
  `enrolled_course_description` char(255) NOT NULL,
  `enrolled_course_date` date NOT NULL,
  `enrolled_course_status` char(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `enrolled_course`
--

INSERT INTO `enrolled_course` (`enrolled_course_id`, `course_id`, `registration_id`, `enrolled_course_name`, `enrolled_course_description`, `enrolled_course_date`, `enrolled_course_status`) VALUES
(23, 9, 0, 'uiyt', 'jnkk', '2024-03-12', 'Approved'),
(24, 8, 0, 'vcvcv', 'etertbv', '2024-03-12', 'Waiting Approval'),
(25, 7, 0, 'tgf', 'gdg', '2024-03-12', 'Waiting Approval');

-- --------------------------------------------------------

--
-- Table structure for table `inquirer`
--

CREATE TABLE `inquirer` (
  `inquirer_id` int(25) NOT NULL,
  `registration_id` int(30) NOT NULL,
  `inquirer_full_name` char(200) NOT NULL,
  `inquirer_email` varchar(100) NOT NULL,
  `inquirer_contact` int(50) NOT NULL,
  `inquirer_message` varchar(255) NOT NULL,
  `inquirer_date_created` timestamp(6) NOT NULL DEFAULT current_timestamp(6) ON UPDATE current_timestamp(6)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `inquirer`
--

INSERT INTO `inquirer` (`inquirer_id`, `registration_id`, `inquirer_full_name`, `inquirer_email`, `inquirer_contact`, `inquirer_message`, `inquirer_date_created`) VALUES
(2, 3, 'gfgd', 'lakisha@gmail.com', 0, 'fdfadf', '2024-03-12 09:01:39.000000');

-- --------------------------------------------------------

--
-- Table structure for table `registration`
--

CREATE TABLE `registration` (
  `registration_id` int(255) NOT NULL,
  `registration_fname` char(30) NOT NULL,
  `registration_lname` char(200) NOT NULL,
  `registration_email` varchar(100) NOT NULL,
  `registration_pic` blob NOT NULL,
  `registration_role` char(255) NOT NULL,
  `registration_password` varchar(255) NOT NULL,
  `registration_confirm_password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `registration`
--

INSERT INTO `registration` (`registration_id`, `registration_fname`, `registration_lname`, `registration_email`, `registration_pic`, `registration_role`, `registration_password`, `registration_confirm_password`) VALUES
(2, 'error', 'shine', 'james@gmail.com', 0x776f6d616e312e6a7067, 'admin', '$2y$10$yyGvkFJWMiZTuNJeiaDMA.oxG9oekW87OYhDSWeGCNtDPA0o0W1DO', '$2y$10$yyGvkFJWMiZTuNJeiaDMA.oxG9oekW87OYhDSWeGCNtDPA0o0W1DO'),
(3, 'james11', 'sd', 'ewwoe@gmail.com', 0x6f6e6c696e65206261636b67726f756e642e6a7067, 'tutor', '$2y$10$Aj8mrGro9a2FAorFD2wx5eEFtR1Qno0rbT0cVARxg7w5jcC8Czxe6', '$2y$10$Aj8mrGro9a2FAorFD2wx5eEFtR1Qno0rbT0cVARxg7w5jcC8Czxe6'),
(4, 'zi', '22', 'jam3@gmail.comz', 0x6f6e6c696e65206261636b67726f756e642e6a7067, 'tutor', '$2y$10$FGRrsfutTv581F9/4p/70uBTUYZ0cUH19eQNOkJyjsIpscTZDSR1m', '$2y$10$FGRrsfutTv581F9/4p/70uBTUYZ0cUH19eQNOkJyjsIpscTZDSR1m'),
(6, 'james', 'd', 'jam3@gmail.comw', 0x706578656c732d6b657475742d7375626979616e746f2d343330373836392e6a7067, 'student', '$2y$10$5fEBML1dGp98SCtDJw0sTeCXGpwVuMb9sq4cCBlNHIyiQqy7J9uNa', '$2y$10$5fEBML1dGp98SCtDJw0sTeCXGpwVuMb9sq4cCBlNHIyiQqy7J9uNa');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `course`
--
ALTER TABLE `course`
  ADD PRIMARY KEY (`course_id`),
  ADD KEY `course_ibfk_1` (`registration_id`);

--
-- Indexes for table `course_reviews`
--
ALTER TABLE `course_reviews`
  ADD PRIMARY KEY (`review_id`);

--
-- Indexes for table `enrolled_course`
--
ALTER TABLE `enrolled_course`
  ADD PRIMARY KEY (`enrolled_course_id`),
  ADD KEY `registration_id` (`registration_id`),
  ADD KEY `enrolled_course_ibfk_2` (`course_id`);

--
-- Indexes for table `inquirer`
--
ALTER TABLE `inquirer`
  ADD PRIMARY KEY (`inquirer_id`),
  ADD KEY `inquirer_ibfk_1` (`registration_id`);

--
-- Indexes for table `registration`
--
ALTER TABLE `registration`
  ADD PRIMARY KEY (`registration_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `course`
--
ALTER TABLE `course`
  MODIFY `course_id` int(25) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `course_reviews`
--
ALTER TABLE `course_reviews`
  MODIFY `review_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `enrolled_course`
--
ALTER TABLE `enrolled_course`
  MODIFY `enrolled_course_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `inquirer`
--
ALTER TABLE `inquirer`
  MODIFY `inquirer_id` int(25) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `registration`
--
ALTER TABLE `registration`
  MODIFY `registration_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `course`
--
ALTER TABLE `course`
  ADD CONSTRAINT `course_ibfk_1` FOREIGN KEY (`registration_id`) REFERENCES `registration` (`registration_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `enrolled_course`
--
ALTER TABLE `enrolled_course`
  ADD CONSTRAINT `enrolled_course_ibfk_2` FOREIGN KEY (`course_id`) REFERENCES `course` (`course_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `inquirer`
--
ALTER TABLE `inquirer`
  ADD CONSTRAINT `inquirer_ibfk_1` FOREIGN KEY (`registration_id`) REFERENCES `registration` (`registration_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
