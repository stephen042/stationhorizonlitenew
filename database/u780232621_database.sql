-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Sep 17, 2024 at 10:23 PM
-- Server version: 10.11.8-MariaDB-cll-lve
-- PHP Version: 7.2.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `u780232621_database`
--

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE `contact` (
  `id` int(11) NOT NULL,
  `name` varchar(200) DEFAULT NULL,
  `email` varchar(200) DEFAULT NULL,
  `phone` varchar(200) DEFAULT NULL,
  `subject` varchar(200) DEFAULT NULL,
  `message` text DEFAULT NULL,
  `date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `image`
--

CREATE TABLE `image` (
  `id` int(11) NOT NULL,
  `image_id` varchar(100) DEFAULT NULL,
  `image` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `image`
--

INSERT INTO `image` (`id`, `image_id`, `image`) VALUES
(38, '11665586685.jpeg', '21665586685.jpeg');

-- --------------------------------------------------------

--
-- Table structure for table `kyc`
--

CREATE TABLE `kyc` (
  `kyc_id` int(11) NOT NULL,
  `kyc_user_id` varchar(200) DEFAULT NULL,
  `kyc_session` varchar(200) DEFAULT NULL,
  `fname` varchar(200) DEFAULT NULL,
  `lname` varchar(200) DEFAULT NULL,
  `email` varchar(200) DEFAULT NULL,
  `phone_number` mediumtext DEFAULT NULL,
  `country_code` varchar(200) DEFAULT NULL,
  `country` varchar(200) DEFAULT NULL,
  `gender` varchar(200) DEFAULT NULL,
  `year` varchar(200) DEFAULT NULL,
  `month` varchar(200) DEFAULT NULL,
  `day` varchar(200) DEFAULT NULL,
  `address` varchar(200) DEFAULT NULL,
  `zip_code` varchar(200) DEFAULT NULL,
  `apartment_number` varchar(200) DEFAULT NULL,
  `city` varchar(200) DEFAULT NULL,
  `state` varchar(200) DEFAULT NULL,
  `date` datetime DEFAULT current_timestamp(),
  `image` varchar(300) DEFAULT NULL,
  `image2` varchar(300) DEFAULT NULL,
  `type` varchar(300) DEFAULT NULL,
  `status` varchar(300) DEFAULT 'pending' COMMENT 'pending, active'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `kyc`
--

INSERT INTO `kyc` (`kyc_id`, `kyc_user_id`, `kyc_session`, `fname`, `lname`, `email`, `phone_number`, `country_code`, `country`, `gender`, `year`, `month`, `day`, `address`, `zip_code`, `apartment_number`, `city`, `state`, `date`, `image`, `image2`, `type`, `status`) VALUES
(7, 'pvD4jJv4nOahlK28g14n', '2', 'Clifford Alvin III', 'Lewis', 'chippenout@icloud.com', '9097696571', '1', 'United States', 'Male', '1966', 'Nov', '13', '1055 E 6th St SPC 1-8', '92223', 'N/A', 'Beaumont', 'California', '2024-05-12 11:05:08', 'ABC74374-3EA3-401C-95F3-447881C481E01715670416.jpeg', '20F226E1-DA50-4557-8248-F2DB1B5B1AA11715670416.jpeg', 'Driving License', 'pending'),
(8, 'dA67OO3cznrP96l71Mre', '2', 'Oghenero ', 'Ogege ', 'ogheneroogege@gmail.com', '08117656251', '234', 'Nigeria', 'Male', '2000', '08', '25', 'Enuru Irri Isoko South', '100001', '12', 'Oleh', 'Delta', '2024-05-15 11:57:04', 'IMG_20240515_125407_8801715774220.jpg', 'IMG_20240515_125407_6631715774220.jpg', 'National ID', 'active'),
(9, 'VwGFJv2pNwNNyDmhyb57', '2', 'Malitsitso Idelette', 'Rapontso', 'litsoaneitumeleng@gmail.com', '+26659350817', '266', 'Lesotho', 'Female', '1981', '08', '06', 'Sebothoane Box 220,Leribe', '0300', 'next,to,Jehovah\'s witness hall', 'Hlotse', 'Lesotho', '2024-05-15 13:07:31', 'IMG_20240515_125407_8801715775140.jpg', 'IMG_20240515_125407_6631715775140.jpg', 'National ID', 'pending'),
(10, '62qcGMuq52x55hkcRsn6', '2', 'SAVIOUR', 'OKWEGBE', 'saviourokwegbe@gmail.com', '08147176262', '234', 'Angola', 'Male', '1998', 'May', '27', 'FMC ASABA', '320242', '14676)??', 'ASABA', 'DELTA STATE', '2024-05-15 13:39:18', 'IMG_56451715773203.jpeg', 'IMG_56451715773203.jpeg', 'Passport', 'pending');

-- --------------------------------------------------------

--
-- Table structure for table `nft`
--

CREATE TABLE `nft` (
  `nft_id` int(11) NOT NULL,
  `image` varchar(200) DEFAULT NULL,
  `name` varchar(200) DEFAULT NULL,
  `amount` varchar(200) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `nft`
--

INSERT INTO `nft` (`nft_id`, `image`, `name`, `amount`, `description`, `date`) VALUES
(2, '2E609D44-9A83-4893-8F08-C0CC114E7B05.jpeg', 'Abstraction 259', '2.18', 'Lorem ipsum dolor sit amet consectetur adipisicing...flex', '2022-09-12 17:30:51'),
(3, '887EE526-C9B9-45E0-B6F7-35A18D8A4409-1-300x300.png', 'Abstraction', '2.18', 'Lorem ipsum dolor sit amet consectetur adipisicing...', '2022-09-12 17:31:28'),
(4, '1D03CA7C-BD60-4067-BAC4-C24EDEDBDFE7-1-300x300.png', 'Abstraction 284', '0.18', 'Lorem ipsum dolor sit amet consectetur adipisicing...', '2022-09-12 17:31:54');

-- --------------------------------------------------------

--
-- Table structure for table `nft_collections`
--

CREATE TABLE `nft_collections` (
  `collections_id` int(11) NOT NULL,
  `collections_name` varchar(200) DEFAULT NULL,
  `collections_image` varchar(200) DEFAULT NULL,
  `collections_price` varchar(200) DEFAULT NULL,
  `collections_bid_price` varchar(200) DEFAULT NULL,
  `collections_status` varchar(200) DEFAULT 'pending',
  `date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `nft_collections`
--

INSERT INTO `nft_collections` (`collections_id`, `collections_name`, `collections_image`, `collections_price`, `collections_bid_price`, `collections_status`, `date`) VALUES
(2, 'Abstraction', '2E609D44-9A83-4893-8F08-C0CC114E7B05.jpeg', '2.18', '245', 'pending', '2022-10-08 01:54:12');

-- --------------------------------------------------------

--
-- Table structure for table `packages`
--

CREATE TABLE `packages` (
  `package_id` int(11) NOT NULL,
  `package_name` varchar(200) DEFAULT NULL,
  `package_min` varchar(200) DEFAULT NULL,
  `package_max` varchar(200) DEFAULT NULL,
  `package_interest` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `packages`
--

INSERT INTO `packages` (`package_id`, `package_name`, `package_min`, `package_max`, `package_interest`) VALUES
(1, 'BTC BALANCE', '500', '4999', '10'),
(2, 'GOLD BALANCE', '5000', '14999', '15'),
(3, 'CRUDE BALANCE', '15000', '49999', '20'),
(4, 'MARIJUANA BALANCE', '50000', '100000', '25');

-- --------------------------------------------------------

--
-- Table structure for table `profit`
--

CREATE TABLE `profit` (
  `profit_id` int(11) NOT NULL,
  `profit_user_id` varchar(200) DEFAULT NULL,
  `profit_amount` varchar(200) DEFAULT NULL,
  `start` varchar(200) DEFAULT NULL,
  `end` varchar(200) DEFAULT NULL,
  `status` varchar(200) DEFAULT 'inprogress',
  `stage` varchar(300) DEFAULT NULL,
  `date` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `profit`
--

INSERT INTO `profit` (`profit_id`, `profit_user_id`, `profit_amount`, `start`, `end`, `status`, `stage`, `date`) VALUES
(9, 'xcode', '100', '29', '30', 'inprogress', 'increase', '2022-09-23 09:10:43'),
(10, 'Frnak', '50', '29', '30', 'inprogress', 'increase', '2022-09-23 09:11:12'),
(11, 'Frnak', '50', '29', '30', 'inprogress', 'increase', '2022-09-23 09:12:36');

-- --------------------------------------------------------

--
-- Table structure for table `random`
--

CREATE TABLE `random` (
  `id` int(11) NOT NULL,
  `name` varchar(300) DEFAULT NULL,
  `country` varchar(300) DEFAULT NULL,
  `type` varchar(300) DEFAULT NULL,
  `amount` varchar(300) DEFAULT NULL,
  `text` longtext DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `random`
--

INSERT INTO `random` (`id`, `name`, `country`, `type`, `amount`, `text`) VALUES
(1, 'Jennifer ', 'USA', 'deposited', '5000', 'from USA just withdrew $10,200'),
(2, 'Frank Greg', 'England', 'withdrew', '2000', 'from England just deposited $50,000 \n'),
(3, 'Luke Fredrick', 'Uganda', 'deposited', '8400', 'from Uganda just created an account\n'),
(4, 'Austin Gz', 'Hungary', 'deposited', '2700', 'from Hungary just deposited $20,500'),
(5, 'Willson Quest', 'London', 'withdrew', '5400', 'from London just withdrew $63,500 \n'),
(6, 'Wealth John', 'South Africa', 'withdrew', '2300', 'from London just withdrew $90,200'),
(7, 'Amos Nat', 'Australia', 'deposited', '3400', 'from Australia just withdrew $60,550'),
(8, 'Jason ', 'Denmark', 'withdrew', '3900', 'from Denmark just deposited $17,350'),
(9, 'Kelvin ', 'Canada', 'deposited', '3900', 'from Canada just deposited $30,300'),
(10, 'Michael ', 'Belgium', 'withdrew', '10500', 'from USA just created an account'),
(11, 'Andrew', 'India', 'deposited', '11400', 'from India just withdrew $65,900'),
(12, 'Peter Steve', 'Ireland', 'withdrew', '12500', 'from Ireland just withdrew $105,000'),
(13, 'Wolly Scott', 'Australia', 'deposited', '7300', 'from USA just deposited $15,000'),
(14, 'Godson Lupez', 'Denmark', 'withdrew', '5900', 'from USA just deposited $35,300'),
(15, NULL, NULL, NULL, NULL, 'from USA  just deposited $38,100'),
(16, NULL, NULL, NULL, NULL, 'from Brazil just withdrew $56,000'),
(17, NULL, NULL, NULL, NULL, 'from France just withdrew $67,900'),
(18, NULL, NULL, NULL, NULL, 'from France just withdrew $50,500'),
(19, NULL, NULL, NULL, NULL, 'from Netherland just deposited $67,950 \n'),
(20, NULL, NULL, NULL, NULL, 'from Netherland just deposited $27,500 \n'),
(21, NULL, NULL, NULL, NULL, 'from USA just withdrew $58,000'),
(22, NULL, NULL, NULL, NULL, 'from USA just withdrew $33,620'),
(23, NULL, NULL, NULL, NULL, 'from USA just created an account'),
(24, NULL, NULL, NULL, NULL, 'from USA just created an account'),
(25, NULL, NULL, NULL, NULL, 'from London just withdrew $63,500 \n'),
(26, NULL, NULL, NULL, NULL, 'Fredric M. from Tunisia just withdrew $45,000 \r\n'),
(27, NULL, NULL, NULL, NULL, 'Fernandez David from Tunisia just created an account'),
(28, NULL, NULL, NULL, NULL, 'Fernandez David from Tunisia just deposited $23,600'),
(29, NULL, NULL, NULL, NULL, 'Chamberlain from Tunisia just withdrew $50,900'),
(30, NULL, NULL, NULL, NULL, 'Gregory F. from London just withdrew $40,100'),
(31, NULL, NULL, NULL, NULL, 'Barbara M. from London just deposited $15,000'),
(32, NULL, NULL, NULL, NULL, 'Barbara M. from London just created an account'),
(33, NULL, NULL, NULL, NULL, 'McCann from London just deposited $25,000'),
(34, NULL, NULL, NULL, NULL, 'Barry J. from Sweden just withdrew $160,000'),
(35, NULL, NULL, NULL, NULL, 'Leonard N. from Sweden just withdrew $80,000'),
(36, NULL, NULL, NULL, NULL, 'Gardner from France just withdrew $85,000'),
(37, NULL, NULL, NULL, NULL, 'Zachary M. from France just withdrew $55,000'),
(38, NULL, NULL, NULL, NULL, 'Elizabeth G. from USA just created an account'),
(39, NULL, NULL, NULL, NULL, 'Nat Fred from Australia just withdrew $46,000'),
(40, NULL, NULL, NULL, NULL, 'Jacobs G. from USA just withdrew $66,000');

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `id` int(11) NOT NULL,
  `website_name` varchar(250) DEFAULT NULL,
  `website_url` varchar(250) DEFAULT NULL,
  `website_email` varchar(250) DEFAULT NULL,
  `admin_mail` varchar(250) DEFAULT NULL,
  `tidio_link` varchar(250) DEFAULT NULL,
  `bitcoin_address` varchar(250) DEFAULT NULL,
  `eth_address` varchar(300) DEFAULT NULL,
  `usdt_address` varchar(300) DEFAULT NULL,
  `usdc_address` varchar(300) DEFAULT NULL,
  `withdrawal_pin` varchar(300) DEFAULT NULL,
  `bitcoin_img` varchar(300) DEFAULT NULL,
  `eth_img` varchar(300) DEFAULT NULL,
  `usdt_img` varchar(300) DEFAULT NULL,
  `usdc_img` varchar(300) DEFAULT NULL,
  `logo_img` varchar(300) DEFAULT NULL,
  `token` varchar(300) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `website_name`, `website_url`, `website_email`, `admin_mail`, `tidio_link`, `bitcoin_address`, `eth_address`, `usdt_address`, `usdc_address`, `withdrawal_pin`, `bitcoin_img`, `eth_img`, `usdt_img`, `usdc_img`, `logo_img`, `token`) VALUES
(1, 'Capital Stock Investment Trade', 'https://capitalstockinvestmenttrade.com', 'support@capitalstockinvestmenttrade.com', 'support@capitalstockinvestmenttrade.com', 'code.tidio.co/zdpvdsrtypf3xit2rnt351vowt1kd7zk.js1', 'btc', 'eth', 'usdt', 'NIL', '284021', 'qrcode1666195614.jpg', 'qrcode11666195614.jpg', 'qrcode21666195614.jpg', 'Photo-Gallery1674309385.jpg', 'logo (1)1724492974.png', '915423');

-- --------------------------------------------------------

--
-- Table structure for table `transaction`
--

CREATE TABLE `transaction` (
  `transaction_id` int(11) NOT NULL,
  `transaction_user_id` varchar(200) DEFAULT NULL,
  `transaction_name` varchar(200) DEFAULT NULL,
  `transaction_type` varchar(200) DEFAULT NULL,
  `transaction_status` varchar(200) DEFAULT NULL,
  `t_mode` varchar(300) DEFAULT NULL,
  `transaction_amount` varchar(200) DEFAULT NULL,
  `eth` varchar(300) DEFAULT NULL,
  `wallet_address` varchar(300) DEFAULT NULL,
  `transaction_date` datetime NOT NULL DEFAULT current_timestamp(),
  `trade_won` varchar(200) DEFAULT '0',
  `trade_loss` varchar(200) DEFAULT '0',
  `method` varchar(300) DEFAULT NULL,
  `type_exe` varchar(300) DEFAULT NULL,
  `stop_loss` varchar(300) DEFAULT NULL,
  `take_profit` varchar(300) DEFAULT NULL,
  `pair_trade` varchar(300) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `transaction`
--

INSERT INTO `transaction` (`transaction_id`, `transaction_user_id`, `transaction_name`, `transaction_type`, `transaction_status`, `t_mode`, `transaction_amount`, `eth`, `wallet_address`, `transaction_date`, `trade_won`, `trade_loss`, `method`, `type_exe`, `stop_loss`, `take_profit`, `pair_trade`) VALUES
(130, 'xcode', 'Super Admin', 'trade', 'won', NULL, '200', NULL, NULL, '2023-02-11 13:16:54', '4', '7', NULL, 'EURUSD', '3.0000', '0.0001', 'EURUSD'),
(131, 'x96d8zJBhDZCWg39k123', 'John Doe', 'deposit', 'Rejected', 'ETH', '2070', '1', NULL, '2023-11-24 07:10:57', '0', '0', NULL, NULL, NULL, NULL, NULL),
(132, 'x96d8zJBhDZCWg39k123', 'John Doe', 'deposit', 'pending', 'USDT', '52', '', NULL, '2023-11-24 07:34:51', '0', '0', NULL, NULL, NULL, NULL, NULL),
(133, 'dA67OO3cznrP96l71Mre', 'Oghenero ogege ', 'trade', 'won', NULL, '100', NULL, NULL, '2024-05-10 13:46:21', '0', '0', NULL, 'Market Execuation', '2335', '2377', 'FACEBOOK INC'),
(134, 'dA67OO3cznrP96l71Mre', 'Oghenero ogege ', 'withdrawal', 'success', NULL, '1000', NULL, NULL, '2024-05-10 13:50:09', '0', '0', NULL, NULL, NULL, NULL, NULL),
(135, '62qcGMuq52x55hkcRsn6', 'campus pays', 'deposit', 'pending', 'BTC', '200', '', NULL, '2024-05-10 14:31:13', '0', '0', NULL, NULL, NULL, NULL, NULL),
(136, 'dA67OO3cznrP96l71Mre', 'Oghenero ogege ', 'trade', 'won', NULL, '1000', NULL, NULL, '2024-05-10 15:02:59', '1', '0', NULL, 'USDT/BTC', '2234', '2277', 'USDT/BTC'),
(137, 'dA67OO3cznrP96l71Mre', 'Oghenero ogege ', 'trade', 'won', NULL, '300', NULL, NULL, '2024-05-10 15:06:33', '0', '0', NULL, 'Market Execuation', '63100', '67000', 'USDT/BTC'),
(138, 'dA67OO3cznrP96l71Mre', 'Oghenero ogege ', 'trade', 'won', NULL, '20000', NULL, NULL, '2024-05-10 15:10:04', '1', '0', NULL, 'USDT/BTC', '62500', '64600', 'USDT/BTC'),
(139, 'dA67OO3cznrP96l71Mre', 'Oghenero ogege ', 'withdrawal', 'success', NULL, '1000', NULL, NULL, '2024-05-10 15:19:08', '0', '0', NULL, NULL, NULL, NULL, NULL),
(140, 'dA67OO3cznrP96l71Mre', 'Oghenero ogege ', 'trade', 'won', NULL, '1000', NULL, NULL, '2024-05-10 15:22:34', '0', '0', NULL, 'Pending Order', '1270', '1211', 'GBPUSD'),
(141, '62qcGMuq52x55hkcRsn6', 'campus pays', 'withdrawal', 'success', NULL, '2000', NULL, NULL, '2024-05-10 17:08:47', '0', '0', NULL, NULL, NULL, NULL, NULL),
(142, '62qcGMuq52x55hkcRsn6', 'campus pays', 'trade', 'won', NULL, '1000', NULL, NULL, '2024-05-10 17:29:55', '0', '0', NULL, 'Market Execuation', '100.0000', '200.0000', 'GBPUSD'),
(143, '62qcGMuq52x55hkcRsn6', 'campus pays', 'withdrawal', 'success', NULL, '10000', NULL, NULL, '2024-05-10 18:10:11', '0', '0', NULL, NULL, NULL, NULL, NULL),
(144, '62qcGMuq52x55hkcRsn6', 'campus pays', 'withdrawal', 'success', NULL, '1000', NULL, NULL, '2024-05-10 18:10:43', '0', '0', NULL, NULL, NULL, NULL, NULL),
(145, '62qcGMuq52x55hkcRsn6', 'campus pays', 'withdrawal', 'success', NULL, '19000', NULL, NULL, '2024-05-10 18:25:02', '0', '0', NULL, NULL, NULL, NULL, NULL),
(146, 'dA67OO3cznrP96l71Mre', 'Oghenero ogege ', 'trade', 'won', NULL, '100', NULL, NULL, '2024-05-10 19:59:49', '0', '0', NULL, 'Market Execuation', '57000', '63000', 'USDT/ETH'),
(147, 'dA67OO3cznrP96l71Mre', 'Oghenero ogege ', 'withdrawal', 'Rejected', NULL, '1000', NULL, NULL, '2024-05-10 20:02:21', '0', '0', NULL, NULL, NULL, NULL, NULL),
(148, 'pvD4jJv4nOahlK28g14n', 'Clifford Alvin Lewis III', 'trade', 'loss', NULL, '500', NULL, NULL, '2024-05-10 20:59:34', '0', '0', NULL, 'Pending Order', '0.0550', '0.0600', 'USDT/ETH'),
(149, 'pvD4jJv4nOahlK28g14n', NULL, 'Signal Plan', 'pending', NULL, '1500', NULL, NULL, '2024-05-10 21:05:08', '0', '0', NULL, NULL, NULL, NULL, NULL),
(150, 'pvD4jJv4nOahlK28g14n', NULL, 'plan', 'pending', NULL, '500', NULL, NULL, '2024-05-11 09:19:36', '0', '0', NULL, NULL, NULL, NULL, NULL),
(151, 'pvD4jJv4nOahlK28g14n', 'Clifford Alvin Lewis III', 'trade', 'loss', NULL, '250', NULL, NULL, '2024-05-11 09:30:11', '0', '0', NULL, 'Market Execuation', '0.0000', '0.0000', 'USDT/SOL'),
(152, 'pvD4jJv4nOahlK28g14n', 'Clifford Alvin Lewis III', 'deposit', 'pending', 'BTC', '500', '', NULL, '2024-05-11 09:32:25', '0', '0', NULL, NULL, NULL, NULL, NULL),
(153, 'VwGFJv2pNwNNyDmhyb57', 'Malitsitso Idelette Rapontso', 'withdrawal', 'Rejected', NULL, '73000', NULL, NULL, '2024-05-13 05:40:27', '0', '0', NULL, NULL, NULL, NULL, NULL),
(154, 'VwGFJv2pNwNNyDmhyb57', 'Malitsitso Idelette Rapontso', 'withdrawal', 'Rejected', NULL, '76000', NULL, NULL, '2024-05-14 19:20:57', '0', '0', NULL, NULL, NULL, NULL, NULL),
(155, 'VwGFJv2pNwNNyDmhyb57', 'Malitsitso Idelette Rapontso', 'withdrawal', 'Rejected', NULL, '76000', NULL, NULL, '2024-05-14 20:13:01', '0', '0', NULL, NULL, NULL, NULL, NULL),
(156, 'VwGFJv2pNwNNyDmhyb57', 'Malitsitso Idelette Rapontso', 'withdrawal', 'pending', NULL, '70000', NULL, NULL, '2024-05-15 09:51:34', '0', '0', NULL, NULL, NULL, NULL, NULL),
(157, 'dA67OO3cznrP96l71Mre', 'Oghenero ogege ', 'trade', 'pending', NULL, '100', NULL, NULL, '2024-05-15 14:57:52', '0', '0', NULL, 'Market Execuation', '2335', '2377', 'XAUUSD'),
(158, 'dA67OO3cznrP96l71Mre', 'Oghenero ogege ', 'trade', 'pending', NULL, '100', NULL, NULL, '2024-05-15 15:16:11', '0', '0', NULL, 'Market Execuation', '0.1900', '0.1700', 'XAUUSD'),
(159, 'VwGFJv2pNwNNyDmhyb57', 'Malitsitso Idelette Rapontso', 'withdrawal', 'pending', NULL, '70000', NULL, NULL, '2024-05-15 22:27:28', '0', '0', NULL, NULL, NULL, NULL, NULL),
(160, 'gfKPWl5wpZu89uagVrmm', 'Archana', 'withdrawal', 'pending', NULL, '2000', NULL, NULL, '2024-05-19 14:44:46', '0', '0', NULL, NULL, NULL, NULL, NULL),
(161, 'gfKPWl5wpZu89uagVrmm', 'Archana', 'withdrawal', 'pending', NULL, '1900', NULL, NULL, '2024-05-19 15:51:33', '0', '0', NULL, NULL, NULL, NULL, NULL),
(162, '527e5124cbc147de09cb', 'Terry', 'deposit', 'success', 'USDT', '3000', '', NULL, '2024-08-26 15:56:26', '0', '0', NULL, NULL, NULL, NULL, NULL),
(163, 'dA67OO3cznrP96l71Mre', NULL, 'plan', 'pending', NULL, '5000', NULL, NULL, '2024-08-29 13:49:43', '0', '0', NULL, NULL, NULL, NULL, NULL),
(164, 'de2c53b050ab3a6eed1c', 'Agustin Alarcon', 'deposit', 'pending', 'USDT', '10000', '', NULL, '2024-09-02 07:24:49', '0', '0', NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `user_id` varchar(250) DEFAULT NULL,
  `role` varchar(200) DEFAULT NULL,
  `full_name` varchar(250) DEFAULT NULL,
  `balance` varchar(250) DEFAULT '0',
  `profit` varchar(300) DEFAULT '0',
  `bonus` varchar(300) DEFAULT '0',
  `won` varchar(300) DEFAULT '0',
  `loss` varchar(300) DEFAULT '0',
  `eth_balance` varchar(300) DEFAULT '0',
  `username` varchar(250) DEFAULT NULL,
  `email` varchar(250) DEFAULT NULL,
  `password` varchar(250) DEFAULT NULL,
  `country` varchar(300) DEFAULT NULL,
  `gender` varchar(200) DEFAULT NULL,
  `image` varchar(300) DEFAULT 'avatar.png',
  `phone_number` varchar(250) DEFAULT NULL,
  `package` varchar(250) DEFAULT NULL,
  `package_status` varchar(200) DEFAULT NULL,
  `status` varchar(250) DEFAULT 'pending',
  `bill` varchar(600) NOT NULL DEFAULT 'active',
  `mode` varchar(200) DEFAULT 'dark',
  `currency` varchar(250) DEFAULT '$',
  `token` text DEFAULT NULL,
  `date` datetime NOT NULL DEFAULT current_timestamp(),
  `account_number` varchar(300) DEFAULT NULL,
  `account_name` varchar(300) DEFAULT NULL,
  `bank` varchar(300) DEFAULT NULL,
  `swift_code` varchar(300) DEFAULT NULL,
  `bitcoin_wallet` varchar(300) DEFAULT NULL,
  `eth_wallet` varchar(300) DEFAULT NULL,
  `cash_app` varchar(300) DEFAULT NULL,
  `paypal` varchar(300) DEFAULT NULL,
  `acct_status` varchar(300) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `user_id`, `role`, `full_name`, `balance`, `profit`, `bonus`, `won`, `loss`, `eth_balance`, `username`, `email`, `password`, `country`, `gender`, `image`, `phone_number`, `package`, `package_status`, `status`, `bill`, `mode`, `currency`, `token`, `date`, `account_number`, `account_name`, `bank`, `swift_code`, `bitcoin_wallet`, `eth_wallet`, `cash_app`, `paypal`, `acct_status`) VALUES
(1, 'xcode', 'admin', 'Super Admin', '0', '4300', '100', '9', '20', '5000', 'Admin', 'support@capitalstockinvestmenttrade.com', 'Kendollar$', 'bras', 'Male', 'avatar.png', '0901252732', 'Silver', 'active', 'active', '', 'dark', '$', 'SDuw5S2I0073ALJ', '2022-09-09 02:57:27', '111', 'sdsd', '32', 'asdf', 'asdfasdf', 'asdfasdf', 'asdf', 'pasd@gmai.ci', '1'),
(65, '527e5124cbc147de09cb', NULL, 'Terry', '4000', '100', '100', '0', '0', '0', 'Caldwell', 'caldwellterry502@gmail.com', 'Chelseafc1@1', 'United States', 'Male', 'avatar.png', '7744739816', NULL, NULL, 'active', 'Marijuana ', 'dark', '$', '67705097', '2024-08-24 14:40:13', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0'),
(67, 'de2c53b050ab3a6eed1c', NULL, 'Agustin Alarcon', '3500', '0.00', '0.00', '0', '0', '3850', 'agustin69', 'agustinnova69@gmail.com', '7143182027', 'United States', 'Male', 'avatar.png', '7143182027', NULL, NULL, 'active', 'Marijuana ', 'dark', '$', '846ddb', '2024-09-01 02:13:43', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0'),
(68, '09b4970fd55ce351ec0a', NULL, 'drfdfr', '0', '0', '0', '0', '0', '0', 'dfseftresr', 'd9hh96rwsx@zlorkun.com', 'John1234&amp;', 'India', NULL, 'avatar.png', '09857687234', NULL, NULL, 'active', 'active', 'dark', 'USD', '55302459', '2024-09-06 09:43:51', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `image`
--
ALTER TABLE `image`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kyc`
--
ALTER TABLE `kyc`
  ADD PRIMARY KEY (`kyc_id`);

--
-- Indexes for table `nft`
--
ALTER TABLE `nft`
  ADD PRIMARY KEY (`nft_id`);

--
-- Indexes for table `nft_collections`
--
ALTER TABLE `nft_collections`
  ADD PRIMARY KEY (`collections_id`);

--
-- Indexes for table `packages`
--
ALTER TABLE `packages`
  ADD PRIMARY KEY (`package_id`);

--
-- Indexes for table `profit`
--
ALTER TABLE `profit`
  ADD PRIMARY KEY (`profit_id`);

--
-- Indexes for table `random`
--
ALTER TABLE `random`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `transaction`
--
ALTER TABLE `transaction`
  ADD PRIMARY KEY (`transaction_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `contact`
--
ALTER TABLE `contact`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `image`
--
ALTER TABLE `image`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `kyc`
--
ALTER TABLE `kyc`
  MODIFY `kyc_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `nft`
--
ALTER TABLE `nft`
  MODIFY `nft_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `nft_collections`
--
ALTER TABLE `nft_collections`
  MODIFY `collections_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `packages`
--
ALTER TABLE `packages`
  MODIFY `package_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `profit`
--
ALTER TABLE `profit`
  MODIFY `profit_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `random`
--
ALTER TABLE `random`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `transaction`
--
ALTER TABLE `transaction`
  MODIFY `transaction_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=165;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=69;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
