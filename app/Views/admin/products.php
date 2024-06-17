<?= $this->extend('admin/common/layout') ?>

<?=$this->section('page_content')?>


<div class="container-fluid px-4">
    <div class="row">
        <div class="col-md-8">
                <div class="row g-3 my-2">
                        <div class="col-md-6">
                            <div class="p-3 bg-white shadow-sm d-flex justify-content-around align-items-center rounded">
                                <div>
                                    <h3 class="fs-2"><?=$total_products?></h3>
                                    <p class="fs-5">Products</p>
                                </div>
                                <i class="fas fa-gift fs-1 primary-text border rounded-full secondary-bg p-3"></i>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="p-3 bg-white shadow-sm d-flex justify-content-around align-items-center rounded">
                                <div>
                                    <h3 class="fs-2"><?=count($categories)?></h3>
                                    <p class="fs-5">Categories</p>
                                </div>
                                <i
                                    class="fas fa-hand-holding-usd fs-1 primary-text border rounded-full secondary-bg p-3"></i>
                            </div>
                        </div>
                    <div class="row mt-3 ">
                     <?php  if(isset($all_products) && !empty($all_products)) : ?>
                        <?php foreach($all_products as $alprod) : ?>
                            <div class="col-md-4">
                              <div class="card mt-1 pt-0">
                                <img src="/public_asset/products/<?=$alprod['prodPic']?>" alt="pic" class="card-img-top">
                                <div class="card-body ">
                                  <p class="text-success fw-bold  my-2 text-center"><?=$alprod['prodName']?></p>
                                  <small>
                                    <p class="d-flex justify-content-between  my-0 border-top border-bottom">
                                      <span>Price</span>
                                      <span><?=$alprod['prodPrice']?><?=$alprod['prodCurrency']?></span>
                                    </p>
                                  <p class="d-flex justify-content-between  my-0 border-top border-bottom">
                                      <span>Size</span>
                                      <span><?=$alprod['prodSize']?></span>
                                    </p>
                                    <p class="d-flex justify-content-between   my-0 border-bottom">
                                      <span>Quantity </span>
                                      <span><?=$alprod['prodQty']?></span>
                                    </p>
                                    <p class="d-flex justify-content-between  my-0 border-bottom">
                                      <span>Status </span>
                                      <span><?=$alprod['prodAvailabilityStatus']?></span>
                                    </p>
                                  </small>
                                 <div class="row">
                                  <div class="col-12 text-center">
                                  <a href="/dashboard/edit_product/<?=$alprod['prodId']?>" class="btn rounded-pill w-100 btn-sm mt-2 btn-success">Edit</a>
                                  </div>
                                 </div>
                                </div>
                              </div>
                            </div>
                        <?php endforeach; ?>
                      <?php endif; ?>
                    </div>
                    <div class="p-3">
                    <div class="pagination">
                          <?= $pager->links() ?>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-md-4">
                <div class="card shadow-lg border border-3 border-success" >
                  <div class="card-header bg-success text-center">
                    <h4 class="text-white">Add New Product</h4>
                  </div>
                    <div class="card-body">
                    </div>
                    <div class="card-body">
                        <?php include('forms/add_product_form.php'); ?>
                    </div>
                </div>
        </div>
        </div>
</div>



<!-- Modal -->
<div class="modal fade" id="categoryModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content rounded-0 border-2 border-success">
        <div class="modal-header bg-success border-0">
          <h5 class="modal-title text-white" id="exampleModalLabel">Add Category</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <!-- Form inside the modal -->
          <form method="post" action="/dashboard/add_category">
            <div class="mb-3">
              <label for="categoryName" class="form-label">Enter the category and smash the save button </label>
              <input type="text" class="form-control border-success" id="categoryName" name="categoryName" required>
            </div>
            <button type="submit" class="btn btn-success px-3 ">Save </button>
          </form>
        </div>
      </div>
    </div>
  </div>


<?= $this->endSection()?>