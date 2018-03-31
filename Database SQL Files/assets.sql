-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 31, 2018 at 10:17 AM
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
  `31_60_days` double DEFAULT '0',
  `61_90_days` double DEFAULT '0',
  `over_90_days` double DEFAULT '0',
  `accounts_receivable_total` double DEFAULT '0',
  `supplies` double DEFAULT '0',
  `miscellaneous` double DEFAULT '0',
  `inventory_total` double DEFAULT '0',
  `earned_rents_receivable` double DEFAULT '0',
  `current_portion_notes_rec` double DEFAULT '0',
  `other_total` double DEFAULT '0',
  `asset_total` double DEFAULT '0',
  `id` int(11) UNSIGNED NOT NULL,
  `date_time` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `business_id` int(11) UNSIGNED DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `assets`
--

INSERT INTO `assets` (`cash`, `checking`, `pay_pal_account`, `payroll_account_balance`, `savings`, `pre_paid_accounts`, `cash_and_equivalents_total`, `current_30_days`, `31_60_days`, `61_90_days`, `over_90_days`, `accounts_receivable_total`, `supplies`, `miscellaneous`, `inventory_total`, `earned_rents_receivable`, `current_portion_notes_rec`, `other_total`, `asset_total`, `id`, `date_time`, `business_id`) VALUES
(0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, '2018-03-29 21:59:01', 1),
(0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 2, '2018-03-29 21:59:42', 2),
(0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 3, '2018-03-30 13:46:27', NULL),
(0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 4, '2018-03-30 13:49:28', NULL),
(0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 5, '2018-03-30 13:49:46', NULL),
(0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 6, '2018-03-30 13:51:13', NULL),
(0, 65461, 0, 0, 0, 0, 65461, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 65461, 7, '2018-03-30 14:10:09', NULL),
(0, 65461, 0, 0, 0, 0, 65461, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 65461, 8, '2018-03-30 14:11:09', NULL),
(0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 9, '2018-03-30 14:11:29', NULL),
(0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 10, '2018-03-30 22:30:53', NULL),
(0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 11, '2018-03-30 22:32:40', NULL),
(741, 852, 963, 741, 852, 963, 4260, 741, 852, 963, 741, 3297, 741, 741, 1482, 741, 741, 741, 9780, 12, '2018-03-30 22:36:23', NULL),
(741, 852, 963, 741, 852, 963, 5112, 741, 852, 963, 741, 3297, 741, 741, 1482, 741, 741, 1482, 11373, 13, '2018-03-30 22:42:26', NULL),
(2, 123, 123, 1231, 321, 321, 2121, 32, 13, 21, 321, 387, 32132, 132, 32264, 13, 21, 34, 34806, 14, '2018-03-30 22:54:38', NULL),
(1, 1, 1, 1, 1, 1, 6, 1, 1, 1, 1, 4, 1, 1, 2, 1, 1, 2, 14, 15, '2018-03-31 02:13:23', 1);

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
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `assets`
--
ALTER TABLE `assets`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `assets`
--
ALTER TABLE `assets`
  ADD CONSTRAINT `Busines` FOREIGN KEY (`business_id`) REFERENCES `business` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
