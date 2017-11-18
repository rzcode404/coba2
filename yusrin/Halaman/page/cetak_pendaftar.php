<?php
session_start();
include "../../config/koneksi.php";
include "../library/tgl.php";
$pdf = "CetakPDF";
include "MPDF57/mpdf.php";
$mpdf = new mpdf("utf8", array(210, 330),"","12","5","5","5","5","","","P");
ob_start();
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <style type="text/css">
      p{
        margin-top: -50px;
      }
      #tag{
        margin-right: 1000px;
        text-align: center;
      }
       table{
            width: 100%;
            font-size: 13px;
            border-collapse: collapse;
          }
          
          th{
            text-align: left;
          }
          .heading{
            text-align: center;
          }
          #color{
            background: gray;
          }
    </style>
</head>
<body>
<img src="../upload/logo.png" width="75px">
<p align="center">
        <b>UNIVERSITAS PESANTREN TINGGI DARUL ULUM JOMBANG</b><br>
        <b>UNIT PELAKSANA TEKNIS PRAKTIK PENGALAMAN LAPANGAN(UPT-PPL)</b><br>
        PP.Darul Ulum Peterongan Jombang 611481 Telp.0321-873655/855821
       <br></br>
</p>
<b><hr></b>
<style type="text/css">
#posisi{
  width: 100%;
  text-align: 900px;
}
#fe{
  color: #000000;
  font: 15px;
  width: 120px;
}
#fa{
  width: 300px;
  margin-top: -150px;
  margin-left: 520px;
}
#v{
  width: 400px;
  margin-left: 520px;
  font-size: 15px;
}
#m{
  width: 400px;
  margin-left: 520px;
  font-size: 15px;
}
#a{
  width: 400px;
  margin-left: 420px;
  font-size: 15px;
}
#b{
  margin-left: 620px;
  font-size: 15px;
}
</style>
  <h4 align="center"><b>FORMULIR PENDAFTARAN PPL2</b></h4>
  <?php 
    $NIM = $_REQUEST['id'];
    $sql = mysqli_query($conn,"SELECT * FROM mahasiswa AS a LEFT JOIN prodi AS b ON a.ProdiID=b.ProdiID WHERE NIM='$NIM'");
    $r = mysqli_fetch_array($sql); 
   ?>
<table>
  <tr>
    <td id="fe">
      <div>Nama</div><br>
      <div>NIM</div><br>
      <div>Prodi</div><br>
      <div>Alamat Rumah</div><br>
      <div>No. Telp / HP</div><br>
    </td>
    <td>
      <div>:&nbsp;<?php echo $r['Nama']; ?></div><br>
      <div>:&nbsp;<?php echo $NIM; ?></div><br>
      <div>:&nbsp;<?php echo $r['NamaProdi']; ?></div><br>
      <div>:&nbsp;<?php echo $r['Alamat']; ?></div><br>
      <div>:&nbsp;<?php echo $r['No.Telp']; ?></div><br>
    </td>
  </tr>
</table>
<div id="fa">
<?php 
  if ($r['Foto']=="") {
    echo '<img src="none.png" width="151px">';
  }else{
    echo '<img src="../upload/'.$r['Foto'].'" width="115px">';
  }
?>
  
</div>
<br><br>
Dengan ini mendaftar menjadi peserta PPL 2 Tahun Akademik 2015/2016 dan telah memenuhi  persyaratan <br> untuk mengikuti PPL 2. Persyaratan tersebut antara lain telah lulus mata kuliah<br>
<?php 
  if ($r['NamaProdi']=='Pend. Matematika') {
 ?>
<table>
  <tr>
    <td id="v">
      <div>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Belajar Pembelajaran</div>
      <div>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Perencanaan Pengajaran Matetatika</div>
      <div>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Penilaian Hasil Belajar</div>
      <div>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Profesi Kependidikan</div>
      <div>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Matematika Sekolah 1</div>
      <div>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Matematika Sekolah 2</div>
      <div>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;PPL 1</div>
    </td>
    <?php 
      $query = mysqli_query($conn, "SELECT * FROM nilai WHERE NIM='$NIM'");
      $f     = mysqli_fetch_array($query);
     ?>
    <td>
      <div>:&nbsp;(<?= $f['BelajarPembelajaran'] ?>)</div>
      <div>:&nbsp;(<?= $f['PerencanaanPengajaranMTK'] ?>)</div>
      <div>:&nbsp;(<?= $f['PenelitianHasilBelajar'] ?>)</div>
      <div>:&nbsp;(<?= $f['ProfesiKependidikan'] ?>)</div>
      <div>:&nbsp;(<?= $f['MTKSekolah1'] ?>)</div>
      <div>:&nbsp;(<?= $f['MTKSekolah2'] ?>)</div>
      <div>:&nbsp;(<?php echo $f['PPL1']; ?>)</div>
    </td>
  </tr>
  <tr>
    <td id="m">
      <div>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;KHS1</div><br><br><br>
      <div>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;KHS2</div>
      <div></div>
    </td>
    <td>
      <div><?php echo '<img src="../upload/'.$f['KHS1'].'" width="280px">'; ?></div><br>
      <div><?php echo '<img src="../upload/'.$f['KHS2'].'" width="280px">'; ?></div><br>
      <div>Jombang,&nbsp;<?php $tgl=date("Y-m-d"); echo TanggalIndo($tgl);?></div>
    </td>
  </tr> 
</table><br><br> 
<table>
  <tr>
    <td id="a">
      <div>Ka. Prodi Pendidikan Matematika</div><br><br><br><br>
      <div>Calon Peserta PPL</div>
    </td>
  </tr>
  <td id="b">
    <div>Dian Novita R, M.Pd.</div><br><br><br><br>
    <div><?php echo $r['Nama']; ?></div>
  </td>
</table>
<?php }elseif($r['NamaProdi']=="Pend. Bahasa Inggris") { ?>
<table>
  <tr>
    <td id="v">
      <div>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Introduction To Education</div>
      <div>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Educational Profession</div>
      <div>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Research Seminar</div>
      <div>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; PPL1/Microteaching</div>
    </td>
    <?php 
      $query = mysqli_query($conn, "SELECT * FROM nilai WHERE NIM='$NIM'");
      $f     = mysqli_fetch_array($query);
     ?>
    <td>
      <div>:&nbsp;(<?= $f['IntroductionToEducation'] ?>)</div>
      <div>:&nbsp;(<?= $f['EducationalProfession'] ?>)</div>
      <div>:&nbsp;(<?= $f['ResearchSeminar'] ?>)</div>
      <div>:&nbsp;(<?= $f['PPL1/Microteaching'] ?>)</div>
    </td>
  </tr>
  <tr>
    <td id="m">
      <div>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;KHS1</div><br><br><br>
      <div>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;KHS2</div>
      <div></div>
    </td>
    <td>
      <div><?php echo '<img src="../upload/'.$f['KHS1'].'" width="280px">'; ?></div><br>
      <div><?php echo '<img src="../upload/'.$f['KHS2'].'" width="280px">'; ?></div><br>
      <div>Jombang,&nbsp;<?php $tgl=date("Y-m-d"); echo TanggalIndo($tgl);?></div>
    </td>
  </tr> 
</table><br><br>
<?php }elseif ($r['NamaProdi']=="Pend. Agama Islam" or $r['NamaProdi']=="PGMI") { ?>
<table>
  <tr>
    <td id="v">
      <div>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Pancasila/Pend_kewarganegaraan</div>
      <div>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;IlmuPendidikan</div>
      <div>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;ProfilTenagaKerja/ProfesiKeguruan</div>
      <div>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; MetodologiPenelitian/MetodologiPend</div>
      <div>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; PPL1</div>
    </td>
    <?php 
      $query = mysqli_query($conn, "SELECT * FROM nilai WHERE NIM='$NIM'");
      $f     = mysqli_fetch_array($query);
     ?>
    <td>
      <div>:&nbsp;(<?= $f['Pancasila/Pend_kewarganegaraan'] ?>)</div>
      <div>:&nbsp;(<?= $f['IlmuPendidikan'] ?>)</div>
      <div>:&nbsp;(<?= $f['ProfilTenagaKerja/ProfesiKeguruan'] ?>)</div>
      <div>:&nbsp;(<?= $f['MetodologiPenelitian/MetodologiPend'] ?>)</div>
      <div>:&nbsp;(<?= $f['PPL1'] ?>)</div>
    </td>
  </tr>
  <tr>
    <td id="m">
      <div>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;KHS1</div><br><br><br>
      <div>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;KHS2</div>
      <div></div>
    </td>
    <td>
      <div><?php echo '<img src="../upload/'.$f['KHS1'].'" width="200px">'; ?></div><br>
      <div><?php echo '<img src="../upload/'.$f['KHS2'].'" width="200px">'; ?></div><br>
      <div>Jombang,&nbsp;<?php $tgl=date("Y-m-d"); echo TanggalIndo($tgl);?></div>
    </td>
  </tr> 
</table><br><br>
<?php } ?>
</body>
<?php
$out = ob_get_contents();
ob_end_clean();
$mpdf = new mPDF('c','A4','');
$mpdf->SetDisplayMode('fullpage');
$stylesheet = file_get_contents('MPDF57/mpdf.css');
$mpdf->WriteHTML($stylesheet,1);
$mpdf->WriteHTML($out);
$mpdf->Output();
?>