<!DOCTYPE html>
<html>
<head>
	<title></title>
			<?php 
        	function rupiah($angka){
				$hasil_rupiah = "Rp " . number_format($angka,0,',','.').".-";
				return $hasil_rupiah;
			}

        ?>
</head>
<body>

<center>
	<h2>Laporan Data Keuangan</h2>
	<hr>
</center>
<br>
<br>
<div class="content">
	    <table border="1" width="1000px" align="center">
	    		<thead>
	    			<tr>
	    				<td colspan="5" align="center" style="padding: 10px 5px; background-color: #F06B37; color: black">
	    					<div style="font-size: 20px;"><strong>Pemasukan Penjualan</strong></div>
	    				</td>
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
						$tanggal_awal = $_POST['cari1'];
						$tanggal_akhir = $_POST['cari2'];
						if ($tanggal_awal=='' && $tanggal_akhir == '') {
							$query_mysql = $connect->query("SELECT * FROM penjualan")or die(mysql_error());

						}else{

							$query_mysql = $connect->query("SELECT * FROM penjualan WHERE tanggal between '$tanggal_awal' and '$tanggal_akhir' ");
						}
					}

					$nomor = 1;
					$tharga_barang = 0;
					while($data = $query_mysql->fetch_assoc()){

						$tharga_barang = $tharga_barang + $data['harga_barang'];
				?>
	    		<tr align="center">
	    			<td style="padding: 10px 5px;"><?php echo $nomor++ ?></td>
	    			<td style="padding: 10px 5px;"><?php echo $data['tanggal'] ?></td>
	    			<td style="padding: 10px 5px;"><?php echo $data['kd_barang'] ?></td>
	    			<td><?php echo $data['jml_barang'] ?></td>
	    			<td><?php echo $data['harga_barang'] ?></td>
            	<?php } ?>
	    		</tr>
	    		<tr>
	    			<td colspan="6" style="background-color: #F06B37; color: black"><div style="float: left; margin-left: 90px;">Total</div><div style="float: right; margin-right: 80px; "><?php echo rupiah($tharga_barang)?></td></div>
	    		</tr>
	    	</table>
	   	</div>
  	
<br>
<br>

<div class="content">
	    <table border="1" width="1000px" align="center">
	
	    		<thead>
	    			<tr>
	    				<td colspan="5" align="center" style="padding: 10px 5px; background-color: #F06B37; color: black">
	    					<div style="font-size: 20px;"><strong>Pembelanjaan Stok</strong></div>
	    				</td>
	    			</tr>	    			
	    			<tr>
	    				<th style="padding: 10px 5px;">No Faktur</th>
	    				<th style="padding: 10px 50px;">Tanggal</th>
	    				<th style="padding: 10px 5px;">Kode Barang</th>
	    				<th style="padding: 10px 15px;">Jumlah</th>
	    				<th style="padding: 10px 15px;">Harga</th>
	    			</tr>
	    		</thead>
	    		<?php 
					include "../../controllers/koneksi.php";
					if (isset($_POST['search'])) {
						$tanggal_awal = $_POST['cari1'];
						$tanggal_akhir = $_POST['cari2'];
						if ($tanggal_awal=='' && $tanggal_akhir == '') {
							$query_mysql = $connect->query("SELECT * FROM pembelian")or die(mysql_error());

						}else{

							$query_mysql = $connect->query("SELECT * FROM pembelian WHERE tanggal_beli between '$tanggal_awal' and '$tanggal_akhir' ");
						}
					}

					$nomor = 1;
					$tharga_pembelian = 0;
					while($data = $query_mysql->fetch_assoc()){
						$tharga_pembelian = $tharga_pembelian + $data['hrg_barang'];
				?>
	    		<tr align="center">
	    			<td style="padding: 10px 5px;"><?php echo $data['kd_pembelian']?></td>
	    			<td style="padding: 10px 5px;"><?php echo $data['tanggal_beli'] ?></td>
	    			<td style="padding: 10px 5px;"><?php echo $data['kd_barang'] ?></td>
	    			<td><?php echo $data['jml'] ?></td>
	    			<td><?php echo $data['hrg_barang'] ?></td>
	    		</tr>
	    		<?php } ?>
	    		<tr>
	    			<td colspan="6" style="background-color: #F06B37; color: black"><div style="float: left; margin-left: 90px;">Total</div><div style="float: right; margin-right: 80px; "><?php echo rupiah($tharga_pembelian)?></td></div>
	    		</tr>  
	    	</table>
	    	<!-- end table -->
	</div>
<br>
<br>
<div class="content">
	    <table border="1" width="1000px" align="center">
	
	    		<thead>
	    			<tr>
	    				<td colspan="5" align="center" style="padding: 10px 5px; background-color: #F06B37; color: black">
	    					<div style="font-size: 20px;"><strong>Pengeluaran Operasional</strong></div>
	    				</td>
	    			</tr>	    			
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
						$tanggal_awal = $_POST['cari1'];
						$tanggal_akhir = $_POST['cari2'];

						if ($tanggal_awal=='' && $tanggal_akhir == '') {
							$query_mysql = $connect->query("SELECT * FROM operasional")or die(mysql_error());

						}else{

							$query_mysql = $connect->query("SELECT * FROM operasional WHERE tanggal_op between '$tanggal_awal' and '$tanggal_akhir' ");
						}
					}

					$nomor = 1;
					$tharga = 0;

					while($data = $query_mysql->fetch_assoc()){
						$tharga = $tharga + $data['pengeluaran'];
				?>
	    		<tr align="center">
	    			<td style="padding: 10px 5px;"><?php echo $nomor++ ?></td>
	    			<td style="padding: 10px 5px;"><?php echo $data['tanggal_op'] ?></td>
	    			<td style="padding: 10px 5px;"><?php echo $data['oleh'] ?></td>
	    			<td><?php echo $data['uraian'] ?></td>
	    			<td><?php echo $data['pengeluaran'] ?></td>
            	<?php } ?>
	    		</tr>
	    		<tr>
	    			<td colspan="6" style="background-color: #F06B37; color: black"><div style="float: left; margin-left: 90px;">Total</div><div style="float: right; margin-right: 80px; "><?php echo rupiah($tharga)?></td></div>
	    		</tr>  	    		
	    </table>
	<!-- end table -->
	</div>
	<br>
	<br>
<div class="content">
	    <table border="1" width="1000px" align="center">
	
	    		<thead>
	    			<tr>
	    				<td colspan="5" align="center" style="padding: 10px 5px; background-color: #F06B37; color: black">
	    					<div style="font-size: 20px;"><strong>Keseluruhan Transaksi</strong></div>
	    				</td>
	    			</tr>	    			
	    		</thead>
	    			<tr>
	    				<td style="padding: 10px 5px;">Pemasukan</td>
	    				<td  align="center"><?php echo rupiah($tharga_barang)?></td>
	    			</tr>	    			
	    			<tr>
	    				<td style="padding: 10px 5px;">Operasional</td>
	    				<td  align="center"><?php echo rupiah($tharga_pembelian)?></td>
	    			</tr>
	    			<tr>
	    				<td style="padding: 10px 5px;">Pembelanjaan</td>
	    				<td  align="center"><?php echo rupiah($tharga)?></td>
	    			</tr> 	
	    			<tr>
	    				<td style="padding: 10px 5px; background-color: #F06B37; color: black"><strong>Profit</td></strong>
	    				<td style="padding: 10px 5px; background-color: #F06B37; color: black" align="center"><strong>
	    					<?php
	    						$total = $tharga_barang - $tharga_pembelian - $tharga;
	    					 echo rupiah($total)
	    					?>
	    					</strong>
	    				</td>
	    			</tr> 	    			    			 	    		
	    </table>
	<!-- end table -->
	</div>
	<script>
		window.print();
	</script>

<?php echo "<script>document.location.href='keuangan.php'</script>"; ?>
</body>
</html>

