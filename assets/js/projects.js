$(document).ready(function () {
  const table = $("#projectsTable").DataTable({
    ajax: "services/get_projects.php",
    columns: [
      { data: "project_name" }, // Project
      { data: "client_name" }, // Client
      { data: "site_address" }, // Site Address
      { data: "focal_person" }, // Focal Person
      { data: "district_name" }, // District
      {
        data: "date_time", // Date Created
        render: function (data) {
          if (!data) return "";
          return new Date(data).toLocaleString();
        },
      },
      {
        data: null,
        orderable: false,
        searchable: false,
        render: function (data, type, row) {
        return `
  <div class="d-flex gap-1">
    <button class="btn btn-sm btn-info view-details">
      <i class="fa-duotone fa-eye"></i>
    </button>
    <button class="btn btn-sm btn-danger view-pdf" data-pdf="http://localhost/cnw_rrmti/${row.letter_document}">
      <i class="fa-duotone fa-file-pdf"></i>
    </button>
  </div>
`;

        },
      },
    ],
  });

  // Handle view PDF click
  $(document).on("click", ".view-pdf", function () {
    const pdfPath = $(this).data("pdf");
    if (pdfPath) {
      window.open(pdfPath, "_blank"); // open PDF in new tab
    } else {
      alert("No PDF available for this project.");
    }
  });

  // Handle view details click
  $("#projectsTable").on("click", ".view-details", function () {
    const rowData = table.row($(this).closest("tr")).data();

    // Fill modal with rowData
    $("#modalProjectName").text(rowData.project_name);
    $("#modalClientName").text(rowData.client_name);
    $("#modalSiteAddress").text(rowData.site_address);
    $("#modalFocalPerson").text(rowData.focal_person);
    $("#modalContactNo").text(rowData.fc_contact_no);
    $("#modalOfficerId").text(rowData.officer_id);
    $("#modalDistrict").text(rowData.district_name);
    $("#modalRefLetter").text(rowData.ref_letter_no);
    $("#modalCreatedBy").text(rowData.created_by_user_id);
    $("#modalDateTime").text(new Date(rowData.date_time).toLocaleString());

    // Show modal
    $("#projectDetailsModal").modal("show");
  });

  $(document).ready(function () {
    $("#projectForm").on("submit", function (e) {
      e.preventDefault();

      let formData = new FormData(this);

      $.ajax({
        url: "services/save_project.php",
        type: "POST",
        data: formData,
        contentType: false, // let jQuery set it automatically
        processData: false, // don't convert FormData into a query string
        success: function (res) {
          let result;
          try {
            result = JSON.parse(res);
          } catch (err) {
            alert("⚠️ Unexpected response: " + res);
            return;
          }

          if (result.success) {
            alert("✅ " + result.message);
            $("#projectForm")[0].reset();
            if (typeof table !== "undefined") {
              table.ajax.reload(null, false); // reload DataTable if exists
            }
          } else {
            alert("❌ Error: " + result.message);
          }
        },
        error: function (xhr, status, error) {
          alert("❌ Error saving project: " + error);
        },
      });
    });
  });
});
