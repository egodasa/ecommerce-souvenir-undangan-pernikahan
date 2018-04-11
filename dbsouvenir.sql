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
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

TRUNCATE `tbl_detail_pesanan`;
INSERT INTO `tbl_detail_pesanan` (`nama_mempelai`, `nama_orangtua`, `tgl_akadnikah`, `tgl_resepsi`, `waktu_akadnikah`, `waktu_resepsi`, `alamat_akadnikah`, `alamat_resepsi`, `anggota_keluarga`, `foto_lokasi`, `id_detail`, `id_pemesanan`) VALUES
('Quo quia maiores aut excepteur laborum',	'Mollitia quis dolor voluptate sit tempore deleniti eaque voluptatem Blanditiis ullam recusandae Labore vitae aperiam enim ratione mollitia velit',	'1993-12-13',	'2013-09-09',	'09:27:00',	'13:50:00',	'In nesciunt dolore quo quis enim',	'Minim aut rerum non possimus fugiat magni maxime nihil ratione repudiandae rerum autem enim et',	'Suscipit placeat aliqua Qui Nam cum vitae veniam nostrum dolores incidunt ducimus praesentium',	'gallardo-superleggera.jpg',	1,	0);

DROP TABLE IF EXISTS `tbl_foto_produk`;
CREATE TABLE `tbl_foto_produk` (
  `id_foto_produk` int(11) NOT NULL AUTO_INCREMENT,
  `id_produk` int(11) NOT NULL,
  `foto_produk` text NOT NULL,
  PRIMARY KEY (`id_foto_produk`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

TRUNCATE `tbl_foto_produk`;
INSERT INTO `tbl_foto_produk` (`id_foto_produk`, `id_produk`, `foto_produk`) VALUES
(4,	16,	'codeigniter.png'),
(5,	16,	'javascript.svg'),
(6,	16,	'jquery.png');

DROP TABLE IF EXISTS `tbl_pembayaran`;
CREATE TABLE `tbl_pembayaran` (
  `id_pembayaran` int(11) NOT NULL AUTO_INCREMENT,
  `id_pemesanan` int(11) NOT NULL,
  `nama_pembayar` varchar(100) NOT NULL,
  `no_rek` varchar(30) NOT NULL,
  `nama_bank` varchar(50) NOT NULL,
  `tgl_pembayaran` date NOT NULL,
  `total` int(11) NOT NULL,
  `foto_bukti` text NOT NULL,
  `status_pembayaran` enum('Diproses','Diterima','Ditolak') NOT NULL DEFAULT 'Diproses',
  PRIMARY KEY (`id_pembayaran`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

TRUNCATE `tbl_pembayaran`;

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

TRUNCATE `tbl_pemesanan`;
INSERT INTO `tbl_pemesanan` (`id_pemesanan`, `nama_pemesan`, `alamat_pemesan`, `no_telp`, `id_user`, `total_harga`, `jumlah_pesan`, `id_produk`, `tgl_pesan`) VALUES
('04062018044505170700',	'In assumenda',	'Duis et et rerum et aut ut dolore tempor sit laboris amet dolorem eos magna aut dolorem fugiat',	'12213123123',	8,	300000,	200,	16,	'2018-04-06 04:45:05');

DROP TABLE IF EXISTS `tbl_produk`;
CREATE TABLE `tbl_produk` (
  `id_produk` int(11) NOT NULL AUTO_INCREMENT,
  `nm_produk` varchar(20) NOT NULL,
  `jenis_produk` varchar(15) NOT NULL,
  `harga` int(11) NOT NULL,
  PRIMARY KEY (`id_produk`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=latin1;

TRUNCATE `tbl_produk`;
INSERT INTO `tbl_produk` (`id_produk`, `nm_produk`, `jenis_produk`, `harga`) VALUES
(16,	'Undangan Lamo',	'Undangan',	1500);

DROP TABLE IF EXISTS `tbl_user`;
CREATE TABLE `tbl_user` (
  `id_user` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(20) NOT NULL,
  `password` text NOT NULL,
  `email` varchar(20) NOT NULL,
  `tipe_user` varchar(15) NOT NULL,
  PRIMARY KEY (`id_user`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=latin1;

TRUNCATE `tbl_user`;
INSERT INTO `tbl_user` (`id_user`, `username`, `password`, `email`, `tipe_user`) VALUES
(7,	'ayam',	'e070e2dd9634c6c078a59218cdca9e23',	'egodasa@gmail.com',	'Admin'),
(8,	'pembeli',	'a9f8bbb8cb84375f241ce3b9da6219a1',	'pem@fsd.com',	'Pelanggan'),
(9,	'admin',	'21232f297a57a5a743894a0e4a801fc3',	'admin@adminc.com',	'Admin'),
(10,	'egodasa',	'e070e2dd9634c6c078a59218cdca9e23',	'egodasa@gmail.com',	'Pelanggan'),
(12,	'asda',	'e070e2dd9634c6c078a59218cdca9e23',	'egodasa@gmail.com',	'Pelanggan'),
(13,	'egodasa',	'e070e2dd9634c6c078a59218cdca9e23',	'egodasa@gmail.com',	'Pelanggan'),
(14,	'egodasa',	'e070e2dd9634c6c078a59218cdca9e23',	'egodasa@gmail.com',	'Pelanggan');

-- 2018-04-11 15:33:43
