<?php
// bitumen_extraction_form.php
// Form for Bitumen Extraction Test
?>
<div class="container-fluid">
    <h1 class="mb-4">Bitumen Extraction Test</h1>
    <form id="extractionForm" method="POST">
        <div class="row mb-3">
            <div class="col-md-6">
                <label for="client" class="form-label">Client:</label>
                <input type="text" class="form-control" id="client" name="client" placeholder="Enter client name">
            </div>
            <div class="col-md-6">
                <label for="reference_no" class="form-label">Reference No.:</label>
                <input type="text" class="form-control" id="reference_no" name="reference_no" placeholder="Enter reference number">
            </div>
        </div>
        <div class="row mb-3">
            <div class="col-md-6">
                <label for="gr" class="form-label">GR #:</label>
                <input type="text" class="form-control" id="gr" name="gr" placeholder="Enter GR number">
            </div>
            <div class="col-md-6">
                <label for="lab_no" class="form-label">Lab No.:</label>
                <input type="text" class="form-control" id="lab_no" name="lab_no" placeholder="Enter lab number">
            </div>
        </div>
        <div class="mb-3">
            <label for="location" class="form-label">Location:</label>
            <input type="text" class="form-control" id="location" name="location" placeholder="Enter location">
        </div>

        <h5 class="mb-3">Sieve Percentages (Passing %)</h5>
        <div class="row mb-3">
            <div class="col-md-3">
                <label for="sieve_1" class="form-label">1":</label>
                <input type="number" class="form-control" id="sieve_1" name="sieve_1" step="0.1" placeholder="0">
            </div>
            <div class="col-md-3">
                <label for="sieve_3_4" class="form-label">3/4":</label>
                <input type="number" class="form-control" id="sieve_3_4" name="sieve_3_4" step="0.1" placeholder="0">
            </div>
            <div class="col-md-3">
                <label for="sieve_1_2" class="form-label">1/2":</label>
                <input type="number" class="form-control" id="sieve_1_2" name="sieve_1_2" step="0.1" placeholder="0">
            </div>
            <div class="col-md-3">
                <label for="sieve_3_8" class="form-label">3/8":</label>
                <input type="number" class="form-control" id="sieve_3_8" name="sieve_3_8" step="0.1" placeholder="0">
            </div>
        </div>
        <div class="row mb-3">
            <div class="col-md-3">
                <label for="sieve_no4" class="form-label">No.4:</label>
                <input type="number" class="form-control" id="sieve_no4" name="sieve_no4" step="0.1" placeholder="0">
            </div>
            <div class="col-md-3">
                <label for="sieve_no8" class="form-label">No.8:</label>
                <input type="number" class="form-control" id="sieve_no8" name="sieve_no8" step="0.1" placeholder="0">
            </div>
            <div class="col-md-3">
                <label for="sieve_no50" class="form-label">No.50:</label>
                <input type="number" class="form-control" id="sieve_no50" name="sieve_no50" step="0.1" placeholder="0">
            </div>
            <div class="col-md-3">
                <label for="sieve_no200" class="form-label">No.200:</label>
                <input type="number" class="form-control" id="sieve_no200" name="sieve_no200" step="0.1" placeholder="0">
            </div>
        </div>
        <div class="mb-3">
            <label for="asphalt_content" class="form-label">Asphalt Content % by Weight of Mix:</label>
            <input type="number" class="form-control" id="asphalt_content" name="asphalt_content" step="0.1" placeholder="0">
        </div>
        <div class="mb-3">
            <label for="remarks" class="form-label">Remarks:</label>
            <textarea class="form-control" id="remarks" name="remarks" rows="3" placeholder="Enter remarks"></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>