-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 23, 2021 at 05:55 AM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `team_jay`
--

-- --------------------------------------------------------

--
-- Table structure for table `buy`
--

CREATE TABLE `buy` (
  `buy` int(10) NOT NULL,
  `uname` varchar(100) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `quantity` int(11) NOT NULL,
  `image` varchar(200) NOT NULL,
  `client` varchar(250) NOT NULL,
  `stock` int(11) NOT NULL,
  `stock2` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `date` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `buy`
--

INSERT INTO `buy` (`buy`, `uname`, `price`, `quantity`, `image`, `client`, `stock`, `stock2`, `product_id`, `date`) VALUES
(3, 'Steamed Rice Deedpangs', '55.00', 2, 'SteamedRiceDeedpangs.jpg', 'jayjay', 15, 17, 123, '10-23-21');

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `c_id` int(255) NOT NULL,
  `uname` varchar(255) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `quantity` int(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `client` varchar(250) NOT NULL,
  `stock` int(255) NOT NULL,
  `stock2` int(11) NOT NULL,
  `product_id` int(255) NOT NULL,
  `date` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`c_id`, `uname`, `price`, `quantity`, `image`, `client`, `stock`, `stock2`, `product_id`, `date`) VALUES
(500, 'Steamed Rice Deedpangs', '55.00', 1, 'SteamedRiceDeedpangs.jpg', 'tapandgo', 19, 20, 123, '09-29-21'),
(503, 'Bottled Cold Brew Coffees', '100.00', 1, 'BottledColdBrewCoffees.jpg', 'jayjay', 19, 20, 124, '10-11-21'),
(507, 'Monster D', '160.00', 1, 'MonsterDCityBurger.jpg', 'jayjay', 19, 20, 127, '10-11-21');

-- --------------------------------------------------------

--
-- Table structure for table `demo`
--

CREATE TABLE `demo` (
  `id` int(255) NOT NULL,
  `quantity` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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

CREATE TABLE `login` (
  `id` int(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `adress` varchar(255) NOT NULL,
  `gender` varchar(255) NOT NULL,
  `DateofBirth` date DEFAULT NULL,
  `firstname` varchar(250) NOT NULL,
  `lastname` varchar(250) NOT NULL,
  `mobile` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `store_name` varchar(100) NOT NULL,
  `type` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`id`, `username`, `password`, `adress`, `gender`, `DateofBirth`, `firstname`, `lastname`, `mobile`, `image`, `store_name`, `type`) VALUES
(99, 'KaonNaLangging', '827ccb0eea8a706c4c34a16891f84e7b', 'null', 'null', '2020-09-03', 'null', 'null', '0', 'Kaon.jpg', 'Kaon na Langging', 'admin'),
(108, 'CafeLiBrew', '827ccb0eea8a706c4c34a16891f84e7b', 'null', 'null', '2020-09-03', 'null', 'null', '0', 'CafeLibrew.png', 'Cafe LiBrew', 'admin'),
(110, 'CityBurger', '827ccb0eea8a706c4c34a16891f84e7b', 'null', 'null', '2020-09-03', 'null', 'null', '0', 'CityBurger.jpg', 'City Burger', 'admin'),
(111, 'Ochado', '827ccb0eea8a706c4c34a16891f84e7b', 'null', 'null', '2020-09-03', 'null', 'null', '0', 'Ochado.jpg', 'Ochado', 'admin'),
(112, 'BobaTeaio', '827ccb0eea8a706c4c34a16891f84e7b', 'null', 'null', '2020-09-03', 'null', 'null', '0', 'Boba.jpg', 'Boba Teaio', 'admin'),
(113, 'jayjay', 'c4ca4238a0b923820dcc509a6f75849b', 'Malingin', 'Male', '2000-05-19', 'Jay', 'Catadman', '09977784168', 'J.png', 'none', 'none');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `p_id` int(255) NOT NULL,
  `p_name` varchar(255) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `category` varchar(50) NOT NULL,
  `stock` int(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `sale` int(255) DEFAULT NULL,
  `store_name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`p_id`, `p_name`, `price`, `category`, `stock`, `image`, `sale`, `store_name`) VALUES
(123, 'Steamed Rice Deedpangs', '55.00', 'null', 15, 'SteamedRiceDeedpangs.jpg', 2, 'Kaon na Langging'),
(124, 'Bottled Cold Brew Coffees', '100.00', 'null', 19, 'BottledColdBrewCoffees.jpg', 4, 'Kaon na Langging'),
(125, 'Boba MilkTea', '75.00', 'null', 20, 'MilkTeaBobaTeaio.jpg', 1, 'Boba Teaio'),
(126, 'Ochado MilkTea', '75.00', 'null', 20, 'MilkTeaOchado.jpg', 0, 'Ochado'),
(127, 'Monster D', '160.00', 'null', 20, 'MonsterDCityBurger.jpg', 0, 'Kaon na Langging');

-- --------------------------------------------------------

--
-- Table structure for table `rate`
--

CREATE TABLE `rate` (
  `id` int(11) NOT NULL,
  `comments` varchar(255) NOT NULL,
  `rating` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `rating`
--

CREATE TABLE `rating` (
  `r_id` int(11) NOT NULL,
  `rating` float NOT NULL,
  `comment` varchar(255) NOT NULL,
  `profile_img` varchar(255) NOT NULL,
  `client_name` varchar(255) NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `p_id` int(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `rating`
--

INSERT INTO `rating` (`r_id`, `rating`, `comment`, `profile_img`, `client_name`, `product_name`, `p_id`) VALUES
(174, 5, 'Lami kaayo siya. Palit nasad ko ani puhon', 'J.png', 'tapandgo', 'Steamed Rice Deedpangs', 123);

-- --------------------------------------------------------

--
-- Table structure for table `wishlist`
--

CREATE TABLE `wishlist` (
  `w_id` int(50) NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `stock` int(50) NOT NULL,
  `price` int(50) NOT NULL,
  `image` varchar(255) NOT NULL,
  `client` varchar(255) NOT NULL,
  `p_id` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `wishlist`
--

INSERT INTO `wishlist` (`w_id`, `product_name`, `stock`, `price`, `image`, `client`, `p_id`) VALUES
(45, 'shoes', 34, 32, '2x2.jpg', '<br /><b>Notice</b>:  Undefined variable: username in <b>C:xampphtdocs	eam_jayinclude_phpinclude_storeProduct.php</b> on line <b>138</b><br />', 27),
(46, 'shoes', 34, 32, '2x2.jpg', '<br /><b>Notice</b>:  Undefined variable: username in <b>C:xampphtdocs	eam_jayinclude_phpinclude_storeProduct.php</b> on line <b>138</b><br />', 27),
(47, 'shoes', 34, 32, '2x2.jpg', '<br /><b>Notice</b>:  Undefined variable: username in <b>C:xampphtdocs	eam_jayinclude_phpinclude_storeProduct.php</b> on line <b>138</b><br />', 27),
(48, 'shoes', 34, 32, '2x2.jpg', '<br /><b>Notice</b>:  Undefined variable: username in <b>C:xampphtdocs	eam_jayinclude_phpinclude_storeProduct.php</b> on line <b>138</b><br />', 27),
(49, 'shoes', 34, 32, '2x2.jpg', '<br /><b>Notice</b>:  Undefined variable: username in <b>C:xampphtdocs	eam_jayinclude_phpinclude_storeProduct.php</b> on line <b>138</b><br />', 27),
(50, 'shoes', 34, 32, '2x2.jpg', '<br /><b>Notice</b>:  Undefined variable: username in <b>C:xampphtdocs	eam_jayinclude_phpinclude_storeProduct.php</b> on line <b>138</b><br />', 27),
(51, 'shoes', 34, 32, '2x2.jpg', '<br /><b>Notice</b>:  Undefined variable: username in <b>C:xampphtdocs	eam_jayinclude_phpinclude_storeProduct.php</b> on line <b>138</b><br />', 27),
(52, 'shoes', 34, 32, '2x2.jpg', '<br /><b>Notice</b>:  Undefined variable: username in <b>C:xampphtdocs	eam_jayinclude_phpinclude_storeProduct.php</b> on line <b>138</b><br />', 27),
(53, 'shoes', 34, 32, '2x2.jpg', '<br /><b>Notice</b>:  Undefined variable: username in <b>C:xampphtdocs	eam_jayinclude_phpinclude_storeProduct.php</b> on line <b>138</b><br />', 27),
(54, 'shoes', 34, 32, '2x2.jpg', '<br /><b>Notice</b>:  Undefined variable: username in <b>C:xampphtdocs	eam_jayinclude_phpinclude_storeProduct.php</b> on line <b>138</b><br />', 27),
(55, 'shoes', 34, 32, '2x2.jpg', '<br /><b>Notice</b>:  Undefined variable: username in <b>C:xampphtdocs	eam_jayinclude_phpinclude_storeProduct.php</b> on line <b>138</b><br />', 27),
(56, 'shoes', 34, 32, '2x2.jpg', '<br /><b>Notice</b>:  Undefined variable: username in <b>C:xampphtdocs	eam_jayinclude_phpinclude_storeProduct.php</b> on line <b>138</b><br />', 27),
(57, '', 0, 0, '', '<br /><b>Notice</b>:  Undefined variable: username in <b>C:xampphtdocs	eam_jayinclude_phpinclude_storeProduct.php</b> on line <b>138</b><br />', 0),
(58, '', 0, 0, '', '<br /><b>Notice</b>:  Undefined variable: username in <b>C:xampphtdocs	eam_jayinclude_phpinclude_storeProduct.php</b> on line <b>138</b><br />', 0),
(59, '', 0, 0, '', '<br /><b>Notice</b>:  Undefined variable: username in <b>C:xampphtdocs	eam_jayinclude_phpinclude_storeProduct.php</b> on line <b>138</b><br />', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `buy`
--
ALTER TABLE `buy`
  ADD PRIMARY KEY (`buy`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`c_id`);

--
-- Indexes for table `demo`
--
ALTER TABLE `demo`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`p_id`);

--
-- Indexes for table `rate`
--
ALTER TABLE `rate`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `rating`
--
ALTER TABLE `rating`
  ADD PRIMARY KEY (`r_id`);

--
-- Indexes for table `wishlist`
--
ALTER TABLE `wishlist`
  ADD PRIMARY KEY (`w_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `buy`
--
ALTER TABLE `buy`
  MODIFY `buy` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `c_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=508;

--
-- AUTO_INCREMENT for table `demo`
--
ALTER TABLE `demo`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `login`
--
ALTER TABLE `login`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=114;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `p_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=128;

--
-- AUTO_INCREMENT for table `rate`
--
ALTER TABLE `rate`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `rating`
--
ALTER TABLE `rating`
  MODIFY `r_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=175;

--
-- AUTO_INCREMENT for table `wishlist`
--
ALTER TABLE `wishlist`
  MODIFY `w_id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=60;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
