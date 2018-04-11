<?php
session_start();
require "../koneksi.php";
include "../template/components.php";
include "../template/head.php";
?>
<body>
<div id="all">
<?php 
include "../template/header.php";

$produk = array(
	array(
		"name"	=>	"nm_produk",
		"label"	=>	"Nama Produk",
		"type"	=>	"input",
		"inputType"	=>	"text"
	),
	array(
		"name"	=>	"jenis_produk",
		"label"	=>	"Jenis Produk",
		"type"	=>	"select",
		"options"	=>	array(
			array(
				"jenis_produk"	=> "Souvenir"
			),
			array(
				"jenis_produk"	=> "Undangan"
			)
		),
		"optionLabel"	=> "jenis_produk",
		"optionValue"	=> "jenis_produk"
	),
	array(
		"name"	=>	"harga",
		"label"	=>	"Harga Produk",
		"type"	=>	"input",
		"inputType"	=>	"number"
	)
);
?>
<div id="content">
<div class="container">
<div class="row bar mb-0">
<div class="col-md-12">
<h2>Input Produk</h2>
<form enctype="multipart/form-data" method="POST" action="tambah-produk.php">
<?php 
formGenerator($produk);
?>
<div class="row"><div class="col-sm-4">
<div class="form-group">
	<label for="foto_produk[]">Foto Produk 1</label>
	<input id="foto_produk[]" name="foto_produk[]" type="file" class="form-control" multiple="multiple" value="">
</div>
</div><div class="col-sm-4">
<div class="form-group">
	<label for="foto_produk[]">Foto Produk 2</label>
	<input id="foto_produk[]" name="foto_produk[]" type="file" class="form-control" multiple="multiple" value="">
</div>
</div><div class="col-sm-4">
<div class="form-group">
	<label for="foto_produk[]">Foto Produk 3</label>
	<input id="foto_produk[]" name="foto_produk[]" type="file" class="form-control" multiple="multiple" value="">
</div>
</div></div>
<button type="submit"class="btn btn-lg btn-success">Simpan</button>
</form>
<?php
$pk = 'id_produk';
$table = 'tbl_produk';
$tableConf = array(
	array(
		"name"		=>	"nm_produk",
		"label"	=>	"Nama Produk"
	),
	array(
		"name"		=>	"jenis_produk",
		"label"	=>	"Jenis Produk"
	),
	array(
		"name"		=>	"harga",
		"label"	=>	"Harga"
	)
);
$url = array(
	"hapus"		=>	"hapus-produk",
	"edit"		=>	"edit-produk"
);
$dataTable = $db->from($table)->many();
echo "<hr/><h2>Daftar Produk</h2>";
tableGenerator($tableConf, $dataTable, $pk, $url);
?>
</div>

</div>
</div>
</div>

<!-- FOOTER -->
</div>
<?php include "../template/footer.php"; ?>
</div>
<!-- Javascript files-->
<?php include "../template/javascript.php"; ?>
</body>
</html>
