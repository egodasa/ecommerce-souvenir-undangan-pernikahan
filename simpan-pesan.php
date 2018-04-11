<?php
session_start();
require "koneksi.php";
print_r($_POST);
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
			"id_pemesanan"		=> $db->insert_id
		);
		$db->from('tbl_detail_pesanan')->insert($detail)->execute();
	}
header('Location: index.php');
?>
