<?php
include '../../common/session.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Code Connect</title>
    <link rel="stylesheet" href="./../../common/vendor/bootstrap/bootstrap.min.css">
</head>

<body style="background-color: rgb(245, 245, 245)">

    <section class="login">
        <div class="px-4 py-5 px-md-5 text-lg-start h-100 " style="background-color: hsl(0, 0%, 96%)">
            <div class="container">

                <div class="row gx-lg-5 ">
                    <div class="col-lg-6 text-center">
                        <div class="row">
                            <div class="col-lg-2"></div>
                            <div class="col-lg-8 text-center">
                                <img class="img-fluid m-1" style="width: 300px" src="./../../resource/logo-bsit.png" alt="" srcset="">
                                <img class="img-fluid" src="./../../resource/logo-codeconnect-colored.png" alt="" srcset="">
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

<script src="./../../common/vendor/jquery/jquery.min.js"></script>
<script src="./../../common/vendor/jquery/jquery.cookie.js"></script>
<script src="./../../common/vendor/jquery/aes.js"></script>
<script src="./../../common/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="./../../common/common.js"></script>
<!-- <script src="common/db.js"></script> -->
<script>
    $(document).ready(function() {
        const queryString = window.location.search;
        console.log(queryString);
        const urlParams = new URLSearchParams(queryString);
        console.log(urlParams);

        $("#card-form").load('./form-login.html');
    });
</script>

</html>