<?php include '../../controllers/keamanan_admin.php'?>

<?php
require '../../controllers/koneksi.php';


//untuk menangkap data dari URL dengan GET
$nip = $_GET['nip'];

//query delete
$delete = $connect->query("DELETE  FROM pegawai WHERE nip = '$nip' ");

//cek kondisi
if($delete){
  echo "
  <script>
    alert ('data berhasil di hapus');
    document.location.href='akun.php';
  </script>";
}else{
  echo "
  <script>
    alert ('data gagal di hapus');
    document.location.href='akun.php';
  </script>";
}
?>