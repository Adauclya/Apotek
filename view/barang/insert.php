<?php
  // Disini panggil connect.php
  require '../../controllers/koneksi.php';

  //mengambil data 
  session_start();
  $nip = $_SESSION['nip'];
  $kd_barang = $_POST['kd_barang'];
  $jml_barang = $_POST['jml_barang']; 
  $golongan = $_POST['golongan'];
  $tgl_kdl = $_POST['tgl_kdl'];
  $harga_jual = $_POST['harga_jual'];
  $harga_beli = $_POST['harga_beli'];


  //memnyimpan data ke dalam database
  $insert = $connect->query("INSERT INTO barang (kd_barang, jml_barang, golongan, tgl_kdl, nip, harga_jual, harga_beli)
  VALUES ('$kd_barang', '$jml_barang', '$golongan', '$tgl_kdl', '$nip', '$harga_jual','$harga_beli')");

  //cek kondisi
if($insert){
  echo "
  <script>
    alert ('data berhasil di upload');
    document.location.href='barang.php';
  </script>";
}else{
  echo "
  <script>
    alert ('data gagal di upload');
    document.location.href='barang.php';
  </script>";
}

 ?>

