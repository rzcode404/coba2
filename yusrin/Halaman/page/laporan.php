<div class="col-lg-12">
    <div class="panel panel-color panel-danger">
        <div class="panel-heading"> 
            <h3 class="panel-title">Lihat Laporan</h3> 
        </div> 
        <div class="panel-body"> 
          <table class="table table-striped table-bordered" cellspacing="0" width="100%" id="example">
        <thead>
          <tr>
            <th width="8%">No</th>
            <th>Nama Kelompok</th>
            <th>FILE</th>
            <th>Komentar</th>
          </tr>
        </thead>
        <tbody>
          <?php
                $No = 1;
                $sql = mysqli_query($conn, "SELECT * FROM laporan AS a LEFT JOIN kelompok AS b ON a.KelompokID=b.KelompokID WHERE b.PembimbingID='$ID'");
                while ($data = mysqli_fetch_array($sql)) {
              ?>
          <tr>
            <td><?php echo $No++; ?></td>
            <td><?php echo $data['NamaKelompok']; ?></td>
            <td><?php echo "<a href='./file/".$data['File']."'>Download</a>"; ?></td>
            <td>
              <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne" class="btn btn-info">
                Komentar
              </a>

              <div id="collapseOne" class="panel-collapse collapse">
                <div class="panel-body">
                  <form method="post">
                    <input type="hidden" name="id" value="<?= $data['LaporanID']?>">
                    <textarea class="form-control" name="komen"><?php echo $data['Komentar'];?></textarea><br>
                    <button name='Kirim' class="btn btn-info">Kirim</button>
                  </form>
                </div>
              </div>
            </td>
          </tr>
          <?php  }?>
        </table>
    </div>
  </div>
</div>
<?php 
  if (isset($_REQUEST['Kirim'])) {
    $id    = $_REQUEST['id'];
    $komen = $_REQUEST['komen'];

    $Komen = mysqli_query($conn, "UPDATE laporan SET 
                                                    Komentar='$komen'
                                                  WHERE 
                                                    LaporanID='$id'");
    echo "<meta http-equiv='refresh' content='0'>";
  }
 ?>