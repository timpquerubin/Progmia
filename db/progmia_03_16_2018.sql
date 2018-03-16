-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 16, 2018 at 06:54 AM
-- Server version: 10.1.21-MariaDB
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `progmia`
--

-- --------------------------------------------------------

--
-- Table structure for table `avatar`
--

CREATE TABLE `avatar` (
  `AVTR_ID` varchar(255) NOT NULL,
  `AVTR_NAME` varchar(50) DEFAULT NULL,
  `AVTR_SPRITE_FILENAME` varchar(255) DEFAULT NULL,
  `AVTR_THUMBNAIL_FILENAME` varchar(255) DEFAULT NULL,
  `AVTR_FRONTVIEW_FILENAME` varchar(255) DEFAULT NULL,
  `AVTR_HEIGHT` float DEFAULT NULL,
  `AVTR_WIDTH` float DEFAULT NULL
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

CREATE TABLE `badges` (
  `BDG_ID` varchar(255) NOT NULL,
  `BDG_ORDER` int(11) DEFAULT NULL,
  `BDG_NAME` varchar(255) DEFAULT NULL,
  `BDG_DESCRIPTION` varchar(255) DEFAULT NULL,
  `BDG_IMG_FILENAME` varchar(255) DEFAULT NULL,
  `STG_ID` varchar(50) DEFAULT NULL,
  `TYPE` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `badges`
--

INSERT INTO `badges` (`BDG_ID`, `BDG_ORDER`, `BDG_NAME`, `BDG_DESCRIPTION`, `BDG_IMG_FILENAME`, `STG_ID`, `TYPE`) VALUES
('1', 1, NULL, NULL, 'BADGE-01.png', '1STG_BS', 'finish'),
('10', 10, NULL, NULL, 'BADGE-10.png', '3STG_FUNCT', 'perfect'),
('2', 2, NULL, NULL, 'BADGE-02.png', '1STG_BS', 'perfect'),
('3', 3, NULL, '', 'BADGE-03.png', '2STG_IS', 'finish'),
('4', 4, NULL, NULL, 'BADGE-04.png', '2STG_IS', 'perfect'),
('5', 5, NULL, NULL, 'BADGE-05.png', NULL, 'finish'),
('6', 6, NULL, NULL, 'BADGE-06.png', NULL, 'perfect'),
('7', 7, NULL, NULL, 'BADGE-07.png', '4STG_CLASS', 'finish'),
('8', 8, NULL, NULL, 'BADGE-08.png', '4STG_CLASS', 'perfect'),
('9', 9, NULL, NULL, 'BADGE-09.png', '3STG_FUNCT', 'finish');

-- --------------------------------------------------------

--
-- Table structure for table `bully`
--

CREATE TABLE `bully` (
  `BLY_ID` varchar(255) NOT NULL,
  `LVL_ID` varchar(255) DEFAULT NULL,
  `BLY_NAME` varchar(20) NOT NULL,
  `BLY_IMAGEURL` varchar(255) DEFAULT NULL,
  `BLY_THUMB_FILENAME` varchar(50) NOT NULL,
  `BLY_SPAWNPOINT` varchar(20) DEFAULT NULL,
  `BLY_MAXHP` int(3) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bully`
--

INSERT INTO `bully` (`BLY_ID`, `LVL_ID`, `BLY_NAME`, `BLY_IMAGEURL`, `BLY_THUMB_FILENAME`, `BLY_SPAWNPOINT`, `BLY_MAXHP`) VALUES
('1630f1f6abc60263259bf381ea8fa745', 'f7147e40ff42c040767de9b414e0409a', 'Baubau', 'BULLY-08.png', 'BULLY_THUMB-08.png', '[440,56]', 2),
('25b74d338e3e2eb5b73f804a4cd70ede', '12dde928d6f818fb26178133409257b1', 'Son', 'BULLY-07.png', 'BULLY_THUMB-07.png', '[248,56]', 1),
('3245efadbe8f4aca109c4cbca2926048', 'dd86880e8ed4cd97a891938a7e071bc3', 'Ton-Ton', 'BULLY-07.png', 'BULLY_THUMB-07.png', '[248,56]', 1),
('3d50541d42e2eefc59105fcb7330046b', '1d2a1030e6055f6d7dbe23b398ae0697', 'Mich', 'BULLY-08.png', 'BULLY_THUMB-08.png', '[248,56]', 2),
('485fdc025b21c4688f25b334dd0e6583', 'f367035269f361cd43158ad577eda5b2', 'Marv', 'BULLY-08.png', 'BULLY_THUMB-08.png', '[248,56]', 2),
('48e4e97fe6d65b364c85be87ee77e334', '5304dfce9915f8ab8101960a1d42c13c', 'Jake', 'BULLY-08.png', 'BULLY_THUMB-08.png', '[248,56]', 2),
('702e392e6148208b997edd7ed56b647e', 'd33cb61304f6b9105fee62d8ec891d93', 'Bullet', 'BULLY-08.png', 'BULLY_THUMB-08.png', '[440,56]', 2),
('742bc4934d35613892579b1bfa45dd07', '55162b07168e074955229776c5685000', 'Rick', 'BULLY-07.png', 'BULLY_THUMB-07.png', '[440,56]', 1),
('842bc2bcbfc1ee168108419397aedc7e', 'e1801940c36357442561ef684c16666d', 'Miguel', 'BULLY-08.png', 'BULLY_THUMB-08.png', '[440,56]', 2),
('94dbac0ea722797108480b5dd7ec32d4', 'dd86880e8ed4cd97a891938a7e071bc3', 'Matt', 'BULLY-10.png', 'BULLY_THUMB-10.png', '[440,56]', 3),
('957a1a521b7edc68aa3a9814956f0185', '31a1e5bfe50a73474205d60caa61bcba', 'Novo', 'BULLY-08.png', 'BULLY_THUMB-08.png', '[248,56]', 2),
('b1b09bb963714729b8609ac8ec6ec50f', 'd33cb61304f6b9105fee62d8ec891d93', 'Bau-Bau', 'BULLY-08.png', 'BULLY_THUMB-08.png', '[248,56]', 2),
('ba993028907e37ad3594e3ff961c7a73', '12dde928d6f818fb26178133409257b1', 'Pards', 'BULLY-07.png', 'BULLY_THUMB-07.png', '[440,56]', 1),
('c988381bf5566ea95b782537d9e658b9', 'e1801940c36357442561ef684c16666d', 'Tim', 'BULLY-07.png', 'BULLY_THUMB-07.png', '[248,56]', 1),
('e4063dee7c1cef380d72ff537fd10ceb', 'f7147e40ff42c040767de9b414e0409a', 'Jake', 'BULLY-07.png', 'BULLY_THUMB-07.png', '[248,56]', 1),
('f777abee0d2d6c37b223e15c05cf7e29', '55162b07168e074955229776c5685000', 'John', 'BULLY-07.png', 'BULLY_THUMB-07.png', '[248,56]', 1);

-- --------------------------------------------------------

--
-- Table structure for table `level`
--

CREATE TABLE `level` (
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
  `LVL_TUTORIAL` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `level`
--

INSERT INTO `level` (`LVL_ID`, `STG_ID`, `LVL_NUM`, `LVL_GRID`, `LVL_FILENAME`, `LVL_STARTPOINT`, `LVL_NUMCOLS`, `LVL_CREATEDAT`, `LVL_UPDATEDAT`, `LVL_IMGHEIGHT`, `LVL_IMGWIDTH`, `LVL_NAME`, `LVL_DESC`, `LVL_TUTORIAL`) VALUES
('12dde928d6f818fb26178133409257b1', '3STG_FUNCT', 4, '[5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 5, 5, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 4, 5, 5, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 4, 5, 5, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 4, 5, 5, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5]', '12dde928d6f818fb26178133409257b1.png', '[56,56]', '35', '2018-03-15 06:41:55', '2018-03-15 06:41:55', 112, 560, 'Loops - for loop-statements', 'Learn the syntax of for loop-statements,\nLearn how to set the proper parameters in implementing this kind of loop-statement,\nLearn the difference of for loop-statements from other loop-statements', NULL),
('1d2a1030e6055f6d7dbe23b398ae0697', '3STG_FUNCT', 1, '[5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 5, 5, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 4, 5, 5, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 4, 5, 5, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 4, 5, 5, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5]', '1d2a1030e6055f6d7dbe23b398ae0697.png', '[56,56]', '23', '2018-03-07 05:31:52', '2018-03-07 05:31:52', 112, 368, 'Loops - Basic loop statements 1', 'Learn the basics of loop statements, Learn the syntax of while loop-statements', NULL),
('31a1e5bfe50a73474205d60caa61bcba', '1STG_BS', 1, '[5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 5, 5, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 4, 5, 5, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 4, 5, 5, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 4, 5, 5, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5]', '31a1e5bfe50a73474205d60caa61bcba.png', '[56,56]', '23', '2018-01-29 13:16:10', '2018-01-29 13:16:10', 112, 368, 'Basic Syntax Floor 1', 'Learn the syntax of variable declaration, Be familiar with data types, Learn to assign values to variables depending upon its data type', 'variable_tutorial.php'),
('510fb9ed3a51f8ede848403e79aeca1a', '4STG_CLASS', 5, '[5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 0, 0, 0, 0, 0, 0, 0, 0, 0, 5, 0, 0, 5, 5, 5, 5, 0, 0, 5, 0, 0, 0, 0, 0, 0, 0, 0, 0, 5, 5, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 5, 5, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 7, 0, 0, 0, 0, 0, 7, 0, 0, 0, 0, 0, 7, 4, 5, 5, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 4, 5, 5, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5]', '510fb9ed3a51f8ede848403e79aeca1a.png', '[56,72]', '30', '2017-12-19 07:47:29', '2017-12-19 07:47:29', 128, 480, 'Loop Basics', 'Learn to use functions and class functions with loop and decision statements', NULL),
('5304dfce9915f8ab8101960a1d42c13c', '1STG_BS', 3, '[5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 5, 5, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 4, 5, 5, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 4, 5, 5, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 4, 5, 5, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5]', '5304dfce9915f8ab8101960a1d42c13c.png', '[56,56]', '23', '2018-02-08 10:47:36', '2018-02-08 10:47:36', 112, 368, 'Basic Array 1', 'Learn how to declare an array, Learn the syntax of array declaration', 'arrays_tutorial.php'),
('55162b07168e074955229776c5685000', '3STG_FUNCT', 3, '[5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 5, 5, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 4, 5, 5, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 4, 5, 5, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 4, 5, 5, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5]', '55162b07168e074955229776c5685000.png', '[56,56]', '35', '2018-03-14 09:58:20', '2018-03-14 09:58:20', 112, 560, 'Loops - do-while loop-statements', 'Learn how to use do-while loop statement, Learn the difference of do-while from other looping techniques', NULL),
('6380cd6686aef3cf610e8e22576907e7', '4STG_CLASS', 3, '[5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 0, 0, 0, 0, 0, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 0, 0, 0, 0, 0, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 0, 0, 0, 0, 0, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 0, 0, 7, 0, 0, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 0, 0, 0, 0, 0, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 0, 0, 0, 0, 0, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 0, 0, 0, 0, 0, 5, 5, 5, 5, 5, 5, 5, 5, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 5, 5, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 5, 5, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 4, 5, 5, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 4, 5, 5, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5]', '6380cd6686aef3cf610e8e22576907e7.png', '[56,184]', '19', '2017-12-19 07:09:18', '2017-12-19 07:09:18', 240, 304, 'if-statement introduction', 'Learn to use functions and class functions with decision statements', NULL),
('c9f0f895fb98ab9159f51fd0297e236d', '4STG_CLASS', 1, '[5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 5, 5, 5, 5, 5, 5, 5, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 5, 5, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 5, 5, 5, 5, 5, 5, 5, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 4, 5, 5, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 5, 5, 5, 5, 5, 5, 5, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 4, 5, 5, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 5, 5, 5, 5, 5, 5, 5, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 4, 5, 5, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 5, 5, 5, 5, 5, 5, 5, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 5, 5, 5, 5, 5, 5, 5, 5, 0, 0, 0, 0, 0, 5, 5, 5, 5, 5, 5, 5, 0, 0, 0, 0, 0, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 0, 0, 6, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 6, 0, 0, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5]', 'c9f0f895fb98ab9159f51fd0297e236d.png', '[48,48]', '31', '2017-10-03 02:46:25', '2017-10-03 02:46:25', 208, 496, 'Basic Syntax - Level  1', 'Learn the basics of classes, Access class functions and use them', 'classes_tutorial.php'),
('d33cb61304f6b9105fee62d8ec891d93', '1STG_BS', 4, '[5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 5, 5, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 4, 5, 5, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 4, 5, 5, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 4, 5, 5, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5]', 'd33cb61304f6b9105fee62d8ec891d93.png', '[56,56]', '35', '2018-02-26 08:12:45', '2018-02-26 08:12:45', 112, 560, 'Programming Basics Level 4 - Arrays', 'Learn more about array declaration, Learn to declare multiple arrays', NULL),
('d7d7ab2a0d92daa06cd87a27986d8c17', '4STG_CLASS', 2, '[5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 0, 4, 4, 4, 0, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 0, 0, 0, 0, 0, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 0, 0, 0, 0, 0, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 0, 0, 0, 0, 0, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 0, 0, 0, 0, 0, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 0, 0, 0, 0, 0, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 0, 0, 0, 0, 0, 5, 5, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 5, 5, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 5, 5, 0, 0, 6, 0, 0, 0, 0, 0, 6, 0, 0, 0, 0, 0, 7, 0, 0, 5, 5, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 5, 5, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 5, 5, 0, 0, 0, 0, 0, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 0, 0, 0, 0, 0, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 0, 0, 0, 0, 0, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 0, 0, 0, 0, 0, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 0, 0, 0, 0, 0, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 0, 0, 0, 0, 0, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5]', 'sample_bully_map.png', '[56,264]', '19', '2017-09-21 00:29:46', '2017-09-21 00:29:46', 320, 304, NULL, 'Learn class functions with 1 parameter, Use multiple class functions', NULL),
('dd86880e8ed4cd97a891938a7e071bc3', '2STG_IS', 2, '[5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 5, 5, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 4, 5, 5, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 4, 5, 5, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 4, 5, 5, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5]', 'dd86880e8ed4cd97a891938a7e071bc3.png', '[56,56]', '35', '2018-03-06 07:20:00', '2018-03-06 07:20:00', 112, 560, 'Conditions - Basics Level 2', 'Learn more about decision statements, Implementing if-else decision statements', 'if_else_tutorial.php'),
('e1801940c36357442561ef684c16666d', '3STG_FUNCT', 2, '[5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 5, 5, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 4, 5, 5, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 4, 5, 5, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 4, 5, 5, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5]', 'e1801940c36357442561ef684c16666d.png', '[56,56]', '35', '2018-03-10 10:38:17', '2018-03-10 10:38:17', 112, 560, 'Loops - Basic loop statements 2', 'Learn some more about using basic while loop-statements, Learn the implementation of loop-statements with arrays and variables', NULL),
('f367035269f361cd43158ad577eda5b2', '2STG_IS', 1, '[5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 5, 5, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 4, 5, 5, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 4, 5, 5, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 4, 5, 5, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5]', 'f367035269f361cd43158ad577eda5b2.png', '[56,56]', '23', '2018-02-27 05:11:10', '2018-02-27 05:11:10', 112, 368, 'Conditions - Basics Level 1', 'Learn the basics of decision statements, Implementation of if-statements, Learn how use logical operators', 'if_tutorial.php'),
('f7147e40ff42c040767de9b414e0409a', '1STG_BS', 2, '[5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 5, 5, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 4, 5, 5, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 4, 5, 5, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 4, 5, 5, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5]', 'f7147e40ff42c040767de9b414e0409a.png', '[56,56]', '35', '2018-02-08 00:18:30', '2018-02-08 00:18:30', 112, 560, 'Programming Basics Level 2', 'Learn to implement multiple variable declarations, Declare variables of different data types', NULL),
('fa5953f5d77703da5a23670a95729953', '4STG_CLASS', 4, '[5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 0, 0, 0, 0, 0, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 0, 0, 0, 0, 0, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 0, 0, 7, 0, 0, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 0, 0, 0, 0, 0, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 0, 0, 0, 0, 0, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 0, 0, 0, 0, 0, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 5, 5, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 4, 5, 5, 0, 0, 0, 0, 0, 0, 0, 0, 6, 0, 0, 0, 0, 0, 6, 0, 0, 0, 0, 0, 0, 0, 4, 5, 5, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 4, 5, 5, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 0, 0, 0, 0, 0, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 0, 0, 0, 0, 0, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 0, 0, 0, 0, 0, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 0, 0, 7, 0, 0, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 0, 0, 0, 0, 0, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 0, 0, 0, 0, 0, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5]', 'fa5953f5d77703da5a23670a95729953.png', '[56,152]', '25', '2017-12-19 08:23:41', '2017-12-19 08:23:41', 304, 400, 'Basic Loop Statements', 'Learn to use functions and class functions with multiple decision statements', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `objective`
--

CREATE TABLE `objective` (
  `LVL_ID` varchar(255) NOT NULL,
  `OBJ_NUM` int(11) NOT NULL,
  `OBJ_DESC` varchar(100) DEFAULT NULL,
  `OBJ_JSONVAL` text,
  `OBJ_POINTS` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `objective`
--

INSERT INTO `objective` (`LVL_ID`, `OBJ_NUM`, `OBJ_DESC`, `OBJ_JSONVAL`, `OBJ_POINTS`) VALUES
('12dde928d6f818fb26178133409257b1', 1, 'Successfully finish level', '{\"Finish\":\"true\"}', 100),
('12dde928d6f818fb26178133409257b1', 2, 'Defeat 2 bullies', '{\"Defeat Bullies\":\"2\"}', 100),
('12dde928d6f818fb26178133409257b1', 3, 'Successfully finish level with full health', '{\"Health\":\"100\"}', 100),
('1d2a1030e6055f6d7dbe23b398ae0697', 1, 'Successfully finish level', '{\"Finish\":\"true\"}', 100),
('1d2a1030e6055f6d7dbe23b398ae0697', 2, 'Defeat 1 bully', '{\"Defeat Bullies\":\"1\"}', 100),
('1d2a1030e6055f6d7dbe23b398ae0697', 3, 'Successfully finish level with full health', '{\"Health\":\"100\"}', 100),
('31a1e5bfe50a73474205d60caa61bcba', 1, 'Successfully finish level', '{\"Finish\":\"true\"}', 100),
('31a1e5bfe50a73474205d60caa61bcba', 2, 'Defeat 1 bully', '{\"Defeat Bullies\":\"1\"}', 100),
('31a1e5bfe50a73474205d60caa61bcba', 3, 'Successfully finish level with full health', '{\"Health\":\"100\"}', 100),
('510fb9ed3a51f8ede848403e79aeca1a', 1, 'Successfully finish level', '{\"Finish\":\"True\"}', 200),
('510fb9ed3a51f8ede848403e79aeca1a', 2, 'Defeat 3 Bullies', '{\"Defeat Bullies\":\"3\"}', 100),
('510fb9ed3a51f8ede848403e79aeca1a', 3, 'Successfully implement loop statement', '{\"Use Command\":\"Loop\"}', 100),
('5304dfce9915f8ab8101960a1d42c13c', 1, 'Successfully finish level', '{\"Finish\":\"true\"}', 100),
('5304dfce9915f8ab8101960a1d42c13c', 2, 'Defeat 1 Bully', '{\"Defeat Bullies\":\"1\"}', 100),
('5304dfce9915f8ab8101960a1d42c13c', 3, 'Finish level with full health', '{\"Health\":\"100\"}', 100),
('55162b07168e074955229776c5685000', 1, 'Successfully finish level', '{\"Finish\":\"true\"}', 100),
('55162b07168e074955229776c5685000', 2, 'Defeat 2 bullies', '{\"Defeat Bullies\":\"2\"}', 100),
('55162b07168e074955229776c5685000', 3, 'Successfully finish level with full health', '{\"Health\":\"100\"}', 100),
('6380cd6686aef3cf610e8e22576907e7', 1, 'Successfully finish level', '{\"Finish\":\"true\"}', 100),
('6380cd6686aef3cf610e8e22576907e7', 2, 'Successfully implement an if-statement command', '{\"Use Command\":\"If\"}', 100),
('6380cd6686aef3cf610e8e22576907e7', 3, 'Defeat 1 bully', '{\"Defeat Bullies\":\"1\"}', 100),
('c9f0f895fb98ab9159f51fd0297e236d', 1, 'Successfully finish level', '{\"Finish\":\"true\"}', 100),
('c9f0f895fb98ab9159f51fd0297e236d', 2, 'Collect 2 coins', '{\"Collect Coins\":\"2\"}', 100),
('c9f0f895fb98ab9159f51fd0297e236d', 3, 'Successfully finish level with full health', '{\"Health\":\"100\"}', 100),
('d33cb61304f6b9105fee62d8ec891d93', 1, 'Successfully finish level', '{\"Finish\":\"true\"}', 100),
('d33cb61304f6b9105fee62d8ec891d93', 2, 'Defeat 2 Bullies', '{\"Defeat Bullies\":\"2\"}', 100),
('d33cb61304f6b9105fee62d8ec891d93', 3, 'Successfully finish level with full health.', '{\"Health\":\"100\"}', 100),
('d7d7ab2a0d92daa06cd87a27986d8c17', 1, 'Successfully finish level', '{\"Finish\":\"true\"}', 100),
('d7d7ab2a0d92daa06cd87a27986d8c17', 2, 'Defeat 1 bully', '{\"Defeat Bullies\":\"1\"}', 100),
('d7d7ab2a0d92daa06cd87a27986d8c17', 3, 'Collect 2 coins', '{\"Collect Coins\":\"2\"}', 50),
('d7d7ab2a0d92daa06cd87a27986d8c17', 4, 'Successfully finish level with at least 70% health', '{\"Health\":\"70\"}', 50),
('dd86880e8ed4cd97a891938a7e071bc3', 1, 'Successfully Finish Level', '{\"Finish\":\"true\"}', 100),
('dd86880e8ed4cd97a891938a7e071bc3', 2, 'Defeat 2 Bullies', '{\"Defeat Bullies\":\"2\"}', 100),
('dd86880e8ed4cd97a891938a7e071bc3', 3, 'Successfully finish level with at least 80% health remaining', '{\"Health\":\"80\"}', 100),
('e1801940c36357442561ef684c16666d', 1, 'Successfully finish level', '{\"Finish\":\"true\"}', 100),
('e1801940c36357442561ef684c16666d', 2, 'Defeat 2 bullies', '{\"Defeat Bullies\":\"2\"}', 100),
('e1801940c36357442561ef684c16666d', 3, 'Successfully finish level with at least 80% health remaining', '{\"Health\":\"80\"}', 100),
('f367035269f361cd43158ad577eda5b2', 1, 'Successfully finish level', '{\"Finish\":\"true\"}', 100),
('f367035269f361cd43158ad577eda5b2', 2, 'Defeat 1 Bully', '{\"Defeat Bullies\":\"1\"}', 100),
('f367035269f361cd43158ad577eda5b2', 3, 'Successfully finish level with full health', '{\"Health\":\"100\"}', 100),
('f7147e40ff42c040767de9b414e0409a', 1, 'Successfully finish level', '{\"Finish\":\"True\"}', 100),
('f7147e40ff42c040767de9b414e0409a', 2, 'Defeat 2 Bullies', '{\"Defeat Bullies\":\"2\"}', 100),
('f7147e40ff42c040767de9b414e0409a', 3, 'Successfully finish level with at least 80 percent health', '{\"Health\":\"80\"}', 100),
('fa5953f5d77703da5a23670a95729953', 1, 'Successfully finish level', '{\"Finish\":\"True\"}', 200),
('fa5953f5d77703da5a23670a95729953', 2, 'Defeat 2 Bullies', '{\"Defeat Bullies\":\"2\"}', 100),
('fa5953f5d77703da5a23670a95729953', 3, 'Collect 2 Coins', '{\"Collect Coins\":\"2\"}', 100),
('fa5953f5d77703da5a23670a95729953', 4, 'Finish level with more than 50% health', '{\"Health\":\"50\"}', 100);

-- --------------------------------------------------------

--
-- Table structure for table `progress`
--

CREATE TABLE `progress` (
  `PROG_ID` int(11) NOT NULL,
  `BDG_ID` varchar(255) DEFAULT NULL,
  `USER_ID` varchar(255) DEFAULT NULL,
  `LVL_ID` varchar(255) DEFAULT NULL,
  `GAME_SCORE` int(11) DEFAULT NULL,
  `QUIZ_SCORE` int(11) DEFAULT NULL,
  `DATE_PLAYED` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `progress`
--

INSERT INTO `progress` (`PROG_ID`, `BDG_ID`, `USER_ID`, `LVL_ID`, `GAME_SCORE`, `QUIZ_SCORE`, `DATE_PLAYED`) VALUES
(1, NULL, '1', '31a1e5bfe50a73474205d60caa61bcba', 400, NULL, '2018-02-14 05:44:07'),
(2, NULL, '1', 'f7147e40ff42c040767de9b414e0409a', 300, NULL, '2018-02-14 05:45:58'),
(3, NULL, '1', '31a1e5bfe50a73474205d60caa61bcba', 200, NULL, '2018-02-14 06:40:46'),
(4, NULL, '1', '31a1e5bfe50a73474205d60caa61bcba', 200, NULL, '2018-02-14 06:41:28'),
(5, NULL, '1', '31a1e5bfe50a73474205d60caa61bcba', 200, NULL, '2018-02-14 07:38:23'),
(6, NULL, '1', '31a1e5bfe50a73474205d60caa61bcba', 200, NULL, '2018-02-19 04:57:08'),
(7, NULL, '1', '31a1e5bfe50a73474205d60caa61bcba', 200, NULL, '2018-02-19 05:31:57'),
(8, NULL, '1', '31a1e5bfe50a73474205d60caa61bcba', 200, NULL, '2018-02-19 06:20:11'),
(9, NULL, '1', '31a1e5bfe50a73474205d60caa61bcba', 200, NULL, '2018-02-19 06:20:25'),
(10, NULL, '1', '31a1e5bfe50a73474205d60caa61bcba', 200, NULL, '2018-02-19 06:21:12'),
(11, NULL, '1', '31a1e5bfe50a73474205d60caa61bcba', 200, NULL, '2018-02-19 06:28:23'),
(12, NULL, '1', '31a1e5bfe50a73474205d60caa61bcba', 200, NULL, '2018-02-19 06:29:39'),
(13, NULL, '1', '31a1e5bfe50a73474205d60caa61bcba', 200, NULL, '2018-02-19 06:32:02'),
(14, NULL, '1', '31a1e5bfe50a73474205d60caa61bcba', 200, NULL, '2018-02-19 06:33:20'),
(15, NULL, '1', '31a1e5bfe50a73474205d60caa61bcba', 200, NULL, '2018-02-19 06:34:05'),
(16, NULL, '1', '31a1e5bfe50a73474205d60caa61bcba', 200, NULL, '2018-02-19 06:35:46'),
(17, NULL, '1', '31a1e5bfe50a73474205d60caa61bcba', 200, NULL, '2018-02-19 06:36:03'),
(18, NULL, '1', '31a1e5bfe50a73474205d60caa61bcba', 200, NULL, '2018-02-19 06:36:11'),
(19, NULL, '1', '31a1e5bfe50a73474205d60caa61bcba', 200, NULL, '2018-02-19 06:36:43'),
(20, NULL, '1', '31a1e5bfe50a73474205d60caa61bcba', 200, NULL, '2018-02-19 06:37:42'),
(21, NULL, '1', '31a1e5bfe50a73474205d60caa61bcba', 200, NULL, '2018-02-19 06:38:08'),
(22, NULL, '1', '31a1e5bfe50a73474205d60caa61bcba', 200, NULL, '2018-02-19 06:38:52'),
(23, NULL, '1', '31a1e5bfe50a73474205d60caa61bcba', 200, NULL, '2018-02-19 06:39:44'),
(24, NULL, '1', '31a1e5bfe50a73474205d60caa61bcba', 200, NULL, '2018-02-19 06:41:08'),
(25, NULL, '1', '31a1e5bfe50a73474205d60caa61bcba', 200, NULL, '2018-02-19 06:41:32'),
(26, NULL, '1', '31a1e5bfe50a73474205d60caa61bcba', 200, NULL, '2018-02-19 06:44:35'),
(27, NULL, '1', '31a1e5bfe50a73474205d60caa61bcba', 200, NULL, '2018-02-19 06:46:02'),
(28, NULL, '1', '31a1e5bfe50a73474205d60caa61bcba', 200, NULL, '2018-02-19 06:58:09'),
(29, NULL, '1', '31a1e5bfe50a73474205d60caa61bcba', 200, NULL, '2018-02-19 06:58:31'),
(30, NULL, '1', '31a1e5bfe50a73474205d60caa61bcba', 200, NULL, '2018-02-19 07:01:03'),
(31, NULL, '1', '31a1e5bfe50a73474205d60caa61bcba', 400, NULL, '2018-02-19 07:04:02'),
(32, NULL, '1', '31a1e5bfe50a73474205d60caa61bcba', 200, NULL, '2018-02-20 06:14:19'),
(33, NULL, '1', '31a1e5bfe50a73474205d60caa61bcba', 200, NULL, '2018-02-20 08:55:31'),
(34, NULL, '1', '31a1e5bfe50a73474205d60caa61bcba', 200, NULL, '2018-02-20 08:55:59'),
(35, NULL, '1', '31a1e5bfe50a73474205d60caa61bcba', 200, NULL, '2018-02-20 09:26:01'),
(36, NULL, '1', '31a1e5bfe50a73474205d60caa61bcba', 200, NULL, '2018-02-22 00:24:46'),
(37, NULL, '1', '31a1e5bfe50a73474205d60caa61bcba', 200, NULL, '2018-02-22 02:18:02'),
(38, NULL, '1', '31a1e5bfe50a73474205d60caa61bcba', 400, NULL, '2018-02-26 06:39:31'),
(39, NULL, '1', 'f7147e40ff42c040767de9b414e0409a', 200, NULL, '2018-02-26 07:23:45'),
(40, NULL, '1', 'f7147e40ff42c040767de9b414e0409a', 300, NULL, '2018-02-26 07:31:18'),
(41, NULL, '1', '5304dfce9915f8ab8101960a1d42c13c', 300, NULL, '2018-02-26 07:51:14'),
(42, NULL, '1', '31a1e5bfe50a73474205d60caa61bcba', 300, NULL, '2018-02-26 08:19:37'),
(43, NULL, '1', 'd33cb61304f6b9105fee62d8ec891d93', 300, NULL, '2018-02-27 04:07:39'),
(44, NULL, '1', '31a1e5bfe50a73474205d60caa61bcba', 100, NULL, '2018-03-02 05:49:20'),
(45, NULL, '1', 'f367035269f361cd43158ad577eda5b2', 100, NULL, '2018-03-02 08:50:10'),
(46, NULL, '1', 'f367035269f361cd43158ad577eda5b2', 100, NULL, '2018-03-02 08:53:16'),
(47, NULL, '1', 'f367035269f361cd43158ad577eda5b2', 100, NULL, '2018-03-02 08:59:15'),
(48, NULL, '1', 'f367035269f361cd43158ad577eda5b2', 100, NULL, '2018-03-02 09:00:32'),
(49, NULL, '1', 'f367035269f361cd43158ad577eda5b2', 100, NULL, '2018-03-02 09:01:27'),
(50, NULL, '1', 'f367035269f361cd43158ad577eda5b2', 100, NULL, '2018-03-02 09:59:15'),
(51, NULL, '1', 'f367035269f361cd43158ad577eda5b2', 100, NULL, '2018-03-02 10:02:39'),
(52, NULL, '1', 'f367035269f361cd43158ad577eda5b2', 100, NULL, '2018-03-02 10:18:16'),
(53, NULL, '1', 'f367035269f361cd43158ad577eda5b2', 100, NULL, '2018-03-02 10:23:27'),
(54, NULL, '1', 'f367035269f361cd43158ad577eda5b2', 100, NULL, '2018-03-02 10:27:29'),
(55, NULL, '1', '31a1e5bfe50a73474205d60caa61bcba', 300, NULL, '2018-03-02 10:47:11'),
(56, NULL, '4', '31a1e5bfe50a73474205d60caa61bcba', 100, NULL, '2018-03-02 11:00:54'),
(57, NULL, '1', 'f367035269f361cd43158ad577eda5b2', 100, NULL, '2018-03-05 02:40:33'),
(58, NULL, '1', 'f367035269f361cd43158ad577eda5b2', 100, NULL, '2018-03-05 02:53:17'),
(59, NULL, '1', 'f367035269f361cd43158ad577eda5b2', 100, NULL, '2018-03-05 02:53:35'),
(60, NULL, '1', 'f367035269f361cd43158ad577eda5b2', 100, NULL, '2018-03-05 02:54:33'),
(61, NULL, '1', 'f367035269f361cd43158ad577eda5b2', 100, NULL, '2018-03-05 03:05:32'),
(62, NULL, '1', 'f367035269f361cd43158ad577eda5b2', 100, NULL, '2018-03-05 03:21:01'),
(63, NULL, '1', 'f367035269f361cd43158ad577eda5b2', 100, NULL, '2018-03-05 03:22:02'),
(64, NULL, '1', 'f367035269f361cd43158ad577eda5b2', 100, NULL, '2018-03-05 03:22:55'),
(65, NULL, '1', 'f367035269f361cd43158ad577eda5b2', 100, NULL, '2018-03-05 03:23:17'),
(66, NULL, '1', 'f367035269f361cd43158ad577eda5b2', 100, NULL, '2018-03-05 03:25:29'),
(67, NULL, '1', 'f367035269f361cd43158ad577eda5b2', 100, NULL, '2018-03-05 03:26:18'),
(68, NULL, '1', 'f367035269f361cd43158ad577eda5b2', 100, NULL, '2018-03-05 03:26:44'),
(69, NULL, '1', 'f367035269f361cd43158ad577eda5b2', 100, NULL, '2018-03-05 05:10:01'),
(70, NULL, '1', 'f367035269f361cd43158ad577eda5b2', 100, NULL, '2018-03-05 05:13:35'),
(71, NULL, '1', 'f367035269f361cd43158ad577eda5b2', 100, NULL, '2018-03-05 05:15:54'),
(72, NULL, '1', 'f367035269f361cd43158ad577eda5b2', 100, NULL, '2018-03-05 05:18:25'),
(73, NULL, '1', 'f367035269f361cd43158ad577eda5b2', 100, NULL, '2018-03-05 05:25:00'),
(74, NULL, '1', 'f367035269f361cd43158ad577eda5b2', 100, NULL, '2018-03-05 05:38:37'),
(75, NULL, '1', 'f367035269f361cd43158ad577eda5b2', 100, NULL, '2018-03-05 05:39:02'),
(76, NULL, '1', 'f367035269f361cd43158ad577eda5b2', 100, NULL, '2018-03-05 05:40:50'),
(77, NULL, '1', 'f367035269f361cd43158ad577eda5b2', 100, NULL, '2018-03-05 05:51:35'),
(78, NULL, '1', 'f367035269f361cd43158ad577eda5b2', 100, NULL, '2018-03-05 05:55:40'),
(79, NULL, '1', 'f367035269f361cd43158ad577eda5b2', 100, NULL, '2018-03-05 06:00:28'),
(80, NULL, '1', 'f367035269f361cd43158ad577eda5b2', 100, NULL, '2018-03-05 06:01:10'),
(81, NULL, '1', 'f367035269f361cd43158ad577eda5b2', 100, NULL, '2018-03-05 06:03:22'),
(82, NULL, '1', 'f367035269f361cd43158ad577eda5b2', 100, NULL, '2018-03-05 06:03:44'),
(83, NULL, '1', 'f367035269f361cd43158ad577eda5b2', 100, NULL, '2018-03-05 06:04:16'),
(84, NULL, '1', 'f367035269f361cd43158ad577eda5b2', 100, NULL, '2018-03-05 06:08:28'),
(85, NULL, '1', 'f367035269f361cd43158ad577eda5b2', 100, NULL, '2018-03-05 06:10:21'),
(86, NULL, '1', 'f367035269f361cd43158ad577eda5b2', 300, NULL, '2018-03-06 06:59:02'),
(87, NULL, '1', 'f367035269f361cd43158ad577eda5b2', 300, NULL, '2018-03-06 07:13:34'),
(88, NULL, '1', 'dd86880e8ed4cd97a891938a7e071bc3', 300, NULL, '2018-03-06 10:52:15'),
(89, NULL, '1', '1d2a1030e6055f6d7dbe23b398ae0697', 100, NULL, '2018-03-07 05:48:05'),
(90, NULL, '1', '1d2a1030e6055f6d7dbe23b398ae0697', 100, NULL, '2018-03-07 05:48:29'),
(91, NULL, '1', '1d2a1030e6055f6d7dbe23b398ae0697', 100, NULL, '2018-03-07 05:51:59'),
(92, NULL, '1', '1d2a1030e6055f6d7dbe23b398ae0697', 100, NULL, '2018-03-07 05:52:45'),
(93, NULL, '1', '1d2a1030e6055f6d7dbe23b398ae0697', 100, NULL, '2018-03-07 05:58:03'),
(94, NULL, '1', '1d2a1030e6055f6d7dbe23b398ae0697', 100, NULL, '2018-03-07 06:07:43'),
(95, NULL, '1', '1d2a1030e6055f6d7dbe23b398ae0697', 100, NULL, '2018-03-07 06:09:49'),
(96, NULL, '1', '1d2a1030e6055f6d7dbe23b398ae0697', 100, NULL, '2018-03-07 06:10:55'),
(97, NULL, '1', '1d2a1030e6055f6d7dbe23b398ae0697', 100, NULL, '2018-03-07 06:12:32'),
(98, NULL, '1', '1d2a1030e6055f6d7dbe23b398ae0697', 100, NULL, '2018-03-07 06:26:16'),
(99, NULL, '1', '1d2a1030e6055f6d7dbe23b398ae0697', 100, NULL, '2018-03-07 06:35:34'),
(100, NULL, '1', '1d2a1030e6055f6d7dbe23b398ae0697', 100, NULL, '2018-03-07 06:36:02'),
(101, NULL, '1', '1d2a1030e6055f6d7dbe23b398ae0697', 100, NULL, '2018-03-07 06:38:19'),
(102, NULL, '1', '1d2a1030e6055f6d7dbe23b398ae0697', 100, NULL, '2018-03-07 06:39:26'),
(103, NULL, '1', '1d2a1030e6055f6d7dbe23b398ae0697', 100, NULL, '2018-03-07 06:40:43'),
(104, NULL, '1', '1d2a1030e6055f6d7dbe23b398ae0697', 100, NULL, '2018-03-07 06:41:25'),
(105, NULL, '1', '1d2a1030e6055f6d7dbe23b398ae0697', 100, NULL, '2018-03-07 06:42:17'),
(106, NULL, '1', '1d2a1030e6055f6d7dbe23b398ae0697', 100, NULL, '2018-03-07 08:57:03'),
(107, NULL, '1', '1d2a1030e6055f6d7dbe23b398ae0697', 100, NULL, '2018-03-07 09:23:05'),
(108, NULL, '1', '1d2a1030e6055f6d7dbe23b398ae0697', 100, NULL, '2018-03-09 09:23:22'),
(109, NULL, '1', '1d2a1030e6055f6d7dbe23b398ae0697', 100, NULL, '2018-03-09 09:23:41'),
(110, NULL, '1', '1d2a1030e6055f6d7dbe23b398ae0697', 100, NULL, '2018-03-09 09:26:09'),
(111, NULL, '1', '1d2a1030e6055f6d7dbe23b398ae0697', 300, NULL, '2018-03-09 09:35:32'),
(112, NULL, '1', '1d2a1030e6055f6d7dbe23b398ae0697', 100, NULL, '2018-03-09 09:36:39'),
(113, NULL, '1', '1d2a1030e6055f6d7dbe23b398ae0697', 300, NULL, '2018-03-09 09:40:07'),
(114, NULL, '1', '1d2a1030e6055f6d7dbe23b398ae0697', 100, NULL, '2018-03-09 09:43:00'),
(115, NULL, '1', '1d2a1030e6055f6d7dbe23b398ae0697', 100, NULL, '2018-03-09 09:48:32'),
(116, NULL, '1', '1d2a1030e6055f6d7dbe23b398ae0697', 300, NULL, '2018-03-09 09:54:29'),
(117, NULL, '1', '1d2a1030e6055f6d7dbe23b398ae0697', 100, NULL, '2018-03-09 09:55:02'),
(118, NULL, '1', '31a1e5bfe50a73474205d60caa61bcba', 100, NULL, '2018-03-09 09:57:35'),
(119, NULL, '1', 'e1801940c36357442561ef684c16666d', 300, NULL, '2018-03-10 14:49:34'),
(120, NULL, '1', 'dd86880e8ed4cd97a891938a7e071bc3', 100, NULL, '2018-03-10 15:03:54'),
(121, NULL, '1', '31a1e5bfe50a73474205d60caa61bcba', 100, NULL, '2018-03-12 02:37:37'),
(122, NULL, '1', '31a1e5bfe50a73474205d60caa61bcba', 100, NULL, '2018-03-12 07:07:02'),
(123, NULL, '1', '31a1e5bfe50a73474205d60caa61bcba', 100, NULL, '2018-03-12 07:08:13'),
(124, NULL, '1', '31a1e5bfe50a73474205d60caa61bcba', 100, NULL, '2018-03-12 07:49:05'),
(125, NULL, '1', '31a1e5bfe50a73474205d60caa61bcba', 100, NULL, '2018-03-12 07:54:29'),
(126, NULL, '1', '31a1e5bfe50a73474205d60caa61bcba', 100, NULL, '2018-03-12 07:54:59'),
(127, NULL, '1', '31a1e5bfe50a73474205d60caa61bcba', 100, NULL, '2018-03-12 07:55:31'),
(128, NULL, '1', '31a1e5bfe50a73474205d60caa61bcba', 100, NULL, '2018-03-12 07:56:19'),
(129, NULL, '1', '31a1e5bfe50a73474205d60caa61bcba', 100, NULL, '2018-03-12 07:57:31'),
(130, NULL, '1', '31a1e5bfe50a73474205d60caa61bcba', 100, NULL, '2018-03-12 08:06:13'),
(131, NULL, '1', '31a1e5bfe50a73474205d60caa61bcba', 100, NULL, '2018-03-12 08:07:42'),
(132, NULL, '1', '31a1e5bfe50a73474205d60caa61bcba', 100, NULL, '2018-03-12 08:10:35'),
(133, NULL, '1', '31a1e5bfe50a73474205d60caa61bcba', 100, NULL, '2018-03-12 08:11:23'),
(134, NULL, '1', '31a1e5bfe50a73474205d60caa61bcba', 100, NULL, '2018-03-12 08:12:52'),
(135, NULL, '1', '31a1e5bfe50a73474205d60caa61bcba', 100, NULL, '2018-03-12 08:14:02'),
(136, NULL, '1', '31a1e5bfe50a73474205d60caa61bcba', 100, NULL, '2018-03-12 08:14:34'),
(137, NULL, '1', '31a1e5bfe50a73474205d60caa61bcba', 100, NULL, '2018-03-12 08:16:11'),
(138, NULL, '1', '31a1e5bfe50a73474205d60caa61bcba', 100, NULL, '2018-03-12 08:17:36'),
(139, NULL, '1', '31a1e5bfe50a73474205d60caa61bcba', 100, NULL, '2018-03-12 08:18:21'),
(140, NULL, '1', '31a1e5bfe50a73474205d60caa61bcba', 100, NULL, '2018-03-12 08:18:50'),
(141, NULL, '1', '31a1e5bfe50a73474205d60caa61bcba', 100, NULL, '2018-03-12 08:19:53'),
(142, NULL, '1', '31a1e5bfe50a73474205d60caa61bcba', 100, NULL, '2018-03-12 08:50:40'),
(143, NULL, '1', '31a1e5bfe50a73474205d60caa61bcba', 100, NULL, '2018-03-12 09:16:51'),
(144, NULL, '1', '31a1e5bfe50a73474205d60caa61bcba', 100, NULL, '2018-03-12 09:42:24'),
(145, NULL, '1', '31a1e5bfe50a73474205d60caa61bcba', 300, NULL, '2018-03-12 12:32:27'),
(146, NULL, '1', 'f7147e40ff42c040767de9b414e0409a', 200, NULL, '2018-03-12 12:33:39'),
(147, NULL, '1', '5304dfce9915f8ab8101960a1d42c13c', 100, NULL, '2018-03-12 12:34:53'),
(148, NULL, '1', 'd33cb61304f6b9105fee62d8ec891d93', 100, NULL, '2018-03-12 12:36:45'),
(149, NULL, '1', 'f367035269f361cd43158ad577eda5b2', 100, NULL, '2018-03-12 12:39:43'),
(150, NULL, '1', 'f367035269f361cd43158ad577eda5b2', 300, NULL, '2018-03-12 12:41:20'),
(151, NULL, '1', 'dd86880e8ed4cd97a891938a7e071bc3', 300, NULL, '2018-03-12 13:03:40'),
(152, NULL, '1', 'd7d7ab2a0d92daa06cd87a27986d8c17', 0, NULL, '2018-03-12 13:07:35'),
(153, NULL, '1', 'fa5953f5d77703da5a23670a95729953', 400, NULL, '2018-03-12 13:13:01'),
(154, NULL, '1', 'c9f0f895fb98ab9159f51fd0297e236d', 300, NULL, '2018-03-12 13:58:40'),
(155, NULL, '1', 'fa5953f5d77703da5a23670a95729953', 500, NULL, '2018-03-12 14:17:12'),
(156, NULL, '1', '6380cd6686aef3cf610e8e22576907e7', 200, NULL, '2018-03-12 14:24:58'),
(157, NULL, '1', '6380cd6686aef3cf610e8e22576907e7', 300, NULL, '2018-03-12 14:30:39'),
(158, NULL, '1', '510fb9ed3a51f8ede848403e79aeca1a', 300, NULL, '2018-03-12 14:32:18'),
(159, NULL, '1', '510fb9ed3a51f8ede848403e79aeca1a', 400, NULL, '2018-03-12 14:33:21'),
(160, NULL, '1', 'd7d7ab2a0d92daa06cd87a27986d8c17', 300, NULL, '2018-03-12 14:34:28'),
(161, NULL, '1', '31a1e5bfe50a73474205d60caa61bcba', 300, NULL, '2018-03-12 23:46:56'),
(162, NULL, '1', '5304dfce9915f8ab8101960a1d42c13c', 100, NULL, '2018-03-13 02:44:55'),
(163, NULL, '1', '31a1e5bfe50a73474205d60caa61bcba', 100, NULL, '2018-03-13 05:57:08'),
(164, NULL, '1', '31a1e5bfe50a73474205d60caa61bcba', 100, NULL, '2018-03-13 06:08:09'),
(165, NULL, '1', '31a1e5bfe50a73474205d60caa61bcba', 100, NULL, '2018-03-13 06:56:50'),
(166, NULL, '1', '31a1e5bfe50a73474205d60caa61bcba', 100, NULL, '2018-03-13 07:07:44'),
(167, NULL, '1', 'f7147e40ff42c040767de9b414e0409a', 100, NULL, '2018-03-13 07:08:03'),
(168, NULL, '1', '31a1e5bfe50a73474205d60caa61bcba', 100, NULL, '2018-03-14 09:08:00'),
(169, NULL, '1', '55162b07168e074955229776c5685000', 300, NULL, '2018-03-15 04:36:05'),
(170, NULL, '1', 'd33cb61304f6b9105fee62d8ec891d93', 100, NULL, '2018-03-15 06:27:32'),
(171, NULL, '1', '12dde928d6f818fb26178133409257b1', 100, NULL, '2018-03-15 14:20:11'),
(172, NULL, '1', '12dde928d6f818fb26178133409257b1', 100, NULL, '2018-03-15 14:24:26'),
(173, NULL, '1', '12dde928d6f818fb26178133409257b1', 100, NULL, '2018-03-15 14:29:56'),
(174, NULL, '1', '12dde928d6f818fb26178133409257b1', 100, NULL, '2018-03-15 14:46:26'),
(175, NULL, '1', '12dde928d6f818fb26178133409257b1', 300, NULL, '2018-03-15 14:48:28'),
(176, NULL, '1', '12dde928d6f818fb26178133409257b1', 300, NULL, '2018-03-15 14:49:49'),
(177, NULL, '1', 'f7147e40ff42c040767de9b414e0409a', 100, NULL, '2018-03-16 05:16:39');

-- --------------------------------------------------------

--
-- Table structure for table `question`
--

CREATE TABLE `question` (
  `BLY_ID` varchar(255) NOT NULL,
  `QSTN_NUM` int(3) NOT NULL,
  `QSTN_DIALOG` text,
  `QSTN_ANSWER` text,
  `QSTN_TYPE` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `question`
--

INSERT INTO `question` (`BLY_ID`, `QSTN_NUM`, `QSTN_DIALOG`, `QSTN_ANSWER`, `QSTN_TYPE`) VALUES
('1630f1f6abc60263259bf381ea8fa745', 1, 'Declare two Integer variables x and y with x having a value of 10 and y having a value of 20.', '{\"variables\":[{\"dataType\":\"int\",\"var_identifier\":\"x\",\"var_value\":\"10\",\"code_type\":\"varop\",\"type\":\"dec-var\"},{\"dataType\":\"int\",\"var_identifier\":\"y\",\"var_value\":\"20\",\"code_type\":\"varop\",\"type\":\"dec-var\"}]}', ''),
('1630f1f6abc60263259bf381ea8fa745', 2, 'Declare two variables, a String variable country with a value of Philippines, and a Character variable aLetter with a value of G.', '{\"variables\":[{\"dataType\":\"String\",\"var_identifier\":\"country\",\"var_value\":\"\\\"Philippines\\\"\",\"code_type\":\"varop\",\"type\":\"dec-var\"},{\"dataType\":\"char\",\"var_identifier\":\"aLetter\",\"var_value\":\"\'G\'\",\"code_type\":\"varop\",\"type\":\"dec-var\"}]}', ''),
('25b74d338e3e2eb5b73f804a4cd70ede', 1, 'Create a for loop-statement. The first parameter is an Integer variable ctr that has the value 0. The second parameter is a condition that checks if the value of the variable ctr is less than 10. Third and last parameter is an operation that increments the value of ctr by 1. If the condition is true, print the value of ctr.', '{\"commands\":[{\"type\":\"cmd-loop-for\",\"condition\":\"int ctr = 0; ctr < 10; ctr = ctr + 1\",\"statements\":[{\"txt\":\"ctr\",\"code_type\":\"cmd\",\"type\":\"print\",\"stmnt_type\":\"\"}]}]}', ''),
('3245efadbe8f4aca109c4cbca2926048', 1, 'Declare an Double variable myGrade that contains the value 89.44. Then create an if-else statement that checks if the value of myGrade is greater than 60. If the the result is true, print the text \"Pass\". If the result is false, print the text \"Fail\".', '{\"variables\":[{\"dataType\":\"double\",\"var_identifier\":\"myGrade\",\"var_value\":\"89.44\",\"code_type\":\"varop\",\"type\":\"dec-var\",\"stmnt_type\":\"\"}],\"commands\":[{\"type\":\"cmd-if\",\"condition\":\"myGrade > 60\",\"statements\":[{\"txt\":\"\\\"Pass\\\"\",\"code_type\":\"cmd\",\"type\":\"print\",\"stmnt_type\":\"if-statement\"},{\"txt\":\"\\\"Fail\\\"\",\"code_type\":\"cmd\",\"type\":\"print\",\"stmnt_type\":\"else-statement\"}]}]}', ''),
('3d50541d42e2eefc59105fcb7330046b', 1, 'Declare 4 Integer variables x, y, counter and iterator with values 0, 5, 0, and 1 respectively. Then create a while loop statement that checks if the value of counter is less than or equal to 5. If the statement is true, do an operation that gets the sum of x and y, then store the result to x. After the operation, print the value of x. Then do another operations that adds the values of counter and iterator, then store the result to counter.', '{\"variables\":[{\"dataType\":\"int\",\"var_identifier\":\"x\",\"var_value\":\"0\",\"code_type\":\"varop\",\"type\":\"dec-var\",\"stmnt_type\":\"\"},{\"dataType\":\"int\",\"var_identifier\":\"y\",\"var_value\":\"5\",\"code_type\":\"varop\",\"type\":\"dec-var\",\"stmnt_type\":\"\"},{\"dataType\":\"int\",\"var_identifier\":\"counter\",\"var_value\":\"0\",\"code_type\":\"varop\",\"type\":\"dec-var\",\"stmnt_type\":\"\"},{\"dataType\":\"int\",\"var_identifier\":\"iterator\",\"var_value\":\"1\",\"code_type\":\"varop\",\"type\":\"dec-var\",\"stmnt_type\":\"\"}],\"commands\":[{\"type\":\"cmd-loop-while\",\"condition\":\"counter <= 5\",\"statements\":[{\"save_to\":\"x\",\"operation\":\"add\",\"var_1\":\"x\",\"var_2\":\"y\",\"code_type\":\"cmd\",\"type\":\"op\",\"stmnt_type\":\"if-statement\"},{\"save_to\":\"counter\",\"operation\":\"add\",\"var_1\":\"counter\",\"var_2\":\"iterator\",\"code_type\":\"cmd\",\"type\":\"op\",\"stmnt_type\":\"if-statement\"},{\"txt\":\"x\",\"code_type\":\"cmd\",\"type\":\"print\",\"stmnt_type\":\"if-statement\"}]}]}', ''),
('3d50541d42e2eefc59105fcb7330046b', 2, 'Declare 3 variables, 2 String variables asterisk_line which contains an empty string and single_asterisk which contains the String \"*\", and an Integer variable counter that has the value of 0. Then create a while loop-statement that has the condition that checks if the value of counter is less than 10. If the statement is true, concatenate the values of asterisk_line and single_asterisk and store the result to asterisk_line. after the operation, print the value of asterisk_line. Then, increment the value of counter by 1.', '{\"variables\":[{\"dataType\":\"String\",\"var_identifier\":\"single_asterisk\",\"var_value\":\"\\\"*\\\"\",\"code_type\":\"varop\",\"type\":\"dec-var\",\"stmnt_type\":\"\"},{\"dataType\":\"String\",\"var_identifier\":\"asterisk_line\",\"var_value\":\"\\\"\\\"\",\"code_type\":\"varop\",\"type\":\"dec-var\",\"stmnt_type\":\"\"},{\"dataType\":\"int\",\"var_identifier\":\"counter\",\"var_value\":\"0\",\"code_type\":\"varop\",\"type\":\"dec-var\",\"stmnt_type\":\"\"}],\"commands\":[{\"type\":\"cmd-loop-while\",\"condition\":\"counter < 10\",\"statements\":[{\"save_to\":\"asterisk_line\",\"operation\":\"add\",\"var_1\":\"asterisk_line\",\"var_2\":\"single_asterisk\",\"code_type\":\"cmd\",\"type\":\"op\",\"stmnt_type\":\"if-statement\"},{\"save_to\":\"counter\",\"operation\":\"add\",\"var_1\":\"counter\",\"var_2\":\"1\",\"code_type\":\"cmd\",\"type\":\"op\",\"stmnt_type\":\"if-statement\"},{\"txt\":\"asterisk_line\",\"code_type\":\"cmd\",\"type\":\"print\",\"stmnt_type\":\"if-statement\"}]}]}', ''),
('485fdc025b21c4688f25b334dd0e6583', 1, 'Declare an Integer Variable x with a value of 10. Then, create an if-statement that has a condition that checks if the value of x is equal to 10. If the condition is true, the print a statement \"the value of x is 10\".', '{\"variables\":[{\"dataType\":\"int\",\"var_identifier\":\"x\",\"var_value\":\"10\",\"code_type\":\"varop\",\"type\":\"dec-var\"}],\"commands\":[{\"type\":\"cmd-if\",\"condition\":\"x == 10\",\"statements\":[{\"txt\":\"the value of x is 10\",\"code_type\":\"cmd\",\"type\":\"print\"}]}]}', ''),
('485fdc025b21c4688f25b334dd0e6583', 2, 'Declare 4 variables, a Boolean variable isTrue with a value of true, and three Integer variables x, \n y and sum having the values 10, 20, and 0 respectively. Then, create an if-statement that has a condition that checks if the value of isTrue is true. If the condition is true, do an operation that gets the sum of the values of x and y, and store the result to the variable sum.', '{\"variables\":[{\"dataType\":\"Boolean\",\"var_identifier\":\"isTrue\",\"var_value\":\"true\",\"code_type\":\"varop\",\"type\":\"dec-var\"},{\"dataType\":\"int\",\"var_identifier\":\"x\",\"var_value\":\"10\",\"code_type\":\"varop\",\"type\":\"dec-var\"},{\"dataType\":\"int\",\"var_identifier\":\"y\",\"var_value\":\"20\",\"code_type\":\"varop\",\"type\":\"dec-var\"},{\"dataType\":\"int\",\"var_identifier\":\"sum\",\"var_value\":\"0\",\"code_type\":\"varop\",\"type\":\"dec-var\"}],\"commands\":[{\"type\":\"cmd-if\",\"condition\":\"isTrue == true\",\"statements\":[{\"save_to\":\"sum\",\"operation\":\"add\",\"var_1\":\"x\",\"var_2\":\"y\",\"code_type\":\"cmd\",\"type\":\"op\"}]}]}', ''),
('48e4e97fe6d65b364c85be87ee77e334', 1, 'Declare an integer Array integerArray which contains the values 2, 4, 6, 8, and 10.', '{\"variables\":[{\"dataType\":\"int[]\",\"var_identifier\":\"integerArray\",\"var_value\":[\"2\",\"4\",\"6\",\"8\",\"10\"],\"code_type\":\"varop\",\"type\":\"dec-arr\"}]}', ''),
('48e4e97fe6d65b364c85be87ee77e334', 2, 'Declare a String Array schoolSupplies that has the values pencil, ballpen, notebook, filler, and ruler.', '{\"variables\":[{\"dataType\":\"String[]\",\"var_identifier\":\"schoolSupplies\",\"var_value\":[\"\\\"pencil\\\"\",\"\\\"ballpen\\\"\",\"\\\"notebook\\\"\",\"\\\"filler\\\"\",\"\\\"ruler\\\"\"],\"code_type\":\"varop\",\"type\":\"dec-arr\"}]}', ''),
('702e392e6148208b997edd7ed56b647e', 1, 'Declare a Double Array dbArray that contains the values 1.0, 1.5, 2.0, 2.5, and 3.0 . ', '{\"variables\":[{\"dataType\":\"double[]\",\"var_identifier\":\"dbArray\",\"var_value\":[\"1\",\"1.5\",\"2\",\"2.5\",\"3\"],\"code_type\":\"varop\",\"type\":\"dec-arr\"}]}', ''),
('702e392e6148208b997edd7ed56b647e', 2, 'Declare an Array of Booleans with an identifier of boolArr that contains the values true, false, false, and true.', '{\"variables\":[{\"dataType\":\"Boolean[]\",\"var_identifier\":\"boolArr\",\"var_value\":[\"true\",\"false\",\"false\",\"true\"],\"code_type\":\"varop\",\"type\":\"dec-arr\"}]}', ''),
('742bc4934d35613892579b1bfa45dd07', 1, 'Declare a String array rhyme that contains the values \"the\", \"quick\", \"brown\", \"fox\", \"jumps\", \"over\", \"the\", \"lazy\", \"dog\". Also, declare an Integer variable counter that has a value 0. Then create a do-while loop statement that contains a condition that checks if the value of counter is less than 9. If the statement is true, print each of the values of rhyme by using the value of counter as index and also increase the value of counter by 1.', '{\"variables\":[{\"dataType\":\"String[]\",\"var_identifier\":\"rhyme\",\"var_value\":[\"\\\"the\\\"\",\"\\\"quick\\\"\",\"\\\"brown\\\"\",\"\\\"fox\\\"\",\"\\\"jumps\\\"\",\"\\\"over\\\"\",\"\\\"the\\\"\",\"\\\"lazy\\\"\",\"\\\"dog\\\"\"],\"code_type\":\"varop\",\"type\":\"dec-arr\",\"stmnt_type\":\"\"},{\"dataType\":\"int\",\"var_identifier\":\"counter\",\"var_value\":\"0\",\"code_type\":\"varop\",\"type\":\"dec-var\",\"stmnt_type\":\"\"}],\"commands\":[{\"type\":\"cmd-loop-do-while\",\"condition\":\"counter < 9\",\"statements\":[{\"save_to\":\"counter\",\"operation\":\"add\",\"var_1\":\"counter\",\"var_2\":\"1\",\"code_type\":\"cmd\",\"type\":\"op\"},{\"txt\":\"rhyme[counter]\",\"code_type\":\"cmd\",\"type\":\"print\",\"stmnt_type\":\"\"}]}]}', ''),
('842bc2bcbfc1ee168108419397aedc7e', 1, 'Declare 1 String array fruits that contain the values \"apple\", \"orange\", \"avocado\", \"banana\", and \"pineapple\". Then declare an Integer variable counter that contains the value 0. Then, create a while loop-statement that has the condition that checks if the value of counter is less than 5. If the condition is true, print each value of the array fruits, use the variable counter as the index of the array. Then, increment the value of counter by 1.', '{\"variables\":[{\"dataType\":\"String[]\",\"var_identifier\":\"fruits\",\"var_value\":[\"\\\"apple\\\"\",\"\\\"orange\\\"\",\"\\\"avocado\\\"\",\"\\\"banana\\\"\",\"\\\"pineapple\\\"\"],\"code_type\":\"varop\",\"type\":\"dec-arr\",\"stmnt_type\":\"\"},{\"dataType\":\"int\",\"var_identifier\":\"counter\",\"var_value\":\"0\",\"code_type\":\"varop\",\"type\":\"dec-var\",\"stmnt_type\":\"\"}],\"commands\":[{\"type\":\"cmd-loop-while\",\"condition\":\"counter < 5\",\"statements\":[{\"save_to\":\"counter\",\"operation\":\"add\",\"var_1\":\"counter\",\"var_2\":\"1\",\"code_type\":\"cmd\",\"type\":\"op\",\"stmnt_type\":\"if-statement\"},{\"txt\":\"fruits[counter]\",\"code_type\":\"cmd\",\"type\":\"print\",\"stmnt_type\":\"if-statement\"}]}]}', ''),
('842bc2bcbfc1ee168108419397aedc7e', 2, 'Declare 1 Double array grades that contain the following values 75.8, 66.2, 53.5, and 93.1. Then, declare 2 variables, an Integer variable counter that contains the value 0, and a Double variable total_grade that contains the value 0.0. Then, create a while loop-statement that has the condition that checks if the value of counter is less than 4. If the condition is true, get the sum of all the grades by iterating through the indexes of the array using the variable counter, then, do another operation that increments the value of counter by 1. After the loop-statement, print the value of total_grade.', '{\"variables\":[{\"dataType\":\"double[]\",\"var_identifier\":\"grades\",\"var_value\":[\"75.8\",\"66.2\",\"53.5\",\"93.1\"],\"code_type\":\"varop\",\"type\":\"dec-arr\",\"stmnt_type\":\"\"},{\"dataType\":\"int\",\"var_identifier\":\"counter\",\"var_value\":\"0\",\"code_type\":\"varop\",\"type\":\"dec-var\",\"stmnt_type\":\"\"},{\"dataType\":\"double\",\"var_identifier\":\"total_grade\",\"var_value\":\"0\",\"code_type\":\"varop\",\"type\":\"dec-var\",\"stmnt_type\":\"\"}],\"commands\":[{\"type\":\"cmd-loop-while\",\"condition\":\"counter < 4\",\"statements\":[{\"save_to\":\"total_grade\",\"operation\":\"add\",\"var_1\":\"total_grade\",\"var_2\":\"grades[counter]\",\"code_type\":\"cmd\",\"type\":\"op\",\"stmnt_type\":\"if-statement\"},{\"save_to\":\"counter\",\"operation\":\"add\",\"var_1\":\"counter\",\"var_2\":\"1\",\"code_type\":\"cmd\",\"type\":\"op\",\"stmnt_type\":\"if-statement\"}]}],\"prints\":[{\"txt\":\"total_grade\",\"code_type\":\"varop\",\"type\":\"print\",\"stmnt_type\":\"\"}]}', ''),
('94dbac0ea722797108480b5dd7ec32d4', 1, 'Declare an Integer variable x that has a value of -2. Then create an if statement that checks if the valud of x is greater than 0. If the condition is true, display the text \"the value of x is a positive integer\". If the condition is false, display the text \"the value of x is a negative integer\".', '{\"variables\":[{\"dataType\":\"int\",\"var_identifier\":\"x\",\"var_value\":\"-2\",\"code_type\":\"varop\",\"type\":\"dec-var\",\"stmnt_type\":\"\"}],\"commands\":[{\"type\":\"cmd-if\",\"condition\":\"x > 0\",\"statements\":[{\"txt\":\"\\\"the value of x is a positive integer\\\"\",\"code_type\":\"cmd\",\"type\":\"print\",\"stmnt_type\":\"if-statement\"},{\"txt\":\"\\\"the value of x is a negative integer\\\"\",\"code_type\":\"cmd\",\"type\":\"print\",\"stmnt_type\":\"else-statement\"}]}]}', ''),
('94dbac0ea722797108480b5dd7ec32d4', 2, 'Declare 1 Boolean variable boolVar that contains the value false, and 1 Integer variable result that has the value 0, and an Integer Array x that contains 2 values 10 and 5 respectively. Then create an if-else statement that checks if the value of boolVar is false. If the the condition resulted into true, get the sum of the first and second index of x and store it to result. If the condition resulted into false, subract the second index from the first index, and store the difference to result.', '{\"variables\":[{\"dataType\":\"Boolean\",\"var_identifier\":\"boolVar\",\"var_value\":\"false\",\"code_type\":\"varop\",\"type\":\"dec-var\",\"stmnt_type\":\"\"},{\"dataType\":\"int\",\"var_identifier\":\"result\",\"var_value\":\"0\",\"code_type\":\"varop\",\"type\":\"dec-var\",\"stmnt_type\":\"\"},{\"dataType\":\"int[]\",\"var_identifier\":\"x\",\"var_value\":[\"10\",\"5\"],\"code_type\":\"varop\",\"type\":\"dec-arr\",\"stmnt_type\":\"\"}],\"commands\":[{\"type\":\"cmd-if\",\"condition\":\"boolVar == false\",\"statements\":[{\"save_to\":\"result\",\"operation\":\"add\",\"var_1\":\"x[0]\",\"var_2\":\"x[1]\",\"code_type\":\"cmd\",\"type\":\"op\",\"stmnt_type\":\"if-statement\"},{\"save_to\":\"result\",\"operation\":\"subtract\",\"var_1\":\"x[0]\",\"var_2\":\"x[1]\",\"code_type\":\"cmd\",\"type\":\"op\",\"stmnt_type\":\"else-statement\"}]}]}', ''),
('94dbac0ea722797108480b5dd7ec32d4', 3, 'Declare 3 Double variables prelim that has the value of 33.5, finals that has the value of 21.3, and finalGrade that has the value of 0.0 . Then, do an operation that gets the sum of the value of prelim and finals and store the result to finalGrade. Then, create an if statement that checks if the value of finalGrade is greater than or equal to 60.0. If the condition is true print the text \"Congratulations\". If the condition is false, print the text \"Better luck next time\".', '{\"variables\":[{\"dataType\":\"double\",\"var_identifier\":\"prelim\",\"var_value\":\"33.5\",\"code_type\":\"varop\",\"type\":\"dec-var\",\"stmnt_type\":\"\"},{\"dataType\":\"double\",\"var_identifier\":\"finals\",\"var_value\":\"21.3\",\"code_type\":\"varop\",\"type\":\"dec-var\",\"stmnt_type\":\"\"},{\"dataType\":\"double\",\"var_identifier\":\"finalGrade\",\"var_value\":\"0\",\"code_type\":\"varop\",\"type\":\"dec-var\",\"stmnt_type\":\"\"}],\"commands\":[{\"type\":\"cmd-if\",\"condition\":\"finalGrade >= 60.0\",\"statements\":[{\"txt\":\"\\\"Congratulations\\\"\",\"code_type\":\"cmd\",\"type\":\"print\",\"stmnt_type\":\"if-statement\"},{\"txt\":\"\\\"Better luck next time\\\"\",\"code_type\":\"cmd\",\"type\":\"print\",\"stmnt_type\":\"else-statement\"}]}]}', ''),
('957a1a521b7edc68aa3a9814956f0185', 1, 'Declare an Integer variable x with a value of 5.', '{\"variables\":[{\"dataType\":\"int\",\"var_identifier\":\"x\",\"var_value\":\"5\"}]}', ''),
('957a1a521b7edc68aa3a9814956f0185', 2, 'Declare a Double variable doubleVar with a value of 2.24.', '{\"variables\":[{\"dataType\":\"double\",\"var_identifier\":\"doubleVar\",\"var_value\":\"2.24\",\"code_type\":\"varop\",\"type\":\"dec-var\"}]}', ''),
('b1b09bb963714729b8609ac8ec6ec50f', 1, 'declare two Arrays, first is an Array of Strings that has an identifier bag which contains the values notebook, ballpen, cellphone, shorts, and T-shirt, Second is an Array of Integers that has an identifier matNum which has the values 5, 2, 1, 1, and 1.', '{\"variables\":[{\"dataType\":\"String[]\",\"var_identifier\":\"bag\",\"var_value\":[\"\\\"notebook\\\"\",\"\\\"ballpen\\\"\",\"\\\"cellphone\\\"\",\"\\\"shorts\\\"\",\"\\\"T-shirt\\\"\"],\"code_type\":\"varop\",\"type\":\"dec-arr\"},{\"dataType\":\"int[]\",\"var_identifier\":\"matNum\",\"var_value\":[\"5\",\"2\",\"1\",\"1\",\"1\"],\"code_type\":\"varop\",\"type\":\"dec-arr\"}]}', ''),
('b1b09bb963714729b8609ac8ec6ec50f', 2, 'Declare an Array of Characters spellPH that contains the values P, h, i, l, i, p, p, i, n, e, and s.', '{\"variables\":[{\"dataType\":\"char[]\",\"var_identifier\":\"spellPH\",\"var_value\":[\"\'P\'\",\"\'h\'\",\"\'i\'\",\"\'l\'\",\"\'i\'\",\"\'p\'\",\"\'p\'\",\"\'i\'\",\"\'n\'\",\"\'e\'\",\"\'s\'\"],\"code_type\":\"varop\",\"type\":\"dec-arr\"}]}', ''),
('ba993028907e37ad3594e3ff961c7a73', 1, 'declare an Integer array ten_divisible that has 5 indexes with that contains the value 0. Then, create a for loop-statement. The first parameter is an integer variable ctr with a value of 0. The second parameter is a condition that checks if the value of ctr is less than or equal to 4. The third parameter is an operation that increments the value of ctr by 1. If the condition is true, do an operation that multiplies the value of ctr by 10 and store the result to an index of ten_divisible. Use the value of ctr as index for ten_divisible.', '{\"variables\":[{\"dataType\":\"int[]\",\"var_identifier\":\"ten_divisible\",\"var_value\":[\"0\",\"0\",\"0\",\"0\",\"0\"],\"code_type\":\"varop\",\"type\":\"dec-arr\",\"stmnt_type\":\"\"}],\"commands\":[{\"type\":\"cmd-loop-for\",\"condition\":\"int ctr = 0; ctr <= 4; ctr = ctr + 1\",\"statements\":[{\"save_to\":\"ten_divisible[ctr]\",\"operation\":\"multiply\",\"var_1\":\"ctr\",\"var_2\":\"10\",\"code_type\":\"cmd\",\"type\":\"op\"}]}]}', ''),
('c988381bf5566ea95b782537d9e658b9', 1, 'Declare a Integer variable counter that contains a value 0. Then create a while loop-statement that has a condition that checks if the value of the variable counter is less than 10. If the condition is true, do an operation that adds the value of counter and 1, then store the result to counter. Then, print the value of counter.', '{\"variables\":[{\"dataType\":\"int\",\"var_identifier\":\"counter\",\"var_value\":\"0\",\"code_type\":\"varop\",\"type\":\"dec-var\",\"stmnt_type\":\"\"}],\"commands\":[{\"type\":\"cmd-loop-while\",\"condition\":\"counter < 10\",\"statements\":[{\"save_to\":\"counter\",\"operation\":\"add\",\"var_1\":\"counter\",\"var_2\":\"1\",\"code_type\":\"cmd\",\"type\":\"op\",\"stmnt_type\":\"if-statement\"},{\"txt\":\"counter\",\"code_type\":\"cmd\",\"type\":\"print\",\"stmnt_type\":\"if-statement\"}]}]}', ''),
('e4063dee7c1cef380d72ff537fd10ceb', 1, 'Declare a variable boolVar with a date type of Boolean with a value of true', '{\"variables\":[{\"dataType\":\"Boolean\",\"var_identifier\":\"boolVar\",\"var_value\":\"true\",\"code_type\":\"varop\",\"type\":\"dec-var\"}]}', ''),
('f777abee0d2d6c37b223e15c05cf7e29', 1, 'Declare 1 Integer variable counter that contains the value 0. Then, create a do-while loop statement that has the condition that checks if the value of counter is less than 10. If the condition is true, print the value of the variable counter and increment the value of counter by 1.', '{\"variables\":[{\"dataType\":\"int\",\"var_identifier\":\"counter\",\"var_value\":\"0\",\"code_type\":\"varop\",\"type\":\"dec-var\",\"stmnt_type\":\"\"}],\"commands\":[{\"type\":\"cmd-loop-do-while\",\"condition\":\"counter < 10\",\"statements\":[{\"save_to\":\"counter\",\"operation\":\"add\",\"var_1\":\"counter\",\"var_2\":\"1\",\"code_type\":\"cmd\",\"type\":\"op\"},{\"txt\":\"counter\",\"code_type\":\"cmd\",\"type\":\"print\",\"stmnt_type\":\"\"}]}]}', '');

-- --------------------------------------------------------

--
-- Table structure for table `questionnaire`
--

CREATE TABLE `questionnaire` (
  `LVL_ID` varchar(255) NOT NULL,
  `QSTN` text NOT NULL,
  `QSTN_NUM` int(11) NOT NULL,
  `CHOICE_1` text NOT NULL,
  `CHOICE_2` text NOT NULL,
  `CHOICE_3` text NOT NULL,
  `CHOICE_4` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `role`
--

CREATE TABLE `role` (
  `ROLE_ID` int(11) NOT NULL,
  `ROLE_NAME` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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

CREATE TABLE `stage` (
  `STG_ID` varchar(255) NOT NULL,
  `STG_NUM` int(11) NOT NULL,
  `STG_NAME` varchar(50) DEFAULT NULL,
  `STG_DESCRIPTION` text,
  `STG_FILENAME` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `stage`
--

INSERT INTO `stage` (`STG_ID`, `STG_NUM`, `STG_NAME`, `STG_DESCRIPTION`, `STG_FILENAME`) VALUES
('1STG_BS', 1, 'ADMISSIONS OFFICE', 'Basic Syntax', 'Stages-01.png'),
('2STG_IS', 2, 'CAFETERIA', 'If-Statements', 'Stages-02.png'),
('3STG_FUNCT', 3, 'LIBRARY', 'Loops', 'Stages-04.png'),
('4STG_CLASS', 4, 'MAIN BLDG.', 'Classes', 'Stages-03.png');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
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
  `AVTR_ID` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`USER_ID`, `USER_USERNAME`, `USER_PASSWORD`, `USER_FNAME`, `USER_MNAME`, `USER_LNAME`, `USER_BDAY`, `USER_GENDER`, `USER_ADDRESS`, `USER_EMAIL`, `USER_ROLE`, `AVTR_ID`) VALUES
('1', 'triston', '12345', 'Triston Ian Miguel', 'Papag', 'Querubin', 'September 25 1995', 'M', '#73 Barangay Tagapo, Sta. Rosa, Laguna', 'timpquerubin@gmail.com', 2, 'cfcd208495d565ef66e7dff9f98764da'),
('2', 'jjcaraon', '12345', 'Julibee Joy', 'Andrade', 'Caraon', 'January 31 1996', 'F', 'Sta. Rosa, Laguna', 'joycaraon@ymail.com', 1, 'eccbc87e4b5ce2fe28308fd9f2a7baf3'),
('3', 'smpapag', '12345', 'Selwin Mathew', '', 'Papag', 'June 18 2001', 'M', 'Sta. Rosa, Laguna', 'selwin@yahoo.com', 1, 'c4ca4238a0b923820dcc509a6f75849b'),
('4', 'jjcorb', '12345', 'Jake', NULL, 'Corbadura', NULL, 'M', 'San Pedro, Laguna', 'jjcorbadura@gmail.com', NULL, 'c81e728d9d4c2f636f067f89cc14862c');

-- --------------------------------------------------------

--
-- Table structure for table `user_badges`
--

CREATE TABLE `user_badges` (
  `USER_ID` varchar(100) NOT NULL,
  `BDG_ID` varchar(100) NOT NULL,
  `AQUIRED_AT` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_badges`
--

INSERT INTO `user_badges` (`USER_ID`, `BDG_ID`, `AQUIRED_AT`) VALUES
('1', '1', '2018-03-13 02:44:55'),
('1', '10', '2018-03-15 04:36:05'),
('1', '2', '2018-03-13 02:44:55'),
('1', '9', '2018-03-15 04:36:05');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `avatar`
--
ALTER TABLE `avatar`
  ADD PRIMARY KEY (`AVTR_ID`);

--
-- Indexes for table `badges`
--
ALTER TABLE `badges`
  ADD PRIMARY KEY (`BDG_ID`),
  ADD KEY `STG_ID` (`STG_ID`);

--
-- Indexes for table `bully`
--
ALTER TABLE `bully`
  ADD PRIMARY KEY (`BLY_ID`),
  ADD KEY `LVL_ID` (`LVL_ID`);

--
-- Indexes for table `level`
--
ALTER TABLE `level`
  ADD PRIMARY KEY (`LVL_ID`),
  ADD KEY `MAP_ID` (`LVL_ID`),
  ADD KEY `MAP_ID_3` (`LVL_ID`),
  ADD KEY `STAGE` (`STG_ID`);
ALTER TABLE `level` ADD FULLTEXT KEY `MAP_ID_2` (`LVL_ID`);

--
-- Indexes for table `objective`
--
ALTER TABLE `objective`
  ADD PRIMARY KEY (`LVL_ID`,`OBJ_NUM`);

--
-- Indexes for table `progress`
--
ALTER TABLE `progress`
  ADD PRIMARY KEY (`PROG_ID`),
  ADD KEY `USER_ID` (`USER_ID`),
  ADD KEY `LVL_ID` (`LVL_ID`);

--
-- Indexes for table `question`
--
ALTER TABLE `question`
  ADD PRIMARY KEY (`BLY_ID`,`QSTN_NUM`);

--
-- Indexes for table `questionnaire`
--
ALTER TABLE `questionnaire`
  ADD KEY `QUIZ_ID` (`LVL_ID`),
  ADD KEY `LVL_ID` (`LVL_ID`);

--
-- Indexes for table `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`ROLE_ID`);

--
-- Indexes for table `stage`
--
ALTER TABLE `stage`
  ADD PRIMARY KEY (`STG_ID`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`USER_ID`),
  ADD KEY `USER_ROLE` (`USER_ROLE`),
  ADD KEY `AVTR_ID` (`AVTR_ID`),
  ADD KEY `AVTR_ID_2` (`AVTR_ID`);

--
-- Indexes for table `user_badges`
--
ALTER TABLE `user_badges`
  ADD PRIMARY KEY (`USER_ID`,`BDG_ID`),
  ADD KEY `BDG_ID` (`BDG_ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `progress`
--
ALTER TABLE `progress`
  MODIFY `PROG_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=178;
--
-- AUTO_INCREMENT for table `role`
--
ALTER TABLE `role`
  MODIFY `ROLE_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `badges`
--
ALTER TABLE `badges`
  ADD CONSTRAINT `badges_ibfk_1` FOREIGN KEY (`STG_ID`) REFERENCES `stage` (`STG_ID`);

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

--
-- Constraints for table `user_badges`
--
ALTER TABLE `user_badges`
  ADD CONSTRAINT `user_badges_ibfk_1` FOREIGN KEY (`USER_ID`) REFERENCES `user` (`USER_ID`),
  ADD CONSTRAINT `user_badges_ibfk_2` FOREIGN KEY (`BDG_ID`) REFERENCES `badges` (`BDG_ID`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
