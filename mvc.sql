-- phpMyAdmin SQL Dump
-- version 4.0.4
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Sep 09, 2013 at 03:46 PM
-- Server version: 5.5.32
-- PHP Version: 5.4.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `mvc`
--
CREATE DATABASE IF NOT EXISTS `mvc` DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci;
USE `mvc`;

-- --------------------------------------------------------

--
-- Table structure for table `accesslist`
--

CREATE TABLE IF NOT EXISTS `accesslist` (
  `id_accessList` int(11) NOT NULL AUTO_INCREMENT,
  `controller` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `accessLevel` int(1) NOT NULL,
  PRIMARY KEY (`id_accessList`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=4 ;

--
-- Dumping data for table `accesslist`
--

INSERT INTO `accesslist` (`id_accessList`, `controller`, `accessLevel`) VALUES
(1, 'index', 3),
(3, 'actuality', 0);

-- --------------------------------------------------------

--
-- Table structure for table `accesslist_member`
--

CREATE TABLE IF NOT EXISTS `accesslist_member` (
  `id_member` int(11) NOT NULL,
  `id_accessList` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `accesslist_member`
--

INSERT INTO `accesslist_member` (`id_member`, `id_accessList`) VALUES
(68, 2),
(66, 3);

-- --------------------------------------------------------

--
-- Table structure for table `accesslist_roles`
--

CREATE TABLE IF NOT EXISTS `accesslist_roles` (
  `id_roles` int(11) NOT NULL,
  `id_accessList` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `accesslist_roles`
--

INSERT INTO `accesslist_roles` (`id_roles`, `id_accessList`) VALUES
(1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE IF NOT EXISTS `login` (
  `loginId` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `profileId` int(11) NOT NULL,
  `roleId` int(11) NOT NULL,
  PRIMARY KEY (`loginId`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=2 ;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`loginId`, `username`, `password`, `profileId`, `roleId`) VALUES
(1, 'Guest', 'guest', 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE IF NOT EXISTS `roles` (
  `id_roles` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id_roles`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=2 ;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id_roles`, `name`) VALUES
(1, 'Basic User');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
