-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Feb 15, 2024 at 01:43 AM
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

--
-- Dumping data for table `berkas`
--

INSERT INTO `berkas` (`id_berkas`, `status`, `alasan`, `nama_file`, `url`, `jenis_file`, `created_at`, `updated_at`, `deleted_at`) VALUES
('01c76753-54df-49f3-a3e2-6cfd658b49ca', 1, NULL, '1705899386289-Kartu-KK2.pdf', 'public/upload/1705899386289-Kartu-KK2.pdf', 'pdf', '2024-01-22 04:56:26', '2024-01-22 05:00:17', '2024-01-22 05:00:17'),
('08706d3c-f89c-413f-905b-3193e0886db3', 1, NULL, '1705216847331-Perubahan-KK2', 'public/file/1705216847331-Perubahan-KK2', 'pdf', '2024-01-14 00:20:47', '2024-01-14 00:20:47', NULL),
('0a544421-726f-4ade-888b-b4251d0f4f56', 1, NULL, '1705899678121-Kartu-KK2.pdf', 'public/upload/1705899678121-Kartu-KK2.pdf', 'pdf', '2024-01-22 05:01:18', '2024-01-22 05:01:18', NULL),
('0d8c7a93-2deb-4560-8ba8-8318dde022af', 1, NULL, '1705287314293-.png', 'public/file/1705287314293-.png', 'pdf', '2024-01-14 19:55:14', '2024-01-14 19:55:14', NULL),
('0e0d03c9-c94a-4fd2-a358-caf0876567c5', 1, NULL, '1705619681175-1705288285003-Akta-Kelahiran.pdf', 'public/upload/1705619681175-1705288285003-Akta-Kelahiran.pdf', 'pdf', '2024-01-18 16:14:41', '2024-01-18 16:15:24', '2024-01-18 16:15:24'),
('13bdc0fb-b0ac-4c6a-9b68-a137426654ae', 1, NULL, '1705496846709-Kartu-KK2.png', 'public/file/1705496846709-Kartu-KK2.png', 'pdf', '2024-01-17 06:07:26', '2024-01-17 06:07:26', NULL),
('155e4090-b894-46a0-aeb8-42d9925b36a4', 1, NULL, '1705978392814-AKTA-KELAHIRAN.pdf', 'public/hasil/1705978392814-AKTA-KELAHIRAN.pdf', 'pdf', '2024-01-23 02:27:51', '2024-01-23 02:53:12', NULL),
('15a61f01-f0e2-4bb1-9ed6-1a09ee65255a', 1, NULL, '1705550134492-Tambah-Anggota-Keluarga-(Kelahiran)-+-Akta-Lahir.pdf', 'public/hasil/1705550134492-Tambah-Anggota-Keluarga-(Kelahiran)-+-Akta-Lahir.pdf', 'pdf', '2024-01-17 20:43:45', '2024-01-17 20:55:34', NULL),
('1a949116-7c8b-4c0b-8a2d-38737e747954', 1, NULL, '1705292844147-1705287890403-Akta-Kelahiran.png', 'public/upload/1705292844147-1705287890403-Akta-Kelahiran.png', 'pdf', '2024-01-11 18:31:53', '2024-01-14 21:27:24', NULL),
('1aa11718-824b-4f52-910f-9a71022f552c', 1, NULL, '1705619556509-1705288285003-Akta-Kelahiran.pdf', 'public/upload/1705619556509-1705288285003-Akta-Kelahiran.pdf', 'pdf', '2024-01-18 16:12:36', '2024-01-18 16:14:41', '2024-01-18 16:14:41'),
('20e72cc1-0dc6-4215-8dbb-8dad635863bb', 1, NULL, '1705897302146-Tambah-Anggota-Keluarga-(Kelahiran)-+-Akta-Lahir.pdf', 'public/hasil/1705897302146-Tambah-Anggota-Keluarga-(Kelahiran)-+-Akta-Lahir.pdf', 'pdf', '2024-01-22 04:20:43', '2024-01-22 04:21:42', NULL),
('26ba20d2-f068-445d-b72c-29610b8a9ae7', 1, NULL, '1705618713111-.pdf', 'public/upload/1705618713111-.pdf', 'pdf', '2024-01-18 15:58:33', '2024-01-18 16:07:51', '2024-01-18 16:07:51'),
('2816768b-c6c7-44f4-b8b1-97ccc51c95ac', 1, NULL, '1705619524295-.pdf', 'public/upload/1705619524295-.pdf', 'pdf', '2024-01-18 16:12:04', '2024-01-18 16:12:36', '2024-01-18 16:12:36'),
('33816bd8-ee75-43d5-a4f8-dfb2c60844f6', 1, NULL, '1705619439437-1705288285003-Akta-Kelahiran.pdf', 'public/upload/1705619439437-1705288285003-Akta-Kelahiran.pdf', 'pdf', '2024-01-18 16:10:39', '2024-01-18 16:11:08', '2024-01-18 16:11:08'),
('345641eb-fdca-4226-9544-cbc88c66578d', 1, NULL, '1705295821476-1705288035701-Akta-Kelahiran.png', 'public/upload/1705295821476-1705288035701-Akta-Kelahiran.png', 'pdf', '2024-01-14 22:17:01', '2024-01-14 22:17:01', NULL),
('39e9ffeb-fe8f-4bd9-a149-c76005fadb3a', 1, NULL, '1705899678094-Kartu-KK2.pdf', 'public/upload/1705899678094-Kartu-KK2.pdf', 'pdf', '2024-01-22 05:01:18', '2024-01-22 05:01:18', NULL),
('3bd2aa57-daa5-4e5e-8655-de01c79d3f36', 1, NULL, '1705513202648-1705288285003-Akta-Kelahiran.pdf', 'public/upload/1705513202648-1705288285003-Akta-Kelahiran.pdf', 'pdf', '2024-01-17 10:40:02', '2024-01-17 10:40:02', NULL),
('40d393e5-c53b-438e-a98d-ae7abc64aaf5', 1, NULL, '1705288285003-Akta-Kelahiran.png', 'public/hasil/1705288285003-Akta-Kelahiran.png', 'pdf', '2024-01-14 20:09:45', '2024-01-14 20:11:25', NULL),
('42567d11-5104-49a5-9a90-fc248ed8d6d4', 1, NULL, '1705295821450-1705287890403-Akta-Kelahiran.png', 'public/upload/1705295821450-1705287890403-Akta-Kelahiran.png', 'pdf', '2024-01-14 22:17:01', '2024-01-14 22:17:01', NULL),
('42a2ea27-c6ee-400e-bd9e-51b75ed61e85', 1, NULL, '1705619468992-1705288285003-Akta-Kelahiran.pdf', 'public/upload/1705619468992-1705288285003-Akta-Kelahiran.pdf', 'pdf', '2024-01-18 16:11:09', '2024-01-18 16:11:09', NULL),
('4364952f-0eed-4fe1-9f58-77139d9e12a4', 1, NULL, '1705295767185-1705288035701-Akta-Kelahiran.png', 'public/upload/1705295767185-1705288035701-Akta-Kelahiran.png', 'pdf', '2024-01-14 22:16:07', '2024-01-14 22:16:07', NULL),
('43a40b64-32ee-4381-ab5d-9bc0b8b350ae', 1, NULL, '1705619681125-1705288285003-Akta-Kelahiran.pdf', 'public/upload/1705619681125-1705288285003-Akta-Kelahiran.pdf', 'pdf', '2024-01-18 16:14:41', '2024-01-18 16:15:24', '2024-01-18 16:15:24'),
('4f8ce1e7-5c4d-439a-a73c-ad42511a1a20', 1, NULL, '1705496251734-Kartu-KK2.pdf', 'public/file/1705496251734-Kartu-KK2.pdf', 'pdf', '2024-01-17 05:57:31', '2024-01-17 05:57:40', '2024-01-17 05:57:40'),
('50222608-8ad8-47e1-bc23-c727f5bc4047', 1, NULL, '1705513202643-1705288285003-Akta-Kelahiran.pdf', 'public/upload/1705513202643-1705288285003-Akta-Kelahiran.pdf', 'pdf', '2024-01-17 10:40:02', '2024-01-17 10:40:02', NULL),
('561bf7b6-42f1-4b79-8b0a-aa182ff42387', 1, NULL, '1705219132475-Surat-Pengantar-RT/RW.png', 'public/file/1705219132475-Surat-Pengantar-RT/RW.png', 'pdf', '2024-01-14 00:57:04', '2024-01-17 01:37:12', '2024-01-17 01:37:12'),
('58a790d5-7b50-41a3-82bc-78329f99acc8', 1, NULL, '1705619681163-1705288285003-Akta-Kelahiran.pdf', 'public/upload/1705619681163-1705288285003-Akta-Kelahiran.pdf', 'pdf', '2024-01-18 16:14:41', '2024-01-18 16:15:24', '2024-01-18 16:15:24'),
('58c296a4-d2d4-4da7-b3ba-048709e2f7fd', 1, NULL, '1705475992106-contoh-pdf.pdf', 'public/file/1705475992106-contoh-pdf.pdf', 'pdf', '2024-01-17 00:19:52', '2024-01-17 00:19:52', NULL),
('602be184-54a8-41f8-8d4e-0988588ec231', 1, NULL, '1704990475484-rincian_formulir.sql', 'public/upload/1704990475484-rincian_formulir.sql', 'pdf', '2024-01-11 09:27:55', '2024-01-11 09:27:55', NULL),
('6157ce16-b604-4fce-bfb7-ce1d2f71ff41', 1, NULL, '1705513202617-1705288285003-Akta-Kelahiran.pdf', 'public/upload/1705513202617-1705288285003-Akta-Kelahiran.pdf', 'pdf', '2024-01-17 10:40:02', '2024-01-17 10:40:02', NULL),
('66c75565-6f30-40ec-98e7-95caf7a03fb7', 1, NULL, '1705292844159-1705288035701-Akta-Kelahiran.png', 'public/upload/1705292844159-1705288035701-Akta-Kelahiran.png', 'pdf', '2024-01-11 18:31:53', '2024-01-14 21:27:24', NULL),
('70c9b1ab-e30a-477f-8cb7-5c426925fea3', 1, NULL, '1705994436171-Kartu-Keluarga-(KK).pdf', 'public/upload/1705994436171-Kartu-Keluarga-(KK).pdf', 'pdf', '2024-01-23 07:20:36', '2024-01-23 07:20:36', NULL),
('71a9ed78-3399-492f-91ef-725ea41d3d56', 1, NULL, '1705976531741-Kartu-Keluarga-(KK).pdf', 'public/upload/1705976531741-Kartu-Keluarga-(KK).pdf', 'pdf', '2024-01-23 02:22:11', '2024-01-23 02:22:11', NULL),
('71f3f868-0962-4ea7-b9e3-45342efb6e64', 1, NULL, '1705620016747-.pdf', 'public/upload/1705620016747-.pdf', 'pdf', '2024-01-18 23:20:16', '2024-01-18 23:20:16', NULL),
('78a6ac6e-d22c-4b09-92da-381f3b274a20', 1, NULL, '1705022968540-rincian_formulir.sql', 'public/upload/1705022968540-rincian_formulir.sql', 'pdf', '2024-01-11 18:29:28', '2024-01-11 18:29:28', NULL),
('81bb69b9-f08d-416f-87dc-9a7e13ba2dc3', 1, NULL, '1705562423937-1705288285003-Akta-Kelahiran.pdf', 'public/upload/1705562423937-1705288285003-Akta-Kelahiran.pdf', 'pdf', '2024-01-18 00:07:48', '2024-01-18 00:20:23', NULL),
('8733115c-5e49-4991-bc13-e226cf76debf', 1, NULL, '1705295767153-1705288035701-Akta-Kelahiran.png', 'public/upload/1705295767153-1705288035701-Akta-Kelahiran.png', 'pdf', '2024-01-14 22:16:07', '2024-01-14 22:16:07', NULL),
('8ac25852-345e-40c4-a031-0ba496fdd2d4', 1, NULL, '1705513202651-1705288285003-Akta-Kelahiran.pdf', 'public/upload/1705513202651-1705288285003-Akta-Kelahiran.pdf', 'pdf', '2024-01-17 10:40:02', '2024-01-17 10:40:02', NULL),
('9f333bc5-1530-4f4d-86ca-e6374597dc2e', 1, NULL, '1705618713034-.pdf', 'public/upload/1705618713034-.pdf', 'pdf', '2024-01-18 15:58:33', '2024-01-18 16:07:51', '2024-01-18 16:07:51'),
('a03eddb5-9a61-45d2-aeb3-fabe63f79c23', 1, NULL, '1705619524329-.pdf', 'public/upload/1705619524329-.pdf', 'pdf', '2024-01-18 16:12:04', '2024-01-18 16:12:36', '2024-01-18 16:12:36'),
('aeafd493-dc69-4ec8-b048-3f4deffc96a6', 1, NULL, '1704990489286-rincian_formulir.sql', 'public/upload/1704990489286-rincian_formulir.sql', 'pdf', '2024-01-11 09:28:09', '2024-01-11 09:28:09', NULL),
('af92cc25-dc01-4b87-b33c-eb58319d8743', 1, NULL, '1705899386261-Kartu-KK2.pdf', 'public/upload/1705899386261-Kartu-KK2.pdf', 'pdf', '2024-01-22 04:56:26', '2024-01-22 05:00:17', '2024-01-22 05:00:17'),
('b42c3d87-d8f5-46c3-98e4-e0aa7ba622c1', 1, NULL, '1705619724873-1705288285003-Akta-Kelahiran.pdf', 'public/upload/1705619724873-1705288285003-Akta-Kelahiran.pdf', 'pdf', '2024-01-18 16:15:24', '2024-01-18 16:15:24', NULL),
('b6a82214-b9b5-4901-9c2b-c5dcd1e8b0d6', 1, NULL, '1705896119568-.pdf', 'public/upload/1705896119568-.pdf', 'pdf', '2024-01-22 04:01:59', '2024-01-22 04:01:59', NULL),
('b75c67f5-ecf3-4338-9036-12737e7ed867', 1, NULL, '1705619410702-1705288285003-Akta-Kelahiran.pdf', 'public/upload/1705619410702-1705288285003-Akta-Kelahiran.pdf', 'pdf', '2024-01-18 16:10:10', '2024-01-18 16:10:10', NULL),
('b8a86d3d-2e6d-4df8-b548-edc8d5190bf5', 1, NULL, '1705619398608-1705288285003-Akta-Kelahiran.pdf', 'public/upload/1705619398608-1705288285003-Akta-Kelahiran.pdf', 'pdf', '2024-01-18 16:09:58', '2024-01-18 16:09:58', NULL),
('c21ad6df-7532-4ec4-9f8b-524055d43624', 1, NULL, '1705619439409-1705288285003-Akta-Kelahiran.pdf', 'public/upload/1705619439409-1705288285003-Akta-Kelahiran.pdf', 'pdf', '2024-01-18 16:10:39', '2024-01-18 16:11:08', '2024-01-18 16:11:08'),
('d178940d-1ffd-4a63-878b-8c483d3246ff', 1, NULL, '1705619271332-1705288285003-Akta-Kelahiran.pdf', 'public/upload/1705619271332-1705288285003-Akta-Kelahiran.pdf', 'pdf', '2024-01-18 16:07:51', '2024-01-18 16:07:51', NULL),
('d626b39d-5b05-421b-b53f-febd9768412f', 1, NULL, '1705308236716-RW-(3).png', 'public/upload/1705308236716-RW-(3).png', 'pdf', '2024-01-15 01:43:56', '2024-01-15 01:43:56', NULL),
('d726ba0a-c016-4cda-92be-601270291e81', 1, NULL, '1705308236757-1705288035701-Akta-Kelahiran.png', 'public/upload/1705308236757-1705288035701-Akta-Kelahiran.png', 'pdf', '2024-01-15 01:43:56', '2024-01-15 01:43:56', NULL),
('d9d9bd4f-5248-4dc6-822c-8943f29e5993', 1, NULL, '1705022623498-rincian_formulir.sql', 'public/upload/1705022623498-rincian_formulir.sql', 'pdf', '2024-01-11 18:23:43', '2024-01-11 18:23:43', NULL),
('dcf30701-cf5b-4d8f-a003-46236135759a', 1, NULL, '1705216982916-kk2png', 'public/file/1705216982916-kk2png', 'pdf', '2024-01-14 00:23:02', '2024-01-14 00:23:02', NULL),
('e1b961f5-030a-4da9-b89b-fe7ab56d5a5e', 1, NULL, '1705619469033-1705288285003-Akta-Kelahiran.pdf', 'public/upload/1705619469033-1705288285003-Akta-Kelahiran.pdf', 'pdf', '2024-01-18 16:11:09', '2024-01-18 16:11:09', NULL),
('e59628ab-a722-4444-9f90-b34af2ec88ab', 1, NULL, '1705618713093-.pdf', 'public/upload/1705618713093-.pdf', 'pdf', '2024-01-18 15:58:33', '2024-01-18 16:07:51', '2024-01-18 16:07:51'),
('e9d023f9-2353-4596-911e-c6912c39cd9b', 1, NULL, '1705019884820-rincian_formulir.sql', 'public/upload/1705019884820-rincian_formulir.sql', 'pdf', '2024-01-11 17:38:04', '2024-01-11 17:38:04', NULL),
('eb02e8dc-43ff-424b-af2f-c6da7289bd48', 1, NULL, '1705309154654-1705288035701-Akta-Kelahiran.png', 'public/upload/1705309154654-1705288035701-Akta-Kelahiran.png', 'pdf', '2024-01-15 01:52:11', '2024-01-15 01:59:14', NULL),
('f05b5eb1-5d2d-472b-9880-0e32a6bd0405', 1, NULL, '1705619724857-1705288285003-Akta-Kelahiran.pdf', 'public/upload/1705619724857-1705288285003-Akta-Kelahiran.pdf', 'pdf', '2024-01-18 16:15:24', '2024-01-18 16:15:24', NULL),
('f14d7037-8eb7-4d18-9b51-50ba355139c6', 1, NULL, '1705979523141-akta.pdf', 'public/file/1705979523141-akta.pdf', 'pdf', '2024-01-23 02:32:29', '2024-01-23 07:17:40', '2024-01-23 07:17:40'),
('f2d2d892-72f7-48f4-9478-7e6306371454', 1, NULL, '1705309154632-1705287890403-Akta-Kelahiran.png', 'public/upload/1705309154632-1705287890403-Akta-Kelahiran.png', 'pdf', '2024-01-15 01:52:11', '2024-01-15 01:59:14', NULL),
('f36aca73-c4d5-448d-a8f7-2ce4bbef68b7', 1, NULL, '1705896119642-.pdf', 'public/upload/1705896119642-.pdf', 'pdf', '2024-01-22 04:01:59', '2024-01-22 04:01:59', NULL),
('f6e00a0e-b916-4438-9fd0-1d71532980be', 1, NULL, '1705288035701-Akta-Kelahiran.png', 'public/hasil/1705288035701-Akta-Kelahiran.png', 'pdf', '2024-01-14 19:57:09', '2024-01-14 20:07:15', NULL),
('fdb6ca8d-09f1-4cc8-a09c-62a5762a05c8', 1, NULL, '1705620016725-.pdf', 'public/upload/1705620016725-.pdf', 'pdf', '2024-01-18 23:20:16', '2024-01-18 23:20:16', NULL);

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

--
-- Dumping data for table `berkas_upload`
--

INSERT INTO `berkas_upload` (`id_berkas_upload`, `id_pendaftaran`, `id_syarat_berkas`, `id_jenis_file`, `id_berkas`, `status`, `keterangan`, `created_at`, `updated_at`, `deleted_at`) VALUES
('00b68e86-792e-4ceb-9985-a11f58dbadf8', '82b77b5d-6229-4b79-a6e5-bdcc870a7ac2', 'e75c7e35-1e2c-4e13-a255-21ed8bdbc826', '8a226182-a130-4cc4-bdaa-d3d58b423d71', '42a2ea27-c6ee-400e-bd9e-51b75ed61e85', 1, NULL, '2024-01-18 16:11:09', '2024-01-18 16:11:09', NULL),
('1551f0e4-fb7a-4b0b-be51-3a9a4a60d5fe', 'be686535-37da-430b-b19b-a99e706368b7', '257ca83e-2eff-4599-be55-08b7a23e957e', '34badda1-2c7d-48cb-af5f-b825876a83bb', '78a6ac6e-d22c-4b09-92da-381f3b274a20', 1, NULL, '2024-01-11 18:29:28', '2024-01-11 18:29:28', NULL),
('17eff045-0310-4874-bcc0-9d518db93383', '539021d5-0d7f-49e5-88b4-874cf5323f79', '9d132e70-ca64-4c3b-b51d-26c032256b1a', '8a226182-a130-4cc4-bdaa-d3d58b423d71', 'a03eddb5-9a61-45d2-aeb3-fabe63f79c23', 1, NULL, '2024-01-18 16:12:04', '2024-01-18 16:12:36', '2024-01-18 16:12:36'),
('18a68a46-f95b-4e1d-8db1-87d69a49d82e', '16a8c315-cdd8-4935-a90a-f25518ff0de5', 'e75c7e35-1e2c-4e13-a255-21ed8bdbc826', '8a226182-a130-4cc4-bdaa-d3d58b423d71', 'b6a82214-b9b5-4901-9c2b-c5dcd1e8b0d6', 2, NULL, '2024-01-22 04:01:59', '2024-01-22 04:03:13', NULL),
('268b3e0b-08e9-4681-b6aa-3e54222a6acd', 'ae7342ac-4ef2-49e8-99b3-df17bc1822df', 'e75c7e35-1e2c-4e13-a255-21ed8bdbc826', '8a226182-a130-4cc4-bdaa-d3d58b423d71', '39e9ffeb-fe8f-4bd9-a149-c76005fadb3a', 1, NULL, '2024-01-22 05:01:18', '2024-01-22 05:01:18', NULL),
('32fa6ac1-ba0b-419d-87d1-c6e042f7abe4', '82b77b5d-6229-4b79-a6e5-bdcc870a7ac2', 'e75c7e35-1e2c-4e13-a255-21ed8bdbc826', '8a226182-a130-4cc4-bdaa-d3d58b423d71', '9f333bc5-1530-4f4d-86ca-e6374597dc2e', 1, NULL, '2024-01-18 15:58:33', '2024-01-18 16:07:51', '2024-01-18 16:07:51'),
('335ee617-04db-49e4-b8a0-fcefadf15c32', 'f154aa92-d080-41eb-aa19-c2d04940bfd8', '257ca83e-2eff-4599-be55-08b7a23e957e', '34badda1-2c7d-48cb-af5f-b825876a83bb', '1a949116-7c8b-4c0b-8a2d-38737e747954', 1, NULL, '2024-01-11 18:31:53', '2024-01-11 18:31:53', NULL),
('3649b502-92ef-489d-859c-5347ebfc94ce', 'dace3e96-2629-42de-af52-262eaec56d7e', '257ca83e-2eff-4599-be55-08b7a23e957e', '34badda1-2c7d-48cb-af5f-b825876a83bb', 'f2d2d892-72f7-48f4-9478-7e6306371454', 1, NULL, '2024-01-15 01:52:11', '2024-01-15 01:52:11', NULL),
('36ebd37c-5721-4f29-858a-d7fedfcee5e4', '82b77b5d-6229-4b79-a6e5-bdcc870a7ac2', 'e75c7e35-1e2c-4e13-a255-21ed8bdbc826', '8a226182-a130-4cc4-bdaa-d3d58b423d71', 'c21ad6df-7532-4ec4-9f8b-524055d43624', 1, NULL, '2024-01-18 16:10:39', '2024-01-18 16:11:08', '2024-01-18 16:11:08'),
('39f5f9b7-df41-45a3-9d95-9c517a184528', '539021d5-0d7f-49e5-88b4-874cf5323f79', 'd4e6e7f8-46ae-46c8-9a07-f0ca2a932b35', '8a226182-a130-4cc4-bdaa-d3d58b423d71', '58a790d5-7b50-41a3-82bc-78329f99acc8', 1, NULL, '2024-01-18 16:14:41', '2024-01-18 16:15:24', '2024-01-18 16:15:24'),
('3ac30a7b-ba81-46fa-9e85-bec6b77a85ac', 'ae7342ac-4ef2-49e8-99b3-df17bc1822df', '6f925a07-4d0b-4cbf-8516-69e66cdf5567', '8a226182-a130-4cc4-bdaa-d3d58b423d71', '01c76753-54df-49f3-a3e2-6cfd658b49ca', 1, NULL, '2024-01-22 04:56:26', '2024-01-22 05:00:17', '2024-01-22 05:00:17'),
('40545c00-12a0-432b-a8e1-3e3762897bf5', '5ceb39ce-6f40-4d15-96ee-999d841e6582', '9d132e70-ca64-4c3b-b51d-26c032256b1a', '8a226182-a130-4cc4-bdaa-d3d58b423d71', '8ac25852-345e-40c4-a031-0ba496fdd2d4', 2, NULL, '2024-01-17 10:40:02', '2024-01-17 20:33:42', NULL),
('44e76a5d-2563-4d8f-84cc-fa2e24c7d4de', 'a4e43b43-43f6-4ba3-826e-6f3b8a4261ed', '7514a129-8f44-4283-b7d1-45565ef7aac2', 'da513520-d128-4c4d-9f6f-cef98a0edb71', '70c9b1ab-e30a-477f-8cb7-5c426925fea3', 1, NULL, '2024-01-23 07:20:36', '2024-01-23 07:20:36', NULL),
('4f3f89fb-ecb0-4a63-b0d4-5360cb8a7388', '5ceb39ce-6f40-4d15-96ee-999d841e6582', 'e75c7e35-1e2c-4e13-a255-21ed8bdbc826', '8a226182-a130-4cc4-bdaa-d3d58b423d71', '50222608-8ad8-47e1-bc23-c727f5bc4047', 2, NULL, '2024-01-17 10:40:02', '2024-01-17 20:33:29', NULL),
('569cd23f-c2cb-4b48-9470-0f18056cbf17', 'dace3e96-2629-42de-af52-262eaec56d7e', '7da5bbf1-9e63-4b63-9fee-4edfde93a94c', '2d4eb67d-eeaa-4034-af6b-a03a020d7381', 'eb02e8dc-43ff-424b-af2f-c6da7289bd48', 1, NULL, '2024-01-15 01:52:11', '2024-01-15 01:52:11', NULL),
('570d847a-6797-46a7-b1c5-cb182792a46f', '539021d5-0d7f-49e5-88b4-874cf5323f79', 'e75c7e35-1e2c-4e13-a255-21ed8bdbc826', '8a226182-a130-4cc4-bdaa-d3d58b423d71', '43a40b64-32ee-4381-ab5d-9bc0b8b350ae', 1, NULL, '2024-01-18 16:14:41', '2024-01-18 16:15:24', '2024-01-18 16:15:24'),
('58fcd05c-469b-4c9b-9018-502f00a74fd7', '019505d5-b761-47d2-99d1-46bb9686ed58', '257ca83e-2eff-4599-be55-08b7a23e957e', '34badda1-2c7d-48cb-af5f-b825876a83bb', 'aeafd493-dc69-4ec8-b048-3f4deffc96a6', 1, NULL, '2024-01-11 09:28:09', '2024-01-11 09:28:09', NULL),
('59f4a7fa-57e7-4cb4-b6b1-fe581d655ba3', '539021d5-0d7f-49e5-88b4-874cf5323f79', 'e75c7e35-1e2c-4e13-a255-21ed8bdbc826', '8a226182-a130-4cc4-bdaa-d3d58b423d71', 'f05b5eb1-5d2d-472b-9880-0e32a6bd0405', 1, NULL, '2024-01-18 16:15:24', '2024-01-18 16:15:24', NULL),
('629be7bf-b40c-45a6-a7d8-fe6fd60af14a', '4b0f449b-5a25-45c7-8a49-6d03bd81d090', '257ca83e-2eff-4599-be55-08b7a23e957e', '34badda1-2c7d-48cb-af5f-b825876a83bb', 'd9d9bd4f-5248-4dc6-822c-8943f29e5993', 1, NULL, '2024-01-11 18:23:43', '2024-01-11 18:23:43', NULL),
('65fa665c-b6d0-46d9-98ab-c8515e721842', '82b77b5d-6229-4b79-a6e5-bdcc870a7ac2', '9d132e70-ca64-4c3b-b51d-26c032256b1a', '8a226182-a130-4cc4-bdaa-d3d58b423d71', 'e59628ab-a722-4444-9f90-b34af2ec88ab', 1, NULL, '2024-01-18 15:58:33', '2024-01-18 16:07:51', '2024-01-18 16:07:51'),
('6af72f5f-fd90-431e-960a-25e6101aab4e', '4c0d5172-8823-4911-99dd-d74340ccf99c', '7da5bbf1-9e63-4b63-9fee-4edfde93a94c', '2d4eb67d-eeaa-4034-af6b-a03a020d7381', '4364952f-0eed-4fe1-9f58-77139d9e12a4', 1, NULL, '2024-01-14 22:16:07', '2024-01-14 22:16:07', NULL),
('733808fd-dc78-4c6c-af54-cd3141b1307d', '331b52ac-20da-4750-a6ed-841e602d846e', '257ca83e-2eff-4599-be55-08b7a23e957e', '34badda1-2c7d-48cb-af5f-b825876a83bb', 'd626b39d-5b05-421b-b53f-febd9768412f', 1, NULL, '2024-01-15 01:43:56', '2024-01-15 01:43:56', NULL),
('75589c84-3d4f-49f0-85ad-b941a58f4b07', '539021d5-0d7f-49e5-88b4-874cf5323f79', '6f925a07-4d0b-4cbf-8516-69e66cdf5567', '8a226182-a130-4cc4-bdaa-d3d58b423d71', '0e0d03c9-c94a-4fd2-a358-caf0876567c5', 1, NULL, '2024-01-18 16:14:41', '2024-01-18 16:15:24', '2024-01-18 16:15:24'),
('7e32c66b-692a-44ca-a585-3601311e7281', '82b77b5d-6229-4b79-a6e5-bdcc870a7ac2', 'ebad1cc8-a4c6-4f38-83e9-2b2b1a82181c', '2d4eb67d-eeaa-4034-af6b-a03a020d7381', '26ba20d2-f068-445d-b72c-29610b8a9ae7', 1, NULL, '2024-01-18 15:58:33', '2024-01-18 16:07:51', '2024-01-18 16:07:51'),
('862ccd65-3b01-451c-96f4-006c0180ac2f', '35de136b-6076-4de4-b0e8-30a8f29e3431', '257ca83e-2eff-4599-be55-08b7a23e957e', '34badda1-2c7d-48cb-af5f-b825876a83bb', 'e9d023f9-2353-4596-911e-c6912c39cd9b', 1, NULL, '2024-01-11 17:38:04', '2024-01-11 17:38:04', NULL),
('8a9c712d-268c-4f5b-9874-17d681efac47', '87c70e5b-19c8-4eb1-b88e-c9d5d0d9e913', '3138713e-0fbf-4cfb-9c10-3d013b062f1c', '2d4eb67d-eeaa-4034-af6b-a03a020d7381', '81bb69b9-f08d-416f-87dc-9a7e13ba2dc3', 1, NULL, '2024-01-18 00:07:48', '2024-01-18 00:07:48', NULL),
('8f945aee-f253-41ed-af18-7fb4948c8efe', '5ceb39ce-6f40-4d15-96ee-999d841e6582', 'ebad1cc8-a4c6-4f38-83e9-2b2b1a82181c', '2d4eb67d-eeaa-4034-af6b-a03a020d7381', '3bd2aa57-daa5-4e5e-8655-de01c79d3f36', 2, NULL, '2024-01-17 10:40:02', '2024-01-17 20:33:35', NULL),
('98ed7b88-d8af-4330-ab45-416e87194472', 'ae7342ac-4ef2-49e8-99b3-df17bc1822df', 'e75c7e35-1e2c-4e13-a255-21ed8bdbc826', '8a226182-a130-4cc4-bdaa-d3d58b423d71', 'af92cc25-dc01-4b87-b33c-eb58319d8743', 1, NULL, '2024-01-22 04:56:26', '2024-01-22 05:00:17', '2024-01-22 05:00:17'),
('9a6c5433-0995-4c19-91d3-0a9008515c12', '82b77b5d-6229-4b79-a6e5-bdcc870a7ac2', '9d132e70-ca64-4c3b-b51d-26c032256b1a', '8a226182-a130-4cc4-bdaa-d3d58b423d71', 'e1b961f5-030a-4da9-b89b-fe7ab56d5a5e', 1, NULL, '2024-01-18 16:11:09', '2024-01-18 16:11:09', NULL),
('9efab1ce-2e28-4444-ab51-82fb926dcc9f', '16a8c315-cdd8-4935-a90a-f25518ff0de5', '6f925a07-4d0b-4cbf-8516-69e66cdf5567', '8a226182-a130-4cc4-bdaa-d3d58b423d71', 'f36aca73-c4d5-448d-a8f7-2ce4bbef68b7', 2, NULL, '2024-01-22 04:01:59', '2024-01-22 04:03:19', NULL),
('a357a2b3-1562-4fde-8dd5-27c50113c61c', 'fac69a1a-d014-4e2b-8d03-dc7b2e419e62', '7514a129-8f44-4283-b7d1-45565ef7aac2', 'da513520-d128-4c4d-9f6f-cef98a0edb71', '71a9ed78-3399-492f-91ef-725ea41d3d56', 2, 'ok', '2024-01-23 02:22:11', '2024-01-23 02:24:51', NULL),
('b194f6c0-d27e-4cb1-b73a-2647608d89bc', '539021d5-0d7f-49e5-88b4-874cf5323f79', 'e75c7e35-1e2c-4e13-a255-21ed8bdbc826', '8a226182-a130-4cc4-bdaa-d3d58b423d71', '1aa11718-824b-4f52-910f-9a71022f552c', 1, NULL, '2024-01-18 16:12:36', '2024-01-18 16:14:41', '2024-01-18 16:14:41'),
('b22eb12b-0272-4433-804b-60b74afff822', 'f021f548-e543-4db3-bb8a-700eb15a6cba', '6f925a07-4d0b-4cbf-8516-69e66cdf5567', '8a226182-a130-4cc4-bdaa-d3d58b423d71', '71f3f868-0962-4ea7-b9e3-45342efb6e64', 1, NULL, '2024-01-18 23:20:16', '2024-01-18 23:20:16', NULL),
('c552f863-d4b4-4fce-a7c1-bcb210964dfa', '5ceb39ce-6f40-4d15-96ee-999d841e6582', 'fc2933d9-0943-48e6-a8f6-3f17851fb8ec', '2162641d-d6d5-4913-af8f-7595f4d6a705', '6157ce16-b604-4fce-bfb7-ce1d2f71ff41', 2, NULL, '2024-01-17 10:40:02', '2024-01-17 20:33:22', NULL),
('d87664f1-db26-450e-b4ce-03dff49c908f', 'f021f548-e543-4db3-bb8a-700eb15a6cba', 'e75c7e35-1e2c-4e13-a255-21ed8bdbc826', '8a226182-a130-4cc4-bdaa-d3d58b423d71', 'fdb6ca8d-09f1-4cc8-a09c-62a5762a05c8', 1, NULL, '2024-01-18 23:20:16', '2024-01-18 23:20:16', NULL),
('dd7f897e-072a-4726-8c6d-4b156e2122d8', '82b77b5d-6229-4b79-a6e5-bdcc870a7ac2', '9d132e70-ca64-4c3b-b51d-26c032256b1a', '8a226182-a130-4cc4-bdaa-d3d58b423d71', '33816bd8-ee75-43d5-a4f8-dfb2c60844f6', 1, NULL, '2024-01-18 16:10:39', '2024-01-18 16:11:08', '2024-01-18 16:11:08'),
('e5ce87bb-c20f-4827-9ea1-e3651ab2db7b', '4c0d5172-8823-4911-99dd-d74340ccf99c', '257ca83e-2eff-4599-be55-08b7a23e957e', '34badda1-2c7d-48cb-af5f-b825876a83bb', '8733115c-5e49-4991-bc13-e226cf76debf', 1, NULL, '2024-01-14 22:16:07', '2024-01-14 22:16:07', NULL),
('edd632d7-6f13-44da-8145-ff695a9b8b70', 'f154aa92-d080-41eb-aa19-c2d04940bfd8', '7da5bbf1-9e63-4b63-9fee-4edfde93a94c', '2d4eb67d-eeaa-4034-af6b-a03a020d7381', '66c75565-6f30-40ec-98e7-95caf7a03fb7', 1, NULL, '2024-01-11 18:31:53', '2024-01-11 18:31:53', NULL),
('efe3fc97-22e7-4d9e-b50c-f7ae97d3e7f4', '539021d5-0d7f-49e5-88b4-874cf5323f79', '6f925a07-4d0b-4cbf-8516-69e66cdf5567', '8a226182-a130-4cc4-bdaa-d3d58b423d71', 'b42c3d87-d8f5-46c3-98e4-e0aa7ba622c1', 1, NULL, '2024-01-18 16:15:24', '2024-01-18 16:15:24', NULL),
('f5497653-f262-4ac8-9c0d-99150a1e5437', 'ae7342ac-4ef2-49e8-99b3-df17bc1822df', '6f925a07-4d0b-4cbf-8516-69e66cdf5567', '8a226182-a130-4cc4-bdaa-d3d58b423d71', '0a544421-726f-4ade-888b-b4251d0f4f56', 1, NULL, '2024-01-22 05:01:18', '2024-01-22 05:01:18', NULL),
('f8cb77cf-b5cc-420f-b421-cfd402924cd6', 'dc426017-05bd-4da0-8390-a7f24dcf592e', '7da5bbf1-9e63-4b63-9fee-4edfde93a94c', '2d4eb67d-eeaa-4034-af6b-a03a020d7381', '345641eb-fdca-4226-9544-cbc88c66578d', 1, NULL, '2024-01-14 22:17:01', '2024-01-14 22:17:01', NULL),
('f9c30f2f-1779-4cdd-b39e-b83d2dff0875', '539021d5-0d7f-49e5-88b4-874cf5323f79', 'e75c7e35-1e2c-4e13-a255-21ed8bdbc826', '8a226182-a130-4cc4-bdaa-d3d58b423d71', '2816768b-c6c7-44f4-b8b1-97ccc51c95ac', 1, NULL, '2024-01-18 16:12:04', '2024-01-18 16:12:36', '2024-01-18 16:12:36'),
('fd3185ee-fe20-4b12-a63c-6891fed0234e', 'dc426017-05bd-4da0-8390-a7f24dcf592e', '257ca83e-2eff-4599-be55-08b7a23e957e', '34badda1-2c7d-48cb-af5f-b825876a83bb', '42567d11-5104-49a5-9a90-fc248ed8d6d4', 1, NULL, '2024-01-14 22:17:01', '2024-01-14 22:17:01', NULL),
('fe341d9d-9a71-4385-b75b-d01f608be1ec', '331b52ac-20da-4750-a6ed-841e602d846e', '7da5bbf1-9e63-4b63-9fee-4edfde93a94c', '2d4eb67d-eeaa-4034-af6b-a03a020d7381', 'd726ba0a-c016-4cda-92be-601270291e81', 1, NULL, '2024-01-15 01:43:56', '2024-01-15 01:43:56', NULL);

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

--
-- Dumping data for table `isi_formulir`
--

INSERT INTO `isi_formulir` (`id_isi_formulir`, `id_rincian_formulir`, `id_pendaftaran`, `id_layanan`, `isi`, `id_user`, `created_at`, `updated_at`, `deleted_at`) VALUES
('089e1f7b-c966-4654-b246-317278d14701', 'bae1fedf-983b-4fd0-a119-4b358356fbef', 'a4e43b43-43f6-4ba3-826e-6f3b8a4261ed', '715a06ec-e0ef-4773-be91-ef8e9ad595bc', '1.Islam', '4', '2024-01-23 07:20:36', '2024-01-23 07:20:59', NULL),
('86f49fe0-da2e-4486-b6b1-230880d6ccc2', '04757a79-4a2a-4c3b-a941-0c988f513cbf', 'a4e43b43-43f6-4ba3-826e-6f3b8a4261ed', '715a06ec-e0ef-4773-be91-ef8e9ad595bc', '0812766666', '4', '2024-01-23 07:20:36', '2024-01-23 07:20:59', NULL),
('888dfa11-e8e3-4373-9581-b8377758d0d6', '20c7a039-237b-4042-ae48-781bbd22ed66', 'a4e43b43-43f6-4ba3-826e-6f3b8a4261ed', '715a06ec-e0ef-4773-be91-ef8e9ad595bc', 'pauzian123@gmail.com', '4', '2024-01-23 07:20:36', '2024-01-23 07:20:59', NULL),
('9423bfc6-10c1-4aa4-9035-7bb7ed82607c', 'bae1fedf-983b-4fd0-a119-4b358356fbef', 'fac69a1a-d014-4e2b-8d03-dc7b2e419e62', '715a06ec-e0ef-4773-be91-ef8e9ad595bc', '1.Islam', '4', '2024-01-23 02:22:11', '2024-01-23 02:22:47', NULL),
('c08346a7-d35e-42d4-bd02-1d3b1528c277', 'bf209365-1607-46dc-9b30-745a6ffe621e', 'fac69a1a-d014-4e2b-8d03-dc7b2e419e62', '715a06ec-e0ef-4773-be91-ef8e9ad595bc', 'Cristian Ronaldo', '4', '2024-01-23 02:22:11', '2024-01-23 02:22:47', NULL),
('c115272e-036d-46dd-976d-715d22339305', 'bf209365-1607-46dc-9b30-745a6ffe621e', 'a4e43b43-43f6-4ba3-826e-6f3b8a4261ed', '715a06ec-e0ef-4773-be91-ef8e9ad595bc', 'pauzian', '4', '2024-01-23 07:20:36', '2024-01-23 07:20:59', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `jenis_file`
--

CREATE TABLE `jenis_file` (
  `id_jenis_file` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `keterangan` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int NOT NULL,
  `id_berkas` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `jenis_file`
--

INSERT INTO `jenis_file` (`id_jenis_file`, `nama`, `keterangan`, `status`, `id_berkas`, `created_at`, `updated_at`, `deleted_at`) VALUES
('3f5beac3-08f0-44e0-8b22-0b62b89df6ef', 'Email', 'Email', 1, NULL, '2024-01-23 07:14:51', '2024-01-23 07:17:08', '2024-01-23 07:17:08'),
('47a9d708-ceb8-46d9-9056-07b6fe111aff', 'Akta Lahir', 'Akta Lahir', 1, NULL, '2024-01-23 02:32:29', '2024-01-23 07:17:40', NULL),
('666298a1-c5de-41c2-916c-9ec9455e0031', 'No.HP', 'No.HP', 1, NULL, '2024-01-23 07:14:40', '2024-01-23 07:17:15', '2024-01-23 07:17:15'),
('c8d879c6-2e02-4ce3-86d1-e32175d730a2', 'KTP', 'Kartu Tanda Penduduk', 1, NULL, '2024-01-23 07:15:05', '2024-01-23 07:15:05', NULL),
('da513520-d128-4c4d-9f6f-cef98a0edb71', 'Kartu Keluarga (KK)', 'Wajib', 1, NULL, '2024-01-23 02:09:45', '2024-01-23 02:09:45', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `layanan`
--

CREATE TABLE `layanan` (
  `id_layanan` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_layanan` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `keterangan` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int NOT NULL,
  `urut` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `layanan`
--

INSERT INTO `layanan` (`id_layanan`, `nama_layanan`, `keterangan`, `status`, `urut`, `created_at`, `updated_at`, `deleted_at`) VALUES
('38e8269b-d877-4652-a4bc-9517be836c7c', 'AKTA KAWIN', 'Isi formulir pendaftaran perkawinan secara online dengan informasi yang akurat. Informasi yang biasanya dimasukkan melibatkan data tentang pasangan yang akan menikah, termasuk nama, tempat dan tanggal lahir, serta informasi pribadi lainnya.', 1, 3, '2024-01-23 02:06:15', '2024-01-23 02:06:15', NULL),
('44e61aed-7224-4c13-8dd0-007fd555cf7c', 'AKTA KEMATIAN', 'Isi formulir pendaftaran kematian dengan informasi yang akurat. Data yang biasanya dimasukkan mencakup identitas orang yang meninggal, termasuk nama, tempat dan tanggal lahir, serta informasi kematian.', 1, 2, '2024-01-23 02:05:23', '2024-01-23 02:05:23', NULL),
('715a06ec-e0ef-4773-be91-ef8e9ad595bc', 'AKTA KELAHIRAN', 'Isi formulir pendaftaran kelahiran secara online dengan informasi yang akurat, termasuk data bayi dan orang tua.', 1, 1, '2024-01-23 02:04:01', '2024-01-23 02:04:01', NULL);

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
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pendaftarans`
--

INSERT INTO `pendaftarans` (`id_pendaftaran`, `id_layanan`, `id_berkas`, `kode_pendaftaran`, `status`, `keterangan`, `user_id`, `created_at`, `updated_at`, `deleted_at`) VALUES
('a4e43b43-43f6-4ba3-826e-6f3b8a4261ed', '715a06ec-e0ef-4773-be91-ef8e9ad595bc', NULL, 'P023012024022036', '2', NULL, '4', '2024-01-23 07:20:36', '2024-01-23 07:20:59', NULL),
('fac69a1a-d014-4e2b-8d03-dc7b2e419e62', '715a06ec-e0ef-4773-be91-ef8e9ad595bc', '155e4090-b894-46a0-aeb8-42d9925b36a4', 'P023012024092211', '4', 'oke', '4', '2024-01-23 02:22:11', '2024-01-23 02:53:12', NULL);

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
  `nip` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
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

INSERT INTO `profil` (`id_profil`, `id_user`, `nip`, `nama`, `alamat`, `telepon`, `created_at`, `updated_at`, `deleted_at`) VALUES
('1548968a-2873-4f34-ae18-400afc43867e', '6717bd58-8cff-47e9-b5cd-e454a455f566', '111111111111111111', 'admindukcapil', '1', '11111111111', '2024-02-15 01:40:06', '2024-02-15 01:40:06', NULL),
('8dca9c4f-1afb-40ed-bdc8-ce90b3540100', '4', '1930', 'afif1', 'jl.sunan1', '090989', '2024-01-14 23:33:06', '2024-01-15 01:02:23', NULL),
('cd38b12b-b456-410e-8dfb-c7a4bf832a45', '5', '11839127', 'robi', 'jl.sunan', '13217398', '2024-01-15 01:07:53', '2024-01-15 21:44:42', '2024-01-15 21:44:42'),
('d88a7fd8-c8c4-4e26-9e80-4e563ec4afca', '46defeca-2bbe-4221-8714-930f0cbeed92', '123456789012345678', 'robi', 'jlkf', '09876543123', '2024-01-17 07:37:30', '2024-01-17 07:37:30', NULL),
('d929d4b5-1ea5-4aa8-837b-dcabe6845e48', '7', '148197481', 'afiiff', 'kfsjkfs', '090989', '2024-01-15 22:07:12', '2024-01-16 00:41:41', '2024-01-16 00:41:41'),
('e335b9ac-f740-4e05-ada5-b6337e57230a', '6', '1930', 'r1', 'jl.sunan1', '090989', '2024-01-15 01:09:30', '2024-01-16 00:43:00', '2024-01-16 00:43:00');

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

--
-- Dumping data for table `rincian_formulir`
--

INSERT INTO `rincian_formulir` (`id_rincian_formulir`, `id_layanan`, `nama`, `jenis`, `isi`, `urut`, `tag`, `status`, `created_at`, `updated_at`, `deleted_at`) VALUES
('04757a79-4a2a-4c3b-a941-0c988f513cbf', '715a06ec-e0ef-4773-be91-ef8e9ad595bc', 'Nomor HP', 'number', NULL, '3', 'HP', '1', '2024-01-23 07:18:15', '2024-01-23 07:19:14', NULL),
('20c7a039-237b-4042-ae48-781bbd22ed66', '715a06ec-e0ef-4773-be91-ef8e9ad595bc', 'Email', 'text', NULL, '4', 'email', '1', '2024-01-23 07:18:51', '2024-01-23 07:19:18', NULL),
('2663cc86-4c57-444b-88d1-6ccc3533a33b', '3ce12fc2-3003-4180-9145-425414e8845b', 'nama lengkap', 'number', NULL, '5', 'nama_lengkap', '1', '2024-01-17 01:08:38', '2024-01-23 07:19:18', NULL),
('2ad9d6c1-252f-4074-8262-675daebf7603', 'fb300d83-4235-4231-ac30-884d633596f1', 'tanggal', 'date', NULL, '3', 'tanggal', '1', '2024-01-17 08:43:41', '2024-01-23 07:19:07', NULL),
('45564aa4-0d4d-434a-86ee-992bf8424adf', '3bbb275b-47fc-458d-89c9-55e201977c0a', 'Tanggal Meninggal', 'date', NULL, '2', 'tanggal_meninggal', '0', '2024-01-10 21:25:07', '2024-01-16 23:07:46', NULL),
('4d10599b-6524-4885-88ff-368ae59ddaf2', '3bbb275b-47fc-458d-89c9-55e201977c0a', 'Jumlah Anak', 'option', '[{\"value\":1,\"name\":\"2\"},{\"value\":2,\"name\":\"3\"},{\"value\":3,\"name\":\"4\"},{\"value\":4,\"name\":\"5\"}]', '3', 'anak', '1', '2024-01-10 23:08:32', '2024-01-14 07:53:21', NULL),
('54debef7-9291-49df-8f37-b49c98a1bf17', '3bbb275b-47fc-458d-89c9-55e201977c0a', 'tes', 'number', NULL, '2', 'tes', '1', '2024-01-14 07:28:33', '2024-01-16 21:53:44', NULL),
('6da28fa2-9c89-41ea-9aca-a60df189e88c', '3bbb275b-47fc-458d-89c9-55e201977c0a', 'Tanggal Lahir', 'date', NULL, '4', 'tanggal_lahir', '1', '2024-01-10 21:24:15', '2024-01-14 07:29:03', NULL),
('6fc2a28d-c810-43a8-b83f-c8d56aaba5df', 'fb300d83-4235-4231-ac30-884d633596f1', 'alamat', 'textarea', NULL, '3', 'alamat', '1', '2024-01-17 08:44:16', '2024-01-17 08:44:16', NULL),
('6fefa40e-9685-499b-a748-4ba6d6048623', 'fb300d83-4235-4231-ac30-884d633596f1', 'nomor', 'number', NULL, '4', 'nomor', '1', '2024-01-17 08:44:33', '2024-01-17 08:44:33', NULL),
('9dbdd35f-9ff1-4212-9d87-b225fc13734b', '7f70da04-03b3-4d6c-9b6c-c251fa6f3d90', 'Nama Lengkap', 'text', NULL, '1', 'nama_lengkap', '1', '2024-01-10 21:29:14', '2024-01-10 21:29:14', NULL),
('a5e69dc0-d731-4644-b75c-04723999a7cd', 'fb300d83-4235-4231-ac30-884d633596f1', 'Nama Lengkap', 'text', NULL, '1', 'nama_lengkap', '1', '2024-01-16 22:32:02', '2024-01-17 08:43:53', NULL),
('aeb7b282-f00c-457a-9fbb-9202e5c34540', '3bbb275b-47fc-458d-89c9-55e201977c0a', 'Nama lengkap', 'text', NULL, '5', 'nama_lengkap', '1', '2024-01-10 21:22:45', '2024-01-14 07:28:33', NULL),
('bae1fedf-983b-4fd0-a119-4b358356fbef', '715a06ec-e0ef-4773-be91-ef8e9ad595bc', 'Agama', 'option', '[{\"value\":1,\"name\":\"Islam\"},{\"value\":2,\"name\":\"Kristen\"},{\"value\":3,\"name\":\"Budha\"}]', '2', 'Agama', '1', '2024-01-23 02:12:42', '2024-01-23 07:19:07', NULL),
('bf209365-1607-46dc-9b30-745a6ffe621e', '715a06ec-e0ef-4773-be91-ef8e9ad595bc', 'Nama', 'text', NULL, '1', 'NamaLengkap', '1', '2024-01-23 02:12:10', '2024-01-23 02:12:10', NULL),
('eb859c6f-94f8-4f5d-acb9-bc093c6bbca8', 'fb300d83-4235-4231-ac30-884d633596f1', 'jdkkfa', 'number', NULL, '1', 'tanggal', '1', '2024-01-16 22:50:12', '2024-01-16 23:05:49', '2024-01-16 23:05:49'),
('fab689f8-1558-445e-b6be-e059855b43d5', '715a06ec-e0ef-4773-be91-ef8e9ad595bc', 'Agama', 'option', '[{\"value\":1,\"name\":\"Kristen\"},{\"value\":2,\"name\":\"Islam\"}]', '2', 'Agama', '1', '2024-01-23 02:12:53', '2024-01-23 02:17:15', '2024-01-23 02:17:15'),
('fc2aab04-895d-4bc2-857c-425eb8632b5e', 'fb300d83-4235-4231-ac30-884d633596f1', 'tes', 'number', NULL, '1', 'tes', '1', '2024-01-14 07:54:16', '2024-01-16 23:10:10', '2024-01-16 23:10:10');

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
('7514a129-8f44-4283-b7d1-45565ef7aac2', '715a06ec-e0ef-4773-be91-ef8e9ad595bc', 'da513520-d128-4c4d-9f6f-cef98a0edb71', '1', 1, 1, '2024-01-23 02:17:54', '2024-01-23 02:17:54', NULL),
('7ff22212-c3c7-4c5d-af2f-17051d85c8d3', '715a06ec-e0ef-4773-be91-ef8e9ad595bc', '3f5beac3-08f0-44e0-8b22-0b62b89df6ef', '1', 2, 1, '2024-01-23 07:15:19', '2024-01-23 07:20:02', '2024-01-23 07:20:02'),
('b6c78f8c-4edf-45a2-8c2c-d9bb293a662c', '715a06ec-e0ef-4773-be91-ef8e9ad595bc', '666298a1-c5de-41c2-916c-9ec9455e0031', '1', 3, 1, '2024-01-23 07:15:29', '2024-01-23 07:20:09', '2024-01-23 07:20:09');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
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

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `role`, `remember_token`, `created_at`, `updated_at`, `deleted_at`) VALUES
('1', 'pegawai_desa1', 'pdesa1@gmail.com', NULL, '$2y$12$jz/rdznaEHDIS5dtTIBUPuOzDfpPqJkkJn/.7uFPZKba37QlN/rLS', 'p-desa', NULL, '2024-01-10 19:15:12', '2024-01-10 19:15:12', NULL),
('2', 'admin', 'admin@dukcapil.com', NULL, '$2y$12$jz/rdznaEHDIS5dtTIBUPuOzDfpPqJkkJn/.7uFPZKba37QlN/rLS', 'admin', NULL, '2024-01-10 20:32:47', '2024-01-16 00:41:34', '2024-01-16 00:41:34'),
('3', 'afif', 'afif@gmail.com', NULL, '$2y$12$WQ9kNOiuufeao.IgV6TNl.ZpgY.hILwzFgKiSjODQjBB0POQyvdo2', 'p-desa', NULL, '2024-01-14 23:31:35', '2024-01-14 23:31:35', NULL),
('4', 'afif1', 'afif1@gmail.com', NULL, '$2y$12$7l5WVl.p.8Rk2fhbpnHAiu8tgNQhhAJZV1B6ByLVWsMSz6HaHU3/C', 'p-desa', NULL, '2024-01-14 23:33:06', '2024-01-15 01:02:23', NULL),
('46defeca-2bbe-4221-8714-930f0cbeed92', 'robi', 'admin1@dukcapil.com', NULL, '$2y$12$jz/rdznaEHDIS5dtTIBUPuOzDfpPqJkkJn/.7uFPZKba37QlN/rLS', 'admin', NULL, '2024-01-17 07:37:30', '2024-01-17 07:37:30', NULL),
('5', 'robi', 'robi@gmail.com', NULL, '$2y$12$A.1IpF9TjKLwV0hqB8vnyOTWNmMQZUKgD36XOgdb2inzuXEG1Zq3K', 'p-desa', NULL, '2024-01-15 01:07:53', '2024-01-15 21:44:42', '2024-01-15 21:44:42'),
('6', 'r1', 'robi1@gmail.com', NULL, '$2y$12$o.FQSqhFRy1glW80PfBs1eUx4K5HTe04wFSYP4G7GBSqicCS3i1fC', 'admin', NULL, '2024-01-15 01:09:30', '2024-01-16 00:43:00', '2024-01-16 00:43:00'),
('6717bd58-8cff-47e9-b5cd-e454a455f566', 'admindukcapil', 'admindukcapil@admin.com', NULL, '$2y$12$1JR368bTZGz/Gt4m6rxm5.rVE/rvUTDSGWuIKponnS6h/Eel6S18C', 'admin', NULL, '2024-02-15 01:40:06', '2024-02-15 01:40:06', NULL),
('7', 'afiiff', 'afif2@gmail.com', NULL, '$2y$12$XlU7GBxspxXXhQI8BV42COZwuJRozMkDqoHRqVch.fi0LDh527GPW', 'admin', NULL, '2024-01-15 22:07:11', '2024-01-16 00:41:41', NULL);

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
