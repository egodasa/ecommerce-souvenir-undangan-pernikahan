<?php
session_start();
require "koneksi.php";
$judul = 'Cara Pesan';
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
		<div class="box-body">
		<h2>Cara Pemesanan</h2>
		<ol>
			<li>Pembeli yang ingin membeli produk melalui web bisa langsung melakukan registrasi</li>
		    <li>Setelah registrasi pembeli bisa memilih produk yang telah disajikan, dengan mengklik pesan pada produk</li>
		    <li>Detail Produk akan ditampilkan, dan pembeli mengisi form alamat pengiriman dan nomor Hp               </li>
		    <li>Selanjutnya pembeli bisa melakukan pembayaran melalui rekening yang ada di menu kontak                </li>
		    <li>Dan mengklik daftar transaksi yang ada di menu untuk konfirmasi pembayaran                            </li>
		</ol>
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
