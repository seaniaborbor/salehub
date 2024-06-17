<?= $this->extend('admin/common/layout') ?>

<?=$this->section('page_content')?>

<?php include $view_to_render; ?>




<!-- Modal -->
<div class="modal fade" id="analyticModel" tabindex="-1" aria-labelledby="analyticModelLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header bg-success text-white">
        <h3 class="modal-title" id="analyticModelLabel">Report Wizard</h3>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="" method="post">
            <div class="form-group mb-3">
                <label for="start_date">Enter Starting Date </label>
                <input type="date" name="start_date" class="form-control">
            </div>
            <div class="form-group mb-3">
                <label for="end_date">Enter End Date </label>
                <input type="date" name="end_date" class="form-control">
            </div>
            <div class="mb-3">
                <button class="btn btn-success">Query</button>
            </div>
        </form>
      </div>
    </div>
  </div>
</div>

<?= $this->endSection()?>