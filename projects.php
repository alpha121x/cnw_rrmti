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
            <div class="container py-2 d-flex justify-content-between">
                <div class="mb-2">
                    <h4 class="fw-bold mb-1 h4-blue">New Project Information</h4>
                </div>
                <div>
                    <a href="dashboard.php" class="btn btn-outline-primary btn-sm">
                        <i class="fa-duotone fa-solid fa-turn-down-left"></i> Back to Main
                    </a>
                </div>
            </div>
            <div class="container py-2">
                <div class="row justify-content-center">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">Add New Project</h5>
                                <form id="projectForm"
                                    action="services/save_project.php" enctype="multipart/form-data" method="POST">
                                    <div class="row mb-3">
                                        <div class="col-md-12">
                                            <label class="form-label">Project Name <span class="text-danger">*</span></label>
                                            <input type="text" class="form-control" name="project_name" required>
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <div class="col-md-6">
                                            <label class="form-label">Site Address</label>
                                            <input type="text" class="form-control" name="site_address">
                                        </div>
                                        <div class="col-md-6">
                                            <label class="form-label">Client Name <span class="text-danger">*</span></label>
                                            <input type="text" class="form-control" name="client_name" required>
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <div class="col-md-6">
                                            <label class="form-label">Focal Person</label>
                                            <input type="text" class="form-control" name="focal_person">
                                        </div>
                                        <div class="col-md-6">
                                            <label class="form-label">Focal Contact No</label>
                                            <input type="text" class="form-control" name="fc_contact_no">
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <div class="col-md-6">
                                            <label class="form-label">Officer ID</label>
                                            <input type="text" class="form-control" name="officer_id">
                                        </div>
                                        <div class="col-md-6">
                                            <label class="form-label">District</label>
                                            <input type="text" class="form-control" name="district_name">
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <div class="col-md-6">
                                            <label class="form-label">Ref Letter No</label>
                                            <input type="text" class="form-control" name="ref_letter_no">
                                        </div>
                                        <div class="col-md-6">
                                            <label class="form-label">Upload Letter Document</label>
                                            <input type="file" class="form-control" name="letter_document" accept=".pdf,.doc,.docx,.jpg,.png">
                                        </div>
                                    </div>

                                    <div class="d-flex justify-content-end">
                                        <button type="submit" class="btn btn-primary btn-primary-custom">
                                            <i class="fa-duotone fa-solid fa-paper-plane"></i> Save Project
                                        </button>
                                    </div>
                                </form>



                            </div>
                        </div>
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
                                    <th>Site Address</th>
                                    <th>Focal Person</th>
                                    <th>District</th>
                                    <th>Date Time</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody></tbody>
                        </table>


                        <div class="modal fade" id="projectDetailsModal" tabindex="-1" aria-hidden="true">
                            <div class="modal-dialog modal-lg">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title">Project Details</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                    </div>
                                    <div class="modal-body">
                                        <table class="table table-bordered">
                                            <tr>
                                                <th>Project</th>
                                                <td id="modalProjectName"></td>
                                            </tr>
                                            <tr>
                                                <th>Client</th>
                                                <td id="modalClientName"></td>
                                            </tr>
                                            <tr>
                                                <th>Site Address</th>
                                                <td id="modalSiteAddress"></td>
                                            </tr>
                                            <tr>
                                                <th>Focal Person</th>
                                                <td id="modalFocalPerson"></td>
                                            </tr>
                                            <tr>
                                                <th>Contact No</th>
                                                <td id="modalContactNo"></td>
                                            </tr>
                                            <tr>
                                                <th>Officer ID</th>
                                                <td id="modalOfficerId"></td>
                                            </tr>
                                            <tr>
                                                <th>District</th>
                                                <td id="modalDistrict"></td>
                                            </tr>
                                            <tr>
                                                <th>Ref Letter No</th>
                                                <td id="modalRefLetter"></td>
                                            </tr>
                                            <tr>
                                                <th>Created By</th>
                                                <td id="modalCreatedBy"></td>
                                            </tr>
                                            <tr>
                                                <th>Date Time</th>
                                                <td id="modalDateTime"></td>
                                            </tr>
                                        </table>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                    </div>
                                </div>
                            </div>
                        </div>


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