/*
 Navicat Premium Data Transfer

 Source Server         : DBLokal
 Source Server Type    : MySQL
 Source Server Version : 100419 (10.4.19-MariaDB)
 Source Host           : localhost:3306
 Source Schema         : bukuinduk

 Target Server Type    : MySQL
 Target Server Version : 100419 (10.4.19-MariaDB)
 File Encoding         : 65001

 Date: 14/11/2022 00:39:56
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for dataanggota
-- ----------------------------
DROP TABLE IF EXISTS `dataanggota`;
CREATE TABLE `dataanggota`  (
  `id_anggota` bigint NOT NULL AUTO_INCREMENT,
  `anggota_id` varchar(5) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `nama` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `tanggal_lahir` date NULL DEFAULT NULL,
  `jenis_kelamin` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `alamat` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `telpon` int NULL DEFAULT NULL,
  `username` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `passwd` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id_anggota`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 6 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of dataanggota
-- ----------------------------
INSERT INTO `dataanggota` VALUES (1, 'AG001', 'Vincent Budi', '1999-02-21', 'Laki-laki', 'Bandung', 'VincentBudi@gmail.com', 2147483647, 'vincentb', 'budi123');
INSERT INTO `dataanggota` VALUES (2, 'AG002', 'Tiny Upi', '2001-09-17', 'Perempuan', 'Tangerang', 'teanee@gmail.com', 2147483647, 'tinyupi', 'ipuynit');
INSERT INTO `dataanggota` VALUES (3, 'AG003', 'Tiny Upi', '2001-09-17', 'Perempuan', 'Bogor', 'teanee@gmail.com', 2147483647, 'tinyupi', 'ipuynit');
INSERT INTO `dataanggota` VALUES (5, 'AG004', 'Budi Purnowo', '1995-12-17', 'Laki-laki', 'Bandung', 'bpurnomo@gmail.com', 2147483647, 'purnomob', 'bomonrup');

-- ----------------------------
-- Table structure for databuku
-- ----------------------------
DROP TABLE IF EXISTS `databuku`;
CREATE TABLE `databuku`  (
  `id_buku` bigint NOT NULL AUTO_INCREMENT,
  `buku_id` varchar(5) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `judul` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `pengarang` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `tempat_terbit` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `penerbit` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `tahun_terbit` year NULL DEFAULT NULL,
  `edisi` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `jumlah_buku` int NULL DEFAULT NULL,
  `halaman` int NULL DEFAULT NULL,
  `tanggal_masuk` date NULL DEFAULT NULL,
  `id_jenis_buku` int NOT NULL,
  `isbn` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `sumber` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `harga` int NULL DEFAULT NULL,
  `id_rak` int NOT NULL,
  `keterangan` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id_buku`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 16 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of databuku
-- ----------------------------
INSERT INTO `databuku` VALUES (1, 'BK012', 'Tuhan tak serumit hati wanita', 'Vivi Priliyanti', 'Yogyakarta', 'Orbit', 2017, 'pertama', 82, 81, '2022-11-13', 3, '978-602-3092-87-1', 'pembelian', 69000, 3, 'kondisi baik');
INSERT INTO `databuku` VALUES (2, 'BK002', 'Mesin waktu : pesan dari masa depan', 'Ahmad M. Mabrur Umar', 'Sukabumi', 'CV Jejak', 2021, 'pertama', 20, 236, '2022-11-12', 4, '978-623-247-945-6', 'pembelian', 100000, 1, 'kondisi baik');
INSERT INTO `databuku` VALUES (3, 'BK003', 'Metroseksual', 'Tejo Ismoyo', 'Yogyakarta', 'Deepublish', 2018, 'pertama', 25, 72, '2022-11-12', 3, '978-602-475-479-2', 'pembelian', 50000, 3, 'kondisi baik');
INSERT INTO `databuku` VALUES (4, 'BK004', 'Pahlawan reformasi :catatan peristiwa 12 Mei 1998', 'Zamroni, A, Andin, M, Gabut, Benny, Saksono, Putu Tejo', 'Jakarta', 'Pabelan Jayakarta', 1998, 'pertama', 100, 116, '2022-11-12', 5, '979-907-306-5', 'pembelian', 80000, 4, 'kondisi baik');
INSERT INTO `databuku` VALUES (5, 'BK005', 'Malaikat kecilku : refleksi teologis pengalaman penderitaan anak manusia', 'B. Ario Tejo Sugiarto', 'Yogyakarta', 'PT. Kanisius', 2019, 'pertama', 66, 152, '2022-11-12', 5, '978-979-21-6110-6', 'pembelian', 99000, 3, 'kondisi baik');
INSERT INTO `databuku` VALUES (6, 'BK006', 'Fix you : saat hati hancur berkeping-keping, kepingan mana yang akan kamu ikuti?', 'Ainun Nufus', 'Yogyakarta', 'Diandra Kreatif', 2016, 'kedua', 123, 190, '2022-11-12', 3, '978-602-163-868-2', 'pembelian', 150000, 2, 'kondisi baik');
INSERT INTO `databuku` VALUES (7, 'BK007', 'Prasasti : arkeologi puisi penyair Yogya yang dibacakan dalam mengenang Chairul Anwar di Purna Budaya, 29 Mei 1984', 'Emha Ainun Nadjib', 'Yogyakarta', 'Taman Budaya', 1984, 'kedua', 100, 34, '2022-11-12', 5, '84-1919-2467-84', 'pembelian', 79000, 4, 'kondisi baik');
INSERT INTO `databuku` VALUES (8, 'BK008', 'Cinta seorang hacker', 'Ainun Bell', 'Kampar', 'CV. Karos Publisher', 2019, 'pertama', 80, 137, '2022-11-12', 4, '978-623-90514-0-2', 'pembelian', 40000, 1, 'kondisi baik');
INSERT INTO `databuku` VALUES (9, 'BK009', 'Adakah Tuhan', 'Erwin Pardede', 'Jakarta', 'PT Naga Saco Abadi', 2020, 'pertama', 200, 261, '2022-11-12', 7, '978-623-92931-0-9', 'pembelian', 100000, 2, 'kondisi baik');
INSERT INTO `databuku` VALUES (10, 'BK010', 'Republik #jancukers', 'Sujiwo Tejo', 'Jakarta', 'Kompas', 2012, 'pertama', 80, 400, '2022-11-12', 5, '978-979-709-677-9', 'pembelian', 150000, 2, 'kondisi baik');
INSERT INTO `databuku` VALUES (12, 'BK011', 'Gema sebuah hati', 'Marga T', 'Jakarta', 'Gramedia', 1975, 'pertama', 50, 398, '2022-11-12', 5, '979-403-064-3', 'pembelian', 90000, 4, 'kondisi baik');
INSERT INTO `databuku` VALUES (13, 'BK012', 'Tuhan tak serumit hati wanita', 'Vivi Priliyanti', 'Yogyakarta', 'Orbit', 2017, 'pertama', 82, 81, '2022-11-12', 6, '978-602-3092-87-1', 'pembelian', 69000, 3, 'kondisi baik');
INSERT INTO `databuku` VALUES (14, 'BK012', 'Tuhan tak serumit hati wanita', 'Vivi Priliyanti', 'Yogyakarta', 'Orbit', 2017, 'pertama', 82, 81, '2021-01-20', 0, '978-602-3092-87-1', 'pembelian', 69000, 3, 'kondisi baik');

-- ----------------------------
-- Table structure for datadenda
-- ----------------------------
DROP TABLE IF EXISTS `datadenda`;
CREATE TABLE `datadenda`  (
  `id_denda` bigint NOT NULL AUTO_INCREMENT,
  `pinjam_id` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `denda` int NULL DEFAULT NULL,
  `lama_terlambat` int NULL DEFAULT NULL,
  PRIMARY KEY (`id_denda`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 4 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of datadenda
-- ----------------------------
INSERT INTO `datadenda` VALUES (1, 'PJ002', 5000, 3);
INSERT INTO `datadenda` VALUES (2, 'PJ003', 0, 0);

-- ----------------------------
-- Table structure for datajenis_buku
-- ----------------------------
DROP TABLE IF EXISTS `datajenis_buku`;
CREATE TABLE `datajenis_buku`  (
  `id_jenis_buku` bigint NOT NULL AUTO_INCREMENT,
  `jenis_buku` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id_jenis_buku`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 9 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of datajenis_buku
-- ----------------------------
INSERT INTO `datajenis_buku` VALUES (3, 'Fiksi');
INSERT INTO `datajenis_buku` VALUES (4, 'Novel');
INSERT INTO `datajenis_buku` VALUES (5, 'Bukan Fiksi');
INSERT INTO `datajenis_buku` VALUES (6, 'Inspirasi');
INSERT INTO `datajenis_buku` VALUES (7, 'Religi');

-- ----------------------------
-- Table structure for datakatalog
-- ----------------------------
DROP TABLE IF EXISTS `datakatalog`;
CREATE TABLE `datakatalog`  (
  `id_katalog` bigint NOT NULL AUTO_INCREMENT,
  `judul` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `pengarang` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `jenis_buku` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `status_pinjam` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id_katalog`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 9 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of datakatalog
-- ----------------------------
INSERT INTO `datakatalog` VALUES (1, 'Metroseksual', 'Tejo Ismoyo', 'Bukan Fiksi', 'Sudah kembali');
INSERT INTO `datakatalog` VALUES (2, 'Cinta seorang hacker', 'Ainun Bell', 'Novel', 'Sudah dikembalikan');
INSERT INTO `datakatalog` VALUES (3, 'Inspirasi Pemimpin', 'Thomas Kristo', 'Inspirasi', 'Sudah Kembali');
INSERT INTO `datakatalog` VALUES (5, 'Adakah Tuhan', 'Erwin Pardede', 'Religi', 'Sudag kembali');

-- ----------------------------
-- Table structure for datapenerbit
-- ----------------------------
DROP TABLE IF EXISTS `datapenerbit`;
CREATE TABLE `datapenerbit`  (
  `id_penerbit` bigint NOT NULL AUTO_INCREMENT,
  `penerbit` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `lokasi` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id_penerbit`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 14 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of datapenerbit
-- ----------------------------
INSERT INTO `datapenerbit` VALUES (1, 'Elex Media Komputindo', 'Jakarta');
INSERT INTO `datapenerbit` VALUES (2, 'CV Jejak', 'Sukabumi');
INSERT INTO `datapenerbit` VALUES (3, 'Deepublish', 'Yogyakarta');
INSERT INTO `datapenerbit` VALUES (4, 'Pabelan Jayakarta', 'Jakarta');
INSERT INTO `datapenerbit` VALUES (5, 'PT. Kanisius', 'Yogyakarta');
INSERT INTO `datapenerbit` VALUES (6, 'Diandra Kreatif', 'Yogyakarta');
INSERT INTO `datapenerbit` VALUES (7, 'Taman Budaya', 'Yogyakarta');
INSERT INTO `datapenerbit` VALUES (8, 'CV. Karos Publisher', 'Kampar');
INSERT INTO `datapenerbit` VALUES (9, 'PT Naga Saco Abadi', 'Jakarta');
INSERT INTO `datapenerbit` VALUES (10, 'Kompas', 'Jakarta');
INSERT INTO `datapenerbit` VALUES (11, 'Gramedia', 'Jakarta');
INSERT INTO `datapenerbit` VALUES (12, 'Orbit', 'Yogyakarta');

-- ----------------------------
-- Table structure for datapengarang
-- ----------------------------
DROP TABLE IF EXISTS `datapengarang`;
CREATE TABLE `datapengarang`  (
  `id_pengarang` bigint NOT NULL AUTO_INCREMENT,
  `pengarang` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id_pengarang`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 4 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of datapengarang
-- ----------------------------
INSERT INTO `datapengarang` VALUES (3, 'Ainun Bell');

-- ----------------------------
-- Table structure for datapetugas
-- ----------------------------
DROP TABLE IF EXISTS `datapetugas`;
CREATE TABLE `datapetugas`  (
  `id_petugas` bigint NOT NULL AUTO_INCREMENT,
  `nama_petugas` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `jabatan` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id_petugas`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 4 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of datapetugas
-- ----------------------------
INSERT INTO `datapetugas` VALUES (1, 'Fajar Kurniawan', 'Pustakawan');

-- ----------------------------
-- Table structure for datapinjam
-- ----------------------------
DROP TABLE IF EXISTS `datapinjam`;
CREATE TABLE `datapinjam`  (
  `id_pinjam` bigint NOT NULL AUTO_INCREMENT,
  `pinjam_id` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `anggota_id` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `buku_id` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `tanggal_pinjam` date NULL DEFAULT NULL,
  `lama_pinjam` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `tanggal_kembali` date NULL DEFAULT NULL,
  `denda_id` int NULL DEFAULT NULL,
  `status_pinjam` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id_pinjam`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 5 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of datapinjam
-- ----------------------------
INSERT INTO `datapinjam` VALUES (1, 'PJ001', 'AG002', 'BK003', '2022-11-13', '3 hari', NULL, NULL, 'Sedang dipinjam');
INSERT INTO `datapinjam` VALUES (2, 'PJ002', 'AG001', 'BK008', '2022-08-09', '3 hari', '2022-08-15', 1, 'Sudah kembali');
INSERT INTO `datapinjam` VALUES (3, 'PJ003', 'AG003', 'BK005', '2022-10-27', '3 hari', '2022-10-30', 2, 'Sudah kembali');

-- ----------------------------
-- Table structure for datarak
-- ----------------------------
DROP TABLE IF EXISTS `datarak`;
CREATE TABLE `datarak`  (
  `id_rak` bigint NOT NULL AUTO_INCREMENT,
  `nama_rak` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id_rak`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 6 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of datarak
-- ----------------------------
INSERT INTO `datarak` VALUES (1, 'Rak A-1');
INSERT INTO `datarak` VALUES (2, 'Rak A-2');
INSERT INTO `datarak` VALUES (3, 'Rak B-1');
INSERT INTO `datarak` VALUES (4, 'Rak B-2');

SET FOREIGN_KEY_CHECKS = 1;
