<?php
session_start();
require "koneksi.php";
$data = array(
	"username"	=> $_POST['username'],
	"password"	=> md5($_POST['password']),
	"email"		=> $_POST['email']
);
$cekUsername = $db->from('tbl_user')->where('username',$data['username'])->select('username')->many();
$cekEmail = $db->from('tbl_user')->where('email',$data['email'])->select('username')->many();
$data['tipe_user'] = 'Pelanggan';

if(count($cekUsername) != 0) header('Location: login.php?err=username');
else if(count($cekEmail) != 0) header('Location: login.php?err=email');
else {
	if($db->from('tbl_user')->insert($data)->execute()) header('Location: login.php?err=success');
		else  header('Location: login.php?err=db');
}
?>
