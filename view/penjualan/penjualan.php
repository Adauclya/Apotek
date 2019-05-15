<!-- link header  -->
<?php include '../layout/header2.php'?>
<!-- end header -->


		<!-- start menu -->
		<div class="menu">
				<a href="../../view/welcome_admin.php">
					<input type="submit" name="beranda" value="Beranda" class="menubtn">
				</a>
		 		<a href="../admin/akun.php">
		 			<input type="submit" name="beranda" value="Akun" class="menubtn">
		 		</a>
			 	<a href="../penjualan/penjualan.php">
			 		<input type="submit" name="beranda" value="Penjualan" class="menubtn" style="border-bottom: 2px solid white; ">
			 	</a>
		 		<a href="../pembelian/pembelian.php">
		 			<input type="submit" name="beranda" value="Pembelanjaan" class="menubtn">
		 		</a>
			 	<a href="../keuangan/keuangan.php">
			 		<input type="submit" name="beranda" value="Keuangan" class="menubtn">
			 	</a>
		 		<a href="../barang/barang.php">
		 			<input type="submit" name="beranda" value="Stok Barang" class="menubtn">
		 		</a>
	    </div> 
	    <!-- end menu -->


 		<!-- image slider -->
	    <div class="slider">
	    	<img src="../../assets/img/res.png" style="width:100%; height:400px;">
	    	<br>
	    	<p align="center" class="p"><strong>Data Penjualan</p></strong>
	    	<hr class="hr" noshade="blue">
	    </div>
	    <!-- end of image slider -->

<!-- tambah and search -->
<table border="0"  width="1330" style="background : #fff;">
	<tr style="background-color: #fff">
		<td style="float: left; background: #fff; border: 0px solid #fff;">
			<a href="add.php">
				<button class="btn-tmb">
					<img src="../../assets/img/add.png" width="17px" height="17px">&nbsp;&nbsp;Tambah Data
				</button>
			</a>
		</td>
		<td style="float: right; margin-top: 20px; width: 390px; background: #fff; border: 0px solid #fff;">	<form method="post">
				<input type="text" name="cari" class="input" placeholder="cari .." autocomplete="off">
					<button class="coba" name="search" style="margin-left: 3px" >
						<img src="../../assets/img/cari.png" width="15px" height="15px">
					</button>
			</form>
		</td>
	</tr>
</table>
<!-- end search -->


<div class="content">
	<div class="scroll">
	    <table>
	
	    		<thead>
	    			<tr>
	    				<th style="padding: 10px 5px;">No</th>
	    				<th style="padding: 10px 5px;">Tanggal</th>
	    				<th style="padding: 10px 5px;">Kode Barang</th>
	    				<th style="padding: 10px 15px;">Jumlah</th>
	    				<th style="padding: 10px 15px;">Harga</th>
	    				<th style="padding: 10px 15px;">Last Edit</th>
	    				<th>Aksi</th>
	    			</tr>
	    		</thead>
	    		<?php 
					include "../../controllers/koneksi.php";
					if (isset($_POST['search'])) {
						$cari = $_POST['cari'];
						$query_mysql = $connect->query("SELECT p.*, b.kd_barang FROM penjualan p, barang b WHERE tanggal LIKE '%$cari%' or kd_penjualan LIKE '%$cari%' or kd_barang LIKE '%$cari%' ORDER BY tanggal ASC");
					}else{
						$query_mysql = $connect->query("SELECT p.*, b.kd_barang FROM penjualan p, barang b WHERE p.id_barang=b.id_barang ORDER BY tanggal ASC")or die(mysql_error());
					}
					$nomor = 1;
					$tharga = 0;
					while($data = $query_mysql->fetch_assoc()){

						$tharga = $tharga + $data['harga_barang'];
				?>
	    		<tr>
	    			<td style="padding: 10px 5px;"><?php echo $nomor++ ?></td>
	    			<td style="padding: 10px 5px;"><?php echo $data['tanggal'] ?></td>
	    			<td style="padding: 10px 5px;"><?php echo $data['kd_barang'] ?></td>
	    			<td><?php echo $data['jml_barang'] ?></td>
	    			<td><?php echo $data['harga_barang'] ?></td>
	    			<td><?php echo $data['nip'] ?></td>
	    			<td>
	    			<a href="update.php?kd_penjualan=<?php echo $data['kd_penjualan']; ?>">
	    				<img src="../../assets/img/edit.png" wkdth="25px" height="25px"></a>
	    				&nbsp;
					<a href="delete.php?kd_penjualan=<?php echo $data['kd_penjualan']; ?>" onclick="return confirm('Are you sure you want to delete?')">
						<img src="../../assets/img/delete.png" width="25px" height="25px"></a>
            		</td>
            	<?php } ?>
	    		</tr>
	    </table>
	 </div>
	<!-- end table -->


	    <table width="1330" style="background : #fff;">
	    		<tr>
	    			<td colspan="6" style="background-color: #F06B37; color: #fff"><div style="float: left; margin-left: 90px;">Total</div><div style="float: right; margin-right: 80px; "><?php echo rupiah($tharga)?></td></div>
	    		</tr>
	    </table>   
	</div>

	<!-- link footer -->
<?php include '../layout/footer.php'?>
	<!-- end footer -->
	</body>
</html>