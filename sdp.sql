-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 26, 2023 at 04:27 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sdp`
--

-- --------------------------------------------------------

--
-- Table structure for table `booking`
--

CREATE TABLE `booking` (
  `BookingID` int(11) NOT NULL,
  `UserID` int(11) NOT NULL,
  `Location` varchar(255) NOT NULL,
  `StartTime` time NOT NULL,
  `TimeDuration` int(11) NOT NULL,
  `PaymentStatus` varchar(50) DEFAULT 'Pending',
  `BookingDate` timestamp NOT NULL DEFAULT current_timestamp(),
  `Username` varchar(255) DEFAULT NULL,
  `CarPlate` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `booking`
--

INSERT INTO `booking` (`BookingID`, `UserID`, `Location`, `StartTime`, `TimeDuration`, `PaymentStatus`, `BookingDate`, `Username`, `CarPlate`) VALUES
(10, 3, 'APU Indoor', '20:31:00', 2, 'Paid', '2023-10-25 08:31:32', '', 'QWE123'),
(11, 3, 'APU Indoor', '18:33:00', 2, 'Paid', '2023-10-25 08:33:41', '', 'QWE123'),
(12, 3, 'APU Indoor', '10:12:00', 2, 'Paid', '2023-10-26 02:12:56', '', 'QWE123'),
(13, 4, 'APU Indoor', '22:21:00', 2, 'Paid', '2023-10-26 14:21:38', '', 'BKT888');

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--
-- Error reading structure for table sdp.feedback: #1932 - Table &#039;sdp.feedback&#039; doesn&#039;t exist in engine
-- Error reading data for table sdp.feedback: #1064 - You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near &#039;FROM `sdp`.`feedback`&#039; at line 1

-- --------------------------------------------------------

--
-- Table structure for table `parking_bookings`
--

CREATE TABLE `parking_bookings` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `location` varchar(255) NOT NULL,
  `start_time` time NOT NULL,
  `end_time` time NOT NULL,
  `time_duration` float NOT NULL,
  `car_plate` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `parking_bookings`
--

INSERT INTO `parking_bookings` (`id`, `name`, `location`, `start_time`, `end_time`, `time_duration`, `car_plate`) VALUES
(1, 'qwe', 'APU Indoor', '12:14:00', '15:14:00', 3, 'QWE123');

-- --------------------------------------------------------

--
-- Table structure for table `tblcustomer`
--

CREATE TABLE `tblcustomer` (
  `UserID` int(10) NOT NULL,
  `Username` varchar(255) NOT NULL,
  `UserEmail` varchar(255) NOT NULL,
  `UserCarP` varchar(255) NOT NULL,
  `UserPassword` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tblcustomer`
--

INSERT INTO `tblcustomer` (`UserID`, `Username`, `UserEmail`, `UserCarP`, `UserPassword`) VALUES
(1, 'jason lim', 'jslim@gmail.com', 'www2880', 'jslim1'),
(2, 'derk', 'derke@mail.com', 'AWS3456', 'derke123'),
(3, 'qwe', 'qwe@gmail.com', 'QWE123', 'qwe'),
(4, 'Yoshiro', 'yoy@gmail.com', 'BKT888', 'yoy');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_feedback`
--

CREATE TABLE `tbl_feedback` (
  `feedback_id` int(10) NOT NULL,
  `Username` varchar(50) NOT NULL,
  `UserEmail` varchar(50) NOT NULL,
  `feedback` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_feedback`
--

INSERT INTO `tbl_feedback` (`feedback_id`, `Username`, `UserEmail`, `feedback`) VALUES
(10, 'yoy', 'yoy@gmail.com', 'walaowei');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_parking_booking`
--

CREATE TABLE `tbl_parking_booking` (
  `Booking_ID` int(255) NOT NULL,
  `User_ID` int(255) NOT NULL,
  `Space_ID` int(255) NOT NULL,
  `BookingDate` date NOT NULL,
  `BookingTimeStart` varchar(255) NOT NULL,
  `BookingTimeDuration` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_parking_space`
--

CREATE TABLE `tbl_parking_space` (
  `Space_ID` int(255) NOT NULL,
  `Location` varchar(255) NOT NULL,
  `Spaceavailability` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_payment`
--

CREATE TABLE `tbl_payment` (
  `Payment_ID` int(255) NOT NULL,
  `User_ID` int(255) NOT NULL,
  `PaymentMethod` int(255) NOT NULL,
  `PaymentDate` date NOT NULL,
  `PaymentTotal` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_receipt`
--

CREATE TABLE `tbl_receipt` (
  `Reciept_ID` int(255) NOT NULL,
  `Payment_ID` varchar(255) NOT NULL,
  `PaymentDate` date NOT NULL,
  `paymentTotal` varchar(255) NOT NULL,
  `PaymentDescription` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_season_pass`
--

CREATE TABLE `tbl_season_pass` (
  `Pass_ID` int(255) NOT NULL,
  `User_ID` int(255) NOT NULL,
  `PassDateStart` varchar(255) NOT NULL,
  `PassDateEnd` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `booking`
--
ALTER TABLE `booking`
  ADD PRIMARY KEY (`BookingID`),
  ADD KEY `UserID` (`UserID`);

--
-- Indexes for table `parking_bookings`
--
ALTER TABLE `parking_bookings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tblcustomer`
--
ALTER TABLE `tblcustomer`
  ADD PRIMARY KEY (`UserID`);

--
-- Indexes for table `tbl_feedback`
--
ALTER TABLE `tbl_feedback`
  ADD PRIMARY KEY (`feedback_id`);

--
-- Indexes for table `tbl_parking_booking`
--
ALTER TABLE `tbl_parking_booking`
  ADD PRIMARY KEY (`Booking_ID`);

--
-- Indexes for table `tbl_parking_space`
--
ALTER TABLE `tbl_parking_space`
  ADD PRIMARY KEY (`Space_ID`);

--
-- Indexes for table `tbl_payment`
--
ALTER TABLE `tbl_payment`
  ADD PRIMARY KEY (`Payment_ID`);

--
-- Indexes for table `tbl_receipt`
--
ALTER TABLE `tbl_receipt`
  ADD PRIMARY KEY (`Reciept_ID`);

--
-- Indexes for table `tbl_season_pass`
--
ALTER TABLE `tbl_season_pass`
  ADD PRIMARY KEY (`Pass_ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `booking`
--
ALTER TABLE `booking`
  MODIFY `BookingID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `parking_bookings`
--
ALTER TABLE `parking_bookings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tblcustomer`
--
ALTER TABLE `tblcustomer`
  MODIFY `UserID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbl_feedback`
--
ALTER TABLE `tbl_feedback`
  MODIFY `feedback_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `tbl_parking_booking`
--
ALTER TABLE `tbl_parking_booking`
  MODIFY `Booking_ID` int(255) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_parking_space`
--
ALTER TABLE `tbl_parking_space`
  MODIFY `Space_ID` int(255) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_payment`
--
ALTER TABLE `tbl_payment`
  MODIFY `Payment_ID` int(255) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_receipt`
--
ALTER TABLE `tbl_receipt`
  MODIFY `Reciept_ID` int(255) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_season_pass`
--
ALTER TABLE `tbl_season_pass`
  MODIFY `Pass_ID` int(255) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `booking`
--
ALTER TABLE `booking`
  ADD CONSTRAINT `booking_ibfk_1` FOREIGN KEY (`UserID`) REFERENCES `tblcustomer` (`UserID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
