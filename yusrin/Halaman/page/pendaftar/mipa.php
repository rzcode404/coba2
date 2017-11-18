<form method="POST" enctype="multipart/form-data">
<?php 
	$sql = mysqli_query($conn, "SELECT * FROM nilai WHERE NIM='$NIM'");
	$t   = mysqli_fetch_array($sql);
	if($t['BelajarPembelajaran']==""){
 ?>
<div class="form-group">
	<label class="col-sm-3">BelajarPembelajaran</label>
	<div class="col-md-9">
		<select class="form-control" name="pkn">
			<option>Pilih Nilai</option>
			<option value="A">A</option>
			<option value="A-">A-</option>
			<option value="B+">B+</option>
			<option value="B">B</option>
			<option value="B-">B-</option>
			<option value="C+">C+</option>
			<option value="C">C</option>
			<option value="C-">C-</option>
			<option value="D+">D+</option>
			<option value="D">D</option>
			<option value="D-">D-</option>
			<option value="E">E</option>
		</select>
	</div><br><br>
</div>
<div class="form-group">
	<label class="col-sm-3"></label>
	<div class="col-md-9">
		<button class="btn btn-success" name="Daftar1">Selanjutnya</button>
	</div><br><br>
</div>
<?php }else if($t['PerencanaanPengajaranMTK']==""){?>
<input type="hidden" name="id" value="<?php echo $t['NilaiID'];?>">
<div class="form-group">
	<label class="col-sm-3">Nilai PerencanaanPengajaranMTK</label>
	<div class="col-md-9">
		<select class="form-control" name="nilai">
			<option>Pilih Nilai</option>
			<option value="A">A</option>
			<option value="A-">A-</option>
			<option value="B+">B+</option>
			<option value="B">B</option>
			<option value="B-">B-</option>
			<option value="C+">C+</option>
			<option value="C">C</option>
			<option value="C-">C-</option>
			<option value="D+">D+</option>
			<option value="D">D</option>
			<option value="D-">D-</option>
			<option value="E">E</option>
		</select>
	</div><br><br>
</div>
<div class="form-group">
	<label class="col-sm-3"></label>
	<div class="col-md-9">
		<button class="btn btn-success" name="Daftar2">Selanjutnya</button>
	</div><br><br>
</div>
<?php }else if($t['PenelitianHasilBelajar']==""){ ?>
<input type="hidden" name="id" value="<?php echo $t['NilaiID'];?>">
<div class="form-group">
	<label class="col-sm-3">Nilai PenelitianHasilBelajar</label>
	<div class="col-md-9">
		<select class="form-control" name="nilai">
			<option>Pilih Nilai</option>
			<option value="A">A</option>
			<option value="A-">A-</option>
			<option value="B+">B+</option>
			<option value="B">B</option>
			<option value="B-">B-</option>
			<option value="C+">C+</option>
			<option value="C">C</option>
			<option value="C-">C-</option>
			<option value="D+">D+</option>
			<option value="D">D</option>
			<option value="D-">D-</option>
			<option value="E">E</option>
		</select>
	</div><br><br>
</div>
<div class="form-group">
	<label class="col-sm-3"></label>
	<div class="col-md-9">
		<button class="btn btn-success" name="Daftar3">Selanjutnya</button>
	</div><br><br>
</div>
<?php }else if($t['ProfesiKependidikan']==""){ ?>
<input type="hidden" name="id" value="<?php echo $t['NilaiID'];?>">
<div class="form-group">
	<label class="col-sm-3">Nilai ProfesiKependidikan</label>
	<div class="col-md-9">
		<select class="form-control" name="nilai">
			<option>Pilih Nilai</option>
			<option value="A">A</option>
			<option value="A-">A-</option>
			<option value="B+">B+</option>
			<option value="B">B</option>
			<option value="B-">B-</option>
			<option value="C+">C+</option>
			<option value="C">C</option>
			<option value="C-">C-</option>
			<option value="D+">D+</option>
			<option value="D">D</option>
			<option value="D-">D-</option>
			<option value="E">E</option>
		</select>
	</div><br><br>
</div>
<div class="form-group">
	<label class="col-sm-3"></label>
	<div class="col-md-9">
		<button class="btn btn-success" name="Daftar4">Selanjutnya</button>
	</div><br><br>
</div>
<?php }else if($t['PPL1']==""){ ?>
<input type="hidden" name="id" value="<?php echo $t['NilaiID'];?>">
<div class="form-group">
	<label class="col-sm-3">Nilai PPL1</label>
	<div class="col-md-9">
		<select class="form-control" name="nilai">
			<option>Pilih Nilai</option>
			<option value="A">A</option>
			<option value="A-">A-</option>
			<option value="B+">B+</option>
			<option value="B">B</option>
			<option value="B-">B-</option>
			<option value="C+">C+</option>
			<option value="C">C</option>
			<option value="C-">C-</option>
			<option value="D+">D+</option>
			<option value="D">D</option>
			<option value="D-">D-</option>
			<option value="E">E</option>
		</select>
	</div><br><br>
</div>
<div class="form-group">
	<label class="col-sm-3"></label>
	<div class="col-md-9">
		<button class="btn btn-success" name="Daftar5">Selanjutnya</button>
	</div><br><br>
</div>
<?php }elseif ($t['MTKSekolah1']=="") { ?>
<input type="hidden" name="id" value="<?php echo $t['NilaiID'];?>">
<div class="form-group">
	<label class="col-sm-3">Nilai MTk Sekolah1</label>
	<div class="col-md-9">
		<select class="form-control" name="nilai">
			<option>Pilih Nilai</option>
			<option value="A">A</option>
			<option value="A-">A-</option>
			<option value="B+">B+</option>
			<option value="B">B</option>
			<option value="B-">B-</option>
			<option value="C+">C+</option>
			<option value="C">C</option>
			<option value="C-">C-</option>
			<option value="D+">D+</option>
			<option value="D">D</option>
			<option value="D-">D-</option>
			<option value="E">E</option>
		</select>
	</div><br><br>
</div>
<div class="form-group">
	<label class="col-sm-3"></label>
	<div class="col-md-9">
		<button class="btn btn-success" name="Daftar6">Selanjutnya</button>
	</div><br><br>
</div>
<?php }elseif($t['MTKSekolah2']==""){ ?>
<input type="hidden" name="id" value="<?php echo $t['NilaiID'];?>">
<div class="form-group">
	<label class="col-sm-3">Nilai MTk Sekolah2</label>
	<div class="col-md-9">
		<select class="form-control" name="nilai">
			<option>Pilih Nilai</option>
			<option value="A">A</option>
			<option value="A-">A-</option>
			<option value="B+">B+</option>
			<option value="B">B</option>
			<option value="B-">B-</option>
			<option value="C+">C+</option>
			<option value="C">C</option>
			<option value="C-">C-</option>
			<option value="D+">D+</option>
			<option value="D">D</option>
			<option value="D-">D-</option>
			<option value="E">E</option>
		</select>
	</div><br><br>
</div>
<div class="form-group">
	<label class="col-sm-3"></label>
	<div class="col-md-9">
		<button class="btn btn-success" name="Daftar7">Selanjutnya</button>
	</div><br><br>
</div>
<?php }elseif ($t['KHS1']=="") { ?>
<input type="hidden" name="id" value="<?php echo $t['NilaiID'];?>">
<div class="form-group">
	<label class="col-sm-3">KHS1</label>
	<div class="col-md-9">
		<input type="file" name="KHS1" class="form-control" required>
	</div><br>
</div>
<div class="form-group">
	<label class="col-sm-3">KHS2</label>
	<div class="col-md-9">
		<input type="file" name="KHS2" class="form-control" required>
	</div><br><br>
</div>
<div class="form-group">
	<label class="col-sm-3"></label>
	<div class="col-md-9">
		<button class="btn btn-success" name="Simpan">Simpan</button>
	</div><br>
</div>
<?php }else{echo "Selesai";} ?>
</form>

<?php
	if (isset($_REQUEST['Daftar1'])) {
		$Pendaftar = "N"."-".date(ymdhis);
		$id        = $NIM;
		$pkn       = $_REQUEST['pkn'];
		$Simpan    = mysqli_query($conn, "INSERT INTO `nilai`(
														`NilaiID`, 
														`NIM`, 
														`BelajarPembelajaran`) 
														VALUES (
														'$Pendaftar',
														'$id',
														'$pkn')");
		echo "<script>document.location='index.php?page=pendaftaran&pendaftaran=active'</script>";
	}else if (isset($_REQUEST['Daftar2'])) {
		$Pendaftar = $_REQUEST['id'];
		$pkn       = $_REQUEST['nilai'];
		$Update    = mysqli_query($conn, "UPDATE `nilai` SET 
												`PerencanaanPengajaranMTK`='$pkn'
												WHERE `NilaiID`='$Pendaftar'");
		echo "<script>document.location='index.php?page=pendaftaran&pendaftaran=active'</script>";
	}else if (isset($_REQUEST['Daftar3'])) {
		$Pendaftar = $_REQUEST['id'];
		$pkn       = $_REQUEST['nilai'];
		$Update    = mysqli_query($conn, "UPDATE `nilai` SET 
												 `PenelitianHasilBelajar`='$pkn'
												WHERE `NilaiID`='$Pendaftar'");
		echo "<script>document.location='index.php?page=pendaftaran&pendaftaran=active'</script>";
	}else if (isset($_REQUEST['Daftar4'])) {
		$Pendaftar = $_REQUEST['id'];
		$pkn       = $_REQUEST['nilai'];
		$Update    = mysqli_query($conn, "UPDATE `nilai` SET 
												 `ProfesiKependidikan`='$pkn'
												WHERE `NilaiID`='$Pendaftar'");
		echo "<script>document.location='index.php?page=pendaftaran&pendaftaran=active'</script>";
	}else if (isset($_REQUEST['Daftar5'])) {
		$Pendaftar = $_REQUEST['id'];
		$pkn       = $_REQUEST['nilai'];
		$Update    = mysqli_query($conn, "UPDATE `nilai` SET 
												 `PPL1`='$pkn'
												WHERE `NilaiID`='$Pendaftar'");
		echo "<script>document.location='index.php?page=pendaftaran&pendaftaran=active'</script>";
	}else if(isset($_REQUEST['Daftar6'])){
		$Pendaftar = $_REQUEST['id'];
		$pkn       = $_REQUEST['nilai'];
		$Update    = mysqli_query($conn, "UPDATE `nilai` SET 
												 `MTKSekolah1`='$pkn'
												WHERE `NilaiID`='$Pendaftar'");
		echo "<script>document.location='index.php?page=pendaftaran&pendaftaran=active'</script>";
	}else if(isset($_REQUEST['Daftar7'])){
		$Pendaftar = $_REQUEST['id'];
		$pkn       = $_REQUEST['nilai'];
		$Update    = mysqli_query($conn, "UPDATE `nilai` SET 
												 `MTKSekolah2`='$pkn'
												WHERE `NilaiID`='$Pendaftar'");
		echo "<script>document.location='index.php?page=pendaftaran&pendaftaran=active'</script>";
	}else if (isset($_REQUEST['Simpan'])) {
		$id               = $_REQUEST['id'];
		$date 			  = date("Y-m-d-his");
		$temp_name1       = $_FILES['KHS1']['tmp_name'];
		$name_file1       = $_FILES['KHS1']['name'];
		$type_file1       = $_FILES['KHS1']['type'];
		$size1            = $_FILES['KHS1']['size'];
		// Foto 2
		$temp_name2       = $_FILES['KHS2']['tmp_name'];
		$name_file2       = $_FILES['KHS2']['name'];
		$type_file2       = $_FILES['KHS2']['type'];
		$size2            = $_FILES['KHS2']['size'];

		if (!empty($temp_name1) OR !empty($temp_name2)) {
			// Pindah foto
			$Pindah1 = move_uploaded_file($temp_name1, 'upload/'.$date."-".$name_file1.'');
			$Pindah2 = move_uploaded_file($temp_name2, 'upload/'.$date."-".$name_file2.'');
			// File di upload
			if($Pindah1){ 
				$Foto1    = $date."-".$name_file1; 
				$SetFoto1 = ",`FProfile`='$Foto1'"; 
			}
			if($Pindah2){
				$Foto2 = $date."-".$name_file2;
				$SetFoto2 = ",`FPembayaran`='$Foto2'";
			}
		}

		$Update = mysqli_query($conn, "UPDATE `nilai` 
													SET 
													`KHS1`='$Foto1',
													`KHS2`='$Foto2' 
													WHERE 
													`NilaiID`='$id'");
		echo "<script>document.location='index.php?page=pendaftaran&pendaftaran=active'</script>";
	}
 ?>