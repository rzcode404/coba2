<?php 
	$NIM = $_REQUEST['id'];
	$sql = mysqli_query($conn,"SELECT * FROM mahasiswa AS a LEFT JOIN login AS b ON a.NIM=b.Username WHERE NIM='$NIM'");
	$dt  = mysqli_fetch_array($sql);
?>
<div class="col-lg-12">
	<div class="panel panel-color panel-danger">
		<div class="panel-heading">
			<?php 
				if ($_SESSION['hak_akses']=="uptppl") {
					if ($NIM) {
						echo'<h3 class="panel-title">Update Profile Mahasiswa PPL Unipdu</h3>';
					}else{
						echo '<h3 class="panel-title">Tambah Profile Mahasiswa PPL Unipdu</h3>';
					}
				}elseif ($_SESSION['hak_akses']=="mahasiswa") {
					if ($ID) {
						echo'<h3 class="panel-title">Update Profile Mahasiswa PPL Unipdu</h3>';
					}else{
						echo '<h3 class="panel-title">Tambah Profile Mahasiswa PPL Unipdu</h3>';
					}
				}
			 ?>
		</div>
		<div class="panel-body">
		<?php
			if (isset($_REQUEST['Update'])) {
				$Nim        = $_REQUEST['nim'];
				$Nama       = $_REQUEST['nama'];
				$Prodi      = $_REQUEST['prodi'];
				$Alamat     = $_REQUEST['Alamat'];
				$No         = $_REQUEST['no'];
				$Pass       = md5($_REQUEST['password']);
				$date       = date("Y-m-d");
				// Foto 1
				$temp_name  = $_FILES['Foto']['tmp_name'];
				$name_file  = $_FILES['Foto']['name'];
				$type_file  = $_FILES['Foto']['type'];
				$size       = $_FILES['Foto']['size'];

				if($size >= 3097152){
					echo "upload maksimal 3 mb";
				}else{
					$Move = move_uploaded_file($temp_name, 'upload/'.$date."-".$name_file.'');
					if ($Move) {
						unlink('"upload/'.$file.'"');
						$nm_foto  = $date."-".$name_file;
					}
				}

				$Update = mysqli_query($conn, "UPDATE `mahasiswa` 
														SET 
														  `Nama`='$Nama',
														  `ProdiID`='$Prodi',
														  `Alamat`='$Alamat',
														  `No.Telp`='$No',
														  `Foto`= '$nm_foto'
														  WHERE 
														  `NIM`='$Nim'");
				$Update = mysqli_query($conn, "UPDATE login SET
															`Password`='$Pass'
															WHERE 
															 Username ='$Nim'");
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
				echo "<meta http-equiv='refresh' content='2; ./index.php?page=profile&profile=active&NIM=".$Nim."'>";
			}
		 ?>
		 <form method="POST" enctype="multipart/form-data">
		 <input type="hidden" value="<?= $dt['NIM']?>" name="nim">
			<div class="form-group">
				<label class="col-sm-2">Nama</label>
				<div class="col-md-10">
					<input type="text" name="nama" <?php if($_SESSION['hak_akses']=="mahasiswa"){echo "disabled";} ?> required class="form-control" value="<?= $dt[Nama]?>">
				</div><br><br>
			</div>
			<div class="form-group">
				<label class="col-sm-2">Nama Prodi</label>
				<div class="col-md-10">
					<select class="form-control" name="prodi" <?php if($_SESSION['hak_akses']=="mahasiswa"){echo "disabled";} ?>>
						<option>Pilih Nama Prodi</option>
						<?php 
							$sql = mysqli_query($conn, "SELECT * FROM prodi");
							while ($data = mysqli_fetch_array($sql)) {
						 ?>
						<option value="<?php echo $data['ProdiID'];?>"<?php if($data['ProdiID']==$dt['ProdiID']){echo "selected";} ?>><?php echo $data['NamaProdi']; ?></option>
						<?php } ?>
					</select>
				</div><br><br>
			</div>
			<div class="form-group">
				<label class="col-sm-2">Alamat</label>
				<div class="col-md-10">
					<textarea class="form-control" name="Alamat"><?= $dt[Alamat]?></textarea>
				</div><br><br>
			</div>
			<div class="form-group">
				<label class="col-sm-2">No.Telp</label>
				<div class="col-md-10">
					<input type="number" name="no" value="<?php echo $dt['No.Telp'];?>" class="form-control">
				</div><br><br>
			</div>
			<div class="form-group">
				<label class="col-sm-2">Password</label>
				<div class="col-md-10">
					<input type="password" name="password" value="<?php echo $dt['Password'];?>" class="form-control">
				</div><br><br>
			</div>
			<div class="form-group">
				<label class="col-sm-2">Foto Profile</label>
				<div class="col-md-10">
					<img src="upload/<?php echo $dt['Foto'];?>" width="20%">
					<input type="file" name="Foto" class="form-control">
				</div><br><br>
			</div>
			<div class="form-group">
				<label class="col-sm-2"></label>
				<div class="col-md-10"><br>
					<button class="btn btn-primary" name="Update"><i class="fa fa-edit" ></i>&nbsp;Update</button>
				</div>
			</div>
		  </form>
		</div>
	</div>
</div>
</div>