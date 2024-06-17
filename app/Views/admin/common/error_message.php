<?php if(session()->getFlashdata('error')) : ?>
    <!-- The Modal -->
    <div class="modal fade" id="error" tabindex="-1" role="dialog">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <!-- Modal body -->
                <div class="modal-body py-5 text-center">
                    <h2 class="display-1 text-danger mb-5"><i class="mdi mdi-comment-alert"></i></h2>
                    <h4 class="text-danger">
                        <?= session()->getFlashdata('error') ?: "You've Got Some Error.<br> Fix them and proceed"; ?>
                    </h4>
                    <button type="button" class="btn btn-danger mt-5" data-bs-dismiss="modal">Close</button>
                </div>

            </div>
        </div>
    </div>

    <!-- Your custom script to show the modal -->
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            var errorModal = new bootstrap.Modal(document.getElementById('error'));
            errorModal.show();
        });
    </script>
<?php endif; ?>
