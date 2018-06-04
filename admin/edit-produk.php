<?php
session_start();
require "../koneksi.php";
if($_SERVER['REQUEST_METHOD'] == 'POST'){
	$d = $_POST;
	$db->from('tbl_produk')->where('id_produk', $_GET['id_produk'])->update($d)->execute();
	header('Location: '.$base_url.'/admin/kelola-produk.php');
}else{
	if(!isset($_GET['id_produk'])){
		header('Location: '.$base_url);
	}
	$detail = $db->from('tbl_produk')->where('id_produk',$_GET['id_produk'])->select()->one();

$produk = array(
	array(
		"name"	=>	"nm_produk",
		"label"	=>	"Nama Produk",
		"type"	=>	"input",
		"inputType"	=>	"text",
		"value"	=> $detail['nm_produk']
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
		"optionValue"	=> "jenis_produk",
		"value"	=> $detail['jenis_produk']
	),
	array(
		"name"	=>	"harga",
		"label"	=>	"Harga Produk",
		"type"	=>	"input",
		"inputType"	=>	"number",
		"value"	=> $detail['harga']
	)
);
?>

<?php include "../template/bagian-atas.php"; ?>	

<div class="box">
<div class="box-body">
<h2>Edit Informasi Produk</h2>
<form method="POST" action="">
<?php 
formGenerator($produk);
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
