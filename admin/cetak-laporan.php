<?php
session_start();
require "../koneksi.php";
cekLogin('Admin');
require_once __DIR__ . '/../vendor/autoload.php';
$mpdf = new \Mpdf\Mpdf(['tempDir' => __DIR__ . '/../tsmp']);
$judul = null;
$alamat = "Contoh Alamat";
$awal = date('Y-m-d');
$akhir = date('Y-m-d');

if(isset($_GET['awal'])) $awal = $_GET['awal'];
if(isset($_GET['akhir'])) $akhir = $_GET['akhir'];

if(isset($_GET['laporan'])){
    switch($_GET['laporan']){
        case "harian" : 
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
                    "caption"	=>	"Total Pemasukan"
                )
            );
            $judul = "Laporan Harian";
            $dataTable = $db->sql('select * from tbl_pemesanan join tbl_produk on tbl_pemesanan.id_produk = tbl_produk.id_produk where day(tgl_pesan) = day(now())')->many();
        break;
        case "bulanan" : 
            $tableConf = array(
                array(
                    "name"		=>	"hari",
                    "caption"	=>	"Tanggal"
                ),
                array(
                    "name"		=>	"total_harga",
                    "caption"	=>	"Total Pemasukan"
                )
            );
            $judul = "Laporan Bulanan";
            $dataTable = $db->sql('select day(tgl_pesan) as `hari`, sum(total_harga) as `total_harga` from tbl_pemesanan join tbl_produk on tbl_pemesanan.id_produk = tbl_produk.id_produk where month(tgl_pesan) = month(now()) and year(tgl_pesan) = year(now()) group by day(tgl_pesan)')->many();
        break;
        case "tahunan" : 
            $tableConf = array(
                array(
                    "name"		=>	"bulan",
                    "caption"	=>	"Bulan"
                ),
                array(
                    "name"		=>	"total_harga",
                    "caption"	=>	"Total Pemasukan"
                )
            );
            $judul = "Tahunan";
            $dataTable = $db->sql('select month(tgl_pesan) as `bulan`, sum(total_harga) as `total_harga` from tbl_pemesanan join tbl_produk on tbl_pemesanan.id_produk = tbl_produk.id_produk where year(tgl_pesan) = year(now()) group by month(tgl_pesan)')->many();
        break;
    }
}else{
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
            "caption"	=>	"Total Pemasukan"
        )
    );
    if(!isset($_GET['awal'])){
    $judul = "Laporan Penjualan Keseluruhan";
	$dataTable = $db->from('tbl_pemesanan')
	->join('tbl_produk',array('tbl_pemesanan.id_produk' => 'tbl_produk.id_produk'))
	->many();
    }else{
        $judul = "Laporan Dari Tanggal $awal - $akhir";
        $dataTable = $db->sql('select * from tbl_pemesanan join tbl_produk on tbl_pemesanan.id_produk = tbl_produk.id_produk where tgl_pesan between "'.$awal.'" and "'.$akhir.'"')->many();
    }
}
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
    margin: 0 auto;
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
$html .='<h2>'.$judul.'</h2>';
$html .='<p>'.$alamat.'</p>';
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
	<td colspan=".(count($tableConf)+1).">Total</td>
	<td>Rp ".number_format($total,2,',','.')."</td>
	</tr></tfoot>";
}
$html .= '</tbody>	
</table>';

$html .= "<br/><br/><br/><div class='ttd'>Padang, ".date("d-m-Y")."<br/><br/><br/> Mengetahui</div>";

//~ echo $html;
$mpdf->WriteHTML($html);
$mpdf->Output();
?>
