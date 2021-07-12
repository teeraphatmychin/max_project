-- phpMyAdmin SQL Dump
-- version 4.8.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 31, 2018 at 09:06 PM
-- Server version: 10.1.34-MariaDB
-- PHP Version: 7.2.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_staff_manage`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_admin`
--

CREATE TABLE `tb_admin` (
  `id` int(11) NOT NULL,
  `username` text NOT NULL,
  `password` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tb_admin`
--

INSERT INTO `tb_admin` (`id`, `username`, `password`) VALUES
(1, 'admin', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `tb_department`
--

CREATE TABLE `tb_department` (
  `dep_id` int(2) UNSIGNED ZEROFILL NOT NULL,
  `dep_name` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tb_department`
--

INSERT INTO `tb_department` (`dep_id`, `dep_name`) VALUES
(01, 'พนักงานล้างจาน'),
(02, 'พนักงานเสิร์ฟ'),
(03, 'พนักงานทำความสะอาด'),
(04, 'พนักงานทำอาหาร');

-- --------------------------------------------------------

--
-- Table structure for table `tb_ot`
--

CREATE TABLE `tb_ot` (
  `ot_id` int(11) NOT NULL,
  `ot_date` date NOT NULL,
  `ot_pay` int(11) NOT NULL,
  `staff_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `tb_schedule`
--

CREATE TABLE `tb_schedule` (
  `id` int(11) NOT NULL,
  `title` text NOT NULL,
  `detail` text NOT NULL,
  `start_date` text NOT NULL,
  `end_date` text NOT NULL,
  `refer` text NOT NULL,
  `status` enum('0','1') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tb_schedule`
--

INSERT INTO `tb_schedule` (`id`, `title`, `detail`, `start_date`, `end_date`, `refer`, `status`) VALUES
(68, 'จัดเลี้ยง', '', '2018-10-01T09:30', '', '2', '0'),
(69, 'จัดเลี้ยง ห้อง 2', '', '2018-11-01T15:00', '', '1', '0'),
(70, 'ทำความสะอาดหลัง ครัว', '', '2018-11-02', '', '3', '0'),
(71, 'ปิดร้าน', '', '2018-11-05', '2018-11-06', '', '1'),
(73, 'ทำความสะอาดห้องครัว', 'ให้ช่วยกันทำความสะอาดห้องครัวให้เสร็จก่อนเที่ยง', '2018-11-08T10:30', '', '1,3', '0');

-- --------------------------------------------------------

--
-- Table structure for table `tb_setting`
--

CREATE TABLE `tb_setting` (
  `set_id` int(11) NOT NULL,
  `set_wage` int(11) NOT NULL,
  `set_start_time` text NOT NULL,
  `set_late_time` text NOT NULL,
  `set_end_time` text NOT NULL,
  `set_deduct` int(11) NOT NULL,
  `set_holiday` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tb_setting`
--

INSERT INTO `tb_setting` (`set_id`, `set_wage`, `set_start_time`, `set_late_time`, `set_end_time`, `set_deduct`, `set_holiday`) VALUES
(2, 200, '08:30', '06:00', '16:30', 1, 'อาทิตย์');

-- --------------------------------------------------------

--
-- Table structure for table `tb_staff`
--

CREATE TABLE `tb_staff` (
  `staff_id` int(11) NOT NULL,
  `staff_user` varchar(100) NOT NULL,
  `staff_pass` varchar(100) NOT NULL,
  `staff_name` text NOT NULL,
  `staff_address` text NOT NULL,
  `staff_department` varchar(2) NOT NULL,
  `staff_check` varchar(100) NOT NULL COMMENT 'เช็คเข้างาน',
  `staff_status` enum('ทำงานอยู่','ลาออก') NOT NULL COMMENT 'สถานะพนักงาน'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tb_staff`
--

INSERT INTO `tb_staff` (`staff_id`, `staff_user`, `staff_pass`, `staff_name`, `staff_address`, `staff_department`, `staff_check`, `staff_status`) VALUES
(1, '01011018', '19960208', 'สมรภูมิ คุมโซน', '950 ม.4 ต.ในเมือง อ.เมือง จ.พิษณุโลก 65000', '01', 'checked,2018-10-31', 'ทำงานอยู่'),
(2, '02021018', '19920208', 'สมคิด อันติ', '77/7 ม.7 ต.ในเมือง อ.เมือง จ.พิษณุโลก 65000', '02', 'checked,2018-10-31', 'ทำงานอยู่'),
(3, '03031018', '19900405', 'สุทิน คมกริบ', '701 ม.4 ต.แก่งโสภา อ.วังทอง จ.พิษณุโลก 65220', '03', '0', 'ทำงานอยู่'),
(4, '04041018', '19811011', 'ปรีชา มาก่อน', '88/8 ม.8 ต.ในเมือง อ.เมือง จ.พิษณุโลก', '04', '0', 'ทำงานอยู่'),
(5, '01051018', '19850607', 'วิโรจน์ โคตรมั่ว', '202 ม.4 ต.ในเมือง อ.เมือง จ.พิษณุโลก 65000', '01', '0', 'ทำงานอยู่'),
(6, '01061018', '19930403', 'สุชาดา มาดี', '223 ม.6 ต.แก่งโสภา อ.วังทอง จ.พิษณุโลก 65220', '01', '0', 'ทำงานอยู่'),
(7, '02071018', '19990809', 'มานพ สอนสั่ง', '118 ม.9 ต.ในเมือง อ.เมือง จ.พิษณุโลก 65000', '02', '0', 'ลาออก'),
(8, '04081018', '19990909', 'สมจัย สีสุจ', '129 ม.4 ต.แก่งสาโภ อ.วองทัง จ.พิษณุโลก 65220', '04', '0', 'ทำงานอยู่');

-- --------------------------------------------------------

--
-- Table structure for table `tb_working`
--

CREATE TABLE `tb_working` (
  `work_id` int(11) NOT NULL,
  `work_date` datetime NOT NULL,
  `work_wage` int(11) NOT NULL,
  `work_late` text NOT NULL,
  `work_ot` text NOT NULL,
  `work_status` enum('ทำงาน','ขาดงาน','ลางาน','ยกเลิก') NOT NULL,
  `staff_user` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tb_working`
--

INSERT INTO `tb_working` (`work_id`, `work_date`, `work_wage`, `work_late`, `work_ot`, `work_status`, `staff_user`) VALUES
(7, '2018-10-31 00:09:19', 0, '', '5000/6000', 'ยกเลิก', '04041018'),
(8, '2018-10-31 03:08:16', 200, '', '', 'ยกเลิก', '01061018'),
(9, '2018-10-29 03:08:19', 200, '', '', 'ขาดงาน', '01011018'),
(10, '2018-10-31 04:59:45', 200, '', '', 'ยกเลิก', '01011018'),
(11, '2018-10-30 06:10:38', 200, '200/เมื่อ 10 นาที ', '800/200', 'ทำงาน', '01011018'),
(12, '2018-10-31 06:11:16', 200, '11/เมื่อ 11 นาที ', '600/100', 'ทำงาน', '02021018'),
(13, '2018-10-31 06:27:34', 200, '27/เมื่อ 27 นาที ', '500/200', 'ทำงาน', '01011018');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_admin`
--
ALTER TABLE `tb_admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_department`
--
ALTER TABLE `tb_department`
  ADD PRIMARY KEY (`dep_id`);

--
-- Indexes for table `tb_ot`
--
ALTER TABLE `tb_ot`
  ADD PRIMARY KEY (`ot_id`);

--
-- Indexes for table `tb_schedule`
--
ALTER TABLE `tb_schedule`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_setting`
--
ALTER TABLE `tb_setting`
  ADD PRIMARY KEY (`set_id`);

--
-- Indexes for table `tb_staff`
--
ALTER TABLE `tb_staff`
  ADD PRIMARY KEY (`staff_id`);

--
-- Indexes for table `tb_working`
--
ALTER TABLE `tb_working`
  ADD PRIMARY KEY (`work_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_admin`
--
ALTER TABLE `tb_admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tb_department`
--
ALTER TABLE `tb_department`
  MODIFY `dep_id` int(2) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tb_ot`
--
ALTER TABLE `tb_ot`
  MODIFY `ot_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tb_schedule`
--
ALTER TABLE `tb_schedule`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=74;

--
-- AUTO_INCREMENT for table `tb_setting`
--
ALTER TABLE `tb_setting`
  MODIFY `set_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tb_staff`
--
ALTER TABLE `tb_staff`
  MODIFY `staff_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tb_working`
--
ALTER TABLE `tb_working`
  MODIFY `work_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
