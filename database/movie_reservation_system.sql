-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 26, 2024 at 12:29 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `movie_reservation_system`
--

-- --------------------------------------------------------

--
-- Table structure for table `movies`
--

CREATE TABLE `movies` (
  `id` int(11) NOT NULL,
  `title` varchar(100) NOT NULL,
  `description` text NOT NULL,
  `viewTime` datetime NOT NULL,
  `image` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `movies`
--

INSERT INTO `movies` (`id`, `title`, `description`, `viewTime`, `image`) VALUES
(2, 'Rariya', 'Ya fasa aurenta a ranar bikin bayan asirinta ya tonu, kuma a madadinta ya auri kawarta ta kud da kud. Fim din ya nuna girman nisan da wasu mata ke dauka don cimma bukatunsu.', '0000-00-00 00:00:00', 'football-157930_1280.png'),
(3, 'Trigger Warning', 'A skilled Special Forces commando (Jessica Alba) takes ownership of her father\'s bar after he sudden', '2024-06-29 00:00:00', 'pic.jpg'),
(4, 'Labarina', 'Hausa film by aminu saira', '2024-08-18 00:00:00', '1721897305409 (1).jpeg');

-- --------------------------------------------------------

--
-- Table structure for table `newuser_tbl`
--

CREATE TABLE `newuser_tbl` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `newuser_tbl`
--

INSERT INTO `newuser_tbl` (`id`, `username`, `password`) VALUES
(1, 'iamusman', '12345'),
(2, 'dandawaki', '123456789'),
(3, 'wasso', '$2y$10$0cK3Bvb7z058FyZTN1GLyewPyUQCKQL.QJwoSNsInEbQtFW1PehoO'),
(4, 'iamUsmanShehu', '$2y$10$oaYy5ITvUF8qvtsi2LLfc.d7aDM9vF9dCOrZA6TKRtRoFyXzsVKP6'),
(5, 'musadkd', '$2y$10$HlwxGqljp/KmpvNXZ0TRfudN5njUx4c33exHbmfLFv4Kit3nutSnq');

-- --------------------------------------------------------

--
-- Table structure for table `tickets`
--

CREATE TABLE `tickets` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `seat_no` varchar(10) NOT NULL,
  `block` varchar(50) NOT NULL,
  `purchase_time` timestamp NOT NULL DEFAULT current_timestamp(),
  `number` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tickets`
--

INSERT INTO `tickets` (`id`, `user_id`, `seat_no`, `block`, `purchase_time`, `number`) VALUES
(1, 1, '1', 'A', '2024-06-28 16:19:07', 0),
(2, 2, '2', 'A', '2024-07-09 09:33:38', 0),
(3, 1, '3', 'A', '2024-08-15 07:44:17', 0),
(4, 1, '1', 'B', '2024-08-15 07:46:08', 95),
(5, 1, '2', 'B', '2024-08-15 08:53:06', 0),
(6, 1, '3', 'B', '2024-09-24 14:07:17', 0);

-- --------------------------------------------------------

--
-- Table structure for table `users_tbl`
--

CREATE TABLE `users_tbl` (
  `id` int(11) NOT NULL,
  `fname` varchar(50) NOT NULL,
  `surname` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users_tbl`
--

INSERT INTO `users_tbl` (`id`, `fname`, `surname`, `email`, `password`) VALUES
(1, 'Usman', 'Shehu', 'iamusmanshehu@gmail.com', '12345'),
(2, 'musa', 'dawaki', 'dawaki@gmail.com', '08162360715');

-- --------------------------------------------------------

--
-- Table structure for table `watchers`
--

CREATE TABLE `watchers` (
  `id` int(11) NOT NULL,
  `surname` varchar(50) NOT NULL,
  `fname` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `freinds` int(11) NOT NULL,
  `reservetime` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `watchers`
--

INSERT INTO `watchers` (`id`, `surname`, `fname`, `email`, `freinds`, `reservetime`) VALUES
(1, 'Shehu', 'Usman', 'iamusmanshehu@gmail.com', 2, '2024-07-02 08:00:00'),
(2, 'Shehu', 'Usman', 'iamusmanshehu@gmail.com', 2, '2024-07-02 08:00:00'),
(3, 'dawaki', 'musa', 'dawaki@gmail.com', 0, '0000-00-00 00:00:00'),
(4, 'dawaki', 'musa', 'dawaki@gmail.com', 0, '0000-00-00 00:00:00'),
(5, 'Shehu', 'Usman', 'iamusmanshehu@gmail.com', 2, '0000-00-00 00:00:00'),
(6, 'Shehu', 'Usman', 'iamusmanshehu@gmail.com', 2, '0000-00-00 00:00:00'),
(7, 'Shehu', 'Usman', 'iamusmanshehu@gmail.com', 4, '2024-06-29 07:00:00'),
(8, 'Shehu', 'Usman', 'iamusmanshehu@gmail.com', 3, '2024-06-29 07:00:00'),
(9, 'Shehu', 'Usman', 'iamusmanshehu@gmail.com', 2, '2024-07-02 01:00:00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `movies`
--
ALTER TABLE `movies`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `newuser_tbl`
--
ALTER TABLE `newuser_tbl`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tickets`
--
ALTER TABLE `tickets`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `users_tbl`
--
ALTER TABLE `users_tbl`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `watchers`
--
ALTER TABLE `watchers`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `movies`
--
ALTER TABLE `movies`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `newuser_tbl`
--
ALTER TABLE `newuser_tbl`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tickets`
--
ALTER TABLE `tickets`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `users_tbl`
--
ALTER TABLE `users_tbl`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `watchers`
--
ALTER TABLE `watchers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tickets`
--
ALTER TABLE `tickets`
  ADD CONSTRAINT `tickets_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users_tbl` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
