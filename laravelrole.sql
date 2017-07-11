-- phpMyAdmin SQL Dump
-- version 4.0.10deb1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jul 11, 2017 at 10:35 AM
-- Server version: 5.5.55-0ubuntu0.14.04.1
-- PHP Version: 5.5.9-1ubuntu4.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `laravelrole`
--

-- --------------------------------------------------------

--
-- Table structure for table `assigntasks`
--

CREATE TABLE IF NOT EXISTS `assigntasks` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `task_id` int(10) unsigned NOT NULL,
  `member_id` int(10) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `assigntasks_task_id_foreign` (`task_id`),
  KEY `assigntasks_member_id_foreign` (`member_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `members`
--

CREATE TABLE IF NOT EXISTS `members` (
  `team_id` int(10) unsigned NOT NULL,
  `member_id` int(10) unsigned NOT NULL,
  KEY `members_team_id_foreign` (`team_id`),
  KEY `members_member_id_foreign` (`member_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `members`
--

INSERT INTO `members` (`team_id`, `member_id`) VALUES
(1, 11),
(2, 12),
(3, 14),
(4, 15),
(1, 16),
(2, 17),
(7, 18),
(5, 19),
(13, 21),
(16, 26),
(16, 27),
(17, 28);

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE IF NOT EXISTS `migrations` (
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`migration`, `batch`) VALUES
('2014_10_12_000000_create_users_table', 1),
('2014_10_12_100000_create_password_resets_table', 1),
('2016_06_23_051240_entrust_setup_tables', 2),
('2016_06_25_072050_create_teams_table', 3),
('2016_06_27_025413_create_members_table', 4),
('2016_07_08_105139_create_tasks_table', 5),
('2016_07_08_105201_create_assigntasks_table', 5);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  KEY `password_resets_email_index` (`email`),
  KEY `password_resets_token_index` (`token`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `password_resets`
--

INSERT INTO `password_resets` (`email`, `token`, `created_at`) VALUES
('veeraprasadsmart@gmail.com', '2595584daaa2765ce4e1588d58cddd82e442b51057c05f8201b46f77fbb7ab44', '2016-06-30 00:55:17');

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

CREATE TABLE IF NOT EXISTS `permissions` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `display_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `description` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `permissions_name_unique` (`name`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=5 ;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`id`, `name`, `display_name`, `description`, `created_at`, `updated_at`) VALUES
(1, 'manage-sites', 'Manage Sites and Channels', 'Can add edit or delete sites and channels', '2016-06-23 00:27:57', '2016-06-23 00:27:57'),
(2, 'manage-user', 'Edit Users', 'edit existing users', '2016-06-23 00:27:57', '2016-06-23 00:27:57'),
(3, 'manage-member', 'Edit member', 'can add edit or delete memeber', '2016-06-23 01:04:19', '2016-06-23 01:04:19'),
(4, 'manage-posts', 'Manage Posts', 'Can add edit posts', '2016-06-23 01:04:19', '2016-06-23 01:04:19');

-- --------------------------------------------------------

--
-- Table structure for table `permission_role`
--

CREATE TABLE IF NOT EXISTS `permission_role` (
  `permission_id` int(10) unsigned NOT NULL,
  `role_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`permission_id`,`role_id`),
  KEY `permission_role_role_id_foreign` (`role_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `permission_role`
--

INSERT INTO `permission_role` (`permission_id`, `role_id`) VALUES
(1, 1),
(2, 1),
(3, 3),
(4, 4);

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE IF NOT EXISTS `roles` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `display_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `description` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `roles_name_unique` (`name`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=5 ;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `display_name`, `description`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'User Administrator', 'User is allowed to manage and edit other users', '2016-06-23 00:27:57', '2016-06-23 00:27:57'),
(2, 'others', 'Other user', 'The default user', '2016-06-23 00:27:57', '2016-06-23 00:27:57'),
(3, 'company', 'Company', 'User is allowed to manage and edit members', '2016-06-23 01:04:19', '2016-06-23 01:04:19'),
(4, 'member', 'Member', 'User is allowed to manage and edit posts', '2016-06-23 01:04:19', '2016-06-23 01:04:19');

-- --------------------------------------------------------

--
-- Table structure for table `role_user`
--

CREATE TABLE IF NOT EXISTS `role_user` (
  `user_id` int(10) unsigned NOT NULL,
  `role_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`user_id`,`role_id`),
  KEY `role_user_role_id_foreign` (`role_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `role_user`
--

INSERT INTO `role_user` (`user_id`, `role_id`) VALUES
(1, 1),
(2, 2),
(6, 2),
(7, 2),
(23, 2),
(3, 3),
(4, 3),
(5, 3),
(8, 3),
(9, 3),
(13, 3),
(20, 3),
(22, 3),
(24, 3),
(25, 3);

-- --------------------------------------------------------

--
-- Table structure for table `tasks`
--

CREATE TABLE IF NOT EXISTS `tasks` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `user_id` int(10) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `tasks_user_id_foreign` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `teams`
--

CREATE TABLE IF NOT EXISTS `teams` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `user_id` int(10) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `teams_name_unique` (`name`),
  KEY `teams_user_id_foreign` (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=23 ;

--
-- Dumping data for table `teams`
--

INSERT INTO `teams` (`id`, `name`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 'Rails', 3, '2016-06-27 03:43:43', '2016-06-27 03:43:43'),
(2, 'Php', 3, '2016-06-27 03:55:15', '2016-06-27 03:55:15'),
(3, 'LaravelTeam', 13, '2016-06-29 22:58:48', '2016-06-29 22:58:48'),
(4, 'AnjularjsTeam', 13, '2016-06-29 22:59:07', '2016-06-29 22:59:07'),
(5, 'Python', 3, '2016-06-30 00:56:11', '2016-06-30 00:56:11'),
(6, 'ios ', 4, '2016-06-30 01:06:29', '2016-06-30 01:06:29'),
(7, 'Andriod', 4, '2016-06-30 01:06:43', '2016-06-30 01:06:43'),
(12, 'fsdfs', 4, '2016-06-30 01:08:12', '2016-06-30 01:08:12'),
(13, 'Haneef', 20, '2016-06-30 04:20:05', '2016-06-30 04:20:05'),
(16, 'hai', 25, '2016-07-03 23:51:55', '2016-07-03 23:51:55'),
(17, '1', 25, '2016-07-03 23:53:03', '2016-07-03 23:53:03'),
(19, '2', 25, '2016-07-04 00:04:54', '2016-07-04 00:04:54'),
(20, 'net', 24, '2016-07-04 00:14:38', '2016-07-04 00:14:38'),
(21, 'h', 25, '2016-07-04 00:15:04', '2016-07-04 00:15:04'),
(22, 'Android', 3, '2016-07-08 05:19:25', '2016-07-08 05:19:25');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `type` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=29 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `type`, `email`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'root45', 'admin', 'veeraprasadsmart@gmail.com', '$2y$10$ibOjGTm4mdlvP/dnC2HfCeiRpFSl3VYSdz4cE1ReVt2naLHYd98Wa', 'EjEYXMH7wg3vVjoAG7SptO29HUONYHhWyLCcuW9AtmdTmfiRRC93h5LlLsTI', '2016-06-23 00:27:57', '2016-07-15 01:24:06'),
(2, 'satyajan', 'others', 'satyajan999@gmail.com', '$2y$10$x16tGc5o.TKd58EcBK94OO/up9NToUgpKrYJuZM0lCohldMtV/tPe', 'Xz8Tw2qqDJKhvrl4ehPKOmBfG1vICYELMLQzwCo4tRg3dLgMgyI8TtMXPw1J', '2016-06-23 01:16:05', '2016-06-30 04:09:00'),
(3, 'RamsGroups', 'company', '12345678@gmail.com', '$2y$10$pqVyQHOTUCEWNQKlnCwAM.hVrM7AGAfJq6biOlu6ADAQ/V.ryNzua', 'dORGDuhoyaEG5BxpYZ31rxzPah2XVxyPWioQ0vk8OJQrvyDxohqplU8fO8wM', '2016-06-23 01:17:01', '2016-07-19 00:37:24'),
(4, 'JaGaDeesH', 'company', 'jagadeesh@gmail.com', '$2y$10$LKYG4/Bv5VYZOhsZxFTvg.j6//Pe4z2oS4V.4idSDL0Sz4X7M8J8u', 'LJHBsETxwt6JXm3Nv0oXyQdPhirn4FIm4OskXVJnUzQkoKkYeKa7xzn9FJgX', '2016-06-23 05:03:38', '2016-06-30 01:14:31'),
(5, 'manoharmano', 'company', 'manoharmano225@gmail.com', '$2y$10$Cv2rFtkvyNDf1VoHs2a9i.xXHcNMxBBJo7LGBNsSdY0LCI01iKHQC', 'xRTIIfv7QL2YUMzyQqaruiaXLEOm4AeKiNrOhh7mKsxPZEGMN6zW1rlW3oSn', '2016-06-23 23:54:33', '2016-06-30 04:20:50'),
(6, 'manohar', 'others', 'manohar_nyros@gmail.com', '$2y$10$dXga/XTRHu24kTyrSlv5NuzoQkdHn3WcarQZBdzfoNp.9xx84YLpi', 'pTngjkLY7VI7gBHauRSCQHhwjGmOwU6ofJVxNu2vbyiTwhGOkGM9aO8vUu7v', '2016-06-23 23:55:33', '2016-06-23 23:56:12'),
(7, 'venkatesh', 'others', 'venkatesh9918@gmail.com', '$2y$10$dQ8PMUyld3NKXrXsPu9h7e8dISCHauuxCkGvc7di1Rjysux56Ynoe', 'S531jXylOTG1FaetQHLTJuk9RqXmttXuEytbd6BxV14mwLnwJ88mKvI68iXr', '2016-06-24 21:09:28', '2016-06-24 21:11:18'),
(8, 'veeraprathap', 'company', 'aramakrishna_nyros@yahoo.com', '$2y$10$/52RDIth03b7LwNWMsDzNerVGYqq0sMx1A1xtaPHN8P1PjXs6YA4K', '1CgLeGX8gzwjsLIHLzjf3GklzRec8MFQlSg4SHHrXyqWVMCajYRtUyLE4UAN', '2016-06-24 21:10:21', '2016-06-24 21:48:41'),
(9, 'J', 'company', 'jagadeesh.jgn50@gmail.com', '$2y$10$hX6Cv/dHMPmhgb6Wz/x7new3iBw/mv/9G6xkMNG0SNK94wpZjtmC.', 'jUpoWJvqFy9nh0QXiydcIizTKLZb71gNCYXg3ZnucvdhNCoyJftBZA5aV1H3', '2016-06-27 01:40:46', '2016-06-27 01:42:55'),
(11, 'Rajesh', 'member', 'rajeshruby1@ruby.com', '$2y$10$tkES1dYkJbiNOuXYyeRczOHWPyyziHa84JbUn7b8VxYUVhgQEPg3W', 'ofnPtlrIwxJrGJyRMq0e2JWyfV0gWyykQFhdiwchzIuGK7L0Kp4nPsRNi34r', '2016-06-29 21:37:27', '2016-06-30 00:52:09'),
(12, 'pmem1', 'member', 'm1php@php.com', '$2y$10$a.fP8331bE56pIRqlCCpO.7nY14nfH7aAhwbHbhEOSHJuHsqVXbri', NULL, '2016-06-29 22:33:23', '2016-06-29 22:33:23'),
(13, 'nyros', 'company', 'veeraprasad_nyros@gmail.com', '$2y$10$Cp3IJ5Tg4/sSxw/3sP4.fu8rNqr3i1RA2KPfqLBc/llpn5QoDFY2m', 'wXi5nT1Jvz4kgplbiW4zFKqjdjFP5EmYl5ds06kqRLL1q2DurKThUqeJ8DUi', '2016-06-29 22:58:34', '2016-06-29 23:03:21'),
(14, 'lmem1', 'member', 'm1laravel@laravel.com', '$2y$10$.G2oSVNFwJggzf8dAK9Tseb/yu.IyjfS6r.7dw02kqJfAB.u.osuu', NULL, '2016-06-29 22:59:49', '2016-06-29 22:59:49'),
(15, 'anmem1', 'member', 'm1angular@angular.com', '$2y$10$Q2o.NpqEdxZLdQ/GYEQKvOU0lcdQfva0syGeaT9Fri55SJrA/3lOm', NULL, '2016-06-29 23:00:20', '2016-06-29 23:00:20'),
(16, 'rmember2', 'member', 'r2ruby@ruby.com', '$2y$10$MIJpdxaleloAxiwdnmBh7.MtFCSLC2Tko0YUx5ucc8DQRHtVcQDqC', 'iEBOlvftjHdv58sD0X3z39M1TJGu2Dv0NvvfUJ0i6oVh49UdDi5ZzUFa6OIu', '2016-06-29 23:18:01', '2016-06-30 01:07:04'),
(17, 'phpmember', 'member', 'm2php@php.com', '$2y$10$Shy3ajrXDVsM/jHDJCkwr.ygIYoMfgPcSHj0EqlDEI9FpdK5vnLK.', NULL, '2016-06-29 23:27:34', '2016-06-29 23:27:34'),
(18, 'vprasad', 'member', 'veeras@gmail.com', '$2y$10$m5TOMMAEvfLdcpXY61gAYetLM/pH0maNUCS81KbzbtdpWRWo5iX/q', NULL, '2016-06-30 01:08:03', '2016-06-30 05:25:20'),
(19, 'Swami', 'member', 'swamimem@python.com', '$2y$10$LCl.WsWuvA8OLZKEfojvQ.WcA4oREUMMLP8jF4hOcLgI6alKstUfi', NULL, '2016-06-30 04:14:21', '2016-06-30 04:14:21'),
(20, 'venkatesh', 'company', 'venky9918@gmail.com', '$2y$10$7cjv1Ggl1RbsPT5W/qvi9.02vyJWDsLTndm1iYf3pDcpGkJatwbiS', '05SVFTkPnK0zxR9m1LlfPhAsOHAd8EeJpwcTrfMx4Pnuy2UH1xFRu5JWbGuZ', '2016-06-30 04:19:19', '2016-06-30 04:20:47'),
(21, 'Haneef', 'member', 'haneef@gmail.com', '$2y$10$FMbD9uIKRSePCYgl6HkBZO1Q5x0NJdrcd2wltycBS2DlPDuPY9MWq', NULL, '2016-06-30 04:20:31', '2016-06-30 04:20:31'),
(22, 'ramkish', 'company', 'rkk@gmail.com', '$2y$10$XAhVIQnRVDboNWslrh6TBOsdg397xsBBg6oUdFA4M7SHwhLF7FuUy', 'CWjzBDgMWhEZM3SzTnxvsLiIWwN34pcwWZcqMoOCjXti2zaQkAfgjTTYE2yh', '2016-07-01 22:43:46', '2016-07-01 22:44:34'),
(23, 'sruthi', 'others', 'sruthik_nyros@yahoo.com', '$2y$10$Xv6Y6PcDwemh400mN4CI3ObJiKSIu8RQ28N5aDbNtt4W3PnItqSRm', 'mOn5r1Nn6PAaM5tkpKQBzhLkK7iJyMWZZVkE9gCtSeLZiLEl1ysaAbZzlKgY', '2016-07-03 23:39:32', '2016-07-03 23:39:46'),
(24, 'Sruthi', 'company', 'sruthik.nyros@gmail.com', '$2y$10$NZ8N4zzLQXUdgWA80gvmw.HxzVOnB9uJpjzYi6kWXfc2SeoLjdoBW', 'IU5IsEztejfxASdxaPWnSfIw2zo9y5wwnnAVbQENXJyWGd90mtGYaOMJPSH5', '2016-07-03 23:40:31', '2016-07-03 23:44:30'),
(25, '123', 'company', 'veeraprasad65@gmail.com', '$2y$10$xW.ayuh20MYH6x6wN2dolu4LcolGdM8Qa9oPK/N51FsqDgM.pPwZ6', 'a9HI09uaHRdkehPhEe3sctE5BMybb7lVZmXRz4CSCZEzTT4y6eFYT30ygODi', '2016-07-03 23:51:46', '2017-06-08 00:44:59'),
(26, '123', 'member', '', '$2y$10$MpvnSggb2xEg6Bzmy.qogujv/PDf9Q7mZayE.9csmmqA/4sTV.Tki', NULL, '2016-07-03 23:52:20', '2016-07-04 00:07:28'),
(27, '1234', 'member', '2@12345.com', '$2y$10$sTHPAn9/QB13QGP1so83R.k2t7h6kncxxAao/jM8qWzNoRZfMNjI6', NULL, '2016-07-03 23:52:50', '2016-07-04 00:08:11'),
(28, '859', 'member', '14@123.c0m', '$2y$10$vPZXF3vTEFwYyRc8RPWnj.CbHBf2sC9cIErFr.6/lo0EY4THTMyES', NULL, '2016-07-04 00:08:43', '2016-07-04 00:08:56');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `assigntasks`
--
ALTER TABLE `assigntasks`
  ADD CONSTRAINT `assigntasks_member_id_foreign` FOREIGN KEY (`member_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `assigntasks_task_id_foreign` FOREIGN KEY (`task_id`) REFERENCES `tasks` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `members`
--
ALTER TABLE `members`
  ADD CONSTRAINT `members_member_id_foreign` FOREIGN KEY (`member_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `members_team_id_foreign` FOREIGN KEY (`team_id`) REFERENCES `teams` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `permission_role`
--
ALTER TABLE `permission_role`
  ADD CONSTRAINT `permission_role_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `permission_role_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `role_user`
--
ALTER TABLE `role_user`
  ADD CONSTRAINT `role_user_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `role_user_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tasks`
--
ALTER TABLE `tasks`
  ADD CONSTRAINT `tasks_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `teams`
--
ALTER TABLE `teams`
  ADD CONSTRAINT `teams_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
