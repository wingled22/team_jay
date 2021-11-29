-- phpMyAdmin SQL Dump
-- version 4.1.12
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Apr 24, 2021 at 07:21 AM
-- Server version: 5.5.36
-- PHP Version: 5.4.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `login`
--

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE IF NOT EXISTS `cart` (
  `c_id` int(255) NOT NULL AUTO_INCREMENT,
  `uname` varchar(255) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `quantity` int(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `client` varchar(250) NOT NULL,
  `stock` int(255) NOT NULL,
  `product_id` int(255) NOT NULL,
  PRIMARY KEY (`c_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=293 ;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`c_id`, `uname`, `price`, `quantity`, `image`, `client`, `stock`, `product_id`) VALUES
(271, 'Go! Salads Coffee Kick Smoothie Kit', '40.00', 1, 'img_4.jpg', 'w', 17, 145),
(274, 'Japanese Art Collection', '4000.00', 2, 'phone_1.jpg', 'w', 10, 161),
(275, 'Go! Salads Coffee Kick Smoothie Kit', '40.00', 1, 'img_4.jpg', 'w', 17, 145),
(277, 'Japanese Art Collection', '4000.00', 1, 'phone_1.jpg', 'w', 9, 161),
(278, 'Go! Salads Coffee Kick Smoothie Kit', '40.00', 1, 'img_4.jpg', 'w', 16, 145),
(279, 'Go! Salads Coffee Kick Smoothie Kit', '40.00', 1, 'img_4.jpg', 'w', 15, 145),
(281, 'Go! Salads Coffee Kick Smoothie Kit', '40.00', 1, 'img_4.jpg', 'demo', 13, 145),
(282, 'df', '34.00', 2, 'img_4.jpg', 'demo', 5, 147),
(283, 'Alas Diyes Portulaca Vietnam', '23.00', 1, 'plant_2.jpg', 'demo', 28, 173),
(284, 'Alas Diyes Portulaca Vietnam', '23.00', 1, 'plant_2.jpg', 'demo', 27, 173),
(287, 'Go! Salads Coffee Kick Smoothie Kit', '45.00', 1, 'img_1.jpg', 'demo', 31, 151),
(289, 'Sensor Wall light', '343.00', 1, 'outdoor_2.png', 'demo', 33, 176),
(290, 'Go! Salads Coffee Kick Smoothie Kit', '40.00', 2, 'img_4.jpg', 'demo', 11, 145),
(291, 'Go! Salads Coffee Kick Smoothie Kit', '40.00', 1, 'img_4.jpg', 'demo', 10, 145),
(292, 'Go! Salads Coffee Kick Smoothie Kit', '40.00', 1, 'img_4.jpg', 'demo', 9, 145);

-- --------------------------------------------------------

--
-- Table structure for table `demo`
--

CREATE TABLE IF NOT EXISTS `demo` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `quantity` int(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `demo`
--

INSERT INTO `demo` (`id`, `quantity`) VALUES
(1, 0),
(2, 0),
(3, 0),
(4, 7),
(5, 0),
(6, 7),
(7, 7),
(8, 9);

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE IF NOT EXISTS `login` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `usertype` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=52 ;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`id`, `username`, `password`, `usertype`) VALUES
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3', ''),
(2, 'ad', '523af537946b79c4f8369ed39ba78605', ''),
(3, 'da', '5ca2aa845c8cd5ace6b016841f100d82', ''),
(4, 's', '03c7c0ace395d80182db07ae2c30f034', ''),
(5, 'da', '5ca2aa845c8cd5ace6b016841f100d82', ''),
(6, 'admin', '21232f297a57a5a743894a0e4a801fc3', ''),
(7, 'kuys', '38a8d27bd5ffbe4b6a7528c510ae7a2e', ''),
(8, 'f', '8fa14cdd754f91cc6554c9e71929cce7', ''),
(9, 'dfdf', '44f21d5190b5a6df8089f54799628d7e', ''),
(10, 'df', '633de4b0c14ca52ea2432a3c8a5c4c31', ''),
(11, 'dale', '63a017d3ac56e09d80c939eda9bdbc88', ''),
(12, 'k', '8ce4b16b22b58894aa86c421e8759df3', ''),
(13, 'd', '8277e0910d750195b448797616e091ad', ''),
(14, 'a', '0cc175b9c0f1b6a831c399e269772661', ''),
(15, 'admi', '03c7c0ace395d80182db07ae2c30f034', ''),
(16, 'b', '92eb5ffee6ae2fec3ad71c777531578f', ''),
(17, 'm', '6f8f57715090da2632453988d9a1501b', ''),
(18, 'admins', 'admins', 'admin'),
(19, 'jhell', 'jhell', 'admin'),
(20, 'user', 'user', 'user'),
(21, 'new', '21232f297a57a5a743894a0e4a801fc3', 'admin'),
(22, 'user', 'ee11cbb19052e40b07aac0ca060c23ee', 'user'),
(23, 'admin', '21232f297a57a5a743894a0e4a801fc3', 'admin'),
(24, 'demo', 'fe01ce2a7fbac8fafaed7c982a04e229', 'admin'),
(25, 'user', 'ee11cbb19052e40b07aac0ca060c23ee', 'user'),
(26, 'sssss', '2d02e669731cbade6a64b58d602cf2a4', 'admin'),
(27, 'fffffffffff', '5da0aebaeea0108d794303443b2490f7', 'admin'),
(28, 'kolo', '8a2bc6f29f421af1f4094296ae17f244', 'admin'),
(29, 'ffdf', '1aabac6d068eef6a7bad3fdf50a05cc8', 'admin'),
(30, 'ffdf', '1aabac6d068eef6a7bad3fdf50a05cc8', 'admin'),
(31, 'fdfdf', '60d31eb37595dd44584be5ef363283e3', 'admin'),
(32, 'f', '8fa14cdd754f91cc6554c9e71929cce7', 'admin'),
(33, 'demo', 'eff7d5dba32b4da32d9a67a519434d3f', 'admin'),
(34, 'dedfdff', 'f0118e9bd2c4fb29c64ee03abce698b8', 'admin'),
(35, 'lplplp', 'b52c96bea30646abf8170f333bbd42b9', 'admin'),
(36, 'dfdfdfdfs', '3691308f2a4c2f6983f2880d32e29c84', 'admin'),
(37, 'sfdf', 'eff7d5dba32b4da32d9a67a519434d3f', 'admin'),
(38, 'sss', 'd29aaa0b9cd402b4bfe2395a805f9ada', 'admin'),
(39, 'lead', '13edbe8b95261c3a88680818cace44a4', 'admin'),
(40, 'load', 'f0118e9bd2c4fb29c64ee03abce698b8', 'admin'),
(42, 'polo', 'b53759f3ce692de7aff1b5779d3964da', 'admin'),
(44, '@dale', 'd982df770877344a9302638df94c614a', 'admin'),
(45, '@daledelacruz', 'fe01ce2a7fbac8fafaed7c982a04e229', 'admin'),
(46, 'client', '62608e08adc29a8d6dbc9754e659f125', 'admin'),
(47, 'daless', '724bb9cb1426915290e84b244f92a783', 'admin'),
(48, 'dd', '1aabac6d068eef6a7bad3fdf50a05cc8', 'admin'),
(49, 'lhiz', 'ea3f6245d2a3f1ae2626351eee1941bd', 'admin'),
(50, 'l', '2db95e8e1a9267b7a1188556b2013b33', 'admin'),
(51, 'w', 'f1290186a5d0b1ceab27f4e77c0c5d68', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE IF NOT EXISTS `product` (
  `p_id` int(255) NOT NULL AUTO_INCREMENT,
  `p_name` varchar(255) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `category` varchar(50) NOT NULL,
  `stock` int(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  PRIMARY KEY (`p_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=178 ;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`p_id`, `p_name`, `price`, `category`, `stock`, `image`) VALUES
(145, 'Go! Salads Coffee Kick Smoothie Kit', '40.00', 'Digital Meal Vouchers', 9, 'img_4.jpg'),
(147, 'df', '34.00', 'Digital Meal Vouchers', 5, 'img_4.jpg'),
(151, 'Go! Salads Coffee Kick Smoothie Kit', '45.00', 'Digital Meal Vouchers', 32, 'img_1.jpg'),
(152, 'Classic Burger,Freedom Fries, Liber Tea Bundle', '14.00', 'Digital Meal Vouchers', 16, 'img_2.jpg'),
(160, 'Printed Graphic Statement', '23.00', 'Mobiles', 21, 'phone_2.jpg'),
(161, 'Japanese Art Collection', '4000.00', 'Mobiles', 9, 'phone_1.jpg'),
(162, 'vivo', '243.00', 'Mobiles', 12, 'phone_5.jpg'),
(163, 'Plain V-neck T-shirt for men', '12.00', 'Mobiles', 44, 'phone_1.jpg'),
(164, 'Plain V-neck T-shirt for men', '12.00', 'Mobiles', 45, 'phone_1.jpg'),
(165, 'Japanese Art Collection', '456.00', 'Mens Tshirts', 2, 'tshirt_2.png'),
(166, 'Unisex Tshirt', '324.00', 'Mens Tshirts', 34, 't-shirt3.jpg'),
(167, 'Bible verse Tshirt Printed Collection', '213.00', 'Mens Tshirts', 34, 'tshirt_2.png'),
(168, 'Kate smocking Dress Floral Above Knee fit to XS', '34.00', 'Womens Dress', 53, 'dress_1.jpg'),
(169, 'sd', '12.00', 'Womens Dress', 34, 'dress_2.jpg'),
(170, 'Face mask', '23.00', 'Health Accessories', 34, 'heath_2.jpg'),
(171, 'Face shield', '21.00', 'Health Accessories', 34, 'health_1.jpg'),
(173, 'Alas Diyes Portulaca Vietnam', '23.00', 'Plant,Seeds and Bulbs', 26, 'plant_2.jpg'),
(174, 'Catherine #903 Korean Cute jinpin', '434.00', 'Cross Body and Shoulder Bags', 34, 'bag_1.jpg'),
(175, 'sling bag for women sling', '345.00', 'Cross Body and Shoulder Bags', 54, 'bag_2.png'),
(176, 'Sensor Wall light', '343.00', 'Outdoor Lighting', 33, 'outdoor_2.png'),
(177, '24 hd monitor', '34.00', 'Monitor', 34, 'monitor_1.jpg');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
