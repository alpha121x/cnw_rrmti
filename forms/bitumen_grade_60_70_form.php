<?php
// bitumen_grade_60_70_form.php
// Form for Bitumen Grade 60-70 Test
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
      <h4 class="mb-0">Bitumen Grade 60-70 Test</h4>
    </div>

    <form id="grade6070Form" method="POST">
      
      <!-- Tests -->
      <div class="test-row">
        <div class="test-label">Foaming / Spattering</div>
        <input type="text" class="form-control test-input" name="foaming" placeholder="Enter value">
      </div>

      <div class="test-row">
        <div class="test-label">Flash Point (Cleveland Open Cup) °C</div>
        <input type="number" class="form-control test-input" name="flash_point" step="0.1">
      </div>

      <div class="test-row">
        <div class="test-label">Penetration @ 25°C (0.1mm)</div>
        <input type="number" class="form-control test-input" name="penetration" step="0.1">
      </div>

      <div class="test-row">
        <div class="test-label">Softening Point (Ring & Ball) °C</div>
        <input type="number" class="form-control test-input" name="softening_point" step="0.1">
      </div>

      <div class="test-row">
        <div class="test-label">Ductility @ 25°C, 5cm/min, cms</div>
        <input type="number" class="form-control test-input" name="ductility" step="0.1">
      </div>

      <div class="test-row">
        <div class="test-label">Solubility, %</div>
        <input type="number" class="form-control test-input" name="solubility" step="0.1">
      </div>

      <div class="test-row">
        <div class="test-label">Specific Gravity @ 25°C</div>
        <input type="number" class="form-control test-input" name="specific_gravity" step="0.001">
      </div>

      <div class="test-row">
        <div class="test-label">Loss on Heating, 163°C, 5hrs, %</div>
        <input type="number" class="form-control test-input" name="loss_on_heating" step="0.1">
      </div>

      <div class="test-row">
        <div class="test-label">Ductility of Residue @ 25°C, cms</div>
        <input type="number" class="form-control test-input" name="ductility_residue" step="0.1">
      </div>

      <div class="test-row">
        <div class="test-label">Penetration of Residue, % of Original</div>
        <input type="number" class="form-control test-input" name="penetration_residue" step="0.1">
      </div>

      <!-- Remarks -->
      <div class="mt-4">
        <label for="remarks" class="form-label fw-bold">Remarks</label>
        <textarea class="form-control" id="remarks" name="remarks" rows="3"></textarea>
      </div>

      <!-- Submit -->
      <div class="mt-3 text-end">
        <button type="submit" class="btn btn-primary px-4">Submit</button>
      </div>
    </form>
  </div>
</div>

</body>
</html>
