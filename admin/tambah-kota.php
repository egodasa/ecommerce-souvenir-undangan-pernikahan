<?php
session_start();
require "../koneksi.php";
$data = array(
	"nm_kota"	=>	$_POST['nm_kota'],
	"tarif"	=>	$_POST['tarif']
);
$db->from('tbl_user')->insert($data)->execute();
header('Location: kelola-kota.php');
?>

