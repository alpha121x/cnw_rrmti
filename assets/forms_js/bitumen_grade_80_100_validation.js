// bitumen_grade_80_100_validation.js
// Validation for Bitumen Grade 80-100 Test Form

function validateGrade80100() {
    const numericFields = ['flash_point', 'penetration', 'softening_point', 'ductility', 'solubility', 'specific_gravity', 'loss_on_heating', 'ductility_residue', 'penetration_residue'];
    for (let field of numericFields) {
        const value = document.getElementById(field).value;
        if (value && (isNaN(value) || value < 0)) {
            alert(`${field.replace('_', ' ')} must be a non-negative number`);
            return false;
        }
    }
    const foaming = document.getElementById('foaming').value.trim();
    if (foaming && !/^[a-zA-Z0-9\s]+$/.test(foaming)) {
        alert('Foaming/Spattering must contain valid characters');
        return false;
    }
    const penetration = parseFloat(document.getElementById('penetration').value);
    if (penetration && (penetration < 80 || penetration > 100)) {
        alert('Penetration should be between 80 and 100');
        return false;
    }
    const flashPoint = parseFloat(document.getElementById('flash_point').value);
    if (flashPoint && flashPoint < 232) {
        alert('Flash Point should be at least 232°C');
        return false;
    }
    const softeningPoint = parseFloat(document.getElementById('softening_point').value);
    if (softeningPoint && (softeningPoint < 41 || softeningPoint > 51)) {
        alert('Softening Point should be between 41 and 51°C');
        return false;
    }
    const ductility = parseFloat(document.getElementById('ductility').value);
    if (ductility && ductility < 100) {
        alert('Ductility should be at least 100 cm');
        return false;
    }
    const solubility = parseFloat(document.getElementById('solubility').value);
    if (solubility && solubility < 99) {
        alert('Solubility should be at least 99%');
        return false;
    }
    const specificGravity = parseFloat(document.getElementById('specific_gravity').value);
    if (specificGravity && (specificGravity < 1.01 || specificGravity > 1.05)) {
        alert('Specific Gravity should be between 1.01 and 1.05');
        return false;
    }
    const lossOnHeating = parseFloat(document.getElementById('loss_on_heating').value);
    if (lossOnHeating && lossOnHeating > 1.0) {
        alert('Loss on Heating should not exceed 1.0%');
        return false;
    }
    const ductilityResidue = parseFloat(document.getElementById('ductility_residue').value);
    if (ductilityResidue && ductilityResidue < 50) {
        alert('Ductility of Residue should be at least 50 cm');
        return false;
    }
    const penetrationResidue = parseFloat(document.getElementById('penetration_residue').value);
    if (penetrationResidue && penetrationResidue < 50) {
        alert('Penetration of Residue should be at least 50%');
        return false;
    }
    return true;
}