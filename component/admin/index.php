<!-- <?php
include '../../common/session.php';
?> -->

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Code Connect - Dashboard</title>

    <!-- Custom fonts for this template-->
    <link href="./../../common/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
    <link rel="stylesheet" href="./../../common/vendor/datatables/dataTables.bootstrap4.css" />

    <!-- Custom styles for this template-->
    <link href="./../../common/css/index.css" rel="stylesheet">

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.php">
                <img src="../../resource/logo-codeconnect.png" id="logo" alt="" style="width:200px;">
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item active">
                <a class="nav-link" href="index.php">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                Maintenance
            </div>

            <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseStudent" aria-expanded="true" aria-controls="collapseTwo">
                    <i class="fas fa-users fa-cog"></i>
                    <span>Students</span>
                </a>
                <div id="collapseStudent" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <a class="collapse-item" id="sbStudentList">Student List</a>
                        <a class="collapse-item" id="sbStudentAccountRequest">Student Account Request</a>
                    </div>
                </div>
            </li>

            <li class="nav-item" id="sbAdmin" style="display: none">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseAdmin" aria-expanded="true" aria-controls="collapseTwo">
                    <i class="fas fa-lock fa-cog"></i>
                    <span>Admins</span>
                </a>
                <div id="collapseAdmin" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <a class="collapse-item" id="sbAdminList">Admin List</a>
                        <a class="collapse-item" id="sbInactiveAdmin">Inactive Admin</a>
                    </div>
                </div>
            </li>

            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseSubject" aria-expanded="true" aria-controls="collapseTwo">
                    <i class="fas fa-book"></i>
                    <span>Subject</span>
                </a>
                <div id="collapseSubject" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <a class="collapse-item" id="sbSubjectList">Subject List</a>
                    </div>
                </div>
            </li>

            <!-- Nav Item - Utilities Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseForum" aria-expanded="true" aria-controls="collapseUtilities">
                    <i class="fas fa-comments fa-comments"></i>
                    <span>Forum</span>
                </a>
                <div id="collapseForum" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <a class="collapse-item" id="sbQuestionList">Question List</a>
                        <a class="collapse-item" id="sbAnswerList">Answer List</a>
                    </div>
                </div>
            </li>

            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities" aria-expanded="true" aria-controls="collapseUtilities">
                    <i class="fas fa-fw fa-flag"></i>
                    <span>Reports</span>
                </a>
                <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <a class="collapse-item" id="sbReportedQuestion">Question</a>
                        <a class="collapse-item" id="sbReportedAnswer">Answer</a>
                        <a class="collapse-item" id="sbReportedStudent">Student</a>
                    </div>
                </div>
            </li>
            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>
        </ul>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>

                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">

                        <!-- Nav Item - Search Dropdown (Visible Only XS) -->
                        <li class="nav-item dropdown no-arrow d-sm-none">
                            <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-search fa-fw"></i>
                            </a>
                            <!-- Dropdown - Messages -->
                            <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in" aria-labelledby="searchDropdown">
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



                        <!-- <div class="topbar-divider d-none d-sm-block"></div> -->

                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <img class="img-profile rounded-circle" src="./../../common/img/undraw_profile.svg">
                                <b><span class="ml-2 d-none d-lg-inline text-gray-600"><?php echo $_SESSION['user_name']; ?></span></b>

                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                                <a class="dropdown-item" id="sbProfile">
                                    <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i> Profile
                                </a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
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
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
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
    <script src="./../../common/common.js"></script>
</body>

</html>

<script>
    $(document).ready(function() {

        $("#admin-container").load('./form-dashboard.html');


        // Start of Navigation

        $('#sbStudentList').on('click', function() {
            $("#admin-container").load('./form-student-list.html');
        });

        $('#sbStudentAccountRequest').on('click', function() {
            $("#admin-container").load('./form-student-account-request.html');
        });

        $('#sbAdminList').on('click', function() {
            $("#admin-container").load('./form-admin-list.html');
        });

        $('#sbInactiveAdmin').on('click', function() {
            $("#admin-container").load('./form-admin-inactive-list.html');
        });

        $('#sbAddNewAdmin').on('click', function() {
            $("#admin-container").load('./form-add-new-admin.html');
        });

        $('#sbUpdateAdmin').on('click', function() {
            $("#admin-container").load('./form-update-admin.html');
        });

        $('#sbQuestionList').on('click', function() {
            $("#admin-container").load('./form-question-list.html');
        });

        $('#sbAnswerList').on('click', function() {
            $("#admin-container").load('./form-answer-list.html');
        });

        $('#sbRating').on('click', function() {
            $("#admin-container").load('./form-rating.html');
        });

        $('#sbReportedQuestion').on('click', function() {
            $("#admin-container").load('./form-report-question.html');
        });

        $('#sbReportedAnswer').on('click', function() {
            $("#admin-container").load('./form-report-answer.html');
        });

        $('#sbReportedStudent').on('click', function() {
            $("#admin-container").load('./form-report-student.html');
        });

        $('#sbProfile').on('click', function() {
            $("#admin-container").load('./form-profile.html', function() {
                $("#profileAdminID").val(<?php echo $_SESSION['user_id']; ?>);
            });
        });

        $('#sbSubjectList').on('click', function() {
            $("#admin-container").load('./form-subject-list.html');
        });

        if (<?php echo $_SESSION['status']; ?> == -1) {
            $('#sbAdmin').removeAttr("style");
        }

        $('#sidebarToggle').on('click', function() {
            if ($('#logo').css('width') == '80px') {
                $('#logo').css('width', '200px');
            } else {
                $('#logo').css('width', '80px');
            }
        });

        $('#btnForgotPassword').on('click', function() {
            $("#card-form").load('./form-forgot-password.html');
        });

        $('#btnCreateAccount').on('click', function() {
            $("#card-form").load('./form-create-account.html');
        });

        $("#formLogin").on("submit", function(event) {
            event.preventDefault();
            var email = $('#loginEmail').val();
            var password = $('#loginPassword').val();

            $.ajax({
                url: "../../common/db.php",
                type: "POST",
                data: {
                    action: 'login',
                    email: email,
                    password: password
                },
                cache: false,
                success: function(dataResult) {
                    var dataResult = JSON.parse(dataResult);
                    if (dataResult.statusCode == 200) {
                        location.href = "../login/login.php";
                    } else if (dataResult.statusCode == 201) {
                        $("#error").show();
                        $('#error').html('Invalid Email Address or Password!');
                    } else if (dataResult.statusCode == 5000) {
                        $('#infoModal').modal('toggle');
                    }
                }
            });
        });
    });
</script>