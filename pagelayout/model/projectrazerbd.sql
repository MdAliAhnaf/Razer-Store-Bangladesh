-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 17, 2022 at 01:11 AM
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
-- Database: `projectrazerbd`
--

-- --------------------------------------------------------

--
-- Table structure for table `comments_section`
--

CREATE TABLE `comments_section` (
  `Idc` int(100) NOT NULL,
  `Namec` varchar(100) NOT NULL,
  `Emailc` varchar(100) NOT NULL,
  `Commentz` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `comments_section`
--

INSERT INTO `comments_section` (`Idc`, `Namec`, `Emailc`, `Commentz`) VALUES
(1, 'Life is a MEME', 'memeislife@outlook.com', 'Meme is everything.\nI am pretty good at razer products meme.\nSend me free products :\') cause I am '),
(2, 'Unknown Warrior', 'lifeisunknown@outlook.com', 'I am from the Unknown by the Unknown :3\nYour products are authentic and pretty fast delivery I got.'),
(3, 'Sad Warrior', 'lifeissad@outlook.com', 'I am sad and known by all :3\nYour products are authentic btw I am a bit sad cause I didn\'t get any discounts :/'),
(4, 'Tech Geek', 'geektech@outlook.com', 'I am a tech seeker, When I opened the product\nAt Glance I knew they were authentic.'),
(5, 'Sad Geek', 'sadgeek@outlook.com', 'I am a tech seeker, when I opened the product at Glance I knew they were authentic.'),
(6, 'True Gamer', 'gaming24_7@outlook.com', 'I am gamer that\'s why I buy gaming products from quality brands\nRazer product from them is pretty '),
(7, 'Tech keeper', 'tech_keeper@gmail.com', 'I am gamer and I keep all tech as in my collection\r\nI am a razer nerd so I rushed and delivered prod'),
(8, 'Low budget Gamer', 'gaming_low@yahoo.com', 'I am gamer so I buy razer products which are cheap Mainly I did buy it because I did got discount offer yay!'),
(9, 'DEADLIFE', 'lifeisneardead@hotmail.com', 'I really want to die. So I will game till death any Razer Store BD is my best peripheral buddy!'),
(10, 'jigglypuff', 'gamergirlbd@gmail.com', 'I got my pink colored Razer mouse. I was searching everywhere then I found the authentic shop with reasonable price :)');

-- --------------------------------------------------------

--
-- Table structure for table `user_admin_data`
--

CREATE TABLE `user_admin_data` (
  `Id` int(100) NOT NULL,
  `Name` text NOT NULL,
  `Email` varchar(100) NOT NULL,
  `Adminname` varchar(100) NOT NULL,
  `Adminpassword` varchar(100) NOT NULL,
  `Gender` varchar(100) NOT NULL,
  `Dob` date NOT NULL,
  `Phone` varchar(100) NOT NULL,
  `Preadd` varchar(100) NOT NULL,
  `Religion` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_admin_data`
--

INSERT INTO `user_admin_data` (`Id`, `Name`, `Email`, `Adminname`, `Adminpassword`, `Gender`, `Dob`, `Phone`, `Preadd`, `Religion`) VALUES
(1, 'Anonymous Coder GG', 'gg_coder@hotmail.com', 'gg_coder', '1Wertyui@@', 'Male', '1999-02-22', '01711111111', 'No where', 'N/A');

-- --------------------------------------------------------

--
-- Table structure for table `user_data`
--

CREATE TABLE `user_data` (
  `Id` int(100) NOT NULL,
  `Name` text NOT NULL,
  `Email` varchar(100) NOT NULL,
  `Username` varchar(100) NOT NULL,
  `Password` varchar(100) NOT NULL,
  `Gender` varchar(100) NOT NULL,
  `Dob` date NOT NULL,
  `Phone` varchar(100) NOT NULL,
  `Preadd` varchar(100) NOT NULL,
  `Religion` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_data`
--

INSERT INTO `user_data` (`Id`, `Name`, `Email`, `Username`, `Password`, `Gender`, `Dob`, `Phone`, `Preadd`, `Religion`) VALUES
(1, 'Md Ali Ahnaf', 'aliahnaf2012@gmail.com', 'Ahnaf', '1Wertyui@', 'Male', '1999-02-22', '01775752822', 'NHA-11, DOYEL TOWER, Flat C-6, LALMATIA', 'Islam'),
(9, 'GEGE', 'gege@gmail.com', 'gg', '1Wertyui@_', 'Other', '2022-04-18', '01775752811', 'Neptune', 'Islam');

-- --------------------------------------------------------

--
-- Table structure for table `user_orders`
--

CREATE TABLE `user_orders` (
  `Id` int(100) NOT NULL,
  `Order_Id` int(100) NOT NULL,
  `Item_Name` varchar(100) NOT NULL,
  `Price` double(100,2) NOT NULL,
  `Quantity` int(100) NOT NULL,
  `Pay_method` varchar(100) NOT NULL,
  `Product_total` double(100,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_orders`
--

INSERT INTO `user_orders` (`Id`, `Order_Id`, `Item_Name`, `Price`, `Quantity`, `Pay_method`, `Product_total`) VALUES
(1, 42, 'Razer DeathAdder V2 Pro - Genshin Impact Edition', 139.99, 2, 'COD', 279.98),
(1, 44, 'Razer DeathAdder V2 Special Edition', 69.99, 2, 'COD', 139.98),
(1, 46, 'Razer Viper Ultimate with Charging Dock - Quartz', 149.99, 1, 'COD', 149.99),
(1, 50, 'Razer DeathAdder V2 Pro - Genshin Impact Edition', 139.99, 1, 'COD', 139.99),
(1, 51, 'Razer Viper Ultimate with Charging Dock - Mercury', 149.99, 4, 'COD', 599.96),
(9, 53, 'Razer DeathAdder V2 Special Edition', 69.99, 4, 'COD', 279.96);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `comments_section`
--
ALTER TABLE `comments_section`
  ADD PRIMARY KEY (`Idc`);

--
-- Indexes for table `user_admin_data`
--
ALTER TABLE `user_admin_data`
  ADD PRIMARY KEY (`Id`),
  ADD UNIQUE KEY `Email` (`Email`);

--
-- Indexes for table `user_data`
--
ALTER TABLE `user_data`
  ADD PRIMARY KEY (`Id`),
  ADD UNIQUE KEY `Email` (`Email`);

--
-- Indexes for table `user_orders`
--
ALTER TABLE `user_orders`
  ADD PRIMARY KEY (`Order_Id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `comments_section`
--
ALTER TABLE `comments_section`
  MODIFY `Idc` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `user_admin_data`
--
ALTER TABLE `user_admin_data`
  MODIFY `Id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `user_data`
--
ALTER TABLE `user_data`
  MODIFY `Id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `user_orders`
--
ALTER TABLE `user_orders`
  MODIFY `Order_Id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
