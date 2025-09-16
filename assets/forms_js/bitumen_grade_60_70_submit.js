// bitumen_grade_60_70_submit.js
// Submission handler for Bitumen Grade 60-70 Test Form

function submitGrade6070Form(form) {
    const formData = new FormData(form);
    formData.append('test_type', 'Bitumen Grade 60-70'); // Add test type for process.php
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