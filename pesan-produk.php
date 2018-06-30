<?php
session_start();
include "koneksi.php";
cekLogin('Pelanggan');
$judul = 'Pesan Produk';
if(!empty($_GET['id_produk']) && !empty($_GET['jenis'])) {

$detail = $db->from('tbl_produk')->where('id_produk',$_GET['id_produk'])->select()->one();
$kota = $db->from('tbl_kota')->select()->many();
include "template/head.php";
?>
<body>
<div id="all">
<?php
include "template/header.php";
include "template/components.php";
?>
<div id="content">
<div class="container">
<div class="row">
<div class="col-md-8 mx-auto">
<div class="heading text-center">
  <h2>Informasi Pembeli</h2>
</div>
<form enctype="multipart/form-data" method="POST" action="cek-pesan.php">
<input type="hidden" name="id_produk" value="<?php echo $_GET['id_produk'];?>"/>
<input type="hidden" name="jenis_produk" value="<?php echo $_GET['jenis'];?>"/>

<?php
$pembeli = array(
	array(
		"name"	=>	"nama_pemesan",
		"label"	=>	"Nama Pemesan",
		"type"	=>	"input",
		"inputType"	=>	"text"
	),
	array(
		"name"	=>	"id_kota",
		"label"	=>	"Kota Tujuan",
		"type"	=>	"select",
		"options"	=>	$kota,
		"optionLabel"	=>	"nm_kota",
		"optionValue"	=>	"id_kota"
	),
	array(
		"name"	=>	"alamat_pemesan",
		"label"	=>	"Alamat Pemesan",
		"type"	=>	"textarea",
		"inputType"	=>	"text"
	),
	array(
		"name"	=>	"no_telp",
		"label"	=>	"Nomor Telpon",
		"type"	=>	"input",
		"inputType"	=>	"text"
	),
	array(
		"name"	=>	"total_harga",
		"label"	=>	null,
		"type"	=>	"input",
		"inputType"	=>	"hidden",
		"value"	=>	$detail['harga']*$_GET['jumlah_pesan']
	),
	array(
		"name"	=>	"jumlah_pesan",
		"label"	=>	null,
		"type"	=>	"input",
		"inputType"	=>	"hidden",
		"value"	=> $_GET['jumlah_pesan']
	)
);
formGenerator($pembeli);
?>
<?php
if($_GET['jenis'] == "Undangan"){
	?>
<div class="heading text-center">
  <h2>Informasi Undangan</h2>
</div>
<?php
$undangan = array(
	array(
		"name"	=>	"nama_mempelai",
		"label"	=>	"Nama Mempelai",
		"type"	=>	"textarea"
	),
	array(
		"name"	=>	"nama_orangtua",
		"label"	=>	"Nama Orang Tua",
		"type"	=>	"textarea"
	),
	array(
		"name"	=> "input_group",
		"list"	=> array(
			array(
				"name"	=>	"tgl_akadnikah",
				"label"	=>	"Tanggal Akad Nikah",
				"type"	=>	"input",
				"inputType"	=>	"date",
				"col"	=> "8"
			),
			array(
				"name"	=>	"waktu_akadnikah",
				"label"	=>	"Jam Akad Nikah",
				"type"	=>	"input",
				"inputType"	=>	"time",
				"col"	=> "4"
			),
			array(
				"name"	=>	"tgl_resepsi",
				"label"	=>	"Tanggal Resepsi",
				"type"	=>	"input",
				"inputType"	=>	"date",
				"col"	=> "8"
			),
			array(
				"name"	=>	"waktu_resepsi",
				"label"	=>	"Jam Resepsi",
				"type"	=>	"input",
				"inputType"	=>	"time",
				"col"	=> "4"
			),
			array(
				"name"	=>	"alamat_akadnikah",
				"label"	=>	"Alamat Akad Nikah",
				"type"	=>	"textarea",
				"col"	=>  "6"
			),
			array(
				"name"	=>	"alamat_resepsi",
				"label"	=>	"Alamat Resepsi",
				"type"	=>	"textarea",
				"col"	=>  "6"
			)
		)
	),
	array(
		"name"	=>	"anggota_keluarga",
		"label"	=>	"Anggota Keluarga Yang Mengundang",
		"type"	=>	"textarea"
	),
	array(
		"name"	=>	"foto_lokasi",
		"label"	=>	"Foto Denah Lokasi",
		"type"	=>	"input",
		"inputType" => 'file'
	)
);
formGenerator($undangan);
?>
<?php } ?>
<button type="submit" class="btn btn-lg btn-info pull-right">Lanjutkan >></button>
</form>
</div>
</div>

<!-- FOOTER -->
</div>
<?php include "template/footer.php"; ?>
</div>
<!-- Javascript files-->
<?php include "template/javascript.php"; ?>
</body>
</html>
<?php
}else{
	header('Location: index.php');
}
?>
