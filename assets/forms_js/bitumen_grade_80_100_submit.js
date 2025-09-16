// bitumen_grade_80_100_submit.js
// Submission handler for Bitumen Grade 80-100 Test Form

function submitGrade80100Form(form) {
    const formData = new FormData(form);
    formData.append('test_type', 'Bitumen Grade 80-100'); // Add test type for process.php
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