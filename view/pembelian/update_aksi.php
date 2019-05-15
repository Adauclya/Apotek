<?php
  // Disini panggil connect.php
  require '../../controllers/koneksi.php';

  //mengambil data dari file index.php
session_start();
  $nip = $_SESSION['nip'];
  $kd_pembelian = $_POST['kd_pembelian'];
  $kd_barang = $_POST['kd_barang'];
  $jml = $_POST['jml'];
  $hrg_barang = $_POST['hrg_barang'];
  $tanggal_beli = $_POST['tanggal_beli'];


  //memnyimpan data ke dalam database
  $update = $connect->query("UPDATE pembelian 
    SET kd_pembelian='$kd_pembelian',
    kd_barang='$kd_barang',
    jml='$jml',
    hrg_barang='$hrg_barang',
    tanggal_beli='$tanggal_beli',
    nip='$nip' WHERE kd_pembelian='$kd_pembelian'");

  //cek kondisi
if($update){
  echo "
  <script>
    alert ('data berhasil di update');
    document.location.href='pembelian.php';
  </script>";
}else{
  echo "
  <script>
    alert ('data gagal di update');
    document.location.href='pembelian.php';
  </script>";
}

 ?>