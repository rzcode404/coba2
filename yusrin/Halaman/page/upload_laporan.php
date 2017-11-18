
<div class="col-lg-12">
    <div class="panel panel-color panel-success">
        <div class="panel-heading"> 
            <h3 class="panel-title">Upload Laporan</h3> 
        </div> 
        <div class="panel-body"> 
        	<?php 
        		if (isset($_REQUEST['Upload'])) {
        			$ID = "LAP"."-".date(ymdhis);
        			$kelompok = $_REQUEST['kelompok'];
        			$date          = date("Y-m-d");
					// Foto 1
					$temp_name1    = $_FILES['file']['tmp_name'];
					$name_file1    = $_FILES['file']['name'];
					$type_file1    = $_FILES['file']['type'];
					$size1         = $_FILES['file']['size'];
					if (!empty($temp_name1) OR !empty($temp_name2) OR !empty($temp_name3)) {
				    // Pindah foto
				    move_uploaded_file($temp_name1, 'file/'.$date."-".$name_file1.'');
				    // File di upload
				    $File = $date."-".$name_file1;
				    
				  }else{
				    $File = "";
				  }

				  $upload = mysqli_query($conn, "INSERT INTO `laporan`(
				  												`LaporanID`, 
				  												`KelompokID`,
				  												`File`)
				  												 VALUES (
				  												 '$ID',
				  												 '$kelompok',
				  												 '$File')");
				  if ($upload) {
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
		  			echo "<meta http-equiv='refresh' content='2'>";

        		}	
        	 ?>
			<form class="form-horizontal" enctype="multipart/form-data" method="POST" role="form">
			  <div class="form-group">
			    <label for="inputPassword3" class="col-sm-2 control-label">Fakultas</label>
			    <div class="col-sm-10">
			      <select class="form-control" name="kelompok">
			      	<option>Pilih Kelompok</option>
			      	<?php 
			      		$sd = mysqli_query($conn, "SELECT * FROM kelompok");
			      		while ($d = mysqli_fetch_array($sd)) {
			      	 ?>
			      	<option value="<?php echo $d['KelompokID'];?>"><?php echo $d['NamaKelompok']; ?></option>
			      	<?php } ?>
			      </select>
			    </div>
			  </div>
			  <div class="form-group">
			    <label for="inputPassword3" class="col-sm-2 control-label">Nama File</label>
			    <div class="col-sm-10">
			      <input type="file" class="form-control" name="file">
			    </div>
			  </div>
			  <div class="form-group">
			    <div class="col-sm-offset-2 col-sm-10">
			      <button type="submit" name="Upload" class="btn btn-success">Upload</button>
			    </div>
			  </div>
			</form>
		</div>
     </div>
</div>