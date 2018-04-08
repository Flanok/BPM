-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 09, 2018 at 12:14 AM
-- Server version: 10.1.30-MariaDB
-- PHP Version: 7.2.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `demo`
--

-- --------------------------------------------------------

--
-- Table structure for table `assets`
--

CREATE TABLE `assets` (
  `cash` double DEFAULT '0',
  `checking` double DEFAULT '0',
  `pay_pal_account` double DEFAULT '0',
  `payroll_account_balance` double DEFAULT '0',
  `savings` double DEFAULT '0',
  `pre_paid_accounts` double DEFAULT '0',
  `cash_and_equivalents_total` double DEFAULT '0',
  `current_30_days` double DEFAULT '0',
  `days_31_60` double DEFAULT '0',
  `days_61_90` double DEFAULT '0',
  `over_90_days` double DEFAULT '0',
  `accounts_receivable_total` double DEFAULT '0',
  `supplies` double DEFAULT '0',
  `miscellaneous` double DEFAULT '0',
  `inventory_total` double DEFAULT '0',
  `earned_rents_receivable` double DEFAULT '0',
  `current_portion_notes_rec` double DEFAULT '0',
  `other_total` double DEFAULT '0',
  `asset_total` double DEFAULT '0',
  `business_id` int(11) UNSIGNED DEFAULT NULL,
  `id` int(11) UNSIGNED NOT NULL,
  `date_time` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `assets`
--

INSERT INTO `assets` (`cash`, `checking`, `pay_pal_account`, `payroll_account_balance`, `savings`, `pre_paid_accounts`, `cash_and_equivalents_total`, `current_30_days`, `days_31_60`, `days_61_90`, `over_90_days`, `accounts_receivable_total`, `supplies`, `miscellaneous`, `inventory_total`, `earned_rents_receivable`, `current_portion_notes_rec`, `other_total`, `asset_total`, `business_id`, `id`, `date_time`) VALUES
(5, 12, 132, 1, 31, 321, 502, 32, 132, 13, 213, 390, 213, 213, 426, 213, 213, 426, 1744, 19, 23, '2018-04-08 15:44:20'),
(5852, 852, 852, 852, 85, 2, 8495, 852, 8, 52, 852, 1764, 8, 52, 60, 852, 9, 861, 11180, 19, 24, '2018-04-08 15:44:33'),
(5852, 852, 852, 852, 85, 2, 8495, 852, 8, 52, 852, 1764, 8, 52, 60, 852, 9, 861, 11180, 19, 25, '2018-04-08 15:44:36'),
(98, 7, 987, 987, 98, 7, 2184, 987, 987, 9, 879, 2862, 87, 987, 1074, 98, 79, 177, 6297, 24, 27, '2018-04-08 15:51:58'),
(9898, 4598, 4, 984, 98, 4, 15586, 98, 498, 4, 98, 698, 498, 4, 502, 98, 98, 196, 16982, 24, 28, '2018-04-08 15:52:06'),
(98, 798, 79, 87, 987, 98, 2147, 79, 87, 987, 98, 1251, 79, 87, 166, 987, 987, 1974, 5538, 25, 29, '2018-04-08 16:06:52'),
(98, 798, 79, 87, 987, 98, 2147, 79, 87, 987, 98, 1251, 79, 87, 166, 987, 987, 1974, 5538, 25, 30, '2018-04-08 16:06:56'),
(98, 87, 87, 8, 78, 78, 436, 7874, 9845, 49, 84798, 102566, 4, 98, 102, 4, 987, 991, 104095, 25, 31, '2018-04-08 16:07:06'),
(789, 789, 789, 987, 987, 987, 5328, 98, 79, 87, 987, 1251, 987, 98, 1085, 7, 987, 994, 8658, 26, 32, '2018-04-08 16:08:44'),
(1, 21, 21, 21, 21, 2, 87, 12, 12, 1, 21, 46, 2, 12, 14, 12, 1, 13, 160, 26, 33, '2018-04-08 16:08:54');

-- --------------------------------------------------------

--
-- Table structure for table `audit`
--

CREATE TABLE `audit` (
  `id` int(11) NOT NULL,
  `user` int(11) NOT NULL,
  `page` varchar(255) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `ip` varchar(255) NOT NULL,
  `viewed` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `audit`
--

INSERT INTO `audit` (`id`, `user`, `page`, `timestamp`, `ip`, `viewed`) VALUES
(1, 1, '42', '2017-02-20 17:31:13', '::1', 0),
(2, 0, '50', '2017-08-17 04:09:02', '::1', 0),
(3, 0, '3', '2017-09-15 01:01:43', '::1', 0),
(4, 0, '3', '2017-09-17 16:17:56', '::1', 0),
(5, 0, '50', '2017-09-20 05:00:09', '::1', 0),
(6, 0, '50', '2017-09-23 06:39:53', '::1', 0),
(7, 0, '50', '2017-09-24 16:47:30', '::1', 0),
(8, 0, '50', '2017-11-18 17:22:56', '::1', 0),
(9, 0, '50', '2017-11-23 19:37:18', '::1', 0),
(10, 0, '3', '2017-12-17 06:47:41', '::1', 0),
(11, 0, '50', '2018-01-12 04:54:30', '::1', 0),
(12, 0, '50', '2018-01-18 04:44:37', '::1', 0),
(13, 0, '50', '2018-02-24 05:32:04', '::1', 0),
(14, 0, '50', '2018-03-06 05:22:06', '::1', 0);

-- --------------------------------------------------------

--
-- Table structure for table `business`
--

CREATE TABLE `business` (
  `id` int(11) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `name` varchar(120) CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `business`
--

INSERT INTO `business` (`id`, `user_id`, `name`) VALUES
(19, 8, 'PorTable'),
(24, 8, 'Meta Booth'),
(25, 8, 'Frozen Frame'),
(26, 8, 'Dealions');

-- --------------------------------------------------------

--
-- Table structure for table `business_scorecard`
--

CREATE TABLE `business_scorecard` (
  `id` int(11) NOT NULL,
  `date_time` datetime NOT NULL,
  `experience_weight` float NOT NULL,
  `experience_grade` int(2) NOT NULL,
  `economic_weight` float NOT NULL,
  `economic_grade` int(2) NOT NULL,
  `working_capital_weight` float NOT NULL,
  `working_capital_grade` int(2) NOT NULL,
  `employees_weight` float NOT NULL,
  `employees_grade` int(2) NOT NULL,
  `relations_weight` float NOT NULL,
  `relations_grade` int(2) NOT NULL,
  `capital_assets_weight` float NOT NULL,
  `capital_assets_grade` int(2) NOT NULL,
  `marketing_weight` float NOT NULL,
  `marketing_grade` int(2) NOT NULL,
  `managing_debt_weight` float NOT NULL,
  `managing_debt_grade` int(2) NOT NULL,
  `managing_rec_pay_weight` float NOT NULL,
  `managing_rec_pay_grade` int(2) NOT NULL,
  `cash_controls_weight` float NOT NULL,
  `cash_controls_grade` int(2) NOT NULL,
  `users_id` int(11) NOT NULL,
  `business_id` int(11) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `business_scorecard`
--

INSERT INTO `business_scorecard` (`id`, `date_time`, `experience_weight`, `experience_grade`, `economic_weight`, `economic_grade`, `working_capital_weight`, `working_capital_grade`, `employees_weight`, `employees_grade`, `relations_weight`, `relations_grade`, `capital_assets_weight`, `capital_assets_grade`, `marketing_weight`, `marketing_grade`, `managing_debt_weight`, `managing_debt_grade`, `managing_rec_pay_weight`, `managing_rec_pay_grade`, `cash_controls_weight`, `cash_controls_grade`, `users_id`, `business_id`) VALUES
(418, '2018-04-08 03:42:34', 1.25, 2, 1, 1, 2, 3, 0, 2, 0, 3, 1, 1, 1, 1, 0.75, 3, 2, 3, 1, 2, 0, 19),
(419, '2018-04-08 03:43:06', 1.25, 2, 1, 1, 1, 3, 1, 2, 1, 3, 1, 1, 1, 1, 0.75, 3, 1, 3, 1, 2, 0, 19),
(420, '2018-04-08 03:43:30', 1.25, 0, 1, 10, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 0, 19),
(421, '2018-04-08 03:43:48', 1.25, 0, 1, 10, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 0.75, 1, 1, 1, 0, 19),
(422, '2018-04-08 03:50:42', 2, 2, 2, 2, 2, 2, 0, 2, 0, 2, 2, 0, 0, 2, 0, 2, 2, 0, 0, 0, 0, 24),
(423, '2018-04-08 03:50:59', 2, 2, 2, 2, 2, 2, 0, 2, 0, 2, 2, 0, 0, 2, 0, 2, 0.5, 0, 1.5, 0, 0, 24),
(424, '2018-04-08 03:51:14', 1.25, 10, 1, 10, 1, 10, 1, 1, 0, 10, 1, 1, 1, 10, 1, 10, 1, 0, 1.75, 1, 0, 24),
(425, '2018-04-08 03:51:18', 1.25, 10, 1, 10, 1, 10, 1, 1, 0, 10, 1, 1, 1, 10, 1, 10, 1, 0, 1.75, 1, 0, 24),
(426, '2018-04-08 04:06:16', 1.25, 1, 1, 1, 1, 10, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1.25, 0, 0.5, 1, 0, 25),
(427, '2018-04-08 04:06:26', 1.25, 1, 1, 1, 1, 10, 1, 1, 1, 1, 1, 1, 2, 1, 0, 1, 1.25, 0, 0.5, 1, 0, 25),
(428, '2018-04-08 04:06:38', 1.25, 1, 1, 1, 2, 10, 0, 1, 1, 1, 1, 1, 2, 1, 0, 1, 1.25, 0, 0.5, 1, 0, 25),
(429, '2018-04-08 04:06:41', 1.25, 1, 1, 1, 2, 10, 0, 1, 1, 1, 1, 1, 2, 1, 0, 1, 1.25, 0, 0.5, 1, 0, 25),
(430, '2018-04-08 04:08:22', 1.25, 1, 1.25, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1.25, 1, 1, 1, 0.25, 0, 0, 26),
(431, '2018-04-08 04:08:25', 1.25, 1, 1.25, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1.25, 1, 1, 1, 0.25, 0, 0, 26),
(432, '2018-04-08 04:08:27', 1.25, 1, 1.25, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1.25, 1, 1, 1, 0.25, 0, 0, 26),
(433, '2018-04-08 04:08:34', 1.25, 1, 1.25, 1, 1, 1, 1, 1, 2, 1, 1, 1, 0, 1, 1.25, 1, 1, 1, 0.25, 0, 0, 26);

-- --------------------------------------------------------

--
-- Table structure for table `email`
--

CREATE TABLE `email` (
  `id` int(11) NOT NULL,
  `website_name` varchar(100) NOT NULL,
  `smtp_server` varchar(100) NOT NULL,
  `smtp_port` int(10) NOT NULL,
  `email_login` varchar(150) NOT NULL,
  `email_pass` varchar(100) NOT NULL,
  `from_name` varchar(100) NOT NULL,
  `from_email` varchar(150) NOT NULL,
  `transport` varchar(255) NOT NULL,
  `verify_url` varchar(255) NOT NULL,
  `email_act` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `email`
--

INSERT INTO `email` (`id`, `website_name`, `smtp_server`, `smtp_port`, `email_login`, `email_pass`, `from_name`, `from_email`, `transport`, `verify_url`, `email_act`) VALUES
(1, 'User Spice', 'mail.userspice.com', 587, 'noreply@userspice.com', 'password', 'Your Name', 'noreply@userspice.com', 'tls', 'http://localhost/us4/', 0);

-- --------------------------------------------------------

--
-- Table structure for table `keys`
--

CREATE TABLE `keys` (
  `id` int(11) NOT NULL,
  `stripe_ts` varchar(255) NOT NULL,
  `stripe_tp` varchar(255) NOT NULL,
  `stripe_ls` varchar(255) NOT NULL,
  `stripe_lp` varchar(255) NOT NULL,
  `recap_pub` varchar(100) NOT NULL,
  `recap_pri` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `liabilities`
--

CREATE TABLE `liabilities` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `current_to_30_days` double DEFAULT '0',
  `days_31_60` double DEFAULT '0',
  `days_61_90` double DEFAULT '0',
  `over_90_days` double NOT NULL DEFAULT '0',
  `total_accounts_payable` double DEFAULT '0',
  `liens_judgments` double DEFAULT '0',
  `customer_prepaid_accounts` double DEFAULT '0',
  `deferred_salaries` double DEFAULT '0',
  `accruals_taxes_payroll` double DEFAULT '0',
  `balloon_payments` double DEFAULT '0',
  `accrued_interest` double DEFAULT '0',
  `other_total` decimal(10,0) DEFAULT '0',
  `debt_itemization` double DEFAULT '0',
  `long_term_obligations` double DEFAULT '0',
  `leases` double DEFAULT '0',
  `debt_continued_total` double DEFAULT '0',
  `total_liabilities` double DEFAULT '0',
  `business_id` int(11) UNSIGNED DEFAULT NULL,
  `date_time` datetime DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `liabilities`
--

INSERT INTO `liabilities` (`id`, `current_to_30_days`, `days_31_60`, `days_61_90`, `over_90_days`, `total_accounts_payable`, `liens_judgments`, `customer_prepaid_accounts`, `deferred_salaries`, `accruals_taxes_payroll`, `balloon_payments`, `accrued_interest`, `other_total`, `debt_itemization`, `long_term_obligations`, `leases`, `debt_continued_total`, `total_liabilities`, `business_id`, `date_time`) VALUES
(22, 1, 123, 12, 12, 148, 12, 1, 21, 2, 12, 12, '60', 12, 1, 2, 0, 223, 19, '2018-04-08 15:44:55'),
(23, 198, 79, 87, 987, 1351, 987, 987987, 987, 987, 98798, 798, '1090544', 798, 798, 7987, 0, 1101478, 19, '2018-04-08 15:45:02'),
(24, 1, 1, 1, 1, 4, 1, 1, 1, 1, 12, 12, '28', 1, 21, 21, 0, 75, 19, '2018-04-08 15:45:10'),
(25, 1, 51, 51, 51, 154, 51, 5, 15, 15, 1, 51, '138', 51, 51, 51, 0, 445, 24, '2018-04-08 15:52:18'),
(26, 132, 3, 23, 2, 160, 32, 3, 2, 32, 1, 32, '102', 32, 32, 32, 0, 358, 24, '2018-04-08 15:53:07'),
(27, 12, 12, 12, 1, 37, 21, 2, 12, 1, 21, 2, '59', 12, 1, 21, 34, 130, 24, '2018-04-08 16:03:58'),
(28, 21, 21, 21, 21, 84, 21, 2, 12, 12, 1, 23, '71', 1, 312, 4, 317, 472, 25, '2018-04-08 16:07:32'),
(29, 21, 21, 21, 21, 84, 21, 2, 12, 12, 1, 23, '71', 1, 312, 4, 317, 472, 25, '2018-04-08 16:07:34'),
(30, 98, 7, 987, 98, 1190, 7, 87, 87, 87, 87, 8, '363', 78, 78, 7, 163, 1716, 25, '2018-04-08 16:07:44'),
(31, 1, 21, 21, 21, 64, 21, 21, 21, 21, 2, 1321, '1407', 32, 132, 1, 165, 1636, 26, '2018-04-08 16:09:02'),
(32, 54, 54, 54, 54, 216, 5, 45, 4, 54, 5, 45, '158', 4, 54, 54, 112, 486, 26, '2018-04-08 16:09:11');

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `id` int(11) NOT NULL,
  `msg_from` int(11) NOT NULL,
  `msg_to` int(11) NOT NULL,
  `msg_body` text NOT NULL,
  `msg_read` int(1) NOT NULL,
  `msg_thread` int(11) NOT NULL,
  `deleted` int(1) NOT NULL,
  `sent_on` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `message_threads`
--

CREATE TABLE `message_threads` (
  `id` int(11) NOT NULL,
  `msg_to` int(11) NOT NULL,
  `msg_from` int(11) NOT NULL,
  `msg_subject` varchar(255) NOT NULL,
  `last_update` datetime NOT NULL,
  `last_update_by` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `pages`
--

CREATE TABLE `pages` (
  `id` int(11) NOT NULL,
  `page` varchar(100) NOT NULL,
  `private` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `pages`
--

INSERT INTO `pages` (`id`, `page`, `private`) VALUES
(1, 'index.php', 0),
(2, 'z_us_root.php', 0),
(3, 'users/account.php', 1),
(4, 'users/admin.php', 1),
(5, 'users/admin_page.php', 1),
(6, 'users/admin_pages.php', 1),
(7, 'users/admin_permission.php', 1),
(8, 'users/admin_permissions.php', 1),
(9, 'users/admin_user.php', 1),
(10, 'users/admin_users.php', 1),
(11, 'users/edit_profile.php', 1),
(12, 'users/email_settings.php', 1),
(13, 'users/email_test.php', 1),
(14, 'users/forgot_password.php', 0),
(15, 'users/forgot_password_reset.php', 0),
(16, 'users/index.php', 0),
(17, 'users/init.php', 0),
(18, 'users/join.php', 0),
(19, 'users/joinThankYou.php', 0),
(20, 'users/login.php', 0),
(21, 'users/logout.php', 0),
(22, 'users/profile.php', 1),
(23, 'users/times.php', 0),
(24, 'users/user_settings.php', 1),
(25, 'users/verify.php', 0),
(26, 'users/verify_resend.php', 0),
(27, 'users/view_all_users.php', 1),
(28, 'usersc/empty.php', 0),
(31, 'users/oauth_success.php', 0),
(33, 'users/fb-callback.php', 0),
(37, 'users/check_updates.php', 1),
(38, 'users/google_helpers.php', 0),
(39, 'users/tomfoolery.php', 1),
(40, 'users/create_message.php', 1),
(41, 'users/messages.php', 1),
(42, 'users/message.php', 1),
(44, 'users/admin_backup.php', 1),
(45, 'users/maintenance.php', 0),
(50, 'users/business_scorecard_insert.php', 1),
(51, 'users/business_scorecard_business_list.php', 0),
(52, 'users/business_scorecard_details.php', 0),
(53, 'users/business_scorecard_submit.php', 0),
(54, 'users/business_scorecard_update.php', 0);

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` int(11) NOT NULL,
  `name` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`id`, `name`) VALUES
(1, 'User'),
(2, 'Administrator');

-- --------------------------------------------------------

--
-- Table structure for table `permission_page_matches`
--

CREATE TABLE `permission_page_matches` (
  `id` int(11) NOT NULL,
  `permission_id` int(15) NOT NULL,
  `page_id` int(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `permission_page_matches`
--

INSERT INTO `permission_page_matches` (`id`, `permission_id`, `page_id`) VALUES
(2, 2, 27),
(3, 1, 24),
(4, 1, 22),
(5, 2, 13),
(6, 2, 12),
(7, 1, 11),
(8, 2, 10),
(9, 2, 9),
(10, 2, 8),
(11, 2, 7),
(12, 2, 6),
(13, 2, 5),
(14, 2, 4),
(15, 1, 3),
(16, 2, 37),
(17, 2, 39),
(19, 2, 40),
(21, 2, 41),
(23, 2, 42),
(27, 1, 42),
(28, 1, 27),
(29, 1, 41),
(30, 1, 40),
(31, 2, 44),
(32, 1, 46),
(33, 1, 47),
(34, 1, 49),
(35, 1, 50),
(36, 1, 54),
(37, 2, 54);

-- --------------------------------------------------------

--
-- Table structure for table `profiles`
--

CREATE TABLE `profiles` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `bio` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `profiles`
--

INSERT INTO `profiles` (`id`, `user_id`, `bio`) VALUES
(1, 1, '<h1>This is the Admin\'s bio.</h1>'),
(2, 2, 'This is your bio'),
(3, 3, 'This is your bio'),
(4, 4, 'This is your bio'),
(5, 5, 'This is your bio'),
(6, 6, 'This is your bio'),
(7, 7, 'This is your bio'),
(8, 8, 'This is your bio');

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `id` int(50) NOT NULL,
  `recaptcha` int(1) NOT NULL DEFAULT '0',
  `force_ssl` int(1) NOT NULL,
  `login_type` varchar(20) NOT NULL,
  `css_sample` int(1) NOT NULL,
  `us_css1` varchar(255) NOT NULL,
  `us_css2` varchar(255) NOT NULL,
  `us_css3` varchar(255) NOT NULL,
  `css1` varchar(255) NOT NULL,
  `css2` varchar(255) NOT NULL,
  `css3` varchar(255) NOT NULL,
  `site_name` varchar(100) NOT NULL,
  `language` varchar(255) NOT NULL,
  `track_guest` int(1) NOT NULL,
  `site_offline` int(1) NOT NULL,
  `force_pr` int(1) NOT NULL,
  `reserved1` varchar(100) NOT NULL,
  `reserverd2` varchar(100) NOT NULL,
  `custom1` varchar(100) NOT NULL,
  `custom2` varchar(100) NOT NULL,
  `custom3` varchar(100) NOT NULL,
  `glogin` int(1) NOT NULL DEFAULT '0',
  `fblogin` int(1) NOT NULL,
  `gid` varchar(255) NOT NULL,
  `gsecret` varchar(255) NOT NULL,
  `gredirect` varchar(255) NOT NULL,
  `ghome` varchar(255) NOT NULL,
  `fbid` varchar(255) NOT NULL,
  `fbsecret` varchar(255) NOT NULL,
  `fbcallback` varchar(255) NOT NULL,
  `graph_ver` varchar(255) NOT NULL,
  `finalredir` varchar(255) NOT NULL,
  `req_cap` int(1) NOT NULL,
  `req_num` int(1) NOT NULL,
  `min_pw` int(2) NOT NULL,
  `max_pw` int(3) NOT NULL,
  `min_un` int(2) NOT NULL,
  `max_un` int(3) NOT NULL,
  `messaging` int(1) NOT NULL,
  `snooping` int(1) NOT NULL,
  `echouser` int(11) NOT NULL,
  `wys` int(1) NOT NULL,
  `change_un` int(1) NOT NULL,
  `backup_dest` varchar(255) NOT NULL,
  `backup_source` varchar(255) NOT NULL,
  `backup_table` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `recaptcha`, `force_ssl`, `login_type`, `css_sample`, `us_css1`, `us_css2`, `us_css3`, `css1`, `css2`, `css3`, `site_name`, `language`, `track_guest`, `site_offline`, `force_pr`, `reserved1`, `reserverd2`, `custom1`, `custom2`, `custom3`, `glogin`, `fblogin`, `gid`, `gsecret`, `gredirect`, `ghome`, `fbid`, `fbsecret`, `fbcallback`, `graph_ver`, `finalredir`, `req_cap`, `req_num`, `min_pw`, `max_pw`, `min_un`, `max_un`, `messaging`, `snooping`, `echouser`, `wys`, `change_un`, `backup_dest`, `backup_source`, `backup_table`) VALUES
(1, 0, 0, '', 1, '../users/css/color_schemes/standard.css', '../users/css/sb-admin.css', '../users/css/custom.css', '', '', '', 'Business Scorecard', 'en', 1, 0, 0, '', '', '', '', '', 0, 0, 'Google ID Here', 'Google Secret Here', 'http://localhost/userspice/users/oauth_success.php', 'http://localhost/userspice/', 'FB ID Here', 'FB Secret Here', 'http://localhost/userspice/users/fb-callback.php', 'v2.2', 'account.php', 1, 1, 6, 20, 2, 40, 0, 1, 0, 1, 0, '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `email` varchar(155) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `fname` varchar(255) NOT NULL,
  `lname` varchar(255) NOT NULL,
  `permissions` int(11) NOT NULL,
  `logins` int(100) NOT NULL,
  `account_owner` tinyint(4) NOT NULL DEFAULT '0',
  `account_id` int(11) NOT NULL DEFAULT '0',
  `company` varchar(255) NOT NULL,
  `stripe_cust_id` varchar(255) NOT NULL,
  `billing_phone` varchar(20) NOT NULL,
  `billing_srt1` varchar(255) NOT NULL,
  `billing_srt2` varchar(255) NOT NULL,
  `billing_city` varchar(255) NOT NULL,
  `billing_state` varchar(255) NOT NULL,
  `billing_zip_code` varchar(255) NOT NULL,
  `join_date` datetime NOT NULL,
  `last_login` datetime NOT NULL,
  `email_verified` tinyint(4) NOT NULL DEFAULT '0',
  `vericode` varchar(15) NOT NULL,
  `title` varchar(100) NOT NULL,
  `active` int(1) NOT NULL,
  `custom1` varchar(255) NOT NULL,
  `custom2` varchar(255) NOT NULL,
  `custom3` varchar(255) NOT NULL,
  `custom4` varchar(255) NOT NULL,
  `custom5` varchar(255) NOT NULL,
  `oauth_provider` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `oauth_uid` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `gender` varchar(10) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `locale` varchar(10) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `gpluslink` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `picture` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  `fb_uid` varchar(255) NOT NULL,
  `un_changed` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `email`, `username`, `password`, `fname`, `lname`, `permissions`, `logins`, `account_owner`, `account_id`, `company`, `stripe_cust_id`, `billing_phone`, `billing_srt1`, `billing_srt2`, `billing_city`, `billing_state`, `billing_zip_code`, `join_date`, `last_login`, `email_verified`, `vericode`, `title`, `active`, `custom1`, `custom2`, `custom3`, `custom4`, `custom5`, `oauth_provider`, `oauth_uid`, `gender`, `locale`, `gpluslink`, `picture`, `created`, `modified`, `fb_uid`, `un_changed`) VALUES
(1, 'userspicephp@gmail.com', 'admin', '$2y$12$1v06jm2KMOXuuo3qP7erTuTIJFOnzhpds1Moa8BadnUUeX0RV3ex.', 'Dan', 'Hoover', 1, 46, 1, 0, 'UserSpice', '', '', '', '', '', '', '', '2016-01-01 00:00:00', '2017-09-16 21:32:41', 1, '322418', '', 0, '', '', '', '', '', '', '', '', '', '', '', '0000-00-00 00:00:00', '1899-11-30 00:00:00', '', 0),
(2, 'noreply@userspice.com', 'user', '$2y$12$HZa0/d7evKvuHO8I3U8Ff.pOjJqsGTZqlX8qURratzP./EvWetbkK', 'Sample', 'User', 1, 5, 1, 0, 'none', '', '', '', '', '', '', '', '2016-01-02 00:00:00', '2017-02-20 12:14:10', 1, '970748', '', 1, '', '', '', '', '', '', '', '', '', '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', 0),
(3, 'stavast@gmail.com', 'john', '$2y$12$65l5dAzUGbQQUBBC/FZT/.ElTK9xQlI0/Wli6bToJUNEHmuji38Sm', 'john', 'stavast', 1, 1, 1, 0, '', '', '', '', '', '', '', '', '2017-08-14 01:10:17', '2017-08-14 01:10:32', 1, '270649', '', 1, '', '', '', '', '', '', '', '', '', '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', 0),
(4, 'stavast1@gmail.com', 'john1', '$2y$12$ohczgoOTXe0DoUo9y3T7cOokQ6do.wM2zSKvBtBahogITMVIs4aO6', 'john', 'stavast', 1, 30, 1, 0, '', '', '', '', '', '', '', '', '2017-08-16 02:52:21', '2018-03-06 05:26:34', 1, '760719', '', 1, '', '', '', '', '', '', '', '', '', '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', 0),
(5, 'stavasts@gmail.com', 'shirley', '$2y$12$1cpe1vJl88umr7MPDOl44.1tFTISxqAZKjDUoHIf3cV92onhFFvKu', 'shirley', 'stavast', 1, 6, 1, 0, '', '', '', '', '', '', '', '', '2017-09-05 04:01:23', '2017-11-23 19:37:25', 1, '601359', '', 1, '', '', '', '', '', '', '', '', '', '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', 0),
(6, 'sam@gmail.com', 'sam', '$2y$12$EOhCOIMjzDR0O3PIeV2opeW6gWBEqgeos99qoGo8wzYXQPqjxrKsy', 'sam', 'stavast', 1, 4, 1, 0, '', '', '', '', '', '', '', '', '2017-09-27 02:42:34', '2018-01-18 04:44:57', 1, '729569', '', 1, '', '', '', '', '', '', '', '', '', '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', 0),
(7, 'mitchell@gmail.com', 'samanthaM', '$2y$12$Cpue5mQLjvlgJRIbfOWh7.OoCDuyPy5t/pe0mMCc91IYMsxIOPz.C', 'samantha', 'mitchell', 1, 4, 1, 0, '', '', '', '', '', '', '', '', '2018-02-25 04:24:49', '2018-03-06 05:25:48', 1, '746870', '', 1, '', '', '', '', '', '', '', '', '', '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', 0),
(8, 'bpm@email.com', 'bpm', '$2y$12$vnE2KOGmmVjrxeHbb2.5peHJ1nLRBXinkPj6oL2zrH1cEGnLmd3By', 'senior', 'project', 1, 6, 1, 0, '', '', '', '', '', '', '', '', '2018-03-11 04:26:49', '2018-04-07 23:18:24', 1, '507595', '', 1, '', '', '', '', '', '', '', '', '', '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', 0);

-- --------------------------------------------------------

--
-- Table structure for table `users_online`
--

CREATE TABLE `users_online` (
  `id` int(10) NOT NULL,
  `ip` varchar(15) NOT NULL,
  `timestamp` varchar(15) NOT NULL,
  `user_id` int(10) NOT NULL,
  `session` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users_online`
--

INSERT INTO `users_online` (`id`, `ip`, `timestamp`, `user_id`, `session`) VALUES
(1, '::1', '1505597599', 1, ''),
(4, '::1', '1520314331', 4, ''),
(6, '::1', '1511670968', 5, ''),
(7, '::1', '1517291192', 6, ''),
(8, '::1', '1520313959', 7, ''),
(9, '::1', '1523225568', 8, '');

-- --------------------------------------------------------

--
-- Table structure for table `users_session`
--

CREATE TABLE `users_session` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `hash` varchar(255) NOT NULL,
  `uagent` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users_session`
--

INSERT INTO `users_session` (`id`, `user_id`, `hash`, `uagent`) VALUES
(1, 5, 'a5f640647436d91730ce4f8838cb88a5d30b20ad3d91e93aeb759a3276ea4dfc', 'Mozilla (Windows NT 10.0; WOW64; rv:54.0) Gecko Firefox');

-- --------------------------------------------------------

--
-- Table structure for table `user_permission_matches`
--

CREATE TABLE `user_permission_matches` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `permission_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user_permission_matches`
--

INSERT INTO `user_permission_matches` (`id`, `user_id`, `permission_id`) VALUES
(100, 1, 1),
(101, 1, 2),
(102, 2, 1),
(104, 3, 1),
(105, 4, 1),
(106, 5, 1),
(107, 6, 1),
(108, 7, 1),
(109, 8, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `assets`
--
ALTER TABLE `assets`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`),
  ADD KEY `Busines` (`business_id`);

--
-- Indexes for table `audit`
--
ALTER TABLE `audit`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `business`
--
ALTER TABLE `business`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`),
  ADD KEY `business owner` (`user_id`);

--
-- Indexes for table `business_scorecard`
--
ALTER TABLE `business_scorecard`
  ADD PRIMARY KEY (`id`),
  ADD KEY `users_id` (`users_id`);

--
-- Indexes for table `email`
--
ALTER TABLE `email`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `keys`
--
ALTER TABLE `keys`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `liabilities`
--
ALTER TABLE `liabilities`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`),
  ADD KEY `Business ID` (`business_id`);

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `message_threads`
--
ALTER TABLE `message_threads`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pages`
--
ALTER TABLE `pages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `permission_page_matches`
--
ALTER TABLE `permission_page_matches`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `profiles`
--
ALTER TABLE `profiles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `EMAIL` (`email`) USING BTREE;

--
-- Indexes for table `users_online`
--
ALTER TABLE `users_online`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users_session`
--
ALTER TABLE `users_session`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_permission_matches`
--
ALTER TABLE `user_permission_matches`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `assets`
--
ALTER TABLE `assets`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `audit`
--
ALTER TABLE `audit`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `business`
--
ALTER TABLE `business`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `business_scorecard`
--
ALTER TABLE `business_scorecard`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=434;

--
-- AUTO_INCREMENT for table `email`
--
ALTER TABLE `email`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `keys`
--
ALTER TABLE `keys`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `liabilities`
--
ALTER TABLE `liabilities`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `message_threads`
--
ALTER TABLE `message_threads`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pages`
--
ALTER TABLE `pages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `permission_page_matches`
--
ALTER TABLE `permission_page_matches`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `profiles`
--
ALTER TABLE `profiles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `users_online`
--
ALTER TABLE `users_online`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `users_session`
--
ALTER TABLE `users_session`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `user_permission_matches`
--
ALTER TABLE `user_permission_matches`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=110;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `assets`
--
ALTER TABLE `assets`
  ADD CONSTRAINT `Busines` FOREIGN KEY (`business_id`) REFERENCES `business` (`id`);

--
-- Constraints for table `business`
--
ALTER TABLE `business`
  ADD CONSTRAINT `business owner` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `liabilities`
--
ALTER TABLE `liabilities`
  ADD CONSTRAINT `Business ID` FOREIGN KEY (`business_id`) REFERENCES `business` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
