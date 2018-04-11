<?php
session_start();
require "../koneksi.php";
	$data = array(
		"nm_produk"		=>	$_POST['nm_produk'],
		"jenis_produk"	=>	$_POST['jenis_produk'],
		"harga"			=>	$_POST['harga']
	);
	$db->from('tbl_produk')->insert($data)->execute();
	$id = $db->insert_id;
	$foto = array();
	$x = 0;
	foreach($_FILES['foto_produk']['name'] as $f){
		$path = "../produk/";
		$path = $path.basename($f);
		move_uploaded_file($_FILES['foto_produk']['tmp_name'][$x], $path);
		$db->from('tbl_foto_produk')->insert(array("id_produk" => $id, "foto_produk"	=> $f))->execute();
		$x++;
	}
header('Location: kelola-produk.php');
?>

