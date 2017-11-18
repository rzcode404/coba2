<?php
	if ($_SESSION['hak_akses']=="uptppl") {
	 	$NIM = $_REQUEST['NIM'];
	 	$sql = mysqli_query($conn,"SELECT * FROM mahasiswa AS a LEFT JOIN login AS b ON a.NIM=b.Username LEFT JOIN prodi AS c ON a.ProdiID=c.ProdiID WHERE a.NIM='$NIM'");
	}else if ($_SESSION['hak_akses']=="mahasiswa") {
		$NIM = $ID;
		$sql = mysqli_query($conn,"SELECT * FROM mahasiswa AS a LEFT JOIN login AS b ON a.NIM=b.Username LEFT JOIN prodi AS c ON a.ProdiID=c.ProdiID WHERE a.NIM='$NIM'");
	}
	$dt  = mysqli_fetch_array($sql);
?>
<div class="col-lg-12">
	<div class="panel panel-color panel-danger">
		<div class="panel-heading">
			<h3 class="panel-title">Data Profile Mahasiswa PPL Unipdu</h3>
		</div>
		<div class="panel-body">
			
			<div class="col-sm-2">
				<h3 class="panel-title">
				<img id="img" src="./upload/<?php echo $dt[Foto];?>" width="100%">
				</h3>
			</div>
			<div class="col-md-10">
				<table width="100%">
					<tr>
						<td width="12%">NIM</td>
						<td width="3px">:</td>
						<td><input type="text" disabled class="form-control" value="<?php echo $dt[NIM];?>"></td>
						<td width="4%"></td>
						<td width="12%">Nama</td>
						<td width="3px">:</td>
						<td><input type="text"  class="form-control" disabled value="<?= $dt['Nama']?>"></td>
					</tr>
					<tr>
						<td width="12%">Alamat</td>
						<td width="3px">:</td>
						<td><textarea disabled class="form-control"><?php echo $dt['Alamat']; ?></textarea></td>
						<td width="4%"></td>
						<td width="12%">Nama Prodi</td>
						<td width="3px">:</td>
						<td><input type="text"  class="form-control" disabled value="<?= $dt[NamaProdi]?>"></td>
					</tr>
					<tr>
						<td width="12%">Username</td>
						<td width="3px">:</td>
						<td><input disabled class="form-control" value="<?php echo $dt['Username']; ?>"></td>	
						<td width="4%"></td>
						<td width="12%">No.Telp</td>
						<td width="3px">:</td>
						<td><input type="text"  class="form-control" disabled value="<?= $dt['No.Telp']?>"></td>
					</tr>
					<tr>
						<td width="12%">Password</td>
						<td width="3px">:</td>
						<td><input type="text"  class="form-control" disabled value="<?= $dt[Password]?>"></td>
					</tr>
				</table><br><br>
				<a class="btn btn-primary" href="?page=edit_profil&id=<?= $dt['NIM']?>">Update Profile</a>
			</div>
		</div>
	</div>
</div>
