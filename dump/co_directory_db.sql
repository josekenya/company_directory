-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: May 15, 2015 at 07:57 PM
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
-- Table structure for table `company_information`
--

CREATE TABLE IF NOT EXISTS `company_information` (
`id` int(11) NOT NULL,
  `c_name` text NOT NULL,
  `uri` varchar(255) NOT NULL,
  `c_ind_cat` varchar(200) NOT NULL,
  `c_logo` varchar(200) DEFAULT NULL,
  `c_prof` text NOT NULL,
  `c_owner_id` int(11) NOT NULL,
  `c_mobile` varchar(200) NOT NULL,
  `c_tel` varchar(200) NOT NULL,
  `c_email` varchar(200) NOT NULL,
  `c_address_1` varchar(200) NOT NULL,
  `c_address_2` varchar(200) NOT NULL,
  `c_city` varchar(200) NOT NULL,
  `c_country` varchar(200) NOT NULL,
  `c_zip` mediumint(9) NOT NULL,
  `c_state` varchar(200) NOT NULL,
  `c_emp_no` int(11) NOT NULL,
  `c_w_opening` varchar(200) NOT NULL,
  `c_w_closing` varchar(200) NOT NULL,
  `c_we_opening` varchar(200) NOT NULL,
  `c_we_closing` varchar(200) NOT NULL,
  `c_template` varchar(200) NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=23 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `company_information`
--

INSERT INTO `company_information` (`id`, `c_name`, `uri`, `c_ind_cat`, `c_logo`, `c_prof`, `c_owner_id`, `c_mobile`, `c_tel`, `c_email`, `c_address_1`, `c_address_2`, `c_city`, `c_country`, `c_zip`, `c_state`, `c_emp_no`, `c_w_opening`, `c_w_closing`, `c_we_opening`, `c_we_closing`, `c_template`) VALUES
(13, 'Jasr Ltd', 'jasr-ltd', 'technology', 'YRztgX2S2.jpeg', '<p>Jasr Ltd Company is a great thing</p>\r\n', 5, '', '', '', 'random', '', 'kisumu', 'kenya', 20134, '', 0, '', '', '', '', 'basic'),
(14, 'Pare Ltd', 'pare-ltd', 'ent', NULL, '                                            <p>Pare was established in 1923 as part of a chain of small scale businesses.</p>\r\n                                        ', 5, '0723456865', '0278346784', 'pare@gmails.com', 'random', '', 'Nairobi', 'Kenya', 0, '', 0, '', '', '', '', 'basic'),
(15, 'zari ltd', 'zari-ltd', '', NULL, '', 5, '', '', '', '', '', '', '', 0, '', 0, '', '', '', '', ''),
(16, 'Pore ltd', 'pore-ltd', '', NULL, '', 5, '', '', '', '', '', '', '', 0, '', 0, '', '', '', '', ''),
(17, 'Koza Ltd', 'koza-ltd', '', NULL, '', 5, '', '', '', '', '', '', '', 0, '', 0, '', '', '', '', ''),
(18, 'Hoof Ltd', 'hoof-ltd', '', NULL, '', 5, '', '', '', '', '', '', '', 0, '', 0, '', '', '', '', ''),
(19, 'Pazo ltd', 'pazo-ltd', '', NULL, '', 5, '', '', '', '', '', '', '', 0, '', 0, '', '', '', '', ''),
(20, 'Kafo ltd', 'kafo-ltd', '', NULL, '', 5, '', '', '', '', '', '', '', 0, '', 0, '', '', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `company_photos`
--

CREATE TABLE IF NOT EXISTS `company_photos` (
`id` int(11) NOT NULL,
  `photo_url` varchar(255) NOT NULL,
  `company_id` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `company_photos`
--

INSERT INTO `company_photos` (`id`, `photo_url`, `company_id`) VALUES
(1, 'cap12.PNG', 20),
(2, 'Capture4.PNG', 20);

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
  `message` varchar(255) NOT NULL,
  `company_id` int(11) NOT NULL,
  `unread` int(11) DEFAULT NULL,
  `read` int(11) DEFAULT NULL,
  `sender` varchar(255) NOT NULL,
  `duration` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `services`
--

CREATE TABLE IF NOT EXISTS `services` (
`service_id` int(11) NOT NULL,
  `service_name` varchar(255) NOT NULL,
  `company_id` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=84 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `services`
--

INSERT INTO `services` (`service_id`, `service_name`, `company_id`) VALUES
(22, 'caej', 12),
(23, 'prive', 12),
(24, 'jnjkkjk ', 12),
(25, 'bbnbnm', 12),
(79, 'kyi', 15),
(80, 'hfg', 15),
(81, 'Processing', 20),
(82, 'Manufacturing', 20),
(83, 'Service 1', 1);

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
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `ip_address`, `username`, `password`, `salt`, `email`, `activation_code`, `forgotten_password_code`, `forgotten_password_time`, `remember_code`, `created_on`, `last_login`, `active`, `first_name`, `last_name`, `company`, `phone`) VALUES
(1, '127.0.0.1', 'administrator', '$2a$07$SeBknntpZror9uyftVopmu61qg0ms8Qv1yV6FG.kQOSM.9QhmTo36', '', 'admin@admin.com', '', NULL, NULL, 'MOWpMUUZJ1icFXHn/2n0PO', 1268889823, 1430067888, 1, 'Admin', 'istrator', 'ADMIN', '0'),
(5, '::1', 'joseph mboya', '$2y$08$Tt0H2sN83byWbl4f/4Hj5eOCqn1xWkkvjwOAKUfJIJm3Q6DkGmE/m', NULL, 'josephmboya6@gmail.com', NULL, NULL, NULL, 'mPN/ZemIpA07dCwerV6n9e', 1430042890, 1431693206, 1, 'joseph', 'wambua', NULL, '0715053212'),
(6, '::1', 'kelvin king', '$2y$08$UmpTlkKNUCIjaLH8nbxSheTlgD/jb9zDJRKfN3955yoS.vLQUJWme', NULL, 'kelvin@gmail.com', NULL, NULL, NULL, NULL, 1430043517, NULL, 1, 'kelvin', 'king', NULL, '07234566772'),
(7, '::1', 'mark masa', '$2y$08$Lsvow7vQtjZRQngin4X5gOKgx.G8cuc1QpCi7ILrWiBLuX0Yz7PsK', NULL, 'masa@gmail.com', NULL, NULL, NULL, NULL, 1430938998, NULL, 1, 'Mark', 'Masa', NULL, '0765212234');

-- --------------------------------------------------------

--
-- Table structure for table `users_groups`
--

CREATE TABLE IF NOT EXISTS `users_groups` (
`id` int(11) unsigned NOT NULL,
  `user_id` int(11) unsigned NOT NULL,
  `group_id` mediumint(8) unsigned NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users_groups`
--

INSERT INTO `users_groups` (`id`, `user_id`, `group_id`) VALUES
(1, 1, 1),
(2, 1, 2),
(6, 5, 2),
(7, 6, 2),
(8, 7, 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `company_information`
--
ALTER TABLE `company_information`
 ADD PRIMARY KEY (`id`), ADD FULLTEXT KEY `c_prof` (`c_prof`), ADD FULLTEXT KEY `c_name` (`c_name`), ADD FULLTEXT KEY `c_ind_cat` (`c_ind_cat`), ADD FULLTEXT KEY `c_city` (`c_city`);

--
-- Indexes for table `company_photos`
--
ALTER TABLE `company_photos`
 ADD PRIMARY KEY (`id`);

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
 ADD PRIMARY KEY (`message_id`);

--
-- Indexes for table `services`
--
ALTER TABLE `services`
 ADD PRIMARY KEY (`service_id`);

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
-- AUTO_INCREMENT for table `company_information`
--
ALTER TABLE `company_information`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=23;
--
-- AUTO_INCREMENT for table `company_photos`
--
ALTER TABLE `company_photos`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
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
-- AUTO_INCREMENT for table `services`
--
ALTER TABLE `services`
MODIFY `service_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=84;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
MODIFY `id` int(11) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `users_groups`
--
ALTER TABLE `users_groups`
MODIFY `id` int(11) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=9;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `users_groups`
--
ALTER TABLE `users_groups`
ADD CONSTRAINT `fk_users_groups_groups1` FOREIGN KEY (`group_id`) REFERENCES `groups` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION,
ADD CONSTRAINT `fk_users_groups_users1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
