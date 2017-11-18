<div class="col-lg-12">
  <div class="panel panel-color panel-danger">
    <div class="panel-heading">
      <h3 class="panel-title">Setting Kelompok PPL Unipdu</h3>
    </div>
    <div class="panel-body">
      <table class="table table-striped table-bordered" cellspacing="0" width="100%" id="example">
        <thead>
          <tr>
            <th width="8%">No</th>
            <th>Tempat PPL</th>
            <th>Dosen Pembimbing</th>
            <th>Jml. Peserta</th>
            <th>L</th>
            <th>P</th>
            <th>Lihat</th>
          </tr>
        </thead>
        <tbody>
          <?php
            $N =1;
            if($_SESSION['hak_akses']=="uptppl"){
                $result = mysqli_query($conn,"SELECT * FROM kelompok as a 
                                LEFT JOIN pembimbing as b 
                                ON a.PembimbingID=b.PembimbingID"); 
              }elseif($_SESSION['hak_akses']=="pembimbing"){
                $PembimbingID = $ID;
                $result = mysqli_query($conn,"SELECT * FROM kelompok as a 
                                  LEFT JOIN pembimbing as b 
                                  ON a.PembimbingID=b.PembimbingID WHERE a.PembimbingID='$ID'");
              }else{
                $Nim = $ID;
                $result = mysqli_query($conn,"SELECT a.*, c.* FROM kelompok as a 
                                  LEFT JOIN mahasiswa as b 
                                  ON a.KelompokID=b.KelompokID LEFT JOIN pembimbing AS c ON a.PembimbingID=c.PembimbingID WHERE b.NIM='$ID'");
              }  
              while ($data=mysqli_fetch_array($result)) {
                $j=mysqli_query($conn,"SELECT count(NIM) as Jumlah FROM mahasiswa WHERE KelompokID='$data[KelompokID]'");
                $d=mysqli_fetch_array($j);
                // ---------------------------------------------------------
                $jk=mysqli_query($conn,"SELECT count(NIM) as Jumlah FROM mahasiswa WHERE KelompokID='$data[KelompokID]' AND Jk='L'");
                $cjk=mysqli_fetch_array($jk);
                // ------------------------------------------------------------
                $jkp=mysqli_query($conn,"SELECT count(NIM) as Jumlah FROM mahasiswa WHERE KelompokID='$data[KelompokID]' AND Jk='P'");
                $cjkp=mysqli_fetch_array($jkp);
          ?>
          <tr>
            <td><?php echo $N++; ?></td>
            <td><?php echo $data['TempatPPL']; ?></td>
            <td><?php echo $data['Nama']; ?></td>
            <td><span class="label label-success"><?php echo $d['Jumlah'];?></span></td>
            <td><span class="label label-success"><?php echo $cjk['Jumlah'];?></span></td>
            <td><span class="label label-success"><?php echo $cjkp['Jumlah'];?></span></td>
            <td>
              <a href="?page=detail_kelompok&set_kelompok=active&KelompokID=<?php echo $data['KelompokID']; ?>" class="btn btn-danger"><i class="fa fa-eye"></i></a>
            </td>
          </tr>
          <?php  }?>
        </table>
    </div>
  </div>
</div>