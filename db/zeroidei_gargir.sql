-- phpMyAdmin SQL Dump
-- version 4.9.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: May 16, 2022 at 10:10 AM
-- Server version: 5.7.23-23
-- PHP Version: 7.3.32

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `zeroidei_gargir`
--

-- --------------------------------------------------------

--
-- Table structure for table `ads`
--

CREATE TABLE `ads` (
  `id` int(11) NOT NULL,
  `header_728` text,
  `header_468` text,
  `header_234` text,
  `index_728_top` text,
  `index_468_top` text,
  `index_234_top` text,
  `index_728_bottom` text,
  `index_468_bottom` text,
  `index_234_bottom` text,
  `posts_728` text,
  `posts_468` text,
  `posts_234` text,
  `videos_728` text,
  `videos_468` text,
  `videos_234` text,
  `category_728` text,
  `category_468` text,
  `category_234` text,
  `tag_728` text,
  `tag_468` text,
  `tag_234` text,
  `search_728` text,
  `search_468` text,
  `search_234` text,
  `post_details_728` text,
  `post_details_468` text,
  `post_details_234` text,
  `sidebar_300` text,
  `sidebar_234` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `ads`
--

INSERT INTO `ads` (`id`, `header_728`, `header_468`, `header_234`, `index_728_top`, `index_468_top`, `index_234_top`, `index_728_bottom`, `index_468_bottom`, `index_234_bottom`, `posts_728`, `posts_468`, `posts_234`, `videos_728`, `videos_468`, `videos_234`, `category_728`, `category_468`, `category_234`, `tag_728`, `tag_468`, `tag_234`, `search_728`, `search_468`, `search_234`, `post_details_728`, `post_details_468`, `post_details_234`, `sidebar_300`, `sidebar_234`) VALUES
(1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `apartments`
--

CREATE TABLE `apartments` (
  `id` int(11) NOT NULL,
  `slug` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `project_id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `assign_user_id` int(11) DEFAULT NULL,
  `client_id` int(11) DEFAULT NULL,
  `title` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `images` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `no_of_rooms` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `floor` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `apartment_no` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `sale_price` varchar(100) COLLATE utf8_unicode_ci NOT NULL DEFAULT '0',
  `discount` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `price_paid` varchar(100) COLLATE utf8_unicode_ci DEFAULT '0',
  `status` int(11) NOT NULL DEFAULT '1',
  `price_status` int(11) NOT NULL DEFAULT '1',
  `owner_name` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `saled_in` varchar(100) COLLATE utf8_unicode_ci NOT NULL DEFAULT '0',
  `city` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `zipcode` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `address` text COLLATE utf8_unicode_ci,
  `additional` text COLLATE utf8_unicode_ci,
  `sold_status` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `url` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `apartments`
--

INSERT INTO `apartments` (`id`, `slug`, `project_id`, `user_id`, `assign_user_id`, `client_id`, `title`, `images`, `no_of_rooms`, `floor`, `apartment_no`, `sale_price`, `discount`, `price_paid`, `status`, `price_status`, `owner_name`, `saled_in`, `city`, `zipcode`, `address`, `additional`, `sold_status`, `created_at`, `updated_at`, `url`) VALUES
(8, 'apartment-one-611bd189be547', 22, 87, NULL, NULL, 'apartment one', '16292131810.jpg,16292131811.jpg,16292131812.jpg', '4', '3', '10', '1000000', '0', '0', 1, 1, ' ', '0', 'mohali', '160055', '123, aerocity, mohai', 'apartment\r\nis\r\nsaled', 'unsold', '2021-08-17 15:11:05', '2021-08-17 15:11:05', ''),
(13, '1115-6142db7fd72ee', 30, 121, NULL, 122, '1115', '16317715190.jpg', '2', '10', '1', '1211', '200', '100', 1, 1, 'Rashmi   ', '10000', 'MOHALI', '160058', 'ccf chj j', 'b bkh kbh ', 'sold', '2021-09-16 05:51:59', '2021-09-16 05:51:59', ''),
(14, '1502-6142df2bbe250', 32, 121, NULL, 122, '1502', '16317724590.jpg', '3', '1', '1', '15000', '500', '5000', 1, 1, 'rashmi', '13000', 'MOHALI', '160058', 'gfgfdgfd', 'fghfgf', 'sold', '2021-09-16 06:07:39', '2021-09-16 06:07:39', '');

-- --------------------------------------------------------

--
-- Table structure for table `apartment_files`
--

CREATE TABLE `apartment_files` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `title` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `apartment_id` int(11) NOT NULL,
  `files` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status` int(11) NOT NULL DEFAULT '1',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `apartment_files`
--

INSERT INTO `apartment_files` (`id`, `user_id`, `title`, `apartment_id`, `files`, `status`, `created_at`, `updated_at`) VALUES
(6, 87, 'testing', 8, '1629284343.pdf', 1, '2021-08-18 10:59:03', '2021-08-18 10:59:03');

-- --------------------------------------------------------

--
-- Table structure for table `apartment_payments`
--

CREATE TABLE `apartment_payments` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `client_id` int(11) NOT NULL,
  `apartment_id` int(11) NOT NULL,
  `payment` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `payment_mode` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT '0',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `apartment_payments`
--

INSERT INTO `apartment_payments` (`id`, `user_id`, `client_id`, `apartment_id`, `payment`, `payment_mode`, `status`, `created_at`, `updated_at`) VALUES
(35, 121, 122, 13, '100', 'wire_transfer', 1, '2021-09-16 05:53:23', '2021-09-16 05:53:23'),
(36, 121, 122, 14, '5000', 'check', 1, '2021-09-16 06:07:39', '2021-09-16 06:07:39');

-- --------------------------------------------------------

--
-- Table structure for table `apartment_reports`
--

CREATE TABLE `apartment_reports` (
  `id` int(11) NOT NULL,
  `apartment_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `title` text COLLATE utf8_unicode_ci NOT NULL,
  `images` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `apartment_reports`
--

INSERT INTO `apartment_reports` (`id`, `apartment_id`, `user_id`, `updated_by`, `title`, `images`, `description`, `created_at`, `updated_at`) VALUES
(19, 8, 87, 87, 'this is testing', '16292662800.jpg', 'testing', '2021-08-18 05:58:00', '2021-08-18 05:58:00');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `name_slug` varchar(255) DEFAULT NULL,
  `parent_id` int(11) DEFAULT '0',
  `description` varchar(500) DEFAULT NULL,
  `keywords` varchar(500) DEFAULT NULL,
  `color` varchar(255) DEFAULT NULL,
  `block_type` varchar(255) DEFAULT NULL,
  `category_order` int(11) DEFAULT '0',
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `name_slug`, `parent_id`, `description`, `keywords`, `color`, `block_type`, `category_order`, `created_at`) VALUES
(1, 'Health', 'health', 0, '', '', '#e83737', 'block-1', 5, '2017-12-11 06:42:24'),
(2, 'Fitness', 'fitness', 1, '', '', '#e83737', NULL, NULL, '2017-12-11 06:42:52'),
(3, 'India', 'india', 0, 'India News: Tally Post brings the top news headlines from India on Politics, Current Affairs, Sports, Entertainment, Technology and Indian Business News.', 'india news,times, tally post, tally, post, india news,latest india news,india news online,news from india,times of india,indian news,latest news,india latest news,times news,live news india,news paper india,news on india,timesofindia,the times of india,current india news,latest india breaking news', '#2b66ff', 'block-1', 1, '2018-01-31 09:38:47'),
(4, 'East Zone', 'east-zone', 3, '', '', '#2b66ff', NULL, NULL, '2018-01-31 09:40:36'),
(5, 'West Zone', 'west-zone', 3, '', '', '#2b66ff', NULL, NULL, '2018-01-31 09:40:44'),
(6, 'North Zone', 'north-zone', 3, '', '', '#2b66ff', NULL, NULL, '2018-01-31 09:41:01'),
(7, 'South Zone', 'south-zone', 3, '', '', '#2b66ff', NULL, NULL, '2018-01-31 09:41:10'),
(8, 'All India', 'all-india', 3, '', '', '#2b66ff', NULL, NULL, '2018-02-26 01:08:00'),
(9, 'Sports', 'sports', 0, '', '', '#102b89', 'block-3', 4, '2018-02-26 01:14:50'),
(10, 'Cricket', 'cricket', 9, '', '', '#102b89', NULL, NULL, '2018-02-26 01:15:07'),
(11, 'Football', 'football', 9, '', '', '#102b89', NULL, NULL, '2018-02-26 01:21:51');

-- --------------------------------------------------------

--
-- Table structure for table `chat_messages`
--

CREATE TABLE `chat_messages` (
  `chat_messages_id` int(11) NOT NULL,
  `sender_id` int(11) NOT NULL,
  `receiver_id` int(11) NOT NULL,
  `chat_messages_text` text NOT NULL,
  `chat_messages_status` enum('no','yes') NOT NULL,
  `chat_messages_datetime` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` int(11) NOT NULL,
  `post_id` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `parent_id` int(11) DEFAULT NULL,
  `comment` varchar(5000) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `post_id`, `user_id`, `parent_id`, `comment`, `created_at`) VALUES
(1, 5, 2, 0, 'nice.....', '2018-02-26 10:20:03'),
(3, 5, 35, 0, 'nice..', '2018-02-27 04:14:43'),
(4, 5, 1, 0, 'thanks again.. ', '2018-02-27 04:31:31'),
(55, 2, 1, 0, 'thanks again...', '2018-02-28 11:20:54'),
(57, 2, 2, 0, 'sd\r\n', '2018-02-28 11:36:37'),
(61, 1, 2, 0, 'nice...', '2018-03-01 05:08:02'),
(62, 10, 1, 0, 'nice....', '2018-03-01 06:22:09'),
(63, 13, 2, 0, 'fhtr', '2018-03-01 07:14:52'),
(64, 5, 2, 3, 'ccooo.....', '2018-03-27 11:06:15');

-- --------------------------------------------------------

--
-- Table structure for table `comment_likes`
--

CREATE TABLE `comment_likes` (
  `id` int(11) NOT NULL,
  `comment_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `comment_likes`
--

INSERT INTO `comment_likes` (`id`, `comment_id`, `user_id`) VALUES
(2, 1, 1),
(8, 2, 35),
(9, 3, 1),
(10, 4, 2),
(11, 13, 1),
(12, 21, 2),
(17, 2, 2);

-- --------------------------------------------------------

--
-- Table structure for table `contacts`
--

CREATE TABLE `contacts` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `message` varchar(5000) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `contacts`
--

INSERT INTO `contacts` (`id`, `name`, `email`, `message`, `created_at`) VALUES
(1, 'erew', 'dfda', 'gfd', '2021-05-11 12:14:32');

-- --------------------------------------------------------

--
-- Table structure for table `files`
--

CREATE TABLE `files` (
  `id` int(11) NOT NULL,
  `project_id` int(11) DEFAULT NULL,
  `apartment_id` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `worker` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `client_id` int(11) DEFAULT NULL,
  `uploaded_by` int(11) DEFAULT NULL,
  `title` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `files` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status` int(11) NOT NULL DEFAULT '0',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `finance`
--

CREATE TABLE `finance` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT '0',
  `payment` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `payment_method` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `receive_date` date NOT NULL,
  `end_date` date NOT NULL,
  `status` int(11) NOT NULL DEFAULT '1',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `finance`
--

INSERT INTO `finance` (`id`, `user_id`, `payment`, `payment_method`, `receive_date`, `end_date`, `status`, `created_at`) VALUES
(9, 87, '100', 'cash', '2021-08-26', '2021-09-25', 1, '2021-08-26 10:51:52');

-- --------------------------------------------------------

--
-- Table structure for table `gallery`
--

CREATE TABLE `gallery` (
  `id` int(11) NOT NULL,
  `title` varchar(500) DEFAULT NULL,
  `category_id` int(11) DEFAULT NULL,
  `path_big` varchar(255) DEFAULT NULL,
  `path_small` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `gallery`
--

INSERT INTO `gallery` (`id`, `title`, `category_id`, `path_big`, `path_small`, `created_at`) VALUES
(1, 'Shubman Gill shows glimpses of Virat', 1, 'uploads/gallery/image_big_5a71a5b2c42b2.jpg', 'uploads/gallery/image_small_5a71a5b2eacb8.jpg', '2018-01-31 11:17:07'),
(2, 'Shubman Gill shows glimpses of Virat', 1, 'uploads/gallery/image_big_5a71a62617802.jpg', 'uploads/gallery/image_small_5a71a6263234b.jpg', '2018-01-31 11:19:02'),
(3, 'ttttttttt', 2, 'uploads/gallery/image_big_5a869146d95c0.jpg', 'uploads/gallery/image_small_5a8691472f168.jpg', '2018-02-16 08:07:35');

-- --------------------------------------------------------

--
-- Table structure for table `gallery_categories`
--

CREATE TABLE `gallery_categories` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `gallery_categories`
--

INSERT INTO `gallery_categories` (`id`, `name`, `created_at`) VALUES
(1, 'Sports', '2018-01-31 11:15:29'),
(2, 'teas', '2018-02-16 08:05:11');

-- --------------------------------------------------------

--
-- Table structure for table `invoices`
--

CREATE TABLE `invoices` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL DEFAULT '0',
  `pid` int(11) NOT NULL DEFAULT '0',
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `number` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT '0000000000',
  `company_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `date_issue` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `url` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `type` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'invoice',
  `gst_number` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT '10AABCU9603R1Z2',
  `gst_charges` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT '0.00',
  `subtotal` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT '0.00',
  `address` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `tax_rate` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT '0.00',
  `total_tax` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT '0.00',
  `bill_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `bill_email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `bill_zipcode` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `bill_country` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `bill_phone` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT '0000000000',
  `bill_address` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `option` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `signatcherimg` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `logo` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `option1` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `currency` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'USD',
  `country` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `zipcode` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `discount` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT '0.00',
  `invoice_total` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT '0.00',
  `send_mail` int(11) NOT NULL DEFAULT '1',
  `pin` int(11) NOT NULL DEFAULT '1',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `status` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `invoices`
--

INSERT INTO `invoices` (`id`, `user_id`, `pid`, `name`, `number`, `phone`, `company_name`, `date_issue`, `email`, `url`, `type`, `gst_number`, `gst_charges`, `subtotal`, `address`, `tax_rate`, `total_tax`, `bill_name`, `bill_email`, `bill_zipcode`, `bill_country`, `bill_phone`, `bill_address`, `option`, `signatcherimg`, `logo`, `option1`, `currency`, `country`, `zipcode`, `discount`, `invoice_total`, `send_mail`, `pin`, `created_at`, `status`) VALUES
(7, 1, 5, 'Invoice', '74203296', '0000000000', 'Nadlanpro', '06/07/2021', 'admin@admin.com', '', 'invoice', '10AABCU9603R1Z2', '0.00', '0.00', 'fds', '0.00', '0.00', 'demo', 'chandan.zeroit@gmail.com', '140055', 'india', '0000000000', 'dsfad', '', 'uploads/signature/1625593601', 'uploads/logo/1625593601cars.jpg', '', 'USD', 'india', '560011', '0.00', '0.00', 0, 1, '2021-07-06 17:46:41', 1),
(8, 1, 8, 'Invoice', '35152413', '9041377122', 'Nadlanpro', '15/07/2021', 'rishibarwal229@gmail.com', '', 'invoice', '10AABCU9603R1Z2', '0.00', '0.00', 'f\r\nf', '0.00', '0.00', 'rishi kumar', 'rishibarwal229@gmail.com', '248001', 'India', '904132222', 'f\r\nf', '', 'uploads/signature/1626327628', 'uploads/logo/1626327628Copy+of+Zoho.CRM.Dashboard6.jpg', '', 'USD', 'India', '248001', '0.00', '0.00', 0, 1, '2021-07-15 05:40:28', 1);

-- --------------------------------------------------------

--
-- Table structure for table `login_data`
--

CREATE TABLE `login_data` (
  `login_data_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `last_activity` datetime NOT NULL,
  `is_type` enum('no','yes') NOT NULL,
  `receiver_user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `login_data`
--

INSERT INTO `login_data` (`login_data_id`, `user_id`, `last_activity`, `is_type`, `receiver_user_id`) VALUES
(1, 1, '0000-00-00 00:00:00', 'no', 0),
(2, 1, '2021-08-28 01:34:48', 'no', 88),
(3, 88, '2021-08-28 01:35:02', 'no', 87),
(4, 1, '2021-08-28 20:37:59', 'no', 88),
(5, 88, '2021-08-28 20:37:40', 'no', 1),
(6, 1, '2021-08-30 11:13:01', 'no', 88),
(7, 88, '2021-08-30 14:10:54', 'no', 0),
(8, 88, '2021-08-30 14:14:16', 'no', 0),
(9, 87, '2021-08-30 14:15:26', 'no', 0),
(10, 88, '2021-08-30 14:17:43', 'no', 0),
(11, 87, '2021-08-30 14:21:28', 'no', 0),
(12, 87, '2021-08-30 19:19:34', 'no', 88),
(13, 88, '2021-08-30 20:43:16', 'no', 87),
(14, 87, '2021-08-31 11:16:44', 'no', 88),
(15, 88, '2021-08-31 11:40:27', 'no', 0),
(16, 87, '2021-08-31 11:25:47', 'no', 88),
(17, 87, '2021-08-31 11:27:03', 'no', 0),
(18, 87, '2021-08-31 11:27:04', 'no', 0),
(19, 87, '2021-08-31 16:52:41', 'no', 0),
(20, 88, '2021-08-31 12:57:07', 'no', 87),
(21, 88, '2021-08-31 18:35:02', 'no', 87),
(22, 88, '2021-08-31 17:27:02', 'no', 0),
(23, 87, '2021-08-31 18:17:14', 'no', 0),
(24, 87, '2021-08-31 18:26:01', 'no', 0),
(25, 87, '2021-08-31 19:35:13', 'no', 88),
(26, 87, '2021-09-01 15:05:45', 'no', 0),
(27, 1, '2021-09-03 15:14:30', 'no', 0),
(28, 88, '2021-09-03 18:09:50', 'no', 0),
(29, 1, '2021-09-03 18:10:34', 'no', 0),
(30, 1, '2021-09-03 18:18:05', 'no', 0),
(31, 87, '2021-09-03 18:18:11', 'no', 0),
(32, 1, '2021-09-03 18:29:59', 'no', 0),
(33, 1, '2021-09-06 09:57:23', 'no', 0),
(34, 1, '2021-09-06 18:37:06', 'no', 0),
(35, 1, '2021-09-06 12:57:40', 'no', 0),
(36, 1, '2021-09-06 12:57:41', 'no', 0),
(37, 1, '2021-09-06 12:58:10', 'no', 0),
(38, 1, '2021-09-06 13:01:11', 'no', 0),
(39, 1, '2021-09-06 13:15:47', 'no', 0),
(40, 1, '2021-09-06 13:58:21', 'no', 0),
(41, 87, '2021-09-06 15:28:59', 'no', 0),
(42, 87, '2021-09-06 18:23:12', 'no', 0),
(43, 88, '2021-09-06 18:23:35', 'no', 0),
(44, 89, '2021-09-06 18:25:10', 'no', 0),
(45, 89, '2021-09-06 18:25:15', 'no', 0),
(46, 1, '2021-09-06 18:30:48', 'no', 0),
(47, 1, '2021-09-06 18:32:14', 'no', 0),
(48, 1, '2021-09-06 21:09:04', 'no', 0),
(49, 87, '2021-09-06 21:11:25', 'no', 0),
(50, 87, '2021-09-07 09:34:14', 'no', 0),
(51, 87, '2021-09-07 09:34:39', 'no', 0),
(52, 87, '2021-09-07 09:38:38', 'no', 0),
(53, 87, '2021-09-07 09:38:57', 'no', 0),
(54, 87, '2021-09-07 09:42:30', 'no', 0),
(55, 87, '2021-09-07 09:43:42', 'no', 0),
(56, 87, '2021-09-07 09:47:54', 'no', 0),
(57, 87, '2021-09-07 09:50:03', 'no', 0),
(58, 87, '2021-09-07 10:49:39', 'no', 0),
(59, 1, '2021-09-07 15:09:03', 'no', 0),
(60, 88, '2021-09-07 12:40:53', 'no', 1),
(61, 1, '2021-09-07 12:43:50', 'no', 88),
(62, 88, '2021-09-07 13:02:09', 'no', 1),
(63, 89, '2021-09-07 13:03:23', 'no', 0),
(64, 88, '2021-09-07 13:46:04', 'no', 1),
(65, 87, '2021-09-07 16:10:09', 'no', 1),
(66, 87, '2021-09-08 10:43:56', 'no', 0),
(67, 88, '2021-09-08 11:17:53', 'no', 0),
(68, 88, '2021-09-08 11:18:17', 'no', 0),
(69, 89, '2021-09-08 11:22:07', 'no', 0),
(70, 87, '2021-09-10 09:50:33', 'no', 0),
(71, 87, '2021-09-13 10:49:27', 'no', 0),
(72, 87, '2021-09-13 11:26:51', 'no', 0),
(73, 87, '2021-09-13 11:27:17', 'no', 0),
(74, 87, '2021-09-13 11:29:41', 'no', 0),
(75, 87, '2021-09-13 12:23:33', 'no', 90),
(76, 87, '2021-09-13 12:45:21', 'no', 0),
(77, 88, '2021-09-13 12:49:41', 'no', 0),
(78, 87, '2021-09-13 15:36:43', 'no', 1),
(79, 87, '2021-09-13 15:55:21', 'no', 0),
(80, 87, '2021-09-13 23:38:21', 'no', 0),
(81, 87, '2021-09-14 10:56:43', 'no', 0),
(82, 88, '2021-09-14 12:00:11', 'no', 0),
(83, 88, '2021-09-14 10:57:00', 'no', 0),
(84, 87, '2021-09-14 11:08:48', 'no', 0),
(85, 88, '2021-09-14 11:32:47', 'no', 0),
(86, 89, '2021-09-14 11:33:06', 'no', 0),
(87, 87, '2021-09-14 11:33:29', 'no', 0),
(88, 88, '2021-09-14 11:37:13', 'no', 0),
(89, 89, '2021-09-14 11:37:28', 'no', 0),
(90, 87, '2021-09-14 11:54:04', 'no', 88),
(91, 88, '2021-09-14 11:54:49', 'no', 87),
(92, 87, '2021-09-16 09:11:15', 'no', 0),
(93, 87, '2021-09-16 09:36:21', 'no', 0),
(94, 88, '2021-09-16 09:37:01', 'no', 0),
(95, 1, '2021-09-16 09:38:43', 'no', 0),
(96, 88, '2021-09-16 09:40:23', 'no', 0),
(97, 87, '2021-09-16 09:49:14', 'no', 0),
(98, 1, '2021-09-16 09:55:03', 'no', 0),
(99, 87, '2021-09-16 10:09:24', 'no', 0),
(100, 87, '2021-09-16 10:10:43', 'no', 0),
(101, 87, '2021-09-16 10:11:55', 'no', 0),
(102, 1, '2021-09-16 10:13:04', 'no', 0),
(103, 116, '2021-09-16 10:18:51', 'no', 0),
(104, 117, '2021-09-16 10:21:57', 'no', 0),
(105, 117, '2021-09-16 10:23:00', 'no', 0),
(106, 1, '2021-09-16 10:27:37', 'no', 0),
(107, 118, '2021-09-16 10:29:16', 'no', 0),
(108, 120, '2021-09-16 10:38:37', 'no', 0),
(109, 119, '2021-09-16 10:39:48', 'no', 0),
(110, 1, '2021-09-16 10:45:47', 'no', 0),
(111, 121, '2021-09-16 10:55:13', 'no', 0),
(112, 121, '2021-09-16 11:00:46', 'no', 0),
(113, 122, '2021-09-16 11:01:08', 'no', 0),
(114, 123, '2021-09-16 11:01:47', 'no', 0),
(115, 1, '2021-09-16 12:14:59', 'no', 0),
(116, 87, '2021-09-16 12:30:40', 'no', 0),
(117, 88, '2021-09-16 13:45:55', 'no', 0),
(118, 89, '2021-09-16 13:58:32', 'no', 0),
(119, 88, '2021-09-16 14:13:04', 'no', 0),
(120, 123, '2021-09-16 14:24:11', 'no', 0),
(121, 117, '2021-09-16 14:25:01', 'no', 0),
(122, 123, '2021-09-16 14:38:55', 'no', 125),
(123, 123, '2021-09-20 11:39:00', 'no', 0),
(124, 123, '2021-09-20 11:40:07', 'no', 0),
(125, 1, '2021-09-20 11:47:37', 'no', 0),
(126, 1, '2021-09-20 15:08:49', 'no', 0),
(127, 121, '2021-09-20 15:12:48', 'no', 0),
(128, 121, '2021-09-20 15:12:49', 'no', 0),
(129, 121, '2021-09-20 15:18:05', 'no', 0),
(130, 121, '2021-09-20 15:29:47', 'no', 0),
(131, 121, '2021-09-20 18:41:51', 'no', 0),
(132, 121, '2021-09-20 18:41:55', 'no', 0),
(133, 88, '2021-09-21 09:51:19', 'no', 0),
(134, 89, '2021-09-21 17:03:15', 'no', 0),
(135, 88, '2021-09-21 17:14:52', 'no', 0),
(136, 89, '2021-09-21 17:19:28', 'no', 0),
(137, 1, '2021-09-21 17:20:19', 'no', 0),
(138, 89, '2021-09-22 10:08:56', 'no', 0),
(139, 89, '2021-09-22 11:34:06', 'no', 0),
(140, 1, '2021-09-22 11:35:58', 'no', 0),
(141, 87, '2021-09-22 11:44:14', 'no', 1),
(142, 88, '2021-09-22 11:55:14', 'no', 0),
(143, 89, '2021-09-22 11:56:51', 'no', 0),
(144, 87, '2021-09-22 12:05:34', 'no', 0),
(145, 89, '2021-09-22 12:09:41', 'no', 0),
(146, 88, '2021-09-22 12:10:25', 'no', 0),
(147, 1, '2021-09-22 12:12:29', 'no', 0),
(148, 87, '2021-09-23 15:13:27', 'no', 0),
(149, 87, '2021-09-26 20:08:41', 'no', 88),
(150, 88, '2021-09-26 20:08:36', 'no', 87),
(151, 1, '2021-09-30 12:35:24', 'no', 0),
(152, 1, '2021-10-19 12:22:26', 'no', 0),
(153, 1, '2021-10-19 12:23:31', 'no', 0),
(154, 1, '2021-10-19 12:40:02', 'no', 0),
(155, 1, '2021-10-28 11:43:42', 'no', 0),
(156, 88, '2022-05-02 16:12:04', 'no', 0);

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT '0',
  `name` varchar(255) DEFAULT NULL,
  `content` varchar(255) DEFAULT NULL,
  `type` varchar(255) NOT NULL DEFAULT 'sendmsg',
  `file` varchar(255) DEFAULT NULL,
  `file_type` varchar(50) DEFAULT NULL,
  `parent_id` int(11) NOT NULL DEFAULT '0',
  `pin` int(11) NOT NULL DEFAULT '1',
  `send_email` varchar(255) DEFAULT NULL,
  `send_mail` int(11) NOT NULL DEFAULT '0',
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `status` int(11) NOT NULL DEFAULT '1',
  `noti_play` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `messages`
--

INSERT INTO `messages` (`id`, `user_id`, `name`, `content`, `type`, `file`, `file_type`, `parent_id`, `pin`, `send_email`, `send_mail`, `created`, `status`, `noti_play`) VALUES
(121, 88, NULL, NULL, 'sendmsg', 'uploads/chat/1631000957.png', 'png', 1, 1, NULL, 0, '2021-09-07 07:49:17', 1, 1),
(122, 1, NULL, NULL, 'sendmsg', 'uploads/chat/1631001777.pdf', 'pdf', 88, 1, NULL, 0, '2021-09-07 08:02:57', 1, 1),
(123, 1, NULL, NULL, 'sendmsg', 'uploads/chat/1631001780.pdf', 'pdf', 87, 1, NULL, 0, '2021-09-07 08:03:00', 1, 1),
(124, 1, NULL, 'hello sir can you please send me a pdf file for just testing that upload btn is also working for pdf files or not<div><br></div>', 'sendmsg', NULL, NULL, 88, 1, NULL, 0, '2021-09-07 08:03:11', 1, 1),
(126, 88, NULL, NULL, 'sendmsg', 'uploads/chat/1631001929.pdf', 'pdf', 1, 1, NULL, 0, '2021-09-07 08:05:29', 1, 1),
(127, 88, NULL, 'upr wali glt send hogi<br>', 'sendmsg', NULL, NULL, 1, 1, NULL, 0, '2021-09-07 08:05:46', 1, 1),
(128, 88, NULL, 'pdf and image ch time reh gya bs<br>', 'sendmsg', NULL, NULL, 1, 1, NULL, 0, '2021-09-07 08:06:49', 1, 1),
(129, 1, NULL, 'its fine no problem', 'sendmsg', NULL, NULL, 88, 1, NULL, 0, '2021-09-07 08:07:14', 1, 1),
(130, 88, NULL, 'te right align thik pdf image <br>', 'sendmsg', NULL, NULL, 1, 1, NULL, 0, '2021-09-07 08:07:40', 1, 1),
(131, 1, NULL, 'refresh your chat page and then check for time', 'sendmsg', NULL, NULL, 88, 1, NULL, 0, '2021-09-07 08:07:56', 1, 1),
(132, 88, NULL, 'thoda center ch show ho reha<br>', 'sendmsg', NULL, NULL, 1, 1, NULL, 0, '2021-09-07 08:07:57', 1, 1),
(133, 88, NULL, 'hmm now its fine<br>', 'sendmsg', NULL, NULL, 1, 1, NULL, 0, '2021-09-07 08:08:52', 1, 1),
(134, 88, NULL, 'gurpreet notification sound aaunda tuahnu jdo new msg aaunda<br>', 'sendmsg', NULL, NULL, 1, 1, NULL, 0, '2021-09-07 08:09:54', 1, 1),
(135, 1, NULL, 'mere system ch speaker hi ni ha ha :) :)<div>bt uper favicon de right side te show hunda h</div><div><br></div>', 'sendmsg', NULL, NULL, 88, 1, NULL, 0, '2021-09-07 08:13:22', 1, 1),
(136, 88, NULL, 'kk hun bs mobile responsive wala km o dekhlo<br>', 'sendmsg', NULL, NULL, 1, 1, NULL, 0, '2021-09-07 08:14:20', 1, 1),
(137, 88, NULL, 'tusi logout krke dubara login kro username-1234, pass-123<br>', 'sendmsg', NULL, NULL, 1, 1, NULL, 0, '2021-09-07 08:15:00', 1, 1),
(138, 1, NULL, 'ok, thanks for reminding, forgot about that', 'sendmsg', NULL, NULL, 88, 1, NULL, 0, '2021-09-07 08:15:14', 1, 1),
(139, 87, NULL, 'hiiiii', 'sendmsg', NULL, NULL, 1, 1, NULL, 0, '2021-09-13 06:52:36', 1, 1),
(140, 87, NULL, 'hiiii', 'sendmsg', NULL, NULL, 90, 1, NULL, 0, '2021-09-13 06:53:25', 0, 0),
(141, 1, NULL, 'hello', 'sendmsg', NULL, NULL, 87, 1, NULL, 0, '2021-09-13 08:29:46', 1, 1),
(142, 87, NULL, 'hello', 'sendmsg', NULL, NULL, 88, 1, NULL, 0, '2021-09-14 06:24:00', 1, 1),
(143, 88, NULL, 'Hell', 'sendmsg', NULL, NULL, 87, 1, NULL, 0, '2021-09-26 14:37:21', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `newsletters`
--

CREATE TABLE `newsletters` (
  `id` int(11) NOT NULL,
  `email` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `pages`
--

CREATE TABLE `pages` (
  `id` int(11) NOT NULL,
  `title` varchar(500) DEFAULT NULL,
  `slug` varchar(500) DEFAULT NULL,
  `description` varchar(500) DEFAULT NULL,
  `keywords` varchar(500) DEFAULT NULL,
  `is_custom` int(11) DEFAULT '1',
  `page_content` text,
  `page_order` int(11) DEFAULT '1',
  `visibility` int(11) DEFAULT '1',
  `title_active` int(11) DEFAULT '1',
  `breadcrumb_active` int(11) DEFAULT '1',
  `right_column_active` int(11) DEFAULT '1',
  `need_auth` int(11) DEFAULT '0',
  `location` varchar(255) DEFAULT 'top',
  `status` int(11) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `pages`
--

INSERT INTO `pages` (`id`, `title`, `slug`, `description`, `keywords`, `is_custom`, `page_content`, `page_order`, `visibility`, `title_active`, `breadcrumb_active`, `right_column_active`, `need_auth`, `location`, `status`, `created_at`) VALUES
(1, 'Home', 'index', 'Public,Business', 'nadlanpro,team,about-us,public', 0, '', NULL, 1, NULL, NULL, NULL, NULL, 'main', 1, '2017-11-22 20:05:45'),
(7, 'Contact Us', 'contact', 'Contact Page', 'contact, page', 0, '', NULL, 1, NULL, NULL, NULL, NULL, 'main', 1, '2017-11-22 20:22:18'),
(11, 'RSS Channels', 'rss-channels', 'RSS Channels Page', 'rss channels, rss feeds', 0, '', 0, 0, 1, 1, 0, 0, 'none', 1, '2017-11-22 20:44:10'),
(13, 'Privacy Policy ', 'privacy-policy', 'Privacy Policy Page', 'user agreement, terms', 0, '<p>This privacy policy explains our policy regarding the collection, use, disclosure and transfer of your information by Nadlanpro Post and/or its subsidiary(ies) and/or affiliate(s) (collectively referred to as the &quot;Company&quot;), which operates various websites and other services including but not limited to delivery of information and content via any mobile or internet connected device or otherwise (collectively the &quot;Services&quot;). This privacy policy forms part and parcel of the Terms of Use for the Services. Capitalized terms which have been used here but are undefined shall have the same meaning as attributed to them in the Terms of Use.</p>\r\n\r\n<p>As we update, improve and expand the Services, this policy may change, so please refer back to it periodically. By accessing the Company website or this Application or otherwise using the Services, you consent to collection, storage, and use of the personal information you provide (including any changes thereto as provided by you) for any of the services that we offer.</p>\r\n\r\n<p>The Company respects the privacy of the users of the Services and is committed to reasonably protect it in all respects. The information about the user as collected by the Company is: (a) information supplied by users and (b) information automatically tracked while navigation (c) information collected from any other source (collectively referred to as Information).</p>\r\n\r\n<p><strong>1. INFORMATION RECEIVED, COLLECTED AND STORED BY THE COMPANY</strong></p>\r\n\r\n<p>A. INFORMATION SUPPLIED BY USERS</p>\r\n\r\n<p><strong>Registration data:</strong></p>\r\n\r\n<p>When you register on the website, Application and for the Service, we ask that you provide basic contact Information such as your name, sex, age, address, pin code, contact number, occupation, interests and email address etc. When you register using your other accounts like on Facebook, Twitter, Gmail etc. we shall retrieve Information from such account to continue to interact with you and to continue providing the Services.</p>\r\n\r\n<p><strong>Subscription or paid service data:</strong></p>\r\n\r\n<p>When you chose any subscription or paid service, we or our payment gateway provider may collect your purchase, address or billing information, including your credit card number and expiration date etc. However when you order using an in-app purchase option, same are handled by such platform providers. The subscriptions or paid Services may be on auto renewal mode unless cancelled. If at any point you do not wish to auto-renew your subscription, you may cancel your subscription before the end of the subscription term.</p>\r\n\r\n<p><strong>Voluntary information:</strong></p>\r\n\r\n<p>We may collect additional information at other times, including but not limited to, when you provide feedback, change your content or email preferences, respond to a survey, or communicate with us.</p>\r\n\r\n<p>B. INFORMATION AUTOMATICALLY COLLECTED/ TRACKED WHILE NAVIGATION</p>\r\n\r\n<p><strong>Cookies</strong></p>\r\n\r\n<p>To improve the responsiveness of the &quot;Application&quot; for our users, we may use &quot;cookies&quot;, or similar electronic tools to collect information to assign each visitor a unique, random number as a User Identification (User ID) to understand the user&#39;s individual interests using the identified computer. Unless you voluntarily identify yourself (through registration, for example), we will have no way of knowing who you are, even if we assign a cookie to your computer. The only personal information a cookie can contain is information you supply. A cookie cannot read data off your hard drive. Our advertisers may also assign their own cookies to your browser (if you click on their ads), a process that we do not control. We receive and store certain types of information whenever you interact with us via website, Application or Service though your computer/laptop/netbook or mobile/tablet/pad/handheld device etc.</p>\r\n\r\n<p><strong>Opting out</strong></p>\r\n\r\n<p>If a user opts out using the&nbsp;<a href=\"http://www.google.com/ads/preferences\" rel=\"nofollow\" target=\"_blank\">Ads Settings</a>, the unique DoubleClick cookie ID on the user&#39;s browser is overwritten with the phrase &quot;OPT_OUT&quot;. Because there is no longer a unique cookie ID, the opt-out cookie can&#39;t be associated with a particular browser.</p>\r\n\r\n<p><strong>Log File Information</strong></p>\r\n\r\n<p>We automatically collect limited information about your computer&#39;s connection to the Internet, mobile number, including your IP address, when you visit our site, application or service. Your IP address is a number that lets computers attached to the Internet know where to send you data -- such as the pages you view. We automatically receive and log information from your browser, including your IP address, your computer&#39;s name, your operating system, browser type and version, CPU speed, and connection speed. We may also collect log information from your device, including your location, IP address, your device&#39;s name, device&#39;s serial number or unique identification number (e.g.. UDiD on your iOS device), your device operating system, browser type and version, CPU speed, and connection speed etc.</p>\r\n\r\n<p><strong>Clear GIFs</strong></p>\r\n\r\n<p>We may use &quot;clear GIFs&quot; (Web Beacons) to track the online usage patterns of our users in a anonymous manner, without personally identifying the user. We may also use clear GIFs in HTML-based emails sent to our users to track which emails are opened by recipients. We use this information to inter-alia deliver our web pages to you upon request, to tailor our Site, Application or Service to the interests of our users, to measure traffic within our Application to improve the Application quality, functionality and interactivity and let advertisers know the geographic locations from where our visitors come.</p>\r\n\r\n<p><strong>Information from other Sources:</strong></p>\r\n\r\n<p>We may receive information about you from other sources, add it to our account information and treat it in accordance with this policy. If you provide information to the platform provider or other partner, whom we provide services, your account information and order information may be passed on to us. We may obtain updated contact information from third parties in order to correct our records and fulfil the Services or to communicate with you</p>\r\n\r\n<p><strong>Demographic and purchase information:</strong></p>\r\n\r\n<p>We may reference other sources of demographic and other information in order to provide you with more targeted communications and promotions. We use Google Analytics, among others, to track the user behaviour on our website. Google Analytics specifically has been enable to support display advertising towards helping us gain understanding of our users&#39; Demographics and Interests. The reports are anonymous and cannot be associated with any individual personally identifiable information that you may have shared with us. You can opt-out of Google Analytics for Display Advertising and customize Google Display Network ads using the Ads Settings options provided by Google.</p>\r\n\r\n<p><strong>2. LINKS TO THIRD PARTY SITES / AD-SERVERS</strong></p>\r\n\r\n<p>The Application may include links to other websites or applications. Such websites or applications are governed by their respective privacy policies, which are beyond our control. Once you leave our servers (you can tell where you are by checking the URL in the location bar on your browser), use of any information you provide is governed by the privacy policy of the operator of the application, you are visiting. That policy may differ from ours. If you can&#39;t find the privacy policy of any of these sites via a link from the application&#39;s homepage, you should contact the application owners directly for more information.</p>\r\n\r\n<p>When we present information to our advertisers -- to help them understand our audience and confirm the value of advertising on our websites or Applications -- it is usually in the form of aggregated statistics on traffic to various pages / content within our websites or Applications. We use third-party advertising companies to serve ads when you visit our websites or Applications. These companies may use information (not including your name, address, email address or telephone number or other personally identifiable information) about your visits to this and other websites or application, in order to provide advertisements about goods and services of interest to you.</p>\r\n\r\n<p>We do not provide any personally identifiable information to third party websites / advertisers / ad-servers without your consent.</p>\r\n\r\n<p><strong>3. INFORMATION USE BY THE COMPANY</strong></p>\r\n\r\n<p>The Information as supplied by the users enables us to improve the Services and provide you the most user-friendly experience. In some cases/provision of certain service(s) or utility(ies), we may require your contact address as well. All required information is service dependent and the Company may use the above said user Information to, maintain, protect, and improve the Services (including advertising on the &quot;Application&quot;) and for developing new services. We may also use your email address or other personally identifiable information to send commercial or marketing messages without your consent [with an option to subscribe / unsubscribe (where feasible)]. We may, however, use your email address without further consent for non-marketing or administrative purposes (such as notifying you of major changes, for customer service purposes, billing, etc.).</p>\r\n\r\n<p>Any personally identifiable information provided by you will not be considered as sensitive if it is freely available and / or accessible in the public domain like any comments, messages, blogs, scribbles available on social platforms like facebook, twitter etc.</p>\r\n\r\n<p>Any posted/uploaded/conveyed/communicated by users on the public sections of the &quot;Application&quot; becomes published content and is not considered personally identifiable information subject to this Privacy Policy.</p>\r\n\r\n<p>In case you choose to decline to submit personally identifiable information on the Application, we may not be able to provide certain services on the Application to you. We will make reasonable efforts to notify you of the same at the time of opening your account. In any case, we will not be liable and or responsible for the denial of certain services to you for lack of you providing the necessary personal information.</p>\r\n\r\n<p>When you register with the Application or Services, we contact you from time to time about updation of your personal information to provide the users such features that we believe may benefit / interest you.</p>\r\n\r\n<p><strong>4. INFORMATION SHARING</strong></p>\r\n\r\n<p>The Company shares your information with any third party without obtaining the prior consent of the User in the following limited circumstances:</p>\r\n\r\n<p>a) When it is requested or required by law or by any court or governmental agency or authority to disclose, for the purpose of verification of identity, or for the prevention, detection, investigation including cyber incidents, or for prosecution and punishment of offences. These disclosures are made in good faith and belief that such disclosure is reasonably necessary for enforcing these Terms or for complying with the applicable laws and regulations.</p>\r\n\r\n<p>b) The Company proposes to share such information within its group companies and officers and employees of such group companies for the purpose of processing personal information on its behalf. We also ensure that these recipients of such information agree to process such information based on our instructions and in compliance with this Privacy Policy and any other appropriate confidentiality and security measures.</p>\r\n\r\n<p>c) The Company may present information to our advertisers - to help them understand our audience and confirm the value of advertising on our websites or Applications &ndash; however it is usually in the form of aggregated statistics on traffic to various pages within our site.</p>\r\n\r\n<p>d) The Company may share your information regarding your activities on websites or Applications with third party social websites to populate your social wall that is visible to other people however you will have an option to set your privacy settings, where you can decide what you would like to share or not to share with others.</p>\r\n\r\n<p><strong>5. ACCESSING AND UPDATING PERSONAL INFORMATION</strong></p>\r\n\r\n<p>When you use the Services Site (or any of its sub sites), we make good faith efforts to provide you, as and when requested by you, with access to your personal information and shall further ensure that any personal information or sensitive personal data or information found to be inaccurate or deficient shall be corrected or amended as feasible, subject to any requirement for such personal information or sensitive personal data or information to be retained by law or for legitimate business purposes. We ask individual users to identify themselves and the information requested to be accessed, corrected or removed before processing such requests, and we may decline to process requests that are unreasonably repetitive or systematic, require disproportionate technical effort, jeopardize the privacy of others, or would be extremely impractical (for instance, requests concerning information residing on backup tapes), or for which access is not otherwise required. In any case, where we provide information access and correction, we perform this service free of charge, except if doing so would require a disproportionate effort. Because of the way we maintain certain services, after you delete your information, residual copies may take a period of time before they are deleted from our active servers and may remain in our backup systems.</p>\r\n\r\n<p><strong>6. INFORMATION SECURITY</strong></p>\r\n\r\n<p>We take appropriate security measures to protect against unauthorized access to or unauthorized alteration, disclosure or destruction of data. These include internal reviews of our data collection, storage and processing practices and security measures, including appropriate encryption and physical security measures to guard against unauthorized access to systems where we store personal data. All information gathered on TIL is securely stored within the Company controlled database. The database is stored on servers secured behind a firewall; access to the servers is password-protected and is strictly limited. However, as effective as our security measures are, no security system is impenetrable. We cannot guarantee the security of our database, nor can we guarantee that information you supply will not be intercepted while being transmitted to us over the Internet. And, of course, any information you include in a posting to the discussion areas is available to anyone with Internet access.</p>\r\n\r\n<p>We use third-party advertising companies to serve ads when you visit or use our website, mobile application or services. These companies may use information (not including your name, address, email address or telephone number) about your visits or use to particular website, mobile application or services, in order to provide advertisements about goods and services of interest to you.</p>\r\n\r\n<p><strong>7. UPDATES / CHANGES</strong></p>\r\n\r\n<p>The internet is an ever evolving medium. We may alter our privacy policy from time to time to incorporate necessary changes in technology, applicable law or any other variant. In any case, we reserve the right to change (at any point of time) the terms of this Privacy Policy or the Terms of Use. Any changes we make will be effective immediately on notice, which we may give by posting the new policy on the &quot;Application&quot;. Your use of the Application or Services after such notice will be deemed acceptance of such changes. We may also make reasonable efforts to inform you via electronic mail. In any case, you are advised to review this Privacy Policy periodically on the &quot;Application&quot;) to ensure that you are aware of the latest version.</p>\r\n\r\n<p><strong>8. QUESTIONS / GRIEVANCE REDRESSAL</strong></p>\r\n\r\n<p>Redressal Mechanism: Any complaints, abuse or concerns with regards to the processing of information provided by you or breach of these terms shall be immediately informed to the designated Grievance Officer as mentioned below via in writing or through email signed with the electronic signature to grievance.it@timesinternet.in or Mr. Kabeer Sharma (&quot;Grievance Officer&quot;)</p>\r\n\r\n<p>Mr. Kabeer Sharma</p>\r\n\r\n<p>Grievance Officer (Indiatimes.com)</p>\r\n\r\n<p>Times Internet Limited</p>\r\n\r\n<p>Plot No. 391, Udyog Vihar, Phase - III,</p>\r\n\r\n<p>Gurgaon, Haryana 122016, India</p>\r\n\r\n<p>Ph:&nbsp;0124-4518550</p>\r\n\r\n<p>We request you to please provide the following information in your complaint:-</p>\r\n\r\n<p>a) Identification of the information provided by you;</p>\r\n\r\n<p>b) Clear statement as to whether the information is personal information or sensitive personal information;</p>\r\n\r\n<p>c) Your address, telephone number or e-mail address;</p>\r\n\r\n<p>d) A statement that you have a good-faith belief that the information has been processed incorrectly or disclosed without authorization, as the case may be;</p>\r\n\r\n<p>e) A statement, under penalty of perjury, that the information in the notice is accurate, and that the information being complained about belongs to you;</p>\r\n\r\n<p>f) You may also contact us in case you have any questions / suggestions about the Privacy Policy using the contact information mentioned above.</p>\r\n\r\n<p>The company shall not be responsible for any communication, if addressed, to any non-designated person in this regard.</p>\r\n', NULL, 1, NULL, NULL, NULL, NULL, 'footer', 1, '2017-11-22 20:52:21'),
(14, 'FAQ', 'faq', 'FAQ', 'faq', 1, NULL, NULL, 1, NULL, NULL, NULL, NULL, 'footer', 1, '2021-07-13 06:32:37'),
(15, 'Company', 'company', '', '', 1, '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim</p>\r\n', NULL, 1, NULL, NULL, NULL, NULL, 'footer', 1, '2021-07-13 08:04:53'),
(16, 'Public', 'public', '', '', 1, '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim</p>\r\n', NULL, 1, NULL, NULL, NULL, NULL, 'main', 1, '2021-07-13 08:05:52'),
(17, 'Screens', 'screens', '', '', 1, '<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled</p>\r\n', NULL, 1, NULL, NULL, NULL, NULL, 'main', 1, '2021-07-13 08:08:34'),
(18, 'Benefits', 'benefits', '', '', 1, '', NULL, 1, NULL, NULL, NULL, NULL, 'main', 1, '2021-07-13 08:08:55'),
(19, 'Team', 'team', '', '', 1, '', NULL, 1, NULL, NULL, NULL, NULL, 'main', 1, '2021-07-13 08:09:16'),
(20, 'Prices', 'prices', '', '', 1, '', NULL, 1, NULL, NULL, NULL, NULL, 'main', 1, '2021-07-13 08:09:34'),
(21, 'About', 'about', '', '', 1, '<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled</p>\r\n', NULL, 1, NULL, NULL, NULL, NULL, 'main', 1, '2021-07-13 08:09:51'),
(22, 'Digital', 'digital', '', '', 1, '', NULL, 1, NULL, NULL, NULL, NULL, 'main', 1, '2021-07-13 08:10:10'),
(23, 'Ring', 'ring', '', '', 1, '', NULL, 1, NULL, NULL, NULL, NULL, 'main', 1, '2021-07-13 08:10:24');

-- --------------------------------------------------------

--
-- Table structure for table `permission`
--

CREATE TABLE `permission` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL DEFAULT '0',
  `parent` int(11) NOT NULL DEFAULT '0',
  `mata_key` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `meta_value` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status` int(11) NOT NULL DEFAULT '0',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `permission`
--

INSERT INTO `permission` (`id`, `user_id`, `parent`, `mata_key`, `meta_value`, `status`, `created_at`) VALUES
(1, 59, 1, 'support_tickets_show', '0', 0, '2021-07-09 15:12:50'),
(2, 54, 1, 'support_tickets_show', '0', 0, '2021-07-09 15:12:50'),
(3, 59, 1, 'book_deals_show', '0', 0, '2021-07-09 15:12:50'),
(4, 54, 1, 'book_deals_show', '0', 0, '2021-07-09 15:12:50'),
(5, 59, 1, 'agreements_show', '0', 0, '2021-07-09 15:12:50'),
(6, 54, 1, 'agreements_show', '0', 0, '2021-07-09 15:12:50'),
(7, 59, 1, 'permission_show', '1', 0, '2021-07-09 15:12:50'),
(8, 54, 1, 'permission_show', '1', 0, '2021-07-09 15:12:50'),
(9, 59, 1, 'sms_report_show', '1', 0, '2021-07-09 15:12:50'),
(10, 54, 1, 'sms_report_show', '1', 0, '2021-07-09 15:12:50'),
(11, 59, 1, 'finance_show', '1', 0, '2021-07-09 15:12:50'),
(12, 54, 1, 'finance_show', '1', 0, '2021-07-09 15:12:50'),
(13, 59, 1, 'file_history_show', '1', 0, '2021-07-09 15:12:50'),
(14, 54, 1, 'file_history_show', '1', 0, '2021-07-09 15:12:50'),
(15, 59, 1, 'customer_show', '1', 0, '2021-07-09 15:12:50'),
(16, 54, 1, 'customer_show', '1', 0, '2021-07-09 15:12:50'),
(17, 59, 1, 'customer_create', '1', 0, '2021-07-09 15:12:50'),
(18, 54, 1, 'customer_create', '1', 0, '2021-07-09 15:12:50'),
(19, 59, 1, 'customer_password', '0', 0, '2021-07-09 15:12:50'),
(20, 54, 1, 'customer_password', '0', 0, '2021-07-09 15:12:50'),
(21, 59, 1, 'customer_view', '1', 0, '2021-07-09 15:12:50'),
(22, 54, 1, 'customer_view', '1', 0, '2021-07-09 15:12:50'),
(23, 59, 1, 'customer_edit', '1', 0, '2021-07-09 15:12:50'),
(24, 54, 1, 'customer_edit', '1', 0, '2021-07-09 15:12:50'),
(25, 59, 1, 'customer_delete', '1', 0, '2021-07-09 15:12:50'),
(26, 54, 1, 'customer_delete', '1', 0, '2021-07-09 15:12:50'),
(27, 59, 1, 'customer_role', '1', 0, '2021-07-09 15:12:50'),
(28, 54, 1, 'customer_role', '1', 0, '2021-07-09 15:12:50'),
(29, 59, 1, 'customer_ban', '1', 0, '2021-07-09 15:12:50'),
(30, 54, 1, 'customer_ban', '1', 0, '2021-07-09 15:12:50'),
(31, 59, 1, 'worker_show', '1', 0, '2021-07-09 15:12:50'),
(32, 54, 1, 'worker_show', '1', 0, '2021-07-09 15:12:50'),
(33, 59, 1, 'worker_create', '1', 0, '2021-07-09 15:12:50'),
(34, 54, 1, 'worker_create', '1', 0, '2021-07-09 15:12:50'),
(35, 59, 1, 'worker_delete', '1', 0, '2021-07-09 15:12:50'),
(36, 54, 1, 'worker_delete', '1', 0, '2021-07-09 15:12:50'),
(37, 59, 1, 'worker_password', '0', 0, '2021-07-09 15:12:50'),
(38, 54, 1, 'worker_password', '0', 0, '2021-07-09 15:12:50'),
(39, 59, 1, 'worker_view', '1', 0, '2021-07-09 15:12:50'),
(40, 54, 1, 'worker_view', '1', 0, '2021-07-09 15:12:50'),
(41, 59, 1, 'worker_edit', '1', 0, '2021-07-09 15:12:50'),
(42, 54, 1, 'worker_edit', '1', 0, '2021-07-09 15:12:50'),
(43, 59, 1, 'worker_role', '1', 0, '2021-07-09 15:12:50'),
(44, 54, 1, 'worker_role', '1', 0, '2021-07-09 15:12:50'),
(45, 59, 1, 'worker_ban', '1', 0, '2021-07-09 15:12:50'),
(46, 54, 1, 'worker_ban', '1', 0, '2021-07-09 15:12:50'),
(47, 59, 1, 'contractor_show', '1', 0, '2021-07-09 15:12:50'),
(48, 54, 1, 'contractor_show', '1', 0, '2021-07-09 15:12:50'),
(49, 59, 1, 'contractor_create', '1', 0, '2021-07-09 15:12:50'),
(50, 54, 1, 'contractor_create', '1', 0, '2021-07-09 15:12:50'),
(51, 59, 1, 'contractor_password', '0', 0, '2021-07-09 15:12:50'),
(52, 54, 1, 'contractor_password', '0', 0, '2021-07-09 15:12:50'),
(53, 59, 1, 'contractor_delete', '1', 0, '2021-07-09 15:12:50'),
(54, 54, 1, 'contractor_delete', '1', 0, '2021-07-09 15:12:50'),
(55, 59, 1, 'contractor_role', '1', 0, '2021-07-09 15:12:50'),
(56, 54, 1, 'contractor_role', '1', 0, '2021-07-09 15:12:50'),
(57, 59, 1, 'contractor_view', '1', 0, '2021-07-09 15:12:50'),
(58, 54, 1, 'contractor_view', '1', 0, '2021-07-09 15:12:50'),
(59, 59, 1, 'contractor_edit', '1', 0, '2021-07-09 15:12:50'),
(60, 54, 1, 'contractor_edit', '1', 0, '2021-07-09 15:12:50'),
(61, 59, 1, 'contractor_ban', '1', 0, '2021-07-09 15:12:50'),
(62, 54, 1, 'contractor_ban', '1', 0, '2021-07-09 15:12:50'),
(63, 59, 1, 'invoice_show', '1', 0, '2021-07-09 15:12:50'),
(64, 54, 1, 'invoice_show', '1', 0, '2021-07-09 15:12:50'),
(65, 59, 1, 'invoice_create', '1', 0, '2021-07-09 15:12:50'),
(66, 54, 1, 'invoice_create', '1', 0, '2021-07-09 15:12:50'),
(67, 59, 1, 'invoice_delete', '1', 0, '2021-07-09 15:12:50'),
(68, 54, 1, 'invoice_delete', '1', 0, '2021-07-09 15:12:50'),
(69, 59, 1, 'invoice_send_mail', '1', 0, '2021-07-09 15:12:50'),
(70, 54, 1, 'invoice_send_mail', '1', 0, '2021-07-09 15:12:50'),
(71, 59, 1, 'invoice_view', '1', 0, '2021-07-09 15:12:50'),
(72, 54, 1, 'invoice_view', '1', 0, '2021-07-09 15:12:50'),
(73, 59, 1, 'property_show', '0', 0, '2021-07-09 15:12:50'),
(74, 54, 1, 'property_show', '0', 0, '2021-07-09 15:12:50'),
(75, 59, 1, 'property_create', '0', 0, '2021-07-09 15:12:50'),
(76, 54, 1, 'property_create', '0', 0, '2021-07-09 15:12:50'),
(77, 59, 1, 'property_delete', '0', 0, '2021-07-09 15:12:50'),
(78, 54, 1, 'property_delete', '0', 0, '2021-07-09 15:12:50'),
(79, 59, 1, 'property_view', '0', 0, '2021-07-09 15:12:50'),
(80, 54, 1, 'property_view', '0', 0, '2021-07-09 15:12:50'),
(81, 59, 1, 'property_edit', '0', 0, '2021-07-09 15:12:50'),
(82, 54, 1, 'property_edit', '0', 0, '2021-07-09 15:12:50'),
(83, 63, 1, 'stamping_property_owner_show', '0', 0, '2021-07-12 08:08:49'),
(84, 63, 1, 'stamping_show', '0', 0, '2021-07-12 08:08:49'),
(85, 63, 1, 'collaborators_show', '0', 0, '2021-07-12 08:08:49'),
(86, 63, 1, 'membership_show', '0', 0, '2021-07-12 08:08:49'),
(87, 63, 1, 'support_tickets_show', '0', 0, '2021-07-12 08:08:49'),
(88, 63, 1, 'book_deals_show', '0', 0, '2021-07-12 08:08:49'),
(89, 63, 1, 'agreements_show', '0', 0, '2021-07-12 08:08:49'),
(90, 63, 1, 'permission_show', '0', 0, '2021-07-12 08:08:49'),
(91, 63, 1, 'sms_report_show', '0', 0, '2021-07-12 08:08:49'),
(92, 63, 1, 'finance_show', '0', 0, '2021-07-12 08:08:49'),
(93, 63, 1, 'file_history_show', '0', 0, '2021-07-12 08:08:49'),
(94, 63, 1, 'customer_show', '0', 0, '2021-07-12 08:08:49'),
(95, 63, 1, 'customer_create', '0', 0, '2021-07-12 08:08:49'),
(96, 63, 1, 'customer_password', '0', 0, '2021-07-12 08:08:49'),
(97, 63, 1, 'customer_view', '0', 0, '2021-07-12 08:08:49'),
(98, 63, 1, 'customer_edit', '0', 0, '2021-07-12 08:08:49'),
(99, 63, 1, 'customer_delete', '0', 0, '2021-07-12 08:08:49'),
(100, 63, 1, 'customer_role', '0', 0, '2021-07-12 08:08:49'),
(101, 63, 1, 'customer_ban', '0', 0, '2021-07-12 08:08:49'),
(102, 63, 1, 'worker_show', '1', 0, '2021-07-12 08:08:49'),
(103, 63, 1, 'worker_create', '1', 0, '2021-07-12 08:08:49'),
(104, 63, 1, 'worker_delete', '1', 0, '2021-07-12 08:08:49'),
(105, 63, 1, 'worker_password', '1', 0, '2021-07-12 08:08:49'),
(106, 63, 1, 'worker_view', '1', 0, '2021-07-12 08:08:49'),
(107, 63, 1, 'worker_edit', '1', 0, '2021-07-12 08:08:49'),
(108, 63, 1, 'worker_role', '1', 0, '2021-07-12 08:08:49'),
(109, 63, 1, 'worker_ban', '1', 0, '2021-07-12 08:08:49'),
(110, 63, 1, 'contractor_show', '0', 0, '2021-07-12 08:08:49'),
(111, 63, 1, 'contractor_create', '0', 0, '2021-07-12 08:08:49'),
(112, 63, 1, 'contractor_password', '0', 0, '2021-07-12 08:08:49'),
(113, 63, 1, 'contractor_delete', '0', 0, '2021-07-12 08:08:49'),
(114, 63, 1, 'contractor_role', '0', 0, '2021-07-12 08:08:49'),
(115, 63, 1, 'contractor_view', '0', 0, '2021-07-12 08:08:49'),
(116, 63, 1, 'contractor_edit', '0', 0, '2021-07-12 08:08:49'),
(117, 63, 1, 'contractor_ban', '0', 0, '2021-07-12 08:08:49'),
(118, 63, 1, 'invoice_show', '0', 0, '2021-07-12 08:08:49'),
(119, 63, 1, 'invoice_create', '0', 0, '2021-07-12 08:08:49'),
(120, 63, 1, 'invoice_delete', '0', 0, '2021-07-12 08:08:49'),
(121, 63, 1, 'invoice_send_mail', '0', 0, '2021-07-12 08:08:49'),
(122, 63, 1, 'invoice_view', '0', 0, '2021-07-12 08:08:49'),
(123, 63, 1, 'property_show', '0', 0, '2021-07-12 08:08:49'),
(124, 63, 1, 'property_create', '0', 0, '2021-07-12 08:08:49'),
(125, 63, 1, 'property_delete', '0', 0, '2021-07-12 08:08:49'),
(126, 63, 1, 'property_view', '0', 0, '2021-07-12 08:08:49'),
(127, 63, 1, 'property_edit', '0', 0, '2021-07-12 08:08:49'),
(128, 52, 1, 'stamping_property_owner_show', '0', 0, '2021-07-12 08:32:15'),
(129, 52, 1, 'stamping_show', '0', 0, '2021-07-12 08:32:15'),
(130, 52, 1, 'collaborators_show', '0', 0, '2021-07-12 08:32:15'),
(131, 52, 1, 'membership_show', '0', 0, '2021-07-12 08:32:15'),
(132, 52, 1, 'support_tickets_show', '1', 0, '2021-07-12 08:32:15'),
(133, 52, 1, 'book_deals_show', '0', 0, '2021-07-12 08:32:15'),
(134, 52, 1, 'agreements_show', '0', 0, '2021-07-12 08:32:15'),
(135, 52, 1, 'permission_show', '0', 0, '2021-07-12 08:32:15'),
(136, 52, 1, 'sms_report_show', '1', 0, '2021-07-12 08:32:15'),
(137, 52, 1, 'finance_show', '0', 0, '2021-07-12 08:32:15'),
(138, 52, 1, 'file_history_show', '1', 0, '2021-07-12 08:32:15'),
(139, 52, 1, 'customer_show', '1', 0, '2021-07-12 08:32:15'),
(140, 52, 1, 'customer_create', '1', 0, '2021-07-12 08:32:15'),
(141, 52, 1, 'customer_password', '1', 0, '2021-07-12 08:32:15'),
(142, 52, 1, 'customer_view', '1', 0, '2021-07-12 08:32:15'),
(143, 52, 1, 'customer_edit', '1', 0, '2021-07-12 08:32:15'),
(144, 52, 1, 'customer_delete', '1', 0, '2021-07-12 08:32:15'),
(145, 52, 1, 'customer_role', '1', 0, '2021-07-12 08:32:15'),
(146, 52, 1, 'customer_ban', '1', 0, '2021-07-12 08:32:15'),
(147, 52, 1, 'worker_show', '1', 0, '2021-07-12 08:32:15'),
(148, 52, 1, 'worker_create', '1', 0, '2021-07-12 08:32:15'),
(149, 52, 1, 'worker_delete', '1', 0, '2021-07-12 08:32:15'),
(150, 52, 1, 'worker_password', '0', 0, '2021-07-12 08:32:15'),
(151, 52, 1, 'worker_view', '1', 0, '2021-07-12 08:32:15'),
(152, 52, 1, 'worker_edit', '1', 0, '2021-07-12 08:32:15'),
(153, 52, 1, 'worker_role', '1', 0, '2021-07-12 08:32:15'),
(154, 52, 1, 'worker_ban', '1', 0, '2021-07-12 08:32:15'),
(155, 52, 1, 'contractor_show', '1', 0, '2021-07-12 08:32:15'),
(156, 52, 1, 'contractor_create', '1', 0, '2021-07-12 08:32:15'),
(157, 52, 1, 'contractor_password', '0', 0, '2021-07-12 08:32:15'),
(158, 52, 1, 'contractor_delete', '1', 0, '2021-07-12 08:32:15'),
(159, 52, 1, 'contractor_role', '1', 0, '2021-07-12 08:32:15'),
(160, 52, 1, 'contractor_view', '1', 0, '2021-07-12 08:32:15'),
(161, 52, 1, 'contractor_edit', '1', 0, '2021-07-12 08:32:15'),
(162, 52, 1, 'contractor_ban', '1', 0, '2021-07-12 08:32:15'),
(163, 52, 1, 'invoice_show', '1', 0, '2021-07-12 08:32:15'),
(164, 52, 1, 'invoice_create', '1', 0, '2021-07-12 08:32:15'),
(165, 52, 1, 'invoice_delete', '1', 0, '2021-07-12 08:32:15'),
(166, 52, 1, 'invoice_send_mail', '1', 0, '2021-07-12 08:32:15'),
(167, 52, 1, 'invoice_view', '1', 0, '2021-07-12 08:32:15'),
(168, 52, 1, 'property_show', '1', 0, '2021-07-12 08:32:15'),
(169, 52, 1, 'property_create', '1', 0, '2021-07-12 08:32:15'),
(170, 52, 1, 'property_delete', '1', 0, '2021-07-12 08:32:15'),
(171, 52, 1, 'property_view', '1', 0, '2021-07-12 08:32:15'),
(172, 52, 1, 'property_edit', '1', 0, '2021-07-12 08:32:15'),
(173, 64, 1, 'stamping_property_owner_show', '0', 0, '2021-07-12 09:11:52'),
(174, 64, 1, 'stamping_show', '0', 0, '2021-07-12 09:11:52'),
(175, 64, 1, 'collaborators_show', '0', 0, '2021-07-12 09:11:52'),
(176, 64, 1, 'membership_show', '1', 0, '2021-07-12 09:11:52'),
(177, 64, 1, 'support_tickets_show', '1', 0, '2021-07-12 09:11:52'),
(178, 64, 1, 'book_deals_show', '0', 0, '2021-07-12 09:11:52'),
(179, 64, 1, 'agreements_show', '1', 0, '2021-07-12 09:11:52'),
(180, 64, 1, 'permission_show', '1', 0, '2021-07-12 09:11:52'),
(181, 64, 1, 'sms_report_show', '1', 0, '2021-07-12 09:11:52'),
(182, 64, 1, 'finance_show', '0', 0, '2021-07-12 09:11:52'),
(183, 64, 1, 'file_history_show', '1', 0, '2021-07-12 09:11:52'),
(184, 64, 1, 'customer_show', '1', 0, '2021-07-12 09:11:52'),
(185, 64, 1, 'customer_create', '1', 0, '2021-07-12 09:11:52'),
(186, 64, 1, 'customer_password', '1', 0, '2021-07-12 09:11:52'),
(187, 64, 1, 'customer_view', '1', 0, '2021-07-12 09:11:52'),
(188, 64, 1, 'customer_edit', '1', 0, '2021-07-12 09:11:52'),
(189, 64, 1, 'customer_delete', '1', 0, '2021-07-12 09:11:52'),
(190, 64, 1, 'customer_role', '1', 0, '2021-07-12 09:11:52'),
(191, 64, 1, 'customer_ban', '1', 0, '2021-07-12 09:11:52'),
(192, 64, 1, 'worker_show', '1', 0, '2021-07-12 09:11:52'),
(193, 64, 1, 'worker_create', '1', 0, '2021-07-12 09:11:52'),
(194, 64, 1, 'worker_delete', '1', 0, '2021-07-12 09:11:52'),
(195, 64, 1, 'worker_password', '1', 0, '2021-07-12 09:11:52'),
(196, 64, 1, 'worker_view', '1', 0, '2021-07-12 09:11:52'),
(197, 64, 1, 'worker_edit', '1', 0, '2021-07-12 09:11:52'),
(198, 64, 1, 'worker_role', '1', 0, '2021-07-12 09:11:52'),
(199, 64, 1, 'worker_ban', '1', 0, '2021-07-12 09:11:52'),
(200, 64, 1, 'contractor_show', '1', 0, '2021-07-12 09:11:52'),
(201, 64, 1, 'contractor_create', '1', 0, '2021-07-12 09:11:52'),
(202, 64, 1, 'contractor_password', '1', 0, '2021-07-12 09:11:52'),
(203, 64, 1, 'contractor_delete', '1', 0, '2021-07-12 09:11:52'),
(204, 64, 1, 'contractor_role', '1', 0, '2021-07-12 09:11:52'),
(205, 64, 1, 'contractor_view', '1', 0, '2021-07-12 09:11:52'),
(206, 64, 1, 'contractor_edit', '1', 0, '2021-07-12 09:11:52'),
(207, 64, 1, 'contractor_ban', '1', 0, '2021-07-12 09:11:52'),
(208, 64, 1, 'invoice_show', '1', 0, '2021-07-12 09:11:52'),
(209, 64, 1, 'invoice_create', '1', 0, '2021-07-12 09:11:52'),
(210, 64, 1, 'invoice_delete', '1', 0, '2021-07-12 09:11:52'),
(211, 64, 1, 'invoice_send_mail', '1', 0, '2021-07-12 09:11:52'),
(212, 64, 1, 'invoice_view', '1', 0, '2021-07-12 09:11:52'),
(213, 64, 1, 'property_show', '1', 0, '2021-07-12 09:11:52'),
(214, 64, 1, 'property_create', '1', 0, '2021-07-12 09:11:52'),
(215, 64, 1, 'property_delete', '1', 0, '2021-07-12 09:11:52'),
(216, 64, 1, 'property_view', '1', 0, '2021-07-12 09:11:52'),
(217, 64, 1, 'property_edit', '1', 0, '2021-07-12 09:11:52'),
(218, 65, 1, 'stamping_property_owner_show', '0', 0, '2021-07-12 09:19:27'),
(219, 65, 1, 'stamping_show', '0', 0, '2021-07-12 09:19:27'),
(220, 65, 1, 'collaborators_show', '0', 0, '2021-07-12 09:19:27'),
(221, 65, 1, 'membership_show', '1', 0, '2021-07-12 09:19:27'),
(222, 65, 1, 'support_tickets_show', '1', 0, '2021-07-12 09:19:27'),
(223, 65, 1, 'book_deals_show', '0', 0, '2021-07-12 09:19:27'),
(224, 65, 1, 'agreements_show', '1', 0, '2021-07-12 09:19:27'),
(225, 65, 1, 'permission_show', '0', 0, '2021-07-12 09:19:27'),
(226, 65, 1, 'sms_report_show', '1', 0, '2021-07-12 09:19:27'),
(227, 65, 1, 'finance_show', '1', 0, '2021-07-12 09:19:27'),
(228, 65, 1, 'file_history_show', '1', 0, '2021-07-12 09:19:27'),
(229, 65, 1, 'customer_show', '1', 0, '2021-07-12 09:19:27'),
(230, 65, 1, 'customer_create', '1', 0, '2021-07-12 09:19:27'),
(231, 65, 1, 'customer_password', '1', 0, '2021-07-12 09:19:27'),
(232, 65, 1, 'customer_view', '1', 0, '2021-07-12 09:19:27'),
(233, 65, 1, 'customer_edit', '1', 0, '2021-07-12 09:19:27'),
(234, 65, 1, 'customer_delete', '1', 0, '2021-07-12 09:19:27'),
(235, 65, 1, 'customer_role', '1', 0, '2021-07-12 09:19:27'),
(236, 65, 1, 'customer_ban', '1', 0, '2021-07-12 09:19:27'),
(237, 65, 1, 'worker_show', '1', 0, '2021-07-12 09:19:27'),
(238, 65, 1, 'worker_create', '1', 0, '2021-07-12 09:19:27'),
(239, 65, 1, 'worker_delete', '1', 0, '2021-07-12 09:19:27'),
(240, 65, 1, 'worker_password', '1', 0, '2021-07-12 09:19:27'),
(241, 65, 1, 'worker_view', '1', 0, '2021-07-12 09:19:27'),
(242, 65, 1, 'worker_edit', '1', 0, '2021-07-12 09:19:27'),
(243, 65, 1, 'worker_role', '1', 0, '2021-07-12 09:19:27'),
(244, 65, 1, 'worker_ban', '1', 0, '2021-07-12 09:19:27'),
(245, 65, 1, 'contractor_show', '1', 0, '2021-07-12 09:19:27'),
(246, 65, 1, 'contractor_create', '1', 0, '2021-07-12 09:19:27'),
(247, 65, 1, 'contractor_password', '1', 0, '2021-07-12 09:19:27'),
(248, 65, 1, 'contractor_delete', '1', 0, '2021-07-12 09:19:27'),
(249, 65, 1, 'contractor_role', '1', 0, '2021-07-12 09:19:27'),
(250, 65, 1, 'contractor_view', '1', 0, '2021-07-12 09:19:27'),
(251, 65, 1, 'contractor_edit', '1', 0, '2021-07-12 09:19:27'),
(252, 65, 1, 'contractor_ban', '1', 0, '2021-07-12 09:19:27'),
(253, 65, 1, 'invoice_show', '1', 0, '2021-07-12 09:19:27'),
(254, 65, 1, 'invoice_create', '1', 0, '2021-07-12 09:19:27'),
(255, 65, 1, 'invoice_delete', '1', 0, '2021-07-12 09:19:27'),
(256, 65, 1, 'invoice_send_mail', '1', 0, '2021-07-12 09:19:27'),
(257, 65, 1, 'invoice_view', '1', 0, '2021-07-12 09:19:27'),
(258, 65, 1, 'property_show', '1', 0, '2021-07-12 09:19:27'),
(259, 65, 1, 'property_create', '1', 0, '2021-07-12 09:19:27'),
(260, 65, 1, 'property_delete', '1', 0, '2021-07-12 09:19:27'),
(261, 65, 1, 'property_view', '1', 0, '2021-07-12 09:19:27'),
(262, 65, 1, 'property_edit', '1', 0, '2021-07-12 09:19:27'),
(312, 62, 1, 'permission_show', '0', 0, '2021-07-13 12:41:27'),
(313, 62, 1, 'permission_add', '0', 0, '2021-07-13 12:41:27'),
(314, 62, 1, 'permission_delete', '0', 0, '2021-07-13 12:41:27'),
(315, 62, 1, 'permission_view', '0', 0, '2021-07-13 12:41:27'),
(316, 62, 1, 'permission_edit', '0', 0, '2021-07-13 12:41:27'),
(317, 62, 1, 'stamping_property_owner_show', '1', 0, '2021-07-13 12:41:27'),
(318, 62, 1, 'stamping_show', '1', 0, '2021-07-13 12:41:27'),
(319, 62, 1, 'collaborators_show', '0', 0, '2021-07-13 12:41:27'),
(320, 62, 1, 'membership_show', '1', 0, '2021-07-13 12:41:27'),
(321, 62, 1, 'support_tickets_show', '0', 0, '2021-07-13 12:41:27'),
(322, 62, 1, 'book_deals_show', '1', 0, '2021-07-13 12:41:27'),
(323, 62, 1, 'agreements_show', '1', 0, '2021-07-13 12:41:27'),
(324, 62, 1, 'sms_report_show', '0', 0, '2021-07-13 12:41:27'),
(325, 62, 1, 'finance_show', '0', 0, '2021-07-13 12:41:27'),
(326, 62, 1, 'file_history_show', '1', 0, '2021-07-13 12:41:27'),
(327, 62, 1, 'customer_show', '1', 0, '2021-07-13 12:41:27'),
(328, 62, 1, 'customer_create', '0', 0, '2021-07-13 12:41:27'),
(329, 62, 1, 'customer_password', '0', 0, '2021-07-13 12:41:27'),
(330, 62, 1, 'customer_view', '0', 0, '2021-07-13 12:41:27'),
(331, 62, 1, 'customer_edit', '0', 0, '2021-07-13 12:41:27'),
(332, 62, 1, 'customer_delete', '0', 0, '2021-07-13 12:41:27'),
(333, 62, 1, 'customer_role', '0', 0, '2021-07-13 12:41:27'),
(334, 62, 1, 'customer_ban', '0', 0, '2021-07-13 12:41:27'),
(335, 62, 1, 'worker_show', '1', 0, '2021-07-13 12:41:27'),
(336, 62, 1, 'worker_create', '0', 0, '2021-07-13 12:41:27'),
(337, 62, 1, 'worker_delete', '0', 0, '2021-07-13 12:41:27'),
(338, 62, 1, 'worker_password', '0', 0, '2021-07-13 12:41:27'),
(339, 62, 1, 'worker_view', '0', 0, '2021-07-13 12:41:27'),
(340, 62, 1, 'worker_edit', '0', 0, '2021-07-13 12:41:27'),
(341, 62, 1, 'worker_role', '0', 0, '2021-07-13 12:41:27'),
(342, 62, 1, 'worker_ban', '0', 0, '2021-07-13 12:41:27'),
(343, 62, 1, 'contractor_show', '0', 0, '2021-07-13 12:41:27'),
(344, 62, 1, 'contractor_create', '0', 0, '2021-07-13 12:41:27'),
(345, 62, 1, 'contractor_password', '0', 0, '2021-07-13 12:41:27'),
(346, 62, 1, 'contractor_delete', '0', 0, '2021-07-13 12:41:27'),
(347, 62, 1, 'contractor_role', '0', 0, '2021-07-13 12:41:27'),
(348, 62, 1, 'contractor_view', '0', 0, '2021-07-13 12:41:27'),
(349, 62, 1, 'contractor_edit', '0', 0, '2021-07-13 12:41:27'),
(350, 62, 1, 'contractor_ban', '0', 0, '2021-07-13 12:41:27'),
(351, 62, 1, 'invoice_show', '1', 0, '2021-07-13 12:41:27'),
(352, 62, 1, 'invoice_create', '0', 0, '2021-07-13 12:41:27'),
(353, 62, 1, 'invoice_delete', '0', 0, '2021-07-13 12:41:27'),
(354, 62, 1, 'invoice_send_mail', '0', 0, '2021-07-13 12:41:27'),
(355, 62, 1, 'invoice_view', '0', 0, '2021-07-13 12:41:27'),
(356, 62, 1, 'property_show', '1', 0, '2021-07-13 12:41:27'),
(357, 62, 1, 'property_create', '1', 0, '2021-07-13 12:41:27'),
(358, 62, 1, 'property_delete', '1', 0, '2021-07-13 12:41:27'),
(359, 62, 1, 'property_view', '1', 0, '2021-07-13 12:41:27'),
(360, 62, 1, 'property_edit', '1', 0, '2021-07-13 12:41:27'),
(361, 62, 1, 'revenue_overview_show', '0', 0, '2021-07-13 14:28:07'),
(362, 62, 1, 'project_show', '1', 0, '2021-07-13 14:28:07'),
(363, 62, 1, 'client_show', '1', 0, '2021-07-13 14:28:07'),
(364, 62, 1, 'calendar_management_show', '0', 0, '2021-07-13 14:28:07'),
(365, 69, 1, 'revenue_overview_show', '0', 0, '2021-07-14 08:41:14'),
(366, 69, 1, 'project_show', '1', 0, '2021-07-14 08:41:14'),
(367, 69, 1, 'client_show', '1', 0, '2021-07-14 08:41:14'),
(368, 69, 1, 'calendar_management_show', '0', 0, '2021-07-14 08:41:14'),
(369, 69, 1, 'permission_show', '0', 0, '2021-07-14 08:41:14'),
(370, 69, 1, 'permission_add', '1', 0, '2021-07-14 08:41:14'),
(371, 69, 1, 'permission_delete', '1', 0, '2021-07-14 08:41:14'),
(372, 69, 1, 'permission_view', '1', 0, '2021-07-14 08:41:14'),
(373, 69, 1, 'permission_edit', '1', 0, '2021-07-14 08:41:14'),
(374, 69, 1, 'stamping_property_owner_show', '0', 0, '2021-07-14 08:41:14'),
(375, 69, 1, 'stamping_show', '0', 0, '2021-07-14 08:41:14'),
(376, 69, 1, 'collaborators_show', '0', 0, '2021-07-14 08:41:14'),
(377, 69, 1, 'membership_show', '0', 0, '2021-07-14 08:41:14'),
(378, 69, 1, 'support_tickets_show', '0', 0, '2021-07-14 08:41:14'),
(379, 69, 1, 'book_deals_show', '0', 0, '2021-07-14 08:41:14'),
(380, 69, 1, 'agreements_show', '0', 0, '2021-07-14 08:41:14'),
(381, 69, 1, 'sms_report_show', '0', 0, '2021-07-14 08:41:14'),
(382, 69, 1, 'finance_show', '0', 0, '2021-07-14 08:41:14'),
(383, 69, 1, 'file_history_show', '0', 0, '2021-07-14 08:41:14'),
(384, 69, 1, 'customer_show', '0', 0, '2021-07-14 08:41:14'),
(385, 69, 1, 'customer_create', '0', 0, '2021-07-14 08:41:14'),
(386, 69, 1, 'customer_password', '0', 0, '2021-07-14 08:41:14'),
(387, 69, 1, 'customer_view', '0', 0, '2021-07-14 08:41:14'),
(388, 69, 1, 'customer_edit', '0', 0, '2021-07-14 08:41:14'),
(389, 69, 1, 'customer_delete', '0', 0, '2021-07-14 08:41:14'),
(390, 69, 1, 'customer_role', '0', 0, '2021-07-14 08:41:14'),
(391, 69, 1, 'customer_ban', '0', 0, '2021-07-14 08:41:14'),
(392, 69, 1, 'worker_show', '1', 0, '2021-07-14 08:41:14'),
(393, 69, 1, 'worker_create', '1', 0, '2021-07-14 08:41:14'),
(394, 69, 1, 'worker_delete', '1', 0, '2021-07-14 08:41:14'),
(395, 69, 1, 'worker_password', '1', 0, '2021-07-14 08:41:14'),
(396, 69, 1, 'worker_view', '1', 0, '2021-07-14 08:41:14'),
(397, 69, 1, 'worker_edit', '1', 0, '2021-07-14 08:41:14'),
(398, 69, 1, 'worker_role', '1', 0, '2021-07-14 08:41:14'),
(399, 69, 1, 'worker_ban', '1', 0, '2021-07-14 08:41:14'),
(400, 69, 1, 'contractor_show', '1', 0, '2021-07-14 08:41:14'),
(401, 69, 1, 'contractor_create', '0', 0, '2021-07-14 08:41:14'),
(402, 69, 1, 'contractor_password', '0', 0, '2021-07-14 08:41:14'),
(403, 69, 1, 'contractor_delete', '0', 0, '2021-07-14 08:41:14'),
(404, 69, 1, 'contractor_role', '0', 0, '2021-07-14 08:41:14'),
(405, 69, 1, 'contractor_view', '0', 0, '2021-07-14 08:41:14'),
(406, 69, 1, 'contractor_edit', '0', 0, '2021-07-14 08:41:14'),
(407, 69, 1, 'contractor_ban', '0', 0, '2021-07-14 08:41:14'),
(408, 69, 1, 'invoice_show', '0', 0, '2021-07-14 08:41:14'),
(409, 69, 1, 'invoice_create', '0', 0, '2021-07-14 08:41:14'),
(410, 69, 1, 'invoice_delete', '0', 0, '2021-07-14 08:41:14'),
(411, 69, 1, 'invoice_send_mail', '0', 0, '2021-07-14 08:41:14'),
(412, 69, 1, 'invoice_view', '0', 0, '2021-07-14 08:41:14'),
(413, 69, 1, 'property_show', '0', 0, '2021-07-14 08:41:14'),
(414, 69, 1, 'property_create', '0', 0, '2021-07-14 08:41:14'),
(415, 69, 1, 'property_delete', '0', 0, '2021-07-14 08:41:14'),
(416, 69, 1, 'property_view', '0', 0, '2021-07-14 08:41:14'),
(417, 69, 1, 'property_edit', '0', 0, '2021-07-14 08:41:14'),
(418, 72, 1, 'recent_agreements_show', '0', 0, '2021-07-15 08:34:50'),
(419, 72, 1, 'sub_admin_show', '0', 0, '2021-07-15 08:34:50'),
(420, 72, 1, 'sub_admin_create', '1', 0, '2021-07-15 08:34:50'),
(421, 72, 1, 'sub_admin_delete', '1', 0, '2021-07-15 08:34:50'),
(422, 72, 1, 'sub_admin_password', '1', 0, '2021-07-15 08:34:50'),
(423, 72, 1, 'sub_admin_view', '1', 0, '2021-07-15 08:34:50'),
(424, 72, 1, 'sub_admin_edit', '1', 0, '2021-07-15 08:34:50'),
(425, 72, 1, 'sub_admin_role', '1', 0, '2021-07-15 08:34:50'),
(426, 72, 1, 'sub_admin_ban', '1', 0, '2021-07-15 08:34:50'),
(427, 72, 1, 'client_show', '0', 0, '2021-07-15 08:34:50'),
(428, 72, 1, 'client_create', '1', 0, '2021-07-15 08:34:50'),
(429, 72, 1, 'client_delete', '1', 0, '2021-07-15 08:34:50'),
(430, 72, 1, 'client_password', '1', 0, '2021-07-15 08:34:50'),
(431, 72, 1, 'client_view', '1', 0, '2021-07-15 08:34:50'),
(432, 72, 1, 'client_edit', '1', 0, '2021-07-15 08:34:50'),
(433, 72, 1, 'client_role', '1', 0, '2021-07-15 08:34:50'),
(434, 72, 1, 'client_ban', '1', 0, '2021-07-15 08:34:50'),
(435, 72, 1, 'revenue_overview_show', '1', 0, '2021-07-15 08:34:50'),
(436, 72, 1, 'project_show', '1', 0, '2021-07-15 08:34:50'),
(437, 72, 1, 'project_create', '1', 0, '2021-07-15 08:34:50'),
(438, 72, 1, 'project_delete', '1', 0, '2021-07-15 08:34:50'),
(439, 72, 1, 'project_view', '1', 0, '2021-07-15 08:34:50'),
(440, 72, 1, 'project_edit', '1', 0, '2021-07-15 08:34:50'),
(441, 72, 1, 'calendar_management_show', '0', 0, '2021-07-15 08:34:50'),
(442, 72, 1, 'permission_show', '0', 0, '2021-07-15 08:34:50'),
(443, 72, 1, 'permission_add', '1', 0, '2021-07-15 08:34:50'),
(444, 72, 1, 'permission_delete', '1', 0, '2021-07-15 08:34:50'),
(445, 72, 1, 'permission_view', '1', 0, '2021-07-15 08:34:50'),
(446, 72, 1, 'permission_edit', '1', 0, '2021-07-15 08:34:50'),
(447, 72, 1, 'stamping_property_owner_show', '0', 0, '2021-07-15 08:34:50'),
(448, 72, 1, 'stamping_show', '0', 0, '2021-07-15 08:34:50'),
(449, 72, 1, 'collaborators_show', '0', 0, '2021-07-15 08:34:50'),
(450, 72, 1, 'membership_show', '0', 0, '2021-07-15 08:34:50'),
(451, 72, 1, 'support_tickets_show', '1', 0, '2021-07-15 08:34:50'),
(452, 72, 1, 'book_deals_show', '0', 0, '2021-07-15 08:34:50'),
(453, 72, 1, 'agreements_show', '1', 0, '2021-07-15 08:34:50'),
(454, 72, 1, 'sms_report_show', '0', 0, '2021-07-15 08:34:50'),
(455, 72, 1, 'finance_show', '0', 0, '2021-07-15 08:34:50'),
(456, 72, 1, 'file_history_show', '1', 0, '2021-07-15 08:34:50'),
(457, 72, 1, 'customer_active', '0', 0, '2021-07-15 08:34:50'),
(458, 72, 1, 'customer_pending', '0', 0, '2021-07-15 08:34:50'),
(459, 72, 1, 'customer_show', '0', 0, '2021-07-15 08:34:50'),
(460, 72, 1, 'customer_create', '1', 0, '2021-07-15 08:34:50'),
(461, 72, 1, 'customer_password', '1', 0, '2021-07-15 08:34:50'),
(462, 72, 1, 'customer_view', '1', 0, '2021-07-15 08:34:50'),
(463, 72, 1, 'customer_edit', '1', 0, '2021-07-15 08:34:50'),
(464, 72, 1, 'customer_delete', '1', 0, '2021-07-15 08:34:50'),
(465, 72, 1, 'customer_role', '1', 0, '2021-07-15 08:34:50'),
(466, 72, 1, 'customer_ban', '1', 0, '2021-07-15 08:34:50'),
(467, 72, 1, 'worker_show', '1', 0, '2021-07-15 08:34:50'),
(468, 72, 1, 'worker_create', '1', 0, '2021-07-15 08:34:50'),
(469, 72, 1, 'worker_delete', '1', 0, '2021-07-15 08:34:50'),
(470, 72, 1, 'worker_password', '1', 0, '2021-07-15 08:34:50'),
(471, 72, 1, 'worker_view', '1', 0, '2021-07-15 08:34:50'),
(472, 72, 1, 'worker_edit', '1', 0, '2021-07-15 08:34:50'),
(473, 72, 1, 'worker_role', '1', 0, '2021-07-15 08:34:50'),
(474, 72, 1, 'worker_ban', '1', 0, '2021-07-15 08:34:50'),
(475, 72, 1, 'contractor_show', '1', 0, '2021-07-15 08:34:50'),
(476, 72, 1, 'contractor_create', '1', 0, '2021-07-15 08:34:50'),
(477, 72, 1, 'contractor_password', '1', 0, '2021-07-15 08:34:50'),
(478, 72, 1, 'contractor_delete', '1', 0, '2021-07-15 08:34:50'),
(479, 72, 1, 'contractor_role', '1', 0, '2021-07-15 08:34:50'),
(480, 72, 1, 'contractor_view', '1', 0, '2021-07-15 08:34:50'),
(481, 72, 1, 'contractor_edit', '1', 0, '2021-07-15 08:34:50'),
(482, 72, 1, 'contractor_ban', '1', 0, '2021-07-15 08:34:50'),
(483, 72, 1, 'invoice_show', '1', 0, '2021-07-15 08:34:50'),
(484, 72, 1, 'invoice_create', '1', 0, '2021-07-15 08:34:50'),
(485, 72, 1, 'invoice_delete', '1', 0, '2021-07-15 08:34:50'),
(486, 72, 1, 'invoice_send_mail', '1', 0, '2021-07-15 08:34:50'),
(487, 72, 1, 'invoice_view', '1', 0, '2021-07-15 08:34:50'),
(488, 72, 1, 'property_show', '1', 0, '2021-07-15 08:34:50'),
(489, 72, 1, 'property_create', '1', 0, '2021-07-15 08:34:50'),
(490, 72, 1, 'property_delete', '1', 0, '2021-07-15 08:34:50'),
(491, 72, 1, 'property_view', '1', 0, '2021-07-15 08:34:50'),
(492, 72, 1, 'property_edit', '1', 0, '2021-07-15 08:34:50'),
(493, 69, 1, 'recent_agreements_show', '0', 0, '2021-07-22 10:33:33'),
(494, 69, 1, 'sub_admin_show', '0', 0, '2021-07-22 10:33:33'),
(495, 69, 1, 'sub_admin_create', '0', 0, '2021-07-22 10:33:33'),
(496, 69, 1, 'sub_admin_delete', '0', 0, '2021-07-22 10:33:33'),
(497, 69, 1, 'sub_admin_password', '0', 0, '2021-07-22 10:33:33'),
(498, 69, 1, 'sub_admin_view', '0', 0, '2021-07-22 10:33:33'),
(499, 69, 1, 'sub_admin_edit', '0', 0, '2021-07-22 10:33:33'),
(500, 69, 1, 'sub_admin_role', '0', 0, '2021-07-22 10:33:33'),
(501, 69, 1, 'sub_admin_ban', '0', 0, '2021-07-22 10:33:33'),
(502, 69, 1, 'client_create', '1', 0, '2021-07-22 10:33:33'),
(503, 69, 1, 'client_delete', '1', 0, '2021-07-22 10:33:33'),
(504, 69, 1, 'client_password', '1', 0, '2021-07-22 10:33:33'),
(505, 69, 1, 'client_view', '1', 0, '2021-07-22 10:33:33'),
(506, 69, 1, 'client_edit', '1', 0, '2021-07-22 10:33:33'),
(507, 69, 1, 'client_role', '1', 0, '2021-07-22 10:33:33'),
(508, 69, 1, 'client_ban', '1', 0, '2021-07-22 10:33:33'),
(509, 69, 1, 'project_create', '1', 0, '2021-07-22 10:33:33'),
(510, 69, 1, 'project_delete', '1', 0, '2021-07-22 10:33:33'),
(511, 69, 1, 'project_view', '1', 0, '2021-07-22 10:33:33'),
(512, 69, 1, 'project_edit', '1', 0, '2021-07-22 10:33:33'),
(513, 69, 1, 'customer_active', '0', 0, '2021-07-22 10:33:33'),
(514, 69, 1, 'customer_pending', '0', 0, '2021-07-22 10:33:33'),
(515, 69, 1, 'agreement_create', '0', 0, '2021-07-22 10:33:33'),
(516, 69, 1, 'agreement_delete', '0', 0, '2021-07-22 10:33:33'),
(517, 69, 1, 'agreement_view', '0', 0, '2021-07-22 10:33:33'),
(518, 69, 1, 'agreement_edit', '0', 0, '2021-07-22 10:33:33'),
(519, 63, 1, 'recent_agreements_show', '0', 0, '2021-07-23 14:04:49'),
(520, 63, 1, 'sub_admin_show', '0', 0, '2021-07-23 14:04:49'),
(521, 63, 1, 'sub_admin_create', '0', 0, '2021-07-23 14:04:49'),
(522, 63, 1, 'sub_admin_delete', '0', 0, '2021-07-23 14:04:49'),
(523, 63, 1, 'sub_admin_password', '0', 0, '2021-07-23 14:04:49'),
(524, 63, 1, 'sub_admin_view', '0', 0, '2021-07-23 14:04:49'),
(525, 63, 1, 'sub_admin_edit', '0', 0, '2021-07-23 14:04:49'),
(526, 63, 1, 'sub_admin_role', '0', 0, '2021-07-23 14:04:49'),
(527, 63, 1, 'sub_admin_ban', '0', 0, '2021-07-23 14:04:49'),
(528, 63, 1, 'client_show', '1', 0, '2021-07-23 14:04:49'),
(529, 63, 1, 'client_create', '1', 0, '2021-07-23 14:04:49'),
(530, 63, 1, 'client_delete', '1', 0, '2021-07-23 14:04:49'),
(531, 63, 1, 'client_password', '1', 0, '2021-07-23 14:04:49'),
(532, 63, 1, 'client_view', '1', 0, '2021-07-23 14:04:49'),
(533, 63, 1, 'client_edit', '1', 0, '2021-07-23 14:04:49'),
(534, 63, 1, 'client_role', '1', 0, '2021-07-23 14:04:49'),
(535, 63, 1, 'client_ban', '1', 0, '2021-07-23 14:04:49'),
(536, 63, 1, 'revenue_overview_show', '0', 0, '2021-07-23 14:04:49'),
(537, 63, 1, 'project_show', '1', 0, '2021-07-23 14:04:49'),
(538, 63, 1, 'project_create', '1', 0, '2021-07-23 14:04:49'),
(539, 63, 1, 'project_delete', '1', 0, '2021-07-23 14:04:49'),
(540, 63, 1, 'project_view', '1', 0, '2021-07-23 14:04:49'),
(541, 63, 1, 'project_edit', '1', 0, '2021-07-23 14:04:49'),
(542, 63, 1, 'calendar_management_show', '0', 0, '2021-07-23 14:04:49'),
(543, 63, 1, 'permission_add', '0', 0, '2021-07-23 14:04:49'),
(544, 63, 1, 'permission_delete', '0', 0, '2021-07-23 14:04:49'),
(545, 63, 1, 'permission_view', '0', 0, '2021-07-23 14:04:49'),
(546, 63, 1, 'permission_edit', '0', 0, '2021-07-23 14:04:49'),
(547, 63, 1, 'customer_active', '0', 0, '2021-07-23 14:04:49'),
(548, 63, 1, 'customer_pending', '0', 0, '2021-07-23 14:04:49'),
(549, 63, 1, 'agreement_create', '0', 0, '2021-07-23 14:04:49'),
(550, 63, 1, 'agreement_delete', '0', 0, '2021-07-23 14:04:49'),
(551, 63, 1, 'agreement_view', '0', 0, '2021-07-23 14:04:49'),
(552, 63, 1, 'agreement_edit', '0', 0, '2021-07-23 14:04:49');

-- --------------------------------------------------------

--
-- Table structure for table `poll_votes`
--

CREATE TABLE `poll_votes` (
  `id` int(11) NOT NULL,
  `poll_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `vote` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `poll_votes`
--

INSERT INTO `poll_votes` (`id`, `poll_id`, `user_id`, `vote`) VALUES
(2, 2, 1, 'option1'),
(4, 3, 1, 'option4'),
(12, 3, 41, 'option1'),
(13, 2, 36, 'option1'),
(19, 2, 2, 'option1'),
(20, 3, 2, 'option4'),
(22, 4, 2, 'option1');

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` int(11) NOT NULL,
  `title` varchar(500) DEFAULT NULL,
  `title_slug` varchar(500) DEFAULT NULL,
  `keywords` varchar(500) DEFAULT NULL,
  `summary` varchar(1000) DEFAULT NULL,
  `content` longtext,
  `category_id` int(11) DEFAULT NULL,
  `subcategory_id` int(11) DEFAULT NULL,
  `image_big` varchar(255) DEFAULT NULL,
  `image_default` varchar(255) DEFAULT NULL,
  `image_slider` varchar(255) DEFAULT NULL,
  `image_mid` varchar(255) DEFAULT NULL,
  `image_small` varchar(255) DEFAULT NULL,
  `hit` int(11) DEFAULT '0',
  `optional_url` varchar(1000) DEFAULT NULL,
  `need_auth` int(11) DEFAULT '0',
  `is_slider` int(11) DEFAULT '0',
  `slider_order` int(11) DEFAULT '1',
  `is_featured` int(11) DEFAULT '0',
  `featured_order` int(11) DEFAULT '1',
  `is_recommended` int(11) NOT NULL DEFAULT '0',
  `is_breaking` int(11) NOT NULL DEFAULT '1',
  `visibility` int(11) DEFAULT '1',
  `post_type` varchar(100) DEFAULT 'post',
  `image_url` text,
  `embed_code` text,
  `user_id` int(11) DEFAULT NULL,
  `comment_count` int(111) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `title`, `title_slug`, `keywords`, `summary`, `content`, `category_id`, `subcategory_id`, `image_big`, `image_default`, `image_slider`, `image_mid`, `image_small`, `hit`, `optional_url`, `need_auth`, `is_slider`, `slider_order`, `is_featured`, `featured_order`, `is_recommended`, `is_breaking`, `visibility`, `post_type`, `image_url`, `embed_code`, `user_id`, `comment_count`, `created_at`) VALUES
(1, 'Why We Love Fitness – And You Should, Too!', 'why-we-love-fitness-and-you-should-too', '', '', '<p><span style=\"font-size:12.0pt\">The idea of fitness is liked and admired by all of us and you should as well love it. Simply imagine someone with a fit muscular body with an active attitude and an obese individual who slouches on the couch with a beer can in one hand and a handful of junks. Which of these impresses you better? Of course, the former one. </span></p>\r\n\r\n<p><span style=\"font-size:12.0pt\">They very reason if looking good and appealing makes us love the word &ldquo;fitness&rdquo;. Apart from that the following are the numerous other reasons why you should also love the idea of being fit.</span></p>\r\n\r\n<p><strong><span style=\"font-size:12.0pt\">Weight loss &ndash; </span></strong><span style=\"font-size:12.0pt\">The impact of metabolism becomes slower as we age. It turns out that with age the body burns lesser fat. Fitness measures taken can trick our body to be in its burning state all day long.</span></p>\r\n\r\n<p><strong><span style=\"font-size:12.0pt\">Prevent diseases- </span></strong><span style=\"font-size:12.0pt\">When we are talking about health and fitness we cannot deny the role of diet in it. When consuming a balanced nutritious diet, fitness gives the body a complementary effect. It helps the body to receive nutrients and use it for repairing and recovering internal damages occurring to the body due to external reasons.</span></p>\r\n\r\n<p><strong><span style=\"font-size:12.0pt\">Balanced hormones</span></strong><span style=\"font-size:12.0pt\">- Extra fat accumulation in a human body can lead to hormonal imbalances. That&rsquo;s the key reason for the occurrence of serious ailments. Love fitness like you never loved anyone to stay balanced internally.</span></p>\r\n\r\n<p><strong><span style=\"font-size:12.0pt\">Stress and energy booster &ndash;</span></strong><span style=\"font-size:12.0pt\">When we undergo workouts, a substance known as endorphins are released in the blood. These keep the body in a happy state and works as a stress booster. An early morning physical workout also jumpstarts the body engine immediately thus energizing you for the entire day.</span></p>\r\n\r\n<p><strong><span style=\"font-size:12.0pt\">Better sleep &ndash; A</span></strong><span style=\"font-size:12.0pt\"> healthy body which has worked out has spent energy. Thus for those who do not get a good night&rsquo;s sleep this can be a permanent medicine.</span></p>\r\n\r\n<p><span style=\"font-size:12.0pt\">Unbelievable things and changes can begin happennning to your body when you take fitness as a priority in life. A good bit of muscles and balanced body weight aids you live longer and enjoy life better.</span></p>\r\n', 1, 2, 'uploads/images/image_big_15a2e2a14cfb9f.jpg', 'uploads/images/image_default_15a2e2a151eed1.jpg', 'uploads/images/image_slider_15a2e2a1564464.jpg', 'uploads/images/image_mid_15a2e2a15b7dce.jpg', 'uploads/images/image_small_15a2e2a15ee6ea.jpg', 93, '', 0, 0, 1, 1, 1, 0, 0, 1, 'post', NULL, NULL, 1, 1, '2017-12-11 06:47:48'),
(2, '30-Minute Yoga With Adriene to Reduce Stress', '30-minute-yoga-with-adriene-to-reduce-stress', 'yoga, reduce stress, adriene', '', '<p>Get ready to de-stress with this relaxing yoga series from Yoga With Adriene.</p>\r\n', NULL, NULL, NULL, '', NULL, NULL, NULL, 59, '', 0, 0, 1, 0, 1, 0, 1, 1, 'video', 'https://img.youtube.com/vi/q2G5ZX0JgvQ/hqdefault.jpg', 'https://www.youtube.com/embed/q2G5ZX0JgvQ', 1, 2, '2017-12-11 07:08:33'),
(4, 'How to Solve the Biggest Problems with Health', 'how-to-solve-the-biggest-problems-with-health', '', '', '<p>As we hit our 30&rsquo;s or 40&rsquo;s a majority of us have the tendency of becoming weaker, less healthy and a bit fatter. Why is it so? Add it up with increased stress, commitments, responsibilities and lessening of energy and time.</p>\r\n\r\n<p>We cannot deny that we need to watch out what we are eating. We also know we must take good care of ourselves. But, we all find it a hard time to be consistent with our commitments towards good health, nutritious diet and workout regimen.</p>\r\n\r\n<p>Here, we will ponder over two of the biggest problems of health which millions have identified to be the reason which holds them back to be in the best of their shapes. Along with it we will also learn a suggested working plan to solve these.</p>\r\n\r\n<p><strong>Busy Stressful Life </strong><br />\r\nEvery one of us has a different life style. But there are certain things which are common for the most of us. For any average person the significance of growing old are:</p>\r\n\r\n<ul>\r\n	<li>Enhanced responsibilities at the home front.</li>\r\n	<li>Stress levels enhanced at workplace.</li>\r\n	<li>Time spent to take care of one&rsquo;s own self to become lesser and lesser.</li>\r\n</ul>\r\n\r\n<p><strong>Inconsistency</strong><br />\r\nIt&rsquo;s right at this stage when we drop that fitness membership or quit taking care of what we are eating. As a result most of us become the proud owner of an unhealthy body. However we also cannot deny that people keep making plans to make this better &ldquo;someday&rdquo;. For many of us even if they begin an exercise routine they fall prey to &ldquo;inconsistency&rdquo; pretty soon.</p>\r\n\r\n<p>&ldquo;Someday&rdquo;, is the main culprit here which makes us keep postponing our health related plans.</p>\r\n\r\n<p>So, what can be done to solve these?</p>\r\n\r\n<ul>\r\n	<li>You no need to spend long hours in a gym. Choose a workout style you will enjoy the most and stick by it.</li>\r\n	<li>Detect what are the gaps in between your dietary needs and a working plan to fix it. A healthy diet is the magic potion for a stress free fit mind and body.</li>\r\n</ul>\r\n\r\n<p><span style=\"font-size:11.0pt\"><span style=\"font-family:&quot;Calibri&quot;,sans-serif\">So, ditch all the superficial solutions and procrastination and buckle up for some serious health solutions.</span></span></p>\r\n', 1, 2, 'uploads/images/image_big_45a2e60dbbc52f.jpg', 'uploads/images/image_default_45a2e60dbde23a.jpg', 'uploads/images/image_slider_45a2e60dc10348.jpg', 'uploads/images/image_mid_45a2e60dc3d673.jpg', 'uploads/images/image_small_45a2e60dc53f75.jpg', 79, '', 0, 0, 1, 1, 1, 0, 0, 1, 'post', NULL, NULL, 1, 0, '2017-12-11 10:41:31'),
(5, '6.1 earthquake jolts northern India, tremors felt in Delhi-NCR', '6.1-earthquake-jolts-northern-india-tremors-felt-in-delhi-ncr', '', '', '<p>NEW DELHI: A 6.1 magnitude&nbsp;<a href=\"https://timesofindia.indiatimes.com/topic/earthquake\">earthquake</a>&nbsp;on the Afghanistan-Tajikistan border region on Wednesday shook several parts of north India, including the national capital and the Kashmir Valley, the met department said.<br />\r\n<br />\r\nThe&nbsp;<a href=\"https://timesofindia.indiatimes.com/topic/quake\">quake</a>, which was felt in the Delhi-NCR region as well as the Kashmir Valley, led to panic in some parts with people rushing outdoors for safety.<br />\r\n<br />\r\nThere were no reports of any damage due to the earthquake, officials said.<br />\r\n<br />\r\n&quot;The epicentre of the quake was near the Afghanistan- Tajikistan border and occurred at a depth of around 190 kilometres,&quot; an official said in Srinagar.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><br />\r\n<br />\r\nIn New Delhi, Delhi Metro trains were halted briefly but services were not disrupted, said a Delhi Metro official.<br />\r\n<br />\r\nThe tremors were felt strongly in the Valley, with people rushing out of buildings and vehicles.<br />\r\n<br />\r\nOfficials snapped electricity supply briefly as a precautionary measure.<br />\r\n&nbsp;</p>\r\n\r\n<blockquote>\r\n<p dir=\"ltr\">Earthquake (<a href=\"https://twitter.com/hashtag/%E0%A4%AD%E0%A5%82%E0%A4%95%E0%A4%82%E0%A4%AA?src=hash&amp;ref_src=twsrc%5Etfw\">#भूकंप</a>) possibly felt 2 min ago in <a href=\"https://twitter.com/hashtag/National?src=hash&amp;ref_src=twsrc%5Etfw\">#National</a> Capital Territory of Delhi <a href=\"https://twitter.com/hashtag/India?src=hash&amp;ref_src=twsrc%5Etfw\">#India</a>. <a href=\"https://t.co/wPtMW5ND1t\">https://t.co/wPtMW5ND1t</a> <a href=\"https://t.co/LJ6Jl5e0Gx\">pic.twitter.com/LJ6Jl5e0Gx</a></p>\r\n&mdash; EMSC (@LastQuake) <a href=\"https://twitter.com/LastQuake/status/958598652347539461?ref_src=twsrc%5Etfw\">January 31, 2018</a></blockquote>\r\n', 3, 6, 'uploads/images/image_big_55a718fab58a20.jpg', 'uploads/images/image_default_55a718fab72a4b.jpg', 'uploads/images/image_slider_55a718fab80407.jpg', 'uploads/images/image_mid_55a718fabaaed6.jpg', 'uploads/images/image_small_55a718fabbfca0.jpg', 56, 'https://timesofindia.indiatimes.com/india/earthquake-tremors-felt-in-delhi-ncr/articleshow/62721817.cms', 0, 0, 1, 0, 1, 0, 0, 1, 'post', NULL, NULL, 1, 4, '2018-01-31 09:43:07'),
(7, '102 Not Out - Official Teaser', '102-not-out-official-teaser', '', '', '<p>Embark on a new journey with the most unusual father and son love story. Presenting the <a href=\"https://www.youtube.com/results?search_query=%23102NotOutTeaser\">#102NotOutTeaser</a>. Sony Pictures Releasing of India present, 102 Not Out in association with Treetop Entertainment and Benchmark Pictures. The film is directed by Umesh Shukla. Stay connected to this unusual bond here: www.facebook.com/sonypicturesofindia www.twitter.com/SonyPicsIndia plus.google.com/+SonyPicturesIndia</p>\r\n', NULL, NULL, NULL, '', NULL, NULL, NULL, 23, '', 0, 0, 1, 0, 1, 0, 1, 1, 'video', 'https://img.youtube.com/vi/2hkhKftPcIY/hqdefault.jpg', 'https://www.youtube.com/embed/2hkhKftPcIY', 1, 0, '2018-02-12 09:52:01'),
(8, 'Raid | Official Trailer', 'raid-official-trailer', '', '', '<p>Here&#39;s presenting the official trailer 2018 for the upcoming Bollywood Movie &quot;Raid&quot; starring Ajay Devgn, Ileana D&#39;cruz and Saurabh Shukla in pivotal roles. Set in the 80s, Raid is based on one of the most high profile raids the country has ever known and is India&#39;s first film on income tax raids. A fearless Income Tax officer Amay Patnaik carries out a non-stop raid at the mansion of Tauji the most powerful man in Lucknow. Will Tauji manage to stop the raid or will the Amay Patnaik bring him down? Find out on 16th March 2018. Gulshan Kumar &amp; Tseries present, A Panorama Studios Production, Produced by Bhushan Kumar, Krishan Kumar, Kumar Mangat Pathak and Abhishek Pathak, Raid is directed by Raj Kumar Gupta. The film releases on 16th March 2018. ►To know more, connect with us on: Facebook: <a href=\"https://www.youtube.com/redirect?q=https%3A%2F%2Fwww.facebook.com%2FRaidTheFilm%2F&amp;v=3h4thS-Hcrk&amp;event=video_description&amp;redir_token=-lEkOWG4eVQkS1IzULikDlrBry98MTUxODUxNTU1NEAxNTE4NDI5MTU0\">https://www.facebook.com/RaidTheFilm/</a> Twitter: <a href=\"https://www.youtube.com/redirect?q=https%3A%2F%2Ftwitter.com%2FRaidTheFilm&amp;v=3h4thS-Hcrk&amp;event=video_description&amp;redir_token=-lEkOWG4eVQkS1IzULikDlrBry98MTUxODUxNTU1NEAxNTE4NDI5MTU0\">https://twitter.com/RaidTheFilm</a> Instagram: <a href=\"https://www.youtube.com/redirect?q=https%3A%2F%2Fwww.instagram.com%2Fraidthefilm%2F&amp;v=3h4thS-Hcrk&amp;event=video_description&amp;redir_token=-lEkOWG4eVQkS1IzULikDlrBry98MTUxODUxNTU1NEAxNTE4NDI5MTU0\">https://www.instagram.com/raidthefilm/</a></p>\r\n', NULL, NULL, NULL, '', NULL, NULL, NULL, 22, '', 0, 0, 1, 0, 1, 0, 1, 1, 'video', 'https://img.youtube.com/vi/3h4thS-Hcrk/hqdefault.jpg', 'https://www.youtube.com/embed/3h4thS-Hcrk', 1, 0, '2018-02-12 09:53:46'),
(9, 'Sridevi Dies In Dubai', 'sridevi-dies-in-dubai', '', 'Megastar Sridevi Dies In Dubai, Body To Be Flown To Mumbai Today', '<p>The country is mourning&nbsp;<a href=\"https://www.ndtv.com/india-news/sridevi-death-live-updates-i-have-no-words-tweets-priyanka-chopra-after-sridevis-death-updates-1816840\">Bollywood icon Sridevi</a>, who died on Saturday evening in Dubai following a cardiac arrest. The 54-year-old, who had dominated the silver screen in the 80s, had gone to Dubai to attend a family wedding.<br />\r\n<br />\r\nSridevi had fainted in the bathroom of the Jumeirah Emirates Towers, where she was staying with her family. A medical team had failed to revive her and she was declared dead at a hospital, Indian ambassador in UAE Navdeep Suri told NDTV.<br />\r\n<br />\r\nThe routine forensic procedures are over and as soon as the report is released, her body will be flown back to India on a private jet, reported news agency Reuters.<br />\r\n<br />\r\nIn a statement last evening, the family said the actor&#39;s body will arrive in Mumbai today. &quot;We will update you on all further information as and when it&#39;s available to us,&quot; the statement read. The last rites are expected to be held today.<br />\r\n<br />\r\n&quot;We are in touch with the family and local authorities to provide all possible assistance,&quot; Mr Suri told reporters.<br />\r\n<br />\r\nThe family has said&nbsp;<a href=\"https://www.ndtv.com/india-news/sridevi-dies-at-54-family-says-she-had-no-history-of-heart-ailment-1817003\">Sridevi did not have any history of heart ailments</a>.<br />\r\n<br />\r\n&quot;We are completely shocked. She had no history of a heart attack,&quot; Sanjay Kapoor had told Khaleej Times, reported news agency IANS. Mr Kapoor reached Dubai on Sunday morning after receiving the news.</p>\r\n\r\n<p><br />\r\n<a href=\"https://www.ndtv.com/india-news/actor-sridevi-dies-at-age-54-1816838?pfrom=home-topscroll\">The actor&#39;s sudden death has hit the nation hard</a>. Videos of&nbsp;<a href=\"https://www.ndtv.com/video/entertainment/news/watch-at-dubai-wedding-dancing-sridevi-hugged-boney-kapoor-479612\" target=\"_blank\">Sridevi at the wedding of nephew Mohit Marwah</a>, which she had gone to attend, are being widely shared on social media. The gorgeous visuals underscore why many are having difficulty reconciling her sudden death.</p>\r\n\r\n<p><br />\r\nSridevi was loved by millions for her roles in iconic movies like &quot;Sadma&quot;, &quot;Lamhe&quot; &quot;Mr India&quot;, &quot;Chandni&quot; and &quot;Himmatwala&quot;. A versatile actor, she had ruled not only in Bollywood, but also the Tamil, Telugu and Kannada film industry.</p>\r\n\r\n<p><br />\r\nAfter her marriage to director Boney Kapoor, Sridevi had taken a 15-year break from movies. She made a triumphant return in 2012 with &quot;English Vinglish&quot;, which received rave reviews from critics.</p>\r\n', 3, 8, 'uploads/images/image_big_95a935f25aabb1.jpg', 'uploads/images/image_default_95a935f25cc178.jpg', 'uploads/images/image_slider_95a935f25ed71e.jpg', 'uploads/images/image_mid_95a935f26254be.jpg', 'uploads/images/image_small_95a935f263b44e.jpg', 119, 'https://www.ndtv.com/india-news/megastar-sridevi-dies-in-dubai-forensic-tests-delay-return-to-india-1817024', 0, 1, 1, 1, 1, 1, 1, 1, 'post', NULL, NULL, 1, 0, '2018-02-26 01:11:30'),
(10, 'India retain the Test mace', 'india-retain-the-test-mace', '', 'Virat Kohli receives ICC Test Championship Mace, sends special message to fans', '<p>Skipper Virat Kohli was presented with the prestigious ICC Test Championship Mace as India retained the top spot in the ICC Test Team Rankings.</p>\r\n\r\n<p>On behalf of the International Cricket Council (ICC), the mace was presented by ICC Cricket Hall of Famers Sunil Gavaskar and Graeme Pollock at a ceremony at the Newlands Stadium in Cape Town after India concluded the tour of South Africa by clinching the T20 International series 2-1, following a seven-run win in third match on Saturday.</p>\r\n\r\n<p>India ensured the number one spot on the ICC Test Team Rankings and a prize of $1 million after their victory in the third Test at Johannesburg against South Africa last month. The win ensured that no team can move ahead of India in the Test rankings at the 3 April cut-off date.</p>\r\n', 9, 10, 'uploads/images/image_big_105a9360c2de624.jpg', 'uploads/images/image_default_105a9360c3786d7.jpg', 'uploads/images/image_slider_105a9360c3afa19.jpg', 'uploads/images/image_mid_105a9360c3e387b.jpg', 'uploads/images/image_small_105a9360c4225f7.jpg', 36, 'http://www.dnaindia.com/cricket/report-watch-virat-kohli-receives-icc-test-championship-mace-sends-special-message-to-fans-2588464', 0, 1, 1, 1, 1, 1, 0, 1, 'post', NULL, NULL, 1, 1, '2018-02-26 01:20:02'),
(11, 'From Pakistan To India, Sportspersons Mourn Sridevi\'s Death With Condolence Messages', 'from-pakistan-to-india-sportspersons-mourn-sridevis-death-with-condolence-messages', '', 'Film actress Sridevi died of cardiac arrest in Dubai. She was 54', '<p>Bollywood icon Sridevi died last evening in Dubai following a cardiac arrest. Sridevi had collapsed in her hotel room on Saturday evening. A medical team had failed to revive her and was declared dead at a hospital, Indian ambassador in UAE Navdeep Suri told NDTV. As soon as the news broke, India could not believe the untimely death of the&nbsp;<a href=\"https://www.ndtv.com/india-news/megastar-sridevi-dies-in-dubai-forensic-tests-delay-return-to-india-1817024\">Bollywood diva</a>. The 54-year-old, who had dominated the silver screen in the 80s, had gone to Dubai to attend a family wedding. Apart from the&nbsp;<a href=\"https://www.ndtv.com/entertainment/after-sridevis-death-an-angry-tweet-from-rishi-kapoor-1817030\">silver screen</a>&nbsp;family, Indian sportspersons too poured in condolences for the family.</p>\r\n\r\n<p>While her body will be released after the routine forensic procedures, the last rites will be held in Mumbai. However, the date is yet to be announced.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<blockquote>\r\n<p><a href=\"https://twitter.com/waqyounis99\"><img alt=\"\" src=\"https://pbs.twimg.com/profile_images/940589999837282304/MhrmryKc_normal.jpg\" />waqar younis</a><a href=\"https://twitter.com/waqyounis99\"><strong>✔</strong>@waqyounis99</a></p>\r\n\r\n<p dir=\"ltr\">We are deeply saddened by the news of Sridevi&rsquo;s passing. Our thoughts and prayers are with the family <a dir=\"ltr\" href=\"https://twitter.com/hashtag/RIP?src=hash\" rel=\"tag\">#RIP</a></p>\r\n\r\n<p><a href=\"https://twitter.com/waqyounis99/status/967628086106886144\">10:41 AM - Feb 25, 2018</a></p>\r\n\r\n<ul>\r\n	<li><a href=\"https://twitter.com/intent/like?tweet_id=967628086106886144\" title=\"Like\">2,622</a></li>\r\n	<li><a href=\"https://twitter.com/waqyounis99/status/967628086106886144\" title=\"View the conversation on Twitter\">259 people are talking about this</a></li>\r\n</ul>\r\n</blockquote>\r\n\r\n<p><a href=\"https://support.twitter.com/articles/20175256\" title=\"Twitter Ads info and privacy\">Twitter Ads info and privacy</a></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<blockquote>\r\n<p><a href=\"https://twitter.com/shoaib100mph\"><img alt=\"\" src=\"https://pbs.twimg.com/profile_images/944247330827591681/-zOMXikV_normal.jpg\" />Shoaib Akhtar</a><a href=\"https://twitter.com/shoaib100mph\"><strong>✔</strong>@shoaib100mph</a></p>\r\n\r\n<p dir=\"ltr\">Saddened by her sudden demise!<br />\r\nRIP <a dir=\"ltr\" href=\"https://twitter.com/hashtag/Sridevi?src=hash\" rel=\"tag\">#Sridevi</a></p>\r\n\r\n<p><a href=\"https://twitter.com/shoaib100mph/status/967712568709181440\">4:17 PM - Feb 25, 2018</a></p>\r\n\r\n<ul>\r\n	<li><a href=\"https://twitter.com/intent/like?tweet_id=967712568709181440\" title=\"Like\">4,163</a></li>\r\n	<li><a href=\"https://twitter.com/shoaib100mph/status/967712568709181440\" title=\"View the conversation on Twitter\">479 people are talking about this</a></li>\r\n</ul>\r\n</blockquote>\r\n\r\n<p><a href=\"https://support.twitter.com/articles/20175256\" title=\"Twitter Ads info and privacy\">Twitter Ads info and privacy</a></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<blockquote>\r\n<p><a href=\"https://twitter.com/SDhawan25\"><img alt=\"\" src=\"https://pbs.twimg.com/profile_images/929711199998050304/Mc4obUlh_normal.jpg\" />Shikhar Dhawan</a><a href=\"https://twitter.com/SDhawan25\"><strong>✔</strong>@SDhawan25</a></p>\r\n\r\n<p dir=\"ltr\">Very saddened by the news of Srideviji passing away. My heartfelt condolences to the entire family.<a dir=\"ltr\" href=\"https://twitter.com/hashtag/RIPSridevi?src=hash\" rel=\"tag\">#RIPSridevi</a></p>\r\n\r\n<p><a href=\"https://twitter.com/SDhawan25/status/967656232269107201\">12:33 PM - Feb 25, 2018</a></p>\r\n\r\n<ul>\r\n	<li><a href=\"https://twitter.com/intent/like?tweet_id=967656232269107201\" title=\"Like\">12.2K</a></li>\r\n	<li><a href=\"https://twitter.com/SDhawan25/status/967656232269107201\" title=\"View the conversation on Twitter\">742 people are talking about this</a></li>\r\n</ul>\r\n</blockquote>\r\n\r\n<p><a href=\"https://support.twitter.com/articles/20175256\" title=\"Twitter Ads info and privacy\">Twitter Ads info and privacy</a></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<blockquote>\r\n<p><a href=\"https://twitter.com/YUVSTRONG12\"><img alt=\"\" src=\"https://pbs.twimg.com/profile_images/773241020184137728/CXgF3gO5_normal.jpg\" />yuvraj singh</a><a href=\"https://twitter.com/YUVSTRONG12\"><strong>✔</strong>@YUVSTRONG12</a></p>\r\n\r\n<p dir=\"ltr\">Absolutely shocked to hear about the passing away of our Bollywood queen <a dir=\"ltr\" href=\"https://twitter.com/hashtag/Sridevi?src=hash\" rel=\"tag\">#Sridevi</a> . May her soul rest in peace, my deepest condolences to the family <img alt=\"', 9, 10, 'uploads/images/image_big_115a93629f214aa.jpg', 'uploads/images/image_default_115a93629f4ecc6.jpg', 'uploads/images/image_slider_115a93629f6ec52.jpg', 'uploads/images/image_mid_115a93629f9d6cc.jpg', 'uploads/images/image_small_115a93629fb58f0.jpg', 27, 'https://sports.ndtv.com/cricket/from-pakistan-to-india-sportspersons-mourn-sridevis-death-with-condolence-messages-1817037', 0, 0, 1, 1, 1, 1, 0, 1, 'post', NULL, NULL, 1, 0, '2018-02-26 01:27:58'),
(12, 'Manchester City Beat Arsenal 3-0 To Win League Cup', 'manchester-city-beat-arsenal-3-0-to-win-league-cup', '', 'Manchester City won the first trophy of the Pep Guardiola era on Sunday, thumping a disappointing Arsenal 3-0 in the League Cup final at Wembley.', '<p>Manchester City won the first trophy of the Pep Guardiola era on Sunday, brushing Arsenal aside 3-0 in the&nbsp;<a href=\"https://sports.ndtv.com/football\">League Cup final&nbsp;</a>with the help of an old-fashioned route-one goal from Sergio Aguero.It was an impressive statement of intent from Guardiola&#39;s team at Wembley after a shock FA Cup defeat to lowly Wigan last week ended their bid for an unprecedented quadruple.</p>\r\n\r\n<p>City opened the scoring in the 18th minute when a long punt upfield from goalkeeper Claudio Bravo was controlled by Aguero, who coolly lifted the ball over a helpless David Ospina in the Arsenal goal.</p>\r\n\r\n<p>Captain Vincent Kompany doubled the lead in the second half with just over half an hour to go and David Silva put the game out of the reach of Arsene Wenger&#39;s team.</p>\r\n\r\n<p>The runaway Premier League leaders will be hoping to use the victory as a springboard to greater glory as the season approaches its final stretch but defeat for Wenger means he has never lifted the League Cup.</p>\r\n\r\n<p>On a bitterly cold, clear day in London, City, in their light blue kit, took control early, playing measured football and enjoying the lion&#39;s share of possession against a side who have made Wembley a second home in recent years.</p>\r\n\r\n<p>But Arsenal went closest to taking the lead within the first 10 minutes, with new signing Pierre-Emerick Aubameyang seeing his scuffed shot saved by a sprawling Bravo.</p>\r\n\r\n<p>Seconds later Aguero found the side netting after an incisive break from City, who looked short of their fluent best.</p>\r\n\r\n<p>But it was Aguero who broke the deadlock, controlling the ball as Arsenal&#39;s defence failed to deal with the danger, silencing the boisterous Arsenal fans.</p>\r\n\r\n<p>The Argentine striker has scored in each of his past five games in all competitions against Arsenal and this was his 199th goal in City colours.</p>\r\n\r\n<p>It was an unusual goal for Guardiola&#39;s team, who have been lauded for their silky passing game this season, which has already seen them hailed as one of the finest sides in Premier League history.</p>\r\n\r\n<p>- Kompany goal -</p>\r\n\r\n<p>City made a bright start to the second half and captain Kompany was in the right place to steer home Ilkay Gundogan&#39;s shot from the edge of the box after a Kevin De Bruyne corner in the 58th minute.</p>\r\n\r\n<p>It was no more than City deserved against a lacklustre Arsenal and the Belgian celebrated wildly in front of his own fans.</p>\r\n\r\n<p>Just seven minutes later Arsenal were left with a mountain to climb when Silva smashed the ball past Ospina into the far corner of the net to make it 3-0.</p>\r\n\r\n<p>Former Barcelona and Bayern Munich boss Guardiola kept faith with reserve goalkeeper Bravo for the Wembley showpiece ahead of first-choice Ederson. Bravo has played in every round of the competition so far.</p>\r\n\r\n<p>Wenger also played his number two between the sticks, fielding Ospina ahead of Petr Cech.</p>\r\n\r\n<p>City look nailed on to win the Premier League and have virtually guaranteed a place in the Champions League quarter-finals after a 4-0 first win in the first leg of their last-16 tie against Basel.</p>\r\n', 9, 11, 'uploads/images/image_big_125a93645fee914.jpg', 'uploads/images/image_default_125a93646073126.jpg', 'uploads/images/image_slider_125a9364610c569.jpg', 'uploads/images/image_mid_125a9364615ce2c.jpg', 'uploads/images/image_small_125a9364618551f.jpg', 33, 'https://sports.ndtv.com/football/manchester-city-beat-arsenal-3-0-to-win-league-cup-1817076', 0, 1, 1, 0, 1, 1, 0, 1, 'post', NULL, NULL, 1, 0, '2018-02-26 01:35:27'),
(13, 'Premier League: Romelu Lukaku Inspires Manchester United Fightback To Beat Chelsea', 'premier-league-romelu-lukaku-inspires-manchester-united-fightback-to-beat-chelsea', '', 'Romelu Lukaku broke his barren run against top six Premier League opposition and provided the winner for Jesse Lingard as Manchester United came from behind to beat Chelsea 2-1 at Old Trafford', '<p>Romelu Lukaku broke his barren run against top six&nbsp;<a href=\"https://sports.ndtv.com/football\">Premier League</a>opposition and provided the winner for Jesse Lingard as Manchester United came from behind to beat Chelsea 2-1 at Old Trafford. Victory against his former club was particularly sweet for&nbsp;<a href=\"https://sports.ndtv.com/english-premier-league/antonio-conte-is-a-very-good-manager-says-jose-mourinho-ahead-of-united-chelsea-showdown-1816511\">Jose Mourinho</a>&nbsp;as he got one over on Chelsea boss Antonio Conte, but more importantly moves United back above Liverpool into second place in the Premier League. Defeat allied to Tottenham Hotspur&#39;s late win earlier in the day at Crystal Palace sees Chelsea slip to fifth.</p>\r\n\r\n<p>The visitors enjoyed the better of the first period but failed to build on Willian&#39;s 32nd minute opener.</p>\r\n\r\n<p>Lukaku levelled seven minutes later from close range and then crossed for substitute Lingard to head home as a ruthless United took full advantage of their limited chances.</p>\r\n\r\n<p>The spectre of another fiery clash between Mourinho and Conte, who have publicly bickered in recent months, hogged the headlines before kick-off, but there was a peace offering when the pair shook hands before the action got underway.</p>\r\n\r\n<p>Mourinho recalled Paul Pogba to his starting XI after dropping the &pound;89 million (100 million euros, $124 million) midfielder for Wednesday&#39;s stalemate at Sevilla in the Champions League.</p>\r\n\r\n<p>But it was one of Conte&#39;s two changes from his side&#39;s 1-1 draw with Barcelona in midweek who nearly made an immediate impact.</p>\r\n\r\n<p>Alvaro Morata started for the first time in six weeks, but saw his side-footed volley from Marcos Alonso&#39;s driven cross come back off the bar just four minutes in.</p>\r\n\r\n<p>Chelsea dominated possession in the opening quarter, but much like they did to Barcelona on Tuesday with limited time on the ball, United restricted them to few other clear-cut chances.</p>\r\n\r\n<p>United had offered little going forward themselves until Anthony Martial&#39;s low cross picked out Alexis Sanchez inside the area.</p>\r\n\r\n<p>However, the Chilean is still waiting for his first big moment since joining United last month as he poked the ball tamely into the arms of Thibaut Courtois.</p>\r\n\r\n<p>- United caught out -</p>\r\n\r\n<p>Moments later, the hosts were caught by a blistering Chelsea counter-attack to open the scoring.</p>\r\n\r\n<p>Willian picked up the ball just outside his own area and drove through the United midfield before exchanging passes with Eden Hazard.</p>\r\n\r\n<p>The Brazilian then unleashed a shot too powerful even for David de Gea to register his fourth goal in three games.</p>\r\n\r\n<p>The lead lasted just seven minutes, though, as for the first time in a United shirt, Lukaku netted against one of their top six rivals -- at the seventh time of asking.</p>\r\n\r\n<p>Sanchez fed Martial and his clever reverse pass was slotted home by Lukaku to muted celebrations against his former club.</p>\r\n\r\n<p>Lukaku nearly had a spectacular second 22 minutes from time when he caught a Sanchez cross flush with an acrobatic volley, only to be denied by a finger tip save from Courtois.</p>\r\n\r\n<p>However, the Belgian did make a decisive contribution when he dropped deep and his in-swinging cross was met by a perfectly timed run by Lingard.</p>\r\n\r\n<p>Conte had surprisingly removed Hazard just before conceding and that decision looked all the more puzzling as Chelsea searched in vain for an equaliser.</p>\r\n\r\n<p>Willian saw another effort smothered by De Gea at the second attempt at his near post as United held out for just a second win over Chelsea in 15 meetings.</p>\r\n', 9, 11, 'uploads/images/image_big_135a9366b4b0796.jpg', 'uploads/images/image_default_135a9366b4efd52.jpg', 'uploads/images/image_slider_135a9366b54194e.jpg', 'uploads/images/image_mid_135a9366b57270c.jpg', 'uploads/images/image_small_135a9366b58de57.jpg', 100, '', 0, 0, 1, 0, 1, 0, 0, 1, 'post', NULL, NULL, 1, 1, '2018-02-26 01:45:24');

-- --------------------------------------------------------

--
-- Table structure for table `post_images`
--

CREATE TABLE `post_images` (
  `id` int(11) NOT NULL,
  `post_id` int(11) DEFAULT NULL,
  `image_big` varchar(255) DEFAULT NULL,
  `image_default` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `post_images`
--

INSERT INTO `post_images` (`id`, `post_id`, `image_big`, `image_default`, `created_at`) VALUES
(1, 9, 'uploads/images/image_big_95a9365f684bb9.jpg', 'uploads/images/image_default_95a9365f740723.jpg', '2018-02-26 01:42:15');

-- --------------------------------------------------------

--
-- Table structure for table `projects`
--

CREATE TABLE `projects` (
  `id` int(20) NOT NULL,
  `uid` int(11) NOT NULL DEFAULT '0',
  `title` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `content` longtext NOT NULL,
  `type` varchar(255) NOT NULL DEFAULT 'apartment',
  `images` varchar(255) NOT NULL,
  `url` varchar(255) NOT NULL,
  `price` int(20) NOT NULL DEFAULT '0',
  `currency` varchar(255) NOT NULL DEFAULT '$',
  `building_no` varchar(255) NOT NULL,
  `no_of_apartments` varchar(255) NOT NULL,
  `property_owner` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL,
  `zipcode` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `status` int(11) NOT NULL DEFAULT '1',
  `expt_delvry_date` date DEFAULT NULL,
  `project_manager_name` varchar(100) DEFAULT NULL,
  `manager_email` varchar(100) DEFAULT NULL,
  `manager_phone` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `projects`
--

INSERT INTO `projects` (`id`, `uid`, `title`, `slug`, `content`, `type`, `images`, `url`, `price`, `currency`, `building_no`, `no_of_apartments`, `property_owner`, `city`, `zipcode`, `address`, `created_at`, `updated_at`, `status`, `expt_delvry_date`, `project_manager_name`, `manager_email`, `manager_phone`) VALUES
(22, 87, 'galaxy home', 'galaxy-home-611bcca686bd8', 'affordable apartments', 'apartment', '16292126160.png,16292126161.jpg,16292126162.jpg,16292126163.jpg', '', 0, 'ILS', '007', '100', '', 'mohali', '160055', '123, aerocity, mohali  ', '2021-08-17 14:50:14', '2021-08-17 14:50:14', 1, '0000-00-00', 'manish', 'manish123@gmail.com', '123456'),
(26, 87, 'hello', 'hello-613ee92ee1510', 'yuyuyu', 'apartment', '16315128780.jpg', '', 0, 'USD', '222', '12', '', 'mohali', '1234', 'dsdsds', '2021-09-13 06:01:18', '2021-09-13 06:01:18', 1, '2021-09-30', 'ftrtr', 'dej@gmail.com', '32323'),
(27, 87, 'LKL', 'lkl-613ee9788a612', 'VHKVLHVV', 'apartment', '16315129520.jpg', 'JGUYG', 0, 'USD', '2', '1', '', 'MOHALI', '160058', 'FYGVYGVGVYHVL', '2021-09-13 06:02:32', '2021-09-13 06:02:32', 0, '2021-09-21', ' JB JB ', 'manish.zeroit@gmail.com', 'vfdvdfvfd'),
(28, 87, 'Screens', 'screens-613eeb9ae354d', 'chandigarh', 'apartment', '16315138010.png', 'https://zeroitsolutions.com/nandlanpro', 0, 'EUR', '7890', '5', '', 'chandigarh', '560011', 'chandigarh          ', '2021-09-13 06:11:38', '2021-09-13 06:11:38', 1, '2021-09-30', 'Robin', 'robin.zerooit@gmail.com', '9812345678'),
(29, 118, '1211', '1211-6142d0f9a4537', 'SADSADSADSAD', 'apartment', '', 'DSADSADSAD', 0, 'USD', '2', '1', '', 'chd', '160058', 'dSDSAD ', '2021-09-16 05:07:05', '2021-09-16 05:07:05', 1, '2021-12-30', 'RISHI', 'manish.zeroit@gmail.com', 'FD'),
(30, 121, 'HUHbuasbcuvcc', 'huhbuasbcuvcc-6142d7135647b', 'dfdfdsfdsfdsfdsf', 'apartment', '16317703870.jpg', 'dfdfds', 0, 'USD', '2', '1', '', 'Kasauli, Himachal Pradesh...', '160058', 'dgdgdfgdfgfdg ', '2021-09-16 05:33:07', '2021-09-16 05:33:07', 1, '0000-00-00', 'RISHI', 'RISHI.ZEROIT@GMAIL.COM', 'FD'),
(31, 121, '121', '121-6142de257347a', 'jgblvhg', 'apartment', '16317721970.jpg', '121', 0, 'USD', '2', '3', '', 'chd', '160058', 'hghghg', '2021-09-16 06:03:17', '2021-09-16 06:03:17', 1, '2021-12-01', 'RISHI', 'bhbh@GMAIL.COM', 'vfdvdfvfd'),
(32, 121, '123', '123-6142de536021f', 'ere', 'apartment', '', '', 0, 'USD', '2', '2', '', 'Kasauli, Himachal Pradesh...', '160058', 'ipoj  ', '2021-09-16 06:04:03', '2021-09-16 06:04:03', 1, '2021-12-16', 'r', 'RISHI.ZEROIT@GMAIL.COM', 'FD');

-- --------------------------------------------------------

--
-- Table structure for table `projects_assign`
--

CREATE TABLE `projects_assign` (
  `id` int(11) NOT NULL,
  `project_id` int(20) NOT NULL DEFAULT '0',
  `assign_user_id` varchar(100) NOT NULL DEFAULT '0',
  `assign_client_id` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `status` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `projects_assign`
--

INSERT INTO `projects_assign` (`id`, `project_id`, `assign_user_id`, `assign_client_id`, `created_at`, `status`) VALUES
(22, 22, '88', NULL, '2021-08-17 14:50:14', 1),
(26, 26, '88', NULL, '2021-09-13 06:01:18', 1),
(27, 27, '90', NULL, '2021-09-13 06:02:32', 1),
(28, 28, '95', NULL, '2021-09-13 06:11:38', 1),
(29, 29, '119', NULL, '2021-09-16 05:07:05', 1),
(30, 30, '123', NULL, '2021-09-16 05:33:07', 1),
(31, 31, '124', NULL, '2021-09-16 06:03:17', 1),
(32, 32, '123,124,125', NULL, '2021-09-16 06:04:03', 1);

-- --------------------------------------------------------

--
-- Table structure for table `project_reports`
--

CREATE TABLE `project_reports` (
  `id` int(11) NOT NULL,
  `project_id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `images` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8_unicode_ci NOT NULL,
  `status` int(11) NOT NULL DEFAULT '1',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `project_reports`
--

INSERT INTO `project_reports` (`id`, `project_id`, `user_id`, `updated_by`, `title`, `images`, `description`, `status`, `created_at`, `updated_at`) VALUES
(40, 22, 87, NULL, 'this is testing', '16292698650.jpg', 'testing', 1, '2021-08-18 06:57:45', '2021-08-18 06:57:45'),
(42, 29, 119, NULL, '1211', '16317691830.jpg', 'rishi.zeroit@gmail.com', 1, '2021-09-16 05:13:03', '2021-09-16 05:13:03'),
(43, 29, 119, NULL, '1115', '', 'mn j nj   j   ', 1, '2021-09-16 05:13:37', '2021-09-16 05:13:37'),
(44, 30, 123, 123, '1115', '16317726820.jpg,16317726821.jpg,16317726822.jpg,16317726823.jpg', 'wdwqdwqwqdwqdwqdwqdwqdcvhocgovcogvcvgyvgvhgvgyvg y yo w', 1, '2021-09-16 05:36:05', '2021-09-16 05:36:05'),
(45, 30, 123, NULL, '1211', '16317719170.jpg', 'fefeffefefewfwewfwefdwd', 1, '2021-09-16 05:58:37', '2021-09-16 05:58:37'),
(46, 32, 121, NULL, '1211', '16317725650.jpg', 'ihdbhvbhvvbdbbvbvbvbjbvjbhvbjvbjhvfvvvvdvdv', 1, '2021-09-16 06:09:25', '2021-09-16 06:09:25'),
(47, 32, 121, NULL, '1211', '16317725820.jpg', 'dsssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssss', 1, '2021-09-16 06:09:42', '2021-09-16 06:09:42'),
(48, 32, 121, NULL, 'dddddddddd', '16317725990.jpg', 'ddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddd', 1, '2021-09-16 06:09:59', '2021-09-16 06:09:59');

-- --------------------------------------------------------

--
-- Table structure for table `reading_lists`
--

CREATE TABLE `reading_lists` (
  `id` int(11) NOT NULL,
  `post_id` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `reading_lists`
--

INSERT INTO `reading_lists` (`id`, `post_id`, `user_id`, `created_at`) VALUES
(1, 4, 1, '2018-02-06 06:25:07'),
(8, 5, 3, '2018-02-15 09:58:54'),
(23, 2, 1, '2018-02-28 11:23:09'),
(44, 2, 2, '2018-03-23 04:26:51'),
(53, 7, 2, '2018-03-23 04:58:45'),
(54, 5, 2, '2018-03-23 04:59:05'),
(64, 9, 2, '2018-03-23 09:54:31');

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `id` int(11) NOT NULL,
  `site_title` varchar(255) DEFAULT NULL,
  `site_description` varchar(500) DEFAULT NULL,
  `application_name` varchar(255) DEFAULT NULL,
  `site_color` varchar(100) DEFAULT 'default',
  `site_lang` varchar(100) DEFAULT 'english',
  `show_hits` int(11) DEFAULT '1',
  `show_rss` int(11) DEFAULT '1',
  `show_newsticker` int(11) DEFAULT '1',
  `pagination_per_page` int(11) DEFAULT '10',
  `whatsapp_number` varchar(255) NOT NULL DEFAULT '+91000000000',
  `whatsapp_text` varchar(255) NOT NULL DEFAULT 'hi',
  `facebook_url` varchar(500) DEFAULT NULL,
  `twitter_url` varchar(500) DEFAULT NULL,
  `google_url` varchar(500) DEFAULT NULL,
  `instagram_url` varchar(500) DEFAULT NULL,
  `pinterest_url` varchar(500) DEFAULT NULL,
  `linkedin_url` varchar(500) DEFAULT NULL,
  `vk_url` varchar(500) DEFAULT NULL,
  `youtube_url` varchar(500) DEFAULT NULL,
  `optional_url_button_name` varchar(500) DEFAULT 'Click',
  `about_footer` varchar(1000) DEFAULT NULL,
  `google_analytics` text,
  `primary_font` varchar(255) DEFAULT NULL,
  `secondary_font` varchar(255) DEFAULT NULL,
  `tertiary_font` varchar(255) DEFAULT NULL,
  `contact_text` text,
  `contact_address` varchar(500) DEFAULT NULL,
  `contact_email` varchar(255) DEFAULT NULL,
  `contact_phone` varchar(255) DEFAULT NULL,
  `map_api_key` varchar(500) DEFAULT NULL,
  `latitude` varchar(255) DEFAULT NULL,
  `longitude` varchar(255) DEFAULT NULL,
  `mail_protocol` varchar(100) DEFAULT 'smtp',
  `mail_host` varchar(255) DEFAULT NULL,
  `mail_port` varchar(255) DEFAULT '587',
  `mail_username` varchar(255) DEFAULT NULL,
  `mail_password` varchar(255) DEFAULT NULL,
  `mail_title` varchar(255) DEFAULT NULL,
  `facebook_app_id` varchar(500) DEFAULT NULL,
  `facebook_app_secret` varchar(500) DEFAULT NULL,
  `google_app_name` varchar(500) DEFAULT NULL,
  `google_client_id` varchar(500) DEFAULT NULL,
  `google_client_secret` varchar(500) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `site_title`, `site_description`, `application_name`, `site_color`, `site_lang`, `show_hits`, `show_rss`, `show_newsticker`, `pagination_per_page`, `whatsapp_number`, `whatsapp_text`, `facebook_url`, `twitter_url`, `google_url`, `instagram_url`, `pinterest_url`, `linkedin_url`, `vk_url`, `youtube_url`, `optional_url_button_name`, `about_footer`, `google_analytics`, `primary_font`, `secondary_font`, `tertiary_font`, `contact_text`, `contact_address`, `contact_email`, `contact_phone`, `map_api_key`, `latitude`, `longitude`, `mail_protocol`, `mail_host`, `mail_port`, `mail_username`, `mail_password`, `mail_title`, `facebook_app_id`, `facebook_app_secret`, `google_app_name`, `google_client_id`, `google_client_secret`, `created_at`) VALUES
(1, 'NandLan Pro', 'NandLan Pro', 'NandLan Pro', 'default', NULL, NULL, NULL, NULL, NULL, '+91000000000', 'hi...', 'https://www.facebook.com/', 'https://twitter.com/', 'dsad', 'dasda', 'sadas', 'asda', 'das', 'sad', NULL, 'The purpose of lorem ipsum is to create a natural looking block of text (sentence, paragraph, page, etc.) that doesn\'t distract from the layout. A practice not without controversy, laying out pages with meaningless filler text can be very useful when the focus is meant to be on design, not content.', '', 'open_sans', 'roboto', 'verdana', '', 'sadsad', 'demo@gmail.com', '000000000', '', '', '', 'tls', 'zeroitsolutions.com', '587', 'amank.zeroit@gmail.com', 'amank@123', 'NandLan Pro', '', '', 'Varient', '', '', '2017-07-06 00:11:07');

-- --------------------------------------------------------

--
-- Table structure for table `sms_reports`
--

CREATE TABLE `sms_reports` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL DEFAULT '0',
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `content` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `type` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'sms-default',
  `device_type` varchar(1500) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'mobile_app',
  `phone` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT '0000000000',
  `parent` int(11) NOT NULL DEFAULT '0',
  `sms_status` int(11) NOT NULL DEFAULT '1',
  `pin` int(11) NOT NULL DEFAULT '0',
  `status` int(11) NOT NULL DEFAULT '1',
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `sms_reports`
--

INSERT INTO `sms_reports` (`id`, `user_id`, `name`, `content`, `type`, `device_type`, `phone`, `parent`, `sms_status`, `pin`, `status`, `created`) VALUES
(1, 54, 'sms demo', 'sdcfscscsacs', 'sms-default', '', '0000000000', 1, 1, 0, 1, '2021-07-02 09:59:27'),
(3, 54, 'tttt', 'dsasasf', 'sms-default', 'mobile_app', '000000000', 1, 1, 0, 1, '2021-07-02 17:04:54');

-- --------------------------------------------------------

--
-- Table structure for table `tags`
--

CREATE TABLE `tags` (
  `id` int(11) NOT NULL,
  `post_id` int(11) DEFAULT NULL,
  `tag` varchar(255) DEFAULT NULL,
  `tag_slug` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tags`
--

INSERT INTO `tags` (`id`, `post_id`, `tag`, `tag_slug`, `created_at`) VALUES
(1, 1, 'fitness', 'fitness', '2017-12-11 06:47:50'),
(2, 1, 'health', 'health', '2017-12-11 06:47:50'),
(3, 1, 'weight loss', 'weight-loss', '2017-12-11 06:47:50'),
(6, 2, 'stress-free', 'stress-free', '2017-12-11 07:20:04'),
(7, 2, 'yoga', 'yoga', '2017-12-11 07:20:05'),
(8, 4, 'fitness', 'fitness', '2017-12-11 10:41:32'),
(9, 4, 'health', 'health', '2017-12-11 10:41:32');

-- --------------------------------------------------------

--
-- Table structure for table `testdata`
--

CREATE TABLE `testdata` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `content` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status` varchar(20) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `testdata`
--

INSERT INTO `testdata` (`id`, `name`, `content`, `status`) VALUES
(1, 'asdsad heals', 'asda Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a', ''),
(2, 'demo heals', 'sssss Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a', ''),
(3, 'demo heals', 'sssss Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a', ''),
(4, 'demo heals', 'sssss Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a', ''),
(5, 'demo heals', 'sssss Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a', '');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(255) DEFAULT NULL,
  `slug` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT 'name@domain.com',
  `password` varchar(255) DEFAULT NULL,
  `role` varchar(100) DEFAULT 'user',
  `user_type` varchar(100) DEFAULT 'registered',
  `google_id` varchar(255) DEFAULT NULL,
  `facebook_id` varchar(255) DEFAULT NULL,
  `avatar` varchar(255) DEFAULT NULL,
  `about_me` varchar(5000) DEFAULT NULL,
  `facebook_url` varchar(500) DEFAULT NULL,
  `twitter_url` varchar(500) DEFAULT NULL,
  `google_url` varchar(500) DEFAULT NULL,
  `instagram_url` varchar(500) DEFAULT NULL,
  `pinterest_url` varchar(500) DEFAULT NULL,
  `linkedin_url` varchar(500) DEFAULT NULL,
  `vk_url` varchar(500) DEFAULT NULL,
  `youtube_url` varchar(500) DEFAULT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL DEFAULT '0000000000',
  `country` varchar(255) NOT NULL,
  `gender` varchar(255) NOT NULL DEFAULT 'male',
  `birthday` varchar(255) NOT NULL DEFAULT '0/0/0',
  `id_no` int(100) NOT NULL DEFAULT '0',
  `login_is` int(11) NOT NULL DEFAULT '0',
  `agree_policy` int(11) NOT NULL DEFAULT '0',
  `time_temp` varchar(255) NOT NULL DEFAULT '0',
  `time_tempdura` varchar(255) NOT NULL DEFAULT '0',
  `membership_status` int(11) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `status` int(11) NOT NULL DEFAULT '1',
  `monthly_price` int(11) DEFAULT NULL,
  `payment_method` varchar(100) DEFAULT NULL,
  `payment_currency` varchar(100) DEFAULT NULL,
  `contractor_id` int(11) DEFAULT NULL,
  `projects_allowed` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `slug`, `email`, `password`, `role`, `user_type`, `google_id`, `facebook_id`, `avatar`, `about_me`, `facebook_url`, `twitter_url`, `google_url`, `instagram_url`, `pinterest_url`, `linkedin_url`, `vk_url`, `youtube_url`, `first_name`, `last_name`, `address`, `phone`, `country`, `gender`, `birthday`, `id_no`, `login_is`, `agree_policy`, `time_temp`, `time_tempdura`, `membership_status`, `created_at`, `status`, `monthly_price`, `payment_method`, `payment_currency`, `contractor_id`, `projects_allowed`) VALUES
(1, 'admin', 'admin-6087e9823443ef', 'admin@admin.com', '$2a$08$W4jM5kvOfZySyxUFSkDqnu9JJES2tCXMFqm0/2boJYxxFdkv1wIfi', 'admin', 'registered', NULL, NULL, 'uploads/profile/1629187465.jpg', 'jgfjhg', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'admin', '', 'sdsdfa', '123456', '', 'male', '', 0, 0, 0, '1635401622', '1651488110', 0, '2017-11-22 20:03:46', 1, NULL, NULL, NULL, NULL, NULL),
(87, NULL, 'rishi-611ba5ffd3e1b', 'rishi.zeroit@gmail.com', '$2a$08$QZ6b523fcXoUL7dG5DEfjeWWEQjWs1uPo6ZPy.8F8P9xZx5FTxAc6', 'contractor', 'registered', NULL, NULL, 'uploads/profile/1631767407.jpg', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'rishi', 'kumar', '123.mohali', '1234', '', 'male', '0/0/0', 0, 0, 0, '1632666778', '1632667123', 0, '2021-08-17 12:05:19', 1, 50, 'paypal', 'USD', NULL, 10),
(88, NULL, 'devinder-611ba74d3ea6f', 'devinder.zeroit@gmail.com', '$2a$08$le6DEzcdFaXWCMfgB1ojCuXvl59I7S7VkG2./LguK.LL6kgFbdVSu', 'worker', 'registered', NULL, NULL, 'uploads/profile/1629187465.jpg', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'devinder', 'singh', '123,chandigarh', '123', '', 'male', '0/0/0', 0, 1, 0, '1651488124', '1651488124', 0, '2021-08-17 12:10:53', 1, NULL, NULL, NULL, 87, NULL),
(89, NULL, 'aman-611ba93489fc7', 'amans.zeroit@gmail.com', '$2a$08$CebxG3/QkJlXBO2FNWjuHeclgyghOoTWmXR08iAt3k9QXS31f.xGK', 'client', 'registered', NULL, NULL, 'uploads/profile/1629187465.jpg', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'aman', 'singh', '123.panchkula', '12345', '', 'male', '0/0/0', 0, 0, 0, '1632292781', '1632292804', 0, '2021-08-17 12:19:00', 1, NULL, NULL, NULL, 87, NULL),
(90, NULL, 'manish-613ee4fd79a00', 'manish.zeroit@gmail.com', '$2a$08$Aoa.y8bYBSh5cduiYGu6G.TTa5t6zN1CK46sm.am9sfDtKqt9hek2', 'worker', 'registered', NULL, NULL, 'uploads/profile/1631511805.jpg', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'manish', 'kumar', 'daDAS', '6239216867', '', 'male', '0/0/0', 0, 0, 0, '1631511805', '1631511805', 0, '2021-09-13 05:43:25', 1, NULL, NULL, NULL, 87, NULL),
(91, NULL, 'rahul-613ee7f3082ce', 'sharmarahulraman@gmail.com', '$2a$08$i8HN16LurU33VWK.n9JqDuFIH3GKcxF1FmxN9i29nEbSL5dzx0CEa', 'client', 'registered', NULL, NULL, 'uploads/profile/1631512563.jpg', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'rahul', 'kumar', 'slv js vhbksd', '3139216867', '', 'male', '0/0/0', 0, 0, 0, '1631512563', '1631512563', 0, '2021-09-13 05:56:03', 1, NULL, NULL, NULL, 87, NULL),
(92, NULL, 'neha-613ee829db1c3', 'neha.zeroit@gmail.com', '$2a$08$5.9CsmsJCrb3Fm3QJOPiKu.kNF4ofE1j4zMr0JNctwjtiohxNXba6', 'client', 'registered', NULL, NULL, 'uploads/profile/1631512617.jpg', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'neha', 'kumar', 'dfddfsdf', '6239216862', '', 'male', '0/0/0', 0, 0, 0, '1631512617', '1631512617', 0, '2021-09-13 05:56:57', 1, NULL, NULL, NULL, 87, NULL),
(93, NULL, 'gurpreet-613ee88274448', 'gurpreet.zeroit@gmail.com', '$2a$08$NE0tFEW6Ulx6z3k4mVmnzeztanUTXIWCVPzIJ1ybA674S73gg.W4G', 'client', 'registered', NULL, NULL, 'uploads/profile/1631512706.jpg', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'gurpreet', 'Dhiman', 'fAFDSFASD', '6239216810', '', 'male', '0/0/0', 0, 0, 0, '1631512706', '1631512706', 0, '2021-09-13 05:58:26', 1, NULL, NULL, NULL, 87, NULL),
(95, NULL, 'worker-613eeb1656ac8', 'worker@gmail.com', '$2a$08$tHV9W56s6WLOvkzYWDnfVe/GDYMvg6zo4P.e00530WBr1c8LFwADW', 'worker', 'registered', NULL, NULL, 'uploads/profile/1631513366.png', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Worker', 'Worker', ' ghghtg  tyty tytuyu ', '6789234344', '', 'male', '0/0/0', 0, 0, 0, '1631513366', '1631513366', 0, '2021-09-13 06:09:26', 1, NULL, NULL, NULL, 87, NULL),
(110, NULL, 'aman-6142bd4465ee5', 'aman.zeroit@gmail.com', '$2a$08$wM8o0ByWtwL1K4.HYnkkguBFkUiH6o.aHJruALdaz7srjuw/x7zW.', 'client', 'registered', NULL, NULL, 'uploads/profile/1631763780.jpg', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'aman', 'kumar', 'Ashwin Mehta a qualified lawyer today.', '6239216850', '', 'male', '0/0/0', 0, 0, 0, '1631763780', '1631763780', 0, '2021-09-16 03:43:00', 1, NULL, NULL, NULL, 87, NULL),
(111, NULL, 'rishi-6142bda5c5925', 'rishibarwal229@gmail.com', '$2a$08$WKQFbpU/gRhmww5TJXlrGOEo.v9Xg6mK6/4hXgWTSHWJiQ0YI6.Zy', 'client', 'registered', NULL, NULL, 'uploads/profile/1631763877.jpg', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'RISHI', 'kumar', 'fbgfbfbfgbfgb', '6239216880', '', 'male', '0/0/0', 0, 0, 0, '1631763877', '1631763877', 0, '2021-09-16 03:44:37', 1, NULL, NULL, NULL, 87, NULL),
(112, NULL, 'hr-6142be324effb', 'hr@zeroitsolutions.com', '$2a$08$PAhor/tbv27Yllhaz/6lMuoXvxKzXxZAum2kXRvkNWs/SheMU452y', 'client', 'registered', NULL, NULL, 'uploads/profile/1631764018.jpg', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'hr', 'kumar', 'rqewqewqw', '6239216870', '', 'male', '0/0/0', 0, 0, 0, '1631764018', '1631764018', 0, '2021-09-16 03:46:58', 1, NULL, NULL, NULL, 87, NULL),
(113, NULL, 'amansa-6142be7a2a1ac', 'worker1@gmail.com', '$2a$08$SoVPFI2I10tUQnaUJgZEUed87A/z3IcCusowfWRP8tTQYMMG9h7T.', 'worker', 'registered', NULL, NULL, 'uploads/profile/1631764090.jpg', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'amansa', 'kumar', 'feferfrefrefref', '6239216887', '', 'male', '0/0/0', 0, 0, 0, '1631764090', '1631764090', 0, '2021-09-16 03:48:10', 1, NULL, NULL, NULL, 87, NULL),
(114, NULL, 'gurjeet-6142c6167e212', 'gurjeet.zeroit@gmail.com', '$2a$08$niTkUVfTg1LlPig5iS/1veKTyQiKevfJkpIWukTCEUw3tNN/Rw5bu', 'contractor', 'registered', NULL, NULL, 'uploads/profile/1631766038.jpg', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'gurjeet', 'kumar', 'dhdfhghgfhgfhfhfhfghgfhgfh', '6239216832', '', 'male', '0/0/0', 0, 0, 0, '1631766038', '1631766038', 0, '2021-09-16 04:20:38', 1, 1000, 'paypal', 'USD', NULL, 1),
(115, NULL, 'bhupinder-6142c6da58a4d', 'bhupinder.zeroit@gmail.com', '$2a$08$ruoftetIFxRosAzFa/WDJOzdmAOhLhM0RTjht39Bu2ACyGVg/v4M2', 'contractor', 'registered', NULL, NULL, 'uploads/profile/1631766234.jpg', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'bhupinder', 'Dhiman', '', '6239216843', '', 'male', '0/0/0', 0, 0, 0, '1631766234', '1631766234', 0, '2021-09-16 04:23:54', 1, 1000, 'paypal', 'ILS', NULL, 1),
(116, NULL, 'amit-6142cc99ce20f', 'amit.zeroit@gmail.com', '$2a$08$gxjQSkWtYOR/rTBVWcu76.hixCa8puGXss35j81okxjk4SPIVz6mq', 'contractor', 'registered', NULL, NULL, 'uploads/profile/1631767705.jpg', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'amit', 'amit', 'fvfcgfcgjfg', '6239216882', '', 'male', '0/0/0', 0, 0, 0, '1631767731', '1631767908', 0, '2021-09-16 04:48:25', 1, 1000, 'paypal', 'USD', NULL, 2),
(117, NULL, 'sushil-6142cd34951a0', 'sushil.zeroit@gmail.com', '$2a$08$/Iy/I25.rLZwPyb9qkN95uoeend0ICauphn0Ih6fd1akLvt3qcSEK', 'client', 'registered', NULL, NULL, 'uploads/profile/1631767860.jpg', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'sushil', 'Dhiman', 'djbhbdsvdsjvdvdasv', '6239216852', '', 'male', '0/0/0', 0, 1, 0, '1631782501', '1631782501', 0, '2021-09-16 04:51:00', 1, NULL, NULL, NULL, 116, NULL),
(118, NULL, 'rima-6142cf114be55', 'rima.zeroit@gmail.com', '$2a$08$aRcfcuuUQIusYZMU5whdkOPfha599X5reCyaSv2jsmCHG3HtQccoC', 'contractor', 'registered', NULL, NULL, 'uploads/profile/1631768337.jpg', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'rima', 'kumar', 'fsfsdfdsafdsaf', '6239216824', '', 'male', '0/0/0', 0, 0, 0, '1631768356', '1631768909', 0, '2021-09-16 04:58:57', 1, 1000, 'paypal', 'USD', NULL, 5),
(120, NULL, 'dushant-6142d13313e36', 'dushant.zeroit@gmail.com', '$2a$08$hTLt5WLd.3AvBjeC0kHSNuhl3tWVHUflU7NdZXIyGi22ZFhidCfuG', 'client', 'registered', NULL, NULL, 'uploads/profile/1631768883.jpg', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'dushant', 'kumar', 'DFFFD', '6239216321', '', 'male', '0/0/0', 0, 0, 0, '1631768917', '1631768971', 0, '2021-09-16 05:08:03', 1, NULL, NULL, NULL, 118, NULL),
(121, NULL, 'karan-6142d34c3ad39', 'karan.zeroit@gmail.com', '$2a$08$P1k44BYZ04mjO9BHXeZkoeG6GODFcUrhwgLUJfdsEHy/tQsuIledO', 'contractor', 'registered', NULL, NULL, 'uploads/profile/1631769420.jpg', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'karan', 'kumar', 'gfdgfdgfdgfgdfghngfbgfb', '6239216442', '', 'male', '0/0/0', 0, 0, 0, '1632143514', '1632143543', 0, '2021-09-16 05:17:00', 1, 1000, 'credit_card', 'USD', NULL, 10),
(122, NULL, 'rashmi-6142d5051b866', 'rashmi.zeroit@gmail.com', '$2a$08$kPXJ/mV6.rnwXZcVr98nFes0bV.SrX5SF.E.drmM4Sose9pzIeE9m', 'client', 'registered', NULL, NULL, 'uploads/profile/1631769861.jpg', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'rashmi', 'kumar', 'ghgfhgfhgfhgfhggfhgfhgf', '6239216789', '', 'male', '0/0/0', 0, 1, 0, '1631770268', '1631770268', 0, '2021-09-16 05:24:21', 1, NULL, NULL, NULL, 121, NULL),
(123, NULL, 'gurmeet-6142d664422b4', 'gurmeet.zeroit@gmail.com', '$2a$08$Po8HU0ZWS355adHDZN2VoOmnTUbuFCPqzyLmTjvyUGct8O2nKbzQS', 'worker', 'registered', NULL, NULL, 'uploads/profile/1631770212.jpg', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'gurmeet', 'Dhiman', 'ewfwfwf', '6239216342', '', 'male', '0/0/0', 0, 0, 0, '1632118207', '1632118255', 0, '2021-09-16 05:30:12', 1, NULL, NULL, NULL, 121, NULL),
(124, NULL, 'karanmehra-6142dd7c969e2', 'karanmehra.zeroit@gmail.com', '$2a$08$kpKIGG1iy9M96Ntmpu0iWOd2vD/kBUrtFjMKorL7dzM4Bo3yIEiaC', 'worker', 'registered', NULL, NULL, 'uploads/profile/1631772028.jpeg', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'karanmehra', 'kumar', '', '6239216822', '', 'male', '0/0/0', 0, 0, 0, '1631772028', '1631772028', 0, '2021-09-16 06:00:28', 1, NULL, NULL, NULL, 121, NULL),
(125, NULL, 'rahul-6142ddb376456', 'rahulv.zeroit@gmail.com', '$2a$08$cYUzI2lN6U1Wo8w2vNuO5uXJPGKjGisulMTaOKkk6N5ZY0KjR230y', 'worker', 'registered', NULL, NULL, 'uploads/profile/1631772083.jpg', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'rahul', 'verma', 'fwefferf', '6239216802', '', 'male', '0/0/0', 0, 0, 0, '1631772083', '1631772083', 0, '2021-09-16 06:01:23', 1, NULL, NULL, NULL, 121, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `visual_settings`
--

CREATE TABLE `visual_settings` (
  `id` int(11) NOT NULL,
  `post_list_style` varchar(100) NOT NULL DEFAULT 'vertical',
  `site_color` varchar(100) NOT NULL DEFAULT 'default',
  `site_block_color` varchar(255) DEFAULT NULL,
  `logo` varchar(255) DEFAULT NULL,
  `logo_footer` varchar(255) DEFAULT NULL,
  `favicon` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `visual_settings`
--

INSERT INTO `visual_settings` (`id`, `post_list_style`, `site_color`, `site_block_color`, `logo`, `logo_footer`, `favicon`) VALUES
(1, '', '', NULL, 'uploads/logo/logo_60eeda2818b9a.png', 'uploads/logo/logo_60e6f07a232b9.png', 'uploads/logo/favicon_6088014a4ceec.ico');

-- --------------------------------------------------------

--
-- Table structure for table `widgets`
--

CREATE TABLE `widgets` (
  `id` int(11) NOT NULL,
  `title` varchar(500) DEFAULT NULL,
  `content` text,
  `type` varchar(100) DEFAULT NULL,
  `widget_order` int(11) DEFAULT '1',
  `visibility` int(11) DEFAULT '1',
  `is_custom` int(11) DEFAULT '1',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `widgets`
--

INSERT INTO `widgets` (`id`, `title`, `content`, `type`, `widget_order`, `visibility`, `is_custom`, `created_at`) VALUES
(1, 'Popular Posts', '', 'popular-posts', 1, 1, 0, '2017-11-22 21:00:15'),
(2, 'Recommended Posts', '', 'recommended-posts', 2, 1, 0, '2017-11-22 21:02:00'),
(3, 'Random Posts', '', 'random-slider-posts', 3, 1, 0, '2017-11-22 21:03:02'),
(4, 'Featured Video', '', 'featured-video', 4, 1, 0, '2017-11-22 21:03:47'),
(5, 'Tags', '', 'tags', 5, 1, 0, '2017-11-22 21:04:29'),
(6, 'Voting Poll', '', 'poll', 6, 1, 0, '2017-11-22 21:05:24');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `ads`
--
ALTER TABLE `ads`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `apartments`
--
ALTER TABLE `apartments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `project_id` (`project_id`);

--
-- Indexes for table `apartment_files`
--
ALTER TABLE `apartment_files`
  ADD UNIQUE KEY `id` (`id`),
  ADD KEY `apartment_id` (`apartment_id`);

--
-- Indexes for table `apartment_payments`
--
ALTER TABLE `apartment_payments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `apartment_payments_ibfk_1` (`apartment_id`);

--
-- Indexes for table `apartment_reports`
--
ALTER TABLE `apartment_reports`
  ADD PRIMARY KEY (`id`),
  ADD KEY `apartment_id` (`apartment_id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `comment_likes`
--
ALTER TABLE `comment_likes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contacts`
--
ALTER TABLE `contacts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `files`
--
ALTER TABLE `files`
  ADD PRIMARY KEY (`id`),
  ADD KEY `apartment_id` (`apartment_id`),
  ADD KEY `project_id` (`project_id`);

--
-- Indexes for table `finance`
--
ALTER TABLE `finance`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `gallery`
--
ALTER TABLE `gallery`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `gallery_categories`
--
ALTER TABLE `gallery_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `invoices`
--
ALTER TABLE `invoices`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `login_data`
--
ALTER TABLE `login_data`
  ADD PRIMARY KEY (`login_data_id`);

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `newsletters`
--
ALTER TABLE `newsletters`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pages`
--
ALTER TABLE `pages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `permission`
--
ALTER TABLE `permission`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `poll_votes`
--
ALTER TABLE `poll_votes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `post_images`
--
ALTER TABLE `post_images`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `projects`
--
ALTER TABLE `projects`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `projects_assign`
--
ALTER TABLE `projects_assign`
  ADD PRIMARY KEY (`id`),
  ADD KEY `project_id` (`project_id`);

--
-- Indexes for table `project_reports`
--
ALTER TABLE `project_reports`
  ADD PRIMARY KEY (`id`),
  ADD KEY `project_id` (`project_id`);

--
-- Indexes for table `reading_lists`
--
ALTER TABLE `reading_lists`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sms_reports`
--
ALTER TABLE `sms_reports`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tags`
--
ALTER TABLE `tags`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `testdata`
--
ALTER TABLE `testdata`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `visual_settings`
--
ALTER TABLE `visual_settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `widgets`
--
ALTER TABLE `widgets`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `ads`
--
ALTER TABLE `ads`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `apartments`
--
ALTER TABLE `apartments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `apartment_files`
--
ALTER TABLE `apartment_files`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `apartment_payments`
--
ALTER TABLE `apartment_payments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `apartment_reports`
--
ALTER TABLE `apartment_reports`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=65;

--
-- AUTO_INCREMENT for table `comment_likes`
--
ALTER TABLE `comment_likes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `contacts`
--
ALTER TABLE `contacts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `files`
--
ALTER TABLE `files`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `finance`
--
ALTER TABLE `finance`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `gallery`
--
ALTER TABLE `gallery`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `gallery_categories`
--
ALTER TABLE `gallery_categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `invoices`
--
ALTER TABLE `invoices`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `login_data`
--
ALTER TABLE `login_data`
  MODIFY `login_data_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=157;

--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=144;

--
-- AUTO_INCREMENT for table `newsletters`
--
ALTER TABLE `newsletters`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pages`
--
ALTER TABLE `pages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `permission`
--
ALTER TABLE `permission`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=553;

--
-- AUTO_INCREMENT for table `poll_votes`
--
ALTER TABLE `poll_votes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `post_images`
--
ALTER TABLE `post_images`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `projects`
--
ALTER TABLE `projects`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `projects_assign`
--
ALTER TABLE `projects_assign`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `project_reports`
--
ALTER TABLE `project_reports`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT for table `reading_lists`
--
ALTER TABLE `reading_lists`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=65;

--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `sms_reports`
--
ALTER TABLE `sms_reports`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tags`
--
ALTER TABLE `tags`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `testdata`
--
ALTER TABLE `testdata`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=126;

--
-- AUTO_INCREMENT for table `visual_settings`
--
ALTER TABLE `visual_settings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `widgets`
--
ALTER TABLE `widgets`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `apartments`
--
ALTER TABLE `apartments`
  ADD CONSTRAINT `apartments_ibfk_1` FOREIGN KEY (`project_id`) REFERENCES `projects` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `apartment_files`
--
ALTER TABLE `apartment_files`
  ADD CONSTRAINT `apartment_files_ibfk_1` FOREIGN KEY (`apartment_id`) REFERENCES `apartments` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `apartment_payments`
--
ALTER TABLE `apartment_payments`
  ADD CONSTRAINT `apartment_payments_ibfk_1` FOREIGN KEY (`apartment_id`) REFERENCES `apartments` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `apartment_reports`
--
ALTER TABLE `apartment_reports`
  ADD CONSTRAINT `apartment_reports_ibfk_1` FOREIGN KEY (`apartment_id`) REFERENCES `apartments` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `files`
--
ALTER TABLE `files`
  ADD CONSTRAINT `files_ibfk_1` FOREIGN KEY (`apartment_id`) REFERENCES `apartments` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `files_ibfk_2` FOREIGN KEY (`project_id`) REFERENCES `projects` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `finance`
--
ALTER TABLE `finance`
  ADD CONSTRAINT `finance_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `projects_assign`
--
ALTER TABLE `projects_assign`
  ADD CONSTRAINT `projects_assign_ibfk_1` FOREIGN KEY (`project_id`) REFERENCES `projects` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `project_reports`
--
ALTER TABLE `project_reports`
  ADD CONSTRAINT `project_reports_ibfk_1` FOREIGN KEY (`project_id`) REFERENCES `projects` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
