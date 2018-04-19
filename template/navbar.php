<div id="navigation">
	<!-- container -->
	<div class="container">
		<div id="responsive-nav">
			<!-- menu nav -->
			<div class="menu-nav">
				<span class="menu-header">Menu <i class="fa fa-bars"></i></span>
				<ul class="menu-list">
					<li><a href="<?php echo $base_url; ?>">Home</a></li>
					<li><a href="<?php echo $base_url; ?>/hubungi-kami.php">Hubungi Kami</a></li>
					<li><a href="<?php echo $base_url; ?>/tentang-kami.php">Tentang Kami</a></li>
					<li><a href="<?php echo $base_url; ?>/cara-pesan.php">Cara Pesan</a></li>
					
					<?php
						if(isset($_SESSION['username'])){
	                ?>
	                <li class="dropdown default-dropdown"><a class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false">Menu <i class="fa fa-caret-down"></i></a>
						<ul class="custom-menu">
							<?php
							if($_SESSION['tipe_user'] == 'Admin'){
							?>
		                    <li><a href="<?php echo $base_url;?>/admin/daftar-transaksi.php" class="nav-link"><i class="fa fa-list"></i> Kelola Pesanan</a></li>
							<li><a href="<?php echo $base_url;?>/admin/kelola-user.php" class="nav-link"><i class="fa fa-user"></i> Kelola User</a></li>
							<li><a href="<?php echo $base_url;?>/admin/kelola-produk.php" class="nav-link"><i class="fa fa-list"></i> Kelola Produk</a></li>
							<li><a href="<?php echo $base_url;?>/admin/kelola-kota.php" class="nav-link"><i class="fa fa-list"></i> Kelola Kota</a></li>
							<li><a href="<?php echo $base_url;?>/admin/laporan.php" class="nav-link"><i class="fa fa-list"></i> Laporan Transaksi</a></li>
							<li><a href="<?php echo $base_url;?>/logout.php" class="nav-link"><i class="fa fa-sign-out"></i> Logout</a></li>
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
						</ul>
					</li>
				</ul>
			</div>
			<!-- menu nav -->
		</div>
	</div>
	<!-- /container -->
</div>
<!-- BREADCRUMB -->
<div id="breadcrumb">
	<div class="container">
		<ul class="breadcrumb">
			<li><a href="#">Beranda</a></li>
			<?php
			$url_tmp = strtok($_SERVER["REQUEST_URI"],'?');
			if(is_array($url_tmp)){
				$url_tmp = $url_tmp[0];
			}
			$url_slash = explode('.',$url_tmp);
			$url = explode('/',$url_slash[0]);
			foreach($url as $u){
				if(!empty($u)){
					echo '<li class="active"><a href="#">'.$u.'</a></li>';
				}
			}
			?>
		</ul>
	</div>
</div>
<!-- /BREADCRUMB -->
