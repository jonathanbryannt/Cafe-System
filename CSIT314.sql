-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Nov 17, 2023 at 10:20 AM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `CSIT314`
--

-- --------------------------------------------------------

--
-- Table structure for table `cafe_staff`
--

CREATE TABLE `cafe_staff` (
  `cafe_staff_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `role` enum('Chef','Cashier','Waiter') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cafe_staff`
--

INSERT INTO `cafe_staff` (`cafe_staff_id`, `user_id`, `role`) VALUES
(1, 2, 'Chef'),
(3, 70, NULL),
(4, 12, 'Cashier'),
(5, 71, 'Waiter'),
(6, 56, NULL),
(7, 56, NULL),
(8, 61, NULL),
(9, 68, NULL),
(10, 142, NULL),
(11, 143, NULL),
(12, 144, NULL),
(13, 145, NULL),
(14, 146, NULL),
(15, 147, NULL),
(16, 148, NULL),
(17, 149, NULL),
(18, 150, NULL),
(19, 151, NULL),
(20, 152, NULL),
(21, 153, NULL),
(22, 154, NULL),
(23, 155, NULL),
(24, 156, NULL),
(25, 157, NULL),
(26, 158, NULL),
(27, 159, 'Cashier'),
(28, 160, NULL),
(29, 161, NULL),
(30, 162, NULL),
(31, 163, NULL),
(32, 164, NULL),
(33, 165, NULL),
(34, 166, NULL),
(35, 167, NULL),
(36, 168, NULL),
(37, 169, NULL),
(38, 170, NULL),
(39, 171, NULL),
(40, 172, NULL),
(41, 173, NULL),
(42, 174, NULL),
(43, 175, NULL),
(44, 176, NULL),
(45, 177, NULL),
(46, 178, NULL),
(47, 179, NULL),
(48, 180, NULL),
(49, 181, NULL),
(50, 182, NULL),
(51, 183, NULL),
(52, 184, NULL),
(53, 185, NULL),
(54, 186, NULL),
(55, 187, NULL),
(56, 188, NULL),
(57, 189, NULL),
(58, 190, NULL),
(59, 191, NULL),
(60, 192, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `profile`
--

CREATE TABLE `profile` (
  `profile_id` int(11) NOT NULL,
  `profile_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `profile`
--

INSERT INTO `profile` (`profile_id`, `profile_name`) VALUES
(3, 'CAFE MANAGER'),
(2, 'CAFE OWNER'),
(4, 'CAFE STAFF'),
(1, 'SYSTEM ADMIN');

-- --------------------------------------------------------

--
-- Table structure for table `staff_bid_workslot`
--

CREATE TABLE `staff_bid_workslot` (
  `staff_bid_workslot_id` int(11) NOT NULL,
  `cafe_staff_id` int(11) NOT NULL,
  `workslot_id` int(11) NOT NULL,
  `bid_role` enum('Chef','Cashier','Waiter') NOT NULL,
  `bid_status` enum('Open','Approved','Rejected') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `staff_bid_workslot`
--

INSERT INTO `staff_bid_workslot` (`staff_bid_workslot_id`, `cafe_staff_id`, `workslot_id`, `bid_role`, `bid_status`) VALUES
(14, 1, 13, 'Chef', 'Approved'),
(15, 1, 13, 'Chef', 'Rejected'),
(20, 1, 15, 'Chef', 'Open'),
(21, 1, 16, 'Chef', 'Open'),
(22, 1, 17, 'Chef', 'Open'),
(23, 1, 18, 'Chef', 'Open'),
(24, 1, 19, 'Chef', 'Open'),
(25, 1, 20, 'Chef', 'Open'),
(26, 1, 21, 'Chef', 'Open'),
(27, 1, 22, 'Chef', 'Open'),
(28, 1, 23, 'Chef', 'Open'),
(29, 1, 24, 'Chef', 'Open'),
(30, 1, 25, 'Chef', 'Open');

-- --------------------------------------------------------

--
-- Table structure for table `staff_workslots`
--

CREATE TABLE `staff_workslots` (
  `staff_workslots_id` int(11) NOT NULL,
  `cafe_staff_id` int(11) NOT NULL,
  `workslot_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `staff_workslots`
--

INSERT INTO `staff_workslots` (`staff_workslots_id`, `cafe_staff_id`, `workslot_id`) VALUES
(4, 1, 13),
(8, 1, 15),
(5, 4, 16),
(12, 5, 17),
(11, 27, 15),
(13, 27, 24),
(14, 27, 33);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `profile_id` int(11) NOT NULL,
  `status` enum('ACTIVE','INACTIVE') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `email`, `password`, `name`, `profile_id`, `status`) VALUES
(1, 'bryantindramadi@gmail.com', 'admin', 'admin1', 1, 'ACTIVE'),
(2, 'staff@gmail.com', 'staff', 'staff1', 4, 'ACTIVE'),
(3, 'asdasd@asdasd', 'asdasdasd', 'asdasd', 3, 'ACTIVE'),
(4, 'asdasd@asd.asd', 'asdasd', 'adsasd', 1, 'ACTIVE'),
(5, 'tes@asdasd.asd', 'asdasd', 'asd', 2, 'ACTIVE'),
(7, 'test34@asd', 'asdasd', 'tes34', 2, 'ACTIVE'),
(9, 'sysadmin@asdasd', 'asdasd', 'asdasd', 1, 'ACTIVE'),
(10, 'owner@gmail.com', 'owner', 'owner', 2, 'ACTIVE'),
(11, 'manager@gmail.com', 'manager', 'manager', 3, 'ACTIVE'),
(12, 'staff2@gmail.com', 'staff2', 'staff2', 4, 'ACTIVE'),
(54, 'testtest@asd', 'test', 'test', 1, 'ACTIVE'),
(56, 'staff3@asdasd', 'staff3', 'staff3', 4, 'ACTIVE'),
(61, 'staff3@gmail.com', 'asdasd', 'staff3', 4, 'ACTIVE'),
(68, 'asdasd@asdsadsadsad', 'asdasd', 'asdsad', 4, 'ACTIVE'),
(70, 'test34679@gmail', 'asdasd', 'asdasd', 4, 'ACTIVE'),
(71, 'staff11@gmail.com', 'staff11', 'Staff11', 4, 'ACTIVE'),
(72, 'manager11@gmail.com', 'manager11', 'Manager11', 3, 'ACTIVE'),
(73, 'manager12@gmail.com', 'manager12', 'Manager12', 3, 'ACTIVE'),
(74, 'manager13@gmail.com', 'manager13', 'Manager13', 3, 'ACTIVE'),
(75, 'manager14@gmail.com', 'manager14', 'Manager14', 3, 'ACTIVE'),
(76, 'manager15@gmail.com', 'manager15', 'Manager15', 3, 'ACTIVE'),
(77, 'manager16@gmail.com', 'manager16', 'Manager16', 3, 'ACTIVE'),
(78, 'manager17@gmail.com', 'manager17', 'Manager17', 3, 'ACTIVE'),
(79, 'manager18@gmail.com', 'manager18', 'Manager18', 3, 'ACTIVE'),
(80, 'manager19@gmail.com', 'manager19', 'Manager19', 3, 'ACTIVE'),
(81, 'manager20@gmail.com', 'manager20', 'Manager20', 3, 'ACTIVE'),
(82, 'manager21@gmail.com', 'manager21', 'Manager21', 3, 'ACTIVE'),
(83, 'manager22@gmail.com', 'manager22', 'Manager22', 3, 'ACTIVE'),
(84, 'manager23@gmail.com', 'manager23', 'Manager23', 3, 'ACTIVE'),
(85, 'manager24@gmail.com', 'manager24', 'Manager24', 3, 'ACTIVE'),
(86, 'manager25@gmail.com', 'manager25', 'Manager25', 3, 'ACTIVE'),
(87, 'manager26@gmail.com', 'manager26', 'Manager26', 3, 'ACTIVE'),
(88, 'manager27@gmail.com', 'manager27', 'Manager27', 3, 'ACTIVE'),
(89, 'manager28@gmail.com', 'manager28', 'Manager28', 3, 'ACTIVE'),
(90, 'manager29@gmail.com', 'manager29', 'Manager29', 3, 'ACTIVE'),
(91, 'manager30@gmail.com', 'manager30', 'Manager30', 3, 'ACTIVE'),
(92, 'manager31@gmail.com', 'manager31', 'Manager31', 3, 'ACTIVE'),
(93, 'manager32@gmail.com', 'manager32', 'Manager32', 3, 'ACTIVE'),
(94, 'manager33@gmail.com', 'manager33', 'Manager33', 3, 'ACTIVE'),
(95, 'manager34@gmail.com', 'manager34', 'Manager34', 3, 'ACTIVE'),
(96, 'manager35@gmail.com', 'manager35', 'Manager35', 3, 'ACTIVE'),
(97, 'manager36@gmail.com', 'manager36', 'Manager36', 3, 'ACTIVE'),
(98, 'manager37@gmail.com', 'manager37', 'Manager37', 3, 'ACTIVE'),
(99, 'manager38@gmail.com', 'manager38', 'Manager38', 3, 'ACTIVE'),
(100, 'manager39@gmail.com', 'manager39', 'Manager39', 3, 'ACTIVE'),
(101, 'manager40@gmail.com', 'manager40', 'Manager40', 3, 'ACTIVE'),
(102, 'manager41@gmail.com', 'manager41', 'Manager41', 3, 'ACTIVE'),
(103, 'manager42@gmail.com', 'manager42', 'Manager42', 3, 'ACTIVE'),
(104, 'manager43@gmail.com', 'manager43', 'Manager43', 3, 'ACTIVE'),
(105, 'manager44@gmail.com', 'manager44', 'Manager44', 3, 'ACTIVE'),
(106, 'manager45@gmail.com', 'manager45', 'Manager45', 3, 'ACTIVE'),
(107, 'manager46@gmail.com', 'manager46', 'Manager46', 3, 'ACTIVE'),
(108, 'manager47@gmail.com', 'manager47', 'Manager47', 3, 'ACTIVE'),
(109, 'manager48@gmail.com', 'manager48', 'Manager48', 3, 'ACTIVE'),
(110, 'manager49@gmail.com', 'manager49', 'Manager49', 3, 'ACTIVE'),
(111, 'manager50@gmail.com', 'manager50', 'Manager50', 3, 'ACTIVE'),
(112, 'manager51@gmail.com', 'manager51', 'Manager51', 3, 'ACTIVE'),
(113, 'manager52@gmail.com', 'manager52', 'Manager52', 3, 'ACTIVE'),
(114, 'manager53@gmail.com', 'manager53', 'Manager53', 3, 'ACTIVE'),
(115, 'manager54@gmail.com', 'manager54', 'Manager54', 3, 'ACTIVE'),
(116, 'manager55@gmail.com', 'manager55', 'Manager55', 3, 'ACTIVE'),
(117, 'manager56@gmail.com', 'manager56', 'Manager56', 3, 'ACTIVE'),
(118, 'manager57@gmail.com', 'manager57', 'Manager57', 3, 'ACTIVE'),
(119, 'manager58@gmail.com', 'manager58', 'Manager58', 3, 'ACTIVE'),
(120, 'manager59@gmail.com', 'manager59', 'Manager59', 3, 'ACTIVE'),
(121, 'manager60@gmail.com', 'manager60', 'Manager60', 3, 'ACTIVE'),
(122, 'manager61@gmail.com', 'manager61', 'Manager61', 3, 'ACTIVE'),
(123, 'manager62@gmail.com', 'manager62', 'Manager62', 3, 'ACTIVE'),
(124, 'manager63@gmail.com', 'manager63', 'Manager63', 3, 'ACTIVE'),
(125, 'manager64@gmail.com', 'manager64', 'Manager64', 3, 'ACTIVE'),
(126, 'manager65@gmail.com', 'manager65', 'Manager65', 3, 'ACTIVE'),
(127, 'manager66@gmail.com', 'manager66', 'Manager66', 3, 'ACTIVE'),
(128, 'manager67@gmail.com', 'manager67', 'Manager67', 3, 'ACTIVE'),
(129, 'manager68@gmail.com', 'manager68', 'Manager68', 3, 'ACTIVE'),
(130, 'manager69@gmail.com', 'manager69', 'Manager69', 3, 'ACTIVE'),
(131, 'manager70@gmail.com', 'manager70', 'Manager70', 3, 'ACTIVE'),
(132, 'manager71@gmail.com', 'manager71', 'Manager71', 3, 'ACTIVE'),
(133, 'manager72@gmail.com', 'manager72', 'Manager72', 3, 'ACTIVE'),
(134, 'manager73@gmail.com', 'manager73', 'Manager73', 3, 'ACTIVE'),
(135, 'manager74@gmail.com', 'manager74', 'Manager74', 3, 'ACTIVE'),
(136, 'manager75@gmail.com', 'manager75', 'Manager75', 3, 'ACTIVE'),
(137, 'manager76@gmail.com', 'manager76', 'Manager76', 3, 'ACTIVE'),
(138, 'manager77@gmail.com', 'manager77', 'Manager77', 3, 'ACTIVE'),
(139, 'manager78@gmail.com', 'manager78', 'Manager78', 3, 'ACTIVE'),
(140, 'manager79@gmail.com', 'manager79', 'Manager79', 3, 'ACTIVE'),
(141, 'manager80@gmail.com', 'manager80', 'Manager80', 3, 'ACTIVE'),
(142, 'staff12@gmail.com', 'staff12', 'Staff12', 4, 'ACTIVE'),
(143, 'staff13@gmail.com', 'staff13', 'Staff13', 4, 'ACTIVE'),
(144, 'staff14@gmail.com', 'staff14', 'Staff14', 4, 'ACTIVE'),
(145, 'staff15@gmail.com', 'staff15', 'Staff15', 4, 'ACTIVE'),
(146, 'staff16@gmail.com', 'staff16', 'Staff16', 4, 'ACTIVE'),
(147, 'staff17@gmail.com', 'staff17', 'Staff17', 4, 'ACTIVE'),
(148, 'staff18@gmail.com', 'staff18', 'Staff18', 4, 'ACTIVE'),
(149, 'staff19@gmail.com', 'staff19', 'Staff19', 4, 'ACTIVE'),
(150, 'staff20@gmail.com', 'staff20', 'Staff20', 4, 'ACTIVE'),
(151, 'staff110@gmail.com', 'staff110', 'Staff110', 4, 'ACTIVE'),
(152, 'staff111@gmail.com', 'staff111', 'Staff111', 4, 'ACTIVE'),
(153, 'staff112@gmail.com', 'staff112', 'Staff112', 4, 'ACTIVE'),
(154, 'staff113@gmail.com', 'staff113', 'Staff113', 4, 'ACTIVE'),
(155, 'staff114@gmail.com', 'staff114', 'Staff114', 4, 'ACTIVE'),
(156, 'staff115@gmail.com', 'staff115', 'Staff115', 4, 'ACTIVE'),
(157, 'staff116@gmail.com', 'staff116', 'Staff116', 4, 'ACTIVE'),
(158, 'staff117@gmail.com', 'staff117', 'Staff117', 4, 'ACTIVE'),
(159, 'staff118@gmail.com', 'staff118', 'Staff118', 4, 'ACTIVE'),
(160, 'staff119@gmail.com', 'staff119', 'Staff119', 4, 'ACTIVE'),
(161, 'staff120@gmail.com', 'staff120', 'Staff120', 4, 'ACTIVE'),
(162, 'staff121@gmail.com', 'staff121', 'Staff121', 4, 'ACTIVE'),
(163, 'staff122@gmail.com', 'staff122', 'Staff122', 4, 'ACTIVE'),
(164, 'staff123@gmail.com', 'staff123', 'Staff123', 4, 'ACTIVE'),
(165, 'staff124@gmail.com', 'staff124', 'Staff124', 4, 'ACTIVE'),
(166, 'staff125@gmail.com', 'staff125', 'Staff125', 4, 'ACTIVE'),
(167, 'staff126@gmail.com', 'staff126', 'Staff126', 4, 'ACTIVE'),
(168, 'staff127@gmail.com', 'staff127', 'Staff127', 4, 'ACTIVE'),
(169, 'staff128@gmail.com', 'staff128', 'Staff128', 4, 'ACTIVE'),
(170, 'staff129@gmail.com', 'staff129', 'Staff129', 4, 'ACTIVE'),
(171, 'staff130@gmail.com', 'staff130', 'Staff130', 4, 'ACTIVE'),
(172, 'staff131@gmail.com', 'staff131', 'Staff131', 4, 'ACTIVE'),
(173, 'staff132@gmail.com', 'staff132', 'Staff132', 4, 'ACTIVE'),
(174, 'staff133@gmail.com', 'staff133', 'Staff133', 4, 'ACTIVE'),
(175, 'staff134@gmail.com', 'staff134', 'Staff134', 4, 'ACTIVE'),
(176, 'staff135@gmail.com', 'staff135', 'Staff135', 4, 'ACTIVE'),
(177, 'staff136@gmail.com', 'staff136', 'Staff136', 4, 'ACTIVE'),
(178, 'staff137@gmail.com', 'staff137', 'Staff137', 4, 'ACTIVE'),
(179, 'staff138@gmail.com', 'staff138', 'Staff138', 4, 'ACTIVE'),
(180, 'staff139@gmail.com', 'staff139', 'Staff139', 4, 'ACTIVE'),
(181, 'staff140@gmail.com', 'staff140', 'Staff140', 4, 'ACTIVE'),
(182, 'staff141@gmail.com', 'staff141', 'Staff141', 4, 'ACTIVE'),
(183, 'staff142@gmail.com', 'staff142', 'Staff142', 4, 'ACTIVE'),
(184, 'staff143@gmail.com', 'staff143', 'Staff143', 4, 'ACTIVE'),
(185, 'staff144@gmail.com', 'staff144', 'Staff144', 4, 'ACTIVE'),
(186, 'staff145@gmail.com', 'staff145', 'Staff145', 4, 'ACTIVE'),
(187, 'staff146@gmail.com', 'staff146', 'Staff146', 4, 'ACTIVE'),
(188, 'staff147@gmail.com', 'staff147', 'Staff147', 4, 'ACTIVE'),
(189, 'staff148@gmail.com', 'staff148', 'Staff148', 4, 'ACTIVE'),
(190, 'staff149@gmail.com', 'staff149', 'Staff149', 4, 'ACTIVE'),
(191, 'staff150@gmail.com', 'staff150', 'Staff150', 4, 'ACTIVE'),
(192, 'staff199@gmail.com', 'staff199', 'Staff199', 4, 'ACTIVE'),
(193, 'admin1@gmail.com', 'admin1', 'Admin1', 1, 'ACTIVE'),
(194, 'admin2@gmail.com', 'admin2', 'Admin2', 1, 'ACTIVE'),
(195, 'admin3@gmail.com', 'admin3', 'Admin3', 1, 'ACTIVE'),
(196, 'admin4@gmail.com', 'admin4', 'Admin4', 1, 'ACTIVE'),
(197, 'admin5@gmail.com', 'admin5', 'Admin5', 1, 'ACTIVE'),
(198, 'admin6@gmail.com', 'admin6', 'Admin6', 1, 'ACTIVE'),
(199, 'admin7@gmail.com', 'admin7', 'Admin7', 1, 'ACTIVE'),
(200, 'admin8@gmail.com', 'admin8', 'Admin8', 1, 'ACTIVE'),
(201, 'admin9@gmail.com', 'admin9', 'Admin9', 1, 'ACTIVE'),
(202, 'admin10@gmail.com', 'admin10', 'Admin10', 1, 'ACTIVE');

-- --------------------------------------------------------

--
-- Table structure for table `workslot`
--

CREATE TABLE `workslot` (
  `workslot_id` int(11) NOT NULL,
  `workslot_name` varchar(255) NOT NULL,
  `chef_qty` int(11) NOT NULL DEFAULT 0,
  `cashier_qty` int(11) NOT NULL DEFAULT 0,
  `waiter_qty` int(11) NOT NULL DEFAULT 0,
  `workslot_date` date NOT NULL,
  `start_time` time NOT NULL,
  `end_time` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `workslot`
--

INSERT INTO `workslot` (`workslot_id`, `workslot_name`, `chef_qty`, `cashier_qty`, `waiter_qty`, `workslot_date`, `start_time`, `end_time`) VALUES
(13, 'workslot1', 1, 0, 0, '2023-11-23', '15:02:00', '21:02:00'),
(14, 'workslot-2', 0, 0, 0, '2023-11-24', '10:30:00', '22:30:00'),
(15, 'workslot 10', 1, 1, 0, '2023-11-20', '15:00:00', '21:00:00'),
(16, 'workslot 11', 0, 1, 0, '2023-11-21', '15:00:00', '21:00:00'),
(17, 'workslot 12', 0, 0, 1, '2023-11-22', '15:00:00', '21:00:00'),
(18, 'workslot 13', 0, 0, 0, '2023-11-23', '15:00:00', '21:00:00'),
(19, 'workslot 14', 0, 0, 0, '2023-11-24', '15:00:00', '21:00:00'),
(20, 'workslot 15', 0, 0, 0, '2023-11-25', '15:00:00', '21:00:00'),
(21, 'workslot 16', 0, 0, 0, '2023-11-26', '15:00:00', '21:00:00'),
(22, 'workslot 17', 0, 0, 0, '2023-11-27', '15:00:00', '21:00:00'),
(23, 'workslot 18', 0, 0, 0, '2023-11-28', '15:00:00', '21:00:00'),
(24, 'workslot 19', 0, 1, 0, '2023-11-29', '15:00:00', '21:00:00'),
(25, 'workslot 11', 0, 0, 0, '2023-12-01', '15:00:00', '21:00:00'),
(26, 'workslot 12', 0, 0, 0, '2023-12-02', '15:00:00', '21:00:00'),
(27, 'workslot 13', 0, 0, 0, '2023-12-03', '15:00:00', '21:00:00'),
(28, 'workslot 14', 0, 0, 0, '2023-12-04', '15:00:00', '21:00:00'),
(29, 'workslot 15', 0, 0, 0, '2023-12-05', '15:00:00', '21:00:00'),
(30, 'workslot 16', 0, 0, 0, '2023-12-06', '15:00:00', '21:00:00'),
(31, 'workslot 17', 0, 0, 0, '2023-12-07', '15:00:00', '21:00:00'),
(32, 'workslot 18', 0, 0, 0, '2023-12-08', '15:00:00', '21:00:00'),
(33, 'workslot 19', 0, 1, 0, '2023-12-09', '15:00:00', '21:00:00'),
(34, 'workslot 20', 0, 0, 0, '2023-12-10', '15:00:00', '21:00:00'),
(35, 'workslot 21', 0, 0, 0, '2023-12-11', '15:00:00', '21:00:00'),
(36, 'workslot 22', 0, 0, 0, '2023-12-12', '15:00:00', '21:00:00'),
(37, 'workslot 23', 0, 0, 0, '2023-12-13', '15:00:00', '21:00:00'),
(38, 'workslot 24', 0, 0, 0, '2023-12-14', '15:00:00', '21:00:00'),
(39, 'workslot 25', 0, 0, 0, '2023-12-15', '15:00:00', '21:00:00'),
(40, 'workslot 26', 0, 0, 0, '2023-12-16', '15:00:00', '21:00:00'),
(41, 'workslot 27', 0, 0, 0, '2023-12-17', '15:00:00', '21:00:00'),
(42, 'workslot 28', 0, 0, 0, '2023-12-18', '15:00:00', '21:00:00'),
(43, 'workslot 29', 0, 0, 0, '2023-12-19', '15:00:00', '21:00:00'),
(44, 'workslot 30', 0, 0, 0, '2023-12-20', '15:00:00', '21:00:00'),
(45, 'workslot 31', 0, 0, 0, '2023-12-21', '15:00:00', '21:00:00'),
(46, 'workslot 32', 0, 0, 0, '2023-12-22', '15:00:00', '21:00:00'),
(47, 'workslot 33', 0, 0, 0, '2023-12-23', '15:00:00', '21:00:00'),
(48, 'workslot 34', 0, 0, 0, '2023-12-24', '15:00:00', '21:00:00'),
(49, 'workslot 35', 0, 0, 0, '2023-12-25', '15:00:00', '21:00:00'),
(50, 'workslot 36', 0, 0, 0, '2023-12-26', '15:00:00', '21:00:00'),
(51, 'workslot 37', 0, 0, 0, '2023-12-27', '15:00:00', '21:00:00'),
(52, 'workslot 38', 0, 0, 0, '2023-12-28', '15:00:00', '21:00:00'),
(53, 'workslot 39', 0, 0, 0, '2023-12-29', '15:00:00', '21:00:00'),
(54, 'workslot 40', 0, 0, 0, '2023-12-30', '15:00:00', '21:00:00'),
(55, 'workslot 41', 0, 0, 0, '2023-12-31', '15:00:00', '21:00:00');

--
-- Triggers `workslot`
--
DELIMITER $$
CREATE TRIGGER `before_insert_workslot` BEFORE INSERT ON `workslot` FOR EACH ROW BEGIN
    IF NEW.workslot_date < CURRENT_DATE THEN
        SIGNAL SQLSTATE '45000'
        SET MESSAGE_TEXT = 'Invalid workslot_date: Cannot insert past dates';
    END IF;
END
$$
DELIMITER ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cafe_staff`
--
ALTER TABLE `cafe_staff`
  ADD PRIMARY KEY (`cafe_staff_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `profile`
--
ALTER TABLE `profile`
  ADD PRIMARY KEY (`profile_id`),
  ADD UNIQUE KEY `profile_name` (`profile_name`);

--
-- Indexes for table `staff_bid_workslot`
--
ALTER TABLE `staff_bid_workslot`
  ADD PRIMARY KEY (`staff_bid_workslot_id`),
  ADD UNIQUE KEY `uniqueBid` (`cafe_staff_id`,`workslot_id`,`bid_status`),
  ADD KEY `workslot_id` (`workslot_id`);

--
-- Indexes for table `staff_workslots`
--
ALTER TABLE `staff_workslots`
  ADD PRIMARY KEY (`staff_workslots_id`),
  ADD UNIQUE KEY `unique_staff_workslot` (`cafe_staff_id`,`workslot_id`),
  ADD KEY `workslot_id` (`workslot_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD KEY `role_id` (`profile_id`);

--
-- Indexes for table `workslot`
--
ALTER TABLE `workslot`
  ADD PRIMARY KEY (`workslot_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cafe_staff`
--
ALTER TABLE `cafe_staff`
  MODIFY `cafe_staff_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;

--
-- AUTO_INCREMENT for table `profile`
--
ALTER TABLE `profile`
  MODIFY `profile_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `staff_bid_workslot`
--
ALTER TABLE `staff_bid_workslot`
  MODIFY `staff_bid_workslot_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `staff_workslots`
--
ALTER TABLE `staff_workslots`
  MODIFY `staff_workslots_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=203;

--
-- AUTO_INCREMENT for table `workslot`
--
ALTER TABLE `workslot`
  MODIFY `workslot_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `cafe_staff`
--
ALTER TABLE `cafe_staff`
  ADD CONSTRAINT `cafe_staff_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`);

--
-- Constraints for table `staff_bid_workslot`
--
ALTER TABLE `staff_bid_workslot`
  ADD CONSTRAINT `staff_bid_workslot_ibfk_1` FOREIGN KEY (`cafe_staff_id`) REFERENCES `cafe_staff` (`cafe_staff_id`),
  ADD CONSTRAINT `staff_bid_workslot_ibfk_2` FOREIGN KEY (`workslot_id`) REFERENCES `workslot` (`workslot_id`);

--
-- Constraints for table `staff_workslots`
--
ALTER TABLE `staff_workslots`
  ADD CONSTRAINT `staff_workslots_ibfk_1` FOREIGN KEY (`cafe_staff_id`) REFERENCES `cafe_staff` (`cafe_staff_id`),
  ADD CONSTRAINT `staff_workslots_ibfk_2` FOREIGN KEY (`workslot_id`) REFERENCES `workslot` (`workslot_id`);

--
-- Constraints for table `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `user_ibfk_1` FOREIGN KEY (`profile_id`) REFERENCES `profile` (`profile_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
