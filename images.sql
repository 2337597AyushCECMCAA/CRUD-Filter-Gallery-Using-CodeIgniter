-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 03, 2024 at 03:02 PM
-- Server version: 8.0.35
-- PHP Version: 7.3.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `codeigniter`
--

-- --------------------------------------------------------

--
-- Table structure for table `images`
--

CREATE TABLE `images` (
  `id` int NOT NULL,
  `title` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL,
  `file_name` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL,
  `created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `modified` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `status` tinyint(1) NOT NULL DEFAULT '1' COMMENT '1=Active, 0=Inactive'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

--
-- Dumping data for table `images`
--

INSERT INTO `images` (`id`, `title`, `file_name`, `created`, `modified`, `status`) VALUES
(1, 'Let\'s Login ok', '1.png', '2024-07-30 11:12:52', '2024-07-30 11:24:53', 1),
(2, 'Programming is Jamming', '3.jpg', '2024-07-30 11:24:09', '2024-07-30 11:24:09', 1),
(4, 'code kare pura din', '4.png', '2024-07-30 13:51:53', '2024-07-30 13:51:53', 1),
(6, 'code kruga jee bhar ke', '7.jpeg', '2024-07-30 13:55:04', '2024-07-30 13:55:04', 1),
(7, 'Programmer Hoon Mai', '5.jpg', '2024-07-30 13:55:20', '2024-07-30 13:55:20', 1),
(8, 'no crying only coding', '8.jpg', '2024-07-30 14:11:52', '2024-07-30 14:11:52', 1),
(10, 'dare hai ...code kare hai', '9.png', '2024-07-30 14:14:44', '2024-07-30 14:14:44', 1),
(11, 'hello world', '10.jpg', '2024-07-30 14:16:09', '2024-07-30 14:16:09', 1),
(12, 'Hacker hai bhai hacker', '2.jpg', '2024-07-31 08:57:17', '2024-07-31 08:57:17', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `images`
--
ALTER TABLE `images`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `images`
--
ALTER TABLE `images`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
