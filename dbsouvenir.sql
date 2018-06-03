-- Adminer 4.6.2 MySQL dump

SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

DROP TABLE IF EXISTS `tbl_detail_pesanan`;
CREATE TABLE `tbl_detail_pesanan` (
  `nama_mempelai` text NOT NULL,
  `nama_orangtua` text NOT NULL,
  `tgl_akadnikah` date NOT NULL,
  `tgl_resepsi` date NOT NULL,
  `waktu_akadnikah` time NOT NULL,
  `waktu_resepsi` time NOT NULL,
  `alamat_akadnikah` varchar(255) NOT NULL,
  `alamat_resepsi` varchar(255) NOT NULL,
  `anggota_keluarga` text NOT NULL,
  `foto_lokasi` text NOT NULL,
  `id_detail` int(11) NOT NULL AUTO_INCREMENT,
  `id_pemesanan` int(11) NOT NULL,
  PRIMARY KEY (`id_detail`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


DROP TABLE IF EXISTS `tbl_foto_produk`;
CREATE TABLE `tbl_foto_produk` (
  `id_foto_produk` int(11) NOT NULL AUTO_INCREMENT,
  `id_produk` int(11) NOT NULL,
  `foto_produk` text NOT NULL,
  PRIMARY KEY (`id_foto_produk`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `tbl_foto_produk` (`id_foto_produk`, `id_produk`, `foto_produk`) VALUES
(7,	19,	'undangan-nikah-kipas.jpg'),
(8,	19,	'Souvenir Kipas Undangan (4).jpg'),
(9,	19,	'Souvenir Kipas Undangan (3).jpg'),
(10,	20,	'upk.jpeg'),
(11,	20,	''),
(12,	20,	''),
(13,	21,	'souvenir-gerabah-frame-matahari.JPG'),
(14,	21,	''),
(15,	21,	''),
(16,	22,	'souvenir-tempat-pensil-sepatu-bola-milan.jpg'),
(17,	22,	''),
(18,	22,	''),
(19,	23,	'souvenir-gerabah.jpg'),
(20,	23,	''),
(21,	23,	'');

DROP TABLE IF EXISTS `tbl_pembayaran`;
CREATE TABLE `tbl_pembayaran` (
  `id_pembayaran` int(11) NOT NULL AUTO_INCREMENT,
  `id_pemesanan` varchar(50) NOT NULL,
  `nama_pembayar` varchar(100) NOT NULL,
  `no_rek` varchar(30) NOT NULL,
  `nama_bank` varchar(50) NOT NULL,
  `tgl_pembayaran` date NOT NULL,
  `total` int(11) NOT NULL,
  `foto_bukti` text NOT NULL,
  `status_pembayaran` enum('Diproses','Diterima','Ditolak') NOT NULL DEFAULT 'Diproses',
  PRIMARY KEY (`id_pembayaran`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `tbl_pembayaran` (`id_pembayaran`, `id_pemesanan`, `nama_pembayar`, `no_rek`, `nama_bank`, `tgl_pembayaran`, `total`, `foto_bukti`, `status_pembayaran`) VALUES
(2,	'05182018121230103500',	'Rian',	'12323123341',	'BRI',	'2018-01-04',	900000,	'bri.jpeg',	'Diterima');

DROP TABLE IF EXISTS `tbl_pemesanan`;
CREATE TABLE `tbl_pemesanan` (
  `id_pemesanan` varchar(100) NOT NULL,
  `nama_pemesan` varchar(200) NOT NULL,
  `alamat_pemesan` varchar(255) NOT NULL,
  `no_telp` varchar(14) NOT NULL,
  `id_user` int(11) NOT NULL,
  `total_harga` int(11) NOT NULL,
  `jumlah_pesan` int(11) NOT NULL,
  `id_produk` int(11) NOT NULL,
  `tgl_pesan` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_pemesanan`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `tbl_pemesanan` (`id_pemesanan`, `nama_pemesan`, `alamat_pemesan`, `no_telp`, `id_user`, `total_harga`, `jumlah_pesan`, `id_produk`, `tgl_pesan`) VALUES
('05182018121230103500',	'Rian',	'Jalan sungai kapuas no 5',	'081994088434',	15,	900000,	300,	23,	'2018-05-18 12:12:30');

DROP TABLE IF EXISTS `tbl_produk`;
CREATE TABLE `tbl_produk` (
  `id_produk` int(11) NOT NULL AUTO_INCREMENT,
  `nm_produk` varchar(100) NOT NULL,
  `jenis_produk` varchar(15) NOT NULL,
  `harga` int(11) NOT NULL,
  PRIMARY KEY (`id_produk`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `tbl_produk` (`id_produk`, `nm_produk`, `jenis_produk`, `harga`) VALUES
(20,	'Undangan Kipas Kuning',	'Undangan',	1500),
(21,	'Souvenir gerabah',	'Souvenir',	3000),
(22,	'Souvenir Gerabah bola',	'Souvenir',	2500),
(23,	'Souvenir Geraba Asbak',	'Souvenir',	3000);

DROP TABLE IF EXISTS `tbl_user`;
CREATE TABLE `tbl_user` (
  `id_user` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(20) NOT NULL,
  `password` text NOT NULL,
  `email` varchar(20) NOT NULL,
  `tipe_user` varchar(15) NOT NULL,
  PRIMARY KEY (`id_user`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `tbl_user` (`id_user`, `username`, `password`, `email`, `tipe_user`) VALUES
(8,	'pembeli',	'a9f8bbb8cb84375f241ce3b9da6219a1',	'pem@fsd.com',	'Pelanggan'),
(9,	'admin',	'21232f297a57a5a743894a0e4a801fc3',	'admin@adminc.com',	'Admin'),
(10,	'egodasa',	'e070e2dd9634c6c078a59218cdca9e23',	'egodasa@gmail.com',	'Pelanggan'),
(12,	'asda',	'e070e2dd9634c6c078a59218cdca9e23',	'egodasa@gmail.com',	'Pelanggan'),
(13,	'egodasa',	'e070e2dd9634c6c078a59218cdca9e23',	'egodasa@gmail.com',	'Pelanggan'),
(14,	'egodasa',	'e070e2dd9634c6c078a59218cdca9e23',	'egodasa@gmail.com',	'Pelanggan'),
(15,	'pengguna',	'200820e3227815ed1756a6b531e7e0d2',	'pengguna@email.com',	'Pelanggan');

-- 2018-05-18 14:05:47
