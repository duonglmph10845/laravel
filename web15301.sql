-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th8 11, 2021 lúc 06:48 AM
-- Phiên bản máy phục vụ: 10.4.13-MariaDB
-- Phiên bản PHP: 7.4.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `web15301`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `categories`
--

INSERT INTO `categories` (`id`, `name`, `created_at`, `updated_at`) VALUES
(25, 'THỜI TRANG NỮ', '2021-07-30 07:50:21', '2021-07-30 07:50:21'),
(26, 'PHỤ KIỆN', '2021-07-30 07:50:35', '2021-07-30 07:50:35'),
(27, 'THỜI TRANG NAM', '2021-07-30 07:50:50', '2021-07-30 07:50:50'),
(28, 'KID', '2021-07-30 07:51:02', '2021-07-30 07:51:02'),
(29, 'GIÁ ĐẶC BIỆT', '2021-07-30 07:51:15', '2021-07-30 07:51:15');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `comments`
--

CREATE TABLE `comments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `noi_dung` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_id` bigint(20) NOT NULL,
  `user_id` bigint(20) NOT NULL,
  `ngay_bl` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `comments`
--

INSERT INTO `comments` (`id`, `noi_dung`, `product_id`, `user_id`, `ngay_bl`, `created_at`, `updated_at`) VALUES
(1, 'áo đẹp shop ạ', 1, 5, '2021-08-08', NULL, NULL),
(2, 'chất liệu tốt.', 1, 5, '2021-08-04', NULL, NULL),
(3, 'mặc rất đẹp.', 2, 6, '2021-08-04', NULL, NULL),
(5, 'sản phẩm tốt.', 35, 150, '2021-08-08', '2021-08-08 06:30:06', '2021-08-08 06:30:06');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `failed_jobs`
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
-- Cấu trúc bảng cho bảng `invoices`
--

CREATE TABLE `invoices` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) NOT NULL,
  `number` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `total_price` bigint(20) UNSIGNED NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `invoices`
--

INSERT INTO `invoices` (`id`, `user_id`, `number`, `address`, `total_price`, `status`, `created_at`, `updated_at`) VALUES
(1, 5, '0983335201', 'hà nội', 960000, 3, NULL, '2021-08-10 01:59:04'),
(2, 150, '0983335201', 'hà nội', 960000, 1, NULL, NULL),
(3, 150, '0983335201', 'Mỹ Đình Hà Nội', 1, 1, '2021-08-10 07:33:55', '2021-08-10 07:33:55'),
(4, 150, '0983335201', 'Mỹ Đình Hà Nội', 1, 1, '2021-08-10 07:35:18', '2021-08-10 07:35:18'),
(5, 150, '0983335201', 'Mỹ Đình Hà Nội', 1, 1, '2021-08-10 07:42:11', '2021-08-10 07:42:11'),
(6, 150, '0983335201', 'Mỹ Đình Hà Nội', 1, 1, '2021-08-10 07:44:42', '2021-08-10 07:44:42');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `invoice_details`
--

CREATE TABLE `invoice_details` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `invoice_id` bigint(20) NOT NULL,
  `product_id` bigint(20) NOT NULL,
  `unit_price` double UNSIGNED NOT NULL,
  `quantity` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `invoice_details`
--

INSERT INTO `invoice_details` (`id`, `invoice_id`, `product_id`, `unit_price`, `quantity`, `created_at`, `updated_at`) VALUES
(1, 1, 3, 996000, 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2021_07_03_095036_create_products_table', 1),
(5, '2021_07_03_095845_create_categories_table', 1),
(6, '2021_07_15_063938_edit_products_table', 2),
(7, '2021_07_20_085103_create_invoice_details_table', 3),
(8, '2021_07_20_085243_create_invoices_table', 3),
(9, '2021_07_30_023127_create_sliders_table', 4),
(10, '2021_08_03_095523_create_comments_table', 5);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` int(11) NOT NULL DEFAULT 0,
  `quantity` int(11) NOT NULL DEFAULT 0,
  `category_id` bigint(20) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `products`
--

INSERT INTO `products` (`id`, `name`, `price`, `quantity`, `category_id`, `created_at`, `updated_at`, `image`) VALUES
(1, 'Brown Short Taffeta Pants', 996000, 82, 25, NULL, '2021-07-30 09:16:42', 'http://localhost:8000/storage/photos/121/products/_DSC6015.jpg'),
(2, 'Beige Khaki Trousers Pants', 996000, 79, 25, NULL, '2021-07-30 09:16:28', 'http://localhost:8000/storage/photos/121/products/_DSC4001.jpg'),
(3, 'Short Sleeves Shirt', 996000, 99, 25, NULL, '2021-07-30 09:16:13', 'http://localhost:8000/storage/photos/121/products/_DSC6396.jpg'),
(20, 'Black Mini Skirt With Buttons', 996000, 2324, 25, '2021-07-25 08:23:39', '2021-07-30 09:15:37', 'http://localhost:8000/storage/photos/121/products/_DSC6555.jpg'),
(35, 'Cream Leopard Midi Silk Dress', 996000, 22, 25, '2021-07-30 09:17:19', '2021-07-30 09:17:19', 'http://localhost:8000/storage/photos/121/products/DSCF0308 1.jpg'),
(36, 'Leopard Prints Midi Silk Dress', 2496000, 22, 25, '2021-07-30 09:18:10', '2021-07-30 09:18:10', 'http://localhost:8000/storage/photos/121/products/DSCF1950 3.jpg'),
(37, 'Short Sleeves Silk Shirt', 996, 22, 25, '2021-07-30 09:18:40', '2021-07-30 09:18:40', 'http://localhost:8000/storage/photos/121/products/_DSC3781.jpg'),
(38, 'Black Leopard Midi Chiffon Dress', 1000000, 22, 25, '2021-07-30 09:19:13', '2021-07-30 09:19:13', 'http://localhost:8000/storage/photos/121/products/DSCF0308 1.jpg'),
(39, 'Atticus Blue Stripe Shirt 2', 423000, 22, 25, '2021-08-09 20:23:32', '2021-08-09 20:30:09', 'http://localhost:8000/storage/photos/150/z2635771940610_1926bb4e98fe76f4a3f011c9f2b5aeb8-1627105468.jpg');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `sliders`
--

CREATE TABLE `sliders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `sliders`
--

INSERT INTO `sliders` (`id`, `name`, `description`, `image`, `created_at`, `updated_at`) VALUES
(1, 'slide1', 'asđ', 'http://localhost:8000/storage/photos/121/123.png', '2021-07-29 20:25:25', '2021-08-10 00:16:40'),
(2, 'LÊ MẠNH DƯƠNG', 'asđ', 'http://localhost:8000/storage/photos/121/82831615_589013101939839_6638956984966053888_n.jpg', '2021-07-29 20:27:47', '2021-07-29 20:27:47'),
(3, 'aebcc', 'asđ', 'http://localhost:8000/storage/photos/150/z2506896623371_219100d80bd4f8141e47982c4ffbf82f.jpg', '2021-08-10 00:33:44', '2021-08-10 00:33:44');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gender` int(11) NOT NULL DEFAULT 1,
  `role` int(11) NOT NULL DEFAULT 1,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `address`, `gender`, `role`, `remember_token`, `created_at`, `updated_at`) VALUES
(5, 'Isabel Powlowski', 'cassin.lucious@yahoo.com', NULL, 'a788f6d55914857d4b97c1de99cb896b', '580 Amiya Harbor Suite 545\nPort Lonietown, IL 05336-5191', 1, 1, NULL, NULL, NULL),
(6, 'Mr. Sydney Schmitt', 'michel.orn@beahan.com', NULL, '', '2057 Kreiger Pike\nJuniorland, CT 63620-0217', 1, 1, NULL, NULL, NULL),
(7, 'Makenzie Heidenreich', 'khaley@rohan.com', NULL, '', '993 Bella Loop\nPort Cordellton, ND 05972', 1, 1, NULL, NULL, NULL),
(8, 'Kameron Gaylord', 'feeney.isabell@hotmail.com', NULL, '', '5910 Ferne Meadow\nSouth Nathanael, AR 80519-8513', 1, 1, NULL, NULL, NULL),
(9, 'Lyda Hamill', 'veum.celestine@hotmail.com', NULL, '', '1954 Anabelle Trace Suite 305\nLaurianebury, OK 26301-9932', 1, 1, NULL, NULL, NULL),
(10, 'Alessandro Graham Jr.', 'davis.margarita@hotmail.com', NULL, '', '727 Langosh Brook\nNorth Haleigh, WV 37150', 1, 1, NULL, NULL, NULL),
(11, 'Glenda Wiegand', 'stephanie11@abernathy.org', NULL, '', '409 Ziemann Road Suite 122\nPort Tyreek, WY 11504-1748', 1, 1, NULL, NULL, NULL),
(12, 'Ms. Kailee Stokes I', 'marques.stark@oreilly.com', NULL, '', '963 Kiehn Track Suite 341\nLake Sydnie, OH 41505-5755', 1, 1, NULL, NULL, NULL),
(13, 'Anne Gusikowski', 'leonardo.kessler@jakubowski.org', NULL, '', '1107 Elza Way Suite 141\nSchaeferton, MD 89622', 1, 1, NULL, NULL, NULL),
(14, 'Helene Wilkinson', 'weldon.schulist@will.com', NULL, '', '45625 Janae Square Apt. 948\nQueenieton, MO 43912', 1, 1, NULL, NULL, NULL),
(15, 'Mrs. Leonie Auer Jr.', 'crooks.may@kilback.com', NULL, '', '9534 Wiegand Creek Apt. 035\nNorth Eviestad, IL 23038-0490', 1, 1, NULL, NULL, NULL),
(16, 'Eino Grimes', 'erling45@crona.com', NULL, '', '7092 Mraz Grove Apt. 300\nSauerview, OH 36867', 1, 1, NULL, NULL, NULL),
(17, 'Letitia Johnson', 'zfeil@mraz.com', NULL, '', '192 Reyes Cliffs\nTorphyberg, WV 68154', 1, 1, NULL, NULL, NULL),
(18, 'Dr. Noemy O\'Connell', 'moore.shaina@beier.com', NULL, '', '19458 Sydni Vista Apt. 948\nEast Deja, MS 02617', 1, 1, NULL, NULL, NULL),
(19, 'Prof. Mathilde Osinski IV', 'nico.windler@hotmail.com', NULL, '', '3592 Gaylord Forest Suite 857\nEbertview, AZ 17546', 1, 1, NULL, NULL, NULL),
(20, 'Mr. Noe Beier', 'genesis.connelly@mohr.com', NULL, '', '411 Brock Skyway Apt. 834\nSouth Troy, UT 67224', 1, 1, NULL, NULL, NULL),
(21, 'Abagail Orn', 'carroll.alicia@hotmail.com', NULL, '$2y$10$pFyl49dFAxm0fsj2bYTRKuH/1gXR/GAKgeUDJZgpp.q5uMipr9bfe', '47868 Ezekiel Prairie\nWainoton, NC 43982', 1, 1, NULL, NULL, NULL),
(22, 'Ava Donnelly V', 'naomie.stracke@haley.biz', NULL, '$2y$10$uNAUJET9Iv36XPMMigRjfexm6Xz5vzPO2WDZXdpoXnIhpOHWGlPN.', '43824 Leonor Ports\nWest Marques, PA 34261-2055', 1, 1, NULL, NULL, NULL),
(23, 'Chadrick Prohaska', 'mzboncak@casper.info', NULL, '$2y$10$BfTyCVI0Xim8liXC76zSpe2Yl7QsBvUFoxWRFdkYy0dwqs/QlaV0.', '121 Javier Estates\nBaumbachmouth, SC 18263-0297', 1, 1, NULL, NULL, NULL),
(24, 'Prof. Kurtis Kovacek', 'ymonahan@yahoo.com', NULL, '$2y$10$plvlx6hhMAVzxH//ukh2JekEibdQ06erTO2Ou8xVh37UKAGrH.5/q', '49063 Fritsch Fort\nWilliamsonland, NE 67163', 1, 1, NULL, NULL, NULL),
(25, 'Celine Miller', 'chelsey.conn@yahoo.com', NULL, '$2y$10$BSsi7qjNS2b7bC3a1cYRc.2pFd4OhVp/aIHHP6nZYF8lHLN/YLY1i', '8054 Koch Harbors Suite 701\nNew Francis, VT 16425', 1, 1, NULL, NULL, NULL),
(26, 'Mrs. Destany Boehm III', 'dusty.friesen@mertz.com', NULL, '$2y$10$7Hfu8TDyhc0Mj/WxnSkIXejE.s3dfIj8GVLhvd5Obg9pWIFNwsMwS', '934 Williamson Centers\nSouth Prince, KS 83716', 1, 1, NULL, NULL, NULL),
(27, 'Zane Davis', 'brown.dejah@hotmail.com', NULL, '$2y$10$hyiW1Pif6bnK2.0mw1J7WeNHf8mcktCCdCJE4UWFI1NnrMxX8MN0.', '485 Caterina Crossroad\nPort Julia, GA 98902-0722', 1, 1, NULL, NULL, NULL),
(28, 'Evalyn Eichmann', 'pauline21@gmail.com', NULL, '$2y$10$bjBqg5jfXN1EnWH4iX5BiuWNsMTbbUTxHfhNfu1oBWJSBmWIrZ8Q6', '705 Weber Run Suite 682\nNorth Deon, MN 72169-1418', 1, 1, NULL, NULL, NULL),
(29, 'Murray Schimmel', 'anthony20@hotmail.com', NULL, '$2y$10$/xM0LOvQRu9jnk40poa8D.pyfe03y2tRfPuFt4zGlqdV.5HaXSBPi', '7834 Fay Centers Apt. 414\nGreenfort, IN 01682', 1, 1, NULL, NULL, NULL),
(30, 'Deja Nader DDS', 'dayana03@yahoo.com', NULL, '$2y$10$lshgrr40jXG..uvTdq1cM.JU2.9omNyWc7FLSm.Qs79H.eJFXbzta', '66985 Thompson Villages Suite 209\nNorth Deliaville, UT 54333-0321', 1, 1, NULL, NULL, NULL),
(31, 'Milo Oberbrunner', 'susanna.schulist@brakus.com', NULL, '$2y$10$hJTxKHbYRtJzkXEeUN/O8uFqVRS7OSO2Hsr4J2Tz0QSpC41xIotoG', '444 Gleichner Pine Suite 942\nNorth Marinamouth, SC 88380-1227', 1, 1, NULL, NULL, NULL),
(32, 'Violet Robel DDS', 'wkub@thompson.net', NULL, '$2y$10$gxo5CPXwaf7zfyceCcp1L.84sSOHfKUKu12RKF.nA6.9Gg5KXmEwi', '95967 Dario Cliff Suite 180\nLaviniafurt, WI 32044', 1, 1, NULL, NULL, NULL),
(33, 'Granville Sauer', 'trantow.marisol@yahoo.com', NULL, '$2y$10$Bk3nsW.LSrXEC7gY4TOQgOwHeZJkZZQt/Lbg9GNHsHCoWWNALep4q', '815 Junius Fork Apt. 131\nNew Turner, UT 17240', 1, 1, NULL, NULL, NULL),
(34, 'Dewayne Abshire', 'ncrooks@quitzon.org', NULL, '$2y$10$W7g7QC5n1dxaOKTrg.TaQO6LG6arwU5zJGVcrAt71CEAb1SEW65hm', '405 Katheryn Key Suite 449\nGermanport, WI 31455-1888', 1, 1, NULL, NULL, NULL),
(35, 'Jewell Spencer', 'madeline35@yahoo.com', NULL, '$2y$10$FMb5uWsX0OtKX4Koj0jtGuDg7ouk3pq1q9WKis3N9j/PVDl54id7G', '720 Metz Brooks\nEllamouth, RI 90246-3716', 1, 1, NULL, NULL, NULL),
(36, 'Mrs. Una Schaden II', 'albertha75@yahoo.com', NULL, '$2y$10$jrReAmstc/NuMP9V9bkB5Ob0/kF1dCaFvgjiCFewmOxMMNJUURTU6', '3594 Johann Vista\nJairoburgh, AK 27301-5289', 1, 1, NULL, NULL, NULL),
(37, 'Alvis Gutmann IV', 'efren66@yahoo.com', NULL, '$2y$10$4v3IN63eqhZgAu5lwH92OerCc90YjvVLBJUfUWQR5C6oQFGjYMLTe', '5304 Ali View\nMicahberg, WI 77598-6196', 1, 1, NULL, NULL, NULL),
(38, 'Lori Lebsack', 'mcclure.ruby@gmail.com', NULL, '$2y$10$qIdgKtLRFQ5QebpuXrfZpe6p1z1Mydi.DUy2OrNYAaTs9c9bA47xO', '9331 Tromp Ways\nEast Kiera, NV 03922', 1, 1, NULL, NULL, NULL),
(39, 'Andre Stark', 'rogers.mcdermott@yahoo.com', NULL, '$2y$10$Jq/uvVLq2OGy6nvrmmIVn.tiDnLvJaHrVMYfYbZxKi7OV5SEvDKHq', '35006 Tina Plain Suite 286\nSouth Adela, WI 50611-4526', 1, 1, NULL, NULL, NULL),
(40, 'Mrs. Alvina Luettgen Jr.', 'khayes@gmail.com', NULL, '$2y$10$n5BelPSn7rYBmS3Vc78rZOjQueJ8TNnx7xt2XgaD.zk24uwxbiLtK', '38810 McClure Valley Suite 133\nJameyfurt, KS 45652-9167', 1, 1, NULL, NULL, NULL),
(41, 'Angela Rath', 'xweber@gmail.com', NULL, '$2y$10$J7Gpj79F22VDlAXsynfxTO.EsyawcvTBe0OHgz47qPDpXuiK6TLYG', '471 Hahn Run Apt. 711\nShanahanview, TN 19062-5970', 1, 1, NULL, NULL, NULL),
(42, 'Mrs. Ericka Mayert II', 'lulu.zieme@williamson.net', NULL, '$2y$10$WKzuYeICs6/2DC9rVp4lD.9CBQ9.VeCHNwF/LchPtXK/zlB9Hsri.', '87161 Tromp Village\nPort Alia, IN 57756-5700', 1, 1, NULL, NULL, NULL),
(43, 'Jaclyn Walsh', 'alfredo67@gmail.com', NULL, '$2y$10$6/fPpDS1N2CEvFOM/saNheV9HVTTdf3s5OvYpG3K/Ba6.AJo48TNK', '435 Lebsack Fall Suite 085\nWindlermouth, WA 75049-3448', 1, 1, NULL, NULL, NULL),
(44, 'Esteban Jast', 'crist.mabelle@hotmail.com', NULL, '$2y$10$bNxXLfEeoqu7Wbr8POVxz.HLNu1pfFeGr0V80Tcol7END9D9iDBLm', '48182 Sonia Row Apt. 210\nSouth Burnice, WV 87652', 1, 1, NULL, NULL, NULL),
(45, 'Robyn Harris V', 'kristina01@boyle.biz', NULL, '$2y$10$RwEp8eLJr4UYR5eBGgb49On/12oEGS.h8hC1JHx3P54.tBJ/l3B1.', '90357 Rogelio Crossing\nNew Ayden, VA 62393-1454', 1, 1, NULL, NULL, NULL),
(46, 'Icie Oberbrunner', 'vena.rau@hotmail.com', NULL, '$2y$10$8/BH.gxgBUkXcsbcuzjoDOqaZHhYNVanEpDkxFicMqT9USUORPFH6', '2428 Hoppe Shores\nPort Felicitychester, CO 90056', 1, 1, NULL, NULL, NULL),
(47, 'Frankie Dibbert', 'vweissnat@bradtke.com', NULL, '$2y$10$x0PJ6W3tZcXGgmLEMP/dJuXq64xxnP3ys9mntu9VTxQGVP1LEXMH2', '334 Tyler Harbor Suite 652\nWest Lucioberg, PA 75220-8805', 1, 1, NULL, NULL, NULL),
(48, 'Gabriella Purdy', 'lmoen@yahoo.com', NULL, '$2y$10$msQbwoGy3gYXgLipzCqpFeuJzibtxLa1Yy7MskSSrGzkTUf/rV6VW', '80819 Loma Roads Apt. 246\nPort Janessa, CO 57011-9474', 1, 1, NULL, NULL, NULL),
(49, 'Guillermo Strosin', 'sporer.izabella@yahoo.com', NULL, '$2y$10$GkJNhNAu2BPFqoeSaKi3hOUHE5kwcc2tadnMihagPlhk6i4ZNA1Yy', '40573 Greenfelder Highway\nAnabelmouth, CT 60744', 1, 1, NULL, NULL, NULL),
(50, 'Mr. Dorcas Mosciski', 'aiyana.flatley@kris.net', NULL, '$2y$10$x7MvXxEGKH3UJOvMtLRrLeC.RV1CtKJJ4.i2l1gOlxcsgDW572Uue', '45934 Myrna Junctions\nKuhlmanbury, KS 13033-1655', 1, 1, NULL, NULL, NULL),
(51, 'Braulio Kuhn PhD', 'osvaldo.king@gmail.com', NULL, '$2y$10$1HwrXaCtI.ZdY4E00P.uD.m17o6pE/Kl8i50WNUASct/usEC8gs7a', '954 Schoen Run\nArchhaven, FL 44082', 1, 1, NULL, NULL, NULL),
(52, 'Sheridan Russel', 'destiney18@hotmail.com', NULL, '$2y$10$LvGadCZRg4Kcya9SUZindudp18eYD3sS8VO/faeisGC0pj.RnJISu', '56807 Anissa Orchard Apt. 847\nHayesbury, RI 48675-7365', 1, 1, NULL, NULL, NULL),
(53, 'Dr. Shayne Hamill', 'burley.parisian@hotmail.com', NULL, '$2y$10$ciqbRoND0mx8cIaVUcrydeGfRK9Czikh1jiGN3bcuf7T6URE.Bj9O', '520 Gilda Roads\nSusanaland, ID 22947', 1, 1, NULL, NULL, NULL),
(54, 'Keagan Ondricka', 'mitchell.emmie@gmail.com', NULL, '$2y$10$yqi1Nji8.2ducp1VLGAYgeNJJc79RYAQcK51dyDQb97JGhWghAihi', '4120 Carmela Ferry Suite 097\nEast Allan, RI 79065', 1, 1, NULL, NULL, NULL),
(55, 'Mr. Keith Larson V', 'deja.schamberger@mosciski.org', NULL, '$2y$10$TsXf7MFMDlft4SBbJcaIW.xpHTo/MIITyoBaTGc/CJ3LtclTxQcTy', '699 Lexus Plains\nLake Toneyfurt, DC 19739', 1, 1, NULL, NULL, NULL),
(56, 'Jeanette Schaefer', 'weichmann@reichert.biz', NULL, '$2y$10$P/7TIu7O7CR7l5UD7DP7DO8KKGuaUjzq4I5s7wHNNGE6h4LyI4UgK', '6131 Wendell Mountains Suite 364\nDickinsonfurt, MI 36067-3137', 1, 1, NULL, NULL, NULL),
(57, 'Arjun Lindgren', 'ruben17@yahoo.com', NULL, '$2y$10$0s52hfs8WGgmTeur5VF/X..UDquXUbQIQOmvSN.z1/74dS1hefWaa', '1042 Christy Stream\nMaddisonville, SD 34994', 1, 1, NULL, NULL, NULL),
(58, 'Ms. Cathrine Veum Sr.', 'payton43@hotmail.com', NULL, '$2y$10$2o2wEf4dL75Qzi9s3JbF3uftnLQVNHRYNnhwPYts21fujdiOYkM2i', '8758 Considine Flats Suite 238\nMosciskiport, GA 52297-4221', 1, 1, NULL, NULL, NULL),
(59, 'Alexandre Kassulke', 'sidney98@gmail.com', NULL, '$2y$10$0ZFTjLtXnk6BgZW5hRLj1OZwmDssv3Sosd0rLI3VJu/cTNvj/2gUy', '188 Lenore Route Suite 609\nCronafurt, KY 80769', 1, 1, NULL, NULL, NULL),
(60, 'Owen Hill V', 'jackeline12@mann.net', NULL, '$2y$10$UkfjI9mJIeYgP1tAosYiZuWFLyl29eIU9UN8BM6A7TZONbHb/V2Ny', '2091 Leila Way Suite 578\nWest Gerardstad, AR 55431', 1, 1, NULL, NULL, NULL),
(61, 'Flavie Kutch', 'crystel.rosenbaum@hotmail.com', NULL, '$2y$10$Br.WewSzU1N2AszI2hrgSeB1aRs12sQwdWMe3oA8TeZLZMRDTcG2u', '8884 Wilderman Stream\nHaleychester, FL 55058-4890', 1, 1, NULL, NULL, NULL),
(62, 'Dr. Braxton Baumbach', 'vrenner@yahoo.com', NULL, '$2y$10$/AEgCxcpF7ZMKZuN00/gW..LYCfJneR2b3MxFDCcG48.8.du9cFQ6', '215 Treutel Wells Suite 431\nEast Nicholasstad, FL 54232', 1, 1, NULL, NULL, NULL),
(63, 'Unique Schiller', 'pdickinson@green.org', NULL, '$2y$10$DTbBe1YTzK/S7P2F7PWLBun6L3.KZOWvcxB1W.kmg0gD4dX5SoOUW', '4375 Melody Orchard\nFunkmouth, PA 26842', 1, 1, NULL, NULL, NULL),
(64, 'Cassidy Padberg', 'wilma.gleason@yahoo.com', NULL, '$2y$10$YMb5LqEh7k7DJd0npb5Piu/2BBNTEerX6TcRKvfD/vt5Bf67ZYJxq', '8145 Schmeler Pass Apt. 848\nLake Eriberto, GA 50910-5905', 1, 1, NULL, NULL, NULL),
(65, 'Alyce Schimmel', 'sporer.modesto@hessel.org', NULL, '$2y$10$fzseEkWKJLWvxmbFFrwTBudiRnShq3Qu.seS1Sq1..P1qL5xKKNn6', '5093 Shakira Forks Suite 131\nTerrillshire, CT 36934', 1, 1, NULL, NULL, NULL),
(66, 'Prof. Jacques Feil', 'saige.friesen@hotmail.com', NULL, '$2y$10$49S0UKYtMkCST9hCPjtku.jeSF8EL4eOtiX5qjVpitic4ypD1H/NG', '323 Wolff Trafficway Suite 537\nArdenport, NJ 59574', 1, 1, NULL, NULL, NULL),
(67, 'Miss Vivianne Nienow', 'doyle.turner@yahoo.com', NULL, '$2y$10$v5Cj2XbKwX0nVivlTrgUuuFG5EBkffvLRvphc8fASqYfdnT2qALFS', '18435 Lambert Estate Apt. 398\nSouth Stephania, HI 50395', 1, 1, NULL, NULL, NULL),
(68, 'Keira Wiegand II', 'qcollins@wyman.info', NULL, '$2y$10$QqyXSAzobXcW9gXdKHVkguvEQ9oQEPOVXw5aA5Zwalnay35noPNdG', '6803 Littel Locks\nSouth Kattieberg, OH 21659', 1, 1, NULL, NULL, NULL),
(69, 'Declan Langosh', 'pfannerstill.kendall@robel.net', NULL, '$2y$10$.nGRAms.e9yf8Wm8bbprR.gQNGs5dEXYMj0QyMMW5s2TzCU.d2v6y', '569 Maria Garden\nRobertsbury, TX 53620', 1, 1, NULL, NULL, NULL),
(70, 'Dr. Janet Lesch', 'adach@wolf.biz', NULL, '$2y$10$qVUywwP.cJkHlJYsvw5mUOnrp2Z4oENZBvNwgrPyU4hGtB.25wN86', '1126 Dooley Loaf Apt. 306\nNew Kris, KY 46993', 1, 1, NULL, NULL, NULL),
(71, 'Mr. Haley Olson', 'isaac87@hotmail.com', NULL, '$2y$10$Y4pK5FwCKM2LvPy8bTMNB.ORaO6mHtQhlXRP02goKy2vrHYTnjN9e', '90598 Ethelyn Vista\nLilaside, TN 77356-2646', 1, 1, NULL, NULL, NULL),
(72, 'Mr. Raymundo Smitham', 'moen.heaven@yahoo.com', NULL, '$2y$10$tUeJLROzqa1eMZ5CbUiJ3OFGcsc018/mU4jbYiaeFeRSLYyE29cfi', '464 Ollie Junction\nJimmyfurt, CT 29396-1337', 1, 1, NULL, NULL, NULL),
(73, 'Cassandre Jones', 'verla.dickinson@gmail.com', NULL, '$2y$10$M6O4tNhWr51ejvo7sw3tgOyLKWbuxltUnj7Nkt5ulAncbmuyYHX4u', '4809 Heller Village\nPort Candicehaven, MA 87858', 1, 1, NULL, NULL, NULL),
(74, 'Ben Will', 'josianne.padberg@hotmail.com', NULL, '$2y$10$OEqVNi1mxyKEMGUuw/Zh0eHN3VFBti4pthqmeAZXiJ1rvVsSepX2u', '4696 Terrance Valley\nEast Gabe, MN 43585-3645', 1, 1, NULL, NULL, NULL),
(78, 'Dimitri Lebsack', 'qcollins@botsford.org', NULL, '$2y$10$qS79fChnMQedURsFpTX1vOoZ/ebJp0vMyB8BIH5R2OLnn6K3LirO6', '14805 Johnston Road\nMohamedside, DE 61615-0943', 1, 1, NULL, NULL, NULL),
(79, 'Mrs. Katarina Boehm', 'qfarrell@hotmail.com', NULL, '$2y$10$03cYBmccsFDaLTpjxf3W1.zqSIXMslPGjqMMQfPc4MUlzPAneVhRy', '628 Judah Well Suite 159\nSummershire, MO 17458', 1, 1, NULL, NULL, NULL),
(80, 'Dee Kihn', 'tom81@yahoo.com', NULL, '$2y$10$3l.rpeU7P7vQajd7f3W4E.1MfAlZMWNeNg8FXuFD1HMexOrRAbAdy', '86140 Bernice Station Suite 582\nZulaufton, NJ 35206-7538', 1, 1, NULL, NULL, NULL),
(81, 'Ervin Lynch', 'nelson60@schaden.com', NULL, '$2y$10$ugrheWuyDuW1.z6PyYKEjOYAUsR4zj1W0VVf0/77c4vtswmksb2Vy', '129 Aiyana Shoals\nWest Christ, FL 99758-6995', 1, 1, NULL, NULL, NULL),
(82, 'Angela Frami', 'carolyn.grant@daugherty.com', NULL, '$2y$10$nfOP4COhXLhJ1juzYmIulen1L6hB07fsHxP7Tu5h.lEQ9VchIXrxq', '612 Braun Street\nPort Asashire, NY 39358', 1, 1, NULL, NULL, NULL),
(83, 'Alphonso Doyle', 'yundt.clyde@oconnell.com', NULL, '$2y$10$waC6IlB8ZunaE8ObAHhfZ.8Keo/E1LRYV2icPSF0giHwEx1EBurSe', '2391 Gleason Courts\nWest Elveraville, UT 42407-9896', 1, 1, NULL, NULL, NULL),
(84, 'Gavin Boyle II', 'kuhlman.joyce@okeefe.com', NULL, '$2y$10$T8zwq6TqcE2MpHGapH.qvuxnrXhoTkU7BEmM.SG1N1TE0fckc8xf.', '727 Lavada Meadows Apt. 190\nEast Lamontbury, LA 36603-6787', 1, 1, NULL, NULL, NULL),
(85, 'Katherine Lesch Jr.', 'goldner.greg@hotmail.com', NULL, '$2y$10$wTF0LCb.AqJC//mGEF542eT/HBzRXaXc2Dr8GozEQAWH56C1Nd/MS', '40930 Connelly Burg\nNorth Laceyhaven, MS 86924-9934', 1, 1, NULL, NULL, NULL),
(150, 'Dương Lê', 'duonglmph45@fpt.edu.vn', NULL, '$2y$10$1WQbHnnrrb0cgW.yKaaIde0RLCFbUQtkGybHdevDhthgskH2x5eV2', 'Mỹ Đình Hà Nội', 1, 2, NULL, '2021-08-03 02:46:06', '2021-08-03 02:52:30'),
(155, 'Dương Lê', 'duongmanh.lee@gmail.com', NULL, '$2y$10$Xb6BJvu599SYvhyBBXbxgOJ/yOOkUQxNJcMkNaUEwEFM7sUnNDxx.', 'Mỹ Đình Hà Nội', 1, 1, NULL, '2021-08-06 21:52:03', '2021-08-06 21:52:03');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Chỉ mục cho bảng `invoices`
--
ALTER TABLE `invoices`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `invoice_details`
--
ALTER TABLE `invoice_details`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Chỉ mục cho bảng `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `sliders`
--
ALTER TABLE `sliders`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT cho bảng `comments`
--
ALTER TABLE `comments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT cho bảng `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `invoices`
--
ALTER TABLE `invoices`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT cho bảng `invoice_details`
--
ALTER TABLE `invoice_details`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT cho bảng `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT cho bảng `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT cho bảng `sliders`
--
ALTER TABLE `sliders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=157;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
