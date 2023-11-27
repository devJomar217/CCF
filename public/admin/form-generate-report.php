<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
<link rel="stylesheet" href="./../../common/vendor/datatables/dataTables.bootstrap4.css" />
<link href="./../../common/css/index.css" rel="stylesheet">
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
<script src="../../common/vendor/chart.js/Chart.min.js">
</script>
<script src="./../../common/js/chart-area.js"></script>
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Report</h1>
</div>
<script src="../../common/vendor/chart.js/Chart.min.js">
</script>
<script src="./../../common/js/chart-area.js"></script>
<script src="./../../common/js/chart-pie.js"></script>
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
    <a href="./form-generate-report.php" target="_blank" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm" id="generate-report"><i
            class="fas fa-download fa-sm text-white-50"></i> Generate Report</a>
</div>

<div class="row">

    <div class="col-lg-3 mb-4">
        <div class="card border-left-primary shadow h-100 py-1">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                            Students</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800" id="dashboard-student"></div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-users fa-2x text-primary"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-lg-3 mb-4">
        <div class="card border-left-primary shadow h-100 py-1">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                            Registered Students</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800" id="dashboard-student-registered"></div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-id-card fa-2x text-primary"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-lg-3 mb-4">
        <div class="card border-left-primary shadow h-100 py-1">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                            Professionals</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800" id="dashboard-professional"></div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-users fa-2x text-primary"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-lg-3 mb-4">
        <div class="card border-left-primary shadow h-100 py-1">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                            Professional Request</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800" id="dashboard-professional-account-request"></div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-briefcase fa-2x text-primary"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-lg-3 mb-4">
        <div class="card border-left-success shadow h-100 py-1">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                            Question</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800" id="dashboard-question"></div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-question fa-2x text-success"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-lg-3 mb-4">
        <div class="card border-left-success shadow h-100 py-1">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                            Answer</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800" id="dashboard-answer"></div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-comments text-success fa-2x"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-lg-3 mb-4">
        <div class="card border-left-danger shadow h-100 py-1">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-danger text-uppercase mb-1">
                            Reported Question</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800" id="dashboard-reported-question"></div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-flag fa-2x text-danger"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-lg-3 mb-4">
        <div class="card border-left-danger shadow h-100 py-1">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-danger text-uppercase mb-1">
                            Reported Answer</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800" id="dashboard-reported-answer"></div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-flag fa-2x text-danger"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Pending Requests Card Example -->
    <!-- <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-warning shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                            Account Request</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800" id="dashboard-student-account-request"></div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-clipboard fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div> -->
</div>


<div class="row">
    <!-- Pie Chart -->
    <div class="col-lg-12">
        <div class="card shadow mb-4">
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary">Students</h6>
            </div>
            <div class="card-body">
                <div style="width: 80%; margin: auto;">
                    <canvas id="studentChart"></canvas>
                </div>
                <div class="mt-4 small">
                    <div class="row">
                        <div class="col-lg-3">
                            <span class="">
                                <i class="fas fa-circle" style="color: rgba(75, 192, 192, 0.5);"></i> First Year: <span id="student-first-year"></span>
                            </span>
                        </div>
                        <div class="col-lg-3">
                            <span class="">
                                <i class="fas fa-circle" style="color: rgba(255, 99, 132, 0.5);"></i> Second Year: <span id="student-second-year"></span>
                            </span>
                        </div>
                        <div class="col-lg-3">
                            <span class="">
                                <i class="fas fa-circle" style="color: rgba(255, 206, 86, 0.5);"></i> Third Year: <span id="student-third-year"></span>
                            </span>
                        </div>
                        <div class="col-lg-3">
                            <span class="">
                                <i class="fas fa-circle" style="color: rgba(54, 162, 235, 0.5);"></i> Fourth Year: <span id="student-fourth-year"></span>
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-lg-12">
        <div class="card shadow mb-4">
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary">Question per Subject</h6>
            </div>
            <div class="card-body">
                <div style="margin: auto;">
                    <canvas id="questionChart"></canvas>
                </div>
                <!-- <div class="mt-4 small">
                    <div class="row">
                        <div class="col-lg-3">
                            <span class="">
                                <i class="fas fa-circle" style="color: rgba(75, 192, 192, 0.5);"></i> First Year: <span id="student-first-year"></span>
                            </span>
                        </div>
                        <div class="col-lg-3">
                            <span class="">
                                <i class="fas fa-circle" style="color: rgba(255, 99, 132, 0.5);"></i> Second Year: <span id="student-second-year"></span>
                            </span>
                        </div>
                        <div class="col-lg-3">
                            <span class="">
                                <i class="fas fa-circle" style="color: rgba(255, 206, 86, 0.5);"></i> Third Year: <span id="student-third-year"></span>
                            </span>
                        </div>
                        <div class="col-lg-3">
                            <span class="">
                                <i class="fas fa-circle" style="color: rgba(54, 162, 235, 0.5);"></i> Fourth Year: <span id="student-fourth-year"></span>
                            </span>
                        </div>
                    </div>
                </div> -->
            </div>
        </div>
    </div>



    <!-- Content Column -->
    <div class="col-lg-12 mb-10">
        <!-- Project Card Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <div class="row">
                    <div class="col-lg-6 align-middle">
                        <h6 class="m-0 mt-2 font-weight-bold text-primary">Year Level per Subject</h6>
                    </div>
                    <div class="col-lg-6">
                        <div class="row align-middle">
                            <div class="col-lg-12">
                                <select class="form-control input-subject" class="dropdown" id="input-subject" required>
                                    <option value="">All</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <h4 class="small font-weight-bold">First Year: <span id="subject-first-year"></span> <span class="float-right" id="first-year-percent-text">0%</span></h4>
                <div class="progress mb-4">
                    <div class="progress-bar bg-prirmary" role="progressbar" id="first-year-percent-progress" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100"></div>
                </div>
                <h4 class="small font-weight-bold">Second Year: <span id="subject-second-year"></span> <span class="float-right" id="second-year-percent-text">0%</span></h4>
                <div class="progress mb-4">
                    <div class="progress-bar bg-success" role="progressbar" id="second-year-percent-progress" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100"></div>
                </div>
                <h4 class="small font-weight-bold">Third Year: <span id="subject-third-year"></span> <span class="float-right" id="third-year-percent-text">0%</span></h4>
                <div class="progress mb-4">
                    <div class="progress-bar bg-warning" role="progressbar" id="third-year-percent-progress" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100"></div>
                </div>
                <h4 class="small font-weight-bold">Fourth Year: <span id="subject-fourth-year"></span> <span class="float-right" id="fourth-year-percent-text">0%</span></h4>
                <div class="progress mb-4">
                    <div class="progress-bar bg-danger" style="background-color: red !important" role="progressbar" id="fourth-year-percent-progress" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100"></div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    $(document).ready(function() {
        getSubjectList();
        getDashboardData();

        $("#generate-report").on("click", function() {});

        function getDashboardData() {
            $.ajax({
                url: "../../common/db.php",
                type: "POST",
                data: {
                    action: 'get-dashboard-data'
                },
                cache: false,
                success: function(dataResult) {
                    var dataResult = JSON.parse(dataResult);
                    $("#dashboard-student").html(dataResult.student.student);
                    $("#dashboard-student-registered").html(dataResult.student.studentRegistered);

                    $("#dashboard-professional").html(dataResult.professional.professional);
                    $("#dashboard-professional-account-request").html(dataResult.professional.professionalRequest);

                    $("#dashboard-question").html(dataResult.forum.question);
                    $("#dashboard-answer").html(dataResult.forum.answer);

                    $("#dashboard-reported-question").html(dataResult.report.question);
                    $("#dashboard-reported-answer").html(dataResult.report.answer);


                    $("#student-first-year").html(dataResult.student.firstYear);
                    $("#student-second-year").html(dataResult.student.secondYear);
                    $("#student-third-year").html(dataResult.student.thirdYear);
                    $("#student-fourth-year").html(dataResult.student.fourthYear);

                    // Extract subject names and question counts from the data
                    var subjectLabel = dataResult.subject.overall.map(function(entry) {
                        return entry.subject + ": " + entry.questionCount;
                    });

                    var questionCounts = dataResult.subject.overall.map(function(entry) {
                        return entry.questionCount;
                    });

                    // Chart configuration
                    var ctx = document.getElementById('questionChart').getContext('2d');
                    var questionChart = new Chart(ctx, {
                        type: 'bar',
                        data: {
                            labels: subjectLabel,
                            datasets: [{
                                label: 'Question Count',
                                data: questionCounts,
                                backgroundColor: 'rgba(75, 192, 192, 0.5)',
                                borderColor: 'rgba(75, 192, 192, 1)',
                                borderWidth: 1
                            }]
                        },
                        options: {
                            scales: {
                                y: {
                                    beginAtZero: true
                                }
                            }
                        }
                    });


                    var ctx = document.getElementById('studentChart').getContext('2d');
                    var studentChart = new Chart(ctx, {
                        type: 'bar',
                        data: {
                            labels: ['First Year', 'Second Year', 'Third Year', 'Fourth Year'],
                            datasets: [{
                                label: 'Number of Students',
                                data: [dataResult.student.firstYear, dataResult.student.secondYear, dataResult.student.thirdYear, dataResult.student.fourthYear],
                                backgroundColor: [
                                    'rgba(75, 192, 192, 0.5)',
                                    'rgba(255, 99, 132, 0.5)',
                                    'rgba(255, 206, 86, 0.5)',
                                    'rgba(54, 162, 235, 0.5)',
                                ],
                                borderColor: [
                                    'rgba(75, 192, 192, 1)',
                                    'rgba(255, 99, 132, 1)',
                                    'rgba(255, 206, 86, 1)',
                                    'rgba(54, 162, 235, 1)',
                                ],
                                borderWidth: 1
                            }]
                        },
                        options: {
                            scales: {
                                y: {
                                    beginAtZero: true
                                }
                            }
                        }
                    });

                    getSubjectPerYearLevel(null);
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

        $("#input-question-subject").change(function() {
            getSubjectDashboard($("#input-question-subject").val());
        });

        $("#input-subject").change(function() {
            getSubjectPerYearLevel($("#input-subject").val());
        });

        function getSubjectPerYearLevel(subjectID) {
            $.ajax({
                url: "../../common/db.php",
                type: "POST",
                data: {
                    action: 'get-subject-per-year-level',
                    subjectID: subjectID
                },
                cache: false,
                success: function(dataResult) {
                    var dataResult = JSON.parse(dataResult);
                    var number1 = parseFloat(dataResult.firstYear);
                    var number2 = parseFloat(dataResult.secondYear);
                    var number3 = parseFloat(dataResult.thirdYear);
                    var number4 = parseFloat(dataResult.fourthYear);

                    // Calculate the total
                    var total = number1 + number2 + number3 + number4;

                    // Calculate the percentage for each number
                    var percentage1 = (number1 / total) * 100;
                    var percentage2 = (number2 / total) * 100;
                    var percentage3 = (number3 / total) * 100;
                    var percentage4 = (number4 / total) * 100;

                    $("#subject-first-year").html(number1);
                    $("#first-year-percent-text").html(percentage1.toFixed(2) + "%");
                    $("#first-year-percent-progress").removeAttr("style");
                    $("#first-year-percent-progress").attr("style", "width:" + percentage1.toFixed(2) + "%");

                    $("#subject-second-year").html(number2);
                    $("#second-year-percent-text").html(percentage2.toFixed(2) + "%");
                    $("#second-year-percent-progress").removeAttr("style");
                    $("#second-year-percent-progress").attr("style", "width:" + percentage2.toFixed(2) + "%");

                    $("#subject-third-year").html(number3);
                    $("#third-year-percent-text").html(percentage3.toFixed(2) + "%");
                    $("#third-year-percent-progress").removeAttr("style");
                    $("#third-year-percent-progress").attr("style", "width:" + percentage3.toFixed(2) + "%");

                    $("#subject-fourth-year").html(number4);
                    $("#fourth-year-percent-text").html(percentage4.toFixed(2) + "%");
                    $("#fourth-year-percent-progress").removeAttr("style");
                    $("#fourth-year-percent-progress").attr("style", "width:" + percentage4.toFixed(2) + "%");
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

        function percentage(partialValue, totalValue) {
            return (100 * partialValue) / totalValue;
        }

        function getSubjectDashboard(subjectID) {
            $.ajax({
                url: "../../common/db.php",
                type: "POST",
                data: {
                    action: 'get-subject-dashboard',
                    subjectID: subjectID
                },
                cache: false,
                success: function(dataResult) {
                    var dataResult = JSON.parse(dataResult);
                    var questionData = [dataResult.unanswered, dataResult.answered];
                    var questionLabels = ["Unanswered", "Answered"];
                    createTwoPieChart("subject-chart", questionLabels, questionData);
                    $("#question-answered").html(dataResult.answered);
                    $("#question-unanswered").html(dataResult.unanswered);
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

        function getSubjectList() {
            $.ajax({
                url: "../../common/db.php",
                type: "POST",
                data: {
                    action: 'retrieve-active-subject-list'
                },
                cache: false,
                success: function(dataResult) {
                    var subjectOptions = `<option value=''>All</option>`;
                    var dataResult = JSON.parse(dataResult);
                    if (dataResult.statusCode == 200) {
                        dataResult.subjectList.forEach(subject => {
                            subjectOptions += `<option value='${subject['subjectID']}'>${subject['subject']}</option>`;
                        });
                    }
                    $(".input-subject").html(subjectOptions);
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
    });
</script>