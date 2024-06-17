
<?php  if(isset($all_products) && !empty($all_products)) : ?>
    <?php foreach($all_products as $alprod) : ?>
        <div class="col-md-3 mt-3">
          <div class="card mt-1 pt-0 product_card" >
          <a href="/product_view/<?=$alprod->prodId?>">
            <img src="/public_asset/products/<?=$alprod->prodPic?>" alt="pic" class="card-img-top">
          </a>
            <div class="card-body ">
            <a href="/product_view/<?=$alprod->prodId?>">
              <p class="text-dark fw-bold  my-2 text-center"><b><?=$alprod->prodName?></b></p>
            </a>
              <small>
                <p class="d-flex justify-content-between  my-0 border-top border-bottom">
                  <span>Price</span>
                  <span><?=$alprod->prodPrice?><?=$alprod->prodCurrency?></span>
                </p>
              <p class="d-flex justify-content-between  my-0 border-top border-bottom">
                  <span>Size</span>
                  <span><?=$alprod->prodSize?></span>
                </p>
                <p class="d-flex justify-content-between   my-0 border-bottom">
                  <span>Quantity </span>
                  <span><?=$alprod->prodQty?></span>
                </p>
                <p class="d-flex justify-content-between  my-0 border-bottom">
                  <span>Status </span>
                  <span>
                  <?php 
                     if($alprod->prodAvailabilityStatus == "Available"){
                        echo "<span class='badge badge-sm bg-warning'>Available</span>";
                     }else{
                        echo "<span class='badge badge-sm bg-danger'>Pre Order</span>";
                     }
                    ?>
                  </span>
                </p>
              </small>
              <div class="row">
                <div class="col-6">
                    <a href="/add_to_cart/<?=$alprod->prodId?>" class="btn rounded-pill w-100 btn-sm mt-2 btn-danger">
                    <i class="bi bi-cart-plus"></i> Add
                    </a>
                </div>
                <div class="col-6">
                    <a href="#" class="btn rounded-pill w-100 btn-sm mt-2 btn-success">
                    <i class="bi bi-whatsapp"></i>
                    </a>
                </div>
              </div>
            </div>
          </div>
        </div>
    <?php endforeach; ?>
  <?php endif; ?>
