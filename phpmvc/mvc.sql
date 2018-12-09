/*
Navicat MySQL Data Transfer

Source Server         : locahost
Source Server Version : 50505
Source Host           : localhost:3306
Source Database       : mvc

Target Server Type    : MYSQL
Target Server Version : 50505
File Encoding         : 65001

Date: 2018-08-26 22:00:48
*/

SET FOREIGN_KEY_CHECKS=0;

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
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8;

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
INSERT INTO `article` VALUES ('13', 'sss', 'sss', '0');
