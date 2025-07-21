-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 19, 2025 at 11:33 AM
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
-- Database: `restar_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `adminlogin`
--

CREATE TABLE `adminlogin` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `admin_email` varchar(50) NOT NULL,
  `pass` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `adminlogin`
--

INSERT INTO `adminlogin` (`id`, `name`, `admin_email`, `pass`) VALUES
(1, 'darsh', 'darshitaliya3@gmail.com', '123'),
(2, 'sahil', 'sahil@gmail.com', 'sahil'),
(3, 'vignesh', 'vignesh@gmail.com', 'vignesh'),
(4, 'hit', 'hhit381@gmail.com', 'Hit@4215');

-- --------------------------------------------------------

--
-- Table structure for table `cardcloths`
--

CREATE TABLE `cardcloths` (
  `id` int(11) NOT NULL,
  `cardno` text NOT NULL,
  `cardname` varchar(50) NOT NULL,
  `cardemail` varchar(50) NOT NULL,
  `cardmonth` enum('01','02','03','04','05','06','07','08','09','10','11','12') NOT NULL,
  `cardyear` year(4) NOT NULL,
  `cvv` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `cardcloths`
--

INSERT INTO `cardcloths` (`id`, `cardno`, `cardname`, `cardemail`, `cardmonth`, `cardyear`, `cvv`) VALUES
(0, '7847838784758745', 'darsh', 'darshitaliya3@gmail.com', '10', '2034', 8787),
(0, '7685687659878975', 'DARSH', 'darshitaliya3@gmail.com', '05', '2033', 8787),
(0, '8768465768687687', 'darsh', 'darshitaliya3@gmail.com', '10', '2033', 9787),
(0, '7686868686868686', 'hit', 'hhit381@gmail.com', '11', '2034', 7888),
(0, '3213212161616616', 'darsh', 'hhit381@gmail.com', '09', '2032', 4545);

-- --------------------------------------------------------

--
-- Table structure for table `cardevent`
--

CREATE TABLE `cardevent` (
  `id` int(11) NOT NULL,
  `cardno` text NOT NULL,
  `cardname` text NOT NULL,
  `cardemail` varchar(50) NOT NULL,
  `cardmonth` enum('01','02','03','04','05','06','07','08','09','10','11','12') NOT NULL,
  `cardyear` year(4) NOT NULL,
  `cvv` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `cardevent`
--

INSERT INTO `cardevent` (`id`, `cardno`, `cardname`, `cardemail`, `cardmonth`, `cardyear`, `cvv`) VALUES
(6, '8597548999898965', 'darsh italiya', 'darshitaliya3@gmail.com', '10', '2032', '6565');

-- --------------------------------------------------------

--
-- Table structure for table `cardoffer`
--

CREATE TABLE `cardoffer` (
  `id` int(11) NOT NULL,
  `cardno` varchar(20) NOT NULL,
  `cardname` varchar(50) NOT NULL,
  `cardemail` varchar(50) NOT NULL,
  `cardmonth` enum('01','02','03','04','05','06','07','08','09','10','11','12') NOT NULL,
  `cardyear` year(4) NOT NULL,
  `cvv` varchar(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `cardoffer`
--

INSERT INTO `cardoffer` (`id`, `cardno`, `cardname`, `cardemail`, `cardmonth`, `cardyear`, `cvv`) VALUES
(24, '7896528595684985', 'Neel', 'hhit381@gmail.com', '10', '2026', '4545'),
(25, '7895234129845698', 'Heet ', 'hhit381@gmial.com', '08', '2028', '5557');

-- --------------------------------------------------------

--
-- Table structure for table `cardroom`
--

CREATE TABLE `cardroom` (
  `id` int(11) NOT NULL,
  `cardno` text NOT NULL,
  `cardname` varchar(50) NOT NULL,
  `cardemail` varchar(50) NOT NULL,
  `cardmonth` enum('01','02','03','04','05','06','07','08','09','10','11','12') NOT NULL,
  `cardyear` year(4) NOT NULL,
  `cvv` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `cardroom`
--

INSERT INTO `cardroom` (`id`, `cardno`, `cardname`, `cardemail`, `cardmonth`, `cardyear`, `cvv`) VALUES
(8, '2610200459129409', 'darsh italiya', 'darshitaliya3@gmail.com', '11', '2031', 2610),
(19, '5486456874514516', 'Jeet', 'Jeet@gmail.com', '02', '2025', 5345),
(21, '7878987788787878', 'darsh', 'darshitaliya3@gmail.com', '11', '2036', 4878),
(22, '7826845842652684', 'Keet', 'hhit381@gmail.com', '08', '2026', 5202);

-- --------------------------------------------------------

--
-- Table structure for table `cardticket`
--

CREATE TABLE `cardticket` (
  `cardid` int(11) NOT NULL,
  `cardno` text NOT NULL,
  `cardname` varchar(50) NOT NULL,
  `cardemail` varchar(50) NOT NULL,
  `cardmonth` enum('01','02','03','04','05','06','07','08','09','10','11','12') NOT NULL,
  `cardyear` year(4) NOT NULL,
  `cvv` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `cardticket`
--

INSERT INTO `cardticket` (`cardid`, `cardno`, `cardname`, `cardemail`, `cardmonth`, `cardyear`, `cvv`) VALUES
(34, '6577557887687687', 'vishv', 'vishv@gmail.com', '08', '2032', '7582'),
(35, '7894561237894561', 'Sahil', 'sahil@gmail.com', '08', '2025', '7785'),
(36, '4285284512454521', 'heet', 'sdsd@gmail.com', '10', '2034', '9635');

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE `contact` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` text NOT NULL,
  `subject` varchar(25) NOT NULL,
  `message` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `contact`
--

INSERT INTO `contact` (`id`, `username`, `email`, `phone`, `subject`, `message`) VALUES
(3, 'ITALIYA DARSH ', 'darshitaliya3@gmail.com', '9409970864', 'BOOKING QUERY', 'EXPLAIN PACKAGES OF ALL RIDES OR THEMEPARK');

-- --------------------------------------------------------

--
-- Table structure for table `daining`
--

CREATE TABLE `daining` (
  `id` int(11) NOT NULL,
  `daining_name` varchar(255) NOT NULL,
  `daining_email` varchar(30) NOT NULL,
  `daining_phone` bigint(10) NOT NULL,
  `daining_date` date NOT NULL,
  `daining_time` time NOT NULL,
  `daining_guests` int(11) NOT NULL,
  `daining_requests` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `daining`
--

INSERT INTO `daining` (`id`, `daining_name`, `daining_email`, `daining_phone`, `daining_date`, `daining_time`, `daining_guests`, `daining_requests`) VALUES
(0, 'Hit', '', 6355535390, '2025-01-31', '23:59:00', 5, 'Family Daining'),
(6, 'Darsh Italiya', '', 3333333333, '2025-01-08', '02:41:00', 3, 'no');

-- --------------------------------------------------------

--
-- Table structure for table `daining1`
--

CREATE TABLE `daining1` (
  `id` int(11) NOT NULL,
  `name` text NOT NULL,
  `email` varchar(50) NOT NULL,
  `phone` bigint(11) NOT NULL,
  `time` time NOT NULL,
  `date` date NOT NULL,
  `guests` int(11) NOT NULL,
  `requests` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `daining1`
--

INSERT INTO `daining1` (`id`, `name`, `email`, `phone`, `time`, `date`, `guests`, `requests`) VALUES
(5, 'Darsh Italiya', 'darshitaliya3@gmail.com', 9409970864, '22:29:00', '2025-03-17', 4, 'Family Dinner'),
(6, 'Hit Kanani', 'hitkanani@gmail.com', 6956592668, '22:30:00', '2025-03-21', 4, 'Mecxican Dinner'),
(7, 'Sahil', 'Sahil@gmail.com', 6453646543, '23:59:00', '2025-12-31', 5, 'Grounp Daining');

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

CREATE TABLE `events` (
  `id` int(11) NOT NULL,
  `event_name` text NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `info` text NOT NULL,
  `event_price` text NOT NULL,
  `event_image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `events`
--

INSERT INTO `events` (`id`, `event_name`, `start_date`, `end_date`, `info`, `event_price`, `event_image`) VALUES
(2, 'Park Event', '2025-03-16', '2025-03-31', 'Fun For All', '₹8000', 'event3.png'),
(3, 'Family Event', '2025-03-16', '2025-03-31', 'Fun With Family', '₹12000', 'event2.png');

-- --------------------------------------------------------

--
-- Table structure for table `event_data`
--

CREATE TABLE `event_data` (
  `event_id` int(11) NOT NULL,
  `fname` text NOT NULL,
  `lname` text NOT NULL,
  `email` varchar(50) NOT NULL,
  `phone` text NOT NULL,
  `event` text NOT NULL,
  `npass` text NOT NULL,
  `totalprice` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `event_data`
--

INSERT INTO `event_data` (`event_id`, `fname`, `lname`, `email`, `phone`, `event`, `npass`, `totalprice`) VALUES
(3, 'Darsh', 'Italiya', 'darshitaliya3@gmail.com', '9409970864', '3', '2', '₹40000'),
(4, 'jjj', 'kkkk', 'hit', '6355535390', '2', '0', '₹0');

-- --------------------------------------------------------

--
-- Table structure for table `feedback1`
--

CREATE TABLE `feedback1` (
  `id` int(11) NOT NULL,
  `username` text NOT NULL,
  `feedback` text NOT NULL,
  `rating` text NOT NULL,
  `is_hidden` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `feedback1`
--

INSERT INTO `feedback1` (`id`, `username`, `feedback`, `rating`, `is_hidden`) VALUES
(2, 'darshitaliya3@gmail.com', '\"Fantastic variety of attractions! From heart-pounding roller coasters to  enchanting family rides, there\'s something for everyone.\"', '5', 0),
(3, 'Hit Kanani', 'SUPER !!!!!', '5', 0),
(4, 'Sahil', '\"Captivating shows and entertainment! The live performances at Restar  Amusement Park are nothing short of spectacular.\"', '5', 0);

-- --------------------------------------------------------

--
-- Table structure for table `gallery`
--

CREATE TABLE `gallery` (
  `id` int(11) NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `gallery`
--

INSERT INTO `gallery` (`id`, `image`) VALUES
(22, 'aquarium-2-e1628655297830.jpg'),
(23, 'fun-in-the-pool-and-water-park-1-e1628495592253.jpg'),
(24, 'gallery-6.jpg'),
(25, 'gallery-14.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `offer`
--

CREATE TABLE `offer` (
  `id` int(11) NOT NULL,
  `toffer` varchar(50) NOT NULL,
  `Person` int(11) NOT NULL,
  `Price` int(11) NOT NULL,
  `offerprice` int(11) NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `image` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `offer`
--

INSERT INTO `offer` (`id`, `toffer`, `Person`, `Price`, `offerprice`, `start_date`, `end_date`, `image`) VALUES
(10, 'Park Offer', 4, 6000, 400, '2025-03-19', '2025-03-20', 'offer-5.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `offerbook`
--

CREATE TABLE `offerbook` (
  `id` int(11) NOT NULL,
  `fname` varchar(50) NOT NULL,
  `lname` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phone` varchar(15) NOT NULL,
  `toffer` int(11) NOT NULL,
  `person` int(11) NOT NULL,
  `totalprice` decimal(10,2) NOT NULL,
  `amount` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `offerbook`
--

INSERT INTO `offerbook` (`id`, `fname`, `lname`, `email`, `phone`, `toffer`, `person`, `totalprice`, `amount`) VALUES
(14, 'Darsh', 'Italiya', 'darshitaliya3@gmail.com', '9409970864', 4, 3, 36000.00, 36000.00),
(16, 'Meet', 'kekani', 'meet@gmail.com', '7852526556', 5, 1, 20000.00, 20000.00),
(17, 'Jeet', 'Kanani', 'hit', '8888888888', 3, 1, 10000.00, 10000.00),
(18, 'Heet', 'Kanani', 'hhit381@gmail.com', '6355554687', 3, 2, 8000.00, 8000.00);

-- --------------------------------------------------------

--
-- Table structure for table `register`
--

CREATE TABLE `register` (
  `guestId` int(11) NOT NULL,
  `fname` varchar(50) NOT NULL,
  `lname` varchar(50) NOT NULL,
  `gender` text NOT NULL,
  `phone` text NOT NULL,
  `email` varchar(255) NOT NULL,
  `pass` text NOT NULL,
  `confirmpss` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `register`
--

INSERT INTO `register` (`guestId`, `fname`, `lname`, `gender`, `phone`, `email`, `pass`, `confirmpss`) VALUES
(3, 'Darsh', 'Italiya', 'male', '9409970864', 'darshitaliya3@gmail.com', 'Darsh@123', ''),
(4, 'Hit', 'Kanani', 'male', '6355535390', 'hhit381@gmail.com', 'Hit@6355', 'Hit@6355');

-- --------------------------------------------------------

--
-- Table structure for table `room`
--

CREATE TABLE `room` (
  `id` int(11) NOT NULL,
  `fname` varchar(255) NOT NULL,
  `lname` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `birthdate` date NOT NULL,
  `city` varchar(255) NOT NULL,
  `phone` varchar(15) NOT NULL,
  `room` int(11) NOT NULL,
  `nroom` int(11) NOT NULL,
  `totalprice` decimal(10,2) NOT NULL,
  `checkin` date NOT NULL,
  `checkout` date NOT NULL,
  `amount` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `room`
--

INSERT INTO `room` (`id`, `fname`, `lname`, `email`, `birthdate`, `city`, `phone`, `room`, `nroom`, `totalprice`, `checkin`, `checkout`, `amount`) VALUES
(1, 'Darsh', 'Italiya', 'darshitaliya3@gmail.com', '2025-02-25', 'SURAT', '9409970864', 25, 1, 15000.00, '2025-02-26', '2025-02-27', 15000.00),
(2, 'Meet', 'Vanani', 'hhit381@gmail.com', '2017-12-31', 'Surat', '7825875205', 25, 3, 45000.00, '2025-03-17', '2025-03-18', 45000.00);

-- --------------------------------------------------------

--
-- Table structure for table `rooms`
--

CREATE TABLE `rooms` (
  `id` int(11) NOT NULL,
  `room_type` varchar(255) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `description` text DEFAULT NULL,
  `max_person` int(11) NOT NULL,
  `size` varchar(50) DEFAULT NULL,
  `bed` varchar(50) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `rooms`
--

INSERT INTO `rooms` (`id`, `room_type`, `price`, `description`, `max_person`, `size`, `bed`, `image`) VALUES
(25, 'Famliy Room', 15000.00, 'Per Night', 4, '45 m', '4', 'room-3.jpg'),
(26, 'luxery Room', 10000.00, 'Per Night', 2, '55 m2', '2', 'room-2.jpg'),
(27, 'Delux Room', 20000.00, 'Per Night', 4, '45 m2', '2', 'room-5.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `ticket`
--

CREATE TABLE `ticket` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `child` int(11) DEFAULT NULL,
  `adult` int(11) DEFAULT NULL,
  `senior` int(11) DEFAULT NULL,
  `txtDate` date DEFAULT NULL,
  `total` varchar(50) DEFAULT NULL,
  `amount` decimal(10,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `ticket`
--

INSERT INTO `ticket` (`id`, `name`, `email`, `child`, `adult`, `senior`, `txtDate`, `total`, `amount`) VALUES
(31, 'DARSH ITALIYA', 'darshitaliya3@gmail.com', 5, 0, 4, '2024-10-21', '₹8450', 8450.00),
(32, 'VISHVA BHIKADIYA', 'vishvbhikadiya@gmail.com', 2, 1, 2, '2024-10-21', '₹4750', 4750.00),
(33, 'Heet', 'hhit381@gmail.com', 2, 3, 1, '2025-03-20', '₹5600', 5600.00),
(34, 'Hit', 'hhit381@gmail.com', 1, 1, 1, '2025-03-19', '₹2850', 2850.00);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `adminlogin`
--
ALTER TABLE `adminlogin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cardevent`
--
ALTER TABLE `cardevent`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cardoffer`
--
ALTER TABLE `cardoffer`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cardroom`
--
ALTER TABLE `cardroom`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cardticket`
--
ALTER TABLE `cardticket`
  ADD PRIMARY KEY (`cardid`);

--
-- Indexes for table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `daining`
--
ALTER TABLE `daining`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `daining1`
--
ALTER TABLE `daining1`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `event_data`
--
ALTER TABLE `event_data`
  ADD PRIMARY KEY (`event_id`);

--
-- Indexes for table `feedback1`
--
ALTER TABLE `feedback1`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `gallery`
--
ALTER TABLE `gallery`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `offer`
--
ALTER TABLE `offer`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `offerbook`
--
ALTER TABLE `offerbook`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `register`
--
ALTER TABLE `register`
  ADD PRIMARY KEY (`guestId`);

--
-- Indexes for table `room`
--
ALTER TABLE `room`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `rooms`
--
ALTER TABLE `rooms`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ticket`
--
ALTER TABLE `ticket`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cardevent`
--
ALTER TABLE `cardevent`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `cardoffer`
--
ALTER TABLE `cardoffer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `cardroom`
--
ALTER TABLE `cardroom`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `cardticket`
--
ALTER TABLE `cardticket`
  MODIFY `cardid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `contact`
--
ALTER TABLE `contact`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `daining1`
--
ALTER TABLE `daining1`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `events`
--
ALTER TABLE `events`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `event_data`
--
ALTER TABLE `event_data`
  MODIFY `event_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `feedback1`
--
ALTER TABLE `feedback1`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `gallery`
--
ALTER TABLE `gallery`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `offer`
--
ALTER TABLE `offer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `offerbook`
--
ALTER TABLE `offerbook`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `register`
--
ALTER TABLE `register`
  MODIFY `guestId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `room`
--
ALTER TABLE `room`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `rooms`
--
ALTER TABLE `rooms`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `ticket`
--
ALTER TABLE `ticket`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
