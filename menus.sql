/*
 Navicat MySQL Data Transfer

 Target Server Type    : MySQL
 Target Server Version : 50723
 File Encoding         : 65001

 Date: 02/10/2018 09:21:43
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for menus
-- ----------------------------
DROP TABLE IF EXISTS `menus`;
CREATE TABLE `menus`  (
  `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `label` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `_plugin` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `prefix` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `controller` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `controller_action` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `sort_order` int(5) NOT NULL,
  `active` tinyint(1) UNSIGNED NOT NULL DEFAULT 1,
  `literal` tinyint(1) UNSIGNED NOT NULL DEFAULT 0,
  `visible` tinyint(1) UNSIGNED NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 15 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of menus
-- ----------------------------
INSERT INTO `menus` VALUES (1, 'Dashboard', '', '', 'pages', 'dashboard', 1, 1, 0, 1);
INSERT INTO `menus` VALUES (2, 'Users', '', '', 'users', 'index', 101, 1, 0, 1);
INSERT INTO `menus` VALUES (3, 'People', '', 'people', 'people', 'index', 102, 1, 0, 1);
INSERT INTO `menus` VALUES (4, 'Menus', '', 'admin', 'menus', 'index', 62, 1, 0, 0);
INSERT INTO `menus` VALUES (5, 'Pages', '', 'admin', 'pages', 'index', 63, 1, 0, 0);
INSERT INTO `menus` VALUES (6, 'User Groups', '', 'admin', 'UserGroups', 'index', 64, 1, 0, 0);
INSERT INTO `menus` VALUES (7, 'User Roles', '', 'admin', 'UserRoles', 'index', 65, 1, 0, 0);
INSERT INTO `menus` VALUES (8, 'AclManager', '', 'admin', 'AclManager', 'permissions', 66, 1, 1, 0);
INSERT INTO `menus` VALUES (10, 'Admin Dashboard', '', 'admin', 'admin', 'index', 61, 1, 0, 1);
INSERT INTO `menus` VALUES (11, 'System Config', '', 'config', 'DataManagement', 'index', 51, 1, 0, 1);

SET FOREIGN_KEY_CHECKS = 1;
