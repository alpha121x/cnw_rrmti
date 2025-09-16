<!-- Report Modal -->
<div class="modal fade" id="reportModal" tabindex="-1" aria-labelledby="reportModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header px-3 py-2">
                <h5 class="modal-title" id="reportModalLabel">Test Report</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <button id="btnMakePDF" class="btn btn-sm btn-primary mb-2">
                    <i class="fas fa-file-pdf"></i> Make PDF
                </button>
                <table class="table table-bordered table-primary">
                    <tbody>
                    <tr><th>Section</th><td id="modal_section"></td></tr>
                    <tr><th>Sub Section</th><td id="modal_sub_section"></td></tr>
                    <tr><th>Test</th><td id="modal_test"></td></tr>
                    <tr><th>Test No</th><td id="modal_test_no"></td></tr>
                    <tr><th>Performer Name</th><td id="modal_performer"></td></tr>
                    <tr><th>Comment</th><td id="modal_comment"></td></tr>
                    </tbody>
                </table>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                    <i class="fa-duotone fa-solid fa-circle-xmark"></i>&nbsp;Close
                </button>
            </div>
        </div>
    </div>
</div>
