<?php
session_start();
require "../koneksi.php";
if($_SERVER['REQUEST_METHOD'] == 'POST'){
	$d = $_POST;
    $f = $_FILES['foto_produk']['name'];
	$path = "../produk/";
	$path = $path.basename($f);
	move_uploaded_file($_FILES['foto_produk']['tmp_name'], $path);
	$db->from('tbl_foto_produk')->where("id_foto_produk", $d['id_foto_produk'])->update(array("foto_produk"	=> $f))->execute();
}
header('Location: '.$base_url.'/admin/edit-produk.php?id_produk='.$d['id_produk']);
