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
	"id_user"			=> $_SESSION['id_user'],
	"total_harga"		=> $data['total_harga'],
	"jumlah_pesan"		=> $data['jumlah_pesan'],
	"id_kota"			=> $data['id_kota'],
	"id_produk"			=> $data['id_produk']
	);
	$db->from('tbl_pemesanan')->insert($pemesanan)->execute();
	if($data['jenis_produk'] == 'Undangan'){
		$detail = array(
			"nama_mempelai"		=> $data['nama_mempelai'],
			"nama_orangtua"		=> $data['nama_orangtua'],
			"tgl_akadnikah"		=> $data['tgl_akadnikah'],
			"tgl_resepsi"		=> $data['tgl_resepsi'],
			"waktu_akadnikah"	=> $data['waktu_akadnikah'],
			"waktu_resepsi"		=> $data['waktu_resepsi'],
			"alamat_akadnikah"	=> $data['alamat_akadnikah'],
			"alamat_resepsi"	=> $data['alamat_resepsi'],
			"anggota_keluarga"	=> $data['anggota_keluarga'],
			"foto_lokasi"		=> $data['foto_lokasi'],
			"id_pemesanan"		=> $id_pemesanan
		);
		$db->from('tbl_detail_pesanan')->insert($detail)->execute();
	}
$msg->info('Pembelian berhasil dilakukan. Silahkan lakukan konfirmasi pembayaran pada menu DAFTAR TRANSAKSI');
header('Location: index.php');
?>
