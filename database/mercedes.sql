-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th6 25, 2017 lúc 05:17 PM
-- Phiên bản máy phục vụ: 10.1.22-MariaDB
-- Phiên bản PHP: 7.1.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `mercedes`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `admin`
--

CREATE TABLE `admin` (
  `Id` int(11) NOT NULL,
  `TenDangNhap` varchar(256) COLLATE utf8_unicode_ci DEFAULT NULL,
  `MatKhau` varchar(256) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `admin`
--

INSERT INTO `admin` (`Id`, `TenDangNhap`, `MatKhau`) VALUES
(2, 'admin', '7b65ba9ea22999c1e6df5d81dfeda066ffb7f8d6b03dfdfaaadaaf2f5a0fd86a405f63e576d67febd7abfb4de56dd59c49bb800f5c6e39c5d28cb50fc2672cac');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `dangki`
--

CREATE TABLE `dangki` (
  `Id` int(11) NOT NULL,
  `Title` varchar(256) COLLATE utf8_unicode_ci DEFAULT NULL,
  `Name` varchar(256) COLLATE utf8_unicode_ci DEFAULT NULL,
  `Phone` varchar(256) COLLATE utf8_unicode_ci DEFAULT NULL,
  `Email` varchar(256) COLLATE utf8_unicode_ci DEFAULT NULL,
  `Region` varchar(256) COLLATE utf8_unicode_ci DEFAULT NULL,
  `Created` varchar(256) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `dangki`
--

INSERT INTO `dangki` (`Id`, `Title`, `Name`, `Phone`, `Email`, `Region`, `Created`) VALUES
(1, 'title', 'anhtho81092@gmail.com', '0192192', 'anhtho81092@gmail.com', 'Ha Nam ', '17-06-25 17:13:44'),
(2, 'title', 'anhtho81092@gmail.com', '0192192', 'anhtho81092@gmail.com', 'Ha Nam ', '17-06-25 17:16:12');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`Id`);

--
-- Chỉ mục cho bảng `dangki`
--
ALTER TABLE `dangki`
  ADD PRIMARY KEY (`Id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `admin`
--
ALTER TABLE `admin`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT cho bảng `dangki`
--
ALTER TABLE `dangki`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
