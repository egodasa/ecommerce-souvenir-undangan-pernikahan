<?php
session_start();
require "../koneksi.php";
$judul = "Edit Data Kota";
if($_SERVER['REQUEST_METHOD'] == 'POST'){
	$d = $_POST;
	$db->from('tbl_kota')->where('id_kota', $_GET['id_kota'])->update($d)->execute();
	header('Location: '.$base_url.'/admin/kelola-kota.php');
}else{
	if(!isset($_GET['id_kota'])){
		header('Location: '.$base_url);
	}
	$detail = $db->from('tbl_kota')->where('id_kota',$_GET['id_kota'])->select()->one();
	include "../template/components.php";
	include "../template/head.php";
?>
<body>
<div id="all">
<?php 
include "../template/header.php";

$kota = array(
	array(
		"name"	=>	"nm_kota",
		"label"	=>	"Nama kota",
		"type"	=>	"input",
		"inputType"	=>	"text",
		"value"	=> $detail['nm_kota']
	),
	array(
		"name"	=>	"tarif",
		"label"	=>	"Tarif Pengiriman",
		"type"	=>	"input",
		"inputType"	=>	"text",
		"value"	=> $detail['tarif']
	)
);
?>
<div id="content">
<div class="container">
<div class="row bar mb-0">
<div class="col-md-12">
<h2>Edit Data Kota</h2>
<form method="POST" action="">
<?php 
formGenerator($kota);
?>
<button type="submit"class="btn btn-lg btn-success">Edit</button>
</form>

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
<?php
}
?>
