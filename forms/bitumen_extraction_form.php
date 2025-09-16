<?php
// bitumen_extraction_form.php
// Form for Bitumen Extraction Test
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Bitumen Extraction Test Form</title>
    <script src="../assets/forms_js/bitumen_extraction_validation.js"></script>
    <script src="../assets/forms_js/bitumen_extraction_submit.js"></script>
</head>
<body>
    <h1>Bitumen Extraction Test</h1>
    <form id="extractionForm" method="POST" onsubmit="return validateExtraction() && submitExtractionForm(this);">
        <label for="client">Client:</label>
        <input type="text" id="client" name="client"><br><br>

        <label for="reference_no">Reference No.:</label>
        <input type="text" id="reference_no" name="reference_no"><br><br>

        <label for="gr">GR #:</label>
        <input type="text" id="gr" name="gr"><br><br>

        <label for="lab_no">Lab No.:</label>
        <input type="text" id="lab_no" name="lab_no"><br><br>

        <label for="location">Location:</label>
        <input type="text" id="location" name="location"><br><br>

        <h3>Sieve Percentages (Passing %)</h3>
        <label for="sieve_1">1":</label>
        <input type="number" id="sieve_1" name="sieve_1" step="0.1"><br><br>

        <label for="sieve_3_4">3/4":</label>
        <input type="number" id="sieve_3_4" name="sieve_3_4" step="0.1"><br><br>

        <label for="sieve_1_2">1/2":</label>
        <input type="number" id="sieve_1_2" name="sieve_1_2" step="0.1"><br><br>

        <label for="sieve_3_8">3/8":</label>
        <input type="number" id="sieve_3_8" name="sieve_3_8" step="0.1"><br><br>

        <label for="sieve_no4">No.4:</label>
        <input type="number" id="sieve_no4" name="sieve_no4" step="0.1"><br><br>

        <label for="sieve_no8">No.8:</label>
        <input type="number" id="sieve_no8" name="sieve_no8" step="0.1"><br><br>

        <label for="sieve_no50">No.50:</label>
        <input type="number" id="sieve_no50" name="sieve_no50" step="0.1"><br><br>

        <label for="sieve_no200">No.200:</label>
        <input type="number" id="sieve_no200" name="sieve_no200" step="0.1"><br><br>

        <label for="asphalt_content">Asphalt Content % by Weight of Mix:</label>
        <input type="number" id="asphalt_content" name="asphalt_content" step="0.1"><br><br>

        <label for="remarks">Remarks:</label>
        <textarea id="remarks" name="remarks"></textarea><br><br>

        <input type="submit" value="Submit">
    </form>
</body>
</html>