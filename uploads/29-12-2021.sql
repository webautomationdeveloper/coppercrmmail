-- phpMyAdmin SQL Dump
-- version 4.6.6deb5ubuntu0.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Dec 29, 2021 at 10:21 AM
-- Server version: 5.7.36-0ubuntu0.18.04.1
-- PHP Version: 7.2.24-0ubuntu0.18.04.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `vehicle`
--

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(300) NOT NULL,
  `phon` varchar(20) NOT NULL,
  `address` varchar(250) NOT NULL,
  `city` varchar(250) NOT NULL,
  `district` varchar(250) NOT NULL,
  `state` varchar(250) NOT NULL,
  `country` varchar(250) NOT NULL,
  `zip` int(10) NOT NULL,
  `join_date` date DEFAULT NULL,
  `emp_id` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`id`, `name`, `email`, `phon`, `address`, `city`, `district`, `state`, `country`, `zip`, `join_date`, `emp_id`) VALUES
(1, 'Maryaaa', 'aa@gmail.com', '123123123', '', '', '', '', '', 0, NULL, 0),
(2, 'a', 'a@gmail.com', '112', 'a', 'a', 'a', 'a', 'a', 111, '2021-12-24', NULL),
(3, 'abc', 'abc@gmail.com', '7878787878', 'abc', 'abc', 'abc', 'abc', 'abc', 123123, '2021-12-24', NULL),
(4, 'aaaa', 'aaaaa@gmail.com', '6546546546', 'asdfas', 'adf', 'asdf', 'asdf', 'asdf', 23, '2021-12-24', NULL),
(5, 'asdf', 'adsf@gmail.com', '123123', 'sadf', 'asdf', 'asdf', 'asdf', 'asdf', 123451, '2021-12-24', NULL),
(6, 'dfgdfg', 'asdf@gmail.com', '564', 'dsfg', 'dfg', 'dfg', 'dfg', 'dfg', 56455, '2021-12-24', NULL),
(7, 'dfgdfg', 'asdf@gmail.com', '564', 'dsfg', 'dfg', 'dfg', 'dfg', 'dfg', 56455, '2021-12-24', NULL),
(8, 'dfgdfg', 'asdf@gmail.com', '564', 'dsfg', 'dfg', 'dfg', 'dfg', 'dfg', 56455, '2021-12-24', NULL),
(9, 'sdf', 'hjkhjvehicle@gmail.com', '54654', 'sadf', 'sdf', 'asdf', 'asdf', 'asdf', 6546, '2021-12-24', NULL),
(10, 'sdf', 'hjkhjvehicle@gmail.com', '54654', 'sadf', 'sdf', 'asdf', 'asdf', 'asdf', 6546, '2021-12-24', NULL),
(11, 'dfgdfg', 'dfgdfg@gms.com', '54654', 'sdfasdf', 'sdfasdf', 'asdfasdf', 'asdfasdf', 'asdfasdf', 6546546, '2021-12-24', NULL),
(12, 'sdfsdf', 'sdfsdfsd@gm.com', '55465465', '654dfa', 'asdf', 'sdfasfd', 'dfasdf', 'asdf', 654, '2021-12-24', NULL),
(13, 'dfgdfgd', 'dfgdfgr@gmail.com', '5465465', 'dfgerdf', 'dsfg', 'dsfg', 'dsfgs', 'dsfg', 65459, '2021-12-24', NULL),
(14, 'dsfgdfg', 'sdfg@sdfg.vdgdf', '65465464', 'sdfsdf', 'sadfasdf', 'sdfasdf', 'sadf', 'asdf', 65465, '2021-12-24', NULL),
(15, 'dfg', 'dsfg@hj.fghd', '65456', 'sdfgs', 'dfgsdfg', 'sdfgsd', 'sdfg', 'sdfg', 45865, '2021-12-24', NULL),
(16, 'dfg', 'dsfg@hj.fghd', '65456', 'sdfgs', 'dfgsdfg', 'sdfgsd', 'sdfg', 'sdfg', 45865, '2021-12-24', NULL),
(17, 'dfgsdd', 'sfgsdfg@sdf.dsf', '6546546', 'sadfasdf', 'sadf', 'asdf', 'asdf', 'asdf', 65465, '2021-12-24', NULL),
(18, 'sdfsdf', 'sdfsdf@sdf.sdf', '65465', 'sdf', 'sdf', 'sdf', 'sdf', 'sdf', 648, '2021-12-24', NULL),
(19, 'Ashok Sir', 'ashok@gmail.com', '45454545', 'Mohali', 'Mohali', 'Mohali', 'Punjab', 'India', 0, '2021-12-24', NULL),
(20, 'dfgdf', 'dfg@asdf.dfg', '65464654', 'dfgdsfg', 'dfgdfg', 'sdfg', 'sdfg', 'sdfg', 654647, '2021-12-24', NULL),
(21, 'dfgs', 'dfsfd@sdfg.fghj', '654654654', '654dfg', 'dsfgdgs', 'sdfgs', 'sdfgh', 'sdfg', 654654, '2021-12-24', NULL),
(22, 'sadf', 'asdf@ght.hfgghf', '7524423', 'asdgf', 'dfg', 'sdfg', 'sdf', 'dfg', 45239, '2021-12-24', NULL),
(23, 'sdfg', 'sdfg@fsgh.hjngf', '4532453', 'gfdszfg', 'sdfg', 'sdfg', 'sdfg', 'sdfg', 3449, '2021-12-24', NULL),
(24, 'dfg', 'dfg@dfg.dfg', '5643425', 'dsfgdfg', 'dfgdfg', 'dfgdfg', 'dfgdfg', 'sdfgsdfg', 654654, '2021-12-24', NULL),
(25, 'dsfg', 'dsgf@dfg.gfhj', '4534565', 'dfsdfsdf', 'asdf', 'asdf', 'sdf', 'asdf', 345319, '2021-12-24', NULL),
(26, 'df', 'asdf@sdfg.hgfjghj', '345345345', 'sdgsdfg', 'dfgdfg', 'sdfgdfsg', 'dfg', 'dfg', 435345, '2021-12-24', NULL),
(27, 'sdf', 'sadf@fghfhdg.dfgdfg', '34534534', 'sdfasdfas', 'asdfasd', 'asdf', 'asdf', 'asdf', 45338, '2021-12-24', NULL),
(28, 'dsfg', 'sdfg@sdfg.jghjg', '4345345', 'dsfgsdfg', 'ert', 'dgs', 'dgf', 'sdg', 345, '2021-12-24', NULL),
(29, 'dsfg', 'sdfg@sdfg.jghjg', '4345345', 'dsfgsdfg', 'ert', 'dgs', 'dgf', 'sdg', 345, '2021-12-24', NULL),
(30, 'dsfg', 'sdfg@sdfg.jghjg', '4345345', 'dsfgsdfg', 'ert', 'dgs', 'dgf', 'sdg', 345, '2021-12-24', NULL),
(31, 'dsfg', 'sdfg@sdfg.jghjg', '4345345', 'dsfgsdfg', 'ert', 'dgs', 'dgf', 'sdg', 345, '2021-12-24', NULL),
(32, 'sdfg', 'sdf@fghfg.fghgdgf', '2343423', ' ggfgf', 'sdfg', 'sdgf', 'sdfg', 'sdfg', 345, '2021-12-24', NULL),
(33, 'sdfg', 'sdf@fghfg.fghgdgf', '2343423', ' ggfgf', 'sdfg', 'sdgf', 'sdfg', 'sdfg', 345, '2021-12-24', NULL),
(34, 'sdfg', 'sdf@fghfg.fghgdgf', '2343423', ' ggfgf', 'sdfg', 'sdgf', 'sdfg', 'sdfg', 345, '2021-12-24', NULL),
(35, 'sdf', 'sdf@dfh.fgfghfgh', '34534', 'fgh', 'fghd', 'fgh', 'fgh', 'dfgh', 566543, '2021-12-24', NULL),
(36, 'dfg', 'dfg@dfg.hjjhg', '345545', 'xfdgh', 'fdghgfg', 'dfgh', 'dfgh', 'dfgh', 345, '2021-12-24', NULL),
(37, 'sdfsdf', 'sdffds@dfgdfg.dfgdf', '234234', 'sdfd', 'dfg', 'dfg', 'sdfg', 'sdfg', 34528, '2021-12-24', NULL),
(38, 'sdfsdf', 'sdffds@dfgdfg.dfgdf', '234234', 'sdfd', 'dfg', 'dfg', 'sdfg', 'sdfg', 34528, '2021-12-24', NULL),
(39, 'fdgsd', 'dfgdfg@fgh.dfg', '234234', 'dfsgv', 'dfg', 'sdfg', 'dsfg', 'sdfg', 345, '2021-12-24', NULL),
(40, 'fdgsd', 'dfgdfg@fgh.dfg', '234234', 'dfsgv', 'dfg', 'sdfg', 'dsfg', 'sdfg', 345, '2021-12-24', NULL),
(41, 'fdgsd', 'dfgdfg@fgh.dfg', '234234', 'dfsgv', 'dfg', 'sdfg', 'dsfg', 'sdfg', 345, '2021-12-24', NULL),
(42, 'dsrgdfg', 'dfgdfg@fgh.fdgdfg', '34535', 'sdfg', 'gdfgs', 'fdgsdg', 'dsfg', 'sdfg', 3460, '2021-12-24', NULL),
(43, 'dsrgdfg', 'dfgdfg@fgh.fdgdfg', '34535', 'sdfg', 'gdfgs', 'fdgsdg', 'dsfg', 'sdfg', 3460, '2021-12-24', NULL),
(44, 'dsfg', 'sdfsdf@dfg.asdf', '345', 'fgh', 'dfgh', 'dfgh', 'dfg', 'dfg', 5345, '2021-12-24', NULL),
(45, 'dsfg', 'sdfg@dfg.cdffds', '345345', 'scfxgsds', 'sdfg', 'sdfg', 'sdfg', 'sdfg', 5439, '2021-12-24', NULL),
(46, 'dsfg', 'sdfg@dfg.cdffds', '345345', 'scfxgsds', 'sdfg', 'sdfg', 'sdfg', 'sdfg', 5439, '2021-12-24', NULL),
(47, 'dsfg', 'sdfg@dfg.cdffds', '345345', 'scfxgsds', 'sdfg', 'sdfg', 'sdfg', 'sdfg', 5439, '2021-12-24', NULL),
(48, 'dsfg', 'sdfg@dfg.cdffds', '345345', 'scfxgsds', 'sdfg', 'sdfg', 'sdfg', 'sdfg', 5439, '2021-12-24', NULL),
(49, 'Raman', 'raman@gmail.com', '9030903090', 'Kurukshetra', 'Kurukshetra', 'Kurukshetra', 'Haryana', 'India', 136125, '2021-12-24', NULL),
(50, 'Raman', 'raman@gmail.com', '77777777777777', 'KKR', 'KKR', 'KKR', 'HR', 'IND', 0, '2021-12-24', NULL),
(51, 'dsf', 'sdf@dsfg.dfg', '54654', 'asdfs', 'asdf', 'asdf', 'asdf', 'asdf', 648, '2021-12-24', NULL),
(52, 'dsf', 'sdf@dsfg.dfg', '54654', 'asdfs', 'asdf', 'asdf', 'asdf', 'asdf', 648, '2021-12-24', NULL),
(53, 'Raman', 'raman@gmail.com', '9090909090', 'KKR', 'KKR', 'KKR', 'HR', 'IND', 136125, '2021-12-24', NULL),
(54, 'test', 'test@gmail.com', '0000000000', 'test', 'test', 'test', 'test', 'test', 0, '2021-12-24', NULL),
(55, 'sdf', 'sdf@dfgd.fhfgh', '345353', 'dfgdfg', 'dfg', 'dsfg', 'dfg', 'dsfg', 2345, '2021-12-24', NULL),
(56, 'sdf', 'sdf@dfgd.fhfgh', '345353', 'dfgdfg', 'dfg', 'dsfg', 'dfg', 'dsfg', 2345, '2021-12-24', NULL),
(57, 'dfg', 'gdfgdfgg@ffghfg.sdfsdf', '453453', 'dsfgvdf', 'dfgdfg', 'dfgdfg', 'dfgdfg', 'dfgdfg', 3245, '2021-12-24', NULL),
(58, 'dsaf', 'sdf@dfg.sdf', '234234', 'gfds', 'sdfg', 'sdafg', 'sdfg', 'sdfg', 4319, '2021-12-24', NULL),
(59, 'dsaf', 'sdf@dfg.sdf', '234234', 'gfds', 'sdfg', 'sdafg', 'sdfg', 'sdfg', 4319, '2021-12-24', NULL),
(60, 'sdf', 'sadf@dsfrg.sdf', '43345', 'sdf', 'sdf', 'sadf', 'asdf', 'asdf', 2344, '2021-12-24', NULL),
(61, 'sdf', 'sadf@dsfrg.sdf', '43345', 'sdf', 'sdf', 'sadf', 'asdf', 'asdf', 2344, '2021-12-24', NULL),
(62, 'singh', 'singh@gmail.coll', '48907539485', ';lskdfja;l', ';sldkfj', ';lskdjf', ';asflkdj', ';askdlfj', 304985, '2021-12-24', NULL),
(63, 'dsdf', 'sdf@dsfgh.dfg', '23423', 'sdzfgsdfg', 'gfdfg', 'dfgsdgf', 'sdfg', 'dfg', 345, '2021-12-25', NULL),
(64, 'Raman', 'testtest@gmail.com', '56465456465', 'test', 'test', 'test', 'testq', 'test', 546645, '2021-12-25', NULL),
(65, 'testtest', 'test@gmail.commm', '65465', '654', '654', '654', '654', '654', 654, '2021-12-25', NULL),
(66, 'dfg', 'dfg@dfg.dfg', '4325', 'dfg', 'sdfg', 'sdfg', 'sdfg', 'sdfg', 345, '2021-12-25', NULL),
(67, 'Yogesh', 'yogesh@gmail.com', '9898989898', 'Rewari', 'Rewari', 'Rewari', 'HR Department', 'Indian', 125125, '2021-12-28', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `office_record`
--

CREATE TABLE `office_record` (
  `id` int(11) NOT NULL,
  `name` varchar(500) NOT NULL,
  `email` varchar(500) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL,
  `join_date` varchar(200) DEFAULT NULL,
  `leave_date` varchar(200) DEFAULT NULL,
  `active` int(1) NOT NULL DEFAULT '1',
  `role_id` int(1) NOT NULL DEFAULT '2'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `office_record`
--

INSERT INTO `office_record` (`id`, `name`, `email`, `phone`, `password`, `join_date`, `leave_date`, `active`, `role_id`) VALUES
(1, 'admin', 'admin@gmail.com', '1234567899', '12345678', '', NULL, 1, 1),
(2, 'John Cena', 'abc@gmail.com', '65468012', '12345678', NULL, NULL, 1, 2),
(3, 'a', 'aa@gmail.com', '2345345345', 'sdfgfg', NULL, NULL, 1, 2),
(5, 'v', 'aav@gmail.com', '4564565', '456fghfgh', NULL, NULL, 1, 2),
(6, 'Roman', 'roman@gmail.com', '98989898', '12345678', NULL, NULL, 1, 2);

-- --------------------------------------------------------

--
-- Table structure for table `vehicle_info`
--

CREATE TABLE `vehicle_info` (
  `id` int(10) NOT NULL,
  `customer_id` int(10) NOT NULL,
  `vehicle_type_id` int(10) DEFAULT NULL,
  `vehicle_no` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `vehicle_info`
--

INSERT INTO `vehicle_info` (`id`, `customer_id`, `vehicle_type_id`, `vehicle_no`) VALUES
(1, 12, 2, ''),
(2, 15, 1, 'dfgsdfg'),
(3, 17, 3, '4654sdf'),
(4, 18, 2, 'sdf'),
(5, 19, 4, 'HR07AB1234'),
(6, 20, 2, 'dfgdsfg'),
(7, 21, 2, 'dfgdf'),
(8, 22, 1, 'dfgh'),
(9, 23, 1, 'fgh'),
(10, 24, 1, 'd6f5g4'),
(11, 25, 1, 'sdfsdf345'),
(12, 26, 1, 'dfg'),
(13, 27, 1, 'asdfasdf'),
(14, 28, 1, 'sdfg'),
(15, 29, 1, 'sdfg'),
(16, 30, 1, 'sdfg'),
(17, 31, 1, 'sdfg'),
(18, 32, 1, 'fgb'),
(19, 33, 1, 'fgb'),
(20, 34, 1, 'fgb'),
(21, 35, 2, 'fgh'),
(22, 36, 2, 'fdgh'),
(23, 37, 1, 'dfgdfg'),
(24, 38, 1, 'dfgdfg'),
(25, 39, 1, 'dfg'),
(26, 40, 1, 'dfg'),
(27, 41, 1, 'dfg'),
(28, 42, 1, 'sdfg'),
(29, 43, 1, 'sdfg'),
(30, 44, 1, 'dfg'),
(31, 45, 1, 'ty'),
(32, 46, 1, 'ty'),
(33, 47, 1, 'ty'),
(34, 48, 1, 'ty'),
(35, 49, 3, 'HR07AC0001'),
(36, 49, 3, 'HR07'),
(37, 52, 1, ''),
(38, 54, 1, 'HRtestq'),
(39, 55, 1, 'sdf'),
(40, 56, 1, 'sdf'),
(41, 57, 1, 'dfg'),
(42, 58, 1, '345dfg'),
(43, 59, 1, '345dfg'),
(44, 60, 1, 'sdf'),
(45, 61, 1, 'sdf'),
(46, 62, 1, 'sadf234sdf'),
(47, 63, 1, 'dfg'),
(48, 49, 3, '454FDSE'),
(49, 65, 1, '654'),
(50, 65, 1, 'qwfweq'),
(51, 66, 1, 'dfg'),
(52, 67, 2, 'HR07AV1234'),
(53, 67, 2, 'HR07AV1234'),
(54, 49, 5, 'HR070ABC2040');

-- --------------------------------------------------------

--
-- Table structure for table `vehicle_type`
--

CREATE TABLE `vehicle_type` (
  `id` int(11) NOT NULL,
  `vehicle_name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `vehicle_type`
--

INSERT INTO `vehicle_type` (`id`, `vehicle_name`) VALUES
(1, 'CAR'),
(2, 'BUS'),
(3, 'Truck'),
(4, 'Zeep'),
(5, 'ABC');

-- --------------------------------------------------------

--
-- Table structure for table `work_orders`
--

CREATE TABLE `work_orders` (
  `id` int(10) NOT NULL,
  `customers_id` int(10) NOT NULL,
  `vehicle_info_id` int(10) NOT NULL,
  `work_type_id` int(10) NOT NULL,
  `start_date` date DEFAULT NULL,
  `end_date` date DEFAULT NULL,
  `amount` int(100) DEFAULT NULL,
  `any_comment` varchar(250) DEFAULT NULL,
  `status` varchar(100) DEFAULT NULL,
  `emp_id` int(10) DEFAULT NULL,
  `updated_date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `work_orders`
--

INSERT INTO `work_orders` (`id`, `customers_id`, `vehicle_info_id`, `work_type_id`, `start_date`, `end_date`, `amount`, `any_comment`, `status`, `emp_id`, `updated_date`) VALUES
(1, 18, 4, 2, NULL, '2021-12-31', NULL, NULL, '', NULL, NULL),
(2, 19, 5, 2, NULL, NULL, NULL, NULL, '', NULL, NULL),
(3, 22, 8, 1, NULL, NULL, NULL, NULL, '', NULL, NULL),
(4, 24, 10, 1, NULL, NULL, NULL, NULL, '', 2, '2021-12-24'),
(5, 37, 23, 1, '2021-12-26', NULL, 34534, 'sdfsdf', '', 2, '2021-12-24'),
(6, 39, 25, 1, '2021-12-26', NULL, 4534, 'dfgsdfg', '', 2, '2021-12-24'),
(7, 46, 32, 1, '2021-12-25', NULL, 456, 'dfgh', '', 2, '2021-12-24'),
(8, 48, 34, 1, '2021-12-25', NULL, 456, 'dfgh', '', 2, '2021-12-24'),
(9, 60, 44, 1, '2021-12-25', NULL, 234, 'sadf', '', 2, '2021-12-24'),
(10, 62, 46, 1, '2021-12-25', '2021-12-28', 234, 'sadf', '', 2, '2021-12-24'),
(11, 63, 47, 1, '2021-12-26', '2021-12-18', 435, 'zdfg', '', 2, '2021-12-25');

-- --------------------------------------------------------

--
-- Table structure for table `work_type`
--

CREATE TABLE `work_type` (
  `id` int(11) NOT NULL,
  `work_name` varchar(100) NOT NULL,
  `count` int(11) NOT NULL,
  `format` text NOT NULL,
  `due_days` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `work_type`
--

INSERT INTO `work_type` (`id`, `work_name`, `count`, `format`, `due_days`) VALUES
(1, 'PUC', 6, '1', 5),
(2, 'Text', 180, '0', 7),
(3, 'Licence', 1, '2', 10);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `office_record`
--
ALTER TABLE `office_record`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `vehicle_info`
--
ALTER TABLE `vehicle_info`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `vehicle_type`
--
ALTER TABLE `vehicle_type`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `work_orders`
--
ALTER TABLE `work_orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `work_type`
--
ALTER TABLE `work_type`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=68;
--
-- AUTO_INCREMENT for table `office_record`
--
ALTER TABLE `office_record`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `vehicle_info`
--
ALTER TABLE `vehicle_info`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;
--
-- AUTO_INCREMENT for table `vehicle_type`
--
ALTER TABLE `vehicle_type`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `work_orders`
--
ALTER TABLE `work_orders`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `work_type`
--
ALTER TABLE `work_type`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
