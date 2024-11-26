-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Nov 05, 2024 at 10:18 PM
-- Server version: 8.3.0
-- PHP Version: 8.2.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `kyuri_portfolio`
--

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

DROP TABLE IF EXISTS `contact`;
CREATE TABLE IF NOT EXISTS `contact` (
  `contact_id` int UNSIGNED NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `message` text NOT NULL,
  PRIMARY KEY (`contact_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `media`
--

DROP TABLE IF EXISTS `media`;
CREATE TABLE IF NOT EXISTS `media` (
  `media_id` int UNSIGNED NOT NULL,
  `project_id` int UNSIGNED NOT NULL,
  `media_type` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `media_url` varchar(255) NOT NULL,
  `media_description` text,
  PRIMARY KEY (`media_id`),
  KEY `project_id` (`project_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `projects`
--

DROP TABLE IF EXISTS `projects`;
CREATE TABLE IF NOT EXISTS `projects` (
  `project_id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `project_name` varchar(255) NOT NULL,
  `project_brief` text NOT NULL,
  `what_i_did` text NOT NULL,
  `wireframing_sketches` text NOT NULL,
  `repo_link` varchar(255) NOT NULL,
  `start_year` date NOT NULL,
  PRIMARY KEY (`project_id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `projects`
--

INSERT INTO `projects` (`project_id`, `project_name`, `project_brief`, `what_i_did`, `wireframing_sketches`, `repo_link`, `start_year`) VALUES
(1, 'Quatro', 'I collaborated with Stephanie to design the logo and label for Quatro, a tropical carbonated drink, focusing on a vibrant and refreshing look. We also developed a responsive website that highlights the drink\'s unique features, product details, and brand story, aiming to appeal to young adults who enjoy fruity, refreshing beverages.', 'Coding for front-end(HTML, CSS, JS)\r\nLogo Design\r\nWen Design\r\nLable Design\r\nPoster Design\r\nCreating Promotion Video\r\n\r\n', 'Wireframing', 'https://github.com/Stephaniechan2005/Chan_WingLamStephanie_Park_Kyuri_FIP', '2024-06-05'),
(2, 'Earbuds', 'efefef', 'efefe', 'fefeefe', 'efefefe', '0000-00-00');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
