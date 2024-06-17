<?= $this->extend('admin/common/layout') ?>

<?=$this->section('page_content')?>
<div class="container">
    <div class="row">
      <div class="col-12">
      <div class="card">
        <div class="card-header">
            <ul class="nav nav-pills" id="myTab" role="tablist">
            <li class="nav-item" role="presentation">
                <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#home" type="button" role="tab" aria-controls="home" aria-selected="true">
                    Pending Deliveries
                </button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile" type="button" role="tab" aria-controls="profile" aria-selected="false">
                    Completed Deliveries
                </button>
            </li>
            </ul>
        </div>
        <div class="card-body">
            <div class="tab-content" id="myTabContent">
            <div class="tab-pane fade show active table-responsive" id="home" role="tabpanel" aria-labelledby="home-tab">
                <?php if(isset($pending_log) & !empty($pending_log)): ?>
                   <table class="table" id="example">
                    <thead>
                        <tr>
                            <td>Customer Name </td>
                            <td>Order Code </td>
                            <td>Phone No.</td>
                            <td>Date Assigned</td>
                            <td>Order Details</td>
                            <td>Mark Delivered</td>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach($pending_log as $log): ?>
                            <tr>
                                <td><?=$log->fullName?></td>
                                <td><?=$log->orderCode?></td>
                                <td><?=$log->phoneNo?></td>
                                <td><?=$log->assignedDate?></td>
                                <td><a href="/dashboard/view_order_detail/<?=$log->orderCode?>" class="btn btn-sm btn-outline-success">Details</a></td>
                                <td><a href="/dashboard/mark_as_delivered/<?=$log->orderCode?>" class="btn btn-sm btn-outline-success">Delivered</a></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                   </table>
                <?php endif; ?>
            </div>
            <div class="tab-pane fade table-responsive" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                <?php if(isset($delivered_log) & !empty($delivered_log)): ?>
                        <table class="table" id="example2">
                    <thead>
                        <tr>
                            <td>Customer Name </td>
                            <td>Order Code </td>
                            <td>Phone No.</td>
                            <td>Date Delivered</td>
                            <td>Mark Delivered</td>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach($delivered_log as $log): ?>
                            <tr>
                                <td><?=$log->fullName?></td>
                                <td><?=$log->orderCode?></td>
                                <td><?=$log->phoneNo?></td>
                                <td><?=$log->deliveryDate?></td>
                                <td><a href="#" class="btn btn-sm btn-outline-success">Details</a></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                        </table>
                    <?php endif; ?>
            </div>
            </div>
        </div>
      </div>

      </div>
    </div>
</div>
<?= $this->endSection()?>