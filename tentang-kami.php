<?php
session_start();
include "template/head.php";
?>
<body>
<div id="all">
<?php
include "template/header.php";
require "koneksi.php";
$tableConf = array(
	array(
		"name"		=>	"nama_pemesan",
		"caption"	=>	"Nama Pemesan"
	),
	array(
		"name"		=>	"total_harga",
		"caption"	=>	"Total Harga"
	),
	array(
		"name"		=>	"tgl_pesan",
		"caption"	=>	"Tanggal Pesan"
	),
	array(
		"name"		=>	"status_pembayaran",
		"caption"	=>	"Status Pembayaran"
	)
);
$dataTable = $db->from('tbl_pemesanan')
    ->leftJoin('tbl_pembayaran', array('tbl_pemesanan.id_pemesanan' => 'tbl_pembayaran.id_pemesanan'))
    ->select(array('tbl_pemesanan.*','tbl_pembayaran.status_pembayaran'))
    ->execute();
?>
<div id="content">
<div class="container">
	
	
	

<!-- START OF CONTENT -->
<div class="box">
	<div class="box-body">
		<h2>Cara Pesan</h2>
	ATestsdfsndfndsnfsfn
	</div>
</div>
<!-- END OF CONTENT -->

<!-- FOOTER -->
</div>
<?php include "template/footer.php"; ?>
</div>
<!-- Javascript files-->
<?php include "template/javascript.php"; ?>
</body>
</html>
