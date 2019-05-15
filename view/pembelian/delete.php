<?php
require '../../controllers/koneksi.php';

//untuk menangkap data dari URL dengan GET
$kd_pembelian = $_GET['kd_pembelian'];

//query delete
$delete = $connect->query("DELETE  FROM pembelian WHERE kd_pembelian = '$kd_pembelian' ");

//cek kondisi
if($delete){
  echo "
  <script>
    alert ('data berhasil di hapus');
    document.location.href='pembelian.php';
  </script>";
}else{
  echo "
  <script>
    alert ('data gagal di hapus');
    document.location.href='pembelian.php';
  </script>";
}
?>