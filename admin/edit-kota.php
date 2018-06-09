<?php
session_start();
require "../koneksi.php";
$judul = "Edit Informasi Kota";
if($_SERVER['REQUEST_METHOD'] == 'POST'){
	$d = $_POST;
	$db->from('tbl_kota')->where('id_kota', $_GET['id_kota'])->update($d)->execute();
	header('Location: '.$base_url.'/admin/kelola-kota.php');
}else{
	if(!isset($_GET['id_kota'])){
		header('Location: '.$base_url);
	}
	$detail = $db->from('tbl_kota')->where('id_kota',$_GET['id_kota'])->select()->one();

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
		"label"	=>	"Tarif",
		"type"	=>	"input",
        "inputType"	=>	"number",
		"value"	=> $detail['tarif']
	)
);
?>

<?php include "../template/bagian-atas.php"; ?>	

<div class="box">
<div class="box-body">
<h2>Edit Informasi kota</h2>
<form method="POST" action="">
<?php 
formGenerator($kota);
?>
<button type="submit"class="btn btn-lg btn-success">Edit</button>
</form>

</div>
</div>
</div>

<?php include "../template/bagian-bawah.php"; ?>	


<?php
}
?>
