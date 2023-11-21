<?php
include '../../common/session.php';
?>

<!DOCTYPE html>
<html lang="en">

<style>
html,
body {
  height: 100%;
}

.wrapper {
  min-height: 100%;
  display: flex;
  flex-direction: column;
}

main {
  flex: 1;
}

footer {
  /* margin-top: auto; */
}
</style>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Code Connect - Dashboard</title>
    <link rel="icon" href="./../../resource/favicon.png">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
    <link rel="stylesheet" href="./../../common/vendor/datatables/dataTables.bootstrap4.css" />
    <link href="./../../common/css/index.css" rel="stylesheet">

</head>

<body id="page-top" class="body-container d-flex topbar flex-column min-vh-100">

    <nav class="navbar navbar-expand-lg navbar-light sticky-top navbar-dark bg-gradient-primary shadow">
        <a class="navbar-brand" href="#"><img src="../../resource/logo-codeconnect.png" id="logo" alt="" style="width:200px;"></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link active" href="#forum" id="nav-menu-forum">Forum <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="nav-menu-learn-to-code" href="#learn-to-code">Learn to Code</a>
                </li>
                <li class="nav-item">
                <a class="nav-link for-login-user" id="nav-menu-activities" href="#activities">My Actions</a>
                </li>
                <li class="nav-item">
                <a class="nav-link for-login-user" id="nav-menu-notification" href="#notification">Notification <span class="badge badge-pill badge-success mb-3" id="notification-count"></span>
                </a>
                </li>
                <div class="topbar-divider d-none d-sm-block"></div>
                <li class="nav-item dropdown no-arrow">
                    <a class="nav-link dropdown-toggle" href="#" id="dropdown-user" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <img class="img-profile rounded-circle img-circle-xs" src="./../../resource/profile/<?php echo $_SESSION['picture']?>" />
                        <b><span class="ml-2 d-none d-lg-inline text-white"><?php echo $_SESSION['user_name']; ?></span></b>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="dropdown-user">
                        <?php
                            if($_SESSION['user_type'] != "4"){
                                echo '<a class="dropdown-item" id="nav-menu-profile" href="#profile">
                                <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i> Profile
                                </a>
                                <div class="dropdown-divider"></div>
                                ';
                            }
                        ?>
                        <a class="dropdown-item" href="#" data-toggle="modal" data-target="#modal-logout">
                            <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i> Logout
                        </a>
                    </div>
                </li>
            </ul>
        </div>
    </nav>

    <div id="content-wrapper">
        <div id="main-container"></div>
    </div>

    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <footer class="main-footer bg-link text-center shadow bg-white text-dark pt-3 footer px-0 mx-0 mt-auto">
        <div class="">
            <section class="">
                <div class="row">
                    <div class="col mb-md-0 pt-3">
                        <p>
                            <i><b>Learning by Asking!</b></i>
                        </p>
                    </div>
                </div>
            </section>
        </div>
        <div class="text-center p-3">
            © 2023 Copyright:
            <a class="text-dark" href="">Code Connect</a>
        </div>
    </footer>

    <div class="modal fade" id="modal-logout" tabindex="-1" role="dialog" aria-labelledby="" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title text-black" style="color: black !important">Ready to Leave?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                <div class="modal-footer">
                    <button class="btn btn-default" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-primary" href="./../login/logout.php">Logout</a>
                </div>
            </div>
        </div>
    </div>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.13.2/themes/base/jquery-ui.min.css" integrity="sha512-ELV+xyi8IhEApPS/pSj66+Jiw+sOT1Mqkzlh8ExXihe4zfqbWkxPRi8wptXIO9g73FSlhmquFlUOuMSoXz5IRw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.13.2/themes/base/theme.min.css" integrity="sha512-hbs/7O+vqWZS49DulqH1n2lVtu63t3c3MTAn0oYMINS5aT8eIAbJGDXgLt6IxDHcWyzVTgf9XyzZ9iWyVQ7mCQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <script src="./../../common/vendor/jquery/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.13.2/jquery-ui.min.js" integrity="sha512-57oZ/vW8ANMjR/KQ6Be9v/+/h6bq9/l3f0Oc7vn6qMqyhvPd1cvKBRWWpzu0QoneImqr2SkmO4MSqU+RpHom3Q==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="./../../common/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="./../../common/vendor/jquery-easing/jquery.easing.min.js"></script>
    <script src="./../../common/js/sb-admin-2.min.js"></script>
    <script src="./../../common/vendor/datatables/jquery.dataTables.js"></script>
    <script src="./../../common/ckeditor/build/ckeditor.js"></script>
    <script src="./../../common/common.js"></script>
    <script src="./../../common/main.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@10/dist/sweetalert2.min.css">
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10/dist/sweetalert2.min.js"></script>
</body>
</html>

<script>
    var isGuest = false;
    var userType;
    $(document).ready(function() {
        getUserProfile();
        if(!isGuest){
            getNotificationCount();
        }
        navigateAnchor();


        function getUserProfile() {
            $.ajax({
                url: "../../common/db.php",
                type: "POST",
                data: {
                    action: 'retrieve-user-profile'
                },
                cache: false,
                success: function(dataResult) {
                    var dataResult = JSON.parse(dataResult);
                    if (dataResult.statusCode == 200) {
                        userType = dataResult.userType;
                        if(userType == "4"){
                            isGuest = true;
                            $(".for-login-user").attr("disabled", "disabled");
                            $(".for-login-user").addClass("d-none");
                        }
                    }
                }
            });
        }

        function navigateAnchor(){
            var form = "./form-";
            var hash = window.location.hash.replace("#","");
            var hashArray = hash.split(".");
            
            var anchor = "";
            var sideBarID = "";
            
            if(hashArray.length != 0){
                if(hashArray.length == 2){
                    anchor = hashArray[1];
                } else {
                    anchor = hashArray[0];
                }
                sideBarID = hashArray[0];
            }

            if(anchor == ""){
                form = form + "forum.html";
                anchor = "forum";
            } else {
                form = form + anchor + ".html";
            }

            if(sideBarID != null){
                $("#collapse-"+sideBarID).addClass("show");
            }

            $("#main-container").load(form);
            setActive($("#nav-menu-"+anchor));
        }

        $("#nav-menu-learn-to-code").click(function() {
            $("#main-container").load('./form-learn-to-code.html');
            setActive($(this));
        });

        $("#nav-menu-notification").click(function() {
            $("#main-container").load('./form-notification.html');
            setActive($(this));
        });

        $("#nav-menu-profile").click(function() {
            $("#main-container").load('./form-profile.html');
            setActive($(this));
        });

        $("#nav-menu-activities").click(function() {
            $("#main-container").load('./form-activities.html');
            setActive($(this));
        });

        $("#nav-menu-forum").click(function() {
            $("#main-container").load('./form-forum.html');
            setActive($(this));
        });

        function setActive(e){
            if(!isGuest){
                getNotificationCount();
            }
            $(".nav-link").removeClass("active");
            e.addClass("active");
        }
    });

</script>