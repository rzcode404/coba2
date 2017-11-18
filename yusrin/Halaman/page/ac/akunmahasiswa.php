<?php 
	include "../../../config/koneksi.php";
	$array = array();
	@$Kode  = $_REQUEST['Kode'];
	$f = substr($Kode,0,1);
	$p = substr($Kode,1,1);

	$sql = mysqli_query($conn, "SELECT concat('Prodi ', prodi.NamaProdi,' Fakultas ',fakultas.NamaFakultas) nama,prodi.ProdiID, prodi.NamaProdi, fakultas.FakultasID, fakultas.NamaFakultas FROM `prodi` JOIN fakultas ON fakultas.FakultasID = prodi.FakultasID WHERE fakultas.KodeFakultas = '$f' AND prodi.KodeProdi = '$p'");
	while ($data = mysqli_fetch_array($sql)) {
		$array[] = $data;
	}
	echo json_encode($array);

 ?>