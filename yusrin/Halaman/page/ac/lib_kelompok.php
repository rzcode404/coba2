<?php 
	if (isset($_REQUEST['Simpan'])) {
		$KelompokID = $_REQUEST['KelompokID'];
		$Nama       = $_REQUEST['nama'];
		$Tempat     = $_REQUEST['tempat'];
		$Tahun      = $_REQUEST['Tahun'];

		$Simpan = mysqli_query($conn, "INSERT INTO 
												`kelompok`(
														   `KelompokID`, 
														   `PembimbingID`, 
														   `TempatPPL`,  
														   `TahunAkademik`)
														    VALUES (
														    '$KelompokID',
														    '$Nama',
														    '$Tempat',
														    '$Tahun')");
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
		echo "<meta http-equiv='refresh' content='2; ./index.php?page=datakelompok&datakelompok=active'>";
	}else if(isset($_REQUEST['Update'])){
		$KelompokID = $_REQUEST['KelompokID'];
		$Nama       = $_REQUEST['nama'];
		$Tempat     = $_REQUEST['tempat'];
		$Tahun      = $_REQUEST['Tahun'];

		$Simpan = mysqli_query($conn, "UPDATE `kelompok` 
													SET 
													  `PembimbingID`='$Nama',
													  `TempatPPL`='$Tempat',
													  `TahunAkademik`='$Tahun' 
													WHERE `KelompokID`='$KelompokID'");
		if ($Simpan) {
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
		echo "<meta http-equiv='refresh' content='2; ./index.php?page=datakelompok&datakelompok=active'>";
	}

 ?>