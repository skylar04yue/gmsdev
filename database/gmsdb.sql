-- phpMyAdmin SQL Dump
-- version 4.8.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 08, 2020 at 04:13 PM
-- Server version: 10.1.33-MariaDB
-- PHP Version: 7.2.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `gmsdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `coursetbl`
--

CREATE TABLE `coursetbl` (
  `courseID` int(11) NOT NULL,
  `courseDept` varchar(50) NOT NULL,
  `courseTitle` varchar(200) NOT NULL,
  `courseAcro` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `coursetbl`
--

INSERT INTO `coursetbl` (`courseID`, `courseDept`, `courseTitle`, `courseAcro`) VALUES
(1, 'CICT', 'B.S. Information Technology', 'BSIT'),
(2, 'COED', 'Bachelor of Secondary Education', 'BSE'),
(4, 'COED', 'Bachelor of Elementary Education', 'BEED'),
(5, 'CMBT', 'B.S. Business Administration', 'BSBA'),
(6, 'CICT', 'asdfasfas', 'GHDFDSA'),
(7, 'BAS', 'baka', 'ASFASF');

-- --------------------------------------------------------

--
-- Table structure for table `curriculum`
--

CREATE TABLE `curriculum` (
  `currID` int(11) NOT NULL,
  `curriName` varchar(200) NOT NULL,
  `majorID` int(11) NOT NULL,
  `version` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `curriculum`
--

INSERT INTO `curriculum` (`currID`, `curriName`, `majorID`, `version`) VALUES
(1, 'BSIT -- Web System Technology  ', 1, '1'),
(2, 'BSBA -- Marketing Management  ', 2, 'new'),
(3, 'BSIT -- Web System Technology  ', 1, 'new'),
(4, 'BSE -- Filipino  ', 9, 'new'),
(5, 'BSIT -- Database  ', 7, 'new');

-- --------------------------------------------------------

--
-- Table structure for table `curri_subjtbl`
--

CREATE TABLE `curri_subjtbl` (
  `cursubjID` int(11) NOT NULL,
  `subjID` int(11) NOT NULL,
  `year` int(11) NOT NULL,
  `sem` int(11) NOT NULL,
  `currID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `curri_subjtbl`
--

INSERT INTO `curri_subjtbl` (`cursubjID`, `subjID`, `year`, `sem`, `currID`) VALUES
(1, 4, 1, 1, 3),
(2, 5, 1, 1, 3),
(3, 12, 1, 2, 3),
(4, 6, 1, 1, 3),
(5, 13, 1, 2, 3),
(6, 9, 1, 1, 4),
(7, 15, 1, 1, 4),
(8, 16, 1, 2, 4),
(9, 17, 2, 1, 3),
(10, 18, 1, 1, 2),
(11, 19, 1, 1, 2),
(12, 20, 1, 1, 2),
(13, 7, 1, 1, 2),
(14, 8, 1, 1, 2),
(15, 22, 1, 1, 2),
(16, 11, 1, 1, 2),
(17, 23, 1, 1, 2),
(18, 24, 1, 2, 2),
(19, 31, 1, 2, 2),
(20, 10, 1, 2, 2),
(21, 25, 1, 2, 2),
(22, 26, 1, 2, 2),
(23, 27, 1, 2, 2),
(27, 28, 1, 2, 2),
(28, 29, 1, 2, 2),
(29, 30, 1, 2, 2);

-- --------------------------------------------------------

--
-- Table structure for table `gradetbl`
--

CREATE TABLE `gradetbl` (
  `gradeID` int(11) NOT NULL,
  `regID` int(11) NOT NULL,
  `studID` int(11) NOT NULL,
  `subjID` int(11) NOT NULL,
  `rating` decimal(3,2) NOT NULL,
  `rexam` decimal(3,2) NOT NULL,
  `remarks` int(2) DEFAULT NULL,
  `faculty` int(11) NOT NULL,
  `staff` int(11) NOT NULL,
  `last_access` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `gradetbl`
--

INSERT INTO `gradetbl` (`gradeID`, `regID`, `studID`, `subjID`, `rating`, `rexam`, `remarks`, `faculty`, `staff`, `last_access`) VALUES
(1, 1, 0, 4, '0.00', '0.00', NULL, 0, 0, '2020-07-04 11:43:23'),
(2, 1, 0, 11, '0.00', '0.00', NULL, 0, 0, '2020-07-04 11:43:23'),
(3, 1, 0, 5, '0.00', '0.00', NULL, 0, 0, '2020-07-04 11:43:23'),
(4, 1, 0, 12, '1.00', '1.00', NULL, 0, 0, '2020-07-04 11:43:23'),
(5, 2, 0, 5, '0.00', '0.00', NULL, 0, 0, '2020-07-04 11:43:23'),
(6, 2, 0, 7, '0.00', '0.00', NULL, 0, 0, '2020-07-04 11:43:23'),
(7, 3, 0, 12, '0.00', '0.00', NULL, 0, 0, '2020-07-04 11:43:23'),
(8, 3, 0, 7, '0.00', '0.00', NULL, 0, 0, '2020-07-04 11:43:23'),
(9, 3, 0, 15, '0.00', '0.00', NULL, 0, 0, '2020-07-04 11:43:23'),
(10, 4, 0, 9, '0.00', '0.00', 1, 0, 0, '2020-07-04 11:43:23'),
(11, 4, 0, 16, '0.00', '0.00', NULL, 0, 0, '2020-07-04 11:43:23'),
(13, 4, 0, 8, '0.00', '0.00', NULL, 0, 0, '2020-07-04 11:43:23'),
(17, 6, 0, 4, '0.00', '0.00', NULL, 0, 0, '2020-07-04 11:43:23'),
(18, 6, 0, 9, '0.00', '0.00', NULL, 0, 0, '2020-07-04 11:43:23'),
(19, 4, 0, 4, '5.00', '3.00', 1, 0, 0, '2020-07-04 11:43:23'),
(20, 4, 0, 5, '0.00', '0.00', 1, 0, 0, '2020-07-04 11:43:23'),
(22, 7, 0, 24, '1.75', '0.00', 1, 0, 0, '2020-07-05 09:19:06'),
(23, 7, 0, 31, '2.00', '0.00', 1, 0, 0, '2020-07-05 09:19:06'),
(24, 7, 0, 10, '2.50', '0.00', 1, 0, 0, '2020-07-05 09:19:06'),
(25, 7, 0, 25, '2.00', '0.00', 1, 0, 0, '2020-07-05 09:19:06'),
(26, 7, 0, 26, '2.25', '0.00', 1, 0, 0, '2020-07-05 09:19:06'),
(27, 7, 0, 27, '2.00', '0.00', 1, 0, 0, '2020-07-05 09:19:06'),
(28, 7, 0, 28, '2.25', '0.00', 1, 0, 0, '2020-07-05 09:19:06'),
(29, 7, 0, 29, '1.50', '0.00', 1, 0, 0, '2020-07-05 09:19:06'),
(30, 7, 0, 23, '1.50', '0.00', 1, 0, 0, '2020-07-05 09:19:06'),
(31, 8, 17, 24, '1.75', '0.00', 1, 0, 0, '2020-07-07 11:15:52'),
(32, 8, 17, 31, '1.75', '0.00', 1, 0, 0, '2020-07-07 11:15:52'),
(33, 8, 17, 10, '2.50', '0.00', 1, 0, 0, '2020-07-07 11:15:52'),
(34, 8, 17, 25, '1.75', '0.00', 1, 0, 0, '2020-07-07 11:15:52'),
(35, 8, 17, 26, '2.00', '0.00', 1, 0, 0, '2020-07-07 11:15:52'),
(36, 8, 17, 27, '2.75', '0.00', 1, 0, 0, '2020-07-07 11:15:52'),
(37, 8, 17, 28, '2.25', '0.00', 1, 0, 0, '2020-07-07 11:15:52'),
(38, 8, 17, 29, '2.00', '0.00', 1, 0, 0, '2020-07-07 11:15:52'),
(39, 8, 17, 30, '1.50', '0.00', 1, 0, 0, '2020-07-07 11:15:52'),
(40, 9, 17, 18, '1.75', '0.00', 1, 0, 0, '2020-07-08 13:38:10'),
(41, 9, 17, 19, '2.00', '0.00', 1, 0, 0, '2020-07-08 13:38:10'),
(42, 9, 17, 20, '2.50', '0.00', 1, 0, 0, '2020-07-08 13:38:10'),
(43, 9, 17, 7, '2.00', '0.00', 1, 0, 0, '2020-07-08 13:38:10'),
(44, 9, 17, 8, '2.25', '0.00', 1, 0, 0, '2020-07-08 13:38:10'),
(45, 9, 17, 22, '2.00', '0.00', 1, 0, 0, '2020-07-08 13:38:10'),
(46, 9, 17, 23, '1.50', '0.00', 1, 0, 0, '2020-07-08 13:38:10'),
(47, 9, 17, 11, '1.50', '0.00', 1, 0, 0, '2020-07-08 13:38:10');

-- --------------------------------------------------------

--
-- Table structure for table `majortbl`
--

CREATE TABLE `majortbl` (
  `majorID` int(11) NOT NULL,
  `majorName` varchar(50) NOT NULL,
  `courseID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `majortbl`
--

INSERT INTO `majortbl` (`majorID`, `majorName`, `courseID`) VALUES
(1, 'Web System Technology', 1),
(2, 'Marketing Management', 5),
(3, 'Entrepreneurship', 5),
(5, 'Networking', 1),
(7, 'Database', 1),
(8, 'Networking', 7),
(9, 'Filipino', 2);

-- --------------------------------------------------------

--
-- Table structure for table `mngt_memberslist`
--

CREATE TABLE `mngt_memberslist` (
  `mem_id` int(11) NOT NULL,
  `pid` int(11) NOT NULL,
  `houseno` int(11) NOT NULL,
  `memberdate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mngt_memberslist`
--

INSERT INTO `mngt_memberslist` (`mem_id`, `pid`, `houseno`, `memberdate`) VALUES
(6, 22, 12902, '2017-09-22 13:32:27'),
(7, 23, 12905, '2017-09-23 14:16:38'),
(8, 24, 14219, '2017-09-23 14:20:29'),
(9, 25, 12421, '2017-09-26 08:35:08'),
(10, 26, 12421, '2017-09-26 08:35:18'),
(11, 27, 12421, '2017-09-26 08:40:04'),
(12, 28, 11117, '2017-09-26 08:46:58'),
(13, 29, 12811, '2017-09-26 08:52:26'),
(14, 30, 14816, '2017-09-26 08:58:10'),
(15, 31, 13122, '2017-09-26 09:03:30'),
(16, 32, 11321, '2017-09-26 09:08:48'),
(17, 33, 11211, '2017-09-26 09:12:14'),
(18, 34, 14002, '2017-09-26 09:18:27'),
(19, 35, 13904, '2017-09-26 09:25:37'),
(20, 36, 8601, '2017-09-26 09:32:56'),
(21, 37, 8406, '2017-09-26 09:41:21');

-- --------------------------------------------------------

--
-- Table structure for table `person`
--

CREATE TABLE `person` (
  `person_id` int(11) NOT NULL,
  `firstname` varchar(50) NOT NULL,
  `nickname` varchar(50) NOT NULL,
  `midname` varchar(50) NOT NULL,
  `lastname` varchar(50) NOT NULL,
  `cpnum` varchar(11) NOT NULL,
  `bday` varchar(50) NOT NULL,
  `address` varchar(255) NOT NULL,
  `gender` char(6) NOT NULL,
  `email` varchar(100) NOT NULL,
  `profilepix` varchar(200) NOT NULL,
  `privacy` int(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `person`
--

INSERT INTO `person` (`person_id`, `firstname`, `nickname`, `midname`, `lastname`, `cpnum`, `bday`, `address`, `gender`, `email`, `profilepix`, `privacy`) VALUES
(1, 'Jodell', '', '', 'Bulaclac', '09059654520', 'August 15 1986', 'Rio Chico', 'Male', 'jabicute04@gmail.com', '', 0),
(2, 'Jabi', '', '', 'Bulaclac', '09284567761', 'Jan 4, 2014', 'Brgy. Bago', 'Female', 'jabi@gmail.com', '', 0),
(3, 'sfasfsadf', '', '', 'sadfsdf', 'sdfsdf', '2017-08-09', '09284567761', '', 'dfs@gmail.com', '', 0),
(4, 'ssss', '', '', 'sss', 'ss', '2017-08-09', '09284567761', '', 'dfs@gmail.com', '', 0),
(5, 'JC', '', '', 'Rico', 'Brgy. Bago', '2017-05-10', '09284567761', 'Male', 'jcrico@gmail.com', '', 0),
(6, 'lance', '', '', 'Rico', 'Brgy. Bago', '2017-02-15', '09059654520', 'Male', 'lancerico@gmail.com', '', 0),
(7, 'lance     ', ' lancer    ', '', 'Rico', '09284567761', '2016-09-06', 'Brgy. Bago ', 'Male', 'lancerico@gmail.com', 'img/profilepix/IMG20170205202539.jpg', 0),
(8, 'Jociel    ', 'ganda       ', '', 'Bulaclac', '09123456789', '2017-09-05', 'Brgy. Bago nazareth', 'Female', 'joy@gmail.com', 'img/profilepix/IMG20170205202353.jpg', 0),
(9, 'janjan', '', '', 'Bulaclac', 'Brgy. Bago', '2017-05-11', '09284567761', 'Male', 'janjan@gmail.com', '', 0),
(10, 'asfdsfd', '', '', 'asfasdf', 'asfdsadf', '2017-08-09', '09284567761', 'Female', 'jabi4@gmail.com', '', 0),
(12, 'fgdsagsdfg', '', '', 'dasgadgsd', 'sdfgsdg', '2017-08-09', '09284567761', 'Male', 'jabi4@gmail.com', '', 0),
(13, 'irenea', '', '', 'development', '00000', '2013-06-06', '09059654520', 'Male', 'irenea@gmail.com', '', 0),
(14, 'mark', '', '', 'ladignon', '09097122110', '1990-07-29', 'any', 'Male', 'mladignon29@yahoo.com', '', 0),
(22, 'Simeon', 'Simeon', 'Reyes', 'Acosta', '0912354468', '2010-06-22', 'Bago', 'Male', 'simeon@gmail.com', '', 0),
(23, 'Jenuel', 'Jenuel', 'Brasi', 'Barlis', '09123456789', '2017-09-10', 'Bago', 'Male', 'barlis@gmail.com', '', 0),
(24, 'Cyreen', 'Cyreen', 'Czar', 'Mendoza', '0945455', '2015-06-23', 'Penaranda', 'Male', 'cyreen@gmail.com', '', 0),
(27, 'Jillaine', 'Jillaine', 'Lanuza', 'Pajarillaga', '09978823297', '1997-09-18', 'Brgy. Padolina General Tinio N. E', 'Female', 'jillianepajarillaga18@gmail.com', 'img/profilepix/ganda.jpg', 0),
(28, 'Paulo', 'Paulo', 'Catalino', 'Manabat', '09124678542', '1999-09-12', 'Brgy. San Pedro General Tinio Nueva Ecija', 'Male', 'pau@gmail.com', 'img/profilepix/timaa.jpg', 0),
(29, 'Shella Marie', 'Shella Marie', 'Yangao', 'Jaculbe', '09876789133', '1991-09-09', 'Nazareth Gen. Tinio Nueva Ecija', 'Female', 'shella@gmail.com', '', 0),
(30, 'Mark Harizon ', 'Mark Harizon ', 'Reyes', 'Ladignon', '09501556244', '1990-07-24', 'Brgy. Padolina General Tinio N. E', 'Female', 'harizon@gmail.com', '', 0),
(31, 'Chrizel Joy', 'Chrizel Joy', 'Pajarillaga', 'Dayupay', '09122244556', '1990-12-03', 'Brgy. Rio Chico N.E', 'Female', 'chrizel@gmail.com', '', 0),
(32, 'Jessie ', 'wAFU', 'Francisco', 'Pajarillaga', '09107607656', '1970-12-07', 'Brgy. Padolina General Tinio N. E', 'Male', 'jessie@gmail.com', '', 0),
(33, 'Jennyvieve', 'Jennyvieve', 'Maducdoc', 'Manabat', '09105634511', '1991-01-08', 'Brgy. Conception N.E', 'Female', 'jenny@gmail.com', '', 0),
(34, 'Patrick', 'Patrick', 'Rodriquez', 'Lanuza', '09508876540', '1992-12-13', 'Brgy. Rio Chico Nueva Ecija', 'Male', 'patrick@gmail.com', '', 0),
(35, 'Fatima', 'Fatima', 'Francisco', 'Madrid', '099913564', '1997-08-24', 'Santo Thomas Penaranda N.E', 'Female', 'fatima@gmail.com', '', 0),
(36, 'Reign', 'Reign', 'Bautista', 'Cruz', '09197790321', '1977-02-05', 'Brgy. 2 Penaranda N.e', 'Female', 'reign@gmail.com', 'img/profilepix/tima.jpg', 0),
(37, 'Roberto  ', 'berting', 'Manalo', 'Santiago', '09654671323', '1983-11-23', 'Callos Penaranda N.E', 'Male', 'roberto@gmail.com', '', 0),
(38, 'arjay ', ' ', '', 'abdon', '0987654321', '1998-02-03', 'Brgy. Padolina General Tinio N. E', 'Male', 'arjayabdon@gmail.com', 'img/profilepix/nano.jpg', 0);

-- --------------------------------------------------------

--
-- Table structure for table `prereqtbl`
--

CREATE TABLE `prereqtbl` (
  `prereqID` int(11) NOT NULL,
  `prereqSub` int(11) NOT NULL,
  `subjID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `prereqtbl`
--

INSERT INTO `prereqtbl` (`prereqID`, `prereqSub`, `subjID`) VALUES
(1, 4, 12),
(2, 5, 12),
(5, 6, 14),
(10, 12, 17),
(11, 14, 17),
(12, 21, 26);

-- --------------------------------------------------------

--
-- Table structure for table `registrationtbl`
--

CREATE TABLE `registrationtbl` (
  `regID` int(11) NOT NULL,
  `studID` int(11) NOT NULL,
  `regMajor` int(11) NOT NULL,
  `regYrlevel` int(11) NOT NULL,
  `regSem` int(11) NOT NULL,
  `regAcadYr` varchar(50) NOT NULL,
  `regSection` varchar(50) NOT NULL,
  `regResidency` int(11) NOT NULL DEFAULT '0',
  `currID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `registrationtbl`
--

INSERT INTO `registrationtbl` (`regID`, `studID`, `regMajor`, `regYrlevel`, `regSem`, `regAcadYr`, `regSection`, `regResidency`, `currID`) VALUES
(1, 15, 1, 2, 2, '2019-2020', '2-gilas', 0, 0),
(2, 1, 1, 1, 1, '2017-2018', '1-B', 0, 0),
(3, 1, 1, 1, 2, '2017-2018', '1-A', 0, 0),
(4, 4, 1, 5, 4, '2020-2022', '6-A', 1, 0),
(6, 4, 7, 5, 3, '2021-2021', '1-B', 0, 0),
(7, 8, 2, 1, 2, '2019-2020', 'Mark 1', 0, 0),
(8, 17, 0, 1, 2, '2018-2019', '1-A', 0, 2),
(9, 17, 0, 1, 1, '2018-2019', '1-A', 0, 2);

-- --------------------------------------------------------

--
-- Table structure for table `stafftbl`
--

CREATE TABLE `stafftbl` (
  `staffID` int(11) NOT NULL,
  `firstName` varchar(100) NOT NULL,
  `nickName` varchar(50) DEFAULT NULL,
  `midName` varchar(100) DEFAULT NULL,
  `lastName` varchar(100) NOT NULL,
  `cpnum` varchar(50) DEFAULT NULL,
  `address` varchar(255) NOT NULL,
  `bday` date NOT NULL,
  `gender` varchar(6) NOT NULL,
  `email` varchar(100) DEFAULT NULL,
  `profilepix` varchar(200) DEFAULT NULL,
  `refnote` int(2) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `stafftbl`
--

INSERT INTO `stafftbl` (`staffID`, `firstName`, `nickName`, `midName`, `lastName`, `cpnum`, `address`, `bday`, `gender`, `email`, `profilepix`, `refnote`) VALUES
(1, 'lance', 'lans', 'rico', 'bulaclac', '09553846491', 'brgy.bago, gen. Tinio,N.E.', '0000-00-00', 'male', 'skylar04yue@gmail.com', NULL, 1),
(2, 'baba', 'sdfsdf', 'sdfsaf', 'sdfdsfs', '09153554456', 'baba', '2020-06-24', 'Male', 'baba@gmail.com', NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `studtbl`
--

CREATE TABLE `studtbl` (
  `studID` int(11) NOT NULL,
  `studNum` varchar(50) NOT NULL,
  `fName` varchar(50) NOT NULL,
  `mName` varchar(50) NOT NULL,
  `lName` varchar(50) NOT NULL,
  `gender` int(2) NOT NULL,
  `DOB` date NOT NULL,
  `email` varchar(50) NOT NULL,
  `cpnum` varchar(20) NOT NULL,
  `elem` varchar(200) NOT NULL,
  `highSchool` varchar(200) NOT NULL,
  `prk` varchar(50) NOT NULL,
  `brgy` varchar(50) NOT NULL,
  `city` varchar(50) NOT NULL,
  `prov` varchar(50) NOT NULL,
  `studregdate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `curMajor` int(2) NOT NULL,
  `curYrlevel` int(2) NOT NULL,
  `curSem` int(2) NOT NULL,
  `curSection` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `studtbl`
--

INSERT INTO `studtbl` (`studID`, `studNum`, `fName`, `mName`, `lName`, `gender`, `DOB`, `email`, `cpnum`, `elem`, `highSchool`, `prk`, `brgy`, `city`, `prov`, `studregdate`, `curMajor`, `curYrlevel`, `curSem`, `curSection`) VALUES
(1, 'GT17-110', 'Emerson', 'Marquez', 'Oller', 0, '1900-05-05', 'emerson@gmail.com', '09991234567', '', '', 'Ilang ilang', 'Sampaguita', 'Gen. Tinio', 'Nueva Ecija', '2020-06-26 08:29:37', 1, 1, 2, '1-A'),
(2, 'GT17-5214', 'fasfa', 'asdfasdf', 'nasfdadsf', 1, '2008-02-15', 'sfsfd@gmail.com', '09123459874', '', '', 'sdfasdf', 'asfdasdf', 'asfdasdf', 'asfasf', '2020-06-26 08:33:21', 0, 0, 0, ''),
(3, 'GT17-5214', 'fasfa', 'asdfasdf', 'gasfdadsf', 1, '2008-02-15', 'sfsfd@gmail.com', '09123459874', '', '', 'sdfasdf', 'asfdasdf', 'asfdasdf', 'asfasf', '2020-06-26 08:34:25', 0, 0, 0, ''),
(4, 'GT17-5214', 'fasfa', 'asdfasdf', 'asfdadsf', 1, '2008-02-15', 'sfsfd@gmail.com', '09123459874', '', '', 'sdfasdf', 'asfdasdf', 'asfdasdf', 'asfasf', '2020-06-26 08:34:33', 7, 5, 3, '1-B'),
(5, 'GT17-110', 'asfasdf', 'asfasf', 'xasf', 1, '2020-06-01', 'sfsfd@gmail.com', '1123154545', '', '', 'sdfasdf', 'dsfdsf', 'asfdasdf', 'asfasf', '2020-06-26 08:39:13', 0, 0, 0, ''),
(6, 'GT17-5214', 'fasfa', 'asdfasdf', 'nasfdadsf', 1, '2008-02-15', 'sfsfd@gmail.com', '09123459874', '', '', 'sdfasdf', 'asfdasdf', 'asfdasdf', 'asfasf', '2020-06-26 08:33:21', 0, 0, 0, ''),
(7, 'GT17-5214', 'fasfa', 'asdfasdf', 'gasfdadsf', 1, '2008-02-15', 'sfsfd@gmail.com', '09123459874', '', '', 'sdfasdf', 'asfdasdf', 'asfdasdf', 'asfasf', '2020-06-26 08:34:25', 0, 0, 0, ''),
(8, 'GT17-5214', 'Angeline', 'Lejano', 'Enriquez', 0, '2008-02-15', 'sfsfd@gmail.com', '09123459874', '', '', 'sdfasdf', 'asfdasdf', 'asfdasdf', 'asfasf', '2020-06-26 08:34:33', 2, 1, 2, 'Mark 1'),
(9, 'GT17-110', 'asfasdf', 'asfasf', 'xa', 1, '2020-06-01', 'sfsfd@gmail.com', '1123154545', '', '', 'sdfasdf', 'dsfdsf', 'asfdasdf', 'asfasf', '2020-06-26 08:39:13', 0, 0, 0, ''),
(10, 'GT17-5214', 'fasfa', 'asdfasdf', 'nasfdadsf', 1, '2008-02-15', 'sfsfd@gmail.com', '09123459874', '', '', 'sdfasdf', 'asfdasdf', 'asfdasdf', 'asfasf', '2020-06-26 08:33:21', 0, 0, 0, ''),
(11, 'GT17-5214', 'fasfa', 'asdfasdf', 'gasfdadsf', 1, '2008-02-15', 'sfsfd@gmail.com', '09123459874', '', '', 'sdfasdf', 'asfdasdf', 'asfdasdf', 'asfasf', '2020-06-26 08:34:25', 0, 0, 0, ''),
(12, 'GT17-110', 'asfasdf', 'asfasf', 'xab', 1, '2020-06-01', 'sfsfd@gmail.com', '1123154545', '', '', 'sdfasdf', 'dsfdsf', 'asfdasdf', 'asfasf', '2020-06-26 08:39:13', 0, 0, 0, ''),
(13, 'GT17-5214', 'fasfa', 'asdfasdf', 'nasfdadsf', 1, '2008-02-15', 'sfsfd@gmail.com', '09123459874', '', '', 'sdfasdf', 'asfdasdf', 'asfdasdf', 'asfasf', '2020-06-26 08:33:21', 0, 0, 0, ''),
(14, 'GT17-5214', 'fasfa', 'asdfasdf', 'gasfdadsf', 1, '2008-02-15', 'sfsfd@gmail.com', '09123459874', '', '', 'sdfasdf', 'asfdasdf', 'asfdasdf', 'asfasf', '2020-06-26 08:34:25', 0, 0, 0, ''),
(15, 'GT17-105', 'Reymart', 'Bautista', 'Limbo', 1, '2000-02-15', 'reymartlimbo@gmail.com', '09123459874', '', '', 'sdfasdf', 'Concepcion', 'Gen. Tinio', 'Nueva Ecija', '2020-06-26 08:34:33', 1, 2, 2, '2-gilas'),
(16, 'GT17-110', 'asfasdf', 'asfasf', 'xasfasfd', 1, '2020-06-01', 'sfsfd@gmail.com', '1123154545', '', '', 'sdfasdf', 'dsfdsf', 'asfdasdf', 'asfasf', '2020-06-26 08:39:13', 0, 0, 0, ''),
(17, 'GT17-268', 'Erica Joy', 'Ramos', 'Diaz', 0, '2000-05-02', 'ericajoy@gmail.com', '09191234569', 'Gen. Tinio Central Elem. School', 'Gen. Tinio National High School', '', 'Concepcion', 'Gen. Tinio', 'Nueva Ecija', '2020-07-07 11:14:35', 2, 1, 1, '1-A');

-- --------------------------------------------------------

--
-- Table structure for table `subjtbl`
--

CREATE TABLE `subjtbl` (
  `subjID` int(11) NOT NULL,
  `subjCode` varchar(10) NOT NULL,
  `subjTitle` varchar(100) NOT NULL,
  `subjUnit` int(2) NOT NULL,
  `subjLec` int(2) DEFAULT NULL,
  `subjLab` int(2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `subjtbl`
--

INSERT INTO `subjtbl` (`subjID`, `subjCode`, `subjTitle`, `subjUnit`, `subjLec`, `subjLab`) VALUES
(1, 'ITP 06', 'Web Development', 3, 3, 1),
(2, 'NSTP 11', 'National Service Training Program 1', 3, -2, -3),
(3, 'PE 4', 'Advance Team Sports', 2, 0, 3),
(4, 'CC-100', 'Introduction to Computing', 3, 3, 0),
(5, 'CC-101', 'Computer Programming 1, Fundamentals', 3, 2, 3),
(6, 'IT-NET01', 'Networking 1, Fundamentals', 3, 2, 3),
(7, 'GE 4', 'Mathematics in the Modern World', 3, 3, 0),
(8, 'GE 5', 'Purposive Communication', 3, 3, 0),
(9, 'FIL 1', 'Kontekswalisadong Komunikasyon sa Filipino (KOMFIL)', 3, 3, 0),
(10, 'GE 7', 'Science, Technology and Society', 3, 3, 0),
(11, 'PE 1', 'Advanced Gymnastics', 2, 2, 0),
(12, 'CC-102', 'Computer Programming 2, Intermediate', 3, 2, 3),
(13, 'IT-NET02', 'Networking 2, Advanced', 3, 2, 3),
(14, 'IT-WS01', 'Web Systems and Technologies 1', 3, 2, 3),
(15, 'NSTP 1', 'National Service Training Program', -3, 3, 0),
(16, 'FIL 2', 'Filipino sa Iba\'t Ibang Disiplina (FILDIS)', 3, 3, 0),
(17, 'CC-103', 'Data Structure and Algorithm', 3, 2, 3),
(18, 'GE 1', 'Understanding the Self', 3, 3, 0),
(19, 'GE 2', 'Readings in the Philippine History', 3, 3, 0),
(20, 'GE 3', 'The Contemporary World', 3, 3, 0),
(21, 'GE Fil 1', 'Kontekstwalisadong Komunikasyon sa Filipino (KOMFIL)', 3, 3, 0),
(22, 'BA CORE 1', 'Basic Microeconomics', 3, 3, 0),
(23, 'NSTP 1', 'ROTC/CWTS/LTS', -3, -3, 0),
(24, 'BA CORE 2', 'Good Governance and Social Responsibility', 3, 3, 0),
(25, 'GE 8', 'Ethics', 3, 3, 0),
(26, 'GE Fil 2', 'Filipino sa Iba\'t Ibang Disiplina (FILDIS)', 3, 3, 0),
(27, 'Elective 1', 'Entrepreneurial Management', 3, 3, 0),
(28, 'Elective 2', 'Personal Finance', 3, 3, 0),
(29, 'PE 2', 'Rythmic Activities Folk Dance/Social Dances', 2, 2, 0),
(30, 'NSTP 2', 'ROTC/CWTS/LTS', -3, -3, 0),
(31, 'GE 6', 'Art Appreciation', 3, 3, 0);

-- --------------------------------------------------------

--
-- Table structure for table `userstbl`
--

CREATE TABLE `userstbl` (
  `userID` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `staffID` int(11) DEFAULT NULL,
  `permission` int(2) NOT NULL,
  `date_registerd` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `userstbl`
--

INSERT INTO `userstbl` (`userID`, `username`, `password`, `staffID`, `permission`, `date_registerd`) VALUES
(1, 'lancer', '5f4dcc3b5aa765d61d8327deb882cf99', 1, 1, '2020-06-25 05:04:38'),
(2, 'babadubadu', '5e5e7166ad963afe4b996b9191ba81eb', 2, 1, '2020-06-28 10:50:00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `coursetbl`
--
ALTER TABLE `coursetbl`
  ADD PRIMARY KEY (`courseID`);

--
-- Indexes for table `curriculum`
--
ALTER TABLE `curriculum`
  ADD PRIMARY KEY (`currID`);

--
-- Indexes for table `curri_subjtbl`
--
ALTER TABLE `curri_subjtbl`
  ADD PRIMARY KEY (`cursubjID`);

--
-- Indexes for table `gradetbl`
--
ALTER TABLE `gradetbl`
  ADD PRIMARY KEY (`gradeID`),
  ADD KEY `regID` (`regID`);

--
-- Indexes for table `majortbl`
--
ALTER TABLE `majortbl`
  ADD PRIMARY KEY (`majorID`),
  ADD KEY `courseID` (`courseID`);

--
-- Indexes for table `mngt_memberslist`
--
ALTER TABLE `mngt_memberslist`
  ADD PRIMARY KEY (`mem_id`),
  ADD UNIQUE KEY `pid` (`pid`);

--
-- Indexes for table `person`
--
ALTER TABLE `person`
  ADD PRIMARY KEY (`person_id`);

--
-- Indexes for table `prereqtbl`
--
ALTER TABLE `prereqtbl`
  ADD PRIMARY KEY (`prereqID`);

--
-- Indexes for table `registrationtbl`
--
ALTER TABLE `registrationtbl`
  ADD PRIMARY KEY (`regID`);

--
-- Indexes for table `stafftbl`
--
ALTER TABLE `stafftbl`
  ADD PRIMARY KEY (`staffID`);

--
-- Indexes for table `studtbl`
--
ALTER TABLE `studtbl`
  ADD PRIMARY KEY (`studID`);

--
-- Indexes for table `subjtbl`
--
ALTER TABLE `subjtbl`
  ADD PRIMARY KEY (`subjID`);

--
-- Indexes for table `userstbl`
--
ALTER TABLE `userstbl`
  ADD PRIMARY KEY (`userID`),
  ADD KEY `staffID` (`staffID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `coursetbl`
--
ALTER TABLE `coursetbl`
  MODIFY `courseID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `curriculum`
--
ALTER TABLE `curriculum`
  MODIFY `currID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `curri_subjtbl`
--
ALTER TABLE `curri_subjtbl`
  MODIFY `cursubjID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `gradetbl`
--
ALTER TABLE `gradetbl`
  MODIFY `gradeID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT for table `majortbl`
--
ALTER TABLE `majortbl`
  MODIFY `majorID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `mngt_memberslist`
--
ALTER TABLE `mngt_memberslist`
  MODIFY `mem_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `person`
--
ALTER TABLE `person`
  MODIFY `person_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `prereqtbl`
--
ALTER TABLE `prereqtbl`
  MODIFY `prereqID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `registrationtbl`
--
ALTER TABLE `registrationtbl`
  MODIFY `regID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `stafftbl`
--
ALTER TABLE `stafftbl`
  MODIFY `staffID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `studtbl`
--
ALTER TABLE `studtbl`
  MODIFY `studID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `subjtbl`
--
ALTER TABLE `subjtbl`
  MODIFY `subjID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `userstbl`
--
ALTER TABLE `userstbl`
  MODIFY `userID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `gradetbl`
--
ALTER TABLE `gradetbl`
  ADD CONSTRAINT `gradetbl_ibfk_1` FOREIGN KEY (`regID`) REFERENCES `registrationtbl` (`regID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `majortbl`
--
ALTER TABLE `majortbl`
  ADD CONSTRAINT `majortbl_ibfk_1` FOREIGN KEY (`courseID`) REFERENCES `coursetbl` (`courseID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `userstbl`
--
ALTER TABLE `userstbl`
  ADD CONSTRAINT `userstbl_ibfk_1` FOREIGN KEY (`staffID`) REFERENCES `stafftbl` (`staffID`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
