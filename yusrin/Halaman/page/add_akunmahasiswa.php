<div class="col-lg-12">
    <div class="panel panel-color panel-danger">
        <div class="panel-heading"> 
            <h3 class="panel-title">Tambah Akun Mahasiswa PPL Unipdu</h3> 
        </div> 
        <div class="panel-body"> 
        	<button onclick="document.location='?page=datamahasiswa&datamahasiswa=active'" class="btn btn-success"><span class="ion-arrow-left-c"></span> Kembali kehalaman awal</button><br><br>
        	<?php include 'ac/lib_akunmahasiswa.php'; ?>
			<form class="form-horizontal" action="" method="POST" role="form">
			  <div class="form-group">
			    <label for="inputEmail3" class="col-sm-2 control-label">Username</label>
			    <div class="col-sm-10">
			      <input type="number" onkeyup="otomatis()" class="form-control" name="Kode" id="Kode" placeholder="Masukkan Username dengan Nim">
			    </div>
			  </div>
			  <input type="hidden" class="form-control"  name="fakultas" id="f" placeholder="Nama Fakultas">
			  <input type="hidden" class="form-control"  name="prodi" id="p" placeholder="Nama Prodi">
			  <div class="form-group">
			    <label for="inputPassword3" class="col-sm-2 control-label">Password</label>
			    <div class="col-sm-10">
			      <input type="password" name="password" class="form-control" required placeholder="Masukkan Password Mahasiswa">
			    </div>
			  </div>
			  <div class="form-group">
			    <label for="inputPassword3" class="col-sm-2 control-label">Nama</label>
			    <div class="col-sm-10">
			      <input type="text" name="nama" class="form-control" placeholder="Masukkan Nama Mahasiswa" required>
			    </div>
			  </div>
			  <div class="form-group">
			    <div class="col-sm-offset-2 col-sm-10">
			      <button type="submit" class="btn btn-success" name="Simpan">Simpan</button>
			    </div>
			  </div>
			</form>
		</div>
     </div>
</div>
<script type="text/javascript">
  function otomatis(){
    var Kode = $("#Kode").val();
    console.log(Kode.length)
    console.log(Kode)
  	if (Kode.length == 2) {
    $.ajax({
      url: "http://127.0.0.1/yusrin/Halaman/page/ac/akunmahasiswa.php",
      type: "POST",
      dataType:"json",
      data: {'Kode':Kode} ,
    success: function (data) {
    console.log(data);    
     $("#p").val(data[0].ProdiID);        
     $("#f").val(data[0].NamaFakultas);        
    }
  });
  		
  }
}
</script>