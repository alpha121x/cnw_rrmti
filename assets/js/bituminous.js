// assets/js/bituminous.js
$(document).ready(function () {
  let dtTable; // Variable to hold the DataTable instance
  let currentRowData; // Global variable to hold the current row data for modal/PDF

  // Enable Load Test Form button when required fields are filled
  $("#testingForm").on("change", function () {
    const selectedTest = $("#cmb_test").val();
    const project = $("#project").val().trim();
    const client = $("#client").val().trim();
    const ref = $("#ref").val().trim();
    const gr = $("#gr").val().trim();
    const lab = $("#lab").val().trim();
    const receivingDate = $("#receiving_date").val();
    const testNo = $("#test_no").val().trim();
    const performerName = $("#performer_name").val().trim();

    const isValid = selectedTest !== "%" && project && client && ref && gr && lab && receivingDate && testNo && performerName;
    $("#loadTestFormBtn").prop("disabled", !isValid);
  });

  // Load test form below the basic info card
  $("#loadTestFormBtn").on("click", function () {
    const selectedTest = $("#cmb_test").val();
    if (selectedTest === "%") return;

    let formUrl = "";
    switch (selectedTest) {
      case "Bitumen Extraction":
        formUrl = "forms/bitumen_extraction_form.php";
        break;
      case "Bitumen Grade 60-70":
        formUrl = "forms/bitumen_grade_60_70_form.php";
        break;
      case "Bitumen Grade 80-100":
        formUrl = "forms/bitumen_grade_80_100_form.php";
        break;
    }

    // Show the test form card
    $("#testFormCard").show();

    $.ajax({
      url: formUrl,
      method: "GET",
      success: function (response) {
        // Extract the body content (remove <html>, <head>, <body> tags for clean insertion)
        const $tempDiv = $("<div>").html(response);
        const formContent = $tempDiv.find("body").html() || response;

        $("#testFormContent").html(formContent);

        // Dynamically load the required JS scripts for validation and submission
        const scriptUrls = [];
        if (selectedTest === "Bitumen Extraction") {
          scriptUrls.push(
            "assets/forms_js/bitumen_extraction_validation.js",
            "assets/forms_js/bitumen_extraction_submit.js"
          );
        } else if (selectedTest === "Bitumen Grade 60-70") {
          scriptUrls.push(
            "assets/forms_js/bitumen_grade_60_70_validation.js",
            "assets/forms_js/bitumen_grade_60_70_submit.js"
          );
        } else if (selectedTest === "Bitumen Grade 80-100") {
          scriptUrls.push(
            "assets/forms_js/bitumen_grade_80_100_validation.js",
            "assets/forms_js/bitumen_grade_80_100_submit.js"
          );
        }

        // Remove existing scripts to avoid conflicts
        $('script[src^="assets/forms_js/"]').remove();

        // Load scripts dynamically with promise-like handling
        const scriptPromises = scriptUrls.map((src) => {
          return new Promise((resolve, reject) => {
            if (!$('script[src="' + src + '"]').length) {
              const script = document.createElement("script");
              script.src = src;
              script.onload = () => {
                console.log(`${src} loaded`);
                resolve();
              };
              script.onerror = () => {
                console.error(`Failed to load ${src}`);
                reject(new Error(`Failed to load ${src}`));
              };
              document.head.appendChild(script);
            } else {
              resolve();
            }
          });
        });

        Promise.all(scriptPromises)
          .then(() => {
            // Attach submit event to the form (override to include basic info)
            const $form = $("#testFormContent form");
            $form.off("submit").on("submit", function (e) {
              e.preventDefault();
              const formData = new FormData(this);

              // Add basic info to form data
              formData.append("project", $("#project").val());
              formData.append("client", $("#client").val());
              formData.append("ref", $("#ref").val());
              formData.append("gr", $("#gr").val());
              formData.append("lab", $("#lab").val());
              formData.append("receiving_date", $("#receiving_date").val());
              formData.append("test_no", $("#test_no").val());
              formData.append("performer_name", $("#performer_name").val());
              formData.append("txt_comment", $("#txt_comment").val());
              formData.append("section", "Bituminous");
              formData.append("sub_section", ""); // Empty for now
              formData.append("test_type", selectedTest); // Add test type for backend

              // Call the specific validation function first
              let isValid = true;
              if (
                selectedTest === "Bitumen Extraction" &&
                typeof validateExtraction === "function"
              ) {
                isValid = validateExtraction();
              } else if (
                selectedTest === "Bitumen Grade 60-70" &&
                typeof validateGrade6070 === "function"
              ) {
                isValid = validateGrade6070();
              } else if (
                selectedTest === "Bitumen Grade 80-100" &&
                typeof validateGrade80100 === "function"
              ) {
                isValid = validateGrade80100();
              }

              if (!isValid) return;

              // Submit using a unified custom wrapper
              submitBituminousForm(formData, selectedTest)
                .then(() => {
                  if (window.submitSuccess) {
                    $("#testingForm")[0].reset();
                    $("#testFormContent").empty();
                    $("#testFormCard").hide();
                    dtTable.ajax.reload(); // Reload DataTable after successful submission
                  }
                })
                .catch((error) => {
                  alert("Submission error: " + error.message);
                });
            });
          })
          .catch((error) => {
            alert("Failed to load required scripts: " + error.message);
          });
      },
      error: function () {
        alert("Failed to load the test form.");
      },
    });
  });

  // Unified submit wrapper for all Bituminous tests
  window.submitBituminousForm = function (formData, testType) {
    return new Promise((resolve, reject) => {
      fetch("services/process_bituminous.php", {
        method: "POST",
        body: formData,
      })
        .then((response) => response.json())
        .then((data) => {
          if (data.status === "success") {
            alert(data.message);
            window.submitSuccess = true;
            resolve();
          } else {
            alert(data.message);
            window.submitSuccess = false;
            reject(new Error(data.message));
          }
        })
        .catch((error) => {
          alert("Error: " + error.message);
          window.submitSuccess = false;
          reject(error);
        });
    });
  };

  // Reset form
  $('button[type="reset"]').on("click", function () {
    $("#testingForm")[0].reset();
    $("#loadTestFormBtn").prop("disabled", true);
    $("#testFormContent").empty();
    $("#testFormCard").hide();
    // Remove loaded scripts
    $('script[src^="assets/forms_js/"]').remove();
  });

  // Initialize DataTable with AJAX
  dtTable = $("#dtRecords").DataTable({
    ajax: {
      url: "services/get_bituminous_records.php", // Fetch filtered Bituminous records
      dataSrc: "records", // Data source key from the JSON response
    },
    columns: [
      { data: "section" },
      { data: "sub_section" },
      { data: "test_no" }, // Using test_no as a proxy for test identifier
      { data: "performer_name" },
      {
        data: "status",
        render: function (data) {
          if (data === "Completed") {
            return `<span class="badge bg-success">Completed</span>`;
          } else if (data === "In Process") {
            return `<span class="badge bg-info text-dark">In Process</span>`;
          } else {
            return `<span class="badge bg-warning text-dark">Pending</span>`;
          }
        },
      },
      { data: "comment" },
      {
        data: null, // Render a button
        orderable: false,
        searchable: false,
        render: function (data, type, row) {
          return `
                        <div class="text-center">
                            <button class="btn btn-sm btn-outline-primary view-report" data-id="${row.id}">
                                <i class="fa-duotone fa-solid fa-eye"></i>
                            </button>
                        </div>
                    `;
        },
      },
    ],
    order: [[2, "asc"]], // Sort by test_no (column index 2) ascending
  });

  // Handle View Report button click
  $("#dtRecords").on("click", ".view-report", function () {
    currentRowData = dtTable.row($(this).parents("tr")).data();

    // Set modal title using test_type from the original data
    $("#reportModalLabel").text(`Report: ${currentRowData.test_type}`);

    // Fill modal with row data
    $("#modal_section").text(currentRowData.section || "");
    $("#modal_sub_section").text(currentRowData.sub_section || "");
    $("#modal_test").text(currentRowData.test_type || "");
    $("#modal_test_no").text(currentRowData.test_no || "");
    $("#modal_performer").text(currentRowData.performer_name || "");
    $("#modal_comment").text(currentRowData.comment || "");

    // Append signature footer before showing modal
    const modalFooter = $("#reportModal .modal-footer1");
    modalFooter.empty(); // Clear existing footer if any
    modalFooter.append(`
    <div class="row mt-4">
        <div class="col-12">
            <div class="d-flex justify-content-between align-items-center">
                <div class="text-center flex-fill">
                    <div class="fw-bold">Laboratory Assistant</div>
                    <div class="small-note">(Signature)</div>
                </div>
                <div class="text-center flex-fill">
                    <div class="fw-bold">Research Assistant</div>
                    <div class="small-note">(Signature)</div>
                </div>
                <div class="text-center flex-fill">
                    <div class="fw-bold">Junior Research Officer</div>
                    <div class="small-note">(Signature)</div>
                </div>
                <div class="text-center flex-fill">
                    <div class="fw-bold">Senior Research Officer</div>
                    <div class="small-note">(Signature)</div>
                </div>
            </div>
        </div>
    </div>
`);

    // Show modal
    $("#reportModal").modal("show");
  });

  // Handle Make PDF button click
  $("#btnMakePDF").on("click", function () {
    if (!currentRowData) return;

    $.ajax({
      url: "services/generate_report.php",
      type: "POST",
      data: JSON.stringify(currentRowData),
      contentType: "application/json",
      xhrFields: {
        responseType: "blob", // important
      },
      success: function (data) {
        let blob = new Blob([data], { type: "application/pdf" });
        let url = window.URL.createObjectURL(blob);
        window.open(url, "_blank"); // open PDF in new tab
      },
      error: function () {
        alert("Error generating PDF!");
      },
    });
  });

  // Initial load of records is handled by DataTable initialization
});


$.fn.fill_sections = function (callback) {

    let $dropdown = $("#cmb_section");
    // empty the select box
    $dropdown.empty();
    // append first option and make it disabled so user cannot select first option
    $dropdown.append($('<option />').val('%').text('Select Section'));
    // sets selected index to first item using jQuery
    $dropdown.prop("selectedIndex", 0);
    // url of service file
    const url = "services/select_sections.php";
    // passing parameter
    // let param = {
    //     "division_id" : division_id,
    // };
    // get json data
    $.getJSON(url, function (response) {
        // execute each method until response.length
        // console.log(response);

        $.each(response, function (key, data) {
            // append more options coming form database
            $dropdown.append($('<option />').val(data.id).text(data.section_name));
        });
        // Execute the callback if provided
        if (typeof callback === 'function') {
            callback();
        }
    });
}

$.fn.fill_sub_section = function (section_id,callback) {

    let $dropdown = $("#cmb_sub_section");
    // empty the select box
    $dropdown.empty();
    // append first option and make it disabled so user cannot select first option
    $dropdown.append($('<option />').val('%').text('Select Sub Section'));
    // sets selected index to first item using jQuery
    $dropdown.prop("selectedIndex", 0);
    // url of service file
    const url = "services/select_sub_sections.php";
    // passing parameter
    let param = {
        "section_id" : section_id,
    };
    // get json data
    $.getJSON(url, param, function (response) {
        // execute each method until response.length
        //  console.log(response);
        $.each(response, function (key, data) {
            // append more options coming form database
            $dropdown.append($('<option />').val(data.id).text(data.sub_sec_name));
        });
        // Execute the callback if provided
        if (typeof callback === 'function') {
            callback();
        }
    });
}

$.fn.fill_tests = function (callback) {

    let $dropdown = $("#cmb_test");
    // empty the select box
    $dropdown.empty();
    // append first option and make it disabled so user cannot select first option
    $dropdown.append($('<option />').val('%').text('Select Test'));
    // sets selected index to first item using jQuery
    $dropdown.prop("selectedIndex", 0);
    // url of service file
    const url = "services/select_tests.php";
    // passing parameter
    // let param = {
    //     "division_id" : division_id,
    // };
    // get json data
    $.getJSON(url, function (response) {
        // execute each method until response.length
        // console.log(response);

        $.each(response, function (key, data) {
            // append more options coming form database
            $dropdown.append($('<option />').val(data.id).text(data.test_name));
        });
        // Execute the callback if provided
        // if (typeof callback === 'function') {
        //     callback();
        // }
    });
}

$("#cmb_section").on('change', function(){
    let section_id = $(this).val();
    $.fn.fill_sub_section(section_id);
});