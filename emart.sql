-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 26, 2022 at 02:23 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 7.4.28

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
-- Table structure for table `banners`
--

CREATE TABLE `banners` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` mediumtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `photo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` enum('active','inactive') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'inactive',
  `condition` enum('banner','promote') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'banner',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `banners`
--

INSERT INTO `banners` (`id`, `title`, `slug`, `description`, `photo`, `status`, `condition`, `created_at`, `updated_at`) VALUES
(1, 'Sustainable watch with great deal.', 'sustainable-watch-with-great-deal', '<p><b>Smart watch</b><br><font color=\"#000000\" style=\"background-color: rgb(255, 255, 0);\">Price</font>: only 13000 Tk</p>', '/storage/photos/1/7.jpg', 'active', 'banner', '2022-05-25 23:11:17', '2022-05-25 23:11:17'),
(2, 'Rebook trackers', '1653548062-rebook-trackers', '<p><b>Special offer </b><span style=\"background-color: rgb(255, 255, 255);\"><b><br></b></span><font color=\"#000000\" style=\"background-color: rgb(255, 255, 0);\">price : </font>only at 20000 Tk</p>', '/storage/photos/1/solen-feyissa-mO-_iF_FkCk-unsplash.jpg', 'inactive', 'banner', '2022-05-25 23:14:00', '2022-05-26 00:54:22'),
(3, 'Rayban sunglass', '1653548051-rayban-sunglass', '<p><b>Nice looking sunglass</b><br><font color=\"#000000\" style=\"background-color: rgb(255, 255, 0);\">Price</font>: only 9000 Tk</p>', '/storage/photos/1/14.jpg', 'inactive', 'banner', '2022-05-25 23:15:21', '2022-05-26 00:54:11'),
(4, 'I phone 13 pro max', '1653548026-i-phone-13-pro-max', '<p><b>Smart phone</b><br><font color=\"#000000\" style=\"background-color: rgb(255, 255, 0);\">Price</font>: only 109000 Tk</p>', '/storage/photos/1/jeremy-bezanger-0a1AxtzSmWA-unsplash.jpg', 'active', 'banner', '2022-05-25 23:17:26', '2022-05-26 00:53:46'),
(10, 'Addidas new sneakers', 'addidas-new-sneakers', '<p><b>Fashionable Sneaker</b><br><font color=\"#000000\" style=\"background-color: rgb(255, 255, 0);\">Price</font>: only 7000 Tk</p>', '/storage/photos/1/6.jpg', 'active', 'banner', '2022-05-26 00:46:53', '2022-05-26 00:56:14');

-- --------------------------------------------------------

--
-- Table structure for table `brands`
--

CREATE TABLE `brands` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `photo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` enum('active','inactive') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'active',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `brands`
--

INSERT INTO `brands` (`id`, `title`, `slug`, `photo`, `status`, `created_at`, `updated_at`) VALUES
(4, 'similique', 'similique', 'https://via.placeholder.com/60x60.png/0011aa?text=dolor', 'inactive', '2022-05-22 05:08:58', '2022-05-22 05:08:58'),
(5, 'quisquam', 'quisquam', 'https://via.placeholder.com/60x60.png/0077ee?text=quibusdam', 'inactive', '2022-05-22 05:08:58', '2022-05-22 05:08:58'),
(6, 'aliquam', 'aliquam', 'https://via.placeholder.com/60x60.png/00ee99?text=ab', 'active', '2022-05-22 05:08:58', '2022-05-22 05:08:58'),
(8, 'quos', 'quos', 'https://via.placeholder.com/60x60.png/00bbcc?text=vel', 'active', '2022-05-22 05:08:58', '2022-05-22 05:08:58'),
(9, 'dignissimos', 'dignissimos', 'https://via.placeholder.com/60x60.png/008877?text=blanditiis', 'active', '2022-05-22 05:08:58', '2022-05-22 05:08:58'),
(10, 'consequuntur', 'consequuntur', 'https://via.placeholder.com/60x60.png/00aa22?text=qui', 'inactive', '2022-05-22 05:08:58', '2022-05-22 05:08:58');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `summary` mediumtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `photo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` enum('active','inactive') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'active',
  `is_parent` tinyint(1) NOT NULL DEFAULT 1,
  `parent_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `title`, `slug`, `summary`, `photo`, `status`, `is_parent`, `parent_id`, `created_at`, `updated_at`) VALUES
(23, 'accusamus consequatur qui', 'accusamus-consequatur-qui', 'Consequatur nihil ipsam quia. Dolore eos temporibus ea in.', 'https://via.placeholder.com/350x350.png/00aaff?text=veniam', 'inactive', 1, NULL, '2022-05-17 02:42:10', '2022-05-17 02:42:10'),
(26, 'placeat qui ut', '1653216081-placeat-qui-ut', 'Nisi dolor est magni vitae non. Eos veniam nihil a. Nulla laborum accusamus at qui quis.', 'https://via.placeholder.com/350x350.png/00aaff?text=veniam', 'active', 1, NULL, '2022-05-17 02:42:10', '2022-05-22 04:41:41'),
(33, 'aliquam facere doloribus', 'aliquam-facere-doloribus', 'Ipsa vitae ut pariatur qui inventore eveniet dicta. Et cumque facere eaque voluptas tenetur earum.', 'https://via.placeholder.com/350x350.png/00aaff?text=veniam', 'active', 0, 35, '2022-05-17 02:42:10', '2022-05-17 02:42:10'),
(34, 'minus optio consequatur', 'minus-optio-consequatur', 'Impedit alias quis beatae velit. Quas ex dolores sapiente eos aut aut.', 'https://via.placeholder.com/350x350.png/00aaff?text=veniam', 'inactive', 1, NULL, '2022-05-17 02:42:10', '2022-05-22 04:38:46'),
(35, 'officia nihil nemo', 'officia-nihil-nemo', 'Autem officiis sunt et. Ut beatae ad a tempore voluptatem corporis. Et aliquam est est et.', 'https://via.placeholder.com/350x350.png/00aaff?text=veniam', 'inactive', 1, NULL, '2022-05-17 02:42:10', '2022-05-17 02:42:10'),
(36, 'enim quis molestias', 'enim-quis-molestias', 'Qui ex et consequuntur sit quos illo. Asperiores id aperiam ducimus omnis. Est ab ab illum rerum.', 'https://via.placeholder.com/350x350.png/00aaff?text=veniam', 'inactive', 0, 35, '2022-05-17 02:42:10', '2022-05-17 02:42:10'),
(37, 'id nemo iure', 'id-nemo-iure', 'Quaerat rerum et cumque placeat. Quis blanditiis expedita cumque iure debitis qui distinctio.', 'https://via.placeholder.com/350x350.png/00aaff?text=veniam', 'inactive', 0, 39, '2022-05-17 02:42:10', '2022-05-17 02:42:10'),
(38, 'qui molestiae assumenda', 'qui-molestiae-assumenda', 'Voluptatem tenetur tenetur officiis dolores qui. Qui molestias qui dicta enim voluptatem.', 'https://via.placeholder.com/350x350.png/00aaff?text=veniam', 'inactive', 1, NULL, '2022-05-17 02:42:10', '2022-05-17 02:42:10'),
(39, 'eum officiis ab', 'eum-officiis-ab', 'Eum est necessitatibus perferendis enim. Porro aliquam sint enim est eius voluptatem voluptas.', 'https://via.placeholder.com/350x350.png/00aaff?text=veniam', 'inactive', 1, NULL, '2022-05-17 02:42:10', '2022-05-17 02:42:10'),
(40, 'aut voluptas voluptatem', 'aut-voluptas-voluptatem', 'Mollitia officia amet molestiae aut. Harum repellat corporis consectetur. Totam in doloribus qui.', 'https://via.placeholder.com/350x350.png/00aaff?text=veniam', 'active', 0, 39, '2022-05-17 02:42:10', '2022-05-17 02:42:10'),
(42, 'sumer', '1653215552-sumer', '<p>summer</p>', 'https://via.placeholder.com/350x350.png/00aaff?text=veniam', 'inactive', 1, NULL, '2022-05-22 01:03:41', '2022-05-22 04:38:46'),
(51, 'in voluptas eveniet', 'in-voluptas-eveniet', 'Dolores distinctio voluptate temporibus voluptatem cupiditate possimus. Inventore et maxime in ut.', 'https://via.placeholder.com/350x350.png/00aaff?text=veniam', 'inactive', 1, NULL, '2022-05-22 05:07:25', '2022-05-22 05:07:25'),
(52, 'nostrum omnis sit', 'nostrum-omnis-sit', 'Nisi velit ut tempora id autem maiores eius. Ratione sequi ut pariatur.', 'https://via.placeholder.com/350x350.png/00aaff?text=veniam', 'inactive', 0, 38, '2022-05-22 05:07:25', '2022-05-22 05:07:25'),
(53, 'tenetur et voluptas', 'tenetur-et-voluptas', 'Nihil suscipit est alias voluptatum hic. Dicta et commodi consequatur ducimus animi.', 'https://via.placeholder.com/350x350.png/00aaff?text=veniam', 'active', 0, 26, '2022-05-22 05:07:25', '2022-05-22 05:07:25'),
(54, 'libero provident ut', 'libero-provident-ut', 'Vel quas quis et. Et totam est est dolores. Odio et excepturi tempore iste voluptates rerum.', 'https://via.placeholder.com/350x350.png/00aaff?text=veniam', 'active', 0, 34, '2022-05-22 05:07:25', '2022-05-22 05:07:25'),
(55, 'incidunt sit fuga', 'incidunt-sit-fuga', 'Error exercitationem a aut unde debitis rerum est. Tempora accusantium consequatur culpa id odio.', 'https://via.placeholder.com/350x350.png/00aaff?text=veniam', 'active', 1, NULL, '2022-05-22 05:07:25', '2022-05-22 05:07:25'),
(56, 'iste aut ipsam', 'iste-aut-ipsam', 'Delectus sint qui quos qui. Ut enim amet consequuntur laborum sint. Sequi dolore in qui alias.', 'https://via.placeholder.com/350x350.png/00aaff?text=veniam', 'active', 1, NULL, '2022-05-22 05:07:25', '2022-05-22 05:07:25'),
(57, 'voluptas quis quibusdam', 'voluptas-quis-quibusdam', 'Dolor amet maxime ea ratione voluptatem saepe ut. Saepe neque eum rerum libero minus excepturi.', 'https://via.placeholder.com/350x350.png/00aaff?text=veniam', 'inactive', 1, NULL, '2022-05-22 05:07:25', '2022-05-22 05:07:25'),
(58, 'earum tenetur quod', 'earum-tenetur-quod', 'Ab modi fuga aperiam quia quis. Repellat et omnis explicabo qui.', 'https://via.placeholder.com/350x350.png/00aaff?text=veniam', 'inactive', 1, NULL, '2022-05-22 05:07:25', '2022-05-22 05:07:25'),
(59, 'harum in et', 'harum-in-et', 'Et quo porro aut velit. Sit iusto laborum laudantium nihil. Est vel maxime quis qui.', 'https://via.placeholder.com/350x350.png/00aaff?text=veniam', 'active', 1, NULL, '2022-05-22 05:07:25', '2022-05-22 05:07:25'),
(60, 'itaque et voluptatem', 'itaque-et-voluptatem', 'Vel ullam voluptatem sit qui debitis. Saepe alias accusantium reiciendis eum qui sint.', 'https://via.placeholder.com/350x350.png/00aaff?text=veniam', 'active', 1, NULL, '2022-05-22 05:07:25', '2022-05-22 05:07:25'),
(61, 'vel cupiditate ullam', 'vel-cupiditate-ullam', 'Quia ullam repudiandae sed distinctio. Odit doloremque et ipsa.', 'https://via.placeholder.com/350x350.png/00aaff?text=veniam', 'active', 1, NULL, '2022-05-22 05:07:25', '2022-05-22 05:07:25'),
(62, 'incidunt nulla dolorem', 'incidunt-nulla-dolorem', 'Accusamus sed sit dolor. Veniam quis est molestias eos. Qui nostrum expedita quod saepe.', 'https://via.placeholder.com/350x350.png/00aaff?text=veniam', 'active', 0, 26, '2022-05-22 05:07:25', '2022-05-22 05:07:25'),
(63, 'nesciunt et magnam', 'nesciunt-et-magnam', 'Illum sed quia magni fugit commodi est est. Est quo qui et illo sapiente reiciendis sed blanditiis.', 'https://via.placeholder.com/350x350.png/00aaff?text=veniam', 'inactive', 0, 23, '2022-05-22 05:07:25', '2022-05-22 05:07:25'),
(64, 'rem beatae sapiente', 'rem-beatae-sapiente', 'Quia repudiandae id exercitationem eos. Aperiam omnis molestiae est.', 'https://via.placeholder.com/350x350.png/00aaff?text=veniam', 'inactive', 1, NULL, '2022-05-22 05:07:25', '2022-05-22 05:07:25'),
(65, 'nihil ullam provident', 'nihil-ullam-provident', 'At necessitatibus alias laboriosam. Rerum voluptatem non et quia. Adipisci et in est aut non.', 'https://via.placeholder.com/350x350.png/00aaff?text=veniam', 'inactive', 1, NULL, '2022-05-22 05:07:25', '2022-05-22 05:07:25'),
(66, 'doloribus quos accusamus', 'doloribus-quos-accusamus', 'Nihil eos enim saepe. Delectus harum dolore eveniet fuga. Ab dolorum qui dolor molestias quos.', 'https://via.placeholder.com/350x350.png/00aaff?text=veniam', 'inactive', 0, 36, '2022-05-22 05:07:25', '2022-05-22 05:07:25'),
(67, 'exercitationem magnam autem', 'exercitationem-magnam-autem', 'Et quidem quia repellendus ut est. Ipsa dolores dicta nam necessitatibus dolorem et consectetur.', 'https://via.placeholder.com/350x350.png/00aaff?text=veniam', 'active', 1, NULL, '2022-05-22 05:07:25', '2022-05-22 05:07:25'),
(68, 'excepturi ullam qui', 'excepturi-ullam-qui', 'Et tempore et consequatur ad nesciunt non. Recusandae et qui voluptas et. Aut amet ut qui.', 'https://via.placeholder.com/350x350.png/00aaff?text=veniam', 'active', 1, NULL, '2022-05-22 05:07:25', '2022-05-22 05:07:25'),
(69, 'sit est laborum', 'sit-est-laborum', 'Quod ut quos a culpa. Quis quasi numquam possimus. Rem recusandae atque aut eos ut eos vitae.', 'https://via.placeholder.com/350x350.png/00aaff?text=veniam', 'inactive', 0, 36, '2022-05-22 05:07:25', '2022-05-22 05:07:25'),
(70, 'laborum consequatur dolores', 'laborum-consequatur-dolores', 'Quasi debitis omnis ipsam. Omnis alias quam in facilis quas. Illum fuga eius ab aperiam.', 'https://via.placeholder.com/350x350.png/00aaff?text=veniam', 'active', 1, NULL, '2022-05-22 05:07:25', '2022-05-22 05:07:25');

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
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2022_05_12_040057_create_banners_table', 2),
(8, '2022_05_16_110026_create_categories_table', 3),
(9, '2022_05_22_105117_create_brands_table', 4),
(10, '2022_05_23_042311_create_products_table', 5);

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
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `summary` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `stock` int(11) NOT NULL DEFAULT 0,
  `price` double(8,2) NOT NULL DEFAULT 0.00,
  `offer_price` double(8,2) NOT NULL DEFAULT 0.00,
  `discount` double(8,2) NOT NULL DEFAULT 0.00,
  `size` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `photo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `condition` enum('new','sale','popular','winter') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'new',
  `status` enum('active','inactive') COLLATE utf8mb4_unicode_ci NOT NULL,
  `brand_id` bigint(20) UNSIGNED DEFAULT NULL,
  `parent_category_id` bigint(20) UNSIGNED NOT NULL,
  `child_category_id` bigint(20) UNSIGNED DEFAULT NULL,
  `vendor_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `title`, `slug`, `summary`, `description`, `stock`, `price`, `offer_price`, `discount`, `size`, `photo`, `condition`, `status`, `brand_id`, `parent_category_id`, `child_category_id`, `vendor_id`, `created_at`, `updated_at`) VALUES
(1, 'numquam', 'voluptates-ratione-alias-aut-reiciendis-sed-exercitationem-in', 'Est sequi quia soluta id iure.', 'Corporis commodi placeat voluptatem quidem accusamus quo. Est in adipisci illum totam. Debitis autem eos reprehenderit et. Eveniet beatae aspernatur impedit nobis quasi eum voluptatibus labore. Consectetur illum consequatur id dolor quae.', 9, 545.00, 747.00, 0.00, 'M', 'https://via.placeholder.com/400x200.png/0044cc?text=quia', 'winter', 'active', 9, 56, 33, 29, '2022-05-23 02:43:44', '2022-05-23 02:43:44'),
(2, 'ratione', 'quis-et-nostrum-rerum-impedit-et-alias-incidunt-suscipit', 'Magni omnis soluta quas optio dicta.', 'Esse aut dicta similique aspernatur nihil aut. Delectus sequi aut nesciunt amet nam cum quia. Est saepe et enim.', 5, 669.00, 260.00, 0.00, 'S', 'https://via.placeholder.com/400x200.png/0033aa?text=veniam', 'winter', 'active', 10, 55, 69, 29, '2022-05-23 02:43:44', '2022-05-23 02:43:44'),
(3, 'ut', 'atque-voluptates-dolores-eum-pariatur-non', 'Est et vel est velit veritatis iure sapiente.', 'Nulla aut quia fugit libero quia. Qui officiis asperiores aut qui ut. Exercitationem sed aliquam sit corrupti sapiente dolor. Dolorum occaecati voluptatibus perspiciatis nostrum cum architecto.', 2, 979.00, 271.00, 0.00, 'XXL', 'https://via.placeholder.com/400x200.png/00ee88?text=qui', 'winter', 'inactive', 9, 38, 37, 26, '2022-05-23 02:43:44', '2022-05-23 02:43:44'),
(5, 'consequatur', 'accusantium-exercitationem-illo-est-blanditiis-nam-est-enim', 'Non repellendus qui voluptas incidunt quia rem.', 'Ut modi et rerum laboriosam cumque sed. Rem iste inventore repudiandae est occaecati et. Labore aut facilis ipsa architecto architecto consequatur in deserunt.', 8, 633.00, 931.00, 20.00, 'S', 'https://via.placeholder.com/400x200.png/0088aa?text=asperiores', 'sale', 'active', 9, 67, 62, NULL, '2022-05-23 02:43:44', '2022-05-23 02:43:44'),
(7, 'eum', 'explicabo-amet-aut-placeat-quia-iste-tempore-mollitia-voluptas', 'Ipsam ut laborum eos doloremque libero.', 'Praesentium dolorem eum maiores et sint corrupti odit. Sed odit sed in cumque alias voluptas ut. Id aspernatur sit soluta qui iste in explicabo nulla. Doloremque dolores aut molestias in nostrum delectus laudantium. Aut accusantium in quo et animi.', 2, 210.00, 694.00, 0.00, 'M', 'https://via.placeholder.com/400x200.png/006666?text=recusandae', 'winter', 'inactive', 6, 26, 36, 2, '2022-05-23 02:43:44', '2022-05-23 02:43:44'),
(8, 'dicta', 'fugit-odio-porro-quia-nihil-quis', 'Accusantium in reiciendis vitae rerum.', 'Facilis voluptatem fuga qui sunt voluptas doloremque. Fuga ipsum fuga ut optio. Est molestiae unde consequatur excepturi. Doloribus delectus rerum sunt nam autem unde.', 7, 942.00, 455.00, 0.00, 'S', 'https://via.placeholder.com/400x200.png/000000?text=doloremque', 'popular', 'inactive', 4, 65, 52, 2, '2022-05-23 02:43:44', '2022-05-23 02:43:44'),
(9, 'qui', 'ratione-et-tempore-nostrum', 'Voluptatem quae voluptate adipisci ipsam.', 'Qui unde tenetur amet molestiae inventore at aliquam modi. Inventore id ratione sed quisquam sapiente eius esse.', 5, 118.00, 866.00, 0.00, 'M', 'https://via.placeholder.com/400x200.png/002244?text=doloremque', 'new', 'active', 5, 56, 53, 26, '2022-05-23 02:43:44', '2022-05-23 02:43:44'),
(10, 'aut', 'voluptates-aut-tenetur-consectetur-cupiditate-accusamus-praesentium', 'Quia accusantium debitis minima laudantium ad.', 'A accusamus voluptate nihil odio est recusandae corporis. Quidem perferendis est adipisci quia fugit. Nihil numquam modi labore molestiae. Explicabo porro temporibus aut sed.', 7, 572.00, 961.00, 0.00, 'XS', 'https://via.placeholder.com/400x200.png/007700?text=omnis', 'popular', 'inactive', 4, 26, 33, 2, '2022-05-23 02:43:44', '2022-05-23 02:43:44'),
(11, 'laborum', 'rerum-quod-eum-quasi-rem-nisi-nihil', 'Aut rerum ullam in sapiente enim laboriosam.', 'Neque officiis asperiores molestias ut. Deserunt sit quasi aperiam. Fugit saepe ea quae qui voluptatem et.', 6, 525.00, 863.00, 40.00, 'M', 'https://via.placeholder.com/400x200.png/00dd33?text=modi', 'sale', 'active', 6, 23, 53, 10, '2022-05-23 02:43:44', '2022-05-23 02:43:44'),
(12, 'quo', 'omnis-suscipit-consequatur-incidunt', 'Et qui est animi exercitationem.', 'Ipsum reprehenderit tempore velit corrupti. Placeat aspernatur facere qui adipisci. Sed sequi est nostrum fuga quis voluptatem ullam. Aut voluptatum eveniet aut et animi. Minus omnis quidem voluptatem id quia deleniti. Corrupti accusamus dolore at aut.', 6, 129.00, 304.00, 0.00, 'S', 'https://via.placeholder.com/400x200.png/0044bb?text=officia', 'winter', 'inactive', 4, 59, 69, NULL, '2022-05-23 02:43:44', '2022-05-23 02:43:44'),
(13, 'dolores', 'omnis-corrupti-nam-quisquam-sunt-ab-officiis-officiis', 'Non ut eaque quidem adipisci aut.', 'Molestias vel quia hic totam. Ex veritatis nesciunt incidunt voluptate et est. Quidem quae veniam neque est. Ea eaque rerum voluptas qui omnis. Et fugiat explicabo facere et voluptate.', 5, 363.00, 371.00, 30.00, 'XS', 'https://via.placeholder.com/400x200.png/0077cc?text=sed', 'sale', 'inactive', 5, 58, 37, 26, '2022-05-23 02:43:44', '2022-05-23 02:43:44'),
(14, 'est', 'sequi-esse-ratione-hic-voluptatibus-deserunt', 'Repellendus excepturi vel tempore est vel sit.', 'Occaecati ducimus ut voluptatum vel quis dolorum accusantium. Est occaecati labore accusamus quia qui temporibus at. Explicabo hic hic rerum occaecati aliquid sequi et. Aut et at officia eos sapiente aut.', 10, 897.00, 237.00, 0.00, 'XXL', 'https://via.placeholder.com/400x200.png/00bbff?text=rerum', 'new', 'inactive', 9, 51, 69, NULL, '2022-05-23 02:43:44', '2022-05-23 02:43:44'),
(15, 'necessitatibus', 'quia-molestiae-sunt-dolorem-odit-provident', 'Fuga doloribus ut odit.', 'Aliquid molestiae necessitatibus ab. Ab ut numquam autem vel ipsa laudantium. Aperiam sit dolorem vero quibusdam sunt.', 4, 667.00, 789.00, 0.00, 'S', 'https://via.placeholder.com/400x200.png/001100?text=modi', 'new', 'inactive', 10, 60, 33, 29, '2022-05-23 02:43:44', '2022-05-23 02:43:44'),
(16, 'officia', 'commodi-veniam-ut-enim-facere', 'Sit sed aliquid consequuntur ut ea commodi.', 'Iure aspernatur magnam rerum in optio autem. Et voluptas ipsam eos quia. Architecto et dignissimos rerum rerum facilis. Alias aut culpa velit mollitia magnam. Suscipit quod velit qui in. Dolor hic impedit qui sed aut.', 2, 415.00, 491.00, 0.00, 'L', 'https://via.placeholder.com/400x200.png/002277?text=aut', 'winter', 'inactive', 9, 61, 40, 21, '2022-05-23 02:43:44', '2022-05-23 02:43:44'),
(17, 'qui', 'nihil-eligendi-qui-non-laborum-aliquid-veniam-quia-tempore', 'Dolorem ut illo ut aut.', 'Dolorem aut et ut eius quas distinctio nostrum. Cum doloremque laudantium reiciendis amet. Officiis quod quis natus consequatur omnis qui in. Et id omnis delectus est soluta.', 7, 696.00, 127.00, 50.00, 'XS', 'https://via.placeholder.com/400x200.png/004466?text=dolorum', 'sale', 'inactive', 5, 61, 66, 20, '2022-05-23 02:43:44', '2022-05-23 02:43:44'),
(18, 'officiis', 'distinctio-exercitationem-voluptas-sint-eligendi-voluptatem', 'Voluptatibus autem qui quisquam minus.', 'Nihil et quod non sint. Est temporibus eos minus non adipisci rerum voluptate sapiente. Ut iure quae temporibus quis.', 6, 623.00, 909.00, 0.00, 'M', 'https://via.placeholder.com/400x200.png/00cccc?text=voluptas', 'popular', 'active', 5, 26, 40, 17, '2022-05-23 02:43:44', '2022-05-23 02:43:44'),
(19, 'quibusdam', 'nobis-ut-quia-consequatur-odit', 'Sint suscipit nihil inventore voluptatem facere.', 'Tempore autem sed eaque sed tempore error. Ullam et maxime voluptas. Repudiandae nihil tempora assumenda hic.', 4, 284.00, 587.00, 0.00, 'L', 'https://via.placeholder.com/400x200.png/00ee11?text=quis', 'popular', 'inactive', 8, 68, 69, NULL, '2022-05-23 02:43:44', '2022-05-23 02:43:44'),
(20, 'quaerat', 'occaecati-nemo-repudiandae-facilis-dolorem-reiciendis-ea-quidem', 'Magni fugit et commodi unde doloremque pariatur.', 'Cum voluptates dicta consequatur sed. Aliquid optio sequi aut quidem nihil. Et labore sunt voluptatibus impedit minus quod ut. Id ut ipsa mollitia deleniti ut. Aut ipsa voluptates rem. Ratione sit maiores laboriosam ex ut.', 8, 912.00, 462.00, 0.00, 'XXL', 'https://via.placeholder.com/400x200.png/0033dd?text=velit', 'winter', 'inactive', 10, 57, 40, 21, '2022-05-23 02:43:44', '2022-05-23 02:43:44'),
(21, 'assumenda', 'quam-quasi-sunt-et-porro-commodi-quo', 'Incidunt labore sed velit maiores.', 'Corporis et omnis enim quos tempore adipisci. Natus dolores asperiores et occaecati vero. Et voluptatem pariatur totam eligendi alias. Est enim qui totam accusantium omnis cum ut odit.', 3, 456.00, 958.00, 0.00, 'XS', 'https://via.placeholder.com/400x200.png/0022bb?text=dolorem', 'popular', 'active', 6, 38, 36, 22, '2022-05-23 02:43:44', '2022-05-23 02:43:44'),
(22, 'sed', 'qui-error-a-mollitia-cum-et', 'Vero officiis atque ipsa.', 'Sapiente facere doloremque quaerat sit eaque animi. Aspernatur quia necessitatibus placeat consequatur. Incidunt voluptatibus fuga aliquam eius maxime eum. Iste vel tenetur et eos vel. Assumenda ea animi sint.', 3, 139.00, 786.00, 0.00, 'XS', 'https://via.placeholder.com/400x200.png/0022ee?text=non', 'popular', 'inactive', 9, 58, 53, 2, '2022-05-23 02:43:44', '2022-05-23 02:43:44'),
(23, 'in', 'id-deserunt-praesentium-qui', 'Doloremque et et blanditiis officiis.', 'Sit eaque numquam sed doloribus quod impedit excepturi. Ea esse sed esse ea. Amet ut porro non suscipit magnam ipsa. Voluptatem possimus in ratione. Modi cum tempora corrupti dolorum. Sed voluptatibus omnis iste nihil velit eum.', 7, 388.00, 529.00, 0.00, 'M', 'https://via.placeholder.com/400x200.png/00ccff?text=odit', 'winter', 'active', 8, 42, 62, 25, '2022-05-23 02:43:44', '2022-05-23 02:43:44'),
(24, 'tenetur', 'distinctio-distinctio-distinctio-sed-iste-labore-cum', 'Hic deleniti aut dolor voluptatem magnam aut.', 'Doloremque blanditiis dolorem rerum quam ipsa ea voluptatem repudiandae. Nihil id beatae sunt. Quisquam facilis omnis qui ullam. Architecto minus velit ea non.', 8, 863.00, 826.00, 0.00, 'XS', 'https://via.placeholder.com/400x200.png/0055aa?text=sit', 'new', 'active', 8, 58, 37, 5, '2022-05-23 02:43:44', '2022-05-23 02:43:44'),
(25, 'laboriosam', 'aut-voluptatibus-voluptatum-voluptates', 'Nobis dignissimos velit provident aut non.', 'Quos iure eaque hic sint ratione molestiae. Sequi eveniet eos cum nemo aut libero rem repellendus.', 9, 348.00, 927.00, 0.00, 'S', 'https://via.placeholder.com/400x200.png/006600?text=quia', 'new', 'inactive', 10, 26, 53, NULL, '2022-05-23 02:43:44', '2022-05-23 02:43:44'),
(26, 'consectetur', 'et-molestias-repellendus-autem', 'Omnis enim eos expedita sed harum.', 'Placeat iste debitis nam odit pariatur et animi. Autem quis nostrum voluptatem aut voluptates quia dolores. Adipisci unde iure aut occaecati deleniti. Assumenda illum accusantium perspiciatis et illo eum.', 5, 991.00, 111.00, 0.00, 'XS', 'https://via.placeholder.com/400x200.png/004499?text=recusandae', 'winter', 'inactive', 4, 23, 40, 17, '2022-05-23 02:43:44', '2022-05-23 02:43:44'),
(27, 'quae', 'delectus-id-et-laudantium-rerum', 'Ut fuga et explicabo est qui qui.', 'Aut atque saepe quas officia accusantium expedita. Aut nihil sunt atque eius sapiente quasi fugit. Qui et id id dolor optio consequatur. Enim provident est ut voluptas non.', 10, 354.00, 589.00, 0.00, 'M', 'https://via.placeholder.com/400x200.png/0033cc?text=libero', 'popular', 'active', 8, 60, 40, NULL, '2022-05-23 02:43:44', '2022-05-23 02:43:44'),
(28, 'voluptatem', 'et-voluptas-voluptate-tempore-vel', 'Rerum eaque id sint vitae in.', 'Cumque iusto hic itaque eveniet eos et. Cupiditate distinctio vitae officiis sed amet aut accusantium in. Occaecati et corrupti fugit aut qui unde. Veniam alias incidunt perspiciatis harum ut aliquid.', 6, 919.00, 898.00, 0.00, 'M', 'https://via.placeholder.com/400x200.png/00bb44?text=earum', 'popular', 'active', 4, 26, 53, NULL, '2022-05-23 02:43:44', '2022-05-23 02:43:44'),
(29, 'et', 'qui-dignissimos-vel-velit-sint-aut-ducimus', 'Sunt debitis et atque illo dolor earum quos.', 'Reiciendis sit optio dolores autem nulla. Omnis magnam et saepe quasi non occaecati. Consequuntur deleniti repellat ipsa repellat repudiandae omnis officia.', 5, 850.00, 539.00, 40.00, 'XL', 'https://via.placeholder.com/400x200.png/008822?text=animi', 'sale', 'inactive', 10, 26, 62, NULL, '2022-05-23 02:43:44', '2022-05-23 02:43:44'),
(30, 'a', 'excepturi-id-incidunt-dolore-excepturi-eos-corrupti-explicabo-eum', 'Et optio alias fuga doloribus et sint optio.', 'Et quaerat accusamus quis nobis commodi quo occaecati et. Odit impedit excepturi soluta consequuntur consequatur commodi. Molestias quidem aut hic dolores iste animi qui.', 5, 193.00, 860.00, 0.00, 'L', 'https://via.placeholder.com/400x200.png/0055aa?text=ea', 'popular', 'active', 6, 70, 40, 5, '2022-05-23 02:43:44', '2022-05-23 02:43:44'),
(31, 'hic', 'illo-enim-optio-ipsum-sequi-autem-nisi-incidunt', 'Laudantium sint velit eum officiis.', 'Maiores corrupti enim id ab consectetur officiis modi. Deleniti quisquam dolores amet magnam excepturi aliquid molestiae et. Omnis dolorem voluptas sit hic recusandae maxime quibusdam. Nesciunt dolorum doloremque non dolor sint nesciunt.', 5, 942.00, 368.00, 0.00, 'XL', 'https://via.placeholder.com/400x200.png/006633?text=quas', 'new', 'inactive', 9, 59, 66, NULL, '2022-05-23 02:43:44', '2022-05-23 02:43:44'),
(32, 'excepturi', 'at-aperiam-dicta-et', 'Et id repellendus perspiciatis labore.', 'Beatae quis dolores consequatur veniam eveniet a voluptas. Recusandae aut facere consectetur et unde iste. Aut est natus excepturi commodi aliquid ipsum.', 3, 532.00, 307.00, 0.00, 'XS', 'https://via.placeholder.com/400x200.png/00ee55?text=nihil', 'popular', 'inactive', 6, 60, 63, 21, '2022-05-23 02:43:44', '2022-05-23 02:43:44'),
(33, 'earum', 'dolore-debitis-dignissimos-quia-possimus-sint', 'Commodi vero minima voluptatum repellendus qui.', 'Quam dolore incidunt sit dolorem earum repudiandae. Hic omnis est distinctio. Ut quisquam fugit ex aliquam culpa qui.', 9, 748.00, 178.00, 60.00, 'M', 'https://via.placeholder.com/400x200.png/003366?text=ab', 'sale', 'active', 10, 65, 33, NULL, '2022-05-23 02:43:44', '2022-05-23 02:43:44'),
(34, 'omnis', 'quia-porro-vel-explicabo-qui-corporis-provident', 'Sunt ab sit aut repudiandae.', 'Ea fugit explicabo debitis excepturi sit adipisci. Officia ea velit assumenda saepe et ex est. Mollitia quae quod enim sequi et esse inventore et. Commodi rerum qui aut.', 8, 604.00, 529.00, 50.00, 'M', 'https://via.placeholder.com/400x200.png/001144?text=quasi', 'sale', 'inactive', 10, 55, 63, 21, '2022-05-23 02:43:44', '2022-05-23 02:43:44'),
(35, 'et', 'sint-quae-corporis-quia-blanditiis-omnis', 'Nobis ut vel laborum neque odio in itaque.', 'Fugiat illum sed quos consequatur magni delectus. Ipsum id incidunt architecto eum facilis quos harum. Eius reprehenderit veniam at laudantium. Aperiam enim eius velit vero rerum ut molestiae. Culpa saepe aut rem sapiente ex harum beatae.', 4, 727.00, 536.00, 0.00, 'XL', 'https://via.placeholder.com/400x200.png/0033aa?text=qui', 'new', 'inactive', 9, 70, 36, 5, '2022-05-23 02:43:44', '2022-05-23 02:43:44'),
(36, 'nisi', 'consequatur-minima-quis-enim-consequatur-sint', 'Mollitia id tempora sit velit officiis.', 'Rerum pariatur explicabo rerum adipisci. Et dolorem deserunt earum unde quasi sit. Recusandae id sed minima inventore et. Pariatur enim rerum rerum autem suscipit perferendis.', 9, 490.00, 756.00, 0.00, 'M', 'https://via.placeholder.com/400x200.png/0022ff?text=aliquid', 'new', 'active', 5, 61, 54, 26, '2022-05-23 02:43:44', '2022-05-23 02:43:44'),
(37, 'aut', 'aliquid-ullam-molestiae-enim-consequuntur-placeat-est', 'Aut adipisci fugit in laboriosam.', 'Voluptas vel a temporibus nihil et voluptate. Consequatur non earum odit earum voluptatibus molestiae amet. Quia quos consectetur aut. Nihil error optio nisi deleniti iste ipsa.', 4, 793.00, 991.00, 0.00, 'XS', 'https://via.placeholder.com/400x200.png/00bb66?text=harum', 'winter', 'inactive', 10, 58, 66, 26, '2022-05-23 02:43:44', '2022-05-23 02:43:44'),
(38, 'dolores', 'voluptatem-dicta-consequatur-nostrum-quam', 'Aut dicta sed sed iure ut provident totam.', 'Ea quos non nam magnam. Eius quia tenetur beatae. Doloribus qui in doloremque nobis voluptatibus ullam. Et quia fugit enim. Impedit rerum vel autem odio quae hic. Est ut alias et dolore rerum non consequuntur laudantium.', 5, 691.00, 466.00, 70.00, 'S', 'https://via.placeholder.com/400x200.png/003300?text=sapiente', 'sale', 'active', 9, 70, 33, 5, '2022-05-23 02:43:44', '2022-05-23 02:43:44'),
(39, 'dolor', 'libero-voluptas-et-molestias-dignissimos-aliquid-eaque', 'Qui et aperiam rerum sint.', 'Omnis doloribus itaque omnis voluptatum. Velit beatae ut explicabo ab. Natus aut incidunt consequuntur dolores. Eaque necessitatibus quo ex ducimus.', 7, 243.00, 468.00, 0.00, 'XS', 'https://via.placeholder.com/400x200.png/009900?text=commodi', 'popular', 'active', 9, 23, 52, NULL, '2022-05-23 02:43:44', '2022-05-23 02:43:44'),
(40, 'soluta', 'facilis-laboriosam-voluptates-qui-deserunt-repudiandae-non', 'Tenetur totam recusandae nihil fugiat.', 'Facere voluptas quis et officia quia omnis. Voluptatem sit recusandae numquam occaecati molestiae esse vel. Atque eveniet neque corporis placeat. Voluptas et officiis voluptates id.', 2, 842.00, 549.00, 0.00, 'M', 'https://via.placeholder.com/400x200.png/00cc44?text=repudiandae', 'new', 'active', 5, 39, 37, NULL, '2022-05-23 02:43:44', '2022-05-23 02:43:44'),
(41, 'voluptate', 'et-at-quia-est-cupiditate-similique-tenetur', 'Enim quis nihil et laborum.', 'Fuga dolor et laboriosam omnis sit. Omnis quisquam dolore sit beatae. Ea nostrum amet enim reprehenderit. Sint enim pariatur porro et dolores sit. Alias et harum est rerum blanditiis pariatur. Excepturi vel libero adipisci quia.', 9, 498.00, 517.00, 0.00, 'L', 'https://via.placeholder.com/400x200.png/0077ff?text=et', 'winter', 'inactive', 4, 35, 40, NULL, '2022-05-23 02:43:44', '2022-05-23 02:43:44'),
(42, 'odio', 'eaque-reprehenderit-dicta-iusto-assumenda-odio-rem', 'Tempora ad est eum possimus quia.', 'Asperiores maxime dolor dolorem ut. Repellat ex natus fuga ducimus animi. Velit culpa ipsam consectetur quos. Accusamus asperiores unde assumenda et quod nulla.', 4, 799.00, 416.00, 0.00, 'XL', 'https://via.placeholder.com/400x200.png/00aa33?text=commodi', 'winter', 'inactive', 9, 42, 36, 21, '2022-05-23 02:43:44', '2022-05-23 02:43:44'),
(43, 'dolorem', 'qui-perferendis-nisi-illum', 'Odit est quam non minima.', 'Incidunt voluptatem porro est consequatur ab rerum. Vitae in illo animi sequi. Eum inventore officia doloremque est. Dignissimos esse ipsum unde. Voluptatum officia ut laboriosam illo voluptate voluptatem. Consectetur dolores possimus illum maxime ut.', 7, 983.00, 388.00, 0.00, 'M', 'https://via.placeholder.com/400x200.png/00bbaa?text=voluptas', 'popular', 'active', 8, 56, 53, 10, '2022-05-23 02:43:44', '2022-05-23 02:43:44'),
(44, 'voluptatem', 'odio-saepe-ex-praesentium-reiciendis-in-ex', 'Unde harum reprehenderit hic.', 'Quisquam esse sit voluptatibus inventore dolor id voluptas. Fuga qui placeat eum asperiores. Et eius soluta autem dicta. Fugit sequi ad minima minus et. Rerum velit temporibus enim aut. Explicabo quis molestias et illo quia ex.', 2, 981.00, 473.00, 40.00, 'XL', 'https://via.placeholder.com/400x200.png/000077?text=ut', 'sale', 'active', 9, 70, 37, 2, '2022-05-23 02:43:44', '2022-05-23 02:43:44'),
(45, 'velit', 'sint-molestias-assumenda-sapiente-exercitationem-aspernatur-cum-totam', 'Eum quo tempore asperiores placeat harum rerum.', 'Corporis possimus quisquam voluptas temporibus nobis laborum. Inventore molestiae tenetur dolor impedit. Illum nihil sed ullam necessitatibus.', 7, 760.00, 984.00, 60.00, 'M', 'https://via.placeholder.com/400x200.png/0033cc?text=aut', 'sale', 'inactive', 5, 64, 62, 20, '2022-05-23 02:43:44', '2022-05-23 02:43:44'),
(46, 'dolorum', 'eum-fuga-laudantium-molestias-dolore-ratione-qui-est', 'Dolor rem vitae expedita temporibus.', 'Dolores atque repellendus quo mollitia repellat. Alias temporibus porro quia et veritatis. Enim ut omnis asperiores sit qui. Doloribus occaecati doloribus similique dolor quae facilis.', 2, 357.00, 466.00, 0.00, 'XL', 'https://via.placeholder.com/400x200.png/00ff11?text=aperiam', 'new', 'active', 10, 65, 62, 2, '2022-05-23 02:43:44', '2022-05-23 02:43:44'),
(47, 'et', 'omnis-tempore-et-vel-non-quibusdam-aut', 'Harum iste vero corrupti repudiandae.', 'Ducimus exercitationem distinctio earum quaerat exercitationem laudantium mollitia. Eum animi sed nesciunt nobis iste recusandae. Ea quae blanditiis vero eum aliquam cum. Aut quis molestiae blanditiis est dolorem.', 4, 624.00, 504.00, 0.00, 'XS', 'https://via.placeholder.com/400x200.png/006611?text=et', 'popular', 'inactive', 5, 26, 53, 22, '2022-05-23 02:43:44', '2022-05-23 02:43:44'),
(48, 'eaque', 'quae-quas-ab-quam-adipisci-voluptatem-aperiam-dolor', 'Perspiciatis aut soluta impedit est.', 'Recusandae fugit exercitationem qui sit quidem nobis. Temporibus nesciunt possimus sint ut quidem sint in. Minima dolorem itaque nam rerum quis aut voluptatem. Aut voluptatem consequatur aut aut est et dolorum.', 5, 825.00, 225.00, 0.00, 'S', 'https://via.placeholder.com/400x200.png/001122?text=perspiciatis', 'new', 'active', 9, 59, 54, 5, '2022-05-23 02:43:44', '2022-05-23 02:43:44'),
(49, 'cupiditate', 'quidem-quos-quia-a-et', 'Necessitatibus ut qui rerum ut voluptatem eius.', 'Quod a eos a saepe dolore aut. Maiores ab possimus molestias voluptatem dolores. Tempora sed molestias excepturi deserunt. Velit voluptates laudantium cupiditate animi eos quia.', 8, 702.00, 132.00, 0.00, 'XXL', 'https://via.placeholder.com/400x200.png/0044ff?text=quo', 'popular', 'inactive', 8, 61, 33, 20, '2022-05-23 02:43:44', '2022-05-23 02:43:44'),
(50, 'voluptatem', 'eius-sit-sequi-commodi-minima-qui-est', 'Facere nisi et consectetur ut.', 'Voluptatem omnis est natus nesciunt voluptatum. Officiis at porro quia eum. Aliquid doloribus excepturi expedita placeat numquam aperiam.', 3, 635.00, 618.00, 0.00, 'XS', 'https://via.placeholder.com/400x200.png/007744?text=autem', 'new', 'active', 6, 64, 66, NULL, '2022-05-23 02:43:44', '2022-05-23 02:43:44'),
(51, 'hello', 'hello', '<p>ada</p>', '<p>addadad</p>', 10, 100.00, 90.00, 0.00, 'XS', '/storage/photos/1/sp.jpg', 'new', 'active', 5, 35, 33, 5, '2022-05-24 01:01:25', '2022-05-24 01:01:25'),
(52, 'lorem and djklds kdsfhjl dsfjdasf dsljdf lljdf dasfljdlf kjdfkjl kjdsf', 'lorem-and-djklds-kdsfhjl-dsfjdasf-dsljdf-lljdf-dasfljdlf-kjdfkjl-kjdsf', '<p>dasf</p>', '<p>adsf</p>', 22, 100.00, 98.00, 0.00, 'XS', '/storage/photos/1/259316.jpg', 'new', 'active', 5, 23, 60, NULL, '2022-05-24 01:08:30', '2022-05-24 01:08:30'),
(53, 'akash', 'akash', '<p>akash</p>', '<p>akash</p>', 1000, 100.00, 90.00, 0.00, 'S', '/storage/photos/1/pexels-evie-shaffer-11431628.jpg', 'new', 'active', 4, 35, 36, 5, '2022-05-24 03:17:54', '2022-05-24 03:17:54'),
(54, 'updated', 'updated', 'menaing', NULL, 400, 4000.00, 0.00, 0.00, 'XXL', '/storage/photos/1/sp.jpg,/storage/photos/1/pexels-evie-shaffer-11431628.jpg', 'new', 'active', 4, 61, NULL, NULL, '2022-05-24 05:05:47', '2022-05-25 00:19:44');

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
  `role` enum('admin','vendor','customer') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'customer',
  `status` enum('active','inactive') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'active',
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `full_name`, `username`, `email`, `email_verified_at`, `password`, `photo`, `phone`, `address`, `role`, `status`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'ziaul Haq', 'Admin', 'admin@gmail.com', NULL, '$2y$10$Gxq05SKOiCdsthYpmvGsDuRkzntazgm1gJC.K1aALGJHxobn05aDy', 'https://via.placeholder.com/60x60.png/00aaff?text=veniam', NULL, NULL, 'admin', 'active', NULL, '2022-05-02 07:57:37', '2022-05-16 07:57:41'),
(2, 'Sadia Uddin', 'Vendor', 'vendor@gmail.com', NULL, '$2y$10$3roIuogbNwxJs2x0kvcqVuQ1WyvSe0g4I1LQpW0cxfv0gIo/ApjW.', 'https://via.placeholder.com/60x60.png/00aaff?text=veniam', NULL, NULL, 'vendor', 'inactive', NULL, '2022-05-11 07:57:43', '2022-05-09 07:57:45'),
(3, 'shorif uddin', 'Customer', 'customer@gmail.com', NULL, '$2y$10$nyhqGrE9sRdZBujGsTCrGu.y7YJ7iZeTJv/xhUWYkocadjefFjqDO', 'https://via.placeholder.com/60x60.png/00aaff?text=veniam', NULL, NULL, 'customer', 'active', NULL, '2022-05-03 07:57:47', '2022-05-02 07:57:50'),
(4, 'Cortez Corkery', NULL, 'xprohaska@example.com', '2022-05-09 22:17:44', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'https://via.placeholder.com/60x60.png/00aaff?text=veniam', '1-573-599-5241', '40729 Harvey Lodge\nAdrianbury, PA 47581-0362', 'admin', 'active', 'RkycoRz6XH', '2022-05-09 22:17:44', '2022-05-09 22:17:44'),
(5, 'Maude Hauck', NULL, 'jessica25@example.com', '2022-05-09 22:17:44', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'https://via.placeholder.com/60x60.png/005599?text=aspernatur', '1-580-867-8117', '3354 Brenna Walk\nLoweview, IN 04339', 'vendor', 'active', '7BNqne7WJg', '2022-05-09 22:17:44', '2022-05-09 22:17:44'),
(7, 'Mekhi DuBuque V', NULL, 'irussel@example.org', '2022-05-09 22:17:44', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'https://via.placeholder.com/60x60.png/001177?text=voluptates', '+1-346-877-8994', '539 Leda Wall Apt. 086\nGenesisville, OR 35748-5636', 'customer', 'inactive', 'DaSbAoR2SD', '2022-05-09 22:17:44', '2022-05-09 22:17:44'),
(8, 'Chaim Grant', NULL, 'tweber@example.org', '2022-05-09 22:17:44', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'https://via.placeholder.com/60x60.png/0099bb?text=nam', '+19709588194', '80574 Goodwin Forest\nMarcelleland, VA 50133-1424', 'customer', 'inactive', '8KMcphmhcQ', '2022-05-09 22:17:44', '2022-05-09 22:17:44'),
(10, 'Dr. Harold Parker', NULL, 'jerrold.murray@example.org', '2022-05-09 22:17:44', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'https://via.placeholder.com/60x60.png/001177?text=et', '1-714-454-0185', '281 Tillman Road Apt. 171\nHilpertberg, IL 08206', 'vendor', 'inactive', 'DsukvtvxOB', '2022-05-09 22:17:44', '2022-05-09 22:17:44'),
(13, 'Kasey Rowe', NULL, 'yundt.brooke@example.com', '2022-05-09 22:17:44', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'https://via.placeholder.com/60x60.png/0066ff?text=ullam', '480-235-3101', '99028 Hegmann Vista\nMarianchester, MN 47753-7574', 'admin', 'active', 'PmZ2F8CVY9', '2022-05-09 22:17:44', '2022-05-09 22:17:44'),
(14, 'Dessie Cremin', NULL, 'mkonopelski@example.net', '2022-05-09 22:17:44', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'https://via.placeholder.com/60x60.png/0033dd?text=quidem', '(878) 372-4718', '634 Reichert Hills\nWileymouth, MN 21779-9042', 'customer', 'active', 'YGsdXvKJGb', '2022-05-09 22:17:44', '2022-05-09 22:17:44'),
(15, 'Miss Mozell Hudson', NULL, 'sharber@example.net', '2022-05-09 22:17:44', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'https://via.placeholder.com/60x60.png/00bbff?text=dolorem', '724.210.0957', '978 Hegmann Camp\nKearaberg, FL 51905', 'admin', 'active', '7KEqSzjImj', '2022-05-09 22:17:44', '2022-05-09 22:17:44'),
(16, 'Mr. Demario Gaylord DVM', NULL, 'randal.white@example.com', '2022-05-09 22:17:44', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'https://via.placeholder.com/60x60.png/00cc11?text=doloremque', '1-442-271-3361', '508 Madeline Spur\nEast Candidoland, MS 03297-2132', 'customer', 'active', 'RRfosiXH4d', '2022-05-09 22:17:44', '2022-05-09 22:17:44'),
(17, 'Simeon Langosh V', NULL, 'landen76@example.com', '2022-05-09 22:17:44', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'https://via.placeholder.com/60x60.png/0000ff?text=placeat', '+1.813.540.6194', '41384 Franecki Island Suite 656\nPollichhaven, NC 76833', 'vendor', 'active', '2TqEcndqcx', '2022-05-09 22:17:44', '2022-05-09 22:17:44'),
(18, 'Cedrick Hackett', NULL, 'hyatt.olin@example.com', '2022-05-09 22:17:44', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'https://via.placeholder.com/60x60.png/00ffdd?text=consequatur', '+1.351.394.0675', '822 Yolanda Cliff Apt. 134\nEast David, FL 22435-0349', 'admin', 'inactive', 'F3WjeJEt5r', '2022-05-09 22:17:44', '2022-05-09 22:17:44'),
(19, 'Magnolia Leuschke PhD', NULL, 'sauer.sonia@example.com', '2022-05-09 22:17:44', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'https://via.placeholder.com/60x60.png/004499?text=earum', '520-237-8532', '7299 Alden Springs Apt. 256\nRennerfurt, IL 75594-2345', 'customer', 'active', 'CgTTOnKWht', '2022-05-09 22:17:44', '2022-05-09 22:17:44'),
(20, 'Prof. Cordelia Lakin', NULL, 'osborne.bailey@example.net', '2022-05-09 22:17:44', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'https://via.placeholder.com/60x60.png/00ddcc?text=perspiciatis', '+1-904-315-2846', '590 Sarai Hill\nPort Paxton, AK 45797-0667', 'vendor', 'inactive', 'XtOVMCMSc6', '2022-05-09 22:17:44', '2022-05-09 22:17:44'),
(21, 'Karianne Kassulke', NULL, 'nullrich@example.org', '2022-05-09 22:17:44', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'https://via.placeholder.com/60x60.png/002288?text=non', '+1 (838) 421-9974', '694 Predovic Cove\nWest Isadoreland, MT 35605', 'vendor', 'inactive', '0EY4InzWqt', '2022-05-09 22:17:44', '2022-05-09 22:17:44'),
(22, 'Palma Donnelly', NULL, 'sydni99@example.com', '2022-05-09 22:17:44', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'https://via.placeholder.com/60x60.png/000022?text=quibusdam', '(941) 436-5275', '478 Paucek Cape Suite 663\nMohammadview, OK 48775-6847', 'vendor', 'inactive', 'g7fLoBATe1', '2022-05-09 22:17:44', '2022-05-09 22:17:44'),
(23, 'Lysanne Heidenreich', NULL, 'mckenzie.waino@example.org', '2022-05-09 22:17:44', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'https://via.placeholder.com/60x60.png/009999?text=magnam', '1-689-874-5787', '10341 Breitenberg Meadows\nNorth Jaynechester, VT 44220-3033', 'admin', 'active', 's9TfcQdoTY', '2022-05-09 22:17:44', '2022-05-09 22:17:44'),
(24, 'Prof. Isabella Barton', NULL, 'dangelo09@example.org', '2022-05-09 22:17:44', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'https://via.placeholder.com/60x60.png/00dd77?text=omnis', '412.941.7989', '463 Ozella Fall\nPort Kristinaland, WI 89871-6668', 'admin', 'active', 'TBS2AIoNo5', '2022-05-09 22:17:44', '2022-05-09 22:17:44'),
(25, 'Cindy Wolff', NULL, 'reilly.freddy@example.com', '2022-05-09 22:17:44', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'https://via.placeholder.com/60x60.png/00aa77?text=quasi', '858-309-6028', '494 Albina Bypass\nTremblayview, UT 03680', 'vendor', 'inactive', '47EgXoZm9D', '2022-05-09 22:17:44', '2022-05-09 22:17:44'),
(26, 'Waino Howe', NULL, 'annette.johnston@example.com', '2022-05-09 22:17:44', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'https://via.placeholder.com/60x60.png/0011bb?text=atque', '+1-912-619-3045', '411 Edyth Crossing Apt. 566\nLake Estelleport, NE 26088', 'vendor', 'active', 'e1CejGqCjK', '2022-05-09 22:17:44', '2022-05-09 22:17:44'),
(27, 'Chris Hettinger', NULL, 'farrell.cheyenne@example.org', '2022-05-09 22:17:44', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'https://via.placeholder.com/60x60.png/00eeff?text=eligendi', '1-779-633-6308', '8866 Marcia Ridges Suite 728\nWeberland, CT 87103', 'customer', 'active', 'j8GoqlLRGZ', '2022-05-09 22:17:44', '2022-05-09 22:17:44'),
(28, 'Dr. Romaine Sauer', NULL, 'cleo18@example.com', '2022-05-09 22:17:44', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'https://via.placeholder.com/60x60.png/006644?text=et', '+1 (254) 358-5508', '4396 Jamir Forge\nKuphalton, ME 51376', 'admin', 'active', 'oAmLNnR5d9', '2022-05-09 22:17:44', '2022-05-09 22:17:44'),
(29, 'Deven Dibbert', NULL, 'madeline.kuhlman@example.com', '2022-05-09 22:17:44', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'https://via.placeholder.com/60x60.png/00aaaa?text=eaque', '+1 (540) 679-9134', '16105 Roy Viaduct\nEast Berenice, NH 08462-5519', 'vendor', 'inactive', 'SyEC55r8jt', '2022-05-09 22:17:44', '2022-05-09 22:17:44'),
(30, 'Tyler Heller', NULL, 'becker.amara@example.org', '2022-05-09 22:17:44', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'https://via.placeholder.com/60x60.png/0011dd?text=quae', '(680) 903-8225', '8279 Cormier Mountain\nAiyanafurt, AL 14183-9858', 'admin', 'inactive', 'i27SBLe5rz', '2022-05-09 22:17:44', '2022-05-09 22:17:44'),
(31, 'Davin Schinner', NULL, 'ryder.macejkovic@example.com', '2022-05-09 22:17:44', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'https://via.placeholder.com/60x60.png/008888?text=cum', '(586) 993-2888', '6742 Madonna Union\nWest Lysanne, IL 04114', 'admin', 'active', 'krMsMwtG74', '2022-05-09 22:17:44', '2022-05-09 22:17:44'),
(32, 'Prof. Audie Hayes II', NULL, 'mann.denis@example.net', '2022-05-09 22:17:44', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'https://via.placeholder.com/60x60.png/009955?text=quis', '262-549-9162', '266 Dibbert Walk\nSouth Anastasia, NC 77392-9512', 'admin', 'active', 'N0Mkzol56q', '2022-05-09 22:17:44', '2022-05-09 22:17:44'),
(33, 'Dr. Ona Goyette II', NULL, 'haag.ernestina@example.org', '2022-05-09 22:17:44', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'https://via.placeholder.com/60x60.png/00ffdd?text=tenetur', '+1.385.589.0068', '6777 Terrill Overpass\nO\'Connellfort, NM 33042-2775', 'customer', 'inactive', 'kdfenfrlVi', '2022-05-09 22:17:44', '2022-05-09 22:17:44'),
(34, 'shada', 'dasd', 'jya3d@xojh.com', NULL, '$2y$10$jFQESKqSwNnjTMunC56FL.KbWHJQIOTxEQ0n5O0i6RNhCdlidkaam', '/storage/photos/1/pexels-evie-shaffer-11431628.jpg', '498282', 'E1RFhKVTAw', 'vendor', 'inactive', NULL, '2022-05-25 03:29:33', '2022-05-25 04:01:43');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `banners`
--
ALTER TABLE `banners`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `banners_slug_unique` (`slug`);

--
-- Indexes for table `brands`
--
ALTER TABLE `brands`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `brands_slug_unique` (`slug`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `categories_slug_unique` (`slug`),
  ADD KEY `categories_parent_id_foreign` (`parent_id`);

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
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

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
  ADD UNIQUE KEY `products_slug_unique` (`slug`),
  ADD KEY `products_brand_id_foreign` (`brand_id`),
  ADD KEY `products_parent_category_id_foreign` (`parent_category_id`),
  ADD KEY `products_child_category_id_foreign` (`child_category_id`),
  ADD KEY `products_vendor_id_foreign` (`vendor_id`);

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
-- AUTO_INCREMENT for table `banners`
--
ALTER TABLE `banners`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `brands`
--
ALTER TABLE `brands`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=71;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `categories`
--
ALTER TABLE `categories`
  ADD CONSTRAINT `categories_parent_id_foreign` FOREIGN KEY (`parent_id`) REFERENCES `categories` (`id`) ON DELETE SET NULL;

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_brand_id_foreign` FOREIGN KEY (`brand_id`) REFERENCES `brands` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `products_child_category_id_foreign` FOREIGN KEY (`child_category_id`) REFERENCES `categories` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `products_parent_category_id_foreign` FOREIGN KEY (`parent_category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `products_vendor_id_foreign` FOREIGN KEY (`vendor_id`) REFERENCES `users` (`id`) ON DELETE SET NULL;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
