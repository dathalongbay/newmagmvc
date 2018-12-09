/*
Navicat MySQL Data Transfer

Source Server         : 127.0.0.1
Source Server Version : 50505
Source Host           : 127.0.0.1:3306
Source Database       : new_mvc

Target Server Type    : MYSQL
Target Server Version : 50505
File Encoding         : 65001

Date: 2018-12-09 11:34:22
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
  `avatar` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of admins
-- ----------------------------
INSERT INTO `admins` VALUES ('3', 'datdo', '202cb962ac59075b964b07152d234b70', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'dathalongbay@gmail.com', 'dat 1', 'Duy tÃ¢n hÃ  ná»™i', '1689952964', '111 222', '0', '5b952c229380a_noo-3-1507346862593.jpg');

-- ----------------------------
-- Table structure for menuitems
-- ----------------------------
DROP TABLE IF EXISTS `menuitems`;
CREATE TABLE `menuitems` (
  `menuitem_id` int(11) NOT NULL AUTO_INCREMENT,
  `menuitem_name` varchar(255) DEFAULT NULL,
  `menu_id` int(11) DEFAULT NULL,
  `menuitem_type` int(11) DEFAULT NULL,
  `menuitem_data_id` int(11) DEFAULT NULL,
  `menuitem_data_link` varchar(255) DEFAULT NULL,
  `menuitem_created` datetime DEFAULT NULL,
  PRIMARY KEY (`menuitem_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of menuitems
-- ----------------------------

-- ----------------------------
-- Table structure for menus
-- ----------------------------
DROP TABLE IF EXISTS `menus`;
CREATE TABLE `menus` (
  `menu_id` int(11) NOT NULL AUTO_INCREMENT,
  `menu_name` varchar(255) DEFAULT NULL,
  `menu_created` datetime DEFAULT NULL,
  `menu_location` int(11) DEFAULT NULL,
  PRIMARY KEY (`menu_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of menus
-- ----------------------------

-- ----------------------------
-- Table structure for newsletters
-- ----------------------------
DROP TABLE IF EXISTS `newsletters`;
CREATE TABLE `newsletters` (
  `newsletter_id` int(11) NOT NULL AUTO_INCREMENT,
  `email` text,
  `created` datetime DEFAULT NULL,
  PRIMARY KEY (`newsletter_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of newsletters
-- ----------------------------

-- ----------------------------
-- Table structure for posts
-- ----------------------------
DROP TABLE IF EXISTS `posts`;
CREATE TABLE `posts` (
  `post_id` int(11) NOT NULL AUTO_INCREMENT,
  `post_title` varchar(255) DEFAULT NULL,
  `post_slug` text,
  `post_parent_id` int(11) DEFAULT '0',
  `post_intro` text,
  `post_content` text,
  `post_status` int(11) DEFAULT '0',
  `post_created` datetime DEFAULT NULL,
  `post_edited` datetime DEFAULT NULL,
  `post_images` text,
  `post_featured` int(11) DEFAULT NULL,
  PRIMARY KEY (`post_id`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of posts
-- ----------------------------
INSERT INTO `posts` VALUES ('1', 'abc 1 23 sss 123', null, '0', null, 'abc abc 111 222', '1', '2018-12-25 17:40:28', null, null, null);
INSERT INTO `posts` VALUES ('2', 'abc1', null, '0', null, 'abc abc', '0', null, null, null, null);
INSERT INTO `posts` VALUES ('3', 'aaaa', null, '0', null, 'aaa', '0', null, null, null, null);
INSERT INTO `posts` VALUES ('4', 'aaa', null, '0', null, 'aaaa', '0', null, null, null, null);
INSERT INTO `posts` VALUES ('5', 'aaa', null, '0', null, 'aaa', '0', null, null, null, null);
INSERT INTO `posts` VALUES ('6', 'aaa', null, '0', null, 'aaa', '0', null, null, null, null);
INSERT INTO `posts` VALUES ('7', 'aaa', null, '0', null, 'aa', '0', null, null, null, null);
INSERT INTO `posts` VALUES ('8', 'dsfdf', null, '0', null, 'sdfdsf', '0', null, null, null, null);
INSERT INTO `posts` VALUES ('9', 'dfdf', null, '0', null, 'sdfdsf', '0', null, null, null, null);
INSERT INTO `posts` VALUES ('13', 'sss 111', null, '0', null, 'sss', '0', null, null, null, null);
INSERT INTO `posts` VALUES ('14', '11', null, '0', null, '111', '0', null, null, null, null);
INSERT INTO `posts` VALUES ('15', '22222', null, '0', null, '22222', '0', null, null, null, null);
INSERT INTO `posts` VALUES ('16', '111', null, '0', null, '1111', '0', null, null, null, null);

-- ----------------------------
-- Table structure for post_categories
-- ----------------------------
DROP TABLE IF EXISTS `post_categories`;
CREATE TABLE `post_categories` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `category_name` varchar(255) DEFAULT NULL,
  `parent_id` int(11) DEFAULT '0',
  `level` int(11) DEFAULT '0',
  `category_intro` varchar(255) DEFAULT NULL,
  `category_desc` varchar(255) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of post_categories
-- ----------------------------
INSERT INTO `post_categories` VALUES ('1', 'Thá»i sá»±', '0', '1', '<p>Thá»i sá»±</p>', '<p>Thá»i sá»±</p>', '0000-00-00 00:00:00');
INSERT INTO `post_categories` VALUES ('2', 'VÄƒn hÃ³a', '0', '1', '<p>222</p>', '<p>222</p>', '0000-00-00 00:00:00');
INSERT INTO `post_categories` VALUES ('3', 'Kinh táº¿', '1', '1', '<p>333</p>', '<p>333</p>', '0000-00-00 00:00:00');
INSERT INTO `post_categories` VALUES ('4', 'ChÃ­nh trá»‹', '0', '1', '<p>444</p>', '<p>444</p>', '0000-00-00 00:00:00');
INSERT INTO `post_categories` VALUES ('5', 'Khoa há»c', '0', '1', '<p>555</p>', '<p>555</p>', '0000-00-00 00:00:00');
INSERT INTO `post_categories` VALUES ('6', 'Thá»ƒ thao', '0', '1', '<p>666</p>', '<p>666</p>', '0000-00-00 00:00:00');

-- ----------------------------
-- Table structure for post_tag_ref
-- ----------------------------
DROP TABLE IF EXISTS `post_tag_ref`;
CREATE TABLE `post_tag_ref` (
  `post_tag_id` int(11) NOT NULL AUTO_INCREMENT,
  `post_id` int(11) DEFAULT NULL,
  `tag_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`post_tag_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of post_tag_ref
-- ----------------------------

-- ----------------------------
-- Table structure for products
-- ----------------------------
DROP TABLE IF EXISTS `products`;
CREATE TABLE `products` (
  `product_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `product_name` varchar(255) DEFAULT NULL,
  `product_desc` text,
  `product_slug` varchar(255) DEFAULT NULL,
  `product_price` int(11) DEFAULT NULL,
  `product_price_sell` int(11) DEFAULT NULL,
  `created` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`product_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of products
-- ----------------------------
INSERT INTO `products` VALUES ('1', '', '', '', '0', '0', '');
INSERT INTO `products` VALUES ('2', '', '', '', '0', '0', '');

-- ----------------------------
-- Table structure for settings
-- ----------------------------
DROP TABLE IF EXISTS `settings`;
CREATE TABLE `settings` (
  `setting_id` int(11) NOT NULL AUTO_INCREMENT,
  `setting_name` varchar(255) DEFAULT NULL,
  `setting_value` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`setting_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of settings
-- ----------------------------

-- ----------------------------
-- Table structure for tags
-- ----------------------------
DROP TABLE IF EXISTS `tags`;
CREATE TABLE `tags` (
  `tag_id` int(11) NOT NULL AUTO_INCREMENT,
  `tag_name` varchar(255) DEFAULT NULL,
  `tag_created` datetime DEFAULT NULL,
  PRIMARY KEY (`tag_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of tags
-- ----------------------------
