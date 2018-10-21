/*
 Navicat Premium Data Transfer

 Source Server         : Root (MySQL)
 Source Server Type    : MySQL
 Source Server Version : 50723
 Source Host           : localhost:3306
 Source Schema         : freelancerhub

 Target Server Type    : MySQL
 Target Server Version : 50723
 File Encoding         : 65001

 Date: 18/10/2018 18:31:28
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for sessions
-- ----------------------------
DROP TABLE IF EXISTS `sessions`;
CREATE TABLE `sessions` (
  `sess_id` varbinary(128) NOT NULL,
  `sess_data` blob NOT NULL,
  `sess_lifetime` mediumint(9) NOT NULL,
  `sess_time` int(10) unsigned NOT NULL,
  PRIMARY KEY (`sess_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- ----------------------------
-- Table structure for users
-- ----------------------------
DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `user_id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(70) NOT NULL DEFAULT '',
  `password` char(60) DEFAULT NULL,
  `roles` text,
  `is_activated` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `is_locked` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `locked_on` int(11) unsigned NOT NULL DEFAULT '0',
  `credentials_last_updated` int(11) unsigned NOT NULL DEFAULT '0',
  `login_attempts` int(3) unsigned NOT NULL DEFAULT '0',
  `last_attempt_time` int(11) unsigned NOT NULL DEFAULT '0',
  `last_attempt_ip` varchar(30) DEFAULT NULL,
  `last_attempt_useragent` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of users
-- ----------------------------
BEGIN;
INSERT INTO `users` VALUES (1, 'moharram82@hotmail.com', '$2y$10$Jjfsedb5gpJVXxw8Sck.0eLMlO.hX5nJhPuO9KuRSA4VlPVacEHdm', 'ROLE_ADMIN,ROLE_ROOT,ROLE_MODERATOR,ROLE_SUPERVISOR', 1, 0, 0, 1535752800, 0, 0, NULL, NULL, '2018-10-10 10:13:03', '2018-10-16 19:27:28');
INSERT INTO `users` VALUES (2, 'ali@yahoo.com', '$2y$10$JtFeD6WGpWf7hUqxl.FvNO4xJJFGpOvLx1XkvZR1PZ69Amh17iWtO', 'ROLE_MODERATOR', 0, 0, 0, 0, 0, 0, NULL, NULL, '2018-10-13 19:12:05', '2018-10-13 19:12:05');
COMMIT;

SET FOREIGN_KEY_CHECKS = 1;
