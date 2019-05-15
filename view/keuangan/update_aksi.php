<?php
  // Disini panggil connect.php
  require '../../controllers/koneksi.php';

  //mengambil data dari file index.php
  session_start();
  $nip = $_SESSION['nip'];

  $kd_operasional = $_POST['kd_operasional'];
  $uraian = $_POST['uraian'];
  $pengeluaran = $_POST['pengeluaran'];
  $tanggal_op = $_POST['tanggal_op'];
  $oleh = $_POST['oleh'];

  //memnyimpan data ke dalam database
  $update = $connect->query("UPDATE operasional SET
    tanggal_op='$tanggal_op',
    oleh='$oleh',
    pengeluaran='$pengeluaran',
    uraian='$uraian',
    nip='$nip' WHERE kd_operasional='$kd_operasional'");

  //cek kondisi
if($update){
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
