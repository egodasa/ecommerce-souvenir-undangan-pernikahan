<?php
session_start();
unset($_SESSION['username']);
unset($_SESSION['tipe_user']);
unset($_SESSION['id_user']);
session_destroy();
header('Location: /skripsi');
?>
