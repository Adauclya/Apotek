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
			 		<input type="submit" name="beranda" value="Penjualan" class="menubtn">
			 	</a>
		 		<a href="../pembelian/pembelian.php">
		 			<input type="submit" name="beranda" value="Pembelanjaan" class="menubtn">
		 		</a>
			 	<a href="../keuangan/keuangan.php">
			 		<input type="submit" name="beranda" value="Keuangan" class="menubtn">
			 	</a>
		 		<a href="../barang/barang.php">
		 			<input type="submit" name="beranda" value="Stok Barang" class="menubtn" style="border-bottom: 2px solid white; ">
		 		</a>
	    </div> 
	    <!-- end menu -->


 		<!-- image slider -->
	    <div class="slider">
	    	<img src="../../assets/img/stock.jpg" style="width:100%; height:400px;">
	    	<br>
	    	<p align="center" class="p"><strong>Data List Barang</p></strong>
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

<!-- tabel barang -->
<div class="scroll">
	<div class="content">
	    <table>
	    		<thead>
	    			<tr>
	    				<th>Kode Barang</th>
	    				<th>Jumlah</th>
	    				<th>Golongan</th>
	    				<th>Tanggal Kadaluarsa</th>
	    				<th>Harga Beli</th>
	    				<th>Harga Jual</th>
	    				<th>Last Edit</th>
	    				<th>Aksi</th>
	    			</tr>
	    		</thead>
	    		<?php 
					include "../../controllers/koneksi.php";
					if (isset($_POST['search'])) {
						$cari = $_POST['cari'];
						$query_mysql = $connect->query("SELECT * FROM barang WHERE kd_barang LIKE '%$cari%' or tgl_kdl LIKE '%$cari%' or golongan LIKE '%$cari%' ");
					}else{
						$query_mysql = $connect->query("SELECT * FROM barang")or die(mysql_error());
					}

					$nomor = 1;
					while($data = $query_mysql->fetch_assoc()){
				?>
	    		<tr>
	    			<td><?php echo $data['kd_barang']?></td>
	    			<td><?php echo $data['jml_barang'] ?></td>
	    			<td><?php echo $data['golongan'] ?></td>
	    			<td><?php echo $data['tgl_kdl'] ?></td>
	    			<td><?php echo $data['harga_beli'] ?></td>
	    			<td><?php echo $data['harga_jual'] ?></td>
	    			<td><?php echo $data['nip'] ?></td>
	    			<td>
	    				<a href="update.php?id_barang=<?php echo $data['id_barang']; ?>">
	    					<img src="../../assets/img/edit.png" width="25px" height="25px"></a>
	    				&nbsp;
						<a href="delete.php?id_barang=<?php echo $data['id_barang']; ?>" onclick="return confirm('Are you sure you want to delete?')">
							<img src="../../assets/img/delete.png" width="25px" height="25px"></a>
            		</td>
	    		</tr>

	    		<?php if($data['jml_barang']<= 3) {
	    				echo "	    	<div align='center' style='background-color: orange; width: 1355; height: 30px; color: #fff; font-size: 20px; text-shadow: 2px 1.8px 4px black; '>Segera melakukan re-stock untuk obat atau barang ".$data["kd_barang"]."</div> <br> ";		
	    		}

	    		$tg = date("Y-m-d");
	    		$tgl = $data["tgl_kdl"];
	    		$tglnow = strtotime($tg);
	    		$tglkdl = strtotime($tgl);
	    		if ($tglkdl <= $tglnow) {

	    			$coba = "<div align='center' style='background-color: red; width: 1355; height: 30px; color: #fff; font-size: 20px; text-shadow: 2px 2px 2px black; '>Obat Kadaluarsa ".$data["kd_barang"]." ".$tgl."</div> <br>";
	    		}

	    	} ?>
	    	</table>
	    	<!-- end table -->
	    </div>
	</div>


	<!-- link footer -->
<?php include '../layout/footer.php'?>
	<!-- end footer -->
	
	</body>
</html>