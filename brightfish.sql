-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 22, 2025 at 08:46 PM
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
-- Database: `brightfish`
--

-- --------------------------------------------------------

--
-- Table structure for table `adslots`
--

CREATE TABLE `adslots` (
  `AdSlotID` int(11) NOT NULL,
  `SlotName` varchar(50) DEFAULT NULL,
  `Description` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `adslots`
--

INSERT INTO `adslots` (`AdSlotID`, `SlotName`, `Description`) VALUES
(1, 'Standard ad slot', 'Basic package with standard reach'),
(2, 'Silver', 'Extended visibility and better timing'),
(3, 'Gold', 'Premium placement with prime-time slots'),
(4, 'Titanium', 'Top-tier advertising with full reach and flexibility');

-- --------------------------------------------------------

--
-- Table structure for table `businesssectors`
--

CREATE TABLE `businesssectors` (
  `SectorID` int(11) NOT NULL,
  `SectorName` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `businesssectors`
--

INSERT INTO `businesssectors` (`SectorID`, `SectorName`) VALUES
(1, 'Food & Beverage'),
(2, 'Technology'),
(3, 'Automotive'),
(4, 'Fashion'),
(5, 'Health & Wellness'),
(6, 'Entertainment'),
(7, 'Retail'),
(8, 'Finance'),
(9, 'Travel'),
(10, 'Education');

-- --------------------------------------------------------

--
-- Table structure for table `campaignaudiencelink`
--

CREATE TABLE `campaignaudiencelink` (
  `CampaignID` int(11) NOT NULL,
  `AudienceID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `campaigncinemalink`
--

CREATE TABLE `campaigncinemalink` (
  `CampaignID` int(11) NOT NULL,
  `CinemaID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `campaignmissionlink`
--

CREATE TABLE `campaignmissionlink` (
  `CampaignID` int(11) NOT NULL,
  `MissionID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `campaignmovielink`
--

CREATE TABLE `campaignmovielink` (
  `CampaignID` int(11) NOT NULL,
  `MovieID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `campaigns`
--

CREATE TABLE `campaigns` (
  `CampaignID` int(11) NOT NULL,
  `UserID` int(11) DEFAULT NULL,
  `BudgetMin` decimal(10,2) DEFAULT NULL,
  `BudgetMax` decimal(10,2) DEFAULT NULL,
  `AdDurationSeconds` int(11) DEFAULT NULL,
  `StartDate` datetime DEFAULT NULL,
  `EndDate` datetime DEFAULT NULL,
  `BusinessSector` varchar(255) DEFAULT NULL,
  `AdSlot` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cinemas`
--

CREATE TABLE `cinemas` (
  `CinemaID` int(11) NOT NULL,
  `CinemaName` varchar(255) DEFAULT NULL,
  `City` varchar(100) DEFAULT NULL,
  `Chain` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `cinemas`
--

INSERT INTO `cinemas` (`CinemaID`, `CinemaName`, `City`, `Chain`) VALUES
(1, 'Kinepolis Antwerp', 'Antwerp', 'Kinepolis'),
(2, 'Kinepolis Brussels', 'Brussels', 'Kinepolis'),
(3, 'Kinepolis Liège', 'Liège', 'Kinepolis'),
(4, 'Pathé Charleroi', 'Charleroi', 'Pathé'),
(5, 'Imagix Mons', 'Mons', 'Imagix'),
(6, 'Kinepolis Gent', 'Gent', 'Kinepolis'),
(7, 'Kinepolis Hasselt', 'Hasselt', 'Kinepolis'),
(8, 'Cinescope Louvain La Neuve', 'Louvain-la-Neuve', ''),
(9, 'Acinapolis Namur', 'Namur', ''),
(10, 'Kinepolis Kortrijk', 'Kortrijk', 'Kinepolis'),
(11, 'Kinepolis Braine', 'Braine-l’Alleud', 'Kinepolis'),
(12, 'Siniscoop Sint-Niklaas', 'Sint-Niklaas', ''),
(13, 'Euroscoop Maasmechelen', 'Maasmechelen', 'Euroscoop'),
(14, 'Euroscoop Genk', 'Genk', 'Euroscoop'),
(15, 'Imagix Tournai', 'Tournai', 'Imagix'),
(16, 'Kinepolis Leuven', 'Leuven', 'Kinepolis'),
(17, 'Kinepolis Oostende', 'Oostende', 'Kinepolis'),
(18, 'Pathé Verviers', 'Verviers', 'Pathé'),
(19, 'Kinepolis Brugge', 'Brugge', 'Kinepolis'),
(20, 'Imagix Huy', 'Huy', 'Imagix'),
(21, 'Wellington Waterloo', 'Waterloo', ''),
(22, 'Cityscoop Roeselare', 'Roeselare', ''),
(23, 'Studio Geel', 'Geel', ''),
(24, 'Cinema Koksijde', 'Koksijde', ''),
(25, 'Stuart La Louvière', 'La Louvière', ''),
(26, 'Kinepolis Palace Liège', 'Liège', 'Kinepolis'),
(27, 'White Cinema Bruxelles', 'Bruxelles', 'White Cinema'),
(28, 'Euroscoop Lanaken', 'Lanaken', 'Euroscoop'),
(29, 'Vendome Bruxelles', 'Bruxelles', ''),
(30, 'Movie Mills Malmedy', 'Malmedy', ''),
(31, 'Focus Geraardsbergen', 'Geraardsbergen', ''),
(32, 'CineXtra Bastogne', 'Bastogne', ''),
(33, 'CineXtra Marche', 'Marche', ''),
(34, 'Le Stockel Woluwe St-Pierre', 'Woluwe-St-Pierre', ''),
(35, 'Galeries Bruxelles', 'Bruxelles', ''),
(36, 'Cine Centre Rixensart', 'Rixensart', ''),
(37, 'Le Totem Libramont', 'Libramont', ''),
(38, 'L’Etoile Jodoigne', 'Jodoigne', ''),
(39, 'Plaza Hotton', 'Hotton', ''),
(40, 'Bouillon Cine Studio', 'Bouillon', ''),
(41, 'Rubens Zwijndrecht', 'Zwijndrecht', ''),
(42, 'Cine Chaplin Nismes', 'Nismes', '');

-- --------------------------------------------------------

--
-- Table structure for table `missions`
--

CREATE TABLE `missions` (
  `MissionID` int(11) NOT NULL,
  `MissionName` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `missions`
--

INSERT INTO `missions` (`MissionID`, `MissionName`) VALUES
(1, 'Everyone'),
(2, 'Male'),
(3, 'Female'),
(4, 'Families'),
(5, 'Restrict minors'),
(6, 'No kids'),
(7, 'Restrict alcohol'),
(8, 'Restrict sugar'),
(9, 'Gamers'),
(10, 'Art'),
(11, 'Mainstream'),
(12, 'Purchasers'),
(13, 'Youngsters'),
(14, '-35'),
(15, '+35'),
(16, 'No horror'),
(17, 'Premium');

-- --------------------------------------------------------

--
-- Table structure for table `movies`
--

CREATE TABLE `movies` (
  `MovieID` int(11) NOT NULL,
  `Title` varchar(255) DEFAULT NULL,
  `ReleaseDate` datetime DEFAULT NULL,
  `Genre` varchar(100) DEFAULT NULL,
  `PriceRangeMin` decimal(10,2) DEFAULT NULL,
  `PriceRangeMax` decimal(10,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `movies`
--

INSERT INTO `movies` (`MovieID`, `Title`, `ReleaseDate`, `Genre`, `PriceRangeMin`, `PriceRangeMax`) VALUES
(1, 'Destinatio Finale Bloodlines', NULL, 'Horror', 100.00, 300.00),
(2, 'Until Dawn', NULL, 'Thriller', 120.00, 320.00),
(3, 'Lads', NULL, 'Drama', 90.00, 250.00),
(4, 'Sinners', NULL, 'Drama', 95.00, 270.00),
(5, 'Patsers', NULL, 'Action', 110.00, 280.00),
(6, 'Dogman', NULL, 'Drama', 100.00, 300.00),
(7, 'Minecraft', NULL, 'Animation', 150.00, 350.00),
(8, 'A Working Man', NULL, 'Drama', 85.00, 260.00),
(9, 'Angie & Cle', NULL, 'Comedy', 95.00, 270.00),
(10, 'Thunderbolt', NULL, 'Action', 130.00, 320.00),
(11, 'Hitpig', NULL, 'Animation', 120.00, 300.00),
(12, 'The Amateur', NULL, 'Action', 140.00, 360.00),
(13, 'Captain America: Brave New World', NULL, 'Superhero', 200.00, 500.00),
(14, 'Thunderbolts', NULL, 'Superhero', 190.00, 480.00);

-- --------------------------------------------------------

--
-- Table structure for table `targetaudience`
--

CREATE TABLE `targetaudience` (
  `AudienceID` int(11) NOT NULL,
  `AgeGroup` varchar(50) DEFAULT NULL,
  `Gender` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `targetaudience`
--

INSERT INTO `targetaudience` (`AudienceID`, `AgeGroup`, `Gender`) VALUES
(1, '3-14 years old', 'All'),
(2, '15-24 years old', 'All'),
(3, '25-34 years old', 'All'),
(4, '35-49 years old', 'All'),
(5, '50+', 'All');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `UserID` int(11) NOT NULL,
  `FullName` varchar(255) DEFAULT NULL,
  `Email` varchar(255) DEFAULT NULL,
  `CompanyName` varchar(255) DEFAULT NULL,
  `Notes` text DEFAULT NULL,
  `DateSubmitted` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `adslots`
--
ALTER TABLE `adslots`
  ADD PRIMARY KEY (`AdSlotID`);

--
-- Indexes for table `businesssectors`
--
ALTER TABLE `businesssectors`
  ADD PRIMARY KEY (`SectorID`);

--
-- Indexes for table `campaignaudiencelink`
--
ALTER TABLE `campaignaudiencelink`
  ADD PRIMARY KEY (`CampaignID`,`AudienceID`),
  ADD KEY `AudienceID` (`AudienceID`);

--
-- Indexes for table `campaigncinemalink`
--
ALTER TABLE `campaigncinemalink`
  ADD PRIMARY KEY (`CampaignID`,`CinemaID`),
  ADD KEY `CinemaID` (`CinemaID`);

--
-- Indexes for table `campaignmissionlink`
--
ALTER TABLE `campaignmissionlink`
  ADD PRIMARY KEY (`CampaignID`,`MissionID`),
  ADD KEY `MissionID` (`MissionID`);

--
-- Indexes for table `campaignmovielink`
--
ALTER TABLE `campaignmovielink`
  ADD PRIMARY KEY (`CampaignID`,`MovieID`),
  ADD KEY `MovieID` (`MovieID`);

--
-- Indexes for table `campaigns`
--
ALTER TABLE `campaigns`
  ADD PRIMARY KEY (`CampaignID`),
  ADD KEY `UserID` (`UserID`);

--
-- Indexes for table `cinemas`
--
ALTER TABLE `cinemas`
  ADD PRIMARY KEY (`CinemaID`);

--
-- Indexes for table `missions`
--
ALTER TABLE `missions`
  ADD PRIMARY KEY (`MissionID`);

--
-- Indexes for table `movies`
--
ALTER TABLE `movies`
  ADD PRIMARY KEY (`MovieID`);

--
-- Indexes for table `targetaudience`
--
ALTER TABLE `targetaudience`
  ADD PRIMARY KEY (`AudienceID`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`UserID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `adslots`
--
ALTER TABLE `adslots`
  MODIFY `AdSlotID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `businesssectors`
--
ALTER TABLE `businesssectors`
  MODIFY `SectorID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `campaigns`
--
ALTER TABLE `campaigns`
  MODIFY `CampaignID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `cinemas`
--
ALTER TABLE `cinemas`
  MODIFY `CinemaID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT for table `missions`
--
ALTER TABLE `missions`
  MODIFY `MissionID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `movies`
--
ALTER TABLE `movies`
  MODIFY `MovieID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `targetaudience`
--
ALTER TABLE `targetaudience`
  MODIFY `AudienceID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `UserID` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `campaignaudiencelink`
--
ALTER TABLE `campaignaudiencelink`
  ADD CONSTRAINT `campaignaudiencelink_ibfk_1` FOREIGN KEY (`CampaignID`) REFERENCES `campaigns` (`CampaignID`),
  ADD CONSTRAINT `campaignaudiencelink_ibfk_2` FOREIGN KEY (`AudienceID`) REFERENCES `targetaudience` (`AudienceID`);

--
-- Constraints for table `campaigncinemalink`
--
ALTER TABLE `campaigncinemalink`
  ADD CONSTRAINT `campaigncinemalink_ibfk_1` FOREIGN KEY (`CampaignID`) REFERENCES `campaigns` (`CampaignID`),
  ADD CONSTRAINT `campaigncinemalink_ibfk_2` FOREIGN KEY (`CinemaID`) REFERENCES `cinemas` (`CinemaID`);

--
-- Constraints for table `campaignmissionlink`
--
ALTER TABLE `campaignmissionlink`
  ADD CONSTRAINT `campaignmissionlink_ibfk_1` FOREIGN KEY (`CampaignID`) REFERENCES `campaigns` (`CampaignID`),
  ADD CONSTRAINT `campaignmissionlink_ibfk_2` FOREIGN KEY (`MissionID`) REFERENCES `missions` (`MissionID`);

--
-- Constraints for table `campaignmovielink`
--
ALTER TABLE `campaignmovielink`
  ADD CONSTRAINT `campaignmovielink_ibfk_1` FOREIGN KEY (`CampaignID`) REFERENCES `campaigns` (`CampaignID`),
  ADD CONSTRAINT `campaignmovielink_ibfk_2` FOREIGN KEY (`MovieID`) REFERENCES `movies` (`MovieID`);

--
-- Constraints for table `campaigns`
--
ALTER TABLE `campaigns`
  ADD CONSTRAINT `campaigns_ibfk_1` FOREIGN KEY (`UserID`) REFERENCES `users` (`UserID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
