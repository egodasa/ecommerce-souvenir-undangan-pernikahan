<?php
session_start();
require 'koneksi.php';
cekLogin('all');
$judul = "Cek Pesan";
$hrg_kota = $db->from('tbl_kota')->where('id_kota',$_POST['id_kota'])->one();
$hrg_produk = $db->from('tbl_produk')->where('id_produk',$_POST['id_produk'])->one();

$detail = $db->from('tbl_produk')->where('id_produk',$_POST['id_produk'])->select()->one();
$foto = $db->from('tbl_foto_produk')->where('id_produk',$_POST['id_produk'])->select()->many();
if($_SERVER['REQUEST_METHOD'] == 'POST'){
?>

<?php include "template/bagian-atas.php"; ?>

<div class="row">
<div class="col-md-8 mx-auto">
<div class="heading text-center">
  <h2>Produk Yang Dipesan</h2>
</div>
<div class="products-big">
<div class="row products">
<?php
foreach($foto as $f){
?>
	<div class="col-md-4 col-xs-12">
	<div class="product">
	  <div class="image"><img src="<?php echo $base_url; ?>/produk/<?php echo $f['foto_produk']; ?>" alt="" class="img-fluid image1"></div>
	</div>
  </div>
<?php
}
?>
</div>
</div>
<div class="heading text-center">
  <h2>Detail Informasi Pembeli</h2>
</div>
<p>*Silahkan cek semua informasi dibawah ini sebelum melanjutkan proses pemesanan...</p>
<form method="POST" action="simpan-pesan.php">
<?php
$pembeli = array(
	array(
		"name"	=> "input_group",
		"list"	=> array(
			array(
				"name"	=>	"nama_pemesan",
				"label"	=>	"Nama Pemesan",
				"type"	=>	"input",
				"inputType"	=>	"text",
				"col"	=>	"6",
				"value"	=>  $_POST['nama_pemesan'],
				"readonly"	=> true
			),
			array(
				"name"	=>	"id_kota",
				"label"	=>	"Kota Tujuan",
				"type"	=>	"select",
				"options" => $db->from('tbl_kota')->many(),
				"optionValue"	=> "id_kota",
				"optionLabel"	=> "nm_kota",
				"col"	=> "3",
				"value"	=>  $_POST['id_kota'],
				"readonly"	=> true
			),
			array(
				"name"	=>	"kota",
				"label"	=>	"Tarif",
				"type"	=>	"input",
				"inputType"	=>	"text",
				"col"	=>	"3",
				"value"	=>  "Rp ".number_format($hrg_kota['tarif'],2,',','.'),
				"disabled"	=> true
			),
			array(
				"name"	=>	"alamat_pemesan",
				"label"	=>	"Alamat Pemesan",
				"type"	=>	"textarea",
				"inputType"	=>	"text",
				"col"	=> "12",
				"value"	=>  $_POST['alamat_pemesan'],
				"readonly"	=> true
			),
			array(
				"name"	=>	"no_telp",
				"label"	=>	"Nomor Telpon",
				"type"	=>	"input",
				"inputType"	=>	"text",
				"col"	=> "6",
				"value"	=>  $_POST['no_telp'],
				"readonly"	=> true
			),
			array(
				"name"	=>	"jumlah_pesan",
				"label"	=>	"Jumlah Pesan",
				"type"	=>	"input",
				"inputType"	=>	"number",
				"readonly"	=> true,
				"col"	=> "6",
				"value"	=>  $_POST['jumlah_pesan'],
				"readonly"	=> true
			),
			array(
				"name"	=>	"harga_produk",
				"label"	=>	"Harga Produk",
				"type"	=>	"input",
				"inputType"	=>	"text",
				"col"	=>	"4",
				"value"	=>  "Rp ".number_format($hrg_produk['harga'],2,',','.'),
				"disabled"	=> true
			),
			array(
				"name"	=>	"total_harga",
				"label"	=>	"Total Harga",
				"type"	=>	"input",
				"inputType"	=>	"number",
				"value"	=> ($_POST['jumlah_pesan'] * $hrg_produk['harga']) + $hrg_kota['tarif'],
				"readonly"	=> true,
				"col"	=> "8",
				"readonly"	=> true
			),
			array(
				"name"	=>	"id_produk",
				"label"	=>	null,
				"type"	=>	"input",
				"inputType"	=>	"hidden",
				"col"	=>	"6",
				"value"	=> $_POST['id_produk']
			)
		)
	)
);
formGenerator($pembeli);
?>
<button type="submit" class="btn btn-lg btn-info pull-right">Pesan >></button>
</form>
</div>
</div>
</div>

<?php include "template/bagian-bawah.php"; ?>
