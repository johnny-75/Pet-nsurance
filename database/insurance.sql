-- phpMyAdmin SQL Dump
-- version 4.8.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 28, 2018 at 07:05 AM
-- Server version: 10.1.31-MariaDB
-- PHP Version: 5.6.35

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `insurance`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`username`, `password`) VALUES
('admin', '81dc9bdb52d04dc20036dbd8313ed055');

-- --------------------------------------------------------

--
-- Table structure for table `claim_policy`
--

CREATE TABLE `claim_policy` (
  `claim_id` int(11) NOT NULL,
  `claim_status` int(11) NOT NULL DEFAULT '0',
  `insurance_id` int(11) NOT NULL,
  `reason` varchar(50) NOT NULL,
  `description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `claim_policy`
--

INSERT INTO `claim_policy` (`claim_id`, `claim_status`, `insurance_id`, `reason`, `description`) VALUES
(1, 1, 1001, 'illnesses', 'appling claim for illness of the pet'),
(2, 0, 1001, 'injury', 'sdfsd');

-- --------------------------------------------------------

--
-- Table structure for table `enquiries`
--

CREATE TABLE `enquiries` (
  `query_id` int(11) NOT NULL,
  `fname` varchar(50) NOT NULL,
  `lname` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phone` varchar(15) NOT NULL,
  `query` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `enquiries`
--

INSERT INTO `enquiries` (`query_id`, `fname`, `lname`, `email`, `phone`, `query`) VALUES
(5, 'johnson', 'nadar', 'johnson581314@gamil.com', '1323664455', 'sdfasdf'),
(6, 'johnson', 'nadar', 'johnson581314@gamil.com', '1323664455', 'hello how are you?'),
(7, 'johnson', 'nadar', 'johnson581314@gamil.com', '1323664455', 'hello how are you?'),
(8, 'johnson', 'nadar', 'johnson581314@gamil.com', '1323664455', 'hello how are you?'),
(9, 'johnson', 'nadar', 'johnson581314@gamil.com', '1323664455', 'hello how are you?'),
(10, 'johnson', 'nadar', 'johnson581314@gamil.com', '1323664455', 'hello how are you?');

-- --------------------------------------------------------

--
-- Table structure for table `insured_pet`
--

CREATE TABLE `insured_pet` (
  `insured_status` int(11) NOT NULL DEFAULT '0',
  `insurance_id` int(11) NOT NULL,
  `userid` int(11) NOT NULL,
  `pet_type` varchar(5) NOT NULL,
  `breed` varchar(100) NOT NULL,
  `pet_name` varchar(50) NOT NULL,
  `pet_gender` varchar(10) NOT NULL,
  `pet_dob` varchar(15) NOT NULL,
  `pet_age` int(11) NOT NULL,
  `invest` bigint(20) NOT NULL,
  `term` int(11) NOT NULL,
  `is_injured` varchar(5) NOT NULL,
  `is_vet` varchar(5) NOT NULL,
  `is_insured` varchar(5) NOT NULL,
  `challan_number` varchar(50) NOT NULL,
  `payment_date` varchar(20) NOT NULL,
  `description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `insured_pet`
--

INSERT INTO `insured_pet` (`insured_status`, `insurance_id`, `userid`, `pet_type`, `breed`, `pet_name`, `pet_gender`, `pet_dob`, `pet_age`, `invest`, `term`, `is_injured`, `is_vet`, `is_insured`, `challan_number`, `payment_date`, `description`) VALUES
(1, 1001, 101, 'Dog', 'Affenpinscher', 'puppy', 'male', '2018-01-01', 3, 100000, 1, 'no', 'no', 'no', '', '', ''),
(2, 1002, 101, 'Dog', 'Affenpinscher', 'puppy', 'male', '2018-01-01', 3, 100000, 1, 'no', 'no', 'no', 'sf3534', '2018-05-09', 'sdfasda');

-- --------------------------------------------------------

--
-- Table structure for table `profile`
--

CREATE TABLE `profile` (
  `userid` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `age` int(11) NOT NULL,
  `phone` varchar(15) NOT NULL,
  `add1` text NOT NULL,
  `city` text NOT NULL,
  `state` varchar(50) NOT NULL,
  `pincode` varchar(10) NOT NULL,
  `occupation` varchar(50) NOT NULL,
  `pic` text NOT NULL,
  `gender` varchar(10) NOT NULL,
  `about` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `profile`
--

INSERT INTO `profile` (`userid`, `name`, `age`, `phone`, `add1`, `city`, `state`, `pincode`, `occupation`, `pic`, `gender`, `about`) VALUES
(101, 'johnson nadar', 21, '8095654723', 'ankola', 'Bangalore', 'Karnataka', '560004', 'student', '101.jpg', 'male', 'good boy'),
(102, 'Johnny Nadar', 0, '', '', '', '', '', '', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `userid` int(11) NOT NULL,
  `fname` varchar(50) NOT NULL,
  `lname` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`userid`, `fname`, `lname`, `email`, `password`) VALUES
(101, 'johnson', 'nadar', 'johnson581314@gmail.com', 'b59c67bf196a4758191e42f76670ceba'),
(102, 'Johnny', 'Nadar', 'abc@gmail.com', 'b59c67bf196a4758191e42f76670ceba');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`username`);

--
-- Indexes for table `claim_policy`
--
ALTER TABLE `claim_policy`
  ADD UNIQUE KEY `claim_id` (`claim_id`);

--
-- Indexes for table `enquiries`
--
ALTER TABLE `enquiries`
  ADD PRIMARY KEY (`query_id`);

--
-- Indexes for table `insured_pet`
--
ALTER TABLE `insured_pet`
  ADD PRIMARY KEY (`insurance_id`);

--
-- Indexes for table `profile`
--
ALTER TABLE `profile`
  ADD PRIMARY KEY (`userid`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`userid`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `claim_policy`
--
ALTER TABLE `claim_policy`
  MODIFY `claim_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `enquiries`
--
ALTER TABLE `enquiries`
  MODIFY `query_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
