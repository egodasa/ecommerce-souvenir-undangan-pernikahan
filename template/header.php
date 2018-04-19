<!-- HEADER -->
<header>
	<!-- header -->
	<div id="header">
		<div class="container">
			<div class="pull-left">
				<!-- Logo -->
				<div class="header-logo">
					<a class="logo" href="#">
						<img src="<?php echo $base_url; ?>/img/logo.png" alt="">
					</a>
				</div>
				<!-- /Logo -->
			</div>
			<div class="pull-right">
				<ul class="header-btns">
					<!-- Account -->
					<li class="header-account dropdown default-dropdown">
						<div class="dropdown-toggle">
							<?php
							if(isset($_SESSION['username'])){
								echo '<strong class="text-uppercase">'.$_SESSION['username'].' / </strong>';
							}
							?>
							<?php
							if(!isset($_SESSION['username'])){
								echo '<a href="'.$base_url.'/login.php" class="text-uppercase">Login / Registrasi</a>';
							}else{
								echo '<a href="'.$base_url.'/logout.php" class="text-uppercase">Logout</a>';
							}
							?>
						</div>
					</li>
					<!-- /Account -->

					<!-- Mobile nav toggle-->
					<li class="nav-toggle">
						<button class="nav-toggle-btn main-btn icon-btn"><i class="fa fa-bars"></i></button>
					</li>
					<!-- / Mobile nav toggle -->
				</ul>
			</div>
		</div>
		<!-- header -->
	</div>
	<!-- container -->
</header>
<!-- /HEADER -->
