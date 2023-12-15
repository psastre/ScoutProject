-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 15, 2023 at 11:56 PM
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
-- Database: `scouting_project`
--

-- --------------------------------------------------------

--
-- Table structure for table `league`
--

CREATE TABLE `league` (
  `leagueID` int(11) NOT NULL,
  `leaguePhoto` varchar(50) NOT NULL,
  `leagueName` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `league`
--

INSERT INTO `league` (`leagueID`, `leaguePhoto`, `leagueName`) VALUES
(1, 'ArgentinePrimeraDivisión', 'Argentine Primera División');

-- --------------------------------------------------------

--
-- Table structure for table `player`
--

CREATE TABLE `player` (
  `id` int(11) NOT NULL,
  `photo` varchar(50) NOT NULL,
  `name` varchar(30) NOT NULL,
  `lastname` varchar(30) NOT NULL,
  `age` int(2) NOT NULL,
  `team` int(2) NOT NULL,
  `position` varchar(15) NOT NULL,
  `nacionality` varchar(15) NOT NULL,
  `gamesPlayed` int(3) NOT NULL,
  `foot` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `player`
--

INSERT INTO `player` (`id`, `photo`, `name`, `lastname`, `age`, `team`, `position`, `nacionality`, `gamesPlayed`, `foot`) VALUES
(1, 'Armani', 'Franco', 'Armani', 37, 1, 'Arquero', 'Argentina', 389, 'IZQ');

-- --------------------------------------------------------

--
-- Table structure for table `team`
--

CREATE TABLE `team` (
  `teamID` int(11) NOT NULL,
  `teamPhoto` varchar(50) NOT NULL,
  `teamName` varchar(50) NOT NULL,
  `teamLeague` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `team`
--

INSERT INTO `team` (`teamID`, `teamPhoto`, `teamName`, `teamLeague`) VALUES
(1, 'River', 'Club Atlético River Plate', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `league`
--
ALTER TABLE `league`
  ADD PRIMARY KEY (`leagueID`);

--
-- Indexes for table `player`
--
ALTER TABLE `player`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `team`
--
ALTER TABLE `team`
  ADD PRIMARY KEY (`teamID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `league`
--
ALTER TABLE `league`
  MODIFY `leagueID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `player`
--
ALTER TABLE `player`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `team`
--
ALTER TABLE `team`
  MODIFY `teamID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
