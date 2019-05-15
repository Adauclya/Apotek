<?php
  // Disini panggil connect.php
  require '../../controllers/koneksi.php';

  //mengambil data dari file index.php
session_start();

  $nip = $_SESSION['nip'];
  $id_barang = $_POST['id_barang'];
  $kd_barang = $_POST['kd_barang'];
  $jml_barang = $_POST['jml_barang']; 
  $golongan = $_POST['golongan'];
  $tgl_kdl = $_POST['tgl_kdl'];
  $harga_jual = $_POST['harga_jual'];
  $harga_beli = $_POST['harga_beli'];


  //memnyimpan data ke dalam database
  $update = $connect->query("UPDATE barang 
    SET kd_barang='$kd_barang',
    jml_barang='$jml_barang',
    golongan='$golongan',
    tgl_kdl='$tgl_kdl',
    harga_jual='$harga_jual',
    harga_beli='$harga_beli',
    nip='$nip' WHERE id_barang='$id_barang'");

  //cek kondisi
if($update){
  echo "
  <script>
    alert ('data berhasil di ubah');
    document.location.href='barang.php';
  </script>";
}else{
  echo "
  <script>
    alert ('data gagal di ubah');
    document.location.href='barang.php';
  </script>";
}

 ?>

