<?php
// bitumen_extraction_form.php
// Form for Bitumen Extraction Test
?>
  <style>
    body {
      background: #f8f9fa;
    }
    .form-card {
      background: #fff;
      border-radius: 12px;
      padding: 20px;
      box-shadow: 0 3px 8px rgba(0,0,0,0.1);
      margin-top: 20px;
    }
    .form-header {
      background: #004c6d;
      color: #fff;
      padding: 15px;
      border-radius: 12px 12px 0 0;
    }
    .test-row {
      display: flex;
      justify-content: space-between;
      align-items: center;
      padding: 8px 0;
      border-bottom: 1px solid #eee;
    }
    .test-label {
      flex: 1;
      font-weight: 500;
    }
    .test-input {
      width: 200px;
    }
  </style>
<div class="container">
  <div class="form-card">
    <div class="form-header">
      <h4 class="mb-0">Bitumen Extraction Test</h4>
    </div>
    <form id="extractionForm" method="POST">
        
        <!-- Row 1: Location -->
        <div class="row mb-4">
            <div class="col-md-6">
                <label for="location" class="form-label fw-bold">Location</label>
                <input type="text" class="form-control" id="location" name="location" placeholder="Enter location">
            </div>
        </div>

        <!-- Row 2: Sieve Values + Asphalt Content -->
        <h5 class="mb-3 fw-bold">Sieve Percentages (Passing %)</h5>
        <div class="row mb-4">
            <div class="col-md-1">
                <label for="sieve_1" class="form-label">1"</label>
                <input type="number" class="form-control" id="sieve_1" name="sieve_1" step="0.1" placeholder="0">
            </div>
            <div class="col-md-1">
                <label for="sieve_3_4" class="form-label">3/4"</label>
                <input type="number" class="form-control" id="sieve_3_4" name="sieve_3_4" step="0.1" placeholder="0">
            </div>
            <div class="col-md-1">
                <label for="sieve_1_2" class="form-label">1/2"</label>
                <input type="number" class="form-control" id="sieve_1_2" name="sieve_1_2" step="0.1" placeholder="0">
            </div>
            <div class="col-md-1">
                <label for="sieve_3_8" class="form-label">3/8"</label>
                <input type="number" class="form-control" id="sieve_3_8" name="sieve_3_8" step="0.1" placeholder="0">
            </div>
            <div class="col-md-1">
                <label for="sieve_no4" class="form-label">No.4</label>
                <input type="number" class="form-control" id="sieve_no4" name="sieve_no4" step="0.1" placeholder="0">
            </div>
            <div class="col-md-1">
                <label for="sieve_no8" class="form-label">No.8</label>
                <input type="number" class="form-control" id="sieve_no8" name="sieve_no8" step="0.1" placeholder="0">
            </div>
            <div class="col-md-2">
                <label for="sieve_no50" class="form-label">No.50</label>
                <input type="number" class="form-control" id="sieve_no50" name="sieve_no50" step="0.1" placeholder="0">
            </div>
            <div class="col-md-2">
                <label for="sieve_no200" class="form-label">No.200</label>
                <input type="number" class="form-control" id="sieve_no200" name="sieve_no200" step="0.1" placeholder="0">
            </div>
            <div class="col-md-2">
                <label for="asphalt_content" class="form-label">Asphalt %</label>
                <input type="number" class="form-control" id="asphalt_content" name="asphalt_content" step="0.1" placeholder="0">
            </div>
        </div>

        <!-- Row 3: Remarks + Submit -->
        <div class="row mb-3">
            <div class="col-md-12">
                <label for="remarks" class="form-label fw-bold">Remarks</label>
                <textarea class="form-control" id="remarks" name="remarks" rows="3" placeholder="Enter remarks"></textarea>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12 text-end">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </div>

    </form>
</div>
