<?= $this->extend('admin/common/layout') ?>

<?=$this->section('page_content')?>


<script>
        function updateProductImage() {
            var selectElement = document.getElementById('productSelect');
            var selectedOption = selectElement.options[selectElement.selectedIndex];
            var imageUrl = selectedOption.getAttribute('data-image');

            var imageElement = document.getElementById('productImg');
            imageElement.src = "/public_asset/products/"+imageUrl;
        }
</script>



<div class="container-fluid px-4">
                <div class="row g-3 my-2">
                    <div class="col-md-3">
                        <div class="p-3 bg-white shadow-sm d-flex justify-content-around align-items-center rounded">
                            <div>
                                <h3 class="fs-2"><?=count($products)?></h3>
                                <p class="fs-5">Products</p>
                            </div>
                            <i class="fas fa-gift fs-1 primary-text border rounded-full secondary-bg p-3"></i>
                        </div>
                    </div>

                    <div class="col-md-3">
                        <div class="p-3 bg-white shadow-sm d-flex justify-content-around align-items-center rounded">
                            <div>
                                <h3 class="fs-2"><?=$ld_sale[0]->_amount?></h3>
                                <p class="fs-5">Total Sale LRD</p>
                            </div>
                            <i
                                class="fas fa-hand-holding-usd fs-1 primary-text border rounded-full secondary-bg p-3"></i>
                        </div>
                    </div>

                    
                    <div class="col-md-3">
                        <div class="p-3 bg-white shadow-sm d-flex justify-content-around align-items-center rounded">
                            <div>
                                <h3 class="fs-2"><?=$usd_sale[0]->_amount?></h3>
                                <p class="fs-5">Total Sale USD</p>
                            </div>
                            <i
                                class="fas fa-hand-holding-usd fs-1 primary-text border rounded-full secondary-bg p-3"></i>
                        </div>
                    </div>

                    <div class="col-md-3">
                        <div class="p-3 bg-white shadow-sm d-flex justify-content-around align-items-center rounded">
                            <div>
                                <h3 class="fs-2"><?=count($SaleModel)?></h3>
                                <p class="fs-5">Orders</p>
                            </div>
                            <i class="fas fa-truck fs-1 primary-text border rounded-full secondary-bg p-3"></i>
                        </div>
                    </div>

                </div>


                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-12  mt-3">
                            <div class="card">
                                <div class="card-header d-flex justify-content-between">
                                    <h4>Your Sale Log</h4>
                                    <button type="button" class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                      Record New Sale
                                    </button>
                                    <?php //print_r($all_sales); ?>
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
                                        <th>Delete</th>
                                        
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
                                            <td><a href="/dashboard/delete_sale/<?=$sale->sale_id?>" class="btn btn-sm btn-danger"><i class="fas fa-trash"></i></a></td>
                                          </tr>
                                          <?php endforeach; ?>
                                      <?php endif; ?>
                                      <!-- Add more rows as needed -->
                                    </tbody>
                                  </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                

                    <!-- Modal -->
                    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                      <div class="modal-dialog modal-lg border border-2 border-success">
                        <div class="modal-content">
          
                          <div class="modal-body border border-3 border-success">
                            <h3 class="mb-3 text-uppercase text-success">Log/Record a sale </h3>
                            <div class="row align-items-center">
                              <div class="col-md-8">
                                <div class="card shadow-sm">
                                  <div class="card-body ">

                                  <form action="/dashboard" method="post">
                                   <div class="form-group">
                                              <label for="productSelect">Choose a product:</label>
                                              <select id="productSelect" name="_product" class="form-control border-success border-1" onchange="updateProductImage()">
                                                  <option value="">Select a product</option>
                                                  <?php foreach ($products as $product): ?>
                                                      <option value="<?= esc($product['prodId']) ?>" data-image="<?= esc($product['prodPic']) ?>">
                                                          <?= esc($product['prodName']) ?>
                                                      </option>
                                                  <?php endforeach; ?>
                                              </select>
                                          </div>

                                          <div class="form-group">
                                            <label for="_quantity">Quantity of Product</label>
                                            <input type="number" name="_quantity" id="_quantity" class="form-control border-success">
                                          </div>

                                          <div class="row">
                                            <div class="col-md-8">
                                              <div class="form-group">
                                                <label for="_amount">Total Paid</label>
                                                <input type="text" name="_amount" class="form-control border-success">
                                              </div>
                                            </div>
                                            
                                            <div class="col-md-4">
                                              <div class="form-group">
                                                <label for="_currency">Sale Currency </label>
                                                <select name="_currency" id="_currency" class="form-control border-success">
                                                  <option value="">--Choose</option>
                                                  <option value="LRD">LRD</option>
                                                  <option value="USD">USD</option>
                                                </select>
                                              </div>
                                            </div>
                                          </div>

                                          <div class="row d-flex justify-content-between mt-3">
                                            <div class="col-4">
                                              <button class="btn btn-success">Log a Sale</button>
                                            </div>
                                            <div class="col-4">
                                            <button type="button" class="btn btn-light bg-light border shadow-lg w-100" data-bs-dismiss="modal">Close</button>
                                            </div>
                                          </div>
                                  </form>

                                  </div>
                                </div>
                              </div>
                              <div class="col-md-4">
                                  <div class="card shadow-lg">
                                    <div class="card-body">
                                      <div id="productImageContainer">
                                          <img id="productImg" src="https://img.freepik.com/free-vector/illustration-gallery-icon_53876-27002.jpg" alt="Product Image" style="max-width: 100%; height: auto;">
                                      </div>
                                    </div>
                                  </div>
                              </div>
                            </div>

                          </div>
                        </div>
                      </div>
                    </div>


<?= $this->endSection()?>