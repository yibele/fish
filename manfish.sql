/*
 Navicat Premium Data Transfer

 Source Server         : localhost
 Source Server Type    : MySQL
 Source Server Version : 50720
 Source Host           : localhost
 Source Database       : manfish

 Target Server Type    : MySQL
 Target Server Version : 50720
 File Encoding         : utf-8

 Date: 11/23/2017 18:10:39 PM
*/

SET NAMES utf8;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
--  Table structure for `admins`
-- ----------------------------
DROP TABLE IF EXISTS `admins`;
CREATE TABLE `admins` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(64) DEFAULT NULL,
  `email` varchar(64) DEFAULT NULL,
  `desc` varchar(64) DEFAULT NULL,
  `password` varchar(128) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `remember_token` varchar(255) DEFAULT NULL,
  `role` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`email`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- ----------------------------
--  Records of `admins`
-- ----------------------------
BEGIN;
INSERT INTO `admins` VALUES ('1', 'test1', 'test@app.com', '超级管理员', '$2y$10$oxrvj2MjxLisaqa6Z0sQYet9bkJcI72AUIAs1WQSQZlDO1zHGPb06', '2017-11-19 12:06:44', '2017-11-22 14:47:12', null, '1'), ('2', 'test2', 'test2@app.com', '测试', '$2y$10$.vrWBVvDlj9mguUyMD2r3.4WSGqUI3YlLFFbYWbPaHZMIMJP/Vfa2', '2017-11-22 14:17:45', '2017-11-22 14:48:47', null, '1');
COMMIT;

-- ----------------------------
--  Table structure for `cantpostcards`
-- ----------------------------
DROP TABLE IF EXISTS `cantpostcards`;
CREATE TABLE `cantpostcards` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `background` varchar(64) DEFAULT NULL COMMENT '文字背景图片',
  `image` varchar(64) DEFAULT NULL COMMENT '信纸图片',
  `image_tum` varchar(64) DEFAULT NULL,
  `stamp` varchar(64) DEFAULT NULL,
  `postmark` varchar(64) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

-- ----------------------------
--  Records of `cantpostcards`
-- ----------------------------
BEGIN;
INSERT INTO `cantpostcards` VALUES ('1', '#000000', 'img/cantpostcard/images/mxp1.jpg', null, 'img/cantpostcard/stamps/stamp1.png', null, null, null), ('2', '#000000', 'img/cantpostcard/images/mxp2.jpg', null, 'img/cantpostcard/stamps/stamp1.png', null, null, null), ('3', '#000000', 'img/cantpostcard/images/mxp3.jpg', null, 'img/cantpostcard/stamps/stamp1.png', null, null, null), ('4', '#000000', 'img/cantpostcard/images/mxp4.jpg', null, 'img/cantpostcard/stamps/stamp1.png', null, null, null), ('5', '#000000', 'img/cantpostcard/images/mxp5.jpg', null, 'img/cantpostcard/stamps/stamp1.png', null, null, null);
COMMIT;

-- ----------------------------
--  Table structure for `colors`
-- ----------------------------
DROP TABLE IF EXISTS `colors`;
CREATE TABLE `colors` (
  `id` int(11) NOT NULL,
  `value` varchar(7) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
--  Records of `colors`
-- ----------------------------
BEGIN;
INSERT INTO `colors` VALUES ('1', '#00000'), ('2', '#978787'), ('3', '#eda58d'), ('4', '#e5e5e5'), ('5', '#f6b37f'), ('6', '#fff78f');
COMMIT;

-- ----------------------------
--  Table structure for `contacts`
-- ----------------------------
DROP TABLE IF EXISTS `contacts`;
CREATE TABLE `contacts` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `name` varchar(64) DEFAULT NULL,
  `phone` varchar(12) DEFAULT NULL,
  `sheng` varchar(128) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=utf8;

-- ----------------------------
--  Records of `contacts`
-- ----------------------------
BEGIN;
INSERT INTO `contacts` VALUES ('4', '1', '伊布格勒', '18610597754', null, '天山镇内蒙古_哈哈哈', '2017-09-14 02:32:24', '2017-09-14 02:32:24'), ('5', '1', '伊布格勒', '18610597754', null, '天山镇内蒙古_哈哈哈', '2017-09-14 02:32:24', '2017-09-14 02:32:24'), ('6', '1', '一部', 'asdf', null, 'asdf_asdf', '2017-09-14 03:37:28', '2017-09-14 03:37:28'), ('7', '1', '一部', 'asdf', null, 'asdf_asdf', '2017-09-14 03:38:16', '2017-09-14 03:38:16'), ('8', '1', '一部', 'asdf', null, 'asdf_asdf', '2017-09-14 03:39:08', '2017-09-14 03:39:08'), ('9', '1', '一部', 'asdf', null, 'asdf_asdf', '2017-09-14 03:40:20', '2017-09-14 03:40:20'), ('10', '1', '格勒', '18610597754', null, '内蒙古赤峰市_天山镇', '2017-09-14 03:41:25', '2017-09-14 03:41:25'), ('11', '1', '伊布', '18610597754', null, '内蒙古赤峰市_天撒谎女真', '2017-09-14 07:57:27', '2017-09-14 07:57:27'), ('12', '1', '伊布', '18610597754', null, '呵呵_呵呵', '2017-09-16 04:06:54', '2017-09-16 04:06:54'), ('13', '1', 'test', 'test', null, 'test_test', '2017-09-16 04:11:38', '2017-09-16 04:11:38'), ('14', '1', 'gele_yibu', '18610597754', null, '海淀区_首都师范大学', '2017-09-28 18:46:45', '2017-09-28 18:46:45'), ('15', '1', 'gele_yibu', '18610597754', null, '海淀区_首都师范大学', '2017-09-28 18:46:48', '2017-09-28 18:46:48'), ('16', '1', 'gele_yibu', '18610597754', null, '海淀区_首都师范大学', '2017-09-28 18:46:59', '2017-09-28 18:46:59'), ('17', '1', 'gele_yibu', '18610597754', null, '海淀区_首都师范大学', '2017-09-28 18:49:54', '2017-09-28 18:49:54'), ('18', '1', 'yibu_gele', '18610597754', null, 'beijing_beijing', '2017-09-28 18:50:36', '2017-09-28 18:50:36'), ('19', '1', 'yibu_gele', '18610597754', null, 'beijing_beijing', '2017-09-28 18:51:56', '2017-09-28 18:51:56'), ('20', '1', 'yibu_gele', '18610597754', null, 'beijing_beijing', '2017-09-28 19:30:41', '2017-09-28 19:30:41'), ('21', '1', 'asdf', 'asdf', null, 'asdf_asdf', '2017-11-22 09:55:48', '2017-11-22 09:55:48'), ('22', '1', '1', '1', '1', '1', '2017-11-22 16:41:05', '2017-11-22 16:41:05');
COMMIT;

-- ----------------------------
--  Table structure for `customer`
-- ----------------------------
DROP TABLE IF EXISTS `customer`;
CREATE TABLE `customer` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `phone` varchar(11) NOT NULL,
  `password` varchar(16) NOT NULL,
  `disable` int(11) NOT NULL DEFAULT '0',
  `created_at` date DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `phone` (`phone`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
--  Table structure for `fonts`
-- ----------------------------
DROP TABLE IF EXISTS `fonts`;
CREATE TABLE `fonts` (
  `fid` int(11) NOT NULL,
  `fname` varchar(45) DEFAULT NULL,
  `imgSrc` varchar(128) DEFAULT NULL COMMENT '字体的图片',
  `accesskey` varchar(40) DEFAULT NULL COMMENT '文字的accessKey',
  `lineHeight` decimal(2,1) DEFAULT NULL COMMENT '字体的line-height',
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`fid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
--  Records of `fonts`
-- ----------------------------
BEGIN;
INSERT INTO `fonts` VALUES ('1', 'jdlibianjian', '/uploads/fonts/0ZX8o2KAzn1ls0izcuj0ZsHSDM65pV9x7wz446U8.png', '535c0cf5e63d4b2c9dc45928bc0b06de', '1.5', null, null), ('2', 'NaiYou', '/uploads/fonts/书体坊雪纯体-1.png', 'cf5e590a6fbc4082a7b0d4bb74a50d3b', '1.5', null, null), ('3', 'ljsh', '/uploads/fonts/0ZX8o2KAzn1ls0izcuj0ZsHSDM65pV9x7wz446U8.png', '535c0cf5e63d4b2c9dc45928bc0b06de', '1.5', null, null), ('4', 'chenwixun-jian', '/uploads/fonts/0ZX8o2KAzn1ls0izcuj0ZsHSDM65pV9x7wz446U8.png', 'a29ceb3909364f8ab69c469f0e4e3bfb', '1.5', null, null), ('5', 'cyjianxk', '/uploads/fonts/tWUpiXYkvxQRxT6K0KQnbCeb76Vu2HICFtp0E6y6.png', 'aa446509b4be4c9494d8c6498c3baa8c', '1.5', null, null), ('6', '93f54f8ed2c2441eb9036d21dbf04984', '/uploads/fonts/0ZX8o2KAzn1ls0izcuj0ZsHSDM65pV9x7wz446U8.png', '93f54f8ed2c2441eb9036d21dbf04984', '1.5', null, null), ('7', 'RS_XingKai', '/uploads/fonts/0ZX8o2KAzn1ls0izcuj0ZsHSDM65pV9x7wz446U8.png', 'c431bd5faf5947e0a8ade2d38169c6b9', '1.5', null, null), ('8', 'ruibo', '/uploads/fonts/0ZX8o2KAzn1ls0izcuj0ZsHSDM65pV9x7wz446U8.png', '246465f701954b4aa9d1ccf21966376b', '1.5', null, null), ('9', 'JetLinkMediumOldStamp', '/uploads/fonts/0ZX8o2KAzn1ls0izcuj0ZsHSDM65pV9x7wz446U8.png', '3290b5b5753b4340b51c4abe15e8b531', '1.5', null, null), ('10', 'jin_mei_mxplzx', '/uploads/fonts/0ZX8o2KAzn1ls0izcuj0ZsHSDM65pV9x7wz446U8.png', 'bec48e1a505a47a0bc44b03ece7ce8ce', '1.5', null, null), ('11', 'hdjxingshu', '/uploads/fonts/0ZX8o2KAzn1ls0izcuj0ZsHSDM65pV9x7wz446U8.png', 'a28d6bc9a592429e93378a6001f9e547', '1.5', null, null), ('12', 'DroidSans', '/uploads/fonts/0ZX8o2KAzn1ls0izcuj0ZsHSDM65pV9x7wz446U8.png', '828cfc3c5d9540c8b3244cec1c9729ae', '1.5', null, null);
COMMIT;

-- ----------------------------
--  Table structure for `kefus`
-- ----------------------------
DROP TABLE IF EXISTS `kefus`;
CREATE TABLE `kefus` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(32) DEFAULT NULL,
  `wechat` varchar(32) DEFAULT NULL,
  `email2` varchar(32) DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- ----------------------------
--  Records of `kefus`
-- ----------------------------
BEGIN;
INSERT INTO `kefus` VALUES ('1', 'yibeel@163.com', 'yiyiasdf', 'test');
COMMIT;

-- ----------------------------
--  Table structure for `letter2sends`
-- ----------------------------
DROP TABLE IF EXISTS `letter2sends`;
CREATE TABLE `letter2sends` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `letters_lid` int(11) DEFAULT NULL COMMENT '信件id',
  `expressNum` varchar(24) DEFAULT NULL COMMENT '快递编码',
  `time` date DEFAULT NULL COMMENT '创建发送列表时间',
  `contacts_id` int(11) DEFAULT NULL COMMENT '信件对应的联系人',
  `time2send` date DEFAULT NULL COMMENT '发送给联系人的时间',
  `tag` tinyint(4) unsigned zerofill DEFAULT NULL COMMENT '信件是否已发送',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

-- ----------------------------
--  Records of `letter2sends`
-- ----------------------------
BEGIN;
INSERT INTO `letter2sends` VALUES ('1', '1053', null, null, '1', '2017-09-21', '0'), ('2', '1056', null, '2017-10-30', '19', null, '0'), ('3', '1057', null, '2017-10-30', '20', null, '0'), ('4', '1063', null, '2017-11-22', '21', null, '0');
COMMIT;

-- ----------------------------
--  Table structure for `letters`
-- ----------------------------
DROP TABLE IF EXISTS `letters`;
CREATE TABLE `letters` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) unsigned DEFAULT '0',
  `xinzhi_id` int(11) DEFAULT NULL,
  `contact_id` int(11) DEFAULT NULL,
  `status` tinyint(4) DEFAULT NULL COMMENT '当前状态，是否已寄出',
  `is_public` tinyint(4) DEFAULT NULL COMMENT '是否是公开信',
  `style` varchar(128) DEFAULT NULL,
  `content` text COMMENT '信件内容，包含div。',
  `accesskey` varchar(32) DEFAULT NULL COMMENT '信件字体id',
  `updated_at` datetime DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=1097 DEFAULT CHARSET=utf8;

-- ----------------------------
--  Records of `letters`
-- ----------------------------
BEGIN;
INSERT INTO `letters` VALUES ('1087', '1', '31', null, '0', '0', 'font-size: 20px;', 'test2', null, '2017-11-21 17:32:22', '2017-11-21 17:30:25'), ('1088', '1', '31', null, '0', '0', 'font-size: 20px;', '亲爱的__ :', null, '2017-11-21 17:33:04', '2017-11-21 17:33:04'), ('1089', '1', '31', null, '0', '0', 'font-size: 20px;', '亲爱的__ :', null, '2017-11-21 17:34:57', '2017-11-21 17:33:34'), ('1090', '1', '31', null, '0', '0', 'font-size: 20px;', '亲爱的__ :', null, '2017-11-21 17:35:49', '2017-11-21 17:35:46'), ('1091', '1', '31', null, '0', '0', 'font-size: 20px;', '亲爱的__ :', null, '2017-11-21 17:40:48', '2017-11-21 17:40:34'), ('1092', '1', '31', null, '0', '0', 'font-size: 20px;', '亲爱的__ :', null, '2017-11-21 17:45:41', '2017-11-21 17:45:41'), ('1093', '1', '31', null, '0', '0', 'font-size: 20px;', '亲爱的__ :', null, '2017-11-21 17:46:18', '2017-11-21 17:46:18'), ('1094', '1', '31', null, '0', '0', 'font-size: 20px;', '亲爱的__ :', null, '2017-11-21 17:47:27', '2017-11-21 17:47:27'), ('1095', '1', '31', null, '0', '0', 'font-size: 29px; color: rgb(250, 247, 247);', '亲爱的__ :', null, '2017-11-21 17:48:53', '2017-11-21 17:48:53'), ('1096', '1', '31', null, '0', '0', 'font-size: 20px;', '亲爱的__ :', null, '2017-11-22 10:08:41', '2017-11-22 10:08:41');
COMMIT;

-- ----------------------------
--  Table structure for `logs`
-- ----------------------------
DROP TABLE IF EXISTS `logs`;
CREATE TABLE `logs` (
  `id` int(11) NOT NULL,
  `name` varchar(45) DEFAULT NULL COMMENT '操作名称',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
--  Table structure for `migrations`
-- ----------------------------
DROP TABLE IF EXISTS `migrations`;
CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
--  Records of `migrations`
-- ----------------------------
BEGIN;
INSERT INTO `migrations` VALUES ('1', '2014_10_12_000000_create_users_table', '1'), ('2', '2014_10_12_100000_create_password_resets_table', '1'), ('3', '2017_09_03_152141_laratrust_setup_tables', '1');
COMMIT;

-- ----------------------------
--  Table structure for `paied_letters`
-- ----------------------------
DROP TABLE IF EXISTS `paied_letters`;
CREATE TABLE `paied_letters` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `letter_id` int(11) NOT NULL,
  `type` int(11) NOT NULL COMMENT '支付类型，如果是1 那么支付版本是 59.90元版本， 如果是2 那么支付版本是 29.90 元版本',
  `meoney` int(11) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `letter_id` (`letter_id`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
--  Table structure for `password_resets`
-- ----------------------------
DROP TABLE IF EXISTS `password_resets`;
CREATE TABLE `password_resets` (
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_phone_index` (`phone`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
--  Table structure for `permission_role`
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
--  Table structure for `permission_user`
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
--  Table structure for `permissions`
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
--  Table structure for `pubConfig`
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
--  Table structure for `pub_letter_comments`
-- ----------------------------
DROP TABLE IF EXISTS `pub_letter_comments`;
CREATE TABLE `pub_letter_comments` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `letters_lid` int(11) DEFAULT NULL COMMENT '公开信的lid',
  `user_name` varchar(32) DEFAULT NULL COMMENT '评论用户的姓名',
  `content` text COMMENT '评论详情',
  `created_at` datetime DEFAULT NULL COMMENT '评论时间',
  `updated_at` datetime DEFAULT NULL COMMENT '更新时间',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8;

-- ----------------------------
--  Records of `pub_letter_comments`
-- ----------------------------
BEGIN;
INSERT INTO `pub_letter_comments` VALUES ('13', '1051', '18610597754', '进行测试', '2017-09-21 00:00:00', '2017-09-21 00:00:00'), ('14', '1051', '18610597754', '进行测试', '2017-09-21 00:00:00', '2017-09-21 00:00:00'), ('15', '1051', '18610597754', '时间测试', '2017-09-21 13:00:35', '2017-09-21 13:00:35'), ('16', '1051', '18610597754', '测试', '2017-09-28 10:56:33', '2017-09-28 10:56:33'), ('17', '1053', '18610597754', '觉得这封信很有意义，谢谢你让我看到了以后怎么对待自己，对待自己的家人。感谢你！', '2017-09-28 20:09:47', '2017-09-28 20:09:47'), ('18', '1053', '18610597754', '觉得这封信很有意义，谢谢你让我看到了以后怎么对待自己，对待自己的家人。感谢你！觉得这封信很有意义，谢谢你让我看到了以后怎么对待自己，对待自己的家人。感谢你！觉得这封信很有意义，谢谢你让我看到了以后怎么对待自己，对待自己的家人。感谢你！觉得这封信很有意义，谢谢你让我看到了以后怎么对待自己，对待自己的家人。感谢你！', '2017-09-28 20:09:57', '2017-09-28 20:09:57');
COMMIT;

-- ----------------------------
--  Table structure for `role_user`
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
--  Table structure for `roles`
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
--  Table structure for `service`
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
--  Table structure for `shaidan`
-- ----------------------------
DROP TABLE IF EXISTS `shaidan`;
CREATE TABLE `shaidan` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `img_tum` varchar(265) DEFAULT NULL COMMENT '缩略图',
  `like` int(10) unsigned DEFAULT NULL COMMENT '喜欢的数量',
  `created_at` date DEFAULT NULL,
  `updated_at` date DEFAULT NULL,
  `content` varchar(0) DEFAULT NULL COMMENT '信件晒单内容',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
--  Table structure for `user_like_letter`
-- ----------------------------
DROP TABLE IF EXISTS `user_like_letter`;
CREATE TABLE `user_like_letter` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `letter_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
--  Table structure for `users`
-- ----------------------------
DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `uid` int(6) NOT NULL DEFAULT '0',
  `username` varchar(32) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(11) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` varchar(6) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_phone_unique` (`phone`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
--  Records of `users`
-- ----------------------------
BEGIN;
INSERT INTO `users` VALUES ('1', '0', 'yibele', '18610597754', 'auth', '$2y$10$cbmRRdtxN1IFLhVNJofIMuD8JU1xCMatRqUeMd3PExDY.r14N.YEO', 'nWqdKGZ139lCaGYXqejjT98aMAwu5u5XuIXKXlygUGNYFsNU9af7CBddxlMI', '2017-09-07 14:04:34', '2017-09-07 14:04:34'), ('2', '0', 'nhia', '123123', 'admin', '$2y$10$SXu6ZQuUIFLnvlGUfj6KCevMblLkhT8J4OCc.k5xw8YrsmC4C0vlm', 'Ll6RxKOFLbtNZsoD8hCGKL8mi2pDrSseQXFWEko4cjsKrWhiKNpc5M1WuKSh', '2017-09-08 07:15:15', '2017-09-08 07:15:15'), ('3', '0', null, '18888888888', null, '$2y$10$e.nzJmYKMNd.RNuecUnOhOG2XAclPq3AzMQZxmIxJadz34kdyjkhi', '4pBla1rBmLkp1hQ09Z8Cp525bhGahcb7HJ1siVeaw4m805RuU8pRQT0Gzw9O', '2017-11-18 11:48:30', '2017-11-18 11:48:30');
COMMIT;

-- ----------------------------
--  Table structure for `xinzhis`
-- ----------------------------
DROP TABLE IF EXISTS `xinzhis`;
CREATE TABLE `xinzhis` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `src` varchar(64) DEFAULT NULL COMMENT '信纸的地址',
  `name` varchar(64) DEFAULT NULL COMMENT '信纸的名字',
  `yincai_id` int(11) DEFAULT NULL COMMENT '印材名称',
  `isCol` tinyint(4) DEFAULT NULL COMMENT '信纸是否是竖着的信纸			',
  `height` varchar(8) DEFAULT NULL,
  `width` varchar(8) DEFAULT NULL,
  `txm_width` varchar(8) DEFAULT NULL,
  `txm_height` varchar(8) DEFAULT NULL,
  `txm_padding_top` varchar(8) DEFAULT NULL,
  `txm_padding_left` varchar(8) DEFAULT NULL,
  `colNum` int(11) DEFAULT NULL COMMENT '信纸一共有多少行，或者列	',
  `paddingLeft` varchar(6) DEFAULT NULL COMMENT 'letter_container 的左右上下padding',
  `paddingRight` varchar(6) DEFAULT NULL COMMENT '	',
  `paddingTop` varchar(6) DEFAULT NULL,
  `paddingBottom` varchar(6) DEFAULT NULL,
  `marginLeft` varchar(6) DEFAULT NULL,
  `desc` varchar(256) DEFAULT NULL,
  `marginRight` varchar(6) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=41 DEFAULT CHARSET=utf8;

-- ----------------------------
--  Records of `xinzhis`
-- ----------------------------
BEGIN;
INSERT INTO `xinzhis` VALUES ('28', null, '信件模板1', '38', '1', '1400px', '900px', '200px', '100px', '0px', '0px', null, '100px', null, '100px', null, null, null, null, '2017-11-20 12:10:00', '2017-11-20 12:10:00'), ('29', null, '信纸模板2', '39', '1', '1000px', '800px', '200px', '100px', '0px', '0px', null, '200px', null, '200px', null, null, null, null, '2017-11-20 12:14:52', '2017-11-20 12:14:52'), ('30', null, '3', '40', '1', '1400px', '900px', '200px', '100px', '0px', '0px', null, '100px', null, '100px', null, null, null, null, '2017-11-20 12:15:53', '2017-11-20 12:15:53'), ('31', null, '4', '40', '1', '1400px', '900px', '200px', '100px', '0px', '0px', null, '100px', null, '100px', null, null, null, null, '2017-11-20 12:16:00', '2017-11-20 12:16:00'), ('32', null, '5', '39', '1', '1400px', '900px', '200px', '100px', '0px', '0px', null, '100px', null, '100px', null, null, null, null, '2017-11-20 12:16:08', '2017-11-20 12:16:08'), ('33', null, '6', '40', '1', '1400px', '900px', '200px', '100px', '0px', '0px', null, '100px', null, '100px', null, null, null, null, '2017-11-20 12:16:18', '2017-11-20 12:16:18'), ('34', null, '7', '39', '1', '1400px', '900px', '200px', '100px', '0px', '0px', null, '100px', null, '100px', null, null, null, null, '2017-11-20 12:16:24', '2017-11-20 12:16:24'), ('35', null, '8', '40', '1', '1400px', '900px', '200px', '100px', '0px', '0px', null, '100px', null, '100px', null, null, null, null, '2017-11-20 12:16:33', '2017-11-20 12:16:33'), ('36', null, '10', '40', '1', '1400px', '900px', '200px', '100px', '0px', '0px', null, '100px', null, '100px', null, null, null, null, '2017-11-20 12:34:48', '2017-11-20 12:34:48'), ('37', null, '11', '39', '1', '1400px', '900px', '200px', '100px', '0px', '0px', null, '100px', null, '100px', null, null, null, null, '2017-11-20 12:34:54', '2017-11-20 12:34:54'), ('38', null, '12', '40', '1', '1400px', '900px', '200px', '100px', '0px', '0px', null, '100px', null, '100px', null, null, null, null, '2017-11-20 12:35:01', '2017-11-20 12:35:01'), ('39', null, '12', '39', '1', '1400px', '900px', '200px', '100px', '0px', '0px', null, '100px', null, '100px', null, null, null, null, '2017-11-20 12:35:11', '2017-11-20 12:35:11'), ('40', null, '13', '39', '1', '1400px', '900px', '200px', '100px', '0px', '0px', null, '100px', null, '100px', null, null, null, null, '2017-11-20 12:35:27', '2017-11-20 12:35:27');
COMMIT;

-- ----------------------------
--  Table structure for `yincais`
-- ----------------------------
DROP TABLE IF EXISTS `yincais`;
CREATE TABLE `yincais` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `file1` varchar(128) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `file2` varchar(128) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name` varchar(64) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tmb1` varchar(128) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tmb2` varchar(128) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `kucun` int(10) unsigned DEFAULT NULL,
  `cunliang` int(10) unsigned DEFAULT NULL,
  `desc` varchar(128) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=41 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
--  Records of `yincais`
-- ----------------------------
BEGIN;
INSERT INTO `yincais` VALUES ('38', '/uploads/yincais/yZ2xlCq2kwmkD1ZjJzeVPAmYTGz4J5ock2UeJ91P.jpeg', null, '信件印材1', '/uploads/yincais/信件印材11.jpg', null, null, null, '信件印材1', '2017-11-20 12:09:02', '2017-11-20 12:09:02'), ('39', '/uploads/yincais/M03o74kNFXIZCPalYrtl2qaXfiMFsLqoP6TPN6NU.jpeg', null, '信纸印材2', '/uploads/yincais/信纸印材21.jpg', null, null, null, '信纸印材2', '2017-11-20 12:13:53', '2017-11-20 12:13:53'), ('40', '/uploads/yincais/UR0WMdbSlt15eQnPLedoHN5vOdlA2uhGClf2AZM3.jpeg', null, '信纸印材3', '/uploads/yincais/信纸印材31.jpg', null, null, null, '信纸印材3', '2017-11-20 12:14:04', '2017-11-20 12:14:04');
COMMIT;

SET FOREIGN_KEY_CHECKS = 1;
