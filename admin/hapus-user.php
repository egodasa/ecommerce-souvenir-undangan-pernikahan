<?php
session_start();
require "../koneksi.php";
$id_user = $_GET['id_user'];
$db->from('tbl_user')->where('id_user', $id_user)->delete()->execute();
header('Location: kelola-user.php');
?>

