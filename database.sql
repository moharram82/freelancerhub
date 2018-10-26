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

 Date: 26/10/2018 19:35:51
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
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE KEY `user_id` (`user_id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=59 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of customers
-- ----------------------------
BEGIN;
INSERT INTO `customers` VALUES (1, 'Omer Moharram', 'Khartoum', 3, 'Temporibus ducimus repellendus rem voluptatem. Suscipit sit placeat aut praesentium natus. Neque quae voluptatem deleniti asperiores odio quia dicta.', '912290929', 'individual', '2018-10-22 20:41:02', '2018-10-22 20:41:02');
INSERT INTO `customers` VALUES (2, 'Balla Sami Bilal Samir', 'Ubayed', 5, 'Ad dignissimos dolorem in fugit minima sequi soluta. Autem quaerat est rem. Quae omnis tempora dolor officia.', '922895756', 'individual', '2018-10-24 18:26:12', '2018-10-24 18:26:12');
INSERT INTO `customers` VALUES (3, 'Buthainah Hassan Dawood Essa', 'Port-Sudan', 7, 'Voluptas voluptatem amet voluptatem ad perferendis minus. Libero deleniti recusandae laboriosam iste. Est delectus aliquid placeat corrupti nostrum ipsum nobis. Itaque labore dicta doloribus.', '922735385', 'individual', '2018-10-24 18:26:12', '2018-10-24 18:26:12');
INSERT INTO `customers` VALUES (4, 'Kareem Ltd', 'Khartoum', 8, 'Accusantium et est corporis suscipit ut beatae. Temporibus eius quam corrupti distinctio provident optio asperiores non. Ut iure sunt enim accusantium. Autem officiis necessitatibus nostrum.', '124993693', 'company', '2018-10-24 18:26:12', '2018-10-24 18:26:12');
INSERT INTO `customers` VALUES (5, 'Abdulaziz Hilal Osman Balla', 'Kusti', 9, 'Quisquam cumque sunt illum ratione aut possimus omnis quia. Eum aut ex tempore iste eum qui. Quia temporibus dolorem quam repudiandae adipisci.', '125199757', 'individual', '2018-10-24 18:26:12', '2018-10-24 18:26:12');
INSERT INTO `customers` VALUES (6, 'Fareed Ltd', 'Kusti', 10, 'Ipsa dicta in quidem quasi. Velit vel harum vel magni. Cupiditate alias velit harum voluptas asperiores quibusdam deserunt. Molestiae sequi aut illum ut sit. Accusamus rerum voluptas tempore.', '912225109', 'company', '2018-10-24 18:26:12', '2018-10-24 18:26:12');
INSERT INTO `customers` VALUES (7, 'Osman and Musa PLC', 'Kassala', 14, 'Ut debitis voluptatibus voluptatem ex. Culpa atque unde libero. Aut et sit beatae voluptatibus.', '922980904', 'company', '2018-10-24 18:26:13', '2018-10-24 18:26:13');
INSERT INTO `customers` VALUES (8, 'Raheem Gasem Yousef Salama', 'Darfur', 15, 'Ut nobis maxime dolores amet aut et. Ex quis eaque atque soluta eum. Dolor aspernatur modi occaecati a. Facere et dolorum atque sit recusandae alias.', '129980081', 'individual', '2018-10-24 18:26:13', '2018-10-24 18:26:13');
INSERT INTO `customers` VALUES (9, 'Ebtehal Bakri Abdulmajeed Ali', 'Darfur', 16, 'Ut porro iste consequatur error quasi voluptatem veritatis. Repellendus maiores quae explicabo libero quaerat saepe. Suscipit sapiente molestiae ipsum doloremque et explicabo autem.', '123368441', 'individual', '2018-10-24 18:26:13', '2018-10-24 18:26:13');
INSERT INTO `customers` VALUES (10, 'Nasir and Abdullah and Sons', 'Kusti', 20, 'Temporibus ducimus repellendus rem voluptatem. Suscipit sit placeat aut praesentium natus. Neque quae voluptatem deleniti asperiores odio quia dicta.', '912734642', 'company', '2018-10-24 18:26:13', '2018-10-24 18:26:13');
INSERT INTO `customers` VALUES (11, 'Jalal Ltd', 'Ubayed', 21, 'Labore ex eos ducimus optio placeat assumenda aut commodi. Vel nam aut velit et voluptatem. Dolorum rem et ut veniam neque sunt eaque nemo. Accusamus libero incidunt doloribus quia nam voluptatem et.', '123964296', 'company', '2018-10-24 18:26:13', '2018-10-24 18:26:13');
INSERT INTO `customers` VALUES (12, 'Nabeel and Sons', 'Darfur', 24, 'Molestiae praesentium ullam possimus consequuntur et. Rerum ut fugiat ut quas soluta vel. Nemo nam voluptatibus veritatis nam. Dolorem qui eos voluptas et quidem ut rerum.', '922685588', 'company', '2018-10-24 18:26:13', '2018-10-24 18:26:13');
INSERT INTO `customers` VALUES (13, 'Saydah Omer Hassan Rajab', 'Shandi', 26, 'Ut repellendus autem nulla qui aperiam repudiandae. Adipisci molestias totam in necessitatibus fugiat nesciunt. Officia veniam quam quas quo qui. Repellat dolorem nobis voluptatem sequi odio.', '912527878', 'individual', '2018-10-24 18:26:14', '2018-10-24 18:26:14');
INSERT INTO `customers` VALUES (14, 'Ragheb PLC', 'Atbara', 29, 'Velit et tempore veritatis voluptatum quas quis. Deserunt similique voluptas vitae maiores laudantium eum. Culpa aut velit sit adipisci quisquam vitae quisquam.', '922991322', 'company', '2018-10-24 18:26:14', '2018-10-24 18:26:14');
INSERT INTO `customers` VALUES (15, 'Osman Abdurrahman Wael Hilal', 'Khartoum', 30, 'Dolore harum pariatur commodi aliquam nesciunt commodi autem. Temporibus excepturi qui rerum aut. Quo aut recusandae omnis dolore.', '128433519', 'individual', '2018-10-24 18:26:14', '2018-10-24 18:26:14');
INSERT INTO `customers` VALUES (16, 'Ibrahim Balla Bakri Tareq', 'Khartoum', 31, 'Eius voluptas non ipsa qui. Mollitia nulla temporibus voluptatem. Soluta exercitationem repellat nam qui cumque velit.', '912334395', 'individual', '2018-10-24 18:26:14', '2018-10-24 18:26:14');
INSERT INTO `customers` VALUES (17, 'Omer Ahmed Modather Rasikh', 'Shandi', 32, 'Nam mollitia aut perferendis commodi. Dolores voluptas et maxime dignissimos. Ut dolor deserunt voluptates molestiae. Voluptas tempora amet repudiandae animi aperiam sit.', '922419232', 'individual', '2018-10-24 18:26:14', '2018-10-24 18:26:14');
INSERT INTO `customers` VALUES (18, 'Nameq and Dawood Group', 'Kusti', 34, 'Enim alias mollitia labore deserunt ducimus. Sed deleniti ullam id et beatae. Aperiam eos molestiae culpa.', '912830442', 'company', '2018-10-24 18:26:14', '2018-10-24 18:26:14');
INSERT INTO `customers` VALUES (19, 'Jawaher Fuad Yousef Noah', 'Kurdufan', 35, 'Mollitia harum labore consequatur iusto et sed nostrum. Aspernatur enim fugiat laudantium quas. Amet repudiandae iusto doloribus aliquid numquam maxime.', '922495013', 'individual', '2018-10-24 18:26:14', '2018-10-24 18:26:14');
INSERT INTO `customers` VALUES (20, 'Ali and Omer and Sons', 'Kassala', 36, 'Non odio et a. Repellat eos et occaecati consequatur velit ipsam est. Dolorem blanditiis iste perferendis dolore eveniet. Cupiditate delectus atque dolores ab ad assumenda vitae.', '922177820', 'company', '2018-10-24 18:26:14', '2018-10-24 18:26:14');
INSERT INTO `customers` VALUES (21, 'Tilal and Younis Group', 'Darfur', 39, 'Consectetur fugit enim consequuntur maxime. Similique architecto vitae deleniti. Earum doloribus libero odio nostrum sequi. Veniam velit hic cupiditate.', '912925484', 'company', '2018-10-24 18:26:14', '2018-10-24 18:26:14');
INSERT INTO `customers` VALUES (22, 'Ladan Noah Abdulaziz Fareed', 'Atbara', 40, 'Nam ea dolores enim. Similique laudantium illum tenetur qui dolorem hic.', '125410172', 'individual', '2018-10-24 18:26:14', '2018-10-24 18:26:14');
INSERT INTO `customers` VALUES (23, 'Omer and Rasikh and Sons', 'Port-Sudan', 41, 'Atque et architecto ut suscipit. Dolorem voluptas nobis non sapiente nam. Velit accusamus aut perferendis mollitia.', '922169948', 'company', '2018-10-24 18:26:15', '2018-10-24 18:26:15');
INSERT INTO `customers` VALUES (24, 'Jalal Ltd', 'Kusti', 42, 'Omnis facilis rerum quis. Quia a quia voluptatem et sunt. Hic a totam est consequatur est dignissimos quis. Quis quaerat a sit sit voluptatibus.', '922594187', 'company', '2018-10-24 18:26:15', '2018-10-24 18:26:15');
INSERT INTO `customers` VALUES (25, 'Momen PLC', 'Port-Sudan', 44, 'Aliquid tempora quia amet asperiores qui voluptas qui. Quia et porro adipisci optio quasi. Et reiciendis nisi quisquam laborum. Nulla numquam rerum dolores adipisci.', '922932660', 'company', '2018-10-24 18:26:15', '2018-10-24 18:26:15');
INSERT INTO `customers` VALUES (26, 'Fareed and Sons', 'Ubayed', 45, 'Expedita quibusdam et aliquid corrupti libero et. Eos ut et est id est. Tempora quis eveniet ex possimus earum. Dignissimos numquam ut repudiandae iusto. Laudantium culpa perspiciatis tempore.', '912230513', 'company', '2018-10-24 18:26:15', '2018-10-24 18:26:15');
INSERT INTO `customers` VALUES (27, 'Sami and Ramadan PLC', 'Kusti', 46, 'Dolorem voluptate sapiente aut quo. Velit vero nesciunt magnam perspiciatis quasi. Fugiat unde ex consequatur accusantium quibusdam et iusto tempore.', '124580951', 'company', '2018-10-24 18:26:15', '2018-10-24 18:26:15');
INSERT INTO `customers` VALUES (28, 'Tilal Nasir Omer Rami', 'Kusti', 47, 'Ipsum molestiae doloremque fugit voluptatem officiis ut. Dolorem maxime recusandae quos. Praesentium voluptatem et sit illum veritatis.', '922815831', 'individual', '2018-10-24 18:26:15', '2018-10-24 18:26:15');
INSERT INTO `customers` VALUES (29, 'Musa Abdullah Bakri Jomaa', 'Madani', 48, 'Quibusdam quo explicabo sed animi. Numquam ut molestiae quaerat ut. Nulla architecto sed est.', '124132861', 'individual', '2018-10-24 18:26:15', '2018-10-24 18:26:15');
INSERT INTO `customers` VALUES (30, 'Ameen Salama Bakri Obey', 'Port-Sudan', 53, 'Modi qui occaecati odio rem sequi odit ipsam. Omnis quas nemo doloremque commodi vitae rerum. Qui et assumenda earum qui et ipsum reiciendis. Rerum ad amet odio ducimus. Aut qui officiis qui quia.', '912819153', 'individual', '2018-10-24 18:26:15', '2018-10-24 18:26:15');
INSERT INTO `customers` VALUES (31, 'Rajab and Yousef Ltd', 'Kassala', 54, 'Ad non vel aperiam ea. Similique quam voluptate iure amet. Facere voluptas dolores amet rerum ducimus esse et recusandae. Error dolor recusandae impedit. Rem nobis molestiae nostrum quis.', '922243743', 'company', '2018-10-24 18:26:15', '2018-10-24 18:26:15');
INSERT INTO `customers` VALUES (32, 'Hassan and Sons', 'Atbara', 56, 'Dolor reiciendis voluptatem voluptatem id dolore accusantium. Quo velit aperiam deserunt ipsam consequatur. Sed earum voluptas voluptatem.', '912348448', 'company', '2018-10-24 18:26:15', '2018-10-24 18:26:15');
INSERT INTO `customers` VALUES (33, 'Waad Issac Kamal Modather', 'Atbara', 58, 'Reprehenderit id nesciunt maxime est corporis asperiores qui. Explicabo alias amet laboriosam amet. Ea culpa rerum assumenda fuga qui. Libero repellendus molestias modi voluptatem et.', '922436406', 'individual', '2018-10-24 18:26:16', '2018-10-24 18:26:16');
INSERT INTO `customers` VALUES (34, 'Rajab Basem Mohammed Tamer', 'Kassala', 59, 'Non corrupti molestiae est sint blanditiis molestias nihil. Qui dolorem officiis et nihil qui perferendis qui. Explicabo omnis labore quam ut minus. Et autem neque sed quisquam dolorum itaque quos.', '922754647', 'individual', '2018-10-24 18:26:16', '2018-10-24 18:26:16');
INSERT INTO `customers` VALUES (35, 'Dodi Abdulmajeed Bassam Ragheb', 'Kassala', 60, 'Dolores est qui autem sequi pariatur repudiandae omnis deserunt. Dolor expedita sint tempore quae esse ut qui. Blanditiis autem quod inventore harum aut officiis.', '912418400', 'individual', '2018-10-24 18:26:16', '2018-10-24 18:26:16');
INSERT INTO `customers` VALUES (36, 'Abdulaziz and Yousef LLC', 'Kusti', 62, 'Aut nisi sunt omnis. Maiores molestias voluptas officia tempore ab sit. Excepturi quas unde ratione rerum non. Harum repellendus voluptatum quae aspernatur.', '125366028', 'company', '2018-10-24 18:26:16', '2018-10-24 18:26:16');
INSERT INTO `customers` VALUES (37, 'Modather and Moharram LLC', 'Port-Sudan', 63, 'Numquam doloremque neque esse aut voluptates odio sit. Soluta architecto fugiat ex odit et vel ut autem. Non quia alias officiis qui.', '912987437', 'company', '2018-10-24 18:26:16', '2018-10-24 18:26:16');
INSERT INTO `customers` VALUES (38, 'Yousef and Abdulaziz Group', 'Kusti', 65, 'Voluptatibus perferendis enim molestias nemo ab sed et. Qui dignissimos quis ut iure. Est quia dolorum itaque. Rerum ratione iste expedita aliquam est quo.', '912152862', 'company', '2018-10-24 18:26:16', '2018-10-24 18:26:16');
INSERT INTO `customers` VALUES (39, 'Mahmoud and Younis and Sons', 'Kusti', 69, 'Reiciendis mollitia est in quisquam error eveniet. Sint vel aut accusamus libero earum. Rerum eveniet aspernatur fugiat ea quas consequatur reiciendis dolorum.', '129683112', 'company', '2018-10-24 18:26:16', '2018-10-24 18:26:16');
INSERT INTO `customers` VALUES (40, 'Noon Fuad Noah Tawfeeq', 'Shandi', 72, 'Excepturi rem dolore est consequuntur qui. Molestias porro id aut sit. Recusandae voluptatem placeat vel expedita odio eos doloribus quidem. Ut voluptas at dolorum quos tempore ducimus.', '128939685', 'individual', '2018-10-24 18:26:17', '2018-10-24 18:26:17');
INSERT INTO `customers` VALUES (41, 'Zahed Momen Issac Tareq', 'Darfur', 73, 'Impedit illum in nihil sed voluptates. Et ducimus ea dolor necessitatibus eum odit. Saepe rerum suscipit omnis officiis perferendis error. Sint quia voluptas ratione omnis enim.', '912255330', 'individual', '2018-10-24 18:26:17', '2018-10-24 18:26:17');
INSERT INTO `customers` VALUES (42, 'Ramadan and Abdulasamad Ltd', 'Kassala', 74, 'Autem voluptatibus veniam unde autem. Enim sed labore explicabo et. Ullam quas omnis expedita. Voluptatum fugiat hic velit non.', '122489929', 'company', '2018-10-24 18:26:17', '2018-10-24 18:26:17');
INSERT INTO `customers` VALUES (43, 'Najat Salama Omer Jibreel', 'Madani', 75, 'Quidem qui sapiente quia est corporis. Magnam quis saepe architecto et omnis cumque iste. Laudantium totam pariatur qui eos aut cum cupiditate veniam.', '922391991', 'individual', '2018-10-24 18:26:17', '2018-10-24 18:26:17');
INSERT INTO `customers` VALUES (44, 'Tawfeeq Tawfeeq Tawfeeq Abdullah', 'Kusti', 76, 'Aspernatur eos reprehenderit eos ut voluptatem minus. Quia quia quis nisi facere illum ut. Fugit quidem tenetur et ipsum.', '912543219', 'individual', '2018-10-24 18:26:17', '2018-10-24 18:26:17');
INSERT INTO `customers` VALUES (45, 'Hilal LLC', 'Kurdufan', 78, 'Cum sed molestias quia fuga ut veritatis. Molestiae iste voluptas eum qui aperiam recusandae sapiente. Ipsa eos voluptatibus eum non assumenda voluptas quae.', '912783047', 'company', '2018-10-24 18:26:17', '2018-10-24 18:26:17');
INSERT INTO `customers` VALUES (46, 'Manal Hani Loai Rasikh', 'Kassala', 80, 'Beatae numquam cupiditate qui distinctio blanditiis. Eaque ut temporibus aperiam soluta est at. Sit ipsa eum exercitationem. Dolore recusandae optio id dicta.', '121120843', 'individual', '2018-10-24 18:26:17', '2018-10-24 18:26:17');
INSERT INTO `customers` VALUES (47, 'Raniah Abdurrahman Jihad Fadl', 'Port-Sudan', 86, 'Rerum voluptatem iure amet officia necessitatibus adipisci. Pariatur nostrum laborum ducimus voluptas. Quod saepe sunt alias magnam. Quasi praesentium porro nam facere perspiciatis deserunt quis.', '912624935', 'individual', '2018-10-24 18:26:17', '2018-10-24 18:26:17');
INSERT INTO `customers` VALUES (48, 'Fahad Kareem Wael Bilal', 'Atbara', 88, 'Ut pariatur vel aspernatur et sit dolore. Voluptatum a voluptatem consequatur beatae quis. Tenetur et suscipit est ipsa et beatae.', '121569033', 'individual', '2018-10-24 18:26:18', '2018-10-24 18:26:18');
INSERT INTO `customers` VALUES (49, 'Ismael Zidane Modather Basem', 'Khartoum', 89, 'Suscipit placeat magni voluptate ea. Et adipisci dolor et ex eum voluptatem nulla fugiat. Est animi eum iusto pariatur et odit. Quis hic sunt autem molestiae aut. Earum ea expedita eius.', '912725694', 'individual', '2018-10-24 18:26:18', '2018-10-24 18:26:18');
INSERT INTO `customers` VALUES (50, 'Fadl Ltd', 'Kassala', 90, 'Magnam ex dolorem et qui voluptas vero doloremque. Neque rem et qui ut. Dolorum consequuntur est quae sed.', '124878902', 'company', '2018-10-24 18:26:18', '2018-10-24 18:26:18');
INSERT INTO `customers` VALUES (51, 'Ragheb and Hassan Group', 'Atbara', 94, 'Ea distinctio vel vero nihil. Distinctio eum sit nihil at dolore eius magni. Est quia rerum tempore sed esse occaecati et.', '922585552', 'company', '2018-10-24 18:26:18', '2018-10-24 18:26:18');
INSERT INTO `customers` VALUES (52, 'Sameer and Sons', 'Atbara', 96, 'Veniam provident aliquid sed. Sit dolores aliquam minima sit adipisci quia maiores. Dolor tempora id est non.', '123990668', 'company', '2018-10-24 18:26:18', '2018-10-24 18:26:18');
INSERT INTO `customers` VALUES (53, 'Tayseer Abdurrahman Ragheb Nabeel', 'Port-Sudan', 98, 'Repudiandae aperiam enim aut possimus facilis vel. Fugit id quasi ut quos earum itaque autem. Et minima at modi esse.', '912423608', 'individual', '2018-10-24 18:26:18', '2018-10-24 18:26:18');
INSERT INTO `customers` VALUES (54, 'Basel Salama Wael Tilal', 'Kurdufan', 99, 'Libero est assumenda voluptas similique sit quibusdam. Laborum nesciunt neque tempore incidunt distinctio. Iure quas quia qui doloribus sed a.', '128317732', 'individual', '2018-10-24 18:26:18', '2018-10-24 18:26:18');
INSERT INTO `customers` VALUES (55, 'Balla and Tawfeeq and Sons', 'Kurdufan', 100, 'Nulla blanditiis suscipit fugit repellendus perspiciatis possimus omnis aliquam. Et optio minus quaerat voluptatibus dolorum quo ut. Id labore minus placeat labore modi sunt. Quod et et qui qui sunt.', '922122572', 'company', '2018-10-24 18:26:18', '2018-10-24 18:26:18');
INSERT INTO `customers` VALUES (56, 'Ebtehal Abdulmajeed Basem Salama', 'Darfur', 101, 'Deleniti fugit vel excepturi repudiandae fuga. Deserunt eius nisi consequatur facilis et quaerat recusandae. Non quia blanditiis quia corrupti quaerat.', '912476056', 'individual', '2018-10-24 18:26:18', '2018-10-24 18:26:18');
INSERT INTO `customers` VALUES (57, 'Tilal and Sons', 'Ubayed', 102, 'Quidem ab consequuntur laborum non asperiores voluptatem asperiores voluptatibus. Est quibusdam aspernatur quibusdam quo voluptates repellendus autem. Magni distinctio exercitationem iusto.', '912457147', 'company', '2018-10-24 18:26:18', '2018-10-24 18:26:18');
INSERT INTO `customers` VALUES (58, 'Nazar LLC', 'Kusti', 103, 'Molestiae voluptatibus inventore doloribus mollitia tempore nihil est. In eum quia autem dolorem officia doloremque. Accusamus fuga vitae id. Cum aliquid voluptas quaerat id optio dolores.', '129898810', 'company', '2018-10-24 18:26:19', '2018-10-24 18:26:19');
COMMIT;

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
  `user_id` int(11) unsigned DEFAULT NULL,
  `description` text,
  `response_time` int(5) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE KEY `user_id` (`user_id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=45 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of freelancers
-- ----------------------------
BEGIN;
INSERT INTO `freelancers` VALUES (1, 'Ali Moharram', '1995-04-22', 'Khartoum', 'Arabic,English', '999467995', 'http://www.facebook.com', 'http://www.twitter.com', 'http://www.github.com', 'http://www.dribbble.com', 'http://www.linkedin.com', 9, 2, 'Cupiditate maxime aut commodi praesentium. Quam deserunt earum eos reprehenderit. Aliquid non quidem ea voluptatem.', 2, '2018-10-22 20:40:24', '2018-10-22 20:40:24');
INSERT INTO `freelancers` VALUES (2, 'Dalia Salman Jalal Nazar', '1986-03-29', 'Khartoum', 'Arabic,English,French', '922693262', 'http://www.facebook.com', 'http://www.twitter.com', 'http://www.github.com', 'http://www.dribbble.com', 'http://www.linkedin.com', 5, 4, 'Tempora alias nam et. Aut dolores quia suscipit aspernatur. Omnis expedita vel hic laboriosam.', 12, '2018-10-24 18:26:12', '2018-10-24 18:26:12');
INSERT INTO `freelancers` VALUES (3, 'Sameer Mahmoud Abdullah Salama', '1984-03-06', 'Shandi', 'Arabic', '912456632', 'http://www.facebook.com', 'http://www.twitter.com', 'http://www.github.com', 'http://www.dribbble.com', 'http://www.linkedin.com', 7, 6, 'Velit sit repellendus unde eos atque est doloremque. Beatae voluptatem tenetur mollitia. Accusantium tenetur non a modi.', 33, '2018-10-24 18:26:12', '2018-10-24 18:26:12');
INSERT INTO `freelancers` VALUES (4, 'Weam Nabeel Ibrahim Modather', '1975-10-08', 'Darfur', 'Arabic', '126961424', 'http://www.facebook.com', 'http://www.twitter.com', 'http://www.github.com', 'http://www.dribbble.com', 'http://www.linkedin.com', 2, 11, 'Necessitatibus praesentium non est adipisci. Ab odio molestiae voluptatem id. Aut repellat magnam culpa debitis. Commodi possimus eius similique ex velit non.', 50, '2018-10-24 18:26:13', '2018-10-24 18:26:13');
INSERT INTO `freelancers` VALUES (5, 'Ekhlas Wael Jihad Jomaa', '1979-03-10', 'Port-Sudan', 'Arabic', '922559983', 'http://www.facebook.com', 'http://www.twitter.com', 'http://www.github.com', 'http://www.dribbble.com', 'http://www.linkedin.com', 8, 12, 'Magni itaque aut est voluptatem aperiam. Ea libero vel dolorum voluptatem voluptatem. Natus provident voluptatum voluptas rem expedita molestiae quo.', 43, '2018-10-24 18:26:13', '2018-10-24 18:26:13');
INSERT INTO `freelancers` VALUES (6, 'Tayseer Bassam Tilal Zahed', '1995-07-03', 'Atbara', 'Arabic,English,French', '121599232', 'http://www.facebook.com', 'http://www.twitter.com', 'http://www.github.com', 'http://www.dribbble.com', 'http://www.linkedin.com', 1, 13, 'Nesciunt atque at et deserunt. Id nobis corporis inventore ut nihil. Eos eius neque eveniet esse fugit sint. Perferendis accusantium mollitia placeat qui sit voluptate expedita nam.', 46, '2018-10-24 18:26:13', '2018-10-24 18:26:13');
INSERT INTO `freelancers` VALUES (7, 'Musa Rajab Tareq Ali', '1986-04-25', 'Ubayed', 'Arabic,English,French', '126833790', 'http://www.facebook.com', 'http://www.twitter.com', 'http://www.github.com', 'http://www.dribbble.com', 'http://www.linkedin.com', 5, 17, 'Dolores accusantium distinctio iste fugit voluptatum. In molestias dolorem quasi ab praesentium. Rerum ut dolorum rerum optio velit.', 34, '2018-10-24 18:26:13', '2018-10-24 18:26:13');
INSERT INTO `freelancers` VALUES (8, 'Waad Loai Modather Ragheb', '1996-03-03', 'Kurdufan', 'Arabic,English', '912779538', 'http://www.facebook.com', 'http://www.twitter.com', 'http://www.github.com', 'http://www.dribbble.com', 'http://www.linkedin.com', 9, 18, 'Nam sunt explicabo quibusdam eum. Sit necessitatibus et qui quas voluptates.', 2, '2018-10-24 18:26:13', '2018-10-24 18:26:13');
INSERT INTO `freelancers` VALUES (9, 'Afnan Tareq Salama Nameq', '1980-03-03', 'Darfur', 'Arabic,English', '125554355', 'http://www.facebook.com', 'http://www.twitter.com', 'http://www.github.com', 'http://www.dribbble.com', 'http://www.linkedin.com', 9, 19, 'Et adipisci itaque quos et perspiciatis iure officiis et. Ullam quisquam neque earum qui aliquam. Hic fugit qui cumque modi.', 14, '2018-10-24 18:26:13', '2018-10-24 18:26:13');
INSERT INTO `freelancers` VALUES (10, 'Gasem Jamaal Mohammed Raheem', '1997-05-23', 'Ubayed', 'Arabic,English,French', '912277258', 'http://www.facebook.com', 'http://www.twitter.com', 'http://www.github.com', 'http://www.dribbble.com', 'http://www.linkedin.com', 9, 22, 'Eveniet adipisci non in consequatur quia officia recusandae. Deleniti quos tempore porro. Explicabo aspernatur nesciunt vero qui sed ea et similique.', 29, '2018-10-24 18:26:13', '2018-10-24 18:26:13');
INSERT INTO `freelancers` VALUES (11, 'Fadwah Zahed Mozamil Sami', '1995-04-27', 'Kusti', 'Arabic', '912688263', 'http://www.facebook.com', 'http://www.twitter.com', 'http://www.github.com', 'http://www.dribbble.com', 'http://www.linkedin.com', 10, 23, 'Cupiditate maxime aut commodi praesentium. Quam deserunt earum eos reprehenderit. Aliquid non quidem ea voluptatem.', 5, '2018-10-24 18:26:13', '2018-10-24 18:26:13');
INSERT INTO `freelancers` VALUES (12, 'Afnan Husain Yousef Fadl', '1991-12-09', 'Kusti', 'Arabic', '912862248', 'http://www.facebook.com', 'http://www.twitter.com', 'http://www.github.com', 'http://www.dribbble.com', 'http://www.linkedin.com', 5, 25, 'Qui debitis sit maiores eum dolorem. Doloremque numquam tempore sint molestiae consequuntur. Rerum iusto quibusdam eaque architecto pariatur odio.', 16, '2018-10-24 18:26:13', '2018-10-24 18:26:13');
INSERT INTO `freelancers` VALUES (13, 'Jawaher Haitham Basel Zahed', '1979-06-24', 'Madani', 'Arabic,English', '129910818', 'http://www.facebook.com', 'http://www.twitter.com', 'http://www.github.com', 'http://www.dribbble.com', 'http://www.linkedin.com', 10, 27, 'Quibusdam rerum quia aut eum voluptatum consectetur veritatis quod. Velit autem aut voluptatem rerum id. Ea nemo sit impedit repellendus qui.', 29, '2018-10-24 18:26:14', '2018-10-24 18:26:14');
INSERT INTO `freelancers` VALUES (14, 'Wael Rammah Momen Obey', '1999-04-29', 'Kassala', 'Arabic', '922775204', 'http://www.facebook.com', 'http://www.twitter.com', 'http://www.github.com', 'http://www.dribbble.com', 'http://www.linkedin.com', 2, 28, 'Aliquam autem reiciendis molestiae nihil veniam eveniet laudantium. Doloremque ea ad delectus ipsa. Dicta nobis voluptas voluptas dolor illum.', 62, '2018-10-24 18:26:14', '2018-10-24 18:26:14');
INSERT INTO `freelancers` VALUES (15, 'Nasir Abdullah Zahed Yousef', '1983-07-16', 'Khartoum', 'Arabic,English,French', '922534837', 'http://www.facebook.com', 'http://www.twitter.com', 'http://www.github.com', 'http://www.dribbble.com', 'http://www.linkedin.com', 8, 33, 'Recusandae voluptatibus nemo quo et. Eveniet est quas id perspiciatis. Eaque sint voluptatem eveniet debitis quod dignissimos sit. Corrupti consectetur laboriosam rem quaerat reprehenderit nobis.', 5, '2018-10-24 18:26:14', '2018-10-24 18:26:14');
INSERT INTO `freelancers` VALUES (16, 'Fuad Jihad Mohammed Wael', '1997-06-09', 'Shandi', 'Arabic,English', '922463371', 'http://www.facebook.com', 'http://www.twitter.com', 'http://www.github.com', 'http://www.dribbble.com', 'http://www.linkedin.com', 7, 37, 'Molestias quia deserunt molestiae aut qui. Et blanditiis recusandae inventore. Delectus enim dolorem sint officia corporis facilis.', 47, '2018-10-24 18:26:14', '2018-10-24 18:26:14');
INSERT INTO `freelancers` VALUES (17, 'Nameq Waleed Tilal Hilal', '1974-07-05', 'Port-Sudan', 'Arabic', '922982004', 'http://www.facebook.com', 'http://www.twitter.com', 'http://www.github.com', 'http://www.dribbble.com', 'http://www.linkedin.com', 6, 38, 'Dolorum animi perspiciatis eaque nemo officia in. Repellendus dolore sunt qui. Molestiae reiciendis accusantium totam id.', 44, '2018-10-24 18:26:14', '2018-10-24 18:26:14');
INSERT INTO `freelancers` VALUES (18, 'Essa Modather Faisal Zakaria', '1980-01-21', 'Madani', 'Arabic', '912468775', 'http://www.facebook.com', 'http://www.twitter.com', 'http://www.github.com', 'http://www.dribbble.com', 'http://www.linkedin.com', 2, 43, 'Quasi ut eum deserunt voluptates aperiam ducimus. Omnis rerum dolores consequuntur optio. Aspernatur occaecati occaecati suscipit maiores ea doloremque blanditiis pariatur.', 66, '2018-10-24 18:26:15', '2018-10-24 18:26:15');
INSERT INTO `freelancers` VALUES (19, 'Balla Abdulmajeed Gasem Haitham', '1974-03-30', 'Khartoum', 'Arabic,English,French', '912214816', 'http://www.facebook.com', 'http://www.twitter.com', 'http://www.github.com', 'http://www.dribbble.com', 'http://www.linkedin.com', 6, 49, 'Est non beatae ut dolor magnam. Dolorem doloremque consectetur vitae eos quibusdam nemo. Sit voluptates necessitatibus in molestias. Tempora est eius labore atque dicta.', 55, '2018-10-24 18:26:15', '2018-10-24 18:26:15');
INSERT INTO `freelancers` VALUES (20, 'Nihad Nader Bilal Kareem', '1970-09-23', 'Darfur', 'Arabic,English', '122813503', 'http://www.facebook.com', 'http://www.twitter.com', 'http://www.github.com', 'http://www.dribbble.com', 'http://www.linkedin.com', 12, 50, 'Odio nobis consectetur rerum est. Reprehenderit eos molestiae ut odit. Laborum saepe nobis maiores.', 23, '2018-10-24 18:26:15', '2018-10-24 18:26:15');
INSERT INTO `freelancers` VALUES (21, 'Rami Tareq Ameen Mahmoud', '1990-11-16', 'Kusti', 'Arabic,English,French', '912580318', 'http://www.facebook.com', 'http://www.twitter.com', 'http://www.github.com', 'http://www.dribbble.com', 'http://www.linkedin.com', 5, 51, 'Nam sed labore totam impedit voluptatem est. Cupiditate tempora sapiente quos vel. Nulla voluptatem molestiae quibusdam quia. Voluptatem eius fugiat consequuntur vel possimus odio.', 11, '2018-10-24 18:26:15', '2018-10-24 18:26:15');
INSERT INTO `freelancers` VALUES (22, 'Osman Abdulmajeed Gasem Zakaria', '1982-04-11', 'Khartoum', 'Arabic,English,French', '912424222', 'http://www.facebook.com', 'http://www.twitter.com', 'http://www.github.com', 'http://www.dribbble.com', 'http://www.linkedin.com', 9, 52, 'Nulla ex qui vitae commodi mollitia. Recusandae nemo adipisci culpa veritatis. Cumque veniam voluptates fuga alias dolorem enim dolor.', 59, '2018-10-24 18:26:15', '2018-10-24 18:26:15');
INSERT INTO `freelancers` VALUES (23, 'Ragheb Loai Sameer Balla', '1989-05-19', 'Darfur', 'Arabic,English', '922981068', 'http://www.facebook.com', 'http://www.twitter.com', 'http://www.github.com', 'http://www.dribbble.com', 'http://www.linkedin.com', 6, 55, 'Necessitatibus aut ipsam ut repudiandae quo exercitationem dolores. Libero sed esse voluptas aut est voluptatem ut. Molestias neque totam minus eius placeat aperiam voluptatum.', 44, '2018-10-24 18:26:15', '2018-10-24 18:26:15');
INSERT INTO `freelancers` VALUES (24, 'Lana Fadel Omer Omer', '1999-03-14', 'Kusti', 'Arabic', '129716115', 'http://www.facebook.com', 'http://www.twitter.com', 'http://www.github.com', 'http://www.dribbble.com', 'http://www.linkedin.com', 4, 57, 'Tempora est ipsum consectetur iure ab. Perferendis sit error alias facilis aut voluptatum voluptas. Ut et ipsam sed illum.', 56, '2018-10-24 18:26:16', '2018-10-24 18:26:16');
INSERT INTO `freelancers` VALUES (25, 'Rami Omer Zahed Bakri', '1973-09-27', 'Kassala', 'Arabic,English,French', '922793617', 'http://www.facebook.com', 'http://www.twitter.com', 'http://www.github.com', 'http://www.dribbble.com', 'http://www.linkedin.com', 3, 61, 'Est sapiente tenetur ipsa cumque sunt tenetur esse sint. Explicabo consequatur nulla accusantium rem. Deleniti voluptatem molestiae enim laudantium rerum.', 31, '2018-10-24 18:26:16', '2018-10-24 18:26:16');
INSERT INTO `freelancers` VALUES (26, 'Hadeer Omer Musa Faisal', '1994-11-11', 'Ubayed', 'Arabic', '912680618', 'http://www.facebook.com', 'http://www.twitter.com', 'http://www.github.com', 'http://www.dribbble.com', 'http://www.linkedin.com', 5, 64, 'Dolore illo et quia magnam. Consequatur quaerat et quisquam. Dolores mollitia quas hic doloribus incidunt fugit. Exercitationem velit aliquid incidunt tenetur. Eligendi dolorum ut eum enim optio.', 38, '2018-10-24 18:26:16', '2018-10-24 18:26:16');
INSERT INTO `freelancers` VALUES (27, 'Razaz Hassan Abdurrahman Noah', '1977-06-16', 'Madani', 'Arabic,English', '126664570', 'http://www.facebook.com', 'http://www.twitter.com', 'http://www.github.com', 'http://www.dribbble.com', 'http://www.linkedin.com', 3, 66, 'Molestias veritatis sed a dicta voluptates itaque voluptatem odit. Eos expedita veritatis totam incidunt. Praesentium molestiae dolor odit.', 52, '2018-10-24 18:26:16', '2018-10-24 18:26:16');
INSERT INTO `freelancers` VALUES (28, 'Jihad Nameq Mozamil Nader', '1972-05-22', 'Khartoum', 'Arabic,English', '125363802', 'http://www.facebook.com', 'http://www.twitter.com', 'http://www.github.com', 'http://www.dribbble.com', 'http://www.linkedin.com', 5, 67, 'Sit aut rerum necessitatibus iste vero similique. Consectetur voluptas suscipit cupiditate voluptas repellat distinctio exercitationem repellat. Fugit ab ut dolores est consequatur nam dolore.', 67, '2018-10-24 18:26:16', '2018-10-24 18:26:16');
INSERT INTO `freelancers` VALUES (29, 'Fadwah Mahmoud Nazem Sameer', '1970-12-01', 'Shandi', 'Arabic,English,French', '912132327', 'http://www.facebook.com', 'http://www.twitter.com', 'http://www.github.com', 'http://www.dribbble.com', 'http://www.linkedin.com', 5, 68, 'Optio praesentium et voluptatem a dolorum laudantium optio. Rerum numquam minus minima sunt ut. Laudantium fugiat expedita ea.', 52, '2018-10-24 18:26:16', '2018-10-24 18:26:16');
INSERT INTO `freelancers` VALUES (30, 'Zakaria Essa Husain Omer', '1976-09-11', 'Darfur', 'Arabic,English', '124105483', 'http://www.facebook.com', 'http://www.twitter.com', 'http://www.github.com', 'http://www.dribbble.com', 'http://www.linkedin.com', 4, 70, 'Maxime sed dignissimos non iste. Sint qui omnis nobis harum illo. Recusandae voluptate ea doloremque. Qui quidem corrupti eaque sunt.', 48, '2018-10-24 18:26:16', '2018-10-24 18:26:16');
INSERT INTO `freelancers` VALUES (31, 'Tayseer Ahmed Nazar Mozamil', '1976-05-25', 'Port-Sudan', 'Arabic,English,French', '922465019', 'http://www.facebook.com', 'http://www.twitter.com', 'http://www.github.com', 'http://www.dribbble.com', 'http://www.linkedin.com', 7, 71, 'Accusantium magnam quasi qui in recusandae aliquam esse. Animi magnam consequuntur alias suscipit et nostrum. Ipsa deleniti provident porro hic deleniti vel.', 45, '2018-10-24 18:26:16', '2018-10-24 18:26:16');
INSERT INTO `freelancers` VALUES (32, 'Rammah Ragheb Mozamil Balla', '1980-09-24', 'Kurdufan', 'Arabic,English,French', '912912142', 'http://www.facebook.com', 'http://www.twitter.com', 'http://www.github.com', 'http://www.dribbble.com', 'http://www.linkedin.com', 12, 77, 'Quisquam facere consequatur laboriosam eveniet optio. Soluta mollitia eos sed occaecati aut saepe. Velit esse corporis debitis id. Numquam aut nam ea voluptatem ipsa voluptas laborum.', 49, '2018-10-24 18:26:17', '2018-10-24 18:26:17');
INSERT INTO `freelancers` VALUES (33, 'Nasir Obey Fahad Rami', '1974-10-26', 'Port-Sudan', 'Arabic,English,French', '126749395', 'http://www.facebook.com', 'http://www.twitter.com', 'http://www.github.com', 'http://www.dribbble.com', 'http://www.linkedin.com', 6, 79, 'Qui temporibus minima enim voluptas veritatis. Voluptatem saepe velit sit provident sint eum. Voluptate excepturi est nisi totam blanditiis voluptas.', 13, '2018-10-24 18:26:17', '2018-10-24 18:26:17');
INSERT INTO `freelancers` VALUES (34, 'Mohsen Ismael Samir Mozamil', '1982-01-23', 'Darfur', 'Arabic', '922594455', 'http://www.facebook.com', 'http://www.twitter.com', 'http://www.github.com', 'http://www.dribbble.com', 'http://www.linkedin.com', 7, 81, 'Consequatur at accusamus quo repellat qui minus autem. Earum voluptas quia eius non porro. Delectus unde quis optio est sunt. Velit odio vel dolorem nisi impedit iusto dolores non.', 62, '2018-10-24 18:26:17', '2018-10-24 18:26:17');
INSERT INTO `freelancers` VALUES (35, 'Buthainah Jihad Nazem Kamal', '1977-05-10', 'Port-Sudan', 'Arabic,English', '126115709', 'http://www.facebook.com', 'http://www.twitter.com', 'http://www.github.com', 'http://www.dribbble.com', 'http://www.linkedin.com', 1, 82, 'Aut minus veniam nesciunt et dicta. Ipsam numquam ab fugit corporis quis unde laborum placeat. Eius sint voluptas amet maiores.', 70, '2018-10-24 18:26:17', '2018-10-24 18:26:17');
INSERT INTO `freelancers` VALUES (36, 'Tilal Rammah Abdulaziz Mahmoud', '1997-10-02', 'Atbara', 'Arabic,English', '922496363', 'http://www.facebook.com', 'http://www.twitter.com', 'http://www.github.com', 'http://www.dribbble.com', 'http://www.linkedin.com', 6, 83, 'Exercitationem veniam nulla quia repellat fugit ipsa illum. Ducimus doloribus doloribus cum earum laboriosam totam. Itaque non est autem eius ut. Officiis pariatur laudantium dicta dignissimos.', 32, '2018-10-24 18:26:17', '2018-10-24 18:26:17');
INSERT INTO `freelancers` VALUES (37, 'Mozamil Bassam Ragheb Faisal', '1982-10-14', 'Kusti', 'Arabic,English', '922648700', 'http://www.facebook.com', 'http://www.twitter.com', 'http://www.github.com', 'http://www.dribbble.com', 'http://www.linkedin.com', 7, 84, 'Recusandae dolorum possimus illo non provident ipsa. Repudiandae quae iusto omnis atque itaque dicta explicabo sed. Impedit numquam repellat eum vel beatae.', 25, '2018-10-24 18:26:17', '2018-10-24 18:26:17');
INSERT INTO `freelancers` VALUES (38, 'Zahrah Faisal Tareq Fareed', '1998-06-08', 'Shandi', 'Arabic,English,French', '912462161', 'http://www.facebook.com', 'http://www.twitter.com', 'http://www.github.com', 'http://www.dribbble.com', 'http://www.linkedin.com', 6, 85, 'Qui repellendus voluptatum doloremque ratione. Quos et amet aliquid est vel. Est doloribus quos praesentium unde praesentium. Et et nobis consequuntur ad illo laborum sint fugit.', 33, '2018-10-24 18:26:17', '2018-10-24 18:26:17');
INSERT INTO `freelancers` VALUES (39, 'Momen Omer Issac Mohammed', '1979-01-05', 'Ubayed', 'Arabic,English', '912827558', 'http://www.facebook.com', 'http://www.twitter.com', 'http://www.github.com', 'http://www.dribbble.com', 'http://www.linkedin.com', 8, 87, 'Eum velit deserunt illum facere ratione nihil ullam. Aut consequatur quia vel officiis ut quibusdam. Earum necessitatibus qui in sit voluptas praesentium.', 18, '2018-10-24 18:26:17', '2018-10-24 18:26:17');
INSERT INTO `freelancers` VALUES (40, 'Dodi Salman Fahad Nazem', '1992-07-28', 'Kusti', 'Arabic,English', '912416971', 'http://www.facebook.com', 'http://www.twitter.com', 'http://www.github.com', 'http://www.dribbble.com', 'http://www.linkedin.com', 3, 91, 'Non facilis dolores voluptas exercitationem hic. Consequatur error laboriosam nam cumque numquam consequatur. Eius mollitia et odit eos assumenda aut tempora.', 42, '2018-10-24 18:26:18', '2018-10-24 18:26:18');
INSERT INTO `freelancers` VALUES (41, 'Wedad Tamer Nazem Raheem', '1995-07-22', 'Kurdufan', 'Arabic,English', '124828636', 'http://www.facebook.com', 'http://www.twitter.com', 'http://www.github.com', 'http://www.dribbble.com', 'http://www.linkedin.com', 12, 92, 'Magni facere perferendis assumenda tempore. Officiis similique sit est reprehenderit tempora sed. Dignissimos voluptatibus ad sed quia et nulla eum laudantium. Consequuntur mollitia aut beatae.', 59, '2018-10-24 18:26:18', '2018-10-24 18:26:18');
INSERT INTO `freelancers` VALUES (42, 'Dawood Rammah Ragheb Wael', '1991-01-11', 'Darfur', 'Arabic,English', '912574002', 'http://www.facebook.com', 'http://www.twitter.com', 'http://www.github.com', 'http://www.dribbble.com', 'http://www.linkedin.com', 7, 93, 'Alias possimus illum optio reiciendis debitis. Aut odio quaerat ut perspiciatis.', 4, '2018-10-24 18:26:18', '2018-10-24 18:26:18');
INSERT INTO `freelancers` VALUES (43, 'Dawood Sameer Jalal Omer', '1970-11-26', 'Kassala', 'Arabic', '912976293', 'http://www.facebook.com', 'http://www.twitter.com', 'http://www.github.com', 'http://www.dribbble.com', 'http://www.linkedin.com', 12, 95, 'Non impedit est ducimus consequatur modi eius. Itaque laudantium inventore illo autem nihil. Voluptas enim sunt ut aut ut. Ab et autem quidem quibusdam.', 70, '2018-10-24 18:26:18', '2018-10-24 18:26:18');
INSERT INTO `freelancers` VALUES (44, 'Hani Jamaal Nasir Tilal', '1970-01-22', 'Darfur', 'Arabic,English', '922214343', 'http://www.facebook.com', 'http://www.twitter.com', 'http://www.github.com', 'http://www.dribbble.com', 'http://www.linkedin.com', 4, 97, 'Debitis incidunt sed quis et nam. Rerum culpa qui ratione ut architecto. Et non vero exercitationem. Commodi ipsam ut ipsa quis eos eos qui.', 1, '2018-10-24 18:26:18', '2018-10-24 18:26:18');
COMMIT;

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
-- Table structure for monolog
-- ----------------------------
DROP TABLE IF EXISTS `monolog`;
CREATE TABLE `monolog` (
  `channel` varchar(255) DEFAULT NULL,
  `level` int(11) DEFAULT NULL,
  `message` longtext,
  `time` int(10) unsigned DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of monolog
-- ----------------------------
BEGIN;
INSERT INTO `monolog` VALUES ('general', 300, '[2018-10-22 18:04:21] general.WARNING: test message [] []\n', 1540224261);
INSERT INTO `monolog` VALUES ('general', 300, '[2018-10-22 18:05:02] general.WARNING: test message [] []\n', 1540224302);
COMMIT;

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
-- Records of sessions
-- ----------------------------
BEGIN;
INSERT INTO `sessions` VALUES (0x6367616172377664723236676F37666576713663666234316666, 0x65794A7064694936496B4A73543145355A6C6F79627A6C6E4E45396B4F554E6E63584E4E5445453950534973496E5A686248566C496A6F695133527A53334E6D656B4E3664444130526E46725633647A55306B315530645A4F475278536B6F77575746754D5870615531524B553368364F566C70556B64634C3264304F44686A557A6478625846344E48566F63445654555768504D325A35535746455A4670735A5668785630673353305A596357706B4E3351335158527463305A5161573973616A6B72576D7055654756725331523556555A3361475A52567A4934637A6C4B4F487079516B4E79517A6379516A4E4B566D786B51584E5A5746777663545A69616B523051326848646B64434E6B395751324E4B574770755430786F54324E53626B31314D3035426255704E4D5763356230524555444930566D4A354D55394C627A63315547317261485275656B68706332567A53446C4852455A6A5843396B4D44464B6445527355325246617A68336355563053476431536E6C35623078425A6A46525A58426C596A4A3665576C6F4F45646A5654524A527A56756556685851306C34556E465A616D316C6144463056314E4A59564E6C646D39515A473135626C6C7055585A55596D78495A585A6A515752564E32387254554E344E6D394556576454623256735957704B536B31525658526C6331553564454E596247706C57437332527A6C704E444E6E566D7432576C567161307878535556455231557965464E6852305A35536973324E546B35516E6C584D45354661566C6F5430525152307035546A42425632453154327836596D7453547A4E455355686E5957393454564D7A5243737755565648556E52324F48467A626E6C54566E6C794D586876555739355547395654555674524767324E55564F65566C58616B74775A3052564F555670556C593557466C6F613078764E445933536E6C4F5132565462585A76636C5A4A51564E6B63484930625677765530315755456C344B307461545770474D475A4B56457868636B593559324A784D324E734D55466A566B39584F554A456233525261324E33626E466D5679745054325135566E4178635768305A7A52535A6D314A4D584E6E54544E3055304E6E57476C316232523651316C5455325A4D4D314A51626C426B55566C564E4759314F545A3251316B304D7A4251553368534E6E4248527A6474656D466B576B5A78553168714E4677764E585A7261444A33516E4A4462454A35644649794F455A4D4E334232513264454F46423357476854535570634C334A4F5444565154315172536D4A5663544A4D526C707963475131635868634C3052704E577451567A4E56513268756557704A516D45354E32686E6344526B634677766356687756467776646D6858636A6432546A684F546D30315556517263475A314D484A5758433951536D56796448564663566F335A314A4B4E5564765956567A4E6A4E445132646B5A4738325A304679576D6C4354484E6B626A56555A584E75516E4A61636B78524F4642434D3056434E6D316B5843396C656D566B576B70735232706D4B316C495457395452474D724F48525562576852633270485A3070455246566B617A466C5456527262303558535778594F45644F4E327058626D317361574633556D6C535843395265446C7A526C70685A48567362334579536B396B62484A72566C565753556878584338345A6B56526145457964576478515564446255316D5A315A4563566453536B564C526B5179526D5A58546C644D5444566A4E484A735130786B59553034626A6C344E6A525852314A4E593246315556526955554A48526D303155446C6165545A7551324A6D4F554E49566D5673564539595246493562575671646C526F553056305A5656564D33704E576D74524F46424F52576877626B315759303033576D70595648646B656D396E5A57564E523168634C3156534E7A4177526C68355346707463307045523145795A555A784F486455576B3530636A6C7A554846736557644451565269614539456232525A6158707161444A504F5668774F4852315257465A6132647252464A36654846444E6D4E4755464A3056444131635652515955777856445232547A644F576D6B7261466C5956465A6E5931426B564868364D4842615644686E646D78774D58464C57553161526E7031576E4A594D6E6C3257555670656A466C555578795756564D65476C49536E4E354B323168625442754E324A75516A4649595670515A4463314D33706161453958526A424B5A6D70684E5738336556704563326C634C303176576C4A69567A64685A6C4E6D4E3238786432684F54555578596D55325A7A4E595648685953487031596B347A646C4636547A6C5553324A74566B5A7A4F46426E4B3341305843394E65446C314D5852305A323578646B4A316356517253584E70516B644B4E54643564554E4354565A42593352564B30787956555A4B4D446433656C6C6D655752776147644A564556525130646F5331777663456C72554570515346527856485534626E703154556C6F5632396956476C7354566B32536B56315532786F4E565A725353745357485A4456555A74616D465156307877536B513055457061646E4A634C7A464256304E31626B6779593159315647517A53326C4A62474A42534735685354417851556F34626C5532563078494D6A51344D7A42535332707953326732576D4A715130786D52577842633034344E55744456324E434D334279624531634C31704E615656586555677A4D6A6430536E706A627A6C5762473431654535465A32395454444132545739704E6B6448516D466E654535764D467776646B5131616B493353317776616C6C73516C6834566D527952555A634C30565265566C504B307449516C6458626D38774F57387A615568365157314B6456466164464178576C59775331497752566C6855545A316432316E6547784D4E5667324D5870445A7A4E525A6C527A57545A564F55704E544749354E7A56575358644555477330636C6C324E7A6C6D65586C4255564E6E53575A484E7A42714B334531556B6471593356554D45684C4D7A424E4D6A56634C3164725531464D4D6E524D6346777664584A68644374494E56464B6456464C4B304E634C33517A556E4E7554585A6C565651314E445A784F5552524F564E6B5348464B4E4568434E486C5562314235576C465A634570434B7A5A695444424354334A31553251726279746A5957704A4F466C71616B6852617A4E484B7A6C3362456848554764756555354B525468695A6B4A32516C6F7751567776646B4A784D464A595758464B63566C6A58433952536E6C5262537331526A646C64576849656A426C5843396B5654684563474D34557A5A7654444A31615551795245357363473168613239355546684356326477564755324E546C79576D4A6155455A3562334E306248645059325A5252585A7052304E33505430694C434A7459574D694F69497A4D444E6B4E47566D4E7A59334E54566B5A6D59774D7A68684D6A5A6B59575A684D6D45774D3249784F4455304E6A51344D7A63784D5467304D5751334F4756684D474978597A686C4E47566A4D7A41344D44526B496E303D, 1440, 1540574654);
COMMIT;

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
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of sub_categories
-- ----------------------------
BEGIN;
INSERT INTO `sub_categories` VALUES (1, 'Logo Design', 1, NULL, NULL);
INSERT INTO `sub_categories` VALUES (2, 'Graphic Design', 1, NULL, NULL);
INSERT INTO `sub_categories` VALUES (3, '3D Design', 1, NULL, NULL);
INSERT INTO `sub_categories` VALUES (4, 'Animation', 1, NULL, NULL);
INSERT INTO `sub_categories` VALUES (5, 'Video', 1, NULL, NULL);
INSERT INTO `sub_categories` VALUES (6, 'Calligraphy', 1, NULL, NULL);
INSERT INTO `sub_categories` VALUES (7, 'Android Development', 2, NULL, NULL);
INSERT INTO `sub_categories` VALUES (8, 'IOS Development', 2, NULL, NULL);
INSERT INTO `sub_categories` VALUES (9, 'Web Development', 2, NULL, NULL);
INSERT INTO `sub_categories` VALUES (10, 'Desktop Development', 2, NULL, NULL);
INSERT INTO `sub_categories` VALUES (11, 'Database Development', 2, NULL, NULL);
INSERT INTO `sub_categories` VALUES (12, 'ERP Systems', 2, NULL, NULL);
COMMIT;

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
  PRIMARY KEY (`user_id`),
  UNIQUE KEY `username` (`username`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=104 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of users
-- ----------------------------
BEGIN;
INSERT INTO `users` VALUES (1, 'moharram82@hotmail.com', '$2y$10$Jjfsedb5gpJVXxw8Sck.0eLMlO.hX5nJhPuO9KuRSA4VlPVacEHdm', 'ROLE_ADMIN', 1, 0, 0, 1535752800, 0, 0, NULL, NULL, '2018-10-10 10:13:03', '2018-10-22 19:21:22');
INSERT INTO `users` VALUES (2, 'ali@yahoo.com', '$2y$10$JtFeD6WGpWf7hUqxl.FvNO4xJJFGpOvLx1XkvZR1PZ69Amh17iWtO', 'ROLE_FREELANCER', 1, 0, 0, 0, 0, 0, NULL, NULL, '2018-10-13 19:12:05', '2018-10-22 19:47:53');
INSERT INTO `users` VALUES (3, 'omer@gmail.com', '$2y$10$JtFeD6WGpWf7hUqxl.FvNO4xJJFGpOvLx1XkvZR1PZ69Amh17iWtO', 'ROLE_CUSTOMER', 1, 0, 0, 0, 0, 0, NULL, NULL, '2018-10-13 19:13:30', '2018-10-13 19:13:30');
INSERT INTO `users` VALUES (4, 'manal.bakri@yahoo.com', '$2y$10$EIeQJXqfkK3FqOl4HTGH2u50WEORrZsjxnMFYjTVFk2K02peA9Sqa', 'ROLE_FREELANCER', 1, 0, 0, 0, 0, 0, NULL, NULL, '2018-10-24 18:26:12', '2018-10-24 18:26:12');
INSERT INTO `users` VALUES (5, 'saydah34@gmail.com', '$2y$10$VsNTWusF9LUxqfDYKRLqf.U8bTtCqJHi1btY35jxyELgmdu2sbq5O', 'ROLE_CUSTOMER', 1, 0, 0, 0, 0, 0, NULL, NULL, '2018-10-24 18:26:12', '2018-10-24 18:26:12');
INSERT INTO `users` VALUES (6, 'vhani@ismael.info', '$2y$10$piLDmgLLf9ku9ZFPFhg0ge0PnSJ7mT3unVefblAYoDWAI9j/OrYcm', 'ROLE_FREELANCER', 1, 0, 0, 0, 0, 0, NULL, NULL, '2018-10-24 18:26:12', '2018-10-24 18:26:12');
INSERT INTO `users` VALUES (7, 'xwael@mozamil.info', '$2y$10$LGWbuvmjKvHRZwHtQ6ecA.30GXOVsuGHfv.Dy6xhUSKzUGX68q6fS', 'ROLE_CUSTOMER', 1, 0, 0, 0, 0, 0, NULL, NULL, '2018-10-24 18:26:12', '2018-10-24 18:26:12');
INSERT INTO `users` VALUES (8, 'jalal.ameerah@yahoo.com', '$2y$10$sMXPCZaqyQCHbyafguVZAeo.rNN39zhnY86s0sRWvBaf29fWk5Sh2', 'ROLE_CUSTOMER', 1, 0, 0, 0, 0, 0, NULL, NULL, '2018-10-24 18:26:12', '2018-10-24 18:26:12');
INSERT INTO `users` VALUES (9, 'tamadur49@gmail.com', '$2y$10$uVjCoQoYzPGsbXtEem.S8eBW2S3w8IQaTomLMDFsHYhG1.aaydGwG', 'ROLE_CUSTOMER', 1, 0, 0, 0, 0, 0, NULL, NULL, '2018-10-24 18:26:12', '2018-10-24 18:26:12');
INSERT INTO `users` VALUES (10, 'ragheb.fareed@hotmail.com', '$2y$10$53Hj3bCLGuH6Qs14/e9CC.U7DJoz9.PYS4ebVJDjg8c85BMvfVwN.', 'ROLE_CUSTOMER', 1, 0, 0, 0, 0, 0, NULL, NULL, '2018-10-24 18:26:12', '2018-10-24 18:26:12');
INSERT INTO `users` VALUES (11, 'salama.basel@gmail.com', '$2y$10$wSBG3B/XKrc2K1AEcnPV3en5J1iLdgtVUklMAPaYbgGiMC/fUXEUK', 'ROLE_FREELANCER', 1, 0, 0, 0, 0, 0, NULL, NULL, '2018-10-24 18:26:13', '2018-10-24 18:26:13');
INSERT INTO `users` VALUES (12, 'raheem.haitham@yahoo.com', '$2y$10$SBa8N8496KzWFMx6yElFXO9B9wir5FQXTJO4wq/iDKccy4rc1WaEG', 'ROLE_FREELANCER', 1, 0, 0, 0, 0, 0, NULL, NULL, '2018-10-24 18:26:13', '2018-10-24 18:26:13');
INSERT INTO `users` VALUES (13, 'raheem.sami@gmail.com', '$2y$10$OtfQ8LdeHPk4NC.JgiWcDO1/uMZ410RxRkcMRSSU9aNKBCTpCX90y', 'ROLE_FREELANCER', 1, 0, 0, 0, 0, 0, NULL, NULL, '2018-10-24 18:26:13', '2018-10-24 18:26:13');
INSERT INTO `users` VALUES (14, 'abdulmajeed.raheem@gmail.com', '$2y$10$S33z5plTRfhyYthS6wqROujdSDjr.ESB6Pg2L5BZtY9/BedWGoCC2', 'ROLE_CUSTOMER', 1, 0, 0, 0, 0, 0, NULL, NULL, '2018-10-24 18:26:13', '2018-10-24 18:26:13');
INSERT INTO `users` VALUES (15, 'nona.fuad@fareed.com', '$2y$10$N4CEE3Xq/r2VOdxOJAx3pO/ubKg4dpP/cUOgzMDOORf3BtdLQd7Vu', 'ROLE_CUSTOMER', 1, 0, 0, 0, 0, 0, NULL, NULL, '2018-10-24 18:26:13', '2018-10-24 18:26:13');
INSERT INTO `users` VALUES (16, 'salman.jamaal@haitham.biz', '$2y$10$clDW21fOIYDnq.PDOw.a9OY0Zx0ykomGJa2qcY7E88BZpmVRgmKCm', 'ROLE_CUSTOMER', 1, 0, 0, 0, 0, 0, NULL, NULL, '2018-10-24 18:26:13', '2018-10-24 18:26:13');
INSERT INTO `users` VALUES (17, 'vfadel@gmail.com', '$2y$10$HRw3SsD3P2uDtAZtOmtOs.k9ycNreF/AqXoWa8Qaag6mQx2S01D/G', 'ROLE_FREELANCER', 1, 0, 0, 0, 0, 0, NULL, NULL, '2018-10-24 18:26:13', '2018-10-24 18:26:13');
INSERT INTO `users` VALUES (18, 'rammah51@hotmail.com', '$2y$10$GtPR/zsiXnYtgAaVAbzjxeQWcHEU0btvlhzZ5JQQI2/lQhTgUJdO6', 'ROLE_FREELANCER', 1, 0, 0, 0, 0, 0, NULL, NULL, '2018-10-24 18:26:13', '2018-10-24 18:26:13');
INSERT INTO `users` VALUES (19, 'modather.jalal@yahoo.com', '$2y$10$5wOOAeZkDTqjXz4.XaRq/.x54m5HMUgmqWYkxs0TuPlSAwd1IPT1C', 'ROLE_FREELANCER', 1, 0, 0, 0, 0, 0, NULL, NULL, '2018-10-24 18:26:13', '2018-10-24 18:26:13');
INSERT INTO `users` VALUES (20, 'hilal.modather@hotmail.com', '$2y$10$Zu1B.5MrOyjlBDZnx85p1uxCNqQO5Xss7UoUj4RcP63Ua9c3xcwiq', 'ROLE_CUSTOMER', 1, 0, 0, 0, 0, 0, NULL, NULL, '2018-10-24 18:26:13', '2018-10-24 18:26:13');
INSERT INTO `users` VALUES (21, 'hannah.jomaa@salman.com', '$2y$10$reyiKvPOKOKxmbmwWh9B9OE5Kd4vr.TouPbeXua/8AHxhheUCpXXC', 'ROLE_CUSTOMER', 1, 0, 0, 0, 0, 0, NULL, NULL, '2018-10-24 18:26:13', '2018-10-24 18:26:13');
INSERT INTO `users` VALUES (22, 'rammah.abdulsamad@essa.com', '$2y$10$RH0OwzlKkcsU89ehyk/rZOkaQL/hPrYTmSZprcfahOa9RfKe6FF8a', 'ROLE_FREELANCER', 1, 0, 0, 0, 0, 0, NULL, NULL, '2018-10-24 18:26:13', '2018-10-24 18:26:13');
INSERT INTO `users` VALUES (23, 'jihad65@gmail.com', '$2y$10$eXUgQIbWEmvTTDFKn12rYuZyehOTcmRldBEk08kXhf3l9sa8Y/t3.', 'ROLE_FREELANCER', 1, 0, 0, 0, 0, 0, NULL, NULL, '2018-10-24 18:26:13', '2018-10-24 18:26:13');
INSERT INTO `users` VALUES (24, 'asma.mahmoud@fahad.com', '$2y$10$3hjM7NqCiJ/cj4b2fd3uMOmkn1sq/avIZbSCZgviiOFSfVdp65fSO', 'ROLE_CUSTOMER', 1, 0, 0, 0, 0, 0, NULL, NULL, '2018-10-24 18:26:13', '2018-10-24 18:26:13');
INSERT INTO `users` VALUES (25, 'laylah78@gmail.com', '$2y$10$VMaKMMIZSwcLU6Vdl/GQseeyHW5D2SIcxRJTBCSEb5Sqa4yELtP7G', 'ROLE_FREELANCER', 1, 0, 0, 0, 0, 0, NULL, NULL, '2018-10-24 18:26:13', '2018-10-24 18:26:13');
INSERT INTO `users` VALUES (26, 'ljibreel@mahmoud.com', '$2y$10$DHewZE4wSzf/wLh0oI3kZeHl/Mhl1UZ1Jm.dVAxJTCoBtH7fQ/b.u', 'ROLE_CUSTOMER', 1, 0, 0, 0, 0, 0, NULL, NULL, '2018-10-24 18:26:14', '2018-10-24 18:26:14');
INSERT INTO `users` VALUES (27, 'omer.fadl@hotmail.com', '$2y$10$pKFBNxAiNvm7tfhtXfyImOUyOtN5B6AiTRyzxcHG9iZLsm.xTjv9m', 'ROLE_FREELANCER', 1, 0, 0, 0, 0, 0, NULL, NULL, '2018-10-24 18:26:14', '2018-10-24 18:26:14');
INSERT INTO `users` VALUES (28, 'hassan.nazar@gmail.com', '$2y$10$Y2ABJsNx2DxJLloh2mWrHuI2W1LWF7USu.YkYPGS8IjFBIkcaSVSi', 'ROLE_FREELANCER', 1, 0, 0, 0, 0, 0, NULL, NULL, '2018-10-24 18:26:14', '2018-10-24 18:26:14');
INSERT INTO `users` VALUES (29, 'jomaa.ekhlas@hotmail.com', '$2y$10$hSUNp16sWMaWHOOQ.xf3OOsL8Mxpbx0UMdrvXsFIvR3RmmqkRCWJC', 'ROLE_CUSTOMER', 1, 0, 0, 0, 0, 0, NULL, NULL, '2018-10-24 18:26:14', '2018-10-24 18:26:14');
INSERT INTO `users` VALUES (30, 'musa.noah@yahoo.com', '$2y$10$t0mAXVEbgxRhR7rlRLscUuc09ZezR9cE5N5vfLTJPPmpGt7q4xJRW', 'ROLE_CUSTOMER', 1, 0, 0, 0, 0, 0, NULL, NULL, '2018-10-24 18:26:14', '2018-10-24 18:26:14');
INSERT INTO `users` VALUES (31, 'ibrahim.ramadan@waleed.com', '$2y$10$n8v3ZCXV1RulKX8XEwDXB.sCGlAEGQ.ikDu8cQWmoBJeGvgwrX2VK', 'ROLE_CUSTOMER', 1, 0, 0, 0, 0, 0, NULL, NULL, '2018-10-24 18:26:14', '2018-10-24 18:26:14');
INSERT INTO `users` VALUES (32, 'zahrah34@abdurrahman.biz', '$2y$10$QkbetDDOTS/qe8rfat2lGuE6.g7jhsLaY0doFfWguQ/RVcGeEfY2u', 'ROLE_CUSTOMER', 1, 0, 0, 0, 0, 0, NULL, NULL, '2018-10-24 18:26:14', '2018-10-24 18:26:14');
INSERT INTO `users` VALUES (33, 'osman67@moharram.net', '$2y$10$CMmKoKphbPZ0xiYkKS6/I.xBbmUMWblNr5UTlD0yVlvKzUkbg1/rG', 'ROLE_FREELANCER', 1, 0, 0, 0, 0, 0, NULL, NULL, '2018-10-24 18:26:14', '2018-10-24 18:26:14');
INSERT INTO `users` VALUES (34, 'ameen.abdulaziz@yahoo.com', '$2y$10$Z.IewHCFDps.DY.s3wkUJ.Bkcm9xW2WUq7R/1qDEMDcFSz3TGe4/C', 'ROLE_CUSTOMER', 1, 0, 0, 0, 0, 0, NULL, NULL, '2018-10-24 18:26:14', '2018-10-24 18:26:14');
INSERT INTO `users` VALUES (35, 'nada.basel@sami.org', '$2y$10$6dReuatKzpUI1qkrofigxOAn9qe2SBmEwxhizKH8zW88pBxXJVN/S', 'ROLE_CUSTOMER', 1, 0, 0, 0, 0, 0, NULL, NULL, '2018-10-24 18:26:14', '2018-10-24 18:26:14');
INSERT INTO `users` VALUES (36, 'imusa@hotmail.com', '$2y$10$5fmvXkMSJCCv8TBltMXDGOZsBjn75WsfERpRoRIdbzG/q57tlIhw6', 'ROLE_CUSTOMER', 1, 0, 0, 0, 0, 0, NULL, NULL, '2018-10-24 18:26:14', '2018-10-24 18:26:14');
INSERT INTO `users` VALUES (37, 'mozun.kamal@yahoo.com', '$2y$10$BjGoBobzsPkqkYBVaYjZX.sT1tBAY2/VAwF8dmq8lkGtXW/YAraje', 'ROLE_FREELANCER', 1, 0, 0, 0, 0, 0, NULL, NULL, '2018-10-24 18:26:14', '2018-10-24 18:26:14');
INSERT INTO `users` VALUES (38, 'zeinab14@hotmail.com', '$2y$10$tLhSIJqt5T59ruBrYBT2Ge8CMLoda/20lHBnBBW8SUGoz7/N/tyvK', 'ROLE_FREELANCER', 1, 0, 0, 0, 0, 0, NULL, NULL, '2018-10-24 18:26:14', '2018-10-24 18:26:14');
INSERT INTO `users` VALUES (39, 'tissac@gmail.com', '$2y$10$wRNjOZjlLWenxcnoBhQLNuN0YE2dlyz2yEu9pwKqZ1q4OSQonf..a', 'ROLE_CUSTOMER', 1, 0, 0, 0, 0, 0, NULL, NULL, '2018-10-24 18:26:14', '2018-10-24 18:26:14');
INSERT INTO `users` VALUES (40, 'gasem.nada@hotmail.com', '$2y$10$3X0w04.UJASFba4S88VXh.ijhVfvrgk0U/gz8JEuTuvfto0oypQC6', 'ROLE_CUSTOMER', 1, 0, 0, 0, 0, 0, NULL, NULL, '2018-10-24 18:26:14', '2018-10-24 18:26:14');
INSERT INTO `users` VALUES (41, 'doaa.rammah@omer.com', '$2y$10$jn.GoZ0Lv15BvViSDWtJVO2iz/EiVRV.YLR7iGZblmeYaM0XW0feO', 'ROLE_CUSTOMER', 1, 0, 0, 0, 0, 0, NULL, NULL, '2018-10-24 18:26:15', '2018-10-24 18:26:15');
INSERT INTO `users` VALUES (42, 'snabeel@loai.net', '$2y$10$.TnU3TQwpDtQ7BKeT9lO1egiz6/K2YQi0HfPVvNetw1nm5e2Y.k76', 'ROLE_CUSTOMER', 1, 0, 0, 0, 0, 0, NULL, NULL, '2018-10-24 18:26:15', '2018-10-24 18:26:15');
INSERT INTO `users` VALUES (43, 'faisal.mayyadah@ragheb.net', '$2y$10$TYLAJPqUU7peiyyI.izZVeMMbrG/IKFhLPFvo7kUHUVy8GO89rJSS', 'ROLE_FREELANCER', 1, 0, 0, 0, 0, 0, NULL, NULL, '2018-10-24 18:26:15', '2018-10-24 18:26:15');
INSERT INTO `users` VALUES (44, 'essa41@kamel.info', '$2y$10$Cps.1TpyX7h67TVCieFlSuaJSj39uhQerdQK2cGzH7ujFxjRKxeGW', 'ROLE_CUSTOMER', 1, 0, 0, 0, 0, 0, NULL, NULL, '2018-10-24 18:26:15', '2018-10-24 18:26:15');
INSERT INTO `users` VALUES (45, 'obey.modather@hotmail.com', '$2y$10$OJRjxq5FR4kqGYm3PB5QxO.db7MFXmGgapHttoS0Qzg0p9p7Q3Mme', 'ROLE_CUSTOMER', 1, 0, 0, 0, 0, 0, NULL, NULL, '2018-10-24 18:26:15', '2018-10-24 18:26:15');
INSERT INTO `users` VALUES (46, 'ahmed.kamal@yahoo.com', '$2y$10$Bpw3ce3jgkvWlI7eOs4HWuDohzVnSXE7DXnGwJ8TA5k/d7rmMSPMm', 'ROLE_CUSTOMER', 1, 0, 0, 0, 0, 0, NULL, NULL, '2018-10-24 18:26:15', '2018-10-24 18:26:15');
INSERT INTO `users` VALUES (47, 'tilal36@yahoo.com', '$2y$10$8bxzGytRZ2JussSmG4HF4.el1mrHD4.hhcfjWQkf0aFKm9VP15mqC', 'ROLE_CUSTOMER', 1, 0, 0, 0, 0, 0, NULL, NULL, '2018-10-24 18:26:15', '2018-10-24 18:26:15');
INSERT INTO `users` VALUES (48, 'dorrah48@yahoo.com', '$2y$10$gyTL5HwG.P/xtmPmdP0rReRrqVihcaawNYKL/Kru8xqpOYGBRpH22', 'ROLE_CUSTOMER', 1, 0, 0, 0, 0, 0, NULL, NULL, '2018-10-24 18:26:15', '2018-10-24 18:26:15');
INSERT INTO `users` VALUES (49, 'faizah28@rami.com', '$2y$10$CNORiKS63qoHJWic7QqPaOmPoq19FH5i/MYL61LUrFjVSNWeFaCqO', 'ROLE_FREELANCER', 1, 0, 0, 0, 0, 0, NULL, NULL, '2018-10-24 18:26:15', '2018-10-24 18:26:15');
INSERT INTO `users` VALUES (50, 'badi79@yahoo.com', '$2y$10$d.b4H6sdMvTzBk1gul/4culdXvVMxlQsFgFPv2WT1ANzHe6fEInMW', 'ROLE_FREELANCER', 1, 0, 0, 0, 0, 0, NULL, NULL, '2018-10-24 18:26:15', '2018-10-24 18:26:15');
INSERT INTO `users` VALUES (51, 'modather45@jibreel.info', '$2y$10$3m63sPIqYN6dwPGBv.nwmOilGB1M4apz/FO7O25c/6GxRzl4ppOni', 'ROLE_FREELANCER', 1, 0, 0, 0, 0, 0, NULL, NULL, '2018-10-24 18:26:15', '2018-10-24 18:26:15');
INSERT INTO `users` VALUES (52, 'sally56@jomaa.com', '$2y$10$Kp6.jbGF5gr53aYtT3D4A.OmeOjVJGwEZomsq/AMY9OD3yoZRF7Rq', 'ROLE_FREELANCER', 1, 0, 0, 0, 0, 0, NULL, NULL, '2018-10-24 18:26:15', '2018-10-24 18:26:15');
INSERT INTO `users` VALUES (53, 'lenah.basel@husain.net', '$2y$10$bWorQUglQ4JeVhIzOhTOtePSi.E30voRvhM90bJFtokKsC95McZ8S', 'ROLE_CUSTOMER', 1, 0, 0, 0, 0, 0, NULL, NULL, '2018-10-24 18:26:15', '2018-10-24 18:26:15');
INSERT INTO `users` VALUES (54, 'mmozamil@jamaal.com', '$2y$10$LlKAmYfNfD4HqknBaDmRLOLWAjV5xGl7QW2B9rhgklv.485i47WDK', 'ROLE_CUSTOMER', 1, 0, 0, 0, 0, 0, NULL, NULL, '2018-10-24 18:26:15', '2018-10-24 18:26:15');
INSERT INTO `users` VALUES (55, 'jalal.zakaria@gmail.com', '$2y$10$PXESzY59TALfhwtf13JnFOFIzDdfs3kMLKjyaACa0NVOmENnM5DMW', 'ROLE_FREELANCER', 1, 0, 0, 0, 0, 0, NULL, NULL, '2018-10-24 18:26:15', '2018-10-24 18:26:15');
INSERT INTO `users` VALUES (56, 'abdulmajeed.noon@bilal.com', '$2y$10$auL1NLcVQACCAM56t9bAI.EA4/cIpi08YNM6oQkKeclgB1GtceEWu', 'ROLE_CUSTOMER', 1, 0, 0, 0, 0, 0, NULL, NULL, '2018-10-24 18:26:15', '2018-10-24 18:26:15');
INSERT INTO `users` VALUES (57, 'nazem.tamer@hotmail.com', '$2y$10$9uK4u0ekJTtghgrQFlkI/.ENuP2ABEyho.KrZ8m1.3fU86QUYWmxu', 'ROLE_FREELANCER', 1, 0, 0, 0, 0, 0, NULL, NULL, '2018-10-24 18:26:16', '2018-10-24 18:26:16');
INSERT INTO `users` VALUES (58, 'hilal.ismael@gmail.com', '$2y$10$7BRpcbW2IZXlff.uguRvmOooGIgpUdgiMvDXC9S9l2mgtbRJoD.fe', 'ROLE_CUSTOMER', 1, 0, 0, 0, 0, 0, NULL, NULL, '2018-10-24 18:26:16', '2018-10-24 18:26:16');
INSERT INTO `users` VALUES (59, 'ramadan.dalia@hotmail.com', '$2y$10$dlAaijVn7vCiAEvAu3FrrurEnd.q2o4h.KY65DGTgTKL28lexo6Nm', 'ROLE_CUSTOMER', 1, 0, 0, 0, 0, 0, NULL, NULL, '2018-10-24 18:26:16', '2018-10-24 18:26:16');
INSERT INTO `users` VALUES (60, 'fahad81@hotmail.com', '$2y$10$NZOmI1o1p6QMz.uqRbiJU..Opku/jjx1y1Z5XoY5a8./5RYwfLkmC', 'ROLE_CUSTOMER', 1, 0, 0, 0, 0, 0, NULL, NULL, '2018-10-24 18:26:16', '2018-10-24 18:26:16');
INSERT INTO `users` VALUES (61, 'modather99@kamel.org', '$2y$10$szSDIYPN8i0srowGnANMV.b0mi4Ydn0/SDY5pH2D/SNdMoV6nya6K', 'ROLE_FREELANCER', 1, 0, 0, 0, 0, 0, NULL, NULL, '2018-10-24 18:26:16', '2018-10-24 18:26:16');
INSERT INTO `users` VALUES (62, 'zakaria.nader@hani.biz', '$2y$10$XGe4ChQJQtDtT/P29aUOC.V2CbJl5V7vRvZdf0521OLOcNzYXFPKS', 'ROLE_CUSTOMER', 1, 0, 0, 0, 0, 0, NULL, NULL, '2018-10-24 18:26:16', '2018-10-24 18:26:16');
INSERT INTO `users` VALUES (63, 'vmodather@sami.info', '$2y$10$jVv8j003k58l0dgttmIku.8j3nro88WZhYGCzMyYuuPMi5VkTsx.O', 'ROLE_CUSTOMER', 1, 0, 0, 0, 0, 0, NULL, NULL, '2018-10-24 18:26:16', '2018-10-24 18:26:16');
INSERT INTO `users` VALUES (64, 'anwar.waleed@gmail.com', '$2y$10$7UpcsOPuXbNP3IEBws/YRuaOYhR9/VQ0ASI6z0aSUYbOKbeYA2Q0K', 'ROLE_FREELANCER', 1, 0, 0, 0, 0, 0, NULL, NULL, '2018-10-24 18:26:16', '2018-10-24 18:26:16');
INSERT INTO `users` VALUES (65, 'cessa@gmail.com', '$2y$10$GDR9o02jng7IuHMkCif3Jer3oZEpz.1p3bNiCoWLvVQLRtdN.wulm', 'ROLE_CUSTOMER', 1, 0, 0, 0, 0, 0, NULL, NULL, '2018-10-24 18:26:16', '2018-10-24 18:26:16');
INSERT INTO `users` VALUES (66, 'akamel@ragheb.org', '$2y$10$tTslw3AkG3JMz7QUTJ9ZTOyWtcbz4lfv1ZZnrifYSnU28BodR4dDa', 'ROLE_FREELANCER', 1, 0, 0, 0, 0, 0, NULL, NULL, '2018-10-24 18:26:16', '2018-10-24 18:26:16');
INSERT INTO `users` VALUES (67, 'gtawfeeq@gmail.com', '$2y$10$0FIUC9aQmzFYhe7mtV8qDuGjgMcebNGr.z87aS76MCXPR.AljqWTm', 'ROLE_FREELANCER', 1, 0, 0, 0, 0, 0, NULL, NULL, '2018-10-24 18:26:16', '2018-10-24 18:26:16');
INSERT INTO `users` VALUES (68, 'razaz.mohsen@gmail.com', '$2y$10$FIMozX2kgTY5GBlYn3gNCO7z3FtMjNQX5H4nHrTLD.JDARypm/hZW', 'ROLE_FREELANCER', 1, 0, 0, 0, 0, 0, NULL, NULL, '2018-10-24 18:26:16', '2018-10-24 18:26:16');
INSERT INTO `users` VALUES (69, 'cbilal@obey.com', '$2y$10$k1V8zxDt3XUmFFim96IBw.enQ756NSPPdyXtr7FKcFlWwcDJ6km3.', 'ROLE_CUSTOMER', 1, 0, 0, 0, 0, 0, NULL, NULL, '2018-10-24 18:26:16', '2018-10-24 18:26:16');
INSERT INTO `users` VALUES (70, 'gomer@hotmail.com', '$2y$10$JcpK4EPMGKzgOQ1SjFnSheg5GfZCuBqlCrMuT7f.bXj2rpEwNtd9m', 'ROLE_FREELANCER', 1, 0, 0, 0, 0, 0, NULL, NULL, '2018-10-24 18:26:16', '2018-10-24 18:26:16');
INSERT INTO `users` VALUES (71, 'mozamil06@tamer.com', '$2y$10$CLDXZEM4UlNxlmeavq9Due1H.dS6xngA70HO1isChjxTx6vfzF5cW', 'ROLE_FREELANCER', 1, 0, 0, 0, 0, 0, NULL, NULL, '2018-10-24 18:26:16', '2018-10-24 18:26:16');
INSERT INTO `users` VALUES (72, 'tawfeeq01@hani.org', '$2y$10$cOjBHBJJMfVYEu4Q7xM.gOWeKVYVj28nAz8sBFxJdnEHKWS1CGrQy', 'ROLE_CUSTOMER', 1, 0, 0, 0, 0, 0, NULL, NULL, '2018-10-24 18:26:17', '2018-10-24 18:26:17');
INSERT INTO `users` VALUES (73, 'daleel.omer@yahoo.com', '$2y$10$l/NeIznupGcLxq3K6eSjGOISAf8S9jilRUrXPlfEsKW1D1ImXBNmC', 'ROLE_CUSTOMER', 1, 0, 0, 0, 0, 0, NULL, NULL, '2018-10-24 18:26:17', '2018-10-24 18:26:17');
INSERT INTO `users` VALUES (74, 'wafaa16@obey.com', '$2y$10$OA2r1ZTbTj0TRec9Y5rEt.8yfmIBb06RV7bSPCGzHRK7wtZhBkWXO', 'ROLE_CUSTOMER', 1, 0, 0, 0, 0, 0, NULL, NULL, '2018-10-24 18:26:17', '2018-10-24 18:26:17');
INSERT INTO `users` VALUES (75, 'jkamal@haag.com', '$2y$10$fIBhIByTOqLX.o9Dw.WkselX.h/87k2Fd/up3J.KkO9c8nTlS4ue2', 'ROLE_CUSTOMER', 1, 0, 0, 0, 0, 0, NULL, NULL, '2018-10-24 18:26:17', '2018-10-24 18:26:17');
INSERT INTO `users` VALUES (76, 'intesar42@hotmail.com', '$2y$10$D9EdrSLw9m9DWTMKPf7QYe4FcJ1gup6fL0IJkq775Aks7yEnae6vC', 'ROLE_CUSTOMER', 1, 0, 0, 0, 0, 0, NULL, NULL, '2018-10-24 18:26:17', '2018-10-24 18:26:17');
INSERT INTO `users` VALUES (77, 'wael53@yahoo.com', '$2y$10$bFZdwVfm2u8a7.SQHuOEle7peZQl6pT1Jo8dLTYhFNTbZu12sPcLC', 'ROLE_FREELANCER', 1, 0, 0, 0, 0, 0, NULL, NULL, '2018-10-24 18:26:17', '2018-10-24 18:26:17');
INSERT INTO `users` VALUES (78, 'csalman@bilal.com', '$2y$10$sXa3gQT.EX6WxOKo0oVgF.KPSgqMVGHAD00YBqMIwR1bqhwXT2zH.', 'ROLE_CUSTOMER', 1, 0, 0, 0, 0, 0, NULL, NULL, '2018-10-24 18:26:17', '2018-10-24 18:26:17');
INSERT INTO `users` VALUES (79, 'haitham.moharram@yahoo.com', '$2y$10$Lb1thd4r.uVnW1LP5NCTS.dRHx1pOHIpK/0DSE16R5ooZwk02RAHS', 'ROLE_FREELANCER', 1, 0, 0, 0, 0, 0, NULL, NULL, '2018-10-24 18:26:17', '2018-10-24 18:26:17');
INSERT INTO `users` VALUES (80, 'yhusain@gmail.com', '$2y$10$8YNE64fCwT8gw7W24/qg9O0sK6AMD6F5hWSY.8OKnOMifbiAZPyy2', 'ROLE_CUSTOMER', 1, 0, 0, 0, 0, 0, NULL, NULL, '2018-10-24 18:26:17', '2018-10-24 18:26:17');
INSERT INTO `users` VALUES (81, 'abdulaziz33@yahoo.com', '$2y$10$fZSSt01s/M9aKJ4c1X.6oO/5X6XLTF7aNS0zWSGF7l2V2cHiGojm.', 'ROLE_FREELANCER', 1, 0, 0, 0, 0, 0, NULL, NULL, '2018-10-24 18:26:17', '2018-10-24 18:26:17');
INSERT INTO `users` VALUES (82, 'aidah73@ali.com', '$2y$10$yDxcYH4TUNp/YVHRclqRi.nyjJzIrDucGGrIf01UcJUD50zBlQ.1y', 'ROLE_FREELANCER', 1, 0, 0, 0, 0, 0, NULL, NULL, '2018-10-24 18:26:17', '2018-10-24 18:26:17');
INSERT INTO `users` VALUES (83, 'nasir59@yahoo.com', '$2y$10$BnwWNBRYswq6X2xDa944RuyW1G76mBtLK36zQ7WCH.8LeQ8oiv7DK', 'ROLE_FREELANCER', 1, 0, 0, 0, 0, 0, NULL, NULL, '2018-10-24 18:26:17', '2018-10-24 18:26:17');
INSERT INTO `users` VALUES (84, 'pfuad@tamer.biz', '$2y$10$P3ED1Bo9T7yQk3eUNyl/kOrYdeQnVLkgfefyGkMzJioaDTrPE2w4a', 'ROLE_FREELANCER', 1, 0, 0, 0, 0, 0, NULL, NULL, '2018-10-24 18:26:17', '2018-10-24 18:26:17');
INSERT INTO `users` VALUES (85, 'ekhlas.fuad@yahoo.com', '$2y$10$kKUSEz7aB5zhTfpPfi/In.FQCbEthFGJshcWDD.6ln1gtSoXTtt.S', 'ROLE_FREELANCER', 1, 0, 0, 0, 0, 0, NULL, NULL, '2018-10-24 18:26:17', '2018-10-24 18:26:17');
INSERT INTO `users` VALUES (86, 'bassam.dodi@dawood.com', '$2y$10$IuDHRTHssSv45X0rHw0ho.lXGfB1ZdLfVaTWVagnTCaix7IvIwzZq', 'ROLE_CUSTOMER', 1, 0, 0, 0, 0, 0, NULL, NULL, '2018-10-24 18:26:17', '2018-10-24 18:26:17');
INSERT INTO `users` VALUES (87, 'xfahad@hotmail.com', '$2y$10$PVOCQGD8jjaM7yPt8q4pcu25h36KD5zISA2TfDP5TcK6iWVQwmxMC', 'ROLE_FREELANCER', 1, 0, 0, 0, 0, 0, NULL, NULL, '2018-10-24 18:26:17', '2018-10-24 18:26:17');
INSERT INTO `users` VALUES (88, 'yousef.mayyadah@jibreel.com', '$2y$10$uknLTNJShVpgNy2W.ZbxJu68UFf9tU36oj062VKcDyCFJgRIs2Mq2', 'ROLE_CUSTOMER', 1, 0, 0, 0, 0, 0, NULL, NULL, '2018-10-24 18:26:18', '2018-10-24 18:26:18');
INSERT INTO `users` VALUES (89, 'waleed.lemyaa@raheem.biz', '$2y$10$qfvZaPx34X9uXGlQJwko4uSScTbDWkbNr83zz5zgMLzuiYFaIwvEy', 'ROLE_CUSTOMER', 1, 0, 0, 0, 0, 0, NULL, NULL, '2018-10-24 18:26:18', '2018-10-24 18:26:18');
INSERT INTO `users` VALUES (90, 'hani.fahad@fahad.biz', '$2y$10$lYBZCmt3Vc2Dfw4xmbORKeIh.Z0kxEi.FWs4ss0JnVJJi7m9gQDXu', 'ROLE_CUSTOMER', 1, 0, 0, 0, 0, 0, NULL, NULL, '2018-10-24 18:26:18', '2018-10-24 18:26:18');
INSERT INTO `users` VALUES (91, 'wrasikh@emad.com', '$2y$10$xTJrC37yf7qxTeJFj2Cnyef5UBZOlv7XtzVthCuu9ZFs9rl2tD4V6', 'ROLE_FREELANCER', 1, 0, 0, 0, 0, 0, NULL, NULL, '2018-10-24 18:26:18', '2018-10-24 18:26:18');
INSERT INTO `users` VALUES (92, 'kzakaria@rami.net', '$2y$10$1SF18ubdbAfA4u7pqhGrruk94iP9L1lqO/AiR0zP5qIXWqVnxAyV.', 'ROLE_FREELANCER', 1, 0, 0, 0, 0, 0, NULL, NULL, '2018-10-24 18:26:18', '2018-10-24 18:26:18');
INSERT INTO `users` VALUES (93, 'malaz.emad@hotmail.com', '$2y$10$Dd0FL391FDyRZmDRdULHw.g0pn/b87wRURYKK99dvSVZ6l.z18f06', 'ROLE_FREELANCER', 1, 0, 0, 0, 0, 0, NULL, NULL, '2018-10-24 18:26:18', '2018-10-24 18:26:18');
INSERT INTO `users` VALUES (94, 'wael.nadia@gmail.com', '$2y$10$ZHNRMQkF08T3LM8JlI9WfuaXwVcY88/ObnSLkA5djjsxGxLs20EuO', 'ROLE_CUSTOMER', 1, 0, 0, 0, 0, 0, NULL, NULL, '2018-10-24 18:26:18', '2018-10-24 18:26:18');
INSERT INTO `users` VALUES (95, 'dbassam@hilal.com', '$2y$10$W0kh0BkQGSYTlCbnbzUZruq1gFiI6ZULZsTwEFwA1Kx5ot6YGQGWy', 'ROLE_FREELANCER', 1, 0, 0, 0, 0, 0, NULL, NULL, '2018-10-24 18:26:18', '2018-10-24 18:26:18');
INSERT INTO `users` VALUES (96, 'alaa55@kamel.info', '$2y$10$xgeSiDu9jHxPJsCr/TN7cu84wYrs6sIPKCVfucyNgZp3ufJ.cpduO', 'ROLE_CUSTOMER', 1, 0, 0, 0, 0, 0, NULL, NULL, '2018-10-24 18:26:18', '2018-10-24 18:26:18');
INSERT INTO `users` VALUES (97, 'jawaher.badi@sameer.com', '$2y$10$vS63c2LcbYdugwrSBJ4wa.5PXjgrfXLvkaNHSNaOqWCcdrGK4elFW', 'ROLE_FREELANCER', 1, 0, 0, 0, 0, 0, NULL, NULL, '2018-10-24 18:26:18', '2018-10-24 18:26:18');
INSERT INTO `users` VALUES (98, 'gasem.ayah@gmail.com', '$2y$10$Gxi0okLwJDvxl4XNm2bXMuBhk..8zy/zBzHUor/I5USIwqg9Pp.9m', 'ROLE_CUSTOMER', 1, 0, 0, 0, 0, 0, NULL, NULL, '2018-10-24 18:26:18', '2018-10-24 18:26:18');
INSERT INTO `users` VALUES (99, 'nafesah75@hotmail.com', '$2y$10$KaMnrpf4YyW5Fk7WAg3JCe9gK47sI.a6MqvuAchaCqLU1Xnwr//MW', 'ROLE_CUSTOMER', 1, 0, 0, 0, 0, 0, NULL, NULL, '2018-10-24 18:26:18', '2018-10-24 18:26:18');
INSERT INTO `users` VALUES (100, 'nbasel@abdulasamad.org', '$2y$10$v4104coYhSL8hwsbUSS9eOpUSeFa2oJ9WqHAxjSf/pPCPW6h0PWfa', 'ROLE_CUSTOMER', 1, 0, 0, 0, 0, 0, NULL, NULL, '2018-10-24 18:26:18', '2018-10-24 18:26:18');
INSERT INTO `users` VALUES (101, 'raheem.zakaria@bassam.com', '$2y$10$DSdRq2FY09qfl6EzLLhmjepXPXvNCeZE5gjQGvQyKFNrbgkFPqr3y', 'ROLE_CUSTOMER', 1, 0, 0, 0, 0, 0, NULL, NULL, '2018-10-24 18:26:18', '2018-10-24 18:26:18');
INSERT INTO `users` VALUES (102, 'mragheb@abdulaziz.com', '$2y$10$rMvYZ.GvjAeDtyWlHK.2EuAPCOC/z95iP.XnFzSgMbU4koj1Vhus.', 'ROLE_CUSTOMER', 1, 0, 0, 0, 0, 0, NULL, NULL, '2018-10-24 18:26:18', '2018-10-24 18:26:18');
INSERT INTO `users` VALUES (103, 'rammah72@gmail.com', '$2y$10$wMG9QC2BrNpcRR8bY6W2M.mQRVZH6Wqme0579TEdYgQlaGpS2pQ.q', 'ROLE_CUSTOMER', 1, 0, 0, 0, 0, 0, NULL, NULL, '2018-10-24 18:26:19', '2018-10-24 18:26:19');
COMMIT;

SET FOREIGN_KEY_CHECKS = 1;
