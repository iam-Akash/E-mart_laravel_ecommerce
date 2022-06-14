-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 02, 2022 at 10:18 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.0.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `emart`
--

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `full_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `photo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `role` enum('admin','seller','customer') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'customer',
  `status` enum('active','inactive') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'active',
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `full_name`, `username`, `email`, `email_verified_at`, `password`, `photo`, `phone`, `address`, `role`, `status`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'ziaul Haq', 'Admin', 'admin@gmail.com', NULL, '$2y$10$Gxq05SKOiCdsthYpmvGsDuRkzntazgm1gJC.K1aALGJHxobn05aDy', NULL, NULL, NULL, 'admin', 'active', NULL, NULL, NULL),
(2, 'Sadia Uddin', 'Vendor', 'vendor@gmail.com', NULL, '$2y$10$3roIuogbNwxJs2x0kvcqVuQ1WyvSe0g4I1LQpW0cxfv0gIo/ApjW.', NULL, NULL, NULL, 'seller', 'active', NULL, NULL, NULL),
(3, 'shorif uddin', 'Customer', 'customer@gmail.com', NULL, '$2y$10$nyhqGrE9sRdZBujGsTCrGu.y7YJ7iZeTJv/xhUWYkocadjefFjqDO', NULL, NULL, NULL, 'customer', 'active', NULL, NULL, NULL),
(4, 'Cortez Corkery', NULL, 'xprohaska@example.com', '2022-05-09 22:17:44', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'https://via.placeholder.com/60x60.png/00aaff?text=veniam', '1-573-599-5241', '40729 Harvey Lodge\nAdrianbury, PA 47581-0362', 'admin', 'active', 'RkycoRz6XH', '2022-05-09 22:17:44', '2022-05-09 22:17:44'),
(5, 'Maude Hauck', NULL, 'jessica25@example.com', '2022-05-09 22:17:44', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'https://via.placeholder.com/60x60.png/005599?text=aspernatur', '1-580-867-8117', '3354 Brenna Walk\nLoweview, IN 04339', 'seller', 'inactive', '7BNqne7WJg', '2022-05-09 22:17:44', '2022-05-09 22:17:44'),
(6, 'Miss Jana Rowe', NULL, 'vschaden@example.org', '2022-05-09 22:17:44', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'https://via.placeholder.com/60x60.png/004411?text=molestias', '1-212-512-8221', '214 Llewellyn Corners Suite 838\nLehnerport, NJ 29633', 'seller', 'inactive', 'yJljbCMtjg', '2022-05-09 22:17:44', '2022-05-09 22:17:44'),
(7, 'Mekhi DuBuque V', NULL, 'irussel@example.org', '2022-05-09 22:17:44', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'https://via.placeholder.com/60x60.png/001177?text=voluptates', '+1-346-877-8994', '539 Leda Wall Apt. 086\nGenesisville, OR 35748-5636', 'customer', 'inactive', 'DaSbAoR2SD', '2022-05-09 22:17:44', '2022-05-09 22:17:44'),
(8, 'Chaim Grant', NULL, 'tweber@example.org', '2022-05-09 22:17:44', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'https://via.placeholder.com/60x60.png/0099bb?text=nam', '+19709588194', '80574 Goodwin Forest\nMarcelleland, VA 50133-1424', 'customer', 'inactive', '8KMcphmhcQ', '2022-05-09 22:17:44', '2022-05-09 22:17:44'),
(9, 'Lou Fay', NULL, 'beatty.brianne@example.com', '2022-05-09 22:17:44', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'https://via.placeholder.com/60x60.png/000011?text=numquam', '925-205-4698', '697 Kemmer Corners\nMuellermouth, NY 41817', 'seller', 'inactive', 'kxpcmoXAfl', '2022-05-09 22:17:44', '2022-05-09 22:17:44'),
(10, 'Dr. Harold Parker', NULL, 'jerrold.murray@example.org', '2022-05-09 22:17:44', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'https://via.placeholder.com/60x60.png/001177?text=et', '1-714-454-0185', '281 Tillman Road Apt. 171\nHilpertberg, IL 08206', 'seller', 'inactive', 'DsukvtvxOB', '2022-05-09 22:17:44', '2022-05-09 22:17:44'),
(11, 'Elias Cole', NULL, 'roger35@example.net', '2022-05-09 22:17:44', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'https://via.placeholder.com/60x60.png/00ee77?text=architecto', '(505) 394-5237', '575 Brad Ranch Apt. 558\nEast Laverneside, TN 19887-6418', 'admin', 'inactive', '4J7bgkrLwK', '2022-05-09 22:17:44', '2022-05-09 22:17:44'),
(12, 'Kristy Von', NULL, 'shawna.lynch@example.net', '2022-05-09 22:17:44', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'https://via.placeholder.com/60x60.png/0099ee?text=natus', '(252) 890-4180', '42774 Cassin Views\nStewartland, LA 42584', 'seller', 'active', 'hn0uUTf0HW', '2022-05-09 22:17:44', '2022-05-09 22:17:44'),
(13, 'Kasey Rowe', NULL, 'yundt.brooke@example.com', '2022-05-09 22:17:44', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'https://via.placeholder.com/60x60.png/0066ff?text=ullam', '480-235-3101', '99028 Hegmann Vista\nMarianchester, MN 47753-7574', 'admin', 'active', 'PmZ2F8CVY9', '2022-05-09 22:17:44', '2022-05-09 22:17:44'),
(14, 'Dessie Cremin', NULL, 'mkonopelski@example.net', '2022-05-09 22:17:44', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'https://via.placeholder.com/60x60.png/0033dd?text=quidem', '(878) 372-4718', '634 Reichert Hills\nWileymouth, MN 21779-9042', 'customer', 'active', 'YGsdXvKJGb', '2022-05-09 22:17:44', '2022-05-09 22:17:44'),
(15, 'Miss Mozell Hudson', NULL, 'sharber@example.net', '2022-05-09 22:17:44', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'https://via.placeholder.com/60x60.png/00bbff?text=dolorem', '724.210.0957', '978 Hegmann Camp\nKearaberg, FL 51905', 'admin', 'active', '7KEqSzjImj', '2022-05-09 22:17:44', '2022-05-09 22:17:44'),
(16, 'Mr. Demario Gaylord DVM', NULL, 'randal.white@example.com', '2022-05-09 22:17:44', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'https://via.placeholder.com/60x60.png/00cc11?text=doloremque', '1-442-271-3361', '508 Madeline Spur\nEast Candidoland, MS 03297-2132', 'customer', 'active', 'RRfosiXH4d', '2022-05-09 22:17:44', '2022-05-09 22:17:44'),
(17, 'Simeon Langosh V', NULL, 'landen76@example.com', '2022-05-09 22:17:44', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'https://via.placeholder.com/60x60.png/0000ff?text=placeat', '+1.813.540.6194', '41384 Franecki Island Suite 656\nPollichhaven, NC 76833', 'seller', 'active', '2TqEcndqcx', '2022-05-09 22:17:44', '2022-05-09 22:17:44'),
(18, 'Cedrick Hackett', NULL, 'hyatt.olin@example.com', '2022-05-09 22:17:44', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'https://via.placeholder.com/60x60.png/00ffdd?text=consequatur', '+1.351.394.0675', '822 Yolanda Cliff Apt. 134\nEast David, FL 22435-0349', 'admin', 'inactive', 'F3WjeJEt5r', '2022-05-09 22:17:44', '2022-05-09 22:17:44'),
(19, 'Magnolia Leuschke PhD', NULL, 'sauer.sonia@example.com', '2022-05-09 22:17:44', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'https://via.placeholder.com/60x60.png/004499?text=earum', '520-237-8532', '7299 Alden Springs Apt. 256\nRennerfurt, IL 75594-2345', 'customer', 'active', 'CgTTOnKWht', '2022-05-09 22:17:44', '2022-05-09 22:17:44'),
(20, 'Prof. Cordelia Lakin', NULL, 'osborne.bailey@example.net', '2022-05-09 22:17:44', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'https://via.placeholder.com/60x60.png/00ddcc?text=perspiciatis', '+1-904-315-2846', '590 Sarai Hill\nPort Paxton, AK 45797-0667', 'seller', 'inactive', 'XtOVMCMSc6', '2022-05-09 22:17:44', '2022-05-09 22:17:44'),
(21, 'Karianne Kassulke', NULL, 'nullrich@example.org', '2022-05-09 22:17:44', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'https://via.placeholder.com/60x60.png/002288?text=non', '+1 (838) 421-9974', '694 Predovic Cove\nWest Isadoreland, MT 35605', 'seller', 'inactive', '0EY4InzWqt', '2022-05-09 22:17:44', '2022-05-09 22:17:44'),
(22, 'Palma Donnelly', NULL, 'sydni99@example.com', '2022-05-09 22:17:44', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'https://via.placeholder.com/60x60.png/000022?text=quibusdam', '(941) 436-5275', '478 Paucek Cape Suite 663\nMohammadview, OK 48775-6847', 'seller', 'inactive', 'g7fLoBATe1', '2022-05-09 22:17:44', '2022-05-09 22:17:44'),
(23, 'Lysanne Heidenreich', NULL, 'mckenzie.waino@example.org', '2022-05-09 22:17:44', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'https://via.placeholder.com/60x60.png/009999?text=magnam', '1-689-874-5787', '10341 Breitenberg Meadows\nNorth Jaynechester, VT 44220-3033', 'admin', 'active', 's9TfcQdoTY', '2022-05-09 22:17:44', '2022-05-09 22:17:44'),
(24, 'Prof. Isabella Barton', NULL, 'dangelo09@example.org', '2022-05-09 22:17:44', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'https://via.placeholder.com/60x60.png/00dd77?text=omnis', '412.941.7989', '463 Ozella Fall\nPort Kristinaland, WI 89871-6668', 'admin', 'active', 'TBS2AIoNo5', '2022-05-09 22:17:44', '2022-05-09 22:17:44'),
(25, 'Cindy Wolff', NULL, 'reilly.freddy@example.com', '2022-05-09 22:17:44', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'https://via.placeholder.com/60x60.png/00aa77?text=quasi', '858-309-6028', '494 Albina Bypass\nTremblayview, UT 03680', 'seller', 'inactive', '47EgXoZm9D', '2022-05-09 22:17:44', '2022-05-09 22:17:44'),
(26, 'Waino Howe', NULL, 'annette.johnston@example.com', '2022-05-09 22:17:44', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'https://via.placeholder.com/60x60.png/0011bb?text=atque', '+1-912-619-3045', '411 Edyth Crossing Apt. 566\nLake Estelleport, NE 26088', 'seller', 'active', 'e1CejGqCjK', '2022-05-09 22:17:44', '2022-05-09 22:17:44'),
(27, 'Chris Hettinger', NULL, 'farrell.cheyenne@example.org', '2022-05-09 22:17:44', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'https://via.placeholder.com/60x60.png/00eeff?text=eligendi', '1-779-633-6308', '8866 Marcia Ridges Suite 728\nWeberland, CT 87103', 'customer', 'active', 'j8GoqlLRGZ', '2022-05-09 22:17:44', '2022-05-09 22:17:44'),
(28, 'Dr. Romaine Sauer', NULL, 'cleo18@example.com', '2022-05-09 22:17:44', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'https://via.placeholder.com/60x60.png/006644?text=et', '+1 (254) 358-5508', '4396 Jamir Forge\nKuphalton, ME 51376', 'admin', 'active', 'oAmLNnR5d9', '2022-05-09 22:17:44', '2022-05-09 22:17:44'),
(29, 'Deven Dibbert', NULL, 'madeline.kuhlman@example.com', '2022-05-09 22:17:44', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'https://via.placeholder.com/60x60.png/00aaaa?text=eaque', '+1 (540) 679-9134', '16105 Roy Viaduct\nEast Berenice, NH 08462-5519', 'seller', 'inactive', 'SyEC55r8jt', '2022-05-09 22:17:44', '2022-05-09 22:17:44'),
(30, 'Tyler Heller', NULL, 'becker.amara@example.org', '2022-05-09 22:17:44', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'https://via.placeholder.com/60x60.png/0011dd?text=quae', '(680) 903-8225', '8279 Cormier Mountain\nAiyanafurt, AL 14183-9858', 'admin', 'inactive', 'i27SBLe5rz', '2022-05-09 22:17:44', '2022-05-09 22:17:44'),
(31, 'Davin Schinner', NULL, 'ryder.macejkovic@example.com', '2022-05-09 22:17:44', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'https://via.placeholder.com/60x60.png/008888?text=cum', '(586) 993-2888', '6742 Madonna Union\nWest Lysanne, IL 04114', 'admin', 'active', 'krMsMwtG74', '2022-05-09 22:17:44', '2022-05-09 22:17:44'),
(32, 'Prof. Audie Hayes II', NULL, 'mann.denis@example.net', '2022-05-09 22:17:44', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'https://via.placeholder.com/60x60.png/009955?text=quis', '262-549-9162', '266 Dibbert Walk\nSouth Anastasia, NC 77392-9512', 'admin', 'active', 'N0Mkzol56q', '2022-05-09 22:17:44', '2022-05-09 22:17:44'),
(33, 'Dr. Ona Goyette II', NULL, 'haag.ernestina@example.org', '2022-05-09 22:17:44', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'https://via.placeholder.com/60x60.png/00ffdd?text=tenetur', '+1.385.589.0068', '6777 Terrill Overpass\nO\'Connellfort, NM 33042-2775', 'customer', 'inactive', 'kdfenfrlVi', '2022-05-09 22:17:44', '2022-05-09 22:17:44');

--
-- Indexes for dumped tables
--

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
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
