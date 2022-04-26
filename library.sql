-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Apr 26, 2022 at 09:24 AM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `library`
--

-- --------------------------------------------------------

--
-- Table structure for table `analyst`
--

CREATE TABLE `analyst` (
  `id` int(11) NOT NULL,
  `file_id` int(11) NOT NULL,
  `rtbu_by_user_id` text NOT NULL,
  `status` varchar(20) NOT NULL,
  `note` text NOT NULL,
  `created_at` date NOT NULL,
  `update_at` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `assignment`
--

CREATE TABLE `assignment` (
  `id` int(11) NOT NULL,
  `file_id` int(11) NOT NULL,
  `version` int(11) DEFAULT NULL,
  `production_year` text DEFAULT NULL,
  `created_by_user_id` text NOT NULL,
  `file_size` text NOT NULL,
  `duration` text DEFAULT NULL,
  `length` text DEFAULT NULL,
  `url` text NOT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `update_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `assignment`
--

INSERT INTO `assignment` (`id`, `file_id`, `version`, `production_year`, `created_by_user_id`, `file_size`, `duration`, `length`, `url`, `created_at`, `update_at`) VALUES
(1, 1, 0, '2022', 'user1', '8490194', '3 Menit ', '8', 'uploads/video-6253a8cbb65403.53489228.mp4', '2022-04-11 04:04:27', NULL),
(3, 3, 0, '2022', '', 'null', '1 Menit 2 Detik ', '10', '', '2022-04-13 04:21:13', NULL),
(4, 4, 0, '2022', '', 'null', '3 Detik ', '10', '', '2022-04-18 01:37:35', NULL),
(5, 5, 0, '2022', '', 'null', '23 Detik ', '10', '', '2022-04-18 02:37:05', NULL),
(6, 6, 0, '2022', '', 'null', '15 Detik ', '10', '', '2022-04-18 02:37:48', NULL),
(10, 10, 0, '2022', '', '40739', '50 Menit', '8', 'uploads/image-0_6262308995a6d1.55927672.jpeg', '2022-04-22 04:35:21', NULL),
(11, 11, 0, '2022', '', '51467', '', '8', '', '2022-04-22 04:35:56', NULL),
(12, 12, 0, '2022', '', '51572', '', '8', '', '2022-04-22 04:36:48', NULL),
(13, 13, 0, '2022', 'Admin1', '8490194', '5 Menit ', '8', 'uploads/video-62651e89b32539.18576548.mp4', '2022-04-24 09:55:21', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `files`
--

CREATE TABLE `files` (
  `id` int(255) NOT NULL,
  `author` text NOT NULL,
  `judul` text NOT NULL,
  `file_type_id` text NOT NULL,
  `kategori` varchar(25) NOT NULL,
  `isi` text NOT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `update_at` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `files`
--

INSERT INTO `files` (`id`, `author`, `judul`, `file_type_id`, `kategori`, `isi`, `created_at`, `update_at`) VALUES
(1, 'user1', 'tutor_upload_git_di_mac.mp4', 'video', 'PD', 'video-6253a8cbb65403.53489228.mp4', '2022-04-11 04:04:27', NULL),
(3, 'user1', 'test2', 'Artikel', '', '<p>test2</p>', '2022-04-13 04:21:13', NULL),
(4, 'user1', 'test_3', 'Artikel', 'CI', '<p>Test_3</p>', '2022-04-18 01:37:35', NULL),
(5, 'user1', 'test_5', 'Artikel', '', '<p>test_5</p>', '2022-04-18 02:37:05', NULL),
(6, 'user1', 'test_6', 'Artikel', 'Creative Innovation', '<p>test_6</p>', '2022-04-18 02:37:48', NULL),
(10, '', 'img', 'image', '', 'image-0_6262308995a6d1.55927672.jpeg', '2022-04-22 04:35:21', NULL),
(11, '', '', 'document', 'Management Leadership', 'document-626230ac1123a2.77038953.pdf', '2022-04-22 04:35:56', NULL),
(12, '', '', 'document', 'Management Leadership', 'document-626230e0de6d77.41284779.pdf', '2022-04-22 04:36:48', NULL),
(13, 'Admin1', 'Test_10', 'video', 'Management Leadership', 'video-62651e89b32539.18576548.mp4', '2022-04-24 09:55:21', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `file_Type`
--

CREATE TABLE `file_Type` (
  `id` int(255) NOT NULL,
  `jenis` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(255) NOT NULL,
  `username` text NOT NULL,
  `password` text NOT NULL,
  `fullname` text NOT NULL,
  `created_at` text DEFAULT NULL,
  `update_at` text DEFAULT NULL,
  `user_type` varchar(20) NOT NULL DEFAULT 'user'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `fullname`, `created_at`, `update_at`, `user_type`) VALUES
(1, 'admin1', '$2y$10$Gs0CmqYfE7LAEwmMw8FfoOqEoPeZKkv2BRZ59cuFZwmO.H68GUNFm', 'admin1', '08:51 AM 11/03/2022', NULL, 'admin'),
(2, 'user1', '$2y$10$UZ4FX1SGMEuNvcUhKsKEc.njVVc.bDpYyXJ9BayLx7ILcd0sLoqly', 'user1', '09:01 AM 11/03/2022', NULL, 'user'),
(6, 'admin2', '$2y$10$40rzHShbrVRYTA1Fwmuuzu8wp67thAyNtQZ80wtQtPQ2fPd8DqH8K', 'admin2', '09:25 AM 14/03/2022', NULL, 'admin'),
(8, 'user2', '$2y$10$WZPXduEAXAWoFU0PVf9HseM5vsGPjPBgMYZ40nkVXoxfwBCNDBYFO', 'user2', '10:21 AM 21/03/2022', NULL, 'user');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `analyst`
--
ALTER TABLE `analyst`
  ADD PRIMARY KEY (`id`),
  ADD KEY `analyst_ibfk_1` (`file_id`);

--
-- Indexes for table `assignment`
--
ALTER TABLE `assignment`
  ADD PRIMARY KEY (`id`),
  ADD KEY `assignment_ibfk_1` (`file_id`);

--
-- Indexes for table `files`
--
ALTER TABLE `files`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `file_Type`
--
ALTER TABLE `file_Type`
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
-- AUTO_INCREMENT for table `analyst`
--
ALTER TABLE `analyst`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `assignment`
--
ALTER TABLE `assignment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `files`
--
ALTER TABLE `files`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `analyst`
--
ALTER TABLE `analyst`
  ADD CONSTRAINT `analyst_ibfk_1` FOREIGN KEY (`file_id`) REFERENCES `files` (`id`) ON UPDATE CASCADE;

--
-- Constraints for table `assignment`
--
ALTER TABLE `assignment`
  ADD CONSTRAINT `assignment_ibfk_1` FOREIGN KEY (`file_id`) REFERENCES `files` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
