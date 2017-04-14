/*
Navicat MySQL Data Transfer

Source Server         : 127.0.0.1
Source Server Version : 50717
Source Host           : localhost:3306
Source Database       : ptcore

Target Server Type    : MYSQL
Target Server Version : 50717
File Encoding         : 65001

Date: 2017-04-11 09:13:35
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for xx_config
-- ----------------------------
DROP TABLE IF EXISTS `xx_config`;
CREATE TABLE `xx_config` (
  `ID` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `value` varchar(255) NOT NULL,
  `remarks` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of xx_config
-- ----------------------------
INSERT INTO `xx_config` VALUES ('1', 'logo', '/public/upload/image/20170411\\156773a874eaa3616a186322ba623b1b.jpg', '这是logo备注');
INSERT INTO `xx_config` VALUES ('2', 'systename', 'windows', '这是系统备注');
INSERT INTO `xx_config` VALUES ('3', 'copyright', '22000', '这是版权备注');
INSERT INTO `xx_config` VALUES ('4', 'company', '嫦娥软件', '这是公司备注');
