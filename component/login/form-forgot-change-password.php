<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Code Connect</title>
    <link rel="stylesheet" href="./../../common/vendor/bootstrap/bootstrap.min.css">
	<link rel="stylesheet" href="./login.css">
</head>
<body style="background-color: rgb(245, 245, 245)">

<section class="login">
<div class="px-4 py-5 px-md-5 text-lg-start h-100 " style="background-color: hsl(0, 0%, 96%)">
	<div class="container">
	  <div class="row gx-lg-5 ">
      <div class="col-lg-3 text-center"></div>
      <div class="col-lg-6 mb-5 mb-lg-0">
        <div class="card">
          <div class="card-body py-5 px-md-5 " id="login-form">
				    <div>
              <form id="formChangePassword">
                <div id="changePasswordContainer" style="display: none">
                  <div class="row">
                    <div class="col-md-6 mb-4">
                      <h2>Forgot Password</h2>
                    </div>
                  </div>
                
                  <div class="alert alert-danger alert-dismissible" id="error" style="display:none;">
                    <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
                  </div>
                
                  <!-- Email input -->
                  <div class="form-outline mb-4">
                    <input type="password" id="password" class="form-control" placeholder="Enter New Password" required/>
                    <label class="form-label" for="form3Example3">New Password</label>
                  </div>
                
                  <!-- Password input -->
                  <div class="form-outline mb-4">
                    <input type="password" id="confirmPassword" class="form-control" placeholder="Enter Confirm Password" required/>
                    <label class="form-label" for="form3Example4">Confirm Password</label>
                  </div> 
                
                  <!-- Submit button -->
                  <button type="submit" id="btnChangePassword" class="btn btn-primary btn-block mb-4 w-100">
                    Change Password
                  </button>
                </div>
              </form>
            </div>
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

<script src="./../../common/vendor/jquery/jquery.min.js" ></script>
<script src="./../../common/vendor/jquery/jquery.cookie.js"></script>
<script src="./../../common/vendor/jquery/aes.js"></script>
<script src="./../../common/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="./../../common/common.js"></script>
<!-- <script src="common/db.js"></script> -->

<script>
$(document).ready(function() {
  var key = "<?php echo $_SERVER['QUERY_STRING']; ?>";
  var decryptedKey = decrypt(key.substr(4));
  var userID = '';
  if(decryptedKey==""){
    $("#formChangePassword").html("You're not authorized to do this password change!");
    $("#formChangePassword").addClass("text-center text-danger h5");
  } else {
    const query = decryptedKey.split(",");
    userID = query[0];
    let queryDate = new Date(query[1]);
    const date = new Date();
    date.setMinutes(date.getMinutes() - 30);
    if(date > queryDate){
      $("#formChangePassword").html("Session Expired!");
      $("#formChangePassword").addClass("text-center text-warning h5");
    } else {
      $("#changePasswordContainer").removeAttr("style");
    }
    console.log("Q " + queryDate);
    console.log("V " + date);
    console.log(date < queryDate);
  }

  $("#formChangePassword" ).on("submit", function( event ) {
      event.preventDefault();
      var password = $('#password').val();
      var confirmPassword = $('#confirmPassword').val();

      if(password != confirmPassword){
        $("#error").show();
        $('#error').html("Password doesn't match!!");
        return;
      }
      
        $.ajax({
          url: "../../common/db.php",
          type: "POST",
          data: {
            action:'change-password',
            userID: userID,
            password: password						
          },
          cache: false,
          success: function(dataResult){
            var dataResult = JSON.parse(dataResult);
            if(dataResult.statusCode==200){
              $("#formChangePassword").html("Password has been successfully changed!");
              $("#formChangePassword").addClass("text-center text-success h5");						
            } else {
              $("#error").show();
              $('#error').html('Unable to change password, please try again later.');
            }
          }
        });
    });
});
</script>
</html>