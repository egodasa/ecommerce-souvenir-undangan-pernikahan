<?php
session_start();
require "koneksi.php";
require "template/components.php";
cekLogin('Pelanggan');
require_once __DIR__ . '/vendor/autoload.php';
$mpdf = new \Mpdf\Mpdf(['tempDir' => __DIR__ . '/../tsmp']);
$judul = "Laporan Penjualan Hari ".date("l, d F Y");
$detail = $db->sql("select * from tbl_pemesanan join tbl_produk on tbl_pemesanan.id_produk = tbl_produk.id_produk where id_pemesanan='".$_GET['id_pemesanan']."';")->many();
$html = '';
$html .= '
<style>
body{
	font-family: Arial;
}
table {
    border-collapse: collapse;
    width: 100%;
}

table, td, th {
    border: 1px solid black;
    margin: 0 auto;
}
.white {
    border: 1px splid white;
}
th {
	background-color: #f0f0f0;
	padding: 13px 5px;
}
td{
	padding: 3px;
}
h1, h2, p{
	text-align: center;
}
.ttd{
    width: 150px;
    float: right;
    text-align: center;
}
</style>';
$tgl = explode(" ",$detail[0]['tgl_pesan']);

$html .= '
<div style="width:75%;float: left;">
<p style="text-align: left;"><b>No Faktur : '.$detail[0]['id_pemesanan'].'</p></b>
<p style="text-align: left;">Tanggal Pesan : '.tanggal_indo($tgl[0], true).' '.$tgl[1].'</p>
<p style="text-align: left;">Nama : '.$detail[0]['nama_pemesan'].'</p>
<p style="text-align: left;">No HP : '.$detail[0]['no_telp'].'</p>
<p style="text-align: left;">Alamat : '.$detail[0]['alamat_pemesan'].'</p>
	
</div>
<div style="width:25%;float: right;">
    <img src="'.$base_url.'/img/logo.png" />
</div>
<div style="clear: both;"></div>
';
$html .= '<table>
<thead>
    <tr>
        <th>No</th>
        <th>Nama Produk</th>
        <th>Harga Produk</th>
        <th>QTY</th>
        <th>Sub Total</th>
    </tr>
    </thead>
    <tbody>
    <tr>
        <td>1</td>
        <td>'.$detail[0]['nm_produk'].'</td>
        <td>Rp '.number_format($detail[0]['harga'],2,',','.').'</td>
        <td>'.$detail[0]['jumlah_pesan'].'</td>
        <td>Rp '.number_format(($detail[0]['total_harga']),2,',','.').'</td>
    </tr>
    </tbody>
    <tfoot>
    <tr>
        <td colspan="4" style="text-align: right;"><b>TOTAL</b></td>
        <td>Rp '.number_format(($detail[0]['total_harga']),2,',','.').'</td>
    </tr>
    </tfoot>
</table>';
//~ echo $html;
$mpdf->WriteHTML($html);
$mpdf->Output();
?>
