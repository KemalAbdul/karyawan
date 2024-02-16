<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <link rel="icon" type="image/jpeg" href="assets/img/usericon.jpg" /> 

  <title>Login - Aplikasi Karyawan</title>

  <!-- Custom fonts for this template-->
  <link href="assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="assets/css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body class="bg-gradient-primary">

  <?php
  
  include 'controller/koneksi.php';
  session_start();
  $posisi = @$_SESSION['level'];
  // Cek apakah user masih dalam keadaan login atau sudah ter-logout
    switch ($posisi) {
      case "0":
        header('location:view/karyawan/');
        break;
      
      case "1":
        header('location:view/admin/');
        break;
      
      default:
    }
  ?>

  <div class="container">

    <!-- Outer Row -->
    <div class="row justify-content-center">

      <div class="col-xl-10 col-lg-12 col-md-9">

        <div class="card o-hidden border-0 shadow-lg my-5">
          <div class="card-body p-0">
            <!-- Nested Row within Card Body -->
            <div class="row">
              <div class="col-lg-6 d-none d-lg-block" style="background: url(assets/img/karyawan.jpg);background-position: center;background-size: cover;"></div>
              <div class="col-lg-6">
                <div class="p-5">
                  <div class="text-center">
                    <h1 class="h4 text-gray-900 mb-4">Selamat Datang!</h1>
                  </div>
                  <form class="user" action="controller/login_action.php" method="post" onSubmit="return validasi()">
                    <div class="form-group">
                      <input type="text" class="form-control form-control-user" name="email" placeholder="Masukkan Email Anda..." required="">
                    </div>
                    <div class="form-group">
                      <input type="password" class="form-control form-control-user" name="password" placeholder="Masukkan Password" required="">
                    </div>
                    <div class="form-group">
                      <div class="custom-control custom-checkbox small">
                        <input type="checkbox" class="custom-control-input" id="customCheck">
                        <label class="custom-control-label" for="customCheck">Ingat saya</label>
                      </div>
                    </div>
                    <button type="submit" class="btn btn-primary btn-user btn-block">
                      Login
                    </button>
                  </form>
                  <form class="user" action="controller/login_action.php" method="post">
                    <div style="text-align:center;padding:10px;font-size:14px"><i>atau</i></div>
                    <div class="form-group">
                      <select name="id_karyawan" class="form-control">
                        <option selected="" disabled="">Pilih Nama Karyawan</option>
                        <?php

                          include '../../controller/koneksi.php';
                          $semuaKaryawan = "SELECT * FROM `karyawan`";
                          $resultKaryawan = mysqli_query($db, $semuaKaryawan);

                          foreach ($resultKaryawan as $row) {
                            echo '<option value="'.$row['id_karyawan'].'">'.$row['nama'].'</option>';
                          }

                        ?>
                      </select>
                    </div>

                    <button type="submit" value="karyawan" class="btn btn-danger btn-user btn-block">
                      Login Presensi Karyawan
                    </button>
                  </form>
                  <hr>
                  <div class="text-center">
                    <a class="small" href="#" data-toggle="modal" data-target="#kontak">Lupa Password atau Belum Punya Akun?</a>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

      </div>

    </div>

  </div>

  <!-- Modal Kontak-->
  
  <div class="modal" id="kontak">
    <div class="modal-dialog">
      <div class="modal-content">
      
        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">Informasi</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        
        <!-- Modal body -->
        <div class="modal-body">
          Lupa password & belum punya akun?<br />
          Silahkan menghubungi bagian Human Resource Ercorporate.<br />
          Terima kasih.
        </div>
        
        <!-- Modal footer -->
        <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-dismiss="modal">Tutup</button>
        </div>
        
      </div>
    </div>
  </div>
  
  <!-- Bootstrap core JavaScript-->
  <script src="assets/vendor/jquery/jquery.min.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="assets/vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="assets/js/sb-admin-2.min.js"></script>

</body>

</html>
