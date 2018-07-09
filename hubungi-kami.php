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
        <h4 class="text-center">ALAMAT : JL.RAYA INDARUNG NO.04 KEL.TANJUNG SABAR PADANG</h4>
        <div class="row">
            <div class="col-sm-3">
                <p class="text-center">
                    <assets/img src="<?php echo $base_url; ?>/assets/img/wa.jpg" style="width:100%;" class="assets/img-thumbnail assets/img-responsive" alt= "Image"/>
                    <p class="text-center"><b>Whatsapp</b></p>
                    <p class="text-center"><b>0852 7452 6035</b></p>
                </p>
                
            </div>
            <div class="col-sm-3">
                <p class="text-center">
                    <assets/img src="<?php echo $base_url; ?>/assets/img/ig.jpg" style="width:100%;" class="assets/img-thumbnail assets/img-responsive" alt= "Image"/>
                </p>
                <p class="text-center"><b>Instagram</b></p>
                <p class="text-center"><b>Permata Offset</b></p>
            </div>
            <div class="col-sm-3">
                <p class="text-center">
                    <assets/img src="<?php echo $base_url; ?>/assets/img/eml.jpg" style="width:100%;" class="assets/img-thumbnail assets/img-responsive" alt= "Image"/>
                </p>
                <p class="text-center"><b>Email</b></p>
                <p class="text-center"><b>permataoffset123@gmail.com</b></p>
            </div>
			<div class="col-sm-3">
                <p class="text-center">
                    <assets/img src="<?php echo $base_url; ?>/assets/img/hp.jpg" style="width:100%;" class="assets/img-thumbnail assets/img-responsive" alt= "Image"/>
                </p>
                <p class="text-center"><b>Phone</b></p>
                <p class="text-center"><b>0822 8452 0014</b></p>
            </div>
			<hr/>
			<div class="col-sm-12">
			<p class="text-center"><b>NO.Rekening</b></p>
				<div class="row">
				<div class="col-sm-4">CIMB : 543-01-08493-11-1</div>
				<div class="col-sm-4">BRI : 1519-01-003157-50-7</div>
				<div class="col-sm-4">NOBU : 809-11-02032-1</div>
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
