// bitumen_grade_60_70_submit.js
// Submission handler for Bitumen Grade 60-70 Test Form

function submitGrade6070Form(form) {
    const formData = new FormData(form);
    fetch('process_grade_60_70.php', {
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