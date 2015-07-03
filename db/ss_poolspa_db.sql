-- phpMyAdmin SQL Dump
-- version 3.1.3.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jun 30, 2015 at 09:24 AM
-- Server version: 5.1.33
-- PHP Version: 5.2.9-2

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `ss_poolspa_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `ss_restart_system_log`
--

CREATE TABLE IF NOT EXISTS `ss_restart_system_log` (
  `sr_id` int(11) NOT NULL AUTO_INCREMENT,
  `sr_restart_time` datetime NOT NULL,
  `status` varchar(255) NOT NULL,
  PRIMARY KEY (`sr_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `ss_restart_system_log`
--


-- --------------------------------------------------------

--
-- Table structure for table `ss_tbl_system_log`
--

CREATE TABLE IF NOT EXISTS `ss_tbl_system_log` (
  `sps_id` int(11) NOT NULL AUTO_INCREMENT,
  `sps_flag` int(11) NOT NULL,
  `sps_updated_time` datetime NOT NULL,
  `sps_off_time` datetime NOT NULL,
  PRIMARY KEY (`sps_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 ;

--
-- Dumping data for table `ss_tbl_system_log`
--

