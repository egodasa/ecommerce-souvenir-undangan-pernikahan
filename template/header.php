<header id="header">
  <!--header-->
  <!--/header_top-->
  <div class="header-middle">
    <!--header-middle-->
    <div class="container">
      <div class="row">
        <div class="col-md-4 clearfix">
          <div class="logo pull-left">
            <a href="index.html"><img src="<?php echo $base_url; ?>images/home/logo.png" alt=""></a>
          </div>
        </div>
        <div class="col-md-8 clearfix">
          <div class="shop-menu clearfix pull-right">
            <ul class="nav navbar-nav collapse navbar-collapse">
              <li><a href="<?php echo $base_url; ?>">Home</a></li>
              <li><a href="<?php echo $base_url; ?>/hubungi-kami.php">Hubungi Kami</a></li>
              <li><a href="<?php echo $base_url; ?>/tentang-kami.php">Tentang Kami</a></li>
              <li><a href="<?php echo $base_url; ?>/cara-pesan.php">Cara Pesan</a></li>
              <?php if(isset($_SESSION['username'])):?>
                <li><a href="<?php echo $base_url;?>/logout.php">Logout</a></li>
              <?php else: ?>
                <li><a href="<?php echo $base_url;?>/login.php">Login/Daftar</a></li>
              <?php endif; ?>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!--/header-middle-->
  <div class="header-bottom">
    <!--header-bottom-->
    <div class="container">
      <div class="row">
        <div class="col-xs-12">
          <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            </button>
          </div>
          <div class="mainmenu pull-left">
            <ul class="nav navbar-nav collapse navbar-collapse">
            <?php if(isset($_SESSION['username'])):?>
                <?php if($_SESSION['tipe_user'] == 'Admin'): ?>
                <li><a href="<?php echo $base_url;?>/admin/daftar-transaksi.php">Kelola Pesanan</a></li>
                <li><a href="<?php echo $base_url;?>/admin/kelola-user.php">Kelola User</a></li>
                <li><a href="<?php echo $base_url;?>/admin/kelola-produk.php">Kelola Produk</a></li>
                <li><a href="<?php echo $base_url;?>/admin/kelola-kota.php">Kelola Kota</a></li>
                <li><a href="<?php echo $base_url;?>/admin/laporan.php">Laporan Transaksi</a></li>
                <li><a href="<?php echo $base_url;?>/logout.php">Logout</a></li>
                <?php else: ?>
                <li><a href="<?php echo $base_url;?>/daftar-transaksi.php">Daftar Transaksi</a></li>
							<?php endif; ?>
            <?php endif; ?>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </div>
</header>
<!--/header-->
