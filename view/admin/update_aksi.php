<?php
  // Disini panggil connect.php
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
  $update = $connect->query("UPDATE pegawai 
    SET nip='$nip',
    nama='$nama',
    ttl='$ttl',
    alamat='$alamat',
    password='$password',
    agama='$agama',
    status='$status',
    foto = '$image',
    level= '$level' WHERE nip='$nip'") or die(mysqli_error($connect));

  //cek kondisi
if($update){
  echo "
  <script>
    alert ('data berhasil di ubah');
    document.location.href='akun.php';
  </script>";
}else{
  echo "
  <script>
    alert ('data gagal di ubah');
    document.location.href='akun.php';
  </script>";
}
}
 ?>
