<?php
session_start();
if (!isset($_SESSION['username'])) {
    header("location:index.php");
} else {
//    $session_data = [
//        'username' => isset($_SESSION['username']) ? htmlspecialchars($_SESSION['username'], ENT_QUOTES, 'UTF-8') : '',
//        'role_id' => isset($_SESSION['role_id']) ? htmlspecialchars($_SESSION['role_id'], ENT_QUOTES, 'UTF-8') : '',
//        'city_id' => isset($_SESSION['city_id']) ? htmlspecialchars($_SESSION['city_id'], ENT_QUOTES, 'UTF-8') : '',
//        'user_id' => isset($_SESSION['id']) ? htmlspecialchars($_SESSION['id'], ENT_QUOTES, 'UTF-8') : '',
//    ];
//    $json_session_data = json_encode($session_data);
}
//if ($_SESSION['role_id'] === 4 || $_SESSION['role_id'] === 5) {
//
//}else{
//    header("location:industry_SurveyProgress.php");
//}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <title>C&W - RR&MTI</title>
    <!-- Favicons -->
    <link href="assets/img/img16.png" rel="icon">
    <link href="assets/img/img16.png" rel="apple-touch-icon">
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
          rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css">
    <link href="assets/vendor/fontawesome-pro-6.5.1/css/all.min.css" rel="stylesheet">
    <link href="assets/vendor/lightbox2/2.6/lightbox.css" rel="stylesheet">
    <link href="assets/vendor/select2/4.1.0/dist/css/select2.css" rel="stylesheet"/>
    <link href="assets/vendor/select2/4.1.0/dist/theme/select2-bootstrap4.css" rel="stylesheet"/>

    <link href="assets/vendor/datatables/1.13.6/css/dataTables.bootstrap5.min.css" rel="stylesheet"/>
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.4.1/css/buttons.dataTables.min.css">

    <link href="assets/vendor/sweetalert2/dist/sweetalert2.css" rel="stylesheet"/>
    <link href="assets/vendor/OwlCarousel2-2.3.4/dist/assets/owl.carousel.css" rel="stylesheet">
    <link href="assets/vendor/OwlCarousel2-2.3.4/dist/assets/owl.theme.default.min.css" rel="stylesheet">
    <link href="assets/vendor/driverjs/css/driver.css" rel="stylesheet"/>

    <!--esri library style link -->
    <link rel="stylesheet" href="https://js.arcgis.com/4.31/esri/themes/light/main.css">

  <!-- Template Main CSS File -->
  <link href="assets/css/style.css" rel="stylesheet">
  <link href="assets/css/custom-style.css" rel="stylesheet">
</head>

<body class="toggle-sidebar" style="background-color: #f7f9fc">

  <?php include ("./includes/header.php")?>
  <?php include ("./includes/sidebar.php")?>

  <main id="main" class="main">
    <section class="section dashboard">



        <div class="container-fluid py-3">
            <div class="mb-4">
                <h4 class="fw-bold mb-1 h4-blue">Project Task</h4>
            </div>
            <div class="row gx-4 gy-3">
                <div class="col">
                    <div class="card new-project-card text-center">
                        <div class="card-body">
                            <div class="icon-circle mb-3">
                                <i class="fa-duotone fa-solid fa-circle-plus"></i>
                            </div>
                            <h5 class="card-title">Create New Project</h5>
                            <p class="card-text text-muted">Start a new project by adding basic details</p>
                            <a href="projects.php" class="btn btn-primary btn-primary-custom">
                                <i class="fa-duotone fa-solid fa-rocket-launch"></i>&nbsp;Get Started</a>
                        </div>
                    </div>
                </div>
            </div>



            <div class="mb-4">
                <h4 class="fw-bold mb-1 h4-blue">Functional Units</h4>
            </div>

            <div class="row gx-4 gy-3">
                <!-- Card 1 -->
                <div class="col">
                    <a href="aggregate_section.php" class="card card-pro h-100 text-center">
                        <div class="card-topbar"></div>
                        <div class="logo-circle"><i class="fa-duotone fa-solid fa-shovel"></i></div>
                        <div class="card-body">
                            <h5 class="card-title">Aggregate Section</h5>
                        </div>
                    </a>
                </div>

                <!-- Card 2 -->
                <div class="col">
                    <a href="bituminous_section.php" class="card card-pro h-100 text-center">
                        <div class="card-topbar"></div>
                        <div class="logo-circle"><i class="fa-duotone fa-solid fa-road"></i></div>
                        <div class="card-body">
                            <h5 class="card-title">Bituminous Mix Design</h5>
                        </div>
                    </a>
                </div>

                <!-- Card 3 -->
                <div class="col">
                    <a href="chemicals_section.php" class="card card-pro h-100 text-center">
                        <div class="card-topbar"></div>
                        <div class="logo-circle"><i class="fa-duotone fa-solid fa-flask-gear"></i></div>
                        <div class="card-body">
                            <h5 class="card-title">Chemical Section</h5>
                        </div>
                    </a>
                </div>

                <!-- Card 4 -->
                <div class="col">
                    <a href="physical_section.php" class="card card-pro h-100 text-center">
                        <div class="card-topbar"></div>
                        <div class="logo-circle"><i class="fa-duotone fa-solid fa-trowel-bricks"></i></div>
                        <div class="card-body">
                            <h5 class="card-title">Physical Section</h5>
                        </div>
                    </a>
                </div>

                <!-- Card 5 -->
                <div class="col">
                    <a href="soil_section.php" class="card card-pro h-100 text-center">
                        <div class="card-topbar"></div>
                        <div class="logo-circle"><i class="fa-duotone fa-solid fa-person-digging"></i></div>
                        <div class="card-body">
                            <h5 class="card-title">Soil Section</h5>
                        </div>
                    </a>
                </div>

                <!-- Card 6 -->
<!--                <div class="col-md-3">-->
<!--                    <a href="#" class="card card-pro h-100 text-center">-->
<!--                        <div class="card-topbar"></div>-->
<!--                        <div class="logo-circle bg-custom"><i class="fa-duotone fa-solid fa-window-frame-open"></i></div>-->
<!--                        <div class="card-body">-->
<!--                            <h5 class="card-title">One Window</h5>-->
<!--                        </div>-->
<!--                    </a>-->
<!--                </div>-->
            </div>
        </div>
    </section>


    <section class="section dashboard" style="display: none">
      <div class="row">

        <!-- Right side columns -->
        <div class="col-lg-12">
          <!-- Recent Activity -->
          <div class="card">
            <div class="filter">
              <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
            </div>

            <div class="card-body">
              <h5 class="card-title">Card Header</h5>
                <table id="dtRecords" class="table table-bordered table-striped table-hover" style="width:100%">
                    <thead>
                    <tr>
                        <th>Id</th>
                        <th>district</th>
                        <th>road_id_main</th>
                        <th>road_name</th>
                        <th>stage</th>
                        <th>test_of_type</th>
                        <th>result</th>
                        <th>comments</th>
                        <th>picture</th>
                    </tr>
                    </thead>
                </table>
            </div>
          </div><!-- End Recent Activity -->
        </div><!-- End Right side columns -->
      </div>
    </section>

  </main><!-- End #main -->

  <?php include ("./includes/footer.php")?>

  <!-- Vendor JS Files -->
  <script src="assets/vendor/jquery/3.3.1/dist/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.3.3/jspdf.min.js"></script>
  <script src="https://html2canvas.hertzen.com/dist/html2canvas.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/moment/2.29.4/moment.min.js"></script>
  <script src="assets/vendor/daterangepicker/3.1/daterangepicker.min.js"></script>
  <script src="assets/vendor/lightbox2/2.6/jqueryrotate.min.js"></script>
  <script src="assets/vendor/lightbox2/2.6/lightbox.js"></script>
  <script src="assets/vendor/sweetalert2/dist/sweetalert2.all.min.js"></script>

  <script src="assets/vendor/datatables/1.13.6/js/jquery.dataTables.min.js"></script>
  <script src="assets/vendor/datatables/1.13.6/js/dataTables.bootstrap5.min.js"></script>
  <script src="https://cdn.datatables.net/buttons/2.4.1/js/dataTables.buttons.min.js"></script>
  <!-- Buttons CSV export -->
  <script src="https://cdn.datatables.net/buttons/2.4.1/js/buttons.html5.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.10.1/jszip.min.js"></script>

  <script src="assets/vendor/fontawesome-pro-6.5.1/js/all.min.js"></script>
  <script src="assets/vendor/OwlCarousel2-2.3.4/dist/owl.carousel.min.js"></script>
  <script src="assets/vendor/select2/4.1.0/dist/js/select2.full.js"></script>

  <!-- Load Highcharts Stock (includes core + stock) -->
  <script src="assets/vendor/highcharts-stock-12.3.0/code/highstock.js"></script>
  <!-- Load Highcharts More (for gauge charts) -->
  <script src="assets/vendor/highcharts-stock-12.3.0/code/highcharts-more.js"></script>
  <!-- Load Solid Gauge module (optional for your gauge chart) -->
  <script src="assets/vendor/highcharts-stock-12.3.0/code/modules/solid-gauge.js"></script>
  <!-- Optional: exporting & accessibility -->
  <script src="assets/vendor/highcharts-stock-12.3.0/code/modules/exporting.js"></script>
  <script src="assets/vendor/highcharts-stock-12.3.0/code/modules/accessibility.js"></script>

  <script src="https://js.arcgis.com/4.31/"></script>
  <script src="assets/vendor/terraformer/terraformer-1.0.9.min.js"></script>
  <script src="assets/vendor/terraformer/terraformer-arcgis-parser-1.1.0.min.js"></script>
  <script src="assets/vendor/terraformer/terraformer-wkt-parser-1.1.0.min.js"></script>

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>
  <script src="assets/js/dashboard.js"></script>

</body>

</html>