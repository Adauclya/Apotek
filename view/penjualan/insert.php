<?php
  // Disini panggil connect.php
  require '../../controllers/koneksi.php';

  //mengambil data 
  session_start();
  $nip = $_SESSION['nip'];
  $id_barang = $_POST['kd_barang'];
  $jml_barang = $_POST['jml_barang'];
  $harga_barang = $_POST['harga_barang'];
  $tanggal = $_POST['tanggal'];

  $getid = mysqli_query($connect, "SELECT b.jml_barang FROM barang b, penjualan p WHERE b.id_barang='".$id_barang."'");
  $data = mysqli_fetch_array($getid);
  if ($data['0'] > $jml_barang) {
      //memnyimpan data ke dalam database
      $insert = $connect->query("INSERT INTO penjualan (jml_barang, harga_barang, tanggal, nip, id_barang)
      VALUES ('".$jml_barang."', '".$harga_barang."', '".$tanggal."', '".$nip."', '".$id_barang."')");

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
        document.location.href='add.php';
      </script>".mysqli_error($connect);
    }
  } else {
    echo "
    <script>
      alert ('Jumlah yang dimasukan melebihi stok yang ada!');
      document.location.href='add.php';
    </script>";  
  }
 ?>
