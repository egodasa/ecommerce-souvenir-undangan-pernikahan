<?php
session_start();
require "../koneksi.php";
cekLogin('Admin');
require_once __DIR__ . '/../vendor/autoload.php';
$mpdf = new \Mpdf\Mpdf(['tempDir' => __DIR__ . '/../tsmp']);

$awal = date('Y-m-d');
$akhir = date('Y-m-d');

if(isset($_GET['awal'])) $awal = $_GET['awal'];
if(isset($_GET['akhir'])) $akhir = $_GET['akhir'];

$tableConf = array(
	array(
		"name"		=>	"nama_pemesan",
		"caption"	=>	"Nama Pemesan"
	),
	array(
		"name"		=>	"tgl_pesan",
		"caption"	=>	"Tanggal Pesan"
	),
	array(
		"name"		=>	"nm_produk",
		"caption"	=>	"Nama Produk"
	),
	array(
		"name"		=>	"jumlah_pesan",
		"caption"	=>	"Jumlah Pesan"
	),
	array(
		"name"		=>	"total_harga",
		"caption"	=>	"Total Harga"
	)
);
if(!isset($_GET['awal'])){
	$dataTable = $db->from('tbl_pemesanan')
	->join('tbl_produk','tbl_pemesanan.id_produk','tbl_produk.id_produk')
	->many();
}else $dataTable = $db->sql('select * from tbl_pemesanan join tbl_produk on tbl_pemesanan.id_produk = tbl_produk.id_produk where tgl_pesan between "'.$awal.'" and "'.$akhir.'"')->many();
$html = '';
$html .= '<style>
body{
	font-family: Arial;
}
table {
    border-collapse: collapse;
}

table, td, th {
    border: 1px solid black;
}
th {
	background-color: #f0f0f0;
	padding: 13px 5px;
}
td{
	padding: 3px;
}
h1{
	text-align: center;
}
</style>';
$html .='<h2>Laporan Penjualan</h2>';
$html .='<hr>';
$html .= '<table class="table table-hover">
<thead>
	<tr>
		<th>No</th>';
		
foreach($tableConf as $t){
	$html .= "<th>".$t['caption']."</th>";
}
$html .= '</tr>
</thead>
<tbody>';

$no = 1;
$total = 0;
if(count($dataTable) == 0){
	$html .= "<tr><td colspan=".(count($tableConf)+2).">Data Kosong</td></tr>";
}else{
	foreach($dataTable as $r){
		$html .= "
			<tr>
				<td>".$no."</td>";
		foreach($tableConf as $t){
			if($t['name'] == 'total_harga'){
				$html .= "<td>Rp ".number_format($r[$t['name']],2,',','.')."</td>";
			}else $html .= "<td>".$r[$t['name']]."</td>";
		}
		$no++;
		$total += $r['total_harga'];
		$html .= "</tr>";
	}
	$html .= "
	<tfoot>
	<tr>
	<td colspan=5>Total</td>
	<td>Rp ".number_format($total,2,',','.')."</td>
	</tr></tfoot>";
}
$html .= '</tbody>	
</table>';

//~ echo $html;
$mpdf->WriteHTML($html);
$mpdf->Output();
?>
