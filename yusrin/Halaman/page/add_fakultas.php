<div class="col-lg-12">
    <div class="panel panel-color panel-danger">
        <div class="panel-heading"> 
            <h3 class="panel-title">Tambah Fakultas PPL Unipdu</h3> 
        </div> 
        <div class="panel-body"> 
        	<button onclick="document.location='?page=fakultas&fakultas=active'" class="btn btn-success"><span class="ion-arrow-left-c"></span> Kembali kehalaman awal</button><br><br>
        	<?php include 'ac/lib_fakultas.php'; ?>
        	<?php 
				if(isset($_REQUEST['FakultasID'])){
					$FakultasID=$_REQUEST['FakultasID'];
					$query =mysqli_query($conn,"SELECT * FROM fakultas WHERE FakultasID='$FakultasID'");
					$data  = mysqli_fetch_array($query);
					$Input = "<input type='hidden' name='FakultasID' value='$data[FakultasID]'>";
				}
        	?>
			<form class="form-horizontal" action="" method="POST" role="form">
			  <div class="form-group">
			    <label for="inputEmail3" class="col-sm-2 control-label">Kode</label>
			    <div class="col-sm-10">
			    <?php echo $Input; ?>
			      <input type="number" value="<?php echo $data['KodeFakultas']; ?>" class="form-control" name="Kode" id="inputEmail3" placeholder="Kode Fakultas">
			    </div>
			  </div>
			  <div class="form-group">
			    <label for="inputPassword3" class="col-sm-2 control-label">Fakultas</label>
			    <div class="col-sm-10">
			      <input type="text" class="form-control" value="<?php echo $data['NamaFakultas']; ?>" name="Fakultas" id="inputPassword3" placeholder="Nama Fakultas">
			    </div>
			  </div>
			  <div class="form-group">
			    <div class="col-sm-offset-2 col-sm-10">
			      <button type="submit" <?php if($FakultasID){echo "name='UpdateFakultas'";}else{echo "name='SimpanFakultas'";} ?> class="btn btn-success">Simpan</button>
			    </div>
			  </div>
			</form>
		</div>
     </div>
</div>