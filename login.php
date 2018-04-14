<?php
session_start();
if(isset($_SESSION['username'])){
	header('Location: /skripsi');
}
include "template/components.php";
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
	require "koneksi.php";
	$data = $_POST;
	$hasil = $db->from('tbl_user')->where(array('username' => $data['username'], 'password' => md5($data['password'])))->select()->one();
	if(empty($hasil)){
		$pesan = alert('Username atau password salah', 'danger');
	}else {
		$_SESSION['username'] = $hasil['username'];
		$_SESSION['tipe_user'] = $hasil['tipe_user'];
		$_SESSION['id_user'] = $hasil['id_user'];
	header('Location: /skripsi');
	}
}
include "template/head.php";
?>
  <body>
    <div id="all">
<?php include "template/header.php"; ?>
      <div id="content">
        <div class="container">
          <div class="row">
            <div class="col-lg-6">
              <div class="box">
                <h2 class="text-uppercase">Buat Akun</h2>
                <p>Pembelian pada website ini hanya bisa dilakukan jika Anda sudah punya akun</p>
                <hr>
                <p><?php echo $pesandaftar; ?></p>
                <form action="registrasi.php" method="post">
                  <div class="form-group">
                    <label for="username">Username</label>
                    <input id="username" name="username" type="text" class="form-control">
                  </div>
                  <div class="form-group">
                    <label for="email">Email</label>
                    <input id="email" name="email" type="email" class="form-control">
                  </div>
                  <div class="form-group">
                    <label for="password">Password</label>
                    <input id="password" name="password" type="password" class="form-control">
                  </div>
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
                  $login = array(
						array(
							"name"	=>	"username",
							"label"	=>	"Username",
							"type"	=>	"input",
							"inputType"	=>	"text"
						),
						array(
							"name"	=>	"password",
							"label"	=>	"Password",
							"type"	=>	"input",
							"inputType"	=>	"password"
						)
                  );
                  formGenerator($login);
                  ?>
                  <div class="text-center">
                    <button type="submit" class="btn btn-template-outlined"><i class="fa fa-sign-in"></i> Log in</button>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- FOOTER -->
      <?php include "template/footer.php"; ?>
    </div>
    <!-- Javascript files-->
    <?php include "template/javascript.php"; ?>
</body>
</html>

