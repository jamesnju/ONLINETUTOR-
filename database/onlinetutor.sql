-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 29, 2024 at 07:18 PM
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
  `date_created` date NOT NULL,
  `date_updated` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `course_list`
--

INSERT INTO `course_list` (`course_id`, `tutor_id`, `course_name`, `course_description`, `course_status`, `date_created`, `date_updated`) VALUES
(2, 1, 'chemistry', 'hdfjhgjdg\r\nfdshjf', 'Waiting Approval', '2024-02-28', '2024-02-28'),
(4, 4, 'Javascript2', 'ghfghfghhfg ghgh ghfgh', 'Waiting Approval', '2024-02-28', '2024-02-28'),
(5, 1, 'Machine Learning', 'dfsdafdf ggsd gdsg gdg dgds dgd', 'Waiting Approval', '2024-02-28', '2024-02-28'),
(6, 1, 'html', 'gdgdgd fgdgd', 'Waiting Approval', '2024-02-28', '2024-02-28'),
(7, 4, 'gfcgf', 'gdfgdgd\r\ndgdg', 'Waiting Approval', '2024-02-28', '2024-02-28'),
(8, 10, 'gdggdfggfhfsg', 'dgdgds fsadfsd dfsdfdas sdfsdfdsa dfsdfasd dsfsdf dfsdfsa dfasd fsdaf dfsd dfsda dfds  sdfsdfsda sdfdasfsd sdfsdaf dsfsd fsdf dsfsd fdfsd fsdfd sdf sdfsd  dfdsf sdf sdfsdgdfgerer t  dfga  daf d d fadgfd gdf gf gf g adge t ert t er t  tretertert  reter t', 'pending', '2024-02-28', '2024-02-28'),
(9, 4, 'dsgdsg', 'gdgsdgd', 'pending', '2024-02-28', '2024-02-28'),
(10, 13, 'uytuty', 'yuytu', 'pending', '2024-02-28', '2024-02-28'),
(11, 13, 'sfsd', 'dsfds', 'pending', '2024-02-28', '2024-02-28'),
(12, 13, 'erger', 'erer', 'pending', '2024-02-28', '2024-02-28'),
(13, 13, 'james', 'dgdfdgsd', 'pending', '2024-02-28', '2024-02-28'),
(14, 13, 'Python Machine Learning4', 'Python is a high-level, general-purpose programming language. Its design philosophy emphasizes code readability with the use of significant indentation. Python is dynamically typed and garbage-collected. It supports multiple programming paradigms, includi', 'Active', '2024-02-29', '2024-02-29');

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
-- Table structure for table `enrolled_courses`
--

CREATE TABLE `enrolled_courses` (
  `enrollment_id` int(11) NOT NULL,
  `course_id` int(30) NOT NULL,
  `tutor_id` int(200) NOT NULL,
  `course_name` char(255) NOT NULL,
  `course_description` char(255) NOT NULL,
  `enrollment_date` date NOT NULL,
  `enrollment_status` char(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `enrolled_courses`
--

INSERT INTO `enrolled_courses` (`enrollment_id`, `course_id`, `tutor_id`, `course_name`, `course_description`, `enrollment_date`, `enrollment_status`) VALUES
(1, 4, 0, 'Javascript2', 'ghfghfghhfg ghgh ghfgh', '2024-02-28', 'Approved'),
(2, 5, 0, 'Machine Learning', 'dfsdafdf ggsd gdsg gdg dgds dgd', '2024-02-28', 'Approved'),
(3, 7, 0, 'gfcgf', 'gdfgdgd\r\ndgdg', '2024-02-28', 'Waiting Approval'),
(4, 0, 0, '<?php echo urlencode(uytuty); ?>', '<?php echo urlencode(yuytu);?>', '2024-02-28', 'Waiting Approval'),
(5, 10, 0, 'uytuty', 'yuytu', '2024-02-28', 'Approved'),
(6, 2, 0, 'chemistry', 'hdfjhgjdg\r\nfdshjf', '2024-02-28', 'Approved');

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

--
-- Dumping data for table `inguiry_list`
--

INSERT INTO `inguiry_list` (`inquiry_id`, `tutor_id`, `full_name`, `inqurer_email`, `inquirer_contact`, `message`, `date_created`) VALUES
(3, 13, 'ee', 'lakisha@gmail.com', 4342, 'sdfs', '2024-02-29 17:18:54.000000'),
(4, 13, 'james', 'jamesdfs@gmail.com', 9697459, 'rtrwer', '2024-02-29 17:24:55.000000'),
(5, 13, 'james3', 'lakish33@gmail.com', 543534, 'dfsd', '2024-02-29 17:26:49.000000'),
(6, 13, 'gfgd', 'james@gmail.com', 889, 'bmbn', '2024-02-29 17:27:54.000000');

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
  `role` char(255) NOT NULL,
  `tutor_password` varchar(255) NOT NULL,
  `confirm_password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `registration`
--

INSERT INTO `registration` (`tutor_id`, `tutor_fname`, `tutor_lname`, `tutor_email`, `tutor_pic`, `role`, `tutor_password`, `confirm_password`) VALUES
(1, 'james', '404', 'james@gmail.com', 0x706578656c732d6b657475742d7375626979616e746f2d343330373836392e6a7067, '', '$2y$10$fzX27dwmoPNwkRC6iHDDZO5KoWUBOPCt6GbU9HOcyGNSo914ofWGK', '$2y$10$fzX27dwmoPNwkRC6iHDDZO5KoWUBOPCt6GbU9HOcyGNSo914ofWGK'),
(2, 'shine', 'charity', 'jam3@gmail.com', 0x776f6d616e312e6a7067, '', '$2y$10$3L1OdAp0ajCoa3xiVgeT5.lq0NCB6iG2xpXM0uANzVBlMKFc8p8fi', '$2y$10$3L1OdAp0ajCoa3xiVgeT5.lq0NCB6iG2xpXM0uANzVBlMKFc8p8fi'),
(3, 'jamesnju', 'cool', 'jam@gmail.com', 0x706578656c732d636f74746f6e62726f2d73747564696f2d353337383730302e6a7067, '', '$2y$10$20EHaoV6cjVOrXTgOoGFVO6VMIW8wlEOVxLfXSOLCIPLFTMyfrLzm', '$2y$10$20EHaoV6cjVOrXTgOoGFVO6VMIW8wlEOVxLfXSOLCIPLFTMyfrLzm'),
(4, 'charity', 'shine', 'james3@gmail.com', 0x776f6d616e312e6a7067, '', '$2y$10$6blnMaq74D4LECws2TxNU.mA1OHucJ.0jGPsC7T3w2fG8nk9mj7Xy', '$2y$10$6blnMaq74D4LECws2TxNU.mA1OHucJ.0jGPsC7T3w2fG8nk9mj7Xy'),
(10, 'error', '404', 'error@gmail.com', 0x706578656c732d6d6f6e73746572612d353837363639352e6a7067, 'admin', '$2y$10$FyLOPK.QLFj.1gebWnsnh.vbDue9bQWX1KQYWxkhDQFmDE/NFXWky', '$2y$10$FyLOPK.QLFj.1gebWnsnh.vbDue9bQWX1KQYWxkhDQFmDE/NFXWky'),
(12, 'james1', 'james', 'james1@gmail.com', 0x7a6f6f7a616e61676865682d73747564696f2d42733443477865655563552d756e73706c6173682e6a7067, 'student', '$2y$10$nLPdVQrkPUmcNaYwXkY7GeNg59uD8OrIzZzXWCX/29eky5NOyvUKe', '$2y$10$nLPdVQrkPUmcNaYwXkY7GeNg59uD8OrIzZzXWCX/29eky5NOyvUKe'),
(13, 'james2', 'shine', 'jam2@gmail.com', 0x616c6f6e736f2d74616c626572742d73364469444d4c4b306a6b2d756e73706c6173682e6a7067, 'tutor', '$2y$10$Y00gVyhrQLEMCHCEAaNe4.VMa/JKz7UVctII5WThotGBSLYhu3aK.', '$2y$10$Y00gVyhrQLEMCHCEAaNe4.VMa/JKz7UVctII5WThotGBSLYhu3aK.');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `course_list`
--
ALTER TABLE `course_list`
  ADD PRIMARY KEY (`course_id`);

--
-- Indexes for table `course_reviews`
--
ALTER TABLE `course_reviews`
  ADD PRIMARY KEY (`review_id`);

--
-- Indexes for table `enrolled_courses`
--
ALTER TABLE `enrolled_courses`
  ADD PRIMARY KEY (`enrollment_id`);

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
  MODIFY `course_id` int(25) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `course_reviews`
--
ALTER TABLE `course_reviews`
  MODIFY `review_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `enrolled_courses`
--
ALTER TABLE `enrolled_courses`
  MODIFY `enrollment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `inguiry_list`
--
ALTER TABLE `inguiry_list`
  MODIFY `inquiry_id` int(25) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `registration`
--
ALTER TABLE `registration`
  MODIFY `tutor_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
