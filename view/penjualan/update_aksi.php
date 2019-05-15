<?php
  // Disini panggil connect.php
  require '../../controllers/koneksi.php';

  //mengambil data dari file index.php
  session_start();
  $nip = $_SESSION['nip'];

  $kd_penjualan = $_POST['kd_penjualan'];
  $kd_barang = $_POST['kd_barang'];
  $jml_barang = $_POST['jml_barang'];
  $harga_barang = $_POST['harga_barang'];
  $tanggal = $_POST['tanggal'];
  //memnyimpan data ke dalam database
  $update = $connect->query("UPDATE penjualan SET
    kd_barang='$kd_barang',
    jml_barang='$jml_barang',
    harga_barang='$harga_barang',
    tanggal='$tanggal',
    nip='$nip' WHERE kd_penjualan='$kd_penjualan'");

  //cek kondisi
if($update){
  echo "
  <script>
    alert ('data berhasil di update');
    document.location.href='penjualan.php';
  </script>";
}else{
  echo "
  <script>
    alert ('data gagal di update');
    document.location.href='penjualan.php';
  </script>";
}

 ?>