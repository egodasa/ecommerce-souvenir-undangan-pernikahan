<?php
session_start();
require "../koneksi.php";
if(isset($_GET['id_pemesanan'])){
	$detailPesan = $db->from('tbl_pemesanan')
    ->leftJoin('tbl_pembayaran', array('tbl_pemesanan.id_pemesanan' => 'tbl_pembayaran.id_pemesanan'))
    ->join('tbl_produk', array('tbl_pemesanan.id_produk' => 'tbl_produk.id_produk'))
    ->where('tbl_pemesanan.id_pemesanan',$_GET['id_pemesanan'])->select()->one();
    if(count($detailPesan) == 0) header('Location: daftar-transaksi.php');
   }else{
	   $dataTable = $db->from('tbl_pemesanan')
	    ->leftJoin('tbl_pembayaran', array('tbl_pemesanan.id_pemesanan' => 'tbl_pembayaran.id_pemesanan'))
	    ->select(array('tbl_pemesanan.*','tbl_pembayaran.status_pembayaran'))
	    ->execute();
   }
include "../template/head.php";
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

?>
<body>
<div id="all">
<?php 
include "../template/header.php";
?>
<div id="content">
<div class="container">
	
<?php
if(isset($_GET['id_pemesanan'])){
?>
<!-- Detail transaksi-->
<div class="row">
	<div class="col-md-9 col-sm-12">
		<div class="heading">
			<h2>Detail Informasi Pembelian</h2>
		</div>
		<label for="nama_pemesan"><b>Nama Pemesan</b></label>
		<input type="hidden" name="nama_pemesan" value="<?php echo $detailPesan['nama_pemesan'];?>"/>
		<p class="form-control"><?php echo $detailPesan['nama_pemesan']; ?></p>
		
		
		<label for="alamat_pemesan"><b>Alamat Pemesan</b></label>
		<input type="hidden" name="alamat_pemesan" value="<?php echo $detailPesan['alamat_pemesan'];?>"/>
		<p class="form-control"><?php echo $detailPesan['alamat_pemesan']; ?></p>
		
		
		<label for="no_telp"><b>Nomor Telepon</b></label>
		<input type="hidden" name="no_telp" value="<?php echo $detailPesan['no_telp'];?>"/>
		<p class="form-control"><?php echo $detailPesan['no_telp']; ?></p>
		
		
		<label for="total_harga"><b>Total Harga</b></label>
		<input type="hidden" name="total_harga" value="<?php echo $detailPesan['total_harga'];?>"/>
		<p class="form-control"><?php echo $detailPesan['total_harga']; ?></p>
		
		
		<label for="jumlah_pesan"><b>Jumlah Pesan</b></label>
		<input type="hidden" name="jumlah_pesan" value="<?php echo $detailPesan['jumlah_pesan'];?>"/>
		<p class="form-control"><?php echo $detailPesan['jumlah_pesan']; ?></p>
	</div>
	<div class="col-md-3 col-sm-12">
		<?php include "../template/menu_admin.php"; ?>
	</div>
	<div class="col-md-9 col-sm-12">
		<div class="heading">
		  <h2>Detail Produk</h2>
		</div>
		<label for="nm_produk"><b>Nama Produk</b></label>
		<p class="form-control"><?php echo $detailPesan['nm_produk']; ?></p>
		
		<label for="harga_produk"><b>Harga Produk</b></label>
		<p class="form-control"><?php echo "Rp ".number_format($detailPesan['harga'],2,',','.'); ?></p>
	</div>
	<?php
	if($detailPesan['jenis_produk'] == 'Undangan'){
	?>
	<div class="col-sm-12">
		<div class="heading">
			<h2>Detail Informasi Undangan</h2>
			<label for="nama_mempelai"><b>Nama Mempelai</b></label>
			<p class="form-control"><?php echo $detailPesan['nama_mempelai']; ?></p>
			
			<label for="nama_orangtua"><b>Nama Orang Tua</b></label>
			<p class="form-control"><?php echo $detailPesan['nama_orangtua']; ?></p>
			
			
			<label for="tgl_akadnikah"><b>Tanggal Akad Nikah</b></label>
			<p class="form-control"><?php echo $detailPesan['tgl_akadnikah']; ?></p>
			
			
			<label for="tgl_resepsi"><b>Tanggal Resepsi</b></label>
			<p class="form-control"><?php echo $detailPesan['tgl_resepsi']; ?></p>
			
			
			<label for="waktu_akadnikah"><b>Jam Akad Nikah</b></label>
			<p class="form-control"><?php echo $detailPesan['waktu_akadnikah']; ?></p>
			
			
			<label for="waktu_resepsi"><b>Jam Resepsi</b></label>
			<p class="form-control"><?php echo $detailPesan['waktu_resepsi']; ?></p>
			
			
			<label for="alamat_akadnikah"><b>Alamat Akad Nikah</b></label>
			<p class="form-control"><?php echo $detailPesan['alamat_akadnikah']; ?></p>
			
			
			<label for="alamat_resepsi"><b>Alamat Resepsi</b></label>
			<p class="form-control"><?php echo $detailPesan['alamat_resepsi']; ?></p>
			
			
			<label for="anggota_keluarga"><b>Anggota Keluarga Yang Mengundang</b></label>
			<p class="form-control"><?php echo $detailPesan['anggota_keluarga']; ?></p>
			
			
			<label for="foto_lokasi"><b>Foto Denah Lokasi</b></label>
			<p class="form-control"><?php echo "<img src='$path' width='300' height='300'/>" ?></p>
			</div>
	</div>
	<?php
	}
	?>
</div>
<!--akhir  Detail transaksi-->
<?php
}else{
?>
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
		<th colspan="2">Aksi</th>
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
				if($r['status_pembayaran'] == 'Diproses'){
					echo "<td><a class='btn btn-info btn-sm' href='/skripsi/admin/verifikasi-pembayaran.php?id_pemesanan=".$r['id_pemesanan']."'>Verifikasi Pembayaran</span></td>";
				}else if($r['status_pembayaran'] == 'Diterima') echo "<td><span class='badge badge-info'>Memproses Pesanan</span></td>";
				else echo "<td><span class='badge badge-warning'>Menunggu Pembayaran</span></td>";
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
