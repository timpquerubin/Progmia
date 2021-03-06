-- phpMyAdmin SQL Dump
-- version 4.1.12
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Feb 14, 2018 at 05:19 AM
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
('a87ff679a2f3e71d9181a67b7542122c', 'AVTR5', 'a87ff679a2f3e71d9181a67b7542122c.png', 'a87ff679a2f3e71d9181a67b7542122c.png', 'a87ff679a2f3e71d9181a67b7542122c.png', NULL, NULL),
('c4ca4238a0b923820dcc509a6f75849b', 'AVTR2', 'c4ca4238a0b923820dcc509a6f75849b.png', 'c4ca4238a0b923820dcc509a6f75849b.png', 'c4ca4238a0b923820dcc509a6f75849b.png', NULL, NULL),
('c81e728d9d4c2f636f067f89cc14862c', 'AVTR3', 'c81e728d9d4c2f636f067f89cc14862c.png', 'c81e728d9d4c2f636f067f89cc14862c.png', 'c81e728d9d4c2f636f067f89cc14862c.png', NULL, NULL),
('cfcd208495d565ef66e7dff9f98764da', 'AVTR1', 'cfcd208495d565ef66e7dff9f98764da.png', 'cfcd208495d565ef66e7dff9f98764da.png', 'cfcd208495d565ef66e7dff9f98764da.png', NULL, NULL),
('e4da3b7fbbce2345d7772b0674a318d5', 'AVTR6', 'e4da3b7fbbce2345d7772b0674a318d5.png', 'e4da3b7fbbce2345d7772b0674a318d5.png', 'e4da3b7fbbce2345d7772b0674a318d5.png', NULL, NULL),
('eccbc87e4b5ce2fe28308fd9f2a7baf3', 'AVTR4', 'eccbc87e4b5ce2fe28308fd9f2a7baf3.png', 'eccbc87e4b5ce2fe28308fd9f2a7baf3.png', 'eccbc87e4b5ce2fe28308fd9f2a7baf3.png', NULL, NULL);

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
-- Table structure for table `bully`
--

CREATE TABLE IF NOT EXISTS `bully` (
  `BLY_ID` varchar(255) NOT NULL,
  `LVL_ID` varchar(255) DEFAULT NULL,
  `BLY_NAME` varchar(20) NOT NULL,
  `BLY_IMAGEURL` varchar(255) DEFAULT NULL,
  `BLY_THUMB_FILENAME` varchar(50) NOT NULL,
  `BLY_SPAWNPOINT` varchar(20) DEFAULT NULL,
  `BLY_MAXHP` int(3) DEFAULT NULL,
  PRIMARY KEY (`BLY_ID`),
  KEY `LVL_ID` (`LVL_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bully`
--

INSERT INTO `bully` (`BLY_ID`, `LVL_ID`, `BLY_NAME`, `BLY_IMAGEURL`, `BLY_THUMB_FILENAME`, `BLY_SPAWNPOINT`, `BLY_MAXHP`) VALUES
('1630f1f6abc60263259bf381ea8fa745', 'f7147e40ff42c040767de9b414e0409a', 'Baubau', 'BULLY-08.png', '', '[440,56]', 2),
('48e4e97fe6d65b364c85be87ee77e334', '5304dfce9915f8ab8101960a1d42c13c', 'Jake', 'BULLY-08.png', '', '[248,56]', 2),
('957a1a521b7edc68aa3a9814956f0185', '31a1e5bfe50a73474205d60caa61bcba', 'Novo', 'BULLY-08.png', '', '[248,56]', 2),
('e4063dee7c1cef380d72ff537fd10ceb', 'f7147e40ff42c040767de9b414e0409a', 'Jake', 'BULLY-07.png', '', '[248,56]', 1);

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
('11063c44f1a827a14fdcda88a7f098d5', '2STG_IS', 1, '[5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 5, 5, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 4, 5, 5, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 4, 5, 5, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 4, 5, 5, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5]', 'level_1_temp.png', '[72,56]', '50', '2017-08-26 04:35:32', '2017-08-26 04:35:32', 112, 800, NULL, NULL),
('31a1e5bfe50a73474205d60caa61bcba', '1STG_BS', 1, '[5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 5, 5, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 4, 5, 5, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 4, 5, 5, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 4, 5, 5, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5]', '31a1e5bfe50a73474205d60caa61bcba.png', '[56,56]', '23', '2018-01-29 13:16:10', '2018-01-29 13:16:10', 112, 368, 'Basic Syntax Floor 1', 'Variable Declaration Level'),
('510fb9ed3a51f8ede848403e79aeca1a', '2STG_IS', 9, '[5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 0, 0, 0, 0, 0, 0, 0, 0, 0, 5, 0, 0, 5, 5, 5, 5, 0, 0, 5, 0, 0, 0, 0, 0, 0, 0, 0, 0, 5, 5, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 5, 5, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 7, 0, 0, 0, 0, 0, 7, 0, 0, 0, 0, 0, 7, 4, 5, 5, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 4, 5, 5, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5]', '510fb9ed3a51f8ede848403e79aeca1a.png', '[56,72]', '30', '2017-12-19 07:47:29', '2017-12-19 07:47:29', 128, 480, 'Loop Basics', NULL),
('5304dfce9915f8ab8101960a1d42c13c', '1STG_BS', 3, '[5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 5, 5, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 4, 5, 5, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 4, 5, 5, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 4, 5, 5, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5]', '5304dfce9915f8ab8101960a1d42c13c.png', '[56,56]', '23', '2018-02-08 10:47:36', '2018-02-08 10:47:36', 112, 368, 'Basic Array 1', 'Learn how to declare arrays'),
('6380cd6686aef3cf610e8e22576907e7', '2STG_IS', 8, '[5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 0, 0, 0, 0, 0, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 0, 0, 0, 0, 0, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 0, 0, 0, 0, 0, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 0, 0, 7, 0, 0, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 0, 0, 0, 0, 0, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 0, 0, 0, 0, 0, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 0, 0, 0, 0, 0, 5, 5, 5, 5, 5, 5, 5, 5, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 5, 5, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 5, 5, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 4, 5, 5, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 4, 5, 5, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5]', '6380cd6686aef3cf610e8e22576907e7.png', '[56,184]', '19', '2017-12-19 07:09:18', '2017-12-19 07:09:18', 240, 304, 'if-statement introduction', NULL),
('9c6d4eba7dd0a13b564c66caf53265ac', '2STG_IS', 3, '[0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 5, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 5, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 5, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 4, 5, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 5, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 4, 5, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 5, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 4, 5, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 5, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 0, 0, 0, 0, 0, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 5, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 5, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 5, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 5, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 5, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 5, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 5, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 5, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 5, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0]', 'leve_2_temp_new.png', '[72,152]', '31', '2017-08-30 22:13:13', '2017-08-30 22:13:13', 208, 496, NULL, NULL),
('a070085dcfee15fbdd6c4e9096ac28a6', '2STG_IS', 4, '[5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 5, 5, 5, 5, 5, 5, 5, 5, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 5, 5, 5, 5, 5, 5, 5, 5, 0, 0, 6, 0, 0, 0, 0, 0, 3, 0, 0, 5, 5, 5, 5, 5, 5, 5, 5, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 5, 5, 5, 5, 5, 5, 5, 5, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 5, 5, 5, 5, 5, 5, 5, 5, 0, 0, 0, 0, 0, 5, 5, 5, 5, 5, 5, 5, 5, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 5, 5, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 4, 5, 5, 0, 0, 0, 0, 0, 0, 0, 0, 6, 0, 0, 0, 0, 0, 0, 0, 4, 5, 5, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 4, 5, 5, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 5, 5, 5, 5, 5, 5, 5, 5, 0, 0, 0, 0, 0, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 5, 5, 5, 5, 5, 5, 5, 5, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 5, 5, 5, 5, 5, 5, 5, 5, 0, 0, 6, 0, 0, 0, 0, 0, 6, 0, 0, 5, 5, 5, 5, 5, 5, 5, 5, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 5, 5, 5, 5, 5, 5, 5, 5, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5]', 'level4_coins_template.png', '[56,152]', '19', '2017-09-06 21:50:49', '2017-09-06 21:50:49', 304, 304, NULL, NULL),
('c9f0f895fb98ab9159f51fd0297e236d', '2STG_IS', 7, '[5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 5, 5, 5, 5, 5, 5, 5, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 5, 5, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 5, 5, 5, 5, 5, 5, 5, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 4, 5, 5, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 5, 5, 5, 5, 5, 5, 5, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 4, 5, 5, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 5, 5, 5, 5, 5, 5, 5, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 4, 5, 5, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 5, 5, 5, 5, 5, 5, 5, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 5, 5, 5, 5, 5, 5, 5, 5, 0, 0, 0, 0, 0, 5, 5, 5, 5, 5, 5, 5, 0, 0, 0, 0, 0, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 0, 0, 6, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 6, 0, 0, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5]', 'c9f0f895fb98ab9159f51fd0297e236d.png', '[48,48]', '31', '2017-10-03 02:46:25', '2017-10-03 02:46:25', 208, 496, 'Basic Syntax - Level  1', NULL),
('d7d7ab2a0d92daa06cd87a27986d8c17', '2STG_IS', 5, '[5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 0, 4, 4, 4, 0, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 0, 0, 0, 0, 0, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 0, 0, 0, 0, 0, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 0, 0, 0, 0, 0, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 0, 0, 0, 0, 0, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 0, 0, 0, 0, 0, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 0, 0, 0, 0, 0, 5, 5, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 5, 5, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 5, 5, 0, 0, 6, 0, 0, 0, 0, 0, 6, 0, 0, 0, 0, 0, 7, 0, 0, 5, 5, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 5, 5, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 5, 5, 0, 0, 0, 0, 0, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 0, 0, 0, 0, 0, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 0, 0, 0, 0, 0, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 0, 0, 0, 0, 0, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 0, 0, 0, 0, 0, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 0, 0, 0, 0, 0, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5]', 'sample_bully_map.png', '[56,264]', '19', '2017-09-21 00:29:46', '2017-09-21 00:29:46', 320, 304, NULL, NULL),
('f7147e40ff42c040767de9b414e0409a', '1STG_BS', 2, '[5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 5, 5, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 4, 5, 5, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 4, 5, 5, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 4, 5, 5, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5]', 'f7147e40ff42c040767de9b414e0409a.png', '[56,56]', '35', '2018-02-08 00:18:30', '2018-02-08 00:18:30', 112, 560, 'Programming Basics Level 2', 'This level will help implement some more basic syntax about Javascript programming'),
('f7692c3fde7b0d80348a36279d5b4563', '2STG_IS', 6, '[5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 5, 5, 5, 5, 4, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 5, 5, 5, 5, 4, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 5, 5, 5, 5, 4, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 5, 5, 5, 5, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 0, 0, 0, 0, 0, 5, 5, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 5, 5, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 5, 5, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 5, 5, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 5, 5, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 5, 5, 0, 0, 0, 0, 0, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 5, 5, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 5, 5, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 5, 5, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 5, 5, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 0, 0, 0, 0, 0, 5, 5, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 5, 5, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 5, 5, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 5, 5, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 5, 5, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 5, 5, 0, 0, 0, 0, 0, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 0, 0, 0, 0, 0, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 0, 0, 0, 0, 0, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 0, 0, 0, 0, 0, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 0, 0, 0, 0, 0, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 0, 0, 0, 0, 0, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5]', 'level1_loop_template.png', '[56,440]', '19', '2017-09-05 02:17:41', '2017-09-05 02:17:41', 496, 304, NULL, NULL),
('fa5953f5d77703da5a23670a95729953', '2STG_IS', 10, '[5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 0, 0, 0, 0, 0, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 0, 0, 0, 0, 0, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 0, 0, 7, 0, 0, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 0, 0, 0, 0, 0, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 0, 0, 0, 0, 0, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 0, 0, 0, 0, 0, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 5, 5, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 4, 5, 5, 0, 0, 0, 0, 0, 0, 0, 0, 6, 0, 0, 0, 0, 0, 6, 0, 0, 0, 0, 0, 0, 0, 4, 5, 5, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 4, 5, 5, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 0, 0, 0, 0, 0, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 0, 0, 0, 0, 0, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 0, 0, 0, 0, 0, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 0, 0, 7, 0, 0, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 0, 0, 0, 0, 0, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 0, 0, 0, 0, 0, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5]', 'fa5953f5d77703da5a23670a95729953.png', '[56,152]', '25', '2017-12-19 08:23:41', '2017-12-19 08:23:41', 304, 400, 'Basic Loop Statements', NULL),
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
('31a1e5bfe50a73474205d60caa61bcba', 1, 'Successfully finish level', '{"Finish":"True"}', 200),
('31a1e5bfe50a73474205d60caa61bcba', 2, 'Defeat 1 Bully', '{"Defeat Bullies":"1"}', 100),
('31a1e5bfe50a73474205d60caa61bcba', 3, 'Finish level with full health', '{"Health":"100"}', 100),
('510fb9ed3a51f8ede848403e79aeca1a', 1, 'Successfully finish level', '{"Finish":"True"}', 200),
('510fb9ed3a51f8ede848403e79aeca1a', 2, 'Defeat 3 Bullies', '{"Defeat Bullies":"3"}', 100),
('510fb9ed3a51f8ede848403e79aeca1a', 3, 'Successfully implement loop statement', '{"Use command":"Loop"}', 100),
('5304dfce9915f8ab8101960a1d42c13c', 1, 'Successfully finish level', '{"Finish":"true"}', 100),
('5304dfce9915f8ab8101960a1d42c13c', 2, 'Defeat 1 Bully', '{"Defeat Bullies":"1"}', 100),
('5304dfce9915f8ab8101960a1d42c13c', 3, 'Finish level with full health', '{"Health":"100"}', 100),
('f7147e40ff42c040767de9b414e0409a', 1, 'Successfully finish level', '{"Finish":"True"}', 100),
('f7147e40ff42c040767de9b414e0409a', 2, 'Defeat 2 Bullies', '{"Defeat Bullies":"2"}', 100),
('f7147e40ff42c040767de9b414e0409a', 3, 'Successfully finish level with at least 80 percent health', '{"Health":"80"}', 100),
('fa5953f5d77703da5a23670a95729953', 1, 'Successfully finish level', '{"Finish":"True"}', 200),
('fa5953f5d77703da5a23670a95729953', 2, 'Defeat 2 Bullies', '{"Defeat Bullies":"2"}', 100),
('fa5953f5d77703da5a23670a95729953', 3, 'Collect 2 Coins', '{"Collect Coins":"2"}', 100),
('fa5953f5d77703da5a23670a95729953', 4, 'Finish level with more than 50% health', '{"Health":"50"}', 100);

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=59 ;

--
-- Dumping data for table `progress`
--

INSERT INTO `progress` (`PROG_ID`, `BDG_ID`, `USER_ID`, `LVL_ID`, `GAME_SCORE`, `QUIZ_SCORE`, `DATE_PLAYED`) VALUES
(1, NULL, '1', 'fa5953f5d77703da5a23670a95729953', 400, NULL, '0000-00-00 00:00:00'),
(2, NULL, '1', '510fb9ed3a51f8ede848403e79aeca1a', 300, NULL, '0000-00-00 00:00:00'),
(3, NULL, '1', '510fb9ed3a51f8ede848403e79aeca1a', 300, NULL, '0000-00-00 00:00:00'),
(4, NULL, '1', '510fb9ed3a51f8ede848403e79aeca1a', 400, NULL, '0000-00-00 00:00:00'),
(5, NULL, '2', '510fb9ed3a51f8ede848403e79aeca1a', 200, NULL, '0000-00-00 00:00:00'),
(6, NULL, '1', '510fb9ed3a51f8ede848403e79aeca1a', 200, NULL, '0000-00-00 00:00:00'),
(7, NULL, '1', '31a1e5bfe50a73474205d60caa61bcba', 400, NULL, '0000-00-00 00:00:00'),
(8, NULL, '1', 'f7147e40ff42c040767de9b414e0409a', 300, NULL, '0000-00-00 00:00:00'),
(9, NULL, '1', 'f7147e40ff42c040767de9b414e0409a', 200, NULL, '0000-00-00 00:00:00'),
(10, NULL, '1', 'f7147e40ff42c040767de9b414e0409a', 100, NULL, '0000-00-00 00:00:00'),
(11, NULL, '1', '31a1e5bfe50a73474205d60caa61bcba', 200, NULL, '0000-00-00 00:00:00'),
(12, NULL, '1', '5304dfce9915f8ab8101960a1d42c13c', 100, NULL, '0000-00-00 00:00:00'),
(13, NULL, '1', '5304dfce9915f8ab8101960a1d42c13c', 100, NULL, '0000-00-00 00:00:00'),
(14, NULL, '1', '5304dfce9915f8ab8101960a1d42c13c', 100, NULL, '0000-00-00 00:00:00'),
(15, NULL, '1', '5304dfce9915f8ab8101960a1d42c13c', 100, NULL, '0000-00-00 00:00:00'),
(16, NULL, '1', '5304dfce9915f8ab8101960a1d42c13c', 100, NULL, '0000-00-00 00:00:00'),
(17, NULL, '1', '5304dfce9915f8ab8101960a1d42c13c', 100, NULL, '0000-00-00 00:00:00'),
(18, NULL, '1', '5304dfce9915f8ab8101960a1d42c13c', 300, NULL, '0000-00-00 00:00:00'),
(19, NULL, '1', '31a1e5bfe50a73474205d60caa61bcba', 400, NULL, '0000-00-00 00:00:00'),
(20, NULL, '1', '5304dfce9915f8ab8101960a1d42c13c', 100, NULL, '0000-00-00 00:00:00'),
(21, NULL, '1', '5304dfce9915f8ab8101960a1d42c13c', 300, NULL, '0000-00-00 00:00:00'),
(22, NULL, '1', '510fb9ed3a51f8ede848403e79aeca1a', 300, NULL, '0000-00-00 00:00:00'),
(23, NULL, '3', '31a1e5bfe50a73474205d60caa61bcba', 200, NULL, '0000-00-00 00:00:00'),
(24, NULL, '3', '31a1e5bfe50a73474205d60caa61bcba', 400, NULL, '0000-00-00 00:00:00'),
(25, NULL, '3', '31a1e5bfe50a73474205d60caa61bcba', 300, NULL, '0000-00-00 00:00:00'),
(26, NULL, '3', '31a1e5bfe50a73474205d60caa61bcba', 400, NULL, '0000-00-00 00:00:00'),
(27, NULL, '3', '31a1e5bfe50a73474205d60caa61bcba', 400, NULL, '0000-00-00 00:00:00'),
(28, NULL, '3', '31a1e5bfe50a73474205d60caa61bcba', 400, NULL, '0000-00-00 00:00:00'),
(29, NULL, '3', '31a1e5bfe50a73474205d60caa61bcba', 200, NULL, '0000-00-00 00:00:00'),
(30, NULL, '3', '31a1e5bfe50a73474205d60caa61bcba', 200, NULL, '0000-00-00 00:00:00'),
(31, NULL, '3', 'f7147e40ff42c040767de9b414e0409a', 100, NULL, '0000-00-00 00:00:00'),
(32, NULL, '3', 'f7147e40ff42c040767de9b414e0409a', 100, NULL, '0000-00-00 00:00:00'),
(33, NULL, '3', 'f7147e40ff42c040767de9b414e0409a', 100, NULL, '0000-00-00 00:00:00'),
(34, NULL, '3', 'f7147e40ff42c040767de9b414e0409a', 100, NULL, '0000-00-00 00:00:00'),
(35, NULL, '3', 'f7147e40ff42c040767de9b414e0409a', 100, NULL, '0000-00-00 00:00:00'),
(36, NULL, '3', 'f7147e40ff42c040767de9b414e0409a', 100, NULL, '0000-00-00 00:00:00'),
(37, NULL, '3', 'f7147e40ff42c040767de9b414e0409a', 100, NULL, '0000-00-00 00:00:00'),
(38, NULL, '3', '31a1e5bfe50a73474205d60caa61bcba', 200, NULL, '0000-00-00 00:00:00'),
(39, NULL, '3', '31a1e5bfe50a73474205d60caa61bcba', 200, NULL, '0000-00-00 00:00:00'),
(40, NULL, '3', '31a1e5bfe50a73474205d60caa61bcba', 200, NULL, '0000-00-00 00:00:00'),
(41, NULL, '3', '31a1e5bfe50a73474205d60caa61bcba', 200, NULL, '0000-00-00 00:00:00'),
(42, NULL, '3', '31a1e5bfe50a73474205d60caa61bcba', 200, NULL, '0000-00-00 00:00:00'),
(43, NULL, '3', '31a1e5bfe50a73474205d60caa61bcba', 200, NULL, '0000-00-00 00:00:00'),
(44, NULL, '3', '31a1e5bfe50a73474205d60caa61bcba', 200, NULL, '0000-00-00 00:00:00'),
(45, NULL, '3', '31a1e5bfe50a73474205d60caa61bcba', 200, NULL, '0000-00-00 00:00:00'),
(46, NULL, '3', '31a1e5bfe50a73474205d60caa61bcba', 200, NULL, '0000-00-00 00:00:00'),
(47, NULL, '3', '31a1e5bfe50a73474205d60caa61bcba', 200, NULL, '0000-00-00 00:00:00'),
(48, NULL, '3', '31a1e5bfe50a73474205d60caa61bcba', 200, NULL, '0000-00-00 00:00:00'),
(49, NULL, '3', '31a1e5bfe50a73474205d60caa61bcba', 200, NULL, '0000-00-00 00:00:00'),
(50, NULL, '3', '31a1e5bfe50a73474205d60caa61bcba', 200, NULL, '0000-00-00 00:00:00'),
(51, NULL, '3', '31a1e5bfe50a73474205d60caa61bcba', 200, NULL, '0000-00-00 00:00:00'),
(52, NULL, '3', '31a1e5bfe50a73474205d60caa61bcba', 200, NULL, '0000-00-00 00:00:00'),
(53, NULL, '3', '31a1e5bfe50a73474205d60caa61bcba', 200, NULL, '0000-00-00 00:00:00'),
(54, NULL, '3', '31a1e5bfe50a73474205d60caa61bcba', 200, NULL, '0000-00-00 00:00:00'),
(55, NULL, '3', '31a1e5bfe50a73474205d60caa61bcba', 200, NULL, '0000-00-00 00:00:00'),
(56, NULL, '3', '31a1e5bfe50a73474205d60caa61bcba', 200, NULL, '0000-00-00 00:00:00'),
(57, NULL, '3', '31a1e5bfe50a73474205d60caa61bcba', 200, NULL, '0000-00-00 00:00:00'),
(58, NULL, '3', '31a1e5bfe50a73474205d60caa61bcba', 200, NULL, '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `question`
--

CREATE TABLE IF NOT EXISTS `question` (
  `BLY_ID` varchar(255) NOT NULL,
  `QSTN_NUM` int(3) NOT NULL,
  `QSTN_DIALOG` varchar(255) DEFAULT NULL,
  `QSTN_ANSWER` varchar(255) DEFAULT NULL,
  `QSTN_TYPE` varchar(20) NOT NULL,
  PRIMARY KEY (`BLY_ID`,`QSTN_NUM`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `question`
--

INSERT INTO `question` (`BLY_ID`, `QSTN_NUM`, `QSTN_DIALOG`, `QSTN_ANSWER`, `QSTN_TYPE`) VALUES
('1630f1f6abc60263259bf381ea8fa745', 1, 'Declare a Double variable doubleVar with a value of 3.14.', '[{"dataType":"double","var_identifier":"doubleVar","var_value":"3.14"}]', 'variable'),
('1630f1f6abc60263259bf381ea8fa745', 2, 'Declare two String variables fruit_x with a value of "Apple" and fruit_y with a value of "Orange".', '[{"dataType":"String","var_identifier":"fruit_x","var_value":"\\"Apple\\""},{"dataType":"String","var_identifier":"fruit_y","var_value":"\\"Orange\\""}]', 'variable'),
('48e4e97fe6d65b364c85be87ee77e334', 1, 'Declare an Integer Array xArr with values 1, 2, and 3.', '[{"dataType":"int[]","var_identifier":"xArr","var_value":["1","2","3"]}]', 'array'),
('48e4e97fe6d65b364c85be87ee77e334', 2, 'Declare an Array of Strings which has an identifier of supplies with values "pencil", "paper", "ruler" and "notebook".', '[{"dataType":"String[]","var_identifier":"supplies","var_value":["\\"pencil\\"","\\"paper\\"","\\"ruler\\"","\\"notebook\\""]}]', 'array'),
('957a1a521b7edc68aa3a9814956f0185', 1, 'Declare an integer variable x with a value of 5.', '[{"dataType":"int","var_identifier":"x","var_value":"5"}]', 'variable'),
('957a1a521b7edc68aa3a9814956f0185', 2, 'Declare a variable y with a value of 20.', '[{"dataType":"int","var_identifier":"y","var_value":"20"}]', 'variable'),
('e4063dee7c1cef380d72ff537fd10ceb', 1, 'Declare a Boolean variable isBool with a value of false.', '[{"dataType":"bool","var_identifier":"isBool","var_value":"false"}]', 'variable');

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
  `AVTR_ID` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`USER_ID`),
  KEY `USER_ROLE` (`USER_ROLE`),
  KEY `AVTR_ID` (`AVTR_ID`),
  KEY `AVTR_ID_2` (`AVTR_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`USER_ID`, `USER_USERNAME`, `USER_PASSWORD`, `USER_FNAME`, `USER_MNAME`, `USER_LNAME`, `USER_BDAY`, `USER_GENDER`, `USER_ADDRESS`, `USER_EMAIL`, `USER_ROLE`, `AVTR_ID`) VALUES
('1', 'triston', '12345', 'Triston Ian Miguel', 'Papag', 'Querubin', 'September 25 1995', 'M', '#73 Barangay Tagapo, Sta. Rosa, Laguna', 'timpquerubin@gmail.com', 2, 'e4da3b7fbbce2345d7772b0674a318d5'),
('2', 'jjcaraon', '12345', 'Julibee Joy', 'Andrade', 'Caraon', 'January 31 1996', 'F', 'Sta. Rosa, Laguna', 'joycaraon@ymail.com', 1, 'eccbc87e4b5ce2fe28308fd9f2a7baf3'),
('3', 'smpapag', '12345', 'Selwin Mathew', '', 'Papag', 'June 18 2001', 'M', 'Sta. Rosa, Laguna', 'selwin@yahoo.com', 1, 'c4ca4238a0b923820dcc509a6f75849b');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `bully`
--
ALTER TABLE `bully`
  ADD CONSTRAINT `bully_ibfk_1` FOREIGN KEY (`LVL_ID`) REFERENCES `level` (`LVL_ID`);

--
-- Constraints for table `level`
--
ALTER TABLE `level`
  ADD CONSTRAINT `level_ibfk_1` FOREIGN KEY (`STG_ID`) REFERENCES `stage` (`STG_ID`) ON UPDATE CASCADE,
  ADD CONSTRAINT `level_ibfk_2` FOREIGN KEY (`STG_ID`) REFERENCES `stage` (`STG_ID`);

--
-- Constraints for table `objective`
--
ALTER TABLE `objective`
  ADD CONSTRAINT `objective_ibfk_1` FOREIGN KEY (`LVL_ID`) REFERENCES `level` (`LVL_ID`);

--
-- Constraints for table `progress`
--
ALTER TABLE `progress`
  ADD CONSTRAINT `progress_ibfk_1` FOREIGN KEY (`USER_ID`) REFERENCES `user` (`USER_ID`),
  ADD CONSTRAINT `progress_ibfk_2` FOREIGN KEY (`LVL_ID`) REFERENCES `level` (`LVL_ID`);

--
-- Constraints for table `question`
--
ALTER TABLE `question`
  ADD CONSTRAINT `question_ibfk_1` FOREIGN KEY (`BLY_ID`) REFERENCES `bully` (`BLY_ID`);

--
-- Constraints for table `questionnaire`
--
ALTER TABLE `questionnaire`
  ADD CONSTRAINT `questionnaire_ibfk_1` FOREIGN KEY (`LVL_ID`) REFERENCES `level` (`LVL_ID`);

--
-- Constraints for table `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `user_ibfk_1` FOREIGN KEY (`USER_ROLE`) REFERENCES `role` (`ROLE_ID`),
  ADD CONSTRAINT `user_ibfk_2` FOREIGN KEY (`AVTR_ID`) REFERENCES `avatar` (`AVTR_ID`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
