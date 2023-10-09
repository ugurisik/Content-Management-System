-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Anamakine: localhost:8889
-- Üretim Zamanı: 09 Eki 2023, 16:24:23
-- Sunucu sürümü: 5.7.39
-- PHP Sürümü: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Veritabanı: `mvc`
--

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `swp_langs`
--

CREATE TABLE `swp_langs` (
  `ID` int(11) NOT NULL,
  `Guid` text NOT NULL,
  `Title` text NOT NULL,
  `SubTitle` text NOT NULL,
  `Img` text,
  `Url` text NOT NULL,
  `Status` tinyint(4) NOT NULL DEFAULT '1',
  `DefaultLang` tinyint(4) NOT NULL DEFAULT '0',
  `Is_Deletable` tinyint(4) NOT NULL DEFAULT '1',
  `CreatedDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `UpdatedDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Tablo döküm verisi `swp_langs`
--

INSERT INTO `swp_langs` (`ID`, `Guid`, `Title`, `SubTitle`, `Img`, `Url`, `Status`, `DefaultLang`, `Is_Deletable`, `CreatedDate`, `UpdatedDate`) VALUES
(6, 'B4E22DBC-699D-0DFC-554E-352B9115C918', 'English', 'EN', '/public/images/2023/blogs/banner/1696715439_qr_code.png', 'en', 1, 0, 0, '2023-10-07 21:18:36', '2023-10-08 09:01:43'),
(8, '515CDF25-2441-0229-F131-F46643D0AF65', 'Türkçe', 'TR', '/public/images/2023/langs/logos/1696758800_flag_of_turkey.svg.jpg', 'tr', 1, 1, 1, '2023-10-08 09:53:21', '2023-10-08 09:53:21');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `swp_user`
--

CREATE TABLE `swp_user` (
  `ID` int(11) NOT NULL,
  `Guid` varchar(255) NOT NULL,
  `UserName` varchar(255) NOT NULL,
  `Email` varchar(255) NOT NULL,
  `Password` text NOT NULL,
  `Role` tinyint(4) NOT NULL DEFAULT '2' COMMENT '0->SuperAdmin 1->Admin 2->User',
  `Status` tinyint(4) NOT NULL DEFAULT '1' COMMENT '0->InActive 1->Active 2->Banned',
  `RequestToken` text,
  `RequestCode` text,
  `RequestDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `LoginToken` text NOT NULL,
  `LoginTry` tinyint(4) NOT NULL DEFAULT '1',
  `ActiveTheme` varchar(255) NOT NULL DEFAULT 'default',
  `CreatedDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `UpdatedDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Tablo döküm verisi `swp_user`
--

INSERT INTO `swp_user` (`ID`, `Guid`, `UserName`, `Email`, `Password`, `Role`, `Status`, `RequestToken`, `RequestCode`, `RequestDate`, `LoginToken`, `LoginTry`, `ActiveTheme`, `CreatedDate`, `UpdatedDate`) VALUES
(1, '123', 'awd', 'abc@def.com', '$2y$10$LetxGTen9UBT6VL4X5jHP.Jgk9RHCdbYMpSDZxLUOWx9zHVJ63Pye', 1, 1, NULL, NULL, '2023-10-02 19:21:04', 'A90B858A-CABA-0F5E-8DCD-A92347D89ADC', 1, 'default', '2023-10-02 19:21:04', '2023-10-02 19:21:04');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `swp_user_log`
--

CREATE TABLE `swp_user_log` (
  `ID` int(11) NOT NULL,
  `Guid` text NOT NULL,
  `UserGuid` varchar(255) NOT NULL,
  `Explain_` text NOT NULL,
  `UserIP` varchar(255) NOT NULL,
  `UserAgent` text NOT NULL,
  `Browser` text NOT NULL,
  `OS` text NOT NULL,
  `BrowserLang` varchar(15) NOT NULL,
  `CreatedDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Tablo döküm verisi `swp_user_log`
--

INSERT INTO `swp_user_log` (`ID`, `Guid`, `UserGuid`, `Explain_`, `UserIP`, `UserAgent`, `Browser`, `OS`, `BrowserLang`, `CreatedDate`) VALUES
(1, '0B568CB7-EC05-0499-99DB-7F3F03BE1F18', '123', 'Giriş Başarılı!', '::1', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/116.0.0.0 Safari/537.36', 'Chrome', 'Mac OS X', 'TR', '2023-10-03 05:46:11'),
(2, 'C50E0650-8357-0EFB-9168-E952CCB5BE04', '123', 'Kullanıcı adı veya şifre hatalı!', '::1', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/116.0.0.0 Safari/537.36', 'Chrome', 'Mac OS X', 'TR', '2023-10-03 05:46:51'),
(3, 'CE9E0B61-7265-08D1-29B8-D026BECEB982', '123', 'Giriş Başarılı!', '::1', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/116.0.0.0 Safari/537.36', 'Chrome', 'Mac OS X', 'TR', '2023-10-03 05:47:24'),
(4, '2C65E791-C6F2-02DF-F9CA-71AE25058450', '123', 'Giriş Başarılı!', '::1', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/116.0.0.0 Safari/537.36', 'Chrome', 'Mac OS X', 'TR', '2023-10-03 05:49:05'),
(5, '24CA7A27-11F8-0E44-B5F1-5ED91EA8F375', '123', 'Giriş Başarılı!', '::1', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/116.0.0.0 Safari/537.36', 'Chrome', 'Mac OS X', 'TR', '2023-10-03 05:51:59'),
(6, 'B975E61C-C004-0F58-39EC-1882EC793D05', '123', 'Giriş Başarılı!', '::1', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/116.0.0.0 Safari/537.36', 'Chrome', 'Mac OS X', 'TR', '2023-10-03 05:52:05'),
(7, 'BFAD1089-42AE-0C57-C500-77C01C7C3D44', '123', 'Giriş Başarılı!', '::1', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/116.0.0.0 Safari/537.36', 'Chrome', 'Mac OS X', 'TR', '2023-10-03 06:05:02'),
(8, 'C0058AD1-3AC0-0683-3D8A-38E5F9668820', '123', 'Giriş Başarılı!', '::1', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/116.0.0.0 Safari/537.36', 'Chrome', 'Mac OS X', 'TR', '2023-10-03 06:05:14'),
(9, '2611D7CD-C68B-04CB-FDE9-DF75AD11B73C', '123', 'Giriş Başarılı!', '::1', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/116.0.0.0 Safari/537.36', 'Chrome', 'Mac OS X', 'TR', '2023-10-03 06:05:15'),
(10, '36FFBD93-059D-0615-8153-48B0693386C9', '123', 'Giriş Başarılı!', '::1', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/116.0.0.0 Safari/537.36', 'Chrome', 'Mac OS X', 'TR', '2023-10-03 06:05:16'),
(11, 'E48A59D2-1692-04E6-9D88-D0D16F057DC6', '123', 'Giriş Başarılı!', '::1', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/116.0.0.0 Safari/537.36', 'Chrome', 'Mac OS X', 'TR', '2023-10-03 06:05:17'),
(12, 'D5AA941B-78EF-040F-FD52-367A5D739166', '123', 'Giriş Başarılı!', '::1', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/116.0.0.0 Safari/537.36', 'Chrome', 'Mac OS X', 'TR', '2023-10-03 06:06:34'),
(13, 'CB1319CB-DEE0-035A-3DA1-4AC996862C02', '123', 'Giriş Başarılı!', '::1', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/116.0.0.0 Safari/537.36', 'Chrome', 'Mac OS X', 'TR', '2023-10-03 06:06:36'),
(14, '2BE2EA89-D789-09DE-D5A2-1837705E4A1D', '123', 'Giriş Başarılı!', '::1', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/116.0.0.0 Safari/537.36', 'Chrome', 'Mac OS X', 'TR', '2023-10-03 06:08:09'),
(15, '000C13CB-4A8C-050D-59C4-CFACE1C53963', '123', 'Giriş Başarılı!', '::1', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/116.0.0.0 Safari/537.36', 'Chrome', 'Mac OS X', 'TR', '2023-10-03 06:08:11'),
(16, '5F9EF8E2-3D11-0984-057F-A5567281A760', '123', 'Giriş Başarılı!', '::1', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/116.0.0.0 Safari/537.36', 'Chrome', 'Mac OS X', 'TR', '2023-10-03 06:08:12'),
(17, '2A62930F-A7B9-05FB-2DCD-E781110E2AD2', '123', 'Giriş Başarılı!', '::1', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/116.0.0.0 Safari/537.36', 'Chrome', 'Mac OS X', 'TR', '2023-10-03 06:08:51'),
(18, 'DEE6CD94-EF6A-014F-6575-BB1B60F94EF4', '123', 'Giriş Başarılı!', '::1', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/116.0.0.0 Safari/537.36', 'Chrome', 'Mac OS X', 'TR', '2023-10-03 06:08:52'),
(19, '6BC2D6E7-54EF-045E-9DBE-19FAD9EFFA9D', '123', 'Giriş Başarılı!', '::1', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/116.0.0.0 Safari/537.36', 'Chrome', 'Mac OS X', 'TR', '2023-10-03 06:08:53'),
(20, 'B9219C49-6F04-0B7C-E52C-6FE413B57EFB', '123', 'Giriş Başarılı!', '::1', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/116.0.0.0 Safari/537.36', 'Chrome', 'Mac OS X', 'TR', '2023-10-03 06:13:58'),
(21, '3D64077B-1130-05E1-8DC8-CAEEB555AC6E', '123', 'Giriş Başarılı!', '::1', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/116.0.0.0 Safari/537.36', 'Chrome', 'Mac OS X', 'TR', '2023-10-03 06:14:01'),
(22, '4F6EE484-4AB4-0A00-61FB-842197AD40AE', '123', 'Giriş Başarılı!', '::1', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/116.0.0.0 Safari/537.36', 'Chrome', 'Mac OS X', 'TR', '2023-10-03 06:14:02'),
(23, 'C6E0055D-FAC7-09BA-1DC1-FDB2A9FC14AD', '123', 'Giriş Başarılı!', '::1', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/116.0.0.0 Safari/537.36', 'Chrome', 'Mac OS X', 'TR', '2023-10-03 10:20:48'),
(24, '3A4E7CCE-48D9-045B-F557-D5AA38D8F412', '123', 'Giriş Başarılı!', '::1', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/116.0.0.0 Safari/537.36', 'Chrome', 'Mac OS X', 'TR', '2023-10-03 10:20:51'),
(25, '31E8B777-5716-06F2-4D87-FC67E88F8A5A', '123', 'Giriş Başarılı!', '::1', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/116.0.0.0 Safari/537.36', 'Chrome', 'Mac OS X', 'TR', '2023-10-03 10:20:52'),
(26, '6C20F225-DE82-0285-0D1D-6A4E46655F8E', '123', 'Giriş Başarılı!', '::1', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/116.0.0.0 Safari/537.36', 'Chrome', 'Mac OS X', 'TR', '2023-10-03 10:24:34'),
(27, 'CBE7452D-3AC4-0C8E-71C1-2B30CDD14145', 'milad', 'Kullanıcı bulunamadı!', '::1', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/116.0.0.0 Safari/537.36', 'Chrome', 'Mac OS X', 'TR', '2023-10-03 11:34:42'),
(28, '91275B68-B4DD-0AA2-2D8C-6ACC4E3F6085', 'milad', 'Kullanıcı bulunamadı!', '::1', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/116.0.0.0 Safari/537.36', 'Chrome', 'Mac OS X', 'TR', '2023-10-03 11:34:55'),
(29, '01D20C42-96E4-0BD1-75CB-93C825A7E54C', 'awd', 'Kullanıcı adı veya şifre hatalı!', '::1', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/116.0.0.0 Safari/537.36', 'Chrome', 'Mac OS X', 'TR', '2023-10-03 11:35:05'),
(30, '17C21A13-8C32-0FD6-15DB-9A8C5B566186', 'awd', 'Kullanıcı adı veya şifre hatalı!', '::1', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/116.0.0.0 Safari/537.36', 'Chrome', 'Mac OS X', 'TR', '2023-10-03 11:35:07'),
(31, 'A6521753-1AAD-0E78-9DD5-4D62B54A60B5', 'awd', 'Hatalı giriş denemesi sebebiyle hesabınız 15 dakika boyunca askıya alınmıştır!', '::1', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/116.0.0.0 Safari/537.36', 'Chrome', 'Mac OS X', 'TR', '2023-10-03 11:35:09'),
(32, '9557DB42-BA68-0D55-19D3-8BE459F705CC', 'awd', 'Giriş Başarılı!', '::1', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/116.0.0.0 Safari/537.36', 'Chrome', 'Mac OS X', 'TR', '2023-10-03 11:37:09'),
(33, '5F395488-D976-0558-29AA-AF2673A9F006', 'awd', 'Giriş Başarılı!', '::1', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/116.0.0.0 Safari/537.36', 'Chrome', 'Mac OS X', 'TR', '2023-10-04 01:52:39'),
(34, 'E30ABE74-15BE-0738-1DF9-48AF1E60B962', 'awd', 'Giriş Başarılı!', '::1', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/116.0.0.0 Safari/537.36', 'Chrome', 'Mac OS X', 'TR', '2023-10-04 01:52:57'),
(35, '7E896BC0-2CDB-05A7-E1DF-EBE0C9A48E86', 'awd', 'Giriş Başarılı!', '::1', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/116.0.0.0 Safari/537.36', 'Chrome', 'Mac OS X', 'TR', '2023-10-04 03:49:41'),
(36, '69BC5400-2D20-0937-7906-4BC34047CEF4', 'awd', 'Giriş Başarılı!', '::1', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/116.0.0.0 Safari/537.36', 'Chrome', 'Mac OS X', 'TR', '2023-10-07 12:40:41'),
(37, 'EF7538DE-4031-0B03-69E0-8A1976C8027A', 'awd', 'Giriş Başarılı!', '::1', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/116.0.0.0 Safari/537.36', 'Chrome', 'Mac OS X', 'TR', '2023-10-07 12:40:51'),
(38, '48B8BFB6-1750-09B2-75EF-83E21EFCB1E4', 'awd', 'Giriş Başarılı!', '::1', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/116.0.0.0 Safari/537.36', 'Chrome', 'Mac OS X', 'TR', '2023-10-07 13:59:10'),
(39, 'BE90690D-1511-05BE-0146-E52137DE3C2A', 'awd', 'Giriş Başarılı!', '::1', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/116.0.0.0 Safari/537.36', 'Chrome', 'Mac OS X', 'TR', '2023-10-07 14:22:09'),
(40, '7F7860BD-59CA-0B16-A589-25D357A12D2F', 'awd', 'Giriş Başarılı!', '::1', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/116.0.0.0 Safari/537.36', 'Chrome', 'Mac OS X', 'TR', '2023-10-07 15:22:57'),
(41, '56412106-F718-0206-8D1B-F3ABC24C52EF', 'awd', 'Giriş Başarılı!', '::1', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/116.0.0.0 Safari/537.36', 'Chrome', 'Mac OS X', 'TR', '2023-10-07 20:15:54'),
(42, 'A0C2872E-999A-02B5-111B-D31EAB651998', 'awd', 'Giriş Başarılı!', '::1', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/116.0.0.0 Safari/537.36', 'Chrome', 'Mac OS X', 'TR', '2023-10-07 21:18:11'),
(43, '7878BBD1-3C9A-062E-51FE-67CA6E223CF1', 'awd', 'Giriş Başarılı!', '::1', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/116.0.0.0 Safari/537.36', 'Chrome', 'Mac OS X', 'TR', '2023-10-08 05:11:46'),
(44, 'FEACA5D4-2CFB-009D-1D18-941D8ECB4F7C', 'awd', 'Giriş Başarılı!', '::1', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/116.0.0.0 Safari/537.36', 'Chrome', 'Mac OS X', 'TR', '2023-10-08 06:13:29'),
(45, 'BB43ABCC-4F55-093C-4565-0D0BCB641CC6', 'awd', 'Giriş Başarılı!', '::1', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/116.0.0.0 Safari/537.36', 'Chrome', 'Mac OS X', 'TR', '2023-10-08 07:16:19'),
(46, '86FC9438-2925-02C6-F954-B5109B32D3CF', 'awd', 'Giriş Başarılı!', '::1', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/116.0.0.0 Safari/537.36', 'Chrome', 'Mac OS X', 'TR', '2023-10-08 07:30:31'),
(47, 'BE39FB20-805C-0903-E9EF-7E884652C42D', 'awd', 'Giriş Başarılı!', '::1', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/116.0.0.0 Safari/537.36', 'Chrome', 'Mac OS X', 'TR', '2023-10-08 08:48:50'),
(48, 'A6A4FF6C-377A-058C-E9CB-7D9CD0E24938', 'awd', 'Giriş Başarılı!', '::1', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/116.0.0.0 Safari/537.36', 'Chrome', 'Mac OS X', 'TR', '2023-10-08 09:01:57'),
(49, 'A58D9E1E-5699-005A-9522-43ECBB474D2B', 'awd', 'Giriş Başarılı!', '::1', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/116.0.0.0 Safari/537.36', 'Chrome', 'Mac OS X', 'TR', '2023-10-08 09:03:00'),
(50, '25DE88E7-05A4-07CC-1DB4-326D1971551A', 'awd', 'Giriş Başarılı!', '::1', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/116.0.0.0 Safari/537.36', 'Chrome', 'Mac OS X', 'TR', '2023-10-08 09:08:34'),
(51, '775EB439-571B-0EE1-BDC0-433ED97A0427', 'awd', 'Giriş Başarılı!', '::1', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/116.0.0.0 Safari/537.36', 'Chrome', 'Mac OS X', 'TR', '2023-10-08 10:45:21'),
(52, 'AFB48276-1F20-0082-89D2-BD344D650381', 'awd', 'Giriş Başarılı!', '::1', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/116.0.0.0 Safari/537.36', 'Chrome', 'Mac OS X', 'TR', '2023-10-08 11:45:28'),
(53, 'B79CB2F6-7F61-0DCE-21FB-D2CBE8712420', 'awd', 'Giriş Başarılı!', '::1', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/116.0.0.0 Safari/537.36', 'Chrome', 'Mac OS X', 'TR', '2023-10-08 13:05:26'),
(54, '5351C426-062F-042B-6120-EF1B5410FE48', 'awd', 'Giriş Başarılı!', '::1', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/116.0.0.0 Safari/537.36', 'Chrome', 'Mac OS X', 'TR', '2023-10-08 16:07:58'),
(55, '559D86E0-C3D5-0200-A12D-309261474B12', 'awd', 'Giriş Başarılı!', '::1', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/116.0.0.0 Safari/537.36', 'Chrome', 'Mac OS X', 'TR', '2023-10-08 16:25:23'),
(56, 'B97C7317-3597-0EA3-B1E6-C79A242A798E', 'awd', 'Giriş Başarılı!', '::1', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/116.0.0.0 Safari/537.36', 'Chrome', 'Mac OS X', 'TR', '2023-10-08 16:30:48'),
(57, '43242C3E-BFDE-031E-E51E-1361E99A823A', 'awd', 'Giriş Başarılı!', '::1', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/116.0.0.0 Safari/537.36', 'Chrome', 'Mac OS X', 'TR', '2023-10-08 19:03:37'),
(58, 'DBED9BFE-FBA8-08E0-0552-F04CD7304DF2', 'awd', 'Kullanıcı adı veya şifre hatalı!', '::1', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/116.0.0.0 Safari/537.36', 'Chrome', 'Mac OS X', 'TR', '2023-10-08 19:58:11'),
(59, '645EA3AD-E9A3-06B8-ED87-F85EC13747F1', 'awd', 'Giriş Başarılı!', '::1', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/116.0.0.0 Safari/537.36', 'Chrome', 'Mac OS X', 'TR', '2023-10-08 19:58:15'),
(60, 'CA615755-173E-0B87-31ED-BB3FE624DA6E', 'awd', 'Giriş Başarılı!', '::1', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/116.0.0.0 Safari/537.36', 'Chrome', 'Mac OS X', 'TR', '2023-10-09 11:30:15'),
(61, 'BF45A2D0-1D95-04DC-0509-657645D64D4F', 'awd', 'Giriş Başarılı!', '::1', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/116.0.0.0 Safari/537.36', 'Chrome', 'Mac OS X', 'TR', '2023-10-09 12:30:21'),
(62, 'FBF54F08-BC2B-01A6-DD3B-C269ABA13B18', 'awd', 'Giriş Başarılı!', '::1', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/116.0.0.0 Safari/537.36', 'Chrome', 'Mac OS X', 'TR', '2023-10-09 15:58:40');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `swp_user_login_ban`
--

CREATE TABLE `swp_user_login_ban` (
  `ID` int(11) NOT NULL,
  `Guid` text NOT NULL,
  `StartDate` datetime NOT NULL,
  `EndDate` datetime NOT NULL,
  `UserIP` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Tablo döküm verisi `swp_user_login_ban`
--

INSERT INTO `swp_user_login_ban` (`ID`, `Guid`, `StartDate`, `EndDate`, `UserIP`) VALUES
(1, 'B4B44CB0-6E28-0676-B9E5-7825A2EA4175', '2023-10-03 05:12:05', '2023-10-03 05:27:05', '::1'),
(2, 'D108A4F8-8BB8-0FF5-F50E-98A310182C56', '2023-10-03 05:12:29', '2023-10-03 05:27:29', '::1'),
(3, 'F25FF9CC-4839-056B-6DD7-C5996B3F569C', '2023-10-03 05:12:29', '2023-10-03 05:27:29', '::1'),
(4, '5351D350-DA69-0B42-1987-1FB04777B4CF', '2023-10-03 05:12:30', '2023-10-03 05:27:30', '::1'),
(5, 'C4CCB20F-B4D8-02AF-8552-4D0AA8E59F2E', '2023-10-03 08:13:25', '2023-10-03 08:28:25', '::1'),
(6, '870864DA-4708-05FD-CDAF-CEF0FD7AC57D', '2023-10-03 08:16:24', '2023-10-03 08:31:24', '::1'),
(7, '0892ED4C-8BAE-0321-2DB8-DDB4AC216B25', '2023-10-03 08:16:28', '2023-10-03 08:11:28', '::1'),
(8, '9740CE87-18DD-087F-A990-6F7F72A333BD', '2023-10-03 08:18:44', '2023-10-03 08:24:44', '::1'),
(9, '293EF77E-C697-092E-B506-4D1D403BA59D', '2023-10-03 14:35:09', '2023-10-03 14:30:09', '::1');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `swp_user_login_error`
--

CREATE TABLE `swp_user_login_error` (
  `ID` int(11) NOT NULL,
  `Guid` varchar(255) NOT NULL,
  `UserGuid` varchar(255) NOT NULL,
  `UserName_Mail` text NOT NULL,
  `Password` text NOT NULL,
  `Browser` text NOT NULL,
  `BrowserLang` varchar(15) NOT NULL,
  `OS` text NOT NULL,
  `IP` varchar(255) NOT NULL,
  `UserAgent` text NOT NULL,
  `Location` text NOT NULL,
  `CreatedDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Tablo döküm verisi `swp_user_login_error`
--

INSERT INTO `swp_user_login_error` (`ID`, `Guid`, `UserGuid`, `UserName_Mail`, `Password`, `Browser`, `BrowserLang`, `OS`, `IP`, `UserAgent`, `Location`, `CreatedDate`) VALUES
(1, '25549D6B-30F0-0D55-CD59-03F35A3B1000', '123', 'abc@def.com', 'your_password_here1', 'Chrome', 'TR', 'Mac OS X', '::1', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/116.0.0.0 Safari/537.36', '-', '2023-10-03 05:10:49'),
(2, 'DC109952-D0D5-0B36-E541-59D66EBD8877', '123', 'abc@def.com', 'your_password_here1', 'Chrome', 'TR', 'Mac OS X', '::1', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/116.0.0.0 Safari/537.36', '-', '2023-10-03 05:11:17'),
(3, '310726A5-B486-005D-2188-49D6377EE79E', '123', 'abc@def.com', 'your_password_here2', 'Chrome', 'TR', 'Mac OS X', '::1', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/116.0.0.0 Safari/537.36', '-', '2023-10-03 05:46:51'),
(4, '6E12DB1C-4C0B-0F8D-E15F-1768703F79F9', '123', 'awd', 'Milo!2020', 'Chrome', 'TR', 'Mac OS X', '::1', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/116.0.0.0 Safari/537.36', '-', '2023-10-03 11:35:05'),
(5, 'EA87151F-18AC-0048-2988-B1AFEB6D6552', '123', 'awd', 'Milo!2020', 'Chrome', 'TR', 'Mac OS X', '::1', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/116.0.0.0 Safari/537.36', '-', '2023-10-03 11:35:07'),
(6, '615124E6-02C7-0B3C-29D1-FEE6A1AB87D9', '123', 'awd', 'your_password_herew', 'Chrome', 'TR', 'Mac OS X', '::1', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/116.0.0.0 Safari/537.36', '-', '2023-10-08 19:58:11');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `swp_user_login_info`
--

CREATE TABLE `swp_user_login_info` (
  `ID` int(11) NOT NULL,
  `Guid` varchar(255) NOT NULL,
  `UserGuid` varchar(255) NOT NULL,
  `Browser` text NOT NULL,
  `BrowserLang` varchar(15) NOT NULL,
  `OS` text NOT NULL,
  `IP` varchar(255) NOT NULL,
  `UserAgent` text NOT NULL,
  `Location` text NOT NULL,
  `CreatedDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Tablo döküm verisi `swp_user_login_info`
--

INSERT INTO `swp_user_login_info` (`ID`, `Guid`, `UserGuid`, `Browser`, `BrowserLang`, `OS`, `IP`, `UserAgent`, `Location`, `CreatedDate`) VALUES
(1, 'FF644528-CF7C-0DEB-65A1-F7D31F7A386D', '123', 'Chrome', 'TR', 'Mac OS X', '::1', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/116.0.0.0 Safari/537.36', '{\"status\":\"fail\",\"message\":\"reserved range\",\"query\":\"::1\"}', '2023-10-03 04:47:03'),
(2, '3033752E-20F9-03ED-F971-B0954966BCE8', '123', 'Chrome', 'TR', 'Mac OS X', '::1', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/116.0.0.0 Safari/537.36', '-', '2023-10-03 04:48:11'),
(3, 'DBF33F90-B8DF-0F50-F1EC-58437567095D', '123', 'Chrome', 'TR', 'Mac OS X', '::1', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/116.0.0.0 Safari/537.36', '-', '2023-10-03 05:09:58'),
(4, '0C57DE66-2454-0FD8-A1AA-E6F44EE2CDDB', '123', 'Chrome', 'TR', 'Mac OS X', '::1', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/116.0.0.0 Safari/537.36', '-', '2023-10-03 05:09:58'),
(5, '241CC5DA-7192-00A7-618F-B44B98E3331B', '123', 'Chrome', 'TR', 'Mac OS X', '::1', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/116.0.0.0 Safari/537.36', '-', '2023-10-03 05:09:59'),
(6, 'CE998ACC-6A3A-0354-6192-C0753C6EDD67', '123', 'Chrome', 'TR', 'Mac OS X', '::1', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/116.0.0.0 Safari/537.36', '-', '2023-10-03 05:09:59'),
(7, 'B97C5251-6354-0D65-D1C0-1BD2C43C81BA', '123', 'Chrome', 'TR', 'Mac OS X', '::1', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/116.0.0.0 Safari/537.36', '-', '2023-10-03 05:09:59'),
(8, 'BF8DCFEC-8DB4-0191-F1BD-108DD2B1B01E', '123', 'Chrome', 'TR', 'Mac OS X', '::1', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/116.0.0.0 Safari/537.36', '-', '2023-10-03 05:10:00'),
(9, '00B4BCA8-10D8-0EF0-45A4-6E269E4A5170', '123', 'Chrome', 'TR', 'Mac OS X', '::1', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/116.0.0.0 Safari/537.36', '-', '2023-10-03 05:10:01'),
(10, 'B715CF64-9752-0775-F93D-6856371CAB38', '123', 'Chrome', 'TR', 'Mac OS X', '::1', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/116.0.0.0 Safari/537.36', '-', '2023-10-03 05:10:02'),
(11, 'BF47CEA3-FB4D-0AE0-A5DA-20C253906190', '123', 'Chrome', 'TR', 'Mac OS X', '::1', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/116.0.0.0 Safari/537.36', '-', '2023-10-03 05:10:02'),
(12, '3AC08664-A103-04B1-FDF2-146F974EB9A3', '123', 'Chrome', 'TR', 'Mac OS X', '::1', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/116.0.0.0 Safari/537.36', '-', '2023-10-03 05:10:03'),
(13, 'B4D82C84-F13A-09A2-6D54-2F8B34C21F45', '123', 'Chrome', 'TR', 'Mac OS X', '::1', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/116.0.0.0 Safari/537.36', '-', '2023-10-03 05:10:04'),
(14, '1830EF79-DDC4-0BF4-5DA4-92FF449F86DA', '123', 'Chrome', 'TR', 'Mac OS X', '::1', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/116.0.0.0 Safari/537.36', '-', '2023-10-03 05:24:44'),
(15, '54DB0877-3D6B-047A-3DAB-50A46852F9BA', '123', 'Chrome', 'TR', 'Mac OS X', '::1', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/116.0.0.0 Safari/537.36', '-', '2023-10-03 05:24:44'),
(16, 'C864CAF5-07FF-0727-81DB-40FA644B7F41', '123', 'Chrome', 'TR', 'Mac OS X', '::1', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/116.0.0.0 Safari/537.36', '-', '2023-10-03 05:24:45'),
(17, '208DC67B-1A75-019C-BD3E-C6EC06C51CFC', '123', 'Chrome', 'TR', 'Mac OS X', '::1', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/116.0.0.0 Safari/537.36', '-', '2023-10-03 05:24:45'),
(18, 'AEC2951B-3E4B-0A67-B590-85ACA445C7A7', '123', 'Chrome', 'TR', 'Mac OS X', '::1', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/116.0.0.0 Safari/537.36', '-', '2023-10-03 05:24:45'),
(19, '4144B769-C1E2-0136-CD6D-39A158EDD7AD', '123', 'Chrome', 'TR', 'Mac OS X', '::1', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/116.0.0.0 Safari/537.36', '-', '2023-10-03 05:24:46'),
(20, '669A09C4-0F26-06AC-55CB-6347CEE8DE5F', '123', 'Chrome', 'TR', 'Mac OS X', '::1', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/116.0.0.0 Safari/537.36', '-', '2023-10-03 05:24:46'),
(21, '93E76069-EF1E-0A0A-BD52-40952284F889', '123', 'Chrome', 'TR', 'Mac OS X', '::1', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/116.0.0.0 Safari/537.36', '-', '2023-10-03 05:24:46'),
(22, '7B8D59C1-409B-076B-C59A-87F843944478', '123', 'Chrome', 'TR', 'Mac OS X', '::1', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/116.0.0.0 Safari/537.36', '-', '2023-10-03 05:24:47'),
(23, 'C65CDD83-DCFA-0DC5-61FA-E8B1E661286E', '123', 'Chrome', 'TR', 'Mac OS X', '::1', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/116.0.0.0 Safari/537.36', '-', '2023-10-03 05:24:47'),
(24, '40402D3E-68F2-09A4-0D09-3672B4564CFC', '123', 'Chrome', 'TR', 'Mac OS X', '::1', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/116.0.0.0 Safari/537.36', '-', '2023-10-03 05:24:48'),
(25, '0D41CE0C-5226-0B7D-E59A-64EBA993B9E8', '123', 'Chrome', 'TR', 'Mac OS X', '::1', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/116.0.0.0 Safari/537.36', '-', '2023-10-03 05:24:48'),
(26, '6BCE7D51-F25B-0C6E-D97A-80631EEAFC23', '123', 'Chrome', 'TR', 'Mac OS X', '::1', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/116.0.0.0 Safari/537.36', '-', '2023-10-03 05:24:48'),
(27, '3263CACE-43B2-0DB2-C578-9E295830B530', '123', 'Chrome', 'TR', 'Mac OS X', '::1', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/116.0.0.0 Safari/537.36', '-', '2023-10-03 05:24:49'),
(28, '25D4763B-BF0A-060B-816C-692D062F3D64', '123', 'Chrome', 'TR', 'Mac OS X', '::1', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/116.0.0.0 Safari/537.36', '-', '2023-10-03 05:24:53'),
(29, '098C05CD-B4CB-0CE4-E1CC-6D5E76C20AD0', '123', 'Chrome', 'TR', 'Mac OS X', '::1', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/116.0.0.0 Safari/537.36', '-', '2023-10-03 05:34:52'),
(30, '5FEB6D0E-24E1-0DAE-CDBA-8DEB12EDC328', '123', 'Chrome', 'TR', 'Mac OS X', '::1', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/116.0.0.0 Safari/537.36', '-', '2023-10-03 05:39:22'),
(31, '4C8C547D-61A2-0C34-E16A-7FB9FF4E9965', '123', 'Chrome', 'TR', 'Mac OS X', '::1', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/116.0.0.0 Safari/537.36', '-', '2023-10-03 05:40:51'),
(32, '7DDDD7DD-5CDA-052C-F936-74E3F15EEE0E', '123', 'Chrome', 'TR', 'Mac OS X', '::1', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/116.0.0.0 Safari/537.36', '-', '2023-10-03 05:41:23'),
(33, '12E10B15-A1A9-02D1-7548-9DE7101B028A', '123', 'Chrome', 'TR', 'Mac OS X', '::1', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/116.0.0.0 Safari/537.36', '-', '2023-10-03 05:41:28'),
(34, '912FC210-93FD-0C89-65C4-AD7184D1A945', '123', 'Chrome', 'TR', 'Mac OS X', '::1', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/116.0.0.0 Safari/537.36', '-', '2023-10-03 05:41:33'),
(35, '40B94F27-E51C-07C9-1D62-20327D163C7E', '123', 'Chrome', 'TR', 'Mac OS X', '::1', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/116.0.0.0 Safari/537.36', '-', '2023-10-03 05:46:11'),
(36, '44FEA399-C053-0424-3D92-6F4941DF5828', '123', 'Chrome', 'TR', 'Mac OS X', '::1', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/116.0.0.0 Safari/537.36', '-', '2023-10-03 05:47:24'),
(37, '9929981F-5288-06B7-79EA-72F1661DD2B4', '123', 'Chrome', 'TR', 'Mac OS X', '::1', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/116.0.0.0 Safari/537.36', '-', '2023-10-03 05:49:05'),
(38, '2ECA0D51-8B1B-083D-9932-C0DFE82C966E', '123', 'Chrome', 'TR', 'Mac OS X', '::1', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/116.0.0.0 Safari/537.36', '-', '2023-10-03 05:51:59'),
(39, 'CEB28774-B4ED-0462-F9FF-83ACE4F732BA', '123', 'Chrome', 'TR', 'Mac OS X', '::1', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/116.0.0.0 Safari/537.36', '-', '2023-10-03 05:52:05'),
(40, '28D5BA22-84C5-053F-FDC8-A03A5A3DEEE6', '123', 'Chrome', 'TR', 'Mac OS X', '::1', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/116.0.0.0 Safari/537.36', '-', '2023-10-03 06:05:02'),
(41, '8FA078D2-10EA-0F54-952C-D08ED98E3840', '123', 'Chrome', 'TR', 'Mac OS X', '::1', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/116.0.0.0 Safari/537.36', '-', '2023-10-03 06:05:14'),
(42, 'ED21E127-6308-0621-19ED-84489F02C7DA', '123', 'Chrome', 'TR', 'Mac OS X', '::1', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/116.0.0.0 Safari/537.36', '-', '2023-10-03 06:05:15'),
(43, '5D5C868F-1415-0C22-81A3-90E29319BB69', '123', 'Chrome', 'TR', 'Mac OS X', '::1', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/116.0.0.0 Safari/537.36', '-', '2023-10-03 06:05:16'),
(44, 'CEC185F1-D004-0C04-C9C3-1A30A227668B', '123', 'Chrome', 'TR', 'Mac OS X', '::1', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/116.0.0.0 Safari/537.36', '-', '2023-10-03 06:05:17'),
(45, '65C91C3D-6CF5-0B2A-8184-E7BA82E52E98', '123', 'Chrome', 'TR', 'Mac OS X', '::1', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/116.0.0.0 Safari/537.36', '-', '2023-10-03 06:06:34'),
(46, 'A9FE8E85-2E81-01B3-3964-25D460E4651F', '123', 'Chrome', 'TR', 'Mac OS X', '::1', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/116.0.0.0 Safari/537.36', '-', '2023-10-03 06:06:36'),
(47, 'ABCFEF8B-DA49-0C02-2DB6-36F259100AD2', '123', 'Chrome', 'TR', 'Mac OS X', '::1', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/116.0.0.0 Safari/537.36', '-', '2023-10-03 06:08:09'),
(48, '8AAEC641-6087-096D-A56A-0E9158EBC447', '123', 'Chrome', 'TR', 'Mac OS X', '::1', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/116.0.0.0 Safari/537.36', '-', '2023-10-03 06:08:11'),
(49, '10E8F708-987C-05D2-CDFD-4735CC5C5E44', '123', 'Chrome', 'TR', 'Mac OS X', '::1', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/116.0.0.0 Safari/537.36', '-', '2023-10-03 06:08:12'),
(50, '16C0DA20-302B-0BC6-218C-7E6DA6913CC8', '123', 'Chrome', 'TR', 'Mac OS X', '::1', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/116.0.0.0 Safari/537.36', '-', '2023-10-03 06:08:51'),
(51, '47E3F337-CC46-08FB-1D4D-3EE788326660', '123', 'Chrome', 'TR', 'Mac OS X', '::1', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/116.0.0.0 Safari/537.36', '-', '2023-10-03 06:08:52'),
(52, '902029D5-E40F-00D2-B5F6-D47A398BB799', '123', 'Chrome', 'TR', 'Mac OS X', '::1', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/116.0.0.0 Safari/537.36', '-', '2023-10-03 06:08:53'),
(53, 'D1771F11-BF2C-0B41-1138-5E9C14867771', '123', 'Chrome', 'TR', 'Mac OS X', '::1', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/116.0.0.0 Safari/537.36', '-', '2023-10-03 06:13:58'),
(54, '20BF94A7-9326-0819-7521-7029CE0551E8', '123', 'Chrome', 'TR', 'Mac OS X', '::1', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/116.0.0.0 Safari/537.36', '-', '2023-10-03 06:14:01'),
(55, '367C71B4-B8E2-0EB2-35B3-BD73D544503E', '123', 'Chrome', 'TR', 'Mac OS X', '::1', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/116.0.0.0 Safari/537.36', '-', '2023-10-03 06:14:02'),
(56, 'DE72F0C8-1AEC-06E8-591A-A8B5304B670C', '123', 'Chrome', 'TR', 'Mac OS X', '::1', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/116.0.0.0 Safari/537.36', '-', '2023-10-03 10:20:48'),
(57, '885A62F2-8D23-0857-F5E9-7EACA6D46472', '123', 'Chrome', 'TR', 'Mac OS X', '::1', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/116.0.0.0 Safari/537.36', '-', '2023-10-03 10:20:51'),
(58, 'D7840465-A437-0FD1-8145-6C095AD174F8', '123', 'Chrome', 'TR', 'Mac OS X', '::1', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/116.0.0.0 Safari/537.36', '-', '2023-10-03 10:20:52'),
(59, 'E3A83C8E-B977-0F19-65D0-42BF59043067', '123', 'Chrome', 'TR', 'Mac OS X', '::1', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/116.0.0.0 Safari/537.36', '-', '2023-10-03 10:24:34'),
(60, 'B1D51261-FE8D-0488-712F-49232D5EE6C1', '123', 'Chrome', 'TR', 'Mac OS X', '::1', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/116.0.0.0 Safari/537.36', '-', '2023-10-03 11:37:09'),
(61, '4ACA689D-B6B3-00A5-35E4-F1ED26E4DDF0', '123', 'Chrome', 'TR', 'Mac OS X', '::1', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/116.0.0.0 Safari/537.36', '-', '2023-10-04 01:52:39'),
(62, '03811E99-039C-0EB2-FD1B-6EE9074CCC97', '123', 'Chrome', 'TR', 'Mac OS X', '::1', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/116.0.0.0 Safari/537.36', '-', '2023-10-04 01:52:57'),
(63, '2B292CD4-A9A4-086E-8591-D4BAA81C6F59', '123', 'Chrome', 'TR', 'Mac OS X', '::1', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/116.0.0.0 Safari/537.36', '-', '2023-10-04 03:49:41'),
(64, 'E5332EF4-63F9-0166-A90F-A3C2C0333784', '123', 'Chrome', 'TR', 'Mac OS X', '::1', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/116.0.0.0 Safari/537.36', '-', '2023-10-07 12:40:41'),
(65, 'AC19DCBF-89AE-0F6A-0D4C-84F21D259C2B', '123', 'Chrome', 'TR', 'Mac OS X', '::1', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/116.0.0.0 Safari/537.36', '-', '2023-10-07 12:40:51'),
(66, 'F522FD5C-9DC1-078C-1D09-F16FBA62332B', '123', 'Chrome', 'TR', 'Mac OS X', '::1', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/116.0.0.0 Safari/537.36', '-', '2023-10-07 13:59:10'),
(67, '7C9C8FB9-BEA0-0E2F-11B5-9E640806F28E', '123', 'Chrome', 'TR', 'Mac OS X', '::1', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/116.0.0.0 Safari/537.36', '-', '2023-10-07 14:22:09'),
(68, '73664482-4A93-0136-D574-8694D50987AB', '123', 'Chrome', 'TR', 'Mac OS X', '::1', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/116.0.0.0 Safari/537.36', '-', '2023-10-07 15:22:57'),
(69, '02CA82E6-4BD6-0093-611E-37B3773BD902', '123', 'Chrome', 'TR', 'Mac OS X', '::1', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/116.0.0.0 Safari/537.36', '-', '2023-10-07 20:15:54'),
(70, '59A1E37A-D817-08D4-D97D-BBE84843628A', '123', 'Chrome', 'TR', 'Mac OS X', '::1', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/116.0.0.0 Safari/537.36', '-', '2023-10-07 21:18:11'),
(71, '04AA3AF2-FDA2-02B5-99E9-4B26156107D5', '123', 'Chrome', 'TR', 'Mac OS X', '::1', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/116.0.0.0 Safari/537.36', '-', '2023-10-08 05:11:46'),
(72, 'B8D1F055-D207-062C-0124-104AB38C7275', '123', 'Chrome', 'TR', 'Mac OS X', '::1', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/116.0.0.0 Safari/537.36', '-', '2023-10-08 06:13:29'),
(73, '2C99271F-B3F0-0C3B-9142-AA4374E8A427', '123', 'Chrome', 'TR', 'Mac OS X', '::1', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/116.0.0.0 Safari/537.36', '-', '2023-10-08 07:16:19'),
(74, 'D1410C8E-6A8D-0D48-BDCF-231A915382BC', '123', 'Chrome', 'TR', 'Mac OS X', '::1', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/116.0.0.0 Safari/537.36', '-', '2023-10-08 07:30:31'),
(75, '33740494-978A-036E-E10A-6E3B3A3B99C9', '123', 'Chrome', 'TR', 'Mac OS X', '::1', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/116.0.0.0 Safari/537.36', '-', '2023-10-08 08:48:50'),
(76, 'AE1ED1C0-A480-0E32-C529-E3DFC6E4B97A', '123', 'Chrome', 'TR', 'Mac OS X', '::1', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/116.0.0.0 Safari/537.36', '-', '2023-10-08 09:01:57'),
(77, '1BAA2898-2BCA-0063-2D12-C0BCC2DC79D6', '123', 'Chrome', 'TR', 'Mac OS X', '::1', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/116.0.0.0 Safari/537.36', '-', '2023-10-08 09:03:00'),
(78, 'E3E1560B-DE3E-0597-5DD0-543614A14FA7', '123', 'Chrome', 'TR', 'Mac OS X', '::1', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/116.0.0.0 Safari/537.36', '-', '2023-10-08 09:08:34'),
(79, '8AEEAC3F-7926-0B9E-456F-680DF8506BB6', '123', 'Chrome', 'TR', 'Mac OS X', '::1', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/116.0.0.0 Safari/537.36', '-', '2023-10-08 10:45:21'),
(80, 'ED76AA18-DF27-0231-1D54-6CFE8CAE13CB', '123', 'Chrome', 'TR', 'Mac OS X', '::1', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/116.0.0.0 Safari/537.36', '-', '2023-10-08 11:45:28'),
(81, '91E899AF-FB19-0A62-E51E-55C4D01355A9', '123', 'Chrome', 'TR', 'Mac OS X', '::1', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/116.0.0.0 Safari/537.36', '-', '2023-10-08 13:05:26'),
(82, '67C86F92-8673-051C-693E-325AD73EE88A', '123', 'Chrome', 'TR', 'Mac OS X', '::1', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/116.0.0.0 Safari/537.36', '-', '2023-10-08 16:07:58'),
(83, 'F6B2F8D1-D53A-00CF-6D41-0B68BD714BA2', '123', 'Chrome', 'TR', 'Mac OS X', '::1', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/116.0.0.0 Safari/537.36', '-', '2023-10-08 16:25:23'),
(84, '0B6513BF-6774-02FD-91FC-E93325492042', '123', 'Chrome', 'TR', 'Mac OS X', '::1', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/116.0.0.0 Safari/537.36', '-', '2023-10-08 16:30:48'),
(85, 'FEA58E0C-2C75-0953-2DEA-2AF51B26DA4E', '123', 'Chrome', 'TR', 'Mac OS X', '::1', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/116.0.0.0 Safari/537.36', '-', '2023-10-08 19:03:37'),
(86, '2388A538-E645-023B-01AC-322100BCF5D1', '123', 'Chrome', 'TR', 'Mac OS X', '::1', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/116.0.0.0 Safari/537.36', '-', '2023-10-08 19:58:15'),
(87, '1140CFF4-7B12-0BCD-3D95-A685554648C9', '123', 'Chrome', 'TR', 'Mac OS X', '::1', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/116.0.0.0 Safari/537.36', '-', '2023-10-09 11:30:15'),
(88, 'D65958B1-1943-0251-1D4C-2C54CE6A7C30', '123', 'Chrome', 'TR', 'Mac OS X', '::1', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/116.0.0.0 Safari/537.36', '-', '2023-10-09 12:30:21'),
(89, '01317C9E-97F7-043D-2597-8421F55B347F', '123', 'Chrome', 'TR', 'Mac OS X', '::1', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/116.0.0.0 Safari/537.36', '-', '2023-10-09 15:58:40');

--
-- Dökümü yapılmış tablolar için indeksler
--

--
-- Tablo için indeksler `swp_langs`
--
ALTER TABLE `swp_langs`
  ADD PRIMARY KEY (`ID`);

--
-- Tablo için indeksler `swp_user`
--
ALTER TABLE `swp_user`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `guid` (`Guid`),
  ADD KEY `username` (`UserName`,`Email`);

--
-- Tablo için indeksler `swp_user_log`
--
ALTER TABLE `swp_user_log`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `userguid` (`UserGuid`);

--
-- Tablo için indeksler `swp_user_login_ban`
--
ALTER TABLE `swp_user_login_ban`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `ip` (`UserIP`);

--
-- Tablo için indeksler `swp_user_login_error`
--
ALTER TABLE `swp_user_login_error`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `userguid` (`UserGuid`);

--
-- Tablo için indeksler `swp_user_login_info`
--
ALTER TABLE `swp_user_login_info`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `userguid` (`UserGuid`);

--
-- Dökümü yapılmış tablolar için AUTO_INCREMENT değeri
--

--
-- Tablo için AUTO_INCREMENT değeri `swp_langs`
--
ALTER TABLE `swp_langs`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Tablo için AUTO_INCREMENT değeri `swp_user`
--
ALTER TABLE `swp_user`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Tablo için AUTO_INCREMENT değeri `swp_user_log`
--
ALTER TABLE `swp_user_log`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=63;

--
-- Tablo için AUTO_INCREMENT değeri `swp_user_login_ban`
--
ALTER TABLE `swp_user_login_ban`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Tablo için AUTO_INCREMENT değeri `swp_user_login_error`
--
ALTER TABLE `swp_user_login_error`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Tablo için AUTO_INCREMENT değeri `swp_user_login_info`
--
ALTER TABLE `swp_user_login_info`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=90;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
