
# ระบบร้านอาหาร BLACK HOUSE
โปรเจ็คนี้สร้างปี 2560 หรือ 2017 `อาจไม่ทันสมัย`แต่สามารถโหลดเป็นอย่างได้เลยครับ
## วิธีติดตั้ง
กดปุ่ม <> code แล้ว download zip เพื่อดาวโหลดไฟล์โปรเจ็ค




## ตั้งค่าการเชื่อมต่อ
แก้ไขไฟล์ conn.php ในโฟลเดอร์ include/conn.php
```javascript
$conn = new mysqli("localhost", "user", "password", "project");
```


## การตั้งค่าฐานข้อมูล
สร้างฐานข้อมูล เช่น project
และรัน query ไฟล์ /data/data.sql
##### หรือคัดลอกคำสั่งดั่งนี้
```
/*
 Navicat Premium Data Transfer

 Source Server         : MySQL
 Source Server Type    : MySQL
 Source Server Version : 50722
 Source Host           : localhost:3306
 Source Schema         : project

 Target Server Type    : MySQL
 Target Server Version : 50722
 File Encoding         : 65001

 Date: 20/06/2018 09:42:23
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for bill_img
-- ----------------------------
DROP TABLE IF EXISTS `bill_img`;
CREATE TABLE `bill_img`  (
  `bill_img_id` int(255) NOT NULL AUTO_INCREMENT,
  `file_name` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `file_type` varchar(10) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `file_size` int(11) NULL DEFAULT NULL,
  `file_content` mediumblob NULL,
  `user_id` int(255) NULL DEFAULT NULL,
  PRIMARY KEY (`bill_img_id`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 6 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of bill_img
-- ----------------------------


-- ----------------------------
-- Table structure for bill_material
-- ----------------------------
DROP TABLE IF EXISTS `bill_material`;
CREATE TABLE `bill_material`  (
  `bill_id` int(255) NOT NULL AUTO_INCREMENT,
  `bill_no` int(255) NULL DEFAULT NULL,
  `bill_date` date NULL DEFAULT NULL,
  `bill_date_confirm` date NULL DEFAULT NULL,
  `bill_price` int(50) NULL DEFAULT NULL,
  `material_name` varchar(20) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `material_num` int(10) NULL DEFAULT NULL,
  `bill_status` varchar(10) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `units` varchar(10) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `user_id` int(10) NULL DEFAULT NULL,
  `bill_img_id` int(11) NULL DEFAULT NULL,
  PRIMARY KEY (`bill_id`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 15 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of bill_material
-- ----------------------------
INSERT INTO `bill_material` VALUES (1, 1, '2018-04-07', '2018-05-04', 555, 'เนื่อวัว', 25, 'buy', 'กีโลกรัม', 3, 1);
INSERT INTO `bill_material` VALUES (2, 1, '2018-04-25', '2018-05-06', 122, 'มะนาว', 2, 'buy', 'กีโลกรัม', 3, 2);
INSERT INTO `bill_material` VALUES (3, 2, '2018-04-25', '2018-05-03', 1050, 'มะเขือเทศ', 2, 'buy', 'ลูก', 3, 2);
INSERT INTO `bill_material` VALUES (4, 3, '2018-05-06', '2018-05-06', 250, 'ไก่', 5, 'buy', 'ตัว', 3, 3);
INSERT INTO `bill_material` VALUES (5, 4, '2018-06-06', '2018-06-06', 150, 'ไก่', 2, 'buy', 'กีโลกรัม', 3, 4);
INSERT INTO `bill_material` VALUES (6, 4, '2018-06-06', '2018-06-07', 200, 'เนื่อวัว', 1, 'buy', 'กีโลกรัม', 3, 4);
INSERT INTO `bill_material` VALUES (7, 4, '2018-06-06', '2018-06-07', 20, 'ผักชี', 2, 'buy', 'กรัม', 3, 4);
INSERT INTO `bill_material` VALUES (9, 5, '2018-06-09', '2018-06-09', 150, 'เนื้อหมา', 2, 'buy', 'กีโลกรัม', 3, 5);
INSERT INTO `bill_material` VALUES (11, NULL, '2018-06-19', NULL, NULL, 'ผักชี', 1, 'not buy', 'กรัม', 3, NULL);
INSERT INTO `bill_material` VALUES (10, NULL, '2018-06-10', NULL, NULL, 'กระทะ', 1, 'not buy', 'อัน', 3, NULL);
INSERT INTO `bill_material` VALUES (12, NULL, '2018-06-19', NULL, NULL, 'ผัดกาก', 1, 'not buy', 'กรัม', 3, NULL);
INSERT INTO `bill_material` VALUES (13, NULL, '2018-06-19', NULL, NULL, 'เนื่อวัว', 2, 'not buy', 'กีโลกรัม', 3, NULL);
INSERT INTO `bill_material` VALUES (14, NULL, '2018-06-19', NULL, NULL, 'ไก่', 2, 'not buy', 'ตัว', 3, NULL);

-- ----------------------------
-- Table structure for expenditure
-- ----------------------------
DROP TABLE IF EXISTS `expenditure`;
CREATE TABLE `expenditure`  (
  `epd_id` int(11) NOT NULL,
  `epd_subject` varchar(11) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `epd_price` int(11) NULL DEFAULT NULL,
  `epd_date` date NULL DEFAULT NULL,
  PRIMARY KEY (`epd_id`) USING BTREE
) ENGINE = MyISAM CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of expenditure
-- ----------------------------
INSERT INTO `expenditure` VALUES (1, 'ค่าไฟ', 100, '2018-05-03');
INSERT INTO `expenditure` VALUES (2, 'ค่าน้ำ', 200, '2018-05-04');
INSERT INTO `expenditure` VALUES (3, 'ค่าไฟ', 500, '2018-05-06');
INSERT INTO `expenditure` VALUES (4, 'ค่าไฟ', 500, '2018-06-01');
INSERT INTO `expenditure` VALUES (5, 'ค่าน้ำ', 200, '2018-06-06');
INSERT INTO `expenditure` VALUES (6, 'ค่าไฟ', 100, '2018-06-09');
INSERT INTO `expenditure` VALUES (7, 'ค่าไฟ', 230, '2018-06-10');
INSERT INTO `expenditure` VALUES (8, 'ค่าแรงงาน', 1300, '2018-05-08');
INSERT INTO `expenditure` VALUES (9, 'ค่าน้ำ', 1200, '2018-05-19');

-- ----------------------------
-- Table structure for menu
-- ----------------------------
DROP TABLE IF EXISTS `menu`;
CREATE TABLE `menu`  (
  `menu_id` int(10) NOT NULL,
  `menu_name` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `menu_price` int(10) NULL DEFAULT NULL,
  `menu_img` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `menu_type` varchar(20) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `menu_status` varchar(20) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `menu_recommented` int(2) NULL DEFAULT NULL,
  `menu_no_obj` int(2) NULL DEFAULT NULL,
  PRIMARY KEY (`menu_id`) USING BTREE
) ENGINE = MyISAM CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of menu
-- ----------------------------
INSERT INTO `menu` VALUES (16, 'ผัดซีอิ้ว', 30, 'ผัดซีอิ้ว.jpg', 'อาหารว่าง', 'activated', 1, NULL);
INSERT INTO `menu` VALUES (17, 'ผัดไทยกุ้งสด', 35, 'ผัดไทยกุ้งสด.jpg', 'ข้าวจานเดียว', 'activated', 1, 1);
INSERT INTO `menu` VALUES (18, 'ผัดวุ้นเส้น', 30, 'ผัดวุ้นเส้น.jpg', 'ข้าวจานเดียว', 'activated', 1, 1);
INSERT INTO `menu` VALUES (3, 'ข้าวคลุกกะปิ', 35, 'ข้าวคลุกกะปิ.jpg', 'ข้าวจานเดียว', 'wait', 1, 1);
INSERT INTO `menu` VALUES (5, 'ข้าวผัดกุ้ง', 35, 'ข้าวผัดกุ้ง.jpg', 'ข้าวจานเดียว', 'activated', 1, 1);
INSERT INTO `menu` VALUES (7, 'ข้าวผัดทะเล', 35, 'ข้าวผัดทะเล.jpg', 'ข้าวจานเดียว', 'activated', 1, NULL);
INSERT INTO `menu` VALUES (8, 'ข้าวผัดไข่', 30, 'ข้าวผัดไข่.jpg', 'ข้าวจานเดียว', 'activated', 1, NULL);
INSERT INTO `menu` VALUES (9, 'ข้าวผัดปู', 35, 'ข้าวผัดปู.jpg', 'ข้าวจานเดียว', 'activated', NULL, NULL);
INSERT INTO `menu` VALUES (10, 'ข้าวผัดอเมริกัน', 35, 'ข้าวผัดอเมริกัน.jpg', 'ข้าวจานเดียว', 'activated', NULL, NULL);
INSERT INTO `menu` VALUES (11, 'ข้าวมันไก่', 30, 'ข้าวมันไก่.jpg', 'ข้าวจานเดียว', 'activated', NULL, NULL);
INSERT INTO `menu` VALUES (12, 'ข้าวหน้าเป็ด', 35, 'ข้าวหน้าเป็ด.jpg', 'ข้าวจานเดียว', 'activated', 1, 0);
INSERT INTO `menu` VALUES (13, 'ข้าวหมกไก่', 30, 'ข้าวหมกไก่.jpg', 'ข้าวจานเดียว', 'activated', NULL, NULL);
INSERT INTO `menu` VALUES (14, 'เนื้อแดง', 35, 'เนื้อแดง.jpg', 'เมนูกับข้าว', 'activated', 1, NULL);
INSERT INTO `menu` VALUES (15, 'เนื้อทอดกระเทียม', 35, 'เนื้อทอดกระเทียม.jpg', 'เมนูกับข้าว', 'activated', NULL, NULL);
INSERT INTO `menu` VALUES (19, 'มาม่าผัด', 35, 'มาม่าผัด.jpg', 'อาหารว่าง', 'activated', NULL, NULL);
INSERT INTO `menu` VALUES (1, 'ไข่ดาว(เล็ก)', 5, 'ไข่ดาว.jpg', 'เมนูเสริม', 'activated', NULL, NULL);
INSERT INTO `menu` VALUES (2, 'ไข่เจียว(เล็ก)', 5, 'ไข่เจียว(เล็ก).jpg', 'เมนูเสริม', 'activated', NULL, NULL);
INSERT INTO `menu` VALUES (4, 'ข้าวผัดพริกไก่', 35, 'ข้าวผัดพริกไก่.jpg', 'ข้าวจานเดียว', 'activated', NULL, NULL);

-- ----------------------------
-- Table structure for order
-- ----------------------------
DROP TABLE IF EXISTS `order`;
CREATE TABLE `order`  (
  `order_id` int(255) NOT NULL AUTO_INCREMENT,
  `menu_id` int(11) NULL DEFAULT NULL,
  `order_img` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `order_bill_no` int(255) NULL DEFAULT NULL,
  `order_name` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `order_price` int(11) NULL DEFAULT NULL,
  `order_quantity` int(11) NULL DEFAULT NULL,
  `order_fried_egg` int(11) NULL DEFAULT NULL,
  `order_omelet` int(11) NULL DEFAULT NULL,
  `order_note` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `order_table_no` varchar(10) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `order_status` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `order_datetime` datetime(0) NULL DEFAULT NULL,
  `user_id` int(11) NULL DEFAULT NULL,
  `omelet_price` int(11) NULL DEFAULT NULL,
  `fried_egg_price` int(11) NULL DEFAULT NULL,
  PRIMARY KEY (`order_id`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 71 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of order
-- ----------------------------
INSERT INTO `order` VALUES (4, 2, 'ข้าวคลุกน้ำพริกปลาทู.jpg', 1, 'ข้าวคลุกน้ำพริกปลาทู', 45, 2, 1, 1, '', '1', 'paid', '2018-05-01 03:41:31', 3, NULL, NULL);
INSERT INTO `order` VALUES (5, 15, 'เนื้อทอดกระเทียม.jpg', 1, 'เนื้อทอดกระเทียม', 35, 1, 0, 0, '', '1', 'paid', '2018-05-01 03:41:31', 3, 5, 5);
INSERT INTO `order` VALUES (6, 14, 'เนื้อแดง.jpg', 1, 'เนื้อแดง', 35, 1, 0, 0, '', '1', 'paid', '2018-05-01 03:41:31', 3, NULL, NULL);
INSERT INTO `order` VALUES (7, 17, 'ผัดไทยกุ้งสด.jpg', 2, 'ผัดไทยกุ้งสด', 35, 2, 1, 0, 'ไม่เอากุ้ง', '2', 'paid', '2018-05-03 14:45:08', 2, 5, 5);
INSERT INTO `order` VALUES (8, 1, 'กระเพราไก่+ไข่ดาว.jpg', 2, 'กระเพราไก่+ไข่ดาว', 45, 1, 1, 1, 'asdffdas', '2', 'paid', '2018-05-03 14:45:08', 2, 5, 5);
INSERT INTO `order` VALUES (14, 4, 'ข้าวผัดพริกไก่.jpg', 3, 'ข้าวผัดพริกไก่', 45, 2, 1, 1, '', '1', 'paid', '2018-05-07 20:59:37', 3, 5, 5);
INSERT INTO `order` VALUES (18, 5, 'ข้าวผัดกุ้ง.jpg', 4, 'ข้าวผัดกุ้ง', 35, 2, 1, 1, '', '1', 'paid', '2018-05-19 14:16:18', 3, 5, 5);
INSERT INTO `order` VALUES (19, 8, 'ข้าวผัดไข่.jpg', 4, 'ข้าวผัดไข่', 30, 3, 2, 1, '', '1', 'paid', '2018-05-19 14:16:18', 3, 5, 5);
INSERT INTO `order` VALUES (20, 4, 'ข้าวผัดพริกไก่.jpg', 4, 'ข้าวผัดพริกไก่', 45, 2, 1, 1, 'ไม่เอาถั่ว', '1', 'paid', '2018-05-19 14:18:05', 3, 5, 5);
INSERT INTO `order` VALUES (21, 3, 'ข้าวคลุกกะปิ.jpg', 4, 'ข้าวคลุกกะปิ', 35, 2, 1, 1, '', '1', 'paid', '2018-05-19 14:20:10', 3, 5, 5);
INSERT INTO `order` VALUES (22, 7, 'ข้าวผัดทะเล.jpg', 5, 'ข้าวผัดทะเล', 35, 3, 2, 1, '', '3', 'paid', '2018-05-19 14:24:09', 3, 5, 5);
INSERT INTO `order` VALUES (23, 8, 'ข้าวผัดไข่.jpg', 6, 'ข้าวผัดไข่', 30, 2, 1, 0, '', '3', 'paid', '2018-05-19 15:07:25', 3, 5, 5);
INSERT INTO `order` VALUES (24, 4, 'ข้าวผัดพริกไก่.jpg', 7, 'ข้าวผัดพริกไก่', 45, 3, 2, 3, '', '4', 'paid', '2018-05-19 15:14:09', 3, 5, 5);
INSERT INTO `order` VALUES (25, 18, 'ผัดวุ้นเส้น.jpg', 8, 'ผัดวุ้นเส้น', 30, 2, 1, 1, '', '2', 'paid', '2018-05-19 15:35:02', 3, 5, 5);
INSERT INTO `order` VALUES (26, 7, 'ข้าวผัดทะเล.jpg', 9, 'ข้าวผัดทะเล', 35, 2, 1, 1, 'ไม่เอาผัก', '1', 'paid', '2018-06-06 14:23:23', 3, 5, 5);
INSERT INTO `order` VALUES (27, 4, 'ข้าวผัดพริกไก่.jpg', 9, 'ข้าวผัดพริกไก่', 45, 2, 1, 0, '', '1', 'paid', '2018-06-06 14:23:23', 3, 5, 5);
INSERT INTO `order` VALUES (28, 3, 'ข้าวคลุกกะปิ.jpg', 10, 'ข้าวคลุกกะปิ', 35, 2, 1, 1, 'ad', '2', 'paid', '2018-06-07 11:55:49', 3, 5, 5);
INSERT INTO `order` VALUES (29, 5, 'ข้าวผัดกุ้ง.jpg', 10, 'ข้าวผัดกุ้ง', 35, 1, 1, 0, '', '2', 'paid', '2018-06-07 11:55:49', 3, 5, 5);
INSERT INTO `order` VALUES (30, 4, 'ข้าวผัดพริกไก่.jpg', 11, 'ข้าวผัดพริกไก่', 45, 1, 0, 0, '', '1', 'paid', '2018-06-07 12:32:16', 3, 5, 5);
INSERT INTO `order` VALUES (31, 3, 'ข้าวคลุกกะปิ.jpg', 11, 'ข้าวคลุกกะปิ', 35, 1, 0, 0, '', '1', 'paid', '2018-06-07 12:32:16', 3, 5, 5);
INSERT INTO `order` VALUES (32, 5, 'ข้าวผัดกุ้ง.jpg', 11, 'ข้าวผัดกุ้ง', 35, 2, 0, 0, '', '1', 'paid', '2018-06-07 12:32:16', 3, 5, 5);
INSERT INTO `order` VALUES (33, 6, 'ข้าวผัดไก่.jpg', 12, 'ข้าวผัดไก่', 30, 1, 0, 0, '', '1', 'paid', '2018-06-07 12:37:01', 3, 5, 5);
INSERT INTO `order` VALUES (34, 5, 'ข้าวผัดกุ้ง.jpg', 13, 'ข้าวผัดกุ้ง', 35, 2, 0, 0, '', '3', 'paid', '2018-06-07 12:46:01', 3, 5, 5);
INSERT INTO `order` VALUES (35, 12, 'ข้าวหน้าเป็ด.jpg', 14, 'ข้าวหน้าเป็ด', 35, 3, 0, 0, '', '4', 'paid', '2018-06-07 12:47:26', 3, 5, 5);
INSERT INTO `order` VALUES (36, 6, 'ข้าวผัดไก่.jpg', 15, 'ข้าวผัดไก่', 30, 4, 0, 0, '', '1', 'paid', '2018-06-07 12:50:58', 3, 5, 5);
INSERT INTO `order` VALUES (37, 8, 'ข้าวผัดไข่.jpg', 16, 'ข้าวผัดไข่', 30, 2, 0, 0, '', '2', 'paid', '2018-06-07 12:55:42', 3, 5, 5);
INSERT INTO `order` VALUES (38, 6, 'ข้าวผัดไก่.jpg', 17, 'ข้าวผัดไก่', 30, 1, 0, 0, '', '1', 'paid', '2018-06-07 12:59:41', 3, 5, 5);
INSERT INTO `order` VALUES (39, 14, 'เนื้อแดง.jpg', 17, 'เนื้อแดง', 35, 1, 0, 0, '', '1', 'paid', '2018-06-07 12:59:41', 3, NULL, NULL);
INSERT INTO `order` VALUES (40, 3, 'ข้าวคลุกกะปิ.jpg', 18, 'ข้าวคลุกกะปิ', 35, 1, 0, 0, '', '1', 'paid', '2018-06-07 13:34:20', 3, 5, 5);
INSERT INTO `order` VALUES (41, 4, 'ข้าวผัดพริกไก่.jpg', 18, 'ข้าวผัดพริกไก่', 45, 3, 0, 0, '', '1', 'paid', '2018-06-07 13:34:20', 3, 5, 5);
INSERT INTO `order` VALUES (42, 5, 'ข้าวผัดกุ้ง.jpg', 19, 'ข้าวผัดกุ้ง', 35, 2, 1, 0, '', '2', 'paid', '2018-06-07 13:39:35', 3, 5, 5);
INSERT INTO `order` VALUES (43, 3, 'ข้าวคลุกกะปิ.jpg', 20, 'ข้าวคลุกกะปิ', 35, 1, 0, 0, '', '1', 'paid', '2018-06-07 13:44:54', 3, 5, 5);
INSERT INTO `order` VALUES (44, 4, 'ข้าวผัดพริกไก่.jpg', 21, 'ข้าวผัดพริกไก่', 45, 1, 0, 0, '', '2', 'paid', '2018-06-07 14:00:50', 3, 5, 5);
INSERT INTO `order` VALUES (45, 8, 'ข้าวผัดไข่.jpg', 21, 'ข้าวผัดไข่', 30, 2, 0, 0, '', '2', 'paid', '2018-06-07 14:00:50', 3, 5, 5);
INSERT INTO `order` VALUES (46, 14, 'เนื้อแดง.jpg', 21, 'เนื้อแดง', 35, 4, 0, 0, '', '2', 'paid', '2018-06-07 14:00:50', 3, NULL, NULL);
INSERT INTO `order` VALUES (47, 8, 'ข้าวผัดไข่.jpg', 22, 'ข้าวผัดไข่', 30, 1, 0, 0, '', '2', 'paid', '2018-06-07 14:11:38', 3, 5, 5);
INSERT INTO `order` VALUES (48, 14, 'เนื้อแดง.jpg', 22, 'เนื้อแดง', 35, 2, 0, 0, '', '2', 'paid', '2018-06-07 14:11:38', 3, NULL, NULL);
INSERT INTO `order` VALUES (49, 12, 'ข้าวหน้าเป็ด.jpg', 23, 'ข้าวหน้าเป็ด', 35, 2, 0, 0, '', '1', 'paid', '2018-06-07 14:24:52', 3, 5, 5);
INSERT INTO `order` VALUES (50, 18, 'ผัดวุ้นเส้น.jpg', 23, 'ผัดวุ้นเส้น', 30, 1, 1, 0, '', '1', 'paid', '2018-06-07 14:24:52', 3, 5, 5);
INSERT INTO `order` VALUES (51, 3, 'ข้าวคลุกกะปิ.jpg', 24, 'ข้าวคลุกกะปิ', 35, 2, 1, 1, '', '1', 'paid', '2018-06-07 14:42:42', 3, 5, 5);
INSERT INTO `order` VALUES (52, 6, 'ข้าวผัดไก่.jpg', 24, 'ข้าวผัดไก่', 30, 1, 0, 0, '', '1', 'paid', '2018-06-07 14:42:42', 3, 5, 5);
INSERT INTO `order` VALUES (53, 4, 'ข้าวผัดพริกไก่.jpg', 25, 'ข้าวผัดพริกไก่', 45, 2, 0, 0, '', '1', 'paid', '2018-06-07 15:15:20', 3, 5, 5);
INSERT INTO `order` VALUES (54, 6, 'ข้าวผัดไก่.jpg', 25, 'ข้าวผัดไก่', 30, 1, 1, 0, '', '1', 'paid', '2018-06-07 15:15:20', 3, 5, 5);
INSERT INTO `order` VALUES (55, 4, 'ข้าวผัดพริกไก่.jpg', 26, 'ข้าวผัดพริกไก่', 45, 1, 0, 0, '', '1', 'paid', '2018-06-07 15:34:02', 3, 5, 5);
INSERT INTO `order` VALUES (56, 4, 'ข้าวผัดพริกไก่.jpg', 27, 'ข้าวผัดพริกไก่', 45, 1, 0, 0, '', '1', 'paid', '2018-06-07 22:40:11', 3, 5, 5);
INSERT INTO `order` VALUES (57, 4, 'ข้าวผัดพริกไก่.jpg', 28, 'ข้าวผัดพริกไก่', 45, 1, 0, 0, '', '1', 'paid', '2018-06-07 22:46:07', 3, 5, 5);
INSERT INTO `order` VALUES (58, 4, 'ข้าวผัดพริกไก่.jpg', 29, 'ข้าวผัดพริกไก่', 45, 1, 0, 0, '', '2', 'paid', '2018-06-07 22:47:45', 3, 5, 5);
INSERT INTO `order` VALUES (59, 6, 'ข้าวผัดไก่.jpg', 30, 'ข้าวผัดไก่', 30, 2, 0, 0, '', '1', 'paid', '2018-06-07 22:49:51', 3, 5, 5);
INSERT INTO `order` VALUES (60, 7, 'ข้าวผัดทะเล.jpg', 31, 'ข้าวผัดทะเล', 35, 1, 0, 0, '', '1', 'paid', '2018-06-07 22:53:37', 3, 5, 5);
INSERT INTO `order` VALUES (61, 4, 'ข้าวผัดพริกไก่.jpg', 32, 'ข้าวผัดพริกไก่', 45, 2, 0, 0, '', '1', 'paid', '2018-06-07 22:55:39', 3, 5, 5);
INSERT INTO `order` VALUES (62, 4, 'ข้าวผัดพริกไก่.jpg', 33, 'ข้าวผัดพริกไก่', 45, 2, 0, 0, '', '1', 'paid', '2018-06-09 16:48:03', 3, 5, 5);
INSERT INTO `order` VALUES (63, 8, 'ข้าวผัดไข่.jpg', 33, 'ข้าวผัดไข่', 30, 2, 0, 0, '', '1', 'paid', '2018-06-09 16:48:03', 3, 5, 5);
INSERT INTO `order` VALUES (64, 6, 'ข้าวผัดไก่.jpg', 33, 'ข้าวผัดไก่', 30, 1, 0, 0, '', '1', 'paid', '2018-06-09 16:48:03', 3, 5, 5);
INSERT INTO `order` VALUES (65, 16, 'ผัดซีอิ้ว.jpg', NULL, 'ผัดซีอิ้ว', 30, 2, 0, 0, '', '1', 'done', '2018-06-09 16:48:40', 3, NULL, NULL);
INSERT INTO `order` VALUES (68, 5, 'ข้าวผัดกุ้ง.jpg', 34, 'ข้าวผัดกุ้ง', 35, 2, 0, 0, '', '2', 'paid', '2018-06-10 10:25:37', 3, 5, 5);
INSERT INTO `order` VALUES (69, 12, 'ข้าวหน้าเป็ด.jpg', 34, 'ข้าวหน้าเป็ด', 35, 3, 2, 1, '', '2', 'paid', '2018-06-10 10:29:20', 3, 5, 5);
INSERT INTO `order` VALUES (70, 12, 'ข้าวหน้าเป็ด.jpg', NULL, 'ข้าวหน้าเป็ด', 35, 2, 1, 1, '', '1', 'done', '2018-06-19 15:15:33', 3, 5, 5);

-- ----------------------------
-- Table structure for order_bill
-- ----------------------------
DROP TABLE IF EXISTS `order_bill`;
CREATE TABLE `order_bill`  (
  `order_bill_no` int(255) NOT NULL,
  `order_price` int(11) NULL DEFAULT NULL,
  `order_table_no` varchar(11) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `order_quantity` int(11) NULL DEFAULT NULL,
  `user_id` int(11) NULL DEFAULT NULL,
  `order_datetime` datetime(0) NULL DEFAULT NULL,
  `emp_name` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `emp_address` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  PRIMARY KEY (`order_bill_no`) USING BTREE
) ENGINE = MyISAM CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of order_bill
-- ----------------------------
INSERT INTO `order_bill` VALUES (1, 1700, '1', 4, 2, '2018-05-03 15:51:30', NULL, NULL);
INSERT INTO `order_bill` VALUES (2, 1300, '2', 3, 2, '2018-05-04 15:52:03', NULL, NULL);
INSERT INTO `order_bill` VALUES (3, 1500, '1', 2, 2, '2018-05-08 17:24:46', NULL, NULL);
INSERT INTO `order_bill` VALUES (4, 1365, '1', 9, 2, '2018-05-06 14:25:25', NULL, NULL);
INSERT INTO `order_bill` VALUES (5, 120, '3', 3, 2, '2018-05-19 14:28:26', NULL, NULL);
INSERT INTO `order_bill` VALUES (6, 1265, '3', 2, 2, '2018-05-19 15:08:29', NULL, NULL);
INSERT INTO `order_bill` VALUES (7, 160, '4', 3, 2, '2018-05-19 15:15:01', NULL, NULL);
INSERT INTO `order_bill` VALUES (8, 70, '2', 2, 2, '2018-05-19 15:37:00', NULL, NULL);
INSERT INTO `order_bill` VALUES (9, 175, '1', 4, 2, '2018-06-06 14:29:42', NULL, NULL);
INSERT INTO `order_bill` VALUES (10, 120, '2', 3, 2, '2018-06-07 12:30:22', NULL, NULL);
INSERT INTO `order_bill` VALUES (11, 150, '1', 4, 2, '2018-06-01 00:00:00', NULL, NULL);
INSERT INTO `order_bill` VALUES (12, 30, '1', 1, 2, '2018-06-01 00:00:00', NULL, NULL);
INSERT INTO `order_bill` VALUES (13, 70, '3', 2, 2, '2018-06-01 00:00:00', NULL, NULL);
INSERT INTO `order_bill` VALUES (14, 105, '4', 3, 2, '2018-06-01 00:00:00', NULL, NULL);
INSERT INTO `order_bill` VALUES (15, 120, '1', 4, 2, '2018-06-01 00:00:00', NULL, NULL);
INSERT INTO `order_bill` VALUES (16, 60, '2', 2, 2, '2018-06-01 00:00:00', NULL, NULL);
INSERT INTO `order_bill` VALUES (17, 65, '1', 2, 2, '2018-06-01 00:00:00', NULL, NULL);
INSERT INTO `order_bill` VALUES (18, 170, '1', 4, 2, '2018-06-06 00:00:00', NULL, NULL);
INSERT INTO `order_bill` VALUES (19, 75, '2', 2, 2, '2018-06-06 00:00:00', NULL, NULL);
INSERT INTO `order_bill` VALUES (20, 35, '1', 1, 2, '2018-06-06 00:00:00', NULL, NULL);
INSERT INTO `order_bill` VALUES (21, 245, '2', 7, 2, '2018-06-06 00:00:00', 'นายมะเสาพิส สูแว', 'ม.2 ต.ตอหลัง อ.ยะหริ่ง จ.ปัตตานี 94150');
INSERT INTO `order_bill` VALUES (22, 100, '2', 3, 2, '2018-06-09 00:00:00', NULL, NULL);
INSERT INTO `order_bill` VALUES (23, 105, '1', 3, 2, '2018-06-09 00:00:00', 'นายมะเสาพิส สูแว', 'ม3 ต.ตอหลัง อ.ยะหริ่ง จ.ปัตตานี 94150');
INSERT INTO `order_bill` VALUES (24, 110, '1', 3, 2, '2018-06-09 00:00:00', NULL, NULL);
INSERT INTO `order_bill` VALUES (25, 125, '1', 3, 2, '2018-06-07 15:27:03', NULL, NULL);
INSERT INTO `order_bill` VALUES (26, 45, '1', 1, 2, '2018-06-07 22:36:53', 'มะเสากี', 'ม.3');
INSERT INTO `order_bill` VALUES (27, 45, '1', 1, 2, '2018-06-07 22:41:06', 'นายมะเสาพิส สูแว', 'ม.2 ต.ตอหลัง อ.ยะหริ่ง จ.ปัตตานี 94150');
INSERT INTO `order_bill` VALUES (28, 45, '1', 1, 2, '2018-06-07 22:46:28', NULL, NULL);
INSERT INTO `order_bill` VALUES (29, 45, '2', 1, 2, '2018-06-07 22:47:59', NULL, NULL);
INSERT INTO `order_bill` VALUES (30, 60, '1', 2, 2, '2018-06-07 22:50:06', NULL, NULL);
INSERT INTO `order_bill` VALUES (31, 35, '1', 1, 2, '2018-06-07 22:53:52', 'นายมะเสาพิส สูแว', 'ม.2 ต.ตอหลัง อ.ยะหริ่ง จ.ปัตตานี 94150');
INSERT INTO `order_bill` VALUES (32, 90, '1', 2, 2, '2018-06-07 22:55:56', 'มะเสากี', 'ม.3');
INSERT INTO `order_bill` VALUES (33, 240, '1', 7, 2, '2018-06-10 13:03:15', 'นายมะเสาพิส สูแว', 'ม3 ต.ตอหลัง อ.ยะหริ่ง จ.ปัตตานี 94150');
INSERT INTO `order_bill` VALUES (34, 190, '2', 5, 2, '2018-06-19 15:25:42', NULL, NULL);

-- ----------------------------
-- Table structure for raw_material
-- ----------------------------
DROP TABLE IF EXISTS `raw_material`;
CREATE TABLE `raw_material`  (
  `material_name` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  PRIMARY KEY (`material_name`) USING BTREE
) ENGINE = MyISAM CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of raw_material
-- ----------------------------
INSERT INTO `raw_material` VALUES ('กระทะ');
INSERT INTO `raw_material` VALUES ('กล้วย');
INSERT INTO `raw_material` VALUES ('กุ้ง');
INSERT INTO `raw_material` VALUES ('ทับพี');
INSERT INTO `raw_material` VALUES ('ปลา');
INSERT INTO `raw_material` VALUES ('ผักชี');
INSERT INTO `raw_material` VALUES ('ผัดกาก');
INSERT INTO `raw_material` VALUES ('มะนาว');
INSERT INTO `raw_material` VALUES ('มะพร้าว');
INSERT INTO `raw_material` VALUES ('มะเขือเทศ');
INSERT INTO `raw_material` VALUES ('หอย');
INSERT INTO `raw_material` VALUES ('หัวห้อม');
INSERT INTO `raw_material` VALUES ('เนื่อวัว');
INSERT INTO `raw_material` VALUES ('เนื้อหมา');
INSERT INTO `raw_material` VALUES ('เนื้อแมว');
INSERT INTO `raw_material` VALUES ('เป็ด');
INSERT INTO `raw_material` VALUES ('ไก่');

-- ----------------------------
-- Table structure for user
-- ----------------------------
DROP TABLE IF EXISTS `user`;
CREATE TABLE `user`  (
  `user_id` int(10) NOT NULL,
  `user_titlename` varchar(10) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `user_fullname` varchar(30) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `user_nikname` varchar(10) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `user_sex` varchar(10) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `user_email` varchar(30) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `user_pwd` varchar(20) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `user_numphone` varchar(15) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `user_role` varchar(30) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `user_second_role` varchar(11) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `user_address` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `user_status` varchar(15) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `user_image` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  PRIMARY KEY (`user_id`) USING BTREE
) ENGINE = MyISAM CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of user
-- ----------------------------
INSERT INTO `user` VALUES (1, 'นาย', 'มะเสาพิส สูแว', 'เสาฟิด', 'ชาย', 'admin@admin.com', '123456', '092-821-6776', 'ผู้จัดการ', NULL, NULL, 'activated', 'เสาฟิด.jpg');
INSERT INTO `user` VALUES (2, 'นาย', 'มะเสากี สูแว', 'เซากี', 'ชาย', 'saokee@gmail.com', '123456', '093-587-0746', 'พนักงานบริการ', '1', NULL, 'activated', 'เซากี.JPG');
INSERT INTO `user` VALUES (3, 'นางสาว', 'สาลมา จงรักสัตร์', 'ซัลมา', 'หญิง', 'salma@gmail.com', '123456789', '092-548-6795', 'พนักงานทำอาหาร', '', 'นคร', 'activated', 'มา.jpg');
INSERT INTO `user` VALUES (4, 'นางสาว', 'ฟาตีเมาะห หะยีอเระ', 'เมาะ', 'หญิง', 'fatimoh@gmail.com', '123456789', '095-468-2173', 'พนักงานซื้อวัตถุดิบ', '', 'asdffsaewfscswer', 'activated', NULL);
INSERT INTO `user` VALUES (5, 'นาย', 'มะเสาพิส', 'เสาพิส', 'ชาย', 'saopis@gmail.com', '123456789', '092-821-6776', 'พนักงานทำอาหาร', NULL, 'asdffdsa', 'blocked', NULL);

SET FOREIGN_KEY_CHECKS = 1;

```
