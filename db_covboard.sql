-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Apr 18, 2020 at 03:48 PM
-- Server version: 5.7.19
-- PHP Version: 7.1.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `covboard`
--

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

DROP TABLE IF EXISTS `comments`;
CREATE TABLE IF NOT EXISTS `comments` (
  `c_id` int(11) NOT NULL AUTO_INCREMENT,
  `project_id` int(11) DEFAULT NULL,
  `task_id` int(11) DEFAULT NULL,
  `user_comment` text,
  `user_id` int(11) DEFAULT NULL,
  `c_date` datetime DEFAULT NULL,
  PRIMARY KEY (`c_id`),
  KEY `project_id` (`project_id`),
  KEY `task_id` (`task_id`),
  KEY `user_id` (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`c_id`, `project_id`, `task_id`, `user_comment`, `user_id`, `c_date`) VALUES
(1, 20, 15, 'Some new changes', 4, '2020-04-17 18:44:12'),
(2, 20, 15, '', 4, '2020-04-17 18:47:49'),
(3, 20, 15, 'Almost complete my task', 4, '2020-04-17 18:48:28'),
(4, 20, 15, 'Finally this task is completed, phew that was a lot of work this weekend. But now we can rest XD', 4, '2020-04-17 19:29:21'),
(5, 20, 16, 'Some sort of progress', 4, '2020-04-17 20:20:43'),
(6, 20, 16, 'Uploaded CD.docx file now and completed this task', 4, '2020-04-17 20:23:16'),
(10, 19, 13, 'I am marking this task as complet!', 4, '2020-04-17 20:58:57'),
(11, 20, 17, 'Implemented seive of eratosthenese for printing the primes', 4, '2020-04-18 12:54:21'),
(12, 22, 20, '', 5, '2020-04-18 16:21:42');

-- --------------------------------------------------------

--
-- Table structure for table `directories`
--

DROP TABLE IF EXISTS `directories`;
CREATE TABLE IF NOT EXISTS `directories` (
  `d_id` int(11) NOT NULL AUTO_INCREMENT,
  `d_name` varchar(255) DEFAULT NULL,
  `project_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`d_id`),
  KEY `project_id` (`project_id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `directories`
--

INSERT INTO `directories` (`d_id`, `d_name`, `project_id`) VALUES
(1, 'test-1', 18),
(2, 'learn-programming-4', 19),
(3, 'cloud-computing-4', 20),
(4, 'machine-learning-4', 21),
(5, 'competitive-programming-5', 22);

-- --------------------------------------------------------

--
-- Table structure for table `project`
--

DROP TABLE IF EXISTS `project`;
CREATE TABLE IF NOT EXISTS `project` (
  `project_id` int(11) NOT NULL AUTO_INCREMENT,
  `project_name` varchar(255) NOT NULL,
  `project_code` varchar(255) DEFAULT NULL,
  `project_password` varchar(255) NOT NULL,
  `project_deadline` datetime DEFAULT NULL,
  `project_description` text,
  `is_completed` int(11) DEFAULT '0',
  `project_progress` int(11) DEFAULT '0',
  `creater_id` int(11) NOT NULL,
  `project_img` varchar(255) NOT NULL DEFAULT 'default-project.png',
  PRIMARY KEY (`project_id`),
  KEY `creater_id` (`creater_id`)
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `project`
--

INSERT INTO `project` (`project_id`, `project_name`, `project_code`, `project_password`, `project_deadline`, `project_description`, `is_completed`, `project_progress`, `creater_id`, `project_img`) VALUES
(1, 'Covboard project', 'covboard-project-1', '123', '2020-04-17 00:00:00', 'To win the hackathon and\r\nLorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 0, 0, 1, 'default-project.png'),
(2, 'master project', 'master-project-1', '123', '2020-04-17 00:00:00', 'To win this damn hackathon', 1, 100, 1, 'default-project.png'),
(3, 'another project', 'another-project-1', '123', '2020-04-17 00:00:00', 'yes this is a project', 0, 0, 1, 'default-project.png'),
(18, 'test', 'test-1', '123', '2020-04-18 00:00:00', 'test', 0, 0, 1, 'default-project.png'),
(19, 'Learn programming', 'learn-programming-4', '123', '2020-04-26 00:00:00', 'A simple project to make people learn programming', 0, 0, 4, 'default-project.png'),
(20, 'Cloud Computing', 'cloud-computing-4', '123', '2020-04-25 00:00:00', 'To test some functionalities of cloud', 0, 0, 4, 'default-project.png'),
(21, 'Machine learning', 'machine-learning-4', '123', '2020-04-26 00:00:00', 'to implement ml algos', 0, 0, 4, 'default-project.png'),
(22, 'Competitive programming', 'competitive-programming-5', '123', '2020-04-30 00:00:00', 'To solve all possible questions in competitive programming', 0, 0, 5, 'default-project.png');

-- --------------------------------------------------------

--
-- Table structure for table `project_assign`
--

DROP TABLE IF EXISTS `project_assign`;
CREATE TABLE IF NOT EXISTS `project_assign` (
  `p_assign_id` int(11) NOT NULL AUTO_INCREMENT,
  `project_id` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`p_assign_id`),
  KEY `project_id` (`project_id`),
  KEY `user_id` (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `project_assign`
--

INSERT INTO `project_assign` (`p_assign_id`, `project_id`, `user_id`) VALUES
(1, 1, 1),
(2, 2, 1),
(9, 18, 1),
(10, 19, 4),
(11, 20, 4),
(12, 21, 4),
(13, 20, 1),
(14, 22, 5);

-- --------------------------------------------------------

--
-- Table structure for table `project_comments`
--

DROP TABLE IF EXISTS `project_comments`;
CREATE TABLE IF NOT EXISTS `project_comments` (
  `c_id` int(11) NOT NULL AUTO_INCREMENT,
  `project_id` int(11) DEFAULT NULL,
  `user_comment` text,
  `user_id` int(11) DEFAULT NULL,
  `c_date` datetime DEFAULT NULL,
  PRIMARY KEY (`c_id`),
  KEY `user_id` (`user_id`),
  KEY `project_id` (`project_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `project_comments`
--

INSERT INTO `project_comments` (`c_id`, `project_id`, `user_comment`, `user_id`, `c_date`) VALUES
(1, 20, 'Hello project mates', 4, '2020-04-17 20:41:09'),
(2, 19, 'Why is only member in this project?', 4, '2020-04-17 21:00:41'),
(3, 20, 'Looks like we have got  a new project member in this covboard (What say Test user)', 4, '2020-04-17 22:59:21');

-- --------------------------------------------------------

--
-- Table structure for table `project_task_list`
--

DROP TABLE IF EXISTS `project_task_list`;
CREATE TABLE IF NOT EXISTS `project_task_list` (
  `list_id` int(11) NOT NULL AUTO_INCREMENT,
  `project_id` int(11) DEFAULT NULL,
  `task_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`list_id`),
  KEY `project_id` (`project_id`),
  KEY `task_id` (`task_id`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `project_task_list`
--

INSERT INTO `project_task_list` (`list_id`, `project_id`, `task_id`) VALUES
(1, 1, 1),
(2, 1, 2),
(3, 1, 3),
(4, 1, 4),
(5, 2, 5),
(7, 19, 7),
(8, 19, 8),
(11, 19, 12),
(12, 19, 13),
(13, 19, 14),
(14, 20, 15),
(15, 20, 16),
(16, 20, 17),
(17, 20, 18),
(18, 2, 19),
(19, 22, 20);

-- --------------------------------------------------------

--
-- Table structure for table `sub_directories`
--

DROP TABLE IF EXISTS `sub_directories`;
CREATE TABLE IF NOT EXISTS `sub_directories` (
  `sub_d_id` int(11) NOT NULL AUTO_INCREMENT,
  `sub_d_name` varchar(255) NOT NULL,
  `task_id` int(11) DEFAULT NULL,
  `project_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`sub_d_id`),
  KEY `task_id` (`task_id`),
  KEY `project_id` (`project_id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sub_directories`
--

INSERT INTO `sub_directories` (`sub_d_id`, `sub_d_name`, `task_id`, `project_id`) VALUES
(1, 'Pattern', 12, 19),
(2, 'New World', 13, 19),
(3, 'Super', 14, 19),
(4, 'EC2', 15, 20),
(5, 'Big Tables', 16, 20),
(6, 'Print prime numbers', 17, 20),
(7, 'Random number', 18, 20),
(8, 'Pattern', 20, 22);

-- --------------------------------------------------------

--
-- Table structure for table `task`
--

DROP TABLE IF EXISTS `task`;
CREATE TABLE IF NOT EXISTS `task` (
  `task_id` int(11) NOT NULL AUTO_INCREMENT,
  `task_name` varchar(255) NOT NULL,
  `task_description` text,
  `task_progress` int(11) DEFAULT '0',
  `is_private` int(2) NOT NULL DEFAULT '0',
  `task_password` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`task_id`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `task`
--

INSERT INTO `task` (`task_id`, `task_name`, `task_description`, `task_progress`, `is_private`, `task_password`) VALUES
(1, 'To print Prime number', 'Write programs in different languages to print prime numbers', 0, 0, NULL),
(2, 'Tower of hanoi', 'Write a python iterative program to solve tower of hanoi problem', 0, 0, NULL),
(3, 'some new task', 'This is just for testing purpose', 0, 0, NULL),
(4, 'Another task', 'This task will need a password', 0, 1, '123'),
(5, 'Create a draggable container', 'a container that can be dragged', 0, 0, NULL),
(6, 'Dynamic programming', 'master dp', 0, 0, NULL),
(7, 'Print hello World', 'A simple program to learn to print hello world', 0, 0, NULL),
(8, 'Print seive', 'Print prime numbers', 0, 1, '123'),
(12, 'Pattern', 'To print patterns', 0, 0, NULL),
(13, 'New World', 'To change everything', 100, 0, NULL),
(14, 'Super', 'To implement something big', 0, 0, NULL),
(15, 'EC2', 'To make a elastic cloud', 100, 0, NULL),
(16, 'Big Tables', 'To work on Google big tables', 100, 1, '123'),
(17, 'Print prime numbers', 'To print prime number', 100, 1, '123'),
(18, 'Random number', 'To generate thousand random numbers', 0, 0, NULL),
(19, 'Text editor', 'To create a new text editor, better than VScode', 0, 0, NULL),
(20, 'Pattern', 'To master all questions related to pattern printing', 50, 0, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `task_assign`
--

DROP TABLE IF EXISTS `task_assign`;
CREATE TABLE IF NOT EXISTS `task_assign` (
  `t_assign_id` int(11) NOT NULL AUTO_INCREMENT,
  `task_id` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`t_assign_id`),
  KEY `task_id` (`task_id`),
  KEY `user_id` (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `task_assign`
--

INSERT INTO `task_assign` (`t_assign_id`, `task_id`, `user_id`) VALUES
(1, 1, 1),
(2, 3, 1),
(3, 15, 4),
(4, 17, 4),
(5, 16, 4),
(6, 12, 4),
(7, 18, 1),
(8, 20, 5);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `user_password` varchar(255) NOT NULL,
  `user_img` varchar(255) DEFAULT 'default.png',
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `user_name`, `email`, `user_password`, `user_img`) VALUES
(1, 'Test User', 'test@user.com', '123', NULL),
(4, 'Ayush Kumar', 'ayush@gmail.com', '123', 'default.png'),
(5, 'Vishal', 'vishal@gmail.com', '123', 'default.png');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `comments_ibfk_1` FOREIGN KEY (`project_id`) REFERENCES `project` (`project_id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `comments_ibfk_2` FOREIGN KEY (`task_id`) REFERENCES `task` (`task_id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `comments_ibfk_3` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON UPDATE CASCADE;

--
-- Constraints for table `directories`
--
ALTER TABLE `directories`
  ADD CONSTRAINT `directories_ibfk_1` FOREIGN KEY (`project_id`) REFERENCES `project` (`project_id`) ON UPDATE CASCADE;

--
-- Constraints for table `project`
--
ALTER TABLE `project`
  ADD CONSTRAINT `project_ibfk_1` FOREIGN KEY (`creater_id`) REFERENCES `users` (`user_id`);

--
-- Constraints for table `project_assign`
--
ALTER TABLE `project_assign`
  ADD CONSTRAINT `project_assign_ibfk_1` FOREIGN KEY (`project_id`) REFERENCES `project` (`project_id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `project_assign_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON UPDATE CASCADE;

--
-- Constraints for table `project_comments`
--
ALTER TABLE `project_comments`
  ADD CONSTRAINT `project_comments_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `project_comments_ibfk_2` FOREIGN KEY (`project_id`) REFERENCES `project` (`project_id`) ON UPDATE CASCADE;

--
-- Constraints for table `project_task_list`
--
ALTER TABLE `project_task_list`
  ADD CONSTRAINT `project_task_list_ibfk_1` FOREIGN KEY (`project_id`) REFERENCES `project` (`project_id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `project_task_list_ibfk_2` FOREIGN KEY (`task_id`) REFERENCES `task` (`task_id`) ON UPDATE CASCADE;

--
-- Constraints for table `sub_directories`
--
ALTER TABLE `sub_directories`
  ADD CONSTRAINT `sub_directories_ibfk_1` FOREIGN KEY (`task_id`) REFERENCES `task` (`task_id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `sub_directories_ibfk_2` FOREIGN KEY (`project_id`) REFERENCES `project` (`project_id`) ON UPDATE CASCADE;

--
-- Constraints for table `task_assign`
--
ALTER TABLE `task_assign`
  ADD CONSTRAINT `task_assign_ibfk_1` FOREIGN KEY (`task_id`) REFERENCES `task` (`task_id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `task_assign_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
