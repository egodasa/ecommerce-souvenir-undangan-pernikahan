<?php
session_start();
require "../koneksi.php";
cekLogin('Admin');
$judul = "Laporan Transaksi";

$awal = date('Y-m-d');
$akhir = date('Y-m-d');;

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
                    "caption"	=>	"Total Harga"
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
                    "caption"	=>	"Total Harga"
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
                    "caption"	=>	"Total Harga"
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
            "caption"	=>	"Total Harga"
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

?>

<?php include "../template/bagian-atas.php"; ?>	

<!-- START OF CONTENT -->
<div class="row bar mb-0">
<div class="col-md-12">
<div class="section-title">
	<h3 class="title">Laporan Transaksi</h3>
</div>
<form method="GET" action="cetak-laporan.php">
<div class="row">
	<div class="col-sm-4">
		<div class="form-group">
			<label>Dari</label>
			<input type="date" name="awal" class="form-control"/>
		</div>
	</div>
	<div class="col-sm-4">
		<div class="form-group">
			<label>Hingga</label>
			<input type="date" name="akhir" class="form-control" />
		</div>
	</div>
</div>
<div class="form-group">
			<button tpe="submit" class="btn btn-sm btn-primary">Tampilkan</button>
			<button type="submit" class="btn btn-sm btn-primary">Cetak Laporan Sesuai Tanggal</button>
			<br/>
			<br/>
            <p><b>Pilih Laporan</b></p>
            <a target="_blank" class="btn btn-sm btn-success" href="<?php echo "cetak-laporan.php?laporan=harian"; ?>">Cetak Laporan Harian</a>
			<a target="_blank" class="btn btn-sm btn-success" href="<?php echo "cetak-laporan.php?laporan=bulanan"; ?>">Cetak Laporan Bulanan</a>
			<a target="_blank" class="btn btn-sm btn-success" href="<?php echo "cetak-laporan.php?laporan=tahunan"; ?>">Cetak Laporan Tahunan</a>
		</div>
</form>
<hr>
<table class="table table-hover">
<thead>
	<tr>
		<th>No</th>
<?php
foreach($tableConf as $t){
	echo "<th>".$t['caption']."</th>";
}
?>
	</tr>
</thead>
<tbody>
<?php
$no = 1;
$total = 0;
if(count($dataTable) == 0){
	echo "<tr><td colspan=".(count($tableConf)+2).">Data Kosong</td></tr>";
}else{
	foreach($dataTable as $r){
		echo "
			<tr>
				<td>".$no."</td>";
		foreach($tableConf as $t){
			if($t['name'] == 'total_harga'){
				echo "<td>Rp ".number_format($r[$t['name']],2,',','.')."</td>";
			}else echo "<td>".$r[$t['name']]."</td>";
		}
		$no++;
		$total += $r['total_harga'];
		echo "</tr>";
	}
	echo "
	<tfoot>
	<tr>
	<td colspan=5>Total</td>
	<td>Rp ".number_format($total,2,',','.')."</td>
	</tr></tfoot>";
?>
	</tbody>	
</table>
</div>
</div>
</div>
</div>
<?php
}
?>

<?php include "../template/bagian-bawah.php"; ?>	
