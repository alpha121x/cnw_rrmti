<div class="container">
    <h5 class="card-title">Bitumen Extraction Test</h5>
    <form id="extractionForm" method="POST">

        <!-- Row 1: Location -->
        <div class="row mb-4">
            <div class="col-md-12">
                <label for="location" class="form-label fw-bold">Location</label>
                <input type="text" class="form-control" id="location" name="location" placeholder="Enter location">
            </div>
        </div>

        <!-- Row 2: Sieve Values + Asphalt Content -->
        <h5 class="mb-3 fw-bold">Sieve Percentages (Passing %)</h5>
        <div class="row mb-4 g-2">
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
            <div class="col-md-1">
                <label for="sieve_no50" class="form-label">No.50</label>
                <input type="number" class="form-control" id="sieve_no50" name="sieve_no50" step="0.1" placeholder="0">
            </div>
            <div class="col-md-1">
                <label for="sieve_no200" class="form-label">No.200</label>
                <input type="number" class="form-control" id="sieve_no200" name="sieve_no200" step="0.1" placeholder="0">
            </div>
            <div class="col-md-4">
                <label for="asphalt_content" class="form-label">Asphalt Content % by Weight of</label>
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
                <button type="submit" class="btn btn-primary btn-primary-custom">
                    <i class="fa-duotone fa-solid fa-paper-plane"></i>&nbsp;Submit</button>
            </div>
        </div>
    </form>
</div>
