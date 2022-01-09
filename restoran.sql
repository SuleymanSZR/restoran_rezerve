-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Anamakine: 127.0.0.1
-- Üretim Zamanı: 27 Ara 2021, 02:00:26
-- Sunucu sürümü: 10.4.17-MariaDB
-- PHP Sürümü: 7.3.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Veritabanı: `restoran`
--

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `kullanici`
--

CREATE TABLE `kullanici` (
  `id` int(11) NOT NULL,
  `kullaniciAdi` varchar(255) COLLATE utf8_turkish_ci NOT NULL,
  `adi` varchar(255) COLLATE utf8_turkish_ci NOT NULL,
  `sifre` varchar(255) COLLATE utf8_turkish_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_turkish_ci NOT NULL,
  `rol` varchar(255) COLLATE utf8_turkish_ci NOT NULL,
  `katılma_tarihi` varchar(255) COLLATE utf8_turkish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `kullanici`
--

INSERT INTO `kullanici` (`id`, `kullaniciAdi`, `adi`, `sifre`, `email`, `rol`, `katılma_tarihi`) VALUES
(1, 'root', 'Admin', 'adminroot', 'admin@admin.com', 'admin', 'October 25, 2021, 17:45, CET'),
(2, 'kullanici', 'Kullanici', '12345', 'ornek@ornek.com', '', 'November 3, 2021, 0:56, CET'),
(3, 'sezer', 'Süleyman SEZER', '14789', 'sezer@sezer.com', '', 'November 8, 2021, 21:56, CET'),
(5, 'deneme', 'deneme', '15987', 'deneme@deneme.com', '', 'December 20, 2021, 0:45, CET'),
(6, 'nihat', 'nihat uysal', '12345', 'nihat@nihat.com', '', 'December 26, 2021, 23:07, CET');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `rezervasyon_bilgileri`
--

CREATE TABLE `rezervasyon_bilgileri` (
  `rezerve_id` int(11) NOT NULL,
  `kullaniciID` int(11) NOT NULL,
  `rezerve_tarihi` varchar(255) COLLATE utf8_turkish_ci NOT NULL,
  `rezerve_saati` varchar(255) COLLATE utf8_turkish_ci NOT NULL,
  `telefon` varchar(255) COLLATE utf8_turkish_ci NOT NULL,
  `kisi_sayisi` varchar(255) COLLATE utf8_turkish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `rezervasyon_bilgileri`
--

INSERT INTO `rezervasyon_bilgileri` (`rezerve_id`, `kullaniciID`, `rezerve_tarihi`, `rezerve_saati`, `telefon`, `kisi_sayisi`) VALUES
(2, 2, '2021-12-18', '20:00', '5386038921', '25'),
(5, 5, '2022-01-01', '17:00', '5386038921', '10'),
(7, 3, '2021-12-30', '17:00', '5386038921', '10'),
(18, 6, '2021-12-30', '22:00', '5386038921', '15'),
(19, 6, '2021-12-30', '22:00', '5386038921', '25'),
(23, 3, '2021-12-30', '17:00', '5386038921', '20');

--
-- Dökümü yapılmış tablolar için indeksler
--

--
-- Tablo için indeksler `kullanici`
--
ALTER TABLE `kullanici`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `rezervasyon_bilgileri`
--
ALTER TABLE `rezervasyon_bilgileri`
  ADD PRIMARY KEY (`rezerve_id`),
  ADD KEY `kullaniciID` (`kullaniciID`);

--
-- Dökümü yapılmış tablolar için AUTO_INCREMENT değeri
--

--
-- Tablo için AUTO_INCREMENT değeri `kullanici`
--
ALTER TABLE `kullanici`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Tablo için AUTO_INCREMENT değeri `rezervasyon_bilgileri`
--
ALTER TABLE `rezervasyon_bilgileri`
  MODIFY `rezerve_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- Dökümü yapılmış tablolar için kısıtlamalar
--

--
-- Tablo kısıtlamaları `rezervasyon_bilgileri`
--
ALTER TABLE `rezervasyon_bilgileri`
  ADD CONSTRAINT `rezervasyon_bilgileri_ibfk_1` FOREIGN KEY (`kullaniciID`) REFERENCES `kullanici` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
