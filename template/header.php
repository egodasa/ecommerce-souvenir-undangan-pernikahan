<?php include "top-bar.php" ;?>
<!-- Navbar Start-->
<header class="nav-holder">
        <div id="navbar" role="navigation" class="navbar navbar-expand-lg nav-light">
          <div class="container"><a href="<?php echo $base_url;?>" class="navbar-brand home"><img src="<?php echo $base_url;?>/img/logo.png" alt="Universal logo" class="d-none d-md-inline-block"><img src="img/logo-small.png" alt="Universal logo" class="d-inline-block d-md-none"><span class="sr-only">Universal - go to homepage</span></a>
            <button type="button" data-toggle="collapse" data-target="#navigation" class="navbar-toggler btn-template-outlined"><span class="sr-only">Toggle navigation</span><i class="fa fa-align-justify"></i></button>
            <div id="navigation" class="navbar-collapse collapse">
              <ul class="nav navbar-nav ml-auto">
                <li class="nav-item"><a href="<?php echo $base_url; ?>/cara-pesan.php" class="dropdown-toggle">Cara Pesan <b class="caret"></b></a>
                <li class="nav-item"><a href="<?php echo $base_url; ?>/hubungi-kami.php" class="dropdown-toggle">Hubungi Kami <b class="caret"></b></a>
                <li class="nav-item"><a href="<?php echo $base_url; ?>/tentang-kami.php" class="dropdown-toggle">Tentang Kami <b class="caret"></b></a>
                <?php
					if(isset($_SESSION['username'])){
                ?>
                <li class="nav-item dropdown"><a href="javascript: void(0)" data-toggle="dropdown" class="dropdown-toggle" aria-expanded="false">Menu <b class="caret"></b></a>
                  <ul class="dropdown-menu">
					<?php
					if($_SESSION['tipe_user'] == 'Admin'){
					?>
                    <li class="dropdown-item"><a href="<?php echo $base_url;?>/admin/daftar-transaksi.php" class="nav-link"><i class="fa fa-list"></i> Daftar Transaksi</a></li>
					<li class="dropdown-item"><a href="<?php echo $base_url;?>/admin/kelola-produk.php" class="nav-link"><i class="fa fa-heart"></i> Daftar Produk</a></li>
					<li class="dropdown-item"><a href="<?php echo $base_url;?>/admin/kelola-user.php" class="nav-link"><i class="fa fa-user"></i> Daftar User</a></li>
					<li class="dropdown-item"><a href="<?php echo $base_url;?>/admin/laporan.php" class="nav-link"><i class="fa fa-list"></i> Laporan Transaksi</a></li>
					<li class="dropdown-item"><a href="<?php echo $base_url;?>/logout.php" class="nav-link"><i class="fa fa-sign-out"></i> Logout</a></li>
					<?php
					}else{
						?>
					<li class="dropdown-item"><a href="<?php echo $base_url;?>/daftar-transaksi.php" class="nav-link"><i class="fa fa-list"></i> Daftar Transaksi</a></li>
					<li class="dropdown-item"><a href="<?php echo $base_url;?>/logout.php" class="nav-link"><i class="fa fa-sign-out"></i> Logout</a></li>
					<?php
					}
					?>
                  </ul>
                </li>
                <?php
				}
                ?>
                </li>
          </div>
        </div>
      </header>
<!-- Navbar End-->
