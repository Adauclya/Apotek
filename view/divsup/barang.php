		<!-- link header -->
<?php include '../layout/header4.php';

  if(isset($_SESSION['level'])) {
			if ($_SESSION['level']!= "divsup"){
			echo "
			<script>
			alert('Anda Bukan Divisi Supply');
			document.location.href='../index.php';
			</script>";
			} 
		}
?>
		<!-- end header -->


		<!-- start menu -->
		<div class="menu">
				<a href="../../view/welcome_divsup.php">
					<input type="submit" name="beranda" value="Beranda" class="menubtn">
				</a>
		 		<a href="../divsup/pembelian.php">
		 			<input type="submit" name="beranda" value="Pembelanjaan" class="menubtn" >
		 		</a>
		 		<a href="../divsup/barang.php">
		 			<input type="submit" name="beranda" value="Stok Barang" class="menubtn" style="border-bottom: 2px solid white; ">
		 		</a>
	    </div> 
	    <!-- end menu -->


 		<!-- image slider -->
	    <div class="slider">
	    	<img src="../../assets/img/stock.jpg" style="width:1334px; height:400px;">
	    	<br>
	    	<p align="center" class="p"><strong>Data List Barang</p></strong>
	    	<hr class="hr" noshade="blue">
	    </div>
	    <!-- end of image slider -->

<!-- tambah and search -->
<table border="0"  width="1330" style="background : #fff;">
	<tr style="background-color: #fff">
		<td style="float: left; background: #fff; border: 0px solid #fff;">
			<a href="add-barang.php">
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
	    				<th>Jenis Barang</th>
	    				<th>Tanggal Kadaluarsa</th>
	    				<th>Harga Beli</th>
	    				<th>Harga Jual</th>
	    			</tr>
	    		</thead>
	    		<?php 
					include "../../controllers/koneksi.php";
					if (isset($_POST['search'])) {
						$cari = $_POST['cari'];
						$query_mysql = $connect->query("SELECT * FROM barang WHERE kd_barang LIKE '%$cari%' or tgl_kdl LIKE '%$cari%' or golongan LIKE '%$cari%' or jenis_barang LIKE '%$cari%' ");
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
	    			<td><?php echo $data['jenis_barang'] ?></td>
	    			<td><?php echo $data['tgl_kdl'] ?></td>
	    			<td><?php echo $data['harga_beli'] ?></td>
	    			<td><?php echo $data['harga_jual'] ?></td>
	    		</tr>
	    		<?php } ?>
	    	</table>
	    	<!-- end table -->
	    </div>
	</div>


	<!-- link footer -->
<?php include '../layout/footer.php'?>
	<!-- end footer -->
	
	</body>
</html>