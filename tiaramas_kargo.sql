-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jan 30, 2023 at 11:48 AM
-- Server version: 8.0.30
-- PHP Version: 8.0.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tiaramas_kargo`
--

-- --------------------------------------------------------

--
-- Table structure for table `area_bus`
--

CREATE TABLE `area_bus` (
  `id_area_bus` bigint UNSIGNED NOT NULL,
  `kota` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kode_kota` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `wilayah` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kode_wilayah` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `area_bus`
--

INSERT INTO `area_bus` (`id_area_bus`, `kota`, `kode_kota`, `wilayah`, `kode_wilayah`, `alamat`, `created_at`, `updated_at`) VALUES
(1, 'Kota Cilegon', 'CLG', 'Merak', 'MRK', 'Jl. Merak, Tamansari, Pulomerak, Cilegon', '2023-01-01 19:40:32', '2023-01-01 19:40:32'),
(2, 'Kota Cilegon', 'CLG', 'Cilegon', 'CLG', 'Jl. Raya Cilegon, Kedaleman, Kec. Cibeber, Kota Cilegon', '2023-01-01 19:40:32', '2023-01-01 19:40:32'),
(3, 'Kota Serang', 'SRG', 'Serang', 'SRG', 'Jl. Akses Terminal Pakupatan S. Banjaragung. Cipocok Jaya. Kota Serang', '2023-01-01 19:40:32', '2023-01-01 19:40:32'),
(4, 'Kota Tangerang', 'TGR', 'Balaraja', 'BLR', 'Jl. Parahu, Sukamulya, Tangerang, Banten', '2023-01-01 19:40:32', '2023-01-01 19:40:32'),
(5, 'Kota Tangerang', 'TGR', 'Kantor Tiara Mas Balaraja Barat', 'RGC', 'Jl. Balaraja, Tangerang Regency, Banten 15610', '2023-01-01 19:40:32', '2023-01-01 19:40:32'),
(6, 'Kota Tangerang', 'TGR', 'Poris', 'PRS', 'Jl. Benteng Betawi, Poris Plawad, Tangerang', '2023-01-01 19:40:32', '2023-01-01 19:40:32'),
(7, 'Kota Jakarta', 'JKT', 'Kalideres', 'KLD', 'Jl. Daan Mogot No.15, Kalideres, Jakarta', '2023-01-01 19:40:32', '2023-01-01 19:40:32'),
(8, 'Kota Jakarta', 'JKT', 'Lebak Bulus', 'LBS', 'Jl. Lebak Bulus, Cilandak, Jakarta', '2023-01-01 19:40:32', '2023-01-01 19:40:32'),
(9, 'Kota Jakarta', 'JKT', 'Kampung Rambutan', 'KPR', 'Jl. Terminal Kampung Rambutan, Rambutan, Ciracas, Jakarta', '2023-01-01 19:40:32', '2023-01-01 19:40:32'),
(10, 'Kota Jakarta', 'JKT', 'Pulogebang', 'PGB', 'Jl. Pulo Gebang, Cakung, Jakarta', '2023-01-01 19:40:32', '2023-01-01 19:40:32'),
(11, 'Kota Bekasi', 'BKI', 'Agen Tiara Mas Timur (Depan Depsos)', 'BKS', 'Jl. HM. Joyo Martono No. 8, Margahayu, Bekasi', '2023-01-01 19:40:32', '2023-01-01 19:40:32'),
(12, 'Kota Cirebon', 'CRB', 'Cirebon', 'CRB', 'Jl. Jenderal A. Yani, Kecapi, Harjamukti, Cirebon', '2023-01-01 19:40:32', '2023-01-01 19:40:32'),
(13, 'Kota Surabaya', 'SBY', 'Kantor Tiara Mas Sulung', 'SLG', 'Jl. Sulungkali No. 89, (Petokoan Sulung Mas Blok A-22) Surabaya', '2023-01-01 19:40:32', '2023-01-01 19:40:32'),
(14, 'Kota Surabaya', 'SBY', 'Kantor Tiara Mas Demak', 'DMK', 'Jl. Demak No.347, Dupak, Kota Surabaya', '2023-01-01 19:40:32', '2023-01-01 19:40:32'),
(15, 'Kota Malang', 'MLG', 'Kantor Tiara Mas Malang', 'KJN', 'Jl. Pattimura No 30. Klojen, Kota Malang', '2023-01-01 19:40:32', '2023-01-01 19:40:32'),
(16, 'Kota Denpasar', 'DPS', 'Kantor Tiara Mas Denpasar', 'TKA', 'Jl. Gn. Agung No.130, Tegal Kertha, Kec. Denpasar Bar., Kota Denpasar', '2023-01-01 19:40:32', '2023-01-01 19:40:32'),
(17, 'Kota Mataram', 'MTR', 'Kantor Tiara Mas Mataram', 'CNA', 'Jl. Pejanggik No. 108 Cakranegara (Depan Ruby Supermarket)', '2023-01-01 19:40:32', '2023-01-01 19:40:32'),
(18, 'Kabupaten Sumbawa', 'SBW', 'Kantor Tiara Mas Alas', 'ALS', 'Jl. Pendidikan, Luar, Alas, Sumbawa', '2023-01-01 19:40:32', '2023-01-01 19:40:32'),
(19, 'Kabupaten Sumbawa', 'SBW', 'Kantor Tiara Mas Sumbawa', 'SBR', 'Jl. Yos Sudarso, Sumbawa Besar, Sumbawa', '2023-01-01 19:40:32', '2023-01-01 19:40:32'),
(20, 'Kota Bima', 'BIM', 'Kantor Tiara Mas Bima', 'SKH', 'Jl. Sultan Karahudin No. 8, Bima', '2023-01-01 19:40:32', '2023-01-01 19:40:32');

-- --------------------------------------------------------

--
-- Table structure for table `barang_trackings`
--

CREATE TABLE `barang_trackings` (
  `id_barang_tracking` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `bus`
--

CREATE TABLE `bus` (
  `id_bus` bigint UNSIGNED NOT NULL,
  `no_pol` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sopir_utama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `bus`
--

INSERT INTO `bus` (`id_bus`, `no_pol`, `sopir_utama`, `created_at`, `updated_at`) VALUES
(1, 'EA 7340 A', 'Komarudin', '2023-01-25 01:49:08', '2023-01-25 01:49:08'),
(2, 'EA 2', 'risa', '2023-01-25 01:49:08', '2023-01-25 01:49:08');

-- --------------------------------------------------------

--
-- Table structure for table `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cargo_pengiriman_barangs`
--

CREATE TABLE `cargo_pengiriman_barangs` (
  `id_cargo_pengiriman_barang` bigint UNSIGNED NOT NULL,
  `no_resi` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `no_lmt` int DEFAULT NULL,
  `jumlah_barang` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'koli',
  `jenis_barang` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `panjang` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `lebar` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tinggi` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `berat` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `biaya` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cargo_pengiriman_barangs`
--

INSERT INTO `cargo_pengiriman_barangs` (`id_cargo_pengiriman_barang`, `no_resi`, `no_lmt`, `jumlah_barang`, `code`, `jenis_barang`, `panjang`, `lebar`, `tinggi`, `berat`, `biaya`, `created_at`, `updated_at`) VALUES
(150, '1', 1, '5', 'koli', 'Sepeda motor', NULL, NULL, NULL, '10', '7000000', '2023-01-27 23:07:36', '2023-01-27 23:07:36'),
(151, '2', 2, '1', 'koli', 'Sepeda motor', NULL, NULL, NULL, NULL, '7000000', '2023-01-27 23:11:32', '2023-01-27 23:11:32'),
(152, '3', 3, '1', 'koli', 'Sepeda motor', NULL, NULL, NULL, '10', '7000000', '2023-01-27 23:17:30', '2023-01-27 23:17:30'),
(153, '4', 4, '5', 'koli', 'sparepart', NULL, NULL, NULL, '25', '250000', '2023-01-28 02:14:06', '2023-01-28 02:14:06'),
(154, '5', 5, '2', 'koli', 'spare part', NULL, NULL, NULL, '25', '100000', '2023-01-28 02:41:49', '2023-01-28 02:41:49'),
(156, '6', 6, '2', 'koli', 'payung', NULL, NULL, NULL, '8', '100000', '2023-01-28 02:53:05', '2023-01-28 02:53:05');

-- --------------------------------------------------------

--
-- Table structure for table `cargo_pengiriman_details`
--

CREATE TABLE `cargo_pengiriman_details` (
  `id_cargo_pengiriman_detail` bigint UNSIGNED NOT NULL,
  `no_manifest` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `no_lmt` int DEFAULT NULL,
  `no_resi` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nama_pengirim` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nomor_pengirim` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_penerima` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nomor_penerima` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sopir` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `kernet` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `no_pol` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_lunas` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_diterima` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_pengecualian` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `jenis_pengiriman` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'truk',
  `jenis_pengirim` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT 'umum',
  `jenis_biaya` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'kubikasi',
  `jenis_paket` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_status_pembayaran` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `asal` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tujuan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `keterangan` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `jenis_barang_detail` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_user` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cargo_pengiriman_details`
--

INSERT INTO `cargo_pengiriman_details` (`id_cargo_pengiriman_detail`, `no_manifest`, `no_lmt`, `no_resi`, `nama_pengirim`, `nomor_pengirim`, `nama_penerima`, `nomor_penerima`, `sopir`, `kernet`, `no_pol`, `is_lunas`, `is_diterima`, `is_pengecualian`, `jenis_pengiriman`, `jenis_pengirim`, `jenis_biaya`, `jenis_paket`, `id_status_pembayaran`, `asal`, `tujuan`, `keterangan`, `jenis_barang_detail`, `id_user`, `created_at`, `updated_at`) VALUES
(120, '2', 1, '1', 'Ewa', '081231383975', 'Agi', '081231383975', NULL, NULL, 'EA 7340 A', NULL, NULL, 'pengecualian', 'bus', 'umum', 'kubikasi', 'barang', '1', 'Kantor Tiara Mas Sulung', 'Kantor Tiara Mas Bima', 'Baju', '', '1', '2023-01-27 23:07:36', '2023-01-27 23:21:54'),
(121, '3', 2, '2', 'Ewa', '081231383975', 'Agi', '081231383975', NULL, NULL, 'EA 1', NULL, NULL, NULL, 'truk', 'umum', 'kubikasi', '', '1', 'surabaya', 'bima', 'Baju', 'besi', '1', '2023-01-27 23:11:32', '2023-01-27 23:11:32'),
(122, '1', 3, '3', 'Ewa', '081231383975', 'Agi', '081231383975', NULL, NULL, 'EA 7340 A', 'lunas', NULL, 'pengecualian', 'bus', 'umum', 'kubikasi', 'barang', '4', 'Merak', 'Kantor Tiara Mas Bima', 'Baju', '', '1', '2023-01-27 23:17:30', '2023-01-27 23:21:20'),
(123, '4', 4, '4', 'rosi', '0857463214566', 'rara', '123456789101112', NULL, NULL, 'EA 7340 A', NULL, NULL, 'pengecualian', 'bus', 'umum', 'kubikasi', '', '1', 'Kantor Tiara Mas Sulung', 'Kantor Tiara Mas Bima', 'Baju', '', '1', '2023-01-28 02:14:06', '2023-01-28 02:58:30'),
(124, NULL, 5, '5', 'surya motor', '0315451876', 'cv.surya jaya sukses bersama', '08123763221', NULL, NULL, NULL, NULL, NULL, 'pengecualian', 'bus', 'umum', 'kubikasi', '', '1', 'Kantor Tiara Mas Sulung', 'Kantor Tiara Mas Alas', 'vanbelt', '', '1', '2023-01-28 02:41:49', '2023-01-28 02:41:49'),
(125, '4', 6, '6', 'eka', '08gandul gandul', 'indah', '10gandulgandul', NULL, NULL, 'EA 7340 A', 'lunas', NULL, 'pengecualian', 'bus', 'umum', 'kubikasi', '', '4', 'Kantor Tiara Mas Sulung', 'Kantor Tiara Mas Bima', 'paking karung', '', '1', '2023-01-28 02:53:05', '2023-01-28 02:58:30');

-- --------------------------------------------------------

--
-- Table structure for table `distributors`
--

CREATE TABLE `distributors` (
  `id_distributor` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `distributors`
--

INSERT INTO `distributors` (`id_distributor`, `name`, `created_at`, `updated_at`) VALUES
(1, 'unilever', '2023-01-25 02:01:39', '2023-01-25 02:01:39'),
(2, 'forisa', '2023-01-25 02:01:39', '2023-01-25 02:01:39');

-- --------------------------------------------------------

--
-- Table structure for table `goods_category_bus`
--

CREATE TABLE `goods_category_bus` (
  `id_goods_category_bus` bigint UNSIGNED NOT NULL,
  `category` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pickup` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `dropoff` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `kode_kotas`
--

CREATE TABLE `kode_kotas` (
  `id_kode_kota` bigint UNSIGNED NOT NULL,
  `kota` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kode_kota` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `wilayah` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kode_wilayah` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `kode_kotas`
--

INSERT INTO `kode_kotas` (`id_kode_kota`, `kota`, `kode_kota`, `wilayah`, `kode_wilayah`, `created_at`, `updated_at`) VALUES
(1, 'surabaya', 'sby', 'sulung', 'slg', '2023-01-25 01:50:41', '2023-01-25 01:50:41'),
(2, 'sumbawa', 'sbw', 'sulung', 'slg', '2023-01-25 01:50:41', '2023-01-25 01:50:41');

-- --------------------------------------------------------

--
-- Table structure for table `message_trackings`
--

CREATE TABLE `message_trackings` (
  `id_message_tracking` bigint UNSIGNED NOT NULL,
  `pesan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `message_trackings`
--

INSERT INTO `message_trackings` (`id_message_tracking`, `pesan`, `created_at`, `updated_at`) VALUES
(1, 'barang menunggu dikirim', '2023-01-25 01:51:11', '2023-01-25 01:51:11'),
(2, 'barang sedang di perjalanan', '2023-01-25 01:51:11', '2023-01-25 01:51:11'),
(3, 'barang sudah di gudang tujuan', '2023-01-25 01:51:11', '2023-01-25 01:51:11'),
(4, 'barang sudah di terima', '2023-01-25 01:51:11', '2023-01-25 01:51:11'),
(5, 'barang sudah lunas di kantor surabaya', '2023-01-25 01:51:11', '2023-01-25 01:51:11'),
(6, 'barang sudah lunas di tujuan', '2023-01-25 01:51:11', '2023-01-25 01:51:11');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2017_05_02_140444_create_wilayah_table', 1),
(3, '2022_10_24_232754_create_cargo_pengiriman_barangs_table', 1),
(4, '2022_11_21_080804_create_distributors_table', 1),
(5, '2022_12_20_022928_create_cargo_pengiriman_details_table', 1),
(6, '2022_12_22_055832_create_trucks_table', 1),
(7, '2022_12_24_043616_goods_category_bus_table', 1),
(8, '2022_12_26_090148_area_bus_table', 1),
(9, '2022_12_30_072849_pengiriman__bus_table', 1),
(10, '2022_12_31_160104_create_status_pembayarans_table', 1),
(11, '2023_01_01_014112_create_truck_trackings_table', 1),
(12, '2023_01_01_030748_create_message_trackings_table', 1),
(13, '2023_01_02_111156_create_kode_kotas_table', 1),
(14, '2023_01_05_064421_create_tujuan', 1),
(15, '2023_01_05_230409_create_barang_trackings_table', 1),
(16, '2023_01_20_073029_create_bus_table', 1),
(17, '2023_01_21_062357_create_cache_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `pengiriman_bus`
--

CREATE TABLE `pengiriman_bus` (
  `id_pengiriman_bus` bigint UNSIGNED NOT NULL,
  `resi` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_pengirim` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `telepon_pengirim` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_penerima` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `telepon_penerima` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `asal_barang` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tujuan_barang` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jenis_barang` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_barang` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `berat_barang` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `panjang_barang` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lebar_barang` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tinggi_barang` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jumlah_barang` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `harga_barang` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kode_user` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `status_pembayarans`
--

CREATE TABLE `status_pembayarans` (
  `id_status_pembayaran` bigint UNSIGNED NOT NULL,
  `pesan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `status_pembayarans`
--

INSERT INTO `status_pembayarans` (`id_status_pembayaran`, `pesan`, `created_at`, `updated_at`) VALUES
(1, 'bayar tujuan', '2023-01-25 01:50:55', '2023-01-25 01:50:55'),
(2, 'lunas kantor surabaya', '2023-01-25 01:50:55', '2023-01-25 01:50:55'),
(3, 'piutang toko', '2023-01-25 01:50:55', '2023-01-25 01:50:55'),
(4, 'lunas', '2023-01-25 01:50:55', '2023-01-25 01:50:55');

-- --------------------------------------------------------

--
-- Table structure for table `trucks`
--

CREATE TABLE `trucks` (
  `id_truck` bigint UNSIGNED NOT NULL,
  `no_pol` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sopir_utama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `truck_trackings`
--

CREATE TABLE `truck_trackings` (
  `id_truck_tracking` bigint UNSIGNED NOT NULL,
  `no_lmt` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_message_tracking` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_status_pembayaran` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_user` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `truck_trackings`
--

INSERT INTO `truck_trackings` (`id_truck_tracking`, `no_lmt`, `id_message_tracking`, `id_status_pembayaran`, `id_user`, `created_at`, `updated_at`) VALUES
(10, '2', '1', '1', '1', '2023-01-27 22:32:24', '2023-01-27 22:32:24'),
(11, '3', '1', '1', '1', '2023-01-27 22:32:24', '2023-01-27 22:32:24'),
(12, '4', '1', '1', '1', '2023-01-27 22:32:24', '2023-01-27 22:32:24'),
(13, '5', '1', '1', '1', '2023-01-27 22:32:24', '2023-01-27 22:32:24'),
(14, '6', '1', '1', '1', '2023-01-27 22:32:24', '2023-01-27 22:32:24'),
(15, '8', '1', '1', '1', '2023-01-27 22:32:24', '2023-01-27 22:32:24'),
(16, '9', '1', '1', '1', '2023-01-27 22:32:24', '2023-01-27 22:32:24'),
(17, '10', '1', '1', '1', '2023-01-27 22:32:24', '2023-01-27 22:32:24'),
(18, '2', '1', '1', '1', '2023-01-27 22:32:24', '2023-01-27 22:32:24'),
(19, '3', '1', '1', '1', '2023-01-27 22:32:24', '2023-01-27 22:32:24'),
(20, '4', '1', '1', '1', '2023-01-27 22:32:24', '2023-01-27 22:32:24'),
(21, '5', '1', '1', '1', '2023-01-27 22:32:24', '2023-01-27 22:32:24'),
(22, '6', '1', '1', '1', '2023-01-27 22:32:24', '2023-01-27 22:32:24'),
(23, '8', '1', '1', '1', '2023-01-27 22:32:24', '2023-01-27 22:32:24'),
(24, '9', '1', '1', '1', '2023-01-27 22:32:24', '2023-01-27 22:32:24'),
(25, '10', '1', '1', '1', '2023-01-27 22:32:24', '2023-01-27 22:32:24'),
(26, '3', '1', '4', '1', '2023-01-27 23:21:20', '2023-01-27 23:21:20'),
(27, '1', '1', '1', '1', '2023-01-27 23:21:54', '2023-01-27 23:21:54'),
(28, '4', '1', '1', '1', '2023-01-28 02:58:30', '2023-01-28 02:58:30'),
(29, '6', '1', '4', '1', '2023-01-28 02:58:30', '2023-01-28 02:58:30');

-- --------------------------------------------------------

--
-- Table structure for table `tujuan`
--

CREATE TABLE `tujuan` (
  `id_tujuan` bigint UNSIGNED NOT NULL,
  `nama_asal` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tujuan`
--

INSERT INTO `tujuan` (`id_tujuan`, `nama_asal`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Merak', 'Cilegon', '2023-01-02 09:40:32', '2023-01-02 09:40:32'),
(2, 'Merak', 'Serang', '2023-01-02 09:40:32', '2023-01-02 09:40:32'),
(3, 'Merak', 'Balaraja', '2023-01-02 09:40:32', '2023-01-02 09:40:32'),
(4, 'Merak', 'Kantor Tiara Mas Balaraja Barat', '2023-01-02 09:40:32', '2023-01-02 09:40:32'),
(5, 'Merak', 'Poris', '2023-01-02 09:40:32', '2023-01-02 09:40:32'),
(6, 'Merak', 'Kalideres', '2023-01-02 09:40:32', '2023-01-02 09:40:32'),
(7, 'Merak', 'Lebak Bulus', '2023-01-02 09:40:32', '2023-01-02 09:40:32'),
(8, 'Merak', 'Kampung Rambutan', '2023-01-02 09:40:32', '2023-01-02 09:40:32'),
(9, 'Merak', 'Pulogebang', '2023-01-02 09:40:32', '2023-01-02 09:40:32'),
(10, 'Merak', 'Agen Tiara Mas Timur (Depan Depsos)', '2023-01-02 09:40:32', '2023-01-02 09:40:32'),
(11, 'Merak', 'Cirebon', '2023-01-02 09:40:32', '2023-01-02 09:40:32'),
(12, 'Merak', 'Kantor Tiara Mas Sulung', '2023-01-02 09:40:32', '2023-01-02 09:40:32'),
(13, 'Merak', 'Kantor Tiara Mas Demak', '2023-01-02 09:40:32', '2023-01-02 09:40:32'),
(14, 'Merak', 'Kantor Tiara Mas Malang', '2023-01-02 09:40:32', '2023-01-02 09:40:32'),
(15, 'Merak', 'Kantor Tiara Mas Denpasar', '2023-01-02 09:40:32', '2023-01-02 09:40:32'),
(16, 'Merak', 'Kantor Tiara Mas Mataram', '2023-01-02 09:40:32', '2023-01-02 09:40:32'),
(17, 'Merak', 'Kantor Tiara Mas Alas', '2023-01-02 09:40:32', '2023-01-02 09:40:32'),
(18, 'Merak', 'Kantor Tiara Mas Sumbawa', '2023-01-02 09:40:32', '2023-01-02 09:40:32'),
(19, 'Merak', 'Kantor Tiara Mas Bima', '2023-01-02 09:40:32', '2023-01-02 09:40:32'),
(20, 'Cilegon', 'Merak', '2023-01-02 09:40:32', '2023-01-02 09:40:32'),
(21, 'Cilegon', 'Serang', '2023-01-02 09:40:32', '2023-01-02 09:40:32'),
(22, 'Cilegon', 'Balaraja', '2023-01-02 09:40:32', '2023-01-02 09:40:32'),
(23, 'Cilegon', 'Kantor Tiara Mas Balaraja Barat', '2023-01-02 09:40:32', '2023-01-02 09:40:32'),
(24, 'Cilegon', 'Poris', '2023-01-02 09:40:32', '2023-01-02 09:40:32'),
(25, 'Cilegon', 'Kalideres', '2023-01-02 09:40:32', '2023-01-02 09:40:32'),
(26, 'Cilegon', 'Lebak Bulus', '2023-01-02 09:40:32', '2023-01-02 09:40:32'),
(27, 'Cilegon', 'Kampung Rambutan', '2023-01-02 09:40:32', '2023-01-02 09:40:32'),
(28, 'Cilegon', 'Pulogebang', '2023-01-02 09:40:32', '2023-01-02 09:40:32'),
(29, 'Cilegon', 'Agen Tiara Mas Timur (Depan Depsos)', '2023-01-02 09:40:32', '2023-01-02 09:40:32'),
(30, 'Cilegon', 'Cirebon', '2023-01-02 09:40:32', '2023-01-02 09:40:32'),
(31, 'Cilegon', 'Kantor Tiara Mas Sulung', '2023-01-02 09:40:32', '2023-01-02 09:40:32'),
(32, 'Cilegon', 'Kantor Tiara Mas Demak', '2023-01-02 09:40:32', '2023-01-02 09:40:32'),
(33, 'Cilegon', 'Kantor Tiara Mas Malang', '2023-01-02 09:40:32', '2023-01-02 09:40:32'),
(34, 'Cilegon', 'Kantor Tiara Mas Denpasar', '2023-01-02 09:40:32', '2023-01-02 09:40:32'),
(35, 'Cilegon', 'Kantor Tiara Mas Mataram', '2023-01-02 09:40:32', '2023-01-02 09:40:32'),
(36, 'Cilegon', 'Kantor Tiara Mas Alas', '2023-01-02 09:40:32', '2023-01-02 09:40:32'),
(37, 'Cilegon', 'Kantor Tiara Mas Sumbawa', '2023-01-02 09:40:32', '2023-01-02 09:40:32'),
(38, 'Cilegon', 'Kantor Tiara Mas Bima', '2023-01-02 09:40:32', '2023-01-02 09:40:32'),
(39, 'Serang', 'Merak', '2023-01-02 09:40:32', '2023-01-02 09:40:32'),
(40, 'Serang', 'Cilegon', '2023-01-02 09:40:32', '2023-01-02 09:40:32'),
(41, 'Serang', 'Balaraja', '2023-01-02 09:40:32', '2023-01-02 09:40:32'),
(42, 'Serang', 'Kantor Tiara Mas Balaraja Barat', '2023-01-02 09:40:32', '2023-01-02 09:40:32'),
(43, 'Serang', 'Poris', '2023-01-02 09:40:32', '2023-01-02 09:40:32'),
(44, 'Serang', 'Kalideres', '2023-01-02 09:40:32', '2023-01-02 09:40:32'),
(45, 'Serang', 'Lebak Bulus', '2023-01-02 09:40:32', '2023-01-02 09:40:32'),
(46, 'Serang', 'Kampung Rambutan', '2023-01-02 09:40:32', '2023-01-02 09:40:32'),
(47, 'Serang', 'Pulogebang', '2023-01-02 09:40:32', '2023-01-02 09:40:32'),
(48, 'Serang', 'Agen Tiara Mas Timur (Depan Depsos)', '2023-01-02 09:40:32', '2023-01-02 09:40:32'),
(49, 'Serang', 'Cirebon', '2023-01-02 09:40:32', '2023-01-02 09:40:32'),
(50, 'Serang', 'Kantor Tiara Mas Sulung', '2023-01-02 09:40:32', '2023-01-02 09:40:32'),
(51, 'Serang', 'Kantor Tiara Mas Demak', '2023-01-02 09:40:32', '2023-01-02 09:40:32'),
(52, 'Serang', 'Kantor Tiara Mas Malang', '2023-01-02 09:40:32', '2023-01-02 09:40:32'),
(53, 'Serang', 'Kantor Tiara Mas Denpasar', '2023-01-02 09:40:32', '2023-01-02 09:40:32'),
(54, 'Serang', 'Kantor Tiara Mas Mataram', '2023-01-02 09:40:32', '2023-01-02 09:40:32'),
(55, 'Serang', 'Kantor Tiara Mas Alas', '2023-01-02 09:40:32', '2023-01-02 09:40:32'),
(56, 'Serang', 'Kantor Tiara Mas Sumbawa', '2023-01-02 09:40:32', '2023-01-02 09:40:32'),
(57, 'Serang', 'Kantor Tiara Mas Bima', '2023-01-02 09:40:32', '2023-01-02 09:40:32'),
(58, 'Balaraja', 'Merak', '2023-01-02 09:40:32', '2023-01-02 09:40:32'),
(59, 'Balaraja', 'Cilegon', '2023-01-02 09:40:32', '2023-01-02 09:40:32'),
(60, 'Balaraja', 'Serang', '2023-01-02 09:40:32', '2023-01-02 09:40:32'),
(61, 'Balaraja', 'Kantor Tiara Mas Balaraja Barat', '2023-01-02 09:40:32', '2023-01-02 09:40:32'),
(62, 'Balaraja', 'Poris', '2023-01-02 09:40:32', '2023-01-02 09:40:32'),
(63, 'Balaraja', 'Kalideres', '2023-01-02 09:40:32', '2023-01-02 09:40:32'),
(64, 'Balaraja', 'Lebak Bulus', '2023-01-02 09:40:32', '2023-01-02 09:40:32'),
(65, 'Balaraja', 'Kampung Rambutan', '2023-01-02 09:40:32', '2023-01-02 09:40:32'),
(66, 'Balaraja', 'Pulogebang', '2023-01-02 09:40:32', '2023-01-02 09:40:32'),
(67, 'Balaraja', 'Agen Tiara Mas Timur (Depan Depsos)', '2023-01-02 09:40:32', '2023-01-02 09:40:32'),
(68, 'Balaraja', 'Cirebon', '2023-01-02 09:40:32', '2023-01-02 09:40:32'),
(69, 'Balaraja', 'Kantor Tiara Mas Sulung', '2023-01-02 09:40:32', '2023-01-02 09:40:32'),
(70, 'Balaraja', 'Kantor Tiara Mas Demak', '2023-01-02 09:40:32', '2023-01-02 09:40:32'),
(71, 'Balaraja', 'Kantor Tiara Mas Malang', '2023-01-02 09:40:32', '2023-01-02 09:40:32'),
(72, 'Balaraja', 'Kantor Tiara Mas Denpasar', '2023-01-02 09:40:32', '2023-01-02 09:40:32'),
(73, 'Balaraja', 'Kantor Tiara Mas Mataram', '2023-01-02 09:40:32', '2023-01-02 09:40:32'),
(74, 'Balaraja', 'Kantor Tiara Mas Alas', '2023-01-02 09:40:32', '2023-01-02 09:40:32'),
(75, 'Balaraja', 'Kantor Tiara Mas Sumbawa', '2023-01-02 09:40:32', '2023-01-02 09:40:32'),
(76, 'Balaraja', 'Kantor Tiara Mas Bima', '2023-01-02 09:40:32', '2023-01-02 09:40:32'),
(77, 'Kantor Tiara Mas Balaraja Barat', 'Merak', '2023-01-02 09:40:32', '2023-01-02 09:40:32'),
(78, 'Kantor Tiara Mas Balaraja Barat', 'Cilegon', '2023-01-02 09:40:32', '2023-01-02 09:40:32'),
(79, 'Kantor Tiara Mas Balaraja Barat', 'Serang', '2023-01-02 09:40:32', '2023-01-02 09:40:32'),
(80, 'Kantor Tiara Mas Balaraja Barat', 'Balaraja', '2023-01-02 09:40:32', '2023-01-02 09:40:32'),
(81, 'Kantor Tiara Mas Balaraja Barat', 'Poris', '2023-01-02 09:40:32', '2023-01-02 09:40:32'),
(82, 'Kantor Tiara Mas Balaraja Barat', 'Kalideres', '2023-01-02 09:40:32', '2023-01-02 09:40:32'),
(83, 'Kantor Tiara Mas Balaraja Barat', 'Lebak Bulus', '2023-01-02 09:40:32', '2023-01-02 09:40:32'),
(84, 'Kantor Tiara Mas Balaraja Barat', 'Kampung Rambutan', '2023-01-02 09:40:32', '2023-01-02 09:40:32'),
(85, 'Kantor Tiara Mas Balaraja Barat', 'Pulogebang', '2023-01-02 09:40:32', '2023-01-02 09:40:32'),
(86, 'Kantor Tiara Mas Balaraja Barat', 'Agen Tiara Mas Timur (Depan Depsos)', '2023-01-02 09:40:32', '2023-01-02 09:40:32'),
(87, 'Kantor Tiara Mas Balaraja Barat', 'Cirebon', '2023-01-02 09:40:32', '2023-01-02 09:40:32'),
(88, 'Kantor Tiara Mas Balaraja Barat', 'Kantor Tiara Mas Sulung', '2023-01-02 09:40:32', '2023-01-02 09:40:32'),
(89, 'Kantor Tiara Mas Balaraja Barat', 'Kantor Tiara Mas Demak', '2023-01-02 09:40:32', '2023-01-02 09:40:32'),
(90, 'Kantor Tiara Mas Balaraja Barat', 'Kantor Tiara Mas Malang', '2023-01-02 09:40:32', '2023-01-02 09:40:32'),
(91, 'Kantor Tiara Mas Balaraja Barat', 'Kantor Tiara Mas Denpasar', '2023-01-02 09:40:32', '2023-01-02 09:40:32'),
(92, 'Kantor Tiara Mas Balaraja Barat', 'Kantor Tiara Mas Mataram', '2023-01-02 09:40:32', '2023-01-02 09:40:32'),
(93, 'Kantor Tiara Mas Balaraja Barat', 'Kantor Tiara Mas Alas', '2023-01-02 09:40:32', '2023-01-02 09:40:32'),
(94, 'Kantor Tiara Mas Balaraja Barat', 'Kantor Tiara Mas Sumbawa', '2023-01-02 09:40:32', '2023-01-02 09:40:32'),
(95, 'Kantor Tiara Mas Balaraja Barat', 'Kantor Tiara Mas Bima', '2023-01-02 09:40:32', '2023-01-02 09:40:32'),
(96, 'Poris', 'Merak', '2023-01-02 09:40:32', '2023-01-02 09:40:32'),
(97, 'Poris', 'Cilegon', '2023-01-02 09:40:32', '2023-01-02 09:40:32'),
(98, 'Poris', 'Serang', '2023-01-02 09:40:32', '2023-01-02 09:40:32'),
(99, 'Poris', 'Balaraja', '2023-01-02 09:40:32', '2023-01-02 09:40:32'),
(100, 'Poris', 'Kantor Tiara Mas Balaraja Barat', '2023-01-02 09:40:32', '2023-01-02 09:40:32'),
(101, 'Poris', 'Kalideres', '2023-01-02 09:40:32', '2023-01-02 09:40:32'),
(102, 'Poris', 'Lebak Bulus', '2023-01-02 09:40:32', '2023-01-02 09:40:32'),
(103, 'Poris', 'Kampung Rambutan', '2023-01-02 09:40:32', '2023-01-02 09:40:32'),
(104, 'Poris', 'Pulogebang', '2023-01-02 09:40:32', '2023-01-02 09:40:32'),
(105, 'Poris', 'Agen Tiara Mas Timur (Depan Depsos)', '2023-01-02 09:40:32', '2023-01-02 09:40:32'),
(106, 'Poris', 'Cirebon', '2023-01-02 09:40:32', '2023-01-02 09:40:32'),
(107, 'Poris', 'Kantor Tiara Mas Sulung', '2023-01-02 09:40:32', '2023-01-02 09:40:32'),
(108, 'Poris', 'Kantor Tiara Mas Demak', '2023-01-02 09:40:32', '2023-01-02 09:40:32'),
(109, 'Poris', 'Kantor Tiara Mas Malang', '2023-01-02 09:40:32', '2023-01-02 09:40:32'),
(110, 'Poris', 'Kantor Tiara Mas Denpasar', '2023-01-02 09:40:32', '2023-01-02 09:40:32'),
(111, 'Poris', 'Kantor Tiara Mas Mataram', '2023-01-02 09:40:32', '2023-01-02 09:40:32'),
(112, 'Poris', 'Kantor Tiara Mas Alas', '2023-01-02 09:40:32', '2023-01-02 09:40:32'),
(113, 'Poris', 'Kantor Tiara Mas Sumbawa', '2023-01-02 09:40:32', '2023-01-02 09:40:32'),
(114, 'Poris', 'Kantor Tiara Mas Bima', '2023-01-02 09:40:32', '2023-01-02 09:40:32'),
(115, 'Kalideres', 'Merak', '2023-01-02 09:40:32', '2023-01-02 09:40:32'),
(116, 'Kalideres', 'Cilegon', '2023-01-02 09:40:32', '2023-01-02 09:40:32'),
(117, 'Kalideres', 'Serang', '2023-01-02 09:40:32', '2023-01-02 09:40:32'),
(118, 'Kalideres', 'Balaraja', '2023-01-02 09:40:32', '2023-01-02 09:40:32'),
(119, 'Kalideres', 'Kantor Tiara Mas Balaraja Barat', '2023-01-02 09:40:32', '2023-01-02 09:40:32'),
(120, 'Kalideres', 'Poris', '2023-01-02 09:40:32', '2023-01-02 09:40:32'),
(121, 'Kalideres', 'Lebak Bulus', '2023-01-02 09:40:32', '2023-01-02 09:40:32'),
(122, 'Kalideres', 'Kampung Rambutan', '2023-01-02 09:40:32', '2023-01-02 09:40:32'),
(123, 'Kalideres', 'Pulogebang', '2023-01-02 09:40:32', '2023-01-02 09:40:32'),
(124, 'Kalideres', 'Agen Tiara Mas Timur (Depan Depsos)', '2023-01-02 09:40:32', '2023-01-02 09:40:32'),
(125, 'Kalideres', 'Cirebon', '2023-01-02 09:40:32', '2023-01-02 09:40:32'),
(126, 'Kalideres', 'Kantor Tiara Mas Sulung', '2023-01-02 09:40:32', '2023-01-02 09:40:32'),
(127, 'Kalideres', 'Kantor Tiara Mas Demak', '2023-01-02 09:40:32', '2023-01-02 09:40:32'),
(128, 'Kalideres', 'Kantor Tiara Mas Malang', '2023-01-02 09:40:32', '2023-01-02 09:40:32'),
(129, 'Kalideres', 'Kantor Tiara Mas Denpasar', '2023-01-02 09:40:32', '2023-01-02 09:40:32'),
(130, 'Kalideres', 'Kantor Tiara Mas Mataram', '2023-01-02 09:40:32', '2023-01-02 09:40:32'),
(131, 'Kalideres', 'Kantor Tiara Mas Alas', '2023-01-02 09:40:32', '2023-01-02 09:40:32'),
(132, 'Kalideres', 'Kantor Tiara Mas Sumbawa', '2023-01-02 09:40:32', '2023-01-02 09:40:32'),
(133, 'Lebak Bulus', 'Kantor Tiara Mas Bima', '2023-01-02 09:40:32', '2023-01-02 09:40:32'),
(134, 'Lebak Bulus', 'Merak', '2023-01-02 09:40:32', '2023-01-02 09:40:32'),
(135, 'Lebak Bulus', 'Cilegon', '2023-01-02 09:40:32', '2023-01-02 09:40:32'),
(136, 'Lebak Bulus', 'Serang', '2023-01-02 09:40:32', '2023-01-02 09:40:32'),
(137, 'Lebak Bulus', 'Balaraja', '2023-01-02 09:40:32', '2023-01-02 09:40:32'),
(138, 'Lebak Bulus', 'Kantor Tiara Mas Balaraja Barat', '2023-01-02 09:40:32', '2023-01-02 09:40:32'),
(139, 'Lebak Bulus', 'Poris', '2023-01-02 09:40:32', '2023-01-02 09:40:32'),
(140, 'Lebak Bulus', 'Kalideres', '2023-01-02 09:40:32', '2023-01-02 09:40:32'),
(141, 'Lebak Bulus', 'Kampung Rambutan', '2023-01-02 09:40:32', '2023-01-02 09:40:32'),
(142, 'Lebak Bulus', 'Pulogebang', '2023-01-02 09:40:32', '2023-01-02 09:40:32'),
(143, 'Lebak Bulus', 'Agen Tiara Mas Timur (Depan Depsos)', '2023-01-02 09:40:32', '2023-01-02 09:40:32'),
(144, 'Lebak Bulus', 'Cirebon', '2023-01-02 09:40:32', '2023-01-02 09:40:32'),
(145, 'Lebak Bulus', 'Kantor Tiara Mas Sulung', '2023-01-02 09:40:32', '2023-01-02 09:40:32'),
(146, 'Lebak Bulus', 'Kantor Tiara Mas Demak', '2023-01-02 09:40:32', '2023-01-02 09:40:32'),
(147, 'Lebak Bulus', 'Kantor Tiara Mas Malang', '2023-01-02 09:40:32', '2023-01-02 09:40:32'),
(148, 'Lebak Bulus', 'Kantor Tiara Mas Denpasar', '2023-01-02 09:40:32', '2023-01-02 09:40:32'),
(149, 'Lebak Bulus', 'Kantor Tiara Mas Mataram', '2023-01-02 09:40:32', '2023-01-02 09:40:32'),
(150, 'Lebak Bulus', 'Kantor Tiara Mas Alas', '2023-01-02 09:40:32', '2023-01-02 09:40:32'),
(151, 'Lebak Bulus', 'Kantor Tiara Mas Sumbawa', '2023-01-02 09:40:32', '2023-01-02 09:40:32'),
(152, 'Lebak Bulus', 'Kantor Tiara Mas Bima', '2023-01-02 09:40:32', '2023-01-02 09:40:32'),
(153, 'Kampung Rambutan', 'Merak', '2023-01-02 09:40:32', '2023-01-02 09:40:32'),
(154, 'Kampung Rambutan', 'Cilegon', '2023-01-02 09:40:32', '2023-01-02 09:40:32'),
(155, 'Kampung Rambutan', 'Serang', '2023-01-02 09:40:32', '2023-01-02 09:40:32'),
(156, 'Kampung Rambutan', 'Balaraja', '2023-01-02 09:40:32', '2023-01-02 09:40:32'),
(157, 'Kampung Rambutan', 'Kantor Tiara Mas Balaraja Barat', '2023-01-02 09:40:32', '2023-01-02 09:40:32'),
(158, 'Kampung Rambutan', 'Poris', '2023-01-02 09:40:32', '2023-01-02 09:40:32'),
(159, 'Kampung Rambutan', 'Kalideres', '2023-01-02 09:40:32', '2023-01-02 09:40:32'),
(160, 'Kampung Rambutan', 'Lebak Bulus', '2023-01-02 09:40:32', '2023-01-02 09:40:32'),
(161, 'Kampung Rambutan', 'Pulogebang', '2023-01-02 09:40:32', '2023-01-02 09:40:32'),
(162, 'Kampung Rambutan', 'Agen Tiara Mas Timur (Depan Depsos)', '2023-01-02 09:40:32', '2023-01-02 09:40:32'),
(163, 'Kampung Rambutan', 'Cirebon', '2023-01-02 09:40:32', '2023-01-02 09:40:32'),
(164, 'Kampung Rambutan', 'Kantor Tiara Mas Sulung', '2023-01-02 09:40:32', '2023-01-02 09:40:32'),
(165, 'Kampung Rambutan', 'Kantor Tiara Mas Demak', '2023-01-02 09:40:32', '2023-01-02 09:40:32'),
(166, 'Kampung Rambutan', 'Kantor Tiara Mas Malang', '2023-01-02 09:40:32', '2023-01-02 09:40:32'),
(167, 'Kampung Rambutan', 'Kantor Tiara Mas Denpasar', '2023-01-02 09:40:32', '2023-01-02 09:40:32'),
(168, 'Kampung Rambutan', 'Kantor Tiara Mas Mataram', '2023-01-02 09:40:32', '2023-01-02 09:40:32'),
(169, 'Kampung Rambutan', 'Kantor Tiara Mas Alas', '2023-01-02 09:40:32', '2023-01-02 09:40:32'),
(170, 'Kampung Rambutan', 'Kantor Tiara Mas Sumbawa', '2023-01-02 09:40:32', '2023-01-02 09:40:32'),
(171, 'Kampung Rambutan', 'Kantor Tiara Mas Bima', '2023-01-02 09:40:32', '2023-01-02 09:40:32'),
(172, 'Pulogebang', 'Merak', '2023-01-02 09:40:32', '2023-01-02 09:40:32'),
(173, 'Pulogebang', 'Cilegon', '2023-01-02 09:40:32', '2023-01-02 09:40:32'),
(174, 'Pulogebang', 'Serang', '2023-01-02 09:40:32', '2023-01-02 09:40:32'),
(175, 'Pulogebang', 'Balaraja', '2023-01-02 09:40:32', '2023-01-02 09:40:32'),
(176, 'Pulogebang', 'Kantor Tiara Mas Balaraja Barat', '2023-01-02 09:40:32', '2023-01-02 09:40:32'),
(177, 'Pulogebang', 'Poris', '2023-01-02 09:40:32', '2023-01-02 09:40:32'),
(178, 'Pulogebang', 'Kalideres', '2023-01-02 09:40:32', '2023-01-02 09:40:32'),
(179, 'Pulogebang', 'Lebak Bulus', '2023-01-02 09:40:32', '2023-01-02 09:40:32'),
(180, 'Pulogebang', 'Kampung Rambutan', '2023-01-02 09:40:32', '2023-01-02 09:40:32'),
(181, 'Pulogebang', 'Agen Tiara Mas Timur (Depan Depsos)', '2023-01-02 09:40:32', '2023-01-02 09:40:32'),
(182, 'Pulogebang', 'Cirebon', '2023-01-02 09:40:32', '2023-01-02 09:40:32'),
(183, 'Pulogebang', 'Kantor Tiara Mas Sulung', '2023-01-02 09:40:32', '2023-01-02 09:40:32'),
(184, 'Pulogebang', 'Kantor Tiara Mas Demak', '2023-01-02 09:40:32', '2023-01-02 09:40:32'),
(185, 'Pulogebang', 'Kantor Tiara Mas Malang', '2023-01-02 09:40:32', '2023-01-02 09:40:32'),
(186, 'Pulogebang', 'Kantor Tiara Mas Denpasar', '2023-01-02 09:40:32', '2023-01-02 09:40:32'),
(187, 'Pulogebang', 'Kantor Tiara Mas Mataram', '2023-01-02 09:40:32', '2023-01-02 09:40:32'),
(188, 'Pulogebang', 'Kantor Tiara Mas Alas', '2023-01-02 09:40:32', '2023-01-02 09:40:32'),
(189, 'Pulogebang', 'Kantor Tiara Mas Sumbawa', '2023-01-02 09:40:32', '2023-01-02 09:40:32'),
(190, 'Pulogebang', 'Kantor Tiara Mas Bima', '2023-01-02 09:40:32', '2023-01-02 09:40:32'),
(191, 'Agen Tiara Mas Timur (Depan Depsos)', 'Merak', '2023-01-02 09:40:32', '2023-01-02 09:40:32'),
(192, 'Agen Tiara Mas Timur (Depan Depsos)', 'Cilegon', '2023-01-02 09:40:32', '2023-01-02 09:40:32'),
(193, 'Agen Tiara Mas Timur (Depan Depsos)', 'Serang', '2023-01-02 09:40:32', '2023-01-02 09:40:32'),
(194, 'Agen Tiara Mas Timur (Depan Depsos)', 'Balaraja', '2023-01-02 09:40:32', '2023-01-02 09:40:32'),
(195, 'Agen Tiara Mas Timur (Depan Depsos)', 'Kantor Tiara Mas Balaraja Barat', '2023-01-02 09:40:32', '2023-01-02 09:40:32'),
(196, 'Agen Tiara Mas Timur (Depan Depsos)', 'Poris', '2023-01-02 09:40:32', '2023-01-02 09:40:32'),
(197, 'Agen Tiara Mas Timur (Depan Depsos)', 'Kalideres', '2023-01-02 09:40:32', '2023-01-02 09:40:32'),
(198, 'Agen Tiara Mas Timur (Depan Depsos)', 'Lebak Bulus', '2023-01-02 09:40:32', '2023-01-02 09:40:32'),
(199, 'Agen Tiara Mas Timur (Depan Depsos)', 'Kampung Rambutan', '2023-01-02 09:40:32', '2023-01-02 09:40:32'),
(200, 'Agen Tiara Mas Timur (Depan Depsos)', 'Pulogebang', '2023-01-02 09:40:32', '2023-01-02 09:40:32'),
(201, 'Agen Tiara Mas Timur (Depan Depsos)', 'Cirebon', '2023-01-02 09:40:32', '2023-01-02 09:40:32'),
(202, 'Agen Tiara Mas Timur (Depan Depsos)', 'Kantor Tiara Mas Sulung', '2023-01-02 09:40:32', '2023-01-02 09:40:32'),
(203, 'Agen Tiara Mas Timur (Depan Depsos)', 'Kantor Tiara Mas Demak', '2023-01-02 09:40:32', '2023-01-02 09:40:32'),
(204, 'Agen Tiara Mas Timur (Depan Depsos)', 'Kantor Tiara Mas Malang', '2023-01-02 09:40:32', '2023-01-02 09:40:32'),
(205, 'Agen Tiara Mas Timur (Depan Depsos)', 'Kantor Tiara Mas Denpasar', '2023-01-02 09:40:32', '2023-01-02 09:40:32'),
(206, 'Agen Tiara Mas Timur (Depan Depsos)', 'Kantor Tiara Mas Mataram', '2023-01-02 09:40:32', '2023-01-02 09:40:32'),
(207, 'Agen Tiara Mas Timur (Depan Depsos)', 'Kantor Tiara Mas Alas', '2023-01-02 09:40:32', '2023-01-02 09:40:32'),
(208, 'Agen Tiara Mas Timur (Depan Depsos)', 'Kantor Tiara Mas Sumbawa', '2023-01-02 09:40:32', '2023-01-02 09:40:32'),
(209, 'Agen Tiara Mas Timur (Depan Depsos)', 'Kantor Tiara Mas Bima', '2023-01-02 09:40:32', '2023-01-02 09:40:32'),
(210, 'Cirebon', 'Merak', '2023-01-02 09:40:32', '2023-01-02 09:40:32'),
(211, 'Cirebon', 'Cilegon', '2023-01-02 09:40:32', '2023-01-02 09:40:32'),
(212, 'Cirebon', 'Serang', '2023-01-02 09:40:32', '2023-01-02 09:40:32'),
(213, 'Cirebon', 'Balaraja', '2023-01-02 09:40:32', '2023-01-02 09:40:32'),
(214, 'Cirebon', 'Kantor Tiara Mas Balaraja Barat', '2023-01-02 09:40:32', '2023-01-02 09:40:32'),
(215, 'Cirebon', 'Poris', '2023-01-02 09:40:32', '2023-01-02 09:40:32'),
(216, 'Cirebon', 'Kalideres', '2023-01-02 09:40:32', '2023-01-02 09:40:32'),
(217, 'Cirebon', 'Lebak Bulus', '2023-01-02 09:40:32', '2023-01-02 09:40:32'),
(218, 'Cirebon', 'Kampung Rambutan', '2023-01-02 09:40:32', '2023-01-02 09:40:32'),
(219, 'Cirebon', 'Pulogebang', '2023-01-02 09:40:32', '2023-01-02 09:40:32'),
(220, 'Cirebon', 'Agen Tiara Mas Timur (Depan Depsos)', '2023-01-02 09:40:32', '2023-01-02 09:40:32'),
(221, 'Cirebon', 'Kantor Tiara Mas Sulung', '2023-01-02 09:40:32', '2023-01-02 09:40:32'),
(222, 'Cirebon', 'Kantor Tiara Mas Demak', '2023-01-02 09:40:32', '2023-01-02 09:40:32'),
(223, 'Cirebon', 'Kantor Tiara Mas Malang', '2023-01-02 09:40:32', '2023-01-02 09:40:32'),
(224, 'Cirebon', 'Kantor Tiara Mas Denpasar', '2023-01-02 09:40:32', '2023-01-02 09:40:32'),
(225, 'Cirebon', 'Kantor Tiara Mas Mataram', '2023-01-02 09:40:32', '2023-01-02 09:40:32'),
(226, 'Cirebon', 'Kantor Tiara Mas Alas', '2023-01-02 09:40:32', '2023-01-02 09:40:32'),
(227, 'Cirebon', 'Kantor Tiara Mas Sumbawa', '2023-01-02 09:40:32', '2023-01-02 09:40:32'),
(228, 'Cirebon', 'Kantor Tiara Mas Bima', '2023-01-02 09:40:32', '2023-01-02 09:40:32'),
(229, 'Kantor Tiara Mas Sulung', 'Merak', '2023-01-02 09:40:32', '2023-01-02 09:40:32'),
(230, 'Kantor Tiara Mas Sulung', 'Cilegon', '2023-01-02 09:40:32', '2023-01-02 09:40:32'),
(231, 'Kantor Tiara Mas Sulung', 'Serang', '2023-01-02 09:40:32', '2023-01-02 09:40:32'),
(232, 'Kantor Tiara Mas Sulung', 'Balaraja', '2023-01-02 09:40:32', '2023-01-02 09:40:32'),
(233, 'Kantor Tiara Mas Sulung', 'Kantor Tiara Mas Balaraja Barat', '2023-01-02 09:40:32', '2023-01-02 09:40:32'),
(234, 'Kantor Tiara Mas Sulung', 'Poris', '2023-01-02 09:40:32', '2023-01-02 09:40:32'),
(235, 'Kantor Tiara Mas Sulung', 'Kalideres', '2023-01-02 09:40:32', '2023-01-02 09:40:32'),
(236, 'Kantor Tiara Mas Sulung', 'Lebak Bulus', '2023-01-02 09:40:32', '2023-01-02 09:40:32'),
(237, 'Kantor Tiara Mas Sulung', 'Kampung Rambutan', '2023-01-02 09:40:32', '2023-01-02 09:40:32'),
(238, 'Kantor Tiara Mas Sulung', 'Pulogebang', '2023-01-02 09:40:32', '2023-01-02 09:40:32'),
(239, 'Kantor Tiara Mas Sulung', 'Agen Tiara Mas Timur (Depan Depsos)', '2023-01-02 09:40:32', '2023-01-02 09:40:32'),
(240, 'Kantor Tiara Mas Sulung', 'Cirebon', '2023-01-02 09:40:32', '2023-01-02 09:40:32'),
(241, 'Kantor Tiara Mas Sulung', 'Kantor Tiara Mas Demak', '2023-01-02 09:40:32', '2023-01-02 09:40:32'),
(242, 'Kantor Tiara Mas Sulung', 'Kantor Tiara Mas Malang', '2023-01-02 09:40:32', '2023-01-02 09:40:32'),
(243, 'Kantor Tiara Mas Sulung', 'Kantor Tiara Mas Denpasar', '2023-01-02 09:40:32', '2023-01-02 09:40:32'),
(244, 'Kantor Tiara Mas Sulung', 'Kantor Tiara Mas Mataram', '2023-01-02 09:40:32', '2023-01-02 09:40:32'),
(245, 'Kantor Tiara Mas Sulung', 'Kantor Tiara Mas Alas', '2023-01-02 09:40:32', '2023-01-02 09:40:32'),
(246, 'Kantor Tiara Mas Sulung', 'Kantor Tiara Mas Sumbawa', '2023-01-02 09:40:32', '2023-01-02 09:40:32'),
(247, 'Kantor Tiara Mas Sulung', 'Kantor Tiara Mas Bima', '2023-01-02 09:40:32', '2023-01-02 09:40:32'),
(248, 'Kantor Tiara Mas Demak', 'Merak', '2023-01-02 09:40:32', '2023-01-02 09:40:32'),
(249, 'Kantor Tiara Mas Demak', 'Cilegon', '2023-01-02 09:40:32', '2023-01-02 09:40:32'),
(250, 'Kantor Tiara Mas Demak', 'Serang', '2023-01-02 09:40:32', '2023-01-02 09:40:32'),
(251, 'Kantor Tiara Mas Demak', 'Balaraja', '2023-01-02 09:40:32', '2023-01-02 09:40:32'),
(252, 'Kantor Tiara Mas Demak', 'Kantor Tiara Mas Balaraja Barat', '2023-01-02 09:40:32', '2023-01-02 09:40:32'),
(253, 'Kantor Tiara Mas Demak', 'Poris', '2023-01-02 09:40:32', '2023-01-02 09:40:32'),
(254, 'Kantor Tiara Mas Demak', 'Kalideres', '2023-01-02 09:40:32', '2023-01-02 09:40:32'),
(255, 'Kantor Tiara Mas Demak', 'Lebak Bulus', '2023-01-02 09:40:32', '2023-01-02 09:40:32'),
(256, 'Kantor Tiara Mas Demak', 'Kampung Rambutan', '2023-01-02 09:40:32', '2023-01-02 09:40:32'),
(257, 'Kantor Tiara Mas Demak', 'Pulogebang', '2023-01-02 09:40:32', '2023-01-02 09:40:32'),
(258, 'Kantor Tiara Mas Demak', 'Agen Tiara Mas Timur (Depan Depsos)', '2023-01-02 09:40:32', '2023-01-02 09:40:32'),
(259, 'Kantor Tiara Mas Demak', 'Cirebon', '2023-01-02 09:40:32', '2023-01-02 09:40:32'),
(260, 'Kantor Tiara Mas Demak', 'Kantor Tiara Mas Sulung', '2023-01-02 09:40:32', '2023-01-02 09:40:32'),
(261, 'Kantor Tiara Mas Demak', 'Kantor Tiara Mas Malang', '2023-01-02 09:40:32', '2023-01-02 09:40:32'),
(262, 'Kantor Tiara Mas Demak', 'Kantor Tiara Mas Denpasar', '2023-01-02 09:40:32', '2023-01-02 09:40:32'),
(263, 'Kantor Tiara Mas Demak', 'Kantor Tiara Mas Mataram', '2023-01-02 09:40:32', '2023-01-02 09:40:32'),
(264, 'Kantor Tiara Mas Demak', 'Kantor Tiara Mas Alas', '2023-01-02 09:40:32', '2023-01-02 09:40:32'),
(265, 'Kantor Tiara Mas Demak', 'Kantor Tiara Mas Sumbawa', '2023-01-02 09:40:32', '2023-01-02 09:40:32'),
(266, 'Kantor Tiara Mas Demak', 'Kantor Tiara Mas Bima', '2023-01-02 09:40:32', '2023-01-02 09:40:32'),
(267, 'Kantor Tiara Mas Malang', 'Merak', '2023-01-02 09:40:32', '2023-01-02 09:40:32'),
(268, 'Kantor Tiara Mas Malang', 'Cilegon', '2023-01-02 09:40:32', '2023-01-02 09:40:32'),
(269, 'Kantor Tiara Mas Malang', 'Serang', '2023-01-02 09:40:32', '2023-01-02 09:40:32'),
(270, 'Kantor Tiara Mas Malang', 'Balaraja', '2023-01-02 09:40:32', '2023-01-02 09:40:32'),
(271, 'Kantor Tiara Mas Malang', 'Kantor Tiara Mas Balaraja Barat', '2023-01-02 09:40:32', '2023-01-02 09:40:32'),
(272, 'Kantor Tiara Mas Malang', 'Poris', '2023-01-02 09:40:32', '2023-01-02 09:40:32'),
(273, 'Kantor Tiara Mas Malang', 'Kalideres', '2023-01-02 09:40:32', '2023-01-02 09:40:32'),
(274, 'Kantor Tiara Mas Malang', 'Lebak Bulus', '2023-01-02 09:40:32', '2023-01-02 09:40:32'),
(275, 'Kantor Tiara Mas Malang', 'Kampung Rambutan', '2023-01-02 09:40:32', '2023-01-02 09:40:32'),
(276, 'Kantor Tiara Mas Malang', 'Pulogebang', '2023-01-02 09:40:32', '2023-01-02 09:40:32'),
(277, 'Kantor Tiara Mas Malang', 'Agen Tiara Mas Timur (Depan Depsos)', '2023-01-02 09:40:32', '2023-01-02 09:40:32'),
(278, 'Kantor Tiara Mas Malang', 'Cirebon', '2023-01-02 09:40:32', '2023-01-02 09:40:32'),
(279, 'Kantor Tiara Mas Malang', 'Kantor Tiara Mas Sulung', '2023-01-02 09:40:32', '2023-01-02 09:40:32'),
(280, 'Kantor Tiara Mas Malang', 'Kantor Tiara Mas Demak', '2023-01-02 09:40:32', '2023-01-02 09:40:32'),
(281, 'Kantor Tiara Mas Malang', 'Kantor Tiara Mas Denpasar', '2023-01-02 09:40:32', '2023-01-02 09:40:32'),
(282, 'Kantor Tiara Mas Malang', 'Kantor Tiara Mas Mataram', '2023-01-02 09:40:32', '2023-01-02 09:40:32'),
(283, 'Kantor Tiara Mas Malang', 'Kantor Tiara Mas Alas', '2023-01-02 09:40:32', '2023-01-02 09:40:32'),
(284, 'Kantor Tiara Mas Malang', 'Kantor Tiara Mas Sumbawa', '2023-01-02 09:40:32', '2023-01-02 09:40:32'),
(285, 'Kantor Tiara Mas Malang', 'Kantor Tiara Mas Bima', '2023-01-02 09:40:32', '2023-01-02 09:40:32'),
(286, 'Kantor Tiara Mas Denpasar', 'Merak', '2023-01-02 09:40:32', '2023-01-02 09:40:32'),
(287, 'Kantor Tiara Mas Denpasar', 'Cilegon', '2023-01-02 09:40:32', '2023-01-02 09:40:32'),
(288, 'Kantor Tiara Mas Denpasar', 'Serang', '2023-01-02 09:40:32', '2023-01-02 09:40:32'),
(289, 'Kantor Tiara Mas Denpasar', 'Balaraja', '2023-01-02 09:40:32', '2023-01-02 09:40:32'),
(290, 'Kantor Tiara Mas Denpasar', 'Kantor Tiara Mas Balaraja Barat', '2023-01-02 09:40:32', '2023-01-02 09:40:32'),
(291, 'Kantor Tiara Mas Denpasar', 'Poris', '2023-01-02 09:40:32', '2023-01-02 09:40:32'),
(292, 'Kantor Tiara Mas Denpasar', 'Kalideres', '2023-01-02 09:40:32', '2023-01-02 09:40:32'),
(293, 'Kantor Tiara Mas Denpasar', 'Lebak Bulus', '2023-01-02 09:40:32', '2023-01-02 09:40:32'),
(294, 'Kantor Tiara Mas Denpasar', 'Kampung Rambutan', '2023-01-02 09:40:32', '2023-01-02 09:40:32'),
(295, 'Kantor Tiara Mas Denpasar', 'Pulogebang', '2023-01-02 09:40:32', '2023-01-02 09:40:32'),
(296, 'Kantor Tiara Mas Denpasar', 'Agen Tiara Mas Timur (Depan Depsos)', '2023-01-02 09:40:32', '2023-01-02 09:40:32'),
(297, 'Kantor Tiara Mas Denpasar', 'Cirebon', '2023-01-02 09:40:32', '2023-01-02 09:40:32'),
(298, 'Kantor Tiara Mas Denpasar', 'Kantor Tiara Mas Sulung', '2023-01-02 09:40:32', '2023-01-02 09:40:32'),
(299, 'Kantor Tiara Mas Denpasar', 'Kantor Tiara Mas Demak', '2023-01-02 09:40:32', '2023-01-02 09:40:32'),
(300, 'Kantor Tiara Mas Denpasar', 'Kantor Tiara Mas Malang', '2023-01-02 09:40:32', '2023-01-02 09:40:32'),
(301, 'Kantor Tiara Mas Denpasar', 'Kantor Tiara Mas Mataram', '2023-01-02 09:40:32', '2023-01-02 09:40:32'),
(302, 'Kantor Tiara Mas Denpasar', 'Kantor Tiara Mas Alas', '2023-01-02 09:40:32', '2023-01-02 09:40:32'),
(303, 'Kantor Tiara Mas Denpasar', 'Kantor Tiara Mas Sumbawa', '2023-01-02 09:40:32', '2023-01-02 09:40:32'),
(304, 'Kantor Tiara Mas Denpasar', 'Kantor Tiara Mas Bima', '2023-01-02 09:40:32', '2023-01-02 09:40:32'),
(305, 'Kantor Tiara Mas Mataram', 'Merak', '2023-01-02 09:40:32', '2023-01-02 09:40:32'),
(306, 'Kantor Tiara Mas Mataram', 'Cilegon', '2023-01-02 09:40:32', '2023-01-02 09:40:32'),
(307, 'Kantor Tiara Mas Mataram', 'Serang', '2023-01-02 09:40:32', '2023-01-02 09:40:32'),
(308, 'Kantor Tiara Mas Mataram', 'Balaraja', '2023-01-02 09:40:32', '2023-01-02 09:40:32'),
(309, 'Kantor Tiara Mas Mataram', 'Kantor Tiara Mas Balaraja Barat', '2023-01-02 09:40:32', '2023-01-02 09:40:32'),
(310, 'Kantor Tiara Mas Mataram', 'Poris', '2023-01-02 09:40:32', '2023-01-02 09:40:32'),
(311, 'Kantor Tiara Mas Mataram', 'Kalideres', '2023-01-02 09:40:32', '2023-01-02 09:40:32'),
(312, 'Kantor Tiara Mas Mataram', 'Lebak Bulus', '2023-01-02 09:40:32', '2023-01-02 09:40:32'),
(313, 'Kantor Tiara Mas Mataram', 'Kampung Rambutan', '2023-01-02 09:40:32', '2023-01-02 09:40:32'),
(314, 'Kantor Tiara Mas Mataram', 'Pulogebang', '2023-01-02 09:40:32', '2023-01-02 09:40:32'),
(315, 'Kantor Tiara Mas Mataram', 'Agen Tiara Mas Timur (Depan Depsos)', '2023-01-02 09:40:32', '2023-01-02 09:40:32'),
(316, 'Kantor Tiara Mas Mataram', 'Cirebon', '2023-01-02 09:40:32', '2023-01-02 09:40:32'),
(317, 'Kantor Tiara Mas Mataram', 'Kantor Tiara Mas Sulung', '2023-01-02 09:40:32', '2023-01-02 09:40:32'),
(318, 'Kantor Tiara Mas Mataram', 'Kantor Tiara Mas Demak', '2023-01-02 09:40:32', '2023-01-02 09:40:32'),
(319, 'Kantor Tiara Mas Mataram', 'Kantor Tiara Mas Malang', '2023-01-02 09:40:32', '2023-01-02 09:40:32'),
(320, 'Kantor Tiara Mas Mataram', 'Kantor Tiara Mas Denpasar', '2023-01-02 09:40:32', '2023-01-02 09:40:32'),
(321, 'Kantor Tiara Mas Mataram', 'Kantor Tiara Mas Alas', '2023-01-02 09:40:32', '2023-01-02 09:40:32'),
(322, 'Kantor Tiara Mas Mataram', 'Kantor Tiara Mas Sumbawa', '2023-01-02 09:40:32', '2023-01-02 09:40:32'),
(323, 'Kantor Tiara Mas Mataram', 'Kantor Tiara Mas Bima', '2023-01-02 09:40:32', '2023-01-02 09:40:32'),
(324, 'Kantor Tiara Mas Alas', 'Merak', '2023-01-02 09:40:32', '2023-01-02 09:40:32'),
(325, 'Kantor Tiara Mas Alas', 'Cilegon', '2023-01-02 09:40:32', '2023-01-02 09:40:32'),
(326, 'Kantor Tiara Mas Alas', 'Serang', '2023-01-02 09:40:32', '2023-01-02 09:40:32'),
(327, 'Kantor Tiara Mas Alas', 'Balaraja', '2023-01-02 09:40:32', '2023-01-02 09:40:32'),
(328, 'Kantor Tiara Mas Alas', 'Kantor Tiara Mas Balaraja Barat', '2023-01-02 09:40:32', '2023-01-02 09:40:32'),
(329, 'Kantor Tiara Mas Alas', 'Poris', '2023-01-02 09:40:32', '2023-01-02 09:40:32'),
(330, 'Kantor Tiara Mas Alas', 'Kalideres', '2023-01-02 09:40:32', '2023-01-02 09:40:32'),
(331, 'Kantor Tiara Mas Alas', 'Lebak Bulus', '2023-01-02 09:40:32', '2023-01-02 09:40:32'),
(332, 'Kantor Tiara Mas Alas', 'Kampung Rambutan', '2023-01-02 09:40:32', '2023-01-02 09:40:32'),
(333, 'Kantor Tiara Mas Alas', 'Pulogebang', '2023-01-02 09:40:32', '2023-01-02 09:40:32'),
(334, 'Kantor Tiara Mas Alas', 'Agen Tiara Mas Timur (Depan Depsos)', '2023-01-02 09:40:32', '2023-01-02 09:40:32'),
(335, 'Kantor Tiara Mas Alas', 'Cirebon', '2023-01-02 09:40:32', '2023-01-02 09:40:32'),
(336, 'Kantor Tiara Mas Alas', 'Kantor Tiara Mas Sulung', '2023-01-02 09:40:32', '2023-01-02 09:40:32'),
(337, 'Kantor Tiara Mas Alas', 'Kantor Tiara Mas Demak', '2023-01-02 09:40:32', '2023-01-02 09:40:32'),
(338, 'Kantor Tiara Mas Alas', 'Kantor Tiara Mas Malang', '2023-01-02 09:40:32', '2023-01-02 09:40:32'),
(339, 'Kantor Tiara Mas Alas', 'Kantor Tiara Mas Denpasar', '2023-01-02 09:40:32', '2023-01-02 09:40:32'),
(340, 'Kantor Tiara Mas Alas', 'Kantor Tiara Mas Mataram', '2023-01-02 09:40:32', '2023-01-02 09:40:32'),
(341, 'Kantor Tiara Mas Alas', 'Kantor Tiara Mas Sumbawa', '2023-01-02 09:40:32', '2023-01-02 09:40:32'),
(342, 'Kantor Tiara Mas Alas', 'Kantor Tiara Mas Bima', '2023-01-02 09:40:32', '2023-01-02 09:40:32'),
(343, 'Kantor Tiara Mas Sumbawa', 'Merak', '2023-01-02 09:40:32', '2023-01-02 09:40:32'),
(344, 'Kantor Tiara Mas Sumbawa', 'Cilegon', '2023-01-02 09:40:32', '2023-01-02 09:40:32'),
(345, 'Kantor Tiara Mas Sumbawa', 'Serang', '2023-01-02 09:40:32', '2023-01-02 09:40:32'),
(346, 'Kantor Tiara Mas Sumbawa', 'Balaraja', '2023-01-02 09:40:32', '2023-01-02 09:40:32'),
(347, 'Kantor Tiara Mas Sumbawa', 'Kantor Tiara Mas Balaraja Barat', '2023-01-02 09:40:32', '2023-01-02 09:40:32'),
(348, 'Kantor Tiara Mas Sumbawa', 'Poris', '2023-01-02 09:40:32', '2023-01-02 09:40:32'),
(349, 'Kantor Tiara Mas Sumbawa', 'Kalideres', '2023-01-02 09:40:32', '2023-01-02 09:40:32'),
(350, 'Kantor Tiara Mas Sumbawa', 'Lebak Bulus', '2023-01-02 09:40:32', '2023-01-02 09:40:32'),
(351, 'Kantor Tiara Mas Sumbawa', 'Kampung Rambutan', '2023-01-02 09:40:32', '2023-01-02 09:40:32'),
(352, 'Kantor Tiara Mas Sumbawa', 'Pulogebang', '2023-01-02 09:40:32', '2023-01-02 09:40:32'),
(353, 'Kantor Tiara Mas Sumbawa', 'Agen Tiara Mas Timur (Depan Depsos)', '2023-01-02 09:40:32', '2023-01-02 09:40:32'),
(354, 'Kantor Tiara Mas Sumbawa', 'Cirebon', '2023-01-02 09:40:32', '2023-01-02 09:40:32'),
(355, 'Kantor Tiara Mas Sumbawa', 'Kantor Tiara Mas Sulung', '2023-01-02 09:40:32', '2023-01-02 09:40:32'),
(356, 'Kantor Tiara Mas Sumbawa', 'Kantor Tiara Mas Demak', '2023-01-02 09:40:32', '2023-01-02 09:40:32'),
(357, 'Kantor Tiara Mas Sumbawa', 'Kantor Tiara Mas Malang', '2023-01-02 09:40:32', '2023-01-02 09:40:32'),
(358, 'Kantor Tiara Mas Sumbawa', 'Kantor Tiara Mas Denpasar', '2023-01-02 09:40:32', '2023-01-02 09:40:32'),
(359, 'Kantor Tiara Mas Sumbawa', 'Kantor Tiara Mas Mataram', '2023-01-02 09:40:32', '2023-01-02 09:40:32'),
(360, 'Kantor Tiara Mas Sumbawa', 'Kantor Tiara Mas Alas', '2023-01-02 09:40:32', '2023-01-02 09:40:32'),
(361, 'Kantor Tiara Mas Sumbawa', 'Kantor Tiara Mas Bima', '2023-01-02 09:40:32', '2023-01-02 09:40:32'),
(362, 'Kantor Tiara Mas Bima', 'Merak', '2023-01-02 09:40:32', '2023-01-02 09:40:32'),
(363, 'Kantor Tiara Mas Bima', 'Cilegon', '2023-01-02 09:40:32', '2023-01-02 09:40:32'),
(364, 'Kantor Tiara Mas Bima', 'Serang', '2023-01-02 09:40:32', '2023-01-02 09:40:32'),
(365, 'Kantor Tiara Mas Bima', 'Balaraja', '2023-01-02 09:40:32', '2023-01-02 09:40:32'),
(366, 'Kantor Tiara Mas Bima', 'Kantor Tiara Mas Balaraja Barat', '2023-01-02 09:40:32', '2023-01-02 09:40:32'),
(367, 'Kantor Tiara Mas Bima', 'Poris', '2023-01-02 09:40:32', '2023-01-02 09:40:32'),
(368, 'Kantor Tiara Mas Bima', 'Kalideres', '2023-01-02 09:40:32', '2023-01-02 09:40:32'),
(369, 'Kantor Tiara Mas Bima', 'Lebak Bulus', '2023-01-02 09:40:32', '2023-01-02 09:40:32'),
(370, 'Kantor Tiara Mas Bima', 'Kampung Rambutan', '2023-01-02 09:40:32', '2023-01-02 09:40:32'),
(371, 'Kantor Tiara Mas Bima', 'Pulogebang', '2023-01-02 09:40:32', '2023-01-02 09:40:32'),
(372, 'Kantor Tiara Mas Bima', 'Agen Tiara Mas Timur (Depan Depsos)', '2023-01-02 09:40:32', '2023-01-02 09:40:32'),
(373, 'Kantor Tiara Mas Bima', 'Cirebon', '2023-01-02 09:40:32', '2023-01-02 09:40:32'),
(374, 'Kantor Tiara Mas Bima', 'Kantor Tiara Mas Sulung', '2023-01-02 09:40:32', '2023-01-02 09:40:32'),
(375, 'Kantor Tiara Mas Bima', 'Kantor Tiara Mas Demak', '2023-01-02 09:40:32', '2023-01-02 09:40:32'),
(376, 'Kantor Tiara Mas Bima', 'Kantor Tiara Mas Malang', '2023-01-02 09:40:32', '2023-01-02 09:40:32'),
(377, 'Kantor Tiara Mas Bima', 'Kantor Tiara Mas Denpasar', '2023-01-02 09:40:32', '2023-01-02 09:40:32'),
(378, 'Kantor Tiara Mas Bima', 'Kantor Tiara Mas Mataram', '2023-01-02 09:40:32', '2023-01-02 09:40:32'),
(379, 'Kantor Tiara Mas Bima', 'Kantor Tiara Mas Alas', '2023-01-02 09:40:32', '2023-01-02 09:40:32'),
(380, 'Kantor Tiara Mas Bima', 'Kantor Tiara Mas Sumbawa', '2023-01-02 09:40:32', '2023-01-02 09:40:32');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status_user` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'aktif',
  `is_user_superadmin` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `jenis_user` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_kode_kota` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `id_area_bus` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `api_token` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `status_user`, `is_user_superadmin`, `jenis_user`, `id_kode_kota`, `id_area_bus`, `remember_token`, `api_token`, `created_at`, `updated_at`) VALUES
(1, 'superadmin', 'admin@admin.com', '$2y$10$4WwrLOKnVQRnQwwZxCCxjOf5fdaUIqahPBgrvItGm0N8Esm6tz/C.', 'aktif', '1', '', '2', '13', NULL, '505', '2023-01-25 01:44:47', '2023-01-25 01:44:47'),
(3, 'superadmin2', 'admin2@admin.com', '$2y$10$BE4plQxZWFzfsm5bSD/5PeEJ/7.WjlpNkZMjEITiJMEgba7p3m4Ua', 'aktif', '0', '', '1', '13', NULL, 'RxYGuBebmXXAujBgTUbHhwMBrFpk2JqSeMZrGMNfzGN7XzbAzgHnPW58gHDw0IAZM5Q1DJij4ExCz5CcRoobPXxk7Ua5WDxQgS5WLHv7CDkkPx93G0xBOaW2ICFoGCSfwE2PYbJmfTafXq0Ejw0fUE', '2023-01-25 07:45:10', '2023-01-25 07:45:42');

-- --------------------------------------------------------

--
-- Table structure for table `wilayah`
--

CREATE TABLE `wilayah` (
  `id_wilayah` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `wilayah`
--

INSERT INTO `wilayah` (`id_wilayah`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Kabupaten Simeulue', '2023-01-02 09:40:32', '2023-01-02 09:40:32'),
(2, 'Kabupaten Aceh Singkil', '2023-01-02 09:40:32', '2023-01-02 09:40:32'),
(3, 'Kabupaten Aceh Selatan', '2023-01-02 09:40:32', '2023-01-02 09:40:32'),
(4, 'Kabupaten Aceh Tenggara', '2023-01-02 09:40:32', '2023-01-02 09:40:32'),
(5, 'Kabupaten Aceh Timur', '2023-01-02 09:40:32', '2023-01-02 09:40:32'),
(6, 'Kabupaten Aceh Tengah', '2023-01-02 09:40:32', '2023-01-02 09:40:32'),
(7, 'Kabupaten Aceh Barat', '2023-01-02 09:40:32', '2023-01-02 09:40:32'),
(8, 'Kabupaten Aceh Besar', '2023-01-02 09:40:32', '2023-01-02 09:40:32'),
(9, 'Kabupaten Pidie', '2023-01-02 09:40:32', '2023-01-02 09:40:32'),
(10, 'Kabupaten Bireuen', '2023-01-02 09:40:32', '2023-01-02 09:40:32'),
(11, 'Kabupaten Aceh Utara', '2023-01-02 09:40:32', '2023-01-02 09:40:32'),
(12, 'Kabupaten Aceh Barat Daya', '2023-01-02 09:40:32', '2023-01-02 09:40:32'),
(13, 'Kabupaten Gayo Lues', '2023-01-02 09:40:32', '2023-01-02 09:40:32'),
(14, 'Kabupaten Aceh Tamiang', '2023-01-02 09:40:32', '2023-01-02 09:40:32'),
(15, 'Kabupaten Nagan Raya', '2023-01-02 09:40:32', '2023-01-02 09:40:32'),
(16, 'Kabupaten Aceh Jaya', '2023-01-02 09:40:32', '2023-01-02 09:40:32'),
(17, 'Kabupaten Bener Meriah', '2023-01-02 09:40:32', '2023-01-02 09:40:32'),
(18, 'Kabupaten Pidie Jaya', '2023-01-02 09:40:32', '2023-01-02 09:40:32'),
(19, 'Kota Banda Aceh', '2023-01-02 09:40:32', '2023-01-02 09:40:32'),
(20, 'Kota Sabang', '2023-01-02 09:40:32', '2023-01-02 09:40:32'),
(21, 'Kota Langsa', '2023-01-02 09:40:32', '2023-01-02 09:40:32'),
(22, 'Kota Lhokseumawe', '2023-01-02 09:40:32', '2023-01-02 09:40:32'),
(23, 'Kota Subulussalam', '2023-01-02 09:40:32', '2023-01-02 09:40:32'),
(24, 'Kabupaten Nias', '2023-01-02 09:40:32', '2023-01-02 09:40:32'),
(25, 'Kabupaten Mandailing Natal', '2023-01-02 09:40:32', '2023-01-02 09:40:32'),
(26, 'Kabupaten Tapanuli Selatan', '2023-01-02 09:40:32', '2023-01-02 09:40:32'),
(27, 'Kabupaten Tapanuli Tengah', '2023-01-02 09:40:32', '2023-01-02 09:40:32'),
(28, 'Kabupaten Tapanuli Utara', '2023-01-02 09:40:32', '2023-01-02 09:40:32'),
(29, 'Kabupaten Toba Samosir', '2023-01-02 09:40:32', '2023-01-02 09:40:32'),
(30, 'Kabupaten Labuhan Batu', '2023-01-02 09:40:32', '2023-01-02 09:40:32'),
(31, 'Kabupaten Asahan', '2023-01-02 09:40:32', '2023-01-02 09:40:32'),
(32, 'Kabupaten Simalungun', '2023-01-02 09:40:32', '2023-01-02 09:40:32'),
(33, 'Kabupaten Dairi', '2023-01-02 09:40:32', '2023-01-02 09:40:32'),
(34, 'Kabupaten Karo', '2023-01-02 09:40:32', '2023-01-02 09:40:32'),
(35, 'Kabupaten Deli Serdang', '2023-01-02 09:40:32', '2023-01-02 09:40:32'),
(36, 'Kabupaten Langkat', '2023-01-02 09:40:32', '2023-01-02 09:40:32'),
(37, 'Kabupaten Nias Selatan', '2023-01-02 09:40:32', '2023-01-02 09:40:32'),
(38, 'Kabupaten Humbang Hasundutan', '2023-01-02 09:40:32', '2023-01-02 09:40:32'),
(39, 'Kabupaten Pakpak Bharat', '2023-01-02 09:40:32', '2023-01-02 09:40:32'),
(40, 'Kabupaten Samosir', '2023-01-02 09:40:32', '2023-01-02 09:40:32'),
(41, 'Kabupaten Serdang Bedagai', '2023-01-02 09:40:32', '2023-01-02 09:40:32'),
(42, 'Kabupaten Batu Bara', '2023-01-02 09:40:32', '2023-01-02 09:40:32'),
(43, 'Kabupaten Padang Lawas Utara', '2023-01-02 09:40:32', '2023-01-02 09:40:32'),
(44, 'Kabupaten Padang Lawas', '2023-01-02 09:40:32', '2023-01-02 09:40:32'),
(45, 'Kabupaten Labuhan Batu Selatan', '2023-01-02 09:40:32', '2023-01-02 09:40:32'),
(46, 'Kabupaten Labuhan Batu Utara', '2023-01-02 09:40:32', '2023-01-02 09:40:32'),
(47, 'Kabupaten Nias Utara', '2023-01-02 09:40:32', '2023-01-02 09:40:32'),
(48, 'Kabupaten Nias Barat', '2023-01-02 09:40:32', '2023-01-02 09:40:32'),
(49, 'Kota Sibolga', '2023-01-02 09:40:32', '2023-01-02 09:40:32'),
(50, 'Kota Tanjung Balai', '2023-01-02 09:40:32', '2023-01-02 09:40:32'),
(51, 'Kota Pematang Siantar', '2023-01-02 09:40:32', '2023-01-02 09:40:32'),
(52, 'Kota Tebing Tinggi', '2023-01-02 09:40:32', '2023-01-02 09:40:32'),
(53, 'Kota Medan', '2023-01-02 09:40:32', '2023-01-02 09:40:32'),
(54, 'Kota Binjai', '2023-01-02 09:40:32', '2023-01-02 09:40:32'),
(55, 'Kota Padangsidimpuan', '2023-01-02 09:40:32', '2023-01-02 09:40:32'),
(56, 'Kota Gunungsitoli', '2023-01-02 09:40:32', '2023-01-02 09:40:32'),
(57, 'Kabupaten Kepulauan Mentawai', '2023-01-02 09:40:32', '2023-01-02 09:40:32'),
(58, 'Kabupaten Pesisir Selatan', '2023-01-02 09:40:32', '2023-01-02 09:40:32'),
(59, 'Kabupaten Solok', '2023-01-02 09:40:32', '2023-01-02 09:40:32'),
(60, 'Kabupaten Sijunjung', '2023-01-02 09:40:32', '2023-01-02 09:40:32'),
(61, 'Kabupaten Tanah Datar', '2023-01-02 09:40:32', '2023-01-02 09:40:32'),
(62, 'Kabupaten Padang Pariaman', '2023-01-02 09:40:32', '2023-01-02 09:40:32'),
(63, 'Kabupaten Agam', '2023-01-02 09:40:32', '2023-01-02 09:40:32'),
(64, 'Kabupaten Lima Puluh Kota', '2023-01-02 09:40:32', '2023-01-02 09:40:32'),
(65, 'Kabupaten Pasaman', '2023-01-02 09:40:32', '2023-01-02 09:40:32'),
(66, 'Kabupaten Solok Selatan', '2023-01-02 09:40:32', '2023-01-02 09:40:32'),
(67, 'Kabupaten Dharmasraya', '2023-01-02 09:40:32', '2023-01-02 09:40:32'),
(68, 'Kabupaten Pasaman Barat', '2023-01-02 09:40:32', '2023-01-02 09:40:32'),
(69, 'Kota Padang', '2023-01-02 09:40:32', '2023-01-02 09:40:32'),
(70, 'Kota Solok', '2023-01-02 09:40:32', '2023-01-02 09:40:32'),
(71, 'Kota Sawah Lunto', '2023-01-02 09:40:32', '2023-01-02 09:40:32'),
(72, 'Kota Padang Panjang', '2023-01-02 09:40:32', '2023-01-02 09:40:32'),
(73, 'Kota Bukittinggi', '2023-01-02 09:40:32', '2023-01-02 09:40:32'),
(74, 'Kota Payakumbuh', '2023-01-02 09:40:32', '2023-01-02 09:40:32'),
(75, 'Kota Pariaman', '2023-01-02 09:40:32', '2023-01-02 09:40:32'),
(76, 'Kabupaten Kuantan Singingi', '2023-01-02 09:40:32', '2023-01-02 09:40:32'),
(77, 'Kabupaten Indragiri Hulu', '2023-01-02 09:40:32', '2023-01-02 09:40:32'),
(78, 'Kabupaten Indragiri Hilir', '2023-01-02 09:40:32', '2023-01-02 09:40:32'),
(79, 'Kabupaten Pelalawan', '2023-01-02 09:40:32', '2023-01-02 09:40:32'),
(80, 'Kabupaten S I A K', '2023-01-02 09:40:32', '2023-01-02 09:40:32'),
(81, 'Kabupaten Kampar', '2023-01-02 09:40:32', '2023-01-02 09:40:32'),
(82, 'Kabupaten Rokan Hulu', '2023-01-02 09:40:32', '2023-01-02 09:40:32'),
(83, 'Kabupaten Bengkalis', '2023-01-02 09:40:32', '2023-01-02 09:40:32'),
(84, 'Kabupaten Rokan Hilir', '2023-01-02 09:40:32', '2023-01-02 09:40:32'),
(85, 'Kabupaten Kepulauan Meranti', '2023-01-02 09:40:32', '2023-01-02 09:40:32'),
(86, 'Kota Pekanbaru', '2023-01-02 09:40:32', '2023-01-02 09:40:32'),
(87, 'Kota D U M A I', '2023-01-02 09:40:32', '2023-01-02 09:40:32'),
(88, 'Kabupaten Kerinci', '2023-01-02 09:40:32', '2023-01-02 09:40:32'),
(89, 'Kabupaten Merangin', '2023-01-02 09:40:32', '2023-01-02 09:40:32'),
(90, 'Kabupaten Sarolangun', '2023-01-02 09:40:32', '2023-01-02 09:40:32'),
(91, 'Kabupaten Batang Hari', '2023-01-02 09:40:32', '2023-01-02 09:40:32'),
(92, 'Kabupaten Muaro Jambi', '2023-01-02 09:40:32', '2023-01-02 09:40:32'),
(93, 'Kabupaten Tanjung Jabung Timur', '2023-01-02 09:40:32', '2023-01-02 09:40:32'),
(94, 'Kabupaten Tanjung Jabung Barat', '2023-01-02 09:40:32', '2023-01-02 09:40:32'),
(95, 'Kabupaten Tebo', '2023-01-02 09:40:32', '2023-01-02 09:40:32'),
(96, 'Kabupaten Bungo', '2023-01-02 09:40:32', '2023-01-02 09:40:32'),
(97, 'Kota Jambi', '2023-01-02 09:40:32', '2023-01-02 09:40:32'),
(98, 'Kota Sungai Penuh', '2023-01-02 09:40:32', '2023-01-02 09:40:32'),
(99, 'Kabupaten Ogan Komering Ulu', '2023-01-02 09:40:32', '2023-01-02 09:40:32'),
(100, 'Kabupaten Ogan Komering Ilir', '2023-01-02 09:40:32', '2023-01-02 09:40:32'),
(101, 'Kabupaten Muara Enim', '2023-01-02 09:40:32', '2023-01-02 09:40:32'),
(102, 'Kabupaten Lahat', '2023-01-02 09:40:32', '2023-01-02 09:40:32'),
(103, 'Kabupaten Musi Rawas', '2023-01-02 09:40:32', '2023-01-02 09:40:32'),
(104, 'Kabupaten Musi Banyuasin', '2023-01-02 09:40:32', '2023-01-02 09:40:32'),
(105, 'Kabupaten Banyu Asin', '2023-01-02 09:40:32', '2023-01-02 09:40:32'),
(106, 'Kabupaten Ogan Komering Ulu Selatan', '2023-01-02 09:40:32', '2023-01-02 09:40:32'),
(107, 'Kabupaten Ogan Komering Ulu Timur', '2023-01-02 09:40:32', '2023-01-02 09:40:32'),
(108, 'Kabupaten Ogan Ilir', '2023-01-02 09:40:32', '2023-01-02 09:40:32'),
(109, 'Kabupaten Empat Lawang', '2023-01-02 09:40:32', '2023-01-02 09:40:32'),
(110, 'Kabupaten Penukal Abab Lematang Ilir', '2023-01-02 09:40:32', '2023-01-02 09:40:32'),
(111, 'Kabupaten Musi Rawas Utara', '2023-01-02 09:40:32', '2023-01-02 09:40:32'),
(112, 'Kota Palembang', '2023-01-02 09:40:32', '2023-01-02 09:40:32'),
(113, 'Kota Prabumulih', '2023-01-02 09:40:32', '2023-01-02 09:40:32'),
(114, 'Kota Pagar Alam', '2023-01-02 09:40:32', '2023-01-02 09:40:32'),
(115, 'Kota Lubuklinggau', '2023-01-02 09:40:32', '2023-01-02 09:40:32'),
(116, 'Kabupaten Bengkulu Selatan', '2023-01-02 09:40:32', '2023-01-02 09:40:32'),
(117, 'Kabupaten Rejang Lebong', '2023-01-02 09:40:32', '2023-01-02 09:40:32'),
(118, 'Kabupaten Bengkulu Utara', '2023-01-02 09:40:32', '2023-01-02 09:40:32'),
(119, 'Kabupaten Kaur', '2023-01-02 09:40:32', '2023-01-02 09:40:32'),
(120, 'Kabupaten Seluma', '2023-01-02 09:40:32', '2023-01-02 09:40:32'),
(121, 'Kabupaten Mukomuko', '2023-01-02 09:40:32', '2023-01-02 09:40:32'),
(122, 'Kabupaten Lebong', '2023-01-02 09:40:32', '2023-01-02 09:40:32'),
(123, 'Kabupaten Kepahiang', '2023-01-02 09:40:32', '2023-01-02 09:40:32'),
(124, 'Kabupaten Bengkulu Tengah', '2023-01-02 09:40:32', '2023-01-02 09:40:32'),
(125, 'Kota Bengkulu', '2023-01-02 09:40:32', '2023-01-02 09:40:32'),
(126, 'Kabupaten Lampung Barat', '2023-01-02 09:40:32', '2023-01-02 09:40:32'),
(127, 'Kabupaten Tanggamus', '2023-01-02 09:40:32', '2023-01-02 09:40:32'),
(128, 'Kabupaten Lampung Selatan', '2023-01-02 09:40:32', '2023-01-02 09:40:32'),
(129, 'Kabupaten Lampung Timur', '2023-01-02 09:40:32', '2023-01-02 09:40:32'),
(130, 'Kabupaten Lampung Tengah', '2023-01-02 09:40:32', '2023-01-02 09:40:32'),
(131, 'Kabupaten Lampung Utara', '2023-01-02 09:40:32', '2023-01-02 09:40:32'),
(132, 'Kabupaten Way Kanan', '2023-01-02 09:40:32', '2023-01-02 09:40:32'),
(133, 'Kabupaten Tulangbawang', '2023-01-02 09:40:32', '2023-01-02 09:40:32'),
(134, 'Kabupaten Pesawaran', '2023-01-02 09:40:32', '2023-01-02 09:40:32'),
(135, 'Kabupaten Pringsewu', '2023-01-02 09:40:32', '2023-01-02 09:40:32'),
(136, 'Kabupaten Mesuji', '2023-01-02 09:40:32', '2023-01-02 09:40:32'),
(137, 'Kabupaten Tulang Bawang Barat', '2023-01-02 09:40:32', '2023-01-02 09:40:32'),
(138, 'Kabupaten Pesisir Barat', '2023-01-02 09:40:32', '2023-01-02 09:40:32'),
(139, 'Kota Bandar Lampung', '2023-01-02 09:40:32', '2023-01-02 09:40:32'),
(140, 'Kota Metro', '2023-01-02 09:40:32', '2023-01-02 09:40:32'),
(141, 'Kabupaten Bangka', '2023-01-02 09:40:32', '2023-01-02 09:40:32'),
(142, 'Kabupaten Belitung', '2023-01-02 09:40:32', '2023-01-02 09:40:32'),
(143, 'Kabupaten Bangka Barat', '2023-01-02 09:40:32', '2023-01-02 09:40:32'),
(144, 'Kabupaten Bangka Tengah', '2023-01-02 09:40:32', '2023-01-02 09:40:32'),
(145, 'Kabupaten Bangka Selatan', '2023-01-02 09:40:32', '2023-01-02 09:40:32'),
(146, 'Kabupaten Belitung Timur', '2023-01-02 09:40:32', '2023-01-02 09:40:32'),
(147, 'Kota Pangkal Pinang', '2023-01-02 09:40:32', '2023-01-02 09:40:32'),
(148, 'Kabupaten Karimun', '2023-01-02 09:40:32', '2023-01-02 09:40:32'),
(149, 'Kabupaten Bintan', '2023-01-02 09:40:32', '2023-01-02 09:40:32'),
(150, 'Kabupaten Natuna', '2023-01-02 09:40:32', '2023-01-02 09:40:32'),
(151, 'Kabupaten Lingga', '2023-01-02 09:40:32', '2023-01-02 09:40:32'),
(152, 'Kabupaten Kepulauan Anambas', '2023-01-02 09:40:32', '2023-01-02 09:40:32'),
(153, 'Kota B A T A M', '2023-01-02 09:40:32', '2023-01-02 09:40:32'),
(154, 'Kota Tanjung Pinang', '2023-01-02 09:40:32', '2023-01-02 09:40:32'),
(155, 'Kabupaten Kepulauan Seribu', '2023-01-02 09:40:32', '2023-01-02 09:40:32'),
(156, 'Kota Jakarta Selatan', '2023-01-02 09:40:32', '2023-01-02 09:40:32'),
(157, 'Kota Jakarta Timur', '2023-01-02 09:40:32', '2023-01-02 09:40:32'),
(158, 'Kota Jakarta Pusat', '2023-01-02 09:40:32', '2023-01-02 09:40:32'),
(159, 'Kota Jakarta Barat', '2023-01-02 09:40:32', '2023-01-02 09:40:32'),
(160, 'Kota Jakarta Utara', '2023-01-02 09:40:32', '2023-01-02 09:40:32'),
(161, 'Kabupaten Bogor', '2023-01-02 09:40:32', '2023-01-02 09:40:32'),
(162, 'Kabupaten Sukabumi', '2023-01-02 09:40:32', '2023-01-02 09:40:32'),
(163, 'Kabupaten Cianjur', '2023-01-02 09:40:32', '2023-01-02 09:40:32'),
(164, 'Kabupaten Bandung', '2023-01-02 09:40:32', '2023-01-02 09:40:32'),
(165, 'Kabupaten Garut', '2023-01-02 09:40:32', '2023-01-02 09:40:32'),
(166, 'Kabupaten Tasikmalaya', '2023-01-02 09:40:32', '2023-01-02 09:40:32'),
(167, 'Kabupaten Ciamis', '2023-01-02 09:40:32', '2023-01-02 09:40:32'),
(168, 'Kabupaten Kuningan', '2023-01-02 09:40:32', '2023-01-02 09:40:32'),
(169, 'Kabupaten Cirebon', '2023-01-02 09:40:32', '2023-01-02 09:40:32'),
(170, 'Kabupaten Majalengka', '2023-01-02 09:40:32', '2023-01-02 09:40:32'),
(171, 'Kabupaten Sumedang', '2023-01-02 09:40:32', '2023-01-02 09:40:32'),
(172, 'Kabupaten Indramayu', '2023-01-02 09:40:32', '2023-01-02 09:40:32'),
(173, 'Kabupaten Subang', '2023-01-02 09:40:32', '2023-01-02 09:40:32'),
(174, 'Kabupaten Purwakarta', '2023-01-02 09:40:32', '2023-01-02 09:40:32'),
(175, 'Kabupaten Karawang', '2023-01-02 09:40:32', '2023-01-02 09:40:32'),
(176, 'Kabupaten Bekasi', '2023-01-02 09:40:32', '2023-01-02 09:40:32'),
(177, 'Kabupaten Bandung Barat', '2023-01-02 09:40:32', '2023-01-02 09:40:32'),
(178, 'Kabupaten Pangandaran', '2023-01-02 09:40:32', '2023-01-02 09:40:32'),
(179, 'Kota Bogor', '2023-01-02 09:40:32', '2023-01-02 09:40:32'),
(180, 'Kota Sukabumi', '2023-01-02 09:40:32', '2023-01-02 09:40:32'),
(181, 'Kota Bandung', '2023-01-02 09:40:32', '2023-01-02 09:40:32'),
(182, 'Kota Cirebon', '2023-01-02 09:40:32', '2023-01-02 09:40:32'),
(183, 'Kota Bekasi', '2023-01-02 09:40:32', '2023-01-02 09:40:32'),
(184, 'Kota Depok', '2023-01-02 09:40:32', '2023-01-02 09:40:32'),
(185, 'Kota Cimahi', '2023-01-02 09:40:32', '2023-01-02 09:40:32'),
(186, 'Kota Tasikmalaya', '2023-01-02 09:40:32', '2023-01-02 09:40:32'),
(187, 'Kota Banjar', '2023-01-02 09:40:32', '2023-01-02 09:40:32'),
(188, 'Kabupaten Cilacap', '2023-01-02 09:40:32', '2023-01-02 09:40:32'),
(189, 'Kabupaten Banyumas', '2023-01-02 09:40:32', '2023-01-02 09:40:32'),
(190, 'Kabupaten Purbalingga', '2023-01-02 09:40:32', '2023-01-02 09:40:32'),
(191, 'Kabupaten Banjarnegara', '2023-01-02 09:40:32', '2023-01-02 09:40:32'),
(192, 'Kabupaten Kebumen', '2023-01-02 09:40:32', '2023-01-02 09:40:32'),
(193, 'Kabupaten Purworejo', '2023-01-02 09:40:32', '2023-01-02 09:40:32'),
(194, 'Kabupaten Wonosobo', '2023-01-02 09:40:32', '2023-01-02 09:40:32'),
(195, 'Kabupaten Magelang', '2023-01-02 09:40:32', '2023-01-02 09:40:32'),
(196, 'Kabupaten Boyolali', '2023-01-02 09:40:32', '2023-01-02 09:40:32'),
(197, 'Kabupaten Klaten', '2023-01-02 09:40:32', '2023-01-02 09:40:32'),
(198, 'Kabupaten Sukoharjo', '2023-01-02 09:40:32', '2023-01-02 09:40:32'),
(199, 'Kabupaten Wonogiri', '2023-01-02 09:40:32', '2023-01-02 09:40:32'),
(200, 'Kabupaten Karanganyar', '2023-01-02 09:40:32', '2023-01-02 09:40:32'),
(201, 'Kabupaten Sragen', '2023-01-02 09:40:32', '2023-01-02 09:40:32'),
(202, 'Kabupaten Grobogan', '2023-01-02 09:40:32', '2023-01-02 09:40:32'),
(203, 'Kabupaten Blora', '2023-01-02 09:40:32', '2023-01-02 09:40:32'),
(204, 'Kabupaten Rembang', '2023-01-02 09:40:32', '2023-01-02 09:40:32'),
(205, 'Kabupaten Pati', '2023-01-02 09:40:32', '2023-01-02 09:40:32'),
(206, 'Kabupaten Kudus', '2023-01-02 09:40:32', '2023-01-02 09:40:32'),
(207, 'Kabupaten Jepara', '2023-01-02 09:40:32', '2023-01-02 09:40:32'),
(208, 'Kabupaten Demak', '2023-01-02 09:40:32', '2023-01-02 09:40:32'),
(209, 'Kabupaten Semarang', '2023-01-02 09:40:32', '2023-01-02 09:40:32'),
(210, 'Kabupaten Temanggung', '2023-01-02 09:40:32', '2023-01-02 09:40:32'),
(211, 'Kabupaten Kendal', '2023-01-02 09:40:32', '2023-01-02 09:40:32'),
(212, 'Kabupaten Batang', '2023-01-02 09:40:32', '2023-01-02 09:40:32'),
(213, 'Kabupaten Pekalongan', '2023-01-02 09:40:32', '2023-01-02 09:40:32'),
(214, 'Kabupaten Pemalang', '2023-01-02 09:40:32', '2023-01-02 09:40:32'),
(215, 'Kabupaten Tegal', '2023-01-02 09:40:32', '2023-01-02 09:40:32'),
(216, 'Kabupaten Brebes', '2023-01-02 09:40:32', '2023-01-02 09:40:32'),
(217, 'Kota Magelang', '2023-01-02 09:40:32', '2023-01-02 09:40:32'),
(218, 'Kota Surakarta', '2023-01-02 09:40:32', '2023-01-02 09:40:32'),
(219, 'Kota Salatiga', '2023-01-02 09:40:32', '2023-01-02 09:40:32'),
(220, 'Kota Semarang', '2023-01-02 09:40:32', '2023-01-02 09:40:32'),
(221, 'Kota Pekalongan', '2023-01-02 09:40:32', '2023-01-02 09:40:32'),
(222, 'Kota Tegal', '2023-01-02 09:40:32', '2023-01-02 09:40:32'),
(223, 'Kabupaten Kulon Progo', '2023-01-02 09:40:32', '2023-01-02 09:40:32'),
(224, 'Kabupaten Bantul', '2023-01-02 09:40:32', '2023-01-02 09:40:32'),
(225, 'Kabupaten Gunung Kidul', '2023-01-02 09:40:32', '2023-01-02 09:40:32'),
(226, 'Kabupaten Sleman', '2023-01-02 09:40:32', '2023-01-02 09:40:32'),
(227, 'Kota Yogyakarta', '2023-01-02 09:40:32', '2023-01-02 09:40:32'),
(228, 'Kabupaten Pacitan', '2023-01-02 09:40:32', '2023-01-02 09:40:32'),
(229, 'Kabupaten Ponorogo', '2023-01-02 09:40:32', '2023-01-02 09:40:32'),
(230, 'Kabupaten Trenggalek', '2023-01-02 09:40:32', '2023-01-02 09:40:32'),
(231, 'Kabupaten Tulungagung', '2023-01-02 09:40:32', '2023-01-02 09:40:32'),
(232, 'Kabupaten Blitar', '2023-01-02 09:40:32', '2023-01-02 09:40:32'),
(233, 'Kabupaten Kediri', '2023-01-02 09:40:32', '2023-01-02 09:40:32'),
(234, 'Kabupaten Malang', '2023-01-02 09:40:32', '2023-01-02 09:40:32'),
(235, 'Kabupaten Lumajang', '2023-01-02 09:40:32', '2023-01-02 09:40:32'),
(236, 'Kabupaten Jember', '2023-01-02 09:40:32', '2023-01-02 09:40:32'),
(237, 'Kabupaten Banyuwangi', '2023-01-02 09:40:32', '2023-01-02 09:40:32'),
(238, 'Kabupaten Bondowoso', '2023-01-02 09:40:32', '2023-01-02 09:40:32'),
(239, 'Kabupaten Situbondo', '2023-01-02 09:40:32', '2023-01-02 09:40:32'),
(240, 'Kabupaten Probolinggo', '2023-01-02 09:40:32', '2023-01-02 09:40:32'),
(241, 'Kabupaten Pasuruan', '2023-01-02 09:40:32', '2023-01-02 09:40:32'),
(242, 'Kabupaten Sidoarjo', '2023-01-02 09:40:32', '2023-01-02 09:40:32'),
(243, 'Kabupaten Mojokerto', '2023-01-02 09:40:32', '2023-01-02 09:40:32'),
(244, 'Kabupaten Jombang', '2023-01-02 09:40:32', '2023-01-02 09:40:32'),
(245, 'Kabupaten Nganjuk', '2023-01-02 09:40:32', '2023-01-02 09:40:32'),
(246, 'Kabupaten Madiun', '2023-01-02 09:40:32', '2023-01-02 09:40:32'),
(247, 'Kabupaten Magetan', '2023-01-02 09:40:32', '2023-01-02 09:40:32'),
(248, 'Kabupaten Ngawi', '2023-01-02 09:40:32', '2023-01-02 09:40:32'),
(249, 'Kabupaten Bojonegoro', '2023-01-02 09:40:32', '2023-01-02 09:40:32'),
(250, 'Kabupaten Tuban', '2023-01-02 09:40:32', '2023-01-02 09:40:32'),
(251, 'Kabupaten Lamongan', '2023-01-02 09:40:32', '2023-01-02 09:40:32'),
(252, 'Kabupaten Gresik', '2023-01-02 09:40:32', '2023-01-02 09:40:32'),
(253, 'Kabupaten Bangkalan', '2023-01-02 09:40:32', '2023-01-02 09:40:32'),
(254, 'Kabupaten Sampang', '2023-01-02 09:40:32', '2023-01-02 09:40:32'),
(255, 'Kabupaten Pamekasan', '2023-01-02 09:40:32', '2023-01-02 09:40:32'),
(256, 'Kabupaten Sumenep', '2023-01-02 09:40:32', '2023-01-02 09:40:32'),
(257, 'Kota Kediri', '2023-01-02 09:40:32', '2023-01-02 09:40:32'),
(258, 'Kota Blitar', '2023-01-02 09:40:32', '2023-01-02 09:40:32'),
(259, 'Kota Malang', '2023-01-02 09:40:32', '2023-01-02 09:40:32'),
(260, 'Kota Probolinggo', '2023-01-02 09:40:32', '2023-01-02 09:40:32'),
(261, 'Kota Pasuruan', '2023-01-02 09:40:32', '2023-01-02 09:40:32'),
(262, 'Kota Mojokerto', '2023-01-02 09:40:32', '2023-01-02 09:40:32'),
(263, 'Kota Madiun', '2023-01-02 09:40:32', '2023-01-02 09:40:32'),
(264, 'Kota Surabaya', '2023-01-02 09:40:32', '2023-01-02 09:40:32'),
(265, 'Kota Batu', '2023-01-02 09:40:32', '2023-01-02 09:40:32'),
(266, 'Kabupaten Pandeglang', '2023-01-02 09:40:32', '2023-01-02 09:40:32'),
(267, 'Kabupaten Lebak', '2023-01-02 09:40:32', '2023-01-02 09:40:32'),
(268, 'Kabupaten Tangerang', '2023-01-02 09:40:32', '2023-01-02 09:40:32'),
(269, 'Kabupaten Serang', '2023-01-02 09:40:32', '2023-01-02 09:40:32'),
(270, 'Kota Tangerang', '2023-01-02 09:40:32', '2023-01-02 09:40:32'),
(271, 'Kota Cilegon', '2023-01-02 09:40:32', '2023-01-02 09:40:32'),
(272, 'Kota Serang', '2023-01-02 09:40:32', '2023-01-02 09:40:32'),
(273, 'Kota Tangerang Selatan', '2023-01-02 09:40:32', '2023-01-02 09:40:32'),
(274, 'Kabupaten Jembrana', '2023-01-02 09:40:32', '2023-01-02 09:40:32'),
(275, 'Kabupaten Tabanan', '2023-01-02 09:40:32', '2023-01-02 09:40:32'),
(276, 'Kabupaten Badung', '2023-01-02 09:40:32', '2023-01-02 09:40:32'),
(277, 'Kabupaten Gianyar', '2023-01-02 09:40:32', '2023-01-02 09:40:32'),
(278, 'Kabupaten Klungkung', '2023-01-02 09:40:32', '2023-01-02 09:40:32'),
(279, 'Kabupaten Bangli', '2023-01-02 09:40:32', '2023-01-02 09:40:32'),
(280, 'Kabupaten Karang Asem', '2023-01-02 09:40:32', '2023-01-02 09:40:32'),
(281, 'Kabupaten Buleleng', '2023-01-02 09:40:32', '2023-01-02 09:40:32'),
(282, 'Kota Denpasar', '2023-01-02 09:40:32', '2023-01-02 09:40:32'),
(283, 'Kabupaten Lombok Barat', '2023-01-02 09:40:32', '2023-01-02 09:40:32'),
(284, 'Kabupaten Lombok Tengah', '2023-01-02 09:40:32', '2023-01-02 09:40:32'),
(285, 'Kabupaten Lombok Timur', '2023-01-02 09:40:32', '2023-01-02 09:40:32'),
(286, 'Kabupaten Sumbawa', '2023-01-02 09:40:32', '2023-01-02 09:40:32'),
(287, 'Kabupaten Dompu', '2023-01-02 09:40:32', '2023-01-02 09:40:32'),
(288, 'Kabupaten Bima', '2023-01-02 09:40:32', '2023-01-02 09:40:32'),
(289, 'Kabupaten Sumbawa Barat', '2023-01-02 09:40:32', '2023-01-02 09:40:32'),
(290, 'Kabupaten Lombok Utara', '2023-01-02 09:40:32', '2023-01-02 09:40:32'),
(291, 'Kota Mataram', '2023-01-02 09:40:32', '2023-01-02 09:40:32'),
(292, 'Kota Bima', '2023-01-02 09:40:32', '2023-01-02 09:40:32'),
(293, 'Kabupaten Sumba Barat', '2023-01-02 09:40:32', '2023-01-02 09:40:32'),
(294, 'Kabupaten Sumba Timur', '2023-01-02 09:40:32', '2023-01-02 09:40:32'),
(295, 'Kabupaten Kupang', '2023-01-02 09:40:32', '2023-01-02 09:40:32'),
(296, 'Kabupaten Timor Tengah Selatan', '2023-01-02 09:40:32', '2023-01-02 09:40:32'),
(297, 'Kabupaten Timor Tengah Utara', '2023-01-02 09:40:32', '2023-01-02 09:40:32'),
(298, 'Kabupaten Belu', '2023-01-02 09:40:32', '2023-01-02 09:40:32'),
(299, 'Kabupaten Alor', '2023-01-02 09:40:32', '2023-01-02 09:40:32'),
(300, 'Kabupaten Lembata', '2023-01-02 09:40:32', '2023-01-02 09:40:32'),
(301, 'Kabupaten Flores Timur', '2023-01-02 09:40:32', '2023-01-02 09:40:32'),
(302, 'Kabupaten Sikka', '2023-01-02 09:40:32', '2023-01-02 09:40:32'),
(303, 'Kabupaten Ende', '2023-01-02 09:40:32', '2023-01-02 09:40:32'),
(304, 'Kabupaten Ngada', '2023-01-02 09:40:32', '2023-01-02 09:40:32'),
(305, 'Kabupaten Manggarai', '2023-01-02 09:40:32', '2023-01-02 09:40:32'),
(306, 'Kabupaten Rote Ndao', '2023-01-02 09:40:32', '2023-01-02 09:40:32'),
(307, 'Kabupaten Manggarai Barat', '2023-01-02 09:40:32', '2023-01-02 09:40:32'),
(308, 'Kabupaten Sumba Tengah', '2023-01-02 09:40:32', '2023-01-02 09:40:32'),
(309, 'Kabupaten Sumba Barat Daya', '2023-01-02 09:40:32', '2023-01-02 09:40:32'),
(310, 'Kabupaten Nagekeo', '2023-01-02 09:40:32', '2023-01-02 09:40:32'),
(311, 'Kabupaten Manggarai Timur', '2023-01-02 09:40:32', '2023-01-02 09:40:32'),
(312, 'Kabupaten Sabu Raijua', '2023-01-02 09:40:32', '2023-01-02 09:40:32'),
(313, 'Kabupaten Malaka', '2023-01-02 09:40:32', '2023-01-02 09:40:32'),
(314, 'Kota Kupang', '2023-01-02 09:40:32', '2023-01-02 09:40:32'),
(315, 'Kabupaten Sambas', '2023-01-02 09:40:32', '2023-01-02 09:40:32'),
(316, 'Kabupaten Bengkayang', '2023-01-02 09:40:32', '2023-01-02 09:40:32'),
(317, 'Kabupaten Landak', '2023-01-02 09:40:32', '2023-01-02 09:40:32'),
(318, 'Kabupaten Mempawah', '2023-01-02 09:40:32', '2023-01-02 09:40:32'),
(319, 'Kabupaten Sanggau', '2023-01-02 09:40:32', '2023-01-02 09:40:32'),
(320, 'Kabupaten Ketapang', '2023-01-02 09:40:32', '2023-01-02 09:40:32'),
(321, 'Kabupaten Sintang', '2023-01-02 09:40:32', '2023-01-02 09:40:32'),
(322, 'Kabupaten Kapuas Hulu', '2023-01-02 09:40:32', '2023-01-02 09:40:32'),
(323, 'Kabupaten Sekadau', '2023-01-02 09:40:32', '2023-01-02 09:40:32'),
(324, 'Kabupaten Melawi', '2023-01-02 09:40:32', '2023-01-02 09:40:32'),
(325, 'Kabupaten Kayong Utara', '2023-01-02 09:40:32', '2023-01-02 09:40:32'),
(326, 'Kabupaten Kubu Raya', '2023-01-02 09:40:32', '2023-01-02 09:40:32'),
(327, 'Kota Pontianak', '2023-01-02 09:40:32', '2023-01-02 09:40:32'),
(328, 'Kota Singkawang', '2023-01-02 09:40:32', '2023-01-02 09:40:32'),
(329, 'Kabupaten Kotawaringin Barat', '2023-01-02 09:40:32', '2023-01-02 09:40:32'),
(330, 'Kabupaten Kotawaringin Timur', '2023-01-02 09:40:32', '2023-01-02 09:40:32'),
(331, 'Kabupaten Kapuas', '2023-01-02 09:40:32', '2023-01-02 09:40:32'),
(332, 'Kabupaten Barito Selatan', '2023-01-02 09:40:32', '2023-01-02 09:40:32'),
(333, 'Kabupaten Barito Utara', '2023-01-02 09:40:32', '2023-01-02 09:40:32'),
(334, 'Kabupaten Sukamara', '2023-01-02 09:40:32', '2023-01-02 09:40:32'),
(335, 'Kabupaten Lamandau', '2023-01-02 09:40:32', '2023-01-02 09:40:32'),
(336, 'Kabupaten Seruyan', '2023-01-02 09:40:32', '2023-01-02 09:40:32'),
(337, 'Kabupaten Katingan', '2023-01-02 09:40:32', '2023-01-02 09:40:32'),
(338, 'Kabupaten Pulang Pisau', '2023-01-02 09:40:32', '2023-01-02 09:40:32'),
(339, 'Kabupaten Gunung Mas', '2023-01-02 09:40:32', '2023-01-02 09:40:32'),
(340, 'Kabupaten Barito Timur', '2023-01-02 09:40:32', '2023-01-02 09:40:32'),
(341, 'Kabupaten Murung Raya', '2023-01-02 09:40:32', '2023-01-02 09:40:32'),
(342, 'Kota Palangka Raya', '2023-01-02 09:40:32', '2023-01-02 09:40:32'),
(343, 'Kabupaten Tanah Laut', '2023-01-02 09:40:32', '2023-01-02 09:40:32'),
(344, 'Kabupaten Kota Baru', '2023-01-02 09:40:32', '2023-01-02 09:40:32'),
(345, 'Kabupaten Banjar', '2023-01-02 09:40:32', '2023-01-02 09:40:32'),
(346, 'Kabupaten Barito Kuala', '2023-01-02 09:40:32', '2023-01-02 09:40:32'),
(347, 'Kabupaten Tapin', '2023-01-02 09:40:32', '2023-01-02 09:40:32'),
(348, 'Kabupaten Hulu Sungai Selatan', '2023-01-02 09:40:32', '2023-01-02 09:40:32'),
(349, 'Kabupaten Hulu Sungai Tengah', '2023-01-02 09:40:32', '2023-01-02 09:40:32'),
(350, 'Kabupaten Hulu Sungai Utara', '2023-01-02 09:40:32', '2023-01-02 09:40:32'),
(351, 'Kabupaten Tabalong', '2023-01-02 09:40:32', '2023-01-02 09:40:32'),
(352, 'Kabupaten Tanah Bumbu', '2023-01-02 09:40:32', '2023-01-02 09:40:32'),
(353, 'Kabupaten Balangan', '2023-01-02 09:40:32', '2023-01-02 09:40:32'),
(354, 'Kota Banjarmasin', '2023-01-02 09:40:32', '2023-01-02 09:40:32'),
(355, 'Kota Banjar Baru', '2023-01-02 09:40:32', '2023-01-02 09:40:32'),
(356, 'Kabupaten Paser', '2023-01-02 09:40:32', '2023-01-02 09:40:32'),
(357, 'Kabupaten Kutai Barat', '2023-01-02 09:40:32', '2023-01-02 09:40:32'),
(358, 'Kabupaten Kutai Kartanegara', '2023-01-02 09:40:32', '2023-01-02 09:40:32'),
(359, 'Kabupaten Kutai Timur', '2023-01-02 09:40:32', '2023-01-02 09:40:32'),
(360, 'Kabupaten Berau', '2023-01-02 09:40:32', '2023-01-02 09:40:32'),
(361, 'Kabupaten Penajam Paser Utara', '2023-01-02 09:40:32', '2023-01-02 09:40:32'),
(362, 'Kabupaten Mahakam Hulu', '2023-01-02 09:40:32', '2023-01-02 09:40:32'),
(363, 'Kota Balikpapan', '2023-01-02 09:40:32', '2023-01-02 09:40:32'),
(364, 'Kota Samarinda', '2023-01-02 09:40:32', '2023-01-02 09:40:32'),
(365, 'Kota Bontang', '2023-01-02 09:40:32', '2023-01-02 09:40:32'),
(366, 'Kabupaten Malinau', '2023-01-02 09:40:32', '2023-01-02 09:40:32'),
(367, 'Kabupaten Bulungan', '2023-01-02 09:40:32', '2023-01-02 09:40:32'),
(368, 'Kabupaten Tana Tidung', '2023-01-02 09:40:32', '2023-01-02 09:40:32'),
(369, 'Kabupaten Nunukan', '2023-01-02 09:40:32', '2023-01-02 09:40:32'),
(370, 'Kota Tarakan', '2023-01-02 09:40:32', '2023-01-02 09:40:32'),
(371, 'Kabupaten Bolaang Mongondow', '2023-01-02 09:40:32', '2023-01-02 09:40:32'),
(372, 'Kabupaten Minahasa', '2023-01-02 09:40:32', '2023-01-02 09:40:32'),
(373, 'Kabupaten Kepulauan Sangihe', '2023-01-02 09:40:32', '2023-01-02 09:40:32'),
(374, 'Kabupaten Kepulauan Talaud', '2023-01-02 09:40:32', '2023-01-02 09:40:32'),
(375, 'Kabupaten Minahasa Selatan', '2023-01-02 09:40:32', '2023-01-02 09:40:32'),
(376, 'Kabupaten Minahasa Utara', '2023-01-02 09:40:32', '2023-01-02 09:40:32'),
(377, 'Kabupaten Bolaang Mongondow Utara', '2023-01-02 09:40:32', '2023-01-02 09:40:32'),
(378, 'Kabupaten Siau Tagulandang Biaro', '2023-01-02 09:40:32', '2023-01-02 09:40:32'),
(379, 'Kabupaten Minahasa Tenggara', '2023-01-02 09:40:32', '2023-01-02 09:40:32'),
(380, 'Kabupaten Bolaang Mongondow Selatan', '2023-01-02 09:40:32', '2023-01-02 09:40:32'),
(381, 'Kabupaten Bolaang Mongondow Timur', '2023-01-02 09:40:32', '2023-01-02 09:40:32'),
(382, 'Kota Manado', '2023-01-02 09:40:32', '2023-01-02 09:40:32'),
(383, 'Kota Bitung', '2023-01-02 09:40:32', '2023-01-02 09:40:32'),
(384, 'Kota Tomohon', '2023-01-02 09:40:32', '2023-01-02 09:40:32'),
(385, 'Kota Kotamobagu', '2023-01-02 09:40:32', '2023-01-02 09:40:32'),
(386, 'Kabupaten Banggai Kepulauan', '2023-01-02 09:40:32', '2023-01-02 09:40:32'),
(387, 'Kabupaten Banggai', '2023-01-02 09:40:32', '2023-01-02 09:40:32'),
(388, 'Kabupaten Morowali', '2023-01-02 09:40:32', '2023-01-02 09:40:32'),
(389, 'Kabupaten Poso', '2023-01-02 09:40:32', '2023-01-02 09:40:32'),
(390, 'Kabupaten Donggala', '2023-01-02 09:40:32', '2023-01-02 09:40:32'),
(391, 'Kabupaten Toli-toli', '2023-01-02 09:40:32', '2023-01-02 09:40:32'),
(392, 'Kabupaten Buol', '2023-01-02 09:40:32', '2023-01-02 09:40:32'),
(393, 'Kabupaten Parigi Moutong', '2023-01-02 09:40:32', '2023-01-02 09:40:32'),
(394, 'Kabupaten Tojo Una-una', '2023-01-02 09:40:32', '2023-01-02 09:40:32'),
(395, 'Kabupaten Sigi', '2023-01-02 09:40:32', '2023-01-02 09:40:32'),
(396, 'Kabupaten Banggai Laut', '2023-01-02 09:40:32', '2023-01-02 09:40:32'),
(397, 'Kabupaten Morowali Utara', '2023-01-02 09:40:32', '2023-01-02 09:40:32'),
(398, 'Kota Palu', '2023-01-02 09:40:32', '2023-01-02 09:40:32'),
(399, 'Kabupaten Kepulauan Selayar', '2023-01-02 09:40:32', '2023-01-02 09:40:32'),
(400, 'Kabupaten Bulukumba', '2023-01-02 09:40:32', '2023-01-02 09:40:32'),
(401, 'Kabupaten Bantaeng', '2023-01-02 09:40:32', '2023-01-02 09:40:32'),
(402, 'Kabupaten Jeneponto', '2023-01-02 09:40:32', '2023-01-02 09:40:32'),
(403, 'Kabupaten Takalar', '2023-01-02 09:40:32', '2023-01-02 09:40:32'),
(404, 'Kabupaten Gowa', '2023-01-02 09:40:32', '2023-01-02 09:40:32'),
(405, 'Kabupaten Sinjai', '2023-01-02 09:40:32', '2023-01-02 09:40:32'),
(406, 'Kabupaten Maros', '2023-01-02 09:40:32', '2023-01-02 09:40:32'),
(407, 'Kabupaten Pangkajene Dan Kepulauan', '2023-01-02 09:40:32', '2023-01-02 09:40:32'),
(408, 'Kabupaten Barru', '2023-01-02 09:40:32', '2023-01-02 09:40:32'),
(409, 'Kabupaten Bone', '2023-01-02 09:40:32', '2023-01-02 09:40:32'),
(410, 'Kabupaten Soppeng', '2023-01-02 09:40:32', '2023-01-02 09:40:32'),
(411, 'Kabupaten Wajo', '2023-01-02 09:40:32', '2023-01-02 09:40:32'),
(412, 'Kabupaten Sidenreng Rappang', '2023-01-02 09:40:32', '2023-01-02 09:40:32'),
(413, 'Kabupaten Pinrang', '2023-01-02 09:40:32', '2023-01-02 09:40:32'),
(414, 'Kabupaten Enrekang', '2023-01-02 09:40:32', '2023-01-02 09:40:32'),
(415, 'Kabupaten Luwu', '2023-01-02 09:40:32', '2023-01-02 09:40:32'),
(416, 'Kabupaten Tana Toraja', '2023-01-02 09:40:32', '2023-01-02 09:40:32'),
(417, 'Kabupaten Luwu Utara', '2023-01-02 09:40:32', '2023-01-02 09:40:32'),
(418, 'Kabupaten Luwu Timur', '2023-01-02 09:40:32', '2023-01-02 09:40:32'),
(419, 'Kabupaten Toraja Utara', '2023-01-02 09:40:32', '2023-01-02 09:40:32'),
(420, 'Kota Makassar', '2023-01-02 09:40:32', '2023-01-02 09:40:32'),
(421, 'Kota Parepare', '2023-01-02 09:40:32', '2023-01-02 09:40:32'),
(422, 'Kota Palopo', '2023-01-02 09:40:32', '2023-01-02 09:40:32'),
(423, 'Kabupaten Buton', '2023-01-02 09:40:32', '2023-01-02 09:40:32'),
(424, 'Kabupaten Muna', '2023-01-02 09:40:32', '2023-01-02 09:40:32'),
(425, 'Kabupaten Konawe', '2023-01-02 09:40:32', '2023-01-02 09:40:32'),
(426, 'Kabupaten Kolaka', '2023-01-02 09:40:32', '2023-01-02 09:40:32'),
(427, 'Kabupaten Konawe Selatan', '2023-01-02 09:40:32', '2023-01-02 09:40:32'),
(428, 'Kabupaten Bombana', '2023-01-02 09:40:32', '2023-01-02 09:40:32'),
(429, 'Kabupaten Wakatobi', '2023-01-02 09:40:32', '2023-01-02 09:40:32'),
(430, 'Kabupaten Kolaka Utara', '2023-01-02 09:40:32', '2023-01-02 09:40:32'),
(431, 'Kabupaten Buton Utara', '2023-01-02 09:40:32', '2023-01-02 09:40:32'),
(432, 'Kabupaten Konawe Utara', '2023-01-02 09:40:32', '2023-01-02 09:40:32'),
(433, 'Kabupaten Kolaka Timur', '2023-01-02 09:40:32', '2023-01-02 09:40:32'),
(434, 'Kabupaten Konawe Kepulauan', '2023-01-02 09:40:32', '2023-01-02 09:40:32'),
(435, 'Kabupaten Muna Barat', '2023-01-02 09:40:32', '2023-01-02 09:40:32'),
(436, 'Kabupaten Buton Tengah', '2023-01-02 09:40:32', '2023-01-02 09:40:32'),
(437, 'Kabupaten Buton Selatan', '2023-01-02 09:40:32', '2023-01-02 09:40:32'),
(438, 'Kota Kendari', '2023-01-02 09:40:32', '2023-01-02 09:40:32'),
(439, 'Kota Baubau', '2023-01-02 09:40:32', '2023-01-02 09:40:32'),
(440, 'Kabupaten Boalemo', '2023-01-02 09:40:32', '2023-01-02 09:40:32'),
(441, 'Kabupaten Gorontalo', '2023-01-02 09:40:32', '2023-01-02 09:40:32'),
(442, 'Kabupaten Pohuwato', '2023-01-02 09:40:32', '2023-01-02 09:40:32'),
(443, 'Kabupaten Bone Bolango', '2023-01-02 09:40:32', '2023-01-02 09:40:32'),
(444, 'Kabupaten Gorontalo Utara', '2023-01-02 09:40:32', '2023-01-02 09:40:32'),
(445, 'Kota Gorontalo', '2023-01-02 09:40:32', '2023-01-02 09:40:32'),
(446, 'Kabupaten Majene', '2023-01-02 09:40:32', '2023-01-02 09:40:32'),
(447, 'Kabupaten Polewali Mandar', '2023-01-02 09:40:32', '2023-01-02 09:40:32'),
(448, 'Kabupaten Mamasa', '2023-01-02 09:40:32', '2023-01-02 09:40:32'),
(449, 'Kabupaten Mamuju', '2023-01-02 09:40:32', '2023-01-02 09:40:32'),
(450, 'Kabupaten Mamuju Utara', '2023-01-02 09:40:32', '2023-01-02 09:40:32'),
(451, 'Kabupaten Mamuju Tengah', '2023-01-02 09:40:32', '2023-01-02 09:40:32'),
(452, 'Kabupaten Maluku Tenggara Barat', '2023-01-02 09:40:32', '2023-01-02 09:40:32'),
(453, 'Kabupaten Maluku Tenggara', '2023-01-02 09:40:32', '2023-01-02 09:40:32'),
(454, 'Kabupaten Maluku Tengah', '2023-01-02 09:40:32', '2023-01-02 09:40:32'),
(455, 'Kabupaten Buru', '2023-01-02 09:40:32', '2023-01-02 09:40:32'),
(456, 'Kabupaten Kepulauan Aru', '2023-01-02 09:40:32', '2023-01-02 09:40:32'),
(457, 'Kabupaten Seram Bagian Barat', '2023-01-02 09:40:32', '2023-01-02 09:40:32'),
(458, 'Kabupaten Seram Bagian Timur', '2023-01-02 09:40:32', '2023-01-02 09:40:32'),
(459, 'Kabupaten Maluku Barat Daya', '2023-01-02 09:40:32', '2023-01-02 09:40:32'),
(460, 'Kabupaten Buru Selatan', '2023-01-02 09:40:32', '2023-01-02 09:40:32'),
(461, 'Kota Ambon', '2023-01-02 09:40:32', '2023-01-02 09:40:32'),
(462, 'Kota Tual', '2023-01-02 09:40:32', '2023-01-02 09:40:32'),
(463, 'Kabupaten Halmahera Barat', '2023-01-02 09:40:32', '2023-01-02 09:40:32'),
(464, 'Kabupaten Halmahera Tengah', '2023-01-02 09:40:32', '2023-01-02 09:40:32'),
(465, 'Kabupaten Kepulauan Sula', '2023-01-02 09:40:32', '2023-01-02 09:40:32'),
(466, 'Kabupaten Halmahera Selatan', '2023-01-02 09:40:32', '2023-01-02 09:40:32'),
(467, 'Kabupaten Halmahera Utara', '2023-01-02 09:40:32', '2023-01-02 09:40:32'),
(468, 'Kabupaten Halmahera Timur', '2023-01-02 09:40:32', '2023-01-02 09:40:32'),
(469, 'Kabupaten Pulau Morotai', '2023-01-02 09:40:32', '2023-01-02 09:40:32'),
(470, 'Kabupaten Pulau Taliabu', '2023-01-02 09:40:32', '2023-01-02 09:40:32'),
(471, 'Kota Ternate', '2023-01-02 09:40:32', '2023-01-02 09:40:32'),
(472, 'Kota Tidore Kepulauan', '2023-01-02 09:40:32', '2023-01-02 09:40:32'),
(473, 'Kabupaten Fakfak', '2023-01-02 09:40:32', '2023-01-02 09:40:32'),
(474, 'Kabupaten Kaimana', '2023-01-02 09:40:32', '2023-01-02 09:40:32'),
(475, 'Kabupaten Teluk Wondama', '2023-01-02 09:40:32', '2023-01-02 09:40:32'),
(476, 'Kabupaten Teluk Bintuni', '2023-01-02 09:40:32', '2023-01-02 09:40:32'),
(477, 'Kabupaten Manokwari', '2023-01-02 09:40:32', '2023-01-02 09:40:32'),
(478, 'Kabupaten Sorong Selatan', '2023-01-02 09:40:32', '2023-01-02 09:40:32'),
(479, 'Kabupaten Sorong', '2023-01-02 09:40:32', '2023-01-02 09:40:32'),
(480, 'Kabupaten Raja Ampat', '2023-01-02 09:40:32', '2023-01-02 09:40:32'),
(481, 'Kabupaten Tambrauw', '2023-01-02 09:40:32', '2023-01-02 09:40:32'),
(482, 'Kabupaten Maybrat', '2023-01-02 09:40:32', '2023-01-02 09:40:32'),
(483, 'Kabupaten Manokwari Selatan', '2023-01-02 09:40:32', '2023-01-02 09:40:32'),
(484, 'Kabupaten Pegunungan Arfak', '2023-01-02 09:40:32', '2023-01-02 09:40:32'),
(485, 'Kota Sorong', '2023-01-02 09:40:32', '2023-01-02 09:40:32'),
(486, 'Kabupaten Merauke', '2023-01-02 09:40:32', '2023-01-02 09:40:32'),
(487, 'Kabupaten Jayawijaya', '2023-01-02 09:40:32', '2023-01-02 09:40:32'),
(488, 'Kabupaten Jayapura', '2023-01-02 09:40:32', '2023-01-02 09:40:32'),
(489, 'Kabupaten Nabire', '2023-01-02 09:40:32', '2023-01-02 09:40:32'),
(490, 'Kabupaten Kepulauan Yapen', '2023-01-02 09:40:32', '2023-01-02 09:40:32'),
(491, 'Kabupaten Biak Numfor', '2023-01-02 09:40:32', '2023-01-02 09:40:32'),
(492, 'Kabupaten Paniai', '2023-01-02 09:40:32', '2023-01-02 09:40:32'),
(493, 'Kabupaten Puncak Jaya', '2023-01-02 09:40:32', '2023-01-02 09:40:32'),
(494, 'Kabupaten Mimika', '2023-01-02 09:40:32', '2023-01-02 09:40:32'),
(495, 'Kabupaten Boven Digoel', '2023-01-02 09:40:32', '2023-01-02 09:40:32'),
(496, 'Kabupaten Mappi', '2023-01-02 09:40:32', '2023-01-02 09:40:32'),
(497, 'Kabupaten Asmat', '2023-01-02 09:40:32', '2023-01-02 09:40:32'),
(498, 'Kabupaten Yahukimo', '2023-01-02 09:40:32', '2023-01-02 09:40:32'),
(499, 'Kabupaten Pegunungan Bintang', '2023-01-02 09:40:32', '2023-01-02 09:40:32'),
(500, 'Kabupaten Tolikara', '2023-01-02 09:40:32', '2023-01-02 09:40:32'),
(501, 'Kabupaten Sarmi', '2023-01-02 09:40:32', '2023-01-02 09:40:32'),
(502, 'Kabupaten Keerom', '2023-01-02 09:40:32', '2023-01-02 09:40:32'),
(503, 'Kabupaten Waropen', '2023-01-02 09:40:32', '2023-01-02 09:40:32'),
(504, 'Kabupaten Supiori', '2023-01-02 09:40:32', '2023-01-02 09:40:32'),
(505, 'Kabupaten Mamberamo Raya', '2023-01-02 09:40:32', '2023-01-02 09:40:32'),
(506, 'Kabupaten Nduga', '2023-01-02 09:40:32', '2023-01-02 09:40:32'),
(507, 'Kabupaten Lanny Jaya', '2023-01-02 09:40:32', '2023-01-02 09:40:32'),
(508, 'Kabupaten Mamberamo Tengah', '2023-01-02 09:40:32', '2023-01-02 09:40:32'),
(509, 'Kabupaten Yalimo', '2023-01-02 09:40:32', '2023-01-02 09:40:32'),
(510, 'Kabupaten Puncak', '2023-01-02 09:40:32', '2023-01-02 09:40:32'),
(511, 'Kabupaten Dogiyai', '2023-01-02 09:40:32', '2023-01-02 09:40:32'),
(512, 'Kabupaten Intan Jaya', '2023-01-02 09:40:32', '2023-01-02 09:40:32'),
(513, 'Kabupaten Deiyai', '2023-01-02 09:40:32', '2023-01-02 09:40:32'),
(514, 'Kota Jayapura', '2023-01-02 09:40:32', '2023-01-02 09:40:32');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `area_bus`
--
ALTER TABLE `area_bus`
  ADD PRIMARY KEY (`id_area_bus`),
  ADD KEY `area_bus_kode_kota_index` (`kode_kota`),
  ADD KEY `area_bus_kode_wilayah_index` (`kode_wilayah`);

--
-- Indexes for table `barang_trackings`
--
ALTER TABLE `barang_trackings`
  ADD PRIMARY KEY (`id_barang_tracking`);

--
-- Indexes for table `bus`
--
ALTER TABLE `bus`
  ADD PRIMARY KEY (`id_bus`),
  ADD KEY `bus_no_pol_index` (`no_pol`);

--
-- Indexes for table `cache`
--
ALTER TABLE `cache`
  ADD UNIQUE KEY `cache_key_unique` (`key`);

--
-- Indexes for table `cargo_pengiriman_barangs`
--
ALTER TABLE `cargo_pengiriman_barangs`
  ADD PRIMARY KEY (`id_cargo_pengiriman_barang`),
  ADD KEY `cargo_pengiriman_barangs_no_resi_index` (`no_resi`),
  ADD KEY `cargo_pengiriman_barangs_no_lmt_index` (`no_lmt`);

--
-- Indexes for table `cargo_pengiriman_details`
--
ALTER TABLE `cargo_pengiriman_details`
  ADD PRIMARY KEY (`id_cargo_pengiriman_detail`),
  ADD KEY `cargo_pengiriman_details_no_manifest_index` (`no_manifest`),
  ADD KEY `cargo_pengiriman_details_no_lmt_index` (`no_lmt`),
  ADD KEY `cargo_pengiriman_details_no_resi_index` (`no_resi`),
  ADD KEY `cargo_pengiriman_details_is_lunas_index` (`is_lunas`),
  ADD KEY `cargo_pengiriman_details_is_diterima_index` (`is_diterima`),
  ADD KEY `cargo_pengiriman_details_id_status_pembayaran_index` (`id_status_pembayaran`),
  ADD KEY `cargo_pengiriman_details_id_user_index` (`id_user`);

--
-- Indexes for table `distributors`
--
ALTER TABLE `distributors`
  ADD PRIMARY KEY (`id_distributor`),
  ADD KEY `distributors_name_index` (`name`);

--
-- Indexes for table `goods_category_bus`
--
ALTER TABLE `goods_category_bus`
  ADD PRIMARY KEY (`id_goods_category_bus`);

--
-- Indexes for table `kode_kotas`
--
ALTER TABLE `kode_kotas`
  ADD PRIMARY KEY (`id_kode_kota`),
  ADD KEY `kode_kotas_kode_kota_index` (`kode_kota`),
  ADD KEY `kode_kotas_kode_wilayah_index` (`kode_wilayah`);

--
-- Indexes for table `message_trackings`
--
ALTER TABLE `message_trackings`
  ADD PRIMARY KEY (`id_message_tracking`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pengiriman_bus`
--
ALTER TABLE `pengiriman_bus`
  ADD PRIMARY KEY (`id_pengiriman_bus`);

--
-- Indexes for table `status_pembayarans`
--
ALTER TABLE `status_pembayarans`
  ADD PRIMARY KEY (`id_status_pembayaran`);

--
-- Indexes for table `trucks`
--
ALTER TABLE `trucks`
  ADD PRIMARY KEY (`id_truck`),
  ADD KEY `trucks_no_pol_index` (`no_pol`);

--
-- Indexes for table `truck_trackings`
--
ALTER TABLE `truck_trackings`
  ADD PRIMARY KEY (`id_truck_tracking`),
  ADD KEY `truck_trackings_no_lmt_index` (`no_lmt`),
  ADD KEY `truck_trackings_id_message_tracking_index` (`id_message_tracking`),
  ADD KEY `truck_trackings_id_status_pembayaran_index` (`id_status_pembayaran`),
  ADD KEY `truck_trackings_id_user_index` (`id_user`);

--
-- Indexes for table `tujuan`
--
ALTER TABLE `tujuan`
  ADD PRIMARY KEY (`id_tujuan`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD KEY `users_status_user_index` (`status_user`),
  ADD KEY `users_id_kode_kota_index` (`id_kode_kota`),
  ADD KEY `users_id_kode_wilayah_index` (`id_area_bus`);

--
-- Indexes for table `wilayah`
--
ALTER TABLE `wilayah`
  ADD PRIMARY KEY (`id_wilayah`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `area_bus`
--
ALTER TABLE `area_bus`
  MODIFY `id_area_bus` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `barang_trackings`
--
ALTER TABLE `barang_trackings`
  MODIFY `id_barang_tracking` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `bus`
--
ALTER TABLE `bus`
  MODIFY `id_bus` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `cargo_pengiriman_barangs`
--
ALTER TABLE `cargo_pengiriman_barangs`
  MODIFY `id_cargo_pengiriman_barang` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=157;

--
-- AUTO_INCREMENT for table `cargo_pengiriman_details`
--
ALTER TABLE `cargo_pengiriman_details`
  MODIFY `id_cargo_pengiriman_detail` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=126;

--
-- AUTO_INCREMENT for table `distributors`
--
ALTER TABLE `distributors`
  MODIFY `id_distributor` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `goods_category_bus`
--
ALTER TABLE `goods_category_bus`
  MODIFY `id_goods_category_bus` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `kode_kotas`
--
ALTER TABLE `kode_kotas`
  MODIFY `id_kode_kota` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `message_trackings`
--
ALTER TABLE `message_trackings`
  MODIFY `id_message_tracking` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `pengiriman_bus`
--
ALTER TABLE `pengiriman_bus`
  MODIFY `id_pengiriman_bus` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `status_pembayarans`
--
ALTER TABLE `status_pembayarans`
  MODIFY `id_status_pembayaran` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `trucks`
--
ALTER TABLE `trucks`
  MODIFY `id_truck` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `truck_trackings`
--
ALTER TABLE `truck_trackings`
  MODIFY `id_truck_tracking` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `tujuan`
--
ALTER TABLE `tujuan`
  MODIFY `id_tujuan` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=381;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `wilayah`
--
ALTER TABLE `wilayah`
  MODIFY `id_wilayah` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=515;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
