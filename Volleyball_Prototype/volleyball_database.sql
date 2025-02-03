-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 28, 2024 at 11:41 PM
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
(124, 1, 'Andrew Vincent', 9, 7, 8, 7, 4, 7.8);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `userID` int(100) NOT NULL,
  `username` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`userID`, `username`, `email`, `password`) VALUES
(1, 'Admin', 'Admin@gmail.com', 'classclass'),
(2, 'Andrew', 'Andrew@gmail.com', 'classclass'),
(3, 'Waffle', 'Person@gmail.com', 'waffle'),
(4, 'Briggsearl13', 'Briggsearl99@gmail.com', 'Briggs13'),
(5, 'Soccer', 'Soccer@hotmail.cm', 'Johnson'),
(6, 'Darcie', 'Darciejoy@hotmail.ca', 'pickleball'),
(7, 'Mshurgelo', 'Mshurgelo22@gmail.com', '7helpmeok'),
(8, 'Jennythedumbo', 'Jeannine@gmail.com', 'MangoP1chu'),
(9, 'Andrew1', 'Andrew@example.com', 'classclass');

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
  MODIFY `playerID` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=127;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `userID` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

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
