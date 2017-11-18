<?php 
	$sql = mysqli_query($conn, "SELECT COUNT(PembimbingID) AS id FROM pembimbing");
	$r = mysqli_fetch_array($sql);
 ?>
<div class="row service-center funfactors">
<div class="col-md-4 col-sm-6">
	<div class="feature-list">
		<i class="stat-count"><?= $r['id']?></i>
		<p><strong>Jumlah Pembimbing</strong></p>
	</div>
</div>
<?php 
	$sql = mysqli_query($conn, "SELECT COUNT(NilaiID) AS nilai FROM nilai WHERE Status='Diterima'");
	$g = mysqli_fetch_array($sql);
 ?>
<div class="col-md-4 col-sm-6">
	<div class="feature-list">
		<i class="stat-count"><?= $g['nilai']?></i>
		<p><strong>Jumlah Pendaftar</strong></p>
	</div>
</div>
<?php 
	$sql = mysqli_query($conn, "SELECT COUNT(KelompokID) AS kelompok FROM kelompok");
	$h = mysqli_fetch_array($sql);
 ?>
<div class="col-md-4 col-sm-6">
	<div class="feature-list">
		<i class="stat-count"><?= $h['kelompok']?></i>
		<p><strong>Jumlah Kelompok</strong></p>
	</div>
</div>
</div>