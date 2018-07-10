<?php
session_start();
require "koneksi.php";
require "./template/components.php";
cekLogin('Pelanggan');
$judul = 'Konfirmasi Pembayaran';
if($_SERVER['REQUEST_METHOD'] == 'POST'){
	parse_str($_SERVER['QUERY_STRING'], $qt);
	$data = $_POST;
	$data['foto_bukti'] = $_FILES['foto_bukti']['name'];
	$path = "konfirmasi/";
	$path = $path.basename($_FILES['foto_bukti']['name']);
	move_uploaded_file($_FILES['foto_bukti']['tmp_name'], $path);
	if(isset($qt['ulang'])){
		$data['status_pembayaran'] = 'Diproses';
		$msg->success('Konfirmasi ulang berhasil dilakukan.');
		$db->from('tbl_pembayaran')->where('id_pemesanan',$qt['id_pemesanan'])->update($data)->execute();
	}else {
		$msg->success('Konfirmasi pembayaran berhasil dilakukan');
		$db->from('tbl_pembayaran')->insert($data)->execute();
	}
	header('Location: daftar-transaksi.php');
}else{
	$detail = $db->from('tbl_pemesanan')->where('id_pemesanan',$_GET['id_pemesanan'])->select()->one();
?>

<?php include "template/bagian-atas.php"; ?>

<div class="box">
<div class="box-body">
<?php
$msg->display();
?>
<form enctype="multipart/form-data" method="POST" action="">
<div class="heading text-center">
  <h2>Konfirmasi Pembayaran</h2>
</div>
<label for="tgl_pembayaran"><b>Total Yang harus dibayar</b></label>
<p class="form-control"><?php echo rupiah($detail['total_harga']); ?></p>
<br/>
<input type="hidden" value="<?php echo $_GET['id_pemesanan']; ?>" name="id_pemesanan" />
<?php
$konfirmasi = array(
	array(
		"name"	=>	"nama_pembayar",
		"label"	=>	"Nama Pembayar",
		"type"	=>	"input",
		"inputType"	=>	"text"
	),
	array(
		"name"	=> "input_group",
		"list"	=> array(
			array(
				"name"	=>	"no_rek",
				"label"	=>	"Nomor Rekening",
				"type"	=>	"input",
				"inputType"	=>	"number",
				"col"	=>	"6"
			),
			array(
				"name"	=>	"nama_bank",
				"label"	=>	"Nama Bank",
				"type"	=>	"input",
				"inputType"	=>	"text",
				"col"	=> "6"
			),
			array(
				"name"	=>	"tgl_pembayaran",
				"label"	=>	"Tanggal Pembayaran",
				"type"	=>	"input",
				"inputType"	=>	"date",
				"col"	=>	"6"
			),
			array(
				"name"	=>	"total",
				"label"	=>	"Total Yang Dibayarkan",
				"type"	=>	"input",
				"inputType"	=>	"number",
				"col"	=> "6"
			)
		)
	),
	array(
		"name"	=>	"foto_bukti",
		"label"	=>	"Foto Bukti",
		"type"	=>	"input",
		"inputType"	=>	"file"
	)
);
formGenerator($konfirmasi);
?>
<button class="btn btn-lg btn-success" type="submit">Konfirmasi Pembayaran</button>
</form>


</div>
</div>

<?php include "template/bagian-bawah.php";
}?>
