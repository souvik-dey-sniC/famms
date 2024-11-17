-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 14, 2024 at 06:55 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `famms`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `email` varchar(50) NOT NULL,
  `name` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `contact` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`email`, `name`, `password`, `contact`) VALUES
('souvik.de1612@gmail.com', 'Souvik Dey', '12345', '7479301701');

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `cartid` int(11) NOT NULL,
  `pid` int(11) NOT NULL,
  `email` varchar(50) NOT NULL,
  `qnt` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`cartid`, `pid`, `email`, `qnt`) VALUES
(6, 2, 'souvik45@gmail.com', 2),
(7, 3, 'souvik45@gmail.com', 2),
(8, 15, 'souvik45@gmail.com', 1),
(10, 1, 'deyarupkumar97@gmail.com', 2),
(11, 4, 'deyarupkumar97@gmail.com', 1),
(12, 8, 'deyarupkumar97@gmail.com', 1),
(13, 2, '', 1),
(14, 8, 'sougata.nandi2007@gmail.com', 1),
(15, 1, '', 1),
(17, 8, 'akanup67@gmail.com', 2),
(18, 1, 'sougata.nandi2007@gmail.com', 1),
(27, 6, 'akanup67@gmail.com', 1),
(28, 14, 'akanup67@gmail.com', 1),
(29, 15, '', 1),
(30, 9, '', 1),
(31, 4, 'akanup67@gmail.com', 1),
(32, 5, '', 1);

-- --------------------------------------------------------

--
-- Table structure for table `product_order`
--

CREATE TABLE `product_order` (
  `orderid` int(11) NOT NULL,
  `email` varchar(50) NOT NULL,
  `country` varchar(50) NOT NULL,
  `fname` varchar(50) NOT NULL,
  `lname` varchar(50) NOT NULL,
  `address` varchar(500) NOT NULL,
  `state` varchar(50) NOT NULL,
  `zip` int(11) NOT NULL,
  `contact` int(11) NOT NULL,
  `noofproducts` int(11) NOT NULL,
  `totalamount` int(11) NOT NULL,
  `order_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `modeofpayment` varchar(50) NOT NULL,
  `transactionid` varchar(200) NOT NULL,
  `status` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `product_order_details`
--

CREATE TABLE `product_order_details` (
  `orderdetailsid` int(11) NOT NULL,
  `orderid` int(11) NOT NULL,
  `productid` int(11) NOT NULL,
  `qnt` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `upload_pro`
--

CREATE TABLE `upload_pro` (
  `productid` int(11) NOT NULL,
  `type` varchar(50) NOT NULL,
  `name` varchar(50) NOT NULL,
  `price` double NOT NULL,
  `stock` varchar(50) NOT NULL,
  `image` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `upload_pro`
--

INSERT INTO `upload_pro` (`productid`, `type`, `name`, `price`, `stock`, `image`) VALUES
(1, 'men', 'Red-Shirt', 799, '10', 'upload/shirts4.jpg'),
(2, 'men', 'Blue-Shirt', 799, '10', 'upload/shirts.jpg'),
(3, 'men', 'Black-Shirt', 799, '10', 'upload/shirts3.jpg'),
(4, 'men', 'Soft Pink-Shirt', 699, '20', 'upload/shirts2.jpg'),
(5, 'woman', 'Soft Pink-T-Shirt', 499, '10', 'upload/woman.jpg'),
(6, 'woman', 'Black-T-Shirt', 599, '10', 'upload/woman2.jpeg'),
(7, 'kid_men', 'White-Shirt', 449, '20', 'upload/kid_men.jpeg'),
(8, 'kid_men', 'Kids White-Shirt', 449, '10', 'upload/kid_men2.jpeg'),
(9, 'kid_men', 'Soft-Green-Shirt', 549, '20', 'upload/kid_men3.jpeg'),
(10, 'kid_woman', 'Sky Blue T-Shirt', 349, '10', 'upload/kid_woman.jpeg'),
(11, 'kid_woman', 'Sky Blue Cotton Frocks', 349, '20', 'upload/kid_woman2.jpeg'),
(12, 'kid_woman', 'Soft Pink Baby Dress', 449, '20', 'upload/kid_woman3.jpeg'),
(13, 'kid_woman', 'Baby Girl Frock', 549, '20', 'upload/kid_woman4.jpeg'),
(14, 'kid_woman', 'Little Baby Dress', 649, '20', 'upload/kid_woman5.jpeg'),
(15, 'kid_woman', 'Sky Blue Cotton Frocks', 449, '10', 'upload/kid_woman6.jpeg');

-- --------------------------------------------------------

--
-- Table structure for table `user_regis`
--

CREATE TABLE `user_regis` (
  `email` varchar(50) NOT NULL,
  `name` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `gender` varchar(50) NOT NULL,
  `contact` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user_regis`
--

INSERT INTO `user_regis` (`email`, `name`, `password`, `gender`, `contact`) VALUES
('akanup67@gmail.com', 'akanup67', '123456', 'Male', '8981887239'),
('deyarupkumar97@gmail.com', 'Arup Dey', '12345', 'Male', '9832920152'),
('deysouvikkumar3@gmail.com', 'Souvik', '345', 'Male', '8596584789'),
('sougata.nandi2007@gmail.com', 'Sougata Nandi', '123', 'Male', '9685755869'),
('souvik45@gmail.com', 'Souvik Dey', '345', 'Male', '8596584758');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`cartid`);

--
-- Indexes for table `product_order`
--
ALTER TABLE `product_order`
  ADD PRIMARY KEY (`orderid`),
  ADD KEY `email` (`email`);

--
-- Indexes for table `product_order_details`
--
ALTER TABLE `product_order_details`
  ADD PRIMARY KEY (`orderdetailsid`),
  ADD KEY `orderid` (`orderid`);

--
-- Indexes for table `upload_pro`
--
ALTER TABLE `upload_pro`
  ADD PRIMARY KEY (`productid`);

--
-- Indexes for table `user_regis`
--
ALTER TABLE `user_regis`
  ADD PRIMARY KEY (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `cartid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `product_order`
--
ALTER TABLE `product_order`
  MODIFY `orderid` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `product_order_details`
--
ALTER TABLE `product_order_details`
  MODIFY `orderdetailsid` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `upload_pro`
--
ALTER TABLE `upload_pro`
  MODIFY `productid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `product_order`
--
ALTER TABLE `product_order`
  ADD CONSTRAINT `product_order_ibfk_1` FOREIGN KEY (`email`) REFERENCES `user_regis` (`email`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `product_order_details`
--
ALTER TABLE `product_order_details`
  ADD CONSTRAINT `product_order_details_ibfk_1` FOREIGN KEY (`orderid`) REFERENCES `product_order` (`orderid`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
