-- phpMyAdmin SQL Dump
-- version 4.6.6
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: 2018-06-09 09:10:13
-- 服务器版本： 5.6.35-log
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `o2o`
--

-- --------------------------------------------------------

--
-- 表的结构 `o2o_area`
--

CREATE TABLE `o2o_area` (
  `id` int(11) UNSIGNED NOT NULL,
  `name` varchar(50) NOT NULL DEFAULT '',
  `city_id` int(11) UNSIGNED NOT NULL DEFAULT '0',
  `parent_id` int(11) UNSIGNED NOT NULL DEFAULT '0',
  `listorder` int(8) UNSIGNED NOT NULL DEFAULT '0',
  `status` int(1) NOT NULL DEFAULT '0',
  `create_time` int(11) UNSIGNED NOT NULL DEFAULT '0',
  `update_time` int(11) UNSIGNED NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- 表的结构 `o2o_bis`
--

CREATE TABLE `o2o_bis` (
  `id` int(11) UNSIGNED NOT NULL,
  `name` varchar(50) NOT NULL DEFAULT '',
  `email` varchar(50) NOT NULL DEFAULT '',
  `logo` varchar(255) NOT NULL DEFAULT '',
  `licence_logo` varchar(255) NOT NULL DEFAULT '',
  `description` text NOT NULL,
  `city_id` int(11) UNSIGNED NOT NULL DEFAULT '0',
  `city_path` varchar(50) NOT NULL DEFAULT '',
  `money` decimal(20,2) NOT NULL DEFAULT '0.00',
  `bank_info` varchar(50) NOT NULL DEFAULT '',
  `bank_name` varchar(50) NOT NULL DEFAULT '',
  `bank_user` varchar(50) NOT NULL DEFAULT '',
  `faren` varchar(20) NOT NULL DEFAULT '',
  `faren_tel` varchar(20) NOT NULL DEFAULT '',
  `listorder` int(8) UNSIGNED NOT NULL DEFAULT '0',
  `status` int(1) NOT NULL DEFAULT '0',
  `create_time` int(11) UNSIGNED NOT NULL DEFAULT '0',
  `update_time` int(11) UNSIGNED NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


--
-- 表的结构 `o2o_bis_account`
--

CREATE TABLE `o2o_bis_account` (
  `id` int(11) UNSIGNED NOT NULL,
  `username` varchar(50) NOT NULL DEFAULT '',
  `password` char(32) NOT NULL DEFAULT '',
  `code` varchar(10) NOT NULL DEFAULT '',
  `bis_id` int(11) UNSIGNED NOT NULL DEFAULT '0',
  `last_login_ip` varchar(20) NOT NULL DEFAULT '',
  `last_login_time` int(11) UNSIGNED NOT NULL DEFAULT '0',
  `is_main` int(1) UNSIGNED NOT NULL DEFAULT '0',
  `listorder` int(8) UNSIGNED NOT NULL DEFAULT '0',
  `status` int(1) NOT NULL DEFAULT '0',
  `create_time` int(11) UNSIGNED NOT NULL DEFAULT '0',
  `update_time` int(11) UNSIGNED NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;



-- --------------------------------------------------------

--
-- 表的结构 `o2o_bis_location`
--

CREATE TABLE `o2o_bis_location` (
  `id` int(11) UNSIGNED NOT NULL,
  `name` varchar(50) NOT NULL DEFAULT '',
  `logo` varchar(255) NOT NULL DEFAULT '',
  `address` varchar(255) NOT NULL DEFAULT '',
  `tel` varchar(20) NOT NULL DEFAULT '',
  `contact` varchar(20) NOT NULL DEFAULT '',
  `xpoint` varchar(20) NOT NULL DEFAULT '',
  `ypoint` varchar(20) NOT NULL DEFAULT '',
  `bis_id` int(11) UNSIGNED NOT NULL DEFAULT '0',
  `city_id` int(11) UNSIGNED NOT NULL DEFAULT '0',
  `city_path` varchar(50) NOT NULL DEFAULT '',
  `open_time` varchar(50) NOT NULL DEFAULT '',
  `content` text NOT NULL,
  `is_main` int(1) UNSIGNED NOT NULL DEFAULT '0',
  `api_address` varchar(255) NOT NULL DEFAULT '',
  `category_id` int(11) UNSIGNED NOT NULL DEFAULT '0',
  `category_path` varchar(50) NOT NULL DEFAULT '',
  `money` decimal(20,2) NOT NULL DEFAULT '0.00',
  `bank_info` varchar(50) NOT NULL DEFAULT '',
  `listorder` int(8) UNSIGNED NOT NULL DEFAULT '0',
  `status` int(1) NOT NULL DEFAULT '0',
  `create_time` int(11) UNSIGNED NOT NULL DEFAULT '0',
  `update_time` int(11) UNSIGNED NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


--
-- 表的结构 `o2o_category`
--

CREATE TABLE `o2o_category` (
  `id` int(11) UNSIGNED NOT NULL,
  `name` varchar(50) NOT NULL DEFAULT '',
  `parent_id` int(11) UNSIGNED NOT NULL DEFAULT '0',
  `listorder` int(8) UNSIGNED NOT NULL DEFAULT '0',
  `status` int(1) NOT NULL DEFAULT '0',
  `create_time` int(11) UNSIGNED NOT NULL DEFAULT '0',
  `update_time` int(11) UNSIGNED NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `o2o_category`
--

INSERT INTO `o2o_category` (`id`, `name`, `parent_id`, `listorder`, `status`, `create_time`, `update_time`) VALUES
(1, '美食', 0, 10, 1, 1527640294, 1528359228),
(2, '娱乐', 0, 9, 1, 1527640311, 1528359218),
(3, 'KTV', 2, 0, 1, 1527641694, 1528361275),
(4, '酒店', 0, 1, 1, 1527641924, 1528361364),
(5, '休闲', 0, 9, 1, 1527641936, 1528361290),
(6, '火锅', 1, 8, 1, 1527644043, 1528367031),
(7, '旅游', 0, 0, 1, 1527644842, 1528361329),
(8, '删除测试', 0, 0, -1, 1527648160, 1527648170),
(9, '数码', 0, 2, 1, 1527676533, 1528359205),
(10, '烤肉', 1, 2, 1, 1528105934, 1528367042),
(11, '服饰', 0, 8, 1, 1528278331, 1528359231),
(12, '男装', 11, 0, 1, 1528278366, 1528278366),
(13, '女装', 11, 0, 1, 1528278377, 1528278377),
(14, '烧烤', 1, 0, 1, 1528366985, 1528367044),
(15, '素食', 1, 6, 1, 1528366998, 1528367037),
(16, '川菜', 1, 7, 1, 1528367008, 1528367034),
(17, '自助餐', 1, 9, 1, 1528367015, 1528367061),
(18, '手机', 9, 9, 1, 1528367120, 1528367258),
(19, '台式电脑', 9, 8, 1, 1528367138, 1528367264),
(20, '笔记本电脑', 9, 8, 1, 1528367145, 1528367270),
(21, '相机', 9, 0, 1, 1528367155, 1528367267),
(22, '无人机', 9, 2, 1, 1528367165, 1528367277),
(23, 'VR', 9, 0, 1, 1528367174, 1528367174),
(24, 'Swith', 9, 0, 1, 1528367204, 1528367204),
(25, 'PS4', 9, 0, 1, 1528367211, 1528367211);

-- --------------------------------------------------------

--
-- 表的结构 `o2o_city`
--

CREATE TABLE `o2o_city` (
  `id` int(11) UNSIGNED NOT NULL,
  `name` varchar(50) NOT NULL DEFAULT '',
  `uname` varchar(50) NOT NULL DEFAULT '',
  `parent_id` int(11) UNSIGNED NOT NULL DEFAULT '0',
  `listorder` int(8) UNSIGNED NOT NULL DEFAULT '0',
  `status` int(1) NOT NULL DEFAULT '0',
  `create_time` int(11) UNSIGNED NOT NULL DEFAULT '0',
  `update_time` int(11) UNSIGNED NOT NULL DEFAULT '0',
  `is_default` int(1) UNSIGNED NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `o2o_city`
--

INSERT INTO `o2o_city` (`id`, `name`, `uname`, `parent_id`, `listorder`, `status`, `create_time`, `update_time`, `is_default`) VALUES
(1, '北京', 'beijing1', 0, 0, 1, 1527640294, 1527640294, 0),
(2, '北京', 'beijing', 1, 0, 1, 1527640294, 1527640294, 0),
(4, '江西', 'jiangxi', 0, 0, 1, 1527640294, 1527640294, 1),
(5, '南昌', 'nanchang', 4, 0, 1, 1527640294, 1527640294, 0),
(6, '上饶', 'shangrao', 4, 0, 1, 1527640294, 1527640294, 0),
(7, '抚州', 'fuzhou', 4, 0, 1, 1527640294, 1527640294, 0),
(8, '景德镇', 'jdz', 4, 0, 1, 1527640294, 1527640294, 1);

-- --------------------------------------------------------

--
-- 表的结构 `o2o_coupons`
--

CREATE TABLE `o2o_coupons` (
  `id` int(11) UNSIGNED NOT NULL,
  `sn` varchar(100) NOT NULL DEFAULT '',
  `password` varchar(100) NOT NULL DEFAULT '',
  `user_id` int(11) NOT NULL DEFAULT '0',
  `deal_id` int(11) NOT NULL DEFAULT '0',
  `order_id` int(11) NOT NULL DEFAULT '0',
  `status` int(1) NOT NULL DEFAULT '0' COMMENT '0  生成未发送 1已经发送 2已经使用 3禁用',
  `create_time` int(11) UNSIGNED NOT NULL DEFAULT '0',
  `update_time` int(11) UNSIGNED NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `o2o_coupons`
--

INSERT INTO `o2o_coupons` (`id`, `sn`, `password`, `user_id`, `deal_id`, `order_id`, `status`, `create_time`, `update_time`) VALUES
(1, '1528533940628743662', '68076', 3, 4, 8, 0, 1528533942, 1528533942);

-- --------------------------------------------------------

--
-- 表的结构 `o2o_deal`
--

CREATE TABLE `o2o_deal` (
  `id` int(11) UNSIGNED NOT NULL,
  `name` varchar(100) NOT NULL DEFAULT '',
  `category_id` int(11) UNSIGNED NOT NULL DEFAULT '0',
  `se_category_id` varchar(50) NOT NULL DEFAULT '',
  `bis_id` int(11) UNSIGNED NOT NULL DEFAULT '0',
  `location_ids` varchar(100) NOT NULL DEFAULT '',
  `image` varchar(200) NOT NULL DEFAULT '',
  `description` text NOT NULL,
  `start_time` int(11) NOT NULL DEFAULT '0',
  `end_time` int(11) NOT NULL DEFAULT '0',
  `origin_price` decimal(20,2) NOT NULL DEFAULT '0.00',
  `current_price` decimal(20,2) NOT NULL DEFAULT '0.00',
  `city_id` int(11) NOT NULL DEFAULT '0',
  `buy_count` int(11) NOT NULL DEFAULT '0',
  `total_count` int(11) NOT NULL DEFAULT '0',
  `coupons_begin_time` int(11) NOT NULL DEFAULT '0',
  `coupons_end_time` int(11) NOT NULL DEFAULT '0',
  `xpoint` varchar(20) NOT NULL DEFAULT '',
  `ypoint` varchar(20) NOT NULL DEFAULT '',
  `bis_account_id` int(11) NOT NULL DEFAULT '0',
  `balance_price` decimal(20,2) NOT NULL DEFAULT '0.00',
  `notes` text NOT NULL,
  `listorder` int(8) UNSIGNED NOT NULL DEFAULT '0',
  `status` int(1) NOT NULL DEFAULT '0',
  `create_time` int(11) UNSIGNED NOT NULL DEFAULT '0',
  `update_time` int(11) UNSIGNED NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `o2o_deal`
--

INSERT INTO `o2o_deal` (`id`, `name`, `category_id`, `se_category_id`, `bis_id`, `location_ids`, `image`, `description`, `start_time`, `end_time`, `origin_price`, `current_price`, `city_id`, `buy_count`, `total_count`, `coupons_begin_time`, `coupons_end_time`, `xpoint`, `ypoint`, `bis_account_id`, `balance_price`, `notes`, `listorder`, `status`, `create_time`, `update_time`) VALUES
(1, '团购一块钱', 1, '10,6', 5, '6', '/o2o/public/upload\\20180606\\2f0de1b66ce9ed34d50877749046ecd4.png', '<p>we</p>', 1528819200, 1529683200, '100.00', '1.00', 8, 0, 100, 1529510400, 1530201600, '113.26602767211', '23.131319515557', 1, '0.00', '<p>we</p>', 1, 1, 1528115090, 1528361463),
(2, '团购小香蕉', 1, '10', 5, '6', '/o2o/public/upload\\20180606\\2f0de1b66ce9ed34d50877749046ecd4.png', '<p>we</p>', 1528203780, 1530277380, '100.00', '1.00', 8, 0, 100, 1530104400, 1532696640, '113.26602767211', '23.131319515557', 1, '0.00', '<p>we</p>', 2, 1, 1528117453, 1528361459),
(3, '&lt;a&gt;huaq&lt;/a&gt;', 1, '', 5, '6,1', '/o2o/public/upload\\20180606\\2f0de1b66ce9ed34d50877749046ecd4.png', '<p>we</p>', 1528192680, 1528970340, '100.00', '1.00', 8, 0, 100, 1529488740, 1530266340, '113.26602767211', '23.131319515557', 1, '0.00', '&lt;p&gt;fqqfq&lt;/p&gt;', 4, 1, 1528192756, 1528361451),
(4, '游闲屋桌游吧(浦江店) ', 2, '', 5, '6,1', '/o2o/public/upload\\20180606\\2f0de1b66ce9ed34d50877749046ecd4.png', '<p>fq</p>', 1528195620, 1530269220, '999.00', '99.00', 8, 3, 100000, 1529491620, 1530355620, '113.26602767211', '23.131319515557', 1, '0.00', '<p>fq</p>', 1, 1, 1528282065, 1528361367),
(5, 'areyouok', 2, '', 5, '6', '/o2o/public/upload\\20180606\\2f0de1b66ce9ed34d50877749046ecd4.png', '<p>ad</p>', 1528368660, 1530355860, '1998.00', '9.80', 8, 0, 999999, 1530355860, 1530355860, '113.26602767211', '23.131319515557', 1, '0.00', '<p>ad</p>', 0, 1, 1528282308, 1528282325),
(6, '东方国际游泳培训俱乐部', 2, '', 5, '1', '/o2o/public/upload\\20180606\\1600e0f291a911f9b7c1595bf9ab8b9d.png', '<p>fq</p>', 1528455240, 1561805640, '199999.00', '9.90', 8, 0, 99, 1529664840, 1530356040, '113.26602767211', '23.131319515557', 1, '0.00', '<p>fq</p>', 0, 1, 1528282481, 1528282487),
(7, '奉浦体育俱乐部', 2, '', 5, '6,1', '/o2o/public/upload\\20180606\\74c060fd1bca25d7642f25785f94ea65.png', '<p>dfqw</p>', 1528116720, 1530363120, '9999.00', '9.00', 8, 0, 999, 1528894320, 1530363120, '113.26602767211', '23.131319515557', 1, '0.00', '<p>qdw</p>', 0, 1, 1528289560, 1528361162);

-- --------------------------------------------------------

--
-- 表的结构 `o2o_featured`
--

CREATE TABLE `o2o_featured` (
  `id` int(11) UNSIGNED NOT NULL,
  `type` int(1) NOT NULL DEFAULT '0',
  `title` varchar(30) NOT NULL DEFAULT '',
  `image` varchar(255) NOT NULL DEFAULT '',
  `url` varchar(255) NOT NULL DEFAULT '',
  `description` varchar(255) NOT NULL DEFAULT '',
  `listorder` int(8) UNSIGNED NOT NULL DEFAULT '0',
  `status` int(1) NOT NULL DEFAULT '0',
  `create_time` int(11) UNSIGNED NOT NULL DEFAULT '0',
  `update_time` int(11) UNSIGNED NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `o2o_featured`
--

INSERT INTO `o2o_featured` (`id`, `type`, `title`, `image`, `url`, `description`, `listorder`, `status`, `create_time`, `update_time`) VALUES
(2, 1, 'test', '/o2o/public/upload\\20180606\\4c9844153abea3a493039781e9d3dc93.png', '/o2o/public/upload\\20180605\\3e3255eb83ba0393cbc9ac38bcaa0ac0.jpg', '前方', 0, 1, 1528196617, 1528198876),
(3, 1, 'huaq', '/o2o/public/upload\\20180606\\b89b2a33db2975b0290d70be44077131.png', '/o2o/public/upload\\20180605\\3e3255eb83ba0393cbc9ac38bcaa0ac0.jpg', 'huaq', 0, -1, 1528251483, 1528347625),
(6, 1, 'tesetset', '/o2o/public/upload\\20180606\\4c9844153abea3a493039781e9d3dc93.png', 'tesetset', 'tesetset', 0, -1, 1528253872, 1528347630),
(10, 0, 'fqfq', '/o2o/public/upload\\20180606\\fba94cd09cb07e9da684237e621fe05d.jpg', 'qfqf', 'qfqfqf', 0, 1, 1528254876, 1528254894),
(11, 0, 'fqfq1', '/o2o/public/upload\\20180606\\2391eb93496311519b91ff90e06df0e5.png', 'qwe', 'qwe', 0, 1, 1528254885, 1528254892);

-- --------------------------------------------------------

--
-- 表的结构 `o2o_order`
--

CREATE TABLE `o2o_order` (
  `id` int(11) UNSIGNED NOT NULL,
  `out_trade_no` varchar(100) NOT NULL DEFAULT '',
  `transaction_id` varchar(100) NOT NULL DEFAULT '',
  `user_id` int(11) UNSIGNED NOT NULL DEFAULT '0',
  `username` varchar(50) NOT NULL DEFAULT '',
  `pay_time` varchar(20) NOT NULL DEFAULT '',
  `payment_id` int(1) NOT NULL DEFAULT '0',
  `deal_id` int(11) UNSIGNED NOT NULL DEFAULT '0',
  `deal_count` int(11) UNSIGNED NOT NULL DEFAULT '0',
  `pay_status` int(1) NOT NULL DEFAULT '0',
  `total_price` decimal(20,2) NOT NULL DEFAULT '0.00',
  `pay_price` decimal(20,2) NOT NULL DEFAULT '0.00',
  `status` int(1) NOT NULL DEFAULT '1',
  `referer` varchar(255) NOT NULL DEFAULT '',
  `create_time` int(11) UNSIGNED NOT NULL DEFAULT '0',
  `update_time` int(11) UNSIGNED NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `o2o_order`
--

INSERT INTO `o2o_order` (`id`, `out_trade_no`, `transaction_id`, `user_id`, `username`, `pay_time`, `payment_id`, `deal_id`, `deal_count`, `pay_status`, `total_price`, `pay_price`, `status`, `referer`, `create_time`, `update_time`) VALUES
(1, '1528452626316894641', '', 3, 'huaqhuaq', '', 0, 4, 2, 0, '198.00', '0.00', 1, 'http://localhost:8082/o2o/public/index/order/confirm.html?id=4&count=2', 1528452626, 1528452626),
(2, '1528452779805699664', '', 3, 'huaqhuaq', '', 0, 4, 3, 0, '297.00', '0.00', 1, 'http://localhost:8082/o2o/public/index/order/confirm.html?id=4&count=2', 1528452779, 1528452779),
(3, '1528452848725666445', '', 3, 'huaqhuaq', '', 0, 4, 4, 0, '396.00', '0.00', 0, 'http://localhost:8082/o2o/public/index/order/confirm.html?id=4&count=2', 1528452848, 1528452848),
(4, '1528452941558910318', '', 3, 'huaqhuaq', '', 0, 4, 6, 0, '594.00', '0.00', 0, 'http://localhost:8082/o2o/public/index/order/confirm.html?id=4&count=2', 1528452941, 1528452941),
(5, '15284569719350509', '', 3, 'huaqhuaq', '', 0, 4, 2, 0, '198.00', '0.00', 0, 'http://localhost:8082/o2o/public/index/order/confirm.html?id=4&count=2', 1528456971, 1528456971),
(6, '1528456982427019893', '6', 3, 'huaqhuaq', '1528459517', 0, 4, 2, 0, '198.00', '0.00', 0, 'http://localhost:8082/o2o/public/index/order/confirm.html?id=4&count=2', 1528456982, 1528459517),
(7, '1528459981377539451', '7', 3, 'huaqhuaq', '1528459982', 0, 4, 1, 0, '99.00', '0.00', 0, 'http://localhost:8082/o2o/public/index/order/confirm.html?id=4&count=1', 1528459981, 1528459982),
(8, '1528533940628743662', '8', 3, 'huaqhuaq', '1528533942', 0, 4, 2, 0, '198.00', '0.00', 1, 'http://localhost:8082/o2o/public/index/order/confirm.html?id=4&count=1', 1528533940, 1528533942);

-- --------------------------------------------------------

--
-- 表的结构 `o2o_user`
--

CREATE TABLE `o2o_user` (
  `id` int(11) UNSIGNED NOT NULL,
  `username` varchar(50) NOT NULL DEFAULT '',
  `password` char(32) NOT NULL DEFAULT '',
  `code` varchar(10) NOT NULL DEFAULT '',
  `last_login_ip` varchar(20) NOT NULL DEFAULT '',
  `last_login_time` int(11) UNSIGNED NOT NULL DEFAULT '0',
  `email` varchar(30) NOT NULL DEFAULT '',
  `mobile` varchar(20) NOT NULL DEFAULT '',
  `listorder` int(8) UNSIGNED NOT NULL DEFAULT '0',
  `status` int(1) NOT NULL DEFAULT '0',
  `create_time` int(11) UNSIGNED NOT NULL DEFAULT '0',
  `update_time` int(11) UNSIGNED NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


--
-- Indexes for dumped tables
--

--
-- Indexes for table `o2o_area`
--
ALTER TABLE `o2o_area`
  ADD PRIMARY KEY (`id`),
  ADD KEY `parent_id` (`parent_id`),
  ADD KEY `city_id` (`city_id`);

--
-- Indexes for table `o2o_bis`
--
ALTER TABLE `o2o_bis`
  ADD PRIMARY KEY (`id`),
  ADD KEY `name` (`name`),
  ADD KEY `city_id` (`city_id`);

--
-- Indexes for table `o2o_bis_account`
--
ALTER TABLE `o2o_bis_account`
  ADD PRIMARY KEY (`id`),
  ADD KEY `username` (`username`),
  ADD KEY `bis_id` (`bis_id`);

--
-- Indexes for table `o2o_bis_location`
--
ALTER TABLE `o2o_bis_location`
  ADD PRIMARY KEY (`id`),
  ADD KEY `name` (`name`),
  ADD KEY `city_id` (`city_id`),
  ADD KEY `category_id` (`category_id`),
  ADD KEY `bis_id` (`bis_id`);

--
-- Indexes for table `o2o_category`
--
ALTER TABLE `o2o_category`
  ADD PRIMARY KEY (`id`),
  ADD KEY `parent_id` (`parent_id`);

--
-- Indexes for table `o2o_city`
--
ALTER TABLE `o2o_city`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `uname` (`uname`),
  ADD KEY `parent_id` (`parent_id`);

--
-- Indexes for table `o2o_coupons`
--
ALTER TABLE `o2o_coupons`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `sn` (`sn`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `deal_id` (`deal_id`),
  ADD KEY `create_time` (`create_time`);

--
-- Indexes for table `o2o_deal`
--
ALTER TABLE `o2o_deal`
  ADD PRIMARY KEY (`id`),
  ADD KEY `category_id` (`category_id`),
  ADD KEY `se_category_id` (`se_category_id`),
  ADD KEY `city_id` (`city_id`),
  ADD KEY `start_time` (`start_time`),
  ADD KEY `end_time` (`end_time`),
  ADD KEY `coupons_begin_time` (`coupons_begin_time`),
  ADD KEY `coupons_end_time` (`coupons_end_time`);

--
-- Indexes for table `o2o_featured`
--
ALTER TABLE `o2o_featured`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `o2o_order`
--
ALTER TABLE `o2o_order`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `out_trade_no` (`out_trade_no`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `create_time` (`create_time`);

--
-- Indexes for table `o2o_user`
--
ALTER TABLE `o2o_user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`);

--
-- 在导出的表使用AUTO_INCREMENT
--

--
-- 使用表AUTO_INCREMENT `o2o_area`
--
ALTER TABLE `o2o_area`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- 使用表AUTO_INCREMENT `o2o_bis`
--
ALTER TABLE `o2o_bis`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- 使用表AUTO_INCREMENT `o2o_bis_account`
--
ALTER TABLE `o2o_bis_account`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- 使用表AUTO_INCREMENT `o2o_bis_location`
--
ALTER TABLE `o2o_bis_location`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- 使用表AUTO_INCREMENT `o2o_category`
--
ALTER TABLE `o2o_category`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;
--
-- 使用表AUTO_INCREMENT `o2o_city`
--
ALTER TABLE `o2o_city`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- 使用表AUTO_INCREMENT `o2o_coupons`
--
ALTER TABLE `o2o_coupons`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- 使用表AUTO_INCREMENT `o2o_deal`
--
ALTER TABLE `o2o_deal`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- 使用表AUTO_INCREMENT `o2o_featured`
--
ALTER TABLE `o2o_featured`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- 使用表AUTO_INCREMENT `o2o_order`
--
ALTER TABLE `o2o_order`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- 使用表AUTO_INCREMENT `o2o_user`
--
ALTER TABLE `o2o_user`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
