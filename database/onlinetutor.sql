-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 23, 2024 at 08:23 AM
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
-- Table structure for table `course_list`
--

CREATE TABLE `course_list` (
  `course_id` int(25) NOT NULL,
  `tutor_id` int(25) NOT NULL,
  `course_name` char(255) NOT NULL,
  `course_description` char(255) NOT NULL,
  `course_status` char(30) NOT NULL,
  `date_created` timestamp(6) NOT NULL DEFAULT current_timestamp(6) ON UPDATE current_timestamp(6),
  `date_updated` timestamp(6) NOT NULL DEFAULT current_timestamp(6) ON UPDATE current_timestamp(6)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `course_list`
--

INSERT INTO `course_list` (`course_id`, `tutor_id`, `course_name`, `course_description`, `course_status`, `date_created`, `date_updated`) VALUES
(1, 1, 'React webdev', 'React is a JavaScript library for building user interfaces, particularly for single-page applications (SPAs). Developed by Facebook, React was first released in 2013 and has since gained widespread adoption in the web development community', 'Active', '2024-02-22 20:53:00.469023', '2024-02-22 20:53:00.469023'),
(2, 2, 'Python Machine Learning', 'Python is a high-level, interpreted programming language known for its simplicity, versatility, and readability. It was created by Guido van Rossum and first released in 1991. Python emphasizes code readability and allows programmers to express concepts i', 'pending', '2024-02-22 20:52:16.000000', '2024-02-22 20:52:16.000000');

-- --------------------------------------------------------

--
-- Table structure for table `inguiry_list`
--

CREATE TABLE `inguiry_list` (
  `inquiry_id` int(25) NOT NULL,
  `tutor_id` int(30) NOT NULL,
  `full_name` char(200) NOT NULL,
  `inqurer_email` varchar(100) NOT NULL,
  `inquirer_contact` int(50) NOT NULL,
  `message` varchar(255) NOT NULL,
  `date_created` timestamp(6) NOT NULL DEFAULT current_timestamp(6) ON UPDATE current_timestamp(6)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `registration`
--

CREATE TABLE `registration` (
  `tutor_id` int(255) NOT NULL,
  `tutor_fname` char(30) NOT NULL,
  `tutor_lname` char(200) NOT NULL,
  `tutor_email` varchar(100) NOT NULL,
  `tutor_pic` blob NOT NULL,
  `tutor_password` varchar(255) NOT NULL,
  `confirm_password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `registration`
--

INSERT INTO `registration` (`tutor_id`, `tutor_fname`, `tutor_lname`, `tutor_email`, `tutor_pic`, `tutor_password`, `confirm_password`) VALUES
(1, 'james', '404', 'james@gmail.com', 0x706578656c732d6b657475742d7375626979616e746f2d343330373836392e6a7067, '$2y$10$fzX27dwmoPNwkRC6iHDDZO5KoWUBOPCt6GbU9HOcyGNSo914ofWGK', '$2y$10$fzX27dwmoPNwkRC6iHDDZO5KoWUBOPCt6GbU9HOcyGNSo914ofWGK'),
(2, 'shine', 'charity', 'jam3@gmail.com', 0x776f6d616e312e6a7067, '$2y$10$3L1OdAp0ajCoa3xiVgeT5.lq0NCB6iG2xpXM0uANzVBlMKFc8p8fi', '$2y$10$3L1OdAp0ajCoa3xiVgeT5.lq0NCB6iG2xpXM0uANzVBlMKFc8p8fi'),
(3, 'jamesnju', 'cool', 'jam@gmail.com', 0x706578656c732d636f74746f6e62726f2d73747564696f2d353337383730302e6a7067, '$2y$10$20EHaoV6cjVOrXTgOoGFVO6VMIW8wlEOVxLfXSOLCIPLFTMyfrLzm', '$2y$10$20EHaoV6cjVOrXTgOoGFVO6VMIW8wlEOVxLfXSOLCIPLFTMyfrLzm'),
(4, 'charity', 'shine', 'james3@gmail.com', 0x776f6d616e312e6a7067, '$2y$10$6blnMaq74D4LECws2TxNU.mA1OHucJ.0jGPsC7T3w2fG8nk9mj7Xy', '$2y$10$6blnMaq74D4LECws2TxNU.mA1OHucJ.0jGPsC7T3w2fG8nk9mj7Xy');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `course_list`
--
ALTER TABLE `course_list`
  ADD PRIMARY KEY (`course_id`);

--
-- Indexes for table `inguiry_list`
--
ALTER TABLE `inguiry_list`
  ADD PRIMARY KEY (`inquiry_id`);

--
-- Indexes for table `registration`
--
ALTER TABLE `registration`
  ADD PRIMARY KEY (`tutor_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `course_list`
--
ALTER TABLE `course_list`
  MODIFY `course_id` int(25) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `inguiry_list`
--
ALTER TABLE `inguiry_list`
  MODIFY `inquiry_id` int(25) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `registration`
--
ALTER TABLE `registration`
  MODIFY `tutor_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
