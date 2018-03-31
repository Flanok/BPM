-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 31, 2018 at 10:18 AM
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
-- Table structure for table `liabilities`
--

CREATE TABLE `liabilities` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `current_to_30_days` double DEFAULT '0',
  `31_60` double DEFAULT '0',
  `61_90` double DEFAULT '0',
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
  `total_liabilities` double DEFAULT '0',
  `business_id` int(11) UNSIGNED DEFAULT '1',
  `date` datetime DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `liabilities`
--

INSERT INTO `liabilities` (`id`, `current_to_30_days`, `31_60`, `61_90`, `over_90_days`, `total_accounts_payable`, `liens_judgments`, `customer_prepaid_accounts`, `deferred_salaries`, `accruals_taxes_payroll`, `balloon_payments`, `accrued_interest`, `other_total`, `debt_itemization`, `long_term_obligations`, `leases`, `total_liabilities`, `business_id`, `date`) VALUES
(1, 123, 123, 123, 321321, 321690, 321, 3213, 213, 21, 12312, 3, '16083', 321, 321, 321, NULL, 1, '2018-03-31 01:48:47'),
(2, 123, 123, 123, 321321, 321690, 321, 3213, 213, 21, 12312, 3, '16083', 321, 321, 321, NULL, 1, '2018-03-31 02:06:53'),
(3, 123, 123, 123, 321321, 321690, 321, 3213, 213, 21, 12312, 3, '16083', 321, 321, 321, NULL, 1, '2018-03-31 02:07:25');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `liabilities`
--
ALTER TABLE `liabilities`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`),
  ADD KEY `Business ID` (`business_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `liabilities`
--
ALTER TABLE `liabilities`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `liabilities`
--
ALTER TABLE `liabilities`
  ADD CONSTRAINT `Business ID` FOREIGN KEY (`business_id`) REFERENCES `business` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
