-- phpMyAdmin SQL Dump
-- version 3.3.9
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Oct 06, 2015 at 02:12 PM
-- Server version: 5.5.8
-- PHP Version: 5.3.5

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `elspress`
--

-- --------------------------------------------------------

--
-- Table structure for table `ep_menu`
--

CREATE TABLE IF NOT EXISTS `ep_menu` (
  `ID` bigint(20) NOT NULL AUTO_INCREMENT,
  `menu_cat_id` bigint(20) NOT NULL,
  `menu_cat_name` varchar(200) NOT NULL,
  `menu_name` varchar(200) NOT NULL,
  `menu_parent` bigint(20) NOT NULL,
  `menu_url` varchar(200) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `ep_menu`
--

INSERT INTO `ep_menu` (`ID`, `menu_cat_id`, `menu_cat_name`, `menu_name`, `menu_parent`, `menu_url`) VALUES
(1, 1, 'Header Menu', 'HTML', 0, '#'),
(2, 1, 'Header Menu', 'CSS', 0, '#'),
(3, 1, 'Header Menu', 'Body', 1, 'http://www.google.com'),
(4, 1, 'Header Menu', 'Color', 3, '#'),
(5, 1, 'Header Menu', 'Style', 2, 'http://www.facebook.com'),
(6, 1, 'Header Menu', 'Pink', 4, 'http://www.color.com'),
(7, 1, 'Header Menu', 'About', 0, 'http://www.about.com'),
(8, 1, 'Header Menu', 'Contact', 0, 'http://www.contact.com');

-- --------------------------------------------------------

--
-- Table structure for table `ep_posts`
--

CREATE TABLE IF NOT EXISTS `ep_posts` (
  `ID` bigint(20) NOT NULL AUTO_INCREMENT,
  `post_author` varchar(100) CHARACTER SET latin1 NOT NULL,
  `post_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `post_content` longtext COLLATE utf8_unicode_ci NOT NULL,
  `post_title` text COLLATE utf8_unicode_ci NOT NULL,
  `post_excerpt` text COLLATE utf8_unicode_ci NOT NULL,
  `post_categories` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `post_tag` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `post_status` varchar(20) CHARACTER SET latin1 NOT NULL,
  `comment_status` varchar(20) CHARACTER SET latin1 NOT NULL,
  `post_permalink` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `post_modified` date NOT NULL,
  `post_parent` bigint(20) NOT NULL,
  `menu_order` int(11) NOT NULL,
  `comment_count` bigint(20) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=9 ;

--
-- Dumping data for table `ep_posts`
--

INSERT INTO `ep_posts` (`ID`, `post_author`, `post_date`, `post_content`, `post_title`, `post_excerpt`, `post_categories`, `post_tag`, `post_status`, `comment_status`, `post_permalink`, `post_modified`, `post_parent`, `menu_order`, `comment_count`) VALUES
(6, 'Admin', '2015-09-01 12:17:18', '<p>The envisaged economic zone is located in Gazaria, within two mouzas (Bausia and Jajira) of Gazaria upazilla under Munshiganj, covering almost 216 acres (with option for expansion up to 300+ acres) of exclusively owned land. The area is popularly known as Daudkandi.</p>\r\n<p>The envisaged economic zone is located in Gazaria, within two mouzas (Bausia and Jajira) of Gazaria upazilla under Munshiganj, covering almost 216 acres (with option for expansion up to 300+ acres) of exclusively owned land. The area is popularly known as Daudkandi.</p>\r\n<p>The envisaged economic zone is located in Gazaria, within two mouzas (Bausia and Jajira) of Gazaria upazilla under Munshiganj, covering almost 216 acres (with option for expansion up to 300+ acres) of exclusively owned land. The area is popularly known as Daudkandi.</p>', 'ABDUL MONEM ECONOMIC ZONE (AMEZ)', 'The envisaged economic zone is located in Gazaria, within two mouzas (Bausia and Jajira) of Gazaria upazilla under Munshiganj', 'blog', 'news', 'publish', '', 'ABDUL-MONEM-ECONOMIC-ZONE-(AMEZ)', '2015-09-10', 8, 3, 0),
(7, 'Admin', '2015-09-01 12:27:30', '<p>AMEZ promises to provide a host of facilities and amenities to its potential tenants and other stakeholders by achieving the following critical objectives:</p>\r\n<p>AMEZ promises to provide a host of facilities and amenities to its potential tenants and other stakeholders by achieving the following critical objectives:</p>\r\n<p>AMEZ promises to provide a host of facilities and amenities to its potential tenants and other stakeholders by achieving the following critical objectives:</p>\r\n<p>AMEZ promises to provide a host of facilities and amenities to its potential tenants and other stakeholders by achieving the following critical objectives:</p>', 'Objectives of AMEZ', 'AMEZ promises to provide a host of facilities and amenities to its potential tenants and other stakeholders by achieving the following critical objectives:', 'blog', 'blog,news', 'publish', '', 'Objectives-of-AMEZ', '2015-09-08', 6, 4, 0),
(8, 'Admin', '2015-09-08 18:53:13', '<p>আন্তর্জাতিক বাজারে দরপতনের কারণে দেশের বাজারে সোনার দর ভরিতে এক হাজার ৫০ টাকা পর্যন্ত কমিয়েছে বাংলাদেশ জুয়েলার্স সমিতি (বাজুস)। আগামীকাল বুধবার থেকে সারা দেশে নতুন এই দর কার্যকর হবে।</p>\r\n<p>আজ মঙ্গলবার এক সংবাদ বিজ্ঞপ্তি দিয়ে দাম কমানোর বিষয়টি জানিয়েছে জুয়েলার্স সমিতি।<br />নতুন দর অনুযায়ী কাল থেকে প্রতি ভরি (১১.৬৬৪ গ্রাম) ভালো মানের অর্থাৎ ২২ ক্যারেট সোনা ৪২ হাজার ২২৩ টাকা দরে বিক্রি হবে। এ ছাড়া ২১ ক্যারেট ৪০ হাজার ১২৪ টাকা এবং ১৮ ক্যারেটের দাম কমে হচ্ছে ৩৩ হাজার ৪৭৫ টাকা। সনাতন পদ্ধতির সোনার ভরি ২২ হাজার ৫৬৯ টাকা। আর ২১ ক্যারেট (ক্যাডমিয়াম) রুপার ভরি দাঁড়াচ্ছে ৯৩৩ টাকা।</p>', 'আবার কমল সোনার দাম', 'আন্তর্জাতিক বাজারে দরপতনের কারণে দেশের বাজারে সোনার দর ভরিতে এক হাজার ৫০ টাকা পর্যন্ত কমিয়েছে বাংলাদেশ জুয়েলার্স সমিতি (বাজুস)। আগামীকাল বুধবার থেকে সারা দেশে নতুন এই দর কার্যকর হবে।', 'html', 'html', 'publish', '', 'আবার-কমল-সোনার-দাম', '2015-09-08', 1, 10, 0);

-- --------------------------------------------------------

--
-- Table structure for table `ep_post_category`
--

CREATE TABLE IF NOT EXISTS `ep_post_category` (
  `ID` bigint(20) NOT NULL AUTO_INCREMENT,
  `cat_name` varchar(100) NOT NULL,
  `cat_permalink` varchar(150) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=14 ;

--
-- Dumping data for table `ep_post_category`
--

INSERT INTO `ep_post_category` (`ID`, `cat_name`, `cat_permalink`) VALUES
(1, 'Blog', 'blog'),
(2, 'HTML', 'html'),
(3, 'CSS', 'css'),
(4, 'PHP', 'php'),
(5, 'ASP', 'asp'),
(6, 'Java', 'java'),
(7, 'Flash Video', 'flash-category');

-- --------------------------------------------------------

--
-- Table structure for table `ep_post_tag`
--

CREATE TABLE IF NOT EXISTS `ep_post_tag` (
  `ID` bigint(20) NOT NULL AUTO_INCREMENT,
  `tag_name` varchar(100) NOT NULL,
  `tag_permalink` varchar(150) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `ep_post_tag`
--

INSERT INTO `ep_post_tag` (`ID`, `tag_name`, `tag_permalink`) VALUES
(1, 'Blog', 'blog'),
(2, 'Photos', 'photos'),
(3, 'News', 'news'),
(4, 'WordPress', 'wordpress'),
(5, 'HTML', 'html');

-- --------------------------------------------------------

--
-- Table structure for table `ep_users`
--

CREATE TABLE IF NOT EXISTS `ep_users` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `user_name` varchar(200) NOT NULL,
  `user_pass` varchar(200) NOT NULL,
  `user_nicename` varchar(200) NOT NULL,
  `user_email` varchar(200) NOT NULL,
  `user_url` varchar(200) NOT NULL,
  `user_registered` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `user_activation_key` varchar(200) NOT NULL,
  `user_status` tinyint(4) NOT NULL DEFAULT '0',
  `display_name` varchar(200) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `ep_users`
--

INSERT INTO `ep_users` (`ID`, `user_name`, `user_pass`, `user_nicename`, `user_email`, `user_url`, `user_registered`, `user_activation_key`, `user_status`, `display_name`) VALUES
(1, 'admin', 'e10adc3949ba59abbe56e057f20f883e', 'owner', 'admin@elspress.com', '', '2015-07-30 15:43:53', '', 1, 'Admin');
