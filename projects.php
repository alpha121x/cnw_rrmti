<?php
session_start();
if (!isset($_SESSION['username'])) {
    header("location:index.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>C&W - Projects</title>

  <!-- Favicons -->
  <link href="assets/img/img16.png" rel="icon">

  <!-- Bootstrap + DataTables -->
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/datatables/1.13.6/css/dataTables.bootstrap5.min.css" rel="stylesheet" />
  <link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.4.1/css/buttons.dataTables.min.css">

  <!-- FontAwesome -->
  <link href="assets/vendor/fontawesome-pro-6.5.1/css/all.min.css" rel="stylesheet">

  <!-- Custom CSS -->
  <link href="assets/css/style.css" rel="stylesheet">
  <link href="assets/css/custom-style.css" rel="stylesheet">
</head>

<body class="toggle-sidebar">
  <?php include("./includes/header.php") ?>
  <?php include("./includes/sidebar.php") ?>

  <main id="main" class="main">
    <section class="section dashboard">
      <div class="container py-2">
        <h4 class="fw-bold mb-3 h4-blue">Projects Management</h4>

        <!-- Project Form -->
        <div class="card mb-3">
          <div class="card-body">
            <h5 class="card-title">Add New Project</h5>
            <form id="projectForm">
              <div class="row mb-3">
                <div class="col-md-6">
                  <label class="form-label">Project Name <span class="text-danger">*</span></label>
                  <input type="text" class="form-control" name="project" required>
                </div>
                <div class="col-md-6">
                  <label class="form-label">Client <span class="text-danger">*</span></label>
                  <input type="text" class="form-control" name="client" required>
                </div>
              </div>
              <div class="row mb-3">
                <div class="col-md-6">
                  <label class="form-label">Ref # <span class="text-danger">*</span></label>
                  <input type="text" class="form-control" name="ref" required>
                </div>
                <div class="col-md-6">
                  <label class="form-label">GR # <span class="text-danger">*</span></label>
                  <input type="text" class="form-control" name="gr" required>
                </div>
              </div>
              <div class="row mb-3">
                <div class="col-md-6">
                  <label class="form-label">Lab # <span class="text-danger">*</span></label>
                  <input type="text" class="form-control" name="lab" required>
                </div>
                <div class="col-md-6">
                  <label class="form-label">Receiving Date <span class="text-danger">*</span></label>
                  <input type="date" class="form-control" name="receiving_date" required>
                </div>
              </div>
              <div class="d-flex justify-content-end">
                <button type="submit" class="btn btn-primary">
                  <i class="fa-duotone fa-solid fa-paper-plane"></i> Save Project
                </button>
              </div>
            </form>
          </div>
        </div>

        <!-- Projects Table -->
        <div class="card">
          <div class="card-body">
            <h5 class="card-title">Saved Projects</h5>
            <table id="projectsTable" class="table table-bordered table-striped">
              <thead>
                <tr>
                  <th>Project</th>
                  <th>Client</th>
                  <th>Ref #</th>
                  <th>GR #</th>
                  <th>Lab #</th>
                  <th>Receiving Date</th>
                </tr>
              </thead>
              <tbody></tbody>
            </table>
          </div>
        </div>
      </div>
    </section>
  </main>

  <?php include("./includes/footer.php") ?>

  <!-- Vendor JS -->
  <script src="assets/vendor/jquery/3.3.1/dist/jquery.min.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/datatables/1.13.6/js/jquery.dataTables.min.js"></script>
  <script src="assets/vendor/datatables/1.13.6/js/dataTables.bootstrap5.min.js"></script>

  <!-- Custom Script -->
  <script src="assets/js/projects.js"></script>
</body>
</html>
