<?php
session_start();
require "../koneksi.php";
$id_produk = $_GET['id_produk'];
$db->from('tbl_produk')->where('id_produk', $id_produk)->delete()->execute();
header('Location: kelola-produk.php');
?>

