<?php
  // Disini panggil connect.php
  require '../../controllers/koneksi.php';

  //untuk menangkap data dari URL dengan GET
  $kd_penjualan = $_GET['kd_penjualan'];

  //query
  $query =  $connect->query("SELECT p.*, b.kd_barang FROM penjualan p, barang b WHERE p.kd_penjualan ='".$kd_penjualan."'");
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
                              <input type="hidden" name="kd_penjualan" class="select" value="<?php echo $result['kd_penjualan']?>">
                          <label>tanggal</label><br/>
                              <input type="date" name="tanggal" class="select" value="<?php echo $result['tanggal']?>">
                          <br/>
                          <label>Kode Barang</label><br/>
                              <select name="kd_barang" class="select">
                                  <?php
                                  $query = mysqli_query($connect, "SELECT kd_barang, jml_barang, id_barang, tgl_kdl FROM barang WHERE jml_barang > 0 ORDER BY kd_barang ASC");
                                  while ($data = mysqli_fetch_array($query)) {
                                  ?>
                                  <option value="<?= $data['id_barang']; ?>" <?php if ($result['id_barang'] == $data['id_barang']) { echo "selected"; } ?>><?= $data['kd_barang']; ?></option>
                                  <?php } ?>
                              </select>
                          <br/>
                          <label>Jumlah</label><br/>
                              <input type="text" name="jml_barang" class="select" value="<?php echo $result['jml_barang']?>">
                          <br/>
                          <label>Harga</label><br/>
                              <input type="text" name="harga_barang" class="select" value="<?php echo $result['harga_barang']?>">
                          <br/>
                    </td>
                </tr>
                <tr>
                    <td colspan="2">
                        <button type="submit" class="choose"><img src="../../assets/img/kirim.png" width="20" height="20px">&nbsp;&nbsp;Update</button>
                        </form>
                    <a href="penjualan.php"><button type="submit" class="batal" style="margin-left: 70px;"><img src="../../assets/img/cancel.png" width="20" height="20px">&nbsp;&nbsp;Batal</button></a>
                    </td>
                </tr>
            </table>
        </div>    
    </body>
</html>

