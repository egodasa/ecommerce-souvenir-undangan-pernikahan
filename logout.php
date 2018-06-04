<?php
session_start();
include "koneksi.php";
unset($_SESSION['username']);
unset($_SESSION['tipe_user']);
unset($_SESSION['id_user']);
session_destroy();
header('Location: '.$base_url);
?>
