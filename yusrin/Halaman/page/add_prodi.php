<div class="col-lg-12">
    <div class="panel panel-color panel-success">
        <div class="panel-heading"> 
            <h3 class="panel-title">Tambah Prodi Unipdu</h3> 
        </div> 
        <div class="panel-body"> 
        	<button onclick="document.location='?page=prodi&prodi=active'" class="btn btn-success"><span class="ion-arrow-left-c"></span> Kembali kehalaman awal</button><br><br>
        	<?php include 'ac/lib_prodi.php'; ?>
        	<?php 
				if(isset($_REQUEST['ProdiID'])){
					$ProdiID=$_REQUEST['ProdiID'];
					$query =mysqli_query($conn,"SELECT * FROM prodi WHERE ProdiID='$ProdiID'");
					$data  = mysqli_fetch_array($query);
					$Input = "<input type='hidden' name='ProdiID' value='$data[ProdiID]'>";
				}
        	?>
			<form class="form-horizontal" action="" method="POST" role="form">
			  <div class="form-group">
			    <label for="inputPassword3" class="col-sm-2 control-label">Fakultas</label>
			    <div class="col-sm-10">
			      <select class="form-control" name="FakultasID">
			      	<option>Pilih fakultas</option>
			      	<?php 
			      		$sd = mysqli_query($conn, "SELECT * FROM fakultas");
			      		while ($d = mysqli_fetch_array($sd)) {
			      	 ?>
			      	<option value="<?php echo $d['FakultasID'];?>"<?php if ($d['FakultasID']==$data['FakultasID']){echo "selected";} ?>><?php echo $d['NamaFakultas']; ?></option>
			      	<?php } ?>
			      </select>
			    </div>
			  </div>
			  <div class="form-group">
			    <label for="inputPassword3" class="col-sm-2 control-label">Kode Prodi</label>
			    <div class="col-sm-10">
			      <input type="text" class="form-control" name="KodeProdi" value="<?php echo $data['KodeProdi']; ?>" id="inputPassword3" placeholder="Kode Prodi">
			    </div>
			  </div>
			  <div class="form-group">
			    <label for="inputPassword3" class="col-sm-2 control-label">Prodi</label>
			    <div class="col-sm-10">
			      <input type="text" class="form-control" value="<?php echo $data['NamaProdi']; ?>" name="NamaProdi" id="inputPassword3" placeholder="Nama Prodi">
			    </div>
			  </div>
			  <div class="form-group">
			    <div class="col-sm-offset-2 col-sm-10">
			      <button type="submit" <?php if($ProdiID){echo "name='UpdateProdi'";}else{echo "name='SimpanProdi'";} ?> class="btn btn-success"><?php if ($ProdiID){echo "Update";}else{echo "Simpan";} ?></button>
			    </div>
			  </div>
			</form>
		</div>
     </div>
</div>