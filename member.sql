-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- 主機： localhost
-- 產生時間： 
-- 伺服器版本： 8.0.17
-- PHP 版本： 7.3.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- 資料庫： `member`
--

-- --------------------------------------------------------

--
-- 資料表結構 `member`
--

CREATE TABLE `member` (
  `id` int(11) NOT NULL,
  `username` varchar(256) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(256) COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(256) COLLATE utf8_unicode_ci NOT NULL,
  `phone` varchar(256) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- 傾印資料表的資料 `member`
--

INSERT INTO `member` (`id`, `username`, `password`, `name`, `phone`) VALUES
(1, 'F109110111', 'n12573155', '', ''),
(2, '0xc7eBE8cdc2B787Fe0a56D024367FCc4eDCFB8D87', '125731553', 'owner', ''),
(3, 'F109161107', '123456789', 'hung', '0988168772'),
(4, '55688', '123456789', 'TT00', '0963051160');

--
-- 已傾印資料表的索引
--

--
-- 資料表索引 `member`
--
ALTER TABLE `member`
  ADD PRIMARY KEY (`id`);

--
-- 在傾印的資料表使用自動遞增(AUTO_INCREMENT)
--

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `member`
--
ALTER TABLE `member`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
