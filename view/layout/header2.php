
<!DOCTYPE html>
<html>
	<head>
		<title>Admin</title>
		<link rel="stylesheet" type="text/css" href="../../assets/css/tampilan.css">

		<script>
			function confirmDelete() {
 				confirm("Are you sure you want to delete") {
  				}
			}
		</script>

		<?php 
        	function rupiah($angka){
				$hasil_rupiah = "Rp " . number_format($angka,0,',','.').".-";
				return $hasil_rupiah;
			}

        ?>

	</head>
	
	<body style="margin: 0px; padding: 0px;">
	<?php 
	include  '../../controllers/koneksi.php';
		session_start(); //Start session nya
		$nip = $_SESSION['nip'];
		$cek= mysqli_query($connect, "SELECT * FROM pegawai WHERE nip = '$nip'");
		$data = mysqli_fetch_array($cek);

		$nama = $_SESSION['nama'];
		$level = $_SESSION['level'];
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

	<div class="container">	
		<div class="head">
			<div class="dropdown">
	    		<button class="dropbtn">
	    			<img src="../../assets/img/profil/<?php echo $image?>" width="60" width="60px" style="float: left; border-radius: 70%; margin-top: 10px;">
	    			<p></p>
	    			<span style="margin-bottom: 2px; color: black ;" ><small>Selamat Datang,
	    			<?php echo $nama ?> &nbsp;
	    			<img src="../../assets/img/down.png" width="10px" height="10px">
	    			</small>
	    			</span>
	    		</button>
					<div class="dropdown-content">
					   <a href="../../controllers/logout.php"><img src="../../assets/img/logout.png" width="20px" height="20px">&nbsp;&nbsp; Logout</a>
					</div>
			</div>
				<p class="text1">
					<img src="../../assets/img/logo2.png" width="50px" height="50px " style="margin-top: 18px">
						<strong>&nbsp;&nbsp;Pharma</p></strong>
		</div>
