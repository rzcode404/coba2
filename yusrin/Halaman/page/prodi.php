<div class="col-lg-12">
    <div class="panel panel-color panel-primary">
        <div class="panel-heading"> 
            <h3 class="panel-title">Master Prodi</h3> 
        </div> 
        <div class="panel-body"> 
        <?php include 'ac/lib_prodi.php'; ?>
        	<button onclick="document.location='?page=add_prodi&add_prodi=active'" class="btn btn-primary"><span class="glyphicon glyphicon-plus"></span> Tambah master Prodi</button><br><br>
        	<table class="table table-striped table-bordered" cellspacing="0" width="100%" id="example">
				<thead>
					<tr>
						<th width="12%">#</th>
						<th width="8%">Fakultas</th>
						<th width="8%">Nama Prodi</th>
					</tr>
				</thead>
				<tbody>
					<?php
					  $sql = mysqli_query($conn,"SELECT * FROM prodi AS a LEFT JOIN fakultas AS b ON a.FakultasID=b.FakultasID");
					  while ($data = mysqli_fetch_array($sql)) {
			        ?>
					<tr>
						<td>
							<a href="?page=add_prodi&prodi=active&ProdiID=<?php echo $data['ProdiID']; ?>" class="btn btn-link"><span class="glyphicon glyphicon-edit"></span></a>
							<a href="?page=prodi&prodi=active&ProdiID=<?php echo $data['ProdiID']; ?>&Hapus=True" class="btn btn-link"><span class="glyphicon glyphicon-trash"></span></a>
						</td>
						<td><?php echo $data['NamaFakultas']; ?></td>
						<td><?php echo $data['NamaProdi']; ?></td>
						
					</tr>
					<?php } ?>
				</table>
		</div>
     </div>
</div>