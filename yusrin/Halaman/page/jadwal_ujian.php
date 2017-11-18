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
</style>
  <h4 align="center"><b>JADWAL UJIAN PPL2</b></h4>
  <table border="1">
    <thead>
      <tr>
        <td bgcolor="pink">NO</td>
        <td bgcolor="pink">Nama Pembimbing1</td>
        <td bgcolor="pink">Kontak</td>
        <td bgcolor="pink">Nama Pembimbing2</td>
        <td bgcolor="pink">Kontak</td>
        <td bgcolor="pink">Hari</td>
        <td bgcolor="pink">Tgl Ujian</td>
        <td bgcolor="pink">Jam</td>
        <td bgcolor="pink">Nama Kelompok</td>
      </tr>
    </thead>
    <tbody>
    <?php 
      $no = 1;
      $sql = mysqli_query($conn, "SELECT * FROM jadwal AS a LEFT JOIN kelompok AS b ON a.KelompokID=b.KelompokID");
      while ($do = mysqli_fetch_array($sql)) {
     ?>
      <tr>
        <td><?php echo $no++; ?></td>
        <td><?php echo $do['nama_penguji 1']; ?></td>
        <td><?php echo $do['kontak1']; ?></td>
        <td><?php echo $do['nama_penguji2']; ?></td>
        <td><?php echo $do['kontak1']; ?></td>
        <td><?php echo $do['hari']; ?></td>
        <td><?php echo $do['tgl_ujian']; ?></td>
        <td><?php echo $do['jam']; ?></td>
        <td><?php echo $do['NamaKelompok']; ?></td>
      </tr>
      <?php } ?>
    </tbody>
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