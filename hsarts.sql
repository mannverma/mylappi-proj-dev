-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Aug 09, 2015 at 12:23 PM
-- Server version: 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `hsarts`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
  `id` int(20) NOT NULL AUTO_INCREMENT,
  `username` varchar(250) NOT NULL,
  `password` varchar(250) NOT NULL,
  `status` int(2) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`, `status`) VALUES
(1, 'admin', 'e10adc3949ba59abbe56e057f20f883e', 0);

-- --------------------------------------------------------

--
-- Table structure for table `album_add`
--

CREATE TABLE IF NOT EXISTS `album_add` (
  `album_id` int(10) NOT NULL AUTO_INCREMENT,
  `album_name` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`album_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE IF NOT EXISTS `category` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` text COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=9 ;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `name`) VALUES
(1, 'Magnetic Chess Board'),
(2, 'Folding Chess Board'),
(3, 'Bone Sets'),
(4, 'Burning Sets'),
(5, 'Handcrafted'),
(6, 'Lotus Sets'),
(7, 'Artistic Sets'),
(8, 'Flat Chess Board');

-- --------------------------------------------------------

--
-- Table structure for table `pages`
--

CREATE TABLE IF NOT EXISTS `pages` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `page_name` text NOT NULL,
  `description` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `pages`
--

INSERT INTO `pages` (`id`, `page_name`, `description`) VALUES
(1, 'homepage', '<p style="text-align: justify;">Welcome to the world of finest and exclusive quality work of wooden chess products, which includes the widest range of impressive artistic designs and remarkable customer services at the most genuine prices.<br />With an experience of more than 40 years, &rdquo;H S ARTS &rdquo; (India) International, established in 1973, has made itself a successful leader in manufacturing and exporting the most fabulous chess sets across the globe. We expertise in manufacturing Wooden, Staunton, Bone, Magnetic and Travel chess sets.<br />With numerous skilled technicians and trained artisans, we are capable of making creative and imaginative designs for our customers according to their needs. </p>'),
(2, 'aboutus', '<p>Welcome to the world of finest and exclusive quality work of wooden chess products, which includes the widest range of impressive artistic designs and remarkable customer services at the most genuine prices.<br />With an experience of more than 40 years, &rdquo;H S ARTS &rdquo; (India) International, established in 1973, has made itself a successful leader in manufacturing and exporting the most fabulous chess sets across the globe. We expertise in manufacturing Wooden, Staunton, Bone, Magnetic and Travel chess sets.<br />With numerous skilled technicians and trained artisans, we are capable of making creative and imaginative designs for our customers according to their needs. All sorts of buyers from countries like UK, Singapore, London, USA and Australia prefer us and trust us again and again only because of the incomparable designs, robust product packing and on-time delivery services. <br />With his intense passion for work, Mr. Harjeet Singh Klair, the proud owner and Managing Director of the firm has made this company to flourish beyond the limits of success. His hard work along with his charming personality has built up long lasting customer relationships.<br />Customer satisfaction has always been our first priority and our incredible services have paid us a reputed image across the world.<br />After accomplishing the milestone of becoming the most trustworthy Chess Manufacturer and Exporter in Amritsar (Punjab, India), we now aim to expand endlessly to discover new horizons in the Industry with more challenging tasks.</p>');

-- --------------------------------------------------------

--
-- Table structure for table `photo`
--

CREATE TABLE IF NOT EXISTS `photo` (
  `photo_id` int(100) NOT NULL AUTO_INCREMENT,
  `photo_name` varchar(200) DEFAULT NULL,
  `album_id` varchar(100) DEFAULT NULL,
  `dt` date DEFAULT NULL,
  PRIMARY KEY (`photo_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE IF NOT EXISTS `products` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `cid` int(11) NOT NULL,
  `name` text NOT NULL,
  `speci` text,
  `img` text,
  `srno` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `cid`, `name`, `speci`, `img`, `srno`) VALUES
(1, 1, 'Magnetic Chess Board Round', '<p>Magnetic Chess Board Round.</p>', '1.JPG', '0065'),
(2, 8, 'Flat Chess Board', '<p>Flat Chess Board.</p>', '2.JPG', '0066'),
(3, 7, 'Artistic Half Figure', '<p>Artistic Half Figure.</p>', '3.JPG', '0067'),
(4, 4, 'Burning Lotus Black Set', '<p>Burning Lotus Black Set.</p>', '4.JPG', '0068'),
(5, 1, 'Magnetic Chess Board 2', '<p>Magnetic Chess Board</p>', '5.JPG', '0069');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
