   
<?=$this->extend('public/common/layout')?>

<?=$this->section('page')?>



<!-- product section -->
<section class="product_section layout_padding">
   <div class="container">
    <div class="row" stye="display:flex; justify-content: space-arround">
        <div class="col-md-2"></div>
        <div class="col-md-4">
            <div class="card bg-light">
                <div class="card-body bg-danger">
                    <img src="/public_asset/products/<?=$a_product[0]->prodPic?>" class="img-fluid" alt="">
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card bg-light shadow-lg">
                <div class="card-body">
            <div class="card-body ">
              <h3 class="text-primary mb-4 fw-bold   my-2 text-center"><b><?=$a_product[0]->prodName?></b></h3>
              <small>
                <p class="d-flex justify-content-between  my-0 border-top border-bottom">
                  <span>Price</span>
                  <span><?=$a_product[0]->prodPrice?><?=$a_product[0]->prodCurrency?></span>
                </p>
              <p class="d-flex justify-content-between  my-0 border-top border-bottom">
                  <span>Size</span>
                  <span><?=$a_product[0]->prodSize?></span>
                </p>
                <p class="d-flex justify-content-between   my-0 border-bottom">
                  <span>Quantity </span>
                  <span><?=$a_product[0]->prodQty?></span>
                </p>
                <p class="d-flex justify-content-between  my-0 border-bottom">
                  <span>Status </span>
                  <span>
                    <?php 
                     if($a_product[0]->prodAvailabilityStatus == "Available"){
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
                    <a href="/add_to_cart/<?=$a_product[0]->prodId?>" class="btn rounded-pill w-100 btn-sm mt-2 btn-danger">
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
                <div class="alert alert-primary mt-5">
                      <h3>Advertise Your Product or business here <strong>$5/year</strong></h3>
                    </div>
              </div>
                </div>
            </div>
            
        </div>
        <div class="col-md-2"></div>
    </div>
   </div>
</section>

<div class="container-fluid alert-warning py-3">
   <div class="row py-5">
      <div style="border-radius: 15px;" class="col-md-8 shadow-lg text-center offset-md-2 py-3 border border-dark rounded shadow bg-danger text-white">
        <div class="p-3" style="border: 3px dotted white; ">
        <div class="col-md-4 offset-md-4 col-sm-6 offset-sm-3 ">
         <center>
         <img  src="/public_asset/images/no_credig_card.jpg" 
         class="img img-fluid  rounded-circle ml-auto" 
         style="max-width:150px; margin-top:-90px; " alt="">
         </center>
      </div>
      <h4 class="mt-3">No Credit Card, No Problem</h4>
        <p style="margin-top: 20px;margin-bottom: 30px;">
        "Shop hassle-free with us! No credit card? No worries! Simply screenshot any product from our store and send it to us via Facebook or WhatsApp. We'll be happy to discuss your order 
        and arrange delivery before payment. Your convenience is our priority." 
         </p>
         <a class="btn btn-info" href="https://web.facebook.com/profile.php?id=61551805382695">
         <i class="bi bi-facebook"></i> Facebook 
         </a>
         <a class="btn text-white " style="background-color:green" href="">
         <i class="bi bi-whatsapp"></i> Whatapp
         </a>
        </div>
      </div>
   </div>
</div>
<!-- end product section -->


<?= $this->endSection() ?>