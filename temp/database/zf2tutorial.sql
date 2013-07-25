/*
Navicat MySQL Data Transfer

Source Server         : localhost
Source Server Version : 50527
Source Host           : localhost:3306
Source Database       : zf2tutorial

Target Server Type    : MYSQL
Target Server Version : 50527
File Encoding         : 65001

Date: 2013-07-25 15:04:03
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for `album`
-- ----------------------------
DROP TABLE IF EXISTS `album`;
CREATE TABLE `album` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `artist` varchar(100) NOT NULL,
  `title` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of album
-- ----------------------------
INSERT INTO `album` VALUES ('1', 'The  Military  Wives', 'In  My  Dreams');
INSERT INTO `album` VALUES ('2', 'Adele', '21');
INSERT INTO `album` VALUES ('3', 'Bruce  Springsteen', 'Wrecking Ball (Deluxe)');
INSERT INTO `album` VALUES ('4', 'Lana  Del  Rey', 'Born  To  Die');
INSERT INTO `album` VALUES ('5', 'Gotye', 'Making  Mirrors');
INSERT INTO `album` VALUES ('6', 'Deep Purple', 'Perfect Strangers');
INSERT INTO `album` VALUES ('7', 'Deep Purple', 'The House of Blue Light');
INSERT INTO `album` VALUES ('8', 'Whitesnake', 'Saints & Sinners');
INSERT INTO `album` VALUES ('9', 'Whitesnake', 'Slip of the Tongue');

-- ----------------------------
-- Table structure for `user`
-- ----------------------------
DROP TABLE IF EXISTS `user`;
CREATE TABLE `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `date` datetime DEFAULT NULL,
  `status` smallint(6) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=53 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of user
-- ----------------------------
INSERT INTO `user` VALUES ('1', 'john', 'john@gmail.com', '2013-01-01 10:41:16', '1');
INSERT INTO `user` VALUES ('2', 'abbie', 'abbie@gmail.com', '2013-01-02 14:56:23', '1');
INSERT INTO `user` VALUES ('3', 'abigail', 'abigail@yahoo.com', '2013-01-03 09:22:32', '1');
INSERT INTO `user` VALUES ('4', 'adriana', 'adriana@dmx.de', '2013-01-04 11:32:18', '1');
INSERT INTO `user` VALUES ('5', 'johnatan', 'johnatan@acme.com', '2013-01-05 18:22:25', '1');
INSERT INTO `user` VALUES ('6', 'joseph', 'joseph@google.com', '2013-01-06 14:12:56', '1');
INSERT INTO `user` VALUES ('7', 'david', 'david@gmail.co.uk', '2013-01-07 17:12:45', '1');
INSERT INTO `user` VALUES ('8', 'justin', 'justin@acme.fr', '2013-01-08 10:52:15', '1');
INSERT INTO `user` VALUES ('9', 'darrell', 'darrell@company.co.uk', '2013-01-09 13:42:33', '1');
INSERT INTO `user` VALUES ('10', 'derek', 'derek@email.co.uk', '2013-01-10 19:12:23', '1');
INSERT INTO `user` VALUES ('11', 'donald', 'donald@yahoo.com', '2013-01-11 20:32:47', '1');
INSERT INTO `user` VALUES ('12', 'benny', 'benny@abv.bg', '2013-01-12 15:12:24', '1');
INSERT INTO `user` VALUES ('13', 'billie', 'billie@example.com', '2013-01-13 16:22:45', '1');
INSERT INTO `user` VALUES ('14', 'brannon', 'brannon@exe.co.uk', '2013-01-14 12:12:56', '1');
INSERT INTO `user` VALUES ('15', 'callahan', null, null, null);
INSERT INTO `user` VALUES ('16', 'calvin', null, null, null);
INSERT INTO `user` VALUES ('17', 'cameron', null, null, null);
INSERT INTO `user` VALUES ('18', 'camille', null, null, null);
INSERT INTO `user` VALUES ('19', 'carl', null, null, null);
INSERT INTO `user` VALUES ('20', 'charles', null, null, null);
INSERT INTO `user` VALUES ('21', 'charlton', null, null, null);
INSERT INTO `user` VALUES ('22', 'chester', null, null, null);
INSERT INTO `user` VALUES ('23', 'christian', null, null, null);
INSERT INTO `user` VALUES ('24', 'christopher', null, null, null);
INSERT INTO `user` VALUES ('25', 'edison', null, null, null);
INSERT INTO `user` VALUES ('26', 'edmund', null, null, null);
INSERT INTO `user` VALUES ('27', 'edwin', null, null, null);
INSERT INTO `user` VALUES ('28', 'elliott', null, null, null);
INSERT INTO `user` VALUES ('29', 'emmanuel', null, null, null);
INSERT INTO `user` VALUES ('30', 'erik', null, null, null);
INSERT INTO `user` VALUES ('31', 'everhard', null, null, null);
INSERT INTO `user` VALUES ('32', 'farrel', null, null, null);
INSERT INTO `user` VALUES ('33', 'felix', null, null, null);
INSERT INTO `user` VALUES ('34', 'flanagan', null, null, null);
INSERT INTO `user` VALUES ('35', 'floyd', null, null, null);
INSERT INTO `user` VALUES ('36', 'fletcher', null, null, null);
INSERT INTO `user` VALUES ('37', 'francis', null, null, null);
INSERT INTO `user` VALUES ('38', 'frederic', null, null, null);
INSERT INTO `user` VALUES ('39', 'freeman', null, null, null);
INSERT INTO `user` VALUES ('40', 'fulton', null, null, null);
INSERT INTO `user` VALUES ('41', 'aaron', null, null, null);
INSERT INTO `user` VALUES ('42', 'abraham', null, null, null);
INSERT INTO `user` VALUES ('43', 'abel', null, null, null);
INSERT INTO `user` VALUES ('44', 'aiden', null, null, null);
INSERT INTO `user` VALUES ('45', 'alexander', null, null, null);
INSERT INTO `user` VALUES ('46', 'alfred', null, null, null);
INSERT INTO `user` VALUES ('47', 'alger', null, null, null);
INSERT INTO `user` VALUES ('48', 'allan', null, null, null);
INSERT INTO `user` VALUES ('49', 'alvin', null, null, null);
INSERT INTO `user` VALUES ('50', 'arthur', null, null, null);
INSERT INTO `user` VALUES ('51', 'ashton', null, null, null);
INSERT INTO `user` VALUES ('52', 'austin', null, null, null);
