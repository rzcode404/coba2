<div class="col-lg-12">
    <div class="panel panel-color panel-danger">
        <div class="panel-heading"> 
            <h3 class="panel-title">Pendaftaran Yang Masuk</h3> 
        </div> 
        <div class="panel-body"> 
        <div class="col-md-9">
          <form method="POST">
            <div class="form-group">
              <div class="col-sm-8">
                <select class="form-control" name="prodi">
                  <option>Pilih Prodi</option>
                  <?php 
                    $sql = mysqli_query($conn, "SELECT * FROM prodi");
                    while($data = mysqli_fetch_array($sql)){
                   ?>
                   <option value="<?= $data['ProdiID']?>"><?= $data['NamaProdi']?></option>
                   <?php } ?>
                </select>
              </div>
            </div>
            <div class="form-group">
              <div class="col-md-3">
                <button name="cari" class="btn btn-info"><i class="fa fa-search"></i>Cari</button>  
              </div>
            </div>
          </form>
        </div><br><br><br><br>
        <?php 
          if(isset($_REQUEST['cari'])){ 
            if ($_REQUEST['prodi']=="26c7f5e9-d38b-d7ce-39cb-046c91fe55be") {
        ?>
        <table class="table table-striped table-bordered" cellspacing="0" width="100%" id="example">
        <thead>
          <tr>
            <th width="12%">#</th>
            <th width="8%">No</th>
            <th>NIM</th>
            <th>Nama</th>
            <th>Nilai Pancasila</th>
            <th>Nilai Introduction To Education</th>
            <th>Nilai Educational Profession</th>
            <th>Status</th>
          </tr>
        </thead>
        <tbody>
          <?php
              $id = $_REQUEST['prodi'];
              $N =1;
              $sql = mysqli_query($conn, "SELECT * FROM mahasiswa AS a LEFT JOIN nilai AS b ON a.NIM=b.NIM LEFT JOIN prodi AS c ON c.ProdiID=a.ProdiID WHERE c.ProdiID='$id' AND Status='Menunggu'");
              while ($data = mysqli_fetch_array($sql)) {
          ?>
          <tr>
            <td>
               <a href="?page=daftar_masuk&daftar_masuk=active&NilaiID=<?= $data['NilaiID']?>&Status=Diterima" class="btn btn-link"><span class="glyphicon glyphicon-check"></span></a>
                <a href="?page=daftar_masuk&daftar_masuk=active&NilaiID=<?= $data['NilaiID']?>&Status=Ditolak" class="btn btn-link"><span class="fa fa-close"></span></a>
              <a href="page/cetak_pendaftar.php?id=<?= $data['NIM']?>" class="btn btn-link" target="_blank"><i class="fa fa-print"></i></a>
            </td>
            <td><?php echo $N++; ?></td>
            <td><?php echo $data['NIM']; ?></td>
            <td><?php echo $data['Nama']; ?></td>
            <td><?php echo $data['IntroductionToEducation']; ?></td>
            <td><?php echo $data['EducationalProfession']; ?></td>
            <td><?php echo $data['ResearchSeminar']; ?></td>
             <td>
              <?php 
                if ($data['Status']=="Menunggu") {
                  echo "<span class='label label-info'>Menuggu</span>";
                }
               ?>
            </td>
          </tr>
          <?php  } ?>
        </table>
        <?php }else if ($_REQUEST['prodi']=="99c7b123-d27b-93de-4f31-f5cb9db5ad80" OR $_REQUEST['prodi']=="b381e661-5b18-4e05-1e97-0b0e6e6507a1") { ?>
          <table class="table table-striped table-bordered" cellspacing="0" width="100%" id="example">
        <thead>
          <tr>
            <th width="12%">#</th>
            <th width="8%">No</th>
            <th>NIM</th>
            <th>Nama</th>
            <th>Nilai Pancasila</th>
            <th>Nilai Pendidikan</th>
            <th>Nilai Profil Tenaga Kerja</th>
            <th>Nilai Metodologi Penelitian</th>
            <th>Nilai PPL1</th>
            <th>Status</th>
          </tr>
        </thead>
        <tbody>
          <?php
              $id = $_REQUEST['prodi'];
              $N =1;
               $sql = mysqli_query($conn, "SELECT * FROM mahasiswa AS a LEFT JOIN nilai AS b ON a.NIM=b.NIM LEFT JOIN prodi AS c ON c.ProdiID=a.ProdiID WHERE c.ProdiID='$id' AND Status='Menunggu'");
              while ($data = mysqli_fetch_array($sql)) {
          ?>
          <tr>
            <td>
              <a href="?page=daftar_masuk&daftar_masuk=active&NilaiID=<?= $data['NilaiID']?>&Status=Diterima" class="btn btn-link"><span class="glyphicon glyphicon-check"></span></a>
              <a href="?page=daftar_masuk&daftar_masuk=active&NilaiID=<?= $data['NilaiID']?>&Status=Ditolak" class="btn btn-link"><span class="fa fa-close"></span></a>
              <a href="page/cetak_pendaftar.php?id=<?= $data['NIM']?>" class="btn btn-link" target="_blank"><i class="fa fa-print"></i></a>
            </td>
            <td><?php echo $N++; ?></td>
            <td><?php echo $data['NIM']; ?></td>
            <td><?php echo $data['Nama']; ?></td>
            <td><?php echo $data['Pancasila/Pend_kewarganegaraan']; ?></td>
            <td><?php echo $data['IlmuPendidikan']; ?></td>
            <td><?php echo $data['ProfilTenagaKerja/ProfesiKeguruan']; ?></td>
            <td><?php echo $data['MetodologiPenelitian/MetodologiPend']; ?></td>
            <td><?php echo $data['PPL1']; ?></td>
            <td>
              <?php 
                if ($data['Status']=="Menunggu") {
                  echo "<span class='label label-info'>Menuggu</span>";
                }
               ?>
            </td>
          </tr>
          <?php  } ?>
        </table>
        <?php }else if($_REQUEST['prodi']=="d9302598-569a-44fa-54a2-8bcf1109ccd3"){ ?>
         <table class="table table-striped table-bordered" cellspacing="0" width="100%" id="example">
        <thead>
          <tr>
            <th width="12%">#</th>
            <th width="8%">No</th>
            <th>NIM</th>
            <th>Nama</th>
            <th>Nilai Pembelajaran</th>
            <th>Nilai Perencanaan Pengajaran MTK</th>
            <th>Nilai Penelitian Hasil Belajar</th>
            <th>Nilai Profesi Kependidikan</th>
            <th>Nilai MTK Sekolah1</th>
            <th>Nilai MTK Sekolah2</th>
            <th>Nilai PPL1</th>
            <th>Status</th>
          </tr>
        </thead>
        <tbody>
          <?php
              $id = $_POST['prodi'];
              $N =1;
               $sql = mysqli_query($conn, "SELECT * FROM mahasiswa AS a LEFT JOIN nilai AS b ON a.NIM=b.NIM LEFT JOIN prodi AS c ON c.ProdiID=a.ProdiID WHERE c.ProdiID='$id' AND Status='Menunggu'");
              while ($data = mysqli_fetch_array($sql)) {
          ?>
          <tr>
            <td>
              <a href="?page=daftar_masuk&daftar_masuk=active&NilaiID=<?= $data['NilaiID']?>&Status=Diterima" class="btn btn-link"><span class="glyphicon glyphicon-check"></span></a>
                <a href="?page=daftar_masuk&daftar_masuk=active&NilaiID=<?= $data['NilaiID']?>&Status=Ditolak" class="btn btn-link"><span class="fa fa-close"></span></a>
              <a href="page/cetak_pendaftar.php?id=<?= $data['NIM']?>" class="btn btn-link" target="_blank"><i class="fa fa-print"></i></a>
            </td>
            <td><?php echo $N++; ?></td>
            <td><?php echo $data['NIM']; ?></td>
            <td><?php echo $data['Nama']; ?></td>
            <td><?php echo $data['BelajarPembelajaran']; ?></td>
            <td><?php echo $data['PerencanaanPengajaranMTK']; ?></td>
            <td><?php echo $data['PenelitianHasilBelajar']; ?></td>
            <td><?php echo $data['ProfesiKependidikan']; ?></td>
            <td><?php echo $data['MTKSekolah1']; ?></td>
            <td><?php echo $data['MTKSekolah2']; ?></td>
            <td><?php echo $data['PPL1']; ?></td>
             <td>
              <?php 
                if ($data['Status']=="Menunggu") {
                  echo "<span class='label label-info'>Menuggu</span>";
                }
               ?>
            </td>
          </tr>
          <?php  } ?>
        </table>
        <?php } ?>

        <?php }?>
    </div>
  </div>
</div>

<?php 
  if (isset($_REQUEST['Status'])) {
    $id = $_REQUEST['NilaiID'];
    $Status = $_REQUEST['Status'];

    $Update = mysqli_query($conn, "UPDATE nilai SET 
                                                    Status='$Status'
                                                WHERE NilaiID='$id'");
    echo "<script>document.location='?page=daftar_masuk&daftar_masuk=active'</script>";
  }

 ?>