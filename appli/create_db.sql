-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : mar. 14 mars 2023 à 12:18
-- Version du serveur : 8.0.27
-- Version de PHP : 7.4.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `price_project`
--
CREATE DATABASE IF NOT EXISTS `price_project` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `price_project`;


-- --------------------------------------------------------

--
-- Structure de la table `cars`
--

DROP TABLE IF EXISTS `cars`;
CREATE TABLE IF NOT EXISTS `cars` (
  `carID` int NOT NULL AUTO_INCREMENT,
  `brand` varchar(50) NOT NULL,
  `year` int NOT NULL,
  `kilometersDriven` varchar(50) DEFAULT NULL,
  `ownerType` varchar(50) DEFAULT NULL,
  `fuelType` varchar(50) DEFAULT NULL,
  `transmission` varchar(50) DEFAULT NULL,
  `mileage` int DEFAULT NULL,
  `engine` int NOT NULL,
  `power` int NOT NULL,
  `seats` int DEFAULT NULL,
  `newPrice` int NOT NULL,
  `price` int NOT NULL,
  `userID` int NOT NULL,
  PRIMARY KEY (`carID`),
  KEY `userID` (`userID`)
) ENGINE=MyISAM AUTO_INCREMENT=39 DEFAULT CHARSET=utf8mb3;

--
-- Déchargement des données de la table `cars`
--

INSERT INTO `cars` (`carID`, `brand`, `year`, `kilometersDriven`, `ownerType`, `fuelType`, `transmission`, `mileage`, `engine`, `power`, `seats`, `newPrice`, `price`, `userID`) VALUES
(1, 'lala', 0, 'lala', 'lala', 'lala', 'lala', 0, 0, 0, 0, 0, 0, 1),
(16, 'Audi', 2020, '50000', 'First', 'CNG', 'Manual', 37, 998, 55, 5, 20000, 8952, 2),
(17, 'Toyota', 2012, '50000', 'First', 'CNG', '', 37, 998, 58, 5, 0, 3429, 2),
(19, 'Toyota', 2020, '50000', 'First', 'CNG', 'Manual', 37, 998, 55, 5, 0, 7101, 2),
(22, 'Land Rover', 2012, '50000', 'First', 'CNG', 'Manual', 37, 998, 55, 5, 20000, 6903, 2),
(26, 'audi', 2020, '0', '', '', '', 0, 998, 58, 0, 20000, 7885, 2),
(38, 'Land Rover', 2020, NULL, NULL, NULL, NULL, NULL, 998, 55, NULL, 40000, 28653, 2),
(37, 'Toyota', 2020, '0', '', '', '', 0, 998, 55, 0, 40000, 30049, 2);

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `userID` int NOT NULL AUTO_INCREMENT,
  `name` varchar(50) DEFAULT NULL,
  `firstName` varchar(50) DEFAULT NULL,
  `username` varchar(50) DEFAULT NULL,
  `password` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`userID`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb3;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`userID`, `name`, `firstName`, `username`, `password`) VALUES
(1, 'admin', 'admin', 'admin', 'admin'),
(2, 'Niko', '123', 'Niko', '123'),
(3, 'Nico', 'Khao', 'Nicolas', '123'),
(5, 'Jak', 'Lang', 'Loic', '123'),
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
