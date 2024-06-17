<?= $this->extend('admin/common/layout') ?>

<?=$this->section('page_content')?>


<div class="container-fluid px-4">
    <div class="row">

        <div class="col-md-8">
          <div class="card shadow-lg border border-3 border-success" >
              <div class="card-header bg-success text-center">
              <h4 class="text-white">Edit A Product Info</h4>
              </div>
              <div class="card-body">
              </div>
              <div class="card-body">
                  <?php include('forms/edit_product_form.php'); ?>
              </div>
          </div>
        </div>

        <!-- 
    Array ( [0] => stdClass Object ( [prodId] => 10 [prodName] => Good Office Wear 
    [prodCategory] => 1 [prodPrice] => 40.00 [prodPic] => 1713751847_a342d94f391b3494e64e.png 
    [prodAvailabilityStatus] => Available [prodQty] => 20 [prodCurrency] => USD [prodSize] => 28
     [categoryId] => 1 [categoryName] => Slippers ) )
            -->

        <div class="col-md-4">
          <div class="card shadow-lg">
            <div class="card-body">
              <h5 class="text-success fw-bold  my-2 text-dark text-center"><?=$product_to_edit[0]->prodName?></h5>
              <hr>
              <img src="/public_asset/products/<?=$product_to_edit[0]->prodPic?>" alt="" class="img-fluid mb-3">
                              <small>
                                    <p class="d-flex justify-content-between  my-0 border-top border-bottom">
                                      <span>Price</span>
                                      <span><?=$product_to_edit[0]->prodPrice?><?=$product_to_edit[0]->prodCurrency?></span>
                                    </p>
                                  <p class="d-flex justify-content-between  my-0 border-top border-bottom">
                                      <span>Size</span>
                                      <span><?=$product_to_edit[0]->prodSize?></span>
                                    </p>
                                    <p class="d-flex justify-content-between   my-0 border-bottom">
                                      <span>Quantity </span>
                                      <span><?=$product_to_edit[0]->prodQty?></span>
                                    </p>
                                    <p class="d-flex justify-content-between  my-0 border-bottom">
                                      <span>Status </span>
                                      <span><?=$product_to_edit[0]->prodAvailabilityStatus?></span>
                                    </p>
                          </small>

                          <a href="/dashboard/delete_product/<?=$product_to_edit[0]->prodId?>" class="btn-danger btn mt-3  rounded-pill">Delete this Product</a>
            </div>
          </div>
        </div>

        </div>
</div>     l



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