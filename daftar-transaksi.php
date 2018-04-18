<?php
session_start();
require "koneksi.php";
cekLogin('Pelanggan');
$judul = 'Daftar Transaksi';
include "template/head.php";
?>
<body>
<div id="all">
<?php
include "template/header.php";

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
<div class="row bar mb-0">
<div class="col-md-12">
	<h2>Daftar Transaksi</h2>
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
<th colspan=2>Aksi</th>
</tr>
</thead>
<tbody>
<?php
$no = 1;
if(count($dataTable) == 0){
	echo "<tr><td colspan=".(count($tableConf)+2).">Data Kosong</td></tr>";
}else{
	foreach($dataTable as $r){
		echo "
			<tr>
				<td>".$no."</td>";
		foreach($tableConf as $t){
			if($t['name'] == 'status_pembayaran'){
				if($r['status_pembayaran'] == null){
					echo "<td><span class='badge badge-danger'>Belum Bayar</span></td>";
				}else if($r['status_pembayaran'] == 'Diterima'){
					echo "<td><span class='badge badge-success'>".$r['status_pembayaran']."</span></td>";
				}else if($r['status_pembayaran'] == 'Diproses'){
					echo "<td><span class='badge badge-info'>".$r['status_pembayaran']."</span></td>";
				}else if($r['status_pembayaran'] == 'Ditolak'){
					echo "<td><span class='badge badge-danger'>".$r['status_pembayaran']."</span></td>";
				}
			}
			else echo "<td>".$r[$t['name']]."</td>";
			if($t['name'] == 'status_pembayaran'){
				if($r['status_pembayaran'] == null){
					echo "<td><a class='btn btn-info btn-sm' href='konfirmasi-pembayaran.php?id_pemesanan=".$r['id_pemesanan']."'>Konfirmasi Pembayaran</a></td>";
				}else if($r['status_pembayaran'] == 'Diproses') echo "<td><span class='badge badge-warning'>Menunggu Verifikasi</span></td>";
				else if($r['status_pembayaran'] == 'Diterima') echo "<td><a class='btn btn-template-main btn-sm' href='cetak-bukti.php?id_pemesanan=".$r['id_pemesanan']."'>Cetak Bukti</a></td>";
				else echo "<td><a class='btn btn-info btn-sm' href='konfirmasi-pembayaran.php?id_pemesanan=".$r['id_pemesanan']."'>Konfirmasi Ulang</a></td>";
			}
		}
		$no++;
		echo "<td><a class='btn btn-sm btn-primary' href='daftar-transaksi.php?id_pemesanan=".$r['id_pemesanan']."'>Detail Pesanan</a></td>";
	}
}
?>
</tbody>	
</table>
</div>
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
