<?= $this->extend('admin/common/layout') ?>

<?=$this->section('page_content')?>


<div class="container mt-5">
  <div class="card shadow-lg border-2 border-success">
    <div class="card-header bg-success text-white">
    <h5 class="d-flex justify-content-between">
      <span>Order Log Table</span>
      <span class="badge bg-danger"><?=$unview_orders?> new</span>
 </h5>
    </div>
    <div class="card-body">
    <table id="example" class="table table-striped table-bordered" style="width:100%">
    <thead>
      <tr>
        <th>Date </th>
        <th>Customer Name </th>
        <th>Phone </th>
        <th>Region</th>
        <th>Total</th>
        <th>Status</th>
        <th>More Info</th>
      </tr>
    </thead>
    <tbody>
     <?php if(isset($order_log) && !empty($order_log)): ?>
        <?php foreach($order_log as $order) : ?>
            <tr>
                <td><?=substr($order->orderDate, 0, 10)?></td>
                <td><?=$order->fullName?></td>
                <td><?=$order->phoneNo?></td>
                <td><?=$order->deliveryRegion?></td>
                <td><?=$order->total_ordered?></td>
                <td><?php if($order->viewStatus == 1): ?>
                    <span class="badge bg-success w-100">
                        <i class="fas fa-eye"></i> Seen
                    </span>
                <?php else: ?>
                    <span class="badge bg-danger w-100">
                        <i class="fas fa-spinner fa-spin"></i> Unviewed
                    </span>
                <?php endif; ?>
                  </td>
                <td><a href="/dashboard/view_order_detail/<?=$order->orderCode?>" class="btn btn-outline-success btn-sm w-100">Details</a></td>
            </tr>
        <?php endforeach; ?>
    <?php endif; ?>
    </tbody>
  </table>
    </div>
  </div>
</div>



<?= $this->endSection()?>