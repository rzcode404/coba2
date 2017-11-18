<?php 
include 'ac/lib_fakultas.php';
?>
<div class="col-lg-12">
    <div class="panel panel-color panel-danger">
        <div class="panel-heading"> 
            <h3 class="panel-title">Data Histori</h3> 
        </div> 
        <div class="panel-body"> 
        	<button onclick="document.location='index.php?page=add_histori&histori=active'" class="btn btn-danger"><span class="glyphicon glyphicon-plus"></span> Tambah Histori</button><br><br>
        	<table class="table table-striped table-bordered" cellspacing="0" width="100%" id="example">
				<thead>
					<tr>
						<th width="12%">#</th>
						<th width="8%">No</th>
						<th>Nama Kelompok</th>
						<th>Tempat PPL</th>
						<th>Tahun Akademik</th>
						<th>Keterangan</th>
					</tr>
				</thead>
				<tbody>
					<?php
						$no = 1;
			         	$sql = mysqli_query($conn, "SELECT * FROM histori LEFT JOIN Kelompok ON histori.KelompokID=kelompok.KelompokID");
			         	while ($data = mysqli_fetch_array($sql)) {
			        ?>
					<tr>
						<td>
							<a href="?page=add_histori&histori=active&HistoriID=<?php echo $data['HistoriID']; ?>" class="btn btn-link"><span class="glyphicon glyphicon-edit"></span></a>
							<a href="?page=add_histori&histori=active&HistoriID=<?php echo $data['HistoriID']; ?>" class="btn btn-link"><span class="glyphicon glyphicon-search"></span></a>
						</td>
						<td><?php echo $no++; ?></td>
						<td><?php echo $data['NamaKelompok']; ?></td>
						<td><?php echo $data['TempatPPL']; ?></td>
						<td><?php echo $data['TahunAkademik']; ?></td>
						<td><?php echo $data['Keterangan']; ?></td>
					</tr>
					<?php  }?>
				</table>
		</div>
     </div>
</div>