<?php
include "sparrow.php";
$db = new Sparrow();
$db->setDb("mysqli://root:qwe123*iop@localhost/dbcat");

$dosen = $db->from('tbdosen')->many();
foreach($dosen as $r){
	echo $r['nidn']." | ".$r['nm_dosen']."<br/>";
};

//insert
$data = [
		"nidn" => "12312312312310",
		"nm_dosen"=> 'Sparrow query builder 2'
];
$dosen = $db->from('tbdosen')->many();
echo $db->from('tbdosen')->insert($data)->execute();
echo $db->from('tbdosen')->update($data)->where("nidn",'121233')->execute();
?>
