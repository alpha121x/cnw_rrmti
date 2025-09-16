<?php
// bitumen_grade_60_70_form.php
// Form for Bitumen Grade 60-70 Test
?>
<div class="container-fluid">
    <h1 class="mb-4">Bitumen Grade 60-70 Test</h1>
    <form id="grade6070Form" method="POST">
        <div class="row mb-3">
            <div class="col-md-6">
                <label for="project" class="form-label">Project:</label>
                <input type="text" class="form-control" id="project" name="project" placeholder="Enter project">
            </div>
            <div class="col-md-6">
                <label for="client" class="form-label">Client:</label>
                <input type="text" class="form-control" id="client" name="client" placeholder="Enter client name">
            </div>
        </div>
        <div class="row mb-3">
            <div class="col-md-6">
                <label for="ref" class="form-label">Ref #:</label>
                <input type="text" class="form-control" id="ref" name="ref" placeholder="Enter ref number">
            </div>
            <div class="col-md-6">
                <label for="gr" class="form-label">GR #:</label>
                <input type="text" class="form-control" id="gr" name="gr" placeholder="Enter GR number">
            </div>
        </div>
        <div class="row mb-3">
            <div class="col-md-6">
                <label for="lab" class="form-label">Lab #:</label>
                <input type="text" class="form-control" id="lab" name="lab" placeholder="Enter lab number">
            </div>
            <div class="col-md-6">
                <label for="receiving_date" class="form-label">Lab Receiving Date:</label>
                <input type="date" class="form-control" id="receiving_date" name="receiving_date">
            </div>
        </div>

        <h5 class="mb-3">Test Values (Obtained)</h5>
        <div class="row mb-3">
            <div class="col-md-6">
                <label for="foaming" class="form-label">Foaming / Spattering:</label>
                <input type="text" class="form-control" id="foaming" name="foaming" placeholder="Enter value">
            </div>
            <div class="col-md-6">
                <label for="flash_point" class="form-label">Flash Point (°C):</label>
                <input type="number" class="form-control" id="flash_point" name="flash_point" step="0.1" placeholder="0">
            </div>
        </div>
        <div class="row mb-3">
            <div class="col-md-6">
                <label for="penetration" class="form-label">Penetration (0.1mm):</label>
                <input type="number" class="form-control" id="penetration" name="penetration" step="0.1" placeholder="0">
            </div>
            <div class="col-md-6">
                <label for="softening_point" class="form-label">Softening Point (°C):</label>
                <input type="number" class="form-control" id="softening_point" name="softening_point" step="0.1" placeholder="0">
            </div>
        </div>
        <div class="row mb-3">
            <div class="col-md-6">
                <label for="ductility" class="form-label">Ductility (cms):</label>
                <input type="number" class="form-control" id="ductility" name="ductility" step="0.1" placeholder="0">
            </div>
            <div class="col-md-6">
                <label for="solubility" class="form-label">Solubility (%):</label>
                <input type="number" class="form-control" id="solubility" name="solubility" step="0.1" placeholder="0">
            </div>
        </div>
        <div class="row mb-3">
            <div class="col-md-6">
                <label for="specific_gravity" class="form-label">Specific Gravity:</label>
                <input type="number" class="form-control" id="specific_gravity" name="specific_gravity" step="0.001" placeholder="0">
            </div>
            <div class="col-md-6">
                <label for="loss_on_heating" class="form-label">Loss on Heating (%):</label>
                <input type="number" class="form-control" id="loss_on_heating" name="loss_on_heating" step="0.1" placeholder="0">
            </div>
        </div>
        <div class="row mb-3">
            <div class="col-md-6">
                <label for="ductility_residue" class="form-label">Ductility of Residue (cms):</label>
                <input type="number" class="form-control" id="ductility_residue" name="ductility_residue" step="0.1" placeholder="0">
            </div>
            <div class="col-md-6">
                <label for="penetration_residue" class="form-label">Penetration of Residue (%):</label>
                <input type="number" class="form-control" id="penetration_residue" name="penetration_residue" step="0.1" placeholder="0">
            </div>
        </div>
        <div class="mb-3">
            <label for="remarks" class="form-label">Remarks:</label>
            <textarea class="form-control" id="remarks" name="remarks" rows="3" placeholder="Enter remarks"></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>