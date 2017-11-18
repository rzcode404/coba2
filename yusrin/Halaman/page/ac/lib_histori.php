<?php 
	if (isset($_REQUEST['Simpan'])) {
		$keterangan    = $_REQUEST['keterangan'];
		$kelompok      = $_REQUEST['kelompok'];
		$date          = date("Y-m-d");
		// Foto 1
		$temp_name1    = $_FILES['foto1']['tmp_name'];
		$name_file1    = $_FILES['foto1']['name'];
		$type_file1    = $_FILES['foto1']['type'];
		$size1         = $_FILES['foto1']['size'];
		// echo $name_file1;
		// die();
		// Foto 2
		$temp_name2    = $_FILES['foto2']['tmp_name'];
		$name_file2    = $_FILES['foto2']['name'];
		$type_file2    = $_FILES['foto2']['type'];
		$size2         = $_FILES['foto2']['size'];
		// Foto 3
		$temp_name3    = $_FILES['foto3']['tmp_name'];
		$name_file3    = $_FILES['foto3']['name'];
		$type_file3    = $_FILES['foto3']['type'];
		$size3         = $_FILES['foto3']['size'];
		  
		  if (!empty($temp_name1) OR !empty($temp_name2) OR !empty($temp_name3)) {
		    // Pindah foto
		    move_uploaded_file($temp_name1, 'upload/'.$date."-".$name_file1.'');
		    move_uploaded_file($temp_name2, 'upload/'.$date."-".$name_file2.'');
		    move_uploaded_file($temp_name3, 'upload/'.$date."-".$name_file3.'');
		    // File di upload
		    $Foto1 = $date."-".$name_file1;
		    $Foto2 = $date."-".$name_file2;
		    $Foto3 = $date."-".$name_file3;
		    
		  }else{
		    $Foto1 = "";
		    $Foto2 = "";
		    $Foto3 = "";
		  }

		  $Simpan = mysqli_query($conn, "INSERT INTO `histori`(
		  												`HistoriID`,
		  												`KelompokID`, 
		  												`Keterangan`, 
		  												`Foto`, 
		  												`Foto2`, 
		  												`Foto3`) 
		  												VALUES (
		  												'',
		  												'$kelompok',
		  												'$keterangan',
		  												'$Foto1',
		  												'$Foto2',
		  												'$Foto3')");
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
		  echo "<meta http-equiv='refresh' content='2; ./index.php?page=histori&histori=active'>";
		 
	}else if (isset($_REQUEST['Update'])) {
		$id            = $ID;
		$keterangan    = $_REQUEST['keterangan'];
		$kelompok      = $_REQUEST['kelompok'];
		// Foto 1
		$temp_name1    = $_FILES['foto1']['tmp_name'];
		$name_file1    = $_FILES['foto1']['name'];
		$type_file1    = $_FILES['foto1']['type'];
		$size1         = $_FILES['foto1']['size'];
		// echo $name_file1;
		// die();
		// Foto 2
		$temp_name2    = $_FILES['foto2']['tmp_name'];
		$name_file2    = $_FILES['foto2']['name'];
		$type_file2    = $_FILES['foto2']['type'];
		$size2         = $_FILES['foto2']['size'];
		// Foto 3
		$temp_name3    = $_FILES['foto3']['tmp_name'];
		$name_file3    = $_FILES['foto3']['name'];
		$type_file3    = $_FILES['foto3']['type'];
		$size3         = $_FILES['foto3']['size'];
		  
		  if (!empty($temp_name1) OR !empty($temp_name2) OR !empty($temp_name3)) {
		    // Pindah foto
		    move_uploaded_file($temp_name1, 'upload/'.$date."-".$name_file1.'');
		    move_uploaded_file($temp_name2, 'upload/'.$date."-".$name_file2.'');
		    move_uploaded_file($temp_name3, 'upload/'.$date."-".$name_file3.'');
		    // File di upload
		    $Foto1 = $date."-".$name_file1;
		    $Foto2 = $date."-".$name_file2;
		    $Foto3 = $date."-".$name_file3;
		    
		  }else{
		    $Foto1 = $g['Foto'];
		    $Foto2 = $g['Foto2'];
		    $Foto3 = $g['Foto3'];
		  }

		  $Update = mysqli_query($conn, "UPDATE `histori` 
		  									 SET 
  												`KelompokID`='$kelompok',
  												`Keterangan`='$keterangan',
  												`Foto`='$Foto1',
  												`Foto2`='$Foto2',
  												`Foto3`='$Foto3' 
		  									  WHERE `HistoriID`='$id'");
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
		  echo "<meta http-equiv='refresh' content='2; ./index.php?page=histori&histori=active'>";
	}

 ?>