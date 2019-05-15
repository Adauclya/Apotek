<!-- link header  -->
<?php include '../layout/header2.php'?>
<!-- end header -->

		<!-- start menu -->
		<div class="menu">
				<a href="../../view/welcome_admin.php">
					<input type="submit" name="beranda" value="Beranda" class="menubtn">
				</a>
		 		<a href="akun.php">
		 			<input type="submit" name="beranda" value="Akun" class="menubtn" style="border-bottom: 2px solid white; ">
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
		 			<input type="submit" name="beranda" value="Stok Barang" class="menubtn">
		 		</a>
	    </div> 
	    <!-- end menu -->


 		<!-- image slider -->
	    <div class="slider">
	    	<img src="../../assets/img/akunpng.png" style="width:100%; height:400px;">
	    	<br>
	    	<p align="center" class="p"><strong>Data User</p></strong>
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
		<td style="float: right; margin-top: 20px; width: 390px; background: #fff; border: 0px solid #fff;">	
			<form method="post">
				<input type="text" name="cari" class="input" placeholder="cari .." autocomplete="off">
					<button class="coba" name="search" style="margin-left: 3px" >
						<img src="../../assets/img/cari.png" width="15px" height="15px">
					</button>
			</form>
		</td>
	</tr>
</table>
<!-- end search -->

<!-- table user -->
<div class="scroll">
	<div class="content">
	    <table>
	    	<thead>
	    		<tr>
	    			<th>Nip</th>
	    			<th>Username</th>
	    			<th>Password</th>
	    			<th>Nama</th>
	    			<th>Tanggal Lahir</th>
	    			<th>Alamat</th>
	    			<th>Agama</th>
	    			<th>Status</th>
	    			<th>Jabatan</th>
	    			<th>Aksi</th>
	    		</tr>
	    	</thead>
	    		<?php 
					include "../../controllers/koneksi.php";
					if (isset($_POST['search'])) {
						$cari = $_POST['cari'];
						$query_mysql = $connect->query("SELECT * FROM pegawai WHERE nip LIKE '%$cari%' or nama LIKE '%$cari%' ");
					}else{
						$query_mysql = $connect->query("SELECT * FROM pegawai")or mysql_error($connect);
					}
					$nomor = 1;
					while($data = $query_mysql->fetch_assoc()){
				?>
	    	<tr>
	    		<td><?php echo $data['nip']?></td>
	    		<td><?php echo $data['username'] ?></td>
	    		<td><?php echo $data['password'] ?></td>
	    		<td><?php echo $data['nama'] ?></td>
	    		<td><?php echo $data['ttl'] ?></td>
	    		<td><?php echo $data['alamat'] ?></td>
	    		<td><?php echo $data['agama'] ?></td>
	    		<td><?php echo $data['status'] ?></td>
	    		<td><?php echo $data['level'] ?></td>
	    		<td>
	    			<a href="update.php?nip=<?php echo $data['nip']; ?>">
	    				<img src="../../assets/img/edit.png" width="25px" height="25px">
	    			</a>
	    				&nbsp;
					<a href="delete.php?nip=<?php echo $data['nip']; ?>" onclick="return confirm('Are you sure you want to delete?')">
						<img src="../../assets/img/delete.png" width="25px" height="25px">
					</a>
            	</td>
	    	</tr>
	    		<?php  } ?>
	    </table>
	    	<!-- end table -->
	</div>
</div>

	<!-- link footer -->
<?php include '../layout/footer.php'?>
	<!-- end footer -->

	</body>
</html>