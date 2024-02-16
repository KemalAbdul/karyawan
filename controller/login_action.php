
<?php

    include 'koneksi.php';

    if ($_POST['id_karyawan']) { // Login untuk presensi Karyawan
        
        $id = $_POST['id_karyawan'];
        $query = "SELECT * FROM `karyawan` WHERE id_karyawan = '$id'";
        $result = mysqli_query($db, $query);
        
        $row = mysqli_fetch_array($result);

        if (!mysqli_num_rows($result)) {
            echo '<script type="text/javascript">'; 
            echo 'alert("Maaf ID Karyawan anda salah");'; 
            echo 'window.location= "../../index.php";';
            echo '</script>';  
        }

        // Memulai session login user
        session_start();
        $_SESSION['id_karyawan'] = $row['id_karyawan'];
        $_SESSION['nama'] = $row['nama'];

    }

    else { // Login untuk Admin atau HRD

        // Inisialisasi variable dari data POST input login
        $email = $_POST['email'];
        $password = md5($_POST['password']);

        // Akses Database pengecekan user
        $query = "SELECT * FROM `user` WHERE email = '$email' AND password = '$password'";
        $result = mysqli_query($db, $query);
        
        // Memeriksa apakah email dan password tersedia, jika gagal kembali ke halaman login
        if (!mysqli_num_rows($result)) {
        	echo '<script type="text/javascript">'; 
            echo 'alert("Maaf email atau password anda salah");'; 
            echo 'window.location= "../../index.php";';
            echo '</script>';  
        }

        $row = mysqli_fetch_array($result);

        // Memulai session login user
        session_start();
        $_SESSION['id_user'] = $row['id_user'];
        $_SESSION['email'] = $row['email'];
        $_SESSION['level'] = $row['level'];

    }

    // Redirect lokasi hak akses user
    if ($_SESSION['level'] == '1') {
    	header('location:../view/admin/');
    }

    if ($_SESSION['nama']) {
        header('Location:../view/karyawan');
    }

    // Print_R untuk debugging saat ada kesalahan
    //print_r($query);
    
?>