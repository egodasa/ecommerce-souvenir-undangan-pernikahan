<?php
session_start();
require "koneksi.php";
$judul = 'Login';
if(isset($_SESSION['username'])){
	header('Location: /skripsi');
}
include "template/components.php";
$pesan = "";
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
if($_SERVER['REQUEST_METHOD'] == 'POST'){
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
            <div class="col-lg-12">
              <div class="box">
                <h2 class="text-uppercase">Login</h2>
                <p>Silahkan Login Jika Sudah Punya Akun</p>
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
        </div>
      </div>
      <!-- FOOTER -->
      <?php include "template/footer.php"; ?>
    </div>
    <!-- Javascript files-->
    <?php include "template/javascript.php"; ?>
</body>
</html>
