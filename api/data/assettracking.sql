-- phpMyAdmin SQL Dump
-- version 4.2.7.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Sep 19, 2015 at 02:41 PM
-- Server version: 5.6.20
-- PHP Version: 5.5.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `assettracking`
--

-- --------------------------------------------------------

--
-- Table structure for table `beacon`
--

CREATE TABLE IF NOT EXISTS `beacon` (
`id` int(10) unsigned NOT NULL,
  `uuid` varchar(36) NOT NULL,
  `major` int(16) NOT NULL,
  `minor` int(16) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `locationId` int(10) unsigned DEFAULT NULL,
  `equipmentId` int(10) unsigned DEFAULT NULL,
  `created` timestamp NULL DEFAULT '0000-00-00 00:00:00',
  `modified` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `beacon`
--

INSERT INTO `beacon` (`id`, `uuid`, `major`, `minor`, `name`, `locationId`, `equipmentId`, `created`, `modified`) VALUES
(1, 'B9407F30-F5F8-466E-AFF9-25556B57FE6D', 43561, 20592, 'np_ece_0001', 1, NULL, '2015-09-19 08:14:31', '2015-09-19 08:24:45'),
(2, 'B9407F30-F5F8-466E-AFF9-25556B57FE6D', 0, 0, 'np_ece_0002', 2, NULL, '2015-09-19 08:17:10', '2015-09-19 08:24:46'),
(3, 'B9407F30-F5F8-466E-AFF9-25556B57FE6D', 52689, 51570, 'np_ece_0003', 3, NULL, '2015-09-19 08:17:10', '2015-09-19 08:24:47'),
(4, 'B9407F30-F5F8-466E-AFF9-25556B57FE6D', 23254, 34430, 'np_ece_0004', 4, NULL, '2015-09-19 08:17:11', '2015-09-19 08:24:48'),
(5, 'B9407F30-F5F8-466E-AFF9-25556B57FE6D', 58949, 29933, 'np_ece_0005', NULL, 1, '2015-09-19 08:17:11', '2015-09-19 08:38:34'),
(6, 'B9407F30-F5F8-466E-AFF9-25556B57FE6D', 24890, 6699, 'np_ece_0006', NULL, 2, '2015-09-19 08:17:11', '2015-09-19 08:38:35'),
(7, 'B9407F30-F5F8-466E-AFF9-25556B57FE6D', 33078, 31465, 'np_ece_0007', NULL, 3, '2015-09-19 08:17:12', '2015-09-19 08:38:35'),
(8, 'B9407F30-F5F8-466E-AFF9-25556B57FE6D', 10888, 43874, 'np_ece_0008', NULL, NULL, '2015-09-19 08:17:12', '2015-09-19 08:40:31'),
(9, 'B9407F30-F5F8-466E-AFF9-25556B57FE6D', 16717, 179, 'np_ece_0009', NULL, 5, '2015-09-19 08:17:12', '2015-09-19 08:38:36');

-- --------------------------------------------------------

--
-- Table structure for table `country`
--

CREATE TABLE IF NOT EXISTS `country` (
`id` int(10) unsigned NOT NULL,
  `code` char(2) NOT NULL,
  `name` char(52) NOT NULL,
  `population` int(10) unsigned NOT NULL DEFAULT '0',
  `userId` int(10) unsigned DEFAULT NULL,
  `created` timestamp NULL DEFAULT '0000-00-00 00:00:00',
  `modified` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=35 ;

--
-- Dumping data for table `country`
--

INSERT INTO `country` (`id`, `code`, `name`, `population`, `userId`, `created`, `modified`) VALUES
(4, 'CN', 'China', 1277558000, 5, '2015-05-24 08:21:23', '2015-04-27 02:11:18'),
(5, 'DE', 'Germany', 82164700, 5, '2015-05-24 08:21:23', '2015-04-27 02:11:18'),
(6, 'FR', 'France', 59225700, 5, '2015-05-24 08:21:23', '2015-04-27 02:11:18'),
(7, 'GB', 'United Kingdom', 59623400, 6, '2015-05-24 08:21:23', '2015-04-27 02:11:18'),
(8, 'IN', 'India', 1013662000, 6, '2015-05-24 08:21:23', '2015-04-27 02:11:18'),
(9, 'RU', 'Russia', 146934000, 6, '2015-05-24 08:21:23', '2015-04-27 02:11:18'),
(10, 'US', 'United States', 278357000, 6, '2015-05-24 08:21:23', '2015-04-27 02:11:18'),
(18, 'SG', 'Singapore', 12345, 6, '2015-05-24 08:21:23', '2015-04-27 02:11:18'),
(19, 'MY', 'Malaysia', 10000000, 6, '2015-05-24 08:21:23', '2015-04-27 02:11:18'),
(20, 'AB', 'Ababab', 1234, NULL, NULL, '2015-06-01 06:48:45'),
(21, 'CD', 'cdcdcd', 223344, 5, NULL, '2015-06-01 06:59:33'),
(22, 'CD', 'cdcdcd', 223344, 5, NULL, '2015-06-01 07:46:59'),
(23, 'CD', 'cdcdcd', 223344, 5, NULL, '2015-06-01 08:57:14'),
(24, 'CD', 'cdcdcd', 223344, 5, NULL, '2015-06-01 09:06:05'),
(25, 'CD', 'cdcdcd', 223344, 5, NULL, '2015-06-01 09:08:20'),
(26, 'CD', 'cdcdcd', 223344, 5, NULL, '2015-06-01 09:20:16'),
(27, 'CD', 'cdcdcd', 223344, 5, NULL, '2015-06-01 09:34:20'),
(28, 'CD', 'cdcdcd', 223344, 5, NULL, '2015-06-01 09:35:18'),
(29, 'CD', 'cdcdcd', 223344, 5, NULL, '2015-06-01 09:37:18'),
(30, 'CD', 'cdcdcd', 223344, 5, NULL, '2015-06-01 09:53:53'),
(31, 'CD', 'cdcdcd', 223344, 5, NULL, '2015-06-01 10:01:27'),
(32, 'CD', 'cd2cd2cd2', 222333, 5, '2015-06-01 10:02:40', '2015-06-01 10:02:40'),
(33, 'CD', 'cd2cd2cd2', 222333, 5, '2015-06-01 10:03:59', '2015-06-01 10:03:59'),
(34, 'CD', 'cd2cd2cd2', 222333, 5, '2015-06-01 10:05:34', '2015-06-01 10:05:34');

-- --------------------------------------------------------

--
-- Table structure for table `equipment`
--

CREATE TABLE IF NOT EXISTS `equipment` (
`id` int(10) unsigned NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `department` varchar(100) DEFAULT NULL,
  `remark` varchar(200) DEFAULT NULL,
  `created` timestamp NULL DEFAULT '0000-00-00 00:00:00',
  `modified` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `equipment`
--

INSERT INTO `equipment` (`id`, `name`, `department`, `remark`, `created`, `modified`) VALUES
(1, 'Mac Mini Set 1', 'ECE', 'For Staff Projects. Total 2 sets', '2015-09-19 07:42:43', '2015-09-19 07:44:24'),
(2, 'Macbook Pro', 'ECE', 'Purchased in 2015', '2015-09-19 07:42:50', '2015-09-19 07:44:39'),
(3, 'iMac Set 1', 'ECE', 'For FYP. Total 3 sets', '2015-09-19 07:44:58', '0000-00-00 00:00:00'),
(4, 'iMac Set 2', 'ECE', 'For FYP. Total 3 sets', '2015-09-19 07:44:59', '2015-09-19 07:45:08'),
(5, 'iMac Set 3', 'ECE', 'For FYP. Total 3 sets', '2015-09-19 07:45:00', '2015-09-19 07:45:16'),
(6, 'iPhone 6s Plus', 'ECE', 'For FYP. Total 5 sets', '2015-09-19 07:47:30', '2015-09-19 07:47:31');

-- --------------------------------------------------------

--
-- Table structure for table `equipmentlocation`
--

CREATE TABLE IF NOT EXISTS `equipmentlocation` (
`id` int(10) unsigned NOT NULL,
  `equipmentId` int(10) unsigned NOT NULL,
  `locationId` int(10) unsigned DEFAULT NULL,
  `latitude` decimal(10,8) DEFAULT NULL,
  `longitude` decimal(11,8) DEFAULT NULL,
  `created` timestamp NULL DEFAULT '0000-00-00 00:00:00',
  `modified` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `equipmentlocation`
--

INSERT INTO `equipmentlocation` (`id`, `equipmentId`, `locationId`, `latitude`, `longitude`, `created`, `modified`) VALUES
(1, 1, 1, NULL, NULL, '2015-09-19 08:39:28', '0000-00-00 00:00:00'),
(2, 1, 2, NULL, NULL, '2015-09-19 08:39:30', '0000-00-00 00:00:00'),
(3, 1, 3, NULL, NULL, '2015-09-19 08:39:33', '0000-00-00 00:00:00'),
(4, 2, 4, NULL, NULL, '2015-09-19 08:39:36', '0000-00-00 00:00:00'),
(5, 2, 5, NULL, NULL, '2015-09-19 08:39:38', '0000-00-00 00:00:00'),
(6, 2, 6, NULL, NULL, '2015-09-19 08:39:46', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `location`
--

CREATE TABLE IF NOT EXISTS `location` (
`id` int(10) unsigned NOT NULL,
  `name` varchar(100) NOT NULL,
  `address` varchar(200) DEFAULT NULL,
  `country` varchar(50) DEFAULT 'Singapore',
  `postal` varchar(10) DEFAULT NULL,
  `latitude` decimal(10,8) DEFAULT NULL,
  `longitude` decimal(11,8) DEFAULT NULL,
  `created` timestamp NULL DEFAULT '0000-00-00 00:00:00',
  `modified` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `location`
--

INSERT INTO `location` (`id`, `name`, `address`, `country`, `postal`, `latitude`, `longitude`, `created`, `modified`) VALUES
(1, 'Alpha Center', '535 Clementi Rd', 'Singapore', '599489', NULL, NULL, '2015-09-19 07:23:09', '2015-09-19 07:26:26'),
(2, 'BME Center', '535 Clementi Rd', 'Singapore', '599489', NULL, NULL, '2015-09-19 07:23:09', '2015-09-19 07:26:30'),
(3, 'AE Center', '535 Clementi Rd', 'Singapore', '599489', NULL, NULL, '2015-09-19 07:23:09', '2015-09-19 07:26:43'),
(4, 'DSP Center', '535 Clementi Rd', 'Singapore', '599489', NULL, NULL, '2015-09-19 07:23:09', '2015-09-19 07:26:46'),
(5, 'Embedded Center', '535 Clementi Rd', 'Singapore', '599489', NULL, NULL, '2015-09-19 07:23:09', '2015-09-19 07:26:50'),
(6, 'NSS Center', '535 Clementi Rd', 'Singapore', '599489', NULL, NULL, '2015-09-19 07:23:09', '2015-09-19 07:26:56'),
(7, 'Iconic Lab', '535 Clementi Rd', 'Singapore', '599489', NULL, NULL, '2015-09-19 07:23:09', '0000-00-00 00:00:00'),
(8, 'General Office', '535 Clementi Rd', 'Singapore', '599489', '1.33470300', '103.77646600', '2015-09-19 07:40:22', '2015-09-19 07:43:38'),
(9, 'IT Center', '535 Clementi Rd', 'Singapore', '599489', '1.33470300', '103.77646600', '2015-09-19 07:43:16', '2015-09-19 07:43:40');

-- --------------------------------------------------------

--
-- Table structure for table `project`
--

CREATE TABLE IF NOT EXISTS `project` (
`id` int(10) unsigned NOT NULL,
  `label` varchar(100) NOT NULL DEFAULT '',
  `remark` varchar(200) DEFAULT NULL,
  `serial` char(32) DEFAULT NULL COMMENT 'autogenerated, uniquely identify a project',
  `status` int(5) unsigned DEFAULT NULL,
  `userId` int(10) unsigned DEFAULT NULL,
  `created` timestamp NULL DEFAULT '0000-00-00 00:00:00',
  `modified` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `project`
--

INSERT INTO `project` (`id`, `label`, `remark`, `serial`, `status`, `userId`, `created`, `modified`) VALUES
(1, 'Canteen Crowd Monitoring System', 'Under this projects, cameras in the campus canteens provides information about current crowd in the canteens.', NULL, 1, 1, '2014-07-23 15:22:50', '2015-09-17 09:35:43');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
`id` int(10) unsigned NOT NULL,
  `username` varchar(255) NOT NULL,
  `auth_key` varchar(32) DEFAULT '',
  `password_hash` varchar(255) DEFAULT '',
  `access_token` varchar(32) DEFAULT NULL,
  `password_reset_token` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT '',
  `email_confirm_token` varchar(255) DEFAULT NULL,
  `role` int(10) unsigned DEFAULT '10',
  `status` smallint(6) DEFAULT '10',
  `allowance` int(10) unsigned DEFAULT NULL,
  `timestamp` int(10) unsigned DEFAULT NULL,
  `created_at` int(10) unsigned DEFAULT NULL,
  `updated_at` int(10) unsigned DEFAULT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `auth_key`, `password_hash`, `access_token`, `password_reset_token`, `email`, `email_confirm_token`, `role`, `status`, `allowance`, `timestamp`, `created_at`, `updated_at`) VALUES
(1, 'master', 'auth-key-test-admin', '$2y$10$vsK92gjucpYK7MP.6w9Pk.N01/uH.EPaHHwnVYEAcSCjNruZ/YTPK', 'abcd1234', NULL, 'zqi2@np.edu.sg', NULL, 40, 10, NULL, NULL, 0, 0),
(2, 'admin', 'auth-key-test-admin', '$2y$10$vsK92gjucpYK7MP.6w9Pk.N01/uH.EPaHHwnVYEAcSCjNruZ/YTPK', 'abcd1234', NULL, 'zqi2@np.edu.sg', NULL, 30, 10, NULL, NULL, 0, 0),
(3, 'manager1', 'auth-key-test-admin', '$2y$10$vsK92gjucpYK7MP.6w9Pk.N01/uH.EPaHHwnVYEAcSCjNruZ/YTPK', 'abcd1234', NULL, 'zqi2@np.edu.sg', NULL, 20, 10, 299, 1434595828, 0, 0),
(4, 'manager2', 'auth-key-test-admin', '$2y$10$vsK92gjucpYK7MP.6w9Pk.N01/uH.EPaHHwnVYEAcSCjNruZ/YTPK', 'abcd1234', NULL, 'zqi2@np.edu.sg', NULL, 20, 10, 299, 1432481401, 0, 0),
(5, 'user1', 'auth-key-test-admin', '$2y$10$vsK92gjucpYK7MP.6w9Pk.N01/uH.EPaHHwnVYEAcSCjNruZ/YTPK', 'abcd1234', NULL, 'zqi2@np.edu.sg', NULL, 10, 10, 298, 1442652314, 0, 0),
(6, 'user2', 'auth-key-test-admin', '$2y$10$vsK92gjucpYK7MP.6w9Pk.N01/uH.EPaHHwnVYEAcSCjNruZ/YTPK', 'abcd1234', NULL, 'zqi2@np.edu.sg', NULL, 10, 10, 299, 1432560400, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `usertoken`
--

CREATE TABLE IF NOT EXISTS `usertoken` (
`id` int(10) unsigned NOT NULL,
  `userId` int(10) unsigned NOT NULL,
  `token` varchar(32) NOT NULL DEFAULT '',
  `label` varchar(10) DEFAULT NULL,
  `ipAddress` varchar(32) DEFAULT NULL,
  `expire` timestamp NULL DEFAULT '0000-00-00 00:00:00',
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=48 ;

--
-- Dumping data for table `usertoken`
--

INSERT INTO `usertoken` (`id`, `userId`, `token`, `label`, `ipAddress`, `expire`, `created`) VALUES
(35, 4, 'b1eca42adda9abd921194cdc83424f8f', 'ACCESS', '::1', '2015-02-19 15:11:59', '2015-01-20 15:11:59'),
(44, 6, 'e67f2a8eca0bf67e9453014da1c1b210', 'VERIFY', '::1', '2015-06-09 03:48:18', '2015-05-10 09:48:18'),
(47, 1, '5f835c19a8a634b49c459aba571759c9', 'ACCESS', '::1', '2015-02-20 08:52:28', '2015-01-21 08:52:28');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `beacon`
--
ALTER TABLE `beacon`
 ADD PRIMARY KEY (`id`), ADD KEY `locationId` (`locationId`), ADD KEY `equipmentId` (`equipmentId`);

--
-- Indexes for table `country`
--
ALTER TABLE `country`
 ADD PRIMARY KEY (`id`), ADD KEY `userId` (`userId`);

--
-- Indexes for table `equipment`
--
ALTER TABLE `equipment`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `equipmentlocation`
--
ALTER TABLE `equipmentlocation`
 ADD PRIMARY KEY (`id`), ADD KEY `equipmentId` (`equipmentId`), ADD KEY `locationId` (`locationId`);

--
-- Indexes for table `location`
--
ALTER TABLE `location`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `project`
--
ALTER TABLE `project`
 ADD PRIMARY KEY (`id`), ADD KEY `ownerId` (`userId`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `usertoken`
--
ALTER TABLE `usertoken`
 ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `token` (`token`), ADD KEY `userId` (`userId`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `beacon`
--
ALTER TABLE `beacon`
MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `country`
--
ALTER TABLE `country`
MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=35;
--
-- AUTO_INCREMENT for table `equipment`
--
ALTER TABLE `equipment`
MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `equipmentlocation`
--
ALTER TABLE `equipmentlocation`
MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `location`
--
ALTER TABLE `location`
MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `project`
--
ALTER TABLE `project`
MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `usertoken`
--
ALTER TABLE `usertoken`
MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=48;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `beacon`
--
ALTER TABLE `beacon`
ADD CONSTRAINT `beacon_ibfk_1` FOREIGN KEY (`locationId`) REFERENCES `location` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
ADD CONSTRAINT `beacon_ibfk_2` FOREIGN KEY (`equipmentId`) REFERENCES `equipment` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `country`
--
ALTER TABLE `country`
ADD CONSTRAINT `country_ibfk_1` FOREIGN KEY (`userId`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `equipmentlocation`
--
ALTER TABLE `equipmentlocation`
ADD CONSTRAINT `equipmentlocation_ibfk_1` FOREIGN KEY (`equipmentId`) REFERENCES `equipment` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
ADD CONSTRAINT `equipmentlocation_ibfk_2` FOREIGN KEY (`locationId`) REFERENCES `location` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `project`
--
ALTER TABLE `project`
ADD CONSTRAINT `project_ibfk_1` FOREIGN KEY (`userId`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `usertoken`
--
ALTER TABLE `usertoken`
ADD CONSTRAINT `usertoken_ibfk_1` FOREIGN KEY (`userId`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
