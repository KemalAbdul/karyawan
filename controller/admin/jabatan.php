
<?php

    include '../koneksi.php';
    
    session_start();

      if($_SESSION['level'] != '1') { // Cek Apakah Sebagai Admin
        echo '<script type="text/javascript">'; 
        echo 'alert("Maaf anda tidak memilik hak akses halaman ini");'; 
        echo 'window.location= "../../index.php";';
        echo '</script>';  
      }
    
    $hapus_id = $_GET['hapus_id'];

    if ($hapus_id) {

        // Query Hapus Data Jabatan ke Database
        $query3 = "DELETE FROM jabatan WHERE id_jabatan = '$hapus_id'";
       
        // Proses semua aksi ke dalam database
        mysqli_query($db, $query3);

        // Proses selesai, redirect ke halaman karyawan
        echo '<script type="text/javascript">'; 
        echo 'alert("Berhasil! Data Jabatan telah dihapus");'; 
        echo 'window.location= "../../view/admin/jabatan.php";';
        echo '</script>'; 

    }

    if ($_POST['id_jabatan']) { // Edit Jabatan Karyawan

        $id_jabatan = $_POST['id_jabatan'];
        $nama_jabatan = $_POST['nama_jabatan'];

        $query = "UPDATE jabatan SET nama_jabatan = '$nama_jabatan' WHERE id_jabatan = '$id_jabatan'";

        mysqli_query($db, $query);

        // Proses selesai, redirect ke halaman Jabatan
        echo '<script type="text/javascript">'; 
        echo 'alert("Berhasil! Data Jabatan telah diperbarui");'; 
        echo 'window.location= "../../view/admin/jabatan.php";';
        echo '</script>'; 

    }

    elseif (!$_POST['id_jabatan'] AND $_POST['nama_jabatan']) { // Tambah Data Baru
        // Inisialisasi variable dari data POST
        $nama_jabatan = $_POST['nama_jabatan'];

        // Query Update Data Karyawan ke Database
        $query2 = "INSERT INTO jabatan SET nama_jabatan = '$nama_jabatan'";
       
        // Proses semua aksi ke dalam database
        mysqli_query($db, $query2);
        
        // Proses selesai, redirect ke halaman karyawan
        echo '<script type="text/javascript">'; 
        echo 'alert("Berhasil! Data Jabatan baru telah ditambahkan");'; 
        echo 'window.location= "../../view/admin/jabatan.php";';
        echo '</script>'; 

    }

    else {

        echo '<script>window.location= "../../view/admin/jabatan.php";<script>';

    }

    // Gunakan print_r untuk melakukan troubleshooting jika terjadi kesalahan
    //print_r($query);

  ?>
