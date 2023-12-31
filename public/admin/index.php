<?php
include '../../common/session.php';
date_default_timezone_set("Asia/Manila");
 
?>

<style>

.table-responsive {
    overflow-x: auto;
}
    @media print {
            .hide-on-print {
                display: none !important;
            }
            .col-print-3 {
                flex: 0 0 25%;  /* Set the width for printing */
                max-width: 25%;
        }
        }
        
</style>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <meta property="og:url"           content="https://www.your-domain.com/your-page.html" />
    <meta property="og:type"          content="website" />
    <meta property="og:title"         content="Your Website Title" />
    <meta property="og:description"   content="Your description" />
    <meta property="og:image"         content="https://www.your-domain.com/path/image.jpg" />
    <title>Code Connect - Dashboard</title>
    <link rel="icon" href="./../../resource/favicon.png">
    <link href="./../../common/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
    <link rel="stylesheet" href="./../../common/vendor/datatables/dataTables.bootstrap4.css" />
    <link href="./../../common/css/index.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/sweetalert2@11.9.0/dist/sweetalert2.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/toastify-js/src/toastify.min.css">
    <!-- <link rel="stylesheet" href="./../../common/custom-styles.css"> -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" integrity="sha384-mQ93GR66B00ZXjt0YO5KlohRA5SY2XofN5Pboy4EowdQ8s1q6Zgy5u7fVoJAxSfD" crossorigin="anonymous">
</head>

<body id="page-top">
    <div id="wrapper">

        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion hide-on-print" id="sidebar-accordion">
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.php">
                <img loading="lazy" src="../../resource/logo-codeconnect.png" id="logo" alt="" style="width:200px;">
            </a>
            <hr class="sidebar-divider my-0">
            <li class="nav-item" id="nav-item-dashboard">
                <a class="nav-link" href="#dashboard" id="sidebar-dashboard">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span></a>
            </li>

            <hr class="sidebar-divider">

            <div class="sidebar-heading">
                Maintenance
            </div>

            <li class="nav-item" id="nav-item-student">
                <a class="nav-link collapsed" href="#students" data-toggle="collapse" data-target="#collapse-student" aria-expanded="true" aria-controls="collapseTwo">
                    <i class="fas fa-users fa-cog"></i>
                    <span>Students</span>
                </a>
                <div id="collapse-student" class="collapse" aria-labelledby="headingTwo" data-parent="#sidebar-accordion">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <a class="collapse-item" id="sidebar-student-list" href="#student.student-list">Registered Students</a>
                        <a class="collapse-item" id="sidebar-student-request" href="#student.student-account-request">Student List</a>
                    </div>
                </div>
            </li>

            <li class="nav-item" id="nav-item-special-account">
                <a class="nav-link collapsed" href="#special-account" data-toggle="collapse" data-target="#collapse-special-account" aria-expanded="true" aria-controls="collapseTwo">
                    <i class="fas fa-users fa-cog"></i>
                    <span>Professionals</span> 
                    <!-- Add Bootstrap Badge here -->
                    <span class="badge bg-primary badge-notification-professional d-none"></span>
                </a>
                <div id="collapse-special-account" class="collapse" aria-labelledby="headingTwo" data-parent="#sidebar-accordion">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <a class="collapse-item" id="sidebar-special-account-list" href="#special-account.special-account-list">Account List</a>
                        <!-- Add Bootstrap Badge here -->
                        <a class="collapse-item" id="sidebar-special-account-request" href="#special-account.special-account-request">
                            Account Request
                            <span class="badge bg-primary text-white badge-notification-professional d-none"></span>
                        </a>
                    </div>
                </div>
            </li>

            <li class="nav-item" id="nav-item-admin" style="display: none">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapse-admin" aria-expanded="true" aria-controls="collapseTwo">
                    <i class="fas fa-lock fa-cog"></i>
                    <span>Admins</span>
                </a>
                <div id="collapse-admin" class="collapse" aria-labelledby="headingTwo" data-parent="#sidebar-accordion">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <a class="collapse-item" id="sidebar-admin-list" href="#admin.admin-list">Admin List</a>
                        <!-- <a class="collapse-item" id="sidebar-inactive-admin" href="#admin.admin-inactive-list">Inactive Admin</a> -->
                    </div>
                </div>
            </li>

            <li class="nav-item" id="nav-item-subject">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapse-subject" aria-expanded="true" aria-controls="collapseTwo">
                    <i class="fas fa-book"></i>
                    <span>Subject</span>
                </a>
                <div id="collapse-subject" class="collapse" aria-labelledby="headingTwo" data-parent="#sidebar-accordion">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <a class="collapse-item" id="sidebar-subject-list" href="#subject.subject-list">Subject List</a>
                    </div>
                </div>
            </li>

            <!-- Nav Item - Utilities Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapse-forum" aria-expanded="true" aria-controls="collapse-utilities">
                    <i class="fas fa-comments fa-comments"></i>
                    <span>Forum</span>
                </a>
                <div id="collapse-forum" class="collapse" aria-labelledby="headingUtilities" data-parent="#sidebar-accordion">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <a class="collapse-item" id="sidebar-question-list" href="#forum.question-list">Question List</a>
                        <a class="collapse-item" id="sidebar-answer-list" href="#forum.answer-list">Answer List</a>
                    </div>
                </div>
            </li>

            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapse-reported" aria-expanded="true" aria-controls="collapse-reported">
                    <i class="fas fa-fw fa-flag"></i>
                    <span>Reports</span>
                    <span class="badge bg-danger badge-notification-report d-none"></span>
                </a>
                <div id="collapse-reported" class="collapse" aria-labelledby="headingReported" data-parent="#sidebar-accordion">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <a class="collapse-item" id="sidebar-reported-question" href="#reported.reported-question">Question <span class="badge bg-danger text-white badge-notification-report-question d-none"></span></a>
                        <a class="collapse-item" id="sidebar-reported-answer" href="#reported.reported-answer">Answer <span class="badge bg-danger text-white badge-notification-answer badge-notification-report-answer d-none"></span></a>
                        <!-- <a class="collapse-item" id="sidebar-reported-student" href="#reported.reported-student">Student</a> -->
                    </div>
                </div>
            </li>
            <hr class="sidebar-divider d-none d-md-block">

            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>
        </ul>

        <div id="content-wrapper" class="d-flex flex-column">

            <div id="content">

                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>

                    <ul class="navbar-nav ml-auto">

                        <li class="nav-item dropdown no-arrow d-sm-none">
                            <a class="nav-link dropdown-toggle" href="#" id="dropdown-search" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-search fa-fw"></i>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in" aria-labelledby="dropdown-search">
                                <form class="form-inline mr-auto w-100 navbar-search">
                                    <div class="input-group">
                                        <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
                                        <div class="input-group-append">
                                            <button class="btn btn-primary" type="button">
                                                <i class="fas fa-search fa-sm"></i>
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </li>

                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="dropdown-user" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <img loading="lazy" class="img-profile rounded-circle img-circle-xs" src="./../../resource/profile/<?php echo $_SESSION['picture']; ?>">
                                <b><span class="ml-2 d-none d-lg-inline text-gray-600"><?php echo $_SESSION['user_name']; ?></span></b>

                            </a>
                            
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="dropdown-user">
                                <a class="dropdown-item" id="navbar-profile" href="#profile">
                                    <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i> Profile
                                </a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#modal-logout">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i> Logout
                                </a>
                            </div>
                        </li>

                    </ul>

                </nav>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">
                    <div id="admin-container"></div>
                </div>
                <!-- /.container-fluid -->
            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; Code Connect</span>
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="modal-logout" tabindex="-1" role="dialog" aria-labelledby="" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" >Ready to Leave?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-primary" href="./../login/logout.php">Logout</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="./../../common/vendor/jquery/jquery.min.js"></script>
    <script src="./../../common/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="./../../common/vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="./../../common/js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="./../../common/vendor/chart.js/Chart.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="./../../common/js/chart-area.js"></script>
    <script src="./../../common/js/chart-pie.js"></script>
    <script src="./../../common/vendor/datatables/jquery.dataTables.js"></script>
    <script src="./../../common/main.js"></script>
    <script src="./../../common/common.js"></script>
    <script src="./../../common/ckeditor/build/ckeditor.js"></script>
    <script src="./../../common/ckeditor/script.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.9.0/dist/sweetalert2.all.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/toastify-js"></script>
    <!-- Bootstrap CSS -->


</body>

</html>

<script>

function getNotification() {
            $.ajax({
                url: "../../common/db.php",
                type: "POST",
                data: {
                    action: 'retrieve-admin-notification'
                },
                cache: false,
                success: function(dataResult) {
                    var dataResult = JSON.parse(dataResult);
                    var accountRequest = dataResult.professional.professionalRequest;
                    var reportQuestion = dataResult.report.question;
                    var reportAnswer = dataResult.report.answer;
                    var reportCount = reportQuestion + reportAnswer;

                    if(accountRequest > 0){
                        $(".badge-notification-professional").html(accountRequest);
                        $(".badge-notification-professional").removeClass("d-none");
                    } else {
                        $(".badge-notification-professional").addClass("d-none");
                    }

                    if(reportCount > 0){
                        $(".badge-notification-report").html(reportCount);
                        $(".badge-notification-report").removeClass("d-none");

                        if(reportQuestion > 0){
                            $(".badge-notification-report-question").html(reportQuestion);
                            $(".badge-notification-report-question").removeClass("d-none");
                        } else {
                            $(".badge-notification-report-question").addClass("d-none");
                        }

                        if(reportAnswer > 0){
                            $(".badge-notification-report-answer").html(reportAnswer);
                            $(".badge-notification-report-answer").removeClass("d-none");
                        } else {
                            $(".badge-notification-report-answer").addClass("d-none");
                        }
                    } else {
                        $(".badge-notification-report").addClass("d-none");
                        $(".badge-notification-report-question").addClass("d-none");
                        $(".badge-notification-report-answer").addClass("d-none");
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
        }
    $(document).ready(function() {
        navigateAnchor();
        getNotification();
        
        
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
            
            if(<?php echo $_SESSION['status']; ?> == 1){
                if(anchor == 'admin-list' || anchor == 'admin-inactive-list'){
                    anchor = "";
                }
            }

            if(anchor == ""){
                form = form + "dashboard.html";
            } else {
                form = form + anchor + ".html";
            }

            if(sideBarID != null){
                // $("#nav-item-"+sideBarID).addClass("active");
                $("#collapse-"+sideBarID).addClass("show");
            }

            $("#admin-container").load(form);
        }

        $('#sidebar-dashboard').on('click', function() {
            $("#admin-container").load('./form-dashboard.html');
            getNotification();
        });

        $('#sidebar-student-list').on('click', function() {
            $("#admin-container").load('./form-student-list.html');
            getNotification();
        });

        $('#sidebar-student-request').on('click', function() {
            $("#admin-container").load('./form-student-account-request.html');
            getNotification();
        });

        $('#sidebar-special-account-list').on('click', function() {
            $("#admin-container").load('./form-special-account-list.html');
            getNotification();
        });

        $('#sidebar-special-account-request').on('click', function() {
            $("#admin-container").load('./form-special-account-request.html');
            getNotification();
        });

        $('#sidebar-admin-list').on('click', function() {
            $("#admin-container").load('./form-admin-list.html');
            getNotification();
        });

        $('#sidebar-inactive-admin').on('click', function() {
            $("#admin-container").load('./form-admin-inactive-list.html');
            getNotification();
        });

        $('#sbAddNewAdmin').on('click', function() {
            $("#admin-container").load('./form-add-new-admin.html');
            getNotification();
        });

        $('#sbUpdateAdmin').on('click', function() {
            $("#admin-container").load('./form-update-admin.html');
            getNotification();
        });

        $('#sidebar-question-list').on('click', function() {
            $("#admin-container").load('./form-question-list.html');
            getNotification();
        });

        $('#sidebar-answer-list').on('click', function() {
            $("#admin-container").load('./form-answer-list.html');
            getNotification();
        });

        $('#sbRating').on('click', function() {
            $("#admin-container").load('./form-rating.html');
            getNotification();
        });

        $('#sidebar-reported-question').on('click', function() {
            $("#admin-container").load('./form-reported-question.html');
            getNotification();
        });

        $('#sidebar-reported-answer').on('click', function() {
            $("#admin-container").load('./form-reported-answer.html');
            getNotification();
        });

        $('#sidebar-reported-student').on('click', function() {
            $("#admin-container").load('./form-reported-student.html');
            getNotification();
        });

        $('#navbar-profile').on('click', function() {
            $("#admin-container").load('./form-profile.html', function() {
                $("#input-profile-admin-id").val(<?php echo $_SESSION['user_id']; ?>);
            });
            getNotification();
        });

        $('#sidebar-subject-list').on('click', function() {
            $("#admin-container").load('./form-subject-list.html');
            getNotification();
        });

        if (<?php echo $_SESSION['status']; ?> == -1) {
            $('#nav-item-admin').removeAttr("style");
        }

        $('#sidebarToggle').on('click', function() {
            if ($('#logo').css('width') == '80px') {
                $('#logo').css('width', '200px');
            } else {
                $('#logo').css('width', '80px');
            }
        });
    });
</script>