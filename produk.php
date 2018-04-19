<?php
session_start();
require "koneksi.php";
cekLogin('all');
$judul = "Detail Produk";
$detail = $db->from('tbl_produk')->where('id_produk',$_GET['id_produk'])->select()->one();
$foto = $db->from('tbl_foto_produk')->where('id_produk',$_GET['id_produk'])->select()->many();
?>

<?php include "template/bagian-atas.php"; ?>

<div class="row bar">
	<div class="col-sm-12">
		<div class="row">
			<div class="col-md-6">
				<div class="pull-left">
					<p class="text-muted lead text-center"><?php echo $detail['nm_produk']; ?></p>
				</div>
			</div>
			<div class="col-md-6">
				<div class="pull-right">
					<p class="price">Harga <?php echo "Rp ".number_format($detail['harga'],2,',','.'); ?></p>
				</div>
			</div>
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
	</div>
	<div class="col-sm-12">
		<form method="POST" action="pesan-produk.php">
		<div class="form-group">
			<input type="hidden" name="id_produk" value="<?php echo $detail['id_produk']; ?>" />
		</div>
		<button type="submit" class="btn btn-lg btn-success">Lanjutkan Pemesanan >></button>
	</div>
</div>
</div>
</div>

<?php include "template/bagian-bawah.php"; ?>
