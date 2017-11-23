/*
 Navicat Premium Data Transfer

 Source Server         : localhost
 Source Server Type    : MySQL
 Source Server Version : 50720
 Source Host           : localhost
 Source Database       : manfish1

 Target Server Type    : MySQL
 Target Server Version : 50720
 File Encoding         : utf-8

 Date: 11/19/2017 13:10:24 PM
*/

SET NAMES utf8;
SET FOREIGN_KEY_CHECKS = 0;

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
) ENGINE=InnoDB AUTO_INCREMENT=35 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
--  Records of `yincais`
-- ----------------------------
BEGIN;
INSERT INTO `yincais` VALUES ('33', 'http://localhost/uploads/yincais/YN9EhdFvfcUqJVekkvqBB8igQTOahm3ngVkJ1up6.jpeg', 'http://localhost/uploads/yincais/6C8YRupkxKGpr1BmHO9DPGVTYgrav0UBlsouRGdM.jpeg', '印材测试2', 'http://localhost/uploads/yincais/印材测试21.jpg', null, null, null, '印材测试2', '2017-11-18 13:49:41', '2017-11-18 13:49:41'), ('34', 'http://localhost/uploads/yincais/Xnmli6GglM22NRjsj2GomB9i3lywqU3XcGQwCusv.jpeg', 'http://localhost/uploads/yincais/6C8YRupkxKGpr1BmHO9DPGVTYgrav0UBlsouRGdM.jpeg', '印材测试3', 'http://localhost/uploads/yincais/印材测试31.jpg', 'http://localhost/uploads/yincais/印材测试32.jpg', null, null, '印材测试3', '2017-11-18 13:50:51', '2017-11-18 13:50:51');
COMMIT;

SET FOREIGN_KEY_CHECKS = 1;
