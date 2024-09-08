-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 08, 2024 at 05:52 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sukseskontraktor`
--

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2024_03_02_163857_create_products_table', 1),
(6, '2024_06_20_072618_create_orders_table', 1),
(7, '2024_08_25_173607_add_created_by_and_updated_by_to_products_table', 2);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `customer_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `customer_email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `customer_phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `months_rented` int(11) NOT NULL,
  `status_payment` enum('pending','paid','failed') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'pending',
  `status_product` enum('pending','rented','returned') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'rented',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `code` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` decimal(15,2) NOT NULL,
  `image_url` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `category` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `available_stock` int(11) NOT NULL,
  `manufacturer` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_number` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `warranty_months` int(11) NOT NULL DEFAULT 0,
  `weight` decimal(8,2) DEFAULT NULL,
  `dimensions` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_by` bigint(20) UNSIGNED DEFAULT NULL,
  `updated_by` bigint(20) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `code`, `name`, `price`, `image_url`, `description`, `category`, `available_stock`, `manufacturer`, `model_number`, `warranty_months`, `weight`, `dimensions`, `created_at`, `updated_at`, `created_by`, `updated_by`) VALUES
(1, 'PROD-7XQ9D8K3W', 'Dump Truck', '15000000.00', 'io358M0QQe_1719555272.jpeg', 'Dump Truck dengan kapasitas minimal 3.5 Ton.', 'Konstruksi', 1, 'Produsen A', 'Model DT1', 12, '3500.00', '8x3x3.5', '2024-06-27 23:13:49', '2024-06-27 23:14:32', NULL, NULL),
(2, 'PROD-G3T8F9L1P', 'Excavator', '25000000.00', 'tAcA08n9hB_1719555281.jpeg', 'Excavator dengan kapasitas 80-140 HP.', 'Konstruksi', 1, 'Produsen B', 'Model EX1', 12, '20000.00', '6x2.5x3', '2024-06-27 23:13:49', '2024-06-27 23:14:41', NULL, NULL),
(3, 'PROD-V2N4B7K9J', 'Motor Grader', '35000000.00', 'L5mNDvV97i_1719555290.jpeg', 'Motor Grader dengan kapasitas lebih dari 100 HP.', 'Konstruksi', 1, 'Produsen C', 'Model MG1', 18, '18000.00', '6x2.5x3', '2024-06-27 23:13:49', '2024-06-27 23:14:50', NULL, NULL),
(4, 'PROD-R6P9H2F4M', 'Wheel Loader', '20000000.00', 'XLqgH3udhO_1719555300.jpeg', 'Wheel Loader dengan kapasitas 1.0-1.6 M3.', 'Konstruksi', 3, 'Produsen D', 'Model WL1', 6, '15000.00', '5x2x2.5', '2024-06-27 23:13:49', '2024-06-27 23:15:00', NULL, NULL),
(5, 'PROD-J8Y7T3C1L', 'Tandem Roller', '18000000.00', 'GqggMtqkhi_1719555309.jpeg', 'Tandem Roller dengan kapasitas 6-8 Ton.', 'Konstruksi', 4, 'Produsen E', 'Model TR1', 12, '7000.00', '4x2x2.5', '2024-06-27 23:13:49', '2024-06-27 23:15:09', NULL, NULL),
(6, 'PROD-X4Z3B2N7K', 'Vibratory Roller', '20000000.00', 'nafq3M8LL9_1719555318.jpg', 'Vibratory Roller dengan kapasitas 5-8 Ton.', 'Konstruksi', 6, 'Produsen F', 'Model VR1', 12, '6500.00', '4x2x2.5', '2024-06-27 23:13:49', '2024-06-27 23:15:18', NULL, NULL),
(7, 'PROD-P1H8D6F9J', 'Asphalt Sprayer', '12000000.00', '2rmeplmYm6_1719555327.jpeg', 'Asphalt Sprayer dengan kapasitas 850 Liter.', 'Konstruksi', 8, 'Produsen G', 'Model AS1', 12, '850.00', '3x1.5x2', '2024-06-27 23:13:49', '2024-06-27 23:15:27', NULL, NULL),
(8, 'PROD-K5L3T9Q2X', 'Concrete Mixer', '10000000.00', 'QoxKfNcETX_1719555336.jpeg', 'Concrete Mixer dengan kapasitas 0,3-0,6 M3.', 'Konstruksi', 10, 'Produsen H', 'Model CM1', 12, '500.00', '2.5x1.5x2', '2024-06-27 23:13:49', '2024-06-27 23:15:36', NULL, NULL),
(9, 'PROD-N9Y2G6B8W', 'Water Tanker', '15000000.00', 'O6j7BIplHV_1719555357.jpeg', 'Water Tanker dengan kapasitas 3000-4500 Liter.', 'Konstruksi', 5, 'Produsen I', 'Model WT1', 12, '4000.00', '6x2.5x3', '2024-06-27 23:13:49', '2024-06-27 23:15:57', NULL, NULL),
(10, 'PROD-T6M1F8Z3P', 'Backhoe Loader', '22000000.00', 'nJbiIDoyB8_1719555415.jpeg', 'Backhoe Loader digunakan untuk menggali dan memuat material.', 'Konstruksi', 7, 'Produsen J', 'Model BL1', 12, '8000.00', '5.5x2x3', '2024-06-27 23:13:49', '2024-06-27 23:16:55', NULL, NULL),
(11, 'PROD-V3F9T5K2H', 'Skid Steer Loader', '16000000.00', '8rJ3kwI3AO_1719555439.jpeg', 'Skid Steer Loader digunakan untuk pekerjaan kecil dan cepat.', 'Konstruksi', 6, 'Produsen K', 'Model SS1', 12, '3000.00', '3.5x1.5x2.5', '2024-06-27 23:13:49', '2024-06-27 23:17:19', NULL, NULL),
(12, 'PROD-L7X8P3C9N', 'Crawler Loader', '28000000.00', 'WwjgNt9AFD_1719555525.jpeg', 'Crawler Loader digunakan untuk menggali dan memuat material di medan berat.', 'Konstruksi', 4, 'Produsen L', 'Model CL1', 12, '25000.00', '7x2.5x3.5', '2024-06-27 23:13:49', '2024-06-27 23:18:45', NULL, NULL),
(13, 'PROD-Q4W1J2M7Y\n', 'Paver', '30000000.00', '2gfofZUr2o_1719555566.jpeg', 'Paver digunakan untuk meratakan aspal pada jalan.', 'Konstruksi', 5, 'Produsen M', 'Model P1', 12, '9000.00', '5x2.5x3', '2024-06-27 23:13:49', '2024-06-27 23:19:26', NULL, NULL),
(14, 'PROD-F9H2T8L5X', 'Scraper', '25000000.00', 'Qy4z7D0mSH_1719555595.jpeg', 'Scraper digunakan untuk memotong, menggali, dan memuat tanah.', 'Konstruksi', 4, 'Produsen N', 'Model S1', 12, '22000.00', '6.5x2.5x3.5', '2024-06-27 23:13:49', '2024-06-27 23:19:55', NULL, NULL),
(15, 'PROD-Y1K8B6Q2J', 'Telehandler', '18000000.00', 'D4p4lzjt3v_1719555652.jpeg', 'Telehandler digunakan untuk mengangkat material ke tempat yang tinggi.', 'Konstruksi', 6, 'Produsen O', 'Model T1', 12, '11000.00', '4.5x2.5x3', '2024-06-27 23:13:50', '2024-06-27 23:20:52', NULL, NULL),
(16, 'PROD-M4X9P7G2T', 'Trencher', '14000000.00', 'IJBuEreFA1_1719555729.jpeg', 'Trencher digunakan untuk menggali parit.', 'Konstruksi', 8, 'Produsen P', 'Model T2', 12, '6000.00', '4x2x2.5', '2024-06-27 23:13:50', '2024-06-27 23:22:09', NULL, NULL),
(17, 'PROD-D6L3H9F8R', 'Pile Driver', '32000000.00', 'BGbj9ldJga_1719555818.jpeg', 'Pile Driver digunakan untuk menancapkan tiang pancang.', 'Konstruksi', 4, 'Produsen Q', 'Model PD1', 12, '18000.00', '6x2.5x3', '2024-06-27 23:13:50', '2024-06-27 23:23:38', NULL, NULL),
(18, 'PROD-Z2P8T3K5N', 'Dragline Excavator', '35000000.00', 'kAgaXPCAAq_1719555876.jpeg', 'Dragline Excavator digunakan untuk menggali dan mengangkat material berat.', 'Konstruksi', 3, 'Produsen R', 'Model DE1', 12, '40000.00', '8x3x4', '2024-06-27 23:13:50', '2024-06-27 23:24:36', NULL, NULL),
(19, 'PROD-G7F9B2M1X', 'Feller Buncher', '26000000.00', 'LMyvJme8Z3_1719555916.jpeg', 'Feller Buncher digunakan untuk menebang pohon dan mengumpulkan kayu.', 'Konstruksi', 5, 'Produsen S', 'Model FB1', 12, '15000.00', '5x2.5x3', '2024-06-27 23:13:50', '2024-06-27 23:25:16', NULL, NULL),
(20, 'PROD-H3J1T9K6P', 'Harvester', '27000000.00', 'WymWZk3UYA_1719555942.jpeg', 'Harvester digunakan untuk memanen tanaman.', 'Pertanian', 6, 'Produsen T', 'Model H1', 12, '12000.00', '5x2.5x3', '2024-06-27 23:13:50', '2024-06-27 23:25:42', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Admin', 'admin@sukseskontraktor.com', NULL, '$2y$12$k3rznvLSM55Y38mZ.AMZp.MZNNwMT9ByYq6kIuN5obfKjkXY38kGW', NULL, '2024-06-27 23:13:49', '2024-06-27 23:13:49');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

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
  ADD KEY `orders_product_id_foreign` (`product_id`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `products_created_by_foreign` (`created_by`),
  ADD KEY `products_updated_by_foreign` (`updated_by`);

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
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_created_by_foreign` FOREIGN KEY (`created_by`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `products_updated_by_foreign` FOREIGN KEY (`updated_by`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
