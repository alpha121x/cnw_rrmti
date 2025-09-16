// assets/js/bituminous.js
$(document).ready(function() {
    // Enable Load Test Form button when a test is selected
    $('#cmb_test').on('change', function() {
        const selectedTest = $(this).val();
        $('#loadTestFormBtn').prop('disabled', selectedTest === '%');
    });

    // Load test form below the basic info card
    $('#loadTestFormBtn').on('click', function() {
        const selectedTest = $('#cmb_test').val();
        if (selectedTest === '%') return;

        let formUrl = '';
        switch (selectedTest) {
            case 'Bitumen Extraction':
                formUrl = 'forms/bitumen_extraction_form.php';
                break;
            case 'Bitumen Grade 60-70':
                formUrl = 'forms/bitumen_grade_60_70_form.php';
                break;
            case 'Bitumen Grade 80-100':
                formUrl = 'forms/bitumen_grade_80_100_form.php';
                break;
        }

        // Show the test form card
        $('#testFormCard').show();

        $.ajax({
            url: formUrl,
            method: 'GET',
            success: function(response) {
                // Extract the body content (remove <html>, <head>, <body> tags for clean insertion)
                const $tempDiv = $('<div>').html(response);
                const formContent = $tempDiv.find('body').html() || response;

                $('#testFormContent').html(formContent);

                // Dynamically load the required JS scripts for validation and submission
                const scriptUrls = [];
                if (selectedTest === 'Bitumen Extraction') {
                    scriptUrls.push('assets/forms_js/bitumen_extraction_validation.js', 'assets/forms_js/bitumen_extraction_submit.js');
                } else if (selectedTest === 'Bitumen Grade 60-70') {
                    scriptUrls.push('assets/forms_js/bitumen_grade_60_70_validation.js', 'assets/forms_js/bitumen_grade_60_70_submit.js');
                } else if (selectedTest === 'Bitumen Grade 80-100') {
                    scriptUrls.push('assets/forms_js/bitumen_grade_80_100_validation.js', 'assets/forms_js/bitumen_grade_80_100_submit.js');
                }

                // Remove existing scripts to avoid conflicts
                $('script[src^="assets/forms_js/"]').remove();

                // Load scripts dynamically
                scriptUrls.forEach(function(src) {
                    if (!$('script[src="' + src + '"]').length) {
                        const script = document.createElement('script');
                        script.src = src;
                        script.onload = function() {
                            console.log(`${src} loaded`);
                        };
                        script.onerror = function() {
                            console.error(`Failed to load ${src}`);
                        };
                        document.head.appendChild(script);
                    }
                });

                // Attach submit event to the form (override to include basic info)
                const $form = $('#testFormContent form');
                $form.off('submit').on('submit', function(e) {
                    e.preventDefault();
                    const formData = new FormData(this);

                    // Add basic info to form data
                    formData.append('test_no', $('#test_no').val());
                    formData.append('performer_name', $('#performer_name').val());
                    formData.append('txt_comment', $('#txt_comment').val());
                    formData.append('section', 'Bituminous');
                    formData.append('sub_section', ''); // Empty for now

                    // Call the specific validation function first
                    let isValid = true;
                    if (selectedTest === 'Bitumen Extraction' && typeof validateExtraction === 'function') {
                        isValid = validateExtraction();
                    } else if (selectedTest === 'Bitumen Grade 60-70' && typeof validateGrade6070 === 'function') {
                        isValid = validateGrade6070();
                    } else if (selectedTest === 'Bitumen Grade 80-100' && typeof validateGrade80100 === 'function') {
                        isValid = validateGrade80100();
                    }

                    if (!isValid) return;

                    // Call the specific submit function, but override with custom wrappers
                    let submitSuccess = false;
                    if (selectedTest === 'Bitumen Extraction' && typeof submitExtractionFormCustom === 'function') {
                        submitExtractionFormCustom(formData);
                    } else if (selectedTest === 'Bitumen Grade 60-70' && typeof submitGrade6070FormCustom === 'function') {
                        submitGrade6070FormCustom(formData);
                    } else if (selectedTest === 'Bitumen Grade 80-100' && typeof submitGrade80100FormCustom === 'function') {
                        submitGrade80100FormCustom(formData);
                    }

                    // Check submitSuccess after async operation (simplified; in practice, use promises)
                    setTimeout(() => {
                        if (window.submitSuccess) {
                            $('#testingForm')[0].reset();
                            $('#testFormContent').empty();
                            $('#testFormCard').hide();
                            loadTestRecords();
                        }
                    }, 100); // Delay to allow async response
                });
            },
            error: function() {
                alert('Failed to load the test form.');
            }
        });
    });

    // Custom submit wrappers to include basic info and handle response
    window.submitExtractionFormCustom = function(formData) {
        fetch('process_extraction.php', {
            method: 'POST',
            body: formData
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                alert('Form submitted successfully!');
                window.submitSuccess = true;
            } else {
                alert('Submission failed: ' + data.error);
                window.submitSuccess = false;
            }
        })
        .catch(error => {
            alert('Error: ' + error);
            window.submitSuccess = false;
        });
    };

    window.submitGrade6070FormCustom = function(formData) {
        fetch('process_grade_60_70.php', {
            method: 'POST',
            body: formData
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                alert('Form submitted successfully!');
                window.submitSuccess = true;
            } else {
                alert('Submission failed: ' + data.error);
                window.submitSuccess = false;
            }
        })
        .catch(error => {
            alert('Error: ' + error);
            window.submitSuccess = false;
        });
    };

    window.submitGrade80100FormCustom = function(formData) {
        fetch('process_grade_80_100.php', {
            method: 'POST',
            body: formData
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                alert('Form submitted successfully!');
                window.submitSuccess = true;
            } else {
                alert('Submission failed: ' + data.error);
                window.submitSuccess = false;
            }
        })
        .catch(error => {
            alert('Error: ' + error);
            window.submitSuccess = false;
        });
    };

    // Reset form
    $('button[type="reset"]').on('click', function() {
        $('#testingForm')[0].reset();
        $('#loadTestFormBtn').prop('disabled', true);
        $('#testFormContent').empty();
        $('#testFormCard').hide();
        // Remove loaded scripts
        $('script[src^="assets/forms_js/"]').remove();
    });

    // Load test records
    function loadTestRecords() {
        $.ajax({
            url: 'get_bituminous_records.php',
            type: 'GET',
            success: function(response) {
                const records = response.records;
                const tbody = $('#dtRecords tbody');
                tbody.empty();
                records.forEach(record => {
                    tbody.append(`
                        <tr>
                            <td>${record.section}</td>
                            <td>${record.sub_section}</td>
                            <td>${record.test_no}</td>
                            <td>${record.performer_name}</td>
                            <td>${record.status}</td>
                            <td>${record.comment}</td>
                            <td><a href="view_report.php?id=${record.id}" class="btn btn-info btn-sm">View</a></td>
                        </tr>
                    `);
                });
                if ($.fn.DataTable.isDataTable('#dtRecords')) {
                    $('#dtRecords').DataTable().destroy();
                }
                $('#dtRecords').DataTable();
            }
        });
    }

    // Initial load of records
    loadTestRecords();
});