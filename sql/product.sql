-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- 主機: 127.0.0.1
-- 產生時間： 2019-01-01 10:03:48
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
-- 資料表結構 `product`
--

CREATE TABLE `product` (
  `id` int(11) NOT NULL,
  `name` varchar(20) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL COMMENT '產品',
  `price` int(11) NOT NULL COMMENT '價錢',
  `description` varchar(20) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL COMMENT '描述',
  `pic` varchar(250) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL COMMENT '圖片',
  `quantity` int(11) NOT NULL COMMENT '數量',
  `create_date` datetime DEFAULT CURRENT_TIMESTAMP COMMENT '建立時間'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- 資料表的匯出資料 `product`
--

INSERT INTO `product` (`id`, `name`, `price`, `description`, `pic`, `quantity`, `create_date`) VALUES
(1, '伴手禮', 200, '測試文字測試文字測試文字', '5c28ca94bff30.gif', 10, '2018-12-30 21:39:32'),
(2, '黑森林蛋糕1', 500, '測試內文', '5c28cf5ecaa5e.jpg', 10, '2018-12-30 21:59:58'),
(3, '鑽石', 10000, '測試', '5c28db0152280.jpg', 2, '2018-12-30 22:49:37'),
(4, '天然無患子淨化洗髮露', 2000, '天然無患子淨化洗髮露，測試文字。', '5c28db2bea1e0.jpg', 10, '2018-12-30 22:50:19'),
(5, 'Chocolate Cake', 80, '好吃', '5c28db43edb2d.jpg', 100, '2018-12-30 22:50:43'),
(6, '明信片1', 10, '測試文字', '5c28db6c809b4.jpg', 200, '2018-12-30 22:51:24'),
(7, '米糠白芷皂', 125, '測試', '5c28db856c9f9.jpg', 10, '2018-12-30 22:51:49'),
(8, '中華古坑咖啡豆天皇級', 1000, '測試11111', '5c28dba400649.jpg', 10, '2018-12-30 22:52:20'),
(9, '馬卡龍', 888, '好吃', '5c28dbbe6ceaf.jpg', 10, '2018-12-30 22:52:46'),
(10, '乳液', 2000, '測試測試，好用。', '5c28dbe0c18ff.png', 10, '2018-12-30 22:53:20'),
(11, '素色馬克杯', 150, 'test測試', '5c28dc76b849a.jpg', 5, '2018-12-30 22:55:50'),
(12, '黑米火龍果皂', 100, '10', '5c28dc9291750.jpg', 5, '2018-12-30 22:56:18');

--
-- 已匯出資料表的索引
--

--
-- 資料表索引 `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`);

--
-- 在匯出的資料表使用 AUTO_INCREMENT
--

--
-- 使用資料表 AUTO_INCREMENT `product`
--
ALTER TABLE `product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
