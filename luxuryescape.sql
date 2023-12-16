-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 08, 2021 at 06:10 AM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.0.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `luxuryescape`
--

-- --------------------------------------------------------

--
-- Table structure for table `bookpackages`
--

CREATE TABLE `bookpackages` (
  `idUser` int(11) NOT NULL,
  `idPackage` int(11) NOT NULL,
  `numberOfGuests` int(11) NOT NULL,
  `BookingPrice` int(11) NOT NULL,
  `idBookPackage` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `bookpackages`
--

INSERT INTO `bookpackages` (`idUser`, `idPackage`, `numberOfGuests`, `BookingPrice`, `idBookPackage`) VALUES
(1, 6, 2, 200, 1),
(1, 5, 2, 100, 2),
(1, 1, 2, 180, 3);

-- --------------------------------------------------------

--
-- Table structure for table `booktours`
--

CREATE TABLE `booktours` (
  `idUser` int(11) NOT NULL,
  `nameCountry` varchar(255) NOT NULL,
  `numberOfGuests` int(11) NOT NULL,
  `ArrivalDate` varchar(255) NOT NULL,
  `LeavingDate` varchar(255) NOT NULL,
  `Price` int(11) NOT NULL,
  `idTours` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `booktours`
--

INSERT INTO `booktours` (`idUser`, `nameCountry`, `numberOfGuests`, `ArrivalDate`, `LeavingDate`, `Price`, `idTours`) VALUES
(1, 'Dubai', 2, '25/2/2025', '25/3/2025', 800, 1),
(1, 'London', 2, '25/3/2025', '25/4/2025', 1000, 2),
(13, 'Dubai', 2, '25/02/2025', '25/03/2025', 800, 4),
(13, 'London', 2, '25/03/2025', '25/04/2025', 1000, 5),
(1, 'Test', 2, '2025-07-13', '2025-08-13', 300, 10);

-- --------------------------------------------------------

--
-- Table structure for table `packages`
--

CREATE TABLE `packages` (
  `Country` varchar(255) NOT NULL,
  `NaturalPrice` int(11) NOT NULL,
  `FinalPrice` int(11) NOT NULL,
  `idPackage` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `packages`
--

INSERT INTO `packages` (`Country`, `NaturalPrice`, `FinalPrice`, `idPackage`) VALUES
('Italy', 120, 90, 1),
('Japan', 110, 80, 2),
('Jordan', 100, 70, 3),
('Antarctica', 120, 90, 4),
('Tanzania', 90, 50, 5),
('France', 140, 100, 6);

-- --------------------------------------------------------

--
-- Table structure for table `packagespaths`
--

CREATE TABLE `packagespaths` (
  `PackID` int(11) NOT NULL,
  `url` varchar(255) NOT NULL,
  `srcPath` varchar(255) NOT NULL,
  `Paragraph` varchar(255) NOT NULL,
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `packagespaths`
--

INSERT INTO `packagespaths` (`PackID`, `url`, `srcPath`, `Paragraph`, `id`) VALUES
(1, 'html/italy.html', 'images/site/p-italy.jpg', 'A feast for all senses', 1),
(2, 'html/japan.html', 'images/site/p-japan.jpg', 'You\'ll see why we love it', 2),
(3, 'html/jordan.html', 'images/site/p-jordan.jpg', 'Land of Wonders', 3),
(4, 'html/antarctica.html', 'images/Antarctica/main-pic.jpg', 'Awesome adventure', 4),
(5, 'html/tanzania.html', 'images/site/p-tanzania.jpg', 'Safari season', 5),
(6, 'html/france.html', 'images/site/p-france.jpeg', 'not a country, it\'s the world', 6);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `password`, `email`, `address`, `date`) VALUES
(1, 'Aamer Qanadilo', 'Aamer137@', 'a_a_mer@hotmail.com', '2001-07-13', '0000-00-00'),
(13, 'Sarah Mahmoud', 'Sarah33@', 'sarah@hotmail.com', '2001-04-15', '0000-00-00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bookpackages`
--
ALTER TABLE `bookpackages`
  ADD PRIMARY KEY (`idBookPackage`),
  ADD KEY `idPackage` (`idPackage`),
  ADD KEY `idUser` (`idUser`);

--
-- Indexes for table `booktours`
--
ALTER TABLE `booktours`
  ADD PRIMARY KEY (`idTours`),
  ADD KEY `idUser` (`idUser`);

--
-- Indexes for table `packages`
--
ALTER TABLE `packages`
  ADD PRIMARY KEY (`idPackage`);

--
-- Indexes for table `packagespaths`
--
ALTER TABLE `packagespaths`
  ADD PRIMARY KEY (`id`),
  ADD KEY `PackID` (`PackID`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bookpackages`
--
ALTER TABLE `bookpackages`
  MODIFY `idBookPackage` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `booktours`
--
ALTER TABLE `booktours`
  MODIFY `idTours` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `packages`
--
ALTER TABLE `packages`
  MODIFY `idPackage` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `packagespaths`
--
ALTER TABLE `packagespaths`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `bookpackages`
--
ALTER TABLE `bookpackages`
  ADD CONSTRAINT `idPackageFK` FOREIGN KEY (`idPackage`) REFERENCES `packages` (`idPackage`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `idUserFKP` FOREIGN KEY (`idUser`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `booktours`
--
ALTER TABLE `booktours`
  ADD CONSTRAINT `idUserFK` FOREIGN KEY (`idUser`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `packagespaths`
--
ALTER TABLE `packagespaths`
  ADD CONSTRAINT `PackIDFK` FOREIGN KEY (`PackID`) REFERENCES `packages` (`idPackage`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
