// bitumen_extraction_validation.js
// Validation for Bitumen Extraction Test Form

function validateExtraction() {
    const requiredFields = ['client', 'reference_no', 'gr', 'lab_no', 'location', 'asphalt_content'];
    for (let field of requiredFields) {
        if (!document.getElementById(field).value.trim()) {
            alert(`Please fill in ${field.replace('_', ' ')}`);
            return false;
        }
    }
    const numericFields = ['sieve_1', 'sieve_3_4', 'sieve_1_2', 'sieve_3_8', 'sieve_no4', 'sieve_no8', 'sieve_no50', 'sieve_no200', 'asphalt_content'];
    for (let field of numericFields) {
        const value = document.getElementById(field).value;
        if (value && isNaN(value)) {
            alert(`${field.replace('_', ' ')} must be a number`);
            return false;
        }
    }
    return true;
}