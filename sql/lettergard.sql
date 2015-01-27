-- phpMyAdmin SQL Dump
-- version 4.1.12
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Erstellungszeit: 27. Jan 2015 um 15:23
-- Server Version: 5.6.16
-- PHP-Version: 5.5.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Datenbank: `lettergard`
--

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `fav`
--

CREATE TABLE IF NOT EXISTS `fav` (
  `favID` int(11) NOT NULL AUTO_INCREMENT,
  `favPost` int(11) NOT NULL,
  `favUser` int(11) NOT NULL,
  PRIMARY KEY (`favID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `follow`
--

CREATE TABLE IF NOT EXISTS `follow` (
  `followID` int(11) NOT NULL AUTO_INCREMENT,
  `followFollow` int(11) NOT NULL,
  `followFollower` int(11) NOT NULL,
  PRIMARY KEY (`followID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `posts`
--

CREATE TABLE IF NOT EXISTS `posts` (
  `postID` int(11) NOT NULL AUTO_INCREMENT,
  `postUser` int(11) NOT NULL,
  `postText` text COLLATE utf8_unicode_ci NOT NULL,
  `postTime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`postID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `reblog`
--

CREATE TABLE IF NOT EXISTS `reblog` (
  `reblogID` int(11) NOT NULL AUTO_INCREMENT,
  `reblogPost` int(11) NOT NULL,
  `reblogUser` int(11) NOT NULL,
  PRIMARY KEY (`reblogID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `settings`
--

CREATE TABLE IF NOT EXISTS `settings` (
  `settingsID` int(11) NOT NULL AUTO_INCREMENT,
  `settingsUser` int(11) NOT NULL,
  `settingsDesign` int(11) NOT NULL,
  `settingsNewsletter` tinyint(1) NOT NULL,
  PRIMARY KEY (`settingsID`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=2 ;

--
-- Daten für Tabelle `settings`
--

INSERT INTO `settings` (`settingsID`, `settingsUser`, `settingsDesign`, `settingsNewsletter`) VALUES
(1, 2, 0, 1);

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
  `userPremium` tinyint(4) NOT NULL,
  `userValidated` tinyint(1) NOT NULL,
  PRIMARY KEY (`userID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Daten für Tabelle `user`
--

INSERT INTO `user` (`userID`, `userName`, `userPassword`, `userMail`, `userRegister`, `userBio`, `userNickname`, `userWebsite`, `userPremium`, `userValidated`) VALUES
(1, 'Admin', 0x7368613235363a313030303a4f706776767a43363359426e686761554b70656254384f673643306c4b6958423a544443474a6234683534437574534c587466393347454f785867792f56506578, 'Admin', '2015-01-23', '', 'Admin', '', 0, 0),
(2, 'Test', 0x7368613235363a313030303a5876366835666c4d562b36502f4f446c374a684e536937316c5234334642626f3a555254454e69624d515536374f63567564334b6d7846354969614c504b504948, 'test', '2015-01-25', '', 'Test', '', 0, 0);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
