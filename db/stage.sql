-- phpMyAdmin SQL Dump
-- version 4.1.12
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Dec 19, 2017 at 07:56 AM
-- Server version: 5.6.16
-- PHP Version: 5.5.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `progmia`
--

-- --------------------------------------------------------

--
-- Table structure for table `stage`
--

CREATE TABLE IF NOT EXISTS `stage` (
  `STG_ID` varchar(255) NOT NULL,
  `STG_NUM` int(11) NOT NULL,
  `STG_NAME` varchar(50) DEFAULT NULL,
  `STG_DESCRIPTION` text,
  `STG_FILENAME` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`STG_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `stage`
--

INSERT INTO `stage` (`STG_ID`, `STG_NUM`, `STG_NAME`, `STG_DESCRIPTION`, `STG_FILENAME`) VALUES
('1STG_BS', 1, 'ADMISSIONS OFFICE', 'Basic Syntax', 'Stages-01.png'),
('2STG_IS', 2, 'CAFETERIA', 'If-Statements', 'Stages-02.png'),
('3STG_FUNCT', 3, 'LIBRARY', 'Functions', 'Stages-03.png'),
('4STG_CLASS', 4, 'MAIN BLDG.', 'Classes', 'Stages-04.png'),
('5STG_LOOP', 5, 'OVAL', 'Loops', 'Stages-05.png');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
