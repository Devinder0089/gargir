-- phpMyAdmin SQL Dump
-- version 4.9.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jul 21, 2021 at 07:31 AM
-- Server version: 5.7.23-23
-- PHP Version: 7.3.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `zeroidei_nandlanPro`
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
-- Table structure for table `agreement`
--

CREATE TABLE `agreement` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL DEFAULT '0',
  `client_id` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT '0',
  `property_id` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT '0',
  `months_of_rent` int(11) NOT NULL DEFAULT '0',
  `percent` int(11) NOT NULL DEFAULT '0',
  `rent` int(11) NOT NULL DEFAULT '0',
  `buy` int(11) NOT NULL DEFAULT '0',
  `sale` int(11) NOT NULL DEFAULT '0',
  `asking_price` int(11) NOT NULL DEFAULT '0',
  `requested_rent` int(11) NOT NULL DEFAULT '0',
  `comments` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `type` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'stamp_in',
  `exclusivity` int(11) NOT NULL DEFAULT '0',
  `from_date` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `untill` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT '0000-00-00',
  `commission_type` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `another_summ` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `sent_mail` int(11) NOT NULL DEFAULT '0',
  `pin` int(11) NOT NULL DEFAULT '1',
  `status` int(11) NOT NULL DEFAULT '1',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `agreement`
--

INSERT INTO `agreement` (`id`, `user_id`, `client_id`, `property_id`, `months_of_rent`, `percent`, `rent`, `buy`, `sale`, `asking_price`, `requested_rent`, `comments`, `type`, `exclusivity`, `from_date`, `untill`, `commission_type`, `another_summ`, `sent_mail`, `pin`, `status`, `created_at`, `updated_at`) VALUES
(2, 1, '59', '9', 1, 1, 1, 1, 0, 10000, 60000, '0', 'stamp_in', 0, '', '0000-00-00', '0', '0', 0, 1, 1, '2021-07-16 15:16:04', '2021-07-16 15:16:04');

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
-- Table structure for table `customer_agreements`
--

CREATE TABLE `customer_agreements` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `client_id` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `property_id` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `rent` int(11) DEFAULT NULL,
  `months_of_rent` int(11) DEFAULT NULL,
  `buy` int(11) DEFAULT NULL,
  `sale` int(11) DEFAULT NULL,
  `percent` int(11) DEFAULT NULL,
  `asking_price` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `requested_rent` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `comments` text COLLATE utf8_unicode_ci,
  `type` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `exclusivity` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `from_date` date DEFAULT NULL,
  `untill` date DEFAULT NULL,
  `commission_type` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `another_summ` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `status` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `customer_agreements`
--

INSERT INTO `customer_agreements` (`id`, `user_id`, `client_id`, `property_id`, `rent`, `months_of_rent`, `buy`, `sale`, `percent`, `asking_price`, `requested_rent`, `comments`, `type`, `exclusivity`, `from_date`, `untill`, `commission_type`, `another_summ`, `status`, `created_at`, `updated_at`) VALUES
(159, 62, '45', '7', 0, 0, 1, NULL, 1, '25000', NULL, NULL, 'stamp_in', NULL, NULL, NULL, NULL, NULL, 1, '2021-07-08 12:05:13', '2021-07-08 12:05:13'),
(160, 62, '45', '8', 0, 0, NULL, 1, 1, '35000', NULL, NULL, 'stamp_owner', '7', '0000-00-00', '0000-00-00', NULL, NULL, 1, '2021-07-08 12:10:44', '2021-07-08 12:10:44'),
(161, 62, '45', '8', 0, 0, NULL, 1, 1, '35000', NULL, NULL, 'exclusive', '7', '0000-00-00', '0000-00-00', NULL, NULL, 1, '2021-07-08 12:10:44', '2021-07-08 12:10:44'),
(162, 62, '45', '7', 1, 1, 1, NULL, 1, '25000', '10', NULL, 'stamp_in', NULL, NULL, NULL, NULL, NULL, 1, '2021-07-14 08:23:24', '2021-07-14 08:23:24');

-- --------------------------------------------------------

--
-- Table structure for table `customer_clients`
--

CREATE TABLE `customer_clients` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `phone` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `address` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `status` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `customer_clients`
--

INSERT INTO `customer_clients` (`id`, `user_id`, `name`, `phone`, `email`, `address`, `status`, `created_at`, `updated_at`) VALUES
(45, 62, 'rishi', '', 'rishi.zeroit@gmail.com', NULL, 1, '2021-07-08 12:03:01', '2021-07-08 12:03:01');

-- --------------------------------------------------------

--
-- Table structure for table `customer_property`
--

CREATE TABLE `customer_property` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `street` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `house_no` varchar(30) COLLATE utf8_unicode_ci DEFAULT NULL,
  `buil_number` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `apart_number` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `city` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `prop_type` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `name_of_prop_owner` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `floor` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `no_of_rooms` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `details` text COLLATE utf8_unicode_ci,
  `rental_price` int(11) DEFAULT NULL,
  `ask_sale_price` int(11) DEFAULT NULL,
  `status` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `customer_property`
--

INSERT INTO `customer_property` (`id`, `user_id`, `street`, `house_no`, `buil_number`, `apart_number`, `city`, `prop_type`, `name_of_prop_owner`, `floor`, `no_of_rooms`, `details`, `rental_price`, `ask_sale_price`, `status`, `created_at`, `updated_at`) VALUES
(7, 62, 'HNO 146 VILLAGE JAMANPUR PO SELAQUI TEH VIKASNAGAR Dehradun', NULL, '12', '2', 'Dehradun', 'single owner', 'manish kumar', NULL, NULL, NULL, 0, 25000, 1, '2021-07-08 12:03:53', '2021-07-08 12:03:53'),
(8, 62, 'Village Kothi PO kharihar thare teh ladbhoral', NULL, '12', '2', 'MANDI', 'single owner', 'sakeena devi', NULL, NULL, NULL, 0, 25000, 1, '2021-07-08 12:10:15', '2021-07-08 12:10:15');

-- --------------------------------------------------------

--
-- Table structure for table `customer_signed_agreements`
--

CREATE TABLE `customer_signed_agreements` (
  `id` int(11) NOT NULL,
  `agreement_id` int(11) NOT NULL,
  `client_id` int(11) NOT NULL,
  `fname` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `id_no` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `private_address` text COLLATE utf8_unicode_ci NOT NULL,
  `signature` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `status` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `customer_signed_agreements`
--

INSERT INTO `customer_signed_agreements` (`id`, `agreement_id`, `client_id`, `fname`, `id_no`, `private_address`, `signature`, `status`, `created_at`, `updated_at`) VALUES
(31, 2, 59, 'sss', '6565', 'dsasa', '/uploads/signature/1626450361_image.png', 0, '2021-07-16 15:46:01', '2021-07-16 15:46:01');

-- --------------------------------------------------------

--
-- Table structure for table `deleted_agreements`
--

CREATE TABLE `deleted_agreements` (
  `id` int(11) NOT NULL,
  `agreement_id` int(11) NOT NULL,
  `client_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `finance`
--

CREATE TABLE `finance` (
  `id` int(11) NOT NULL,
  `payment_id` int(11) DEFAULT '0',
  `user_id` int(11) DEFAULT '0',
  `membership_id` int(11) NOT NULL DEFAULT '0',
  `pin` int(11) DEFAULT '1',
  `time_temp` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT '1624532016',
  `status` int(11) NOT NULL DEFAULT '1',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `finance`
--

INSERT INTO `finance` (`id`, `payment_id`, `user_id`, `membership_id`, `pin`, `time_temp`, `status`, `created_at`) VALUES
(1, 1, 56, 3, 1, '1624532016', 1, '2021-06-24 10:52:08');

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
-- Table structure for table `membership`
--

CREATE TABLE `membership` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'member',
  `type` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'free',
  `content` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `validity_option` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'days',
  `plan_validity` int(11) NOT NULL DEFAULT '0',
  `price` int(100) NOT NULL DEFAULT '0',
  `currency` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'USD',
  `membership_service` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT '0',
  `discount` int(100) NOT NULL DEFAULT '0',
  `pin` int(11) NOT NULL DEFAULT '1',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `status` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `membership`
--

INSERT INTO `membership` (`id`, `name`, `slug`, `type`, `content`, `validity_option`, `plan_validity`, `price`, `currency`, `membership_service`, `discount`, `pin`, `created_at`, `status`) VALUES
(3, 'Lifetime Full office - 5000 ILS', 'lifetime-full-office-5000-ils', 'premium', 'hi', 'full', 2, 5000, 'USD', '7,6,5,4,3,2,1', 50, 1, '2021-06-22 12:41:27', 1),
(5, 'Monthly full office - 160 ILS', 'monthly-full-office-160-ils', 'basic', 'HWWEW', 'month', 4, 160, 'USD', '6,5,4,3,2,1', 10, 1, '2021-06-22 10:28:14', 1),
(8, 'testssasdasd', 'testssasdasd', 'basic', 'd cd ', 'month', 1, 0, 'USD', '7,6,5,4,3,1', 0, 1, '2021-07-07 12:33:36', 1);

-- --------------------------------------------------------

--
-- Table structure for table `membership_service`
--

CREATE TABLE `membership_service` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'Create | edit | View Invoice',
  `slug` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `type` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'package',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `status` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `membership_service`
--

INSERT INTO `membership_service` (`id`, `name`, `slug`, `type`, `created_at`, `status`) VALUES
(1, 'create | edit | view invoice', '', 'package', '2021-06-11 06:06:56', 1),
(2, 'invoce run number decided by client', '', 'package', '2021-06-11 06:08:35', 1),
(3, 'receipts', '', 'package', '2021-06-11 06:08:35', 1),
(4, 'full invoce generation process', '', 'package', '2021-06-11 06:10:26', 1),
(5, 'unlimited documents', '', 'package', '2021-06-11 06:10:26', 1),
(6, 'delete', 'delete', 'package', '2021-06-11 14:02:43', 1),
(7, 'Create', 'create', 'package', '2021-06-22 10:30:17', 1);

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT '0',
  `name` varchar(255) NOT NULL,
  `content` varchar(255) NOT NULL,
  `type` varchar(255) NOT NULL DEFAULT 'sendmsg',
  `file` varchar(255) NOT NULL,
  `parent_id` int(11) NOT NULL DEFAULT '0',
  `pin` int(11) NOT NULL DEFAULT '1',
  `send_email` varchar(255) NOT NULL,
  `send_mail` int(11) NOT NULL DEFAULT '0',
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `status` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `messages`
--

INSERT INTO `messages` (`id`, `user_id`, `name`, `content`, `type`, `file`, `parent_id`, `pin`, `send_email`, `send_mail`, `created`, `status`) VALUES
(2, 52, 'test', 'sdffa', 'sendmsg', '', 53, 1, '', 0, '2021-05-12 07:58:58', 1),
(3, 52, 'testtttt', 'sffafa', 'sendmsg', '', 1, 0, '', 0, '2021-05-12 07:59:53', 1),
(7, 1, 'fdgfdsg', 'gfhfdgh', 'sendmsg', '', 53, 1, '', 0, '2021-05-12 12:04:55', 1),
(8, 1, 'na', 'nnannananna', 'sendmsg', '', 52, 1, '', 0, '2021-07-07 13:02:30', 1),
(9, 1, 'demo', 'demo', 'sendmsg', '', 57, 1, '', 0, '2021-07-07 13:18:02', 1),
(10, 1, 'demo123', 'demo123', 'sendmsg', 'uploads/message/1625664188photo2.jpg', 57, 1, '', 0, '2021-07-07 13:23:08', 1),
(11, 1, 'demo', 'demo123', 'sendmsg', 'uploads/message/1625664864photo2.jpg', 58, 1, '', 0, '2021-07-07 13:34:24', 1),
(21, 1, 'hellewtest', 'SDFCSDFA', 'sendmsg', 'uploads/message/1625731981-473Wx593H-441050767-red-MODEL.jpg', 59, 1, '', 1, '2021-07-08 08:13:01', 1);

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
-- Table structure for table `payments`
--

CREATE TABLE `payments` (
  `id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT '0',
  `type` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'paypal',
  `txn_id` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `payment_gross` float(10,2) NOT NULL,
  `currency_code` varchar(5) COLLATE utf8_unicode_ci NOT NULL,
  `payer_name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `payer_email` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `payment_status` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status` int(11) NOT NULL DEFAULT '1',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `payments`
--

INSERT INTO `payments` (`id`, `product_id`, `user_id`, `type`, `txn_id`, `payment_gross`, `currency_code`, `payer_name`, `payer_email`, `payment_status`, `status`, `created_at`) VALUES
(1, 3, 56, 'paypal', 'DS5456zxXXDAB', 10.00, 'USD', 'testcustomer', 'testcustomer@gmail.com', 'success', 1, '2021-06-24 06:50:45');

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
(86, 63, 1, 'membership_show', '1', 0, '2021-07-12 08:08:49'),
(87, 63, 1, 'support_tickets_show', '0', 0, '2021-07-12 08:08:49'),
(88, 63, 1, 'book_deals_show', '0', 0, '2021-07-12 08:08:49'),
(89, 63, 1, 'agreements_show', '0', 0, '2021-07-12 08:08:49'),
(90, 63, 1, 'permission_show', '0', 0, '2021-07-12 08:08:49'),
(91, 63, 1, 'sms_report_show', '1', 0, '2021-07-12 08:08:49'),
(92, 63, 1, 'finance_show', '0', 0, '2021-07-12 08:08:49'),
(93, 63, 1, 'file_history_show', '1', 0, '2021-07-12 08:08:49'),
(94, 63, 1, 'customer_show', '1', 0, '2021-07-12 08:08:49'),
(95, 63, 1, 'customer_create', '1', 0, '2021-07-12 08:08:49'),
(96, 63, 1, 'customer_password', '0', 0, '2021-07-12 08:08:49'),
(97, 63, 1, 'customer_view', '1', 0, '2021-07-12 08:08:49'),
(98, 63, 1, 'customer_edit', '1', 0, '2021-07-12 08:08:49'),
(99, 63, 1, 'customer_delete', '1', 0, '2021-07-12 08:08:49'),
(100, 63, 1, 'customer_role', '1', 0, '2021-07-12 08:08:49'),
(101, 63, 1, 'customer_ban', '1', 0, '2021-07-12 08:08:49'),
(102, 63, 1, 'worker_show', '1', 0, '2021-07-12 08:08:49'),
(103, 63, 1, 'worker_create', '1', 0, '2021-07-12 08:08:49'),
(104, 63, 1, 'worker_delete', '1', 0, '2021-07-12 08:08:49'),
(105, 63, 1, 'worker_password', '0', 0, '2021-07-12 08:08:49'),
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
(118, 63, 1, 'invoice_show', '1', 0, '2021-07-12 08:08:49'),
(119, 63, 1, 'invoice_create', '1', 0, '2021-07-12 08:08:49'),
(120, 63, 1, 'invoice_delete', '1', 0, '2021-07-12 08:08:49'),
(121, 63, 1, 'invoice_send_mail', '1', 0, '2021-07-12 08:08:49'),
(122, 63, 1, 'invoice_view', '1', 0, '2021-07-12 08:08:49'),
(123, 63, 1, 'property_show', '1', 0, '2021-07-12 08:08:49'),
(124, 63, 1, 'property_create', '1', 0, '2021-07-12 08:08:49'),
(125, 63, 1, 'property_delete', '1', 0, '2021-07-12 08:08:49'),
(126, 63, 1, 'property_view', '1', 0, '2021-07-12 08:08:49'),
(127, 63, 1, 'property_edit', '1', 0, '2021-07-12 08:08:49'),
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
(365, 69, 1, 'revenue_overview_show', '1', 0, '2021-07-14 08:41:14'),
(366, 69, 1, 'project_show', '1', 0, '2021-07-14 08:41:14'),
(367, 69, 1, 'client_show', '1', 0, '2021-07-14 08:41:14'),
(368, 69, 1, 'calendar_management_show', '0', 0, '2021-07-14 08:41:14'),
(369, 69, 1, 'permission_show', '0', 0, '2021-07-14 08:41:14'),
(370, 69, 1, 'permission_add', '0', 0, '2021-07-14 08:41:14'),
(371, 69, 1, 'permission_delete', '0', 0, '2021-07-14 08:41:14'),
(372, 69, 1, 'permission_view', '0', 0, '2021-07-14 08:41:14'),
(373, 69, 1, 'permission_edit', '0', 0, '2021-07-14 08:41:14'),
(374, 69, 1, 'stamping_property_owner_show', '0', 0, '2021-07-14 08:41:14'),
(375, 69, 1, 'stamping_show', '0', 0, '2021-07-14 08:41:14'),
(376, 69, 1, 'collaborators_show', '0', 0, '2021-07-14 08:41:14'),
(377, 69, 1, 'membership_show', '0', 0, '2021-07-14 08:41:14'),
(378, 69, 1, 'support_tickets_show', '0', 0, '2021-07-14 08:41:14'),
(379, 69, 1, 'book_deals_show', '0', 0, '2021-07-14 08:41:14'),
(380, 69, 1, 'agreements_show', '1', 0, '2021-07-14 08:41:14'),
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
(393, 69, 1, 'worker_create', '0', 0, '2021-07-14 08:41:14'),
(394, 69, 1, 'worker_delete', '0', 0, '2021-07-14 08:41:14'),
(395, 69, 1, 'worker_password', '0', 0, '2021-07-14 08:41:14'),
(396, 69, 1, 'worker_view', '0', 0, '2021-07-14 08:41:14'),
(397, 69, 1, 'worker_edit', '0', 0, '2021-07-14 08:41:14'),
(398, 69, 1, 'worker_role', '0', 0, '2021-07-14 08:41:14'),
(399, 69, 1, 'worker_ban', '0', 0, '2021-07-14 08:41:14'),
(400, 69, 1, 'contractor_show', '0', 0, '2021-07-14 08:41:14'),
(401, 69, 1, 'contractor_create', '0', 0, '2021-07-14 08:41:14'),
(402, 69, 1, 'contractor_password', '0', 0, '2021-07-14 08:41:14'),
(403, 69, 1, 'contractor_delete', '0', 0, '2021-07-14 08:41:14'),
(404, 69, 1, 'contractor_role', '0', 0, '2021-07-14 08:41:14'),
(405, 69, 1, 'contractor_view', '0', 0, '2021-07-14 08:41:14'),
(406, 69, 1, 'contractor_edit', '0', 0, '2021-07-14 08:41:14'),
(407, 69, 1, 'contractor_ban', '0', 0, '2021-07-14 08:41:14'),
(408, 69, 1, 'invoice_show', '1', 0, '2021-07-14 08:41:14'),
(409, 69, 1, 'invoice_create', '0', 0, '2021-07-14 08:41:14'),
(410, 69, 1, 'invoice_delete', '0', 0, '2021-07-14 08:41:14'),
(411, 69, 1, 'invoice_send_mail', '0', 0, '2021-07-14 08:41:14'),
(412, 69, 1, 'invoice_view', '0', 0, '2021-07-14 08:41:14'),
(413, 69, 1, 'property_show', '1', 0, '2021-07-14 08:41:14'),
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
(492, 72, 1, 'property_edit', '1', 0, '2021-07-15 08:34:50');

-- --------------------------------------------------------

--
-- Table structure for table `polls`
--

CREATE TABLE `polls` (
  `id` int(11) NOT NULL,
  `question` text,
  `option1` text,
  `option2` text,
  `option3` text,
  `option4` text,
  `option5` text,
  `option6` text,
  `option7` text,
  `option8` text,
  `option9` text,
  `option10` text,
  `status` int(11) DEFAULT '1',
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `polls`
--

INSERT INTO `polls` (`id`, `question`, `option1`, `option2`, `option3`, `option4`, `option5`, `option6`, `option7`, `option8`, `option9`, `option10`, `status`, `created_at`) VALUES
(2, 'Is the demand to withdraw FIR against Army in Shopian firing case justified?', 'Yes', 'No', '', '', '', '', '', '', '', '', 1, '2018-01-31 06:01:49'),
(3, 'Do You Agree With Permanent Ban On Surge Pricing For Delhi?', 'Yes', 'No', 'second Yes', 'second No', '', '', '', '', '', '', 1, '2018-02-06 04:52:17'),
(4, 'What\'s been the biggest contributing factor in India beating South Africa in the ODI series?', 'Wrist spinners (Yadav & Chahal)', 'Virat Kohli in fine form', 'Unusually flat pitches in South Africa', 'The weakest South Africa ODI team ever', '', '', '', '', '', '', 1, '2018-02-26 01:31:56');

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
  `buye` varchar(255) NOT NULL DEFAULT 'buy',
  `images` varchar(255) NOT NULL,
  `url` varchar(255) NOT NULL,
  `price` int(20) NOT NULL DEFAULT '0',
  `currency` varchar(255) NOT NULL DEFAULT '$',
  `discount` int(20) NOT NULL DEFAULT '0',
  `sale_price` int(150) NOT NULL DEFAULT '0',
  `building_no` varchar(255) NOT NULL,
  `apartment_number` varchar(255) NOT NULL,
  `property_owner` varchar(255) NOT NULL,
  `number_rooms` varchar(255) NOT NULL,
  `floor_option` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL,
  `pincode` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `pin` int(11) NOT NULL DEFAULT '1',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `status` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `projects`
--

INSERT INTO `projects` (`id`, `uid`, `title`, `slug`, `content`, `type`, `buye`, `images`, `url`, `price`, `currency`, `discount`, `sale_price`, `building_no`, `apartment_number`, `property_owner`, `number_rooms`, `floor_option`, `city`, `pincode`, `address`, `pin`, `created_at`, `status`) VALUES
(3, 54, 'asdasdas', 'asdasdas-609c832b298c0', 'asdd', 'apartment', 'buy', 'uploads/thumbnails/1620869931.jpg', '', 6, '$', 2, 0, '', '', '', '', '', '', '', '', 1, '2021-05-13 01:38:51', 1),
(4, 1, 'sdsdffddfd', 'sdsdffddfd-60bff5d236b63', 'hhhhh', 'office', 'buy', 'uploads/thumbnails/1623193042.png', '', 100, '$', 0, 35234, 'sdfasdfgdg', '35345', 'asdadaa', 'ada575', '53754', 'mhk', '424', 'kjhkjjjh', 1, '2021-06-08 22:57:22', 1);

-- --------------------------------------------------------

--
-- Table structure for table `projects_assign`
--

CREATE TABLE `projects_assign` (
  `id` int(11) NOT NULL,
  `project_id` int(20) NOT NULL DEFAULT '0',
  `assign_user_id` int(11) NOT NULL DEFAULT '0',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `status` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `projects_assign`
--

INSERT INTO `projects_assign` (`id`, `project_id`, `assign_user_id`, `created_at`, `status`) VALUES
(1, 1, 54, '2021-05-12 21:44:09', 1),
(2, 3, 52, '2021-05-13 01:38:51', 1),
(3, 3, 53, '2021-05-13 01:38:51', 1),
(4, 3, 55, '2021-05-13 01:38:51', 1);

-- --------------------------------------------------------

--
-- Table structure for table `property`
--

CREATE TABLE `property` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `street` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `house_no` varchar(30) COLLATE utf8_unicode_ci DEFAULT NULL,
  `buil_number` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `apart_number` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `city` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `prop_type` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `name_of_prop_owner` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `floor` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `no_of_rooms` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `images` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `details` text COLLATE utf8_unicode_ci,
  `rental_price` int(11) DEFAULT NULL,
  `ask_sale_price` int(11) DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT '1',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `property`
--

INSERT INTO `property` (`id`, `user_id`, `title`, `slug`, `street`, `house_no`, `buil_number`, `apart_number`, `city`, `prop_type`, `name_of_prop_owner`, `floor`, `no_of_rooms`, `images`, `details`, `rental_price`, `ask_sale_price`, `status`, `created_at`, `updated_at`) VALUES
(7, 62, 'tesdefgdga', 'defgdga-60edd31cdbbff', 'HNO 146 VILLAGE JAMANPUR PO SELAQUI TEH VIKASNAGAR Dehradun', NULL, '12', '2', 'Dehradun', 'apartment', 'manish kumar', NULL, NULL, '', NULL, 0, 25000, 1, '2021-07-08 12:03:53', '2021-07-08 12:03:53'),
(8, 62, 'sdfadefgdga', 'defgdga-60edd31cdbbff', 'Village Kothi PO kharihar thare teh ladbhoral', NULL, '12', '2', 'MANDI', 'apartment', 'sakeena devi', NULL, NULL, '', NULL, 0, 25000, 1, '2021-07-08 12:10:15', '2021-07-08 12:10:15'),
(9, 1, 'defgdga', 'defgdga-60edd31cdbbff', 'mohali', NULL, '654', '5466654', 'mohali', 'apartment', 'ccsadsa', '1', '2', 'uploads/property/1626198812.jpg', 'sfdafa', 454, 5454, 1, '2021-07-13 17:53:32', '2021-07-13 17:53:32'),
(10, 1, 'ttttttttt', 'ttttttttt-60f135017c371', 'mohali', NULL, '654', '5466654', 'mohali', 'apartment', 'ccsadsa', '', '', 'uploads/property/1626420481.jpg', '', 454, 5454, 1, '2021-07-16 07:28:01', '2021-07-16 07:28:01'),
(11, 1, 'dfgdfgd', 'dfgdfgd-60f1370e084c7', 'HNO 146 VILLAGE JAMANPUR PO SELAQUI TEH VIKASNAGAR...', NULL, '654', '5466654', 'mohali', 'office', '', '', '', 'uploads/property/1626421006.jpg', '', 454, 5454, 1, '2021-07-16 07:36:46', '2021-07-16 07:36:46');

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
  `status` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `slug`, `email`, `password`, `role`, `user_type`, `google_id`, `facebook_id`, `avatar`, `about_me`, `facebook_url`, `twitter_url`, `google_url`, `instagram_url`, `pinterest_url`, `linkedin_url`, `vk_url`, `youtube_url`, `first_name`, `last_name`, `address`, `phone`, `country`, `gender`, `birthday`, `id_no`, `login_is`, `agree_policy`, `time_temp`, `time_tempdura`, `membership_status`, `created_at`, `status`) VALUES
(1, 'admin', 'admin-6087e9823443ef', 'admin@admin.com', '$2a$08$W4jM5kvOfZySyxUFSkDqnu9JJES2tCXMFqm0/2boJYxxFdkv1wIfi', 'admin', 'registered', NULL, NULL, 'uploads/profile/1623261140.png', 'jgfjhg', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'dasdas', 'fsdfa', 'sdsdfa', '0000000000', '', 'male', '', 0, 1, 0, '1626849236', '1626849236', 0, '2017-11-22 20:03:46', 1),
(52, 'ssssss', 'ssssss-6087e982943ef', 'contractor@gmail.com', '$2a$08$W4jM5kvOfZySyxUFSkDqnu9JJES2tCXMFqm0/2boJYxxFdkv1wIfi', 'contractor', 'registered', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'sdfsdf', 'dasdasd', '', '0000000000', '', 'male', '', 0, 0, 1, '1626078593', '1626080994', 0, '2021-04-27 10:37:54', 1),
(53, 'client', 'client-6087f6b92807c', 'client@gmail.com', '$2a$08$W4jM5kvOfZySyxUFSkDqnu9JJES2tCXMFqm0/2boJYxxFdkv1wIfi', 'client', 'registered', NULL, NULL, 'uploads/profile/1620730893.png', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'cccccccc', 'cccccccc', 'sdsfasf', '000000000', '', 'male', '', 0, 0, 1, '1625729679', '1625730081', 0, '2021-04-27 11:34:17', 1),
(54, 'worker', 'demo-609bdc877829c', 'worker@gmail.com', '$2a$08$W4jM5kvOfZySyxUFSkDqnu9JJES2tCXMFqm0/2boJYxxFdkv1wIfi', 'worker', 'registered', NULL, NULL, 'uploads/profile/1620827271.jpg', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'demo', 'demo', 'demo', '000000000', '', 'male', '0/0/0', 0, 1, 0, '1626342184', '1626342184', 0, '2021-05-12 13:47:51', 1),
(56, 'testcustomer', 'testcustomer-60c0a508d79f5', 'customer@gmail.com', '$2a$08$nBsDDnUhJdvyzecX5Y7HUOSZQb2vaXWUCFi6KZ6F1ggJeyLiFN1oq', 'customer', 'registered', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'test', 'customer', 'gdfhgfhd', '000000000', '', 'male', '', 0, 0, 1, '1626257973', '1626258141', 1, '2021-06-09 11:24:56', 1),
(57, 'rishi.zeroit', 'rishi.zeroit-60c2efafb9347', 'rishi.zeroit@gmail.com', '$2a$08$ldiLiwCiPbrFMoKxJtHq.uxTSchpkeRKXShDmpvBAzF3BCWkKEGQ6', 'customer', 'registered', NULL, NULL, 'uploads/profile/1623388079.png', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'rishi', 'Thakur', 'HNO 146 VILLAGE JAMANPUR PO SELAQUI TEH VIKAS NAGAR Dehradun', '5656565656', '', 'male', '0/0/0', 0, 1, 0, '1626766113', '1626766113', 0, '2021-06-11 05:07:59', 1),
(58, 'admin@admin.com', 'adminadmin.com-60e2b98d45b16', 'zeroit@gmail.com', '$2a$08$Fc7G8BHyPZzK5bYJSZODu.zke1uQN/A1oQvi7JH/mDxT70G2758gq', 'client', 'registered', NULL, NULL, 'uploads/profile/1625736666.jpeg', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'zero', 'it', 'ssddddd', '9812345123', '', 'male', '0/0/0', 0, 0, 0, '1625471373', '1625471373', 0, '2021-07-05 07:49:33', 0),
(59, 'chandan', 'chandan-60e542d79a9c3', 'chandan.zeroit@gmail.com', '$2a$08$y/CkGmUllEiY7KrtlDyk2.b6PbreBPdNgyJAihkWZGDjPjU86PvGO', 'client', 'registered', NULL, NULL, 'uploads/profile/1625637591.jpg', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'tews', 'fsdfs', 'fsdfaf', '0000000000', '', 'male', '0/0/0', 0, 0, 0, '1625637591', '1625637591', 0, '2021-07-07 05:59:51', 1),
(62, 'amans', 'amans-60e6b58f0244b', 'aman.zeroit@gmail.com', '$2a$08$2oYncZH8aOLBVz/6xI1FT.ykLMaziZ3bzKna1MAQo9TJMrrupdb22', 'customer', 'registered', NULL, NULL, 'uploads/profile/1625732495.jpeg', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'amans', 'amans', 'gdfgdfgsdfg', 'amans ', '', 'male', '0/0/0', 0, 1, 0, '1626772253', '1626772253', 0, '2021-07-08 08:21:35', 1),
(63, 'gurpreet', 'gurpreet-60ebf823bb222', 'gurpreet.zeroit@gmail.com', '$2a$08$rmPgM902Qga0.PkC.Hpebuqjjwco6OeUo3EydsoH6lvJDRF0ViTh6', 'contractor', 'registered', NULL, NULL, 'uploads/profile/1626077219.jpg', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'dsfdsa', 'dfgds', 'ughujgf', '0000000000', '', 'male', '0/0/0', 0, 1, 0, '1626087395', '1626087395', 0, '2021-07-12 08:06:59', 1),
(64, 'manish.zeroit@gmail.com', 'manish.zeroitgmail.com-60ec06caaaef9', 'Manish.zeroit@gmail.com', '$2a$08$S4ifwo8A29L..feXoHotpeSH0mmaWHoY9RCaVMeP8cKzBUFxH/HXi', 'customer', 'registered', NULL, NULL, 'uploads/profile/1626080970.jpg', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Manish', 'Thakur', '', '9041377108', '', 'male', '0/0/0', 0, 1, 0, '1626081006', '1626081006', 0, '2021-07-12 09:09:30', 1),
(65, 'madan.zeroit@gmail.com', 'madan.zeroitgmail.com-60ec08bd6cfe9', 'madan.zeroit@gmail.com', '$2a$08$iB476X6SQvWwvT.bsRZeIOJw.ygDOsozzEX9bJXIPFNy4j35HWWsy', 'worker', 'registered', NULL, NULL, 'uploads/profile/1626081469.jpg', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Madan', 'Thakur', 'fsdf', '9041377108', '', 'male', '0/0/0', 0, 1, 0, '1626081511', '1626081511', 0, '2021-07-12 09:17:49', 1),
(67, 'amans.zeroit@gmail.com', 'amans.zeroitgmail.com-60ec4e4b5274d', 'amans.zeroit@gmail.com', '$2a$08$lRsErcm0BAU6zwZg/vVk1.bjScc4cn7p5VAqTmbhj6Pvk5Nmq7bii', 'worker', 'registered', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1', '2', '[plop]', '9041377025', '', 'male', '0/0/0', 0, 0, 0, '1626179830', '1626179884', 0, '2021-07-12 14:14:35', 1),
(68, 'subadmin', 'subadmin-60ed5647bc373', 'subadmin@gmail.com', '$2a$08$WdTnM6mn7ZR0rxj0LbZR/umbkmnuILjslAPuZRK9ePIR9rPDeCTc6', 'sub-admin', 'registered', NULL, NULL, 'uploads/profile/1626166855.jpg', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'subadmin', 'kumar', 'dfsdsfsd', '0000000000', '', 'male', '0/0/0', 0, 0, 0, '1626166855', '1626166855', 0, '2021-07-13 09:00:55', 1),
(69, 'fatima', 'fatima-60eea2d6e7d5e', 'fatima.zeroit@gmail.com', '$2a$08$.sMKc.MZgW7Q1YxMkVPOkOl1KRiy3OsfxDbEn8edO47EjDfYzZds2', 'contractor', 'registered', NULL, NULL, 'uploads/profile/1626251990.jpeg', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'fatima', 'fatima', 'dfgdfs', '0000000000', '', 'male', '0/0/0', 0, 1, 0, '1626252100', '1626252100', 0, '2021-07-14 08:39:50', 1),
(70, 'admin@admin.com', 'adminadmin.com-60eeb9e007ac1', 'clients@gmail.com', '$2a$08$LoYW03xWKe.Tilhojp73JuF2J2KoIQGyHhjhbyG1xQPL5Nh5Y4WWW', 'worker', 'registered', NULL, NULL, 'uploads/profile/1626257888.jpg', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'clients', 'clients', 'ggggggg', '9812345879', '', 'male', '0/0/0', 0, 0, 0, '1626257888', '1626257888', 0, '2021-07-14 10:18:08', 1),
(71, 'admin@admin.com', 'adminadmin.com-60eeba6104c9f', 'qqqq@gmail.com', '$2a$08$uK8ZHs9e4QfSya27b1s4.OusscRlEjnjpmk7m9md9DqV5SSHKfU7S', 'client', 'registered', NULL, NULL, 'uploads/profile/1626268155.jpeg', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'dcredfvrv', 'ccccccc', 'fvvvfvfvvf', '9812398789', '', 'male', '0/0/0', 0, 0, 0, '1626258017', '1626258017', 0, '2021-07-14 10:20:17', 1),
(72, 'rishibarwal229@gmail.com', 'rishibarwal229gmail.com-60eff2d6c20ce', 'rishibarwal229@gmail.com', '$2a$08$l1HUVUPJ4ZPgpxc6xcE9ne8VHw6Xb8BZeLoaMNjTjk26Xm4FhcPBy', 'client', 'registered', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'r', 't', 'ttt', '0000000000', '', 'male', '0/0/0', 0, 0, 0, '1626339652', '1626341450', 0, '2021-07-15 08:33:26', 1),
(74, 'chandan', 'chandan-60f12e76771b4', 'clientnad@gmail.com', '$2a$08$kr.vpxHyoNVuS2uAK2kgtezFsUR3abJvQBNyNxaksg0IIBXonZkfu', 'client', 'registered', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', '0000000000', '', 'male', '0/0/0', 182181, 0, 0, '1626418806', '1626418806', 0, '2021-07-16 07:00:06', 1),
(75, 'fffffff', 'fffffff-60f6866e3212b', 'robin@gmail.com', '$2a$08$g6e6tnkYjPNZkaALTRVqA.yLv8ySR1TPTZneSoNN5mKcBTNFLOUTK', 'user', 'registered', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'robin', 'kumar', '', '8733333225554', '', 'male', '', 0, 0, 0, '0', '0', 0, '2021-07-20 08:16:46', 1),
(76, 'fffffff', 'fffffff-60f686eabe53e', 'robieeen@gmail.com', '$2a$08$8EvEx37lCzC6gB3wHnwr4.AGr8oYS3wu6XCTKufBpa4CiGlQtOE3C', 'user', 'registered', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'robin', 'kumar', '', '8733333225554', '', 'male', '', 0, 0, 0, '0', '0', 0, '2021-07-20 08:18:50', 1),
(77, 'fffffff', 'fffffff-60f6871b0a6bf', 'robiseeen@gmail.com', '$2a$08$e1sjPvoB3cNPYmBhaqYVxeZXYAMAszEWmIHuCCcZoMmu87zO//DMa', 'user', 'registered', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'robin', 'kumar', '', '8733333225554', '', 'male', '', 0, 1, 0, '1626773794', '1626773794', 0, '2021-07-20 08:19:39', 1),
(78, 'robincc', 'robincc-60f6b019b9a30', 'roccbin@gmail.comcc', '$2a$08$LkkmC7bdl4a5HdjYoDJX9u5DjhPsvx1Lko967tkmcjIp1YL3KVyOS', 'user', 'registered', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'robin1221', 'kumarcc', '', '9812345123', '', 'male', '', 0, 1, 0, '1626846129', '1626846129', 0, '2021-07-20 11:14:33', 1),
(79, 'robincc1', 'robincc1-60f7c71ed5284', 'roccwbin@gmail.comcc', '$2a$08$51LwBLZuhgqAn1T5Q8E8A.1OUkDxSoi7M2fIQK.XAic3AbGBnynx2', 'user', 'registered', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'robin1221', 'kumarcc', '', '0000000000', '', 'male', '', 0, 1, 0, '1626851130', '1626851130', 0, '2021-07-21 07:05:02', 1);

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
-- Indexes for table `agreement`
--
ALTER TABLE `agreement`
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `customer_agreements`
--
ALTER TABLE `customer_agreements`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customer_clients`
--
ALTER TABLE `customer_clients`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customer_property`
--
ALTER TABLE `customer_property`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customer_signed_agreements`
--
ALTER TABLE `customer_signed_agreements`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `deleted_agreements`
--
ALTER TABLE `deleted_agreements`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `finance`
--
ALTER TABLE `finance`
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `membership`
--
ALTER TABLE `membership`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `membership_service`
--
ALTER TABLE `membership_service`
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `permission`
--
ALTER TABLE `permission`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `polls`
--
ALTER TABLE `polls`
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
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `property`
--
ALTER TABLE `property`
  ADD PRIMARY KEY (`id`);

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
-- AUTO_INCREMENT for table `agreement`
--
ALTER TABLE `agreement`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

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
-- AUTO_INCREMENT for table `customer_agreements`
--
ALTER TABLE `customer_agreements`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=163;

--
-- AUTO_INCREMENT for table `customer_clients`
--
ALTER TABLE `customer_clients`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT for table `customer_property`
--
ALTER TABLE `customer_property`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `customer_signed_agreements`
--
ALTER TABLE `customer_signed_agreements`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `deleted_agreements`
--
ALTER TABLE `deleted_agreements`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `finance`
--
ALTER TABLE `finance`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

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
-- AUTO_INCREMENT for table `membership`
--
ALTER TABLE `membership`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `membership_service`
--
ALTER TABLE `membership_service`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

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
-- AUTO_INCREMENT for table `payments`
--
ALTER TABLE `payments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `permission`
--
ALTER TABLE `permission`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=493;

--
-- AUTO_INCREMENT for table `polls`
--
ALTER TABLE `polls`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

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
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `projects_assign`
--
ALTER TABLE `projects_assign`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `property`
--
ALTER TABLE `property`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=80;

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
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
