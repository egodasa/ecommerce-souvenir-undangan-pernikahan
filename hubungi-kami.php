<?php
session_start();
$judul = 'Hubungi Kami';
include "template/head.php";
?>
<body>
<div id="all">
<?php
include "template/header.php";
?>
<div id="content">
<div class="container">
	
	
	

<!-- START OF CONTENT -->
	<div class="box">
        <h2 class="text-center">CV.PERMATA OFFSET</h2>
        <h4 class="text-center">ALAMAT :</h4>
        <div class="row">
            <div class="col-sm-3">
                <p class="text-center">
                    <img src="<?php echo $base_url; ?>/img/wa.jpg" style="width:100%;" class="img-thumbnail img-responsive" alt= "Image"/>
                    <p class="text-center"><b>Whatsapp</b></p>
                    <p class="text-center"><b>085274526035</b></p>
                </p>
                
            </div>
            <div class="col-sm-3">
                <p class="text-center">
                    <img src="<?php echo $base_url; ?>/img/ig.jpg" style="width:100%;" class="img-thumbnail img-responsive" alt= "Image"/>
                </p>
                <p class="text-center"><b>Instagram</b></p>
                <p class="text-center"><b>Ismaniarmai</b></p>
            </div>
            <div class="col-sm-3">
                <p class="text-center">
                    <img src="<?php echo $base_url; ?>/img/eml.jpg" style="width:100%;" class="img-thumbnail img-responsive" alt= "Image"/>
                </p>
                <p class="text-center"><b>Email</b></p>
                <p class="text-center"><b>Ismaniarmai</b></p>
            </div>
			<div class="col-sm-3">
                <p class="text-center">
                    <img src="<?php echo $base_url; ?>/img/hp.jpg" style="width:100%;" class="img-thumbnail img-responsive" alt= "Image"/>
                </p>
                <p class="text-center"><b>Phone</b></p>
                <p class="text-center"><b>Ismaniarmai</b></p>
            </div>
			<hr/>
			<div class="col-sm-12">
			<p class="text-center"><b>Judul</b></p>
				<div class="row">
				<div class="col-sm-4">111</div>
				<div class="col-sm-4">222</div>
				<div class="col-sm-4">333</div>
				</div>
            </div>
    </div>
    </div>
<!-- END OF CONTENT -->

<!-- FOOTER -->
</div>
<?php include "template/footer.php"; ?>
</div>
<!-- Javascript files-->
<?php include "template/javascript.php"; ?>
</body>
</html>
