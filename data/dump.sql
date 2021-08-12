-- phpMyAdmin SQL Dump
-- version 4.9.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: Aug 12, 2021 at 10:06 AM
-- Server version: 5.7.32

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `global4crm`
--

-- --------------------------------------------------------

--
-- Table structure for table `broadband_packages`
--

CREATE TABLE `broadband_packages` (
                                      `id` bigint(20) UNSIGNED NOT NULL,
                                      `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
                                      `download_speed` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
                                      `upload_speed` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
                                      `monthly_data_limit` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
                                      `connection_fee` double(8,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `monthly_payment` double(8,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `broadband_packages`
--

INSERT INTO `broadband_packages` (`id`, `name`, `download_speed`, `upload_speed`, `monthly_data_limit`, `connection_fee`, `created_at`, `updated_at`, `status`, `monthly_payment`) VALUES
(1, 'Global4 30 Superfast Business', 'Up to 30Mbps ', 'Up to 5Mbps ', '40GB', 99.00, '2021-08-10 18:19:46', NULL, 1, 36.50),
(2, 'Global4 30+ Superfast Business', 'Up to 30Mbps ', 'Up to 5Mbps ', '200GB', 99.00, '2021-08-10 18:19:46', NULL, 1, 41.99),
(3, 'Global4 50 Superfast Business', 'Up to 50Mbps ', 'Up to 10Mbps ', '400GB', 66.67, '2021-08-10 18:23:36', NULL, 1, 79.99),
(4, 'Global4 100 Superfast Business', 'Up to 100Mbps ', 'Up to 20Mbps ', '400GB', 66.67, '2021-08-10 18:23:36', NULL, 1, 132.69);

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
                             `id` bigint(20) UNSIGNED NOT NULL,
                             `full_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
                             `address` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
                             `post_code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
                             `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
                             `email_address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
                             `created_at` timestamp NULL DEFAULT NULL,
                             `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`id`, `full_name`, `address`, `post_code`, `phone`, `email_address`, `created_at`, `updated_at`) VALUES
(1, 'Jane Doe', '136 WARREN CRESCENT', 'SO16 6BH', '07312476887', 'flossydecks@yahoo.com', '2021-08-10 11:27:47', '2021-08-10 11:27:47'),
(2, 'Joyce Doe', 'fratton portsmouth', 'PO1 5QD', '07533647883', 'bill@yahoo.com', '2021-08-10 12:19:51', '2021-08-10 12:19:51'),
(3, 'Billy Doe', 'fratton portsmouth', 'PO1 5QD', '07533647883', 'billZ@yahoo.com', '2021-08-10 12:21:20', '2021-08-10 12:21:20'),
(4, 'Peter Schmidt', 'devonshire', 'PO14de', '1223438493', 'petesmd@gmail.com', '2021-08-11 16:34:24', '2021-08-11 16:34:24'),
(5, 'Pie', 'somewhere', 'PO1 e12', '47478584775', 'test@gmail.com', '2021-08-11 16:44:20', '2021-08-11 16:44:20');

-- --------------------------------------------------------

--
-- Table structure for table `customer_contract`
--

CREATE TABLE `customer_contract` (
                                     `id` bigint(20) UNSIGNED NOT NULL,
                                     `order_id` bigint(20) NOT NULL,
                                     `status` tinyint(1) NOT NULL DEFAULT '1',
                                     `duration` bigint(20) NOT NULL,
                                     `expiry_date` date DEFAULT NULL,
                                     `created_at` timestamp NULL DEFAULT NULL,
                                     `updated_at` timestamp NULL DEFAULT NULL,
                                     `customer_id` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `customer_contract`
--

INSERT INTO `customer_contract` (`id`, `order_id`, `status`, `duration`, `expiry_date`, `created_at`, `updated_at`, `customer_id`) VALUES
(1, 1, 1, 12, NULL, '2021-08-11 16:05:27', '2021-08-11 16:05:27', 2),
(2, 2, 1, 12, NULL, '2021-08-11 16:36:35', '2021-08-11 16:36:35', 4),
(3, 3, 1, 12, NULL, '2021-08-11 16:59:37', '2021-08-11 16:59:37', 5),
(4, 4, 1, 12, NULL, '2021-08-11 18:49:47', '2021-08-11 18:49:47', 4),
(5, 5, 1, 12, NULL, '2021-08-11 21:05:06', '2021-08-11 21:05:06', 3),
(6, 8, 1, 24, NULL, '2021-08-11 21:44:41', '2021-08-11 21:44:41', 3),
(7, 9, 1, 24, NULL, '2021-08-11 21:44:58', '2021-08-11 21:44:58', 3);

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
(3, '2021_08_09_194740_create_customers_table', 2),
(4, '2021_08_10_103015_create_orders_table', 3),
(5, '2021_08_10_181259_create_broadband_packages_table', 3),
(8, '2021_08_10_181833_add_column_to_broadband_packages_table', 4),
(10, '2021_08_11_101533_create_customer_contract_table', 5),
(11, '2021_08_11_150703_create_orders_table', 5),
(12, '2021_08_11_155719_add_column_to_customer_contract_table', 6);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
                          `id` bigint(20) UNSIGNED NOT NULL,
                          `broadband_package_id` bigint(20) NOT NULL,
                          `customer_contract_id` bigint(20) DEFAULT NULL,
                          `customer_id` bigint(20) NOT NULL,
                          `total_price` double(8,2) NOT NULL,
  `agent_id` bigint(20) NOT NULL,
  `initial_deposit` double(8,2) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `broadband_package_id`, `customer_contract_id`, `customer_id`, `total_price`, `agent_id`, `initial_deposit`, `status`, `created_at`, `updated_at`) VALUES
(1, 2, 1, 2, 503.88, 1, 140.99, 1, '2021-08-11 16:05:27', '2021-08-11 16:05:27'),
(2, 3, 2, 4, 959.88, 1, 146.66, 1, '2021-08-11 16:36:35', '2021-08-11 16:36:35'),
(3, 4, 3, 5, 1592.28, 1, 199.36, 1, '2021-08-11 16:59:37', '2021-08-11 16:59:37'),
(4, 1, 4, 4, 438.00, 1, 135.50, 1, '2021-08-11 18:49:47', '2021-08-11 18:49:47'),
(5, 1, 5, 3, 876.00, 1, 135.50, 1, '2021-08-11 21:05:06', '2021-08-11 21:05:06'),
(8, 2, 6, 3, 1007.76, 1, 140.99, 1, '2021-08-11 21:44:41', '2021-08-11 21:44:41'),
(9, 2, 7, 3, 1007.76, 1, 140.99, 1, '2021-08-11 21:44:58', '2021-08-11 21:44:58');

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
(1, 'John Doe', 'john.doe@gmail.com', NULL, '$2y$10$Dt6NEhl.bXtPeElW0FX7VORY3CXNrTsvn18h3u8nQVq.mIFags3Qu', NULL, '2021-08-09 18:16:15', '2021-08-09 18:16:15');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `broadband_packages`
--
ALTER TABLE `broadband_packages`
    ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
    ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customer_contract`
--
ALTER TABLE `customer_contract`
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
    ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
    ADD KEY `password_resets_email_index` (`email`);

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
-- AUTO_INCREMENT for table `broadband_packages`
--
ALTER TABLE `broadband_packages`
    MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
    MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `customer_contract`
--
ALTER TABLE `customer_contract`
    MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
    MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
    MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
    MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
