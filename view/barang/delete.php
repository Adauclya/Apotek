<?php
require '../../controllers/koneksi.php';

//untuk menangkap data dari URL dengan GET
$id_barang = $_GET['id_barang'];

//query delete
$delete = $connect->query("DELETE  FROM barang WHERE id_barang = '$id_barang' ");

//cek kondisi
if($delete){
  echo "
  <script>
    alert ('data berhasil di hapus');
    document.location.href='barang.php';
  </script>";
}else{
  echo "
  <script>
    alert ('data gagal di hapus');
    document.location.href='barang.php';
  </script>";
}

?>
