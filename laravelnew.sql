-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 09, 2020 at 04:52 PM
-- Server version: 10.4.6-MariaDB
-- PHP Version: 7.3.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `laravelnew`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `slug`, `created_at`, `updated_at`) VALUES
(1, 'Chemistry', 'Chemistry', NULL, NULL),
(2, 'Physics', 'physics', NULL, NULL),
(3, 'Mathmetics', 'mathmetics', NULL, NULL),
(14, 'Geography', 'geosasasasasa', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2020_01_08_060520_create_categories_table', 1),
(2, '2020_01_08_061216_create_posts_table', 2);

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category_id` int(11) NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `details` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `category_id`, `title`, `details`, `image`, `created_at`, `updated_at`) VALUES
(2, 14, 'Create a Simple HTML Newsletter', 'We\'re looking for the right individual who would like to take on this small simple project. It can lead to future updates, and more projects. More will be said in the interview process including showing concepts, etc.', 'public/frontend/image/2urhl.jpg', '2020-01-09 08:14:16', NULL),
(3, 14, 'All that glitters is not gold', 'Apply only if you are willing to take the unpaid task which is part of our hiring process. If you have read this, please state in your cover letter that you are willing. Apply only if you are willing to take the unpaid task which is part of our hiring process. If you have read this, please state in your cover letter that you are willing.', 'public/frontend/image/2v9jcabk.jpg', '2020-01-09 08:15:45', NULL),
(4, 3, 'Apply only if you are willing to take the unpaid', 'Apply only if you are willing to take the unpaid task which is part of our hiring process. If you have read this, please state in your cover letter that you are willing. Apply only if you are willing to take the unpaid task which is part of our hiring process. If you have read this, please state in your cover letter that you are willing.', 'public/frontend/image/PFD5kMk3.jpg', '2020-01-09 08:16:31', NULL),
(5, 1, 'With Image Post', 'This is a very small basic personal project, the project will be for a Timer like an appearance on the top-bar of the WordPress panel.\r\n\r\nMouse over will show other timers and a settings link.\r\n\r\nWe will have a simple create timer section that will be explained later.\r\n\r\nWe\'re looking for the right individual who would like to take on this small simple project. It can lead to future updates and more projects. More will be said in the interview process including showing concepts, etc.', 'public/frontend/image/1dz3zm1l.jpg', '2020-01-09 08:23:38', NULL),
(6, 3, 'Getting multiple errors on my wordpress site', 'When going to my site, there are multiple errors prevalent that pop up. Need these fixed immediately! When going to my site, there are multiple errors prevalent that pop up. Need these fixed immediately!', 'public/frontend/image/1655238717204592.jpg', '2020-01-09 08:30:52', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
