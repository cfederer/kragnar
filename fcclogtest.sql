-- phpMyAdmin SQL Dump
-- version 4.1.12
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Dec 03, 2014 at 03:15 AM
-- Server version: 5.6.16
-- PHP Version: 5.5.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `test`
--

-- --------------------------------------------------------

--
-- Table structure for table `fcclogtest`
--

CREATE TABLE IF NOT EXISTS `fcclogtest` (
  `timestamp` datetime NOT NULL,
  `showtime` varchar(12) DEFAULT NULL,
  `dj` varchar(35) NOT NULL,
  `pa_volts` int(11) DEFAULT NULL,
  `pa_amps` int(11) DEFAULT NULL,
  `pa_pwr` int(11) DEFAULT NULL,
  `room_temp` int(11) DEFAULT NULL,
  `readings` tinyint(1) NOT NULL,
  `r_zero` varchar(30) DEFAULT NULL,
  `r_twelve` varchar(30) DEFAULT NULL,
  `r_twentynine` varchar(30) DEFAULT NULL,
  `r_fortysix` varchar(30) DEFAULT NULL,
  `r_fiftyfive` varchar(30) DEFAULT NULL,
  `notes` varchar(100) DEFAULT 'NULL',
  `digital_signature` varchar(35) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `fcclogtest`
--

INSERT INTO `fcclogtest` (`timestamp`, `showtime`, `dj`, `pa_volts`, `pa_amps`, `pa_pwr`, `room_temp`, `readings`, `r_zero`, `r_twelve`, `r_twentynine`, `r_fortysix`, `r_fiftyfive`, `notes`, `digital_signature`) VALUES
('2014-11-21 11:24:50', '4-5', 'sean hellebusch', 1, 2, 3, 78, 1, 'asd', 'asdf', 'asdf', 'asd', 'asdf', 'hello world', 'sean hellebusch');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
