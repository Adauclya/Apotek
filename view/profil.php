<?php
  // Disini panggil connect.php
  require '../controllers/koneksi.php';

  //untuk menangkap data dari URL dengan GET
  
  session_start();
 
  $nip = $_SESSION['nip'];
  $query =  $connect->query("SELECT * FROM pegawai WHERE nip ='$nip'");
  $result = $query->fetch_assoc();
  $_SESSION['foto'] = $result['foto'];
  $image = $_SESSION['foto'];
 ?>
<!DOCTYPE html>
<html>
    <head>
            <title>Aplikasi CRUD</title>
            <link rel="stylesheet" type="text/css" href="../assets/css/tampilan2.css">
            <style type="text/css">
                body{
                    background-image: url(../assets/img/bg.png);
                    height: auto;
                }
            </style>
    </head>
    <body>
        <div class="add">
            <table border="0">
                <tr style="margin-bottom: 10px;">
                    <td colspan="2" class="box">
                        <strong>Profil</strong>
                    </td>
                </tr>
                <tr>
                    <td class="wdh-1">
                        <form method="post" enctype="multipart/form-data">
                            <div class="figur">
                            <center>
                                <img src="../assets/img/profil/<?php echo $image?>" width="300" height="300px">
                            </div>
                            </center>
                    </td>
                    <td>
                        <br>
                        <br>
                            
                        <label>Nip :</label><br/>
                            <input type='text' class='input' name='nip' disabled value="<?php echo $result['nip']?>">
                        <br/>
                        <label>Username :</label><br/>
                            <input type='text' class='input' name='username' disabled value="<?php echo $result['username']?>">
                        <br/>
                        <label>Nama :</label><br/>
                            <input type='text' class='input' name='nama' disabled value="<?php echo $result['nama']?>">
                        <br/>
                        <label>Tanggal Lahir :</label><br/>
                            <input type='date' class='input' name='ttl' disabled value="<?php echo $result['ttl']?>">
                        <br/>
                        <label>Alamat :</label><br/>
                            <input type='text' class='input' name='alamat' disabled value="<?php echo $result['alamat']?>">
                        <br/>
                        <label>Agama :</label><br/>
                            <input type='text' class='input' name='agama' disabled value="<?php echo $result['agama']?>">
                        <br/>
                        <label>Status :</label><br/>
                            <input type='text' class='input' name='status' disabled value="<?php echo $result['status']?>">
                        <br/>
                        <label>Jabatan :</label><br/>
                            <input type='text' class='input' name='level' disabled value="<?php echo $result['level']?>">
                    </td>
                </tr>
                <tr>
                    <td colspan="2">
                        <button type="submit" class="batal" name="batal"><img src="../assets/img/back.png" width="20" height="20px">&nbsp;&nbsp;Batal</button>
                        </form>
                    
                    </td>
                </tr>
            </table>
        </div>    
    </body>
</html>
<?php 
    if (isset($_POST['batal'])) {
        if ($_SESSION['level'] == 'admin') {
            echo "<script>document.location.href='../view/welcome_admin.php'</script>";
        }elseif ($_SESSION['level'] == 'resepsionis') {
            echo "<script>document.location.href='../view/welcome_resepsionis.php'</script>";
        }elseif ($_SESSION['level'] == 'divkeu') {
            echo "<script>document.location.href='../view/welcome_divkeu.php'</script>";
        }elseif ($_SESSION['level'] == 'divsup') {
            echo "<script>document.location.href='../view/welcome_divsup.php'</script>";
        }
    }


?>         