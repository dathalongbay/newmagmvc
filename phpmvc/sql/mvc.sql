/*
Navicat MySQL Data Transfer

Source Server         : locahost
Source Server Version : 50505
Source Host           : localhost:3306
Source Database       : mvc

Target Server Type    : MYSQL
Target Server Version : 50505
File Encoding         : 65001

Date: 2018-09-03 16:22:32
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for admins
-- ----------------------------
DROP TABLE IF EXISTS `admins`;
CREATE TABLE `admins` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `login_time` datetime DEFAULT NULL,
  `logout_time` datetime DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `note` text,
  `status` int(11) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of admins
-- ----------------------------
INSERT INTO `admins` VALUES ('3', 'datdo', 'e9bc0e13a8a16cbb07b175d92a113126', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'dathalongbay@gmail.com', 'dat', 'Duy tÃ¢n hÃ  ná»™i', '1689952964', '111 222', '0');
INSERT INTO `admins` VALUES ('6', 'dat', '202cb962ac59075b964b07152d234b70', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'dathalong11bay@gmail.com', '', '', '', '@123', '0');

-- ----------------------------
-- Table structure for article
-- ----------------------------
DROP TABLE IF EXISTS `article`;
CREATE TABLE `article` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) DEFAULT NULL,
  `article_content` text,
  `status` int(11) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of article
-- ----------------------------
INSERT INTO `article` VALUES ('1', 'abc 1 23 sss 123', 'abc abc 111 222', '1');
INSERT INTO `article` VALUES ('2', 'abc1', 'abc abc', '0');
INSERT INTO `article` VALUES ('3', 'aaaa', 'aaa', '0');
INSERT INTO `article` VALUES ('4', 'aaa', 'aaaa', '0');
INSERT INTO `article` VALUES ('5', 'aaa', 'aaa', '0');
INSERT INTO `article` VALUES ('6', 'aaa', 'aaa', '0');
INSERT INTO `article` VALUES ('7', 'aaa', 'aa', '0');
INSERT INTO `article` VALUES ('8', 'dsfdf', 'sdfdsf', '0');
INSERT INTO `article` VALUES ('9', 'dfdf', 'sdfdsf', '0');
INSERT INTO `article` VALUES ('13', 'sss 111', 'sss', '0');
