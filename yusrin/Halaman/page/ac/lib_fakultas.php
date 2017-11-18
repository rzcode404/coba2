<?php
if (isset($_POST['SimpanFakultas'])) {
	$FakultasID    = Guid();
	$Kode	       = $_POST['Kode'];
	$Fakultas      = $_POST['Fakultas'];
	$query         = mysqli_query($conn,"INSERT INTO `fakultas`(
										   `FakultasID`, 
										   `KodeFakultas`, 
										   `NamaFakultas`) 
											VALUES ('$FakultasID','$Kode','$Fakultas')");
	if ($query) {
		echo '<script>
		      document.location = "?page=fakultas&fakultas=active"
			  </script>';
	}else{
		echo '<script>
		      document.location = "?page=fakultas&fakultas=active"
			  </script>';
	}
}elseif (isset($_POST['UpdateFakultas'])) {

	$FakultasID    = $_REQUEST['FakultasID'];
	$Kode	       = $_REQUEST['Kode'];
	$Fakultas      = $_REQUEST['Fakultas'];
	$query         = mysqli_query($conn,"UPDATE `fakultas` SET 
								`KodeFakultas`='$Kode',
								`NamaFakultas`='$Fakultas' WHERE `FakultasID`='$FakultasID'");
	if ($query) {
		echo '<script>
		      document.location = "?page=fakultas&fakultas=active"
			  </script>';
	}else{
		echo '<script>
		      document.location = "?page=fakultas&fakultas=active"
			  </script>';
	}
}elseif (isset($_GET['Hapus'])) {
	$FakultasID    = $_REQUEST['FakultasID'];
	$query         = mysqli_query($conn,"DELETE FROM fakultas WHERE FakultasID='$FakultasID'");
	if ($query) {
		echo '<script>
		      document.location = "?page=fakultas&fakultas=active"
			  </script>';
	}else{
		echo '<script>
		      document.location = "?page=fakultas&fakultas=active"
			  </script>';
	}
}
?>