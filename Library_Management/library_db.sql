-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 19, 2021 at 08:01 PM
-- Server version: 10.4.19-MariaDB
-- PHP Version: 8.0.7

SET FOREIGN_KEY_CHECKS=0;
SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `library_db`
--
CREATE DATABASE IF NOT EXISTS `library_db` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `library_db`;

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--
-- Creation: Oct 28, 2021 at 01:38 PM
--

DROP TABLE IF EXISTS `admin`;
CREATE TABLE `admin` (
  `adminId` int(11) NOT NULL,
  `adminName` varchar(60) NOT NULL,
  `password` varchar(150) NOT NULL,
  `username` varchar(60) NOT NULL,
  `email` varchar(60) NOT NULL,
  `photo` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- RELATIONSHIPS FOR TABLE `admin`:
--

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`adminId`, `adminName`, `password`, `username`, `email`, `photo`) VALUES
(9, 'Sanika Divekar', '@1234', 'sanikad', 'sanikav.divekar20@vit.edu', 'posts-images/163993089681.jpeg'),
(10, 'Sanket Jadhav', 'san@1234', 'jadhavsanket', 'sanket.jadhav20@vit.edu', 'posts-images/163993128830.png'),
(11, 'Tejas Pacharne', 'tejas@321', 'tpvisrus', 'tejas.pacharne20@vit.edu', 'posts-images/163993168973.jpeg');

-- --------------------------------------------------------

--
-- Table structure for table `books`
--
-- Creation: Oct 28, 2021 at 01:38 PM
--

DROP TABLE IF EXISTS `books`;
CREATE TABLE `books` (
  `bookId` int(11) NOT NULL,
  `bookTitle` varchar(150) NOT NULL,
  `author` varchar(60) NOT NULL,
  `ISBN` varchar(30) NOT NULL,
  `bookCopies` varchar(10) NOT NULL,
  `publisherName` varchar(60) NOT NULL,
  `available` varchar(10) NOT NULL,
  `categories` varchar(30) NOT NULL,
  `callNumber` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- RELATIONSHIPS FOR TABLE `books`:
--

--
-- Dumping data for table `books`
--

INSERT INTO `books` (`bookId`, `bookTitle`, `author`, `ISBN`, `bookCopies`, `publisherName`, `available`, `categories`, `callNumber`) VALUES
(8, 'Data Structure Using C', 'Sharad Kumar Verma', '978-93-5163-389-1', '23', 'Thakur Publications Lucknow', 'YES', 'Educational', '1'),
(9, 'Integrating Educational Technology Into Teaching', 'Roblyer M. D.', '013379279', '22', 'Mac Grew Hill', 'SELECT', 'Educational', '2'),
(10, 'Oxford Dictionary of English', 'Judy Pearsall', '978-0199571123', '5', 'Oxford University Press', 'YES', 'Dictionary', '3'),
(11, 'Twilight', 'Meyer, Stephenie', '9780073256917', '19', 'Little, Brown Book', 'YES', 'Thriller', '4'),
(12, 'Angels and Demons', 'Brown, Dan', '13: 9780486436531', '14', 'Transworld', 'YES', 'Crime, Thriller & Adventure', '5'),
(13, 'Short History of Nearly Everything', 'Bryson Bill', '13: 9780834173385', '16', 'Lillenas Publishing Company', 'YES', 'Popular Science', '6');

-- --------------------------------------------------------

--
-- Table structure for table `borrow`
--
-- Creation: Oct 28, 2021 at 01:38 PM
--

DROP TABLE IF EXISTS `borrow`;
CREATE TABLE `borrow` (
  `borrowId` int(11) NOT NULL,
  `memberName` varchar(255) NOT NULL,
  `matricNo` varchar(10) NOT NULL,
  `bookName` varchar(255) NOT NULL,
  `borrowDate` varchar(20) NOT NULL,
  `returnDate` varchar(20) NOT NULL,
  `bookId` int(2) NOT NULL,
  `borrowStatus` int(2) NOT NULL,
  `fine` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- RELATIONSHIPS FOR TABLE `borrow`:
--

-- --------------------------------------------------------

--
-- Table structure for table `news`
--
-- Creation: Oct 28, 2021 at 01:38 PM
--

DROP TABLE IF EXISTS `news`;
CREATE TABLE `news` (
  `newsId` int(11) NOT NULL,
  `announcement` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- RELATIONSHIPS FOR TABLE `news`:
--

--
-- Dumping data for table `news`
--

INSERT INTO `news` (`newsId`, `announcement`) VALUES
(1, 'Welcome to Our Online Library Management System. You can have access to all our e-books at a really good affordable price!'),
(6, 'Man don\'t dance'),
(9, 'Godfrey Okoye is going Places');

-- --------------------------------------------------------

--
-- Table structure for table `students`
--
-- Creation: Oct 28, 2021 at 01:38 PM
--

DROP TABLE IF EXISTS `students`;
CREATE TABLE `students` (
  `studentId` int(11) NOT NULL,
  `matric_no` varchar(30) NOT NULL,
  `password` varchar(150) NOT NULL,
  `username` varchar(150) NOT NULL,
  `email` varchar(60) NOT NULL,
  `dept` varchar(60) NOT NULL,
  `numOfBooks` int(11) NOT NULL,
  `moneyOwed` varchar(20) NOT NULL,
  `photo` text NOT NULL,
  `phoneNumber` varchar(11) NOT NULL,
  `name` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- RELATIONSHIPS FOR TABLE `students`:
--

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`studentId`, `matric_no`, `password`, `username`, `email`, `dept`, `numOfBooks`, `moneyOwed`, `photo`, `phoneNumber`, `name`) VALUES
(5, 'ADSE- 120201', 'swap@123', 'swapnilm', 'swapnil.mate19@vit.edu', 'Computer Engineering', 0, 'null', '6499_1639937233.png', 'swapnil.mat', 'Swapnil Rajendra Mate'),
(6, 'ADSE- 120202', 'ashw@123', 'ashwinib', 'ashwini.biradar20@vit.edu', 'Information Technology', 0, 'null', '4772_1639938902.jpeg', 'ashwini.bir', 'Ashwini Arun Biradar');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`adminId`);

--
-- Indexes for table `books`
--
ALTER TABLE `books`
  ADD PRIMARY KEY (`bookId`);

--
-- Indexes for table `borrow`
--
ALTER TABLE `borrow`
  ADD PRIMARY KEY (`borrowId`);

--
-- Indexes for table `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`newsId`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`studentId`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `adminId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `books`
--
ALTER TABLE `books`
  MODIFY `bookId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `borrow`
--
ALTER TABLE `borrow`
  MODIFY `borrowId` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `news`
--
ALTER TABLE `news`
  MODIFY `newsId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `studentId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
SET FOREIGN_KEY_CHECKS=1;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
