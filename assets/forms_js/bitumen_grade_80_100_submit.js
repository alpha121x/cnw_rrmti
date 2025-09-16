// bitumen_grade_80_100_submit.js
// Submission handler for Bitumen Grade 80-100 Test Form

function submitGrade80100Form(form) {
    const formData = new FormData(form);
    fetch('process_grade_80_100.php', {
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