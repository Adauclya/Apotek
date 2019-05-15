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
<!-- end header -->


		<!-- start menu -->
		<div class="menu">
				<a href="../../view/welcome_divkeu.php">
					<input type="submit" name="beranda" value="Beranda" class="menubtn">
				</a>
			 	<a href="../keuangan/keuangan.php">
			 		<input type="submit" name="beranda" value="Keuangan" class="menubtn" style="border-bottom: 2px solid white; ">
	    <!-- end menu -->


<!-- tambah and search -->
<table border="0"  width="1330" style="background :#fff;">
	<tr style="background-color: #fff">
		<td style="float: right; margin-top: 20px; width: 1300px; background: #fff; border: 0px solid black; margin-right: 0;">
			<form method="post" action="cetak_aksi.php">
				<input type="date" name="cari1" class="input" placeholder="cari .." autocomplete="off">
				Sampai
				<input type="date" name="cari2" class="input" placeholder="cari .." autocomplete="off">
				<button class="print" name="search" style="margin-top: 20px;">
					<img src="../../assets/img/printer.png" width="17px" height="17px">&nbsp;&nbsp;Cetak
				</button>
			</form>	
		</td>		
	</tr>	
</table>

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
	    				<th style="padding: 10px 15px;">Last Edit</th>
	    				<th>Aksi</th>
	    			</tr>
	    		</thead>
	    		<?php 
					include "../../controllers/koneksi.php";
					if (isset($_POST['search'])) {
						$tanggal_awal = $_POST['cari1'];
						$tanggal_akhir = $_POST['cari2'];
						$query_mysql = $connect->query("SELECT * FROM operasional WHERE tanggal_op between '$tanggal_awal' and '$tanggal_akhir'");
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
	    			<td><?php echo $data['nip'] ?></td>
	    			<td>
	    			<a href="update.php?kd_operasional=<?php echo $data['kd_operasional']; ?>">
	    				<img src="../../assets/img/edit.png" width="25px" height="25px"></a>
	    				&nbsp;
					<a href="delete.php?kd_operasional=<?php echo $data['kd_operasional']; ?>" onclick="return confirm('Are you sure you want to delete?')">
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
<br>
<br>

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
	    			</tr>
	    		</thead>
	    		<?php 
					include "../../controllers/koneksi.php";
					if (isset($_POST['search'])) {
						$tanggal_awal = $_POST['cari1'];
						$tanggal_akhir = $_POST['cari2'];
						$query_mysql = $connect->query("SELECT * FROM penjualan WHERE tanggal between '$tanggal_awal' and '$tanggal_akhir' ");
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
	    			<td><?php echo $data['nip'] ?></td>
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

<div class="content">
	<div class="scroll">
	    <table>
	
	    		<thead>
	    			<tr>
	    				<th style="padding: 10px 5px;">No Faktur</th>
	    				<th style="padding: 10px 50px;">Tanggal</th>
	    				<th style="padding: 10px 5px;">Kode Barang</th>
	    				<th style="padding: 10px 15px;">Jumlah</th>
	    				<th style="padding: 10px 15px;">Harga</th>
	    				<th style="padding: 10px 15px;">Last Edit</th>
	    			</tr>
	    		</thead>
	    		<?php 
					include "../../controllers/koneksi.php";
					if (isset($_POST['search'])) {
						$tanggal_awal = $_POST['cari1'];
						$tanggal_akhir = $_POST['cari2'];
						$query_mysql = $connect->query("SELECT * FROM pembelian WHERE tanggal_beli between '$tanggal_awal' and '$tanggal_akhir' ");
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
	    			<td><?php echo $data['nip'] ?></td>
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
</body>
</html>


