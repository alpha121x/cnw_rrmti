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
    <section class="section dashboard text-center">
        <h1>Under Maintenance</h1>
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