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
  <h4 align="center"><b>CETAK KELOMPOK PPL</b></h4>
  <?php 
    $KelompokID = $_REQUEST['KelompokID'];
    $sql = mysqli_query($conn,"SELECT * FROM kelompok WHERE KelompokID='$KelompokID'");
    $r = mysqli_fetch_array($sql); 
    $Nomor     = $r['KelompokID'];
    $nomor = str_replace("K0", "", $Nomor);
   ?>
   <p align="center"><b>Daftar Kelompok(<?php echo $nomor; ?>),&nbsp; Tempat&nbsp;<?php echo $r['TempatPPL']; ?></b></p><br>
   <table border="1">
     <thead>
       <tr>
          <th style="background-color: pink">No</th>
          <th style="background-color: pink">Nim</th>
          <th style="background-color: pink">Nama</th>
          <th style="background-color: pink">Fakultas</th>
          <th style="background-color: pink">Prodi</th>
          <th style="background-color: pink">Jk</th>
       </tr>
      <tbody>
        <?php 
          $n = 1;
          $sql = mysqli_query($conn, "SELECT * FROM mahasiswa AS a LEFT JOIN kelompok AS b ON a.KelompokID=b.KelompokID LEFT JOIN prodi AS c ON c.ProdiID=a.ProdiID LEFT JOIN fakultas AS d ON d.FakultasID=c.FakultasID WHERE b.KelompokID='$KelompokID'");
          while ($data = mysqli_fetch_array($sql)) {
         ?>
        <tr>
          <td><?php echo $n++; ?></td>
          <td><?php echo $data['NIM']; ?></td>
          <td><?php echo $data['Nama']; ?></td>
          <td><?php echo $data['NamaFakultas']; ?></td>
          <td><?php echo $data['NamaProdi']; ?></td>
          <td><?php echo $data['JK']; ?></td>
        </tr>
        <?php } ?>    
      </tbody>
     </thead>
   </table>
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