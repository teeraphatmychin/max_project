-- phpMyAdmin SQL Dump
-- version 4.8.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 18, 2018 at 11:35 PM
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
-- Database: `db_hr_management`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_chat`
--

CREATE TABLE `tb_chat` (
  `id` int(11) NOT NULL,
  `schedule_id` varchar(100) NOT NULL,
  `content` text NOT NULL,
  `owner` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `tb_department`
--

CREATE TABLE `tb_department` (
  `id` varchar(10) NOT NULL,
  `dpm_full_name` text NOT NULL,
  `dpm_initials_name` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tb_department`
--

INSERT INTO `tb_department` (`id`, `dpm_full_name`, `dpm_initials_name`) VALUES
('01', 'Public Relations', 'PR'),
('02', 'Accountting Financial', 'AC');

-- --------------------------------------------------------

--
-- Table structure for table `tb_employee`
--

CREATE TABLE `tb_employee` (
  `emp_id` varchar(100) NOT NULL,
  `emp_user` varchar(100) NOT NULL,
  `emp_pass` varchar(100) NOT NULL,
  `emp_name` text NOT NULL,
  `emp_img` text NOT NULL,
  `emp_department` text NOT NULL,
  `emp_status` enum('enable','disable') NOT NULL COMMENT 'show,hide'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tb_employee`
--

INSERT INTO `tb_employee` (`emp_id`, `emp_user`, `emp_pass`, `emp_name`, `emp_img`, `emp_department`, `emp_status`) VALUES
('01', 'PR011018', '123456', 'Dakota Rice', '', '01', 'enable'),
('02', 'AC021018', '123456', 'Minerva Hooper', '', '02', 'disable'),
('03', 'AC031018', '123456', 'Sage Rodriguez', '', '02', 'enable'),
('04', 'PR041118', '123456', 'techinee srisupan', 'http://copingmax.com/hr_management/public/file/images/employee/1542554381.jpg', '01', 'enable');

-- --------------------------------------------------------

--
-- Table structure for table `tb_file`
--

CREATE TABLE `tb_file` (
  `id` int(11) NOT NULL,
  `path` text NOT NULL,
  `owner` varchar(10) NOT NULL,
  `schedule_id` varchar(10) NOT NULL,
  `time` text NOT NULL,
  `type` text NOT NULL,
  `date` datetime NOT NULL,
  `edit_date` text NOT NULL,
  `status` int(11) NOT NULL COMMENT 'show,hide'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tb_file`
--

INSERT INTO `tb_file` (`id`, `path`, `owner`, `schedule_id`, `time`, `type`, `date`, `edit_date`, `status`) VALUES
(12, '<p style=\"text-align: center; \"><img style=\"width: 100%;\" src=\"http://copingmax.com/hr_management/public/file/images/schedule/1542514111.png\"></p><p style=\"text-align: center; \">eiei</p>', '04', '37', 'On time', 'file', '2018-11-18 11:02:40', '', 1),
(13, '<p style=\"text-align: center; \"><img style=\"width: 25%;\" src=\"http://copingmax.com/hr_management/public/file/images/schedule/1542514111.png\"></p><p style=\"text-align: center; \">eiei</p>', '04', '37', 'On time', 'summernote', '2018-11-18 11:08:46', '2018-11-18 19:37:37', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tb_log`
--

CREATE TABLE `tb_log` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `date_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `status` text NOT NULL COMMENT 'employee or manager or hr'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tb_log`
--

INSERT INTO `tb_log` (`id`, `user_id`, `date_time`, `status`) VALUES
(1, 4, '2018-11-18 21:42:38', 'employee'),
(2, 4, '2018-11-18 22:19:53', 'employee'),
(3, 4, '2018-11-17 22:26:17', 'employee'),
(4, 4, '2018-11-17 22:27:10', 'employee'),
(5, 4, '2018-11-17 22:48:56', 'employee'),
(6, 4, '2018-11-17 22:49:50', 'employee'),
(7, 4, '2018-11-17 22:50:55', 'employee'),
(8, 4, '2018-11-17 23:01:25', 'employee'),
(9, 4, '2018-11-17 23:02:31', 'employee'),
(10, 4, '2018-11-17 23:03:12', 'employee'),
(11, 3, '2018-11-18 00:03:57', 'employee'),
(12, 1, '2018-11-18 00:08:18', 'employee'),
(13, 3, '2018-11-18 03:53:21', 'employee'),
(14, 0, '2018-11-18 05:41:12', ''),
(15, 0, '2018-11-18 05:41:16', ''),
(16, 0, '2018-11-18 05:41:16', ''),
(17, 0, '2018-11-18 05:41:16', ''),
(18, 0, '2018-11-18 05:41:16', ''),
(19, 0, '2018-11-18 05:41:16', ''),
(20, 0, '2018-11-18 05:41:16', ''),
(21, 0, '2018-11-18 05:41:16', ''),
(22, 0, '2018-11-18 05:41:17', ''),
(23, 0, '2018-11-18 05:41:17', ''),
(24, 0, '2018-11-18 05:41:23', ''),
(25, 0, '2018-11-18 05:41:23', ''),
(26, 0, '2018-11-18 05:41:23', ''),
(27, 0, '2018-11-18 05:41:24', ''),
(28, 0, '2018-11-18 05:41:24', ''),
(29, 0, '2018-11-18 05:41:24', ''),
(30, 4, '2018-11-18 05:42:00', 'employee'),
(31, 0, '2018-11-18 05:42:08', ''),
(32, 0, '2018-11-18 05:42:34', ''),
(33, 2, '2018-11-18 05:45:12', 'HR'),
(34, 1, '2018-11-18 05:46:43', 'manager'),
(35, 2, '2018-11-18 05:47:45', 'HR'),
(36, 4, '2018-11-18 05:50:43', 'employee'),
(37, 1, '2018-11-18 07:46:06', 'manager'),
(38, 2, '2018-11-18 07:50:32', 'HR'),
(39, 4, '2018-11-18 07:54:18', 'employee'),
(40, 4, '2018-11-18 08:11:12', 'employee'),
(41, 2, '2018-11-18 08:13:07', 'HR'),
(42, 1, '2018-11-18 08:13:19', 'manager'),
(43, 2, '2018-11-18 08:14:43', 'HR'),
(44, 4, '2018-11-18 08:14:50', 'employee'),
(45, 2, '2018-11-18 08:18:14', 'HR'),
(46, 2, '2018-11-18 08:18:43', 'HR'),
(47, 4, '2018-11-18 08:20:46', 'employee'),
(48, 2, '2018-11-18 11:21:45', 'HR'),
(49, 2, '2018-11-18 11:22:49', 'HR');

-- --------------------------------------------------------

--
-- Table structure for table `tb_manager`
--

CREATE TABLE `tb_manager` (
  `id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `name` text NOT NULL,
  `status` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tb_manager`
--

INSERT INTO `tb_manager` (`id`, `username`, `password`, `name`, `status`) VALUES
(1, 'manager', '123456', 'manager', 'manager'),
(2, 'hr', '123456', 'HR', 'HR');

-- --------------------------------------------------------

--
-- Table structure for table `tb_schedule`
--

CREATE TABLE `tb_schedule` (
  `id` int(11) NOT NULL,
  `title` text NOT NULL,
  `description` text NOT NULL,
  `start_date` text NOT NULL,
  `end_date` text NOT NULL,
  `refer` text NOT NULL,
  `seen` text NOT NULL,
  `owner` varchar(10) NOT NULL,
  `posted` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tb_schedule`
--

INSERT INTO `tb_schedule` (`id`, `title`, `description`, `start_date`, `end_date`, `refer`, `seen`, `owner`, `posted`) VALUES
(31, 'Case Study VI: Europe - It\'s all about perspectives', '<p style=\"outline: 0px; margin-right: 0px; margin-bottom: 1em; margin-left: 0px; padding: 0px; overflow-wrap: normal; font-size: 12px; line-height: 1.4; word-break: normal; color: rgb(51, 51, 51); font-family: &quot;Sgy Open Sans&quot;, &quot;Lucida Grande&quot;, Tahoma, Verdana, Arial, sans-serif;\">Aldo Pireli had been born into an Italian family that had emigrated to France during the 1930s to escape the prevailing political climate. He\'d been educated in France and had a master\'s degree in business and management. During his studies, he\'s spent a year in Britain to perfect his English.</p><p style=\"outline: 0px; margin: 1em 0px; padding: 0px; overflow-wrap: normal; font-size: 12px; line-height: 1.4; word-break: normal; color: rgb(51, 51, 51); font-family: &quot;Sgy Open Sans&quot;, &quot;Lucida Grande&quot;, Tahoma, Verdana, Arial, sans-serif;\">He was now working for Pentathlon, the multinational sports retailer. He had started working in procurement and had climbed quickly into the number-2 position at the huge shop. He was an outdoor sports enthusiast, and when he had heard that a new, specialized outdoor shop was to be opened just outside Courmayeur, Italy, the world-famous resort, he immediately applied for the director\'s job, and got it. He could at last practice his Italian!</p><p style=\"outline: 0px; margin: 1em 0px; padding: 0px; overflow-wrap: normal; font-size: 12px; line-height: 1.4; word-break: normal; color: rgb(51, 51, 51); font-family: &quot;Sgy Open Sans&quot;, &quot;Lucida Grande&quot;, Tahoma, Verdana, Arial, sans-serif;\">He had been doing well there for several years, increasing sales regularly by focusing on customers\' needs for high-quality and environmentally friendly products. During that time, he\'d seen several management positions filled and emptied quickly -turnover was high! why was that? As far as he concerned, he had noticed that the HR people in Paris hadn\'t vetted the incumbents very well. One employee from Germany attived and described the way the Italian worked as \"chaotic.\" The Italians complained he was \"over-organized\" and obseessed with deadlines and timelines. An employee from sweden arrived and failed to adapt to what she called \"undemmocratic\" work processes, accusing Aldo of being authoritarian. There was also an IT specialist from Ireland whose Italian was so poor that she couldn\'t communicate with others; she left. And there were others. There was no doubt in Also\'s mind that managers needed specific training and incentive packages, which, up until now, Pentathlon had not spent enough time designing.</p><p style=\"outline: 0px; margin: 1em 0px; padding: 0px; overflow-wrap: normal; font-size: 12px; line-height: 1.4; word-break: normal; color: rgb(51, 51, 51); font-family: &quot;Sgy Open Sans&quot;, &quot;Lucida Grande&quot;, Tahoma, Verdana, Arial, sans-serif;\">Today, he\'d been called to Paris, to the headquarters in the ultra modern \"defense\" business area, to give a presentation to his boss on the quarterly result and on the level of turnover.</p><p style=\"outline: 0px; margin: 1em 0px; padding: 0px; overflow-wrap: normal; font-size: 12px; line-height: 1.4; word-break: normal; color: rgb(51, 51, 51); font-family: &quot;Sgy Open Sans&quot;, &quot;Lucida Grande&quot;, Tahoma, Verdana, Arial, sans-serif;\">Some of the issues that Aldo was pondering were:</p><p style=\"outline: 0px; margin: 1em 0px; padding: 0px; overflow-wrap: normal; font-size: 12px; line-height: 1.4; word-break: normal; color: rgb(51, 51, 51); font-family: &quot;Sgy Open Sans&quot;, &quot;Lucida Grande&quot;, Tahoma, Verdana, Arial, sans-serif;\">- A weak corporate culture</p><p style=\"outline: 0px; margin: 1em 0px; padding: 0px; overflow-wrap: normal; font-size: 12px; line-height: 1.4; word-break: normal; color: rgb(51, 51, 51); font-family: &quot;Sgy Open Sans&quot;, &quot;Lucida Grande&quot;, Tahoma, Verdana, Arial, sans-serif;\">-Selection: He wasn\'t convinced that selecting third country nationals was a good idea. He knew, however, that it was cheaper than using expatriates.</p><p style=\"outline: 0px; margin: 1em 0px; padding: 0px; overflow-wrap: normal; font-size: 12px; line-height: 1.4; word-break: normal; color: rgb(51, 51, 51); font-family: &quot;Sgy Open Sans&quot;, &quot;Lucida Grande&quot;, Tahoma, Verdana, Arial, sans-serif;\">-Even if the language used between subsidiaries was English, the local emplyees all spoke Italian among themselves, anyway; furthermore, the union reps were Italian and naturally well-versed in Italian labor law and practices. Did the people at headquarter understand the unique nature of the European shops?</p><p style=\"outline: 0px; margin: 1em 0px; padding: 0px; overflow-wrap: normal; font-size: 12px; line-height: 1.4; word-break: normal; color: rgb(51, 51, 51); font-family: &quot;Sgy Open Sans&quot;, &quot;Lucida Grande&quot;, Tahoma, Verdana, Arial, sans-serif;\">-The need for cross-cultural training.</p><p style=\"outline: 0px; margin: 1em 0px; padding: 0px; overflow-wrap: normal; font-size: 12px; line-height: 1.4; word-break: normal; color: rgb(51, 51, 51); font-family: &quot;Sgy Open Sans&quot;, &quot;Lucida Grande&quot;, Tahoma, Verdana, Arial, sans-serif;\">-The need for a true internal labor market to better deploy competent indiciduals in the future.</p><p style=\"outline: 0px; margin: 1em 0px; padding: 0px; overflow-wrap: normal; font-size: 12px; line-height: 1.4; word-break: normal; color: rgb(51, 51, 51); font-family: &quot;Sgy Open Sans&quot;, &quot;Lucida Grande&quot;, Tahoma, Verdana, Arial, sans-serif;\">Questions</p><p style=\"outline: 0px; margin: 1em 0px; padding: 0px; overflow-wrap: normal; font-size: 12px; line-height: 1.4; word-break: normal; color: rgb(51, 51, 51); font-family: &quot;Sgy Open Sans&quot;, &quot;Lucida Grande&quot;, Tahoma, Verdana, Arial, sans-serif;\">1. what do you think Aldo should do to increase retention in the Italian shop?</p><p style=\"text-align: center; outline: 0px; margin: 1em 0px; padding: 0px; overflow-wrap: normal; font-size: 12px; line-height: 1.4; word-break: normal; color: rgb(51, 51, 51); font-family: &quot;Sgy Open Sans&quot;, &quot;Lucida Grande&quot;, Tahoma, Verdana, Arial, sans-serif;\"><img src=\"http://copingmax.com/hr_management/public/file/images/schedule/1542375784.jpg\" style=\"width: 50%;\"></p><p style=\"outline: 0px; margin: 1em 0px; padding: 0px; overflow-wrap: normal; font-size: 12px; line-height: 1.4; word-break: normal; color: rgb(51, 51, 51); font-family: &quot;Sgy Open Sans&quot;, &quot;Lucida Grande&quot;, Tahoma, Verdana, Arial, sans-serif;\">&nbsp;</p><p style=\"outline: 0px; margin: 1em 0px; padding: 0px; overflow-wrap: normal; font-size: 12px; line-height: 1.4; word-break: normal; color: rgb(51, 51, 51); font-family: &quot;Sgy Open Sans&quot;, &quot;Lucida Grande&quot;, Tahoma, Verdana, Arial, sans-serif;\">Group Work :4-6 people</p><p style=\"outline: 0px; margin: 1em 0px; padding: 0px; overflow-wrap: normal; font-size: 12px; line-height: 1.4; word-break: normal; color: rgb(51, 51, 51); font-family: &quot;Sgy Open Sans&quot;, &quot;Lucida Grande&quot;, Tahoma, Verdana, Arial, sans-serif;\">A4 length, Calibri light, size 14</p><p style=\"outline: 0px; margin: 1em 0px; padding: 0px; overflow-wrap: normal; font-size: 12px; line-height: 1.4; word-break: normal; color: rgb(51, 51, 51); font-family: &quot;Sgy Open Sans&quot;, &quot;Lucida Grande&quot;, Tahoma, Verdana, Arial, sans-serif;\">Score: 10 Score&nbsp;</p><p style=\"outline: 0px; margin: 1em 0px 0px; padding: 0px; overflow-wrap: normal; font-size: 12px; line-height: 1.4; word-break: normal; color: rgb(51, 51, 51); font-family: &quot;Sgy Open Sans&quot;, &quot;Lucida Grande&quot;, Tahoma, Verdana, Arial, sans-serif;\">Deadline submit:&nbsp;Friday 2 th November 2018</p>', '2018-11-01 00:01', '2018-11-02T11:59', '01,02,03', '04', 'manager', '2018-11-16 20:44:25'),
(37, 'Role Play: Bullying - Speaking up for Yourself !', '<p><img src=\"https://app.schoology.com/system/files/attachments/page_embeds/m/2018-08/officebully1_zps2s65f72n_5b686cf11e489.jpg\" style=\"width: 616.328px;\"></p><p style=\"margin: 1em 0px; outline: 0px; padding: 0px; overflow-wrap: normal; font-size: 12px; line-height: 1.4; word-break: normal; color: rgb(51, 51, 51); font-family: &quot;Sgy Open Sans&quot;, &quot;Lucida Grande&quot;, Tahoma, Verdana, Arial, sans-serif;\"><span style=\"outline: 0px; margin: 0px; padding: 0px; overflow-wrap: normal; word-break: normal; font-family: Helvetica; color: rgb(38, 38, 38); font-size: 14px;\">Instructions:</span></p><p style=\"margin: 1em 0px; outline: 0px; padding: 0px; overflow-wrap: normal; font-size: 12px; line-height: 1.4; word-break: normal; color: rgb(51, 51, 51); font-family: &quot;Sgy Open Sans&quot;, &quot;Lucida Grande&quot;, Tahoma, Verdana, Arial, sans-serif;\"><span style=\"outline: 0px; margin: 0px; padding: 0px; overflow-wrap: normal; word-break: normal; font-family: Helvetica; color: rgb(38, 38, 38); font-size: 14px;\">• Team into small groups of 4 – 6 people</span></p><p style=\"margin: 1em 0px; outline: 0px; padding: 0px; overflow-wrap: normal; font-size: 12px; line-height: 1.4; word-break: normal; color: rgb(51, 51, 51); font-family: &quot;Sgy Open Sans&quot;, &quot;Lucida Grande&quot;, Tahoma, Verdana, Arial, sans-serif;\"><span style=\"outline: 0px; margin: 0px; padding: 0px; overflow-wrap: normal; word-break: normal; font-family: Helvetica; color: rgb(38, 38, 38); font-size: 14px;\">• Determine who will be Mary (bully) and who will be the victim</span></p><p style=\"margin: 1em 0px; outline: 0px; padding: 0px; overflow-wrap: normal; font-size: 12px; line-height: 1.4; word-break: normal; color: rgb(51, 51, 51); font-family: &quot;Sgy Open Sans&quot;, &quot;Lucida Grande&quot;, Tahoma, Verdana, Arial, sans-serif;\"><span style=\"outline: 0px; margin: 0px; padding: 0px; overflow-wrap: normal; word-break: normal; font-family: Helvetica; color: rgb(38, 38, 38); font-size: 14px;\">• Review and prep: 7 minutes (Discussion with team what to talk in the situation)</span></p><p style=\"margin: 1em 0px; outline: 0px; padding: 0px; overflow-wrap: normal; font-size: 12px; line-height: 1.4; word-break: normal; color: rgb(51, 51, 51); font-family: &quot;Sgy Open Sans&quot;, &quot;Lucida Grande&quot;, Tahoma, Verdana, Arial, sans-serif;\"><span style=\"outline: 0px; margin: 0px; padding: 0px; overflow-wrap: normal; word-break: normal; font-family: Helvetica; color: rgb(38, 38, 38); font-size: 14px;\">• Practice speaking up: 5 minutes</span></p><p style=\"margin: 1em 0px; outline: 0px; padding: 0px; overflow-wrap: normal; font-size: 12px; line-height: 1.4; word-break: normal; color: rgb(51, 51, 51); font-family: &quot;Sgy Open Sans&quot;, &quot;Lucida Grande&quot;, Tahoma, Verdana, Arial, sans-serif;\"><span style=\"outline: 0px; margin: 0px; padding: 0px; overflow-wrap: normal; word-break: normal; font-family: Helvetica; color: rgb(38, 38, 38); font-size: 14px;\">• Switch and review roles: 3 minutes</span></p><p style=\"margin: 1em 0px; outline: 0px; padding: 0px; overflow-wrap: normal; font-size: 12px; line-height: 1.4; word-break: normal; color: rgb(51, 51, 51); font-family: &quot;Sgy Open Sans&quot;, &quot;Lucida Grande&quot;, Tahoma, Verdana, Arial, sans-serif;\"><span style=\"outline: 0px; margin: 0px; padding: 0px; overflow-wrap: normal; word-break: normal; font-family: Helvetica; color: rgb(38, 38, 38); font-size: 14px;\">• Practice speaking up: 5 minutes</span></p><p style=\"margin: 1em 0px; outline: 0px; padding: 0px; overflow-wrap: normal; font-size: 12px; line-height: 1.4; word-break: normal; color: rgb(51, 51, 51); font-family: &quot;Sgy Open Sans&quot;, &quot;Lucida Grande&quot;, Tahoma, Verdana, Arial, sans-serif;\"><span style=\"outline: 0px; margin: 0px; padding: 0px; overflow-wrap: normal; word-break: normal; font-family: Helvetica; color: rgb(38, 38, 38); font-size: 14px;\"><span style=\"outline: 0px; margin: 0px; padding: 0px; overflow-wrap: normal; word-break: normal;\">• Film 1 practice speaking : 5 - 7 minutes</span></span></p><p style=\"margin: 1em 0px; outline: 0px; padding: 0px; overflow-wrap: normal; font-size: 12px; line-height: 1.4; word-break: normal; color: rgb(51, 51, 51); font-family: &quot;Sgy Open Sans&quot;, &quot;Lucida Grande&quot;, Tahoma, Verdana, Arial, sans-serif;\"><span style=\"outline: 0px; margin: 0px; padding: 0px; overflow-wrap: normal; word-break: normal; font-size: 14px;\">&nbsp;</span></p><p style=\"margin: 1em 0px; outline: 0px; padding: 0px; overflow-wrap: normal; font-size: 12px; line-height: 1.4; word-break: normal; color: rgb(51, 51, 51); font-family: &quot;Sgy Open Sans&quot;, &quot;Lucida Grande&quot;, Tahoma, Verdana, Arial, sans-serif;\"><span style=\"outline: 0px; margin: 0px; padding: 0px; overflow-wrap: normal; word-break: normal; font-family: Helvetica; color: rgb(38, 38, 38); font-size: 14px;\">Facts (Situation):&nbsp;</span></p><p style=\"margin: 1em 0px; outline: 0px; padding: 0px; overflow-wrap: normal; font-size: 12px; line-height: 1.4; word-break: normal; color: rgb(51, 51, 51); font-family: &quot;Sgy Open Sans&quot;, &quot;Lucida Grande&quot;, Tahoma, Verdana, Arial, sans-serif;\"><span style=\"outline: 0px; margin: 0px; padding: 0px; overflow-wrap: normal; word-break: normal; font-family: Helvetica; color: rgb(38, 38, 38); font-size: 14px;\">You are a senior-level employee, and you have been employed at your organization for&nbsp;over two years. As a result of a merger, a new Executive Director (Mary) has been&nbsp;named. On her first day, Mary sent out a memo highlighting her background and&nbsp;educational experience. Many of you noticed that although she had over 15 years of&nbsp;experience in management, she did not hold an advanced degree.</span></p><p style=\"margin: 1em 0px; outline: 0px; padding: 0px; overflow-wrap: normal; font-size: 12px; line-height: 1.4; word-break: normal; color: rgb(51, 51, 51); font-family: &quot;Sgy Open Sans&quot;, &quot;Lucida Grande&quot;, Tahoma, Verdana, Arial, sans-serif;\"><span style=\"outline: 0px; margin: 0px; padding: 0px; overflow-wrap: normal; word-break: normal; font-family: Helvetica; color: rgb(38, 38, 38); font-size: 14px;\">Ever since Mary has been assigned to oversee your department, she has consistently&nbsp;bullied most of the senior-level employees. In the beginning, many of you thought it was&nbsp;her “trying to exert her leadership” to a new group. However, in the past three months,&nbsp;your team has shared stories about her behavior that now, looking back, you realize has&nbsp;been bullying. You began writing down what she has done to you, and as you turn your&nbsp;computer on to update your résumé, you review the list for inspiration:</span></p><p style=\"margin: 1em 0px; outline: 0px; padding: 0px; overflow-wrap: normal; font-size: 12px; line-height: 1.4; word-break: normal; color: rgb(51, 51, 51); font-family: &quot;Sgy Open Sans&quot;, &quot;Lucida Grande&quot;, Tahoma, Verdana, Arial, sans-serif;\"><span style=\"outline: 0px; margin: 0px; padding: 0px; overflow-wrap: normal; word-break: normal; font-size: 14px;\"><span style=\"outline: 0px; margin: 0px; padding: 0px; overflow-wrap: normal; word-break: normal; font-family: Helvetica; color: rgb(38, 38, 38);\">•<span style=\"outline: 0px; margin: 0px; padding: 0px; overflow-wrap: normal; word-break: normal; line-height: normal; font-family: &quot;Times New Roman&quot;;\">&nbsp;&nbsp;&nbsp;&nbsp;</span></span><span style=\"outline: 0px; margin: 0px; padding: 0px; overflow-wrap: normal; word-break: normal; font-family: Helvetica; color: rgb(38, 38, 38);\">Department meeting:</span></span></p><p style=\"margin: 1em 0px; outline: 0px; padding: 0px; overflow-wrap: normal; font-size: 12px; line-height: 1.4; word-break: normal; color: rgb(51, 51, 51); font-family: &quot;Sgy Open Sans&quot;, &quot;Lucida Grande&quot;, Tahoma, Verdana, Arial, sans-serif;\"><span style=\"outline: 0px; margin: 0px; padding: 0px; overflow-wrap: normal; word-break: normal; font-family: Helvetica; color: rgb(38, 38, 38); font-size: 14px;\">Mary said to everyone “this is the best that Anna could do, because she didn’t put enough time into the project.”</span></p><p style=\"margin: 1em 0px; outline: 0px; padding: 0px; overflow-wrap: normal; font-size: 12px; line-height: 1.4; word-break: normal; color: rgb(51, 51, 51); font-family: &quot;Sgy Open Sans&quot;, &quot;Lucida Grande&quot;, Tahoma, Verdana, Arial, sans-serif;\"><span style=\"outline: 0px; margin: 0px; padding: 0px; overflow-wrap: normal; word-break: normal; font-size: 14px;\"><span style=\"outline: 0px; margin: 0px; padding: 0px; overflow-wrap: normal; word-break: normal; font-family: Helvetica; color: rgb(38, 38, 38);\">•<span style=\"outline: 0px; margin: 0px; padding: 0px; overflow-wrap: normal; word-break: normal; line-height: normal; font-family: &quot;Times New Roman&quot;;\">&nbsp;&nbsp;&nbsp;&nbsp;</span></span><span style=\"outline: 0px; margin: 0px; padding: 0px; overflow-wrap: normal; word-break: normal; font-family: Helvetica; color: rgb(38, 38, 38);\">Friday meetings:</span></span></p><p style=\"margin: 1em 0px; outline: 0px; padding: 0px; overflow-wrap: normal; font-size: 12px; line-height: 1.4; word-break: normal; color: rgb(51, 51, 51); font-family: &quot;Sgy Open Sans&quot;, &quot;Lucida Grande&quot;, Tahoma, Verdana, Arial, sans-serif;\"><span style=\"outline: 0px; margin: 0px; padding: 0px; overflow-wrap: normal; word-break: normal; font-family: Helvetica; color: rgb(38, 38, 38); font-size: 14px;\">Mary has scheduled mandatory meetings on the Fridays that are my flex days. While she could hold the meetings on the 1st and 3rd Fridays when we are all at work, she always schedules them for the 2nd and 4th Friday, which are my flex days. Meetings are always scheduled in the middle of the day for 60 minutes, thus ruining my day off. Because I am salaried, there is no compensation for attending the meetings. Mary has threatened to write me up if I miss any.</span></p><p style=\"margin: 1em 0px; outline: 0px; padding: 0px; overflow-wrap: normal; font-size: 12px; line-height: 1.4; word-break: normal; color: rgb(51, 51, 51); font-family: &quot;Sgy Open Sans&quot;, &quot;Lucida Grande&quot;, Tahoma, Verdana, Arial, sans-serif;\"><span style=\"outline: 0px; margin: 0px; padding: 0px; overflow-wrap: normal; word-break: normal; font-size: 14px;\"><span style=\"outline: 0px; margin: 0px; padding: 0px; overflow-wrap: normal; word-break: normal; font-family: Helvetica; color: rgb(38, 38, 38);\">•<span style=\"outline: 0px; margin: 0px; padding: 0px; overflow-wrap: normal; word-break: normal; line-height: normal; font-family: &quot;Times New Roman&quot;;\">&nbsp;&nbsp;&nbsp;&nbsp;</span></span><span style=\"outline: 0px; margin: 0px; padding: 0px; overflow-wrap: normal; word-break: normal; font-family: Helvetica; color: rgb(38, 38, 38);\">Meeting assignments:</span></span></p><p style=\"margin: 1em 0px; outline: 0px; padding: 0px; overflow-wrap: normal; font-size: 12px; line-height: 1.4; word-break: normal; color: rgb(51, 51, 51); font-family: &quot;Sgy Open Sans&quot;, &quot;Lucida Grande&quot;, Tahoma, Verdana, Arial, sans-serif;\"><span style=\"outline: 0px; margin: 0px; padding: 0px; overflow-wrap: normal; word-break: normal; font-family: Helvetica; color: rgb(38, 38, 38); font-size: 14px;\">creating PowerPoints for Mary’s presentations is assigned to me because she has not learned PowerPoint. She only provides me with the information 30 minutes prior to the start of the meeting and openly complains that the slides weren’t completed in time.</span></p><p style=\"margin: 1em 0px; outline: 0px; padding: 0px; overflow-wrap: normal; font-size: 12px; line-height: 1.4; word-break: normal; color: rgb(51, 51, 51); font-family: &quot;Sgy Open Sans&quot;, &quot;Lucida Grande&quot;, Tahoma, Verdana, Arial, sans-serif;\"><span style=\"outline: 0px; margin: 0px; padding: 0px; overflow-wrap: normal; word-break: normal; font-size: 14px;\"><span style=\"outline: 0px; margin: 0px; padding: 0px; overflow-wrap: normal; word-break: normal; font-family: Helvetica; color: rgb(38, 38, 38);\">•<span style=\"outline: 0px; margin: 0px; padding: 0px; overflow-wrap: normal; word-break: normal; line-height: normal; font-family: &quot;Times New Roman&quot;;\">&nbsp;&nbsp;&nbsp;&nbsp;</span></span><span style=\"outline: 0px; margin: 0px; padding: 0px; overflow-wrap: normal; word-break: normal; font-family: Helvetica; color: rgb(38, 38, 38);\">Rumors:</span></span></p><p style=\"margin: 1em 0px; outline: 0px; padding: 0px; overflow-wrap: normal; font-size: 12px; line-height: 1.4; word-break: normal; color: rgb(51, 51, 51); font-family: &quot;Sgy Open Sans&quot;, &quot;Lucida Grande&quot;, Tahoma, Verdana, Arial, sans-serif;\"><span style=\"outline: 0px; margin: 0px; padding: 0px; overflow-wrap: normal; word-break: normal; font-family: Helvetica; color: rgb(38, 38, 38); font-size: 14px;\">Mary has openly spread rumors that I am using company time to work on my master’s degree. This is false. I do all of my work from my home computer.</span></p><p style=\"margin: 1em 0px; outline: 0px; padding: 0px; overflow-wrap: normal; font-size: 12px; line-height: 1.4; word-break: normal; color: rgb(51, 51, 51); font-family: &quot;Sgy Open Sans&quot;, &quot;Lucida Grande&quot;, Tahoma, Verdana, Arial, sans-serif;\"><span style=\"outline: 0px; margin: 0px; padding: 0px; overflow-wrap: normal; word-break: normal; font-size: 14px;\"><span style=\"outline: 0px; margin: 0px; padding: 0px; overflow-wrap: normal; word-break: normal; font-family: Helvetica; color: rgb(38, 38, 38);\">•<span style=\"outline: 0px; margin: 0px; padding: 0px; overflow-wrap: normal; word-break: normal; line-height: normal; font-family: &quot;Times New Roman&quot;;\">&nbsp;&nbsp;&nbsp;&nbsp;</span></span><span style=\"outline: 0px; margin: 0px; padding: 0px; overflow-wrap: normal; word-break: normal; font-family: Helvetica; color: rgb(38, 38, 38);\">Rumors:</span></span></p><p style=\"margin: 1em 0px; outline: 0px; padding: 0px; overflow-wrap: normal; font-size: 12px; line-height: 1.4; word-break: normal; color: rgb(51, 51, 51); font-family: &quot;Sgy Open Sans&quot;, &quot;Lucida Grande&quot;, Tahoma, Verdana, Arial, sans-serif;\"><span style=\"outline: 0px; margin: 0px; padding: 0px; overflow-wrap: normal; word-break: normal; font-family: Helvetica; color: rgb(38, 38, 38); font-size: 14px;\">Mary has also started telling others that she thinks I am looking for another job because I am getting my advanced degree.</span></p><p style=\"margin: 1em 0px; outline: 0px; padding: 0px; overflow-wrap: normal; font-size: 12px; line-height: 1.4; word-break: normal; color: rgb(51, 51, 51); font-family: &quot;Sgy Open Sans&quot;, &quot;Lucida Grande&quot;, Tahoma, Verdana, Arial, sans-serif;\"><span style=\"outline: 0px; margin: 0px; padding: 0px; overflow-wrap: normal; word-break: normal; font-size: 14px;\"><span style=\"outline: 0px; margin: 0px; padding: 0px; overflow-wrap: normal; word-break: normal; font-family: Helvetica; color: rgb(38, 38, 38);\">•<span style=\"outline: 0px; margin: 0px; padding: 0px; overflow-wrap: normal; word-break: normal; line-height: normal; font-family: &quot;Times New Roman&quot;;\">&nbsp;&nbsp;&nbsp;&nbsp;</span></span><span style=\"outline: 0px; margin: 0px; padding: 0px; overflow-wrap: normal; word-break: normal; font-family: Helvetica; color: rgb(38, 38, 38);\">After-hours events:</span></span></p><p style=\"margin: 1em 0px; outline: 0px; padding: 0px; overflow-wrap: normal; font-size: 12px; line-height: 1.4; word-break: normal; color: rgb(51, 51, 51); font-family: &quot;Sgy Open Sans&quot;, &quot;Lucida Grande&quot;, Tahoma, Verdana, Arial, sans-serif;\"><span style=\"outline: 0px; margin: 0px; padding: 0px; overflow-wrap: normal; word-break: normal; font-family: Helvetica; color: rgb(38, 38, 38); font-size: 14px;\">Mary demanded that I cancel an after-hours going away party for a peer because she wasn’t invited. Then Mary scheduled a going-away party on that very same day during work hours.</span></p><p style=\"margin: 1em 0px; outline: 0px; padding: 0px; overflow-wrap: normal; font-size: 12px; line-height: 1.4; word-break: normal; color: rgb(51, 51, 51); font-family: &quot;Sgy Open Sans&quot;, &quot;Lucida Grande&quot;, Tahoma, Verdana, Arial, sans-serif;\"><span style=\"outline: 0px; margin: 0px; padding: 0px; overflow-wrap: normal; word-break: normal; font-size: 14px;\"><span style=\"outline: 0px; margin: 0px; padding: 0px; overflow-wrap: normal; word-break: normal; font-family: Helvetica; color: rgb(38, 38, 38);\">•<span style=\"outline: 0px; margin: 0px; padding: 0px; overflow-wrap: normal; word-break: normal; line-height: normal; font-family: &quot;Times New Roman&quot;;\">&nbsp;&nbsp;&nbsp;&nbsp;</span></span><span style=\"outline: 0px; margin: 0px; padding: 0px; overflow-wrap: normal; word-break: normal; font-family: Helvetica; color: rgb(38, 38, 38);\">Lunch hour:</span></span></p><p style=\"margin: 1em 0px; outline: 0px; padding: 0px; overflow-wrap: normal; font-size: 12px; line-height: 1.4; word-break: normal; color: rgb(51, 51, 51); font-family: &quot;Sgy Open Sans&quot;, &quot;Lucida Grande&quot;, Tahoma, Verdana, Arial, sans-serif;\"><span style=\"outline: 0px; margin: 0px; padding: 0px; overflow-wrap: normal; word-break: normal; font-family: Helvetica; color: rgb(38, 38, 38); font-size: 14px;\">On my day off, I saw Mary at a spa. She was there over two hours. When she saw me, she scowled. The next day, she pulled me into her office and made a point of telling me she was on her lunch hour when she was at the spa and implied that I had better not tell anyone I saw her there.</span></p><p style=\"margin: 1em 0px; outline: 0px; padding: 0px; overflow-wrap: normal; font-size: 12px; line-height: 1.4; word-break: normal; color: rgb(51, 51, 51); font-family: &quot;Sgy Open Sans&quot;, &quot;Lucida Grande&quot;, Tahoma, Verdana, Arial, sans-serif;\"><span style=\"outline: 0px; margin: 0px; padding: 0px; overflow-wrap: normal; word-break: normal; font-size: 14px;\">&nbsp;</span></p><p style=\"margin: 1em 0px; outline: 0px; padding: 0px; overflow-wrap: normal; font-size: 12px; line-height: 1.4; word-break: normal; color: rgb(51, 51, 51); font-family: &quot;Sgy Open Sans&quot;, &quot;Lucida Grande&quot;, Tahoma, Verdana, Arial, sans-serif;\"><span style=\"outline: 0px; margin: 0px; padding: 0px; overflow-wrap: normal; word-break: normal; font-family: Helvetica; color: rgb(38, 38, 38); font-size: 14px;\">At this point, you are looking for a new job. You are tired of being bullied. The list is&nbsp;longer, but you didn’t have the energy to write it all down. Others that have left informed&nbsp;HR about Mary’s behavior; however, HR never did anything, so you don’t believe it will help. You think the&nbsp;best solution is to speak up for yourself. After all, you don’t have another job yet. You&nbsp;have requested an appointment with Mary for tomorrow, but first you want to prepare&nbsp;and practice what you will say to her.</span></p><p style=\"margin: 1em 0px; outline: 0px; padding: 0px; overflow-wrap: normal; font-size: 12px; line-height: 1.4; word-break: normal; color: rgb(51, 51, 51); font-family: &quot;Sgy Open Sans&quot;, &quot;Lucida Grande&quot;, Tahoma, Verdana, Arial, sans-serif;\"><span style=\"outline: 0px; margin: 0px; padding: 0px; overflow-wrap: normal; word-break: normal; font-family: Helvetica; color: rgb(38, 38, 38); font-size: 14px;\">&nbsp;</span></p><p style=\"margin: 1em 0px; outline: 0px; padding: 0px; overflow-wrap: normal; font-size: 12px; line-height: 1.4; word-break: normal; color: rgb(51, 51, 51); font-family: &quot;Sgy Open Sans&quot;, &quot;Lucida Grande&quot;, Tahoma, Verdana, Arial, sans-serif;\"><span style=\"outline: 0px; margin: 0px; padding: 0px; overflow-wrap: normal; word-break: normal; font-family: Helvetica; color: rgb(38, 38, 38); font-size: 14px;\">&nbsp;</span></p><p style=\"margin: 1em 0px; outline: 0px; padding: 0px; overflow-wrap: normal; font-size: 12px; line-height: 1.4; word-break: normal; color: rgb(51, 51, 51); font-family: &quot;Sgy Open Sans&quot;, &quot;Lucida Grande&quot;, Tahoma, Verdana, Arial, sans-serif;\"><span style=\"outline: 0px; margin: 0px; padding: 0px; overflow-wrap: normal; word-break: normal; font-family: Helvetica; color: rgb(38, 38, 38); font-size: 14px;\">Discussion:</span></p><p style=\"margin: 1em 0px; outline: 0px; padding: 0px; overflow-wrap: normal; font-size: 12px; line-height: 1.4; word-break: normal; color: rgb(51, 51, 51); font-family: &quot;Sgy Open Sans&quot;, &quot;Lucida Grande&quot;, Tahoma, Verdana, Arial, sans-serif;\"><span style=\"outline: 0px; margin: 0px; padding: 0px; overflow-wrap: normal; word-break: normal; font-family: Helvetica; color: rgb(38, 38, 38); font-size: 14px;\">In your groups, brainstorm how you will speak up when you talk to Mary.</span></p><p style=\"margin: 1em 0px; outline: 0px; padding: 0px; overflow-wrap: normal; font-size: 12px; line-height: 1.4; word-break: normal; color: rgb(51, 51, 51); font-family: &quot;Sgy Open Sans&quot;, &quot;Lucida Grande&quot;, Tahoma, Verdana, Arial, sans-serif;\"><span style=\"outline: 0px; margin: 0px; padding: 0px; overflow-wrap: normal; word-break: normal; font-size: 14px;\"><span style=\"outline: 0px; margin: 0px; padding: 0px; overflow-wrap: normal; word-break: normal; font-family: Helvetica; color: rgb(38, 38, 38);\">What can you do to help you s</span><span style=\"outline: 0px; margin: 0px; padding: 0px; overflow-wrap: normal; word-break: normal; color: rgb(38, 38, 38); font-family: Helvetica;\">tay calm?</span></span></p><p style=\"margin: 1em 0px; outline: 0px; padding: 0px; overflow-wrap: normal; font-size: 12px; line-height: 1.4; word-break: normal; color: rgb(51, 51, 51); font-family: &quot;Sgy Open Sans&quot;, &quot;Lucida Grande&quot;, Tahoma, Verdana, Arial, sans-serif;\"><span style=\"outline: 0px; margin: 0px; padding: 0px; overflow-wrap: normal; word-break: normal; font-size: 14px;\"><span style=\"outline: 0px; margin: 0px; padding: 0px; overflow-wrap: normal; word-break: normal; font-family: Helvetica; color: rgb(38, 38, 38);\">What can you do to show that you are c</span><span style=\"outline: 0px; margin: 0px; padding: 0px; overflow-wrap: normal; word-break: normal; color: rgb(38, 38, 38); font-family: Helvetica;\">onfident?</span></span></p><p style=\"margin: 1em 0px; outline: 0px; padding: 0px; overflow-wrap: normal; font-size: 12px; line-height: 1.4; word-break: normal; color: rgb(51, 51, 51); font-family: &quot;Sgy Open Sans&quot;, &quot;Lucida Grande&quot;, Tahoma, Verdana, Arial, sans-serif;\"><span style=\"outline: 0px; margin: 0px; padding: 0px; overflow-wrap: normal; word-break: normal; font-size: 14px;\"><span style=\"outline: 0px; margin: 0px; padding: 0px; overflow-wrap: normal; word-break: normal; font-family: Helvetica; color: rgb(38, 38, 38);\">List what you will use when you</span><span style=\"outline: 0px; margin: 0px; padding: 0px; overflow-wrap: normal; word-break: normal; font-family: Helvetica; color: rgb(38, 38, 38);\">&nbsp;state facts and feelings?</span></span></p><p style=\"margin: 1em 0px; outline: 0px; padding: 0px; overflow-wrap: normal; font-size: 12px; line-height: 1.4; word-break: normal; color: rgb(51, 51, 51); font-family: &quot;Sgy Open Sans&quot;, &quot;Lucida Grande&quot;, Tahoma, Verdana, Arial, sans-serif;\"><span style=\"outline: 0px; margin: 0px; padding: 0px; overflow-wrap: normal; word-break: normal; font-size: 14px;\"><span style=\"outline: 0px; margin: 0px; padding: 0px; overflow-wrap: normal; word-break: normal; font-family: Helvetica; color: rgb(38, 38, 38);\">Write out your o</span><span style=\"outline: 0px; margin: 0px; padding: 0px; overflow-wrap: normal; word-break: normal; color: rgb(38, 38, 38); font-family: Helvetica;\">pening sentence; s</span><span style=\"outline: 0px; margin: 0px; padding: 0px; overflow-wrap: normal; word-break: normal; color: rgb(38, 38, 38); font-family: Helvetica;\">upporting statements and c</span><span style=\"outline: 0px; margin: 0px; padding: 0px; overflow-wrap: normal; word-break: normal; font-family: Helvetica; color: rgb(38, 38, 38);\">losing sentence?</span></span></p><p style=\"margin: 1em 0px; outline: 0px; padding: 0px; overflow-wrap: normal; font-size: 12px; line-height: 1.4; word-break: normal; color: rgb(51, 51, 51); font-family: &quot;Sgy Open Sans&quot;, &quot;Lucida Grande&quot;, Tahoma, Verdana, Arial, sans-serif;\"><span style=\"outline: 0px; margin: 0px; padding: 0px; overflow-wrap: normal; word-break: normal; font-size: 14px;\">&nbsp;</span></p><p style=\"margin: 1em 0px; outline: 0px; padding: 0px; overflow-wrap: normal; font-size: 12px; line-height: 1.4; word-break: normal; color: rgb(51, 51, 51); font-family: &quot;Sgy Open Sans&quot;, &quot;Lucida Grande&quot;, Tahoma, Verdana, Arial, sans-serif;\"><span style=\"outline: 0px; margin: 0px; padding: 0px; overflow-wrap: normal; word-break: normal; font-size: 14px;\"><span style=\"outline: 0px; margin: 0px; padding: 0px; overflow-wrap: normal; word-break: normal; font-family: Helvetica; color: rgb(38, 38, 38);\"></span><span style=\"outline: 0px; margin: 0px; padding: 0px; overflow-wrap: normal; word-break: normal; font-family: Helvetica; color: rgb(38, 38, 38);\">Finally, break into pairs. One partner will pretend to be Mary while the other will practice&nbsp;saying what they have prepared. Then switch, so the other partner gets a turn to practice&nbsp;speaking up.</span></span></p><p style=\"margin: 1em 0px; outline: 0px; padding: 0px; overflow-wrap: normal; font-size: 12px; line-height: 1.4; word-break: normal; color: rgb(51, 51, 51); font-family: &quot;Sgy Open Sans&quot;, &quot;Lucida Grande&quot;, Tahoma, Verdana, Arial, sans-serif;\"><span style=\"outline: 0px; margin: 0px; padding: 0px; overflow-wrap: normal; word-break: normal; font-family: Helvetica; color: rgb(38, 38, 38); font-size: 14px;\">After you practice, discuss as a team what was good, difficult, or needs improvement.</span></p><p style=\"margin: 1em 0px; outline: 0px; padding: 0px; overflow-wrap: normal; font-size: 12px; line-height: 1.4; word-break: normal; color: rgb(51, 51, 51); font-family: &quot;Sgy Open Sans&quot;, &quot;Lucida Grande&quot;, Tahoma, Verdana, Arial, sans-serif;\"><span style=\"outline: 0px; margin: 0px; padding: 0px; overflow-wrap: normal; word-break: normal; font-family: Helvetica; color: rgb(38, 38, 38); font-size: 14px;\">and film the video of your role play (1 time) and conclusion of your discussion.</span></p><p style=\"margin: 1em 0px; outline: 0px; padding: 0px; overflow-wrap: normal; font-size: 12px; line-height: 1.4; word-break: normal; color: rgb(51, 51, 51); font-family: &quot;Sgy Open Sans&quot;, &quot;Lucida Grande&quot;, Tahoma, Verdana, Arial, sans-serif;\"><span style=\"outline: 0px; margin: 0px; padding: 0px; overflow-wrap: normal; word-break: normal; font-size: 14px;\"><em style=\"outline: 0px; margin: 0px; padding: 0px; overflow-wrap: normal; word-break: normal;\"><span style=\"outline: 0px; margin: 0px; padding: 0px; overflow-wrap: normal; word-break: normal; font-family: Helvetica; color: rgb(38, 38, 38);\"> </span></em></span></p><p style=\"margin: 1em 0px; outline: 0px; padding: 0px; overflow-wrap: normal; font-size: 12px; line-height: 1.4; word-break: normal; color: rgb(51, 51, 51); font-family: &quot;Sgy Open Sans&quot;, &quot;Lucida Grande&quot;, Tahoma, Verdana, Arial, sans-serif;\"><span style=\"outline: 0px; margin: 0px; padding: 0px; overflow-wrap: normal; word-break: normal; font-size: 14px;\">Team Work</span></p><p style=\"margin: 1em 0px; outline: 0px; padding: 0px; overflow-wrap: normal; font-size: 12px; line-height: 1.4; word-break: normal; color: rgb(51, 51, 51); font-family: &quot;Sgy Open Sans&quot;, &quot;Lucida Grande&quot;, Tahoma, Verdana, Arial, sans-serif;\"><span style=\"outline: 0px; margin: 0px; padding: 0px; overflow-wrap: normal; word-break: normal; font-size: 14px;\">&nbsp;Score: 10 Score&nbsp;</span></p><p style=\"margin: 1em 0px; outline: 0px; padding: 0px; overflow-wrap: normal; font-size: 12px; line-height: 1.4; word-break: normal; color: rgb(51, 51, 51); font-family: &quot;Sgy Open Sans&quot;, &quot;Lucida Grande&quot;, Tahoma, Verdana, Arial, sans-serif;\"><span style=\"outline: 0px; margin: 0px; padding: 0px; overflow-wrap: normal; word-break: normal; font-size: 14px;\">&nbsp;Deadline submit: Thursday 18th October 2018&nbsp;</span></p><p style=\"margin: 1em 0px; outline: 0px; padding: 0px; overflow-wrap: normal; font-size: 12px; line-height: 1.4; word-break: normal; color: rgb(51, 51, 51); font-family: &quot;Sgy Open Sans&quot;, &quot;Lucida Grande&quot;, Tahoma, Verdana, Arial, sans-serif;\"><span style=\"outline: 0px; margin: 0px; padding: 0px; overflow-wrap: normal; word-break: normal; font-size: 14px;\">&nbsp;</span></p><p style=\"margin: 1em 0px; outline: 0px; padding: 0px; overflow-wrap: normal; font-size: 12px; line-height: 1.4; word-break: normal; color: rgb(51, 51, 51); font-family: &quot;Sgy Open Sans&quot;, &quot;Lucida Grande&quot;, Tahoma, Verdana, Arial, sans-serif;\"><span style=\"outline: 0px; margin: 0px; padding: 0px; overflow-wrap: normal; word-break: normal; font-size: 14px;\"><em style=\"outline: 0px; margin: 0px; padding: 0px; overflow-wrap: normal; word-break: normal;\"><span style=\"outline: 0px; margin: 0px; padding: 0px; overflow-wrap: normal; word-break: normal; font-family: Helvetica; color: rgb(38, 38, 38);\">This activity is excerpted from the Leader’s Guide for the video program&nbsp;<span style=\"font-weight: bolder; outline: 0px; margin: 0px; padding: 0px; overflow-wrap: normal; word-break: normal;\">Preventing Workplace Bullying</span></span></em><span style=\"outline: 0px; margin: 0px; padding: 0px; overflow-wrap: normal; word-break: normal; font-family: Helvetica; color: rgb(38, 38, 38);\">.</span></span></p><p style=\"margin: 1em 0px 0px; outline: 0px; padding: 0px; overflow-wrap: normal; font-size: 12px; line-height: 1.4; word-break: normal; color: rgb(51, 51, 51); font-family: &quot;Sgy Open Sans&quot;, &quot;Lucida Grande&quot;, Tahoma, Verdana, Arial, sans-serif;\"><span style=\"outline: 0px; margin: 0px; padding: 0px; overflow-wrap: normal; word-break: normal; font-size: 14px;\"><span style=\"outline: 0px; margin: 0px; padding: 0px; overflow-wrap: normal; word-break: normal; font-family: Helvetica; color: rgb(38, 38, 38);\">&nbsp;</span><span style=\"outline: 0px; margin: 0px; padding: 0px; overflow-wrap: normal; word-break: normal; color: rgb(38, 38, 38); font-family: Helvetica;\">Reference:&nbsp;</span></span><a href=\"http://www.crmlearning.com/blog/index.php/2014/12/bullying-role-play-speaking-up-for-yourself/\" target=\"_blank\">http://www.crmlearning.com/blog/index.php/2014/12/bullying-role-play-speaking-up-for-yourself/</a></p>', '2018-10-31 11:59', '2018-11-18T11:49', '', '01,04,03', 'manager', '2018-11-18 11:02:18'),
(40, 'test', 'test', '2018-11-01', '', '04', '04', '04', '2018-11-18 04:54:27'),
(41, '', '', '2018-11-20', '', '04', '', 'manager', '2018-11-18 11:28:53'),
(42, '', '', '2018-11-20', '', '04', '', 'manager', '2018-11-18 11:30:56'),
(43, '', '', '2018-11-21', '', '04', '', 'manager', '2018-11-18 11:31:55'),
(44, '', '', '2018-11-21', '', '04', '', 'manager', '2018-11-18 11:31:55'),
(45, 'work for techinee haha', '<p><img src=\"http://copingmax.com/hr_management/public/file/images/schedule/1542516571.png\" style=\"width: 50%;\"><br></p>', '2018-11-20', '', '04', '04', 'manager', '2018-11-18 11:49:47'),
(46, 'work for techinee haha', 'work for techinee haha', '2018-11-21', '', '04', '04', 'manager', '2018-11-18 12:13:32'),
(47, 'test eiei', '<p><img src=\"http://copingmax.com/hr_management/public/file/images/schedule/1542527279.png\" style=\"width: 25%;\">asdgasdgasdgasd</p><p>kjhlkhlhkhl<b>asdgadgadsadgadsg</b></p>', '2018-10-30 12:30', '2018-11-01 09:00', '04', '04', 'manager', '2018-11-18 14:49:27'),
(48, 'Meeting for HRM Department ', '<p>There is meeting for all employees in HRM department including all managers of each departments about</p><p>agenda1 ......</p><p>agenda2 ........</p>', '2018-11-19 13:00', '2018-11-19T15:00', '04,01,04,03', '04', '04', '2018-11-18 15:21:46'),
(49, 'test', 'asdfasdf', '2018-11-22', '', '04', '04', 'manager', '2018-11-19 03:05:53');

-- --------------------------------------------------------

--
-- Table structure for table `tb_training`
--

CREATE TABLE `tb_training` (
  `id` int(11) NOT NULL,
  `link` text NOT NULL,
  `cate` text NOT NULL,
  `refer` text NOT NULL,
  `alert` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tb_training`
--

INSERT INTO `tb_training` (`id`, `link`, `cate`, `refer`, `alert`) VALUES
(13, '7ptiYPcIeM8', '01', '', ''),
(14, '_pTU4gwmcMs', '02', '', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_chat`
--
ALTER TABLE `tb_chat`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_department`
--
ALTER TABLE `tb_department`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_employee`
--
ALTER TABLE `tb_employee`
  ADD PRIMARY KEY (`emp_id`);

--
-- Indexes for table `tb_file`
--
ALTER TABLE `tb_file`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_log`
--
ALTER TABLE `tb_log`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_manager`
--
ALTER TABLE `tb_manager`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_schedule`
--
ALTER TABLE `tb_schedule`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_training`
--
ALTER TABLE `tb_training`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_chat`
--
ALTER TABLE `tb_chat`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tb_file`
--
ALTER TABLE `tb_file`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `tb_log`
--
ALTER TABLE `tb_log`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- AUTO_INCREMENT for table `tb_manager`
--
ALTER TABLE `tb_manager`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tb_schedule`
--
ALTER TABLE `tb_schedule`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- AUTO_INCREMENT for table `tb_training`
--
ALTER TABLE `tb_training`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
