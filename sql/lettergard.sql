-- phpMyAdmin SQL Dump
-- version 4.0.4.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Erstellungszeit: 21. Jan 2015 um 03:20
-- Server Version: 5.6.11
-- PHP-Version: 5.5.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Datenbank: `lettergard`
--
CREATE DATABASE IF NOT EXISTS `lettergard` DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci;
USE `lettergard`;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `follow`
--

CREATE TABLE IF NOT EXISTS `follow` (
  `followID` int(11) NOT NULL,
  `followerID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `posts`
--

CREATE TABLE IF NOT EXISTS `posts` (
  `postID` int(11) NOT NULL AUTO_INCREMENT,
  `postUser` int(11) NOT NULL,
  `postText` text COLLATE utf8_unicode_ci NOT NULL,
  `postTime` datetime NOT NULL,
  PRIMARY KEY (`postID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `userID` int(11) NOT NULL AUTO_INCREMENT,
  `userName` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `userPassword` blob NOT NULL,
  `userMail` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `userRegister` date NOT NULL,
  `userBio` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `userNickname` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `userWebsite` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `userHome` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `userPremium` tinyint(4) NOT NULL,
  PRIMARY KEY (`userID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
