<?php
session_start();
require "../koneksi.php";
cekLogin('Admin');
$judul = "Verifikasi Pembayaran";
if($_SERVER['REQUEST_METHOD'] == 'POST'){
	$data = $_POST;
	$db->from('tbl_pembayaran')->where('id_pemesanan',$_GET['id_pemesanan'])->update($data)->execute();
	if($_POST['status_pembayaran'] == 'Diterima') $msg->success('Verifikasi pembayaran berhasil dilakukan');
	else $msg->warning('Pembayaran telah ditolak');
	header('Location: daftar-transaksi.php');
}else{
	$detail = $db->from('tbl_pembayaran')
	->join('tbl_pemesanan',array('tbl_pembayaran.id_pemesanan'=>'tbl_pemesanan.id_pemesanan', 'tbl_pembayaran.id_pemesanan' => $_GET['id_pemesanan']))
	->select()->one();
?>

<?php include "../template/bagian-atas.php"; ?>	

<div class="box">
<div class="box-body">
<div class="section-title">
	<h3 class="title">Verifikasi Pembayaran No #<?php echo $_GET['id_pemesanan']; ?></h3>
</div>
<form method="POST" action="">
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
<p>
<a href="<?php echo $base_url; ?>/konfirmasi/<?php echo $detail['foto_bukti'];?>">
	<img src="<?php echo $base_url; ?>/konfirmasi/<?php echo $detail['foto_bukti'];?>" width="300" height="300" />
</a>
</p>
<button type="submit" class="btn btn-lg btn-success" name="status_pembayaran"  value="Diterima">Terima Pembayaran</button>
<button type="submit" class="btn btn-lg btn-danger" name="status_pembayaran"  value="Ditolak">Tolak Pembayaran</button>
</form>
</div>
</div>
<?php
}
?>

<?php include "../template/bagian-bawah.php"; ?>	
