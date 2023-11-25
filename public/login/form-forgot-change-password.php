<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Code Connect</title>
    <link rel="stylesheet" href="./../../common/vendor/bootstrap/bootstrap.min.css">
    <link rel="stylesheet" href="./login.css">
</head>

<style>
    #password-strength-status {
        padding: 5px 10px;
        border-radius: 4px;
        margin-top: 5px;
    }

    .medium-password {
        background-color: #fd0;
    }

    .weak-password {
        background-color: #FBE1E1;
    }

    .strong-password {
        background-color: #D5F9D5;
    }
</style>

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
                                    <form id="form-change-password">
                                        <div id="container-change-password" style="display: none">
                                            <div class="row">
                                                <div class="col-md-12 mb-4">
                                                    <h2>Forgot Password</h2>
                                                </div>
                                            </div>

                                            <div class="alert alert-danger alert-dismissible" id="error" style="display:none;">
                                                <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
                                            </div>

                                            <div class="form-outline mb-4">
                                                <label class="form-label" for="password">New Password</label>
                                                <input type="password" name="password" id="password" class="full-width form-control" placeholder="Enter Password" required autocomplete="new-password" onkeyup="checkPasswordStrength();" />
                                                <div id="password-strength-status"></div>
                                                <div class="invalid-feedback" id="helpertext-password">
                                                </div>
                                            </div>

                                            <!-- Password input -->
                                            <div class="form-outline mb-2">
                                                <label class="form-label" for="confirm-password">Confirm New Password</label>
                                                <input type="password" id="confirm-password" class="form-control" placeholder="Enter Confirm Password" required/>
                                                <div class="invalid-feedback">Confirm Password doesn't match with password.</div>
                                            </div>

                                            <!-- Submit button -->
                                            <button type="submit" id="button-change-password" class="btn btn-primary btn-block mb-4 w-100 mt-4">Change Password</button>
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

<script src="./../../common/vendor/jquery/jquery.min.js"></script>
<script src="./../../common/vendor/jquery/jquery.cookie.js"></script>
<script src="./../../common/vendor/jquery/aes.js"></script>
<script src="./../../common/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="./../../common/common.js"></script>
<!-- <script src="common/db.js"></script> -->

<script>
function checkPasswordStrength() {
            var number = /([0-9])/;
            var alphabets = /([a-zA-Z])/;
            var special_characters = /([~,!,@,#,$,%,^,&,*,-,_,+,=,?,>,<])/;
            var password = $("#password").val().trim();
            if (password.length < 6) {
                $('#password-strength-status').removeClass();
                $('#password-strength-status').addClass('weak-password');
                $('#password-strength-status').html("Weak (should be atleast 6 characters.)");
                $('#password').addClass('is-invalid');
                return false;
            } else {
                if (password.match(number) && password.match(alphabets) && password.match(special_characters)) {
                    $('#password-strength-status').removeClass();
                    $('#password-strength-status').addClass('strong-password');
                    $('#password-strength-status').html("Strong");
                    $('#password').removeClass('is-invalid');
                    return true;
                } else {
                    $('#password-strength-status').removeClass();
                    $('#password-strength-status').addClass('medium-password');
                    $('#password-strength-status').html("Medium (should include alphabets, numbers and special characters.)");
                    $('#password').addClass('is-invalid');
                    return false;
                }
            }
        }

    $(document).ready(function() {
        var key = "<?php echo $_SERVER['QUERY_STRING']; ?>";
        var decryptedKey = decrypt(key.substr(4));
        var userID = '';
        if (decryptedKey == "") {
            $("#form-change-password").html("You're not authorized to do this password change!");
            $("#form-change-password").addClass("text-center text-danger h5");
        } else {
            const query = decryptedKey.split(",");
            userID = query[0];
            let queryDate = new Date(query[1]);
            const date = new Date();
            date.setMinutes(date.getMinutes() - 30);
            if (date > queryDate) {
                $("#form-change-password").html("Session Expired!");
                $("#form-change-password").addClass("text-center text-warning h5");
            } else {
                $("#container-change-password").removeAttr("style");
            }
            console.log("Q " + queryDate);
            console.log("V " + date);
            console.log(date < queryDate);
        }

        $("#confirm-password").on("blur", function(){
            var password = $('#password').val();
            var confirmPassword = $('#confirm-password').val();

            if (password != confirmPassword) {
                $('#confirm-password').addClass("is-invalid");
            } else {
                $('#confirm-password').removeClass("is-invalid");
            }
        });

        $("#form-change-password").on("submit", function(event) {
            event.preventDefault();
            var password = $('#password').val();
            var confirmPassword = $('#confirm-password').val();

            if (password != confirmPassword) {
                return;
            }

            if(!checkPasswordStrength()){
                return;
            }

            $.ajax({
                url: "../../common/db.php",
                type: "POST",
                data: {
                    action: 'change-password',
                    userID: userID,
                    password: password
                },
                cache: false,
                success: function(dataResult) {
                    var dataResult = JSON.parse(dataResult);
                    if (dataResult.statusCode == 200) {
                        $("#form-change-password").html("Password has been successfully changed!");
                        $("#form-change-password").addClass("text-center text-success h5");
                    } else {
                        $("#error").show();
                        $('#error').html('Unable to change password, please try again later.');
                    }
                },
                    beforeSend: function() {
                        // Code to be executed before the request is sent
                        console.log('Request is about to be sent');
                    },
                    error: function(xhr, status, error) {
                        // Code to be executed if there is an error
                        console.error('Error:', error);
                    },
                    complete: function() {
                        // Code to be executed after the request is complete (success, error, or abort)
                        console.log('Request is complete');
                    }
            });
        });
    });
</script>

</html>