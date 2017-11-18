<?php
	if ($_SESSION['hak_akses']=="uptppl") {
	 	$PembimbingID = $_REQUEST['PembimbingID'];
	 	$sql = mysqli_query($conn,"SELECT * FROM pembimbing AS a LEFT JOIN login AS b ON a.PembimbingID=b.Username WHERE a.PembimbingID='$PembimbingID'");
	}else if ($_SESSION['hak_akses']=="pembimbing") {
		$PembimbingID = $ID;
		$sql = mysqli_query($conn,"SELECT * FROM pembimbing AS a LEFT JOIN login AS b ON a.PembimbingID=b.Username WHERE a.PembimbingID='$PembimbingID'");
	}
	$dt  = mysqli_fetch_array($sql);
	$ID  = substr($dt['PembimbingID'], 0, 11);
?>
<div class="col-lg-12">
	<div class="panel panel-color panel-danger">
		<div class="panel-heading">
			<h3 class="panel-title">Data Profile Pembimbing PPL Unipdu</h3>
		</div>
		<div class="panel-body">
			<div class="col-md-12">
				<table width="100%">
					<tr>
						<td width="12%">NIPY</td>
						<td width="3px">:</td>
						<td><input type="text" disabled class="form-control" value="<?php echo $ID;?>"></td>
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
						<td width="12%">Username</td>
						<td width="3px">:</td>
						<td><input disabled class="form-control" value="<?php echo $dt['Username']; ?>"></td>
					</tr>
					<tr>
						<td width="12%">No.Telp</td>
						<td width="3px">:</td>
						<td><input type="text"  class="form-control" disabled value="<?= $dt['Kontak']?>"></td>
						<td width="4%"></td>
						<td width="12%">Password</td>
						<td width="3px">:</td>
						<td><input type="text"  class="form-control" disabled value="<?= $dt[Password]?>"></td>
					</tr>
				</table><br><br>
				<a class="btn btn-primary" href="?page=add_pembimbing&PembimbingID=<?= $dt['PembimbingID']?>">Update Profile</a>
			</div>
		</div>
	</div>
</div>
