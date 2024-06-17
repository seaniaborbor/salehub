<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                <ul class="nav nav-tabs" id="myTab" role="tablist">
                <li class="nav-item" role="presentation">
                    <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#home" type="button" role="tab" aria-controls="home" aria-selected="true">Sale Log</button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile" type="button" role="tab" aria-controls="profile" aria-selected="false">Order Log</button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="contact-tab" data-bs-toggle="tab" data-bs-target="#contact" type="button" role="tab" aria-controls="contact" aria-selected="false">Financial Statement</button>
                </li>
                </ul>
                <div class="tab-content" id="myTabContent">
                <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                    <div class="card m-2 border-success border-2">
                        <div class="card-header bg-success text-white">
                            <h3>Sale log of </h3>
                        </div>
                        <div class="card-body table-responsive">
                             <table id="example" class="table table-striped table-bordered" style="width:100%">
                                    <thead>
                                      <tr>
                                        <th>Product </th>
                                        <th>Quantity</th>
                                        <th>Amount</th>
                                        <th>Currency</th>
                                        <th>Start date</th>
                                      </tr>
                                    </thead>
                                    <tbody>
                                     <?php if(isset($all_sales) && !empty($all_sales)) : ?>
                                        <?php foreach($all_sales as $sale): ?>
                                          <tr>
                                            <td><?=$sale->prodName?></td>
                                            <td><?=$sale->_quantity?></td>
                                            <td><?=$sale->_amount?></td>
                                            <td><?=$sale->_currency?></td>
                                            <td><?=substr($sale->loggedDate, 0, 10)?></td>
                                          </tr>
                                          <?php endforeach; ?>
                                      <?php endif; ?>
                                      <!-- Add more rows as needed -->
                                    </tbody>
                                  </table>
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card  border-success border-2 m-2">
                                <div class="card-header bg-success text-white ">
                                    <h3>Order Log from </h3>
                                </div>
                                <div class="card-body">
                                <table id="example2" class="table table-striped table-bordered" style="width:100%">
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
                    </div>
                </div>
                <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="card-body shadow-lg">
                                                <h3 class="text-success">$<?=$ld_sale[0]->_amount?></h3>
                                            </div>
                                            <div class="card-footer bg-success border-2">
                                                <p class="lead text-white">
                                                    The above figure shows the total Liberian Dollars made through sale. 
                                                </p>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="card-body shadow-lg border border-2">
                                                <h3 class="text-success">$<?=$usd_sale[0]->_amount?></h3>
                                            </div>
                                            <div class="card-footer bg-warning">
                                                <p class="lead text-white">
                                                    The above figure shows the total Liberian USD Dollars  made through sale. 
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                </div>
                </div>
            </div>
        </div>
    </div>
</div>