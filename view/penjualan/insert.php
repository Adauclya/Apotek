<?php
  // Disini panggil connect.php
  require '../../controllers/koneksi.php';

  //mengambil data 
  session_start();
  $nip = $_SESSION['nip'];
  $kd_barang = $_POST['kd_barang'];
  $jml_barang = $_POST['jml_barang'];
  $harga_barang = $_POST['harga_barang'];
  $tanggal = $_POST['tanggal'];


  //memnyimpan data ke dalam database
  $insert = $connect->query("INSERT INTO penjualan (kd_barang, jml_barang, harga_barang, tanggal, nip)
  VALUES ('$kd_barang', '$jml_barang', '$harga_barang', '$tanggal', '$nip')");

  //cek kondisi
if($insert){
  echo "
  <script>
    alert ('data berhasil di upload');
    document.location.href='penjualan.php';
  </script>";
}else{
  echo "
  <script>
    alert ('data gagal di upload');

  </script>".mysqli_error($connect);
}

 ?>
