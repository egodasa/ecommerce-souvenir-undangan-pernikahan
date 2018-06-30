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
(11,	20,	'baru.jpg'),
(12,	20,	''),
(13,	21,	'souvenir-gerabah-frame-matahari.JPG'),
(14,	21,	''),
(15,	21,	''),
(16,	22,	'souvenir-tempat-pensil-sepatu-bola-milan.jpg'),
(17,	22,	''),
(18,	22,	''),
(19,	23,	'souvenir-gerabah.jpg'),
(20,	23,	'bri.jpeg'),
(21,	23,	'')
ON DUPLICATE KEY UPDATE `id_foto_produk` = VALUES(`id_foto_produk`), `id_produk` = VALUES(`id_produk`), `foto_produk` = VALUES(`foto_produk`);

DROP TABLE IF EXISTS `tbl_kota`;
CREATE TABLE `tbl_kota` (
  `id_kota` int(11) NOT NULL AUTO_INCREMENT,
  `nm_kota` varchar(100) NOT NULL,
  `tarif` int(11) NOT NULL,
  PRIMARY KEY (`id_kota`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `tbl_kota` (`id_kota`, `nm_kota`, `tarif`) VALUES
(1,	'Padang Panjang',	30000),
(2,	'Painan',	50000)
ON DUPLICATE KEY UPDATE `id_kota` = VALUES(`id_kota`), `nm_kota` = VALUES(`nm_kota`), `tarif` = VALUES(`tarif`);

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
(2,	'05182018121230103500',	'Rian',	'12323123341',	'BRI',	'2018-01-04',	900000,	'bri.jpeg',	'Diterima')
ON DUPLICATE KEY UPDATE `id_pembayaran` = VALUES(`id_pembayaran`), `id_pemesanan` = VALUES(`id_pemesanan`), `nama_pembayar` = VALUES(`nama_pembayar`), `no_rek` = VALUES(`no_rek`), `nama_bank` = VALUES(`nama_bank`), `tgl_pembayaran` = VALUES(`tgl_pembayaran`), `total` = VALUES(`total`), `foto_bukti` = VALUES(`foto_bukti`), `status_pembayaran` = VALUES(`status_pembayaran`);

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
  `id_kota` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_pemesanan`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `tbl_pemesanan` (`id_pemesanan`, `nama_pemesan`, `alamat_pemesan`, `no_telp`, `id_user`, `total_harga`, `jumlah_pesan`, `id_produk`, `tgl_pesan`, `id_kota`) VALUES
('05182018121230103500',	'Rian',	'Jalan sungai kapuas no 5',	'081994088434',	15,	900000,	300,	23,	'2018-05-18 12:12:30',	NULL),
('06302018135608669100',	'Mandan',	'Alamat',	'082131231221',	9,	6000,	2,	21,	'2018-06-30 13:56:08',	1)
ON DUPLICATE KEY UPDATE `id_pemesanan` = VALUES(`id_pemesanan`), `nama_pemesan` = VALUES(`nama_pemesan`), `alamat_pemesan` = VALUES(`alamat_pemesan`), `no_telp` = VALUES(`no_telp`), `id_user` = VALUES(`id_user`), `total_harga` = VALUES(`total_harga`), `jumlah_pesan` = VALUES(`jumlah_pesan`), `id_produk` = VALUES(`id_produk`), `tgl_pesan` = VALUES(`tgl_pesan`), `id_kota` = VALUES(`id_kota`);

DELIMITER ;;

CREATE TRIGGER `stokKurang` AFTER INSERT ON `tbl_pemesanan` FOR EACH ROW
update tbl_produk set stok = stok - NEW.jumlah_pesan where id_produk = NEW.id_produk;;

DELIMITER ;

DROP TABLE IF EXISTS `tbl_produk`;
CREATE TABLE `tbl_produk` (
  `id_produk` int(11) NOT NULL AUTO_INCREMENT,
  `nm_produk` varchar(100) NOT NULL,
  `jenis_produk` varchar(15) NOT NULL,
  `harga` int(11) NOT NULL,
  `stok` int(11) DEFAULT '10',
  PRIMARY KEY (`id_produk`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `tbl_produk` (`id_produk`, `nm_produk`, `jenis_produk`, `harga`, `stok`) VALUES
(20,	'Undangan Kipas Kuning',	'Undangan',	1500,	0),
(21,	'Souvenir gerabah',	'Souvenir',	3000,	8),
(22,	'Souvenir Gerabah bola',	'Souvenir',	2500,	10),
(23,	'Souvenir Gerabah Asbaks',	'Souvenir',	3200,	10)
ON DUPLICATE KEY UPDATE `id_produk` = VALUES(`id_produk`), `nm_produk` = VALUES(`nm_produk`), `jenis_produk` = VALUES(`jenis_produk`), `harga` = VALUES(`harga`), `stok` = VALUES(`stok`);

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
(15,	'pengguna',	'200820e3227815ed1756a6b531e7e0d2',	'pengguna@email.com',	'Pelanggan')
ON DUPLICATE KEY UPDATE `id_user` = VALUES(`id_user`), `username` = VALUES(`username`), `password` = VALUES(`password`), `email` = VALUES(`email`), `tipe_user` = VALUES(`tipe_user`);

-- 2018-06-30 14:17:16
