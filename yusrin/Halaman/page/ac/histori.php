<?php 
	include "../../../config/koneksi.php";
	$array = array();
	@$KelompokID  = $_REQUEST['KelompokID'];
	$sql = mysqli_query($conn, "SELECT * FROM kelompok WHERE KelompokID='$KelompokID'");
	while ($data = mysqli_fetch_array($sql)) {
		$array[] = $data;
	}
	echo json_encode($array);

 ?>