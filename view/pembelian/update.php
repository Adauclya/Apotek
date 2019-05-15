<?php
  // Disini panggil connect.php
  require '../../controllers/koneksi.php';

  //untuk menangkap data dari URL dengan GET
  $kd_pembelian = $_GET['kd_pembelian'];

  //query
  $query =  $connect->query("SELECT * FROM pembelian WHERE kd_pembelian ='$kd_pembelian'");
  $result = $query->fetch_assoc();
 ?>

 <html lang="en" dir="ltr">
   <head>
     <meta charset="utf-8">
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
        <div class="add" style="width: 600px">
            <table border="0" style="width: 600px;">
                <tr style="margin-bottom: 10px;">
                    <td colspan="2" class="box">
                        <strong>UPDATE DATA</strong>
                    </td>
                </tr>
                <tr>
                    <td width="70px">
                        <form action="update_aksi.php" method="post">
                    </td>
                    <td>
                        <br>
                        <br>
                            <label>No Faktur :</label><br/>
                                <input type="text" name="kd_pembelian" class="select" value="<?php echo $result['kd_pembelian']?>">
                            <br/>
                            <label>tanggal</label><br/>
                                <input type="date" name="tanggal_beli" class="select" value="<?php echo $result['tanggal_beli']?>">
                            <br/>
                            <label>Kode Barang</label><br/>
                                <select name="kd_barang" class="select">
                                    <option value="<?php echo $result['kd_barang']?>" selected hidden><?php echo $result['kd_barang']?></option>
                                    <option value="A001-Hexetidine">A001-Hexetidine</option>
                                    <option value="A002-Benorilate">A002-Benorilate</option>
                                    <option value="A003-Klindamisin">A003-Klindamisin</option>
                                    <option value="A004-Alopurinol">A004-Alopurinol</option>
                                    <option value="A005-Orsiprenalin">A005-Orsiprenalin</option>
                                </select>
                            <br>
                            <label>Jumlah</label><br/>
                                <input type="text" name="jml" class="select" value="<?php echo $result['jml']?>">
                            <br/>
                            <label>Harga Beli</label><br/>
                                <input type="text" name="hrg_barang" class="select" value="<?php echo $result['hrg_barang']?>">
                            <br/>
                    </td>
                </tr>
                <tr>
                    <td colspan="2">
                        <button type="submit" class="choose"><img src="../../assets/img/kirim.png" width="20" height="20px">&nbsp;&nbsp;Update</button>
                        </form>
                    <a href="pembelian.php"><button type="submit" class="batal" style="margin-left: 70px;"><img src="../../assets/img/cancel.png" width="20" height="20px">&nbsp;&nbsp;Batal</button></a>
                    </td>
                </tr>
            </table>
        </div>    
    </body>
</html>

