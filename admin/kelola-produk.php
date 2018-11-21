<?php
session_start();
require "../koneksi.php";
cekLogin('Admin');
$judul = 'Daftar Produk';
$produk = array(
	array(
		"name"	=>	"nm_produk",
		"label"	=>	"Nama Produk",
		"type"	=>	"input",
		"inputType"	=>	"text"
	),
	//~ array(
		//~ "name"	=>	"jenis_produk",
		//~ "label"	=>	"Jenis Produk",
		//~ "type"	=>	"select",
		//~ "options"	=>	array(
			//~ array(
				//~ "jenis_produk"	=> "Souvenir"
			//~ ),
			//~ array(
				//~ "jenis_produk"	=> "Undangan"
			//~ )
		//~ ),
		//~ "optionLabel"	=> "jenis_produk",
		//~ "optionValue"	=> "jenis_produk"
	//~ ),
	array(
		"name"	=>	"harga",
		"label"	=>	"Harga Produk",
		"type"	=>	"input",
		"inputType"	=>	"number"
	)
);
?>

<?php include "../template/bagian-atas.php"; ?>	

<div class="row bar mb-0">
<div class="col-md-12">
  <div class="col-xs-12 col-sm-4 col-md-4">
  <div class="section-title">
	<h3 class="title">Input Produk</h3>
  </div>
  <form enctype="multipart/form-data" method="POST" action="tambah-produk.php">
  <?php 
  formGenerator($produk);
  ?>
  <div class="row">
  <div class="col-xs-12">
  <div class="form-group">
    <label for="foto_produk[]">Foto Produk 1</label>
    <input id="foto_produk[]" name="foto_produk[]" type="file" class="form-control" multiple="multiple" value="">
  </div>
  </div><div class="col-xs-12">
  <div class="form-group">
    <label for="foto_produk[]">Foto Produk 2</label>
    <input id="foto_produk[]" name="foto_produk[]" type="file" class="form-control" multiple="multiple" value="">
  </div>
  </div><div class="col-xs-12">
  <div class="form-group">
    <label for="foto_produk[]">Foto Produk 3</label>
    <input id="foto_produk[]" name="foto_produk[]" type="file" class="form-control" multiple="multiple" value="">
  </div>
  </div></div>
  <button type="submit"class="btn btn-lg btn-success">Simpan</button>
  </form>
  </div>
  <div class="col-xs-12 col-sm-8 col-md-8">
    <?php
    $pk = 'id_produk';
    $table = 'tbl_produk';
    $tableConf = array(
      array(
        "name"		=>	"nm_produk",
        "label"	=>	"Nama Produk"
      ),
      array(
        "name"		=>	"harga",
        "label"	=>	"Harga"
      )
    );
    $url = array(
      "hapus"		=>	"hapus-produk",
      "edit"		=>	"edit-produk"
    );
    $dataTable = $db->from($table)->many();
    ?>
    <div class="section-title">
      <h3 class="title">Daftar Produk</h3>
    </div>
    <?php
    tableGenerator($tableConf, $dataTable, $pk, $url);
    ?>
  </div>
</div>

</div>
</div>
</div>

<?php include "../template/bagian-bawah.php"; ?>	
