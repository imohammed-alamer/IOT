-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 17, 2020 at 01:36 PM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.2.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `home_maintenance`
--

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` int(11) NOT NULL,
  `writer_id` int(11) NOT NULL,
  `status` varchar(50) NOT NULL DEFAULT 'Unapproved',
  `body` text NOT NULL,
  `solution_id` int(11) NOT NULL,
  `date_created` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `writer_id`, `status`, `body`, `solution_id`, `date_created`) VALUES
(8, 20, 'Unapproved', 'jjjjjjjjjjjjj', 14, '2020-10-14 19:27:12'),
(10, 20, 'Unapproved', 'بيسبيسبيس', 14, '2020-10-14 19:28:38'),
(11, 20, 'Unapproved', 'لبيلبيلبي', 14, '2020-10-14 19:28:47'),
(12, 20, 'Unapproved', 'gfdgfdg', 14, '2020-10-14 19:33:03'),
(13, 20, 'Approved', 'hhhhhhhhhhhhhh', 14, '2020-10-14 19:33:32'),
(14, 21, 'Approved', 'fdsfds', 15, '2020-10-15 01:21:14');

-- --------------------------------------------------------

--
-- Table structure for table `departments`
--

CREATE TABLE `departments` (
  `dep_id` int(10) NOT NULL,
  `dep_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `departments`
--

INSERT INTO `departments` (`dep_id`, `dep_name`) VALUES
(1, 'electricity');

-- --------------------------------------------------------

--
-- Table structure for table `request_solution`
--

CREATE TABLE `request_solution` (
  `id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `role_id` int(10) NOT NULL,
  `role_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`role_id`, `role_name`) VALUES
(1, 'Home Owner'),
(2, 'Technician');

-- --------------------------------------------------------

--
-- Table structure for table `solution`
--

CREATE TABLE `solution` (
  `solution_id` int(10) NOT NULL,
  `title` text NOT NULL,
  `tools` text NOT NULL,
  `post` longtext NOT NULL,
  `author` int(10) NOT NULL,
  `dep_id` int(10) NOT NULL,
  `post_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `solution`
--

INSERT INTO `solution` (`solution_id`, `title`, `tools`, `post`, `author`, `dep_id`, `post_date`) VALUES
(14, 'fdsfds', 'fdsfds', '<p>fdsssssssssssssssssssssss</p>', 20, 1, '2020-10-14 18:13:32'),
(15, 'Covid-19', 'z z x cx', '<p>fdssssssssssssssssssss</p>\r\n<p>fdssssssssssssssssssss</p>\r\n<p>fdssssssssssssssssssss</p>\r\n<p>fdssssssssssssssssssss</p>\r\n<p>fdssssssssssssssssssss</p>\r\n<p>fdssssssssssssssssssss</p>\r\n<p>fdssssssssssssssssssss</p>', 21, 1, '2020-10-15 12:24:18');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `role_id` int(10) NOT NULL,
  `image_path` varchar(255) DEFAULT NULL,
  `date_created` datetime DEFAULT NULL,
  `level` int(11) NOT NULL DEFAULT 2
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`, `role_id`, `image_path`, `date_created`, `level`) VALUES
(20, 'admin', 'amead18@hotmail.com', '21232f297a57a5a743894a0e4a801fc3', 2, 'image/Screenshot_10.png', '2020-10-14 18:13:22', 1),
(21, '77', 'hasanxgamer18@gmail.com', '28dd2c7955ce926456240b2ff0100bde', 1, NULL, '2020-10-15 01:20:45', 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `writer_id` (`writer_id`),
  ADD KEY `solution_id` (`solution_id`) USING BTREE;

--
-- Indexes for table `departments`
--
ALTER TABLE `departments`
  ADD PRIMARY KEY (`dep_id`);

--
-- Indexes for table `request_solution`
--
ALTER TABLE `request_solution`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`role_id`);

--
-- Indexes for table `solution`
--
ALTER TABLE `solution`
  ADD PRIMARY KEY (`solution_id`),
  ADD KEY `dep_id` (`dep_id`),
  ADD KEY `author` (`author`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `role_id` (`role_id`),
  ADD KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `departments`
--
ALTER TABLE `departments`
  MODIFY `dep_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `request_solution`
--
ALTER TABLE `request_solution`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `solution`
--
ALTER TABLE `solution`
  MODIFY `solution_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `comments_ibfk_1` FOREIGN KEY (`writer_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `comments_ibfk_2` FOREIGN KEY (`solution_id`) REFERENCES `solution` (`solution_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `solution`
--
ALTER TABLE `solution`
  ADD CONSTRAINT `solution_ibfk_1` FOREIGN KEY (`dep_id`) REFERENCES `departments` (`dep_id`),
  ADD CONSTRAINT `solution_ibfk_2` FOREIGN KEY (`author`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`role_id`) REFERENCES `roles` (`role_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
