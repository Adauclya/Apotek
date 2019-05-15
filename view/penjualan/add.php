<!DOCTYPE html>
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
                        <strong>TAMBAH DATA</strong>
                    </td>
                </tr>
                <tr>
                    <td width="70px">
                        <form action="insert.php" method="post" >
                    </td>
                    <td>
                        <br>
                        <br>
                          <label>tanggal</label><br/>
                              <input type="date" name="tanggal" class="input" required>
                          <br/>
                          <label>Kode Barang</label><br/>
                              <select name="kd_barang" class="select" required>
                                  <option value="" selected disabled>Pilih Kode Barang</option>
                                  <?php
                                  $query = mysqli_query($connect, "SELECT kd_barang, jml_barang, id_barang, tgl_kdl FROM barang WHERE jml_barang > 0 ORDER BY kd_barang ASC");
                                  while ($data = mysqli_fetch_array($query)) {
                                  ?>
                                  <option value="<?= $data['id_barang']; ?>"><?= $data['kd_barang']; ?> (sisa : <?= $data['jml_barang']; ?>, expire: <?= $data['tgl_kdl']; ?>)</option>
                                  <?php } ?>
                              </select>
                          <br/>
                          <label>Jumlah</label><br/>
                              <input type="number" name="jml_barang" class="input" required>
                          <br/>
                          <label>Harga</label><br/>
                              <input type="number" name="harga_barang" class="input" required>
                          <br/>
                    </td>
                </tr>
                <tr>
                    <td colspan="2">
                        <button type="submit" class="choose"><img src="../../assets/img/kirim.png" width="20" height="20px">&nbsp;&nbsp;Simpan</button>
                        </form>
                    <a href="penjualan.php"><button type="submit" class="batal" style="margin-left: 70px;"><img src="../../assets/img/cancel.png" width="20" height="20px">&nbsp;&nbsp;Batal</button></a>
                    </td>
                </tr>
            </table>
        </div>    
    </body>
</html>
