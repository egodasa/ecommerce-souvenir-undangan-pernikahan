<div class="container">
<!--
	<div class="col-md-6 offer animated fadeInDown" data-animate="fadeInDown" style="opacity: 0;">
		<a href="#" class="btn btn-success btn-sm" data-animate-hover="shake">Offer of the day</a>  <a href="#">Get flat 35% off on orders over $50!</a>
	</div>
-->
	<div class="col-md-12 animated fadeInDown" data-animate="fadeInDown" style="opacity: 0;">
		<ul class="menu">
			<?php
				if(isset($_SESSION['username'])){
					echo "<li><a href='#'>Hai, ".$_SESSION['username']."</a></li>";
				}else{
			?>
			<li><a href="<?php echo $base_url; ?>/login.php">Login</a>
			</li>
			<li><a href="<?php echo $base_url; ?>/registrasi.php">Register</a>
			</li>
			<?php
			}
			?>
		</ul>
	</div>
</div>
