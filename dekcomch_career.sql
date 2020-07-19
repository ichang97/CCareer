-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jul 19, 2020 at 04:07 PM
-- Server version: 10.2.23-MariaDB
-- PHP Version: 7.2.17

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dekcomch_career`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `admin_id` int(5) NOT NULL,
  `salutation` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `firstname` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `lastname` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `username` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `permission` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_id`, `salutation`, `firstname`, `lastname`, `username`, `password`, `permission`) VALUES
(10, 'นาย', 'testa', 'testa', 'Administator', '25ab3b38f7afc116f18fa9821e44d561', 1);

-- --------------------------------------------------------

--
-- Table structure for table `candidates`
--

CREATE TABLE `candidates` (
  `candidate_id` int(10) NOT NULL,
  `salutation` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `firstname` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `lastname` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `graduated_cert` varchar(500) COLLATE utf8_unicode_ci NOT NULL,
  `teach_cert_chk` int(2) NOT NULL,
  `tel` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `resume_path` longtext COLLATE utf8_unicode_ci NOT NULL,
  `img_path` longtext COLLATE utf8_unicode_ci NOT NULL,
  `bio` longtext COLLATE utf8_unicode_ci NOT NULL,
  `timestamp` datetime NOT NULL,
  `job_id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int(10) NOT NULL,
  `category_name` varchar(100) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `category_name`) VALUES
(1, 'ครู');

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `job_id` int(10) NOT NULL,
  `admin_id` int(10) NOT NULL,
  `title` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `category` int(5) NOT NULL,
  `description` longtext COLLATE utf8_unicode_ci NOT NULL,
  `location` int(5) NOT NULL,
  `status` int(1) NOT NULL,
  `quantity` int(10) NOT NULL,
  `timestamp` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `location`
--

CREATE TABLE `location` (
  `id` int(5) NOT NULL,
  `location_name` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `logo` longtext COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `location`
--

INSERT INTO `location` (`id`, `location_name`, `logo`) VALUES
(1, 'วิทยาลัยอาชีวศึกษาพณิชยการจำนงค์', 'วิทยาลัยอาชีวศึกษาพณิชยการจำนงค์.png'),
(2, 'วิทยาลัยเทคโนโลยีบริหารธุรกิจจำนงค์', 'วิทยาลัยเทคโนโลยีบริหารธุรกิจจำนงค์.png'),
(3, 'โรงเรียนจำนงค์วิทยา', 'ตราโรงเรียนจำนงค์วิทยา_250px.png'),
(4, 'โรงเรียนจำนงค์พิทยา', 'ตราโรงเรียนจำนงค์พิทยา.png');

-- --------------------------------------------------------

--
-- Stand-in structure for view `qry_candidate`
-- (See below for the actual view)
--
CREATE TABLE `qry_candidate` (
`job_id` int(10)
,`title` varchar(150)
,`location` int(5)
,`candidate_id` int(10)
,`salutation` varchar(30)
,`firstname` varchar(150)
,`lastname` varchar(150)
,`graduated_cert` varchar(500)
,`teach_cert_chk` int(2)
,`tel` varchar(10)
,`email` varchar(100)
,`resume_path` longtext
,`bio` longtext
,`timestamp` datetime
);

-- --------------------------------------------------------

--
-- Table structure for table `salutation`
--

CREATE TABLE `salutation` (
  `salutation` varchar(100) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `salutation`
--

INSERT INTO `salutation` (`salutation`) VALUES
('นาย'),
('นาง'),
('นางสาว'),
('ว่าที่ร้อยตรี'),
('ว่าที่ร้อยตรีหญิง');

-- --------------------------------------------------------

--
-- Table structure for table `status`
--

CREATE TABLE `status` (
  `id` int(1) NOT NULL,
  `status_name` varchar(70) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `status`
--

INSERT INTO `status` (`id`, `status_name`) VALUES
(0, 'ปิดรับสมัคร'),
(1, 'เปิดรับสมัคร');

-- --------------------------------------------------------

--
-- Structure for view `qry_candidate`
--
DROP TABLE IF EXISTS `qry_candidate`;

CREATE ALGORITHM=UNDEFINED DEFINER=`dekcomch_career`@`localhost` SQL SECURITY DEFINER VIEW `qry_candidate`  AS  select `jobs`.`job_id` AS `job_id`,`jobs`.`title` AS `title`,`jobs`.`location` AS `location`,`candidates`.`candidate_id` AS `candidate_id`,`candidates`.`salutation` AS `salutation`,`candidates`.`firstname` AS `firstname`,`candidates`.`lastname` AS `lastname`,`candidates`.`graduated_cert` AS `graduated_cert`,`candidates`.`teach_cert_chk` AS `teach_cert_chk`,`candidates`.`tel` AS `tel`,`candidates`.`email` AS `email`,`candidates`.`resume_path` AS `resume_path`,`candidates`.`bio` AS `bio`,`candidates`.`timestamp` AS `timestamp` from (`jobs` left join `candidates` on(`jobs`.`job_id` = `candidates`.`job_id`)) ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `candidates`
--
ALTER TABLE `candidates`
  ADD PRIMARY KEY (`candidate_id`),
  ADD UNIQUE KEY `candidate_id` (`candidate_id`),
  ADD KEY `job_id` (`job_id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`job_id`),
  ADD UNIQUE KEY `job_id` (`job_id`),
  ADD KEY `admin_id` (`admin_id`);

--
-- Indexes for table `location`
--
ALTER TABLE `location`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `status`
--
ALTER TABLE `status`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `admin_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `candidates`
--
ALTER TABLE `candidates`
  MODIFY `candidate_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `job_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `location`
--
ALTER TABLE `location`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `candidates`
--
ALTER TABLE `candidates`
  ADD CONSTRAINT `candidates_ibfk_1` FOREIGN KEY (`job_id`) REFERENCES `jobs` (`job_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `jobs`
--
ALTER TABLE `jobs`
  ADD CONSTRAINT `jobs_ibfk_1` FOREIGN KEY (`admin_id`) REFERENCES `admin` (`admin_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
