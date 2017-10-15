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

 Date: 15/10/2017 15:34:56
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
-- Table structure for cantpostcards
-- ----------------------------
DROP TABLE IF EXISTS `cantpostcards`;
CREATE TABLE `cantpostcards` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `background` varchar(64) DEFAULT NULL COMMENT '文字背景图片',
  `image` varchar(64) DEFAULT NULL COMMENT '信纸图片',
  `stamp` varchar(64) DEFAULT NULL,
  `postmark` varchar(64) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of cantpostcards
-- ----------------------------
BEGIN;
INSERT INTO `cantpostcards` VALUES (1, '#000000', 'img/cantpostcard/images/mxp1.jpg', 'img/cantpostcard/stamps/stamp1.png', NULL, NULL, NULL);
INSERT INTO `cantpostcards` VALUES (2, '#000000', 'img/cantpostcard/images/mxp2.jpg', 'img/cantpostcard/stamps/stamp1.png', NULL, NULL, NULL);
INSERT INTO `cantpostcards` VALUES (3, '#000000', 'img/cantpostcard/images/mxp3.jpg', 'img/cantpostcard/stamps/stamp1.png', NULL, NULL, NULL);
INSERT INTO `cantpostcards` VALUES (4, '#000000', 'img/cantpostcard/images/mxp4.jpg', 'img/cantpostcard/stamps/stamp1.png', NULL, NULL, NULL);
INSERT INTO `cantpostcards` VALUES (5, '#000000', 'img/cantpostcard/images/mxp5.jpg', 'img/cantpostcard/stamps/stamp1.png', NULL, NULL, NULL);
COMMIT;

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
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8;

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
INSERT INTO `contacts` VALUES (14, 1, 'gele_yibu', '18610597754', '海淀区_首都师范大学', '2017-09-28 18:46:45', '2017-09-28 18:46:45');
INSERT INTO `contacts` VALUES (15, 1, 'gele_yibu', '18610597754', '海淀区_首都师范大学', '2017-09-28 18:46:48', '2017-09-28 18:46:48');
INSERT INTO `contacts` VALUES (16, 1, 'gele_yibu', '18610597754', '海淀区_首都师范大学', '2017-09-28 18:46:59', '2017-09-28 18:46:59');
INSERT INTO `contacts` VALUES (17, 1, 'gele_yibu', '18610597754', '海淀区_首都师范大学', '2017-09-28 18:49:54', '2017-09-28 18:49:54');
INSERT INTO `contacts` VALUES (18, 1, 'yibu_gele', '18610597754', 'beijing_beijing', '2017-09-28 18:50:36', '2017-09-28 18:50:36');
INSERT INTO `contacts` VALUES (19, 1, 'yibu_gele', '18610597754', 'beijing_beijing', '2017-09-28 18:51:56', '2017-09-28 18:51:56');
INSERT INTO `contacts` VALUES (20, 1, 'yibu_gele', '18610597754', 'beijing_beijing', '2017-09-28 19:30:41', '2017-09-28 19:30:41');
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
  `letters_lid` int(11) DEFAULT NULL COMMENT '信件id',
  `expressNum` varchar(24) DEFAULT NULL COMMENT '快递编码',
  `time` date DEFAULT NULL COMMENT '创建发送列表时间',
  `contacts_id` int(11) DEFAULT NULL COMMENT '信件对应的联系人',
  `time2send` date DEFAULT NULL COMMENT '发送给联系人的时间',
  `tag` tinyint(4) unsigned zerofill DEFAULT NULL COMMENT '信件是否已发送',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of letter2sends
-- ----------------------------
BEGIN;
INSERT INTO `letter2sends` VALUES (1, 1053, NULL, NULL, 1, '2017-09-21', 0000);
INSERT INTO `letter2sends` VALUES (2, 1056, NULL, '2017-10-30', 19, NULL, 0000);
INSERT INTO `letter2sends` VALUES (3, 1057, NULL, '2017-10-30', 20, NULL, 0000);
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
) ENGINE=InnoDB AUTO_INCREMENT=1060 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of letters
-- ----------------------------
BEGIN;
INSERT INTO `letters` VALUES (1051, 1, NULL, 1, 1, NULL, '亲爱的______ :', 24, '19607', 'a28d6bc9a592429e93378a6001f9e547', '#000000', '\"/img/xinzhi/xinzhi_1.jpg\"', '2017-09-29 12:36:08', '2017-09-19 08:13:20', 1, 80, NULL, NULL);
INSERT INTO `letters` VALUES (1052, 1, NULL, 2, 0, NULL, '亲爱的______ :', 24, '19607', 'a28d6bc9a592429e93378a6001f9e547', '#000000', '\"/img/xinzhi/xinzhi_1.jpg\"', '2017-09-28 18:45:32', '2017-09-19 16:19:57', 1, 32, NULL, NULL);
INSERT INTO `letters` VALUES (1053, 1, NULL, NULL, 1, NULL, '亲爱的______ :', 24, '19607', 'a28d6bc9a592429e93378a6001f9e547', '#000000', '\"/img/xinzhi/xinzhi_1.jpg\"', '2017-09-29 12:36:11', '2017-09-21 11:00:38', 1, 55, NULL, NULL);
INSERT INTO `letters` VALUES (1054, 1, NULL, NULL, 1, NULL, '亲爱的______ :\n                <div>&nbsp; &nbsp; 修改信件测试。查看信件能不能完成修改.</div><div>如果说现在所做的事情，都是可以去改变的话，那么这个事情就是非常的重要的了。</div>', 24, '19607', 'a28d6bc9a592429e93378a6001f9e547', '#000000', '\"/img/xinzhi/xinzhi_1.jpg\"', '2017-09-29 12:35:47', '2017-09-21 14:09:41', 1, 16, NULL, NULL);
INSERT INTO `letters` VALUES (1055, 1, NULL, NULL, NULL, NULL, '亲爱的______ :', 31, '19607', 'a28d6bc9a592429e93378a6001f9e547', '#000000', '\"/img/xinzhi/xinzhi_5.jpg\"', '2017-09-28 17:53:22', '2017-09-28 17:53:22', NULL, NULL, NULL, NULL);
INSERT INTO `letters` VALUES (1056, 1, NULL, NULL, 1, NULL, '亲爱的______ : \n      <div>&nbsp; &nbsp; 公开信测试。</div><div>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;----伊布</div><div>我现在正在做测试</div><div><span style=\"font-style: normal; font-weight: bold;\">我现在正在做测试</span><br></div><div><span style=\"font-style: normal; font-weight: bold;\">我现在正在做测试</span><span style=\"font-style: normal; font-weight: bold;\"><br></span></div><div><span style=\"font-style: normal; font-weight: bold;\">我现在正在做测试</span><span style=\"font-style: normal; font-weight: bold;\"><br></span></div><div><span style=\"font-style: normal; font-weight: bold;\">我现在正在做测试</span><span style=\"font-style: normal; font-weight: bold;\"><br></span></div><div><span style=\"font-style: normal; font-weight: bold;\">我现在正在做测试</span><span style=\"font-style: normal; font-weight: bold;\"><br></span></div><div><span style=\"font-style: normal; font-weight: bold;\">我现在正在做测试</span><span style=\"font-style: normal; font-weight: bold;\"><br></span></div><div><span style=\"font-style: normal; font-weight: bold;\">我现在正在做测试</span><span style=\"font-style: normal; font-weight: bold;\"><br></span></div><div><span style=\"font-style: normal; font-weight: bold;\">我现在正在做测试</span></div>', 24, '19607', 'a28d6bc9a592429e93378a6001f9e547', '#ffffff', '\"/img/xinzhi/xinzhi_1.jpg\"', '2017-09-29 12:35:18', '2017-09-28 18:46:33', NULL, 6, NULL, NULL);
INSERT INTO `letters` VALUES (1057, 1, NULL, NULL, 1, NULL, '亲爱的______ :', 24, '19607', 'a28d6bc9a592429e93378a6001f9e547', '#000000', '\"/img/xinzhi/xinzhi_1.jpg\"', '2017-09-29 12:35:16', '2017-09-28 19:30:20', NULL, 4, NULL, NULL);
INSERT INTO `letters` VALUES (1058, 1, NULL, NULL, 1, NULL, '亲爱的______ :', 24, '19607', 'a28d6bc9a592429e93378a6001f9e547', '#000000', '\"/img/xinzhi/xinzhi_2.jpg\"', '2017-09-29 12:35:15', '2017-09-28 20:32:46', NULL, 2, NULL, NULL);
INSERT INTO `letters` VALUES (1059, 1, NULL, NULL, 1, NULL, '亲爱的______ :', 24, '19607', 'a28d6bc9a592429e93378a6001f9e547', '#ffffff', '\"/img/xinzhi/xinzhi_2.jpg\"', '2017-09-29 12:35:14', '2017-09-28 20:35:25', NULL, 2, NULL, 'http://localhost:8000/img/xinzhi/xinzhi_2_tum.jpg');
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
  `created_at` datetime DEFAULT NULL COMMENT '评论时间',
  `updated_at` datetime DEFAULT NULL COMMENT '更新时间',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of pub_letter_comments
-- ----------------------------
BEGIN;
INSERT INTO `pub_letter_comments` VALUES (13, 1051, '18610597754', '进行测试', '2017-09-21 00:00:00', '2017-09-21 00:00:00');
INSERT INTO `pub_letter_comments` VALUES (14, 1051, '18610597754', '进行测试', '2017-09-21 00:00:00', '2017-09-21 00:00:00');
INSERT INTO `pub_letter_comments` VALUES (15, 1051, '18610597754', '时间测试', '2017-09-21 13:00:35', '2017-09-21 13:00:35');
INSERT INTO `pub_letter_comments` VALUES (16, 1051, '18610597754', '测试', '2017-09-28 10:56:33', '2017-09-28 10:56:33');
INSERT INTO `pub_letter_comments` VALUES (17, 1053, '18610597754', '觉得这封信很有意义，谢谢你让我看到了以后怎么对待自己，对待自己的家人。感谢你！', '2017-09-28 20:09:47', '2017-09-28 20:09:47');
INSERT INTO `pub_letter_comments` VALUES (18, 1053, '18610597754', '觉得这封信很有意义，谢谢你让我看到了以后怎么对待自己，对待自己的家人。感谢你！觉得这封信很有意义，谢谢你让我看到了以后怎么对待自己，对待自己的家人。感谢你！觉得这封信很有意义，谢谢你让我看到了以后怎么对待自己，对待自己的家人。感谢你！觉得这封信很有意义，谢谢你让我看到了以后怎么对待自己，对待自己的家人。感谢你！', '2017-09-28 20:09:57', '2017-09-28 20:09:57');
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
-- Table structure for shaidan
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
INSERT INTO `users` VALUES (1, 0, 'yibele', '18610597754', 'auth', '$2y$10$cbmRRdtxN1IFLhVNJofIMuD8JU1xCMatRqUeMd3PExDY.r14N.YEO', '3HvBv3gVKrhVv8DtnqmYYKesM3QMZoU4XVM7VOEaHm08v5tWDtxWviApA2BK', '2017-09-07 14:04:34', '2017-09-07 14:04:34');
INSERT INTO `users` VALUES (2, 0, 'nhia', '123123', 'admin', '$2y$10$SXu6ZQuUIFLnvlGUfj6KCevMblLkhT8J4OCc.k5xw8YrsmC4C0vlm', 'ikqWaQpvcnDnGOfyABdtmjryFoVQUm5XbOvKwvf3mxuC6hCtyQwRhrE6mbF4', '2017-09-08 07:15:15', '2017-09-08 07:15:15');
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
