<div class="col-lg-12">
    <div class="panel panel-color panel-danger">
        <div class="panel-heading"> 
            <h3 class="panel-title">Data Kelompok PPL Unipdu</h3> 
        </div> 
        <div class="panel-body"> 
          <button onclick="document.location='?page=add_kelompok&datakelompok=active'" class="btn btn-danger"><span class="glyphicon glyphicon-plus"></span> Tambah master Kelompok</button><br><br>
          <table class="table table-striped table-bordered" cellspacing="0" width="100%" id="example">
        <thead>
          <tr>
            <th width="12%">#</th>
            <th width="8%">No</th>
            <th>Nama Pembimbing</th>
            <th>Tempat PPL</th>
            <th>Tahun Akademik</th>
          </tr>
        </thead>
        <tbody>
          <?php
                $N =1;
                $sql = mysqli_query($conn, "SELECT * FROM kelompok AS a LEFT JOIN pembimbing AS b ON a.PembimbingID=b.PembimbingID");
                while ($data = mysqli_fetch_array($sql)) {
              ?>
          <tr>
            <td>
              <a href="?page=add_kelompok&datakelompok=active&KelompokID=<?php echo $data['KelompokID']; ?>" class="btn btn-link"><span class="glyphicon glyphicon-edit"></span></a>
            </td>
            <td><?php echo $N++; ?></td>
            <td><?php echo $data['Nama']; ?></td>
            <td><?php echo $data['TempatPPL']; ?></td>
            <td><?php echo $data['TahunAkademik']; ?></td>
          </tr>
          <?php  }?>
        </table>
    </div>
     </div>
</div>