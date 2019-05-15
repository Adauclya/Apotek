<?php
  // Disini panggil connect.php
  require '../../controllers/koneksi.php';

  //untuk menangkap data dari URL dengan GET
  $nip = $_GET['nip'];

  session_start();
  //query
  $query =  $connect->query("SELECT * FROM pegawai WHERE nip ='$nip'");
  $result = $query->fetch_assoc();
  $_SESSION['foto'] = $result['foto'];
  $image = $_SESSION['foto'];

        if(isset($_SESSION['level'])) {
            if ($_SESSION['level']!= "admin"){
            echo "
            <script>
            alert('Anda Bukan Admin');
            document.location.href='../../index.php';
            </script>";
            }
        }
 ?>

<!DOCTYPE html>
<html>
    <head>
            <title>Aplikasi CRUD</title>
            <link rel="stylesheet" type="text/css" href="../../assets/css/tampilan2.css">
            <style type="text/css">
                body{
                    background-image: url(../../assets/img/bg.png);
                }
            </style>            
    </head>
    <body>
        <div class="add">
            <table border="1">
                <tr style="margin-bottom: 10px;">
                    <td colspan="2" class="box">
                        <strong>UPDATE DATA</strong>
                    </td>
                </tr>
                <tr>
                    <td class="wdh-1">
                        <form action="update_aksi.php" method="post" enctype="multipart/form-data">
                            <div class="figur">
                            <center>
                                <img src="../../assets/img/profil/<?php echo $image?>" width="300" height="300px">
                            </div>
                            </center>
                        <div class="kotax"><input type="file" name="image"></div>
                    </td>
                    <td>
                        <br>
                        <br>
                        <label>Nip :</label><br/>
                            <input type="text" class="input" name="nip" value="<?php echo $result['nip']?>">
                        <br/>
                        <label>Username :</label><br/>
                            <input type="text" class="input" name="username" value="<?php echo $result['username']?>">
                        <br/>
                        <label>Password :</label><br/>
                            <input type="text" class="input" name="password" value="<?php echo $result['password']?>">
                        <br/>
                        <label>Nama :</label><br/>
                            <input type="text" class="input" name="nama" value="<?php echo $result['nama']?>">
                        <br/>
                        <label>Tanggal Lahir :</label><br/>
                            <input type="date" class="input" name="ttl" value="<?php echo $result['ttl']?>">
                        <br/>
                        <label>Alamat :</label><br/>
                            <input type="text" class="input" name="alamat" value="<?php echo $result['alamat']?>">
                        <br/>
                        <label>Agama :</label><br/>
                            <input type="text" class="input" name="agama" value="<?php echo $result['agama']?>">
                        <br/>
                        <label>Status :</label><br/>
                            <input type="text" class="input" name="status" value="<?php echo $result['status']?>">
                        <br/>
                        <label>level :</label><br/>
                            <select name="level" class="select">
                              <option value="<?php echo $result['level']?>" selected hidden><?php echo $result['level']?></option>
                              <option value="admin">admin</option>
                              <option value="resepsionis">resepsionis</option>
                              <option value="divsup">divsup</option>
                              <option value="divkeu">divkeu</option>
                            </select>
                    </td>
                </tr>
                <tr>
                    <td colspan="2">
                        <button type="submit" class="choose"><img src="../../assets/img/kirim.png" width="20" height="20px">&nbsp;&nbsp;Update</button>
                        </form>
                    <a href="akun.php"><button type="submit" class="batal"><img src="../../assets/img/cancel.png" width="20" height="20px">&nbsp;&nbsp;Batal</button></a>
                    </td>
                </tr>
            </table>
        </div>    
    </body>
</html>
