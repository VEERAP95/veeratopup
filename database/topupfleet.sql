-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jan 10, 2024 at 06:12 PM
-- Server version: 5.7.44-cll-lve
-- PHP Version: 8.1.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `topupfleet`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `name` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(250) COLLATE utf8_unicode_ci DEFAULT NULL,
  `password` varchar(250) COLLATE utf8_unicode_ci DEFAULT NULL,
  `status` int(2) NOT NULL,
  `address` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `city` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `country` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `pincode` varchar(6) COLLATE utf8_unicode_ci DEFAULT NULL,
  `description` varchar(250) COLLATE utf8_unicode_ci DEFAULT NULL,
  `mobile` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `whatsapp_token` varchar(250) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `name`, `email`, `password`, `status`, `address`, `city`, `country`, `pincode`, `description`, `mobile`, `whatsapp_token`) VALUES
(1, 'ADMIN', 'admin@admin.com', 'e10adc3949ba59abbe56e057f20f883e', 0, 'dankuni', 'KOLKATA', NULL, NULL, NULL, '9801041300', 'zzzzzz');

-- --------------------------------------------------------

--
-- Table structure for table `api`
--

CREATE TABLE `api` (
  `id` int(11) NOT NULL,
  `ding_key` varchar(250) COLLATE utf8_unicode_ci DEFAULT NULL,
  `stripe_key` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `stripe_secret` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `paypal_email` varchar(250) COLLATE utf8_unicode_ci DEFAULT NULL,
  `PayPalClientId` varchar(250) COLLATE utf8_unicode_ci DEFAULT NULL,
  `PayPalSecret` varchar(250) COLLATE utf8_unicode_ci DEFAULT NULL,
  `PayPalENV` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `api`
--

INSERT INTO `api` (`id`, `ding_key`, `stripe_key`, `stripe_secret`, `paypal_email`, `PayPalClientId`, `PayPalSecret`, `PayPalENV`) VALUES
(1, 'Io8S9F39rIc5XfLuNMvAXe', 'pk_live_51O6I1YSDedKdF5QKdnFRUOi9w3SB8Jy0oKmrqXgicDZF5jvhxUXA27dZb0SdXapfJvCV8idCCXQuoyAIjeQm41H400oLeMNI92', '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', 'Panduv20@gmail.com', 'AUW_wk9SeGp6RxnD-cW2UTBVu-pRdSFTbPgcjFDzPGnIiH0RWh6REyBTDxnGx8CnunBeOz1Qp1hrUcKP', 'EMUiyiV0WodZjF_Sw92sjFI0pL08P7nBqIGxsnbEYEeeUuIbNCXYfHyGANfghXUBCv96dsLFbuDLAWRF', 1);

-- --------------------------------------------------------

--
-- Table structure for table `emailsetting`
--

CREATE TABLE `emailsetting` (
  `id` int(11) NOT NULL,
  `type` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `port` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `host` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `password` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ssl_type` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `emailsetting`
--

INSERT INTO `emailsetting` (`id`, `type`, `port`, `host`, `email`, `password`, `ssl_type`) VALUES
(1, 'smtp', '465', 'gmail.com', 'care@gmail.com', '11111', 'ssl');

-- --------------------------------------------------------

--
-- Table structure for table `rech_reports`
--

CREATE TABLE `rech_reports` (
  `id` int(11) NOT NULL,
  `email` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `number` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `amount` decimal(12,2) NOT NULL,
  `operator` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `optid` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `status` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `rch_time` datetime NOT NULL,
  `api_log` longtext COLLATE utf8_unicode_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `rech_reports`
--

INSERT INTO `rech_reports` (`id`, `email`, `number`, `amount`, `operator`, `optid`, `status`, `rch_time`, `api_log`) VALUES
(4, 'gameserver365@gmail.com', '919801041300', 0.50, 'Airtel India', '55X8929603380400T', 'SUCCESS', '2024-01-08 01:47:29', '{\"TransferRecord\":{\"TransferId\":{\"TransferRef\":\"689568796\",\"DistributorRef\":\"55X8929603380400T\"},\"SkuCode\":\"AIIN48846\",\"Price\":{\"CustomerFee\":0.00,\"DistributorFee\":0.00,\"ReceiveValue\":29.00,\"ReceiveCurrencyIso\":\"INR\",\"ReceiveValueExcludingTax\":29.00,'),
(5, 'gameserver365@gmail.com', '919801041300', 0.50, 'Airtel India', 'PAYID-MWPOTUQ15885610VG4062841', 'SUCCESS', '2024-01-11 00:32:54', '{\"TransferRecord\":{\"TransferId\":{\"TransferRef\":\"690201246\",\"DistributorRef\":\"PAYID-MWPOTUQ15885610VG4062841\"},\"SkuCode\":\"AIIN48846\",\"Price\":{\"CustomerFee\":0.00,\"DistributorFee\":0.00,\"ReceiveValue\":29.00,\"ReceiveCurrencyIso\":\"INR\",\"ReceiveValueExcludingTax\":29.00,\"TaxRate\":0,\"SendValue\":0.5,\"SendCurrencyIso\":\"USD\"},\"CommissionApplied\":0.07,\"StartedUtc\":\"2024-01-10T19:02:52Z\",\"CompletedUtc\":\"2024-01-10T19:02:54Z\",\"ProcessingState\":\"Complete\",\"AccountNumber\":\"919801041300\"},\"ResultCode\":1,\"ErrorCodes\":[]}');

-- --------------------------------------------------------

--
-- Table structure for table `slider`
--

CREATE TABLE `slider` (
  `id` int(11) NOT NULL,
  `s1` varchar(250) COLLATE utf8_unicode_ci DEFAULT NULL,
  `s2` varchar(250) COLLATE utf8_unicode_ci DEFAULT NULL,
  `s3` varchar(250) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `slider`
--

INSERT INTO `slider` (`id`, `s1`, `s2`, `s3`) VALUES
(1, NULL, 'ss', 'sss');

-- --------------------------------------------------------

--
-- Table structure for table `transaction`
--

CREATE TABLE `transaction` (
  `id` int(11) NOT NULL,
  `email` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `credit_amount` decimal(12,2) NOT NULL,
  `debit_amount` decimal(12,2) NOT NULL,
  `tdate` datetime NOT NULL,
  `type` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `txnid` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `status` varchar(20) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `transaction`
--

INSERT INTO `transaction` (`id`, `email`, `credit_amount`, `debit_amount`, `tdate`, `type`, `txnid`, `status`) VALUES
(2, 'gameserver365@gmail.com', 0.00, 10.00, '2023-07-28 03:00:00', 'RECHARGE Vie Wallet', '1', 'PENDING'),
(3, 'gameserver365@gmail.com', 10.00, 0.00, '2023-12-31 16:39:45', 'Add Wallet', '65914BF83810B755353629', 'SUCCESS'),
(4, 'gameserver365@gmail.com', 0.00, 0.50, '2023-12-31 16:42:15', 'Recharge Vie Card', '65914C8903AC4637928669', 'SUCCESS'),
(5, 'gameserver365@gmail.com', 10.00, 0.00, '2024-01-08 01:38:30', 'Add Wallet', '97U460881N288280K', 'SUCCESS'),
(6, 'gameserver365@gmail.com', 10.00, 0.00, '2024-01-08 01:39:34', 'Add Wallet', '1UB96251U3894515N', 'SUCCESS'),
(7, 'gameserver365@gmail.com', 5.00, 0.00, '2024-01-08 01:43:15', 'Add Wallet', '77580519J6227101U', 'SUCCESS'),
(8, 'gameserver365@gmail.com', 0.00, 0.50, '2024-01-08 01:47:29', 'Recharge Vie Paypal', '55X8929603380400T', 'SUCCESS'),
(9, 'gameserver365@gmail.com', 10.00, 0.00, '2024-01-11 00:31:15', 'Add Wallet', 'PAYID-MWPOSVA24501369WB1594903', 'SUCCESS'),
(10, 'gameserver365@gmail.com', 0.00, 0.50, '2024-01-11 00:32:54', 'Recharge Vie Paypal', 'PAYID-MWPOTUQ15885610VG4062841', 'SUCCESS');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(250) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(250) COLLATE utf8_unicode_ci DEFAULT NULL,
  `password` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `mobile` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `wallet` decimal(12,2) NOT NULL,
  `status` int(1) NOT NULL,
  `otp` varchar(5) COLLATE utf8_unicode_ci DEFAULT NULL,
  `rdate` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `mobile`, `wallet`, `status`, `otp`, `rdate`) VALUES
(3, 'test', 'gameserver365@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', '9122009884', 55.00, 0, '24789', '2023-11-15 01:59:14'),
(5, 'GAME SERVER', 'latesthdmovies365@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', '912222222', 0.00, 0, NULL, '2023-10-28 03:02:52'),
(6, 'vijay kumar', 'l9rtcrffc@mozmail.com', '2278a0f743d90e23b2fb4d009e6af10a', '91777777777', 0.00, 0, NULL, '2023-10-28 07:13:18'),
(7, 'sarif st', 'sariffst@gmail.com', 'f3a1cf387ac64a7f2a6a463a4a4542ed', '971543417314', 0.00, 0, NULL, '2023-10-28 13:47:39'),
(8, 'Sari Kk', 'sariff.st@gmail.com', 'f3a1cf387ac64a7f2a6a463a4a4542ed', '919848085458', 0.00, 0, NULL, '2023-10-29 10:06:59'),
(9, 'Alex Madison', 'aubaydullayev@gmail.com', '2af9b1ba42dc5eb01743e6b3759b6e4b', '16472085335', 0.00, 0, NULL, '2023-10-29 19:31:54'),
(10, 'Alex Joe', 'life.san@gmail.com', '133987b0b6ad0c01fc0ccbdae1b95449', '918187919983', 0.00, 0, NULL, '2023-10-30 02:10:54'),
(11, 'rafi hul', 'sa.r.iffst@gmail.com', 'a0ad3133a2e5db3ac1044d4cb1bf85f1', '97154337314', 0.00, 0, NULL, '2023-11-04 13:23:58');

-- --------------------------------------------------------

--
-- Table structure for table `webpage`
--

CREATE TABLE `webpage` (
  `id` int(11) NOT NULL,
  `terms` longtext COLLATE utf8_unicode_ci,
  `privacy` longtext COLLATE utf8_unicode_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `webpage`
--

INSERT INTO `webpage` (`id`, `terms`, `privacy`) VALUES
(1, '<p><strong>SSSSSterms</strong></p>\r\n', '<p>privacy</p>\r\n\r\n<table border=\"1\" cellpadding=\"1\" cellspacing=\"1\" style=\"width:500px\">\r\n	<tbody>\r\n		<tr>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n		</tr>\r\n		<tr>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n		</tr>\r\n		<tr>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n\r\n<p>&nbsp;</p>\r\n');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `api`
--
ALTER TABLE `api`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `emailsetting`
--
ALTER TABLE `emailsetting`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `rech_reports`
--
ALTER TABLE `rech_reports`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `slider`
--
ALTER TABLE `slider`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `transaction`
--
ALTER TABLE `transaction`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `webpage`
--
ALTER TABLE `webpage`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `api`
--
ALTER TABLE `api`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `emailsetting`
--
ALTER TABLE `emailsetting`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `rech_reports`
--
ALTER TABLE `rech_reports`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `slider`
--
ALTER TABLE `slider`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `transaction`
--
ALTER TABLE `transaction`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `webpage`
--
ALTER TABLE `webpage`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
