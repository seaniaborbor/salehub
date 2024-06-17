   
<?=$this->extend('public/common/layout')?>

<?=$this->section('page')?>



<!-- product section -->
<section class="product_section layout_padding">
   <div class="container">
      <div class="heading_container heading_center">
         <h2>
            Our <span>products</span>
         </h2>
      </div>

      <div class="row">
      <?php 

//print_r($all_products);
if(isset($all_products) && !empty($all_products)){
    foreach($all_products as $alprod) {
        ?>
        
        <div class="col-md-3 mt-3">
          <div class="card mt-1 product_card pt-0" style="">
            <a href="/product_view/<?=$alprod['prodId']?>">
            <img src="/public_asset/products/<?=$alprod['prodPic']?>" alt="pic" class="card-img-top">
            </a>
            <div class="card-body ">
            <a href="/product_view/<?=$alprod['prodId']?>">
            <p class="text-dark fw-bold  my-2 text-center"><b><?=$alprod['prodName']?></b></p>
            </a>
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
                  <span>
                    <?php 
                     if($alprod['prodAvailabilityStatus'] == "Available"){
                        echo "<span class='badge badge-sm bg-warning'>Available</span>";
                     }else{
                        echo "<span class='badge text-white badge-sm bg-danger'>Pre Order</span>";
                     }
                    ?>
                </span>
                </p>
              </small>
              <div class="row">
                <div class="col-6">
                    <a href="/add_to_cart/<?=$alprod['prodId']?>" class="btn rounded-pill w-100 btn-sm mt-2 btn-danger">
                    <i class="bi bi-cart-plus"></i> Add
                    </a>
                </div>
                <div class="col-6">
                    <?php
                   
                   $contact_no = "+2310775351303";
                    $message = "Hi, I visited your online store and got interest in this product: ";
                    $product_url = "myproduct_url_will_be_here";
                    
                    // Encode message and product URL for URL
                    $encoded_message = urlencode($message);
                    $encoded_product_url = urlencode($product_url);
                    
                    // Create WhatsApp link
                    $whatsapp_link = "https://wa.me/{$contact_no}?text={$encoded_message}{$encoded_product_url}";
                    
                    ?>
                    <a href="<?=$whatsapp_link?>" class="btn rounded-pill w-100 btn-sm mt-2 btn-success">
                    <i class="bi bi-whatsapp"></i>
                    </a>
                </div>
              </div>
            </div>
          </div>
        </div>

        <?php
        // Code block to process each product goes here
    }
}
?>
      </div>

      <div class="pagination mt-5 border-top">
        <?= $pager->links() ?>
    </div>
   </div>
</section>
<!-- end product section -->


<?= $this->endSection() ?>