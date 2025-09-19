$(document).ready(function () {
  const table = $("#projectsTable").DataTable({
    ajax: "services/get_projects.php",
    columns: [
      { data: "project" }, // Project
      { data: "client" }, // Client
      { data: "site_address" }, // Site Address
      { data: "focal_person" }, // Focal Person
      { data: "district" }, // District
      {
        data: "date_created", // Date Created
        render: function (data) {
          if (!data) return "";
          return new Date(data).toLocaleString();
          // e.g. "9/19/2025, 2:30:00 PM" (based on user’s locale)
        },
      },
    ],
  });


  $(document).ready(function () {
  $("#projectForm").on("submit", function (e) {
    e.preventDefault();

    let formData = new FormData(this);

    $.ajax({
      url: "services/save_project.php",
      type: "POST",
      data: formData,
      contentType: false,  // let jQuery set it automatically
      processData: false,  // don't convert FormData into a query string
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
      }
    });
  });
});

});
