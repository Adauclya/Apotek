<?php
  // Disini panggil connect.php
  require '../../controllers/koneksi.php';

  //mengambil data 
  session_start();
  $nip = $_SESSION['nip'];
  $kd_pembelian = $_POST['kd_pembelian'];
  $kd_barang = $_POST['kd_barang'];
  $jml = $_POST['jml'];
  $hrg_barang = $_POST['hrg_barang'];
  $tanggal_beli = $_POST['tanggal_beli'];


  //memnyimpan data ke dalam database
  $insert = $connect->query("INSERT INTO pembelian (kd_pembelian, kd_barang, jml, hrg_barang, tanggal_beli, nip)
  VALUES ('$kd_pembelian', '$kd_barang', '$jml', '$hrg_barang', '$tanggal_beli', '$nip')");

  //cek kondisi
if($insert){
  echo "
  <script>
    alert ('data berhasil di upload');
    document.location.href='pembelian.php';
  </script>";
}else{
  echo "
  <script>
    alert ('data gagal di upload');
    document.location.href='pembelian.php';
  </script>";
}

 ?>
