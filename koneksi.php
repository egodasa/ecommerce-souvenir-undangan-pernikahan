<?php
require_once __DIR__ . '/vendor/autoload.php';
include "db.php";
$_GLOBAL['base_url'] = "http://ekomers.herokuapp.com";
$base_url = $_GLOBAL['base_url'];
$db = new Sparrow();
$db->show_sql = true;
$db->setDb(getenv('DATABASE_URL'));
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
function base_url(){
    return $_GLOBAL['base_url'];
}
$msg = new \Plasticbrain\FlashMessages\FlashMessages();
?>
