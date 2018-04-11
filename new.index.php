<div class="row bar">
<div class="col-md-12">
  <p class="text-muted lead text-center">Menjual Souvenir dan Undangan Pernikahan terbaik...</p>
  <div class="products-big">
	<div class="row products">
	  <div class="col-lg-3 col-md-4">
		<div class="product">
		  <div class="image"><a href="shop-detail.html"><img src="img/product1.jpg" alt="" class="img-fluid image1"></a></div>
		  <div class="text">
			<h3 class="h5"><a href="shop-detail.html"><?php echo $d['nm_produk']; ?></a></h3>
			<p class="price"><?php echo "Rp ".number_format($d['harga'],2,',','.'); ?></p>
		  </div>
		</div>
	  </div>
	</div>
  </div>
  <div class="pages">
	<p class="loadMore text-center"><a href="#" class="btn btn-template-outlined"><i class="fa fa-chevron-down"></i> Load more</a></p>
	<nav aria-label="Page navigation example" class="d-flex justify-content-center">
	  <ul class="pagination">
		<li class="page-item"><a href="#" class="page-link"> <i class="fa fa-angle-double-left"></i></a></li>
		<li class="page-item active"><a href="#" class="page-link">1</a></li>
		<li class="page-item"><a href="#" class="page-link">2</a></li>
		<li class="page-item"><a href="#" class="page-link">3</a></li>
		<li class="page-item"><a href="#" class="page-link">4</a></li>
		<li class="page-item"><a href="#" class="page-link">5</a></li>
		<li class="page-item"><a href="#" class="page-link"><i class="fa fa-angle-double-right"></i></a></li>
	  </ul>
	</nav>
  </div>
</div>
</div>
