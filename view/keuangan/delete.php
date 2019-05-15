<?php
require '../../controllers/koneksi.php';

//untuk menangkap data dari URL dengan GET
$kd_operasional = $_GET['kd_operasional'];

//query delete
$delete = $connect->query("DELETE  FROM operasional WHERE kd_operasional = '$kd_operasional' ");

//cek kondisi
if($delete){
  echo "
  <script>
    alert ('data berhasil di hapus');
    document.location.href='keuangan.php';
  </script>";
}else{
  echo "
  <script>
    alert ('data gagal di hapus');
    document.location.href='keuangan.php';
  </script>";
}
?>