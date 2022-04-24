-- phpMyAdmin SQL Dump
-- version 4.9.7
-- https://www.phpmyadmin.net/
--
-- Anamakine: localhost:3306
-- Üretim Zamanı: 03 Nis 2022, 18:58:37
-- Sunucu sürümü: 10.3.34-MariaDB
-- PHP Sürümü: 7.4.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Veritabanı: `projetak_projetakipsistemi`
--

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `aciklama`
--

CREATE TABLE `aciklama` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `proje_id` bigint(20) UNSIGNED NOT NULL,
  `durum_id` bigint(20) UNSIGNED NOT NULL,
  `turu` enum('proje','rapor','tez') COLLATE utf8_turkish_ci NOT NULL,
  `aciklama` text COLLATE utf8_turkish_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `aciklama`
--

INSERT INTO `aciklama` (`id`, `proje_id`, `durum_id`, `turu`, `aciklama`, `created_at`, `updated_at`) VALUES
(1, 1, 8, 'rapor', 'Uygunsuz rapor', '2022-03-31 21:23:01', '2022-03-31 21:23:01'),
(2, 3, 8, 'proje', 'Eksik, uygunsuz ve güncel olmayan literatür bilgisi.', '2022-03-31 21:28:15', '2022-03-31 21:28:15'),
(3, 1, 10, 'rapor', 'Raporunda robotik kodlamayı ön plana çıkarman daha iyi olur.', '2022-03-31 21:44:17', '2022-03-31 21:44:17'),
(4, 6, 10, 'proje', 'Beğendim. İyi iş çıkartmışssın. Devamını görelim..', '2022-04-01 18:19:35', '2022-04-01 18:19:35'),
(5, 6, 8, 'rapor', 'İşini savsaklayarak yapma daha dikkatli ol !', '2022-04-01 18:23:43', '2022-04-01 18:23:43'),
(6, 6, 10, 'rapor', 'İşte böyle :)', '2022-04-01 18:26:32', '2022-04-01 18:26:32'),
(7, 6, 8, 'tez', 'Her defasında aynı şeyi yapmamalısın. Biliyorum daha iyisini yapabilirsin !', '2022-04-01 18:27:44', '2022-04-01 18:27:44'),
(8, 6, 10, 'tez', 'Bravo. Projeni çok başarılı buldum. Başarılarının devamını dilerim.', '2022-04-01 18:28:48', '2022-04-01 18:28:48'),
(9, 9, 8, 'proje', 'Beğenmedim.', '2022-04-01 19:29:56', '2022-04-01 19:29:56');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `anahtarkelime`
--

CREATE TABLE `anahtarkelime` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `kelime` varchar(255) COLLATE utf8_turkish_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `anahtarkelime`
--

INSERT INTO `anahtarkelime` (`id`, `kelime`, `created_at`, `updated_at`) VALUES
(1, 'Eğitim', NULL, NULL),
(2, 'öğretim', NULL, NULL),
(3, 'bilişim', NULL, NULL),
(4, 'teknoloji', NULL, NULL),
(5, 'robotik', NULL, NULL),
(6, 'suç', NULL, NULL),
(7, 'TCK', NULL, NULL),
(8, 'Veri', NULL, NULL),
(9, 'Bilişim Suçları', NULL, NULL),
(10, 'Kurumsal Kaynak Planlama', NULL, NULL),
(11, 'Bilişim Sistemleri', NULL, NULL),
(12, 'Bulut Bilişim', NULL, NULL),
(13, 'Proje Yönetimi', NULL, NULL),
(14, 'Değer Zinciri Analizi', NULL, NULL),
(15, 'Adli Bilişim', NULL, NULL),
(16, 'Bilişim Hukuku', NULL, NULL),
(17, 'TOD', NULL, NULL),
(18, 'Girişimcilik', NULL, NULL),
(19, 'araştırma', NULL, NULL),
(20, 'Tasarım', NULL, NULL),
(21, 'ev', NULL, NULL),
(22, 'akıllı', NULL, NULL),
(23, 'sistem', NULL, NULL),
(24, 'aı', NULL, NULL),
(25, 'ıot', NULL, NULL),
(26, 'Zararlı yazılım', NULL, NULL),
(27, 'Deney', NULL, NULL),
(28, 'API', NULL, NULL),
(29, 'Bert', NULL, NULL),
(30, 'FastTesxt', NULL, NULL),
(31, 'sanal', NULL, NULL),
(32, 'ıt', NULL, NULL),
(33, 'mateverse', NULL, NULL),
(34, 'meta', NULL, NULL),
(35, 'world', NULL, NULL),
(36, 'api', NULL, NULL),
(37, 'tarım', NULL, NULL);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `anahtarkelime_proje`
--

CREATE TABLE `anahtarkelime_proje` (
  `proje_id` bigint(20) UNSIGNED NOT NULL,
  `anahtarkelime_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `anahtarkelime_proje`
--

INSERT INTO `anahtarkelime_proje` (`proje_id`, `anahtarkelime_id`) VALUES
(1, 1),
(1, 2),
(1, 3),
(1, 4),
(1, 5),
(2, 3),
(2, 6),
(2, 7),
(2, 8),
(2, 9),
(3, 10),
(3, 11),
(3, 12),
(3, 13),
(3, 14),
(4, 15),
(4, 11),
(4, 16),
(4, 9),
(4, 6),
(5, 17),
(5, 3),
(5, 18),
(5, 19),
(5, 20),
(6, 21),
(6, 22),
(6, 23),
(6, 24),
(6, 25),
(7, 26),
(7, 27),
(7, 28),
(7, 29),
(7, 30),
(8, 31),
(8, 32),
(8, 33),
(8, 34),
(8, 35),
(9, 3),
(9, 36),
(9, 37),
(9, 21),
(9, 23);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `bildirim`
--

CREATE TABLE `bildirim` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tip` varchar(1) COLLATE utf8_turkish_ci NOT NULL,
  `kimden_id` varchar(30) COLLATE utf8_turkish_ci NOT NULL,
  `ogrenci_id` varchar(30) COLLATE utf8_turkish_ci NOT NULL,
  `proje_id` bigint(20) UNSIGNED NOT NULL,
  `durum_id` bigint(20) UNSIGNED NOT NULL,
  `mesaj` varchar(255) COLLATE utf8_turkish_ci NOT NULL,
  `goruldu` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `bildirim`
--

INSERT INTO `bildirim` (`id`, `tip`, `kimden_id`, `ogrenci_id`, `proje_id`, `durum_id`, `mesaj`, `goruldu`, `created_at`, `updated_at`) VALUES
(1, '2', '307001', '181307024', 1, 2, 'Projeniz öğretmeninize teslim edildi', 1, '2022-03-31 20:40:45', '2022-03-31 21:14:12'),
(2, '2', '307001', '181307024', 1, 3, 'Projenizi gördü.', 1, '2022-03-31 20:41:04', '2022-03-31 21:12:31'),
(3, '2', '307001', '181307024', 1, 10, 'Önerdiğin proje onaylandı.Şimdi rapor yükleme alanına git.', 1, '2022-03-31 20:41:29', '2022-03-31 21:12:21'),
(4, '2', '307001', '181307024', 1, 3, 'Raporunuzu gördü.', 1, '2022-03-31 20:45:21', '2022-03-31 21:12:15'),
(5, '2', '307001', '181307024', 2, 2, 'Projeniz öğretmeninize teslim edildi', 1, '2022-03-31 21:18:07', '2022-03-31 21:18:29'),
(6, '2', '307001', '181307024', 3, 2, 'Projeniz öğretmeninize teslim edildi', 1, '2022-03-31 21:18:07', '2022-03-31 21:18:33'),
(7, '2', '307001', '181307024', 3, 3, 'Projenizi gördü.', 1, '2022-03-31 21:18:58', '2022-03-31 21:19:55'),
(8, '2', '307001', '181307024', 2, 3, 'Projenizi gördü.', 1, '2022-03-31 21:19:06', '2022-03-31 21:19:53'),
(9, '2', '307001', '181307024', 1, 3, 'Raporunuzu gördü.', 1, '2022-03-31 21:19:19', '2022-03-31 21:19:48'),
(10, '2', '307001', '181307024', 1, 8, 'Gönderdiğin rapor reddedildi.', 1, '2022-03-31 21:23:01', '2022-03-31 21:42:45'),
(11, '2', '307001', '181307024', 2, 3, 'Projenizi gördü.', 1, '2022-03-31 21:23:42', '2022-03-31 21:42:43'),
(12, '2', '307001', '181307024', 2, 10, 'Önerdiğin proje onaylandı.Şimdi rapor yükleme alanına git.', 1, '2022-03-31 21:23:46', '2022-03-31 21:42:40'),
(13, '2', '307001', '181307024', 2, 2, 'Yüklediğiniz raporlar öğretmeninize teslim edildi', 1, '2022-03-31 21:24:57', '2022-03-31 21:42:47'),
(14, '2', '307001', '181307024', 3, 3, 'Projenizi gördü.', 1, '2022-03-31 21:27:53', '2022-03-31 21:42:49'),
(15, '2', '307001', '181307024', 3, 8, 'Önerdiğin proje reddedildi.', 1, '2022-03-31 21:28:15', '2022-03-31 21:42:51'),
(16, '2', '307001', '181307024', 1, 2, 'Yüklediğiniz raporlar öğretmeninize teslim edildi', 1, '2022-03-31 21:31:36', '2022-03-31 21:42:53'),
(17, '2', '307001', '181307024', 1, 10, 'Gönderdiğin rapor onaylandı, şimdi tez yükleme alanına git.', 1, '2022-03-31 21:44:17', '2022-03-31 21:44:28'),
(18, '2', '307001', '181307024', 1, 2, 'Yüklediğiniz tez öğretmeninize teslim edildi', 1, '2022-03-31 21:59:20', '2022-04-01 20:12:29'),
(19, '2', '307001', '181307024', 1, 3, 'Tezinizi gördü.', 1, '2022-03-31 21:59:28', '2022-04-01 20:12:27'),
(20, '2', '307001', '181307024', 1, 3, 'Tezinizi gördü.', 1, '2022-03-31 22:02:33', '2022-03-31 22:03:18'),
(21, '2', '307001', '181307024', 1, 7, 'Gönderdiğin tez onaylandı . Tebrikler projeniz onaylandı.', 1, '2022-03-31 22:03:30', '2022-03-31 22:04:13'),
(22, '2', '307001', '181307006', 4, 2, 'Projeniz öğretmeninize teslim edildi', 0, '2022-03-31 23:12:22', '2022-03-31 23:12:22'),
(23, '2', '307001', '181307024', 5, 2, 'Projeniz öğretmeninize teslim edildi', 1, '2022-03-31 23:12:22', '2022-04-01 20:12:24'),
(24, '2', '307001', '181307024', 5, 3, 'Projenizi gördü.', 1, '2022-03-31 23:12:37', '2022-04-01 20:12:22'),
(25, '2', '307001', '181307024', 5, 10, 'Önerdiğin proje onaylandı.Şimdi rapor yükleme alanına git.', 1, '2022-03-31 23:12:46', '2022-04-01 20:12:20'),
(26, '2', '307002', '181307049', 6, 2, 'Projeniz öğretmeninize teslim edildi', 0, '2022-04-01 18:18:08', '2022-04-01 18:18:08'),
(27, '2', '307002', '181307049', 6, 3, 'Projenizi gördü.', 0, '2022-04-01 18:18:31', '2022-04-01 18:18:31'),
(28, '2', '307002', '181307049', 6, 3, 'Projenizi gördü.', 0, '2022-04-01 18:19:14', '2022-04-01 18:19:14'),
(29, '2', '307002', '181307049', 6, 10, 'Önerdiğin proje onaylandı.Şimdi rapor yükleme alanına git.', 1, '2022-04-01 18:19:35', '2022-04-01 18:19:50'),
(30, '2', '307002', '181307049', 6, 2, 'Yüklediğiniz raporlar öğretmeninize teslim edildi', 0, '2022-04-01 18:22:14', '2022-04-01 18:22:14'),
(31, '2', '307002', '181307049', 6, 3, 'Raporunuzu gördü.', 0, '2022-04-01 18:22:41', '2022-04-01 18:22:41'),
(32, '2', '307002', '181307049', 6, 3, 'Raporunuzu gördü.', 0, '2022-04-01 18:22:42', '2022-04-01 18:22:42'),
(33, '2', '307002', '181307049', 6, 3, 'Raporunuzu gördü.', 0, '2022-04-01 18:23:18', '2022-04-01 18:23:18'),
(34, '2', '307002', '181307049', 6, 8, 'Gönderdiğin rapor reddedildi.', 0, '2022-04-01 18:23:43', '2022-04-01 18:23:43'),
(35, '2', '307002', '181307049', 6, 3, 'Raporunuzu gördü.', 0, '2022-04-01 18:25:53', '2022-04-01 18:25:53'),
(36, '2', '307002', '181307049', 6, 3, 'Raporunuzu gördü.', 1, '2022-04-01 18:25:54', '2022-04-01 18:26:46'),
(37, '2', '307002', '181307049', 6, 10, 'Gönderdiğin rapor onaylandı, şimdi tez yükleme alanına git.', 0, '2022-04-01 18:26:32', '2022-04-01 18:26:32'),
(38, '2', '307002', '181307049', 6, 3, 'Tezinizi gördü.', 0, '2022-04-01 18:27:10', '2022-04-01 18:27:10'),
(39, '2', '307002', '181307049', 6, 8, 'Gönderdiğin tez reddedildi.', 0, '2022-04-01 18:27:44', '2022-04-01 18:27:44'),
(40, '2', '307002', '181307049', 6, 3, 'Tezinizi gördü.', 0, '2022-04-01 18:28:15', '2022-04-01 18:28:15'),
(41, '2', '307002', '181307049', 6, 7, 'Gönderdiğin tez onaylandı . Tebrikler projeniz onaylandı.', 1, '2022-04-01 18:28:48', '2022-04-01 19:16:18'),
(42, '2', '307002', '181307049', 8, 2, 'Projeniz öğretmeninize teslim edildi', 0, '2022-04-01 19:08:29', '2022-04-01 19:08:29'),
(43, '2', '307002', '181307049', 8, 3, 'Projenizi gördü.', 0, '2022-04-01 19:20:13', '2022-04-01 19:20:13'),
(44, '2', '307002', '181307049', 8, 3, 'Projenizi gördü.', 0, '2022-04-01 19:21:32', '2022-04-01 19:21:32'),
(45, '2', '307002', '181307049', 8, 10, 'Önerdiğin proje onaylandı.Şimdi rapor yükleme alanına git.', 0, '2022-04-01 19:21:35', '2022-04-01 19:21:35'),
(46, '2', '307001', '181307024', 7, 2, 'Projeniz öğretmeninize teslim edildi', 1, '2022-04-01 19:21:55', '2022-04-01 20:12:18'),
(47, '2', '307001', '181307024', 7, 3, 'Projenizi gördü.', 1, '2022-04-01 19:22:38', '2022-04-01 20:12:16'),
(48, '2', '307002', '181307049', 8, 2, 'Yüklediğiniz raporlar öğretmeninize teslim edildi', 0, '2022-04-01 19:22:51', '2022-04-01 19:22:51'),
(49, '2', '307002', '181307049', 8, 10, 'Gönderdiğin rapor onaylandı, şimdi tez yükleme alanına git.', 0, '2022-04-01 19:22:54', '2022-04-01 19:22:54'),
(50, '2', '307002', '181307049', 8, 7, 'Gönderdiğin tez onaylandı . Tebrikler projeniz onaylandı.', 0, '2022-04-01 19:23:40', '2022-04-01 19:23:40'),
(51, '2', '307002', '181307049', 8, 7, 'Gönderdiğin tez onaylandı . Tebrikler projeniz onaylandı.', 0, '2022-04-01 19:23:48', '2022-04-01 19:23:48'),
(52, '2', '307001', '181307024', 7, 3, 'Projenizi gördü.', 1, '2022-04-01 19:26:44', '2022-04-01 20:11:59'),
(53, '2', '307002', '181307049', 9, 2, 'Projeniz öğretmeninize teslim edildi', 0, '2022-04-01 19:29:10', '2022-04-01 19:29:10'),
(54, '2', '307002', '181307049', 9, 3, 'Projenizi gördü.', 0, '2022-04-01 19:29:33', '2022-04-01 19:29:33'),
(55, '2', '307002', '181307049', 9, 8, 'Önerdiğin proje reddedildi.', 0, '2022-04-01 19:29:56', '2022-04-01 19:29:56'),
(56, '2', '307001', '181307006', 4, 3, 'Projenizi gördü.', 0, '2022-04-01 20:09:05', '2022-04-01 20:09:05'),
(57, '2', '307001', '181307006', 4, 10, 'Önerdiğin proje onaylandı.Şimdi rapor yükleme alanına git.', 0, '2022-04-01 20:09:17', '2022-04-01 20:09:17');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `bolum`
--

CREATE TABLE `bolum` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `adi` varchar(100) COLLATE utf8_turkish_ci NOT NULL,
  `fakulte_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `bolum`
--

INSERT INTO `bolum` (`id`, `adi`, `fakulte_id`, `created_at`, `updated_at`) VALUES
(1, 'Bilişim Sistemleri Mühendisliği', 1, '2022-03-31 17:39:37', '2022-03-31 17:39:37'),
(2, 'Enerji Sistemleri Mühendisliği', 1, '2022-03-31 17:40:03', '2022-03-31 17:40:03'),
(3, 'Bilgisayar Mühendisliği', 2, '2022-03-31 17:40:23', '2022-03-31 17:40:23'),
(4, 'Jeoloji Mühendisliği', 2, '2022-03-31 17:40:52', '2022-03-31 17:40:52'),
(5, 'Plastik Cerrahi', 3, '2022-04-01 20:07:31', '2022-04-01 20:07:31');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `danisman`
--

CREATE TABLE `danisman` (
  `id` varchar(30) COLLATE utf8_turkish_ci NOT NULL,
  `adi` varchar(100) COLLATE utf8_turkish_ci NOT NULL,
  `soyadi` varchar(100) COLLATE utf8_turkish_ci NOT NULL,
  `unvan` varchar(100) COLLATE utf8_turkish_ci NOT NULL,
  `bolum_id` bigint(20) UNSIGNED NOT NULL,
  `img` varchar(255) COLLATE utf8_turkish_ci NOT NULL DEFAULT '/image?img=profile/default.jpg',
  `tel` varchar(13) COLLATE utf8_turkish_ci NOT NULL,
  `eposta` varchar(255) COLLATE utf8_turkish_ci NOT NULL,
  `sifre` varchar(255) COLLATE utf8_turkish_ci NOT NULL DEFAULT '71566d43bd45fd932fe256fee2f2ea78',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `danisman`
--

INSERT INTO `danisman` (`id`, `adi`, `soyadi`, `unvan`, `bolum_id`, `img`, `tel`, `eposta`, `sifre`, `created_at`, `updated_at`) VALUES
('307001', 'Önder', 'Yakut', 'Dr. Öğr. Üyesi', 1, '/image?img=profile/2/307001.png', '902623032298', 'onder.yakut@kocaeli.com', '71566d43bd45fd932fe256fee2f2ea78', '2022-03-31 17:55:27', '2022-03-31 20:58:56'),
('307002', 'Adnan', 'Sondaş', 'Dr. Öğr. Üyesi', 1, '/image?img=profile/2/307002.png', '1234567890', 'asondas@kocaeli.com', '71566d43bd45fd932fe256fee2f2ea78', '2022-03-31 18:24:59', '2022-03-31 21:00:13'),
('307003', 'Seda', 'Balta Kaç', 'Arş. Gör.', 1, '/image?img=profile/2/307003.png', '1234567890', 'seda.balta@kocaeli.com', '71566d43bd45fd932fe256fee2f2ea78', '2022-03-31 18:26:04', '2022-03-31 21:00:54'),
('307004', 'Zeynep', 'Sarı', 'Arş. Gör.', 1, '/image?img=profile/2/307004.png', '1234567890', 'zeynep.sari@kocaeli.com', '71566d43bd45fd932fe256fee2f2ea78', '2022-03-31 18:27:31', '2022-03-31 21:01:43'),
('307005', 'Abdulhakim', 'Karakaya', 'Dr. Öğr.', 2, '/image?img=profile/default.jpg', '1234567890', 'akarakaya@kocaeli.com', '71566d43bd45fd932fe256fee2f2ea78', '2022-03-31 18:30:17', '2022-03-31 18:30:17'),
('307006', 'Engin', 'Özdemir', 'Prof. Dr.', 2, '/image?img=profile/default.jpg', '1234567891', 'eozdemir@kocaeli.com', '71566d43bd45fd932fe256fee2f2ea78', '2022-03-31 18:31:26', '2022-04-01 20:06:42'),
('308001', 'Pınar', 'Onay Durdu', 'Doç. Dr.', 3, '/image?img=profile/default.jpg', '1234567890', 'pinar.onaydurdu@kocaeli.com', '71566d43bd45fd932fe256fee2f2ea78', '2022-03-31 18:36:08', '2022-03-31 18:36:08'),
('308002', 'Alev', 'Mutlu', 'Dr. Ögr.', 3, '/image?img=profile/default.jpg', '1234567890', 'alev.mutlu@kocaeli.com', '71566d43bd45fd932fe256fee2f2ea78', '2022-03-31 18:37:02', '2022-03-31 18:37:02'),
('309001', 'Ömer', 'Faruk Çelik', 'Prof. Dr.', 4, '/image?img=profile/default.jpg', '1234567890', 'fcelik@kocaeli.com', '71566d43bd45fd932fe256fee2f2ea78', '2022-03-31 18:39:10', '2022-03-31 18:39:10'),
('309002', 'Özge Can', 'Gündüz', 'Arş. Gör. Dr.', 4, '/image?img=profile/default.jpg', '1234567890', 'ozgecan@kocaeli.com', '71566d43bd45fd932fe256fee2f2ea78', '2022-03-31 18:40:35', '2022-03-31 18:40:35');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `donem`
--

CREATE TABLE `donem` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `adi` varchar(255) COLLATE utf8_turkish_ci NOT NULL,
  `aktif` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `donem`
--

INSERT INTO `donem` (`id`, `adi`, `aktif`, `created_at`, `updated_at`) VALUES
(1, '2021/2022 Bahar Dönemi', 1, '2022-03-31 17:59:18', '2022-04-01 20:07:48'),
(2, '2022/2023 Güz Dönemi', 0, '2022-03-31 17:59:44', '2022-04-01 20:07:48');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `durum`
--

CREATE TABLE `durum` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `adi` varchar(255) COLLATE utf8_turkish_ci NOT NULL,
  `stil` varchar(50) COLLATE utf8_turkish_ci NOT NULL,
  `ikon` varchar(50) COLLATE utf8_turkish_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `durum`
--

INSERT INTO `durum` (`id`, `adi`, `stil`, `ikon`, `created_at`, `updated_at`) VALUES
(1, 'Gönderildi', 'bg-cyan', 'fa fa-check', NULL, NULL),
(2, 'Teslim edildi', 'bg-dark', 'fa fa-paper-plane-o', NULL, NULL),
(3, 'Görüldü', 'bg-info', 'fa fa-paper-plane', NULL, NULL),
(4, 'Onay bekleniyor', 'bg-primary', 'fa fa-check', NULL, NULL),
(5, 'Rapor bekleniyor', 'bg-warning', 'fa fa-hourglass-half', NULL, NULL),
(6, 'Tez bekleniyor', 'bg-azure', 'fa fa-hourglass-end', NULL, NULL),
(7, 'Proje onaylandı', 'bg-success', 'fa fa-thumbs-o-up', NULL, NULL),
(8, 'Reddedildi', 'bg-danger', 'fa fa-thumbs-o-down', NULL, NULL),
(9, 'Devam eden proje', 'bg-secondary-gradient', 'fa fa-commenting-o', NULL, NULL),
(10, 'Onaylandı', 'bg-green', 'fa fa-handshake-o', NULL, NULL);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `fakulte`
--

CREATE TABLE `fakulte` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `adi` varchar(100) COLLATE utf8_turkish_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `fakulte`
--

INSERT INTO `fakulte` (`id`, `adi`, `created_at`, `updated_at`) VALUES
(1, 'Teknoloji Fakültesi', '2022-03-31 17:39:00', '2022-03-31 17:39:00'),
(2, 'Mühendislik Fakültesi', '2022-03-31 17:39:16', '2022-03-31 17:39:16'),
(3, 'Tıp Fakültesi', '2022-04-01 20:07:17', '2022-04-01 20:07:17');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8_turkish_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2022_03_13_000001_fakulte', 1),
(2, '2022_03_13_000002_bolum', 1),
(3, '2022_03_13_000003_danisman', 1),
(4, '2022_03_13_000004_ogrenci', 1),
(5, '2022_03_13_000005_yonetici', 1),
(6, '2022_03_13_000008_donem', 1),
(7, '2022_03_13_000009_durum', 1),
(8, '2022_03_13_000010_proje', 1),
(9, '2022_03_13_000011_anahtarkelime', 1),
(10, '2022_03_13_000012_akp', 1),
(11, '2022_03_13_000013_rapor', 1),
(12, '2022_03_13_000014_tez', 1),
(13, '2022_03_13_000015_sifremiunuttum', 1),
(14, '2022_03_13_000066_aciklama', 1),
(15, '2022_03_13_000077_bildirim', 1);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `ogrenci`
--

CREATE TABLE `ogrenci` (
  `id` varchar(30) COLLATE utf8_turkish_ci NOT NULL,
  `adi` varchar(100) COLLATE utf8_turkish_ci NOT NULL,
  `soyadi` varchar(100) COLLATE utf8_turkish_ci NOT NULL,
  `bolum_id` bigint(20) UNSIGNED NOT NULL,
  `sinif` enum('Hazırlık','1.Sınıf','2.Sınıf','3.Sınıf','4.Sınıf') COLLATE utf8_turkish_ci NOT NULL,
  `img` varchar(255) COLLATE utf8_turkish_ci NOT NULL DEFAULT '/image?img=profile/default.jpg',
  `tel` varchar(13) COLLATE utf8_turkish_ci NOT NULL,
  `danisman_id` varchar(30) COLLATE utf8_turkish_ci NOT NULL,
  `eposta` varchar(255) COLLATE utf8_turkish_ci NOT NULL,
  `sifre` varchar(255) COLLATE utf8_turkish_ci NOT NULL DEFAULT '71566d43bd45fd932fe256fee2f2ea78',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `ogrenci`
--

INSERT INTO `ogrenci` (`id`, `adi`, `soyadi`, `bolum_id`, `sinif`, `img`, `tel`, `danisman_id`, `eposta`, `sifre`, `created_at`, `updated_at`) VALUES
('181307006', 'Turan', 'Öz', 1, '3.Sınıf', '/image?img=profile/3/181307006.jpg', '1234567890', '307001', '181307006@kocaeli.edu.tr', 'e10adc3949ba59abbe56e057f20f883e', '2022-03-31 18:57:36', '2022-04-01 13:21:46'),
('181307024', 'Ramazan', 'Kaplaner', 1, '4.Sınıf', '/image?img=profile/3/181307024.jpg', '05398511724', '307001', '181307024@kocaeli.edu.tr', 'e10adc3949ba59abbe56e057f20f883e', '2022-03-31 19:00:29', '2022-04-01 20:28:38'),
('181307026', 'Yasin', 'Şahin', 1, '3.Sınıf', '/image?img=profile/default.jpg', '1234567890', '307001', '181307026@kocaeli.com', '71566d43bd45fd932fe256fee2f2ea78', '2022-03-31 18:12:22', '2022-03-31 18:12:22'),
('181307036', 'Serhat', 'Kaçmaz', 1, '3.Sınıf', '/image?img=profile/default.jpg', '1234567890', '307001', '181307036@kocaeli.com', '71566d43bd45fd932fe256fee2f2ea78', '2022-03-31 18:44:37', '2022-03-31 18:44:37'),
('181307044', 'Merve', 'Tekin', 1, '3.Sınıf', '/image?img=profile/default.jpg', '1234567890', '307001', '181307044@kocaeli.com', '71566d43bd45fd932fe256fee2f2ea78', '2022-03-31 18:43:46', '2022-03-31 18:43:46'),
('181307049', 'Kemal', 'Balı', 1, '3.Sınıf', '/image?img=profile/3/181307049.jpg', '05391238567', '307002', '181307049@kocaeli.edu.tr', 'e10adc3949ba59abbe56e057f20f883e', '2022-03-31 19:08:37', '2022-04-01 19:19:51'),
('181307059', 'Barış', 'Adıgüzel', 1, '3.Sınıf', '/image?img=profile/default.jpg', '1234567890', '307001', '181307059@kocaeli.com', '71566d43bd45fd932fe256fee2f2ea78', '2022-03-31 18:52:06', '2022-03-31 18:52:31'),
('181307066', 'Engin', 'Beyazgül', 1, '3.Sınıf', '/image?img=profile/default.jpg', '1234567890', '307001', '181307066@kocaeli.com', '71566d43bd45fd932fe256fee2f2ea78', '2022-03-31 18:53:52', '2022-03-31 18:53:52'),
('181307072', 'Emre', 'Erken', 1, '3.Sınıf', '/image?img=profile/default.jpg', '1234567890', '307002', '181307072@kocaeli.com', '71566d43bd45fd932fe256fee2f2ea78', '2022-03-31 19:09:36', '2022-03-31 19:09:36'),
('181307074', 'Sana', 'Kabbanı', 1, '3.Sınıf', '/image?img=profile/default.jpg', '1234567890', '307001', '181307074@kocaeli.com', '71566d43bd45fd932fe256fee2f2ea78', '2022-03-31 18:46:07', '2022-03-31 18:48:03'),
('181308005', 'İbrahim Tahir', 'Taştekin', 2, '3.Sınıf', '/image?img=profile/default.jpg', '1234567890', '307006', '181308005@kocaeli.com', '71566d43bd45fd932fe256fee2f2ea78', '2022-03-31 19:17:09', '2022-03-31 19:17:09'),
('181308024', 'Ali', 'Pekin', 2, '4.Sınıf', '/image?img=profile/default.jpg', '1234567890', '307005', '181308024@kocaeli.com', '71566d43bd45fd932fe256fee2f2ea78', '2022-03-31 19:18:27', '2022-03-31 19:18:27'),
('191307006', 'Aylinnur', 'Güldür', 1, '3.Sınıf', '/image?img=profile/default.jpg', '1234567890', '307001', '191307006@kocaeli.com', '71566d43bd45fd932fe256fee2f2ea78', '2022-03-31 18:49:28', '2022-03-31 18:49:39'),
('191307008', 'Yakup Yasin', 'Akdin', 1, '3.Sınıf', '/image?img=profile/default.jpg', '1234567890', '307001', '191307008@kocaeli.com', '71566d43bd45fd932fe256fee2f2ea78', '2022-03-31 18:55:44', '2022-03-31 18:55:58'),
('191307021', 'Arzu', 'Kaya', 3, '1.Sınıf', '/image?img=profile/default.jpg', '1234567890', '308001', '191307021@kocaeli.com', '71566d43bd45fd932fe256fee2f2ea78', '2022-03-31 19:11:03', '2022-03-31 19:11:03'),
('191307022', 'Melisa', 'Ceylan', 3, '1.Sınıf', '/image?img=profile/default.jpg', '1234567890', '308002', '191307022@kocaeli.com', '71566d43bd45fd932fe256fee2f2ea78', '2022-03-31 19:11:37', '2022-03-31 19:11:37'),
('191307035', 'Murat', 'Ergül', 4, '1.Sınıf', '/image?img=profile/default.jpg', '1234567890', '309001', '191307035@kocaeli.com', '71566d43bd45fd932fe256fee2f2ea78', '2022-03-31 19:13:26', '2022-03-31 19:13:26'),
('191307052', 'Duygu', 'Şarkucu', 1, '3.Sınıf', '/image?img=profile/default.jpg', '1234567890', '307003', '191307052@kocaeli.com', '71566d43bd45fd932fe256fee2f2ea78', '2022-03-31 19:04:24', '2022-03-31 19:04:24'),
('191307059', 'Binnur', 'Özcan', 4, '4.Sınıf', '/image?img=profile/default.jpg', '1234567890', '309002', '191307059@kocaeli.com', '71566d43bd45fd932fe256fee2f2ea78', '2022-03-31 19:15:00', '2022-03-31 19:15:00'),
('201307076', 'Gizem', 'Çoşkun', 1, '1.Sınıf', '/image?img=profile/default.jpg', '1234567890', '307004', '201307076@kocaeli.com', '71566d43bd45fd932fe256fee2f2ea78', '2022-03-31 19:06:02', '2022-03-31 19:06:02');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `proje`
--

CREATE TABLE `proje` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `ogrenci_id` varchar(30) COLLATE utf8_turkish_ci NOT NULL,
  `danisman_id` varchar(30) COLLATE utf8_turkish_ci NOT NULL,
  `donem_id` bigint(20) UNSIGNED NOT NULL,
  `adi` text COLLATE utf8_turkish_ci NOT NULL,
  `amac` text COLLATE utf8_turkish_ci NOT NULL,
  `materyal` text COLLATE utf8_turkish_ci NOT NULL,
  `durum_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `proje`
--

INSERT INTO `proje` (`id`, `ogrenci_id`, `danisman_id`, `donem_id`, `adi`, `amac`, `materyal`, `durum_id`, `created_at`, `updated_at`) VALUES
(1, '181307024', '307001', 1, 'Bilişim teknolojileri öğretmenleri bakış açısıyla robotik ve kodlamanın bilişim teknolojileri ve yazılım dersine entegrasyonunun niteliklerinin belirlenmesi', 'Günümüzde teknolojinin gelişmesi ile Bilişim Teknolojileri ve Yazılım dersinin de önemi artmaktadır. 21. yüzyılın gerektirdiği beceriler doğrultusunda yeni nesillerin teknolojik becerilerle donatılması gerekmektedir. Bu becerilerden birisi de robotik kodlamadır. Bu alan ile ilgili konular Bilişim Teknolojileri ve Yazılım dersi kapsamında anlatılsa da öğretim programında yer almamaktadır. Bu nedenle öğretmenlerin insiyatifinde anlatılabilir. Bu tezin amacı, Milli Eğitime bağlı okullarda görev yapmakta olan Bilişim Teknolojileri öğretmenlerinin görüşleri doğrultusunda robotik ve kodlama konularının öğretim programına entegrasyonuna yönelik niteliklerin belirlenmesi ve bir öğrenme öğretme çerçevesi oluşturmaktır. Çalışmanın amacı doğrultusunda araştırmada Delphi yöntemi kullanılmıştır. Delphi yönteminin amacı uzman görüşleri doğrultusunda belirli bir konu üzerinde uzmanlar arasında uzlaşma sağlanmasıdır. Araştırmada kullanılan Delphi yöntemi 2 aşamada gerçekleştirilmiştir. Delphi çalışmasının birinci aşamasında robotik kodlama konusunda uzman 9 Bilişim Teknolojileri öğretmeni ile robotik kodlama öğretiminde yer alması gereken kazanımlar, robotik kodlama derslerinde kullanılabilecek donanım ve yazılım araçları, öğretim yaklaşımları, ölçme ve değerlendirme yaklaşımları öğrenme ortamı nitelikleri ve robotik kodlama entegrasyonunun boyutları ile ilgili yarı yapılandırılmış bir görüşme formu çerçevesinde görüşmeler yapılmıştır. Uzmanlardan gelen cevaplar içerik analizi ile analiz edilmiş ve 8 tema belirlenmiştir. Bu temalar altında toplam 111 kod ortaya çıkarılmıştır. İkinci Delphi aşamasında bu kodlar ile 7\'li likert tipi bir anket hazırlanmıştır. Araştırmanın ikinci aşamasında uzmanların belirledikleri kodlar ile oluşturulan anket uzmanlarla birlikte 46 Bilişim Teknolojileri öğretmenine ulaştırılmıştır. Uzmanlardan anketin her bir maddesini 1-7 arasında değerlendirmeleri istenmiştir. Elde edilen sonuçlar doğrultusunda her bir maddenin ortalama, medyan ve çeyrekler arası açıklık değerleri hesaplanmıştır. Yapılan istatiksel analizler sonucunda medyanı 7,00 altında olan maddeler elenmiştir.', 'Günümüzde teknolojinin gelişmesi ile Bilişim Teknolojileri ve Yazılım dersinin de önemi artmaktadır. 21. yüzyılın gerektirdiği beceriler doğrultusunda yeni nesillerin teknolojik becerilerle donatılması gerekmektedir. Bu becerilerden birisi de robotik kodlamadır. Bu alan ile ilgili konular Bilişim Teknolojileri ve Yazılım dersi kapsamında anlatılsa da öğretim programında yer almamaktadır. Bu nedenle öğretmenlerin insiyatifinde anlatılabilir. Bu tezin amacı, Milli Eğitime bağlı okullarda görev yapmakta olan Bilişim Teknolojileri öğretmenlerinin görüşleri doğrultusunda robotik ve kodlama konularının öğretim programına entegrasyonuna yönelik niteliklerin belirlenmesi ve bir öğrenme öğretme çerçevesi oluşturmaktır. Çalışmanın amacı doğrultusunda araştırmada Delphi yöntemi kullanılmıştır. Delphi yönteminin amacı uzman görüşleri doğrultusunda belirli bir konu üzerinde uzmanlar arasında uzlaşma sağlanmasıdır. Araştırmada kullanılan Delphi yöntemi 2 aşamada gerçekleştirilmiştir. Delphi çalışmasının birinci aşamasında robotik kodlama konusunda uzman 9 Bilişim Teknolojileri öğretmeni ile robotik kodlama öğretiminde yer alması gereken kazanımlar, robotik kodlama derslerinde kullanılabilecek donanım ve yazılım araçları, öğretim yaklaşımları, ölçme ve değerlendirme yaklaşımları öğrenme ortamı nitelikleri ve robotik kodlama entegrasyonunun boyutları ile ilgili yarı yapılandırılmış bir görüşme formu çerçevesinde görüşmeler yapılmıştır. Uzmanlardan gelen cevaplar içerik analizi ile analiz edilmiş ve 8 tema belirlenmiştir. Bu temalar altında toplam 111 kod ortaya çıkarılmıştır. İkinci Delphi aşamasında bu kodlar ile 7\'li likert tipi bir anket hazırlanmıştır. Araştırmanın ikinci aşamasında uzmanların belirledikleri kodlar ile oluşturulan anket uzmanlarla birlikte 46 Bilişim Teknolojileri öğretmenine ulaştırılmıştır. Uzmanlardan anketin her bir maddesini 1-7 arasında değerlendirmeleri istenmiştir. Elde edilen sonuçlar doğrultusunda her bir maddenin ortalama, medyan ve çeyrekler arası açıklık değerleri hesaplanmıştır. Yapılan istatiksel analizler sonucunda medyanı 7,00 altında olan maddeler elenmiştir. Medyanı 7,00 olan maddeler tekrar incelenerek çeyrekler arası açıklık değerleri 1,00\'in üzerinde olan maddeler de elenmiştir. Kalan maddeler robotik kodlama öğrenme öğretme çerçevesine dahil edilmiştir. Araştırma sonucu elde edilen robotik kodlama öğrenme öğretme çerçevesi toplamda 8 bölüm ve 83 maddeden oluşmaktadır.', 7, '2022-03-31 20:40:38', '2022-03-31 22:03:30'),
(2, '181307024', '307001', 1, 'Bilişim sistemine ve sistemdeki verilere müdahale ile bilişim sistemi aracılığıyla haksız çıkar sağlama suçları', 'Bilişim alanındaki gelişmelerin hukuk alanında da büyük bir etkisi bulunmaktadır. Günlük hayatta sıklıkla karşılaşılan suç tiplerinin bilişim ortamında kolaylıkla işlenebilmesi nedeniyle bazı fiiller suç olarak düzenlenmiştir. Çalışmamızda ilk olarak suçların daha iyi anlaşılabilmesi amacıyla bilişim ve ilgili kavramlar ile suç işlenme şekilleri açıklanmaya çalışılmıştır. Ardından TCK m. 244/1-2 çerçevesinde sistem ve veriye müdahale suçları incelenerek suçların unsurları ortaya konulmuştur. Son bölümde ise TCK m. 244/4\'de düzenlenen bilişim sistemi aracılığıyla haksız çıkar sağlama suçu incelenmiş ve son olarak çalışmamız kapsamında incelenen suçların TCK\'da düzenlenen benzer suçlarla karşılaştırılması yapılarak konunun aydınlatılması amaçlanmıştır. Anahtar Kelimeler: Bilişim Sistemi, Veri, Bilişim, Bilişim Suçları TCK\'da düzenlenen benzer suçlarla karşılaştırılması yapılarak konunun aydınlatılması amaçlanmıştır. Anahtar Kelimeler: Bilişim Sistemi, Veri, Bilişim, Bilişim Suçları Çalışmamızda ilk olarak suçların daha iyi anlaşılabilmesi amacıyla bilişim ve ilgili kavramlar ile suç işlenme şekilleri açıklanmaya çalışılmıştır.', 'Bilişim alanındaki gelişmelerin hukuk alanında da büyük bir etkisi bulunmaktadır. Günlük hayatta sıklıkla karşılaşılan suç tiplerinin bilişim ortamında kolaylıkla işlenebilmesi nedeniyle bazı fiiller suç olarak düzenlenmiştir. Çalışmamızda ilk olarak suçların daha iyi anlaşılabilmesi amacıyla bilişim ve ilgili kavramlar ile suç işlenme şekilleri açıklanmaya çalışılmıştır. Ardından TCK m. 244/1-2 çerçevesinde sistem ve veriye müdahale suçları incelenerek suçların unsurları ortaya konulmuştur. Son bölümde ise TCK m. 244/4\'de düzenlenen bilişim sistemi aracılığıyla haksız çıkar sağlama suçu incelenmiş ve son olarak çalışmamız kapsamında incelenen suçların TCK\'da düzenlenen benzer suçlarla karşılaştırılması yapılarak konunun aydınlatılması amaçlanmıştır. Anahtar Kelimeler: Bilişim Sistemi, Veri, Bilişim, Bilişim SuçlarıBilişim alanındaki gelişmelerin hukuk alanında da büyük bir etkisi bulunmaktadır. Günlük hayatta sıklıkla karşılaşılan suç tiplerinin bilişim ortamında kolaylıkla işlenebilmesi nedeniyle bazı fiiller suç olarak düzenlenmiştir. Çalışmamızda ilk olarak suçların daha iyi anlaşılabilmesi amacıyla bilişim ve ilgili kavramlar ile suç işlenme şekilleri açıklanmaya çalışılmıştır. Ardından TCK m. 244/1-2 çerçevesinde sistem ve veriye müdahale suçları incelenerek suçların unsurları ortaya konulmuştur. Son bölümde ise TCK m. 244/4\'de düzenlenen bilişim sistemi aracılığıyla haksız çıkar sağlama suçu incelenmiş ve son olarak çalışmamız kapsamında incelenen suçların TCK\'da düzenlenen benzer suçlarla karşılaştırılması yapılarak konunun aydınlatılması amaçlanmıştır. Anahtar Kelimeler: Bilişim Sistemi, Veri, Bilişim, Bilişim Suçları', 4, '2022-03-31 21:15:07', '2022-03-31 21:24:15'),
(3, '181307024', '307001', 1, 'İstanbul\'daki bilişim firmalarında kullanılan bilişim sistemlerini değer zinciri analizi ve proje yönetimi açısından değerlendirme ve bulut bilişim teknolojileri kullanımı', 'Dünya pazarlarının küreselleşmesi ile birlikte, hız, maliyet ve bilgi yönetimi kavramları daha fazla önem kazanmaya başlamıştır. Bununla birlikte, işletmelerin, rekabet üstünlüğünü sağlama ve her alanda gelişme hedefleri, bilişim sistemleri kullanımını kaçınılmaz hale getirmiştir. BT ve işletme maliyetlerini azaltmak adına teknolojik bir yenilik olarak değerlendirilen bulut bilişim, bilgi teknolojileri faaliyetlerinin dış kaynaklardan kullanılarak temel yeteneklere odaklanılmasına ve gelişen teknolojilere uyum sağlanmasına imkân vermektedir. bulut bilişim, dış kaynak kullanımı kavramına ek olarak, aynı zamanda daha hızlı ve daha esnek iş süreçlerine, \"kullandıkça öde\" prensibi ile daha düşük maliyetlere ulaşmaya olanak sağlamaktadır. Bu çalışmada, İstanbul\'daki Bilişim firmalarında var olan bilişim sistemlerinin tasarımı, üretimi, hayata geçirilmesi ve idamesi aşamasında kullanılan yöntem ve araçların değer zinciri modeline uygunluğuyla, genel kabul görmüş proje yönetimi yaklaşımındaki iş süreçlerine uygunluğu ve mevcut yapının bulut bilişim teknolojisine/felsefesine taşınabilirliği araştırılmıştır. Bu kapsamda, Bilişim işletmeleri ile yapılan görüşme verilerinin analizinden elde edilen bulgular; teknolojik, organizasyonel ve çevresel bağlamda değerlendirilmiştir. Anahtar Kelimeler : Bilişim Sistemleri, Değer Zinciri Analizi, Proje Yönetimi, Bulut Bilişim, Dijital Şirket, Tedarik Zinciri Yönetimi,Kurumsal Kaynak Planlama', 'Dünya pazarlarının küreselleşmesi ile birlikte, hız, maliyet ve bilgi yönetimi kavramları daha fazla önem kazanmaya başlamıştır. Bununla birlikte, işletmelerin, rekabet üstünlüğünü sağlama ve her alanda gelişme hedefleri, bilişim sistemleri kullanımını kaçınılmaz hale getirmiştir. BT ve işletme maliyetlerini azaltmak adına teknolojik bir yenilik olarak değerlendirilen bulut bilişim, bilgi teknolojileri faaliyetlerinin dış kaynaklardan kullanılarak temel yeteneklere odaklanılmasına ve gelişen teknolojilere uyum sağlanmasına imkân vermektedir. bulut bilişim, dış kaynak kullanımı kavramına ek olarak, aynı zamanda daha hızlı ve daha esnek iş süreçlerine, \"kullandıkça öde\" prensibi ile daha düşük maliyetlere ulaşmaya olanak sağlamaktadır. Bu çalışmada, İstanbul\'daki Bilişim firmalarında var olan bilişim sistemlerinin tasarımı, üretimi, hayata geçirilmesi ve idamesi aşamasında kullanılan yöntem ve araçların değer zinciri modeline uygunluğuyla, genel kabul görmüş proje yönetimi yaklaşımındaki iş süreçlerine uygunluğu ve mevcut yapının bulut bilişim teknolojisine/felsefesine taşınabilirliği araştırılmıştır. Bu kapsamda, Bilişim işletmeleri ile yapılan görüşme verilerinin analizinden elde edilen bulgular; teknolojik, organizasyonel ve çevresel bağlamda değerlendirilmiştir. Anahtar Kelimeler : Bilişim Sistemleri, Değer Zinciri Analizi, Proje Yönetimi, Bulut Bilişim, Dijital Şirket, Tedarik Zinciri Yönetimi,Kurumsal Kaynak Planlama Dünya pazarlarının küreselleşmesi ile birlikte, hız, maliyet ve bilgi yönetimi kavramları daha fazla önem kazanmaya başlamıştır. Bununla birlikte, işletmelerin, rekabet üstünlüğünü sağlama ve her alanda gelişme hedefleri, bilişim sistemleri kullanımını kaçınılmaz hale getirmiştir.', 8, '2022-03-31 21:17:23', '2022-03-31 21:28:15'),
(4, '181307006', '307001', 1, 'Bilişim Yoluyla İşlenen Suçlar ve Ayrımı', 'Çalışmanın ana konusu ?bilişim suçları, bilişim yoluyla işlenen suçlar ve adli bilişim? kavramlarıdır. Bu kavramlar birbirleriyle ilişkili olmasına karşın aynı şeyi ifade etmemektedir. Ancak kavramların içeriği tam olarak bilinmeyen kişilerce (konuyla doğrudan ya da dolaylı ilgili olan) yanlış anlamlarda kullanılmakta ve algılanmaktadır. Bu yanlış kullanım ve algılama da, uygulamaya yanlış ve standart dışı uygulamalar olarak yansımaktadır. Çalışmamızda öncelikle kavramlar ulusal ve uluslar arası literatüre göre detaylarıyla ve örnekleriyle anlatılmaya çalışılmıştır. Daha sonra birbirleriyle olan benzerlik ve farklılıkları vurgulanmıştır. Burada sadece teorik bir yaklaşım izlenmemiş ayrıca uygulamadan örnekler de verilmiştir. Sonuç olarak çalışmamızda, kavramların tam olarak ne ifade ettiği anlatılırken, uygulamada nasıl yanlışlıklar yapıldığına da değinilerek, olması gereken durum ortaya konulmaya çalışılmıştır.Daha sonra birbirleriyle olan benzerlik ve farklılıkları vurgulanmıştır. Burada sadece teorik bir yaklaşım izlenmemiş ayrıca uygulamadan örnekler de verilmiştir. Sonuç olarak çalışmamızda, kavramların tam olarak ne ifade ettiği anlatılırken, uygulamada nasıl yanlışlıklar yapıldığına da değinilerek, olması gereken durum ortaya konulmaya çalışılmıştır.', 'Çalışmanın ana konusu ?bilişim suçları, bilişim yoluyla işlenen suçlar ve adli bilişim? kavramlarıdır. Bu kavramlar birbirleriyle ilişkili olmasına karşın aynı şeyi ifade etmemektedir. Ancak kavramların içeriği tam olarak bilinmeyen kişilerce (konuyla doğrudan ya da dolaylı ilgili olan) yanlış anlamlarda kullanılmakta ve algılanmaktadır. Bu yanlış kullanım ve algılama da, uygulamaya yanlış ve standart dışı uygulamalar olarak yansımaktadır. Çalışmamızda öncelikle kavramlar ulusal ve uluslar arası literatüre göre detaylarıyla ve örnekleriyle anlatılmaya çalışılmıştır. Daha sonra birbirleriyle olan benzerlik ve farklılıkları vurgulanmıştır. Burada sadece teorik bir yaklaşım izlenmemiş ayrıca uygulamadan örnekler de verilmiştir. Sonuç olarak çalışmamızda, kavramların tam olarak ne ifade ettiği anlatılırken, uygulamada nasıl yanlışlıklar yapıldığına da değinilerek, olması gereken durum ortaya konulmaya çalışılmıştır.Çalışmanın ana konusu ?bilişim suçları, bilişim yoluyla işlenen suçlar ve adli bilişim? kavramlarıdır. Bu kavramlar birbirleriyle ilişkili olmasına karşın aynı şeyi ifade etmemektedir. Ancak kavramların içeriği tam olarak bilinmeyen kişilerce (konuyla doğrudan ya da dolaylı ilgili olan) yanlış anlamlarda kullanılmakta ve algılanmaktadır. Bu yanlış kullanım ve algılama da, uygulamaya yanlış ve standart dışı uygulamalar olarak yansımaktadır. Çalışmamızda öncelikle kavramlar ulusal ve uluslar arası literatüre göre detaylarıyla ve örnekleriyle anlatılmaya çalışılmıştır. Daha sonra birbirleriyle olan benzerlik ve farklılıkları vurgulanmıştır. Burada sadece teorik bir yaklaşım izlenmemiş ayrıca uygulamadan örnekler de verilmiştir. Sonuç olarak çalışmamızda, kavramların tam olarak ne ifade ettiği anlatılırken, uygulamada nasıl yanlışlıklar yapıldığına da değinilerek, olması gereken durum ortaya konulmaya çalışılmıştır.', 5, '2022-03-31 22:28:05', '2022-04-01 20:09:17'),
(5, '181307024', '307001', 1, 'Bilişimle girişimcilik: 5. sınıf öğrencilerinin tasarım odaklı doğaçyapma etkinliğinde bilişimle üretim yapmalarına ilişkin bir durum çalışması', 'Bu araştırmanın amacı Tasarım Odaklı Doğaçyapma (TOD) etkinliği durumundaki ilköğretim 5. sınıf öğrencilerinin girişimciliğe yönelik bilgileri öğrenme ve 3B bilişim araçlarıyla üretim yapma deneyimlerini betimlemektir. Araştırma, 2015–2016 eğitim öğretim yılı ikinci döneminde Ankara\'daki özel bir okulda Bilişim Teknolojileri ve Yazılım dersinde gerçekleştirilmiştir. Araştırmanın çalışma grubunu bu okulda öğrenim gören tüm 5. sınıf öğrencileri oluşturmaktadır. Bu kapsamda çalışılan durum ve katılımcılar, rastgele olmayan (amaçlı) örnekleme yöntemleriyle seçilmiş ve araştırmada tek bir analiz birimine odaklanılmıştır. Çalışılan durum, TOD yaklaşımına dayalı bir girişimcilik öğretim etkinliğidir. Bu etkinlikte öğrencilerden annesinin ihtiyacı olan bir ürünü tespit etmeleri, bu ürünü 3B yazıcı ile üreterek anneler gününde hediye etmeleri ve deneyimlerini sınıfla paylaşmaları beklenmiştir. Araştırma durum çalışması yöntemi doğrultusunda iki ayrı araştırma desenine göre planlanmış ve yürütülmüştür. Nitel verilerin toplanması ve analizinde bütüncül tek durum deseni kullanılırken, araştırmaya dâhil edilen nicel veriler, tek grup ön test-son test deneysel desene göre toplanmış ve analiz edilmiştir. Araştırmanın amacına yönelik soruları cevaplandırabilmek için anket, görüşme, gözlem ve doküman inceleme veri toplama yöntemleri doğrultusunda araştırmacı tarafından geliştirilen ve uzman görüşü alınan sekiz farklı nitel veri toplama formu ile geçerlik ve güvenirlik çalışmaları yapılmış olan girişimcilik bilgi testinden yararlanılmıştır. Bu çalışmada elde edilen nitel ve nicel veriler tanımlayıcı durum çalışmaları için önerilen \"hem nicel hem nitel verileri kullanma\" analitik stratejisi doğrultusunda analiz edilmiştir. Nitel verilerin analizinde nitel içerik analizi ve nicel içerik analizi kullanılmıştır. Bu analizlerde farklı veri toplama yöntemleriyle elde edilen veriler birbirlerini teyit etmek amacıyla kullanılarak yöntem üçgenlemesi yapılmıştır. Diğer yandan ön test son test puan çiftlerine ait tekrarlı ölçümlerden oluşan nicel veriler ise bağımlı örneklem t-', 'Bu araştırmanın amacı Tasarım Odaklı Doğaçyapma (TOD) etkinliği durumundaki ilköğretim 5. sınıf öğrencilerinin girişimciliğe yönelik bilgileri öğrenme ve 3B bilişim araçlarıyla üretim yapma deneyimlerini betimlemektir. Araştırma, 2015–2016 eğitim öğretim yılı ikinci döneminde Ankara\'daki özel bir okulda Bilişim Teknolojileri ve Yazılım dersinde gerçekleştirilmiştir. Araştırmanın çalışma grubunu bu okulda öğrenim gören tüm 5. sınıf öğrencileri oluşturmaktadır. Bu kapsamda çalışılan durum ve katılımcılar, rastgele olmayan (amaçlı) örnekleme yöntemleriyle seçilmiş ve araştırmada tek bir analiz birimine odaklanılmıştır. Çalışılan durum, TOD yaklaşımına dayalı bir girişimcilik öğretim etkinliğidir. Bu etkinlikte öğrencilerden annesinin ihtiyacı olan bir ürünü tespit etmeleri, bu ürünü 3B yazıcı ile üreterek anneler gününde hediye etmeleri ve deneyimlerini sınıfla paylaşmaları beklenmiştir. Araştırma durum çalışması yöntemi doğrultusunda iki ayrı araştırma desenine göre planlanmış ve yürütülmüştür. Nitel verilerin toplanması ve analizinde bütüncül tek durum deseni kullanılırken, araştırmaya dâhil edilen nicel veriler, tek grup ön test-son test deneysel desene göre toplanmış ve analiz edilmiştir. Araştırmanın amacına yönelik soruları cevaplandırabilmek için anket, görüşme, gözlem ve doküman inceleme veri toplama yöntemleri doğrultusunda araştırmacı tarafından geliştirilen ve uzman görüşü alınan sekiz farklı nitel veri toplama formu ile geçerlik ve güvenirlik çalışmaları yapılmış olan girişimcilik bilgi testinden yararlanılmıştır. Bu çalışmada elde edilen nitel ve nicel veriler tanımlayıcı durum çalışmaları için önerilen \"hem nicel hem nitel verileri kullanma\" analitik stratejisi doğrultusunda analiz edilmiştir. Nitel verilerin analizinde nitel içerik analizi ve nicel içerik analizi kullanılmıştır. Bu analizlerde farklı veri toplama yöntemleriyle elde edilen veriler birbirlerini teyit etmek amacıyla kullanılarak yöntem üçgenlemesi yapılmıştır. Diğer yandan ön test son test puan çiftlerine ait tekrarlı ölçümlerden oluşan nicel veriler ise bağımlı örneklem t-Testi ile analiz edilmiştir. Araştırma soruları doğrultusunda elde edilen sonuçlara göre; TOD etkinliği katılımcıların girişimcilik bilgisi düzeylerini arttırmıştır. Katılımcıların 3B bilişim araçlarıyla üretim hakkındaki görüşleri tercih durumları, öğrenme ortamı ve kullanım alanları olmak üzere 3 ayrı boyutta gruplanmış ve görüşlerin her bir boyutta TOD etkinliğinden elde edilen deneyimlere bağlı olarak uygulama sonrasında farklılaştığı görülmüştür. TOD etkinliğinde katılımcıları karar verdikleri ürünü yapmaya iten 2 farklı durum ortaya çıkmıştır. Bazı', 5, '2022-03-31 23:11:49', '2022-03-31 23:12:46'),
(6, '181307049', '307002', 1, 'akıllı ev', 'ev ilanında da gördüğümüz akıllı evler, mimari ve teknolojinin bir bütününü oluşturuyor. Peki akıllı ev nedir, akıllı ev sistemleri nasıl olur, nasıl yapılır gibi soruların cevabını merak ediyorsanız bu haberimiz tam size göre. Hazırsanız başlıyoruz!\nYıllar önce Bill Gates\'in milyon dolarlık malikanesine ait görüntüler ilk ortaya çıktığında, tüm dünya evlerin aslında yaşayan birer robot olarak kontrol edilebileceğini belki de ilk kez görmüştü. Bilim kurgu filmlerinde de sık sık karşımıza çıkan akıllı ev sistemleri, artık günümüzde herkes için son derece ulaşılabilir oldular. \n\nElbette sıradan bir evi teknolojik cihazlarda donatmak ve akıllı hale getirmek biraz bütçe ve temel düzeyde teknik bilgi gerektiriyor. Ancak akıllı ev sistemlerinin temellerini öğrendikten sonra her şey daha kolay. \nYıllar önce Bill Gates\'in milyon dolarlık malikanesine ait görüntüler ilk ortaya çıktığında, tüm dünya evlerin aslında yaşayan birer robot olarak kontrol edilebileceğini belki de ilk kez görmüştü. Bilim kurgu filmlerinde de sık sık karşımıza çıkan akıllı ev sistemleri, artık günümüzde herkes için son derece ulaşılabilir oldular. \n\nElbette sıradan bir evi teknolojik cihazlarda donatmak ve akıllı hale getirmek biraz bütçe ve temel düzeyde teknik bilgi gerektiriyor. Ancak akıllı ev sistemlerinin temellerini öğrendikten sonra her şey daha kolay.', 'uyumlu şekilde kullanıldığı sistemlerin kurulduğu evlerdir. Akıllı ev sistemleri; genellikle akıllı telefonları merkezine alan, sesli asistanlarında kullanılabildiği merkezi yönetim imkanı sunar.\n\nAyrıca akıllı ev sistemleri, bir yazılım tarafından programlanarak binaları da uzaktan kontrol etmeye yarar. Bu sistemler kablolu olabileceği gibi kablosuz da olabilir. Teknolojinin tüm artıları kullanılarak oluşturulan akıllı ev sistemleriyle ilgili birçok değişken bulunmaktadır. ıllı ev, sensörlerin, akıllı ampuller, akıllı kameralar, klimalar, sulama kanalları vb. gibi teknolojilerin internet bağlantısı ile entegre olmasıyla kurulur. Tüm bunları birleştiren bir yazılımlar sayesinde sayesinde akıllı telefonunuz aracılığıyla evleri ya da binaları kontrol etmeniz mümkündür.\n\nSıradan bir evi akıllı hale getirmek için sahip olmanız gereken iki şey, akıllı telefon ve WiFi destekli internet ağıdır. Elinizdeki akıllı telefon ile internete bağlı olan akıllı sistemlerinizi bir yazılım aracılığıyla yönetebilir, evinizde olan biten şeyleri yakından takip edebilirsiniz\nAyrıca akıllı ev sistemleri, bir yazılım tarafından programlanarak binaları da uzaktan kontrol etmeye yarar. Bu sistemler kablolu olabileceği gibi kablosuz da olabilir. Teknolojinin tüm artıları kullanılarak oluşturulan akıllı ev sistemleriyle ilgili birçok değişken bulunmaktadır. ıllı ev, sensörlerin, akıllı ampuller, akıllı kameralar, klimalar, sulama kanalları vb. gibi teknolojilerin internet bağlantısı ile entegre olmasıyla kurulur. Tüm bunları birleştiren bir yazılımlar sayesinde sayesinde akıllı telefonunuz aracılığıyla evleri ya da binaları kontrol etmeniz mümkündür.\n\nSıradan bir evi akıllı hale getirmek için sahip olmanız gereken iki şey, akıllı telefon ve WiFi destekli internet ağıdır. Elinizdeki akıllı telefon ile internete bağlı olan akıllı sistemlerinizi bir yazılım aracılığıyla yönetebilir, evinizde olan biten şeyleri yakından takip edebilirsiniz', 7, '2022-04-01 18:14:26', '2022-04-01 18:28:48'),
(7, '181307024', '307001', 2, 'Zararlı yazılım tespiti için yazılım davranış analizi', 'Siber saldırı türleri arasında kurumlar ve bireyler için yüksek finansal kayıplara neden olan zararlı yazılımlar, bilgisayar sistemlerine yönelik en büyük tehdittir. Sürekli kullandığımız e-posta, web siteleri, web uygulamaları gibi enjeksiyon vektörleri aracılığıyla bilgisayarlarımıza kolaylıkla bulaşabilen zararlı yazılım türleri gün geçtikçe artmakta ve yeni türler piyasaya sürülmektedir. Zararlı yazılımları otomatik olarak tespit etmek ve bilgisayar sistemlerimizi zararlı yazılım tehditlerine karşı korumak kritik bir hale gelmiştir. Bilgisayar sistemlerimizi zararlı yazılım tehditlerine karşı korumak için farklı analiz yöntemleri mevcuttur. Dinamik analiz, bilgisayar sistemindeki yazılımın davranışsal bilgilerinin elde edilmesinde oldukça etkilidir. Zararlı yazılımın sistem üzerindeki gerçekleştirdiği işlevleri olan API çağrı dizisi bilgilerini elde edebilir. Ancak, yazılım çalıştırdıkları herhangi bir döngüde veya aynı tıklamalar sonucunda çok fazla tekrarlı ve gürültülü API çağrısı oluşturmaktadır. Zararlı yazılımlar da aynı şekilde tespit edilmekten kaçınma amacıyla gürültülü ve tekrarlı API çağrıları oluşturur. Tekrarlı ve gürültülü API çağrı dizileri zararlı yazılım tespit etmeyi zora sokmaktadır. Bu çalışmada, API çağrı dizisini optimizasyon sürecine tabi tutma ve bu bilgileri kelime temsili algoritmalarıyla kullanma önerilmiştir. Davranış bilgisi API çağrı dizisini, fastText ve BERT kelime temsili teknikleri kullanılarak zararlı yazılımın tespiti ve sınıflandırma görevleri için modeller eğitilmiştir. Performansı değerlendirmek için üç farklı veri seti üzerinde yapılan deneylerde önerilen yöntem her iki kelime temsili tekniği için yüksek performans sağladığı görülmüştür. Deney sonuçlarının karşılaştırılmasına göre en yüksek başarı sağlayan fastText kelime temsili tekniği %99.86 doğruluk oranıyla zararlı yazılımları tespit etmiştir.', 'Siber saldırı türleri arasında kurumlar ve bireyler için yüksek finansal kayıplara neden olan zararlı yazılımlar, bilgisayar sistemlerine yönelik en büyük tehdittir. Sürekli kullandığımız e-posta, web siteleri, web uygulamaları gibi enjeksiyon vektörleri aracılığıyla bilgisayarlarımıza kolaylıkla bulaşabilen zararlı yazılım türleri gün geçtikçe artmakta ve yeni türler piyasaya sürülmektedir. Zararlı yazılımları otomatik olarak tespit etmek ve bilgisayar sistemlerimizi zararlı yazılım tehditlerine karşı korumak kritik bir hale gelmiştir. Bilgisayar sistemlerimizi zararlı yazılım tehditlerine karşı korumak için farklı analiz yöntemleri mevcuttur. Dinamik analiz, bilgisayar sistemindeki yazılımın davranışsal bilgilerinin elde edilmesinde oldukça etkilidir. Zararlı yazılımın sistem üzerindeki gerçekleştirdiği işlevleri olan API çağrı dizisi bilgilerini elde edebilir. Ancak, yazılım çalıştırdıkları herhangi bir döngüde veya aynı tıklamalar sonucunda çok fazla tekrarlı ve gürültülü API çağrısı oluşturmaktadır. Zararlı yazılımlar da aynı şekilde tespit edilmekten kaçınma amacıyla gürültülü ve tekrarlı API çağrıları oluşturur. Tekrarlı ve gürültülü API çağrı dizileri zararlı yazılım tespit etmeyi zora sokmaktadır. Bu çalışmada, API çağrı dizisini optimizasyon sürecine tabi tutma ve bu bilgileri kelime temsili algoritmalarıyla kullanma önerilmiştir. Davranış bilgisi API çağrı dizisini, fastText ve BERT kelime temsili teknikleri kullanılarak zararlı yazılımın tespiti ve sınıflandırma görevleri için modeller eğitilmiştir. Performansı değerlendirmek için üç farklı veri seti üzerinde yapılan deneylerde önerilen yöntem her iki kelime temsili tekniği için yüksek performans sağladığı görülmüştür. Deney sonuçlarının karşılaştırılmasına göre en yüksek başarı sağlayan fastText kelime temsili tekniği %99.86 doğruluk oranıyla zararlı yazılımları tespit etmiştir.', 3, '2022-04-01 19:04:27', '2022-04-01 19:26:44'),
(8, '181307049', '307002', 2, 'sanal dünya', 'Sanal Evren, Metaverse Nedir?\nGeçtiğimiz yılın dünya çapında en çok konuşulan konusu sanal evrenler oldu diyebiliriz. Metaverse’in Türkçe karşılığı “sanal evren”dir. Facebook şirketinin ismini Meta’ya çevirmesi de yaşanan önemli olaylardan olmuştur.\n\nMetaverse, insanların 3 boyutlu bir şekilde var olabilecekleri evrendir. Mark Zuckerberg tarafından ortaya çıkarılan bu proje “fizikselleştirilmiş internet” olarak da tanımlanmaktadır. Sanal gerçeklik gözlükler ve gerçekçiliği artırılmış cihazlar ile deneyimlenecek olan proje ile internette yeni bir dünya kuruluyor diyebiliriz.\n\nMetaverse Arsa Satın Almak\nKurulan yeni dünyada da aynı normal hayatta olduğu gibi mülk alınabiliyor. Metaverse arsa satın alarak siz de sanal dünyada kendinize ait bir alana sahip olabilirsiniz. Öngörülerimize göre aynı sanal para gibi metaverse dünyası da değerlenecek gibi duruyor.\n\nHatta dünya üzerinde ve ülkemizde de pek çok arsa şimdiden satılmış durumda. Özellikle tarihi eserler, köprüler ve stadyum gibi alanların çoğu satıldı. Ülkemizde satılan arsaların yarısı ise İstanbul’da. İstiklal Caddesi, İstanbul boğazı çevresi gibi alanlar en çok tercih edilen yerler olsa da Bağcılar ve Esenler gibi bölgelerde 150 lira gibi fiyatlara arsa satın alabilirsiniz.', 'Sanal evrende arsa almak için sanal bir cüzdana sahip olmalısınız. Sanal arsa satan firmaları bulduktan sonra kripto paralar ile arsayı satın alabilirsiniz. Arsayı almadan önce değerli bir bölge veya değerleneceğini düşündüğünüz arsaları tercih etmelisiniz. Metaverse arsa alarak geleceğe dönük güzel bir yatırım yapabilirsiniz.\n\nMetaverse Arsa Hangi Sitelerden Yapılabilir?\nMetaverse arsa almak istiyorsanız Mana Axie Infinity, Sandbox, Decentraland, Ovr, Dvision Network, Blocktopia gibi siteleri kullanabilirsiniz.\n\nMetaverse Coinleri Nelerdir?\nEn popüler metaverse coin çeşitleri şunlardır; Axie Infinity, The Sandbox, Decentraland, Enjin Coin, Defi Kingdoms, Mobox, My Neighbor Alice.\n\nMetaverse İstanbul Arsa Fiyatları\nÜlkemizde alınan arsaların yarısının İstanbul’dan olduğunu söylemiştik. \nMetaverse, insanların 3 boyutlu bir şekilde var olabilecekleri evrendir. Mark Zuckerberg tarafından ortaya çıkarılan bu proje “fizikselleştirilmiş internet” olarak da tanımlanmaktadır. Sanal gerçeklik gözlükler ve gerçekçiliği artırılmış cihazlar ile deneyimlenecek olan proje ile internette yeni bir dünya kuruluyor diyebiliriz.\n\nMetaverse Arsa Satın Almak\nKurulan yeni dünyada da aynı normal hayatta olduğu gibi mülk alınabiliyor. Metaverse arsa satın alarak siz de sanal dünyada kendinize ait bir alana sahip olabilirsiniz. Öngörülerimize göre aynı sanal para gibi metaverse dünyası da değerlenecek gibi duruyor.\n\nHatta dünya üzerinde ve ülkemizde de pek çok arsa şimdiden satılmış durumda. Özellikle tarihi eserler, köprüler ve stadyum gibi alanların çoğu satıldı. Ülkemizde satılan arsaların yarısı ise İstanbul’da. İstiklal Caddesi, İstanbul boğazı çevresi gibi alanlar en çok tercih edilen yerler olsa da Bağcılar ve Esenler gibi bölgelerde 150 lira gibi fiyatlara arsa satın alabilirsiniz.', 7, '2022-04-01 19:04:48', '2022-04-01 19:23:48'),
(9, '181307049', '307002', 2, 'akıllı tarım uygulaması', '“İmeceMobil” uygulaması ile çiftçilerimiz ihtiyaç duydukları birçok bilgiye dijital ortamda ulaşabiliyor.\nZirai Hava Durumu ve Bildirimler: Tarla, bahçe ve hayvancılık ile ilgili üretim tesisi bilgilerinizi kaydederek bu alanların hava tahmin bilgilerini (15 gün öncesi ve 15 gün sonrası olacak şekilde) görüntüleyebilirsiniz. Kaydettiğiniz konuma özel don, dolu, yağış, fırtına, yıldırım ve şimşek gibi anlık hava olayları hakkında önceden uyarılar alarak önlem alabilirsiniz.\nUzmanına Sor Özelliği: Ücretsiz olarak sorularınızı dilerseniz fotoğraf da ekleyerek sorabilir, uzmanlarımızdan bitkisel ve hayvansal üretim alanlarında tavsiyeler alabilirsiniz.\nPiyasa Bilgileri: Tarımsal ürünlerin en son tarihli hal/borsa fiyatları ile yem, et, süt ve yumurta fiyatlarını öğrenebilirsiniz.\nBölgenize ve ürününüze özgü Kampanyalar: Size özel Bankamız kampanya ve avantajlarından haberdar olabilir , girdi maliyetlerinizi düşürebilirsiniz.\nİmece Kart İşlemleri: İmece Kart sahibiyseniz, “İmece Kart’ım” seçeneği üzerinden kart bilgilerinize ulaşıp işlemlerinizi kolayca yapabilirsiniz.\nHaber ve duyurular: Ulusal ve yöresel haberleri anında öğrenebilir, hibe ve destek ödemelerinden hızlı bir şekilde bilgi sahibi olabilirsiniz.\nBaşvurular: İmece Kart, Tarım Kredisi, Tarım Sigortası, Çiftçi BES ve Lisanslı Depolara bırakılan ürünleriniz için şubeye gitmeden başvurularınızı yapabilirsiniz.', '“İmeceMobil” uygulaması ile çiftçilerimiz ihtiyaç duydukları birçok bilgiye dijital ortamda ulaşabiliyor.\nZirai Hava Durumu ve Bildirimler: Tarla, bahçe ve hayvancılık ile ilgili üretim tesisi bilgilerinizi kaydederek bu alanların hava tahmin bilgilerini (15 gün öncesi ve 15 gün sonrası olacak şekilde) görüntüleyebilirsiniz. Kaydettiğiniz konuma özel don, dolu, yağış, fırtına, yıldırım ve şimşek gibi anlık hava olayları hakkında önceden uyarılar alarak önlem alabilirsiniz.\nUzmanına Sor Özelliği: Ücretsiz olarak sorularınızı dilerseniz fotoğraf da ekleyerek sorabilir, uzmanlarımızdan bitkisel ve hayvansal üretim alanlarında tavsiyeler alabilirsiniz.\nPiyasa Bilgileri: Tarımsal ürünlerin en son tarihli hal/borsa fiyatları ile yem, et, süt ve yumurta fiyatlarını öğrenebilirsiniz.\nBölgenize ve ürününüze özgü Kampanyalar: Size özel Bankamız kampanya ve avantajlarından haberdar olabilir , girdi maliyetlerinizi düşürebilirsiniz.\nİmece Kart İşlemleri: İmece Kart sahibiyseniz, “İmece Kart’ım” seçeneği üzerinden kart bilgilerinize ulaşıp işlemlerinizi kolayca yapabilirsiniz.\nHaber ve duyurular: Ulusal ve yöresel haberleri anında öğrenebilir, hibe ve destek ödemelerinden hızlı bir şekilde bilgi sahibi olabilirsiniz.\nBaşvurular: İmece Kart, Tarım Kredisi, Tarım Sigortası, Çiftçi BES ve Lisanslı Depolara bırakılan ürünleriniz için şubeye gitmeden başvurularınızı yapabilirsiniz.\nTÜRİB: Türkiye Ürün ve İhtisas Borsası’nda (TÜRİB) işlem gören ürünlerin fiyatlarını takip edebilirsiniz.\nHasar Bildir: Bitkisel ürün ve sera hasar bildiriminizi TARSİM’e tek tuşla yapabilirsiniz.\nGübre Tavsiye: Toros Tarım’dan ürününüze özgü gübreleme önerisini ücretsiz olarak alabilirsiniz.\nTıbbi ve Aromatik bitkilerin yanı sıra süs bitkilerini de İmeceMobil’e kaydedip zirai bilgiler alabilirsiniz.\nTeklif İste Teklif Ver: İmeceMobil kullanıcılarının çiftçilikle ilgili girdi maliyetlerini düşürebileceği bir özelliktir. Kullanıcılar; gübreden ilaca tarım ekipmanlarından fide/fidan taleplerine kadar 9 ayrı kategoride teklif isteyebilir, İmeceMobil Anlaşmalı Tedarikçilerden gelen teklifleri karşılaştırarak maliyetlerini düşürebilirler. İmeceMobil’den Teklif Vermek için başvuran tedarikçiler ise bu alanda yer alarak pazarlarını genişletebilir ve Türkiye’nin her bir noktasına yayılmış binlerce İmeceMobil kullanıcısına teklif verebilirler.\nGelir Gider Hesaplama: Çiftçilerimizin Gelirlerini ve Giderlerini, hayvancılık ve bitkisel üretim alanlarında detaylı olarak girebilecekleri ve aylık bazda takip edebilecekleri bir özelliktir. Akaryakıt’tan Gübre’ye Sigorta giderlerinden Ürün gelirlerine bir çok alanda gelirlerinizi ve giderlerinizi girebilirsiniz. Süt üretimi yapan çiftçilerimiz de bu özellik sayesinde günlük olarak Soğuk ve Sıcak Süt üretimlerinin girişlerini yapabilir ve aylık olarak takip edebilirler.', 8, '2022-04-01 19:29:04', '2022-04-01 19:29:56');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `rapor`
--

CREATE TABLE `rapor` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `proje_id` bigint(20) UNSIGNED NOT NULL,
  `no` int(10) UNSIGNED NOT NULL,
  `docx` text COLLATE utf8_turkish_ci NOT NULL,
  `pdf` text COLLATE utf8_turkish_ci NOT NULL,
  `durum_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `rapor`
--

INSERT INTO `rapor` (`id`, `proje_id`, `no`, `docx`, `pdf`, `durum_id`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 'reports/181307024/1/310322114423/1/rpr1.pdf', 'reports/181307024/1/310322114423/1/rpr1.pdf', 8, '2022-03-31 20:44:23', '2022-03-31 21:23:01'),
(2, 1, 2, 'reports/181307024/1/310322114423/2/rpr2.pdf', 'reports/181307024/1/310322114423/2/rpr2.pdf', 8, '2022-03-31 20:44:23', '2022-03-31 21:23:01'),
(3, 1, 3, 'reports/181307024/1/310322114423/3/rpr3.pdf', 'reports/181307024/1/310322114423/3/rpr3.pdf', 8, '2022-03-31 20:44:23', '2022-03-31 21:23:01'),
(4, 2, 1, 'reports/181307024/2/010422122415/1/rpr1.pdf', 'reports/181307024/2/010422122415/1/rpr1.pdf', 2, '2022-03-31 21:24:15', '2022-03-31 21:24:57'),
(5, 2, 2, 'reports/181307024/2/010422122415/2/rpr2.pdf', 'reports/181307024/2/010422122415/2/rpr2.pdf', 2, '2022-03-31 21:24:15', '2022-03-31 21:24:57'),
(6, 2, 3, 'reports/181307024/2/010422122415/3/rpr3.pdf', 'reports/181307024/2/010422122415/3/rpr3.pdf', 2, '2022-03-31 21:24:15', '2022-03-31 21:24:57'),
(7, 1, 1, 'reports/181307024/1/010422123133/1/rpr1.pdf', 'reports/181307024/1/010422123133/1/rpr1.pdf', 10, '2022-03-31 21:31:33', '2022-03-31 21:44:17'),
(8, 1, 2, 'reports/181307024/1/010422123133/2/rpr2.pdf', 'reports/181307024/1/010422123133/2/rpr2.pdf', 10, '2022-03-31 21:31:33', '2022-03-31 21:44:17'),
(9, 1, 3, 'reports/181307024/1/010422123133/3/rpr3.pdf', 'reports/181307024/1/010422123133/3/rpr3.pdf', 10, '2022-03-31 21:31:33', '2022-03-31 21:44:17'),
(10, 6, 1, 'reports/181307049/6/010422092211/1/rpr1.pdf', 'reports/181307049/6/010422092211/1/rpr1.pdf', 8, '2022-04-01 18:22:11', '2022-04-01 18:23:43'),
(11, 6, 2, 'reports/181307049/6/010422092211/2/rpr2.pdf', 'reports/181307049/6/010422092211/2/rpr2.pdf', 8, '2022-04-01 18:22:11', '2022-04-01 18:23:43'),
(12, 6, 3, 'reports/181307049/6/010422092211/3/rpr3.pdf', 'reports/181307049/6/010422092211/3/rpr3.pdf', 8, '2022-04-01 18:22:11', '2022-04-01 18:23:43'),
(13, 6, 1, 'reports/181307049/6/010422092526/1/rpr1.pdf', 'reports/181307049/6/010422092526/1/rpr1.pdf', 10, '2022-04-01 18:25:26', '2022-04-01 18:26:32'),
(14, 6, 2, 'reports/181307049/6/010422092526/2/rpr2.pdf', 'reports/181307049/6/010422092526/2/rpr2.pdf', 10, '2022-04-01 18:25:26', '2022-04-01 18:26:32'),
(15, 6, 3, 'reports/181307049/6/010422092526/3/rpr3.pdf', 'reports/181307049/6/010422092526/3/rpr3.pdf', 10, '2022-04-01 18:25:26', '2022-04-01 18:26:32'),
(16, 8, 1, 'reports/181307049/8/010422102228/1/rpr1.pdf', 'reports/181307049/8/010422102228/1/rpr1.pdf', 10, '2022-04-01 19:22:28', '2022-04-01 19:22:54'),
(17, 8, 2, 'reports/181307049/8/010422102228/2/rpr2.pdf', 'reports/181307049/8/010422102228/2/rpr2.pdf', 10, '2022-04-01 19:22:28', '2022-04-01 19:22:54'),
(18, 8, 3, 'reports/181307049/8/010422102228/3/rpr3.pdf', 'reports/181307049/8/010422102228/3/rpr3.pdf', 10, '2022-04-01 19:22:28', '2022-04-01 19:22:54');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `sifremiunuttum`
--

CREATE TABLE `sifremiunuttum` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `eposta` varchar(255) COLLATE utf8_turkish_ci NOT NULL,
  `key` longtext COLLATE utf8_turkish_ci NOT NULL,
  `aktif` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `sifremiunuttum`
--

INSERT INTO `sifremiunuttum` (`id`, `eposta`, `key`, `aktif`, `created_at`, `updated_at`) VALUES
(1, 'onder.yakut@kocaeli.com', 'ccf4b7fa15eba2ff85ecfe4c6baaf568', 1, '2022-03-31 17:55:27', '2022-03-31 17:55:27'),
(2, '181307026@kocaeli.com', '51d6382a14b207c5b40e45071caafc96', 1, '2022-03-31 18:12:22', '2022-03-31 18:12:22'),
(3, 'asondas@kocaeli.com', '4bc646e675e27c49c1bbcabdf66eabf7', 1, '2022-03-31 18:24:59', '2022-03-31 18:24:59'),
(4, 'seda.balta@kocaeli.com', 'af140bfde9c1d740cc2da0cab8e60d1e', 1, '2022-03-31 18:26:04', '2022-03-31 18:26:04'),
(5, 'zeynep.sari@kocaeli.com', 'af30b6a15f01613882f8e0cb7d77a564', 1, '2022-03-31 18:27:31', '2022-03-31 18:27:31'),
(6, 'akarakaya@kocaeli.com', '4971c84c204af153faecda902484c2ef', 1, '2022-03-31 18:30:17', '2022-03-31 18:30:17'),
(7, 'eozdemir@kocaeli.com', '4710b589678bebe3ca72477ac24cfbe9', 1, '2022-03-31 18:31:26', '2022-03-31 18:31:26'),
(8, 'pinar.onaydurdu@kocaeli.com', 'a6faab0e974dfbd35837a605f2bbcda0', 1, '2022-03-31 18:34:54', '2022-03-31 18:34:54'),
(9, 'pinar.onaydurdu@kocaeli.com', 'e379172782ccf12598fd194f226a1ed8', 1, '2022-03-31 18:36:08', '2022-03-31 18:36:08'),
(10, 'alev.mutlu@kocaeli.com', '2078c367fb012af270f585d6a0f2170f', 1, '2022-03-31 18:37:02', '2022-03-31 18:37:02'),
(11, 'fcelik@kocaeli.com', '4c6edc47e5c302429ea05a9957c2aa7d', 1, '2022-03-31 18:39:10', '2022-03-31 18:39:10'),
(12, 'ozgecan@kocaeli.com', '265ef703f473014c465a8b69ad5cb48d', 1, '2022-03-31 18:40:35', '2022-03-31 18:40:35'),
(13, '181307044@kocaeli.com', '8e8ba6a067087ab0f4718e6b9f9bcbff', 1, '2022-03-31 18:43:46', '2022-03-31 18:43:46'),
(14, '181307036@kocaeli.com', 'f76dfa0b39c28698c12213f56e2c290a', 1, '2022-03-31 18:44:37', '2022-03-31 18:44:37'),
(15, '181307074@kocaeli.com', '5c2fcf6a4d6a0606b6c4005bab859596', 1, '2022-03-31 18:46:07', '2022-03-31 18:46:07'),
(16, '181307074@kocaeli.com', '2ff45ead70431ad75eac505b0f023a5f', 1, '2022-03-31 18:48:03', '2022-03-31 18:48:03'),
(17, '191307006@kocaeli.com', '41efcfbc7f8e65c8cd0e10f08eaf16d4', 1, '2022-03-31 18:49:28', '2022-03-31 18:49:28'),
(18, '191307006@kocaeli.com', '79b6abeea4e09eb607bcb8fa45669cbc', 1, '2022-03-31 18:49:39', '2022-03-31 18:49:39'),
(19, '181307059@kocaeli.com', '89458ea8a717c43ab7258843964bf24d', 1, '2022-03-31 18:52:06', '2022-03-31 18:52:06'),
(20, '181307059@kocaeli.com', '5a4d25a97ba16c312094823928a6d846', 1, '2022-03-31 18:52:31', '2022-03-31 18:52:31'),
(21, '181307066@kocaeli.com', '931309a28de5586c958c0aa6536b0c06', 1, '2022-03-31 18:53:52', '2022-03-31 18:53:52'),
(22, '191307008@kocaeli.com', '839f7a50e216eba0f9334135da7fff37', 1, '2022-03-31 18:55:44', '2022-03-31 18:55:44'),
(23, '191307008@kocaeli.com', 'f693a795cd5530292037595a9241d59f', 1, '2022-03-31 18:55:58', '2022-03-31 18:55:58'),
(24, '181307006@kocaeli.edu.tr', 'f5fb64f1802e4e04c9a22c21f6bab4a2', 0, '2022-03-31 18:57:36', '2022-03-31 18:58:40'),
(25, '181307006@kocaeli.edu.tr', '97cc1ca992d6e5e7c9d8a3434c63d665', 0, '2022-03-31 18:58:45', '2022-03-31 19:00:43'),
(26, '181307024@kocaeli.edu.tr', 'd0e0d3234cbaabebe458bb3b7a4e841c', 0, '2022-03-31 19:00:29', '2022-03-31 19:01:14'),
(27, '191307052@kocaeli.com', '30808638085be73cf3b3928307ab3dd2', 1, '2022-03-31 19:04:24', '2022-03-31 19:04:24'),
(28, '201307076@kocaeli.com', '5b3f7bf7fe0fc9a4c01b81abfc67ad2f', 1, '2022-03-31 19:06:02', '2022-03-31 19:06:02'),
(29, '181307049@kocaeli.com', '393f0594b39bd2b5631a6ace03e433c1', 1, '2022-03-31 19:08:37', '2022-03-31 19:08:37'),
(30, '181307072@kocaeli.com', '80adbc2318473141789ecd106faefc3a', 1, '2022-03-31 19:09:36', '2022-03-31 19:09:36'),
(31, '191307021@kocaeli.com', '626b9cc3141ad8ea22c206b80c1dedbd', 1, '2022-03-31 19:11:03', '2022-03-31 19:11:03'),
(32, '191307022@kocaeli.com', '4b597097669575d872c86a79df7f0c1c', 1, '2022-03-31 19:11:37', '2022-03-31 19:11:37'),
(33, '191307035@kocaeli.com', '7f490327f11bbedd7df2186cc522f0ce', 1, '2022-03-31 19:13:26', '2022-03-31 19:13:26'),
(34, '191307059@kocaeli.com', '015117bda85839a6a6f9e29172a460ce', 1, '2022-03-31 19:15:00', '2022-03-31 19:15:00'),
(35, '181308005@kocaeli.com', '55291929a2ed3e3ce6587fdaba344693', 1, '2022-03-31 19:17:09', '2022-03-31 19:17:09'),
(36, '181308024@kocaeli.com', '7393856a11e59130833f49e539761313', 1, '2022-03-31 19:18:27', '2022-03-31 19:18:27'),
(37, '181307049@kocaeli.edu.tr', '89e7d869a5aa9cfe9cd32d2de4eb301e', 0, '2022-04-01 18:08:45', '2022-04-01 18:10:46'),
(38, '181307049@kocaeli.edu.tr', '7f4376e5c87abf3b7c2188d852f232dd', 1, '2022-04-01 18:31:37', '2022-04-01 18:31:37'),
(39, '181307024@kocaeli.edu.tr', '29a8ad445c99b075e9c27c01ed02eeb3', 1, '2022-04-01 18:55:38', '2022-04-01 18:55:38'),
(40, 'deneme@deneme.com', '030def5b0feb1402215722752974a542', 1, '2022-04-01 18:59:47', '2022-04-01 18:59:47'),
(41, '181307049@kocaeli.edu.tr', '1999d67e412caa3431341b1d32046887', 1, '2022-04-01 19:07:57', '2022-04-01 19:07:57'),
(42, '181307049@kocaeli.edu.tr', '30c867a7fe6c16cf491a937faabb2c26', 1, '2022-04-01 19:19:51', '2022-04-01 19:19:51'),
(43, '181307072@kocaeli.com', '631a3a1a831e89460fb7bac8d84614f5', 1, '2022-04-01 20:05:55', '2022-04-01 20:05:55'),
(44, '181307072@kocaeli.com', '9699af757a753b5497667747596e647f', 1, '2022-04-01 20:06:10', '2022-04-01 20:06:10'),
(45, '181307006@kocaeli.edu.tr', 'e6a15843dfcf4d1802f77844e254b137', 1, '2022-04-01 20:06:25', '2022-04-01 20:06:25'),
(46, 'eozdemir@kocaeli.com', 'ff0e5d9e23788dfea38c234f5543f6bd', 1, '2022-04-01 20:06:42', '2022-04-01 20:06:42'),
(47, '181307072@kocaeli.com', '59587e20873b5bc783603beaaa4bf218', 1, '2022-04-01 20:20:39', '2022-04-01 20:20:39'),
(48, '181307072@kocaeli.com', '65a0cf830619275960703d04db59f5f3', 1, '2022-04-01 20:20:54', '2022-04-01 20:20:54'),
(49, '181307024@kocaeli.edu.tr', '808b34f88f973ce32d9ee225cb249775', 1, '2022-04-01 20:21:06', '2022-04-01 20:21:06'),
(50, '181307024@kocaeli.edu.tr', 'fa81f678c24f230f26416f7936df4ee8', 1, '2022-04-01 20:21:48', '2022-04-01 20:21:48'),
(51, '181307024@kocaeli.edu.tr', 'f4dd2d03e7b1410e297a16393e60822b', 1, '2022-04-01 20:22:18', '2022-04-01 20:22:18'),
(52, '181307024@kocaeli.edu.tr', '8e18f052e08c8ab2702737c26442b0c9', 1, '2022-04-01 20:22:38', '2022-04-01 20:22:38'),
(53, '181307024@kocaeli.edu.tr', '7ed346fcae9ea329b6c6c8aaac377388', 1, '2022-04-01 20:22:59', '2022-04-01 20:22:59'),
(54, '181307024@kocaeli.edu.tr', '1eb6118cc354d0ed4136e51eabfe0db1', 1, '2022-04-01 20:23:10', '2022-04-01 20:23:10'),
(55, '181307024@kocaeli.edu.tr', '3b0dddce545ba5b911e8388dbdaa0fce', 1, '2022-04-01 20:23:37', '2022-04-01 20:23:37'),
(56, '181307024@kocaeli.edu.tr', 'f2b68a16a4d88a28cb8cfa1375d7ef9f', 1, '2022-04-01 20:25:33', '2022-04-01 20:25:33'),
(57, '181307024@kocaeli.edu.tr', '24961566b93ad556171db8727a8e69dc', 1, '2022-04-01 20:26:04', '2022-04-01 20:26:04'),
(58, '181307024@kocaeli.edu.tr', 'd32eeabc4868c409e807c4b23be92aad', 1, '2022-04-01 20:28:11', '2022-04-01 20:28:11'),
(59, '181307024@kocaeli.edu.tr', 'e62fdc4489c246053590147b9fcc425e', 1, '2022-04-01 20:28:38', '2022-04-01 20:28:38');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `tez`
--

CREATE TABLE `tez` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `proje_id` bigint(20) UNSIGNED NOT NULL,
  `docx` text COLLATE utf8_turkish_ci NOT NULL,
  `pdf` text COLLATE utf8_turkish_ci NOT NULL,
  `durum_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `tez`
--

INSERT INTO `tez` (`id`, `proje_id`, `docx`, `pdf`, `durum_id`, `created_at`, `updated_at`) VALUES
(1, 1, 'theses/181307024/1/010422125912/tez.docx', 'theses/181307024/1/010422125912/tez.pdf', 10, '2022-03-31 21:59:12', '2022-03-31 22:03:30'),
(2, 6, 'theses/181307049/6/010422092704/tez.docx', 'theses/181307049/6/010422092704/tez.pdf', 8, '2022-04-01 18:27:04', '2022-04-01 18:27:44'),
(3, 6, 'theses/181307049/6/010422092809/tez.docx', 'theses/181307049/6/010422092809/tez.pdf', 10, '2022-04-01 18:28:09', '2022-04-01 18:28:48'),
(4, 8, 'theses/181307049/8/010422102328/tez.docx', 'theses/181307049/8/010422102328/tez.pdf', 10, '2022-04-01 19:23:28', '2022-04-01 19:23:40');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `yonetici`
--

CREATE TABLE `yonetici` (
  `id` varchar(30) COLLATE utf8_turkish_ci NOT NULL,
  `adi` varchar(100) COLLATE utf8_turkish_ci NOT NULL,
  `soyadi` varchar(100) COLLATE utf8_turkish_ci NOT NULL,
  `unvan` varchar(100) COLLATE utf8_turkish_ci NOT NULL,
  `tel` varchar(13) COLLATE utf8_turkish_ci NOT NULL,
  `img` varchar(255) COLLATE utf8_turkish_ci NOT NULL DEFAULT '/image?img=profile/default.jpg',
  `eposta` varchar(255) COLLATE utf8_turkish_ci NOT NULL,
  `sifre` varchar(255) COLLATE utf8_turkish_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `yonetici`
--

INSERT INTO `yonetici` (`id`, `adi`, `soyadi`, `unvan`, `tel`, `img`, `eposta`, `sifre`, `created_at`, `updated_at`) VALUES
('1', 'Sadettin', 'Hülagü', 'Sistem Yöneticisi', '902623031000', '/image?img=profile/1/1.png', 'admin@kocaeli.edu.tr', 'e10adc3949ba59abbe56e057f20f883e', '2022-03-31 17:31:35', '2022-03-31 17:37:53');

--
-- Dökümü yapılmış tablolar için indeksler
--

--
-- Tablo için indeksler `aciklama`
--
ALTER TABLE `aciklama`
  ADD PRIMARY KEY (`id`),
  ADD KEY `aciklama_proje_id_foreign` (`proje_id`),
  ADD KEY `aciklama_durum_id_foreign` (`durum_id`);

--
-- Tablo için indeksler `anahtarkelime`
--
ALTER TABLE `anahtarkelime`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `anahtarkelime_kelime_unique` (`kelime`);

--
-- Tablo için indeksler `anahtarkelime_proje`
--
ALTER TABLE `anahtarkelime_proje`
  ADD KEY `anahtarkelime_proje_proje_id_foreign` (`proje_id`),
  ADD KEY `anahtarkelime_proje_anahtarkelime_id_foreign` (`anahtarkelime_id`);

--
-- Tablo için indeksler `bildirim`
--
ALTER TABLE `bildirim`
  ADD PRIMARY KEY (`id`),
  ADD KEY `bildirim_proje_id_foreign` (`proje_id`),
  ADD KEY `bildirim_ogrenci_id_foreign` (`ogrenci_id`),
  ADD KEY `bildirim_durum_id_foreign` (`durum_id`);

--
-- Tablo için indeksler `bolum`
--
ALTER TABLE `bolum`
  ADD PRIMARY KEY (`id`),
  ADD KEY `bolum_fakulte_id_foreign` (`fakulte_id`);

--
-- Tablo için indeksler `danisman`
--
ALTER TABLE `danisman`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `danisman_eposta_unique` (`eposta`),
  ADD KEY `danisman_bolum_id_foreign` (`bolum_id`);

--
-- Tablo için indeksler `donem`
--
ALTER TABLE `donem`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `durum`
--
ALTER TABLE `durum`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `fakulte`
--
ALTER TABLE `fakulte`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `ogrenci`
--
ALTER TABLE `ogrenci`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `ogrenci_eposta_unique` (`eposta`),
  ADD KEY `ogrenci_bolum_id_foreign` (`bolum_id`),
  ADD KEY `ogrenci_danisman_id_foreign` (`danisman_id`);

--
-- Tablo için indeksler `proje`
--
ALTER TABLE `proje`
  ADD PRIMARY KEY (`id`),
  ADD KEY `proje_ogrenci_id_foreign` (`ogrenci_id`),
  ADD KEY `proje_danisman_id_foreign` (`danisman_id`),
  ADD KEY `proje_donem_id_foreign` (`donem_id`),
  ADD KEY `proje_durum_id_foreign` (`durum_id`);
ALTER TABLE `proje` ADD FULLTEXT KEY `proje_adi_fulltext` (`adi`);
ALTER TABLE `proje` ADD FULLTEXT KEY `proje_amac_fulltext` (`amac`);
ALTER TABLE `proje` ADD FULLTEXT KEY `proje_materyal_fulltext` (`materyal`);

--
-- Tablo için indeksler `rapor`
--
ALTER TABLE `rapor`
  ADD PRIMARY KEY (`id`),
  ADD KEY `rapor_durum_id_foreign` (`durum_id`),
  ADD KEY `rapor_proje_id_foreign` (`proje_id`);

--
-- Tablo için indeksler `sifremiunuttum`
--
ALTER TABLE `sifremiunuttum`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `tez`
--
ALTER TABLE `tez`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tez_durum_id_foreign` (`durum_id`),
  ADD KEY `tez_proje_id_foreign` (`proje_id`);

--
-- Tablo için indeksler `yonetici`
--
ALTER TABLE `yonetici`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `yonetici_eposta_unique` (`eposta`);

--
-- Dökümü yapılmış tablolar için AUTO_INCREMENT değeri
--

--
-- Tablo için AUTO_INCREMENT değeri `aciklama`
--
ALTER TABLE `aciklama`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Tablo için AUTO_INCREMENT değeri `anahtarkelime`
--
ALTER TABLE `anahtarkelime`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- Tablo için AUTO_INCREMENT değeri `bildirim`
--
ALTER TABLE `bildirim`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;

--
-- Tablo için AUTO_INCREMENT değeri `bolum`
--
ALTER TABLE `bolum`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Tablo için AUTO_INCREMENT değeri `donem`
--
ALTER TABLE `donem`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Tablo için AUTO_INCREMENT değeri `durum`
--
ALTER TABLE `durum`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Tablo için AUTO_INCREMENT değeri `fakulte`
--
ALTER TABLE `fakulte`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Tablo için AUTO_INCREMENT değeri `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- Tablo için AUTO_INCREMENT değeri `proje`
--
ALTER TABLE `proje`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Tablo için AUTO_INCREMENT değeri `rapor`
--
ALTER TABLE `rapor`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- Tablo için AUTO_INCREMENT değeri `sifremiunuttum`
--
ALTER TABLE `sifremiunuttum`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=60;

--
-- Tablo için AUTO_INCREMENT değeri `tez`
--
ALTER TABLE `tez`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Dökümü yapılmış tablolar için kısıtlamalar
--

--
-- Tablo kısıtlamaları `aciklama`
--
ALTER TABLE `aciklama`
  ADD CONSTRAINT `aciklama_durum_id_foreign` FOREIGN KEY (`durum_id`) REFERENCES `durum` (`id`),
  ADD CONSTRAINT `aciklama_proje_id_foreign` FOREIGN KEY (`proje_id`) REFERENCES `proje` (`id`);

--
-- Tablo kısıtlamaları `anahtarkelime_proje`
--
ALTER TABLE `anahtarkelime_proje`
  ADD CONSTRAINT `anahtarkelime_proje_anahtarkelime_id_foreign` FOREIGN KEY (`anahtarkelime_id`) REFERENCES `anahtarkelime` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `anahtarkelime_proje_proje_id_foreign` FOREIGN KEY (`proje_id`) REFERENCES `proje` (`id`) ON DELETE CASCADE;

--
-- Tablo kısıtlamaları `bildirim`
--
ALTER TABLE `bildirim`
  ADD CONSTRAINT `bildirim_durum_id_foreign` FOREIGN KEY (`durum_id`) REFERENCES `durum` (`id`),
  ADD CONSTRAINT `bildirim_ogrenci_id_foreign` FOREIGN KEY (`ogrenci_id`) REFERENCES `ogrenci` (`id`),
  ADD CONSTRAINT `bildirim_proje_id_foreign` FOREIGN KEY (`proje_id`) REFERENCES `proje` (`id`);

--
-- Tablo kısıtlamaları `bolum`
--
ALTER TABLE `bolum`
  ADD CONSTRAINT `bolum_fakulte_id_foreign` FOREIGN KEY (`fakulte_id`) REFERENCES `fakulte` (`id`);

--
-- Tablo kısıtlamaları `danisman`
--
ALTER TABLE `danisman`
  ADD CONSTRAINT `danisman_bolum_id_foreign` FOREIGN KEY (`bolum_id`) REFERENCES `bolum` (`id`);

--
-- Tablo kısıtlamaları `ogrenci`
--
ALTER TABLE `ogrenci`
  ADD CONSTRAINT `ogrenci_bolum_id_foreign` FOREIGN KEY (`bolum_id`) REFERENCES `bolum` (`id`),
  ADD CONSTRAINT `ogrenci_danisman_id_foreign` FOREIGN KEY (`danisman_id`) REFERENCES `danisman` (`id`);

--
-- Tablo kısıtlamaları `proje`
--
ALTER TABLE `proje`
  ADD CONSTRAINT `proje_danisman_id_foreign` FOREIGN KEY (`danisman_id`) REFERENCES `danisman` (`id`),
  ADD CONSTRAINT `proje_donem_id_foreign` FOREIGN KEY (`donem_id`) REFERENCES `donem` (`id`),
  ADD CONSTRAINT `proje_durum_id_foreign` FOREIGN KEY (`durum_id`) REFERENCES `durum` (`id`),
  ADD CONSTRAINT `proje_ogrenci_id_foreign` FOREIGN KEY (`ogrenci_id`) REFERENCES `ogrenci` (`id`);

--
-- Tablo kısıtlamaları `rapor`
--
ALTER TABLE `rapor`
  ADD CONSTRAINT `rapor_durum_id_foreign` FOREIGN KEY (`durum_id`) REFERENCES `durum` (`id`),
  ADD CONSTRAINT `rapor_proje_id_foreign` FOREIGN KEY (`proje_id`) REFERENCES `proje` (`id`);

--
-- Tablo kısıtlamaları `tez`
--
ALTER TABLE `tez`
  ADD CONSTRAINT `tez_durum_id_foreign` FOREIGN KEY (`durum_id`) REFERENCES `durum` (`id`),
  ADD CONSTRAINT `tez_proje_id_foreign` FOREIGN KEY (`proje_id`) REFERENCES `proje` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
