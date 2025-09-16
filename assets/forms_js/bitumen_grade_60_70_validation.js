// bitumen_grade_60_70_validation.js
// Validation for Bitumen Grade 60-70 Test Form

function validateGrade6070() {
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
    if (penetration < 60 || penetration > 70) {
        alert('Penetration should be between 60 and 70');
        return false;
    }
    return true;
}