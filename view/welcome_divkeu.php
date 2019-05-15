		<!-- link header -->
<?php include 'layout/header3.php';

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
				<a href="../view/welcome_divkeu.php">
					<input type="submit" name="beranda" value="Beranda"class="menubtn" style="border-bottom: 2px solid white;">
				</a>
		 		<a href="divkeu/keuangan.php">
		 			<input type="submit" name="beranda" value="Keuangan" class="menubtn">
		 		</a>
		</div>
	    <!-- end menu -->


	    <!-- image slider -->
	    <div class="slider">
	    	<img src="../assets/img/beranda.png" style="width:100%; height:500px;">
	    </div>
	    <!-- end of image slider -->