/*
Navicat MySQL Data Transfer

Source Server         : hy
Source Server Version : 50715
Source Host           : localhost:3306
Source Database       : phpce

Target Server Type    : MYSQL
Target Server Version : 50715
File Encoding         : 65001

Date: 2017-03-23 17:59:24
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for ce_department
-- ----------------------------
DROP TABLE IF EXISTS `ce_department`;
CREATE TABLE `ce_department` (
  `ID` int(8) NOT NULL AUTO_INCREMENT,
  `OrganizationName` char(32) CHARACTER SET utf8 DEFAULT NULL,
  `ShortName` char(32) CHARACTER SET utf8 DEFAULT NULL,
  `ClassDepth` int(1) DEFAULT NULL,
  `ParentID` int(8) DEFAULT '0',
  `CompetentID` int(8) DEFAULT NULL,
  `SubIDList` char(128) DEFAULT NULL,
  `DutyLeaderUserID` int(11) DEFAULT NULL,
  `OrderNumber` int(8) DEFAULT '1000',
  `DateTimeCreated` datetime DEFAULT NULL,
  `DateTimeUpdated` datetime DEFAULT NULL,
  `IsDelete` bit(1) DEFAULT b'0',
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM AUTO_INCREMENT=119 DEFAULT CHARSET=ascii ROW_FORMAT=COMPACT;

-- ----------------------------
-- Records of ce_department
-- ----------------------------
INSERT INTO `ce_department` VALUES ('1', '河南投资集团有限公司', '投资集团', '0', '0', '1', '1', null, '10', null, '2013-02-13 23:46:58', '\0');
INSERT INTO `ce_department` VALUES ('2', '集团本部', '集团本部', '1', '1', '1', '2', null, '20', null, '2012-12-21 12:45:50', '\0');
INSERT INTO `ce_department` VALUES ('3', '控股企业', '控股企业', '1', '1', '1', '3', null, '30', null, '2012-12-21 12:46:56', '\0');
INSERT INTO `ce_department` VALUES ('4', '参股企业', '参股企业', '1', '1', '1', '4', null, '40', null, '2012-12-21 12:47:19', '\0');
INSERT INTO `ce_department` VALUES ('5', '总经理工作部', '总经部', '2', '2', '2', '5', null, '100', null, '2014-04-08 08:42:09', '\0');
INSERT INTO `ce_department` VALUES ('6', '发展计划部', '计划部', '2', '2', '2', '6', null, '300', null, '2014-04-17 14:35:37', '\0');
INSERT INTO `ce_department` VALUES ('7', '企业策划部', '企划部', '2', '2', '2', '7|99|100|101|104', null, '400', null, '2013-07-26 09:57:06', '\0');
INSERT INTO `ce_department` VALUES ('8', '资本运营部', '资本部', '2', '2', '2', '8', null, '500', null, '2014-04-17 15:46:34', '\0');
INSERT INTO `ce_department` VALUES ('9', '豫能控股', '电力子公司', '2', '2', '2', '9|23|24|25|27|28|29|30|31|32|33|34|45|73|74|85|86|108|115', null, '1800', null, '2013-07-26 10:07:15', '\0');
INSERT INTO `ce_department` VALUES ('10', '金融管理部', '金融部', '2', '2', '2', '10|35|36|37|38|89|98|110', null, '1300', null, '2016-03-14 09:55:16', '\0');
INSERT INTO `ce_department` VALUES ('11', '大河纸业', '造纸子公司', '2', '2', '2', '11|39|40|46|47', null, '1900', null, '2013-07-26 10:07:51', '\0');
INSERT INTO `ce_department` VALUES ('12', '同力股份', '同力股份', '2', '2', '2', '12|104|42|43|48|49|50|51|52|53|75|76|77|78|79|80|81|82|87|96|97|102|105|114', null, '2000', null, '2013-07-26 10:08:21', '\0');
INSERT INTO `ce_department` VALUES ('13', '产业管理部', '产业部', '2', '2', '2', '13|54|55|56|57|58|59|60|83|84|93', null, '1500', null, '2016-03-14 09:55:45', '\0');
INSERT INTO `ce_department` VALUES ('14', '控股发展', '控股发展', '2', '2', '2', '14|41|61|62|72|103|106', null, '1400', null, '2015-12-03 05:05:06', '\0');
INSERT INTO `ce_department` VALUES ('15', '天地置业', '天地置业', '2', '2', '2', '15|44|63|64|65|66|67|68|69|70|71|88|94|95', null, '1600', null, '2015-12-03 05:04:11', '\0');
INSERT INTO `ce_department` VALUES ('16', '资产管理部', '资产部', '2', '2', '2', '16', null, '1700', null, '2016-03-14 09:56:14', '\0');
INSERT INTO `ce_department` VALUES ('17', '专家咨询办公室', '专家办公室', '2', '2', '2', '17', null, '2100', null, '2013-07-26 10:23:31', '\0');
INSERT INTO `ce_department` VALUES ('18', '人力资源部', '人力部', '2', '2', '2', '18', null, '700', null, '2013-07-26 10:00:55', '\0');
INSERT INTO `ce_department` VALUES ('19', '财务部', '财务部', '2', '2', '2', '19', null, '800', null, '2013-07-26 10:01:20', '\0');
INSERT INTO `ce_department` VALUES ('20', '审计部', '审计部', '2', '2', '2', '20', null, '900', null, '2013-07-26 10:01:33', '\0');
INSERT INTO `ce_department` VALUES ('21', '党群工作部', '党群部', '2', '2', '2', '21', null, '1100', null, '2014-04-17 15:46:56', '\0');
INSERT INTO `ce_department` VALUES ('22', '纪检监察部', '纪检部', '2', '2', '2', '22', null, '1200', null, '2014-04-17 15:46:44', '\0');
INSERT INTO `ce_department` VALUES ('23', '河南豫能控股股份有限公司', '豫能控股', '2', '3', '9', '23|115', null, '2000', null, '2013-01-29 14:23:43', '\0');
INSERT INTO `ce_department` VALUES ('24', '南阳鸭河口发电有限责任公司', '鸭河口发电', '2', '3', '9', '24', null, '2100', '2012-12-21 11:11:09', '2013-01-29 14:24:20', '\0');
INSERT INTO `ce_department` VALUES ('25', '南阳天益发电有限责任公司', '天益发电', '2', '3', '9', '25', null, '2200', '2012-12-21 11:36:45', '2013-01-29 14:25:23', '\0');
INSERT INTO `ce_department` VALUES ('26', '法律事务部', '法律部', '2', '2', '2', '26', null, '1000', '2012-12-21 12:32:09', '2013-07-26 10:01:42', '\0');
INSERT INTO `ce_department` VALUES ('27', '鹤壁万和发电有限责任公司', '万和发电', '2', '3', '9', '27', null, '2300', '2012-12-21 13:01:18', '2013-01-29 14:25:33', '\0');
INSERT INTO `ce_department` VALUES ('28', '鹤壁同力发电有限责任公司', '同力发电', '2', '3', '9', '28', null, '2400', '2012-12-24 03:42:15', '2013-01-29 14:25:58', '\0');
INSERT INTO `ce_department` VALUES ('29', '鹤壁丰鹤发电有限责任公司', '鹤壁丰鹤', '2', '3', '9', '29', null, '2500', '2012-12-24 03:42:41', '2013-01-29 14:26:29', '\0');
INSERT INTO `ce_department` VALUES ('30', '河南新中益电力有限公司', '新中益', '2', '3', '9', '30', null, '2600', '2012-12-24 03:43:26', '2013-01-29 14:27:11', '\0');
INSERT INTO `ce_department` VALUES ('31', '濮阳龙丰热电有限责任公司', '龙丰热电', '2', '3', '9', '31', null, '2700', '2012-12-24 03:46:35', '2013-02-28 11:33:57', '\0');
INSERT INTO `ce_department` VALUES ('32', '焦作天力电力投资有限公司', '焦作天力', '2', '3', '9', '32', null, '2800', '2012-12-24 03:48:05', '2013-01-29 14:27:40', '\0');
INSERT INTO `ce_department` VALUES ('33', '郑州新力电力有限公司', '郑州新力', '2', '3', '9', '33', null, '2800', '2012-12-24 03:52:21', '2013-01-29 14:28:12', '\0');
INSERT INTO `ce_department` VALUES ('34', '河南投资集团燃料有限责任公司', '燃料公司', '2', '3', '9', '34', null, '2900', '2012-12-24 03:52:50', '2013-01-29 14:28:23', '\0');
INSERT INTO `ce_department` VALUES ('35', '中原证券股份有限公司', '中原证券', '2', '3', '10', '35', null, '1300100', '2012-12-24 04:03:10', '2013-07-26 10:25:02', '\0');
INSERT INTO `ce_department` VALUES ('36', '中原信托有限公司', '中原信托', '2', '3', '10', '36', null, '1300200', '2012-12-24 04:10:31', '2013-07-26 10:27:20', '\0');
INSERT INTO `ce_department` VALUES ('37', '开封市商业银行股份有限公司', '开封商行', '2', '3', '10', '37', null, '1300300', '2012-12-24 04:11:42', '2013-07-26 10:27:40', '\0');
INSERT INTO `ce_department` VALUES ('38', '河南投资集团担保有限公司', '担保公司', '2', '3', '10', '38|110', null, '1300400', '2012-12-24 04:17:13', '2013-07-26 10:28:00', '\0');
INSERT INTO `ce_department` VALUES ('39', '驻马店市白云纸业有限公司', '白云纸业', '2', '3', '11', '39', null, '3200', '2012-12-24 04:24:50', '2013-01-29 14:29:12', '\0');
INSERT INTO `ce_department` VALUES ('40', '濮阳龙丰纸业有限公司', '龙丰纸业', '2', '3', '11', '40', null, '3300', '2012-12-24 04:25:16', '2013-01-29 14:24:50', '\0');
INSERT INTO `ce_department` VALUES ('41', '河南省许平南高速公路有限责任公司', '许平南', '2', '3', '14', '41', null, '1400300', '2013-01-16 08:24:44', '2013-07-26 10:33:51', '\0');
INSERT INTO `ce_department` VALUES ('42', '驻马店市豫龙同力水泥有限公司', '豫龙同力', '2', '3', '12', '42|75|76|77|78|79|80|81|82', null, '1000', '2013-01-21 14:50:41', '2013-01-29 14:48:24', '\0');
INSERT INTO `ce_department` VALUES ('43', '河南同力水泥股份公司', '同力股份', '2', '3', '12', '43', null, '1000', '2013-01-21 14:51:37', '2013-01-21 14:51:37', '\0');
INSERT INTO `ce_department` VALUES ('44', '林州市太行大峡谷旅游开发有限公司', '大峡谷', '2', '3', '15', '44', null, '1600200', '2013-01-29 10:47:45', '2013-07-26 10:36:55', '\0');
INSERT INTO `ce_department` VALUES ('45', '河南豫能电力检修工程有限公司', '豫能检修', '2', '3', '9', '45|115', null, '2850', '2013-01-29 14:35:38', '2013-01-29 14:36:50', '\0');
INSERT INTO `ce_department` VALUES ('46', '焦作瑞丰纸业有限公司', '瑞丰纸业', '2', '3', '11', '46', null, '3310', '2013-01-29 14:38:44', '2013-01-29 14:38:44', '\0');
INSERT INTO `ce_department` VALUES ('47', '周口大河林业有限公司', '大河林业', '2', '3', '11', '47', null, '3310', '2013-01-29 14:39:00', '2013-01-29 14:39:00', '\0');
INSERT INTO `ce_department` VALUES ('48', '三门峡市建方水泥有限公司', '建方水泥', '2', '3', '12', '48', null, '3310', '2013-01-29 14:39:42', '2013-01-29 14:39:42', '\0');
INSERT INTO `ce_department` VALUES ('49', '河南省豫鹤同力水泥有限公司', '豫鹤同力', '2', '3', '12', '49|97|105', null, '4000', '2013-01-29 14:40:33', '2013-01-29 14:40:33', '\0');
INSERT INTO `ce_department` VALUES ('50', '洛阳黄河同力水泥有限责任公司', '黄河同力', '2', '3', '12', '50', null, '4000', '2013-01-29 14:40:51', '2013-01-29 14:40:51', '\0');
INSERT INTO `ce_department` VALUES ('51', '新乡平原同力水泥有限责任公司', '平原同力', '2', '3', '12', '51|96|102', null, '4100', '2013-01-29 14:41:10', '2013-01-29 14:41:10', '\0');
INSERT INTO `ce_department` VALUES ('52', '河南省同力水泥有限公司', '省同力', '2', '3', '12', '52|114|105', null, '4200', '2013-01-29 14:41:25', '2013-09-17 15:09:11', '\0');
INSERT INTO `ce_department` VALUES ('53', '河南省豫南水泥有限公司', '豫南水泥', '2', '3', '12', '53', null, '4200', '2013-01-29 14:42:00', '2013-09-17 15:09:37', '\0');
INSERT INTO `ce_department` VALUES ('54', '郑州拓洋实业有限公司', '拓洋实业', '2', '3', '13', '54', null, '5000', '2013-01-29 14:42:57', '2013-01-29 14:42:57', '\0');
INSERT INTO `ce_department` VALUES ('55', '河南安彩高科股份有限公司', '安彩高科', '2', '3', '13', '55', null, '1500100', '2013-01-29 14:43:10', '2013-07-26 10:35:08', '\0');
INSERT INTO `ce_department` VALUES ('56', '南阳信泰科技有限公司', '信泰科技', '2', '3', '13', '56', null, '5000', '2013-01-29 14:43:19', '2013-01-29 14:43:19', '\0');
INSERT INTO `ce_department` VALUES ('57', '郑州海特模具有限公司', '海特模具', '2', '3', '13', '57', null, '5000', '2013-01-29 14:43:29', '2013-01-29 14:43:29', '\0');
INSERT INTO `ce_department` VALUES ('58', '河南仲景药业有限公司', '仲景药业', '2', '3', '13', '58', null, '5000', '2013-01-29 14:43:39', '2013-01-29 14:43:39', '\0');
INSERT INTO `ce_department` VALUES ('59', '洛阳春都投资股份有限公司', '春都投资', '2', '3', '13', '59', null, '5000', '2013-01-29 14:43:50', '2013-01-29 14:43:50', '\0');
INSERT INTO `ce_department` VALUES ('60', '河南新能硅业科技有限公司', '新能硅业', '2', '3', '13', '60', null, '5000', '2013-01-29 14:44:01', '2013-01-29 14:44:01', '\0');
INSERT INTO `ce_department` VALUES ('61', '河南天地置业有限责任公司', '天地置业', '2', '3', '14', '61', null, '1400100', '2013-01-29 14:44:53', '2013-07-26 10:32:59', '\0');
INSERT INTO `ce_department` VALUES ('62', '河南投资集团电子科技有限责任公司', '电子科技', '2', '3', '14', '62', null, '1400200', '2013-01-29 14:45:22', '2013-07-26 10:33:10', '\0');
INSERT INTO `ce_department` VALUES ('63', '天地酒店管理公司', '酒管公司', '2', '3', '15', '63|94|95', null, '1600100', '2013-01-29 14:45:40', '2013-07-26 10:37:07', '\0');
INSERT INTO `ce_department` VALUES ('64', '河南投资集团丹阳岛开发有限公司', '丹阳岛', '2', '3', '15', '64', null, '1600300', '2013-01-29 14:46:28', '2013-07-26 10:37:17', '\0');
INSERT INTO `ce_department` VALUES ('65', '内黄林场', '内黄林场', '2', '3', '15', '65', null, '1600400', '2013-01-29 14:46:46', '2013-07-26 10:42:03', '\0');
INSERT INTO `ce_department` VALUES ('66', '民权林场', '民权林场', '2', '3', '15', '66', null, '1600500', '2013-01-29 14:46:54', '2013-07-26 10:43:24', '\0');
INSERT INTO `ce_department` VALUES ('67', '西华林场', '西华林场', '2', '3', '15', '67', null, '1600600', '2013-01-29 14:47:01', '2013-07-26 10:43:09', '\0');
INSERT INTO `ce_department` VALUES ('68', '扶沟林场', '扶沟林场', '2', '3', '15', '68', null, '1600700', '2013-01-29 14:47:12', '2013-07-26 10:42:39', '\0');
INSERT INTO `ce_department` VALUES ('69', '河南省国有固始林场', '固始林场', '2', '3', '15', '69', null, '1600800', '2013-01-29 14:47:26', '2013-07-26 10:42:20', '\0');
INSERT INTO `ce_department` VALUES ('70', '河南省林业厅物资站', '物资站', '2', '3', '15', '70', null, '1601000', '2013-01-29 14:47:49', '2013-07-26 10:39:15', '\0');
INSERT INTO `ce_department` VALUES ('71', '河南投资集团白条河农场', '白条河农场', '2', '3', '15', '71', null, '1600900', '2013-01-29 14:48:00', '2013-07-26 10:40:31', '\0');
INSERT INTO `ce_department` VALUES ('72', '河南林长高速公路有限责任公司', '林长高速', '2', '3', '14', '72', null, '1400400', '2013-01-31 15:31:00', '2013-07-26 10:34:45', '\0');
INSERT INTO `ce_department` VALUES ('73', '新乡中益计划部', '中益计划部', '3', '85', '85', '73', null, '1000', '2013-02-04 16:58:32', '2013-03-14 11:46:55', '\0');
INSERT INTO `ce_department` VALUES ('74', '鹤壁鹤淇发电有限责任公司', '鹤壁鹤淇', '2', '3', '9', '74', null, '1000', '2013-02-16 14:35:29', '2013-02-16 14:35:29', '\0');
INSERT INTO `ce_department` VALUES ('75', '豫龙同力信阳分公司', '豫龙同力信阳', '3', '42', '42', '75', null, '1000', '2013-02-19 15:26:41', '2013-02-19 17:06:24', '\0');
INSERT INTO `ce_department` VALUES ('76', '豫龙同力采购部-大宗原材料', '豫龙同力大采', '3', '42', '42', '76', null, '1000', '2013-02-19 16:57:10', '2013-02-19 16:59:57', '\0');
INSERT INTO `ce_department` VALUES ('77', '豫龙同力采购部-备品备件', '豫龙同力备品', '3', '42', '42', '77', null, '1000', '2013-02-19 16:57:45', '2013-02-19 17:00:21', '\0');
INSERT INTO `ce_department` VALUES ('78', '豫龙同力物流部-运输服务', '豫龙同力物流', '3', '42', '42', '78', null, '1000', '2013-02-19 16:58:11', '2013-02-19 17:00:29', '\0');
INSERT INTO `ce_department` VALUES ('79', '豫龙同力二期-工程', '豫龙同力二期', '3', '42', '42', '79', null, '1000', '2013-02-19 16:58:34', '2013-02-19 17:00:37', '\0');
INSERT INTO `ce_department` VALUES ('80', '豫龙同力综合办-劳务', '豫龙同力劳务', '3', '42', '42', '80', null, '1000', '2013-02-19 16:58:54', '2013-02-19 17:00:57', '\0');
INSERT INTO `ce_department` VALUES ('81', '豫龙同力生产部-维修服务', '豫龙同力维修', '3', '42', '42', '81', null, '1000', '2013-02-19 16:59:14', '2013-02-19 17:01:09', '\0');
INSERT INTO `ce_department` VALUES ('82', '豫龙同力新辉', '豫龙同力新辉', '3', '42', '42', '82', null, '1000', '2013-02-20 10:19:00', '2013-02-20 10:19:00', '\0');
INSERT INTO `ce_department` VALUES ('83', '河南省立安实业有限责任公司', '立安实业', '2', '3', '13', '83', null, '1500700', '2013-02-27 10:43:29', '2013-07-26 10:32:28', '\0');
INSERT INTO `ce_department` VALUES ('84', '河南省发展燃气有限公司', '发展燃气', '2', '3', '13', '84', null, '1000', '2013-03-05 17:28:53', '2014-05-08 09:35:35', '\0');
INSERT INTO `ce_department` VALUES ('85', '新乡中益发电有限公司', '新乡中益', '2', '3', '9', '73|85|86', null, '1000', '2013-03-14 11:45:59', '2013-03-14 11:45:59', '\0');
INSERT INTO `ce_department` VALUES ('86', '新乡中益物资部', '中益物资部', '3', '85', '85', '86', null, '1000', '2013-03-14 11:47:41', '2013-03-14 11:47:41', '\0');
INSERT INTO `ce_department` VALUES ('87', '三门峡腾跃同力水泥有限公司', '腾跃同力', '2', '3', '12', '87', null, '1000', '2013-06-07 11:20:34', '2013-06-07 11:20:34', '\0');
INSERT INTO `ce_department` VALUES ('88', '河南省绿源林产品有限公司', '绿源公司', '2', '3', '15', '88', null, '1601100', '2013-06-26 16:06:03', '2013-07-26 10:39:31', '\0');
INSERT INTO `ce_department` VALUES ('89', '北京新安财富创业投资有限公司', '北新投', '2', '3', '10', '89', null, '1300800', '2013-07-02 10:23:02', '2013-07-26 10:31:38', '\0');
INSERT INTO `ce_department` VALUES ('90', '战略发展部', '战略部', '2', '2', '2', '90', null, '200', '2013-07-26 09:53:26', '2013-07-26 09:55:37', '\0');
INSERT INTO `ce_department` VALUES ('91', '工程管理部', '工程部', '2', '2', '2', '91', null, '400', '2013-07-26 09:53:46', '2014-04-17 15:46:21', '\0');
INSERT INTO `ce_department` VALUES ('92', '董事会办公室', '董事会办公室', '2', '2', '2', '92', null, '2200', '2013-07-26 10:24:06', '2015-04-23 15:26:40', '\0');
INSERT INTO `ce_department` VALUES ('93', '郑州宝蓝包装技术有限公司', '郑州宝蓝', '2', '3', '13', '93', null, '1500800', '2013-09-04 15:22:47', '2013-09-04 15:23:17', '\0');
INSERT INTO `ce_department` VALUES ('94', '河南天地酒店有限公司', '天地酒店', '3', '63', '15', '94', null, '1000', '2013-09-06 16:44:33', '2013-09-06 16:44:33', '\0');
INSERT INTO `ce_department` VALUES ('95', '天地酒店公司红旗渠迎宾馆分公司', '红旗渠迎宾馆', '3', '63', '15', '95', null, '1000', '2013-09-06 16:44:59', '2013-09-06 16:46:13', '\0');
INSERT INTO `ce_department` VALUES ('96', '长垣县同力水泥有限责任公司', '长垣同力', '3', '51', '12', '96', null, '1000', '2013-09-17 15:07:40', '2013-09-18 08:25:09', '\0');
INSERT INTO `ce_department` VALUES ('97', '濮阳同力水泥有限公司', '濮阳同力', '3', '49', '12', '97', null, '1000', '2013-09-18 08:24:51', '2013-09-18 08:24:51', '\0');
INSERT INTO `ce_department` VALUES ('98', '河南创业投资有限公司', '河南创投', '2', '3', '10', '98', null, '1300900', '2013-11-14 10:32:04', '2013-11-14 10:33:03', '\0');
INSERT INTO `ce_department` VALUES ('99', '电力董事会', '电力董事会', '3', '2', '7', '99', null, '1000', '2014-04-08 08:43:46', '2014-04-08 08:45:27', '\0');
INSERT INTO `ce_department` VALUES ('100', '造纸董事会', '造纸董事会', '3', '2', '7', '100', null, '1000', '2014-04-08 08:44:11', '2014-04-08 08:45:43', '\0');
INSERT INTO `ce_department` VALUES ('101', '水泥董事会', '水泥董事会', '3', '2', '7', '101|104', null, '1000', '2014-04-08 08:44:20', '2014-04-08 08:45:55', '\0');
INSERT INTO `ce_department` VALUES ('102', '长垣同力建材有限公司', '长垣同力建材', '3', '51', '12', '102', null, '1000', '2014-06-09 10:51:22', '2014-06-09 10:51:22', '\0');
INSERT INTO `ce_department` VALUES ('103', '河南投资集团控股发展有限公司', '控股发展', '2', '3', '14', '103', null, '1400500', '2014-06-16 11:28:26', '2014-06-16 11:29:09', '\0');
INSERT INTO `ce_department` VALUES ('104', '同力水泥豫北运营区', '同力豫北区', '3', '12', '101', '104', null, '1000', '2015-01-20 09:54:38', '2015-01-20 09:54:38', '\0');
INSERT INTO `ce_department` VALUES ('105', '鹤壁同力建材有限公司', '鹤壁同力建材', '3', '49', '52', '105', null, '1000', '2015-02-28 10:31:21', '2015-02-28 10:31:21', '\0');
INSERT INTO `ce_department` VALUES ('106', '郑州航空港水务发展有限公司', '港区水务', '2', '3', '14', '106', null, '1400510', '2015-04-07 16:54:00', '2015-04-07 16:55:54', '\0');
INSERT INTO `ce_department` VALUES ('107', '集团领导', '集团领导', '2', '2', '2', '107', null, '50', '2015-04-24 11:53:46', '2015-04-24 11:54:16', '\0');
INSERT INTO `ce_department` VALUES ('108', '濮阳豫能发电有限责任公司', '濮阳豫能', '2', '3', '9', '108', null, '2850', '2015-04-24 15:51:33', '2015-04-24 15:52:45', '\0');
INSERT INTO `ce_department` VALUES ('109', '控股企业高管', '企业高管', '2', '2', '2', '109', null, '1750', '2015-04-27 10:11:41', '2015-04-27 10:12:25', '\0');
INSERT INTO `ce_department` VALUES ('110', '综合部', '担保-综合部', '3', '38', '38', '110', null, '1000', '2015-05-04 10:10:22', '2015-05-04 10:10:22', '\0');
INSERT INTO `ce_department` VALUES ('111', '基金管理部', '基金部', '2', '2', '2', '111', null, '1210', '2015-11-10 16:01:15', '2015-11-10 16:02:20', '\0');
INSERT INTO `ce_department` VALUES ('112', '信息管理部', '信息部', '2', '2', '2', '112', null, '1220', '2015-11-10 16:02:53', '2015-11-10 16:02:53', '\0');
INSERT INTO `ce_department` VALUES ('113', '业务协同部', '协同部', '2', '2', '2', '113', null, '1230', '2015-11-10 16:03:14', '2015-11-10 16:05:35', '\0');
INSERT INTO `ce_department` VALUES ('114', '省同力综合办', '综合办', '3', '52', '52', '114', null, '1000', '2016-05-10 11:08:20', '2016-05-10 11:08:20', '\0');
INSERT INTO `ce_department` VALUES ('115', '河南煤炭储配交易中心有限公司', '煤炭交易', '3', '23', '45', '115', null, '1000', '2016-05-13 17:24:16', '2016-05-13 17:24:16', '\0');
INSERT INTO `ce_department` VALUES ('116', '河南城市发展投资有限公司', '省发投', '2', '1', '117', '116', null, '1000', '2016-06-02 08:14:47', '2016-06-02 08:16:07', '\0');
INSERT INTO `ce_department` VALUES ('117', '河南城发', '河南城发', '2', '2', '2', '117|116', null, '1400', '2016-06-02 08:15:13', '2016-06-02 08:19:44', '\0');
INSERT INTO `ce_department` VALUES ('118', '颐城控股', '颐城控股', '2', '2', '2', '118', null, '1400', '2016-06-02 08:23:33', '2016-06-02 08:23:33', '\0');

-- ----------------------------
-- Table structure for ce_department1
-- ----------------------------
DROP TABLE IF EXISTS `ce_department1`;
CREATE TABLE `ce_department1` (
  `ID` int(5) NOT NULL AUTO_INCREMENT,
  `DepartmentID` int(5) DEFAULT NULL,
  `DepartmentName` char(50) DEFAULT NULL,
  `ParentID` int(5) DEFAULT NULL,
  `IsDelete` int(5) DEFAULT '0',
  `DatetimeCreated` datetime DEFAULT NULL,
  `DatetimeUpdated` datetime DEFAULT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ce_department1
-- ----------------------------

-- ----------------------------
-- Table structure for ce_menu
-- ----------------------------
DROP TABLE IF EXISTS `ce_menu`;
CREATE TABLE `ce_menu` (
  `ID` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `MenuID` bigint(20) DEFAULT NULL,
  `MenuName` char(100) COLLATE utf8_latvian_ci DEFAULT NULL,
  `ParentID` int(11) unsigned DEFAULT NULL,
  `URL` char(100) COLLATE utf8_latvian_ci DEFAULT NULL,
  `Flag` int(11) DEFAULT '0',
  `DatetimeCreated` datetime DEFAULT NULL,
  `DatetimeUpdated` datetime DEFAULT NULL,
  `IsDelete` int(11) DEFAULT '0',
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8 COLLATE=utf8_latvian_ci;

-- ----------------------------
-- Records of ce_menu
-- ----------------------------
INSERT INTO `ce_menu` VALUES ('1', '1', '基本设置', '0', '#', '0', '2017-02-21 18:33:05', '2017-02-20 18:33:08', '0');
INSERT INTO `ce_menu` VALUES ('2', '2', '信息设置', '0', '#', '0', '2017-02-20 18:34:21', '2017-02-20 18:34:25', '0');
INSERT INTO `ce_menu` VALUES ('3', '3', '管理中心', '0', '#', '0', '2017-02-21 18:35:39', '2017-02-21 18:35:41', '0');
INSERT INTO `ce_menu` VALUES ('4', '4', '角色管理', '1', '#index/Role/index', '0', '2017-02-23 15:40:29', '2017-02-23 15:40:57', '0');
INSERT INTO `ce_menu` VALUES ('5', '5', '菜单管理', '1', '#index/Menu/index/', '0', '2017-02-23 15:40:31', '2017-02-23 15:41:00', '0');
INSERT INTO `ce_menu` VALUES ('6', '6', '会员管理', '1', '#index/User/index/', '0', '2017-02-23 15:40:33', '2017-02-23 15:41:03', '0');
INSERT INTO `ce_menu` VALUES ('7', '7', '部门管理', '1', '#index/Department/index/', '0', '2017-02-23 15:40:36', '2017-02-23 15:41:05', '0');
INSERT INTO `ce_menu` VALUES ('9', '9', '关键字管理', '2', 'keyword.html', '0', '2017-02-23 15:40:42', '2017-02-23 15:41:14', '0');
INSERT INTO `ce_menu` VALUES ('10', '10', '关键字分组管理', '2', 'keyword_group.html', '0', '2017-02-23 15:40:46', '2017-02-23 15:41:16', '0');
INSERT INTO `ce_menu` VALUES ('11', '11', '敏感字管理', '2', 'sensitive.html', '0', '2017-02-23 15:40:47', '2017-02-23 15:41:18', '0');
INSERT INTO `ce_menu` VALUES ('12', '12', '分类管理', '2', 'catalog.html', '0', '2017-02-23 15:40:50', '2017-02-23 15:41:24', '0');
INSERT INTO `ce_menu` VALUES ('13', '13', '用户管理', '3', 'user_list.html', '0', '2017-02-23 15:40:52', '2017-02-23 15:41:26', '0');
INSERT INTO `ce_menu` VALUES ('14', '14', '角色管理', '3', 'role.html', '0', '2017-02-23 15:40:55', '2017-02-23 15:41:27', '0');
INSERT INTO `ce_menu` VALUES ('15', '15', '陈官勇', '18', '#', '0', '2017-03-09 14:34:59', '2017-03-09 14:35:03', '0');
INSERT INTO `ce_menu` VALUES ('16', '16', 'ccccc', '15', '#', '0', null, null, '0');
INSERT INTO `ce_menu` VALUES ('17', '17', '手机菜单', '0', '#', '0', null, null, '0');
INSERT INTO `ce_menu` VALUES ('18', '18', '后台菜单', '0', '#', '0', null, null, '0');
INSERT INTO `ce_menu` VALUES ('19', '19', '前台菜单', '0', '#', '0', null, null, '0');

-- ----------------------------
-- Table structure for ce_menu_role
-- ----------------------------
DROP TABLE IF EXISTS `ce_menu_role`;
CREATE TABLE `ce_menu_role` (
  `ID` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `MenuID` bigint(20) NOT NULL,
  `RoleID` bigint(20) NOT NULL,
  `DatetimeCreated` datetime DEFAULT NULL,
  `DatetimeUpdated` datetime DEFAULT NULL,
  `IsDelete` int(11) DEFAULT '0',
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8 COLLATE=utf8_latvian_ci;

-- ----------------------------
-- Records of ce_menu_role
-- ----------------------------
INSERT INTO `ce_menu_role` VALUES ('1', '1', '1', '2017-02-23 14:56:26', '2017-03-06 16:32:39', '0');
INSERT INTO `ce_menu_role` VALUES ('2', '2', '1', '2017-02-23 15:50:31', '2017-03-06 16:32:41', '0');
INSERT INTO `ce_menu_role` VALUES ('3', '3', '1', '2017-02-23 15:50:34', '2017-03-06 16:32:45', '0');
INSERT INTO `ce_menu_role` VALUES ('4', '4', '1', '2017-03-06 16:32:04', '2017-03-06 16:32:46', '0');
INSERT INTO `ce_menu_role` VALUES ('5', '5', '1', '2017-03-06 16:32:09', '2017-03-06 16:32:48', '0');
INSERT INTO `ce_menu_role` VALUES ('6', '6', '1', '2017-03-06 16:32:11', '2017-03-06 16:32:51', '0');
INSERT INTO `ce_menu_role` VALUES ('7', '7', '1', '2017-03-23 16:32:20', '2017-03-06 16:32:53', '0');
INSERT INTO `ce_menu_role` VALUES ('8', '8', '1', '2017-03-06 16:32:12', '2017-03-06 16:32:55', '0');
INSERT INTO `ce_menu_role` VALUES ('9', '9', '1', '2017-03-16 16:32:22', '2017-03-06 16:32:57', '0');
INSERT INTO `ce_menu_role` VALUES ('10', '10', '1', '2017-03-06 16:32:25', '2017-03-06 16:32:59', '0');
INSERT INTO `ce_menu_role` VALUES ('11', '11', '1', '2017-03-06 16:32:27', '2017-03-06 16:33:04', '0');
INSERT INTO `ce_menu_role` VALUES ('12', '12', '1', '2017-03-06 16:32:29', '2017-03-06 16:33:06', '0');
INSERT INTO `ce_menu_role` VALUES ('13', '13', '1', '2017-03-06 16:32:31', '2017-03-06 16:33:07', '0');
INSERT INTO `ce_menu_role` VALUES ('16', '14', '1', '2017-03-06 16:32:33', '2017-03-06 16:33:09', '0');
INSERT INTO `ce_menu_role` VALUES ('17', '17', '1', null, null, '0');
INSERT INTO `ce_menu_role` VALUES ('18', '18', '1', null, null, '0');
INSERT INTO `ce_menu_role` VALUES ('19', '19', '1', null, null, '0');
INSERT INTO `ce_menu_role` VALUES ('20', '15', '1', null, null, '0');

-- ----------------------------
-- Table structure for ce_role
-- ----------------------------
DROP TABLE IF EXISTS `ce_role`;
CREATE TABLE `ce_role` (
  `ID` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `RoleID` bigint(20) DEFAULT NULL,
  `RoleName` char(100) COLLATE utf8_latvian_ci DEFAULT NULL,
  `IsDelete` int(11) unsigned DEFAULT '0',
  `DatetimeCreated` datetime DEFAULT NULL,
  `DatetimeUpdated` datetime DEFAULT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8 COLLATE=utf8_latvian_ci;

-- ----------------------------
-- Records of ce_role
-- ----------------------------
INSERT INTO `ce_role` VALUES ('1', '1', '管理员', '0', '2017-02-21 18:37:01', '2017-02-21 18:37:05');
INSERT INTO `ce_role` VALUES ('2', '2', '审核员', '0', '2017-02-21 18:37:37', '2017-02-24 10:06:04');
INSERT INTO `ce_role` VALUES ('3', '3', '发布员', '0', '2017-02-21 18:38:42', '2017-02-24 10:06:24');
INSERT INTO `ce_role` VALUES ('8', '8', '地方浮动', '1', '2017-02-22 06:28:17', '2017-02-22 06:28:17');
INSERT INTO `ce_role` VALUES ('9', '9', '陈官勇', '1', '2017-02-22 06:30:29', '2017-02-22 06:48:09');
INSERT INTO `ce_role` VALUES ('10', '10', '陈官ooo', '1', '2017-02-22 06:33:43', '2017-02-24 10:06:11');
INSERT INTO `ce_role` VALUES ('11', '11', 'chen', '0', '2017-02-23 00:32:15', '2017-03-13 14:08:19');
INSERT INTO `ce_role` VALUES ('12', '12', 'ggg', '1', '2017-02-23 12:31:40', '2017-02-23 12:31:44');
INSERT INTO `ce_role` VALUES ('13', '13', '你好', '1', '2017-02-23 16:31:58', '2017-02-24 10:06:18');
INSERT INTO `ce_role` VALUES ('14', null, '大', '1', null, null);
INSERT INTO `ce_role` VALUES ('15', null, '对方V', '1', null, null);
INSERT INTO `ce_role` VALUES ('16', '16', 'DSAFD', '1', null, null);
INSERT INTO `ce_role` VALUES ('17', '17', '打发', '1', '2017-03-13 13:57:56', '2017-03-13 13:57:56');

-- ----------------------------
-- Table structure for ce_role_user
-- ----------------------------
DROP TABLE IF EXISTS `ce_role_user`;
CREATE TABLE `ce_role_user` (
  `ID` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `RoleID` bigint(20) DEFAULT NULL,
  `UserID` bigint(20) DEFAULT NULL,
  `IsDelete` int(11) DEFAULT '0',
  `DatetimeCreated` datetime DEFAULT NULL,
  `DatetimeUpdated` datetime DEFAULT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=453 DEFAULT CHARSET=utf8 COLLATE=utf8_latvian_ci;

-- ----------------------------
-- Records of ce_role_user
-- ----------------------------
INSERT INTO `ce_role_user` VALUES ('1', '1', '824', '0', null, null);
INSERT INTO `ce_role_user` VALUES ('29', '11', '16', '0', '2017-02-23 12:31:26', '2017-02-23 12:31:26');
INSERT INTO `ce_role_user` VALUES ('30', '13', '1', '0', '2017-02-23 16:32:08', '2017-02-23 16:32:08');
INSERT INTO `ce_role_user` VALUES ('31', '13', '2', '0', '2017-02-23 16:32:08', '2017-02-23 16:32:08');
INSERT INTO `ce_role_user` VALUES ('32', '13', '3', '0', '2017-02-23 16:32:08', '2017-02-23 16:32:08');
INSERT INTO `ce_role_user` VALUES ('33', '3', '1', '0', '2017-02-27 11:21:42', '2017-02-27 11:21:42');
INSERT INTO `ce_role_user` VALUES ('34', '2', '1', '0', '2017-02-27 11:22:27', '2017-02-27 11:22:27');
INSERT INTO `ce_role_user` VALUES ('35', '2', '825', '0', '2017-02-27 11:22:27', '2017-02-27 11:22:27');
INSERT INTO `ce_role_user` VALUES ('36', '2', '827', '0', '2017-02-27 11:22:27', '2017-02-27 11:22:27');
INSERT INTO `ce_role_user` VALUES ('37', '1', '825', '0', '2017-02-27 11:23:00', '2017-02-27 11:23:00');
INSERT INTO `ce_role_user` VALUES ('38', '1', '827', '0', '2017-02-27 11:23:00', '2017-02-27 11:23:00');
INSERT INTO `ce_role_user` VALUES ('39', '1', '5', '0', '2017-02-28 06:39:25', '2017-02-28 06:39:25');
INSERT INTO `ce_role_user` VALUES ('40', '1', '9', '0', '2017-02-28 06:39:25', '2017-02-28 06:39:25');
INSERT INTO `ce_role_user` VALUES ('41', '1', '11', '0', '2017-02-28 06:39:26', '2017-02-28 06:39:26');
INSERT INTO `ce_role_user` VALUES ('42', '1', '342', '0', '2017-02-28 06:39:26', '2017-02-28 06:39:26');
INSERT INTO `ce_role_user` VALUES ('43', '1', '391', '0', '2017-02-28 06:39:26', '2017-02-28 06:39:26');
INSERT INTO `ce_role_user` VALUES ('44', '1', '556', '0', '2017-02-28 06:39:26', '2017-02-28 06:39:26');
INSERT INTO `ce_role_user` VALUES ('45', '1', '541', '0', '2017-02-28 06:39:26', '2017-02-28 06:39:26');
INSERT INTO `ce_role_user` VALUES ('46', '1', '545', '0', '2017-02-28 06:39:26', '2017-02-28 06:39:26');
INSERT INTO `ce_role_user` VALUES ('47', '1', '597', '0', '2017-02-28 06:39:26', '2017-02-28 06:39:26');
INSERT INTO `ce_role_user` VALUES ('48', '1', '601', '0', '2017-02-28 06:39:26', '2017-02-28 06:39:26');
INSERT INTO `ce_role_user` VALUES ('49', '1', '676', '0', '2017-02-28 06:39:27', '2017-02-28 06:39:27');
INSERT INTO `ce_role_user` VALUES ('50', '1', '749', '0', '2017-02-28 06:39:27', '2017-02-28 06:39:27');
INSERT INTO `ce_role_user` VALUES ('51', '1', '8', '0', '2017-02-28 06:39:27', '2017-02-28 06:39:27');
INSERT INTO `ce_role_user` VALUES ('52', '1', '16', '0', '2017-02-28 06:39:27', '2017-02-28 06:39:27');
INSERT INTO `ce_role_user` VALUES ('53', '1', '380', '0', '2017-02-28 06:39:27', '2017-02-28 06:39:27');
INSERT INTO `ce_role_user` VALUES ('54', '1', '393', '0', '2017-02-28 06:39:27', '2017-02-28 06:39:27');
INSERT INTO `ce_role_user` VALUES ('55', '1', '549', '0', '2017-02-28 06:39:27', '2017-02-28 06:39:27');
INSERT INTO `ce_role_user` VALUES ('56', '1', '474', '0', '2017-02-28 06:39:27', '2017-02-28 06:39:27');
INSERT INTO `ce_role_user` VALUES ('57', '1', '501', '0', '2017-02-28 06:39:27', '2017-02-28 06:39:27');
INSERT INTO `ce_role_user` VALUES ('58', '1', '575', '0', '2017-02-28 06:39:27', '2017-02-28 06:39:27');
INSERT INTO `ce_role_user` VALUES ('59', '1', '760', '0', '2017-02-28 06:39:27', '2017-02-28 06:39:27');
INSERT INTO `ce_role_user` VALUES ('60', '1', '761', '0', '2017-02-28 06:39:27', '2017-02-28 06:39:27');
INSERT INTO `ce_role_user` VALUES ('61', '1', '766', '0', '2017-02-28 06:39:27', '2017-02-28 06:39:27');
INSERT INTO `ce_role_user` VALUES ('62', '1', '789', '0', '2017-02-28 06:39:28', '2017-02-28 06:39:28');
INSERT INTO `ce_role_user` VALUES ('63', '1', '805', '0', '2017-02-28 06:39:28', '2017-02-28 06:39:28');
INSERT INTO `ce_role_user` VALUES ('64', '1', '806', '0', '2017-02-28 06:39:28', '2017-02-28 06:39:28');
INSERT INTO `ce_role_user` VALUES ('65', '1', '808', '0', '2017-02-28 06:39:28', '2017-02-28 06:39:28');
INSERT INTO `ce_role_user` VALUES ('66', '1', '811', '0', '2017-02-28 06:39:28', '2017-02-28 06:39:28');
INSERT INTO `ce_role_user` VALUES ('67', '1', '815', '0', '2017-02-28 06:39:28', '2017-02-28 06:39:28');
INSERT INTO `ce_role_user` VALUES ('68', '1', '3', '0', '2017-02-28 06:39:28', '2017-02-28 06:39:28');
INSERT INTO `ce_role_user` VALUES ('69', '1', '7', '0', '2017-02-28 06:39:28', '2017-02-28 06:39:28');
INSERT INTO `ce_role_user` VALUES ('70', '1', '55', '0', '2017-02-28 06:39:28', '2017-02-28 06:39:28');
INSERT INTO `ce_role_user` VALUES ('71', '1', '100', '0', '2017-02-28 06:39:28', '2017-02-28 06:39:28');
INSERT INTO `ce_role_user` VALUES ('72', '1', '369', '0', '2017-02-28 06:39:28', '2017-02-28 06:39:28');
INSERT INTO `ce_role_user` VALUES ('73', '1', '389', '0', '2017-02-28 06:39:28', '2017-02-28 06:39:28');
INSERT INTO `ce_role_user` VALUES ('74', '1', '437', '0', '2017-02-28 06:39:28', '2017-02-28 06:39:28');
INSERT INTO `ce_role_user` VALUES ('75', '1', '560', '0', '2017-02-28 06:39:28', '2017-02-28 06:39:28');
INSERT INTO `ce_role_user` VALUES ('76', '1', '779', '0', '2017-02-28 06:39:28', '2017-02-28 06:39:28');
INSERT INTO `ce_role_user` VALUES ('77', '1', '395', '0', '2017-02-28 06:39:28', '2017-02-28 06:39:28');
INSERT INTO `ce_role_user` VALUES ('78', '1', '547', '0', '2017-02-28 06:39:28', '2017-02-28 06:39:28');
INSERT INTO `ce_role_user` VALUES ('79', '1', '548', '0', '2017-02-28 06:39:28', '2017-02-28 06:39:28');
INSERT INTO `ce_role_user` VALUES ('80', '1', '492', '0', '2017-02-28 06:39:29', '2017-02-28 06:39:29');
INSERT INTO `ce_role_user` VALUES ('81', '1', '493', '0', '2017-02-28 06:39:29', '2017-02-28 06:39:29');
INSERT INTO `ce_role_user` VALUES ('82', '1', '680', '0', '2017-02-28 06:39:29', '2017-02-28 06:39:29');
INSERT INTO `ce_role_user` VALUES ('83', '1', '684', '0', '2017-02-28 06:39:29', '2017-02-28 06:39:29');
INSERT INTO `ce_role_user` VALUES ('84', '1', '783', '0', '2017-02-28 06:39:29', '2017-02-28 06:39:29');
INSERT INTO `ce_role_user` VALUES ('85', '1', '56', '0', '2017-02-28 06:39:29', '2017-02-28 06:39:29');
INSERT INTO `ce_role_user` VALUES ('86', '1', '73', '0', '2017-02-28 06:39:29', '2017-02-28 06:39:29');
INSERT INTO `ce_role_user` VALUES ('87', '1', '113', '0', '2017-02-28 06:39:29', '2017-02-28 06:39:29');
INSERT INTO `ce_role_user` VALUES ('88', '1', '154', '0', '2017-02-28 06:39:29', '2017-02-28 06:39:29');
INSERT INTO `ce_role_user` VALUES ('89', '1', '179', '0', '2017-02-28 06:39:29', '2017-02-28 06:39:29');
INSERT INTO `ce_role_user` VALUES ('90', '1', '180', '0', '2017-02-28 06:39:29', '2017-02-28 06:39:29');
INSERT INTO `ce_role_user` VALUES ('91', '1', '186', '0', '2017-02-28 06:39:29', '2017-02-28 06:39:29');
INSERT INTO `ce_role_user` VALUES ('92', '1', '385', '0', '2017-02-28 06:39:29', '2017-02-28 06:39:29');
INSERT INTO `ce_role_user` VALUES ('93', '1', '625', '0', '2017-02-28 06:39:29', '2017-02-28 06:39:29');
INSERT INTO `ce_role_user` VALUES ('94', '1', '711', '0', '2017-02-28 06:39:30', '2017-02-28 06:39:30');
INSERT INTO `ce_role_user` VALUES ('95', '1', '715', '0', '2017-02-28 06:39:30', '2017-02-28 06:39:30');
INSERT INTO `ce_role_user` VALUES ('96', '1', '717', '0', '2017-02-28 06:39:30', '2017-02-28 06:39:30');
INSERT INTO `ce_role_user` VALUES ('97', '1', '718', '0', '2017-02-28 06:39:30', '2017-02-28 06:39:30');
INSERT INTO `ce_role_user` VALUES ('98', '1', '719', '0', '2017-02-28 06:39:30', '2017-02-28 06:39:30');
INSERT INTO `ce_role_user` VALUES ('99', '1', '728', '0', '2017-02-28 06:39:30', '2017-02-28 06:39:30');
INSERT INTO `ce_role_user` VALUES ('100', '1', '731', '0', '2017-02-28 06:39:30', '2017-02-28 06:39:30');
INSERT INTO `ce_role_user` VALUES ('101', '1', '771', '0', '2017-02-28 06:39:30', '2017-02-28 06:39:30');
INSERT INTO `ce_role_user` VALUES ('102', '1', '156', '0', '2017-02-28 06:39:30', '2017-02-28 06:39:30');
INSERT INTO `ce_role_user` VALUES ('103', '1', '160', '0', '2017-02-28 06:39:30', '2017-02-28 06:39:30');
INSERT INTO `ce_role_user` VALUES ('104', '1', '402', '0', '2017-02-28 06:39:30', '2017-02-28 06:39:30');
INSERT INTO `ce_role_user` VALUES ('105', '1', '482', '0', '2017-02-28 06:39:30', '2017-02-28 06:39:30');
INSERT INTO `ce_role_user` VALUES ('106', '1', '509', '0', '2017-02-28 06:39:30', '2017-02-28 06:39:30');
INSERT INTO `ce_role_user` VALUES ('107', '1', '598', '0', '2017-02-28 06:39:30', '2017-02-28 06:39:30');
INSERT INTO `ce_role_user` VALUES ('108', '1', '74', '0', '2017-02-28 06:39:31', '2017-02-28 06:39:31');
INSERT INTO `ce_role_user` VALUES ('109', '1', '83', '0', '2017-02-28 06:39:31', '2017-02-28 06:39:31');
INSERT INTO `ce_role_user` VALUES ('110', '1', '101', '0', '2017-02-28 06:39:31', '2017-02-28 06:39:31');
INSERT INTO `ce_role_user` VALUES ('111', '1', '183', '0', '2017-02-28 06:39:31', '2017-02-28 06:39:31');
INSERT INTO `ce_role_user` VALUES ('112', '1', '208', '0', '2017-02-28 06:39:31', '2017-02-28 06:39:31');
INSERT INTO `ce_role_user` VALUES ('113', '1', '383', '0', '2017-02-28 06:39:31', '2017-02-28 06:39:31');
INSERT INTO `ce_role_user` VALUES ('114', '1', '429', '0', '2017-02-28 06:39:31', '2017-02-28 06:39:31');
INSERT INTO `ce_role_user` VALUES ('115', '1', '430', '0', '2017-02-28 06:39:31', '2017-02-28 06:39:31');
INSERT INTO `ce_role_user` VALUES ('116', '1', '433', '0', '2017-02-28 06:39:31', '2017-02-28 06:39:31');
INSERT INTO `ce_role_user` VALUES ('117', '1', '712', '0', '2017-02-28 06:39:31', '2017-02-28 06:39:31');
INSERT INTO `ce_role_user` VALUES ('118', '1', '713', '0', '2017-02-28 06:39:31', '2017-02-28 06:39:31');
INSERT INTO `ce_role_user` VALUES ('119', '1', '714', '0', '2017-02-28 06:39:31', '2017-02-28 06:39:31');
INSERT INTO `ce_role_user` VALUES ('120', '1', '716', '0', '2017-02-28 06:39:32', '2017-02-28 06:39:32');
INSERT INTO `ce_role_user` VALUES ('121', '1', '739', '0', '2017-02-28 06:39:32', '2017-02-28 06:39:32');
INSERT INTO `ce_role_user` VALUES ('122', '1', '752', '0', '2017-02-28 06:39:32', '2017-02-28 06:39:32');
INSERT INTO `ce_role_user` VALUES ('123', '1', '765', '0', '2017-02-28 06:39:32', '2017-02-28 06:39:32');
INSERT INTO `ce_role_user` VALUES ('124', '1', '33', '0', '2017-02-28 06:39:32', '2017-02-28 06:39:32');
INSERT INTO `ce_role_user` VALUES ('125', '1', '102', '0', '2017-02-28 06:39:32', '2017-02-28 06:39:32');
INSERT INTO `ce_role_user` VALUES ('126', '1', '110', '0', '2017-02-28 06:39:32', '2017-02-28 06:39:32');
INSERT INTO `ce_role_user` VALUES ('127', '1', '161', '0', '2017-02-28 06:39:32', '2017-02-28 06:39:32');
INSERT INTO `ce_role_user` VALUES ('128', '1', '373', '0', '2017-02-28 06:39:32', '2017-02-28 06:39:32');
INSERT INTO `ce_role_user` VALUES ('129', '1', '384', '0', '2017-02-28 06:39:32', '2017-02-28 06:39:32');
INSERT INTO `ce_role_user` VALUES ('130', '1', '416', '0', '2017-02-28 06:39:32', '2017-02-28 06:39:32');
INSERT INTO `ce_role_user` VALUES ('131', '1', '564', '0', '2017-02-28 06:39:32', '2017-02-28 06:39:32');
INSERT INTO `ce_role_user` VALUES ('132', '1', '641', '0', '2017-02-28 06:39:32', '2017-02-28 06:39:32');
INSERT INTO `ce_role_user` VALUES ('133', '1', '677', '0', '2017-02-28 06:39:32', '2017-02-28 06:39:32');
INSERT INTO `ce_role_user` VALUES ('134', '1', '726', '0', '2017-02-28 06:39:32', '2017-02-28 06:39:32');
INSERT INTO `ce_role_user` VALUES ('135', '1', '727', '0', '2017-02-28 06:39:32', '2017-02-28 06:39:32');
INSERT INTO `ce_role_user` VALUES ('136', '1', '753', '0', '2017-02-28 06:39:32', '2017-02-28 06:39:32');
INSERT INTO `ce_role_user` VALUES ('137', '1', '772', '0', '2017-02-28 06:39:32', '2017-02-28 06:39:32');
INSERT INTO `ce_role_user` VALUES ('138', '1', '795', '0', '2017-02-28 06:39:32', '2017-02-28 06:39:32');
INSERT INTO `ce_role_user` VALUES ('139', '1', '362', '0', '2017-02-28 06:39:32', '2017-02-28 06:39:32');
INSERT INTO `ce_role_user` VALUES ('140', '1', '379', '0', '2017-02-28 06:39:32', '2017-02-28 06:39:32');
INSERT INTO `ce_role_user` VALUES ('141', '1', '404', '0', '2017-02-28 06:39:32', '2017-02-28 06:39:32');
INSERT INTO `ce_role_user` VALUES ('142', '1', '543', '0', '2017-02-28 06:39:32', '2017-02-28 06:39:32');
INSERT INTO `ce_role_user` VALUES ('143', '1', '563', '0', '2017-02-28 06:39:32', '2017-02-28 06:39:32');
INSERT INTO `ce_role_user` VALUES ('144', '1', '603', '0', '2017-02-28 06:39:32', '2017-02-28 06:39:32');
INSERT INTO `ce_role_user` VALUES ('145', '1', '633', '0', '2017-02-28 06:39:33', '2017-02-28 06:39:33');
INSERT INTO `ce_role_user` VALUES ('146', '1', '639', '0', '2017-02-28 06:39:33', '2017-02-28 06:39:33');
INSERT INTO `ce_role_user` VALUES ('147', '1', '403', '0', '2017-02-28 06:39:33', '2017-02-28 06:39:33');
INSERT INTO `ce_role_user` VALUES ('148', '1', '405', '0', '2017-02-28 06:39:33', '2017-02-28 06:39:33');
INSERT INTO `ce_role_user` VALUES ('149', '1', '406', '0', '2017-02-28 06:39:33', '2017-02-28 06:39:33');
INSERT INTO `ce_role_user` VALUES ('150', '1', '540', '0', '2017-02-28 06:39:33', '2017-02-28 06:39:33');
INSERT INTO `ce_role_user` VALUES ('151', '1', '551', '0', '2017-02-28 06:39:33', '2017-02-28 06:39:33');
INSERT INTO `ce_role_user` VALUES ('152', '1', '536', '0', '2017-02-28 06:39:33', '2017-02-28 06:39:33');
INSERT INTO `ce_role_user` VALUES ('153', '1', '508', '0', '2017-02-28 06:39:33', '2017-02-28 06:39:33');
INSERT INTO `ce_role_user` VALUES ('154', '1', '512', '0', '2017-02-28 06:39:33', '2017-02-28 06:39:33');
INSERT INTO `ce_role_user` VALUES ('155', '1', '526', '0', '2017-02-28 06:39:33', '2017-02-28 06:39:33');
INSERT INTO `ce_role_user` VALUES ('156', '1', '533', '0', '2017-02-28 06:39:33', '2017-02-28 06:39:33');
INSERT INTO `ce_role_user` VALUES ('157', '1', '534', '0', '2017-02-28 06:39:33', '2017-02-28 06:39:33');
INSERT INTO `ce_role_user` VALUES ('158', '1', '600', '0', '2017-02-28 06:39:34', '2017-02-28 06:39:34');
INSERT INTO `ce_role_user` VALUES ('159', '1', '628', '0', '2017-02-28 06:39:34', '2017-02-28 06:39:34');
INSERT INTO `ce_role_user` VALUES ('160', '1', '642', '0', '2017-02-28 06:39:34', '2017-02-28 06:39:34');
INSERT INTO `ce_role_user` VALUES ('161', '1', '396', '0', '2017-02-28 06:39:34', '2017-02-28 06:39:34');
INSERT INTO `ce_role_user` VALUES ('162', '1', '544', '0', '2017-02-28 06:39:34', '2017-02-28 06:39:34');
INSERT INTO `ce_role_user` VALUES ('163', '1', '455', '0', '2017-02-28 06:39:34', '2017-02-28 06:39:34');
INSERT INTO `ce_role_user` VALUES ('164', '1', '468', '0', '2017-02-28 06:39:34', '2017-02-28 06:39:34');
INSERT INTO `ce_role_user` VALUES ('165', '1', '480', '0', '2017-02-28 06:39:34', '2017-02-28 06:39:34');
INSERT INTO `ce_role_user` VALUES ('166', '1', '554', '0', '2017-02-28 06:39:34', '2017-02-28 06:39:34');
INSERT INTO `ce_role_user` VALUES ('167', '1', '502', '0', '2017-02-28 06:39:34', '2017-02-28 06:39:34');
INSERT INTO `ce_role_user` VALUES ('168', '1', '637', '0', '2017-02-28 06:39:34', '2017-02-28 06:39:34');
INSERT INTO `ce_role_user` VALUES ('169', '1', '638', '0', '2017-02-28 06:39:34', '2017-02-28 06:39:34');
INSERT INTO `ce_role_user` VALUES ('170', '1', '15', '0', '2017-02-28 06:39:34', '2017-02-28 06:39:34');
INSERT INTO `ce_role_user` VALUES ('171', '1', '58', '0', '2017-02-28 06:39:34', '2017-02-28 06:39:34');
INSERT INTO `ce_role_user` VALUES ('172', '1', '397', '0', '2017-02-28 06:39:34', '2017-02-28 06:39:34');
INSERT INTO `ce_role_user` VALUES ('173', '1', '550', '0', '2017-02-28 06:39:34', '2017-02-28 06:39:34');
INSERT INTO `ce_role_user` VALUES ('174', '1', '559', '0', '2017-02-28 06:39:35', '2017-02-28 06:39:35');
INSERT INTO `ce_role_user` VALUES ('175', '1', '537', '0', '2017-02-28 06:39:35', '2017-02-28 06:39:35');
INSERT INTO `ce_role_user` VALUES ('176', '1', '546', '0', '2017-02-28 06:39:35', '2017-02-28 06:39:35');
INSERT INTO `ce_role_user` VALUES ('177', '1', '594', '0', '2017-02-28 06:39:35', '2017-02-28 06:39:35');
INSERT INTO `ce_role_user` VALUES ('178', '1', '596', '0', '2017-02-28 06:39:35', '2017-02-28 06:39:35');
INSERT INTO `ce_role_user` VALUES ('179', '1', '531', '0', '2017-02-28 06:39:35', '2017-02-28 06:39:35');
INSERT INTO `ce_role_user` VALUES ('180', '1', '664', '0', '2017-02-28 06:39:35', '2017-02-28 06:39:35');
INSERT INTO `ce_role_user` VALUES ('181', '1', '398', '0', '2017-02-28 06:39:35', '2017-02-28 06:39:35');
INSERT INTO `ce_role_user` VALUES ('182', '1', '491', '0', '2017-02-28 06:39:35', '2017-02-28 06:39:35');
INSERT INTO `ce_role_user` VALUES ('183', '1', '503', '0', '2017-02-28 06:39:35', '2017-02-28 06:39:35');
INSERT INTO `ce_role_user` VALUES ('184', '1', '630', '0', '2017-02-28 06:39:35', '2017-02-28 06:39:35');
INSERT INTO `ce_role_user` VALUES ('185', '1', '640', '0', '2017-02-28 06:39:35', '2017-02-28 06:39:35');
INSERT INTO `ce_role_user` VALUES ('186', '1', '643', '0', '2017-02-28 06:39:36', '2017-02-28 06:39:36');
INSERT INTO `ce_role_user` VALUES ('187', '1', '644', '0', '2017-02-28 06:39:36', '2017-02-28 06:39:36');
INSERT INTO `ce_role_user` VALUES ('188', '1', '651', '0', '2017-02-28 06:39:36', '2017-02-28 06:39:36');
INSERT INTO `ce_role_user` VALUES ('189', '1', '819', '0', '2017-02-28 06:39:36', '2017-02-28 06:39:36');
INSERT INTO `ce_role_user` VALUES ('190', '1', '820', '0', '2017-02-28 06:39:36', '2017-02-28 06:39:36');
INSERT INTO `ce_role_user` VALUES ('191', '1', '99', '0', '2017-02-28 06:39:36', '2017-02-28 06:39:36');
INSERT INTO `ce_role_user` VALUES ('192', '1', '400', '0', '2017-02-28 06:39:36', '2017-02-28 06:39:36');
INSERT INTO `ce_role_user` VALUES ('193', '1', '447', '0', '2017-02-28 06:39:36', '2017-02-28 06:39:36');
INSERT INTO `ce_role_user` VALUES ('194', '1', '557', '0', '2017-02-28 06:39:36', '2017-02-28 06:39:36');
INSERT INTO `ce_role_user` VALUES ('195', '1', '499', '0', '2017-02-28 06:39:36', '2017-02-28 06:39:36');
INSERT INTO `ce_role_user` VALUES ('196', '1', '500', '0', '2017-02-28 06:39:36', '2017-02-28 06:39:36');
INSERT INTO `ce_role_user` VALUES ('197', '1', '506', '0', '2017-02-28 06:39:36', '2017-02-28 06:39:36');
INSERT INTO `ce_role_user` VALUES ('198', '1', '17', '0', '2017-02-28 06:39:36', '2017-02-28 06:39:36');
INSERT INTO `ce_role_user` VALUES ('199', '1', '18', '0', '2017-02-28 06:39:36', '2017-02-28 06:39:36');
INSERT INTO `ce_role_user` VALUES ('200', '1', '19', '0', '2017-02-28 06:39:36', '2017-02-28 06:39:36');
INSERT INTO `ce_role_user` VALUES ('201', '1', '169', '0', '2017-02-28 06:39:36', '2017-02-28 06:39:36');
INSERT INTO `ce_role_user` VALUES ('202', '1', '401', '0', '2017-02-28 06:39:36', '2017-02-28 06:39:36');
INSERT INTO `ce_role_user` VALUES ('203', '1', '631', '0', '2017-02-28 06:39:36', '2017-02-28 06:39:36');
INSERT INTO `ce_role_user` VALUES ('204', '1', '399', '0', '2017-02-28 06:39:36', '2017-02-28 06:39:36');
INSERT INTO `ce_role_user` VALUES ('205', '1', '561', '0', '2017-02-28 06:39:36', '2017-02-28 06:39:36');
INSERT INTO `ce_role_user` VALUES ('206', '1', '539', '0', '2017-02-28 06:39:36', '2017-02-28 06:39:36');
INSERT INTO `ce_role_user` VALUES ('207', '1', '552', '0', '2017-02-28 06:39:36', '2017-02-28 06:39:36');
INSERT INTO `ce_role_user` VALUES ('208', '1', '553', '0', '2017-02-28 06:39:36', '2017-02-28 06:39:36');
INSERT INTO `ce_role_user` VALUES ('209', '1', '6', '0', '2017-02-28 06:39:36', '2017-02-28 06:39:36');
INSERT INTO `ce_role_user` VALUES ('210', '1', '80', '0', '2017-02-28 06:39:36', '2017-02-28 06:39:36');
INSERT INTO `ce_role_user` VALUES ('211', '1', '392', '0', '2017-02-28 06:39:36', '2017-02-28 06:39:36');
INSERT INTO `ce_role_user` VALUES ('212', '1', '443', '0', '2017-02-28 06:39:37', '2017-02-28 06:39:37');
INSERT INTO `ce_role_user` VALUES ('213', '1', '555', '0', '2017-02-28 06:39:37', '2017-02-28 06:39:37');
INSERT INTO `ce_role_user` VALUES ('214', '1', '510', '0', '2017-02-28 06:39:37', '2017-02-28 06:39:37');
INSERT INTO `ce_role_user` VALUES ('215', '1', '604', '0', '2017-02-28 06:39:37', '2017-02-28 06:39:37');
INSERT INTO `ce_role_user` VALUES ('216', '1', '608', '0', '2017-02-28 06:39:37', '2017-02-28 06:39:37');
INSERT INTO `ce_role_user` VALUES ('217', '1', '762', '0', '2017-02-28 06:39:37', '2017-02-28 06:39:37');
INSERT INTO `ce_role_user` VALUES ('218', '1', '782', '0', '2017-02-28 06:39:37', '2017-02-28 06:39:37');
INSERT INTO `ce_role_user` VALUES ('219', '1', '790', '0', '2017-02-28 06:39:37', '2017-02-28 06:39:37');
INSERT INTO `ce_role_user` VALUES ('220', '1', '807', '0', '2017-02-28 06:39:37', '2017-02-28 06:39:37');
INSERT INTO `ce_role_user` VALUES ('221', '1', '810', '0', '2017-02-28 06:39:37', '2017-02-28 06:39:37');
INSERT INTO `ce_role_user` VALUES ('222', '1', '812', '0', '2017-02-28 06:39:37', '2017-02-28 06:39:37');
INSERT INTO `ce_role_user` VALUES ('223', '1', '813', '0', '2017-02-28 06:39:37', '2017-02-28 06:39:37');
INSERT INTO `ce_role_user` VALUES ('224', '1', '814', '0', '2017-02-28 06:39:37', '2017-02-28 06:39:37');
INSERT INTO `ce_role_user` VALUES ('225', '1', '816', '0', '2017-02-28 06:39:37', '2017-02-28 06:39:37');
INSERT INTO `ce_role_user` VALUES ('226', '1', '2', '0', '2017-02-28 06:39:37', '2017-02-28 06:39:37');
INSERT INTO `ce_role_user` VALUES ('227', '1', '82', '0', '2017-02-28 06:39:38', '2017-02-28 06:39:38');
INSERT INTO `ce_role_user` VALUES ('228', '1', '157', '0', '2017-02-28 06:39:38', '2017-02-28 06:39:38');
INSERT INTO `ce_role_user` VALUES ('229', '1', '158', '0', '2017-02-28 06:39:38', '2017-02-28 06:39:38');
INSERT INTO `ce_role_user` VALUES ('230', '1', '159', '0', '2017-02-28 06:39:38', '2017-02-28 06:39:38');
INSERT INTO `ce_role_user` VALUES ('231', '1', '394', '0', '2017-02-28 06:39:38', '2017-02-28 06:39:38');
INSERT INTO `ce_role_user` VALUES ('232', '1', '809', '0', '2017-02-28 06:39:38', '2017-02-28 06:39:38');
INSERT INTO `ce_role_user` VALUES ('233', '1', '407', '0', '2017-02-28 06:39:38', '2017-02-28 06:39:38');
INSERT INTO `ce_role_user` VALUES ('234', '1', '408', '0', '2017-02-28 06:39:38', '2017-02-28 06:39:38');
INSERT INTO `ce_role_user` VALUES ('235', '1', '409', '0', '2017-02-28 06:39:38', '2017-02-28 06:39:38');
INSERT INTO `ce_role_user` VALUES ('236', '1', '532', '0', '2017-02-28 06:39:38', '2017-02-28 06:39:38');
INSERT INTO `ce_role_user` VALUES ('237', '1', '107', '0', '2017-02-28 06:39:38', '2017-02-28 06:39:38');
INSERT INTO `ce_role_user` VALUES ('238', '1', '420', '0', '2017-02-28 06:39:38', '2017-02-28 06:39:38');
INSERT INTO `ce_role_user` VALUES ('239', '1', '607', '0', '2017-02-28 06:39:38', '2017-02-28 06:39:38');
INSERT INTO `ce_role_user` VALUES ('240', '1', '609', '0', '2017-02-28 06:39:39', '2017-02-28 06:39:39');
INSERT INTO `ce_role_user` VALUES ('241', '1', '610', '0', '2017-02-28 06:39:39', '2017-02-28 06:39:39');
INSERT INTO `ce_role_user` VALUES ('242', '1', '611', '0', '2017-02-28 06:39:39', '2017-02-28 06:39:39');
INSERT INTO `ce_role_user` VALUES ('243', '1', '615', '0', '2017-02-28 06:39:39', '2017-02-28 06:39:39');
INSERT INTO `ce_role_user` VALUES ('244', '1', '616', '0', '2017-02-28 06:39:39', '2017-02-28 06:39:39');
INSERT INTO `ce_role_user` VALUES ('245', '1', '620', '0', '2017-02-28 06:39:39', '2017-02-28 06:39:39');
INSERT INTO `ce_role_user` VALUES ('246', '1', '621', '0', '2017-02-28 06:39:39', '2017-02-28 06:39:39');
INSERT INTO `ce_role_user` VALUES ('247', '1', '626', '0', '2017-02-28 06:39:39', '2017-02-28 06:39:39');
INSERT INTO `ce_role_user` VALUES ('248', '1', '634', '0', '2017-02-28 06:39:39', '2017-02-28 06:39:39');
INSERT INTO `ce_role_user` VALUES ('249', '1', '636', '0', '2017-02-28 06:39:39', '2017-02-28 06:39:39');
INSERT INTO `ce_role_user` VALUES ('250', '1', '562', '0', '2017-02-28 06:39:39', '2017-02-28 06:39:39');
INSERT INTO `ce_role_user` VALUES ('251', '1', '645', '0', '2017-02-28 06:39:39', '2017-02-28 06:39:39');
INSERT INTO `ce_role_user` VALUES ('252', '1', '647', '0', '2017-02-28 06:39:40', '2017-02-28 06:39:40');
INSERT INTO `ce_role_user` VALUES ('253', '1', '648', '0', '2017-02-28 06:39:40', '2017-02-28 06:39:40');
INSERT INTO `ce_role_user` VALUES ('254', '1', '649', '0', '2017-02-28 06:39:40', '2017-02-28 06:39:40');
INSERT INTO `ce_role_user` VALUES ('255', '1', '652', '0', '2017-02-28 06:39:40', '2017-02-28 06:39:40');
INSERT INTO `ce_role_user` VALUES ('256', '1', '653', '0', '2017-02-28 06:39:40', '2017-02-28 06:39:40');
INSERT INTO `ce_role_user` VALUES ('257', '1', '654', '0', '2017-02-28 06:39:40', '2017-02-28 06:39:40');
INSERT INTO `ce_role_user` VALUES ('258', '1', '655', '0', '2017-02-28 06:39:40', '2017-02-28 06:39:40');
INSERT INTO `ce_role_user` VALUES ('259', '1', '656', '0', '2017-02-28 06:39:40', '2017-02-28 06:39:40');
INSERT INTO `ce_role_user` VALUES ('260', '1', '657', '0', '2017-02-28 06:39:40', '2017-02-28 06:39:40');
INSERT INTO `ce_role_user` VALUES ('261', '1', '658', '0', '2017-02-28 06:39:40', '2017-02-28 06:39:40');
INSERT INTO `ce_role_user` VALUES ('262', '1', '659', '0', '2017-02-28 06:39:40', '2017-02-28 06:39:40');
INSERT INTO `ce_role_user` VALUES ('263', '1', '660', '0', '2017-02-28 06:39:40', '2017-02-28 06:39:40');
INSERT INTO `ce_role_user` VALUES ('264', '1', '661', '0', '2017-02-28 06:39:40', '2017-02-28 06:39:40');
INSERT INTO `ce_role_user` VALUES ('265', '1', '662', '0', '2017-02-28 06:39:41', '2017-02-28 06:39:41');
INSERT INTO `ce_role_user` VALUES ('266', '1', '663', '0', '2017-02-28 06:39:41', '2017-02-28 06:39:41');
INSERT INTO `ce_role_user` VALUES ('267', '1', '665', '0', '2017-02-28 06:39:41', '2017-02-28 06:39:41');
INSERT INTO `ce_role_user` VALUES ('268', '1', '666', '0', '2017-02-28 06:39:41', '2017-02-28 06:39:41');
INSERT INTO `ce_role_user` VALUES ('269', '1', '667', '0', '2017-02-28 06:39:41', '2017-02-28 06:39:41');
INSERT INTO `ce_role_user` VALUES ('270', '1', '668', '0', '2017-02-28 06:39:41', '2017-02-28 06:39:41');
INSERT INTO `ce_role_user` VALUES ('271', '1', '669', '0', '2017-02-28 06:39:41', '2017-02-28 06:39:41');
INSERT INTO `ce_role_user` VALUES ('272', '1', '670', '0', '2017-02-28 06:39:41', '2017-02-28 06:39:41');
INSERT INTO `ce_role_user` VALUES ('273', '1', '671', '0', '2017-02-28 06:39:41', '2017-02-28 06:39:41');
INSERT INTO `ce_role_user` VALUES ('274', '1', '672', '0', '2017-02-28 06:39:41', '2017-02-28 06:39:41');
INSERT INTO `ce_role_user` VALUES ('275', '1', '673', '0', '2017-02-28 06:39:41', '2017-02-28 06:39:41');
INSERT INTO `ce_role_user` VALUES ('276', '1', '674', '0', '2017-02-28 06:39:41', '2017-02-28 06:39:41');
INSERT INTO `ce_role_user` VALUES ('277', '1', '675', '0', '2017-02-28 06:39:41', '2017-02-28 06:39:41');
INSERT INTO `ce_role_user` VALUES ('278', '1', '678', '0', '2017-02-28 06:39:41', '2017-02-28 06:39:41');
INSERT INTO `ce_role_user` VALUES ('279', '1', '679', '0', '2017-02-28 06:39:41', '2017-02-28 06:39:41');
INSERT INTO `ce_role_user` VALUES ('280', '1', '681', '0', '2017-02-28 06:39:41', '2017-02-28 06:39:41');
INSERT INTO `ce_role_user` VALUES ('281', '1', '682', '0', '2017-02-28 06:39:41', '2017-02-28 06:39:41');
INSERT INTO `ce_role_user` VALUES ('282', '1', '683', '0', '2017-02-28 06:39:41', '2017-02-28 06:39:41');
INSERT INTO `ce_role_user` VALUES ('283', '1', '685', '0', '2017-02-28 06:39:41', '2017-02-28 06:39:41');
INSERT INTO `ce_role_user` VALUES ('284', '1', '687', '0', '2017-02-28 06:39:41', '2017-02-28 06:39:41');
INSERT INTO `ce_role_user` VALUES ('285', '1', '688', '0', '2017-02-28 06:39:41', '2017-02-28 06:39:41');
INSERT INTO `ce_role_user` VALUES ('286', '1', '689', '0', '2017-02-28 06:39:41', '2017-02-28 06:39:41');
INSERT INTO `ce_role_user` VALUES ('287', '1', '690', '0', '2017-02-28 06:39:41', '2017-02-28 06:39:41');
INSERT INTO `ce_role_user` VALUES ('288', '1', '691', '0', '2017-02-28 06:39:41', '2017-02-28 06:39:41');
INSERT INTO `ce_role_user` VALUES ('289', '1', '692', '0', '2017-02-28 06:39:42', '2017-02-28 06:39:42');
INSERT INTO `ce_role_user` VALUES ('290', '1', '694', '0', '2017-02-28 06:39:42', '2017-02-28 06:39:42');
INSERT INTO `ce_role_user` VALUES ('291', '1', '695', '0', '2017-02-28 06:39:42', '2017-02-28 06:39:42');
INSERT INTO `ce_role_user` VALUES ('292', '1', '696', '0', '2017-02-28 06:39:42', '2017-02-28 06:39:42');
INSERT INTO `ce_role_user` VALUES ('293', '1', '697', '0', '2017-02-28 06:39:42', '2017-02-28 06:39:42');
INSERT INTO `ce_role_user` VALUES ('294', '1', '700', '0', '2017-02-28 06:39:42', '2017-02-28 06:39:42');
INSERT INTO `ce_role_user` VALUES ('295', '1', '701', '0', '2017-02-28 06:39:42', '2017-02-28 06:39:42');
INSERT INTO `ce_role_user` VALUES ('296', '1', '702', '0', '2017-02-28 06:39:42', '2017-02-28 06:39:42');
INSERT INTO `ce_role_user` VALUES ('297', '1', '703', '0', '2017-02-28 06:39:42', '2017-02-28 06:39:42');
INSERT INTO `ce_role_user` VALUES ('298', '1', '704', '0', '2017-02-28 06:39:42', '2017-02-28 06:39:42');
INSERT INTO `ce_role_user` VALUES ('299', '1', '706', '0', '2017-02-28 06:39:42', '2017-02-28 06:39:42');
INSERT INTO `ce_role_user` VALUES ('300', '1', '707', '0', '2017-02-28 06:39:42', '2017-02-28 06:39:42');
INSERT INTO `ce_role_user` VALUES ('301', '1', '708', '0', '2017-02-28 06:39:42', '2017-02-28 06:39:42');
INSERT INTO `ce_role_user` VALUES ('302', '1', '709', '0', '2017-02-28 06:39:43', '2017-02-28 06:39:43');
INSERT INTO `ce_role_user` VALUES ('303', '1', '710', '0', '2017-02-28 06:39:43', '2017-02-28 06:39:43');
INSERT INTO `ce_role_user` VALUES ('304', '1', '720', '0', '2017-02-28 06:39:43', '2017-02-28 06:39:43');
INSERT INTO `ce_role_user` VALUES ('305', '1', '721', '0', '2017-02-28 06:39:43', '2017-02-28 06:39:43');
INSERT INTO `ce_role_user` VALUES ('306', '1', '722', '0', '2017-02-28 06:39:43', '2017-02-28 06:39:43');
INSERT INTO `ce_role_user` VALUES ('307', '1', '723', '0', '2017-02-28 06:39:43', '2017-02-28 06:39:43');
INSERT INTO `ce_role_user` VALUES ('308', '1', '724', '0', '2017-02-28 06:39:43', '2017-02-28 06:39:43');
INSERT INTO `ce_role_user` VALUES ('309', '1', '725', '0', '2017-02-28 06:39:43', '2017-02-28 06:39:43');
INSERT INTO `ce_role_user` VALUES ('310', '1', '730', '0', '2017-02-28 06:39:43', '2017-02-28 06:39:43');
INSERT INTO `ce_role_user` VALUES ('311', '1', '732', '0', '2017-02-28 06:39:43', '2017-02-28 06:39:43');
INSERT INTO `ce_role_user` VALUES ('312', '1', '733', '0', '2017-02-28 06:39:44', '2017-02-28 06:39:44');
INSERT INTO `ce_role_user` VALUES ('313', '1', '735', '0', '2017-02-28 06:39:44', '2017-02-28 06:39:44');
INSERT INTO `ce_role_user` VALUES ('314', '1', '736', '0', '2017-02-28 06:39:44', '2017-02-28 06:39:44');
INSERT INTO `ce_role_user` VALUES ('315', '1', '737', '0', '2017-02-28 06:39:44', '2017-02-28 06:39:44');
INSERT INTO `ce_role_user` VALUES ('316', '1', '738', '0', '2017-02-28 06:39:44', '2017-02-28 06:39:44');
INSERT INTO `ce_role_user` VALUES ('317', '1', '740', '0', '2017-02-28 06:39:44', '2017-02-28 06:39:44');
INSERT INTO `ce_role_user` VALUES ('318', '1', '741', '0', '2017-02-28 06:39:44', '2017-02-28 06:39:44');
INSERT INTO `ce_role_user` VALUES ('319', '1', '742', '0', '2017-02-28 06:39:44', '2017-02-28 06:39:44');
INSERT INTO `ce_role_user` VALUES ('320', '1', '743', '0', '2017-02-28 06:39:44', '2017-02-28 06:39:44');
INSERT INTO `ce_role_user` VALUES ('321', '1', '744', '0', '2017-02-28 06:39:44', '2017-02-28 06:39:44');
INSERT INTO `ce_role_user` VALUES ('322', '1', '745', '0', '2017-02-28 06:39:44', '2017-02-28 06:39:44');
INSERT INTO `ce_role_user` VALUES ('323', '1', '746', '0', '2017-02-28 06:39:44', '2017-02-28 06:39:44');
INSERT INTO `ce_role_user` VALUES ('324', '1', '747', '0', '2017-02-28 06:39:45', '2017-02-28 06:39:45');
INSERT INTO `ce_role_user` VALUES ('325', '1', '750', '0', '2017-02-28 06:39:45', '2017-02-28 06:39:45');
INSERT INTO `ce_role_user` VALUES ('326', '1', '751', '0', '2017-02-28 06:39:45', '2017-02-28 06:39:45');
INSERT INTO `ce_role_user` VALUES ('327', '1', '754', '0', '2017-02-28 06:39:45', '2017-02-28 06:39:45');
INSERT INTO `ce_role_user` VALUES ('328', '1', '755', '0', '2017-02-28 06:39:45', '2017-02-28 06:39:45');
INSERT INTO `ce_role_user` VALUES ('329', '1', '756', '0', '2017-02-28 06:39:45', '2017-02-28 06:39:45');
INSERT INTO `ce_role_user` VALUES ('330', '1', '757', '0', '2017-02-28 06:39:45', '2017-02-28 06:39:45');
INSERT INTO `ce_role_user` VALUES ('331', '1', '758', '0', '2017-02-28 06:39:45', '2017-02-28 06:39:45');
INSERT INTO `ce_role_user` VALUES ('332', '1', '763', '0', '2017-02-28 06:39:45', '2017-02-28 06:39:45');
INSERT INTO `ce_role_user` VALUES ('333', '1', '764', '0', '2017-02-28 06:39:45', '2017-02-28 06:39:45');
INSERT INTO `ce_role_user` VALUES ('334', '1', '767', '0', '2017-02-28 06:39:45', '2017-02-28 06:39:45');
INSERT INTO `ce_role_user` VALUES ('335', '1', '768', '0', '2017-02-28 06:39:45', '2017-02-28 06:39:45');
INSERT INTO `ce_role_user` VALUES ('336', '1', '773', '0', '2017-02-28 06:39:45', '2017-02-28 06:39:45');
INSERT INTO `ce_role_user` VALUES ('337', '1', '774', '0', '2017-02-28 06:39:45', '2017-02-28 06:39:45');
INSERT INTO `ce_role_user` VALUES ('338', '1', '776', '0', '2017-02-28 06:39:46', '2017-02-28 06:39:46');
INSERT INTO `ce_role_user` VALUES ('339', '1', '778', '0', '2017-02-28 06:39:46', '2017-02-28 06:39:46');
INSERT INTO `ce_role_user` VALUES ('340', '1', '780', '0', '2017-02-28 06:39:46', '2017-02-28 06:39:46');
INSERT INTO `ce_role_user` VALUES ('341', '1', '784', '0', '2017-02-28 06:39:46', '2017-02-28 06:39:46');
INSERT INTO `ce_role_user` VALUES ('342', '1', '785', '0', '2017-02-28 06:39:46', '2017-02-28 06:39:46');
INSERT INTO `ce_role_user` VALUES ('343', '1', '786', '0', '2017-02-28 06:39:46', '2017-02-28 06:39:46');
INSERT INTO `ce_role_user` VALUES ('344', '1', '787', '0', '2017-02-28 06:39:46', '2017-02-28 06:39:46');
INSERT INTO `ce_role_user` VALUES ('345', '1', '788', '0', '2017-02-28 06:39:46', '2017-02-28 06:39:46');
INSERT INTO `ce_role_user` VALUES ('346', '1', '791', '0', '2017-02-28 06:39:46', '2017-02-28 06:39:46');
INSERT INTO `ce_role_user` VALUES ('347', '1', '792', '0', '2017-02-28 06:39:46', '2017-02-28 06:39:46');
INSERT INTO `ce_role_user` VALUES ('348', '1', '793', '0', '2017-02-28 06:39:46', '2017-02-28 06:39:46');
INSERT INTO `ce_role_user` VALUES ('349', '1', '794', '0', '2017-02-28 06:39:46', '2017-02-28 06:39:46');
INSERT INTO `ce_role_user` VALUES ('350', '1', '796', '0', '2017-02-28 06:39:46', '2017-02-28 06:39:46');
INSERT INTO `ce_role_user` VALUES ('351', '1', '797', '0', '2017-02-28 06:39:46', '2017-02-28 06:39:46');
INSERT INTO `ce_role_user` VALUES ('352', '1', '798', '0', '2017-02-28 06:39:47', '2017-02-28 06:39:47');
INSERT INTO `ce_role_user` VALUES ('353', '1', '799', '0', '2017-02-28 06:39:47', '2017-02-28 06:39:47');
INSERT INTO `ce_role_user` VALUES ('354', '1', '801', '0', '2017-02-28 06:39:47', '2017-02-28 06:39:47');
INSERT INTO `ce_role_user` VALUES ('355', '1', '802', '0', '2017-02-28 06:39:47', '2017-02-28 06:39:47');
INSERT INTO `ce_role_user` VALUES ('356', '1', '817', '0', '2017-02-28 06:39:47', '2017-02-28 06:39:47');
INSERT INTO `ce_role_user` VALUES ('357', '1', '818', '0', '2017-02-28 06:39:47', '2017-02-28 06:39:47');
INSERT INTO `ce_role_user` VALUES ('358', '1', '821', '0', '2017-02-28 06:39:47', '2017-02-28 06:39:47');
INSERT INTO `ce_role_user` VALUES ('359', '1', '822', '0', '2017-02-28 06:39:47', '2017-02-28 06:39:47');
INSERT INTO `ce_role_user` VALUES ('360', '1', '823', '0', '2017-02-28 06:39:47', '2017-02-28 06:39:47');
INSERT INTO `ce_role_user` VALUES ('361', '1', '75', '0', '2017-02-28 06:39:47', '2017-02-28 06:39:47');
INSERT INTO `ce_role_user` VALUES ('362', '1', '77', '0', '2017-02-28 06:39:47', '2017-02-28 06:39:47');
INSERT INTO `ce_role_user` VALUES ('363', '1', '558', '0', '2017-02-28 06:39:47', '2017-02-28 06:39:47');
INSERT INTO `ce_role_user` VALUES ('364', '1', '477', '0', '2017-02-28 06:39:47', '2017-02-28 06:39:47');
INSERT INTO `ce_role_user` VALUES ('365', '1', '490', '0', '2017-02-28 06:39:47', '2017-02-28 06:39:47');
INSERT INTO `ce_role_user` VALUES ('366', '1', '729', '0', '2017-02-28 06:39:48', '2017-02-28 06:39:48');
INSERT INTO `ce_role_user` VALUES ('367', '1', '1', '0', '2017-02-28 06:39:48', '2017-02-28 06:39:48');
INSERT INTO `ce_role_user` VALUES ('368', '1', '10', '0', '2017-02-28 06:39:48', '2017-02-28 06:39:48');
INSERT INTO `ce_role_user` VALUES ('369', '1', '62', '0', '2017-02-28 06:39:48', '2017-02-28 06:39:48');
INSERT INTO `ce_role_user` VALUES ('370', '1', '824', '0', '2017-02-28 06:39:48', '2017-02-28 06:39:48');
INSERT INTO `ce_role_user` VALUES ('371', '1', '4', '0', '2017-02-28 06:39:48', '2017-02-28 06:39:48');
INSERT INTO `ce_role_user` VALUES ('372', '1', '184', '0', '2017-02-28 06:39:48', '2017-02-28 06:39:48');
INSERT INTO `ce_role_user` VALUES ('373', '1', '538', '0', '2017-02-28 06:39:48', '2017-02-28 06:39:48');
INSERT INTO `ce_role_user` VALUES ('374', '1', '617', '0', '2017-02-28 06:39:48', '2017-02-28 06:39:48');
INSERT INTO `ce_role_user` VALUES ('375', '1', '57', '0', '2017-02-28 06:39:48', '2017-02-28 06:39:48');
INSERT INTO `ce_role_user` VALUES ('376', '1', '646', '0', '2017-02-28 06:39:48', '2017-02-28 06:39:48');
INSERT INTO `ce_role_user` VALUES ('377', '1', '781', '0', '2017-02-28 06:39:48', '2017-02-28 06:39:48');
INSERT INTO `ce_role_user` VALUES ('378', '1', '12', '0', '2017-02-28 06:39:48', '2017-02-28 06:39:48');
INSERT INTO `ce_role_user` VALUES ('379', '1', '90', '0', '2017-02-28 06:39:49', '2017-02-28 06:39:49');
INSERT INTO `ce_role_user` VALUES ('380', '1', '686', '0', '2017-02-28 06:39:49', '2017-02-28 06:39:49');
INSERT INTO `ce_role_user` VALUES ('381', '1', '435', '0', '2017-02-28 06:39:49', '2017-02-28 06:39:49');
INSERT INTO `ce_role_user` VALUES ('382', '1', '589', '0', '2017-02-28 06:39:49', '2017-02-28 06:39:49');
INSERT INTO `ce_role_user` VALUES ('383', '1', '26', '0', '2017-02-28 06:39:49', '2017-02-28 06:39:49');
INSERT INTO `ce_role_user` VALUES ('384', '1', '137', '0', '2017-02-28 06:39:49', '2017-02-28 06:39:49');
INSERT INTO `ce_role_user` VALUES ('385', '1', '138', '0', '2017-02-28 06:39:49', '2017-02-28 06:39:49');
INSERT INTO `ce_role_user` VALUES ('386', '1', '166', '0', '2017-02-28 06:39:49', '2017-02-28 06:39:49');
INSERT INTO `ce_role_user` VALUES ('387', '1', '188', '0', '2017-02-28 06:39:49', '2017-02-28 06:39:49');
INSERT INTO `ce_role_user` VALUES ('388', '1', '331', '0', '2017-02-28 06:39:49', '2017-02-28 06:39:49');
INSERT INTO `ce_role_user` VALUES ('389', '1', '333', '0', '2017-02-28 06:39:49', '2017-02-28 06:39:49');
INSERT INTO `ce_role_user` VALUES ('390', '1', '339', '0', '2017-02-28 06:39:49', '2017-02-28 06:39:49');
INSERT INTO `ce_role_user` VALUES ('391', '1', '341', '0', '2017-02-28 06:39:49', '2017-02-28 06:39:49');
INSERT INTO `ce_role_user` VALUES ('392', '1', '344', '0', '2017-02-28 06:39:49', '2017-02-28 06:39:49');
INSERT INTO `ce_role_user` VALUES ('393', '1', '346', '0', '2017-02-28 06:39:49', '2017-02-28 06:39:49');
INSERT INTO `ce_role_user` VALUES ('394', '1', '428', '0', '2017-02-28 06:39:49', '2017-02-28 06:39:49');
INSERT INTO `ce_role_user` VALUES ('395', '1', '574', '0', '2017-02-28 06:39:49', '2017-02-28 06:39:49');
INSERT INTO `ce_role_user` VALUES ('396', '1', '27', '0', '2017-02-28 06:39:50', '2017-02-28 06:39:50');
INSERT INTO `ce_role_user` VALUES ('397', '1', '192', '0', '2017-02-28 06:39:50', '2017-02-28 06:39:50');
INSERT INTO `ce_role_user` VALUES ('398', '1', '332', '0', '2017-02-28 06:39:50', '2017-02-28 06:39:50');
INSERT INTO `ce_role_user` VALUES ('399', '1', '386', '0', '2017-02-28 06:39:50', '2017-02-28 06:39:50');
INSERT INTO `ce_role_user` VALUES ('400', '1', '387', '0', '2017-02-28 06:39:50', '2017-02-28 06:39:50');
INSERT INTO `ce_role_user` VALUES ('401', '1', '388', '0', '2017-02-28 06:39:50', '2017-02-28 06:39:50');
INSERT INTO `ce_role_user` VALUES ('402', '1', '595', '0', '2017-02-28 06:39:51', '2017-02-28 06:39:51');
INSERT INTO `ce_role_user` VALUES ('403', '1', '627', '0', '2017-02-28 06:39:51', '2017-02-28 06:39:51');
INSERT INTO `ce_role_user` VALUES ('404', '1', '632', '0', '2017-02-28 06:39:51', '2017-02-28 06:39:51');
INSERT INTO `ce_role_user` VALUES ('405', '1', '38', '0', '2017-02-28 06:39:51', '2017-02-28 06:39:51');
INSERT INTO `ce_role_user` VALUES ('406', '1', '123', '0', '2017-02-28 06:39:51', '2017-02-28 06:39:51');
INSERT INTO `ce_role_user` VALUES ('407', '1', '152', '0', '2017-02-28 06:39:51', '2017-02-28 06:39:51');
INSERT INTO `ce_role_user` VALUES ('408', '1', '200', '0', '2017-02-28 06:39:51', '2017-02-28 06:39:51');
INSERT INTO `ce_role_user` VALUES ('409', '1', '287', '0', '2017-02-28 06:39:52', '2017-02-28 06:39:52');
INSERT INTO `ce_role_user` VALUES ('410', '1', '288', '0', '2017-02-28 06:39:52', '2017-02-28 06:39:52');
INSERT INTO `ce_role_user` VALUES ('411', '1', '292', '0', '2017-02-28 06:39:52', '2017-02-28 06:39:52');
INSERT INTO `ce_role_user` VALUES ('412', '1', '295', '0', '2017-02-28 06:39:52', '2017-02-28 06:39:52');
INSERT INTO `ce_role_user` VALUES ('413', '1', '311', '0', '2017-02-28 06:39:52', '2017-02-28 06:39:52');
INSERT INTO `ce_role_user` VALUES ('414', '1', '312', '0', '2017-02-28 06:39:52', '2017-02-28 06:39:52');
INSERT INTO `ce_role_user` VALUES ('415', '1', '363', '0', '2017-02-28 06:39:52', '2017-02-28 06:39:52');
INSERT INTO `ce_role_user` VALUES ('416', '1', '588', '0', '2017-02-28 06:39:52', '2017-02-28 06:39:52');
INSERT INTO `ce_role_user` VALUES ('417', '1', '39', '0', '2017-02-28 06:39:52', '2017-02-28 06:39:52');
INSERT INTO `ce_role_user` VALUES ('418', '1', '40', '0', '2017-02-28 06:39:53', '2017-02-28 06:39:53');
INSERT INTO `ce_role_user` VALUES ('419', '1', '41', '0', '2017-02-28 06:39:53', '2017-02-28 06:39:53');
INSERT INTO `ce_role_user` VALUES ('420', '1', '42', '0', '2017-02-28 06:39:53', '2017-02-28 06:39:53');
INSERT INTO `ce_role_user` VALUES ('421', '1', '43', '0', '2017-02-28 06:39:53', '2017-02-28 06:39:53');
INSERT INTO `ce_role_user` VALUES ('422', '1', '136', '0', '2017-02-28 06:39:53', '2017-02-28 06:39:53');
INSERT INTO `ce_role_user` VALUES ('423', '1', '199', '0', '2017-02-28 06:39:53', '2017-02-28 06:39:53');
INSERT INTO `ce_role_user` VALUES ('424', '1', '299', '0', '2017-02-28 06:39:53', '2017-02-28 06:39:53');
INSERT INTO `ce_role_user` VALUES ('425', '1', '300', '0', '2017-02-28 06:39:53', '2017-02-28 06:39:53');
INSERT INTO `ce_role_user` VALUES ('426', '1', '343', '0', '2017-02-28 06:39:53', '2017-02-28 06:39:53');
INSERT INTO `ce_role_user` VALUES ('427', '1', '440', '0', '2017-02-28 06:39:53', '2017-02-28 06:39:53');
INSERT INTO `ce_role_user` VALUES ('428', '1', '577', '0', '2017-02-28 06:39:53', '2017-02-28 06:39:53');
INSERT INTO `ce_role_user` VALUES ('429', '1', '698', '0', '2017-02-28 06:39:53', '2017-02-28 06:39:53');
INSERT INTO `ce_role_user` VALUES ('430', '1', '134', '0', '2017-02-28 06:39:53', '2017-02-28 06:39:53');
INSERT INTO `ce_role_user` VALUES ('431', '1', '23', '0', '2017-02-28 06:39:53', '2017-02-28 06:39:53');
INSERT INTO `ce_role_user` VALUES ('432', '1', '97', '0', '2017-02-28 06:39:53', '2017-02-28 06:39:53');
INSERT INTO `ce_role_user` VALUES ('433', '1', '143', '0', '2017-02-28 06:39:53', '2017-02-28 06:39:53');
INSERT INTO `ce_role_user` VALUES ('434', '1', '205', '0', '2017-02-28 06:39:54', '2017-02-28 06:39:54');
INSERT INTO `ce_role_user` VALUES ('435', '1', '233', '0', '2017-02-28 06:39:54', '2017-02-28 06:39:54');
INSERT INTO `ce_role_user` VALUES ('436', '1', '283', '0', '2017-02-28 06:39:54', '2017-02-28 06:39:54');
INSERT INTO `ce_role_user` VALUES ('437', '1', '284', '0', '2017-02-28 06:39:54', '2017-02-28 06:39:54');
INSERT INTO `ce_role_user` VALUES ('438', '1', '291', '0', '2017-02-28 06:39:54', '2017-02-28 06:39:54');
INSERT INTO `ce_role_user` VALUES ('439', '1', '434', '0', '2017-02-28 06:39:54', '2017-02-28 06:39:54');
INSERT INTO `ce_role_user` VALUES ('440', '1', '619', '0', '2017-02-28 06:39:54', '2017-02-28 06:39:54');
INSERT INTO `ce_role_user` VALUES ('441', '1', '35', '0', '2017-02-28 06:39:54', '2017-02-28 06:39:54');
INSERT INTO `ce_role_user` VALUES ('442', '1', '36', '0', '2017-02-28 06:39:54', '2017-02-28 06:39:54');
INSERT INTO `ce_role_user` VALUES ('443', '1', '96', '0', '2017-02-28 06:39:54', '2017-02-28 06:39:54');
INSERT INTO `ce_role_user` VALUES ('444', '1', '142', '0', '2017-02-28 06:39:55', '2017-02-28 06:39:55');
INSERT INTO `ce_role_user` VALUES ('445', '1', '151', '0', '2017-02-28 06:39:55', '2017-02-28 06:39:55');
INSERT INTO `ce_role_user` VALUES ('446', '1', '191', '0', '2017-02-28 06:39:55', '2017-02-28 06:39:55');
INSERT INTO `ce_role_user` VALUES ('447', '1', '223', '0', '2017-02-28 06:39:55', '2017-02-28 06:39:55');
INSERT INTO `ce_role_user` VALUES ('448', '1', '602', '0', '2017-02-28 06:39:55', '2017-02-28 06:39:55');
INSERT INTO `ce_role_user` VALUES ('449', '1', '734', '0', '2017-02-28 06:39:55', '2017-02-28 06:39:55');
INSERT INTO `ce_role_user` VALUES ('450', '1', '614', '0', '2017-02-28 06:39:55', '2017-02-28 06:39:55');
INSERT INTO `ce_role_user` VALUES ('451', '1', '21', '0', '2017-02-28 06:39:55', '2017-02-28 06:39:55');
INSERT INTO `ce_role_user` VALUES ('452', '1', '71', '0', '2017-02-28 06:39:55', '2017-02-28 06:39:55');

-- ----------------------------
-- Table structure for ce_user
-- ----------------------------
DROP TABLE IF EXISTS `ce_user`;
CREATE TABLE `ce_user` (
  `ID` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `UserID` bigint(20) DEFAULT NULL,
  `UserName` char(30) NOT NULL,
  `Names` char(20) DEFAULT NULL,
  `PassWord` char(100) NOT NULL,
  `DepartmentID` int(5) DEFAULT '0',
  `companyID` int(5) DEFAULT NULL,
  `IsDelete` int(1) DEFAULT '0',
  `phone` char(12) DEFAULT NULL,
  `moblie` char(12) DEFAULT NULL,
  `DatetimeCreated` datetime DEFAULT NULL,
  `DatetimeUpdated` datetime DEFAULT NULL,
  PRIMARY KEY (`ID`),
  KEY `Index_UserName` (`UserName`,`IsDelete`),
  KEY `Index_Isdele` (`IsDelete`)
) ENGINE=InnoDB AUTO_INCREMENT=35 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ce_user
-- ----------------------------
INSERT INTO `ce_user` VALUES ('1', '1', 'chen', '陈官勇', '202cb962ac59075b964b07152d234b70', '1', '1', '0', '15638202185', '6040992', '2017-03-02 15:08:15', '2017-03-02 15:08:20');
INSERT INTO `ce_user` VALUES ('2', '2', 'guan', '安宁', '1456', '1', '1', '0', '15638202185', '6040888', '2017-03-06 16:33:27', '2017-03-06 16:33:30');
INSERT INTO `ce_user` VALUES ('3', '2', 'guan', '安宁', '1456', '1', '1', '0', '15638202185', '6040888', '2017-03-06 16:33:27', '2017-03-06 16:33:30');
INSERT INTO `ce_user` VALUES ('4', '2', 'guan', '安宁', '1456', '1', '1', '0', '15638202185', '6040888', '2017-03-06 16:33:27', '2017-03-06 16:33:30');
INSERT INTO `ce_user` VALUES ('5', '2', 'guan', '安宁', '1456', '1', '1', '0', '15638202185', '6040888', '2017-03-06 16:33:27', '2017-03-06 16:33:30');
INSERT INTO `ce_user` VALUES ('6', '2', 'guan', '安宁', '1456', '1', '1', '0', '15638202185', '6040888', '2017-03-06 16:33:27', '2017-03-06 16:33:30');
INSERT INTO `ce_user` VALUES ('7', '2', 'guan', '安宁', '1456', '1', '1', '0', '15638202185', '6040888', '2017-03-06 16:33:27', '2017-03-06 16:33:30');
INSERT INTO `ce_user` VALUES ('8', '2', 'guan', '安宁', '1456', '1', '1', '0', '15638202185', '6040888', '2017-03-06 16:33:27', '2017-03-06 16:33:30');
INSERT INTO `ce_user` VALUES ('9', '2', 'guan', '安宁', '1456', '1', '1', '0', '15638202185', '6040888', '2017-03-06 16:33:27', '2017-03-06 16:33:30');
INSERT INTO `ce_user` VALUES ('10', '2', 'guan', '安宁', '1456', '1', '1', '0', '15638202185', '6040888', '2017-03-06 16:33:27', '2017-03-06 16:33:30');
INSERT INTO `ce_user` VALUES ('11', '2', 'guan', '安宁', '1456', '1', '1', '0', '15638202185', '6040888', '2017-03-06 16:33:27', '2017-03-06 16:33:30');
INSERT INTO `ce_user` VALUES ('12', '2', 'guan', '安宁', '1456', '1', '1', '0', '15638202185', '6040888', '2017-03-06 16:33:27', '2017-03-06 16:33:30');
INSERT INTO `ce_user` VALUES ('13', '2', 'guan', '安宁', '1456', '1', '1', '0', '15638202185', '6040888', '2017-03-06 16:33:27', '2017-03-06 16:33:30');
INSERT INTO `ce_user` VALUES ('14', '2', 'guan', '安宁', '1456', '1', '1', '0', '15638202185', '6040888', '2017-03-06 16:33:27', '2017-03-06 16:33:30');
INSERT INTO `ce_user` VALUES ('15', '2', 'guan', '安宁', '1456', '1', '1', '0', '15638202185', '6040888', '2017-03-06 16:33:27', '2017-03-06 16:33:30');
INSERT INTO `ce_user` VALUES ('16', '2', 'guan', '安宁', '1456', '1', '1', '0', '15638202185', '6040888', '2017-03-06 16:33:27', '2017-03-06 16:33:30');
INSERT INTO `ce_user` VALUES ('17', '2', 'guan', '安宁', '1456', '1', '1', '0', '15638202185', '6040888', '2017-03-06 16:33:27', '2017-03-06 16:33:30');
INSERT INTO `ce_user` VALUES ('18', '2', 'guan', '安宁', '1456', '1', '1', '0', '15638202185', '6040888', '2017-03-06 16:33:27', '2017-03-06 16:33:30');
INSERT INTO `ce_user` VALUES ('19', '2', 'guan', '安宁', '1456', '1', '1', '0', '15638202185', '6040888', '2017-03-06 16:33:27', '2017-03-06 16:33:30');
INSERT INTO `ce_user` VALUES ('20', '2', 'guan', '安宁', '1456', '1', '1', '0', '15638202185', '6040888', '2017-03-06 16:33:27', '2017-03-06 16:33:30');
INSERT INTO `ce_user` VALUES ('21', '2', 'guan', '安宁', '1456', '1', '1', '0', '15638202185', '6040888', '2017-03-06 16:33:27', '2017-03-06 16:33:30');
INSERT INTO `ce_user` VALUES ('22', '2', 'guan', '安宁', '1456', '1', '1', '0', '15638202185', '6040888', '2017-03-06 16:33:27', '2017-03-06 16:33:30');
INSERT INTO `ce_user` VALUES ('23', '2', 'guan', '安宁', '1456', '1', '1', '0', '15638202185', '6040888', '2017-03-06 16:33:27', '2017-03-06 16:33:30');
INSERT INTO `ce_user` VALUES ('24', '2', 'guan', '安宁', '1456', '1', '1', '0', '15638202185', '6040888', '2017-03-06 16:33:27', '2017-03-06 16:33:30');
INSERT INTO `ce_user` VALUES ('25', '2', 'guan', '安宁', '1456', '1', '1', '0', '15638202185', '6040888', '2017-03-06 16:33:27', '2017-03-06 16:33:30');
INSERT INTO `ce_user` VALUES ('26', '2', 'guan', '安宁', '1456', '1', '1', '0', '15638202185', '6040888', '2017-03-06 16:33:27', '2017-03-06 16:33:30');
INSERT INTO `ce_user` VALUES ('27', '2', 'guan', '安宁', '1456', '1', '1', '0', '15638202185', '6040888', '2017-03-06 16:33:27', '2017-03-06 16:33:30');
INSERT INTO `ce_user` VALUES ('28', '2', 'guan', '安宁', '1456', '1', '1', '0', '15638202185', '6040888', '2017-03-06 16:33:27', '2017-03-06 16:33:30');
INSERT INTO `ce_user` VALUES ('29', '2', 'guan', '安宁', '1456', '1', '1', '0', '15638202185', '6040888', '2017-03-06 16:33:27', '2017-03-06 16:33:30');
INSERT INTO `ce_user` VALUES ('30', '2', 'guan', '安宁', '1456', '1', '1', '0', '15638202185', '6040888', '2017-03-06 16:33:27', '2017-03-06 16:33:30');
INSERT INTO `ce_user` VALUES ('31', '2', 'guan', '安宁', '1456', '1', '1', '0', '15638202185', '6040888', '2017-03-06 16:33:27', '2017-03-06 16:33:30');
INSERT INTO `ce_user` VALUES ('32', '2', 'guan', '安宁', '1456', '1', '1', '0', '15638202185', '6040888', '2017-03-06 16:33:27', '2017-03-06 16:33:30');
INSERT INTO `ce_user` VALUES ('33', '2', 'guan', '安宁', '1456', '1', '1', '0', '15638202185', '6040888', '2017-03-06 16:33:27', '2017-03-06 16:33:30');
INSERT INTO `ce_user` VALUES ('34', '2', 'guan', '安宁', '1456', '1', '1', '0', '15638202185', '6040888', '2017-03-06 16:33:27', '2017-03-06 16:33:30');
