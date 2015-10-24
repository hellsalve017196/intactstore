-- phpMyAdmin SQL Dump
-- version 4.4.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Oct 24, 2015 at 12:14 PM
-- Server version: 5.6.26
-- PHP Version: 5.5.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `intact`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE IF NOT EXISTS `admins` (
  `a_id` int(11) NOT NULL,
  `a_email` varchar(100) NOT NULL,
  `a_user` varchar(50) NOT NULL,
  `a_password` varchar(50) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`a_id`, `a_email`, `a_user`, `a_password`) VALUES
(1, 'a@a.com', 'admin', '1234');

-- --------------------------------------------------------

--
-- Table structure for table `advertize`
--

CREATE TABLE IF NOT EXISTS `advertize` (
  `a_id` int(11) NOT NULL,
  `a_img` text NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `advertize`
--

INSERT INTO `advertize` (`a_id`, `a_img`) VALUES
(2, 'a5012fc8b720ea44e8249fe18776ab27.png');

-- --------------------------------------------------------

--
-- Table structure for table `brand`
--

CREATE TABLE IF NOT EXISTS `brand` (
  `b_id` int(11) NOT NULL,
  `b_name` varchar(100) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `brand`
--

INSERT INTO `brand` (`b_id`, `b_name`) VALUES
(1, 'intact-store'),
(2, 'estasy');

-- --------------------------------------------------------

--
-- Table structure for table `catagory`
--

CREATE TABLE IF NOT EXISTS `catagory` (
  `c_id` int(11) NOT NULL,
  `c_name` varchar(100) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `catagory`
--

INSERT INTO `catagory` (`c_id`, `c_name`) VALUES
(1, 'men'),
(2, 'woman');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE IF NOT EXISTS `product` (
  `p_id` int(11) NOT NULL,
  `c_id` int(11) NOT NULL,
  `b_id` int(11) DEFAULT NULL,
  `p_name` varchar(1000) NOT NULL,
  `p_des` text NOT NULL,
  `p_img` varchar(500) NOT NULL,
  `p_rate` varchar(5) DEFAULT NULL,
  `p_price` varchar(1000) NOT NULL,
  `p_count` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`p_id`, `c_id`, `b_id`, `p_name`, `p_des`, `p_img`, `p_rate`, `p_price`, `p_count`) VALUES
(10, 1, 1, 'black tshirt', 'black skull tshirt', '2c30867ee343093e57ed362932f46d50.jpg', '0', '1200', 10),
(11, 1, 1, 'gray skull tshirt', 'gray skull tshirt', 'a8ca63f911cc498ee231cb2294d1e19b.jpg', '0', '1000', 10),
(12, 1, 2, 'hardy davinson design', 'hardy davinson tshirt in different size', '597cd68fd0d5d3bfcfb4a059a8c5b5f6.jpg', '0', '1000', 8),
(13, 1, 2, 'going weekend tshirt', 'just going weekend tshirt', '3f01fea9add68815cc827a091d8c4e33.jpg', '0', '1000', 10),
(14, 2, 2, 'woman slimware 1', 'asdsadwqdqw', '92c68bff1ae1b0eb2aced0d0af5c0c60.png', '0', '500', 10),
(15, 2, 2, 'woman slimware 2', 'asdasd', '61500b52dfe1e8bee70f740873fc837f.jpg', '0', '500', 10),
(16, 2, 2, 'woman slimware 3', 'asdasda', 'e0636b9ff1023b31dedc6538d4d1a1b8.jpg', '0', '500', 10),
(17, 2, 2, 'woman slimware 4', 'asdasd', '2e175c187ee26bbdc7f7d8db07147aad.jpg', '0', '500', 10),
(18, 1, 2, 'gangsta tshirt', 'color:black,size:in different size', 'f561a8804e611e707e868070f0ac8bcc.png', '0', '1000', 8);

-- --------------------------------------------------------

--
-- Table structure for table `small_add`
--

CREATE TABLE IF NOT EXISTS `small_add` (
  `s_id` int(11) NOT NULL,
  `s_dir` varchar(300) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `small_add`
--

INSERT INTO `small_add` (`s_id`, `s_dir`) VALUES
(2, '037794406d4dfe7404c7b218eb42b2d8.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `u_id` int(11) NOT NULL,
  `u_name` varchar(100) NOT NULL,
  `u_email` varchar(100) NOT NULL,
  `u_password` varchar(100) NOT NULL,
  `u_phone` varchar(15) NOT NULL,
  `u_address` text NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`u_id`, `u_name`, `u_email`, `u_password`, `u_phone`, `u_address`) VALUES
(1, 'samual', 'a@a.com', '12345', '01915580403', 'what is love');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`a_id`);

--
-- Indexes for table `advertize`
--
ALTER TABLE `advertize`
  ADD PRIMARY KEY (`a_id`);

--
-- Indexes for table `brand`
--
ALTER TABLE `brand`
  ADD PRIMARY KEY (`b_id`);

--
-- Indexes for table `catagory`
--
ALTER TABLE `catagory`
  ADD PRIMARY KEY (`c_id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`p_id`);

--
-- Indexes for table `small_add`
--
ALTER TABLE `small_add`
  ADD PRIMARY KEY (`s_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`u_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `a_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `advertize`
--
ALTER TABLE `advertize`
  MODIFY `a_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `brand`
--
ALTER TABLE `brand`
  MODIFY `b_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `catagory`
--
ALTER TABLE `catagory`
  MODIFY `c_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `p_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=19;
--
-- AUTO_INCREMENT for table `small_add`
--
ALTER TABLE `small_add`
  MODIFY `s_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `u_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
