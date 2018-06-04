-- Adminer 4.6.2 MySQL dump

SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

DROP TABLE IF EXISTS `tbl_foto_produk`;
CREATE TABLE `tbl_foto_produk` (
  `id_foto_produk` int(11) NOT NULL AUTO_INCREMENT,
  `id_produk` int(11) NOT NULL,
  `foto_produk` text NOT NULL,
  PRIMARY KEY (`id_foto_produk`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

TRUNCATE `tbl_foto_produk`;
INSERT INTO `tbl_foto_produk` (`id_foto_produk`, `id_produk`, `foto_produk`) VALUES
(4,	16,	'codeigniter.png'),
(5,	16,	'javascript.svg'),
(6,	16,	'jquery.png'),
(7,	17,	'Windows_10_logo_720.png'),
(8,	17,	'Windows_10_logo_650.png'),
(9,	17,	'Windows_10_logo_710_410_white_edited.png');

DROP TABLE IF EXISTS `tbl_kota`;
CREATE TABLE `tbl_kota` (
  `id_kota` int(11) NOT NULL AUTO_INCREMENT,
  `nm_kota` varchar(50) NOT NULL,
  `tarif` int(11) NOT NULL,
  PRIMARY KEY (`id_kota`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

TRUNCATE `tbl_kota`;
INSERT INTO `tbl_kota` (`id_kota`, `nm_kota`, `tarif`) VALUES
(1,	'Padang',	50000),
(2,	'Dhamasraya',	150000),
(3,	'Pasaman',	130000);

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
  `tgl_konfirmasi` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_pembayaran`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

TRUNCATE `tbl_pembayaran`;
INSERT INTO `tbl_pembayaran` (`id_pembayaran`, `id_pemesanan`, `nama_pembayar`, `no_rek`, `nama_bank`, `tgl_pembayaran`, `total`, `foto_bukti`, `status_pembayaran`, `tgl_konfirmasi`) VALUES
(1,	'04062018044505170700',	'asdasd',	'2131312',	'dade',	'2018-01-11',	231312,	'bukmay.png',	'Diterima',	'2018-04-18 06:35:49'),
(3,	'04182018043125393200',	'Qui numquam',	'78',	'21112',	'2003-09-04',	47,	'Selection_722.png',	'Diterima',	'2018-04-18 16:05:33'),
(4,	'04182018045516233800',	'baru',	'231321',	'bri',	'2018-01-01',	90012,	'Windows_10_logo_wide_white_edited.png',	'Ditolak',	'2018-04-19 13:18:00'),
(5,	'04182018041043871200',	'yang baru',	'123123',	'bri',	'2018-01-01',	40000,	'Windows_10_logo_720.png',	'Diproses',	'2018-04-18 06:35:49'),
(6,	'04192018125232986000',	'Gundulmu',	'12312321',	'bri',	'2018-01-01',	230000,	'pp.jpg',	'Ditolak',	'2018-04-19 13:16:42');

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
  `id_kota` int(11) NOT NULL,
  PRIMARY KEY (`id_pemesanan`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

TRUNCATE `tbl_pemesanan`;
INSERT INTO `tbl_pemesanan` (`id_pemesanan`, `nama_pemesan`, `alamat_pemesan`, `no_telp`, `id_user`, `total_harga`, `jumlah_pesan`, `id_produk`, `tgl_pesan`, `id_kota`) VALUES
('04062018044505170700',	'In assumenda',	'Duis et et rerum et aut ut dolore tempor sit laboris amet dolorem eos magna aut dolorem fugiat',	'12213123123',	8,	300000,	200,	16,	'2018-04-18 03:10:18',	1),
('04142018062611006600',	'Tempora distinctio Sunt consequatur ea',	'Fugiat aut velit tempora deserunt quis nulla ad',	'313123',	8,	3000,	2,	16,	'2018-04-18 03:10:39',	1),
('04172018153632769400',	'Voluptatem tempore ',	'Dolore duis odit sint officia vel explicabo Autem perspiciatis sequi maxime dolorum magna',	'12323112',	9,	143500,	9,	16,	'2018-04-17 15:36:32',	1),
('04182018041043871200',	'Mandan',	'mad=nnas',	'12321312',	11,	72500,	15,	16,	'2018-04-18 04:10:43',	1),
('04182018043125393200',	'Jarwo',	'jarwo',	'32219329',	11,	199500,	33,	16,	'2018-04-18 04:31:25',	1),
('04182018045516233800',	'Baru',	'baru',	'12312',	12,	83000,	22,	16,	'2018-04-18 04:55:16',	1),
('04192018125232986000',	'Ayam Goreng',	'Banuaran',	'02312321',	10,	414000,	22,	17,	'2018-04-19 12:52:33',	1),
('04192018125718158400',	'CI',	'Codeigniter',	'1231231',	10,	183000,	22,	16,	'2018-04-19 12:57:18',	1),
('04192018130131909700',	'awwddsa',	'waaw',	'2312',	10,	83000,	22,	16,	'2018-04-19 13:01:31',	1);

DROP TABLE IF EXISTS `tbl_produk`;
CREATE TABLE `tbl_produk` (
  `id_produk` int(11) NOT NULL AUTO_INCREMENT,
  `nm_produk` varchar(20) NOT NULL,
  `harga` int(11) NOT NULL,
  PRIMARY KEY (`id_produk`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=latin1;

TRUNCATE `tbl_produk`;
INSERT INTO `tbl_produk` (`id_produk`, `nm_produk`, `harga`) VALUES
(16,	'Undangan Lamo',	1500),
(17,	'Ayam',	12000);

DROP TABLE IF EXISTS `tbl_user`;
CREATE TABLE `tbl_user` (
  `id_user` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(20) NOT NULL,
  `password` text NOT NULL,
  `email` varchar(20) NOT NULL,
  `tipe_user` varchar(15) NOT NULL,
  PRIMARY KEY (`id_user`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

TRUNCATE `tbl_user`;
INSERT INTO `tbl_user` (`id_user`, `username`, `password`, `email`, `tipe_user`) VALUES
(7,	'ayam',	'e070e2dd9634c6c078a59218cdca9e23',	'egodasa@gmail.com',	'Admin'),
(8,	'pembeli',	'a9f8bbb8cb84375f241ce3b9da6219a1',	'pem@fsd.com',	'Pelanggan'),
(9,	'admin',	'21232f297a57a5a743894a0e4a801fc3',	'admin@adminc.com',	'Admin'),
(10,	'egodasa',	'e070e2dd9634c6c078a59218cdca9e23',	'egodasa@gmail.com',	'Pelanggan'),
(11,	'mandan',	'e070e2dd9634c6c078a59218cdca9e23',	'mandan@manda.com',	'Pelanggan'),
(12,	'baru',	'5ef035d11d74713fcb36f2df26aa7c3d',	'baru@baru.com',	'Pelanggan');

-- 2018-04-19 13:29:16
