<?php
session_start();
require "../koneksi.php";
$id_kota = $_GET['id_kota'];
$db->from('tbl_kota')->where('id_kota', $id_kota)->delete()->execute();
header('Location: kelola-kota.php');
?>

