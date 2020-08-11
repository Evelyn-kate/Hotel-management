-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Feb 09, 2019 at 10:49 AM
-- Server version: 5.7.19
-- PHP Version: 5.6.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hotel`
--
CREATE DATABASE IF NOT EXISTS `hotel` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `hotel`;

-- --------------------------------------------------------

--
-- Table structure for table `payments`
--

DROP TABLE IF EXISTS `payments`;
CREATE TABLE IF NOT EXISTS `payments` (
  `Payment_ID` int(11) NOT NULL AUTO_INCREMENT,
  `Amount` int(10) NOT NULL,
  `Status` varchar(20) NOT NULL DEFAULT 'Complete',
  `Method` varchar(50) NOT NULL,
  `Transaction_ID` int(20) NOT NULL,
  `Name` varchar(128) NOT NULL,
  `Reservation_ID` int(10) NOT NULL,
  `Reservation_Code` int(20) NOT NULL,
  `Payment_Date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`Payment_ID`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `payments`
--

INSERT INTO `payments` (`Payment_ID`, `Amount`, `Status`, `Method`, `Transaction_ID`, `Name`, `Reservation_ID`, `Reservation_Code`, `Payment_Date`) VALUES
(1, 5000, 'Complete', 'Mobile Money', 1200053696, 'KOLLE HARVEY', 6, 1104007331, '2019-02-01 21:25:49'),
(2, 10000, 'Complete', 'Mobile Money', 1133457721, 'KOLLE HARVEY', 7, 1023904106, '2019-02-01 22:43:38');

-- --------------------------------------------------------

--
-- Table structure for table `reservations`
--

DROP TABLE IF EXISTS `reservations`;
CREATE TABLE IF NOT EXISTS `reservations` (
  `Reservation_ID` int(11) NOT NULL AUTO_INCREMENT,
  `Name` varchar(50) NOT NULL,
  `Check_in_Date` date NOT NULL,
  `Check_out_Date` date NOT NULL,
  `Duration` int(10) NOT NULL,
  `Room_No` varchar(6) NOT NULL,
  `Amount` int(10) NOT NULL,
  `Code` int(20) NOT NULL,
  `Reservation_Date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`Reservation_ID`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `reservations`
--

INSERT INTO `reservations` (`Reservation_ID`, `Name`, `Check_in_Date`, `Check_out_Date`, `Duration`, `Room_No`, `Amount`, `Code`, `Reservation_Date`) VALUES
(1, 'KOLLE HARVEY', '2019-01-27', '2019-01-29', 0, 'RM101', 5000, 0, '2019-02-01 12:52:32'),
(2, 'KOLLE HARVEY', '2019-01-27', '2019-01-29', 0, 'RM101', 5000, 0, '2019-02-01 12:54:38'),
(3, 'KOLLE HARVEY', '2019-01-27', '2019-01-29', 0, 'RM101', 5000, 0, '2019-02-01 12:55:58'),
(4, 'KOLLE HARVEY', '2019-01-27', '2019-01-29', 0, 'RM101', 5000, 1225977428, '2019-02-01 13:00:33'),
(5, 'KOLLE HARVEY', '2019-01-27', '2019-02-05', 0, 'RM101', 5000, 1397530665, '2019-02-01 20:45:17'),
(6, 'KOLLE HARVEY', '2019-01-27', '2019-02-05', 0, 'RM101', 5000, 1104007331, '2019-02-01 20:57:25'),
(7, 'KOLLE HARVEY', '2019-02-01', '2019-02-03', 2, 'RM101', 10000, 1023904106, '2019-02-01 22:43:28'),
(8, 'KOLLE HARVEY', '2019-02-04', '2019-02-13', 9, 'RM101', 45000, 1406912909, '2019-02-01 22:50:47');

-- --------------------------------------------------------

--
-- Table structure for table `rooms`
--

DROP TABLE IF EXISTS `rooms`;
CREATE TABLE IF NOT EXISTS `rooms` (
  `Room_No` varchar(6) NOT NULL,
  `Type` varchar(20) NOT NULL,
  `Picture` varchar(128) NOT NULL,
  `Description` varchar(128) NOT NULL,
  `Status` varchar(20) NOT NULL,
  `Price` int(10) NOT NULL,
  `Registration_Date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`Room_No`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `rooms`
--

INSERT INTO `rooms` (`Room_No`, `Type`, `Picture`, `Description`, `Status`, `Price`, `Registration_Date`) VALUES
('RM101', 'Suites', 'rooms/bg.jpg', 'Hello World', 'Reserved', 5000, '2019-02-01 12:52:21');

-- --------------------------------------------------------

--
-- Table structure for table `roomstatus`
--

DROP TABLE IF EXISTS `roomstatus`;
CREATE TABLE IF NOT EXISTS `roomstatus` (
  `Room_No` varchar(6) NOT NULL,
  `Status` varchar(20) NOT NULL DEFAULT 'Available',
  `Starting_Date` date DEFAULT NULL,
  `Ending_Date` date DEFAULT NULL,
  `Status_Update_Time` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`Room_No`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `roomstatus`
--

INSERT INTO `roomstatus` (`Room_No`, `Status`, `Starting_Date`, `Ending_Date`, `Status_Update_Time`) VALUES
('RM101', 'Reserved', '2019-02-04', '2019-02-13', '2019-02-01 22:50:47'),
('RM102', 'Available', NULL, NULL, '2019-02-01 22:48:46'),
('RM103', 'Available', NULL, NULL, '2019-02-01 22:48:46'),
('RM104', 'Available', NULL, NULL, '2019-02-01 22:48:46'),
('RM105', 'Available', NULL, NULL, '2019-02-01 22:48:46'),
('RM106', 'Available', NULL, NULL, '2019-02-01 22:48:46'),
('RM107', 'Available', NULL, NULL, '2019-02-01 22:48:46');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `User_ID` int(11) NOT NULL AUTO_INCREMENT,
  `Username` varchar(50) NOT NULL,
  `Telephone` varchar(25) NOT NULL,
  `Email` varchar(50) NOT NULL,
  `Address` varchar(50) NOT NULL,
  `Password` varchar(128) NOT NULL,
  `Registration_Date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`User_ID`),
  UNIQUE KEY `Username` (`Username`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`User_ID`, `Username`, `Telephone`, `Email`, `Address`, `Password`, `Registration_Date`) VALUES
(1, 'KOLLE HARVEY', '679140964', 'harveykolle@gmail.com', 'Molyko', '$2y$10$XKopPo4aO27Qjl0BmeEMZ./61qrVTSsgsXhfdDfbqr7Oe4t59FAam', '2019-01-31 17:08:53');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
