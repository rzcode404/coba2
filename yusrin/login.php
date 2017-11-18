<?php 
	include "config/koneksi.php";
 ?>
<!DOCTYPE html>
<html>  
<head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width,initial-scale=1">
        <meta name="description" content="A fully featured admin theme which can be used to build CRM, CMS, etc.">
        <meta name="author" content="Coderthemes">

        <link rel="shortcut icon" href="upload/<?= $ft['favicon']?>">

        <title></title>

        <link href="assets/css/bootstrap.min.css" rel="stylesheet" type="text/css">
        <link href="assets/css/core.css" rel="stylesheet" type="text/css">
        <link href="assets/css/icons.css" rel="stylesheet" type="text/css">
        <link href="assets/css/components.css" rel="stylesheet" type="text/css">
        <link href="assets/css/pages.css" rel="stylesheet" type="text/css">
        <link href="assets/css/menu.css" rel="stylesheet" type="text/css">
        <link href="assets/css/responsive.css" rel="stylesheet" type="text/css">

        <script src="assets/js/modernizr.min.js"></script>
        
    </head>
    <body><br><br><br>
        <div class="row">
      <div class="col-md-3"></div>
      <div class="col-md-6">
        
        <!-- <center><img src="web.png" width="100%" height="170px"></center> -->
        <?php 
        	if (isset($_REQUEST['login'])) {
			$username = $_REQUEST['user'];
			$password = md5($_REQUEST['pass']);

			$sql = mysqli_query($conn, "SELECT * FROM login WHERE Username='$username' AND Password='$password' AND Status='Aktif'");
			if (mysqli_num_rows($sql) > 0) {
				$data = mysqli_fetch_assoc($sql);
					session_start();
				$_SESSION['username'] = $data['Username'];
				$_SESSION['hak_akses']= $data['HakAkses'];

				if ($_SESSION['hak_akses']=='uptppl') {
					echo'<script>
							window.location.href="Halaman/index.php?page=home&home=active";
						</script>';
				}elseif($_SESSION['hak_akses']=='pembimbing'){
					echo'<script>
							window.location.href="Halaman/index.php?page=home&home=active";
						</script>';
				}elseif ($_SESSION['hak_akses']=='mahasiswa') {
					echo'<script>
							window.location.href="Halaman/index.php?page=home&home=active";
						</script>';
				}
				 
			}else{
				echo "<script>alert('Login Gagal')</script>";
			}
		}
         ?>
	          
       <div class="panel panel-color panel-primary">
         <div class="panel-heading"><img src="images/logo.png" width="30%"> 
           <h3 class="text-center m-t-10" style="color: #ffffff;"> <strong>Login PPL</strong> </h3>
        </div> 

        <div class="panel-body"> 
          <form role="form" method="POST">
            <div class="form-group">
              <label for="exampleInputEmail1">Username</label>
              <input type="text" class="form-control" name="user" id="exampleInputEmail1" placeholder="Username">
            </div>
            <div class="form-group">
              <label for="exampleInputPassword1">Password</label>
              <input type="password"  name="pass" class="form-control" id="exampleInputPassword1" placeholder="Password">
            </div>
            <div class="form-group ">
                <div class="col-xs-12">
                    <label class="cr-styled">
                        <input type="checkbox" checked>
                        <i class="fa"></i> 
                        Biarkan saya tetap masuk ?
                    </label>
                </div><br>
            </div><br>
            <div class="form-group text-right">
              <div class="col-xs-12">
                  <a href="../" class="btn btn-success w-lg">Kembali kehalaman awal</a>
                  <button name="login" class="btn btn-primary w-lg" type="submit">Masuk</button>
              </div>
            </div>
          </form>
        </div>
      </div>
      </div>
      <div class="col-md-3"></div>
    </div>

        
    	<script>
            var resizefunc = [];
        </script>

        <!-- Main  -->
        <script src="assets/js/jquery.min.js"></script>
        <script src="assets/js/bootstrap.min.js"></script>
        <script src="assets/js/detect.js"></script>
        <script src="assets/js/fastclick.js"></script>
        <script src="assets/js/jquery.slimscroll.html"></script>
        <script src="assets/js/jquery.blockUI.js"></script>
        <script src="assets/js/waves.js"></script>
        <script src="assets/js/wow.min.js"></script>
        <script src="assets/js/jquery.nicescroll.js"></script>
        <script src="assets/js/jquery.scrollTo.min.js"></script>

        <!-- Custom main Js -->
        <script src="assets/js/jquery.core.js"></script>
        <script src="assets/js/jquery.app.js"></script>
	
	</body>
</html>