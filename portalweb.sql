-- phpMyAdmin SQL Dump
-- version 4.5.4.1deb2ubuntu2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Dec 22, 2016 at 06:15 PM
-- Server version: 5.7.16-0ubuntu0.16.04.1
-- PHP Version: 7.0.8-0ubuntu0.16.04.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `portalweb`
--

-- --------------------------------------------------------

--
-- Table structure for table `abouts`
--

CREATE TABLE `abouts` (
  `id` int(10) UNSIGNED NOT NULL,
  `data` longtext COLLATE utf8_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `ads`
--

CREATE TABLE `ads` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `link` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'http://www.ediinzasag.mn',
  `image` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `type` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `ads_infos`
--

CREATE TABLE `ads_infos` (
  `id` int(10) UNSIGNED NOT NULL,
  `data` longtext COLLATE utf8_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `contact_infos`
--

CREATE TABLE `contact_infos` (
  `id` int(10) UNSIGNED NOT NULL,
  `location` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `phonenumber` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `data` longtext COLLATE utf8_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `image_of_posts`
--

CREATE TABLE `image_of_posts` (
  `id` int(10) UNSIGNED NOT NULL,
  `path` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `post_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`migration`, `batch`) VALUES
('2014_01_07_073615_create_tagged_table', 1),
('2014_01_07_073615_create_tags_table', 1),
('2014_10_12_000000_create_users_table', 1),
('2016_05_20_180702_create_post_categories_table', 1),
('2016_05_21_011913_create_posts_table', 1),
('2016_05_24_190521_create_image_of_posts_table', 1),
('2016_05_28_204941_create_ads_table', 1),
('2016_05_28_215006_create_abouts_table', 1),
('2016_05_28_215011_create_terms_table', 1),
('2016_05_28_215032_create_ads_infos_table', 1),
('2016_05_28_215047_create_contact_infos_table', 1),
('2016_05_31_075858_add_user_type_to_users_table', 1),
('2016_06_10_042303_add_is_top_posts_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` int(10) UNSIGNED NOT NULL,
  `slug` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `little_content` text COLLATE utf8_unicode_ci,
  `content` longtext COLLATE utf8_unicode_ci NOT NULL,
  `post_category` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `is_top` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `post_categories`
--

CREATE TABLE `post_categories` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tagging_tagged`
--

CREATE TABLE `tagging_tagged` (
  `id` int(10) UNSIGNED NOT NULL,
  `taggable_id` int(10) UNSIGNED NOT NULL,
  `taggable_type` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `tag_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `tag_slug` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tagging_tags`
--

CREATE TABLE `tagging_tags` (
  `id` int(10) UNSIGNED NOT NULL,
  `slug` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `suggest` tinyint(1) NOT NULL DEFAULT '0',
  `count` int(10) UNSIGNED NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `terms`
--

CREATE TABLE `terms` (
  `id` int(10) UNSIGNED NOT NULL,
  `data` longtext COLLATE utf8_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `fb_id` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `profile_img` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT '/images/noavatar.png',
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `user_type` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `fb_id`, `profile_img`, `password`, `remember_token`, `created_at`, `updated_at`, `user_type`) VALUES
(1, 'Admin', 'admin@gmail.com', NULL, '/images/noavatar.png', '$2y$10$13sLAqPpaDmOQyvDs9GBe.XkFT2GnIcmb8hmKNIHjQ83bk3zkTChi', NULL, '2016-12-22 10:15:09', '2016-12-22 10:15:09', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `abouts`
--
ALTER TABLE `abouts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ads`
--
ALTER TABLE `ads`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ads_infos`
--
ALTER TABLE `ads_infos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contact_infos`
--
ALTER TABLE `contact_infos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `image_of_posts`
--
ALTER TABLE `image_of_posts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `image_of_posts_post_id_foreign` (`post_id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `posts_slug_unique` (`slug`),
  ADD KEY `posts_post_category_foreign` (`post_category`),
  ADD KEY `posts_user_id_foreign` (`user_id`);

--
-- Indexes for table `post_categories`
--
ALTER TABLE `post_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tagging_tagged`
--
ALTER TABLE `tagging_tagged`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tagging_tagged_taggable_id_index` (`taggable_id`),
  ADD KEY `tagging_tagged_taggable_type_index` (`taggable_type`),
  ADD KEY `tagging_tagged_tag_slug_index` (`tag_slug`);

--
-- Indexes for table `tagging_tags`
--
ALTER TABLE `tagging_tags`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tagging_tags_slug_index` (`slug`);

--
-- Indexes for table `terms`
--
ALTER TABLE `terms`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `abouts`
--
ALTER TABLE `abouts`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `ads`
--
ALTER TABLE `ads`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `ads_infos`
--
ALTER TABLE `ads_infos`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `contact_infos`
--
ALTER TABLE `contact_infos`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `image_of_posts`
--
ALTER TABLE `image_of_posts`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `post_categories`
--
ALTER TABLE `post_categories`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tagging_tagged`
--
ALTER TABLE `tagging_tagged`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tagging_tags`
--
ALTER TABLE `tagging_tags`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `terms`
--
ALTER TABLE `terms`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `image_of_posts`
--
ALTER TABLE `image_of_posts`
  ADD CONSTRAINT `image_of_posts_post_id_foreign` FOREIGN KEY (`post_id`) REFERENCES `posts` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `posts`
--
ALTER TABLE `posts`
  ADD CONSTRAINT `posts_post_category_foreign` FOREIGN KEY (`post_category`) REFERENCES `post_categories` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `posts_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
