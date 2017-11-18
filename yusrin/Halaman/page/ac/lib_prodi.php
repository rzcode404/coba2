<?php
if (isset($_POST['SimpanProdi'])) {
	$ProdiID       = Guid();
	$FakultasID    = $_REQUEST['FakultasID'];
	$KodeProdi	   = $_REQUEST['KodeProdi'];
	$NamaProdi     = $_REQUEST['NamaProdi'];
	$query         = mysqli_query($conn,"INSERT INTO `prodi`(
										   `ProdiID`, 
										   `FakultasID`, 
										   `KodeProdi`, 
										   `NamaProdi`) 
											VALUES (
											'$ProdiID',
											'$FakultasID',
											'$KodeProdi',
											'$NamaProdi')");
	if ($query) {
		echo '<script>
		      document.location = "?page=prodi&prodi=active"
			  </script>';
	}else{
		echo '<script>
		      document.location = "?page=prodi&prodi=active"
			  </script>';
	}
}elseif (isset($_REQUEST['Hapus'])) {
	$ProdiID  = $_REQUEST['ProdiID'];
	$query    = mysqli_query($conn,"DELETE FROM prodi WHERE ProdiID='$ProdiID'");
	if ($query) {
		echo '<script>
		      document.location = "?page=prodi&prodi=active"
			  </script>';
	}else{
		echo '<script>
		      document.location = "?page=prodi&prodi=active"
			  </script>';
	}
}elseif (isset($_REQUEST['UpdateProdi'])) {
	$ProdiID       = $_REQUEST['ProdiID'];
	$FakultasID    = $_REQUEST['FakultasID'];
	$KodeProdi	   = $_REQUEST['KodeProdi'];
	$NamaProdi     = $_REQUEST['NamaProdi'];
	$query         = mysqli_query($conn,"UPDATE `prodi` SET 
										   `FakultasID`='$FakultasID',
										   `KodeProdi`='$KodeProdi',
										   `NamaProdi`='$NamaProdi' 
										    WHERE `ProdiID`='$ProdiID'");
	if ($query) {
		echo '<script>
		      document.location = "?page=prodi&prodi=active"
			  </script>';
	}else{
		echo '<script>
		      document.location = "?page=prodi&prodi=active"
			  </script>';
	}
}
?>