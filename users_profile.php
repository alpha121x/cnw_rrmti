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

<body class="toggle-sidebar">

<?php include ("./includes/header.php")?>
<?php include ("./includes/sidebar.php")?>

<main id="main" class="main">

    <div class="pagetitle">
        <h1>User Profile</h1>
    </div><!-- End Page Title -->

    <section class="section profile">
        <div class="row">
            <div class="col-xl-4">

                <div class="card">
                    <div class="card-body profile-card pt-4 d-flex flex-column align-items-center">

                        <img src="assets/img/noImg.png" alt="Profile" class="rounded-circle">
                        <h2><?php echo $_SESSION['display_name']; ?></h2>
                        <h3><?php echo $_SESSION['designation']; ?></h3>
<!--                        <div class="social-links mt-2">-->
<!--                            <a href="#" class="twitter"><i class="bi bi-twitter"></i></a>-->
<!--                            <a href="#" class="facebook"><i class="bi bi-facebook"></i></a>-->
<!--                            <a href="#" class="instagram"><i class="bi bi-instagram"></i></a>-->
<!--                            <a href="#" class="linkedin"><i class="bi bi-linkedin"></i></a>-->
<!--                        </div>-->
                    </div>
                </div>

            </div>

            <div class="col-xl-8">

                <div class="card">
                    <div class="card-body pt-3">
                        <!-- Bordered Tabs -->
                        <ul class="nav nav-tabs nav-tabs-bordered">
                            <li class="nav-item">
                                <button class="nav-link active" data-bs-toggle="tab" data-bs-target="#profile-overview">Overview</button>
                            </li>
<!--                            <li class="nav-item">-->
<!--                                <button class="nav-link" data-bs-toggle="tab" data-bs-target="#profile-edit">Edit Profile</button>-->
<!--                            </li>-->
                        </ul>
                        <div class="tab-content pt-2">
                            <div class="tab-pane fade show active profile-overview" id="profile-overview">
<!--                                <h5 class="card-title">About</h5>-->
<!--                                <p class="small fst-italic">Sunt est soluta temporibus accusantium neque nam maiores cumque temporibus. Tempora libero non est unde veniam est qui dolor. Ut sunt iure rerum quae quisquam autem eveniet perspiciatis odit. Fuga sequi sed ea saepe at unde.</p>-->

                                <h5 class="card-title">Profile Details</h5>

                                <div class="row">
                                    <div class="col-lg-3 col-md-4 label ">Username</div>
                                    <div class="col-lg-9 col-md-8"><?php echo $_SESSION['username']; ?></div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-3 col-md-4 label ">Full Name</div>
                                    <div class="col-lg-9 col-md-8"><?php echo $_SESSION['display_name']; ?></div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-3 col-md-4 label">Designation</div>
                                    <div class="col-lg-9 col-md-8"><?php echo $_SESSION['designation']; ?></div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-3 col-md-4 label">Location/District</div>
                                    <div class="col-lg-9 col-md-8"><?php echo $_SESSION['district']; ?></div>
                                </div>

                            </div>
                            <div class="tab-pane fade profile-edit pt-3" id="profile-edit">

                                <!-- Profile Edit Form -->
                                <form>
                                    <div class="row mb-3">
                                        <label for="profileImage" class="col-md-4 col-lg-3 col-form-label">Profile Image</label>
                                        <div class="col-md-8 col-lg-9">
                                            <img src="assets/img/profile-img.jpg" alt="Profile">
                                            <div class="pt-2">
                                                <a href="#" class="btn btn-primary btn-sm" title="Upload new profile image"><i class="bi bi-upload"></i></a>
                                                <a href="#" class="btn btn-danger btn-sm" title="Remove my profile image"><i class="bi bi-trash"></i></a>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <label for="fullName" class="col-md-4 col-lg-3 col-form-label">Full Name</label>
                                        <div class="col-md-8 col-lg-9">
                                            <input name="fullName" type="text" class="form-control" id="fullName" value="Kevin Anderson">
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <label for="about" class="col-md-4 col-lg-3 col-form-label">About</label>
                                        <div class="col-md-8 col-lg-9">
                                            <textarea name="about" class="form-control" id="about" style="height: 100px">Sunt est soluta temporibus accusantium neque nam maiores cumque temporibus. Tempora libero non est unde veniam est qui dolor. Ut sunt iure rerum quae quisquam autem eveniet perspiciatis odit. Fuga sequi sed ea saepe at unde.</textarea>
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <label for="company" class="col-md-4 col-lg-3 col-form-label">Company</label>
                                        <div class="col-md-8 col-lg-9">
                                            <input name="company" type="text" class="form-control" id="company" value="Lueilwitz, Wisoky and Leuschke">
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <label for="Job" class="col-md-4 col-lg-3 col-form-label">Job</label>
                                        <div class="col-md-8 col-lg-9">
                                            <input name="job" type="text" class="form-control" id="Job" value="Web Designer">
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <label for="Country" class="col-md-4 col-lg-3 col-form-label">Country</label>
                                        <div class="col-md-8 col-lg-9">
                                            <input name="country" type="text" class="form-control" id="Country" value="USA">
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <label for="Address" class="col-md-4 col-lg-3 col-form-label">Address</label>
                                        <div class="col-md-8 col-lg-9">
                                            <input name="address" type="text" class="form-control" id="Address" value="A108 Adam Street, New York, NY 535022">
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <label for="Phone" class="col-md-4 col-lg-3 col-form-label">Phone</label>
                                        <div class="col-md-8 col-lg-9">
                                            <input name="phone" type="text" class="form-control" id="Phone" value="(436) 486-3538 x29071">
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <label for="Email" class="col-md-4 col-lg-3 col-form-label">Email</label>
                                        <div class="col-md-8 col-lg-9">
                                            <input name="email" type="email" class="form-control" id="Email" value="k.anderson@example.com">
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <label for="Twitter" class="col-md-4 col-lg-3 col-form-label">Twitter Profile</label>
                                        <div class="col-md-8 col-lg-9">
                                            <input name="twitter" type="text" class="form-control" id="Twitter" value="https://twitter.com/#">
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <label for="Facebook" class="col-md-4 col-lg-3 col-form-label">Facebook Profile</label>
                                        <div class="col-md-8 col-lg-9">
                                            <input name="facebook" type="text" class="form-control" id="Facebook" value="https://facebook.com/#">
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <label for="Instagram" class="col-md-4 col-lg-3 col-form-label">Instagram Profile</label>
                                        <div class="col-md-8 col-lg-9">
                                            <input name="instagram" type="text" class="form-control" id="Instagram" value="https://instagram.com/#">
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <label for="Linkedin" class="col-md-4 col-lg-3 col-form-label">Linkedin Profile</label>
                                        <div class="col-md-8 col-lg-9">
                                            <input name="linkedin" type="text" class="form-control" id="Linkedin" value="https://linkedin.com/#">
                                        </div>
                                    </div>

                                    <div class="text-center">
                                        <button type="submit" class="btn btn-primary">Save Changes</button>
                                    </div>
                                </form><!-- End Profile Edit Form -->

                            </div>
                        </div><!-- End Bordered Tabs -->

                    </div>
                </div>

            </div>
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