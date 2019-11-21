-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 21, 2019 at 10:39 AM
-- Server version: 10.4.8-MariaDB
-- PHP Version: 7.3.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `shop`
--

-- --------------------------------------------------------

--
-- Table structure for table `account`
--

CREATE TABLE `account` (
  `id` int(11) NOT NULL,
  `manv` int(11) DEFAULT NULL,
  `username` varchar(20) DEFAULT NULL,
  `password` varchar(50) DEFAULT NULL,
  `access` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `account`
--

INSERT INTO `account` (`id`, `manv`, `username`, `password`, `access`) VALUES
(1, 1, 'admin', 'admin', 'admin'),
(4, 12, 'quanly', 'quanly', 'quanly'),
(5, 13, 'nhanvien', 'nhanvien', 'nhanvien'),
(6, 14, 'nhanvien2', 'nhanvien2', 'nhanvien'),
(10, 21, 'lotus', 'lotus', 'quanly');

-- --------------------------------------------------------

--
-- Table structure for table `chitiethoadon`
--

CREATE TABLE `chitiethoadon` (
  `mahd` int(11) NOT NULL,
  `masp` varchar(20) NOT NULL,
  `soluongban` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `hoadon`
--

CREATE TABLE `hoadon` (
  `mahd` int(11) NOT NULL,
  `manv` int(11) DEFAULT NULL,
  `ngaylap` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `nhanvien`
--

CREATE TABLE `nhanvien` (
  `manv` int(11) NOT NULL,
  `ho` varchar(50) DEFAULT NULL,
  `ten` varchar(20) NOT NULL,
  `ngaysinh` date DEFAULT NULL,
  `diachi` varchar(256) DEFAULT NULL,
  `sdt` char(10) DEFAULT NULL,
  `ngaybatdau` date DEFAULT NULL,
  `luong` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `nhanvien`
--

INSERT INTO `nhanvien` (`manv`, `ho`, `ten`, `ngaysinh`, `diachi`, `sdt`, `ngaybatdau`, `luong`) VALUES
(1, 'Nguyễn Đức', 'Thắng', '1999-09-21', 'ĐH Tôn Đức Thắng', '0964311776', '2019-01-01', 1000000),
(12, 'Hoàng', 'Hạnh', '1999-07-02', 'quận 2', '0336485348', '2019-07-02', 500000),
(13, 'Nguyễn', 'C', '1999-07-01', 'quận 9', '0366944112', '2019-07-02', 200),
(14, 'Hoàng', 'Thang', '1999-07-02', '123', '0964311776', '2019-07-02', 500000),
(21, 'Hoàng Thị Hồng', 'Hạnh', '1980-05-30', 'Quận 1', '0964311776', '1988-06-19', 500000);

-- --------------------------------------------------------

--
-- Table structure for table `sanpham`
--

CREATE TABLE `sanpham` (
  `masp` varchar(20) NOT NULL,
  `tensp` varchar(256) NOT NULL DEFAULT 'NULL',
  `loaisp` varchar(5) DEFAULT NULL,
  `soluong` int(11) DEFAULT NULL,
  `gia` int(11) NOT NULL DEFAULT 0,
  `size` varchar(3) NOT NULL,
  `dvt` varchar(32) NOT NULL DEFAULT 'NULL',
  `hinhanh` varchar(512) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `sanpham`
--

INSERT INTO `sanpham` (`masp`, `tensp`, `loaisp`, `soluong`, `gia`, `size`, `dvt`, `hinhanh`) VALUES
('Ao-1', 'Quần đùi', 'Quần', 10, 100000, 'M', 'Cái', '459e62d6d8753e2b6764.jpg'),
('Ao-2', 'Áo Vàng', 'Áo', 10, 100000, 'S', 'Cái', '30d778f0bd555b0b0244.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `account`
--
ALTER TABLE `account`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD KEY `fk_account_nhanvien` (`manv`);

--
-- Indexes for table `chitiethoadon`
--
ALTER TABLE `chitiethoadon`
  ADD PRIMARY KEY (`mahd`,`masp`),
  ADD KEY `fk_CTHD_SP` (`masp`);

--
-- Indexes for table `hoadon`
--
ALTER TABLE `hoadon`
  ADD PRIMARY KEY (`mahd`),
  ADD KEY `fk_HD_nhanvien` (`manv`);

--
-- Indexes for table `nhanvien`
--
ALTER TABLE `nhanvien`
  ADD PRIMARY KEY (`manv`);

--
-- Indexes for table `sanpham`
--
ALTER TABLE `sanpham`
  ADD PRIMARY KEY (`masp`),
  ADD KEY `fk_sp_masp` (`loaisp`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `account`
--
ALTER TABLE `account`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `hoadon`
--
ALTER TABLE `hoadon`
  MODIFY `mahd` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `nhanvien`
--
ALTER TABLE `nhanvien`
  MODIFY `manv` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `account`
--
ALTER TABLE `account`
  ADD CONSTRAINT `fk_account_nhanvien` FOREIGN KEY (`MaNV`) REFERENCES `nhanvien` (`MaNV`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `chitiethoadon`
--
ALTER TABLE `chitiethoadon`
  ADD CONSTRAINT `fk_CTHD_HD` FOREIGN KEY (`MaHD`) REFERENCES `hoadon` (`MaHD`),
  ADD CONSTRAINT `fk_CTHD_SP` FOREIGN KEY (`maSP`) REFERENCES `sanpham` (`masp`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `hoadon`
--
ALTER TABLE `hoadon`
  ADD CONSTRAINT `fk_HD_nhanvien` FOREIGN KEY (`MaNV`) REFERENCES `nhanvien` (`MaNV`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
