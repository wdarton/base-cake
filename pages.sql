/*
 Navicat MySQL Data Transfer

 Target Server Type    : MySQL
 Target Server Version : 50723
 File Encoding         : 65001

 Date: 02/10/2018 09:21:50
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for pages
-- ----------------------------
DROP TABLE IF EXISTS `pages`;
CREATE TABLE `pages`  (
  `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `menu_id` int(11) NOT NULL,
  `label` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `icon` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `_plugin` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `prefix` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `controller` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `controller_action` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `sort_order` int(5) UNSIGNED NOT NULL,
  `active` tinyint(1) UNSIGNED NOT NULL DEFAULT 1,
  `literal` tinyint(1) UNSIGNED NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 22 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of pages
-- ----------------------------
INSERT INTO `pages` VALUES (1, 3, 'View All', 'fas fa-eye', '', 'people', 'people', 'index', 1, 1, 0);
INSERT INTO `pages` VALUES (2, 3, 'Add Person', 'fas fa-plus', '', 'people', 'people', 'add', 2, 1, 0);
INSERT INTO `pages` VALUES (3, 5, 'Add Page', 'fas fa-plus', NULL, 'admin', 'pages', 'add', 2, 1, 0);
INSERT INTO `pages` VALUES (4, 5, 'View All', 'fas fa-eye', NULL, 'admin', 'pages', 'index', 1, 1, 0);
INSERT INTO `pages` VALUES (5, 4, 'View All', 'fas fa-eye', NULL, 'admin', 'menus', 'index', 1, 1, 0);
INSERT INTO `pages` VALUES (6, 4, 'Add Menu', 'fas fa-plus', NULL, 'admin', 'menus', 'add', 2, 1, 0);
INSERT INTO `pages` VALUES (7, 2, 'View All', 'fas fa-eye', NULL, '', 'users', 'index', 1, 1, 0);
INSERT INTO `pages` VALUES (8, 2, 'Add User', 'fas fa-plus', NULL, '', 'users', 'add', 2, 1, 0);
INSERT INTO `pages` VALUES (9, 6, 'View All', 'fas fa-eye', NULL, 'admin', 'UserGroups', 'index', 1, 1, 0);
INSERT INTO `pages` VALUES (10, 6, 'Add Group', 'fas fa-plus', NULL, 'admin', 'UserGroups', 'add', 2, 1, 0);
INSERT INTO `pages` VALUES (11, 7, 'View All', 'fas fa-eye', NULL, 'admin', 'UserRoles', 'index', 1, 1, 0);
INSERT INTO `pages` VALUES (12, 7, 'Add Role', 'fas fa-plus', NULL, 'admin', 'UserRoles', 'add', 2, 1, 0);
INSERT INTO `pages` VALUES (13, 10, 'Menus', 'fas fa-bars', '', 'admin', 'menus', 'index', 1, 1, 0);
INSERT INTO `pages` VALUES (14, 10, 'Pages', 'fas fa-file-alt', '', 'admin', 'pages', 'index', 2, 1, 0);
INSERT INTO `pages` VALUES (15, 10, 'User Groups', 'fas fa-users', '', 'admin', 'UserGroups', 'index', 3, 1, 0);
INSERT INTO `pages` VALUES (16, 10, 'User Roles', 'fas fa-id-badge', '', 'admin', 'UserRoles', 'index', 4, 1, 0);
INSERT INTO `pages` VALUES (17, 10, 'ACL Management', 'fas fa-cogs', '', 'admin', 'AclManager', 'permissions', 5, 1, 1);
INSERT INTO `pages` VALUES (18, 11, 'Types and Categories', 'fas fa-list', '', 'config', 'DataManagement', 'typesCategories', 1, 1, 0);

SET FOREIGN_KEY_CHECKS = 1;
