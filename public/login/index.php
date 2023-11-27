<?php
include '../../common/session.php';
date_default_timezone_set("Asia/Manila");
echo date("h:i:sa");
?>
<!DOCTYPE html>
<html lang="en">

<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Code Connect - Login</title>

    <!-- Meta Tags -->
    <meta name="description" content="Explore the exceptional IT students at Bulacan State University (BulSU) through Code Connect. Join the university's interactive platform for insightful questions and answers. Discover the top-ranked students shaping innovation and knowledge sharing within the BulSU community! #TopStudents #CodeConnect">
    <meta name="keywords" content="Code Connect, BulSU, IT students, interactive platform, top-ranked students, innovation, knowledge sharing">
    <meta name="author" content="Your Name">

    <!-- Open Graph / Facebook -->
    <meta property="og:type" content="website">
    <meta property="og:url" content="https://yourwebsite.com/login">
    <meta property="og:title" content="Code Connect - Login">
    <meta property="og:description" content="Explore the exceptional IT students at Bulacan State University (BulSU) through Code Connect. Join the university's interactive platform for insightful questions and answers. Discover the top-ranked students shaping innovation and knowledge sharing within the BulSU community! #TopStudents #CodeConnect">
    <meta property="og:image" content="https://yourwebsite.com/path/to/your/image.jpg">

    <!-- Twitter -->
    <meta property="twitter:card" content="summary_large_image">
    <meta property="twitter:url" content="https://yourwebsite.com/login">
    <meta property="twitter:title" content="Code Connect - Login">
    <meta property="twitter:description" content="Explore the exceptional IT students at Bulacan State University (BulSU) through Code Connect. Join the university's interactive platform for insightful questions and answers. Discover the top-ranked students shaping innovation and knowledge sharing within the BulSU community! #TopStudents #CodeConnect">
    <meta property="twitter:image" content="https://yourwebsite.com/path/to/your/image.jpg">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">
    <!-- <link rel="stylesheet" href="./../../common/vendor/bootstrap/bootstrap.min.css"> -->
    <link rel="icon" href="./../../resource/favicon.png">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/toastify-js/src/toastify.min.css">
    <!-- <link rel="stylesheet" href="./../../common/custom-styles.css"> -->

</head>

<body style="background-color: rgb(245, 245, 245)">

    <div class="container-fluid d-flex justify-content-center align-items-center">
        <div class="py-5 h-100">
            <div class="container">
                <div class="row">
                    <div class="col text-center d-none d-sm-block">
                        <div class="row">
                            <div class="col-2"></div>
                            <div class="col-8 text-center my-3">
                                <img loading="lazy" class="img-fluid mx-auto d-block m-1" style="max-width: 300px" src="./../../resource/logo_cics.png" alt="">
                                <img loading="lazy" class="img-fluid mx-auto d-block" src="./../../resource/logo-codeconnect-colored.png" alt="">
                                <p class="text-muted">
                                    <h4 class="fw-bold"><i>“Learning by Asking”</i></h4>
                                </p>
                            </div>
                        </div>
                    </div>

                    
                    <div class="col-md-8 col-lg-6 mb-5 mb-lg-0 d-flex justify-content-center align-items-center">
                        <div class="card shadow" style="width: 100%;">
                            <div class="card-body py-5 px-md-5" id="login-form">
                                <div id="card-form" class="w-100">
                                    <!-- Your form content here -->
                                </div>
                            </div>
                        </div>
                    </div>



                </div>
            </div>
        </div>
    </div>

</body>

</html>


<script src="./../../common/vendor/jquery/jquery.min.js"></script>
<script src="./../../common/vendor/jquery/jquery.cookie.js"></script>
<script src="./../../common/vendor/jquery/aes.js"></script>
<script src="./../../common/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/toastify-js"></script>
<script src="./../../common/common.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
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