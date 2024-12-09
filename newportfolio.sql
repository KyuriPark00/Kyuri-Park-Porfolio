-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Dec 09, 2024 at 04:27 AM
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
-- Database: `newportfolio`
--

-- --------------------------------------------------------

--
-- Table structure for table `contacts`
--

DROP TABLE IF EXISTS `contacts`;
CREATE TABLE IF NOT EXISTS `contacts` (
  `id` int NOT NULL AUTO_INCREMENT,
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `comments` text NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `contacts`
--

INSERT INTO `contacts` (`id`, `first_name`, `last_name`, `email`, `comments`, `created_at`) VALUES
(1, 'Kyuri', 'Park', 'hailiepark1216@gmail.com', 'test', '2024-12-09 04:01:00'),
(2, 'Kyuri', 'Park', 'k_park171079@fanshaweonline.ca', 'test2', '2024-12-09 04:03:52'),
(3, 'Marko', 'Sapsic', 'marko@gmail.com', 'test3', '2024-12-09 04:05:23'),
(4, 'Lois', 'b', 'lois@outlook.com', 'test4', '2024-12-09 04:08:36'),
(5, 'Hailie', 'Park', 'krp1216@naver.com', 'Hello', '2024-12-09 04:18:07');

-- --------------------------------------------------------

--
-- Table structure for table `media`
--

DROP TABLE IF EXISTS `media`;
CREATE TABLE IF NOT EXISTS `media` (
  `id` int NOT NULL AUTO_INCREMENT,
  `type` enum('image','video') NOT NULL,
  `file_path` varchar(255) NOT NULL,
  `project_id` int DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `project_id` (`project_id`)
) ENGINE=MyISAM AUTO_INCREMENT=23 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `media`
--

INSERT INTO `media` (`id`, `type`, `file_path`, `project_id`, `created_at`) VALUES
(1, 'image', 'images/quatro-thumnail.jpg', 1, '2024-12-08 20:13:07'),
(2, 'image', 'images/quatro-hero.png', 1, '2024-12-08 20:13:07'),
(3, 'video', 'video/Quatro_Video.mp4', 1, '2024-12-08 20:13:07'),
(4, 'image', 'images/quatro-wireframes.jpg', 1, '2024-12-08 20:13:07'),
(5, 'image', 'images/quatro-logo-grid.jpg', 1, '2024-12-08 20:13:07'),
(8, 'image', 'images/quatro-video-thumb.png', 1, '2024-12-08 23:21:34'),
(6, 'image', 'images/quatro-devices.png', 1, '2024-12-08 20:57:00'),
(9, 'image', 'images/vybe-devices.png', 2, '2024-12-08 23:55:01'),
(10, 'image', 'images/vybe-sketch.png', 2, '2024-12-08 23:55:01'),
(11, 'video', 'video/vybe_video.mp4', 2, '2024-12-08 23:55:01'),
(12, 'image', 'images/industry-night-thumbnail.jpg', 3, '2024-12-09 00:03:10'),
(13, 'image', 'images/industrynight-devices.png', 3, '2024-12-09 00:03:10'),
(14, 'image', 'images/industry-wireframes.png', 3, '2024-12-09 00:03:10'),
(15, 'video', 'video/2024-demoreel.mp4', 4, '2024-12-09 00:58:58'),
(16, 'image', 'images/stroyboard-1.png', 4, '2024-12-09 00:58:58'),
(17, 'image', 'images/stroyboard-2.png', 4, '2024-12-09 00:58:58'),
(18, 'image', 'images/stroyboard-3.png', 4, '2024-12-09 00:58:58'),
(19, 'image', 'images/stroyboard-4.png', 4, '2024-12-09 00:58:58'),
(20, 'image', 'images/stroyboard-5.png', 4, '2024-12-09 00:58:58'),
(21, 'image', 'images/vybe-thumnail.png', 2, '2024-12-09 01:17:37'),
(22, 'image', 'images/demoreel-thumnail.jpg', 4, '2024-12-09 02:43:39');

-- --------------------------------------------------------

--
-- Table structure for table `projects`
--

DROP TABLE IF EXISTS `projects`;
CREATE TABLE IF NOT EXISTS `projects` (
  `id` int NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `team` varchar(255) NOT NULL,
  `year` int NOT NULL,
  `github_link` varchar(255) NOT NULL,
  `short_description` varchar(255) NOT NULL,
  `subtitle` varchar(255) NOT NULL,
  `instagram_link` varchar(255) DEFAULT NULL,
  `linkedin_link` varchar(255) DEFAULT NULL,
  `entry_point_h3` varchar(255) DEFAULT NULL,
  `entry_point_p` text,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `projects`
--

INSERT INTO `projects` (`id`, `title`, `description`, `team`, `year`, `github_link`, `short_description`, `subtitle`, `instagram_link`, `linkedin_link`, `entry_point_h3`, `entry_point_p`) VALUES
(1, 'Quatro', '\"We collaborated to design the logo and label for Quatro, a tropical carbonated drink, focusing on a vibrant and refreshing look. We also developed a responsive website to showcase the drink\'s unique features, product details, and brand story, targeting young adults who enjoy fruity, refreshing beverages.', 'Kyuri Park,\r\nStephanie Chan', 2024, 'https://github.com/Stephaniechan2005/Chan_WingLamStephanie_Park_Kyuri_FIP', 'Website / Graphic Design', 'Tropical Carbonated Drink', NULL, NULL, 'Building Quatro\'s Digital Presence', 'In this project, the key focus was creating a cohesive brand identity through logo, label, and website design. Pastel yellow was used for the header and body, while pastel pink was chosen for the footer, creating a soft yet lively impression. To add contrast and highlight important elements, fluorescent colors were applied to buttons and SVG icons. Additionally, vivid colors were used for backgrounds in hero images and posters to keep the webpage visually dynamic. A CSS animation was incorporated into the landing page\'s hero image section to reinforce the brand identity effectively.'),
(2, 'Vybe Pro Max', '\"I designed the Vybe Pro Max earbuds and a responsive website to create a cohesive product and brand identity. The earbuds, crafted with a focus on ergonomics, minimalism, and functionality, are paired with a website featuring a 3D model viewer, sliding X-ray images, AJAX scroll animations, and a JavaScript-powered color selection tool. Together, they target young, tech-savvy users seeking a sleek, modern audio experience.\"', 'Kyuri Park', 2024, 'https://github.com/KyuriPark00/Park-Kyuri-Earbuds-Promotional-Page', 'Motion/Graphic Design', 'Earbuds Project', NULL, NULL, 'Building Vybe Pro Max\'s Digital and Product Identity', 'In this project, the focus was on establishing a seamless connection between the Vybe Pro Max earbuds and their digital presence. Guided by the principles of ergonomics, minimalism, and functionality, both the earbuds and website were meticulously designed. The website incorporates advanced features, including a 3D model viewer, sliding X-ray image functionality, AJAX-based scroll animations, and a JavaScript-powered color selection tool. These elements work together to enhance interactivity and effectively showcase the product\'s innovative design and features.'),
(3, 'Industry Night', '\"We created an engaging website for Industry Night, hosted by the Interactive Media Design Program at Fanshawe College. Showcasing student projects, portfolios, and program details, the site features dynamic elements like video presentations and parallax effects. We also designed promotional materials to reflect the event\'s professional and creative tone.\"', 'Kyuri Park,\r\nStephanie Chan,\r\nTanya Mae Huertas,\r\nChu Qiao-Yi', 2024, 'https://github.com/Stephaniechan2005/Team5_student_showcase', 'Website', 'Interactive Media Design Industry Night 2024', NULL, NULL, 'Building Industry Night\'s Digital Showcase and Event Identity', 'This project focused on creating a compelling and interactive digital presence for Industry Night 2024, hosted by the Interactive Media Design program at Fanshawe College. The website serves as the central hub, featuring an immersive design with parallax scrolling effects, embedded video content, and responsive layouts to ensure accessibility across devices. Highlights include a dedicated portfolio section, winning project displays, and program introduction pages designed to captivate both industry professionals and prospective students. Custom visual assets, animations, and intuitive navigation contribute to a seamless user experience, effectively showcasing the creativity and expertise of the graduating students.'),
(4, '2024 Demo Reel', '\"I created a dynamic demo reel showcasing the creativity and technical skills of the Interactive Media Design Program, featuring standout projects, animations, and professional motion graphics to captivate industry professionals.\"', 'Kyuri Park', 2024, '', 'Video / Motion', '2024 Kyuri Park Demo Reel ', NULL, NULL, NULL, NULL);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
