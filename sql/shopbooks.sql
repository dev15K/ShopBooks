-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 29, 2024 at 09:19 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `shopbooks`
--

-- --------------------------------------------------------

--
-- Table structure for table `carts`
--

CREATE TABLE `carts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `quantity` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `carts`
--

INSERT INTO `carts` (`id`, `product_id`, `user_id`, `quantity`, `created_at`, `updated_at`) VALUES
(1, 7, 2, 7, '2024-10-29 01:16:35', '2024-10-29 01:18:08');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `name_vi` varchar(255) NOT NULL,
  `name_en` varchar(255) NOT NULL,
  `created_by` bigint(20) UNSIGNED NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `deleted_by` bigint(20) DEFAULT NULL,
  `status` varchar(255) NOT NULL DEFAULT 'ACTIVE',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `thumbnail` longtext NOT NULL,
  `parent_id` bigint(20) DEFAULT NULL,
  `updated_by` bigint(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `name_vi`, `name_en`, `created_by`, `deleted_at`, `deleted_by`, `status`, `created_at`, `updated_at`, `thumbnail`, `parent_id`, `updated_by`) VALUES
(1, 'Chính trị - Xã hội', 'Chính trị - Xã hội', 'Politics - Society', 2, NULL, NULL, 'ACTIVE', '2024-10-29 00:35:59', '2024-10-29 00:35:59', 'http://127.0.0.1:8000/storage/category/VqcRRVqE47o3zfNV8fFqM7IFJeLcKfhEVeFAWAgH.png', NULL, NULL),
(2, 'Lịch sử - Địa lý', 'Lịch sử - Địa lý', 'History - Geography', 2, NULL, NULL, 'ACTIVE', '2024-10-29 00:36:37', '2024-10-29 00:36:37', 'http://127.0.0.1:8000/storage/category/19Z9AlvSv9tVY2CwWGxOYEpVcCiwEIeqxGw0hDOk.png', NULL, NULL),
(3, 'Triết học, Tâm lý', 'Triết học, Tâm lý', 'Philosophy, Psychology', 2, NULL, NULL, 'ACTIVE', '2024-10-29 00:36:50', '2024-10-29 00:36:50', 'http://127.0.0.1:8000/storage/category/iHweThdalivYaCpen0Lmolqy3M4Af7OJ4FCZrjUf.png', NULL, NULL),
(4, 'Văn học', 'Văn học', 'Literature', 2, NULL, NULL, 'ACTIVE', '2024-10-29 00:37:05', '2024-10-29 00:37:05', 'http://127.0.0.1:8000/storage/category/BgjONDlCMWWnuqP4rNPJdSrFwZesYMWz9jfbaDDO.png', NULL, NULL),
(5, 'Khoa học tự nhiên và Toán học', 'Khoa học tự nhiên và Toán học', 'Natural Sciences and Mathematics', 2, NULL, NULL, 'ACTIVE', '2024-10-29 00:37:17', '2024-10-29 00:37:17', 'http://127.0.0.1:8000/storage/category/EpsAhKhpxRZpEgvwioit6reBjyy5OvWequZVA8iv.png', NULL, NULL),
(6, 'Tin học, Thông tin và các tác phẩm tổng quát', 'Tin học, Thông tin và các tác phẩm tổng quát', 'Informatics, Information and general works', 2, NULL, NULL, 'ACTIVE', '2024-10-29 00:37:33', '2024-10-29 00:37:33', 'http://127.0.0.1:8000/storage/category/1L6MKpybCPQwnK8LS0FpqdqiJhmb2LQTVLqXlxrA.png', NULL, NULL),
(7, 'Khoa học ứng dụng', 'Khoa học ứng dụng', 'Applied science', 2, NULL, NULL, 'ACTIVE', '2024-10-29 00:37:49', '2024-10-29 00:37:49', 'http://127.0.0.1:8000/storage/category/uTDJki9YkI3NsfSGVWN0H50j8SlDo4z6kQZM9tRn.png', NULL, NULL),
(8, 'Nghệ thuật, Mỹ thuật và Vui chơi giải trí', 'Nghệ thuật, Mỹ thuật và Vui chơi giải trí', 'Arts, Fine Arts and Entertainment', 2, NULL, NULL, 'ACTIVE', '2024-10-29 00:38:00', '2024-10-29 00:38:00', 'http://127.0.0.1:8000/storage/category/4tNDYLukLwn8Sd8Wg5CHTTio7poNK4UwWdzjJl1h.png', NULL, NULL),
(9, 'Thiếu nhi', 'Thiếu nhi', 'Children', 2, NULL, NULL, 'ACTIVE', '2024-10-29 00:38:13', '2024-10-29 00:38:13', 'http://127.0.0.1:8000/storage/category/NYp2EgaDMrd4tIWFEmfLhbvjcf9sZI1uSwPYWHKI.png', NULL, NULL),
(10, 'Phụ Kiện - Vật Liệu Trang Trí', 'Phụ Kiện - Vật Liệu Trang Trí', 'Accessories - Decorative Materials', 2, NULL, NULL, 'ACTIVE', '2024-10-29 00:39:29', '2024-10-29 00:39:29', 'http://127.0.0.1:8000/storage/category/pWhmrJCDbC0ru8sOP0f5h06tubcQ9sC24uxxkd0B.png', NULL, NULL),
(11, 'Dụng Cụ Học Tập', 'Dụng Cụ Học Tập', 'Learning Tools', 2, NULL, NULL, 'ACTIVE', '2024-10-29 00:51:39', '2024-10-29 00:51:39', 'http://127.0.0.1:8000/storage/category/8qKfwz3pTjm2YJ0vEkQQfZvMGtx9HeeDvPEIBkqp.png', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `contacts`
--

CREATE TABLE `contacts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `subject` varchar(255) NOT NULL,
  `message` longtext NOT NULL,
  `status` varchar(255) NOT NULL DEFAULT 'PENDING',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
-- Table structure for table `members`
--

CREATE TABLE `members` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `position` varchar(255) NOT NULL,
  `about` longtext NOT NULL,
  `stt` bigint(20) NOT NULL,
  `status` varchar(255) NOT NULL DEFAULT 'ACTIVE',
  `created_by` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `avt` longtext NOT NULL
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
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2024_02_07_014934_create_roles_table', 1),
(6, '2024_02_07_015259_create_role_users_table', 1),
(7, '2024_02_15_085105_insert_column_token_in_users_table', 1),
(8, '2024_03_26_123734_create_categories_table', 1),
(9, '2024_03_26_123742_create_products_table', 1),
(10, '2024_03_26_131319_insert_column_avt_in_user_table', 1),
(11, '2024_03_26_132953_insert_column_thumbnail_in_categories_table', 1),
(12, '2024_03_26_140146_insert_column_parent_id_in_categories_table', 1),
(13, '2024_03_26_141800_insert_multiple_colum_in_categories_table', 1),
(14, '2024_03_26_143728_insert_column_update_by_in_products_table', 1),
(15, '2024_03_26_144824_insert_column_quantity_in_products_table', 1),
(16, '2024_03_26_153332_insert_column_category_id_in_products_table', 1),
(17, '2024_03_27_074351_create_carts_table', 1),
(18, '2024_03_27_074356_create_orders_table', 1),
(19, '2024_03_27_074359_create_order_items_table', 1),
(20, '2024_03_27_160847_insert_column_notes_in_orders_table', 1),
(21, '2024_03_27_174357_create_contacts_table', 1),
(22, '2024_03_27_174408_create_reviews_table', 1),
(23, '2024_03_28_150230_create_members_table', 1),
(24, '2024_03_28_170030_insert_column_avt_in_members_table', 1),
(25, '2024_04_18_181501_create_revenues_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `full_name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `total_price` decimal(15,0) NOT NULL COMMENT 'Giá toàn bộ sản phẩm',
  `shipping_price` decimal(15,0) NOT NULL COMMENT 'Giá tiền phí vận chuyển',
  `discount_price` decimal(15,0) NOT NULL COMMENT 'Giá tiền giảm giá',
  `total` decimal(15,0) NOT NULL COMMENT 'Tổng tiền thanh toán',
  `order_method` varchar(255) NOT NULL DEFAULT 'Cash on Delivery',
  `status` varchar(255) NOT NULL DEFAULT 'PROCESSING',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `notes` longtext DEFAULT NULL COMMENT 'Ghi chú của khách hàng'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `order_items`
--

CREATE TABLE `order_items` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `order_id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `quantity` int(11) NOT NULL,
  `price` decimal(15,0) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
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
  `name` varchar(255) NOT NULL,
  `name_vi` varchar(255) NOT NULL,
  `name_en` varchar(255) NOT NULL,
  `short_description` longtext NOT NULL,
  `short_description_vi` longtext NOT NULL,
  `short_description_en` longtext NOT NULL,
  `description` longtext NOT NULL,
  `description_vi` longtext NOT NULL,
  `description_en` longtext NOT NULL,
  `thumbnail` longtext NOT NULL,
  `gallery` longtext NOT NULL,
  `price` decimal(15,0) NOT NULL,
  `status` varchar(255) NOT NULL DEFAULT 'ACTIVE',
  `created_by` bigint(20) UNSIGNED NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `deleted_by` bigint(20) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `updated_by` bigint(20) DEFAULT NULL,
  `quantity` bigint(20) NOT NULL DEFAULT 1,
  `category_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `name_vi`, `name_en`, `short_description`, `short_description_vi`, `short_description_en`, `description`, `description_vi`, `description_en`, `thumbnail`, `gallery`, `price`, `status`, `created_by`, `deleted_at`, `deleted_by`, `created_at`, `updated_at`, `updated_by`, `quantity`, `category_id`) VALUES
(1, 'Tấm Trang Trí Halloween - WanLongDa WS292-1', 'Tấm Trang Trí Halloween - WanLongDa WS292-1', 'Tấm Trang Trí Halloween - WanLongDa WS292-1', '<p><strong>HTấm Trang Tr&iacute; Halloween - WanLongDa WS292-1</strong></p>', '<p><strong>HTấm Trang Trí Halloween - WanLongDa WS292-1</strong></p>', '<p><strong>HTấm Trang Tr&iacute; Halloween - WanLongDa WS292-1</strong></p>', '<div class=\"block-content-product-detail-title\">M&ocirc; tả sản phẩm</div>\r\n<div id=\"product_tabs_description_contents\">\r\n<div id=\"desc_content\" class=\"std\">\r\n<p><strong>HTấm Trang Tr&iacute; Halloween - WanLongDa WS292-1</strong></p>\r\n<p>B&ecirc;n cạnh những trang phục v&agrave; phụ kiện h&oacute;a trang, lễ hội Halloween sẽ kh&ocirc;ng thể trọn vẹn nếu thiếu đi những m&oacute;n đồ trang tr&iacute; độc đ&aacute;o.</p>\r\n<p>Sản phẩm cực ấn tượng sẽ gi&uacute;p bạn tha hồ s&aacute;ng tạo v&agrave; trang tr&iacute; cho bữa tiệc Halloween của m&igrave;nh th&ecirc;m phần r&ugrave;ng rợn, ma qu&aacute;i.</p>\r\n<p>Sản phẩm sẽ l&agrave; một bổ sung tuyệt vời cho c&aacute;c bữa tiệc h&oacute;a trang hoặc d&ugrave;ng để trang tr&iacute; trong nh&agrave;.</p>\r\n</div>\r\n</div>', '<div class=\"block-content-product-detail-title\">Mô tả sản phẩm</div>\r\n<div id=\"product_tabs_description_contents\">\r\n<div id=\"desc_content\" class=\"std\">\r\n<p><strong>HTấm Trang Trí Halloween - WanLongDa WS292-1</strong></p>\r\n<p>Bên rìa những trang phục và phụ kiện hóa trang, lễ hội Halloween sẽ không thể hoàn thiện nếu thiếu những món đồ trang trí độc đáo.</p>\r\n<p>Sản phẩm cực ấn tượng sẽ giúp bạn tha hồ sáng tạo và trang trí cho bữa tiệc Halloween của mình thêm phần rùng rợn, ma quái.</p>\r\n<p>Sản phẩm sẽ là một sản phẩm bổ sung tuyệt vời cho các bữa tiệc hóa trang hoặc dùng để trang trí trong nhà.</p>\r\n</div>\r\n</div>', '<div class=\"block-content-product-detail-title\">M&ocirc; tả sản phẩm</div>\r\n<div id=\"product_tabs_description_contents\">\r\n<div id=\"desc_content\" class=\"std\">\r\n<p><strong>HTấm Trang Tr&iacute; Halloween - WanLongDa WS292-1</strong></p>\r\n<p>B&ecirc;n cạnh những trang phục v&agrave; phụ kiện h&oacute;a trang, lễ hội Halloween sẽ kh&ocirc;ng thể trọn vẹn nếu thiếu đi những m&oacute;n đồ trang tr&iacute; độc đ&aacute;o.</p>\r\n<p>Sản phẩm cực ấn tượng sẽ gi&uacute;p bạn tha hồ s&aacute;ng tạo v&agrave; trang tr&iacute; cho bữa tiệc Halloween của m&igrave;nh th&ecirc;m phần r&ugrave;ng rợn, ma qu&aacute;i.</p>\r\n<p>Sản phẩm sẽ l&agrave; một bổ sung tuyệt vời cho c&aacute;c bữa tiệc h&oacute;a trang hoặc d&ugrave;ng để trang tr&iacute; trong nh&agrave;.</p>\r\n</div>\r\n</div>', 'http://127.0.0.1:8000/storage/product/QbiJuRLi6zwj456aWnVAnhhDSHcRipVooz8I9eLT.webp', 'http://127.0.0.1:8000/storage/product/bQjsXNj2wpShDEwL2Wv2kDFcWxkHJMTw0fqyK8LU.webp,http://127.0.0.1:8000/storage/product/uNeGxRItBp1ZzYh9FWXXDNf8E7jLfOwoxB3mDFik.webp,http://127.0.0.1:8000/storage/product/LC8jZ6Y4OaGuoGCfhtbZv9htGwtTCNp9NXWxKMdJ.webp,http://127.0.0.1:8000/storage/product/KqulhWANUr7OIjWfusp1ROjlW80UgMhrNkCRr3CH.webp', 500, 'ACTIVE', 2, NULL, NULL, '2024-10-29 00:41:25', '2024-10-29 00:41:25', NULL, 100, 10),
(2, '48 Nguyên Tắc Chủ Chốt Của Quyền Lực (Tái Bản 2020)', '48 Nguyên Tắc Chủ Chốt Của Quyền Lực (Tái Bản 2020)', 'The 48 Key Principles of Power (2020 Reprint)', '<p>Quyền lực l&agrave; thứ m&agrave; rất nhiều người mong muốn nhưng kh&ocirc;ng phải ai cũng dễ d&agrave;ng đạt được. Vươn l&ecirc;n những vị tr&iacute; cao hơn trong thang bậc x&atilde; hội thường được xem l&agrave; một kh&aacute;t khao rất con người. Nhưng, liệu c&oacute; phải chỉ những t&agrave;i năng xuất ch&uacute;ng mới c&oacute; thể đạt được điều đ&oacute;? Kh&ocirc;ng hẳn vậy. Bởi &iacute;t ai biết rằng, để gi&agrave;nh được một vị tr&iacute; quyền lực thực tế vẫn mang t&iacute;nh c&ocirc;ng thức.</p>', '<p>Quyền lực l&agrave; thứ m&agrave; rất nhiều người mong muốn nhưng kh&ocirc;ng phải ai cũng dễ d&agrave;ng đạt được. Vươn l&ecirc;n những vị tr&iacute; cao hơn trong thang bậc x&atilde; hội thường được xem l&agrave; một kh&aacute;t khao rất con người. Nhưng, liệu c&oacute; phải chỉ những t&agrave;i năng xuất ch&uacute;ng mới c&oacute; thể đạt được điều đ&oacute;? Kh&ocirc;ng hẳn vậy. Bởi &iacute;t ai biết rằng, để gi&agrave;nh được một vị tr&iacute; quyền lực thực tế vẫn mang t&iacute;nh c&ocirc;ng thức.</p>', '<p>Power is something that many people desire but not everyone can easily achieve. Rising to higher positions in the social ladder is often considered a very human desire. But, is it true that only outstanding talents can achieve that? Not really. Because few people know that gaining a position of power is actually still formulaic.</p>', '<div class=\"block-content-product-detail-title\">M&ocirc; tả sản phẩm</div>\r\n<div id=\"product_tabs_description_contents\">\r\n<div id=\"desc_content\" class=\"std\">\r\n<p>Quyền lực c&oacute; sức hấp dẫn v&ocirc; c&ugrave;ng mạnh mẽ đối với con người trong mọi thời, ở mọi nơi, với mọi giai tầng. Lịch sử x&eacute;t cho c&ugrave;ng l&agrave; cuộc đấu tranh triền mi&ecirc;n để gi&agrave;nh cho bằng được quyền lực cai trị của c&aacute;c tập đo&agrave;n thống trị, từ cổ ch&iacute; kim, từ đ&ocirc;ng sang t&acirc;y.</p>\r\n<p>Quyền lực l&agrave; thứ m&agrave; rất nhiều người mong muốn nhưng kh&ocirc;ng phải ai cũng dễ d&agrave;ng đạt được. Vươn l&ecirc;n những vị tr&iacute; cao hơn trong thang bậc x&atilde; hội thường được xem l&agrave; một kh&aacute;t khao rất con người. Nhưng, liệu c&oacute; phải chỉ những t&agrave;i năng xuất ch&uacute;ng mới c&oacute; thể đạt được điều đ&oacute;? Kh&ocirc;ng hẳn vậy. Bởi &iacute;t ai biết rằng, để gi&agrave;nh được một vị tr&iacute; quyền lực thực tế vẫn mang t&iacute;nh c&ocirc;ng thức.</p>\r\n<p>Qua nghi&ecirc;n cứu lịch sử nh&acirc;n loại, với những nh&acirc;n vật c&oacute; quyền lực nhất tự cổ ch&iacute; kim, Robert Greene đ&atilde; kh&aacute;i qu&aacute;t n&ecirc;n 48 nguy&ecirc;n tắc tạo n&ecirc;n quyền lực một c&aacute;ch c&oacute; cơ sở khoa học. Mỗi nguy&ecirc;n tắc đều được t&aacute;c giả ph&acirc;n t&iacute;ch, giải th&iacute;ch r&otilde; r&agrave;ng, mang t&iacute;nh thuyết phục cao v&agrave; cực kỳ hấp dẫn. Một số quy luật đ&ograve;i hỏi sự kh&ocirc;n ngoan sắc sảo, một số cần sự l&eacute;n l&uacute;t v&agrave; một số kh&aacute;c ho&agrave;n to&agrave;n vắng mặt l&ograve;ng thương x&oacute;t&hellip; Nhưng d&ugrave; bạn th&iacute;ch hay kh&ocirc;ng th&iacute;ch, tất cả những quy luật n&agrave;y đều c&oacute; nhiều ứng dụng trong c&aacute;c t&igrave;nh huống thực tế của cuộc đời.</p>\r\n<p>Phi lu&acirc;n l&yacute;, xảo quyệt, nhẫn t&acirc;m v&agrave; dồi d&agrave;o tư liệu, &ldquo;48 nguy&ecirc;n tắc chủ chốt của quyền lực&rdquo; của Robert Greene ho&agrave;n to&agrave;n c&oacute; thể gi&uacute;p bạn vươn tới những đỉnh cao quyền lực v&agrave; cũng c&oacute; thể gi&uacute;p bạn đạt được tột đỉnh vinh quang.</p>\r\n</div>\r\n</div>', '<div class=\"block-content-product-detail-title\">M&ocirc; tả sản phẩm</div>\r\n<div id=\"product_tabs_description_contents\">\r\n<div id=\"desc_content\" class=\"std\">\r\n<p>Quyền lực c&oacute; sức hấp dẫn v&ocirc; c&ugrave;ng mạnh mẽ đối với con người trong mọi thời, ở mọi nơi, với mọi giai tầng. Lịch sử x&eacute;t cho c&ugrave;ng l&agrave; cuộc đấu tranh triền mi&ecirc;n để gi&agrave;nh cho bằng được quyền lực cai trị của c&aacute;c tập đo&agrave;n thống trị, từ cổ ch&iacute; kim, từ đ&ocirc;ng sang t&acirc;y.</p>\r\n<p>Quyền lực l&agrave; thứ m&agrave; rất nhiều người mong muốn nhưng kh&ocirc;ng phải ai cũng dễ d&agrave;ng đạt được. Vươn l&ecirc;n những vị tr&iacute; cao hơn trong thang bậc x&atilde; hội thường được xem l&agrave; một kh&aacute;t khao rất con người. Nhưng, liệu c&oacute; phải chỉ những t&agrave;i năng xuất ch&uacute;ng mới c&oacute; thể đạt được điều đ&oacute;? Kh&ocirc;ng hẳn vậy. Bởi &iacute;t ai biết rằng, để gi&agrave;nh được một vị tr&iacute; quyền lực thực tế vẫn mang t&iacute;nh c&ocirc;ng thức.</p>\r\n<p>Qua nghi&ecirc;n cứu lịch sử nh&acirc;n loại, với những nh&acirc;n vật c&oacute; quyền lực nhất tự cổ ch&iacute; kim, Robert Greene đ&atilde; kh&aacute;i qu&aacute;t n&ecirc;n 48 nguy&ecirc;n tắc tạo n&ecirc;n quyền lực một c&aacute;ch c&oacute; cơ sở khoa học. Mỗi nguy&ecirc;n tắc đều được t&aacute;c giả ph&acirc;n t&iacute;ch, giải th&iacute;ch r&otilde; r&agrave;ng, mang t&iacute;nh thuyết phục cao v&agrave; cực kỳ hấp dẫn. Một số quy luật đ&ograve;i hỏi sự kh&ocirc;n ngoan sắc sảo, một số cần sự l&eacute;n l&uacute;t v&agrave; một số kh&aacute;c ho&agrave;n to&agrave;n vắng mặt l&ograve;ng thương x&oacute;t&hellip; Nhưng d&ugrave; bạn th&iacute;ch hay kh&ocirc;ng th&iacute;ch, tất cả những quy luật n&agrave;y đều c&oacute; nhiều ứng dụng trong c&aacute;c t&igrave;nh huống thực tế của cuộc đời.</p>\r\n<p>Phi lu&acirc;n l&yacute;, xảo quyệt, nhẫn t&acirc;m v&agrave; dồi d&agrave;o tư liệu, &ldquo;48 nguy&ecirc;n tắc chủ chốt của quyền lực&rdquo; của Robert Greene ho&agrave;n to&agrave;n c&oacute; thể gi&uacute;p bạn vươn tới những đỉnh cao quyền lực v&agrave; cũng c&oacute; thể gi&uacute;p bạn đạt được tột đỉnh vinh quang.</p>\r\n</div>\r\n</div>', '<div class=\"block-content-product-detail-title\">Product description</div>\r\n<div id=\"product_tabs_description_contents\">\r\n<div id=\"desc_content\" class=\"std\">\r\n<p>Power has an extremely strong attraction to people of all times, in all places, and from all walks of life. History, after all, is a constant struggle to gain the ruling power of dominant corporations, from ancient times to modern times, from east to west.</p>\r\n<p>Power is something that many people desire but not everyone can easily achieve. Rising to higher positions in the social ladder is often considered a very human desire. But, is it true that only outstanding talents can achieve that? Not really. Because few people know that gaining a position of power is actually still formulaic.</p>\r\n<p>Through studying human history, with the most powerful figures from ancient times to the present, Robert Greene has generalized 48 principles that create power with a scientific basis. Each principle is analyzed and explained clearly by the author, highly convincing and extremely attractive. Some rules require shrewd cunning, some require stealth, and others have a complete absence of mercy… But whether you like it or dislike it, all of these rules have many applications in life. real life situations.</p>\r\n<p>Amoral, cunning, ruthless and rich in material, Robert Greene\'s \"48 Principles of Power\" can absolutely help you reach the heights of power and can also help you achieve the pinnacle of glory.</p>\r\n</div>\r\n</div>', 'http://127.0.0.1:8000/storage/product/bnGCc8AZ1iIny0uqz5Qe28cherWXbENsDFwaFrC4.webp', 'http://127.0.0.1:8000/storage/product/JbAgigt1R7gVXELZRZr0KzYA5epjI0PFxunfZIWD.webp,http://127.0.0.1:8000/storage/product/GF00Bf74vjAB1jU6kHYMvm5LfycKXA8fni9YnoBt.webp,http://127.0.0.1:8000/storage/product/Y15cyZwDEwrFu6eJpYKduqVHm44ff1feijP2hMx1.webp', 100, 'ACTIVE', 2, NULL, NULL, '2024-10-29 00:42:44', '2024-10-29 00:42:44', NULL, 50, 3),
(3, 'Chiến Tranh Tiền Tệ - Phần 1 - Ai Thực Sự Là Người Giàu Nhất Thế Giới? (Tái bản 2022)', 'Chiến Tranh Tiền Tệ - Phần 1 - Ai Thực Sự Là Người Giàu Nhất Thế Giới? (Tái bản 2022)', 'Currency Wars - Part 1 - Who Really Is the Richest Person in the World? (Reprinted 2022)', '<p>Một khi đọc &ldquo;Chiến tranh tiền tệ - Ai thật sự l&agrave; người gi&agrave;u nhất thế giới&rdquo; bạn sẽ phải giật m&igrave;nh nhận ra một điều kinh khủng rằng, đằng sau những tờ giấy bạc ch&uacute;ng ta chi ti&ecirc;u h&agrave;ng ng&agrave;y l&agrave; cả một thế lực ngầm đ&aacute;ng sợ - một thế lực b&iacute; ẩn với quyền lực si&ecirc;u nhi&ecirc;n c&oacute; thể điều khiển cả thế giới rộng lớn n&agrave;y.</p>', '<p>Một khi đọc &ldquo;Chiến tranh tiền tệ - Ai thật sự l&agrave; người gi&agrave;u nhất thế giới&rdquo; bạn sẽ phải giật m&igrave;nh nhận ra một điều kinh khủng rằng, đằng sau những tờ giấy bạc ch&uacute;ng ta chi ti&ecirc;u h&agrave;ng ng&agrave;y l&agrave; cả một thế lực ngầm đ&aacute;ng sợ - một thế lực b&iacute; ẩn với quyền lực si&ecirc;u nhi&ecirc;n c&oacute; thể điều khiển cả thế giới rộng lớn n&agrave;y.</p>', '<p>Once you read \"Currency War - Who is really the richest person in the world\" you will be startled to realize a terrible thing: behind the banknotes we spend every day is a whole world. Scary underground force - a mysterious force with supernatural power that can control this vast world.</p>', '<p><strong>Chiến Tranh Tiền Tệ - Phần 1 - Ai Thực Sự L&agrave; Người Gi&agrave;u Nhất Thế Giới?</strong></p>\r\n<p>Một khi đọc &ldquo;Chiến tranh tiền tệ - Ai thật sự l&agrave; người gi&agrave;u nhất thế giới&rdquo; bạn sẽ phải giật m&igrave;nh nhận ra một điều kinh khủng rằng, đằng sau những tờ giấy bạc ch&uacute;ng ta chi ti&ecirc;u h&agrave;ng ng&agrave;y l&agrave; cả một thế lực ngầm đ&aacute;ng sợ - một thế lực b&iacute; ẩn với quyền lực si&ecirc;u nhi&ecirc;n c&oacute; thể điều khiển cả thế giới rộng lớn n&agrave;y.</p>\r\n<p>&ldquo;Chiến tranh tiền tệ - Ai thật sự l&agrave; người gi&agrave;u nhất thế giới&rdquo; đề cập đến một cuộc chiến khốc liệt, kh&ocirc;ng khoan nhượng v&agrave; dai dẳng giữa một nh&oacute;m nhỏ c&aacute;c &ocirc;ng tr&ugrave;m t&agrave;i ch&iacute;nh &ndash; đứng đầu l&agrave; gia tộc Rothschild &ndash; với c&aacute;c thể chế t&agrave;i ch&iacute;nh của nhiều quốc gia. Đ&oacute; l&agrave; một cuộc chiến m&agrave; đồng tiền l&agrave; s&uacute;ng đạn v&agrave; mức s&aacute;t thương thật sự gh&ecirc; gớm.</p>\r\n<p>Đồng thời, &ldquo;Chiến tranh tiền tệ - Ai thật sự l&agrave; người gi&agrave;u nhất thế giới&rdquo; c&ograve;n gi&uacute;p bạn hiểu th&ecirc;m nhiều điều, rằng Bill Gates chưa phải l&agrave; người gi&agrave;u nhất h&agrave;nh tinh, rằng tỉ lệ tử vong của c&aacute;c tổng thống Mỹ lại cao hơn tỉ lệ tử trận của binh l&iacute;nh Mỹ ngo&agrave;i chiến trường, hay v&igrave; sao phố Wall lại mạo hiểm đổ hết vốn liếng của m&igrave;nh cho việc &ldquo;đầu tư&rdquo; v&agrave;o Hitler.</p>\r\n<p>L&agrave; một cuốn s&aacute;ch l&agrave;m sửng sốt những ai muốn t&igrave;m hiểu về bản chất của tiền tệ, để từ đ&oacute; nhận ra những hiểm họa t&agrave;i ch&iacute;nh tiềm ẩn nhằm chuẩn bị t&acirc;m l&yacute; cho một cuộc chiến tiền tệ &ldquo;kh&ocirc;ng đổ m&aacute;u&rdquo;, &ldquo;Chiến tranh tiền tệ - Ai thật sự l&agrave; người gi&agrave;u nhất thế giới&rdquo; c&ograve;n phơi b&agrave;y những &acirc;m mưu của c&aacute;c nh&agrave; t&agrave;i phiệt thế giới trong việc tạo ra những cơn &ldquo;hạn h&aacute;n&rdquo;, &ldquo;b&atilde;o lũ&rdquo; về tiền tệ để thu lợi nhuận. Cuốn s&aacute;ch cũng đề cập đến sự ph&aacute;t triển của c&aacute;c định chế t&agrave;i ch&iacute;nh &ndash; những cơ cấu được x&acirc;y dựng nhằm đ&aacute;p ứng nhu cầu ph&aacute;t triển vũ b&atilde;o của nền kinh tế to&agrave;n cầu.</p>\r\n<p>Gấp cuốn s&aacute;ch lại, c&oacute; thể bạn đọc sẽ c&oacute; nhiều t&acirc;m trạng kh&aacute;c nhau. Đối với một số người, đ&oacute; c&oacute; thể l&agrave; sự sợ h&atilde;i thế lực t&agrave;i ch&iacute;nh quốc tế v&agrave; cảm gi&aacute;c bất an về sự chi phối của thế lực n&agrave;y. Với số kh&aacute;c th&igrave; đ&oacute; c&oacute; thể l&agrave; một cảm gi&aacute;c th&uacute; vị khi kh&aacute;m ph&aacute; ra sự thật trần trụi để từ đ&oacute; c&oacute; c&aacute;ch nh&igrave;n nhận kh&aacute;c nhằm x&acirc;y dựng cho m&igrave;nh những kế hoạch đầu tư một c&aacute;ch hiệu quả nhất. V&agrave; cho d&ugrave; bạn c&oacute; lo sợ hay cảm thấy t&ograve; m&ograve;, th&uacute; vị th&igrave; &ldquo;Chiến tranh tiền tệ - Ai thật sự l&agrave; người gi&agrave;u nhất thế giới&rdquo; cũng l&agrave; một cuốn s&aacute;ch đ&aacute;ng đọc. Một cuốn s&aacute;ch bổ &iacute;ch cho c&aacute;c chuy&ecirc;n gia quản l&yacute; t&agrave;i ch&iacute;nh, c&aacute;c nh&agrave; quản trị doanh nghiệp, c&aacute;c nh&agrave; đầu tư nhỏ, c&aacute;c gi&aacute;o vi&ecirc;n giảng dạy về t&agrave;i ch&iacute;nh &ndash; ng&acirc;n h&agrave;ng cũng như sinh vi&ecirc;n c&aacute;c trường kinh tế.</p>', '<p><strong>Chiến Tranh Tiền Tệ - Phần 1 - Ai Thực Sự L&agrave; Người Gi&agrave;u Nhất Thế Giới?</strong></p>\r\n<p>Một khi đọc &ldquo;Chiến tranh tiền tệ - Ai thật sự l&agrave; người gi&agrave;u nhất thế giới&rdquo; bạn sẽ phải giật m&igrave;nh nhận ra một điều kinh khủng rằng, đằng sau những tờ giấy bạc ch&uacute;ng ta chi ti&ecirc;u h&agrave;ng ng&agrave;y l&agrave; cả một thế lực ngầm đ&aacute;ng sợ - một thế lực b&iacute; ẩn với quyền lực si&ecirc;u nhi&ecirc;n c&oacute; thể điều khiển cả thế giới rộng lớn n&agrave;y.</p>\r\n<p>&ldquo;Chiến tranh tiền tệ - Ai thật sự l&agrave; người gi&agrave;u nhất thế giới&rdquo; đề cập đến một cuộc chiến khốc liệt, kh&ocirc;ng khoan nhượng v&agrave; dai dẳng giữa một nh&oacute;m nhỏ c&aacute;c &ocirc;ng tr&ugrave;m t&agrave;i ch&iacute;nh &ndash; đứng đầu l&agrave; gia tộc Rothschild &ndash; với c&aacute;c thể chế t&agrave;i ch&iacute;nh của nhiều quốc gia. Đ&oacute; l&agrave; một cuộc chiến m&agrave; đồng tiền l&agrave; s&uacute;ng đạn v&agrave; mức s&aacute;t thương thật sự gh&ecirc; gớm.</p>\r\n<p>Đồng thời, &ldquo;Chiến tranh tiền tệ - Ai thật sự l&agrave; người gi&agrave;u nhất thế giới&rdquo; c&ograve;n gi&uacute;p bạn hiểu th&ecirc;m nhiều điều, rằng Bill Gates chưa phải l&agrave; người gi&agrave;u nhất h&agrave;nh tinh, rằng tỉ lệ tử vong của c&aacute;c tổng thống Mỹ lại cao hơn tỉ lệ tử trận của binh l&iacute;nh Mỹ ngo&agrave;i chiến trường, hay v&igrave; sao phố Wall lại mạo hiểm đổ hết vốn liếng của m&igrave;nh cho việc &ldquo;đầu tư&rdquo; v&agrave;o Hitler.</p>\r\n<p>L&agrave; một cuốn s&aacute;ch l&agrave;m sửng sốt những ai muốn t&igrave;m hiểu về bản chất của tiền tệ, để từ đ&oacute; nhận ra những hiểm họa t&agrave;i ch&iacute;nh tiềm ẩn nhằm chuẩn bị t&acirc;m l&yacute; cho một cuộc chiến tiền tệ &ldquo;kh&ocirc;ng đổ m&aacute;u&rdquo;, &ldquo;Chiến tranh tiền tệ - Ai thật sự l&agrave; người gi&agrave;u nhất thế giới&rdquo; c&ograve;n phơi b&agrave;y những &acirc;m mưu của c&aacute;c nh&agrave; t&agrave;i phiệt thế giới trong việc tạo ra những cơn &ldquo;hạn h&aacute;n&rdquo;, &ldquo;b&atilde;o lũ&rdquo; về tiền tệ để thu lợi nhuận. Cuốn s&aacute;ch cũng đề cập đến sự ph&aacute;t triển của c&aacute;c định chế t&agrave;i ch&iacute;nh &ndash; những cơ cấu được x&acirc;y dựng nhằm đ&aacute;p ứng nhu cầu ph&aacute;t triển vũ b&atilde;o của nền kinh tế to&agrave;n cầu.</p>\r\n<p>Gấp cuốn s&aacute;ch lại, c&oacute; thể bạn đọc sẽ c&oacute; nhiều t&acirc;m trạng kh&aacute;c nhau. Đối với một số người, đ&oacute; c&oacute; thể l&agrave; sự sợ h&atilde;i thế lực t&agrave;i ch&iacute;nh quốc tế v&agrave; cảm gi&aacute;c bất an về sự chi phối của thế lực n&agrave;y. Với số kh&aacute;c th&igrave; đ&oacute; c&oacute; thể l&agrave; một cảm gi&aacute;c th&uacute; vị khi kh&aacute;m ph&aacute; ra sự thật trần trụi để từ đ&oacute; c&oacute; c&aacute;ch nh&igrave;n nhận kh&aacute;c nhằm x&acirc;y dựng cho m&igrave;nh những kế hoạch đầu tư một c&aacute;ch hiệu quả nhất. V&agrave; cho d&ugrave; bạn c&oacute; lo sợ hay cảm thấy t&ograve; m&ograve;, th&uacute; vị th&igrave; &ldquo;Chiến tranh tiền tệ - Ai thật sự l&agrave; người gi&agrave;u nhất thế giới&rdquo; cũng l&agrave; một cuốn s&aacute;ch đ&aacute;ng đọc. Một cuốn s&aacute;ch bổ &iacute;ch cho c&aacute;c chuy&ecirc;n gia quản l&yacute; t&agrave;i ch&iacute;nh, c&aacute;c nh&agrave; quản trị doanh nghiệp, c&aacute;c nh&agrave; đầu tư nhỏ, c&aacute;c gi&aacute;o vi&ecirc;n giảng dạy về t&agrave;i ch&iacute;nh &ndash; ng&acirc;n h&agrave;ng cũng như sinh vi&ecirc;n c&aacute;c trường kinh tế.</p>', '<p><strong>Currency Wars - Part 1 - Who Really Is the Richest Person in the World?</strong></p>\r\n<p>Once you read \"Currency War - Who is really the richest person in the world\" you will be startled to realize a terrible thing: behind the banknotes we spend every day is a whole world. Scary underground force - a mysterious force with supernatural power that can control this vast world.</p>\r\n<p>“Currency War - Who is really the richest person in the world” refers to a fierce, uncompromising and persistent war between a small group of financial tycoons - led by the Rothschild family – with financial institutions of many countries. It was a war where money was guns and the damage was truly terrible.</p>\r\n<p>At the same time, \"Currency War - Who is really the richest person in the world\" also helps you understand many more things, that Bill Gates is not the richest person on the planet, that the death rate of presidents President of the United States is higher than the death rate of American soldiers on the battlefield, or why Wall Street risked pouring all its capital into \"investing\" in Hitler.</p>\r\n<p>It is a book that will shock those who want to learn about the nature of money, thereby recognizing potential financial dangers and preparing psychologically for a \"bloodless\" currency war. , \"Currency War - Who is really the richest person in the world\" also exposes the plots of world tycoons in creating \"droughts\" and \"floods\" in currency to collect money. profit. The book also mentions the development of financial institutions - structures built to meet the needs of the rapid development of the global economy.</p>\r\n<p>When you close the book, readers will probably have many different moods. For some, it may be fear of international financial power and a sense of insecurity about its influence. For others, it can be an interesting feeling to discover the naked truth so that you can have a different perspective to build your own investment plans in the most effective way. And whether you are afraid or feel curious and interesting, \"Currency War - Who is really the richest person in the world\" is also a book worth reading. A useful book for financial management experts, business administrators, small investors, finance and banking teachers as well as students of economics schools.</p >', 'http://127.0.0.1:8000/storage/product/jev1Q3Z7ZclSQn8dbekAfmQjgLjWHRbOENAZRZkN.webp', 'http://127.0.0.1:8000/storage/product/fjRGui70I3pPM45g4o9StNXO9ImBBAA6qJKN1O9M.webp,http://127.0.0.1:8000/storage/product/9aWu3rIBWr831bT0lOdXosxdbGVvNrKMK8VTjDhQ.webp', 300, 'ACTIVE', 2, NULL, NULL, '2024-10-29 00:45:52', '2024-10-29 00:45:52', NULL, 100, 1),
(4, 'Thời Đại AI Và Tương Lai Loài Người Chúng Ta', 'Thời Đại AI Và Tương Lai Loài Người Chúng Ta', 'The Age of AI and the Future of Our Humanity', '<p>Internet đang tr&agrave;n ngập th&ocirc;ng tin sai lệch xuất ph&aacute;t từ AI tạo sinh. C&aacute;c nghệ sĩ, nh&agrave; văn, v&agrave; nhiều người l&agrave;m c&aacute;c c&ocirc;ng việc chuy&ecirc;n m&ocirc;n kh&aacute;c đang thấp thỏm lo sợ họ sẽ bị thay thế bằng AI. AI đang kh&aacute;m ph&aacute; ra những loại thuốc mới, điều khiển c&aacute;c phương tiện bay kh&ocirc;ng người l&aacute;i, v&agrave; biến đổi thế giới quanh ta &ndash; thế nhưng ta kh&ocirc;ng hiểu được những quyết định m&agrave; AI đưa ra, v&agrave; cũng kh&ocirc;ng biết c&aacute;ch kiểm so&aacute;t ch&uacute;ng.</p>', '<p>Internet đang tr&agrave;n ngập th&ocirc;ng tin sai lệch xuất ph&aacute;t từ AI tạo sinh. C&aacute;c nghệ sĩ, nh&agrave; văn, v&agrave; nhiều người l&agrave;m c&aacute;c c&ocirc;ng việc chuy&ecirc;n m&ocirc;n kh&aacute;c đang thấp thỏm lo sợ họ sẽ bị thay thế bằng AI. AI đang kh&aacute;m ph&aacute; ra những loại thuốc mới, điều khiển c&aacute;c phương tiện bay kh&ocirc;ng người l&aacute;i, v&agrave; biến đổi thế giới quanh ta &ndash; thế nhưng ta kh&ocirc;ng hiểu được những quyết định m&agrave; AI đưa ra, v&agrave; cũng kh&ocirc;ng biết c&aacute;ch kiểm so&aacute;t ch&uacute;ng.</p>', '<p>The Internet is flooded with false information stemming from generative AI. Artists, writers, and many other professionals are fearful that they will be replaced by AI. AI is discovering new drugs, controlling drones, and transforming the world around us – but we don\'t understand the decisions it makes, and we don\'t know how to control them. .</p>', '<p><strong>Thời Đại AI V&agrave; Tương Lai Lo&agrave;i Người Ch&uacute;ng Ta</strong></p>\r\n<p>Internet đang tr&agrave;n ngập th&ocirc;ng tin sai lệch xuất ph&aacute;t từ AI tạo sinh. C&aacute;c nghệ sĩ, nh&agrave; văn, v&agrave; nhiều người l&agrave;m c&aacute;c c&ocirc;ng việc chuy&ecirc;n m&ocirc;n kh&aacute;c đang thấp thỏm lo sợ họ sẽ bị thay thế bằng AI. AI đang kh&aacute;m ph&aacute; ra những loại thuốc mới, điều khiển c&aacute;c phương tiện bay kh&ocirc;ng người l&aacute;i, v&agrave; biến đổi thế giới quanh ta &ndash; thế nhưng ta kh&ocirc;ng hiểu được những quyết định m&agrave; AI đưa ra, v&agrave; cũng kh&ocirc;ng biết c&aacute;ch kiểm so&aacute;t ch&uacute;ng.</p>\r\n<p>Nội dung ch&iacute;nh c&oacute; ba phần lớn:</p>\r\n<p><em><strong>1. Những nền tảng kết nối to&agrave;n cầu:</strong></em></p>\r\n<p>- T&aacute;c giả đưa ra định nghĩa nền tảng kết nối to&agrave;n cầu, với gi&aacute; trị v&agrave; sức hấp dẫn c&agrave;ng lớn khi c&agrave;ng c&oacute; nhiều người sử dụng n&oacute;.</p>\r\n<p>- C&aacute;ch những nền tảng n&agrave;y x&acirc;y dựng dữ liệu kh&aacute;ch h&agrave;ng, cộng đồng, v&agrave; kiểm duyệt nội dung bằng AI, từ đ&oacute; đưa ra những ảnh hưởng hiện tại v&agrave; những viễn cảnh c&oacute; thể xảy ra khi AI giữ vai tr&ograve; quyết định nội dung v&agrave; th&ocirc;ng tin n&agrave;o được truyền b&aacute;.</p>\r\n<p><em><strong>2. An ninh v&agrave; trật tự thế giới:</strong></em></p>\r\n<p>- Kh&ocirc;ng quốc gia n&agrave;o c&oacute; thể phớt lờ kh&iacute;a cạnh an ninh của AI, khi một cuộc chiến nhằm gi&agrave;nh lợi thế AI đ&atilde; đang diễn ra. Những tiến bộ v&agrave; cạnh tranh trong lĩnh vực hạt nh&acirc;n, kh&ocirc;ng gian mạng, v&agrave; c&ocirc;ng nghệ AI sẽ mang đến nhiều th&aacute;ch thức cho định nghĩa an ninh truyền thống.</p>\r\n<p>- Những xung đột trong thời đại số với sự phủ s&oacute;ng của th&ocirc;ng tin v&agrave; mạng x&atilde; hội</p>\r\n<p><em><strong>3. Nh&acirc;n dạng con người:</strong></em></p>\r\n<p>- Khi l&yacute; tr&iacute; con người kh&ocirc;ng c&ograve;n l&agrave; thứ duy nhất kh&aacute;m ph&aacute; v&agrave; định h&igrave;nh thực tế, khi ch&uacute;ng ta chấp nhận AI ở vai tr&ograve; phụ t&aacute; cho suy nghĩ v&agrave; quan điểm của bản th&acirc;n, ch&uacute;ng ta sẽ nh&igrave;n nhận bản th&acirc;n v&agrave; vai tr&ograve; của m&igrave;nh kh&aacute;c đi như thế n&agrave;o?</p>\r\n<p>- T&aacute;c giả vẽ ra viễn cảnh khi AI ng&agrave;y c&agrave;ng ph&aacute;t triển, n&oacute; sẽ sở hữu những kỹ năng m&agrave; con người mất nhiều năm học tập mới l&agrave;m được, v&agrave; dẫn dắt những quan điểm mới về sự độc nhất v&agrave; gi&aacute; trị tương quan của khả năng của con người. N&oacute; sẽ thay đổi c&aacute;c ph&acirc;n kh&uacute;c của nền kinh tế, th&uacute;c đẩy kh&aacute;m ph&aacute; khoa học l&ecirc;n một tầm cao mới, trong khi con người kh&ocirc;ng c&ograve;n nắm quyền kiểm so&aacute;t 100%.</p>', '<p><strong>Thời Đại AI V&agrave; Tương Lai Lo&agrave;i Người Ch&uacute;ng Ta</strong></p>\r\n<p>Internet đang tr&agrave;n ngập th&ocirc;ng tin sai lệch xuất ph&aacute;t từ AI tạo sinh. C&aacute;c nghệ sĩ, nh&agrave; văn, v&agrave; nhiều người l&agrave;m c&aacute;c c&ocirc;ng việc chuy&ecirc;n m&ocirc;n kh&aacute;c đang thấp thỏm lo sợ họ sẽ bị thay thế bằng AI. AI đang kh&aacute;m ph&aacute; ra những loại thuốc mới, điều khiển c&aacute;c phương tiện bay kh&ocirc;ng người l&aacute;i, v&agrave; biến đổi thế giới quanh ta &ndash; thế nhưng ta kh&ocirc;ng hiểu được những quyết định m&agrave; AI đưa ra, v&agrave; cũng kh&ocirc;ng biết c&aacute;ch kiểm so&aacute;t ch&uacute;ng.</p>\r\n<p>Nội dung ch&iacute;nh c&oacute; ba phần lớn:</p>\r\n<p><em><strong>1. Những nền tảng kết nối to&agrave;n cầu:</strong></em></p>\r\n<p>- T&aacute;c giả đưa ra định nghĩa nền tảng kết nối to&agrave;n cầu, với gi&aacute; trị v&agrave; sức hấp dẫn c&agrave;ng lớn khi c&agrave;ng c&oacute; nhiều người sử dụng n&oacute;.</p>\r\n<p>- C&aacute;ch những nền tảng n&agrave;y x&acirc;y dựng dữ liệu kh&aacute;ch h&agrave;ng, cộng đồng, v&agrave; kiểm duyệt nội dung bằng AI, từ đ&oacute; đưa ra những ảnh hưởng hiện tại v&agrave; những viễn cảnh c&oacute; thể xảy ra khi AI giữ vai tr&ograve; quyết định nội dung v&agrave; th&ocirc;ng tin n&agrave;o được truyền b&aacute;.</p>\r\n<p><em><strong>2. An ninh v&agrave; trật tự thế giới:</strong></em></p>\r\n<p>- Kh&ocirc;ng quốc gia n&agrave;o c&oacute; thể phớt lờ kh&iacute;a cạnh an ninh của AI, khi một cuộc chiến nhằm gi&agrave;nh lợi thế AI đ&atilde; đang diễn ra. Những tiến bộ v&agrave; cạnh tranh trong lĩnh vực hạt nh&acirc;n, kh&ocirc;ng gian mạng, v&agrave; c&ocirc;ng nghệ AI sẽ mang đến nhiều th&aacute;ch thức cho định nghĩa an ninh truyền thống.</p>\r\n<p>- Những xung đột trong thời đại số với sự phủ s&oacute;ng của th&ocirc;ng tin v&agrave; mạng x&atilde; hội</p>\r\n<p><em><strong>3. Nh&acirc;n dạng con người:</strong></em></p>\r\n<p>- Khi l&yacute; tr&iacute; con người kh&ocirc;ng c&ograve;n l&agrave; thứ duy nhất kh&aacute;m ph&aacute; v&agrave; định h&igrave;nh thực tế, khi ch&uacute;ng ta chấp nhận AI ở vai tr&ograve; phụ t&aacute; cho suy nghĩ v&agrave; quan điểm của bản th&acirc;n, ch&uacute;ng ta sẽ nh&igrave;n nhận bản th&acirc;n v&agrave; vai tr&ograve; của m&igrave;nh kh&aacute;c đi như thế n&agrave;o?</p>\r\n<p>- T&aacute;c giả vẽ ra viễn cảnh khi AI ng&agrave;y c&agrave;ng ph&aacute;t triển, n&oacute; sẽ sở hữu những kỹ năng m&agrave; con người mất nhiều năm học tập mới l&agrave;m được, v&agrave; dẫn dắt những quan điểm mới về sự độc nhất v&agrave; gi&aacute; trị tương quan của khả năng của con người. N&oacute; sẽ thay đổi c&aacute;c ph&acirc;n kh&uacute;c của nền kinh tế, th&uacute;c đẩy kh&aacute;m ph&aacute; khoa học l&ecirc;n một tầm cao mới, trong khi con người kh&ocirc;ng c&ograve;n nắm quyền kiểm so&aacute;t 100%.</p>', '<p><strong>The Age of AI and the Future of Our Human Race</strong></p>\r\n<p>The Internet is flooded with false information stemming from generative AI. Artists, writers, and many other professionals are fearful that they will be replaced by AI. AI is discovering new drugs, controlling drones, and transforming the world around us – but we don\'t understand the decisions it makes, and we don\'t know how to control them. .</p>\r\n<p>The main content has three main parts:</p>\r\n<p><em><strong>1. Global connection platforms:</strong></em></p>\r\n<p>- The author defines a global connection platform, with greater value and appeal the more people use it.</p>\r\n<p>- How these platforms build customer data, communities, and content moderation using AI, thereby presenting the current effects and possible scenarios when AI plays a decisive role determine what content and information is disseminated.</p>\r\n<p><em><strong>2. World security and order:</strong></em></p>\r\n<p>- No country can ignore the security aspect of AI, when a battle for AI advantage is already underway. Advances and competition in the fields of nuclear, cyberspace, and AI technology will bring many challenges to traditional security definitions.</p>\r\n<p>- Conflicts in the digital age with the coverage of information and social networks</p>\r\n<p><em><strong>3. Human identity:</strong></em></p>\r\n<p>- When human reason is no longer the only thing that discovers and shapes reality, when we accept AI as an assistant to our thoughts and opinions, we will see ourselves How is my body and role different?</p>\r\n<p>- The author paints a scenario that as AI increasingly develops, it will possess skills that humans take years of study to master, and lead to new perspectives on uniqueness and value. correlation of human abilities. It will change segments of the economy, promoting scientific discovery to new heights, while humans are no longer in 100% control.</p>', 'http://127.0.0.1:8000/storage/product/fBvaEOe7vPoLL2qmyZCSxMN4yjy5u4hE8LZ0VX4V.webp', 'http://127.0.0.1:8000/storage/product/s9zLOgQxVtsRg6rTqF4yI9UfsqbnzHLhwymq6IJ3.webp,http://127.0.0.1:8000/storage/product/AEtKDjkqxDX1csE3qcjgXzVi5ambS9AGoYmkGI6d.webp,http://127.0.0.1:8000/storage/product/0SLfl2jPNZ3sbawudgAmU9sdPCnp6L85sQrxzq9Q.webp', 399, 'ACTIVE', 2, NULL, NULL, '2024-10-29 00:47:13', '2024-10-29 00:47:13', NULL, 10, 6),
(5, 'Từ Tốt Đến Vĩ Đại - Jim Collins (Tái Bản 2021)', 'Từ Tốt Đến Vĩ Đại - Jim Collins (Tái Bản 2021)', 'Từ Tốt Đến Vĩ Đại - Jim Collins (Tái Bản 2021)', '<p>Jim Collins c&ugrave;ng nh&oacute;m nghi&ecirc;n cứu đ&atilde; miệt m&agrave;i nghi&ecirc;n cứu những c&ocirc;ng ty c&oacute; bước nhảy vọt v&agrave; bền vững để r&uacute;t ra những kết luận s&aacute;t sườn, những yếu tố cần k&iacute;p để đưa c&ocirc;ng ty từ tốt đến vĩ đại. Đ&oacute; l&agrave; những yếu tố khả năng l&atilde;nh đạo, con người, văn h&oacute;a, kỷ luật, c&ocirc;ng nghệ&hellip; Những yếu tố n&agrave;y được nh&oacute;m nghi&ecirc;n cứu xem x&eacute;t tỉ mỉ v&agrave; kiểm chứng cụ thể qua 11 c&ocirc;ng ty nhảy vọt l&ecirc;n vĩ đại. Mỗi kết luận của nh&oacute;m nghi&ecirc;n cứu đều hữu &iacute;ch, vượt thời gian, &yacute; nghĩa v&ocirc; c&ugrave;ng to lớn đối với mọi l&atilde;nh đạo v&agrave; quản l&yacute; ở mọi loại h&igrave;nh c&ocirc;ng ty (từ c&ocirc;ng ty c&oacute; nền tảng v&agrave; xuất ph&aacute;t tốt đến những c&ocirc;ng ty mới khởi nghiệp), v&agrave; mọi lĩnh vực ng&agrave;nh nghề. Đ&acirc;y l&agrave; cuốn s&aacute;ch n&ecirc;n đọc đối với bất kỳ l&atilde;nh đạo hay quản l&yacute; n&agrave;o!</p>', '<p>Jim Collins c&ugrave;ng nh&oacute;m nghi&ecirc;n cứu đ&atilde; miệt m&agrave;i nghi&ecirc;n cứu những c&ocirc;ng ty c&oacute; bước nhảy vọt v&agrave; bền vững để r&uacute;t ra những kết luận s&aacute;t sườn, những yếu tố cần k&iacute;p để đưa c&ocirc;ng ty từ tốt đến vĩ đại. Đ&oacute; l&agrave; những yếu tố khả năng l&atilde;nh đạo, con người, văn h&oacute;a, kỷ luật, c&ocirc;ng nghệ&hellip; Những yếu tố n&agrave;y được nh&oacute;m nghi&ecirc;n cứu xem x&eacute;t tỉ mỉ v&agrave; kiểm chứng cụ thể qua 11 c&ocirc;ng ty nhảy vọt l&ecirc;n vĩ đại. Mỗi kết luận của nh&oacute;m nghi&ecirc;n cứu đều hữu &iacute;ch, vượt thời gian, &yacute; nghĩa v&ocirc; c&ugrave;ng to lớn đối với mọi l&atilde;nh đạo v&agrave; quản l&yacute; ở mọi loại h&igrave;nh c&ocirc;ng ty (từ c&ocirc;ng ty c&oacute; nền tảng v&agrave; xuất ph&aacute;t tốt đến những c&ocirc;ng ty mới khởi nghiệp), v&agrave; mọi lĩnh vực ng&agrave;nh nghề. Đ&acirc;y l&agrave; cuốn s&aacute;ch n&ecirc;n đọc đối với bất kỳ l&atilde;nh đạo hay quản l&yacute; n&agrave;o!</p>', '<p>Jim Collins and his research team have diligently researched companies with great and sustainable leaps to draw close conclusions, the necessary factors to take companies from good to great. These are the factors of leadership, people, culture, discipline, technology... These factors were meticulously examined and specifically verified by the research team through 11 companies that jumped to greatness. Each conclusion of the research team is useful, timeless, and has great significance for all leaders and managers in all types of companies (from companies with good foundations and starting points to companies with startups), and all industry fields. This is a must-read book for any leader or manager!</p>', '<p>Jim Collins c&ugrave;ng nh&oacute;m nghi&ecirc;n cứu đ&atilde; miệt m&agrave;i nghi&ecirc;n cứu những c&ocirc;ng ty c&oacute; bước nhảy vọt v&agrave; bền vững để r&uacute;t ra những kết luận s&aacute;t sườn, những yếu tố cần k&iacute;p để đưa c&ocirc;ng ty từ tốt đến vĩ đại. Đ&oacute; l&agrave; những yếu tố khả năng l&atilde;nh đạo, con người, văn h&oacute;a, kỷ luật, c&ocirc;ng nghệ&hellip; Những yếu tố n&agrave;y được nh&oacute;m nghi&ecirc;n cứu xem x&eacute;t tỉ mỉ v&agrave; kiểm chứng cụ thể qua 11 c&ocirc;ng ty nhảy vọt l&ecirc;n vĩ đại. Mỗi kết luận của nh&oacute;m nghi&ecirc;n cứu đều hữu &iacute;ch, vượt thời gian, &yacute; nghĩa v&ocirc; c&ugrave;ng to lớn đối với mọi l&atilde;nh đạo v&agrave; quản l&yacute; ở mọi loại h&igrave;nh c&ocirc;ng ty (từ c&ocirc;ng ty c&oacute; nền tảng v&agrave; xuất ph&aacute;t tốt đến những c&ocirc;ng ty mới khởi nghiệp), v&agrave; mọi lĩnh vực ng&agrave;nh nghề. Đ&acirc;y l&agrave; cuốn s&aacute;ch n&ecirc;n đọc đối với bất kỳ l&atilde;nh đạo hay quản l&yacute; n&agrave;o!</p>', '<p>Jim Collins c&ugrave;ng nh&oacute;m nghi&ecirc;n cứu đ&atilde; miệt m&agrave;i nghi&ecirc;n cứu những c&ocirc;ng ty c&oacute; bước nhảy vọt v&agrave; bền vững để r&uacute;t ra những kết luận s&aacute;t sườn, những yếu tố cần k&iacute;p để đưa c&ocirc;ng ty từ tốt đến vĩ đại. Đ&oacute; l&agrave; những yếu tố khả năng l&atilde;nh đạo, con người, văn h&oacute;a, kỷ luật, c&ocirc;ng nghệ&hellip; Những yếu tố n&agrave;y được nh&oacute;m nghi&ecirc;n cứu xem x&eacute;t tỉ mỉ v&agrave; kiểm chứng cụ thể qua 11 c&ocirc;ng ty nhảy vọt l&ecirc;n vĩ đại. Mỗi kết luận của nh&oacute;m nghi&ecirc;n cứu đều hữu &iacute;ch, vượt thời gian, &yacute; nghĩa v&ocirc; c&ugrave;ng to lớn đối với mọi l&atilde;nh đạo v&agrave; quản l&yacute; ở mọi loại h&igrave;nh c&ocirc;ng ty (từ c&ocirc;ng ty c&oacute; nền tảng v&agrave; xuất ph&aacute;t tốt đến những c&ocirc;ng ty mới khởi nghiệp), v&agrave; mọi lĩnh vực ng&agrave;nh nghề. Đ&acirc;y l&agrave; cuốn s&aacute;ch n&ecirc;n đọc đối với bất kỳ l&atilde;nh đạo hay quản l&yacute; n&agrave;o!</p>', '<p>Jim Collins and his research team have diligently researched companies with great and sustainable leaps to draw close conclusions, the necessary factors to take companies from good to great. These are the factors of leadership, people, culture, discipline, technology... These factors were meticulously examined and specifically verified by the research team through 11 companies that jumped to greatness. Each conclusion of the research team is useful, timeless, and has great significance for all leaders and managers in all types of companies (from companies with good foundations and starting points to companies with startups), and all industry fields. This is a must-read book for any leader or manager!</p>', 'http://127.0.0.1:8000/storage/product/46qbzNEYNsMrS2piaRhNC9yXoWWuTs5zeBOXR4Wl.webp', 'http://127.0.0.1:8000/storage/product/pGNl4w7kPquppldrZSrE6ZRAXTb4SUKR7opXL2YE.webp', 104, 'ACTIVE', 2, NULL, NULL, '2024-10-29 00:48:27', '2024-10-29 00:48:27', NULL, 10, 3),
(6, 'Từ Tốt Đến Vĩ Đại - Jim Collins (Tái Bản 2021)', 'Từ Tốt Đến Vĩ Đại - Jim Collins (Tái Bản 2021)', 'Từ Tốt Đến Vĩ Đại - Jim Collins (Tái Bản 2021)', '<p>Jim Collins c&ugrave;ng nh&oacute;m nghi&ecirc;n cứu đ&atilde; miệt m&agrave;i nghi&ecirc;n cứu những c&ocirc;ng ty c&oacute; bước nhảy vọt v&agrave; bền vững để r&uacute;t ra những kết luận s&aacute;t sườn, những yếu tố cần k&iacute;p để đưa c&ocirc;ng ty từ tốt đến vĩ đại. Đ&oacute; l&agrave; những yếu tố khả năng l&atilde;nh đạo, con người, văn h&oacute;a, kỷ luật, c&ocirc;ng nghệ&hellip; Những yếu tố n&agrave;y được nh&oacute;m nghi&ecirc;n cứu xem x&eacute;t tỉ mỉ v&agrave; kiểm chứng cụ thể qua 11 c&ocirc;ng ty nhảy vọt l&ecirc;n vĩ đại. Mỗi kết luận của nh&oacute;m nghi&ecirc;n cứu đều hữu &iacute;ch, vượt thời gian, &yacute; nghĩa v&ocirc; c&ugrave;ng to lớn đối với mọi l&atilde;nh đạo v&agrave; quản l&yacute; ở mọi loại h&igrave;nh c&ocirc;ng ty (từ c&ocirc;ng ty c&oacute; nền tảng v&agrave; xuất ph&aacute;t tốt đến những c&ocirc;ng ty mới khởi nghiệp), v&agrave; mọi lĩnh vực ng&agrave;nh nghề. Đ&acirc;y l&agrave; cuốn s&aacute;ch n&ecirc;n đọc đối với bất kỳ l&atilde;nh đạo hay quản l&yacute; n&agrave;o!</p>', '<p>Jim Collins c&ugrave;ng nh&oacute;m nghi&ecirc;n cứu đ&atilde; miệt m&agrave;i nghi&ecirc;n cứu những c&ocirc;ng ty c&oacute; bước nhảy vọt v&agrave; bền vững để r&uacute;t ra những kết luận s&aacute;t sườn, những yếu tố cần k&iacute;p để đưa c&ocirc;ng ty từ tốt đến vĩ đại. Đ&oacute; l&agrave; những yếu tố khả năng l&atilde;nh đạo, con người, văn h&oacute;a, kỷ luật, c&ocirc;ng nghệ&hellip; Những yếu tố n&agrave;y được nh&oacute;m nghi&ecirc;n cứu xem x&eacute;t tỉ mỉ v&agrave; kiểm chứng cụ thể qua 11 c&ocirc;ng ty nhảy vọt l&ecirc;n vĩ đại. Mỗi kết luận của nh&oacute;m nghi&ecirc;n cứu đều hữu &iacute;ch, vượt thời gian, &yacute; nghĩa v&ocirc; c&ugrave;ng to lớn đối với mọi l&atilde;nh đạo v&agrave; quản l&yacute; ở mọi loại h&igrave;nh c&ocirc;ng ty (từ c&ocirc;ng ty c&oacute; nền tảng v&agrave; xuất ph&aacute;t tốt đến những c&ocirc;ng ty mới khởi nghiệp), v&agrave; mọi lĩnh vực ng&agrave;nh nghề. Đ&acirc;y l&agrave; cuốn s&aacute;ch n&ecirc;n đọc đối với bất kỳ l&atilde;nh đạo hay quản l&yacute; n&agrave;o!</p>', '<p>Jim Collins and his research team have diligently researched companies with great and sustainable leaps to draw close conclusions, the necessary factors to take companies from good to great. These are the factors of leadership, people, culture, discipline, technology... These factors were meticulously examined and specifically verified by the research team through 11 companies that jumped to greatness. Each conclusion of the research team is useful, timeless, and has great significance for all leaders and managers in all types of companies (from companies with good foundations and starting points to companies with startups), and all industry fields. This is a must-read book for any leader or manager!</p>', '<p>Jim Collins c&ugrave;ng nh&oacute;m nghi&ecirc;n cứu đ&atilde; miệt m&agrave;i nghi&ecirc;n cứu những c&ocirc;ng ty c&oacute; bước nhảy vọt v&agrave; bền vững để r&uacute;t ra những kết luận s&aacute;t sườn, những yếu tố cần k&iacute;p để đưa c&ocirc;ng ty từ tốt đến vĩ đại. Đ&oacute; l&agrave; những yếu tố khả năng l&atilde;nh đạo, con người, văn h&oacute;a, kỷ luật, c&ocirc;ng nghệ&hellip; Những yếu tố n&agrave;y được nh&oacute;m nghi&ecirc;n cứu xem x&eacute;t tỉ mỉ v&agrave; kiểm chứng cụ thể qua 11 c&ocirc;ng ty nhảy vọt l&ecirc;n vĩ đại. Mỗi kết luận của nh&oacute;m nghi&ecirc;n cứu đều hữu &iacute;ch, vượt thời gian, &yacute; nghĩa v&ocirc; c&ugrave;ng to lớn đối với mọi l&atilde;nh đạo v&agrave; quản l&yacute; ở mọi loại h&igrave;nh c&ocirc;ng ty (từ c&ocirc;ng ty c&oacute; nền tảng v&agrave; xuất ph&aacute;t tốt đến những c&ocirc;ng ty mới khởi nghiệp), v&agrave; mọi lĩnh vực ng&agrave;nh nghề. Đ&acirc;y l&agrave; cuốn s&aacute;ch n&ecirc;n đọc đối với bất kỳ l&atilde;nh đạo hay quản l&yacute; n&agrave;o!</p>', '<p>Jim Collins c&ugrave;ng nh&oacute;m nghi&ecirc;n cứu đ&atilde; miệt m&agrave;i nghi&ecirc;n cứu những c&ocirc;ng ty c&oacute; bước nhảy vọt v&agrave; bền vững để r&uacute;t ra những kết luận s&aacute;t sườn, những yếu tố cần k&iacute;p để đưa c&ocirc;ng ty từ tốt đến vĩ đại. Đ&oacute; l&agrave; những yếu tố khả năng l&atilde;nh đạo, con người, văn h&oacute;a, kỷ luật, c&ocirc;ng nghệ&hellip; Những yếu tố n&agrave;y được nh&oacute;m nghi&ecirc;n cứu xem x&eacute;t tỉ mỉ v&agrave; kiểm chứng cụ thể qua 11 c&ocirc;ng ty nhảy vọt l&ecirc;n vĩ đại. Mỗi kết luận của nh&oacute;m nghi&ecirc;n cứu đều hữu &iacute;ch, vượt thời gian, &yacute; nghĩa v&ocirc; c&ugrave;ng to lớn đối với mọi l&atilde;nh đạo v&agrave; quản l&yacute; ở mọi loại h&igrave;nh c&ocirc;ng ty (từ c&ocirc;ng ty c&oacute; nền tảng v&agrave; xuất ph&aacute;t tốt đến những c&ocirc;ng ty mới khởi nghiệp), v&agrave; mọi lĩnh vực ng&agrave;nh nghề. Đ&acirc;y l&agrave; cuốn s&aacute;ch n&ecirc;n đọc đối với bất kỳ l&atilde;nh đạo hay quản l&yacute; n&agrave;o!</p>', '<p>Jim Collins and his research team have diligently researched companies with great and sustainable leaps to draw close conclusions, the necessary factors to take companies from good to great. These are the factors of leadership, people, culture, discipline, technology... These factors were meticulously examined and specifically verified by the research team through 11 companies that jumped to greatness. Each conclusion of the research team is useful, timeless, and has great significance for all leaders and managers in all types of companies (from companies with good foundations and starting points to companies with startups), and all industry fields. This is a must-read book for any leader or manager!</p>', 'http://127.0.0.1:8000/storage/product/D84kF7bk6ZuAEBS5e2e2yZuabIihFJeRX7ekggBd.webp', 'http://127.0.0.1:8000/storage/product/VaYOgQXutGTZDQsCk6WZyAAmTsD7mNQINR84gXst.webp', 104, 'INACTIVE', 2, NULL, NULL, '2024-10-29 00:48:28', '2024-10-29 07:49:37', 2, 10, 3);
INSERT INTO `products` (`id`, `name`, `name_vi`, `name_en`, `short_description`, `short_description_vi`, `short_description_en`, `description`, `description_vi`, `description_en`, `thumbnail`, `gallery`, `price`, `status`, `created_by`, `deleted_at`, `deleted_by`, `created_at`, `updated_at`, `updated_by`, `quantity`, `category_id`) VALUES
(7, 'Người Trồng Rừng', 'Người Trồng Rừng', 'The Forester', '<p>Sự sống c&oacute; mặt l&agrave; nhờ sự kết hợp chặt chẽ của biết bao yếu tố đến từ mu&ocirc;n nơi, từ cả vũ trụ v&agrave; mu&ocirc;n người, mu&ocirc;n lo&agrave;i. C&oacute; &yacute; thức s&aacute;ng tỏ ấy, ta mới đem hết t&acirc;m &yacute; đ&oacute;ng g&oacute;p phần tốt nhất v&agrave; đẹp nhất của m&igrave;nh để bảo vệ sự sống, bảo vệ thi&ecirc;n nhi&ecirc;n v&agrave; mu&ocirc;n người, mu&ocirc;n lo&agrave;i.</p>', '<p>Sự sống c&oacute; mặt l&agrave; nhờ sự kết hợp chặt chẽ của biết bao yếu tố đến từ mu&ocirc;n nơi, từ cả vũ trụ v&agrave; mu&ocirc;n người, mu&ocirc;n lo&agrave;i. C&oacute; &yacute; thức s&aacute;ng tỏ ấy, ta mới đem hết t&acirc;m &yacute; đ&oacute;ng g&oacute;p phần tốt nhất v&agrave; đẹp nhất của m&igrave;nh để bảo vệ sự sống, bảo vệ thi&ecirc;n nhi&ecirc;n v&agrave; mu&ocirc;n người, mu&ocirc;n lo&agrave;i.</p>', '<p>Life exists thanks to the close combination of so many elements from all places, from the entire universe and all people and species. With that clear awareness, we can wholeheartedly contribute our best and most beautiful part to protect life, protect nature and all people and species.</p>', '<p>Sự sống c&oacute; mặt l&agrave; nhờ sự kết hợp chặt chẽ của biết bao yếu tố đến từ mu&ocirc;n nơi, từ cả vũ trụ v&agrave; mu&ocirc;n người, mu&ocirc;n lo&agrave;i. C&oacute; &yacute; thức s&aacute;ng tỏ ấy, ta mới đem hết t&acirc;m &yacute; đ&oacute;ng g&oacute;p phần tốt nhất v&agrave; đẹp nhất của m&igrave;nh để bảo vệ sự sống, bảo vệ thi&ecirc;n nhi&ecirc;n v&agrave; mu&ocirc;n người, mu&ocirc;n lo&agrave;i.</p>\r\n<p>Khi x&acirc;y dựng nh&acirc;n vật Elz&eacute;ard Bouffier, t&aacute;c giả đ&atilde; muốn n&oacute;i l&ecirc;n t&acirc;m nguyện thiết tha đ&oacute;, l&agrave; l&agrave;m sao con người v&agrave; thi&ecirc;n nhi&ecirc;n sống với nhau thật h&agrave;i h&ograve;a, trong mối th&acirc;m t&igrave;nh đ&atilde; c&oacute; với nhau từ mu&ocirc;n thuở. Ph&aacute; hủy mối th&acirc;m t&igrave;nh đ&oacute; l&agrave; ph&aacute; hủy tất cả.</p>\r\n<div><em>Người Trồng Rừng</em>&nbsp;l&agrave; c&acirc;u chuyện cảm động về &yacute; ch&iacute; cao cả v&agrave; bền bỉ của một người chăn cừu đ&atilde; d&agrave;nh hết t&acirc;m sức để trồng thật nhiều c&acirc;y trong một thung lũng hoang vắng, cằn cỗi ở v&ugrave;ng Alpes-Provence suốt nửa đầu thế kỷ 20. C&acirc;u chuyện sau đ&oacute; được dịch ra nhiều thứ tiếng v&agrave; g&acirc;y được phong tr&agrave;o t&aacute;i tạo rừng mạnh mẽ ở khắp nơi.</div>\r\n<div>&nbsp;</div>\r\n<div>Nội dung&nbsp;<em>Người Trồng Rừng</em>&nbsp;được chuyển thể th&agrave;nh phim năm 1987 v&agrave; đoạt giải&nbsp;<em>C&agrave;nh Cọ V&agrave;ng Phim ngắn</em>&nbsp;tại Li&ecirc;n hoan phim Cannes năm 1987, giải&nbsp;<em>Oscar cho Phim hoạt h&igrave;nh ngắn xuất sắc nhất</em> năm 1988.</div>', '<p>Sự sống c&oacute; mặt l&agrave; nhờ sự kết hợp chặt chẽ của biết bao yếu tố đến từ mu&ocirc;n nơi, từ cả vũ trụ v&agrave; mu&ocirc;n người, mu&ocirc;n lo&agrave;i. C&oacute; &yacute; thức s&aacute;ng tỏ ấy, ta mới đem hết t&acirc;m &yacute; đ&oacute;ng g&oacute;p phần tốt nhất v&agrave; đẹp nhất của m&igrave;nh để bảo vệ sự sống, bảo vệ thi&ecirc;n nhi&ecirc;n v&agrave; mu&ocirc;n người, mu&ocirc;n lo&agrave;i.</p>\r\n<p>Khi x&acirc;y dựng nh&acirc;n vật Elz&eacute;ard Bouffier, t&aacute;c giả đ&atilde; muốn n&oacute;i l&ecirc;n t&acirc;m nguyện thiết tha đ&oacute;, l&agrave; l&agrave;m sao con người v&agrave; thi&ecirc;n nhi&ecirc;n sống với nhau thật h&agrave;i h&ograve;a, trong mối th&acirc;m t&igrave;nh đ&atilde; c&oacute; với nhau từ mu&ocirc;n thuở. Ph&aacute; hủy mối th&acirc;m t&igrave;nh đ&oacute; l&agrave; ph&aacute; hủy tất cả.</p>\r\n<div><em>Người Trồng Rừng</em>&nbsp;l&agrave; c&acirc;u chuyện cảm động về &yacute; ch&iacute; cao cả v&agrave; bền bỉ của một người chăn cừu đ&atilde; d&agrave;nh hết t&acirc;m sức để trồng thật nhiều c&acirc;y trong một thung lũng hoang vắng, cằn cỗi ở v&ugrave;ng Alpes-Provence suốt nửa đầu thế kỷ 20. C&acirc;u chuyện sau đ&oacute; được dịch ra nhiều thứ tiếng v&agrave; g&acirc;y được phong tr&agrave;o t&aacute;i tạo rừng mạnh mẽ ở khắp nơi.</div>\r\n<div>&nbsp;</div>\r\n<div>Nội dung&nbsp;<em>Người Trồng Rừng</em>&nbsp;được chuyển thể th&agrave;nh phim năm 1987 v&agrave; đoạt giải&nbsp;<em>C&agrave;nh Cọ V&agrave;ng Phim ngắn</em>&nbsp;tại Li&ecirc;n hoan phim Cannes năm 1987, giải&nbsp;<em>Oscar cho Phim hoạt h&igrave;nh ngắn xuất sắc nhất</em> năm 1988.</div>', '<p>Life exists thanks to the close combination of so many elements from all places, from the entire universe and all people and species. With that clear awareness, we can wholeheartedly contribute our best and most beautiful part to protect life, protect nature and all people and species.</p>\r\n<p>When creating the character Elzéard Bouffier, the author wanted to express that passionate wish, which is how humans and nature can live together in harmony, in the deep love that has existed for each other since forever. Destroying that deep love is destroying everything.</p>\r\n<div><em>The Planter</em> is a touching story about the noble and persistent will of a shepherd who devoted himself to planting many trees in a desolate, barren valley. in the Alpes-Provence region during the first half of the 20th century. The story was later translated into many languages ​​and caused a strong forest regeneration movement everywhere.</div>\r\n<div> </div>\r\n<div>Content <em>The Planter</em> was adapted into a film in 1987 and won the <em>Palme d\'Or Short Film</em> at the 1987 Cannes Film Festival, the <em>Oscar for Best Animated Short Film</em>in 1988.</div>', 'http://127.0.0.1:8000/storage/product/QfVmEAWvbzhxKQyHJsYE0cKKfKJYXBSEUmQnOyDA.jpg', 'http://127.0.0.1:8000/storage/product/MyfIMsX6SLKmSs1JonM6TICi6BHNDXLpY01budOH.jpg,http://127.0.0.1:8000/storage/product/ypcuO916YvQrESnkEtRIiiWf90Zy1Ki6P6XWNKYc.jpg', 99, 'ACTIVE', 2, NULL, NULL, '2024-10-29 00:51:05', '2024-10-29 00:51:05', NULL, 100, 9),
(8, '[BAOKE] Dao rọc giấy vỏ inox Baoke 9mm', '[BAOKE] Dao rọc giấy vỏ inox Baoke 9mm', '[BAOKE] Baoke 9mm stainless steel paper cutter', '<p>Hiệu S&aacute;ch Mai đ&atilde; hoạt động hơn 20 năm trong ng&agrave;nh văn ph&ograve;ng phẩm, mang đến cho qu&yacute; kh&aacute;ch h&agrave;ng những sản phẩm s&aacute;ch, dụng cụ học tập v&agrave; văn ph&ograve;ng phẩm chất lượng. Với kinh nghiệm l&acirc;u năm, ch&uacute;ng t&ocirc;i lu&ocirc;n nỗ lực để phục vụ kh&aacute;ch h&agrave;ng một c&aacute;ch tốt nhất, đảm bảo c&aacute;c sản phẩm đều đạt ti&ecirc;u chuẩn v&agrave; đ&aacute;p ứng nhu cầu của mọi đối tượng. Ch&uacute;ng t&ocirc;i cam kết hỗ trợ đổi trả trong v&ograve;ng 15 ng&agrave;y sau khi nhận h&agrave;ng, gi&uacute;p qu&yacute; kh&aacute;ch h&agrave;ng an t&acirc;m khi mua sắm tại cửa h&agrave;ng của ch&uacute;ng t&ocirc;i. Th&ocirc;ng Tin Li&ecirc;n Hệ: 📲Hotline: 0382.680.526 📚Link Fanpage: https://www.facebook.com/HieusachMai 📦 Zalo sỉ: https://zalo.me/0355238747 H&atilde;y đến với Hiệu S&aacute;ch Mai để trải nghiệm dịch vụ tốt nhất v&agrave; t&igrave;m thấy những sản phẩm chất lượng cho nhu cầu học tập v&agrave; l&agrave;m việc của bạn!</p>', '<p>Hiệu S&aacute;ch Mai đ&atilde; hoạt động hơn 20 năm trong ng&agrave;nh văn ph&ograve;ng phẩm, mang đến cho qu&yacute; kh&aacute;ch h&agrave;ng những sản phẩm s&aacute;ch, dụng cụ học tập v&agrave; văn ph&ograve;ng phẩm chất lượng. Với kinh nghiệm l&acirc;u năm, ch&uacute;ng t&ocirc;i lu&ocirc;n nỗ lực để phục vụ kh&aacute;ch h&agrave;ng một c&aacute;ch tốt nhất, đảm bảo c&aacute;c sản phẩm đều đạt ti&ecirc;u chuẩn v&agrave; đ&aacute;p ứng nhu cầu của mọi đối tượng. Ch&uacute;ng t&ocirc;i cam kết hỗ trợ đổi trả trong v&ograve;ng 15 ng&agrave;y sau khi nhận h&agrave;ng, gi&uacute;p qu&yacute; kh&aacute;ch h&agrave;ng an t&acirc;m khi mua sắm tại cửa h&agrave;ng của ch&uacute;ng t&ocirc;i. Th&ocirc;ng Tin Li&ecirc;n Hệ: 📲Hotline: 0382.680.526 📚Link Fanpage: https://www.facebook.com/HieusachMai 📦 Zalo sỉ: https://zalo.me/0355238747 H&atilde;y đến với Hiệu S&aacute;ch Mai để trải nghiệm dịch vụ tốt nhất v&agrave; t&igrave;m thấy những sản phẩm chất lượng cho nhu cầu học tập v&agrave; l&agrave;m việc của bạn!</p>', '<p>Mai Bookstore has been operating for more than 20 years in the stationery industry, providing customers with quality books, school supplies and stationery products. With many years of experience, we always strive to serve customers in the best way, ensuring that products meet standards and meet the needs of all customers. We commit to support returns within 15 days after receiving goods, helping customers feel secure when shopping at our store. Contact Information: 📲Hotline: 0382.680.526 📚Fanpage Link: https://www.facebook.com/HieusachMai 📦 Wholesale Zalo: https://zalo.me/0355238747 Come to Mai Bookstore to experience the service best and find quality products for your study and work needs!</p>', '<p>Hiệu S&aacute;ch Mai đ&atilde; hoạt động hơn 20 năm trong ng&agrave;nh văn ph&ograve;ng phẩm, mang đến cho qu&yacute; kh&aacute;ch h&agrave;ng những sản phẩm s&aacute;ch, dụng cụ học tập v&agrave; văn ph&ograve;ng phẩm chất lượng. Với kinh nghiệm l&acirc;u năm, ch&uacute;ng t&ocirc;i lu&ocirc;n nỗ lực để phục vụ kh&aacute;ch h&agrave;ng một c&aacute;ch tốt nhất, đảm bảo c&aacute;c sản phẩm đều đạt ti&ecirc;u chuẩn v&agrave; đ&aacute;p ứng nhu cầu của mọi đối tượng. Ch&uacute;ng t&ocirc;i cam kết hỗ trợ đổi trả trong v&ograve;ng 15 ng&agrave;y sau khi nhận h&agrave;ng, gi&uacute;p qu&yacute; kh&aacute;ch h&agrave;ng an t&acirc;m khi mua sắm tại cửa h&agrave;ng của ch&uacute;ng t&ocirc;i. Th&ocirc;ng Tin Li&ecirc;n Hệ: 📲Hotline: 0382.680.526 📚Link Fanpage: https://www.facebook.com/HieusachMai 📦 Zalo sỉ: https://zalo.me/0355238747 H&atilde;y đến với Hiệu S&aacute;ch Mai để trải nghiệm dịch vụ tốt nhất v&agrave; t&igrave;m thấy những sản phẩm chất lượng cho nhu cầu học tập v&agrave; l&agrave;m việc của bạn!</p>', '<p>Hiệu S&aacute;ch Mai đ&atilde; hoạt động hơn 20 năm trong ng&agrave;nh văn ph&ograve;ng phẩm, mang đến cho qu&yacute; kh&aacute;ch h&agrave;ng những sản phẩm s&aacute;ch, dụng cụ học tập v&agrave; văn ph&ograve;ng phẩm chất lượng. Với kinh nghiệm l&acirc;u năm, ch&uacute;ng t&ocirc;i lu&ocirc;n nỗ lực để phục vụ kh&aacute;ch h&agrave;ng một c&aacute;ch tốt nhất, đảm bảo c&aacute;c sản phẩm đều đạt ti&ecirc;u chuẩn v&agrave; đ&aacute;p ứng nhu cầu của mọi đối tượng. Ch&uacute;ng t&ocirc;i cam kết hỗ trợ đổi trả trong v&ograve;ng 15 ng&agrave;y sau khi nhận h&agrave;ng, gi&uacute;p qu&yacute; kh&aacute;ch h&agrave;ng an t&acirc;m khi mua sắm tại cửa h&agrave;ng của ch&uacute;ng t&ocirc;i. Th&ocirc;ng Tin Li&ecirc;n Hệ: 📲Hotline: 0382.680.526 📚Link Fanpage: https://www.facebook.com/HieusachMai 📦 Zalo sỉ: https://zalo.me/0355238747 H&atilde;y đến với Hiệu S&aacute;ch Mai để trải nghiệm dịch vụ tốt nhất v&agrave; t&igrave;m thấy những sản phẩm chất lượng cho nhu cầu học tập v&agrave; l&agrave;m việc của bạn!</p>', '<p>Mai Bookstore has been operating for more than 20 years in the stationery industry, providing customers with quality books, school supplies and stationery products. With many years of experience, we always strive to serve customers in the best way, ensuring that products meet standards and meet the needs of all customers. We commit to support returns within 15 days after receiving goods, helping customers feel secure when shopping at our store. Contact Information: 📲Hotline: 0382.680.526 📚Fanpage Link: https://www.facebook.com/HieusachMai 📦 Wholesale Zalo: https://zalo.me/0355238747 Come to Mai Bookstore to experience the service best and find quality products for your study and work needs!</p>', 'http://127.0.0.1:8000/storage/product/MT9QVHAwCUdTQ9pxBPzB8ea7fTiirTNcey640oDV.webp', 'http://127.0.0.1:8000/storage/product/0fALoiHn5LcCigd1aBg4YrSKkG7pYIpqKwzl7QZJ.webp', 5, 'ACTIVE', 2, NULL, NULL, '2024-10-29 00:52:40', '2024-10-29 00:52:40', NULL, 1000, 11);

-- --------------------------------------------------------

--
-- Table structure for table `revenues`
--

CREATE TABLE `revenues` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `total` varchar(255) NOT NULL,
  `datetime` timestamp NOT NULL DEFAULT '2024-10-29 07:34:17',
  `order_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `reviews`
--

CREATE TABLE `reviews` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `content` longtext NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `star` int(11) NOT NULL COMMENT 'Số sao cho sản phẩm',
  `files` longtext DEFAULT NULL COMMENT 'File đính kèm',
  `status` varchar(255) NOT NULL DEFAULT 'PENDING',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'USER', NULL, NULL),
(2, 'ADMIN', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `role_users`
--

CREATE TABLE `role_users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `role_users`
--

INSERT INTO `role_users` (`id`, `role_id`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 2, 2, NULL, NULL),
(2, 1, 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `full_name` varchar(255) DEFAULT NULL,
  `username` varchar(255) DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `address` varchar(255) DEFAULT NULL,
  `about` longtext DEFAULT NULL,
  `status` varchar(255) NOT NULL DEFAULT 'ACTIVE',
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `token` longtext DEFAULT NULL,
  `avt` longtext NOT NULL DEFAULT 'image/avatar-default.svg'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `full_name`, `username`, `phone`, `email`, `email_verified_at`, `password`, `address`, `about`, `status`, `remember_token`, `created_at`, `updated_at`, `token`, `avt`) VALUES
(1, 'demo', 'user', '0989889889', 'user@gmail.com', NULL, '$2y$12$FooQbXlJG0hf1j8JD3cEQeRbWlkvjjTfhpCMMLF3jk.p0n32XFgny', 'HAIPHONG', '', 'ACTIVE', NULL, NULL, NULL, NULL, 'image/avatar-default.svg'),
(2, 'demo', 'admin', '0989889889', 'admin@gmail.com', NULL, '$2y$12$p3KsLPoZsheFenJWscEZaOlPvUqI6qPj9FwHeCI0axUkmR6c2g0Ke', 'HANOI', '', 'ACTIVE', NULL, NULL, NULL, NULL, 'image/avatar-default.svg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `carts`
--
ALTER TABLE `carts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `carts_product_id_foreign` (`product_id`),
  ADD KEY `carts_user_id_foreign` (`user_id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`),
  ADD KEY `categories_created_by_foreign` (`created_by`);

--
-- Indexes for table `contacts`
--
ALTER TABLE `contacts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `members`
--
ALTER TABLE `members`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `members_stt_unique` (`stt`),
  ADD KEY `members_created_by_foreign` (`created_by`);

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
  ADD KEY `products_category_id_foreign` (`category_id`);

--
-- Indexes for table `revenues`
--
ALTER TABLE `revenues`
  ADD PRIMARY KEY (`id`),
  ADD KEY `revenues_order_id_foreign` (`order_id`);

--
-- Indexes for table `reviews`
--
ALTER TABLE `reviews`
  ADD PRIMARY KEY (`id`),
  ADD KEY `reviews_user_id_foreign` (`user_id`),
  ADD KEY `reviews_product_id_foreign` (`product_id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `role_users`
--
ALTER TABLE `role_users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `role_users_user_id_foreign` (`user_id`),
  ADD KEY `role_users_role_id_foreign` (`role_id`);

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
-- AUTO_INCREMENT for table `carts`
--
ALTER TABLE `carts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `contacts`
--
ALTER TABLE `contacts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `members`
--
ALTER TABLE `members`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `order_items`
--
ALTER TABLE `order_items`
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
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `revenues`
--
ALTER TABLE `revenues`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `reviews`
--
ALTER TABLE `reviews`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `role_users`
--
ALTER TABLE `role_users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `carts`
--
ALTER TABLE `carts`
  ADD CONSTRAINT `carts_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `carts_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `categories`
--
ALTER TABLE `categories`
  ADD CONSTRAINT `categories_created_by_foreign` FOREIGN KEY (`created_by`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `members`
--
ALTER TABLE `members`
  ADD CONSTRAINT `members_created_by_foreign` FOREIGN KEY (`created_by`) REFERENCES `users` (`id`) ON DELETE CASCADE;

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
  ADD CONSTRAINT `products_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `products_created_by_foreign` FOREIGN KEY (`created_by`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `revenues`
--
ALTER TABLE `revenues`
  ADD CONSTRAINT `revenues_order_id_foreign` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `reviews`
--
ALTER TABLE `reviews`
  ADD CONSTRAINT `reviews_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `reviews_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `role_users`
--
ALTER TABLE `role_users`
  ADD CONSTRAINT `role_users_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `role_users_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
