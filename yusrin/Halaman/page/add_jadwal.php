<?php 
	$id = $_REQUEST['id'];
	$sql = mysqli_query($conn, "SELECT * FROM jadwal AS a LEFT JOIN kelompok AS b ON a.KelompokID=b.KelompokID WHERE a.id_jadwal='$id'");
	$rr = mysqli_fetch_array($sql);
 ?>
<div class="col-lg-12">
    <div class="panel panel-color panel-danger">
        <div class="panel-heading">
        	<?php
        	  
        		if ($id) {
        			echo '<h3 class="panel-title"> Edit Jadwal Ujian PPL Unipdu</h3>';
        		}else{
        			echo '<h3 class="panel-title"> Tambah Jadwal Ujian PPL Unipdu</h3>';

        		}
        	?>  
        </div> 
        <div class="panel-body"> 
        	<button onclick="document.location='?page=fakultas&fakultas=active'" class="btn btn-success"><span class="ion-arrow-left-c"></span> Kembali kehalaman awal</button><br><br>
        	<?php
        	  if (isset($_REQUEST['Simpan'])) {
				$NamaPenguji1 = $_REQUEST['Nama1'];
        	  	$kontak1      = $_REQUEST['kontak1'];
				$NamaPenguji2 = $_REQUEST['Nama2'];
				$kontak2      = $_REQUEST['kontak2'];
				$Hari         = $_REQUEST['hari'];
				$Tgl          = $_REQUEST['tgl'];
				$Jam          = $_REQUEST['jam'];
				$NamaKelompok = $_REQUEST['Kelompok'];
				$query = mysqli_query($conn, "SELECT * FROM jadwal WHERE hari='$Hari' AND tgl_ujian='$Tgl' AND jam='$Jam'");
				$cek = mysqli_num_rows($query);
				if ($cek > 0) {
					echo "<script>alert('Maaf Inputan Yang Anda Masukkan Sudah Ada')</script>";
				}else{

				$Simpan = mysqli_query($conn, "INSERT INTO `jadwal`(
																	`id_jadwal`, 
																	`KelompokID`, 
																	`nama_penguji 1`, 
																	`nama_penguji2`, 
																	`hari`, 
																	`tgl_ujian`, 
																	`jam`, 
																	`kontak1`, 
																	`kontak2`) 
																	VALUES (
																	'',
																	'$NamaKelompok',
																	'$NamaPenguji1',
																	'$NamaPenguji2',
																	'$Hari',
																	'$Tgl',
																	'$Jam',
																	'$kontak1',
																	'$kontak2')");
				if ($Simpan) {
					echo '<div class="alert alert-success alert-dismissible fade in" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="success"><span aria-hidden="true">×</span>
                    </button>
                    <strong>Perhatian!</strong>Simpan Berhasil.
                  </div>';
				}else{
					echo '<div class="alert alert-danger alert-dismissible fade in" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="success"><span aria-hidden="true">×</span>
                    </button>
                    <strong>Perhatian!</strong>Simpan Gagal.
                  </div>';
				}
			}
				echo "<script>document.location='?page=jadwal&jadwal=active'</script>";
        	  }else if(isset($_REQUEST['Update'])){
        	  	$ID           = $id;
        	  	$NamaPenguji1 = $_REQUEST['Nama1'];
        	  	$kontak1      = $_REQUEST['kontak1'];
				$NamaPenguji2 = $_REQUEST['Nama2'];
				$kontak2      = $_REQUEST['kontak2'];
				$Hari         = $_REQUEST['hari'];
				$Tgl          = $_REQUEST['tgl'];
				$Jam          = $_REQUEST['jam'];
				$NamaKelompok = $_REQUEST['Kelompok'];

				$Update = mysqli_query($conn, "UPDATE 
													`jadwal` 
													SET 
													  `KelompokID`='$NamaKelompok',
													  `nama_penguji 1`='$NamaPenguji1',
													  `nama_penguji2`='$NamaPenguji2',
													  `hari`='$Hari',
													  `tgl_ujian`='$Tgl',
													  `jam`='$Jam',
													  `kontak1`='$kontak1',
													  `kontak2`='$kontak2' 
													WHERE
													  `id_jadwal`='$ID'");
				if ($Update) {
					echo '<div class="alert alert-success alert-dismissible fade in" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="success"><span aria-hidden="true">×</span>
                    </button>
                    <strong>Perhatian!</strong>Update Berhasil.
                  </div>';
				}else{
					echo '<div class="alert alert-danger alert-dismissible fade in" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="success"><span aria-hidden="true">×</span>
                    </button>
                    <strong>Perhatian!</strong>Update Gagal.
                  </div>';
				}
				echo "<script>document.location='?page=jadwal&jadwal=active'</script>";
        	  }
        	?>
			<form class="form-horizontal" action="" method="POST" role="form">
			  <div class="form-group">
			    <label for="inputEmail3" class="col-sm-2 control-label">Nama Penguji1</label>
			    <div class="col-sm-10">
			      <input type="text" class="form-control" name="Nama1" id="inputEmail3" placeholder="Nama Penguji" required value="<?= $rr['nama_penguji 1'];?>">
			    </div>
			  </div>
			  <div class="form-group">
			  	<label class="col-sm-2 control-label">Kontak</label>
			  	<div class="col-sm-10">
			  		<input type="number" name="kontak1" required class="form-control" value="<?= $rr['kontak1']?>" >
			  	</div>
			  </div>
			  <div class="form-group">
			    <label for="inputEmail3" class="col-sm-2 control-label">Nama Penguji2</label>
			    <div class="col-sm-10">
			      <input type="text" class="form-control" name="Nama2" placeholder="Nama Penguji" required value="<?= $rr['nama_penguji2'];?>">
			    </div>
			  </div>
			  <div class="form-group">
			  	<label class="col-sm-2 control-label">Kontak</label>
			  	<div class="col-sm-10">
			  		<input type="number" name="kontak2" required class="form-control" value="<?= $rr['kontak2']?>" >
			  	</div>
			  </div>
			  <div class="form-group">
			  	<label class="col-sm-2 control-label">Hari</label>
			  	<div class="col-sm-10">
			  		<select class="form-control" name="hari">
			  			<option>Pilih Hari</option>
			  			<option value="Senin"<?php if($rr['hari']=="Senin")echo "selected"; ?>>Senin</option>
			  			<option value="Selasa"<?php if($rr['hari']=="Selasa")echo "selected"; ?>>Selasa</option>
			  			<option value="Rabu"<?php if($rr['hari']=="Rabu")echo "selected"; ?>>Rabu</option>
			  			<option value="Kamis"<?php if($rr['hari']=="Kamis")echo "selected"; ?>>Kamis</option>
			  			<option value="Sabtu"<?php if($rr['hari']=="Sabtu")echo "selected"; ?>>Sabtu</option>
			  			<option value="Minggu" <?php if($rr['hari']=="Minggu")echo "selected"; ?>>Minggu</option>
			  		</select>
			  	</div>
			  </div>
			  <div class="form-group">
			  	<label class="col-sm-2 control-label">Tgl Ujian</label>
			  	<div class="col-sm-10">
			  		<input type="date" name="tgl" required class="form-control" value="<?= $rr['tgl_ujian']?>">
			  	</div>
			  </div>
			  <div class="form-group">
			  	<label class="col-sm-2 control-label">Jam</label>
			  	<div class="col-sm-10">
			  		<input type="time" name="jam" required class="form-control" value="<?= $rr['jam']?>" >
			  	</div>
			  </div>
			  <div class="form-group">
			  	<label class="col-sm-2 control-label">Nama Kelompok</label>
			  	<div class="col-sm-10">
			  		<select class="form-control" name="Kelompok">
			  			<option>Pilih Nama Kelompok</option>
			  			<?php 
			  			  $sql = mysqli_query($conn, "SELECT * FROM kelompok");
			  			  while($data = mysqli_fetch_array($sql)){
			  			 ?>
			  			<option value="<?= $data['KelompokID']?>"<?php if($data['KelompokID']==$rr['KelompokID']){echo "selected";} ?>><?= $data['NamaKelompok']?></option>
			  			<?php } ?>
			  		</select>
			  	</div>
			  </div>
			  <div class="form-group">
			    <div class="col-sm-offset-2 col-sm-10">
			      <button type="submit" <?php if($id){echo "name='Update'";}else{echo "name='Simpan'";} ?> class="btn btn-success"><?php if($id){echo "Update";}else{echo "Simpan";} ?></button>
			    </div>
			  </div>
			</form>
		</div>
     </div>
</div>