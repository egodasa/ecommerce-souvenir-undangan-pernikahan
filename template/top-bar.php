<!-- Top bar-->
<div class="top-bar">
<div class="container">
  <div class="row d-flex align-items-center">
	<div class="col-md-6 d-md-block d-none">
	  <p>Menjual Souvenir dan Undangan Pernikahan</p>
	</div>
	<div class="col-md-6">
	  <div class="d-flex justify-content-md-end justify-content-between">
		  <?php
		  if(!isset($_SESSION['username'])){
		  ?>
		  <div class="login"><a href="<?php echo $base_url."/login.php"; ?>" class="signup-btn"><i class="fa fa-user"></i><span class="d-none d-md-inline-block">Login/Registrasi</span></a></div>
		  <?php
			}else{
		  ?>
		  <div class="login"><a href="#" class="signup-btn"><i class="fa fa-user"></i><span class="d-none d-md-inline-block"><?php echo "Hello ,".$_SESSION['username'];?></span></a></div>
		  <?php
			}
		  ?>
		
	  </div>
	</div>
  </div>
</div>
</div>
<!-- Top bar end-->
