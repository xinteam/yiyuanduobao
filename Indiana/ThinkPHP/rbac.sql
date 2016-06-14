/*
Navicat MySQL Data Transfer

Source Server         : 127.0.0.1
Source Server Version : 50018
Source Host           : localhost:3306
Source Database       : rbac

Target Server Type    : MYSQL
Target Server Version : 50018
File Encoding         : 65001

Date: 2015-10-28 14:47:04
*/

SET FOREIGN_KEY_CHECKS=0;
-- ----------------------------
-- Table structure for `role`
-- ----------------------------
DROP TABLE IF EXISTS `role`;
CREATE TABLE `role` (
  `r_id` int(11) NOT NULL auto_increment,
  `r_name` varchar(255) default NULL,
  PRIMARY KEY  (`r_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of role
-- ----------------------------
INSERT INTO role VALUES ('1', '假条');
INSERT INTO role VALUES ('2', '点名');
INSERT INTO role VALUES ('3', '班级');
INSERT INTO role VALUES ('4', '综合积分');
INSERT INTO role VALUES ('5', '开除');
INSERT INTO role VALUES ('6', '叫家长');

-- ----------------------------
-- Table structure for `user`
-- ----------------------------
DROP TABLE IF EXISTS `user`;
CREATE TABLE `user` (
  `u_id` int(11) NOT NULL auto_increment,
  `u_name` varchar(30) default NULL,
  PRIMARY KEY  (`u_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of user
-- ----------------------------
INSERT INTO user VALUES ('1', '尤总');
INSERT INTO user VALUES ('2', '院长');
INSERT INTO user VALUES ('3', '孙总');
INSERT INTO user VALUES ('4', '主任');
INSERT INTO user VALUES ('5', '讲师');

-- ----------------------------
-- Table structure for `u_r`
-- ----------------------------
DROP TABLE IF EXISTS `u_r`;
CREATE TABLE `u_r` (
  `id` int(11) NOT NULL auto_increment,
  `u_id` int(11) default NULL,
  `r_id` int(11) default NULL,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of u_r
-- ----------------------------
INSERT INTO u_r VALUES ('1', '1', '1');
INSERT INTO u_r VALUES ('2', '1', '2');
INSERT INTO u_r VALUES ('3', '1', '3');
INSERT INTO u_r VALUES ('4', '1', '4');
INSERT INTO u_r VALUES ('5', '1', '5');
INSERT INTO u_r VALUES ('6', '2', '1');
INSERT INTO u_r VALUES ('7', '2', '2');
INSERT INTO u_r VALUES ('8', '2', '3');
INSERT INTO u_r VALUES ('9', '3', '6');
INSERT INTO u_r VALUES ('10', '4', '1');
INSERT INTO u_r VALUES ('11', '4', '2');
INSERT INTO u_r VALUES ('12', '4', '3');
INSERT INTO u_r VALUES ('13', '4', '4');
INSERT INTO u_r VALUES ('14', '4', '5');
INSERT INTO u_r VALUES ('15', '4', '6');
INSERT INTO u_r VALUES ('16', '5', '1');
INSERT INTO u_r VALUES ('17', '5', '2');
INSERT INTO u_r VALUES ('18', '5', '3');
