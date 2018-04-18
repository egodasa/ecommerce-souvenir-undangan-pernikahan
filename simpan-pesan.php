<?php
session_start();
require "koneksi.php";
$data = $_POST;
$now = DateTime::createFromFormat('U.u', microtime(true));
$id_pemesanan = $now->format("mdYHisu");
	$pemesanan = array(
	"id_pemesanan"		=> $id_pemesanan,
	"nama_pemesan"		=> $data['nama_pemesan'],
	"alamat_pemesan"	=> $data['alamat_pemesan'],
	"no_telp"			=> $data['no_telp'],
	"id_user"			=> $data['id_user'],
	"total_harga"		=> $data['total_harga'],
	"jumlah_pesan"		=> $data['jumlah_pesan'],
	"id_produk"			=> $data['id_produk'],
	"id_kota"			=> $data['id_kota'],
	"id_user"			=> $_SESSION['id_user']
	);
	$db->from('tbl_pemesanan')->insert($pemesanan)->execute();
header('Location: index.php');
?>
