<?php 
	if (isset($_REQUEST['Simpan'])) {
		$NIM    = $_REQUEST['NIM'];
		$Nama   = $_REQUEST['Nama'];
		$prodi  = $_REQUEST['prodi'];
		$Alamat = $_REQUEST['Alamat'];
		$No     = $_REQUEST['No'];
		$jk     = $_REQUEST['jk'];
		$Simpan = mysqli_query($conn, "INSERT INTO `mahasiswa`(
															   `NIM`, 
															   `KelompokID`, 
															   `Nama`, 
															   `ProdiID`, 
															   `Alamat`, 
															   `No.Telp`, 
															   `JK`, 
															   `Foto`) 
															   VALUES (
															   '$NIM',
															   '',
															   '$Nama',
															   '$prodi',
															   '$Alamat',
															   '$No',
															   '$jk')");
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
		echo "<meta http-equiv='refresh' content='2; ./index.php?page=datamahasiswa&datamahasiswa=active'>";
	}


 ?>