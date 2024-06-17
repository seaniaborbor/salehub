<?php if(session()->getFlashdata('success')) : ?>
    <!-- The Modal -->
    <div class="modal fade" id="success" tabindex="-1" role="dialog">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content rounded-0">
                <!-- Modal body -->
                <div class="modal-body py-5 text-center">
                    <h2 class="display-1 text-success mb-5"><i class="mdi mdi-check-all"></i></h2>
                    <h4 class="text-success">
                        <?= session()->getFlashdata('success') ?: "You've Got Some success.<br> Fix them and proceed"; ?>
                    </h4>
                    <button type="button" class="btn btn-danger mt-3" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Your custom script to show the modal -->
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            var successModal = new bootstrap.Modal(document.getElementById('success'));
            successModal.show();
        });
    </script>
<?php endif; ?>
