<?php
session_start();
require "../koneksi.php";
cekLogin('Admin');
$judul = "Verifikasi Pembayaran";
if($_SERVER['REQUEST_METHOD'] == 'POST'){
	$data = $_POST;
	$db->from('tbl_pembayaran')->where('id_pemesanan',$_GET['id_pemesanan'])->update($data)->execute();
	$msg->success('Verifikasi pembayaran berhasil dilakukan');
	header('Location: daftar-transaksi.php');
}else{
	$detail = $db->from('tbl_pembayaran')
	->join('tbl_pemesanan',array('tbl_pembayaran.id_pemesanan'=>'tbl_pemesanan.id_pemesanan', 'tbl_pembayaran.id_pemesanan' => $_GET['id_pemesanan']))
	->select()->one();
include "../template/head.php";
?>
<body>
<div id="all">
<?php 
include "../template/header.php";
?>
<div id="content">
<div class="container">
<div class="row">
<div class="col-md-8 mx-auto">
<div class="heading text-center">
<h2>Verifikasi Pembayaran</h2>
</div>
<form method="POST" action="">
<h2>Verifikasi Pembayaran No #<?php echo $_GET['id_pemesanan']; ?></h2>
<input type="hidden" value="<?php echo $_GET['id_pemesanan']; ?>" name="id_pemesanan" />

<label for="nama_pembayar"><b>Nama Pembayar</b></label>
<p class="form-control"><?php echo $detail['nama_pembayar']; ?></p>
<div class="row">
	<div class="col-sm-6">
		<label for="no_rek"><b>Nomor Rekening</b></label>
		<p class="form-control"><?php echo $detail['no_rek']; ?></p>
	</div>
	<div class="col-sm-6">
		<label for="nama_bank"><b>Nama bank</b></label>
		<p class="form-control"><?php echo $detail['nama_bank']; ?></p>
	</div>
</div>
<label for="tgl_pembayaran"><b>Tanggal Pembayaran</b></label>
<p class="form-control"><?php echo $detail['tgl_pembayaran']; ?></p>
<div class="row">
	<div class="col-sm-6">
		<label for="total"><b>Total Yang Harus dibayar</b></label>
		<p class="form-control"><?php echo $detail['total_harga']; ?></p>
	</div>
	<div class="col-sm-6">
		<label for="total"><b>Total Dibayarkan</b></label>
		<p class="form-control"><?php echo $detail['total']; ?></p>
	</div>
</div>

<label for="foto_bukti"><b>Foto Bukti</b></label>
<p class="form-control"><img src="/skripsi/konfirmasi/<?php echo $detail['foto_bukti'];?>" width="100%" /></p>

<button type="submit" class="btn btn-lg btn-success" name="status_pembayaran"  value="Diterima">Terima Pembayaran</button>
<button type="submit" class="btn btn-lg btn-danger" name="status_pembayaran"  value="Ditolak">Tolak Pembayaran</button>
</form>
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
