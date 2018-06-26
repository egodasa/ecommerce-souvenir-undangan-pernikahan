<?php
session_start();
$judul = "Edit Produk";
require "../koneksi.php";
if($_SERVER['REQUEST_METHOD'] == 'POST'){
	$d = $_POST;
	$db->from('tbl_produk')->where('id_produk', $_GET['id_produk'])->update(array('nm_produk' => $d['nm_produk'],'harga' => $d['harga']))->execute();
    $x = 0;
    foreach($_FILES['foto_produk']['name'] as $f){
		$path = "../produk/";
		$path = $path.basename($f);
		move_uploaded_file($_FILES['foto_produk']['tmp_name'][$x], $path);
		$db->from('tbl_foto_produk')->where("id_foto_produk", $d['id_foto_produk'][$x])->update(array("foto_produk" => $id, "foto_produk"	=> $f))->execute();
		$x++;
	}
	header('Location: '.$base_url.'/admin/kelola-produk.php');
}else{
	if(!isset($_GET['id_produk'])){
		header('Location: '.$base_url);
	}
	$detail = $db->from('tbl_produk')->where('id_produk',$_GET['id_produk'])->select()->one();
	$detailProduk = $db->from('tbl_foto_produk')->where('id_produk',$_GET['id_produk'])->select()->many();

$produk = array(
	array(
		"name"	=>	"nm_produk",
		"label"	=>	"Nama Produk",
		"type"	=>	"input",
		"inputType"	=>	"text",
		"value"	=> $detail['nm_produk']
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
<hr>
<h2>Edit Foto Produk</h2>
<div class="row">
<?php
$x = 1;
foreach($detailProduk as $p):
?>
<div class="col-sm-4">
<div class="form-group">
    <form method="POST" enctype="multipart/form-data" action="<?=$base_url;?>/admin/edit-foto-produk.php">
    <img src="<?=$base_url;?>/produk/<?=$p['foto_produk'];?>" width="200" height="200" />
	<input name="foto_produk" type="file" class="form-control">
	<input name="id_foto_produk" type="hidden" class="form-control" value="<?=$p['id_foto_produk']?>">
	<input name="id_produk" type="hidden" class="form-control" value="<?=$_GET['id_produk']?>">
    <br/>
    <button type="submit"class="btn btn-primary">Edit Foto</button>
    </form>
</div>
</div>
<?php $x++; endforeach;?>
</div>

</div>
</div>
</div>

<?php
include "../template/bagian-bawah.php";
}
?>
