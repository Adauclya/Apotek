<!DOCTYPE html>
<html>
    <head>
            <title>Aplikasi CRUD</title>
            <link rel="stylesheet" type="text/css" href="../../assets/css/tampilan2.css">
            <style type="text/css">
                body{
                    background-image: url(../../assets/img/bg.png);
                    height: auto;
                }
            </style>
    </head>
    <body>
        <?php include '../../controllers/keamanan_admin.php'?>
        <div class="add">
            <table border="0">
                <tr style="margin-bottom: 10px;">
                    <td colspan="2" class="box">
                        <strong>TAMBAH DATA</strong>
                    </td>
                </tr>
                <tr>
                    <td class="wdh-1">
                        <form action="insert.php" method="post" enctype="multipart/form-data">
                            <div class="figur">
                            <center>
                                <img src="../../assets/img/profil/default.png" width="300" height="300px">
                            </div>
                            </center>
                        <div class="kotax"><input type="file" name="image"></div>
                    </td>
                    <td>
                        <br>
                        <br>
                            <?php echo form(); ?>
                    </td>
                </tr>
                <tr>
                    <td colspan="2">
                        <button type="submit" class="choose"><img src="../../assets/img/kirim.png" width="20" height="20px">&nbsp;&nbsp;Simpan</button>
                        </form>
                    <a href="akun.php"><button type="submit" class="batal"><img src="../../assets/img/cancel.png" width="20" height="20px">&nbsp;&nbsp;Batal</button></a>
                    </td>
                </tr>
            </table>
        </div>    
    </body>
</html>

<?php
    function form(){
        echo 
        "
                        <label>Nip :</label><br/>
                            <input type='text' class='input' name='nip'>
                        <br/>
                        <label>Username :</label><br/>
                            <input type='text' class='input' name='username'>
                        <br/>
                        <label>Password :</label><br/>
                            <input type='text' class='input' name='password'>
                        <br/>
                        <label>Nama :</label><br/>
                            <input type='text' class='input' name='nama'>
                        <br/>
                        <label>Tanggal Lahir :</label><br/>
                            <input type='date' class='input' name='ttl'>
                        <br/>
                        <label>Alamat :</label><br/>
                            <input type='text' class='input' name='alamat'>
                        <br/>
                        <label>Agama :</label><br/>
                            <input type='text' class='input' name='agama'>
                        <br/>
                        <label>Status :</label><br/>
                            <input type='text' class='input' name='status'>
                        <br/>
                        <label>level :</label><br/>
                            <select name='level' class='select'>
                              <option value='admin'>admin</option>
                              <option value='resepsionis'>resepsionis</option>
                              <option value='divsup'>divsup</option>
                              <option value='divkeu'>divkeu</option>
                            </select>            
        ";
    } 


?>