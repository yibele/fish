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

 Date: 11/18/2017 13:05:01 PM
*/

SET NAMES utf8;
SET FOREIGN_KEY_CHECKS = 0;

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
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8;

-- ----------------------------
--  Records of `xinzhis`
-- ----------------------------
BEGIN;
INSERT INTO `xinzhis` VALUES ('19', null, '夏天的味道', '27', '1', '1400px', '900px', '200px', '100px', '0px', '0px', null, '100px', null, '100px', null, null, null, null, '2017-11-11 00:00:00', '2017-11-11 00:00:00');
COMMIT;

SET FOREIGN_KEY_CHECKS = 1;
