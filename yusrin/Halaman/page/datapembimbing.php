<?php 
include 'ac/lib_fakultas.php';
?>
<div class="col-lg-12">
    <div class="panel panel-color panel-danger">
        <div class="panel-heading"> 
            <h3 class="panel-title">Daftar Data Pembimbing PPL Unipdu</h3> 
        </div> 
        <div class="panel-body"> 
          <button onclick="document.location='?page=add_pembimbing&pembimbing=active'" class="btn btn-danger"><span class="glyphicon glyphicon-plus"></span> Tambah master Pembimbing</button><br><br>
          <table class="table table-striped table-bordered" cellspacing="0" width="100%" id="example">
        <thead>
          <tr>
            <th width="12%">#</th>
            <th width="8%">No</th>
            <th>Nama Pembimbing</th>
            <th>Alamat</th>
            <th>Kontak</th>
            <th>Status</th>
          </tr>
        </thead>
        <tbody>
          <?php
                $No = 1;
                $sql = mysqli_query($conn, "SELECT * FROM pembimbing AS a LEFT JOIN login AS b ON a.PembimbingID=b.Username");
                while ($data = mysqli_fetch_array($sql)) {
              ?>
          <tr>
            <td>
              <a href="?page=detail_pembimbing&datapembimbing=active&PembimbingID=<?php echo $data['PembimbingID']; ?>" class="btn btn-link"><span class="glyphicon glyphicon-search"></span></a>
              <?php 
                if ($data['Status']=="Aktif") {
                  echo "<a href='?page=datapembimbing&id=".$data['Username']."&Matikan=Tidak' class='btn btn-success'>Matikan</a>";
                }else{
                  echo "<a href='?page=datapembimbing&id=".$data['Username']."&Hidupkan=Aktif' class='btn btn-danger'>Hidupkan</a>";
                }
               ?>
            </td>
            <td><?php echo $No++; ?></td>
            <td><?php echo $data['Nama']; ?></td>
            <td><?php echo $data['Alamat']; ?></td>
            <td><?php echo $data['Kontak']; ?></td>
            <td>
              <?php
                if ($data['Status']=="Aktif") {
                  echo "<span class='label label-success'>Aktif</span>";
                }else{
                  echo "<span class='label label-danger'>Tidak Aktif</span>";
                }
               ?>
            </td>
          </tr>
          <?php  }?>
        </table>
    </div>
  </div>
</div>

<?php 
  if (isset($_REQUEST['Matikan'])) {
    $id      = $_REQUEST['id'];
    $Matikan = $_REQUEST['Matikan'];

    $Matikan = mysqli_query($conn, "UPDATE login SET 
                                                    Status='$Matikan'
                                                  WHERE 
                                                    Username='$id'");
    echo "<script>
            document.location='?page=datapembimbing&datapembimbing=active'
          </script>";
  }
  if (isset($_REQUEST['Hidupkan'])) {
    $id = $_REQUEST['id'];
    $Hidup = $_REQUEST['Hidupkan'];
    $Hidupkan = mysqli_query($conn, "UPDATE login SET 
                                                    Status='$Hidup'
                                                  WHERE 
                                                    Username='$id'");
    echo "<script>
            document.location='?page=datapembimbing&datapembimbing=active'
          </script>";
  }
 ?>