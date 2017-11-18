<ul class="nav navbar-nav">
	<li><a href="index.php?page=home&home=active"><i class="fa fa-home"></i>&nbsp;Home</a></li>
	<?php if($_SESSION['hak_akses']=="uptppl"){ ?>
	<li class="dropdown ttmenu-half"><a href="#" data-toggle="dropdown" class="dropdown-toggle"><i class="glyphicon glyphicon-folder-open"></i>&nbsp;&nbsp;Master Data</a>
	<ul class="dropdown-menu">
		<li>
			<div class="ttmenu-content">
				<div class="row">
					<div class="col-md-5">
						<div class="box">
							<ul>
								<li><a href="index.php?page=datamahasiswa&datamahasiswa=active">Data Mahasiswa</a></li>
								<li><a href="index.php?page=add_akunmahasiswa&add_akunmahasiswa=active">Tambah Akun Mahasiswa</a></li>
								<li><a href="index.php?page=datakelompok&datakelompok=active">Data Kelompok</a></li>
								<li><a href="index.php?page=datapembimbing&datapembimbing=active">Data Pembimbing</a></li>
								<li><a href="index.php?page=fakultas&fakultas=active">Data Fakultas</a></li>
								<li><a href="index.php?page=prodi&prodi=active">Data Prodi</a></li>
								<li><a href="index.php?page=jadwal&jadwal=active">Data Jadwal Ujian</a></li>
							</ul>
						</div>
					</div>
					
				</div>
				
			</div>
		</li>
	</ul>
	</li>
	<li class="dropdown ttmenu-half"><a href="#" data-toggle="dropdown" class="dropdown-toggle"><i class="glyphicon glyphicon-folder-open"></i>&nbsp;&nbsp;Pendaftaran</a>
	<ul class="dropdown-menu">
		<li>
			<div class="ttmenu-content">
				<div class="row">
					<div class="col-md-5">
						<div class="box">
							<ul>
								<?php 
									$sql = mysqli_query($conn, "SELECT COUNT(NIM) AS nil FROM nilai WHERE Status='Menunggu'");
									$f = mysqli_fetch_array($sql);
								 ?>
								<li><a href="index.php?page=daftar_masuk&daftar_masuk=active"><span class="label label-info badge"><?php echo $f['nil']; ?></span>Pendaftaran Masuk </a></li>
								<?php 
									$sql = mysqli_query($conn, "SELECT COUNT(NIM) AS nilai FROM nilai WHERE Status='Diterima'");
									$f = mysqli_fetch_array($sql);
								 ?>
								<li><a href="index.php?page=daftar_diterima&daftar_diterima=active"><span class="label label-info badge"><?php echo $f['nilai']; ?></span>Pendaftaran Diterima</a></li>
								<li><a href="index.php?page=daftar_diterima&daftar_diterima=active">Pendaftaran Ditolak</a></li>
							</ul>
						</div>
					</div>
					
				</div>
				
			</div>
		</li>
	</ul>
	</li>
	<li><a href="index.php?page=histori&histori=active"><i class="fa fa-history"></i>&nbsp;Histori</a></li>
	<li><a href="index.php?page=setting_kelompok&setting_kelompok=active"><i class="fa fa-gear"></i>&nbsp;Setting Kelompok</a></li>

	<?php }else if($_SESSION['hak_akses']=="pembimbing"){?>
	<li><a href="index.php?page=detail_pembimbing&pembimbing=active"><i class="fa fa-user"></i>&nbsp;Profile</a></li>
	<li><a href="index.php?page=setting_kelompok&setting_kelompok=active"><i class="fa fa-folder"></i>&nbsp;Detail Kelompok</a></li>
	<li><a href="index.php?page=detail_histori&histori=active"><i class="fa fa-history"></i>&nbsp;Histori</a></li>
	<li><a href="index.php?page=laporan&laporan=active"><i class="fa fa-file"></i>&nbsp;Lihat Laporan</a></li>

	<?php }elseif ($_SESSION['hak_akses']=="mahasiswa") {?>
	<li><a href="index.php?page=profile&profile=active"><i class="fa fa-user"></i>&nbsp;Profile</a></li>
	<li><a href="index.php?page=pendaftaran&pendaftaran=active"><i class="glyphicon glyphicon glyphicon glyphicon-hand-right"></i>&nbsp;Pendaftaran</a></li>
	<li><a href="index.php?page=setting_kelompok&setting_kelompok=active"><i class="fa fa-folder"></i>&nbsp;Lihat Kelompok</a></li>
	<li><a href="index.php?page=upload_laporan&upload_laporan=active"><i class="fa fa-file"></i>&nbsp;Upload Laporan</a></li>
	<li><a href="index.php?page=detail_histori&histori=active"><i class="fa fa-history"></i>&nbsp;Histori</a></li>
	<li class="dropdown ttmenu-half"><a href="#" data-toggle="dropdown" class="dropdown-toggle"><i class="fa fa-server"></i>&nbsp;&nbsp;Informasi</a>
	<ul class="dropdown-menu">
		<li>
			<div class="ttmenu-content">
				<div class="row">
					<div class="col-md-5">
						<div class="box">
							<ul>
								<li><a href="index.php?page=review_laporan&review_laporan=active">Review Laporan</a></li>
								<li><a href="page/jadwal_ujian.php" target="_blank">Jadwal Ujian</a></li>
							</ul>
						</div>
					</div>
					
				</div>
				
			</div>
		</li>
	</ul>
	</li>
	<?php } ?>
</ul>