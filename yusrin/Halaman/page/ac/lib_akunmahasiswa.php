<?php 
	
	require "PHPMailer/PHPMailerAutoload.php";
	if (isset($_REQUEST['Simpan'])) {
		$Kode     = $_REQUEST['Kode'];
		$pass     = md5($_REQUEST['password']);
		$pass1    = $_REQUEST['password'];
		$fakultas = $_REQUEST['fakultas'];
		$prodi    = $_REQUEST['prodi'];
		$nama     = $_REQUEST['nama'];
		$kode1    = $Kode.'@'.$fakultas.'.unipdu.ac.id';

		
		$sql = mysqli_query($conn, "SELECT * FROM login WHERE Username='$Kode'");
		$row = mysqli_num_rows($sql);
		if ($row > 0) {
			echo "<script>alert('Maaf Username Sudah Taerdaftar')</script>";
		}else{
			$mail = mysqli_query($conn, "INSERT INTO mahasiswa(`NIM`,`KelompokID`,`Nama`,ProdiID)VALUES('$Kode','','$nama','$prodi')");
			$mail = mysqli_query($conn, "INSERT INTO `login`(
															`Username`, 
															`Password`, 
															`HakAkses`, 
															`Status`) 
															VALUES (
															'$Kode',
															'$pass',
															'mahasiswa',
															'Aktif')");
			$mail = new PHPMailer;
		    $mail->isSMTP();                                      
		    $mail->Host = 'smtp.gmail.com';  
		    $mail->SMTPAuth = true;                              
		    $mail->Username = '4113077@ft.unipdu.ac.id';               
		    $mail->Password = 'cerewedt12346';               
		    $mail->SMTPSecure = 'tls';                           
		    $mail->Port = 587;                                   

		    $mail->setFrom('4113077@ft.unipdu.ac.id', 'PPL');
		         
		    $mail->addAddress($kode1, $nama);               
		    
		    $mail->isHTML(true);                                  

		    $mail->Subject = 'Gunakan Akun Dibawah Ini Untuk Login Dan Mendaftar PPL';
		    $mail->Body = "<h1>Username: ".$Kode."<br>Password:".$pass1."</h1>";
		    //$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

		    if (!$mail->send()) {
		       echo "<script>alert('Simpan gagal');</script>";
		    }else {
		       echo "<script>alert('Simpan Berhasil');</script>"; 

		    }
		

	  }
	}

 ?>