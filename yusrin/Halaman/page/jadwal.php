<div class="col-lg-12">
    <div class="panel panel-color panel-danger">
        <div class="panel-heading"> 
            <h3 class="panel-title">Data Jadwal Ujian</h3> 
        </div> 
        <div class="panel-body"> 
          <button onclick="document.location='?page=add_jadwal&jadwal=active'" class="btn btn-danger"><span class="glyphicon glyphicon-plus"></span>Jadwal Ujian</button><br><br>
          <table class="table table-striped table-bordered" cellspacing="0" width="100%" id="example">
        <thead>
          <tr>
            <th width="12%">#</th>
            <th width="8%">No</th>
            <th>Nama Penguji1</th>
            <th>Kontak1</th>
            <th>Nama Penguji2</th>
            <th>Kontak2</th>
            <th>Hari</th>
            <th>Tgl Ujian</th>
            <th>Jam</th>
            <th>Nama Kelompok</th>
          </tr>
        </thead>
        <tbody>
          <?php
                $No = 1;
                $sql = mysqli_query($conn, "SELECT * FROM jadwal AS a LEFT JOIN kelompok AS b ON a.KelompokID=b.KelompokID");
                while ($data = mysqli_fetch_array($sql)) {
              ?>
          <tr>
            <td>
              <a href="?page=add_jadwal&jadwal=active&id=<?php echo $data['id_jadwal']; ?>" class="btn btn-link"><span class="glyphicon glyphicon-edit"></span></a>
            </td>
            <td><?php echo $No++; ?></td>
            <td><?php echo $data['nama_penguji 1']; ?></td>
            <td><?php echo $data['kontak1']; ?></td>
            <td><?php echo $data['nama_penguji2']; ?></td>
            <td><?php echo $data['kontak2']; ?></td>
            <td><?php echo $data['hari']; ?></td>
            <td><?php echo $data['tgl_ujian']; ?></td>
            <td><?php echo $data['jam']; ?></td>
            <td><?php echo $data['NamaKelompok']; ?></td>
          </tr>
          <?php  }?>
        </table>
    </div>
     </div>
</div>