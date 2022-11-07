/*
 Navicat Premium Data Transfer

 Source Server         : 127.0.0.1
 Source Server Type    : MySQL
 Source Server Version : 100422
 Source Host           : localhost:3306
 Source Schema         : inv_buku

 Target Server Type    : MySQL
 Target Server Version : 100422
 File Encoding         : 65001

 Date: 07/11/2022 19:25:31
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for databuku
-- ----------------------------
DROP TABLE IF EXISTS `databuku`;
CREATE TABLE `databuku`  (
  `id_buku` bigint NOT NULL AUTO_INCREMENT,
  `judul` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `pengarang` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `tempat_terbit` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `penerbit` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `tahun_terbit` year NOT NULL,
  `edisi` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `jumlah_buku` int NOT NULL,
  `halaman` int NOT NULL,
  `tanggal_masuk` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `jenis_buku` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `isbn` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `sumber` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `harga` int NOT NULL,
  `keterangan` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id_buku`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 14 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of databuku
-- ----------------------------
INSERT INTO `databuku` VALUES (1, 'Inspirasi Pemimpin', 'Thomas Kristo', 'Semarang', 'Elex Media Komputindo', 2012, 'pertama', 50, 186, '2022-11-07 13:20:39', 'inspirasi', '978-602-02-0003-3', 'pembelian', 100000, 'kondisi baik');
INSERT INTO `databuku` VALUES (2, 'Republik #jancukers', 'Sujiwo Tejo', 'Jakarta', 'Kompas', 2012, 'pertama', 80, 400, NULL, 'Bukan Fiksi', '978-979-709-677-9', 'pembelian', 150000, 'kondisi baik');
INSERT INTO `databuku` VALUES (3, 'Metroseksual', 'Tejo Ismoyo', 'Yogyakarta', 'Deepublish', 2018, 'pertama', 25, 72, NULL, 'Bukan Fiksi', '978-602-475-479-2', 'pembelian', 50000, 'kondisi baik');
INSERT INTO `databuku` VALUES (4, 'Pahlawan reformasi :catatan peristiwa 12 Mei 1998', 'Zamroni, A, Andin, M, Gabut, Benny, Saksono, Putu Tejo', 'Jakarta', 'Pabelan Jayakarta', 1998, 'pertama', 100, 116, NULL, 'Bukan Fiksi', '979-907-306-5', 'pembelian', 80000, 'kondisi baik');
INSERT INTO `databuku` VALUES (5, 'Malaikat kecilku : refleksi teologis pengalaman penderitaan anak manusia', 'B. Ario Tejo Sugiarto', 'Yogyakarta', 'PT. Kanisius', 2019, 'pertama', 66, 152, NULL, 'Religi', '978-979-21-6110-6', 'pembelian', 99000, 'kondisi baik');
INSERT INTO `databuku` VALUES (6, 'Fix you : saat hati hancur berkeping-keping, kepingan mana yang akan kamu ikuti?', 'Ainun Nufus', 'Yogyakarta', 'Diandra Kreatif', 2016, 'kedua', 123, 190, NULL, 'Fiksi', '978-602-163-868-2', 'pembelian', 150000, 'kondisi baik');
INSERT INTO `databuku` VALUES (7, 'Prasasti : arkeologi puisi penyair Yogya yang dibacakan dalam mengenang Chairul Anwar di Purna Budaya, 29 Mei 1984', 'Emha Ainun Nadjib', 'Yogyakarta', 'Taman Budaya', 1984, 'kedua', 100, 34, NULL, 'Bukan Fiksi', '84-1919-2467-84', 'pembelian', 79000, 'kondisi baik');
INSERT INTO `databuku` VALUES (8, 'Cinta seorang hacker', 'Ainun Bell', 'Kampar', 'CV. Karos Publisher', 2019, 'pertama', 80, 137, NULL, 'Novel', '978-623-90514-0-2', 'pembelian', 40000, 'kondisi baik');
INSERT INTO `databuku` VALUES (9, 'Adakah Tuhan', 'Erwin Pardede', 'Jakarta', 'PT Naga Saco Abadi', 2020, 'pertama', 200, 261, NULL, 'Bukan Fiksi', '978-623-92931-0-9', 'pembelian', 100000, 'kondisi baik');
INSERT INTO `databuku` VALUES (11, 'Tuhan tak serumit hati wanita', 'Vivi Priliyanti', 'Yogyakarta', 'Orbit', 2017, 'pertama', 82, 81, NULL, 'Puisi', '978-602-3092-87-1', 'pembelian', 69000, 'kondisi baik');
INSERT INTO `databuku` VALUES (12, 'Gema sebuah hati', 'Marga T', 'Jakarta', 'Gramedia', 1975, 'pertama', 50, 398, NULL, 'Fiksi', '979-403-064-3', 'pembelian', 90000, 'kondisi baik');

SET FOREIGN_KEY_CHECKS = 1;
