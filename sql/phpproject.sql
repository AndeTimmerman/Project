-- phpMyAdmin SQL Dump
-- version 4.3.10
-- http://www.phpmyadmin.net
--
-- Host: localhost:3306
-- Generation Time: Apr 02, 2015 at 10:16 AM
-- Server version: 5.5.42
-- PHP Version: 5.6.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `phpproject`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `admin_id` int(10) NOT NULL,
  `admin_voornaam` varchar(200) NOT NULL,
  `admin_achternaam` varchar(200) NOT NULL,
  `admin_foto` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `bericht`
--

CREATE TABLE `bericht` (
  `bericht_id` int(10) NOT NULL,
  `bericht_tekst` varchar(300) NOT NULL,
  `gids_id` int(10) NOT NULL,
  `bezoeker_id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `bezoeker`
--

CREATE TABLE `bezoeker` (
  `bezoeker_id` int(10) NOT NULL,
  `bezoeker_facebookid` varchar(100) NOT NULL,
  `bezoeker_naam` varchar(60) NOT NULL,
  `bezoeker_email` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE `contact` (
  `contact_id` int(10) NOT NULL,
  `contact_dag` date NOT NULL,
  `contact_uur` time NOT NULL,
  `gids_id` int(10) NOT NULL,
  `bezoeker_id` int(10) NOT NULL,
  `admin_id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `feedback_id` int(10) NOT NULL,
  `feedback_tekst` varchar(300) NOT NULL,
  `bezoeker_id` int(10) NOT NULL,
  `feedback_rating` int(10) NOT NULL,
  `gids_id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `gids`
--

CREATE TABLE `gids` (
  `gids_id` int(10) NOT NULL,
  `gids_voornaam` varchar(200) NOT NULL,
  `gids_naam` varchar(200) NOT NULL,
  `gids_foto` varchar(300) NOT NULL,
  `gids_bio` varchar(300) NOT NULL,
  `gids_richting` varchar(200) NOT NULL,
  `gids_jaar` int(10) NOT NULL,
  `gids_stad` varchar(200) NOT NULL,
  `gids_email` varchar(200) NOT NULL,
  `gids_wachtwoord` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `bericht`
--
ALTER TABLE `bericht`
  ADD PRIMARY KEY (`bericht_id`), ADD KEY `gids_id` (`gids_id`), ADD KEY `bezoeker_id` (`bezoeker_id`);

--
-- Indexes for table `bezoeker`
--
ALTER TABLE `bezoeker`
  ADD PRIMARY KEY (`bezoeker_id`);

--
-- Indexes for table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`contact_id`), ADD KEY `gids_id` (`gids_id`), ADD KEY `bezoeker_id` (`bezoeker_id`), ADD KEY `admin_id` (`admin_id`);

--
-- Indexes for table `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`feedback_id`), ADD KEY `bezoeker_id` (`bezoeker_id`), ADD KEY `gids_id` (`gids_id`);

--
-- Indexes for table `gids`
--
ALTER TABLE `gids`
  ADD PRIMARY KEY (`gids_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `admin_id` int(10) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `bericht`
--
ALTER TABLE `bericht`
  MODIFY `bericht_id` int(10) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `bezoeker`
--
ALTER TABLE `bezoeker`
  MODIFY `bezoeker_id` int(10) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `contact`
--
ALTER TABLE `contact`
  MODIFY `contact_id` int(10) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `feedback`
--
ALTER TABLE `feedback`
  MODIFY `feedback_id` int(10) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `gids`
--
ALTER TABLE `gids`
  MODIFY `gids_id` int(10) NOT NULL AUTO_INCREMENT;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `bericht`
--
ALTER TABLE `bericht`
ADD CONSTRAINT `bericht_ibfk_2` FOREIGN KEY (`bezoeker_id`) REFERENCES `bezoeker` (`bezoeker_id`),
ADD CONSTRAINT `bericht_ibfk_1` FOREIGN KEY (`gids_id`) REFERENCES `gids` (`gids_id`);

--
-- Constraints for table `contact`
--
ALTER TABLE `contact`
ADD CONSTRAINT `contact_ibfk_3` FOREIGN KEY (`admin_id`) REFERENCES `admin` (`admin_id`),
ADD CONSTRAINT `contact_ibfk_1` FOREIGN KEY (`gids_id`) REFERENCES `gids` (`gids_id`),
ADD CONSTRAINT `contact_ibfk_2` FOREIGN KEY (`bezoeker_id`) REFERENCES `bezoeker` (`bezoeker_id`);

--
-- Constraints for table `feedback`
--
ALTER TABLE `feedback`
ADD CONSTRAINT `feedback_ibfk_2` FOREIGN KEY (`gids_id`) REFERENCES `gids` (`gids_id`),
ADD CONSTRAINT `feedback_ibfk_1` FOREIGN KEY (`bezoeker_id`) REFERENCES `bezoeker` (`bezoeker_id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
