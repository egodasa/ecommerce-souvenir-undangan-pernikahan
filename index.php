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
<div class="row">
  <div class="col-sm-12">
    <div class="features_items"><!--features_items-->
      <h2 class="title text-center">Daftar Produk</h2>
<!-- AMBIL DATA DAN LOOPING PRODUK -->
<?php
foreach($daftarProduk as $hasil)
 {
?>
<!-- Product Single -->
<div class="col-sm-3">
  <div class="product-image-wrapper">
    <div class="single-products">
      <div class="productinfo text-center">
        <img src="<?php echo $base_url; ?>/produk/<?php echo $hasil['foto_produk']; ?>" alt="<?php echo $hasil['nm_produk']; ?>" height="250">
        <h2><?php echo "Rp ".number_format($hasil['harga'],2,',','.'); ?></h2>
        <p><?php echo $hasil['nm_produk']; ?></p>
        <a href="<?php echo $base_url; ?>/pesan-produk.php?id_produk=<?php echo $hasil['id_produk']; ?>" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Pesan Produk Ini</a>
      </div>
    </div>
  </div>
</div>
<!-- EOF Product -->
<?php
}
?>
    </div>
  </div>
</div>


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



<?php include "template/bagian-bawah.php"; ?>	
