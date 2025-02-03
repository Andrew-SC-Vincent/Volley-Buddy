-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 03, 2025 at 01:42 AM
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
-- Database: `volleyball_database`
--

-- --------------------------------------------------------

--
-- Table structure for table `player`
--

CREATE TABLE `player` (
  `playerID` int(100) NOT NULL,
  `userID` int(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `passing` int(7) NOT NULL,
  `setting` int(7) NOT NULL,
  `serving` int(7) NOT NULL,
  `attacking` int(9) NOT NULL,
  `blocking` int(8) NOT NULL,
  `skill` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `player`
--

INSERT INTO `player` (`playerID`, `userID`, `name`, `passing`, `setting`, `serving`, `attacking`, `blocking`, `skill`) VALUES
(61, 1, 'Matthew Rosenberger', 6, 5, 6, 5, 3, 5.4),
(63, 1, 'Yoko', 2, 1, 3, 1, 1, 1.8),
(64, 1, 'Emily Shurgelo', 4, 5, 4, 3, 1, 3.8),
(65, 1, 'Darcie Shurgelo', 8, 7, 7, 4, 3, 6.8),
(67, 1, 'John Smith', 7, 6, 6, 5, 4, 6.2),
(68, 1, 'Stephanie Bohn', 2, 3, 2, 2, 1, 2.1),
(71, 1, 'Norman', 1, 1, 4, 1, 1, 1.5),
(72, 1, 'Denis ', 6, 5, 5, 3, 1, 4.9),
(73, 1, 'Peter', 3, 3, 3, 1, 2, 2.7),
(74, 1, 'Micah', 8, 8, 9, 9, 10, 8.5),
(75, 1, 'Rula ', 4, 5, 3, 3, 1, 3.6),
(76, 1, 'Jordan', 8, 7, 6, 8, 6, 7.3),
(77, 1, 'Rubbertoe', 3, 4, 4, 4, 2, 3.4),
(78, 1, 'kurk', 4, 4, 6, 4, 1, 4.1),
(79, 1, 'sora', 1, 1, 1, 1, 1, 1),
(80, 1, 'mullet man', 7, 6, 7, 4, 2, 6),
(81, 1, 'Emily Ducharme ', 2, 3, 3, 1, 1, 2.2),
(82, 1, 'Olivia ', 2, 3, 2, 3, 1, 2.2),
(83, 1, 'Briggs Earl', 6, 6, 5, 5, 4, 5.5),
(84, 1, 'Brad', 2, 2, 2, 1, 1, 1.8),
(85, 1, 'Sheldon', 7, 7, 7, 7, 6, 6.9),
(86, 3, 'Briggs', 2, 3, 2, 3, 2, 2.3),
(87, 3, 'Andrew', 5, 3, 2, 5, 8, 4.4),
(88, 3, 'Ariel', 10, 10, 10, 10, 10, 10),
(91, 4, 'Darcie Shurgelo', 9, 8, 7, 7, 5, 7.9),
(92, 4, 'John Smith', 8, 7, 7, 6, 6, 7.3),
(93, 4, 'Stephanie Bohn', 3, 4, 2, 3, 2, 2.9),
(94, 4, 'Matthew Rosenberger', 7, 5, 5, 7, 7, 6.3),
(96, 5, 'Darcie Shurgelo', 6, 6, 6, 4, 1, 5.3),
(97, 5, 'John Smith', 6, 6, 6, 4, 3, 5.5),
(98, 5, 'Stephanie Bohn', 3, 3, 3, 1, 1, 2.6),
(99, 5, 'Matthew Rosenberger', 4, 4, 4, 4, 3, 3.9),
(100, 1, 'Angus Gardner', 4, 3, 5, 4, 2, 3.8),
(105, 6, 'Rachel Rosenburger', 8, 6, 7, 4, 1, 6.4),
(106, 6, 'peter', 4, 5, 5, 3, 1, 4),
(107, 6, 'Mathew Rosenburger', 5, 4, 8, 2, 2, 4.8),
(108, 6, 'John Smith', 8, 6, 9, 4, 3, 6.9),
(110, 7, 'Rachel Rosenberger', 7, 8, 7, 7, 3, 6.8),
(111, 7, 'Peter', 5, 6, 6, 6, 5, 5.5),
(112, 7, 'Matthew Rosenberger', 6, 5, 6, 6, 6, 5.8),
(113, 7, 'John Smith', 7, 6, 7, 6, 7, 6.7),
(115, 8, 'Rachel Rosenberger', 7, 6, 6, 4, 1, 5.8),
(116, 8, 'Peter', 4, 4, 4, 3, 3, 3.8),
(117, 8, 'Matthew Rosenberger', 6, 5, 6, 4, 3, 5.3),
(118, 8, 'John Smith', 6, 7, 7, 5, 3, 6),
(124, 1, 'Andrew Vincent', 9, 7, 8, 7, 4, 7.8),
(127, 1, 'Ice', 6, 5, 5, 3, 1, 4.9),
(128, 1, 'Angela', 2, 2, 1, 1, 1, 1.6),
(129, 1, 'girl', 4, 4, 5, 3, 1, 3.8),
(130, 1, 'grey', 8, 7, 7, 6, 4, 7.1),
(131, 1, 'Rachel', 7, 6, 6, 3, 1, 5.7),
(132, 1, 'Josh', 6, 4, 5, 4, 2, 4.9),
(133, 1, 'Cory', 2, 2, 2, 1, 2, 1.9),
(134, 1, 'Shoko', 2, 1, 2, 2, 2, 1.8),
(135, 1, 'Jerick', 7, 7, 7, 7, 7, 7),
(136, 1, 'Yasmine', 4, 4, 4, 4, 4, 4),
(137, 1, 'Erich', 7, 7, 7, 7, 7, 7),
(138, 1, 'Gabbi', 5, 5, 5, 5, 5, 5),
(139, 1, 'Rowan', 6, 6, 6, 6, 6, 6),
(140, 1, 'Jiyoon', 2, 2, 2, 2, 1, 1.9),
(141, 1, 'Blanca', 2, 2, 2, 2, 1, 1.9),
(142, 1, 'Aisia', 4, 4, 4, 4, 4, 4),
(143, 1, 'Lehi', 6, 6, 6, 6, 6, 6),
(144, 1, 'Cassandra', 4, 4, 4, 4, 4, 4),
(145, 1, 'Kenny', 3, 2, 2, 1, 1, 2.3),
(146, 14, 'Andrew', 1, 1, 1, 1, 1, 1),
(147, 14, 'Vincent', 1, 1, 1, 1, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `userID` int(100) NOT NULL,
  `username` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(150) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`userID`, `username`, `email`, `password`) VALUES
(1, 'Admin', 'Admin@gmail.com', '$2y$10$HnPfyHxYafByINewekR7xuYeWZxBpbk8NZ3zMwprNEnDfAWQ1OlLC'),
(2, 'Andrew', 'Andrew@gmail.com', '$2y$10$LpjW1wmhPtT0.8.NKPsOKOw8PbxJhiWfT70NfKotqt0NuIGPULBsq'),
(3, 'Waffle', 'Person@gmail.com', '$2y$10$nMicTSKeC8086iOh2tu4mefMNo56iqJQKTOY7EHeJbFdXCs5Do/Im'),
(4, 'Briggsearl13', 'Briggsearl99@gmail.com', '$2y$10$flJvJ23I5YOvRyfahmSPl.XAiPW92l.uS7sCCzZ8MTUkeyeL6ktiK'),
(5, 'Soccer', 'Soccer@hotmail.cm', '$2y$10$vOy6rzXTpbphc0A5Ch.FIO2Z/co/VdYYcg7tdS6BuZ8gT4gQVHJ/.'),
(6, 'Darcie', 'Darciejoy@hotmail.ca', '$2y$10$kxEEoJaOqQholsiJiFzZbuQnn0.GCfrX2kYC6V3AYz8sI8mwMDXk2'),
(7, 'Mshurgelo', 'Mshurgelo22@gmail.com', '$2y$10$rX6FRhn6UPTdnmDPgOqrL.BAdLP3O4kh7ry.3KhaJQeOALXNhsei.'),
(8, 'Jennythedumbo', 'Jeannine@gmail.com', '$2y$10$AeD2osiV4FleGpuw2ZYDDuhZRTGdk/oLXTPAPgvR4swEaGxt50zyq'),
(9, 'Andrew1', 'Andrew@example.com', '$2y$10$TQoLWGKngrY997BpYB0pPucywiTI3CZGqdKjp8xn40SN8crcBb7nO'),
(10, 'Msharma', 'Msharma@tru.ca', '$2y$10$m10T/KWu5XvCBDqd1SL5sOHhAtH4yvw7k43B940o/bIlZxHdQtfLK'),
(11, 'Andrewv', 'Andrewv@example.com', '$2y$10$zqZP9YklNkdy5KDX4JHck.ndmNyK4zEcRP/PVwa8CLY'),
(12, 'Bubba', 'Bubba@gmail.com', '$2y$10$Cjj5IkeJ0y58xMiB5IumH.V4pqFC4Fv9eOidAbU5kbo'),
(14, 'Wafflesnap', 'Waffles@gmail.com', '$2y$10$wXJaPkGW7m7odpJ5kTyeTuxZzFvr7WeBLFQhu78gkVDsQ6aYhrhaC'),
(17, 'Test4', 'Test4@gmail.com', '$2y$10$lcgRN8WqlstMP1DkydfJKu3j51jEnWUvQd2U6qF20U7tMAxE5aPHe');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `player`
--
ALTER TABLE `player`
  ADD PRIMARY KEY (`playerID`),
  ADD KEY `userID` (`userID`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`userID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `player`
--
ALTER TABLE `player`
  MODIFY `playerID` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=149;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `userID` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `player`
--
ALTER TABLE `player`
  ADD CONSTRAINT `player_ibfk_1` FOREIGN KEY (`userID`) REFERENCES `user` (`userID`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
