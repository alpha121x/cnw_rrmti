$(document).ready(function () {
  const table = $("#projectsTable").DataTable({
    ajax: "services/get_projects.php",
    columns: [
      { data: "project" },
      { data: "client" },
      { data: "ref" },
      { data: "gr" },
      { data: "lab" },
      { data: "receiving_date" }
    ]
  });

  // Handle form submit
  $("#projectForm").on("submit", function (e) {
    e.preventDefault();
    $.ajax({
      url: "services/save_project.php",
      type: "POST",
      data: $(this).serialize(),
      success: function (res) {
        alert("Project saved!");
        $("#projectForm")[0].reset();
        table.ajax.reload(null, false);
      },
      error: function () {
        alert("Error saving project.");
      }
    });
  });
});
