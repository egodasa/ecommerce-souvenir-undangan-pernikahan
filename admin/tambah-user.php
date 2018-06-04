<?php
session_start();
require "../koneksi.php";
$data = array(
	"username"	=>	$_POST['username'],
	"password"	=>	md5($_POST['password']),
	"email"		=>	$_POST['email'],
	"tipe_user"	=>	$_POST['tipe_user']
);
$db->from('tbl_user')->insert($data)->execute();
header('Location: kelola-user.php');
?>

