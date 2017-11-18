<?php 
	$KelompokID = $_REQUEST['KelompokID'];
	$j = mysqli_query($conn, "SELECT * FROM kelompok AS a LEFT JOIN pembimbing AS b ON a.PembimbingID=b.PembimbingID WHERE a.KelompokID='$KelompokID'");
	$r = mysqli_fetch_array($j);
 ?>
<div class="col-lg-12">
    <div class="panel panel-color panel-success">
        <div class="panel-heading"> 
        	<?php 
        		if ($KelompokID) {
            		echo'<h3 class="panel-title">Update Kelompok UPT PPL Unipdu</h3>'; 
        		}else{
            		echo'<h3 class="panel-title">Tambah Kelompok UPT PPL Unipdu</h3>'; 	
        		}
        	 ?>
        </div> 
        <div class="panel-body"> 
        	<button onclick="document.location='?page=datakelompok&datakelompok=active'" class="btn btn-success"><span class="ion-arrow-left-c"></span> Kembali kehalaman awal</button><br><br>
        	<?php include 'ac/lib_kelompok.php'; ?>
			<form class="form-horizontal" action="" method="POST" role="form">
			<?php 
				$carikode = mysqli_query($conn, "SELECT max(KelompokID) FROM kelompok") or die (mysql_error());
				  // menjadikannya array
				  $datakode = mysqli_fetch_array($carikode);
				  // jika $datakode
				  if ($datakode) {
				   $nilaikode = substr($datakode[0], 1);
				   // menjadikan $nilaikode ( int )
				   $kode = (int) $nilaikode;
				   // setiap $kode di tambah 1
				   $kode = $kode + 1;
				   $kode_otomatis = "K".str_pad($kode, 2, "0", STR_PAD_LEFT);
				  } else {
				   $kode_otomatis = "K01";
				  }
			 ?>
			  <div class="form-group">
			    <label for="inputPassword3" class="col-sm-2 control-label">Kelompok ID</label>
			    <div class="col-sm-10">
			      <input type="text" readonly class="form-control" name="KelompokID" <?php if($KelompokID){echo "value='".$r['KelompokID']."'";}else{echo "value='".$kode_otomatis."'";} ?> placeholder="Kode Kelompok">
			    </div>
			  </div>
			  <div class="form-group">
			    <label for="inputPassword3" class="col-sm-2 control-label">Nama Pembimbing</label>
			    <div class="col-sm-10">
			    	<select name="nama" class="form-control">
			    		<option>Pilih Nama Pembimbing</option>
			    		<?php 
			    			$sql = mysqli_query($conn, "SELECT * FROM pembimbing");
			    			while ($data = mysqli_fetch_array($sql)) {
			    		 ?>
			    		<option value="<?= $data['PembimbingID']?>"<?php if ($data['PembimbingID']==$r['PembimbingID']){echo "selected";} ?>><?php echo $data['Nama']; ?></option>
			    		<?php } ?>
			    	</select>
			    </div>
			  </div>
			  <div class="form-group">
			    <label for="inputPassword3" class="col-sm-2 control-label">Tempat PPL</label>
			    <div class="col-sm-10">
			    	<textarea name="tempat" class="form-control"><?= $r['TempatPPL']?></textarea>
			    </div>
			  </div>
			  <div class="form-group">
			    <label for="inputPassword3" class="col-sm-2 control-label">Tahun Akademik</label>
			    <div class="col-sm-10">
			    	<select name="Tahun" class="form-control">
			    		<option>Pilih Tahun Akademik</option>
			    		<?php for ($i=1999; $i<2080 ; $i++) { ?>
			    		<option value="<?php echo $i; ?>"<?php if($i==$r['TahunAkademik']){echo "selected";} ?>><?php echo $i; ?></option>
			    		<?php } ?>
			    	</select>
			    </div>
			  </div>
			  <div class="form-group">
			    <div class="col-sm-offset-2 col-sm-10">
			      <button type="submit" <?php if($KelompokID){echo "name='Update'";}else{echo "name='Simpan'";} ?> class="btn btn-success"><?php if ($KelompokID){echo "Update";}else{echo "Simpan";} ?></button>
			    </div>
			  </div>
			</form>
		</div>
     </div>
</div>