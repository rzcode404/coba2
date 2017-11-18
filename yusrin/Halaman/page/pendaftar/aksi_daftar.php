<?php 
	if (isset($_REQUEST['Daftar1'])) {
		$Pendaftar = "N"."-".date(ymdhis);
		$id        = $NIM;
		$pkn       = $_REQUEST['pkn'];
		$Simpan    = mysqli_query($conn, "INSERT INTO `nilai`(
															  `NilaiID`, 
															  `NIM`, 
															  `Pancasila/Pend_kewarganegaraan`) 
															  VALUES (
															  '$Pendaftar',
															  '$id',
															  '$pkn')");
		echo "<script>document.location='index.php?page=pendaftaran&pendaftaran=active'</script>";
	}else if (isset($_REQUEST['Daftar2'])) {
		$Pendaftar = $_REQUEST['id'];
		$pkn       = $_REQUEST['introduction'];

		$Update   = mysqli_query($conn, "UPDATE `nilai` SET 
												`IntroductionToEducation`='$pkn'
												WHERE `NilaiID`='$Pendaftar'");
		echo "<script>document.location='index.php?page=pendaftaran&pendaftaran=active'</script>";
	}else if (isset($_REQUEST['Daftar3'])) {
		$Pendaftar = $_REQUEST['id'];
		$pkn       = $_REQUEST['Education'];

		$Update   = mysqli_query($conn, "UPDATE `nilai` SET 
												`EducationalProfession`='$pkn'
												WHERE `NilaiID`='$Pendaftar'");
		echo "<script>document.location='index.php?page=pendaftaran&pendaftaran=active'</script>";

	}else if (isset($_REQUEST['Daftar4'])) {
		$Pendaftar = $_REQUEST['id'];
		$pkn       = $_REQUEST['ResearchSeminar'];

		$Update   = mysqli_query($conn, "UPDATE `nilai` SET 
												`ResearchSeminar`='$pkn'
												WHERE `NilaiID`='$Pendaftar'");
		echo "<script>document.location='index.php?page=pendaftaran&pendaftaran=active'</script>";
	}else if(isset($_REQUEST['Daftar5'])){
		$Pendaftar = $_REQUEST['id'];
		$pkn       = $_REQUEST['nilai'];

		$Update   = mysqli_query($conn, "UPDATE `nilai` SET 
												`PPL1/Microteaching`='$pkn'
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