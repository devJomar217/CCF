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

<div class="row">

    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-primary shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                            Student</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800" id="dashboard-student"></div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-users fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-success shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                            Question</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800" id="dashboard-question"></div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-question fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-info shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                            Answer</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800" id="dashboard-answer"></div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-comments fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Pending Requests Card Example -->
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-warning shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                            Student Account Request</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800" id="dashboard-student-account-request"></div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-clipboard fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<div class="row">
    <!-- Pie Chart -->
    <div class="col-xl-4 col-lg-5">
        <div class="card shadow mb-4">
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary">Students</h6>
            </div>
            <div class="card-body">
                <div class="chart-pie pt-4 pb-2">
                    <canvas id="pie-chart"></canvas>
                </div>
                <div class="mt-4 text-center small">
                    <span class="mr-2">
                        <i class="fas fa-circle text-primary"></i> First Year
                    </span>
                    <span class="mr-2">
                        <i class="fas fa-circle text-success"></i> Second Year
                    </span>
                    <span class="mr-2">
                        <i class="fas fa-circle text-info"></i> Third Year
                    </span>
                    <span class="mr-2">
                        <i class="fas fa-circle text-danger"></i> Fourth Year
                    </span>
                </div>
            </div>
        </div>
    </div>

    <div class="col-xl-4 col-lg-4">
        <div class="card shadow mb-4">
            <!-- Card Header - Dropdown -->
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary">Question</h6>
            </div>
            <!-- Card Body -->
            <div class="card-body">
                <div class="chart-pie pt-4 pb-2">
                    <canvas id="subject-chart"></canvas>
                </div>
                <div class="mt-4 text-center small">
                    <span class="mr-2">
                        <i class="fas fa-circle text-success"></i> Answered
                    </span>
                    <span class="mr-2">
                        <i class="fas fa-circle text-danger"></i> Unanswered
                    </span>
                </div>
            </div>
        </div>
    </div>

    <!-- Content Column -->
    <div class="col-lg-4 mb-10">
        <!-- Project Card Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <div class="row">
                    <div class="col-lg-12 align-middle">
                        <h6 class="m-0 font-weight-bold text-primary">Subject</h6>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <h4 class="small font-weight-bold">First Year<span class="float-right">20%</span></h4>
                <div class="progress mb-4">
                    <div class="progress-bar bg-prirmary" role="progressbar" style="width: 20%" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100"></div>
                </div>
                <h4 class="small font-weight-bold">Second Year<span class="float-right">40%</span></h4>
                <div class="progress mb-4">
                    <div class="progress-bar bg-success" role="progressbar" style="width: 40%" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100"></div>
                </div>
                <h4 class="small font-weight-bold">Third Year<span class="float-right">30%</span></h4>
                <div class="progress mb-4">
                    <div class="progress-bar bg-warning" role="progressbar" style="width: 30%" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100"></div>
                </div>
                <h4 class="small font-weight-bold">Fourth Year<span class="float-right">10%</span></h4>
                <div class="progress mb-4">
                    <div class="progress-bar bg-danger" role="progressbar" style="width: 10%" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100"></div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    $(document).ready(function() {
        getDashboardData();

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
                    $("#dashboard-student-account-request").html(dataResult.student.pending);
                    $("#dashboard-student").html(dataResult.student.active);
                    $("#dashboard-question").html(dataResult.forum.question);
                    $("#dashboard-answer").html(dataResult.forum.answer);
                    var studentData = [dataResult.student.firstYear, dataResult.student.secondYear, dataResult.student.thirdYear, dataResult.student.fourthYear];
                    var studentLabels = ["First Year", "Second Year", "Third Year", "Fourth Year"];
                    createPieChart("pie-chart", studentLabels, studentData);

                    var questionData = [dataResult.forum.unanswered, dataResult.forum.answered];
                    var questionLabels = ["Unanswered", "Answered"];
                    createTwoPieChart("subject-chart", questionLabels, questionData);
                    
                },
                complete: function (data) {
                    setTimeout(() => {
                        
                    }, 1000);
                }
            });
        }

        // Set new default font family and font color to mimic Bootstrap's default styling
Chart.defaults.global.defaultFontFamily = 'Nunito', '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
Chart.defaults.global.defaultFontColor = '#858796';

// Pie Chart Example


function createPieChart(id, labels, data) {
    var ctx = document.getElementById(id);
    new Chart(ctx, {
        type: 'doughnut',
        data: {
            labels: labels,
            datasets: [{
                data: data,
                backgroundColor: ['#4e73df', '#1cc88a', '#36b9cc', 'red'],
                hoverBackgroundColor: ['#2e59d9', '#17a673', '#2c9faf'],
                hoverBorderColor: "rgba(234, 236, 244, 1)",
            }],
        },
        options: {
            maintainAspectRatio: false,
            tooltips: {
                backgroundColor: "rgb(255,255,255)",
                bodyFontColor: "#858796",
                borderColor: '#dddfeb',
                borderWidth: 1,
                xPadding: 15,
                yPadding: 15,
                displayColors: false,
                caretPadding: 10,
            },
            legend: {
                display: false
            },
            cutoutPercentage: 80,
        },
    });
}

function createTwoPieChart(id, labels, data) {
    var ctx = document.getElementById(id);
    new Chart(ctx, {
        type: 'doughnut',
        data: {
            labels: labels,
            datasets: [{
                data: data,
                backgroundColor: ['#e74a3b', '#1cc88a'],
                hoverBackgroundColor: ['#e74a3b', '#1cc88a'],
                hoverBorderColor: "rgba(234, 236, 244, 1)",
            }],
        },
        options: {
            maintainAspectRatio: false,
            tooltips: {
                backgroundColor: "rgb(255,255,255)",
                bodyFontColor: "#858796",
                borderColor: '#dddfeb',
                borderWidth: 1,
                xPadding: 15,
                yPadding: 15,
                displayColors: false,
                caretPadding: 10,
            },
            legend: {
                display: false
            },
            cutoutPercentage: 80,
            animation: {
                onComplete: function() {
                    window.print();
                    setTimeout(window.close, 0);
                }
            },
        },
    });
}



var ctxSubject = document.getElementById("subject-chart");
var subjectChart = new Chart(ctxSubject, {
    type: 'doughnut',
    data: {
        labels: ["Answered", "Unanswered"],
        datasets: [{
            data: [55, 10],
            backgroundColor: ['#1cc88a', 'red'],
            hoverBackgroundColor: ['#2e59d9', '#2c9faf'],
            hoverBorderColor: "rgba(234, 236, 244, 1)",
        }],
    },
    options: {
        maintainAspectRatio: false,
        tooltips: {
            backgroundColor: "rgb(255,255,255)",
            bodyFontColor: "#858796",
            borderColor: '#dddfeb',
            borderWidth: 1,
            xPadding: 15,
            yPadding: 15,
            displayColors: false,
            caretPadding: 10,
        },
        legend: {
            display: false
        },
        cutoutPercentage: 80,
    },
});
    });
</script>