<?php
session_start();
require "koneksi.php";
$judul = 'Hubungi Kami';
?>

<?php include "template/bagian-atas.php"; ?>

<!-- START OF CONTENT -->
<div class="box">
	<div class="box-body">
	<h2 class="text-center">Kontak</h2>
	<h4 class="text-center">Nomor Rekening Asmidar: Bank Nagari Syariah 91000550250050</h4>
	<div class="row">
		<div class="col-sm-4">
			<p class="text-center">
				<img src="<?php echo $base_url; ?>/images/wa.jpg" style="width:100%;" class="img-thumbnail img-responsive" alt= "Image"/>
				<p class="text-center"><b>Whatsapp</b></p>
				<p class="text-center"><b>082386054274</b></p>
			</p>
			
		</div>
		<div class="col-sm-4">
			<p class="text-center">
				<img src="<?php echo $base_url; ?>/images/ig.jpg" style="width:100%;" class="img-thumbnail img-responsive" alt= "Image"/>
			</p>
			<p class="text-center"><b>Instagram</b></p>
			<p class="text-center"><b>Asmidar</b></p>
		</div>
		<div class="col-sm-4">
			<p class="text-center">
				<img src="<?php echo $base_url; ?>/images/fb1.png" style="width:100%;" class="img-thumbnail img-responsive" alt= "Image"/>
			</p><center><b>Facebook</b></p>
			<p class="text-center"><b>Asmidar</b></p>
		</div>
	</div>
	</div>
</div>
<!-- END OF CONTENT -->

<?php include "template/bagian-bawah.php"; ?>
