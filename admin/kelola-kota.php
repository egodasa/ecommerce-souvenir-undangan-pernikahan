<?php
session_start();
require "../koneksi.php";
cekLogin('Admin');
$judul = 'Daftar Kota';
if($_SERVER['REQUEST_METHOD'] == 'POST'){
	$db->from('tbl_kota')->insert($_POST)->execute();
}

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
<?php include "../template/bagian-atas.php"; ?>	

<div class="row bar mb-0">
<div class="col-md-12">
<div class="section-title">
	<h3 class="title">Input Kota</h3>
</div>
<form method="POST" action="">
<?php
formGenerator($kota);
?>
<button type="submit"class="btn btn-success">Simpan</button>
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
?>
<div class="section-title">
	<h3 class="title">Daftar Kota</h3>
</div>
<?php
tableGenerator($tableConf, $dataTable, $pk, $url);
?>
</div>

</div>
</div>
</div>

<?php include "../template/bagian-bawah.php"; ?>	
