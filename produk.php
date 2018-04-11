<?php
session_start();
require "koneksi.php";
$detail = $db->from('tbl_produk')->where('id_produk',$_GET['id_produk'])->select()->one();
$foto = $db->from('tbl_foto_produk')->where('id_produk',$_GET['id_produk'])->select()->many();
include "template/head.php";
?>
<body>
<div id="all">
<?php
include "template/header.php";
include "template/components.php";
?>
<div id="content">
<div class="container">
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
		<form method="GET" action="pesan-produk.php">
		<div class="form-group">
			<label>Jumlah Pesan</label>
			<input type="number" name="jumlah_pesan" />
			<input type="hidden" name="jenis" value="<?php echo $detail['jenis_produk']; ?>" />
			<input type="hidden" name="id_produk" value="<?php echo $detail['id_produk']; ?>" />
		</div>
		<button type="submit" class="btn btn-lg btn-success">Lanjutkan Pemesanan >></button>
	</div>
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
