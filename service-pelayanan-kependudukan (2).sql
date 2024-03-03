-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Mar 03, 2024 at 09:17 AM
-- Server version: 8.0.30
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `service-pelayanan-kependudukan`
--

-- --------------------------------------------------------

--
-- Table structure for table `berkas`
--

CREATE TABLE `berkas` (
  `id_berkas` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int NOT NULL,
  `alasan` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nama_file` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `url` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `jenis_file` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `berkas_upload`
--

CREATE TABLE `berkas_upload` (
  `id_berkas_upload` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_pendaftaran` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_syarat_berkas` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_jenis_file` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_berkas` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int NOT NULL,
  `keterangan` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint UNSIGNED NOT NULL,
  `uuid` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `isi_formulir`
--

CREATE TABLE `isi_formulir` (
  `id_isi_formulir` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_rincian_formulir` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_pendaftaran` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_layanan` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `isi` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_user` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `jenis_file`
--

CREATE TABLE `jenis_file` (
  `id_jenis_file` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `keterangan` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int NOT NULL,
  `multiple_files` int NOT NULL,
  `id_berkas` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `jenis_file`
--

INSERT INTO `jenis_file` (`id_jenis_file`, `nama`, `keterangan`, `status`, `multiple_files`, `id_berkas`, `created_at`, `updated_at`, `deleted_at`) VALUES
('0052569e-0266-4712-a724-8d7d9e0505d3', 'Buku Pokok Pemakaman', 'Buku Pokok Pemakaman', 1, 0, NULL, '2024-02-19 00:05:24', '2024-03-01 01:25:08', NULL),
('1089c2be-06f4-4b80-8ec5-75aeff7dbb4c', 'Fotokopi KTP Saksi Kematian', 'Fotokopi KTP Saksi Kematian 2 orang', 1, 1, NULL, '2024-02-19 00:04:31', '2024-02-19 00:04:31', NULL),
('17af4922-3caa-4726-9e1c-be99513f47c3', 'Data Pendukung Lainnya', 'Data Pendukung Lainnya(Ijazah, Akta Kelahiran, dll)', 1, 1, NULL, '2024-02-18 11:02:09', '2024-02-18 11:02:09', NULL),
('2134e9cf-4053-4929-87d7-e0a0c36d62da', 'Surat Pengantar RT, RW, Desa/Kelurahan, dan Kecamatan', 'Surat Pengantar RT, RW, Desa/Kelurahan, dan Kecamatan', 1, 0, NULL, '2024-02-18 10:22:23', '2024-02-18 10:22:23', NULL),
('280123dc-93a1-4f4f-8442-ab2486ba2da2', 'Surat Keterangan Lahir', 'Surat Keterangan Lahir dari Rumah Sakit/Puskesmas/Dokter/Bidan atau dari Kepala Desa/Lurah jika di Rumah/Tempai Lain oleh Penolong Kelahiran', 1, 0, NULL, '2024-02-19 00:09:39', '2024-02-19 00:09:39', NULL),
('280c4920-7b55-49ea-bd87-0a4104505520', 'Fotokopi KTP Pelapor', 'Fotokopi KTP Pelapor', 1, 0, NULL, '2024-02-19 00:05:03', '2024-02-19 00:05:03', NULL),
('429f16e7-2c53-4d77-a089-d9443999ddbe', 'Fotokopi KK untuk Anak yang sudah ada di dalam Kartu Keluarga', 'Fotokopi KK untuk Anak yang sudah ada di dalam Kartu Keluarga', 1, 0, NULL, '2024-02-19 00:11:38', '2024-02-19 00:11:38', NULL),
('5a6f4a83-f29f-423f-960a-0ffa6303c403', 'Surat Keterangan Pindah WNI (SKPWNI)', 'Surat Keterangan Pindah WNI (SKPWNI) bagi penduduk pindah dari kabupaten/kota dan provinsi lain dalam wilayah NKRI', 1, 0, NULL, '2024-02-18 10:59:28', '2024-02-18 10:59:28', NULL),
('61deda93-b96c-4813-a611-45e833203525', 'Fotokopi Buku Nikah atau Akta Kawin', 'Fotokopi Buku Nikah atau Akta Kawin', 1, 0, NULL, '2024-02-18 10:57:13', '2024-02-18 10:57:13', NULL),
('73e1b8f9-49ca-40e3-a605-9ebbf0b8994c', 'KK Asli untuk Penambahan Anggota Keluarga', 'KK Asli untuk Penambahan Anggota Keluarga', 1, 0, NULL, '2024-02-19 00:10:49', '2024-02-19 00:10:49', NULL),
('78383b6a-15f1-4f84-acdf-93cf6e5fcc88', 'Surat Kematian', 'Surat Kematian dari Dokter/Petugas Kesehatan/Kepala Desa/Lurah', 1, 0, NULL, '2024-02-18 23:59:32', '2024-02-18 23:59:32', NULL),
('7b7b42b8-ef0e-4c09-a110-5c92ab2b8c95', 'Fotokopi Akta Cerai', 'Fotokopi Akta Cerai bagi penduduk yang berstatus cerai hidup', 1, 0, NULL, '2024-02-18 10:58:10', '2024-02-18 10:58:10', NULL),
('836d7199-0216-40fa-8585-6a533790080a', 'Fotokopi Data Pendukung', 'Fotokopi Data Pendukung', 1, 1, NULL, '2024-02-19 00:42:00', '2024-02-19 00:42:00', NULL),
('83f73fa9-4a0f-4198-b030-468f34f58419', 'KK Rusak', 'KK yang rusak', 1, 0, NULL, '2024-02-18 23:53:18', '2024-02-18 23:53:18', NULL),
('873b52d6-a485-479d-8e4b-0979aef401c0', 'Surat Keterangan Hilang Dari Kepolisian', 'Surat Keterangan Hilang Dari Kepolisian (untuk KK hilang)', 1, 0, NULL, '2024-02-18 23:54:18', '2024-02-18 23:54:18', NULL),
('880825de-d07d-4b87-9e73-9b2597144c34', 'Form F1.02', 'Mengisi Form F1.02', 1, 0, NULL, '2024-02-18 10:33:23', '2024-02-18 11:19:43', NULL),
('902498bf-4663-4c7f-a49f-73dbb1e72463', 'Form F1.01', 'Mengisi Form F1.01', 1, 0, NULL, '2024-02-18 10:32:57', '2024-02-18 10:32:57', NULL),
('946501df-e8e7-4484-916d-3354683fb5bb', 'Berita Acara Dari Kepolisian', 'Berita Acara Dari Kepolisian bagi anak yang tidak diketahui asal usulnya/keberadaan orang tuanya', 1, 0, NULL, '2024-02-19 00:40:19', '2024-02-19 00:41:25', NULL),
('97bf5a7b-46a0-4d0b-99a3-a5695ef41931', 'Bukti Pendukung Perubahan', 'Bukti Pendukung Perubahan (Akta Lahir, Ijazah, Buku Nikah, Akta Cerai, dll)', 1, 1, NULL, '2024-02-18 23:51:31', '2024-02-18 23:51:31', NULL),
('9aaf2483-b9f1-4913-b997-7595ca59b2f4', 'KK Asli', 'KK Asli', 1, 0, NULL, '2024-02-18 23:50:40', '2024-02-18 23:50:40', NULL),
('9df923ca-d988-4021-a81d-abe38ea46cd5', 'Form F1.03', 'Mengisi Formulir F1.03', 1, 0, NULL, '2024-02-18 23:56:00', '2024-02-18 23:56:00', NULL),
('a9a0d6ff-403a-48a3-b3e6-f1ac1bd6780f', 'Fotokopi KTP-EL', 'Fotokopi KTP-EL', 1, 0, NULL, '2024-02-18 23:56:24', '2024-02-18 23:56:24', NULL),
('bff88b03-8958-4412-add3-7b514c555080', 'Form F1.06', 'Mengisi Form F1.06 Bermaterai Rp.10.000,-', 1, 0, NULL, '2024-02-18 23:50:25', '2024-02-18 23:50:25', NULL),
('c69aa286-a532-40ae-863a-8d217aad9cff', 'Form F1.04', 'Mengisi Form F1.04 bagi yang belum memiliki dokumen kependudukan', 1, 0, NULL, '2024-02-18 10:50:27', '2024-02-18 10:50:27', NULL),
('c6acf52e-7629-4740-8610-55e1279c9f6e', 'Nama', '-', 1, 0, '56b4c19d-4015-4667-8671-6a6015e46353', '2024-02-26 07:28:23', '2024-02-26 07:28:23', NULL),
('c8455ccd-b6ec-4d71-b38f-c05929addc71', 'KTP-EL yang Bersangkutan', 'KTP-EL yang Bersangkutan', 1, 0, NULL, '2024-02-19 00:00:04', '2024-02-19 00:00:04', NULL),
('d850c468-5352-4ad6-a494-0d33e7ba96e4', 'Form F2.01', 'Mengisi Form F2.01', 1, 0, NULL, '2024-02-18 23:57:58', '2024-02-18 23:57:58', NULL),
('de1f07af-66b6-454e-969b-2a8a1ba8bd4d', 'Formulir Pelaporan Kematian', 'Formulir Pelaporan Kematian', 1, 0, NULL, '2024-02-19 00:05:50', '2024-02-19 00:05:50', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `layanan`
--

CREATE TABLE `layanan` (
  `id_layanan` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_layanan` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `keterangan` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `kode` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` int NOT NULL,
  `urut` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `layanan`
--

INSERT INTO `layanan` (`id_layanan`, `nama_layanan`, `keterangan`, `kode`, `status`, `urut`, `created_at`, `updated_at`, `deleted_at`) VALUES
('004d45bd-ce12-4cb4-9552-d29474b46fb4', 'Pembuatan KTP el', '-', 'KK001', 1, 11, '2024-02-26 00:46:30', '2024-02-26 00:57:34', '2024-02-26 00:57:34'),
('33a881e3-8411-43eb-8cb9-d9e7f11ccfe4', 'Pembuatan KTP', '-', NULL, 1, 7, '2024-02-20 04:19:27', '2024-02-26 00:57:20', '2024-02-26 00:57:20'),
('54f05dfd-9acf-4c4e-9b5f-336a954f1772', 'Penerbitan Akta Kelahiran', 'Penerbitan Akta Kelahiran', NULL, 1, 6, '2024-02-18 10:20:56', '2024-02-18 10:20:56', NULL),
('827beb6b-2f6f-4f2e-9ca3-b403aff7269a', 'Penerbitan Akta Kematian', 'Penerbitan Akta Kematian', NULL, 1, 5, '2024-02-18 10:20:28', '2024-02-18 10:20:28', NULL),
('8c15382d-2c85-4625-9384-3ed7526643cb', 'Penerbitan Surat Keterangan Pindah WNI (SKPWN)', 'Penerbitan Surat Keterangan Pindah WNI (SKPWN)', NULL, 1, 4, '2024-02-18 10:19:59', '2024-02-18 10:19:59', NULL),
('95045b0e-a0dc-41f4-bce5-99df76a93178', 'Pembuatan KTP', '-', 'KTPEL', 1, 10, '2024-02-26 00:58:14', '2024-02-26 07:28:51', NULL),
('9c57126b-c766-4669-8160-c48fbe2d6323', 'Penerbitan Kartu Keluarga (KK) Baru', 'Penerbitan Kartu Keluarga (KK) Baru', 'KTP', 1, 1, '2024-02-18 10:17:41', '2024-02-26 02:33:17', NULL),
('ac3e584b-2705-499c-9f24-6b0ea7d47964', 'Pembuatan KTP el', '-', NULL, 1, 9, '2024-02-26 00:45:31', '2024-02-26 00:57:27', '2024-02-26 00:57:27'),
('cd9d0f28-19b0-4921-b573-46e57d609336', 'Penerbitan KK Karena Hilang Atau Rusak', 'Penerbitan KK Karena Hilang Atau Rusak', 'KR', 1, 3, '2024-02-18 10:19:18', '2024-02-26 03:33:27', NULL),
('fbd78e6c-ccd1-4d67-bda0-210a277b85a3', 'Penerbitan KK Karena Perubahan Elemen Data', 'Penerbitan KK Karena Perubahan Elemen Data', 'KK', 1, 2, '2024-02-18 10:18:43', '2024-03-01 01:45:14', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `id_message` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `message` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `user_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `receiver` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_seen` int NOT NULL,
  `id_berkas` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL,
  `updated_at` timestamp NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int UNSIGNED NOT NULL,
  `migration` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2024_01_10_024848_create_layanans', 1),
(6, '2024_01_10_024903_create_syarat_berkas', 1),
(7, '2024_01_10_025033_create_pendaftarans', 1),
(8, '2024_01_10_025041_create_berkas', 1),
(9, '2024_01_10_040508_create_jenis_file', 1),
(10, '2024_01_10_053008_create_rincian_formulir', 1),
(11, '2024_01_10_053710_create_isi_formulir', 1),
(12, '2024_01_11_015008_create_berkas_upload', 1);

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pendaftarans`
--

CREATE TABLE `pendaftarans` (
  `id_pendaftaran` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_layanan` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_berkas` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `kode_pendaftaran` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `keterangan` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_id` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `admin_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `profil`
--

CREATE TABLE `profil` (
  `id_profil` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_user` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `telepon` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `profil`
--

INSERT INTO `profil` (`id_profil`, `id_user`, `nama`, `alamat`, `telepon`, `created_at`, `updated_at`, `deleted_at`) VALUES
('c317a3c2-18ce-4fac-a4a8-9229adcfe856', '6717bd58-8cff-47e9-b5cd-e454a455f566', 'Admin1', '-', '11111111111', '2024-02-22 02:41:41', '2024-02-22 02:41:41', NULL),
('d34f609a-3e01-43a0-8447-1a862831ecf7', '1', 'Desa 1', '-', '11111111111', '2024-02-19 05:41:55', '2024-03-03 08:25:53', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `rincian_formulir`
--

CREATE TABLE `rincian_formulir` (
  `id_rincian_formulir` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_layanan` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `jenis` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `isi` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `urut` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `tag` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `status`
--

CREATE TABLE `status` (
  `id` int NOT NULL,
  `nama` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` int NOT NULL,
  `created_at` timestamp NOT NULL,
  `updated_at` timestamp NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `status`
--

INSERT INTO `status` (`id`, `nama`, `value`, `created_at`, `updated_at`) VALUES
(1, 'Draft', 1, '2024-01-12 03:49:57', '2024-01-12 03:49:57'),
(2, 'Terkirim', 2, '2024-01-12 03:51:21', '2024-01-12 03:51:21'),
(3, 'Proses', 3, '2024-01-12 03:51:36', '2024-01-12 03:51:36'),
(4, 'Selesai', 4, '2024-01-12 03:54:29', '2024-01-12 03:54:29'),
(5, 'Tolak', 5, '2024-01-12 03:55:28', '2024-01-12 03:55:28');

-- --------------------------------------------------------

--
-- Table structure for table `syarat_berkas`
--

CREATE TABLE `syarat_berkas` (
  `id_syarat_berkas` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_layanan` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_jenis_file` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `urut` int NOT NULL,
  `wajib` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `syarat_berkas`
--

INSERT INTO `syarat_berkas` (`id_syarat_berkas`, `id_layanan`, `id_jenis_file`, `status`, `urut`, `wajib`, `created_at`, `updated_at`, `deleted_at`) VALUES
('0b6aaee5-3b65-4cc1-9c7c-5cd1235d55c2', '827beb6b-2f6f-4f2e-9ca3-b403aff7269a', '1089c2be-06f4-4b80-8ec5-75aeff7dbb4c', '1', 5, 1, '2024-02-19 00:07:22', '2024-02-19 00:07:22', NULL),
('184831b2-f866-4c84-a026-a0bd0b49d21c', 'cd9d0f28-19b0-4921-b573-46e57d609336', '873b52d6-a485-479d-8e4b-0979aef401c0', '1', 2, 1, '2024-02-18 23:54:52', '2024-02-18 23:54:52', NULL),
('1f7e9e90-b288-45e1-a19c-7bccf8edfcfe', '95045b0e-a0dc-41f4-bce5-99df76a93178', '946501df-e8e7-4484-916d-3354683fb5bb', '1', 2, 1, '2024-02-26 01:27:49', '2024-02-26 07:29:14', NULL),
('3278ce96-dd38-455c-a23d-cc88e45b0373', '33a881e3-8411-43eb-8cb9-d9e7f11ccfe4', '429f16e7-2c53-4d77-a089-d9443999ddbe', '1', 1, 1, '2024-02-20 04:20:03', '2024-02-20 04:20:03', NULL),
('36ecc4b6-6c1e-4640-82d6-57c4007adbe4', '54f05dfd-9acf-4c4e-9b5f-336a954f1772', '836d7199-0216-40fa-8585-6a533790080a', '1', 7, 0, '2024-02-19 00:54:02', '2024-02-19 00:54:02', NULL),
('37d04e0b-6f80-499e-843f-7df68c221a5c', '9c57126b-c766-4669-8160-c48fbe2d6323', '880825de-d07d-4b87-9e73-9b2597144c34', '1', 3, 1, '2024-02-18 11:17:23', '2024-02-18 11:19:07', NULL),
('3adcf74f-9417-4da8-b26d-4ea60c21e623', '827beb6b-2f6f-4f2e-9ca3-b403aff7269a', 'd850c468-5352-4ad6-a494-0d33e7ba96e4', '1', 1, 1, '2024-02-19 00:06:13', '2024-02-19 00:06:13', NULL),
('4573f034-f46a-404b-a980-baee22104145', '54f05dfd-9acf-4c4e-9b5f-336a954f1772', '73e1b8f9-49ca-40e3-a605-9ebbf0b8994c', '1', 3, 1, '2024-02-19 00:43:26', '2024-02-19 00:43:26', NULL),
('460541d7-cde3-4ad9-83b5-6d645f04f860', '827beb6b-2f6f-4f2e-9ca3-b403aff7269a', '280c4920-7b55-49ea-bd87-0a4104505520', '1', 6, 1, '2024-02-19 00:07:42', '2024-02-19 00:07:42', NULL),
('4b4786c9-bc7b-4bb5-bd7e-cca4419ec408', '9c57126b-c766-4669-8160-c48fbe2d6323', '2134e9cf-4053-4929-87d7-e0a0c36d62da', '1', 1, 1, '2024-02-18 11:02:39', '2024-02-18 11:18:45', NULL),
('4e64281b-eba2-4884-bd31-b4b86c29aaf6', 'cd9d0f28-19b0-4921-b573-46e57d609336', '9aaf2483-b9f1-4913-b997-7595ca59b2f4', '1', 1, 1, '2024-02-18 23:54:38', '2024-02-19 15:58:33', NULL),
('5b230499-3ff7-4039-8ce8-31884c5448c9', 'fbd78e6c-ccd1-4d67-bda0-210a277b85a3', 'bff88b03-8958-4412-add3-7b514c555080', '1', 1, 1, '2024-02-18 23:51:49', '2024-02-18 23:51:49', NULL),
('7218cfff-f148-4f7d-807e-6dbd703399bd', '54f05dfd-9acf-4c4e-9b5f-336a954f1772', '946501df-e8e7-4484-916d-3354683fb5bb', '1', 5, 0, '2024-02-19 00:50:16', '2024-02-19 00:50:16', NULL),
('72ec083e-927a-43b9-a5b3-ab301e20bdf1', '827beb6b-2f6f-4f2e-9ca3-b403aff7269a', '0052569e-0266-4712-a724-8d7d9e0505d3', '1', 7, 1, '2024-02-19 00:07:54', '2024-02-19 00:07:54', NULL),
('7d4833ec-af36-42c5-aeaf-c54eafec8f1a', '827beb6b-2f6f-4f2e-9ca3-b403aff7269a', '78383b6a-15f1-4f84-acdf-93cf6e5fcc88', '1', 2, 1, '2024-02-19 00:06:33', '2024-02-19 00:06:33', NULL),
('80623841-5890-48a4-a031-d99b9d4eb335', '54f05dfd-9acf-4c4e-9b5f-336a954f1772', '280123dc-93a1-4f4f-8442-ab2486ba2da2', '1', 2, 1, '2024-02-19 00:42:48', '2024-02-19 00:42:48', NULL),
('80e69c9d-6b3c-4737-ae39-52e8e704523f', '827beb6b-2f6f-4f2e-9ca3-b403aff7269a', 'de1f07af-66b6-454e-969b-2a8a1ba8bd4d', '1', 8, 1, '2024-02-19 00:08:07', '2024-02-19 00:08:07', NULL),
('8873da37-0978-46f8-aae5-4f838b0231cb', '827beb6b-2f6f-4f2e-9ca3-b403aff7269a', '9aaf2483-b9f1-4913-b997-7595ca59b2f4', '1', 4, 1, '2024-02-19 00:07:05', '2024-02-19 00:07:05', NULL),
('89c1d170-bad5-45fa-bfed-9f1f414eefeb', '9c57126b-c766-4669-8160-c48fbe2d6323', '5a6f4a83-f29f-423f-960a-0ffa6303c403', '1', 7, 1, '2024-02-18 11:10:39', '2024-02-18 11:11:46', '2024-02-18 11:11:46'),
('8d8a6c05-4640-4d65-addb-442ad19011cb', '8c15382d-2c85-4625-9384-3ed7526643cb', 'a9a0d6ff-403a-48a3-b3e6-f1ac1bd6780f', '1', 3, 1, '2024-02-18 23:57:21', '2024-02-18 23:57:21', NULL),
('938260c1-5257-4f8d-b42f-8c6359fae87e', '9c57126b-c766-4669-8160-c48fbe2d6323', '17af4922-3caa-4726-9e1c-be99513f47c3', '1', 3, 1, '2024-02-18 11:05:07', '2024-02-18 11:09:31', '2024-02-18 11:09:31'),
('95451882-6a45-4eac-a411-e8d87c38f08a', '54f05dfd-9acf-4c4e-9b5f-336a954f1772', 'd850c468-5352-4ad6-a494-0d33e7ba96e4', '1', 1, 1, '2024-02-19 00:42:28', '2024-02-19 00:42:28', NULL),
('96cda95d-44a0-4104-8a42-cf4bdca8cb31', '9c57126b-c766-4669-8160-c48fbe2d6323', '61deda93-b96c-4813-a611-45e833203525', '1', 5, 1, '2024-02-18 11:10:15', '2024-02-18 11:10:32', NULL),
('a4f9513c-e0b7-44ba-91a3-35319893def1', 'fbd78e6c-ccd1-4d67-bda0-210a277b85a3', '9aaf2483-b9f1-4913-b997-7595ca59b2f4', '1', 2, 1, '2024-02-18 23:52:41', '2024-02-18 23:52:41', NULL),
('aa3f645b-2b61-4c9c-9065-61113217e6ee', '9c57126b-c766-4669-8160-c48fbe2d6323', 'c69aa286-a532-40ae-863a-8d217aad9cff', '1', 4, 1, '2024-02-18 11:11:01', '2024-02-18 11:23:10', NULL),
('b3af945f-98d3-4c34-899c-6bb69177c3f8', '54f05dfd-9acf-4c4e-9b5f-336a954f1772', '61deda93-b96c-4813-a611-45e833203525', '1', 6, 1, '2024-02-19 00:49:47', '2024-02-19 00:50:16', NULL),
('b544e8a7-097f-40f3-a242-7a730677248e', '9c57126b-c766-4669-8160-c48fbe2d6323', '902498bf-4663-4c7f-a49f-73dbb1e72463', '1', 2, 1, '2024-02-18 11:10:47', '2024-02-18 11:18:59', NULL),
('b829ab55-dc0b-483c-a734-e7f033792552', '9c57126b-c766-4669-8160-c48fbe2d6323', '7b7b42b8-ef0e-4c09-a110-5c92ab2b8c95', '1', 6, 1, '2024-02-18 11:10:32', '2024-02-18 11:23:38', NULL),
('ba95f133-bda2-4497-a1af-9ec250d20b1e', '827beb6b-2f6f-4f2e-9ca3-b403aff7269a', 'c8455ccd-b6ec-4d71-b38f-c05929addc71', '1', 3, 1, '2024-02-19 00:06:49', '2024-02-19 00:06:49', NULL),
('cdfcc5b3-3a9f-4a98-8642-37eae0834de8', '8c15382d-2c85-4625-9384-3ed7526643cb', '9aaf2483-b9f1-4913-b997-7595ca59b2f4', '1', 2, 1, '2024-02-18 23:57:04', '2024-02-18 23:57:04', NULL),
('d826baaf-219e-4d2b-bd4f-339e009d20f1', '9c57126b-c766-4669-8160-c48fbe2d6323', '17af4922-3caa-4726-9e1c-be99513f47c3', '1', 1, 1, '2024-02-18 11:05:21', '2024-02-18 11:09:25', '2024-02-18 11:09:25'),
('d91d5de3-61f6-4d43-a397-bf63e553cee3', '54f05dfd-9acf-4c4e-9b5f-336a954f1772', '429f16e7-2c53-4d77-a089-d9443999ddbe', '1', 4, 1, '2024-02-19 00:44:13', '2024-02-19 00:44:13', NULL),
('e3ae2cc4-0d3a-47bf-970a-08c87f8984a2', '95045b0e-a0dc-41f4-bce5-99df76a93178', 'c6acf52e-7629-4740-8610-55e1279c9f6e', '1', 1, 1, '2024-02-26 07:29:14', '2024-02-26 07:29:14', NULL),
('ec83c91c-9d29-418f-ba2b-70f506ccbe56', '9c57126b-c766-4669-8160-c48fbe2d6323', '17af4922-3caa-4726-9e1c-be99513f47c3', '1', 8, 1, '2024-02-18 11:09:39', '2024-02-18 11:19:07', NULL),
('ed6a0e45-6d62-4619-b908-7f1942471c11', 'fbd78e6c-ccd1-4d67-bda0-210a277b85a3', '97bf5a7b-46a0-4d0b-99a3-a5695ef41931', '1', 3, 1, '2024-02-18 23:52:54', '2024-02-18 23:52:54', NULL),
('f581ae3b-e4b5-4cab-981e-f2dc2bca9558', '9c57126b-c766-4669-8160-c48fbe2d6323', '5a6f4a83-f29f-423f-960a-0ffa6303c403', '1', 7, 1, '2024-02-18 11:10:00', '2024-02-18 11:23:56', NULL),
('ff495170-ffdf-43d0-8b71-4781ce576598', '8c15382d-2c85-4625-9384-3ed7526643cb', '9df923ca-d988-4021-a81d-abe38ea46cd5', '1', 1, 1, '2024-02-18 23:56:45', '2024-02-18 23:56:45', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `temporary_files`
--

CREATE TABLE `temporary_files` (
  `id_tmp` varchar(255) NOT NULL,
  `folder` varchar(255) NOT NULL,
  `file` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL,
  `updated_at` timestamp NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `nik` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` enum('p-desa','admin') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `nik`, `email`, `email_verified_at`, `password`, `role`, `remember_token`, `created_at`, `updated_at`, `deleted_at`) VALUES
('1', 'pegawai_desa1', '0987654321123456', 'pdesa1@gmail.com', NULL, '$2y$12$7e95YLdXm3p73pofP1KAhOdlRwkBni8e9JT/wF1D5DP.KKAt12e6G', 'p-desa', NULL, '2024-01-10 19:15:12', '2024-03-03 08:25:53', NULL),
('6717bd58-8cff-47e9-b5cd-e454a455f566', 'admindukcapil', '1234567890123456', 'admindukcapil@admin.com', NULL, '$2y$12$GFDE4NFZVYD7HWft.HWrXutl3uptQmm699jNTM5xGPPSnUSA6H4Pa', 'admin', NULL, '2024-02-15 01:40:06', '2024-03-03 08:25:12', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `berkas`
--
ALTER TABLE `berkas`
  ADD PRIMARY KEY (`id_berkas`);

--
-- Indexes for table `berkas_upload`
--
ALTER TABLE `berkas_upload`
  ADD PRIMARY KEY (`id_berkas_upload`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `isi_formulir`
--
ALTER TABLE `isi_formulir`
  ADD PRIMARY KEY (`id_isi_formulir`);

--
-- Indexes for table `jenis_file`
--
ALTER TABLE `jenis_file`
  ADD PRIMARY KEY (`id_jenis_file`);

--
-- Indexes for table `layanan`
--
ALTER TABLE `layanan`
  ADD PRIMARY KEY (`id_layanan`);

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`id_message`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `pendaftarans`
--
ALTER TABLE `pendaftarans`
  ADD PRIMARY KEY (`id_pendaftaran`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `profil`
--
ALTER TABLE `profil`
  ADD PRIMARY KEY (`id_profil`);

--
-- Indexes for table `rincian_formulir`
--
ALTER TABLE `rincian_formulir`
  ADD PRIMARY KEY (`id_rincian_formulir`);

--
-- Indexes for table `status`
--
ALTER TABLE `status`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `syarat_berkas`
--
ALTER TABLE `syarat_berkas`
  ADD PRIMARY KEY (`id_syarat_berkas`);

--
-- Indexes for table `temporary_files`
--
ALTER TABLE `temporary_files`
  ADD PRIMARY KEY (`id_tmp`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `status`
--
ALTER TABLE `status`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
