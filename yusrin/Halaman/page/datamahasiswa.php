<?php 
include 'ac/lib_fakultas.php';
?>
<div class="col-lg-12">
    <div class="panel panel-color panel-danger">
        <div class="panel-heading"> 
            <h3 class="panel-title">Daftar Data Mahasiswa PPL Unipdu</h3> 
        </div> 
        <div class="panel-body"> 
          <button onclick="document.location='?page=add_mahasiswa&datamahasiswa=active'" class="btn btn-danger"><span class="glyphicon glyphicon-plus"></span> Tambah Data Mahasiswa</button><br><br>
          <table class="table table-striped table-bordered" cellspacing="0" width="100%" id="example">
        <thead>
          <tr>
            <th width="12%">#</th>
            <th width="8%">No</th>
            <th>NIM</th>
            <th>Nama</th>
            <th>Nama Prodi</th>
            <th>Status Akun</th>
          </tr>
        </thead>
        <tbody>
          <?php
                $No = 1;
                $sql = mysqli_query($conn, "SELECT * FROM mahasiswa LEFT JOIN prodi ON mahasiswa.ProdiID=prodi.ProdiID LEFT JOIN login AS c ON mahasiswa.NIM=c.Username");
                while ($data = mysqli_fetch_array($sql)) {
              ?>
          <tr>
            <td>
              <a href="?page=profile&profile=active&NIM=<?= $data['NIM']?>" class="btn btn-link"><span class="glyphicon glyphicon-search"></span></a>
              <?php 
                if ($data['Status']=="Aktif") {
                  echo "<a href='?page=datamahasiswa&datamahasiswa=active&nim=".$data['Username']."&Matikan=Tidak' class='btn btn-danger'><i class='fa fa-close'></i></a>";
                }else{
                  echo "<a href='?page=datamahasiswa&datamahasiswa=active&nim=".$data['Username']."&Hidupkan=Aktif' class='btn btn-success'><i class='fa fa-check'></i></a>";
                }
               ?>
            </td>
            <td><?php echo $No++; ?></td>
            <td><?php echo $data['NIM']; ?></td>
            <td><?php echo $data['Nama']; ?></td>
            <td><?php echo $data['NamaProdi']; ?></td>
            <td>
              <?php
                  if ($data['Status']=="Aktif") {
                    echo "<span class='label label-success'>Aktif<span/>";
                  }else{
                    echo "<span class='label label-danger'>Tidak Aktif<span/>"; 
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
    $nim     = $_REQUEST['nim'];
    $Matikan = $_REQUEST['Matikan'];
    $Mati    = mysqli_query($conn, "UPDATE login SET
                                                    Status='$Matikan'
                                                WHERE 
                                                    Username='$nim'");
    echo "<script>
            document.location='?page=datamahasiswa&datamahasiswa=active'
          </script>";
  }elseif (isset($_REQUEST['Hidupkan'])) {
    $nim      = $_REQUEST['nim'];
    $Hidupkan = $_REQUEST['Hidupkan'];
    $Hidup    = mysqli_query($conn, "UPDATE login SET
                                                    Status='$Hidupkan'
                                                  WHERE 
                                                    Username='$nim'");
    echo "<script>
            document.location='?page=datamahasiswa&datamahasiswa=active'
          </script>";
  }

 ?>