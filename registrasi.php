<?php
session_start();
require "koneksi.php";
$judul = 'Registrasi';
if(isset($_SESSION['username'])){
	header('Location: /skripsi');
}
include "template/components.php";
$pesan = '';
$pesandaftar = '';
if($_SERVER['REQUEST_METHOD'] == "POST"){
  $data = array( 
    "username"  => $_POST['username'], 
    "password"  => md5($_POST['password']), 
    "email"    => $_POST['email']
  ); 
  $cekUsername = $db->from('tbl_user')->where('username',$data['username'])->select('username')->many(); 
  $cekEmail = $db->from('tbl_user')->where('email',$data['email'])->select('username')->many(); 
  $data['tipe_user'] = 'Pelanggan'; 
  $pelanggan = array(
    "nm_pelanggan"  => $_POST['nm_pelanggan'], 
    "alamat"    => $_POST['alamat'], 
    "jk"    => $_POST['jk'],
    "no_telpon"    => $_POST['no_telpon']
  );
  
  if(count($cekUsername) != 0) $pesan = "username";
  else if(count($cekEmail) != 0) $pesan = "email";
  else { 
    if($db->from('tbl_user')->insert($data)->execute()){
      $pelanggan = array(
        "nm_pelanggan"  => $_POST['nm_pelanggan'], 
        "alamat"    => $_POST['alamat'], 
        "jk"    => $_POST['jk'],
        "no_telpon"    => $_POST['no_telpon'],
        "id_user" => $db->insert_id
      );
      if($db->from('tbl_pelanggan')->insert($pelanggan)->execute()){
        $pesan = "success";
      }else $pesan="db";
    }else $pesan="db";
  }
  if($pesan != ''){
    switch($pesan){
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
                <h2 class="text-uppercase">Buat Akun</h2>
                <p>Pembelian Pada Website Ini Hanya Bisa Dilakukan Jika Anda Sudah Punya Akun</p>
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
							),
							array(
								"name"	=>	"nm_pelanggan",
								"label"	=>	"Nama Lengkap",
								"type"	=>	"input",
								"inputType"	=>	"text",
							),
							array(
								"name"	=>	"jk",
								"label"	=>	"Jenis Kelamin",
								"type"	=>	"select",
                "options" => array(
                  array("jk"=> "Laki-Laki"),
                  array("jk"=> "Perempuan")
                ),
                "optionValue" => "jk",
                "optionLabel" => "jk"
							),
							array(
								"name"	=>	"no_telpon",
								"label"	=>	"Nomor Telpon",
								"type"	=>	"input",
								"inputType"	=>	"text"
							),
							array(
								"name"	=>	"alamat",
								"label"	=>	"Alamat",
								"type"	=>	"textarea"
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
