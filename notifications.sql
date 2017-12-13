-- phpMyAdmin SQL Dump
-- version 4.7.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Dec 13, 2017 at 02:29 AM
-- Server version: 5.7.19
-- PHP Version: 7.1.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `notifications`
--

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `id` int(10) UNSIGNED NOT NULL,
  `sender_id` int(10) UNSIGNED NOT NULL,
  `recipient_id` int(10) UNSIGNED NOT NULL,
  `body` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `messages`
--

INSERT INTO `messages` (`id`, `sender_id`, `recipient_id`, `body`, `created_at`, `updated_at`) VALUES
(1, 1, 3, 'test', '2017-12-07 09:59:41', '2017-12-07 09:59:41'),
(2, 1, 3, 'asdas', '2017-12-07 10:01:57', '2017-12-07 10:01:57'),
(3, 1, 2, 'asdasd', '2017-12-07 10:02:09', '2017-12-07 10:02:09'),
(4, 1, 2, 'sdfsd', '2017-12-07 10:29:06', '2017-12-07 10:29:06'),
(5, 1, 2, 'asdas', '2017-12-08 03:50:40', '2017-12-08 03:50:40'),
(6, 1, 2, 'asdasd', '2017-12-08 03:50:47', '2017-12-08 03:50:47'),
(7, 1, 2, 'qwe', '2017-12-10 07:04:51', '2017-12-10 07:04:51'),
(8, 1, 3, 'sd', '2017-12-10 10:12:38', '2017-12-10 10:12:38');

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
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2017_12_07_035051_create_messages_table', 2),
(4, '2017_12_07_040949_create_notifications_table', 3),
(5, '2017_12_10_024906_create_posts_table', 4);

-- --------------------------------------------------------

--
-- Table structure for table `notifications`
--

CREATE TABLE `notifications` (
  `id` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `notifiable_id` int(10) UNSIGNED NOT NULL,
  `notifiable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `data` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `read_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `notifications`
--

INSERT INTO `notifications` (`id`, `type`, `notifiable_id`, `notifiable_type`, `data`, `read_at`, `created_at`, `updated_at`) VALUES
('69ff1d8b-99ee-45c4-b393-ef08c9657e0d', 'App\\Notifications\\MessageSent', 3, 'App\\User', '{\"link\":\"http:\\/\\/notifications.dev:8080\\/messages\\/8\",\"text\":\"Mensaje de Marcos V\"}', NULL, '2017-12-10 10:12:45', '2017-12-10 10:12:45'),
('90b07ccd-0806-4a65-95bf-0695736853f3', 'App\\Notifications\\MessageSent', 2, 'App\\User', '{\"link\":\"http:\\/\\/notifications.dev:8080\\/messages\\/6\",\"text\":\"Mensaje de Marcos V\"}', '2017-12-08 04:07:42', '2017-12-08 03:50:47', '2017-12-08 04:07:42'),
('a6ebe2f6-26fe-487c-93ec-437de02a6f78', 'App\\Notifications\\MessageSent', 2, 'App\\User', '{\"link\":\"http:\\/\\/notifications.dev:8080\\/messages\\/7\",\"text\":\"Mensaje de Marcos V\"}', NULL, '2017-12-10 07:04:59', '2017-12-10 07:04:59');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `body` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `title`, `body`, `created_at`, `updated_at`) VALUES
(25, 'Error eos eaque mollitia nulla officia alias aut et.', 'Officiis et mollitia ipsam vitae et repellendus officia. Quibusdam atque quis in vel qui. Eius est ducimus quaerat officiis vel. Natus placeat ullam qui quo ut debitis.', '2017-12-10 12:00:05', '2017-12-10 12:00:05'),
(26, 'Impedit molestias reiciendis adipisci veritatis laborum.', 'In voluptatem eaque tenetur excepturi qui. Inventore modi aspernatur consectetur iste. Iure eveniet laborum rerum. Quod neque aut non libero optio. Similique omnis est vel voluptatibus.', '2017-12-10 12:17:05', '2017-12-10 12:17:05'),
(27, 'Repellat porro praesentium modi omnis itaque aut.', 'Facilis tempora deserunt neque exercitationem quidem. Ipsa qui quod unde eveniet facere eligendi voluptatem. Facilis quia ut ea vel repudiandae harum.', '2017-12-10 12:28:04', '2017-12-10 12:28:04'),
(28, 'Voluptatibus sapiente odio voluptas architecto illo.', 'Dolor occaecati in natus quidem qui est dolores tempore. Consectetur temporibus placeat magni eos soluta eligendi. Delectus eveniet atque vel sed porro.', '2017-12-10 12:28:08', '2017-12-10 12:28:08'),
(29, 'Temporibus repellat commodi ea laudantium nihil.', 'Voluptatem ut sapiente id assumenda similique ea. Aut asperiores et sed sint asperiores enim ullam. Consequuntur accusantium quos vitae quas et laborum voluptatem tempore. Eaque provident consequuntur perferendis aut iste et.', '2017-12-10 12:38:15', '2017-12-10 12:38:15'),
(30, 'Dolorem voluptas nulla consequatur eligendi.', 'Qui porro officia voluptas repellat quibusdam tempore. Consequatur quis asperiores et aspernatur quibusdam libero molestiae sit. Aut quam possimus et temporibus eius molestiae. Consequuntur qui odit modi.', '2017-12-10 12:40:14', '2017-12-10 12:40:14');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Marcos V', 'marukosu16@gmail.com', '$2y$10$as0KFWV6QgPSYHmpH42IvejMiEqSG2Adk6mxQEtw6kXkENqfbpJ.i', 'LINJvHreXEzs36o2NhO3rrsEvMn5SmZTjoOFHUHq735yuNHWkMjNzNH4GzXZ', '2017-12-07 02:55:44', '2017-12-07 02:55:44'),
(2, 'Miss Alayna Cruickshank', 'xlindgren@example.org', '$2y$10$c156O/w.fHlIaTibzvds7On9zk7bsHcQOK0MEKGqbXDCIo5XVapZO', 'CDBFP93Qgn', '2017-12-07 09:32:56', '2017-12-07 09:32:56'),
(3, 'Mayra Crooks', 'herzog.cale@example.com', '$2y$10$c156O/w.fHlIaTibzvds7On9zk7bsHcQOK0MEKGqbXDCIo5XVapZO', '2b3tXF1zOK', '2017-12-07 09:32:56', '2017-12-07 09:32:56'),
(4, 'Valentin Kunze', 'lavonne.cormier@example.org', '$2y$10$c156O/w.fHlIaTibzvds7On9zk7bsHcQOK0MEKGqbXDCIo5XVapZO', 'zFZhY4OiPc', '2017-12-07 09:32:56', '2017-12-07 09:32:56'),
(5, 'Prof. Waldo DuBuque', 'pgreenholt@example.com', '$2y$10$c156O/w.fHlIaTibzvds7On9zk7bsHcQOK0MEKGqbXDCIo5XVapZO', 'inuzt5JfM2', '2017-12-07 09:32:56', '2017-12-07 09:32:56'),
(6, 'Conor Kessler', 'sally.marks@example.com', '$2y$10$c156O/w.fHlIaTibzvds7On9zk7bsHcQOK0MEKGqbXDCIo5XVapZO', 'UxhswuJBpg', '2017-12-07 09:32:56', '2017-12-07 09:32:56'),
(7, 'Mrs. Willa Lemke IV', 'giovanny60@example.org', '$2y$10$c156O/w.fHlIaTibzvds7On9zk7bsHcQOK0MEKGqbXDCIo5XVapZO', 'Zcxx6igXGq', '2017-12-07 09:32:56', '2017-12-07 09:32:56'),
(8, 'Brenda Greenholt', 'yost.annamae@example.org', '$2y$10$c156O/w.fHlIaTibzvds7On9zk7bsHcQOK0MEKGqbXDCIo5XVapZO', 'oMxjB8b1bV', '2017-12-07 09:32:56', '2017-12-07 09:32:56'),
(9, 'Miss Kylee Lesch', 'ofarrell@example.net', '$2y$10$c156O/w.fHlIaTibzvds7On9zk7bsHcQOK0MEKGqbXDCIo5XVapZO', 'bnXcWOAm61', '2017-12-07 09:32:57', '2017-12-07 09:32:57'),
(10, 'Prof. Mauricio Abshire MD', 'hbecker@example.net', '$2y$10$c156O/w.fHlIaTibzvds7On9zk7bsHcQOK0MEKGqbXDCIo5XVapZO', 'ynSlkIeFC3', '2017-12-07 09:32:57', '2017-12-07 09:32:57'),
(11, 'Prof. Hester Boehm', 'fbailey@example.com', '$2y$10$c156O/w.fHlIaTibzvds7On9zk7bsHcQOK0MEKGqbXDCIo5XVapZO', 'qtkfbHUBMy', '2017-12-07 09:32:57', '2017-12-07 09:32:57'),
(12, 'Danny Stanton', 'janet.lang@example.org', '$2y$10$c156O/w.fHlIaTibzvds7On9zk7bsHcQOK0MEKGqbXDCIo5XVapZO', 'BLAoICxF2m', '2017-12-07 09:32:57', '2017-12-07 09:32:57');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notifications`
--
ALTER TABLE `notifications`
  ADD PRIMARY KEY (`id`),
  ADD KEY `notifications_notifiable_id_notifiable_type_index` (`notifiable_id`,`notifiable_type`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
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
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
