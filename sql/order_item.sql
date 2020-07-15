-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- 主機: 127.0.0.1
-- 產生時間： 2019-01-01 10:02:49
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
-- 資料表結構 `order_item`
--

CREATE TABLE `order_item` (
  `id` int(11) NOT NULL,
  `order_id` varchar(250) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL COMMENT '訂單編號',
  `product_id` int(11) DEFAULT NULL COMMENT '商品編號',
  `product_name` varchar(20) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL COMMENT '商品名稱',
  `product_price` int(11) NOT NULL COMMENT '商品價錢',
  `product_description` varchar(20) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL COMMENT '商品描述',
  `product_pic` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL COMMENT '商品圖片',
  `product_quantity` int(11) NOT NULL COMMENT '數量',
  `create_date` datetime DEFAULT CURRENT_TIMESTAMP COMMENT '建立時間'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- 資料表的匯出資料 `order_item`
--

INSERT INTO `order_item` (`id`, `order_id`, `product_id`, `product_name`, `product_price`, `product_description`, `product_pic`, `product_quantity`, `create_date`) VALUES
(24, '5c2b29099f68f', 3, '鑽石', 10000, '測試', '5c28db0152280.jpg', 5, '2019-01-01 16:47:05'),
(25, '5c2b29099f68f', 4, '天然無患子淨化洗髮露', 2000, '天然無患子淨化洗髮露，測試文字。', '5c28db2bea1e0.jpg', 2, '2019-01-01 16:47:05'),
(26, '5c2b29099f68f', 5, 'Chocolate Cake', 80, '好吃', '5c28db43edb2d.jpg', 6, '2019-01-01 16:47:05'),
(27, '5c2b29099f68f', 8, '中華古坑咖啡豆天皇級', 1000, '測試11111', '5c28dba400649.jpg', 4, '2019-01-01 16:47:05'),
(22, '5c2b268377549', 4, '天然無患子淨化洗髮露', 2000, '天然無患子淨化洗髮露，測試文字。', '5c28db2bea1e0.jpg', 3, '2019-01-01 16:36:19'),
(23, '5c2b268377549', 5, 'Chocolate Cake', 80, '好吃', '5c28db43edb2d.jpg', 10, '2019-01-01 16:36:19'),
(18, '5c2b123d5a0a9', 1, '伴手禮', 200, '測試文字測試文字測試文字', '5c28ca94bff30.gif', 2, '2019-01-01 15:09:49'),
(19, '5c2b123d5a0a9', 3, '鑽石', 10000, '測試', '5c28db0152280.jpg', 1, '2019-01-01 15:09:49'),
(20, '5c2b123d5a0a9', 5, 'Chocolate Cake', 80, '好吃', '5c28db43edb2d.jpg', 1, '2019-01-01 15:09:49'),
(21, '5c2b123d5a0a9', 9, '馬卡龍', 888, '好吃', '5c28dbbe6ceaf.jpg', 3, '2019-01-01 15:09:49'),
(15, '5c2afced30f9b', 1, '伴手禮', 200, '測試文字測試文字測試文字', '5c28ca94bff30.gif', 2, '2019-01-01 13:38:53'),
(16, '5c2afced30f9b', 2, '黑森林蛋糕1', 500, '測試內文', '5c28cf5ecaa5e.jpg', 3, '2019-01-01 13:38:53'),
(17, '5c2afced30f9b', 5, 'Chocolate Cake', 80, '好吃', '5c28db43edb2d.jpg', 1, '2019-01-01 13:38:53'),
(13, '5c2afce62e903', 1, '伴手禮', 200, '測試文字測試文字測試文字', '5c28ca94bff30.gif', 2, '2019-01-01 13:38:46'),
(14, '5c2afce62e903', 5, 'Chocolate Cake', 80, '好吃', '5c28db43edb2d.jpg', 3, '2019-01-01 13:38:46'),
(10, '5c2afcdde6fb1', 1, '伴手禮', 200, '測試文字測試文字測試文字', '5c28ca94bff30.gif', 2, '2019-01-01 13:38:37'),
(11, '5c2afcdde6fb1', 3, '鑽石', 10000, '測試', '5c28db0152280.jpg', 5, '2019-01-01 13:38:37'),
(12, '5c2afcdde6fb1', 5, 'Chocolate Cake', 80, '好吃', '5c28db43edb2d.jpg', 1, '2019-01-01 13:38:37'),
(7, '5c2afcdd8cb33', 1, '伴手禮', 200, '測試文字測試文字測試文字', '5c28ca94bff30.gif', 2, '2019-01-01 13:38:37'),
(8, '5c2afcdd8cb33', 3, '鑽石', 10000, '測試', '5c28db0152280.jpg', 5, '2019-01-01 13:38:37'),
(9, '5c2afcdd8cb33', 5, 'Chocolate Cake', 80, '好吃', '5c28db43edb2d.jpg', 1, '2019-01-01 13:38:37'),
(4, '5c2afcdd22071', 1, '伴手禮', 200, '測試文字測試文字測試文字', '5c28ca94bff30.gif', 2, '2019-01-01 13:38:37'),
(5, '5c2afcdd22071', 3, '鑽石', 10000, '測試', '5c28db0152280.jpg', 5, '2019-01-01 13:38:37'),
(6, '5c2afcdd22071', 5, 'Chocolate Cake', 80, '好吃', '5c28db43edb2d.jpg', 1, '2019-01-01 13:38:37'),
(1, '5c2afcb567eaf', 1, '伴手禮', 200, '測試文字測試文字測試文字', '5c28ca94bff30.gif', 2, '2019-01-01 13:37:57'),
(2, '5c2afcb567eaf', 3, '鑽石', 10000, '測試', '5c28db0152280.jpg', 5, '2019-01-01 13:37:57'),
(3, '5c2afcb567eaf', 5, 'Chocolate Cake', 80, '好吃', '5c28db43edb2d.jpg', 1, '2019-01-01 13:37:57');

--
-- 已匯出資料表的索引
--

--
-- 資料表索引 `order_item`
--
ALTER TABLE `order_item`
  ADD PRIMARY KEY (`id`);

--
-- 在匯出的資料表使用 AUTO_INCREMENT
--

--
-- 使用資料表 AUTO_INCREMENT `order_item`
--
ALTER TABLE `order_item`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
