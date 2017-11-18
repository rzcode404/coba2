<?php 
	if (isset($_REQUEST['SimpanPembimbing'])) {
		$ID     = $_REQUEST['NIPY'];
		$Nama   = $_REQUEST['Nama'];
		$Alamat = $_REQUEST['Alamat'];
		$Kontak = addslashes($_REQUEST['No']);
		$pass   = md5($_REQUEST['pass']);
		$Simpan = mysqli_query($conn, "INSERT INTO `pembimbing`(
																`PembimbingID`, 
																`Nama`, 
																`Alamat`, 
																`Kontak`) 
																VALUES (
																'$ID',
																'$Nama',
																'$Alamat',
																'$Kontak')");
		$Simpan  = mysqli_query($conn, "INSERT INTO `login`(
															`Username`, 
															`Password`,
															`HakAkses`, 
															`Status`) 
															VALUES (
															'$ID',
															'$pass',
															'pembimbing',
															'Aktif')");
		if ($Simpan) {
			echo '<div class="alert alert-success alert-dismissible fade in" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="success"><span aria-hidden="true">×</span>
                    </button>
                    <strong>Perhatian!</strong>Simpan Berhasil.
                  </div>';
		}else{
			echo '<div class="alert alert-success alert-dismissible fade in" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
                    </button>
                    <strong>Perhatian!</strong>Simpan Gagal.
                  </div>';
		}
		echo "<script>window.location.href='index.php?page=datapembimbing&datapembimbing=active '</script>";
	}elseif(isset($_REQUEST['UpdatePembimbing'])){
		$ID     = $_REQUEST['PembimbingID'];
		$Nama   = $_REQUEST['Nama'];
		$Alamat = $_REQUEST['Alamat'];
		$Kontak = addslashes($_REQUEST['No']);
		$user   = $_REQUEST['user'];
		$pass   = md5($_REQUEST['pass']);
		$Update = mysqli_query($conn,"UPDATE `pembimbing` SET 
															`Nama`='$Nama',
															`Alamat`='$Alamat',
															`Kontak`='$Kontak'
															 WHERE `PembimbingID`='$ID'");
		$Update = mysqli_query($conn, "UPDATE login SET
													  `Password`='$pass'
													WHERE 
													  `Username`='$user'");
		if ($Update) {
			echo '<div class="alert alert-success alert-dismissible fade in" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="success"><span aria-hidden="true">×</span>
                    </button>
                    <strong>Perhatian!</strong>Update Berhasil.
                  </div>';
		}else{
			echo '<div class="alert alert-success alert-dismissible fade in" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="success"><span aria-hidden="true">×</span>
                    </button>
                    <strong>Perhatian!</strong>Update Gagal.
                  </div>';
		}
		echo "<script>window.location.href='index.php?page=datapembimbing&datapembimbing=active '</script>";
	}elseif (isset($_REQUEST['Hapus'])) {
		$ID    = $_REQUEST['PembimbingID'];
		$Hapus = mysqli_query($conn, "DELETE FROM pembimbing WHERE PembimbingID='$ID'");
		if ($Hapus) {
			echo '<div class="alert alert-success alert-dismissible fade in" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="success"><span aria-hidden="true">×</span>
                    </button>
                    <strong>Perhatian!</strong>Update Berhasil.
                  </div>';
		}else{
			echo '<div class="alert alert-success alert-dismissible fade in" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="success"><span aria-hidden="true">×</span>
                    </button>
                    <strong>Perhatian!</strong>Update Gagal.
                  </div>';
		}
		echo "<script>window.location.href='index.php?page=datapembimbing&datapembimbing=active '</script>";
	}


 ?>