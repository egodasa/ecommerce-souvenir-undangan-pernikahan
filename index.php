<?php
session_start();
require "koneksi.php";
$judul = 'Toko Asmindar';
if(!isset($_GET['page'])) $page = 1;
else $page = $_GET['page'];
$offset = ($page-1)*8;
$totaldata = $db->from('tbl_produk')->count();
$totalpage = ceil($totaldata/8);
$db->sql("set sql_mode = 'STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION';")->execute();
$daftarProduk = $db->from('tbl_produk')
->join('tbl_foto_produk',array('tbl_produk.id_produk' => 'tbl_foto_produk.id_produk'))->groupBy('tbl_foto_produk.id_produk')
->limit(8)->offset($offset)->many();
?>

<?php include "template/bagian-atas.php"; ?>	

<!-- MAIN -->
<div id="main" class="col-xs-12">
	<!-- STORE -->
	<div id="store">
		<!-- row -->
		<div class="row">
			<!-- AMBIL DATA DAN LOOPING PRODUK -->
			<?php
			foreach($daftarProduk as $hasil)
			 {
			?>
			<!-- Product Single -->
			<div class="col-md-3 col-sm-6 col-xs-6">
				<div class="product product-single">
					<div class="product-thumb">
						<img src="<?php echo $base_url; ?>/produk/<?php echo $hasil['foto_produk']; ?>" width="300" height="300">
					</div>
					<div class="product-body">
						<h3 class="product-price"><?php echo "Rp ".number_format($hasil['harga'],2,',','.'); ?></h3>
						<h2 class="product-name"><a href="#"><?php echo $hasil['nm_produk']; ?></a></h2>
						<div class="product-btns">
							<a href="<?php echo $base_url; ?>/pesan-produk.php?id_produk=<?php echo $hasil['id_produk']; ?>" class="primary-btn add-to-cart"><i class="fa fa-shopping-cart"></i> Pesan</a>
						</div>
					</div>
				</div>
			</div>
			<?php
			}
			?>
			<!-- /Product Single -->
			<!-- /AMBIL DATA DAN LOOPING PRODUK -->
			
			
		</div>
		<!-- /row -->
	</div>
	<!-- /STORE -->
		<!-- paginasi -->
	<div class="store-filter clearfix">
		<div class="pull-right">
			<ul class="pagination">
				<li><span class="text-uppercase">Page:</span></li>
				<?php
					for($x = 0; $x < $totalpage; $x++){
					echo '<li><a href="?page='.($x+1).'">'.($x+1).'</a><li>';  
					}
					?>
			</ul>
		</div>
	</div>
	<!-- paginasi -->
</div>
<!-- /MAIN -->


<?php include "template/bagian-bawah.php"; ?>	
