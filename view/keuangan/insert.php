<?php
  // Disini panggil connect.php
  require '../../controllers/koneksi.php';

  //mengambil data 
  session_start();
  $nip = $_SESSION['nip'];
  $uraian = $_POST['uraian'];
  $pengeluaran = $_POST['pengeluaran'];
  $tanggal_op = $_POST['tanggal_op'];
  $oleh = $_POST['oleh'];


  //memnyimpan data ke dalam database
  $insert = $connect->query("INSERT INTO operasional (tanggal_op, oleh, pengeluaran, uraian, nip)
  VALUES ('$tanggal_op', '$oleh', '$pengeluaran', '$uraian', '$nip')");

  //cek kondisi
if($insert){
  echo "
  <script>
    alert ('data berhasil di upload');
    document.location.href='keuangan.php';
  </script>";
}else{
  echo "
  <script>
    alert ('data gagal di upload');
    document.location.href='keuangan.php';
  </script>";
}

 ?>
