-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 03, 2024 at 08:03 PM
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
-- Database: `first_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `list_tbl`
--

CREATE TABLE `list_tbl` (
  `id` int(11) NOT NULL,
  `details` text NOT NULL,
  `date_posted` varchar(30) NOT NULL,
  `time_posted` time NOT NULL,
  `date_edited` varchar(30) NOT NULL,
  `time_edited` time NOT NULL,
  `public` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `list_tbl`
--

INSERT INTO `list_tbl` (`id`, `details`, `date_posted`, `time_posted`, `date_edited`, `time_edited`, `public`) VALUES
(1, 'Good day V.2 public', 'May 03, 2024', '16:21:06', 'May 03, 2024', '19:21:47', 'yes'),
(2, 'Good morning', 'May 03, 2024', '16:55:31', 'May 03, 2024', '19:21:07', 'no'),
(3, 'Good afternoon V.2', 'May 03, 2024', '16:55:40', 'May 03, 2024', '18:36:20', 'no'),
(4, 'Good evening V.2', 'May 03, 2024', '16:55:55', 'May 03, 2024', '18:33:27', 'yes');

-- --------------------------------------------------------

--
-- Table structure for table `users_tbl`
--

CREATE TABLE `users_tbl` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users_tbl`
--

INSERT INTO `users_tbl` (`id`, `username`, `password`) VALUES
(1, 'jungkook', '123'),
(2, 'seokjin', '123'),
(3, 'taehyung', '123'),
(4, 'jimin', '123');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `list_tbl`
--
ALTER TABLE `list_tbl`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users_tbl`
--
ALTER TABLE `users_tbl`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `list_tbl`
--
ALTER TABLE `list_tbl`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users_tbl`
--
ALTER TABLE `users_tbl`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
