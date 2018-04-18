<?php
session_start();
require "koneksi.php";
cekLogin('Pelanggan');
$judul = "Konfirmasi Pembayaran";
if($_SERVER['REQUEST_METHOD'] == 'POST'){
	$data = $_POST;
	$data['foto_bukti'] = $_FILES['foto_bukti']['name'];
	$path = "konfirmasi/";
	$path = $path.basename($_FILES['foto_bukti']['name']);
	move_uploaded_file($_FILES['foto_bukti']['tmp_name'], $path);
	$db->from('tbl_pembayaran')->insert($data)->execute();
	header('Location: daftar-transaksi.php');
}else{
include "template/head.php";
?>
<body>
<div id="all">
<?php
$detail = $db->from('tbl_pemesanan')->where('id_pemesanan',$_GET['id_pemesanan'])->select()->one();
include "template/header.php";
include "template/components.php";
?>
<div id="content">
<div class="container">
<div class="row">
<div class="col-md-8 mx-auto">
<form enctype="multipart/form-data" method="POST" action="">
<div class="heading text-center">
  <h2>Konfirmasi Pembayaran</h2>
</div>
<label for="tgl_pembayaran"><b>Total Yang harus dibayar</b></label>
<p class="form-control"><?php echo $detail['total_harga']; ?></p>
<br/>
<input type="hidden" value="<?php echo $_GET['id_pemesanan']; ?>" name="id_pemesanan" />
<?php
$konfirmasi = array(
	array(
		"name"	=>	"nama_pembayar",
		"label"	=>	"Nama Pembayar",
		"type"	=>	"input",
		"inputType"	=>	"text"
	),
	array(
		"name"	=> "input_group",
		"list"	=> array(
			array(
				"name"	=>	"no_rek",
				"label"	=>	"Nomor Rekening",
				"type"	=>	"input",
				"inputType"	=>	"number",
				"col"	=>	"6"
			),
			array(
				"name"	=>	"nama_bank",
				"label"	=>	"Nama Bank",
				"type"	=>	"input",
				"inputType"	=>	"text",
				"col"	=> "6"
			),
			array(
				"name"	=>	"tgl_pembayaran",
				"label"	=>	"Tanggal Pembayaran",
				"type"	=>	"input",
				"inputType"	=>	"date",
				"col"	=>	"6"
			),
			array(
				"name"	=>	"total",
				"label"	=>	"Total Yang Dibayarkan",
				"type"	=>	"input",
				"inputType"	=>	"number",
				"col"	=> "6"
			)
		)
	),
	array(
		"name"	=>	"foto_bukti",
		"label"	=>	"Foto Bukti",
		"type"	=>	"input",
		"inputType"	=>	"file"
	)
);
formGenerator($konfirmasi);
?>
<button class="btn btn-lg btn-success" type="submit">Konfirmasi Pembayaran</button>
</form>
</div>
</div>
</div>
<?php
include "template/footer.php";
}
?>
