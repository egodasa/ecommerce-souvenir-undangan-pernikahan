<?php include "template/head.php"; ?>
  <body>
    <div id="all">
<?php include "template/header.php"; ?>
      <div id="content">
        <div class="container">
          <div class="row">
            <div class="col-lg-6">
              <div class="box">
                <h2 class="text-uppercase">Buat Akun</h2>
                <p class="lead">Pembelian pada website ini hanya bisa dilakukan jika Anda sudah punya akun</p>
                <hr>
                <form action="customer-orders.html" method="post">
                  <div class="form-group">
                    <label for="name-login">Name</label>
                    <input id="name-login" type="text" class="form-control">
                  </div>
                  <div class="form-group">
                    <label for="email-login">Email</label>
                    <input id="email-login" type="text" class="form-control">
                  </div>
                  <div class="form-group">
                    <label for="password-login">Password</label>
                    <input id="password-login" type="password" class="form-control">
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
                <p class="lead">Silahkan Login jika sudah punya akun</p>
                <hr>
                <form action="customer-orders.html" method="post">
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
