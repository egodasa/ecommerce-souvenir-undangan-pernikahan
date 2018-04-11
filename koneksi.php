<?php
include "db.php";
$db = new Sparrow();
$db->show_sql = true;
$db->setDb("mysqli://root:@localhost/dbsouvenir");
?>
