<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <link rel="icon" type="image/jpeg" href="../../assets/img/usericon.jpg" /> 

  <title>Data Karyawan - Aplikasi Karyawan</title>

  <!-- Custom fonts for this template-->
  <link href="../../assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="../../assets/css/sb-admin-2.min.css" rel="stylesheet">

  <!-- Custom styles for this page -->
  <link href="../../assets/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">

</head>

<body id="page-top">

<?php
  
  include '../../controller/koneksi.php';

  session_start();

  if($_SESSION['level'] != '1') {
    echo '<script type="text/javascript">'; 
    echo 'alert("Maaf anda tidak memilik hak akses halaman ini");'; 
    echo 'window.location= "../../index.php";';
    echo '</script>';  
  }

?>

  <!-- Page Wrapper -->
  <div id="wrapper">

    <!-- Sidebar -->
    <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

      <!-- Sidebar - Brand -->
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.php">
        <div class="sidebar-brand-icon rotate-n-15">
          <i class="fas fa-laugh-wink"></i>
        </div>
        <div class="sidebar-brand-text mx-3">Aplikasi Karyawan<sup></sup></div>
      </a>

      <!-- Divider -->
      <hr class="sidebar-divider my-0">

      <!-- Nav Item - Dashboard -->
      <li class="nav-item">
        <a class="nav-link" href="index.php">
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>Dashboard</span></a>
      </li>

      <!-- Divider -->
      <hr class="sidebar-divider">

      <!-- Heading -->
      <div class="sidebar-heading">
        Daftar Menu
      </div>

      <!-- Nav Item - Tables -->
      <li class="nav-item active">
        <a class="nav-link" href="karyawan.php">
          <i class="fas fa-fw fa-user-plus"></i>
          <span>Data Karyawan</span></a>
      </li>
      
      <!-- Nav Item - Tables -->
      <li class="nav-item">
        <a class="nav-link" href="jabatan.php">
          <i class="fas fa-fw fa-user-plus"></i>
          <span>Data Jabatan</span></a>
      </li>
	  
	  <!-- Nav Item - Tables -->
      <li class="nav-item">
        <a class="nav-link" href="absensi.php">
          <i class="fas fa-fw fa-users"></i>
          <span>Absensi & Kehadiran</span></a>
      </li>
      
      <!-- Divider -->
      <hr class="sidebar-divider d-none d-md-block">

      <!-- Sidebar Toggler (Sidebar) -->
      <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
      </div>

    </ul>
    <!-- End of Sidebar -->

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

      <!-- Main Content -->
      <div id="content">

        <!-- Topbar -->
        <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

          <!-- Sidebar Toggle (Topbar) -->
          <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
            <i class="fa fa-bars"></i>
          </button>

          <!-- Topbar Search -->
          <form class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
            <div class="input-group">
            </div>
          </form>

          <!-- Topbar Navbar -->
          <ul class="navbar-nav ml-auto">

            <!-- Nav Item - Search Dropdown (Visible Only XS) -->
            <li class="nav-item dropdown no-arrow d-sm-none">
              <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-search fa-fw"></i>
              </a>
              <!-- Dropdown - Messages -->
              <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in" aria-labelledby="searchDropdown">
                <form class="form-inline mr-auto w-100 navbar-search">
                  <div class="input-group">
                    <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
                    <div class="input-group-append">
                      <button class="btn btn-primary" type="button">
                        <i class="fas fa-search fa-sm"></i>
                      </button>
                    </div>
                  </div>
                </form>
              </div>
            </li>

            <!-- Nav Item - Alerts -->
            <li class="nav-item dropdown no-arrow mx-1">
              <a class="nav-link dropdown-toggle" href="#" id="alertsDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-bell fa-fw"></i>
                <!-- Counter - Alerts -->
                <!--<span class="badge badge-danger badge-counter">3+</span>-->
              </a>
              <!-- Dropdown - Alerts -->
              <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="alertsDropdown">
                <h6 class="dropdown-header">
                  Pemberitahuan
                </h6>
                <a class="dropdown-item d-flex align-items-center" href="#">
                  <span class="text-center">Belum ada pemberitahuan</span>
                  <!--<div class="mr-3">
                    <div class="icon-circle bg-primary">
                      <i class="fas fa-file-alt text-white"></i>
                    </div>
                  </div>
                  <div>
                    <div class="small text-gray-500">December 12, 2019</div>
                    <span class="font-weight-bold">A new monthly report is ready to download!</span>
                  </div>-->
                </a>
                
                <a class="dropdown-item text-center small text-gray-500" href="#">Lihat semua</a>
              </div>
            </li>

            <!-- Nav Item - Messages -->
            <li class="nav-item dropdown no-arrow mx-1">
              <a class="nav-link dropdown-toggle" href="#" id="messagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-envelope fa-fw"></i>
                <!-- Counter - Messages -->
                <!--<span class="badge badge-danger badge-counter">7</span>-->
              </a>
              <!-- Dropdown - Messages -->
              <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="messagesDropdown">
                <h6 class="dropdown-header">
                  Perpesanan
                </h6>

                <a class="dropdown-item d-flex align-items-center" href="#">
                  <span class="text-center" style="padding-left: 20px;">Belum ada pesan</span>
                  <!--<div class="dropdown-list-image mr-3">
                    <img class="rounded-circle" src="https://source.unsplash.com/fn_BT9fwg_E/60x60" alt="">
                    <div class="status-indicator bg-success"></div>
                  </div>
                  <div class="font-weight-bold">
                    <div class="text-truncate">Hi there! I am wondering if you can help me with a problem I've been having.</div>
                    <div class="small text-gray-500">Emily Fowler · 58m</div>
                  </div>-->
                </a>
                
                <a class="dropdown-item text-center small text-gray-500" href="#">Lihat semua</a>
              </div>
            </li>

            <div class="topbar-divider d-none d-sm-block"></div>

            <!-- Nav Item - User Information -->
            <li class="nav-item dropdown no-arrow">
              <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?php echo $_SESSION['email'];?></span>
                <img class="img-profile rounded-circle" src="../../assets/img/usericon.jpg">
              </a>
              <!-- Dropdown - User Information -->
              <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                  <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                  Logout
                </a>
              </div>
            </li>

          </ul>

        </nav>
        <!-- End of Topbar -->

        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- DataTales Example -->
          <div id="dataKaryawan">
          <div class="card shadow mb-4">
            <div class="card-header py-3">
			  <span class="float-left" style="padding-top:5px">
				<h5 class="m-0 font-weight-bold text-primary"><i class="fa fa-users" aria-hidden="true"></i> Data Karyawan</h5>
			  </span>
			  <a href="karyawan.php?aksi=tambah_data"><span class="btn btn-primary btn-sm float-right" style="border:1px solid blue">Tambah Data</span></a>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>No</th>
                      <th>Nama</th>
                      <th>Jenis Kelamin</th>
                      <th>Jabatan</th>
                      <th>No HP</th>
                      <th>Alamat</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>

                    <?php
                      error_reporting(0);
                      $semuaKaryawan = "SELECT * FROM `karyawan` JOIN jabatan ON karyawan.id_jabatan = jabatan.id_jabatan";
                      $semuaJabatan = "SELECT * FROM `jabatan`";
                      $dataKaryawan = "SELECT * FROM `karyawan` WHERE id_karyawan = '$id'";

                      $resultKaryawan = mysqli_query($db, $semuaKaryawan);
                      $resultJabatan = mysqli_query($db, $semuaJabatan);
                      $resultDataKaryawan = mysqli_query($db, $dataKaryawan);

                      $no = 1;
                      
                      foreach ($resultKaryawan as $row2) {

                        $jenis_kelamin = $row2['jk']=='P'?'Perempuan':'Laki laki';
                        
                      error_reporting(0);
                    ?>

                    <tr>
                      <td><?=$no++;?></td>
                      <td><?=$row2['nama'];?></td>
                      <td><?=$jenis_kelamin;?></td>
                      <td><?=$row2['nama_jabatan'];?></td>
                      <td><?=$row2['no_hp'];?></td>
                      <td><?=$row2['alamat'];?></td>
                      <td>
                          <a href="karyawan.php?edit=<?=$row2['id_karyawan'];?>" title="Edit" class="btn btn-primary btn-sm btn-circle">
                            <i class="fas fa-terminal"></i>
                          </a>
                          <a data-toggle="modal" data-target="#hapusModal<?=$row2['id_karyawan'];?>" href="#" title="Hapus" class="btn btn-danger btn-circle btn-sm">
                            <i class="fas fa-trash"></i>
                          </a>
                      </td>
                    </tr>

                    <!-- Portofolio Modal-->
                    <div class="modal fade" id="hapusModal<?=$row2['id_karyawan'];?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                      <div class="modal-dialog" role="document">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">ID Karyawan <?=$row2['id_karyawan'];?></h5>
                            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">×</span>
                            </button>
                          </div>
                          <div class="modal-body">
                            Apakah anda yakin ingin menghapus data Karyawan tersebut?
                          </div>
                          <div class="modal-footer">
                            <button class="btn btn-secondary" type="button" data-dismiss="modal">Tutup</button>
                            <a href="../../controller/admin/karyawan.php?hapus_id=<?=$row2['id_karyawan'];?>"><span class="btn btn-danger" >Hapus Sekarang</span></a>
                          </div>
                        </div>
                      </div>
                    </div>

                    <?php } ?>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
      	  </div>

          <!-- Tambah Data Karyawan -->
          <?php 
          	if ($_GET['aksi'] == 'tambah_data') {
          		echo '
          	
          <div class="card shadow mb-4">
            <div class="card-header py-3">
			  <span class="float-left" style="padding-top:5px">
				<h5 class="m-0 font-weight-bold text-primary"><i class="fa fa-users" aria-hidden="true"></i> Tambah Data Karyawan</h5>
			  </span>
            </div>
            <div class="card-body">
              <form action="../../controller/admin/karyawan.php" method="post">
              <div class="form-group">
              	<label>Nama Lengkap <span style="color:red">*</span></label>
                <input type="text" class="form-control" name="nama" placeholder="Masukkan Nama Lengkap" required="">
              </div>
              <div class="row">
              	<div class="col-md-4">
		              <div class="form-group">
		              	<label>Jabatan <span style="color:red">*</span></label>
		                <select name="jabatan" class="form-control" required="">
		                	<option selected="" disabled="">Pilih Jabatan</option>';
		                  
		                	foreach ($resultJabatan as $row3) {
		                		echo '<option value="'.$row3['id_jabatan'].'">'.$row3['nama_jabatan'].'</option>';
		                	}
		                  
		                echo '</select>
		              </div>
		          </div>
		          <div class="col-md-4">
		              <div class="form-group">
		              	<label>Jenis Kelamin <span style="color:red">*</span></label>
		                <select name="jk" class="form-control" required="">
		                	<option value="L">Laki - Laki</option>
		                	<option value="P">Perempuan</option>
		                </select>
		              </div>
		          </div>
		          <div class="col-md-4">
		              <div class="form-group">
		              	<label>No. HP <span style="color:red">*</span></label>
		                <input type="text" class="form-control" name="no_hp" placeholder="Masukkan No. HP" required="">
		              </div>
		          </div>
		      </div>
              <div class="form-group">
              	<label>Alamat <span style="color:red">*</span></label>
                <textarea class="form-control" name="alamat" placeholder="Masukkan Alamat Lengkap" rows="4" required=""></textarea>
              </div>
              <div class="form-group">
              	<div class="row">
              		<div class="col-md-6">
              			<button type="submit" style="width:100%" class="btn btn-primary">Tambah Karyawan</button>
              		</div>
              		<div class="col-md-6">
              			<a href="karyawan.php"><span style="width:100%" class="btn btn-danger">Batalkan</span></a>
              		</div>
              	</div>
              </div>
          	  </form>
            </div>
          </div>';

          echo '<script>document.getElementById("dataKaryawan").innerHTML = "";</script>';
          
          }
          ?>

          <!-- Edit Data Karyawan -->
          <?php 
          	if ($_GET['edit']) {

          		$edit_id = $_GET['edit'];

          		$getKaryawan = "SELECT * FROM karyawan WHERE id_karyawan = '$edit_id'";
          		$resultEdit = mysqli_query($db, $getKaryawan);

          		$row4 = mysqli_fetch_array($resultEdit);

          		echo '<script>document.getElementById("dataKaryawan").innerHTML = "";</script>';
          		echo '
          <script>document.getElementById("updateKaryawan").innerstyle = "";</script>
          <div id="updateKaryawan">
          <div class="card shadow mb-4">
            <div class="card-header py-3">
			  <span class="float-left" style="padding-top:5px">
				<h5 class="m-0 font-weight-bold text-primary"><i class="fa fa-users" aria-hidden="true"></i> Update Data Karyawan</h5>
			  </span>
            </div>
            <div class="card-body">
              <form action="../../controller/admin/karyawan.php" method="post">
              <input type="text" name="id_karyawan" readonly="" hidden="" value="'.$row4['id_karyawan'].'">
              <div class="form-group">
              	<label>Nama Lengkap <span style="color:red">*</span></label>
                <input type="text" class="form-control" name="nama" placeholder="Masukkan Nama Lengkap" value="'.$row4['nama'].'" required="">
              </div>
              <div class="row">
              	<div class="col-md-4">
		              <div class="form-group">
		              	<label>Jabatan <span style="color:red">*</span></label>
		                <select name="jabatan" class="form-control" required="">
		                	<option selected="" disabled="">Pilih Jabatan</option>';
		                   
		                	foreach ($resultJabatan as $row3) {
		                		echo '<option value="'.$row3['id_jabatan'].'"';
		                		if ($row3['id_jabatan'] == $row4['id_jabatan']) {
		                			echo 'selected';
		                		}
		                		echo '>'.$row3['nama_jabatan'].'</option>';
		                	}
		                  
		                echo '</select>
		              </div>
		          </div>
		          <div class="col-md-4">
		              <div class="form-group">
		              	<label>Jenis Kelamin <span style="color:red">*</span></label>
		                <select name="jk" class="form-control" required="">
		                	<option value="L"';
		                	if ($row4['jk'] == 'L') { echo 'selected'; }
		                	echo '>Laki - Laki</option>
		                	<option value="P"';
		                	if ($row4['jk'] == 'P') { echo 'selected'; }
		                	echo '>Perempuan</option>
		                </select>
		              </div>
		          </div>
		          <div class="col-md-4">
		              <div class="form-group">
		              	<label>No. HP <span style="color:red">*</span></label>
		                <input type="text" class="form-control" name="no_hp" value="'.$row4['no_hp'].'" placeholder="Masukkan No. HP" required="">
		              </div>
		          </div>
		      </div>
              <div class="form-group">
              	<label>Alamat <span style="color:red">*</span></label>
                <textarea class="form-control" name="alamat" placeholder="Masukkan Alamat Lengkap" rows="4" required="">'.$row4['alamat'].'</textarea>
              </div>
              <div class="form-group">
              	<div class="row">
              		<div class="col-md-6">
              			<button type="submit" style="width:100%" class="btn btn-primary">Perbarui Data</button>
              		</div>
              		<div class="col-md-6">
              			<a href="karyawan.php"><span style="width:100%" class="btn btn-danger">Batalkan</span></a>
              		</div>
              	</div>
              </div>
          	  </form>
            </div>
          </div>
      	  </div>';
      	  }
          ?>

        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->

      <!-- Footer -->
      <footer class="sticky-footer bg-white">
        <div class="container my-auto">
          <div class="copyright text-center my-auto">
            <span>Copyright &copy;</span>
          </div>
        </div>
      </footer>
      <!-- End of Footer -->

    </div>
    <!-- End of Content Wrapper -->

  </div>
  <!-- End of Page Wrapper -->

  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

  <!-- Modal Logout -->
  <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="logoutModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="logoutModalLabel">Yakin ingin logout?</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">Klik logout untuk mengakhiri sesi user. Terimakasih telah menggunakan di aplikasi ini, sampai jumpa kembali.</div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
          <a class="btn btn-primary" href="../logout.php">Logout</a>
        </div>
      </div>
    </div>
  </div>

  <!-- Bootstrap core JavaScript-->
  <script src="../../assets/vendor/jquery/jquery.min.js"></script>
  <script src="../../assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="../../assets/vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="../../assets/js/sb-admin-2.min.js"></script>

  <!-- Page level plugins -->
  <script src="../../assets/vendor/datatables/jquery.dataTables.min.js"></script>
  <script src="../../assets/vendor/datatables/dataTables.bootstrap4.min.js"></script>

  <!-- Page level custom scripts -->
  <script src="../../assets/js/demo/datatables-demo.js"></script>

</body>

</html>
