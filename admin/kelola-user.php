<?php
session_start();
require "../koneksi.php";
cekLogin('Admin');
if($_SERVER['REQUEST_METHOD'] == 'POST'){
	$db->from('tbl_user')->insert($_POST)->execute();
}
include "../template/components.php";
include "../template/head.php";
?>
<body>
<div id="all">
<?php 
include "../template/header.php";

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
<div id="content">
<div class="container">
<div class="row bar mb-0">
<div class="col-md-12">
<h2>Input User</h2>
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
	"edit"		=>	"edit-user"
);
$dataTable = $db->from($table)->many();
echo "<hr/><h2>Daftar User</h2>";
tableGenerator($tableConf, $dataTable, $pk, $url);
?>
</div>

</div>
</div>
</div>

<!-- FOOTER -->
</div>
<?php include "../template/footer.php"; ?>
</div>
<!-- Javascript files-->
<?php include "../template/javascript.php"; ?>
</body>
</html>
