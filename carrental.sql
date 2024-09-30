-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 22, 2024 at 09:55 AM
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
-- Database: `carrental`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `UserName` varchar(100) NOT NULL,
  `Password` varchar(100) NOT NULL,
  `updationDate` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `UserName`, `Password`, `updationDate`) VALUES
(5, 'root', '310dcbbf4cce62f762a2aaa148d556bd', '2024-09-22 02:30:30');

-- --------------------------------------------------------

--
-- Table structure for table `ambulances`
--

CREATE TABLE `ambulances` (
  `id` int(11) NOT NULL,
  `ambulance_number` varchar(300) NOT NULL,
  `type` varchar(599) NOT NULL,
  `status` enum('Available','Unavailable','','','') NOT NULL,
  `location` varchar(399) NOT NULL,
  `driver` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `ambulances`
--

INSERT INTO `ambulances` (`id`, `ambulance_number`, `type`, `status`, `location`, `driver`) VALUES
(1, '9009', 'pic', 'Available', 'dha', 'horan'),
(2, '9009', 'pic', 'Available', 'dha', 'horan'),
(3, '9009', 'pic', 'Unavailable', 'golden......', 'horan');

-- --------------------------------------------------------

--
-- Table structure for table `drivers`
--

CREATE TABLE `drivers` (
  `id` int(11) NOT NULL,
  `name` varchar(300) NOT NULL,
  `license_number` varchar(400) NOT NULL,
  `contact_number` varchar(500) NOT NULL,
  `status` enum('Available','Unavailable','','') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `drivers`
--

INSERT INTO `drivers` (`id`, `name`, `license_number`, `contact_number`, `status`) VALUES
(1, 'Ali', '89999488', '03848585999', 'Available'),
(2, 'Ali', '89999488', '03848585999', 'Available'),
(3, 'Ahmed', '789999', '03848585999', 'Unavailable'),
(4, 'Ahmed', '789999', '03848585999', 'Unavailable'),
(5, 'nida', '89999488', '03848585999', 'Unavailable'),
(6, 'nida', '89999488', '03848585999', 'Unavailable'),
(7, 'nida', '89999488', '03848585999', 'Unavailable'),
(8, 'ww', '789999', 'ww', 'Unavailable'),
(9, 'Benish', '789999', '03848585999', 'Unavailable');

-- --------------------------------------------------------

--
-- Table structure for table `emergency_requests`
--

CREATE TABLE `emergency_requests` (
  `id` int(11) NOT NULL,
  `pickup_address` varchar(300) NOT NULL,
  `dropoff_address` varchar(599) NOT NULL,
  `phone` varchar(400) NOT NULL,
  `request_type` varchar(400) NOT NULL,
  `hospital_name` varchar(300) NOT NULL,
  `FullName` varchar(100) NOT NULL,
  `user_id` int(11) NOT NULL,
  `vehicle_number` varchar(900) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `emergency_requests`
--

INSERT INTO `emergency_requests` (`id`, `pickup_address`, `dropoff_address`, `phone`, `request_type`, `hospital_name`, `FullName`, `user_id`, `vehicle_number`) VALUES
(1, 'agha', 'shifa', '03566667791', 'Non_Emergency', '', '0', 0, ''),
(2, 'agha', 'shifa', '03566667791', 'Non_Emergency', '', '0', 0, ''),
(3, 'agha', 'shifa', '03566667791', 'Non_Emergency', '', '0', 0, ''),
(4, 'agha', 'shifa', '03566667791', 'Non_Emergency', '', '0', 0, ''),
(5, 'agha', 'shifa', '03566667791', 'Non_Emergency', '', '0', 0, ''),
(6, 'agha', 'shifa', '03566667791', 'Non_Emergency', '', '0', 0, ''),
(7, 'landhi', 'shifa', '0345678999', 'Emergency', '', '0', 0, ''),
(8, 'landhi', 'shifa', '03566667791', 'Non_Emergency', '', '0', 0, ''),
(9, 'landhi', 'shifa', '03566667791', 'Non_Emergency', 'national', '0', 0, ''),
(10, 'agha', 'shifa', '03566667791', 'Non_Emergency', 'National', '0', 0, ''),
(11, 'agha', 'shifa', '03566667791', 'Emergency', 'national hospital', '0', 0, ''),
(12, 'agha', 'shifa', '03566667791', 'Emergency', 'national hospital', '0', 0, ''),
(13, 'agha', 'shifa', '03566667791', 'Emergency', 'national hospital', '0', 0, ''),
(14, 'agha', 'shifa', '0333445554', 'Non_Emergency', 'Shifa', '0', 0, ''),
(15, 'agha', 'shifa', '0333445554', 'Non_Emergency', 'Shifa', '0', 0, ''),
(16, 'agha', 'shifa', '0333445554', 'Non_Emergency', 'Shifa', '0', 0, ''),
(17, 'agha', 'shifa', '0333445554', 'Non_Emergency', 'Shifa', '0', 0, ''),
(18, 'agha', 'shifa', '0333445554', 'Emergency', 'Shifa', '0', 0, ''),
(19, 'agha', 'shifa', '0333445554', 'Emergency', 'Shifa', '0', 0, ''),
(20, 'agha', 'shifa', '0333445554', 'Emergency', 'Shifa', '0', 0, ''),
(21, 'agha', 'shifa', '0333445554', 'Non_Emergency', 'AghaKhan', '0', 0, ''),
(22, 'agha', 'shifa', '0333445554', 'Non_Emergency', 'AghaKhan', '0', 0, ''),
(23, 'agha', 'shifa', '0333445554', 'Non_Emergency', 'AghaKhan', '0', 0, ''),
(24, 'landhi', 'shifa', '03428410999', 'Non_Emergency', 'Shifa', '0', 0, ''),
(25, 'jinnah', 'shifa', '0333445554', 'Non_Emergency', 'Jinnah', '0', 0, ''),
(26, 'agha', 'shifa', '0347 8356751', 'Emergency', 'Shifa', '0', 0, ''),
(27, 'jinnah', 'shifa', '0333445554', 'Non_Emergency', 'Jinnah', '0', 0, ''),
(28, 'agha', 'shifa', '0347 8356751', 'Emergency', 'Index', '0', 0, ''),
(29, 'agha', 'shifa', '0347 8356751', 'Emergency', 'Index', '', 0, ''),
(30, 'agha', 'shifa', '03478356751', 'Emergency', 'AghaKhan', '', 0, ''),
(31, 'agha', 'shifa', '03478356751', 'Emergency', 'AghaKhan', '', 0, ''),
(32, 'agha', 'shifa', '0333445554', 'Emergency', 'AghaKhan', '', 0, ''),
(33, 'kin', 'shifa', '03566667791', 'Emergency', 'AghaKhan', 'Benish', 5, ''),
(34, 'kin', 'shifa', '03566667791', 'Emergency', 'AghaKhan', 'Benish', 5, ''),
(35, 'kin', 'shifa', '03566667791', 'Emergency', 'AghaKhan', 'Benish', 5, ''),
(36, 'agha', 'shifa', '03478356751', 'Emergency', 'AghaKhan', 'Benish', 5, ''),
(37, 'landhi', 'shifa', '0347 8356751', 'Emergency', 'city', 'Benish', 5, ''),
(38, 'landhi', 'shifa', '0347 8356751', 'Emergency', 'city', 'Benish', 5, ''),
(39, 'Dha', 'Dha', '0333445554', 'Non_Emergency', 'national', 'Benish', 5, ''),
(40, 'Dha', 'Dha', '0333445554', 'Non_Emergency', 'national', 'Benish', 5, ''),
(41, 'Dha', 'Dha', '0333445554', 'Non_Emergency', 'national', 'Benish', 5, ''),
(42, 'Dha', 'Dha', '03428410999', 'Emergency', 'Shifa', 'Benish', 5, ''),
(43, 'agha', 'shifa', '03566667791', 'Non_Emergency', 'Annn', 'Noor', 7, '990'),
(44, 'agha', 'shifa', '03566667791', 'Non_Emergency', 'Annn', 'Noor', 7, '990'),
(45, 'agha', 'shifa', '03566667791', 'Non_Emergency', 'Annn', 'Noor', 7, '990'),
(46, 'agha', 'shifa', '03566667791', 'Non_Emergency', 'Annn', 'Noor', 7, '990'),
(47, 'agha', 'shifa', '03566667791', 'Non_Emergency', 'Annn', 'Noor', 7, '990'),
(48, 'agha', 'shifa', '03566667791', 'Non_Emergency', 'Annn', 'Noor', 7, '990'),
(49, 'agha', 'shifa', '03566667791', 'Non_Emergency', 'Annn', 'Noor', 7, '990'),
(50, 'agha', 'shifa', '03566667791', 'Non_Emergency', 'Annn', 'Noor', 7, '990'),
(51, 'agha', 'shifa', '03566667791', 'Non_Emergency', 'Annn', 'Noor', 7, '990'),
(52, 'p.n.s shifa', 'agha khan', '03478356751', 'Emergency', 'aaa', 'Noor', 7, '990'),
(53, 'railway', 'aptech', '0345678999', 'Emergency', 'national', 'Noor', 7, '990'),
(54, 'railway', 'aptech', '0345678999', 'Emergency', 'national', 'Noor', 7, '990'),
(55, 'p.n.s shifa', 'agha khan', '03478356751', 'Emergency', 'aaa', 'Noor', 7, '990'),
(56, 'landhi', 'Dha', '0345678999', 'Emergency', 'Shifa', 'Noor', 7, '8990');

-- --------------------------------------------------------

--
-- Table structure for table `emts`
--

CREATE TABLE `emts` (
  `id` int(11) NOT NULL,
  `name` varchar(300) NOT NULL,
  `license_number` varchar(400) NOT NULL,
  `contact_number` varchar(400) NOT NULL,
  `status` enum('Available','Unavailable','','') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `emts`
--

INSERT INTO `emts` (`id`, `name`, `license_number`, `contact_number`, `status`) VALUES
(1, 'anaya', '89999488', '03848585999', 'Available'),
(2, 'anaya', '89999488', '03848585999', 'Available');

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(200) NOT NULL,
  `message` varchar(400) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `feedback`
--

INSERT INTO `feedback` (`id`, `name`, `email`, `message`) VALUES
(1, 'fatima', 'noor@gmail.com', 'good services'),
(2, 'Benish', 'noor@gmail.com', 'good'),
(3, 'anaya', 'farhan@gmail.com', 'hoo'),
(4, 'fatima', 'artist@gmail.com', 'goood'),
(5, 'noor', 'noor@gmail.com', 'good'),
(6, 'fatima', 'farhan@gmail.com', 'good'),
(7, 'noor', 'noor@gmail.com', 'gppd'),
(8, 'noor', 'noor@gmail.com', 'goood'),
(9, 'hoor', 'hoor@gmail.com', 'goods');

-- --------------------------------------------------------

--
-- Table structure for table `patients`
--

CREATE TABLE `patients` (
  `id` int(11) NOT NULL,
  `name` varchar(300) NOT NULL,
  `mobile_number` varchar(300) NOT NULL,
  `medical_history` varchar(300) NOT NULL,
  `allergies` varchar(300) NOT NULL,
  `emergency_contacts` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `patients`
--

INSERT INTO `patients` (`id`, `name`, `mobile_number`, `medical_history`, `allergies`, `emergency_contacts`) VALUES
(1, 'noor', '043546566', 'good', 'sanddd', '03466747579'),
(2, 'fatima', '03488489990', 'allergy', 'sand', '03466747579'),
(5, 'fatima', '03488489990', 'good', 'yes', '03466747579'),
(6, 'fatima', '03488489990', 'good', 'yes', '03466747579'),
(7, 'fatima', '03488489990', 'good', 'yes', '03466747579'),
(8, 'fatima', '03488489990', 'good', 'yes', '03466747579'),
(9, 'fatima', '03488489990', 'good', 'yes', '03466747579'),
(10, 'fatima', '03488489990', 'good', 'yes', '03466747579'),
(11, 'fatima', '03488489990', 'good', 'yes', '03466747579'),
(12, 'Benish', '03488489990', 'breath issue', 'sand', '03466747579'),
(13, 'Benish', '03488489990', 'breath issue', 'sand', '03466747579'),
(14, 'Benish', '03488489990', 'breath issue', 'sand', '03466747579'),
(15, 'Benish', '03488489990', 'breath issue', 'sand', '03466747579'),
(16, 'Benish', '03488489990', 'breath issue', 'sand', '03466747579'),
(17, 'Benish', '03488489990', 'breath issue', 'sand', '03466747579'),
(18, 'iqra', '03488489990', 'allergy', 'sand', '03466747579'),
(19, 'iqra', '03488489990', 'allergy', 'sand', '03466747579'),
(20, 'iqra', '03488489990', 'allergy', 'sand', '03466747579'),
(21, 'iqra', '03488489990', 'allergy', 'sand', '03466747579'),
(22, 'iqra', '03488489990', 'allergy', 'sand', '03466747579'),
(23, 'iqra', '03488489990', 'allergy', 'sand', '03466747579'),
(24, 'noor', '03488489990', 'good', 'sand', '03466747579'),
(25, 'noor', '03488489990', 'good', 'sand', '03466747579'),
(26, 'noor', '03488489990', 'good', 'sand', '03466747579');

-- --------------------------------------------------------

--
-- Table structure for table `tblbooking`
--

CREATE TABLE `tblbooking` (
  `id` int(11) NOT NULL,
  `userEmail` varchar(100) DEFAULT NULL,
  `VehicleId` int(11) DEFAULT NULL,
  `FromDate` varchar(20) DEFAULT NULL,
  `ToDate` varchar(20) DEFAULT NULL,
  `message` varchar(255) DEFAULT NULL,
  `Status` int(11) DEFAULT NULL,
  `PostingDate` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tblbooking`
--

INSERT INTO `tblbooking` (`id`, `userEmail`, `VehicleId`, `FromDate`, `ToDate`, `message`, `Status`, `PostingDate`) VALUES
(1, 'test@gmail.com', 2, '22/06/2017', '25/06/2017', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco', 1, '2017-06-19 20:15:43'),
(2, 'test@gmail.com', 3, '30/06/2017', '02/07/2017', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco', 2, '2017-06-26 20:15:43'),
(3, 'test@gmail.com', 4, '02/07/2017', '07/07/2017', 'Lorem ipsumLorem ipsumLorem ipsumLorem ipsumLorem ipsumLorem ipsumLorem ipsumLorem ipsumLorem ', 0, '2017-06-26 21:10:06');

-- --------------------------------------------------------

--
-- Table structure for table `tblbrands`
--

CREATE TABLE `tblbrands` (
  `id` int(11) NOT NULL,
  `BrandName` varchar(120) NOT NULL,
  `CreationDate` timestamp NULL DEFAULT current_timestamp(),
  `UpdationDate` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tblbrands`
--

INSERT INTO `tblbrands` (`id`, `BrandName`, `CreationDate`, `UpdationDate`) VALUES
(1, 'Maruti', '2017-06-18 16:24:34', '2017-06-19 06:42:23'),
(2, 'BMW', '2017-06-18 16:24:50', NULL),
(3, 'Audi', '2017-06-18 16:25:03', NULL),
(4, 'Nissan', '2017-06-18 16:25:13', NULL),
(5, 'Toyota', '2017-06-18 16:25:24', NULL),
(7, 'Marutiu', '2017-06-19 06:22:13', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tblcontactusinfo`
--

CREATE TABLE `tblcontactusinfo` (
  `id` int(11) NOT NULL,
  `Address` tinytext DEFAULT NULL,
  `EmailId` varchar(255) DEFAULT NULL,
  `ContactNo` char(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tblcontactusinfo`
--

INSERT INTO `tblcontactusinfo` (`id`, `Address`, `EmailId`, `ContactNo`) VALUES
(1, 'Test Demo test demo																									', 'test@test.com', '8585233222');

-- --------------------------------------------------------

--
-- Table structure for table `tblcontactusquery`
--

CREATE TABLE `tblcontactusquery` (
  `id` int(11) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `EmailId` varchar(120) DEFAULT NULL,
  `ContactNumber` char(11) DEFAULT NULL,
  `Message` longtext DEFAULT NULL,
  `PostingDate` timestamp NOT NULL DEFAULT current_timestamp(),
  `status` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tblcontactusquery`
--

INSERT INTO `tblcontactusquery` (`id`, `name`, `EmailId`, `ContactNumber`, `Message`, `PostingDate`, `status`) VALUES
(2, 'bENISH', 'benishnisar56@gmail.com', '03455566', 'Good', '2024-09-20 06:32:50', 1),
(3, 'sana', 'sarah@gmail.com', '0345889598', 'good', '2024-09-21 12:48:01', NULL),
(4, 'sana', 'sarah@gmail.com', '0345889598', 'good', '2024-09-21 12:49:36', NULL),
(5, 'sana', 'sarah@gmail.com', '0345889598', 'good', '2024-09-21 12:51:04', NULL),
(6, 'sana', 'sarah@gmail.com', '0345889598', 'good', '2024-09-21 12:51:09', NULL),
(7, 'sana', 'sarah@gmail.com', '0345889598', 'good', '2024-09-22 07:37:32', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tblpages`
--

CREATE TABLE `tblpages` (
  `id` int(11) NOT NULL,
  `PageName` varchar(255) DEFAULT NULL,
  `type` varchar(255) NOT NULL DEFAULT '',
  `detail` longtext NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tblpages`
--

INSERT INTO `tblpages` (`id`, `PageName`, `type`, `detail`) VALUES
(1, 'Terms and Conditions', 'terms', '<P align=justify><FONT size=2><STRONG><FONT color=#990000>(1) ACCEPTANCE OF TERMS</FONT><BR><BR></STRONG>Welcome to Yahoo! India. 1Yahoo Web Services India Private Limited Yahoo\", \"we\" or \"us\" as the case may be) provides the Service (defined below) to you, subject to the following Terms of Service (\"TOS\"), which may be updated by us from time to time without notice to you. You can review the most current version of the TOS at any time at: <A href=\"http://in.docs.yahoo.com/info/terms/\">http://in.docs.yahoo.com/info/terms/</A>. In addition, when using particular Yahoo services or third party services, you and Yahoo shall be subject to any posted guidelines or rules applicable to such services which may be posted from time to time. All such guidelines or rules, which maybe subject to change, are hereby incorporated by reference into the TOS. In most cases the guides and rules are specific to a particular part of the Service and will assist you in applying the TOS to that part, but to the extent of any inconsistency between the TOS and any guide or rule, the TOS will prevail. We may also offer other services from time to time that are governed by different Terms of Services, in which case the TOS do not apply to such other services if and to the extent expressly excluded by such different Terms of Services. Yahoo also may offer other services from time to time that are governed by different Terms of Services. These TOS do not apply to such other services that are governed by different Terms of Service. </FONT></P>\r\n<P align=justify><FONT size=2>Welcome to Yahoo! India. Yahoo Web Services India Private Limited Yahoo\", \"we\" or \"us\" as the case may be) provides the Service (defined below) to you, subject to the following Terms of Service (\"TOS\"), which may be updated by us from time to time without notice to you. You can review the most current version of the TOS at any time at: </FONT><A href=\"http://in.docs.yahoo.com/info/terms/\"><FONT size=2>http://in.docs.yahoo.com/info/terms/</FONT></A><FONT size=2>. In addition, when using particular Yahoo services or third party services, you and Yahoo shall be subject to any posted guidelines or rules applicable to such services which may be posted from time to time. All such guidelines or rules, which maybe subject to change, are hereby incorporated by reference into the TOS. In most cases the guides and rules are specific to a particular part of the Service and will assist you in applying the TOS to that part, but to the extent of any inconsistency between the TOS and any guide or rule, the TOS will prevail. We may also offer other services from time to time that are governed by different Terms of Services, in which case the TOS do not apply to such other services if and to the extent expressly excluded by such different Terms of Services. Yahoo also may offer other services from time to time that are governed by different Terms of Services. These TOS do not apply to such other services that are governed by different Terms of Service. </FONT></P>\r\n<P align=justify><FONT size=2>Welcome to Yahoo! India. Yahoo Web Services India Private Limited Yahoo\", \"we\" or \"us\" as the case may be) provides the Service (defined below) to you, subject to the following Terms of Service (\"TOS\"), which may be updated by us from time to time without notice to you. You can review the most current version of the TOS at any time at: </FONT><A href=\"http://in.docs.yahoo.com/info/terms/\"><FONT size=2>http://in.docs.yahoo.com/info/terms/</FONT></A><FONT size=2>. In addition, when using particular Yahoo services or third party services, you and Yahoo shall be subject to any posted guidelines or rules applicable to such services which may be posted from time to time. All such guidelines or rules, which maybe subject to change, are hereby incorporated by reference into the TOS. In most cases the guides and rules are specific to a particular part of the Service and will assist you in applying the TOS to that part, but to the extent of any inconsistency between the TOS and any guide or rule, the TOS will prevail. We may also offer other services from time to time that are governed by different Terms of Services, in which case the TOS do not apply to such other services if and to the extent expressly excluded by such different Terms of Services. Yahoo also may offer other services from time to time that are governed by different Terms of Services. These TOS do not apply to such other services that are governed by different Terms of Service. </FONT></P>'),
(2, 'Privacy Policy', 'privacy', '<span style=\"color: rgb(0, 0, 0); font-family: &quot;Open Sans&quot;, Arial, sans-serif; font-size: 14px; text-align: justify;\">At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident, similique sunt in culpa qui officia deserunt mollitia animi, id est laborum et dolorum fuga. Et harum quidem rerum facilis est et expedita distinctio. Nam libero tempore, cum soluta nobis est eligendi optio cumque nihil impedit quo minus id quod maxime placeat facere possimus, omnis voluptas assumenda est, omnis dolor repellendus. Temporibus autem quibusdam et aut officiis debitis aut rerum necessitatibus saepe eveniet ut et voluptates repudiandae sint et molestiae non recusandae. Itaque earum rerum hic tenetur a sapiente delectus, ut aut reiciendis voluptatibus maiores alias consequatur aut perferendis doloribus asperiores repellat</span>'),
(3, 'About Us ', 'aboutus', '<span style=\"color: rgb(0, 0, 0); font-family: &quot;Open Sans&quot;, Arial, sans-serif; text-align: justify;\">At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident, similique sunt in culpa qui officia deserunt mollitia animi, id est laborum et dolorum fuga. Et harum quidem rerum facilis est et expedita distinctio. Nam libero tempore, cum soluta nobis est eligendi optio cumque nihil impedit quo minus id quod maxime placeat facere possimus, omnis voluptas assumenda est, omnis dolor repellendus. Temporibus autem quibusdam et aut officiis debitis aut rerum necessitatibus saepe eveniet ut et voluptates repudiandae sint et molestiae non recusandae. Itaque earum rerum hic tenetur a sapiente delectus, ut aut reiciendis voluptatibus maiores alias consequatur aut perferendis doloribus asperiores repellat</span>'),
(11, 'FAQs', 'faqs', '																														<span style=\"color: rgb(0, 0, 0); font-family: &quot;Open Sans&quot;, Arial, sans-serif; font-size: 14px; text-align: justify;\">Address------Test &nbsp; &nbsp;dsfdsfds</span>');

-- --------------------------------------------------------

--
-- Table structure for table `tblsubscribers`
--

CREATE TABLE `tblsubscribers` (
  `id` int(11) NOT NULL,
  `SubscriberEmail` varchar(120) DEFAULT NULL,
  `PostingDate` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tblsubscribers`
--

INSERT INTO `tblsubscribers` (`id`, `SubscriberEmail`, `PostingDate`) VALUES
(4, 'nisarkhan@gmail.com', '2024-09-20 06:30:28'),
(5, 'hoor@gmail.com', '2024-09-22 07:31:08');

-- --------------------------------------------------------

--
-- Table structure for table `tbltestimonial`
--

CREATE TABLE `tbltestimonial` (
  `id` int(11) NOT NULL,
  `UserEmail` varchar(100) NOT NULL,
  `Testimonial` mediumtext NOT NULL,
  `PostingDate` timestamp NOT NULL DEFAULT current_timestamp(),
  `status` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tbltestimonial`
--

INSERT INTO `tbltestimonial` (`id`, `UserEmail`, `Testimonial`, `PostingDate`, `status`) VALUES
(1, 'test@gmail.com', 'Test Test', '2017-06-18 07:44:31', 0),
(2, 'test@gmail.com', '\nLorem ipsum dolor sit amet, consectetuer adipiscing elit. Nam nibh. Nunc varius facilis', '2017-06-18 07:46:05', 1),
(3, 'benish@gmail.com', 'Benish', '2024-09-21 20:33:29', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tblusers`
--

CREATE TABLE `tblusers` (
  `id` int(11) NOT NULL,
  `FullName` varchar(120) DEFAULT NULL,
  `EmailId` varchar(100) DEFAULT NULL,
  `Password` varchar(100) DEFAULT NULL,
  `ContactNo` char(11) DEFAULT NULL,
  `dob` varchar(100) DEFAULT NULL,
  `Address` varchar(255) DEFAULT NULL,
  `City` varchar(100) DEFAULT NULL,
  `Country` varchar(100) DEFAULT NULL,
  `RegDate` timestamp NULL DEFAULT current_timestamp(),
  `UpdationDate` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tblusers`
--

INSERT INTO `tblusers` (`id`, `FullName`, `EmailId`, `Password`, `ContactNo`, `dob`, `Address`, `City`, `Country`, `RegDate`, `UpdationDate`) VALUES
(1, 'Benish', 'demo@gmail.com', 'f925916e2754e5e03f75dd58a5733251', '2147483647', NULL, NULL, NULL, NULL, '2017-06-17 19:59:27', '2024-09-21 07:18:50'),
(5, 'Benish', 'benishnisar56@gmail.com', '202cb962ac59075b964b07152d234b70', '039499999', '2024-09-04', 'Pak Jamhuriya Colony', 'karachi', 'Pakistan', '2024-09-20 06:28:21', '2024-09-21 16:54:51'),
(6, 'Benish', 'benishnisar56@gmail.com', '202cb962ac59075b964b07152d234b70', '039499999', '2024-09-04', 'Pak Jamhuriya Colony', 'karachi', 'Pakistan', '2024-09-20 06:31:08', '2024-09-21 16:54:51'),
(7, 'Noor', 'hinakhan4555@gmail.com', 'b706835de79a2b4e80506f582af3676a', '0349599999', NULL, NULL, NULL, NULL, '2024-09-22 02:11:12', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tblvehicles`
--

CREATE TABLE `tblvehicles` (
  `id` int(11) NOT NULL,
  `VehiclesTitle` varchar(150) DEFAULT NULL,
  `VehiclesBrand` int(11) DEFAULT NULL,
  `VehiclesOverview` longtext DEFAULT NULL,
  `PricePerDay` int(11) DEFAULT NULL,
  `FuelType` varchar(100) DEFAULT NULL,
  `ModelYear` int(6) DEFAULT NULL,
  `SeatingCapacity` int(11) DEFAULT NULL,
  `Vimage1` varchar(120) DEFAULT NULL,
  `Vimage2` varchar(120) DEFAULT NULL,
  `Vimage3` varchar(120) DEFAULT NULL,
  `Vimage4` varchar(120) DEFAULT NULL,
  `Vimage5` varchar(120) DEFAULT NULL,
  `AirConditioner` int(11) DEFAULT NULL,
  `PowerDoorLocks` int(11) DEFAULT NULL,
  `AntiLockBrakingSystem` int(11) DEFAULT NULL,
  `BrakeAssist` int(11) DEFAULT NULL,
  `PowerSteering` int(11) DEFAULT NULL,
  `DriverAirbag` int(11) DEFAULT NULL,
  `PassengerAirbag` int(11) DEFAULT NULL,
  `PowerWindows` int(11) DEFAULT NULL,
  `CDPlayer` int(11) DEFAULT NULL,
  `CentralLocking` int(11) DEFAULT NULL,
  `CrashSensor` int(11) DEFAULT NULL,
  `LeatherSeats` int(11) DEFAULT NULL,
  `RegDate` timestamp NOT NULL DEFAULT current_timestamp(),
  `UpdationDate` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tblvehicles`
--

INSERT INTO `tblvehicles` (`id`, `VehiclesTitle`, `VehiclesBrand`, `VehiclesOverview`, `PricePerDay`, `FuelType`, `ModelYear`, `SeatingCapacity`, `Vimage1`, `Vimage2`, `Vimage3`, `Vimage4`, `Vimage5`, `AirConditioner`, `PowerDoorLocks`, `AntiLockBrakingSystem`, `BrakeAssist`, `PowerSteering`, `DriverAirbag`, `PassengerAirbag`, `PowerWindows`, `CDPlayer`, `CentralLocking`, `CrashSensor`, `LeatherSeats`, `RegDate`, `UpdationDate`) VALUES
(1, 'Ambulance', 2, 'At Rapid Rescue, we understand that emergencies can happen at any moment. That\'s why we offer swift and efficient rescue services designed to meet your urgent needs. Our highly trained team is equipped with the latest tools and technology to ensure a prompt response to any crisis, whether it\'s a natural disaster, medical emergency, or technical failure.', 345345, 'Petrol', 3453, 7, 'images__3_-removebg-preview.png', 'ambula.png', 'amb2-removebg-preview.png', 'ambfor-removebg-preview (1).png', '', 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, '2017-06-19 11:46:23', '2024-09-21 08:28:28'),
(2, 'Test Demoy', 2, 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Nam nibh. Nunc varius facilisis eros. Sed erat. In in velit quis arcu ornare laoreet. Curabitur adipiscing luctus massa. Integer ut purus ac augue commodo commodo. Nunc nec mi eu justo tempor consectetuer. Etiam vitae nisl. In dignissim lacus ut ante. Cras elit lectus, bibendum a, adipiscing vitae, commodo et, dui. Ut tincidunt tortor. Donec nonummy, enim in lacinia pulvinar, velit tellus scelerisque augue, ac posuere libero urna eget neque. Cras ipsum. Vestibulum pretium, lectus nec venenatis volutpat, purus lectus ultrices risus, a condimentum risus mi et quam. Pellentesque auctor fringilla neque. Duis eu massa ut lorem iaculis vestibulum. Maecenas facilisis elit sed justo. Quisque volutpat malesuada velit. ', 859, 'CNG', 2015, 4, 'ambfor-removebg-preview (1).png', 'carr2.jpg', 'ambfor-removebg-preview (1).png', 'carr2.png', '', 1, 1, 1, 1, 1, 1, 1, NULL, 1, 1, NULL, NULL, '2017-06-19 16:16:17', '2024-09-21 08:43:12'),
(3, 'Lorem ipsum', 4, 'Lorem ipsumLorem ipsumLorem ipsumLorem ipsumLorem ipsumLorem ipsumLorem ipsumLorem ipsumLorem ipsumLorem ipsumLorem ipsumLorem ipsumLorem ipsumLorem ipsumLorem ipsumLorem ipsumLorem ipsumLorem ipsumLorem ipsumLorem ipsumLorem ipsumLorem ipsumLorem ipsumLorem ipsumLorem ipsumLorem ipsumLorem ipsumLorem ipsumLorem ipsumLorem ipsumLorem ipsumLorem ipsumLorem ipsumLorem ipsumLorem ipsumLorem ipsumLorem ipsumLorem ipsumLorem ipsumLorem ipsumLorem ipsumLorem ipsumLorem ipsumLorem ipsumLorem ipsumLorem ipsumLorem ipsumLorem ipsumLorem ipsumLorem ipsumLorem ipsumLorem ipsum', 563, 'CNG', 2012, 5, 'amb2-removebg-preview.png', 'dealer-logo.jpg', 'images__2_-removebg-preview.png', 'carr2.jpg', '', 1, 1, 1, 1, 1, 1, NULL, 1, 1, NULL, NULL, NULL, '2017-06-19 16:18:20', '2024-09-21 08:44:44'),
(4, 'Lorem ipsum', 1, 'Lorem ipsumLorem ipsumLorem ipsumLorem ipsumLorem ipsumLorem ipsumLorem ipsumLorem ipsumLorem ipsumLorem ipsumLorem ipsumLorem ipsumLorem ipsumLorem ipsumLorem ipsumLorem ipsumLorem ipsumLorem ipsumLorem ipsumLorem ipsumLorem ipsumLorem ipsumLorem ipsumLorem ipsumLorem ipsumLorem ipsumLorem ipsumLorem ipsumLorem ipsumLorem ipsumLorem ipsumLorem ipsumLorem ipsumLorem ipsumLorem ipsumLorem ipsumLorem ipsumLorem ipsumLorem ipsumLorem ipsumLorem ipsumLorem ipsumLorem ipsumLorem ipsumLorem ipsumLorem ipsumLorem ipsumLorem ipsumLorem ipsumLorem ipsumLorem ipsumLorem ipsum', 5636, 'CNG', 2012, 5, 'ambfor.jfif', 'carr2.jpg', 'images__2_-removebg-preview.png', 'carr.jfif', '', 1, 1, 1, 1, 1, 1, 1, 1, 1, NULL, NULL, NULL, '2017-06-19 16:18:43', '2024-09-21 08:45:56'),
(5, 'ytb rvtr', 5, 'vtretrvet', 345345, 'Petrol', 3453, 7, 'ambfor.jpg', 'ambfor-removebg-preview (1).png', 'carr2.jpg', 'amb2-removebg-preview.png', NULL, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, '2017-06-20 17:57:09', '2024-09-21 08:47:02'),
(6, 'Emergency', 4, 'mindblowng', 50000, 'Diesel', 2002, 80, 'ambfor-removebg-preview (1).png', 'Benish Nisar.jpg', 'rapid_rescue_logo.png', 'rapid_rescue_logo.png', 'Ambulance_indes.gif', NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, '2024-09-21 07:45:29', '2024-09-21 08:37:02');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ambulances`
--
ALTER TABLE `ambulances`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `drivers`
--
ALTER TABLE `drivers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `emergency_requests`
--
ALTER TABLE `emergency_requests`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `emts`
--
ALTER TABLE `emts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `patients`
--
ALTER TABLE `patients`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tblbooking`
--
ALTER TABLE `tblbooking`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tblbrands`
--
ALTER TABLE `tblbrands`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tblcontactusinfo`
--
ALTER TABLE `tblcontactusinfo`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tblcontactusquery`
--
ALTER TABLE `tblcontactusquery`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tblpages`
--
ALTER TABLE `tblpages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tblsubscribers`
--
ALTER TABLE `tblsubscribers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbltestimonial`
--
ALTER TABLE `tbltestimonial`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tblusers`
--
ALTER TABLE `tblusers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tblvehicles`
--
ALTER TABLE `tblvehicles`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `ambulances`
--
ALTER TABLE `ambulances`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `drivers`
--
ALTER TABLE `drivers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `emergency_requests`
--
ALTER TABLE `emergency_requests`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;

--
-- AUTO_INCREMENT for table `emts`
--
ALTER TABLE `emts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `feedback`
--
ALTER TABLE `feedback`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `patients`
--
ALTER TABLE `patients`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `tblbooking`
--
ALTER TABLE `tblbooking`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tblbrands`
--
ALTER TABLE `tblbrands`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tblcontactusinfo`
--
ALTER TABLE `tblcontactusinfo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tblcontactusquery`
--
ALTER TABLE `tblcontactusquery`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tblpages`
--
ALTER TABLE `tblpages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `tblsubscribers`
--
ALTER TABLE `tblsubscribers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tbltestimonial`
--
ALTER TABLE `tbltestimonial`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tblusers`
--
ALTER TABLE `tblusers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tblvehicles`
--
ALTER TABLE `tblvehicles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
