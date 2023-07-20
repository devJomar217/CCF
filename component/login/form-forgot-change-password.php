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
                                    <form id="form-change-password">
                                        <div id="container-change-password" style="display: none">
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
                                                <label class="form-label" for="password">New Password</label>
                                            </div>

                                            <!-- Password input -->
                                            <div class="form-outline mb-4">
                                                <input type="password" id="confirm-password" class="form-control" placeholder="Enter Confirm Password" required/>
                                                <label class="form-label" for="confirm-password">Confirm Password</label>
                                            </div>

                                            <!-- Submit button -->
                                            <button type="submit" id="button-change-password" class="btn btn-primary btn-block mb-4 w-100">Change Password</button>
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

        $("#form-change-password").on("submit", function(event) {
            event.preventDefault();
            var password = $('#password').val();
            var confirm-password = $('#confirm-password').val();

            if (password != confirm-password) {
                $("#error").show();
                $('#error').html("Password doesn't match!!");
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
                }
            });
        });
    });
</script>

</html>