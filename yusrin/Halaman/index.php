								<!--==============HEADER==========-->
								<?php include "master/header.php"; ?>
								<!--==============================-->
<?php 
session_start();
ob_start();
include 'library/lib.php';
include "../config/koneksi.php";
if ($_SESSION['hak_akses']=='uptppl') {
	$ID = $_SESSION['username'];
}elseif ($_SESSION['hak_akses']=='mahasiswa') {
	$ID = $_SESSION['username'];
	$sql = mysqli_query($conn, "SELECT * FROM mahasiswa WHERE NIM='$ID'");
	$data = mysqli_fetch_assoc($sql);
}elseif ($_SESSION['hak_akses']=='pembimbing') {
	$ID = $_SESSION['username'];
	$sql = mysqli_query($conn, "SELECT * FROM pembimbing WHERE NIM='$ID'");
	$data = mysqli_fetch_assoc($sql);
}
if (empty($ID)) {
	echo "<script>document.location='../login.php'</script>";
}
 ?>
<body>
	<div id="loader">
		<div class="loader-container">
			<img src="../images/site.gif" alt="" class="loader-site">
		</div>
	</div>
	<div id="wrapper">
		<div class="topbar">
			<div class="container">
				<div class="row">
					<div class="col-md-6 text-left">
						<p>Aplikasi PPL Unipdu Jombang</p>
					</div>
					<div class="col-md-6 text-right">
						<ul class="list-inline">
							<a href="index.php?page=logout&logout=active" class="btn btn-info">Logout</a>
						</ul>
					</div>
				</div>
			</div>
		</div>
		<header class="header">
			<div class="container">
				<div class="hovermenu ttmenu">
					<div class="navbar navbar-default" role="navigation">
						<div class="navbar-header">
							<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target=".navbar-collapse">
							<span class="sr-only">Toggle navigation</span>
							<span class="fa fa-bars"></span>
							</button>
							<div class="logo">
								<img src="../images/logo.png" alt="" width="60%">
							</div>
						</div>
						<div class="navbar-collapse collapse">
											<!--=============MENU===========-->
											<?php include "master/menu.php"; ?>
											<!--============================-->
						</div>
					</div>
				</div>
			</div>
		</header>
		<section class="section darkskin fullscreen paralbackground parallax" style="background-image:url('../images/1.jpg');" data-img-width="1627" data-img-height="868" data-diff="100">
		<div class="overlay"></div>
			<div class="container">
				<div class="row">
					<div class="col-md-12">
						<div class="section-title text-center">
						</div>
					</div>
					<?php
								error_reporting(0);
							if (file_exists("page/".$_GET['page'].".php")) {
								if($_GET['page']!="home"){
									include"page/".$_GET['page'].".php";
								}else{
									include"page/home.php";
								}
							}else{
								echo "<h2>Halaman Tidak Ditemukan</h2>";
							}
							?>
				</div>
			</div>
		</section>
		
		<section class="copyright">
			<div class="container">
				<div class="row">
					<div class="col-md-6 text-left">
						<p>© 2017 UPT PPL Ltd. by <a href="#">Unipdu Jombang</a></p>
					</div>
					
				</div>
			</div>
		</section>
	</div>
										<!--==============FOOTER==========-->
										<?php include "master/footer.php"; ?>
										<!--==============================-->
</body>
</html>