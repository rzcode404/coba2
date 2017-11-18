<?php 
include 'ac/lib_fakultas.php';
?>
<div class="col-lg-12">
    <div class="panel panel-color panel-danger">
        <div class="panel-heading"> 
            <h3 class="panel-title">Daftar Fakultas PPL Unipdu</h3> 
        </div> 
        <div class="panel-body"> 
        	<button onclick="document.location='?page=add_fakultas&fakultas=active'" class="btn btn-danger"><span class="glyphicon glyphicon-plus"></span> Tambah master fakultas</button><br><br>
        	<table class="table table-striped table-bordered" cellspacing="0" width="100%" id="example">
				<thead>
					<tr>
						<th width="12%">#</th>
						<th width="8%">Kode</th>
						<th>Nama Fakultas</th>
					</tr>
				</thead>
				<tbody>
					<?php
			         	$sql = mysqli_query($conn, "SELECT * FROM fakultas");
			         	while ($data = mysqli_fetch_array($sql)) {
			        ?>
					<tr>
						<td>
							<a href="?page=add_fakultas&fakultas=active&FakultasID=<?php echo $data['FakultasID']; ?>" class="btn btn-link"><span class="glyphicon glyphicon-edit"></span></a>
							<a href="?page=fakultas&fakultas=active&FakultasID=<?php echo $data['FakultasID']; ?>&Hapus=True" class="btn btn-link"><span class="glyphicon glyphicon-trash"></span></a>
						</td>
						<td><?php echo $data['KodeFakultas']; ?></td>
						<td><?php echo $data['NamaFakultas']; ?></td>
					</tr>
					<?php  }?>
				</table>
		</div>
     </div>
</div>