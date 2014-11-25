-- phpMyAdmin SQL Dump
-- version 2.11.6
-- http://www.phpmyadmin.net
--
-- Host: 208.73.50.141
-- Generation Time: Aug 26, 2008 at 01:55 PM
-- Server version: 5.0.27
-- PHP Version: 5.2.6

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `benfund`
--

-- --------------------------------------------------------

--
-- Table structure for table `account_balance`
--

CREATE TABLE `account_balance` (
  `id` varchar(6) NOT NULL default '',
  `ip` varchar(15) NOT NULL default '',
  `date` timestamp NOT NULL default CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP,
  `ammount` decimal(10,2) NOT NULL default '0.00',
  KEY `id` (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `account_balance`
--

INSERT INTO `account_balance` (`id`, `ip`, `date`, `ammount`) VALUES
('123456', '129.163.10.1', '2006-03-02 21:22:34', '20.00'),
('123456', '264.168.1.1', '2006-03-02 21:23:19', '30.00'),
('907357', '192.168', '2006-03-02 22:07:09', '0.00'),
('907357', '192.168.1.1', '2006-03-02 22:07:50', '40.50'),
('123456', '', '2006-03-09 18:22:09', '500.00'),
('907357', '45', '2006-04-06 03:00:53', '20.00'),
('912548', '', '2006-04-06 21:13:26', '0.00'),
('907357', '', '2006-04-08 06:35:11', '25.00'),
('356008', '', '2006-04-08 06:43:32', '0.00'),
('690762', '', '2006-12-07 18:42:09', '50.00'),
('690762', '', '2006-12-07 18:42:09', '25.00'),
('690762', '', '2006-12-07 18:42:29', '20.00'),
('690762', '', '2006-12-07 18:42:29', '75.00'),
('617428', '', '2006-12-31 01:04:40', '550.00'),
('617428', '', '2006-12-31 01:04:40', '10000.00');

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` varchar(40) NOT NULL default '',
  `password` varchar(40) NOT NULL default '',
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `password`) VALUES
('admin', 'null');

-- --------------------------------------------------------

--
-- Table structure for table `client`
--

CREATE TABLE `client` (
  `id` int(6) NOT NULL auto_increment,
  `cid` int(4) NOT NULL default '0',
  `mid` int(6) NOT NULL default '0',
  `first_name` varchar(24) NOT NULL default '',
  `m_i` char(1) NOT NULL default '',
  `last_name` varchar(24) NOT NULL default '',
  `address` varchar(32) NOT NULL default '',
  `address2` varchar(32) NOT NULL default '',
  `city` varchar(24) NOT NULL default '',
  `state` char(2) NOT NULL default '',
  `zip` varchar(5) NOT NULL default '',
  `phone` varchar(24) NOT NULL default '',
  `alt_phone` varchar(24) NOT NULL default '',
  `email` varchar(32) NOT NULL default '',
  `password` varchar(16) NOT NULL default '',
  `balance` int(8) NOT NULL default '0',
  `activated` int(1) NOT NULL default '0',
  `deleted` int(1) NOT NULL default '0',
  `settings` varchar(64) NOT NULL default '',
  `log` varchar(64) NOT NULL default '',
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=57 ;

--
-- Dumping data for table `client`
--

INSERT INTO `client` (`id`, `cid`, `mid`, `first_name`, `m_i`, `last_name`, `address`, `address2`, `city`, `state`, `zip`, `phone`, `alt_phone`, `email`, `password`, `balance`, `activated`, `deleted`, `settings`, `log`) VALUES
(0, 6174, 617428, 'Jolly Roger', 'L', 'Mcgyy', '1265 Gulag', '1265 Gulag', 'Iraq', 'CA', '99999', '555-555-2222', '555-555-3333', 'it@websweeper.com', '1', 89523, 1, 0, '1~1~inside job~1~1', '1^67.169.233.182^1180988762'),
(42, 4444, 518963, 'Joseph', 'T', 'Higgenbottom', '1234 Sailaway Drive', '', 'Oroville', 'CA', '95966', '530-589-2222', '', 'sales@websweeper.com', '94JpNUA', 4500, 0, 0, '', ''),
(2, 1111, 617428, 'Working Class', 'T', 'Hero', '1265 Gulag', '1265 Gulag', 'Iraq', 'AM', '99999', '555-555-2222', '555-555-3333', 'it@websweeper.com', 'awjlR3X', 20, 0, 0, '1~1~inside job~1~1', '0^67.169.233.182^1176448148'),
(3, 2222, 617428, 'Trent', 'P', 'Reznor', '1265 Gulag', '1265 Gulag', 'Iraq', 'AM', '99999', '555-555-2222', '555-555-3333', 'it@websweeper.com', 'awjlR3X', 515, 0, 0, '1~1~inside job~1~1', '0^67.169.233.182^1176448148'),
(4, 3333, 617428, 'George Bush', 'W', 'Caesar', '1265 Gulag', '1265 Gulag', 'Iraq', 'AM', '99999', '555-555-2222', '555-555-3333', 'it@websweeper.com', 'awjlR3X', 666, 1, 0, '1~1~inside job~1~1', '0^67.169.233.182^1176448148'),
(5, 4444, 617428, 'Ned', 'Y', 'Flanders', '1265 Gulag', '1265 Gulag', 'Iraq', 'AM', '99999', '555-555-2222', '555-555-3333', 'it@websweeper.com', 'awjlR3X', 43643, 0, 0, '1~1~inside job~1~1', '0^67.169.233.182^1176448148'),
(6, 5555, 617428, 'Mcpoop', 'F', 'Burger', '1265 Gulag', '1265 Gulag', 'Iraq', 'AM', '99999', '555-555-2222', '555-555-3333', 'it@websweeper.com', 'awjlR3X', 7337, 1, 0, '1~1~inside job~1~1', '0^67.169.233.182^1176448148'),
(41, 1609, 617428, 'Karl', 'H', 'Marx', 'Workers Unite Pinko!', 'Red Square', 'Trier', 'RU', '99999', '444-444-4444', '', 'it@websweeper.com', 'JaS1bMf', 2500, 0, 0, '', ''),
(43, 4565, 749539, 'Uriel', 'J', 'Ballinas', '123 I''m away', '', 'oroville', 'ca', '95966', '444-555-5555', '', 'it@websweeper.com', '4KVJjK3', 400, 0, 0, '', ''),
(44, 6985, 180419, 'Some', 'd', 'Customer', '1244 Another way', '', 'Oroville', 'ca', '95966', '538-555-5555', '', 'sales@websweeper.com', '8HmhhW4', 344, 0, 0, '', ''),
(45, 7608, 180419, 'Some', 'd', 'Customer', '1244 Another way', '', 'Oroville', 'ca', '95966', '538-555-5555', '', 'sales@websweeper.com', '3UIP1dO', 344, 0, 0, '', ''),
(46, 1001, 180419, 'Uriel', 'J', 'Ballinas', '10718 NE Prescott St', '', 'Portland', 'OR', '97220', '530-354-2829', '', 'it@websweeper.com', 'GFEsF7M', 500, 0, 0, '', ''),
(51, 1400, 970584, 'Mark', '', 'Collins', '266 Canyon Highlands', '', 'Oroville', 'CA', '95966', '530-538-8328', '', 'tim@websweeper.com', '1EcQYTL', 100, 0, 0, '', ''),
(50, 2308, 970584, 'Diane', '', 'Brown', '19 Wahoo', '', 'Oroville', 'CA', '95966', '530-589-2487', '', 'tim@websweeper.com', 'yXZwawe', 100, 0, 0, '', ''),
(52, 6295, 970584, 'Lori', '', 'Davis', '3577', '', 'Oroville', 'CA', '95966', '530-533-4188', '', 'tim@websweeper.com', 'KX9UlQM', 100, 0, 0, '', ''),
(54, 1107, 970584, 'Rod', '', 'Fairlee', '346 Canyon Highlands', '', 'Oroville', 'CA', '95966', '530-533-6731', '', 'tim@websweeper.com', '30QIzh3', 100, 0, 0, '', ''),
(55, 2131, 970584, 'Dean', '', 'Gurr', '17 Adelaid', '', 'Oroville', 'CA', '95966', '530-534-1046', '', 'tim@websweeper.com', 'password', 100, 1, 0, '', '2^67.169.233.182^1198350596');

-- --------------------------------------------------------

--
-- Table structure for table `client_notes`
--

CREATE TABLE `client_notes` (
  `id` int(11) NOT NULL auto_increment,
  `mid` int(6) NOT NULL default '0',
  `cid` int(4) NOT NULL default '0',
  `date` varchar(17) NOT NULL default '',
  `text` varchar(100) NOT NULL default '',
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `client_notes`
--

INSERT INTO `client_notes` (`id`, `mid`, `cid`, `date`, `text`) VALUES
(1, 617428, 6174, '01-02-03-03-04-05', 'This guy is total NWO puppet'),
(2, 617428, 6174, '02-03-04-05-06-07', 'His real name is George W Bush'),
(3, 617428, 6174, '03-04-05-06-07-08', 'This guy is total NWO puppet'),
(4, 617428, 6174, '04-05-06-07-08-09', 'This guy is total NWO puppet'),
(5, 617423, 2222, '01-02-03-03-04-05', 'This guy is total NWO puppet');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` int(11) NOT NULL auto_increment,
  `mid` int(11) NOT NULL default '0',
  `comment_name` varchar(32) NOT NULL default '',
  `comment_title` varchar(32) NOT NULL default '',
  `comment_location` varchar(32) NOT NULL default '',
  `comment_text` mediumtext NOT NULL,
  `comment_amount` varchar(16) NOT NULL default '',
  `comment_time` varchar(32) NOT NULL default '',
  `comment_private` int(1) NOT NULL default '0',
  `approved` tinyint(1) NOT NULL default '0',
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=21 ;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `mid`, `comment_name`, `comment_title`, `comment_location`, `comment_text`, `comment_amount`, `comment_time`, `comment_private`, `approved`) VALUES
(17, 617428, '', '', '', '', '', 'Wednesday, July 11th 2007', 0, 0),
(18, 617428, '', '', '', '', '', 'Wednesday, July 11th 2007', 0, 0),
(16, 617428, '', '', '', '', '', 'Wednesday, July 11th 2007', 0, 0),
(15, 617428, 'Tim Merino', 'Help!', '', 'Help! I must resist Capitalism for the good of my country! Its being taken over by criminal bankers! But I cannot resist its glamorous seduction! Must have Huge Gas guzzling Trucks, Cowboy Hat! Help! The Constitution and our very freedom on which this country fights for is at stake!', '1000', '01-02-03-04-05-06', 0, 0),
(10, 617428, 'Tim Merino', 'Help!', '', 'Help! I must resist Capitalism for the good of my country! Its being taken over by criminal bankers! But I cannot resist its glamorous seduction! Must have Huge Gas guzzling Trucks, Cowboy Hat! Help! The Constitution and our very freedom on which this country fights for is at stake!', '1000', '01-02-03-04-05-06', 0, 1),
(13, 617428, 'Thomas Jefferson', 'We can help', 'New England??', 'The Strongest Reason for the People to Retain Their Right to Keep and Bear Arms is as a Last Resort to Protect Themselves Against Tyranny in Government', '', '02-03-04-05-06-07', 1, 0),
(12, 617428, 'Thomas Jefferson', 'We can help', 'New England??', 'The Strongest Reason for the People to Retain Their Right to Keep and Bear Arms is as a Last Resort to Protect Themselves Against Tyranny in Government', '', '02-03-04-05-06-07', 1, 1),
(19, 617428, '', '', '', '', '', 'Wednesday, July 11th 2007', 0, 0),
(20, 617428, '', '', '', '', '', 'Wednesday, July 11th 2007', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `donations`
--

CREATE TABLE `donations` (
  `id` int(6) NOT NULL auto_increment,
  `did` varchar(32) NOT NULL default '',
  `to_id` varchar(24) NOT NULL default '',
  `from` varchar(32) NOT NULL default '',
  `date` varchar(12) NOT NULL default '0',
  `desc` longtext NOT NULL,
  `total` int(12) NOT NULL default '0',
  `comment` int(6) default NULL,
  `status` int(1) NOT NULL default '0',
  `dispute` int(1) default '0',
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `donations`
--

INSERT INTO `donations` (`id`, `did`, `to_id`, `from`, `date`, `desc`, `total`, `comment`, `status`, `dispute`) VALUES
(3, '3', '617428', '617428', '070301010101', 'item1`this is the item1 description`111.11`1`111.11~item2`this is the item2 description`222.22`2`444.44~item3`this is the item3 description`333.33`3`666.66', 3444, 13, 0, 0),
(8, '8', '617428', '617428', '070515010101', 'item1`this is the item1 description`111.11`1`111.11~item2`this is the item2 description`222.22`2`444.44~item3`this is the item3 description`333.33`3`666.66', 22222, 14, 1, 0),
(1, '1', '617428', '617428', '070201010101', 'item1`this is the item1 description`111.11`1`111.11~item2`this is the item2 description`222.22`2`444.44~item3`this is the item3 description`333.33`3`666.66', 1222, 10, 0, 0),
(7, '7', '617428', '617428', '070501010101', 'item1`this is the item1 description`111.11`1`111.11~item2`this is the item2 description`222.22`2`444.44~item3`this is the item3 description`333.33`3`666.66', 11111, 13, 0, 0),
(4, '4', '617428', '617428', '070315010101', 'item1`this is the item1 description`111.11`1`111.11~item2`this is the item2 description`222.22`2`444.44~item3`this is the item3 description`333.33`3`666.66', 5666, 14, 1, 0),
(2, '2', '617428', '617428', '070215010101', 'item1`this is the item1 description`111.11`1`111.11~item2`this is the item2 description`222.22`2`444.44~item3`this is the item3 description`333.33`3`666.66', 2333, 12, 1, 0),
(6, '6', '617428', '617428', '070415010101', 'item1`this is the item1 description`111.11`1`111.11~item2`this is the item2 description`222.22`2`444.44~item3`this is the item3 description`333.33`3`666.66', 9000, 12, 1, 0),
(5, '5', '617428', '617428', '070401010101', 'item1`this is the item1 description`111.11`1`111.11~item2`this is the item2 description`222.22`2`444.44~item3`this is the item3 description`333.33`3`666.66', 7888, 10, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `invoice`
--

CREATE TABLE `invoice` (
  `id` int(6) NOT NULL auto_increment,
  `inv` int(6) NOT NULL default '0',
  `to_id` int(6) NOT NULL default '0',
  `from_id` int(6) NOT NULL default '0',
  `date` int(12) NOT NULL default '0',
  `desc` varchar(255) NOT NULL default '',
  `total` varchar(12) NOT NULL default '0',
  `shipping` varchar(6) default NULL,
  `tax` varchar(6) default NULL,
  `notes` varchar(255) default NULL,
  `terms` int(2) NOT NULL default '0',
  `status` int(1) NOT NULL default '0',
  `dispute` int(1) default '0',
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=302 ;

--
-- Dumping data for table `invoice`
--

INSERT INTO `invoice` (`id`, `inv`, `to_id`, `from_id`, `date`, `desc`, `total`, `shipping`, `tax`, `notes`, `terms`, `status`, `dispute`) VALUES
(3, 3, 6174, 617428, 2147483647, 'item1`this is the item1 description`111.11`1`111.11~item2`this is the item2 description`222.22`2`444.44~item3`this is the item3 description`333.33`3`666.66', '3444', '5', '7', 'This is a note', 0, 0, 0),
(8, 8, 6174, 617428, 2147483647, 'item1`this is the item1 description`111.11`1`111.11~item2`this is the item2 description`222.22`2`444.44~item3`this is the item3 description`333.33`3`666.66', '22222', '5', '7', 'This is a note', 0, 1, 0),
(1, 1, 6174, 617428, 2147483647, 'item1`this is the item1 description`111.11`1`111.11~item2`this is the item2 description`222.22`2`444.44~item3`this is the item3 description`333.33`3`666.66', '1222', '5', '7', 'This is a note', 0, 0, 0),
(7, 7, 6174, 617428, 2147483647, 'item1`this is the item1 description`111.11`1`111.11~item2`this is the item2 description`222.22`2`444.44~item3`this is the item3 description`333.33`3`666.66', '11111', '5', '7', 'This is a note', 0, 0, 0),
(4, 4, 6174, 617428, 2147483647, 'item1`this is the item1 description`111.11`1`111.11~item2`this is the item2 description`222.22`2`444.44~item3`this is the item3 description`333.33`3`666.66', '5666', '5', '7', 'This is a note', 0, 1, 0),
(2, 2, 6174, 617428, 2147483647, 'item1`this is the item1 description`111.11`1`111.11~item2`this is the item2 description`222.22`2`444.44~item3`this is the item3 description`333.33`3`666.66', '2333', '5', '7', 'This is a note', 0, 1, 0),
(6, 6, 6174, 617428, 2147483647, 'item1`this is the item1 description`111.11`1`111.11~item2`this is the item2 description`222.22`2`444.44~item3`this is the item3 description`333.33`3`666.66', '11111', '5', '7', 'This is a note', 0, 0, 0),
(5, 5, 6174, 617428, 2147483647, 'item1`this is the item1 description`111.11`1`111.11~item2`this is the item2 description`222.22`2`444.44~item3`this is the item3 description`333.33`3`666.66', '7888', '5', '7', 'This is a note', 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `merchant`
--

CREATE TABLE `merchant` (
  `id` varchar(6) NOT NULL default '',
  `m_type` varchar(16) default NULL,
  `name` varchar(30) NOT NULL default '',
  `contact_name` varchar(64) default NULL,
  `address` varchar(30) NOT NULL default '',
  `address2` varchar(30) default NULL,
  `city` varchar(30) NOT NULL default '',
  `state` char(2) NOT NULL default '',
  `zip` varchar(5) NOT NULL default '',
  `phone` varchar(10) NOT NULL default '',
  `alt_phone` varchar(10) NOT NULL default '',
  `email` varchar(50) NOT NULL default '',
  `ssn2` varchar(4) default NULL,
  `tax2` varchar(7) default NULL,
  `password` varchar(40) NOT NULL default '',
  `pin` varchar(40) NOT NULL default '',
  `goal` varchar(16) default NULL,
  `activated` char(1) default NULL,
  `settings` varchar(64) NOT NULL default '',
  `log` varchar(64) NOT NULL default '',
  PRIMARY KEY  (`id`),
  UNIQUE KEY `name` (`name`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `merchant`
--

INSERT INTO `merchant` (`id`, `m_type`, `name`, `contact_name`, `address`, `address2`, `city`, `state`, `zip`, `phone`, `alt_phone`, `email`, `ssn2`, `tax2`, `password`, `pin`, `goal`, `activated`, `settings`, `log`) VALUES
('617428', '2', 'Resistance Fund', 'Uriel Ballinas', '3215 East Gafton', 'West Side Ghetto', 'Compton', 'CA', '95926', '(530) 345', '(530) 354', 'it@websweeper.com', '9999', '', '1', '4444', '10319', '1', '1~4~inside job~~1~1', '1^67.169.233.182^1181846339'),
('749539', '2', 'Test Acct', 'Tim Merino', '4619 Olive hwy', NULL, 'Oro', 'CA', '95966', '555-000-33', '576-888-44', 'tim@websweeper.com', '9888', NULL, 'frog77', '', NULL, '1', '', ''),
('701638', '2', 'Tims Test Acct', 'Tim Merino', '1234 Away we go', NULL, 'Oroville', 'CA', '95966', '530-667-44', '343-657-87', 'tim@websweeper.com', '0998', NULL, 'frog77', '', NULL, '1', '', ''),
('146389', '2', 'Tyranny', 'Benito Mussolinni', 'White House', '1265 Gulag', 'Washington', 'DC', '99999', '999-999-99', '999-999-99', 'it@websweeper.com', '6666', NULL, 'noctum', '', NULL, '1', '', ''),
('767474', '2', 'Account 2', 'Tim Merino', '123 Lincoln St.', NULL, 'Oroville', 'CA', '95966', '530-555-65', '530-878-77', 'tim@websweeper.com', '3434', NULL, 'frog77', '', NULL, '1', '', ''),
('180419', '2', 'Webpeople', 'Some Whun', '123 Far away', NULL, 'Oroville', 'ca', '95966', '530-555-55', '555-555-55', 'tim@websweeper.com', '7676', NULL, 'frog77', '', NULL, '1', '', ''),
('602075', '2', 'Testacct1', 'Tim Merino', '4619 Olive Hwy', NULL, 'Oroville', 'CA', '95966', '530-589-28', '530-321-06', 'tim@websweeper.com', '7777', NULL, 'testacct177', '', NULL, '1', '', '1^67.169.233.182^1196781709'),
('128372', '2', 'Testacct2', 'Tim Merino', '4619 Olive Hwy', NULL, 'Oroville', 'CA', '95966', '555-566-67', '444-342-54', 'tim@websweeper.com', '3232', NULL, 'test02', '', NULL, '1', '', ''),
('973358', '2', 'San Diego Shipper', 'Joe Smith', '1234 Test Street', NULL, 'San Diego', 'CA', '92180', '619-619-12', '123-456-78', 'tim@websweeper.com', '9809', NULL, 'password', '', NULL, '1', '', ''),
('970584', '2', 'Ameri-Brand Pool & Spa', 'Tim Merino', '2014 Lincoln St.', NULL, 'Oroville', 'CA', '95966', '530-534-68', '530-534-45', 'poolstore@websweeper.com', NULL, '1438426', '2014lincoln', '', NULL, '1', '', '1^67.169.233.182^1198187680'),
('180502', '2', 'Jason''s Fund', 'Jason Tester', '3724 Hildale Ave', NULL, 'Oroville', 'CA', '95966', '530-534-67', '530-370-08', 'jason@fidesdesign.com', '0000', NULL, 'jasoon', '', NULL, NULL, '', ''),
('435110', '2', 'Jason''s Fund #2', 'Jason Tester', '3724 Hildale Ave', NULL, 'Oroville', 'CA', '95966', '530-534-67', '530-370-08', 'jason@fidesdesign.com', '0000', NULL, 'jasoon', '', NULL, '1', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `id` int(11) NOT NULL auto_increment,
  `from_mid` int(11) NOT NULL default '0',
  `to_mid` int(11) NOT NULL default '0',
  `subject` varchar(64) NOT NULL default '',
  `content` longtext NOT NULL,
  `date` varchar(24) NOT NULL default '',
  `new` tinyint(1) NOT NULL default '0',
  `reply` tinyint(1) NOT NULL default '0',
  `deleted` tinyint(1) NOT NULL default '0',
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=34 ;

--
-- Dumping data for table `messages`
--

INSERT INTO `messages` (`id`, `from_mid`, `to_mid`, `subject`, `content`, `date`, `new`, `reply`, `deleted`) VALUES
(1, 617428, 617428, 'test message', '<h2>Hey</h2>\r\n<h3>Hey</h3>\r\n<h4>Hey</h4>\r\n<h5>Hey</h5>\r\n<b>Hey</b>\r\n<i>Hey</i>\r\n<u>Hey</u>\r\n<a href="#">Hey</a>\r\n<img src="https://www.benfund.com/images/illuminati.jpg">\r\n<a href="#"><img src="https://www.benfund.com/images/illuminati.jpg"></a>\r\n<table border="1"><tr><td>Hey</td></tr></table>\r\n<div style="border: 1px solid #FF0000">Hey</div>\r\n', '2007-01-05 06:21:06', 1, 2, 0),
(2, 617428, 617428, 'test two', 'olfjwegk', '2007-01-05 06:56:41', 1, 1, 0),
(9, 617428, 617428, 'RE:poop', '<p><strong><font size="7">Das Ist Wurken?</font></strong></p><p>&nbsp;</p><hr /> Replied Message<br /> From: Resistance Fund(617428)<br /> Originally Sent: 2007-01-05 06:21:06<p>&nbsp;</p><div style="border: 1px solid #b5b5b5; background-color: #eaeaea"> <h2>Hey</h2> <h3>Hey</h3> <h4>Hey</h4> <h5>Hey</h5> <strong>Hey</strong> <em>Hey</em> <u>Hey</u> <a href="#">Hey</a> <img src="../images/illuminati.jpg" alt="" /> <a href="#"><img src="../images/illuminati.jpg" alt="" /></a> <table border="1"><tbody><tr><td>Hey</td></tr></tbody></table> <div style="border: 1px solid #ff0000">Hey</div> </div> ', '2007-01-05 06:21:06', 1, 0, 1),
(11, 617428, 617428, 'RE:crapola', '<p><strong><font size="7">Das ist Wurken?</font></strong></p><p>&nbsp;</p><hr /> Replied Message<br /> From: Resistance Fund(617428)<br /> Originally Sent: 2007-01-05 06:21:06<p>&nbsp;</p><div style="border: 1px solid #b5b5b5; background-color: #eaeaea"> <h2>Hey</h2> <h3>Hey</h3> <h4>Hey</h4> <h5>Hey</h5> <strong>Hey</strong> <em>Hey</em> <u>Hey</u> <a href="#">Hey</a> <img src="../images/illuminati.jpg" alt="" /> <a href="#"><img src="../images/illuminati.jpg" alt="" /></a> <table border="1"><tbody><tr><td>Hey</td></tr></tbody></table> <div style="border: 1px solid #ff0000">Hey</div> </div> ', '2007-01-05 06:21:06', 1, 0, 0),
(24, 1, 749539, 'Welcome to BenFund!', 'On behalf of all of us here at BunFund Payment Systems we would like to extend our welcome to you as a new BenFund Owner!<br>If you havent done so already we encourage you to get started quickly by using our BenFund Setup Wizard. It will assist you in completing the initial setup of you BenFund in an quick and easy way.<p>We realize that you a busy individual and with that in mind we would like to offer to take on a virtual tour of all that BenFund has to offer. With our virtual tour you can immeadately become familiar with many of the BenFunds features and services.<p>We have worked hard to ensure that BenFund provides all the features that you need, if you have any questions or comments please do not hesitate to contact us.<p>On Behalf of everyone here at BenFund, we wish you success as we help "Funding your Financial Objectives"! ', '070724191141', 1, 0, 0),
(23, 1, 146389, 'Welcome to BenFund!', 'On behalf of all of us here at BunFund Payment Systems we would like to extend our welcome to you as a new BenFund Owner!<br>If you havent done so already we encourage you to get started quickly by using our BenFund Setup Wizard. It will assist you in completing the initial setup of you BenFund in an quick and easy way.<p>We realize that you a busy individual and with that in mind we would like to offer to take on a virtual tour of all that BenFund has to offer. With our virtual tour you can immeadately become familiar with many of the BenFunds features and services.<p>We have worked hard to ensure that BenFund provides all the features that you need, if you have any questions or comments please do not hesitate to contact us.<p>On Behalf of everyone here at BenFund, we wish you success as we help "Funding your Financial Objectives"! ', '070724172532', 1, 0, 0),
(20, 617428, 617428, 'RE:RE:test two', '<p>&nbsp;</p><p>yup<br /> </p><hr /> Replied Message<br /> From: Resistance Fund(617428)<br /> Originally Sent: 2007-01-17 10:48:25<p>&nbsp;</p><div style="border: 1px solid #b5b5b5; background-color: #eaeaea"> <p>&nbsp;</p><p>Hey does this actually work?</p><hr />Replied Message<br />From: Resistance Fund(617428)<br />Originally Sent: 2007-01-05 06:56:41 <div style="border: 1px solid #b5b5b5; background-color: #eaeaea">olfjwegk</div></div> ', '2007-01-19 14:52:12', 1, 2, 0),
(22, 1, 669091, 'Welcome to BenFund!', 'On behalf of all of us here at BunFund Payment Systems we would like to extend our welcome to you as a new BenFund Owner!<br>If you havent done so already we encourage you to get started quickly by using our BenFund Setup Wizard. It will assist you in completing the initial setup of you BenFund in an quick and easy way.<p>We realize that you a busy individual and with that in mind we would like to offer to take on a virtual tour of all that BenFund has to offer. With our virtual tour you can immeadately become familiar with many of the BenFunds features and services.<p>We have worked hard to ensure that BenFund provides all the features that you need, if you have any questions or comments please do not hesitate to contact us.<p>On Behalf of everyone here at BenFund, we wish you success as we help "Funding your Financial Objectives"! ', '070723233614', 1, 0, 0),
(19, 617428, 617428, 'RE:test two', '<p>&nbsp;</p><p>Hey does this actually work?</p><hr />Replied Message<br />From: Resistance Fund(617428)<br />Originally Sent: 2007-01-05 06:56:41 <div style="background-color: #eaeaea; border: #b5b5b5 1px solid">olfjwegk</div>', '2007-01-17 10:48:25', 1, 1, 0),
(25, 1, 701638, 'Welcome to BenFund!', 'On behalf of all of us here at BunFund Payment Systems we would like to extend our welcome to you as a new BenFund Owner!<br>If you havent done so already we encourage you to get started quickly by using our BenFund Setup Wizard. It will assist you in completing the initial setup of you BenFund in an quick and easy way.<p>We realize that you a busy individual and with that in mind we would like to offer to take on a virtual tour of all that BenFund has to offer. With our virtual tour you can immeadately become familiar with many of the BenFunds features and services.<p>We have worked hard to ensure that BenFund provides all the features that you need, if you have any questions or comments please do not hesitate to contact us.<p>On Behalf of everyone here at BenFund, we wish you success as we help "Funding your Financial Objectives"! ', '070811003056', 1, 0, 0),
(26, 1, 180419, 'Welcome to BenFund!', 'On behalf of all of us here at BunFund Payment Systems we would like to extend our welcome to you as a new BenFund Owner!<br>If you havent done so already we encourage you to get started quickly by using our BenFund Setup Wizard. It will assist you in completing the initial setup of you BenFund in an quick and easy way.<p>We realize that you a busy individual and with that in mind we would like to offer to take on a virtual tour of all that BenFund has to offer. With our virtual tour you can immeadately become familiar with many of the BenFunds features and services.<p>We have worked hard to ensure that BenFund provides all the features that you need, if you have any questions or comments please do not hesitate to contact us.<p>On Behalf of everyone here at BenFund, we wish you success as we help "Funding your Financial Objectives"! ', '070823233005', 1, 0, 0),
(27, 1, 767474, 'Welcome to BenFund!', 'On behalf of all of us here at BunFund Payment Systems we would like to extend our welcome to you as a new BenFund Owner!<br>If you havent done so already we encourage you to get started quickly by using our BenFund Setup Wizard. It will assist you in completing the initial setup of you BenFund in an quick and easy way.<p>We realize that you a busy individual and with that in mind we would like to offer to take on a virtual tour of all that BenFund has to offer. With our virtual tour you can immeadately become familiar with many of the BenFunds features and services.<p>We have worked hard to ensure that BenFund provides all the features that you need, if you have any questions or comments please do not hesitate to contact us.<p>On Behalf of everyone here at BenFund, we wish you success as we help "Funding your Financial Objectives"! ', '070911214940', 1, 0, 0),
(28, 1, 602075, 'Welcome to BenFund!', 'On behalf of all of us here at BunFund Payment Systems we would like to extend our welcome to you as a new BenFund Owner!<br>If you havent done so already we encourage you to get started quickly by using our BenFund Setup Wizard. It will assist you in completing the initial setup of you BenFund in an quick and easy way.<p>We realize that you a busy individual and with that in mind we would like to offer to take on a virtual tour of all that BenFund has to offer. With our virtual tour you can immeadately become familiar with many of the BenFunds features and services.<p>We have worked hard to ensure that BenFund provides all the features that you need, if you have any questions or comments please do not hesitate to contact us.<p>On Behalf of everyone here at BenFund, we wish you success as we help "Funding your Financial Objectives"! ', '071204151939', 1, 0, 0),
(29, 1, 128372, 'Welcome to BenFund!', 'On behalf of all of us here at BunFund Payment Systems we would like to extend our welcome to you as a new BenFund Owner!<br>If you havent done so already we encourage you to get started quickly by using our BenFund Setup Wizard. It will assist you in completing the initial setup of you BenFund in an quick and easy way.<p>We realize that you a busy individual and with that in mind we would like to offer to take on a virtual tour of all that BenFund has to offer. With our virtual tour you can immeadately become familiar with many of the BenFunds features and services.<p>We have worked hard to ensure that BenFund provides all the features that you need, if you have any questions or comments please do not hesitate to contact us.<p>On Behalf of everyone here at BenFund, we wish you success as we help "Funding your Financial Objectives"! ', '071204152955', 1, 0, 0),
(30, 1, 973358, 'Welcome to BenFund!', 'On behalf of all of us here at BunFund Payment Systems we would like to extend our welcome to you as a new BenFund Owner!<br>If you havent done so already we encourage you to get started quickly by using our BenFund Setup Wizard. It will assist you in completing the initial setup of you BenFund in an quick and easy way.<p>We realize that you a busy individual and with that in mind we would like to offer to take on a virtual tour of all that BenFund has to offer. With our virtual tour you can immeadately become familiar with many of the BenFunds features and services.<p>We have worked hard to ensure that BenFund provides all the features that you need, if you have any questions or comments please do not hesitate to contact us.<p>On Behalf of everyone here at BenFund, we wish you success as we help "Funding your Financial Objectives"! ', '071214233111', 1, 0, 0),
(31, 1, 970584, 'Welcome to BenFund!', 'On behalf of all of us here at BunFund Payment Systems we would like to extend our welcome to you as a new BenFund Owner!<br>If you havent done so already we encourage you to get started quickly by using our BenFund Setup Wizard. It will assist you in completing the initial setup of you BenFund in an quick and easy way.<p>We realize that you a busy individual and with that in mind we would like to offer to take on a virtual tour of all that BenFund has to offer. With our virtual tour you can immeadately become familiar with many of the BenFunds features and services.<p>We have worked hard to ensure that BenFund provides all the features that you need, if you have any questions or comments please do not hesitate to contact us.<p>On Behalf of everyone here at BenFund, we wish you success as we help "Funding your Financial Objectives"! ', '071220214950', 1, 0, 0),
(32, 1, 180502, 'Welcome to BenFund!', 'On behalf of all of us here at BunFund Payment Systems we would like to extend our welcome to you as a new BenFund Owner!<br>If you havent done so already we encourage you to get started quickly by using our BenFund Setup Wizard. It will assist you in completing the initial setup of you BenFund in an quick and easy way.<p>We realize that you a busy individual and with that in mind we would like to offer to take on a virtual tour of all that BenFund has to offer. With our virtual tour you can immeadately become familiar with many of the BenFunds features and services.<p>We have worked hard to ensure that BenFund provides all the features that you need, if you have any questions or comments please do not hesitate to contact us.<p>On Behalf of everyone here at BenFund, we wish you success as we help "Funding your Financial Objectives"! ', '080314201311', 1, 0, 0),
(33, 1, 435110, 'Welcome to BenFund!', 'On behalf of all of us here at BunFund Payment Systems we would like to extend our welcome to you as a new BenFund Owner!<br>If you havent done so already we encourage you to get started quickly by using our BenFund Setup Wizard. It will assist you in completing the initial setup of you BenFund in an quick and easy way.<p>We realize that you a busy individual and with that in mind we would like to offer to take on a virtual tour of all that BenFund has to offer. With our virtual tour you can immeadately become familiar with many of the BenFunds features and services.<p>We have worked hard to ensure that BenFund provides all the features that you need, if you have any questions or comments please do not hesitate to contact us.<p>On Behalf of everyone here at BenFund, we wish you success as we help "Funding your Financial Objectives"! ', '080314202926', 1, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `mpages`
--

CREATE TABLE `mpages` (
  `id` mediumint(9) NOT NULL auto_increment,
  `mid` int(11) default NULL,
  `pid` int(11) default NULL,
  `title` varchar(64) NOT NULL default '',
  `content` longtext NOT NULL,
  `date` varchar(17) NOT NULL default '00-00-00-00-00-00',
  KEY `id` (`id`),
  FULLTEXT KEY `content` (`content`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=119 ;

--
-- Dumping data for table `mpages`
--

INSERT INTO `mpages` (`id`, `mid`, `pid`, `title`, `content`, `date`) VALUES
(3, 617428, 3, 'Payment', 'This is your Benfund Payment Page. This content will be above your donation form', '01-02-03-04-05-06'),
(2, 617428, 2, 'About Us', 'This is your Benfund About Us Page. Use this page to describe your objective', '0000-00-00 00'),
(1, 617428, 1, 'Home', 'This is your Benfund Home Page. Make this an introductory page', '0000-00-00 00'),
(86, 146389, 1, 'Home', 'This is your Benfund Home Page. Make this an introductory page', '07/24/07 5:25 pm'),
(87, 146389, 2, 'About Us', 'This is your Benfund About Us Page. Use this page to describe your objective', '07/24/07 5:25 pm'),
(88, 146389, 3, 'Payment', 'This is your Benfund Payment Page. This content will be above your donation form', '07/24/07 5:25 pm'),
(89, 749539, 1, 'Home', 'This is your Benfund Home Page. Make this an introductory page', '07/24/07 7:11 pm'),
(90, 749539, 2, 'About Us', 'This is your Benfund About Us Page. Use this page to describe your objective', '07/24/07 7:11 pm'),
(91, 749539, 3, 'Payment', 'This is your Benfund Payment Page. This content will be above your donation form', '07/24/07 7:11 pm'),
(92, 701638, 1, 'Home', 'This is your Benfund Home Page. Make this an introductory page', '08/11/07 12:30 am'),
(93, 701638, 2, 'About Us', 'This is your Benfund About Us Page. Use this page to describe your objective', '08/11/07 12:30 am'),
(94, 701638, 3, 'Payment', 'This is your Benfund Payment Page. This content will be above your donation form', '08/11/07 12:30 am'),
(95, 180419, 1, 'Home', 'This is your Benfund Home Page. Make this an introductory page', '08/23/07 11:30 pm'),
(96, 180419, 2, 'About Us', 'This is your Benfund About Us Page. Use this page to describe your objective', '08/23/07 11:30 pm'),
(97, 180419, 3, 'Payment', 'This is your Benfund Payment Page. This content will be above your donation form', '08/23/07 11:30 pm'),
(98, 767474, 1, 'Home', 'This is your Benfund Home Page. Make this an introductory page', '09/11/07 9:49 pm'),
(99, 767474, 2, 'About Us', 'This is your Benfund About Us Page. Use this page to describe your objective', '09/11/07 9:49 pm'),
(100, 767474, 3, 'Payment', 'This is your Benfund Payment Page. This content will be above your donation form', '09/11/07 9:49 pm'),
(101, 602075, 1, 'Home', 'This is your Benfund Home Page. Make this an introductory page', '12/04/07 3:19 pm'),
(102, 602075, 2, 'About Us', 'This is your Benfund About Us Page. Use this page to describe your objective', '12/04/07 3:19 pm'),
(103, 602075, 3, 'Payment', 'This is your Benfund Payment Page. This content will be above your donation form', '12/04/07 3:19 pm'),
(104, 128372, 1, 'Home', 'This is your Benfund Home Page. Make this an introductory page', '12/04/07 3:29 pm'),
(105, 128372, 2, 'About Us', 'This is your Benfund About Us Page. Use this page to describe your objective', '12/04/07 3:29 pm'),
(106, 128372, 3, 'Payment', 'This is your Benfund Payment Page. This content will be above your donation form', '12/04/07 3:29 pm'),
(107, 973358, 1, 'Home', 'This is your Benfund Home Page. Make this an introductory page', '12/14/07 11:31 pm'),
(108, 973358, 2, 'About Us', 'This is your Benfund About Us Page. Use this page to describe your objective', '12/14/07 11:31 pm'),
(109, 973358, 3, 'Payment', 'This is your Benfund Payment Page. This content will be above your donation form', '12/14/07 11:31 pm'),
(110, 970584, 1, 'Home', 'This is your Benfund Home Page. Make this an introductory page', '12/20/07 9:49 pm'),
(111, 970584, 2, 'About Us', 'This is your Benfund About Us Page. Use this page to describe your objective', '12/20/07 9:49 pm'),
(112, 970584, 3, 'Payment', 'This is your Benfund Payment Page. This content will be above your donation form', '12/20/07 9:49 pm'),
(113, 180502, 1, 'Home', 'This is your Benfund Home Page. Make this an introductory page', '03/14/08 8:13 pm'),
(114, 180502, 2, 'About Us', 'This is your Benfund About Us Page. Use this page to describe your objective', '03/14/08 8:13 pm'),
(115, 180502, 3, 'Payment', 'This is your Benfund Payment Page. This content will be above your donation form', '03/14/08 8:13 pm'),
(116, 435110, 1, 'Home', 'This is your Benfund Home Page. Make this an introductory page', '03/14/08 8:29 pm'),
(117, 435110, 2, 'About Us', 'This is your Benfund About Us Page. Use this page to describe your objective', '03/14/08 8:29 pm'),
(118, 435110, 3, 'Payment', 'This is your Benfund Payment Page. This content will be above your donation form', '03/14/08 8:29 pm');

-- --------------------------------------------------------

--
-- Table structure for table `mtemplates`
--

CREATE TABLE `mtemplates` (
  `id` int(11) NOT NULL auto_increment,
  `mid` mediumint(9) NOT NULL default '0',
  `title` varchar(32) NOT NULL default '',
  `meta` mediumtext NOT NULL,
  `header` longtext NOT NULL,
  `menu` mediumtext NOT NULL,
  `info` mediumtext NOT NULL,
  `footer` mediumtext NOT NULL,
  `date` datetime NOT NULL default '0000-00-00 00:00:00',
  PRIMARY KEY  (`id`),
  KEY `id` (`id`),
  FULLTEXT KEY `meta` (`meta`,`header`,`menu`,`info`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=36 ;

--
-- Dumping data for table `mtemplates`
--

INSERT INTO `mtemplates` (`id`, `mid`, `title`, `meta`, `header`, `menu`, `info`, `footer`, `date`) VALUES
(7, 617428, 'Resistance Fund', 'still, nobody, know, fool, answer, hill, sun, eyes, world', '<font face="times new roman,times" size="7">		Police State 9/11</font><br />			', 'Resistance Fund', 'Resistance Fund', '		decadent stupid perverts!<br />			', '0000-00-00 00:00:00'),
(8, 624514, 'Jason''s Fund', 'Jason''s Fund', 'Jason''s Fund', 'Jason''s Fund', 'Jason''s Fund', 'Jason''s Fund', '0000-00-00 00:00:00'),
(25, 146389, 'Tyranny', 'Tyranny', 'Tyranny', 'Tyranny', 'Tyranny', 'Tyranny', '0000-00-00 00:00:00'),
(26, 749539, 'Test Acct', 'Test Acct', 'Test Acct', 'Test Acct', 'Test Acct', 'Test Acct', '0000-00-00 00:00:00'),
(27, 701638, 'Tims Test Acct', 'Tims Test Acct', 'Tims Test Acct', 'Tims Test Acct', 'Tims Test Acct', 'Tims Test Acct', '0000-00-00 00:00:00'),
(28, 180419, 'Webpeople', 'Webpeople', 'Webpeople', 'Webpeople', 'Webpeople', 'Webpeople', '0000-00-00 00:00:00'),
(29, 767474, 'Account 2', 'Account 2', 'Account 2', 'Account 2', 'Account 2', 'Account 2', '0000-00-00 00:00:00'),
(30, 602075, 'Testacct1', 'Testacct1', 'Testacct1', 'Testacct1', 'Testacct1', 'Testacct1', '0000-00-00 00:00:00'),
(31, 128372, 'Testacct2', 'Testacct2', 'Testacct2', 'Testacct2', 'Testacct2', 'Testacct2', '0000-00-00 00:00:00'),
(32, 973358, 'San Diego Shipper', 'San Diego Shipper', 'San Diego Shipper', 'San Diego Shipper', 'San Diego Shipper', 'San Diego Shipper', '0000-00-00 00:00:00'),
(33, 970584, 'Ameri-Brand Pool & Spa', 'Ameri-Brand Pool & Spa', 'Ameri-Brand Pool & Spa', 'Ameri-Brand Pool & Spa', 'Ameri-Brand Pool & Spa', 'Ameri-Brand Pool & Spa', '0000-00-00 00:00:00'),
(34, 180502, 'Jason''s Fund', 'Jason''s Fund', 'Jason''s Fund', 'Jason''s Fund', 'Jason''s Fund', 'Jason''s Fund', '0000-00-00 00:00:00'),
(35, 435110, 'Jason''s Fund #2', 'Jason''s Fund #2', 'Jason''s Fund #2', 'Jason''s Fund #2', 'Jason''s Fund #2', 'Jason''s Fund #2', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `pages`
--

CREATE TABLE `pages` (
  `pid` int(11) NOT NULL auto_increment,
  `title` varchar(64) NOT NULL default '',
  `content` longtext NOT NULL,
  `author` varchar(60) default NULL,
  `date` varchar(42) NOT NULL default '',
  `access` varchar(60) default NULL,
  KEY `id` (`pid`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `pages`
--

INSERT INTO `pages` (`pid`, `title`, `content`, `author`, `date`, `access`) VALUES
(1, 'User Agreement and Privacy Policy', '<font size="5">BenFund™  User agreement and privacy policy 1</font></p> <p>This Agreement was last modified on December 15, 2006.<br> </p> <p>FOLLOWING IS A DESCRIPTION OF THE TERMS ON WHICH BenFund™  OFFERS YOU ACCESS TO OUR PROGRAMS &amp; SERVICES. </p> <p>This User Agreement ("Agreement") is a contract between you and BenFund™ , Inc. and applies to your use of the BenFund™ payment service and any related products and services available through www.BenFund.com (collectively the "Service"). If you do not agree to be bound by the terms and conditions of this Agreement, please do not use or access our Services. </p> <p>You must read, agree with, and signify acceptance of all of the terms and conditions contained in this Agreement and the Privacy Policy, which include specific terms and conditions expressly set out below and others that are incorporated by reference, prior to becoming a member of BenFund™ . We strongly recommend that, while reading this Agreement, you also click-thru to and read the information contained in the other pages and websites we refer to in this document, as they may provide other pertinent information relating to other terms and conditions that would apply to you as a BenFund™ user. Please note: underlined words and phrases typically are links to such pages and websites. By accepting this Agreement, you also agree that your use of other BenFund™ websites, products, &amp; and Services will be governed by the terms and conditions posted on those websites. </p> <p>For additional information about the Service and how it works, please also consult the BenFund™ "HOW IT WORKS" area of our website.</p> <p>BenFund™ may amend this Agreement at any time by posting the amended terms on our site. Except as stated below, all amended terms shall be effective 30 days after they are initially posted on our site on the Policy Updates page, accessable after log-in. Also, if you would like to receive email alerts regarding any policy changes and updates. Inaddition, you may review the current Agreement prior to initiating a transaction at any time at our User Agreement page. </p> <p>In this Agreement, "you" or "your" means any person or entity using the Service ("Users"). Unless otherwise stated, "BenFund™", "we" or "our" will refer collectively to BenFund™ and its related companies. Unless otherwise specified, all references to a "bank" in this Agreement include banks, savings associations, credit unions and other commonly recognized financial institutions, and all references to a "credit card" include Visa and MasterCar branded debit cards. </p> <p>&nbsp;</p> <p>Eligibility. In order to start a BenFund™ for the purpose of collecting funds, you must register for an Organization or Personal Fundraising Account, Merchant Layaway Account, or an Accounts Receivable Account for merchants or organizations. Individual users are limited to one "Personal Account" at a time. Businesses may have both a Master "LayAway Account" and a Master "Accounts Receivable Account" concurrently. Organizations may have up to 3 Fundraising Accounts, and a Master "Accounts Receivable Account" concurrently. Our Services are only available to individuals or businesses that can form legally binding contracts under applicable law. Without limiting the aforestated, our Service is not available to minors (under 18), persons who are suspended from our Service, or to persons (who at our sole discretion) present an unacceptable level of risk to our companies or systems . <br> </p> <p>The Legal Relationship between You and BenFund™.<br> </p> <p> BenFund™ acts as a medium to help you accept payments from third parties. On your behalf, we act as your agent based upon your directions and your requests to use our Systems. BenFund™ will at all times hold your funds separate from its corporate funds, will not use your funds for its operating expenses or any other corporate purposes. We will not voluntarily make funds available to our creditors in the event of bankruptcy or for any other purpose. You understand and agree that BenFund™ is not a bank and our Service is a payment processing service rather than a banking service. In addition, BenFund™ is not acting as a trustee, fiduciary, or escrow with respect to your funds, but is acting only as an agent and custodian.</p> <p>There is no minimum balance requirement for BenFund™ accounts. All transactions and balances are computed and stated in U.S. Dollars. In order to help offset the ongoing expenses we incur in association with maintenance and improvements to the BenFund™ Systems, we may pool your funds together with funds from other Users, and place those funds in accounts at one or more FDIC-insured banks ("aggregated funds") and may be eligible for FDIC pass-through insurance. </p> <p>You agree that you will not receive interest, dividends, or any other earnings on the "aggregated funds" that BenFund™ handles as your agent and places in the aforementioned Accounts. In consideration for your use of the BenFund™ service, you irrevocably transfer and assign to BenFund™ any ownership right that you may have in any interest, dividends, or other type of renumeration that may accrue on funds held in "aggregated funds" accounts. This assignment applies only to any interest, dividends, or other type of renumeration earned on your funds, and nothing herein grants BenFund™ any ownership right to the funds you maintain in the BenFund™ system. </p> <p>By initiating a BenFund™ account, or accepting or requesting to transfer payments through the Service or adding funds to your balance, you appoint BenFund™ as your agent to obtain the funds on your behalf and transfer the funds to an "aggregated funds" account until you further instruct BenFund™ with respect to transfer of your funds..</p> <p>Through the BenFund™ website, you may provide instructions to withdraw the funds subject to the terms and restrictions of this Agreement. </p> <p>BenFund™ is only a Payment Service Provider. BenFund™ acts as a payment service provider by creating, hosting, maintaining and providing our Service to you via the Internet. </p> <p>Identity Authentication. We use many techniques to identify our users when they register a BenFund™ Account on our site. Verification of Users is only an indication of increased likelihood that a User''s identity is correct. You authorize BenFund™, directly or through third parties, to make any inquiries we consider necessary to validate your BenFund™ Account registration. This may include ordering a credit report and performing other credit checks or verifying the information you provide against third party databases and the use of other proprietary methods. Due to the fact that user verification on the Internet is difficult, BenFund™ cannot and does not guarantee any user''s identity. </p> <p>Release. In the event that you should have a dispute with another user of BenFund™ (in any capacity) you release BenFund™ (and our officers, directors, agents, subsidiaries, joint ventures and employees) from any and all claims, demands and damages (actual and consequential) of every kind and nature arising out of or in any way connected with such disputes. If you are a California resident, you waive California Civil Code §1542, which says: "A general release does not extend to claims which the creditor does not know or suspect to exist in his favor at the time of executing the release, which if not known by him must have materially affected his settlement with the debtor." </p> <p>No Warranty IMPLIED or EXPRESSED. WE, OUR OWNERS, SUBSIDIARIES, EMPLOYEES AND OUR SUPPLIERS PROVIDE OUR SERVICES "AS IS" AND WITHOUT ANY WARRANTY OR CONDITION, EXPRESS, IMPLIED OR STATUTORY. WE, OUR OWNERS, SUBSIDIARIES, EMPLOYEES AND OUR SUPPLIERS SPECIFICALLY DISCLAIM ANY IMPLIED WARRANTIES OF TITLE, MERCHANTABILITY, FITNESS FOR A PARTICULAR PURPOSE AND NON-INFRINGEMENT. BenFund™ shall make reasonable efforts to ensure that requests for electronic debits and credits involving bank accounts, credit cards, and check issuances are processed in a timely manner. We make no representations or warranties regarding the amount of time needed to complete processing because our Service is largely dependant upon many factors outside of our scope of control. Such delays may include (but are not limited to) delays in the banking system or the U.S. mail or other package or parcel service. Some states do not allow the disclaimer of implied warranties, so the foregoing disclaimer may not apply to you. This warranty gives you specific legal rights and you may also have other legal rights that vary from state to state. </p> <p>Limitation of Liability. IN NO EVENT SHALL WE, OUR OWNERS, SUBSIDIARIES, EMPLOYEES OR OUR SUPPLIERS BE LIABLE FOR LOST PROFITS OR ANY SPECIAL, INCIDENTAL OR CONSEQUENTIAL DAMAGES ARISING OUT OF OR IN CONNECTION WITH OUR WEB SITE, OUR SERVICE, OR THIS AGREEMENT (HOWEVER ARISING, INCLUDING NEGLIGENCE). Some states do not allow the exclusion or limitation of incidental or consequential damages so the above limitation or exclusion may not apply to you. </p> <p>OUR LIABILITY, AND THE LIABILITY OF OUR OWNERS, SUBSIDIARIES, EMPLOYEES AND SUPPLIERS, TO YOU OR ANY THIRD PARTIES IN ANY CIRCUMSTANCE IS SPECIFICALLY LIMITED TO THE ACTUAL AMOUNT OF DIRECT DAMAGES. </p> <p>Indemnification. You agree to indemnify and hold BenFund™, its owners, subsidiaries, affiliates, officers, directors and employees harmless from any claim or demand (including attorneys'' fees) made or incurred by any third party due to or arising out of your breach of this Agreement or the documents it incorporates by reference, or your violation of any law or the rights of a third party relating to your use of the Service. </p> <p>Liability for Violations of the Acceptable Use Policy. If you engage in the following behavior, BenFund™ may fine you, as explained below. <br> </p> <p>Using the BenFund™  service to:<br> </p> <p>Receive payments for any sexually oriented or obscene materials, or services.<br> </p> <p>Receive payments for any narcotics, other controlled substances, steroids, drugs and devices (non-prescription and prescription), or drug paraphernalia.</p> <p> <br>   Receive payments for wagers, gambling debts or gambling winnings, regardless of the type or location of gambling activity. <br> </p> <p>You and BenFund™ agree that the damages that BenFund™ will sustain as a result of the behavior outlined above would be substantial, including (without limitation) fines and other related expenses from its affiliates, payment processors, and service providers, but the full extent would be extremely difficult and impracticable to determine. In the event that you engage in such activities, then BenFund™ may fine you $2500.00 USD and/or BenFund™ may take legal action against you to recover losses that are in excess of the amount fined. You acknowledge and agree that $2500.00 USD is presently a reasonable minimum estimate of BenFund’s™ damages, taking into consideration all currently existing circumstances. These circumstances include (without limitation) the relationship of the sum amount to the range of harm to BenFund™. that reasonably could be anticipated and the anticipation that proof of actual damages may be impractical or extremely difficult. You agree that BenFund™ is entitled to deduct such fines directly from any existing balance in the offending account, or any other BenFund™ account owned by you. </p> <p>If you use the BenFund™ service in a manner that violates the Acceptable Use Policy, including but not limited to the three categories described above, your account will be subject to limitation or immediate termination, as stated in the !!!!! Closing Accounts and Limiting Account Access Policy.</p> <p>You further understand and agree that, if you use the BenFund™ service in a manner that violates the Acceptable Policy, BenFund™ could incur substantial liability and/or suffer significant damages, including (without limitation) various fines and other potential related expenses from its affiliates, payment processors, and service providers. By accepting payments that violate our Acceptable Use Policy, you acknowledge liability to BenFund™ for any and all damages suffered by BenFund™. Without limiting the foregoing, you agree to reimburse BenFund™ for any and all costs, expenses, and fines levied on BenFund™ by its affiliates, payment processors, and/or service providers as a result of your activities. </p> <p>You agree that, if either you or BenFund™ commence litigation or arbitration in connection with this paragraph, the prevailing party is entitled to recover reasonable attorneys’ fees and any other costs incurred in such proceeding in addition to any other relief to which the prevailing party may be entitled.<br> </p> <p>Fees. All fees are set forth in the published Fee Schedule. All fees are assessed in U.S. Dollars. the payment. Additional information about BenFund™''s fees is available in the Fees Policy. Your account and all transactions are made and displayed in U.S. dollars.</p> <p>&nbsp;</p> <p>Receiving Payments.<br> </p> <p>Credit Card Funded Payments. By accepting a credit card payment, you agree that you are responsible for the payment if it is reversed. If such reversal occurs on a credit card funded payment made to your account, we will reverse the payment and debit your BenFund™ account balance to pay for the reversal. If there are insufficient funds in your BenFund™ balance, you agree to reimburse BenFund™ through other means, as described in the Payments (Receiving and Withdrawing) Policy.!!!!!</p> <p>Online Check Payments. By accepting an online check payment, you agree that you are responsible for the payment if it is rejected for payment for any reason. If such an event occurs on an online check payment to your account, we will reverse the payment and debit your BenFund™ account balance to pay for the reversal and any related fees for such an occurrence. If there are insufficient funds in your BenFund™ balance, you agree to reimburse BenFund™ through other means, as described in the Payments (Receiving and Withdrawing) Policy.!!!!!</p> <p>Withdrawals.</p> <p>Verified Fund availability:</p> <p>In order to withdraw money from your BenFund™ account we may require you to provide BenFund™ with a number of forms of identification. We require this information to authenticate your identity and to determine how much you may withdraw from your account. We may limit withdrawals and require additional information from you depending upon the type of account you have, how the funds were processed (credit card, online check, etc.), allowance for adequate time for clearing of funds, among other factors. </p> <p>Generally, we require you to complete some authentication procedures, such as confirming: your email address, your bank account, and your social security number or Tax ID number. You may request to withdraw funds directly by logging into your the BenFund™ account. Funds derived from Credit card transactions are available for withdrawal on the 7th business day following the online donation or payment. This allows adequate time for transactions to clear our security systems and be VERIFIED. Funds derived from personal checks or company checks will be available for withdrawal 10 business days after<br>   they were deposited in our bank. This allows adequate time for transactions to clear our security systems and be VERIFIED.<br> </p> <p>Currently, all VERIFIED fund withdrawals are sent via USPS first class mail on the next business day following your request. Should you desire to receive your VERIFIED funds via FedX, there will be a $28.00 processing fee which covers the FedeX charges and a small processing fee. <br> </p> <p>How to request your funds:<br> </p> <p>Log on to your BenFund™ Account as the administrator. (Note: Benfunds can only be sent to the payee delegated during the original signup.)</p> <p>Click on the withdrawal tab and you''ll see a screen that shows the total funds collected (minus the fees charged by BenFund™).</p> <p>The screen will show the following information:</p> <p>Breakdown of funds donated by various methods. IE: credit card and check donations</p> <p>A "currently available" amount for each of these.</p> <p>Total Currently available amount that can be requested at that time.</p> <p>Field showing the next available withdrawal date.</p> <p>You may withdraw all or any part of the currently available VERIFIED funds in your BenFund account.</p> <p>NOTE: Each BenFund account is restricted to the withdrawal of available VERIFIED funds no more than once every 6 business days.</p> <p>^^^^^^NOTE to Programmer: The last thing we need to get before sending the funds is a secondary security password that we<br>   collected during the initial signup and a current phone # to contact.</p><hr><p>&nbsp;</p> <p>Acceptable Use Policy</p> <p>BenFund™ Account users actions in conjunction with the use of a BenFund™ Account shall not or attempt to:<br> </p> <p>(a) be misleading, false, or inaccurate;</p> <p>(b) be fraudulent or involve the sale of stolen or counterfeit items;</p> <p>(c) consist of providing a cash advance yourself from your credit card (or helping any others person(s) to do so),</p> <p>(d) be related in any way to gaming activities/gambling and, including but not limited to the acceptance of payments for gambling debts, wagers or gambling winnings, regardless of the type of gambling or the location of the gambling activity (including offline and online casinos, office pools and sports wagering,etc );</p> <p>(e) infringe on any third party''s patent, trademark, copyright, trade secret or other intellectual or physical property rights.</p> <p>(f) violate any law, statute, ordinance, contract or regulation (including, but not limited to, those governing financial services, consumer protection, deceptive practices, antidiscrimination, unfair competition, or advertising of a false misleading nature);</p> <p>(g) be derogatory, illegal, defamatory, trade libelous, unlawfully threatening or harassing;</p> <p>(h) be obscene or contain any type of pornography;</p> <p>(i) contain any Trojan horses, worms, viruses, or any other computer programming routines that may damage, or in any way interfere with, surreptitiously intercept or extract any system, data or other personal information; or</p> <p>(j) create any liability for us or cause us to lose (in whole or in part) the services of any of our suppliers. If you use, or attempt to use the Service for any purpose other than receiving payments and managing your account, your account will be terminated, fines may be assessed, and you will be subject to repayment for any other applicable damages and other penalties, including criminal prosecution where available. </p> <p>&nbsp;</p> <p>&nbsp;</p> <p>Trademarks And use of Logos.</p> <p>BenFund™, BenFund.com™, BenFund.net™ , and all other related logos, products and services described in this website are either trademarks or registered trademarks of BenFund™, or its affiliates and unless otherwise specified below, may not be copied, imitated or used, in whole or in part, without the prior written permission of BenFund™. </p> <p>We own intellectual property rights to the contents of our websites and its design, structure, and compilation (sometimes known as "look and feel"). It is very easy to copy things in cyberspace, but not necessarily always acceptable or legal. You must have the legal right to any content you upload or download from our websites as described below. <br> </p> <p>All page headers, page footers, navigational structures, button icons, custom graphics, and scripts are the service marks, trademarks, and/or recognized trade "branding" of BenFund™ and may not be copied, imitated, or used, in whole or in part, without the prior written permission of BenFund™. </p> <p>Notwithstanding the above, logos and other various navigational buttons provided by BenFund™ through its Website ("logos"), may be used without prior written consent for the purpose of directing web traffic to the Service. These Logos may not be altered, modified, or changed in any way. These logos are not to be used in a manner that is disparaging to BenFund™ or the Service. Logos may not be displayed in any manner that implies sponsorship or endorsement by BenFund™. <br> </p> <p>&nbsp;</p> <p>&nbsp;</p> <p>Access to the Service<br> </p> <p>You agree that you will not use any device, software or routine (manual or automated) to interfere or attempt to interfere with the proper working of the BenFund™ site. You agree that you will not take any action that imposes an unreasonable or disproportionately large load on our infrastructure. Much of the information on our site is proprietary or is licensed to BenFund™ by our affiliates. You agree that you will not copy, reproduce, alter, modify, create derivative works, publicly display or frame any content (except for Your Information) from our web site without the prior expressed written permission of BenFund™. If you use, or attempt to use the Service for purposes other than receiving payments and managing your account, including but not limited to tampering, hacking, modifying or otherwise corrupting the security or functionality of Service, your account will be terminated and you will be subject to damages and other penalties, including criminal prosecution where available. <br> </p> <p>Privacy and Security. We do not sell or rent your personal information to third parties for marketing purposes without your consent and we only use Your Information as described in the Privacy Policy. We view protection of users'' privacy as a very important principle. We understand clearly that you and Your Information are one of our most important assets. We store and process Your Information on computers located in the United States that are protected by physical as well as technological security devices. You should only log in to your BenFund™ account on a page which begins with:</p> <p>https://www.benfund.com/<br> All of our pages begin with https://www.benfund.com/ and therefore you should not use any other site that does not begin as such.</p> <p>We use third parties to verify and certify our privacy policies. Our current Privacy Policy is available at https://www.benfund.com/ !!!!!. If you object to your information being used in this way, please do not use our Services. </p> <p>&nbsp;</p> <p>Accuracy of Information:<br> </p> <p>"Your Information" is defined as any information you provide to us or other users in the registration and payment process. You are solely responsible for Your Information, as we act as a passive medium for your online distribution and publication of Your Information. </p> <p>&nbsp;</p> <p>Termination or Closing Your Account.<br> </p> <p> Closing your account is accomplished by clicking the "Close Account" link in your Profile on the BenFund™ website. This can be done at any time. At the time of account closure, any funds that we are holding in custody for you at the time of closure, less any applicable fees, will be paid to you by check, assuming all withdrawal related fund availability requirements have been met. Closure of your account cannot be used as a means of evading investigation if an account investigation is pending. To help in the elimination of potential fraud or potential losses, BenFund™ may continue to hold your funds for up to 180 days as appropriate to protect BenFund™ against the risk of reversals. If you are later determined to be entitled to some or all of the funds in dispute, BenFund™ will release those funds to you. In any event, You will remain liable for all obligations related to your account even after account closure. If you do not access your account for a period of three years, it will be terminated. After the date of termination, we will use the information you provided to try to send you any funds that we are holding in custody for you. If that information is not correct, and we are unable to complete the payment to you, your funds will be subject to applicable state laws regarding escheat of unclaimed property. <br> </p> <p>&nbsp;</p> <p>Collecting what is Due</p> <p>In addition to other forms of redress, we may update inaccurate or incorrect information you have provide to us, contact you by various other means of communication, immediately warn other BenFund™ users and our affiliates of your actions, place a hold on any or all of the funds in your account, limit the collection of payments, limit access to an account and any or all of the account''s functions, limit withdrawals, indefinitely suspend or close your account and refuse to provide our Services to you if: </p> <p>(a) you breach any part of this Agreement or any of the documents incorporated into it by reference;</p> <p>(b) we are unable to authenticate or verify any of the information you provide to us;</p> <p>(c) we believe that your account or activities pose any type of risk to BenFund™ or its Account holders;</p> <p>(d) we believe that your actions might cause financial loss or legal liability for BenFund™, our users or you; or </p> <p>(e) your use of your BenFund™ account is deemed by BenFund™, its affiliates, suppliers, Visa, MasterCard, American Express or Discover to constitute abuse of the credit card system or a violation of credit card rules and regulations, including (without limitation), using the BenFund™ system to test credit card validity. Although a payment transaction may have been recorded as completed in your BenFund™ account, transactions are not considered completed until the funds have been charged to the payees''s funding source. In addition, BenFund™ reserves the right to hold appropriate funds beyond the posted distribution schedule for transactions it deems suspicious. These may include accounts that are conducting high transaction volumes. We do this to ensure the integrity of the funds. Should we close your account, we will provide you with appropriate notice and pay you all of the unrestricted funds held in your BenFund™ account. Additionally, to secure and ensure your performance of this Agreement, you grant to BenFund™ a lien on and security interest in your account. Also, you acknowledge that BenFund™ may setoff against any BenFund™ accounts you own for any negative balance in your other BenFund™ accounts, at any time and for any reason allowed by law. <br> </p> <p>Assignment of Account:</p> <p>This Agreement prohibits the transfer or assignment of any rights or obligations you may have under this Agreement without the prior written consent of BenFund™. BenFund™ reserves the right to transfer this Agreement or any right or obligation under this Agreement without your consent. <br> </p> <p>Legal Compliance:</p> <p>You shall comply with all applicable U.S. and international laws, statutes, ordinances, regulations, contracts and applicable licenses regarding your use of BenFund™ Services. <br> </p> <p>NOTICES:<br> </p> <p>Electronic Communications.</p> <p> You agree that this Agreement constitutes "a writing signed by You" under any applicable law or regulation. To the fullest extent permitted by applicable law, this Agreement and any other agreements, notices or other communications regarding your BenFund™ account and/or your use of the Service ("Communications"), may be provided to you electronically and you agree to receive all Communications from BenFund™ in electronic form. Electronic Communications may be posted on the pages within the BenFund™ website and/or delivered to your e-mail address. You may print a copy of any Communications from BenFund™ and retain it for your records. All Communications in either electronic or paper format will be considered to be in "writing," and to have been received no later than five (5) business days after posting or dissemination, whether or not you have received or retrieved the Communication. BenFund™ reserves the right but assumes no obligation to provide Communications in paper format or other means of communications. </p> <p>&nbsp;</p> <p> Credit Report.</p> <p> You agree that BenFund™ may order and review your credit report with the sole purpose of assessing your fitness to hold a BenFund™ account and/or your ability to use the Service or features incorporated therein. <br> </p> <p>Procedure.</p> <p> Except as explicitly stated otherwise on this website, any notices in regards to Accounts shall be given by postal mail to:</p> <p>BenFund<br>   Attn: Legal Department<br>   4619 Olive Hwy,<br>   Oroville, CA 95966</p> <p>&nbsp;</p> <p>Legal Disputes.<br> </p> <p> Should a dispute arises between you and BenFund™, our goal is to provide you and us with a reasonable, neutral, and cost effective means of resolving the dispute quickly. Accordingly, you and BenFund™ agree that any controversy or claim(s) at law or equity that arises out of this Agreement or BenFund''s™ services ("Claims") shall be resolved in accordance with one of the methods described below, or as otherwise mutually agreed upon in writing by the parties. Prior to any litigation, BenFund™ strongly encourages users to first to contact BenFund™ directly to seek a resolution. BenFund™ will consider reasonable requests to resolve the dispute through alternative dispute resolution procedures, such as mediation, as an alternative.</p> <p>Arbitration.</p> <p> For any Claim (excluding Claims for injunctive or other equitable relief) where the total amount of the award requested is less than $10,000.00 USD, you or BenFund™ may elect to resolve the dispute through the process of binding arbitration. This can be conducted by telephone, on-line, and/or based solely upon written submissions where no in-person appearance is required. In these cases, the arbitration shall be administered by the American Arbitration Association or JAMS, in accordance with their applicable rules, or any other established ADR provider mutually agreed upon by the parties. Any judgment on the award rendered by the arbitrator may be entered in any court having jurisdiction thereof. </p> <p>Court.</p> <p>Alternatively, any Claim may be adjudicated by a court of competent jurisdiction located in Butte County, California. By using our Service, you agree with BenFund™ to agree to submit to the personal jurisdiction of the courts located within the county of Butte, California. </p> <p>&nbsp;</p> <p>General.</p> <p> This Agreement is governed by and interpreted under the laws of the state of California, U.S. as such laws are applied to agreements entered into and to be performed entirely within California by California residents and businesses. That being mentioned, the Federal Arbitration Act ("FAA"), and all of its rules and procedures, shall govern to the extent that the FAA is inconsistent with California law. We do not guarantee uninterrupted, continous or secure access to our service. The operation of our site may be interfered with or impeded by various circumstances that are outside of our control. Should any provision of this Agreement be declared invalid or unenforceable, such provision shall be struck and all the remaining provisions shall be enforced. You agree that this Agreement and any incorporated documents referenced herein, may be automatically assigned by BenFund™, in our sole discretion, to a third party in the event of a merger or acquisition. The headings shown above each subject are for reference purposes only and in no way define, limit, construe or describe the scope or extent of such sections. Our failure to act with respect to any breach of this agreement by you or others does not waive our right(s) to act with respect to subsequent or similar breaches. This Agreement and the documents it incorporates set forth the entire and complete understanding between us with respect to the subject matter hereof. The sections relating to Fees, Access, Limitation of Liability, Indemnity, and Legal Disputes shall survive any termination or expiration of this Agreement. <br> </p> <p>Disclosures. </p> <p>BenFund™ Services are offered by BenFund™, located at 4619 Olive Hwy. Oroville, CA 95966. If you are a California resident, you may have this same information emailed directly to you by sending a letter to the address above. Please provide your email address along with your request for this information. Fees for our services are described in our Fees Policy. </p> <p>Disputes between you and BenFund™ regarding our Services may be reported to Customer Support online through the BenFund™ Help Center at any time, or by calling (530) 589-2887 from 9 AM to 4 PM Pacific Standard Time. Additionally, you may report complaints to the Complaint Assistance Unit of the Division of Consumer Services of the Department of Consumer Affairs by contacting them in writing at 400 R Street, Sacramento, California 95814, or by telephone at (800) 952-5210. Florida residents may report any disputes with BenFund™ to the BenFund™ Help Center, or you may wish to contact the Florida Department of Financial Services in writing at 200 East Gaines Street, Tallahassee, Florida, 32399, or by telephone at 1-800-342-2762. <br>     <br> </p> <p>&nbsp;</p> <p>&nbsp;</p> <p>&nbsp;</p> <p>&nbsp;</p> <hr><p><br>   Privacy policy Page:</p> <p> Overview</p> <p>In order to maintain and operate the BenFund™ service and to reduce the risk of fraud, BenFund™ ("BenFund™ " or "we") must ask you to provide us information about yourself and your bank account. This Privacy Policy describes the scope of the information we collect and how we use that information. </p> <p>We take the privacy of your personal information very seriously and will use your information only in accordance with the terms of this Privacy Policy. BenFund™ will not sell or rent your personally identifiable information or a list of our customers to any third parties. !!!!!However, as described in more detail in Part C below, there are limited circumstances in which some of your information will be shared with third parties, under strict restrictions, so it is important for you to review this Privacy Policy. This Privacy Policy applies to all services that are hosted on the BenFund.com™ Web site. </p> <p>By accepting this Privacy Policy and User Agreement during registration, you express absolute agreement with our policies and consent to our use and disclosure of your personal information in the manner described herein. This Privacy Policy is incorporated into and subject to the terms of the BenFund™ User Agreement. This Privacy Policy will take effect on December 15, 2006.</p> <p>Notification of Changes</p> <p>As deemed necessary by BenFund™, this Privacy policy may be revised as situations warrant. Should we elect to use or disclose your personally identifiable information in a manner materially different from that stated at the time we collected the information, you will at that time, have a choice as to whether or not we are allowed use or disclose your information in this new manner. Any material changes would become effective only after we provide you by e-mail with at least 30 days'' notice of the amended Privacy Policy. Should you have a closed BenFund™ Account, you will not be contacted regarding the change and your personal information will not be used or disclosed in this new manner. </p> <p>Any changes or amendments to this Privacy Policy will be prominently shown on our Web site. Please check the BenFund™ Web site at www.BenFund.com™ at any time for the most current version of our Privacy Policy.</p> <p>BenFund™ web sites may at times make reference to 3rd party affiliates and other web sites. some of these web sites may be linked directly from the BenFund™ websites. These affiliates and 3rd party websites would be governed by their own privacy policies and statments. You are encouraged to review the privacy statement of these sites before providing them with personally identifiable information.</p> <p>A Special Note About Minors. Minors (under the age of 18) are not eligible to use our service and we ask that they do not submit any personal information to us or attempt to use the service.</p> <p>^^^^^^^^^^^</p><hr><p>&nbsp;</p> <p> Information We Collect</p> <p>Required Information:<br>   ^^^^^</p> <p>To open a BenFund™ account, you must provide your name, the name of your organization (if applicable) address, phone number, an e-mail address and either a social security number or a federal tax ID number. In order to receive payments through BenFund™, you must provide credit or debit card information AND bank account information. We also ask you to select two different security questions to reply to (such as your first car or your favorite pet''s name) This information is required and is necessary for us to process transactions on your behalf or issue a new password for you should you forget or lose your password. Additionally, we require this information to protect you and BenFund™ against credit card fraud and checking account fraud, and to contact you should the need arise in administering your account. </p> <p>Pursuant to directions and guidelines provided to by the USA Patriot Act, the U.S. Department of the Treasury and the Department of Homeland Security BenFund™ is obligated to obtain, verify, and record certain information. In some instances we are required or obliged to file reports or notifications to appropriate agencies.</p> <p>The information we collect in regards to the Account holder or Organization (and in some instances file reports or notification with) are listed below:<br> </p> <p>Name <br>   Address <br>   Date of Birth (for Individuals) </p> <p>Tax Identification Number (social security number for individuals or employer identification number for businesses)<br>     <br> In order to maintain compliance with the Bank Secrecy Act, we will also require your Tax Identification Number if you send or receive certain high-value transactions or high overall payment volumes through BenFund™.<br> </p> <p>Transaction Information</p> <p>When you use BenFund™ Accoun to receive money from someone else, we ask them to provide information related to each transaction.</p> <p>This includes:</p> <p>Name of person or organization providing the funds <br>   Amount of transaction Purpose of the funds<br>   Email address of the person or organization making the payment<br>   Phone number</p> <p>This information is retained for each of your transactions through BenFund™. In addition, we also collect the Internet address (IP address) of the computer or device you use to access your BenFund™ account, in order to help detect possible instances of unauthorized transactions. </p> <p>&nbsp;</p> <p>Collecting and Verifying Your Information With Third Parties<br> </p> <p>The prevention of fraud is paramount to our ability to operate the BenFund™ System. In order to protect all our customers and BenFund™ against potential fraud, we reserve the right to verify with third parties the information you provide. During such verification, we receive personally identifiable information about you from such services. As an example: When and if you register a credit card or debit card with BenFund™, we will use card authorization and fraud screening services to verify that your card information and address matches the information that you supplied to BenFund™, and that the card has not been reported as lost or stolen. </p> <p>Should you send or receive high overall payment volumes through BenFund™, there are certain circumstances that will prompt us to conduct background checks on your business by obtaining information relating to you and your business from a credit bureau or other business information service such as Dun &amp; Bradstreet. Should you incur a debt to BenFund™, we retain the right to conduct a credit check on you by obtaining additional information about you from one or more credit bureaus, to the extent permitted by law. Periodically. BenFund™, at its sole discretion, also reserves the right to retrieve and review a business and / or consumer credit report for any account, and reserves the right to close an account for any reason based on information obtained during this review process. </p> <p>Additional Verification</p>', '', '12/21/06 7:49 am', 'Public');
INSERT INTO `pages` (`pid`, `title`, `content`, `author`, `date`, `access`) VALUES
(2, 'User Agreement and Privacy Policy', '		<p><font size="5">BenFund&trade;  User agreement and privacy policy</font></p> <p>This Agreement was last modified on December 15, 2006.<br /> </p> <p>FOLLOWING IS A DESCRIPTION OF THE TERMS ON WHICH BenFund&trade;  OFFERS YOU ACCESS TO OUR PROGRAMS &amp; SERVICES. </p> <p>This User Agreement (&quot;Agreement&quot;) is a contract between you and BenFund&trade; , Inc. and applies to your use of the BenFund&trade; payment service and any related products and services available through www.BenFund.com (collectively the &quot;Service&quot;). If you do not agree to be bound by the terms and conditions of this Agreement, please do not use or access our Services. </p> <p>You must read, agree with, and signify acceptance of all of the terms and conditions contained in this Agreement and the Privacy Policy, which include specific terms and conditions expressly set out below and others that are incorporated by reference, prior to becoming a member of BenFund&trade; . We strongly recommend that, while reading this Agreement, you also click-thru to and read the information contained in the other pages and websites we refer to in this document, as they may provide other pertinent information relating to other terms and conditions that would apply to you as a BenFund&trade; user. Please note: underlined words and phrases typically are links to such pages and websites. By accepting this Agreement, you also agree that your use of other BenFund&trade; websites, products, &amp; and Services will be governed by the terms and conditions posted on those websites. </p> <p>For additional information about the Service and how it works, please also consult the BenFund&trade; &quot;HOW IT WORKS&quot; area of our website.</p> <p>BenFund&trade; may amend this Agreement at any time by posting the amended terms on our site. Except as stated below, all amended terms shall be effective 30 days after they are initially posted on our site on the Policy Updates page, accessable after log-in. Also, if you would like to receive email alerts regarding any policy changes and updates. Inaddition, you may review the current Agreement prior to initiating a transaction at any time at our User Agreement page. </p> <p>In this Agreement, &quot;you&quot; or &quot;your&quot; means any person or entity using the Service (&quot;Users&quot;). Unless otherwise stated, &quot;BenFund&trade;&quot;, &quot;we&quot; or &quot;our&quot; will refer collectively to BenFund&trade; and its related companies. Unless otherwise specified, all references to a &quot;bank&quot; in this Agreement include banks, savings associations, credit unions and other commonly recognized financial institutions, and all references to a &quot;credit card&quot; include Visa and MasterCar branded debit cards. </p> <p>&nbsp;</p> <p>Eligibility. In order to start a BenFund&trade; for the purpose of collecting funds, you must register for an Organization or Personal Fundraising Account, Merchant Layaway Account, or an Accounts Receivable Account for merchants or organizations. Individual users are limited to one &quot;Personal Account&quot; at a time. Businesses may have both a Master &quot;LayAway Account&quot; and a Master &quot;Accounts Receivable Account&quot; concurrently. Organizations may have up to 3 Fundraising Accounts, and a Master &quot;Accounts Receivable Account&quot; concurrently. Our Services are only available to individuals or businesses that can form legally binding contracts under applicable law. Without limiting the aforestated, our Service is not available to minors (under 18), persons who are suspended from our Service, or to persons (who at our sole discretion) present an unacceptable level of risk to our companies or systems . <br /> </p> <p>The Legal Relationship between You and BenFund&trade;.<br /> </p> <p> BenFund&trade; acts as a medium to help you accept payments from third parties. On your behalf, we act as your agent based upon your directions and your requests to use our Systems. BenFund&trade; will at all times hold your funds separate from its corporate funds, will not use your funds for its operating expenses or any other corporate purposes. We will not voluntarily make funds available to our creditors in the event of bankruptcy or for any other purpose. You understand and agree that BenFund&trade; is not a bank and our Service is a payment processing service rather than a banking service. In addition, BenFund&trade; is not acting as a trustee, fiduciary, or escrow with respect to your funds, but is acting only as an agent and custodian.</p> <p>There is no minimum balance requirement for BenFund&trade; accounts. All transactions and balances are computed and stated in U.S. Dollars. In order to help offset the ongoing expenses we incur in association with maintenance and improvements to the BenFund&trade; Systems, we may pool your funds together with funds from other Users, and place those funds in accounts at one or more FDIC-insured banks (&quot;aggregated funds&quot;) and may be eligible for FDIC pass-through insurance. </p> <p>You agree that you will not receive interest, dividends, or any other earnings on the &quot;aggregated funds&quot; that BenFund&trade; handles as your agent and places in the aforementioned Accounts. In consideration for your use of the BenFund&trade; service, you irrevocably transfer and assign to BenFund&trade; any ownership right that you may have in any interest, dividends, or other type of renumeration that may accrue on funds held in &quot;aggregated funds&quot; accounts. This assignment applies only to any interest, dividends, or other type of renumeration earned on your funds, and nothing herein grants BenFund&trade; any ownership right to the funds you maintain in the BenFund&trade; system. </p> <p>By initiating a BenFund&trade; account, or accepting or requesting to transfer payments through the Service or adding funds to your balance, you appoint BenFund&trade; as your agent to obtain the funds on your behalf and transfer the funds to an &quot;aggregated funds&quot; account until you further instruct BenFund&trade; with respect to transfer of your funds..</p> <p>Through the BenFund&trade; website, you may provide instructions to withdraw the funds subject to the terms and restrictions of this Agreement. </p> <p>BenFund&trade; is only a Payment Service Provider. BenFund&trade; acts as a payment service provider by creating, hosting, maintaining and providing our Service to you via the Internet. </p> <p>Identity Authentication. We use many techniques to identify our users when they register a BenFund&trade; Account on our site. Verification of Users is only an indication of increased likelihood that a User&#39;s identity is correct. You authorize BenFund&trade;, directly or through third parties, to make any inquiries we consider necessary to validate your BenFund&trade; Account registration. This may include ordering a credit report and performing other credit checks or verifying the information you provide against third party databases and the use of other proprietary methods. Due to the fact that user verification on the Internet is difficult, BenFund&trade; cannot and does not guarantee any user&#39;s identity. </p> <p>Release. In the event that you should have a dispute with another user of BenFund&trade; (in any capacity) you release BenFund&trade; (and our officers, directors, agents, subsidiaries, joint ventures and employees) from any and all claims, demands and damages (actual and consequential) of every kind and nature arising out of or in any way connected with such disputes. If you are a California resident, you waive California Civil Code &sect;1542, which says: &quot;A general release does not extend to claims which the creditor does not know or suspect to exist in his favor at the time of executing the release, which if not known by him must have materially affected his settlement with the debtor.&quot; </p> <p>No Warranty IMPLIED or EXPRESSED. WE, OUR OWNERS, SUBSIDIARIES, EMPLOYEES AND OUR SUPPLIERS PROVIDE OUR SERVICES &quot;AS IS&quot; AND WITHOUT ANY WARRANTY OR CONDITION, EXPRESS, IMPLIED OR STATUTORY. WE, OUR OWNERS, SUBSIDIARIES, EMPLOYEES AND OUR SUPPLIERS SPECIFICALLY DISCLAIM ANY IMPLIED WARRANTIES OF TITLE, MERCHANTABILITY, FITNESS FOR A PARTICULAR PURPOSE AND NON-INFRINGEMENT. BenFund&trade; shall make reasonable efforts to ensure that requests for electronic debits and credits involving bank accounts, credit cards, and check issuances are processed in a timely manner. We make no representations or warranties regarding the amount of time needed to complete processing because our Service is largely dependant upon many factors outside of our scope of control. Such delays may include (but are not limited to) delays in the banking system or the U.S. mail or other package or parcel service. Some states do not allow the disclaimer of implied warranties, so the foregoing disclaimer may not apply to you. This warranty gives you specific legal rights and you may also have other legal rights that vary from state to state. </p> <p>Limitation of Liability. IN NO EVENT SHALL WE, OUR OWNERS, SUBSIDIARIES, EMPLOYEES OR OUR SUPPLIERS BE LIABLE FOR LOST PROFITS OR ANY SPECIAL, INCIDENTAL OR CONSEQUENTIAL DAMAGES ARISING OUT OF OR IN CONNECTION WITH OUR WEB SITE, OUR SERVICE, OR THIS AGREEMENT (HOWEVER ARISING, INCLUDING NEGLIGENCE). Some states do not allow the exclusion or limitation of incidental or consequential damages so the above limitation or exclusion may not apply to you. </p> <p>OUR LIABILITY, AND THE LIABILITY OF OUR OWNERS, SUBSIDIARIES, EMPLOYEES AND SUPPLIERS, TO YOU OR ANY THIRD PARTIES IN ANY CIRCUMSTANCE IS SPECIFICALLY LIMITED TO THE ACTUAL AMOUNT OF DIRECT DAMAGES. </p> <p>Indemnification. You agree to indemnify and hold BenFund&trade;, its owners, subsidiaries, affiliates, officers, directors and employees harmless from any claim or demand (including attorneys&#39; fees) made or incurred by any third party due to or arising out of your breach of this Agreement or the documents it incorporates by reference, or your violation of any law or the rights of a third party relating to your use of the Service. </p> <p>Liability for Violations of the Acceptable Use Policy. If you engage in the following behavior, BenFund&trade; may fine you, as explained below. <br /> </p> <p>Using the BenFund&trade;  service to:<br /> </p> <p>Receive payments for any sexually oriented or obscene materials, or services.<br /> </p> <p>Receive payments for any narcotics, other controlled substances, steroids, drugs and devices (non-prescription and prescription), or drug paraphernalia.</p> <p> <br />   Receive payments for wagers, gambling debts or gambling winnings, regardless of the type or location of gambling activity. <br /> </p> <p>You and BenFund&trade; agree that the damages that BenFund&trade; will sustain as a result of the behavior outlined above would be substantial, including (without limitation) fines and other related expenses from its affiliates, payment processors, and service providers, but the full extent would be extremely difficult and impracticable to determine. In the event that you engage in such activities, then BenFund&trade; may fine you $2500.00 USD and/or BenFund&trade; may take legal action against you to recover losses that are in excess of the amount fined. You acknowledge and agree that $2500.00 USD is presently a reasonable minimum estimate of BenFund&rsquo;s&trade; damages, taking into consideration all currently existing circumstances. These circumstances include (without limitation) the relationship of the sum amount to the range of harm to BenFund&trade;. that reasonably could be anticipated and the anticipation that proof of actual damages may be impractical or extremely difficult. You agree that BenFund&trade; is entitled to deduct such fines directly from any existing balance in the offending account, or any other BenFund&trade; account owned by you. </p> <p>If you use the BenFund&trade; service in a manner that violates the Acceptable Use Policy, including but not limited to the three categories described above, your account will be subject to limitation or immediate termination, as stated in the !!!!! Closing Accounts and Limiting Account Access Policy.</p> <p>You further understand and agree that, if you use the BenFund&trade; service in a manner that violates the Acceptable Policy, BenFund&trade; could incur substantial liability and/or suffer significant damages, including (without limitation) various fines and other potential related expenses from its affiliates, payment processors, and service providers. By accepting payments that violate our Acceptable Use Policy, you acknowledge liability to BenFund&trade; for any and all damages suffered by BenFund&trade;. Without limiting the foregoing, you agree to reimburse BenFund&trade; for any and all costs, expenses, and fines levied on BenFund&trade; by its affiliates, payment processors, and/or service providers as a result of your activities. </p> <p>You agree that, if either you or BenFund&trade; commence litigation or arbitration in connection with this paragraph, the prevailing party is entitled to recover reasonable attorneys&rsquo; fees and any other costs incurred in such proceeding in addition to any other relief to which the prevailing party may be entitled.<br /> </p> <p>Fees. All fees are set forth in the published Fee Schedule. All fees are assessed in U.S. Dollars. the payment. Additional information about BenFund&trade;&#39;s fees is available in the Fees Policy. Your account and all transactions are made and displayed in U.S. dollars.</p> <p>&nbsp;</p> <p>Receiving Payments.<br /> </p> <p>Credit Card Funded Payments. By accepting a credit card payment, you agree that you are responsible for the payment if it is reversed. If such reversal occurs on a credit card funded payment made to your account, we will reverse the payment and debit your BenFund&trade; account balance to pay for the reversal. If there are insufficient funds in your BenFund&trade; balance, you agree to reimburse BenFund&trade; through other means, as described in the Payments (Receiving and Withdrawing) Policy.!!!!!</p> <p>Online Check Payments. By accepting an online check payment, you agree that you are responsible for the payment if it is rejected for payment for any reason. If such an event occurs on an online check payment to your account, we will reverse the payment and debit your BenFund&trade; account balance to pay for the reversal and any related fees for such an occurrence. If there are insufficient funds in your BenFund&trade; balance, you agree to reimburse BenFund&trade; through other means, as described in the Payments (Receiving and Withdrawing) Policy.!!!!!</p> <p>Withdrawals.</p> <p>Verified Fund availability:</p> <p>In order to withdraw money from your BenFund&trade; account we may require you to provide BenFund&trade; with a number of forms of identification. We require this information to authenticate your identity and to determine how much you may withdraw from your account. We may limit withdrawals and require additional information from you depending upon the type of account you have, how the funds were processed (credit card, online check, etc.), allowance for adequate time for clearing of funds, among other factors. </p> <p>Generally, we require you to complete some authentication procedures, such as confirming: your email address, your bank account, and your social security number or Tax ID number. You may request to withdraw funds directly by logging into your the BenFund&trade; account. Funds derived from Credit card transactions are available for withdrawal on the 7th business day following the online donation or payment. This allows adequate time for transactions to clear our security systems and be VERIFIED. Funds derived from personal checks or company checks will be available for withdrawal 10 business days after<br />   they were deposited in our bank. This allows adequate time for transactions to clear our security systems and be VERIFIED.<br /> </p> <p>Currently, all VERIFIED fund withdrawals are sent via USPS first class mail on the next business day following your request. Should you desire to receive your VERIFIED funds via FedX, there will be a $28.00 processing fee which covers the FedeX charges and a small processing fee. <br /> </p> <p>How to request your funds:<br /> </p> <p>Log on to your BenFund&trade; Account as the administrator. (Note: Benfunds can only be sent to the payee delegated during the original signup.)</p> <p>Click on the withdrawal tab and you&#39;ll see a screen that shows the total funds collected (minus the fees charged by BenFund&trade;).</p> <p>The screen will show the following information:</p> <p>Breakdown of funds donated by various methods. IE: credit card and check donations</p> <p>A &quot;currently available&quot; amount for each of these.</p> <p>Total Currently available amount that can be requested at that time.</p> <p>Field showing the next available withdrawal date.</p> <p>You may withdraw all or any part of the currently available VERIFIED funds in your BenFund account.</p> <p>NOTE: Each BenFund account is restricted to the withdrawal of available VERIFIED funds no more than once every 6 business days.</p> <p>^^^^^^NOTE to Programmer: The last thing we need to get before sending the funds is a secondary security password that we<br />   collected during the initial signup and a current phone # to contact.</p><hr /><p>&nbsp;</p> <p>Acceptable Use Policy</p> <p>BenFund&trade; Account users actions in conjunction with the use of a BenFund&trade; Account shall not or attempt to:<br /> </p> <p>(a) be misleading, false, or inaccurate;</p> <p>(b) be fraudulent or involve the sale of stolen or counterfeit items;</p> <p>(c) consist of providing a cash advance yourself from your credit card (or helping any others person(s) to do so),</p> <p>(d) be related in any way to gaming activities/gambling and, including but not limited to the acceptance of payments for gambling debts, wagers or gambling winnings, regardless of the type of gambling or the location of the gambling activity (including offline and online casinos, office pools and sports wagering,etc );</p> <p>(e) infringe on any third party&#39;s patent, trademark, copyright, trade secret or other intellectual or physical property rights.</p> <p>(f) violate any law, statute, ordinance, contract or regulation (including, but not limited to, those governing financial services, consumer protection, deceptive practices, antidiscrimination, unfair competition, or advertising of a false misleading nature);</p> <p>(g) be derogatory, illegal, defamatory, trade libelous, unlawfully threatening or harassing;</p> <p>(h) be obscene or contain any type of pornography;</p> <p>(i) contain any Trojan horses, worms, viruses, or any other computer programming routines that may damage, or in any way interfere with, surreptitiously intercept or extract any system, data or other personal information; or</p> <p>(j) create any liability for us or cause us to lose (in whole or in part) the services of any of our suppliers. If you use, or attempt to use the Service for any purpose other than receiving payments and managing your account, your account will be terminated, fines may be assessed, and you will be subject to repayment for any other applicable damages and other penalties, including criminal prosecution where available. </p> <p>&nbsp;</p> <p>&nbsp;</p> <p>Trademarks And use of Logos.</p> <p>BenFund&trade;, BenFund.com&trade;, BenFund.net&trade; , and all other related logos, products and services described in this website are either trademarks or registered trademarks of BenFund&trade;, or its affiliates and unless otherwise specified below, may not be copied, imitated or used, in whole or in part, without the prior written permission of BenFund&trade;. </p> <p>We own intellectual property rights to the contents of our websites and its design, structure, and compilation (sometimes known as &quot;look and feel&quot;). It is very easy to copy things in cyberspace, but not necessarily always acceptable or legal. You must have the legal right to any content you upload or download from our websites as described below. <br /> </p> <p>All page headers, page footers, navigational structures, button icons, custom graphics, and scripts are the service marks, trademarks, and/or recognized trade &quot;branding&quot; of BenFund&trade; and may not be copied, imitated, or used, in whole or in part, without the prior written permission of BenFund&trade;. </p> <p>Notwithstanding the above, logos and other various navigational buttons provided by BenFund&trade; through its Website (&quot;logos&quot;), may be used without prior written consent for the purpose of directing web traffic to the Service. These Logos may not be altered, modified, or changed in any way. These logos are not to be used in a manner that is disparaging to BenFund&trade; or the Service. Logos may not be displayed in any manner that implies sponsorship or endorsement by BenFund&trade;. <br /> </p> <p>&nbsp;</p> <p>&nbsp;</p> <p>Access to the Service<br /> </p> <p>You agree that you will not use any device, software or routine (manual or automated) to interfere or attempt to interfere with the proper working of the BenFund&trade; site. You agree that you will not take any action that imposes an unreasonable or disproportionately large load on our infrastructure. Much of the information on our site is proprietary or is licensed to BenFund&trade; by our affiliates. You agree that you will not copy, reproduce, alter, modify, create derivative works, publicly display or frame any content (except for Your Information) from our web site without the prior expressed written permission of BenFund&trade;. If you use, or attempt to use the Service for purposes other than receiving payments and managing your account, including but not limited to tampering, hacking, modifying or otherwise corrupting the security or functionality of Service, your account will be terminated and you will be subject to damages and other penalties, including criminal prosecution where available. <br /> </p> <p>Privacy and Security. We do not sell or rent your personal information to third parties for marketing purposes without your consent and we only use Your Information as described in the Privacy Policy. We view protection of users&#39; privacy as a very important principle. We understand clearly that you and Your Information are one of our most important assets. We store and process Your Information on computers located in the United States that are protected by physical as well as technological security devices. You should only log in to your BenFund&trade; account on a page which begins with:</p> <p>https://www.benfund.com/<br /> All of our pages begin with https://www.benfund.com/ and therefore you should not use any other site that does not begin as such.</p> <p>We use third parties to verify and certify our privacy policies. Our current Privacy Policy is available at https://www.benfund.com/ !!!!!. If you object to your information being used in this way, please do not use our Services. </p> <p>&nbsp;</p> <p>Accuracy of Information:<br /> </p> <p>&quot;Your Information&quot; is defined as any information you provide to us or other users in the registration and payment process. You are solely responsible for Your Information, as we act as a passive medium for your online distribution and publication of Your Information. </p> <p>&nbsp;</p> <p>Termination or Closing Your Account.<br /> </p> <p> Closing your account is accomplished by clicking the &quot;Close Account&quot; link in your Profile on the BenFund&trade; website. This can be done at any time. At the time of account closure, any funds that we are holding in custody for you at the time of closure, less any applicable fees, will be paid to you by check, assuming all withdrawal related fund availability requirements have been met. Closure of your account cannot be used as a means of evading investigation if an account investigation is pending. To help in the elimination of potential fraud or potential losses, BenFund&trade; may continue to hold your funds for up to 180 days as appropriate to protect BenFund&trade; against the risk of reversals. If you are later determined to be entitled to some or all of the funds in dispute, BenFund&trade; will release those funds to you. In any event, You will remain liable for all obligations related to your account even after account closure. If you do not access your account for a period of three years, it will be terminated. After the date of termination, we will use the information you provided to try to send you any funds that we are holding in custody for you. If that information is not correct, and we are unable to complete the payment to you, your funds will be subject to applicable state laws regarding escheat of unclaimed property. <br /> </p> <p>&nbsp;</p> <p>Collecting what is Due</p> <p>In addition to other forms of redress, we may update inaccurate or incorrect information you have provide to us, contact you by various other means of communication, immediately warn other BenFund&trade; users and our affiliates of your actions, place a hold on any or all of the funds in your account, limit the collection of payments, limit access to an account and any or all of the account&#39;s functions, limit withdrawals, indefinitely suspend or close your account and refuse to provide our Services to you if: </p> <p>(a) you breach any part of this Agreement or any of the documents incorporated into it by reference;</p> <p>(b) we are unable to authenticate or verify any of the information you provide to us;</p> <p>(c) we believe that your account or activities pose any type of risk to BenFund&trade; or its Account holders;</p> <p>(d) we believe that your actions might cause financial loss or legal liability for BenFund&trade;, our users or you; or </p> <p>(e) your use of your BenFund&trade; account is deemed by BenFund&trade;, its affiliates, suppliers, Visa, MasterCard, American Express or Discover to constitute abuse of the credit card system or a violation of credit card rules and regulations, including (without limitation), using the BenFund&trade; system to test credit card validity. Although a payment transaction may have been recorded as completed in your BenFund&trade; account, transactions are not considered completed until the funds have been charged to the payees&#39;s funding source. In addition, BenFund&trade; reserves the right to hold appropriate funds beyond the posted distribution schedule for transactions it deems suspicious. These may include accounts that are conducting high transaction volumes. We do this to ensure the integrity of the funds. Should we close your account, we will provide you with appropriate notice and pay you all of the unrestricted funds held in your BenFund&trade; account. Additionally, to secure and ensure your performance of this Agreement, you grant to BenFund&trade; a lien on and security interest in your account. Also, you acknowledge that BenFund&trade; may setoff against any BenFund&trade; accounts you own for any negative balance in your other BenFund&trade; accounts, at any time and for any reason allowed by law. <br /> </p> <p>Assignment of Account:</p> <p>This Agreement prohibits the transfer or assignment of any rights or obligations you may have under this Agreement without the prior written consent of BenFund&trade;. BenFund&trade; reserves the right to transfer this Agreement or any right or obligation under this Agreement without your consent. <br /> </p> <p>Legal Compliance:</p> <p>You shall comply with all applicable U.S. and international laws, statutes, ordinances, regulations, contracts and applicable licenses regarding your use of BenFund&trade; Services. <br /> </p> <p>NOTICES:<br /> </p> <p>Electronic Communications.</p> <p> You agree that this Agreement constitutes &quot;a writing signed by You&quot; under any applicable law or regulation. To the fullest extent permitted by applicable law, this Agreement and any other agreements, notices or other communications regarding your BenFund&trade; account and/or your use of the Service (&quot;Communications&quot;), may be provided to you electronically and you agree to receive all Communications from BenFund&trade; in electronic form. Electronic Communications may be posted on the pages within the BenFund&trade; website and/or delivered to your e-mail address. You may print a copy of any Communications from BenFund&trade; and retain it for your records. All Communications in either electronic or paper format will be considered to be in &quot;writing,&quot; and to have been received no later than five (5) business days after posting or dissemination, whether or not you have received or retrieved the Communication. BenFund&trade; reserves the right but assumes no obligation to provide Communications in paper format or other means of communications. </p> <p>&nbsp;</p> <p> Credit Report.</p> <p> You agree that BenFund&trade; may order and review your credit report with the sole purpose of assessing your fitness to hold a BenFund&trade; account and/or your ability to use the Service or features incorporated therein. <br /> </p> <p>Procedure.</p> <p> Except as explicitly stated otherwise on this website, any notices in regards to Accounts shall be given by postal mail to:</p> <p>BenFund<br />   Attn: Legal Department<br />   4619 Olive Hwy,<br />   Oroville, CA 95966</p> <p>&nbsp;</p> <p>Legal Disputes.<br /> </p> <p> Should a dispute arises between you and BenFund&trade;, our goal is to provide you and us with a reasonable, neutral, and cost effective means of resolving the dispute quickly. Accordingly, you and BenFund&trade; agree that any controversy or claim(s) at law or equity that arises out of this Agreement or BenFund&#39;s&trade; services (&quot;Claims&quot;) shall be resolved in accordance with one of the methods described below, or as otherwise mutually agreed upon in writing by the parties. Prior to any litigation, BenFund&trade; strongly encourages users to first to contact BenFund&trade; directly to seek a resolution. BenFund&trade; will consider reasonable requests to resolve the dispute through alternative dispute resolution procedures, such as mediation, as an alternative.</p> <p>Arbitration.</p> <p> For any Claim (excluding Claims for injunctive or other equitable relief) where the total amount of the award requested is less than $10,000.00 USD, you or BenFund&trade; may elect to resolve the dispute through the process of binding arbitration. This can be conducted by telephone, on-line, and/or based solely upon written submissions where no in-person appearance is required. In these cases, the arbitration shall be administered by the American Arbitration Association or JAMS, in accordance with their applicable rules, or any other established ADR provider mutually agreed upon by the parties. Any judgment on the award rendered by the arbitrator may be entered in any court having jurisdiction thereof. </p> <p>Court.</p> <p>Alternatively, any Claim may be adjudicated by a court of competent jurisdiction located in Butte County, California. By using our Service, you agree with BenFund&trade; to agree to submit to the personal jurisdiction of the courts located within the county of Butte, California. </p> <p>&nbsp;</p> <p>General.</p> <p> This Agreement is governed by and interpreted under the laws of the state of California, U.S. as such laws are applied to agreements entered into and to be performed entirely within California by California residents and businesses. That being mentioned, the Federal Arbitration Act (&quot;FAA&quot;), and all of its rules and procedures, shall govern to the extent that the FAA is inconsistent with California law. We do not guarantee uninterrupted, continous or secure access to our service. The operation of our site may be interfered with or impeded by various circumstances that are outside of our control. Should any provision of this Agreement be declared invalid or unenforceable, such provision shall be struck and all the remaining provisions shall be enforced. You agree that this Agreement and any incorporated documents referenced herein, may be automatically assigned by BenFund&trade;, in our sole discretion, to a third party in the event of a merger or acquisition. The headings shown above each subject are for reference purposes only and in no way define, limit, construe or describe the scope or extent of such sections. Our failure to act with respect to any breach of this agreement by you or others does not waive our right(s) to act with respect to subsequent or similar breaches. This Agreement and the documents it incorporates set forth the entire and complete understanding between us with respect to the subject matter hereof. The sections relating to Fees, Access, Limitation of Liability, Indemnity, and Legal Disputes shall survive any termination or expiration of this Agreement. <br /> </p> <p>Disclosures. </p> <p>BenFund&trade; Services are offered by BenFund&trade;, located at 4619 Olive Hwy. Oroville, CA 95966. If you are a California resident, you may have this same information emailed directly to you by sending a letter to the address above. Please provide your email address along with your request for this information. Fees for our services are described in our Fees Policy. </p> <p>Disputes between you and BenFund&trade; regarding our Services may be reported to Customer Support online through the BenFund&trade; Help Center at any time, or by calling (530) 589-2887 from 9 AM to 4 PM Pacific Standard Time. Additionally, you may report complaints to the Complaint Assistance Unit of the Division of Consumer Services of the Department of Consumer Affairs by contacting them in writing at 400 R Street, Sacramento, California 95814, or by telephone at (800) 952-5210. Florida residents may report any disputes with BenFund&trade; to the BenFund&trade; Help Center, or you may wish to contact the Florida Department of Financial Services in writing at 200 East Gaines Street, Tallahassee, Florida, 32399, or by telephone at 1-800-342-2762. <br />     <br /> </p> <p>&nbsp;</p> <p>&nbsp;</p> <p>&nbsp;</p> <p>&nbsp;</p> <hr /><p><br />   Privacy policy Page:</p> <p> Overview</p> <p>In order to maintain and operate the BenFund&trade; service and to reduce the risk of fraud, BenFund&trade; (&quot;BenFund&trade; &quot; or &quot;we&quot;) must ask you to provide us information about yourself and your bank account. This Privacy Policy describes the scope of the information we collect and how we use that information. </p> <p>We take the privacy of your personal information very seriously and will use your information only in accordance with the terms of this Privacy Policy. BenFund&trade; will not sell or rent your personally identifiable information or a list of our customers to any third parties. !!!!!However, as described in more detail in Part C below, there are limited circumstances in which some of your information will be shared with third parties, under strict restrictions, so it is important for you to review this Privacy Policy. This Privacy Policy applies to all services that are hosted on the BenFund.com&trade; Web site. </p> <p>By accepting this Privacy Policy and User Agreement during registration, you express absolute agreement with our policies and consent to our use and disclosure of your personal information in the manner described herein. This Privacy Policy is incorporated into and subject to the terms of the BenFund&trade; User Agreement. This Privacy Policy will take effect on December 15, 2006.</p> <p>Notification of Changes</p> <p>As deemed necessary by BenFund&trade;, this Privacy policy may be revised as situations warrant. Should we elect to use or disclose your personally identifiable information in a manner materially different from that stated at the time we collected the information, you will at that time, have a choice as to whether or not we are allowed use or disclose your information in this new manner. Any material changes would become effective only after we provide you by e-mail with at least 30 days&#39; notice of the amended Privacy Policy. Should you have a closed BenFund&trade; Account, you will not be contacted regarding the change and your personal information will not be used or disclosed in this new manner. </p> <p>Any changes or amendments to this Privacy Policy will be prominently shown on our Web site. Please check the BenFund&trade; Web site at www.BenFund.com&trade; at any time for the most current version of our Privacy Policy.</p> <p>BenFund&trade; web sites may at times make reference to 3rd party affiliates and other web sites. some of these web sites may be linked directly from the BenFund&trade; websites. These affiliates and 3rd party websites would be governed by their own privacy policies and statments. You are encouraged to review the privacy statement of these sites before providing them with personally identifiable information.</p> <p>A Special Note About Minors. Minors (under the age of 18) are not eligible to use our service and we ask that they do not submit any personal information to us or attempt to use the service.</p> <p>^^^^^^^^^^^</p><hr /><p>&nbsp;</p> <p> Information We Collect</p> <p>Required Information:<br />   ^^^^^</p> <p>To open a BenFund&trade; account, you must provide your name, the name of your organization (if applicable) address, phone number, an e-mail address and either a social security number or a federal tax ID number. In order to receive payments through BenFund&trade;, you must provide credit or debit card information AND bank account information. We also ask you to select two different security questions to reply to (such as your first car or your favorite pet&#39;s name) This information is required and is necessary for us to process transactions on your behalf or issue a new password for you should you forget or lose your password. Additionally, we require this information to protect you and BenFund&trade; against credit card fraud and checking account fraud, and to contact you should the need arise in administering your account. </p> <p>Pursuant to directions and guidelines provided to by the USA Patriot Act, the U.S. Department of the Treasury and the Department of Homeland Security BenFund&trade; is obligated to obtain, verify, and record certain information. In some instances we are required or obliged to file reports or notifications to appropriate agencies.</p> <p>The information we collect in regards to the Account holder or Organization (and in some instances file reports or notification with) are listed below:<br /> </p> <p>Name <br />   Address <br />   Date of Birth (for Individuals) </p> <p>Tax Identification Number (social security number for individuals or employer identification number for businesses)<br />     <br /> In order to maintain compliance with the Bank Secrecy Act, we will also require your Tax Identification Number if you send or receive certain high-value transactions or high overall payment volumes through BenFund&trade;.<br /> </p> <p>Transaction Information</p> <p>When you use BenFund&trade; Accoun to receive money from someone else, we ask them to provide information related to each transaction.</p> <p>This includes:</p> <p>Name of person or organization providing the funds <br />   Amount of transaction Purpose of the funds<br />   Email address of the person or organization making the payment<br />   Phone number</p> <p>This information is retained for each of your transactions through BenFund&trade;. In addition, we also collect the Internet address (IP address) of the computer or device you use to access your BenFund&trade; account, in order to help detect possible instances of unauthorized transactions. </p> <p>&nbsp;</p> <p>Collecting and Verifying Your Information With Third Parties<br /> </p> <p>The prevention of fraud is paramount to our ability to operate the BenFund&trade; System. In order to protect all our customers and BenFund&trade; against potential fraud, we reserve the right to verify with third parties the information you provide. During such verification, we receive personally identifiable information about you from such services. As an example: When and if you register a credit card or debit card with BenFund&trade;, we will use card authorization and fraud screening services to verify that your card information and address matches the information that you supplied to BenFund&trade;, and that the card has not been reported as lost or stolen. </p> <p>Should you send or receive high overall payment volumes through BenFund&trade;, there are certain circumstances that will prompt us to conduct background checks on your business by obtaining information relating to you and your business from a credit bureau or other business information service such as Dun &amp; Bradstreet. Should you incur a debt to BenFund&trade;, we retain the right to conduct a credit check on you by obtaining additional information about you from one or more credit bureaus, to the extent permitted by law. Periodically. BenFund&trade;, at its sole discretion, also reserves the right to retrieve and review a business and / or consumer credit report for any account, and reserves the right to close an account for any reason based on information obtained during this review process. </p> <p>Additional Verification</p>		', '', '12/20/06 5:11 am', 'Public'),
(3, 'Augusto Sandino', 'Arriba al Revolution Socialista!	 	', '', '12/19/06 10:03 am', 'Public'),
(4, 'Vladimir Lenin', '<font size="6"><u><font color="#ff0000"><strong>		Land and Liberty!</strong></font></u></font>	 		', '', '12/25/06 4:13 pm', 'Public');

-- --------------------------------------------------------

--
-- Table structure for table `paging`
--

CREATE TABLE `paging` (
  `name` char(2) default NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `paging`
--

INSERT INTO `paging` (`name`) VALUES
('a'),
('b'),
('c'),
('d'),
('d'),
('e'),
('f'),
('g'),
('h'),
('i'),
('j'),
('k'),
('l'),
('m'),
('n'),
('o'),
('p'),
('q'),
('r'),
('s'),
('t'),
('u'),
('v'),
('w'),
('x'),
('y'),
('z'),
('z');

-- --------------------------------------------------------

--
-- Table structure for table `payments`
--

CREATE TABLE `payments` (
  `id` int(11) NOT NULL auto_increment,
  `inv` int(6) default NULL,
  `to_id` int(11) NOT NULL default '0',
  `from_id` varchar(6) default NULL,
  `amount` varchar(32) NOT NULL default '',
  `date` varchar(64) NOT NULL default '',
  `method` varchar(64) NOT NULL default '',
  `valid` char(1) NOT NULL default '',
  `ip` varchar(32) NOT NULL default '',
  PRIMARY KEY  (`id`),
  UNIQUE KEY `inv` (`inv`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=41 ;

--
-- Dumping data for table `payments`
--

INSERT INTO `payments` (`id`, `inv`, `to_id`, `from_id`, `amount`, `date`, `method`, `valid`, `ip`) VALUES
(1, 1, 617428, '6174', '500', '11686745396', 'CC', '1', ''),
(2, 2, 6174, '617428', '700', '11686745396', 'Paypal', '1', ''),
(3, 3, 617428, '6174', '50.00', '11686745396', 'ccard', '1', '67.169.233.182'),
(4, 4, 6174, '617428', '50.00', '116895090922', 'ccard', '1', '67.169.233.182'),
(5, 5, 617428, '6174', '50.00', '116895095112', 'ccard', '1', '67.169.233.182'),
(7, 7, 624514, '', '50.00', '116895116439', 'ccard', '1', '67.169.233.182'),
(8, 8, 624514, '', '50.00', '116895126898', 'ccard', '1', '67.169.233.182'),
(9, 9, 624514, '', '50.00', '116895129113', 'ccard', '1', '67.169.233.182'),
(10, 10, 624514, '', '50.00', '1168951478.93', 'ccard', '1', '67.169.233.182'),
(11, 11, 624514, '', '50.00', '1168951490.17', 'ccard', '1', '67.169.233.182'),
(12, 12, 624514, '', '', '1168951571.62', 'ccard', '1', '67.169.233.182'),
(13, 13, 624514, '', '50.00', '1168951808.06', 'ccard', '1', '67.169.233.182'),
(14, 14, 617428, '', '5000.00', '1168951883.83', 'ccard', '1', '67.169.233.182'),
(15, 15, 907357, '', '50.00', '1171528293.96', 'ccard', '1', '67.169.233.182'),
(16, 16, 617428, '6174', '', '1172925754.23', 'ccard', '1', '67.169.233.182'),
(17, 17, 617428, '', '', '1174107109.4', 'ccard', '1', '67.169.233.182'),
(40, 6, 617428, '6174', '10361.00', '1184182716.26', 'ccard', '1', '67.169.233.182');

-- --------------------------------------------------------

--
-- Table structure for table `payment_data`
--

CREATE TABLE `payment_data` (
  `id` mediumint(9) NOT NULL auto_increment,
  `payment_id` mediumint(9) NOT NULL default '0',
  `first_name` varchar(50) NOT NULL default '',
  `m_i` char(1) default NULL,
  `last_name` varchar(50) NOT NULL default '',
  `address1` varchar(255) NOT NULL default '',
  `address2` varchar(255) default NULL,
  `city` varchar(100) NOT NULL default '',
  `state` char(2) NOT NULL default '',
  `zip` int(5) NOT NULL default '0',
  `method` varchar(6) NOT NULL default '',
  `cc_num` varchar(4) default NULL,
  `exp_date` varchar(5) default NULL,
  `paypal_email` varchar(255) default NULL,
  `check_num` int(11) default NULL,
  PRIMARY KEY  (`id`),
  KEY `payment_id` (`payment_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=31 ;

--
-- Dumping data for table `payment_data`
--

INSERT INTO `payment_data` (`id`, `payment_id`, `first_name`, `m_i`, `last_name`, `address1`, `address2`, `city`, `state`, `zip`, `method`, `cc_num`, `exp_date`, `paypal_email`, `check_num`) VALUES
(1, 1, 'Poop', 'L', 'Mcgee', '213 Gulag', NULL, 'Iraq', 'AM', 99999, 'Visa', '4589', '05/09', NULL, NULL),
(2, 8, 'Jason', NULL, 'OHanlon', '3724 Hildale Ave', NULL, 'oroville', 'CA', 95966, 'ccard', '12', '01-20', NULL, NULL),
(4, 13, 'Jason', NULL, 'O''Hanlon', '3724 Hildale Ave', NULL, 'oroville', 'CA', 95966, 'ccard', '0012', '01-20', NULL, NULL),
(5, 14, 'Jason', NULL, 'O''Hanlon', '3724 Hildale Ave', NULL, 'oroville', 'CA', 95966, 'ccard', '0012', '01-20', NULL, NULL),
(22, 32, 'Jolly Roger', NULL, 'Mcgyy', '1265 Gulag', NULL, 'Iraq', 'CA', 99999, 'ccard', '', '09-20', NULL, NULL),
(7, 16, 'Poop', 'L', 'Mcgee', '213 Gulag', 'Torture Civilians', 'Iraq', 'AM', 99999, 'ccard', '4589', '02-20', NULL, NULL),
(21, 31, 'Jolly Roger', NULL, 'Mcgyy', '1265 Gulag', NULL, 'Iraq', 'CA', 99999, 'ccard', '', '08-20', NULL, NULL),
(23, 33, 'Jolly Roger', NULL, 'Mcgyy', '1265 Gulag', NULL, 'Iraq', 'CA', 99999, 'ccard', '', '09-20', NULL, NULL),
(24, 34, 'Jolly Roger', NULL, 'Mcgyy', '1265 Gulag', NULL, 'Iraq', 'CA', 99999, 'ccard', '', '09-20', NULL, NULL),
(25, 35, 'Jolly Roger', NULL, 'Mcgyy', '1265 Gulag', NULL, 'Iraq', 'CA', 99999, 'ccard', '', '08-20', NULL, NULL),
(26, 36, 'Jolly Roger', NULL, 'Mcgyy', '1265 Gulag', NULL, 'Iraq', 'CA', 99999, 'ccard', '', '09-20', NULL, NULL),
(27, 37, 'Jolly Roger', NULL, 'Mcgyy', '1265 Gulag', NULL, 'Iraq', 'CA', 99999, 'ccard', '', '05-20', NULL, NULL),
(28, 38, 'Jolly Roger', NULL, 'Mcgyy', '1265 Gulag', NULL, 'Iraq', 'CA', 99999, 'ccard', '', '10-20', NULL, NULL),
(29, 39, 'Jolly Roger', NULL, 'Mcgyy', '1265 Gulag', NULL, 'Iraq', 'CA', 99999, 'ccard', '', '10-20', NULL, NULL),
(30, 40, 'Jolly Roger', NULL, 'Mcgyy', '1265 Gulag', NULL, 'Iraq', 'CA', 99999, 'ccard', '', '10-20', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `social_security`
--

CREATE TABLE `social_security` (
  `id` varchar(6) NOT NULL default '',
  `ssn1` varchar(5) NOT NULL default '',
  `tax1` varchar(5) NOT NULL default '',
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `social_security`
--

INSERT INTO `social_security` (`id`, `ssn1`, `tax1`) VALUES
('912548', '12345', ''),
('197613', '55555', ''),
('306652', '62205', ''),
('595758', '12345', ''),
('512152', '12345', ''),
('356008', '60834', ''),
('399954', '12345', ''),
('310333', '12345', ''),
('957565', '12345', ''),
('433105', '', '12345'),
('821307', '', '12'),
('960916', '12345', ''),
('512289', '12345', ''),
('959844', '12345', ''),
('756350', '11232', ''),
('875332', '11232', ''),
('422366', '12345', ''),
('690762', '32132', '');

-- --------------------------------------------------------

--
-- Table structure for table `totals`
--

CREATE TABLE `totals` (
  `id` varchar(6) NOT NULL default '',
  `ammount` decimal(10,2) NOT NULL default '0.00',
  `goal` decimal(10,2) default NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `totals`
--

INSERT INTO `totals` (`id`, `ammount`, `goal`) VALUES
('907357', '85.50', NULL),
('912548', '0.00', NULL),
('595758', '0.00', NULL),
('512152', '0.00', NULL),
('356008', '0.00', NULL),
('958306', '0.00', NULL),
('399954', '0.00', NULL),
('310333', '0.00', NULL),
('957565', '0.00', NULL),
('997912', '0.00', NULL),
('690762', '170.00', NULL),
('', '0.00', NULL),
('admin', '0.00', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `transactions`
--

CREATE TABLE `transactions` (
  `id` int(11) NOT NULL auto_increment,
  `type` int(1) NOT NULL default '0',
  `inv` int(6) default NULL,
  `to_id` int(11) NOT NULL default '0',
  `from_id` varchar(6) NOT NULL default '',
  `total` varchar(32) NOT NULL default '',
  `date` varchar(64) NOT NULL default '',
  `status` char(1) NOT NULL default '',
  PRIMARY KEY  (`id`),
  UNIQUE KEY `inv` (`inv`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=19 ;

--
-- Dumping data for table `transactions`
--

INSERT INTO `transactions` (`id`, `type`, `inv`, `to_id`, `from_id`, `total`, `date`, `status`) VALUES
(1, 1, 1, 6174, '617428', '400', '11686745396', '1'),
(2, 2, 2, 6174, '617428', '700', '11686745396', '1'),
(3, 3, 3, 6174, '617428', '60.00', '11686745396', '1'),
(4, 2, 4, 6174, '617428', '50.00', '116895090922', '0'),
(5, 1, 5, 6174, '617428', '50.00', '116895095112', '0'),
(6, 2, 6, 6174, '617428', '50.00', '116895100545', '0'),
(7, 1, 7, 6174, '617428', '50.00', '116895116439', '1'),
(14, 1, 14, 6174, '6174', '5000.00', '1168951883.83', '1'),
(16, 1, 16, 6174, '617428', '50.00', '1172925754.23', '1'),
(17, 2, 17, 6174, '617428', '50.00', '1174107109.4', '1'),
(18, 1, 18, 6174, '617428', '50.00', '1174459587.97', '1');
