<?php
include '../../common/session.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Code Connect</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
	<link rel="stylesheet" href="./login.css">
</head>
<body style="background-color: rgb(245, 245, 245)">

<section class="login">
<div class="px-4 py-5 px-md-5 text-lg-start h-100 " style="background-color: hsl(0, 0%, 96%)">
	<div class="container">
      
	  <div class="row gx-lg-5 ">
        <div class="col-lg-6 text-center" >
			<div class="row">
				<div class="col-lg-2"></div>
				<div class="col-lg-8 text-center" >
					<img class="img-fluid m-1" style="width: 300px" src="./../../resource/logo-bsit.png" alt="" srcset="">
					<img class="img-fluid" src="./../../resource/logo-codeconnect.png" alt="" srcset="">
					<p style="color: hsl(217, 10%, 50.8%)">
					<h4><b><i>“Learning by Asking”</i></b></h4>
					</p>  
				</div>
			</div>
        </div>

        <div class="col-lg-6 mb-5 mb-lg-0">
          <div class="card">
            <div class="card-body py-5 px-md-5 " id="login-form">
				<div id="card-form"></div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- Jumbotron -->
</section>

<!-- Section: Design Block -->
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js" integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-3.7.0.min.js" integrity="sha256-2Pmvv0kuTBOenSvLm6bvfBSSHrUJ+3A7x6P5Ebd07/g=" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-cookie/1.4.1/jquery.cookie.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/crypto-js/3.1.2/rollups/aes.js"></script>
<script src="./../../common/common.js"></script>
<!-- <script src="common/db.js"></script> -->

<script>
$(document).ready(function() {
	$("#card-form").load('./form-login.html');
});
</script>
</html>