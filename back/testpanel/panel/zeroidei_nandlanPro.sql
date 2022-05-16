-- phpMyAdmin SQL Dump
-- version 4.9.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Apr 30, 2021 at 07:06 AM
-- Server version: 5.7.23-23
-- PHP Version: 7.3.27

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
(11, 'Football', 'football', 9, '', '', '#102b89', NULL, NULL, '2018-02-26 01:21:51'),
(12, 'Tennis', 'tennis', 9, '', '', '#102b89', NULL, NULL, '2018-02-26 01:21:58'),
(14, 'Hockey', 'hockey', 9, '', '', '#102b89', NULL, NULL, '2018-02-26 01:22:40'),
(15, 'Badminton', 'badminton', 9, '', '', '#102b89', NULL, NULL, '2018-02-26 01:23:02'),
(18, 'Kabaddi', 'kabaddi', 9, '', '', '#102b89', NULL, NULL, '2018-02-26 01:23:29'),
(26, 'Other Sports', 'other-sports', 9, '', '', '#102b89', NULL, NULL, '2018-02-26 01:25:06');

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
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `pages`
--

INSERT INTO `pages` (`id`, `title`, `slug`, `description`, `keywords`, `is_custom`, `page_content`, `page_order`, `visibility`, `title_active`, `breadcrumb_active`, `right_column_active`, `need_auth`, `location`, `created_at`) VALUES
(1, 'Home', 'index', 'India News, Latest Bollywood News, Sports News, Business & Political News, National & International News', 'tallypost,tp,tally,post,times,india,news,latest news,cricket news,indian news,daily news,live news,toi,business news,news in india,online news,times news,bollywood news,breaking news,current news,india newspaper,today news,world news,mumbai news,sports news,delhi news,india latest news,recent news,local news,news headlines,news site,news website,news india,latest cricket news,top news,india news,entertainment news,national news,political news,toi news paper,times of india,news paper', 0, NULL, 1, 1, 1, 1, 0, 0, 'none', '2017-11-22 20:05:45'),
(2, 'Registration', 'register', 'Register', 'register, auth', 0, NULL, 2, 1, 1, 1, 0, 0, 'none', '2017-11-22 20:07:52'),
(3, 'Login', 'login', 'Login Page', 'login, auth', 0, NULL, 0, 1, 1, 1, 0, 0, 'none', '2017-11-22 20:14:41'),
(4, 'Reset Password', 'reset-password', 'Reset Password ', 'reset password, auth', 0, NULL, 0, 1, 1, 1, 0, 0, 'none', '2017-11-22 20:16:38'),
(5, 'Change Password', 'change-password', 'Change Password', 'change password, auth', 0, NULL, 0, 1, 1, 1, 0, 0, 'none', '2017-11-22 20:19:07'),
(6, 'Update Profile', 'update-profile', 'Update Profile ', 'update profile, auth', 0, NULL, 0, 1, 1, 1, 0, 0, 'none', '2017-11-22 20:20:32'),
(7, 'Contact Us', 'contact', 'Contact Page', 'contact, page', 0, NULL, 1, 1, 1, 1, 0, 0, 'top', '2017-11-22 20:22:18'),
(8, 'Gallery', 'gallery', 'Gallery', 'gallery , page', 0, NULL, 2, 1, 1, 1, 0, 0, 'main', '2017-11-22 20:33:50'),
(9, 'Posts', 'posts', 'Posts Page', 'posts, articles, page', 0, NULL, 0, 1, 1, 1, 1, 0, 'none', '2017-11-22 20:35:36'),
(10, 'Videos', 'videos', 'Videos Page', 'videos, articles,watch, page', 0, NULL, 1, 1, 1, 1, 1, 0, 'main', '2017-11-22 20:37:27'),
(11, 'RSS Channels', 'rss-channels', 'RSS Channels Page', 'rss channels, rss feeds', 0, '', 0, 1, 1, 1, 0, 0, 'none', '2017-11-22 20:44:10'),
(12, 'Reading List', 'reading-list', 'Reading List Page', 'reading list,  read later', 0, NULL, 0, 1, 1, 1, 1, 0, 'none', '2017-11-22 20:49:16'),
(13, 'User Agreement', 'user-agreement', 'User Agreement Page', 'user agreement, terms', 0, '<p>This privacy policy explains our policy regarding the collection, use, disclosure and transfer of your information by Tally Post and/or its subsidiary(ies) and/or affiliate(s) (collectively referred to as the &quot;Company&quot;), which operates various websites and other services including but not limited to delivery of information and content via any mobile or internet connected device or otherwise (collectively the &quot;Services&quot;). This privacy policy forms part and parcel of the Terms of Use for the Services. Capitalized terms which have been used here but are undefined shall have the same meaning as attributed to them in the Terms of Use.</p>\r\n\r\n<p>As we update, improve and expand the Services, this policy may change, so please refer back to it periodically. By accessing the Company website or this Application or otherwise using the Services, you consent to collection, storage, and use of the personal information you provide (including any changes thereto as provided by you) for any of the services that we offer.</p>\r\n\r\n<p>The Company respects the privacy of the users of the Services and is committed to reasonably protect it in all respects. The information about the user as collected by the Company is: (a) information supplied by users and (b) information automatically tracked while navigation (c) information collected from any other source (collectively referred to as Information).</p>\r\n\r\n<p><strong>1. INFORMATION RECEIVED, COLLECTED AND STORED BY THE COMPANY</strong></p>\r\n\r\n<p>A. INFORMATION SUPPLIED BY USERS</p>\r\n\r\n<p><strong>Registration data:</strong></p>\r\n\r\n<p>When you register on the website, Application and for the Service, we ask that you provide basic contact Information such as your name, sex, age, address, pin code, contact number, occupation, interests and email address etc. When you register using your other accounts like on Facebook, Twitter, Gmail etc. we shall retrieve Information from such account to continue to interact with you and to continue providing the Services.</p>\r\n\r\n<p><strong>Subscription or paid service data:</strong></p>\r\n\r\n<p>When you chose any subscription or paid service, we or our payment gateway provider may collect your purchase, address or billing information, including your credit card number and expiration date etc. However when you order using an in-app purchase option, same are handled by such platform providers. The subscriptions or paid Services may be on auto renewal mode unless cancelled. If at any point you do not wish to auto-renew your subscription, you may cancel your subscription before the end of the subscription term.</p>\r\n\r\n<p><strong>Voluntary information:</strong></p>\r\n\r\n<p>We may collect additional information at other times, including but not limited to, when you provide feedback, change your content or email preferences, respond to a survey, or communicate with us.</p>\r\n\r\n<p>B. INFORMATION AUTOMATICALLY COLLECTED/ TRACKED WHILE NAVIGATION</p>\r\n\r\n<p><strong>Cookies</strong></p>\r\n\r\n<p>To improve the responsiveness of the &quot;Application&quot; for our users, we may use &quot;cookies&quot;, or similar electronic tools to collect information to assign each visitor a unique, random number as a User Identification (User ID) to understand the user&#39;s individual interests using the identified computer. Unless you voluntarily identify yourself (through registration, for example), we will have no way of knowing who you are, even if we assign a cookie to your computer. The only personal information a cookie can contain is information you supply. A cookie cannot read data off your hard drive. Our advertisers may also assign their own cookies to your browser (if you click on their ads), a process that we do not control. We receive and store certain types of information whenever you interact with us via website, Application or Service though your computer/laptop/netbook or mobile/tablet/pad/handheld device etc.</p>\r\n\r\n<p><strong>Opting out</strong></p>\r\n\r\n<p>If a user opts out using the&nbsp;<a href=\"http://www.google.com/ads/preferences\" rel=\"nofollow\" target=\"_blank\">Ads Settings</a>, the unique DoubleClick cookie ID on the user&#39;s browser is overwritten with the phrase &quot;OPT_OUT&quot;. Because there is no longer a unique cookie ID, the opt-out cookie can&#39;t be associated with a particular browser.</p>\r\n\r\n<p><strong>Log File Information</strong></p>\r\n\r\n<p>We automatically collect limited information about your computer&#39;s connection to the Internet, mobile number, including your IP address, when you visit our site, application or service. Your IP address is a number that lets computers attached to the Internet know where to send you data -- such as the pages you view. We automatically receive and log information from your browser, including your IP address, your computer&#39;s name, your operating system, browser type and version, CPU speed, and connection speed. We may also collect log information from your device, including your location, IP address, your device&#39;s name, device&#39;s serial number or unique identification number (e.g.. UDiD on your iOS device), your device operating system, browser type and version, CPU speed, and connection speed etc.</p>\r\n\r\n<p><strong>Clear GIFs</strong></p>\r\n\r\n<p>We may use &quot;clear GIFs&quot; (Web Beacons) to track the online usage patterns of our users in a anonymous manner, without personally identifying the user. We may also use clear GIFs in HTML-based emails sent to our users to track which emails are opened by recipients. We use this information to inter-alia deliver our web pages to you upon request, to tailor our Site, Application or Service to the interests of our users, to measure traffic within our Application to improve the Application quality, functionality and interactivity and let advertisers know the geographic locations from where our visitors come.</p>\r\n\r\n<p><strong>Information from other Sources:</strong></p>\r\n\r\n<p>We may receive information about you from other sources, add it to our account information and treat it in accordance with this policy. If you provide information to the platform provider or other partner, whom we provide services, your account information and order information may be passed on to us. We may obtain updated contact information from third parties in order to correct our records and fulfil the Services or to communicate with you</p>\r\n\r\n<p><strong>Demographic and purchase information:</strong></p>\r\n\r\n<p>We may reference other sources of demographic and other information in order to provide you with more targeted communications and promotions. We use Google Analytics, among others, to track the user behaviour on our website. Google Analytics specifically has been enable to support display advertising towards helping us gain understanding of our users&#39; Demographics and Interests. The reports are anonymous and cannot be associated with any individual personally identifiable information that you may have shared with us. You can opt-out of Google Analytics for Display Advertising and customize Google Display Network ads using the Ads Settings options provided by Google.</p>\r\n\r\n<p><strong>2. LINKS TO THIRD PARTY SITES / AD-SERVERS</strong></p>\r\n\r\n<p>The Application may include links to other websites or applications. Such websites or applications are governed by their respective privacy policies, which are beyond our control. Once you leave our servers (you can tell where you are by checking the URL in the location bar on your browser), use of any information you provide is governed by the privacy policy of the operator of the application, you are visiting. That policy may differ from ours. If you can&#39;t find the privacy policy of any of these sites via a link from the application&#39;s homepage, you should contact the application owners directly for more information.</p>\r\n\r\n<p>When we present information to our advertisers -- to help them understand our audience and confirm the value of advertising on our websites or Applications -- it is usually in the form of aggregated statistics on traffic to various pages / content within our websites or Applications. We use third-party advertising companies to serve ads when you visit our websites or Applications. These companies may use information (not including your name, address, email address or telephone number or other personally identifiable information) about your visits to this and other websites or application, in order to provide advertisements about goods and services of interest to you.</p>\r\n\r\n<p>We do not provide any personally identifiable information to third party websites / advertisers / ad-servers without your consent.</p>\r\n\r\n<p><strong>3. INFORMATION USE BY THE COMPANY</strong></p>\r\n\r\n<p>The Information as supplied by the users enables us to improve the Services and provide you the most user-friendly experience. In some cases/provision of certain service(s) or utility(ies), we may require your contact address as well. All required information is service dependent and the Company may use the above said user Information to, maintain, protect, and improve the Services (including advertising on the &quot;Application&quot;) and for developing new services. We may also use your email address or other personally identifiable information to send commercial or marketing messages without your consent [with an option to subscribe / unsubscribe (where feasible)]. We may, however, use your email address without further consent for non-marketing or administrative purposes (such as notifying you of major changes, for customer service purposes, billing, etc.).</p>\r\n\r\n<p>Any personally identifiable information provided by you will not be considered as sensitive if it is freely available and / or accessible in the public domain like any comments, messages, blogs, scribbles available on social platforms like facebook, twitter etc.</p>\r\n\r\n<p>Any posted/uploaded/conveyed/communicated by users on the public sections of the &quot;Application&quot; becomes published content and is not considered personally identifiable information subject to this Privacy Policy.</p>\r\n\r\n<p>In case you choose to decline to submit personally identifiable information on the Application, we may not be able to provide certain services on the Application to you. We will make reasonable efforts to notify you of the same at the time of opening your account. In any case, we will not be liable and or responsible for the denial of certain services to you for lack of you providing the necessary personal information.</p>\r\n\r\n<p>When you register with the Application or Services, we contact you from time to time about updation of your personal information to provide the users such features that we believe may benefit / interest you.</p>\r\n\r\n<p><strong>4. INFORMATION SHARING</strong></p>\r\n\r\n<p>The Company shares your information with any third party without obtaining the prior consent of the User in the following limited circumstances:</p>\r\n\r\n<p>a) When it is requested or required by law or by any court or governmental agency or authority to disclose, for the purpose of verification of identity, or for the prevention, detection, investigation including cyber incidents, or for prosecution and punishment of offences. These disclosures are made in good faith and belief that such disclosure is reasonably necessary for enforcing these Terms or for complying with the applicable laws and regulations.</p>\r\n\r\n<p>b) The Company proposes to share such information within its group companies and officers and employees of such group companies for the purpose of processing personal information on its behalf. We also ensure that these recipients of such information agree to process such information based on our instructions and in compliance with this Privacy Policy and any other appropriate confidentiality and security measures.</p>\r\n\r\n<p>c) The Company may present information to our advertisers - to help them understand our audience and confirm the value of advertising on our websites or Applications &ndash; however it is usually in the form of aggregated statistics on traffic to various pages within our site.</p>\r\n\r\n<p>d) The Company may share your information regarding your activities on websites or Applications with third party social websites to populate your social wall that is visible to other people however you will have an option to set your privacy settings, where you can decide what you would like to share or not to share with others.</p>\r\n\r\n<p><strong>5. ACCESSING AND UPDATING PERSONAL INFORMATION</strong></p>\r\n\r\n<p>When you use the Services Site (or any of its sub sites), we make good faith efforts to provide you, as and when requested by you, with access to your personal information and shall further ensure that any personal information or sensitive personal data or information found to be inaccurate or deficient shall be corrected or amended as feasible, subject to any requirement for such personal information or sensitive personal data or information to be retained by law or for legitimate business purposes. We ask individual users to identify themselves and the information requested to be accessed, corrected or removed before processing such requests, and we may decline to process requests that are unreasonably repetitive or systematic, require disproportionate technical effort, jeopardize the privacy of others, or would be extremely impractical (for instance, requests concerning information residing on backup tapes), or for which access is not otherwise required. In any case, where we provide information access and correction, we perform this service free of charge, except if doing so would require a disproportionate effort. Because of the way we maintain certain services, after you delete your information, residual copies may take a period of time before they are deleted from our active servers and may remain in our backup systems.</p>\r\n\r\n<p><strong>6. INFORMATION SECURITY</strong></p>\r\n\r\n<p>We take appropriate security measures to protect against unauthorized access to or unauthorized alteration, disclosure or destruction of data. These include internal reviews of our data collection, storage and processing practices and security measures, including appropriate encryption and physical security measures to guard against unauthorized access to systems where we store personal data. All information gathered on TIL is securely stored within the Company controlled database. The database is stored on servers secured behind a firewall; access to the servers is password-protected and is strictly limited. However, as effective as our security measures are, no security system is impenetrable. We cannot guarantee the security of our database, nor can we guarantee that information you supply will not be intercepted while being transmitted to us over the Internet. And, of course, any information you include in a posting to the discussion areas is available to anyone with Internet access.</p>\r\n\r\n<p>We use third-party advertising companies to serve ads when you visit or use our website, mobile application or services. These companies may use information (not including your name, address, email address or telephone number) about your visits or use to particular website, mobile application or services, in order to provide advertisements about goods and services of interest to you.</p>\r\n\r\n<p><strong>7. UPDATES / CHANGES</strong></p>\r\n\r\n<p>The internet is an ever evolving medium. We may alter our privacy policy from time to time to incorporate necessary changes in technology, applicable law or any other variant. In any case, we reserve the right to change (at any point of time) the terms of this Privacy Policy or the Terms of Use. Any changes we make will be effective immediately on notice, which we may give by posting the new policy on the &quot;Application&quot;. Your use of the Application or Services after such notice will be deemed acceptance of such changes. We may also make reasonable efforts to inform you via electronic mail. In any case, you are advised to review this Privacy Policy periodically on the &quot;Application&quot;) to ensure that you are aware of the latest version.</p>\r\n\r\n<p><strong>8. QUESTIONS / GRIEVANCE REDRESSAL</strong></p>\r\n\r\n<p>Redressal Mechanism: Any complaints, abuse or concerns with regards to the processing of information provided by you or breach of these terms shall be immediately informed to the designated Grievance Officer as mentioned below via in writing or through email signed with the electronic signature to grievance.it@timesinternet.in or Mr. Kabeer Sharma (&quot;Grievance Officer&quot;)</p>\r\n\r\n<p>Mr. Kabeer Sharma</p>\r\n\r\n<p>Grievance Officer (Indiatimes.com)</p>\r\n\r\n<p>Times Internet Limited</p>\r\n\r\n<p>Plot No. 391, Udyog Vihar, Phase - III,</p>\r\n\r\n<p>Gurgaon, Haryana 122016, India</p>\r\n\r\n<p>Ph:&nbsp;0124-4518550</p>\r\n\r\n<p>We request you to please provide the following information in your complaint:-</p>\r\n\r\n<p>a) Identification of the information provided by you;</p>\r\n\r\n<p>b) Clear statement as to whether the information is personal information or sensitive personal information;</p>\r\n\r\n<p>c) Your address, telephone number or e-mail address;</p>\r\n\r\n<p>d) A statement that you have a good-faith belief that the information has been processed incorrectly or disclosed without authorization, as the case may be;</p>\r\n\r\n<p>e) A statement, under penalty of perjury, that the information in the notice is accurate, and that the information being complained about belongs to you;</p>\r\n\r\n<p>f) You may also contact us in case you have any questions / suggestions about the Privacy Policy using the contact information mentioned above.</p>\r\n\r\n<p>The company shall not be responsible for any communication, if addressed, to any non-designated person in this regard.</p>\r\n', 0, 1, 1, 1, 0, 0, 'none', '2017-11-22 20:52:21'),
(15, 'test', 'test', '', '', 1, '<p>Our small business&nbsp;<em>loan</em>&nbsp;calculator will give you an idea of how much it will cost to take out a&nbsp;<em>loan</em>.Adjust the term and add extra monthly payments to see how much of an impact you can have on repayment.&nbsp;To borrow over a year term your monthly payment will be at an interest rate ...</p>\r\n\r\n<p>&nbsp;</p>\r\n', 1, 1, 1, 0, 1, 0, 'main', '2018-03-01 08:02:04');

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

INSERT INTO `settings` (`id`, `site_title`, `site_description`, `application_name`, `site_color`, `site_lang`, `show_hits`, `show_rss`, `show_newsticker`, `pagination_per_page`, `facebook_url`, `twitter_url`, `google_url`, `instagram_url`, `pinterest_url`, `linkedin_url`, `vk_url`, `youtube_url`, `optional_url_button_name`, `about_footer`, `google_analytics`, `primary_font`, `secondary_font`, `tertiary_font`, `contact_text`, `contact_address`, `contact_email`, `contact_phone`, `map_api_key`, `latitude`, `longitude`, `mail_protocol`, `mail_host`, `mail_port`, `mail_username`, `mail_password`, `mail_title`, `facebook_app_id`, `facebook_app_secret`, `google_app_name`, `google_client_id`, `google_client_secret`, `created_at`) VALUES
(1, 'NandLan Pro', 'NandLan Pro', 'NandLan Pro', 'default', 'english', 1, 1, 1, 16, '', '', '', '', '', '', '', '', 'Click Here To See More', 'NandLan Pro ', '', 'open_sans', 'roboto', 'verdana', '', '', '', '', '', '', '', 'smtp', 'zeroitsolutions.com', '587', 'admin@nandlanpro.com', 'kidan2223', 'NandLan Pro', '', '', 'Varient', '', '', '2017-07-06 00:11:07');

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
  `gender` varchar(255) NOT NULL DEFAULT 'male',
  `birthday` varchar(255) NOT NULL,
  `login_is` int(11) NOT NULL DEFAULT '0',
  `agree_policy` int(11) NOT NULL DEFAULT '0',
  `time_temp` varchar(255) NOT NULL,
  `time_tempdura` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `status` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `slug`, `email`, `password`, `role`, `user_type`, `google_id`, `facebook_id`, `avatar`, `about_me`, `facebook_url`, `twitter_url`, `google_url`, `instagram_url`, `pinterest_url`, `linkedin_url`, `vk_url`, `youtube_url`, `first_name`, `last_name`, `address`, `phone`, `gender`, `birthday`, `login_is`, `agree_policy`, `time_temp`, `time_tempdura`, `created_at`, `status`) VALUES
(1, 'admin', 'admin', 'admin@admin.com', '$2a$08$bOWDtWS2mwuR1xzElNmLN.NXuVHKM480qbhCSAkOViUq9MidcJHLW', 'admin', 'registered', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', '0000000000', 'male', '', 1, 0, '', '', '2017-11-22 20:03:46', 1),
(52, 'ssssss', 'ssssss-6087e982943ef', 'test@gmasil..com', '$2a$08$N0SalaXrxPNatbyTVa8ONes24PDLSbEOv34QfV.1c4Uxl3yJ0OOui', 'user', 'registered', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'sdfsdf', 'dasdasd', '', '0000000000', 'male', '', 0, 1, '', '', '2021-04-27 10:37:54', 1),
(53, 'chandan', 'chandan-6087f6b92807c', 'chandan.zeroit@gmail.com', '$2a$08$ja2ES1TtiwkZGAYN3HHnmO4O2iWWy08Fnl2zqLaWhS5yNqXG2NdBq', 'user', 'registered', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'aman', 'cccccccc', 'sdsfasf', '000000000', 'male', '', 0, 1, '', '1619530090', '2021-04-27 11:34:17', 1);

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
(1, 'horizontal', 'blue', '#0291b1', 'uploads/logo/logo_6088018ada648.ico', 'uploads/logo/logo_5a2e253b5b668.png', 'uploads/logo/favicon_6088014a4ceec.ico');

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
-- Indexes for table `tags`
--
ALTER TABLE `tags`
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
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

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
-- AUTO_INCREMENT for table `newsletters`
--
ALTER TABLE `newsletters`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pages`
--
ALTER TABLE `pages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

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
-- AUTO_INCREMENT for table `tags`
--
ALTER TABLE `tags`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

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
