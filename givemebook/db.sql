-- phpMyAdmin SQL Dump
-- version 3.5.2.2
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Dec 29, 2012 at 04:44 PM
-- Server version: 5.5.27
-- PHP Version: 5.4.7

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `bookdb`
--
CREATE DATABASE `bookdb` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `bookdb`;

-- --------------------------------------------------------

--
-- Table structure for table `bookpost`
--

CREATE TABLE IF NOT EXISTS `bookpost` (
  `bookid` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `cata` varchar(10) NOT NULL,
  `author` varchar(100) DEFAULT NULL,
  `publisher` varchar(100) DEFAULT NULL,
  `info` text NOT NULL,
  `code` varchar(50) DEFAULT NULL,
  `pic` varchar(150) DEFAULT NULL,
  `useremail` varchar(50) NOT NULL,
  `price` int(4) NOT NULL,
  `datatime` datetime NOT NULL,
  `hidden` int(11) DEFAULT NULL,
  PRIMARY KEY (`bookid`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=35 ;

--
-- Dumping data for table `bookpost`
--

INSERT INTO `bookpost` (`bookid`, `name`, `cata`, `author`, `publisher`, `info`, `code`, `pic`, `useremail`, `price`, `datatime`, `hidden`) VALUES
(1, 'PHP Book', 'com', 'no', 'no', 'The PHP development team announces the immediate availability of PHP 5.4.9 and PHP 5.3.19. These releases fix over 15 bugs. All users of PHP<br\n> are encouraged to upgrade to PHP 5.4.9, or at least 5.3.19.', '0672319241', '067232976.jpg', 'test', 54, '2012-12-05 00:00:00', 0),
(2, 'PHP Book Second', 'Program', 'no', 'no', 'The PHP development team announces the immediate availability of <br> \r\nPHP 5.4.9 and PHP 5.3.19. These releases fix over 15 bugs. All users of PHP<br\r\n> are encouraged to upgrade to PHP 5.4.9, or at least 5.3.19.<br>', '0672319241', '0672319241.jpg', 'admin', 666, '2012-11-30 00:00:00', 0),
(8, 'testbook', 'sci', 'test', 'testes', 'fdsafdsfsdafdsa', '423432', '64352009-08-25 21.46.38.jpg', 'admin', 8, '2012-12-04 07:21:08', 0),
(9, 'testbook', 'sci', 'test', 'testes', 'fdsafdsfsdafdsa', '423432', '', 'admin', 7, '2012-12-04 07:21:08', 0),
(10, 'testbook', '', '', '', '', '', '', 'admin', 9, '2012-12-04 10:20:59', 0),
(11, 'testbook', 'his', '', '', '4312', '', '', 'admin', 76, '2012-12-04 10:41:11', 0),
(12, 'testbook', 'lan', '', '', '25423542', '', '', 'admin', 65, '2012-12-04 10:41:43', 0),
(31, 'testbook', 'eng', 'test', 'test', 'test', '0071508546', '<img src="http://covers.openlibrary.org/b/isbn/0071508546-M.jpg">', 'admin', 43, '2012-12-24 10:04:32', 0),
(32, 'testbook', 'lan', 'test', 'test', 'test', '0596009208', '<img src="http://covers.openlibrary.org/b/isbn/0596009208-M.jpg">', 'admin', 32, '2012-12-24 10:15:08', 0),
(33, 'testbook', 'mus', 'tests', 'teste', 'test', 'test', '56442009-08-25 21.46.38.jpg', 'admin', 21, '2012-12-24 10:15:43', 0),
(34, 'testbook', 'his', 'rwqrewq', 'rewqr', 'rewqrewq', '0071508546', '87882009-08-25 21.46.38.jpg', 'admin', 10, '2012-12-24 10:31:31', 0);

-- --------------------------------------------------------

--
-- Table structure for table `order`
--

CREATE TABLE IF NOT EXISTS `order` (
  `orderid` int(11) NOT NULL AUTO_INCREMENT,
  `bookid` int(11) NOT NULL,
  `order` int(1) NOT NULL,
  `userid` int(11) NOT NULL,
  `post` text NOT NULL,
  `datatime` datetime NOT NULL,
  PRIMARY KEY (`orderid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `userinfo`
--

CREATE TABLE IF NOT EXISTS `userinfo` (
  `userid` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(80) NOT NULL,
  `firstname` varchar(100) NOT NULL,
  `lastname` varchar(100) NOT NULL,
  `password` varchar(20) NOT NULL,
  `logintime` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `block` int(1) DEFAULT NULL,
  PRIMARY KEY (`userid`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=20 ;

--
-- Dumping data for table `userinfo`
--

INSERT INTO `userinfo` (`userid`, `email`, `firstname`, `lastname`, `password`, `logintime`, `block`) VALUES
(1, 'abc@abc.com', '', '', '1234', '2012-11-27 19:17:00', 0),
(2, 'admin', '', '', 'admin', NULL, 0),
(3, 'test@test.com', '', '', '1234', NULL, NULL),
(4, 'test', '', '', 'test', NULL, NULL),
(5, 'new', '', '', 'new', NULL, NULL),
(6, 'test1', '', '', 'test2', NULL, NULL),
(7, '1234', '', '', '1234', NULL, NULL),
(8, '32153', '', '', '51321', NULL, NULL),
(9, '76547', '', '', '76547654', NULL, NULL),
(10, '987986', '', '', '986986', NULL, NULL),
(11, 'test@test.com', '', '', 'test', NULL, NULL),
(12, 'test@test.com', '', '', 'test123', NULL, NULL),
(13, 'kofungki', '', '', '625588143', NULL, NULL),
(14, 'test@test.com', '', '', 'test123', NULL, NULL),
(15, 'abc@abc.com', 'postfname', 'postlname', 'iterc', NULL, NULL),
(16, 'test@test123.com', 'test', 'test', '12345678', '2012-12-28 10:57:56', 0),
(17, 'abc@abcabc.com', 'test8', 'Test8', 'program123', NULL, 0),
(18, 'abc123@test.com', 'Test9', 'Test9', 'program123', NULL, 0),
(19, 'abc123test@test.com', 'Test', 'Test0', 'program123', NULL, 0);
