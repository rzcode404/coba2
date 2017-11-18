
<div class="col-lg-12">
    <div class="panel panel-color panel-danger">
        <div class="panel-heading"> 
            <h3 class="panel-title">Laporan Review</h3> 
        </div> 
        <div class="panel-body"> 
          <div class="form-group">
            <label class="col-md-2">Laporan Review</label>
            <div class="col-md-10">
            <?php 
              $sql = mysqli_query($conn, "SELECT * FROM laporan AS a LEFT JOIN kelompok AS b ON a.KelompokID=b.KelompokID LEFT JOIN mahasiswa AS c ON b.KelompokID=c.KelompokID WHERE c.NIM='$ID'");
              $df = mysqli_fetch_array($sql);
             ?>
              <textarea class="form-control" disabled><?php echo $df['Komentar']; ?></textarea>  
            </div>
          </div>
    </div>
  </div>
</div>