<?php
	$KelompokID=$_REQUEST['KelompokID'];
	$cek       = mysqli_query($conn,"SELECT * FROM kelompok WHERE KelompokID='$KelompokID'");
	$hasil     = mysqli_fetch_array($cek);
	$Nomor     = $hasil['KelompokID'];
	$nomor     = str_replace("K0", "", $Nomor);
	$Link      = $_SERVER['REQUEST_URI'];
	include    'aksi/lib_detail_kelompok.php';
?>
<div class="col-lg-12">
	<div class="panel panel-color panel-success">
		<div class="panel-heading">
			<h3 class="panel-title">
			<a class="btn btn-success" href="?page=set_kelompok&set_kelompok=active">
				<span class="glyphicon glyphicon-remove"></span>
			</a>
			Detail kelompok</h3>
		</div>
		<div class="panel-body">
			<?php if($_SESSION['hak_akses']=="uptppl"){ ?>
			<a  href="?page=add_pesertappl&add_pesertappl=active&KelompokID=<?php echo $KelompokID; ?>" class="btn btn-success">
				<span class="glyphicon glyphicon-plus"></span> Tambah Peserta
			</a>
			<?php } ?>
			
			<a target="_blank" href="page/cetak_kelompok.php?KelompokID=<?php echo $hasil['KelompokID']; ?>" class="btn btn-danger">
				<span class="glyphicon glyphicon-print"></span> Print kelompok
			</a>

			<h3>Daftar kelompok (<?php echo $nomor ?>) , Tempat <?php echo $hasil['TempatPPL']; ?></h3>
			<hr>
			<table id="datatable" class="table">
				<thead>
					<tr>
						<th width="1%">#</th>
						<th width="8%">Nim</th>
						<th>Nama</th>
						<th>Fakultas</th>
						<th>Prodi</th>
						<th>Jk</th>
						<?php if($_SESSION['hak_akses']=="uptppl"){ ?>
						<th>Aksi</th>
						<?php } ?>
					</tr>
				</thead>
				<tbody>
					<?php
						$no=1;
						$sql = mysqli_query($conn, "SELECT * FROM mahasiswa LEFT JOIN prodi ON mahasiswa.ProdiID=prodi.ProdiID LEFT JOIN fakultas ON fakultas.FakultasID=prodi.FakultasID WHERE KelompokID='$KelompokID'");
						while ($data = mysqli_fetch_array($sql)) {
					?>
					<tr>
						<td><?php echo $no++; ?></td>
						<td><?php echo $data['NIM']; ?></td>
						<td><?php echo $data['Nama']; ?></td>
						<td><?php echo $data['NamaFakultas']; ?></td>
						<td><?php echo $data['NamaProdi']; ?></td>
						<td><?php echo $data['JK']; ?></td>
						<?php if ($_SESSION['hak_akses']=="uptppl") {?>
						<td>
							<a href="?page=detail_kelompok&detail_kelompok=active&id=<?= $data['NIM']?>&Hapus=True"><i class="fa fa-close"></i></a>
						</td>
						<?php } ?>
					</tr>
					<?php } ?>
				</table>
			</div>
		</div>
	</div>

	<?php 
		if (isset($_REQUEST['Hapus'])) {
			$Nim = $_REQUEST['id'];
			$kl  = "";

			$Hapus = mysqli_query($conn, "UPDATE mahasiswa SET
															  KelompokID='$kl'
														    WHERE 
														      NIM='$Nim'");
			echo "<script>document.location='?page=setting_kelompok&setting_kelompok=active'</script>";
		}

	 ?>