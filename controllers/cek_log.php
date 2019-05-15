<?php
include 'koneksi.php';
$username = $_POST['username'];
$password = $_POST['password'];
$cek      = mysqli_query($connect, "select * from pegawai where username='$username' and password='$password'");
$result   = mysqli_num_rows($cek);
$data = mysqli_fetch_array($cek);

if($result>0){
    if ($data['level'] == 'admin') {
        session_start();
        $_SESSION['username'] = $data['username'];
        // $data['level'] level digunaan untu memanggil value level dari username yang telah login dan disimpan dalam $_SESSION['level']
        $_SESSION['nama'] = $data['nama'];
        $_SESSION['nip'] = $data['nip'];
        $_SESSION['level']    = $data['level'];
        echo "<script>document.location.href='../view/welcome_admin.php'</script>";
 
    }

    elseif($data['level'] == 'resepsionis'){
        session_start();
        $_SESSION['username'] = $data['username'];
        // $data['level'] level digunaan untu memanggil value level dari username yang telah login dan disimpan dalam $_SESSION['level']
        $_SESSION['nama'] = $data['nama'];
        $_SESSION['nip'] = $data['nip'];
        $_SESSION['level']    = $data['level'];
        echo "<script>document.location.href='../view/welcome_resepsionis.php'</script>";
    }

    elseif($data['level'] == 'divkeu'){
        session_start();
        $_SESSION['username'] = $data['username'];
        // $data['level'] level digunaan untu memanggil value level dari username yang telah login dan disimpan dalam $_SESSION['level']
        $_SESSION['nama'] = $data['nama'];
        $_SESSION['nip'] = $data['nip'];
        $_SESSION['level']    = $data['level'];
        echo "<script>document.location.href='../view/welcome_divkeu.php'</script>";
    }

    elseif($data['level'] == 'divsup'){
        session_start();
        $_SESSION['username'] = $data['username'];
        // $data['level'] level digunaan untu memanggil value level dari username yang telah login dan disimpan dalam $_SESSION['level']
        $_SESSION['nama'] = $data['nama'];
        $_SESSION['nip'] = $data['nip'];
        $_SESSION['level']    = $data['level'];
        echo "<script>document.location.href='../view/welcome_divsup.php'</script>";
    }
}
    else{
        header("location:../index.php?pesan=gagal");
    }   
?>