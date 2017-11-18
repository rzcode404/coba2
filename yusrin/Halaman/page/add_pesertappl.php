<?php 
	$KelompokID = $_REQUEST['KelompokID'];
 ?>
<div class="col-lg-12">
    <div class="panel panel-color panel-success">
        <div class="panel-heading"> 
			<h3 class="panel-title">Tambah Peserta</h3> 
        </div> 
        <div class="panel-body">
        <?php 
			if (isset($_REQUEST['Tambah'])) {
				$id = $_REQUEST['id'];
				$Kelompok = $_REQUEST['Kelompok'];
				$jumlah = count($id);
				var_dump($Kelompok);
				for ($i=0; $i <= $jumlah ; $i++) { 
					$Simpan = mysqli_query($conn, "UPDATE mahasiswa
															SET 
															  KelompokID='$Kelompok[$i]'
															WHERE 
															  NIM='$id[$i]'");
					if ($Simpan) {
						echo "<script>
                          document.location='index.php?page=setting_kelompok&setting_kelompok=active'
						</script>";
					}
				
				
				}
			}
		 ?> 
			<form class="form-horizontal" action="" method="POST" role="form">
			  <div class="form-group">
			    <label for="inputPassword3" class="col-sm-2 control-label">Kelompok ID</label>
			    <div class="col-sm-10">
			      <input type="text" class="form-control" readonly value="<?php echo $KelompokID;?>">
			    </div>
			  </div>
			  <div class="form-group">
			    <label for="inputPassword3" class="col-sm-2 control-label">Nama Mahasiswa</label>
			    <div class="col-sm-10">
		    	<?php 
		    		$j = mysqli_query($conn, "SELECT * FROM mahasiswa AS a LEFT JOIN nilai AS b ON a.NIM=b.NIM WHERE b.Status='Diterima'");
		    		while ($data = mysqli_fetch_array($j)) {
		    			if ($data['KelompokID']=="") {
		    	 ?>
		    	 <div class="col-sm-4">
		    	 <table>
		    	 	<tr>
		    	 		<td><input type="checkbox" value="<?php echo $data['NIM'];?>" name="id[]"><?= $data[Nama] ?></td>
		    	 	</tr>
		    	 </table>
		    	 	<input type="hidden" name="Kelompok[]" value="<?= $KelompokID?>">
		    	 </div>
		    	 <?php }else{echo "";} ?>
		    	 <?php } ?>
			    </div>
			  </div>
			  <div class="form-group">
			    <div class="col-sm-offset-2 col-sm-10">
			      <button type="submit" class="btn btn-info" name="Tambah">Simpan</button>
			    </div>
			  </div>
			</form>
		</div>
     </div>
</div>
