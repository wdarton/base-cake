/*
 Navicat MySQL Data Transfer

 Target Server Type    : MySQL
 Target Server Version : 50723
 File Encoding         : 65001

 Date: 02/10/2018 09:22:13
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for user_roles
-- ----------------------------
DROP TABLE IF EXISTS `user_roles`;
CREATE TABLE `user_roles`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_group_id` int(11) NULL DEFAULT NULL,
  `name` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `created` datetime(0) NULL DEFAULT NULL,
  `modified` datetime(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 4 CHARACTER SET = utf8 COLLATE = utf8_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of user_roles
-- ----------------------------
INSERT INTO `user_roles` VALUES (1, 1, 'IT', '2018-01-23 20:51:21', '2018-01-23 20:51:21');
INSERT INTO `user_roles` VALUES (2, 2, 'User', '2018-01-23 21:12:29', '2018-01-23 21:12:29');
INSERT INTO `user_roles` VALUES (3, 1, 'Admin', '2018-07-10 15:11:35', '2018-07-10 15:11:35');

SET FOREIGN_KEY_CHECKS = 1;
