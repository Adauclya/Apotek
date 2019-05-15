		<!-- link header -->
<?php include '../layout/header4.php';

  if(isset($_SESSION['level'])) {
			if ($_SESSION['level']!= "divkeu"){
			echo "
			<script>
			alert('Anda Bukan Divisi Keuangan');
			document.location.href='../index.php';
			</script>";
			} 
		}
?>
		<!-- start menu -->
		<div class="menu">
				<a href="../../view/welcome_divkeu.php">
					<input type="submit" name="beranda" value="Beranda" class="menubtn">
				</a>
			 	<a href="../keuangan/keuangan.php">
			 		<input type="submit" name="beranda" value="Keuangan" class="menubtn" style="border-bottom: 2px solid white; ">
			 	</a>
	    </div> 
	    <!-- end menu -->


 		<!-- image slider -->
	    <div class="slider">
	    	<img src="../../assets/img/keu2.png" style="width:100%; height:400px;">
	    	<br>
	    	<p align="center" class="p"><strong>Data Keuangan</p></strong>
	    	<hr class="hr" noshade="blue">
	    </div>
	    <!-- end of image slider -->

<!-- tambah and search -->
<table border="0"  width="1330" style="background :#fff;">
	<tr style="background-color: #fff">
		<td style="float: left; background: #fff; border: 0px solid black;">
			<a href="add.php">
				<button class="btn-tmb" style="margin-top: 20px;">
					<img src="../../assets/img/add.png" width="17px" height="17px">&nbsp;&nbsp;Tambah Data
				</button>
			</a>
		</td>	
		<td style="float: right; margin-top: 20px; width: 450px; background: #fff; border: 0px solid black; margin-right: 0;">
			<form method="post">
				<input type="text" name="cari" class="input" placeholder="cari .." autocomplete="off">
					<button class="coba" name="search" style="margin-left: 3px" >
						<img src="../../assets/img/cari.png" width="15px" height="15px">
					</button>
			</form>	
		</td>
	<td style="float: right; background: #fff; border: 0px solid black;">
			<a href="cetak.php">
				<button class="print" style="margin-top: 20px;">
					<img src="../../assets/img/printer.png" width="17px" height="17px">&nbsp;&nbsp;Cetak
				</button>
			</a>
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
	    				<th style="padding: 10px 5px;">Oleh</th>
	    				<th style="padding: 10px 15px;">Uraian</th>
	    				<th style="padding: 10px 15px;">Pengeluaran</th>
	    			</tr>
	    		</thead>
	    		<?php 
					include "../../controllers/koneksi.php";
					if (isset($_POST['search'])) {
						$cari = $_POST['cari'];
						$query_mysql = $connect->query("SELECT * FROM operasional WHERE kd_operasional LIKE '%$cari%' or tanggal_op LIKE '%$cari%' or uraian LIKE '%$cari%' ");
					}else{
						$query_mysql = $connect->query("SELECT * FROM operasional")or die(mysql_error());
					}

					$nomor = 1;
					$tharga = 0;

					while($data = $query_mysql->fetch_assoc()){
						$tharga = $tharga + $data['pengeluaran'];
				?>
	    		<tr>
	    			<td style="padding: 10px 5px;"><?php echo $nomor++ ?></td>
	    			<td style="padding: 10px 5px;"><?php echo $data['tanggal_op'] ?></td>
	    			<td style="padding: 10px 5px;"><?php echo $data['oleh'] ?></td>
	    			<td><?php echo $data['uraian'] ?></td>
	    			<td><?php echo $data['pengeluaran'] ?></td>
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
<br>
<br>


<div class="content">
	<div class="scroll">
	    <table>
	    		<thead>
	    			<tr>
	    				<th colspan="6">Penjualan</th>
	    			</tr>
	    			<tr>
	    				<th style="padding: 10px 5px;">No</th>
	    				<th style="padding: 10px 5px;">Tanggal</th>
	    				<th style="padding: 10px 5px;">Kode Barang</th>
	    				<th style="padding: 10px 15px;">Jumlah</th>
	    				<th style="padding: 10px 15px;">Harga</th>
	    			</tr>
	    		</thead>
	    		<?php 
					include "../../controllers/koneksi.php";
					if (isset($_POST['search'])) {
						$cari = $_POST['cari'];
						$query_mysql = $connect->query("SELECT * FROM penjualan WHERE tanggal LIKE '%$cari%' or kd_penjualan LIKE '%$cari%' or kd_barang LIKE '%$cari%' ");
					}else{
						$query_mysql = $connect->query("SELECT * FROM penjualan")or die(mysql_error());
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
            	<?php } ?>
	    		</tr>
	    	</table>
	   	</div>
	    	<table width="1330" style="background : #fff; margin: 0;">
	    		<tr>
	    			<td colspan="6" style="background-color: #F06B37; color: #fff"><div style="float: left; margin-left: 90px;">Total</div><div style="float: right; margin-right: 80px; "><?php echo rupiah($tharga)?></td></div>
	    		</tr>
	    	</table>
	</div>    	
<br>
<br>

<div class="content">
	<div class="scroll">
	    <table>
	
	    		<thead>
	    			<tr>
	    				<th colspan="6">Pembelian</th>
	    			</tr>
	    			<tr>
	    				<th style="padding: 10px 5px;">No Faktur</th>
	    				<th style="padding: 10px 50px;">Tanggal</th>
	    				<th style="padding: 10px 5px;">Kode Barang</th>
	    				<th style="padding: 10px 15px;">Jumlah</th>
	    				<th style="padding: 10px 15px;">Harga</th>>
	    			</tr>
	    		</thead>
	    		<?php 
					include "../../controllers/koneksi.php";
					if (isset($_POST['search'])) {
						$cari = $_POST['cari'];
						$query_mysql = $connect->query("SELECT * FROM pembelian WHERE kd_pembelian LIKE '%$cari%' or tanggal_beli LIKE '%$cari%' ");
					}else{
						$query_mysql = $connect->query("SELECT * FROM pembelian")or die(mysql_error());
					}

					$nomor = 1;
					$tharga = 0;
					while($data = $query_mysql->fetch_assoc()){
						$tharga = $tharga + $data['hrg_barang'];
				?>
	    		<tr>
	    			<td style="padding: 10px 5px;"><?php echo $data['kd_pembelian']?></td>
	    			<td style="padding: 10px 5px;"><?php echo $data['tanggal_beli'] ?></td>
	    			<td style="padding: 10px 5px;"><?php echo $data['kd_barang'] ?></td>
	    			<td><?php echo $data['jml'] ?></td>
	    			<td><?php echo $data['hrg_barang'] ?></td>
	    		</tr>
	    		<?php } ?>
	    	</table>
	   	</div>
	    	<!-- end table -->
	    	<table width="1330" style="background : #fff; margin: 0;">
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