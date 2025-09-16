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

<body class="body-custom">

  <main>
      <!-- Login 5 - Bootstrap Brain Component -->
      <section class="p-3 p-md-4 p-xl-5">
          <div class="container">
              <div class="card border-light-subtle shadow-sm pb-3">
                  <div class="row g-0">
                      <div class="col-12 col-md-6 text-bg-light">
                          <div class="d-flex align-items-center justify-content-center h-100">
                              <div class="col-10 col-xl-8 py-3 text-center">
                                  <img class="img-fluid rounded mb-2" loading="lazy" src="assets/img/CnW_Punjab_Logo.png" alt="C&W Logo" style="width:230px;height:150px;">
                                    <!-- <hr class="border-primary-subtle mb-2">-->
                                  <h3 class="card-title pb-0 fs-4 mt-1">
                                      Lab Testing Automation for Road Research & Materials
                                  </h3>
                                  <p class="">Road Research & Material Testing Institute is an innovative, futuristic research institute that provides modern construction solutions, quality assurance and also acts as a regulator, facilitator for the public and private road construction</p>
                              </div>
                          </div>
                      </div>
                      <div class="col-12 col-md-6">
                          <div class="card-body p-3 p-md-4 p-xl-5">
                              <div class="row">
                                  <div class="col-12">
                                      <div class="mb-5">
                                          <h3 class="card-title pb-0 fs-4">Login to Your Account</h3>
                                          <p class="small">Enter your username & password to login</p>
                                      </div>
                                  </div>
                              </div>

                              <!-- Error message -->
                              <?php if (isset($_GET['error'])): ?>
                                  <div class="alert alert-danger alert-dismissible fade show p-2" role="alert">
                                      <?php echo htmlspecialchars($_GET['error']); ?>
                                      <button type="button" class="btn-close p-2 mt-1" data-bs-dismiss="alert" aria-label="Close"></button>
                                  </div>
                              <?php endif; ?>

                              <form role="form" method="post" action="services/login.php" >
                                  <div class="row gy-3 gy-md-4 overflow-hidden">
                                      <div class="col-12">
                                          <label for="username" class="form-label">Username <span class="text-danger">*</span></label>
                                          <input type="text" class="form-control" name="username" id="username" placeholder="Enter Username" required>
                                      </div>
                                      <div class="col-12">
                                          <label for="password" class="form-label">Password <span class="text-danger">*</span></label>
                                          <input type="password" class="form-control" name="password" id="password" value="" required>
                                      </div>
<!--                                      <div class="col-12">-->
<!--                                          <div class="form-check">-->
<!--                                              <input class="form-check-input" type="checkbox" value="" name="remember_me" id="remember_me">-->
<!--                                              <label class="form-check-label text-secondary" for="remember_me">-->
<!--                                                  Keep me logged in-->
<!--                                              </label>-->
<!--                                          </div>-->
<!--                                      </div>-->
                                      <div class="col-12">
                                          <div class="d-grid">
                                              <button class="btn bsb-btn-xl btn-primary btn-primary-custom" type="submit">Log in</button>
                                          </div>
                                      </div>
                                  </div>
                              </form>
<!--                              <div class="row">-->
<!--                                  <div class="col-12">-->
<!--                                      <hr class="mt-5 mb-4 border-secondary-subtle">-->
<!--                                      <div class="d-flex gap-2 gap-md-4 flex-column flex-md-row justify-content-md-end">-->
<!--                                          <a href="#!" class="link-secondary text-decoration-none">Create new account</a>-->
<!--                                          <a href="#!" class="link-secondary text-decoration-none">Forgot password</a>-->
<!--                                      </div>-->
<!--                                  </div>-->
<!--                              </div>-->
                          </div>
                      </div>
                  </div>
              </div>
          </div>
      </section>
  </main><!-- End #main -->

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