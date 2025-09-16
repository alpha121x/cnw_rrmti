<?php
// bitumen_grade_60_70_form.php
// Form for Bitumen Grade 60-70 Test
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Bitumen Grade 60-70 Test Form</title>
    <script src="../assets/forms_js/bitumen_grade_60_70_validation.js"></script>
    <script src="../assets/forms_js/bitumen_grade_60_70_submit.js"></script>
</head>
<body>
    <h1>Bitumen Grade 60-70 Test</h1>
    <form id="grade6070Form" method="POST" onsubmit="return validateGrade6070() && submitGrade6070Form(this);">
        <label for="project">Project:</label>
        <input type="text" id="project" name="project"><br><br>

        <label for="client">Client:</label>
        <input type="text" id="client" name="client"><br><br>

        <label for="ref">Ref #:</label>
        <input type="text" id="ref" name="ref"><br><br>

        <label for="gr">GR #:</label>
        <input type="text" id="gr" name="gr"><br><br>

        <label for="lab">Lab #:</label>
        <input type="text" id="lab" name="lab"><br><br>

        <label for="receiving_date">Lab Receiving Date:</label>
        <input type="date" id="receiving_date" name="receiving_date"><br><br>

        <h3>Test Values (Obtained)</h3>
        <label for="foaming">Foaming / Spattering:</label>
        <input type="text" id="foaming" name="foaming"><br><br>

        <label for="flash_point">Flash Point (°C):</label>
        <input type="number" id="flash_point" name="flash_point" step="0.1"><br><br>

        <label for="penetration">Penetration (0.1mm):</label>
        <input type="number" id="penetration" name="penetration" step="0.1"><br><br>

        <label for="softening_point">Softening Point (°C):</label>
        <input type="number" id="softening_point" name="softening_point" step="0.1"><br><br>

        <label for="ductility">Ductility (cms):</label>
        <input type="number" id="ductility" name="ductility" step="0.1"><br><br>

        <label for="solubility">Solubility (%):</label>
        <input type="number" id="solubility" name="solubility" step="0.1"><br><br>

        <label for="specific_gravity">Specific Gravity:</label>
        <input type="number" id="specific_gravity" name="specific_gravity" step="0.001"><br><br>

        <label for="loss_on_heating">Loss on Heating (%):</label>
        <input type="number" id="loss_on_heating" name="loss_on_heating" step="0.1"><br><br>

        <label for="ductility_residue">Ductility of Residue (cms):</label>
        <input type="number" id="ductility_residue" name="ductility_residue" step="0.1"><br><br>

        <label for="penetration_residue">Penetration of Residue (%):</label>
        <input type="number" id="penetration_residue" name="penetration_residue" step="0.1"><br><br>

        <label for="remarks">Remarks:</label>
        <textarea id="remarks" name="remarks"></textarea><br><br>

        <input type="submit" value="Submit">
    </form>
</body>
</html>