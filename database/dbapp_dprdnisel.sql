-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 22, 2022 at 05:27 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 7.4.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dbapp_dprdnisel`
--

-- --------------------------------------------------------

--
-- Table structure for table `agendas`
--

CREATE TABLE `agendas` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `namaagenda` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tglagenda` timestamp NULL DEFAULT NULL,
  `deskripsiagenda` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `kategoriagenda` enum('Agenda DPRD','Agenda Sekretariat') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `lokasi` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `iduser` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `akds`
--

CREATE TABLE `akds` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `akd` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slugakd` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `iconakd` blob DEFAULT NULL,
  `keteranganakd` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `iduser` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `akds`
--

INSERT INTO `akds` (`id`, `akd`, `slugakd`, `iconakd`, `keteranganakd`, `iduser`, `created_at`, `updated_at`) VALUES
(1, 'Pimpinan DPRD', 'pimpinan-dprd', 0x313636313135313739366b6f6d6973692e706e67, 'Pimpinan DPRD', 1, '2022-08-22 07:03:16', '2022-08-22 07:06:22'),
(2, 'Komisi 1', 'komisi-1', 0x313636313135313831386b6f6d6973692e706e67, 'Komisi 1', 1, '2022-08-22 07:03:38', '2022-08-22 07:03:38'),
(3, 'Komisi 2', 'komisi-2', 0x313636313135313833326b6f6d6973692e706e67, 'Komisi 2', 1, '2022-08-22 07:03:52', '2022-08-22 07:03:52'),
(4, 'Komisi 3', 'komisi-3', 0x313636313135313834376b6f6d6973692e706e67, 'Komisi 3', 1, '2022-08-22 07:04:07', '2022-08-22 07:04:07'),
(5, 'Badan Pembentukan Peraturan Daerah (BAPEMPERDA)', 'badan-pembentukan-peraturan-daerah-bapemperda', 0x31363631313532313133626164616e2d70656d62656e74756b616e2d70657264612e706e67, 'Badan Pembentukan Peraturan Daerah (BAPEMPERDA)', 1, '2022-08-22 07:08:33', '2022-08-22 07:08:33'),
(6, 'Badan Kehormatan', 'badan-kehormatan', 0x31363631313532313432626164616e2d6b65686f726d6174616e2e706e67, 'Badan Kehormatan', 1, '2022-08-22 07:09:02', '2022-08-22 07:09:02'),
(7, 'Badan Musyawarah (BAMUS)', 'badan-musyawarah-bamus', 0x31363631313532323631626164616e2d6d7573796177617261682e706e67, 'Badan Musyawarah (BAMUS)', 1, '2022-08-22 07:11:01', '2022-08-22 07:11:01'),
(8, 'Badan Anggaran (BANGGAR)', 'badan-anggaran-banggar', 0x31363631313532333034626164616e2d616e67676172616e2e706e67, 'Badan Anggaran (BANGGAR)', 1, '2022-08-22 07:11:44', '2022-08-22 07:11:44');

-- --------------------------------------------------------

--
-- Table structure for table `anggota_dewans`
--

CREATE TABLE `anggota_dewans` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `namadewan` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slugnama` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `jabatan` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pendidikan` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `periode` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tmptlahir` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tgllahir` date DEFAULT NULL,
  `idfraksi` bigint(20) UNSIGNED DEFAULT NULL,
  `jabatandifraksi` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `iddapil` bigint(20) UNSIGNED DEFAULT NULL,
  `idakd` bigint(20) UNSIGNED DEFAULT NULL,
  `jabatandiakd` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `fotodewan` blob DEFAULT NULL,
  `alamat` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `iduser` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `beritas`
--

CREATE TABLE `beritas` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `judulberita` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slug` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deskripsisingkat` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deskripsi` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `dilihat` bigint(20) DEFAULT NULL,
  `dibagikan` bigint(20) DEFAULT NULL,
  `gambarberita` blob DEFAULT NULL,
  `kategoriberita` enum('Berita Umum','Berita Sekretariat') COLLATE utf8mb4_unicode_ci NOT NULL,
  `iduser` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `beritas`
--

INSERT INTO `beritas` (`id`, `judulberita`, `slug`, `deskripsisingkat`, `deskripsi`, `dilihat`, `dibagikan`, `gambarberita`, `kategoriberita`, `iduser`, `created_at`, `updated_at`) VALUES
(1, 'selamat datang', 'selamat-datang', 'selamat datang', 'selamat datang', NULL, NULL, 0x313636313137343235336969732d7475722e6a706567, 'Berita Umum', 1, '2022-08-22 13:17:33', '2022-08-22 13:17:33');

-- --------------------------------------------------------

--
-- Table structure for table `dapils`
--

CREATE TABLE `dapils` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `dapil` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slugdapil` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `kecamatan` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `iduser` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `faqs`
--

CREATE TABLE `faqs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `pertanyaan` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `jawaban` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `iduser` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `formulir_kunjungans`
--

CREATE TABLE `formulir_kunjungans` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `instansi` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `provinsi` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `kabupaten` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `kategorikunjungan` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `kepada` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `akd` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `keterangankunjungan` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `jumlahrombongan` int(11) DEFAULT NULL,
  `tglkedatangan` date DEFAULT NULL,
  `jam` time DEFAULT NULL,
  `dokumenkunjungan` blob DEFAULT NULL,
  `koordinator` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `noponsel` varchar(12) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `statuskunjungan` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `fraksis`
--

CREATE TABLE `fraksis` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `fraksi` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slugfraksi` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `logofraksi` blob DEFAULT NULL,
  `iduser` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `galeris`
--

CREATE TABLE `galeris` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `judul` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deskripsigaleri` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `gambargaleri` blob DEFAULT NULL,
  `link` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `kategori` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `iduser` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `jdihs`
--

CREATE TABLE `jdihs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `juduljdih` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slugjdih` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deksripsijdih` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `dilihat` int(11) NOT NULL,
  `didownload` int(11) NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `filejdih` blob DEFAULT NULL,
  `iduser` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `kategoris`
--

CREATE TABLE `kategoris` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `kategori` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `iduser` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2022_03_12_182824_create_upt_models_table', 1),
(6, '2022_07_08_104516_create_kategoris_table', 1),
(7, '2022_07_08_135724_create_sejarahs_table', 1),
(8, '2022_07_08_155716_create_tugas_pokoks_table', 1),
(9, '2022_07_08_162719_create_anggota_dewans_table', 1),
(10, '2022_07_08_182709_create_fraksis_table', 1),
(11, '2022_07_08_182739_create_dapils_table', 1),
(12, '2022_07_09_101619_create_akds_table', 1),
(13, '2022_07_10_163010_create_tatatertips_table', 1),
(14, '2022_07_10_170424_create_beritas_table', 1),
(15, '2022_07_10_233045_create_agendas_table', 1),
(16, '2022_07_11_120521_create_visimisistrukturs_table', 1),
(17, '2022_07_11_153447_create_strukturals_table', 1),
(18, '2022_07_11_174910_create_galeris_table', 1),
(19, '2022_07_12_194348_create_transparansi_anggarans_table', 1),
(20, '2022_07_12_195339_create_transparansi_kinerjas_table', 1),
(21, '2022_07_12_195730_create_pengumumen_table', 1),
(22, '2022_07_12_200012_create_faqs_table', 1),
(23, '2022_07_12_200206_create_jdihs_table', 1),
(24, '2022_07_12_200714_create_formulir_kunjungans_table', 1),
(25, '2022_07_16_184338_create_ppids_table', 1),
(26, '2022_07_28_204207_create_pengunjung_table', 1),
(27, '2022_08_21_135233_create_mitra_kerjas_table', 1),
(28, '2022_08_21_141152_create_tatatertibs_table', 1),
(29, '2022_08_21_141358_create_keputusandprds_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pengumumen`
--

CREATE TABLE `pengumumen` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `judulpengumuman` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `kategoripengumuman` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slugkategoripengumuman` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `lampiranpengumuman` blob DEFAULT NULL,
  `iduser` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pengunjung`
--

CREATE TABLE `pengunjung` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `jlhpengunjung` bigint(20) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pengunjung`
--

INSERT INTO `pengunjung` (`id`, `jlhpengunjung`, `created_at`, `updated_at`) VALUES
(1, 1, '2022-08-22 07:05:46', '2022-08-22 07:05:46'),
(2, 1, '2022-08-22 08:33:35', '2022-08-22 08:33:35'),
(3, 1, '2022-08-22 08:33:55', '2022-08-22 08:33:55'),
(4, 1, '2022-08-22 08:34:21', '2022-08-22 08:34:21'),
(5, 1, '2022-08-22 08:34:36', '2022-08-22 08:34:36'),
(6, 1, '2022-08-22 08:34:52', '2022-08-22 08:34:52'),
(7, 1, '2022-08-22 08:34:56', '2022-08-22 08:34:56'),
(8, 1, '2022-08-22 08:41:53', '2022-08-22 08:41:53'),
(9, 1, '2022-08-22 08:43:15', '2022-08-22 08:43:15'),
(10, 1, '2022-08-22 08:48:37', '2022-08-22 08:48:37'),
(11, 1, '2022-08-22 11:10:19', '2022-08-22 11:10:19'),
(12, 1, '2022-08-22 11:18:46', '2022-08-22 11:18:46'),
(13, 1, '2022-08-22 11:19:25', '2022-08-22 11:19:25'),
(14, 1, '2022-08-22 11:19:33', '2022-08-22 11:19:33'),
(15, 1, '2022-08-22 11:19:41', '2022-08-22 11:19:41'),
(16, 1, '2022-08-22 11:31:22', '2022-08-22 11:31:22'),
(17, 1, '2022-08-22 11:34:04', '2022-08-22 11:34:04'),
(18, 1, '2022-08-22 11:53:15', '2022-08-22 11:53:15'),
(19, 1, '2022-08-22 11:53:29', '2022-08-22 11:53:29'),
(20, 1, '2022-08-22 11:53:46', '2022-08-22 11:53:46'),
(21, 1, '2022-08-22 11:57:34', '2022-08-22 11:57:34'),
(22, 1, '2022-08-22 12:02:01', '2022-08-22 12:02:01'),
(23, 1, '2022-08-22 12:03:37', '2022-08-22 12:03:37'),
(24, 1, '2022-08-22 12:16:55', '2022-08-22 12:16:55'),
(25, 1, '2022-08-22 12:40:46', '2022-08-22 12:40:46'),
(26, 1, '2022-08-22 12:52:03', '2022-08-22 12:52:03'),
(27, 1, '2022-08-22 12:54:16', '2022-08-22 12:54:16'),
(28, 1, '2022-08-22 13:03:31', '2022-08-22 13:03:31'),
(29, 1, '2022-08-22 13:04:49', '2022-08-22 13:04:49'),
(30, 1, '2022-08-22 13:05:10', '2022-08-22 13:05:10'),
(31, 1, '2022-08-22 13:05:16', '2022-08-22 13:05:16'),
(32, 1, '2022-08-22 13:05:24', '2022-08-22 13:05:24'),
(33, 1, '2022-08-22 13:05:37', '2022-08-22 13:05:37'),
(34, 1, '2022-08-22 13:08:26', '2022-08-22 13:08:26'),
(35, 1, '2022-08-22 13:10:01', '2022-08-22 13:10:01'),
(36, 1, '2022-08-22 13:17:40', '2022-08-22 13:17:40'),
(37, 1, '2022-08-22 15:04:04', '2022-08-22 15:04:04'),
(38, 1, '2022-08-22 15:04:39', '2022-08-22 15:04:39'),
(39, 1, '2022-08-22 15:10:53', '2022-08-22 15:10:53'),
(40, 1, '2022-08-22 15:24:06', '2022-08-22 15:24:06'),
(41, 1, '2022-08-22 15:25:10', '2022-08-22 15:25:10'),
(42, 1, '2022-08-22 15:25:35', '2022-08-22 15:25:35'),
(43, 1, '2022-08-22 15:26:47', '2022-08-22 15:26:47');

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `ppids`
--

CREATE TABLE `ppids` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `judulppid` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `keteranganppid` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `kategorippid` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slugkategorippid` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `fileppid` blob DEFAULT NULL,
  `iduser` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sejarahs`
--

CREATE TABLE `sejarahs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `sejarah` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `kategori` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `iduser` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `strukturals`
--

CREATE TABLE `strukturals` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nip` bigint(20) DEFAULT NULL,
  `namalengkap` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slugstruktural` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tempatlahir` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tanggallahir` date DEFAULT NULL,
  `pendidikan` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `alamat` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `jabatanstruktural` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `fotostruktural` blob DEFAULT NULL,
  `iduser` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tatatertips`
--

CREATE TABLE `tatatertips` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `fileperaturan` blob DEFAULT NULL,
  `kategori` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slugkategori` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `iduser` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `transparansi_anggarans`
--

CREATE TABLE `transparansi_anggarans` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `judulanggaran` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `kategorianggaran` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slug_kategorianggaran` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `dokumenanggaran` blob DEFAULT NULL,
  `iduser` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `transparansi_kinerjas`
--

CREATE TABLE `transparansi_kinerjas` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `judulkinerja` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `kategorikinerja` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slugkategorikinerja` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `dokumenkinerja` blob DEFAULT NULL,
  `iduser` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tugas_pokoks`
--

CREATE TABLE `tugas_pokoks` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tugaspokok` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `kategoritugas` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `iduser` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `upt_models`
--

CREATE TABLE `upt_models` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `upt` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fotoupt` blob NOT NULL,
  `keterangan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `iduser` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `is_admin` tinyint(1) DEFAULT NULL,
  `statuslogin` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `fotoprofil` blob DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `waktulogin` timestamp NULL DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `is_admin`, `statuslogin`, `fotoprofil`, `password`, `user`, `waktulogin`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Superadmin', 'superadmin@gmail.com', '2022-08-22 06:02:53', 1, 'Off', 0x3136363131383136323270726f66696c652d6d652e706e67, '$2y$10$FAkPHO3jrAcbFktDbGZeG.sdkBziJyD8bbwi53WkKp0QvmZuKEhVy', NULL, '2022-08-22 15:26:46', NULL, '2022-08-22 06:02:53', '2022-08-22 15:26:46'),
(3, 'Admin1', 'admin1@gmail.com', '2022-08-22 12:13:28', 2, 'Off', 0x3136363131383136333431363439303630303932696d616765732e6a7067, '$2y$10$J6uefKWPKrmo5gTfKrHPJOCqGZSQ1cZDNI.hpIeroVruhIX2/Jzjy', 'Admin', '2022-08-22 15:25:10', NULL, '2022-08-22 12:13:28', '2022-08-22 15:25:10'),
(4, 'admin2', 'admin2@gmail.com', '2022-08-22 12:15:17', 3, 'Off', NULL, '$2y$10$D/macHqLndoP5/SuW7U9juG7looGaV7aYH1VDC/0kSv5NrIQglY5u', 'Admin', '2022-08-22 13:05:23', NULL, '2022-08-22 12:15:17', '2022-08-22 13:05:23'),
(5, 'admin3', 'admin3@gmail.com', '2022-08-22 12:15:42', 4, 'Off', NULL, '$2y$10$zBv3Ms58FcNqPxwDSsuOzOabBgMWhKeDTmsdm71GM0NpYzcBtIxme', 'Admin', '2022-08-22 13:05:10', NULL, '2022-08-22 12:15:42', '2022-08-22 13:05:10'),
(6, 'CO Admin1', 'coadmin1@gmail.com', '2022-08-22 12:16:10', 5, 'Off', NULL, '$2y$10$d1mFZuRVLhXnwdG4U1uzKext78YsvnXbWT/CWpW1ohirSi4Q9WlNG', 'Admin', '2022-08-22 13:05:16', NULL, '2022-08-22 12:16:10', '2022-08-22 13:05:16');

-- --------------------------------------------------------

--
-- Table structure for table `visimisistrukturs`
--

CREATE TABLE `visimisistrukturs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `visimisi` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `struktur` blob DEFAULT NULL,
  `iduser` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `agendas`
--
ALTER TABLE `agendas`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `akds`
--
ALTER TABLE `akds`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `anggota_dewans`
--
ALTER TABLE `anggota_dewans`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `beritas`
--
ALTER TABLE `beritas`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `dapils`
--
ALTER TABLE `dapils`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `faqs`
--
ALTER TABLE `faqs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `formulir_kunjungans`
--
ALTER TABLE `formulir_kunjungans`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `fraksis`
--
ALTER TABLE `fraksis`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `galeris`
--
ALTER TABLE `galeris`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jdihs`
--
ALTER TABLE `jdihs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kategoris`
--
ALTER TABLE `kategoris`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `pengumumen`
--
ALTER TABLE `pengumumen`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pengunjung`
--
ALTER TABLE `pengunjung`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `ppids`
--
ALTER TABLE `ppids`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sejarahs`
--
ALTER TABLE `sejarahs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `strukturals`
--
ALTER TABLE `strukturals`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tatatertips`
--
ALTER TABLE `tatatertips`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `transparansi_anggarans`
--
ALTER TABLE `transparansi_anggarans`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `transparansi_kinerjas`
--
ALTER TABLE `transparansi_kinerjas`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tugas_pokoks`
--
ALTER TABLE `tugas_pokoks`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `upt_models`
--
ALTER TABLE `upt_models`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `visimisistrukturs`
--
ALTER TABLE `visimisistrukturs`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `agendas`
--
ALTER TABLE `agendas`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `akds`
--
ALTER TABLE `akds`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `anggota_dewans`
--
ALTER TABLE `anggota_dewans`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `beritas`
--
ALTER TABLE `beritas`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `dapils`
--
ALTER TABLE `dapils`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `faqs`
--
ALTER TABLE `faqs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `formulir_kunjungans`
--
ALTER TABLE `formulir_kunjungans`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `fraksis`
--
ALTER TABLE `fraksis`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `galeris`
--
ALTER TABLE `galeris`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `jdihs`
--
ALTER TABLE `jdihs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `kategoris`
--
ALTER TABLE `kategoris`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `pengumumen`
--
ALTER TABLE `pengumumen`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pengunjung`
--
ALTER TABLE `pengunjung`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `ppids`
--
ALTER TABLE `ppids`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sejarahs`
--
ALTER TABLE `sejarahs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `strukturals`
--
ALTER TABLE `strukturals`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tatatertips`
--
ALTER TABLE `tatatertips`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `transparansi_anggarans`
--
ALTER TABLE `transparansi_anggarans`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `transparansi_kinerjas`
--
ALTER TABLE `transparansi_kinerjas`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tugas_pokoks`
--
ALTER TABLE `tugas_pokoks`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `upt_models`
--
ALTER TABLE `upt_models`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `visimisistrukturs`
--
ALTER TABLE `visimisistrukturs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
