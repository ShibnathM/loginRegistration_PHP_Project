-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Nov 02, 2021 at 09:23 AM
-- Server version: 10.4.10-MariaDB
-- PHP Version: 7.3.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `collegedata`
--

-- --------------------------------------------------------

--
-- Table structure for table `genders`
--

DROP TABLE IF EXISTS `genders`;
CREATE TABLE IF NOT EXISTS `genders` (
  `id` int(20) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `status` enum('Y','N') NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=13 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `genders`
--

INSERT INTO `genders` (`id`, `name`, `status`) VALUES
(12, 'FEMALE', 'Y'),
(11, 'MALE', 'Y');

-- --------------------------------------------------------

--
-- Table structure for table `hobbies`
--

DROP TABLE IF EXISTS `hobbies`;
CREATE TABLE IF NOT EXISTS `hobbies` (
  `id` int(20) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `status` enum('Y','N') NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `hobbies`
--

INSERT INTO `hobbies` (`id`, `name`, `status`) VALUES
(1, 'Cricket', 'Y'),
(2, 'Football', 'Y'),
(4, 'Swimming', 'Y'),
(5, 'Drawing', 'Y');

-- --------------------------------------------------------

--
-- Table structure for table `streams`
--

DROP TABLE IF EXISTS `streams`;
CREATE TABLE IF NOT EXISTS `streams` (
  `id` int(20) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `parent_id` int(20) DEFAULT NULL,
  `status` enum('Y','N') NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `streams`
--

INSERT INTO `streams` (`id`, `name`, `parent_id`, `status`) VALUES
(1, 'B.Sc', 0, 'Y'),
(2, 'B.A', 0, 'Y'),
(3, 'Computer Sci', 1, 'Y'),
(4, 'Micro Boi', 1, 'Y'),
(5, 'History', 2, 'Y');

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

DROP TABLE IF EXISTS `students`;
CREATE TABLE IF NOT EXISTS `students` (
  `id` int(20) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `phone` bigint(20) NOT NULL,
  `address` varchar(100) NOT NULL,
  `password` varchar(50) NOT NULL,
  `image` varchar(50) DEFAULT NULL,
  `gender_id` int(20) DEFAULT NULL,
  `year_id` int(20) NOT NULL DEFAULT 0,
  `status` enum('Y','N') NOT NULL DEFAULT 'Y',
  `created_at` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=32 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`id`, `name`, `email`, `phone`, `address`, `password`, `image`, `gender_id`, `year_id`, `status`, `created_at`, `updated_at`) VALUES
(31, 'Alpana', 'alpana@mail.com', 4563217859, 'Hyderabad', '827ccb0eea8a706c4c34a16891f84e7b', '1635400313_user1.jfif', 12, 1, 'Y', '2021-10-28 05:51:53', '2021-10-28 05:51:53'),
(30, 'Kamal', 'kamal@mail.com', 9632587410, 'Bangalore', '827ccb0eea8a706c4c34a16891f84e7b', '1635400209_user2.jfif', 11, 3, 'Y', '2021-10-28 05:50:09', '2021-10-28 05:50:09'),
(28, 'Shibnath', 'shibnath@mail.com ', 1234567890, 'Kolkata', '202cb962ac59075b964b07152d234b70', '1635400051_user4.jfif', 11, 2, 'Y', '2021-10-28 05:47:31', '2021-10-28 05:47:31'),
(29, 'Sananya', 'sananya@mail.com', 3214569870, 'Mumbai', '827ccb0eea8a706c4c34a16891f84e7b', '1635400135_user3.jfif', 12, 2, 'Y', '2021-10-28 05:48:55', '2021-10-28 05:48:55');

-- --------------------------------------------------------

--
-- Table structure for table `student_hobby`
--

DROP TABLE IF EXISTS `student_hobby`;
CREATE TABLE IF NOT EXISTS `student_hobby` (
  `id` int(20) NOT NULL AUTO_INCREMENT,
  `student_id` int(20) NOT NULL,
  `hobby_id` int(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=57 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `student_hobby`
--

INSERT INTO `student_hobby` (`id`, `student_id`, `hobby_id`) VALUES
(56, 31, 4),
(55, 31, 2),
(54, 30, 2),
(51, 29, 1),
(50, 28, 5),
(49, 28, 4),
(53, 30, 1),
(52, 29, 5);

-- --------------------------------------------------------

--
-- Table structure for table `student_stream`
--

DROP TABLE IF EXISTS `student_stream`;
CREATE TABLE IF NOT EXISTS `student_stream` (
  `id` int(20) NOT NULL AUTO_INCREMENT,
  `streams_id` int(20) DEFAULT NULL,
  `student_id` int(20) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=14 DEFAULT CHARSET=utf8 COLLATE=utf8_croatian_ci;

--
-- Dumping data for table `student_stream`
--

INSERT INTO `student_stream` (`id`, `streams_id`, `student_id`) VALUES
(11, 3, 28),
(12, 5, 30),
(13, 4, 31);

-- --------------------------------------------------------

--
-- Table structure for table `student_subject`
--

DROP TABLE IF EXISTS `student_subject`;
CREATE TABLE IF NOT EXISTS `student_subject` (
  `id` int(20) NOT NULL AUTO_INCREMENT,
  `student_id` int(20) NOT NULL,
  `subject_id` int(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=22 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `student_subject`
--

INSERT INTO `student_subject` (`id`, `student_id`, `subject_id`) VALUES
(21, 31, 6),
(20, 30, 4),
(18, 28, 5),
(19, 29, 7);

-- --------------------------------------------------------

--
-- Table structure for table `subjects`
--

DROP TABLE IF EXISTS `subjects`;
CREATE TABLE IF NOT EXISTS `subjects` (
  `id` int(20) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `status` enum('Y','N') NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=12 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `subjects`
--

INSERT INTO `subjects` (`id`, `name`, `status`) VALUES
(5, 'Game Development', 'Y'),
(4, 'AI and Machine Learning', 'Y'),
(6, 'Game Development', 'Y'),
(7, 'Web Design ', 'Y'),
(9, 'Full Stack Web Development ', 'Y');

-- --------------------------------------------------------

--
-- Table structure for table `years`
--

DROP TABLE IF EXISTS `years`;
CREATE TABLE IF NOT EXISTS `years` (
  `id` int(20) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `status` enum('Y','N') NOT NULL DEFAULT 'Y',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `years`
--

INSERT INTO `years` (`id`, `name`, `status`) VALUES
(1, '1st Year', 'Y'),
(2, '2nd Year', 'Y'),
(3, '3rd Year', 'Y');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
