<div class="col-lg-12">
    <div class="panel panel-color panel-danger">
        <div class="panel-heading">
        	<?php
        	  if ($_SESSION['hak_akses']=='pembimbing') {
        		if ($_REQUEST['PembimbingID']) {
        			echo '<h3 class="panel-title"> Edit Profile PPL Unipdu</h3>';
        		}

        	  }elseif ($_SESSION['hak_akses']=='uptppl') {
        		if ($_REQUEST['PembimbingID']) {
        			echo '<h3 class="panel-title"> Edit Pembimbing PPL Unipdu</h3>';
        		}else{
        			echo '<h3 class="panel-title">Tambah Pembimbing PPL Unipdu</h3>';
        		}
        	  }
        	?>  
        </div> 
        <div class="panel-body"> 
        	<button onclick="document.location='?page=fakultas&fakultas=active'" class="btn btn-success"><span class="ion-arrow-left-c"></span> Kembali kehalaman awal</button><br><br>
        	<?php include 'ac/lib_pembimbing.php'; ?>
        	<?php 
				if(isset($_REQUEST['PembimbingID'])){
					$PembimbingID=$_REQUEST['PembimbingID'];
					$query =mysqli_query($conn,"SELECT * FROM pembimbing AS a LEFT JOIN login AS b ON a.PembimbingID=b.Username WHERE PembimbingID='$PembimbingID'");
					$data  = mysqli_fetch_array($query);
					$Input = "<input type='hidden' name='PembimbingID' value='$data[PembimbingID]'>";
				}
        	?>
			<form class="form-horizontal" action="" method="POST" role="form">
			  <div class="form-group">
			    <label for="inputEmail3" class="col-sm-2 control-label">NIPY</label>
			    <div class="col-sm-10">
			    <?php echo $Input; ?>
			      <input type="number" class="form-control" <?php if($_REQUEST['PembimbingID']){echo 'value="'.$data['PembimbingID'].'" disabled';} ?> name="NIPY" id="inputEmail3" placeholder="NIPY" required >
			    </div>
			  </div>
			  <div class="form-group">
			    <label for="inputEmail3" class="col-sm-2 control-label">Nama</label>
			    <div class="col-sm-10">
			      <input type="text" class="form-control" name="Nama" id="inputEmail3" placeholder="Nama Pembimbing" required value="<?= $data['Nama']?>">
			    </div>
			  </div>
			  <div class="form-group">
			    <label for="inputEmail3" class="col-sm-2 control-label">Alamat</label>
			    <div class="col-sm-10">
			     <textarea class="form-control" name="Alamat"><?= $data['Alamat']?></textarea>
			    </div>
			  </div>
			  <div class="form-group">
			  	<label class="col-sm-2 control-label">No.Telp</label>
			  	<div class="col-sm-10">
			  		<input type="number" name="No" required class="form-control" value="<?= $data['Kontak']?>">
			  	</div>
			  </div>
			  <div class="form-group">
			  	<label class="col-sm-2 control-label">Password</label>
			  	<div class="col-sm-10">
			  		<input type="password" name="pass" required class="form-control" value="<?= $data['Password']?>">
			  	</div>
			  </div>
			  <div class="form-group">
			    <div class="col-sm-offset-2 col-sm-10">
			      <button type="submit" <?php if($PembimbingID){echo "name='UpdatePembimbing'";}else{echo "name='SimpanPembimbing'";} ?> class="btn btn-success"><?php if($PembimbingID){echo "Update";}else{echo "Simpan";} ?></button>
			    </div>
			  </div>
			</form>
		</div>
     </div>
</div>