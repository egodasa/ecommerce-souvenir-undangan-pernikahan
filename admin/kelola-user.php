<?php
session_start();
require "../koneksi.php";
cekLogin('Admin');
$judul = 'Daftar User';
if($_SERVER['REQUEST_METHOD'] == 'POST'){
	$db->from('tbl_user')->insert($_POST)->execute();
}
$user = array(
	array(
		"name"	=> "input_group",
		"list"	=> array(
			array(
				"name"	=>	"username",
				"label"	=>	"Username",
				"type"	=>	"input",
				"inputType"	=>	"text",
				"col"	=> "6"
			),
			array(
				"name"	=>	"password",
				"label"	=>	"Password",
				"type"	=>	"input",
				"inputType"	=>	"password",
				"col"	=> "6"
			),
			array(
				"name"	=>	"email",
				"label"	=>	"Email",
				"type"	=>	"input",
				"inputType"	=>	"email",
				"col"	=> "6"
			),
			array(
				"name"	=>	"tipe_user",
				"label"	=>	"Tipe User",
				"type"	=>	"select",
				"options"	=>	array(
					array(
						"tipe_user"	=> "Admin"
					),
					array(
						"tipe_user"	=> "Pelanggan"
					)
				),
				"optionLabel"	=> "tipe_user",
				"optionValue"	=> "tipe_user",
				"col"	=> "6"
			)
		)
	)
);
?>
<?php include "../template/bagian-atas.php"; ?>	

<div class="row bar mb-0">
<div class="col-md-12">
<div class="section-title">
	<h3 class="title">Input User</h3>
</div>
<form method="POST" action="">
<?php
formGenerator($user);
?>
<button type="submit"class="btn btn-lg btn-success">Simpan</button>
</form>

<?php
$pk = 'id_user';
$table = 'tbl_user';
$tableConf = array(
	array(
		"name"		=>	"username",
		"label"	=>	"Username"
	),
	array(
		"name"		=>	"email",
		"label"	=>	"Email"
	),
	array(
		"name"		=>	"tipe_user",
		"label"	=>	"Tipe user"
	)
);
$url = array(
	"hapus"		=>	"hapus-user",
	"edit"		=>	null
);
$dataTable = $db->from($table)->many();
?>
<div class="section-title">
	<h3 class="title">Daftar User</h3>
</div>
<?php
tableGenerator($tableConf, $dataTable, $pk, $url);
?>
</div>

</div>
</div>
</div>

<?php include "../template/bagian-bawah.php"; ?>	
