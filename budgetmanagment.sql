-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 22, 2019 at 03:44 PM
-- Server version: 10.1.36-MariaDB
-- PHP Version: 7.2.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `budgetmanagment`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `cat_id` int(3) NOT NULL,
  `name` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`cat_id`, `name`) VALUES
(54, 'Rroga'),
(56, 'Qera'),
(57, 'Kontrate Sherbi'),
(59, 'Hua');

-- --------------------------------------------------------

--
-- Table structure for table `catoutcategories`
--

CREATE TABLE `catoutcategories` (
  `catout_id` int(3) NOT NULL,
  `name` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `catoutcategories`
--

INSERT INTO `catoutcategories` (`catout_id`, `name`) VALUES
(1, 'Shtepia'),
(3, 'Arsimi'),
(4, 'Makina'),
(5, 'Ushqime'),
(6, 'Argetim'),
(7, 'Sherbime');

-- --------------------------------------------------------

--
-- Table structure for table `incoming`
--

CREATE TABLE `incoming` (
  `incoming_id` int(100) NOT NULL,
  `incoming_value` double NOT NULL,
  `incoming_name` varchar(100) NOT NULL,
  `user_id` int(100) NOT NULL,
  `cat_id` int(11) NOT NULL,
  `datafutjes` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `incoming`
--

INSERT INTO `incoming` (`incoming_id`, `incoming_value`, `incoming_name`, `user_id`, `cat_id`, `datafutjes`) VALUES
(25, 32200, 'Banesa nr 1', 8, 56, '2019-02-12'),
(26, 40000, 'Rroga', 8, 54, '0000-00-00'),
(31, 7, '', 8, 54, '0000-00-00'),
(33, 3200, 'Goni', 8, 59, '0000-00-00'),
(35, 3000, 'Bonus rroge', 8, 54, '0000-00-00'),
(39, 123, 'dsa', 6, 54, '0000-00-00'),
(40, 1244, 'rg', 6, 54, '0000-00-00'),
(41, 1350, 'fassfa', 6, 54, '0000-00-00'),
(42, 320, 'gssa', 6, 54, '2019-02-12'),
(47, 5000, 'Mirmbajta#22', 8, 57, '2019-02-27');

-- --------------------------------------------------------

--
-- Table structure for table `outcoming`
--

CREATE TABLE `outcoming` (
  `outcoming_id` int(100) NOT NULL,
  `outcoming_value` double NOT NULL,
  `outcoming_name` varchar(100) NOT NULL,
  `user_id` int(100) NOT NULL,
  `outcat_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `outcoming`
--

INSERT INTO `outcoming` (`outcoming_id`, `outcoming_value`, `outcoming_name`, `user_id`, `outcat_id`) VALUES
(13, 30001, 'Televizor', 8, 1),
(17, 500, 'Liber', 8, 3),
(19, 322, 'DVD', 6, 1),
(20, 54, 'Televizor', 6, 4),
(21, 845, 'Net', 6, 7),
(22, 1000, 'Pushime', 8, 6),
(23, 845, 'Travel', 6, 5),
(24, 300, 'Artikuj', 8, 1);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(3) NOT NULL,
  `username` varchar(255) NOT NULL,
  `user_password` varchar(255) NOT NULL,
  `user_firstname` varchar(255) NOT NULL,
  `user_lastname` varchar(255) NOT NULL,
  `user_email` varchar(255) NOT NULL,
  `user_role` varchar(255) NOT NULL,
  `randSalt` varchar(255) NOT NULL DEFAULT '$2y$10$keyperhash22'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `username`, `user_password`, `user_firstname`, `user_lastname`, `user_email`, `user_role`, `randSalt`) VALUES
(6, 'Bledi', '$2y$12$jYIqe3yl/YF66/2s0ylwcOCOeaAezJ54MMLO9XIQl00KP8KKaJtji', 'nbgfvdc', 'refw', 'juhgfd@ygtfd', 'admin', '$2y$10$iusesomecrazystrings22'),
(7, 'redi', '$2y$12$.qSAux8CWupLXbhgCvcP9OdXxMWVr4Xtdu61NCcfU.nVdnX1E2vuy', 'iu;khn', 'giohlk', 't7yoij@ugkh', 'user', '$2y$10$iusesomecrazystrings22'),
(8, 'ari', '$2y$12$qHBvwkiaiOi3srpBC4p6re4J4muoLhF1h.EklXgJIZufmUhoa9UU2', 'yetas', 'tesp3', 'adsoj@fsaf.com', 'user', '$2y$10$iusesomecrazystrings22'),
(11, 'femija', '$2y$12$6v.p7dosPtD0.crRf7lje.r4486J1dgzLzS2UKpwHmdocqkwQRMfu', 'femija', 'ipare', 'femija@iprare.com', 'user', '$2y$10$iusesomecrazystrings22'),
(12, 'ef', '$2y$10$XiyIPZipArVVENUNky62VeAzWYUJ.QVtZmsIexOq2/my7xEWkK5Qu', 'fsa', 'af', 'afo@osd.com', 'user', '$2y$10$iusesomecrazystrings22'),
(13, 'besi', '$2y$12$eZtILAhVfflklgXdOfz9sOOZTkawTFrF.TDOFxvwUXqFteJYez9La', 'Besian', 'Kolmarkaj', 'bdsbpf@yasda.com', 'user', '$2y$10$iusesomecrazystrings22'),
(14, 'dsafasi', '$2y$12$xOc4vTGpBTbgG4ESTT2seOIRT36UNypqvhZHaUxreNES4a2NaQrrK', 'adso', 'sdgdoj', 'sfigds@gdsd.com', 'user', '$2y$10$iusesomecrazystrings22'),
(15, 'alteo', '$2y$10$Goi108LRmRoPiNSc2qwocOfxFi345HUNSEu5vh/wC/uwjqk7g.6Dm', 'Alteo', 'M', 'alteo@gmail.com', 'user', '$2y$10$keyperhash22');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`cat_id`);

--
-- Indexes for table `catoutcategories`
--
ALTER TABLE `catoutcategories`
  ADD PRIMARY KEY (`catout_id`);

--
-- Indexes for table `incoming`
--
ALTER TABLE `incoming`
  ADD PRIMARY KEY (`incoming_id`),
  ADD KEY `cat_id` (`cat_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `outcoming`
--
ALTER TABLE `outcoming`
  ADD PRIMARY KEY (`outcoming_id`),
  ADD KEY `outcat_id` (`outcat_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `cat_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=60;

--
-- AUTO_INCREMENT for table `catoutcategories`
--
ALTER TABLE `catoutcategories`
  MODIFY `catout_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `incoming`
--
ALTER TABLE `incoming`
  MODIFY `incoming_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT for table `outcoming`
--
ALTER TABLE `outcoming`
  MODIFY `outcoming_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `incoming`
--
ALTER TABLE `incoming`
  ADD CONSTRAINT `incoming_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`),
  ADD CONSTRAINT `incoming_ibfk_2` FOREIGN KEY (`cat_id`) REFERENCES `categories` (`cat_id`);

--
-- Constraints for table `outcoming`
--
ALTER TABLE `outcoming`
  ADD CONSTRAINT `outcoming_ibfk_1` FOREIGN KEY (`outcat_id`) REFERENCES `catoutcategories` (`catout_id`),
  ADD CONSTRAINT `outcoming_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
