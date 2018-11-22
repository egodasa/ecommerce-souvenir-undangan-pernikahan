<?php
session_start();
require "koneksi.php";
$judul = 'Tentang Kami';
?>
		
<?php include "template/bagian-atas.php"; ?>
		
<!-- START OF CONTENT -->
<div class="box">
	<div class="box-body">
		<div class="section-title">
			<h3 class="title">Tentang Toko Eggy Alluminium</h3>
		</div>
    <p>
      Toko Eggy Aluminium didirikan oleh H.Asrizal berserta istrinya Hj.Martinus.Toko Eggy Aluminium berdiri pada tahun 1997. Kami menjual berbagai macam peralatan rumah tangga yang terbuat dari alluminium seperti sendok,
      lemari, panci dll. Semua produk dibuat ditoko kami langsung karena kami ahli dibidangnya.
    </p>
    <p>
      <h4>Alamat Toko Eggy Alluminium</h4>
      Kami berlokasi di <b>Jl. Thamrin, Alang Laweh, Padang Selatan, Kota Padang, Sumatera Barat, Kode Pos 25123</b> dan kami buka pukul 9 pagi - 5 sore senin - sabtu (minggu tutup). Berikut kami tampilkan peta lokasi dari Toko Eggy Alluminium :
      <div id="lokasi" style="width: 100%; height: 500px;"></div>
    </p>
    <p>
      <h4>Kontak Toko Eggy Alluminium</h4>
      Anda dapat menghubungi langsung Toko Eggy Alluminium melalui panggilan/SMS/Whatsapp dengan nomor <b>0813-7461-0709</b>
    </p>
    <p>
      <h4>Nomor Rekening Toko Eggy Alluminium</h4>
      Pada saat Anda selesai melakukan pembelian melalui website kami, Anda harus melakukan pembayaran melalui bank ke nomor rekening 1234566 (Bank BRI) a/n Kudil, kemudian lakukan konfirmasi pembayaran di menu DAFTAR TRANSAKSI dan KLIK TOMBOL KONFIRMASI PEMBAYARAN. <br/>
      Hal tersebut dilakukan agar kami dapat memproses transaksi Anda.
    </p>
	</div>
</div>
<script>
var map = L.map('lokasi').setView({lat: -0.9554497611502691, lng: 100.36864757537842}, 15);
L.tileLayer('https://api.tiles.mapbox.com/v4/{id}/{z}/{x}/{y}.png?access_token=pk.eyJ1IjoiZWdvZGFzYSIsImEiOiJjamd4NWkyMmwwNms2MnhsamJvaWQ3NGZmIn0.6ok1IiPZ0sPNXmiIe-iEWA', {
  attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/">OpenStreetMap</a> contributors, ' +
                '<a href="https://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>, ' +
                'Imagery Â© <a href="https://www.mapbox.com/">Mapbox</a>',
  id: 'mapbox.streets',
  noWrap: false
}).addTo(map);

var lokasi = L.marker({lat: -0.9554497611502691, lng: 100.36864757537842}).addTo(map);

lokasi.bindPopup('<p>' +
      '<h4>Toko Eggy Alluminium</h4>' +
      '<b>Jl. Thamrin, Alang Laweh, Padang Selatan, Kota Padang, Sumatera Barat, Kode Pos 25123</b>.' +
      '</p>').openPopup();

</script>
<!-- END OF CONTENT -->

<?php include "template/bagian-bawah.php"; ?>
