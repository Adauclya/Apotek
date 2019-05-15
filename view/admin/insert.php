<?php
  // Disini panggil koneksi.php
  require '../../controllers/koneksi.php';

 
    $folder ="../../assets/img/profil/";
    $image = $_FILES['image']['name'];
    $path = $folder . $image ;
    $target_file=$folder.basename($_FILES["image"]["name"]);
    $imageFileType=pathinfo($target_file,PATHINFO_EXTENSION);
    $allowed=array('jpeg','png' ,'jpg');
    $filename=$_FILES['image']['name'];
    $ext=pathinfo($filename, PATHINFO_EXTENSION);
    if(!in_array($ext,$allowed))
    {
      echo "Terdapat kesalahan dalam mengupload gambar, silahkan periksa ekstensi file dan keberadaan foto tersebut.";
    }else{
      move_uploaded_file( $_FILES['image'] ['tmp_name'], $path);

  //mengambil data dari file index.php

  $nip = $_POST['nip'];
  $nama = $_POST['nama'];
  $ttl =$_POST['ttl']; 
  $alamat = $_POST['alamat'];
  $username = $_POST['username'];
  $password = $_POST['password'];
  $agama = $_POST['agama'];
  $status = $_POST['status'];
  $level = $_POST['level'];


  //memnyimpan data ke dalam database
  $insert = $connect->query("INSERT INTO pegawai (nip, username, password, nama, ttl, alamat, agama, status, foto, level ) VALUES ('$nip', '$username', '$password', '$nama', '$ttl', '$alamat', '$agama', '$status',    '$image', '$level')");

  //cek kondisi
if($insert){
  echo "
  <script>
    alert ('data berhasil di upload');
    document.location.href='akun.php';
  </script>";
}else{
  echo "
  <script>
    alert ('data gagal di upload');
    document.location.href='akun.php';
  </script>";
}

}

 ?>
