// bitumen_extraction_submit.js
// Submission handler for Bitumen Extraction Test Form

function submitExtractionForm(form) {
    const formData = new FormData(form);
    fetch('process_extraction.php', {
        method: 'POST',
        body: formData
    })
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            alert('Form submitted successfully!');
            form.reset();
        } else {
            alert('Submission failed: ' + data.error);
        }
    })
    .catch(error => {
        alert('Error: ' + error);
    });
    return false;
}