$(function () {

    let section_id = 1

    // initialize datatable
    let dtTable = $("#dtRecords").DataTable({
        ajax: {
            url: "services/data.json",
            dataSrc: function (json) {
                // filter only Aggregate Section records
                return json.filter(item => item.section === "Aggregate Section");
            }
        },
        columns: [
            { data: "section" },
            { data: "sub_section" },
            { data: "test" },
            { data: "test_no" },
            { data: "performer_name" },
            {
                data: "status",
                render: function (data) {
                    if (data === "Completed") {
                        return `<span class="badge bg-success">Completed</span>`; //${data}
                    } else if (data === "In Process") {
                        return `<span class="badge bg-info text-dark">In Process</span>`;//${data}
                    } else {
                        return `<span class="badge bg-warning text-dark">Pending</span>`;//${data}
                    }
                }
            },
            { data: "comment" },
            {
                data: null, // no data from backend, just render a button
                orderable: false,
                searchable: false,
                render: function (data, type, row) {
                    return `
                    <div class="text-center"><button class="btn btn-sm btn-outline-primary view-report" data-id="${row.test_no}">
                        <i class="fa-duotone fa-solid fa-eye"></i>
                    </button></div>
                `;
                }
            }
        ],
        order: [[3, "asc"]] // sort by test_no (latest first)
    });


    let currentRowData = null; // store current row data globally

// Handle View Report button click
    $('#dtRecords').on('click', '.view-report', function () {
        currentRowData = dtTable.row($(this).parents('tr')).data();

        // Set modal title = Test Name
        $('#reportModalLabel').text("Report: " + currentRowData.test);

        // Fill modal with row data
        $('#modal_section').text(currentRowData.section);
        $('#modal_sub_section').text(currentRowData.sub_section);
        $('#modal_test').text(currentRowData.test);
        $('#modal_test_no').text(currentRowData.test_no);
        $('#modal_performer').text(currentRowData.performer_name);
        $('#modal_comment').text(currentRowData.comment);

        // Show modal
        $('#reportModal').modal('show');
    });

    // Handle Make PDF button click
    $('#btnMakePDF').on('click', function () {
        if (!currentRowData) return;

        $.ajax({
            url: "services/generate_report.php",
            type: "POST",
            data: JSON.stringify(currentRowData),
            contentType: "application/json",
            xhrFields: {
                responseType: 'blob' // important
            },
            success: function (data) {
                let blob = new Blob([data], { type: "application/pdf" });
                let url = window.URL.createObjectURL(blob);
                window.open(url, "_blank"); // open PDF in new tab
            },
            error: function () {
                alert("Error generating PDF!");
            }
        });
    });

    // load cities with lahore value default
    $.fn.fill_sections(function() {
        $('#cmb_section').val(section_id).prop('disabled', true);

        // if section_id = 2, fill sub-sections and disable
        if (section_id == 2) {
            $.fn.fill_sub_section(section_id);  // load sub-sections

            // wait until sub-sections are loaded
            $.fn.fill_sub_section(section_id, function() {
                $('#cmb_sub_section').prop('disabled', true);
            });
        }
    });


    $.fn.fill_tests();

    // handle form submit
    // handle form submit
    $("#testingForm").on("submit", function(e) {
        e.preventDefault();

        // Show loader immediately
        $(".loader").show();
        let startTime = new Date().getTime();

        // Collect form data
        let newData = {
            section: $("#cmb_section option:selected").text(),
            sub_section: $("#cmb_sub_section option:selected").text(),
            test: $("#cmb_test option:selected").text(),
            test_no: $("#test_no").val(),
            performer_name: $("#performer_name").val(),
            comment: $("#txt_comment").val()
        };

        // Add row in DataTable immediately
        dtTable.row.add(newData).draw(false);

        // Reorder automatically (latest first)
        dtTable.order([3, "desc"]).draw();

        // Save to backend
        $.ajax({
            url: "services/save_test.php",
            type: "POST",
            data: JSON.stringify(newData),
            contentType: "application/json",
            success: function(response) {
                console.log("Saved to JSON:", response);
            },
            error: function() {
                alert("Error saving test!");
            },
            complete: function() {
                // Calculate elapsed time
                let elapsed = new Date().getTime() - startTime;
                let remaining = 2000 - elapsed; // ensure at least 2 seconds

                if (remaining < 0) remaining = 0;

                setTimeout(function() {
                    $(".loader").hide();
                }, remaining);
            }
        });

        // Reset form
        this.reset();
    });




})

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