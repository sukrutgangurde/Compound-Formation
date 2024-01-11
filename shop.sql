-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 11, 2024 at 06:11 AM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 7.4.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `shop`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `aid` int(11) NOT NULL,
  `amail` varchar(255) NOT NULL,
  `apass` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`aid`, `amail`, `apass`) VALUES
(1, 'admin@gmail.com', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `favourite`
--

CREATE TABLE `favourite` (
  `fid` int(11) NOT NULL,
  `pid` int(11) NOT NULL,
  `uid` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `favourite`
--

INSERT INTO `favourite` (`fid`, `pid`, `uid`) VALUES
(55, 2, 4);

-- --------------------------------------------------------

--
-- Table structure for table `orderitem`
--

CREATE TABLE `orderitem` (
  `id` int(11) NOT NULL,
  `orderid` int(11) NOT NULL,
  `prodname` varchar(255) NOT NULL,
  `prodprice` decimal(10,0) NOT NULL,
  `prodqty` int(11) NOT NULL,
  `prodimg` varchar(255) NOT NULL,
  `status` int(11) DEFAULT 1
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `orderitem`
--

INSERT INTO `orderitem` (`id`, `orderid`, `prodname`, `prodprice`, `prodqty`, `prodimg`, `status`) VALUES
(149, 164, 'Black Slate Walls', '35000', 2, '262721.jpg', 0),
(148, 163, 'Mild Steel Compound', '45000', 1, '686660.jpg', 0),
(147, 162, 'Stone Wall texture', '25000', 3, '618351.jpg', 0),
(146, 161, 'Bricks Wall', '40000', 1, '128657.jpg', 0),
(145, 160, 'Stone Wall texture', '25000', 3, '618351.jpg', 0),
(144, 159, 'Mild Steel Compound', '45000', 1, '686660.jpg', 1),
(143, 159, 'Royal Gate', '60000', 2, '462153.jpg', 1),
(141, 157, 'Stone Wall Brick', '35000', 1, '424568.jpg', 0),
(140, 156, 'Black Slate Walls', '35000', 1, '262721.jpg', 0),
(142, 158, 'Traditional Gate', '55000', 1, '691058.jpg', 0),
(139, 155, 'Custom Color Wall', '45000', 1, '846034.jpg', 0),
(138, 154, 'Door Portal Gate', '1', 1, '917035.jpg', 0),
(137, 153, 'Door Portal Gate', '1', 1, '917035.jpg', 0),
(136, 152, 'Red Bricks', '20000', 1, '797571.jpg', 0),
(135, 151, 'Iron Compound', '10', 1, '785003.jpg', 0),
(132, 148, 'Custom Color Wall', '45000', 1, '846034.jpg', 0),
(131, 147, 'Door Portal Gate', '1', 1, '917035.jpg', 0),
(130, 146, 'Black Slate Walls', '35000', 1, '262721.jpg', 0),
(129, 145, 'Door Portal Gate', '1', 1, '917035.jpg', 1),
(134, 150, 'Stone Wall Brick', '35000', 1, '424568.jpg', 0),
(128, 144, 'Door Portal Gate', '1', 1, '917035.jpg', 0),
(127, 143, 'Traditional Gate', '55000', 3, '691058.jpg', 0),
(133, 149, 'Door Portal Gate', '1', 1, '917035.jpg', 0),
(126, 142, 'Slate Stone Wall', '50000', 3, '170569.jpg', 0),
(125, 141, 'Isolated Gate', '30000', 1, '32791.jpg', 0),
(124, 140, 'Isolated Gate', '30000', 2, '32791.jpg', 0),
(123, 139, 'Isolated Gate', '30000', 1, '32791.jpg', 0),
(122, 138, 'Slate Stone Wall', '50000', 2, '170569.jpg', 0),
(121, 137, 'Isolated Gate', '30000', 1, '32791.jpg', 0),
(120, 136, 'Slate Stone Wall', '50000', 2, '170569.jpg', 0),
(119, 135, 'Slate Stone Wall', '50000', 2, '170569.jpg', 0);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `orderid` int(11) NOT NULL,
  `odate` datetime NOT NULL,
  `uid` int(11) NOT NULL,
  `status` varchar(100) NOT NULL,
  `payment_status` varchar(30) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`orderid`, `odate`, `uid`, `status`, `payment_status`) VALUES
(155, '2023-12-14 11:26:24', 8, 'Cancel', 'Refunded'),
(156, '2023-12-14 13:17:08', 8, 'Cancel', 'Refunded'),
(157, '2023-12-14 15:46:09', 8, 'Cancel', 'Refunded'),
(158, '2023-12-14 15:51:42', 8, 'Cancel', 'Refunded'),
(159, '2023-12-14 17:24:54', 13, 'Not Delivered', 'Unpaid'),
(160, '2023-12-15 07:06:09', 8, 'Cancel', 'Refunded'),
(154, '2023-12-14 11:25:54', 8, 'Cancel', 'Refunded'),
(153, '2023-12-14 09:45:13', 8, 'Cancel', 'Refunded'),
(152, '2023-12-14 09:42:59', 8, 'Cancel', 'Refunded'),
(151, '2023-12-14 09:41:12', 8, 'Cancel', 'Refunded'),
(150, '2023-12-14 09:39:44', 8, 'Cancel', 'Refunded'),
(149, '2023-12-14 09:39:04', 8, 'Cancel', 'Refunded'),
(148, '2023-12-14 09:38:11', 8, 'Cancel', 'Refunded'),
(147, '2023-12-14 09:37:21', 8, 'Cancel', 'Refunded'),
(164, '2023-12-15 14:08:32', 8, 'Cancel', 'Refunded'),
(146, '2023-12-14 09:36:53', 8, 'Cancel', 'Refunded'),
(162, '2023-12-15 07:18:26', 8, 'Cancel', 'Refunded'),
(161, '2023-12-15 07:17:44', 8, 'Cancel', 'Refunded'),
(163, '2023-12-15 07:50:11', 8, 'Cancel', 'Refunded'),
(145, '2023-12-14 09:36:07', 12, 'Not Delivered', 'Unpaid'),
(144, '2023-12-14 09:34:50', 12, 'Cancel', 'Refunded'),
(143, '2023-12-14 09:24:04', 8, 'Cancel', 'Refunded'),
(142, '2023-12-14 09:23:44', 8, 'Cancel', 'Refunded'),
(141, '2023-12-13 16:26:02', 8, 'Cancel', 'Refunded'),
(140, '2023-12-13 11:42:05', 8, 'Cancel', 'Refunded'),
(139, '2023-12-12 23:19:35', 8, 'Cancel', 'Refunded'),
(138, '2023-12-12 23:19:21', 8, 'Cancel', 'Refunded'),
(137, '2023-12-12 15:57:43', 8, 'Cancel', 'Refunded'),
(136, '2023-12-12 12:40:49', 8, 'Cancel', 'Refunded'),
(135, '2023-12-12 11:58:20', 8, 'Cancel', 'Refunded');

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `pay_id` int(11) NOT NULL,
  `orderid` int(11) NOT NULL,
  `pay_amt` double NOT NULL,
  `pay_datetime` datetime NOT NULL,
  `method` varchar(50) NOT NULL,
  `status` varchar(30) NOT NULL,
  `currency` varchar(50) NOT NULL,
  `txn_id` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `payment`
--

INSERT INTO `payment` (`pay_id`, `orderid`, `pay_amt`, `pay_datetime`, `method`, `status`, `currency`, `txn_id`) VALUES
(3, 88, 1899900, '2023-04-30 19:57:14', '2', 'succeeded', 'inr', 'pi_3N2bCtSGjqtp50je1C7pFvo7'),
(4, 86, 1899900, '2023-04-30 20:00:28', '2', 'succeeded', 'inr', 'pi_3N2bGBSGjqtp50je0EAek2Jj'),
(5, 88, 1899900, '2023-04-30 20:01:18', '2', 'succeeded', 'inr', 'pi_3N2bH5SGjqtp50je0e9KBUh0'),
(6, 89, 2299, '2023-04-30 20:21:29', '2', 'succeeded', 'inr', 'pi_3N2baASGjqtp50je0QGBPfzl'),
(7, 90, 37998, '2023-04-30 20:28:23', '2', 'succeeded', 'inr', 'pi_3N2bhGSGjqtp50je0C0R0rSI'),
(8, 91, 5380, '2023-04-30 22:39:33', '2', 'succeeded', 'inr', 'pi_3N2djkSGjqtp50je1NpVWsrV'),
(9, 93, 40000, '2023-05-03 20:33:38', '1', 'succeeded', 'inr', '3726250432'),
(17, 101, 0, '2023-05-05 14:33:22', '1', 'succeeded', 'inr', '9415020633'),
(14, 94, 2690, '2023-05-03 20:43:35', '1', 'succeeded', 'inr', '6711372537'),
(18, 102, 0, '2023-05-05 14:36:36', '1', 'succeeded', 'inr', '2839095748'),
(19, 103, 0, '2023-05-05 15:04:47', '1', 'succeeded', 'inr', '6195053702'),
(20, 117, 14998, '2023-05-05 20:02:27', '1', 'succeeded', 'inr', '1786320930'),
(25, 126, 0, '2023-05-19 11:32:58', '2', 'succeeded', 'inr', 'pi_3N9MOFSGjqtp50je0b7BR68W'),
(22, 123, 4598, '2023-05-18 13:45:44', '2', 'succeeded', 'inr', 'pi_3N91yvSGjqtp50je1QXTBjEm'),
(23, 124, 0, '2023-05-18 13:59:11', '1', 'succeeded', 'inr', '3481609677'),
(24, 125, 0, '2023-05-18 19:04:05', '1', 'succeeded', 'inr', '7094841397'),
(26, 130, 20000, '2023-12-12 10:59:40', '1', 'succeeded', 'inr', '1117677302'),
(27, 140, 0, '2023-12-13 11:42:12', '1', 'succeeded', 'inr', '3898768502'),
(28, 153, 0, '2023-12-14 09:45:16', '1', 'succeeded', 'inr', '7580171119'),
(29, 163, 0, '2023-12-15 07:50:16', '1', 'succeeded', 'inr', '4278241147'),
(30, 163, 0, '2023-12-15 07:51:50', '1', 'succeeded', 'inr', '8423623967'),
(31, 163, 0, '2023-12-15 07:53:03', '1', 'succeeded', 'inr', '3499526915'),
(32, 163, 0, '2023-12-15 07:53:05', '1', 'succeeded', 'inr', '4338148695'),
(33, 163, 0, '2023-12-15 07:53:16', '1', 'succeeded', 'inr', '1979375830'),
(34, 164, 0, '2023-12-15 14:08:51', '1', 'succeeded', 'inr', '6364183594');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `pid` int(11) NOT NULL,
  `pname` varchar(255) NOT NULL,
  `descp` mediumtext NOT NULL,
  `price` decimal(10,0) NOT NULL,
  `category` varchar(255) NOT NULL,
  `img_path` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`pid`, `pname`, `descp`, `price`, `category`, `img_path`) VALUES
(29, 'Red Bricks', 'Red wall bricks infuse warmth and character into structures. These durable', '20000', '4', '797571.jpg'),
(32, 'Isolated Gate', '	An isolated gate wall features a wooden gate, blending natural aesthetics with functionality. It provides privacy and security while enhancing outdoor charm.', '30000', '2', '32791.jpg'),
(25, 'Slate Stone Wall', 'Slate stone walls are durable and weather-resistant, commonly used for construction. They offer a rustic appearance and come in various colors. 5000rs per meter.', '50000', '3', '170569.jpg'),
(27, 'Custom Color Wall', 'Custom walls are durable and weather-resistant, commonly used for Decoration of Compound . They come in various colors. 4500rs per meter.', '45000', '3', '846034.jpg'),
(17, 'Black Slate Walls', 'Black slate walls are sleek and contemporary, adding a modern touch to interiors or exteriors. They are durable and versatile in design. 3500 per meter', '35000', '3', '262721.jpg'),
(26, 'Traditional Gate', 'Traditional gates often feature ornate designs, crafted from materials like wrought iron or wood, providing a timeless and elegant entry point.', '55000', '2', '691058.jpg'),
(19, 'Royal Gate', ' A royal gate signifies opulence and grandeur, often adorned with intricate designs and noble motifs, serving as an emblem of prestige and authority.', '60000', '2', '462153.jpg'),
(35, 'Bricks Wall', '5000 Bricks in each lot.', '40000', '4', '128657.jpg'),
(34, 'Stone Wall texture', 'a well Stone texture wall . 5000rs/meter ', '25000', '3', '618351.jpg'),
(21, 'Iron Compound', ' Iron compound wall grills add security to properties with an ornate touch. These decorative elements enhance aesthetics while ensuring safety and durability', '10', '1', '785003.jpg'),
(22, 'Mild Steel Compound', ' Mild steel compound wall grills provide robust security. Their strength and durability make them an ideal choice for safeguarding properties while maintaining aesthetics.', '45000', '1', '686660.jpg'),
(28, 'Stone Wall Brick', 'Stone wall bricks offer a timeless aesthetic, adding charm to structures. Durable and weather-resistant, they provide both functional and decorative benefits.', '35000', '4', '424568.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `stock`
--

CREATE TABLE `stock` (
  `sid` int(11) NOT NULL,
  `stock_count` int(11) NOT NULL,
  `pid` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `stock`
--

INSERT INTO `stock` (`sid`, `stock_count`, `pid`) VALUES
(1, 10, 2),
(2, 7, 1),
(3, 26, 3),
(4, 20, 5),
(5, 8, 6),
(6, 25, 4),
(7, 9, 11),
(8, 18, 7),
(2001, 12, 12),
(2002, 10, 13),
(2003, 15, 14),
(2014, 10, 25),
(2016, 7, 27),
(2006, 6, 17),
(2015, 6, 26),
(2008, 8, 19),
(2024, 9, 35),
(2010, 99, 21),
(2011, 8, 22),
(2017, 98, 28),
(2018, 99, 29),
(2021, 5, 32),
(2023, 4, 34);

-- --------------------------------------------------------

--
-- Table structure for table `supplier`
--

CREATE TABLE `supplier` (
  `sid` int(11) NOT NULL,
  `sname` varchar(255) NOT NULL,
  `smail` varchar(255) NOT NULL,
  `sphno` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `supplier`
--

INSERT INTO `supplier` (`sid`, `sname`, `smail`, `sphno`) VALUES
(4, 'Sukrut', 'Suk@gmail.com', '8888888888');

-- --------------------------------------------------------

--
-- Table structure for table `support`
--

CREATE TABLE `support` (
  `supid` int(11) NOT NULL,
  `email` varchar(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `message` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `support`
--

INSERT INTO `support` (`supid`, `email`, `name`, `message`) VALUES
(4, 'abc@gmail.com', 'abc', 'Error in payment'),
(6, 's@gmail.com', 'Sukrut', 'Hello');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `uid` int(11) NOT NULL,
  `uname` varchar(255) NOT NULL,
  `umail` varchar(255) NOT NULL,
  `upass` varchar(255) NOT NULL,
  `uaddr` text NOT NULL,
  `uphno` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`uid`, `uname`, `umail`, `upass`, `uaddr`, `uphno`) VALUES
(12, 'Avishkar', 'avi@gmail.com', '1234', 'nashik', '7887444226'),
(13, 'Shivam', 'shivam@gmail.com', '3456', 'Nashik', '1234567890'),
(8, 'Sukrut', 's@gmail.com', '1234', 'Nashik', '9511649562'),
(9, 'Bhavesh', 'b@gmail.com', '1234', 'Pune', '7006004000'),
(10, 'Sukrut', 'a@gmail.com', '12345', 'Nashik', '7894561235'),
(11, 'Bhavesh', 'w@gmail.com', '1234', 'Nashik', '7896541230');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`aid`);

--
-- Indexes for table `favourite`
--
ALTER TABLE `favourite`
  ADD PRIMARY KEY (`fid`),
  ADD KEY `pid` (`pid`),
  ADD KEY `uid` (`uid`);

--
-- Indexes for table `orderitem`
--
ALTER TABLE `orderitem`
  ADD PRIMARY KEY (`id`),
  ADD KEY `orderitem_FK_1` (`orderid`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`orderid`),
  ADD KEY `order_FK_1` (`uid`);

--
-- Indexes for table `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`pay_id`),
  ADD KEY `pay_FK_1` (`orderid`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`pid`);

--
-- Indexes for table `stock`
--
ALTER TABLE `stock`
  ADD PRIMARY KEY (`sid`),
  ADD KEY `pid` (`pid`);

--
-- Indexes for table `supplier`
--
ALTER TABLE `supplier`
  ADD PRIMARY KEY (`sid`);

--
-- Indexes for table `support`
--
ALTER TABLE `support`
  ADD PRIMARY KEY (`supid`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`uid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `aid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `favourite`
--
ALTER TABLE `favourite`
  MODIFY `fid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=65;

--
-- AUTO_INCREMENT for table `orderitem`
--
ALTER TABLE `orderitem`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=150;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `orderid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=165;

--
-- AUTO_INCREMENT for table `payment`
--
ALTER TABLE `payment`
  MODIFY `pay_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `pid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `stock`
--
ALTER TABLE `stock`
  MODIFY `sid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2026;

--
-- AUTO_INCREMENT for table `supplier`
--
ALTER TABLE `supplier`
  MODIFY `sid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `support`
--
ALTER TABLE `support`
  MODIFY `supid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `uid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
