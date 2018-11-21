<?php
session_start();
include "koneksi.php";
cekLogin('all');
$judul = "Pesan Produk";
if(isset($_GET['id_produk'])) {
	$detail = $db->from('tbl_produk')->where('id_produk',$_GET['id_produk'])->select()->one();
	$foto = $db->from('tbl_foto_produk')->where('id_produk',$_GET['id_produk'])->select()->many();
?>

<?php include "template/bagian-atas.php"; ?>

<div class="box">
<div class="box-body">
<div class="section-title">
	<h3 class="title">Detail Produk</h3>
</div>
<div class="products-big">
<div class="row products">
<?php
foreach($foto as $f){
?>
	<div class="col-md-4 col-xs-12">
	<div class="product">
	  <div class="image"><img src="<?php echo $base_url; ?>/produk/<?php echo $f['foto_produk']; ?>" width="300" height="300" alt="" class="img-fluid image1"></div>
	</div>
  </div>
<?php
}
?>
</div>
</div>
<div class="section-title">
	<h3 class="title">Informasi Pembeli</h3>
</div>
<form method="POST" action="cek-pesan.php">
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
				"col"	=>	"6"
			),
			array(
				"name"	=>	"id_kota",
				"label"	=>	"Kota Pemesan",
				"type"	=>	"select",
				"options" => $db->from('tbl_kota')->many(),
				"optionValue"	=> "id_kota",
				"optionLabel"	=> "nm_kota",
				"col"	=> "6"
			),
			array(
				"name"	=>	"alamat_pemesan",
				"label"	=>	"Alamat Pemesan",
				"type"	=>	"textarea",
				"inputType"	=>	"text",
				"col"	=> "12"
			),
			array(
				"name"	=>	"no_telp",
				"label"	=>	"Nomor Telpon",
				"type"	=>	"input",
				"inputType"	=>	"text",
				"col"	=> "6"
			),
			array(
				"name"	=>	"jumlah_pesan",
				"label"	=>	"Jumlah Pesan",
				"type"	=>	"input",
				"inputType"	=>	"number",
				"col"	=> "6"
			),
			array(
				"name"	=>	"id_produk",
				"label"	=>	null,
				"type"	=>	"input",
				"inputType"	=>	"hidden",
				"col"	=>	"6",
				"value"	=> $_GET['id_produk']
			)
		)
	)
);
formGenerator($pembeli);
?>
<div class="form-group">
  <button type="submit" class="btn btn-primary pull-right">Lanjutkan >></button>
</div>
</form>
</div>
</div>

<?php include "template/bagian-bawah.php"; ?>
<?php
}else{
	header('Location: '.$base_url);
}
?>
