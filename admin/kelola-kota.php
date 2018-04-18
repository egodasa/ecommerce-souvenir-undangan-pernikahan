<?php
session_start();
require "../koneksi.php";
cekLogin('Admin');
if($_SERVER['REQUEST_METHOD'] == 'POST'){
	$db->from('tbl_kota')->insert($_POST)->execute();
}
include "../template/components.php";
include "../template/head.php";
?>
<body>
<div id="all">
<?php 
include "../template/header.php";

$kota = array(
	array(
		"name"	=> "input_group",
		"list"	=> array(
			array(
				"name"	=>	"nm_kota",
				"label"	=>	"Nama Kota",
				"type"	=>	"input",
				"inputType"	=>	"text",
				"col"	=> "6"
			),
			array(
				"name"	=>	"tarif",
				"label"	=>	"Tarif",
				"type"	=>	"input",
				"inputType"	=>	"text",
				"col"	=> "6"
			)
		)
	)
);
?>
<div id="content">
<div class="container">
<div class="row bar mb-0">
<div class="col-md-12">
<h2>Input Kota</h2>
<form method="POST" action="">
<?php
formGenerator($kota);
?>
<button type="submit"class="btn btn-lg btn-success">Simpan</button>
</form>

<?php
$pk = 'id_kota';
$table = 'tbl_kota';
$tableConf = array(
	array(
		"name"		=>	"nm_kota",
		"label"	=>	"Nama Kota"
	),
	array(
		"name"		=>	"tarif",
		"label"	=>	"Tarif"
	)
);
$url = array(
	"hapus"		=>	"hapus-kota",
	"edit"		=>	"edit-kota"
);
$dataTable = $db->from($table)->many();
echo "<hr/><h2>Daftar Kota</h2>";
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
