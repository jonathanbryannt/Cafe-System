-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Nov 17, 2023 at 07:50 AM
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
  `role` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cafe_staff`
--

INSERT INTO `cafe_staff` (`cafe_staff_id`, `user_id`, `role`) VALUES
(1, 2, 'Chef'),
(3, 70, NULL),
(4, 12, 'Cashier');

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
(15, 1, 13, 'Chef', 'Rejected');

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
(4, 1, 13);

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
(70, 'test34679@gmail', 'asdasd', 'asdasd', 4, 'ACTIVE');

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
) ;

--
-- Dumping data for table `workslot`
--

INSERT INTO `workslot` (`workslot_id`, `workslot_name`, `chef_qty`, `cashier_qty`, `waiter_qty`, `workslot_date`, `start_time`, `end_time`) VALUES
(13, 'workslot1', 1, 0, 0, '2023-11-23', '15:02:00', '21:02:00'),
(14, 'workslot-2', 0, 0, 0, '2023-11-24', '10:30:00', '22:30:00');

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
  MODIFY `cafe_staff_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `profile`
--
ALTER TABLE `profile`
  MODIFY `profile_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `staff_bid_workslot`
--
ALTER TABLE `staff_bid_workslot`
  MODIFY `staff_bid_workslot_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `staff_workslots`
--
ALTER TABLE `staff_workslots`
  MODIFY `staff_workslots_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=71;

--
-- AUTO_INCREMENT for table `workslot`
--
ALTER TABLE `workslot`
  MODIFY `workslot_id` int(11) NOT NULL AUTO_INCREMENT;

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
  ADD CONSTRAINT `staff_workslots_ibfk_1` FOREIGN KEY (`cafe_staff_id`) REFERENCES `user` (`user_id`),
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
