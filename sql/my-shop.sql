
DROP TABLE IF EXISTS member;
CREATE TABLE `member` (
  `id` int(11) NOT NULL auto_increment,
  `name` varchar(20) collate utf8_unicode_ci NOT NULL COMMENT '姓名',
  `account` varchar(20) collate utf8_unicode_ci NOT NULL COMMENT '帳號',
  `password` varchar(20) collate utf8_unicode_ci NOT NULL COMMENT '密碼',
  `email` varchar(100) collate utf8_unicode_ci default NULL COMMENT '電子郵件',
  `phone` varchar(20) collate utf8_unicode_ci default NULL COMMENT '電話',
  `address` varchar(100) collate utf8_unicode_ci default NULL COMMENT '地址',
  `create_date` datetime default current_timestamp COMMENT "建立時間",
  PRIMARY KEY  (`id`),
  UNIQUE KEY `account` (`account`)
);

DROP TABLE IF EXISTS product;
CREATE TABLE `product` (
  `id` int(11) NOT NULL auto_increment,
  `name` varchar(20) collate utf8_unicode_ci NOT NULL COMMENT '產品',
  `price`  int(11) NOT NULL COMMENT '價錢',
  `description` varchar(20) collate utf8_unicode_ci NOT NULL COMMENT '描述',
  `pic` varchar(250) collate utf8_unicode_ci NOT NULL COMMENT '圖片',
  `quantity` int(11) not NULL COMMENT '數量',
  `create_date` datetime default current_timestamp COMMENT "建立時間",
  PRIMARY KEY  (`id`)
);

DROP TABLE IF EXISTS `order`;
CREATE TABLE `order` (
  `id` varchar(250) collate utf8_unicode_ci NOT NULL,
  `member_id` int(11) NOT NULL COMMENT '會員編號',
  `quantity` int(11) COMMENT '數量',
  `total` int(11) COMMENT '價錢',
  `status` int(2) COMMENT '狀態',
  `create_date` datetime default current_timestamp COMMENT "建立時間",
  PRIMARY KEY  (`id`)
);

DROP TABLE IF EXISTS order_item;
CREATE TABLE `order_item` (
  `id` int(11) NOT NULL auto_increment,
  `order_id` varchar(250) collate utf8_unicode_ci NOT NULL COMMENT '訂單編號',
  `product_id` int(11) COMMENT '商品編號',
  `product_name` varchar(20) collate utf8_unicode_ci NOT NULL COMMENT '商品名稱',
  `product_price`  int(11) NOT NULL COMMENT '商品價錢',
  `product_description` varchar(20) collate utf8_unicode_ci NOT NULL COMMENT '商品描述',
  `product_pic` varchar(100) collate utf8_unicode_ci NOT NULL COMMENT '商品圖片',
  `product_quantity` int(11) NOT NULL COMMENT '數量',
  `create_date` datetime default current_timestamp COMMENT "建立時間",
  PRIMARY KEY  (`id`)
);