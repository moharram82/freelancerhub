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

 Date: 22/10/2018 21:03:52
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for categories
-- ----------------------------
DROP TABLE IF EXISTS `categories`;
CREATE TABLE `categories` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `category` varchar(50) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of categories
-- ----------------------------
BEGIN;
INSERT INTO `categories` VALUES (1, 'Design', NULL, NULL);
INSERT INTO `categories` VALUES (2, 'Development', NULL, NULL);
COMMIT;

-- ----------------------------
-- Table structure for customers
-- ----------------------------
DROP TABLE IF EXISTS `customers`;
CREATE TABLE `customers` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(80) DEFAULT NULL,
  `location` varchar(30) DEFAULT NULL,
  `user_id` int(11) unsigned DEFAULT NULL,
  `description` text,
  `mobile` varchar(40) DEFAULT NULL,
  `type` enum('individual','company') DEFAULT 'individual',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for experiences
-- ----------------------------
DROP TABLE IF EXISTS `experiences`;
CREATE TABLE `experiences` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `freelancer_id` int(11) unsigned DEFAULT NULL,
  `title` varchar(255) DEFAULT NULL,
  `date` date DEFAULT NULL,
  `benefitiary` varchar(80) DEFAULT NULL,
  `details` text,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for freelancers
-- ----------------------------
DROP TABLE IF EXISTS `freelancers`;
CREATE TABLE `freelancers` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(80) DEFAULT NULL,
  `birthdate` date DEFAULT NULL,
  `location` varchar(30) DEFAULT NULL,
  `languages` varchar(255) DEFAULT NULL,
  `mobile` varchar(40) DEFAULT NULL,
  `facebook` varchar(80) DEFAULT NULL,
  `twitter` varchar(80) DEFAULT NULL,
  `github` varchar(80) DEFAULT NULL,
  `dribbble` varchar(80) DEFAULT NULL,
  `linkedin` varchar(80) DEFAULT NULL,
  `category_id` int(11) unsigned DEFAULT NULL,
  `hourly_rate` decimal(15,2) unsigned DEFAULT NULL,
  `user_id` int(11) unsigned DEFAULT NULL,
  `description` text,
  `response_time` varchar(20) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for messages
-- ----------------------------
DROP TABLE IF EXISTS `messages`;
CREATE TABLE `messages` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `subject` varchar(255) DEFAULT NULL,
  `from` int(11) unsigned DEFAULT NULL COMMENT 'user_id',
  `to` int(11) unsigned DEFAULT NULL COMMENT 'user_id',
  `body` text,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for offers
-- ----------------------------
DROP TABLE IF EXISTS `offers`;
CREATE TABLE `offers` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `freelancer_id` int(11) unsigned DEFAULT NULL,
  `customer_id` int(11) unsigned DEFAULT NULL,
  `title` varchar(255) DEFAULT NULL,
  `price` decimal(15,2) DEFAULT NULL,
  `delivery` int(1) unsigned DEFAULT NULL,
  `details` text,
  `validity` int(1) unsigned DEFAULT NULL COMMENT 'in days',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for packages
-- ----------------------------
DROP TABLE IF EXISTS `packages`;
CREATE TABLE `packages` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `freelancer_id` int(11) unsigned DEFAULT NULL,
  `title` varchar(255) DEFAULT NULL,
  `details` text,
  `price` decimal(15,2) unsigned DEFAULT NULL,
  `delivery` int(1) unsigned DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for projects
-- ----------------------------
DROP TABLE IF EXISTS `projects`;
CREATE TABLE `projects` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `freelancer_id` int(11) unsigned DEFAULT NULL,
  `customer_id` int(11) unsigned DEFAULT NULL,
  `title` varchar(255) DEFAULT NULL,
  `start_date` date DEFAULT NULL,
  `end_date` date DEFAULT NULL,
  `price` decimal(15,2) DEFAULT NULL,
  `details` text,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for requests
-- ----------------------------
DROP TABLE IF EXISTS `requests`;
CREATE TABLE `requests` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) DEFAULT NULL,
  `details` text,
  `budget` decimal(15,2) DEFAULT NULL,
  `category_id` int(11) unsigned DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for reviews
-- ----------------------------
DROP TABLE IF EXISTS `reviews`;
CREATE TABLE `reviews` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `customer_id` int(11) unsigned DEFAULT NULL,
  `freelancer_id` int(11) unsigned DEFAULT NULL,
  `body` text,
  `price_rating` int(1) unsigned DEFAULT '0',
  `quality_rating` int(1) unsigned DEFAULT '0',
  `timing_rating` int(1) unsigned DEFAULT '0',
  `communication_rating` int(1) unsigned DEFAULT '0',
  `commitement_rating` int(1) unsigned DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of reviews
-- ----------------------------
BEGIN;
INSERT INTO `reviews` VALUES (1, 1, 1, NULL, 100, 0, 0, 0, 0, NULL, NULL);
COMMIT;

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
-- Table structure for skills
-- ----------------------------
DROP TABLE IF EXISTS `skills`;
CREATE TABLE `skills` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `skill_name` varchar(50) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE KEY `skill_name` (`skill_name`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for stages
-- ----------------------------
DROP TABLE IF EXISTS `stages`;
CREATE TABLE `stages` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `project_id` int(11) unsigned DEFAULT NULL,
  `title` varchar(255) DEFAULT NULL,
  `start_date` date DEFAULT NULL,
  `end_date` date DEFAULT NULL,
  `details` text,
  `status_id` int(11) unsigned DEFAULT NULL,
  `customer_approval` tinyint(1) unsigned DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for stages_statuses
-- ----------------------------
DROP TABLE IF EXISTS `stages_statuses`;
CREATE TABLE `stages_statuses` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `status_name` varchar(50) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of stages_statuses
-- ----------------------------
BEGIN;
INSERT INTO `stages_statuses` VALUES (1, 'active', NULL, NULL);
INSERT INTO `stages_statuses` VALUES (2, 'pending', NULL, NULL);
INSERT INTO `stages_statuses` VALUES (3, 'delayed', NULL, NULL);
INSERT INTO `stages_statuses` VALUES (4, 'completed', NULL, NULL);
COMMIT;

-- ----------------------------
-- Table structure for sub_categories
-- ----------------------------
DROP TABLE IF EXISTS `sub_categories`;
CREATE TABLE `sub_categories` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `sub_category` varchar(50) DEFAULT NULL,
  `category_id` int(11) unsigned DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of users
-- ----------------------------
BEGIN;
INSERT INTO `users` VALUES (1, 'moharram82@hotmail.com', '$2y$10$Jjfsedb5gpJVXxw8Sck.0eLMlO.hX5nJhPuO9KuRSA4VlPVacEHdm', 'ROLE_ADMIN', 1, 0, 0, 1535752800, 0, 0, NULL, NULL, '2018-10-10 10:13:03', '2018-10-22 19:21:22');
INSERT INTO `users` VALUES (2, 'ali@yahoo.com', '$2y$10$JtFeD6WGpWf7hUqxl.FvNO4xJJFGpOvLx1XkvZR1PZ69Amh17iWtO', 'ROLE_FREELANCER', 1, 0, 0, 0, 0, 0, NULL, NULL, '2018-10-13 19:12:05', '2018-10-22 19:47:53');
INSERT INTO `users` VALUES (3, 'omer@gmail.com', '$2y$10$JtFeD6WGpWf7hUqxl.FvNO4xJJFGpOvLx1XkvZR1PZ69Amh17iWtO', 'ROLE_CUSTOMER', 1, 0, 0, 0, 0, 0, NULL, NULL, '2018-10-13 19:13:30', '2018-10-13 19:13:30');
COMMIT;

SET FOREIGN_KEY_CHECKS = 1;
