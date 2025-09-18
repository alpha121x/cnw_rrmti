<div class="container">
    <h5 class="card-title">Bitumen Extraction Test</h5>
    <form id="grade6070Form" method="POST">

        <div class="table-responsive">
            <table class="table table-bordered align-middle table-sm">
                <thead class="table-light text-center">
                    <tr>
                        <th scope="col" rowspan="2" class="align-middle">Test Performed</th>
                        <th scope="col" colspan="2">Values of 60-70 Bitumen Grade</th>
                    </tr>
                    <tr>
                        <th scope="col">Obtained</th>
                        <th scope="col">Required</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td class="fw-bold">Foaming / Spattering</td>
                        <td><input type="text" class="form-control" name="foaming" placeholder="Enter value"></td>
                        <td class="text-center">Should not foam before 175°C</td>
                    </tr>
                    <tr>
                        <td class="fw-bold">Flash Point (Cleveland Open Cup) °C</td>
                        <td><input type="number" class="form-control" name="flash_point" step="0.1" placeholder="Enter value"></td>
                        <td class="text-center">232 Min</td>
                    </tr>
                    <tr>
                        <td class="fw-bold">Penetration @ 25°C (0.1mm)</td>
                        <td><input type="number" class="form-control" name="penetration" step="0.1" placeholder="Enter value"></td>
                        <td class="text-center">60 – 70</td>
                    </tr>
                    <tr>
                        <td class="fw-bold">Softening Point (Ring &amp; Ball) °C</td>
                        <td><input type="number" class="form-control" name="softening_point" step="0.1" placeholder="Enter value"></td>
                        <td class="text-center">44 – 54</td>
                    </tr>
                    <tr>
                        <td class="fw-bold">Ductility @ 25°C, 5cm/min, cms</td>
                        <td><input type="number" class="form-control" name="ductility" step="0.1" placeholder="Enter value"></td>
                        <td class="text-center">100 Min</td>
                    </tr>
                    <tr>
                        <td class="fw-bold">Solubility, %</td>
                        <td><input type="number" class="form-control" name="solubility" step="0.1" placeholder="Enter value"></td>
                        <td class="text-center">99 Min</td>
                    </tr>
                    <tr>
                        <td class="fw-bold">Specific Gravity @ 25°C</td>
                        <td><input type="number" class="form-control" name="specific_gravity" step="0.001" placeholder="Enter value"></td>
                        <td class="text-center">1.01 – 1.06</td>
                    </tr>
                    <tr>
                        <td class="fw-bold">Loss on Heating, 163°C, 5hrs, %</td>
                        <td><input type="number" class="form-control" name="loss_on_heating" step="0.1" placeholder="Enter value"></td>
                        <td class="text-center">0.8 Max</td>
                    </tr>
                    <tr>
                        <td class="fw-bold">Ductility of Residue @ 25°C, cms</td>
                        <td><input type="number" class="form-control" name="ductility_residue" step="0.1" placeholder="Enter value"></td>
                        <td class="text-center">50 Min</td>
                    </tr>
                    <tr>
                        <td class="fw-bold">Penetration of Residue, % of Original</td>
                        <td><input type="number" class="form-control" name="penetration_residue" step="0.1" placeholder="Enter value"></td>
                        <td class="text-center">54 Min</td>
                    </tr>
                    <tr>
                        <td class="fw-bold">Remarks</td>
                        <td colspan="2">
                            <textarea class="form-control" id="remarks" name="remarks" rows="3" placeholder="Enter remarks"></textarea>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>






        <!-- Submit -->
        <div class="row">
            <div class="col-md-12 text-end">
                <button type="submit" class="btn btn-primary btn-primary-custom">
                    <i class="fa-duotone fa-solid fa-paper-plane"></i>&nbsp;Submit</button>
            </div>
        </div>
    </form>
</div>