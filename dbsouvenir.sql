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
  `id_pemesanan` varchar(50) NOT NULL,
  PRIMARY KEY (`id_detail`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


DROP TABLE IF EXISTS `tbl_foto_produk`;
CREATE TABLE `tbl_foto_produk` (
  `id_foto_produk` int(11) NOT NULL AUTO_INCREMENT,
  `id_produk` int(11) NOT NULL,
  `foto_produk` text NOT NULL,
  PRIMARY KEY (`id_foto_produk`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


DROP TABLE IF EXISTS `tbl_kota`;
CREATE TABLE `tbl_kota` (
  `id_kota` int(11) NOT NULL AUTO_INCREMENT,
  `nm_kota` varchar(100) NOT NULL,
  `tarif` int(11) NOT NULL,
  PRIMARY KEY (`id_kota`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


DROP TABLE IF EXISTS `tbl_pelanggan`;
CREATE TABLE `tbl_pelanggan` (
  `id_pelanggan` int(11) NOT NULL AUTO_INCREMENT,
  `id_user` int(11) NOT NULL,
  `nm_pelanggan` varchar(100) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `no_telpon` varchar(14) NOT NULL,
  `jk` varchar(15) NOT NULL,
  PRIMARY KEY (`id_pelanggan`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


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


DROP TABLE IF EXISTS `tbl_user`;
CREATE TABLE `tbl_user` (
  `id_user` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(20) NOT NULL,
  `password` text NOT NULL,
  `email` varchar(20) NOT NULL,
  `tipe_user` varchar(15) NOT NULL,
  PRIMARY KEY (`id_user`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


-- 2018-07-28 14:51:33
