	<?php 
	include  '../../controllers/koneksi.php';
		session_start(); //Start session nya
		$nip = $_SESSION['nip'];
		$cek= mysqli_query($connect, "SELECT * FROM pegawai WHERE nip = '$nip'");
		$data = mysqli_fetch_array($cek);

		$_SESSION['foto'] = $data['foto'];
		$image = $_SESSION['foto'];
			// Kita cek apakah user sudah login atau belum
			// Cek nya dengan cara cek apakah terdapat session username atau tidak
		if (!isset($_SESSION['username'])){ // Jika tidak ada session username berarti dia belum login
	  		header("location: ../../index.php"); // Kita Redirect ke halaman index.php karena belum login
		}

		if(isset($_SESSION['level'])) {
			if ($_SESSION['level']!= "admin"){
			echo "
			<script>
			alert('Anda Bukan Admin');
			document.location.href='../../index.php';
			</script>";
			}
		}
	?>