-- phpMyAdmin SQL Dump
-- version 4.5.2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: May 06, 2017 at 02:13 PM
-- Server version: 10.1.19-MariaDB
-- PHP Version: 5.6.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `name_search`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `user_name` varchar(100) NOT NULL,
  `first_name` varchar(100) NOT NULL,
  `last_name` varchar(100) NOT NULL,
  `user_email` varchar(100) NOT NULL,
  `user_pass` varchar(100) NOT NULL,
  `role` int(1) NOT NULL,
  `activation_key` varchar(100) NOT NULL,
  `registered_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `user_name`, `first_name`, `last_name`, `user_email`, `user_pass`, `role`, `activation_key`, `registered_at`) VALUES
(1, 'laxgExJ5GzkvHBx/2tkZKhgf9KMAZMXMkF6lyq5wI8I=', 'laxgExJ5GzkvHBx/2tkZKhgf9KMAZMXMkF6lyq5wI8I=', 'laxgExJ5GzkvHBx/2tkZKhgf9KMAZMXMkF6lyq5wI8I=', 'h3H9caA50sngh9EnGLMuNUXpv74p5+fevmfPIB/E6EM=', '$1$fb2a54d6$.ut6Fznndc6XIJFuwuFkS.', 1, '', '2016-04-08 19:05:43'),
(2, 's74KbSkVq+ard4k/uunXYsuXnLkTTpXYjYj7CBMMq+U=', 'gLr7n9gQ5Gxi00qPJ7Q9ehH0UpgiwnftkQYmRJM5i0M=', 'GO9E/FLn81w50BHHCdCZL5PuXt6jSXUO61aAELzBtwI=', 'rO4dEO+xOO5VRUFVXEBy4RQEBeNn1lKEVU8KBQ2usa4=', '$1$fb2a54d6$Pu11dl39xaN52GVqOzU8a1', 2, '6FRBSp3W2rV9nQ7qJ', '2016-04-14 13:21:07'),
(3, 'gLr7n9gQ5Gxi00qPJ7Q9ehH0UpgiwnftkQYmRJM5i0M=', 'gLr7n9gQ5Gxi00qPJ7Q9ehH0UpgiwnftkQYmRJM5i0M=', 'GO9E/FLn81w50BHHCdCZL5PuXt6jSXUO61aAELzBtwI=', 'wPdnjruBwdnZyZnSxbbA1BtrQxym1mxWOIotuR4d0EI=', '$1$fb2a54d6$uhn4U377.ZZRG/55Yvax1/', 2, '', '2017-05-06 11:14:16');

-- --------------------------------------------------------

--
-- Table structure for table `company_names`
--

CREATE TABLE `company_names` (
  `id` int(11) NOT NULL,
  `company_name` varchar(100) NOT NULL,
  `director_1` varchar(100) NOT NULL,
  `director_2` varchar(100) NOT NULL,
  `director_3` varchar(100) NOT NULL,
  `reg_by` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `deleted`
--

CREATE TABLE `deleted` (
  `id` int(11) NOT NULL,
  `company_name` varchar(100) NOT NULL,
  `first_name` varchar(100) NOT NULL,
  `last_name` varchar(100) NOT NULL,
  `nat_id` varchar(100) NOT NULL,
  `user_phone` varchar(100) NOT NULL,
  `user_email` varchar(100) NOT NULL,
  `payment_id` varchar(100) NOT NULL,
  `del_by` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `deleted`
--

INSERT INTO `deleted` (`id`, `company_name`, `first_name`, `last_name`, `nat_id`, `user_phone`, `user_email`, `payment_id`, `del_by`, `created_at`) VALUES
(8, '0qyM3hwE6G3X6XLPjNzZfJOKkWRi3diz38EuLMR+iW8=', 'TLBexd9Nea9ol87w6v2CtNN0LZbbinkQrbfCC84XC5g=', '4JwC6iFsaoRPiMi2HyMNYXH/r74rwmG/GjjT9eF3rRg= ', 'pxEjWzKsMpuAPPEWN2SELmfRKD+gG1sn3R4r/bIdZXI=', 'ZjTuIQwxIrya76AGnQHat4fI7RAz0b5//EGrQj4RCII=', 'iRvFKR2AqhVenryEfiINeYCvKXM/860Exo4SnnphVuY=', '85P990493T9112522', 0, '2017-05-06 11:06:00');

-- --------------------------------------------------------

--
-- Table structure for table `mpesa`
--

CREATE TABLE `mpesa` (
  `id` int(11) NOT NULL,
  `payer_no` varchar(100) NOT NULL,
  `payer_email` varchar(100) NOT NULL,
  `trx_id` varchar(100) NOT NULL,
  `payer_name` varchar(100) NOT NULL,
  `amount` varchar(100) NOT NULL,
  `currency` varchar(100) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `onhold_names`
--

CREATE TABLE `onhold_names` (
  `id` int(11) NOT NULL,
  `company_name` varchar(100) NOT NULL,
  `first_name` varchar(100) NOT NULL,
  `last_name` varchar(100) NOT NULL,
  `nat_id` varchar(100) NOT NULL,
  `user_phone` varchar(100) NOT NULL,
  `user_email` varchar(100) NOT NULL,
  `kay` varchar(100) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `onhold_names`
--

INSERT INTO `onhold_names` (`id`, `company_name`, `first_name`, `last_name`, `nat_id`, `user_phone`, `user_email`, `kay`, `created_at`) VALUES
(8, '0qyM3hwE6G3X6XLPjNzZfJOKkWRi3diz38EuLMR+iW8=', 'TLBexd9Nea9ol87w6v2CtNN0LZbbinkQrbfCC84XC5g=', '4JwC6iFsaoRPiMi2HyMNYXH/r74rwmG/GjjT9eF3rRg=', 'pxEjWzKsMpuAPPEWN2SELmfRKD+gG1sn3R4r/bIdZXI=', 'ZjTuIQwxIrya76AGnQHat4fI7RAz0b5//EGrQj4RCII=', 'iRvFKR2AqhVenryEfiINeYCvKXM/860Exo4SnnphVuY=', 'MMUfDHYSPHwRsDf', '2017-05-06 11:04:29');

-- --------------------------------------------------------

--
-- Table structure for table `payments`
--

CREATE TABLE `payments` (
  `id` int(11) NOT NULL,
  `payer_name` varchar(100) NOT NULL,
  `payer_email` varchar(100) NOT NULL,
  `trx_id` varchar(100) NOT NULL,
  `amount` decimal(10,0) NOT NULL,
  `currency` varchar(10) NOT NULL,
  `c_name` varchar(100) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `payments`
--

INSERT INTO `payments` (`id`, `payer_name`, `payer_email`, `trx_id`, `amount`, `currency`, `c_name`, `created_at`) VALUES
(1, 'vbzOPNNY8YMp3Q4zdROX5pQB2zgJNbP8cSzFTZVjoy8=', 'fDoMbcCPSW6MVECEaM5sVC7kOBfy7n9c3+njp8A+tKU=', '39L64026136023223 ', '3', 'USD', 'CycSnLZzcrTD7WA9+nDFN+L+bnQXos56SdNIHeD3C6c=', '2016-04-08 17:41:19'),
(3, 'vbzOPNNY8YMp3Q4zdROX5pQB2zgJNbP8cSzFTZVjoy8=', 'fDoMbcCPSW6MVECEaM5sVC7kOBfy7n9c3+njp8A+tKU=', '76L92818SY0096615 ', '3', 'USD', 'qbde/kcWKCZq9hmOwGmEVBgZJxykO7IHghKulrmGd18=', '2016-04-08 17:45:44'),
(4, 'vbzOPNNY8YMp3Q4zdROX5pQB2zgJNbP8cSzFTZVjoy8=', 'fDoMbcCPSW6MVECEaM5sVC7kOBfy7n9c3+njp8A+tKU=', '8SD54013WB365350Y ', '3', 'USD', 'Mh/Kv4iW9kHtq32c/KW9fucD1VAri8HZBW3F/wjEjW8=', '2016-04-08 17:49:03'),
(6, 'vbzOPNNY8YMp3Q4zdROX5pQB2zgJNbP8cSzFTZVjoy8=', 'fDoMbcCPSW6MVECEaM5sVC7kOBfy7n9c3+njp8A+tKU=', '4L8924402D5482612 ', '3', 'USD', 'pKeAD2AdRlL69bwaQMyEtRGYT4/CQCYJXGuKKvXCFnU=', '2016-04-08 18:11:39'),
(7, 'vbzOPNNY8YMp3Q4zdROX5pQB2zgJNbP8cSzFTZVjoy8=', 'fDoMbcCPSW6MVECEaM5sVC7kOBfy7n9c3+njp8A+tKU=', '5DK59643KC152451A ', '3', 'USD', 'CItQWgBlhMBqVE4K83Am+VmtN2KifymKfAzK/DOd9OU=', '2016-04-08 18:15:28'),
(8, 'vbzOPNNY8YMp3Q4zdROX5pQB2zgJNbP8cSzFTZVjoy8=', 'fDoMbcCPSW6MVECEaM5sVC7kOBfy7n9c3+njp8A+tKU=', '21U29067R8383972R ', '3', 'USD', 'wOUmoSwqhNLqHrPsHxP39nDPtmxQPr8G9iHDZ0TzDsA=', '2016-05-05 10:28:26'),
(9, 'vbzOPNNY8YMp3Q4zdROX5pQB2zgJNbP8cSzFTZVjoy8=', 'fDoMbcCPSW6MVECEaM5sVC7kOBfy7n9c3+njp8A+tKU=', '7KW75841L6625622L ', '3', 'USD', 'YqpPPzdGHJgcOjg45mLFJ9dxIZYAJgmG/Pr+gbiXD/0=', '2016-05-05 11:24:58'),
(10, 'vbzOPNNY8YMp3Q4zdROX5pQB2zgJNbP8cSzFTZVjoy8=', 'fDoMbcCPSW6MVECEaM5sVC7kOBfy7n9c3+njp8A+tKU=', '1SC03331VL1435405 ', '3', 'USD', 'ZMOkC7W3RMXOgQkIwEK1a6B6KLoB4OZ7xqmUM9ixytM=', '2017-05-06 09:42:14'),
(11, 'vbzOPNNY8YMp3Q4zdROX5pQB2zgJNbP8cSzFTZVjoy8=', 'fDoMbcCPSW6MVECEaM5sVC7kOBfy7n9c3+njp8A+tKU=', '85P990493T9112522 ', '3', 'USD', '0qyM3hwE6G3X6XLPjNzZfJOKkWRi3diz38EuLMR+iW8=', '2017-05-06 11:06:00');

-- --------------------------------------------------------

--
-- Table structure for table `paypal`
--

CREATE TABLE `paypal` (
  `id` int(11) NOT NULL,
  `payer_name` varchar(100) NOT NULL,
  `payer_email` varchar(100) NOT NULL,
  `trx_id` varchar(100) NOT NULL,
  `amount` decimal(10,0) NOT NULL,
  `currency` varchar(10) NOT NULL,
  `c_name` varchar(100) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `paypal`
--

INSERT INTO `paypal` (`id`, `payer_name`, `payer_email`, `trx_id`, `amount`, `currency`, `c_name`, `created_at`) VALUES
(1, 'vbzOPNNY8YMp3Q4zdROX5pQB2zgJNbP8cSzFTZVjoy8=', 'fDoMbcCPSW6MVECEaM5sVC7kOBfy7n9c3+njp8A+tKU=', '39L64026136023223 ', '3', 'USD', 'CycSnLZzcrTD7WA9+nDFN+L+bnQXos56SdNIHeD3C6c=', '2016-04-08 17:41:19'),
(3, 'vbzOPNNY8YMp3Q4zdROX5pQB2zgJNbP8cSzFTZVjoy8=', 'fDoMbcCPSW6MVECEaM5sVC7kOBfy7n9c3+njp8A+tKU=', '76L92818SY0096615 ', '3', 'USD', 'qbde/kcWKCZq9hmOwGmEVBgZJxykO7IHghKulrmGd18=', '2016-04-08 17:45:44'),
(4, 'vbzOPNNY8YMp3Q4zdROX5pQB2zgJNbP8cSzFTZVjoy8=', 'fDoMbcCPSW6MVECEaM5sVC7kOBfy7n9c3+njp8A+tKU=', '8SD54013WB365350Y ', '3', 'USD', 'Mh/Kv4iW9kHtq32c/KW9fucD1VAri8HZBW3F/wjEjW8=', '2016-04-08 17:49:03'),
(6, 'vbzOPNNY8YMp3Q4zdROX5pQB2zgJNbP8cSzFTZVjoy8=', 'fDoMbcCPSW6MVECEaM5sVC7kOBfy7n9c3+njp8A+tKU=', '4L8924402D5482612 ', '3', 'USD', 'pKeAD2AdRlL69bwaQMyEtRGYT4/CQCYJXGuKKvXCFnU=', '2016-04-08 18:11:39'),
(7, 'vbzOPNNY8YMp3Q4zdROX5pQB2zgJNbP8cSzFTZVjoy8=', 'fDoMbcCPSW6MVECEaM5sVC7kOBfy7n9c3+njp8A+tKU=', '5DK59643KC152451A ', '3', 'USD', 'CItQWgBlhMBqVE4K83Am+VmtN2KifymKfAzK/DOd9OU=', '2016-04-08 18:15:28'),
(8, 'vbzOPNNY8YMp3Q4zdROX5pQB2zgJNbP8cSzFTZVjoy8=', 'fDoMbcCPSW6MVECEaM5sVC7kOBfy7n9c3+njp8A+tKU=', '21U29067R8383972R ', '3', 'USD', 'wOUmoSwqhNLqHrPsHxP39nDPtmxQPr8G9iHDZ0TzDsA=', '2016-05-05 10:28:26'),
(9, 'vbzOPNNY8YMp3Q4zdROX5pQB2zgJNbP8cSzFTZVjoy8=', 'fDoMbcCPSW6MVECEaM5sVC7kOBfy7n9c3+njp8A+tKU=', '7KW75841L6625622L ', '3', 'USD', 'YqpPPzdGHJgcOjg45mLFJ9dxIZYAJgmG/Pr+gbiXD/0=', '2016-05-05 11:24:58'),
(10, 'vbzOPNNY8YMp3Q4zdROX5pQB2zgJNbP8cSzFTZVjoy8=', 'fDoMbcCPSW6MVECEaM5sVC7kOBfy7n9c3+njp8A+tKU=', '1SC03331VL1435405 ', '3', 'USD', 'ZMOkC7W3RMXOgQkIwEK1a6B6KLoB4OZ7xqmUM9ixytM=', '2017-05-06 09:42:14'),
(11, 'vbzOPNNY8YMp3Q4zdROX5pQB2zgJNbP8cSzFTZVjoy8=', 'fDoMbcCPSW6MVECEaM5sVC7kOBfy7n9c3+njp8A+tKU=', '85P990493T9112522 ', '3', 'USD', '0qyM3hwE6G3X6XLPjNzZfJOKkWRi3diz38EuLMR+iW8=', '2017-05-06 11:06:00');

-- --------------------------------------------------------

--
-- Table structure for table `reserved_names`
--

CREATE TABLE `reserved_names` (
  `id` int(11) NOT NULL,
  `company_name` varchar(100) NOT NULL,
  `first_name` varchar(100) NOT NULL,
  `last_name` varchar(100) NOT NULL,
  `nat_id` varchar(100) NOT NULL,
  `user_phone` varchar(100) NOT NULL,
  `user_email` varchar(100) NOT NULL,
  `payment_id` varchar(100) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `reserved_names`
--

INSERT INTO `reserved_names` (`id`, `company_name`, `first_name`, `last_name`, `nat_id`, `user_phone`, `user_email`, `payment_id`, `created_at`) VALUES
(14, 'ZMOkC7W3RMXOgQkIwEK1a6B6KLoB4OZ7xqmUM9ixytM=', 'gLr7n9gQ5Gxi00qPJ7Q9ehH0UpgiwnftkQYmRJM5i0M=', 'GO9E/FLn81w50BHHCdCZL5PuXt6jSXUO61aAELzBtwI= ', 'le1BQsDM51qkn8qKx/nlme038jId4VfIKkm0QLknJ+I=', 'kTTiZN79RN6aqHeZdSojI9+uI3VKL91jV3z4Rvl0JQ0=', 'xEBjZ2/0Mq/wzU0+sLxfc5Rq9TMBFK619m/ZjMjKMdM=', '1SC03331VL1435405', '2017-05-06 09:42:14');

-- --------------------------------------------------------

--
-- Table structure for table `searched_names`
--

CREATE TABLE `searched_names` (
  `id` int(11) NOT NULL,
  `search_count` bigint(20) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `searched_names`
--

INSERT INTO `searched_names` (`id`, `search_count`) VALUES
(1, 33);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `company_names`
--
ALTER TABLE `company_names`
  ADD PRIMARY KEY (`id`),
  ADD KEY `reg_by` (`reg_by`);

--
-- Indexes for table `deleted`
--
ALTER TABLE `deleted`
  ADD PRIMARY KEY (`id`),
  ADD KEY `del_by` (`del_by`);

--
-- Indexes for table `mpesa`
--
ALTER TABLE `mpesa`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `onhold_names`
--
ALTER TABLE `onhold_names`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `paypal`
--
ALTER TABLE `paypal`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `reserved_names`
--
ALTER TABLE `reserved_names`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `searched_names`
--
ALTER TABLE `searched_names`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `company_names`
--
ALTER TABLE `company_names`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `deleted`
--
ALTER TABLE `deleted`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `mpesa`
--
ALTER TABLE `mpesa`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `onhold_names`
--
ALTER TABLE `onhold_names`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `payments`
--
ALTER TABLE `payments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `paypal`
--
ALTER TABLE `paypal`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `reserved_names`
--
ALTER TABLE `reserved_names`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT for table `searched_names`
--
ALTER TABLE `searched_names`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `company_names`
--
ALTER TABLE `company_names`
  ADD CONSTRAINT `company_names_ibfk_1` FOREIGN KEY (`reg_by`) REFERENCES `admin` (`id`) ON DELETE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
