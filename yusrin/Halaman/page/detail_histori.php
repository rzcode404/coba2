<div class="col-lg-12">
	<div class="panel panel-color panel-danger">
		<div class="panel-heading">
			<h3 class="panel-title">Data Profile Pembimbing PPL Unipdu</h3>
		</div>
		<div class="panel-body">
		<div class="col-md-12">
		 <form method="POST">
            <div class="form-group">
            <div class="col-sm-2"></div>
              <div class="col-sm-5">
                <select class="form-control" name="kelompok">
                  <option>Pilih Nama Kelompok</option>
                  <?php 
                    $sql = mysqli_query($conn, "SELECT * FROM kelompok");
                    while($data = mysqli_fetch_array($sql)){
                   ?>
                   <option value="<?= $data['NamaKelompok']?>"><?= $data['NamaKelompok']?></option>
                   <?php } ?>
                </select>
              </div>
            </div>
            <div class="form-group">
              <div class="col-md-3">
                <button name="cari" class="btn btn-info"><i class="fa fa-search"></i>Cari</button>  
              </div>
            </div>
          </form><br><br>
          <?php 
          	if (isset($_REQUEST['cari'])) {
          		$kelompok = $_REQUEST['kelompok'];
          		$query = mysqli_query($conn, "SELECT * FROM kelompok AS a LEFT JOIN histori AS b ON a.KelompokID=b.KelompokID WHERE a.NamaKelompok='$kelompok'");
          		while($df = mysqli_fetch_array($query)){
           ?>
				<table width="100%">
					<tr>
						<td width="12%">Nama Kelompok</td>
						<td width="3px">:</td>
						<td><input type="text" disabled class="form-control" value="<?php echo $df['NamaKelompok'];?>"></td>
						<td width="4%"></td>
						<td width="12%">Tempat PPL</td>
						<td width="3px">:</td>
						<td><input type="text"  class="form-control" disabled value="<?= $df['TempatPPL']?>"></td>
					</tr>
					<tr>
						<td width="12%">Tahu Akademik</td>
						<td width="3px">:</td>
						<td><input disabled class="form-control" value="<?php echo $df['TahunAkademik']; ?>"></td>
						<td width="4%"></td>
						<td width="12%">Keterangan</td>
						<td width="3px">:</td>
						<td><textarea disabled class="form-control"><?php echo $df['Keterangan']; ?></textarea></td>
					</tr>
				</table><br><br>
				<img src="upload/<?php echo $df['Foto'] ?>" width="300px">
				<img src="upload/<?php echo $df['Foto2'] ?>" width="300px">
				<img src="upload/<?php echo $df['Foto3'] ?>" width="300px">
				<?php } }?>
			</div>
		</div>
	</div>
</div>