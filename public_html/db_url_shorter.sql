-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: db
-- Generation Time: Sep 05, 2021 at 04:59 AM
-- Server version: 5.7.34
-- PHP Version: 7.4.20

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_url_shorter`
--

-- --------------------------------------------------------

--
-- Table structure for table `url`
--

CREATE TABLE `url` (
  `idurl` int(11) NOT NULL,
  `url` char(145) COLLATE utf8mb4_unicode_ci NOT NULL,
  `shorter_url` char(8) COLLATE utf8mb4_unicode_ci NOT NULL,
  `redirect_limit` int(11) NOT NULL,
  `shorter_url_lifetime` int(11) NOT NULL,
  `time_create` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `url`
--

INSERT INTO `url` (`idurl`, `url`, `shorter_url`, `redirect_limit`, `shorter_url_lifetime`, `time_create`) VALUES
(1, 'https://stackoverflow.com/', 'f5678fgf', 4, 3, '2021-09-05 02:07:55'),
(2, 'https://stackoverflow.com/', 'sdty7890', 3, 5, '2021-09-05 02:07:48'),
(5, 'https://tokmakov.msk.ru/', 'kkyuiop8', 4, 5, '2021-09-06 02:07:33'),
(10, 'https://code.tutsplus.com/', 'fMM0yDsb', 44, 4, '2021-09-04 02:07:21'),
(11, 'https://itreviewchannel.ru/zagotovka-docker-compose-yml-dlya-yii2/', '498GF6VO', 6, 7, '2021-09-05 02:07:10'),
(12, 'https://yiiframework.com.ua/ru/doc/guide/2/db-active-record/', 'Y6mcmFMU', 6, 1, '2021-09-04 23:04:18'),
(13, 'https://yiiframework.com.ua/ru/doc/guide/2/db-active-record/', 'bMPc4dLj', 5, 24, '2021-09-05 00:18:46'),
(14, 'https://yiiframework.com.ua/ru/doc/guide/2/db-active-record/', 'xzGR8BFb', 0, 5, '2021-09-05 00:19:48'),
(15, 'https://www.i.ua/', 'Hc2jLz5L', 0, 1, '2021-09-05 04:35:23'),
(16, 'https://stackoverflow.com/', 'TLmC9ulP', 5, 23, '2021-09-05 04:36:06'),
(17, 'https://stackoverflow.com/', 'JzU24kzT', 5, 6, '2021-09-05 04:40:20'),
(18, 'https://stackoverflow.com/', 'JL2hcQzm', 5, 24, '2021-09-05 04:46:28'),
(19, 'https://stackoverflow.com/', 'HIZ2OQym', 5, 24, '2021-09-05 04:46:48'),
(20, 'https://stackoverflow.com/', 'MViEEQav', 5, 1, '2021-09-05 04:47:38');

-- --------------------------------------------------------

--
-- Table structure for table `url_transitions`
--

CREATE TABLE `url_transitions` (
  `id_url_transitions` int(11) NOT NULL,
  `url_idurl` int(11) NOT NULL,
  `entry_time` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `url_transitions`
--

INSERT INTO `url_transitions` (`id_url_transitions`, `url_idurl`, `entry_time`) VALUES
(1, 11, '2021-09-04 17:18:10'),
(2, 10, '2021-09-04 17:19:45'),
(3, 11, '2021-09-04 17:20:25'),
(4, 11, '2021-09-04 17:34:16'),
(5, 10, '2021-09-04 18:27:02'),
(6, 11, '2021-09-04 18:32:49'),
(7, 5, '2021-09-04 18:36:09'),
(8, 5, '2021-09-04 18:52:35'),
(9, 10, '2021-09-04 19:00:55'),
(10, 11, '2021-09-04 19:11:54'),
(11, 2, '2021-09-04 19:12:33'),
(12, 5, '2021-09-04 19:13:38'),
(13, 1, '2021-09-04 19:37:58'),
(14, 2, '2021-09-04 19:40:21'),
(15, 2, '2021-09-04 19:40:29'),
(16, 11, '2021-09-04 19:50:25'),
(17, 5, '2021-09-04 20:12:11'),
(18, 1, '2021-09-04 20:49:56'),
(19, 1, '2021-09-04 21:28:06'),
(20, 1, '2021-09-04 21:29:07'),
(21, 10, '2021-09-04 21:29:32'),
(22, 10, '2021-09-04 22:51:32'),
(23, 12, '2021-09-04 23:41:02'),
(24, 12, '2021-09-04 23:52:02'),
(25, 12, '2021-09-04 23:53:27'),
(26, 14, '2021-09-05 04:16:10'),
(27, 14, '2021-09-05 04:18:52'),
(28, 20, '2021-09-05 04:47:48');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `url`
--
ALTER TABLE `url`
  ADD PRIMARY KEY (`idurl`),
  ADD UNIQUE KEY `shorter_url_UNIQUE` (`shorter_url`);

--
-- Indexes for table `url_transitions`
--
ALTER TABLE `url_transitions`
  ADD PRIMARY KEY (`id_url_transitions`),
  ADD KEY `fk_url_transitions_url_idx` (`url_idurl`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `url`
--
ALTER TABLE `url`
  MODIFY `idurl` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `url_transitions`
--
ALTER TABLE `url_transitions`
  MODIFY `id_url_transitions` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `url_transitions`
--
ALTER TABLE `url_transitions`
  ADD CONSTRAINT `fk_url_transitions_url` FOREIGN KEY (`url_idurl`) REFERENCES `url` (`idurl`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
