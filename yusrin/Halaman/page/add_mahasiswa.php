<div class="col-lg-12">
    <div class="panel panel-color panel-danger">
        <div class="panel-heading"> 
            <h3 class="panel-title">Tambah Mahasiswa PPL Unipdu</h3> 
        </div> 
        <div class="panel-body"> 
        	<button onclick="document.location='?page=datamahasiswa&datamahasiswa=active'" class="btn btn-success"><span class="ion-arrow-left-c"></span> Kembali kehalaman awal</button><br><br>
        	<?php include 'ac/lib_mahasiswa.php'; ?>
        	<?php 
				if(isset($_REQUEST['PembimbingID'])){
					$PembimbingID=$_REQUEST['PembimbingID'];
					$query =mysqli_query($conn,"SELECT * FROM mahasiswa WHERE NIM='$NIM'");
					$data  = mysqli_fetch_array($query);
					$Input = "<input type='hidden' name='PembimbingID' value='$data[PembimbingID]'>";
				}
        	?>
			<form class="form-horizontal" action="" method="POST" role="form">
			  <div class="form-group">
			    <label for="inputEmail3" class="col-sm-2 control-label">NIM</label>
			    <div class="col-sm-10">
			    <?php echo $Input; ?>
			      <input type="number" class="form-control" name="NIM" id="inputEmail3" placeholder="NIM" required value="<?php echo $data['NIM']; ?>">
			    </div>
			  </div>
			  <div class="form-group">
			    <label for="inputEmail3" class="col-sm-2 control-label">Nama</label>
			    <div class="col-sm-10">
			      <input type="text" class="form-control" name="Nama" id="inputEmail3" placeholder="Nama Mahasiswa" required value="<?= $data['Nama']?>">
			    </div>
			  </div>
			  <div class="form-group">
			    <label for="inputEmail3" class="col-sm-2 control-label">Nama Prodi</label>
			    <div class="col-sm-10">
			      <select name="prodi" class="form-control">
			      	<option>Pilih Nama Prodi</option>
			      	<?php 
			      	  $sql = mysqli_query($conn, "SELECT * FROM prodi");
			      	  while ($r = mysqli_fetch_array($sql)) {
			      	 ?>
			      	 <option value="<?= $r['ProdiID']?>"><?php echo $r['NamaProdi']; ?></option>
			      	 <?php } ?>
			      </select>
			    </div>
			  </div>
			  <div class="form-group">
			    <label for="inputEmail3" class="col-sm-2 control-label">Alamat</label>
			    <div class="col-sm-10">
			     <textarea class="form-control" name="Alamat"><?= $data['Alamat']?></textarea>
			    </div>
			  </div>
			  <div class="form-group">
			    <label for="inputEmail3" class="col-sm-2 control-label">Jenis Kelamin</label>
			    <div class="col-sm-10">
			      <select name="jk" class="form-control">
			      	<option>Pilih Jenis Kelamin</option>
			      	<option value="L">Laki-Laki</option>
			      	<option value="P">Perempuan</option>
			      </select>
			    </div>
			  </div>
			  <div class="form-group">
			    <div class="col-sm-offset-2 col-sm-10">
			      <button type="submit" <?php if($NIM){echo "name='Update'";}else{echo "name='Simpan'";} ?> class="btn btn-success"><?php if($NIM){echo "Update";}else{echo "Simpan";} ?></button>
			    </div>
			  </div>
			</form>
		</div>
     </div>
</div>