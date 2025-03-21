-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 21, 2025 at 11:53 AM
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
-- Database: `library`
--

-- --------------------------------------------------------

--
-- Table structure for table `books`
--

CREATE TABLE `books` (
  `bookid` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `genre` varchar(20) DEFAULT NULL,
  `author` varchar(255) DEFAULT NULL,
  `publisher` varchar(255) DEFAULT NULL,
  `language` varchar(20) NOT NULL DEFAULT 'English'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `books`
--

INSERT INTO `books` (`bookid`, `name`, `genre`, `author`, `publisher`, `language`) VALUES
(1, 'Bocchi the Rock!', 'Comic', 'Aki Hamazi', 'Houbunsha', 'English'),
(2, 'YuruYuri', 'Comic', 'Namori', 'Ichijinsha', 'English');

-- --------------------------------------------------------

--
-- Table structure for table `borrow`
--

CREATE TABLE `borrow` (
  `borrowid` int(11) NOT NULL,
  `userid` int(8) NOT NULL,
  `bdate` date NOT NULL DEFAULT current_timestamp() COMMENT 'borrow date',
  `rdate` date NOT NULL COMMENT 'return date',
  `bookid` int(20) NOT NULL,
  `returned` int(1) NOT NULL DEFAULT 0 COMMENT '0 = no, 1 = yes'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `borrow`
--

INSERT INTO `borrow` (`borrowid`, `userid`, `bdate`, `rdate`, `bookid`, `returned`) VALUES
(1, 1, '2025-02-23', '2025-03-02', 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `mail`
--

CREATE TABLE `mail` (
  `mailid` int(11) NOT NULL,
  `senderid` int(8) NOT NULL DEFAULT 0,
  `receiverid` int(8) NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `content` varchar(10000) NOT NULL,
  `mread` tinyint(4) NOT NULL DEFAULT 0 COMMENT '0 for unread, 1 for read',
  `maildate` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `userid` int(11) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(255) NOT NULL COMMENT 'hashed password',
  `dob` date DEFAULT NULL,
  `phone` text DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`userid`, `username`, `password`, `dob`, `phone`, `email`) VALUES
(1, 'jack', '$2y$10$nVr29KasbpaRMbw085YI9Otoml5nDjl50126vTjpOT.WVuBFgjyGa', NULL, '12345555', 'jack123@mail.com'),
(2, 'jerry', '$2y$10$bvmKctm1LpJKl3XkG/EEf.iMhhP1pNllCCdFQkEgOV4NSeWfA5YWG', NULL, '12345678', 'jerry@mail.com'),
(3, 'wilson', '$2y$10$rBQdozUfdiaq1NG2hi0gH.AXh6Vx1Z3cnpiHQ4ZPDficmUFQ0qkB2', '2025-10-16', '99991111', 'wilson123@mail.com'),
(4, 'henry', '$2y$10$yemHRTifn6fScU/bjyFCaeTmKQM1vohy.rVxxbYtg/k2TAphNjxCK', '0000-00-00', '99991111', '123@a.com');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `books`
--
ALTER TABLE `books`
  ADD PRIMARY KEY (`bookid`);

--
-- Indexes for table `borrow`
--
ALTER TABLE `borrow`
  ADD PRIMARY KEY (`borrowid`);

--
-- Indexes for table `mail`
--
ALTER TABLE `mail`
  ADD PRIMARY KEY (`mailid`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`userid`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `books`
--
ALTER TABLE `books`
  MODIFY `bookid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `borrow`
--
ALTER TABLE `borrow`
  MODIFY `borrowid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `mail`
--
ALTER TABLE `mail`
  MODIFY `mailid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `userid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
