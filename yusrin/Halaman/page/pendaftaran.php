<?php 
$NIM = $ID;
$j=mysqli_query($conn," SELECT * FROM mahasiswa as a LEFT JOIN prodi as b 
						ON a.ProdiID=b.ProdiID LEFT JOIN fakultas as c 
						ON b.FakultasID=c.FakultasID WHERE a.NIM='$ID'");
$data = mysqli_fetch_array($j);
?>
<div class="col-lg-12">
    <div class="panel panel-color panel-success">
        <div class="panel-heading"> 
            <h3 class="panel-title">PENDAFTARAN PPL Unipdu</h3> 
        </div> 
        <div class="panel-body"> 
        	<?php 
                if ($data['NamaProdi']=="") {
                    echo "LENGKAPI PROFILE ANDA TERLEBIH DAHULU";
                }else{
        		if($data['NamaProdi']=="Pend. Bahasa Inggris"){ 
        			include "pendaftar/aksi_daftar.php";
        	?>
        	<form method="POST" enctype="multipart/form-data">
        		<?php 
        			$sql = mysqli_query($conn, "SELECT * FROM nilai WHERE NIM='$NIM'");
        			$t   = mysqli_fetch_array($sql);
        			if($t['Pancasila/Pend_kewarganegaraan']==""){
        		 ?>
        		<div class="form-group">
        			<label class="col-sm-3">Pancasila/Pend. Kewarganegaraan</label>
        			<div class="col-md-9">
        				<select class="form-control" name="pkn">
        					<option>Pilih Nilai</option>
        					<option value="A">A</option>
        					<option value="A-">A-</option>
        					<option value="B+">B+</option>
        					<option value="B">B</option>
        					<option value="B-">B-</option>
        					<option value="C+">C+</option>
        					<option value="C">C</option>
        					<option value="C-">C-</option>
        					<option value="D+">D+</option>
        					<option value="D">D</option>
        					<option value="D-">D-</option>
        					<option value="E">E</option>
        				</select>
        			</div><br><br>
        		</div>
        		<div class="form-group">
        			<label class="col-sm-3"></label>
        			<div class="col-md-9">
        				<button class="btn btn-success" name="Daftar1">Selanjutnya</button>
        			</div><br><br>
        		</div>
        		<?php }else if($t['IntroductionToEducation']==""){?>
        		<input type="hidden" name="id" value="<?php echo $t['NilaiID'];?>">
        		<div class="form-group">
        			<label class="col-sm-3">Nilai Introduction To Education</label>
        			<div class="col-md-9">
        				<select class="form-control" name="introduction">
        					<option>Pilih Nilai</option>
        					<option value="A">A</option>
        					<option value="A-">A-</option>
        					<option value="B+">B+</option>
        					<option value="B">B</option>
        					<option value="B-">B-</option>
        					<option value="C+">C+</option>
        					<option value="C">C</option>
        					<option value="C-">C-</option>
        					<option value="D+">D+</option>
        					<option value="D">D</option>
        					<option value="D-">D-</option>
        					<option value="E">E</option>
        				</select>
        			</div><br><br>
        		</div>
        		<div class="form-group">
        			<label class="col-sm-3"></label>
        			<div class="col-md-9">
        				<button class="btn btn-success" name="Daftar2">Selanjutnya</button>
        			</div><br><br>
        		</div>
        		<?php }else if($t['EducationalProfession']==""){ ?>
        		<input type="hidden" name="id" value="<?php echo $t['NilaiID'];?>">
        		<div class="form-group">
        			<label class="col-sm-3">Nilai EducationalProfession</label>
        			<div class="col-md-9">
        				<select class="form-control" name="Education">
        					<option>Pilih Nilai</option>
        					<option value="A">A</option>
        					<option value="A-">A-</option>
        					<option value="B+">B+</option>
        					<option value="B">B</option>
        					<option value="B-">B-</option>
        					<option value="C+">C+</option>
        					<option value="C">C</option>
        					<option value="C-">C-</option>
        					<option value="D+">D+</option>
        					<option value="D">D</option>
        					<option value="D-">D-</option>
        					<option value="E">E</option>
        				</select>
        			</div><br><br>
        		</div>
        		<div class="form-group">
        			<label class="col-sm-3"></label>
        			<div class="col-md-9">
        				<button class="btn btn-success" name="Daftar3">Selanjutnya</button>
        			</div><br><br>
        		</div>
        		<?php }else if($t['ResearchSeminar']==""){ ?>
        		<input type="hidden" name="id" value="<?php echo $t['NilaiID'];?>">
        		<div class="form-group">
        			<label class="col-sm-3">Nilai ResearchSeminar</label>
        			<div class="col-md-9">
        				<select class="form-control" name="ResearchSeminar">
        					<option>Pilih Nilai</option>
        					<option value="A">A</option>
        					<option value="A-">A-</option>
        					<option value="B+">B+</option>
        					<option value="B">B</option>
        					<option value="B-">B-</option>
        					<option value="C+">C+</option>
        					<option value="C">C</option>
        					<option value="C-">C-</option>
        					<option value="D+">D+</option>
        					<option value="D">D</option>
        					<option value="D-">D-</option>
        					<option value="E">E</option>
        				</select>
        			</div><br><br>
        		</div>
        		<div class="form-group">
        			<label class="col-sm-3"></label>
        			<div class="col-md-9">
        				<button class="btn btn-success" name="Daftar4">Selanjutnya</button>
        			</div><br><br>
        		</div>
        		<?php }else if($t['PPL1/Microteaching']==""){ ?>
        		<input type="hidden" name="id" value="<?php echo $t['NilaiID'];?>">
        		<div class="form-group">
        			<label class="col-sm-3">Nilai PPL1/Microteaching</label>
        			<div class="col-md-9">
        				<select class="form-control" name="nilai">
        					<option>Pilih Nilai</option>
        					<option value="A">A</option>
        					<option value="A-">A-</option>
        					<option value="B+">B+</option>
        					<option value="B">B</option>
        					<option value="B-">B-</option>
        					<option value="C+">C+</option>
        					<option value="C">C</option>
        					<option value="C-">C-</option>
        					<option value="D+">D+</option>
        					<option value="D">D</option>
        					<option value="D-">D-</option>
        					<option value="E">E</option>
        				</select>
        			</div><br><br>
        		</div>
        		<div class="form-group">
        			<label class="col-sm-3"></label>
        			<div class="col-md-9">
        				<button class="btn btn-success" name="Daftar5">Selanjutnya</button>
        			</div><br><br>
        		</div>
        		<?php }elseif ($t['KHS1']=="") { ?>
        		<input type="hidden" name="id" value="<?php echo $t['NilaiID'];?>">
        		<div class="form-group">
        			<label class="col-sm-3">KHS1</label>
        			<div class="col-md-9">
        				<input type="file" name="KHS1" class="form-control" required>
        			</div><br>
        		</div>
        		<div class="form-group">
        			<label class="col-sm-3">KHS2</label>
        			<div class="col-md-9">
        				<input type="file" name="KHS2" class="form-control" required>
        			</div><br><br>
        		</div>
    			<div class="form-group">
    				<label class="col-sm-3"></label>
    				<div class="col-md-9">
    					<button class="btn btn-success" name="Simpan">Simpan</button>
    				</div><br>
        		</div>
        		<?php }else{echo "Selesai";} ?>
        	</form>
        	<?php }elseif ($data['NamaProdi']=="Pend. Agama Islam" OR $data['NamaProdi']=="PGMI") { ?>
        	<?php include "pendaftar/pai.php"; ?>
        	<?php }elseif ($data['NamaProdi']=="Pend. Matematika") { ?>
        	<?php include "pendaftar/mipa.php"; ?>	
        	<?php } }?>
		</div>
     </div>
</div>