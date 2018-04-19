<?php
session_start();
require "koneksi.php";
$judul = 'Cara Pesan';
?>

<?php include "template/bagian-atas.php"; ?>

<!-- START OF CONTENT -->
	<div class="box">
		<div class="box-body">
		<div class="section-title">
			<h3 class="title">Cara Pemesanan di Toko Asmidar</h3>
		</div>
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

<?php include "template/bagian-bawah.php"; ?>
