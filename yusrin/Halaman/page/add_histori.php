<?php 
	$ID = $_REQUEST['HistoriID'];
	$sql = mysqli_query($conn, "SELECT * FROM histori AS a LEFT JOIN kelompok AS b ON a.KelompokID=b.KelompokID WHERE HistoriID='$ID'");
	$g =  mysqli_fetch_array($sql);
	$foto1 ="<img src='upload/".$g['Foto']."' width='200px'>";
	$foto2 ="<img src='upload/".$g['Foto2']."' width='200px'>";
	$foto3 ="<img src='upload/".$g['Foto3']."' width='200px'>";
 ?>
<div class="col-lg-12">
    <div class="panel panel-color panel-danger">
        <div class="panel-heading"> 
            <h3 class="panel-title">Tambah Histori Kelompok PPL Unipdu</h3> 
        </div> 
        <div class="panel-body"> 
        	<button onclick="document.location='?page=fakultas&fakultas=active'" class="btn btn-success"><span class="ion-arrow-left-c"></span> Kembali kehalaman awal</button><br><br>
        	<?php include 'ac/lib_histori.php'; ?>
			<form class="form-horizontal" enctype="multipart/form-data" method="POST" role="form">
			  <div class="form-group">
			    <label for="inputEmail3" class="col-sm-2 control-label">Nama Kelompok</label>
			    <div class="col-sm-10">
			      <select class="form-control" name="kelompok" onchange="otomatis()" id="KelompokID">
			      	<option>Pilih Kelompok</option>
			      	<?php 
			      		$sql = mysqli_query($conn, "SELECT * FROM kelompok");
			      		while($f = mysqli_fetch_array($sql)){
			      	 ?>
			      	<option value="<?php echo $f['KelompokID'];?>"<?php if($f['KelompokID']==$g['KelompokID']){echo "selected";} ?>><?= $f['NamaKelompok']?></option>
			      	<?php } ?>
			      </select>
			    </div>
			  </div>
			  <div class="form-group">
			    <label for="inputPassword3" class="col-sm-2 control-label">Tempat PPL</label>
			    <div class="col-sm-10">
			      <input type="text" class="form-control" value="<?= $g['TempatPPL']?>" id="tempat" disabled>
			    </div>
			  </div>
			  <div class="form-group">
			    <label for="inputPassword3" class="col-sm-2 control-label">Tahun Akademik</label>
			    <div class="col-sm-10">
			      <input type="text" value="<?= $g['TahunAkademik']?>" class="form-control" id="tahun" disabled>
			    </div>
			  </div>
			  <div class="form-group">
			    <label for="inputPassword3" class="col-sm-2 control-label">Keterangan</label>
			    <div class="col-sm-10">
			      <textarea name="keterangan" class="form-control"><?php echo $g['Keterangan']; ?></textarea>
			    </div>
			  </div>
			  <div class="form-group">
			    <label for="inputPassword3" class="col-sm-2 control-label">Foto1</label>
			    <div class="col-sm-10">
			    <?php echo $foto1; ?>
			      <input type="file" class="form-control" name="foto1" value="<?= $g['Foto']?>">
			    </div>
			  </div>
			   <div class="form-group">
			    <label for="inputPassword3" class="col-sm-2 control-label">Foto2</label>
			    <div class="col-sm-10">
			    <?php echo $foto2; ?>
			      <input type="file" class="form-control" name="foto2"  value="<?= $g['Foto2']?>">
			    </div>
			  </div>
			   <div class="form-group">
			    <label for="inputPassword3" class="col-sm-2 control-label">Foto3</label>
			    <div class="col-sm-10">
			    <?php echo $foto3; ?>
			      <input type="file" class="form-control" name="foto3"  value="<?= $g['Foto3']?>">
			    </div>
			  </div>
			  <div class="form-group">
			    <div class="col-sm-offset-2 col-sm-10">
			      <button type="submit" <?php if($ID){echo "name='Update'";}else{echo "name='Simpan'";} ?> class="btn btn-success"><?php if($ID){echo "Update";}else{echo "Simpan";} ?></button>
			    </div>
			  </div>
			</form>
		</div>
     </div>
</div>
<script type="text/javascript">
  function otomatis(){
    var KelompokID = $("#KelompokID").val();
    $.ajax({
      url: "http://127.0.0.1/yusrin/halaman/page/ac/histori.php",
      type: "POST",
      dataType:"json",
      data: {'KelompokID':KelompokID} ,
    success: function (data) {
    console.log(data);
     $("#tempat").val(data[0].TempatPPL);    
     $("#tahun").val(data[0].TahunAkademik);    
    }
  });
}
</script>