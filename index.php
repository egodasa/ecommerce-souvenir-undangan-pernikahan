<?php
session_start();
require "koneksi.php";
$judul = 'Toko Souvenir dan Undangan Pernikahan';
if(!isset($_GET['page'])) $page = 1;
else $page = $_GET['page'];
$offset = ($page-1)*4;
$totaldata = $db->from('tbl_produk')->count();
$totalpage = ceil($totaldata/4);
$daftarProduk = $db->sql('select *,(select b.foto_produk from tbl_foto_produk b group by b.id_produk) as foto_produk from tbl_produk')->limit(4)->offset($offset)->many();
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
<div class="col-md-12">
  <p class="text-muted lead text-center"><?php $msg->display(); ?></p>
  <div class="products-big">
	<div class="row products">
<?php
	foreach($daftarProduk as $d){
		?>
	  <div class="col-lg-3 col-md-4">
		<div class="product">
		  <div class="image"><a href="<?php echo $base_url."/produk.php?id_produk=".$d['id_produk']; ?>"><img src="<?php echo $base_url; ?>/produk/<?php echo $d['foto_produk']; ?>" alt="" class="img-fluid image1"></a></div>
		  <div class="text">
			<h3 class="h5"><a href="<?php echo $base_url."/produk.php?id_produk=".$d['id_produk']; ?>"><?php echo $d['nm_produk']; ?></a></h3>
			<p class="price"><?php echo "Rp ".number_format($d['harga'],2,',','.'); ?></p>
		  </div>
		</div>
	  </div>
		<?php
	}
?>
</div>
  </div>
  <div class="pages">
	<nav aria-label="Page navigation example" class="d-flex justify-content-center">
	  <ul class="pagination">
		<?php
		for($x = 0; $x < $totalpage; $x++){
			if($x+1 == $page){
				echo '<li class="page-item active"><a href="'.$base_url.'/index.php?page='.($x+1).'" class="page-link">'.($x+1).'</a></li>';
			}else echo '<li class="page-item"><a href="'.$base_url.'/index.php?page='.($x+1).'" class="page-link">'.($x+1).'</a></li>';
		}
		?>
	  </ul>
	</nav>
  </div>
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
