// bitumen_extraction_submit.js
// Submission handler for Bitumen Extraction Test Form

function submitExtractionForm(form) {
    const formData = new FormData(form);
    formData.append('test_type', 'Bitumen Extraction'); // Add test type for process.php
    fetch('services/process_bituminous.php', {
        method: 'POST',
        body: formData
    })
    .then(response => response.json())
    .then(data => {
        if (data.status === "success") {
            alert(data.message);
            form.reset();
        } else {
            alert(data.message);
        }
    })
    .catch(error => {
        alert('Error: ' + error.message);
    });
    return false;
}