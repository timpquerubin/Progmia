-- phpMyAdmin SQL Dump
-- version 4.1.12
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jan 10, 2018 at 07:31 AM
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
-- Table structure for table `avatar`
--

CREATE TABLE IF NOT EXISTS `avatar` (
  `AVTR_ID` varchar(255) NOT NULL,
  `AVTR_NAME` varchar(50) DEFAULT NULL,
  `AVTR_SPRITE_FILENAME` varchar(255) DEFAULT NULL,
  `AVTR_THUMBNAIL_FILENAME` varchar(255) DEFAULT NULL,
  `AVTR_FRONTVIEW_FILENAME` varchar(255) DEFAULT NULL,
  `AVTR_HEIGHT` float DEFAULT NULL,
  `AVTR_WIDTH` float DEFAULT NULL,
  PRIMARY KEY (`AVTR_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `avatar`
--

INSERT INTO `avatar` (`AVTR_ID`, `AVTR_NAME`, `AVTR_SPRITE_FILENAME`, `AVTR_THUMBNAIL_FILENAME`, `AVTR_FRONTVIEW_FILENAME`, `AVTR_HEIGHT`, `AVTR_WIDTH`) VALUES
('c4ca4238a0b923820dcc509a6f75849b', 'white_girl', 'c4ca4238a0b923820dcc509a6f75849b.png', NULL, 'FRONT_VIEW1.png', 43, 40),
('c81e728d9d4c2f636f067f89cc14862c', 'red_girl', 'c81e728d9d4c2f636f067f89cc14862c.png', NULL, 'FRONT_VIEW2.png', 45, 38),
('cfcd208495d565ef66e7dff9f98764da', 'red_boy', 'cfcd208495d565ef66e7dff9f98764da.png', NULL, 'FRONT_VIEW3.png', 43.6, 31.8);

-- --------------------------------------------------------

--
-- Table structure for table `badges`
--

CREATE TABLE IF NOT EXISTS `badges` (
  `BDG_ID` varchar(255) NOT NULL,
  `BDG_ORDER` int(11) DEFAULT NULL,
  `BDG_NAME` varchar(255) DEFAULT NULL,
  `BDG_DESCRIPTION` varchar(255) DEFAULT NULL,
  `BDG_IMG_FILENAME` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`BDG_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `badges`
--

INSERT INTO `badges` (`BDG_ID`, `BDG_ORDER`, `BDG_NAME`, `BDG_DESCRIPTION`, `BDG_IMG_FILENAME`) VALUES
('1', 1, NULL, NULL, 'BADGE-01.png'),
('10', 10, NULL, NULL, 'BADGE-10.png'),
('11', 11, NULL, NULL, 'BADGE-11.png'),
('12', 12, NULL, NULL, 'BADGE-12.png'),
('2', 2, NULL, NULL, 'BADGE-02.png'),
('3', 3, NULL, '', 'BADGE-03.png'),
('4', 4, NULL, NULL, 'BADGE-04.png'),
('5', 5, NULL, NULL, 'BADGE-05.png'),
('6', 6, NULL, NULL, 'BADGE-06.png'),
('7', 7, NULL, NULL, 'BADGE-07.png'),
('8', 8, NULL, NULL, 'BADGE-08.png'),
('9', 9, NULL, NULL, 'BADGE-09.png');

-- --------------------------------------------------------

--
-- Table structure for table `level`
--

CREATE TABLE IF NOT EXISTS `level` (
  `LVL_ID` varchar(255) NOT NULL,
  `STG_ID` varchar(255) DEFAULT NULL,
  `LVL_NUM` int(11) NOT NULL,
  `LVL_GRID` text,
  `LVL_FILENAME` varchar(50) DEFAULT NULL,
  `LVL_STARTPOINT` varchar(255) DEFAULT NULL,
  `LVL_NUMCOLS` varchar(10) DEFAULT NULL,
  `LVL_CREATEDAT` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `LVL_UPDATEDAT` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `LVL_IMGHEIGHT` int(11) DEFAULT NULL,
  `LVL_IMGWIDTH` int(11) DEFAULT NULL,
  `LVL_NAME` varchar(50) DEFAULT NULL,
  `LVL_DESC` text,
  PRIMARY KEY (`LVL_ID`),
  KEY `MAP_ID` (`LVL_ID`),
  KEY `MAP_ID_3` (`LVL_ID`),
  KEY `STAGE` (`STG_ID`),
  FULLTEXT KEY `MAP_ID_2` (`LVL_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `level`
--

INSERT INTO `level` (`LVL_ID`, `STG_ID`, `LVL_NUM`, `LVL_GRID`, `LVL_FILENAME`, `LVL_STARTPOINT`, `LVL_NUMCOLS`, `LVL_CREATEDAT`, `LVL_UPDATEDAT`, `LVL_IMGHEIGHT`, `LVL_IMGWIDTH`, `LVL_NAME`, `LVL_DESC`) VALUES
('11063c44f1a827a14fdcda88a7f098d5', '1STG_BS', 1, '[5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 5, 5, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 4, 5, 5, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 4, 5, 5, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 4, 5, 5, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5]', 'level_1_temp.png', '[72,56]', '50', '2017-08-26 04:35:32', '2017-08-26 04:35:32', 112, 800, NULL, NULL),
('2662293801155867a2c8bbea88cc782a', '1STG_BS', 2, '[5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 5, 5, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 5, 5, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 5, 5, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 5, 5, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 5, 5, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 5, 5, 0, 0, 0, 0, 0, 5, 0, 0, 0, 0, 0, 5, 0, 0, 0, 0, 0, 5, 5, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 5, 5, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 5, 5, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 5, 5, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 5, 5, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 5, 5, 0, 0, 0, 0, 0, 5, 0, 0, 0, 0, 0, 5, 0, 0, 0, 0, 0, 5, 5, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 5, 5, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 5, 5, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 5, 5, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 5, 5, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5]', 'basic_map.png', '[56,264]', '19', '2017-09-16 03:54:43', '2017-09-16 03:54:43', 320, 304, NULL, NULL),
('9c6d4eba7dd0a13b564c66caf53265ac', '1STG_BS', 3, '[0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 5, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 5, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 5, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 4, 5, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 5, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 4, 5, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 5, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 4, 5, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 5, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 0, 0, 0, 0, 0, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 5, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 5, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 5, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 5, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 5, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 5, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 5, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 5, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 5, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0]', 'leve_2_temp_new.png', '[72,152]', '31', '2017-08-30 22:13:13', '2017-08-30 22:13:13', 208, 496, NULL, NULL),
('a070085dcfee15fbdd6c4e9096ac28a6', '1STG_BS', 4, '[5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 5, 5, 5, 5, 5, 5, 5, 5, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 5, 5, 5, 5, 5, 5, 5, 5, 0, 0, 6, 0, 0, 0, 0, 0, 3, 0, 0, 5, 5, 5, 5, 5, 5, 5, 5, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 5, 5, 5, 5, 5, 5, 5, 5, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 5, 5, 5, 5, 5, 5, 5, 5, 0, 0, 0, 0, 0, 5, 5, 5, 5, 5, 5, 5, 5, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 5, 5, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 4, 5, 5, 0, 0, 0, 0, 0, 0, 0, 0, 6, 0, 0, 0, 0, 0, 0, 0, 4, 5, 5, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 4, 5, 5, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 5, 5, 5, 5, 5, 5, 5, 5, 0, 0, 0, 0, 0, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 5, 5, 5, 5, 5, 5, 5, 5, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 5, 5, 5, 5, 5, 5, 5, 5, 0, 0, 6, 0, 0, 0, 0, 0, 6, 0, 0, 5, 5, 5, 5, 5, 5, 5, 5, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 5, 5, 5, 5, 5, 5, 5, 5, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5]', 'level4_coins_template.png', '[56,152]', '19', '2017-09-06 21:50:49', '2017-09-06 21:50:49', 304, 304, NULL, NULL),
('c9f0f895fb98ab9159f51fd0297e236d', '1STG_BS', 7, '[5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 5, 5, 5, 5, 5, 5, 5, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 5, 5, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 5, 5, 5, 5, 5, 5, 5, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 4, 5, 5, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 5, 5, 5, 5, 5, 5, 5, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 4, 5, 5, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 5, 5, 5, 5, 5, 5, 5, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 4, 5, 5, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 5, 5, 5, 5, 5, 5, 5, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 5, 5, 5, 5, 5, 5, 5, 5, 0, 0, 0, 0, 0, 5, 5, 5, 5, 5, 5, 5, 0, 0, 0, 0, 0, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 0, 0, 6, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 6, 0, 0, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5]', 'c9f0f895fb98ab9159f51fd0297e236d.png', '[48,48]', '31', '2017-10-03 02:46:25', '2017-10-03 02:46:25', 208, 496, 'Basic Syntax - Level  1', NULL),
('d7d7ab2a0d92daa06cd87a27986d8c17', '1STG_BS', 5, '[5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 0, 4, 4, 4, 0, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 0, 0, 0, 0, 0, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 0, 0, 0, 0, 0, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 0, 0, 0, 0, 0, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 0, 0, 0, 0, 0, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 0, 0, 0, 0, 0, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 0, 0, 0, 0, 0, 5, 5, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 5, 5, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 5, 5, 0, 0, 6, 0, 0, 0, 0, 0, 6, 0, 0, 0, 0, 0, 7, 0, 0, 5, 5, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 5, 5, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 5, 5, 0, 0, 0, 0, 0, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 0, 0, 0, 0, 0, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 0, 0, 0, 0, 0, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 0, 0, 0, 0, 0, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 0, 0, 0, 0, 0, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 0, 0, 0, 0, 0, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5]', 'sample_bully_map.png', '[56,264]', '19', '2017-09-21 00:29:46', '2017-09-21 00:29:46', 320, 304, NULL, NULL),
('f7692c3fde7b0d80348a36279d5b4563', '1STG_BS', 6, '[5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 5, 5, 5, 5, 4, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 5, 5, 5, 5, 4, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 5, 5, 5, 5, 4, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 5, 5, 5, 5, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 0, 0, 0, 0, 0, 5, 5, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 5, 5, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 5, 5, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 5, 5, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 5, 5, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 5, 5, 0, 0, 0, 0, 0, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 5, 5, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 5, 5, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 5, 5, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 5, 5, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 0, 0, 0, 0, 0, 5, 5, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 5, 5, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 5, 5, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 5, 5, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 5, 5, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 5, 5, 0, 0, 0, 0, 0, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 0, 0, 0, 0, 0, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 0, 0, 0, 0, 0, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 0, 0, 0, 0, 0, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 0, 0, 0, 0, 0, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 0, 0, 0, 0, 0, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5]', 'level1_loop_template.png', '[56,440]', '19', '2017-09-05 02:17:41', '2017-09-05 02:17:41', 496, 304, NULL, NULL),
('fffa9ebc85a76239c8981c0439211e70', '2STG_IS', 1, '[0, 0, 0, 0, 0, 0, 0, 5, 5, 5, 5, 5, 5, 5, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 5, 0, 0, 0, 0, 0, 5, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 5, 0, 0, 0, 0, 0, 5, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 5, 0, 0, 3, 0, 0, 5, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 5, 0, 0, 0, 0, 0, 5, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 5, 0, 0, 0, 0, 0, 5, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 5, 0, 0, 0, 0, 0, 5, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 5, 0, 0, 0, 0, 0, 5, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 5, 0, 0, 0, 0, 0, 5, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 5, 0, 0, 0, 0, 0, 5, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 5, 0, 0, 0, 0, 0, 5, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 5, 0, 0, 0, 0, 0, 5, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 5, 0, 0, 0, 0, 0, 5, 0, 0, 0, 0, 0, 0, 0, 5, 5, 5, 5, 5, 5, 5, 5, 0, 0, 0, 0, 0, 5, 5, 5, 5, 5, 5, 5, 5, 5, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 5, 5, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 4, 5, 5, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 4, 5, 5, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 4, 5, 5, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5]', 'level3_template.png', '[72,264]', '21', '2017-08-31 15:52:52', '2017-08-31 15:52:52', 320, 336, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `objective`
--

CREATE TABLE IF NOT EXISTS `objective` (
  `LVL_ID` varchar(255) NOT NULL,
  `OBJ_NUM` int(11) NOT NULL,
  `OBJ_DESC` varchar(100) DEFAULT NULL,
  `OBJ_JSONVAL` text,
  `OBJ_POINTS` int(11) DEFAULT NULL,
  PRIMARY KEY (`LVL_ID`,`OBJ_NUM`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `objective`
--

INSERT INTO `objective` (`LVL_ID`, `OBJ_NUM`, `OBJ_DESC`, `OBJ_JSONVAL`, `OBJ_POINTS`) VALUES
('11063c44f1a827a14fdcda88a7f098d5', 1, 'asdasd', '{"asdasd":"asdasd"}', 0),
('11063c44f1a827a14fdcda88a7f098d5', 2, 'asdasd', '{"asdasd":"asdasd"}', 0),
('11063c44f1a827a14fdcda88a7f098d5', 3, 'asdasd', '{"asdasd":"asdasd"}', 0),
('11063c44f1a827a14fdcda88a7f098d5', 4, 'asdasd', '{"asdasd":"asdasd"}', 0),
('c9f0f895fb98ab9159f51fd0297e236d', 1, 'Successfully finish level', '{"Finish": true}', NULL),
('c9f0f895fb98ab9159f51fd0297e236d', 2, 'Finish level with max health', '{"Health":"100"}', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `player`
--

CREATE TABLE IF NOT EXISTS `player` (
  `USER_ID` varchar(255) NOT NULL,
  `AVTR_ID` varchar(255) NOT NULL,
  `PLYR_GOLD` int(11) DEFAULT NULL,
  `PLYR_POINTS` int(11) DEFAULT NULL,
  `PLYR_FINISHED` set('123123123123123123123123123123123') DEFAULT NULL,
  PRIMARY KEY (`USER_ID`,`AVTR_ID`),
  KEY `AVATAR_ID` (`AVTR_ID`),
  KEY `AVTR_ID` (`AVTR_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `player`
--

INSERT INTO `player` (`USER_ID`, `AVTR_ID`, `PLYR_GOLD`, `PLYR_POINTS`, `PLYR_FINISHED`) VALUES
('1', 'c4ca4238a0b923820dcc509a6f75849b', 3, 33, ''),
('2', 'c4ca4238a0b923820dcc509a6f75849b', 3, 33, '');

-- --------------------------------------------------------

--
-- Table structure for table `progress`
--

CREATE TABLE IF NOT EXISTS `progress` (
  `PROG_ID` int(11) NOT NULL AUTO_INCREMENT,
  `BDG_ID` varchar(255) DEFAULT NULL,
  `USER_ID` varchar(255) DEFAULT NULL,
  `LVL_ID` varchar(255) DEFAULT NULL,
  `GAME_SCORE` int(11) DEFAULT NULL,
  `QUIZ_SCORE` int(11) DEFAULT NULL,
  `DATE_PLAYED` datetime NOT NULL,
  PRIMARY KEY (`PROG_ID`),
  KEY `USER_ID` (`USER_ID`),
  KEY `LVL_ID` (`LVL_ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `progress`
--

INSERT INTO `progress` (`PROG_ID`, `BDG_ID`, `USER_ID`, `LVL_ID`, `GAME_SCORE`, `QUIZ_SCORE`, `DATE_PLAYED`) VALUES
(1, NULL, '1', '11063c44f1a827a14fdcda88a7f098d5', 1000, NULL, '2017-11-09 06:14:07'),
(2, NULL, '1', '2662293801155867a2c8bbea88cc782a', 2000, NULL, '0000-00-00 00:00:00'),
(3, NULL, '1', '9c6d4eba7dd0a13b564c66caf53265ac', 3000, NULL, '0000-00-00 00:00:00'),
(4, NULL, '1', 'a070085dcfee15fbdd6c4e9096ac28a6', 0, NULL, '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `questionnaire`
--

CREATE TABLE IF NOT EXISTS `questionnaire` (
  `LVL_ID` varchar(255) NOT NULL,
  `QSTN` text NOT NULL,
  `QSTN_NUM` int(11) NOT NULL,
  `CHOICE_1` text NOT NULL,
  `CHOICE_2` text NOT NULL,
  `CHOICE_3` text NOT NULL,
  `CHOICE_4` text NOT NULL,
  KEY `QUIZ_ID` (`LVL_ID`),
  KEY `LVL_ID` (`LVL_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `role`
--

CREATE TABLE IF NOT EXISTS `role` (
  `ROLE_ID` int(11) NOT NULL AUTO_INCREMENT,
  `ROLE_NAME` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`ROLE_ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `role`
--

INSERT INTO `role` (`ROLE_ID`, `ROLE_NAME`) VALUES
(1, 'User'),
(2, 'Admin'),
(3, 'Teacher');

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

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `USER_ID` varchar(255) NOT NULL,
  `USER_USERNAME` varchar(30) DEFAULT NULL,
  `USER_PASSWORD` text,
  `USER_FNAME` varchar(30) DEFAULT NULL,
  `USER_MNAME` varchar(30) DEFAULT NULL,
  `USER_LNAME` varchar(30) DEFAULT NULL,
  `USER_BDAY` varchar(20) DEFAULT NULL,
  `USER_GENDER` varchar(1) DEFAULT NULL,
  `USER_ADDRESS` varchar(100) DEFAULT NULL,
  `USER_EMAIL` varchar(50) DEFAULT NULL,
  `USER_ROLE` int(11) DEFAULT NULL,
  PRIMARY KEY (`USER_ID`),
  KEY `USER_ROLE` (`USER_ROLE`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`USER_ID`, `USER_USERNAME`, `USER_PASSWORD`, `USER_FNAME`, `USER_MNAME`, `USER_LNAME`, `USER_BDAY`, `USER_GENDER`, `USER_ADDRESS`, `USER_EMAIL`, `USER_ROLE`) VALUES
('1', 'triston', '12345', 'Triston Ian Miguel', 'Papag', 'Querubin', 'September 25 1995', 'M', '#73 Barangay Tagapo, Sta. Rosa, Laguna', 'timpquerubin@gmail.com', 2),
('2', 'jjcaraon', '12345', 'Julibee Joy', 'Andrade', 'Caraon', 'January 31 1996', 'F', 'Sta. Rosa, Laguna', 'joycaraon@ymail.com', 1),
('3', 'smpapag', '12345', 'Selwin Mathew', '', 'Papag', 'June 18 2001', 'M', 'Sta. Rosa, Laguna', 'selwin@yahoo.com', 1);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `level`
--
ALTER TABLE `level`
  ADD CONSTRAINT `level_ibfk_1` FOREIGN KEY (`STG_ID`) REFERENCES `stage` (`STG_ID`) ON UPDATE CASCADE;

--
-- Constraints for table `objective`
--
ALTER TABLE `objective`
  ADD CONSTRAINT `objective_ibfk_1` FOREIGN KEY (`LVL_ID`) REFERENCES `level` (`LVL_ID`);

--
-- Constraints for table `player`
--
ALTER TABLE `player`
  ADD CONSTRAINT `player_ibfk_1` FOREIGN KEY (`USER_ID`) REFERENCES `user` (`USER_ID`),
  ADD CONSTRAINT `player_ibfk_2` FOREIGN KEY (`AVTR_ID`) REFERENCES `avatar` (`AVTR_ID`);

--
-- Constraints for table `progress`
--
ALTER TABLE `progress`
  ADD CONSTRAINT `progress_ibfk_1` FOREIGN KEY (`USER_ID`) REFERENCES `user` (`USER_ID`),
  ADD CONSTRAINT `progress_ibfk_2` FOREIGN KEY (`LVL_ID`) REFERENCES `level` (`LVL_ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `questionnaire`
--
ALTER TABLE `questionnaire`
  ADD CONSTRAINT `questionnaire_ibfk_1` FOREIGN KEY (`LVL_ID`) REFERENCES `level` (`LVL_ID`);

--
-- Constraints for table `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `user_ibfk_1` FOREIGN KEY (`USER_ROLE`) REFERENCES `role` (`ROLE_ID`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
