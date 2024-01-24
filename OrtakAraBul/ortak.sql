-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Anamakine: 127.0.0.1
-- Üretim Zamanı: 11 Tem 2023, 09:10:03
-- Sunucu sürümü: 10.4.28-MariaDB
-- PHP Sürümü: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Veritabanı: `ortak`
--

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `basvuru`
--

CREATE TABLE `basvuru` (
  `b_kadi` varchar(200) NOT NULL,
  `proje_id` varchar(30) NOT NULL,
  `teklif` int(11) NOT NULL,
  `on_yazi` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Tablo döküm verisi `basvuru`
--

INSERT INTO `basvuru` (`b_kadi`, `proje_id`, `teklif`, `on_yazi`) VALUES
('Cakar42', '19', 123, 'efwed'),
('Cakar42', '23', 213123, 'werfwef');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `makale`
--

CREATE TABLE `makale` (
  `id` int(11) NOT NULL,
  `baslik` varchar(255) NOT NULL,
  `icerik` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Tablo döküm verisi `makale`
--

INSERT INTO `makale` (`id`, `baslik`, `icerik`) VALUES
(1, 'sef', '&lt;p&gt;sefse&lt;/p&gt;'),
(2, 'wefew', '&lt;p&gt;wfefw&lt;/p&gt;'),
(3, 'wrgwrgg', '&lt;p&gt;aaaaaaaaaaaaaaaaa&lt;/p&gt;');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `mesaj`
--

CREATE TABLE `mesaj` (
  `gönderici` varchar(200) NOT NULL,
  `alici` varchar(200) NOT NULL,
  `msj` varchar(1000) NOT NULL,
  `zaman` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Tablo döküm verisi `mesaj`
--

INSERT INTO `mesaj` (`gönderici`, `alici`, `msj`, `zaman`) VALUES
('cakarr', 'Cakarr', 'i\r\n', '2023-05-11 21:52:03'),
('Cakarr', 'aaa', 'ii\r\n', '2023-05-21 23:38:37'),
('Cakarr', 'Cakar42', 'Selam', '2023-05-22 20:58:49'),
('Cakar42', '', 'merhaba', '2023-05-22 23:29:30'),
('Cakarr', '', 'selam', '2023-05-24 01:06:32');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `onayli`
--

CREATE TABLE `onayli` (
  `b_kadi` varchar(200) NOT NULL,
  `proje_id` varchar(30) NOT NULL,
  `e_kadi` varchar(200) NOT NULL,
  `ucret` int(11) NOT NULL,
  `valid` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Tablo döküm verisi `onayli`
--

INSERT INTO `onayli` (`b_kadi`, `proje_id`, `e_kadi`, `ucret`, `valid`) VALUES
('Cakar42', '20', 'Cakarr', 123123, 0),
('Cakar42', '18', 'Cakarr', 123, 1),
('Cakar42', '1', 'Cakarr', 12321, 1);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `ortakarayan`
--

CREATE TABLE `ortakarayan` (
  `k_adi` varchar(200) NOT NULL,
  `sifre` varchar(200) NOT NULL,
  `isim` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `iletisim_no` varchar(200) NOT NULL,
  `adres` varchar(200) NOT NULL,
  `cinsiyet` varchar(200) NOT NULL,
  `dogum_tarihi` date NOT NULL,
  `sirket` varchar(200) NOT NULL,
  `profil_ozet` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Tablo döküm verisi `ortakarayan`
--

INSERT INTO `ortakarayan` (`k_adi`, `sifre`, `isim`, `email`, `iletisim_no`, `adres`, `cinsiyet`, `dogum_tarihi`, `sirket`, `profil_ozet`) VALUES
('aaaaaa', '123123', '3r3ew', 'cbatuhan4219@gmail.com', '2132141', 'fref', 'male', '2000-12-20', '', ''),
('Cakarr', '123123', 'Batuhan ', 'batuyhan19@gmail.com', '5422131', 'konya ', 'male', '2001-09-26', 'cakar', 'ELG2ÖWEL'),
('dddddd', '123123', 'Ali', 'c@c', '213214123', 'çankırıewfffewfwdw2', 'male', '2000-12-21', '', ''),
('ddddddd', '123123', 'Ali', 'walterhw333@gmail.com', '213214123', 'çankırıewfffewfwdw2', 'male', '2000-12-21', '', ''),
('eeeeee', '123123', 'burak', 'cbatuhan4219@gmail.com', '123124', 'exe2', 'male', '2000-12-21', '', ''),
('vdsf', '123123', 'sd', 'c@t', '542', '123123v2', 'male', '2001-09-26', '', '');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `ortakbekleyen`
--

CREATE TABLE `ortakbekleyen` (
  `k_adi` varchar(200) NOT NULL,
  `sifre` varchar(200) NOT NULL,
  `isim` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `iletisim_no` varchar(200) NOT NULL,
  `adres` varchar(200) NOT NULL,
  `cinsiyet` varchar(200) NOT NULL,
  `dogum_tarihi` date NOT NULL,
  `prof_baslik` varchar(200) NOT NULL,
  `profil_ozet` varchar(1000) NOT NULL,
  `egitim` varchar(200) NOT NULL,
  `deneyim` varchar(200) NOT NULL,
  `beceriler` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Tablo döküm verisi `ortakbekleyen`
--

INSERT INTO `ortakbekleyen` (`k_adi`, `sifre`, `isim`, `email`, `iletisim_no`, `adres`, `cinsiyet`, `dogum_tarihi`, `prof_baslik`, `profil_ozet`, `egitim`, `deneyim`, `beceriler`) VALUES
('3e2323e', '123123', '3e2e', 'cbatuhan4219@gmail.com', '213214121312', 'ed', 'male', '2000-12-21', '', '', '', '', ''),
('ali111', '123123', 'Ali', 'bybatu19@gmail.com', '35124123', 'RETGERG2121', 'male', '2001-09-26', '', '', '', '', ''),
('Cakar42', '123123', 'Batuhan', 'muratgonen18@gmail.com', '54232', 'RETGERG', 'male', '2000-05-20', 'Web Geliştirici', '', 'Lisans', 'OJMWOPEL?TW', 'Tasarimci'),
('ctrk1', '123123', 'Cantürk', 'c@t', '5421', 'adana', 'male', '2001-05-20', '', '', '', '', ''),
('regerg', '123123', 'thret', 'alperenuckun15@gmail.com', '2132141', 'rcfewfcw', 'female', '2000-12-21', '', '', '', '', '');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `projeler`
--

CREATE TABLE `projeler` (
  `proje_id` bigint(20) UNSIGNED NOT NULL,
  `baslik` varchar(200) NOT NULL,
  `tip` varchar(200) NOT NULL,
  `tanim` varchar(1000) NOT NULL,
  `beceriler` varchar(200) NOT NULL,
  `ozel_beceriler` varchar(200) NOT NULL,
  `e_kadi` varchar(200) NOT NULL,
  `valid` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Tablo döküm verisi `projeler`
--

INSERT INTO `projeler` (`proje_id`, `baslik`, `tip`, `tanim`, `beceriler`, `ozel_beceriler`, `e_kadi`, `valid`) VALUES
(1, 'Ortak Arama Sitesi', 'Web Projesi', 'Ortak', 'Php', 'efcwf', 'Cakarr', 0),
(18, '23r', 'ewf', 'wefwe', 'fwef', 'wefwe', 'Cakarr', 0),
(19, 'eeeeeee', 'eeeeee', 'eeeee', 'eeeeee', 'eeeeee', 'Cakarr', 1),
(20, 'edeee', 'ede', 'ede', 'ede', 'ded', 'Cakarr', 0),
(21, 'batu', 'batu', 'batu', 'batu', 'batu', 'Cakarr', 1),
(22, 'ckr', 'ckr', 'ckr', 'ckr', 'ckr', 'Cakarr', 1),
(23, 'bbbbbb', 'aaaaaaa', 'aaaaaaa', 'aaaaaaa', 'aaaaaaa', 'aaaaaa', 1),
(24, 'fffffffff', 'ffffffffff', 'fffffffff', 'fffff', 'ffff', 'aaaaaa', 1);


--
-- Soru-cevap tablosu
--

CREATE TABLE soru_cevap (
    id INT(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    proje_id BIGINT(20) UNSIGNED,
    soru TEXT,
    cevap TEXT,
    tarih TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (proje_id) REFERENCES projeler(proje_id)
);

--
-- Dökümü yapılmış tablolar için indeksler
--

--
-- Tablo için indeksler `makale`
--
ALTER TABLE `makale`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `ortakarayan`
--
ALTER TABLE `ortakarayan`
  ADD PRIMARY KEY (`k_adi`);

--
-- Tablo için indeksler `ortakbekleyen`
--
ALTER TABLE `ortakbekleyen`
  ADD PRIMARY KEY (`k_adi`);

--
-- Tablo için indeksler `projeler`
--
ALTER TABLE `projeler`
  ADD PRIMARY KEY (`proje_id`),
  ADD UNIQUE KEY `proje_id` (`proje_id`);

--
-- Dökümü yapılmış tablolar için AUTO_INCREMENT değeri
--

--
-- Tablo için AUTO_INCREMENT değeri `makale`
--
ALTER TABLE `makale`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Tablo için AUTO_INCREMENT değeri `projeler`
--
ALTER TABLE `projeler`
  MODIFY `proje_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
