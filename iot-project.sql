-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jan 04, 2024 at 12:55 PM
-- Server version: 8.0.30
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `iot-project`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `AdminID` int NOT NULL,
  `Username` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `Password` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`AdminID`, `Username`, `Password`) VALUES
(1, 'admin', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `data_sensor`
--

CREATE TABLE `data_sensor` (
  `sensorID` int NOT NULL,
  `temperatur` double NOT NULL,
  `clarity` double NOT NULL,
  `water_level` double NOT NULL,
  `timestamp` timestamp NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `data_sensor`
--

INSERT INTO `data_sensor` (`sensorID`, `temperatur`, `clarity`, `water_level`, `timestamp`) VALUES
(22, 28, 2, 20, '2023-12-24 11:02:57'),
(23, 28, 1, 25, '2023-11-24 11:01:28'),
(24, 25, 1, 20, '2023-10-24 11:01:28'),
(25, 25, 2, 25, '2023-09-24 11:01:28'),
(26, 28, 9, 23, '2023-08-24 11:01:28'),
(27, 32, 2, 25, '2023-07-24 11:01:28'),
(28, 29, 5, 28, '2023-06-24 11:01:28'),
(29, 34, 5, 32, '2023-05-24 11:01:28'),
(30, 21, 3, 15, '2023-04-24 11:01:28'),
(31, 34, 1, 20, '2023-03-24 11:01:28'),
(32, 28, 2, 25, '2023-12-24 11:05:52'),
(33, 27, 1, 25, '2023-02-24 11:07:53'),
(34, 28, 9, 23, '2023-01-24 11:07:53'),
(35, 32, 2, 20, '2023-01-25 08:45:52'),
(36, -127, 25, 0, '2023-12-31 22:47:49'),
(37, -127, 57, 0, '2023-12-31 22:47:50'),
(38, -127, 29, 0, '2023-12-31 22:47:50'),
(39, -127, 60, 0, '2023-12-31 22:47:50'),
(40, -127, 32, 0, '2023-12-31 22:47:51'),
(41, -127, 60, 0, '2023-12-31 22:47:52'),
(42, -127, 34, 0, '2023-12-31 22:47:53'),
(43, -127, 62, 0, '2023-12-31 22:47:54'),
(44, -127, 35, 0, '2023-12-31 22:47:55'),
(45, -127, 64, 0, '2023-12-31 22:47:55'),
(46, -127, 37, 0, '2023-12-31 22:47:56'),
(47, -127, 64, 0, '2023-12-31 22:47:57'),
(48, -127, 1, 0, '2023-12-31 22:47:58'),
(49, -127, 11, 0, '2023-12-31 22:47:59'),
(50, -127, 0, 0, '2023-12-31 22:48:00'),
(51, -127, 6, 0, '2023-12-31 22:48:00'),
(52, -127, 0, 0, '2023-12-31 22:48:01'),
(53, -127, 0, 0, '2023-12-31 22:48:02'),
(54, -127, 9, 0, '2023-12-31 22:48:03'),
(55, -127, 19, 0, '2023-12-31 22:48:04'),
(56, -127, 39, 0, '2023-12-31 22:48:05'),
(57, -127, 25, 0, '2023-12-31 22:48:05'),
(58, -127, 39, 0, '2023-12-31 22:48:06'),
(59, -127, 59, 0, '2023-12-31 22:48:07'),
(60, -127, 29, 0, '2023-12-31 22:48:08'),
(61, -127, 55, 0, '2023-12-31 22:48:09'),
(62, -127, 29, 0, '2023-12-31 22:48:10'),
(63, -127, 47, 0, '2023-12-31 22:48:10'),
(64, -127, 28, 0, '2023-12-31 22:48:11'),
(65, -127, 38, 0, '2023-12-31 22:48:12'),
(66, -127, 61, 0, '2023-12-31 22:48:13'),
(67, -127, 28, 0, '2023-12-31 22:48:14'),
(68, -127, 51, 0, '2023-12-31 22:48:15'),
(69, -127, 0, 0, '2023-12-31 22:48:15'),
(70, -127, 8, 0, '2023-12-31 22:48:16'),
(71, -127, 10, 0, '2023-12-31 22:48:17'),
(72, -127, 0, 0, '2023-12-31 22:48:18'),
(73, -127, 0, 0, '2023-12-31 22:48:19'),
(74, -127, 6, 0, '2023-12-31 22:48:19'),
(75, -127, 0, 0, '2023-12-31 22:48:20'),
(76, -127, 0, 0, '2023-12-31 22:48:21'),
(77, -127, 0, 0, '2023-12-31 22:48:22'),
(78, -127, 8, 0, '2023-12-31 22:48:23'),
(79, -127, 20, 0, '2023-12-31 22:48:24'),
(80, -127, 32, 0, '2023-12-31 22:48:25'),
(81, -127, 57, 0, '2023-12-31 22:48:25'),
(82, -127, 28, 0, '2023-12-31 22:48:26'),
(83, -127, 53, 0, '2023-12-31 22:48:27'),
(84, -127, 28, 0, '2023-12-31 22:48:28'),
(85, -127, 45, 0, '2023-12-31 22:48:29'),
(86, -127, 28, 0, '2023-12-31 22:48:29'),
(87, -127, 38, 0, '2023-12-31 22:48:30'),
(88, -127, 58, 0, '2023-12-31 22:48:31'),
(89, -127, 29, 0, '2023-12-31 22:48:34'),
(90, -127, 27, 0, '2023-12-31 22:48:34'),
(91, -127, 29, 0, '2023-12-31 22:48:34'),
(92, -127, 30, 0, '2023-12-31 22:48:35'),
(93, -127, 27, 0, '2023-12-31 22:48:36'),
(94, -127, 34, 0, '2023-12-31 22:48:36'),
(95, -127, 58, 0, '2023-12-31 22:48:37'),
(96, -127, 28, 0, '2023-12-31 22:48:38'),
(97, -127, 38, 0, '2023-12-31 22:48:39'),
(98, -127, 0, 0, '2023-12-31 22:48:39'),
(99, -127, 0, 0, '2023-12-31 22:48:40'),
(100, -127, 0, 0, '2023-12-31 22:48:42'),
(101, -127, 0, 0, '2023-12-31 22:48:43'),
(102, -127, 5, 0, '2023-12-31 22:48:43'),
(103, -127, 9, 0, '2023-12-31 22:48:44'),
(104, -127, 15, 0, '2023-12-31 22:48:45'),
(105, -127, 37, 0, '2023-12-31 22:48:46'),
(106, -127, 25, 0, '2023-12-31 22:48:47'),
(107, -127, 43, 0, '2023-12-31 22:48:48'),
(108, -127, 32, 0, '2023-12-31 22:48:49'),
(109, -127, 57, 0, '2023-12-31 22:48:50'),
(110, -127, 29, 0, '2023-12-31 22:48:51'),
(111, -127, 49, 0, '2023-12-31 22:48:52'),
(112, -127, 61, 0, '2023-12-31 22:48:53'),
(113, -127, 37, 0, '2023-12-31 22:48:53'),
(114, -127, 59, 0, '2023-12-31 22:48:54'),
(115, -127, 29, 0, '2023-12-31 22:48:55'),
(116, -127, 51, 0, '2023-12-31 22:48:56'),
(117, -127, 4, 0, '2023-12-31 22:48:57'),
(118, -127, 0, 0, '2023-12-31 22:48:57'),
(119, -127, 9, 0, '2023-12-31 22:48:58'),
(120, -127, 10, 0, '2023-12-31 22:48:59'),
(121, -127, 0, 0, '2023-12-31 22:49:00'),
(122, -127, 6, 0, '2023-12-31 22:49:01'),
(123, -127, 9, 0, '2023-12-31 22:49:02'),
(124, -127, 0, 0, '2023-12-31 22:49:03'),
(125, -127, 4, 0, '2023-12-31 22:49:03'),
(126, -127, 18, 0, '2023-12-31 22:49:04'),
(127, -127, 23, 0, '2023-12-31 22:49:05'),
(128, -127, 26, 0, '2023-12-31 22:49:06'),
(129, -127, 24, 0, '2023-12-31 22:49:07'),
(130, -127, 20, 0, '2023-12-31 22:49:08'),
(131, -127, 23, 0, '2023-12-31 22:49:08'),
(132, -127, 20, 0, '2023-12-31 22:49:09'),
(133, -127, 23, 0, '2023-12-31 22:49:10'),
(134, -127, 25, 0, '2023-12-31 22:49:11'),
(135, -127, 22, 0, '2023-12-31 22:49:12'),
(136, -127, 25, 0, '2023-12-31 22:49:12'),
(137, -127, 22, 0, '2023-12-31 22:49:13'),
(138, -127, 24, 0, '2023-12-31 22:49:14'),
(139, -127, 0, 0, '2023-12-31 22:49:15'),
(140, -127, 0, 0, '2023-12-31 22:49:16'),
(141, -127, 0, 0, '2023-12-31 22:49:17'),
(142, -127, 0, 0, '2023-12-31 22:49:17'),
(143, -127, 0, 0, '2023-12-31 22:49:18'),
(144, -127, 0, 0, '2023-12-31 22:49:19'),
(145, -127, 0, 0, '2023-12-31 22:49:20'),
(146, -127, 2, 0, '2023-12-31 22:49:21'),
(147, -127, 12, 0, '2023-12-31 22:49:22'),
(148, -127, 18, 0, '2023-12-31 22:49:23'),
(149, -127, 21, 0, '2023-12-31 22:49:23'),
(150, -127, 0, 0, '2023-12-31 22:49:34'),
(151, -127, 0, 0, '2023-12-31 22:49:35'),
(152, -127, 0, 0, '2023-12-31 22:49:36'),
(153, -127, 0, 0, '2023-12-31 22:49:36'),
(154, -127, 0, 0, '2023-12-31 22:49:37'),
(155, -127, 10, 0, '2023-12-31 22:49:38'),
(156, -127, 19, 0, '2023-12-31 22:49:39'),
(157, -127, 19, 0, '2023-12-31 22:49:40'),
(158, -127, 23, 0, '2023-12-31 22:49:41'),
(159, -127, 22, 0, '2023-12-31 22:49:42'),
(160, -127, 27, 0, '2023-12-31 22:49:42'),
(161, -127, 25, 0, '2023-12-31 22:49:43'),
(162, -127, 23, 0, '2023-12-31 22:49:44'),
(163, -127, 23, 0, '2023-12-31 22:49:45'),
(164, -127, 26, 0, '2023-12-31 22:49:46'),
(165, -127, 23, 0, '2023-12-31 22:49:47'),
(166, -127, 20, 0, '2023-12-31 22:49:47'),
(167, -127, 24, 0, '2023-12-31 22:49:48'),
(168, -127, 0, 0, '2023-12-31 22:49:49'),
(169, -127, 0, 0, '2023-12-31 22:49:50'),
(170, -127, 0, 0, '2023-12-31 22:49:51'),
(171, -127, 0, 0, '2023-12-31 22:49:52'),
(172, -127, 0, 0, '2023-12-31 22:49:52'),
(173, -127, 0, 0, '2023-12-31 22:49:53'),
(174, -127, 6, 0, '2023-12-31 22:49:54'),
(175, -127, 16, 0, '2023-12-31 22:49:55'),
(176, -127, 15, 0, '2023-12-31 22:49:56'),
(177, -127, 18, 0, '2023-12-31 22:49:56'),
(178, -127, 23, 0, '2023-12-31 22:49:57'),
(179, -127, 22, 0, '2023-12-31 22:49:58'),
(180, -127, 26, 0, '2023-12-31 22:49:59'),
(181, -127, 28, 0, '2023-12-31 22:50:00'),
(182, -127, 49, 0, '2023-12-31 22:50:01'),
(183, -127, 28, 0, '2023-12-31 22:50:01'),
(184, -127, 53, 0, '2023-12-31 22:50:03'),
(185, -127, 28, 0, '2023-12-31 22:50:03'),
(186, -127, 53, 0, '2023-12-31 22:50:04'),
(187, -127, 26, 0, '2023-12-31 22:50:05'),
(188, -127, 57, 0, '2023-12-31 22:50:06'),
(189, -127, 0, 0, '2023-12-31 22:50:06'),
(190, -127, 9, 0, '2023-12-31 22:50:07'),
(191, -127, 0, 0, '2023-12-31 22:50:08'),
(192, -127, 6, 0, '2023-12-31 22:50:09'),
(193, -127, 0, 0, '2023-12-31 22:50:10'),
(194, -127, 15, 0, '2023-12-31 22:50:11'),
(195, -127, 20, 0, '2023-12-31 22:50:11'),
(196, -127, 43, 0, '2023-12-31 22:50:12'),
(197, -127, 24, 0, '2023-12-31 22:50:13'),
(198, -127, 52, 0, '2023-12-31 22:50:14'),
(199, -127, 27, 0, '2023-12-31 22:50:15'),
(200, -127, 53, 0, '2023-12-31 22:50:16'),
(201, -127, 28, 0, '2023-12-31 22:50:16'),
(202, -127, 57, 0, '2023-12-31 22:50:17'),
(203, -127, 26, 0, '2023-12-31 22:50:20'),
(204, -127, 58, 0, '2023-12-31 22:50:21'),
(205, -127, 28, 0, '2023-12-31 22:50:21'),
(206, -127, 28, 0, '2023-12-31 22:50:25'),
(207, -127, 28, 0, '2023-12-31 22:51:43'),
(208, -127, 28, 0, '2023-12-31 22:51:51'),
(209, -127, 28, 0, '2023-12-31 22:51:53'),
(210, -127, 28, 0, '2023-12-31 22:52:01'),
(211, -127, 28, 0, '2023-12-31 22:52:07'),
(212, -127, 28, 0, '2023-12-31 22:52:16'),
(213, -127, 28, 0, '2023-12-31 22:52:32'),
(214, -127, 28, 0, '2023-12-31 22:52:36'),
(215, -127, 28, 0, '2023-12-31 22:53:11'),
(216, -127, 28, 0, '2023-12-31 22:53:16'),
(217, -127, 28, 0, '2023-12-31 22:53:53'),
(218, -127, 28, 0, '2023-12-31 22:58:47'),
(219, -127, 28, 0, '2023-12-31 23:00:43'),
(220, -127, 28, 0, '2023-12-31 23:01:16'),
(221, -127, 28, 0, '2023-12-31 23:02:14'),
(222, -127, 28, 0, '2023-12-31 23:02:21'),
(223, -127, 28, 0, '2023-12-31 23:07:13'),
(224, -127, 28, 0, '2023-12-31 23:15:03'),
(225, -127, 28, 0, '2023-12-31 23:15:51'),
(226, -127, 28, 0, '2023-12-31 23:16:24'),
(227, -127, 28, 0, '2023-12-31 23:17:52'),
(228, -127, 28, 0, '2023-12-31 23:19:43'),
(229, -127, 28, 0, '2023-12-31 23:22:34'),
(230, -127, 28, 0, '2023-12-31 23:22:43'),
(231, -127, 28, 0, '2023-12-31 23:31:43'),
(232, -127, 28, 0, '2023-12-31 23:32:52'),
(233, -127, 28, 0, '2023-12-31 23:48:00'),
(234, -127, 28, 0, '2023-12-31 23:48:02'),
(235, -127, 37, 0, '2024-01-03 07:54:22'),
(236, -127, 37, 0, '2024-01-03 07:57:25'),
(237, -127, 37, 0, '2024-01-03 07:57:50'),
(238, -127, 37, 0, '2024-01-03 07:59:14'),
(239, -127, 37, 0, '2024-01-03 07:59:40'),
(240, -127, 37, 0, '2024-01-03 08:01:51'),
(241, -127, 37, 0, '2024-01-03 08:03:39'),
(242, -127, 37, 0, '2024-01-03 08:05:08');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`AdminID`);

--
-- Indexes for table `data_sensor`
--
ALTER TABLE `data_sensor`
  ADD PRIMARY KEY (`sensorID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `AdminID` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `data_sensor`
--
ALTER TABLE `data_sensor`
  MODIFY `sensorID` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=243;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
