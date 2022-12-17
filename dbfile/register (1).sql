-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: Dec 16, 2022 at 10:39 AM
-- Server version: 5.7.26
-- PHP Version: 7.3.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `register`
--

-- --------------------------------------------------------

--
-- Table structure for table `add_contect`
--

CREATE TABLE `add_contect` (
  `c_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `surname` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL,
  `mobail_no` bigint(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `add_contect`
--

INSERT INTO `add_contect` (`c_id`, `user_id`, `name`, `surname`, `city`, `mobail_no`) VALUES
(1, 1, 'Nitinbhai', 'Thummar', 'Mehsana', 9081057293),
(2, 1, 'Kajal', 'Thummar', 'Surat', 9909357299),
(3, 1, 'Janki', 'Thummar', 'Navsari', 9925859029),
(4, 2, 'Sumiben ', 'Thummar', 'Ahemdabad', 8000140002),
(6, 2, 'kunj Don', 'Thummar', 'Vapi', 1234567890),
(7, 2, 'Kavya', 'Thummar', 'Navsari', 1234567890),
(8, 2, 'Riya', 'Thummar', 'Vapi', 1234567890),
(10, 1, 'kirab', 'sdjufo', 'Mehsana', 1234567890),
(11, 1, 'sdnbsiew', 'cyiuhln', 'Bardoli', 1234567890),
(12, 1, 'kgh', 'wasedrtyui', 'Navsari', 1234567890),
(13, 1, 'svgdyeid', 'cgh', 'Baroda', 1234567890),
(14, 1, 'Riya', 'Thummar', 'Mehsana', 1234567890),
(15, 1, 'Kavu', 'Thummar', 'Ahemdabad', 1234567890),
(16, 1, 'kinjal ben', 'Thummar', 'Vapi', 1234567890);

-- --------------------------------------------------------

--
-- Table structure for table `form_data`
--

CREATE TABLE `form_data` (
  `Id` int(11) NOT NULL,
  `Name` varchar(255) NOT NULL,
  `Surname` varchar(255) NOT NULL,
  `Address` varchar(255) NOT NULL,
  `Email` varchar(255) NOT NULL,
  `Password` varchar(255) NOT NULL,
  `Dob` date NOT NULL,
  `City` varchar(255) NOT NULL,
  `Document` varchar(255) NOT NULL,
  `Image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `form_data`
--

INSERT INTO `form_data` (`Id`, `Name`, `Surname`, `Address`, `Email`, `Password`, `Dob`, `City`, `Document`, `Image`) VALUES
(3, 'Sanju', 'Thummar', 'c-34,Shivdarshan soc', 'rutikthummar@gmail.com ', 'rutik123', '2001-01-11', 'Surat', 'Water Bill', 'IMG_20220408_235145_894.webp');

-- --------------------------------------------------------

--
-- Table structure for table `form_data1`
--

CREATE TABLE `form_data1` (
  `Id` int(11) NOT NULL,
  `Email` varchar(255) NOT NULL,
  `Password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `form_data1`
--

INSERT INTO `form_data1` (`Id`, `Email`, `Password`) VALUES
(1, 'rutik@gmail.com', 'rutik@123'),
(2, 'rutvi@gmail.com', 'rutvi123'),
(3, 'lalo@gmail.com', 'lalo123');

-- --------------------------------------------------------

--
-- Table structure for table `register_form`
--

CREATE TABLE `register_form` (
  `R_id` int(11) NOT NULL,
  `Name` varchar(255) NOT NULL,
  `Surname` varchar(255) NOT NULL,
  `Address` varchar(255) NOT NULL,
  `Email` varchar(255) NOT NULL,
  `Password` varchar(255) NOT NULL,
  `Dob` date NOT NULL,
  `City` varchar(255) NOT NULL,
  `Document` varchar(255) NOT NULL,
  `Image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `register_form`
--

INSERT INTO `register_form` (`R_id`, `Name`, `Surname`, `Address`, `Email`, `Password`, `Dob`, `City`, `Document`, `Image`) VALUES
(1, 'Rutik', 'Thummar', 'c-34,Shivdarshan soc,Yogi chowk', 'rutik@gmail.com ', 'rutik@123', '2004-02-12', 'Surat', 'Water Bill', 'IMG_20220519_100154434.jpg'),
(2, 'Sanjaybhai', 'Thummar', '109,Galani Park soc,Chikuvadi', 'sanju@gmail.com ', 'san@123', '1990-01-01', 'Surat', 'Water Bill', 'IMG20220409124338.jpg'),
(3, 'Lalo', 'Panseriya', 'meriton plaza', 'lalo@gmail.com ', 'lalo@123', '2000-02-11', 'Surat', 'Water Bill', 'IMG20211110171038.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `add_contect`
--
ALTER TABLE `add_contect`
  ADD PRIMARY KEY (`c_id`);

--
-- Indexes for table `form_data`
--
ALTER TABLE `form_data`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `form_data1`
--
ALTER TABLE `form_data1`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `register_form`
--
ALTER TABLE `register_form`
  ADD PRIMARY KEY (`R_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `add_contect`
--
ALTER TABLE `add_contect`
  MODIFY `c_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `form_data`
--
ALTER TABLE `form_data`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `form_data1`
--
ALTER TABLE `form_data1`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `register_form`
--
ALTER TABLE `register_form`
  MODIFY `R_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
