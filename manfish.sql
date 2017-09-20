/*
 Navicat Premium Data Transfer

 Source Server         : local
 Source Server Type    : MySQL
 Source Server Version : 50719
 Source Host           : localhost:3306
 Source Schema         : manfish

 Target Server Type    : MySQL
 Target Server Version : 50719
 File Encoding         : 65001

 Date: 20/09/2017 19:50:48
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for admin
-- ----------------------------
DROP TABLE IF EXISTS `admin`;
CREATE TABLE `admin` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(32) DEFAULT NULL,
  `password` varchar(64) DEFAULT NULL,
  `loginTime` date DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for colors
-- ----------------------------
DROP TABLE IF EXISTS `colors`;
CREATE TABLE `colors` (
  `id` int(11) NOT NULL,
  `value` varchar(7) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of colors
-- ----------------------------
BEGIN;
INSERT INTO `colors` VALUES (1, '#00000');
INSERT INTO `colors` VALUES (2, '#978787');
INSERT INTO `colors` VALUES (3, '#eda58d');
INSERT INTO `colors` VALUES (4, '#e5e5e5');
INSERT INTO `colors` VALUES (5, '#f6b37f');
INSERT INTO `colors` VALUES (6, '#fff78f');
COMMIT;

-- ----------------------------
-- Table structure for contacts
-- ----------------------------
DROP TABLE IF EXISTS `contacts`;
CREATE TABLE `contacts` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `name` varchar(64) DEFAULT NULL,
  `phone` varchar(12) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of contacts
-- ----------------------------
BEGIN;
INSERT INTO `contacts` VALUES (4, 1, '伊布格勒', '18610597754', '天山镇内蒙古_哈哈哈', '2017-09-14 02:32:24', '2017-09-14 02:32:24');
INSERT INTO `contacts` VALUES (5, 1, '伊布格勒', '18610597754', '天山镇内蒙古_哈哈哈', '2017-09-14 02:32:24', '2017-09-14 02:32:24');
INSERT INTO `contacts` VALUES (6, 1, '一部', 'asdf', 'asdf_asdf', '2017-09-14 03:37:28', '2017-09-14 03:37:28');
INSERT INTO `contacts` VALUES (7, 1, '一部', 'asdf', 'asdf_asdf', '2017-09-14 03:38:16', '2017-09-14 03:38:16');
INSERT INTO `contacts` VALUES (8, 1, '一部', 'asdf', 'asdf_asdf', '2017-09-14 03:39:08', '2017-09-14 03:39:08');
INSERT INTO `contacts` VALUES (9, 1, '一部', 'asdf', 'asdf_asdf', '2017-09-14 03:40:20', '2017-09-14 03:40:20');
INSERT INTO `contacts` VALUES (10, 1, '格勒', '18610597754', '内蒙古赤峰市_天山镇', '2017-09-14 03:41:25', '2017-09-14 03:41:25');
INSERT INTO `contacts` VALUES (11, 1, '伊布', '18610597754', '内蒙古赤峰市_天撒谎女真', '2017-09-14 07:57:27', '2017-09-14 07:57:27');
INSERT INTO `contacts` VALUES (12, 1, '伊布', '18610597754', '呵呵_呵呵', '2017-09-16 04:06:54', '2017-09-16 04:06:54');
INSERT INTO `contacts` VALUES (13, 1, 'test', 'test', 'test_test', '2017-09-16 04:11:38', '2017-09-16 04:11:38');
COMMIT;

-- ----------------------------
-- Table structure for fonts
-- ----------------------------
DROP TABLE IF EXISTS `fonts`;
CREATE TABLE `fonts` (
  `fid` int(11) NOT NULL,
  `fname` varchar(45) DEFAULT NULL,
  `imgSrc` varchar(45) DEFAULT NULL COMMENT '字体的图片',
  `accesskey` varchar(40) DEFAULT NULL COMMENT '文字的accessKey',
  `lineHeight` decimal(2,1) DEFAULT NULL COMMENT '字体的line-height',
  PRIMARY KEY (`fid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of fonts
-- ----------------------------
BEGIN;
INSERT INTO `fonts` VALUES (1, 'jdlibianjian', '1.png', '', 1.5);
INSERT INTO `fonts` VALUES (2, 'NaiYou', '2.png', 'cf5e590a6fbc4082a7b0d4bb74a50d3b', 1.5);
INSERT INTO `fonts` VALUES (3, 'ljsh', '2.png', '535c0cf5e63d4b2c9dc45928bc0b06de', 1.5);
INSERT INTO `fonts` VALUES (4, 'chenwixun-jian', '2.png', 'a29ceb3909364f8ab69c469f0e4e3bfb', 1.5);
INSERT INTO `fonts` VALUES (5, 'cyjianxk', '2.png', 'aa446509b4be4c9494d8c6498c3baa8c', 1.5);
INSERT INTO `fonts` VALUES (6, '93f54f8ed2c2441eb9036d21dbf04984', '2.png', '93f54f8ed2c2441eb9036d21dbf04984', 1.5);
INSERT INTO `fonts` VALUES (7, 'RS_XingKai', '2.png', 'c431bd5faf5947e0a8ade2d38169c6b9', 1.5);
INSERT INTO `fonts` VALUES (8, 'ruibo', '2.png', '246465f701954b4aa9d1ccf21966376b', 1.5);
INSERT INTO `fonts` VALUES (9, 'JetLinkMediumOldStamp', '2.png', '3290b5b5753b4340b51c4abe15e8b531', 1.5);
INSERT INTO `fonts` VALUES (10, 'jin_mei_mxplzx', '2.png', 'bec48e1a505a47a0bc44b03ece7ce8ce', 1.5);
INSERT INTO `fonts` VALUES (11, 'hdjxingshu', '2.png', 'a28d6bc9a592429e93378a6001f9e547', 1.5);
INSERT INTO `fonts` VALUES (12, 'DroidSans', '2.png', '828cfc3c5d9540c8b3244cec1c9729ae', 1.5);
INSERT INTO `fonts` VALUES (13, 'zhimang-xing', '2.png', '79df7e5c283f48eda9e277e5d348573f', 1.5);
INSERT INTO `fonts` VALUES (14, 'smyjxxiuzhengban', '2.png', '086a6e57297e44dd960abecf017bd498', 1.5);
COMMIT;

-- ----------------------------
-- Table structure for kefu
-- ----------------------------
DROP TABLE IF EXISTS `kefu`;
CREATE TABLE `kefu` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(32) DEFAULT NULL,
  `wechat` varchar(32) DEFAULT NULL,
  `email2` varchar(32) DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of kefu
-- ----------------------------
BEGIN;
INSERT INTO `kefu` VALUES (1, 'yibeel@163.com', 'yiyiasdf', 'test');
COMMIT;

-- ----------------------------
-- Table structure for letter2sends
-- ----------------------------
DROP TABLE IF EXISTS `letter2sends`;
CREATE TABLE `letter2sends` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `letter_id` int(11) DEFAULT NULL COMMENT '信件id',
  `contacts_id` int(11) DEFAULT NULL COMMENT '信件对应的联系人',
  `time` date DEFAULT NULL COMMENT '发送给联系人的地址',
  `tag` tinyint(4) unsigned zerofill DEFAULT NULL COMMENT '信件是否已发送',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of letter2sends
-- ----------------------------
BEGIN;
INSERT INTO `letter2sends` VALUES (1, 1040, 10, '2017-10-30', NULL);
INSERT INTO `letter2sends` VALUES (2, 1041, 11, '2017-10-30', 0000);
INSERT INTO `letter2sends` VALUES (3, 1049, 12, '2017-10-30', 0000);
INSERT INTO `letter2sends` VALUES (4, 1050, 13, '2017-10-30', 0000);
COMMIT;

-- ----------------------------
-- Table structure for letters
-- ----------------------------
DROP TABLE IF EXISTS `letters`;
CREATE TABLE `letters` (
  `lid` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) unsigned DEFAULT '0',
  `haveDone` tinyint(11) DEFAULT NULL COMMENT '信件状态，是否已经写完. 1写完 0 没写完',
  `status` tinyint(4) DEFAULT NULL COMMENT '当前状态，是否已寄出',
  `isPublic` tinyint(4) DEFAULT NULL COMMENT '是否是公开信',
  `lt_date` date DEFAULT NULL COMMENT '写信的时间。以最后完成时间为准',
  `lt_content` text COMMENT '信件内容，包含div。',
  `lt_fontSize` int(11) DEFAULT NULL COMMENT '信件字体大小',
  `lt_fontid` varchar(32) DEFAULT NULL COMMENT '信件字体id',
  `lt_accesskey` varchar(64) DEFAULT NULL COMMENT '信件字体accesskey',
  `lt_color` varchar(12) DEFAULT NULL COMMENT '信件字体颜色',
  `lt_back` varchar(64) DEFAULT NULL COMMENT '信件背景',
  `updated_at` datetime DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `like` int(11) unsigned DEFAULT NULL COMMENT '设置为空开心时候的点赞数量',
  `view` int(11) DEFAULT NULL COMMENT '设置为公开信时候的阅读量',
  `comment` int(11) DEFAULT NULL COMMENT '设置为公开信时候的留言数量',
  `ltBackTum` varchar(64) DEFAULT NULL COMMENT '信纸背景图片缩略图',
  PRIMARY KEY (`lid`)
) ENGINE=InnoDB AUTO_INCREMENT=1053 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of letters
-- ----------------------------
BEGIN;
INSERT INTO `letters` VALUES (1048, 1, NULL, NULL, 1, NULL, '亲爱的______ :\n      <div>&nbsp; &nbsp; 你现在在做什么呢？我有点想念你！请你早点回复我的电话。</div>', 24, '19607', 'a28d6bc9a592429e93378a6001f9e547', '#000', 'img/xinzhi/xinzhi_3.jpg', '2017-09-20 11:44:27', '2017-09-14 09:04:30', 4, 275, 10, NULL);
INSERT INTO `letters` VALUES (1049, 1, NULL, NULL, 1, NULL, '亲爱的哈哈哈 :\n      <div>&nbsp; &nbsp; 我现在做的是测试。</div>', 24, '19607', 'a28d6bc9a592429e93378a6001f9e547', '#000', 'img/xinzhi/xinzhi_3.jpg', '2017-09-19 17:13:39', '2017-09-16 04:06:38', 1, 49, NULL, NULL);
INSERT INTO `letters` VALUES (1050, 1, NULL, NULL, 1, NULL, '亲爱的______ :\n      <div>&nbsp; &nbsp; 我现在在测试这个东西。</div>', 24, '19607', 'a28d6bc9a592429e93378a6001f9e547', '#000', 'img/xinzhi/xinzhi_3.jpg', '2017-09-19 16:48:16', '2017-09-16 04:08:44', 17, 59, NULL, NULL);
INSERT INTO `letters` VALUES (1051, 1, NULL, NULL, NULL, NULL, '亲爱的______ :', 24, '19607', 'a28d6bc9a592429e93378a6001f9e547', '#000000', '\"/img/xinzhi/xinzhi_1.jpg\"', '2017-09-19 08:13:20', '2017-09-19 08:13:20', NULL, NULL, NULL, NULL);
INSERT INTO `letters` VALUES (1052, 1, NULL, NULL, NULL, NULL, '亲爱的______ :', 24, '19607', 'a28d6bc9a592429e93378a6001f9e547', '#000000', '\"/img/xinzhi/xinzhi_1.jpg\"', '2017-09-19 16:19:57', '2017-09-19 16:19:57', NULL, NULL, NULL, NULL);
COMMIT;

-- ----------------------------
-- Table structure for logs
-- ----------------------------
DROP TABLE IF EXISTS `logs`;
CREATE TABLE `logs` (
  `id` int(11) NOT NULL,
  `name` varchar(45) DEFAULT NULL COMMENT '操作名称',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for migrations
-- ----------------------------
DROP TABLE IF EXISTS `migrations`;
CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of migrations
-- ----------------------------
BEGIN;
INSERT INTO `migrations` VALUES (1, '2014_10_12_000000_create_users_table', 1);
INSERT INTO `migrations` VALUES (2, '2014_10_12_100000_create_password_resets_table', 1);
INSERT INTO `migrations` VALUES (3, '2017_09_03_152141_laratrust_setup_tables', 1);
COMMIT;

-- ----------------------------
-- Table structure for password_resets
-- ----------------------------
DROP TABLE IF EXISTS `password_resets`;
CREATE TABLE `password_resets` (
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_phone_index` (`phone`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Table structure for permission_role
-- ----------------------------
DROP TABLE IF EXISTS `permission_role`;
CREATE TABLE `permission_role` (
  `permission_id` int(10) unsigned NOT NULL,
  `role_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`permission_id`,`role_id`),
  KEY `permission_role_role_id_foreign` (`role_id`),
  CONSTRAINT `permission_role_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `permission_role_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Table structure for permission_user
-- ----------------------------
DROP TABLE IF EXISTS `permission_user`;
CREATE TABLE `permission_user` (
  `permission_id` int(10) unsigned NOT NULL,
  `user_id` int(10) unsigned NOT NULL,
  `user_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`user_id`,`permission_id`,`user_type`),
  KEY `permission_user_permission_id_foreign` (`permission_id`),
  CONSTRAINT `permission_user_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Table structure for permissions
-- ----------------------------
DROP TABLE IF EXISTS `permissions`;
CREATE TABLE `permissions` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `display_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `permissions_name_unique` (`name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Table structure for pubConfig
-- ----------------------------
DROP TABLE IF EXISTS `pubConfig`;
CREATE TABLE `pubConfig` (
  `id` int(11) NOT NULL,
  `colors` varchar(7) NOT NULL,
  `xinzhis` int(11) NOT NULL,
  `fontId` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for pub_letter_comments
-- ----------------------------
DROP TABLE IF EXISTS `pub_letter_comments`;
CREATE TABLE `pub_letter_comments` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `letters_lid` int(11) DEFAULT NULL COMMENT '公开信的lid',
  `user_name` varchar(32) DEFAULT NULL COMMENT '评论用户的姓名',
  `content` text COMMENT '评论详情',
  `created_at` date DEFAULT NULL COMMENT '评论时间',
  `updated_at` date DEFAULT NULL COMMENT '更新时间',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of pub_letter_comments
-- ----------------------------
BEGIN;
INSERT INTO `pub_letter_comments` VALUES (1, 1048, '18610597754', '这个信件写的真不错', NULL, NULL);
INSERT INTO `pub_letter_comments` VALUES (2, 1048, '18610597754', '这个号', NULL, NULL);
INSERT INTO `pub_letter_comments` VALUES (4, 1049, '18610597754', '测试', '2017-09-19', '2017-09-19');
INSERT INTO `pub_letter_comments` VALUES (5, 1049, '18610597754', '1', '2017-09-19', '2017-09-19');
INSERT INTO `pub_letter_comments` VALUES (6, 1049, '18610597754', '1', '2017-09-19', '2017-09-19');
INSERT INTO `pub_letter_comments` VALUES (7, 1049, '18610597754', '3', '2017-09-19', '2017-09-19');
INSERT INTO `pub_letter_comments` VALUES (8, 1049, '18610597754', '2', '2017-09-19', '2017-09-19');
INSERT INTO `pub_letter_comments` VALUES (9, 1049, '18610597754', '4', '2017-09-19', '2017-09-19');
INSERT INTO `pub_letter_comments` VALUES (10, 1049, '18610597754', '5', '2017-09-19', '2017-09-19');
INSERT INTO `pub_letter_comments` VALUES (11, 1049, '18610597754', '6', '2017-09-19', '2017-09-19');
INSERT INTO `pub_letter_comments` VALUES (12, 1049, '18610597754', '7', '2017-09-19', '2017-09-19');
COMMIT;

-- ----------------------------
-- Table structure for role_user
-- ----------------------------
DROP TABLE IF EXISTS `role_user`;
CREATE TABLE `role_user` (
  `role_id` int(10) unsigned NOT NULL,
  `user_id` int(10) unsigned NOT NULL,
  `user_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`user_id`,`role_id`,`user_type`),
  KEY `role_user_role_id_foreign` (`role_id`),
  CONSTRAINT `role_user_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Table structure for roles
-- ----------------------------
DROP TABLE IF EXISTS `roles`;
CREATE TABLE `roles` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `display_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `roles_name_unique` (`name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Table structure for service
-- ----------------------------
DROP TABLE IF EXISTS `service`;
CREATE TABLE `service` (
  `sid` int(11) NOT NULL,
  `email` varchar(45) DEFAULT NULL COMMENT '用户留下的email或者手机号',
  `content` varchar(45) DEFAULT NULL COMMENT '用户留下的反馈内容。',
  `status` varchar(45) DEFAULT NULL COMMENT '是否已解决',
  `date` datetime DEFAULT NULL COMMENT '时间',
  `solveTime` datetime DEFAULT NULL COMMENT '解决时间',
  PRIMARY KEY (`sid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for user_like_letter
-- ----------------------------
DROP TABLE IF EXISTS `user_like_letter`;
CREATE TABLE `user_like_letter` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `letter_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for users
-- ----------------------------
DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `uid` int(6) NOT NULL,
  `username` varchar(32) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(11) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` varchar(6) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_phone_unique` (`phone`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of users
-- ----------------------------
BEGIN;
INSERT INTO `users` VALUES (1, 0, 'yibele', '18610597754', 'user', '$2y$10$cbmRRdtxN1IFLhVNJofIMuD8JU1xCMatRqUeMd3PExDY.r14N.YEO', 'mqwb8CKh9wRjedqiWNyPfKPOW0xrItJv59a2Hk0aaR46NeL92KYFVVhM3cUH', '2017-09-07 14:04:34', '2017-09-07 14:04:34');
INSERT INTO `users` VALUES (2, 0, 'nhia', '18610597755', 'admin', '$2y$10$SXu6ZQuUIFLnvlGUfj6KCevMblLkhT8J4OCc.k5xw8YrsmC4C0vlm', 'ikqWaQpvcnDnGOfyABdtmjryFoVQUm5XbOvKwvf3mxuC6hCtyQwRhrE6mbF4', '2017-09-08 07:15:15', '2017-09-08 07:15:15');
COMMIT;

-- ----------------------------
-- Table structure for xinzhis
-- ----------------------------
DROP TABLE IF EXISTS `xinzhis`;
CREATE TABLE `xinzhis` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `src` varchar(64) DEFAULT NULL COMMENT '信纸的地址',
  `name` varchar(64) DEFAULT NULL COMMENT '信纸的名字',
  `isCol` tinyint(4) DEFAULT NULL COMMENT '信纸是否是竖着的信纸			',
  `colNum` int(11) DEFAULT NULL COMMENT '信纸一共有多少行，或者列	',
  `paddingLeft` int(11) DEFAULT NULL COMMENT 'letter_container 的左右上下padding',
  `paddingRight` int(11) DEFAULT NULL COMMENT '	',
  `paddingTop` int(11) DEFAULT NULL,
  `paddingBottom` int(11) DEFAULT NULL,
  `marginLeft` int(11) DEFAULT NULL,
  `marginRight` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of xinzhis
-- ----------------------------
BEGIN;
INSERT INTO `xinzhis` VALUES (1, 'img/xinzhi/xinzhi_1_tum.jpg', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `xinzhis` VALUES (2, 'img/xinzhi/xinzhi_2_tum.jpg', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `xinzhis` VALUES (3, 'img/xinzhi/xinzhi_3_tum.jpg', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `xinzhis` VALUES (4, 'img/xinzhi/xinzhi_4_tum.jpg', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `xinzhis` VALUES (5, 'img/xinzhi/xinzhi_5_tum.jpg', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `xinzhis` VALUES (6, 'img/xinzhi/xinzhi_6_tum.jpg', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `xinzhis` VALUES (7, 'img/xinzhi/xinzhi_7_tum.jpg', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `xinzhis` VALUES (8, 'img/xinzhi/xinzhi_8_tum.jpg', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `xinzhis` VALUES (9, 'img/xinzhi/xinzhi_9_tum.jpg', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `xinzhis` VALUES (10, 'img/xinzhi/xinzhi_10_tum.jpg', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `xinzhis` VALUES (11, 'img/xinzhi/xinzhi_11_tum.jpg', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `xinzhis` VALUES (12, 'img/xinzhi/xinzhi_12_tum.jpg', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `xinzhis` VALUES (13, 'img/xinzhi/xinzhi_13_tum.jpg', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `xinzhis` VALUES (14, 'img/xinzhi/xinzhi_14_tum.jpg', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);
COMMIT;

SET FOREIGN_KEY_CHECKS = 1;
