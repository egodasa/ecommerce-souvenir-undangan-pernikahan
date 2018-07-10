<?php
require_once __DIR__ . '/vendor/autoload.php';
include "db.php";
$base_url= "http://localhost/asmidar/";
$_GLOBAL['base_url'] = $base_url;
$db = new Sparrow();
$db->show_sql = true;
$db->setDb("mysqli://root:123456@localhost/db_rotan");

function cekLogin($x){
	$username = $_SESSION['username'];
	if(!isset($username)){
		header('Location: '.$_GLOBAL['base_url'].'login.php');
	}else{
		if($_SESSION['tipe_user'] != $x && $x != 'all'){
			header('Location: '.$_GLOBAL['base_url']);
		}
	}
}
function rupiah($x){
        return "Rp ".number_format($x,2,',','.');
}
$msg = new \Plasticbrain\FlashMessages\FlashMessages();
?>
