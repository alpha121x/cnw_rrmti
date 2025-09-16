// bitumen_grade_80_100_validation.js
// Validation for Bitumen Grade 80-100 Test Form

function validateGrade80100() {
    const requiredFields = ['project', 'client', 'ref', 'gr', 'lab', 'receiving_date'];
    for (let field of requiredFields) {
        if (!document.getElementById(field).value.trim()) {
            alert(`Please fill in ${field.replace('_', ' ')}`);
            return false;
        }
    }
    const numericFields = ['flash_point', 'penetration', 'softening_point', 'ductility', 'solubility', 'specific_gravity', 'loss_on_heating', 'ductility_residue', 'penetration_residue'];
    for (let field of numericFields) {
        const value = document.getElementById(field).value;
        if (value && isNaN(value)) {
            alert(`${field.replace('_', ' ')} must be a number`);
            return false;
        }
    }
    const penetration = parseFloat(document.getElementById('penetration').value);
    if (penetration < 80 || penetration > 100) {
        alert('Penetration should be between 80 and 100');
        return false;
    }
    return true;
}