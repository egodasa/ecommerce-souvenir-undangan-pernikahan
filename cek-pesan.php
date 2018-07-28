<?php
session_start();
require 'koneksi.php';
cekLogin('all');
$judul = 'Cek Pesan';
if($_SERVER['REQUEST_METHOD'] == 'POST'){
include "template/head.php";
?>
<body>
<div id="all">
<?php
include "template/header.php";
include "template/components.php";
$diskon = 0;
$ket_diskon = 0;
if($_POST['jumlah_pesan'] >= 500 && $_POST['jumlah_pesan'] <= 1000){
  $diskon = 10/100;
  $ket_diskon = " (Diskon sebesar 10%)";
}else if($_POST['jumlah_pesan'] > 1000 && $_POST['jumlah_pesan'] <= 1500){
  $diskon = 20/100;
  $ket_diskon = " (Diskon sebesar 20%)";
}else if($_POST['jumlah_pesan'] > 1500){
  $diskon = 30/100;
  $ket_diskon = " (Diskon sebesar 30%)";
}
$total_harga = ($_POST['total_harga']) - ($_POST['total_harga']*$diskon);
$kota = $db->from('tbl_kota')->where("id_kota",$_POST['id_kota'])->select()->one();
?>
<div id="content">
<div class="container">
<div class="row">
<div class="col-md-8 mx-auto">
<div class="heading text-center">
  <h2>Detail Informasi Pembeli</h2>
</div>
<p>*Silahkan cek semua informasi dibawah ini sebelum melanjutkan proses pemesanan...</p>
<form method="POST" action="simpan-pesan.php">
<input type="hidden" name="id_produk" value="<?php echo $_POST['id_produk'];?>"/>
<input type="hidden" name="jenis_produk" value="<?php echo $_POST['jenis_produk'];?>"/>
<input type="hidden" name="id_user" value="8"/>

<label for="nama_pemesan"><b>Nama Pemesan</b></label>
<input type="hidden" name="nama_pemesan" value="<?php echo $_POST['nama_pemesan'];?>"/>
<p class="form-control"><?php echo $_POST['nama_pemesan']; ?></p>
<br/>

<label for="kota"><b>Kota Tujuan</b></label>
<input type="hidden" name="id_kota" value="<?php echo $_POST['id_kota'];?>"/>
<p class="form-control"><?php echo $kota['nm_kota']." (Biaya Pengiriman ".$kota['tarif'].")"; ?></p>
<br/>

<label for="alamat_pemesan"><b>Alamat Pemesan</b></label>
<input type="hidden" name="alamat_pemesan" value="<?php echo $_POST['alamat_pemesan'];?>"/>
<p class="form-control"><?php echo $_POST['alamat_pemesan']; ?></p>
<br/>

<label for="no_telp"><b>Nomor Telepon</b></label>
<input type="hidden" name="no_telp" value="<?php echo $_POST['no_telp'];?>"/>
<p class="form-control"><?php echo $_POST['no_telp']; ?></p>
<br/>

<label for="total_harga"><b>Total Harga</b></label>
<input type="hidden" name="total_harga" value="<?php echo ($total_harga+$kota['tarif']);?>"/>
<p class="form-control"><?php echo ($total_harga+$kota['tarif']).$ket_diskon; ?></p>
<br/>

<label for="jumlah_pesan"><b>Jumlah Pesan</b></label>
<input type="hidden" name="jumlah_pesan" value="<?php echo $_POST['jumlah_pesan'];?>"/>
<p class="form-control"><?php echo $_POST['jumlah_pesan']; ?></p>
<br/>
<?php

if($_POST['jenis_produk'] == "Undangan"){
$path = "lokasi/";
$path = $path.basename($_FILES['foto_lokasi']['name']);
move_uploaded_file($_FILES['foto_lokasi']['tmp_name'], $path);
?>
<div class="heading text-center">
  <h2>Detail Informasi Undangan</h2>
</div>
<label for="nama_mempelai"><b>Nama Mempelai</b></label>
<input type="hidden" name="nama_mempelai" value="<?php echo $_POST['nama_mempelai'];?>"/>
<p class="form-control"><?php echo $_POST['nama_mempelai']; ?></p>
<br/>
<label for="nama_orangtua"><b>Nama Orang Tua</b></label>
<input type="hidden" name="nama_orangtua" value="<?php echo $_POST['nama_orangtua'];?>"/>
<p class="form-control"><?php echo $_POST['nama_orangtua']; ?></p>
<br/>

<label for="tgl_akadnikah"><b>Tanggal Akad Nikah</b></label>
<input type="hidden" name="tgl_akadnikah" value="<?php echo $_POST['tgl_akadnikah'];?>"/>
<p class="form-control"><?php echo $_POST['tgl_akadnikah']; ?></p>
<br/>

<label for="tgl_resepsi"><b>Tanggal Resepsi</b></label>
<input type="hidden" name="tgl_resepsi" value="<?php echo $_POST['tgl_resepsi'];?>"/>
<p class="form-control"><?php echo $_POST['tgl_resepsi']; ?></p>
<br/>

<label for="waktu_akadnikah"><b>Jam Akad Nikah</b></label>
<input type="hidden" name="waktu_akadnikah" value="<?php echo $_POST['waktu_akadnikah'];?>"/>
<p class="form-control"><?php echo $_POST['waktu_akadnikah']; ?></p>
<br/>

<label for="waktu_resepsi"><b>Jam Resepsi</b></label>
<input type="hidden" name="waktu_resepsi" value="<?php echo $_POST['waktu_resepsi'];?>"/>
<p class="form-control"><?php echo $_POST['waktu_resepsi']; ?></p>
<br/>

<label for="alamat_akadnikah"><b>Alamat Akad Nikah</b></label>
<input type="hidden" name="alamat_akadnikah" value="<?php echo $_POST['alamat_akadnikah'];?>"/>
<p class="form-control"><?php echo $_POST['alamat_akadnikah']; ?></p>
<br/>

<label for="alamat_resepsi"><b>Alamat Resepsi</b></label>
<input type="hidden" name="alamat_resepsi" value="<?php echo $_POST['alamat_resepsi'];?>"/>
<p class="form-control"><?php echo $_POST['alamat_resepsi']; ?></p>
<br/>

<label for="anggota_keluarga"><b>Anggota Keluarga Yang Mengundang</b></label>
<input type="hidden" name="anggota_keluarga" value="<?php echo $_POST['anggota_keluarga'];?>"/>
<p class="form-control"><?php echo $_POST['anggota_keluarga']; ?></p>
<br/>

<label for="foto_lokasi"><b>Foto Denah Lokasi</b></label>
<input type="hidden" name="foto_lokasi" value="<?php echo $_FILES['foto_lokasi']['name'];?>"/>
<p class="form-control"><?php echo "<img src='$path' width='300' height='300'/>" ?></p>
<br/>
<?php
}
?>
<button class="btn btn-lg btn-success pull-right" type="submit">Pesan Produk >></button>
</form>
</div>
</div>
</div>

<!-- FOOTER -->
</div>
<?php include "template/footer.php"; ?>
</div>
<!-- Javascript files-->
<?php include "template/javascript.php"; ?>
</body>
</html>
<?php
}else{
	header('Location: index.php');
}
?>
