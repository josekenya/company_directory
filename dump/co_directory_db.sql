-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Apr 29, 2015 at 03:02 PM
-- Server version: 5.6.21
-- PHP Version: 5.5.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `co_directory_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `company_details`
--

CREATE TABLE IF NOT EXISTS `company_details` (
`company_id` int(11) NOT NULL,
  `owner_id` int(11) NOT NULL,
  `company_name` varchar(255) NOT NULL,
  `company_profile` text,
  `company_logo` varchar(255) DEFAULT NULL,
  `company_email` varchar(255) DEFAULT NULL,
  `company_mobile_number` varchar(255) DEFAULT NULL,
  `company_telephone_number` varchar(255) DEFAULT NULL,
  `street_address` varchar(255) DEFAULT NULL,
  `city` varchar(255) DEFAULT NULL,
  `country` varchar(255) DEFAULT NULL,
  `street_address_2` varchar(255) DEFAULT NULL,
  `zip_code` varchar(255) DEFAULT NULL,
  `state_province` varchar(255) DEFAULT NULL,
  `employee_number` varchar(255) DEFAULT NULL,
  `opening` varchar(255) DEFAULT NULL,
  `closing` varchar(255) DEFAULT NULL,
  `w_opening` varchar(255) DEFAULT NULL,
  `w_closing` varchar(255) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `company_details`
--

INSERT INTO `company_details` (`company_id`, `owner_id`, `company_name`, `company_profile`, `company_logo`, `company_email`, `company_mobile_number`, `company_telephone_number`, `street_address`, `city`, `country`, `street_address_2`, `zip_code`, `state_province`, `employee_number`, `opening`, `closing`, `w_opening`, `w_closing`) VALUES
(10, 5, 'julius ltd', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(11, 5, 'jose ltd', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `company_photos`
--

CREATE TABLE IF NOT EXISTS `company_photos` (
`id` int(11) NOT NULL,
  `photo_url` varchar(11) NOT NULL,
  `company_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `company_services`
--

CREATE TABLE IF NOT EXISTS `company_services` (
`id` int(11) NOT NULL,
  `service` varchar(255) NOT NULL,
  `company_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `groups`
--

CREATE TABLE IF NOT EXISTS `groups` (
`id` mediumint(8) unsigned NOT NULL,
  `name` varchar(20) NOT NULL,
  `description` varchar(100) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `groups`
--

INSERT INTO `groups` (`id`, `name`, `description`) VALUES
(1, 'admin', 'Administrator'),
(2, 'members', 'General User');

-- --------------------------------------------------------

--
-- Table structure for table `login_attempts`
--

CREATE TABLE IF NOT EXISTS `login_attempts` (
`id` int(11) unsigned NOT NULL,
  `ip_address` varchar(15) NOT NULL,
  `login` varchar(100) NOT NULL,
  `time` int(11) unsigned DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE IF NOT EXISTS `messages` (
`message_id` int(11) NOT NULL,
  `company_id` int(11) NOT NULL,
  `message` text NOT NULL,
  `sender` varchar(255) NOT NULL,
  `unread` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `templates`
--

CREATE TABLE IF NOT EXISTS `templates` (
`template_id` int(11) NOT NULL,
  `template_name` varchar(255) NOT NULL,
  `template_url` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
`id` int(11) unsigned NOT NULL,
  `ip_address` varchar(15) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `salt` varchar(255) DEFAULT NULL,
  `email` varchar(100) NOT NULL,
  `activation_code` varchar(40) DEFAULT NULL,
  `forgotten_password_code` varchar(40) DEFAULT NULL,
  `forgotten_password_time` int(11) unsigned DEFAULT NULL,
  `remember_code` varchar(40) DEFAULT NULL,
  `created_on` int(11) unsigned NOT NULL,
  `last_login` int(11) unsigned DEFAULT NULL,
  `active` tinyint(1) unsigned DEFAULT NULL,
  `first_name` varchar(50) DEFAULT NULL,
  `last_name` varchar(50) DEFAULT NULL,
  `company` varchar(100) DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `ip_address`, `username`, `password`, `salt`, `email`, `activation_code`, `forgotten_password_code`, `forgotten_password_time`, `remember_code`, `created_on`, `last_login`, `active`, `first_name`, `last_name`, `company`, `phone`) VALUES
(1, '127.0.0.1', 'administrator', '$2a$07$SeBknntpZror9uyftVopmu61qg0ms8Qv1yV6FG.kQOSM.9QhmTo36', '', 'admin@admin.com', '', NULL, NULL, 'MOWpMUUZJ1icFXHn/2n0PO', 1268889823, 1430067888, 1, 'Admin', 'istrator', 'ADMIN', '0'),
(5, '::1', 'joseph mboya', '$2y$08$Tt0H2sN83byWbl4f/4Hj5eOCqn1xWkkvjwOAKUfJIJm3Q6DkGmE/m', NULL, 'josephmboya6@gmail.com', NULL, NULL, NULL, 'CYVf8yk8QRrsu.ZcCh1eZe', 1430042890, 1430312025, 1, 'joseph', 'mboya', NULL, '0715053212'),
(6, '::1', 'kelvin king', '$2y$08$UmpTlkKNUCIjaLH8nbxSheTlgD/jb9zDJRKfN3955yoS.vLQUJWme', NULL, 'kelvin@gmail.com', NULL, NULL, NULL, NULL, 1430043517, NULL, 1, 'kelvin', 'king', NULL, '07234566772');

-- --------------------------------------------------------

--
-- Table structure for table `users_groups`
--

CREATE TABLE IF NOT EXISTS `users_groups` (
`id` int(11) unsigned NOT NULL,
  `user_id` int(11) unsigned NOT NULL,
  `group_id` mediumint(8) unsigned NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users_groups`
--

INSERT INTO `users_groups` (`id`, `user_id`, `group_id`) VALUES
(1, 1, 1),
(2, 1, 2),
(6, 5, 2),
(7, 6, 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `company_details`
--
ALTER TABLE `company_details`
 ADD PRIMARY KEY (`company_id`);

--
-- Indexes for table `company_photos`
--
ALTER TABLE `company_photos`
 ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `company_id_3` (`company_id`), ADD KEY `company_id` (`company_id`), ADD KEY `company_id_2` (`company_id`);

--
-- Indexes for table `company_services`
--
ALTER TABLE `company_services`
 ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `company_id` (`company_id`), ADD KEY `company_id_2` (`company_id`);

--
-- Indexes for table `groups`
--
ALTER TABLE `groups`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `login_attempts`
--
ALTER TABLE `login_attempts`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
 ADD PRIMARY KEY (`message_id`), ADD UNIQUE KEY `company_id` (`company_id`);

--
-- Indexes for table `templates`
--
ALTER TABLE `templates`
 ADD PRIMARY KEY (`template_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users_groups`
--
ALTER TABLE `users_groups`
 ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `uc_users_groups` (`user_id`,`group_id`), ADD KEY `fk_users_groups_users1_idx` (`user_id`), ADD KEY `fk_users_groups_groups1_idx` (`group_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `company_details`
--
ALTER TABLE `company_details`
MODIFY `company_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `company_photos`
--
ALTER TABLE `company_photos`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `company_services`
--
ALTER TABLE `company_services`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `groups`
--
ALTER TABLE `groups`
MODIFY `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `login_attempts`
--
ALTER TABLE `login_attempts`
MODIFY `id` int(11) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
MODIFY `message_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `templates`
--
ALTER TABLE `templates`
MODIFY `template_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
MODIFY `id` int(11) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `users_groups`
--
ALTER TABLE `users_groups`
MODIFY `id` int(11) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `company_photos`
--
ALTER TABLE `company_photos`
ADD CONSTRAINT `company_photos_ibfk_1` FOREIGN KEY (`company_id`) REFERENCES `company_details` (`company_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `company_services`
--
ALTER TABLE `company_services`
ADD CONSTRAINT `company_services_ibfk_1` FOREIGN KEY (`company_id`) REFERENCES `company_details` (`company_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `messages`
--
ALTER TABLE `messages`
ADD CONSTRAINT `messages_ibfk_1` FOREIGN KEY (`company_id`) REFERENCES `company_details` (`company_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `users_groups`
--
ALTER TABLE `users_groups`
ADD CONSTRAINT `fk_users_groups_groups1` FOREIGN KEY (`group_id`) REFERENCES `groups` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION,
ADD CONSTRAINT `fk_users_groups_users1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
