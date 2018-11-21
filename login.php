<?php
session_start();
require "koneksi.php";
$judul = 'Login/Registrasi';

if(isset($_SESSION['username'])){
	header('Location: '.$base_url);
}

$pesan = '';
$pesandaftar = '';
if(isset($_GET['err'])){
	$err = $_GET['err'];
	switch($err){
		case 'db' :
			$pesandaftar = alert('Terjadi kesalahan pada aplikasi!','danger');
			break;
		case 'username' :
			$pesandaftar = alert('Username sudah digunakan','danger');
			break;
		case 'email' :
			$pesandaftar = alert('Email sudah digunakan','danger');
			break;
		case 'success' :
			$pesandaftar = alert('Registrasi berhasil. Silahkan login','success');
			break;
	}	
}

if($_SERVER['REQUEST_METHOD'] == 'POST'){
	$data = $_POST;
	$hasil = $db->from('tbl_user')->where(array('username' => $data['username'], 'password' => md5($data['password'])))->select()->one();
	if(empty($hasil)){
		$pesan = alert('Username atau password salah', 'danger');
	}else {
		$_SESSION['username'] = $hasil['username'];
		$_SESSION['tipe_user'] = $hasil['tipe_user'];
		$_SESSION['id_user'] = $hasil['id_user'];
	header('Location: '.$base_url);
	}
}
?>
<?php
include "template/bagian-atas.php";
?>
	<!-- CONTENT -->
	<div class="row">
		<div class="col-lg-6">
		  <div class="box">
			<h2 class="text-uppercase">Buat Akun</h2>
			<p>Pembelian pada website ini hanya bisa dilakukan jika Anda sudah punya akun</p>
			<hr>
			<p><?php
			echo $pesandaftar;
			$registrasiForm = array(
						array(
							"name"	=>	"username",
							"label"	=>	"Username",
							"type"	=>	"input",
							"inputType"	=>	"text",
						),
						array(
							"name"	=>	"email",
							"label"	=>	"Email",
							"type"	=>	"input",
							"inputType"	=>	"email",
						),
						array(
							"name"	=>	"password",
							"label"	=>	"Password",
							"type"	=>	"input",
							"inputType"	=>	"password",
						)
					);
			$loginForm = array(
						array(
							"name"	=>	"username",
							"label"	=>	"Username",
							"type"	=>	"input",
							"inputType"	=>	"text",
						),
						array(
							"name"	=>	"password",
							"label"	=>	"Password",
							"type"	=>	"input",
							"inputType"	=>	"password",
						)
					);
			?></p>
			<form action="registrasi.php" method="post">
			  <?php
			  formGenerator($registrasiForm);
			  ?>
			  <div class="text-center">
				<button type="submit" class="btn btn-template-outlined"><i class="fa fa-user-md"></i> Register</button>
			  </div>
			</form>
		  </div>
		</div>
		<div class="col-lg-6">
		  <div class="box">
			<h2 class="text-uppercase">Login</h2>
			<p>Silahkan Login jika sudah punya akun</p>
			<hr>
			<p><?php echo $pesan; ?></p>
			<form action="login.php" method="post">
			  <?php
			  formGenerator($loginForm);
			  ?>
			  <div class="text-center">
				<button type="submit" class="btn btn-template-outlined"><i class="fa fa-sign-in"></i> Log in</button>
			  </div>
			</form>
		  </div>
		</div>
	</div>
	<!-- EOF CONTENT -->

<?php
include "template/bagian-bawah.php";
?>
        
