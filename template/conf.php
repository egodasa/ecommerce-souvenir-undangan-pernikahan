<?php
session_start();
$base_url = "http://localhost/rotan";
function cekLogin(){
	if(!isset($_SESSION['username'])) {
		header("Location: ".$base_url."/login.php");
	}
}
?>
