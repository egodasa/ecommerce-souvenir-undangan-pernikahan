<?php
require_once __DIR__ . '/vendor/autoload.php';
include "db.php";
$_GLOBAL['base_url'] = "http://ekomers.herokuapp.com";
$base_url = $_GLOBAL['base_url'];
$db = new Sparrow();
$db->show_sql = true;
//database
$db->setDb(getenv('DATABASE_URL'));
$db->setDb(array(
    'type' => 'pgsql',
    'hostname' => 'https://ec2-184-73-174-171.compute-1.amazonaws.com',
    'database' => 'd775vshpuv9cs0',
    'username' => 'ijmyzlwbtnvjlp',
    'password' => '5a7b14c8dfcb7d5f9417ea0296d6c3d1a51ec5e26a087a08f0a43dbcebe757ce'
));
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
