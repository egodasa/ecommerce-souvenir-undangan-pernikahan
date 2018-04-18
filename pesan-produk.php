<?php
session_start();
include "koneksi.php";
cekLogin('Pelanggan');
$judul = "Pesan Produk";
if($_SERVER['REQUEST_METHOD'] == 'POST' || !empty($_POST)) {
$detail = $db->from('tbl_produk')->where('id_produk',$_POST['id_produk'])->select()->one();
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
<form method="POST" action="cek-pesan.php">
<?php
$pembeli = array(
	array(
		"name"	=> "input_group",
		"list"	=> array(
			array(
				"name"	=>	"nama_pemesan",
				"label"	=>	"Nama Pemesan",
				"type"	=>	"input",
				"inputType"	=>	"text",
				"col"	=>	"6"
			),
			array(
				"name"	=>	"id_kota",
				"label"	=>	"Kota Pemesan",
				"type"	=>	"select",
				"options" => $db->from('tbl_kota')->many(),
				"optionValue"	=> "id_kota",
				"optionLabel"	=> "nm_kota",
				"col"	=> "6"
			),
			array(
				"name"	=>	"alamat_pemesan",
				"label"	=>	"Alamat Pemesan",
				"type"	=>	"textarea",
				"inputType"	=>	"text",
				"col"	=> "12"
			),
			array(
				"name"	=>	"no_telp",
				"label"	=>	"Nomor Telpon",
				"type"	=>	"input",
				"inputType"	=>	"text",
				"col"	=> "6"
			),
			array(
				"name"	=>	"jumlah_pesan",
				"label"	=>	"Jumlah Pesan",
				"type"	=>	"input",
				"inputType"	=>	"number",
				"col"	=> "6"
			),
			array(
				"name"	=>	"id_produk",
				"label"	=>	null,
				"type"	=>	"input",
				"inputType"	=>	"hidden",
				"col"	=>	"6",
				"value"	=> $_POST['id_produk']
			)
		)
	)
);
formGenerator($pembeli);
?>
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
