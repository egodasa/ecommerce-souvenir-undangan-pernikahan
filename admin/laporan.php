<?php
session_start();
require "../koneksi.php";
cekLogin('Admin');
include "../template/head.php";

$awal = date('Y-m-d');
$akhir = date('Y-m-d');;

if(isset($_GET['awal'])) $awal = $_GET['awal'];
if(isset($_GET['akhir'])) $akhir = $_GET['akhir'];

$tableConf = array(
	array(
		"name"		=>	"nama_pemesan",
		"caption"	=>	"Nama Pemesan"
	),
	array(
		"name"		=>	"tgl_pesan",
		"caption"	=>	"Tanggal Pesan"
	),
	array(
		"name"		=>	"total_harga",
		"caption"	=>	"Total Harga"
	)
);
if(isset($_GET['awal'])){
	$dataTable = $db->from('tbl_pemesanan')->many();
}else $dataTable = $db->sql('select * from tbl_pemesanan where tgl_pesan between "'.$awal.'" and "'.$akhir.'"')->many();
?>
<body>
<div id="all">
<?php 
include "../template/header.php";
?>
<div id="content">
<div class="container">
	
<!-- START OF CONTENT -->
<h2>Laporan Transaksi</h2>
<form method="GET" action="">
<div class="row">
	<div class="col-sm-4">
		<div class="form-group">
			<label>Dari</label>
			<input type="date" name="awal" class="form-control"/>
		</div>
	</div>
	<div class="col-sm-4">
		<div class="form-group">
			<label>Hingga</label>
			<input type="date" name="akhir" class="form-control" />
		</div>
	</div>
	<div class="col-sm-4">
		<div class="form-group">
			<button tpe="submit" class="btn btn-primary">Tampilkan</button>
		</div>
	</div>
</div>
</form>
<div class="table-responsive">
<table class="table table-hover">
<thead>
	<tr>
		<th>No</th>
<?php
foreach($tableConf as $t){
	echo "<th>".$t['caption']."</th>";
}
?>
	</tr>
</thead>
<tbody>
<?php
$no = 1;
$total = 0;
if(count($dataTable) == 0){
	echo "<tr><td colspan=".(count($tableConf)+2).">Data Kosong</td></tr>";
}else{
	foreach($dataTable as $r){
		echo "
			<tr>
				<td>".$no."</td>";
		foreach($tableConf as $t){
			if($t['name'] == 'total_harga'){
				echo "<td>Rp ".number_format($r[$t['name']],2,',','.')."</td>";
			}else echo "<td>".$r[$t['name']]."</td>";
		}
		$no++;
		$total += $r['total_harga'];
		echo "</tr>";
	}
	echo "
	<tfoot>
	<tr>
	<td colspan=3>Total</td>
	<td>Rp ".number_format($total,2,',','.')."</td>
	</tr></tfoot>";
?>
	</tbody>	
</table>
</div>
</div>
</div>
<?php
}
?>
<!-- FOOTER -->
</div>
<?php include "../template/footer.php"; ?>
</div>
<!-- Javascript files-->
<?php include "../template/javascript.php"; ?>
</body>
</html>
