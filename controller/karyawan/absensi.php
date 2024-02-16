
<?php

    include '../koneksi.php';
    
    session_start();

      if(!$_SESSION['id_karyawan']) { // Cek Apakah Sebagai Admin
        echo '<script type="text/javascript">'; 
        echo 'alert("Maaf anda tidak memilik hak akses halaman ini");'; 
        echo 'window.location= "../../index.php";';
        echo '</script>';  
      }
    
    $aksi = $_GET['aksi'];
    $id_karyawan = $_SESSION['id_karyawan'];
    $hariini = date("Y-m-d");
    $jam = date("H:i:s");

    if ($aksi == 'in') { // Input data masuk

        // Query ke Database
        $query1 = "SELECT * FROM kehadiran WHERE hari = '$hariini' AND id_karyawan = '$id_karyawan'";
        $cek = mysqli_num_rows(mysqli_query($db, $query1));

        // Cek Kondisi & Melakukan aksi ke database
        if ($cek == '0') {
            $query2 = "INSERT INTO `kehadiran`(`id_karyawan`, `hari`, `masuk`) VALUES ('$id_karyawan','$hariini','$jam')";
            mysqli_query($db, $query2);
            //print_r($query2);
        }
        else {
            $query3 = "UPDATE kehadiran SET masuk = '$jam' WHERE hari = '$hariini' AND id_karyawan = '$id_karyawan'";
            mysqli_query($db, $query3);
            //print_r($query3);
        }

        // Proses selesai, redirect ke halaman karyawan
        echo '<script type="text/javascript">'; 
        echo 'alert("Berhasil! Data Presensi anda berhasil dicatat oleh sistem");'; 
        echo 'window.location= "../../view/karyawan";';
        echo '</script>'; 

    }

    elseif ($aksi == 'out') { // Input data pulang

        // Query ke Database
        $query1 = "SELECT * FROM kehadiran WHERE hari = '$hariini' AND id_karyawan = '$id_karyawan'";
        $cek = mysqli_num_rows(mysqli_query($db, $query1));

        // Cek Kondisi & Melakukan aksi ke database
        if ($cek == '0') {
            $query2 = "INSERT INTO `kehadiran`(`id_karyawan`, `hari`, `pulang`) VALUES ('$id_karyawan','$hariini','$jam')";
            mysqli_query($db, $query2);
            //print_r($query2);
        }
        else {
            $query3 = "UPDATE kehadiran SET pulang = '$jam' WHERE hari = '$hariini' AND id_karyawan = '$id_karyawan'";
            mysqli_query($db, $query3);
            //print_r($query3);
        }

        // Proses selesai, redirect ke halaman karyawan
        echo '<script type="text/javascript">'; 
        echo 'alert("Berhasil! Data Presensi anda berhasil dicatat oleh sistem");'; 
        echo 'window.location= "../../view/karyawan";';
        echo '</script>'; 

    }

    else {

        echo '<script>window.location= "../../view/karyawan";<script>';

    }

    // Gunakan print_r untuk melakukan troubleshooting jika terjadi kesalahan
    //print_r($query);

  ?>
