-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 04, 2024 at 06:22 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `usk_shop`
--

-- --------------------------------------------------------

--
-- Table structure for table `addresses`
--

CREATE TABLE `addresses` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `order_id` bigint(20) UNSIGNED NOT NULL,
  `nama` varchar(255) DEFAULT NULL,
  `no_hp` varchar(255) DEFAULT NULL,
  `alamat` text DEFAULT NULL,
  `kota` varchar(255) DEFAULT NULL,
  `kode_pos` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `addresses`
--

INSERT INTO `addresses` (`id`, `order_id`, `nama`, `no_hp`, `alamat`, `kota`, `kode_pos`, `created_at`, `updated_at`) VALUES
(12, 15, 'Kaf', '0812345678', 'Jl. Delima', 'Kota Banda Aceh', '23121', '2024-06-01 05:44:41', '2024-06-01 05:44:41'),
(14, 17, 'Jennie Ruby Jane', '081392738333', 'Jl. Merderka', 'Kota Banda Aceh', '17892', '2024-06-01 06:05:22', '2024-06-01 06:05:22'),
(15, 18, 'Jennie Ruby Jane', '081392738333', 'Jl. Merderka', 'Kota Banda Aceh', '17892', '2024-06-02 04:05:53', '2024-06-02 04:05:53');

-- --------------------------------------------------------

--
-- Table structure for table `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) NOT NULL,
  `value` mediumtext NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cache`
--

INSERT INTO `cache` (`key`, `value`, `expiration`) VALUES
('356a192b7913b04c54574d18c28d46e6395428ab', 'i:1;', 1716958589),
('356a192b7913b04c54574d18c28d46e6395428ab:timer', 'i:1716958589;', 1716958589),
('a17961fa74e9275d529f489537f179c05d50c2f3', 'i:1;', 1717324377),
('a17961fa74e9275d529f489537f179c05d50c2f3:timer', 'i:1717324377;', 1717324377);

-- --------------------------------------------------------

--
-- Table structure for table `cache_locks`
--

CREATE TABLE `cache_locks` (
  `key` varchar(255) NOT NULL,
  `owner` varchar(255) NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `gambar` varchar(255) DEFAULT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `slug`, `gambar`, `is_active`, `created_at`, `updated_at`) VALUES
(1, 'Clothes', 'clothes', 'categories/01HY8B4JKW1A0JBRGZA5S6DF0F.png', 1, '2024-05-19 04:52:34', '2024-05-19 04:52:34'),
(3, 'Merchs', 'merchs', 'categories/01HYF2MDCDDH5PK7ND13WJGS8X.png', 1, '2024-05-21 19:38:37', '2024-05-26 22:01:57'),
(4, 'Printing', 'printing', 'categories/01HYQMVMNAEKGPKRVM1RA91168.png', 1, '2024-05-25 03:31:04', '2024-05-25 03:31:04'),
(5, 'Gifts', 'gifts', 'categories/01HYQMZ8BXH5CYHF9MGFARRDNB.png', 1, '2024-05-25 03:33:02', '2024-05-25 03:33:02');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `queue` varchar(255) NOT NULL,
  `payload` longtext NOT NULL,
  `attempts` tinyint(3) UNSIGNED NOT NULL,
  `reserved_at` int(10) UNSIGNED DEFAULT NULL,
  `available_at` int(10) UNSIGNED NOT NULL,
  `created_at` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `job_batches`
--

CREATE TABLE `job_batches` (
  `id` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `total_jobs` int(11) NOT NULL,
  `pending_jobs` int(11) NOT NULL,
  `failed_jobs` int(11) NOT NULL,
  `failed_job_ids` longtext NOT NULL,
  `options` mediumtext DEFAULT NULL,
  `cancelled_at` int(11) DEFAULT NULL,
  `created_at` int(11) NOT NULL,
  `finished_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '0001_01_01_000000_create_users_table', 1),
(2, '0001_01_01_000001_create_cache_table', 1),
(3, '0001_01_01_000002_create_jobs_table', 1),
(4, '2024_05_19_113018_create_categories_table', 2),
(5, '2024_05_19_113102_create_products_table', 2),
(6, '2024_05_19_113110_create_orders_table', 2),
(7, '2024_05_19_113117_create_order_items_table', 2),
(8, '2024_05_19_113124_create_addresses_table', 2);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `total_bayar` decimal(10,2) DEFAULT NULL,
  `metode_pembayaran` varchar(255) DEFAULT NULL,
  `status_pembayaran` varchar(255) DEFAULT NULL,
  `status` enum('new','processing','shipped','deliverd','canceled') NOT NULL DEFAULT 'new',
  `mata_uang` varchar(255) DEFAULT NULL,
  `jumlah` decimal(10,2) DEFAULT NULL,
  `shipping_method` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `user_id`, `total_bayar`, `metode_pembayaran`, `status_pembayaran`, `status`, `mata_uang`, `jumlah`, `shipping_method`, `created_at`, `updated_at`) VALUES
(15, 11, 65000.00, 'bca', 'paid', 'new', NULL, NULL, 'none', '2024-06-01 05:44:41', '2024-06-01 20:39:24'),
(17, 13, 319000.00, 'bca', 'paid', 'processing', NULL, NULL, 'none', '2024-06-01 06:05:22', '2024-06-01 20:48:45'),
(18, 13, 100000.00, 'bsi', 'paid', 'shipped', NULL, NULL, 'shopeexpress', '2024-06-02 04:05:53', '2024-06-02 04:08:41');

-- --------------------------------------------------------

--
-- Table structure for table `order_items`
--

CREATE TABLE `order_items` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `order_id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `quantity` int(11) NOT NULL DEFAULT 1,
  `jumlah_unit` decimal(10,2) DEFAULT NULL,
  `jumlah_total` decimal(10,2) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `order_items`
--

INSERT INTO `order_items` (`id`, `order_id`, `product_id`, `quantity`, `jumlah_unit`, `jumlah_total`, `created_at`, `updated_at`) VALUES
(15, 15, 11, 1, 65000.00, 65000.00, '2024-06-01 05:44:41', '2024-06-01 05:44:41'),
(17, 17, 1, 2, 259000.00, 259000.00, '2024-06-01 06:05:22', '2024-06-01 06:05:22'),
(18, 17, 4, 1, 20000.00, 20000.00, '2024-06-01 06:05:22', '2024-06-01 06:05:22'),
(19, 17, 9, 1, 40000.00, 40000.00, '2024-06-01 06:05:22', '2024-06-01 06:05:22'),
(20, 18, 2, 2, 50000.00, 100000.00, '2024-06-02 04:05:53', '2024-06-02 04:05:53');

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `gambar` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`gambar`)),
  `description` longtext DEFAULT NULL,
  `price` decimal(10,2) NOT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT 1,
  `is_featured` tinyint(1) NOT NULL DEFAULT 0,
  `in_stock` tinyint(1) NOT NULL DEFAULT 1,
  `on_sale` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `category_id`, `name`, `slug`, `gambar`, `description`, `price`, `is_active`, `is_featured`, `in_stock`, `on_sale`, `created_at`, `updated_at`) VALUES
(1, 1, 'USK Hoodie', 'usk-hoodie', '\"products\\/01HY8BDSGF3F95KCDZXJX7ASRQ.png\"', 'Wrap yourself in comfort and style with our Classic University Logo Hoodie. Crafted from premium-quality cotton blend fabric, this hoodie offers a soft and cozy feel, perfect for those chilly mornings or relaxed evenings on campus.', 259000.00, 1, 0, 1, 0, '2024-05-19 04:57:36', '2024-05-26 22:31:22'),
(2, 1, 'USK Shirt', 'usk-shirt', '\"products\\/01HY8BRAWWXPNFEQZ9AD4MASM2.png\"', 'The USK Shirt is the epitome of cool and comfort for those seeking effortless style all day long. Crafted from high-quality materials, this shirt offers the perfect blend of style and comfort. Its trendy design will make you stand out on any occasion, whether it\'s a casual hangout with friends or a formal event. Available in a variety of colors and sizes, the USK Shirt is suitable for everyone and can be a staple in your wardrobe. Make a strong fashion statement with the USK Shirt!', 50000.00, 1, 0, 1, 0, '2024-05-19 05:03:22', '2024-05-26 22:48:55'),
(4, 3, 'Totebag', 'totebag', '\"products\\/01HYF2PEK9ZGS875T4EGVA7XSK.png\"', 'Introducing our versatile and stylish totebag, perfect for carrying your essentials with flair. Crafted from durable materials, our totebag combines functionality with fashion. Whether you\'re heading to work, running errands, or hitting the gym, this totebag is your perfect companion. With its spacious interior and sturdy straps, it can hold everything you need while keeping you looking chic. Available in a range of designs and colors to suit your personal style, our totebag is a must-have accessory for any occasion. Upgrade your everyday carry with our fashionable and practical totebag!', 20000.00, 1, 1, 1, 1, '2024-05-21 19:39:44', '2024-05-26 22:49:36'),
(5, 1, 'Almamater', 'almamater', '\"products\\/01HYYTJSKX77J697T5DMJC7S0N.png\"', 'The USK Alma Mater Jacket is a symbol of pride and tradition, perfect for students and alumni who want to showcase their affiliation with distinction. Made from premium materials, this jacket offers a combination of style, comfort, and durability. Its classic design features the USK emblem prominently, ensuring you stand out with a look that speaks of heritage and prestige. Ideal for campus events, alumni gatherings, or everyday wear, the USK Alma Mater Jacket is available in various sizes to fit all. Wear it with pride and let your school spirit shine through with the USK Alma Mater Jacket!', 250000.00, 1, 0, 1, 0, '2024-05-27 22:25:46', '2024-05-27 22:25:46'),
(6, 4, 'Note Book', 'note-book', '\"products\\/01HYYTMCH6YCCAYDTSXHFYYJZZ.png\"', 'The USK Notebook is an essential companion for students, professionals, and anyone who loves to jot down their thoughts. Made from high-quality paper, this notebook offers a smooth writing experience, perfect for taking notes, sketching, or journaling. Its sturdy cover ensures durability, protecting your notes from wear and tear. With a sleek and minimalist design, the USK Notebook is both functional and stylish, making it ideal for any setting, whether it\'s the classroom, office, or home. Available in various sizes and page formats, this notebook meets all your writing needs. Stay organized and inspired with the USK Notebook!', 15000.00, 1, 1, 1, 0, '2024-05-27 22:26:38', '2024-05-27 22:26:38'),
(7, 3, 'Phone Case', 'phone-case', '\"products\\/01HYYTNJ62GQPBJZDKRVYPQFZE.png\"', 'Introducing the USK Phone Case, the perfect blend of protection and style for your device. Designed with precision, this phone case offers robust protection against everyday bumps and scratches while maintaining a sleek and modern look. Made from high-quality, durable materials, the USK Phone Case ensures your phone stays safe and secure. Its slim profile allows for easy handling and fits comfortably in your pocket or bag. With various designs and colors available, you can personalize your phone to match your unique style. Elevate your phone\'s protection and aesthetics with the USK Phone Case!', 50000.00, 1, 0, 1, 0, '2024-05-27 22:27:17', '2024-05-27 22:27:17'),
(8, 3, 'Tumblr', 'tumblr', '\"products\\/01HYYTQ366X8VCN0QNJRNM3ASK.png\"', 'Introducing the USK Tumbler, the ultimate companion for your beverages on the go. Crafted from premium stainless steel, this tumbler is designed to keep your drinks at the perfect temperature for hours, whether hot or cold. Its sleek, ergonomic design ensures a comfortable grip, while the spill-proof lid makes it convenient for travel, work, or outdoor activities. The USK Tumbler features a stylish exterior with the USK logo, reflecting both elegance and functionality. Available in a variety of colors, it’s the perfect accessory to match your personal style. Stay hydrated and enjoy your favorite drinks in style with the USK Tumbler!', 70000.00, 1, 0, 1, 0, '2024-05-27 22:28:07', '2024-05-27 22:28:07'),
(9, 5, 'Parfume', 'parfume', '\"products\\/01HYYTRFXTT3RERW5CG1JGNCVJ.png\"', 'Introducing the USK Perfume, an exquisite fragrance designed to captivate and leave a lasting impression. Crafted with a blend of premium ingredients, this perfume offers a unique and sophisticated scent that evolves beautifully throughout the day. The top notes provide a fresh and invigorating burst, leading to a heart of floral and spicy accords, and finally settling into a warm, woody base. Encased in an elegant bottle that reflects the luxury and refinement of the fragrance within, the USK Perfume is perfect for any occasion, whether it\'s a special event or everyday wear. Elevate your scent game and make a memorable statement with the USK Perfume!', 40000.00, 1, 0, 1, 0, '2024-05-27 22:28:53', '2024-05-27 22:28:53'),
(10, 1, 'USK Jacket', 'usk-jacket', '\"products\\/01HYYTX9NJXCGH42PFHNHCAX8C.png\"', 'Introducing the USK Jacket, a perfect blend of style and functionality for all seasons. Crafted from high-quality materials, this jacket ensures both comfort and durability, making it a versatile addition to your wardrobe. The USK Jacket features a sleek design with the USK emblem proudly displayed, making it a stylish way to show your affiliation. It comes equipped with multiple pockets for convenience, a comfortable lining for added warmth, and a sturdy zipper for easy wear. Available in various sizes and colors, the USK Jacket is suitable for any occasion, whether it\'s a casual outing or a formal event. Stay warm, look sharp, and represent your pride with the USK Jacket!', 200000.00, 1, 0, 1, 0, '2024-05-27 22:29:42', '2024-05-28 21:54:31'),
(11, 3, 'Bag', 'bag', '\"products\\/01HYYTVXNM1MFZXZP1F3H96QVF.png\"', 'Introducing the USK Backpack, the perfect blend of style, comfort, and functionality for your everyday adventures. Crafted from durable materials, this backpack is built to withstand the rigors of daily use while keeping your belongings safe and organized. Its spacious main compartment offers ample storage for your books, laptop, and other essentials, while multiple pockets and compartments provide easy access to smaller items. The ergonomic design and padded straps ensure a comfortable fit, whether you\'re commuting to school, work, or exploring the outdoors. With its sleek design and the USK logo subtly displayed, the USK Backpack is not just a practical accessory but also a stylish statement of your affiliation. Upgrade your carrying experience and stay prepared for whatever the day brings with the USK Backpack!', 65000.00, 1, 0, 1, 1, '2024-05-27 22:30:45', '2024-05-27 22:30:45');

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) DEFAULT NULL,
  `user_agent` text DEFAULT NULL,
  `payload` longtext NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('78K6a7NaNCHyPRSX0GO9FdIJcEVRsBhT88aXF6kS', 11, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/125.0.0.0 Safari/537.36 Edg/125.0.0.0', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiUU9tZENSOTVsT2ROR2Rxc1B1U09jMkdaWnNwU1V1czZGeUJPVGkxYSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjE6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMCI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fXM6NTA6ImxvZ2luX3dlYl81OWJhMzZhZGRjMmIyZjk0MDE1ODBmMDE0YzdmNThlYTRlMzA5ODlkIjtpOjExO30=', 1717418251);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Admin', 'admin@gmail.com', NULL, '$2y$12$DS12kNq.niNQOo9TvC5cnOTqEm44WZmJYV97R77lh4ABAGKOcNPIu', NULL, '2024-05-19 04:43:13', '2024-05-19 04:43:13'),
(11, 'kaf', 'kaf@gmail.com', NULL, '$2y$12$wYRbpJN4M8mIXqp2s4nGZOehUugsfdVOHIWtaKJV5MfIuL7fMzeB2', 'hw0DDgWoy8avj879EZRxsb9mvBLEsYTsOph08BtQ8SkoMKhvcHQ5feXZGQIE', '2024-05-30 03:56:36', '2024-05-30 04:47:15'),
(12, 'Ilzam', 'ilzam@gmail.com', NULL, '$2y$12$0OrDdZugZBG3BxU6.NR8w.g07JTbV0QYqHamjnsI1cuW/v..unLMe', NULL, '2024-05-30 04:54:37', '2024-05-30 04:54:37'),
(13, 'Jennie Ruby Jane', 'jennie@gmail.com', NULL, '$2y$12$lrbjNc2FCjJTF3Bd7P2hru4ZBXDmlHsw7yGJqrZycF9T6mZQlL86K', NULL, '2024-06-01 06:03:54', '2024-06-01 06:03:54');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `addresses`
--
ALTER TABLE `addresses`
  ADD PRIMARY KEY (`id`),
  ADD KEY `addresses_order_id_foreign` (`order_id`);

--
-- Indexes for table `cache`
--
ALTER TABLE `cache`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `cache_locks`
--
ALTER TABLE `cache_locks`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `categories_slug_unique` (`slug`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`);

--
-- Indexes for table `job_batches`
--
ALTER TABLE `job_batches`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `orders_user_id_foreign` (`user_id`);

--
-- Indexes for table `order_items`
--
ALTER TABLE `order_items`
  ADD PRIMARY KEY (`id`),
  ADD KEY `order_items_order_id_foreign` (`order_id`),
  ADD KEY `order_items_product_id_foreign` (`product_id`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `products_slug_unique` (`slug`),
  ADD KEY `products_category_id_foreign` (`category_id`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

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
-- AUTO_INCREMENT for table `addresses`
--
ALTER TABLE `addresses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `order_items`
--
ALTER TABLE `order_items`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `addresses`
--
ALTER TABLE `addresses`
  ADD CONSTRAINT `addresses_order_id_foreign` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `order_items`
--
ALTER TABLE `order_items`
  ADD CONSTRAINT `order_items_order_id_foreign` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `order_items_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
