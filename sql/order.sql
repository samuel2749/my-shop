-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- 主機: 127.0.0.1
-- 產生時間： 2019-01-01 10:01:50
-- 伺服器版本: 10.1.37-MariaDB
-- PHP 版本： 5.6.39

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- 資料庫： `my_shop`
--

-- --------------------------------------------------------

--
-- 資料表結構 `order`
--

CREATE TABLE `order` (
  `id` varchar(250) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `member_id` int(11) NOT NULL COMMENT '會員編號',
  `quantity` int(11) DEFAULT NULL COMMENT '數量',
  `total` int(11) DEFAULT NULL COMMENT '價錢',
  `status` int(2) DEFAULT NULL COMMENT '狀態',
  `create_date` datetime DEFAULT CURRENT_TIMESTAMP COMMENT '建立時間'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- 資料表的匯出資料 `order`
--

INSERT INTO `order` (`id`, `member_id`, `quantity`, `total`, `status`, `create_date`) VALUES
('5c2afcb567eaf', 1, 8, 50480, 1, '2019-01-01 13:37:57'),
('5c2afcdd22071', 1, 8, 50480, 1, '2019-01-01 13:38:37'),
('5c2afcdd8cb33', 1, 8, 50480, 1, '2019-01-01 13:38:37'),
('5c2afcdde6fb1', 1, 8, 50480, 1, '2019-01-01 13:38:37'),
('5c2afce62e903', 1, 6, 640, 0, '2019-01-01 13:38:46'),
('5c2afced30f9b', 1, 6, 1980, 1, '2019-01-01 13:38:53'),
('5c2b123d5a0a9', 1, 7, 13144, 1, '2019-01-01 15:09:49'),
('5c2b268377549', 1, 13, 6800, 1, '2019-01-01 16:36:19'),
('5c2b29099f68f', 1, 17, 58480, 1, '2019-01-01 16:47:05');

--
-- 已匯出資料表的索引
--

--
-- 資料表索引 `order`
--
ALTER TABLE `order`
  ADD PRIMARY KEY (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
